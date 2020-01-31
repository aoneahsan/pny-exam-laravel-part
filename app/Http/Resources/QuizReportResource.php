<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quiz_title' => $this->quiz_title,
            'quiz_description' => $this->quiz_description,
            'passing_percentage' => $this->passing_percentage,
            'final_marks' => $this->final_marks,
            'quiz_full_marks' => $this->quiz_full_marks,
            'mark_per_question' => $this->mark_per_question,
            'attempted_questions' => $this->attempted_questions,
            'total_questions' => $this->total_questions,
            'quiz_attend_at' => $this->quiz_attend_at,
            'quiz_finish_at' => $this->quiz_finish_at
        ];
    }
}
