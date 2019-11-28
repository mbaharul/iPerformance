<div class="sidebar" data-color="white" data-active-color="danger">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ URL::asset('img/frontend/logo-small.png') }}">
            </div>
            </a>
            <a class="simple-text logo-normal">
                {{ $logged_in_user->name }}
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="">
                    <a data-toggle="dropdown">
                    <i class="nc-icon nc-badge"></i>
                    <p style="font-size: 10px">General</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.auth.cycle.index') }}">Cycle Management</a>
                        <a class="dropdown-item" href="{{ route('admin.auth.setting.index') }}">Settings</a>
                    </div>
                </li>
                <li>
                    <a data-toggle="dropdown">
                    <i class="nc-icon nc-album-2"></i>
                    <p style="font-size: 10px">KPI</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.auth.company.index') }}">Company KPI</a>
                        <a class="dropdown-item" href="{{ route('admin.auth.division.index') }}">Division KPI</a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin.auth.user.index') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p style="font-size: 10px">Manage User</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.auth.manage.report') }}">
                    <i class="nc-icon nc-sound-wave"></i>
                    <p style="font-size: 10px">Report</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
          