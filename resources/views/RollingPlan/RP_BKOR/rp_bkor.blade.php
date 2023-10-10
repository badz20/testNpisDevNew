@include('users.dashboard.style')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <link rel="stylesheet" href="https://phpcoder.tech/multiselect/css/jquery.multiselect.css" /> -->
<link href="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.css') }}" rel="stylesheet"/>

@include('RollingPlan.RP_BKOR.style')

<!-- Mainbody_conatiner Starts -->
<div class="Mainbody_conatiner ml-auto">

    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner>

    <div class="Mainbody_content mtop">
        <div class="Mainbody_content_nav_header project_register align-items-center row">
            <div class="col-md-4 col-xs-12">
                <h4>Daftar Permohonan</h4>
                
            </div>
            <div class="col-md-8 col-xs-12 path_nav_col">
                <ul class="path_nav d-flex align-content-center flex-wrap">
                    <li>
                        <a href="/Senarai_Peruntukan" style="display: flex; align-items: center;">
                            <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-timer-sand"></span>
                             Permohonan Peruntukan Di Luar Rolling Plan (RP)
                             <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                          </a>
                    </li>
                    <li style="display: flex; align-items: center;">
                        <a href="#" class="active" style="background-color: transparent!important;">Daftar Permohonan
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="project_register_content_container">
            <div class="project_register_search_container mt-3">
                <!-- <div class="project_register_search_header d-flex">
                    <img src="assets/images/Vector-13.png" alt=""/>
                    <h4>Carian Permohonan</h4>
                </div> -->
                
                <div class="project_register_tab_content_container col-12 col-xs-12">
                    <!-- flowchart start -->
                    <div class="rp_flow_Chart flow-horizontal">
                        <div class="rp_flow_Chart_container">
                            <div class="d-flex justify-content-between">
                                <div class="rp_flow_Chart_content">
                                    <h5 class="col-md-10 col-xs-12">BKOR</h5>
                                </div>
                                <div class="rp_flow_Chart_content">
                                    <h5 class="col-md-10 col-xs-12">BAHAGIAN</h5>
                                </div>
                                <div class="rp_flow_Chart_content">
                                    <h5 class="col-md-10 col-xs-12">NEGERI</h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="rp_flow_Chart_content">
                                    <div class="box_content col-md-10 col-xs-12">
                                        <p id="daftar_head" class="">Daftar Permohonan</p>
                                    </div>
                                    <div class="box_content col-md-10 col-xs-12 after">
                                        <p id="rumusan_head" class=" ">Rumusan Permohonan</p>
                                    </div>
                                </div>
                                <div class="rp_flow_Chart_content">
                                    <div class="box_content col-md-10 col-xs-12 h-100 double1">
                                        <p id="bahagian_head" class="">Ulasan Teknikal & Semakan Maklumbalas Negeri</p>
                                    </div>
                                </div>
                                <div class="rp_flow_Chart_content">
                                    <div class="box_content col-md-10 col-xs-12 h-100 double2">
                                        <p id="negeri_head" class="">Ulasan Permohonan</p>
                                    </div>
                                </div>
                                <!-- <div class="rmk_flow_Chart_content">
                                    <div class="box_content bend">
                                        <p>Untuk Pengesahan</p>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="d-flex justify-content-between mt-5">
                                <div class="rmk_flow_Chart_content ml-auto">
                                    <h5 class="py-2">EPU</h5>
                                </div>
                            </div> -->

                            <div class="d-flex col-md-10 justify-content-end">
                                <div class="rp_flow_Chart_content mt-5">
                                    <!-- <h4>Lulus</h4> -->
                                    <div class=" col-md-12 col-xs-12 h-100 ">
                                        <h4 id="selesai_head">SELESAI</h4>
                                    </div>
                                </div>
                                <!-- <div class="rmk_flow_Chart_content">
                                    <div class="box_content end"><p>Dalam Proses Kelulusan</p></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="rp_flow_Chart flow-vertical">
                        <div class="rp_flow_Chart_container">
                            <div class="d-flex justify-content-between mt-5">
                                <div class="rp_flow_Chart_content">
                                    <h5>NEGERI</h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="rp_flow_Chart_content">
                                    <div class="box_content bend">
                                        <p class="">Ulasan Permohonan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-5">
                                <div class="rp_flow_Chart_content">
                                    <h5>BAHAGIAN</h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="rp_flow_Chart_content">
                                    <div class="box_content bend">
                                        <p class="yellow">Ulasan Teknikal & Semakan Maklumbalas Negeri</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-5">
                                <div class="rp_flow_Chart_content">
                                    <h5>BKOR</h5>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="rp_flow_Chart_content">
                                    <div class="box_content double3">
                                        <p class="">Daftar Permohonan</p>
                                    </div>
                                    <div class="box_content bend">
                                        <p class="">Rumusan Permohonan</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-5 ">
                                        <div class="rp_flow_Chart_content ">
                                            <!-- <h4>Lulus</h4> -->
                                            <div class="">
                                                <center>
                                                    <h4 class="mt-5">SELESAI</h4>
                                                </center>
                                            </div>
                                        </div>
                                        <!-- <div class="rmk_flow_Chart_content" style="width: 100%;">
                                        <div class="box_content end"><p>Dalam Proses Kelulusan</p></div>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="d-flex justify-content-between mt-5">
                            <div class="rmk_flow_Chart_content" style="width: 100%;">
                                <h5>pengarah/timb.pengarah bahagian</h5>
                            </div>
                            </div>
                            <div class="d-flex justify-content-between">
                            <div class="rmk_flow_Chart_content" style="width: 100%;">
                                <div class="box_content bend">
                                <p>Untuk Pengesahan</p>
                                </div>
                            </div>
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                            <div class="rmk_flow_Chart_content" style="width: 100%;">
                                <h5 class="py-2">EPU</h5>
                            </div>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                            <div class="rmk_flow_Chart_content" style="width: 100%;">
                                <h4>Lulus</h4>
                                <h4 class="mt-2">Tolak</h4>
                            </div>
                            <div class="rmk_flow_Chart_content" style="width: 100%;">
                                <div class="box_content end"><p>Dalam Proses Kelulusan</p></div>
                            </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- flowchart end -->

                    <div class="rp_rujukan_right mr-5">
                        No Rujukan
                        <button class="rp_pop_btn">
                            <img src="{{ asset('assets/images/i-icon.png') }}" alt="icon" />
                        </button>
                        <span>JPS.BKOR (S) 05/06/</span>
                        <input type="text" class="no_jukkan_input_class" id="no_rujukan1" name="no_rujukan1" value="">
                        <span>Jilid</span>
                        <input type="text" class="no_jukkan_input_class" id="no_rujukan2" name="no_rujukan2" value="">
                        <span>(</span>
                        <input type="text" class="no_jukkan_input_class" id="no_rujukan3" name="no_rujukan3" value="">
                        <span>)</span>
                    </div>
                    <hr>
    
                    <input type="hidden" id="bahagianDetailsId" name="bahagianDetailsId" value="">
    
                    <div class="ml-5 mb-4">
                        <div class="col-12 col-xs-12">
                            <label class="pemberat_title" for="">Tajuk Permohonan</label>
                            <textarea class="form-control pemberat_title1" style="width: 98%;text-transform: uppercase;" name="rp_tajuk"
                                id="rp_tajuk" cols="30" rows="1"></textarea>
                                <p id="error_rp_tajuk" style="color:red"></p>
                        </div>
                    </div>
    
                    <div class="ml-5 mb-5 row" id="bkor_div_1">
                        <div class="col-md-6 col-xs-12">
                            <label class="pemberat_title" for="">Tarikh Terima</label>
                            <input class="form-control col-md-6 col-xs-12 pemberat_title1" type="date"
                                id="rp_tarikh_permohonan" name="rp_tarikh_permohonan" value="">
                                <p id="error_rp_tarikh_permohonan" style="color:red"></p>
                        </div>
    
                        <div class="select_content col-md-6 col-xs-12">
                            <label class="pemberat_title ml-3" for="bahagian_terlibat">Bahagian Terlibat <sup>*</sup></label>
                            <div id="select_content_div" class="col-lg-12 col-xs-12 row"
                                style="position: relative; margin-bottom: 1%;">
                                <div class="form-group col-12">
                                    <div id="bahagian_terlibat_div" onclick="bahagian_terlibat_div()"
                                        class="form-group input_form_group">
                                        <select name="bahagian_terlibat" id="bahagian_terlibat" class="form-control"
                                            multiple='multiple' required onchange="pemilikChange(this);">
                                        </select>
                                        <p id="error_bahagian_terliabt" style="color:red"></p>
                                    </div>
                                    <div id="selected_bahagian_terlibat_div"
                                        style="overflow-y:scroll; height:150px;width:auto; background:rgb(255, 255, 255);position: relative;">
                                        <label class="p-2" style="font-size: 0.9rem;">Bahagian Terlibat Yang Telah Dipilih</label>
    
                                        <div id="selected_bahagian_terlibat"
                                            class="selected_bahagian_terlibat m-2 text-nowrap">
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="ml-5 d-none" id="div_bahagian_1">
                        <div class="col-md-12 col-xs-12 mb-3">
                            <label class="pemberat_title mr-3" for="">Adakah permohonan ini pernah didaftarkan/dimohon
                                sebelum ini?</label>
    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input rp_is_dimohon_yes" type="radio" name="rp_is_dimohon"
                                    id="rp_is_dimohon_yes" value="1">
                                <label class="form-check-label pemberat_title1" for="inlineRadio1">Ya</label>
                            </div>
    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input rp_is_dimohon_no" type="radio" name="rp_is_dimohon"
                                    id="rp_is_dimohon_no" value="0" checked>
                                <label class="form-check-label pemberat_title1" for="inlineRadio2">Tidak</label>
                            </div>
                        </div>
    
                        <div class="col-md-12 col-xs-12  dimohon_imej" id="dimohon_imej">
                            <div class="d-flex">
                                <div class="mr-lg-5">
                                    <label class="pemberat_title" for="">No Rujukan Surat<sup>*</sup></label>
                                    <input class="" type="text" name="no_rujukan_dimohon" id="no_rujukan_dimohon">
                                </div>
    
                              
                                    <div class=" col-6">
                                        <div class="row upload_img col-12 d-none" id="fileUploaded3">
                                            <div>
                                                <button style="float:right" id="removefile3" type="button"
                                                    class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor" class="bi bi-x"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <img id="filePreview3" style="height:45px">
                                            <label id="fileName3"></label>
                                        </div>
                                        <div class="col-md-12 col-xs-12 mb-3 " id="Uploadfile3">
                                            <div class="col-md-7 col-xs-12 form-group">
                                                <div class="upload_img">
    
                                                    <div class="" style="cursor: pointer">
                                                        <img src="{{ asset('assets/images/upload_img.png') }}"
                                                            class="d-block m-auto" alt="" />
                                                        <input name="dimohon_imej_file" type="file"
                                                            class="custom-file-input" style="cursor: pointer" id="dimohon_imej_file">
                                                        <h5>
                                                            Letakkan fail di sini atau klik untuk memuat
                                                            naik
                                                        </h5>
                                                    </div>
                                                    <p>(Saiz fail tidak melebihi 2mb)</p>
                                                </div>
                                                <p class="text-danger" id="dimohon_imej_file_error"></p>
                                            </div>
                                        </div>
                                    </div>
    
                            
    
    
    
    
                            </div>
    
                        </div>
                    </div>
    
                    <div class="ml-5 mt-3 pemberat_title2">
                        <h6>MAKLUMAT PERMOHONAN</h6>
                    </div>
                    <div class="" id="bkor_div_2">
                        <div class="ml-5 mb-5 row">
                            <div class="col-md-6 col-xs-12">
                                <label class="pemberat_title" for="">Jenis Pemohon</label>
                                <div class="d-flex align-items-center form-group">
                                <select class="form-control col-md-7 col-xs-12 pemberat_title1 mt-2" name="rp_jenis_permohon"
                                    id="rp_jenis_permohon">
                                    <option value="">-- Pilih --</option>
                                    <option value="Agensi Kerajaan">Agensi Kerajaan</option>
                                    <option value="Ahli Politik">Ahli Politik</option>
                                    <option value="Badan Bukan Kerajaan dan Lain-lain">Badan Bukan Kerajaan dan Lain-lain</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12 ">
                                <label class="pemberat_title" for="">Butiran Pemohon</label>
                                <div class="d-flex align-items-center  form-group">
                                    <select class="form-control col-md-7 col-xs-12 pemberat_title1" name="rp_butiran_permohon"
                                        id="rp_butiran_permohon">
                                        <option value="">-- Pilih --</option>
                                        <option value="Agensi pusat">Agensi pusat</option>
                                        <option value="Kementerian">Kementerian</option>
                                        <option value="Jabatan Kerajaan Pusat/Negeri">Jabatan Kerajaan Pusat/Negeri</option>
                                    </select>
                                    <!-- <textarea class="form-control col-md-8 col-xs-12 pemberat_title1 mr-3"
                                        name="rp_butiran_permohon" id="rp_butiran_permohon" cols="30" rows="1"></textarea> -->
                                    <button class="vmplus_minus" id="addBtnBp" type="button">
                                        <i class="ri-add-box-line" style="font-size: 1.8rem"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="ml-5 table_scroll">
                        <table class="table table-bordered mb-5 projek_cmn_table" id="butiran_table">
                            <thead>
                                <tr>
                                    <th scope="col">Bil</th>
                                    <th scope="col">Tarikh Surat</th>
                                    <th scope="col">No Rujukan Surat</th>
                                    <th scope="col">Jenis Pemohon</th>
                                    <th>Butiran Pemohon</th>
                                    <th>Muatnaik Lampiran</th>
                                    <th></th>
                                </tr>
                            </thead>
    
                            <tbody id="maklumat_permohon_tbody">
                            </tbody>
                        </table>
                    </div>
    
                    <div class="ml-5 mb-5 row" id="bkor_div_3">
                        <div class="row col-lg-3 col-md-6 col-12 pemberat_title mr-1 mb-2">
                            <label for="" class="col-12 pl-0">Negeri</label>
                            <select class="col-12 form-control pemberat_title1" id="select_negeri" name="select_negeri"
                                onchange="loadnegeri_parlimen_dun();">
                                <option value="">-- Pilih --</option>
                            </select>
                            <p id="error_negeriId" style="color:red"></p>
                        </div>
                        <div class="row col-lg-3 col-md-6 col-12 pemberat_title mr-1 mb-2">
                            <label for="" class="col-12 pl-0">Daerah</label>
                            <select class="col-12 form-control pemberat_title1" id="select_daerah" name="select_daerah">
                                <option value="">-- Pilih --</option>
                            </select>
                            <p id="error_daerahId" style="color:red"></p>
                        </div>
                        <div class="row col-lg-3 col-md-6 col-12 pemberat_title mr-1 mb-2">
                            <label for="" class="col-12 pl-0">Parlimen</label>
                            <select class="col-12 form-control pemberat_title1" id="select_parlimen" name="select_parlimen"
                                onchange="getdun();">
                                <option value="">-- Pilih --</option>
                            </select>
                            <p id="error_parlimenId" style="color:red"></p>
                        </div>
                        <div class="row col-lg-3 col-md-6 col-12 pemberat_title mb-2">
                            <label for="" class="col-12 pl-0">Dun</label>
                            <select class="col-12 form-control pemberat_title1" id="select_dun" name="select_dun">
                                <option value="">-- Pilih --</option>
                            </select>
                            <p id="error_dunId" style="color:red"></p>
                            </div>
                        </div>
                    </div>
    
                    <!-- <div class="ml-5 table_scroll">
                        <table class="table table-bordered mb-5 projek_cmn_table" id="negeri_table">
                            <thead >
                            <tr>
                                <th scope="col">Bil</th>
                                <th scope="col">Negeri</th>
                                <th scope="col">Daerah</th>
                                <th scope="col">Parliment</th>
                                <th scope="col">Dun</th>
                            </tr>
                            </thead>
                            <tbody id="negeriDetails">
                            </tbody>
                        </table>
                    </div> -->
    
                    <div id="diMohon" style="display:none">
                        <div class="ml-5 mt-3 pemberat_title2">
                            <h6 id="diMohonList">Adakah permohonan ini pernah didaftarkan/dimohon
                                sebelum ini?</h6>
                        </div>
    
                        <div class="ml-5 table_scroll">
                            <table class="table table-bordered mb-5 projek_cmn_table" id="diMohonTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Bahagian</th>
                                        <th scope="col">Ya/Tidak</th>
                                        <th scope="col">No Rujukan</th>
                                        <th scope="col">Lampiran</th>
                                    </tr>
                                </thead>
                                <tbody id="diMohonTbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div class="ml-5">
                        <div class="col-md-12 col-xs-12 pemberat_title row">
                            <label for="" class="col-md-2 col-12">Kos</label>
                            <div class="col-md-5 col-12 input-group mb-3 rp_span pl-0">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                                <input type="text" class="form-control rp_kos pemberat_title1 input-format-element" placeholder="0.00"
                                    aria-label="Username" aria-describedby="basic-addon1" value="0.00" id="rp_kos"
                                    name="rp_kos">
                            </div>
                        </div>
                    </div>
    
                    <div id="sejarahNegeri" style="display:none">
                        <div class="ml-5 mt-3 pemberat_title2">
                            <h6 id="sejarahNegeriHeading">PERMOHONAN OLEH NEGERI</h6>
                        </div>
    
                        <div class="ml-5 table_scroll">
                            <table class="table table-bordered mb-5 projek_cmn_table">
                                <thead>
                                    <tr>
                                        <th scope="col">Bil</th>
                                        <th scope="col">Tarikh Maklumbalas</th>
                                        <th scope="col">Bahagian</th>
                                        <th scope="col" style="width: 22%;">Isu</th>
                                        <th scope="col" style="width: 28%;">Ulasan Teknikal</th>
                                        <th scope="col" style="width: 20%;">Cadangan Penyelesaian Jangka Pendek</th>
                                        <th scope="col" style="width: 20%;">Cadangan Penyelesaian Jangka Panjang</th>
                                        <th scope="col" style="width: 20%;">Lampiran</th>
                                    </tr>
                                </thead>
                                <tbody id="sejarahNegeriTbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="sejarahBahagian" style="display:none">
                        <div class="ml-5 mt-3 pemberat_title2">
                            <h6 id="sejarahBahagianHeading">SEJARAH PERMOHONAN OLEH BAHAGIAN</h6>
                        </div>
    
                        <div class="ml-5 table_scroll">
                            <table class="table table-bordered mb-5 projek_cmn_table">
                                <thead>
                                    <tr>
                                        <th scope="col">Bil</th>
                                        <th scope="col">Tarikh Maklumbalas</th>
                                        <th scope="col">Bahagian</th>
                                        <th scope="col" style="width: 22%;">Isu</th>
                                        <th scope="col" style="width: 28%;">Ulasan Teknikal</th>
                                        <th scope="col" style="width: 20%;">Cadangan Penyelesaian Jangka Pendek</th>
                                        <th scope="col" style="width: 20%;">Cadangan Penyelesaian Jangka Panjang</th>
                                        <th scope="col" style="width: 20%;">Lampiran</th>
                                    </tr>
                                </thead>
                                <tbody id="sejarahBahagianTbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div class="m-5 " id="bkor_div_4">
                        <!-- <div class="col-md-12 col-xs-12 mb-3">
                            <label class="pemberat_title" for="">Catatan<sup>*</sup></label>
                            <textarea class="pemberat_title1 form-control" name="rp_bkor_catatan" id="rp_bkor_catatan" cols="30" rows="5"></textarea>
                        </div> -->
                    </div>
    
                    <div id="bahagianDetails">
                    </div>
                    <div class="m-5 " id="div_bahagian_2">
                        <!-- <div class="col-md-12 col-xs-12 mb-3">
                            <label class="pemberat_title" for="">Isu/Masalah<sup>*</sup></label>
                            <textarea class="pemberat_title1 form-control" name="rp_isu" id="rp_isu" cols="30"
                                rows="5"></textarea>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3">
                            <label class="pemberat_title" for="">Ulasan Teknikal<sup>*</sup></label>
                            <textarea class="pemberat_title1 form-control" name="rp_ulasan_teknikal" id="rp_ulasan_teknikal"
                                cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3">
                            <label class="pemberat_title" for="">Cadangan Penyelesaian Jangka Pendek<sup>*</sup></label>
                            <textarea class="pemberat_title1 form-control" name="rp_cadagan_jangka_pendek"
                                id="rp_cadagan_jangka_pendek" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3">
                            <label class="pemberat_title" for="">Cadangan Penyelesaian Jangka Panjang<sup>*</sup></label>
                            <textarea class="pemberat_title1 form-control" name="rp_cadagan_jangka_panjang"
                                id="rp_cadagan_jangka_panjang" cols="30" rows="5"></textarea>
                        </div> -->
    
    
    
                        <!-- <div class="col-md-7 col-xs-12 form-group">
                            <div class="upload_img col-12">
                                <div class="row col-12 d-none" id="fileUploaded2">
                                    <div>
                                        <button style="float:right" id="removefile2" type="button"
                                            class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg></button>
                                    </div>
                                    <img id="filePreview2" style="height:45px">
                                    <label id="fileName2"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3 " id="Uploadfile2">
                            <label class="pemberat_title" for="">Muatnaik Lampiran (sekiranya berkaitan)</label>
                            <div class="col-md-7 col-xs-12 form-group">
                                <div class="upload_img">
    
                                    <div class="">
                                        <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto"
                                            alt="" />
                                        <input name="bahagian_lampiran" type="file" class="custom-file-input "
                                            id="bahagian_lampiran">
                                        <h5>
                                            Letakkan fail di sini atau klik untuk memuat
                                            naik
                                        </h5>
                                    </div>
                                    <p>(Saiz fail tidak melebihi 2mb)</p>
                                </div>
                                <p class="text-danger" id="bahagian_lampiran_error"></p>
                            </div>
                        </div> -->
    
                    </div>
    
                    <div id="sejarahNegeriUlasan" style="display:none">
                        <div class="ml-5 mt-5 pemberat_title2">
                            <h6 id="headingNBUlasan">SEJARAH ULASAN DARIPADA BAHAGIAN</h6>
                        </div>
    
                        <div class="ml-5 table_scroll">
                            <table class="table table-bordered projek_cmn_table mb-5">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Bahagian</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Tarikh Catatan</th>
                                    </tr>
                                </thead>
                                <tbody id="sejarahNegeriUlasanTbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="sejarahBahagianUlasan" style="display:none">
                        <div class="ml-5 mt-5 pemberat_title2">
                            <h6>SEJARAH ULASAN DARIPADA BKOR</h6>
                        </div>
    
                        <div class="ml-5 table_scroll">
                            <table class="table table-bordered projek_cmn_table mb-5">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Tarikh Catatan</th>
                                    </tr>
                                </thead>
                                <tbody id="sejarahBahagianUlasanTbody">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sejarahBKORUlasan" style="display:none">
                        <div class="ml-5 mt-5 pemberat_title2">
                            <h6>SEJARAH ULASAN KEPADA BAHAGIAN</h6>
                        </div>
    
                        <div class="ml-5 table_scroll">
                            <table class="table table-bordered projek_cmn_table mb-5">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Bahagian</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Tarikh Catatan</th>
                                    </tr>
                                </thead>
                                <tbody id="sejarahBKORUlasanTbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div class="m-5 " id="BKOR_Selesai" style="display:none">
                        <div class="col-md-12 col-xs-12 mb-3 row">
                            <div class="col-md-6">
                                <label class="pemberat_title" for="">Rumusan Permohonan<sup>*</sup></label>
                                <textarea class="pemberat_title1 form-control" name="rumusan_permohonan" id="rumusan_permohonan" cols="10" rows="4"></textarea>
                            </div>
    
                            <div class="col-md-12 col-xs-12 my-3 " id="Uploadfile5" >
                                <label class="pemberat_title" for="rumusan_lampiran">Muatnaik Lampiran (sekiranya berkaitan)</label>
                                <div class="col-md-6 col-xs-12 form-group pl-0" >
                                    <div class="upload_img" >
    
                                        <div class="">
                                            <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto"
                                                alt="" />
                                            <input name="rumusan_lampiran" style="cursor:pointer" type="file" class="custom-file-input " `+bahagian_disabled+`
                                                id="rumusan_lampiran">
                                            <h5>
                                                Letakkan fail di sini atau klik untuk memuat
                                                naik
                                            </h5>
                                        </div>
                                        <p>(Saiz fail tidak melebihi 2mb)</p>
                                    </div>
                                    <p class="text-danger" id="rumusan_lampiran_error"></p>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 mt-3 pl-0">
                                <div class="col-md-6 col-xs-12 form-group mt-3">
                                    <div class="upload_img d-none" id="fileUploaded5">
                                        <div class="row pl-3">
                                            <div>
                                                <button style="float:right" id="removefile5" type="button"
                                                            class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor" class="bi bi-x"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg></button>
                                            </div>
                                            <img id="filePreview5" style="height:45px">
                                            <label id="fileName5"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                    <div id="submitBKOR">
                        <div class="d-flex flex-wrap justify-content-md-center">
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_batalBtnBKOR"
                                id="rp_batalBtnBKOR">Batal</button>
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_simpanBtn" id="rp_simpanBtn">Simpan</button>
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_hantarBtn" id="rp_hantarBtn">Hantar</button>
                        </div>
                    </div>
                    <div id="submitBahagian" style="display:none">
                        <div class="form-check form-check-inline m-5">
                                <input class="form-check-input bahagian_negeri_checkbox" type="checkbox" name="bahagian_negeri_checkbox" onchange="handleCheckboxChange(this);"
                                    id="bahagian_negeri_checkbox" value=""><span style="color: gray;">Permohonan disyorkan untuk dikemukakan kepada negeri</span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-md-center">
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_simpanBtnBahagian"
                                id="rp_simpanBtnBahagian">Simpan</button>
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_hantarBtnBahagian"
                                id="rp_hantarBtnBahagian">Hantar</button>
                            
                        </div>
                    </div>
                    <div id="submitNegeri" style="display:none">
                        <div class="d-flex flex-wrap justify-content-md-center">
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_simpanBtnNegeri"
                                id="rp_simpanBtnNegeri">Simpan</button>
                            <button type="button" class="mr-1 mb-2 col-md-2 rp_hantarBtnNegeri"
                                id="rp_hantarBtnNegeri">Maklumbalas Kepada Bahagian</button>
                        </div>
                    </div>
    
                    <!-- Modal -->
                    <div class="RP_modal_container">
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title pemberat_popUp_header1" style="font-size: 0.9rem"  id="exampleModalLabel">Muat Naik
                                            Lampiran</h5>
                                        <button type="button" data-bs-dismiss="modal">
                                            <i class="mdi mdi-window-close" style="font-size: 1.2em;"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body m-3">
                                        <form id="modal_form">
                                            <div id="upload_document_input">
                                                <div class="mb-2 pemberat_popUp_small">
                                                    Sila muatnaik dokumen
                                                </div>
    
                                                <div class="my-1 d-flex">
                                                    <label class="pemberat_popUp_header1" for="">Lampiran</label>
                                                    <div class="rp_pop_over info">
                                                        <button class="rp_pop_btn" id="rp_pop_btn" type="button">
                                                          <span class="iconify info_icon" data-icon="mdi-information"></span>
                                                        </button>
                                                      </div>
                                                      <div class="position-absolute rp_info1">
                                                        <div class="rp_pop_content d-none" id="rp_pop_content">
                                                          <p> Lampiran perlu dalam PDF sahaja </p>
                                                        </div>
                                                      </div>
                                                </div>
    
                                                <div class="col-md-12 col-xs-12 form-group pl-0">
                                                    <div class="upload_img col-12 ">
                                                        <div class="row col-12 d-none" id="fileUploaded1">
                                                            <div>
                                                                <button style="float:right" id="removefile1" type="button" style="cursor: pointer;"
                                                                    class="btn btn text-danger P-0"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor" class="bi bi-x"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                    </svg></button>
                                                                <div>
                                                                    <img id="filePreview1" style="height:45px">
                                                                    <label id="fileName1"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row col-12" id="Uploadfile1">
                                                            <img src="{{ asset('assets/images/upload_img.png') }}"
                                                                class="d-block m-auto" alt="" />
                                                            <input name="lampiran" type="file" style="cursor: pointer;"
                                                                class="custom-file-input d-none" id="lampiran">
    
                                                            <label for="lampiran">
                                                                <h5>
                                                                    Letakkan fail di sini atau klik untuk memuat
                                                                    naik
                                                                </h5>
                                                                <p>(Saiz fail tidak melebihi 2mb)</p>
                                                            </label>
                                                            <p class="text-danger" id="lampiran_error"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <input type="hidden" id="modal_jenisPermohonan">
                                            <input type="hidden" id="modal_butiranPermohonan">
                                            <input type="hidden" id="modal_imejName">
                                            <input type="hidden" id="modal_trId">
    
                                            <div class="mb-3 mr-3 imejKeterangan">
                                                <label class="pemberat_popUp_header1" for="">Keterangan</label>
                                                <input type="text" class="form-control pemberat_title1 col-md-12"
                                                    placeholder="Sila masukkan Imej Keterangan" id="modal_keterangan">
                                            </div>
    
                                            <div class="mb-3 mr-3">
                                                <label class="pemberat_popUp_header1" for="">No Rujukan Surat</label>
                                                <input type="text" class="form-control pemberat_title1 col-md-12"
                                                    placeholder="Sila masukkan No Rujukan Surat" id="modal_no_rujukan">
                                            </div>
                                            <div class="mb-4 mr-3">
                                                <label class="pemberat_popUp_header1" for="">Tarikh Surat</label>
                                                <input type="date" class="form-control pemberat_title1 col-md-12"
                                                    placeholder="Sila masukkan Tarikh Surat Pemohon"
                                                    id="modal_tarikh_surat">
                                            </div>
                                            <div class="col-md-12 pl-0 mr-3">
                                                <table class="table table-bordered projek_cmn_table table-borderless"
                                                    id="image_table">
                                                    <thead class="table popUp_table">
                                                        <tr class="text-center pemberat_white">
                                                            <th scope="col">Bil</th>
                                                            <th scope="col">Imej</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table pemberat_title1" id="modal_imej_tbody">
    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
    
                                    <center> <button type="button" class=" mr-1  mb-4 col-md-2 rp_simpanBtn_popUP"
                                            id="rp_simpanBtn_popUP">Simpan</button>
                                    </center>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="user_profile_footer m-0 P-3 pemberat_title1">{{ now()->year }} <img class="mr-1"
            src="{{ asset('assets/images/copyrightLogo.png') }}">NPIS - JPS</p>
