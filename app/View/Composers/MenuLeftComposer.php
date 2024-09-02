<?php

namespace App\View\Composers;

use App\Models\Religion;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Menu\ViewModels\MenuViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuLeftComposer
{
    public function compose(View $view): void
    {

       $left_menu =  MenuViewModel::make()->left_menu();


        $view->with([
            'left_menu' => $left_menu,
        ]);

    }
}
