@php
use \Carbon\Carbon;

$carbon = new Carbon;
@endphp

@extends('frontend.auth.layouts.blank')

@section('title', app_name() . ' | Department')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form method="post" action="{{ route('frontend.auth.department.store') }}">
                {{ csrf_field() }}

                <div class="card-header">
                    <h5 class="card-title">DEPARTMENT GOALS for {{ $currentPeriod->year }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th width=35%>KPI Objectives</th>
                                <th>Weightage (%)</th>
                                <th>Goal Type</th>
                                <th>Measurement</th>
                                <th>Base Target</th>
                                <th>Strecthed Target</th>
                                <th>Mid Year</th>
                                <th>Year End</th>
                                <th>Performance Indicator</th>
                            </thead>
                            <tbody id="tblBody">
                                @php($count = 0)
                                @foreach($kpi as $key => $value)
                                    <tr>
                                        <td style="font-size: 10px">
                                            <span class="td-style">{{ ++$count }}</span>
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $value->levelKpi->kpi_objective }}</span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @isset($errors->getMessages()["weightage.$value->department_kpi_id"]) has-error @endisset" 
                                            value="{{ old()['weightage'][$value->department_kpi_id] ?? $value->weightage }}" name="weightage[{{ $value->department_kpi_id }}]">
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $goal[$value->levelKpi->goal_type] }}</span>
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $measurement[$value->levelKpi->measurement] }}</span>
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $value->levelKpi->base }}</span>
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $value->levelKpi->stretched_target }}</span>
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $value->levelKpi->mid_year }}</span>
                                        </td>
                                        <td>
                                            <span class="td-style">{{ $value->levelKpi->year_end }}</span>
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <input type="hidden" value="{{ $weightage->department }}" name="weightageTotal">
                            <button name="submitBtn" value="Save" type="submit" class="btn btn-primary btn-round">Save</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
        
@endsection


@push('after-styles')
<style>
    .dropdown-menu {
        font-size: 0.7rem;
        background-color: #f8f9fa;
    }
    .has-error {
        border-color: red;
    }
    .td-style {
        font-size: 80%;
        font-weight: 400;
    }
</style>
@endpush


@push('after-scripts')
<script>
    $(function () {

        var deleteUrl = "{{ route('frontend.auth.individual.destroy',[0]) }}";

        $("#deleteBtn").on("click",function() {

            //for not yet save
            $("[name='new_individual_kpi_id']").each(function () {

                var sThisVal = (this.checked ? $(this).val() : "");
                if(sThisVal != ""){
                    $("#newTr"+sThisVal).replaceWith("");
                }

            });

            //delete to db
            $("[name='individual_kpi_id']").each(function () {

                var sThisVal = (this.checked ? $(this).val() : "");
                var url = deleteUrl.replace(0,sThisVal);
                if(sThisVal != ""){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: { "_token": "{{ csrf_token() }}" },
                        success: function(data) {
                            if(data == 'success'){
                                $("#tr"+sThisVal).replaceWith("");
                            } else {
                                alert('Error');
                            }
                        },
                        error: function(data) {
                            alert('Error');
                        }
                    });
                }

            });
        });

        $("#tblBody").on("change",".measurement",function() {

            var thisEl = $(this);
            var dataId = thisEl.attr("data-id");

            if(thisEl.val() == 4){
                $(".inputValue"+dataId).addClass('datepicker').datepicker({format: 'dd/mm/yyyy'});
            } else {
                $(".inputValue"+dataId).removeClass('datepicker').datepicker("destroy");
            }

        });

        // $('[data-toggle="datepicker"]').datepicker();
        // $('.datepicker').datepicker();

    });
</script>
@endpush