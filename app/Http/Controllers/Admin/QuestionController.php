<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Question;

use App\Imports\QuestionImport;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    public function index()
    {
        $items = Question::leftjoin('quizzes', 'quizzes.id', 'questions.quiz_id')
                    ->leftjoin('users', 'users.id', 'questions.user_id')
                    ->select('questions.*', 'quizzes.title as quiz_title', 'users.name as user_name')
                    ->get();
        // dd($items);
        return view('project.questions.index', compact(
            'items'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizs = Quiz::all();
        return view('project.questions.create', compact(
            'quizs'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());

        $Question = Question::create([
            'user_id' => $request->user_id,
            'quiz_id' => $request->quiz_id,
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'code_snippets' => $request->code_snippets,
            'answer_explanation' => $request->answer_explanation,
            'video_file' => $request->video_file,
            'video_url' => $request->video_url,
            'photo_file' => $request->photo_file,
            'photo_url' => $request->photo_url,
            'correct_answer' => $request->correct_answer,
            'user_answer' => $request->user_answer
        ]);
        return redirect('admin/questions/')->with('added','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $Questions_add = Question::pluck('id');
        // dd($Questions_add->toArray());
        if (in_array($id, $Questions_add->toArray())) {
            $item = Question::where('id',$id)->first();
            return view('project.questions.single',compact('item'));
        } else {
            return redirect('/admin/questions')->with('error','Question Not Found');
        }
        // dd($Question->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizs = Quiz::all();
        $item = Question::where('id',$id)->first();
        // dd($item->toArray());
        return view('project.questions.edit',compact(
            'item',
            'quizs'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->toArray(),$id);
        Question::where('id',$id)->update([
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'code_snippets' => $request->code_snippets,
            'answer_explanation' => $request->answer_explanation,
            'video_file' => $request->video_file,
            'video_url' => $request->video_url,
            'photo_file' => $request->photo_file,
            'photo_url' => $request->photo_url,
            'correct_answer' => $request->correct_answer,
            'user_answer' => $request->user_answer
        ]);

        return redirect('admin/questions/'.$id)->with('updated','Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::where('id',$id)->delete();
        return redirect('/admin/questions')->with('deleted','Deleted Successfully!');
    }

    public function QuestionImport(Request $request)
    {
        // dd($request->toArray());
        if ($request->hasFile('file')) {
            $file = $request->file;
            // dd($file->getClientOriginalExtension());
            if ($file->getClientOriginalExtension() == 'csv') {
                $result = Excel::import(new QuestionImport, request()->file('file'));
                // dd($result);
                return redirect('/admin/questions')->with('added', 'All good!');
            } else {
                return redirect('/admin/questions')->with('error', 'Only CSV File Allowed!');
            }
        } else {
            return redirect('/admin/questions')->with('error', 'Upload a file (csv file)!');
        }
    }

}