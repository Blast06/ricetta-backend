<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Recipe extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'recipes';
    protected $fillable = [
        'title', 'portion_unit', 'portion_type', 'difficulty', 'preparation_time' , 'baking_time' ,'resting_time' , 'dish_type','cuisine' , 'status', 'user_id' 
    ];

    public function recipeIngredients(){
        return $this->hasMany(RecipeIngredient::class, 'recipe_id','id');
    }

    public function recipeSteps(){
        return $this->hasMany(RecipeStep::class, 'recipe_id','id');
    }

    public function ratings(){
        return $this->hasMany(UserRating::class, 'recipe_id','id');
    }

    public function users(){
        return $this->belongsTo(User::class,'id', 'user_id');
    }

    public function getUserBookmark(){
        return $this->hasMany(UserBookmark::class, 'recipe_id','id');
    }

    public function getUserLike(){
        return $this->hasMany(UserLike::class, 'recipe_id','id');
    }

    public function recipeUtensils(){
        return $this->hasMany(StepUtensil::class, 'recipe_id','id');
    }

    protected static function boot(){
        parent::boot();
        static::deleted(function ($row) {
            $row->recipeIngredients()->delete();
            $row->recipeSteps()->delete();
            $row->recipeUtensils()->delete();
            $row->ratings()->delete();
            $row->getUserBookmark()->delete();
            $row->getUserLike()->delete();
        });
    }
}
