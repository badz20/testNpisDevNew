<script src="assets/js/jquery.min.js"></script>
@include('main.style')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@php
$site_key= config('services.googleCaptcha.site_key');
 $secret_key=config('services.googleCaptcha.secret_key');
@endphp



{{-- @endpush --}}

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


    
    <!-- =======================================================
  * Template Name: UpConstruction - v1.0.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="monitor">


    <!-- ======= Header ======= -->
    <header id="header" class="header">
        {{-- <div class="container-fluid container-xl d-flex align-items-center justify-content-between"
            style="background-color:#D6EFF6;padding:10px;"> --}}
            <div class="wrap flex container-fluid d-flex align-items-center justify-content-between"
                style="background-color:#ffffff;padding:10px;">
                <div class="icon-bar flex"><img src="{{ asset('dashboard/assets/images/menu.png') }}" alt="menu" /></div>
                <a href="/" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    {{-- <!-- <h1>{{ $data['header'] }}<span>.</span></h1> --> --}}
                    <div id="logo_source" class="d-flex">
                      
                    </div>                      
                    <img id="logo1" src="/images/jata.png" height="40px" style="padding-left:10px; padding-right:18px">
                    <img id="logo2" src="/images/npisLogo.png" height="40px">
                    <img id="logo3" src="/images/logo-npis.png" height="40px" style="padding-left:18px">
                </a>

                {{-- <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i> --}}
                {{-- <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i> --}}
                <nav id="navbar" class="navbar" style="padding-right: 30px;">
                    <ul>
                      <button type="button" class="close-nav close">
                        <i class="mdi mdi-window-close"></i>
                      </button>
                      <li class="list"><a href="#" class="active" id="utama_link">Utama</a></li>
                      <li class="list"><a href="#about" id="about_link">Pengenalan</a></li>
                      <li class="list"><a href="#informasi_terikini" id="informasi_link">Informasi Terkini</a></li>
                      <li class="list"><a href="#services" id="modul_link">Modul NPIS</a></li>
                      <li class="list"><a href="#contact" id="hubungi_link">Hubungi Kami</a></li>
                      <li class="list"><a data-toggle="modal" data-target="#log_masuk_modal" style="cursor: pointer">Log Masuk</a></li>
                    </ul>
                </nav><!-- .navbar -->

            </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <section id="hero" class="hero">
        <div id="videoContent" class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                      <h2 data-aos="fade-down" class="" id="main_header" style="font-size:7vmin;">NATIONAL PROJECT INFORMATION SYSTEM </h2>
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
            <div class="margin_responsive" style="margin-left:-250px;">
              <input type="text" class="searchIn" id="searchBar" name="searchQuery" Placeholder="       Search"  style="background-color: white;border: px solid white;border: white; margin-right: 8px;margin-top: 20%;color:#000;"/>
            </div>
            <div class="margin_responsive d-none" style="margin-left:-185px;margin-top:7%" id="src_result">
              <button type="button" style="color:red; background-color:white; margin-right: 8px;"> Tiada data dijumpai</button>
            </div>
        </div>


        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <video playsinline autoplay muted loop id="bgvid" style="width:100%;height:100%;object-fit: cover;"
                class="active">
                <source src="main/assets/landing.mp4" type="video/mp4">
            </video>
            
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
          </ol>
          <div class="carousel-inner">
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            
            <span class="carousel-control-prev-icon" aria-hidden="true">
              <
            </span>
            <span class="sr-only">Previous</span>
            
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
              >
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        

    </section><!-- End Hero Section -->
    <div id="newsbar" style="position: relative;top: -140px; margin-bottom:10px">
      <div class="d-flex justify-content-between align-items-center breaking-news ">
          <marquee class="news-scroll bg-white" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <label id="newslabel" class="text-dark h5 mt-2" style="font-size: 1.2rem; font-weight: 600; "></label></marquee>
      </div>
  </div>
    
    <main id="main">
        {{-- <section id="about" class="about section-bg"> --}}

            {{-- <section id="about" class="about section-bg jump" style="background-image: url(images/1.jpg);background-position: center;background-size: cover;background-attachment: fixed;height:800px;"> --}}
            <section id="about" class="about section-bg" style="margin-top: -200px;padding-top:50px; height:calc(100vh - 50px);">
                <video playsinline autoplay muted loop id="peng_bgvid" style="position:absolute;top 0;left 0;display:block;width:100%;height:calc(100vh - 50px);object-fit:cover"
                    class="carousel-item active">
                    <source src="main/assets/waterfall_static.MP4" type="video/mp4">
                </video>
                {{-- <img id="peng_bgimg" src="" style="position:absolute;top 0;left 0;display:block;width:100%;height:70%;object-fit:cover"> --}}
                <div class="container" data-aos="fade-up">
                  <div class="row position-relative">
                    {{-- <div class="col-lg-7 about-img" style="background-image: url(images/4.jpg);"></div> --}}
                    <div class="col-lg-12">
                        <h1 style="color:white; padding-top:150px; font-size:1.8rem;" id="peng_header">PENGENALAN</h1><br />
                        {{-- <h2>PENGENALAN</h2> --}}
                        <div class="our-story2"
                            style="background-color:rgba(255,255,255,0.8); border-radius:5px;box-shadow: 2px 1px 4px rgb(0, 0, 0);padding:40px;margin:auto;">
                            <p style="text-align: justify;color:black; font-size:1rem;" id="peng_description">
                                {{-- NATIONAL PROJECT INFORMATION SYSTEM (NPIS) digunakan
                                untuk mengurus portfolio projek yang
                                masih aktif, merekod status projek, dan berkongsi status terkini projek dengan
                                pihak berkepentingan dalaman dan luaran. Ianya membolehkan pengurusan pemantauan
                                portfolio projek yang besar dapat dijalankan dengan cekap dan membolehkan
                                penyampaian maklumat kemajuan projek dengan lebih efektif. --}}

                                <i>National Project Information System</i> atau dikenali sebagai NPIS, berupaya untuk
                                memantau dan merekod status kemajuan projek secara bersepadu,
                                menganalisis maklumat-maklumat perincian projek dengan tepat ketika proses analisis
                                berlangsung.


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
            
            
            <section id="informasi_terikini" class="informasi_terikini jump mt-2">
                <div class="container" data-aos="fade-up">
                  
                    <div class="section-header">
                        <h3 style="font-size: 1.5rem">INFORMASI TERKINI</h3>
                        <p style="font-size: 0.9rem">Informasi terkini/ pemberitahuan berita terkini.</p>
                    </div>

                    {{-- <div class="section-title">
                        <h1>INFORMASI TERKINI</h1>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div> --}}

                    <div class="row" data-aos="fade-up" data-aos-delay="100" style="position: relative;">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <ul class="nav nav-tabs flex-column" id="informasi_side">
                            </ul>
                        </div>
                        <div class="col-lg-8" id="border_terkini">
                            <div class="tab-content" id="informasi_main">
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End Departments Section -->


            
            <!-- ======= Module Sectionn ======= -->
            <section id="services1" class="services section-bg">
                <div class="container jump" data-aos="fade-up" id="services">

                    <div class="section-header">
                        <h3 style="font-size: 1.5rem">MODUL NPIS</h3>
                        <p style="font-size: 0.9rem">Senarai Modul yang terkandung di dalam NPIS</p>
                    </div>

                    <div class="row gy-4" style="display: flex;
                    justify-content: center;
                    align-items: center;">

                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths " data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-alt"></i>
                                    </div>
                                    <h4>PERMOHONAN<br>PROJEK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffb8b1;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-alt"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.9rem;">PERMOHONAN PROJEK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:50%;">Pendaftaran dan permohonan projek.</p>
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
                                    <br/>
                                    <h4>MODUL PEMANTAUAN & PENILAIAN PROJEK JPS</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffdac1;">
                                            <div class="icon">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.9rem;">PEMANTAUAN & PENILAIAN PROJEK JPS</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pemantauan dan perancangan pelaksanaan projek JPS.</p>
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
                                        <div class="flip-card-front" style="background-color:#e2f0cb;">
                                            <div class="icon">
                                                <i class="fa-solid fa-area-chart"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.9rem;">PEMANTAUAN & PENILAIAN PROJEK JABATAN BUKAN
                                                TEKNIK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:30%;">Pemantauan dan perancangan pelaksanaan projek Jabatan Bukan Teknik.</p>
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
                                    <br/>
                                    <h4>KONTRAK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#b5ead6;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-invoice"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.9rem;">KONTRAK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pendaftaran maklumat Projek, Kontrak dan Kontraktor.</p>
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
                                        <div class="flip-card-front" style="background-color:#EDF59C;">
                                            <div class="icon" style="margin-top:20%;">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.9rem;">PERUNDING</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pendaftaran maklumat Kontrak Perunding dan <i style="color: #fff">Deliverables</i> Perunding. </p>
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
                                    <br/>
                                    <h4><i>VALUE MANAGEMENT (VM)</i></h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#55cbcd;">
                                            <div class="icon">
                                                <i class="fa-solid fa-search-dollar"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.95rem;"><i>VALUE MANAGEMENT</i> (VM)</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pendaftaran maklumat pelaksanaan Makmal  VM.</p>
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
                                    <br/>
                                    <h4><i>NOTICE OF CHANGE</i> (NOC)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#a3e1dc;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.95rem;"><i>NOTICE OF CHANGE </i>(NOC)</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:30%;">Pendaftaran maklumat mengikut jenis NOC; Notis Perubahan Projek atau Pindah Peruntukan Siling Tahunan.</p>
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
                                    <br/>
                                    <h4>PERUNTUKAN DI LUAR <i>ROLLING PLAN</i> (RP)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#edeae5;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-signature"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.95rem;">PERMOHONAN PERUNTUKAN DI LUAR <i>ROLLING PLAN</i> (RP)
                                            </h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:20%;">Pendaftaran maklumat permohonan projek di luar RP serta merekod Ulasan Teknikal daripada Bahagian berkaitan.</p>
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
                                        <div class="flip-card-front" style="background-color:#ffdbcc;">
                                            <div class="icon">
                                                <i class="fa-solid fa-chart-pie"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.95rem;">PENJANAAN LAPORAN</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Penjanaan laporan untuk setiap modul.</p>
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
                                    <h4><i>GEO-BOARD</i></h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffb8b1;">
                                            <div class="icon">
                                                <i class="fa-solid fa-earth-asia"></i>
                                            </div>
                                            <br/>
                                            <h4 style="font-size:0.95rem;"><i>GEO-BOARD</i></h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:20%;">Memaparkan maklumat projek berdasarkan Taburan Projek Mengikut Status, Kategori Projek dan Prestasi Perbelanjaan Projek Pembangunan.</p>
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
    </main><!-- End #main -->
    <!-- MODAL -->
    

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
          <div class="modal-content log_masuk_modal_content_container">
            <div class="log_masuk_modal_container">
              <div class="log_masuk_modal_left_content">
                <div class="pengguna_img_holder">
                  <!-- <div class="pengguna_img"> -->
                  <img src="{{ asset('assets/images/login.gif') }}" alt="penggunaJPS" />
                  <!-- </div> -->
                  <!-- <img
                    src="assets/images/pengguna JPS.png"
                    alt="pengguna JPS"
                  /> -->
                </div>
              </div>
              <div class="log_masuk_modal_right_content">
                <div class="log_masuk_modal_header d-flex">
                  <button type="button" data-dismiss="modal" class="ml-auto">
                    <i class="mdi mdi-window-close"></i>
                  </button>
                </div>

                <!-- PENGGUNA JPS -->
                <div class="modal-body log_masuk_modal_body">
                  <div class="MAsuk_tab_container">
                    <div class="MAsuk_tab_btn_container">
                      <button class="jps nav-link active"
                      id="nav-home-tab"
                      data-toggle="tab"
                      data-target="#nav-home"
                      type="button"
                      role="tab"
                      aria-controls="nav-home"
                      aria-selected="true"
                      >
                        <span>Pengguna JPS </span>
                      </button>
                      <button class="agensi nav-link"
                      id="nav-profile-tab"
                      data-toggle="tab"
                      data-target="#nav-profile"
                      type="button"
                      role="tab"
                      aria-controls="nav-profile"
                      aria-selected="false">
                        <span>PENGGUNA AGENSI LUAR</span>
                      </button>
                    </div>
                    <h4><b>LOG MASUK</b></h4>
                    <div class="pengguna_jps_tab_content">
                      <div class="info_content">
                        {{-- <h5>
                          Log Masuk <span><i>Pengguna JPS</i> </span>
                        </h5> --}}
                        <p class="info">
                          Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                        </p>
                      </div>
                      {{-- action="{{url('login')}}" --}}
                        <form class="" id="pengguna_jps_form" method="POST" action="{{url('login')}}">
                              @if($errors->any())
                                <label class="text-danger">{{ implode('', $errors->all(':message')) }}</label>
                              @endif
                              {{-- @if($errors->any())
                                {{ implode('', $errors->all(':message')) }}
                              @endif --}}
                            @csrf
                            <div class="form-group">
                                <label for="email" >Kad Pengenalan</label>
                                <input type="hidden" name="type" value="jps"/>
                                <input type="text"
                                        class="form-control ic_no"
                                        id="ic_no"
                                        aria-describedby="emailHelp"
                                        placeholder="Kad Pengenalan" name="email" 
                                        minlength="12" maxlength="12"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        required
                                        />
                                        <label class="ic_error text-danger h5 d-none"></label>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group position-relative">
                                <label for="password">Kata Laluan</label>
                                <input type="password"
                                        class="form-control password_eye_field"
                                        id="password"
                                        placeholder="Kata Laluan" name="password" />
                                        
                                <button type="button" class="eye_icon" onclick="showpassword()">
                                  <span class="iconify" data-icon="mdi-eye" style="color: #c4c4c4; font-size: 2em;"></span>
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
                                <a class="btnDaftar" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                                data-keyboard="false">
                                    {{ __('Daftar Baharu') }}
                                </a>
                                @if (Route::has('password.request'))
                                    <a class="btnDaftar" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                                    data-keyboard="false">
                                        {{ __('Lupa Kata Laluan?') }}
                                    </a>
                                @endif 
                                </div>
                            </div>
                        </form>
                      <!-- PENGGUNA Kementerian/Agensi -->
                        <form class="d-none" id="pengguna_agensi_form" method="POST" action="{{url('login')}}">
                          @if($errors->any())
                                <label class="text-danger">{{ implode('', $errors->all(':message')) }}</label>
                              @endif
                            @csrf
                            <div class="form-group">
                                <label for="email" >Emel</label>
                                <input type="hidden" name="type" value="non_jps"/>
                                <input type="email"
                                        class="form-control E-mel"
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
                                <label for="password">Kata Laluan</label>
                                <input type="password"
                                        class="form-control password_eye_field"
                                        id="passwordagensi"
                                        placeholder="Kata Laluan" name="password" />
                                        
                                <button 
                                type="button" class="eye_icon" onclick="showpassword()">
                                  <span class="iconify" data-icon="mdi-eye" style="color: #c4c4c4; font-size: 2em;"></span>
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
                                <a class="btnDaftar" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                                data-keyboard="false">
                                    {{ __('Daftar Baharu') }}
                                </a>
                                @if (Route::has('password.request'))
                                    <a class="btnDaftar" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
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
                <i class="mdi mdi-window-close"></i>
                </button>
              </div>
            <div class="forget_modal_heading">
              <h4>Lupa kata laluan ?</h4>
              
              <p>
                Sila masukkan No. Kad Pengenalan, Emel dan semak Emel anda untuk set semula kata laluan.
              </p>
            </div>

            <div class="forget_modal_form">
                <form method="POST" action="{{ route('password.email') }}"  id="submitForgot">
                @csrf
                <div id="forget_user_error" style="display:none">
                    <label class="text-danger">No. Kad Pengenalan dengan Emel tiada di dalam system</label>
                </div>
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
                    >Alamat Emel</label
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
              Akaun telah didaftarkan <br />
            </h3>
            <div class="text-center">
              <button class="btn" data-dismiss="modal" id="tutup" style="background-color: #5b63c3;color: white;padding-top: 2px;">Tutup</button>
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
        <x-form.spinner>
          <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner>

          <div class="modal-content login_interface_modal_content">
            <div class="modal-body login_interface_modal_body">
              <div class="login_interface_close">
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                <i class="mdi mdi-window-close"></i>
                </button>
              </div>
              <div class="login_interface_modal_body_content">
                <h4 class="login_interface_modal_header">
                  DAFTAR AKAUN BAHARU
                </h4>
                <div class="interface_tab_container">
                  <div class="d-flex row">
                    <div class="label col-lg-3 col-md-4 col-12">
                      <label for="Kotegori Pengguna">Kategori Pengguna​</label>
                    </div>
                    <div class="radio_Container d-flex flex-column interface_tab_container col-lg-8 col-md-8 col-12">
                      <label class="r_container">Pengguna JPS 
                        <input type="radio" name="radio" id="Pengguna_JPS" checked/>
                        <span class="checkmark"></span>
                        </label>
                        <label for="Agensi_Luar" class="r_container">Pengguna Agensi Luar
                        <input
                            type="radio"
                            name="radio"
                            id="Agensi_Luar"
                            
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
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="Nama_Penuh"
                            class="col-form-label form_label required"
                            >Nama Penuh</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <input
                            type="text"
                            class="form-control"
                            id="name" name="nama"
                          />
                          <span class="error" id="error_nama"></span>
                        </div>
                      </div>

                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="Kad_Pengenalan"
                            class="col-form-label form_label required"
                            >No. Kad Pengenalan</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <input
                            type="text"
                            class="form-control"
                            id="Kad_Pengenalan" name="no_kod_penganalan" maxlength="12"
                          />
                          <span class="error" id="error_no_kod_penganalan"></span>
                        </div>
                      </div>
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="Email_Rasmi"
                            class="col-form-label form_label required"
                            >Emel Rasmi</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <input
                            type="text"
                            class="form-control"
                            id="Email_Rasmi" name="email"
                          />
                          <span class="error" id="error_email"></span>
                        </div>
                      </div>
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="No_Telefon"
                            class="col-form-label form_label required"
                            >No. Telefon</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <input
                            type="text"
                            class="form-control"
                            id="No_Telefon" name="no_telefon"
                          />
                          <span class="error" id="error_telefon"></span>
                        </div>
                      </div>
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="No_Telefon"
                            class="col-form-label form_label required"
                            >Jawatan</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <select
                            type="text"
                            class="form-control"
                            id="jawatan" name="jawatan"
                          > <option value=""> --Pilih--</option>
                          </select>
                          <span class="error" id="error_jawatan"></span>
                        </div>
                      </div>
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label for="Gred" class="col-form-label form_label required">Gred</label>
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <select
                            type="text"
                            class="form-control"
                            name="gred" id="gred"
                          >
                          <option value=""> --Pilih--</option>
                          </select>
                          <span class="error" id="error_gred"></span>
                        </div>
                      </div>
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="Kementerian"
                            class="col-form-label form_label required"
                            >Kementerian</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <select class="form-control" name="kementerian" id="kementerian">
                            <option value=""> --Pilih--</option>
                          </select>
                          <span class="error" id="error_kementerian"></span>
                          <input type="hidden" id="kementerian_jps_id" value="" name="kementerian_jps_id">
                        </div>
                      </div>
                      <div class="input_container" id="jabatan_agensy_drop">
                        <div class="row jabatan_row"> 
                          <div class="col-md-3" style="width:27.5%;margin-top:10px;"> 
                            <input type="radio" id="jabatan_agensy_drop_check" name="jabatan_agensy_drop_check" value="1" />
                            <label style="width:21%;">Jabatan</label>                  
                          </div>
                          <div class="col-md-3 form_input jabatan_col"> 
                              <select type="text" class="form-control" name="jabatan" id="Jabatan" style="height:100%;padding:10px;">
                                <option value=""> --Pilih--</option>
                              </select>
                              <span class="error" id="error_jabatan"></span>
                          </div>
                          <div class="col-md-3" style="padding:0px;width:70px;margin-top:10px;"> 
                            <label class="bahagian_col" style="width:80px;">Bahagian</label>
                          </div>
                          <div class="col-md-3 form_input jabatan_col jbt_bahagian_col"> 
                              <select type="text" class="form-control" name="jabatan_bahagian" id="jabatan_bahagian" style="height:100%;padding:10px;">
                                  <option value=""> --Pilih--</option>
                              </select>
                          </div>
                        </div>
                      </div>

                      <div class="input_container row" id="jabatan_jps_drop">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label for="Jabatan" class="col-form-label form_label">Jabatan</label>
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                              <input type="text" class="form-control" id="jabatan_jps" name="jabatan_jps" value="">
                              <input type="hidden" id="jabatan_jps_id" value="" name="jabatan_jps_id">
                        </div>
                      </div>

                      <div class="input_container row" id="jabatan_agensy_drop">
                        <div class="col-lg-3 col-md-12 col-12 d-flex">
                          <input type="radio" id="bahagian_drop_check" name="bahagian_drop_check" value="1"  />
                          <label for="Bahagian" class="col-form-label form_label" style="padding-top:8px;width:21%; interface_tab_container">Bahagian</label>
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <select type="text" class="form-control" name="bahagian" id="bahagian">
                          <option value=""> --Pilih--</option>
                          </select>
                          <span class="error" id="error_bahagian"></span>                                   
                        </div>
                      </div>

                      <div class="input_container row" id="pejabat_agensy_drop">
                        <div class="col-lg-3 col-md-12 col-12 d-flex">
                          <input type="radio" id="pejabat_drop_check" name="pejabat_drop_check" value="1"  />
                          <label for="Pejabat" class="col-form-label form_label" style="padding-top:8px; interface_tab_container">Pejabat Projek</label>
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <select type="text" class="form-control" name="pejabat" id="pejabat">
                          <option value=""> --Pilih--</option>
                          </select>
                        </div>
                      </div>

                      <div class="input_container" id="jps_negeri">
                        <div class="row jabatan_row"> 
                          <div class="col-md-3 jps_negeri_col" style="margin-top:10px;"> 
                            <input type="radio" id="negeri_drop_check" name="negeri_drop_check" value="1" />
                            <label style="width:72px; interface_tab_container">JPS Negeri</label>
                            </div>
                          <div class="col-md-3 form_input negeri_col"> 
                              <select type="text" class="form-control"  name="negeri" id="negeri" style="height:100%;padding:10px;">
                                <option value=""> --Pilih--</option>
                              </select>
                              <!-- <span class="error" id="error_jabatan"></span> -->
                          </div>
                          <div class="col-md-3 daerah_col" style="padding:0px;width:100px;margin-top:10px"> 
                            <input type="radio" id="daerah_drop_check" name="daerah_drop_check" value="1" />
                            <label style="width:80px; interface_tab_container">JPS Daerah</label>
                            </div>
                          <div class="col-md-3 form_input negeri_col"> 
                              <select type="text" class="form-control" name="daerah" id="daerah" style="height:100%;padding:10px;">
                                  <option value=""> --Pilih--</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      
                      <div class="input_container position-relative" id='nonjps_doc'>
                          <div class="file_label d-flex" style="padding-top:8px;width:23.5%;">
                            <label for="Dokumen_Sokongan" class="col-form-label form_label">Dokumen Sokongan</label>
                            <div class="pop_over info">
                              <button type="button" class="btn pop_btn" style="margin-bottom: 50%;">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                {{-- <img src="assets/images/i-icon.png" alt="icon"> --}}
                              </button>
                            </div>
                            <div class="pop_content position-absolute d-none" id="error_dokumen_name">
                              <p>Sila muat naik <span> Surat Jabatan</span></p>
                            </div>
                          </div>

                          <div class="form">
                            <div class="yes">
                              <span class="btn_upload interface_tab_container">
                                <input type="file" name="dockument" id="dockument"  class="input-img">
                                Muat naik lampiran
                                </span>
                                <p class="file_size d-none" id="file_size">
                                  (Salz fail tidak melebihi 4 mb)
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
                            <span id="error_dokumen_name_new" class="error"></span>
                          </div>
                      </div>
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="Kod_Pengesahan"
                            class="col-form-label form_label"
                          >
                            Kod Pengesahan</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
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
                      <div class="input_container row">
                        <div class="col-lg-3 col-md-12 col-12">
                          <label
                            for="Kod_Pengesahan"
                            class="col-form-label form_label"
                          >
                            Perakuan Pendaftaran</label
                          >
                        </div>
                        <div class="form_input col-lg-8 col-md-12 col-12">
                          <div class="form-group form-check form_checker">
                            <input type="checkbox" id="exampleCheck1" onclick="myChecboxFunction()">
                            <label class="form_check_label" for="exampleCheck1"
                              ><b>Dengan ini saya mengaku bahawa semua maklumat
                              yang diisikan dalam permohonan ini adalah SAH
                              dan BENAR.</b></label
                            >
                          </div>
                        </div>
                      </div>
                      <div class="form_btn_container mt-3" style="gap: 1%;">
                        <button type="button" id="close_button" class="interface_tab_container">KEMBALI</button>
                        <button id="daftar_reset" type="button" class="" style="background-color: #fa5d7c; border:none; font-size: 0.8rem;" >Reset</button>
                        <button type="button" id="submit_registration" style="background-color: #5b64c3; border:none; font-size: 0.8rem;" class="interface_tab_container">DAFTAR</button>    
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
              emel anda
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

