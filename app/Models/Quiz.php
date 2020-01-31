<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Question;

class Quiz extends Model
{
    protected $fillable = [
    	'user_id', 'title', 'description', 'per_question_mark', 'quiz_time', 'quiz_price', 'show_answers', 'quiz_available', 'passing_percentage', 'quiz_type'
    ];

    public function questions()
    {
    	return $this->hasMany('App\Models\Question');
    }
}
