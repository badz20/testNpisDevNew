@include('perunding.maklumatPerunding.style')
@extends('layouts.perundingModule.master')

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
                MAKLUMAT PERUNDING
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
                    <a href="#" class="active"> Maklumat Perunding </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="project_register_content_container">
        <div class="card project_register_search_container mt-3">
            <div class="project_register_tab_container row">
                <div class="project_register_tab_btn_container col-2">
                    <ul>
                        <li class="active">
                            <div class="tab_image" style="width: 50%;">
                                <a href="/maklumat_perunding_jps/{{$project_id}}/{{$perolehan_id}}"><i
                                        class="bi bi-person-rolodex tab_icon_blue" style="font-size: 2.3rem;"
                                        aria-hidden="true">
                                    </i></a>
                            </div>
                            <h4>MAKLUMAT PERUNDING</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width: 50%;">
                                <a href="/prestasi/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-boxes tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                            <h4>PRESTASI KEMAJUAN</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width: 50%;">
                                <a href="/penilaian/{{$project_id}}/{{$perolehan_id}}" style="text-decoration: none"> <i
                                        class="ri ri-heart-pulse-line tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i></a>
                            </div>
                            <h4>PENILAIAN</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width: 50%;">
                                <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-cash tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i></a>
                                </a>
                            </div>
                            <h4>KEWANGAN</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-9">
                    <form>
                        <div class="brief_project_container">
                            <div class="brief_project_content">
                                <div class="brief_project_content_container">
                                    <div class="row col-12">
                                        <div class="card-body col-md-6 col-12">
                                            <input class="form-check-input" type="hidden" name="perolehan_id"
                                                id="perolehan_id" value="{{$perolehan_id}}" />
                                            <input class="form-check-input" type="hidden" name="pemantauan_id"
                                                id="pemantauan_id" value="{{$project_id}}" />
                                            <div class="mb-3 Table_perunding_body">
                                                <label class="KON_daftarKONlbl2" for="">Kod Projek</label>
                                                <input disabled class="mt-2 form-control Table_perunding_body"
                                                    type="text" name="kodProjek" id="kodProjek" value="" />
                                            </div>
                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Nama Projek</label>
                                                <textarea disabled class="mt-2 form-control Table_perunding_body"
                                                    type="text" name="namaProjek" id="namaProjek" value=""></textarea>
                                            </div>

                                            <label class=" KON_daftarKONlbl2">Kos Projek <sup></sup></label>
                                            <div class="mb-3 ml-3">
                                                <div class="row Table_perunding_body mt-2">
                                                    <span
                                                        class="input-group-text Table_perunding_span  Table_perunding_body" style="background-color: #39AFD1;color :#fff">RM</span>
                                                    <input disabled style="max-width: 82.5%" type="text"
                                                        name="kosProjek" id="kosProjek"
                                                        class="form-control col-md-10 col-10 Table_perunding_body"
                                                        value="" />
                                                </div>
                                            </div>

                                            <label for="Kategor Projek" class="col-5 p-0 KON_daftarKONlbl2">Kos Projek
                                                Pindaan<sup></sup></label>
                                            <div class="ml-3 mt-2" style="width:100%">
                                                <div class="form-group input_form_group row col-12 p-0">
                                                    <table class="table table-striped Table_perunding text-center KON_tblSejarah">
                                                        <thead
                                                            class="Table_perunding_header Table_perunding_body text-center">
                                                            <tr class="Table_perunding_span">
                                                                <th scope="col">TAHUN</th>
                                                                <th scope="col">RM</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="Table_perunding_body border-1">
                                                            <tr>
                                                                <td>2017</td>
                                                                <td>500,000.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2017</td>
                                                                <td>500,000.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Nama Perolehan</label>
                                                <input disabled class="form-control Table_perunding_body" type="text"
                                                    name="namaPerolehan" id="namaPerolehan"
                                                    value="Membangun, menguji, mentauliah & menjayajalan Sistem Kompetensi JPS Malaysia" />
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Negeri </label>
                                                <input disabled class="form-control Table_perunding_body" type="text"
                                                    name="negeri" id="negeri" value="Johor" />
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Bahagian </label>
                                                <input disabled class="form-control Table_perunding_body" type="text"
                                                    name="bahagian" id="bahagian" value="BAHAGIAN PENGURUSAN BANJIR" />
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Kaedah Perolehan </label>
                                                <input disabled class="form-control Table_perunding_body" type="text"
                                                    name="kaedahPerolehan" id="kaedahPerolehan"
                                                    value="TENDER TERBUKA KONVESIONAL" />
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Jenis Perolehan </label>
                                                <input disabled class="form-control Table_perunding_body" type="text"
                                                    name="jenisPerolehan" id="jenisPerolehan" value="Kerja" />
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Perunding</label>
                                                <input disabled class="form-control Table_perunding_body" type="text"
                                                    name="perunding" id="perunding"
                                                    value="RBM Engineering Consulting" />
                                            </div>

                                            <div class="mb-3 pemberat_title">
                                                <label class="KON_daftarKONlbl2" for="">Tarikh Surat Setuju Terima</label>
                                                <input disabled class="form-control Table_perunding_body" type="date"
                                                    name="tarikhSuratSetujuTerima" id="tarikhSuratSetujuTerima" />
                                            </div>





                                            <label class="KON_daftarKONlbl2" class="mt-3 pemberat_title" for="">Lampiran Surat Setuju
                                                Terima</label>
                                            <div class="row mb-3 ml-3 form-group">
                                                <div class="upload_img col-12">
                                                    <div class="row col-12 d-none" id="fileUploadedLsst">
                                                        <div>
                                                            <button style="float:right" id="removefileLsst"
                                                                type="button" class="btn btn text-danger P-0"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg></button>
                                                            <div>
                                                                <img id="filePreviewLsst" style="height:45px;cursor:pointer">
                                                                <label id="fileNameLsst"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 ml-3" id="UploadfileLsst" style="width: 109%">
                                                        <div class="mt-2 KONupload_img col-12 p-3"
                                                            style="margin-left: -46px">
                                                            <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                                class="d-block m-auto" alt="" />
                                                            <input name="lsst_file_name" type="file"
                                                                class="custom-file-input d-none" id="lsst_file_name">
                                                            <label for="lsst_file_name" id="">
                                                                <h5>
                                                                    Letakkan fail di sini atau klik untuk memuat
                                                                    naik
                                                                </h5>
                                                                <p>(Saiz fail tidak melebihi 2mb)</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="text-danger" id="lsst_file_name_error"></p>
                                            </div>




                                            <label class="mt-3 KON_daftarKONlbl2" for="">Terma Rujukan</label>
                                            <div class="row mb-3 ml-3 form-group">
                                                <div class="upload_img col-12">
                                                    <div class="row col-12 d-none" id="fileUploadedTr">
                                                        <div>
                                                            <button style="float:right" id="removefileTr" type="button"
                                                                class="btn btn text-danger P-0"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg></button>
                                                            <div>
                                                                <img id="filePreviewTr" style="height:45px;cursor:pointer">
                                                                <label id="fileNameTr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 ml-3" id="UploadfileTr" style="width: 109%">
                                                        <div class="mt-2 KONupload_img col-12 p-3"
                                                            style="margin-left: -46px">
                                                            <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                                class="d-block m-auto" alt="" />
                                                            <input name="Tr_file_name" type="file"
                                                                class="custom-file-input d-none" id="Tr_file_name">
                                                            <label for="Tr_file_name" id="">
                                                                <h5>
                                                                    Letakkan fail di sini atau klik untuk memuat
                                                                    naik
                                                                </h5>
                                                                <p>(Saiz fail tidak melebihi 2mb)</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="text-danger" id="Tr_file_name_error"></p>
                                            </div>

                                            <div class="row mt-3 Table_perunding_body">
                                                <div class="col-md-12 col-12">
                                                    <label class="KON_daftarKONlbl2" for="">Tarikh Perkhidmatan</label>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p class="KON_daftarKONlbl" for="">Tarikh Mula</p>
                                                    <input disabled type="date" name="tarikhPerkhidmatanMula"
                                                        id="tarikhPerkhidmatanMula"
                                                        class="form-control Table_perunding_body" />
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p class="KON_daftarKONlbl" for="">Tarikh Siap</p>
                                                    <input disabled type="date" name="tarikhPerkhidmatanTamat"
                                                        id="tarikhPerkhidmatanTamat"
                                                        class="form-control Table_perunding_body" />
                                                </div>
                                            </div>

                                            <label class="mt-3 KON_daftarKONlbl2">Tempoh Perjanjian<sup></sup></label>
                                            <div class="mb-3 Table_perunding_body">
                                                <div class="d-flex mt-2">
                                                    <input disabled type="text"
                                                        name="tempohKontrak" id="tempohKontrak"
                                                        class="form-control col-7 Table_perunding_body col-9"
                                                        value="10" />
                                                    <span
                                                        class="input-group-text Table_perunding_span Table_perunding_body" style="background-color: #39AFD1;color :#fff">Bulan</span>
                                                </div>
                                            </div>
                                            <label class="mt-2 KON_daftarKONlbl2">LAD (RM)/Hari<sup></sup></label>
                                            <div class="mb-3 ml-3 Table_perunding_body">
                                                <div class="row mt-2">
                                                    <span
                                                        class="input-group-text col-2 Table_perunding_span Table_perunding_body"  style="background-color: #39AFD1;color :#fff; font-weight: bold; display: flex; justify-content: center;">RM</span>
                                                    <input style="max-width: 295px" disabled type="text" name="lad"
                                                        id="lad" class="form-control col-10 Table_perunding_body"
                                                        value="" />

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body col-md-6 col-12">
                                            <label class="KON_daftarKONlbl2" for="Skop">Pelanjutan Tempoh Perjanjian Perunding
                                                (EOCP)<sup></sup></label>

                                            <div class="input_container mt-2" style="overflow-x: auto;width: 130%">
                                                <div class="input_fill_content">
                                                    <div class="pl-0">
                                                        <div class="card skop_card_content" style="width: 130%">
                                                            <table class="skop">
                                                                <thead class="Table_perunding_header text-center">
                                                                    <tr>
                                                                        <th class=" Table_perunding_body">Bil</th>
                                                                        <th class=" Table_perunding_body">Tarikh Tamat Perjanjian</th>
                                                                        <th class=" Table_perunding_body">Lampiran</th>
                                                                        <th>
                                                                            <button type="button" id="eocpAdd"
                                                                                class="ml-2 add_row2 eocpAdd">
                                                                                <i class="ri ri-add-box-line tab_icon_white"
                                                                                    style="font-size: 1.3rem;
                                                                                vertical-align:middle;" alt=""></i>
                                                                            </button>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="eocpTbody" class="eocpTbody text-center">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="mt-3 mb-2 KON_daftarKONlbl2" for="">Mulakan Emel
                                                Peringatan</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="emelPeringatan"
                                                    value="1" id="flexRadioDefault1" />
                                                <p class="form-check-label rbtnBulanan" for="flexRadioDefault1">
                                                    1 Bulan Sebelum Tarikh Tamat
                                                </p>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="emelPeringatan"
                                                    value="2" id="flexRadioDefault2" />
                                                <p class="form-check-label rbtnBulanan" for="flexRadioDefault2">
                                                    2 Bulan Sebelum Tarikh Tamat
                                                </p>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input Table_perunding_body" type="radio"
                                                    value="3" name="emelPeringatan" id="flexRadioDefault3" checked />
                                                <p class="form-check-label rbtnBulanan" for="flexRadioDefault3">
                                                    3 Bulan Sebelum Tarikh Tamat
                                                </p>
                                            </div>
                                            <div class="mb-3 pemberat_title" style="margin-top: 36px;">
                                                <label class="KON_daftarKONlbl2" for="">Kos Perolehan(RM)</label>
                                                <input class="form-control Table_perunding_body" value="0" type="text"
                                                    name="kosPerolehan" id="kosPerolehan" readonly/>
                                            </div>

                                            <label class="KON_daftarKONlbl2" for="Skop">Perjanjian Tambahan (Supplementary
                                                Agreement)<sup></sup></label>

                                            <div class="input_container mt-2" style="overflow-x: auto;width: 130%">
                                                <div class="input_fill_content">
                                                    <div class="pl-0">
                                                        <div class="card skop_card_content">
                                                            <table class="skop">
                                                                <thead class="Table_perunding_header text-center">
                                                                    <tr>
                                                                        <th class=" Table_perunding_body">Bil</th>
                                                                        <th class=" Table_perunding_body">Tarikh</th>
                                                                        <th class=" Table_perunding_body">Implikasi Kos
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="saAdd"
                                                                                class="ml-2 add_row2 saAdd">
                                                                                <i class="ri ri-add-box-line tab_icon_white"
                                                                                    style="font-size: 1.3rem;
                                                        vertical-align:middle;" alt=""></i>
                                                                            </button>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="saTbody" class="saTbody text-center">

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="mt-3 KON_daftarKONlbl2" for="">Bayaran Perunding</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bayaran_perunding_radio"
                                                    value="0" id="bayaran_perunding_selesai" checked/>
                                                <p class="form-check-label rbtnBulanan" for="flexRadioDefault1">
                                                    Projek Selesai
                                                </p>

                                                <input class="form-check-input" type="radio" name="bayaran_perunding_radio"
                                                    value="1" id="bayaran_perunding_tamat" />
                                                <p class="form-check-label rbtnBulanan" for="flexRadioDefault1">
                                                Projek Ditamatkan
                                                </p>
                                            </div>

                                            <div class="row mb-3 ml-3 form-group">
                                                <div class="upload_img col-12">
                                                    <div class="row col-12 d-none" id="fileUploadedBa">
                                                        <div>
                                                            <button style="float:right" id="removefileBa" type="button"
                                                                class="btn btn text-danger P-0"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg></button>
                                                            <div>
                                                                <img id="filePreviewBa" style="height:45px;cursor:pointer">
                                                                <label id="fileNameBa"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 ml-3" id="UploadfileBa" style="width:115%">
                                                        <div class="mt-2 KONupload_img col-12 p-3"
                                                            style="margin-left:-46px">
                                                            <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                                class="d-block m-auto" alt="" />
                                                            <input name="ba_file_name" type="file"
                                                                class="custom-file-input d-none" id="ba_file_name">
                                                            <label for="ba_file_name" id="">
                                                                <h5>
                                                                    Letakkan fail di sini atau klik untuk memuat
                                                                    naik
                                                                </h5>
                                                                <p>(Saiz fail tidak melebihi 2mb)</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="text-danger" id="ba_file_name_error"></p>
                                            </div>

                                            <label class="mt-2 KON_daftarKONlbl2">Jumlah Kumulatif Bayaran Perunding<sup></sup></label>
                                            <div class="mb-3 ml-3 Table_perunding_body">
                                                <div class="row mt-2">
                                                    <span
                                                        class="input-group-text col-2 Table_perunding_span Table_perunding_body"  style="background-color: #39AFD1;color :#fff; font-weight: bold; display: flex; justify-content: center;">RM</span>
                                                    <input disabled type="text" name="nilaiBayaranAkhirSelesai"
                                                        id="nilaiBayaranAkhirSelesai" value="0"
                                                        class="form-control col-10 Table_perunding_body" value="" />

                                                </div>
                                            </div>

                                            <label class="mt-2 KON_daftarKONlbl2">Penjimatan<sup></sup></label>
                                            <div class="mb-3 ml-3 Table_perunding_body">
                                                <div class="row mt-2">
                                                    <span
                                                        class="input-group-text col-2 Table_perunding_span Table_perunding_body"  style="background-color: #39AFD1;color :#fff; font-weight: bold; display: flex; justify-content: center;">RM</span>
                                                    <input disabled type="text" name="penjimatanSelesai"
                                                        id="penjimatanSelesai" value="0"
                                                        class="form-control col-10 Table_perunding_body" value="" />

                                                </div>
                                            </div>

                                            <label class="mt-3 KON_daftarKONlbl2 d-none" for="">Surat Berkaitan (Bagi Projek
                                                Ditamatkan)</label>

                                            <div class="row mb-3 ml-3 form-group d-none">
                                                <div class="upload_img col-12">
                                                    <div class="row col-12 d-none" id="fileUploadedSb">
                                                        <div>
                                                            <button style="float:right" id="removefileSb" type="button"
                                                                class="btn btn text-danger P-0"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg></button>
                                                            <div>
                                                                <img id="filePreviewSb" style="height:45px;cursor:pointer">
                                                                <label id="fileNameSb"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 ml-3" id="UploadfileSb" style="width: 115%">
                                                        <div class="mt-2 KONupload_img col-12 p-3"
                                                            style="margin-left: -48px">
                                                            <img src="{{ asset('Vm_module/assets/images/upload_img.png') }}"
                                                                class="d-block m-auto" alt="" />
                                                            <input name="sb_file_name" type="file"
                                                                class="custom-file-input d-none" id="sb_file_name">
                                                            <label for="sb_file_name" id="">
                                                                <h5>
                                                                    Letakkan fail di sini atau klik untuk memuat
                                                                    naik
                                                                </h5>
                                                                <p>(Saiz fail tidak melebihi 2mb)</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="text-danger" id="lsst_file_name_error"></p>
                                            </div>


                                            <label class="mt-2 KON_daftarKONlbl2 d-none">Nilai Bayaran Akhir<sup></sup></label>
                                            <div class="mb-3 ml-3 Table_perunding_body d-none">
                                                <div class="row mt-2">
                                                    <span
                                                        class="input-group-text col-2 Table_perunding_span Table_perunding_body"  style="background-color: #39AFD1;color :#fff; font-weight: bold; display: flex; justify-content: center;">RM</span>
                                                    <input disabled type="text" name="nilaiBayaranAkhirTamat"
                                                        id="nilaiBayaranAkhirTamat" value="0"
                                                        class="form-control col-10 Table_perunding_body" value="" />

                                                </div>
                                            </div>

                                            <label class="mt-2 KON_daftarKONlbl2 d-none">Penjimatan<sup></sup></label>
                                            <div class="mb-3 ml-3 Table_perunding_body d-none">
                                                <div class="row mt-2">
                                                    <span
                                                        class="input-group-text col-2 Table_perunding_span Table_perunding_body"  style="background-color: #39AFD1;color :#fff; font-weight: bold; display: flex; justify-content: center;">RM</span>
                                                    <input disabled type="text" name="penjimatanTamat"
                                                        id="penjimatanTamat" value="0"
                                                        class="form-control col-10 Table_perunding_body" value="" />

                                                </div>
                                            </div>
                                            <label class="mb-3 KON_daftarKONlbl2">
                                                Professional Indemnity Insurance (PII)
                                            </label><br>

                                            <label class=" KON_daftarKONlbl2" for="">No Polisi</label>
                                            <input type="text" class="form-control mb-3 mt-2 Table_perunding_body"
                                                name="noPolisi" id="noPolisi" />

                                            <label class=" KON_daftarKONlbl2" for="">Nilai Polisi (RM)</label>
                                            <input type="text" class="form-control Table_perunding_body"
                                                name="nilaiPolisi" id="nilaiPolisi" value="0" />

                                            <div class="row my-3">
                                                <div class="col-md-12 col-12">
                                                    <label class=" KON_daftarKONlbl2" for="">Tempoh
                                                        Perlindungan</label>
                                                </div>
                                                <div class="row my-2 col-md-12 p-0 ml-1">
                                                    <div class="col-md-6 col-12">
                                                        <p class="KON_daftarKONlbl" for="">Tarikh Mula
                                                        </p>
                                                        <input type="date"
                                                            class="form-control Table_perunding_body"
                                                            name="pelinduganTarikMula" id="pelinduganTarikMula" />
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <p class="KON_daftarKONlbl" for="">Tarikh Tamat
                                                        </p>
                                                        <input type="date"
                                                            class="form-control Table_perunding_body"
                                                            name="pelinduganTarikTamat" id="pelinduganTarikTamat" />
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="KON_daftarKONlbl2" for="Skop">Tempoh Perlindungan
                                                Lanjutan<sup></sup></label>

                                            <div class="input_container mt-2" style="overflow-x: auto;width:130%">
                                                <div class="input_fill_content">
                                                    <div class="pl-0">
                                                        <div class="card skop_card_content" style="width: 113%">
                                                            <table class="skop">
                                                                <thead class="Table_perunding_header text-center">
                                                                    <tr>
                                                                        <th class=" Table_perunding_body">Bil</th>
                                                                        <th class=" Table_perunding_body">Tarikh
                                                                            Mula
                                                                        </th>
                                                                        <th class=" Table_perunding_body">Tarikh
                                                                            Tamat
                                                                        </th>
                                                                        <th>
                                                                            <button type="button"
                                                                                id="tempohPerlinduganAdd"
                                                                                class="ml-2 add_row2 tempohPerlinduganAdd">
                                                                                <i class="ri ri-add-box-line tab_icon_white"
                                                                                    style="font-size: 1.3rem;
                                                        vertical-align:middle;" alt=""></i>
                                                                            </button>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tempohPerlinduganTbody"
                                                                    class="tempohPerlinduganTbody text-center">

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="ml-4 KON_h5" for="">Maklumat Koordinat GIS</label>
                                    </div>
                                    <img src="{{ asset('assets/images/satelite.png') }}" style="width: 100%;
                                    height: auto;" alt="">
                                    <div class="row ml-3 mt-3  KON_small">
                                        <label class="mr-3" for="">Latitud</label>
                                        <input class="form-control col-3 mr-5 KON_small" style="font-size: 0.8rem;" type="text" name="" id=""
                                            value="102.781996">
                                        <label class="mr-3" for="">Longitud</label>
                                        <input class="form-control col-3 KON_small" style="font-size: 0.8rem;" type="text" name="" id=""
                                            value="5..454991">
                                    </div>

                                    <div class="mt-5">
                                        <label class="ml-4 KON_h5" for="">Maklumat Lakaran GIS</label>
                                    </div>
                                    <div class="pl-4">
                                        <img src="{{ asset('assets/images/map.png') }}" alt="">
                                    </div>
                                    <div class="brief_project_content_footer">
                                        <button type="button" id="simpanMaklumat" class="simpanMaklumat">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal_sejarahPerubahan -->
                            <div class="modal fade modalEotLad" id="exampleModal3" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header Table_perunding_header">
                                            <h5 class="modal-title" style="font-size: 0.9rem" id="exampleModalLabel">
                                                SEJARAH PERUBAHAN MAKLUMAT BELANJA
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body Table_perunding_body">
                                            <div class="userlist_tab_content_header">
                                                <div class="no_of_list d-flex flex-wrap">
                                                    <p class="papar_senarai">Papar</p>
                                                    <div class="form-group m-0">
                                                        <select name="no_of_list" id="no_of_list"
                                                            class="form-control Table_perunding_body">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                    </div>
                                                    <p class="papar_senarai">entri</p>
                                                    <div class="search_senarai">
                                                        <input type="s" name="search_list" id="search_list"
                                                            class="form-control Table_perunding_body"
                                                            placeholder="Carian" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="overflow-x: auto" class="">
                                                <table class="table table-striped table-bordered">
                                                    <thead class=" text-center">
                                                        <!-- <tr>
                                    <th
                                      class="deliv_Serah"
                                      colspan="3"
                                      scope="col"
                                    ></th>
                                    <th colspan="2" scope="col">
                                      Tarikh Serah Laporan
                                    </th>
                                    <th
                                      class="deliv_Serah"
                                      colspan="12"
                                      scope="col"
                                    ></th>
                                  </tr> -->
                                                        <tr>
                                                            <th class="text-center" scope="col">
                                                                Bulan
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Tahun
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Jumlah Diperaku (RM)
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Tarikh Penilaian
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Tarikh EFT
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Tarikh Kemaskini
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Sumber Input
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Pengemaskini
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Tindakan
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                            <th class="text-center" scope="col">
                                                                Tarikh Tindakan
                                                                <button class="sort pr-3 KON_sortingBtn">
                                                                    <img src="{{ asset('assets/images/up triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                    <img src="{{ asset('assets/images/down triangle.png') }}"
                                                                        alt="sort" class="d-block" />
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>2020</td>
                                                            <td>278,000.00</td>
                                                            <td>12/02/2020</td>
                                                            <td>05/03/2020</td>
                                                            <td>15/12/2021 15:03:11</td>
                                                            <td>Secara Langsung</td>
                                                            <td>Azrif Bin Ismail</td>
                                                            <td>Tambah</td>
                                                            <td>
                                                                5/11/2021 <br />
                                                                15:48:07
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>2020</td>
                                                            <td>278,000.00</td>
                                                            <td>12/02/2020</td>
                                                            <td>05/03/2020</td>
                                                            <td>15/12/2021 15:03:11</td>
                                                            <td>Secara Langsung</td>
                                                            <td>Azrif Bin Ismail</td>
                                                            <td>Tambah</td>
                                                            <td>
                                                                5/11/2021 <br />
                                                                15:48:07
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="table_footer row flex-column align-items-end ">
                                            <div class="VM_footer">
                                                <ul class="list-items">
                                                    <li>Awal</li>
                                                    <li>Sebelum &nbsp;</li>
                                                    <ul class="row">
                                                        <li class="active_footer">1</li>
                                                    </ul>
                                                    <li> &nbsp;Seterusnya</li>
                                                    <li>Akhir</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="brief_project_content_footer">
                                            <button>Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body" style="border-radius:3px;" >
                        <div class="add_role_sucess_modal_header">
                        </div>
                        <div class="add_role_sucess_modal_body_Content text-center" id="user_pop-up">
                        <div class="add_role_sucess_modal_header col-md-12 justify-content-end">
                        <button
                            type="button"
                            class="btn-close text-right"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            style="border: transparent; background-color: transparent; color: #fff; text-align: right;"
                            ><i class="ri-close-fill" style="font-size: 1rem;"></i></button>
                        </div>
                            <label class="modal_header_prestasi mt-2 mb-2" id="save_text">Maklumat anda berjaya di simpan</label>
                            <div class="text-center brief_project_content_footer">
                                <button data-dismiss="modal" class="caribtn tutup_new p-2 pl-3 pr-3" style="font-size: 0.8rem;" type="button" id="tutup">Tutup</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('perunding.maklumatPerunding.scripts')
@endsection