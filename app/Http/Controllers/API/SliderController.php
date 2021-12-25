<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Resources\API\SliderResource;

class SliderController extends Controller
{

    public function store(Request $request){

        $sliders = $request->all();

        $result = Slider::updateOrCreate(['id' => $request->id], $sliders);

        storeMediaFile($result,$request->slider_image, 'slider_image');

        $message = __('messages.update_form',[ 'form' => __('messages.slider') ] );
        if($result->wasRecentlyCreated){
            $message = __('messages.save_form',[ 'form' => __('messages.slider') ] );
        }

        $response = [
        'message' => $message,
        'slider_id' => $result->id,
        ];

        return comman_custom_response($response);
    }

    public function getSliderList(Request $request)
    {
        $slider = new Slider;

        if($request->has('status')){
            $slider = $slider->where('status',$request->status);
        }
        
        $per_page = config('constant.PER_PAGE_LIMIT');

        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' || $request->per_page == -1){
                $per_page = $slider->count();
            }
        }
        
        $slider = $slider->orderBy('created_at','desc')->paginate($per_page);

        $items = SliderResource::collection($slider);

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

    public function delete(Request $request)
    {
        $slider = Slider::where('id',$request->id)->delete();

        $message = __('messages.delete_form',[ 'form' => __('messages.slider') ] );

        return comman_message_response($message);
    }

}
