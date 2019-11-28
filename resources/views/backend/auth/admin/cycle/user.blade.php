@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
				<h4 class="card-title"> Manage User</h4>
				<button class="btn btn-default btn-round pull-right">Add</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Staff No
                                </th>
                                <th>
                                    Staff Name
                                </th>
                                <th>
                                    Division
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Report to
                                </th>
                                <th>
                                    Band/Grade
                                </th>
                                <th>
                                    User Type
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    ABC1122
                                </td>
                                <td>
                                    HR
                                </td>
                                <td>
                                    Active
                                </td>
                                <td>
                                    Mr X
                                </td>
                                <td>
                                    3
                                </td>
                                <td>
                                    Admin
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-round">Update</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    ABC2233
                                </td>
                                <td>
                                    IT
                                </td>
                                <td>
                                    Inactive
                                </td>
                                <td>
                                    Mr Y
                                </td>
                                <td>
                                    3A
                                </td>
                                <td>
                                    HOD
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-round">Update</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection


@push('after-scripts')
<script>
    $(function () {



    });
</script>
@endpush