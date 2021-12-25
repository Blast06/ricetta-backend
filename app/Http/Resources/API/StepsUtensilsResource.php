<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class StepsUtensilsResource extends JsonResource
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
            'id'                                        => $this->id,
            'step_id'                                   => $this->step_id,
            'recipe_id'                                 => $this->recipe_id,
            'amount'                                    => $this->amount,
            'name'                                      => $this->name,
            'special_use'                               => $this->special_use,
            'special_characteristics'                   => $this->special_characteristics,
            'size'                                      => $this->size,
            'sequence'                                  => $this->sequence,

        ];
    }
}
