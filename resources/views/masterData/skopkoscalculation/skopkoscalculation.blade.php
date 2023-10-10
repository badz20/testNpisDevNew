@extends('layouts.main.master')

@section('content_main')

@include('masterData.skopkoscalculation.style')

      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner user_profile">
        <x-form.spinner>
          <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner>
        <!-- HEADER Section starts -->
        <div class="Mainbody_content">
          <div class="Mainbody_content_nav_header d-flex">
            <h4>Selenggara Data</h4>
            <ul class="path_nav">
            <li>
                <a href="#"
                  ><img
                    src="{{ asset('images/Vector-10.png') }}"
                    class="globe"
                    alt="globe"
                  />
                  Pentadbir
                  <img
                    class="arrow_nav"
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
              <li><a href="#" class="active"> Skop Kos Calculation</a></li>
            </ul>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header">
                <div class="userlist_content_header_left d-flex">
                <div class="icon_yellow_bg">
                <span class="iconify icon_header_pentadbir" data-icon="mdi-database-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="spatial_label">DATA SPATIAL</h3>                
                  <h3 id="nonspatial_label" >DATA NON-SPATIAL</h3>
                </div>
                <div class="userlist_content_header_right d-flex">
                <button
                    class="add_pengguna"
                    data-target="#add_selenggara_data_modal"
                    data-toggle="modal"
                    style="height: 39px; width:145px; display: flex; align-items: center;"
                    >
                      <i class="ri-add-circle-fill icon_white ri-2x pl-2" style="margin: 0.25rem;"></i>Tambah Data Skop Kos Calculation
                  </button>
                  <x-form.print></x-form.print>

                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container">
                  <button  class="active">DATA NON-SPATIAL</button>
                  <button >DATA SPATIAL</button>

                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="master_data" width="100%" class="display p-3 userlist_tab_content_table table">
                                <thead>
                                    <tr>
                                    <th class="float-left">Total Cost</th>                           
                                    <th>P Min</th> 
                                    <th>P Max</th> 
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
                  <h5>Tambah Data Skop Kos Calculation</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <i class="mdi mdi-window-close icon_white"></i>
                </button>
              </div>
              <div class="modal-body add_selenggara_data_modal_body">
                <form id="rmkForm">
                    <input type="hidden" value="" id="update_id">
                    <div class="form-group">
                      <label for="total_cost">Total Cost</label>
                      <input type="number" required min="0" id="total_cost" name="total_cost" class="form-control" autocomplete="off">
                      <span class="error" id="error_total_cost"></span>
                    </div>
                    <div class="form-group">
                      <label for="p_min">P Min</label>
                      <input type="number" required  min="0" id="p_min" name="p_min" class="form-control" autocomplete="off">
                      <span class="error" id="error_p_min"></span>
                    </div>
                    <div class="form-group">
                      <label for="p_max">P Maxs</label>
                      <input type="number" required  min="0" id="p_max" name="p_max" class="form-control" autocomplete="off">
                      <span class="error" id="error_p_max"></span>
                    </div>
                    <div class="add_masterdata_data_modal_footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger m-2">Kembali</button>
                        <button type="button" id="addSkopCostBtn" class="btn btn-success m-2">Simpan</button>
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
                    <h5>Tambah Data Skop Kos Calculation</h5>
                  </div>
  
                  <button type="button" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="modal-body add_selenggara_data_modal_body">
                  <form id="edit_rmkForm">
                      <input type="hidden" value="" id="update_id">
                      <div class="form-group">
                        <label for="edit_total_cost">Total Cost</label>
                        <input type="number" required min="0" id="edit_total_cost" name="edit_total_cost" class="form-control" autocomplete="off">
                        <span class="error" id="error_edit_total_cost"></span>
                      </div>
                      <div class="form-group">
                        <label for="edit_p_min">P Min</label>
                        <input type="number" required min="0" id="edit_p_min" name="edit_p_min" class="form-control" autocomplete="off">
                        <span class="error" id="error_edit_p_min"></span>
                      </div>
                      <div class="form-group">
                        <label for="edit_p_max">P Maxs</label>
                        <input type="number" required min="0" id="edit_p_max" name="edit_p_max" class="form-control" autocomplete="off">
                        <span class="error" id="error_edit_p_max"></span>
                      </div>
                      <div class="add_masterdata_data_modal_footer d-flex justify-content-center">
                          <button type="button" class="btn btn-danger m-2">Kembali</button>
                          <button type="button" id="editSkopCostBtn" class="btn btn-success m-2">Simpan</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="add_selenggara_data"></div>
      </section>
    
    @include('masterData.skopkoscalculation.script')

@endsection