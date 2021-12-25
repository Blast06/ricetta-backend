<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\API\CategoryResource;
class CategoryController extends Controller
{

  public function store(Request $request){

    $category_data = $request->all();

    $result = Category::updateOrCreate(['id' => $request->id], $category_data);

    storeMediaFile($result,$request->category_image, 'category_image');

    $message = __('messages.update_form',[ 'form' => __('messages.category') ] );
    if($result->wasRecentlyCreated){
        $message = __('messages.save_form',[ 'form' => __('messages.category') ] );
    }
    $response = [
      'message' => $message,
      'category_id' => $result->id,
    ];
    return comman_custom_response($response);
  }

  public function delete(Request $request){
    $category = Category::where('id',$request->id)->delete();

    $message = __('messages.delete_form',[ 'form' => __('messages.category') ] );

    return comman_message_response($message);
  }

  public function getCategoryList(Request $request){
    $category = Category::where('status',1);

    $per_page = config('constant.PER_PAGE_LIMIT');

    if( $request->has('per_page') && !empty($request->per_page)){
        if(is_numeric($request->per_page)){
            $per_page = $request->per_page;
        }
        if($request->per_page === 'all' || $request->per_page == -1){
            $per_page = $category->count();
        }
    }

    $category = $category->orderBy('created_at','desc')->paginate($per_page);

    $items = CategoryResource::collection($category);

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
