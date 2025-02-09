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
            ->with('user_photo')
            ->with('user_video')
            ->with('user_article')
            ->first();
        return $user;
    }


    public function published_user($request)
    {
        $user = User::query()
            ->where('id', $request->id)
            ->update([
                'published' => $request->published
            ]);

        if ($user) {
            return $user;
        }
        return false;

    }


    public function user_search($request)
    {
        $users = User::query()
            ->where("name", "like", "%" . $request->search . "%")
            ->orWhere("username", "like", "%" . $request->search . "%")
            ->orWhere("email", "like", "%" . $request->search . "%")
            ->paginate(config('site.constants.paginate'));

        if ($users) {
            return $users;
        }
        return [];

    }


    /**
     * @param $request
     * удалить много элементов таблицы
     */

    public function delete_objects($request)
    {

        $result = [];

        $model = $request->model; // модель типа App\Models\UserArticle
        if($model) {
            foreach ($request->objects as $id) {
                if ($row = $model::findOrFail($id['object'])) {

                    $result[] = $row->delete();

                }
            }
        }

        return $result;
    }


    /**
     * @param $request
     * удалить определенную сущьность
     */

    public function delete_one_object($request)
    {

        if ($request->model) {


            $model = $request->model; // модель типа App\Models\UserArticle
            if($row = $model::findOrFail($request->object)) {

                $result = $row->delete();
                return $result;
            }



        }
        return false;
    }


}
