@include('users.dashboard.style')
@include('noc.kertas_Permohonan_NOC.nocStyle')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')

<div class="Mainbody_content mtop ml-3">
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
                    <h5>EPU</h5>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="rmk_flow_Chart_content">
                    <div class=" box_content vmbox_content">
                      <p style="text-align: center;" class="yellow">Penyediaan Draf Laporan Makmal</p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content ">
                      <p>Dalam Semakan</p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content">
                      <p style="text-align: center;">Dalam Tindakan 
                        Kementerian </p>
                    </div>
                  </div>
                  <div class="rmk_flow_Chart_content">
                    <div class="box_content bend ">
                      <p style="text-align: center;">Dalam Tindakan
                        EPU</p>
                    </div>
                  </div>
                </div>
                
                <div class="d-flex justify-content-end">
                  <div class="rmk_flow_Chart_content" style="width: 20%;">
                    <h4 class="mt-4 ml-5">Lulus</h4>
                    <h4 class="mt-4 ml-5">Tidak Lulus</h4>
                  </div>
                 
                </div>
              </div>
            </div>
          <!-- flowchart end -->
              </div>



              <div id="ppmp_area" class="project_register_search_container mt-3">
                <div class="project_register_search_header d-flex">
                  <h4>PERMOHONAN PERUBAHAN MAKLUMAT PROJEK</h4>
                </div>
                <hr>
                <div class="NOC_perubahanMaklumat">
              <form>
                <div class="row m-1">
                <div class="container1 col-md-3 col-xs-12">
                    <label for="">RMK</label><br>
                    <label for="">Tahun</label>
                </div>
                <div class="container2 col-md-3 col-xs-12">
                    <label for="" id="rmk_head">12</label><br>
                    <label for="" id="tahun_head">2022</label>
                </div>
                <div class="container1 col-md-3 col-xs-12">
                    <label for="">Nombor Rujukan</label><br>
                    <label for="">Status Permohonan</label>
                </div>
                <div class="container2 col-md-3 col-xs-12">
                    <label for="" id="rujukan_head">NC2023-001</label><br>
                    <label for="" id="status_head">Dalam Tindakan</label>
                </div>
                </div>
              </form>
                </div>
              </div>
              

             
            <div class="project_register_search_container mt-3">
              <div class="project_register_search_form_container d-flex">
                <form>
                    <div>
                        <div class="section1">
                            <div class="col-md-12 col-xs-12 "><label class="NOC_title" for="RMK">Kategori Notis Perubahan</label></div>
                        </div>
                        <div class="section2 NOC_desc">
                          <div class="row" style="width: 120%">
                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox1" value="option1">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox1">Peluasan Skop</p>
                                    </div>
                              </div>
                              <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox2" value="option1">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox2">Perubahan Nama Projek</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox3" value="option1">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox3">Perubahan Kod Projek</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox4" value="option1">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox4">Pertambahan Kos</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox5" value="option1">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox5">Perubahan Lokasi Projek</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox6" value="option1">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox6">Perubahan Objektif</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox7" value="option1">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox7">Wujud Butiran Baharu</p>
                                  </div>
                            </div>
                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline form-group">
                                      <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox8" value="option1">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox8">Perubahan KPI</p>
                                    </div>
                              </div>

                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox9" value="option1">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox9">Perubahan Output</p>
                                    </div>
                              </div>


                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox10" value="option1">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox10">Wujud Semula Butiran</p>
                                    </div>
                              </div>


                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox11" value="option1">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox11">Perubahan Outcome</p>
                                    </div>
                              </div>

                          </div>
                      </div>
                      </div>
                      <div class="section3 NOC_desc" style="width: 100% !important">
                        <div class="ml-2 col-md-12 col-xs-12">
                            <p class="NOC_title" for="">Sebab Terperinci <sup>*</sup></p>
                            <fieldset style="text-align-last:center">
                                <label class="text-white bg-success p-1" style="border-radius: 5px;position: relative;top: 10px;width: 30%">Patah perkataan 0 dari 500</label>
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </fieldset>
                        </div> 
                      </div>
                    </form>
                    </div>
              </div>

              <div id="maklumat_pilih_projek_form" class="project_register_search_container mt-3 d-none">
                <div class="project_register_search_header  d-flex">
                  <h4>MAKLUMAT PROJEK</h4>
                </div>
                <hr>
              <form>
                <div class="">
                  <div class="col-md-8 " style="font-size: 0.8rem;"><label class="NOC_title" for="RMK">Pilih Projek</label></div>
                  <select name="" class="form-control" id="selectProject"></select>

                  <div class="col-md-8 " style="font-size: 0.8rem;"><label class="NOC_title" for="RMK">Pilih Projek</label></div>
                  <select name="" class="form-control" id="selectProject"></select>
                </div>
               
              </form>
              </div>
              {{-- 1 --}}
              <div id="peluasan_skop_form" class="project_register_search_container mt-3 d-none">
                <div class="">
              <form id="Peluasan_Skop_Form" name="Peluasan_Skop_Form" class="Peluasan_Skop_Form">
                <input type="hidden" id="pp_id">
                <input type="hidden" value="1" id="status_id">

                <div class="project_register_search_header">
                  <!-- <img src="assets/images/Vector-12.png" alt=""/> -->
                  <div class="row m-1">
                    <div class="col-md-8 col-xs-12">
                        <h4>Peluasan Skop</h4>
                    </div>
                     
                  <!-- <div class="userlist_content_header_right col-md-4 col-xs-12">
                  <button class="btn btn-success tambah-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add_plus.png">Tambah Dokumen Lampiran</button>
                </div> -->
                  </div>
                </div>
                <hr>
                <div class="userlist_tab_content_header">
                  <!-- <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
                    <button class="active">MAKMAL VA</button>
                    <button>MAKMAL MINI VA</button>
                  </div> -->
                  <div style="overflow-x:auto;">
                         <table class="table m-5" style="height: auto; width: 90%;">
                    <thead>
                      <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff !important;">
                        <th width="50%" scope="col" class="text-center text-white NOCtblKodprojek">Skop Asal</th>
                        <th width="50%" scope="col" class="text-center text-white NOCtblKodprojek">Skop Mohon</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: 0.8rem">
                      <tr>
                        <td class="NOCtblKodprojek">Kod Projek <label>55224478788</label></td>
                        <td class="NOCtblKodprojek">

                            Kod Projek <label>55224478788</label>  
                            <button class="outcome_minus" style="border:none !important;background: transparent !important; float: right;">
                                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                            </button>
                          {{-- <select name="" class="form-control" id="">
                            <option value="Pilih">
                              Pilih
                            </option>
                        </select> --}}
                        </td>
                      </tr>
                      <tr>
                        <td class="NOCtblKodprojek">
                            Skop
                            <ol>
                                <li>lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                                lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda</li>
                                <ul>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                </ul>
                                
                                <li>lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                                lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda</li>
                                <ul>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                </ul>
                                <li>lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                                lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                                lembangan Sugai Muda</li>
                                <ul>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                </ul>
                            </ol>

                        </td>
                        <td class="NOCtblKodprojek">
                            Skop
                            <textarea id="SkopData" class="form-control h-100"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td class="NOCtblKodprojek">Keterangan <br>

                            lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                            lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                        </td>
                        <td class="NOCtblKodprojek">
                            Keterangan
                            <textarea id="KeteranganData" class="form-control h-100"></textarea>

                        </td>
                      </tr>
                      <tr>
                        <td class="NOCtblKodprojek">Komponen

                            <ol>
                                <li>lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                                lembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Mudalembangan Sugai Muda
                                lembangan Sugai Muda</li>
                                <ul>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    <li>lembangan Sugai Muda</li>
                                    </ul>
                            </ol>
                        </td>
                        <td class="NOCtblKodprojek">
                            Komponen
                            <textarea id="KomponenData" class="form-control h-100"></textarea>
                            
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  <center>
                    <div class="userlist_content_header_right col-md-12 text-center">
                      <button class="KembaliBtnNOC">Batal</button>
                      <button type="button" onclick=simpanSkopData() class="SimpanBtnNOC">Simpan</button>
                      <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                    </div>
                  </center>
          </div>
            </div>
              </form>
                </div>

            {{-- 2 --}}
              <div id="Perubahan_Nama_Projek_Form" class="project_register_search_container mt-3 d-none">
                <form name="Perubahan_Nama_Form" id="Perubahan_Nama_Form">

                <div class="">
                <div class="project_register_search_header">
                  <div class="row m-1">
                    <div class="col-md-8 col-xs-12">
                        <h4>Perubahan Nama Projek</h4>
                    </div>
                    <div class="project_register_search_form_container  NOC_desc ml-5">
      
                        
      
                    <div class="row col-md-12 col-xs-12 p-0 py-1">
                              <div class="col-md-6 col-xs-12 p-0 py-1">
                                <div class="row align-items-center">
                                  <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="RMK">RMK</label></div>
                                  <div class="col-md-8 col-xs-12 form-group">
                                    <input type="text" name="" id="" class="form-control" value="Rancangan Malaysia Ke-12" disabled >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-xs-12 p-0 py-1">
                                <div class="row align-items-center">
                                  <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="RMK">Tahun Permohonan</label></div>
                                  <div class="col-md-8 col-xs-12 form-group">
                                    <select disabled name="" id="" class="form-control" >
                                      <option>--Pilih--</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row col-md-12 col-xs-12 p-0 py-1">
                              <div class="col-md-6 col-xs-12 p-0 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="Nama Projek">Nama Projek 
                                  (Asal)</label></div>
                                <div class="col-md-8 col-xs-12 form-group">
                                  <input disabled type="text" name="" id="" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12 p-0 py-1">
                              <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="Nama Projek">Bahagian</label></div>
                                <div class="col-md-8 col-xs-12 form-group">
                                  <input disabled type="text" name="" id="" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                          </div>
      
                            <div class="row col-md-12 col-xs-12 p-0 py-1">
                              <div class="col-md-6 col-xs-12 p-0 py-1">
                                <div class="row align-items-center">
                                  <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="RMK">Nama Projek 
                                    (Baharu)</label></div>
                                  <div class="col-md-8 col-xs-12 form-group">
                                    <input type="text" name="nameBaharu" id="nameBaharu" class="form-control">
                                  </div>
                                </div>
                              </div>
                            </div>
      
                            <div class="row col-md-12 col-xs-12 p-0 py-1">
                              <div class="col-md-6 col-xs-12 p-0 py-1">
                                  <div class="row align-items-center">
                                    <div class="col-md-3 col-xs-12">
                                      <label class="pemberat_title" for="Bahagian">Kod Projek</label>
                                    </div>
                                    <div class="col-md-8 col-xs-12 form-group">
                                      <input disabled type="text" name="" id="" class="form-control" value="Kod Projek">
                                    </div>
                                  </div>
                                </div>
                            </div>
                      
                    </div>
              
                  </div>
                </div>
                <div class="userlist_tab_content_header">
            
                 
                  <center>
                    <div class="userlist_content_header_right col-md-12 text-center">
                      <button class="KembaliBtnNOC">Batal</button>
                      <button type="button" onclick=simpanNamaData() class="SimpanBtnNOC">Simpan</button>
                      <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                    </div>
                  </center>
          </div>
            </div>
              </form>
                </div>
                {{-- 3 --}}

                <div id="perubahan_kod_projek_form" class="project_register_search_container mt-3 d-none">
                    <div class="">
                  <form>
                    <div class="project_register_search_header">
                      <!-- <img src="assets/images/Vector-12.png" alt=""/> -->
                      <div class="row m-1">
                        <div class="col-md-8 col-xs-12">
                            <h4>Perubahan Kod Projek</h4>
                        </div>
                         
                      <!-- <div class="userlist_content_header_right col-md-4 col-xs-12">
                      <button class="btn btn-success tambah-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add_plus.png">Tambah Dokumen Lampiran</button>
                    </div> -->
                      </div>
                    </div>
                    <hr>
                    <div class="userlist_tab_content_header">
                        <!-- <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
                          <button class="active">MAKMAL VA</button>
                          <button>MAKMAL MINI VA</button>
                        </div> -->
                        <div style="overflow-x:auto;">
                               <table class="table m-5" style="height: auto; width: 90%;">
                          <thead>
                            <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                              <th scope="col" class="text-center text-white NOCtblKodprojek col-6">Skop Asal</th>
                              <th scope="col" class="text-center text-white NOCtblKodprojek col-6">Skop Mohon</th>
                            </tr>
                          </thead>
                          <tbody style="font-size: 0.8rem">
                            <tr>
                              <td class="NOCtblKodprojek">
                                  <div class="d-flex">
                                      <p class="col-5">Kod Projek</p>
                                      <p class="">P33135005152810</p>
                                  </div>
                              </td>
                              <td class="NOCtblKodprojek">
                                  <div class="d-flex">
                                      <p class="col-5">Kod Projek</p>
                                      <input type="text" class="form-control text-center mr-1" name="" id="" value="p" disabled="">
                                      <input type="text" class="form-control text-center mr-1" name="" id="" value="3313200" disabled="">
                                      <input type="text" class="form-control text-center mr-1" name="" id="" value="599">
                                      <input type="text" class="form-control text-center mr-1" name="" id="" value="2202">
                                  </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="NOCtblKodprojek">
                                  <div class="d-flex">
                                      <p class="col-5">Maksud Pembangunan</p>
                                      <p class="">Kementerian Sumber Asli, Alam Sekitar dan Perubahan Iklim</p>
                                  </div>
                              </td>
                              <td class="NOCtblKodprojek">
                                <div class="d-flex">
                                    <p class="col-5">Maksud Pembangunan</p>
                                    <p class="">Kementerian Sumber Asli, Alam Sekitar dan Perubahan Iklim</p>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="NOCtblKodprojek">
                                  <div class="d-flex">
                                      <p class="col-5">Butiran</p>
                                      <p class="">2313500 - Pemulihan Empangan</p>
                                  </div>
                              </td>
                              <td class="NOCtblKodprojek">
                                <div class="d-flex">
                                    <p class="col-5">Butiran</p>
                                    <select name="" class="form-control" id="">
                                        <option value="">2300702 - Alat-alat Kelengkapan</option>
                                    </select>
                                </div>
                              </td>
                            </tr>
                           
                        
                            
                           
                          </tbody>
                        </table>
                        </div>
                        <center>
                          <div class="userlist_content_header_right col-md-12 text-center">
                            <button class="KembaliBtnNOC">Batal</button>
                            <button class="SimpanBtnNOC">Simpan</button>
                            <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                          </div>
                        </center>
                        <br>
                </div>
                   
                </form></div>
                  
                    </div>
                {{-- 4 --}}
                <div id="pertambahan_kos_form" class="project_register_search_container mt-3 d-none">
                    <div class="">
                  <form>
                    <div class="project_register_search_header">
                      <!-- <img src="assets/images/Vector-12.png" alt=""/> -->
                      <div class="row m-1">
                        <div class="col-md-8 col-xs-12">
                            <h4>Pertambahan Kos</h4>
                        </div>
                         
                      <!-- <div class="userlist_content_header_right col-md-4 col-xs-12">
                      <button class="btn btn-success tambah-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add_plus.png">Tambah Dokumen Lampiran</button>
                    </div> -->
                      </div>
                    </div>
                    <hr>
                    <div class="userlist_tab_content_header">
                      <div style="overflow-x:auto;">
                             <table class="table m-5" style="height: auto; width: 90%;">
                        <thead>
                          <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                            <th scope="col" class="text-center NOCtblKodprojek text-white">Kod Projek</th>
                            <th scope="col" class="text-center NOCtblKodprojek text-white">Kos Asal (RM)</th>
                            <th scope="col" class="text-center NOCtblKodprojek text-white">Kos Mohon (RM)</th>
                          </tr>
                        </thead>
                        <tbody style="font-size: 0.8rem">
                          <tr>
                            <td class="NOCtblKodprojek">P33150005993002</td>
                            <td class="NOCtblKodprojek">200,000</td>
                            <td class="NOCtblKodprojek">
                              <select name="" class="form-control" id="">
                                <option value="Pilih">
                                  Tiada Maklumat
                                </option>
                            </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                      <center>
                        <div class="userlist_content_header_right col-md-12 text-center">
                          <button class="KembaliBtnNOC">Batal</button>
                          <button class="SimpanBtnNOC">Simpan</button>
                          <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                        </div>
                      </center>
              </div>
                </div>
                  </form>
                    </div>
                {{-- 5 --}}
                <div id="maklumat_lokasi_form" class="project_register_search_container mt-3 d-none">
                    <div class="">
                  <form>
                    <div class="project_register_search_header">
                      <div class="row m-1">
                        <div class="col-md-8 col-xs-12">
                            <h4>MAKLUMAT LOKASI</h4><hr>
                        </div>
                        <div class="project_register_search_form_container  NOC_desc ml-5">
                          <div class="project_register_search_form_container">
                            <form>
                              <div class="card">
                                  <card class="card-header" style="color: #6D7180;">
                                      Asal
                                  </card>
                                  <div class="d-flex NOClblTbl">
                                  <div class="section4" style="border: #EEEEEE 1px solid; background-color: #FCFCFC;">
                                      <div class="m-5">
                                          <div class="mb-5">
                                              <label for="">Negeri</label>
                                          </div>
                                          <div style="font-size: 0.8rem;">
                                            <div id="negeridiv">
                                              
                                            </div>
                                          </div>
                                      </div> 
                                    </div>
                                     <div class="section5">
                                      <div class="m-5">
                                          <div class="mb-5">
                                              <label for="">Daerah</label>
                                          </div>
                                          <div style="font-size: 0.8rem;">
                                            <div id="daerahdiv">
                                              <li>Batu Pahat</li>
                                              <li>Johor Bahru</li>
                                              <li>Kluang</li>
                                              <li>Kota Tinggi</li>
                                              <li>Mersing</li>
                                              <li>Muar</li>
                                              <li>Pontian</li>
                                              <li>Segamat</li>
                                              <li>Kulaijaya</li>
                                              <li>Ledang</li>
                                              <li>Tangkak</li>
                                            </div>  
                                          </div>
                                      </div> 
                                    </div>
                                     <div class="section6">
                                      <div class="m-5">
                                          <div class="mb-5">
                                              <label for="">Parlimen</label>
                                          </div>
                                          <div style="font-size: 0.8rem;">
                                            <div id="parlimendiv">
                                              <li>Segamat</li>
                                              <li>Sekijang</li>
                                              <li>Labis</li>
                                              <li>Pagoh</li>
                                              <li>Ledang</li>
                                              <li>Bakri</li>
                                              <li>Muar</li>
                                              <li>Parit Sulong</li>
                                              <li>Ayer Hitam</li>
                                              <li>Sri Gading</li>
                                              <li>Batu Pahat</li>
                                              <li>Simpang Renggam</li>
                                              <li>Kluang</li>
                                              <li>Sembrong</li>
                                              <li>Mersing</li>
                                            </div>
                                          </div>
                                      </div> 
                                    </div>
                                     <div class="section7">
                                      <div class="m-5">
                                          <div class="mb-5">
                                              <label for="">Adun</label>
                                          </div>
                                          <div style="font-size: 0.8rem;">
                                            <div id="dundiv">
                                              <li>Buloh Kasap</li>
                                              <li>Jementah</li>
                                              <li>Pemanis</li>
                                              <li>Kemelah</li>
                                              <li>Tenang</li>
                                              <li>Bekok</li>
                                              <li>Gambir</li>
                                              <li>Tangkak</li>
                                              <li>Serom</li>
                                              <li>Bentayan</li>
                                              <li>Bukit Naning</li>
                                              <li>Maharani</li>
                                              <li>Sungai Balang</li>
                                              <li>Semerah</li>
                                              <li>Sri Medan</li>
                                              <li>Yong Peng</li>
                                            </div>
                                          </div>
                                      </div> 
                                    </div>
                                  </div>
                              </div>
                              <div class="card mt-5">
                                  <card class="card-header" style="color: #6D7180;">
                                      Mohon
                                  </card>
                                  <card class="card-header bg-white">
                                    <div class="userlist_content_header_right col-md-3 col-xs-12">
                                      <button class="addBtn TambahBtnNOC " onclick="showModal()" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                          <img src="{{ asset('assets/images/add_plus.png') }}" style="background-color: transparent;" alt="">
                                          Lokasi</button>
                                        </div>
                                  </card>
                                  <div class="d-flex NOClblTbl">
                                  <div class="section4" style="border: #EEEEEE 1px solid; background-color: #FCFCFC;">
                                      <div class="m-5">
                                        <div class="mb-5">
                                          <label for="">Negeri</label>
                                      </div>
                                      <div style="font-size: 0.8rem;">
                                        <div id="negeri_mohon_div">
                                          <p>Johor</p>
                                        </div>
                                      </div>
                                  </div> 
                                </div>
                                 <div class="section5">
                                  <div class="m-5">
                                      <div class="mb-5">
                                          <label for="">Daerah</label>
                                      </div>
                                      <div style="font-size: 0.8rem;">
                                        <div id="daerah_mohon_div">
                                          <li>Batu Pahat</li>
                                          <li>Johor Bahru</li>
                                          <li>Kluang</li>
                                          <li>Kota Tinggi</li>
                                          <li>Mersing</li>
                                          <li>Muar</li>
                                          <li>Pontian</li>
                                          <li>Segamat</li>
                                          <li>Kulaijaya</li>
                                          <li>Ledang</li>
                                          <li>Tangkak</li>
                                        </div>
                                      </div>
                                  </div> 
                                </div>
                                 <div class="section6">
                                  <div class="m-5">
                                      <div class="mb-5">
                                          <label for="">Parlimen</label>
                                      </div>
                                      <div style="font-size: 0.8rem;">
                                        <div id="parlimen_mohon_div">
                                          <li>Segamat</li>
                                          <li>Sekijang</li>
                                          <li>Labis</li>
                                          <li>Pagoh</li>
                                          <li>Ledang</li>
                                          <li>Bakri</li>
                                          <li>Muar</li>
                                          <li>Parit Sulong</li>
                                          <li>Ayer Hitam</li>
                                          <li>Sri Gading</li>
                                          <li>Batu Pahat</li>
                                          <li>Simpang Renggam</li>
                                          <li>Kluang</li>
                                          <li>Sembrong</li>
                                          <li>Mersing</li>
                                        </div>
                                      </div>
                                  </div> 
                                </div>
                                 <div class="section7">
                                  <div class="m-5">
                                      <div class="mb-5">
                                          <label for="">Adun</label>
                                      </div>
                                      <div style="font-size: 0.8rem;">
                                        <div id="dun_mohon_div">
                                          <li>Buloh Kasap</li>
                                          <li>Jementah</li>
                                          <li>Pemanis</li>
                                          <li>Kemelah</li>
                                          <li>Tenang</li>
                                          <li>Bekok</li>
                                          <li>Gambir</li>
                                          <li>Tangkak</li>
                                          <li>Serom</li>
                                          <li>Bentayan</li>
                                          <li>Bukit Naning</li>
                                          <li>Maharani</li>
                                          <li>Sungai Balang</li>
                                          <li>Semerah</li>
                                          <li>Sri Medan</li>
                                          <li>Yong Peng</li>
                                        </div>
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
                    <div class="NOCpopUPmodal">
                      <div class="modal fade boxShadowNOC" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header NOCmodalTitle">
                              <h5 class="modal-title" style="font-size: 0.9rem;" id="exampleModalLabel">Tambah Lokasi</h5>
                              <button type="button" style="font-size: 0.8rem; border: none; background-color: transparent; color: #fff;"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div id="negeribox">
                                <div class="d-flex flex-wrap  justify-content-lg-around negerirow">
                                  <form>
                                    <div class="col-md-3 col-xs-12 pemberat_title">
                                      <label for="">Negeri <sup>*</sup></label>
                                      <select class="form-control pemberat_title1" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(2);">
                                          
                                      </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12 pemberat_title">
                                      <label for="">Daerah <sup>*</sup></label>
                                      <select class="form-control pemberat_title1" name="" id="select_daerah">
                                          <option value="">PASIR MAS</option>
                                      </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12 pemberat_title">
                                      <label for="">Parlimen <sup>*</sup></label>
                                      <select class="form-control pemberat_title1" id="select_parlimen" name="select_parlimen" onchange="getdun(2);">
                                          <option value="">RANTAU PANJANG</option>
                                      </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12 pemberat_title">
                                      <label for="">Dun <sup>*</sup></label>
                                      <div class="d-flex">
                                        <select class="form-control pemberat_title1" name="" id="select_dun">
                                          <option value="">--Pilih--</option>
                                        </select>
                                      <div class="col-1">  
                                        <i class="ri-add-box-line" style="font-size: 1.5rem; color: #61676E;"></i>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- <div class="col-md-3 col-xs-12 pemberat_title">
                                  <label for="">Negeri <sup>*</sup></label>
                                  <select class="form-control pemberat_title1" name="" id="">
                                      <option value="">KELANTAN</option>
                                  </select>
                                </div>
                                <div class="col-md-3 col-xs-12 pemberat_title">
                                    <label for="">Daerah <sup>*</sup></label>
                                    <select class="form-control pemberat_title1" name="" id="">
                                        <option value="">PASIR MAS</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-xs-12 pemberat_title">
                                  <label for="">Parlimen <sup>*</sup></label>
                                  <select class="form-control pemberat_title1" name="" id="">
                                      <option value="">RANTAU PANJANG</option>
                                  </select>
                                </div>
                                <div class="col-md-3 col-xs-12 pemberat_title">
                                  <label for="">Dun <sup>*</sup></label>
                                  <div class="d-flex">
                                    <select class="form-control pemberat_title1" name="" id="">
                                        <option value="">--Pilih--</option>
                                    </select>
                                    <div class="col-1">  
                                      <i class="ri-add-box-line" style="font-size: 1.5rem; color: #61676E;"></i>
                                    </div>
                                  </div> -->
                                </div>
                              </div>
                            </div>
                          <button id="savenegeri" class="btn btn-primary" onclick="savenegeridetails()">Save Negeri</button>           
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                      
    
                    <div class="userlist_tab_content_header">
                      <center>
                        <div class="userlist_content_header_right col-md-12 text-center">
                          <button class="KembaliBtnNOC">Batal</button>
                          <button id="simpan_negeri" class="SimpanBtnNOC">Simpan</button>
                          <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                        </div>
                      </center>
              </div>
                </div>
                  </form>
                    </div>
                    {{-- 6 --}}
                    <div id="perubahan_objektif_form" class="project_register_search_container mt-3 d-none">
                        <div class="">
                      <form>
                        <div class="project_register_search_header">
                          <!-- <img src="assets/images/Vector-12.png" alt=""/> -->
                          <div class="row m-1">
                            <div class="col-md-8 col-xs-12">
                                <h4>Perubahan Objektif</h4>
                            </div>
                             
                          <!-- <div class="userlist_content_header_right col-md-4 col-xs-12">
                          <button class="btn btn-success tambah-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add_plus.png">Tambah Dokumen Lampiran</button>
                        </div> -->
                          </div>
                        </div>
                        <hr>
                        <div class=" m-5">
                            
                            
                                <div class="card">
                                   
                                        <div style="overflow-x:auto;">
                                               <table class="table table-borderless " style="height: auto; width: 100%;">
                                          <thead>
                                            <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                                              <th scope="col" colspan="6" class="text-left NOCtblKodprojek text-white ">Objektif Asal</th>
                                             
                                            </tr>
                                          </thead>
                                          <tbody style="font-size: 0.8rem">
                                              <tr>
                                                  <td class="NOCtblKodprojek">
                                                    Mengekalkan garisan pantai dari terus terhakis dengan mengadakan beberapa kaedah kawalan hakisan pantai seperti breakwater, lapis lindung, ban tanah, seawall, groyne, beach nourishment dan struktur lain yang bersesuaian di sepanjang pantai bermula dari kuala Sungai Jemaluang hingga ke Kem Tentera Iskandar dianggarkan sepanjang 6 km.
        Membina struktur penahan hakisan yang bertindak mengurangkan impak ombak seterusnya melindungi bangunan dan infrastrukur awam sedia ada di sepanjang Pantai Sekakap; dan
        Meningkatkan pertumbuhan sektor pelancongan dan ekonomi penduduk setempat dengan pertambahan bilangan pelancong dari 3,212 orang kepada 16,056 orang
                                                  </td>
                                                
                                              </tr>
                                          </tbody>
                                        </table>
                                        </div>
                                        <br>
                                       
                                </div>
                                <br>
                                
                             <br>
                                <div class="card">
                                   
                                    <div style="overflow-x:auto;">
                                           <table class="table table-borderless " style="height: auto; width: 100%;">
                                      <thead>
                                        <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                                          <th scope="col" colspan="8" class="text-left NOCtblKodprojek text-white ">Objektif Mohon</th>
                                         
                                        </tr>
                                      </thead>
                                      <tbody style="font-size: 0.8rem">
                                          <tr>
                                              <td class="NOCtblKodprojek">  Mengekalkan garisan pantai dari terus terhakis dengan mengadakan beberapa kaedah kawalan hakisan pantai seperti breakwater, lapis lindung, ban tanah, seawall, groyne, beach nourishment dan struktur lain yang bersesuaian di sepanjang pantai bermula dari kuala Sungai Jemaluang hingga ke Kem Tentera Iskandar dianggarkan sepanjang 6 km.
                                                Membina struktur penahan hakisan yang bertindak mengurangkan impak ombak seterusnya melindungi bangunan dan infrastrukur awam sedia ada di sepanjang Pantai Sekakap; dan</td> 
                                          </tr>
                                       
                                      </tbody>
                                    </table>
                                    </div>
                                    <br>
                                   
                            </div>
                            <br>
                                <div class="card">
                                   
                                    <div style="overflow-x:auto;">
                                           <table class="table table-borderless " style="height: auto; width: 100%;">
                                      <!-- <thead>
                                        <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                                          <th scope="col" colspan="8"  class="text-left NOCtblKodprojek ">Objektif Mohon</th>
                                         
                                        </tr>
                                      </thead> -->
                                      <tbody style="font-size: 0.8rem">
                                          <tr>
                                              <td class="NOCtblKodprojek">  Mengekalkan garisan pantai dari terus terhakis dengan mengadakan beberapa kaedah kawalan hakisan pantai seperti breakwater, lapis lindung, ban tanah, seawall, groyne, beach nourishment dan struktur lain yang bersesuaian di sepanjang pantai bermula dari kuala Sungai Jemaluang hingga ke Kem Tentera Iskandar dianggarkan sepanjang 6 km.
                                                </td> 
                                          </tr>
                                      </tbody>
                                    </table>
                                    </div>
                                    <br>
                                   
                            </div>
                                <br>
                                <center>
                                    <div class="userlist_content_header_right col-md-12 text-center">
                                      <button class="KembaliBtnNOC">Batal</button>
                                      <button class="SimpanBtnNOC">Simpan</button>
                                      <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                                    </div>
                                  </center>                        
                          
                            
                            
                          </div></form>
                       
                    </div>
                      
                        </div>
                    {{-- 7 --}}
                    <div id="wujud_butiran_baharu_form" class="project_register_search_container mt-3 d-none">
                        <div class="project_register_search_header  d-flex">
                          <h4>WUJUD SEMULA BUTIRAN/WUJUD SEMULA BUTIRAN</h4>
                        </div>
                        <hr>
                      <form>
                        
                     
                        <div class="row m-1 ">
                            <div class="col-md-12 col-xs-12 p-0 py-1 mb-3">
                              <div class="row ">
                                <div class="col-md-2 col-xs-5" ><label class="pemberat_title NOC_title"  for="RMK">Pilih Projek</label></div>                 
                                    <select name="" class="form-control col-md-10 col-xs-5" id="">
                                        <option value="--Pilih--">
                                          --Pilih--
                                        </option>
                                    </select>
                              </div>
                            </div>
                            <div class="col-md-12 col-xs-12 p-0 py-1">
                              <div class="row">
                                <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Kod Projek</label></div>                 
                                  <input disabled type="text" class="form-control col-md-1" name="" id="" value="P">
                                  <input disabled type="text" class="form-control col-md-1 ml-2" name="" id="" value="33">
                                  <input disabled type="text" class="form-control col-md-2 ml-2" name="" id="" value="13200">
                                  <input type="text" class="form-control col-md-1 ml-2" name="" id="" value="599">
                                  <input type="text" class="form-control col-md-1 ml-2" name="" id="" value="2202">
                                </div>
                                <div class="row mt-4">
                                  <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Kos Projek</label></div>
                                  <span class="input-group-text form-control col-xs-2 NOCmodalTitle" style="width:40px;" id="basic-addon1">RM</span>
                                  <input type="text" class="form-control col-md-2 col-xs-12" name="" id="">   
                                  <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Keperluan Peruntukan Tahunan Semasa</label></div>
                                  <span class="input-group-text form-control NOCmodalTitle" style="width:40px;" id="basic-addon1">RM</span>
                                  <input type="text" class="form-control col-md-2" name="" id="">   
                                </div>
                            </div>
                          </div>
                        <div class="row m-1 mb-3">
                            <div class="col-md-12 col-xs-12 p-0 py-1">
                              <div class="row ">
                                <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Justifikasi</label></div> 
                                <textarea name="" id="" cols="30" rows="3" class="form-control col-md-5"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row m-1">
                            <div class="col-md-11 col-xs-12 p-0 py-1 ml-3">
                              <div class="row ">
                                <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK"></label></div> 
                                <table class="table col-md-10" style="  border: 1px solid #d6d6d6;">
                                    <thead>
                                      <tr style="font-size: 0.8rem; background-color: #EEEEEE; color: #fff;">
                                        <th scope="col" colspan="" class="text-left " style="color: #6D7180;">Output Asal</th>
                                        <th scope="col" colspan="" class="text-left " style="color: #6D7180;">Nama Projek</th>
                                      </tr>
                                    </thead>
                                    <tbody style="font-size: 0.8rem">
                                      <tr>
                                        <td class="NOCtblKodprojek">
                                          <label for="">P333333333</label>
                                        </td>
                                        <td class="NOCtblKodprojek">
                                            <label for="">Projek hakisan Pantai</label>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
        
                          <center>
                            <div class="userlist_content_header_right col-md-12 text-center">
                              <button class="KembaliBtnNOC" >Batal</button>
                              <button class="SimpanBtnNOC" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Simpan</button>
                              <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                            </div>
                          </center>
                          
                      </form>
                      </div>
                      {{-- 8 --}}
                      <div id="perubahan_kpi_form" class="project_register_search_container mt-3 d-none">
                        <div class="">
                      <form>
                        <div class="project_register_search_header">
                          <!-- <img src="assets/images/Vector-12.png" alt=""/> -->
                          <div class="row m-1">
                            <div class="col-md-8 col-xs-12">
                                <h4>PERUBAHAN KPI</h4>
                            </div>
                          <!-- <div class="userlist_content_header_right col-md-4 col-xs-12">
                          <button class="btn btn-success tambah-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add_plus.png">Tambah Dokumen Lampiran</button>
                        </div> -->
                          </div>
                        </div>
                        <hr>
                        <form action="">
                        <div class="col-md-12 NOClblTbl ml-4">
                          <div class="row">
                          <div class="col-md-8 row">
                            <div class="col-md-4">
                              <label class="ml-3" for="">Kuantiti/Bilangan</label>
                            </div>
                            <div class="col-md-8">
                              <input class="NOC_label" size="60" type="text" value="">
                            </div>
                          </div>
                          <div class="col-md-4 row">
                            <div class="col-md-6">
                              <label for="">Unit</label>
                            </div>
                            <div class="col-md-6">
                              <select name="" class="form-control" id="">
                                <option value="--Pilih--">
                                  Unit
                                </option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 NOClblTbl mt-4 row">
                          <div class="col-md-2">
                          <label class="" for="">Penerangan</label>
                        </div>
                        <div class="col-md-6">
                          <textarea name="" id="" cols="105" rows="5" class="ml-5"></textarea>
                        </div>
                        </div>
                        </div>
                        
                        <div class="userlist_tab_content_header">
                          <!-- <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
                            <button class="active">MAKMAL VA</button>
                            <button>MAKMAL MINI VA</button>
                          </div> -->
                          <div style="overflow-x:auto;">
                                 <table class="table m-5" style="height: auto; width: 90%;">
                            <thead>
                              <tr style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                                <th scope="col" class="text-center NOCtblKodprojek">2022</th>
                                <th scope="col" class="text-center NOCtblKodprojek">2023</th>
                                <th scope="col" class="text-center NOCtblKodprojek">2024</th>
                                <th scope="col" class="text-center NOCtblKodprojek">2025</th>
                                <th scope="col" class="text-center NOCtblKodprojek">2026</th>
                                <th scope="col" class="text-center NOCtblKodprojek">2027</th>
                                <th scope="col" class="text-center NOCtblKodprojek">2028</th>
                              </tr>
                            </thead>
                            <tbody style="font-size: 0.8rem">
                              <tr>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                                <td class="NOCtblKodprojek">
                                  <input name="" class="form-control" id="">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                        </form>
                          <center>
                            <div class="userlist_content_header_right col-md-12 text-center">
                              <button class="KembaliBtnNOC">Batal</button>
                              <button class="SimpanBtnNOC">Simpan</button>
                              <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                            </div>
                          </center>
                  </div>
                    </div>
                      </form>
                        </div>
                        {{-- 9 --}}
                        <div id="perubahan_output_form" class="project_register_search_container mt-3 d-none">
                            <div class="">
                          <form>
                            <div class="project_register_search_header">
                              <!-- <img src="assets/images/Vector-12.png" alt=""/> -->
                              <div class="row m-1">
                                <div class="col-md-8 col-xs-12">
                                    <h4>PERUBAHAN OUTPUT</h4>
                                </div>
                              <!-- <div class="userlist_content_header_right col-md-4 col-xs-12">
                              <button class="btn btn-success tambah-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add_plus.png">Tambah Dokumen Lampiran</button>
                            </div> -->
                              </div>
                            </div>
                            <hr>
                            <div class="userlist_tab_content_header">
                              <!-- <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
                                <button class="active">MAKMAL VA</button>
                                <button>MAKMAL MINI VA</button>
                              </div> -->
                              <div style="overflow-x:auto;">
                                <form>
                                     <table class="table table-borderless border-1" style="height: auto; width: 90%; margin-left: 80px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                                <thead>
                                  <tr style="font-size: 0.8rem; background-color: #EEEEEE; color: #fff;">
                                    <th scope="col" colspan="9" class="text-left NOCtblKodprojek text-white" style="background-color: #39Afd1;">Output Asal</th>
                                  </tr>
                                </thead>
                                <tbody style="font-size: 0.8rem">
                                  <tr>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Output Projek</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
            
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input type="text" value="Pembinaan struktur kawalan hakisan pantai sepanjang 6km">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Kuantiti/Bilangan</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input type="text" value="25">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Unit</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <select name="" id="">
                                        <option value="">
                                          kilometer/km
                                        </option>
                                      </select>
                                    </td>
                                    <td class="NOCtblKodprojek">
            
                                    </td>
                                    <td class="NOCtblKodprojek">
            
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <table class="table table-borderless border-1" style="height: auto; width: 90%; margin-left: 80px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                                <thead>
                                  <tr style="font-size: 0.8rem; background-color: #EEEEEE; color: #fff;">
                                    <th scope="col" colspan="9" class="text-left NOCtblKodprojek text-white" style="background-color: #39Afd1;">Output Mohon</th>
                                  </tr>
                                </thead>
                                <tbody style="font-size: 0.8rem">
                                  <tr>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Output Projek <img
                                        src="{{ asset('assets/images/Add_box1.png') }}"
                                        alt=""
                                      /></label>
                                    </td>
                                    <td class="NOCtblKodprojek">
            
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input type="text" value="Pembinaan struktur kawalan hakisan pantai sepanjang 6km">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Kuantiti/Bilangan</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input type="text" value="25">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Unit</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <select name="" id="">
                                        <option value="">
                                          kilometer/km
                                        </option>
                                      </select>
                                      <button class="outcome_minus" style="border:none !important;background: transparent !important; float: right;">
                                        <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                                      </button>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                        
                                    </td>
                                    <td class="NOCtblKodprojek">
            
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              
                              </div>
                              <center>
                                <div class="userlist_content_header_right col-md-12 text-center">
                                  <button class="KembaliBtnNOC">Batal</button>
                                  <button class="SimpanBtnNOC">Simpan</button>
                                  <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                                </div>
                              </center>
                      </div>
                        </div>
                          </form>
                            </div>
                            {{-- 10 --}}

                            <div id="wujud_semula_form" class="project_register_search_container mt-3 d-none">
                                <div class="project_register_search_header  d-flex">
                                  <h4>WUJUD SEMULA BUTIRAN/WUJUD SEMULA BUTIRAN</h4>
                                </div>
                                <hr>
                              <form>
                                
                             
                                <div class="row m-1 ">
                                    <div class="col-md-12 col-xs-12 p-0 py-1 mb-3">
                                      <div class="row ">
                                        <div class="col-md-2 col-xs-5" ><label class="pemberat_title NOC_title"  for="RMK">Pilih Projek</label></div>                 
                                            <select name="" class="form-control col-md-10 col-xs-5" id="">
                                                <option value="--Pilih--">
                                                  --Pilih--
                                                </option>
                                            </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 p-0 py-1">
                                      <div class="row">
                                        <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Kod Projek</label></div>                 
                                          <input disabled type="text" class="form-control col-md-1" name="" id="" value="P">
                                          <input disabled type="text" class="form-control col-md-1 ml-2" name="" id="" value="33">
                                          <input disabled type="text" class="form-control col-md-2 ml-2" name="" id="" value="13200">
                                          <input type="text" class="form-control col-md-1 ml-2" name="" id="" value="599">
                                          <input type="text" class="form-control col-md-1 ml-2" name="" id="" value="2202">
                                        </div>
                                        <div class="row mt-4">
                                          <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Kos Projek</label></div>
                                          <span class="input-group-text form-control col-xs-2 NOCmodalTitle" style="width:40px;" id="basic-addon1">RM</span>
                                          <input type="text" class="form-control col-md-2 col-xs-12" name="" id="">   
                                          <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Keperluan Peruntukan Tahunan Semasa</label></div>
                                          <span class="input-group-text form-control NOCmodalTitle" style="width:40px;" id="basic-addon1">RM</span>
                                          <input type="text" class="form-control col-md-2" name="" id="">   
                                        </div>
                                    </div>
                                  </div>
                                <div class="row m-1 mb-3">
                                    <div class="col-md-12 col-xs-12 p-0 py-1">
                                      <div class="row ">
                                        <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK">Justifikasi</label></div> 
                                        <textarea name="" id="" cols="30" rows="3" class="form-control col-md-5"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row m-1">
                                    <div class="col-md-11 col-xs-12 p-0 py-1 ml-3">
                                      <div class="row ">
                                        <div class="col-md-2 col-xs-12" ><label class="pemberat_title NOC_title"  for="RMK"></label></div> 
                                        <table class="table col-md-10" style="  border: 1px solid #d6d6d6;">
                                            <thead>
                                              <tr style="font-size: 0.8rem; background-color: #EEEEEE; color: #fff;">
                                                <th scope="col" colspan="" class="text-left " style="color: #6D7180;">Output Asal</th>
                                                <th scope="col" colspan="" class="text-left " style="color: #6D7180;">Nama Projek</th>
                                              </tr>
                                            </thead>
                                            <tbody style="font-size: 0.8rem">
                                              <tr>
                                                <td class="NOCtblKodprojek">
                                                  <label for="">P333333333</label>
                                                </td>
                                                <td class="NOCtblKodprojek">
                                                    <label for="">Projek hakisan Pantai</label>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                      </div>
                                    </div>
                                  </div>
                
                                  <center>
                                    <div class="userlist_content_header_right col-md-12 text-center">
                                      <button class="KembaliBtnNOC" >Batal</button>
                                      <button class="SimpanBtnNOC" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Simpan</button>
                                      <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                                    </div>
                                  </center>
                              </form>
                              </div>

                              {{-- 11 --}}

                              <div id="outCome_projek_form" class="project_register_search_container mt-3 d-none">
                                <div class="RMK_project_header d-flex">
                                    <h4 class="py-4">Outcome Projek</h4>
                                  </div>
                                <hr>
                              <form>
                                  <div class="brief_project_content">
                                    <div class="brief_project_content_container px-0 pt-4">
                                      <div class="mx-0">
                                        <div class="d-flex col-2 p-0">
                                          <label for="" class="outcome_custom_width align-self-start" style="padding-top: 1rem!important;">Outcome Projek</label>
                                          {{-- <button type="button" id="outcomeBtn" class="outBtn"  style="border:none !important;background: transparent !important;">
                                            <i class="ri-add-box-line ri-2x"></i>
                                          </button>   --}}
                                        </div>
                                        <div id="mainoutcomecontainer">
                                          <div class="row output_outcome_data mb-2"  id="outcomediv">
                                            <div class="col-lg-5 col-xs-12 p-0">
                                              <div class="input_form_group col-12 my-1">
                                                <textarea disabled type="text" class="form-control" id="txtoutcomecomment" cols="3" rows="2"></textarea>
                                                {{-- <input type="text" class="form-control" id="txtoutputcomment" /> --}}
                                              </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-12 p-0">
                                              <div class="row m-0 align-items-center output_gap">
                                                <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                                                  >Kuantiti/Bilangan
                                                </label>
                                                <div
                                                  class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                                                >
                                                  <input
                                                    disabled
                                                    type="number"
                                                    class="form-control px-2"
                                                    value="" 
                                                    id="txtoutcomekuantiti"
                                                  />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-2 col-xs-8 p-0">
                                              <div class="row m-0 align-items-center output_gap">
                                                <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                                                  >Unit
                                                </label>
                                                <div
                                                  class="form-group input_form_group m-0 col-lg-10 col-xs-12">
                                                  <select disabled type="text" class="form-control px-2" id="outcomeunit">
                                                  <option value="">--Pilih--</option> 
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>                   
                                          
                                        </div>
                                    </div>


                                    <div class="mx-0">
                                        <div class="d-flex col-2 p-0">
                                          <label for="" class="outcome_custom_width align-self-start" style="padding-top: 1rem!important;">Outcome Projek</label>
                                          <button type="button" id="outcomeBtn" class="outBtn"  style="border:none !important;background: transparent !important;">
                                            <i class="ri-add-box-line ri-2x"></i>
                                          </button>  
                                        </div>
                                        <div id="mainoutcomecontainer">
                                          <div class="row output_outcome_data mb-2"  id="outcomediv">
                                            <div class="col-lg-5 col-xs-12 p-0">
                                              <div class="input_form_group col-12 my-1">
                                                <textarea type="text" class="form-control" id="txtoutcomecomment" cols="3" rows="2"></textarea>
                                                {{-- <input type="text" class="form-control" id="txtoutputcomment" /> --}}
                                              </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-12 p-0">
                                              <div class="row m-0 align-items-center output_gap">
                                                <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                                                  >Kuantiti/Bilangan
                                                </label>
                                                <div
                                                  class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                                                >
                                                  <input
                                                    type="number"
                                                    class="form-control px-2"
                                                    value="" 
                                                    id="txtoutcomekuantiti"

                                                  />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-2 col-xs-8 p-0">
                                              <div class="row m-0 align-items-center output_gap">
                                                <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                                                  >Unit
                                                </label>
                                                <div
                                                  class="form-group input_form_group m-0 col-lg-10 col-xs-12">
                                                  <select type="text" class="form-control px-2" id="outcomeunit">
                                                  <option value="">--Pilih--</option> 
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-1 col-xs-12 pt-2">
                                              <button class="outcome_minus" style="border:none !important;background: transparent !important; float: right;"> 
                                                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                                              </button>
                                            </div>
                                          </div>                   
                                          
                                        </div>
                                    </div>
                                  </div>
                                  </div>               
                                  <!-- <center>
                                    <div class="userlist_content_header_right col-md-12 text-center">
                                      <button class="KembaliBtnNOC" >Batal</button>
                                      <button class="SimpanBtnNOC" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Simpan</button>
                                      <button class="TambahBtnNOC">Hantar untuk Pengesahan</button>
                                    </div>
                                  </center> -->
                                  <div id="ActionDiv"  class="project_register_search_container d-none">
                                    <center>
                                        <div class="userlist_content_header_right col-md-12 text-center">
                                          <button type="button" class="KembaliBtnNOC" id="batal_btn">Batal</button>
                                          <button type="button" onclick="FormSubmit()" class="SimpanBtnNOC">Simpan</button>
                                          <button type="button" class="TambahBtnNOC" id="hanter_btn">Hantar untuk Pengesahan</button>
                                        </div>
                                      </center>
                                  </div>
                                  <div id="BKORDIV"  class="project_register_search_container d-none">
                                    <center>
                                        <div class="userlist_content_header_right col-md-12 text-center">
                                          <button type="button" class="KembaliBtnNOC" id="bkor_batal_btn">Batal</button>
                                          <button type="button" class="TambahBtnNOC" id="bkor_hanter_btn">Hantar</button>
                                        </div>
                                      </center>
                                  </div>
                              </form>
                              </div>
              
              
              
                <div class="card project_register_search_container mt-4">
                  <div class="project_register_search_header">
                      <div class="col-md-8">
                          <h4>MAKLUMAT PERAKUAN</h4>
                      </div>
                  </div>
                  <hr>
                  <div class="userlist_tab_content_header">
                <div class="table_holder m-4">
                  <table class="table  table-borderless table_preview application_list" style="border:none ">
                    <thead>
                      <tr class="NOC_footer" style="background-color: #EEEEEE;">
                        <th class="col-3">Nama</th>
                        <th class="col-3">Nama</th>
                        <th class="col-3">Organisasi</th>
                        <th class="col-3">Tarikh Ulasan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="NOC_desc">Disediakan Oleh</td>
                        <td class="NOC_desc">Amalia Bin Tarmizi</td>
                        <td class="NOC_desc">Seksyen Ekonomi Alam Sekitar (UPE)</td>
                        <td class="NOC_desc">01/11/2022 07:17:03 PM</td>
                      </tr>
                      <tr>
                        <td class="NOC_desc">Disediakan Oleh</td>
                        <td class="NOC_desc"></td>
                        <td class="NOC_desc"></td>
                        <td class="NOC_desc"></td>
                      </tr>
                      <tr>
                        <td class="NOC_desc">Diperaku Oleh</td>
                        <td class="NOC_desc"></td>
                        <td class="NOC_desc"></td>
                        <td class="NOC_desc"></td>
                      </tr>
                      <tr class="empty">
                        <td>
                          &nbsp;  <br />
                        </td>
                        <td>
                          &nbsp;  <br />
                        </td>
                        <td>
                          &nbsp;  <br />
                        </td>
                        <td>
                          &nbsp;  <br />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              <div class="m-5">
                  <label for="" class="NOC_desc">Catatan Tambahan Kementerian</label>
                  <textarea disabled name="" id="" cols="30" rows="5" class="form-control" style="font-size: 0.8rem;"></textarea>
              </div>
            </div>
              </div>
              </div>
              </div>
</body>


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
                                <button data-dismiss="modal" class="tutup p-2" id="tutup-global" style="width:80px; background-color: #0ACf97;">Ya</button>
                                <button data-dismiss="modal" class="tutup p-2" id="close-global" style="width:80px; background-color: #fa5c7c;">Tidak</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
          </div>
      </div>
</section>
@endsection
@include('noc.notis_perubahan.perubahan_negeri_script')