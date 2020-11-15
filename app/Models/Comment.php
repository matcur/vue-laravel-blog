<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function commentator()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id', 'id')
            ->with('replies');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id', 'id')
            ->with('replies');
    }
}
