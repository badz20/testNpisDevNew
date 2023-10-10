@include('valueManagement.pelakasanan_makmal.style')


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MINI LAB</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Vm_module/assets/images/16x16.png') }}" />
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/Mediaquery.css') }}" />
    <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </head>

    @include('layouts.vmmodule.sidebar')

    @include('layouts.vmmodule.topbar')

        <!-- HEADER Section Ends -->
        <div class="Mainbody_content mtop">

        <x-form.spinner>
          <x-slot name="message">
              Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner> 
        
          <div class="Mainbody_content_nav_header project_register align-items-center row">
            <div class="col-md-3 col-xs-12">
              <h5 id="top_link"><strong>Makmal Kajian Nilai (VA)</strong></h5>
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
                  <a href="#" style="display: flex; align-items: center;">
                    Senarai Projek
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" id="breadcrumb_link" style="display: flex; align-items: center;">
                  Makmal Kajian Nilai (VA)
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active">Maklumat Pelaksanaan Makmal </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card cardPmakmal">
            <div class="card-body">
              <h4 style="font-size: 1.3rem;"><strong>MAKLUMAT PELAKSANAAN MAKMAL</strong></h4>
              <div class="topnav d-flex justify-content-around" id="myTopnav">
                <a href="#home" class="active col-md-3 col-xs-12 mt-2" style="display: flex; align-items: center; justify-content: center; text-align: center;"><i class="ri-list-unordered ri-2x icon_white mx-2"></i>Makmal Kajian Nilai (VA)</a>
                <a class="col-md-4 col-xs-12" href="#news" style="display: flex; align-items: center; justify-content: center; text-align: center;" ><i class="mdi mdi-wrench icon_dropdown mx-2" style="font-size: 1.8em; transform: rotate(90deg);"></i>Makmal Kejuruteraan Nilai (VE)</a>
                <a class="col-md-4 col-xs-12" href="#contact" style="display: flex; align-items: center; justify-content: center; text-align: center;"><i class="mdi mdi-layers-triple-outline icon_dropdown mx-2" style="font-size: 2em;"></i>Makmal Semakan Nilai (VR)</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
              <div class="project_register_tab_container">
                <div class="project_register_tab_btn_container col-2">
                    <ul>
                    <li >
                        <div class="tab_image">
                        <a href="/load_ringkasan/{{$kod_projek}}/{{$type}}"><img src="{{ asset('Vm_module/assets/images/vmringkasanProjek_icon_blue.png') }}" alt="" /></a>
                        </div>
                        <h4>RINGKASAN<br>PROJEK</h4>
                    </li>
                    <li>
                        <div class="tab_image">
                        <a href="/KalendarVM/{{$kod_projek}}/{{$type}}"><img src="{{ asset('Vm_module/assets/images/vmmaklumat_perancangan_blue.png') }}" alt="" /></a>
                        </div>
                        <h4>
                        MAKLUMAT<br>
                        PERANCANGAN<br>MAKMAL TAHUNAN
                        </h4>
                    </li>
                    <li class="success active">
                        <div class="tab_image">
                        <a href="/maklumat_pelakasanaan_makmal/{{$kod_projek}}/{{$type}}"><img src="{{ asset('Vm_module/assets/images/vmmaklumat_pelaksanaan_blue.png') }}" alt="" /></a>
                        </div>
                        <h4>
                        MAKLUMAT<br>
                        PELAKSANAAN<br>MAKMAL
                        </h4>
                    </li>
                    </ul>
                </div>
                
                <div class="project_register_tab_content_container col-10">
          
                    <div class="brief_project_container">
                      <div class="brief_project_content">
                        <div style="height:5.5%; display: flex; align-items: center;">
                          <i class="ri-list-unordered ri-2x icon_header icon_yellow_bg"></i>
                          <h6 class="m-3"><strong>Makmal Kajian Nilai (VA)</strong></h6>
                        </div>
                          <div class="card-body">
  
                            <h6 class="mb-3"><strong>Status Pelaporan Laporan</strong></h6>
                            <hr>
  
                            <!-- Start RMK Flow Chart in Horizontal -->
                            <div class="rmk_flow_Chart flow-horizontal">
                              <div class="rmk_flow_Chart_container">
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content">
                                    <h5>BAHAGIAN</h5>
                                  </div>
                                  <div class="rmk_flow_Chart_content">
                                    <h5>PENYELARAS MAKMAL VA (BKOR)</h5>
                                  </div>
                                  <div class="rmk_flow_Chart_content_grey">
                                    <h5>BAHAGIAN PENGURUSAN NILAI (BPN),
                                      KEMENTERIAN EKONOMI</h5>
                                  </div>
                                  <div class="rmk_flow_Chart_content_grey">
                                    <h5>KETUA FASILITATOR, KETUA PENGARAH JPS, KEMENTERIAN & BEASSA KEMENTERIAN EKONOMI</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content">
                                    <div class="box_content vmbox_content">
                                      <p>Penyediaan Draf Laporan Makmal</p>
                                    </div>
                                  </div>
                                  <div class="rmk_flow_Chart_content">
                                    <div class="box_content vmbox_content">
                                      <p>Dalam Semakan</p>
                                    </div>
                                  </div>
                                  <div class="rmk_flow_Chart_content">
                                    <div class="box_content">
                                      <p>Dalam Semakan</p>
                                    </div>
                                  </div>
                                  <div class="rmk_flow_Chart_content">
                                    <div class="box_content bend bend">
                                      <p>Tandatangan Laporan</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                  <div class="rmk_flow_Chart_content ml-auto">
                                    <h5 class="py-2">BAHAGIAN</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                  <div class="rmk_flow_Chart_content">
                                    <h4 class="mt-4">Selesai</h4>
                                  </div>
                                  <div class="rmk_flow_Chart_content">
                                    <div class="box_content end"><p  class="yellow">Dalam Penjilidan</p></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End RMK Flow Chart in Horizontal -->
  
                            <!-- Start RMK Flow Chart in Vertical -->
                            <div class="rmk_flow_Chart flow-vertical">
                              <div class="rmk_flow_Chart_container">
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <h5>BAHAGIAN</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <div class="box_content vmbox_content_vertical">
                                      <p>Penyediaan Draf Laporan Makmal</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <h5>PENYELARAS MAKMAL VA (BKOR)</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <div class="box_content vmbox_content_vertical">
                                      <p>Dalam Semakan</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                  <div class="rmk_flow_Chart_content_grey" style="width: 100%;">
                                    <h5>BAHAGIAN PENGURUSAN NILAI (BPN),
                                      KEMENTERIAN EKONOMI</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <div class="box_content bend">
                                      <p>Dalam Semakan</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                  <div class="rmk_flow_Chart_content_grey" style="width: 100%;">
                                    <h5>KETUA FASILITATOR, KETUA PENGARAH JPS, KEMENTERIAN & BEASSA KEMENTERIAN EKONOMI</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <div class="box_content bend bend">
                                      <p>Tandatangan Laporan</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <h5 class="py-2">BAHAGIAN</h5>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <div class="box_content bend"><p  class="yellow">Dalam Penjilidan</p></div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-end mt-5">
                                  <div class="rmk_flow_Chart_content" style="width: 100%;">
                                    <h4>Selesai</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End RMK Flow Chart in Vertical -->
  
                            <form id="tandatanganForm">
                                <div class="row m-1">
                                    <div class="col-md-6 col-xs-12 p-1 py-1">
                                        <div class="row align-items-center">
                                          <div class="col-md-4 col-xs-12"><label for="tarikh_kemuka">Tarikh Kemukakan <br> Kepada Bahagian<sup>*</sup></label></div>
                                          <div class="col-md-6 col-xs-12 form-group">
                                              <input class="form-control" type="date" name="tarikh_kemuka" id="tarikh_kemuka" style="font-size:0.8rem">
                                              <p class="text-danger" id="tarikh_kemuka_error"></p>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 p-1 py-1">
                                      <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                          <label for="kemuka_file_name" class="">Muat Naik Dokumen<br>Lampiran<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-7 col-xs-12 form-group">
                                          <div class="upload_img col-12">
                                            <div class="row col-12 d-none" id="fileUploaded2">
                                              <div>
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
                                              <label for="kemuka_file_name" id="">
                                                <img 
                                                  src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                  class="d-block m-auto"
                                                  alt=""
                                                />
                                              </label>
                                                <input name="kemuka_file_name" type="file" class="custom-file-input d-none" id="kemuka_file_name">
                                                <label for="kemuka_file_name" id="">
                                                  <h5 >
                                                  Letakkan fail di sini atau klik untuk memuat
                                                  naik
                                                  </h5>
                                                  <p>(Saiz fail tidak melebihi 2mb)</p>
                                                </label>
                                            </div>
                                          </div>
                                          <p class="text-danger" id="kemuka_file_name_error"></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row m-1">

                                    <div class="col-md-6 col-xs-12 p-1 py-1">
                                        <div class="row align-items-center">
                                          <div class="col-md-4 col-xs-12"><label for="tarikh_kemuka">Tarikh Terima <br> Laporan Berjilid<sup>*</sup></label></div>
                                          <div class="col-md-6 col-xs-12 form-group">
                                              <input class="form-control" type="date" name="tarikh_terima" id="tarikh_terima" style="font-size:0.8rem">
                                              <p class="text-danger" id="tarikh_terima_error"></p>
                                          </div>
                                        </div>
                                    </div>
                              
                                    <div class="col-md-6 col-xs-12 p-1 py-1">
                                      <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                          <label for="terima_file_name">Muat Naik Dokumen<br>Lampiran<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-7 col-xs-12 form-group">
                                          <div class="upload_img col-12">
                                            <div class="row col-12 d-none" id="fileUploaded1">
                                              <div>
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
                                              <label for="terima_file_name">
                                                <img
                                                  src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                  class="d-block m-auto"
                                                  alt=""
                                                />
                                              </label>
                                              <input name="terima_file_name" type="file" class="custom-file-input d-none" id="terima_file_name">

                                              <label for="terima_file_name">
                                              <h5>
                                                Letakkan fail di sini atau klik untuk memuat
                                                naik
                                              </h5>
                                              <p>(Saiz fail tidak melebihi 2mb)</p>
                                              </label>  
                                            </div>
                                          </div>
                                          <p class="text-danger" id="terima_file_name_error"></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row m-1">

                                    <div class="col-md-6 col-xs-12 p-1 py-1">
                                        <div class="row align-items-center">
                                          <div class="col-md-4 col-xs-12"><label for="tarikh_kemuka">Tarikh Edaran <br> Laporan<sup>*</sup></label></div>
                                          <div class="col-md-6 col-xs-12 form-group">
                                              <input class="form-control" type="date" name="tarikh_edaran" id="tarikh_edaran" style="font-size:0.8rem">
                                              <p class="text-danger" id="tarikh_terima_error"></p>
                                          </div>
                                        </div>
                                    </div>
                              
                                    <div class="col-md-6 col-xs-12 p-1 py-1">
                                      <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                          <label for="terima_file_name">Muat Naik Dokumen<br>Lampiran<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-7 col-xs-12 form-group">
                                          <div class="upload_img col-12">
                                            <div class="row col-12 d-none" id="fileUploaded3">
                                              <div>
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
                                              <label for="edaran_file_name">
                                                <img
                                                  src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                  class="d-block m-auto"
                                                  alt=""
                                                />
                                              </label>
                                              <input name="edaran_file_name" type="file" class="custom-file-input d-none" id="edaran_file_name">

                                              <label for="edaran_file_name">
                                              <h5>
                                                Letakkan fail di sini atau klik untuk memuat
                                                naik
                                              </h5>
                                              <p>(Saiz fail tidak melebihi 2mb)</p>
                                              </label>  
                                            </div>
                                          </div>
                                          <p class="text-danger" id="edaran_file_name_error"></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="nageri_footer">
                                  <button class="vmsimpan mt-4 align-self-center" id="penjilidan_simpan">Simpan</button>
                                </div>
                            </form>
  
                            <div class="table_scroll">
                              <table id="tandatanganTable" class="table table-bordered mt-5 projek_cmn_table">
                                <thead>
                                  <tr>
                                    <th class="text-center" scope="col">Bil</th>
                                    <th class="text-center" scope="col">Perkara</th>
                                    <th class="text-center" scope="col">Tarikh</th>
                                    <th class="text-center" scope="col">Dokumen Lampiran</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>

                            <!-- <div class="form-check form-check-inline mt-3 mb-4" id="bkor_check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">Laporan Penuh disyorkan untuk proses penjilidan
                                </label>
                            </div> -->
  
                            <div class="vmsimpan_hantar d-flex flex-sm-row flex-column align-items-center">
                              <button class="vmhantar m-1" id="hant_redirect">Selesai</button>
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
          <p class="user_profile_footer m-0 P-3">{{ now()->year }} <img class="mr-1" src="{{ asset('Vm_module/assets/images/copyrightLogo.png') }}">NPIS - JPS</p>

        </div>
        
      </div>
      <!-- Mainbody_conatiner Starts -->
    </div>

     <!-- Modal -->
