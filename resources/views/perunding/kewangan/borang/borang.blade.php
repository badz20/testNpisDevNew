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
                        <a href="/kewangan/{{$project_id}}/{{$perolehan_id}}" class=" col-md-2">Rekod Bayaran</a>
                        <a class=" col-md-2" href="/kewangan/imbuhan-balik/{{$project_id}}/{{$perolehan_id}}">Imbuhan
                            Balik</a>
                        <a class=" col-md-2" href="/kewangan/yuran-perunding/{{$project_id}}/{{$perolehan_id}}">Yuran
                            Perunding</a>
                        <a class=" col-md-2" href="/kewangan/lejar-bayaran/{{$project_id}}/{{$perolehan_id}}">Lejar
                            Bayaran</a>
                        <a class="active col-md-2" href="/kewangan/borang-jps/{{$project_id}}/{{$perolehan_id}}">Borang
                            JPS PP</a>
                    </div>

                    <div class="card  mt-5" style="background-color: white;">

                        <div class=" card-body">
                            <h5 class="mt-5 row ml-2 KON_h5_label">PERAKUAN BAYARAN PERKHIDMATAN PERUNDING NO:
                                <p class="ml-1" style="color: red;" id="b_count">0</p>
                            </h5>
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

                            <div class="mt-5 d-flex justify-content-end">
                                <!-- <x-form.print></x-form.print> -->
                                <button class="btn btn-primary" type="button" onclick="generateDoc()" style="background-color:#39afd1;">Jana <img src="{{ asset('assets/images/download white.png') }}"/></button>
                            </div>
                            
                            <div class="d-flex flex-wrap mt-5 Table_perunding_body">
                                <label class="col-md-5 col-12 pemberat_subtitle" for="">
                                Kos Perolehan (Maklumat Perunding):</label>
                                <span class=" input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="perjanjian" aria-describedby="basic-addon1" value="0.00" style="margin-right:16%">
                            </div>
                            
                            <div class="d-flex flex-wrap mt-3 Table_perunding_body" id="suplies">

                            </div>

                            <label class="pl-3 mt-3 Table_perunding_body KON_daftarKONlbl2" for=""><b>A Yuran
                                    perunding</b></label>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5  col-12 Table_perunding_body pemberat_subtitle" for=""> Sub jumlah tuntutan perunding (Yuran Perunding, column kumulatif)</label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="yuran_kumulatif" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <label class="pl-3 mt-3 Table_perunding_body KON_daftarKONlbl2" for=""><b><u>Ditolak</u>
                                </b></label>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12 Table_perunding_body pemberat_subtitle" for="">Sub jumlah tuntutan perunding (bayaran terdahulu)</label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control Table_perunding_body col-md-4 col-9"
                                    placeholder="" aria-label="Username" id="yuran_terdhahulu" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12" for=""></label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="yuran_baki" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <label class="pl-3 mt-5 Table_perunding_body KON_daftarKONlbl2" for=""><b>B Imbuhan
                                    Balik</b></label>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12 Table_perunding_body pemberat_subtitle" for="">Sub Jumlah Imbuhan Balik (Yuran Perunding, column kumulatif)</label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="imbuhan_kumulatif" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <label class="pl-3 mt-3 Table_perunding_body KON_daftarKONlbl2" for=""><b><u>Ditolak</u>
                                </b></label>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12 Table_perunding_body pemberat_subtitle" for="">Sub Jumlah Imbuhan Balik (bayaran terdahulu)</label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="imbuhan_terdhahulu" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12" for=""></label>
                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="imbuhan_baki" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12" for="">
                                    <i class=" ri-information-fill"
                                        style="color: #0062DD; vertical-align: middle; float: right;"></i></label>
                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="tot_baki" aria-describedby="basic-addon1" value="0.00">

                            </div>
                            <label class="pl-3 mt-3 Table_perunding_body KON_daftarKONlbl2" for=""><b><u>Ditambah</u>
                                </b></label>
                            <div>
                                <label class="col-md-5 col-12 Table_perunding_body pemberat_subtitle" for="">Cukai
                                    Perkhidmatan</label>
                            </div>

                            <div class="d-flex flex-wrap mt-3 Table_perunding_body">

                                <label class="col-md-5 Table_perunding_body pemberat_subtitle" for=""> Jumlah A+B) 6% dari Jumlah
                                    A+B</label>
                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="cukai_value" aria-describedby="basic-addon1" value="0.00">
                            </div>
                            <label class="pl-3 mt-3 Table_perunding_body KON_daftarKONlbl2" for=""><b><u>Ditolak</u>
                                </b></label>
                            <div class="d-flex flex-wrap mt-3 Table_perunding_body">
                                <label class="col-md-5 col-12 Table_perunding_body pemberat_subtitle" for="">LAD</label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="lad_data" aria-describedby="basic-addon1" value="0.00">

                            </div>

                            <div class="d-flex flex-wrap mt-3">
                                <label class="col-md-5 col-12 Table_perunding_body KON_daftarKONlbl2" for="">Jumlah Bayaran
                                    Yang Disyorkan </label>

                                <span class="input-group-text Table_perunding_body Table_perunding_span"
                                    id="basic-addon1">RM</span>
                                <input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body"
                                    placeholder="" aria-label="Username" id="disyorkan" aria-describedby="basic-addon1" value="0.00">

                            </div>
                        </div>

                    </div>


                    <div class="brief_project_content_footer">
                        <button  type="button" id="simpan">Simpan</button>
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
    <p class="user_profile_footer m-0 P-3 pemberat_title1">2023<i
            class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>NPIS - JPS</p>

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
                        <label class="modal_header_prestasi" id="save_text">Maklumat anda berjaya di simpan<br></h3>
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
                <div
                class="modal fade"
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
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3>Maklumat Kewangan telah berjaya dijana</h3>
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

@include('perunding.kewangan.borang.script')
@endsection