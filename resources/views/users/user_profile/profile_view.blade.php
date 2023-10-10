@include('users.user_profile.style')
@extends('layouts.main.master_responsive')
@section('content_main')

<?php header('Access-Control-Allow-Origin: *'); ?>

<x-form.spinner>
  <x-slot name="message">
    Sila tunggu sebentar sementara data sedang dimuatkan
  </x-slot>
</x-form.spinner>

@php
$user_is=Auth::user()->is_superadmin;
$super_admin=True;
if($user_is==1)
{
  $super_admin=false;
}
@endphp

    <!-- Mainbody_conatiner Starts -->
    <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
      <div class="Mainbody_content mtop">
        <div class="Mainbody_content_nav_header project_register row">
          <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
            <h4>Profil Pengguna</h4>
          </div>
          <div class="col-md-7 col-xs-12 path_nav_col"> 
            <ul class="path_nav row">
              @if ($super_admin)
                <li>
                  <a href="/user-profile" class="active" style="display: flex; align-items: center; color: #6c757d;">
                    <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                    Profil Pengguna
                  </a>
                </li>
              @else
                <li>
                  <a href="/home" class="text-info" style="display: flex; align-items: center;">
                    <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                    Pentadbir
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                  </a>
                </li>
                <li><a href="/user-profile" class="active" style="color: #6c757d;">Profil Pengguna</a></li>
              @endif
            </ul>
          </div>
          <div class="profile_view_parent_container row">
            <div class="profile_view_left_container col-lg-4 col-md-5 col-12">
              <div class="user_status_container">
                <div class="user_status_header d-flex">
                  <div class="ml-auto">
                    <label class="switch" @if ($super_admin) style="pointer-events: none;" @endif>
                      <input id="active_check" type="checkbox" checked/>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
                <span class="error" id="image_error" style="padding-left:30%;"></span>
                <div class="user_status_body">

                <form action="#" method="post" id="profile_view_form_image" name="myform_image">

                  <div class="user_profile_img_container d-none" id="regular_user_image">
                    <div class="user_profile_img">
                      <div id="profile-container">
                        <image src="{{ asset('assets/user_default.jpg') }}" id="gambar_image" name="gambar_image" />
                      </div>
                      <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
                    </div>
                    <button type="button" class="cam" id="cam" title="Klik disini untuk menukar gambar profil">
                      <i class="mdi mdi-camera" style="font-size: 2em;"></i>
                    </button>
                  </div>
                </form>

                  <div class="user_profile_img_container d-none" id="temp_user_image">
                    <div class="user_profile_img">
                    <img src="{{ asset('assets/user_default.jpg') }}" id="gambar_image" style="width:96% !Important; cursor:default;" class="border w-25 align-self-center rounded-circle" alt="...">
                    </div>
                  </div>
                  <h3><label id="nama_user"></label></h3>
                  <p><label id="user_data_type"></label></p>
                  <label class="active_button" id="active_label">Aktif</label>
                  <label class="in_active_button" id="inactive_label">Tidak Aktif</label>
                  <p id="jawatan_text"></p>
                  <p id="jabatan_text"></p>
                  <p id="bahagian_text"></p>
                </div>
              </div>
              <div class="user_role_container">
                <div class="user_role_header">
                  <div class="user_role_header_left align-items-center row">
                    <div class="d-flex align-items-center col-lg-5 col-md-12 col-12">
                      {{-- <img
                        src="{{ asset('dashboard/assets/images/man_hat.png') }}"
                        alt="man_hat"
                        class="man_icon"
                      /> --}}
                      <div class="icon_yellow_bg">
                        <i class="mdi mdi-account-cowboy-hat" style="color: #ffc35a; font-size: 1.5em;" alt="profile" ></i>
                      </div>
                      <h4 class="">PERANAN</h4>
                    </div>
                     <button
                      class="ml-auto"
                      data-toggle="modal"
                      data-target="#add_user_role_modal"
                      id="add_user_role_btn" @if ($super_admin) disabled @endif
                    > PERANAN</button>
                    
                    <div class="col-lg-4 col-md-12 col-12">
                      <button
                        class="ml-auto"
                        data-toggle="modal"
                        data-target="#add_user_permission_modal"
                        id="add_user_permission_btn" @if ($super_admin) disabled @endif
                        style="height: 38px; display: flex; align-items: center;"
                      >  <i class="ri-add-circle-fill icon_white ri-2x" style="margin: 0.25rem;"></i>
                      KEBENARAN</button>
                     </div>
                     <div class="col-lg-3 col-md-12 col-12 d-none">
                      <button
                        class="ml-auto d-none"
                        data-toggle="modal"
                        data-target="#add_role_modal"
                        id="add_role_btn" @if ($super_admin) disabled @endif
                      style="height: 38px; display: flex; align-items: center;"
                      >
                        <i class="ri-add-circle-fill icon_white ri-2x" style="margin: 0.25rem;"></i>
                        Peranan
                      </button>
                    </div>
                  </div>
                  <div class="user_role_content_container">
                    <div class="user_role_content d-flex">
                      <p id="peranan_id">Pengguna JUPEM</p>
                      <button>
                        <i class="ri-checkbox-indeterminate-line ri-xl" ></i>
                      </button>
                    </div>
                  </div>

                  <div class="peranan">
                    <div class="user_role_content d-flex">
                      <table class="table add_role_modak_table" id="add_role_modak_table-2">
                      <tbody id="peranan-pop-2">
                      </tbody>
                    </table>
                      <!-- <button>
                        <img src="{{ asset('assets/images/delete.png') }}" alt="minus" />
                      </button> -->
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="profile_view_right_container col-lg-8 col-md-7 col-12">
              <div class="profile_view_form_container">
                <div class="profile_view_form_header d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="icon_yellow_bg">
                      <i class="ri-account-circle-fill ri-2x" style="color: #ffc35a;" alt="profile" ></i>
                    </div>
                    <h4 class="">PROFIL</h4>
                  </div>
                  <!-- <button class="ml-auto">
                    <img
                      src="{{ asset('dashboard/assets/images/printer.png') }}"
                      alt="add_plus"
                      class=""
                    />
                  </button> -->
                  <div>
                    <x-form.print></x-form.print>
                  </div>
                </div>
                <div class="profile_view_form_content">
                  <form action="#" method="post" id="profile_view_form" name="myform">
                      <input type="hidden" id="api_url" value={{env('API_URL')}}>
                      <input type="hidden" id="token" value={{env('TOKEN')}}>
                      <input type="hidden" id="user_type" value="table_users">
                      <input type="hidden" id="user_id" name="id" value="{{$user_id}}">
                      <input type="hidden" id="jenis_pengguna_id" name="jenis_pengguna_id" value="">
                      <input type="hidden" class="form-control" id="current_box" name="current_box" value="">

                    <div class="input_container_row row">
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="nama" class="required">Nama</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="">
                        <span class="error" id="error_nama"></span>
                      </div>
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="Kad_Pengenalan" class="required">No. Kad Pengenalan</label>
                        <input type="text" class="form-control" id="no_kad_pengenalan" maxlength="12" name="no_kad_pengenalan" placeholder="" readonly>
                        <span class="error" id="error_no_kod_penganalan"></span>
                      </div>
                    </div>
                    <div class="input_container_row row">
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="No_Telefon">No. Telefon</label>
                        <input type="text" class="form-control" id="no_telefon" name="no_telefon" placeholder="">
                        <span class="error" id="error_no_telefon"></span>
                      </div>
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="Emel_Rasmi" class="required">Emel Rasmi</label>
                        <input type="text" class="form-control" id="emel_rasmi" name="emel_rasmi" placeholder="" readonly>
                        <span class="error" id="error_email"></span>
                      </div>
                    </div>
                    <div class="input_container_row row">
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="Jawatan" class="required">Jawatan</label>
                        <select id="Jawatan" class="form-control" name="Jawatan">
                        <option value="" > --Pilih--</option>
                        </select>
                        <span class="error" id="error_jawatan"></span>
                      </div>
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="Gred" class="required">Gred</label>
                        <select id="gred" class="form-control" name="gred">
                        <option value=""> --Pilih--</option>
                        </select>
                        <span class="error" id="error_gred"></span>
                      </div>
                    </div>
                    <div class="form-group select_content ">
                      <label for="Kementerian" class="required">Kementerian</label>
                      <select id="kementerian" name="kementerian" class="form-control" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                        <option value=""> --Pilih--</option>
                      </select>
                      <span class="error" id="error_kementerian"></span>
                      <input type="hidden" id="kementerian_jps_id" value="" name="kementerian_jps_id">
                    </div>
                    <div class="input_container_row row" id="jabatan_agensy_drop">
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <input type="radio" id="jabatan_agensy_drop_check" name="jabatan_agensy_drop_check" value="1" @if ($super_admin) disabled style="pointer-events: none;" @endif/><label for="Jabatan" class="required">Jabatan</label>
                        <select id="Jabatan" class="form-control" name="Jabatan" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                        <option value=""> --Pilih--</option>
                        </select>
                        <span class="error" id="error_jabatan"></span>
                        </select>
                      </div>

                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="Bahagian" class="required">Bahagian</label>
                        <select id="jabatan_bahagian" class="form-control" name="jabatan_bahagian" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                        <option value=""> --Pilih--</option>
                        </select>
                      </div>
                    </div>

                    <div class="input_container_row row" id="jabatan_jps_drop">
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <label for="Jabatan" class="required">Jabatan</label>
                          <div class="form_input">
                                  <input type="text" class="form-control" id="jabatan_jps" name="jabatan_jps" value="" @if ($super_admin) disabled @endif>
                                  <input type="hidden" id="jabatan_jps_id" value="" name="jabatan_jps_id">
                          </div>
                      </div>
                    </div>

                    <div class="form-group input_content">
                      <input type="radio" id="bahagian_drop_check" name="bahagian_drop_check" value="1" @if ($super_admin) style="pointer-events: none;" @endif /><label for="Bahagian" class="required">Bahagian</label>
                        <select id="bahagian" class="form-control" name="bahagian" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                        <option value=""> --Pilih--</option>
                        </select>
                        <span class="error" id="error_bahagian"></span>                                   
                    </div>
                    <div class="form-group input_content" id="pejabat_agensy_drop" @if ($super_admin) style="pointer-events: none;" @endif>
                      <input type="radio" id="pejabat_drop_check" name="pejabat_drop_check" value="1" @if ($super_admin) style="pointer-events: none;" @endif /><label for="Pejabat" class="col-form-label form_label">Pejabat projek</label>
                        <select type="text" class="form-control" name="pejabat" id="pejabat" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                          <option value=""> --Pilih--</option>
                        </select>
                    </div>

                    <div class="input_container_row row" id="jps_negeri">
                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <input type="radio" id="negeri_drop_check" name="negeri_drop_check" value="1" @if ($super_admin) style="pointer-events: none;" @endif /><label for="negeri" class="required" id="jps_negeri">JPS Negeri</label>
                        <select id="negeri" class="form-control" name="negeri" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                          <option value=""> --Pilih--</option>
                        </select>
                      </div>

                      <div class="form-group input_content col-lg-6 col-md-12 col-12">
                        <input type="radio" id="daerah_drop_check" name="daerah_drop_check" value="1" @if ($super_admin) style="pointer-events: none;" @endif /><label for="daerah" class="required" id="jps_daerah">JPS Daerah</label>
                        <select id="daerah" class="form-control" name="daerah" @if ($super_admin) disabled style="pointer-events: none;" @endif>
                          <option value=""> --Pilih--</option>
                        <select>
                        <span class="error" id="error_daerah"></span>
                      </div>
                    </div>

                    <div class="input_document_container row">
                      <div class="input_document_left_content col-lg-6 col-md-12 col-12">
                        <div class="form-group input_content">
                          <label for="Status">Status</label>
                          <select id="inputState" class="form-control" name="status"  @if ($super_admin) disabled @endif>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>                                
                          </select>
                        </div>
                        <div class="form-group input_content" id="doku_sec" style="display:none !important;">
                          <label for="Catatan">Dokumen Sokongan</label>
                          <div class="document d-flex">
                            <div class="pdf">
                              <img src="{{ asset('dashboard/assets/images/pdf.png') }}" alt="pdf" onClick="downloadDoc('{{$user_id}}','{{$temp_type}}')"/>
                            </div>
                            <div class="file_details">
                              <p id="document_name"></p>
                              <p id="document_size"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="input_document_right_content col-lg-6 col-md-12 col-12" id="profile_catatan" style="display:none;">
                        <div class="form-group input_content">
                          <label for="Catatan" class="required">Catatan</label>
                          <textarea class="form-control" rows="5" id="catatan" style="font-size:0.8rem" name="catatan" @if ($super_admin) disabled @endif></textarea>
                          <span class="error" id="error_catatan"></span>                         
                        </div>
                      </div>
                    </div>
                    <div class="input_container_row"></div>
                    <div class="profile_view_form_btn_container">
                      <button type="button" class="back">Kembali</button>
                      <button type="button" class="save" id="save">Simpan</button>
                    </div>
                  </form>
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
                  <img src="{{ asset('dashboard/assets/images/add_plus.png') }}" alt="add_plus" />
                  <h5>Peranan</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close" />
                </button>
              </div>
              <div class="modal-body add_role_modal_body">
                <div class="d-flex configuration">
                  <!-- <button class="ml-auto" id="konfig">konfigurasi peranan</button> -->
                  <button  class="ml-auto" id="konfig" style="background-color: #0acd95;border: none;border-radius: 5px;font-size: 0.88rem;color: #fff;padding: 1.3%;">
                      <img src="{{ asset('dashboard/assets/images/add_plus.png') }}"  alt="add_plus"/>
                      Peranan
                  </button>
                </div>
                <table class="table add_role_modak_table" id="add_role_modak_table">
                  <thead>
                    <tr>
                      <th>Peranan</th>
                      <th class="text-center">Pilih</th>
                      <!-- <th>Keterangan</th> -->
                    </tr>
                  </thead>
                  <tbody id="peranan-pop">
                  </tbody>
                </table>
              </div>
              <div class="add_role_modal_footer text-center">
                <button type="button" class="btn btn-success"
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


