<?php

namespace App\View\Composers;

use Domain\Info\ViewModels\InfoViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class InfoComposer
{
    public function compose(View $view): void
    {

       $news  = Cache::rememberForever('slider_infos', function () {
         return InfoViewModel::make()->sliderInfos(); // материалы новостей
         });
        $view->with([
            'news' => $news,
        ]);

    }
}
