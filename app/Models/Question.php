<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Quiz;

class Question extends Model
{
    protected $fillable = [
    	'user_id', 'quiz_id', 'question_text', 'option_a', 'option_b', 'option_c', 'option_d', 'code_snippets', 'answer_explanation', 'video_file', 'video_url', 'photo_file', 'photo_url', 'correct_answer', 'user_answer'
    ];

    public function quiz_name()
    {
    	$quiz = Quiz::where('id', $this->quiz_id)->first();
    	return $quiz->title;
    }

    public function getVideoLink()
    {
        return asset('project-assets/uploaded/images/'.$this->video_file);
    }

    public function getImageLink()
    {
        return asset('project-assets/uploaded/images/'.$this->photo_file);
    }
}
