<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable = [
        'title',
        'slug',
        'a_desc',
        'a_img',
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

    public function catregobject(): HasMany
    {
        return $this->hasMany(CatRegobject::class, 'cat_regobject_id');
    }


    public function regobject(): HasMany
    {
        return $this->hasMany(Regobject::class);
    }

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
