<?php

namespace Domain\Family\ViewModels;

use App\Models\Family;
use App\Models\FamilyGallery;
use App\Models\FamilyNew;
use Illuminate\Database\Eloquent\Model;
use Support\Traits\Makeable;

class FamilyObjectsViewModel
{
    use Makeable;

    public function objects()
    {
        $query = Family::query();
        $query->where('published', 1);
        $query->orderBy('title', 'asc');
        $result = $query->paginate(config('site.constants.paginate'));
        return $result;

    }

    public function objectSlug($slug)
    {
        return Family::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }

    public function page($model, $slug)
    {


        return $model::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }

    public function slider_news($id)
    {
        return FamilyNew::query()
            ->where('published', 1)
            ->where('family_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));


    }

    public function news($id)
    {
        return FamilyNew::query()
            ->where('published', 1)
            ->where('family_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));


    }


    public function new($slug)
    {
        return FamilyNew::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }

    public function galleries($id)
    {
        return FamilyGallery::query()
            ->where('published', 1)
            ->where('family_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));


    }


    public function gallery($slug)
    {
        return FamilyGallery::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }

}
