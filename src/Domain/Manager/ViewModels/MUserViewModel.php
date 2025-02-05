<?php

namespace Domain\Manager\ViewModels;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class MUserViewModel
{
    use Makeable;



    public function users()
    {


        $users = User::query()
            ->orderBy('published', 'asc')
            ->orderBy('created_at', 'desc')
            ->with('user_photo')
            ->with('user_video')
            ->with('user_article')
            /*            ->withAggregate('user_list', 'title')
                        ->orderBy('user_list_title', 'desc')
                        ->orderBy('user_diplom', 'desc')
                        ->orderBy('avatar', 'desc')*/
            ->paginate(config('site.constants.paginate'));
        return $users;
    }

    /**
     * @param $id
     * аккаунт usera
     */

    public function user($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->with('user_list')
            ->with('user_type')
            ->with('user_language')
            ->with('user_city')
            ->first();
        return $user;
    }


    public function  user_search($request)
    {
        $users = User::query()
            ->where("name", "like", "%" . $request->search . "%")
            ->orWhere("username", "like", "%" . $request->search . "%")
            ->orWhere("email", "like", "%" . $request->search . "%")
            ->paginate(config('site.constants.paginate'));

        if($users) {
            return $users;
        }
        return [];

    }

}
