<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = "missions";

    protected $fillable = [
        'name',
        'description',
        'end_at',
        'category_id',
        'department_id',
        'semester_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
