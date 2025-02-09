<?php
namespace Domain\UserVideo\ViewModels;

use App\Models\UserArticle;
use App\Models\UserPhoto;
use App\Models\UserVideo;
use Storage;
use Support\Traits\Makeable;
use function Laravel\Prompts\textarea;

class UserVideoViewModel
{
    use Makeable;

    public function create($request) {
        $user = auth()->user();
       return UserVideo::create([
            'user_id' => $user->id,
            'title' => $request->title_video,
            'video' => trim($request->video),
           'article' => \textarea($request->article),
        ]);
    }

    public function videos($user_id) {

        return  UserVideo::query()
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
    }

    public function video($id) {

        $video  = UserVideo::find($id);
        $video->increment('viewer');
        return $video;


    }

    public function update($request) {

        $user = auth()->user();

      return UserVideo::query()
            ->where('id', $request->id)
            ->where('user_id', $user->id)
            ->update([
                'title' => $request->title_video,
                'video' => trim($request->video),
                'article' => \textarea($request->article),
            ]);

    }


    public function delete($id) {

        $user = auth()->user();

       return UserVideo::query()
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->delete();

    }

}
