<?php

namespace App\Models;

use Domain\Info\QueryBuilders\InfoQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Info extends Model
{
protected $table = 'infos';

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'img',
        'gallery',
        'smalltext',
        'text',
        'text2',
        'pageimg1',
        'text3',
        'pageimg2',
        'text',
        'published',
        'params',
        'metatitle',
        'description',
        'keywords',
        'sorting'
    ];

    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',

    ];

/*    public function parent():BelongsTo
    {
        return $this->belongsTo(HotCategory::class,  'hot_category_id');
    }*/

    /**
     * Создание метода вывода со своим InfoQueryBuilder
     */
    public function newEloquentBuilder($query):InfoQueryBuilder
    {
        return new InfoQueryBuilder($query);
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
