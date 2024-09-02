<?php

namespace App\Models;

use Domain\Video\QueryBuilders\VideoQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $table = 'videos';

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'img',
        'youtube',
        'video',
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
        'sorting',
        'above'
    ];

    protected $casts = [
        'params' => 'collection',
        'video' => 'collection',
        'gallery' => 'collection',

    ];

    /*    public function parent():BelongsTo
        {
            return $this->belongsTo(HotCategory::class,  'hot_category_id');
        }*/

    /**
     * Создание метода вывода со своим InfoQueryBuilder
     */
    public function newEloquentBuilder($query):VideoQueryBuilder
    {
        return new VideoQueryBuilder($query);
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
