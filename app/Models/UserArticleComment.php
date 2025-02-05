<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserArticleComment extends Model
{
    protected $table = 'user_article_comments';

    protected $fillable = [
        'text',
        'user_id',
        'user_article_id',
        'user_article_comment_id',
        'viewer',
        'params',
        'sorting',
        'published'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(UserArticle::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'user_article_comment_id');
    }

    public function find(): HasMany
    {
        return $this->hasMany(self::class)->orderBy('created_at', 'desc');
    }

    public function getToAnswerAttribute(): bool
    {

        if ($this->user_id !== auth()->user()->id) {

            return true;
        }
        return false;

    }

    public function getToDeleteAttribute(): bool
    {

        if ($this->user_id == auth()->user()->id) {

            return true;
        }
        return false;

    }


}
