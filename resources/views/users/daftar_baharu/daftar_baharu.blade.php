@include('users.daftar_baharu.style')
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
        <div class="Mainbody_content mtop pbottom">
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
              <h4>Daftar Profil Baharu</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav">
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
                <li><a href="/daftar-pengguna-baharu" class="active text-secondary"> Daftar Pengguna Baharu</a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content New_Register">
                <div class="user_register_tab_content_container">
                  <div class="user_register_tab_content">
                    <div class="user_register_form_content">
                        <form action="" method="post" id="create_user_form" name="myform">
                            <input type="hidden" id="api_url" value={{env('API_URL')}}>
                            <input type="hidden" id="app_url" value={{env('APP_URL')}}>
                            <input type="hidden" id="token" value={{env('TOKEN')}}>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                           <div class="card card-h-100">
                                              <div class="userlist_content_header p-3">
                                                <div class="userlist_content_header_left d-flex w-50">
                                                  <div class="icon_yellow_bg">
                                                    <i class="ri-user-add-fill ri-xl icon_header"></i>
                                                  </div>
                                                  <h3>DAFTAR BAHARU</h3>
                                                </div>
                                                <div class="userlist_content_header_right d-flex">
                                                  {{-- <button  class="printing p-0" >
                                                    <i class="ri-printer-fill icon_white ri-2x mx-1"></i>
                                                  </button> --}}
                                                    <x-form.print></x-form.print>
                                                </div>
                                              </div>
                                               <div class="card-header user_register_tab_container justify-content-between align-items-center">
                                                <label for="Kategori_Pengguna" class="radio_label" style="color: #646c9a"
                                                        >Kategori Pengguna</label
                                                    >

                                                    <label class="r_container font-weight-normal" for="pengguna_jps"
                                                        >Pengguna JPS
                                                        <input type="radio" id="pengguna_jps" name="kategori" value="1" checked />
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label class="r_container font-weight-normal" for="agensi_luar"
                                                        >Agensi Luar
                                                        <input type="radio" id="agensi_luar" name="kategori" value="2" />
                                                        <span class="checkmark"></span>
                                                    </label>   
                                                
                                               </div>
                                               <div class="card-body pt-0 daftar_baharu_frm">
           
                                                <div class="row input-data">
                                                  <div class="col-md-6">
                                                   <label class="required">Nama</label><br>
                                                   <input class="form-control" type="text" name="nama" id="name">
                                                   <span class="error" id="error_nama"></span>
                                                  </div>
                                                  <div class="col-md-6 custom_gap">
                                                   <label class="required">No. Kad Pengenalan</label><br>
                                                   <input class="form-control" type="text" maxlength="12" name="no_kod_penganalan" id="no_kod_penganalan"> 
                                                   <span class="error" id="error_no_kod_penganalan"></span>
                                                  </div>
                                               </div>
                                               <div class="row input-data daftar_baharu_frm">
                                                  <div class="col-md-6">
                                                   <label class="required">Emel Rasmi</label><br>
                                                   <input class="form-control" type="email" name="email" id="emel_rasmi">
                                                   <span class="error" id="error_email"></span>
                                                  </div>
                                                  <div class="col-md-6 custom_gap">
                                                   <label class="non_required">No. Telefon</label><br>
                                                   <input class="form-control" type="text" name="no_telefon" id="no_telefon"> 
                                                   <span class="error" id="error_no_telefon"></span>
                                                  </div>
                                               </div>
                                               <div class="row input-data daftar_baharu_frm">
                                                  <div class="col-md-6">
                                                   <label class="required">Jawatan</label><br>
                                                     <select class="form-select" name="jawatan" id="jawatan">
                                                     <option value=""> --Pilih--</option>
                                                     </select>
                                                     <span class="error" id="error_jawatan"></span>
                                                  </div>
                                                  <div class="col-md-6 custom_gap">
                                                   <label class="required">Gred</label><br>
                                                     <select class="form-select" name="gred" id="gred">
                                                     <option value=""> --Pilih--</option>
                                                     </select>
                                                     <span class="error" id="error_gred"></span>
                                                  </div>
                                               </div>
                                               <div class="row input-data daftar_baharu_frm">
                                                  <div class="col-md-12">
                                                   <label class="required">Kementerian</label><br>
                                                   <select class="form-select" name="kementerian" id="kementerian">
                                                   <option value=""> --Pilih--</option>
                                                   </select>                    
                                                   <span class="error" id="error_kementerian"></span>
                                                   <input type="hidden" id="kementerian_jps_id" value="" name="kementerian_jps_id">
                                                  </div>
                                               </div>
                                               <div class="row input-data daftar_baharu_frm" id="jabatan_agensy_drop">
                                                  <div class="col-md-6">
                                                  <input type="radio" id="jabatan_agensy_drop_check" name="jabatan_agensy_drop_check" value="1" />
                                                  <label class="non_required">Jabatan</label><br>
                                                     <select class="form-select" name="jabatan" id="Jabatan">
                                                     <option value=""> --Pilih--</option>
                                                     </select>
                                                     <span class="error" id="error_jabatan"></span>
                                                  </div>
                                                  <div class="col-md-6">
                                                  <label class="non_required">Bahagian</label><br>
                                                     <select class="form-select" name="jabatan_bahagian" id="jabatan_bahagian">
                                                     <option value=""> --Pilih--</option>
                                                     </select>    
                                                     <!-- <span class="error" id="error_jabatan_bahagian"></span>  -->
                                                  </div>
                                               </div>
                                               <div class="row input-data daftar_baharu_frm" id="jabatan_jps_drop">
                                                  <div class="col-md-6">
                                                   <label class="non_required">Jabatan</label><br>
                                                     <input type="text" class="form-control form-control-light" id="jabatan_jps" readonly name="jabatan_jps" value="">
                                                     <input type="hidden" id="jabatan_jps_id" value="" name="jabatan_jps_id">
                                                  </div>
                                                  <div class="col-md-6">                                
                                                  </div>
                                               </div>

                                               <div class="row input-data daftar_baharu_frm" id="jabatan_agensy_drop">
                                                  <div class="col-md-12">
                                                  <input type="radio" id="bahagian_drop_check" name="bahagian_drop_check" value="1"  />
                                                  <label class="non_required">Bahagian</label><br>
                                                     <select class="form-select" name="bahagian" id="bahagian">
                                                     <option value=""> --Pilih--</option>
                                                     </select>    
                                                     <span class="error" id="error_bahagian"></span> 
                                                  </div>
                                                  <div class="col-md-6">
                                                  </div>
                                               </div>

                                               <div class="row input-data daftar_baharu_frm" id="pejabat_agensy_drop">
                                                  <div class="col-md-12">
                                                  <input type="radio" id="pejabat_drop_check" name="pejabat_drop_check" value="1" />
                                                  <label class="non_required">Pejabat projek</label><br>
                                                     <select class="form-select" name="pejabat" id="pejabat">
                                                     <option value=""> --Pilih--</option>
                                                     </select>
                                                     <!-- <span class="error" id="error_pejabat"></span> -->
                                                  </div>
                                               </div>
                                               <div class="row input-data daftar_baharu_frm" id="jps_negeri">
                                                  <div class="col-md-6">
                                                  <input type="radio" id="negeri_drop_check" name="negeri_drop_check" value="1" />
                                                   <label class="non_required">JPS Negeri</label>
                                                     <select class="form-select" name="negeri" id="negeri">
                                                     <option value=""> --Pilih--</option>
                                                     </select>
                                                     <!-- <span class="error" id="error_negeri"></span> -->
                                                  </div>
                                                  <div class="col-md-6 custom_gap">
                                                  <input type="radio" id="daerah_drop_check" name="daerah_drop_check" value="1" />
                                                   <label class="non_required">JPS Daerah</label> 
                                                     <select class="form-select" name="daerah" id="daerah">
                                                     <option value=""> --Pilih--</option>
                                                     </select>       
                                                     <!-- <span class="error" id="error_daerah"></span>                                -->
                                                  </div>
                                               </div>
                                               <div class="row input-data">
           
                                                  <div class="col-md-6 daftar_baharu_frm">
                                                     <label class="non_required">Gambar Profil <h7 class="types">(jenis fail yang disyorkan: jpeg, png)</h7></label><br>
                                                     <div class="drop-zone">
                                                        <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Letakkan fail di sini atau klik untuk memuat naik​<br><h6>(saiz fail tidak melebihi 4 mb)</h6></b></span>
                                                        <input type="file" name="myFile" id="myFile" class="drop-zone__input">
                                                     </div>
                                                     <span id="error_image_name" style="color:red;"></span>
                                                  </div>
                                                  <input type="hidden" name="image_path" id="image_path" value="">
                                                  <input type="hidden" name="image_name" id="image_name" value="">
           
                                                  <div class="col-md-6 daftar_baharu_frm" id="show-me">
                                                     <label class="required">Dokumen Sokongan  <h7 class="types">(jenis fail yang disyorkan: pdf, jpeg, docx, png)</h7></label><br>
                                                     <div class="drop-zone_dokumen">
                                                        <img id="doku_image_new" src="pdf_image.png" width="10%" style="display:none; height:auto;"><label id="doku_label"></label>
                                                        <span id="dokumen_span" class="drop-zone__prompt_dockumen"><b><i class="mdi mdi-cloud-upload"></i> <br>Letakkan fail di sini atau klik untuk memuat naik​<br><h6>(saiz fail tidak melebihi 4 mb)</h6></b></span>
                                                        <input type="file" name="dockumen" id="dokumen" class="drop-zone__input_dokumen">
                                                     </div>
                                                     <div>
                                                  </div>
                                                     <span id="error_dokumen_name" style="color:red;"></span>
                                                  </div>
                                                  <input type="hidden" name="dokumen_path" id="dokumen_path" value="">
                                                  <input type="hidden" name="dokumen_name" id="dokumen_name" value="">
           
                                                  <div class="col-md-6 custom_gap daftar_baharu_frm">
                                                     <label class="non_required">Catatan</label><br>
                                                     <textarea class="form-control"  rows="3" name="catatan"></textarea>
                                                     <span class="error" id="error_catatan"></span>                               
           
                                                  </div>
                                               </div><br>
                                               <div class="row input-data daftar_baharu_frm">
                                                  <div class="col-6 ">
                                                  <a href="/userlist">
                                                     <button type="button" class="btn btn-danger" style="float:right;background-color: FA5C7C; border:none; font-size: 0.9rem;">Kembali</button>
                                                  </a>
                                                  </div>
                                                  <div class="col-6">
                                                  <button type="button" class="btn btn-primary" style="background-color: #5B63C3; border:none; font-size: 0.9rem;" id="submit">Simpan</button>
                                                  </div>
                                               </div>
                                               </div> <!-- end card-body-->
                                           </div> <!-- end card-->
                                </div>
                             </div>
                             </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
            <div class="modal-content add_role_sucess_modal_content" style="width:88% !important;">
              <div class="modal-body add_role_sucess_modal_body" style="padding:0px !important;">
                <div class="add_role_sucess_modal_header text-end mt-2 mr-2">
                  <button class="ml-auto" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close_img" />
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3 style="width:102% !important; font-size: 0.9rem;">Pengguna Baharu Telah Berjaya <br> Didaftarkan! </h3>
                  <div class="text-center">
                    <button data-dismiss="modal" class="tutup" id="tutup" style="width:70px !important; font-size: 0.8rem;">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@include('users.daftar_baharu.script')
@endsection