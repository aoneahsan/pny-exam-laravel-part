@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/batch-quiz-action/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	<div class="row form-group">
		<div class="col-xs-12">
			<div class="col-xs-3 d-inline-block">
				<strong>Course Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="course_name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-3 d-inline-block">
				<strong>Batch</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="batch" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-3 d-inline-block">
				<strong>quiz</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="quiz" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select</option>
					@foreach($quizes as $item)
						<option value="{{ $item->id }}">{{ $item->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Add</button>
		</div>
	</div>
</form>
@endsection