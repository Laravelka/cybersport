<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'first_team_id' => $this->first_team_id,
            'second_team_id' => $this->second_team_id,
            'broadcast_url' => $this->broadcast_url,
            'chat_id' => $this->chat_id,
            'bet_rate' => $this->bet_rate,
            'bank' => $this->bank,
            'commission' => $this->commission,
            'gamers_count' => $this->gamers_count,
            'start_time' => $this->start_time,
            'status' => $this->status,
            'winner_id' => $this->winner_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
