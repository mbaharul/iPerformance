@php
use \Carbon\Carbon;

$carbon = new Carbon;
@endphp

@extends('frontend.auth.layouts.blank')

@section('title', app_name() . ' | Not Ready')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
                {{ csrf_field() }}

                <div class="card-header">
                </div>

                <div class="card-body">
                    <h5 class="card-title">KPI not ready</h5>
                </div>
                
                <div class="card-footer">
                </div>

            </form>
        </div>
    </div>
</div>
        
@endsection
