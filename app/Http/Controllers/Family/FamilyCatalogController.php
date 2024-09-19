<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\CatRegobject;
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

        return view('pages.family.list_objects.list_objects',
            [
                'items' => $items,
            ]);
    }


}
