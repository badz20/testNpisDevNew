<!-- Header Start -->
@include('layouts.dashboard.header_dashboard')

<!-- Sidebar Start -->
@include('layouts.dashboard.sidebar_dashboard_responsive')

<!-- Topbar Start -->
@include('layouts.dashboard.topbar_dashboard_responsive')


<!-- content -->
@yield('content_dashboard')

<!-- Footer Start -->
@include('layouts.dashboard.footer_dashboard_responsive')
