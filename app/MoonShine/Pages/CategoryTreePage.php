<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use Leeto\MoonShineTree\View\Components\TreeComponent;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Pages\Page;

class CategoryTreePage extends IndexPage
{
    protected function mainLayer(): array
    {
        return [
            ...$this->actionButtons(),
            TreeComponent::make($this->getResource()),
        ];
    }
}
