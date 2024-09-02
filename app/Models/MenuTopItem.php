<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class MenuTopItem extends Model
{

    protected $table = 'menu_top_items';

    protected $fillable = [
        'title',
        'sorting',
        'slug',
        'published',
        'religion'
    ];

    protected $casts = [
        'religion' => 'collection',

    ];



    protected static function boot()
    {
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
