@include('users.audit_logs.audit_trail.style')

@extends('layouts.main.master_responsive')

@section('content_main')
<style>
  .dataTables_wrapper .dataTables_paginate {
            color: rgb(255, 255, 255) !important;
        }
</style>
     <!-- Mainbody_conatiner Starts -->
     <x-form.spinner>
      <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
      </x-slot>
    </x-form.spinner>
     <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <x-form.spinner>
          <x-slot name="message">
              Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner>
        <!-- HEADER Section starts -->
        <div class="Mainbody_content mtop">
            <div class="Mainbody_content_nav_header project_register  row">
              <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
                <h4>Pengurusan Peranan Pengguna</h4>
              </div>
              <div class="col-md-7 col-xs-12 path_nav_col">
                <ul class="path_nav row">
                  <li>
                    <a href="/home"  style="display: flex; align-items: center;">
                      <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                      Pentadbir
                      <img
                        class="arrow_nav ml-2"
                        src="{{ asset('images/arroew.png') }}"
                        alt="arroew"
                      />
                    </a>
                  </li>  
                  {{-- <li>
                    <a href="#">
                      Pentadbir
                      <img
                        class="arrow_nav"
                        src="{{ asset('images/arroew.png') }}"
                        alt="arroew"
                    /></a>
                  </li> --}}
                  {{-- <li>
                    <a href="#">
                      Pengesahan Pengguna Baharu
                      <img
                        class="arrow_nav"
                        src="{{ asset('images/arroew.png') }}"
                        alt="arroew"
                    /></a>
                  </li> --}}
                  <li><a href="/selenggara-pengurusan-peranan" class="active text-secondary"> Pengurusan Peranan Pengguna</a></li>
                </ul>
              </div>
            </div>

          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header row">
                <div class="col-md-3 col-xs-12 userlist_content_header_left d-flex ">
                  <div class="icon_yellow_bg">
                  <span class="iconify icon_header_pentadbir" data-icon="mdi-account-cowboy-hat" style="font-size
                        : 2em;"></span>
                  </div>
                            <h3 class="col-11" >PERANAN</h3>
                  <!-- <h3 id="nonjps_label" >SENARAI AUDIT TRAIL INTEGRASI</h3> -->
                </div>
                <div class="col-md-8 col-xs-12 userlist_content_header_right d-flex">
                  <a href="/add-selenggara-pengurusan-peranan"><button class="add_pengguna"  style="height: 39px; width:120px; display: flex; align-items: center;">
                    <i class="ri-add-circle-fill icon_white ri-2x" style=""></i>Peranan
                  </button></a>
                  {{-- <button 
                  class="printing"
                  style="height: 39px; width: 55px; display: flex; align-items: center;"
                  >
                    <i class="ri-printer-fill icon_white ri-2x"></i>
                  </button> --}}
                  <x-form.print></x-form.print>

                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container">
                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body p-3">
                                <table id="list_peranan" width="100%" class=" display p-3 userlist_tab_content_table table table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="100%">#</th>
                                            <th width="100%">Nama Peranan</th>
                                            <th width="100%">Penyedia</th> 
                                            <th width="100%">Penyemak</th>
                                            <th width="100%">Penyemak1</th>
                                            <th width="100%">Penyemak2</th> 
                                            <th width="100%">Pengesah</th> 
                                            <th width="100%">Dibuat Pada</th>
                                            <th width="100%">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div> <!-- end card-body-->
                        </div>
                  </div>
                    <div class="userlist_tab_content_table_footer">
                    </div>
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
        <!-- HEADER Section Ends -->
      </div>
      <!-- Mainbody_conatiner Starts -->
    </div>

    <!-- --------------- confirm pop-up --------- -->
          <section>
            <div class="add_role_sucess_modal_container">
                <div
                class="modal fade"
                id="add_role_sucess_modal-confirm"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
                >
                <div
                    class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
                    role="document"
                >
                    <div class="modal-content add_role_sucess_modal_content">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                        <button class="ml-auto" data-bs-dismiss="modal">
                          <i class="mdi mdi-window-close icon_white" id="close_image"></i>
                        </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3 style="font-size: 0.9rem; font-weight: 600;">Adakah anda pasti untuk memadam peranan ini?</h3>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup-confirm-ya" id="tutup-confirm">Ya</button>
                            <button data-dismiss="modal" class="tutup-confirm-tidak" id="close-confirm_btn">Tidak</button>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
          </section>
          <!-- -------------- peranan success-------- -->
        <section>
              <div class="add_role_sucess_modal_container">
                <div
                  class="modal fade"
                  id="peranan_sucess_modal"
                  tabindex="-1"#add_s
                  role="dialog"
                  aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true"
                >
                  <div
                    class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
                    role="document"
                  >
                    <div class="modal-content add_role_sucess_modal_content">
                      <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                          <button class="ml-auto" data-dismiss="modal" aria-label="Close">
                            <i class="mdi mdi-window-close icon_white"></i>
                          </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                          <h3 style="text-align:left; font-size: 0.9rem; font-weight: 600;">Terdapat pengguna aktif yang menggunakan peranan ini. Sila buang peranan ini dari pengguna aktif tersebut sebelum membuang peranan ini dari sistem.</h3>
                          <div class="text-center">
                            <button data-dismiss="modal" class="tutup" id="tutup_peranan_success">Tutup</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
