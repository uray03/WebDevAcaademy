<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Question extends Model
{
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
    ];
}

