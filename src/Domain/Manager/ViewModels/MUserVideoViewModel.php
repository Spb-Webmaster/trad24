<?php

namespace Domain\Manager\ViewModels;


use App\Models\User;
use App\Models\UserArticle;
use App\Models\UserPhoto;
use App\Models\UserVideo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class MUserVideoViewModel
{
    use Makeable;

    /**
     * все видео     user-a
     */

    public function videos($user_id)
    {

        $articles = UserVideo::query()
            ->where('user_id', $user_id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $articles;
    }

    /**
     * одно видео  user-a
     */

    public function video($user_id, $id)
    {

        $article = UserVideo::query()
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->with('user')
            ->first();
        return $article;
    }


    public function new_videos() {

        $videos = UserVideo::query()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $videos;

    }

}
