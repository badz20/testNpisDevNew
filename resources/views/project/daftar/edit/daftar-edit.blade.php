@include('project.daftar.style')
@extends('layouts.main.master_responsive')

@section('content_main')
<!-- <link rel="stylesheet" href="https://phpcoder.tech/multiselect/css/jquery.multiselect.css"/> -->
<link href="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.css') }}" rel="stylesheet"/>


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
        <h4 class="ml-2 project_register">Daftar Permohonan Projek</h4>
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

    <div class="mr-5 pb-2" style="float:right;" >
      <x-form.print></x-form.print>
    </div>

    <div class="project_register_tab_container row">
      <div class="project_register_tab_btn_container col-2">
        @include('project.side-sections', ['active' => 'brif'])
      </div>
      <div class="project_register_tab_content_container col-10">
        {{-- Start RMK Flow Chart in Horizontal --}}
        <div class="rmk_flow_Chart flow-horizontal">

            <div class="rmk_flow_Chart_container d-none" id="indicator-daerah">
                @include('project.daerah_indicator')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-daerah-review">
                @include('project.daerah_indicator_review')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view">
                @include('project.negeri_view_indicator')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-review">
                @include('project.negeri_review_indicator')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view">
                @include('project.bahagian_view_indicator')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-review">
                @include('project.bahagian_review_indicator')
            </div>

        </div>  
        {{-- End RMK Flow Chart in Horizontal --}}

        {{-- Start RMK Flow Chart in Vertical --}}
        <div class="rmk_flow_Chart flow-vertical">

            <div class="rmk_flow_Chart_container d-none" id="indicator-daerah-vertical">
                @include('project.daerah_indicator_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-daerah-review-vertical">
                @include('project.daerah_indicator_review_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view-vertical">
                @include('project.negeri_view_indicator_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-review-vertical">
                @include('project.negeri_review_indicator_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view-vertical">
                @include('project.bahagian_view_indicator_vertical')
            </div>

            <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-review-vertical">
                @include('project.bahagian_review_indicator_vertical')
            </div>

        </div>
        {{-- End RMK Flow Chart in Vertical --}}
        @include('masterPortal.result_modal')      
        <form id="brifProjectForm">
          <div class="brief_project_container">
            <div class="brief_project_header d-flex row">
              <div class="col-lg-4 col-xs-12"></div>
              <div class="input_container">
                <div class="form-col-4" >
                  <label for="">No. Rujukan Permohonan</label>
                </div>
                <div class="form-col-8">
                  <input type="text" name="no_rujukan" id="no_rujukan" class="form-control" readonly style="font-size: 0.8rem;"/>
                  <p id="no_rujukan_error" style="color:red"></p>
                </div>
              </div>
            </div>
            <div class="brief_project_content">
                <div class="brief_project_content_container">
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12" style="margin-top: 0.5rem;">
                            <label for="Kategori Projek">Kategori Projek <sup>*</sup>
                            </label>
                          </div>
                          <div class="input_form_group col-lg-5 col-xs-12">
                                <select name="kategori_project" id="kategori_project" class="form-control col-lg-8 col-xs-12" required @if ($is_submitted) readonly @endif ></select>
                              <!-- <input type="text" name="kategori_project" id="kategori_project" value="Baharu" class="form-control" required/> -->
                              <p id="kategori_project_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
        
                    <div class="input_container daftar-row">
                        <div class="input_fill_content col-lg-7 col-xs-12 daftar-row">
                          <div class="col-lg-5 col-xs-12" style="margin-right: 1.25rem;">
                            <label for="Behagian_Premilik">Bahagian Pemilik <sup>*</sup> <br/>Projek</label>
                          </div>
                          <div class="form-group input_form_group col-lg-6 col-xs-12" style="padding-right: 0px">
                            <select name="bahagian_pemilik" id="bahagian_pemilik" class="form-control col-12" onchange="pemilikChange(this);" required @if ($is_submitted) disabled @endif>
                              <option value="">--Pilih--</option>                                    
                            </select>
                            <p id="bahagian_pemilik_error" style="color:red"></p>
                          </div>
                        </div>
                        <div class="col-lg-2 col-xs-12">
                          <label for="bahagian_terlibat">Bahagian Terlibat <sup>*</sup></label>
                        </div>
                        <div id="select_content_div" class="col-lg-3 col-xs-12 row" style="position: relative; margin-bottom: 1%; padding-right: 0px">
                          <div class="form-group col-12">
                            <div id="bahagian_terlibat_checkbox_div" class="d-flex" style="position: relative;">
                                <input id="bahagian_terlibat_checkbox" name="bahagian_terlibat_checkbox" class="form-group input_form_group" onclick="check()" type="checkbox" @if ($is_submitted) disabled @endif>
                                <label for="bahagian_terlibat_checkbox" class="ml-2" style="margin-top: -2px;">Tidak Berkenaan</label>
                            </div>
                            <div id="bahagian_terlibat_div" onclick="bahagian_terlibat_div()"  class="form-group input_form_group">
                              <select name="bahagian_terlibat" id="bahagian_terlibat" class="form-control" multiple required @if ($is_submitted) disabled @endif>                                        </select>  
                              <p id="bahagian_terlibat_error_error" style="color:red"></p>
                            </div>
                            
                            <div id="selected_bahagian_terlibat_div" style="overflow-y:scroll; height:150px;width:auto; background:rgb(255, 255, 255);position: relative;">
                                <label class="p-2">Bahagian Terlibat Yang Telah Dipilih</label>     
  
                                <div id="selected_bahagian_terlibat" class="selected_bahagian_terlibat m-2 text-nowrap">
                                    
                                </div>                           
                            </div>
                          </div>
                        </div>
                    </div>
                    
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="RMK">RMK <sup>*</sup></label>
                          </div>
                          <div class="form-group input_form_group col-lg-5 col-xs-12">
                            <select name="RMK" id="RMK"
                                class="form-control RMK col-lg-8 col-xs-12" required @if ($is_submitted) disabled @endif>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Rolling_Plan">Rolling Plan <sup>*</sup></label>
                          </div>
                          <div class="form-group input_form_group col-lg-5 col-xs-12">
                            <select name="rolling_plan_options"
                                        id="rolling_plan_options"
                                        class="form-control rolling_plan_options col-lg-8 col-xs-12" required @if ($is_submitted) disabled @endif>
                                    <option value="">--Pilih--</option>                                    
                                </select>
                            <p id="rolling_plan_options_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
                    
                    
                    <div class="input_container">
                        <div class="input_fill_content row">
                            <div class="col-lg-3 col-xs-12">
                                <label for="Butiran" class=" ">Butiran <sup>*</sup></label>
                              </div>
                            <div class="form-group input_form_group col-lg-9 col-xs-12">
                                <select name="butiran_options" id="butiran_options" class="form-control col-lg-12 col-xs-12" required @if ($is_submitted) disabled @endif>
                                    <option value="">--Pilih--</option>                                   
                                </select>
                                <p id="butiran_options_error" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-3 col-xs-12 d-flex">
                            <label for="Nama ">Nama Projek <sup>*</sup></label>
                            <div class="pop_over info">
                              <button type="button" class="pop_btn">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                            </div>
                            <div class="position-absolute brif_info4">
                              <div class="pop_content d-none" style="width: 150px !important;padding:10px;text-align: center">
                                Nama projek perlulah mengandungi nama daerah dan negeri
                              </div>
                            </div>
                          </div>
                            
                          <div class="col-lg-9 col-xs-12 form-group input_form_group">
                            <textarea type="text" class="form-control col-lg-12 col-xs-12" name="project_name" id="project_name" @if ($is_submitted) readonly @endif
                            value="" required style="text-transform:uppercase"></textarea>
                            <p id="project_name_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Objektif ">Objektif <sup>*</sup></label>
                          </div>
                          <div class="col-lg-9 col-xs-12 form-group input_form_group">
                            {{-- <textarea 
                                      type="text"
                                      name="objecktif"
                                      id="objecktif"
                                      oninput="handleInput(event)"
                                      class="form-control" required></textarea> --}}
  
                            <div name="objektif" class="form-control col-lg-12 col-xs-12 objektif" id="objektif" @if ($is_submitted) style="background-color:#e9ecef;" contentEditable="false" @else contentEditable="true" @endif>
                                <ol style="margin-left:-25px"><li></li></ol>
                            </div>
                            <p id="objektif_error" style="color:red"></p>       
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-3 col-xs-12 d-flex">
                            <label for="Ringkasan ">Ringkasan Latar Belakang Projek <sup>*</sup></label>
                            <div class="pop_over info">
                              <button type="button" class="pop_btn">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                            </div>
                            <div class="position-absolute brif_info2" >
                              <div class="pop_content d-none" style="width: 100px !important;padding:5px;text-align: center">
                              1. Ringkasan projek merangkumi latarbelakang kawasan projek, rekod kejadian banjir
                                  (kedalaman/ keluasan banjir/penduduk /kerosakan terlibat), jenis guna tanah.</br>
                              2. Masalah yang dihadapi serta projek terdahulu yang pernah dilaksanakan (sekiranya ada)

                              </div>
                            </div>
                          </div>
                            
                          <div class="col-lg-9 col-xs-12 form-group input_form_group">
                            {{-- <textarea type="text"
                              name="ringkasan_latar"
                              id="ringkasan_latar"
                              oninput="handleInput2(event)"
                              class="form-control" required></textarea>
                              <p id="ringkasan_latar_error" style="color:red"></p> --}}
                            <div name="ringkasan_latar" class="form-control col-lg-12 col-xs-12" id="ringkasan_latar" @if ($is_submitted) style="background-color:#e9ecef;" contentEditable="false" @else contentEditable="true" @endif>
                                <ol style="margin-left:-25px "><li></li></ol>
                            </div>
                            <p id="ringkasan_latar_error" style="color:red;"></p>
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Rasional ">
                                Rasional/Justifikasi Keperluan Projek
                                <sup>*</sup>
                            </label>
                          </div>
                          <div class="col-lg-9 col-xs-12 form-group input_form_group">
                              {{-- <textarea 
                                        type="text"
                                        name="rasional_keperluan"
                                        id="rasional_keperluan"
                                        oninput="handleInput3(event)"
                                        class="form-control" required></textarea>
                                        <p id="rasional_keperluan_error" style="color:red"></p> --}}
                                        <div name="rasional_keperluan" class="form-control col-lg-12 col-xs-12" id="rasional_keperluan" @if ($is_submitted) style="background-color:#e9ecef;" contentEditable="false" @else contentEditable="true" @endif>
                                            <ol style="margin-left:-25px "><li></li></ol>
                                        </div>
                                        <p id="rasional_keperluan_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Faedah ">Faedah <sup>*</sup></label>
                          </div>
                          <div class="col-lg-9 col-xs-12 form-group input_form_group">
                              {{-- <textarea 
                                        type="text"
                                        name="faedah"
                                        id="faedah"
                                        oninput="handleInput4(event)"
                                        class="form-control" required></textarea>
                                        <p id="faedah_error" style="color:red"></p> --}}
                                        <div name="faedah" class="form-control col-lg-12 col-xs-12" id="faedah" @if ($is_submitted) style="background-color:#e9ecef;" contentEditable="false" @else contentEditable="true" @endif>
                                            <ol style="margin-left:-25px "><li></li></ol>
                                          </div>
                                        <p id="faedah_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
                    <div class="input_container row">
                        <div class="select_content col-lg-7 col-xs-12 row">
                          <div class="col-lg-5 col-xs-12 mr-3">
                            <label for="Jenis_Kategori">Jenis Kategori <sup>*</sup>
                            </label>
                          </div>
                            <div class="form-group select_form_group col-lg-6 col-xs-12">
                                <select name="jenis_kategori_options" class="form-control jenis_kategori_options" id="jenis_kategori_options" required @if ($is_submitted) disabled @endif>
                                    <option value="">--Pilih--</option>
                                </select>
                                <p id="jenis_kategori_options_error" style="color:red"></p>
                            </div>
                        </div>
                        <div class="select_content col-lg-5 col-xs-12 row">
                          <div class="col-lg-5 col-xs-12">
                            <label for=" Jenis_Sub_Kategori">
                                Jenis Sub Kategori<sup>*</sup>
                            </label>
                          </div>
                            <div class="form-group select_form_group col-lg-7 col-xs-12">
                                <select type="text"
                                        class="form-control"
                                        name="jenis_sub_kategori_options" id="jenis_sub_kategori_options" required @if ($is_submitted) disabled @endif>
                                    <option value="">--Pilih--</option>
                                </select>
                                <p id="jenis_sub_kategori_options_error" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------------------skop----------------------------------------- -->
                    <div class="input_container">
                        <div class="row input_fill_content">
                            <div class="col-lg-3 col-xs-12 d-flex">
                              <label for="Skop">Skop <sup>*</sup></label>
                              <div class="pop_over info">
                                <button type="button" class="pop_btn">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                              </div>
                              <div class="position-absolute brif_info">
                                <div class="pop_content d-none" style="width: 150px !important;padding:10px;text-align: center">
                                Maklumat kos hendaklah diisi di Tab Kewangan
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-9 w-100">
                                <div class="card skop_card_content">
                                    <div class="skop_content_container">
                                    <div class="error" id="error_skop_project" style="color:red"></div>
                                    <div class="error" id="error_skop_main_project" style="color:red"></div>
                                        <table class="skop table m-0" id="skop">
                                            <thead>
                                                <tr class="row m-0 py-2">
                                                    <th class="d-flex col-7">
                                                        Skop Projek
                                                        
                                                        @if (!$is_submitted)  
                                                        <button data-title="Tambah skop" type="button" class="ml-auto" style="margin-right: 11%;" onclick="addSkop()">
                                                            <img src="{{ asset('assets/images/Add_box.png') }}"
                                                                 alt="" style="width: 1.15rem;" />
                                                        </button>
                                                        @endif
                                                    </th>
                                                    <th class="col-5">Kos (RM)*</th>
                                                </tr>
                                            </thead>
                                            <tbody id="skopBody">
                                                
                                            </tbody>

                                            <tfoot class="skop_footer mt-5">
                                                <tr class="row m-0">
                                                    <td class="col-6">
                                                        <div class="d-flex p-3 align-items-center">
                                                            <p class="m-0">Jumlah Kos</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-6 d-flex align-items-center">
                                                        <input type="text"
                                                               class="py-1 col-8 form-control text-right"
                                                               name="total_cost"
                                                               id="total_cost"
                                                               value="0.00" readonly/>
                                                               <p id="total_cost_error" style="color:red"></p>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input_container pt-4">
                        <div class="row input_fill_content">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Implikasi ">Implikasi Projek Tidak Lulus <sup>*</sup></label>
                          </div>
                          <div class="col-lg-9 col-xs-12 form-group input_form_group">
                              {{-- <textarea 
                                        type="text"
                                        name="implikasi_projeck"
                                        id="implikasi_projeck"
                                        class="form-control" required></textarea>
                                        <p id="implikasi_projeck_error" style="color:red"></p> --}}
                                        <div name="implikasi_projeck" class="form-control col-lg-12 col-xs-12" id="implikasi_projeck" @if ($is_submitted) style="background-color:#e9ecef;" contentEditable="false" @else contentEditable="true" @endif>
                                            <ol style="margin-left:-25px "><li></li></ol>
                                          </div>
                                        <p id="implikasi_projeck_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
                    <div class="input_container row">
                        <div class="input_fill_content col-lg-7 col-xs-12 row">
                          <div class="col-lg-5 col-xs-12 mr-3">
                            <label for="Bahagian">
                                Bahagian (KE JPM) <sup>*</sup>
                            </label>
                          </div>
                          <div class="form-group input_form_group col-lg-6 col-xs-12">
                            <select name="bahagianepu_options" id="bahagianepu_options" class="form-control bahagianepu_options" required disabled>
                                <!-- <option value="">--Pilih--</option> -->
                            </select>
                              <p id="bahagianepu_options_error" style="color:red"></p>
                          </div>
                        </div>
                        <div class="select_content col-lg-5 col-xs-12 row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="sektor_utama">Sektor Utama <sup>*</sup></label>
                          </div>
                            <div class="form-group select_form_group col-lg-9 col-xs-12">
                                <select type="text"
                                        class="form-control sektor_utama"
                                        name="sektor_utama_options" id="sektor_utama_options" required disabled>
                                    <!-- <option value="">--Pilih--</option> -->
                                </select>
                                <p id="sektor_utama_options_error" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                    <div class="input_container row">
                        <div class="input_fill_content col-lg-7 col-xs-12 row">
                          <div class="col-lg-5 col-xs-12 mr-3">
                            <label for="sektor">
                                Sektor <sup>*</sup>
                            </label>
                          </div>
                            <div class="form-group input_form_group col-lg-6 col-xs-12">
                                <select name="sektor_options" class="form-control sektor_options" id="sektor_options" required disabled>
                                    <!-- <option value="">--Pilih--</option> -->
                                </select>
                                <p id="sektor_options_error" style="color:red"></p>
                            </div>
                        </div>
                        <div class="select_content col-lg-5 col-xs-12 row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Sub_sektor">Sub Sektor <sup>*</sup></label>
                          </div>
                            <div class="form-group select_form_group col-lg-9 col-xs-12">
                                <select type="text" id="sub_sektor_options" disabled
                                        class="form-control sub_sektor"
                                        name="sub_sektor_options" required>
                                    <!-- <option value="">--Pilih--</option> -->
                                </select>
                                <p id="sub_sektor_options_error" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Koridor">
                                Koridor Pembangunan <sup>*</sup>
                            </label>
                          </div>
                          <div class="form-group input_form_group col-lg-9 col-xs-12">
                            <select type="text" @if ($is_submitted) disabled @endif
                            class="form-control koridor_pembangunan col-lg-8 col-xs-12"
                            name="koridor_pembangunan_options"
                            id="koridor_pembangunan_options" required>
                                <option value="">--Pilih--</option>
                            </select>
                            <p id="koridor_pembangunan_options_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Kelulusan_Khas">Kelulusan Khas <sup>*</sup></label>
                          </div>
                          <div class="col-lg-9 col-xs-12 row m-0">
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Ya
                                  <input class="radio_Kelulusan_yes" 
                                      type="radio" 
                                      name="radio_Kelulusan" 
                                      id="radio_Kelulusan_yes" @if ($is_submitted) disabled @endif
                                      value="1"/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Tidak
                                  <input type="radio"
                                    name="radio_Kelulusan"
                                    id="radio_Kelulusan_no"                                            
                                    class="radio_Kelulusan_no"
                                    value="0" @if ($is_submitted) disabled @endif
                                    />
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                              Tidak Berkaitan
                              <input type="radio"
                                  name="radio_Kelulusan"
                                  id="radio_Kelulusan_na"                                            
                                  class="radio_Kelulusan_na"
                                  value="2" @if ($is_submitted) disabled @endif
                                  />
                                  <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="input_container nota_tambahan d-none">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12 d-flex">
                            <label for="Cadangan_Kerjasama ">
                                Nota Tambahan <br /><span>(Kelulusan Khas Jika Ada)</span><sup>*</sup>
                            </label>
                            <div class="info ml-1">
                              <button type="button" class="pop_btn" >
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none brif_info3">
                                  Nyatakan kelulusan khas seperti (Nota Jemaah Menteri (NJM,  Mesyuarat JTPN,  Kelulusan MTPNg dll)
                              </div>
                            </div>
                          </div>
                            
                          <div class="form-group input_form_group col-lg-9 col-xs-12">
                              {{-- <textarea type="text"
                                      name="kelulus_khas"
                                      id="kelulus_khas"
                                      class="form-control"></textarea>
                                      <p id="kelulus_khas_error" style="color:red"></p> --}}
                              <div name="kelulus_khas" class="form-control" id="kelulus_khas" @if ($is_submitted) style="background-color:#e9ecef;" contentEditable="false" @else contentEditable="true" @endif>
                                  <ol style="margin-left:-25px "><li></li></ol>
                              </div>
                              <p id="kelulus_khas_error" style="color:red"></p>
                          </div>
                        </div>
                    </div>

                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Sokongan_daripada">
                                Sokongan daripada UPEN<sup>*</sup>
                            </label>
                          </div>
                          <div class="col-lg-9 col-xs-12 row m-0">
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Ya
                                  <input type="radio" 
                                    name="radio_Sokongan" @if ($is_submitted) disabled @endif
                                    id="radio_Sokongan_yes"
                                    value="1" 
                                    />
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12  p-1">
                              <label class="r_container">
                                  Tidak
                                  <input type="radio"
                                    name="radio_Sokongan" @if ($is_submitted) disabled @endif
                                    id="radio_Sokongan_no"
                                    value="0"
                                    />
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                              Tidak Berkaitan
                              <input type="radio"
                                    name="radio_Sokongan" @if ($is_submitted) disabled @endif
                                    id="radio_Sokongan_na"
                                    value="2"
                                    />
                                  <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content">
                            <div class="col p-0 row m-0">
                                <div class="col-lg-5 col-xs-12 row m-0 p-0">
                                    <label for="Tahun Jangka Mula" class="col-7 p-0 mr-2">Tahun Jangka Mula <sup>*</sup></label>
                                    <div class="form-group col-lg-3 col-xs-6 p-0 m-0">
                                      <input type="text"
                                      class="form-control"
                                      style="width: 85px !important"
                                      name="tahun_jangka_mula" @if ($is_submitted) readonly @endif
                                      id="tahun_jangka_mula"
                                      minlength="4" maxlength="4"
                                      oninput="this.value = this.value.replace(/[^0-9.][Ee]/g, 'e').replace(/(\..*)\./g, '$1');"
                                      value="" required/>
                                      <p id="tahun_jangka_mula_error" style="color:red"></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-12 row m-0 p-0">
                                    <label for="Tahun Jangka Slap" class="col-7 p-0">Tahun Jangka Siap <sup>*</sup></label>
                                    <div class="form-group col-lg-3 col-xs-6 p-0 m-0">
                                        <input type="text"
                                            class="form-control" @if ($is_submitted) readonly @endif
                                            name="tahun_jangka_siap"
                                            style="width: 85px !important"
                                            id="tahun_jangka_siap"
                                            minlength="4" maxlength="4"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            value="" required/>
                                        <p id="tahun_jangka_siap_error" style="color:red"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12 row m-0 p-0">
                                    <label for="Tempoh Pelaksanaan" class="col-lg-6 col-xs-8 p-0">Tempoh Pelaksanaan <sup>*</sup></label>
                                    <div class="form-group col-lg-3 col-xs-6  p-0 m-0">
                                      <input type="number"
                                      class="form-control" @if ($is_submitted) readonly @endif
                                      name="tempoh_pelaksanaan"
                                      id="tempoh_pelaksanaan"
                                      style="width: 85px !important"
                                      value="" required  disabled/>
                                        <p id="tempoh_pelaksanaan_error" style="color:red"></p>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 pr-0">
                                        <p class="m-0">BULAN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------- kaijan contents starts--------------------------------- -->
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12 d-flex">
                            <label for="Kajian">Kajian <sup>*</sup><br /><span>(Jika Berkaitan)</span>
                            </label>
                            <div class="pop_over info">
                              <button type="button" class="pop_btn">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                            </div>
                            <div class="position-absolute brif_info">
                              <div class="pop_content d-none" style="width: 180px!important; text-align: center;
                              padding: 15px;">
                                  Kajian adalah merujuk kepada cadangan penyelesaian menyeluruh bagi lembangan sungai utama / kadar hakisan pantai
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-9 col-xs-12 row m-0">
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Ya
                                  <input class="kaijan_yes" type="radio" name="radio_Kajian" id="radio_Kajian_yes" value="1" @if ($is_submitted) disabled @endif/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Tidak
                                  <input class="kaijan_no" type="radio" name="radio_Kajian" id="radio_Kajian_no" value="0" @if ($is_submitted) disabled @endif/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                              Tidak Berkaitan
                                <input class="kaijan_na" type="radio" name="radio_Kajian" id="radio_Kajian_na" value="2" @if ($is_submitted) disabled @endif/>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                              <div class=" p-0 kaijan-col col-12 mt-3 d-none">
                                  <div class="impak-container">
                                    <div class="d-flex col-2 p-0">
                                      <p class="sub-topic" style="padding-top: 1rem!important;">
                                        Kajian Projek</p>
                                      @if(!$is_submitted)
                                        <button type="button" class="ml-auto add_kajian" style="background-color: transparent;border: none; padding: 0;">          
                                          <i class="ri-add-box-line ri-2x"></i>
                                        </button>            
                                      @endif  
                                    </div>
                                    <div id="kajian_content" >
                                    </div>
                                  </div>
                                <!-------------------------------- Kategori Hakisan  ends ------------------------------->
                              </div>
                          </div>
                        </div>
                    </div>

                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Sokongan_daripada">
                                 Pelan Induk/Kajian Kemungkinan<sup>*</sup>
                                <br /><span>(Jika Berkaitan)</span>
                            </label>
                          </div>
                            <div class="col-lg-9 col-xs-12 row m-0">
                              <div class="col-lg-3 col-xs-12 p-1">
                                <label class="r_container">
                                    Ya
                                    <input class="rujukan_pelan_yes" type="radio" name="radio_rajukan" id="rujukan_pelan_yes" value="1" @if ($is_submitted) disabled @endif/>
                                    <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-xs-12 p-1">
                                <label class="r_container">
                                    Tidak
                                    <input type="radio" name="radio_rajukan" class="rujukan_pelan_no"
                                    id="rujukan_pelan_no" value="0" @if ($is_submitted) disabled @endif
                                    />
                                    <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-xs-12 p-1">
                                <label class="r_container">
                                Tidak Berkaitan
                                    <input type="radio"
                                    name="radio_rajukan"
                                    
                                    class="rujukan_pelan_na"
                                    id="rujukan_pelan_na" value="2" @if ($is_submitted) disabled @endif
                                    />
                                    <span class="checkmark"></span>
                                </label>
                              </div>
                                <!-- <div class="col-12 p-0"> -->
                                <div class="mt-4 p-0 col-12 rujukan_pelan_data d-none">
                                  <div class="form-group col-lg-3 col-xs-12 p-0 mt-2">
                                      <label for="Jenis Kajilan" class="w-100">Jenis Kajian</label>
                                      <select name="kajian_kemungkinan_options" id="kajian_kemungkinan_options" class=" form-control mt-2">
                                          <option value="">--Pilih--</option>
                                      </select>
                                      <p id="kajian_kemungkinan_options_error" style="color:red"></p>
                                  </div>
                                </div>
                                <div class="d-flex row col-12 justify-content-start p-0">
                                  <div class="col-lg-6 col-xs-12 rujukan_pelan_data d-none">
                                      <div class="form-group">
                                          <label for="Jenis Kajilan" class="w-100">
                                              Nyatakan Nama Laporan Pelan Induk:
                                          </label>
                                          <input type="text"
                                                class="form-control"
                                                name="nama_laporan_pelan_induk" @if ($is_submitted) readonly @endif
                                                id="nama_laporan_pelan_induk"
                                                value="" />
                                                <p id="nama_laporan_pelan_induk_error" style="color:red"></p>
                                      </div>
                                  </div>
                                  <div class="align-items-center col-lg-6 col-xs-12 rujukan_pelan_data d-none">
                                      <label for="Tempoh Pelaksanaan">Tahun Siap: </label>
                                      <div class="form-group">
                                          <input type="text"
                                                class="form-control"
                                                name="tahun_siap_pelan_induk"
                                                id="tahun_siap_pelan_induk"
                                                minlength="4" maxlength="4"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                value="" />
                                                <p id="tahun_siap_pelan_induk_error" style="color:red"></p>
                                      </div>
                                  </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12">
                            <label for="Sokongan_daripada">
                                Status Reka Bentuk Terperinci<sup>*</sup>
                            </label>
                          </div>
                          <div class="col-lg-9 col-xs-12 row m-0">
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container col-12">
                                  Reka Bentuk Siap
                                  <input type="radio" name="radio_Status" class="siap_set1"  id="radio_Status_siap" value="1" @if ($is_submitted) disabled @endif/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container col-12">
                                  Dalam Penyediaan Reka Bentuk
                                  <input type="radio" name="radio_Status" class="siap_set2"  id="radio_Status_siap" value="2" @if ($is_submitted) disabled @endif />
                                  <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container col-12">
                                  Tiada Reka Bentuk
                                  <input type="radio" name="radio_Status" id="radio_Status_siap" value="0" checked />
                                  <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="justify-content-center col-lg-6 col-xs-12 p-0 reka_bentuk_siap d-none">
                              <label for="reka_bentuk_siap text">Tahun Siap: </label>
                              <div class="form-group col-lg-4 col-xs-12 p-0">
                                  <input type="text"
                                        class="form-control"
                                        name="reka_bentuk_siap" @if ($is_submitted) readonly @endif
                                        id="reka_bentuk_siap"
                                        minlength="4" maxlength="4"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        />
                                        <p id="reka_bentuk_siap_error" style="color:red"></p>
                              </div>
                            </div>
                          </div>
                            
                        </div>
                    </div>

                    
                    <div class="input_container">
                      <div class="input_fill_content row">
                        <div class="col-lg-3 col-xs-12 d-flex">
                          <label for="Adakah">
                              Adakah pelaksanaan projek ini melibatkan pembinaan
                              fasa terdahulu?
                          </label>
                          <sup style="margin-top: 5%; margin-right: 10%;">*</sup>
                        </div>
                        <div class="col-lg-9 col-xs-12 row m-0">
                          <div class="col-lg-3 col-xs-12 p-1">
                            <label class="r_container">
                                Ya
                                <input class="adakah_pelaksanaan_yes"  type="radio" name="radio_pelaksanaan" id="radio_pelaksanaan_yes" value="1" @if ($is_submitted) disabled @endif/>
                                <span class="checkmark"></span>
                            </label>
                          </div>

                          <div class="col-lg-3 col-xs-12 p-1">
                            <label class="r_container">
                                Tidak
                                <input type="radio"
                                    name="radio_pelaksanaan"
                                    id="radio_pelaksanaan_no" value="0" @if ($is_submitted) disabled @endif
                                    class="adakah_pelaksanaan_no"
                                    />
                                <span class="checkmark"></span>
                            </label>
                          </div>

                          <div class="col-lg-3 col-xs-12 p-1">
                            <label class="r_container">
                            Tidak Berkaitan
                              <input type="radio"
                              name="radio_pelaksanaan" @if ($is_submitted) disabled @endif
                              id="radio_pelaksanaan_na" value="2"
                              
                              class="adakah_pelaksanaan_na"
                              />
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                          
                        <div class="adakah_pelaksanaan_data col-lg-12 col-xs-12 row m-0 d-none">
                          <!-- <div class="col-12 p-0"> -->
                          <div class="col-lg-3 m-1">

                          </div>
                          <div class="col-lg-4 col-xs-12 m-1">
                            <label for="Jenis Kajilan" class="w-100">
                                Sekiranya Ya, sila nyatakan nama projek terdahulu
                            </label>
                            <div class="form-group row align-items-center">
                              <input name="pelaksanaan_description"
                                          id="pelaksanaan_description" @if ($is_submitted) readonly @endif
                                          class="form-control "
                                          value="" />
                                        <p id="pelaksanaan_description_error" style="color:red"></p>
                            </div>
                          </div>
                          <div class="col-lg-2 col-xs-12 m-1">
                            <label for="Jenis Kajilan" class="w-100">Status</label>
                              <div class="form-group row align-items-center">
                                <select name="status_options"
                                        class="form-control"
                                        id="status_options" @if ($is_submitted) disabled @endif>
                                    <option value="">--Pilih--</option>                                                
                                </select>
                                  <p id="status_options_error" style="color:red"></p>
                              </div>
                          </div>
                          <div class="col-lg-2 col-xs-12 m-1">
                            <label for="Jenis Kajilan" class="w-100">Tahun Siap</label>
                            <div class="form-group row align-items-center">
                              <input name="pelaksanaan_tahun_siap"
                              class="form-control col-12 mb-0" @if ($is_submitted) readonly @endif
                              id="pelaksanaan_tahun_siap" type="text"
                              minlength="4" maxlength="4"
                              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                              />
                              <p id="pelaksanaan_tahun_siap_error" style="color:red"></p>
                              </div>
                          </div>
                          <!-- </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12 d-flex">
                            <label for="banjir_limpahan_options">
                                Kekerapan Banjir Limpahan Sungai/Pantai
                            </label>
                            <sup style="margin-top: 5%; margin-right: 20%;">*</sup>
                          </div>
                            <div class="form-group input_form_group col-lg-9 col-xs-12">
                                <select name="banjir_limpahan_options" id="banjir_limpahan_options" @if ($is_submitted) disabled @endif
                                        class="form-control col-lg-8 col-xs-12" required>
                                    <option value="">--Pilih--</option>
                                </select>
                                <p id="banjir_limpahan_options_error" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <div class="input_fill_content row">
                          <div class="col-lg-3 col-xs-12 d-flex">
                            <label for="Adakah">
                                Adakah projek pernah dibahaskan di parlimen? Atau
                                pernah dimohon khas daripada DUN/Ahli Parlimen/
                                Persatuan/Pertubuhan
                            </label>
                            <sup style="margin-top: 5%; margin-right: 15%;">*</sup>
                          </div>
                          <div class="col-lg-9 col-xs-12 row m-0">
                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Ya
                                  <input type="radio" name="radio_Adakah" id="radio_Adakah_yes" value="1" @if ($is_submitted) disabled @endif/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                                  Tidak
                                  <input type="radio" name="radio_Adakah" id="radio_Adakah_no" value="0"  @if ($is_submitted) disabled @endif/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="col-lg-3 col-xs-12 p-1">
                              <label class="r_container">
                              Tidak Berkaitan
                              <input type="radio" name="radio_Adakah" id="radio_Adakah_na" value="2"  @if ($is_submitted) disabled @endif/>
                                  <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="brief_project_content_footer">
            @if(!$is_submitted && !$is_review)
            <button type="button" id="brifProjectupdate">Simpan</button>
            @endif
            <button type="button" id="brifProjectnext" style="background-color: #0ACF97">
                <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'rmk'])}}">Seterusnya</a>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<section>
        <div class="project_register_form_modal_container">
          <div
            class="modal spaced_modal fade"
            id="Make_sure_application_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
            data-backdrop="static" data-keyboard="false"
          >
            <div
              class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
              role="document"
            >
              <div class="modal-content project_register_form_modal_content">
                <div class="modal-body project_register_form_modal_body">
                  <div class="project_register_form_modal_body_Content">
                    <h5 class="successS_header p-0 mb-2 text-center">
                      ADAKAH ANDA PASTI UNTUK MENYEMAK PERMOHONAN<br><br>
                      <lable id="section_project_name"></label>
                    </h5><br>
                    <div class="btn_holder d-flex">
                      <button data-dismiss="modal" class="fix_button green" id="confirm">
                        YA
                      </button>
                      <button data-dismiss="modal" class="fix_button red" id="confirm_close_btn">
                        TIDAK
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
        <span>{{ now()->year }}</span>
        <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
        <span>NPIS - JPS</span>
      </div>
<!-- Mainbody_conatiner Starts -->
</div>
<x-form.modal>
    <x-slot name="modal_id">modal-daftar-edit-success-id</x-slot>
    <x-slot name="message">Maklumat anda berjaya disimpan</x-slot>
</x-form.modal>
<x-form.modal>
    <x-slot name="modal_id">modal-daftar-edit-error-id</x-slot>
    <x-slot name="message">Error while saving the data</x-slot>
</x-form.modal>
<section>
<div class="container"></div>
</section>
@include('project.common-scripts')
@include('project.daftar.skop_script')
@include('project.daftar.edit.load_skop_script')
@include('project.daftar.edit.load_script')
@include('project.daftar.data_scripts')
@include('project.daftar.scripts')
@endsection




