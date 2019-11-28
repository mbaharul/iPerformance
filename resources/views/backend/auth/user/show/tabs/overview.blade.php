<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.avatar')</th>
                <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.name')</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.email')</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.status')</th>
                <td>{!! $user->status_label !!}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.confirmed')</th>
                <td>{!! $user->confirmed_label !!}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.timezone')</th>
                <td>{{ $user->timezone }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.overview.last_login_at')</th>
                <td>
                    @if($user->last_login_at)
                        {{ timezone()->convertToLocal($user->last_login_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>

            @isset($employee)
            <tr>
                <th>Network Id</th>
                <td>{{ $employee->username }}</td>
            </tr>

            <tr>
                <th>Employee No</th>
                <td>{{ $employee->staff_no }}</td>
            </tr>

            <tr>
                <th>Staff Position</th>
                <td>{{ $employee->position }}</td>
            </tr>

            <tr>
                <th>Grade</th>
                <td>{{ $employee->grade }}</td>
            </tr>

            <tr>
                <th>Department</th>
                <td>{{ $departments[$employee->division_id] }}</td>
            </tr>

            <tr>
                <th>Superior</th>
                <td>{{ $superior->employee_name ?? '' }}</td>
            </tr>
            @endisset
            
        </table>
    </div>
</div><!--table-responsive-->
