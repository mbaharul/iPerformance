@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
				<h4 class="card-title"> Setting</h4>
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
                                    Item
                                </th>
                                <th>
                                    Current Status/Message
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
                                    Allow user to login
                                </td>
                                <td>
                                    Yes
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
                                    Login quick tips
                                </td>
                                <td>
                                    - aaa
                                    <br>
                                    - bbb
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-round">Update</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    Allow specific user to login
                                </td>
                                <td>
                                    Summary of how many user that already allowed to login
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-round">Update</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    Hide score
                                </td>
                                <td>
                                    Yes
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