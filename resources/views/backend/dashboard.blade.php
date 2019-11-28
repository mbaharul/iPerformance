@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <canvas id="bar-chart" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
            
@endsection


@push('after-scripts')
<script>
    $(function () {

        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ["Pending Submission", "Under Appraiser Review", "Submitted"],
                datasets: [
                {
                    label: "Percent",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                    data: [62,30,8]
                }]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Pending Transaction'
                },
                // scale: barPercentage
            }
        });

    });
</script>
@endpush