<!-- --------------success------------ -->
<section>
      <div class="add_role_sucess_modal_container">
        <div
          class="modal fade"
          id="add_role_sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_sucess_modal_content">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                  <button class="ml-auto" data-dismiss="modal">
                    <i class="mdi mdi-window-close icon_white" id="close_image"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3 class="delete_success d-none" id="delete_success">Peranan telah dipadamkan</h3>
                  <h3 class="update_success d-none" id="update_success">Maklumat anda berjaya disimpan</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" class="tutup" id="succes_tutup">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- --------------- edit role--------------- -->

    <section>
      <div class="add_role_modal_container">
        <div
          class="modal fade"
          id="add_role_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_modal_content">
              <div class="add_role_modal_header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  {{-- <img src="{{ asset('dashboard/assets/images/add_plus.png') }}" alt="add_plus" /> --}}
                  <h5>Kemaskini Peranan</h5>
                </div>

                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                  <i class="mdi mdi-window-close icon_white" id="close_image"></i>
                </button>
              </div>
              <div class="modal-body add_role_modal_body">
                <div class="form-group row col-12" style="margin-top:20px;">
                  <label for="" class="col-md-6 col-xs-12 col-form-label">Nama Peranan</label>
                  <div class="col-md-6 col-xs-12 ">
                      <input type="text" class="form-control" id="nama_peranan" required name="nama_peranan" placeholder="" value="">
                      <span class="error" id="error_nama_peranan"></span>
                  </div>
                </div>
                <div class="form-group row col-12" style="margin-top:20px;">
                  <label for="" class="col-6 col-form-label">Penyedia</label>
                  <div class="col-6">
                  <input class="form-check-input edit_peran" type="checkbox" id="penyedia" name="penyedia" value="">
                  </div>
                </div>
                <div class="form-group row col-12" style="margin-top:20px;">
                  <label for="" class="col-6 col-form-label">Penyemak</label>
                  <div class="col-6">
                  <input class="form-check-input edit_peran" type="checkbox" id="penyemak" name="penyemak" value="">
                  </div>
                </div>
                <div class="form-group row col-12" style="margin-top:20px;">
                  <label for="" class="col-6 col-form-label">Penyemak 1</label>
                  <div class="col-6">
                  <input class="form-check-input edit_peran" type="checkbox" id="penyemak_1" name="penyemak_1" value="" > 
                  </div>
                </div><div class="form-group row col-12" style="margin-top:20px;">
                  <label for="" class="col-6 col-form-label">Penyemak 2</label>
                  <div class="col-6">
                  <input class="form-check-input edit_peran" type="checkbox" id="penyemak_2" name="penyemak_2" value="" >
                  </div>
                </div><div class="form-group row col-12" style="margin-top:20px;">
                  <label for="" class="col-6 col-form-label">Pengesah</label>
                  <div class="col-6">
                  <input class="form-check-input edit_peran" type="checkbox" id="pengesah" name="pengesah" value="">
                  </div>
                </div>
              </div>
              <div class="add_role_modal_footer text-center">
                <button type="button"
                  id="simpan-pop"
                >
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
@include('users.peranan.peranan-scripts')
