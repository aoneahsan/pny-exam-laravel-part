@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/questions/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>quiz_id</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select type="text" name="quiz_id" required="required" value="" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					@foreach($quizs as $quiz)
						<option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>question_text</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="question_text" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_a</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_a" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_b</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_b" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_c</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_c" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_d</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_d" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>correct_answer</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select type="text" name="correct_answer" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					<option value="a">A</option>
					<option value="b">B</option>
					<option value="c">C</option>
					<option value="d">D</option>
				</select>
			</div>
		</div>
	</div>
	<!-- <div class="col-xs-12 col-sm-6">
		<div class="col-xs-3 d-inline-block">
			<strong>code_snippets</strong>
		</div>
		<div class="col-xs-9 d-inline-block">
			<input type="number" name="code_snippets" value="" class="form-control" style="width: 100%;">
		</div>
	</div>
	<div class="col-xs-12 col-sm-6">
		<div class="col-xs-3 d-inline-block">
			<strong>answer_explanation</strong>
		</div>
		<div class="col-xs-9 d-inline-block">
			<input type="number" name="answer_explanation" value="" class="form-control" style="width: 100%;">
		</div>
	</div> -->
	<!-- <div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>video_file</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="video_file" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>video_url</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="video_url" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>photo_file</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="photo_file" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>photo_url</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="photo_url" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
	 <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>user_answer</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="user_answer" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div> -->
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Create</button>
		</div>
	</div>
</form>
@endsection