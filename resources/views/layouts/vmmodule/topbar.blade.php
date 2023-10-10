@php
  $user_is=Auth::user()->is_superadmin;
@endphp
<!-- Mainbody_conatiner Starts -->
  <div class="Mainbody_conatiner user_profile">
        <!-- HEADER Section starts -->
        <header class="dashboard">
          <nav class="fixed_nav" style="z-index: 1!important; position: absolute;">
            <div class="col-12 row">
              <div class="nav_bar col-12">
                <div class="Nav_left_Input_content d-flex align-items-center col-5" style="position: relative;left: -250px;">
                  <div class="logo_menu">
                    <a class="text-decoration-none text-dark" href="/home">
                      <div class="nav_logo d-flex mr-5">
                        <a class="text-decoration-none text-dark d-flex" href="/home">
                          <img src="{{ asset('dashboard/assets/images/LOGO.png') }}" alt="LOGO1" />
                          <h3 class="m-1">NPIS</h3>
                        </a>
                      </div>
                    </a>
                  </div>
                  <div class="toggler">
                    <img id="menu" src="{{ asset('dashboard/assets/images/menu.png') }}" alt="menu" />
                  </div>
                  <!-- <div class="d-flex searchInput" style="margin-left: 5%;">
                    <input type="text" class="form-control search_bar" id="searchBar" name="searchQuery"/>
                    <button class="btn btn-outline-secondary search_btn" type="button" id="search">
                      Cari
                    </button>
                  </div> -->
                </div>
                <div class="desktop-menu">
                  <div class="Nav_right_content d-flex align-items-center ml-auto">
                    <div class="Nav_right_img_content d-flex">
                      <div class="jata_icons">
                        <img
                          src="{{ asset('dashboard/assets/images/Jata-Malaysia-Vector-01 6.png') }}"
                          alt="Jata-Malaysia"
                          class=""
                        />
                        <img
                          src="{{ asset('dashboard/assets/images/logo-jab-pengairan-saliran-msia__400x293 6.png') }}"
                          alt="jab-pengairan-saliran-msia"
                        />
                      </div>
                      <div class="icons_contains">
                        <!-- Notification dropdown start -->
                        <div class="dropdown ">
                          <img src="data:image/svg+xml,%3Csvg xmlns='http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' width='32' height='48' viewBox='0 0 24 24'%3E%3Cpath fill='%23313a47' d='M21 19v1H3v-1l2-2v-6c0-3.1 2.03-5.83 5-6.71V4a2 2 0 0 1 2-2a2 2 0 0 1 2 2v.29c2.97.88 5 3.61 5 6.71v6l2 2m-7 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2'%2F%3E%3C%2Fsvg%3E" alt="coolicon" onclick="myFunction()" class="dropbtn" style="cursor: pointer;"/>
                          <div id="myDropdown" class="dropdown-content">
                            <!-- notification start -->
    
                            <!-- notification end -->
                          </div>
                        </div>
                        <!-- Notification dropdown end -->
                        <span class="iconify icon_topbar" data-icon="mdi-cog" style="cursor: pointer;"></span>
                        <i class="ri-fullscreen-line icon_topbar" style="cursor: pointer;" id="fullscreenBtn"></i>
                      </div>
                    </div>
                    <div class="dropdown">
                      <div
                        class=""
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <div class="profile_container d-flex">
                          <div class="profile_img">
                            <i class="ri-account-circle-fill icon_profile" style="cursor: pointer;" alt="Admin"  id="profile_image"></i>
                          </div>
                          <div class="profile_content">
                            <h4 class="username">{{ Auth::user()->name }}</h4>
                            <p id="jawatanName"></p>
                          </div>
                        </div>
                      </div>
                      <div
                        class="dropdown-menu mt-3 ml-5"
                        aria-labelledby="dropdownMenuButton"
                      >
                        {{-- 2023 March 21 by Nabilah --}}
                        <a class="dropdown-item" href="{{ url('/user-profile/appuser', Auth::user()->id)}}" style="display: flex;
                          align-items: center;">
                          <span class="iconify icon_dropdown mr-2" data-icon="mdi-card-account-details-outline" style="cursor: pointer;"></span>
                          Profil Pengguna
                        </a>
                        <a class="dropdown-item" href="#"  data-target="#Change_password_modal" data-toggle="modal" data-backdrop="static" data-keyboard="false" style="display: flex;
                        align-items: center;">
                          <span class="iconify icon_dropdown mr-2" data-icon="mdi-lock" style="cursor: pointer;"></span>
                          {{ __('Tukar Kata Laluan') }}
                        </a>
                        {{-- End by Nabilah --}}
                        <a class="dropdown-item" href="{{ url('user/logout') }}" style="display: flex;
                        align-items: center;">
                          <i class="ri-logout-box-r-line icon_dropdown mr-2"></i>
                          Log Keluar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mobile-menu">
                  <div class="Nav_right_content d-flex align-items-center ml-auto justify-content-between">
                    <div class="Nav_right_img_content d-flex">
                      <div class="jata_icons">
                        <img
                          src="{{ asset('dashboard/assets/images/Jata-Malaysia-Vector-01 6.png') }}"
                          alt="Jata-Malaysia"
                          class=""
                        />
                        <img
                          src="{{ asset('dashboard/assets/images/logo-jab-pengairan-saliran-msia__400x293 6.png') }}"
                          alt="jab-pengairan-saliran-msia"
                        />
                      </div>
                    </div>
                    <div class="dropdown">
                      <div
                        class=""
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <div class="profile_container d-flex">
                          <div class="profile_img">
                            <i class="ri-account-circle-fill icon_profile" alt="Admin"  id="profile_image"></i>
                          </div>
                        </div>
                      </div>
                      <div
                        class="dropdown-menu mt-3"
                        aria-labelledby="dropdownMenuButton"
                      >
                        <div class="profile_content dropdown-item" style="background-color: lightgray;">
                          <h6 class="username"><strong>{{ Auth::user()->name }}</strong></h4>
                          <p id="jawatanName"></p>
                        </div>
                        <a class="dropdown-item" href='{{ url("/user-profile/appuser", Auth::user()->id)}}'>Profil Pengguna</a>
                        <a class="dropdown-item" href="#"  data-target="#Change_password_modal" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                          {{ __('Tukar Kata Laluan') }}
                        </a>
                        <a class="dropdown-item" href="#">Notifikasi</a>
                        <a class="dropdown-item" href="#">Tetapan</a>
                        <a class="dropdown-item" href="{{ url('user/logout') }}">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
          <input type="hidden" value="{{ Auth::user()->id }}" id="userJawataName" >
        </header>

         <!--------------------------------------------------- change_password_modal_container starts-------------------------- -->
         <section class="p-0">
          <div class="change_password_modal" >
            <!-- Modal -->
            <div
              class="modal fade"
              id="Change_password_modal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true"
            >
              <div
                class="modal-dialog modal-dialog-centered change_password_modal_dialog"
                role="document"
              >
                <div class="modal-content change_password_modal_content">
                  <div class="modal-body change_password_modal_body">
                    <div class="login_interface_close mr-3">
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                        <span class="iconify" data-icon="mdi-window-close" id="close_edit_pop"></span>
                        </button>
                      </div>
                    <div class="change_password_modal_heading">
                      <h4>Tukar kata laluan</h4>
                    </div>
                    <br>
                    <div style="background: #f4f5fc;">
                      <p style="padding-left: 7%; padding-right: 7%; padding-top: 3%; font-family: Poppins_bold; font-size: 1rem;">
                        Syarat bagi pemilihan Kata Laluan
                      </p>
                      <p style="padding-left: 7%; padding-right: 7%; padding-bottom: 3%; font-family: Poppins_Regular; font-size: 0.8rem;">panjang kata laluan mestilah sekurang-kurangnya dua belas (12) aksara dengan gabungan antara huruf dan nombor (alphanumeri) dan aksara khas</p>
                    </div>
                    <br>
                    <span class="error" id="pass_error"></span>
                    <br><br>
                    <div class="change_password_modal_form">
                      <form name="change_password_form">
                        <div class="form-group input_content row">
                          <label for="old_password" class="required col-6">Kata Laluan Lama</label>
                          <input type="text" class="form-control col-6" id="old_password" name="old_password" placeholder="">
                          <span class="error" id="error_old_password"></span>
                        </div>
                        <div class="form-group input_content row">
                          <label for="new_password" class="required col-6">Kata Laluan Baharu</label>
                          <input type="text" class="form-control col-6" id="new_password" name="new_password" placeholder="">
                          <span class="error" id="error_new_password"></span>
                        </div>
                        <div class="form-group input_content row">
                          <label for="confirm_password" class="required col-6">Pengesahan Kata Laluan Baharu</label>
                          <input type="text" class="form-control col-6" id="confirm_password" name="confirm_password" placeholder="">
                          <span class="error" id="error_confirm_password"></span>
                        </div>
                        <div class="input_container_row"></div>
                        <div class="change_password_form_btn_container">
                            <button type="button" class="back" id="back_password">Kembali</button>
                            <button type="button" class="save" id="save_password">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--------------------------------------------------- change_password_modal_container starts-------------------------- -->

        <!--------------------------------------------------- success_change_modal_container starts-------------------------- -->
        <section>
          <div class="project_register_form_modal_container">
            <div
              class="modal spaced_modal fade"
              id="success_change_password_modal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true" data-backdrop="static" data-keyboard="false"
            >
              <div
                class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
                role="document"
              >
                <div class="modal-content project_register_form_modal_content">
                  <div class="project_register_form_modal_header d-flex justify-content-end m-2">
                    <button type="button" data-dismiss="modal" aria-label="Close">
                      <span class="iconify" data-icon="mdi-window-close" id="close_edit_pop"></span>
                    </button>
                  </div>
                  <div class="modal-body project_register_form_modal_body">
                    <div class="project_register_form_modal_body_Content">
                      <h3 class="vms p-0">
                      Kata laluan anda berjaya disimpan
                      </h3>
        
                      <div class="btn_holder d-flex">
                        <button data-dismiss="modal" id="vm_id" class="fix_button blue TutupBtn">
                          Tutup
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--------------------------------------------------- success_change_modal_container ends------------------------- -->
        <!-- HEADER Section Ends -->

        <script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
        <script>
          $(document).ready(function(){


            var user_type =  {{Auth::user()->user_type_id}};
                var is_superadmin =  {{Auth::user()->is_superadmin}};

                if(is_superadmin==1)
                {
                    for(let $i=1;$i<=9;$i++)
                    {
                        $("#sidebar_"+$i).addClass("d-flex");
                        $("#sidebar_"+$i).removeClass("d-none");
                    }

                }
                else
                {

                  var api_token = "Bearer "+ window.localStorage.getItem('token');
                  axios.defaults.headers.common["Authorization"] = api_token
                  
                  axios({
                      method: 'get',
                      url: "{{ env('API_URL') }}"+"api/lookup/get_module_access_by_usertype",
                      responseType: 'json',
                      params: {
                          user_type: user_type
                      }   
                  })
                  .then(function (response) { console.log(response.data.data)
                      

                      if (response) {
                              $.each(response.data.data, function (key, item) {
                              console.log("#sidebar_"+item['module_id'])
                                              $("#sidebar_"+item['module_id']).addClass("d-flex");
                                              $("#sidebar_"+item['module_id']).removeClass("d-none");

                              })
                      }
                      else {

                      }

                  });
                }

            $("#fullscreenBtn").click(function(){
              document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
            })
            var logo1=localStorage.getItem("logo-1");
            var logo2=localStorage.getItem("logo-2");
            console.log(logo1=='')
            // if(logo1!=''){
            //   $("#logo-1").attr('src','../../../dashboard/assets/images/Jata-Malaysia-Vector-01 6.png').css({"height":'70px'})
            // }
            // else{
            //   $("#logo-1").attr('src',localStorage.getItem("logo-1")).css({"height":'60px'})
            // }
            // if(logo2!=''){
            //   $("#logo-2").attr('src',"../../../dashboard/assets/images/logo-jab-pengairan-saliran-msia__400x293 6.png").css({"height":'60px'})
            // }
            // else{
            //   $("#logo-2").attr('src',localStorage.getItem("logo-2")).css({"height":'60px'}) 
            // }


            $('#search').click(function(){
              var search_term = $('#searchBar').val();

              $('.NPIS_Container').removeHighlight().highlight(search_term);
            });

            $("#dropdownMenuButton").click(function(){
              $(".dropdown-menu").toggle();
            })
                if(localStorage.getItem("jawatan_name"))
                {
                  $("#jawatanName").text(localStorage.getItem("jawatan_name"))
                  if(localStorage.getItem("profile_path")!=''){
                  $("#profile_image").attr("src", localStorage.getItem("profile_path"));
                  }
                }
                else
                {
                  var delayInMilliseconds = 100;
                  setTimeout(function() {
                    //your code to be executed after 1 second
                    loadJawatan();
                  }, delayInMilliseconds);
                  //loadJawatan();
                }  
          })
          function loadJawatan()
          {
            var login_user=$("#userJawataName").val()
            const api_url = "{{env('API_URL')}}";  console.log(api_url);
                    const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
                    update_user_api = api_url+"api/user/jawatanName";
                    data_update = {'id':login_user};
                    var jsonString = JSON.stringify(data_update);
                    $.ajaxSetup({
                      headers: {
                                  "Content-Type": "application/json",
                                  "Authorization": api_token,
                                  }
                      });
                    $.ajax({
                          type: 'POST',
                          url: update_user_api,
                          data: jsonString, 
                          success: function(response) {

                            $("#jawatanName").text(response.data.jawatan.nama_jawatan)
                            localStorage.setItem("jawatan_name",response.data.jawatan.nama_jawatan);
                            if(response.profilePic.original_url!=null){
                              $("#profile_image").attr("src", response.profilePic.original_url);
                            localStorage.setItem("profile_path",response.profilePic.original_url);
                            }
                          }
                      });
          }


          $("#save_password").click(function(){
              var old_pwd = document.change_password_form.old_password.value;
              var new_pwd = document.change_password_form.new_password.value;
              var c_pwd   = document.change_password_form.confirm_password.value;
              var passw= /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9_!@#$%^&*]{12,20}$/;


              console.log(old_pwd);
              console.log(new_pwd);
              console.log(c_pwd);
              if(old_pwd==''){
                  document.getElementById("error_old_password").innerHTML="Kata laluan lama diperlukan. Sila masukkan kata laluan lama"; 
                  return false; 
              }else{
                  document.getElementById("error_old_password").innerHTML=""; 
              }
              if(new_pwd==''){
                  document.getElementById("error_new_password").innerHTML="Kata laluan baharu diperlukan. Sila masukkan kata laluan baharu"; 
                  return false; 
              }else{
                  document.getElementById("error_new_password").innerHTML=""; 
              }
              if(c_pwd==''){
                  document.getElementById("error_confirm_password").innerHTML="Pengesahan kata laluan baharu diperlukan. Sila masukkan  pengesahan kata laluan baharu"; 
                  return false; 
              }else{
                  document.getElementById("error_confirm_password").innerHTML=""; 
              }
              if(new_pwd.match(passw)) {
                  document.getElementById("pass_error").innerHTML=""; 
              }
              else
              {
                document.getElementById("pass_error").innerHTML="Kata laluan tidak sepadan ( Pastikan panjang kata laluan mestilah sekurang-kurangnya dua belas (12) aksara dengan gabungan antara huruf dan nombor (alphanumeric) dan aksara khas). Sila masukkan kata laluan yang sah."; 
                  return false;
              }
              if(old_pwd==new_pwd || old_pwd==c_pwd)
              {
                  document.getElementById("pass_error").innerHTML="Kata laluan yang baharu tidak boleh sama dengan kata laluan lama. Sila masukkan kata laluan lain"; 
                  return false; 
              }
              else
              {
                  document.getElementById("pass_error").innerHTML=""; 
              }

              if(new_pwd !=c_pwd)
              {
                  document.getElementById("pass_error").innerHTML="Kata laluan baharu dan pengesahan kata laluan perlu sepadan"; 
                  return false; 
              }
              else
              {
                  document.getElementById("pass_error").innerHTML=""; 
              }

              if(new_pwd.length<12)
              {
                  document.getElementById("pass_error").innerHTML="Kata laluan hendaklah sekurang - kurangnya 12 aksara"; 
                  return false;
              }
              else
              {
                document.getElementById("pass_error").innerHTML=""; 
              }

              const api_url = "{{env('API_URL')}}";  console.log(api_url);
              const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);

              var formData = new FormData();
                  formData.append('user_id', {{Auth::user()->id}})
                  formData.append('new_password', document.change_password_form.new_password.value);
                  formData.append('old_password', document.change_password_form.old_password.value);

                    axios.defaults.headers.common["Authorization"] = api_token
                    axios({
                        method: 'post',
                        url: api_url+"api/user/change-password",
                        data: formData,
                    })
                      .then(function(response) {
                        //handle success
                        console.log(response.data.code);
                        if(response.data.code=='500')
                        {
                          document.getElementById("pass_error").innerHTML= response.data.error; 
                          document.getElementById("old_password").focus();
                        }
                        else
                        {
                          console.log("success")
                          $("#Change_password_modal").modal('hide');
                          $("#success_change_password_modal").show();
                          var element = document.getElementById("success_change_password_modal"); console.log(element)
                              element.classList.remove("fade");
                        }
                    })
                    .catch(function(response) {
                        //handle error
                        console.log(response);
                    });

                });

                $("#back_password").click(function(){
                  location.reload()
                });

                $("#vm_id").click(function(){
                  window.location.href = 'user/logout';
                });

                
             /* When the user clicks on the button, 
              toggle between hiding and showing the dropdown content */
              function myFunction() {

                var user_is     =   {{$user_is}};     console.log(user_is)

                document.getElementById("myDropdown").classList.toggle("show");
                 const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
                $.ajaxSetup({
                      headers: {
                                  "Content-Type": "application/json",
                                  "Authorization": api_token,
                                  }
                      });

                    axios.defaults.headers.common["Authorization"] = api_token;
                    $user_id = {{Auth::user()->id}};
                    axios({
                        method: 'get',
                        url: api_url+"api/user/get-notifications?user_id="+$user_id+"&user_is="+user_is,
                        responseType: 'json'        
                    })
                      .then(function(response) {
                        $("#myDropdown").html('');   //clear the output
                        console.log(response.data.count_penyemak1);
                        var daftar_count=0;
                        var penye_count=0;
                        var pengesah_count=0;
                        var peraku_count=0;

                        if(response.data.data.length>0)
                        {
                          var dates =''; var type=""; 
                           var noti_data=response.data.data;
                           $.each(noti_data, function (key, item) {  console.log(item['dibuat_pada'])

                            var date_diff=timeSince(item['dibuat_pada']); console.log(date_diff)
                            if(item['notification_type']==1)
                            {
                              type='PENDAFTARAN BAHARU';
                            }
                            else
                            {
                              type='PERMOHONAN PROJEK';
                            }

                            // Nabilah update notifications ui (6/10/2023)
                            $('#myDropdown').append( `<a href="#home" class="card">
                                                <div class="card-body" style="padding: 0px;">
                                                  <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                      <div class="flex-shrink-0 mr-3">
                                                        <i class="mdi mdi-android-messages" style="color: #007bff; font-size: 2rem;"></i>
                                                      </div>
                                                      <div class="ms-2">
                                                        <h5 class="noti-item-title fw-semibold notificationMessage_msg" style="font-size: 14px;">
                                                          `+type+`
                                                          <small class="fw-normal text-muted ml-1">`+date_diff+`</small>
                                                        </h5>
                                                        <small class="noti-item-subtitle text-muted"><label for="">`+item['notification']+`. <br> Sila semak untuk pengesahan.</label></small>
                                                      </div>
                                                    </div>
                                                    <span class="noti-close-btn text-muted" onClick="removeNotification(`+item['id']+`)">
                                                      <i class="mdi mdi-close"></i>
                                                    </span>
                                                  </div>
                                                </div>
                                              </a>`);
                            });
                        }
                        else { daftar_count = 1; }

                        if(response.data.count_penyemak>0)
                        {
                            // $('#myDropdown').append( `<hr>
                            //                   <a href="#home">
                            //                   <div class="d-flex justify-content-between notificationMessage">
                            //                     <div>
                            //                       <img src='{{ asset("assets/images/sms.png") }}'>
                            //                     </div>
                            //                     <label for="">PERMOHONAN PROJEK</label>
                            //                     <div class="notificationTime">
                            //                     <p for="" class=""><label for="" class="ml-1" onClick="removeProjectNotification('count_penyemak')">X</label></p>
                            //                   </div>
                            //                   </div> 
                            //                   </a>
                            //                   <hr>
                            //                   <a href="#home" class="a2">
                            //                     <div class="d-flex justify-content-between notificationMessage_msg">
                            //                     <label for="">`+response.data.count_penyemak+` Permohonan baharu perlu disemak</label>
                            //                     </div>
                            //                   </a>`);
                            $('#myDropdown').append( `<a href="#home" class="card">
                                              <div class="card-body" style="padding: 0px;">
                                                <div class="d-flex align-items-center justify-content-between">
                                                  <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mr-3">
                                                      <i class="mdi mdi-android-messages" style="color: #007bff; font-size: 2rem;"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                      <h5 class="noti-item-title fw-semibold notificationMessage_msg" style="font-size: 14px;">
                                                        PERMOHONAN PROJEK
                                                      </h5>
                                                      <small class="noti-item-subtitle text-muted"><label for="">`+response.data.count_penyemak+` Permohonan baharu perlu disemak</label></small>
                                                    </div>
                                                  </div>
                                                  <span class="noti-close-btn text-muted" onClick="removeProjectNotification('count_penyemak')">
                                                    <i class="mdi mdi-close"></i>
                                                  </span>
                                                </div>
                                              </div>
                                            </a>`);
                        }   
                        else { penye_count=1; }
                        if(response.data.count_pengesah>0)
                        {
                            // $('#myDropdown').append( `<hr>
                            //                   <a href="#home">
                            //                   <div class="d-flex justify-content-between notificationMessage">
                            //                     <div>
                            //                       <img src='{{ asset("assets/images/sms.png") }}'>
                            //                     </div>
                            //                     <label for="">PERMOHONAN PROJEK</label>
                            //                     <div class="notificationTime">
                            //                     <p for="" class=""><label for="" class="ml-1" onClick="removeProjectNotification('count_pengesah')">X</label></p>
                            //                   </div>
                            //                   </div> 
                            //                   </a>
                            //                   <hr>
                            //                   <a href="#home" class="a2">
                            //                     <div class="d-flex justify-content-between notificationMessage_msg">
                            //                     <label for="">`+response.data.count_pengesah+` Permohonan baharu perlu disahkan</label>
                            //                     </div>
                            //                   </a>`);
                            $('#myDropdown').append( `<a href="#home" class="card">
                                              <div class="card-body" style="padding: 0px;">
                                                <div class="d-flex align-items-center justify-content-between">
                                                  <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mr-3">
                                                      <i class="mdi mdi-android-messages" style="color: #007bff; font-size: 2rem;"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                      <h5 class="noti-item-title fw-semibold notificationMessage_msg" style="font-size: 14px;">
                                                        PERMOHONAN PROJEK
                                                      </h5>
                                                      <small class="noti-item-subtitle text-muted"><label for="">`+response.data.count_pengesah+` Permohonan baharu perlu disahkan</label></small>
                                                    </div>
                                                  </div>
                                                  <span class="noti-close-btn text-muted" onClick="removeProjectNotification('count_pengesah')">
                                                    <i class="mdi mdi-close"></i>
                                                  </span>
                                                </div>
                                              </div>
                                            </a>`);
                        }
                        else {  pengesah_count=1; }
                        if(response.data.count_peraku>0)
                        {
                            // $('#myDropdown').append( `<hr>
                            //                   <a href="#home">
                            //                   <div class="d-flex justify-content-between notificationMessage">
                            //                     <div>
                            //                       <img src='{{ asset("assets/images/sms.png") }}'>
                            //                     </div>
                            //                     <label for="">PERMOHONAN PROJEK</label>
                            //                     <div class="notificationTime">
                            //                     <p for="" class=""><label for="" class="ml-1" onClick="removeProjectNotification('count_peaku')">X</label></p>
                            //                   </div>
                            //                   </div> 
                            //                   </a>
                            //                   <hr>
                            //                   <a href="#home" class="a2">
                            //                     <div class="d-flex justify-content-between notificationMessage_msg">
                            //                     <label for="">`+response.data.count_peraku+` Permohonan baharu perlu diperakui</label>
                            //                     </div>
                            //                   </a>`);
                            $('#myDropdown').append( `<a href="#home" class="card">
                                              <div class="card-body" style="padding: 0px;">
                                                <div class="d-flex align-items-center justify-content-between">
                                                  <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mr-3">
                                                      <i class="mdi mdi-android-messages" style="color: #007bff; font-size: 2rem;"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                      <h5 class="noti-item-title fw-semibold notificationMessage_msg" style="font-size: 14px;">
                                                        PERMOHONAN PROJEK
                                                      </h5>
                                                      <small class="noti-item-subtitle text-muted"><label for="">`+response.data.count_peraku+` Permohonan baharu perlu diperakui</label></small>
                                                    </div>
                                                  </div>
                                                  <span class="noti-close-btn text-muted" onClick="removeProjectNotification('count_peaku')">
                                                    <i class="mdi mdi-close"></i>
                                                  </span>
                                                </div>
                                              </div>
                                            </a>`);
                        }
                        else { peraku_count=1;}

                        // else
                        // {
                        //   $('#myDropdown').append( `
                        //                       <hr>
                        //                         <label style="display: block; text-align: center;"> Tiada notifikasi ditemui</label>
                        //                       <hr>`);
                        // }

                        if( daftar_count==1 && penye_count==1 && pengesah_count==1 && peraku_count==1)
                        {
                          $('#myDropdown').append( `<a href="#home" class="card">
                                                <div class="card-body" style="padding: 0px;">
                                                  <div class="text-center">
                                                    <h5 class="noti-item-title fw-semibold notificationMessage_msg" style="font-size: 14px;">
                                                        Tiada notifikasi ditemui
                                                    </h5>
                                                  </div>
                                                </div>
                                              </a>`);
                        }
                    })
                    .catch(function(response) {
                        //handle error
                        console.log(response);
                    });

              }

              function timeSince(date) { console.log(date)
                  date=new Date(date.split('.')[0]); console.log(date);
                  const seconds = Math.floor((new Date() - date) / 1000);
                        let interval = Math.floor(seconds / 31536000);
                        if (interval > 1) {
                          return interval + '&nbsp;tahun yang lalu';
                        }
                        interval = Math.floor(seconds / 2592000);
                        if (interval > 1) {
                          return interval + '&nbsp;bulan yang lalu';
                        }
                        interval = Math.floor(seconds / 86400);
                        if (interval > 1) {
                          return interval + '&nbsp;hari yang lalu';
                        }
                        interval = Math.floor(seconds / 3600);
                        if (interval > 1) {
                          return interval + '&nbsp;jam yang lalu';
                        }
                        interval = Math.floor(seconds / 60);
                        if (interval > 1) {
                          return interval + '&nbsp;minit yang lalu';
                        }
                        if(seconds < 10) return '&nbsp;sebentar tadi';
                        return Math.floor(seconds) + '&nbsp;saat yang lalu';
                  }

                  function removeNotification(id)
              {
                 const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);

                 var formData = new FormData();
                  formData.append('user_id', {{Auth::user()->id}})
                  formData.append('id',id);
                  formData.append('type','');


                $.ajaxSetup({
                      headers: {
                                  "Content-Type": "application/json",
                                  "Authorization": api_token,
                                  }
                      });
                    axios.defaults.headers.common["Authorization"] = api_token;
                    axios({
                        method: 'post',
                        url: api_url+"api/user/mark-notifications",
                        data: formData,        
                    })
                      .then(function(response) {
                        $("#myDropdown").html('');   //clear the output
                    })
                    .catch(function(response) {
                        //handle error
                        console.log(response);
                    });
              }

              function removeProjectNotification(type)
              {
                console.log(type)
                 const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);

                 var formData = new FormData();
                  formData.append('user_id', {{Auth::user()->id}})
                  formData.append('id','');
                  formData.append('type',type);

                $.ajaxSetup({
                      headers: {
                                  "Content-Type": "application/json",
                                  "Authorization": api_token,
                                  }
                      });
                    axios.defaults.headers.common["Authorization"] = api_token;
                    axios({
                        method: 'post',
                        url: api_url+"api/user/mark-notifications",
                        data: formData,        
                    })
                      .then(function(response) {
                        $("#myDropdown").html('');   //clear the output
                    })
                    .catch(function(response) {
                        //handle error
                        console.log(response);
                    });
              }
              // Close the dropdown if the user clicks outside of it
              window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                  var dropdowns = document.getElementsByClassName("dropdown-content");
                  var i;
                  for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                      openDropdown.classList.remove('show');
                    }
                  }
                }
              }

              
              $("#menu").click(function(){
                $(".accordian_single_list").removeClass("active")
                $(".NPIS_logo_right_content").removeClass("active")
                $(".side_bar_Container").animate({
                  left: '0',
                  opacity: '100',
                });

                side_bar_Container.classList.add("show");
                setTimeout(() => {
                  barChart.reflow();
                }, 400);

                // $(".Mainbody_conatiner .Mainbody_content.mtop").css("width","100%")
                // $(".Mainbody_conatiner .Mainbody_content.mtop").css("position","relative")
                // $(".Mainbody_conatiner .Mainbody_content.mtop").css("left","0px")
                // $("#senaraiJpsTable_wrapper").css("padding", "2%;")
                // $("#senaraiJpsTable").css("width","100%")
                // $(".side_bar_Container.show").css("width","17.8%")
                $(".Mainbody_conatiner.active header.dashboard ").css("width","96% !important")
                $(".Mainbody_conatiner.active header.dashboard ").css("left","5% !important")
                $(".Mainbody_conatiner").css("width","90%")
                $(".ringkasanCard").css("width","83%")
                $(".ringkasanCard").css("float","right")
                $(".cardKalendarVm").css("width","80%")
                $(".cardKalendarVm").css("float","right")
                $(".project_register_search_container").css("width","105%")
                $(".Mainbody_conatiner").css("width","100%")
                $(".cardVE").css("width","100%")
                $(".cardVE").css("float","right")
                $(".cardVE").css("left","150px")
                $(".fixed_nav").css("left","5%")
              $(".dashboard").css("left","100% !important")

                $(".Mainbody_conatiner .Mainbody_content .project_register_content_container").css("width","81%")
                $(".Mainbody_conatiner .Mainbody_content .project_register_content_container").css("float","right")
                $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("width","87%")
                $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("float","right")
                // $(".tab_image").css("width","50%")
                // $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("width","96%")
                // $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("float","right")

              })
              document.querySelector("#round").addEventListener("click", () => {
                $(".side_bar_Container").animate({
                  left: '-300px',
                  opacity: '0px',
                });
                side_bar_Container.classList.remove("Active");
                setTimeout(() => {
                  barChart.reflow();
                }, 400);
                $(".cardKalendarVm").css("width","100%")
                $(".cardKalendarVm").css("float","unset")
                $(".fixed_nav").css("left","-5%")
                $(".fixed_nav").css("width","120% !important")
                $(".Mainbody_conatiner.user_profile.active").css("width","110% !important")
                $(".Mainbody_conatiner .fixed_nav").css("width","110% !important")

                // $(".accordian_single_list").removeClass("Active")
                // $(".NPIS_logo_right_content").removeClass("Active")
                $(".Nav_left_Input_content").css("left","-60px")
                $(".Mainbody_conatiner header.dashboard").css("width","100%")
                $(".Mainbody_conatiner header.dashboard").css("left","0")
                $(".project_register_search_container").css("width","100%")
                // $(".Mainbody_conatiner .Mainbody_content.mtop").css("width","125%")
                // $(".Mainbody_conatiner .Mainbody_content.mtop").css("position","relative")
                $(".Mainbody_conatiner .Mainbody_content.mtop").css("left","-280px")
                // $("#senaraiJpsTable_wrapper").css("padding", "2%;")
                // $("#senaraiJpsTable").css("width","100%")
                $(".Mainbody_conatiner").css("width","100%")
                $(".ringkasanCard").css("width","100%")
                $(".ringkasanCard").css("float","initial")
                $(".cardVE").css("width","120%")
                $(".cardVE").css("float","right")
                $(".cardVE").css("left","12%")

                $(".Mainbody_conatiner .Mainbody_content .project_register_content_container").css("width","100%")
                $(".Mainbody_conatiner .Mainbody_content .project_register_content_container").css("float","initial")
                $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("width","100%")
                $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("float","unset")
                $(".tab_image").css("width","40%")
                $(".Mainbody_conatiner.active header.dashboard ").css("width","100% !important")
                $(".Mainbody_conatiner.active header.dashboard ").css("left","0% !important")
              });
              $(".Mainbody_conatiner.active header.dashboard ").css("width","100% !important")
              $(".Mainbody_conatiner.active header.dashboard ").css("left","0% !important")
              $(".Mainbody_conatiner header.dashboard").css("width","100%")
              $(".Nav_left_Input_content").css("left","-60px")
              $(".Mainbody_conatiner header.dashboard").css("width","100%")
              $(".Mainbody_conatiner header.dashboard").css("left","0")
              $(".Mainbody_conatiner").css("width","100%")
              $(".Mainbody_conatiner.user_profile.active").css("width","110% !important")

              // $(".Mainbody_conatiner .Mainbody_content.mtop").css("width","125%")
              // $(".Mainbody_conatiner .Mainbody_content.mtop").css("position","relative")
              $(".Mainbody_conatiner .Mainbody_content.mtop").css("left","-280px")
              // $("#senaraiJpsTable_wrapper").css("padding", "2%;")
              // $("#senaraiJpsTable").css("width","100%")
              $(".Mainbody_conatiner .Mainbody_content .project_register_content_container").css("width","81%")
              $(".Mainbody_conatiner .Mainbody_content .project_register_content_container").css("float","initial")
              $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("width","100%")
              $(".Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register").css("float","unset")
              $(".tab_image").css("width","40%")
              $(".ringkasanCard").css("width","100%")
              $(".ringkasanCard").css("float","initial")
              $(".project_register_search_container").css("width","100%")
              $(".cardKalendarVm").css("width","100%")
              $(".cardKalendarVm").css("float","unset")
              $("#cardVE").css("width","120% !important")
                $("#cardVE").css("float","right !important")
                $("#cardVE").css("left","-12% !important")

              $(".Mainbody_conatiner .fixed_nav").css("width","110% !important")
              $(".fixed_nav").css("width","110% !important")
              $(".dashboard").css("width","100% !important")

        </script>
