<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{

   protected $table = 'calendar_events';

   protected $fillable = [

        'title',
        'slug',
        'teaser',
        'teaser_img',
       'subtitle',
       'url',
        'img',


        'text',
        'img2',
        'text2',
        'published',
        'params',
        'module',
        'metatitle',
        'description',
        'keywords',
        'sorting'

    ];

    protected static function boot()
    {
        parent::boot();

        # Проверка данных пользователя перед сохранением
        /* static::saving(function ($Moonshine) {   });*/


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
