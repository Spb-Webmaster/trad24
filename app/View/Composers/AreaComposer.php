<?php

namespace App\View\Composers;

use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AreaComposer
{
    public function compose(View $view): void
    {

       $areas = Cache::rememberForever('area_list', function () {
         return AreaViewModel::make()->areaList(); // Все субъекты РФ
         });



        $view->with([
            'areas' => $areas,
        ]);

    }
}
