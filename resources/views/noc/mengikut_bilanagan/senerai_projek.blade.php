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
                  <a href="#">
                    Senarai NOC
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="active">Senarai projeck</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="project_register_content_container">
            <div class="project_register_table_container">
            <div class="project_register_search_container mt-3">
                <!-- <div class="project_register_search_header d-flex">
                  <div class="icon_yellow_bg">
                    <span class="ri-search-line ri-2x icon_yellow_bg" data-icon="ri-search-line ri-2x" style="font-size
                    : 2em; color: #ffcb71; background-color: #FFF0D6; border-radius: 6px;"></span>
                    </div>
                  <h4>Carian Projek</h4>
                </div> -->
             <!-- flowchart start -->
             <div class="rmk_flow_Chart flow-horizontal row">
              <div class="rmk_flow_Chart_container">
                <div class="d-flex justify-content-between">
                  <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                    <h5>BAHAGIAN</h5>
                  </div>
                  <div class="rmk_flow_Chart_content" style="width: 20%;">
                    <h5>BKOR</h5>
                  </div>
                  <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                    <h5>KEMENTERIAN</h5>
                  </div>
                  <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                    <h5>KEMENTERIAN EKONOMI</h5>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="rmk_flow_Chart_content">
                    <div class=" box_content ">
                      <p style="text-align: center;" class="">Daftar/Kemaskini Permohonan</p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content ">
                      <p class="yellow">Dalam Semakan</p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content">
                      <p style="text-align: center;">Dalam Tindakan 
                        Kementerian </p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content no_arrow bend">
                      <p style="text-align: center;">Dalam Tindakan
                        KEMENTERIAN EKONOMI</p>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                  <div class="rmk_flow_Chart_content" style="width: 20%;">
                    <h4 class="mt-4 ml-5" id="lulus_stat">Lulus</h4>
                    <h4 class="mt-4 ml-5" id="tidak_lulus_stat">Tidak Lulus</h4>
                  </div>
                </div>
                <!-- <div class="d-flex justify-content-end">
                  <div class="rmk_flow_Chart_content" style="width: 20%;">
                    <h4 class="mt-4 ml-5">Lulus</h4>
                    <h4 class="mt-4 ml-5">Tidak Lulus</h4>
                  </div>
                 
                </div> -->
              </div>
            </div>
          <!-- flowchart end -->
              </div>
              <div class="card project_register_search_container my-3 d-flex">
              <div class="mb-3 d-flex" style="vertical-align: middle;">
                <div style="color: #ffcb71; padding: 0rem 0.4rem 0rem 0.4rem;">
                    <img class="" src="{{ asset('assets/images/Vector-12.png') }}" alt="">
                </div>
                <h4 class="mt-2 d-flex" style="font-size: 1rem; margin: 0; color: #717483; font-weight: 600;">SENARAI PROJEK </h4>
                    <div class="ml-auto userlist_content_header_right KON_downloadImg d-flex" type="" id="dropdownMenuButton">
                    <!-- <div class="pemberat_content_header_right text-center col-xs-12" id="addpopbtn">
                      <button class="pemberat_greenBtn mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <i class="ri-add-circle-fill" style="font-size: 1.5em; vertical-align: middle;color:white"></i>
                        <lable id="pemberat_greenBtn">NOC</lable>
                      </button>
                    </div> -->
                    <div class="userlist_content_header_righttext-center col-xs-12" style="margin-top: 25px;">
                      <button class="printing col-xs-12">
                        <img src="{{ asset('assets/images/printing (1) 2.png') }}" alt="printing" onclick="printDataTable()"/>
                      </button>
                    </div>
                  </div>
                </div>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container mb-2" style="border-bottom: 3px solid #dee2e6;">
                  <button type="button" onclick="jps_user()" class="active" id="jps_btn">JPS</button>
                  <button type="button" onclick="agensi_user()" id="agency_btn">SUMBER KEWANGAN LAIN</button>
                </div>
                        
                        <div class=" userlist_content_header_right KON_downloadImg d-flex" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                        </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body p-3">
                            <div style="overflow-x:auto;">
                                <table class="table table-layout: auto; table-striped"  id="jps_user" style="width:150em !important;">    
                                <thead class="text-nowrap">
                                                <tr class="">
                                                    <th class=""></th>
                                                    <th class="">Kod Projek</th>
                                                    <th class="">Kod Butiran</th>
                                                    <th class="">Nama Projek</th>
                                                    <th class="">Kos Projek (RM)</th>
                                                    <th class="">Perbelanjaan Keseluruhan Projek (RM)</th>
                                                    <th class="">Baki Kos Projek (RM)</th>
                                                    <th class="">Peruntukan Asal (RM)</th>
                                                    <th class="">Tambah (RM)</th>
                                                    <th class="">Kurang (RM)</th>
                                                    <th class="">Tambah/Kurang (RM)</th>
                                                    <th class="">Peruntukan Dipinda (RM) </th>
                                                    <th class="">Justifikasi (RM) </th>
                                                    <th class="">Bahagian (RM)</th>
                                                </tr>
                                    </thead>
                                    <thead class="">
                                                <tr style="font-size: 0.8rem; background-color: #39Afd1;">
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;"></th>
                                                    <th scope="col" colspan="3" class="text-center NOCtblKodprojek" style="color: #fff !important;">JUMLAH</th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_kos_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_keseluruhan_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_baki_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_peruntukan_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_tambah_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_kurang_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_tamba_kurang_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;" id="jps_dipinda_sum"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;"></th>
                                                </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                              </div>
                            </div> <!-- end card-body-->
                        </div>
                  </div>
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3" style="overflow-x:auto;">
                            <table class="table table-layout: auto; table-striped" id="agensi_user" style="width:150em !important;">
                                  <thead class="text-nowrap">
                                                <tr>
                                                    <th class=""></th>
                                                    <th class="">Kod Projek</th>
                                                    <th class="">Kod Butiran</th>
                                                    <th class="">Nama Projek</th>
                                                    <th class="">Pembiyaan</th>
                                                    <th class="">Kos Projek (RM)</th>
                                                    <th class="">Perbelanjaan Keseluruhan Projek (RM)</th>
                                                    <th class="">Baki Kos Projek (RM)</th>
                                                    <th class="">Peruntukan Asal (RM)</th>
                                                    <th class="">Kurang (RM)</th>
                                                    <th class="">Tambah/Kurang (RM)</th>
                                                    <th class="">Peruntukan Dipinda (RM) </th>
                                                    <th class="">Justifikasi (RM) </th>
                                                    <th class="">Bahagian (RM)</th>
                                                </tr>
                                </thead>
                                <thead class="">
                                                <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                                                    <th scope="col" class="text-center NOCtblKodprojek" style="color: #fff !important;"></th>
                                                    <th scope="col" colspan="4" class="text-center NOCtblKodprojek" style="color: #fff !important;">JUMLAH</th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_kos_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_keseluruhan_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_baki_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_peruntukan_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_kurang_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_tamba_kurang_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" id="agensi_dipinda_sum" style="color: #fff !important;"></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek" ></th>
                                                    <th scope="col" class="text-center NOCtblKodprojek"></th>
                                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>  <!-- end card-body-->
                        <br>
                        <center>
                          <div class="userlist_content_header_right col-md-12 text-center" id="jps_sec">
                            <button class="KembaliBtnNOC" type="button" id="batal_btn">Batal</button>
                            <button class="SimpanBtnNOC" type="button" id="simpan_btn">Simpan</button>
                          </div>
                          <div class="userlist_content_header_right col-md-12 text-center d-none" id="agensy_sec">
                            <button class="KembaliBtnNOC" type="button" id="batal_agensy_btn">Batal</button>
                            <button class="SimpanBtnNOC" type="button" id="simpan_agensy_btn">Simpan</button>
                          </div>
                        </center>
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
                        <label class="modal_header_prestasi mt-2 mb-2" id="save_text">Maklumat anda berjaya di simpan<br></label>
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

<section id="pop_section" class="d-none">
  <div class="NOCpopUPmodal">
        <div class="modal boxShadowNOC" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body m-4 text-center">
                <div class="mt-5">
                  Kelulusan <label id="kelulusan_text"></label>
                </div>
                <div class="userlist_content_header_right col-md-12 text-center mt-5">
                  <button class="KembaliBtnNOC" id="tidak_btn">Tidak</button>
                  <button class="TambahBtnNOC" id="ya_btn">Ya</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@include('noc.mengikut_bilanagan.script')
@endsection