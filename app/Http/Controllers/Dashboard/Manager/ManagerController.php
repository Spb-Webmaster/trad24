<?php

namespace App\Http\Controllers\Dashboard\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Domain\Manager\ViewModels\MUserArticleViewModel;
use Domain\Manager\ViewModels\MUserPhotoViewModel;
use Domain\Manager\ViewModels\MUserViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\Request;

class ManagerController extends Controller
{

    /**
     * @return
     * спискок пользователей для менеджера
     */

    public function users()
    {

        $user = auth()->user();

        $items = MUserViewModel::make()->users();

        return view('dashboard.manager.user.users', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    /**
     * @return
     * пользователь для менеджера по id
     */

    public function user($user_id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($user_id);

        return view('dashboard.manager.user.user', [
            'user' => $user,
            'item' => $item,
        ]);
    }



    /**
     * @return
     * фотографии для менеджера по id
     */

    public function m_user_photos($user_id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($user_id); /** просматриваемый пользователь */
        $items = MUserPhotoViewModel::make()->photos($user_id); /** фото этого пользователя */

        return view('dashboard.manager.user.user_photos', [
            'user' => $user,
            'item' => $item,
            'items' => $items,
        ]);
    }



    /**
     * @return
     * видеофайлы для менеджера на определенного менеджера
     */

    public function m_user_videos($user_id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($user_id); /** просматриваемый пользователь */
        $items = MUserPhotoViewModel::make()->photos($user_id); /** фото этого пользователя */

        return view('dashboard.manager.user.user_videos', [
            'user' => $user,
            'item' => $item,
            'items' => $items,
        ]);
    }



    /**
     * @return
     * определенное видео для менеджера на определенного менеджера
     */

    public function m_user_video($user_id, $id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($user_id); /** просматриваемый пользователь */
        $items = MUserPhotoViewModel::make()->photos($user_id); /** фото этого пользователя */

        return view('dashboard.manager.user.inside.user_video', [
            'user' => $user,
            'item' => $item,
            'items' => $items,
        ]);
    }


    /**
     * @return
     * статьи для менеджера на определенного менеджера
     */

    public function m_user_articles($user_id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($user_id); /** просматриваемый пользователь */
        $items = MUserArticleViewModel::make()->articles($user_id); /** статьи  этого пользователя */

        return view('dashboard.manager.user.user_articles', [
            'user' => $user,
            'item' => $item,
            'items' => $items,
        ]);
    }



    /**
     * @return
     * определенная статья для менеджера на определенного менеджера
     */

    public function m_user_article($user_id, $id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($user_id); /** просматриваемый пользователь */
        $it = MUserArticleViewModel::make()->article($user_id, $id); /** статья этого пользователя */



        return view('dashboard.manager.user.inside.user_article', [
            'user' => $user,
            'item' => $item,
            'it' => $it,
        ]);
    }






    /**
     * Метод вывода всех пользователей по полям name,username,email
     */
    public function user_search(UserSearchRequest $request)
    {


        $user = auth()->user();

        $items = MUserViewModel::make()->user_search($request);

        if (!count($items)) {
            flash()->alert(config('message_flash.alert.search_error'));
        }

        return view('dashboard.manager.user.users', [
            'user' => $user,
            'items' => $items,

        ]);

    }


    /**
     * @param Request $request
     * блокировать
     */

    public function blocked(Request $request)
    {

        UserViewModel::make()->blocked($request->id);
        return redirect()->back();

    }

    /**
     * @param Request $request
     * разблоктровать
     */

    public function unblock(Request $request)
    {

        UserViewModel::make()->unblock($request->id);
        return redirect()->back();

    }

    /**
     * отчеты
     * спискок отчетов
     */

    public function reports()
    {

        $user = auth()->user();

        $items = MReportViewModel::make()->reports();
        if (!$items) {
            abort(404);
        }
        return view('dashboard.manager.report.reports', [
            'user' => $user,
            'items' => $items,
        ]);

    }

    /**
     *
     *  отчет по id
     */

    public function report($id)
    {

        $user = auth()->user();

        $item = MReportViewModel::make()->report($id);
        if (!$item) {
            abort(404);
        }

        return view('dashboard.manager.report.report', [
            'user' => $user,
            'item' => $item,
        ]);

    }


    /**
     * Метод вывода всех пользователей по полям name,username,email у кого есть отчеты на модерации
     */
    public function search_user_report(UserSearchRequest $request)
    {


        $user = auth()->user();

        $items = MReportViewModel::make()->search_user_report($request);
        if (!count($items)) {
            flash()->alert(config('message_flash.alert.search_error'));
        }
        return view('dashboard.manager.report.reports', [
            'user' => $user,
            'items' => $items,
        ]);

    }


    /**
     * @param Request $request
     * блокировать
     */


    public function blocked_report(Request $request)
    {
        ReportViewModel::make()->blocked_report($request);
        flash()->alert(config('message_flash.alert.manager_blocked_report'));
        return redirect(route('m_reports'));

    }

    /**
     * @param Request $request
     * разблоктровать
     */

    public function unblock_report(Request $request)
    {

        ReportViewModel::make()->unblock_report($request);
        flash()->info(config('message_flash.info.manager_unblock_report'));
        return redirect(route('m_reports'));

    }

    /**
     * комментарии
     */
    public function comments()
    {

        $user = auth()->user();

        $items = MCommentViewModel::make()->comments();

        if (!$items) {
            abort(404);
        }
        return view('dashboard.manager.comment.comments', [
            'user' => $user,
            'items' => $items,
        ]);


    }

    /**
     *
     *  отзыв по id
     */

    public function comment($id)
    {

        $user = auth()->user();

        $item = MCommentViewModel::make()->comment($id);
        if (!$item) {
            abort(404);
        }

        return view('dashboard.manager.comment.comment', [
            'user' => $user,
            'item' => $item,
        ]);

    }


    /**
     ** удалить отзыв
     */
    public function delete_comment(Request $request)
    {


        $result = MCommentViewModel::make()->delete_comment($request->id);

        return redirect(route('m_comments'));

    }

    /**
     * опубликовываем отзыв
     */
    public function published_comments(Request $request)
    {


        $result = MCommentViewModel::make()->published_comments($request->id);

        return redirect(route('m_comments'));

    }




}
