<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Regobject;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegobjectNew;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Position;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<RegobjectNew>
 */
class RegobjectNewResource extends ModelResource
{
    protected string $model = RegobjectNew::class;

    protected string $title = 'Новости объектов';

    protected string $column = 'created_at';

    protected string $sortColumn = 'created_at';

    protected ?ClickAction $clickAction = ClickAction::EDIT;



    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Название', 'title')
                ->useOnImport()
                ->showOnExport(),

            BelongsTo::make('Объект', 'regobject', resource: new RegobjectResource())->nullable()->searchable(),
            ];
    }


    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Image::make(__('Изображение'), 'img'),
            Text::make(__('Заголовок'), 'title'),
              Date::make(__('Дата создания'), 'created_at')
                  ->format("d.m.Y")
                  ->default(now()->toDateTimeString())
                  ->sortable(),

        ];
    }

    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Новости'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique(),
                                    Image::make(__('Изображение'), 'img')
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('object_news')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Основное изображение. Обязательное поле.'),

                                    ])->show(),


                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ])->show(),
                                Collapse::make('Дата', [
                                Date::make(__('Дата создания'), 'created_at')
                                    ->format("d.m.Y")
                                    ->default(now()->toDateTimeString())
                                    ->sortable(),
                                ])->show(),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Объект', 'regobject', resource: new RegobjectResource())->nullable()->searchable()->required(),

                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),



                        Divider::make(),

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'text')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'pageimg1')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается справа'),

                            ])
                                ->columnSpan(4),
                        ]),





                        Divider::make(),

                        TinyMce::make('Описание', 'text2')
                            ->hint('На всю ширину макета'),

                        Image::make(__('Изображение'), 'pageimg2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('object_news')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),



                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'pageimg3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('object_news')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'text3')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),




                        Divider::make(),
                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'text4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'pageimg4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('object_news')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),



                    ]),


                ]),


            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [
            'metatitle' => 'max:1024',
            'description' => 'max:1024',
            'keywords' => 'max:1024',
        ];
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }


    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }
}
