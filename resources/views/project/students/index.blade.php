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
            	@if(is_object(Auth::user()))
            		<h1>{{ Auth::user()->name }}</h1>
            	@endif
                <div class="col-xs-12 text-left">
                    <a href="{{ url('admin/students/create') }}" class="btn btn-primary">Add New Student</a>
                </div>
            	<h3 class="text-left">Total Users = {{ $users_total }}</h3>
            	<table class="table" id="user-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
            				<th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Batch</th>
                            <th class="text-center">Password</th>
                            <!-- <th class="text-center">Ban User</th> -->
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
            				<th class="text-center">Delete</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($users as $user)
                        @if($user->roles[0]->id === 3)
            				<tr>
            					<td>{{ $loop->index+1 }}</td>
            					<td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->course_name }}</td>
                                <td>{{ $user->batch }}</td>
                                <td>{{ $user->password_remember }}</td>
                                <!-- <td>
                                    <a href="{{ url('/admin/users/'.$user->id.'/ban') }}">
                                        <i class="fa fa-lock"></i>
                                    </a>
                                </td> -->
            					<td>
            						<a href="{{ url('/admin/students/'.$user->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/students/'.$user->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            					<td>
            						<form method="post" class="d-inline-block" action="{{ url('admin/students/'.$user->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-simple"><i class="fa fa-trash"></i></button>
                                    </form>
            					</td>
            				</tr>
            			@endif
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection