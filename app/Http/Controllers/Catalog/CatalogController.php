<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CatRegobject;
use App\Models\Regobject;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;
use Domain\Info\ViewModels\InfoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogController extends Controller
{

    /**
     * view
     * страница религии
     */
    public function religion($slug)
    {

        $religion = CatalogViewModel::make()->religionSlug($slug); // активная религия
        if (!$religion) {
            abort(404);
        }

        $religions = CatalogViewModel::make()->religionList(); // все религии

        return view('pages.catalog.religion.religion',
            [
                'religion' => $religion,
                'religions' => $religions
            ]);
    }


    /**
     * view
     * страница религии из select
     */
    public function religionSubmit(Request $request)
    {

        $religion = CatalogViewModel::make()->religionId($request->religion); // активная религия
        if (!$religion) {
            abort(404);
        }
        return redirect(route('religion', ['slug' => $religion->slug]));

    }


    /**
     * view
     * страница региона из select
     */
    public function areaSubmit(Request $request)
    {
        $religion = CatalogViewModel::make()->religionId($request->religion); //  религия
        if (!$religion) {
            abort(404);
        }
        return redirect(route('religion.area.list', ['slug' => $religion->slug, 'id' => $request->area]));


    }


    /**
     * view
     * страница категории религии из select
     */
    public function religion_categorySubmit(Request $request)
    {
        /**
         * получаем религию, регион, и категорию религии
         */
        $religion_category = CatalogViewModel::make()->categoryId($request->religion_category);
        /** активная категория религии **/
        if (!$religion_category) {
            abort(404);
        }
        if ($religion_category->religion) {
            $religion_slug = $religion_category->religion->slug;
            $religion_category_slug = $religion_category->slug;
        }


        return redirect(route('religion.area.category.list', ['religion_slug' => $religion_slug, 'area_id' => $request->area, 'religion_gategory_slug' => $religion_category_slug]));

    }


    public function bigSearch(Request $request)
    {


        $search = $request->top_search;

        if (is_null($request->object)) {

            if(is_null($search)) {
                return redirect()->back();
            }


            if ($search) {
                $items = Regobject::query()
                    ->where('published', 1)
                    ->where('religion_id', $request->religion)
                    ->where('area_id', $request->area)
                    ->where("title", "like", "%" . $search . "%")
                    ->with('religion')
                    ->with('area')
                    ->paginate(20);
            }

            return view('pages.catalog.list_search.list',
                [
                    'search' => $search,
                    'items' => $items,
                ]);
        } else {

            if(is_null($search)) {
                return redirect()->back();
            }

            //dd($request->all());
            $object = Regobject::query()
                ->where('published', 1)
                ->with('religion')
                ->where('id', $request->object)->first();
            if (isset($object->religion)) {
                return redirect()->route('page.object.about', ['religion_slug' => $object->religion->slug, 'object_slug' => $object->slug]);
            }


        }
        abort(404);

    }

    public function topSearch(Request $request)
    {


        $search = $request->top_search;
        if ($search) {
            $items = Regobject::query()
                ->where('published', 1)
                ->where("title", "like", "%" . $search . "%")
                ->with('religion')
                ->with('area')
                ->paginate(20);
        }

        return view('pages.catalog.list_search.list',
            [
                'search' => $search,
                'items' => $items,
            ]);
    }

    /** -   --------------------------------------------------   -  **/


    /**
     * view
     * страница списка объектов и религий
     */

    public function religionAreaListObjects($slug, $id)
    {

        $religion = CatalogViewModel::make()->religionSlug($slug);
        /** активная религия **/
        if (!$religion) {
            abort(404);
        }
        $religions = CatalogViewModel::make()->religionList();
        /** все религии **/
        $areas = AreaViewModel::make()->areaList();
        /** Все субъекты РФ **/
        $selected_area = AreaViewModel::make()->areaId($id);
        /** Один субъект РФ **/
        if (!$selected_area) {
            abort(404);
        }
        $religion_categories = CatalogViewModel::make()->catRegobjects($religion->id);
        /** спискоk категорий определенной религии **/
        $items = ObjectsViewModel::make()->objects($religion, $selected_area);

        return view('pages.catalog.list_objects.religion_area_list_objects',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'religion_categories' => $religion_categories,
            ]);
    }

    /**
     * view
     * страница списка объектов и религий и категории религии
     */

    public function religionAreaListCategoryObjects($religion_slug, $area_id, $religion_gategory_slug)
    {


        $religion = CatalogViewModel::make()->religionSlug($religion_slug);
        /** активная религия **/
        if (!$religion) {
            abort(404);
        }
        $religions = CatalogViewModel::make()->religionList();
        /** все религии **/
        $areas = AreaViewModel::make()->areaList();
        /** Все субъекты РФ **/
        $selected_area = AreaViewModel::make()->areaId($area_id);
        /** Один субъект РФ **/
        if (!$selected_area) {
            abort(404);
        }
        $religion_categories = CatalogViewModel::make()->catRegobjects($religion->id);
        /** спискоk категорий определенной религии **/
        $selected_religion_category = CatalogViewModel::make()->categorySlug($religion_gategory_slug);
        /**  категорий определенной религии **/
        if (!$selected_religion_category) {
            abort(404);
        }
        $items = ObjectsViewModel::make()->objects($religion, $selected_area, $selected_religion_category);

        return view('pages.catalog.list_objects.religion_area_category_list_objects',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


}
