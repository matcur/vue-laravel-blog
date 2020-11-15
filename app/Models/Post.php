<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        self::addGlobalScope('published', function (Builder $builder) {
            $builder->where('is_published', true);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function rootComments()
    {
        return $this->comments()->whereNull('parent_comment_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
