<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CommonController extends Controller
{
    public function removeFile(Request $request)
    {
        $type = $request->type;
        $data = null;
        switch ($type) {
            case 'profile_image':
                $data = User::find($request->id);
                $message = __('messages.msg_removed',['name' => __('messages.profile_image') ]);
                break;
            case 'recipe_main_image':
                $data = Recipe::find($request->id);
                $message = __('messages.msg_removed',['name' => __('messages.recipe_main_image') ]);
                break;
            case 'recipe_image':
                $media = Media::find($request->id);
                $media->delete();
                $message = __('messages.msg_removed',['name' => __('messages.recipe')] );
                break;
            case 'step_image_gallery':
                $media = Media::find($request->id);
                $media->delete();
                $message = __('messages.msg_removed',['name' => __('messages.step_image_gallery')] );
                break;
            default:
             $message ='';
                $data = NULL;
            break;
        }

        if($data != null){
            $data->clearMediaCollection($type);
        }

        $response = [
            'status'    => true,
            'message'   => $message
        ];

        return comman_custom_response($response);
    }
}