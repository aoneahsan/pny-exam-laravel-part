@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/students/import-action') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12">
			<div class="col-xs-3 col-sm-2 d-inline-block">
				<strong>Upload File (CSV)</strong>
			</div>
			<div class="col-xs-9 col-sm-10 d-inline-block">
				<input type="file" name="file">
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Add Students</button>
		</div>
	</div>
</form>
@endsection