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
                            <th class="text-center">user_id</th>
            				<th class="text-center">title</th>
                            <th class="text-center">description</th>
                            <th class="text-center">per question mark</th>
                            <th class="text-center">quiz time</th>
                            <th class="text-center">passing percentage</th>
                            <th class="text-center">quiz type</th>
                            <!-- <th class="text-center">quiz_price</th> -->
                            <!-- <th class="text-center">show_answers</th> -->
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
            				<th class="text-center">Delete</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($items as $item)
            				<tr>
            					<td>{{ $item->id }}</td>
                                <td>{{ $item->user_id }}</td>
            					<td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->per_question_mark }}</td>
                                <td>{{ $item->quiz_time }}</td>
                                <td>{{ $item->passing_percentage }}</td>
                                <td>{{ $item->quiz_type == 'mcq' ? 'MCQs' : 'Question Answer' }}</td>
                                <!-- <td>{{ $item->quiz_price ? $item->quiz_price : "Free" }}</td> -->
                                <!-- <td>{{ $item->show_answers }}</td> -->
            					<td>
            						<a href="{{ url('/admin/quizs/'.$item->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/quizs/'.$item->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            					<td>
            						<form method="post" class="d-inline-block" action="{{ url('admin/quizs/'.$item->id) }}">
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