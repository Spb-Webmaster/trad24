<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyCulture;
use App\Models\FamilyMain;
use App\Models\FamilyMedia;
use App\Models\FamilyPage;
use App\Models\FamilyPeople;

use Domain\Family\ViewModels\FamilyObjectsViewModel;

class FamilyObjectController extends Controller
{


    /**
     * @return array
     * фамилия !
     */

    public function item($slug){
        return FamilyObjectsViewModel::make()->objectSlug($slug);

    }

    /**
     * @return array
     * выпадающая !
     */

    public function page($model, $slug){
        return FamilyObjectsViewModel::make()->page($model, $slug);

    }


    /**
     * @return array
     * список новостей
     */

    public function news($id){
        return FamilyObjectsViewModel::make()->news($id);

    }

    /**
     * @return array
     * новость
     */

    public function new($slug){
        return FamilyObjectsViewModel::make()->new($slug);

    }



    /**
     * Главная *
     *
     *
     * ///////////
     */

    public function family($slug) {
        $item = $this->item($slug); /** фамилия  **/

         return view('pages.family.object.object',
            [
                'item' => $item,
            ]);
    }


    /**
     * Глава фамилии - выпадающее
     */
    public function family_main($family_slug, $slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        $page = $this->page(FamilyMain::class, $slug); /** внутреннии   **/


        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }


         return view('pages.family.object.inside.inside_page',
            [
                'item' => $item,
                'page' => $page,
            ]);
    }



    /**
     * Новости  фамилии - Категория
     */
    public function family_news($family_slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        if(!$item) {
            abort(404);
        }

        $news = $this->news($item->id); /** новости список с пагинацией   **/


        if(!$news) {
            abort(404);
        }


         return view('pages.family.object.new_category',
            [
                'item' => $item,
                'news' => $news,
            ]);
    }

    /**
     * Новости  фамилии - полная страница
     */
    public function family_new($family_slug, $slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        if(!$item) {
            abort(404);
        }

        $new = $this->new($slug); /** новости страница   **/


        if(!$new) {
            abort(404);
        }


         return view('pages.family.object.inside.inside_new',
            [
                'item' => $item,
                'new' => $new,
            ]);
    }



    /**
     * Медиа
     */
    public function family_media($family_slug, $slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        $page = $this->page(FamilyMedia::class, $slug); /** внутреннии   **/


        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }


        return view('pages.family.object.inside.inside_media',
            [
                'item' => $item,
                'page' => $page,
            ]);
    }



    /**
     * Благотворительность
     */
    public function family_charity($family_slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        if(!$item) {
            abort(404);
        }


         return view('pages.family.object.object_charity',
            [
                'item' => $item,
           ]);
    }



    /**
     * Люди
     */
    public function family_peoples($family_slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        if(!$item) {
            abort(404);
        }


         return view('pages.family.object.object_people',
            [
                'item' => $item,
           ]);
    }

    /**
     * Люди внутренняя
     */
    public function family_people($family_slug, $slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        $page = $this->page(FamilyPeople::class, $slug); /** внутреннии   **/


        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }


        return view('pages.family.object.inside.inside_page',
            [
                'item' => $item,
                'page' => $page,
            ]);
    }




    /**
     * Культурное настледие
     */
    public function family_cultures($family_slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        if(!$item) {
            abort(404);
        }


         return view('pages.family.object.object_culture',
            [
                'item' => $item,
           ]);
    }

    /**
     * Культурное наследие внутренняя
     */
    public function family_culture($family_slug, $slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        $page = $this->page(FamilyCulture::class, $slug); /** внутреннии   **/


        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }


        return view('pages.family.object.inside.inside_page',
            [
                'item' => $item,
                'page' => $page,
            ]);
    }

    /**
     * Страницы в левое меню
     */
    public function family_page($family_slug, $slug) {

        $item = $this->item($family_slug); /** фамилия  **/

        $page = $this->page(FamilyPage::class, $slug); /** внутреннии   **/


        if(!$item) {
            abort(404);
        }

        if(!$page) {
            abort(404);
        }


        return view('pages.family.object.inside.inside_page',
            [
                'item' => $item,
                'page' => $page,
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
