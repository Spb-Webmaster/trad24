<?php

namespace App\View\Composers;

use Domain\Catalog\ViewModels\CatalogViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ReligionComposer
{
    public function compose(View $view): void
    {

       $religions  = Cache::rememberForever('religion_list', function () {
         return CatalogViewModel::make()->religionList(); // Все религии
         });



        $view->with([
            'religions' => $religions,
        ]);

    }
}
