<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
        if(optional($this->users)->login_type == 'google'){
            $profile_image = optional($this->users)->social_image;
        }else{
            $profile_image = ($this->users) ? getSingleMedia($this->users,'profile_image' ,null) : null;
        }  
        return [
            'id'                    => $this->id,
            'title'                 => $this->title,
            'portion_unit'          => $this->portion_unit,
            'portion_type'          => $this->portion_type,
            'difficulty'            => $this->difficulty,
            'preparation_time'      => $this->preparation_time,
            'baking_time'           => $this->baking_time,
            'resting_time'          => $this->resting_time,
            'dish_type'             => $this->dish_type,
            'cuisine'               => $this->cuisine,
            'status'                => $this->status,
            'user_id'               => $this->user_id,
            'is_like'               => $this->getUserLike->where('user_id',$user_id)->first() ? 1 : 0,
            'is_bookmark'           => $this->getUserBookmark->where('user_id',$user_id)->first() ? 1 : 0,
            'total_review'          => $this->ratings->count('id'),
            'total_rating'          => count($this->ratings) > 0 ? max($this->ratings->avg('rating'),0) : 0,
            'recipe_image'          => getAttachments($this->getMedia('recipe_main_image')),
            'recipe_image_gallery'  => getAttachments($this->getMedia('recipe_image')),
            'like_count'            => $this->getUserLike->count(),
            'user_name'             => optional($this->users)->username,
            'user_profile_image'    => $profile_image,
            'created_at'            => $this->created_at
        ];
    }
}
