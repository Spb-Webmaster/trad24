<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuBottomItem extends Model
{
    protected $table = 'menu_bottom_items';
    protected $fillable = [
        'title',
        'slug',
        'sorting',
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
