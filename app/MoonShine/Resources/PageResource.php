<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Page>
 */
class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Страницы';

    protected string $column = 'title';

    protected string $sortColumn = 'created_at';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Image::make(__('Изображение'), 'pageimg1'),

            Text::make(__('Заголовок'), 'title'),
            Slug::make(__('Алиас'), 'slug'),
            Number::make('Сортировка','sorting')->buttons()->default(0),

            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Л.Меню', 'left_menu'),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),
            //      Number::make('Сорт.', 'sorting')->sortable()


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


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique()
                                ]),


                                Text::make(__('Подзаголовок'), 'subtitle'),


                                Collapse::make('Левое меню', [
                                    Switcher::make('Добавить в левое меню', 'left_menu')->default(0),
                                    Text::make('Заголовок в меню', 'left_menutitle'),
                                    Number::make('Сортировка','sorting')->buttons()->default(0)

                                ]),





                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),
                                Collapse::make('Вложенность', [
                                    /*             BelongsTo::make('Категория', 'parent', resource: new HotCategoryResource())->nullable()->searchable(),*/
                                    Date::make(__('Дата публикации'), 'created_at')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable(),
                                ]),


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
                            ->dir('objects')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),



                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'pageimg3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
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
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),
                    ]),


                    Tab::make(__('Галерея'), [
                        Grid::make([

                            Column::make([
                                Json::make('Галерея', 'gallery')->fields([

                                    Image::make('Изображение (30)', 'gallery_img')
                                        ->dir('gallery')
                                        ->disk('moonshine') // Filesystems disk
                                        ->allowedExtensions(['jpg', 'gif', 'png', 'svg'])/* Допустимые расширения */
                                        ->removable(),
                                    Text::make('Описание изображения', 'gallery_img_title'),
                                ])->vertical()->creatable(limit: 30)->removable(),

                            ])->columnSpan(12)

                        ]),

                    ]),

                    Tab::make(__('Видео'), [
                        Grid::make([

                            Column::make([
                                Json::make('Видеоматериал', 'video')->fields([
                                    Text::make('Описание Видеоматериала', 'video_video_title'),

                                    File::make('Видео', 'video_video_video')
                                        ->dir('video')
                                        ->disk('moonshine') // Filesystems disk
                                        //  ->allowedExtensions(['jpg', 'gif', 'png', 'svg'])/* Допустимые расширения */
                                        ->removable(),
                                    Text::make('Ссылка на видео (YouTube)', 'video_video_youtube'),

                                    TinyMce::make('Описание Видеоматериала', 'video_video_desc'),
                                ])->vertical()->creatable(limit: 30)->removable(),

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
            'metatitle' => 'max:2024',
            'description' => 'max:2024',
            'keywords' => 'max:2024',
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
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }

}
