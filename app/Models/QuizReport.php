<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizReport extends Model
{
	protected $fillable = [
    	'user_id', 'quiz_id', 'quiz_full_marks', 'mark_per_question', 'final_marks', 'attempted_questions', 'total_questions', 'quiz_attend_at', 'quiz_finish_at'
    ];
}
