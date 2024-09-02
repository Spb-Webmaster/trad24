<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPhoto extends Model
{
    protected $table = 'user_photos';
    protected $fillable = [
        'title',
        'img',
        'like',
        'user_id',
        'sorting'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,  'user_id');
    }
}
