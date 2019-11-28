@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
				<h4 class="card-title"> Current Cycle</h4>
				<button class="btn btn-default btn-round pull-right">Register new</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
								No
                            </th>
                            <th>
								Year
                            </th>
                            <th>
								Cycle name
                            </th>
                            <th>
								Status
                            </th>
                            <th>
								Action
                            </th>
                        </thead>
                        <tbody>
							<td>
								1
							</td>
							<td>
								2019
							</td>
							<td>
								Iperformance 2019
							</td>
							<td>
								Active
							</td>
							<td>
								<button class="btn btn-primary btn-round">Update</button>
							</td>
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