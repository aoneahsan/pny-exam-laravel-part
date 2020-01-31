<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

use App\User;
use App\Models\Quiz;
use App\Models\StudentQuiz;

class SystemController extends Controller
{
	public function showDashborad()
    {
        $total_users_all = User::count();
        $total_users = $total_users_all - 1;
        $admins = 0;
        $users = 0;
        $users_c = User::with('roles')->get();
        foreach ($users_c as $user) {
            if ($user['roles'][0]['id'] == 2) {
                $admins++;
            }
            if ($user['roles'][0]['id'] == 3) {
                $users++;
            }
        }
        return view('project.dashborad.index', compact(
            'total_users',
            'admins',
            'users'
        ));
	}

	public function addStudentQuiz()
	{
		$students = User::where('user_role', 'student')->get();
		$quizes = Quiz::all();
		return view('project.quizs.addstudentquiz', compact('students', 'quizes'));
	}

	public function addStudentQuizAction(Request $request)
	{
		// dd($request->toArray());
		$students_already_registered = StudentQuiz::where('quiz_id', $request->quiz)->pluck('user_id')->toArray();
		if (!in_array($request->student, $students_already_registered)) {
			StudentQuiz::create([
				'user_id' => $request->student,
				'quiz_id' => $request->quiz,
				'quiz_available' => 'yes'
			]);
			return redirect('/admin/quizs/'.$request->quiz)->with('added', 'student added!');
		} else {
			return redirect('/admin/quizs/'.$request->quiz)->with('error', 'student already exists!');
		}
	}

	public function addBatchQuiz()
	{
		$quizes = Quiz::all();
		return view('project.quizs.addbatchquiz', compact('quizes'));
	}

	public function addBatchQuizAction(Request $request)
	{
		// dd($request->toArray());
		$students = User::where('course_name', $request->course_name)
							->where('batch', $request->batch)
							->pluck('id')
							->toArray();
		$students_already_registered = StudentQuiz::where('quiz_id', $request->quiz)->pluck('user_id')->toArray();
		// dd($students_already_registered);
		foreach ($students as $student) {
			// dd($student);
			if (!in_array($student, $students_already_registered)) {
				StudentQuiz::create([
					'user_id' => $student,
					'quiz_id' => $request->quiz,
					'quiz_available' => 'yes'
				]);
			}
		}
		return redirect('/admin/quizs/'.$request->quiz)->with('added', 'student added!');
	}

	public function removeStudentQuizAction(Request $request)
	{
		// dd($request->toArray());
		StudentQuiz::where('user_id', $request->student_id)->delete();
		return redirect('/admin/quizs/'.$request->quiz)->with('deleted', 'student deleted!');
	}

	public function unblockStudentQuizAction(Request $request)
	{
		// dd($request->toArray());
		StudentQuiz::where('user_id', $request->student_id)
						->where('quiz_id', $request->quiz)
						->update([
							'quiz_available' => 'yes'
						]);
		return redirect('/admin/quizs/'.$request->quiz)->with('added', 'student can retake the quiz!');
	}

}