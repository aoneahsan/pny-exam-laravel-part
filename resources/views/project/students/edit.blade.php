@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/students/'.$user->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	@if(Auth::user()->roles[0]->id === 1)
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->name }}" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User Email</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="email" value="{{ $user->email }}" name="email" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	@endif
	<!-- <div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User address</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->address }}" name="address" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User cnic</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->cnic }}" name="cnic" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div> -->
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Course Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->course_name }}" name="course_name" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Batch</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->batch }}" name="batch" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<!-- <div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Password</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="password" name="password" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div> -->
	<!-- <div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User location</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->location }}" name="location" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User city</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->city }}" name="city" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div> -->
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>
@endsection