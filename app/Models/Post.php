<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'img',
    ];

    protected static function booted()
    {
        static::deleted(function ($post) {
            $post->awards()->delete();
            $post->comments()->delete();
            $post->likes()->delete();
        });
    }

    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
