@extends('layouts.perundingModule.master')
@include('perunding.kewangan.unjuran.style')


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
                        <a href="/kewangan/unjuran/{{$project_id}}/{{$perolehan_id}}" class="active col-md-2">Unjuran</a>
                        <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}" class="col-md-2">Rekod Bayaran</a>
                        <a href="#" class=" col-md-2">Imbuhan Balik</a>
                        <a href="#" class=" col-md-2">Yuran Perunding</a>
                        <a href="/kewangan/lejar-bayaran/{{$project_id}}/{{$perolehan_id}}" class=" col-md-2">Lejar Bayaran</a>
                        <a href="#" class=" col-md-2">Borang JPS PP</a>
                    </div>

                    <div class="card mt-5 " style="background-color: white;">
                        <div class="card-body">
                            <button type="button" class="btn btnUnjuran KON_small unjuran_btn"
                                            id="unjuran_btn">
                                            <i class="ri-add-circle-fill icon_white" style="font-size: 1.2em;"></i>
                                            Unjuran
                            </button>
                            <div class="row">
                                <!-- First Column -->
                    
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <h5 class="KON_h5_label">UNJURAN</h5>
                                    </div>

                                    <!-- Place your first table or content here -->
                                    <table class=" table table-striped table-bordered"
                                        style="border-collapse: collapse;">
                                        <thead class="Table_perunding_header text-center">
                                            <tr>
                                                <th class=" Table_perunding_body">No. Bayaran</th>
                                                <th class=" Table_perunding_body">Tahun</th>
                                                <th class=" Table_perunding_body">Bulan</th>
                                                <th class=" Table_perunding_body">Unjuran (RM)</th>
                                                <th class=" Table_perunding_body">Jumlah Unjuran Kumulatif(RM)</th>
                                                <th class=" Table_perunding_body">Prestasi Kewangan Jadual (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="unjuranTbody" class="unjuranTbody text-center">
                                        </tbody>
                                    </table>

                                    <div class="brief_project_content_footer">
                                        <button type="button" id="simpanUnjuran" class="simpanUnjuran">Simpan</button>
                                    </div>
                                </div>

                                <!-- Second Column -->
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <h5 class="KON_h5_label">RINGKASAN PERBELANJAAN</h5>

                                    </div>

                                    <!-- Place your second table or content here -->
                                    <table class=" table table-striped table-bordered"
                                        style="border-collapse: collapse;">
                                        <thead class="Table_perunding_header text-center">
                                            <tr>
                                                <th class=" Table_perunding_body">No. Bayaran</th>
                                                <th class=" Table_perunding_body">Tahun</th>
                                                <th class=" Table_perunding_body">Bulan</th>
                                                <th class=" Table_perunding_body">Jumlah Bayaran (RM)</th>
                                                <th class=" Table_perunding_body">Jumlah Terkumpul (RM)</th>
                                                <th class=" Table_perunding_body">Prestasi Kewangan Sebenar (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="rekordTbody" class="rekordTbody text-center">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card mt-5 dashline_chart">
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card cardDikemaskini my-2 col-md-12 d-none">
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
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" type="button" data-bs-dismiss="modal">
                                <i class="mdi mdi-window-close" style="font-size: 1.2em;"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h5 style="text-align: center;" id="pop_up_h3">Permohonan berjaya di Simpan<br></h5>
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

@include('perunding.kewangan.unjuran.script')
@endsection