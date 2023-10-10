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
  $("#exampleCheck1").prop('disabled', true);       
  document.querySelector('#submit_registration').disabled = true;
  const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const app_url = document.getElementById("app_url").value;  console.log(app_url);
  //const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
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
            // console.log(user_id)
            // console.log(user_email)
            // $.ajax({
            //     type: "POST",
            //     url: api_url+"api/finduser",
            //     contentType: "application/json",
            //     dataType: "json",
            //     data: JSON.stringify({
            //         no_id: user_id,
            //         user_email: user_email,
            //     }),
            //     success: function(response) {
            //         console.log(response);
            //     },
            //     error: function(response) {
            //         console.log(response);
            //     }
            //   });
        // var formData = new FormData();
        // var name = $("#email").val();
        // console.log(name)
        // //formData.append('email', document.submitForgot.email.value);
        // axios({
        // 	method: "post",
        // 	url: api_url+"forgot-password",
        // 	data: formData,
        // 	headers: { "Content-Type": "application/json","Authorization": api_token },
        // })
        // .then(function (response) {
        // 	//handle success
        // 	console.log(response.data.code);				
        // 	})
        // 	.catch(function (response) {
        // 		//handle error
        // 		console.log(response);
        // 		alert("There was an error submitting data");
        // 	});
      // console.log('modal submitted')

        // $('#submitForgot').submit();
    });

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });
	// var dropDown = document.getElementById("kementerian");
    // $.ajax({
    //     type: "GET",
    //     url: api_url+"GetKementerian/",
    //     dataType: 'json',
    //     success: function (result) { console.log(result)
    //         if (result) {
    //             $.each(result, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.Name;
	// 				el.value = opt;
	// 				dropDown.appendChild(el);
    //             })
    //         }
    //         else {
    //             $.Notification.error(result.Message);
    //         }
    //     }
    // });

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

      // if (btn.classList.contains("active")) {
      //   console.log(i);
      //   let ind = i;
      //   login_tab_btn.forEach((btn) => {
      //     btn.classList.remove("active");
      //   });
      //   if (ind >= 0) {
      //     btn.addEventListener("mouseout", () => {
      //       btn[ind].classList.add("active");
      //     });
      //   }
      // }
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

