<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StepUtensil;
use App\Models\StaticData;
use App\Models\RecipeStep;

use App\Http\Resources\API\StepsUtensilsResource;

class StepsUtensilsController extends Controller
{
    public function store(Request $request){

        $data = $request->all();
        
        $utensil_data = $data['step_utensils'];
        
        if($utensil_data != null || !empty($utensil_data))
        {
            StepUtensil::where('step_id',$data['step_id'])->delete();
            if($utensil_data != null) {
                foreach($utensil_data as $utensil) {
                    $step_utensils = [
                        'step_id'       => $data['step_id'],
                        'recipe_id'     => $data['recipe_id'],
                        'amount'        => $utensil['amount'],
                        'name'          => $utensil['name'],
                        'special_use'   => $utensil['special_use'],
                        'sequence'      => $utensil['sequence'],
                    ];
                    StepUtensil::updateOrCreate(['id' => $request->id], $step_utensils);

                    $static_data_value = str_replace(' ', '_', strtolower($utensil['name']));
                    $static_data_result = StaticData::where('type', 'utensils')->where('value',$static_data_value)->first();
        
                    if($static_data_result == null)
                    {
                        $static_data = [
                            'type' => 'utensils',
                            'value'=>  $static_data_value,
                            'label'=> $utensil['name']
                        ];
                        StaticData::create($static_data);
                    }
                }
            }
        }    

        $message = __('messages.save_form',[ 'form' => __('messages.steps_utensils') ] );
        $response = [
            'message' => $message,
            'step_id' => (int) $data['step_id'],
        ];
        return comman_custom_response($response);
    }
    public function delete(Request $request){
        
        $recipe_delete = StepUtensil::where('id',$request->id)->delete();
        
        $message = __('messages.delete_form',[ 'form' => __('messages.steps_utensils') ] );

        return comman_message_response($message);
    }
}
