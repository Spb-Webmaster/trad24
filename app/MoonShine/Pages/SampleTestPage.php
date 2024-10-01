<?php
declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Pages\Page;

class SampleTestPage extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'SampleTestPage';
    }

    public function components(): array
    {
        return [

                   Grid::make([
                        Column::make([
                            Block::make([

                            ])
                        ])->columnSpan(6),
                        Column::make([
                            Block::make([

                            ])
                        ])->columnSpan(6),
                    ])

        ];
    }

}

