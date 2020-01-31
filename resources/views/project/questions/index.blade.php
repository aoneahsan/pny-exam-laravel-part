@extends('project.index')
@section('content')
<div id="wrapper-content">
    <!-- PAGE WRAPPER-->
    @if(Session::has('item_unbanned'))
    <div class="alert alert-success">
        {{ Session::get('item_unbanned') }}
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
            	<table class="table" id="item-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
                            <th class="text-center">user</th>
                            <th class="text-center">quiz</th>
            				<th class="text-center">Question</th>
                            <th class="text-center">Option A</th>
                            <th class="text-center">Option B</th>
                            <th class="text-center">Option C</th>
                            <th class="text-center">Option D</th>
                            <th class="text-center">correct_answer</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
            				<th class="text-center">Delete</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($items as $item)
            				<tr>
            					<td>{{ $item->id }}</td>
                                <td>{{ $item->user_name }}</td>
            					<td>{{ $item->quiz_title }}</td>
                                <td>{{ $item->question_text }}</td>
                                <td>{{ $item->option_a }}</td>
                                <td>{{ $item->option_b }}</td>
                                <td>{{ $item->option_c }}</td>
                                <td>{{ $item->option_d }}</td>
                                <td>{{ $item->correct_answer }}</td>
            					<td>
            						<a href="{{ url('/admin/questions/'.$item->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/questions/'.$item->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            					<td>
            						<form method="post" class="d-inline-block" action="{{ url('admin/questions/'.$item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-simple"><i class="fa fa-trash"></i></button>
                                    </form>
            					</td>
            				</tr>
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection