<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    use HasFactory;
    protected $table = 'user_ratings';
    protected $fillable = [
        'recipe_id', 'rating', 'review','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
