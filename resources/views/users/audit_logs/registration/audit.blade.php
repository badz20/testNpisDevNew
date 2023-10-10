@include('users.audit_logs.audit_trail.style')

@extends('layouts.main.master_responsive')

@section('content_main')
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
              <h4>Audit Trail - Pendaftaran</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#"  style="display: flex; align-items: center;">
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
                <li>
                  <a href="/audit-logs">
                    Audit Trail
                    <img
                      class="arrow_nav"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                  /></a>
                </li>
                <li><a href="/registration-logs" class="active text-secondary"> Log Pendaftaran</a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header">
                <div class="userlist_content_header_left d-flex">
                  <div class="icon_yellow_bg">
                  <span class="iconify icon_header_pentadbir" data-icon="mdi-database-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="jps_label">SENARAI AUDIT TRAIL</h3>
                  <!-- <h3 id="nonjps_label" >SENARAI AUDIT TRAIL INTEGRASI</h3> -->
                </div>
                <div class="userlist_content_header_right d-flex">
                    <a data-target="#add_selenggara_data_modal"
                    data-toggle="modal">
                  <button class="add_pengguna d-none">
                    <img src="images/add_plus.png" alt="" />
                  </button></a>
                  <div>
                    <a class="m-1">
                      <button 
                      id="excelBtn" 
                      class="printing"
                      style="height: 39px; width: 55px; display: flex; align-items: center;"
                      >
                        <i class="ri-printer-fill icon_white ri-2x"></i>
                    </button>
                    </a>
                  </div>
                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">

                          <div id="jps_card" class="card-body p-3">
                            <div class="dic_date col-md-5 col-xs-6 row" style="justify-content: right;">
                              <input type="text" name="datefilter" id="datefilter" class="form-control datefilter col-md-6 col-xs-8 mr-3 my-2" autocomplete="off" placeholder="dd/mm/yyyy - dd/mm/yyyy" value="" />
                              <select id="mySelect" class="form-control col-md-4 col-xs-8 my-2">
                                  <option value="">--Pilih--</option>
                                  <option value="1">Hari Ini</option>
                                  <option value="2">7 Hari Lalu</option>
                                  <option value="3">30 Hari Lalu</option>
                                  <option value="4">Bulan Ini</option>
                                  <option value="5">Bulan Lepas</option>
                                  <option value="6">Tahun Ini</option>
                                  <option value="7">Tahun Lepas</option>
                              </select>
                              
                            </div>
                              <table id="jps_user" width="100%" class=" display p-3 userlist_tab_content_table table table-responsive">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>No. Kad Pengenalan</th>
                                          <th>Nama</th>
                                          <th>Jawatan</th> 
                                          <th>Nama Pegawai</th>
                                          <th>Pegawai Jawatan</th>
                                          <th>Tindakan</th> 
                                          <th>Dibuat Pada</th> 
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
@endsection
@include('users.audit_logs.registration.script')
