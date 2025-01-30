<?php

namespace App\Http\Controllers\Dashboard\UserPeoples\People;

use App\Http\Controllers\Controller;
use Domain\UserPeople\ViewModels\UserPeopleViewModel;
use Domain\UserPhoto\ViewModels\UserPhotoViewModel;

class UserPeoplePhotosController extends Controller
{
    /**
     * @return []
     * данные  одного  пользователя сразу фотогалерея
     */
    public function people_photos($user_id)
    {
        $user = auth()->user();
        $items = [];


        if ($user->id) {

            $item =  UserPeopleViewModel::make()->userPeople($user_id);
            $items =  UserPhotoViewModel::make()->userPhotos($user_id);

            return view('dashboard.user_peoples.people.user_people_photos', [
                'user' => $user,
                'item' => $item,
                'items' => $items,
            ]);
        }
        abort(404);

    }


}
