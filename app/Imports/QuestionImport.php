<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Quiz;
use App\Models\Question;

class QuestionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
		foreach ($rows as $row) {
			Question::create([
				'user_id' => 1,
				'quiz_id'     => $row[0],
				'question_text'    => $row[1],
				'option_a' => $row[2],
				'option_b' => $row[3],
				'option_c' => $row[4],
				'option_d' => $row[5],
				'correct_answer' => $row[6]
			]);
		}
    }
}
