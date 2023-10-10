@extends('layouts.perundingModule.master')
@include('perunding.kewangan.rekod_bayaran.style')


@section('content_perundingModule')



<div class="Mainbody_content mtop">

    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner>

    <div class="Mainbody_content_nav_header project_register row">
        <div class="col-lg-5 col-md-4 col-12 Profil_Pengguna_text">
            <h4>KEWANGAN</h4>
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
                    <a href="#" class="active">Kewangan</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="project_register_content_container">
        <div class="card project_register_search_container mt-3">

            <!-- <div class="topnav mt-5" id="myTopnav">
                <a href="#home" class="active col-md-4">VALUE ASSESSMENT (VA)</a>
                <a class=" col-md-4" href="#news">VALUE ENGINEERING (VE)</a>
                <a class=" col-md-4" href="#contact">VALUE REVIEW (VR)</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div> -->
            <div class="project_register_tab_container row">
                <div class="project_register_tab_btn_container col-2">
                    <ul>
                        <li class="success active">
                            <div class="tab_image" style="width: 55% !important">
                                <a href="/maklumat_perunding_jps/{{$project_id}}/{{$perolehan_id}}"><i
                                        class="bi bi-person-rolodex tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true">
                                    </i></a>
                            </div>
                            <h4>MAKLUMAT PERUNDING</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width: 55% !important">
                                <i class="bi bi-boxes tab_icon_white" style="font-size: 2.3rem;"
                                    aria-hidden="true"></i>
                            </div>
                            <h4>PRESTASI KEMAJUAN</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width: 55% !important">
                                <a href="/penilaian/{{$project_id}}/{{$perolehan_id}}" style="text-decoration: none"> <i
                                        class="ri ri-heart-pulse-line tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i></a>
                                </a>
                            </div>
                            <h4>PENILAIAN</h4>
                        </li>
                        <li class="active">
                            <div class="tab_image" style="width: 55% !important">
                                <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-cash tab_icon_blue" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i></a>
                                </a>
                            </div>
                            <h4>KEWANGAN</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-10">
                    <div class="topnav" id="myTopnav">
                        <a href="/kewangan/unjuran/{{$project_id}}/{{$perolehan_id}}" class="col-md-2">Unjuran</a>
                        <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}" class="col-md-2">Rekod Bayaran</a>
                        <a class="active col-md-2"
                            href="/kewangan/imbuhan-balik/{{$project_id}}/{{$perolehan_id}}">Imbuhan Balik</a>
                        <a class=" col-md-2" href="/kewangan/yuran-perunding/{{$project_id}}/{{$perolehan_id}}">Yuran
                            Perunding</a>
                        <a class=" col-md-2" href="/kewangan/lejar-bayaran/{{$project_id}}/{{$perolehan_id}}">Lejar
                            Bayaran</a>
                        <a class=" col-md-2" href="/kewangan/borang-jps/{{$project_id}}/{{$perolehan_id}}">Borang JPS
                            PP</a>
                    </div>

                    <div class="card  " style="background-color: white;">

                        <div class=" card-body">


                            <h5 class="KON_h5_label">LAMPIRAN B (2) - RINGKASAN TUNTUTAN BAYARAN YURAN
                                PERUNDING</h5>
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
                                    <div class="d-flex flex-wrap">

                                        <div class="col-md-6 Table_perunding_body">
                                            <label class="pemberat_subtitle" for="">No. Bayaran</label>
                                            <input class="form-control Table_perunding_body" type="text" disabled=""
                                                value="0" name="" id="no_bayaran">
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="input_container mt-5" id="perkera_section">
                                <div class="input_fill_content">

                                    <div class="col-md-10 col-12 pl-0">
                                        <div class="card skop_card_content">
                                            <div class="skop_content_container">
                                                <div class="error" id="error_perkara_project" style="color:red"></div>
                                                <table class="skop table m-0" id="skop">
                                                    <thead>
                                                        <tr class="row m-0 py-2">
                                                            <th class="d-flex col-2">
                                                                Bil
                                                            </th>
                                                            <th class="d-flex col-10">
                                                                Perkara
                                                                <button data-title="Tambah skop" type="button"
                                                                    class="ml-auto pop-btn" style="margin-right: 11%;"
                                                                    onclick="addPerkara()">
                                                                    <i class="ri-add-box-line ri-2x"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="skopBody">

                                                    </tbody>

                                                    <tfoot class="mt-5">
                                                        <tr class="row m-0">
                                                            <td class="col-12">
                                                                <div class="d-flex p-3 align-items-center">
                                                                    <button class="vmsimpan" type="button"
                                                                        id="simpan">Simpan</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div style="overflow-x: auto" class="mt-5">
                                    <table class="table table-bordered" id="p_table" style="width:150em !important;" >
                                        <thead class="Table_perunding_header">

                                            <tr>
                                                <th rowspan="2">Bil</th>
                                                <th class="text-center" rowspan="2" scope="col" width="9%">
                                                    Perkara
                                                </th>
                                                <th class="text-center" colspan="4" scope="col">KELULUSAN JABATAN</th>
                                                <th class="text-center" colspan="2" scope="col">TUNTUTAN TERDAHULU</th>
                                                <th class="text-center" colspan="2" scope="col">TUNTUTAN SEMASA</th>
                                                <th class="text-center" colspan="2" scope="col">KUMULATIF</th>
                                                <th class="text-center" colspan="2" scope="col">BAKI</th>

                                            </tr>
                                            <tr>
                                                <th>Unit</th>
                                                <th style="width:9%">Kuantiti</th>
                                                <th>Kadar (RM)</th>
                                                <th>Jumlah (RM)</th>
                                                <th>Kuantiti</th>
                                                <th>Jumlah (RM)</th>
                                                <th>Kuantiti</th>
                                                <th>Jumlah (RM)</th>
                                                <th>Kuantiti</th>
                                                <th>Jumlah (RM)</th>
                                                <th>Jumlah (RM)</th>

                                            </tr>

                                        </thead>
                                        <tbody id="kewangan_perkara">

                                      
                                        </tbody> 

                                    </table>
                                </div>
                        </div>
                    </div>

                    <div class="kewangan_btn_new row mt-2" id="bayaran_1" style="justify-content: center;">
                        <button id="kemaskini">Kemaskini</button>
                        <button class="ml-2" id="btn_simpan">Simpan</button>
                    </div>

                </div>



            </div>
            <div class="card cardDikemaskini my-2 col-md-12">
                <div class="card-body">
                    <div class="row sectDikemaskini">
                        <div class="d-flex col-md-5">
                            <label class="lblDikemaskini mr-4" for="">Dikemaskini Oleh</label>
                            <p>MUHAMMAD NURAIMAN BIN JOHARI</p>
                        </div>
                        <div class="d-flex col-md-6">
                            <label class="lblDikemaskini mr-4" for="">Bahagian</label>
                            <p>
                                Kementerian Sumber Asli, Alam Sekitar dan
                                Perubahan Iklim - NRECCf
                            </p>
                        </div>
                    </div>
                    <div class="divSej">
                        <button class="btnSej" data-bs-toggle="modal" data-bs-target="#exampleModal3"> <i
                                class="ri-history-fill tab_icon_white"
                                style="font-size: 0.8rem; vertical-align: middle;"></i> Sejarah Perubahan
                            Maklumat</button>
                    </div>
                </div>
            </div>
        </div>
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
                <h5 class="modal-title" style="font-size: 1rem" id="exampleModalLabel">
                    SEJARAH PERUBAHAN MAKLUMAT BELANJA
                </h5>
                <button type="button" data-bs-dismiss="modal">
                    <i class="mdi mdi-window-close icon_white" style="font-size: 1.5em;"></i>
                </button>
            </div>
            <div class="modal-body Table_perunding_body">
                <div style="overflow-x: auto" class="">
                    <table class="table table-striped table-bordered" id="rekod_bayaran_table" style="width:100% !important;">
                        <thead style="font-size: 0.8rem;">
                            <tr>
                                <th class="text-center" scope="col">Bulan</th>
                                <th class="text-center" scope="col">Tarikh</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Bahagian</th>
                                <th class="text-center" scope="col">Perubahan</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.8rem;">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="brief_project_content_footer">
                <button type="button" id="tutup_pop">Tutup</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Mainbody_conatiner Starts -->
</div>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
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
                        <label class="modal_header_prestasi mt-2 mb-2" id="save_text">Maklumat anda berjaya di simpan<br></label>
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

@include('perunding.kewangan.imbuhan_balik.script')
@include('perunding.kewangan.imbuhan_balik.perkara_script')
@endsection