<!DOCTYPE html>
<html lang="en">
    <input type="hidden" id="token" value={{env('TOKEN')}}>
    <input type="hidden" id="api_url" value={{env('API_URL')}}>
    <input type="hidden" id="app_url" value={{env('APP_URL')}}>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- <title>{{ $data['title'] }}</title> --}}
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="main/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="main/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="main/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="main/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="main/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="main/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="main/assets/css/login-register.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="main/assets/css/main.css" rel="stylesheet">


    <style>
        .col-xs-5ths,
        .col-sm-5ths,
        .col-md-5ths,
        .col-lg-5ths {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-5ths {
            width: 20%;
            float: left;
        }

        @media (min-width: 768px) {
            .col-sm-5ths {
                width: 20%;
                float: left;
            }
        }

        @media (min-width: 992px) {
            .col-md-5ths {
                width: 20%;
                float: left;
            }
        }

        @media (min-width: 1200px) {
            .col-lg-5ths {
                width: 20%;
                float: left;
            }
        }

        .jump {
            margin-top: -86px;
            padding-top: 120px;
        }
    </style>
    <!-- =======================================================
  * Template Name: UpConstruction - v1.0.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        {{-- <div class="container-fluid container-xl d-flex align-items-center justify-content-between"
            style="background-color:#D6EFF6;padding:10px;"> --}}
            <div class="container-fluid d-flex align-items-center justify-content-between"
                style="background-color:#ffffff;padding:10px;">

                <a href="/" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    {{-- <!-- <h1>{{ $data['header'] }}<span>.</span></h1> --> --}}
                    <img src="main/images/jata.png" height="80px">
                    <img src="main/images/npisLogo.png" height="50px" style="padding-right:20px;">
                    <img src="main/images/logo-npis.png" height="100px">
                </a>

                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
                <nav id="navbar" class="navbar" style="padding-right: 30px;">
                    <ul>
                        <li class="list"><a href="#" class="active">Utama</a></li>
                        <li class="list"><a href="#about">Pengenalan</a></li>
                        <li class="list"><a href="#informasi_terikini">Informasi Terkini</a></li>
                        <li class="list"><a href="#services">Modul NPIS</a></li>
                        <li class="list"><a href="#contact">Hubungi Kami</a></li>
                        <li class="list"><a data-toggle="modal" data-target="#log_masuk_modal" style="cursor: pointer">Log Masuk</a></li>
                    </ul>
                </nav><!-- .navbar -->

            </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">NATIONAL PROJECT INFORMATION SYSTEM</h2>
                        {{-- <h2 data-aos="fade-down">{{ $data['title'] }}</h2> --}}
                        {{-- <p data-aos="fade-up">{{ $data['title'] }}</p> --}}
                        {{-- <a data-aos="fade-up" data-aos-delay="200" href="#main"
                            class="btn-get-started">Selanjutnya</a> --}}
                        <br />
                        <a data-aos="fade-up" data-aos-delay="200" href="#main" class="btn-get-started" style=""><i
                                class="fa fa-angle-double-down"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <video playsinline autoplay muted loop id="bgvid" style="width:100%;height:100%;object-fit: cover;"
                class="carousel-item active">
                <source src="main/assets/landing.mp4" type="video/mp4">
            </video>

        </div>

    </section><!-- End Hero Section -->
    <main id="main">
        {{-- <section id="about" class="about section-bg"> --}}

            {{-- <section id="about" class="about section-bg jump" style="background-image: url(images/1.jpg);background-position: center;background-size: cover;background-attachment: fixed;height:800px;"> --}}
            <section id="about" class="about section-bg" style="margin-top: -50px;padding-top:50px;">
                <video playsinline autoplay muted loop id="bgvid" style="position:absolute;top 0;left 0;display:block;width:100%;height:70%;object-fit:cover"
                    class="carousel-item active">
                    <source src="main/assets/waterfall_static.MP4" type="video/mp4">
                </video>
                <div class="container" data-aos="fade-up">

                    <div class="row position-relative">

                        {{-- <div class="col-lg-7 about-img" style="background-image: url(images/4.jpg);"></div> --}}

                        <div class="col-lg-12">
                            <h1 style="color:white; padding-top:150px;">PENGENALAN</h1><br />
                            {{-- <h2>PENGENALAN</h2> --}}
                            <div class="our-story2"
                                style="background-color:rgba(255,255,255,0.8); border-radius:5px;box-shadow: 2px 1px 4px rgb(0, 0, 0);padding:50px;margin:auto;">
                                <p style="text-align: justify;color:black;font-size:25px;">
                                    {{-- NATIONAL PROJECT INFORMATION SYSTEM (NPIS) digunakan
                                    untuk mengurus portfolio projek yang
                                    masih aktif, merekod status projek, dan berkongsi status terkini projek dengan
                                    pihak berkepentingan dalaman dan luaran. Ianya membolehkan pengurusan pemantauan
                                    portfolio projek yang besar dapat dijalankan dengan cekap dan membolehkan
                                    penyampaian maklumat kemajuan projek dengan lebih efektif. --}}

                                    'National Project Information System atau dikenali sebagai NPIS, berupaya untuk
                                    memantau dan merekod status kemajuan projek secara bersepadu,
                                    menganalisis maklumat-maklumat perincian projek dengan tepat ketika proses analisis
                                    berlangsung.'


                                    {{-- Sistem NPIS mula dibangunkan sejak tahun 2022 dan telah digunapakai pada tahun
                                    2023. --}}

                                </p>

                                <!--<div class="watch-video d-flex align-items-center position-relative">
                <i class="bi bi-play-circle"></i>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link">Watch Video</a>
              </div> -->
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <style>
/*--------------------------------------------------------------
# informasi_terikini
--------------------------------------------------------------*/
                .informasi_terikini .nav-tabs {
                    border: 0;
                }

                .informasi_terikini .nav-link {
                    border: 0;
                    padding: 20px;
                    color: #555555;
                    border-radius: 0;
                    border-left: 5px solid #fff;
                    cursor: pointer;
                }

                .informasi_terikini .nav-link h4 {
                    font-size: 18px;
                    font-weight: 600;
                    transition: 0.3s;
                }

                .informasi_terikini .nav-link p {
                    font-size: 14px;
                    margin-bottom: 0;
                }

                .informasi_terikini .nav-link:hover h4 {
                    color: #3fbbc0;
                }

                .informasi_terikini .nav-link.active {
                    background: #f7fcfc;
                    border-color: #3fbbc0;
                }

                .informasi_terikini .nav-link.active h4 {
                    color: #3fbbc0;
                }

                .informasi_terikini .tab-pane.active {
                    -webkit-animation: slide-down 0.5s ease-out;
                    animation: slide-down 0.5s ease-out;
                }

                .informasi_terikini .tab-pane img {
                    float: left;
                    max-width: 300px;
                    padding: 0 15px 15px 0;
                }

                @media (max-width: 768px) {
                    .informasi_terikini .tab-pane img {
                        float: none;
                        padding: 0 0 15px 0;
                        max-width: 100%;
                    }
                }

                .informasi_terikini .tab-pane h3 {
                    font-size: 26px;
                    font-weight: 600;
                    margin-bottom: 20px;
                    color: #3fbbc0;
                }

                .informasi_terikini .tab-pane p {
                    color: #777777;
                }

                .informasi_terikini .tab-pane p:last-child {
                    margin-bottom: 0;
                }

                @-webkit-keyframes slide-down {
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }

                @keyframes slide-down {
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }
            </style>

            <section id="informasi_terikini" class="informasi_terikini jump">
                <div class="container" data-aos="fade-up">
                    <br />
                    <br />
                    <div class="section-header">
                        <h2>INFORMASI TERKINI</h2>
                        <p>Informasi terkini/ pemberitahuan berita terkini.</p>
                    </div>

                    {{-- <div class="section-title">
                        <h1>INFORMASI TERKINI</h1>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div> --}}

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                        <h4>Saliran</h4>
                                        <p><b>3 Mei 2022</b> - Penambahbaikan paip saliran air di Sungai Tamar di
                                            Kelantan.</p>
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                        <h4>Binaan</h4>
                                        <p><b>27 Jun 2022</b> - Pembinaan Tambak baru bagi Kampung Sungai Gadut telah di
                                            bina dalam masa 6 bulan</p>
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                        <h4>Tanam Semula</h4>
                                        <p><b>3 Mei 2022</b> - Penanaman anak pokok bakau di pahang bagi projek CINTAKAN
                                            BUMI.</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                        <h4>Pediatrics</h4>
                                        <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab-1">
                                    <h3>Saliran</h3>
                                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                        parde sonata raqer a videna mareta paulona marka</p>
                                    <img src="main/images/1.JPG" alt="" class="img-fluid">
                                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                        eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                        minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                        similique accusamus nostrum rem vero</p>
                                </div>
                                <div class="tab-pane" id="tab-2">
                                    <h3>Binaan</h3>
                                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                        parde sonata raqer a videna mareta paulona marka</p>
                                    <img src="main/images/2.JPG" alt="" class="img-fluid">
                                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                        eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                        minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                        similique accusamus nostrum rem vero</p>
                                </div>
                                <div class="tab-pane" id="tab-3">
                                    <h3>Tanam Semula</h3>
                                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                        parde sonata raqer a videna mareta paulona marka</p>
                                    <img src="main/images/3.JPG" alt="" class="img-fluid">
                                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                        eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                        minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                        similique accusamus nostrum rem vero</p>
                                </div>
                                <div class="tab-pane" id="tab-4">
                                    <h3>Pediatrics</h3>
                                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                        parde sonata raqer a videna mareta paulona marka</p>
                                    <img src="main/images/4.JPG" alt="" class="img-fluid">
                                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                        eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                        minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                        similique accusamus nostrum rem vero</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End Departments Section -->


            <style>
                .collapsible {
                    border-radius: 20px 20px 20px 20px;
                    background: #6892A6;
                    color: white;
                    /* font-size: 15px; */
                    padding: 15px;
                    width: 210px;
                    height: 250px;
                    text-align: center;
                    outline: none;
                    box-shadow: 2px 1px 4px grey;
                }

                .active2,
                .collapsible:hover {
                    background-color: #5a889e;
                    border-radius: 20px 20px 0px 0px;

                }

                .content2 {
                    padding: 0 18px;
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 0.4s ease-out;
                    background-color: hsl(0, 0%, 100%);
                    width: 210px;
                    border-radius: 0px 0px 20px 20px;
                    border-left: 1px solid rgb(87, 87, 87);
                    border-right: 1px solid rgb(87, 87, 87);
                    box-shadow: 2px 1px 4px grey;
                }

                .icon {
                    font-size: 4em;
                }

                /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
                .flip-card {
                    background-color: transparent;
                    width: 210px;
                    height: 250px;
                    border: 1px solid #f1f1f1;
                    perspective: 1000px;
                    /* Remove this if you don't want the 3D effect */
                    border-radius: 20px 20px 20px 20px;
                }

                /* This container is needed to position the front and back side */
                .flip-card-inner {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    text-align: center;
                    transition: transform 0.8s;
                    transform-style: preserve-3d;
                    border-radius: 20px 20px 20px 20px;
                    box-shadow: 2px 1px 4px grey;
                }

                /* Do an horizontal flip when you move the mouse over the flip box container */
                .flip-card:hover .flip-card-inner {
                    transform: rotateY(180deg);
                }

                /* Position the front and back side */
                .flip-card-front,
                .flip-card-back {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    -webkit-backface-visibility: hidden;
                    /* Safari */
                    backface-visibility: hidden;
                    border-radius: 20px 20px 20px 20px;
                }

                /* Style the front side (fallback if image is missing) */
                .flip-card-front {
                    background-color: #76A3D1;
                    /* background-color: #0C5A90; */
                    color: #fff;
                    padding: 15px;
                    font-size: 16px;
                }

                /* Style the back side */
                .flip-card-back {
                    background-color: #092c8b;
                    color: rgb(255, 255, 255);
                    transform: rotateY(180deg);
                    padding: 13px;
                }
            </style>
            <!-- ======= Module Sectionn ======= -->
            <section id="services1" class="services section-bg">
                <div class="container jump" data-aos="fade-up" id="services">

                    <div class="section-header">
                        <h2>Modul NPIS</h2>
                        <p>Senarai Modul yang terkandung di dalam NPIS</p>
                    </div>

                    <div class="row gy-4">

                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-alt"></i>
                                    </div>
                                    <h4>PERMOHONAN PROJEK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-alt"></i>
                                            </div>
                                            <h4 style="font-size:18px;">PERMOHONAN PROJEK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                    <h4>MODUL PEMANTAUAN & PENILAIAN PROJEK JPS</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                            <h4 style="font-size:18px;">PEMANTAUAN & PENILAIAN PROJEK JPS</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <h4>PEMANTAUAN & PENILAIAN PROJEK JABATAN BUKAN TEKNIK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                            <h4 style="font-size:18px;">PEMANTAUAN & PENILAIAN PROJEK JABATAN BUKAN
                                                TEKNIK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-invoice"></i>
                                    </div>
                                    <h4>KONTRAK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-invoice"></i>
                                            </div>
                                            <h4 style="font-size:18px;">KONTRAK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <h4>PERUNDING</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <h4 style="font-size:18px;">PERUNDING</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-search-dollar"></i>
                                    </div>
                                    <h4>VALUE MANAGEMENT (VM)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-search-dollar"></i>
                                            </div>
                                            <h4 style="font-size:18px;">VALUE MANAGEMENT (VM)</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-pen"></i>
                                    </div>
                                    <h4>NOTICE OF CHANGE (NOC)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </div>
                                            <h4 style="font-size:18px;">NOTICE OF CHANGE (NOC)</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-signature"></i>
                                    </div>
                                    <h4>PERUNTUKAN DI LUAR ROLLING PLAN (RP)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-signature"></i>
                                            </div>
                                            <h4 style="font-size:18px;">PERMOHONAN PERUNTUKAN DI LUAR ROLLING PLAN (RP)
                                            </h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <h4>PENJANAAN LAPORAN</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-chart-pie"></i>
                                            </div>
                                            <h4 style="font-size:18px;">PENJANAAN LAPORAN</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-earth-asia"></i>
                                    </div>
                                    <h4>GEO-BOARD</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="icon">
                                                <i class="fa-solid fa-earth-asia"></i>
                                            </div>
                                            <h4 style="font-size:18px;">GEO-BOARD</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->



                    </div>

                </div>
            </section>
            <!-- End Recent Blog Posts Section -->


            {{-- <button type="button" class="collapsible">
                <div class="icon">
                    <i class="fa-solid fa-file-alt"></i>
                </div>Open Collapsible
            </button> --}}


            <br />

            <script>
                var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("mouseover", function() {
            this.classList.toggle("active2");
            var content = this.nextElementSibling;
            //   content.style.display = "block";
            content.style.maxHeight = content.scrollHeight + "px";
            content.style.borderBottom = "1px solid rgb(87, 87, 87)";
          });
          coll[i].addEventListener("mouseout", function() {
            this.classList.toggle("active2");
            var content = this.nextElementSibling;
            // content.style.display = "none";
            content.style.maxHeight = null;
            content.style.borderBottom = "none";
          });
        }
            </script>


            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact jump">
                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-map"></i>
                                <h3>Alamat</h3>
                                <p>JABATAN PENGAIRAN & SALIRAN (JPS)<br />50626, Jalan Sultan Salahuddin, <br />50480
                                    Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>

                                {{-- <h3>Email</h3>
                                <p>npis@water.com</p> --}}
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-6 col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p>npis@water.com</p>
                                <br />
                                <br />
                            </div>
                        </div><!-- End Info Item -->

                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-telephone"></i>
                                <h3>Telefon</h3>
                                <p> +(60) 03-2698 1711</p>
                            </div>
                        </div><!-- End Info Item --> --}}

                    </div>

                    <div class="row gy-4 mt-1">

                        <div class="col-lg-12 ">
                            {{-- <iframe
                                src="https://maps.google.com/maps?q=jps%20hq&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                            --}}
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1991.8789874149365!2d101.68261961969934!3d3.1583826891673934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4849d1875ab9%3A0x26e6abc28ab0ec30!2sDepartment%20of%20Irrigation%20and%20Drainage!5e0!3m2!1sen!2smy!4v1665629057539!5m2!1sen!2smy"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div><!-- End Google Maps -->

                        {{-- <div class="col-lg-6">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row gy-4">
                                    <div class="col-lg-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                                            required>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subjek" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Mesej"
                                        required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Hantar Maklumbalas</button></div>
                            </form>
                        </div><!-- End Contact Form --> --}}

                    </div>

                </div>
            </section><!-- End Contact Section -->
    </main><!-- End #main -->
    <!-- MODAL -->
    <style>
        .btn-login-pengguna {
            background-color: #979797;
            /* Green */
            border: none;
            border-radius: 20px;
            color: white;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 5px;
        }

        .aktif {
            background-color: #0A1F5D;
        }

        .btn-login-pengguna:hover {
            background-color: #021c6b;
            /* Green */
        }

        .container-btn-login {
            text-align: center;
            margin-bottom: 15px;
        }

        .close {
            border: none;
            display: inline-block;
            padding: 8px 16px;
            vertical-align: middle;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            background-color: inherit;
            text-align: center;
            cursor: pointer;
            white-space: nowrap
        }

        .close:hover {
            color: #000 !important;
            background-color: #ccc !important;
        }

        .input-login {
            display: block !important;
            width: 100%;
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: #2e2e2e !important;
            background-color: #fff !important;
            background-clip: padding-box !important;
            border: 1px solid #5e5e5e !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
            border-radius: 0.375rem !important;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
            margin-bottom: 15px !important;
        }

        #togglePassword {
            cursor: pointer;
            display: inline-block;
        }

        .nav-link {
            color: rgb(70, 70, 70)
        }

        .nav-link:hover {
            color: rgb(32, 32, 32)
        }
    </style>
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
<section class="p-0">
  <div class="forget_modal" >
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
<section class="p-0">
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
  <section id="register_form" class="p-0">
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
  <section class="p-0">
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

<section class="p-0">
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
    <style>
        .hitcounter-text {
            border-style: solid;
            border-color: #fff;
            border-radius: 10px;
            background: #fff;
            color: #000;
            padding: 3px;
        }
    </style>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 footer-links">
                        <p>Bilangan Pelawat : <span class="hitcounter-text">1000</span></p>
                    </div>
                    <div class="col-lg-3 col-md-3 footer-links">
                        <p>Bilangan Pelawat Hari Ini : <span class="hitcounter-text">10</span></p>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-3 footer-links">
                        <p>Bilangan Pelawat Bulan Ini : <span class="hitcounter-text">100</span></p>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-3 footer-links">
                        <p>Bilangan Pelawat Tahun ini : <span class="hitcounter-text">500</span></p>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <center>


                        <div class="col-lg-2 col-md-3 footer-links">
                            <h4>MyProjek, ICU JPM</h4>
                            <p><a href="#"><img src="main//images/myprojek.png" height="50px"></a></p>
                        </div><!-- End footer links column-->
                    </center>
                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">

                    &copy; Hak Cipta Terpelihara 2023 <strong><span>© Jabatan Pengairan dan Saliran
                            (JPS)</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                    Paparan terbaik menggunakan Mozilla Firefox, Chrome dan Microsoft Edge ke atas dengan Resolusi 1920
                    x 1080
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="main/assets/vendor/aos/aos.js"></script>
    <script src="main/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="main/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="main/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="main/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="main/assets/vendor/php-email-form/validate.js"></script>
    <script src="main/assets/js/login-register.js" type="text/javascript"></script>
    <script src="main/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Template Main JS File -->
    <script src="main/assets/js/main.js"></script>
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
        window.location.href = '/';

    });

    $('#close_button').click(function(){
        window.location.href = '/';

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

</body>

<div id="one" class="collapse">
    <div class="accordion-inner">
        HERE IS THE STUFF
    </div>
</div>
<script>
    $(document).ready(function(){
            $( ".accordion-toggle" ).mouseover(function(){
                $( ".accordion-toggle" ).trigger( "click" );
                // If creating multiple accordion items, use the below to prevent all other
                // items with the class "accordion-toggle" triggering a click event
                // $(this).trigger("click");
            });

            // const togglePassword = document.querySelector("#togglePassword");
            // const password = document.querySelector("#password");

            $("#togglePassword").click(function() {

                var x = document.getElementById("pwd");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }


            this.classList.toggle("bi-eye");
            });


            var refreshButton = document.querySelector(".refresh-captcha");
            refreshButton.onclick = function() {
                document.querySelector(".captcha-image").src = '/captcha?test=' + Date.now();
            }

            $(".list").click(function handleClick(event){
                let lists = document.querySelectorAll('.list a');
                lists.forEach((item) => item.classList.remove('active'));
                event.target.classList.add('active');
            });

        });


</script>

</html>
