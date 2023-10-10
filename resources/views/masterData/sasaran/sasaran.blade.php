@extends('layouts.main.master')

@section('content_main')

@include('masterData.sasaran.style')

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
              <li>
                <a href="/Kementerian">
                  Kementerian
                  <img
                    class="arrow_nav"
                    src="{{ asset('images/arroew.png') }}"
                    alt="arroew"
                /></a>
              </li>
              <li><a href="#" class="active"> Jabatan</a></li>
            </ul>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header">
                <div class="userlist_content_header_left d-flex col-md-7 col-xs-12"">
                <div class="icon_yellow_bg">
                <span class="iconify icon_header_pentadbir" data-icon="mdi-database-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="spatial_label">DATA SPATIAL</h3>                
                  <h3 id="nonspatial_label" >DATA NON-SPATIAL<span id="headerBreadcrum">  </span></h3>
                </div>
                <div class="userlist_content_header_right d-flex">
                <button
                    class="add_pengguna"
                    data-target="#add_selenggara_data_modal"
                    data-toggle="modal"
                    style="height: 39px; width:145px; display: flex; align-items: center;"
                    >
                      <i class="ri-add-circle-fill icon_white ri-2x pl-2" style="margin: 0.25rem;"></i>Tambah Data Sasaran
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
                                    <th class="float-left">Nama Sasaran</th>                           
                                    <th>BIL</th>
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
                  <h5>Tambah Data Sasaran</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <i class="mdi mdi-window-close icon_white"></i>
                </button>
              </div>
              <div class="modal-body add_selenggara_data_modal_body">
                <form id="jabatanForm"   role="form">
                <input type="hidden"  id="id" name="id">
                <div class="form-group">
                    <label for="nama">SDG</label>
                    <select  class="form-control form-select" name="SDG_id" id="kementerian">  
                    <option value=""> --Pilih--</option>                                            
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Sasaran</label>
                    <input
                      type="text"
                      class="form-control"
                      id="nama"
                      name="Sasaran"
                      value=""
                    />
                  </div>
                <div class="form-group">
                    <label for="nama">BIL</label>
                    <input
                      type="text"
                      class="form-control"
                      id="code"
                      name="BIL"
                      value=""
                    />
                  </div>
                  <div class="form-group position-relative">
                    <label for="Keterangan">Keterangan</label>
                    <textarea
                      type="text"
                      id="Keterangan"
                      name="description"
                      class="form-control"
                    ></textarea>
                    <!-- <p class="position-absolute textarea_depender">
                      patah perkataan 0 dari 250
                    </p> -->
                  </div>
                
                <div class="add_selenggara_data_modal_footer text-center">
                  <!-- <button
                    data-toggle="modal"
                    data-target="#add_selenggara_data_sucess_modal"
                    data-dismiss="modal"
                  >
                    Kembali
                  </button> -->
                  <input type="submit" class="btn btn-success" id="submit" value="Simpan">
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="add_selenggara_data"></div>
    </section>
    {{-- success modal --}}
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
                  <button class="ml-auto" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Maklumat anda berjaya disimpan</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" id="tutup" class="tutup">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('masterData.sasaran.script')

@endsection