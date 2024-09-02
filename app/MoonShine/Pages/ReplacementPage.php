<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Text;
use MoonShine\Pages\Page;

class ReplacementPage extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'ReplacementPage';
    }

    public function components(): array
    {
        return [


            FormBuilder::make('/replacement/update', 'GET')
                ->fields([
                    Grid::make([
                        Column::make([
                            Block::make([
                                Text::make('Что меняем', 'old_text')
                            ])
                        ])->columnSpan(6),
                        Column::make([
                            Block::make([
                                Text::make('На что меняем', 'new_text')
                            ])
                        ])->columnSpan(6),
                    ])
                ]) ->submit(label: 'Вперед', attributes: ['class' => 'btn-primary'])

        ];
    }

}
