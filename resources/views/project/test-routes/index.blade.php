<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('project-assets/css/bootstrap.css') }}">
    <style type="text/css">
    	h3 {
    		background: black;
    		color: white;
    		padding: 0 0 10px 0;
    		text-align: center;
    	}
    </style>
</head>
<body class="p-5">
	<h3 class="heading-route-test">Login</h3>
	<form method="post" action="{{ url('test_login/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>email</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="email" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>password</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="password" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Login</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Register</h3>
	<form method="post" action="{{ url('test_register/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>name</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="name" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>phone_number</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="phone_number" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>role</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<select name="user_role" required="required" class="form-control" style="width: 100%;">
						<option value="user">user</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>email</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="email" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>password</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="password" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-info">Register</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Logout</h3>
	<form method="post" action="{{ url('test_logout/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-02">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-danger">Logout</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get User Data</h3>
	<form method="post" action="{{ url('api/get-user-data/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf

		<div class="row form-group">
			<div class="col-xs-6">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="api_token" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->api_token }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="user_id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-danger">User Data</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Edit User Data</h3>
	<form method="post" action="{{ url('api/edit-user-data/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>user api token</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="api_token" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->api_token }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>user id</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="user_id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>user first name</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="first_name" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>last_name</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="last_name" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>phone_number</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="phone_number" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>address</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="address" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>cnic</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="cnic" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>location</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="location" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>city</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="city" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>latitude</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="latitude" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>longitude</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="longitude" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>skills</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="skills" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>occupation</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="occupation" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>profile_image</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="file" name="profile_image">
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-danger">Update User Data</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get User Quizzes</h3>
	<form method="post" action="{{ url('api/quizzes') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-02">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-danger">get quizzes</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get User Quiz Reports</h3>
	<form method="post" action="{{ url('api/user-quiz-reports') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-02">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="user_id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-danger">get quizzes</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
</body>
<script src="{{ asset('project-assets/js/jquery.js') }}"></script>
<script src="{{ asset('project-assets/js/popper.js') }}"></script>
<script src="{{ asset('project-assets/js/bootstrap.js') }}"></script>
</html>