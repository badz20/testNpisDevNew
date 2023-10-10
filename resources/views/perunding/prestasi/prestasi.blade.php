@extends('layouts.perundingModule.master')
@include('perunding.prestasi.style')


@section('content_perundingModule')

<div class="Mainbody_content mtop">

    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner>

    <div class="Mainbody_content_nav_header project_register row">
        <div class="col-lg-5 col-md-4 col-12 Profil_Pengguna_text">
            <h4 style="text-align: left;">
                PRESTASI KEMAJUAN
            </h4>
        </div>
        <div class="col-lg-7 col-md-8 col-12 path_nav_col">
            <ul class="path_nav row">
                <li>
                    <a href="#" style="display: flex; align-items: center;">
                        <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-handshake-outline"></span>
                        Perunding
                        <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                    </a>
                </li>
                <li>
                    <a href="#" style="display: flex; align-items: center;">
                        Projek JPS & Sumber Kewangan Lain
                        <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                    </a>
                </li>
                <li>
                    <a href="/senarai_perunding_jps" style="display: flex; align-items: center;">
                        Senarai Perunding
                        <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">Prestasi Kemajuan</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="project_register_content_container">
        <div class="card project_register_search_container mt-3">
            <div class="project_register_tab_container row">
                <div class="project_register_tab_btn_container col-2">
                    <ul>
                        <li class="success active">
                            <div class="tab_image" style="width:50% !important">
                                <a href="/maklumat_perunding_jps/{{$project_id}}/{{$perolehan_id}}"><i
                                        class="bi bi-person-rolodex tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true">
                                    </i></a>
                            </div>
                            <h4>MAKLUMAT PERUNDING</h4>
                        </li>
                        <li class="active">
                            <div class="tab_image" style="width: 50%;">
                                <a href="/prestasi/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-boxes tab_icon_blue" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                            <h4>PRESTASI KEMAJUAN</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width:50% !important">
                                <a href="/penilaian/{{$project_id}}/{{$perolehan_id}}" style="text-decoration: none"> <i
                                        class="ri ri-heart-pulse-line tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i></a>
                                </a>
                            </div>
                            <h4>PENILAIAN</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width:50% !important">
                                <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-cash tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i></a>
                                </a>
                            </div>
                            <h4>KEWANGAN</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-10">

                    <div class="brief_project_container pl-3">
                        <div class="brief_project_content">
                            <div class="brief_project_content_container">
                                <div>
                                    <div class="text-right">

                                    </div>
                                    <div class="card">
                                        <div class="card-body border-0 perunding_deliverables_tab">
                                            <div class="perunding_SenaraiMasalah mt-2 mb-4 d-flex justify-content-end rbtnBulanan">
                                                
                                            </div>

                                            <div class="card project_register_search_container mt-3">
                                                <div class="card-body">
                                                    <div class="col-12 Table_perunding_body mb-2">
                                                        <label class="pemberat_subtitle" for="">Nama Projek</label>
                                                        <input class="form-control Table_perunding_body" type="text" disabled=""
                                                            value=""
                                                            name="" id="nama_project">
                                                    </div>
                                                    <div class="col-12 Table_perunding_body mb-2">
                                                        <label class="pemberat_subtitle" for="">Nama Perolehan</label>
                                                        <input class="form-control Table_perunding_body" type="text" disabled=""
                                                            value="" name="" id="nama_perolehan">
                                                    </div>

                                                    <div class="d-flex flex-wrap mb-2">
                                                        <div class="col-md-6 Table_perunding_body">
                                                            <label class="pemberat_subtitle" for="">Kod Projek</label>
                                                            <input class="form-control Table_perunding_body" type="text" disabled=""
                                                                value="" name="kod_projek" id="kod_projek">
                                                        </div>
                                                        <div class="col-md-6 Table_perunding_body">
                                                            <label class="pemberat_subtitle" for="">Nama Perunding</label>
                                                            <input class="form-control Table_perunding_body" type="text" disabled=""
                                                                value="" name="" id="nama_perunding">
                                                        </div>

                                                    </div>
                                                    <div class="d-flex flex-wrap mb-2">

                                                        <div class="col-md-6 Table_perunding_body">
                                                            <label class="pemberat_subtitle" for="">No Perjanjian</label>
                                                            <input class="form-control Table_perunding_body" type="text" disabled=""
                                                                value="" name="" id="no_perjanjian">
                                                        </div>
                                                        <div class="col-md-6 Table_perunding_body">
                                                            <label class="pemberat_subtitle" for="">Tarikh</label>
                                                            <input class="form-control Table_perunding_body" type="text" disabled=""
                                                                value="" name="" id="tarik_perunding">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="perunding_SenaraiMasalah mt-2 mb-4 d-flex justify-content-end rbtnBulanan">
                                                
                                            </div>

                                            <div class="accordion accordion-flush" id="historyPrestasi">

                                            </div>
                                            <form id="prestasiForm">
                                                <input class="form-check-input" type="hidden" name="perolehan_id"
                                                    id="perolehan_id" value="{{$perolehan_id}}" />
                                                <input class="form-check-input" type="hidden" name="pemantauan_id"
                                                    id="pemantauan_id" value="{{$project_id}}" />
                                                <div style="overflow-x: auto;max-height: 420px;">
                                                    <table class=" table table-striped table-bordered"
                                                        style="width: 300rem;border-collapse: collapse;">
                                                        <thead class="Table_perunding_header">
                                                            <tr class="Table_perunding_body">
                                                                <th rowspan="2" scope="col">Bil</th>
                                                                <th rowspan="2" scope="col">Tahun</th>
                                                                <th rowspan="2" scope="col">Bulan</th>
                                                                <th rowspan="6" scope="col" class="blue_th">
                                                                    <em>Deliverables</em>
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    Surat Peringatan
                                                                </th>
                                                                <th rowspan="2" class="blue_th" scope="col" width="8%">
                                                                    Emel Peringatan
                                                                </th>
                                                                <th colspan="2">Tarikh Mula

                                                                </th>
                                                                <th colspan="2">Tarikh Siap</th>
                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Hari Lewat/Awal
                                                                </th>
                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Peratus Jadual(%)
                                                                </th>
                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Peratus Kumulatif Jadual (%)
                                                                </th>
                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Peratus Sebenar
                                                                </th>
                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Peratus Kumulatif Sebenar (%)
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    Status Pelaksanaan
                                                                </th>
                                                                <th width="3%" rowspan="2" scope="col">Masalah</th>
                                                                <th rowspan="2" scope="col">
                                                                    Tarikh Mesyuarat Jawatan Kuasa Teknikal
                                                                </th>
                                                                <th rowspan="2" scope="col">Keputusan</th>
                                                                <th rowspan="2" scope="col">
                                                                    Prestasi Penilaian Perunding
                                                                </th>
                                                                <th rowspan="2" scope="col">EOT</th>
                                                                <th rowspan="2" scope="col">
                                                                    Lampiran EOT
                                                                </th>


                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Tarikh LAD Mula
                                                                </th>
                                                                <th rowspan="2" class="blue_th" scope="col">
                                                                    Tarikh LAD Tamat
                                                                </th>
                                                                <th width="3%" rowspan="2" class="blue_th" scope="col">
                                                                    Bilangan Hari LAD
                                                                </th>
                                                                <th width="3%" rowspan="2" scope="col">
                                                                    Jumlah LAD Terkumpul
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    Tarikh Kemaskini
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    <button data-title="Buang skop" type="button"
                                                                        id="prestasiMainAdd"
                                                                        class="minusbutton ml-2 prestasiMainAdd">
                                                                        <i
                                                                            class="ri-add-box-line ri-xl kewangan_icon_white"></i>
                                                                    </button>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jadual</th>
                                                                <th>Sebenar</th>
                                                                <th>Jadual</th>
                                                                <th>Sebenar</th>
                                                            </tr>

                                                            <!-- <tr>
                                                                <th>Jadual</th>
                                                                <th>Sebenar</th>
                                                                <th>Jadual</th>
                                                                <th>Sebenar<button class="vmpop_btn1" id="hoverTest"><i
                                                                            class="mdi mdi-information info_icon"></i>
                                                                        <div id="customTooltip3" class="hideme"
                                                                            style="position: absolute; z-index: 1;">
                                                                            <label class="lblKosPerolehan">Tarikh Serah
                                                                                Laporan</label>
                                                                        </div>
                                                                    </button></th>
                                                            </tr> -->
                                                        </thead>
                                                        <tbody id="prestasiMainTbody" class="prestasiMainTbody">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                            <div class="perunding_tempoh mt-3 col-md-9 row">
                                                <div class="col-md-6 text-right">
                                                    <span class="KONspanGrey" id="tempoh_kemajuan"
                                                        style="font-size: 0.6rem"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="KONspanGrey" id="tempoh_pelaksanaan"
                                                        style="font-size: 0.6rem"></span>
                                                </div>
                                            </div>
                                            <div class="perunding_SenaraiMasalah mt-2 col-md-12 d-flex">
                                                <div class="col-md-3 text-right">
                                                    <button
                                                        class="input-group-text btnSenaraiMasalah perunding_tableContent"
                                                        style="background-color: #0062DD; color: #fff; font-size: 0.8rem; float: right;"
                                                        id="basic-addon1" onClick="openSenaraiMasalah()">
                                                        <i class="ri-align-justify tab_icon_white"
                                                            style="font-size: 0.8rem; padding-right: 2%; vertical-align: middle;">
                                                        </i>Senarai Masalah
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card mt-5 dashline_chart">
                                                <div class="card-body">
                                                    <canvas id="myChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="brief_project_content_footer">
                                            <button type="button" id="simpanPrestasi"
                                                class="simpanPrestasi">Simpan</button>
                                        </div>


                                        <div class="card cardDikemaskini my-2 col-md-12">
                                            <div class="card-body">
                                                <div class="row sectDikemaskini">
                                                    <div class="d-flex col-md-5">
                                                        <label class="lblDikemaskini mr-4" for="">Dikemaskini
                                                            Oleh</label>
                                                        <p id="dikemaskiniOleh"></p>
                                                    </div>
                                                    <div class="d-flex col-md-6">
                                                        <label class="lblDikemaskini mr-4" for="">Bahagian</label>
                                                        <p id="dikemaskiniBahagian">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="divSej">
                                                    <button class="btnSej" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal3"> <i
                                                            class="ri-history-fill tab_icon_white"
                                                            style="font-size: 0.8rem; vertical-align: middle;"></i>
                                                        Sejarah Perubahan
                                                        Maklumat</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade modalEotLad" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content row">

            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="float: right; border: none; background-color: #fff;">
                    X
                </button><br>
                <center>
                    Adakah anda pasti untuk membuat EOT/LAD kepada perunding
                    ini?
                </center>
                <div>
                </div>
            </div>

            <div style="text-align: center;">
                <button type="button" class="batalBtn" data-bs-dismiss="modal">
                    Batal
                </button>

                <button type="button" class="yaBtn" data-bs-dismiss="modal">
                    Ya
                </button>
            </div>
            <br>
        </div>
    </div>
