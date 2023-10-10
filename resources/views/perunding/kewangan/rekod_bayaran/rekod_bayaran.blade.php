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
                                <a href="/prestasi/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-boxes tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                            <h4>PRESTASI KEMAJUAN</h4>
                        </li>
                        <li class="success active">
                            <div class="tab_image" style="width: 55% !important">
                                <a href="/penilaian/{{$project_id}}/{{$perolehan_id}}" style="text-decoration: none"> <i
                                        class="ri ri-heart-pulse-line tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i>
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
                        <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}" class="active col-md-2">Rekod Bayaran</a>
                        <a href="#" class=" col-md-2">Imbuhan Balik</a>
                        <a href="#" class=" col-md-2">Yuran Perunding</a>
                        <a href="/kewangan/lejar-bayaran/{{$project_id}}/{{$perolehan_id}}" class=" col-md-2">Lejar
                            Bayaran</a>
                        <a href="#" class=" col-md-2">Borang JPS PP</a>
                    </div>
                    <div class="card mt-5 " style="background-color: white;">
                        <div class="d-flex card-body justify-content-between" style="vertical-align: middle;">
                            <div>
                                <h5 class="KON_h5_label">MAKLUMAT BAYARAN</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btnUnjuran KON_small" id="bayaran_btn">
                                    <i class="ri-add-circle-fill icon_white"
                                        style="font-size: 1.2em; vertical-align: middle;"></i>
                                        Bayaran Baharu
                                </button>
                            </div>
                        </div>
                        <div class="form-check form-check-inline m-5">
                            <input class="form-check-input selesai_checkbox" type="checkbox" name="selesai_checkbox"
                                onchange="handleCheckboxSelesaiChange(this);" id="selesai_checkbox" value=""><span
                                style="color: gray;">SELESAI BAYARAN AKHIR</span>
                        </div>


                        <div class="mb-xl-5" style="overflow-x: auto" style="background-color: #FCFCFC;">
                            <table class="table table-striped table-bordered" id="table_bayaran">
                                <thead class="Table_perunding_header">
                                    <tr class="perunding_tableContent">
                                        <th>No. Bayaran</th>
                                        <th>Yuran Perunding (RM)</th>
                                        <th>Imbuhan Balik (RM)</th>
                                        <th>Cukai Perkhidmatan (RM)</th>
                                        <th>Jumlah Bayaran (RM)</th>
                                        <th>Tarikh Baucar</th>
                                        <th>No Baucar</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 0.8rem;">


                                </tbody>
                            </table>
                        </div>

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
                                Perubahan Iklim - NRECC
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
                <h5 class="modal-title" style="font-size: 0.9rem" id="exampleModalLabel">
                    SEJARAH PERUBAHAN MAKLUMAT BELANJA
                </h5>
                <button type="button" data-bs-dismiss="modal">
                    <i class="mdi mdi-window-close icon_white" style="font-size: 1.5em;"></i>
                </button>
            </div>
            <div class="modal-body Table_perunding_body">
                <div style="overflow-x: auto" class="">
                    <table class="table table-striped table-bordered" id="rekod_bayaran_table"
                        style="width:100% !important;">
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
                <div class="modal-content add_role_sucess_modal_content"
                    style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body" style="border-radius:3px;">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <label class="modal_header_prestasi mt-2 mb-2" style="text-align:center;">Adakah anda pasti
                                mahu tambah bayaran baharu?</label>
                            <div class="text-center">
                                <button data-dismiss="modal" class="tutup" id="tutup-global"
                                    style="background-color: #0ACf97; width:18%;">Ya</button>
                                <button data-dismiss="modal" class="tutup" id="close-global"
                                    style="background-color: #fa5c7c;">Tidak</button>
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
        <div class="modal fade" id="global_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h5 style="text-align:center;"> Sila kemaskini butiran sebelum <br> (Yuran Perunding dan
                                Imbuhan Balik)</h3>
                                <div class="text-center">
                                    <button data-dismiss="modal" class="tutup" id="tutup-confirm">Tutup</button>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('perunding.kewangan.rekod_bayaran.script')
@endsection