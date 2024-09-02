<?php
namespace Domain\Catalog\ViewModels;

use App\Models\CatRegobject;
use App\Models\Regobject;
use App\Models\Religion;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class AutoCompleteViewModel
{
    use Makeable;

    public function bigSearch($request)
    {
        $search = trim($request->term);
        $religion = $request->religion;
        $area = $request->area;

        $query = Regobject::query();
        if($request->religion) {
            $query->where('religion_id', $religion);
        }
        if($area) {
            $query->where('area_id', $area);
        }

        $query->where('published', 1);
        $query->where("title", "like", "%" . $search . "%");
        $result = $query->limit(15)->get()->toArray();

        return $result;


    }

    public function topSearch($request)
    {
        $search = trim($request->term);
        $query = Regobject::query();
        $query->where('published', 1);
        $query->where("title", "like", "%" . $search . "%");
        $result = $query->limit(15)->get()->toArray();

        return $result;


    }


}