<div class="vmadd_role_sucess_modal_container">
<div class="modal fade" 
  id="exampleModal" 
  tabindex="-1" 
  aria-labelledby="exampleModalLabel" 
  aria-hidden="true"
  >
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header vmmodal_header">
        <h5 class="modal-title ml-2" id="exampleModalLabel">Butiran Makmal</h5>
      </div>
      <div class="modal-body">
          <div class="ml-2 row mb-2">
              <label class="mr-5" for="">Tarikh Cadangan Makmal<sup>*</sup></label>
              <input disabled class="form-control col-3 ml-1 mr-5" type="date" id="modal_cadangan_makmal"> 
              <label class="mr-2" for="">Lokasi Makmal<sup>*</sup></label>
              <input disabled class="form-control col-3 ml-5"  type="text" value="" id="modal_negeri">
          </div>
          <div class="ml-2 row mb-2">
              <label class="mr-5" for="">Tarikh Makmal Sebenar<sup>*</sup></label>
              <input disabled class="form-control col-3 ml-4 mr-5" type="date" id="modal_makmal_sebenar"> 
              <label for="">Tarikh Lawatan Tapak<sup>*</sup></label>
              <input disabled class="form-control col-3" type="date" id="modal_lawatan_tapak"> 
          </div>
          <div class="ml-2 row mb-2">
            <label class="mr-1" for="">Tahun Pelaksanaan Makmal<sup>*</sup></label>
            <input disabled class="form-control col-3 ml-4" type="text" value="" id="modal_tahun">
          </div>

          <label class="ml-2 "for="">Senarai Fasilitator<sup>*</sup></label>
          <div class="container pt-4">
            <div class="table-responsive">
              <table class="table table-bordered projek_cmn_table">
                <thead>
                  <tr>
                    <th class="text-center">Bil</th>
                    <th class="text-center">Nama Fasilitator</th>
                    <th class="text-center">Gred</th>
                    <th class="text-center">Peranan</th>
                    <th class="text-center">Pejabat</th>
                  </tr>
                </thead>
                <tbody id="modal_fasilitators">
                    
                </tbody>
              </table>
            </div>
          </div>
      </div>

      <div class="nageri_footer mb-3">
           <button type="button" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
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
          data-backdrop="static"
          data-keyboard="false"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_sucess_modal_content" style="width:88% !important;">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                  <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close" id="close_image"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3 class="popup_h3" style="width:102% !important;">Maklumat berjaya di simpan<br></h3>
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
                <div
                class="modal fade"
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
                        <h5 style="text-align: center;">Proses penjilidan bagi Makmal Kajian Nilai (VA) telah selesai</h5>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup" id="tutup-confirm">Tutup</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
</section>
    

@include('layouts.vmmodule.footer')
@include('valueManagement.penjilidan.script')