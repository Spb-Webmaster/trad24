<?php

namespace App\View\Composers;

use App\Models\Religion;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Menu\ViewModels\MenuViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuTopComposer
{
    public function compose(View $view): void
    {

       $menu = Cache::rememberForever('top_menu', function () {
         return MenuViewModel::make()->top_menu(); // Верхнее миеню
         });


       $religions  = Religion::query()->get();

          foreach ($religions as $r) {

                 $religion[$r->id] = '/r-'. $r->slug;

          }


               foreach ($menu as $k => $item)
               {
                   if($item->religion) {

                       foreach ($item->religion as $id)
                       {
                           if($religion[$id]) {

                               $n_religion[] = $religion[$id];

                           }
                       }

                       $n_m[$item->id]['religion'] = $n_religion;

                   } else {
                       $n_m[$item->id]['religion'] = [];

                   }

                   $n_m[$item->id]['menu'] = $item;

               }


                    $view->with([
                        'menu' => $n_m,
                    ]);

                }

}
