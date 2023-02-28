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
    <link rel="shortcut icon" href="{{ asset('portal/images/favicon.png') }}" type="image/png"/>
    <link rel="icon" href="{{ asset('portal/images/favicon.png') }}" type="image/png"/>

    <!-- App css -->
    <link href="{{ asset('portal/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('portal/css/animate.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('portal/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('portal/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>

    <livewire:styles/>

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
                <img src="{{ asset('portal/images/logo/light-logo.png') }}" class="rounded" alt="logo" height="50">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('portal/images/favicon.png') }}" alt="favicon" height="30">
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
                        <input type="text" class="form-control" placeholder="Search Reservations..."
                               aria-label="Search">
                    </form>
                </div>
            </li>

            @if(false)
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                       id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg"
                         aria-labelledby="topbar-notifydrop">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                            <span class="float-end">
                                <a href="javascript: void(0);" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                            </h5>
                        </div>

                        <div style="max-height: 230px;" data-simplebar>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">You have one new notification
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);"
                           class="dropdown-item text-center text-primary notify-item notify-all">
                            View All
                        </a>

                    </div>
                </li>
            @endif

            <livewire:mini-cart/>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                   id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ user('photo') }}" alt="user-image"
                             class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ user('name') }}</span>
                        <span class="account-position">{{ user('email') }}</span>
                    </span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    aria-labelledby="topbar-userdrop">

                    <!-- item-->
                    <a href="{{ route('users.show', user()) }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Settings</span>
                    </a>

                    @impersonating
                    <a href="{{ route('impersonate.leave') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Leave Impersonation</span>
                    </a>
                    @else
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                        @endImpersonating
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
                    <input type="text" class="form-control" placeholder="Search Reservations..." aria-label="Search" id="top-search">
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
                <a href="{{ route('users.show', user()) }}">
                    <img src="{{ user('photo') }}" alt="user-image" height="42"
                         class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name">{{ user('name') }}</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a href="{{ route('dashboard') }}" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @include("includes.nav.".user('type'))

                <li class="side-nav-title side-nav-item">MISC</li>

                <li class="side-nav-item">
                    <a href="{{ route('home') }}" class="side-nav-link">
                        <i class="uil-external-link-alt"></i>
                        <span> Home Page </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    @impersonating
                    <a href="{{ route('impersonate.leave') }}" class="side-nav-link">
                        <i class="uil-sign-out-alt"></i>
                        <span> Leave impersonation </span>
                    </a>
                    @else
                        <a href="{{ route('logout') }}" class="side-nav-link">
                            <i class="uil-sign-out-alt"></i>
                            <span> Logout </span>
                        </a>
                        @endImpersonating
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <x-verification_notice/>

            <x-impersonating/>

            <div class="content">
                @yield('content')
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
                                <a target="_blank" href="{{ route('home') }}">Go to Home Page</a>
                                <a href="javascript: void(0);">Contact Us</a> {{--Todo: Trigger Tawk.to--}}
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

<script src="{{ asset('portal/js/vendor.min.js') }}"></script>
<!-- bundle -->
<script src="{{ asset('portal/js/app.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('portal/js/bootstrap-notify.js?v=0') }}"></script>
<script src="{{ asset('portal/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('portal/js/request.js') }}?v=1.02"></script>

<x-scripts.tawkto/>
<x-scripts.datatable/>

<livewire:scripts/>

@stack('script')

</body>
</html>
