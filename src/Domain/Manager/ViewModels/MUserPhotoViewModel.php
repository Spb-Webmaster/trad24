<?php

namespace Domain\Manager\ViewModels;


use App\Models\User;
use App\Models\UserPhoto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class MUserPhotoViewModel
{
    use Makeable;

    /**
     * все фото  user-a
     */

    public function photos($user_id)
    {

        $photos = UserPhoto::query()
            ->where('user_id', $user_id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $photos;
    }



    /**
     * все фото  новые
     */

    public function new_photos()
    {

        $photos = UserPhoto::query()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $photos;
    }




    /**
     *  ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ
     * src/Domain/Manager/ViewModels/MUserViewModel.php
     */
  /**
     * удаляем фото (массив)
     */

    public function delete_photos($ids)
    {

        foreach ($ids as $k => $tic) {
            $objects[] = $tic['object'];
        }

        return UserPhoto::whereIn('id',$objects)
            ->delete();
    }

  /**
     * удаляем фото (одно)
     */

    public function delete_photo($id)
    {

        $result = UserPhoto::query()
            ->where('id', $id)
            ->delete();
        return $result;
    }
    /**
     *  ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ ПЕРЕПИСАЛ
     * src/Domain/Manager/ViewModels/MUserViewModel.php
     */

}
