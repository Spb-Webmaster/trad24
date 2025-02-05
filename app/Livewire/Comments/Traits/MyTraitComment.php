<?php

namespace App\Livewire\Comments\Traits;


use Illuminate\Database\Eloquent\Model;

trait MyTraitComment
{

    public function create_comment($create, $model, $prefix ) {

        $create['text'] = textarea($create['text']);
        $create['user_'. $prefix .'_id'] = ($create['article_id'])??null;
        $create['user_'. $prefix .'_comment_id'] = ($create['comment_id'])??null;

        $result  = $model::create($create);
        if($result) {
            return true;
        }
        return  false;
    }




    public function load_comments($model, $prefix, $article_id ) {

        $result =  $model::query()
            ->where('user_'. $prefix .'_id', $article_id)
            ->where('user_'. $prefix .'_comment_id', null)
            ->where('published', 1)
            ->where('published', 1)
            ->with('user')
            ->with('find')
            ->with('parent')
            ->with('article')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        if($result) {
            return $result;
        }
        return  [];
    }

    public function load_comments_count($model, $prefix, $article_id ) {

        $result =  $model::query()
            ->where('user_'. $prefix .'_id', $article_id)
            ->where('published', 1)
            ->count();
        if($result) {
            return $result;
        }
        return  0;
    }


    public function delete_comment($model, $prefix, $article_id, $comment_id ) {

        $result  = $model::query()
            ->where('id' , $comment_id)
            ->where('user_'. $prefix .'_id' , $article_id)
            ->delete();

        if($result) {
            return $result;
        }
        return  0;
    }

}
