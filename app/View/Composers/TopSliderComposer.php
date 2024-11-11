<?php

namespace App\View\Composers;

use Domain\CalendarEvent\ViewModels\CalendarEventViewModel;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TopSliderComposer
{
    public function compose(View $view): void
    {

         $top_slider =  CalendarEventViewModel::make()->events20(); //




        $view->with([
            'top_slider' => $top_slider,
        ]);

    }
}
