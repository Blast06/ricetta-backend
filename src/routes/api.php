<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('category-list',[API\CategoryController::class,'getCategoryList']);
Route::get('static-data-list',[API\StaticDataController::class,'getStaticDataList']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[ API\UserController::class, 'register' ]);
Route::post('login',[ API\UserController::class, 'login' ]);
Route::post('forgot-password',[ API\UserController::class, 'forgotPassword' ]);
Route::post('social-login',[ API\UserController::class, 'socialLogin' ]);

Route::get('dashboard-detail',[ API\DashboardController::class, 'dashboardDetail' ]);
Route::get('recipe-list',[API\RecipeController::class,'getRecipeList']);
Route::get('recipe-detail',[API\RecipeController::class,'getRecipeDetail']);


Route::get('slider-list',[API\SliderController::class,'getSliderList']);
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('change-password',[ API\UserController::class, 'changePassword' ]);
    Route::post('update-profile',[ API\UserController::class, 'updateProfile' ]);

    Route::get('logout',[ API\UserController::class, 'logout' ]);

    Route::post('save-category',[ API\CategoryController::class, 'store' ]);
    Route::post('delete-category',[ API\CategoryController::class, 'delete' ]);

    Route::post('save-slider',[ API\SliderController::class, 'store' ]);
    Route::post('delete-slider',[ API\SliderController::class, 'delete' ]);

    Route::post('save-static-data',[ API\StaticDataController::class, 'store' ]);
    Route::post('delete-static-data',[ API\StaticDataController::class, 'delete' ]);

    Route::post('save-recipe',[ API\RecipeController::class, 'store' ]);
    Route::post('delete-recipe',[ API\RecipeController::class, 'delete' ]);

    Route::post('save-recipe-ingredients',[ API\RecipeIngredientsController::class, 'store' ]);
    Route::post('delete-recipe-ingredients',[ API\RecipeIngredientsController::class, 'delete' ]);
    Route::get('recipe-Ingredients-list',[ API\RecipeIngredientsController::class, 'getIngredientList' ]);

    Route::post('save-recipe-steps',[ API\RecipeStepsController::class, 'store' ]);
    Route::post('delete-recipe-steps',[ API\RecipeStepsController::class, 'delete' ]);
    Route::get('recipe-steps-list',[ API\RecipeStepsController::class, 'getStepsList' ]);


    Route::post('save-utensils',[ API\StepsUtensilsController::class, 'store' ]);
    Route::post('delete-utensils',[ API\StepsUtensilsController::class, 'delete' ]);

    Route::post('save-rating',[ API\RecipeController::class, 'saveRecipeRating' ]);
    Route::post('delete-rating',[ API\RecipeController::class, 'deleteRecipeRating' ]);

    Route::post('save-like',[ API\RecipeController::class, 'saveRecipeLike' ]);
    Route::post('delete-like',[ API\RecipeController::class, 'deleteRecipeLike' ]);


    Route::post('save-bookmark',[ API\RecipeController::class, 'saveRecipeBookmark' ]);
    Route::post('delete-bookmark',[ API\RecipeController::class, 'deleteRecipeBookmark' ]);
    Route::get('get-user-bookmark',[API\RecipeController::class,'getUserBookmark']);
    
});