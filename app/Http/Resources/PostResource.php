<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'text'=>$this->text,
            'created_at'=>$this->created_at,
            'slug'=>$this->slug,
            'image_path'=>$this->image_path,
            'comments'=>PostCommentResource::collection($this->comments),
        ];
    }
}
