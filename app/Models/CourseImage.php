<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseImage extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'path'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
