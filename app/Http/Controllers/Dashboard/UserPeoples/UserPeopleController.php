<?php

namespace App\Http\Controllers\Dashboard\UserPeoples;

use App\Http\Controllers\Controller;
use Domain\UserPeople\ViewModels\UserPeopleViewModel;
use Domain\UserPhoto\ViewModels\UserPhotoViewModel;

class UserPeopleController extends Controller
{
    public function peoples($id)
    {
        $user = auth()->user();
        $items = [];


        if ($user->id == $id) {
            $items =  UserPeopleViewModel::make()->userPeoples();

            return view('dashboard.user_peoples.user_peoples', [
                'user' => $user,
                'items' => $items
            ]);
        }
        abort(404);


    }


}
