<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FriendResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$user = $this->user()->first();
		$getUser = $request->user();
		$subscriber = $this->subscriber()->first();
		$friendData = $this->user_id != $getUser->id ? $user : $subscriber;
		
		return [
			'id' => $this->id,
			'user' => new UserMiniResource($friendData),
			'user_id' => $this->user_id,
			'subscriber_id' => $this->subscriber_id,
			'is_friend' => $this->is_friend,
			'is_subscriber' => $this->is_subscriber,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at
		];
	}
}
