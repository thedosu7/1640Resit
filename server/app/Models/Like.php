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
    public function ideas(){
        return $this->belongsTo(Idea::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
