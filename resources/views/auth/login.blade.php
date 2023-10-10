<script src="assets/js/jquery.min.js"></script>

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@php
$site_key= config('services.googleCaptcha.site_key');
 $secret_key=config('services.googleCaptcha.secret_key');
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
<script>
var onReturnCallback = function(response) {        
    if(response){
        $("#login-jps").prop('disabled', false);                             
        $("#login-nonjps").prop('disabled', false);  
    }
          
    }

var onReturnCallbackRegister = function(response){ console.log(response)
  if(response){
        $("#exampleCheck1").prop('disabled', false); 
        document.querySelector('#submit_registration').disabled = false;
      
    }
}
</script>

   
      

<script>
    $(document).keypress(
      function(event){
        if (event.which == '13') {
          event.preventDefault();
        }
    });
    $(document).ready(function() {
  
  document.getElementById("kategori").value=2;

  // $("#login-nonjps").click(function(event){ 
  //           console.log('non jps form submitted');            
  //           var formEl = document.forms.pengguna_jps_form;
  //           var formData = new FormData(formEl);
  //           console.log(formData.get('email'))
  //           console.log(formData.get('password'))
  //           axios({
  //             method: 'post',
  //             url: "{{ env('API_URL') }}"+"api/temp/user/auth",
  //             responseType: 'json',
  //             data: formData
  //             })
  //             .then(function (response) { 
  //                 console.log(response)
  //                 console.log("nonjpslogin")

                  
  //                 if(response.data.access_token != '') {
  //                   console.log('got token')
  //                   window.localStorage.setItem('token', response.data.access_token);
                    
  //                 }else {
  //                   console.log('no token')
  //                 }                  
  //             })
            
  //     });

  //     $("#login-jps").click(function(event){ 
  //           console.log('jps form submitted');
  //           var formEl = document.forms.pengguna_jps_form;
  //           var formData = new FormData(formEl); 
  //           console.log(formData.get('email'))
  //           console.log(formData.get('password'))
  //           axios({
  //             method: 'post',
  //             url: "{{ env('API_URL') }}"+"api/temp/user/auth",
  //             responseType: 'json',
  //             data: formData
  //             })
  //             .then(function (response) { 
  //                 console.log(response)
  //                 console.log("login")

                  
  //                 if(response.data.access_token != '') {
  //                   console.log('got token')
  //                   window.localStorage.setItem('token', response.data.access_token);
                    
  //                 }else {
  //                   console.log('no token')
  //                 }                  
  //             })              
  //     });

  $("#exampleCheck1").prop('disabled', true);       
  document.querySelector('#submit_registration').disabled = true;
  const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const app_url = document.getElementById("app_url").value;  console.log(app_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
      $('#subForgotButton').click(function(){
        var user_id=$("#exampleInputEmail1").val();
            var user_email=$("#exampleInputPassword1").val();
            if(user_id=='' && user_email==''){
                $("#error").html("Pengesahan Pengguna Tidak Sah");
            }
            else{
              if(IsEmail(user_email)==false){
                $("#error").html("Format E-mel Tidak Sah");
              }
              else{
                $('#sucess_modal').modal('show');

                $("#mail_successBtn").click(function(){
                    $('#submitForgot').submit();
                })
              }

            }
            function IsEmail(email) {
              var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
              if(!regex.test(email)) {
                return false;
              }else{
                return true;
              }
            }
            
    });

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });	

	var JabatandropDown =  document.getElementById("jabatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jabatan/list/",
        dataType: 'json',
        success: function (result) { console.log(result.data)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jabatan;
					el.value = opt;
					JabatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    var bahagiandropDown =  document.getElementById("bahagian");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/bahagian/list/",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_bahagian;
					el.value = opt;
					bahagiandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    var jawatandropDown =  document.getElementById("jawatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jawatan;
					el.value = opt;
					jawatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var greddropDown =  document.getElementById("gred");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/gredjawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_gred;
					el.value = opt;
					greddropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    var negeridropDown =  document.getElementById("negeri");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/negeri/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_negeri;
					el.value = opt;
					negeridropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var daerahdropDown =  document.getElementById("daerah");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/daerah/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_daerah;
					el.value = opt;
					daerahdropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });
    // ----------------------------------------login-------------------------------------------

if (login) {
  let pop_content = document.querySelector(".pop_content");
  let pop_btn = document.querySelector(".pop_btn button");
  pop_btn.addEventListener("click", () => {
    pop_content.classList.toggle("d-none");
  });
  eye_icon.addEventListener("click", (e) => {
    console.log(password_eye_field);
    e.preventDefault();
    password_eye_field.type == "password"
      ? (password_eye_field.type = "text")
      : (password_eye_field.type = "password");
  });
  document.querySelector(".masuk_submit").addEventListener("click", (e) => {
    e.preventDefault();
  });
  r_input.forEach((inp, i) => {
    inp.addEventListener("click", () => {
      interface_tab_content.forEach((itc) => {
        itc.classList.add("d-none");
      });
      if (inp.checked == true) {
        interface_tab_content[i].classList.remove("d-none");
      }
    });
  });
  r_input[1].click();

  // input_file
  input_file_btn.addEventListener("click", (e) => {
    e.preventDefault();
    console.log(input_file);
    input_file.click();
  });

  // -------------------------
  input_file.addEventListener("change", () => {
    var files = input_file.files;
    if (FileReader && files && files.length) {
      var fr = new FileReader();
      // console.log(fr);

      fr.onload = function () {
        console.log(fr.result, input_file.files);
      };

      fr.readAsDataURL(files[0]);
    }
  });
  let form_btn = document.querySelectorAll(".form_btn_container button");
  form_btn.forEach((fb) => {
    fb.addEventListener("click", (e) => {
      e.preventDefault();
    });
  });
  let login_tab_btn = document.querySelectorAll(
    ".MAsuk_tab_btn_container button"
  );
  let pengguna_img = document.querySelector(".pengguna_img_holder img");
  let src = [
    "assets/images/penggunaJPS.png",
    "assets/images/PenggunaAgensiLuar.png",
  ];
  let colorCode = ["#23a354", "#0284c6"];
  let info_content = document.querySelector(".info_content h5");
  let login_status = ["Pengguna JPS", "Pengguna Agensi Luar"];
  login_tab_btn.forEach((btn, i) => {
    let ind = -1;
    btn.addEventListener("click", () => {
      if (!btn.classList.contains("active")) {
        pengguna_img.classList.add("active");
        info_content.classList.add("active");
        pengguna_img.addEventListener("animationend", () => {
          pengguna_img.classList.remove("active");
          info_content.classList.remove("active");
        });
        setTimeout(() => {
          pengguna_img.setAttribute("src", src[i]);
          info_content.querySelector("span").innerText = login_status[i];
          info_content.querySelector("span").style.color = colorCode[i];
        }, 600);
      }

      ind = -1;
      login_tab_btn.forEach((btn) => {
        btn.classList.remove("active");
      });
      btn.classList.add("active");
    });
    btn.addEventListener("mouseenter", () => {
      if (!btn.classList.contains("active")) {
        for (let j = 0; j < login_tab_btn.length; j++) {
          if (login_tab_btn[j].classList.contains("active")) {
            ind = j;
            console.log(ind);
            login_tab_btn[j].classList.remove("active");
          }
        }
        btn.addEventListener("mouseleave", () => {
          console.log(ind);
          if (ind >= 0) {
            login_tab_btn[ind].classList.add("active");
            ind = -1;
          }
        });
      }

    });
  });
}

    

});
</script>

