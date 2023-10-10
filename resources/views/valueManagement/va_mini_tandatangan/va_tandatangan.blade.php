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
    <link rel="stylesheet" href="{{ asset('Vm_module/assets/css/Mediaquery.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
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
              <h5><strong>Makmal Mini VA</strong></h5>
            </div>
            <div class="col-md-9 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#" style="display: flex; align-items: center;">
                    <i class="ri-calculator-fill" style="font-size:1rem; vertical-align:middle; color:#39afd1"></i>
                    Value Management
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li>
                  <a href="#" style="display: flex; align-items: center;">
                    Senarai Projek
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li>
                  <a href="#" style="display: flex; align-items: center;">
                    Maklumat Pelaksanaan Makmal
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active"> Makmal MIni VA </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card cardPmakmal">
            <div class="card-body">
              <h4 style="font-size:1.3rem;"><strong style="padding-left: 21%;">MAKLUMAT PELAKSANAAN MAKMAL</strong></h4>
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
                        <div class="">
                          <h6 class="m-3"><strong><img src="{{ asset('Vm_module/assets/images/list_small_yellow.png') }}" class="mr-2 icon_yellow_bg">Makmal Mini VA</strong></h6>
                        </div>
                          <div class="card-body">
  
                            <h6 class="mb-3"><strong>Tandatangan Laporan</strong></h6>
                            <hr>

                            <form id="tandatanganForm">
                              <hr>
                              <div class="row m-1">
                                <div class="col-md-6 col-xs-12 p-1 py-1">
                                  <div class="row">
                                    <div class="col-md-5 col-xs-12"><label for="Kategori_Tandatangan">Kategori Tandatangan<sup>*</sup></label></div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                      <select id="Kategori_Tandatangan" class="form-control" value="Ketua Fasilitator" style="font-size:0.8rem">
                                        <option value="" selected>--Pilih--</option>
                                        <option value="0">Ketua Fasilitator</option>
                                        <option value="1">Ketua Pengarah JPS</option>
                                        <option value="2">Kementerian</option>
                                        <option value="3">BEASSA, KEMENTERIAN EKONOMI</option>
                                      </select>
                                      <p class="text-danger" id="Kategori_Tandatangan_error"></p>
                                    </div>

                                  </div>

                                </div>
                                <div class="col-md-6 col-xs-12 p-1 py-1">
                                  <div class="row">
                                    <div class="col-md-5 col-xs-12"><label for="Tarikh_Tandatangan">Tarikh Tandatangan<sup>*</sup></label></div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                      <input  class="form-control" type="date" name="Tarikh_Tandatangan" id="Tarikh_Tandatangan" style="font-size:0.8rem">
                                      <p class="text-danger" id="Tarikh_Tandatangan_error"></p>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <div class="row m-1 justify-content-end">
                                <div class="col-md-6 col-xs-12 p-1 py-1">
                                  <div class="row align-items-center">
                                    <div class="col-md-5 col-xs-12">
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
                                          <label for="terima_file_name" id="" class="col-md-4">
                                            <img
                                              src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                              class="d-block m-auto"
                                              alt=""
                                            />
                                          </label>
                                          <label for="terima_file_name" id="" class="col-md-8">
                                            <input name="terima_file_name" type="file" class="custom-file-input d-none" id="terima_file_name">
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
                              <div class="nageri_footer">
                                <button id="va_tandatanganSaveBtn" class="vmsimpan mt-4 align-self-center">Simpan</button>
                              </div>
                            </form>
  
                            <div class="table_scroll">
                              <table id="tandatanganTable" class="table table-bordered mt-5 projek_cmn_table">
                                <thead>
                                  <tr>
                                    <th class="text-center" scope="col">Bil</th>
                                    <th class="text-center" scope="col">Kategori Tandatangan</th>
                                    <th class="text-center" scope="col">Tarikh Tandatangan</th>
                                    <th class="text-center" scope="col">Dokumen Lampiran</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>

                            <div class="row">
                              <div class="col-md-12 col-xs-12">
                                <label for="kemuka_file_name" class="">Muat Naik Dokumen Lampiran<sup>*</sup></label>
                              </div>
                              <div class="col-md-6 col-xs-12 form-group">
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
                                  <div class="row col-12 Uploadfile2" id="Uploadfile2">
                                    <label for="kemuka_file_name" id="" class="col-md-4">
                                      <img
                                        src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                        class="d-block m-auto"
                                        alt=""
                                      />
                                    </label>
                                    <label for="kemuka_file_name" id="" class="col-md-6">
                                      <input name="kemuka_file_name" type="file" class="custom-file-input d-none" id="kemuka_file_name">
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
  
                            <div class="vmsimpan_hantar d-flex flex-sm-row flex-column align-items-center">
                              <button class="vmsimpan  m-1" id="simp_redirect">Simpan</button>
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
              <input style="font-size:0.8rem" disabled class="form-control col-3 ml-1 mr-5" type="date" id="modal_cadangan_makmal"> 
              <label class="mr-2" for="">Lokasi Makmal<sup>*</sup></label>
              <input  style="font-size:0.8rem" disabled class="form-control col-3 ml-5"  type="text" value="" id="modal_negeri">
          </div>
          <div class="ml-2 row mb-2">
              <label class="mr-5" for="">Tarikh Makmal Sebenar<sup>*</sup></label>
              <input style="font-size:0.8rem" disabled class="form-control col-3 ml-4 mr-5" type="date" id="modal_makmal_sebenar"> 
              <label for="">Tarikh Lawatan Tapak<sup>*</sup></label>
              <input style="font-size:0.8rem" disabled class="form-control col-3" type="date" id="modal_lawatan_tapak"> 
          </div>
          <div class="ml-2 row mb-2">
            <label class="mr-1" for="">Tahun Pelaksanaan Makmal<sup>*</sup></label>
            <input style="font-size:0.8rem" disabled class="form-control col-3 ml-4" type="text" value="" id="modal_tahun">
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
                  <h5 style="width:102% !important; text-align: center;">Maklumat berjaya di simpan<br></h5>
                  <div class="text-center">
                    <button data-bs-dismiss="modal" class="tutup" id="tutup">Tutup</button>
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
                      <div class="add_role_sucess_modal_header text-end">
                        <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                          <i class="mdi mdi-window-close" id="close_image"></i>
                        </button>
                      </div>
                      <div class="modal-body add_role_sucess_modal_body">
                          <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                          <h5 style="text-align: center">Proses Makmal Mini VA telah selesai. "Sila <b class="noc"> Kemukakan Permohonan </b> NOC di dalam <b class="noc">Modul NOC<b>"</h5>
                          <div class="text-center">
                              <button data-dismiss="modal" class="vmsimpan" id="tutup-confirm">Tutup</button>
                          </div>
                          </div>
                          
                      </div>
                    </div>
                </div>
                </div>
            </div>
</section>

    
    

@include('layouts.vmmodule.footer')
@include('valueManagement.va_mini_tandatangan.script')