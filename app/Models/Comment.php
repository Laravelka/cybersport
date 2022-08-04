<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'img',
    ];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	/*protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
	];*/

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
