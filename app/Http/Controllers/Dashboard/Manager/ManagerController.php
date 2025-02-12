<?php

namespace App\Http\Controllers\Dashboard\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Domain\Manager\ViewModels\MUserArticleViewModel;
use Domain\Manager\ViewModels\MUserPhotoViewModel;
use Domain\Manager\ViewModels\MUserVideoViewModel;
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
        $items = MUserVideoViewModel::make()->videos($user_id); /** видео этого пользователя */

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

  public function photos() {

      $user = auth()->user();

      $items = MUserPhotoViewModel::make()->new_photos(); /** новые фото */

      return view('dashboard.manager.photos.photos', [
          'user' => $user,
          'items' => $items,
      ]);


  }




}
