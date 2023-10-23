
@include('users.dashboard.style')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('noc.keperluan_peruntukan.style')

<!-- HEADER Section Ends -->
<div class="Mainbody_content mtop">

    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner>

    <div class="Mainbody_content_nav_header project_register row align-items-center m-1">
      <div class="col-md-6 col-xs-12">
        <h4 class="project_list">Keperluan Peruntukan Jabatan Bukan Teknik</h4>
      </div>
      <div class="col-md-6 col-xs-12 path_nav_col">
        <ul class="path_nav d-flex align-content-center flex-wrap">
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
                    Keperluan Jabatan Bukan Teknik
                  </a>
            </li>
        </ul>
      </div>
    </div>
    
    <div class="project_register_content_container">
      <div class="project_register_search_container mt-3">
        <div class="project_register_search_header ml-2 mt-2 d-flex">
          <i class="ri-search-line ri-2x icon_header icon_yellow_bg" class="position-absolute tick"></i>
          <h4>Carian Permohonan</h4>
        </div>
        <div class="project_register_search_form_container">
          <form>

              <div class="row m-1">
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-xs-12 pemberat_title"><label class="" for="">Bahagian</label></div>
                        <div class="col-md-8 col-xs-12 form-group">
                            <select class="form-control" name="" id="query_bahagian">
                                <option value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12 pemberat_title"><label class="" for="">Negeri</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_negeri">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-1">
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="">Kementerian</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_kementerian">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-md-center">
                        <!-- <button class="mr-1 mb-2 resetbtn" type="button" id="resetbtn">Set Semula</button> -->
                        <button class=" mr-1 mb-2 rp_simpanBtn caribtn" type="button" id="caribtn" style="width: 10%;">Cari</button>
                </div>
          </form>
        </div>
      </div>
      <br><br>
      <div class="project_register_table_container">
        <div class="card project_register_search_container">
          <div class="mt-2 project_register_search_container d-flex col-md-12">
            <div class="project_register_search_header d-flex col-md-9 mr-5">
              <i class="ri-file-list-line ri-2x icon_header icon_yellow_bg"></i>
              <h4 class="text-left">SENARAI PROJEK</h4>
            </div>
            <div class="row ml-5">            
            </div>
            <div class="userlist_content_header_right col-md-1 text-center ml-auto">
                <button class="printing col-xs-12">
                    <img src="{{ asset('assets/images/printing (1) 2.png') }}" alt="printing" onclick="printDataTable()"/>
                </button>
            </div>
          </div>
          <hr>
          <div class="userlist_tab_content_header">
            <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                    <div style="overflow-x: auto" class="mt-5">
                        <div id="agensi_card" class="card-body p-3">
                          <table class="table table_preview application_list" id="senaraiJpsTable" style="width:150em !important;" >
                                <thead>
                                    <tr>
                                      <th class="sub_head">Kod Projek</th>                           
                                      <th class="sub_head">Nama Projek</th>
                                      <th class="sub_head">Kos Projek(RM)</th>
                                      <th class="sub_head keperluan_green">Keperluan JPS(RM)</th>
                                      <th class="sub_head"></th>
                                      <th class="sub_head"></th>
                                      <th class="sub_head"></th>
                                      <th class="sub_head keperluan_pink">Peruntukan Asal(RM)</th>
                                      <th class="sub_head keperluan_pink">Tambahan(RM)</th>
                                      <th class="sub_head keperluan_pink">Pemulangan(RM)</th>
                                      <th class="sub_head">Peruntukan Dipinda</th>
                                      <th class="sub_head">Kementerian</th>
                                      <th class="sub_head">Bahagian</th>
                                      <th class="sub_head">Negeri</th>
                                    </tr>                          
                                </thead>
                                <tbody id="senaraiJpsTbody" class="pemantauan_JPS_table_container">
                                </tbody>
                            </table>
                            <br>
                              <center>
                                <div class="userlist_content_header_right col-md-12 text-center">
                                  <button class="SimpanBtnNOC" type="button" id="simpan_btn">Simpan</button>
                                </div>
                              </center>
                              <br>
                        </div>  <!-- end card-body-->
                       
                    </div>
                    <div class="userlist_tab_content_table_footer">
                    </div>
                  </div>
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body border p-3">
                               
                            </div> <!-- end card-body-->
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

@include('noc.keperluan_peruntukan.script')

@endsection