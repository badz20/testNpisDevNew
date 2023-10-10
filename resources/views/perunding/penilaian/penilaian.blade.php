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
                PENILAIAN
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
                    <a href="#" class="active">Penilaian</a>
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
                        <li class="success active">
                            <div class="tab_image" style="width:50% !important">
                                <a href="/prestasi/{{$project_id}}/{{$perolehan_id}}"> <i
                                        class="bi bi-boxes tab_icon_white" style="font-size: 2.3rem;"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                            <h4>PRESTASI KEMAJUAN</h4>
                        </li>
                        <li class="active">
                            <div class="tab_image" style="width:50% !important">
                                <a href="/penilaian/{{$project_id}}/{{$perolehan_id}}" style="text-decoration: none"> <i
                                        class="ri ri-heart-pulse-line tab_icon_blue" style="font-size: 2.3rem;"
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
                <div class="col-9">
                    <div class="card" style="background-color: white;">
                        <div class="card-body KON_small">
                            <div class="project_register_tab_content_container col-12">
                                <label for="">Keterangan</label>
                                <select class="form-control KON_small col-md-6 penilaianDeliverable"
                                    name="penilaianDeliverable" id="penilaianDeliverable" onchange="
                                    loadPenilaian(this.value)" style="font-size: 0.8rem;">
                                </select>
                                <div style="overflow-x: auto;width:120%" class="mt-5">
                                    <table class="table table-bordered">
                                        <thead class="Table_perunding_header">
                                            <tr>
                                                <th class="text-center" rowspan="2" scope="col">
                                                    Kriteria
                                                </th>
                                                <th class="text-center" colspan="4" scope="col">Markah Prestasi 
                                                    <button class="vmpop_btn" id="hoverTest" type="button">
                                                        <i class="mdi mdi-information info_icon"></i>
                                                    </button>
                                                    <div class="vmpop_over info">
                                                        <div id="customTooltip" class="vmpop_content d-none"
                                                            style="position: absolute; z-index: 1; left: 70%; background-color: #fff;">
                                                            <table
                                                                style="text-align: center; border: #000 1px; table-layout: auto; width: 500px;">
                                                                <thead style=" font-size: 0.6rem; background-color: #f1f1f1;">
                                                                    <th>Markah Keseluruhan (%)</th>
                                                                    <th>Gred Keseluruhan</th>
                                                                    <th>Ulasan</th>
                                                                </thead>
                                                                <tbody style="font-size: 0.6rem;">
                                                                    <tr>
                                                                        <td>
                                                                            91-100
                                                                        </td>
                                                                        <td>Sangat Baik</td>
                                                                        <td>Perunding Pilihan</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>76 - 90</td>
                                                                        <td>Baik</td>
                                                                        <td>Secara Umum Perunding Boleh Diterima</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>61 - 75</td>
                                                                        <td>Sederhana</td>
                                                                        <td>Perunding Boleh Diterima Dengan Syarat</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>0 - 60</td>
                                                                        <td>Lemah</td>
                                                                        <td>Perunding yang Tidak Disyorkan</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr class="text-center">
                                                <th class="col-2">Lemah</th>
                                                <th class="col-2">Sederhana</th>
                                                <th class="col-2">Baik</th>
                                                <th class="col-2">Sangat Baik</th>
                                            </tr>
                                        </thead>
                                        <tbody style=" font-size: 0.8rem;">
                                            <tr id="JadualPelaksanaan">
                                                <td>1. Mematuhi Jadual Pelaksanaan</td>
                                                <td class="text-center"><input type="checkbox" value="0"
                                                        name="JadualPelaksanaanTd" id="JadualPelaksanaanTd0"></td>
                                                <td class="text-center"><input type="checkbox" value="1"
                                                        name="JadualPelaksanaanTd" id="JadualPelaksanaanTd1"></td>
                                                <td class="text-center"><input type="checkbox" value="2"
                                                        name="JadualPelaksanaanTd" id="JadualPelaksanaanTd2"></td>
                                                <td class="text-center"><input type="checkbox" value="3"
                                                        name="JadualPelaksanaanTd" id="JadualPelaksanaanTd3"></td>
                                            </tr>
                                            <tr id="SkopPerkhidmatan">
                                                <td>2. Mematuhi Skop Perkhidmatan</td>
                                                <td class="text-center"><input type="checkbox" name="SkopPerkhidmatanTd"
                                                        value="0" id="SkopPerkhidmatanTd0"></td>
                                                <td class="text-center"><input type="checkbox" name="SkopPerkhidmatanTd"
                                                        value="1" id="SkopPerkhidmatanTd1"></td>
                                                <td class="text-center"><input type="checkbox" name="SkopPerkhidmatanTd"
                                                        value="2" id="SkopPerkhidmatanTd2"></td>
                                                <td class="text-center"><input type="checkbox" name="SkopPerkhidmatanTd"
                                                        value="3" id="SkopPerkhidmatanTd3"></td>
                                            </tr>
                                            <tr id="PengurusanSumber">
                                                <td>3. Pengurusan Sumber</td>
                                                <td class="text-center"><input type="checkbox" name="PengurusanSumberTd"
                                                        id="PengurusanSumberTd0" value="0"></td>
                                                <td class="text-center"><input type="checkbox" name="PengurusanSumberTd"
                                                        id="PengurusanSumberTd1" value="1"></td>
                                                <td class="text-center"><input type="checkbox" name="PengurusanSumberTd"
                                                        id="PengurusanSumberTd2" value="2"></td>
                                                <td class="text-center"><input type="checkbox" name="PengurusanSumberTd"
                                                        id="PengurusanSumberTd3" value="3"></td>
                                            </tr>
                                            <tr id="KeupayaanTeknikal">
                                                <td>4. Keupayaan Teknikal</td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="KeupayaanTeknikalTd" id="KeupayaanTeknikalTd0" value="0">
                                                </td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="KeupayaanTeknikalTd" id="KeupayaanTeknikalTd1" value="1">
                                                </td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="KeupayaanTeknikalTd" id="KeupayaanTeknikalTd2" value="2">
                                                </td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="KeupayaanTeknikalTd" id="KeupayaanTeknikalTd3" value="3">
                                                </td>
                                            </tr>
                                            <tr id="KualitiKerja">
                                                <td>5. Kualiti Kerja</td>
                                                <td class="text-center"><input type="checkbox" name="KualitiKerjaTd"
                                                        id="KualitiKerjaTd0" value="0"></td>
                                                <td class="text-center"><input type="checkbox" name="KualitiKerjaTd"
                                                        id="KualitiKerjaTd1" value="1"></td>
                                                <td class="text-center"><input type="checkbox" name="KualitiKerjaTd"
                                                        id="KualitiKerjaTd2" value="2"></td>
                                                <td class="text-center"><input type="checkbox" name="KualitiKerjaTd"
                                                        id="KualitiKerjaTd3" value="3"></td>
                                            </tr>
                                            <tr id="Kerjasama">
                                                <td>6. Kerjasama</td>
                                                <td class="text-center"><input type="checkbox" name="KerjasamaTd"
                                                        id="KerjasamaTd0" value="0"></td>
                                                <td class="text-center"><input type="checkbox" name="KerjasamaTd"
                                                        id="KerjasamaTd1" value="1"></td>
                                                <td class="text-center"><input type="checkbox" name="KerjasamaTd"
                                                        id="KerjasamaTd2" value="2"></td>
                                                <td class="text-center"><input type="checkbox" name="KerjasamaTd"
                                                        id="KerjasamaTd3" value="3"></td>
                                            </tr>
                                            <tr id="PeruntukanDiluluskan">
                                                <td>7. Mematuhi Peruntukan Diluluskan</td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="PeruntukanDiluluskanTd" id="PeruntukanDiluluskanTd0"
                                                        value="0"></td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="PeruntukanDiluluskanTd" id="PeruntukanDiluluskanTd1"
                                                        value="1"></td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="PeruntukanDiluluskanTd" id="PeruntukanDiluluskanTd2"
                                                        value="2"></td>
                                                <td class="text-center"><input type="checkbox"
                                                        name="PeruntukanDiluluskanTd" id="PeruntukanDiluluskanTd3"
                                                        value="3"></td>
                                                </td>
                                            </tr>
                                            <tr id="Pengawasan">
                                                <td>8. Pengawasan/Penyeliaan(Jika Berkaitan) </br>
                                                <input class="form-check-input tidak_checkbox" type="checkbox" name="tidak_checkbox" style="margin-left: 1px;"
                                                        onchange="handleCheckboxTidakChange(this);" id="tidak_checkbox" value=""><span
                                                        style="color: gray;margin-left:20px">Tidak Berkaitan</span>
                                                </td>
                                                <td class="text-center"><input type="checkbox" name="PengawasanTd"
                                                        id="PengawasanTd0" value="0"></td>
                                                <td class="text-center"><input type="checkbox" name="PengawasanTd"
                                                        id="PengawasanTd1" value="1"></td>
                                                <td class="text-center"><input type="checkbox" name="PengawasanTd"
                                                        id="PengawasanTd2" value="2"></td>
                                                <td class="text-center"><input type="checkbox" name="PengawasanTd"
                                                        id="PengawasanTd3" value="3"></td>
                                                </td>
                                            </tr>


                                        </tbody>
                                        <tfoot style="background-color: #F0ECEC; font-size: 0.8rem;">
                                            <tr>
                                                <td>JUMLAH</td>
                                                <td class="text-center" id="jumlahLemah" value="">0</td>
                                                <td class="text-center" id="jumlahSederhana" value="">0</td>
                                                <td class="text-center" id="jumlahBaik" value="">0</td>
                                                <td class="text-center" id="jumlahSangatBaik" value="">0</td>
                                            </tr>
                                            <tr>
                                                <td>JUMLAH KESELURUHAN</td>
                                                <td class="text-center" colspan="4" id="jumlahKeseluruhan" value="">0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>PENILAIAN PRESTASI KESELURUHAN</td>
                                                <td class="text-center" colspan="4" id="penilaianKeseluruhan" value="">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <label class="mt-3" for=""><b>DISYORKAN UNTUK PROJEK/KAJIAN AKAN DATANG</b></label>
                                <div class="d-flex">
                                    <div class="form-check mr-5">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="1"
                                            id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="0"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                                <textarea class="KON_small form-control mt-1" style="font-size:0.8rem" name="catatan" id="catatan" cols="30"
                                    rows="5">
                                </textarea>
                                <div class="brief_project_content_footer">
                                    <button type="button" id="simpanPenilaian" class="simpanPenilaian">Simpan</button>
                                </div>

                                <div style="overflow-x: auto; width:120%">
                                    <table class="table table-striped table-bordered">
                                        <thead class="Table_perunding_header">
                                            <tr class="perunding_tableContent">
                                                <th>Bil</th>
                                                <th>Jenis Keterangan</th>
                                                <th>Tarikh Penilaian</th>
                                                <th>Markah Prestasi (%)</th>
                                                <th>Penilaian Prestasi Keseluruhan</th>

                                            </tr>
                                        </thead>
                                        <tbody id="penilaianTbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card cardDikemaskini mt-2 col-md-12">
                        <div class="card-body">
                            <div class="row sectDikemaskini">
                                <div class="d-flex col-md-5">
                                    <label class="lblDikemaskini mr-4" for="">Dikemaskini Oleh</label>
                                    <p id="dikemaskiniOleh"></p>
                                </div>
                                <div class="d-flex col-md-6">
                                    <label class="lblDikemaskini mr-4" for="">Bahagian</label>
                                    <p id="dikemaskiniBahagian">

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
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 0.8rem!important;">
                    SEJARAH PERUBAHAN MAKLUMAT BELANJA
                </h5>
                <button type="button" data-bs-dismiss="modal">
                    <i class="mdi mdi-window-close icon_white" style="font-size: 1.5em;"></i>
                </button>
            </div>
            <div class="modal-body Table_perunding_body">

                <div style="overflow-x: auto" class="">
                    <table class="table table-striped table-bordered" id="sejarahPrestasiTable" style="width:100% !important;">
                        <thead class="" style="font-size: 0.8rem!important;">
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
                        <tbody id="sejarahPrestasiTbody" style="font-size: 0.8rem!important;">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="brief_project_content_footer">
                <button type="button"  class="btn-close" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@include('perunding.penilaian.scripts')
@endsection