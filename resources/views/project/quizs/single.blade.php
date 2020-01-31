@extends('project.index')
@section('content')
<div class="custom_dive_1">
	@if(Session::has('added'))
		<div class="alert alert-success">
			{{ Session::get('added') }}
		</div>
	@endif
	@if(Session::has('deleted'))
		<div class="alert alert-danger">
			{{ Session::get('deleted') }}
		</div>
	@endif
	@if(Session::has('error'))
		<div class="alert alert-warning">
			{{ Session::get('error') }}
		</div>
	@endif
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>ID</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>user</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->user_id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>title</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->title }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>description</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->description }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>per question mark</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->per_question_mark }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>quiz time</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->quiz_time }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>passing percentage</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->passing_percentage }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Quiz Type</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->quiz_type == 'mcq' ? 'MCQs' : 'Question Answer' }}
		</div>
	</div>
	<!-- <div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>quiz_price</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->quiz_price }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>show_answers</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->show_answers }}
		</div>
	</div> -->
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/quizs/'.$item->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/quizs/'.$item->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
	<br>
	<!-- Quiz Students -->
	<h2>Student In this quiz</h2>
	<a href="{{ url('admin/student-quiz') }}" class="btn btn-primary">Add Student</a>
	<table class="table dataTable no-footer">
		<thead>
			<tr>
				<th>ID</th>
				<th>Student</th>
				<th>Unblock Quiz</th>
				<th>View Student Profile</th>
				<th>Remove Student</th>
			</tr>
		</thead>
		<tbody>
			@foreach($students as $student)
				<tr>
					<td>{{ $loop->index+1 }}</td>
					<td>{{ $student->name }}</td>
					<td>
						<form method="post" action="{{ url('admin/unblock-student-quiz-action/') }}">
							@csrf
							<input type="hidden" name="student_id" value="{{ $student->id }}">
							<input type="hidden" name="quiz" value="{{ $item->id }}">
							<button type="submit" class="btn btn-primary" >Remove Student</button>
						</form>
					</td>
					<td><a class="btn btn-info" href="{{ url('/admin/students/'.$student->id) }}">View Profile</a></td>
					<td>
						<form method="post" action="{{ url('admin/remove-student-quiz-action/') }}">
							@csrf
							<input type="hidden" name="student_id" value="{{ $student->id }}">
							<input type="hidden" name="quiz" value="{{ $item->id }}">
							<button type="submit" class="btn btn-danger" >Remove Student</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<!-- Quiz Questions -->
	<br>
	<h2>Questions In this quiz</h2>
	<a href="{{ url('admin/questions/create') }}" class="btn btn-primary">Add Question</a>
	<table class="table dataTable no-footer">
		<thead>
			<tr>
				<th>ID</th>
				<th>Question Text</th>
				<th>Option (a)</th>
				<th>Option (b)</th>
				<th>Option (c)</th>
				<th>Option (d)</th>
				<th>Correct Option</th>
				<th>View Question</th>
				<th>Remove Question</th>
			</tr>
		</thead>
		<tbody>
			@foreach($questions as $question)
				<tr>
					<td>{{ $loop->index+1 }}</td>
					<td>{{ $question->question_text }}</td>
					<td>{{ $question->option_a }}</td>
					<td>{{ $question->option_b }}</td>
					<td>{{ $question->option_c }}</td>
					<td>{{ $question->option_d }}</td>
					<td>{{ $question->correct_answer }}</td>
					<td><a class="btn btn-info" href="{{ url('/admin/questions/'.$question->id) }}">View Question</a></td>
					<td>
						<form method="post" action="{{ url('admin/questions', $question->id ) }}">
							@csrf
							@method('DELETE')
							<input type="hidden" name="student_id" value="{{ $question->id }}">
							<input type="hidden" name="quiz" value="{{ $item->id }}">
							<button type="submit" class="btn btn-danger" >Remove Student</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<a href="{{ url('admin/quizs/questions-delete') }}" class="btn btn-primary">Delete All Questions</a>
</div>
@endsection