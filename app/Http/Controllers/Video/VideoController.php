<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Domain\Video\ViewModels\VideoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{

    /**
     * view
     * все видео  paginate()
     */
    public function videos()
    {

        $videos =  VideoViewModel::make()->allVideos(); // материалы новостей

       return view('pages.video.videos',
           [
               'videos' => $videos
           ]);
    }


    /**
     * view
     *  видео slug
     */
    public function video($slug)
    {

        $video =  VideoViewModel::make()->oneVideo($slug); // материалы новостей

       return view('pages.video.video',
           [
               'video' => $video
           ]);
    }


}
