<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Enrollment;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'category_id',
        'difficulty_level_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class);
    }

    public function image()
    {
        return $this->hasOne(CourseImage::class);
    }    

    public function images()
    {
        return $this->hasMany(CourseImage::class);
    }


    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}
