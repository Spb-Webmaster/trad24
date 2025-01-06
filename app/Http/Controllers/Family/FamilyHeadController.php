<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use Domain\Family\ViewModels\FamilyObjectsViewModel;
use Illuminate\Database\Eloquent\Collection;

class FamilyHeadController extends Controller
{

    /**
     * @return
     * список фамилий
     */
    public function head_familyname()
    {
        $items = FamilyObjectsViewModel::make()->objects();



        return view('pages.family.head_family.head_family', [
            'items' => $items
        ]);

    }

}
