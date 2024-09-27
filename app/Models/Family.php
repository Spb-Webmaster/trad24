<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    protected $table = 'families';
    protected $fillable = [
        'title',
        'slug',
        'img',
        'img_logo',

        'f_title',
        'f_img',
        'f_text',
        'f_img2',
        'f_text2',

        'f_img3',
        'f_text4',

        'f_img4',
        'f_text4',


        'b_title',
        'b_img',
        'b_text',

        'b_img2',
        'b_text2',

        'b_img3',
        'b_text4',

        'b_img4',
        'b_text4',


        'p_title',
        'p_img',
        'p_text',

        'p_img2',
        'p_text2',

        'p_img3',
        'p_text4',

        'p_img4',
        'p_text4',


        'k_title',
        'k_img',
        'k_text',

        'k_img2',
        'k_text2',

        'k_img3',
        'k_text4',

        'k_img4',
        'k_text4',


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
        'files' => 'collection',
    ];



    public function family_new(): HasMany
    {
        return $this->hasMany(FamilyNew::class, 'family_id')->orderBy('created_at', 'desc');
    }

    public function family_gallery(): HasMany
    {
        return $this->hasMany(FamilyGallery::class, 'family_id')->orderBy('created_at', 'desc');
    }



    public function family_media(): HasMany
    {
        return $this->hasMany(FamilyMedia::class, 'family_id')->orderBy('created_at', 'desc');
    }



    public function family_page(): HasMany
    {
        return $this->hasMany(FamilyPage::class, 'family_id')->orderBy('created_at', 'desc');
    }



    public function family_people(): HasMany
    {
        return $this->hasMany(FamilyPeople::class, 'family_id')->orderBy('created_at', 'desc');
    }



    public function family_culture(): HasMany
    {
        return $this->hasMany(FamilyCulture::class, 'family_id')->orderBy('created_at', 'desc');
    }

    public function family_main(): HasMany
    {
        return $this->hasMany(FamilyMain::class, 'family_id')->orderBy('created_at', 'desc');
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
