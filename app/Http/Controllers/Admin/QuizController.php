<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\StudentQuiz;

class QuizController extends Controller
{
    public function index()
    {
        $items = Quiz::all();
        return view('project.quizs.index', compact(
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
        return view('project.quizs.create');
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

        $image_pic = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image_pic = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image_pic);
        };

        $Quiz = Quiz::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'per_question_mark' => $request->per_question_mark,
            'quiz_time' => $request->quiz_time,
            'quiz_price' => $request->quiz_price,
            'show_answers' => $request->show_answers,
            'passing_percentage' => $request->passing_percentage,
            'quiz_type' => $request->quiz_type
        ]);
        return redirect('admin/quizs/')->with('added','Added Successfully!');
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
        $Quizs_add = Quiz::pluck('id');
        // dd($Quizs_add->toArray());
        if (in_array($id, $Quizs_add->toArray())) {
            $students = StudentQuiz::where('quiz_id', $id)
                                        ->join('users', 'users.id', 'student_quizzes.user_id')
                                        ->select('users.id as id', 'users.name as name', 'student_quizzes.quiz_available as quiz_available')
                                        ->get();
            // dd($students->toArray());
            $item = Quiz::where('id',$id)->first();
            $questions = Question::where('quiz_id',$id)->get();
            return view('project.quizs.single',compact('item', 'students', 'questions'));
        } else {
            return redirect('/admin/quizs')->with('error','Quiz Not Found');
        }
        // dd($Quiz->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Quiz::where('id',$id)->first();
        // dd($item->toArray());
        return view('project.quizs.edit',compact('item'));
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
        Quiz::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'per_question_mark' => $request->per_question_mark,
            'quiz_time' => $request->quiz_time,
            'quiz_price' => $request->quiz_price,
            'show_answers' => $request->show_answers,
            'passing_percentage' => $request->passing_percentage,
            'quiz_type' => $request->quiz_type
        ]);

        return redirect('admin/quizs/'.$id)->with('updated','Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::where('id',$id)->delete();
        Question::where('quiz_id',$id)->delete();
        return redirect('/admin/quizs')->with('deleted','Deleted Successfully!');
    }

    public function deleteQuestions($id)
    {
        Question::where('quiz_id',$id)->delete();
        return redirect('/admin/quizs/'.$id)->with('deleted','Questions Deleted Successfully!');
    }
    
}