</div>

<!-- Modal_Prestasi Rekord Lampiran -->
<div class="modal fade modalSpPopUp modalEotLad" id="modalSpPopUp" tabindex="-1" aria-labelledby="modalSpPopUpLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header Table_perunding_header_new">
                <h5 class="modal-title ml-2" id="modalSpPopUpLabel">Muatnaik Lampiran (
                    <a href="#" style="color: blue; text-decoration: underline;" class="downloadTemplateLink"
                        id="downloadTemplateLink">
                        Muat Turun Template
                    </a> )
                </h5>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{asset('assets/images/close_img.png')}}" alt="close_img" />
                </button>
            </div>

            <input type="hidden" class="form-control" name="row_index" id="row_index">
            <div class="modal-body Table_perunding_body">
                <div style="overflow-x: auto" class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Keterangan</label>
                                <select class="form-control prestasiSpSelect" name="prestasiSpSelect"
                                    id="prestasiSpSelect">
                                    <option value="">--Pilih--</option>
                                    <option value="PERINGATAN">PERINGATAN</option>
                                    <option value="AMARAN">AMARAN</option>
                                </select>
                                <p class="text-danger" id="prestasiSpSelect_error"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tarikh</label>
                                <input type="date" class="form-control" name="prestasiSpDate" id="prestasiSpDate">
                                <p class="text-danger" id="prestasiSpDate_error"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-3 ml-3 form-group">
                <div class="col-2"></div>
                <div class="upload_img col-8">
                    <div class="row col-8 d-none" id="fileUploadedSp">
                        <div>
                            <button style="float:right" id="removefileSp" type="button"
                                class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg></button>
                            <div>
                                <img id="filePreviewSp" style="height:45px;cursor:pointer">
                                <label id="fileNameSp"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 ml-3" id="UploadfileSp" style="width:150%">
                        <div class="mt-2 KONupload_img col-8 p-3">
                            <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                class="d-block m-auto" alt="" />
                            <input name="sp_file_name" type="file"
                                class="custom-file-input d-none" id="sp_file_name">
                            <label for="sp_file_name" id="" style="padding-left:25%;cursor:pointer;">
                                <h5>
                                    Letakkan fail di sini atau klik untuk memuat
                                    naik
                                </h5>
                                <p>(Saiz fail tidak melebihi 2mb)</p>
                            </label>
                        </div>
                    </div>
                </div>
                <p class="text-danger" id="sp_file_name_error"></p>
                <div class="col-2"></div>
            </div>

            <div class="modal-body Table_perunding_body">
                <label for="" style="font-weight: 400;">Rekod Lampiran</label>
                <div style="border-bottom: 1px solid #e3d3d3;"></div>
            </div>

            <div class="modal-body Table_perunding_body">
                <div style="overflow-x: auto" class="">
                        <table class="table table_preview application_list col-12" style="width: 100%;border: 1px solid #dfd3d3;"
                            id="">
                            <thead class="Table_perunding_header">
                                <tr class="Table_perunding_body">
                                    <th class="text-center" scope="col">
                                        Bil
                                    </th>
                                    <th class="text-center" scope="col">
                                        Pilihan
                                    </th>
                                    <th class="text-center" scope="col">
                                        Tarikh

                                </th>
                                <th class="text-center" scope="col">
                                    Lampiran
                                </th>
                                <th class="text-center" scope="col">

                                </th>
                            </tr>
                        </thead>
                        <tbody id="rlTbody">

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="brief_project_content_footer">
                <button type="button" id="simpanRekordLampiran" class="simpanRekordLampiran">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal_senaraiMasalah -->
