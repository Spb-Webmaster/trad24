<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\UserRole;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Validation\Rule;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    protected string $column = 'name';

    protected string $sortColumn = 'name';

    //resourceItem

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Имя', 'name'),
            Text::make('Email', 'email'),
            Text::make('Телефон', 'phone'),
        ];
    }



    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Image::make(__('Аватар'), 'avatar'),
            Text::make(__('Имя'), 'name')->required(),
            Text::make(__('Email'), 'email')->required(),
            Text::make(__('Телефон'), 'phone')->required(),

            Switcher::make('Публикация', 'published')->updateOnPreview(),


        ];
    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([

                                Collapse::make('Имя/Телефон', [
                                    Text::make('Имя', 'name')->required()->locked(),
                                    Text::make('Телефон', 'phone')->mask('7 (999) 999-99-99')
                                        ->locked(),
                                ]),

                                Image::make(__('Аватар'), 'avatar')
                                    ->showOnExport()
                                    ->disk('avatar')
                                    ->dir('users/'.$this->getItemID().'/avatar')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif'])->removable(),

                                Collapse::make('Email', [
                                    Text::make('Email', 'email')->required()
                                        ->locked()
                                ]),

                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Блокировка', [

                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),



                                Date::make(__('День рождения '), 'birthdate')
                                    ->format("d.m.Y")
                                    ->default(now()->toDateTimeString())
                                    ->sortable(),


                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),

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



    public function rules(Model $item): array
    {
        return [
            'name' => 'max:50',
            'email' => [
                'max:50',
                'sometimes',
                'bail',
                'required',
                'email',
                Rule::unique('users')->ignore($item->email, 'email'),
            ],
            'password' => $item->exists
                ? 'sometimes|nullable|min:8|required_with:password_repeat|same:password_repeat'
                : 'required|min:8|required_with:password_repeat|same:password_repeat',
        ];
    }
    public function import(): ?ImportHandler
    {
        return null;
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return [/*'create', 'view',*/ 'update', 'delete', 'massDelete'];
    }

}
