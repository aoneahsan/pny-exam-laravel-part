@extends('project.index')
@section('content')
<div class="custom_dive_1">
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
			<strong>user_id</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->user_id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>quiz_id</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->quiz_id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>question_text</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->question_text }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>option_a</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->option_a }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>option_b</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->option_b }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>option_c</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->option_c }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>option_d</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->option_d }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>correct_answer</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->correct_answer }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/questions/'.$item->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/questions/'.$item->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
</div>
@endsection