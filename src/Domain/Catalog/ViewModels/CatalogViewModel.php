<?php
namespace Domain\Catalog\ViewModels;

use App\Models\CatRegobject;
use App\Models\Religion;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class CatalogViewModel
{
    use Makeable;

    public function religionList() {
        return Religion::query()
            ->orderBy('sorting')
            ->get();

    }

    public function religionSlug($slug) {
        return Religion::query()->where('slug', $slug)
            ->first();

    }

    public function religionId($id) {
        return Religion::query()->where('id', $id)
            ->first();

    }

    public function catRegobjects($id) {
        return CatRegobject::query()->where('religion_id', $id)
            ->orderBy('sorting')
            ->get();

    }
    public function categoryId($id) {
        return CatRegobject::query()->where('id', $id)
            ->first();

    }
    public function categorySlug($slug) {
        return CatRegobject::query()->where('slug', $slug)
            ->first();

    }



}
