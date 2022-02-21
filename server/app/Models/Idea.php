<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',    
        'user_id',
        'category_id'   
    ];

    public function users(){
        return $this->belongsTo(User::class);
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
    public function attachments(){
        return $this->belongsToMany(Attachment::class);
    }
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    
}
