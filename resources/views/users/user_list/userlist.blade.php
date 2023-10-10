@include('users.user_list.style')
@extends('layouts.main.master_responsive')
@section('content_main')

<?php header('Access-Control-Allow-Origin: *'); ?>
<x-form.spinner>
    <x-slot name="message">
      Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
</x-form.spinner>
    <!-- Mainbody_conatiner Starts -->
    <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <!-- HEADER Section starts -->
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
              <h4>Profil Pengguna</h4>
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
                <li><a href="/userlist" class="active text-secondary"> Profil Pengguna</a></li>
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
                  <h4 id="jps_label">SENARAI PENGGUNA</h4>
                  <h4 id="nonjps_label" >SENARAI PENGGUNA AGENSI LUAR</h4>
                  </div>
                </div>
                <div class="userlist_content_header_right d-flex col-md-7 col-xs-12">
                  <a href="/daftar-pengguna-baharu"><button class="add_pengguna pt-2" style="width: 150px;
                    height: 39px; display: flex; align-items: center;" >
                    <i class="ri-add-circle-fill icon_white ri-2x pl-2" style="margin: 0.25rem;"></i>
                    Pengguna
                  </button></a>
                  <div>
                 <a class=""><button id="excelBtn" class="printing btn btn-info" style="height: 39px; width: 60px; display: flex; align-items: center;">
                      <i class="ri-printer-fill icon_white ri-2x"></i>
                      {{-- <button id="excelBtn2" class="printing  btn btn-info">
                        <i class="ri-printer-fill icon_white ri-2x"></i>
                      </button> --}}
                    </a>
                    <a class=""><button id="excelBtn2" class="printing btn btn-info " style="height: 39px; width: 60px; display: flex; align-items: center;">
                      <i class="ri-printer-fill icon_white ri-2x"></i>
                      {{-- <button id="excelBtn2" class="printing  btn btn-info">
                        <i class="ri-printer-fill icon_white ri-2x"></i>
                      </button> --}}
                    </a>
                  </div>
                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container" style="border-bottom: 3px solid #dee2e6;">
                  <button onclick="jps_user()">JPS</button>
                  <button onclick="agensi_user()">AGENSI LUAR</button>
                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body p-3">
                                <table id="jps_user" class=" display p-3 userlist_tab_content_table table table-responsive" style="width: 100%!important;">
                                    <thead>
                                        <tr>
                                            <th width="100%">Nama</th>
                                            <th width="100%">No. Kad Pengenalan</th>
                                            <th width="100%">Emel</th> 
                                            <th width="100%">Bahagian</th> 
                                            <th width="100%">Jawatan</th> 
                                            <th width="100%">Aktif/Tidak Aktif</th> 
                                            <th width="100%">Peranan</th> 
                                            <th width="100%">Tindakan Oleh</th>               
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
                        <div id="agensi_card" class="card-body p-3">
                            <table id="agensi_user" class="display p-3 userlist_tab_content_table table table-responsive" style="width: 100%!important;">
                                <thead>
                                    <tr>
                                        <th width="100%">Nama</th>
                                        <th width="100%">No. Kad Pengenalan</th>
                                        <th width="100%">Emel</th> 
                                        <th width="100%">Jabatan</th> 
                                        <th width="100%">Jawatan</th> 
                                        <th width="100%">Aktif/Tidak Aktif</th>             
                                        <th width="100%">Dokumen Sokongan</th>
                                        <th width="100%">Peranan</th> 
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
        <!-- HEADER Section Ends -->
      </div>

      <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>

      <!-- Mainbody_conatiner Starts -->
    </div>

@include('users.user_list.script')      
@endsection