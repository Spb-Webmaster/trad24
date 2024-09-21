<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyNew extends Model
{
    protected $table = 'family_news';

    protected $fillable = [
        'title',
        'slug',
        'img',

        'n_img',
        'n_text',

        'n_img2',
        'n_text2',

        'family_id',

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

    public function family():BelongsTo
    {
        return $this->belongsTo(Family::class);
    }




}
