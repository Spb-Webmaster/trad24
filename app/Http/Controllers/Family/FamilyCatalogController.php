<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\CatRegobject;
use App\Models\Family;
use App\Models\Regobject;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;
use Domain\Family\ViewModels\FamilyObjectsViewModel;
use Domain\Info\ViewModels\InfoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FamilyCatalogController extends Controller
{


    /**
     * view
     * страница списка объектов и религий и категории религии
     */

    public function familyCategory()
    {

        $items = FamilyObjectsViewModel::make()->objects();

        //dd($items);

        return view('pages.family.list_objects.list_objects',
            [
                'items' => $items,
            ]);
    }

    /**
     * view
     *
     */


        public function topSearch(Request $request)
    {


        $search = $request->top_search;
        if ($search) {
            $items = Family::query()
                ->where('published', 1)
                ->where("title", "like", "%" . $search . "%")
                ->paginate(config('site.constants.paginate'));
        }

        return view('pages.family.list_search.list',
            [
                'search' => $search,
                'items' => $items,
            ]);
    }




}
