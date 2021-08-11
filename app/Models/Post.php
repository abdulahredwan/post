<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];
   
    //the dosn't like twise
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    //to connect the name of the poster
    public function user()
    { 
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
