<?php

namespace App\Http\Controllers;

use App\Models\Regobject;
use App\Models\User;
use Domain\Catalog\ViewModels\AutoCompleteViewModel;
use Domain\Manager\ViewModels\MUserPhotoViewModel;
use Domain\Manager\ViewModels\MUserViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AjaxController
{
    public function bigAutocomplete(Request $request)
    {

        $result = AutoCompleteViewModel::make()->bigSearch($request);

        header('Content-Type: application/json');
        return response()->json($result);

    }


    public function topAutocomplete(Request $request)
    {

        $result = AutoCompleteViewModel::make()->topSearch($request);

        header('Content-Type: application/json');
        return response()->json($result);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * удаляем элемент(ы) таблицы (все в $request )
     */

    public function deleteObject(Request $request)
    {

        $result = MUserViewModel::make()->delete_objects($request);

        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'result' => $result
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * удаляем элемент таблицы (все в $request )
     */

    public function deleteOneObject(Request $request)
    {

        $result = MUserViewModel::make()->delete_one_object($request);

        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'result' => $result
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * публикация или блокировка
     */

    public function publishedUser(Request $request)
    {

        $result = MUserViewModel::make()->published_user($request);

        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'result' => $result
        ]);
    }



    public function uploadAvatar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'upload_f' => 'required|image|max:8096'
        ]);

        if ($validator->fails()) {
            $resp["success"] = false;
            $resp["err"] = $validator->errors()->first('upload_f');
            return json_encode($resp);
        }

        $puth_avatar = false;

        if ($request->hasFile('upload_f')) {

            $storage = Storage::disk('public');
            $destinationPath = 'users/' . auth()->user()->id . '/avatar';

            if (!$storage->exists($destinationPath)) {
                $storage->makeDirectory($destinationPath);
            } else {
                $success = Storage::deleteDirectory($destinationPath);
            }

            $file = $request->file('upload_f');
            $newFileName = $file->getClientOriginalName();
            $file->storeAs($destinationPath, $newFileName);
            $puth_avatar = $destinationPath . '/' . $newFileName; // для БД

        }

        if (!$puth_avatar) {
            $avatar = (auth()->user()->avatar) ?: '';

        } else {
            $avatar = $puth_avatar;
        }

        $user = User::query()
            ->where('id', auth()->user()->id)
            ->update([
                'avatar' => $avatar,
            ]);

        $resp = array();
        $resp['success'] = true;
        $resp['mess'] = "Документы успешно загружены";
        $resp['avatar'] = Storage::disk('public')->url($avatar);


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'success' => $resp['success'],
            'mess' => $resp['mess'],
            'avatar' => $resp['avatar'],

        ]);

    }



}
