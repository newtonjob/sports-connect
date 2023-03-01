<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>

    <meta content="Newton Job" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png"/>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png"/>

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="loading" data-layout="detached"
      data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{ route('home') }}" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('images/logo/logo.png') }}" class="rounded" alt="logo" height="50">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('images/logo.png') }}" alt="favicon" height="30">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">
            <li class="dropdown notification-list d-xl-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                   id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ Auth::user()->photo }}" alt="user-image"
                             class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position">{{ Auth::user()->email }}</span>
                    </span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    aria-labelledby="topbar-userdrop">

                    <!-- item-->
                    <a href="{{ route('users.show', Auth::user()) }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Settings</span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="app-search dropdown">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" id="top-search">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <button class="input-group-text btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Topbar -->

<!-- Start Content-->
<div class="container-fluid">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu leftside-menu-detached">

            <div class="leftbar-user">
                <a href="{{ route('users.show', Auth::user()) }}">
                    <img src="{{ Auth::user()->photo }}" alt="user-image" height="42"
                         class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name">{{ Auth::user()->name }}</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a href="{{ route('home') }}" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="javascript:" class="side-nav-link">
                        <i class="uil-chat-bubble-user"></i>
                        <span> Buddies </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="javascript:" class="side-nav-link">
                        <i class="uil-image-search"></i>
                        <span> Discover </span>
                    </a>
                </li>

                <li class="side-nav-title side-nav-item">MISC</li>

                <li class="side-nav-item">
                    <a href="{{ route('logout') }}" class="side-nav-link">
                        <i class="uil-sign-out-alt"></i>
                        <span> Logout </span>
                    </a>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <x-verification_notice/>

            <div class="content">
                {{ $slot }}
            </div>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            © <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a target="_blank" href="{{ route('home') }}">Home</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div> <!-- content-page -->

    </div> <!-- end wrapper-->
</div>
<!-- END Container -->

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
