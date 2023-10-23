@include('project.ringkasan.style')
@extends('layouts.main.master_responsive')
    
    @section('content_main')
    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner> 
   <!-- Mainbody_conatiner Starts -->
   <div class="Mainbody_conatiner ml-auto">

    <div class="Mainbody_content mtop nageri_container">
      <div class="Mainbody_content_nav_header project_register align-items-center row">
        <div class="col-lg-5 col-xs-12">
          <h4 class="ml-2">Daftar Permohonan Projek</h4>
        </div>
        <div class="col-lg-6 col-xs-12 path_nav_col">
          <ul class="path_nav row">
            <li>
              <a href="#" class="text-info" style="display: flex; align-items: center;">
                <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-briefcase-variant"></span>
                Permohonan Projek
                <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
              </a>
            </li>
            <li>
              <a href="#" class="active text-secondary"> Daftar Projek </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="mr-5" style="float:right;" >
        <x-form.print></x-form.print>
      </div>
      
      <div class="project_register_tab_container nageri_gap row">
        <div class="project_register_tab_btn_container col-2">
            @include('project.side-sections', ['active' => 'ringkasan'])
          </div>
        <div class="project_register_tab_content_container nageri_right_content col-10">
          {{-- Start RMK Flow Chart in Horizontal --}}
          <div class="rmk_flow_Chart flow-horizontal">
            <div class="rmk_flow_Chart_container d-none" id="indicator-daerah">
                @include('project.daerah_indicator')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view">
                @include('project.negeri_view_indicator')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view">
                @include('project.bahagian_view_indicator')
            </div>
          </div> 
          {{-- End RMK Flow Chart in Horizontal --}}

          {{-- Start RMK Flow Chart in Vertical --}}
          <div class="rmk_flow_Chart flow-vertical">
            <div class="rmk_flow_Chart_container d-none" id="indicator-daerah-vertical">
                @include('project.daerah_indicator_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view-vertical">
                @include('project.negeri_view_indicator_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view-vertical">
                @include('project.bahagian_view_indicator_vertical')
            </div>
          </div>
          {{-- End RMK Flow Chart in Vertical --}} 
          @include('masterPortal.result_modal')
          <!-- <div class="project_register_table_header dropdown dropleft m-0 ">
            <button
              class="ml-auto d-flex flex-column justify-content-center blue"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
            <span class="iconify icon_white mdi_icon" data-icon="mdi-tray-arrow-down"></span>
            </button>

            {{-- 2023 March 23 by Nabilah (Button are not functioning yet) --}}
            <div
              class="dropdown-menu dropdown_menu"
              aria-labelledby="dropdownMenuButton"
            >
              <button
                class="dropdown-item d-flex justify-content-between align-items-center mb-1"  onClick="downloadPpt()"
                ><p class="m-0">
                  <img src="{{ asset('assets/images/ppt.png') }}" alt="" class="excel" /> PPT
                </p>
                <img src="{{ asset('assets/images/printer_black.png') }}" alt=""
              /></button>
              <button
                class="dropdown-item d-flex justify-content-between align-items-center mb-1"  onClick="downloadExcel()"
                ><p class="m-0">
                  <img src="{{ asset('assets/images/excel_green.png') }}" alt="" class="excel" /> Excel
                </p>
                <img src="{{ asset('assets/images/printer_black.png') }}" alt=""
              /></button>
              <button
                class="dropdown-item d-flex justify-content-between align-items-center" onClick="downloadPdf()"
                ><p class="m-0">
                  <img src="{{ asset('assets/images/pdf_Red.png') }}" class="pdf" alt="" />
                  Pdf
                </p>
                <img src="{{ asset('assets/images/printer_black.png') }}" alt=""
              /></button>
            </div>
          </div> -->
          <div class="select_box_header mb-2">Ringkasan Permohonan</div>
          <form>
            <div class="nageri_form_content">
              <div class="nageri_select_box border-0">
                <div class="ringkasan_container p-4">
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Nama Projek </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                        <p id="nama_projeck" style="font-weight: normal!important;"></p>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Objektif </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100" id="objektif">
                        <!-- <ol>
                          <li>
                            Mengekalkan garisan pantai dari terus terhakis
                            dengan mengadakan beberapa kaedah kawalan hakisan
                            pantai seperti breakwater, lapis lindung, ban
                            tanah, seawall, groyne, beach nourishment dan
                            struktur lain yang bersesuaian di sepanjang pantai
                            bermula dari kuala Sungai Jemaluang hingga ke Kem
                            Tentera Iskandar dianggarkan sepanjang 6 km.
                          </li>
                          <li>
                            Membina struktur penahan hakisan yang bertindak
                            mengurangkan impak ombak seterusnya melindungi
                            bangunan dan infrastrukur awam sedia ada di
                            sepanjang Pantai Sekakap; dan
                          </li>
                          <li>
                            Meningkatkan pertumbuhan sektor pelancongan dan
                            ekonomi penduduk setempat dengan pertambahan
                            bilangan pelancong dari 3,212 orang kepada 16,056
                            orang
                          </li>
                        </ol> -->
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Ringkasan Latar Belakang </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100">
                        <p id="ringkasan-data" style="font-weight: normal!important;">
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Rasional/Justifikasi </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100" id="rasional">
                        <!-- <ol>
                          <li>
                            Melalui kajian NCES 2015 menunjukkan Pantai
                            Sekakap Mersing berada di Kategori 2 (Significant)
                            dengan kadar purata hakisan 12m/tahun. Keadaan
                            hakisan semasa telah menghampiri struktur bangunan
                            yang boleh mendatangkan kemudaratan kepada
                            pengguna;
                          </li>
                          <li>
                            Pembinaan struktur penahan hakisan pantai dapat
                            mengekalkan garisan pesisiran pantai dan mencegah
                            hakisan pantai apabila tiba musim tengkujuh dan
                            tiupan angin kencang;
                          </li>
                          <li>
                            Permohonan ini daripada DYMM Sultan Ibrahim Ibni
                            Almarhum Sultan Iskandar yang dizahirkan melalui
                            tandatangan DYMM Tuanku di atas surat Pejabat
                            Daerah Mersing bertarikh 11 Oktober 2020
                          </li>
                        </ol> -->
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Faedah </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100" id="faedah">
                        <!-- <ol>
                          <li>
                            Menyelamat infra awam daripada kesan hakisan
                            pantai termasuk Kem PLKN/OBS, Istana Flintstone
                            dan Kem ATM Iskandar.
                          </li>
                          <li>
                            Memelihara garisan pantai dan lebar rizab pantai
                            selari dengan zon keselamatan yang digazetkan
                            dalam Blok Perancangan Kecil dalam Rancangan
                            Tempatan Daerah Mersing 2030 Penggantian.
                          </li>
                          <li>
                            Meningkatkan bilangan pelancong yang mengunjungi
                            Mersing kerana melawat Istana Flintstone, Pantai
                            Sekakap dan sekitarnya yang merupakan sebahagian
                            daripada jajaran pantai dalam tapak-tapak warisan
                            Geopark Mersing.
                          </li>
                        </ol> -->
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="implikasi">
                        Implikasi Projek Tidak Lulus
                      </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100">
                        <p id="implikasi" style="font-weight: normal!important;">
                          Berlaku kerosakan pada harta awam termasuk Kem PLKN
                          Pusat Bina Semangat YPJ anggaran bernilai RM35juta
                          dan Istana Flintstone dan Kem ATM Iskandar.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="implikasi">
                        Jenis Kategori
                      </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100">
                        <p id="jenis_kategori" style="font-weight: normal!important;">Fizikal-Pembinaan</p>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah">Outcome Projek </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100 table_scroll">
                        <table class="projek_cmn_table mb-4">
                          <thead>
                            <tr>
                              <th>Bil</th>
                              <th>Butiran Output</th>
                            </tr>
                          </thead>
                          <tbody id="outcome_tbody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah">Output Projek </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100 table_scroll">
                        <table class="projek_cmn_table mb-4" id="output_table">
                          <thead>
                            <tr>
                              <th>Bil</th>
                              <th>Butiran Outcome</th>
                            </tr>
                          </thead>
                          <tbody id="output_tbody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah">KPI Projek </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100 table_scroll">
                        <table class="projek_cmn_table mb-4" id="table">
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
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah">Lokasi </label>
                    </div>
                    <!-- <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100 table_scroll">
                        <table class="projek_cmn_table projek_cmn_table_center mb-4">
                          <thead>
                            <tr>
                              <th>Negeri</th>
                              <th>Daerah</th>
                              <th>Parlimen</th>
                              <th>DUN</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="negeri_ring"></td>
                              <td id="daerah_ring"></td>
                              <td id="parlimen_ring"></td>
                              <td id="dun_ring"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div> -->
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100 table_scroll">
                        <table id="table_ring" class="projek_cmn_table projek_cmn_table_center mb-4">
                          <thead>
                            <tr>
                              <th>Negeri</th>
                              <th>Daerah</th>
                              <th>Parlimen</th>
                              <th>Dun</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah"> </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100">
                        <div class="row">
                          <div class="img_div_1 col-lg-4 col-xs-12" id="img_1_div">
                            <div class="lokasi_card">
                              <div class="mb-2">
                                <img class="img_1" id="img_negeri_1" src="" alt="Satellite view Map"/>
                              </div>
                              <p id="desc_negeri_1"></p>
                            </div>
                          </div>
                          <div class=" img_div_2 col-lg-4 col-xs-12" id="img_2_div">
                            <div class="lokasi_card">
                              <div class="mb-2">
                                <img class="img_2" id="img_negeri_2" src="" alt="A women is riding on the Horse"/>
                              </div>
                              <p id="desc_negeri_2"></p>
                            </div>
                          </div>
                          <div class="img_div_3 col-lg-4 col-xs-12" id="img_3_div">
                            <div class="lokasi_card">
                              <div class="mb-2">
                                <img class="img_3" id="img_negeri_3" src="" alt="Houses Located near the Beach"/>
                              </div>
                              <p id="desc_negeri_3"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah"> </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100 table_scroll">
                        <table id="table_ring" class="projek_cmn_table projek_cmn_table_center mb-4">
                          <thead>
                            <tr>
                              <th>Negeri</th>
                              <th>Daerah</th>
                              <th>Parlimen</th>
                              <th>DUN</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div> -->
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="faedah"> </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                      <div class="w-100">
                        {{-- <table width="100%" class="mb-3">
                          <thead>
                            <tr>
                              <th>Maklumat Kos dan Siling</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                            </tr>
                            
                            <tr>
                              <td>Komponen DE</td>
                              
                              <td>
                                <!-- <select name="" class="form-control" id="cmbkomponen">
                                    <option value="">--Pilih--</option>
    
                                    
                                  </select> -->
                                  <input
                                    type="text"
                                    class="form-control input-element"
                                    value="0"
                                    id="cmbkomponen"
                                    readonly
                                  />
                                </td> 
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                            </tr>
                            <tr>
                              <td>KOS Projek (RM)</td>
                              <td><input
                                    type="text"
                                    class="form-control input-element"
                                    value="0"
                                    id="totalkoscomponen"
                                    readonly
                                  /></td>
                              <td>Siling Dimohon 2023 (RM)</td>
                              
                              <td><input
                                    type="text"
                                    class="form-control input-element"
                                    value="0"
                                    id="txtsilingdimohon"
                                    readonly

                                  /></td>
                              <td>Siling Bayangan 2023 (RM)</td>
                              <td><input type="text" class="form-control input-element text-right" id="txtsilingbayangan" value="0" /></td>
                              
                            </tr>
                          </tbody>
                        </table> --}}
                        <div class="row mt-4 mb-2">
                          <label  for="">Maklumat Kos dan Siling</label>
                        </div>
                        <div class="table_scroll">
                          <table class="table table-borderless col-12 mb-5">
                            <tbody>
                              <tr>
                                <th scope="row" style="font-size: 0.8rem;">Komponen DE</th>
                                <td id="cmbkomponen"></td>
                              </tr>
                              <tr>
                                <th class="col-3" scope="row" style="font-size: 0.8rem;">Kos Projek (RM)</th>
                                <td id="totalkoscomponen"></td>
                                
                                <th class="col-3" scope="col" style="font-size: 0.8rem;">Siling Dimohon 2023 (RM)</th>
                                <td id="txtsilingdimohon"></td>
    
                                <th class="col-3" scope="col" style="font-size: 0.8rem;">Siling Bayangan 2023 (RM)</th>
                                <td id="txtsilingbayangan"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="row">
                          <label class="mb-3" for="">Maklumat Kewangan</label>
                        </div>  
                        <div class="components_table_container">
                          <input type="hidden" id="api_url" value={{env('API_URL')}}>
                          <input type="hidden" value="{{$id}}" id="project_id"/>

                          <!-- First table of kewangan -->
                          <div class="components_table_container">
                            <div class="table_scroll">
                              <table class="components_table table text-nowrap" id="maincomponenttable">
                                <thead>
                                
                                  <tr class="text-nowrap">
                                    <th rowspan="2" class="col-1 text-center">Bil.</th>  
                                    <th rowspan="2" class="col-2 text-center">Skop & Komponen</th>
                                    <th rowspan="2" class="col-2 text-center">Kos Penggenapan (RM) </th>  
                                    <th colspan="3" class="text-center borders col-4">Perincian</th>
                                    <th rowspan="2" class="text-center">Kos (RM)</th>
                                    <th rowspan="2" class="text-center">Catatan</th>
                                    

                                  </tr>
      
                                  <tr>
                                    <th class="text-center">Kuantiti</th>
                                    <th class="text-center">Unit (m/%/etc)</th>
                                    <th class="text-center">Kos/unit (RM)</th>
                                    
                                  </tr>
                                </thead>
                                <tbody id="componentbody" class="text-nowrap">
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <!-- ***************************Skala Piawai********************* -->
                            <!-- ---------------------------New Section starts-------------------- -->

                          <!-- ------------New from Vijay -->
                          <div class=" table table_scroll">
                            
                            <table class="table table-borderless newfinancesectiontable" id="financesectiontable" style="display: none;">
                              <thead>
                                <tr>
                                  <th colspan="8" style="background-color: #39b0d2; color: #fff;" >
                                    PENGIRAAN YURAN PERUNDING SECARA SKALA YURAN PIAWAI
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td colspan="1"><b>ANGGARAN MAIN WORKS (RM)​</b></td>
                                  <td colspan="2">
                                    <input
                                      type="text"
                                      value=""
                                      class="form-control bg-light input-element"
                                      id="ftotalcost"
                                      readonly
                                    />
                                  </td>
                                  <td><u><a class="rujukan_link" href="#"> Rujukan <i>Scale of Fees</i></u></a></td>
                                
                                  
                                  </tr>
                                  <tr>
                                    <td colspan="4"><b>CALCULATION OF PERCENTAGE​</b></td>
                                  
                                    
                                  </tr>
                                  
                                  <tr>
                                    <td colspan="4"></td>
                                    
                                    
                                  </tr>
                                  <form>
                                    <tr class="pengiraan_table">
                                              <td>Sila Pilih Peratusan Yuran Perunding​</td>
                                            <td> <label for="Pmax" style="color: #fff;">Pmax (%)</label>
                                              <input class="d-flex" type="radio" id="pmax" name="Pminmax" value=""  onclick="getfinalcostpiawai()" disabled>
                                            <input type="text" id="lblpmax" size="10%" readonly></td>
                                            <td> <label for="Pmin" style="color: #fff;">Pmin (%)</label>
                                              <input class="d-flex" type="radio" id="pmin" name="Pminmax" value="" onclick="getfinalcostpiawai()" disabled>
                                            <input type="text" id="lblpmin" size="10%" readonly></td>
                                              <td> <label for="Pavg" style="color: #fff;">Pavg (%)</label>
                                              <input class="d-flex" checked type="radio" id="pavg" name="Pminmax" value="" onclick="getfinalcostpiawai()" disabled>
                                            <input type="text" id="lblpavg" size="10%" readonly></td>
                                              
                                              
                                    </tr>
                                  </form>
                                  <tr>
                                    <td colspan="1"><b>CALCULATION OF DESIGN FEES (A)</b></td>

                                    <td colspan="1">
                                      <input
                                        type="text"
                                        value="0"
                                        class="form-control bg-light input-element"
                                        id="ftotalcostpercent"
                                        readonly

                                      />
                                    </td>
                                    <td></td>
                                    
                                    
                                  </tr>
                                  <tr>
                                    <td colspan="1">IMBUHAN BALIK (B)</td>
                                    <td>
                                      <input
                                        type="text"
                                        value="0"
                                        class="form-control input-element"
                                        id="imbuhanbalikcopy"
                                        onchange="getfinalcostpiawai()"
                                        
                                        
                                      />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>

                                  <tr>
                                    <td colspan="1" class="">KOS PERUNDING (C = A + B)</td>
                                    <td>
                                      <input
                                        type="text"
                                        value="0"
                                        class="form-control input-element readonly"
                                        id="totalkosperunding"
                                        onchange="getfinalcostpiawai()"
                                        readonly
                                        
                                        
                                      />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                                  <tr>
                                    <td colspan="1">CUKAI JUALAN DAN PERKHIDMATAN (SST) (D = 6% * C)</td>
                                    <td>
                                      <input
                                        type="text"
                                        value="0"
                                        class="form-control input-element"
                                        id="componentfinaltaxcopy"
                                        readonly
                                        
                                      />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                                  <tr>
                                    <td colspan="1">JUMLAH KESELURUHAN ANGGARAN KOS PERUNDING (RM) (C + D)</td>
                                    <td>
                                      <input
                                        type="text"
                                        value="0"
                                        class="form-control input-element"
                                        id="componentanggarankos"
                                        readonly
                                        
                                      />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- --------End of Piawai------------------- -->

                          <!-- Table yuran perunding kajian -->
                          <div id="yuranperundingtablediv" style="display: none; width: 100%;">
                            <div class="components_table_container">
                              <h3 class="table_heading">Pelantikan Perunding Kajian</h3>
                              <div class="table_scroll">
                                <table class="components_table table" id="yuranperundingtable" cellspacing="2" width="100%">
                                  <thead>
                                    <tr>
                                      <th rowspan="2" class="text-center">
                                        PENGIRAAN YURAN PERUNDING SECARA INPUT MASA
                                      </th>
                                      <th rowspan="2" class="text-center">Jumlah Kos (RM)</th>
        
                                      <th colspan="4" class="text-center borders col-5">
                                        Perincian
                                      </th>
                                      <th rowspan="2" class="text-center">Catatan</th>
                                    </tr>
                                    

                                    
        
                                    <tr>
                                      <th class="text-center">Man-month</th>
                                      <th class="text-center">Multiplier</th>
                                      <th class="text-center">Salary (RM)</th>
                                      <th class="text-center">Amaun</th>
                                      
                                      
                                    </tr>
                                  </thead>
                                  <tbody id="perundingbody">
                                    <tr>
                                      <td>YURAN PERUNDING</td>
                                      <td>
                                        <input
                                          type="text"
                                          value="0"
                                          class="form-control bg-light text-right"
                                          id="yuranperunding_jumlahkos"
                                        />
                                      </td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      
                                    </tr>
                                    
                                    
                                    <tr>
                                      <td>
                                        Imbuhan Balik
                                          
                                          <!-- <input type="text" class="form-control col" />
                                          <button type="button" class="ml-auto sub-tr-btn-second">
                                            <img src="{{ asset('assets/images/minus.png') }}" alt="" />
                                          </button> -->
                                        
                                      </td>
        
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          
                                          class="form-control bg-light text-right"
                                          
                                          
                                        />
                                      </td>
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control bg-light text-right"
                                        />
                                      </td>
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control bg-light text-right"
                                        />
                                      </td>
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control bg-light text-right"
                                        />
                                      </td>
                                      
                                      <td>
                                        <input
                                          type="text"
                                          class="form-control bg-light text-right"
                                        />
                                      </td>
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control bg-light text-right"
                                        />
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-right text-uppercase">Jumlah</td>
        
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control text-right"
                                        />
                                      </td>
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control"
                                        />
                                      </td>
                                      <td>
                                        <input type="text" class="form-control" />
                                      </td>
                                      <td>
                                        <input
                                          type="text"
                                          value=""
                                          class="form-control"
                                        />
                                      </td>
                                      <td>
                                        <input type="text" class="form-control" />
                                      </td>
                                      <td></td>
                                      
                                    </tr>
                                    
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <!-- table yuran perunding kajian ends -->

                          <!-- Table yuran perunding tapak -->
                          <div id="yuranperunding_tapaktablediv"  style="display: none; width: 100%;">
                            <div class="components_table_container">
                              <h3 class="table_heading">Pelantikan Perunding Penyeliaan Tapak</h3>
                              <table class="components_table table table_scroll" id="yuranperunding_tapak_table" cellspacing="2" width="100%">
                                <thead>
                                  <tr>
                                    <th rowspan="2" class="text-center">
                                      PENGIRAAN YURAN PERUNDING SECARA INPUT MASA
                                    </th>
                                    <th rowspan="2" class="text-center">Jumlah Kos (RM)</th>
      
                                    <th colspan="4" class="text-center borders col-5">
                                      Perincian
                                    </th>
                                    <th rowspan="2" class="text-center">Catatan</th>
                                  </tr>
                                  

                                  
      
                                  <tr>
                                    <th class="text-center">Man-month</th>
                                    <th class="text-center">Multiplier</th>
                                    <th class="text-center">Salary (RM)</th>
                                    <th class="text-center">Amaun</th>
                                    
                                    
                                  </tr>
                                </thead>
                                <tbody id="perundingbody_tapak">
                                  <tr>
                                    <td>YURAN PERUNDING</td>
                                    <td>
                                      <input
                                        type="text"
                                        value="0"
                                        class="form-control bg-light text-right"
                                        id="yuranperunding_tapak_jumlahkos"
                                      />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                                  
                                  
                                  <tr>
                                    <td>
                                      Imbuhan Balik
                                        
                                        <!-- <input type="text" class="form-control col" />
                                        <button type="button" class="ml-auto sub-tr-btn-second">
                                          <img src="{{ asset('assets/images/minus.png') }}" alt="" />
                                        </button> -->
                                      
                                    </td>
      
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        
                                        class="form-control bg-light text-right"
                                        
                                        
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control bg-light text-right"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control bg-light text-right"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control bg-light text-right"
                                      />
                                    </td>
                                    
                                    <td>
                                      <input
                                        type="text"
                                        class="form-control bg-light text-right"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control bg-light text-right"
                                      />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-right text-uppercase">Jumlah</td>
      
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control text-right"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control"
                                      />
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control"
                                      />
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" />
                                    </td>
                                    <td></td>
                                    
                                  </tr>
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- Table yuran perunding tapak ends -->

                        
                          <!-- End of first table------ -->
                          <!-- <table class="components_table table komponen_three_table komponen_three_table_sec komponen_tab_rem">
                            <thead>
                              <tr>
                                <th rowspan="2" class="col-3 text-center">Skop & Komponen</th>
                                <th rowspan="2" class="col-2 text-center">Jumlah Kos (RM)</th>
  
                                <th colspan="4" class="text-center borders col-6">
                                  Perincian
                                </th>
                              </tr>
  
                              <tr>
                                <th class="text-center">Kuantiti</th>
                                <th class="text-center">Unit (m/%/etc)</th>
                                <th class="text-center">Kos/unit (RM)</th>
                                <th class="text-center">Catatan</th>
                              </tr>
                            </thead>
                            <tbody id="componentbody">
                              
                            </tbody>
                          </table> -->
                        </div>


                        <!-- <table class="komponen_three_table komponen_three_table_sec komponen_tab_rem">
                          <thead>
                            <tr>
                              <th rowspan="2">Skop & Komponen</th>
                              <th rowspan="2">Jumlah Kos (RM)</th>
                              <th rowspan="1" colspan="4">Perincian</th>
                            </tr>
                            <tr>
                              <th>Kuantiti</th>
                              <th>Unit (m/%/etc)</th>
                              <th>Kos/unit (RM)</th>
                              <th>Catatan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1. Kerja Ukur</td>
                              <td>500,000.00</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>2. Penyiasatan Tapak (S.I)</td>
                              <td>350,000.00</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. Pelantikan perunding</td>
                              <td>1,000,000.00</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. 1 Rekabentuk</td>
                              <td  style="visibility: hidden;" style="visibility: hidden;"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>
                                3. 2 Kajian Environment Impact Assessment
                              </td>
                              <td style="visibility: hidden;" style="visibility: hidden;"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. 3 Kajian Marine Risk Assessment</td>
                              <td style="visibility: hidden;" style="visibility: hidden;"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>JUMLAH</td>
                              <td>1,850,000.00</td>
                              <td style="visibility: hidden;"></td>
                              <td style="visibility: hidden;"></td>
                              <td style="visibility: hidden;"></td>
                              <td style="visibility: hidden;"></td>
                            </tr>
                          </tbody>
                        </table> -->
                      </div>
                      <!-- changes swaraj -->
                      <div class="input_fill_content">
                        <div class="mt-3 w-100 table_scroll">
                              <table class="projek_table" id="projek_table_kewagan">
                                <thead>
                                  <tr>
                                    <th class="col-2">Skop Projek</th>
                                    <th>Kos (RM)</th>
                                  </tr>
                                </thead>
                                <form action="" name="myform">
                                  <tbody id="skop-first">
                                  </tbody>
                                </form>
                              </table>
                        </div>
                      </div>
                      <!-- end first -->

                      <div class="input_fill_content">
                        {{-- <label for="Faedah "></label> --}}
                        <div class="mt-3 w-100 table_scroll">
                          <table class="komponen_three_table komponen_three_table_sec" id="komponen_three_table_kewagan">
                                    <thead>
                                      <tr>
                                        <th class="col-3">Skop & Komponen</th>
                                        <th class="col-2">Jumlah Kos (RM)</th>
                                      </tr>
                                    </thead>
                                    <form action="" name="myform2">
                                      <tbody id="skop-second">
                                      </tbody>
                                    </form>
                          </table>
                        </div>
                      </div>

                      <!-- fourth table -->
                      <div class="input_fill_content">
                        {{-- <label for="Faedah "></label> --}}
                        <div class="mt-3 w-100">
                          <p>Maklumat Peruntukan (Belanja Mengurus)
                          </p>
                          <div class="table_scroll">
                            <table class="perkara_table" id="perkara_table_kewagan" style="border-color:#D6D6D6">
                                <thead>
                                  <tr id="perkra">
                                    <th class="col-3">Perkara</th>
                                  </tr>
                                </thead>
                                <form action="" name="myform">
                                  <tbody id="skop-third"  style="font-size: 0.8rem;">
                                  
                                  </tbody>
                                </form>
                                <tfoot>
                                
                                </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- fifth table -->
                      <div class="input_fill_content">
                        {{-- <label for="Faedah "></label> --}}

                        <div class="components_table_container mt-5 w-100">
                          {{-- <h3 class="table_heading">
                            Maklumat Peruntukan (Belanja Penyenggaraan)
                          </h3> --}}
                          <p>Maklumat Peruntukan (Belanja Penyenggaraan)
                          </p>
                          <div class="table_scroll">
                            <table class="perkara_table_sec_kewagan belanjaclass" id="perkara_table_sec_kewagan">
                              <thead>
                                <tr>
                                  <th class="col-3 text-center">Kategori Belanja</th>
                                </tr>
                              </thead>
                              <tbody id="Belanja">
                                
                                <tr>
                                  <td colspan="12">
                                    Kos OE (b)
                                    <!-- <button type="button" class="Information_add">
                                      <img
                                        src="{{ asset('assets/images/Add_box.png') }}"
                                        alt="minus"
                                      />
                                    </button> -->
                                  </td>
                                </tr>
                                
                              </tbody>
                              <tfoot id="belanjafooter">
                              
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Creativity Index (CI) </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                        <div class="w-100">
                          <p id="ci_tot" style="font-weight: normal!important;">
                        </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Nilai ACAT </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                        <div class="w-100">
                          <p id="acat_data" style="font-weight: normal!important;"></p>
                        </div>
                    </div>
                  </div>
                  <div class="input_fill_content row">
                    <div class="col-lg-2 col-xs-12">
                      <label for="Faedah ">Gerbang Nilai 0 </label>
                    </div>
                    <div class="input_form_group col-lg-10 col-xs-12">
                        <div class="w-100">
                          <p id="gno_status" style="font-weight: normal!important;"></p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nageri_footer">
              <!-- <button type="button" class="btn text-white" style="background-color: #5b63c3;">Simpan</button> -->
              <button type="button" class="btn btn-success" id="projectRingkasannext" style="background-color: #0ACF97">
                <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'perakuan'])}}">Seterusnya</a>
              </button>              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
  <!-- Mainbody_conatiner Starts -->
</div>
@include('project.common-scripts')
@include('project.ringkasan.scripts')
    @endsection