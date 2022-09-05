<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBookmark extends Model
{
    use HasFactory;
    protected $table = 'user_bookmarks';
    protected $fillable = [
        'recipe_id', 'user_id'
    ];
    protected $casts = [
        'recipe_id'    => 'integer',
        'user_id'      => 'integer',
    ];
    public function recipe(){
        return $this->belongsTo(Recipe::class,'recipe_id','id');
    }
}
