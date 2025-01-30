<?php
namespace Domain\UserPhoto\ViewModels;

use App\Models\UserArticle;
use App\Models\UserPhoto;
use Storage;
use Support\Traits\Makeable;

class UserPhotoViewModel
{
    use Makeable;

    public function userPhotos($user_id)
    {
        return UserPhoto::query()->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
    }

    public function create($user_id, $filename)
    {
        return UserPhoto::create([
            'user_id' => $user_id,
            'img' => $filename
        ]);
    }


}

