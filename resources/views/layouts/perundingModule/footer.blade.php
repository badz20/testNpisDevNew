<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.popper.min.js') }}"></script>
<script src="{{ asset('assets/js/highcharts.js') }}"></script>

<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.min.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('scripts' )
@stack('scripts')
<script>
function openNav() {
    $('.side_bar_Container').show();
    document.getElementById('NPIS_logo').click();
    document.getElementById("navbarCollapse").style.width = "250px";
}

$(document).on('click', '.round_parent', function(e) {
    $('.side_bar_Container').hide();
});
</script>
{{-- <p class="user_profile_footer m-0 P-3 pemberat_title1">2023 <img class="mr-1"
        src="{{ asset('assets/images/copyrightLogo.png') }}">NPIS
    - JPS</p> --}}
    <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
        <span>{{ now()->year }}</span>
        <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
        <span>NPIS - JPS</span>
      </div>
</body>

</html>