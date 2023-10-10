@include('valueManagement.pelakasanan_makmal.style')


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Makmal Semakan Nilai</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Vm_module/assets/images/16x16.png') }}" />
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/Mediaquery.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}" />
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
              <h5><strong>Makmal Semakan Nilai (VR)</strong></h5>
            </div>
            <div class="col-md-9 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="/senarai_makmal_and_mini" style="display: flex; align-items: center;">
                    <i class="ri-calculator-fill icon_blue breadcrumbs_icon mr-1" style="font-size:1.2em; vertical-align:middle;"></i>
                    Value Management
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="/senarai_selasai_makmal" style="display: flex; align-items: center;">
                    Senarai Projek
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#"style="display: flex; align-items: center;">
                    Maklumat Pelaksanaan Makmal
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active"> Makmal Semakan Nilai (VR)</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card m-3 cardPmakmal">
            <div class="card-body">
              <h4 class="project_list" style="font-size:1.3rem;"><strong>MAKLUMAT PELAKSANAAN MAKMAL</strong></h4>
              <div class="topnav mt-4" id="myTopnav"
                <a href="#home" class="col-md-4 col-xs-12" style="display: flex; align-items: center; justify-content: center; text-align: center;"><i class="ri-list-unordered ri-2x icon_dropdown mx-2"></i>Makmal Kajian Nilai (VA)</a>
                <a class="col-md-4 col-xs-12" style="display: flex; align-items: center; justify-content: center; text-align: center;" href="#news"><i class="mdi mdi-wrench icon_dropdown mx-2" style="font-size: 1.8em; transform: rotate(90deg);"></i>Makmal Kejuruteraan Nilai (VE)</a>
                <a class="col-md-4 col-xs-12 active mt-2" href="#contact" style="display: flex; align-items: center; justify-content: center; text-align: center;"><i class="mdi mdi-layers-triple-outline icon_white mx-2" style="font-size: 2em;"></i>Makmal Semakan Nilai (VR)</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
              <div class="project_register_tab_container">
                <div class="project_register_tab_btn_container col-2">
                  <ul>
                    <li class="active">
                      <div class="tab_image">
                        <img src="{{ asset('Vm_module/assets/images/vmringkasanProjek_icon_darkblue.png') }}" alt="" />
                      </div>
                      <h4>RINGKASAN<br>PROJEK</h4>
                    </li>
                    <li class="active">
                      <div class="tab_image">
                        <img src="{{ asset('Vm_module/assets/images/vmmaklumat_perancangan_darkblue.png') }}" alt="" />
                      </div>
                      <h4>
                        MAKLUMAT<br>
                        PERANCANGAN<br>MAKMAL TAHUNAN
                      </h4>
                    </li>
                    <li class="success active">
                      <div class="tab_image">
                        <img src="{{ asset('Vm_module/assets/images/vmmaklumat_pelaksanaan_blue.png') }}" alt="" />
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
                      <div>
                        <div style="display: flex; align-items: center;">
                          <i class="ri-list-unordered ri-2x icon_header icon_yellow_bg"></i>
                          <h6 class="m-3"><strong>Makmal Semakan Nilai (VR)</strong></h6>
                        </div>
                        <div class="row" style="position: relative;left: 20px;top: 15px;">
                          <div class="col-md-3 col-xs-12">
                            <label for="">Pengecualian Penuh<sup>*</sup></label>
                          </div>
                          <div class="col-md-8 col-xs-12">
                            <div class="form-check form-check-inline col-md-4 col-xs-12">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                              <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline col-md-4 col-xs-12">
                              <input checked class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                              <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>
                        </div>
                        </div>
                      </div>

                    <div class="card-body" id="card-body-1">
                        <h6 class="mt-2 mb-3 label-1"><strong>Maklumat Perancangan Makmal</strong></h6>
                        <p class="ml-4 label-1">Maklumat Mesyuarat Pra Makmal</p>
                        <hr>
                   
                        <form id="VRform">
                          <div class="row m-1">
                            <div class="col-md-5 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Cadangan<br>Pra Makmal<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input disabled class="form-control" type="text" name="tarikh_cadangan" id="tarikh_cadangan" style="font-size: 0.8rem;">
                                  <div class="error" id="error_tarikh_cadangan" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row d-flex m-1 justify-content-between">
                            <div class="col-md-5 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Pra Makmal<br>Sebenar<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input class="form-control" type="text" name="tarikh_pra_makmal_sebenar" id="tarikh_pra_makmal_sebenar" style="font-size: 0.8rem;">
                                  <div class="error" id="error_tarikh_pra_makmal_sebenar" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 p-1 py-1">
                              <div class="row">
                                <div class="col-md-4 col-xs-12">
                                  <label for="">Surat Jemputan<br>Mesyuarat<sup>*</sup></label>
                                </div>
                                <div class="col-md-8 col-xs-12 form-group">
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
                                    <div class="row col-12 justify-content-center" id="Uploadfile1">
                                      <label for="surat_jemputan">
                                      <img
                                        src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                        class="d-block m-auto"
                                        alt=""
                                      />
                                      </label>
                                    <input name="surat_jemputan" type="file" class="custom-file-input d-none" id="surat_jemputan" style="font-size: 0.8rem;">

                                    <label for="surat_jemputan">
                                    <h5>
                                      Letakkan fail di sini atau klik untuk memuat
                                      naik
                                    </h5>
                                    <p>(Saiz fail tidak melebihi 2mb)</p>
                                    </label>
                                    
                                  </div>
                                  </div>

                                  <p class="text-danger" id="surat_jemputan_error"></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row m-1">
                            <div class="col-md-3 col-xs-12">
                              <label for="">Keputusan Mesyuarat<sup>*</sup></label>
                            </div>
                            <div class="col-md-9 col-xs-12 row">
                              <div class="form-check form-check-inline col-md-5 col-xs-12">
                                <input checked class="form-check-input" type="radio" name="inlineRadioOptions" id="keputusan_mesyuarat_yes" value="1">
                                <label class="form-check-label" for="inlineRadio1">Ya, Setuju Laksana Makmal</label>
                              </div>
                              <div class="form-check form-check-inline col-md-6 col-xs-12">
                                <input  class="form-check-input" type="radio" name="inlineRadioOptions" id="keputusan_mesyuarat_no" value="2">
                                <label class="form-check-label " for="inlineRadio2">Tidak, Mesyuarat Pra Makmal Seterusnya</label>
                              </div>
                              <p class="text-danger" id="keputusan_mesyuarat_error"></p>
                            </div>
                          </div>
                          <div class="row mt-4 m-1">
                            
                            <div class="col-md-6 col-xs-12 py-1">
                                <div class="row align-items-center">
                                  <div class="col-md-5 col-xs-12">
                                    <label for="">Minit Mesyuarat<sup>*</sup></label>
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
                                        <label for="minit_mesyuarat" class="text-center">
                                          <img
                                            src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                            class="d-block m-auto"
                                            alt=""
                                          />
                                      <input name="minit_mesyuarat" type="file" class="custom-file-input d-none" id="minit_mesyuarat" style="font-size: 0.8rem;">
                                      <h5>
                                        Letakkan fail di sini atau klik untuk memuat
                                        naik
                                      </h5>
                                      <p>(Saiz fail tidak melebihi 2mb)</p>
                                      </label>
                                      
                                    </div>
                                    </div>

                                    <p class="text-danger" id="minit_mesyuarat_error"></p>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="nageri_footer">
                            <button id="vrsimpan" class="vrsimpan mt-3 align-self-center">Simpan</button>
                          </div>
                        </form>
                        
                        <div class="table_scroll">
                          <table id="mmpms_vr_table" class="table table-bordered mt-5 projek_cmn_table">
                            <thead>
                              <tr>
                                <th scope="col">Bil</th>
                                <th scope="col">Tarikh Cadangan Pra Makmal</th>
                                <th scope="col">Tarikh Pra Makmal</th>
                                <th scope="col">Surat Jemputan Mesyuarat</th>
                                <th scope="col">Keputusan Mesyuarat</th>
                                <th scope="col">Minit Mesyuarat</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                        
                        <p class="mt-5 ml-4" id="Butiran_Makmal_hr">Butiran Makmal</p>
                        <hr>

                        <form id="butiran">
                          <div class="row m-1">
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Cadangan Makmal<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input disabled class="form-control" type="text" name="cadangan_makmal" id="cadangan_makmal" style="font-size: 0.8rem;"> 
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-5 col-xs-12">
                                  <label for="">Lokasi Makmal<sup>*</sup></label>
                                </div>
                                <div class="col-md-7 col-xs-12 form-group">
                                  <input class="form-control" type="text" name="negeri" id="negeri" style="font-size: 0.8rem;">
                                  <div class="error" id="error_negeri" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row m-1">
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Makmal Sebenar<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input class="form-control" type="text" name="makmal_sebenar" id="makmal_sebenar" style="font-size: 0.8rem;"> 
                                  <div class="error" id="error_makmal_sebenar" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-5 col-xs-12">
                                  <label for="">Tarikh Lawatan Tapak<sup>*</sup></label>
                                </div>
                                <div class="col-md-7 col-xs-12 form-group">
                                  <input disabled class="form-control" type="text" name="lawatan_tapak" id="lawatan_tapak" style="font-size: 0.8rem;">
                                  <div class="error" id="error_lawatan_tapak" style="color:red"></div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                          <div class="row m-1">
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12">
                                  <label for="">Tahun Pelaksanaan Makmal<sup>*</sup></label>
                                </div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input disabled class="form-control" type="text" id="year" name="year" style="font-size: 0.8rem;">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-5 col-xs-12">
                                  <label for="">Mesyuarat Stakeholder</label>
                                </div>
                                <div class="col-md-7 col-xs-12 form-group">
                                  <input disabled class="form-control" type="text" name="mesyuarat_date" id="mesyuarat_date" style="font-size: 0.8rem;">
                                  <div class="error" id="error_mesyuarat_date" style="color:red"></div>
                                </div>
                                
                              </div>
                            </div>
                          </div>

                          <div class="row m-1">
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Kos Pelaksanaan <br> Makmal (Sebelum)<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group d-flex">
                                  <span class="input-group-text Table_perunding_header" style="font-size:0.8rem;" id="basic-addon2">RM</span>
                                  <input type="text" class="form-control kos_selepas_makmal text-right" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon2" id="kos_sebelum_makmal" style="font-size: 0.8rem;">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-5 col-xs-12"><label for="">Kos Pelaksanaan <br> Makmal(Selepas)<sup>*</sup></label></div>
                                <div class="col-md-7 col-xs-12 form-group d-flex">
                                  <span class="input-group-text Table_perunding_header" id="basic-addon3" style="font-size:0.8rem;">RM</span>
                                  <input type="text" class="form-control kos_selepas_makmal text-right" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon3" id="kos_pelakas_selepas_makmal" style="font-size: 0.8rem;">
                                </div>
                                <div class="col-md-5 col-xs-12"><label for=""></label></div>
                                <div class="error col-md-7" id="error_kos_pelakas_selepas_makmal" style="color:red"></div>
                              </div>
                            </div>
                          </div>

                            <label class="mt-4 ml-4" for="">Senarai Fasilitator<sup>*</sup></label>
                            <div class="pt-4 table_scroll">
                              <div class="table-responsive">
                                <table class="table table-bordered projek_cmn_table"  id="buti_table_id">
                                  <thead>

                                    <tr>
                                      <th class="text-center">Bil</th>
                                      <th class="text-center">Nama Fasilitator</th>
                                      <th class="text-center">Gred</th>
                                      <th class="text-center">Peranan</th>
                                      <th class="text-center">Pejabat</th>
                                      <th class="text-center"><button class="vmplus_minus" id="addBtnFas" type="button"><i class="ri-add-box-line vmplus_white"></i></button></th>
                                    </tr>
                                  </thead>
                                  <tbody id="butiran_tbody">
                                     
                                  </tbody>

                                </table>
                            <div class="error" id="error_fasilitator" style="color:red"></div>
                              
                              </div>
                            </div>
                            <div class="nageri_footer">
                              <button class="vmsimpan mt-3 align-self-center" id="submit_butiran">Simpan</button>
                              <!-- <button class="vmsimpan mt-3 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Simpan</button> -->
                            </div>
                          </form>
                          <form id="objectiveForm">
                          <div id="projek_cmn_table" class="table_scroll">
                            <table class="table table-bordered mt-5 projek_cmn_table">
                              <thead>
                                <tr>
                                  <th scope="col">Bil</th>
                                  <th scope="col">Tarikh Cadangan Makmal</th>
                                  <th scope="col">Tarikh Makmal Sebenar</th>
                                  <th scope="col">Tarikh Lawatan Tapak</th>
                                  <th scope="col">Lokasi Makmal</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody id="existing_butiran">
                               
                              </tbody>
                            </table>
                          </div>

                        <h6 class="mt-4 mb-3" id="maklu_head"><strong>Maklumat Semakan Nilai (VR)</strong></h6><hr>

                      <h6 class="m-3" id="head_data">Laporan Penemuan Makmal Semakan Nilai (VR)</h6>
                      
                      <div class="table_scroll pt-4" id="projek_obj_table">
                        <div class="table-responsive">
                          <table class="table table-bordered projek_cmn_table" id="newobjektifTable">
                            <thead>
                              <tr>
                                <th class="text-center">Bil</th>
                                <th class="text-center w-75"></th>
                                <th class="text-center"><button class="vmplus_minus" id="addBtnObjektif" type="button"><i class="ri-add-box-line vmplus_white"></i></button></th>
                              </tr>
                            </thead>
                            <tbody id="tbodynewobjektif">
                            </tbody>
                          </table>
                          <p id="newobjektifTable_error" class="text-danger"></p>
                        </div>
                      </div>

                      <div class="row m-1" id="muat_form">
                        <div class="col-md-12 col-xs-12 p-0 py-1">
                          <div class="row">
                            <div class="col-md-4 col-xs-12 d-flex">
                              <label for="objektif_file">Muat Naik Laporan<br>Makmal<sup>*</sup></label>
                              <div class="vmpop_over info ml-1">
                                <button class="vmpop_btn" type="button" id="vmpop_btn_1">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                              </div>
                              <div class="position-absolute vm_info_laporan">
                                <div class="vmpop_content d-none" id="vmpop_content_1">
                                  <p>Laporan perlu lengkap ditandatangani sebelum dimuatnaik</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-85 col-xs-12 form-group">
                              <div class="upload_img col-12">
                                <div class="row col-12 d-none" id="fileUploaded3" style="place-content: center;">
                                  <div>
                                    <button style="float:right" id="removefile3" type="button" class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg></button>
                                    <div>
                                      <img id="filePreview3" style="height:45px">
                                      <label id="fileName3" ></label>
                                      <label id="fileName"></label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row col-12" id="Uploadfile3" style="display: flow-root;">
                                  <label for="objektif_file">
                                    <img
                                      src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                      class="d-block m-auto"
                                      alt=""
                                    />
                                  </label>
                                  <img class="d-none" id="Dataimg">
                                  <input name="objektif_file" type="file" class="custom-file-input d-none" value="" id="objektif_file" style="font-size: 0.8rem;">

                                  <label for="objektif_file">
                                    <h5>
                                      Letakkan fail di sini atau klik untuk memuat
                                      naik
                                    </h5>
                                    <p>(Saiz fail tidak melebihi 2mb)</p>
                                  </label>                                
                                </div>
                              </div>
                              <p class="text-danger" id="objektif_file_error"></p>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="vmsimpan_hantar" id="vmsimpan_hantar">
                        <button type="button" id="vr_objective_simpan" class="vmsimpan mr-2">Simpan</button>
                        <button type="button" id="SelesaiBtn" class="vmhantar">Selesai</button>
                      </div>
                      </form>
                    </div>

                    <div class="card-body d-none" id="card-body-2">

                              <div class="row m-1">
                                <div class="col-md-6 col-xs-12 p-1 py-1">
                                  <div class="row align-items-center">
                                    <div class="col-md-5 col-xs-12">
                                      <label for="muat_naik_surat_file_name" class="muat_naik_file_class">Muat Naik Surat<sup>*</sup></label>
                                    </div>
                                    <div class="col-md-7 col-xs-12 form-group">
                                      <div class="upload_img col-12">
                                        <div class="row col-12 d-none" id="fileUploadedsurat">
                                          <div>
                                            <button style="float:right" id="removefilesurat" type="button" class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></button>
                                            <div>
                                              <img id="filePreviewsurat" style="height:45px">
                                              <label id="fileNamesurat" ></label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row col-12" id="Uploadfilesurat">
                                        <img
                                          src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                          class="d-block m-auto"
                                          alt=""
                                        />
                                        <input name="muat_naik_surat_file_name" type="file" class="custom-file-input muat_naik_file_class d-none" id="muat_naik_surat_file_name" style="font-size: 0.8rem;">
  
                                        <label for="muat_naik_surat_file_name" class="muat_naik_file_class">
                                        <h5>
                                          Letakkan fail di sini atau klik untuk memuat
                                          naik
                                        </h5>
                                        <p>(Saiz fail tidak melebihi 50mb)</p>
                                        </label>
                                        
                                      </div>
                                      </div>
  
                                      <p class="text-danger" id="muat_naik_surat_file_name_error"></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          <div class="nageri_footer">
                            <button class=" mt-4 align-self-center" type="button" id="simpan_btn">Simpan</button>
                          </div>
                          <div class="table_scroll">
                            <table class="table table-bordered mt-4 projek_cmn_table">
                              <thead>
                                <tr>
                                  <th scope="col">Bil</th>
                                  <!-- <th scope="col">Jenis Khas</th>
                                  <th scope="col">Pengecualian Khas</th> -->
                                  <th scope="col">Tarikh Hantar</th>
                                  <th scope="col">Surat Lampiran</th>
                                </tr>
                              </thead>
                              <tbody id="pengecualian_table">
                              </tbody>
                            </table>
                          </div>
                          <div class="add_pengguna">
                            <button class="mt-4 align-self-center" type="button" id="selesai_btn">Selesai</button>
                          </div>
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
        <button type="button" data-bs-dismiss="modal">
          <i class="mdi mdi-window-close icon_white" style="font-size: 2em;"></i>
        </button>
      </div>
      <div class="modal-body">
          <div class="ml-2 row mb-2">
            <div class="col-lg-6 col-md-12 col-12 row">
              <label class="col-6"  for="">Tarikh Cadangan Makmal</label>
              <input disabled class="form-control col-6" type="text" name="modal_cadangan_makmal" id="modal_cadangan_makmal" style="font-size: 0.8rem;"> 
            </div>
            <div class="col-lg-6 col-md-12 col-12 row papar">
              <label class="col-5 margin_papar" for="">Lokasi Makmal</label>
              <input disabled class="form-control col-6"  type="text" value="" id="modal_negeri" style="font-size: 0.8rem;">
            </div>
          </div>
          <div class="ml-2 row mb-2">
            <div class="col-lg-6 col-md-12 col-12 row">
              <label class="col-6" for="">Tarikh Makmal Sebenar</label>
              <input disabled class="form-control col-6" type="text" name="modal_makmal_sebenar" id="modal_makmal_sebenar" style="font-size: 0.8rem;"> 
            </div>
            <div class="col-lg-6 col-md-12 col-12 row papar">
              <label  class="col-5 margin_papar" for="">Kos Pelaksanaan <br> Sebelum Makmal</label>
              <span class="input-group-text kos_span col-1" id="basic-addon2" style="height: 68%!important;">RM</span>
              <input disabled type="text" class="form-control kos_data col-5 text-right kos_selepas_makmal" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon2" id="modal_kos_sebelum_makmal" style="font-size: 0.8rem;">
            </div>
          </div>
          <div class="ml-2 row mb-2">
            <div class="col-lg-6 col-md-12 col-12 row">
              <label class="col-6" for="">Tahun Pelaksanaan Makmal</label>
              <input disabled class="form-control col-6" type="text" value="" id="modal_tahun" style="font-size: 0.8rem;">
            </div>
            <div class="col-lg-6 col-md-12 col-12 row">
              <label  class="col-5 margin_papar" for="">Kos Pelaksanaan <br> Selepas Makmal<br> </label>
              <span class="input-group-text kos_span col-1" id="basic-addon2" style="height: 68%!important;">RM</span>
              <input disabled type="text" class="form-control kos_data col-5 text-right kos_selepas_makmal" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon2" id="modal_kos_selepas_makmal" style="font-size: 0.8rem;">
            </div>
          </div>
          <div class="ml-2 row mb-2">
            <div class="col-lg-6 col-md-12 col-12 row">
            </div>
            <div class="col-lg-6 col-md-12 col-12 row">
              <label  class="col-5 margin_papar" for="">Tarikh Lawatan Tapak</label>
              <input disabled class="form-control col-6" type="text" id="modal_lawatan_tapak" style="font-size: 0.8rem;"> 
            </div>
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
                  <h5 style="width:102% !important; text-align: center;" id="save_text"  class="d-none" >Maklumat berjaya disimpan<br></h5>
                  <h5 style="width:102% !important; text-align: center;" id="delete_text" class="d-none" >Maklumat Mesyuarat Pra Makmal telah dipadamkan<br></h5>
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
                          <h5 style="text-align: center;">Proses Makmal Semakan Nilai (VR) <br> telah selesai</h5>
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
@include('valueManagement.maklumatPelakasanaanMakmal_VR.script')