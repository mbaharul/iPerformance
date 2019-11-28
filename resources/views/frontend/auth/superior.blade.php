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
                    <h5 class="card-title">SUPERIOR ASSESSMENT  for {{ $currentPeriod->year }}</h5>
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
                        </table>
                    </div>
                 </div>

        </div>
    </div>
</div>
        
@endsection





