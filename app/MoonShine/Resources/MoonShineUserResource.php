<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Resources\ModelResource;
use MoonShine\Resources\MoonShineUserRoleResource;

#[Icon('heroicons.outline.users')]
class MoonShineUserResource extends ModelResource
{
    public string $model = MoonshineUser::class;

    public string $column = 'name';

    public function title(): string
    {
        return __('moonshine::ui.resource.admins_title');
    }

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Main', [
                        ID::make()
                            ->sortable(),

                        BelongsTo::make(
                            __('moonshine::ui.resource.role'),
                            'moonshineUserRole',
                            static fn (MoonshineUserRole $model) => $model->name,
                            new MoonShineUserRoleResource(),
                        ),

                        Text::make(__('moonshine::ui.resource.name'), 'name')
                            ->required(),


                        Image::make(__('moonshine::ui.resource.avatar'), 'avatar')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'public'))
                            ->dir('moonshine_users')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif'])->removable(),

                        Date::make(__('moonshine::ui.resource.created_at'), 'created_at')
                            ->format("d.m.Y")
                            ->default(now()->toDateTimeString())
                            ->sortable()
                            ->hideOnForm(),

                        Email::make(__('moonshine::ui.resource.email'), 'email')
                            ->sortable()
                            ->required(),
                    ]),

                    Tab::make(__('moonshine::ui.resource.password'), [
                        Heading::make('Change password'),

                        Password::make(__('moonshine::ui.resource.password'), 'password')
                            ->customAttributes(['autocomplete' => 'new-password'])
                            ->hideOnIndex()
                            ->eye(),

                        PasswordRepeat::make(__('moonshine::ui.resource.repeat_password'), 'password_repeat')
                            ->customAttributes(['autocomplete' => 'confirm-password'])
                            ->hideOnIndex()
                            ->eye(),
                    ]),
                ]),
            ]),
        ];
    }

    /**
     * @return array{name: string, moonshine_user_role_id: string, email: mixed[], password: string}
     */
    public function rules($item): array
    {
        return [
            'name' => 'required',
            'moonshine_user_role_id' => 'required',

            'email' => [
                'sometimes',
                'bail',
                'required',
                'email',
                Rule::unique('moonshine_users')->ignoreModel($item),
                Rule::unique('users')->ignore($item->email, 'email'),
            ],
            'password' => $item->exists
                ? 'sometimes|nullable|min:8|required_with:password_repeat|same:password_repeat'
                : 'required|min:8|required_with:password_repeat|same:password_repeat',
        ];
    }

    public function getActiveActions(): array
    {
        return ['create',/* 'view',*/ 'update'/*, 'delete', 'massDelete'*/];
    }

    public function filters(): array
    {
        return [
            Text::make('Имя', 'name'),
            Text::make('Email', 'email'),
        ];
    }

    public function search(): array
    {
        return ['id', 'name', 'email'];
    }

    public function import():?ImportHandler
    {
        return null;
    }

    public function export():?ExportHandler
    {
        return null;
    }



}
