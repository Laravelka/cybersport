<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

/*
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'first_name',
        'last_name',
        'telegram',
        'discord',
        'avatar',
        'vk_id',

        'steam_id',
        'yandex_id',
        'ip_address',
        'is_admin',
        'is_banned',
        'balance',
		'avatar_full',
        'balance_coins',
        'pw_points',
        'referal_status',
        'referal_link',
        'referal_level_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
		'is_admin' => 'boolean',
		'is_banned' => 'boolean',
        'email_verified_at' => 'datetime',
    ];
	
	public function isFriend()
    {
        return Friend::where('is_sub');
    }
	
    public function awards()
    {
        return $this->belongsToMany(Post::class, 'awards');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function friends()
    {
		return $this->hasMany(Friend::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderByDesc('id');
    }
	
}
