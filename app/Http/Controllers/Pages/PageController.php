<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Religion;

class PageController extends Controller
{
    /**
     * Вывод страницы
     */
    public function page(Page $page)
    {

        return view('pages.page',
            [
                'page' => $page,
            ]);
    }
    /**
     * Вывод страницы с религиями
     */
    public function religionList()
    {

        $religions = Religion::query()->get();

        return view('pages.religion_list',
            [
                'page' => $religions,
            ]);
    }



}