{{-- @endpush --}}
<style>
	p#file_size {
    padding-left: 12px;
    color: red;
}
p#file_type {
    padding-left: 12px;
    color: red;
}
  span.error {
    color:red;
    font-size:12px;
}
label.col-form-label.form_label {
    padding-top: 0px;
}
#sucess_modal_register {
    background-color: rgba(0, 0, 0, 0.2);
}
.btn_upload {
  cursor: pointer;
    display: inline-block;
    overflow: hidden;
    position: relative;
    border: 1px solid #8ea4ad;
    padding: 5px 10px;
    border-radius: 6px;
    width:130px;
}
.pop_btn {
    margin-left: 12px;
    height: 20px;
    width: 20px;
}
.file_label.d-flex {
    margin-right: 15px;
}
.btn_upload:hover,
.btn_upload:focus {
  cursor: pointer;
}
.yes {
  display: flex;
  align-items: flex-start;
  margin-top: 10px !important;
  border: 1px solid #dddddd;
    padding-top: 9px;
    padding-bottom: 9px;
    padding-left: 30px;
    padding-right: 66px;
}
.btn_upload input {
  cursor: pointer;
  height: 100%;
  position: absolute;
  -moz-opacity: 0;
  opacity: 0;
}
.it {
  height: 100px;
  margin-left: 10px;
}
.btn-rmv1,
.btn-rmv2,
.btn-rmv3,
.btn-rmv4,
.btn-rmv5 {
  display: none;
}
.rmv {
  cursor: pointer;
  color: #fff;
  border-radius: 30px;
  border: 1px solid #fff;
  display: inline-block;
  background: rgba(255, 0, 0, 1);
  margin: -5px -10px;
}
.rmv:hover {
  background: rgba(255, 0, 0, 0.5);
}
button#remove_pdf {
    border: 0px;
    font-size: 10px;
    background-color: transparent;
    color: red;
    padding-left: 12px;
    padding-top: 5px;
}
.selected_file.d-flex {
    padding-left: 10px;
}
p.file_sizes {
    font-size: 12px;
    padding-top: 13px;
    padding-left: 15px;
}
label.form_check_label {
    color: #595b5f !important;
}
label.r_container {
    color: black !important;
    filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.19));
    font-weight: 600;
}
</style>
@section('content')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/Mediaquery.css" />
    <!-- captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body id="login">
    <input type="hidden" id="token" value={{env('TOKEN')}}>
    <input type="hidden" id="api_url" value={{env('API_URL')}}>
    <input type="hidden" id="app_url" value={{env('APP_URL')}}>
    <section>
      <!-- Button trigger modal -->
      <div class="login_container">
        <button
          type="button"
          class="btn btn-primary login_btn"
          data-toggle="modal"
          data-target="#log_masuk_modal"
        >
          LOGIN
        </button>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="log_masuk_modal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal-dialog-centered log_masuk_modal_dialog"
          role="document"
        >
          <div class="modal-content log_masuk_modal_container">
            <div class="log_masuk_modal_container">
              <div class="log_masuk_modal_header d-flex">
                <button type="button" data-dismiss="modal" class="ml-auto">
                  <img src="assets/images/image 95.png" alt="image" />
                </button>
              </div>
              @if($errors->any())
                  {{ implode('', $errors->all('<div>:message</div>')) }}
              @endif

              <!-- PENGGUNA JPS -->
              <div class="modal-body log_masuk_modal_body">
                <h4>log masuk</h4>
                <div class="MAsuk_tab_container pt-3">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button
                        class="nav-link active"
                        id="nav-home-tab"
                        data-toggle="tab"
                        data-target="#nav-home"
                        type="button"
                        role="tab"
                        aria-controls="nav-home"
                        aria-selected="true"
                      >
                        Pengguna JPS
                      </button>
                      <button
                        class="nav-link"
                        id="nav-profile-tab"
                        data-toggle="tab"
                        data-target="#nav-profile"
                        type="button"
                        role="tab"
                        aria-controls="nav-profile"
                        aria-selected="false"
                      >
                      Pengguna Agensi Luar
                      </button>
                    </div>
                  </nav>
                  <div
                    class="tab-content pengguna_jps_tab_content"
                    id="nav-tabContent"
                  >
                    <div
                      class="tab-pane fade show active"
                      id="nav-home"
                      role="tabpanel"
                      aria-labelledby="nav-home-tab"
                    >
                      <p class="info">
                        Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                      </p>
                        <form id="pengguna_jps_form" method="POST" action="{{url('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email"  class="sr-only">kad pengenalan</label>
                                <input type="text"
                                        class="form-control"
                                        id="email"
                                        aria-describedby="emailHelp"
                                        placeholder="Kad Pengenalan" name="email" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group position-relative">
                                <label for="password" class="sr-only">Kata Laluan</label>
                                <input type="password"
                                        class="form-control password_eye_field"
                                        id="password"
                                        placeholder="Kata Laluan" name="password" />
                                        
                                <button class="eye_icon">
                                    <img src="assets/images/Password eye.png" alt="" />
                                </button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="g-recaptcha" data-sitekey={{$site_key}} data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                            
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button id="login-jps" type="submit" class="btn btn-primary masuk_submit" disabled>
                                        {{ __('Log Masuk') }}
                                    </button>
                                </div> 
                                <div class="forget_password d-ext-end col-12">
                                <a class="btn btn-link" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                                data-keyboard="false">
                                    {{ __('Daftar Baharu') }}
                                </a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                                    data-keyboard="false">
                                        {{ __('Lupa Kata Laluan?') }}
                                    </a>
                                @endif 
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- PENGGUNA Kementerian/Agensi -->
                    <div
                      class="tab-pane fade"
                      id="nav-profile"
                      role="tabpanel"
                      aria-labelledby="nav-profile-tab"
                    >
                    <p class="info">
                        Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                    </p>
                    <form id="pengguna_jps_form" method="POST" action="{{url('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email"  class="sr-only">kad pengenalan</label>
                            <input type="text"
                                    class="form-control"
                                    id="email"
                                    aria-describedby="emailHelp"
                                    placeholder="Emel" name="email" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="form-group position-relative">
                            <label for="password" class="sr-only">Kata Laluan</label>
                            <input type="password"
                                    class="form-control password_eye_field"
                                    id="password"
                                    placeholder="Kata Laluan" name="password" />
                                    
                            <button class="eye_icon">
                                <img src="assets/images/Password eye.png" alt="" />
                            </button>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="g-recaptcha" data-sitekey={{$site_key}} data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                        
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button id="login-nonjps" type="submit" class="btn btn-primary masuk_submit" disabled>
                                    {{ __('Log Masuk') }}
                                </button>
                            </div> 
                            <div class="forget_password d-ext-end col-12">
                            <a class="btn btn-link" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                            data-keyboard="false">
                                {{ __('Daftar Baharu') }}
                            </a>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                                data-keyboard="false">
                                    {{ __('Lupa Kata Laluan?') }}
                                </a>
                            @endif 
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--------------------------------------------------- forget_modal_container starts-------------------------- -->
    <section>
      <div class="forget_modal">
        <!-- Modal -->
        <div
          class="modal fade"
          id="Forget_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered forget_modal_dialog"
            role="document"
          >
            <div class="modal-content forget_modal_content">
              <div class="modal-body forget_modal_body">
                <div class="login_interface_close">
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <img src="assets/images/image 95.png" alt="" />
                    </button>
                  </div>
                <div class="forget_modal_heading">
                  <h4>Lupa kata laluan ?</h4>
                  
                  <p>
                    Sila masukkan No. Kad Pengenalan, E-Mel dan semak E-Mel anda untuk set semula kata laluan.
                  </p>
                </div>

                <div class="forget_modal_form">
                    <form method="POST" action="{{ route('password.email') }}"  id="submitForgot">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="sr-only"
                        >No. Kad Pengenalan</label
                      >
                        <input
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        name="no_ic"
                        aria-describedby="emailHelp"
                        placeholder="No. Kad Pengenalan"
                        />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="sr-only"
                        >Alamat E-Mel</label
                      >
                      <input
                      type="email" name="email"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Alamat E-Mel"
                    />
                    </div>
                    <label id="error" class="text-danger"></label>
                    <div class="forget_submit text-center">
                        <button
                        type="button"   
                        id="subForgotButton"                     
                        {{-- data-toggle="modal" --}}
                        data-target="#sucess_modal"
                        {{-- data-dismiss="modal" --}}
                      >  
                        Hantar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--------------------------------------------------- sucess_modal_container starts-------------------------- -->
    <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="sucess_modal_register"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content sucess_modal_content" style="padding: 15% 3%;border-radius: 10px;">
              <div class="modal-body sucess_modal_body">
                <h3 style="padding-left: 77px;">
                  Akaun telah didaftar <br />
                </h3>
                <div class="text-center">
                  <button data-dismiss="modal" id="tutup" style="background-color: #1400ff;color: white;border-radius: 20px;padding-top: 2px;}">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="assets/images/coolicon.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!---------------------------------------------------- login interface Modal starts-------------------------- -->
      <section id="register_form">
        <div class="login_interface_section">
          <div
            class="modal fade"
            id="Login_interface_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered login_interface_modal_dialog"
              role="document"
            >
              <div class="modal-content login_interface_modal_content">
                <div class="modal-body login_interface_modal_body">
                  <div class="login_interface_close">
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <img src="assets/images/image 95.png" alt="" />
                    </button>
                  </div>
                  <div class="login_interface_modal_body_content">
                    <h4 class="login_interface_modal_header">
                      DAFTAR AKAUN BAHARU
                    </h4>
                    <div class="interface_tab_container">
                      <div class="d-flex">
                        <div class="label">
                          <label for="Kotegori Pengguna">Kategori Pengguna​</label>
                        </div>
                        <div class="radio_Container d-flex flex-column ml-5">
                          <label class="r_container">Pengguna JPS
                            <input type="radio" name="radio" id="Pengguna_JPS" />
                            <span class="checkmark"></span>
                            </label>
                            <label for="Agensi_Luar" class="r_container">Pengguna Agensi Luar
                            <input
                                type="radio"
                                name="radio"
                                id="Agensi_Luar"
                                checked
                            />
                            <span class="checkmark"></span>
                            </label>
                      </div>
                    </div>
                  </div>
                  <div  class="interface_tab_content_container">
                    <div class="interface_tab_content">
                        <form class="login_interface_modal_form" action="" method="post" id="register_agensi_user_form" name="myform">
                        <input type="hidden" name="kategori" value="" id="kategori">  
                        <div class="input_container">
                            <label
                              for="Nama_Penuh"
                              class="col-form-label form_label"
                              >Nama Penuh</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="name" name="nama"
                              />
                              <span class="error" id="error_nama"></span>
                            </div>
                          </div>
  
                          <div class="input_container">
                            <label
                              for="Kad_Pengenalan"
                              class="col-form-label form_label"
                              >No. Kad Pengenalan</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Kad_Pengenalan" name="no_kod_penganalan"
                              />
                              <span class="error" id="error_no_kod_penganalan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Email_Rasmi"
                              class="col-form-label form_label"
                              >Email Rasmi</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Email_Rasmi" name="email"
                              />
                              <span class="error" id="error_email"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >No. Telefon</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="No_Telefon" name="no_telefon"
                              />
                              <span class="error" id="error_telefon"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >Jawatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="jawatan" name="jawatan"
                              >
                              </select>
                              <span class="error" id="error_jawatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Gred" class="col-form-label form_label">Gred</label>
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="gred" id="gred"
                              >
                              </select>
                              <span class="error" id="error_gred"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kementerian"
                              class="col-form-label form_label"
                              >Kementerian</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="Kementerian"
                              >
                                <option value="1">Kementerian Sumber Asli, Alam Sekitar dan Perubahan Iklim (NRECC)</option>
                                <option value="2">Kementerian Tenaga dan Sumber Asli (KeTSA)</option>
                              </select>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Jabatan" class="col-form-label form_label"
                              >Jabatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="jabatan" id="jabatan"
                              >
                              </select>
                              <span class="error" id="error_jabatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Bahagian"
                              class="col-form-label form_label"
                              >Bahagian</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="bahagian" id="bahagian"
                              >
                              </select>
                              <span class="error" id="error_bahagian"></span>                                   
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Negeri"
                              class="col-form-label form_label"
                              >Negeri</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="negri" id="negeri"
                              >
                              </select>
                              <span class="error" id="error_negeri"></span>                                   
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Daerah"
                              class="col-form-label form_label"
                              >Daerah</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="daerah" id="daerah"
                              >
                              </select>
                              <span class="error" id="error_daerah"></span>                                   
                            </div>
                          </div>
                          <!-- <div class="input_container" id='nonjps_doc'>
                            <div class="file_label d-flex">
                              <label
                                for="Dokumen_Sokongan"
                                class="col-form-label form_label"
                                >Dokumen Sokongan</label
                              >
                              <div class="pop_btn" style="margin-left: 11px;">
                                <button
                                  type="button"
                                  class="btn"
                                  data-container="body"
                                  data-toggle="popover"
                                  data-placement="right"
                                  data-content="Sila muat naik  kad Jabatan"
                                  
                                >
                                  <img src="assets/images/i-icon.png" alt="" />
                                </button>
                              </div>
                            </div>
  
                            <div  class="form_input_file">
                              <input
                                type="file"
                                class="form-control"
                                id="Dokumen_Sokongan"
                              />
                              <button type="button" class="select_file">
                                Muat naik lampiran
                              </button>
                              <p id="err-msg" class="file_size d-none">
                                (Salz fail tidak melebihi 10 mb)
                              </p>
                              <div class="selected_file d-flex">
                                <div id="pdf_img" class="pdf_img">
                                </div>
                                <div class="file_details">
                                  <p id="pdf_name" class="pdf_name"></p>
                                  <button class="d-none" id="pdf_remove">Remove file</button>
                                </div>
                                <p id="pdf_size" class="pdf_size"></p>
                              </div>
                            </div>
                          </div> -->
                          <div class="input_container position-relative" id='nonjps_doc'>
                              <div class="file_label d-flex">
                                <label for="Dokumen_Sokongan" class="col-form-label form_label">Dokumen Sokongan</label>
                                <div class="pop_btn">
                                  <button type="button" class="btn" onclick="myFunction()">
                                    <img src="assets/images/i-icon.png" alt="icon">
                                  </button>
                                </div>
                                <div class="pop_content position-absolute d-none" id="error_dokumen_name">
                                  <p>Sila muat naik <span> Surat Jabatan</span></p>
                                   
                                </div>
                              </div>

                              <div class="form">
                              <div class="yes">
                                <span class="btn_upload">
                                  <input type="file" name="dockument" id="dockument"  class="input-img">
                                  Muat naik lampiran
                                  </span>
                                  <p class="file_size d-none" id="file_size">
                                    (Saiz fail tidak melebihi 4 mb)
                                  </p>
                                  <p class="file_type d-none" id="file_type">
                                    (Jenis fail tidak sah)
                                  </p>
                                  <div class="selected_file d-none" id="selected_file">
                                    <div class="pdf_img">
                                      <img src="assets/images/pdf.png" alt="pdf">
                                    </div>
                                    <div class="file_details">
                                      <p style="font-size:13px;padding-left: 12px;margin-bottom: 0px !IMPORTANT;" id="document_name"></p>
                                      <button type="button" id="remove_pdf">Remove file</button>
                                    </div>
                                    <p class="file_sizes" id="document_size"></p>
                                </div>
                              </div>
                              </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Kod Pengesahan</label
                            >
                            <div class="form_input">
                              <div
                                class="g-recaptcha"
                                data-sitekey={{$site_key}}
                                data-callback="onReturnCallbackRegister"
                                data-action="submit"
                              >
                                Submit
                              </div>
                            </div>
                          </div>
                          <div class="input_container m-0">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Perakuan Pendaftaran</label
                            >
                            <div class="form_input">
                              <div class="form-group form-check form_checker">
                                <input
                                  type="checkbox"
                                  class="form-check-input"
                                  id="exampleCheck1"
                                />
                                <label class="form_check_label" for="exampleCheck1"
                                  ><b>Dengan ini saya MENGAKU bahawa semua maklumat
                                  yang diisikan dalam permohonan ini adalah SAHIH
                                  dan BENAR.</b></label
                                >
                              </div>
                            </div>
                          </div>
                          <div class="form_btn_container">
                            <button type="button" id="close_button">KEMBALI</button><button type="button" id="submit_registration">DAFTAR</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="sucess_modal_register"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content sucess_modal_content" style="padding: 15% 3%;border-radius: 10px;">
              <div class="modal-body sucess_modal_body">
                <h3 style="padding-left: 77px;">
                  Akaun telah didaftar <br />
                </h3>
                <div class="text-center">
                  <button data-dismiss="modal" id="tutup" style="background-color: #1400ff;color: white;border-radius: 20px;padding-top: 2px;}">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="assets/images/coolicon.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
      <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="login_sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered login_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content login_sucess_modal_content">
              <div class="modal-body login_sucess_modal_body">
                <h3>Akaun telah didaftar</h3>
                <div class="text-center">
                  <button data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="assets/images/coolicon.png" alt="coolicon" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Email sent success Modal --}}

    <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content sucess_modal_content">
              <div class="modal-body sucess_modal_body">
                <h3>
                  Kata laluan berjaya dihantar ke <br />
                  email anda
                </h3>
                <div class="text-center">
                  <button id="mail_successBtn" data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img class="img-responsive" height="95px" src="assets/images/coolicon.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-------------------------------------------------script sections starts --------------------------------------->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
      // $("#log_masuk_modal").modal("show");
      // // $("#Forget_modal").modal("show");
      // // $("#sucess_modal").modal("show");
      // $("#Login_interface_modal").modal("show");

      function onSubmit(token) {
        document.getElementById("penguna_jps_form").submit();
      }
      $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
      });
    </script>

    <script>
      $('#Pengguna_JPS').click(function(){ 
        $('#nonjps_doc').hide();
        document.getElementById("kategori").value=1;
      });

      $('#Agensi_Luar').click(function(){
        $('#nonjps_doc').show();
        document.getElementById("kategori").value=2;
      });

      // $('#exampleCheck1').click(function(){ console.log(this.value);
      //   const checkbox = document.getElementById('exampleCheck1'); console.log(checkbox);
      //   checkbox.checked = !checkbox.checked;
      //   document.querySelector('#submit_registration').disabled = false;
      // });

    </script>
     <script>
    $("#submit_registration").click(function(){ //alert('heeeee');

      if(!document.myform.nama.value)  { 
			document.getElementById("error_nama").innerHTML="medan nama diperlukan"; 
			document.getElementById("name").focus();
			return false; 
		}
		else{
			document.getElementById("error_nama").innerHTML=""; }

      if(!document.myform.no_kod_penganalan.value)  
      { 
			  document.getElementById("error_no_kod_penganalan").innerHTML="medan no kad penganalan diperlukan"; 
			  document.getElementById("Kad_Pengenalan").focus();
			  return false; 
      }
      else if(isNaN(document.myform.no_kod_penganalan.value))
      {
        document.getElementById("error_no_kod_penganalan").innerHTML="sila tambah nombor sahaja"; 
			  document.getElementById("no_kod_penganalan").focus();
			  return false;
      } 
      else if(document.myform.no_kod_penganalan.value.length<12) 
      {
        document.getElementById("error_no_kod_penganalan").innerHTML="maksimum 12 digit diperlukan"; 
			  document.getElementById("no_kod_penganalan").focus();
			  return false;
		  }
      else 
      { document.getElementById("error_no_kod_penganalan").innerHTML=""; }

		if(!document.myform.email.value)  { 
			document.getElementById("error_email").innerHTML="medan emel rasmi diperlukan"; 
			document.getElementById("Email_Rasmi").focus();
			return false; 
		}else{ document.getElementById("error_email").innerHTML="";}
    if(!document.myform.no_telefon.value)  { 
			document.getElementById("error_telefon").innerHTML="medan no telefon diperlukan"; 
			document.getElementById("No_Telefon").focus();
			return false; 
		}else{document.getElementById("error_telefon").innerHTML="";}
    if(!document.myform.jawatan.value)  { 
			document.getElementById("error_jawatan").innerHTML="sila pilih jawatan"; 
			document.getElementById("jawatan").focus();
			return false; 
		}else{document.getElementById("error_jawatan").innerHTML="";}
    if(!document.myform.gred.value)  { 
			document.getElementById("error_gred").innerHTML="sila pilih gred"; 
			document.getElementById("gred").focus();
			return false; 
		}else{document.getElementById("error_gred").innerHTML="";}
    if(!document.myform.jabatan.value)  { 
			document.getElementById("error_jabatan").innerHTML="sila pilih jabatan"; 
			document.getElementById("jabatan").focus();
			return false; 
		}else{document.getElementById("error_jabatan").innerHTML="";}
    if(!document.myform.bahagian.value)  { 
			document.getElementById("error_bahagian").innerHTML="sila pilih bahagian"; 
			document.getElementById("bahagian").focus();
			return false; 
		}else{document.getElementById("error_bahagian").innerHTML="";}
    if(!document.myform.negeri.value)  { 
			document.getElementById("error_negeri").innerHTML="sila pilih negeri"; 
			document.getElementById("negeri").focus();
			return false; 
		}else{document.getElementById("error_negeri").innerHTML="";}

      if(!document.myform.daerah.value)  { 
			document.getElementById("error_daerah").innerHTML="sila pilih daerah"; 
			document.getElementById("daerah").focus();
			return false; 
		}else{document.getElementById("error_daerah").innerHTML="";}

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
		$.ajaxSetup({
			headers: {
				   "Content-Type": "application/json",
				   "Authorization": api_token,
				   }
	   });
     var newText = document.getElementsByClassName('error'); console.log(newText.length);
     for($i=0;$i<newText.length;$i++)
      {
         console.log(newText[$i].innerHTML="");
      }
      console.log(document.myform.dockument.files);
      var formData = new FormData();
      formData.append('nama', document.myform.nama.value);
      formData.append('no_kod_penganalan', document.myform.no_kod_penganalan.value);
      formData.append('email', document.myform.email.value);
      formData.append('kategori', document.myform.kategori.value);
      formData.append('no_telefon', document.myform.no_telefon.value);
      formData.append('jawatan', document.myform.jawatan.value);
      formData.append('jabatan', document.myform.jabatan.value);
      formData.append('gred', document.myform.gred.value);
      // formData.append('kementerian', document.myform.kementerian.value);
      formData.append('bahagian', document.myform.bahagian.value);
      formData.append('negeri', document.myform.negeri.value);
      formData.append('daerah', document.myform.daerah.value);
      formData.append('catatan', "catatan");
      formData.append('documents', document.myform.dockument.files[0]);

      console.log(formData);

      axios({
        method: "post",
        url: api_url+"api/temp/user/create",
        data: formData,
      })
			.then(function (response) {
			//handle success
			console.log(response.data.code);
			if(response.data.code === '200') {	
            $("#sucess_modal_register").modal('show');
            $("#register_form").hide();
			}else {				
				if(response.data.code === '422') {					
					Object.keys(response.data.data).forEach(key => {						
						document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
					  });					
				}else {					
					alert('There was an error submitting data')
				}	
			}			
			})
			.catch(function (response) {
				//handle error
				console.log(response);
				alert("There was an error submitting data");
			});


    });

    $('#tutup').click(function(){
        $("#sucess_modal_register").modal('hide');
        window.location.href = '/login';

    });

    $('#close_button').click(function(){
        window.location.href = '/login';

    });

    function myFunction() {
      var x = document.getElementById("error_dokumen_name").classList[2]; console.log(x);
      if (x === "d-none") { console.log("found");
        document.getElementById('error_dokumen_name').classList.remove("d-none");
      } else {  console.log(" not found");
        document.getElementById('error_dokumen_name').classList.add("d-none");
      }
    }

    
    function readURL(input, imgControlName) { console.log(input);
      if (input.files && input.files[0]) {
        var reader = new FileReader(); console.log(reader);
        reader.onload = function(e) {
          var iurl = e.target.result.substr(e.target.result.indexOf(",") + 1, e.target.result.length); console.log(iurl);
          $(imgControlName).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    $("#remove_pdf").on('click', function(){ 
          document.getElementById("dockument").value='';
          document.getElementById("document_size").innerHTML = '';
          document.getElementById("document_name").innerHTML = '';
          document.getElementById('selected_file').classList.remove("d-flex");
          document.getElementById('selected_file').classList.add("d-none");
    });
    $("#dockument").on('change', function(){ console.log()
      $new_file = document.myform.dockument.files[0];  console.log($new_file);
      if($new_file.size>4000000)
      {
           document.getElementById("dockument").value='';
           document.getElementById('file_size').classList.remove("d-none");
           document.getElementById('selected_file').classList.remove("d-flex");
           document.getElementById('selected_file').classList.add("d-none");
           return false;
      }
    var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
		
		if(allowedExtensions.indexOf($new_file.type) == -1)  
    {
          document.getElementById("dockument").value=''; 
           document.getElementById('file_size').classList.add("d-none");
           document.getElementById('file_type').classList.remove("d-none");
           document.getElementById('selected_file').classList.remove("d-flex");
           document.getElementById('selected_file').classList.add("d-none");
           return false;
    }
      document.getElementById('error_dokumen_name').classList.add("d-none");
      document.getElementById('file_size').classList.add("d-none");
      document.getElementById('file_type').classList.add("d-none");
      document.getElementById('selected_file').classList.remove("d-none");
      document.getElementById('selected_file').classList.add("d-flex");
      var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
      fSize = $new_file.size; i=0;while(fSize>900){fSize/=1024;i++;}
      docu_size = (Math.round(fSize*100)/100)+' '+fSExt[i]; 
        document.getElementById("document_size").innerHTML = docu_size;
        document.getElementById("document_name").innerHTML = $new_file.name;
    });
  </script>

    <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Le_V_siAAAAAI7AEeMNmqhYrC5deixFB63Kmhmb"></script> -->
  </body>
</html>
