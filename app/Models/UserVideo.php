<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserVideo extends Model
{
    protected $table = 'user_videos';
    protected $fillable = [
        'title',
        'video',
        'like',
        'article',
        'user_id',
        'sorting',
        'viewer'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,  'user_id');
    }


    public function getTeaserTextAttribute() {

        return '<p>' . Str::limit(strip_tags($this->article), 300) . '</p>';


    }
}
