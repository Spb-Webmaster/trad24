<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegobjectNew extends Model
{

protected $table = 'regobject_news';

protected $fillable = [
    'title',
    'slug',
    'img',
    'text',
    'pageimg1',
    'regobject_id',
    'text2',
    'pageimg2',
    'text3',
    'pageimg3',
    'text4',
    'pageimg4',
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


    public function regobject():BelongsTo
    {
        return $this->belongsTo(Regobject::class);
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
