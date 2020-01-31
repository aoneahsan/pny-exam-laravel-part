<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header">SideBar</li>
        <li>
            <a href="{{ url('/') }}">
                <i class="ion ion-ios-people"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- @if(Auth::user()->roles[0]->id == 1)
        <li class="header">User Role Management</li>
        <li>
            <a href="{{ url('/check-role') }}">
                <i class="ion ion-ios-people"></i>
                <span>Check Role</span>
            </a>
        </li>
        @endif -->

        <li class="header">User Management</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/users') }}"><i class="fa fa-circle-o"></i> All Users</a></li>
                <li><a href="{{ url('admin/users/admins') }}"><i class="fa fa-circle-o"></i> Admin Users</a></li>
                <li><a href="{{ url('admin/users/banned') }}"><i class="fa fa-circle-o"></i> Banned Users</a></li>
                <li><a href="{{ url('admin/users/create') }}"><i class="fa fa-circle-o"></i> Add New User</a></li>
            </ul>
        </li>

        <li class="header">Student Management</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Students</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/students') }}"><i class="fa fa-circle-o"></i> All Students</a></li>
                <li><a href="{{ url('admin/students/import') }}"><i class="fa fa-circle-o"></i> Import Students</a></li>
                <li><a href="{{ url('admin/students/create') }}"><i class="fa fa-circle-o"></i> Add New Student</a></li>
            </ul>
        </li>

        <li class="header">Quiz Management</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Quizs</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/quizs') }}"><i class="fa fa-circle-o"></i> All Quizs</a></li>
                <li><a href="{{ url('admin/quizs/create') }}"><i class="fa fa-circle-o"></i> Add New Quiz</a></li>
            </ul>
        </li>

        <li class="header">Questions Management</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Questions</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/questions') }}"><i class="fa fa-circle-o"></i> All Questions</a></li>
                <li><a href="{{ url('admin/questions/import') }}"><i class="fa fa-circle-o"></i> Import Questions</a></li>
                <li><a href="{{ url('admin/questions/create') }}"><i class="fa fa-circle-o"></i> Add New Question</a></li>
            </ul>
        </li>

        <li class="header">Allow Quiz To Students</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Allow Quiz To Students</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/student-quiz') }}"><i class="fa fa-circle-o"></i> Allow Quiz To one Student</a></li>
                <li><a href="{{ url('admin/batch-quiz') }}"><i class="fa fa-circle-o"></i> Allow Quiz To Complete Batch</a></li>
            </ul>
        </li>

        <li class="header">Quiz Reports Management</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Quiz Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/students-reports') }}"><i class="fa fa-circle-o"></i>Students Quiz Reports</a></li>
            </ul>
        </li>
    </ul>
</section>