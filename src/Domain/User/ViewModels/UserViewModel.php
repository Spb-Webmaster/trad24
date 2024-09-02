<?php
namespace Domain\User\ViewModels;

use App\Models\UserPhoto;
use Storage;
use Support\Traits\Makeable;

class UserViewModel
{
    use Makeable;

    public function userDeletePhoto($id, $thumb =  null) {

        $error = false;
        $test = [];
        $result = [];

        $photo = UserPhoto::find($id);
        if($photo) {
            $img = '/storage/' .$photo->img;
         if($thumb) {
            Storage::delete([$img,$thumb]);
             if(Storage::exists($thumb)) {
                 // file still exists
                 // файл все еще существует
                 $error =  true;
                 $test['error_thumb__test'] = 'thumb -  file still exists';
             } else {
                 $test['error_thumb__test'] = 'thumb -  file was deleted ';
             }

         } else {
            Storage::delete($img);
           }
        }

        if(Storage::exists($img)) {
            // file still exists
            // файл все еще существует
            $error =  true;
            $test['error_img__test'] = 'img - file still exists';
        } else {
            $test['error_img__test'] = 'img -  file was deleted';
        }

        $delete = $photo->delete();

        $result = array('error' => $error, 'test' => $test, 'result_delete_db'=> $delete);

        return $result;

    }

}
