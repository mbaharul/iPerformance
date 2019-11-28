@extends('frontend.auth.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title">Overall {{ $currentPeriod->year }}</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" >
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Component
                                </th>
                                <th class="make-center">
                                    Status
                                </th>
                                <th class="make-center">
                                    Weightage
                                </th>
                                <th class="make-center">
                                    Performance Indicator
                                </th>
                                <th class="make-center">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Company Goals ({{ $weightage->corporate }}%) &nbsp;&nbsp;
                                    <a href="{{ route('frontend.auth.company.index') }}" data-toggle="modal" data-target="#remote">
                                        <i class="nc-icon nc-ruler-pencil"></i>
                                    </a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon {{ $checklist['indicator']['company'] ? 'green-done':'red-pending' }}"></i>
                                </td>
                                <td rowspan="3" valign="middle" class="make-center">
                                    50%
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Department Goals ({{ $weightage->department }}%) &nbsp;&nbsp;
                                    <a href="{{ route('frontend.auth.department.index') }}" data-toggle="modal" data-target="#remote">
                                        <i class="nc-icon nc-ruler-pencil"></i>
                                    </a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon {{ $checklist['indicator']['department'] ? 'green-done':'red-pending' }}"></i>
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Individual Goals ({{ $weightage->individual }}%) &nbsp;&nbsp;
                                    <a href="{{ route('frontend.auth.individual.index') }}" data-toggle="modal" data-target="#remote">
                                        <i class="nc-icon nc-ruler-pencil"></i>
                                    </a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon {{ $checklist['indicator']['individual'] ? 'green-done':'red-pending' }}"></i>
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Competency &nbsp; <a href="www.google.com" data-toggle="modal" data-target="#remote"><i class="nc-icon nc-ruler-pencil"></i></a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon red-pending"></i>
                                </td>
                                <td class="make-center">
                                    25%
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Peer &amp; Subordinate Assesment &nbsp; <a href="www.google.com" data-toggle="modal" data-target="#remote"><i class="nc-icon nc-ruler-pencil"></i></a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon red-pending"></i>
                                </td>
                                <td class="make-center">
                                    10%
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Superior Assesment &nbsp; <a href="{{ route('frontend.auth.superior.index') }}" data-toggle="modal" data-target="#remote" ><i class="nc-icon nc-ruler-pencil"></i></a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon red-pending"></i>
                                </td>
                                <td class="make-center">
                                    -
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total Score</b>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                                <td class="make-center">
                                    100%
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Special Mentions &nbsp; <a href="http://www.google.com" data-toggle="modal" data-target="#remote" ><i class="nc-icon nc-ruler-pencil"></i></a>
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon red-pending"></i>
                                </td>
                                <td class="make-center">
									-
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Personal Challenge &nbsp; <a href="http://www.google.com" data-toggle="modal" data-target="#remote" ><i class="nc-icon nc-ruler-pencil"></i></a> 
                                </td>
                                <td class="make-center">
                                    <i class="nc-icon red-pending"></i>
                                </td>
                                <td class="make-center">
                                    5%
                                </td>
                                <td class="make-center">
                                    <i class="fa fa-circle"></i>
                                </td>
                                <td class="make-center">
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            
            <div class="card-footer">
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <a class="btn btn-xs even btn-default">Print form</a>
                        <a class="btn btn-xs even btn-default">Previous form</a>
                        <a class="btn btn-xs even btn-success {{ $canSubmit?'':'disabled' }}">Submit</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
        
@endsection

@section('bottom')

<div class="modal fade" id="remote" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')
<script>
    $(function () {
        $('#remote').on('show.bs.modal', function (e) {
            var iframe = $('<iframe></iframe>')
            .attr('width', '100%')
            .attr('frameborder', '0')
            .attr('scrolling', 'auto')
            .attr('src', e.relatedTarget.href)
            .css({
                'min-height': '500px'
            });
            $(this).find('.modal-body').html(iframe);
        });

        $('#remote').on('hidden.bs.modal', function (e) {
            location.reload();
        });
    });
</script>
@endpush
