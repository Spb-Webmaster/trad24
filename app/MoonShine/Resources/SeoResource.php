<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Seo;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class SeoResource extends ModelResource
{
    protected string $model = SEO::class;

    protected string $title = 'SEO';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Название', 'title'),
            Text::make('title', 'metatitle'),

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


            Text::make(__('Заголовок'), 'title'),
            Text::make(__('Url'), 'url'),
            Text::make(__('Title'), 'metatitle'),
            Switcher::make('Description', 'description'),
            Switcher::make('Keywords', 'keywords'),


        ];

    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {
        return [
            Block::make([

                Grid::make([
                    Column::make([
                        ID::make()
                            ->sortable(),
                        Collapse::make('url адрес страницы', [
                            Text::make(__('Url'), 'url')->required(),

                        ]),

                        Collapse::make('Title/Description/Keywords', [
                            Text::make('Название', 'title')
                                ->hint('на сайт не выводится'),
                            Divider::make('Мета данные')->centered(),
                            Text::make('Title', 'metatitle')
                                ->hint('meta title'),
                            Text::make('Description', 'description')
                                ->hint('meta description'),
                            Text::make('Keywords', 'keywords')
                                ->hint('meta keywords'),

                        ]),

                    ])
                        ->columnSpan(12),

                ]),
            ]),


        ];


    }

    public function rules(Model $item): array
    {
        return [];
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
        return ['create',/* 'view',*/  'update', 'delete', 'massDelete'];
    }


}
