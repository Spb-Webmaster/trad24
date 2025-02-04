<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Info;
use Illuminate\Database\Eloquent\Model;
use App\Models\CalendarEvent;

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
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<CalendarEvent>
 */
class CalendarEventResource extends ModelResource
{
    protected string $model = CalendarEvent::class;

    protected string $title = 'Календарь событий';

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

            Image::make(__('Изображение'), 'teaser_img'),

            Text::make(__('Заголовок'), 'title'),
            Slug::make(__('Алиас'), 'slug'),
            Date::make(__('Дата публикации'), 'created_at')
                ->format("d.m.Y"),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),



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

                                Text::make(__('Текст в календаре'), 'teaser'),
                                Image::make(__('Изображение'), 'teaser_img')
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('calendar_events')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp' ])
                                    ->removable()
                                    ->hint('Основное изображение. Обязательное поле.'),



                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),
                                Collapse::make('Дата', [

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


                                TinyMce::make('Описание', 'text'),


                                Image::make(__('Изображение'), 'img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('calendar_events')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg' , 'webp'])
                                    ->removable()
                                    ->hint('На всю ширину макета'),


                                TinyMce::make('Описание', 'text2'),


                                Image::make(__('Изображение'), 'img2')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('calendar_events')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg' , 'webp'])
                                    ->removable()
                                    ->hint('На всю ширину макета'),





                            ])->columnSpan(12),
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
