<?php

namespace App\Http\Controllers\Dashboard\UserPhoto;

use App\Http\Controllers\Controller;
use App\Models\User;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserPhotoAjaxController extends Controller
{

    public function deletePhoto(Request $request)
    {


        $id = $request->id;
        $thumb = $request->thumb;
        $result = UserViewModel::make()->userDeletePhoto($id, $thumb); // удаляем

       // dd($result);

        /**
         * возвращаем назад в браузер
         */
        return response()->json([
            'error' => $result['error'],
            'test' => $result['test'],
            'success' => $result['result_delete_db'],

            ]);


    }
}
