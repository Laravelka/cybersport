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
	
	public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
	
	public function firstTeam()
    {
        return $this->belongsTo(Team::class, 'first_team_id', 'id');
    }
	
	public function secondTeam()
    {
        return $this->belongsTo(Team::class, 'second_team_id', 'id');
    }
}
