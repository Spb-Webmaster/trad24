<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class FamilyMedia extends Model
{

    protected $table = 'family_media';

    protected $fillable = [
        'title',
        'slug',
        'text',
        'url',
        'img',
        'family_id',

        'gallery',
        'gallery_title',
        'gallery_desc',

        'video',
        'video_title',
        'video_desc',

        'audio',
        'audio_title',
        'audio_desc',

        'params',
        'css',
        'published',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];



    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',
        'video' => 'collection',
        'audio' => 'collection',
    ];



    public function family():BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function getGalleryVisibleAttribute()
    {

        if($this->gallery) {
            foreach ($this->gallery as $g) {

                if ($g['gallery_img']) { // если хоть одно фото, то нужно!
                    return true;
                }


            }
        }
        return false;

    }

    public function getVideoVisibleAttribute()
    {
        if ($this->video) {
            foreach ($this->video as $g) {

                if ($g['video_video_video']) { // если хоть одно фото, то нужно!
                    return true;
                }
                if ($g['video_video_youtube']) { // если хоть одно фото, то нужно!
                    return true;
                }

            }
        }
        return false;

    }

    public function getAudioVisibleAttribute()
    {

        if ($this->audio) {

            foreach ($this->audio as $g) {

                if ($g['audio_audio_audio']) { // если хоть одно фото, то нужно!
                    return true;
                }


            }
        }
        return false;

    }


    protected static function boot()
    {

        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {


            //    dd(json_decode($Moonshine->files));



            $slug = Str::of($Moonshine->title)->slug('-');
            $Moonshine->slug = 'id-' . $Moonshine->id . '-' . $slug->value;

        });


        parent::boot();

        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });


    }

}
