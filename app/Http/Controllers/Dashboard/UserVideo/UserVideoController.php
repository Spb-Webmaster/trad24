<?php

namespace App\Http\Controllers\Dashboard\UserVideo;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoFormRequest;
use Domain\UserVideo\ViewModels\UserVideoViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserVideoController extends Controller
{
    public function videos($user_id)
    {
        $user = auth()->user();

        if ($user->id == $user_id) {

            $items = UserVideoViewModel::make()->videos($user->id);

            return view('dashboard.user_videos.user_videos', [
                'user' => $user,
                'items' => $items
            ]);
        }
        abort(404);


    }

    public function video($user_id, $id)
    {

        $user = auth()->user();

        if ($user->id == $user_id) {

            $item = UserVideoViewModel::make()->video($id);

            return view('dashboard.user_videos.user_video', [
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

            $item = UserVideoViewModel::make()->video($id);

            return view('dashboard.user_videos.user_video_edit', [
                'user' => $user,
                'item' => $item
            ]);
        }
        abort('404');

    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * @param VideoFormRequest $request
     * @return RedirectResponse
     *
     */

    public function videoCreate(VideoFormRequest $request)
    {
        $user = auth()->user();



/*        dump($request->video);
          dd(codeYoutube($request->video));*/


        if($request->user_id == $user->id) {

            if (UserVideoViewModel::make()->create($request)) {

                flash()->info(config('message_flash.info.user_video_successes'));
            }
            return redirect()->back();
        }

           flash()->alert(config('message_flash.alert.role_error'));
           return redirect()->route('cabinet.videos', ['user_id' =>  $user->id]);


    }

    public function videoUpdate(VideoFormRequest $request)
    {
        $user = auth()->user();

        if($request->user_id == $user->id) {

            if (UserVideoViewModel::make()->update($request)) {

                flash()->info(config('message_flash.info.user_video_update'));
            }

            return redirect()->back();
        }

        flash()->alert(config('message_flash.alert.role_error'));
        return redirect()->route('cabinet.videos', ['user_id' =>  $user->id]);

    }

    public function videoDelete(Request $request)
    {
        $user = auth()->user();

        if (UserVideoViewModel::make()->delete($request->id)) {

            flash()->info(config('message_flash.info.user_video_delete'));
        }
        return redirect()->route('cabinet.videos', ['user_id' =>  $user->id]);


    }


}