<div class="modal fade modalEotLad" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header Table_perunding_header">
                <h5 class="modal-title ml-2" id="exampleModalLabel">
                    Senarai Masalah
                </h5>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{asset('assets/images/close_img.png')}}" alt="close_img" />
                </button>
            </div>
            <div class="modal-body Table_perunding_body">
                <div style="overflow-x: auto" class="">
                    <table class="table table_preview application_list col-12" style="width: 100%"
                        id="senaraiMasalahTable">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">
                                    <button class="btn btn-primary Table_perunding_body">
                                        Masalah
                                    </button>
                                    <button class="sort pr-3 KON_sortingBtn">
                                        <img src="{{ asset('assets/images/up triangle.png') }}" alt="sort"
                                            class="d-block" />
                                        <img src="{{ asset('assets/images/down triangle.png') }}" alt="sort"
                                            class="d-block" />
                                    </button>
                                </th>
                                <th class="text-center" scope="col">
                                    Tarikh Masalah
                                    <button class="sort pr-3 KON_sortingBtn">
                                        <img src="{{ asset('assets/images/up triangle.png') }}" alt="sort"
                                            class="d-block" />
                                        <img src="{{ asset('assets/images/down triangle.png') }}" alt="sort"
                                            class="d-block" />
                                    </button>
                                </th>
                                <th class="text-center" scope="col">
                                    <button class="btn btn-primary Table_perunding_body">
                                        Status Masalah
                                    </button>
                                    <button class="sort pr-3 KON_sortingBtn">
                                        <img src="{{ asset('assets/images/up triangle.png') }}" alt="sort"
                                            class="d-block" />
                                        <img src="{{ asset('assets/images/down triangle.png') }}" alt="sort"
                                            class="d-block" />
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="senaraiMasalahTbody">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="brief_project_content_footer">
                <button type="button" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal_sejarahPerubahan -->
