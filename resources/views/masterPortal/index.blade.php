
<style>
p#file_size {
    padding-left: 12px;
    color: red;
}
p#file_type {
    padding-left: 12px;
    color: red;
}
/* img#Logo_img_1 {
    position: absolute;
    top: 30px;
    left: 50px;
    width: 66%;
    height: 80%;
    overflow: hidden;
    text-indent: -999px;
}
img#Logo_img_2 {
    position: absolute;
    top: 30px;
    left: 50px;
    width: 66%;
    height: 80%;
    overflow: hidden;
    text-indent: -999px;
}
img#Logo_img_3 {
    position: absolute;
    top: 30px;
    left: 50px;
    width: 66%; */
    /* height: 80%;
    overflow: hidden;
    text-indent: -999px;
} */
div#langing_header_1 {
    position: relative;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 2.7% 5.6%;
    gap: 5%;
    border: 1px dashed #8c979d;
    margin-bottom: 2.5%;
}
button.remove_image {
    top: 5%;
    right: 1.5%;
    position: absolute;
    background-color: transparent;
    border: none;
}
h5#header_logo_name_1 {
    font-size: 0.9rem;
}
p#header_log_size_1 {
    font-size: 0.9rem;
}

div#langing_header_2 {
    position: relative;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 2.7% 5.6%;
    gap: 5%;
    border: 1px dashed #8c979d;
    margin-bottom: 2.5%;
}
h5#header_logo_name_2 {
    font-size: 0.9rem;
}
p#header_log_size_2 {
    font-size: 0.9rem;
}
h5#header_logo_name_1 {
    font-size: 0.9rem;
}
p#header_log_size_1 {
    font-size: 0.9rem;
}

div#langing_header_3 {
    position: relative;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 2.7% 5.6%;
    gap: 5%;
    border: 1px dashed #8c979d;
    margin-bottom: 2.5%;
}
h5#header_logo_name_3 {
    font-size: 0.9rem;
}
p#header_log_size_3 {
    font-size: 0.9rem;
}
.Mainbody_content_nav_header.d-flex{
  padding-top:7% !important;
  padding-left: 2.8% !important;
  padding-right:0 !important;
  padding-bottom:0 !important;
}
ul.path_nav{
  padding-right:3% !important;
}
h4#kandungan_label {
    margin-left: 50px;
    font-family: 'Poppins_Regular';
    font-weight: 500;
    font-size: 1.3rem;
}
.portal_tab_content_header_right.d-flex {
    /* margin-right: 0.5rem; */
    /* padding: 0.37rem; */
    gap: 1rem;
}
button.add_pengguna {
    background-color: #0acf97;
    border: none;
    border-radius: 5px;
    padding: 0.4rem 0.8rem;
    color: #fff;
}
button.printing {
    background-color: #38afd1;
    border: none;
    border-radius: 5px;
    /* padding: 0.23rem 0.8rem !important; */
    color: #fff;
}
img {
    background-color: Transparent !important;
    padding: 0.37rem !important;
}
.portal_tab_content_header.d-flex {
    justify-content: left;
}
.portal_tab_content_header.d-flex.header {
    justify-content: flex-start;
}
h4{
  font-weight:600 !important;
}
.close-button {
    display: none !important;
}
p#pengu_pop, p#footer_pop_up_1, p#footer_pop_up_2 {
    margin: 0;
    background-color: #d9d9d9;
    color: #585e6e;
    padding: 5% 0.6rem;
    font-size: 0.7rem;
}
div#pengu, div#logo_footer_div_1, div#logo_footer_div_2 {
    padding: 3% 0;
    text-align: center;
    color: #6c757c;
    border: 1px dashed #8c979d;
    cursor: pointer;
}
input#pengumuman_image ,input#Logo_footer, input#Imeg_footer {
    width: 0;
    height: 0;
    visibility: hidden;
    position: absolute;
}
p#file_type-p, p#file_size-p {
  color:red;
}
/* div#portal_footer {
  height:80%;
} */
button#footerReset {
    margin-left: 20px;
    font-size: 0.8rem;
    color: #fff;
    padding: 0.5% 1%;
    border: 3px;
    background-color: #fa5d7c;
}
button#footerSubmit {
    background-color: #5c62c2;
    font-size: 0.8rem;
    color: #fff;
    padding: 0.5% 1%;
    border: 3px;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header .path_nav li a .arrow_nav {
  -webkit-transform: rotate(275deg);
    transform: rotate(275deg) !important;
    width: 25px !important;
}

