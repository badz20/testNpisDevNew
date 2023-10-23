@include('valueManagement.fasilitator.style')

@extends('layouts.vmmodule.master')



@section('content_vmmodule')


@php
$userType=Session::get('userType');
@endphp

        <!-- HEADER Section Ends -->
        <div class="Mainbody_content mtop">

        <!-- <x-form.spinner>
                <x-slot name="message">
                    Sila tunggu sebentar sementara data sedang dimuatkan
                </x-slot>
        </x-form.spinner> -->
          
          <div class="Mainbody_content_nav_header project_register align-items-center row">
            <div class="col-md-3 col-xs-12">
              <h4 class="project_list">Senarai Fasilitator</h4>
            </div>
            <div class="col-md-9 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#" style="display: flex; align-items: center;">  
                    <i class="ri-calculator-fill icon_blue breadcrumbs_icon mr-1" style="font-size:1.2em; vertical-align:middle;"></i>
                    Value Management
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active"> Senarai Fasilitator</a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="project_register_content_container">
            <div class="project_register_table_container">
              <div class="card project_register_search_container">
                <div class="project_register_search_header row mt-2">
                  <div class="col-md-4 col-xs-12 d-flex align-items-center">
                    <div class="icon_yellow_bg">
                      <span class="iconify icon_header_pentadbir" data-icon="mdi-card-account-details-outline" style="font-size
                      : 2em;"></span>
                    </div>
                    <h4 class="ml-3">SENARAI FASILITATOR JPS</h4>
                  </div>
                  <div class="col-md-7 col-xs-12 d-flex m-1 justify-content-end" style="vertical-align:middle" >
                    <button class="btn Fasilitatorbtn mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                      <img src="assets/images/add_plus.png" class="mr-1">Fasilitator</button>
                      <x-form.print></x-form.print>
                  </div>
                </div>
                <hr>
              <div class="table_holder">
                <table class="table table_preview application_list" id="fasili_table">
                  <thead>
                    <tr class="pemberat_title_th">
                      <th class="col-2 text-left">Nama</th>
                      <th class="col-2 text-left">Tugas</th>
                      <th class="col-2">Bahagian</th>
                      <th class="col-2 text-left">Jawatan</th>
                      <th class="col-2">Jumlah Makmal</th>
                      <th class="col-2">Kekerapan Menjadi Fasilitator</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>

              @if($userType==4)

               <!--edit Modal -->
               <div class="vmadd_role_sucess_modal_container">
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header vmmodal_header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="ri-user-add-line" style="font size:1rem; vertical-align: middle; color:#fff;"></i> Maklumat Penglibatan Fasilitator</h5>
                          <button type="button" class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                            <i class="mdi mdi-window-close icon_white" style="font-size: 2em;" id="close_modal"></i>
                          </button>
                        </div>
                        <div class="modal-body">
                        <x-form.spinner>
                                <x-slot name="message">
                                    Sila tunggu sebentar sementara data sedang dimuatkan
                                </x-slot>
                        </x-form.spinner>
                            <form action="" class="col-12" name="myformedit">
                              <input style="font-size:0.8rem;" type="hidden" name="edit_id" id="edit_id" value="">
                              <label class="col-2 required" for="">Fasilitator</label>
                              <div class="form-check form-check-inline">
                                <input checked class="form-check-input" type="radio" name="inlineRadioOptions" id="yesCheckedit" value="1" disabled onclick="javascript:yesnoCheckEdit();">
                                <label class="form-check-label" for="inlineRadio1">JPS</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input style="font-size:0.8rem;" class="form-check-input" type="radio" name="inlineRadioOptions" id="noCheckedit" value="2" disabled onclick="javascript:yesnoCheckEdit();">
                                <label class="form-check-label" for="inlineRadio2">Bahagian Pengurusan Nilai, Kementerian Ekonomi</label>
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 required" for="">Nama Fasilitator</label>
                              <input style="font-size:0.8rem;" disabled type="text" name="fasilitator_name" id="fasilitator_name_edit" class="form-control col-10"  value="">
                              <span class="error" id="error_edit_fasilitator_name" style="color:red;"></span>                               
                              </div>
                              <div class="input-group">
                                <label class="col-2 required" for="">Jawatan Semasa</label>
                                <select style="font-size:0.8rem;" disabled name="jawatan" class="form-control" id="jawatan_edit">
                                  <option value="">--Pilih--</option>
                                </select>
                                <label class="col-2" for="">Gred</label>
                                <select style="font-size:0.8rem;" name="gred" disable class="form-control" id="gred_edit">
                                  <option value="">--Pilih--</option>
                                </select>
                              </div>
                              <div class="row">
                                <div class="col-md-6" style="padding-left:18%;"><span class="error" id="error_edit_jawatan" style="color:red;"></span></div>
                                <div class="col-md-6" style="padding-left:18%;"><span class="error" id="error_edit_gred" style="color:red;"></span></div>                               
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 required" for="">Bahagian</label>
                                <input style="font-size:0.8rem;" name="bahagian_disabled" id="bahagian_edit_disabled" type="text" class="txbx1 form-control col-4" value="Bahagian Pengurusan Nilai, Kementerian Ekonomi" disabled="">
                                <select name="bahagian" style="font-size:0.8rem;" class="form-control col-4" id="bahagian_edit">
                                  <option value="">--Pilih--</option>
                                </select>
                                <span class="error" id="error_edit_bahagian" style="color:red;"></span>
                              </div>
                              <div class="input-group mt-3 mb-5">
                                <label class="col-2 required" for="">Jabatan</label>
                                <select name="jabatan" class="form-control col-4" id="jabatan_edit" style="font-size: 0.8rem;">
                                  <option value="">--Pilih--</option>
                                </select>
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 " for="">Jumlah Makmal</label>
                                <input disabled style="font-size:0.8rem;" class="form-control" value="-" type="text" name="" id="jumlah">
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 " for="">Kekerapan Menjadi Ketua Fasilitator</label>
                                <input style="font-size:0.8rem;" disabled class="form-control" value="-" type="text" name="" id="ketua_menjadi">
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 " for="">Kekerapan Menjadi Fasilitator</label>
                                <input style="font-size:0.8rem;" disabled class="form-control" value="-" type="text" name="" id="fasilitator_menjadi">
                              </div>
                              <label class="col-3 mt-3 mb-3" for=""><strong>Senarai Projek Terlibat</strong></label>
                                <table class="table table-hover projek_cmn_table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Bil</th>
                                      <th class="text-center" scope="col">RMK</th>
                                      <th class="text-center" scope="col">Tahun Projek Diluluskan</th>
                                      <th class="text-center" scope="col">Tahun Pelaksanaan</th>
                                      <th class="text-center">Kod Projek</th>
                                      <th class="text-center">Nama Projek</th>
                                      <th class="text-center">Kos Projek (RM)</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody  id="fasi_table">
                                    
                                  </tbody>
                                </table>

                            </form>
                            <center>
                              <button type="button" class="btn vmsimpan mt-3" id="tutup_btn" data-bs-dismiss="modal">Tutup</button>
                            </center>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              @else

              <!-- View Modal -->
              <div class="vmadd_role_sucess_modal_container">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header vmmodal_header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-user-add-line" style="font size:1rem; vertical-align: middle; color:#fff;"></i>Maklumat Penglibatan Fasilitator</h5>
                      </div>
                      <div class="modal-body">
                        <x-form.spinner>
                                <x-slot name="message">
                                    Sila tunggu sebentar sementara data sedang dimuatkan
                                </x-slot>
                        </x-form.spinner>
                        <form action="" class="col-12">
                          <label class="col-2" for="">Fasilitator</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="yesCheckview" value="option1">
                            <label class="form-check-label" for="inlineRadio1">JPS</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="noCheckview" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Bahagian Pengurusan Nilai, Kementerian Ekonomi</label>
                          </div>
                          <div class="input-group mt-3 mb-3">
                            <label class="col-2" for="">Nama Fasilitator</label>
                          <input style="font-size:0.8rem;" type="text" name="fasilitator_name_view" id="fasilitator_name_view" class="form-control col-10" disabled value="">
                          </div>
                          <div class="input-group">
                            <label class="col-2" for="">Jawatan Semasa</label>
                            <select style="font-size:0.8rem;" name="jawatan" class="form-control" id="jawatan_view">
                                  <option value="">--Pilih--</option>
                            </select>
                            <label class="col-2" for="">Gred</label>
                            <select style="font-size:0.8rem;" name="gred" class="form-control" id="gred_view">
                                  <option value="">--Pilih--</option>
                            </select>                          </div>
                          <div class="input-group mt-3 mb-3">
                            <label class="col-2 " for="">Bahagian</label>
                            <input style="font-size:0.8rem;" name="bahagian_view_disabled" id="bahagian_view_disabled" type="text" class="txbx1 form-control col-4" value="Bahagian Pengurusan Nilai, Kementerian Ekonomi" disabled="">
                            <select style="font-size:0.8rem;" name="bahagian" class="form-control col-4" id="bahagian_view">
                                  <option value="">--Pilih--</option>
                            </select>
                          </div>
                          <div class="input-group mt-3 mb-3">
                            <label class="col-2 " for="">Jabatan</label>
                            <select style="font-size:0.8rem;" name="jabatan" class="form-control col-4" id="jabatan_view">
                                  <option value="">--Pilih--</option>
                            </select>                          </div>
                          <div class="input-group mt-3 mb-3">
                            <label class="col-2 " for="">Jumlah Makmal</label>
                            <input style="font-size:0.8rem;" disabled class="form-control" value="-" type="text" name="" id="">
                          </div>
                          <div class="input-group mt-3 mb-3">
                            <label class="col-2 " for="">Kekerapan Menjadi Ketua Fasilitator</label>
                            <input style="font-size:0.8rem" disabled class="form-control" value="-" type="text" name="" id="">
                          </div>
                          <div class="input-group mt-3 mb-3">
                            <label class="col-2 " for="">Kekerapan Menjadi Fasilitator</label>
                            <input style="font-size:0.8rem" disabled class="form-control" value="-" type="text" name="" id="">
                          </div>

                          <label class="col-3 mt-3 mb-3" for=""><strong>Senarai Projek Terlibat</strong></label>
                          <table class="table table-hover projek_cmn_table">
                            <thead>
                              <tr>
                                <th scope="col">Bil</th>
                                <th class="text-center" scope="col">RMK</th>
                                <th class="text-center" scope="col">Tahun Projek Diluluskan</th>
                                <th class="text-center" scope="col">Tahun Pelaksanaan</th>
                                <th class="text-center">Kod Projek</th>
                                <th class="text-center">Nama Projek</th>
                                <th class="text-center">Kos Projek (RM)</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td class="text-center">---</td>
                              </tr>
                            </tbody>
                          </table>
                          
                        </form>
                        <center>
                          <button type="button" class="btn vmsimpan mt-3" data-bs-dismiss="modal">Tutup</button>
                        </center>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              @endif

                  <!-- Modal 2 -->
                  <div class="vmadd_role_sucess_modal_container">
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header vmmodal_header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-user-add-line" style="font size:1rem; vertical-align: middle; color:#fff;"></i> Fasilitator</h5>
                            <button type="button" class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                              <i class="mdi mdi-window-close icon_white" style="font-size: 2em;" id="close_modal"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                          <x-form.spinner>
                                <x-slot name="message">
                                    Sila tunggu sebentar sementara data sedang dimuatkan
                                </x-slot>
                          </x-form.spinner>

                            <form action="" class="col-12" name="myform">
                              <label class="col-2 required" for="">Fasilitator</label>
                              <div class="form-check form-check-inline">
                                <input style="font-size:0.8rem !important;" checked class="form-check-input" type="radio" name="inlineRadioOptions" id="yesCheck" value="1" onclick="javascript:yesnoCheck();">
                                <label class="form-check-label" for="inlineRadio1">JPS</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input style="font-size:0.8rem!important;" class="form-check-input" type="radio" name="inlineRadioOptions" id="noCheck" value="2"  onclick="javascript:yesnoCheck();">
                                <label class="form-check-label" for="inlineRadio2">Bahagian Pengurusan Nilai, Kementerian Ekonomi</label>
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 required" for="">Nama Fasilitator</label>
                              <input style="font-size:0.8rem !important;" type="text" name="fasilitator_name" id="fasilitator_name" class="form-control col-10"  value="">
                              <span class="error" id="error_fasilitator_name" style="color:red;"></span>                               
                              </div>
                              <div class="input-group">
                                <label class="col-2 required" for="">Jawatan Semasa</label>
                                <select  style="font-size:0.8rem !important;" name="jawatan" class="form-control" id="jawatan">
                                  <option value="">--Pilih--</option>
                                </select>
                                <label class="col-2" for="">Gred</label>
                                <select style="font-size:0.8rem !important;" name="gred" class="form-control" id="gred">
                                  <option value="">--Pilih--</option>
                                </select>
                              </div>
                              <div class="row">
                                <div class="col-md-6" style="padding-left:18%;"><span class="error" id="error_jawatan" style="color:red;"></span></div>
                                <div class="col-md-6" style="padding-left:18%;"><span class="error" id="error_gred" style="color:red;"></span></div>                               
                              </div>
                              <div class="input-group mt-3 mb-3">
                                <label class="col-2 required" for="">Bahagian</label>
                                <input style="font-size:0.8rem !important;" name="bahagian_disabled" type="text" class="txbx form-control col-4" value="Bahagian Pengurusan Nilai, Kementerian Ekonomi" disabled="">
                                <select style="font-size:0.8rem !important;" name="bahagian" class="form-control col-4" id="bahagian">
                                  <option value="">--Pilih--</option>
                                </select>
                                <span class="error" id="error_bahagian" style="color:red;"></span>
                              </div>
                              <div class="input-group mt-3 mb-5">
                                <label class="col-2 required" for="">Jabatan</label>
                                <select style="font-size:0.8rem !important;" name="jabatan" class="form-control col-4" id="jabatan">
                                  <option value="">--Pilih--</option>
                                </select>
                              </div>
                            </form>
                            <center>
                            <a href="/fasilitator" style="color:white;"><button class="btn vmkempbali">Kembali</button></a>
                              <button class="btn vmsimpan" onclick="delbtn()">Simpan</button>
                            </center>
                          </div>
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
            <div class="modal-content add_role_sucess_modal_content" style="width:88% !important;">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                  <button class="ml-auto" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close" id="close_image"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3 style="width:102% !important;">Maklumat berjaya disimpan</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" class="tutup" id="tutup">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <section>
      <div class="container"></div>
    </section>

    @include('valueManagement.fasilitator.script')
  @endsection
