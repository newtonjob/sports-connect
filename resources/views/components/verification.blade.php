<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Krystal Digital" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('portal/images/favicon.png') }}" type="image/png" />
    <link rel="icon" href="{{ asset('portal/images/favicon.png') }}" type="image/png" />

    <!-- App css -->
    <link href="{{ asset('portal/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('portal/css/animate.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('portal/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('portal/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<!-- Pre-loader -->
<div id="preloader" style="opacity: 0.5;">
    <div id="status">
        <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
    </div>
</div>
<!-- End Preloader-->

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="#">
                            <span><img src="{{ asset('portal/images/logo/dark-logo.png') }}" alt="logo" height="70"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        @yield('content')

                    </div> <!-- end card-body-->
                </div> <!-- end card-->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted"><a href="{{ route('logout') }}" class="text-muted"><b>Logout</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    <script>document.write(new Date().getFullYear())</script> © {{ config('app.name') }}
</footer>


<!-- bundle -->
<script src="{{ asset('portal/js/vendor.min.js') }}"></script>
<!-- bundle -->
<script src="{{ asset('portal/js/app.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('portal/js/bootstrap-notify.js?v=0') }}"></script>
<script src="{{ asset('portal/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('portal/js/request.js') }}?v=1.02"></script>

@stack('script')

</body>

</html>
