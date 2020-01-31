@extends('project.index')
@if(Session::has('wronguser'))
<div class="alert alert-warning">
    Session::get('wronguser')
</div>
@endif
@section('content')
<!-- Users -->
<div>
    <div class="row">
        <div class="col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-people"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><h2>All Users</h2></span>
                    <span class="info-box-number"></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Users</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $total_users }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Admins</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $admins }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">users</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $users }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
    <script>
    </script>
@endsection