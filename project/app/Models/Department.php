<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    const SUPPORT = 'support';
    const ACADEMIC = 'academic';

    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
