<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Video;

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
 * @extends ModelResource<Video>
 */
class VideoResource extends ModelResource
{
    protected string $model = Video::class;

    protected string $title = 'Видеоматериалы';

    protected string $column = 'created_at';

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

            Image::make(__('Изображение'), 'img'),

            Text::make(__('Заголовок'), 'title'),
            Slug::make(__('Алиас'), 'slug'),
            Date::make(__('Дата публикации'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
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


                                Image::make(__('Изображение'), 'img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('info')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable(),

                                Switcher::make('Заставка', 'above')->default(0)->hint('Наложить фото на видео.'),



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



                                    Date::make(__('Дата публикации'), 'created_at')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable(),
                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),


                    ]),


                    Tab::make(__('Видео'), [
                        Grid::make([

                            Column::make([
                                Json::make('Видеоматериал', 'video')->fields([
                                    Text::make('Описание Видеоматериала', 'video_video_title'),

                                    File::make('Видео', 'video_video_video')
                                        //->hint('На витрину')
                                        ->dir('video')/* Директория где будут хранится файлы в storage (по умолчанию /) */
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
