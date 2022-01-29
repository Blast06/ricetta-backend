<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;
    protected $table = 'recipe_ingredients';
    protected $fillable = [
        'recipe_id', 'name', 'amount', 'unit', 'special_use' , 'special_characteristics'
    ];

    public function recipe(){
        return $this->belongsTo(Recipe::class,'recipe_id','id');
    }
    

}
