<?php

namespace App\Http\Controllers\Dashboard\UserPeoples\People;

use App\Http\Controllers\Controller;
use Domain\UserPeople\ViewModels\UserPeopleViewModel;
use Domain\UserPhoto\ViewModels\UserPhotoViewModel;
use Domain\UserVideo\ViewModels\UserVideoViewModel;

class UserPeopleVideosController extends Controller
{
    /**
     * @return mixed
     * данные  одного  пользователя все видео
     */
    public function people_videos($user_id)
    {
        $user = auth()->user();
        $items = [];


        if ($user->id) {

            $item =  UserPeopleViewModel::make()->userPeople($user_id);
            $items =  UserVideoViewModel::make()->videos($user_id);

            return view('dashboard.user_peoples.people.user_people_videos', [
                'user' => $user,
                'item' => $item,
                'items' => $items,
            ]);
        }
        abort(404);

    }

    /**
     * @return mixed
     * данные  одного  пользователя одно видео
     */
    public function people_video($user_id, $id)
    {
        $user = auth()->user();

        if ($user->id) {

            $it =  UserVideoViewModel::make()->video($id);

            if(is_null($it)) {
                abort(404);
            }

            $item = UserPeopleViewModel::make()->userPeople($it->user_id);

            if(!$item) {
                abort(404);
            }

            return view('dashboard.user_peoples.people.inside.user_people_video', [
                'user' => $user,
                'item' => $item,
                'it' => $it,
            ]);

        }
        abort(404);

    }


}
