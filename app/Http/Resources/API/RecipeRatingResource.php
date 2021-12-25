<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeRatingResource extends JsonResource
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
            'id'               => $this->id,
            'recipe_id'        => $this->recipe_id,
            'rating'           => $this->rating,
            'review'           => $this->review,
            'user_id'          => $this->user_id,
            'username'         => optional($this->user)->name,
            'profile_image'    => ($this->user) ? getSingleMedia($this->user,'profile_image' ,null) : null,
        ];
    }
}
