    


<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/highlight-4.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.popper.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/index.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/highcharts.js') }}"></script>

    <!-- <script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script> -->
    <script src="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.js') }}"></script>

    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"
  ></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>

<script>
      let accordial_all_list = document.querySelectorAll(
        ".accordian_single_list, .NPIS_logo_right_content"
      );
      let Mainbody_conatiner = document.querySelector(".Mainbody_conatiner");

      $(document).ready(function(){
        // {{Session::get('variableName')}}
        var sidebarIslocked=$("#fixedSwitch").val()
        if(sidebarIslocked==1){
          side_bar_Container.classList.add("show");
          Mainbody_conatiner.classList.remove("active");

          accordial_all_list.forEach((asl) => {
            asl.classList.remove("active");
          });

          $("#sidebarlocked").css({"height":"100%","width":"100%","background-color":"white","border-radius":"50%",});
          $(".side_bar_Container").animate({
            left: '0px',
            opacity: '100',
          });
          $(".Mainbody_content").animate({
            width:'83%',
          });
          $(".Mainbody_content").css("float","right");
          $(".Profil_Pengguna_text").animate({
            width:"50%",
            left:"19%",
          });
          $(".user_profile_footer").animate({
            width:'83%',
          });
          $(".user_profile_footer").css("float","right");
        }
        else{
          $("#sidebarlocked").css({"display":"none"});
          $(".side_bar_Container").animate({
          left: '-250px',
          opacity: '0',
          });  
          $(".Mainbody_content").animate({
            width:'100%',
          });
          $(".Mainbody_content").css("float","");
          $(".Profil_Pengguna_text").animate({
            width:"95%",
            left:"0%",
          });
          $(".user_profile_footer").animate({
            width:'95%',
          });
          $(".user_profile_footer").css("float","");
        }

      });


      $("#round").click(function(){
        side_bar_Container.classList.add("show");
        Mainbody_conatiner.classList.remove("active");

        accordial_all_list.forEach((asl) => {
          asl.classList.remove("active");
        });        
        // $(".side_bar_Container").hide();
        // $(".side_bar_Container").animate({left: '250px'});
        var fixedSwitchON=$("#fixedSwitch").val()
        // console.log(fixedSwitchON=='');
        if(fixedSwitchON==0){
          var islocked= $("#fixedSwitch").val(1)
          var isSidebarlocked=$("#fixedSwitch").val()
        }else{
            var islocked= $("#fixedSwitch").val(0)
            var isSidebarlocked=$("#fixedSwitch").val()
        }
        $.ajax({
        type: "POST",
        url: "/switch",
        contentType: "application/json",
        dataType: "json",
        data: isSidebarlocked,
        success: function(response) {
          console.log(response.data);
            if(response.data==1){
              side_bar_Container.classList.add("show");
              Mainbody_conatiner.classList.remove("active");

              accordial_all_list.forEach((asl) => {
                asl.classList.remove("active");
              });

              $("#sidebarlocked").load(" #sidebarlocked");
              $("#sidebarlocked").css({"height":"100%","width":"100%","background-color":"white","border-radius":"50%","display":"block"});
              $(".Mainbody_content").animate({
                width:'83%',
              });
              $(".Mainbody_content").css("float","right");
              $(".Profil_Pengguna_text").animate({
                width:"50%",
                left:"19%",
              });
              $(".user_profile_footer").animate({
                width:'83%',
              });
              $(".user_profile_footer").css("float","right");
              
            }else{
              $("#sidebarlocked").load(" #sidebarlocked");
              $("#sidebarlocked").css({"display":"none"});
              $(".side_bar_Container").animate({
                left: '-250px',
                opacity: '0',
              });
              $(".Mainbody_content").animate({
                width:'100%',
              });
              $(".Mainbody_content").css("float","");
              $(".Profil_Pengguna_text").animate({
                width:"95%",
                left:"0%",
              });
              $(".user_profile_footer").animate({
                width:'95%',
              });
              $(".user_profile_footer").css("float","");

            }
        },
        error: function(response) {
            console.log(response);
        }
        });
        isSidebarUnlock=$("#fixedSwitch").val()
        // if(isSidebarUnlock==0){
          
        // }else{
          
        // }
      })
      $("#menu").click(function(){
        // $(".side_bar_Container").hide();
        // $(".side_bar_Container").animate({left: '250px'});
        $(".side_bar_Container").animate({
          left: '0px',
          opacity: '100',
        });
        $(".Mainbody_content").animate({
          width:'83%',
        });

        $(".Profil_Pengguna_text").animate({
          width:"60%",
          left:"19%",
        });
        
        $(".Mainbody_content").css("float","right");
        $(".Profil_Pengguna_text").css("position","relative");
        $(".user_profile_footer").animate({
          width:'83%',
        });
        $(".user_profile_footer").css("float","right");
      })
    </script>
    
  </body>
</html>
@yield('scripts' )
@stack('scripts')
