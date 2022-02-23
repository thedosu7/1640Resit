<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'idea_id',
              
    ];
    public function user(){
        return $this->belongTo(User::class);
    }
    public function idea(){
        return $this->belongTo(Idea::class);
    }
}
