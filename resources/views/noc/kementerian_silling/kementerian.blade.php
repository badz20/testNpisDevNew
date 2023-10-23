@include('users.dashboard.style')
@include('noc.Kertas_Permohonan_NOC.nocStyle')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')
@if($id !='')
<input type="hidden" id="noc_id" value="{{$id}}">
@endif


<div class="Mainbody_content mtop ml-3">
    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner>
          <div class="Mainbody_content_nav_header project_register row align-items-center">
            <div class="col-md-4 col-xs-12 ml-2">
              <h4 class="project_list">Notis Perubahan</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav d-flex align-content-end flex-wrap">
                <li>
                  <a href="#">
                    <span class="iconify mr-2" data-icon="mdi-chart-line" style="font-size: 1.5em;"></span>
                    Notice of Change
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    JPS
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    Kertas Permohonan NOC
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="active">Notis Perubahan</a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="project_register_content_container">
            <div class="project_register_search_container mt-3">
               
             <!-- flowchart start -->
             <div class="rmk_flow_Chart flow-horizontal row">
              <div class="rmk_flow_Chart_container">
                <div class="d-flex justify-content-between">
                  <div class="rmk_flow_Chart_content">
                    <h5>BAHAGIAN</h5>
                  </div>
                  <div class="rmk_flow_Chart_content" style="width: 20%;">
                    <h5>BKOR</h5>
                  </div>
                  <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                    <h5>KEMENTERIAN</h5>
                  </div>
                  <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                    <h5>KEMENTERIAN EKONOMI</h5>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="rmk_flow_Chart_content">
                    <div class=" box_content vmbox_content">
                      <p style="text-align: center;" id="daftar_status" class="">Daftar/Kemaskini Permohonan</p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content vmbox_content">
                      <p id="dalam_status" class="">Dalam Semakan</p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content vmbox_content">
                      <p style="text-align: center;" id="kementerian_status" class="">Dalam Tindakan 
                        Kementerian </p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content bend ">
                      <p style="text-align: center;" id="epu_status" class="">Dalam Tindakan Kementerian Ekonomi</p>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <div class="rmk_flow_Chart_content" style="width: 20%;">
                    <h4 class="mt-4 ml-5" id="lulus_stat">Lulus</h4>
                    <h4 class="mt-4 ml-5" id="tidak_lulus_stat">Tidak Lulus</h4>
                  </div>
                 
                </div>
              </div>
            </div>
          <!-- flowchart end -->
          </div>   
          <br>
          

          <div class="row ">
                <div class="col-sm-6">
                  <div class="project_register_search_container ">
                    <div class="card-body ">
                        <form>
                            <label class="pemberat_title " for=""><b>Kementerian</b></label>
                            <div>
                               <label class="pemberat_title" for="">Tarikh Hantar</label>
                               <input type="date" class="form-control col-8" name="kementerian_date" id="kementerian_date">
                               <p class="text-danger" id="kementerian_date_error"></p>
                            </div>
                            <br>
                            <div class="row">
                                  <div class="upload_img col-12">
                                      <div class="row col-12 d-none" id="fileUploaded">
                                          <div class="col-12">
                                            <button style="float:right" id="removefile" type="button" class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></button>
                                            <div>
                                              <img id="filePreview" style="height:45px">
                                              <label id="fileName" ></label>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row col-12" id="Uploadfile">
                                          <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}" class="d-block m-auto" alt="" />
                                          <input name="kementerian_file_name" type="file" class="custom-file-input d-none" id="kementerian_file_name">
                                          <label for="kementerian_file_name">
                                            <h5 class="NOC_label3"> Letakkan fail di sini atau klik untuk memuat  naik </h5>
                                            <p class="NOC_label">(Saiz fail tidak melebihi 2mb)</p>
                                          </label>  
                                      </div>
                                  </div>
                                  <p class="text-danger" id="kementerian_file_name_error"></p>
                            </div>
                            <br>
                            <div>
                               <label class="pemberat_title" for="">Tarikh Kelulusan</label>
                               <input type="date" class="form-control col-8" name="kelulusan_date" id="kelulusan_date">
                               <p class="text-danger" id="kelulusan_date_error"></p>
                            </div>
                            <br>
                            <div class="row">
                                  <div class="upload_img col-12">
                                      <div class="row col-12 d-none" id="fileUploaded3">
                                          <div class="col-12">
                                            <button style="float:right" id="removefile3" type="button" class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></button>
                                            <div>
                                              <img id="filePreview3" style="height:45px">
                                              <label id="fileName3" ></label>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row col-12" id="Uploadfile3">
                                          <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}" class="d-block m-auto" alt="" />
                                          <input name="kelulusan_file_name" type="file" class="custom-file-input d-none" id="kelulusan_file_name">
                                          <label for="kelulusan_file_name">
                                            <h5 class="NOC_label3"> Letakkan fail di sini atau klik untuk memuat  naik </h5>
                                            <p class="NOC_label">(Saiz fail tidak melebihi 2mb)</p>
                                          </label>  
                                      </div>
                                  </div>
                                  <p class="text-danger" id="kelulusan_file_name_error"></p>
                            </div>
                            <br>
                              <center>
                                <div class="userlist_content_header_right col-md-12 text-center">
                                      <button type="button" class="TambahBtnNOC" id="lulus">Lulus</button>
                                      <button type="button" class="SimpanBtnNOC" id="simpan">Simpan</button>                                
                                </div>
                              </center>
                         </form>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="project_register_search_container">
                    <div class="card-body">
                        <label class="pemberat_title" for=""><b>Kementerian Ekonomi</b></label>
                        <div>
                            <label class="pemberat_title" for="">Tarikh Hantar</label>
                            <input type="date" class="form-control col-8" name="economi_date" id="economi_date">
                            <p class="text-danger" id="economi_date_error"></p>
                         </div>
                         <br>
                          <div class="row">
                                  <div class="upload_img col-12">
                                      <div class="row col-12 d-none" id="fileUploaded1">
                                          <div class="col-12">
                                            <button style="float:right" id="removefile1" type="button" class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></button>
                                            <div>
                                              <img id="filePreview1" style="height:45px">
                                              <label id="fileName1" ></label>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row col-12" id="Uploadfile1">
                                          <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}" class="d-block m-auto" alt="" />
                                          <input name="economi_hanter_file_name" type="file" class="custom-file-input d-none" id="economi_hanter_file_name">
                                          <label for="economi_hanter_file_name">
                                            <h5 class="NOC_label3"> Letakkan fail di sini atau klik untuk memuat  naik </h5>
                                            <p class="NOC_label">(Saiz fail tidak melebihi 2mb)</p>
                                          </label>  
                                      </div>
                                  </div>
                                  <p class="text-danger" id="economi_hanter_file_name_error"></p>
                          </div>
                          <br>

                          <div>
                            <label class="pemberat_title" for="">Tarikh Kelulusan</label>
                            <input type="date" class="form-control col-8" name="economi_surat_date" id="economi_surat_date">
                            <p class="text-danger" id="economi_surat_date_error"></p>
                         </div> <br>
                          <div class="row">
                                  <div class="upload_img col-12">
                                      <div class="row col-12 d-none" id="fileUploaded2">
                                          <div class="col-12">
                                            <button style="float:right" id="removefile2" type="button" class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></button>
                                            <div>
                                              <img id="filePreview2" style="height:45px">
                                              <label id="fileName2" ></label>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row col-12" id="Uploadfile2">
                                          <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}" class="d-block m-auto" alt="" />
                                          <input name="economi_surat_file_name" type="file" class="custom-file-input d-none" id="economi_surat_file_name">
                                          <label for="economi_surat_file_name">
                                            <h5 class="NOC_label3"> Letakkan fail di sini atau klik untuk memuat  naik </h5>
                                            <p class="NOC_label">(Saiz fail tidak melebihi 2mb)</p>
                                          </label>  
                                      </div>
                                  </div>
                                  <p class="text-danger" id="economi_surat_file_name_error"></p>
                          </div>
                        <br>
                    </div>
                    <div class="userlist_content_header_right col-md-12 text-center">
                                      <button type="button" class="TambahBtnNOC" id="lulus_btn">Lulus</button>
                                      <button type="button" class="SimpanBtnNOC" id="simpan_btn">Simpan</button>                                
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div

          <p class="user_profile_footer m-0 P-3">{{ now()->year }} <i class="ri-copyright-line" style="font-size: 1.2em; vertical-align: middle;"></i> NPIS - JPS</p>
          </div>
</div>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:100% !important;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h3 style="width:102% !important;" id="save_text">Maklumat anda berjaya di simpan<br></h3>
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
    <div class="add_role_sucess_modal_container">
          <div class="modal fade"
                id="global_sucess_modal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
                data-backdrop="static" data-keyboard="false"
                >
                <div
                    class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
                    role="document"
                >
                    <div class="modal-content add_role_sucess_modal_content">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h5 style="text-align:center;">Adakah anda pasti mahu membatalkannya?</h5>
                            <div class="text-center">
                                <button data-dismiss="modal" class="tutup" id="tutup-global" style="background-color: #0ACf97;">Ya</button>
                                <button data-dismiss="modal" class="tutup" id="close-global" style="background-color: #fa5c7c;">Tidak</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
          </div>
      </div>
</section>
@include('noc.kementerian_silling.script')
@endsection
