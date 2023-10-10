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
            <div class="col-md-4 col-xs-12">
              {{-- <h5 id="kajian_head"><strong>Makmal Mini VA</strong></h5> --}}
              <h5><strong>Makmal Mini Kajian Nilai (Mini VA)</strong></h5>
            </div>
            <div class="col-md-8 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#" style="display: flex; align-items: center;">
                    <i class="ri-calculator-fill icon_blue breadcrumbs_icon mr-1" style="font-size:1.2em; vertical-align:middle;"></i>
                    Value Management
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="/senarai_makmal_and_mini" style="display: flex; align-items: center;">
                    Senarai Projek
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="/maklumat_pelakasanaan_makmal/{{$kod_projek}}/{{$type}}"style="display: flex; align-items: center;">
                    Maklumat Pelaksanaan Makmal
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active">Makmal Mini Kajian Nilai (Mini VA)</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="card cardPmakmal">
            <div class="card-body">
              <h4 style="font-size:1.3rem;"><strong style="padding-left: 21%;">MAKLUMAT PELAKSANAAN MAKMAL</strong></h4>
              <!-- <div class="topnav mt-4" id="myTopnav">
                <a href="#home" class="active col-md-2 col-xs-12 mt-2"><img src="{{ asset('Vm_module/assets/images/list_small_white.png') }}" class="mr-2">Makmal Kajian Nilai (VA)</a>
                <a class="col-md-4 col-xs-12" href="#news"><img src="{{ asset('Vm_module/assets/images/vmspanner_grey.png') }}" class="mr-2">Makmal Kejuruteraan Nilai (VE)</a>
                <a class="col-md-4 col-xs-12" href="#contact"><img src="{{ asset('Vm_module/assets/images/vmlayer_grey.png') }}" class="mr-2">Makmal Semakan Nilai (VR)</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div> -->
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
                      <div style="display: flex; align-items: center;">
                        <i class="ri-list-unordered ri-2x icon_header icon_yellow_bg mr-2"></i>
                        <h6 class="m-3"><strong>Makmal Mini Kajian Nilai (Mini VA)</strong></h6>
                      </div>
                      <div class="card-body">
                        <h6 class="mt-4 mb-3 label-1"><strong>Maklumat Perancangan Makmal</strong></h6>
                        <p class="ml-4 label-1">Maklumat Mesyuarat Pra Makmal</p>
                        <hr>
                        <input style="font-size:0.8rem;" type="hidden" value="{{$kod_projek}}" id="kod_projek">
                        <form id="mmpm">
                          <div class="row m-1">
                            <div class="col-md-5 col-xs-12 p-0 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Cadangan<br>Pra Makmal<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input style="font-size:0.8rem;" disabled class="form-control" type="text" name="tarikh_cadangan" id="tarikh_cadangan">
                                  <div class="error" id="error_tarikh_cadangan" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row d-flex m-1">
                            <div class="col-md-5 col-xs-12 p-0 py-1 mr-5">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Pra Makmal<br>Sebenar<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input style="font-size:0.8rem;" class="form-control" type="text" name="tarikh_pra_makmal_sebenar" id="tarikh_pra_makmal_sebenar" placeholder="dd/mm/yy - dd/mm/yy">
                                  <div class="error" id="error_tarikh_pra_makmal_sebenar" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5 col-xs-12 p-0 py-1">
                              <div class="row">
                                <div class="col-md-4 col-xs-12">
                                  <label for="">Surat Jemputan<br>Mesyuarat<sup>*</sup></label>
                                </div>
                                <div class="col-md-8 col-xs-12 row">
                                  <label class="upload_img pt-3" for="surat_jemputan_mesyuarat">
                                  <div class=" col-md-12 col-xs-12" id="upload_sjm">
                                  <div class="col-12 h6 d-flex">
                                    <img
                                      src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                      class="d-block m-auto"
                                      alt=""
                                    />
                                      <span style="font-size: .8rem !important; width:250px;">
                                        Letakkan fail di sini atau klik untuk memuat
                                        naik
                                        <p class="mt-3">(Saiz fail tidak melebihi 4mb)</p>
                                      </span>
                                      
                                  </div>

                                    
                                    <input class="fileInput d-none" type="file" id="surat_jemputan_mesyuarat" name="surat_jemputan_mesyuarat"/>
                                    <div class="error" id="error_surat_jemputan_mesyuarat" style="color:red"></div>
                                  </div>
                                </label>
                                  <div class="image_preview border border-1" id="sjm_preview">
                                    <div class="uploaded_img_preview_container d-flex justify-content-around mt-2" id="langing_header_1">
                                      <div class="uploaded_img">
                                        <img src="" id="sjm_img" alt="" height="45px"/>' 
                                      </div>
                                      <div class="uploaded_img_details">
                                          <h5 id="header_sjm_name" style="font-size: 0.8rem; font-weight:400;" class="VM_footer"></h5>
                                          <p class="flie_size sizeText" id="header_sjm_size"></p>
                                      </div>
                                      <button type="button" class="remove_image h-25 btn btn" id="remove_sjm_logo">
                                        <img src="{{ asset('assets/images/close_img.png') }}" alt="" />
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            <p class="file_size d-none" id="sjm_file_size">Saiz fail tidak melebihi 4 mb</p>
                            <p class="file_type d-none" id="sjm_file_type">Jenis fail tidak sah</p>
                            <p id="sjm_image_error"></p>
                            
                          </div>
                          <div class="row ">
                            <div class="col-md-3 col-xs-12">
                              <label for="">Keputusan Mesyuarat<sup>*</sup></label>
                              <div class="error" id="error_keputusan_mesyuarat" style="color:red"></div>
                            </div>
                            <div class="col-md-8 col-xs-12 row">
                              <div class="form-check form-check-inline col-md-5 col-xs-12">
                                <input checked class="form-check-input" type="radio" name="keputusan_mesyuarat" id="keputusan_mesyuarat_yes" value="1">
                                <label class="form-check-label" for="inlineRadio1">Ya, Setuju Laksana Makmal</label>
                              </div>
                              <div class="form-check form-check-inline col-md-5 col-xs-12">
                                <input class="form-check-input" type="radio" name="keputusan_mesyuarat" id="keputusan_mesyuarat_no" value="0">
                                <label class="form-check-label text-nowrap" for="inlineRadio2">Tidak, Mesyuarat Pra Makmal Seterusnya</label>
                              </div>
                            </div>
                          </div>
                          <div class="row mt-4">
                            <div class="col-md-3 col-xs-12">
                              <label for="">Minit Mesyuarat<sup>*</sup></label>
                            </div>
                            <div  class="col-md-8 col-xs-12 row " >
                              <label class=" upload_img" for="minit_mesyuara">
                              <div class=" col-md-12 col-xs-12" id="upload_mini">
                                <div class="col-12 h6 d-flex">
                               
                                    <img
                                    src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                    class="d-block m-auto"
                                    alt=""
                                  />
                                    <span style="font-size: .8rem !important; width:250px;">
                                      Letakkan fail di sini atau klik untuk memuat
                                      naik
                                      <p class="mt-3">(Saiz fail tidak melebihi 4mb)</p>
                                    </span>
                                  
                                </div>
                             
                                <input class="fileInput d-none" type="file" id="minit_mesyuara" name="minit_mesyuara"/>
                                <div class="error" id="error_minit_mesyuara" style="color:red"></div>
                              </div>
                            </label>
                              <div class="image_preview border border-1 col-5" id="mini_preview">
                                <div class="uploaded_img_preview_container d-flex justify-content-around mt-2" id="langing_header_1">
                                  <div class="uploaded_img">
                                    <img src="" id="mini_img" alt="" height="45px"/>
                                  </div>
                                  <div class="uploaded_img_details">
                                      <h5 id="header_mini_name" style="font-size: 0.8rem; font-weight:400;" class="VM_footer"></h5>
                                      <p class="flie_size sizeText" id="header_mini_size"></p>
                                  </div>
                                  <button type="button" class="remove_image btn btn h-25" id="remove_mini_logo">
                                    <img src="{{ asset('assets/images/close_img.png') }}" alt="" />
                                  </button>
                                </div>
                              </div>
                            </div>
                            <p class="file_size d-none" id="mini_file_size">Saiz fail tidak melebihi 4 mb</p>
                            <p class="file_type d-none" id="mini_file_type">Jenis fail tidak sah</p>
                            <p id="mini_image_error"></p>
                          </div>
                          <div class="nageri_footer">
                            <button class="vmsimpan mt-3 align-self-center" id="simpan_mmpm">Simpan</button>
                          </div>
                        </form>

                        <div id="sjm_table_div" class="table_scroll">
                          <table class="table table-bordered mt-5 projek_cmn_table" id="sjm_table">
                            <thead>
                              <tr>
                                <th scope="col">Bil</th>
                                <th scope="col">Tarikh Cadangan Pra Makmal</th>
                                <th scope="col">Tarikh Pra Makmal</th>
                                <th scope="col">Surat Jemputan Mesyuarat</th>
                                <th scope="col">Keputusan Mesyuarat</th>
                                <th scope="col">Minit Mesyuarat</th>
                              </tr>
                            </thead>
                            <tbody id="sjm_tbody">
                              
                            </tbody>
                          </table>
                        </div>

                        <p id="Butiran_Makmal_label" class="mt-4 ml-4">Butiran Makmal</p>
                        <hr id="Butiran_Makmal_hr">
                        <form id="butiran">
                          <div class="row m-1">
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Tarikh Cadangan Makmal<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group">
                                  <input style="font-size:0.8rem;" disabled class="form-control" type="text" name="cadangan_makmal" id="cadangan_makmal"> 
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-5 col-xs-12">
                                  <label for="">Lokasi Makmal<sup>*</sup></label>
                                </div>
                                <div class="col-md-7 col-xs-12 form-group">
                                  <input style="font-size:0.8rem;" class="form-control" type="text" name="negeri" id="negeri">
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
                                  <input style="font-size:0.8rem;" class="form-control" type="text" name="makmal_sebenar" id="makmal_sebenar"> 
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
                                  <input style="font-size:0.8rem;" disabled class="form-control" type="text" name="lawatan_tapak" id="lawatan_tapak">
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
                                  <input style="font-size:0.8rem;" disabled class="form-control" type="text" id="year" name="year">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-5 col-xs-12">
                                  <label for="">Mesyuarat Stakeholder</label>
                                </div>
                                <div class="col-md-7 col-xs-12 form-group">
                                  <input style="font-size:0.8rem;" disabled class="form-control" type="text" name="mesyuarat_date" id="mesyuarat_date">
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
                                  <span class="input-group-text Table_perunding_header" id="basic-addon2" style="font-size:0.8rem;">RM</span>
                                  <input style="font-size:0.8rem;text-align:right;" type="text" class="form-control kos_selepas_makmal" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon2" id="kos_sebelum_makmal">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 py-1">
                              <div class="row align-items-center">
                                <div class="col-lg-5 col-md-6 col-xs-12"><label for="">Kos Pelaksanaan <br> Makmal(Selepas)<sup>*</sup></label></div>
                                <div class="col-lg-7 col-md-6 col-xs-12 form-group d-flex">
                                  <span class="input-group-text Table_perunding_header" id="basic-addon3" style="font-size:0.8rem;">RM</span>
                                  <input style="font-size:0.8rem;text-align:right;" type="text" class="form-control kos_selepas_makmal" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon3" id="kos_pelakas_selepas_makmal">
                                  <div class="error" id="error_kos_pelakas_selepas_makmal" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <label class="mt-4 ml-4" for="">Senarai Fasilitator<sup>*</sup></label>
                          <div class="error" id="error_fasilitator" style="color:red"></div>
                          <div class="pt-4 table_scroll">
                            <div class="table-responsive">
                              <table class="table table-bordered projek_cmn_table" id="buti_table_id">
                                <thead>
                                  <tr>
                                    <th class="text-center">Bil</th>
                                    <th class="text-center">Nama Fasilitator</th>
                                    <th class="text-center">Gred</th>
                                    <th class="text-center">Peranan</th>
                                    <th class="text-center">Pejabat</th>
                                    <th class="text-center"><button class="vmplus_minus" id="addBtnFas" type="button"><i class="ri-add-box-line" style="color:#fff; font-size: 1.5rem"></i></button></th>
                                  </tr>
                                </thead>
                                <tbody id="butiran_tbody">
                                   
                                </tbody> 
                              </table>
                            
                            </div>
                          </div>
                          <div class="nageri_footer">
                            <button class="vmsimpan mt-3 align-self-center" id="submit_butiran">Simpan</button>
                            <!-- <button class="vmsimpan mt-3 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Simpan</button> -->
                          </div>
                        </form>
                  
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

                        <h6 class="mt-4 mb-3 label-1"><strong>Maklumat Mini Kajian Nilai</strong></h6><hr>


                        <p id="draft_laporan_label" class="mt-4">Draf Laporan</p>
                        <form id="draft_laporan">
                          <div class="row m-1">
                            <div class="col-md-6 col-xs-12 p-0 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-6 col-xs-12"><label for="">Kos Selepas Makmal<sup>*</sup></label></div>
                                <div class="col-md-6 col-xs-12 form-group d-flex">
                                  <span class="input-group-text Table_perunding_header" id="basic-addon1" style="font-size:0.8rem;">RM</span>
                                  <input style="font-size:0.8rem;text-align:right;" type="text" class="form-control kos_selepas_makmal" value="" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" id="kos_selepas_makmal">
                                  <div class="error" id="error_kos_selepas_makmal" style="color:red"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <h6 class="m-3"><strong>Perbandingan Objektif Sebelum dan Selepas Kelulusan</strong></h6>
                          <div class="table_scroll pt-4">
                            <div class="table-responsive d-flex">
                              <table class="table table-bordered projek_cmn_table" id="oldobjektifTable">
                                <thead>
                                  <tr>
                                    <th class="text-center">Bil</th>
                                    <th class="text-center">Objektif Projek Sebelum Makmal</th>
                                  </tr>
                                </thead>
                                <tbody id="tbodyoldobjektif">
                                  
                                </tbody>
                              </table>
                              <table class="table table-bordered projek_cmn_table" id="newobjektifTable">
                                <thead>
                                  <tr>
                                    <th class="text-center">Objektif Projek Selepas Makmal</th>
                                    <th class="text-center"><button class="vmplus_minus" id="addBtnObjektif" type="button"><i class="ri-add-box-line ri-xl icon_white"></i></button></th>
                                  </tr>
                                </thead>
                                <tbody id="tbodynewobjektif">
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <h6 class="m-3"><strong>Perbandingan Skop dan Kos Sebelum dan Selepas Makmal</strong></h6>
                          
                          <div class="table_scroll pt-4">
                            <div class="table-responsive">
                            <table class="table table-bordered projek_cmn_table_skop" id="oldskopTable">
                                <thead>
                                  <tr>
                                    <th class="text-center">Bil</th>
                                    <th class="text-center">Skop Projek Sebelum Makmal</th>
                                    <th class="text-center">Kos Projek Sebelum Makmal (RM)</th>
                                  </tr>
                                </thead>
                                <tbody id="tbodyoldskop">
                                  
                                </tbody>
                              </table>
                              <table class="table table-bordered projek_cmn_table_skop" id="newskopTable">
                                <thead>
                                  <tr>
                                    <th class="text-center">Skop Projek Selepas Makmal</th>
                                    <th class="text-center">Kos Projek Selepas Makmal (RM)</th>
                                    <th class="text-center"><button class="vmplus_minus" id="addBtnSkop" type="button"><i class="ri-add-box-line ri-xl icon_white" style="font-size: 1.2rem; color: #fff; vertical-align: middle;cursor: pointer"></i></button></th>
                                  </tr>
                                </thead>
                                <tbody id="tbodynewskop">
                                  
                                </tbody>
                              </table>
                              <table class="table table-bordered projek_cmn_table">
                                <tbody id="tbodyfooter">
                                  <tr>
                                    <td class="vmfooter_table" colspan="6">
                                      <label class="" for="">Jumlah Kos Projek Sebelum Makmal (RM) (A)</label>
                                      <input class="vmfooter_table_input_grey text-right" disabled type="text" value="" name="" id="oldTotalSkopKos">
                                      <label for="">Jumlah Kos Projek Selepas Makmal (RM) (B)</label>
                                      <input class="vmfooter_table_input_grey text-right" disabled type="text" value="" name="" id="newTotalSkopKos">
                                    </td>
                                  </tr> 
                                  <tr>
                                    <td class="vmfooter_table" colspan="6">
                                      <label for="">Perbezaan Kos (RM) (B-A)</label>
                                      <input class="vmfooter_table_input mr-3 text-right" type="text" value="" name="" id="kosDifference">
                                      <input class="vmfooter_table_input text-right" type="text" value="" name="" id="diiferencePercentage">
                                    </td>
                                  </tr>
                                </tbody>
                               
                              </table>
                            </div>
                          </div>

                          <h6 class="m-3"><strong>Perbandingan Outcome Sebelum dan Selepas Makmal</strong></h6>
                          <div class="table_scroll">
                            <div class="table-responsive d-flex">
                              <table class="table table-bordered projek_cmn_table" id="oldoutcometable">
                                <thead>
                                  <tr>
                                    <th class="text-center">Bil</th>
                                    <th class="text-center text-nowrap">Outcome Sebelum Makmal</th>
                                    <th class="text-center">Kuantiti/Bilangan</th>
                                    <th class="text-center">Unit</th>
                                  </tr>
                                </thead>
                                <tbody id="tbodyoldoutcome">
                                
                                </tbody>
                              </table>
                              <table class="table table-bordered projek_cmn_table" id="newoutcometable">
                                <thead>
                                  <tr>
                                    <th class="text-center text-nowrap">Outcome Selepas Makmal</th>
                                    <th class="text-center">Kuantiti/Bilangan</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center"><i id="addBtnOutcome" class="ri-add-box-line" style="font-size: 1.2rem; color: #fff; vertical-align: middle;cursor: pointer"></i></th>
                                  </tr>
                                </thead>
                                <tbody id="tbodynewoutcome">
                                
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <h6 class="m-3"><strong>Perbandingan Output Sebelum dan Selepas Makmal</strong></h6>
                          <div class="table_scroll">
                            <div class="table-responsive d-flex">
                              <table class="table table-bordered projek_cmn_table" id="oldoutputtable">
                                <thead>
                                  <tr>
                                    <th class="text-center">Bil</th>
                                    <th class="text-center text-nowrap">Output Sebelum Makmal</th>
                                    <th class="text-center">Kuantiti/Bilangan</th>
                                    <th class="text-center">Unit</th>
                                  </tr>
                                </thead>
                                <tbody id="tbodyoldoutput">
                                
                                </tbody>
                              </table>
                              <table class="table table-bordered projek_cmn_table" id="newoutputtable">
                                <thead> 
                                  <tr>
                                    <th class="text-center">Output Selepas Makmal</th>
                                    <th class="text-center text-nowrap">Kuantiti/Bilangan</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center"><i id="addBtnOutput" class="ri-add-box-line ri-xl icon_white" style="font-size: 1.2rem; color: #fff; vertical-align: middle;cursor: pointer"></i></th>
                                  </tr>
                                </thead>
                                <tbody id="tbodynewoutput">
                                
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <div id="naik_laporan">
                            <div class="row mt-4">
                              <div class="row col-md-3 col-xs-12 ml-3">
                                <label for="">Muat Naik Laporan<br> Makmal<sup>*</sup></label>
                                <div class="vmpop_over info ml-1">
                                  <button class="vmpop_btn" id="vmpop_btn">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                  </button>
                                </div>
                                <div class="position-absolute vm_info1">
                                  <div class="vmpop_content d-none" id="vmpop_content">
                                    <p>Laporan perlu lengkap ditandatangani sebelum dimuatnaik</p>
                                  </div>
                                </div>
                              </div>
                              <div  class="col-md-6 col-xs-12" >
                                <div class="upload_img col-md-11 col-xs-12" id="upload_lm">
                                  <div class=" col-12">
                                    <label class="h6 " for="laporan_makmal">
                                      <img
                                      src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                      class="d-block m-auto"
                                      alt=""
                                    />
                                      <span style="font-size: .8rem !important;">
                                        <label class="ml-4" style="text-align:center;">Letakkan fail di sini atau klik untuk memuat
                                        naik
                                      </span>
                                    </label>
                                  </div>
                                  <p class="text-align:right; mr-1">(Saiz fail tidak melebihi 4mb)</p>
                                  <input style="font-size: .8rem !important" class="fileInput d-none" type="file" id="laporan_makmal" name="laporan_makmal"/>
                                </div>
                                <input  type="hidden" id="existing_file" value="false"/>
                                <div class="image_preview border border-1 col-5" id="lm_preview">
                                    <div class="uploaded_img_preview_container d-flex justify-content-around mt-2" id="langing_header_1">
                                      <div class="uploaded_img">
                                        <img src="" id="lm_img" alt="" height="45px" onclick="downloadLampiranDoc()"/>' 
                                      </div>
                                      <div class="uploaded_img_details">
                                          <h5 id="header_lm_name" style="font-size:0.8rem; font-weight:400;" class="VM_footer"></h5>
                                          <p class="flie_size sizeText" id="header_lm_size"></p>
                                      </div>
                                      <button type="button" class="remove_image btn btn h-25" id="remove_lm_logo">
                                        <img src="{{ asset('assets/images/close_img.png') }}" alt="" />
                                      </button>
                                    </div>
                                  </div>
                              </div>
                              <p class="file_size d-none" id="laporan_file_size">Saiz fail tidak melebihi 4 mb</p>
                              <p class="file_type d-none" id="laporan_file_type">Jenis fail tidak sah</p>
                              <p id="laporan_image_error"></p>
                            </div>
                            <input  type="hidden" name="va_id" id="va_id">
                            <div class="error" id="error_laporanFileInput" style="color:red"></div>
                          </div>
                        </form>
                        <div class="vmsimpan_hantar pt-3" id="vmsimpan_hantar">
                          <button class="vmsimpan mr-2" id="ssimpan_lampiran">Simpan</button>
                          <button class="vmhantar" id="Selesai" style="background-color: #0ACF97">Seterusnya</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
        <button type="button" class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-window-close icon_white" style="font-size: 2em;" id="close_modal"></i>
        </button>
      </div>
      <div class="modal-body">
          <div class="ml-2 row mb-2">
            <div class="col-6 row">
              <label class="col-6" for="">Tarikh Cadangan Makmal<sup>*</sup></label>
              <input disabled class="form-control col-6" type="text" name="modal_cadangan_makmal" id="modal_cadangan_makmal"> 
            </div>
            <div class="col-6 row">
              <label class="col-5 ml-3" for="">Lokasi Makmal<sup>*</sup></label>
              <input disabled class="form-control col-6"  type="text" value="" id="modal_negeri">
            </div>
          </div>
          <div class="ml-2 row mb-2">
            <div class="col-6 row">
              <label class="col-6" for="">Tarikh Makmal Sebenar</label>
              <input disabled class="form-control col-6" type="text" name="modal_makmal_sebenar" id="modal_makmal_sebenar"> 
            </div>
            <div class="col-6 row">
              <label  class="col-5 ml-3" for="">Kos Pelaksanaan <br> Sebelum Makmal</label>
              <span class="input-group-text kos_span col-1" id="basic-addon2" >RM</span>
              <input disabled type="text" class="form-control kos_data col-5" value="" aria-label="Username" style="text-align:right;" aria-describedby="basic-addon2" id="modal_kos_sebelum_makmal">
            </div>
          </div>
          <div class="ml-2 row mb-2">
            <div class="col-6 row">
              <label class="col-6" for="">Tahun Pelaksanaan Makmal</label>
              <input disabled class="form-control col-6" type="text" value="" id="modal_tahun">
            </div>
            <div class="col-6 row">
              <label  class="col-5 ml-3" for="">Kos Pelaksanaan <br> Selepas Makmal<br> </label>
              <span class="input-group-text kos_span col-1" id="basic-addon2">RM</span>
              <input disabled type="text" class="form-control kos_data col-5" value="" aria-label="Username" style="text-align:right;" aria-describedby="basic-addon2" id="modal_kos_selepas_makmal">
            </div>
          </div>
          <div class="ml-2 row mb-2">
            <div class="col-6 row">
            </div>
            <div class="col-6 row">
              <label  class="col-5 ml-3" for="">Tarikh Lawatan Tapak</label>
              <input disabled class="form-control col-6" type="text" id="modal_lawatan_tapak"> 
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
                  <button class="ml-auto" data-bs-dismiss="modal">
                    <i class="mdi mdi-window-close" id="close_image"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h5 style="width:102% !important; text-align:center;">Maklumat berjaya di simpan<br></h5>
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

@include('layouts.vmmodule.footer')
@include('valueManagement.pelakasanan_mini_makmal.script')
@include('valueManagement.pelakasanan_mini_makmal.mmpm_script')
@include('valueManagement.pelakasanan_mini_makmal.butiran_script')
@include('valueManagement.pelakasanan_mini_makmal.ulasan_script')