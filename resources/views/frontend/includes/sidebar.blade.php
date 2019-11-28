<div class="sidebar" data-color="white" data-active-color="danger">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
        <div class="logo">
            <a href="/dashboard" class="simple-text logo-mini">
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
                    <a>
                    <p style="font-size: 20px">Personal Info</p>
                    </a>
                </li>
                <li class="">
                    <a>
                    <i class="nc-icon nc-badge"></i>
                    <p style="font-size: 10px">{{ $logged_in_user->employee_id }} (Band: {{ $staffInfo->grade }})</p>
                    </a>
                </li>
                <li>
                    <a>
                    <i class="nc-icon nc-album-2"></i>
                    <p style="font-size: 10px">{{ $departmentMst[$staffInfo->division_id] }}</p>
                    </a>
                </li>
                <li>
                    <a>
                    <i class="nc-icon nc-tap-01"></i>
                    <p style="font-size: 10px">{{ $superior->employee_name }}</p>
                    </a>
                </li>
                <hr/>
                <li class="">
                    <a>
                    <p style="font-size: 20px">Team Members</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
          