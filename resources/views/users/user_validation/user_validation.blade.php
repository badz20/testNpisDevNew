@include('users.user_validation.style')
@extends('layouts.main.master_responsive')
@section('content_main')

<x-form.spinner>
    <x-slot name="message">
      Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner>
          <!-- Mainbody_conatiner Starts -->
          <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
            <div class="Mainbody_content mtop">
              <div class="Mainbody_content_nav_header row project_register">
                <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
                  <h4>Pengesahan Pengguna Baharu</h4>
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
                        <img
                          class="arrow_nav"
                          src="{{ asset('images/arroew.png') }}" 
                          alt="arroew"
                      /></a>
                    </li> --}}
                    <li><a href="/pengesahan-pengguna-baharu" class="active text-secondary"> Pengesahan Pengguna Baharu</a></li>
                  </ul>
                </div>
              </div>
              <div class="userlist_container">
                <div class="userlist_content">
                  <div class="userlist_content_header row">
                    <div class="userlist_content_header_left d-flex col-md-5 col-xs-12">
                      <div class="icon_yellow_bg">
                        <span class="iconify icon_header_pentadbir" data-icon="mdi-card-account-details-outline" style="font-size
                        : 2em;"></span>
                      </div>
                      <div class="project_register ">
                      <h3 id="new_nonjps_label">SENARAI PENGGUNA BAHARU AGENSI LUAR</h3>
                      <h3 id="new_jps_label">SENARAI PENGGUNA BAHARU JPS</h3>
                    </div>
                    </div>
                    <div class="userlist_content_header_right d-flex col-md-7 col-xs-12">
                        <a href="/daftar-pengguna-baharu">
                          <button class="add_pengguna" style="height: 39px; width:150px; display: flex; align-items: center;">
                            <i class="ri-add-circle-fill icon_white ri-2x" style="margin: 0.25rem;"></i>
                            Pengguna
                          </button></a>
                          <div>
                            <a class="m-1">
                            <button id="excelBtn" class="printing h-100 btn btn-info p-0">
                             <i class="ri-printer-fill icon_white ri-2x mx-1"></i>
                            </button>
                            <button id="excelBtn2" class=" printing h-100 btn btn-info p-0">
                              <i class="ri-printer-fill icon_white ri-2x mx-1"></i>
                            </button>
                            <button id="excelBtn3" class=" printing h-100 btn btn-info p-0">
                              <i class="ri-printer-fill icon_white ri-2x mx-1"></i>
                            </button>
                            </a>
                          </div>
                    </div>
                  </div>
                  <input type="hidden" id="api_url" value={{env('API_URL')}}>
                  <input type="hidden" id="token" value={{env('TOKEN')}}>
                  <div class="userlist_tab_container">
                    <div class="userlist_tab_btn_container" style="border-bottom: 3px solid #dee2e6;">
                      <button class="active" onclick="new_jps_user()">JPS</button>
                      <button  onclick="new_agensi_user()">AGENSI LUAR</button>
                      <button onclick="rejected_user()">Pengguna Batal</button>
                    </div>
                    <div class="userlist_tab_content_container">
                      <div class="userlist_tab_content">
                            <div class="userlist_tab_contents_holder">
                                <div id="new_jps_card" class="card-body">
                                    <table id="new_jps_user" width="100%" class="display p-3 userlist_tab_content_table table table-responsive">
                                        <thead style=" white-space: nowrap;">
                                            <tr>
                                                <th width="100%">Nama</th>
                                                <th width="100%">No. Kad Pengenalan</th>
                                                <th width="100%">Emel</th> 
                                                <th width="100%">Jabatan</th> 
                                                <th width="100%">Jawatan</th> 
                                                <th width="100%">No. Telefon</th> 
                                                <th width="100%" class="not-export-col col-3">Tindakan</th>               
                                            </tr>
                                        </thead>
                                        <tbody >
                                        </tbody>
                                    </table>
                                </div> <!-- end card-body-->
                            </div>
                      </div>
                      <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="new_agensi_card" class="card-body">
                                <table id="new_agensi_user" width="100%" class="display p-3 userlist_tab_content_table table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="100%">Nama</th>
                                            <th width="100%">No. Kad Pengenalan</th>
                                            <th width="100%">Emel</th> 
                                            <th width="100%">Jabatan</th> 
                                            <th width="100%">Jawatan</th> 
                                            <th width="100%">No. Telefon</th> 
                                            <th width="100%" class="not-export-col">Dokumen Sokongan</th>
                                            <th width="100%" class="not-export-col">Tindakan </th>                
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
                            <div id="rejected_user_card" class="card-body">
                                <table id="rejected_user_table" width="100%" class="display p-3 userlist_tab_content_table table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="100%">Nama</th>
                                            <th width="100%">No. Kad Pengenalan</th>
                                            <th width="100%">Emel</th> 
                                            <th width="100%">Jabatan</th> 
                                            <th width="100%">Jawatan</th> 
                                            <th width="100%">No. Telefon</th> 
                                            <th width="100%" class="not-export-col">Dokumen Sokongan</th>
                                            <th width="100%">Status</th>
                                            <th width="100%">Tindakan Oleh</th>                
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
                          <i class="mdi mdi-window-close" id="close_image"></i>
                        </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3 style="font-size: 0.9rem; font-weight: 600;">Adakah Anda Pasti?</h3>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup p-2" id="tutup" style="width:80px; background-color: #0ACf97;">Ya</button>
                            <button data-dismiss="modal" class="tutup p-2" id="close" style="width:80px; background-color: #fa5c7c;">Tidak</button>
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
                        Pendaftaran telah diluluskan
                        </h3>
                        <div class="text-center">
                        <button data-dismiss="modal" id="confirm_close">Tutup</button>
                        </div>
                    </div>
                    <div class="sucess_msg" style="top:10% !important; left:45% !important;">
                        <img class="img-responsive" height="54px" src="assets/images/coolicon.png" alt="" />
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section>
            <div class="add_role_sucess_modal_container">
                <div
                class="modal fade"
                id="reject_mode_sucess_modal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
                data-backdrop="static"
                data-keyboard="false"
                >
                <div
                    class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
                    role="document"
                >
                    <div class="modal-content add_role_sucess_modal_content">
                      <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                          <button class="ml-auto" data-dismiss="modal">
                            <i class="mdi mdi-window-close" id="close_image"></i>
                          </button>
                        </div>
                        <div class="comment"> 
                          <h5 style="font-size: 0.9rem;">Sila nyatakan komen anda dibawah:</h5>
                        </div>
                          <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                          <h5 style="font-size: 0.8rem;">Komen: <br/></h5>
                          <div class="reject_comment">
                          <textarea class="form-control" style="font-size: 0.8rem;" rows="3" id="komen" name="komen"></textarea>
                          </div>
                          <span class="error" id="error_komen"></span>                               
                          <div class="text-center">
                              <button data-dismiss="modal" id="Reject" style="width:45%">Tidak Diluluskan</button>
                              <button data-dismiss="modal" id="Update">Kemaskini Permohonan</button>
                          </div>
                          </div>
                          
                      </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
@include('users.user_validation.script')      
@endsection