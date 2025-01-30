<?php
namespace Domain\Info\ViewModels;

use App\Models\Info;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class InfoViewModel
{
    use Makeable;

    public function oneInfo($slug)
    {

            $info =  Info::query()
                ->get_info($slug)
                ->first();

        return $info;

    }

    public function allInfos()
    {
            $infos =  Info::query()
                ->get_infos()
                ->orderBy('created_at', 'desc')
                ->paginate(config('site.constants.paginate'));
        return $infos;
    }

    public function sliderInfos()
    {
            $infos =  Info::query()
                ->get_infos()
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        return $infos;
    }



}
