<?php
namespace Domain\UserArticle\ViewModels;

use App\Models\UserArticle;
use App\Models\UserPhoto;
use Storage;
use Support\Traits\Makeable;

class UserArticleViewModel
{
    use Makeable;

    public function create($request) {
        $user = auth()->user();
       return UserArticle::create([
            'user_id' => $user->id,
            'title' => $request->title_article,
            'article' => textarea($request->article),
        ]);
    }

    public function articles($user_id) {

        return  UserArticle::query()
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
    }

    public function article($id) {

        $article  = UserArticle::find($id);
        $article->increment('viewer');
        return $article;


    }

    public function update($request) {

        $user = auth()->user();

      return UserArticle::query()
            ->where('id', $request->id)
            ->where('user_id', $user->id)
            ->update([
                'title' => $request->title_article,
                'article' => textarea($request->article),
            ]);

    }


    public function delete($id) {

        $user = auth()->user();

       return UserArticle::query()
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->delete();

    }

}
