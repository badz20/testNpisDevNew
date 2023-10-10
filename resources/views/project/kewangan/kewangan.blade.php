@include('project.kewangan.style')
@extends('layouts.main.master_responsive')
    
@section('content_main')

@php
    $user_is=Auth::user()->is_superadmin;
    $userType=Session::get('userType');
    $user_role=Session::get('userRole'); 

    if($userType==4) 
    {
      $semak_access=1;
    }
    else
    {
      $semak_access=0;
    }
@endphp

<x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
</x-form.spinner>

    <!-- Mainbody_conatiner Starts -->
    <div class="Mainbody_conatiner ml-auto">
      <div class="Mainbody_content mtop">
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
            @include('project.side-sections', ['active' => 'kewangan'])
          </div>
          <div class="project_register_tab_content_container col-10">
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
            <form>
              <div class="brief_project_container rmk">
                <div class="RMK_project_header d-flex">
                  <h4 class="py-4">Maklumat Kos dan Siling</h4>
                </div>
                <div class="brief_project_content">
                  <div class="brief_project_content_container px-0 pt-4">
                    <div class="row m-0">
                      <div class="col-lg-6 col-xs-12">
                        <div class="row mb-4">
                          <div class="col-lg-4 col-xs-12 align-self-center">
                            <label for="" class=""
                              >Komponen DE <sup>*</sup></label
                            >
                          </div>
                          <div class="col-lg-7 col-xs-12">
                            <select name="" class="form-control" id="cmbkomponen">
                              <option value="">--Pilih--</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-xs-12">
                        <div class="row">
                          <div class="col-lg-5 col-xs-12 align-self-center">
                            <label for="" class=""
                              >Kos Projek (RM) <sup>*</sup></label
                            >
                          </div>
                          <div class="col-lg-7 col-xs-12">
                            <input
                              type="text"
                              class="form-control bg-light input-element"
                              value="0"
                              id="totalkoscomponen"
                              readonly
                            />
                          </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col-lg-5 col-xs-12 align-self-center">
                            <label for="" class="" id="silingrollingpplan"
                              >Siling Dimohon 2023 (RM) <sup>*</sup></label
                            >
                          </div>
                          <div class="col-lg-7 col-xs-12">
                            <input
                              type="text"
                              class="form-control input-element"
                              value="0"
                              id="txtsilingdimohon"

                            />
                          </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col-lg-5 col-xs-12 align-self-center">
                            <label for="" class="" id="silingbayanganrollingpplan"
                              >Siling Bayangan 2023 (RM) <sup>*</sup></label
                            >
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control input-element" id="txtsilingbayangan" value="0" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="components_table_container">
                      <div class="table_scroll">
                        <table class="components_table table" id="components_table">
                          <thead>
                            <tr>
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
                          <tbody id="componentbody">
                            
                          </tbody>
                        </table>
                      </div>
                      <!-- ---------------------------New Section starts-------------------- -->

                      <!-- ------------New from Vijay -->
                      <div class="table_scroll">
                        <div class=" table table-bordered">
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
                              <td>
                                <u><a class="rujukan_link" href="javascript:void(0);"> Rujukan <i>Scale of Fees</i></u></a>
                              </td>
                              </tr>
                              <tr>
                                <td colspan="4"><b>CALCULATION OF PERCENTAGE​</b></td>
                              </tr>
                              <tr>
                                <td colspan="4"></td>
                              </tr>
                              <form>
                                <tr class="pengiraan_table" style="background-color: #39b0d2; color: #fff;">
                                  <td>Sila Pilih Peratusan Yuran Perunding​</td>
                                  <td> 
                                    <label for="Pmin" style="color: #fff;">Pmin (%)</label>
                                    <input class="d-flex" type="radio" id="pmin" name="Pminmax" value="" onclick="getfinalcostpiawai()">
                                    <input type="text" id="lblpmin" size="10%" readonly>
                                  </td>
                                  
                                  <td> 
                                    <label for="Pmax" style="color: #fff;">Pmax (%)</label>
                                    <input class="d-flex" type="radio" id="pmax" name="Pminmax" value="" checked  onclick="getfinalcostpiawai()">
                                    <input type="text" id="lblpmax" size="10%" readonly>
                                  </td>
                                 
                                  <td> 
                                    <label for="Pavg" style="color: #fff;">Pavg (%)</label>
                                    <input class="d-flex" type="radio" id="pavg" name="Pminmax" value="" onclick="getfinalcostpiawai()">
                                    <input type="text" id="lblpavg" size="10%" readonly>
                                  </td>
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
                      </div>
                      <!-- --------------------------- -->

                      <!-- <div class="row">
                        <div class="col">
                          <input type="text" id="ftotalcost" class="form-control"/>
                        </div>
                        <div class="col">
                            <label for="" id="lblpmax" style="width: 10px;">
                          </div>
                        <div class="col">                               
                          <input type="radio" id="pmax" name="pminmax" class="form-control" onclick="calculatecost(this.value)"/>
                        </div>
                        <div class="col">
                            <label for="" id="lblpmin" style="width: 10px;">
                          </div>
                        <div class="col">
                          <input type="radio" id="pmin" name="pminmax" class="form-control" onclick="calculatecost(this.value)"/>
                        </div>
                        <div class="col">
                            <label for="" id="lblpavg" style="width: 10px;">
                          </div>
                        <div class="col">
                          <input type="radio" id="pavg" name="pminmax" class="form-control" onclick="calculatecost(this.value)"/>
                        </div>
                        <div class="col">
                          <input type="text" id="ftotalcostpercent" class="form-control"/>
                        </div>
                      </div> -->
                      
                      <!-- ---------------------------New Section ends-------------------- -->

                    
                    </div>
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
                        <div class="table_scroll">
                          <table class="components_table table" id="yuranperunding_tapak_table" cellspacing="2" width="100%">
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
                                <td class="text-right text-uppercase" >Jumlah</td>

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
                    <!-- Table yuran perunding tapak ends -->


                    <!-- ------------------ changes swaraj ------------------ -->
                    <input type="hidden" name="scope" id="scope" value="">
                    <div class="components_table_container mt-5">
                    <h3 class="table_heading" style="display: inline">
                      <b>PERINCIAN MAKLUMAT PECAHAN KOS MENGIKUT TAHUN</b>
                    </h3>
                    <!-- tool tip -->
                    <div class="position-relative pop_over info" style="display: inline">
                      <button type="button" class="pop_btn" style="border: none;    background: white;">
                          <span class="iconify info_icon" data-icon="mdi-information"></span>
                      </button>
                      <div class="pop_content p-2 d-none  position-absolute" style="z-index: 2;background-color: #eeecec;
                      border-radius: 7px; width: 250px;">
                        {{-- <p>Hijau - kos adalah sejajar dengan kos yang diperuntukkan</p> --}}
                        
                        <p>KUNING - Anggaran Kos yang dimasukkan kurang daripada kos yang diperuntukkan</p>
                        <p>MERAH - Jumlah Siling Peruntukkan melebihi Kos</p>
                      </div>
                    </div>
                    <!-- tool tip ends -->

                    
                    <h3 class="table_heading">
                      <sup>*</sup>Sila lengkapkan anggaran siling tahunan.
                    </h3>
                    
                    <div class="table_scroll">
                      <table class="projek_table_kewagan" id="projek_table_kewagan" style="width: 100%">
                        <thead>
                          <tr>
                            <th class="col-2 text-center">Skop Projek</th>
                            <th class="text-center col-2">Kos (RM)</th>
                          </tr>
                        </thead>
                        <form action="" name="myform">
                          <tbody id="skop-first">
                          </tbody>
                        </form>
                      </table>
                    </div>


                    <div class="components_table_container mt-5">
                      <h3 class="table_heading">
                        <b>Jadual Pelaksanaan</b>
                      </h3>
                      <h3 class="table_heading">
                        <sup>*</sup>Sila tandakan pada kotak mengikut perancangan pelaksanaan secara sukuan tahunan.
                      </h3>
                      <h3 class="table_heading">
                        <!-- JADUAL PELAKSANAAN *Sila tandakan pada kotak mengikut perancangan pelaksanaan secara sukuan tahunan. -->
                      </h3>
                      <div class="table_scroll">
                        <table class="komponen_three_table_kewagan" id="komponen_three_table_kewagan">
                          <thead>
                            <tr>
                              <th class="col-3 text-center">Skop & Komponen</th>
                              <th class="col-4 text-center">Kos (RM)</th>
                            </tr>
                          </thead>
                          <form action="" name="myform2">
                            <tbody id="skop-second">
                            </tbody>
                          </form>
                        </table>
                      </div>
                    </div>
                    
                    <div class="components_table_container mt-5">
                      <h3 class="table_heading">
                        Maklumat Peruntukan (Belanja Mengurus)
                        </h3>
                        <h3 class="table_heading">
                        *Sila lengkapkan anggaran perbelanjaan pengurusan projek mengikut tahun.
                      </h3>

                      <div class="table_scroll">
                        <table class="perkara_table_kewagan" id="perkara_table_kewagan">
                          <thead>
                            <tr>
                              <th class="col-3 text-center">Perkara</th>
                            </tr>
                          </thead>
                          <form action="" name="myform">
                            <tbody id="skop-third" style="font-size: 0.8rem;">
                            
                            </tbody>
                          </form>
                          <tfoot>
                            
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    
                    <div class="components_table_container mt-5" style="width: 100%;">
                      <h3 class="table_heading">
                        Maklumat Peruntukan (Belanja Penyenggaraan)
                      </h3>
                      <h3 class="table_heading">
                      <sup>*</sup>Sila lengkapkan maklumat belanja penyelenggaraan bagi pengiraan Creativity index.
                      </h3>
                      <div class="table_scroll">
                        <table
                          class="perkara_table_sec_kewagan belanjaclass"
                          id="perkara_table_sec_kewagan"
                        >
                          <thead>
                            <tr style="width: 100%">
                              <th class="text-center">Kategori Belanja</th>
                            </tr>
                          </thead>
                          <tbody id="Belanja">
                            
                            <tr>
                              <td colspan="12">
                                <div class="d-flex">
                                  <span style="padding-top: 0.2rem!important;">Kos OE (b)</span>
                                  <button type="button" class="Information_add">
                                    <i class="ri-add-box-line ri-2x"></i>
                                  </button>
                                </div>
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

              <!-- ---------- new table start ---------------- -->

              <!-- <div class="components_table_container mt-5" style="width: 100%;">
                      <h3 class="table_heading">
                      PERINCIAN MAKLUMAT KEWANGAN MENGIKUT NEGERI TERLIBAT
                      </h3>
                      <div class="table_scroll">
                        <table class="perkara_table_kewagan" id="perincian_table">
                          <thead>
                            <tr class="text-center" style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;">
                              <th class="text-center NOCtblKodprojek">Negeri</th>
                              <th class="text-center NOCtblKodprojek">Kos Projek (RM)</th>
                            </tr>
                          </thead>
                          <tbody id="perincian">
                            
                          </tbody>
                        </table>
                      </div>
              </div> -->

              <div class="components_table_container mt-5" id="negeri_kewangan_section">
                      <h3 class="table_heading_new" style="color: #212529; font-family: Poppins_bold; font-size: 0.9rem;">
                      PERINCIAN MAKLUMAT KEWANGAN MENGIKUT NEGERI TERLIBAT
                      </h3>

                      <div class="table_scroll">
                        <table class="perkara_table_kewagan" id="perincian_table">
                          <thead>
                            <tr class="text-center" style="font-size: 0.8rem; background-color: #39Afd1; color: #fff;width:100%;">
                              <th class="text-center NOCtblKodprojek">Negeri</th>
                              <th class="text-center NOCtblKodprojek">Kos Projek (RM)</th>
                            </tr>
                            </tr>
                          </thead>
                          <form action="" name="myform">
                            <tbody id="skop-third" style="font-size: 0.8rem;">
                            
                            </tbody>
                          </form>
                          <tfoot>
                            
                          </tfoot>
                        </table>
                      </div>
              </div>


              <!-- ----------- new table end ----------------- -->



              <div class="brief_project_content_footer">
                <button type="button" id="simpan">Simpan</button>
                <button type="button" id="projectKewangannext" style="background-color: #0ACF97">
                    <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'creativity'])}}">Seterusnya</a>
                </button>
                <!-- <button class="green">Seterusnya</button> -->
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
  
    <!-- modal -->
    <section>
      <div class="Tambah_modal_container">
        <div
          class="modal spaced_modal fade"
          id="Tambah_data_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered Tambah_modal_dialog"
            role="document"
          >
            <div class="modal-content Tambah_modal_content">
              <div class="Tambah_modal_header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <h5>Tambah KPI</h5>
                </div>

                <button type="button" data-dismiss="modal" aria-label="Close">
                  <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
                </button>
              </div>
              <div class="modal-body Tambah_modal_body">
                <p class="box">Sila Isi Maklumat di Bawah</p>
                <form>
                <input type="hidden" id="api_url" value={{env('API_URL')}}>
                <input type="hidden" value="{{$id}}" id="project_id"/>
                  <div class="row m-0">
                    <div class="form-group col-6 pl-0">
                      <div class="row m-0">
                        <label for="nama" class="col-4 pl-0 align-self-center"
                          >Kuantiti/Bilangan</label
                        >
                        <input
                          type="text"
                          class="form-control col-8"
                          id="nama"
                          value="6"
                        />
                      </div>
                    </div>
                    <div class="form-group col-6 pr-0">
                      <div class="row m-0">
                        <label for="unit" class="col-4 align-self-center"
                          >Keterangan</label
                        >
                        <select id="unit" class="form-control col-8">
                          <option value="">--Pilih--</option>
                          <option value="">Kilometer,Km</option>
                          <option value="">Centimeter,Cm</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <div class="row m-0">
                      <label for="Penerangan " class="col-2 p-0"
                        >Penerangan</label
                      >
                      <textarea class="form-control col-10"></textarea>
                    </div>
                  </div>
                  <div class="tambah_table_container">
                    <label for="tambah_table " class="">Sasaran</label>
                    <table class="tambah_table table">
                      <thead>
                        <tr>
                          <th>2022</th>
                          <th>2023</th>
                          <th>2024</th>
                          <th>2025</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group">
                              <input type="text" class="form-control" />
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <input type="text" class="form-control" />
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                value="6"
                              />
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                value="0"
                              />
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div class="Tambah_modal_footer text-center">
                  <button
                    data-toggle="modal"
                    data-target="#Tambah_sucess_modal"
                    data-dismiss="modal"
                  >
                    Simpan
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="Tambah"></div>
    </section>
    @include('masterPortal.result_modal')
    <div class="rujukan_modal_content"  >
      <div class="modal fade "
        id="rujukan_modal"
        style="background-color: rgba(0, 0, 0, 0.2);"
        tabindex="-1"
        role="dialog"
        aria-labelledby="dokumen_"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document" style="box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;">
          <div class="modal-content">
            <div class="modal-header">
              <table class="table">
                <thead>
                  <tr style="color: #fff;">
                    <th style="background-color: #39b0d2;">
                      Total Cost of Components Of Works In Respective Type in RM
                    </th>
                    <th style="background-color: #39b0d2;">
                      P(max) %
                    </th>
                    <th style="background-color: #39b0d2;">
                      P(min) %
                    </th>
                  </tr>
                </thead>
                <tbody id="rujukantable">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('project.common-scripts')
    @include('project.kewangan.scripts')
    <script>
      
    function SetKewangan(row,col)
    {
      console.log(row);
      console.log(col);
      var cell = document.getElementById("kewangan"+row+'_'+col); console.log(cell.innerHTML)
      if(cell.innerHTML=='')
      {
        cell.innerHTML = '&#x2713;';
      }
      else
      {
        cell.innerHTML = '';
      }
    }

    </script>
@endsection