<!-- add user role starts -->
    <section>
      <div class="add_user_role_modal_container">


        <div
          class="modal fade"
          id="add_user_role_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
          data-backdrop="static" data-keyboard="false"
        >

        <x-form.spinner>
            <x-slot name="message">
              Sila tunggu sebentar sementara data sedang dimuatkan
            </x-slot>
        </x-form.spinner>

          <div
            class="modal-dialog modal-dialog-centered add_role_modal_dialog"
            role="document"
          >

            <div class="modal-content add_role_modal_content">
              <div class="add_role_modal_header d-flex justify-content-between text-white" style="background-color: #39afd1;padding: 2%;">
                <div class="d-flex align-items-center p-0">
                  <img src="{{ asset('dashboard/assets/images/add_plus.png') }}" alt="add_plus" />
                  <h5 class="" style="padding-top: 10px;margin-left: 5px">Tambah Peranan</h5>
                </div>

                <button class="btn btn close-peranan" type="button" id="close-peranan">
                  <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close" />
                </button>
              </div>
              <div class="modal-body add_role_modal_body">
                <div class="d-flex configuration">
                </div>
                <table class="table add_role_modak_table" id="add_role_modak_table">
                  <thead>
                    <tr>
                      <th>Peranan</th>
                      <th class="text-center">Pilih</th>
                      <!-- <th>Keterangan</th> -->
                    </tr>
                  </thead>
                  <tbody id="user-role-pop">
                  </tbody>
                </table>
              </div>
              <div class="add_role_modal_footer text-center p-2">
                <button type="button" class="btn btn-success"
                  id="simpan-user-role"
                >
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- add user Permission starts -->
  <!-- <section>
      <div class="add_user_role_modal_container">
        <div
          class="modal fade"
          id="add_user_permission_modal"
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
                  <img src="{{ asset('dashboard/assets/images/add_plus.png') }}" alt="add_plus" />
                  <h5>Tambah Kebenaran</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close" />
                </button>
              </div>
              <div class="modal-body add_role_modal_body">
                <div class="d-flex configuration">
                </div>
                <table class="table add_role_modak_table" id="add_role_modak_table">
                  <thead>
                    <tr>
                      <th>Kebenaran</th>
                      <th class="text-center">Pilih</th>
                    </tr>
                  </thead>
                  <tbody id="user-permission-pop">
                  </tbody>
                </table>
              </div>
              <div class="add_role_modal_footer text-center">
                <button type="button"
                  id="simpan-user-permission"
                >
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section>
      <div class="add_user_role_modal_container">

        <div
          class="modal fade"
          id="add_user_permission_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
          data-backdrop="static" data-keyboard="false"
        >

        <x-form.spinner>
            <x-slot name="message">
              Sila tunggu sebentar sementara data sedang dimuatkan
            </x-slot>
        </x-form.spinner>
        
          <div
            class="modal-dialog modal-dialog-centered add_role_modal_dialog"
            role="document" style="max-width:50% !important;"
          >
            <div class="modal-content add_role_modal_content">
              <div class="add_role_modal_header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <img src="{{ asset('dashboard/assets/images/add_plus.png') }}" alt="add_plus" />
                  <h5>Kebenaran</h5>
                </div>

                <button type="button"  class="close-peranan">
                  <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close" />
                </button>
              </div>
              <div class="modal-body add_role_modal_body" style="width:120% !important;">
                <div class="d-flex configuration">
                </div>

                <!-- new role popup -->

              <div class="project_register_tab_container row">        
              <div class="project_register_tab_content_container VAE-page col-10" style="width:100% !important;margin-bottom:0px !Important;">

              <form id="permissionForm">
                <div class="brief_project_container rmk">
                  <div class="acquistion-topic">
                    <hr>
                  </div>
                  <div class="accordion daya-accordion" id="accordionExample">
                    <div class="card d-none" id="permission_1">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#daya"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-3.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PENTADBIR</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="Permissionpentadbir" name="pentadbir_full_access" value="pentadbir_full_access">
                            </div>
                          </div>
                        </h2>
                      </div>

                      <div
                        id="daya"
                        class="collapse multi-collapse"
                        aria-labelledby="headingOne"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="pentadbir_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card d-none" id="permission_2">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#brif"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-4.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PERMOHONAN PROJEK</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="permohon" name="permohon_full_access" value="permohon_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="brif"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="permohonan_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card d-none" id="permission_3">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#TANAH"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-1.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PEMANTAUAN DAN PENILAIAN PROJEK</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="permantuan" name="permantuan_full_access" value="permantuan_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="TANAH"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="pemantuan_row">
                              
                            </tbody><tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card d-none" id="permission_4">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#ANGGARAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>KONTRAK</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="kontrak" name="kontrak_full_access" value="kontrak_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="ANGGARAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="kontrak_row">
                              
                            </tbody>  
                          </table>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card d-none" id="permission_5">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#STRATEGI"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-6.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PERUNDING</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="peruding" name="peruding_full_access" value="peruding_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="STRATEGI"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="perunding_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card d-none"  id="permission_6">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#PENGESYORAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-2.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>VALUE MANAGEMENT</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="vm" name="vm_full_access" value="vm_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="PENGESYORAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="vm_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card d-none"  id="permission_7">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#NOC_data"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <i class="uil-chart-line"></i>
                            </div>
                            <div class="col-md-8">
                            <p>NOTICE OF CHANGE</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="noc" name="noc_full_access" value="noc_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="NOC_data"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="noc_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card d-none"  id="permission_8">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#RollingP"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                              <span class="iconify" data-icon="mdi-timer-sand"></span>
                            </div>
                            <div class="col-md-8">
                            <p>PERMOHONAN PERUNTUKAN DI LUAR ROLLING PLAN (RP)</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="rp" name="rp_full_access" value="rp_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="RollingP"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="rp_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card d-none"  id="permission_9">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#PENJANAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <span class="iconify" data-icon="mdi-clipboard-search-outline"></span>
                            </div>
                            <div class="col-md-8">
                            <p>PENJANAAN LAPORAN</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="pl" name="pl_full_access" value="pl_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="PENJANAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="pl_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- <div class="brief_project_content_footer">
                  <button type="button" id="vmPermissionSaveBtn" class="updateBtn">Simpan</button>
                </div> -->
              </form>
            </div>
            </div>

             <!-- end -->
                
              </div>
              <div class="add_role_modal_footer text-center">
                <button type="button"
                id="vmPermissionSaveBtn" class="updateBtn"
                >
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- add role success  Modal starts -->

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
                    <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close_img" />
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Maklumat anda berjaya disimpan</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" class="tutup">Tutup</button>
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
                    <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close_img" />
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Peranan telah dikemaskini</h3>
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
                        <button class="ml-auto" data-dismiss="modal">
                            <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close_img" id="close_image"/>
                        </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3>Adakah anda pasti untuk memadam peranan ini?</h3>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup-confirm" id="tutup-confirm">Ya</button>
                            <button data-dismiss="modal" class="close-confirm" id="close-confirm">Tidak</button>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

@include('users.user_profile.script')      
@endsection