<div class="modal fade modalEotLad" id="exampleModal1" tabindex="-1"  style="display: none !Important;">
    <div class="modal-dialog modal-xl modal-dialog-centered w-50">
      <div class="modal-content p-2">
      <div class="text-right">
        <button type="button" class="btn-close closebtn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="m-3">

        <label for="" style="color: #39AFD1; font-size: 1.8rem; font-weight: 600;" id="pop_title"></label>
        <p style="color: #444444; text-align: justify;" id="pop_sub_title"></p>
    <div class="text-center">

      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="border-0 d-flex">
            <img id="pop_image" src="" style="width: 23rem; height: auto;" alt="">
            <!-- <label style="position:absolute; color: #fff; text-shadow: 2px 2px rgba(0, 0, 0, 0.24); font-weight: 600; bottom: 0px;">
              PEMBAIKAN SALURAN AIR DI KUALA SELANGOR 2022</label> -->
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body" style="text-align: justify; font-size: 0.8rem; width: auto; height: 17.5rem; overflow-y: auto; line-height: 1.8rem;">
              <p class="card-text" id="pop_description">
              </p> 
            </div>
          </div>
        </div>
      </div>

      
      <div class="hantarBtnDiv mr-2">
        <button type="button" class="CadanganTutupBtn" data-bs-dismiss="modal" aria-label="Close">
        Tutup
        </button>
      </div>
    </div>

      </div>
      
    </div>
  </div>
  </div>

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
    <div style="height:calc(100vh-50px);">
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact jump" style="margin-bottom: -90px;">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6 col-md-6">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center mb-5">
                        <i class="bi bi-map"></i>
                        <h3 style="font-size: 1rem;">ALAMAT</h3>
                        <p id="alamat" style="text-align: center; font-size: 0.8rem;">JABATAN PENGAIRAN DAN SALIRAN (JPS) MALAYSIA<br />JALAN SULTAN SALAHUDDIN<br />50626
                             WILAYAH PERSEKUTUAN KUALA LUMPUR</p>

                        {{-- <h3>EMEL</h3>
                        <p>npis@water.com</p> --}}
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-6 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-envelope"></i>
                        <h3 style="font-size: 1rem;">EMEL</h3>
                        <p style="text-align: center; font-size: 0.8rem;">npis@water.gov.my</p>
                        <br />
                        <br />
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1 d-none">

                <div class="col-lg-12 " id="iframe">
                    
                </div>

            </div>

        </div>
      </section><!-- End Contact Section -->
      <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">
        <div class="footer-content position-relative">
          <div class="container">
            <div class="row" style="margin-top: -5%;">
              <div class="col-lg-3 col-md-6 col-xs-12 row footer-links center_col">
                <div class="col-lg-8 col-md-9 col-xs-12">
                    <p>Bilangan Pelawat : </p>
                </div>
                <div class="col-lg-4 col-md-3 col-xs-12">
                    <span id="NOV" class="hitcounter-text">355</span>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12 row footer-links center_col">
                  <div class="col-lg-8 col-md-9 col-xs-12">
                      <p>Bilangan Pelawat Hari Ini : </p>
                  </div>
                  <div class="col-lg-4 col-md-3 col-xs-12">
                      <span id="NOVT" class="hitcounter-text">12</span>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12 row footer-links center_col">
                  <div class="col-lg-9 col-md-9 col-xs-12">
                      <p>Bilangan Pelawat Bulan Ini : </p>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                      <span id="NOVM" class="hitcounter-text">56</span>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12 row footer-links center_col">
                  <div class="col-lg-9 col-md-9 col-xs-12">
                      <p>Bilangan Pelawat Tahun Ini : </p>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                      <span id="NOVY" class="hitcounter-text">56</span>
                  </div>
              </div>
            </div>
            <div class="row"  style="margin-top: -2%;">
                <center>
                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4 style="font-size: 0.9rem">MyProjek, ICU JPM</h4>
                        <div style="margin-bottom: -20%; margin-top:-5%;">
                        <p><a id="logo_url" href="google.com" target="_blank"><img id="footer_logo" src="main//images/myprojek.png" height="40px"></a></p>
                        </div>
                      </div><!-- End footer links column-->
                </center>
            </div>
          </div>
        </div>

        <div class="footer-legal text-center position-relative">
          <div class="container">
            <div class="disclaimer" style="text-align:center margin-bottom: -15%; font-size: 0.8rem;">
                <strong><i>Disclaimer</i> / Penafian</strong><br/>
                Pihak JPS tidak akan bertanggungjawab terhadap sebarang masalah, kerosakan atau kehilangan data yang berlaku disebabkan penggunaan sistem ini.
            </div>
            <div class="copyright" id="copyright" style="font-size: 0.8rem;">

                &copy; Hak Cipta Terpelihara 2023 <strong><span>© Jabatan Pengairan dan Saliran
                        (JPS) Malaysia</span></strong>. All Rights Reserved
            </div>
            <div class="credits" style="font-size: 0.8rem;">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                Paparan terbaik menggunakan Mozilla Firefox, Chrome dan Microsoft Edge ke atas dengan Resolusi 1920
                x 1080 <br/>
                
            </div>
          </div>
        </div>
        @if (count($errors) > 0)
        <script>
            $( document ).ready(function() {
                $('#log_masuk_modal').modal('show');
            });
        </script>
        @endif
      
        <script>
            $( document ).ready(function() {
              const queryString = window.location.search;
              const urlParams = new URLSearchParams(queryString);
              const session = urlParams.get('session')
              console.log(session); 
              if(session=='expired'){
                console.log('yes')
                $('#log_masuk_modal').modal('show');
              }
              //  
            });
        </script>      
      </footer>
      <!-- End Footer -->
    </div>
    

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    

</body>

<div id="one" class="collapse">
    <div class="accordion-inner">
        HERE IS THE STUFF
    </div>
</div>


</html>
@include('main.script')
