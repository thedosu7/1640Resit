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
    public function usres(){
        return $this->belongsTo(User::class);
    }
    public function ideas(){
        return $this->belongsTo(Idea::class);
    }
}
