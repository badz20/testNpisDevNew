
<!-- Header Start -->
@include('layouts.main.header')

<!-- sidebar Start -->
@include('layouts.dashboard.sidebar_dashboard_responsive')

<!-- Topbar Start -->
@include('layouts.main.topbar_responsive')



<!-- content -->
@yield('content_main')

<!-- Footer Start -->
@include('layouts.main.footer')
