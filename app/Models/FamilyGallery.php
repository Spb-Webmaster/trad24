<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyGallery extends Model
{
    protected $table = 'family_galleries';

    protected $fillable = [
        'title',
        'slug',
        'img',

        'img',
        'text',

        'img2',
        'text2',

        'img3',
        'text3',

        'family_id',

        'gallery',
        'gallery_title',
        'gallery_desc',
        'gallery_multiple',

        'video',
        'video_title',
        'video_desc',

        'audio',
        'audio_title',
        'audio_desc',

        'params',
        'published',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',
        'gallery_multiple' => 'collection',
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
    public function getGalleryMultipleVisibleAttribute()
    {

        if($this->gallery_multiple) {
            foreach ($this->gallery_multiple as $g) {
                if ($g) { // если хоть одно фото, то нужно!
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


            //  dd($Moonshine);
            $gallery = false;
            if($Moonshine->gallery) {
                foreach ($Moonshine->gallery as $g) {
                    if ($g['gallery_img']) {
                        $gallery = true;
                    }
                }
                if (!$gallery) {
                    $Moonshine->gallery = null;
                }
            }


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