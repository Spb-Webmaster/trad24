<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use Domain\Info\ViewModels\InfoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoController extends Controller
{

    /**
     * view
     * все новости paginate()
     */
    public function infos()
    {

        $news =  InfoViewModel::make()->allInfos(); // материалы новостей

       return view('pages.info.infos',
           [
               'news' => $news
           ]);
    }


    /**
     * view
     *  новость slug
     */
    public function info($slug)
    {

        $new =  InfoViewModel::make()->oneInfo($slug); // материалы новостей

       return view('pages.info.info',
           [
               'new' => $new
           ]);
    }


}
