<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class RecipeStep extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'recipe_steps';

    protected $fillable = [
        'recipe_id', 'description', 'ingredient_used_id', 'media_link'
    ];
    public function utensil(){
        return $this->hasMany(StepUtensil::class, 'step_id','id');
    }

    protected static function boot(){
        parent::boot();
        static::deleted(function ($row) {
            $row->utensil()->delete();
        });
    }

}
