<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description'];


    public function modules()
    {
      return $this->hasMany(\App\Models\Module::class);
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    

}
