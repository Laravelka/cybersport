<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PostResource extends JsonResource
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
            'user' => new UserResource($this->user()->first()),
            'user_id' => $this->user_id,
            'title' => $this->title,
            'content' => \LaravelEmojiOne::toImage($this->content),
            'img' => $this->img,
			'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
			'updated_at' => Carbon::parse($this->updated_at)->diffForHumans(),
            'comments' => CommentResource::collection($this->comments),
            'awards' => AwardResource::collection($this->awards),
            'likes' => LikeResource::collection($this->likes)
        ];
    }
}
