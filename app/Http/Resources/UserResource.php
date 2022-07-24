<?php

namespace App\Http\Resources;

use Storage;
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
		$avatar = str_contains($this->avatar, 'https://') ? $this->avatar : (
			$this->avatar ? Storage::url($this->avatar) : null
		);

		$avatarFull = str_contains($this->avatar_full, 'https://') ? $this->avatar_full : (
			$this->avatar_full ? Storage::url($this->avatar_full) : null
		);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'telegram' => $this->telegram,
            'discord' => $this->discord,
            'avatar' => $avatar,
            'is_admin' => $this->is_admin,
            'is_banned' => $this->is_banned,
            'balance' => $this->balance,
            'vk_id' => $this->vk_id,
            'steam_id' => $this->steam_id,
            'yandex_id' => $this->yandex_id,
			'avatar_full' => $avatarFull,
            'balance_coins' => $this->balance_coins,
            'pw_points' => $this->pw_points,
            'referal_status' => $this->referal_status,
            'referal_link' => $this->referal_link,
            'posts' => PostResource::collection($this->whenLoaded('posts')),
            'friends' => FriendResource::collection($this->whenLoaded('friends')),
        ];
    }
}
