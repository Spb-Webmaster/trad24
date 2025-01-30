<?php
namespace Domain\Catalog\ViewModels;

use App\Models\CatRegobject;
use App\Models\Regobject;
use App\Models\RegobjectAbout;
use App\Models\RegobjectActivity;
use App\Models\RegobjectInfo;
use App\Models\RegobjectMedia;
use App\Models\RegobjectNew;
use App\Models\RegobjectPage;
use App\Models\RegobjectRitual;
use App\Models\Religion;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class ObjectsViewModel
{
    use Makeable;

    public function objects($religion = null, $area = null, $religion_category = null)
    {
       $query = Regobject::query();
       if($religion) {
           $query->where('religion_id', $religion->id);
       }
       if($area) {
           $query->where('area_id', $area->id);
       }
       if($religion_category) {
           $query->where('cat_regobject_id', $religion_category->id);
       }
       $query->where('published', 1);
       $query->orderBy('created_at', 'desc');
       $result = $query->paginate(config('site.constants.paginate'));
        return $result;

    }

    public function objectSlug($slug)
    {
        return Regobject::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->with('regobject_new')
            ->with('regobject_page')
            ->first();

    }
    public function objectId($id)
    {
        return Regobject::query()
            ->where('published', 1)
            ->where('id', $id)
            ->first();

    }
    public function new($slug)
    {
        return RegobjectNew::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }
    public function object_page($slug)
    {

        return RegobjectPage::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }
    public function object_info($slug)
    {

        return RegobjectInfo::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }
    public function object_about($slug)
    {

        return RegobjectAbout::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }
    public function object_activity($slug)
    {

        return RegobjectActivity::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }    public function object_ritual($slug)
    {

        return RegobjectRitual::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }
    public function object_media($slug)
    {

        return RegobjectMedia::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }


}
