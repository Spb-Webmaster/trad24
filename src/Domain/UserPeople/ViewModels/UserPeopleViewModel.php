<?php
namespace Domain\UserPeople\ViewModels;

use App\Models\User;
use Storage;
use Support\Traits\Makeable;

class UserPeopleViewModel
{
    use Makeable;

    public function userPeoples() {
        return User::query()->where('published', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

}
