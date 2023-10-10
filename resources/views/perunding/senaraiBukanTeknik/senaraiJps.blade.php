@include('perunding.senaraiJps.style')
@extends('layouts.perundingModule.master')

@section('content_perundingModule')

<div class="Mainbody_content mtop">
    <!-- <div class="Mainbody_content_nav_header project_register row align-items-center">
        <div class="col-8 col-md-6 col-xs-12">
            <h4 class="project_list">Senarai Perunding</h4>
        </div>
        <div class="col-4 col-md-6 col-xs-12 path_nav_col">
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
                    <a href="#" class="active"> Senarai Perunding</a>
                </li>
            </ul>
        </div>
    </div> -->
    <div class="Mainbody_content_nav_header row align-items-center">
            <div class="col-md-4 col-xs-12 ml-2 project_register">
              <h4 class="project_list">Senarai Perunding</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav d-flex align-content-end flex-wrap">
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
                    <a href="#" class="active"> Senarai Perunding</a>
                </li>
              </ul>
            </div>
          </div>

    <div class="project_register_content_container">
        <div class="project_register_search_container mt-3">
            <div class="project_register_search_header d-flex">
                <i class="ri-search-line ri-2x icon_header icon_yellow_bg" class="position-absolute tick"></i>
                <h4>CARIAN PROJEK</h4>
            </div>
            <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
            </div>

            <div class="project_register_search_form_container">
                <form>
                    <div class="row m-0">
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="RMK">Nama Projek</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <textarea name="" id="query_nama_projek" cols="30" rows="1" class="form-control"
                                        placeholder="" onkeyup="convertToCapital()"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Rolling Plan">Jenis Perolehan</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_jenis">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Kod Projek">Kod Projek</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_kod_projek">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Tahun Permohonan">Kaedah Perolehan</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_kaedah">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Kod Projek">Negeri</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_negeri">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Tahun Permohonan">Nama Perunding</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_nama_perunding">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Kod Projek">Bahagian</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_bahagian">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Tahun Permohonan">Status Pelaksanaan</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_status">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-0" >
                        <div class="col-md-6 col-xs-12 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12">
                                    <label class="pemberat_title" for="Rolling Plan">Kementerian</label>
                                </div>
                                <div class="col-md-9 col-xs-12 form-group">
                                    <select class="form-control" id="query_kementerian">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="resetbtn" type="button" id="resetbtn">Set Semula</button>
                        <button class="caribtn" type="button" id="caribtn">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br /><br />

    <div class="project_register_content_container">
        <div class="card project_register_search_container">
        <div class="project_register_search_header mb-1 d-flex flex-sm-row flex-column align-items-center">
            <i class="ri-file-list-line ri-2x icon_header icon_yellow_bg"></i>
                <h4 class="col-lg-10 col-md-9 mt-1 ml-1 text-secondary padding_custom" id="senarai_heading">SENARAI PERUNDING PROJEK JPS</h4>
                <button class="ml-auto userlist_content_header_right KON_downloadImg" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="icon_Blue_bg">
                        <img src="assets/images/printer.png" class="m-auto d-flex" alt="" onclick="printDataTable()" />
                    </div>
                </button>
            </div>

            <div class="table_holder">
                <table id="senaraiJpsTable" class="table table_preview application_list col-12">
                    <thead>
                        <tr class="">
                            <th class="col-1">
                                Bil
                                <!-- <button class="sort pr-3 KON_sortingBtn">
                                    <img src="assets/images/up triangle.png" alt="sort" class="d-block" />
                                    <img src="assets/images/down triangle.png" alt="sort" class="d-block" />
                                </button> -->
                            </th>
                            <th class="col-1">Kod Projek</th>
                            <th class="col-2">
                                Nama Projek
                                {{-- <button class="sort pr-3 KON_sortingBtn">
                                    <img src="assets/images/up triangle.png" alt="sort" class="d-block" />
                                    <img src="assets/images/down triangle.png" alt="sort" class="d-block" />
                                </button> --}}
                            </th>
                            <th class="col-2">
                                Kategori Projek
                                {{-- <button class="sort pr-3 KON_sortingBtn">
                                    <img src="assets/images/up triangle.png" alt="sort" class="d-block" />
                                    <img src="assets/images/down triangle.png" alt="sort" class="d-block" />
                                </button> --}}
                            </th>
                            <th class="col-2">
                                Kos Projek(RM)
                                <button class="sort pr-3 KON_sortingBtn">
                                    {{-- <img src="assets/images/up triangle.png" alt="sort" class="d-block" />
                                    <img src="assets/images/down triangle.png" alt="sort" class="d-block" />
                                </button> --}}
                            </th>

                            <th class="col-2">
                                Negeri
                                {{-- <button class="sort pr-3 KON_sortingBtn">
                                    <img src="assets/images/up triangle.png" alt="sort" class="d-block" />
                                    <img src="assets/images/down triangle.png" alt="sort" class="d-block" />
                                </button> --}}
                            </th>
                            <th class="col-1">
                                Bahagian
                                {{-- <button class="sort pr-3 KON_sortingBtn">
                                    <img src="assets/images/up triangle.png" alt="sort" class="d-block" />
                                    <img src="assets/images/down triangle.png" alt="sort" class="d-block" />
                                </button> --}}
                            </th>
                        </tr>
                    </thead>
                    <tbody id="senaraiJpsTbody" class="pemantauan_JPS_table_container">
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>





@include('perunding.senaraiBukanTeknik.scripts')
@endsection