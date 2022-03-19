<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/png" href="{{ cAsset('favicon.ico') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ cAsset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.9.0/css/flag-icon.css" rel="stylesheet">

    <!-- Document title -->
    <title>@yield('title') | {{ env('APP_NAME', '') }}</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <input type="hidden" name="environment" value="{{ env('APP_ENV', 'localhost') }}" />

    @yield('styles')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user'  => Auth::check()? Auth::user()->id : null,
            'baseUrl' => url('/'),
            'serverTimeZone' => config('app.timezone')
        ]) !!};

        let buttons = @json(trans('buttons'));
    </script>
</head>
<body>
    <?php
    $is_maintenance = Session::get('is_maintenance', false);
    $access_token = Request::get('access_token');
    if (!\App\Models\MaintenanceToken::isValid($access_token)) {
        $access_token = '';
    }
    ?>

    <!-- Body Inner -->
    <div class="body-inner back-semi-theme back-img-transparent" id="app">
        <!-- Header -->
        @include('layouts.header')
        <!-- end: Header -->

        <!-- Inspiro Slider -->
        @yield('contents')
        <!-- end: TEAM -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ cAsset('js/jquery.js') }}"></script>
    <script src="{{ cAsset('js/plugins.js') }}"></script>
    <!--Template functions-->
    
    
    <script>
        let accessToken = '{{ isset($access_token) ? $access_token : '' }}';
        if (accessToken == '') {
            accessToken = '{{ Session::get('access_token', '') }}';
        }
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ cAsset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ cAsset('plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ cAsset('js/__common.js') }}"></script>
    <script src="{{ cAsset('js/custom.js') }}"></script>

    <script>
        let BASE_URL = '{{ cAsset('/') . '/' }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
    @yield('scripts')

    <script src="{{ cAsset('js/functions.js') }}"></script>
</body>
