<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRating;
use App\Models\UserLike;
use App\Models\UserBookmark;
use App\Models\Recipe;
use App\Models\RecipeStep;
use App\Models\StepUtensil;

use App\Http\Resources\API\RecipeResource;
use App\Http\Resources\API\RecipeRatingResource;
use App\Http\Resources\API\RecipeBookmarkResource;
use App\Http\Resources\API\RecipeDetailResource;
use App\Http\Resources\API\RecipeStepsResource;
use App\Models\RecipeIngredient;

class RecipeController extends Controller
{
    public function store(Request $request){

        $recipe_data = $request->all();
        $result = Recipe::updateOrCreate(['id' => $request->id], $recipe_data);
    
        storeMediaFile($result,$request->recipe_image, 'recipe_main_image');
        if($request->is('api/*')){
			if($request->has('attachment_count')) {
                $file = [];
				for($i = 0 ; $i < $request->attachment_count ; $i++){
					$attachment = 'recipe_image_'.$i;
					if($request->$attachment != null){
						$file[] = $request->$attachment;
					}
				}
				storeMediaFile($result,$file, 'recipe_image');
			}
		} else {
            storeMediaFile($result,$request->recipe_image, 'recipe_image');
		}
    
        $message = __('messages.update_form',[ 'form' => __('messages.recipe') ] );
        if($result->wasRecentlyCreated){
            $message = __('messages.save_form',[ 'form' => __('messages.recipe') ] );
        }
        $response = [
            'message' => $message,
            'recipe_id' => $result->id,
        ];
        return comman_custom_response($response);
    }
    public function delete(Request $request){
        
        $recipe_delete = Recipe::find($request->id);
        $message = __('messages.record_not_found',[ 'form' => __('messages.recipe') ] );
        if($recipe_delete != ''){
            $recipe_delete->delete();
            $message = __('messages.delete_form',[ 'form' => __('messages.recipe') ] );
        }
        

        return comman_message_response($message);
    }
    public function getRecipeList(Request $request){
        $recipes = Recipe::where('status',$request->status);

        if($request->has('keyword') && !empty($request->keyword)){
            $recipes = $recipes->where('title', 'LIKE', '%' . $request->keyword . '%');
        }
        if($request->has('dish_type') && !empty($request->dish_type)){
            $recipes = $recipes->whereIn('dish_type',explode(",",$request->dish_type));
        }
        if($request->has('cuisine') && !empty($request->cuisine)){
            $recipes = $recipes->whereIn('cuisine',explode(",",$request->cuisine));
        }
        $per_page = config('constant.PER_PAGE_LIMIT');
    
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' || $request->per_page == -1){
                $per_page = $recipes->count();
            }
        }
    
        $recipes = $recipes->orderBy('created_at','desc')->paginate($per_page);
    
        $items = RecipeResource::collection($recipes);
    
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
    public function getRecipeDetail(Request $request){
        $recipes_details = Recipe::where('id',$request->recipe_id)->first();
        $items = new RecipeDetailResource($recipes_details);
        $steps = RecipeStepsResource::collection($recipes_details->recipeSteps);
        $rating = RecipeRatingResource::collection($recipes_details->ratings);

        $user_rating = null;
        if($request->user_id != null){
            $user_rating = UserRating::where('user_id',$request->user_id)->where('recipe_id',$request->recipe_id)->first();
        }
        $response = [
            'recipes'    => $items,
            'steps'  => $steps,
            'rating' => $rating,
            'user_rating' => $user_rating
        ];
        return comman_custom_response($response);
    }
    public function saveRecipeRating(Request $request){
        $rating_data = $request->all();
        $result = UserRating::updateOrCreate(['id' => $request->id], $rating_data);

        $message = __('messages.update_form',[ 'form' => __('messages.rating') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.rating') ] );
		}

        return comman_message_response($message);
    }
    public function deleteRecipeRating(Request $request){
        
        $recipe_rating = UserRating::where('id',$request->id)->delete();
        
        $message = __('messages.delete_form',[ 'form' => __('messages.rating') ] );

        return comman_message_response($message);
    }
    public function saveRecipeLike(Request $request){
        $rating_data = $request->all();
        $result = UserLike::updateOrCreate(['id' => $request->id], $rating_data);

        $message = __('messages.update_form',[ 'form' => __('messages.like') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.like') ] );
		}

        return comman_message_response($message);
    }
    public function deleteRecipeLike(Request $request){
        
        $recipe_rating = UserLike::where('user_id',$request->user_id)->where('recipe_id',$request->recipe_id)->delete();
        
        $message = __('messages.delete_form',[ 'form' => __('messages.like') ] );

        return comman_message_response($message);
    }
    public function saveRecipeBookmark(Request $request){
        $rating_data = $request->all();
        $result = UserBookmark::updateOrCreate(['id' => $request->id], $rating_data);

        $message = __('messages.update_form',[ 'form' => __('messages.book_mark') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.book_mark') ] );
		}

        return comman_message_response($message);
    }
    public function deleteRecipeBookmark(Request $request){
        
        $recipe_rating = UserBookmark::where('user_id',$request->user_id)->where('recipe_id',$request->recipe_id)->delete();
        
        $message = __('messages.delete_form',[ 'form' => __('messages.book_mark') ] );

        return comman_message_response($message);
    }
    public function getUserBookmark(Request $request){
        $user = auth()->user();
        // dd($user->id);
        $bookmarks = UserBookmark::where('user_id',$user->id);

        $per_page = config('constant.PER_PAGE_LIMIT');

        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' || $request->per_page == -1){
                $per_page = $bookmarks->count();
            }
        }

        $bookmarks = $bookmarks->orderBy('created_at','desc')->paginate($per_page);

        $items = RecipeBookmarkResource::collection($bookmarks);

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
    public function getSearchRecipeList(Request $request){
        $recipes = Recipe::where('status',$request->status);

        if($request->has('keyword') && !empty($request->keyword)){
            $recipes = $recipes->where('title', 'LIKE', '%' . $request->keyword . '%');
        }
        if($request->has('dish_type') && !empty($request->dish_type)){
            $recipes = $recipes->whereIn('dish_type',explode(",",$request->dish_type));
        }
        if($request->has('cuisine') && !empty($request->cuisine)){
            $recipes = $recipes->whereIn('cuisine',explode(",",$request->cuisine));
        }
        $per_page = config('constant.PER_PAGE_LIMIT');
    
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' || $request->per_page == -1){
                $per_page = $recipes->count();
            }
        }
    
        $recipes = $recipes->orderBy('created_at','desc')->paginate($per_page);
    
        $items = RecipeResource::collection($recipes);
    
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
