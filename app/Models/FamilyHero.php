<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyHero extends Model
{

    protected $table = 'family_heroes';
    protected $fillable = [
        'title',
        'slug',
        'teaser',

        'img',
        'text',
        'img2',
        'text2',
        'img3',
        'text3',
        'img4',
        'text4',
        'family_id',

        'css',
        'params',
        'published',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];


    protected $casts = [
        'params' => 'collection',
    ];


    public function family():BelongsTo
    {
        return $this->belongsTo(Family::class);
    }


    protected static function boot()
    {

        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {

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
