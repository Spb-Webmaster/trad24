<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Religion extends Model
{
    protected $table = 'religions';

    protected $fillable = [
        'title',
        'slug',
        'img',
        'text',
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
