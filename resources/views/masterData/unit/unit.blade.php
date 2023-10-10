@extends('layouts.main.master_responsive')

@section('content_main')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('masterData.unit.style')

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
              <h4>Selenggara Data</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="/home" style="display: flex; align-items: center;">
                    <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                    Pentadbir
                    <img
                      class="arrow_nav ml-2"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                    />
                  </a>
                </li>        
                <li>
                  <a href="/master">
                    Selenggara Data
                    <img
                      class="arrow_nav"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                  /></a>
                </li>
                <li><a href="/Unit" class="active text-secondary">Unit</a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header row">
                <div class="userlist_content_header_left d-flex col-lg-7 col-md-7 col-12">
                <div class="icon_yellow_bg">
                <span class="iconify icon_header_pentadbir" data-icon="mdi-database-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="spatial_label">SENARAI DATA SPATIAL</h3>                
                  <h3 id="nonspatial_label" >SENARAI DATA NON-SPATIAL</h3>
                </div>
                <div class="userlist_content_header_right d-flex col-lg-5 col-md-5 col-12">
                <button
                    class="add_pengguna"
                    data-target="#add_selenggara_data_modal"
                    data-toggle="modal"
                    style="height: 39px; width:125px; display: flex; align-items: center;"
                    >
                      <i class="ri-add-circle-fill icon_white ri-2x"></i>
                       Data Unit 
                  </button>
                  <x-form.print></x-form.print>

                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container">
                  <button onclick="nonspatial()">DATA NON-SPATIAL</button>
                  <button onclick="spatial()">DATA SPATIAL</button>

                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="master_data" width="100%" class="display p-3 userlist_tab_content_table table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Nama Unit</th>                           
                                        <th>Tarikh Kemaskini</th>
                                        <th>Dikemaskini Oleh</th> 
                                        <th>Status</th>  
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
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body border p-3">
                               
                            </div> <!-- end card-body-->
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
                  <h5> Data Unit</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <i class="mdi mdi-window-close icon_white"></i>
                </button>
              </div>
              <div class="modal-body add_selenggara_data_modal_body">
                <form id="rmkForm">
                    <input type="hidden" value="" id="update_id">
                    <div class="form-group">
                      <label for="nama_unit">Nama Unit</label>
                      <input
                        type="text"
                        id="add_nama_unit"
                        name="add_nama_unit"
                        class="form-control"
                        autocomplete="off"
                      >
                    </div>
                    <div class="add_masterdata_data_modal_footer d-flex justify-content-center">
                        <button type="button" class="btn btn-kembali m-2" data-dismiss="modal">Kembali</button>
                        <button type="button" id="addUnitBtn" class="btn btn-simpan m-2">Simpan</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="add_selenggara_data"></div>
    </section>
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
                    <h5> Data Unit</h5>
                  </div>
  
                  <button type="button" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="modal-body add_selenggara_data_modal_body">
                  <form id="edit_rmkForm">
                      <input type="hidden" value="" id="update_id">
                      <div class="form-group">
                        <label for="edit_nama_unit">Nama Unit</label>
                        <input
                          type="text"
                          id="edit_nama_unit"
                          name="edit_nama_unit"
                          class="form-control"
                          autocomplete="off"
                        >
                      </div>
                      <div class="add_masterdata_data_modal_footer d-flex justify-content-center">
                          <button type="button" class="btn btn-kembali m-2" data-dismiss="modal">Kembali</button>
                          <button type="button" id="edit_unit_Btn" class="btn btn-simpan m-2">Simpan</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="add_selenggara_data"></div>
      </section>
      @include('masterData.unit.script')

    
@endsection