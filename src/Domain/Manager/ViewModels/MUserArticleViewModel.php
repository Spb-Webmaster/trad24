<?php

namespace Domain\Manager\ViewModels;


use App\Models\User;
use App\Models\UserArticle;
use App\Models\UserPhoto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class MUserArticleViewModel
{
    use Makeable;

    /**
     * все статьи    user-a
     */

    public function articles($user_id)
    {

        $articles = UserArticle::query()
            ->where('user_id', $user_id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $articles;
    }

    /**
     * одна статья  user-a
     */

    public function article($user_id, $id)
    {

        $article = UserArticle::query()
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->with('user')
            ->first();
        return $article;
    }

  /**
     * удаляем статью (массив)
     */

    public function delete_articles($ids)
    {

        foreach ($ids as $k => $tic) {
            $objects[] = $tic['object'];
        }

        return UserArticle::whereIn('id',$objects)
            ->delete();
    }

  /**
     * удаляем статью (одно)
     */

    public function delete_article($id)
    {

        $result = UserArticle::query()
            ->where('id', $id)
            ->delete();
        return $result;
    }


}
