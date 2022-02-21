<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function ideas(){
        return $this->belongsToMany(Idea::class);
    }

    public function comments(){
        return $this->belongsToMany(Comment::class);
    }
    public function likes(){
        return $this->belongsToMany(Like::class);
    }
    public function dislikes(){
        return $this->belongsToMany(Dislike::class);
    }
}
