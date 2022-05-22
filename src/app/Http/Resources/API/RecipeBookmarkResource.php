<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeBookmarkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user_id = request()->user_id;
        return [
            'bookmark_id'       => $this->id,
            'id'                => $this->recipe_id,
            'user_id'           => $this->user_id,
            'title'             => $this->recipe->title,
            'recipe_image'      => getAttachments($this->recipe->getMedia('recipe_main_image')),
            'is_like'           => $this->recipe->getUserLike->where('user_id',$user_id)->first() ? 1 : 0,
            'is_bookmark'       => 1,
            'like_count'        => $this->recipe->getUserLike->count(),
            'preparation_time'   => optional($this->recipe)->preparation_time ?? '-',
            'portion_unit'       => optional($this->recipe)->portion_unit ?? '-',
            'portion_type'       => optional($this->recipe)->portion_type ?? '-',
            'recipe_image_gallery'  => getAttachments($this->recipe->getMedia('recipe_image')),
           
        ];
    }
}
