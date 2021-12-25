<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StaticData;
use App\Http\Resources\API\StaticDataResource;

class StaticDataController extends Controller
{
    public function store(Request $request){

    $static_data = $request->all();
    
    $static_data['value'] = str_replace(' ', '_', strtolower($request->label));
    $result = StaticData::updateOrCreate(['id' => $request->id], $static_data);


    $message = __('messages.update_form',[ 'form' => __('messages.static_data') ] );

    if($result->wasRecentlyCreated){
        $message = __('messages.save_form',[ 'form' => __('messages.static_data') ] );
    }

    return comman_message_response($message);
  }

  public function delete(Request $request){
    $static_data = StaticData::where('id',$request->id)->first();

    if($static_data){
        StaticData::where('id',$request->id)->delete();
        $message = __('messages.delete_form',[ 'form' => __('messages.static_data') ] );
    }else{
        $message = __('messages.record_not_found');
    }

    return comman_message_response($message);
  }

  public function getStaticDataList(Request $request){


    $static_data = StaticData::orderBy('created_at','desc');

    if( $request->has('type') && !empty($request->type)){
        $static_data = $static_data->where('type',$request->type);
    }

    if( $request->has('keyword') && !empty($request->keyword)){
        $static_data = $static_data->where('value', 'LIKE', '%' . $request->keyword . '%');
    }
    $per_page = config('constant.PER_PAGE_LIMIT');

    if( $request->has('per_page') && !empty($request->per_page)){
        if(is_numeric($request->per_page)){
            $per_page = $request->per_page;
        }
        if($request->per_page === 'all' || $request->per_page == -1){
            $per_page = $static_data->count();
        }
    }

    $static_data = $static_data->paginate($per_page);

    $items = StaticDataResource::collection($static_data);

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
