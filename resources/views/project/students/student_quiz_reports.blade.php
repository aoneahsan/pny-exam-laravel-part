@extends('project.index')
@section('content')
<div id="wrapper-content">
    <!-- PAGE WRAPPER-->
    @if(Session::has('user_unbanned'))
    <div class="alert alert-success">
        {{ Session::get('user_unbanned') }}
    </div>
    @elseif(Session::has('deleted'))
    <div class="alert alert-danger">
        {{ Session::get('deleted') }}
    </div>
    @elseif(Session::has('updated'))
    <div class="alert alert-success">
        {{ Session::get('updated') }}
    </div>
    @elseif(Session::has('added'))
    <div class="alert alert-success">
        {{ Session::get('added') }}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-warning">
        {{ Session::get('error') }}
    </div>
    @endif
    <div id="page-wrapper">
        <!-- MAIN CONTENT-->
        <div class="main-content text-center">
            <!-- CONTENT-->
            <div class="content">
                <h2 class="text-center">Student Quiz Reports</h2>
                <div class="col-xs-12">
                    <br>
                    <form method="post" action="{{ url('admin/students-reports') }}">
                        @csrf
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-md-4">
                                <input type="text" name="course_name" class="form-control" required="required" style="width: 100%" placeholder="Enter Course Name">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <input type="number" placeholder="Enter Batch Number" name="batch" class="form-control" required="required" style="width: 100%">
                            </div>
                            <div class="col-xs-12 col-md-4 text-left">
                                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            	<table class="table" id="user-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
            				<th class="text-center">Quiz Title</th>
                            <th class="text-center">Student Name</th>
                            <th class="text-center">Student Email</th>
                            <th class="text-center">Obtained Marks</th>
                            <th class="text-center">Quiz Full Marks</th>
                            <th class="text-center">Mark Per Question</th>
                            <th class="text-center">Attempted Questions</th>
                            <th class="text-center">Total Questions</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($reports as $user)
        				<tr>
        					<td>{{ $loop->index+1 }}</td>
        					<td>{{ $user->quiz_title }}</td>
                            <td>{{ $user->student_name }}</td>
                            <td>{{ $user->student_email }}</td>
                            <td>{{ $user->final_marks }}</td>
                            <td>{{ $user->quiz_full_marks }}</td>
                            <td>{{ $user->mark_per_question }}</td>
                            <td>{{ $user->attempted_questions }}</td>
                            <td>{{ $user->total_questions }}</td>
        				</tr>
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection