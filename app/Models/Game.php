<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'title',
        'slug',
        'first_team_id',
        'second_team_id',
        'broadcast_url',
        'chat_id',
        'bet_rate',
        'bank',
        'commission',
        'gamers_count',
        'start_time',
        'status',
        'winner_id'
    ];
}
