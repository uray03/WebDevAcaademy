<?php

// app/Models/DifficultyLevel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DifficultyLevel extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

