@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
				<h4 class="card-title"> KPI</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <select name="year">
                            <option value="">-- Select Year --</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                        <select name="year">
                            <option value="">-- Select Division --</option>
                            <option value="it">Information Technology</option>
                            <option value="hr">Human resource</option>
                            <option value="cust">Customer</option>
                            <option value="fin">Finance</option>
                        </select>
                    </div>
                </div>
                
                <div class="card card-nav-tabs card-plain">
                    <div class="card-header card-header-danger">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#company" data-toggle="tab">Company</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#division" data-toggle="tab">Division</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="company">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    Weightage
                                                </th>
                                                <th>
                                                    Kpi
                                                </th>
                                                <th>
                                                    Measurement
                                                </th>
                                                <th>
                                                    Base
                                                </th>
                                                <th>
                                                    Stretched
                                                </th>
                                                <th>
                                                    Result
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
                                                    40%
                                                </td>
                                                <td>
                                                    KPI 1
                                                </td>
                                                <td>
                                                    Percentage
                                                </td>
                                                <td>
                                                    90
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-round">Update</button>
                                                    <button class="btn btn-primary btn-round">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    60%
                                                </td>
                                                <td>
                                                    KPI 2
                                                </td>
                                                <td>
                                                    Percentage
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-round">Update</button>
                                                    <button class="btn btn-primary btn-round">Delete</button>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="division">
                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    Weightage
                                                </th>
                                                <th>
                                                    Kpi
                                                </th>
                                                <th>
                                                    Measurement
                                                </th>
                                                <th>
                                                    Base
                                                </th>
                                                <th>
                                                    Stretched
                                                </th>
                                                <th>
                                                    Result
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
                                                    40%
                                                </td>
                                                <td>
                                                    KPI 1
                                                </td>
                                                <td>
                                                    Percentage
                                                </td>
                                                <td>
                                                    90
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-round">Update</button>
                                                    <button class="btn btn-primary btn-round">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    60%
                                                </td>
                                                <td>
                                                    KPI 2
                                                </td>
                                                <td>
                                                    Percentage
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-round">Update</button>
                                                    <button class="btn btn-primary btn-round">Delete</button>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button id="addBtn" type="button" class="btn btn-primary btn-round">Add</button>
                        <button id="deleteBtn" type="button" class="btn btn-primary btn-round">Delete</button>
                    </div>
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