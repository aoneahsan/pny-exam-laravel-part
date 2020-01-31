<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQuiz extends Model
{
    protected $fillable = [
    	'user_id', 'quiz_id', 'quiz_available'
    ];
}
