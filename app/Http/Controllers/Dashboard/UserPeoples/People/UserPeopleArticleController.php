<?php

namespace App\Http\Controllers\Dashboard\UserPeoples\People;

use App\Http\Controllers\Controller;
use Domain\UserArticle\ViewModels\UserArticleViewModel;
use Domain\UserPeople\ViewModels\UserPeopleViewModel;
use Domain\UserPhoto\ViewModels\UserPhotoViewModel;
use Domain\UserVideo\ViewModels\UserVideoViewModel;

class UserPeopleArticleController extends Controller
{
    /**
     * @return mixed
     * данные  одного  пользователя все статью
     */
    public function people_articles($user_id)
    {
        $user = auth()->user();
        $items = [];


        if ($user->id) {

            $item =  UserPeopleViewModel::make()->userPeople($user_id);
            $items =  UserArticleViewModel::make()->articles($user_id);

            return view('dashboard.user_peoples.people.user_people_articles', [
                'user' => $user,
                'item' => $item,
                'items' => $items,
            ]);
        }
        abort(404);

    }

    /**
     * @return mixed
     * данные  одного  пользователя одна статья
     */
    public function people_article($user_id, $id)
    {
        $user = auth()->user();

        if ($user->id) {

            $it =  UserArticleViewModel::make()->article($id);

            if(is_null($it)) {
                abort(404);
            }

            $item = UserPeopleViewModel::make()->userPeople($it->user_id);

            if(!$item) {
                abort(404);
            }

            return view('dashboard.user_peoples.people.inside.user_people_article', [
                'user' => $user,
                'item' => $item,
                'it' => $it,
            ]);

        }
        abort(404);

    }


}
