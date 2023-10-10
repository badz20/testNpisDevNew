@include('users.dashboard.style')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')

<x-form.spinner>
  <x-slot name="message">
    Sila tunggu sebentar sementara data sedang dimuatkan
  </x-slot>
</x-form.spinner>

<div id="Mainbody_content" class="Mainbody_content mtop">
        <input type="hidden" id="api_url" value={{env('API_URL')}}>
        <input type="hidden" id="app_url" value={{env('APP_URL')}}>
        <input type="hidden" id="token" value={{env('TOKEN')}}>
        {{-- <div class="Mainbody_content_nav_header project_register row">
          <div class="col-md-7 col-xs-12 path_nav_col">
            <ul class="path_nav row">
              
              <li><a href="#" class="active text-secondary"> Dashboard</a></li>
            </ul>
          </div>
        </div> --}}
          <div class="Mainbody_content_nav_header d-flex project_register" style="margin-top:5%;">
            <h4 class="">Dashboard</h4>
            <ul class="path_nav ml-auto">
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
              <li>
                <a href="#" class="active"> Dashboard </a>
              </li>
            </ul>
          </div>
          <div class="dashboard_content_container">
            <div class="box_container row">
              <div class="col-lg-3 col-md-3 col-6 box_child">
                <div class="box_content">
                  <h3 id="userCount">0</h3>

                  <p>Pengguna Berdaftar</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-6 box_child">
                <div class="box_content">
                  <h3 id="usersJps">0</h3>
                  <p>Pengguna JPS</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-6 box_child">
                <div class="box_content">
                  <h3 id="usersAgensi">0</h3>
                  <p >Pengguna Agensi</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-6 box_child">
                <div class="box_content">
                  <h3 id="usersTemp">0</h3>
                  <p>Permohonan Baharu</p>
                </div>
              </div>
            </div>
            <!-- dashboard_chart_table_container starts -->
            <div class="dashboard_chart_table_container row">
              <div class="dashboard_chart_detail_container col-lg-3 col-md-4 col-12">
                <div class="dashboard_chart">
                  <!-- <h6>STATISTIK PELAWAT</h6> -->
                  <div id="bar_chart"></div>
                </div>
                <div class="dashboard_detail_container">
                  <h3>pengguna atas talian</h3>
                  <div class="dashboard_detail_content_container">
                    
                  </div>
                </div>
              </div>
              <div class="dashboard_table_container col-lg-9 col-md-8 col-12">
                <div class="dashboard_table_content">
                  <div class="dashboard_table_header">
                    <div class="dashboard_table_header_left d-flex">
                      <div class="icon_yellow_bg">
                        <span class="iconify icon_header_pentadbir" data-icon="mdi-card-account-details-outline" style="font-size
                        : 2em;"></span>
                      </div>
                      <h3>SENARAI PERMOHONAN BAHARU</h3>
                    </div>
                  </div>
                  <div class="dashboard_table_holder"><br>
                    <table id="temp_user" class="dashboard_table table table-responsive">
                      <thead id="dashboard_thead">
                          <tr>
                            <th width="100%">Nama</th>                           
                            <th class="text-center" width="100%">Emel</th> 
                            <th class="text-center" width="100%">Jabatan</th>
                            <th width="100%">Bahagian</th> 
                            <th class="text-center" width="100%">Jawatan</th>                            
                            <th class="text-center" width="100%">Dokumen Sokongan</th> 
                            <th class="text-center" width="100%">Tindakan</th>               
                          </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
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

      <!-- Mainbody_conatiner Starts -->
    </div>

    <section>
      <div class="container"></div>
    </section>
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
                          <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
                        </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3 style="font-size: 0.9rem;">Adakah Anda Pasti?</h3>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup" id="tutup" style="background-color: #0ACf97;">Ya</button>
                            <button data-dismiss="modal" class="tutup" id="close" style="background-color: #fa5c7c;">Tidak</button>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section>
            <div class="sucess_modal_container">
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
                        <h3 class="mt-3" style="font-size: 0.9rem;">
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
                        <button class="ml-auto" data-dismiss="modal" aria-label="Close">
                          <span class="iconify" data-icon="mdi-window-close" alt="close_img" id="close_image_new"></span>
                        </button>
                        </div>
                        <div class="comment"> 
                    <h5  style="font-size: 0.9rem; font-weight: 600;">Sila nyatakan komen anda dibawah:</h5>
                    </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h5 style="font-size: 0.8rem;">Komen: <br/></h5>
                        <div class="reject_comment">
                        <textarea class="form-control" rows="3" id="komen" name="komen" style="font-size: 0.8rem;"></textarea>
                        </div>
                        <span class="error" id="error_komen"></span>                               
                        <div class="text-center">
                            <button data-dismiss="modal" id="Reject">Tidak Diluluskan</button>
                            <button data-dismiss="modal" id="Update">Kemaskini Permohonan</button>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

@include('users.dashboard.script')      
</body>
@endsection