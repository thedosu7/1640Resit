<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'idea_id',
        'user_id',       
    ];
    public function idea(){
        return $this->belongTo(Idea::class);
    }
    public function user(){
        return $this->belongTo(User::class);
    }
}
