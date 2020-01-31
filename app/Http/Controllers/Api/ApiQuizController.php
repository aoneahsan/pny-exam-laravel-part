<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\Question;
use App\Models\QuizReport;

use App\Http\Resources\QuizResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuizReportResource;

class ApiQuizController extends Controller
{

    public function getQuizzes(Request $request)
    {
        // dd($request->toArray());
        $items = StudentQuiz::where('student_quizzes.user_id', $request->id)
                                ->join('quizzes', 'quizzes.id', 'student_quizzes.quiz_id')
                                ->where('student_quizzes.quiz_available', 'yes')
                                ->select('quizzes.*')
                                ->get();
        // dd($items->toArray());
        return response()->json([
            'data' => QuizResource::collection($items)
        ]);
    }

    public function getQuizData(Request $request)
    {
        // dd($request->toArray());
        $userQuizzes = StudentQuiz::where('user_id', $request->userId)
                                    ->where('quiz_available', 'yes')
                                    ->pluck('quiz_id')->toArray();
        if (in_array($request->quiz_id, $userQuizzes)) {
            $item = Quiz::where('id', $request->quiz_id)->first();
            StudentQuiz::where('user_id', $request->userId)->where('quiz_id', $request->quiz_id)->update([
                'quiz_available' => 'no'
            ]);
            return response()->json([
                'data' => new QuizResource($item)
            ], 200);
            // dd($items->toArray());
        } else {
            return response()->json([
                'data' => null,
            ], 404);
        }
        
    }

    public function getQuizQuestions(Request $request)
    {
        // dd($request->toArray());
        $items = Question::where('quiz_id', $request->quiz_id)->get();
        // dd($items->toArray());
        return response()->json([
            'data' => QuestionResource::collection($items)
        ]);
    }

    public function saveQuizReport(Request $request)
    {
        // dd($request);
        $item = QuizReport::where('user_id', $request->user_id)
                            ->where('quiz_id', $request->quiz_id)
                            ->first();
        if (!is_null($item)) {
            // dd("ok");
            QuizReport::where('user_id', $request->user_id)
                            ->where('quiz_id', $request->quiz_id)
                            ->update([
                                'quiz_full_marks' => $request->quiz_full_marks,
                                'mark_per_question' => $request->mark_per_question,
                                'final_marks' => $request->final_marks,
                                'attempted_questions' => $request->attempted_questions,
                                'total_questions' => $request->total_questions,
                                'quiz_attend_at' => $request->quiz_attend_at,
                                'quiz_finish_at' => $request->quiz_finish_at
                            ]);
        }
        else {
            QuizReport::create([
                'user_id' => $request->user_id,
                'quiz_id' => $request->quiz_id,
                'quiz_full_marks' => $request->quiz_full_marks,
                'mark_per_question' => $request->mark_per_question,
                'final_marks' => $request->final_marks,
                'attempted_questions' => $request->attempted_questions,
                'total_questions' => $request->total_questions,
                'quiz_attend_at' => $request->quiz_attend_at,
                'quiz_finish_at' => $request->quiz_finish_at
            ]);
        }

        return response()->json([
            'data' => "Quiz Report Saved"
        ], 200);
    }

    public function getUserQuizReports(Request $request)
    {
        $items = QuizReport::where('quiz_reports.user_id', $request->user_id)
                        ->join('quizzes', 'quizzes.id', 'quiz_reports.quiz_id')
                        ->select('quiz_reports.*', 'quizzes.title as quiz_title', 'quizzes.description as quiz_description', 'quizzes.passing_percentage as passing_percentage')
                        ->get();
        return response()->json([
            'data' => QuizReportResource::collection($items)
        ], 200);
    }
}
