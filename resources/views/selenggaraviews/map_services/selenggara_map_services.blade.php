
@include('selenggaraviews.map_services.style')
@extends('layouts.main.master_responsive')

@section('content_main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <x-form.spinner>
          <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner>
        <!-- HEADER Section starts -->
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
              <h4>Selenggara <i>Map Services</i> dan Integrasi</h4>
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
                <li><a href="/selenggara_map_services" class="active text-secondary"> Selenggara <i>Map Services</i> dan Integrasi</a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header row">
                <div class="col-md-5 col-xs-12 userlist_content_header_left d-flex">
                  <div class="icon_yellow_bg">
                  <span class="iconify icon_header_pentadbir" data-icon="mdi-map-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="jps_label">SENARAI MAP SERVICES</h3>
                  <h3 id="nonjps_label" >SENARAI DATA INTEGRASI</h3>
                </div>
                <div class="col-md-7 col-xs-12 userlist_content_header_right d-flex">
                  <a data-target="#add_selenggara_data_modal"
                    data-toggle="modal">
                    <button class="add_pengguna" style="height: 39px; width:100px; display: flex; align-items: center;">
                      <i class="ri-add-circle-fill icon_white ri-2x pl-2" style=""></i> Data
                    </button>
                  </a>
                  <button 
                  class="printing" 
                  onclick="window.print()"
                  style="height: 39px; width: 55px; display: flex; align-items: center;"
                  >
                    <i class="ri-printer-fill icon_white ri-2x"></i>
                  </button>
                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container" style="border-bottom: 3px solid #dee2e6;">
                  <button onclick=mpagedata() ><i>Map Services</i></button>
                  <button onclick=integrasi() class="active">INTEGRASI</button>
                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body p-3">
                                <table id="jps_user" width="100%" class=" display p-3 userlist_tab_content_table table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="100%">Nama Servis</th>
                                            <th width="100%">Modul</th>
                                            <th width="100%">Pautan API</th> 
                                            <th width="100%">Server</th> 
                                            <th width="100%">Status</th>              
                                            <th width="100%">Pautan</th>              
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
                        <div id="agensi_card" class="card-body p-3 table_scroll">
                            <table id="agensi_user" width="100%" class="display p-3 userlist_tab_content_table table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. Kad Pengenalan</th>
                                        <th>Emel</th> 
                                        <th>Jabatan</th> 
                                        <th>Jawatan</th> 
                                        <th>Aktif/Tidak Aktif</th>             
                                        <th>Dokumen Sokongan</th>
                                        <th>Peranan</th> 
                                        <th>Tindakan</th>               
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
    <!-- script section starts -->
     {{-- Add Modul modal --}}
     <section>
        <div class="add_selenggara_data_modal_container">
          <div
            class="modal fade"
            id="add_selenggara_data_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered add_selenggara_data_modal_dialog"
              role="document"
            >
              <div class="modal-content add_selenggara_data_modal_content">
                <div
                  class="add_selenggara_data_modal_header d-flex justify-content-between"
                >
                  <div class="d-flex align-items-center">
                    <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                    <h5>Data Bahagian</h5>
                  </div>
  
                  <button type="button" data-dismiss="modal" aria-label="Close">
                    <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
                  </button>
                </div>
                <div class="modal-body add_selenggara_data_modal_body">
                  <form id="modul_form" role="form">
                    <input type="hidden"  id="id" name="id">
                    <div class="form-group">
                        <label for="modul_name">Nama Servis</label>
                        <input
                            type="url"
                            class="form-control"
                            id="nama_servis"
                            name="nama_servis"
                            required
                        />
                        </div>
                        <div class="form-group">
                          <label for="modul">Modul</label>
                          <select required  class="form-control form-select" name="modul_name" id="modul_name">                        
                            <option value='' id='' selected>--Pilih--</option>
                            </select>
                          </div>
                    <div class="form-group">
                        <label for="pautan_nama">Pautan API</label>
                        <input
                            type="url"
                            class="form-control"
                            id="pautan_nama"
                            name="pautan_nama"
                            required
                        />
                        </div>
                        <div class="form-group">
                        <label for="server">Server</label>
                        <input type="text" class="form-control"
                        id="server"
                        name="server"
                        required
                        >
                        </div>
                        <label class="text-danger" id="errorLabel"></label>
                        <div class="add_selenggara_data_modal_footer text-center">
                            <input type="button" class="btn btn-danger m-4" id="close" value="Batal" data-dismiss="modal" aria-label="Close">
                            <input type="button" class="btn btn-primary m-4" id="mapDatasubmit" value="Simpan">
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- Edit Modul modal --}}
    <section>
      <div class="add_selenggara_data_modal_container">
        <div
          class="modal fade"
          id="edit_selenggara_data_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
          
        >
          <div
            class="modal-dialog modal-dialog-centered add_selenggara_data_modal_dialog"
            role="document"
          >
            <div class="modal-content add_selenggara_data_modal_content">
              <div
                class="add_selenggara_data_modal_header d-flex justify-content-between"
              >
                <div class="d-flex align-items-center">
                  <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                  <h5> Data Bahagian</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
                </button>
              </div>
              <div class="modal-body add_selenggara_data_modal_body">
                <form id="modul_form2" role="form">
                  <input type="hidden"  id="id" name="id">
                  <div class="form-group">
                    <label for="modul_name">Nama Servis</label>
                    <input
                        type="url"
                        class="form-control"
                        id="edit_nama_servis"
                        name="edit_nama_servis"
                        required
                    />
                    </div>
                    <div class="form-group">
                      <label for="modul">Modul</label>
                      <select required  class="form-control form-select" name="edit_modul_name" id="edit_modul_name">                        
                        <option value='' id='' selected>--Pilih--</option>
                        </select>
                      </div>
                <div class="form-group">
                    <label for="pautan_nama">Pautan API</label>
                    <input
                        type="url"
                        class="form-control"
                        id="edit_pautan_nama"
                        name="edit_pautan_nama"
                        required
                    />
                    </div>
                    <div class="form-group">
                    <label for="server">Server</label>
                    <input type="text" class="form-control"
                    id="edit_server"
                    name="edit_server"
                    required
                    >
                    </div>
                      <label class="text-danger" id="edit_errorLabel"></label>
                      <div class="add_selenggara_data_modal_footer text-center">
                          <input type="button" class="btn btn-danger m-4 col-2" id="close" value="Batal" data-dismiss="modal" aria-label="Close">
                          <input type="button" class="btn btn-primary m-4 col-2" id="edit_submit" value="Simpan">
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('selenggaraviews.map_services.script')
    @endsection
