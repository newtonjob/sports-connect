<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Newton Job" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png" />
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" />

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="{{ route('home') }}" class="logo-dark">
                        <span><img src="{{ asset('images/logo/dark-logo.png') }}" alt="logo" height="40"></span>
                    </a>
                    <a href="{{ route('home') }}" class="logo-light">
                        <span><img src="{{ asset('images/logo/dark-logo.png') }}" alt="logo" height="70"></span>
                    </a>
                </div>

                {{ $slot }}

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">{{ config('app.name') }}</h2>
            <p class="lead">
                <i class="mdi mdi-format-quote-open"></i> Join, Play, Connect!
                <i class="mdi mdi-format-quote-close"></i>
            </p>
        </div>
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- bundle -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<!-- bundle -->
<script src="{{ asset('js/app.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('js/bootstrap-notify.js?v=0') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/request.js') }}?v=1.02"></script>

@stack('script')

</body>

</html>
