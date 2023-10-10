@include('valueManagement.ringkasan.style')
@extends('layouts.vmmodule.master')


@section('content_vmmodule')
<div class="Mainbody_content mtop nageri_container">

<x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
</x-form.spinner> 

<input type="hidden" value="{{$kod_projek}}" id="kod_projek">
<input type="hidden" value="{{$type}}" id="type">


          <div class="Mainbody_content_nav_header project_register align-items-center row">
            <div class="col-md-6 col-xs-12">
              <h4>Ringkasan Projek</h4>
            </div>
            <div class="col-md-6 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#" class="text-info" style="display: flex; align-items: center;">
                  <i class="ri-calculator-fill icon_blue breadcrumbs_icon mr-1" style="font-size:1.2em; vertical-align:middle;"></i>
                      Value Management
                      <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="/senarai_makmal_and_mini" class="text-info" style="display: flex; align-items: center;">
                    Senarai Projek 
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-1"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active">
                    Ringkasan Projek Seperti Kelulusan
                  
                    </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card ringkasanCard">
            <div class="card-body">
                   <div class="project_register_tab_container nageri_gap">
           
                   <div class="project_register_tab_btn_container col-2">
                    <ul>
                    <li class="success active">
                        <div class="tab_image">
                        <a href="/load_ringkasan/{{$kod_projek}}/{{$type}}"><img src="{{ asset('Vm_module/assets/images/vmringkasanProjek_icon_white.png') }}" alt="" /></a>
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
                    <li>
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
              <div class="project_register_tab_content_container nageri_right_content col-10">
                <form>
                    <div class="Mainbody_content_nav_header project_register d-flex flex-sm-row flex-column align-items-center">
                        <h5><strong>RINGKASAN PROJEK SEPERTI KELULUSAN</strong></h5>
                        <div class="userlist_content_header_right">
                        <x-form.print></x-form.print>
                        </div>
                      </div>
                  <div class="nageri_form_content">
                   
                    <div class="nageri_select_box border-0">
                      <div class="ringkasan_container">
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah">Nama Projek </label></div>
                          <div class="col-md-10 col-xs-12 w-100">
                            <p id="nama_projek">---</p>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">Objektif </label></div>
                          <div class="col-md-10 col-xs-12 w-100">
                            <div class="w-100" id="objective">
                            </div>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">Ringkasan Latar Belakang </label></div>
                          <div class="col-md-10 col-xs-12 w-100">
                            <p style="text-align: justify" id="ringkasan">---</p>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">Jenis Kategori </label></div>
                          <div class="col-md-10 col-xs-12 w-100">
                            <p style="text-align: justify" id="jenis_kategori_name">---</p>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">Outcome Projek </label></div>
                          <div class="col-md-10 col-xs-12" style="width: 100%;">
                            <table class="projek_cmn_table table-responsive">
                              <thead>
                                <tr>
                                  <th class="pemberat_subtitle">Bil</th>
                                  <th class="pemberat_subtitle">Butiran Outcome</th>
                                </tr>
                              </thead>
                              <tbody id="outcome_tbody">
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">Output Projek </label></div>
                          <div class="col-md-10 col-xs-12" style="width: 100%;">
                            <table class="projek_cmn_table table-responsive">
                              <thead>
                                <tr>
                                  <th>Bil</th>
                                  <th>Butiran Output</th>
                                </tr>
                              </thead>
                              <tbody id="output_tbody">
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">KPI Projek </label></div>
                          <div class="col-md-10 col-xs-12" style="width: 100%;">
                            <table class="projek_cmn_table table-responsive" id="table">
                              <thead>
                                <tr>
                                  <th rowspan="2">Bil</th>
                                  <th class="col-1" rowspan="2">Kuantiti/Bilangan</th>
                                  <th rowspan="2">Unit</th>
                                  <th rowspan="2">Penerangan</th>
                                  <th rowspan="1" colspan="6" class="text-center">Sasaran</th>
                                </tr>
                                <tr></tr>
                              </thead>
                              <tbody id="grid_body">
                                <tr id="grid_body">
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="Faedah ">Lokasi </label></div>
                          <div class="col-md-10 col-xs-12" style="width: 100%;">
                            <table class="projek_cmn_table projek_cmn_table_center table-responsive">
                              <thead>
                                <tr>
                                  <th>Negeri</th>
                                  <th>Daerah</th>
                                  <th>Mukim</th>
                                  <th>Parlimen</th>
                                  <th>Dun</th>
                                </tr>
                              </thead>
                              <tbody id="table_lokasi">
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="row lokasi_img_container">
                          <div class="col-md-2 col-xs-12"><label for="Faedah"> </label></div>
                          <div class="col-md-10 col-xs-12 w-100 row">
                            <div class="col-lg-4">
                              <div class="lokasi_card">
                                <div class="w-100 mb-2">
                                  <img  src="{{ asset('Vm_module/assets/images/image 231.png') }}" alt="Satellite view Map" />
                                </div>
                                <p style="text-align: justify">
                                  Hakisan pantai di hadapan Kem PLKN/OBS dan
                                  Istana Flinstone
                                </p>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="lokasi_card">
                                <div class="w-100 mb-2">
                                  <img src="{{ asset('Vm_module/assets/images/image 232.png') }}" alt="A women is riding on the Horse" />
                                </div>
                                <p style="text-align: justify">
                                  Tuanku melawat kesan hakisan pantai pada 16 Mei
                                  2020 seterusnya mengeluarkan titah supaya projek
                                  pengawalan hakisan pantai dilaksanakan
                                </p>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="lokasi_card">
                                <div class="w-100 mb-2">
                                  <img  src="{{ asset('Vm_module/assets/images/image 233.png') }}" alt="Houses Located near the Beach" />
                                </div>
                                <p style="text-align: justify">Hakisan pantai di hadapan Kem PLKN/OBS</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="input_fill_content row">
                          <div class="col-md-2 col-xs-12"><label for="">Skop dan Kewangan</label></div>
                          <div class="col-md-10 col-xs-12 table-responsive" style="width: 100%;">      
                            <table class="vmskop_kewangan">
                              <thead>
                                <tr>
                                </tr>
                              </thead>
                              <tbody class="komponen_de">
                                <tr>
                                  <td>Komponen DE</td>
                                  <td id="komponen_de">---</td>
                                </tr>
                                <tr>
                                  <td>Kos Projek (RM)</td>
                                  <td id="kos_projek">---</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>  
                        </div>
                        <div class="input_fill_content">
                          <div class="" style="width: 100%;">
                            <table class="vmskop_komponen">
                              <thead>
                                <tr>
                                  <th>Bil</th>
                                  <th style="padding-left:100px;padding-right:100px;">Skop & Komponen</th>
                                  <th>Kos (RM)</th>
                                </tr>
                              </thead>
                              <tbody class="table-responsive" id="skop_table">
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="nageri_footer">
                    <a id="redirectToKalendar"><button type="button" class="nageri_green green" style="background-color: #0ACF97">Seterusnya</button></a>
                  </div> -->
                </form>
              </div>
          </div>
            </div>
        </div>
       
        </div>
      </div>

      <!-- Mainbody_conatiner Starts -->
    </div>
    @include('valueManagement.ringkasan.scripts')
@endsection