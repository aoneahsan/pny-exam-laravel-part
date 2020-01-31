<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Role;
use App\Models\UserDetails;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\QuizReport;

use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_details = UserDetails::all();
        $users = User::with('roles')->get();
        $users_total = User::count();
        return view('project.students.index', compact(
            'users',
            'users_total',
            'users_details'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Quiz::all();
        return view('project.students.create', compact('items'));
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
        $users = User::pluck('email')->toArray();
        // dd($users, $request->email, !(in_array($request->email, $users)));
        if (!in_array($request->email, $users)) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'course_name' => $request->course_name,
                'batch' => $request->batch,
                'password' => Hash::make($request->password),
                'password_remember' => $request->password,
                'created_by' => Auth::user()->roles[0]->id,
                'user_role' => 'student'
            ]);
            
            $role_admin = Role::where('name', 'student')->first();
            $user->roles()->attach($role_admin);
            UserDetails::create([
                'user_id' => $user->id,
                'location' => $request->location,
                'cnic' => $request->cnic,
                'city' => $request->city,
                'phone_number' => $request->phone_number,
                'profile_image' => $image_pic,
            ]);
            // adding StudentQuiz entry
            if ($request->quiz_id) {
                StudentQuiz::create([
                    'user_id' => $user->id,
                    'quiz_id' => $request->quiz_id,
                    'quiz_available' => 'yes'
                ]);
            }
            return redirect('admin/students/')->with('added','Added Successfully!');
        }
        else {
            return redirect('admin/students/')->with('error', 'Email Already Exists!');
        }
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
        $users_add = User::pluck('id');
        // dd($users_add->toArray());
        if (in_array($id, $users_add->toArray())) {
            $user = User::where('id',$id)->with('user_details')->first();
            return view('project.students.single_user',compact('user'));
        } else {
            return redirect('/admin/students')->with('error','User Not Found');
        }
        // dd($user->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('user_details')->first();
        // dd($user->toArray());
        return view('project.students.edit',compact('user'));
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

        $user_details = UserDetails::where('user_id', $id)->first();
        // dd($request->toArray(),$id);
        if (Auth::user()->roles[0]->id === 1) {
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'course_name' => $request->course_name,
                'batch' => $request->batch,
                'is_active' => $request->is_active,
            ]);
            if ($request->password && !is_null($request->password)) {
                User::where('id',$id)->update([
                    'password' => Hash::make($request->password),
                    'password_remember' => $request->password,
                ]);
            }
        }

        $profile_image = '';
        if($request->hasfile('profile_image')){
            $image_array = $request->file('profile_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $profile_image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$profile_image);
            // @unlink(public_path('project-assets\uploaded\images/') . $user_details->profile_image);
        }

        UserDetails::where('user_id',$id)->update([
            'address' => $request->address,
            'cnic' => $request->cnic,
            'profile_image' => ($profile_image == "" ? $user_details->profile_image : $profile_image),
            'location' => $request->location,
            'city' => $request->city,
        ]);

        return redirect('admin/students/'.$id)->with('updated','Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        UserDetails::where('user_id',$id)->delete();
        return redirect('/admin/students')->with('deleted','Deleted Successfully!');
    }

    public function StudentReports()
    {
        $reports = QuizReport::join('users', 'users.id', 'quiz_reports.user_id')
                    ->join('quizzes', 'quizzes.id', 'quiz_reports.quiz_id')
                    ->select('quiz_reports.*', 'users.name as student_name', 'users.email as student_email', 'quizzes.title as quiz_title')
                    ->get();
        // dd($reports->toArray());
        // $users = User::with('roles')->get();
        // $users_total = User::count();
        return view('project.students.student_quiz_reports', compact(
            'reports'
        ));
    }

    public function StudentReportsSpecific(Request $request)
    {
        $reports = QuizReport::join('users', 'users.id', 'quiz_reports.user_id')
                    ->where('users.course_name', $request->course_name)
                    ->where('users.batch', $request->batch)
                    ->join('quizzes', 'quizzes.id', 'quiz_reports.quiz_id')
                    ->select('quiz_reports.*', 'users.name as student_name', 'users.email as student_email', 'quizzes.title as quiz_title')
                    ->get();
        // dd($reports->toArray());
        // $users = User::with('roles')->get();
        // $users_total = User::count();
        return view('project.students.student_quiz_reports', compact(
            'reports'
        ));
    }

    public function StudentImport(Request $request)
    {
        // dd($request->toArray());
        if ($request->hasFile('file')) {
            $file = $request->file;
            // dd($file->getClientOriginalExtension());
            if ($file->getClientOriginalExtension() == 'csv') {
                $result = Excel::import(new StudentImport, request()->file('file'));
                // dd($result);
                return redirect('/admin/students')->with('added', 'All good!');
            } else {
                return redirect('/admin/students')->with('error', 'Only CSV File Allowed!');
            }
            
        } else {
            return redirect('/admin/students')->with('error', 'Upload a file (csv file)!');
        }
    }
}
