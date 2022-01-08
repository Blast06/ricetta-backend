<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\API\RecipeResource;
use App\Http\Resources\API\CategoryResource;
use App\Http\Resources\API\SliderResource;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Slider;

class DashboardController extends Controller
{
   
    public function dashboardDetail(Request $request)
    {
        $per_page = config('constant.PER_PAGE_LIMIT');

        $slider = SliderResource::collection(Slider::where('status',1)->paginate($per_page));
        
        $latest_recipes = RecipeResource::collection(Recipe::orderBy('id','DESC')->paginate($per_page));

        $category = CategoryResource::collection(Category::where('status',1)->paginate($per_page));
    
        $response = [
           'status'     => true,
           'slider'     => $slider,
           'latestRecipe'     => $latest_recipes,
           'category'   => $category,
        ];

        return comman_custom_response($response);
    }
}
