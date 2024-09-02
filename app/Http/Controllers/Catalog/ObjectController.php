<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;

class ObjectController extends Controller
{
    /**
     * @return array
     * активная религия
     *
     */

    public function religion($religion_slug){
        return   CatalogViewModel::make()->religionSlug($religion_slug);

    }
    /**
     * @return array
     * Религиозный объект
     */

    public function item($object_slug){
        return ObjectsViewModel::make()->objectSlug($object_slug);

    }

    /**
     * @return array
     * все религии
     */

    public function religions(){
        return CatalogViewModel::make()->religionList();

    }

    /**
     * @return array
     * Все субъекты РФ
     */

    public function areas(){
        return AreaViewModel::make()->areaList();

    }

    /**
     * @return array
     * Один субъект РФ
     */

    public function area($id){
        return AreaViewModel::make()->areaId($id);

    }

    /**
     * @return array
     * спискоk категорий определенной религии
     */

    public function categories($religion_id){
      return CatalogViewModel::make()->catRegobjects($religion_id);

    }

    /**
     * @return array
     * категория определенной религии
     */

    public function category($cat_id){
      return CatalogViewModel::make()->categoryId($cat_id);

    }

    /**
     * @return array
     * список объектов определенной категории и региона
     */

    public function items($religion, $selected_area, $selected_religion_category){
      return ObjectsViewModel::make()->objects($religion, $selected_area, $selected_religion_category);

    }

    /**
     * @return array
     * страница новости объекта
     */

    public function new($slug){
      return ObjectsViewModel::make()->new($slug);

    }


    /**
     * @return array
     * страница в левое меню
     */

    public function object_page($slug){
      return ObjectsViewModel::make()->object_page($slug);

    }

    /**
     * @return array
     * страница в полезную информацию
     */

    public function object_info($slug) {
      return ObjectsViewModel::make()->object_info($slug);

    }

    /**
     * @return array
     * страница в полезную информацию
     */

    public function object_about($slug) {
      return ObjectsViewModel::make()->object_about($slug);

    }
    /**
     * @return array
     * страница в деятельность
     */

    public function object_activity($slug) {
      return ObjectsViewModel::make()->object_activity($slug);

    }    /**
     * @return array
     * страница в обряды
     */

    public function object_ritual($slug) {
      return ObjectsViewModel::make()->object_ritual($slug);

    }


    /**
     * @return array
     * страница media
     */

    public function object_media($slug) {
      return ObjectsViewModel::make()->object_media($slug);

    }



    /**
     * view
     * страница  объекта исключена!!!
     */

    public function pageObjectHome($religion_slug, $object_slug)
    {

        $item = $this->item($object_slug); /** Религиозный объект **/


        if(!$item) {
            abort(404);
        }


        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.object',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }



    /**
     * view
     * страница  о нас
     */


    public function pageObjectAbout($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.about',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


    /**
     * view
     * страница  о нас внутренние
     */


    public function pageObjectAboutPage($religion_slug, $object_slug, $slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/
        $page = $this->object_about($slug); /** Страница в выпадающем списке "О нас" **/

        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.inside.about',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'page' => $page,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }



    /**
     * view
     * страница  деятельность
     */


    public function pageObjectActivity($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.activity',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


    /**
     * view
     * страница  деятельность внутренние
     */


    public function pageObjectActivityPage($religion_slug, $object_slug, $slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/
        $page = $this->object_activity($slug); /** Страница в выпадающем списке "О нас" **/

        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.inside.activity',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'page' => $page,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


    /**
     * view
     * страница  деятельность
     */


    public function pageObjectRitual($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.ritual',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


    /**
     * view
     * страница  деятельность внутренние
     */


    public function pageObjectRitualPage($religion_slug, $object_slug, $slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/
        $page = $this->object_ritual($slug); /** Страница в выпадающем списке "О нас" **/

        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.inside.ritual',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'page' => $page,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }




    /**
     * view
     * страница  media
     */

    public function pageObjectMedia($religion_slug, $object_slug, $slug)
    {

        $page = $this->object_media($slug); /** Страница в выпадающем списке "Media" **/
        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.inside.media',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'page' => $page,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

    /**
     * view
     * страница  faq
     */

    public function pageObjectFaq($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.faq',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


  /**
     * view
     * страница  video - не работает!!!!!!!!!!!!!!
     */

    public function pageObjectVideo($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.video',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

    /**
     * view
     * страница  полезная информация
     */

    public function pageObjectInfo($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.info',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

  /**
     * view
     * страница  "полезная информация" - внутренняя
     */

    public function pageObjectInfoPage($religion_slug, $object_slug, $slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/
        $page = $this->object_info($slug); /** Страница в выпадающем списке "Полезная информация" **/

        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.inside.info',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'page' => $page,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

    /**
     * view
     * страница  контактов объекта
     */

    public function pageObjectContact($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.contact',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


   /**
     * view
     * страница  новостей - категория
     */

    public function pageObjectNewCategory($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.new_category',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

   /**
     * view
     * страница  новостей - полная страница
     */

    public function pageObjectNew($religion_slug, $object_slug, $new_slug )
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        $new = $this->new($new_slug);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.new',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
                'new' => $new,
            ]);
    }


    /**
     * view
     * страница  страница объекта - полная страница
     */

    public function pageObjectPage($religion_slug, $object_slug, $page_slug )
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        $page = $this->object_page($page_slug);
        if(!$page) {
            abort(404);
        }



        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.page',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
                'page' => $page,
            ]);
    }

}
