<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class FamilyCulture extends Model
{
protected $table = 'family_cultures';
    protected $fillable = [
        'title',
        'slug',
        'url',
        'family_id',

        'img',
        'text',
        'img2',
        'text2',
        'img3',
        'text3',
        'img4',
        'text4',

        'params',
        'css',
        'url',
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


            $slug = Str::of($Moonshine->title)->slug('-');
            $Moonshine->slug = 'id-'.$Moonshine->id . '-'.$slug->value;
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