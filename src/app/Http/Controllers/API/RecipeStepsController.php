<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecipeStep;
use App\Models\StepUtensil;

use App\Http\Resources\API\RecipeStepsResource;

class RecipeStepsController extends Controller
{
    public function store(Request $request){

        $recipe_steps = $request->all();
        $result = RecipeStep::updateOrCreate(['id' => $request->id], $recipe_steps);
    
        storeMediaFile($result,$request->recipe_step_image, 'recipe_step_image');
    /*
        $utensil_data =  !empty($recipe_steps['step_utensils']) ? json_decode($recipe_steps['step_utensils'] ,true) : null;
        
        if($utensil_data != null || !empty($utensil_data))
        {
            $result->utensil()->delete();
            if($utensil_data != null) {
                foreach($utensil_data as $utensil) {
                    $step_utensils = [
                        'step_id'       => $result->id,
                        'recipe_id'     => $result->recipe_id,
                        'amount'        => $utensil['amount'],
                        'name'          => $utensil['name'],
                        'special_use'   => $utensil['special_use'],
                        'size'          => $utensil['size'],
                        'sequence'      => $utensil['sequence'],
                        'created_at'    => now()
                    ];
                    $result->utensil()->insert($step_utensils);
                }
            }
        }
    */
        $message = __('messages.update_form',[ 'form' => __('messages.recipe_step') ] );


        if($result->wasRecentlyCreated){
            $message = __('messages.save_form',[ 'form' => __('messages.recipe_step') ] );
        }
        $response = [
            'message' => $message,
            'step_id' => $result->id
        ];

        return comman_custom_response($response);
    }
    public function delete(Request $request){
        
        $recipe_delete = RecipeStep::find($request->id);
        if($recipe_delete){
            StepUtensil::where('step_id',$request->id)->delete();
            $recipe_delete->delete();
        }
        
        $message = __('messages.delete_form',[ 'form' => __('messages.recipe_step') ] );

        return comman_message_response($message);
    }
    public function getStepsList(Request $request){
        $steps = RecipeStep::where('recipe_id',$request->recipe_id)->with('utensil');
    
        $per_page = config('constant.PER_PAGE_LIMIT');
    
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' || $request->per_page == -1){
                $per_page = $steps->count();
            }
        }
    
        $steps = $steps->orderBy('created_at','desc')->paginate($per_page);
    
        $items = RecipeStepsResource::collection($steps);
    
        $response = [
            'pagination' => [
                'total_items' => $items->total(),
                'per_page' => $items->perPage(),
                'currentPage' => $items->currentPage(),
                'totalPages' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem(),
                'next_page' => $items->nextPageUrl(),
                'previous_page' => $items->previousPageUrl(),
            ],
            'data' => $items,
        ];
        
        return comman_custom_response($response);
    }
}
