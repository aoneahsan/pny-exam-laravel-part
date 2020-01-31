<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'per_question_mark' => $this->per_question_mark,
            'quiz_price' => $this->quiz_price,
            'quiz_time' => $this->quiz_time,
            'show_answers' => $this->show_answers,
            'quiz_type' => $this->quiz_type
        ];
    }
}
