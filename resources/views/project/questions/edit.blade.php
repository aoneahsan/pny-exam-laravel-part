@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/questions/' . $item->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>quiz_id</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select type="text" name="quiz_id" required="required" value="" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					@foreach($quizs as $quiz)
						@if($quiz->id == $item->quiz_id)
						<option selected="selected" value="{{ $quiz->id }}">{{ $quiz->id }}: {{ $quiz->title }}</option>
						@else
						<option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>question_text</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="question_text" required="required" value="{{ $item->question_text }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_a</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_a" required="required" value="{{ $item->option_a }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_b</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_b" required="required" value="{{ $item->option_b }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_c</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_c" value="{{ $item->option_c }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>option_d</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="option_d" required="required" value="{{ $item->option_d }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>correct_answer</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select type="text" name="correct_answer" value="{{ $item->correct_answer }}" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					<option {{ $item->correct_answer == 'a' ? 'selected' : 'no' }} value="a">A</option>
					<option {{ $item->correct_answer == 'b' ? 'selected' : 'no' }} value="b">B</option>
					<option {{ $item->correct_answer == 'c' ? 'selected' : 'no' }} value="c">C</option>
					<option {{ $item->correct_answer == 'd' ? 'selected' : 'no' }} value="d">D</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-warning">Update</button>
		</div>
	</div>
</form>
@endsection