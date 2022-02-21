<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'idea_id',
        'direction',       
    ];
    public function ideas(){
        return $this->belongsTo(Idea::class);
    }
}
