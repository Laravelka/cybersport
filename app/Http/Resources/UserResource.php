<?php

namespace App\Http\Resources;

use http\Env\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'telegram' => $this->telegram,
            'discord' => $this->discord,
            'avatar' => $this->avatar,
            'is_admin' => $this->is_admin,
            'is_banned' => $this->is_banned,
            'balance' => $this->balance,
            'vk_id' => $this->vk_id,
            'steam_id' => $this->steam_id,
            'yandex_id' => $this->yandex_id,
            'balance_coins' => $this->balance_coins,
            'pw_points' => $this->pw_points,
            'referal_status' => $this->referal_status,
            'referal_link' => $this->referal_link,
            'posts' => PostResource::collection($this->whenLoaded('posts')),
            'friends' => FriendResource::collection($this->whenLoaded('friends')),
        ];
    }
}
