<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'ePerformance')">
        <meta name="author" content="@yield('meta_author', 'Marwan Muslim')">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <link rel="stylesheet" href="{{ URL::asset('css/paper/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/paper/paper-dashboard2.css?v=2.0.0') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" rel="stylesheet">

        @stack('after-styles')
    </head>
    <body>

        <div id="app" class="wrapper">

                {{-- @php(dd($errors->getMessages()['kpi_objective.45735'])) --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="main-panel">
                <div class="content">
                    @yield('content')
                </div>
            </div>

        </div>

        @yield('bottom')

        <!-- Scripts -->
        @stack('before-scripts')
        {{-- {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!} --}}
        <script src="{{ URL::asset('js/paper/core/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/paper/core/popper.min.js') }}"></script>
        <script src="{{ URL::asset('js/paper/core/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy'
            });
        </script>
        @stack('after-scripts')

        {{-- @include('includes.partials.ga') --}}
    </body>
</html>
