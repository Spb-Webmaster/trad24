<?php

namespace App\View\Composers;

use App\Models\RusCity;
use Domain\Catalog\ViewModels\AreaViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CityRusComposer
{
    public function compose(View $view): void
    {

        $departures = Cache::rememberForever('cities_list', function () {
            return RusCity::query()->get();
        });


        $view->with([
            'departures' => $departures,
        ]);

    }
}
