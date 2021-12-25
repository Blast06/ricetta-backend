<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RecipeIngredient;
use App\Models\StaticData;
use App\Http\Resources\API\RecipeIngredientsResource;


class RecipeIngredientsController extends Controller
{
    public function store(Request $request){

        $recipe_ingredients = $request->all();
    
        $result = RecipeIngredient::updateOrCreate(['id' => $request->id], $recipe_ingredients);
    
        $static_data_value = str_replace(' ', '_', strtolower($request->name));
        $static_data_result = StaticData::where('type', 'ingredients')->where('value',$static_data_value)->first();
        
        if($static_data_result == null)
        {
            $static_data = [
                'type' => 'ingredients',
                'value'=>  $static_data_value,
                'label'=> $request->name
            ];
            StaticData::create($static_data);
        }
    
        $message = __('messages.update_form',[ 'form' => __('messages.recipe_ingredients') ] );
        if($result->wasRecentlyCreated){
            $message = __('messages.save_form',[ 'form' => __('messages.recipe_ingredients') ] );
        }
    
        $response = [
            'message' => $message,
            'ingredient_id' => $result->id,
        ];
        return comman_custom_response($response);
    }
    public function delete(Request $request){

        $recipe_delete = RecipeIngredient::where('id',$request->id)->delete();
        
        $message = __('messages.delete_form',[ 'form' => __('messages.recipe_ingredients') ] );

        return comman_message_response($message);
    }
    public function getIngredientList(Request $request){
        $ingredients = RecipeIngredient::where('recipe_id',$request->recipe_id);
    
        $per_page = config('constant.PER_PAGE_LIMIT');
    
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' || $request->per_page == -1){
                $per_page = $ingredients->count();
            }
        }
    
        $ingredients = $ingredients->orderBy('created_at','desc')->paginate($per_page);
    
        $items = RecipeIngredientsResource::collection($ingredients);
    
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
