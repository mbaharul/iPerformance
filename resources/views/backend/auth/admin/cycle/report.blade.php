@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <select name="year">
                            <option value="">-- Select Report --</option>
                            <option value="2019">Report by Division/Department</option>
                            <option value="2020">Pending Submission</option>
                            <option value="2020">Pending under appraiser review</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
            </div>
            <div class="card-footer">
                <div class="chart-legend">
                    <i class="fa fa-circle text-info"></i> 
                    <i class="fa fa-circle text-warning"></i> 
                </div>
                <hr/>
                <div class="card-stats">
                    <i class="fa fa-check"></i> Data information certified
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection


@push('after-scripts')
<script>
    $(function () {

var speedCanvas = document.getElementById("speedChart");

var dataFirst = {
  data: [0, 19, 15, 20, 30, 40, 40, 50, 25, 30, 50, 70],
  fill: false,
  borderColor: '#fbc658',
  backgroundColor: 'transparent',
  pointBorderColor: '#fbc658',
  pointRadius: 4,
  pointHoverRadius: 4,
  pointBorderWidth: 8,
};

var dataSecond = {
  data: [0, 5, 10, 12, 20, 27, 30, 34, 42, 45, 55, 63],
  fill: false,
  borderColor: '#51CACF',
  backgroundColor: 'transparent',
  pointBorderColor: '#51CACF',
  pointRadius: 4,
  pointHoverRadius: 4,
  pointBorderWidth: 8
};

var speedData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [dataFirst, dataSecond]
};

var chartOptions = {
  legend: {
    display: false,
    position: 'top'
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  hover: false,
  data: speedData,
  options: chartOptions
});

    });
</script>
@endpush