<?php

namespace App\Http\Controllers\Dashboard\UserArticle;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleFormRequest;

use Domain\UserArticle\ViewModels\UserArticleViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function articles($user_id)
    {
        $user = auth()->user();

        if ($user->id == $user_id) {

            $items = UserArticleViewModel::make()->articles($user->id);

            return view('dashboard.user_articles.user_articles', [
                'user' => $user,
                'items' => $items
            ]);
        }
        abort(404);


    }

    public function article($user_id, $id)
    {

        $user = auth()->user();

        if ($user->id == $user_id) {

            $item = UserArticleViewModel::make()->article($id);

            return view('dashboard.user_articles.user_article', [
                'user' => $user,
                'item' => $item
            ]);
        }
        abort('404');

    }

    public function edit($user_id, $id)
    {

        $user = auth()->user();

        if ($user->id == $user_id) {

            $item = UserArticleViewModel::make()->article($id);

            return view('dashboard.user_articles.user_article_edit', [
                'user' => $user,
                'item' => $item
            ]);
        }
        abort('404');

    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * @param ArticleFormRequest $request
     * @return RedirectResponse
     *
     */

    public function articleCreate(ArticleFormRequest $request)
    {
        $user = auth()->user();

        if($request->user_id == $user->id) {

            if (UserArticleViewModel::make()->create($request)) {

                flash()->info(config('message_flash.info.user_article_successes'));
            }
            return redirect()->back();
        }

           flash()->alert(config('message_flash.alert.role_error'));
           return redirect()->route('cabinet.articles', ['user_id' =>  $user->id]);


    }

    public function articleUpdate(ArticleFormRequest $request)
    {
        $user = auth()->user();

        if($request->user_id == $user->id) {

            if (UserArticleViewModel::make()->update($request)) {

                flash()->info(config('message_flash.info.user_article_update'));
            }

            return redirect()->back();
        }

        flash()->alert(config('message_flash.alert.role_error'));
        return redirect()->route('cabinet.articles', ['user_id' =>  $user->id]);

    }

    public function articleDelete(Request $request)
    {
        $user = auth()->user();

        if (UserArticleViewModel::make()->delete($request->id)) {

            flash()->info(config('message_flash.info.user_article_delete'));
        }
        return redirect()->route('cabinet.articles', ['user_id' =>  $user->id]);


    }


}
