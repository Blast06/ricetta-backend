<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepUtensil extends Model
{
    use HasFactory;
    protected $table = 'step_utensils';
    protected $fillable = [
        'step_id', 'recipe_id','amount', 'name', 'special_use', 'special_characteristics' , 'size' ,'sequence'
    ];
}
