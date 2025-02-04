<?php
namespace Domain\UserPeople\ViewModels;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Support\Traits\Makeable;

class UserPeopleViewModel
{
    use Makeable;

    /**
     * @return array|LengthAwarePaginator
     * все польтзователи
     */
    public function userPeoples():array | LengthAwarePaginator
    {
        $users =  User::query()->where('published', 1)
            ->with('user_photo')
            ->with('user_video')
            ->with('user_article')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));

        if($users) {
            return $users;
        }
        return [];
    }



    public function userPeople($id):model | bool
    {
        $user =  User::query()
            ->where('published', 1)
            ->where('id', $id)
            ->first();

        if($user) {
            return $user;
        }
        return false;
    }

}
