<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\FamilyNew;
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
use MoonShine\Fields\File;
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
 * @extends ModelResource<>
 */
class FamilyNewResource extends ModelResource
{
    protected string $model = FamilyNew::class;

    protected string $title = 'Новости фамилий';

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

            BelongsTo::make('Фамилия', 'family', resource: new FamilyResource())->nullable()->searchable(),
            ];
    }


    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Image::make(__('Изображение'), 'teaser'),
            Text::make(__('Заголовок'), 'title'),
            BelongsTo::make('Фамилия', 'family', resource: new FamilyResource())->nullable()->searchable()->required(),
            Switcher::make('Публикация', 'published'),

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
                                    Image::make(__('Изображение'), 'teaser')
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
                                    BelongsTo::make('Фамилия', 'family', resource: new FamilyResource())->nullable()->searchable()->required(),

                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),



                        Divider::make(),

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'n_text')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'n_img')
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
                                TinyMce::make('Описание', 'n_text2'),

                                Image::make(__('Изображение'), 'n_img2')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается на всю ширину'),

                            ])->columnSpan(12)
                        ]),



                    ]),
                    Tab::make(__('Галерея'), [

                        Collapse::make('Заголовок', [

                            Text::make(__('Заголовок фотогалереи'), 'gallery_title'),
                        ]),
                        Grid::make([

                            Column::make([
                                Collapse::make('Основная галерея', [
                                    Json::make('Галерея', 'gallery')->fields([
                                        Image::make('Изображение (30)', 'gallery_img')
                                            ->dir('gallery')
                                            ->disk('moonshine')
                                            ->allowedExtensions(['jpg', 'gif', 'png', 'svg'])
                                            ->removable(),
                                        Text::make('Описание изображения', 'gallery_img_title'),
                                    ])->vertical()->creatable(limit: 70)->removable(),


                                ]),
                            ])->columnSpan(6),


                            Column::make([

                                Collapse::make('Алтернативная галерея', [
                                    Divider::make('Работает, при условии, что НЕ ЗАПОЛНЕНА основная галерея!'),
                                    Image::make('Галерея', 'gallery_multiple')
                                        ->dir('media')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->multiple()
                                        ->removable()
                                ]),
                            ])->columnSpan(6)

                        ]),
                        Collapse::make('Описание', [

                            TinyMce::make('Описание', 'gallery_desc'),
                        ]),


                    ]),

                    Tab::make(__('Видео'), [
                        Grid::make([

                            Column::make([


                                Json::make('Видеоматериал', 'video')->fields([
                                    Text::make('Заголовок  Видеоматериала', 'video_video_title'),

                                    File::make('Видео', 'video_video_video')
                                        ->dir('video')/* Директория где будут хранится файлы в storage (по умолчанию /) */
                                        ->disk('moonshine') // Filesystems disk
                                        //  ->allowedExtensions(['jpg', 'gif', 'png', 'svg'])/* Допустимые расширения */
                                        ->removable(),
                                    Text::make('Ссылка на видео (YouTube)', 'video_video_youtube'),

                                    TinyMce::make('Описание Видеоматериала', 'video_video_desc'),
                                ])->vertical()->creatable(limit: 30)->removable(),

                                TinyMce::make('Описание', 'video_desc'),


                            ])->columnSpan(12)

                        ]),

                    ]),

                    Tab::make(__('Аудио'), [
                        Grid::make([

                            Column::make([


                                Json::make('Аудиоматериал', 'audio')->fields([
                                    Text::make('Заголовок  Аудиоматериала', 'audio_audio_title'),

                                    File::make('Аудио', 'audio_audio_audio')
                                        ->dir('audio')/* Директория где будут хранится файлы в storage (по умолчанию /) */
                                        ->disk('moonshine') // Filesystems disk
                                        ->allowedExtensions(['wma', 'mp3', 'wav'])/* Допустимые расширения */
                                        ->removable(),

                                    TinyMce::make('Описание Аудиоматериала', 'audio_audio_desc'),
                                ])->vertical()->creatable(limit: 30)->removable(),

                                TinyMce::make('Описание', 'audio_desc'),


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
