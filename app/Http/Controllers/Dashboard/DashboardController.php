<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use Domain\User\ViewModels\UserViewModel;
use Domain\UserArticle\ViewModels\UserArticleViewModel;
use Domain\UserPhoto\ViewModels\UserPhotoViewModel;
use Domain\UserVideo\ViewModels\UserVideoViewModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{


    /**
     * настройки
     */
    public function page()
    {

        /**
         * Разделяем вход в cabinet - у каждого своя view
         */

          $user   = auth()->user();

        /**
         *  запустим сессию для проверки этого юзера в settingHandel
         */
        session(['user' => $user->id]); // запустим сессию



            return view('dashboard.cabinet',
                [
                    'user' => $user
                ]);



    }




    public function blocked()
    {
        /**
         *  для заблдоктрованного пользователя
         */
        $user = User::find(auth()->user()->id);

        return view('dashboard.blocked.cabinet_blocked',
                [
                    'user' => $user,
                ]);
    }



    /**
     * Метод загрузки аватара
     * НЕ ИСПОЛЬЗУЕМ, загрузка ajax
     */
    public function settingHandel(UpdateFormRequest $request) {



        $session_user = $request->session()->get('user');

        /**
         *  Проверка совпадения сессии и $request->id
         */
        if($session_user == $request->id) {



            $user = User::query()
                ->where('id', auth()->user()->id)
                ->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'birthdate' => ($request->birthdate) ?: auth()->user()->birthdate,
                    'fio' => ($request->fio) ?: auth()->user()->fio,
                    'city' => ($request->city) ?: auth()->user()->city,
                ]);
        }
        return redirect()->intended(route('cabinet'));

    }

    /**
     * Метод изменения пароля
     */
    public function settingPasswordHandel(UpdatePasswordFormRequest $request) {

        $session_user = $request->session()->get('user');

        /**
         *  Проверка совпадения сессии и $request->id
         */
        $user = auth()->user();
        /*        dump($session_user);
                dump($request->id);
                dd($user->id);*/
        if($session_user == $request->id) { /** сессия совпадает с id пользователя которого изменяем **/

            $user = auth()->user();

            $q = false;
            $regenerate = false;


            if($user->id == $request->id) {
                $q = true; // если это сам пользователь редактирует себя
                $regenerate = true; // если это сам пользователь редактирует себя, то можно regenerate

            }

            if($q) {

                User::query()
                    ->where('id', $request->id)
                    ->update([
                        'password' => bcrypt($request->password)
                    ]);
            }


        }

        if($regenerate) {

            $request->session()->regenerate();
            flash()->info(config('message_flash.info.success_password'));
            return redirect()->back();


        }

        flash()->info(config('message_flash.info.m_success_password'));
        return redirect()->back();

    }




    /**
     * профиль
     */
    /**
     * профиль
     */
    /**
     * профиль
     */
    /**
     * профиль
     */
    /**
     * профиль
     */


    public function profile()
    {

      return redirect(route('cabinet.profile_photos'));

    }


    /**
     * фото
     */

    public function profile_photos()
    {

        $user   = auth()->user();
        $items = [];

        $items =  UserPhotoViewModel::make()->userPhotos($user->id);

        return view('dashboard.profile.profile_photos',[
                'user' => $user,
                'items' => $items
            ]);

    }


    /**
     * профиль
     */
    /**
     * много видоефайлов
     */

    public function profile_videos()
    {

        $user   = auth()->user();
        $items = [];

        $items = UserVideoViewModel::make()->videos($user->id);

        return view('dashboard.profile.profile_videos',
            [
                'user' => $user,
                'items' => $items,

            ]);

    }

    /**
     * одно видое
     */

    public function profile_video($user_id, $id)
    {

        $user   = auth()->user();

        $item = UserVideoViewModel::make()->video($id);
        return view('dashboard.profile.inside.user_people_video',
            [
                'user' => $user,
                'item' => $item,

            ]);

    }


    /**
     * профиль
     */
    /**
     * статья
     */

    public function profile_articles()
    {

        $user   = auth()->user();
        $items = [];

        $items = UserArticleViewModel::make()->articles($user->id);


        return view('dashboard.profile.profile_article',
            [
                'user' => $user,
                'items' => $items,
            ]);

    }

    /**
     * одна статья
     */

    public function profile_article($user_id, $id)
    {

        $user   = auth()->user();

        $item = UserArticleViewModel::make()->article($id);
        return view('dashboard.profile.inside.user_people_article',
            [
                'user' => $user,
                'item' => $item,

            ]);

    }

}
