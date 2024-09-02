<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Regobject extends Model
{
    protected $table = 'regobjects';
    protected $fillable = [
        'title',
        'slug',
        'img',
        'subtitle',
        'shortdesc',
        'main_title',
        'main_desc',
        'main_right_img',
        'main_right_img_text',

        'gallery',
        'gallery_title',
        'gallery_desc',

        'video',
        'video_desc',

        'info_title',
        'info_img',
        'info_desc',

        'faq_title',
        'faq',
        'faq_desc',

        'contact_address',
        'contact_phone1',
        'contact_phone2',
        'contact_email',
        'contact_desc',
        'contact_yandex_map',

        'a_desc',
        'a_img',
        'a_desc2',
        'a_img2',
        'a_desc3',
        'a_img3',
        'a_desc4',
        'a_img4',

        'files',
        'params',
        'published',
        'metatitle',
        'description',
        'keywords',
        'sorting',

    ];

    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',
        'faq' => 'collection',
        'video' => 'collection',
        'files' => 'collection'
    ];


    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function catregobject(): BelongsTo
    {
        return $this->belongsTo(CatRegobject::class, 'cat_regobject_id');

    }

    public function regobject_new(): HasMany
    {
        return $this->hasMany(RegobjectNew::class, 'regobject_id')->orderBy('created_at', 'desc');
    }

    public function regobject_page(): HasMany
    {
        return $this->hasMany(RegobjectPage::class, 'regobject_id')->orderBy('created_at', 'desc');
    }

    public function regobject_info(): HasMany
    {
        return $this->hasMany(RegobjectInfo::class, 'regobject_id')->orderBy('created_at', 'desc');
    }

    public function regobject_media(): HasMany
    {
        return $this->hasMany(RegobjectMedia::class, 'regobject_id')->orderBy('created_at', 'desc');
    }

    public function regobject_about(): HasMany
    {
        return $this->hasMany(RegobjectAbout::class, 'regobject_id')->orderBy('created_at', 'desc');
    }

    public function regobject_activity(): HasMany
    {
        return $this->hasMany(RegobjectActivity::class, 'regobject_id')->orderBy('created_at', 'desc');
    }


    public function regobject_ritual(): HasMany
    {
        return $this->hasMany(RegobjectRitual::class, 'regobject_id')->orderBy('created_at', 'desc');
    }


    protected static function boot()
    {
        parent::boot();


        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {


            //    dd(json_decode($Moonshine->files));

            $files = json_decode($Moonshine->files);
            if (count($files)) {
                foreach ($files as $k => $f) {
                    //   dd($files[$k]->file_file);
                    $files[$k]->file_url = '/storage/' . $f->file_file;
                }

                $Moonshine->files = collect($files);
            }

            $cat_regobject_id = $Moonshine->cat_regobject_id;
            $cat_regobject = CatRegobject::query()->where('id', $cat_regobject_id)->first();
            $religion = Religion::query()->where('id', $cat_regobject->religion_id)->first();


            $Moonshine->religion_id = $religion->id;

            $cat_area_id = $Moonshine->area_id;
            $area = Area::query()->where('id', $cat_area_id)->first();

            if (!$Moonshine->keywords) {
                $keywords = $religion->title . ' | ' . $Moonshine->title;
                if ($Moonshine->subtitle) {
                    $keywords .= ' | ' . $Moonshine->subtitle;
                }
                $keywords .= ' | ' . $area->title;
                $Moonshine->keywords = $keywords;
            }
            if (!$Moonshine->metatitle) {
                $metatitle = $Moonshine->title . ', ' . $area->title;
                $Moonshine->metatitle = $metatitle;
            }
            if (!$Moonshine->description) {
                $description = 'Местоположение - ' . $area->title . ', религия  - ' . $religion->title . ', категория - ' . $cat_regobject->title . ' , название - ' . $Moonshine->title;
                $Moonshine->description = $description;
            }
        });


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

