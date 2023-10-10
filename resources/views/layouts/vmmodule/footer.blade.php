
    <script src="{{ asset('Vm_module/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Vm_module/assets/js/bootstrap.popper.min.js') }}"></script>
    <script src="{{ asset('Vm_module/assets/js/highcharts.js') }}"></script>

    <script src="{{ asset('Vm_module/assets/js/index.js') }}"></script>
    <script src="{{ asset('Vm_module/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Vm_module/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts' )
    @stack('scripts')
    <script>
      function openNav() {
        $('.side_bar_Container').show();
        document.getElementById('NPIS_logo').click();
        document.getElementById("navbarCollapse").style.width = "250px";
      }

      $(document).on('click', '.round_parent', function (e) {
        $('.side_bar_Container').hide();
      });
      $(".Mainbody_conatiner ").css("width","100%")
      $(".Nav_left_Input_content").css("left","0px")
      $(".Mainbody_conatiner header.dashboard").css("width","100%")
      $(".round").click(function(){
        $("#navbarCollapse").css("left","-50px")
        $(".cardPmakmal").css("width","97%")
        $(".cardPmakmal").css("left","15px")
        // $(".Mainbody_conatiner ").css("width","100%")
        $(".Mainbody_conatiner header.dashboard").css("width","92%")
        $(".Nav_left_Input_content").css("left","-35px")
        $(".vaTandatanganCard").css("width","100%")
        $(".vaTandatanganCard").css("float","right")
        $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("width","100%")
      })
      $("#menu").click(function(){
        $(".Nav_left_Input_content").css("left","-170px")
        // $(".Mainbody_conatiner ").css("width","92%")
        $(".cardPmakmal").css("width","88%")
        $(".cardPmakmal").css("left","275px")
        $(".vaTandatanganCard").css("width","80%")
                $(".vaTandatanganCard").css("float","right")
                $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("width","87%")

      })
    </script>
  </body>
</html>