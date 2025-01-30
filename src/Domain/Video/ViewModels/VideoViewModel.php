<?php
namespace Domain\Video\ViewModels;

use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class VideoViewModel
{
    use Makeable;

    public function oneVideo($slug)
    {

            $video =  Video::query()
                ->get_video($slug)
                ->first();

        return $video;

    }

    public function allVideos()
    {
            $videos =  Video::query()
                ->get_videos()
                ->orderBy('created_at', 'desc')
                ->paginate(config('site.constants.paginate'));
        return $videos;
    }

    public function sliderVideos()
    {
        $videos =  Video::query()
                ->get_videos()
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        return $videos;
    }



}
