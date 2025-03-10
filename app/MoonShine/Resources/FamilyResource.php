<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\CatRegobject;

use App\Models\Family;
use App\MoonShine\Fields\Slug;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regobject;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Position;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasOne;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<>
 */
class FamilyResource extends ModelResource
{
    protected string $model = Family::class;

    protected string $title = 'Фамилии';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Image::make(__('Изображение'), 'img'),
            Image::make(__('Логотип'), 'img_logo'),
            Text::make(__('Заголовок'), 'title'),
            Date::make(__('Дата публикации'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable(),
            Switcher::make('Публикация', 'published'),
            Switcher::make('Title', 'title'),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),
        ];
    }


    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([
                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique(),
                                    Image::make(__('Изображение'), 'img')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('objects')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Только анонс'),
                                    Image::make(__('Логопип'), 'img_logo')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('objects')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Должен быть квадратным. Минимальные размеры. Ширина 111, Высота 111'),
                                    Textarea::make('Краткое описание анонса', 'teaser'),


                                ]),
                            ])->columnSpan(6),

                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),
                                    Date::make(__('Дата публикации'), 'created_at')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable(),

                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),

                    ]),

                    Tab::make(__('О фамилии'), [


                        Grid::make([
                            Column::make([

                                Text::make(__('Заголовок страницы "О фамилии"'), 'f_title'),
                                TinyMce::make('Описание', 'f_text')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'f_img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается справа'),
                                Textarea::make('Описание под изображением', 'f_img_text')->hint('Выводится при условии загрузки изображения'),
                                Collapse::make('Главы фамилий', [

                                    Text::make(__('Имя Главы'), 'f_name')->hint('Если оставить порле пустым то выведется заголовок фамилии (Заголовок*)'),
                                    Date::make(__('Дата рождения'), 'f_birthday')
                                        ->format("d.m.Y")
                                        ->sortable(),
                                    Text::make(__('Телефон'), 'f_phone'),
                                    Text::make(__('Город'), 'f_city'),


                                ]),
                            ])->columnSpan(4),
                        ]),

                        Divider::make(),

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'f_text2')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'f_img2')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12),
                        ]),

                        Divider::make(),

                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'f_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'f_text3')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),

                        Divider::make(),

                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'f_text4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'f_img4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                                TinyMce::make('Описание', 'f_text5')
                                    ->hint('На всю ширину макета'),
                            ])->columnSpan(12),

                        ]),


                    ]),

                    Tab::make(__('Выдающиеся люди'), [


                        Grid::make([
                            Column::make([

                                Text::make(__('Заголовок страницы "Выдающиеся люди"'), 'p_title'),
                                TinyMce::make('Описание', 'p_text')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'p_img')
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

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'p_text2')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'p_img2')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12),
                        ]),

                        Divider::make(),

                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'p_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'p_text3')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),

                        Divider::make(),

                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'p_text4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'p_img4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),


                    ]),

                    Tab::make(__('Культурное наследие'), [


                        Grid::make([
                            Column::make([

                                Text::make(__('Заголовок страницы "Культурное наследие"'), 'k_title'),
                                TinyMce::make('Описание', 'k_text')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'k_img')
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

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'k_text2')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'k_img2')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12),
                        ]),

                        Divider::make(),

                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'k_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'k_text3')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),

                        Divider::make(),

                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'k_text4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'k_img4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),


                    ]),

                    Tab::make(__('Герои'), [


                        Grid::make([

                            Column::make([
                                Collapse::make('Публикация раздела  - герои', [

                                    Switcher::make('Публикация в меню', 'h_published')->default(1),
                                ]),

                            ])
                                ->columnSpan(12),
                            Column::make([

                                Text::make(__('Заголовок страницы "Герои"'), 'h_title'),
                                TinyMce::make('Описание', 'h_text')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'h_img')
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

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'h_text2')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'h_img2')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12),
                        ]),

                        Divider::make(),

                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'h_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'h_text3')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),

                        Divider::make(),

                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'h_text4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'h_img4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),


                    ]),

                    Tab::make(__('Файлы'), [

                        Grid::make([

                            Column::make([

                                Json::make('Файлы (150)', 'files')->fields([

                                    File::make('Файл', 'file_file')->dir('object_files')->disk('moonshine'),

                                    Text::make('Заголовок', 'file_title')->hint('НЕ выводится на сайте'),
                                    Text::make('Url', 'file_url')->readonly(),

                                ])->creatable(limit: 150)->removable(),
                            ])->columnSpan(10),
                            Column::make([


                            ])->columnSpan(2)

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