</div>
<section>
    <div class="RP_modal_container">
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mb-3">
                        <h5 class="text-center pemberat_popUp_bold">PERHATIAN</h5>
                        <p class="text-center pemberat_title1" id="modal_ulasan_p">ADAKAH ANDA BERSETUJU PERMOHONAN INI AKAN DIKEMBALIKAN
                            KEPADA <b>NEGERI</b> UNTUK DIKEMASKINI SEMULA.</p>
                    </div>
                    <div class="ml-5 mr-5 mb-3">
                        <label for="" class="pemberat_red">SILA ISI CATATAN/ULASAN *</label>
                        <textarea class="form-control" name="ulasan_bahagian" id="ulasan_bahagian" cols="30"
                            rows="5"></textarea>
                    </div>
                    <div class="text-center mb-2">
                        <button class="rp_kembaliBtn mr-1 mb-2 col-md-2 pemberat_title1"
                            id="rp_tidakBtn_ulasan">Tidak</button>
                        <button class="rp_hantarBtn mr-1 mb-2 col-md-2 pemberat_title1" id="rp_yaBtn_ulasan">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="RP_modal_container">
        <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mb-3">
                        <h5 class="text-center pemberat_popUp_bold">PERHATIAN</h5>
                        <p class="text-center pemberat_title1" id="modal_ulasan_p">ADAKAH ANDA BERSETUJU PERMOHONAN INI AKAN DIKEMBALIKAN
                            KEPADA <b>BAHAGIAN</b> UNTUK DIKEMASKINI SEMULA.</p>
                    </div>
                    <div class="select_content col-md-6 col-xs-12">
                        <label class="pemberat_title ml-3" for="bahagian_kembali">Pilih Bahagian <sup>*</sup></label>
                        <div id="select_content_div" class="col-lg-12 col-xs-12 row"
                            style="position: relative; margin-bottom: 1%;">
                            <div class="form-group col-12">
                                <div id="bahagian_kembali_div"
                                    class="form-group input_form_group">
                                    <select name="bahagian_kembali" id="bahagian_kembali" class="form-control"
                                        multiple='multiple' required onchange="pemilikKembaliChange(this);">
                                    </select>
                                    <p id="error_bahagian_terliabt" style="color:red"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-5 " id="bkor_ulasan_div_4">
                        
                    </div>
                    <div class="text-center mb-2">
                        <button class="rp_kembaliBtn mr-1 mb-2 col-md-2 pemberat_title1"
                            id="rp_tidakBtn_ulasan_BKOR">Tidak</button>
                        <button class="rp_hantarBtn mr-1 mb-2 col-md-2 pemberat_title1" id="rp_yaBtn_ulasan_BKOR">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" type="button" data-bs-dismiss="modal">
                                <i class="mdi mdi-window-close" style="font-size: 1.2em;"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h5 style="text-align: center;" id="pop_up_h3">Permohonan berjaya dihantar<br></h5>
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
<!-- --------------- confirm pop-up --------- -->
<section>
    <div class="add_role_sucess_modal_container">
        <div
            class="modal fade"
            id="add_role_sucess_modal-confirm"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
        <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document">
            <div class="modal-content add_role_sucess_modal_content">
                <div class="modal-body add_role_sucess_modal_body">
                    <div class="add_role_sucess_modal_header text-end">
                        <button class="ml-auto" type="button" data-bs-dismiss="modal">
                            <i class="mdi mdi-window-close" style="font-size: 1.2em;"></i>
                        </button>
                    </div>
                    <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3>Adakah anda pasti menghantar permohonan?</h3>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup-confirm" id="tutup-confirm">Ya</button>
                            <button data-dismiss="modal" class="close-confirm" id="close-confirm">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
</section>

<!-- Mainbody_conatiner Starts -->
@include('RollingPlan.RP_BKOR.script')

@endsection