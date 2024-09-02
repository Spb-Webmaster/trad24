<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class RegobjectActivity extends Model
{
    protected $table = 'regobject_activities';

    protected $fillable = [
        'title',
        'slug',
        'a_desc',
        'a_img',
        'regobject_id',
        'a_desc2',
        'a_img2',
        'a_desc3',
        'a_img3',
        'a_desc4',
        'a_img4',
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


    public function regobject(): BelongsTo
    {
        return $this->belongsTo(Regobject::class);
    }


    protected static function boot()
    {

        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {


            //    dd(json_decode($Moonshine->files));


            $object = Regobject::query()->where('id', $Moonshine->regobject_id)->first();



            $slug = Str::of($Moonshine->title)->slug('-');
            $Moonshine->slug = 'id-'.$Moonshine->id . '-'.$slug->value;
            if (isset($object->cat_regobject_id)) {

                $cat_regobject_id = $object->cat_regobject_id;

                $cat_regobject = CatRegobject::query()->where('id', $cat_regobject_id)->first();


                $religion = Religion::query()->where('id', $cat_regobject->religion_id)->first();


                if (isset($object->area_id)) {
                    $cat_area_id = $object->area_id;
                    $area = Area::query()->where('id', $cat_area_id)->first();
                }

                if (!$Moonshine->keywords) {
                    $keywords = $Moonshine->title . ' | ' . $religion->title;
                    if (isset($area->title)) {
                        $keywords .= ' | ' . $area->title;
                    }
                    $Moonshine->keywords = $keywords;
                }

                if (!$Moonshine->metatitle) {
                    $metatitle = $Moonshine->title;
                    $Moonshine->metatitle = $metatitle;
                }

                if (!$Moonshine->description) {

                    $description = '';

                    if(isset($religion->title)) {
                        $description .= 'Религия  - ' . $religion->title;
                    }

                    if(isset($cat_regobject->title)) {
                        $description .= ', категория - ' . $cat_regobject->title . ' - ' . $object->title;
                    }

                    $description .= ', '. $Moonshine->title;
                    $Moonshine->description = $description;
                }


            }
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


    }}
