<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\CatRegobject;
use App\Models\FamilyMedia;
use App\MoonShine\Fields\Slug;
use GianTiaga\MoonshineFile\Fields\SpatieUppyFile;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegobjectMedia;

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
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

/**
 * @extends ModelResource<RegobjectMedia>
 */
class FamilyMediaResource extends ModelResource
{
    protected string $model = FamilyMedia::class;


    protected string $title = 'Медиа';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

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
            Text::make(__('Заголовок'), 'title'),
            BelongsTo::make('Фамилия', 'family', resource: new FamilyResource())->nullable()->searchable(),
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

                    Tab::make(__('Медиа'), [
                        Grid::make([
                            Column::make([

                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique(),

                                ])->show(),

                                Collapse::make('Страница ссылка', [
                                    Text::make('url', 'url')->hint('Введите полный url страницы для перехода.'),
                                ])->show(),

                                Collapse::make('CSS стили', [
                                    Textarea::make('CSS стили для страницы', 'css')
                                        ->hint('Все стили будут обернуты в тег style, писать style дополнительно – не нужно'),
                                ])->show(),


                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ])->show(),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Фамилия', 'family', resource: new FamilyResource())->nullable()->searchable()->required(),
                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),


                        Divider::make(),

                        TinyMce::make('Описание', 'text')
                            ->hint('На всю ширину макета'),

                        Image::make(__('Изображение'), 'img')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('object_media')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),


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
                                    Text::make('Ссылка на видео (RuTube)', 'video_video_rutube'),

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
            'metatitle' => 'max:2024',
            'description' => 'max:2024',
            'keywords' => 'max:2024',
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