<div class="modal fade modalEotLad" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header Table_perunding_header">
                <h5 class="modal-title" style="font-size: 0.8rem" id="exampleModalLabel">
                    SEJARAH PERUBAHAN MAKLUMAT BELANJA
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body Table_perunding_body">

                <div style="overflow-x: auto" class="">
                    <table class="table table-striped table-bordered" id="sejarahPrestasiTable">
                        <thead class="">
                            <tr>
                                <th class="text-center" scope="col">
                                    Bil
                                </th>
                                <th class="text-center" scope="col">
                                    Tarikh
                                </th>
                                <th class="text-center" scope="col">
                                    Nama

                                </th>
                                <th class="text-center" scope="col">
                                    Bahagian
                                </th>
                                <th class="text-center" scope="col">
                                    Perubahan
                                </th>
                            </tr>
                        </thead>
                        <tbody id="sejarahPrestasiTbody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="brief_project_content_footer">
                <button type="button" class="btn-close" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal_sejarahPerubahan -->
</div>
<!-- Mainbody_conatiner Starts -->
</div>

<!-- Modal -->
<div class="vmadd_role_sucess_modal_container">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header vmmodal_header">
                    <h5 class="modal-title ml-2" id="exampleModalLabel">Butiran Makmal</h5>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6 col-xs-12 d-flex flex-wrap">
                            <label class=" col-md-6 col-xs-12" for="">Tarikh Cadangan Makmal<sup>*</sup></label>
                            <input disabled class="form-control col-md-6 col-xs-12" type="date" name="" id=""
                                value="Tender Terbuka">
                        </div>
                        <div class="col-md-6 col-xs-12 d-flex flex-wrap">
                            <label class=" col-md-6 col-xs-12" for="">Lokasi Makmal<sup>*</sup></label>
                            <input disabled class="form-control col-md-6 col-xs-12" type="text" name="" id=""
                                value="JPS Negeri">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-xs-12 d-flex flex-wrap">
                            <label class=" col-md-6 col-xs-12" for="">Tarikh Makmal Sebenar<sup>*</sup></label>
                            <input disabled class="form-control col-md-6 col-xs-12" type="date" name="" id=""
                                value="Tender Terbuka">
                        </div>
                        <div class="col-md-6 col-xs-12 d-flex flex-wrap">
                            <label class=" col-md-6 col-xs-12" for="">Tarikh Lawatan Tapak<sup>*</sup></label>
                            <input disabled class="form-control col-md-6 col-xs-12" type="date" name="" id=""
                                value="JPS Negeri">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-xs-12 d-flex flex-wrap">
                            <label class=" col-md-6 col-xs-12" for="">Tahun Pelaksanaan Makmal<sup>*</sup></label>
                            <input disabled class="form-control col-md-6 col-xs-12" type="text" name="" id=""
                                value="Tahun">
                        </div>

                    </div>

                    <label class="ml-2 " for="">Senarai Fasilitator<sup>*</sup></label>
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
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody id="tbody6">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="" class="form-control" id="">
                                                <option value="">
                                                    Abdul Halim Bin Abdul Jalil
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="" class="form-control" id="">
                                                <option value="">
                                                    J48
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="" class="form-control" id="">
                                                <option value="">
                                                    Ketua Fasilitator
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            Unit Perancang Ekonomi
                                        </td>
                                        <td>
                                            <button class="vmplus_minus"><img
                                                    src="{{ asset('assets/images/minus.png') }}"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <select name="" class="form-control" id="">
                                                <option value="">
                                                    Amalia Binti Shamsudin
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="" class="form-control" id="">
                                                <option value="">
                                                    J41
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="" class="form-control" id="">
                                                <option value="">
                                                    Fasilitator
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            Unit Perancang Ekonomi
                                        </td>
                                        <td>
                                            <button class="vmplus_minus"><img
                                                    src="{{ asset('assets/images/minus.png') }}"></button>
                                        </td>

                                    </tr>
                                </tbody>
                                <td> <input class="form-control" type="text" name="" id=""></td>
                                <td>
                                    <select class="form-control">
                                        <option>-- Pilih --</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="" id="">
                                        <option value="">Sila Pilih</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option>Sila Pilih</option>
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <button class="vmplus_minus"><img
                                            src="{{ asset('assets/images/minus_add.png') }}"></button>
                                </td>
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
    <!-- <p class="user_profile_footer m-0 P-3 pemberat_title1">2023<i
            class="ri-copyright-line ri-lg user_profile_icon mx-1" style="vertical-align: middle"></i>NPIS - JPS</p> -->