/* 2023 March 09 by Nabilah */
@media (max-width: 820px) {
  .portal_tab_content_header_right{
    justify-content: center;
    padding-top: 1rem;
  }
  .kandungan_tab_btn_container {
    justify-content: center;
    padding-bottom: 1rem;
  }
  button#footerReset {
    margin-left: 20px;
    font-size: 0.8rem;
    color: #fff;
    padding: 1% 2%;
    border: 3px;
    background-color: #fa5d7c;
  }
  button#footerSubmit {
      background-color: #5c62c2;
      font-size: 0.8rem;
      color: #fff;
      padding: 1% 2%;
      border: 3px;
  }
}

@media (min-width: 821px) {
  .portal_tab_content_header_right{
    justify-content: end;
  }
}

.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header {
    padding: 6% 3.7% 0% !important;
}

/* End new from Nabilah */
</style>
@extends('layouts.main.master_responsive')
@section('content_main')
<body id="Selenggara_portal" class="overlay_sidebar">
  <x-form.spinner>
    <x-slot name="message">
      Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner>
    <div class="NPIS_Container">
      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <!-- HEADER Section starts -->

        <div class="Mainbody_content tab mtop">
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-md-5 col-xs-12">
              <h4>Selenggara Portal</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="/home" class="text-info" style="display: flex; align-items: center;">
                    <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                    Pentadbir
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                  </a>
                </li>
                {{-- <li>
                  <a href="#">
                    Pentadbir
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                  </a>
                </li> --}}
                <li><a href="/master/portal" class="active text-secondary"> Selenggara Portal</a></li>
              </ul>
            </div>
          </div>
          @include('masterPortal.result_modal')
          <div class="portal_tab_container">
            <!-- -----------------------------------portal_tab_btn_contaniner starts-------------------------------- -->
            <div class="portal_tab_btn_contaniner">
              <div class="d-flex portal_tab_btn_content nav">
                <button class="active portal_header" data-toggle="pill" data-target="#portal_header">
                  <i class="mdi mdi-page-layout-header icon_blue" style="font-size: 1rem;"></i>
                  Header
                </button>
                <button class="portal_kandungan" data-toggle="pill" data-target="#portal_kandungan">
                  <i class="mdi mdi-page-layout-body icon_blue" style="font-size: 1rem;"></i>
                  Kandungan
                </button>
                <button class="portal_footer" data-toggle="pill" data-target="#portal_footer">
                  <i class="mdi mdi-page-layout-footer icon_blue" style="font-size: 1rem;"></i>
                  Footer
                </button>
              </div>
            </div>

            <!-- --------------------------------------portal_tab_content start--------------------------- -->
            <div class="portal_tab_content_container tab-content">
             
              @include('masterPortal.Kandungan2.kandungan')
              <div class="portal_tab_content tab-pane fade show active" id="portal_header">
                <div class="portal_tab_content_header d-flex header" >
                  <i class="mdi mdi-page-layout-header icon_portal"></i>
                  <h5>header</h5>
                </div>
                <input type="hidden" id="api_url" value={{env('API_URL')}}>
                <div class="logo_form_container">
                  <form id="headerLogoForm" name="myform">
                    <input type="hidden" id="logo1_src" name="logo1_src" />
                    <input type="hidden" id="logo2_src" name="logo2_src" />
                    <input type="hidden" id="logo3_src" name="logo3_src" />
                    <div class="logo_form_content">
                      <div class="logo_input_holder">
                        <div class="logo_input_container position-relative">                        
                          <label for="Logo_1"
                            ><p>Logo 1</p>
                            <button class="pop_btn">
                              <i class="mdi mdi-information info_icon"></i>
                              </button>
                          </label>
                          <div class="position-absolute pop_content d-none">
                            <p>Logo 1 adalah logo dibahagian kiri</p>
                          </div>
                          <input type="file" id="Logo_1" name="Logo_1"/>
                          <div class="upload_logo" id="upload_logo_1">
                            <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                            <h5>
                              Letakkan fail di sini atau klik untuk memuat naik
                            </h5>
                            <p>(Saiz fail tidak melebihi 2mb)</p>
                          </div>
                          <div class="image_preview col-lg-12" id="image_preview_1">
                            <div class="uploaded_img_preview_container" id="langing_header_1">
                              <div class="uploaded_img">
                                <img src="" id="Logo_img_1" alt="" width="auto" height="80"/> 
                              </div>
                              <div class="uploaded_img_details">
                                  <h5 id="header_logo_name_1"></h5>
                                  <p class="flie_size" id="header_log_size_1"></p>
                              </div>
                              <button type="button" class="remove_image" id="remove_logo_1">
                                <i class="mdi mdi-window-close"></i>
                              </button>
                            </div>
                          </div>
                                  <p class="file_size d-none" id="file_size">
                                    Saiz fail tidak melebihi 2 mb
                                  </p>
                                  <p class="file_type d-none" id="file_type">
                                    Jenis fail tidak sah
                                  </p>
                        </div>
                        <div class="logo_input_container position-relative">
                          <label for="Logo_2"
                            ><p>Logo 2</p>
                            <button class="pop_btn">
                              <i class="mdi mdi-information info_icon"></i></button
                          ></label>
                          <div class="position-absolute pop_content d-none">
                            <p>Logo 2 adalah logo dibahagian tengah</p>
                          </div>
                          <input type="file" id="Logo_2" name="Logo_2"/>
                          <div class="upload_logo" id="upload_logo_2">
                            <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                            <h5>
                              Letakkan fail di sini atau klik untuk memuat naik
                            </h5>
                            <p>(Saiz fail tidak melebihi 2mb)</p>
                          </div>
                          <div class="image_preview" id="image_preview_2">
                            <div class="uploaded_img_preview_container" id="langing_header_2">
                              <div class="uploaded_img">
                                <img src="" id="Logo_img_2" alt="" width="100" height="100"/>' 
                              </div>
                              <div class="uploaded_img_details">
                                  <h5 id="header_logo_name_2"></h5>
                                  <p class="flie_size" id="header_log_size_2"></p>
                              </div>
                              <button type="button" class="remove_image" id="remove_logo_2">
                                <i class="mdi mdi-window-close"></i>
                              </button>
                            </div>
                          </div>
                                  <p class="file_size d-none" id="file_size_2">
                                    Saiz fail tidak melebihi 2 mb
                                  </p>
                                  <p class="file_type d-none" id="file_type_2">
                                    Jenis fail tidak sah
                                  </p>
                        </div>
                        <div class="logo_input_container position-relative">
                          <label for="Logo 3"
                            ><p>Logo 3</p>
                            <button class="pop_btn">
                              <i class="mdi mdi-information info_icon"></i></button
                          ></label>
                          <div class="position-absolute pop_content d-none">
                            <p>Logo 3 adalah logo dibahagian tengah</p>
                          </div>
                          <input type="file" id="Logo_3" name="Logo_3"/>
                          <div class="upload_logo" id="upload_logo_3">
                            <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                            <h5>
                              Letakkan fail di sini atau klik untuk memuat naik
                            </h5>
                            <p>(Saiz fail tidak melebihi 2mb)</p>
                          </div>
                          <div class="image_preview" id="image_preview_3">
                            <div class="uploaded_img_preview_container" id="langing_header_3">
                              <div class="uploaded_img">
                                <img src="" id="Logo_img_3" alt="" width="100" height="100"/>' 
                              </div>
                              <div class="uploaded_img_details">
                                  <h5 id="header_logo_name_3"></h5>
                                  <p class="flie_size" id="header_log_size_3"></p>
                              </div>
                              <button type="button" class="remove_image" id="remove_logo_3">
                                <i class="mdi mdi-window-close"></i>
                              </button>
                            </div>
                          </div>
                                  <p class="file_size d-none" id="file_size_3">
                                    Saiz fail tidak melebihi 2 mb
                                  </p>
                                  <p class="file_type d-none" id="file_type_3">
                                    Jenis fail tidak sah
                                  </p>
                        </div>
                      </div>
                    </div>
                    <div class="logo_submit_container">
                      <button style="width: 100px"  type="button" id="headerReset" class="mb-4">Set Semula</button>
                      <button style="width: 100px" type="button" id="headerSubmit" class="mb-4">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
              
              @include('masterPortal.Footer.footer')
            </div>
          </div>
        </div>
        <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
        <!-- HEADER Section Ends -->
      </div>
      <!-- Mainbody_conatiner Starts -->
    </div>
    @include('masterPortal.scripts')
@endsection