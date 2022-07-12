<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

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
            'user' => $this->user()->first(),
            'user_id' => $this->user_id,
            'title' => $this->title,
            'content' => $this->content,
            'img' => $this->img,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'comments' => CommentResource::collection($this->comments),
            'awards' => AwardResource::collection($this->awards),
            'likes' => LikeResource::collection($this->likes),

        ];
    }
}