</div>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content"
                    style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body" style="border-radius:3px;">
                        <div class="add_role_sucess_modal_header">
                        </div>
                        <div class="add_role_sucess_modal_body_Content text-center" id="user_pop-up">
                            <div class="add_role_sucess_modal_header col-md-12 justify-content-end">
                                <button type="button" class="btn-close text-right" data-bs-dismiss="modal"
                                    aria-label="Close"
                                    style="border: transparent; background-color: transparent; color: #fff; text-align: right;"><i
                                        class="ri-close-fill" style="font-size: 1rem;"></i></button>
                            </div>
                            <label class="modal_header_prestasi mt-2 mb-2" id="save_text">Maklumat anda berjaya di
                                simpan</label>
                            <label class="modal_header_prestasi" id="save_text">Sila isi Prestasi Penilaian Perunding
                                di<br>
                                Tab Penilaian</label>
                            <div class="text-center brief_project_content_footer">
                                <button data-dismiss="modal" class="caribtn tutup_new p-2 pl-3 pr-3"
                                    style="font-size: 0.8rem;" type="button" id="tutup_new">Tutup</button>
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
        <div class="modal fade" id="add_role_sucess_modal1" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content"
                    style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body" style="border-radius:3px;">
                        <div class="add_role_sucess_modal_header">
                        </div>
                        <div class="add_role_sucess_modal_body_Content text-center" id="user_pop-up">
                            <div class="add_role_sucess_modal_header col-md-12 justify-content-end">
                                <button type="button" class="btn-close text-right" data-bs-dismiss="modal"
                                    aria-label="Close"
                                    style="border: transparent; background-color: transparent; color: #fff; text-align: right;"><i
                                        class="ri-close-fill" style="font-size: 1rem;"></i></button>
                            </div>
                            <label class="modal_header_prestasi mt-2 mb-2" id="save_text">Maklumat anda berjaya di
                                simpan</label>
                            <div class="text-center brief_project_content_footer">
                                <button data-dismiss="modal" class="caribtn tutup_new1 p-2 pl-3 pr-3"
                                    style="font-size: 0.8rem;" type="button" id="tutup_new1">Tutup</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>

    <!-- Modal -->
    <div class="vmadd_role_sucess_modal_container">
        <div class="modal fade modalEotLad" id="add_masalah_modal" tabindex="-1" aria-labelledby="addMasalahModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header vmmodal_header">
                        <h5 class="modal-title ml-2" id="addMasalahModalLabel">Tambahan Masalah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <input type="hidden" name="masalah_id" id="masalah_id" value="" name="masalah_id" />
                            <input type="hidden" name="tarikh_masalah" id="tarikh_masalah" />
                            <div class="col-md-12 col-xs-12 d-flex flex-wrap">
                                <label class=" col-md-3 col-xs-12" for="">Catatan<sup>*</sup></label>
                                <textarea class="form-control col-md-9 col-xs-12" name="masalahCatatan"
                                    id="masalahCatatan" value="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="nageri_footer mb-3">
                            <button type="button" data-bs-dismiss="modal" id="simpanMasalah"
                                class="simpanMasalah">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('perunding.prestasi.scripts')
@include('perunding.prestasi.load_old_scripts')
@endsection