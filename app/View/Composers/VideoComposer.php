<?php

namespace App\View\Composers;

use Domain\Info\ViewModels\InfoViewModel;
use Domain\Video\ViewModels\VideoViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class VideoComposer
{
    public function compose(View $view): void
    {

        $videos  = Cache::rememberForever('slider_videos', function () {
         return VideoViewModel::make()->sliderVideos(); // материалы видео
         });
        $view->with([
            'videos' => $videos,
        ]);

    }
}
