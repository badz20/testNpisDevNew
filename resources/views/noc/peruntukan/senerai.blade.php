@include('users.dashboard.style')
@include('noc.Kertas_Permohonan_NOC.nocStyle')

@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')
<div class="Mainbody_content mtop">

<x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
</x-form.spinner> 
        <div class="Mainbody_content_nav_header project_register row align-items-center">
            <div class="col-md-4 col-xs-12 ml-2">
              <h4 class="project_list">Pindah Peruntukan Siling Tahunan</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav d-flex align-content-end flex-wrap">
                <li>
                  <a href="#">
                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                      <path fill="currentColor" d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8l6.5 3.78Z"></path>
                    </svg>

                    Notice of Change
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    JPS
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    Pindah Peruntukan Siling Tahunan
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="active">Senarai NOC</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="project_register_content_container">
            <div class="project_register_table_container">
              <div class="card project_register_search_container">
              <div class="project_register_search_header mb-3 d-flex">
                <img class="" src="{{ asset('assets/images/Vector-12.png') }}" alt="">
                  <h4 class="">SENARAI NOC</h4>
                  <div class="ml-auto userlist_content_header_right KON_downloadImg d-flex" type="" id="dropdownMenuButton" >
                    <div class="pemberat_content_header_right text-center col-xs-12" id="addpopbtn">
                      <button class="pemberat_greenBtn mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <i class="ri-add-circle-fill" style="font-size: 1.5rem; vertical-align: middle;color:white"></i>
                        <lable id="pemberat_greenBtn">NOC</lable>
                      </button>
                    </div>
                    <div class="userlist_content_header_right text-center" style="margin-top:25px !important;magin-left:1% !important;">
                      <button class="printing col-xs-12">
                        <img src="{{ asset('assets/images/printing (1) 2.png') }}" alt="printing" onclick="printDataTable()"/>
                      </button>
                    </div>
                  </div>
                </div>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container mb-2" style="border-bottom: 3px solid #dee2e6;">
                  <button type="button" onclick="jps_user()" class="active" id="jps_btn">NOC</button>
                  <button type="button" onclick="agensi_user()" id="agency_btn">SEKATAN</button>
                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body p-3">
                                <table id="jps_user" style="width: 100%!important;"  class="display p-3 userlist_tab_content_table pemberat_subsubtitle table table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="pemberat_subtitle">Bil</th>
                                            <th class="pemberat_subtitle">NOC</th>
                                            <th class="pemberat_subtitle">Tahun</th>
                                            <th class="pemberat_subtitle">Tarikh Buka</th>
                                            <th class="pemberat_subtitle">Tarikh Tutup</th>
                                            <th class="pemberat_subtitle">Status Permohonan</th>
                                            <th class="pemberat_subtitle">Status</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div> <!-- end card-body-->
                        </div>
                  </div>
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="agensi_user" style="font: size 0.8rem; width: 100%!important;" class="display p-3 userlist_tab_content_table pemberat_subsubtitle table table-responsive">
                                <thead>
                                    <tr>
                                            <th class="pemberat_subtitle">Bil</th>
                                            <th class="pemberat_subtitle">NOC</th>
                                            <th class="pemberat_subtitle">Tahun</th>
                                            <th class="pemberat_subtitle">Tarikh Buka</th>
                                            <th class="pemberat_subtitle">Tarikh Tutup</th>
                                            <th class="pemberat_subtitle">Status Permohonan</th>
                                            <th class="pemberat_subtitle">Status</th>          
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>  <!-- end card-body-->
                    </div>
                    <div class="userlist_tab_content_table_footer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
            <span>{{ now()->year }}</span>
            <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
            <span>NPIS - JPS</span>
          </div>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Mainbody_conatiner Starts -->
    </div>

    <section>
      <div class="container"></div>
    </section>

    <section>
            <div class="NOCpopUPmodal">
            <div class="modal fade boxShadowNOC show" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header NOCmodalTitle">
                    <h5 class="modal-title" style="font-size: 0.9rem" id="exampleModalLabel">
                        <svg class="tab_icon_lite_blue mr-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5.005 9.003a1 1 0 0 1 1 1a6.97 6.97 0 0 1 4.33 1.5h2.17c1.332 0 2.53.58 3.354 1.5h3.146a5 5 0 0 1 4.516 2.851c-2.365 3.121-6.194 5.149-10.516 5.149c-2.79 0-5.15-.603-7.061-1.658a.998.998 0 0 1-.94.658h-3a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h3Zm1 3v5.022l.045.032c1.794 1.26 4.133 1.946 6.955 1.946c3.004 0 5.798-1.156 7.835-3.13l.133-.133l-.12-.1a2.994 2.994 0 0 0-1.643-.63l-.205-.007h-2.112c.073.322.112.656.112 1v1h-9v-2l6.79-.001l-.034-.079a2.501 2.501 0 0 0-2.092-1.415l-.164-.005h-2.93a4.985 4.985 0 0 0-3.57-1.5Zm-2-1h-1v7h1v-7Zm14-6a3 3 0 1 1 0 6a3 3 0 0 1 0-6Zm0 2a1 1 0 1 0 0 2a1 1 0 0 0 0-2Zm-7-5a3 3 0 1 1 0 6a3 3 0 0 1 0-6Zm0 2a1 1 0 1 0 0 2a1 1 0 0 0 0-2Z"></path>
                        </svg>

                        CIPTA NOC
                    </h5>
                    <button type="button" style="
                        font-size: 0.8rem;
                        border: none;
                        background-color: transparent;
                        color: #fff;
                        " class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div style="padding:2%;">
                        <span class="error" style="color:red;" id="error"></span>
                      </div>
                    <div class="d-flex">
                        <div class="col-md-6 col-xs-12 pemberat_title">
                        <label for="">Bilangan NOC </label>
                        <input type="text" class="form-control" name="bilangan" placeholder="NOC Bilangan"  value="" id="bilangan">
                        <span class="error" id="bilangan_error" style="color:red;"></span>
                        </div>
                        <div class="col-md-6 col-xs-12 pemberat_title">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" name="tahun" value="" min="2000" max="9999" id="tahun">
                        <span class="error" id="tahun_error" style="color:red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex">
                        <div class="col-md-6 col-xs-12 pemberat_title">
                        <label for="">Tarikh Buka </label>
                        <input type="date" class="form-control" name="tarikh_buka" id="tarikh_buka">
                        <span class="error" id="tarikh_buka_error" style="color:red;"></span>
                        </div>
                        <div class="col-md-6 col-xs-12 pemberat_title">
                        <label for="">Tarikh Tutup</label>
                        <input type="date" class="form-control" name="tarikh_tutup" id="tarikh_tutup">
                        <span class="error" id="tarikh_tutup_error" style="color:red;"></span>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="resetbtn" id="reset">Kembali</button>
                        <button class="caribtn" id="simpan">Simpan</button>
                    </div>
                    <div class="userlist_tab_content_header">
                        <div style="overflow-x: auto">
                        <table class="table m-5" style="height: auto; width: 90%" id="noc_table">
                            <thead>
                            <tr style="
                                font-size: 0.8rem;
                                background-color: #39afd1;
                                color: #fff;
                                ">
                                <th scope="col" class="text-center NOCtblKodprojek">
                                <p class="mt-3" style="color: #fff;">Bil</p>
                                </th>
                                <th scope="col" class="text-center NOCtblKodprojek">
                                <p class="mt-3" style="color: #fff;">Bilangan NOC</p>
                                </th>
                                <th scope="col" class="text-center NOCtblKodprojek">
                                <p class="mt-3" style="color: #fff;">Tahun</p>
                                </th>
                                <th scope="col" class="text-center NOCtblKodprojek">
                                <p class="mt-3" style="color: #fff;">Tarikh Buka</p>
                                </th>
                                <th scope="col" class="text-center NOCtblKodprojek">
                                <p class="mt-3" style="color: #fff;">Tarikh Tutup</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 0.8rem" class="" id="bilangan_noc_table">
                            </tbody>
                            <tbody style="font-size: 0.8rem;" class="d-none" id="bilangan_sekatan_table">
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>

        <section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                        </div>
                        <div class="add_role_sucess_modal_body_Content text-center" id="user_pop-up">
                        <div class="add_role_sucess_modal_header col-md-12 justify-content-end">
                        <button
                            type="button"
                            class="btn-close text-right"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            style="border: transparent; background-color: transparent; color: #fff; text-align: right;"
                            ><i class="ri-close-fill" style="font-size: 1rem;"></i></button>
                        </div>
                        <label class="modal_header_prestasi mt-2 mb-2" style="font-size: 0.9rem;" id="save_text">Maklumat anda berjaya di simpan<br></label>
                            <div class="text-center">
                                <button data-dismiss="modal" class="tutup" id="tutup">Tutup</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('noc.peruntukan.script')
@endsection