@php
use \Carbon\Carbon;

$carbon = new Carbon;
@endphp

@extends('frontend.auth.layouts.blank')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">

                <div class="card-header">
                    <h5 class="card-title">COMPANY GOALS for {{ $currentPeriod->year }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th width=20%>Goal Description</th>
                                <th>Weightage (%)</th>
                                <th>Goal Type</th>
                                <th>Measurement</th>
                                <th>Mid Year</th>
                                <th>Year End</th>
                                <th>Strecthed Target</th>
                                <th>Score</th>
                            </thead>
                            <tbody id="tblBody">
                                @php($count = 0)
                                @foreach($kpi as $key => $value)
                                    <tr>
                                        <td style="font-size: 10px">
                                            {{ ++$count }}
                                        </td>
                                        <td>
                                            <label>{{ $value->kpi_objective }}</label>
                                        </td>
                                        <td>
                                            <label>{{ $value->weightage }}</label>
                                        </td>
                                        <td>
                                       	 		@foreach($goal as $k => $v)
                                                    <label>{{ $k==$value->goal_type?$v:'' }}</label>
                                                @endforeach
                                            
                                        </td>
                                        <td>
                                            <label>{{ $value->measurement }}</label>
                                        </td>
                                        <td>
                                            <label>{{ $value->mid_year }}</label>
                                        </td>
                                        <td>
                                            <label>{{ $value->year_end }}</label>
                                        </td>
                                        <td>
                                            <label>{{ $value->stretched_target }}</label>
                                        </td>
                                        <td>
                                            <label>{{ $value->comp_achievement }}</label>
                                        </td>
                                        <td>
                                            <label></label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
</div>
        
@endsection





