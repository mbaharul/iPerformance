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
            <form method="post" action="{{ route('frontend.auth.individual.store') }}">
                {{ csrf_field() }}

                <div class="card-header">
                    <h5 class="card-title">INDIVIDUAL GOALS for {{ $currentPeriod->year }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th></th>
                                <th width=20%>Goal Description</th>
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
                                    <tr id="tr{{ $value->individual_kpi_id }}">
                                        <td style="font-size: 10px">
                                            {{ ++$count }}
                                        </td>
                                        <td>
                                            <label><input type="checkbox" value="{{ $value->individual_kpi_id }}" name="individual_kpi_id"></label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @isset($errors->getMessages()["kpi_objective.$value->individual_kpi_id"]) has-error @endisset" 
                                            placeholder="" value="{{ old()['kpi_objective'][$value->kpi_objective] ?? $value->kpi_objective }}" name="kpi_objective[{{ $value->individual_kpi_id }}]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @isset($errors->getMessages()["weightage.$value->individual_kpi_id"]) has-error @endisset" 
                                            placeholder="" value="{{ old()['weightage'][$value->individual_kpi_id] ?? $value->weightage }}" name="weightage[{{ $value->individual_kpi_id }}]">
                                        </td>
                                        <td>
                                            <select class="form-control goal" data-id="{{ $value->individual_kpi_id }}" style="height: 25px" name="goal_type[{{ $value->individual_kpi_id }}]">
                                                @foreach($goal as $k => $v)
                                                    <option value="{{ $k }}" {{ $k==$value->goal_type?'selected':'' }}>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control measurement" data-id="{{ $value->individual_kpi_id }}" style="height: 25px" name="measurement[{{ $value->individual_kpi_id }}]">
                                                @foreach($measurement as $k => $v)
                                                    <option value="{{ $k }}" {{ $k==$value->measurement?'selected':'' }}>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($value->measurement == 4)
                                            @php($formClass = 'datepicker')
                                        @else
                                            @php($formClass = '')
                                        @endif
                                        <td>
                                            <input type="text" value="{{ old()['base'][$value->base] ?? $value->base }}" 
                                            class="form-control inputValue{{ $value->individual_kpi_id }} {{ $formClass }} 
                                            @isset($errors->getMessages()["base.$value->individual_kpi_id"]) has-error @endisset"
                                            name="base[{{ $value->individual_kpi_id }}]" autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text" value="{{ old()['stretched_target'][$value->stretched_target] ?? $value->stretched_target }}" 
                                            class="form-control inputValue{{ $value->individual_kpi_id }} {{ $formClass }} 
                                            @isset($errors->getMessages()["stretched_target.$value->individual_kpi_id"]) has-error @endisset"
                                            name="stretched_target[{{ $value->individual_kpi_id }}]" autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text" value="{{ old()['mid_year'][$value->mid_year] ?? $value->mid_year }}" 
                                            class="form-control inputValue{{ $value->individual_kpi_id }} {{ $formClass }}
                                            @isset($errors->getMessages()["mid_year.$value->individual_kpi_id"]) has-error @endisset"
                                            name="mid_year[{{ $value->individual_kpi_id }}]" autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text" value="{{ old()['year_end'][$value->year_end] ?? $value->year_end }}" 
                                            class="form-control inputValue{{ $value->individual_kpi_id }} {{ $formClass }}
                                            @isset($errors->getMessages()["year_end.$value->individual_kpi_id"]) has-error @endisset"
                                            name="year_end[{{ $value->individual_kpi_id }}]" autocomplete="off">
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
                            <input type="hidden" value="{{ $weightage->individual }}" name="weightageTotal">
                            <button name="submitBtn" value="Save" type="submit" class="btn btn-primary btn-round">Save</button>
                            <button id="addBtn" type="button" class="btn btn-primary btn-round">Add</button>
                            <button id="deleteBtn" type="button" class="btn btn-primary btn-round">Delete</button>
                            <button class="btn btn-primary btn-round">Print</button>
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
</style>
@endpush


@push('after-scripts')
<script>
    $(function () {

        var lastRow = {{ $count }};

        $("#addBtn").on("click",function() {
            var trString = 
                "<tr id='newTr_number_'>                                                                           					                                "+
                "    <td style='font-size: 10px'>                                               							                                        "+
                "        _number_                                                               						        	                                "+
                "    </td>                                                                      						        	                                "+
                "    <td>                                                                       						        	                                "+
                "        <label><input type='checkbox' value='_number_' name='new_individual_kpi_id' class='newCheck'></label>                                      "+
                "    </td>                                                                      						        	                                "+
                "    <td>                                                                       						        	                                "+
                "        <input type='text' class='form-control' placeholder='' value='' name='new_kpi_objective[]' autocomplete='off'>              	            "+
                "    </td>                                                                      						        	                                "+
                "    <td>                                                                       					        		                                "+
                "        <input type='text' class='form-control' placeholder='' value='' name='new_weightage[]' autocomplete='off'>              		            "+
                "    </td>                                                                      					        		                                "+
                "    <td>                                                                       					        		                                "+
                "        <select class='form-control goal' data-id='_number_' style='height: 25px' name='new_goal[]'>                                               "+
                "            <option value=''>Please select</option>                                                                                                "+
                "            @foreach ($goal as $key => $value)                                   					        		                                "+
                "                <option value='{{ $key }}'>{{ $value }}</option>               					        		                                "+
                "            @endforeach                                                        						        	                                "+
                "        </select>                                                              						        	                                "+
                "    </td>                                                                      					        		                                "+
                "    <td>                                                                       					        		                                "+
                "        <select class='form-control measurement' data-id='_number_' style='height: 25px' name='new_measurement[]'>                                 "+
                "            @foreach ($measurement as $key => $value)                          					        		                                "+
                "                <option value='{{ $key }}'>{{ $value }}</option>               					        		                                "+
                "            @endforeach                                                        						        	                                "+
                "        </select>                                                              						        	                                "+
                "    </td>                                                                      			        				                                "+
                "    <td>                                                                       					        		                                "+
                "        <input type='text' class='form-control inputValue_number_' placeholder='' value='' name='new_base[]' autocomplete='off'>                	"+
                "    </td>                                                                      			        				                                "+
                "    <td>                                                                       					        		                                "+
                "        <input type='text' class='form-control inputValue_number_' placeholder='' value='' name='new_stretched_target[]' autocomplete='off'>       "+
                "    </td>                                                                                                                                          "+
                "    <td>                                                                       	        						                                "+
                "        <input type='text' class='form-control disabled' placeholder='' disabled>                                                                  "+
                "    </td>                                                                                							                                "+
                "    <td>                                                                       	        						                                "+
                "        <input type='text' class='form-control disabled' placeholder='' disabled>                                                                  "+
                "    </td>                                                                                							                                "+
                "    <td>                                                                               							                                "+
                "        &nbsp;                                                                         							                                "+
                "    </td>                                                                              							                                "+
                "</tr>                                                                                  							                                ";

            //to replace all _number_ to a value
            trString = trString.replace(/_number_/g,++lastRow)

            if(lastRow==1){
                //add new tr
                $("#tblBody").html(trString);
            } else {
                //append new tr after last tr
                $("#tblBody > tr").last().after(trString);
            }

        });

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