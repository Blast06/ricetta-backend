<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeIngredientsResource extends JsonResource
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
            'id'                           => $this->id,
            'recipe_id'                    => $this->recipe_id,
            'name'                         => $this->name,
            'amount'                       => $this->amount,
            'unit'                         => $this->unit,
            'special_use'                  => $this->special_use,
            'recipe_image'                 => getSingleMedia($this->recipe, 'recipe_main_image',null),
            'special_characteristics'      => $this->special_characteristics,
        ];
    }
}
