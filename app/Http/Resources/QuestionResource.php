<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'question_text' => $this->question_text,
            'option_a' => $this->option_a,
            'option_b' => $this->option_b,
            'option_c' => $this->option_c,
            'option_d' => $this->option_d,
            'correct_answer' => $this->correct_answer,
            'user_answer' => $this->user_answer,
            'code_snippets' => $this->code_snippets,
            'video_file' => $this->getVideoLink(),
            'video_url' => $this->video_url,
            'photo_file' => $this->getImageLink(),
            'photo_url' => $this->photo_url,
            'photo_file' => $this->user_answer
        ];
    }
}
