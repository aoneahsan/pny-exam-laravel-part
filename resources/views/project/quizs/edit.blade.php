@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/quizs/' . $item->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>title</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="title" required="required" value="{{ $item->title }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>description</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="description" required="required" value="{{ $item->description }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>per_question_mark</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="per_question_mark" value="{{ $item->per_question_mark }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>quiz_time (mins)</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="quiz_time" required="required" value="{{ $item->quiz_time }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>passing percentage</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="passing_percentage" required="required" value="{{ $item->passing_percentage }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Quiz Type</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="quiz_type" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					<option value="mcq" {{ $item->quiz_type == 'mcq' ? 'selected' : ''}}>MCQs</option>
					<option value="qa" {{ $item->quiz_type == 'qa' ? 'selected' : ''}}>Question and Answer</option>
				</select>
			</div>
		</div>
	</div>
	<!-- <div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>quiz_price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="quiz_price" value="{{ $item->quiz_price }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>show_answers</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select type="text" name="show_answers" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					<option {{ $item->show_answers == 'yes' ? "selected" : null }} value="yes">Yes</option>
					<option {{ $item->show_answers == 'no' ? "selected" : null }} value="no">No</option>
				</select>
			</div>
		</div>
	</div> -->
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-warning">Update</button>
		</div>
	</div>
</form>
@endsection