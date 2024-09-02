<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemRegobject extends Model
{
    protected $table = 'item_regobjects';

    protected $fillable = [
        'title',
        'slug',
        'a_desc',
        'a_img',
        'a_desc2',
        'a_img2',
        'a_desc3',
        'a_img3',
        'a_desc4',
        'a_img4',
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


    public function religion():BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function area():BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function catregobject():BelongsTo
    {
        return $this->belongsTo(CatRegobject::class, 'cat_regobject_id');

    }


    /**
     * Создание метода вывода со своим HotCategoryQueryBuilder
     */
    /*
     public function newEloquentBuilder($query):HotCategoryQueryBuilder
      {
       return new HotCategoryQueryBuilder($query);
     }
    */

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
