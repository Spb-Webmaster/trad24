<?php
namespace Domain\Catalog\ViewModels;

use App\Models\Area;
use App\Models\Religion;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class AreaViewModel
{
    use Makeable;

    public function areaList() {
        return Area::query()
            ->orderBy('sorting')
            ->get();

    }

    public function areaId($id) {
        return Area::query()
            ->where('id', $id)
            ->first();

    }




}
