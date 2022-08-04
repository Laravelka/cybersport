<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class UserMiniResource extends JsonResource
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
			'avatar' => $avatar,
			'balance' => $this->balance,
			'avatar_full' => $avatarFull,
			'balance_coins' => $this->balance_coins,
			'pw_points' => $this->pw_points
		];
    }
}
