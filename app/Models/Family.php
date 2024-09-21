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

        'f_title',
        'f_img',
        'f_text',

        'b_title',
        'b_img',
        'b_text',

        'p_title',
        'p_img',
        'p_text',

        'k_title',
        'k_img',
        'k_text',

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
