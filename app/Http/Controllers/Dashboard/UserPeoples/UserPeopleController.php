<?php

namespace App\Http\Controllers\Dashboard\UserPeoples;

use App\Http\Controllers\Controller;
use Domain\UserPeople\ViewModels\UserPeopleViewModel;
use Domain\UserPhoto\ViewModels\UserPhotoViewModel;

class UserPeopleController extends Controller
{

    /**
     * @return []
     * список пользователей для всех
     */
    public function peoples()
    {
        $user = auth()->user();
        $items = [];


        if ($user->id) {
            $items =  UserPeopleViewModel::make()->userPeoples();

            return view('dashboard.user_peoples.user_peoples', [
                'user' => $user,
                'items' => $items
            ]);
        }
        abort(404);


    }


}
