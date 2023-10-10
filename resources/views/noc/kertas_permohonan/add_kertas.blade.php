@include('users.dashboard.style')
@include('noc.kertas_permohonan.style')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')
@if($id !='')
<input type="hidden" id="noc_id" value="{{$id}}">
@endif


<div class="Mainbody_content mtop ml-3">

            <x-form.spinner>
                <x-slot name="message">
                    Sila tunggu sebentar sementara data sedang dimuatkan
                </x-slot>
            </x-form.spinner>
            <div class="Mainbody_content_nav_header project_register row align-items-center">
                <div class="col-md-4 col-xs-12 ml-2">
                    <h4 class="project_list">Notis Perubahan</h4>
                </div>
                <div class="col-md-7 col-xs-12 path_nav_col">
                    <ul class="path_nav d-flex align-content-end flex-wrap">
                        <li>
                        <a href="#">
                            <span class="iconify mr-2" data-icon="mdi-chart-line" style="font-size: 1.5em;"></span>
                            Notice of Change
                            <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            JPS
                            <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            Kertas Permohonan NOC
                            <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
                        </a>
                        </li>
                        <li>
                        <a href="#" class="active">Notis Perubahan</a>
                        </li>
                    </ul>
                </div>
            </div>
          
            <div class="project_register_content_container">
                <div class="project_register_search_container mt-3">   
                <!-- flowchart start -->
                <div class="rmk_flow_Chart flow-horizontal row">
                    <div class="rmk_flow_Chart_container">
                        <div class="d-flex justify-content-between">
                            <div class="rmk_flow_Chart_content">
                                <h5>BAHAGIAN</h5>
                            </div>
                            <div class="rmk_flow_Chart_content" style="width: 20%;">
                                <h5>BKOR</h5>
                            </div>
                            <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                                <h5>KEMENTERIAN</h5>
                            </div>
                            <div class="rmk_flow_Chart_content_grey" style="width: 20%;">
                                <h5>KEMENTERIAN EKONOMI</h5>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="rmk_flow_Chart_content">
                                <div class=" box_content vmbox_content">
                                <p style="text-align: center;" id="daftar_status" class="">Daftar/Kemaskini Permohonan</p>
                                </div>
                            </div>
                            <div class="rmk_flow_Chart_content">
                                <div class="box_content vmbox_content">
                                <p id="dalam_status" class="">Dalam Semakan</p>
                                </div>
                            </div>
                            <div class="rmk_flow_Chart_content">
                                <div class="box_content vmbox_content">
                                <p style="text-align: center;" id="kementerian_status" class="">Dalam Tindakan 
                                    Kementerian </p>
                                </div>
                            </div>
                            <div class="rmk_flow_Chart_content">
                                <div class="box_content bend ">
                                <p style="text-align: center;" id="epu_status" class="">Dalam Tindakan Kementerian Ekonomi</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <div class="rmk_flow_Chart_content" style="width: 20%;">
                                <h4 class="mt-4 ml-5">Lulus</h4>
                                <h4 class="mt-4 ml-5">Tidak Lulus</h4>
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- flowchart end -->
                </div>



                <div id="ppmp_area" class="project_register_search_container mt-3">
                    <div class="project_register_search_header d-flex">
                    <h4>PERMOHONAN PERUBAHAN MAKLUMAT PROJEK</h4>
                    </div>
                    <hr>
                    <div class="NOC_perubahanMaklumat">
                        <form>
                            <div class="row m-1">
                                <div class="container1 col-md-3 col-xs-12">
                                    <label for="">RMK</label><br>
                                    <label for="">Tahun</label>
                                </div>
                                <div class="container2 col-md-3 col-xs-12">
                                    <label for="" id="rmk_head"></label><br>
                                    <label for="" id="tahun_head"></label>
                                </div>
                                <div class="container1 col-md-3 col-xs-12">
                                    <label for="">Nombor Rujukan</label><br>
                                    <label for="">Status Permohonan</label>
                                </div>
                                <div class="container2 col-md-3 col-xs-12">
                                    <label for="" id="rujukan_head"></label><br>
                                    <label for="" id="status_head">Dalam Tindakan</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <input type="hidden" id="pp_id">
                <div class="project_register_search_container mt-3">
                    <div class="project_register_search_form_container d-flex">
                    <form>
                    <div>
                        <div class="section1">
                            <div class="col-md-12 col-xs-12 "><label class="NOC_title" for="RMK">Kategori Notice Perubahan</label></div>
                        </div>
                        <div class="section2 NOC_desc">
                          <div class="row" style="width: 120%">
                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox1" value="1">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox1">Peluasan Skop</p>
                                    </div>
                              </div>
                              <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox2" value="2">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox2">Perubahan Nama Projek</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox3" value="3">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox3">Perubahan Kod Projek</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox4" value="4">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox4">Pertambahan Kos</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox5" value="5">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox5">Perubahan Lokasi Projek</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox6" value="6">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox6">Perubahan Objektif</p>
                                  </div>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox7" value="7">
                                    <p class="form-check-label NOC_desc" for="inlineCheckbox7">Wujud Butiran Baharu</p>
                                  </div>
                            </div>
                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline form-group">
                                      <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox8" value="8">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox8">Perubahan KPI</p>
                                    </div>
                              </div>

                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox9" value="9">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox9">Perubahan Output</p>
                                    </div>
                              </div>


                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox10" value="10">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox10">Wujud Semula Butiran</p>
                                    </div>
                              </div>


                              <div class="col-md-4 col-xs-12 mb-2">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input myCheckbox" onchange="whichForm(this);" type="checkbox" id="inlineCheckbox11" value="11">
                                      <p class="form-check-label NOC_desc" for="inlineCheckbox11">Perubahan Outcome</p>
                                    </div>
                              </div>

                          </div>
                      </div>
                      </div>
                      <div class="row section3 NOC_desc" style="width: 100% !important">
                        <div class="col-md-3" style="text-align:center;padding-top:2%;">
                            <p class="NOC_title" for="">Tujuan Permohonan</p>
                        </div>

                        <div class="col-md-9">
                            <fieldset style="text-align-last:center">
                                <label class="text-white bg-success p-1" style="border-radius: 5px;position: relative;top: 10px;width: 30%">patah perkataan 0 dari 500</label>
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </fieldset>
                        </div> 
                      </div>
                    </form>
                    </div>
                </div>

                <div id="maklumat_pilih_projek_form" class="project_register_search_container mt-3 d-none">
                    <div class="project_register_search_header  d-flex">
                        <h4>MAKLUMAT PILIH PROJEK</h4>
                    </div>
                    <hr>
                        <form>
                            <div class="row">
                                <div class="col-md-1">     
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" id="proId">
                                            <select name="selectProject"  class="form-control" id="selectProjectnew">
                                                <option value="" selected>--Pilih--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">   
                                </div>
                            </div>
                        </form>
                </div>

                <div id="wujud_butiran_baharu_form" class="project_register_search_container mt-3 d-none">
                        <div class="project_register_search_header  d-flex">
                          <h4>WUJUD BUTIRAN BAHARU</h4>
                        </div>
                        <hr>
                        
                        <div class="row m-1 mb-3">
                            <div class="col-md-12 col-xs-12 p-0 py-1">
                                <div class="pemberat_content_header_right text-center mt-1">
                                    <button class="pemberat_greenBtn" onclick="daftar_projek()"><i class ="ri-add-circle-fill text-white" style="font-size: 1.5em; vertical-align: middle;"></i> Daftar Projek</button>
                                </div>
                            </div>
                        </div>
                </div>

                <div id="maklumat_wujud_butiran_form" class="project_register_search_container mt-3 d-none">
                    <div class="project_register_search_header  d-flex">
                    <h4>MAKLUMAT PROJEK</h4>
                    </div>
                    <hr>
                    <form>
                        <div class="row">
                            <div class="col-md-8" style="padding-left:5%;">
                                <div class="row">
                                    <div class="col-md-2"><label class="NOC_title">Nama Projek: </label></div>
                                    <div class="col-md-10">
                                        <input type="hidden" id="proId">
                                        <select name="selectProject"  class="form-control" id="selectProject">
                                            <option value="" selected>--Pilih--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2"><label class="NOC_title"> Kod Projek: </label></div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="kod_projek" id="kod_projek_new" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="wujud_semula_form" class="project_register_search_container mt-3 d-none">
                                <div class="row project_register_search_header  d-flex">
                                <div class="col-md-6">
                                 <h4>WUJUD SEMULA BUTIRAN</h4>
                                </div>
                                <div class="col-md-5">
                                  <button class="pemberat_greenBtn" onclick="daftar_projek()" style="float:right;"><i class ="ri-add-circle-fill text-white" style="font-size: 1.5em; vertical-align: middle;"></i> Daftar Projek</button>
                                </div>
                                </div>
                                <hr>                             
                                <div class="row m-1 ">
                                    <div class="col-md-12 col-xs-12 p-0 py-1 mb-3">
                                        <div class="col-12 col-xs-12 p-0 py-1 mb-2">
                                            <div class="d-flex" style="justify-content: space-evenly">
                                                <label class="pemberat_title NOC_title"  for="RMK">Nama Projek</label>
                                                <select name="selectNameProjek" class="form-control col-md-10 col-xs-5" id="selectNameProjek">
                                                    <option value="--Pilih--">
                                                      --Pilih--
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 p-0 py-1 mb-3">
                                        <div class="col-12 col-xs-12 p-0 py-1 mb-2">
                                            <div class="d-flex" style="padding-left:4%;">
                                                <label class="pemberat_title NOC_title"  for="RMK">Kod Projek</label>
                                                <input type="text" class="form-control col-md-2 col-xs-5" name="kodProjek" id="kodProjek" value="" style="margin-left:4%;margin-right:4%;">

                                                <label class="pemberat_title NOC_title"  for="RMK">Kos Projek</label>
                                                <span class="input-group-text form-control col-xs-2 NOCmodalTitle" style="width:40px;margin-left:2%;" id="basic-addon1">RM</span>
                                                <input type="text" class="form-control col-md-2 col-xs-12" name="kosProjek" id="kosProjek">


                                                <label class="pemberat_title NOC_title"  for="RMK" style="width:16%;margin-left:2%;">Keperluan Peruntukan Tahunan Semasa</label>
                                                <span class="input-group-text form-control NOCmodalTitle" style="width:40px;margin-left:2%;" id="basic-addon1">RM</span>
                                                <input type="text" class="form-control col-md-2" name="sKeperluan" id="sKeperluan">  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-1 mb-3" style="padding-left:5%;">
                                    <div class="col-md-12 col-xs-12 p-0 py-1">
                                        <div class="row ">
                                            <div><label class="pemberat_title NOC_title"  for="RMK">Justifikasi</label></div> 
                                            <textarea name="sJustifikasi" id="sJustifikasi" cols="30" rows="3" class="form-control col-md-5" style="margin-left:4%;"></textarea>
                                        </div>
                                    </div>
                                </div>
                </div>                

                              
                <div id="ActionDiv"  class="project_register_search_container d-none">
                                <center>
                                    <div class="userlist_content_header_right col-md-12 text-center">
                                      <button type="button" class="KembaliBtnNOC" id="batal_btn">Kembali</button>
                                      <button type="button" onclick="FormSubmit()" class="SimpanBtnNOC">Simpan</button>
                                    </div>
                                </center>
                </div>
                <div id="WujidDiv"  class="project_register_search_container d-none">
                                <center>
                                    <div class="userlist_content_header_right col-md-12 text-center">
                                      <button type="button" class="KembaliBtnNOC" id="batal_btn">Batal</button>
                                      <button type="button" onclick="FormSubmit()" class="SimpanBtnNOC">Simpan</button>
                                      <button type="button" class="TambahBtnNOC" id="hanter_btn">Hantar untuk Pengesahan</button>
                                    </div>
                                </center>
                </div>

            </div>
</div>
</body>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h3 style="width:102% !important;" id="save_text">Maklumat anda berjaya di simpan<br></h3>
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
          <div class="modal fade"
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
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h5 style="text-align:center;">Adakah anda pasti mahu membatalkannya?</h5>
                            <div class="text-center">
                                <button data-dismiss="modal" class="tutup p-2" id="tutup-global" style="width:80px; background-color: #0ACf97;">Ya</button>
                                <button data-dismiss="modal" class="tutup p-2" id="close-global" style="width:80px; background-color: #fa5c7c;">Tidak</button>
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
          <div class="modal fade"
                id="popup_sucess_modal"
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
                        <div class="add_role_sucess_modal_header text-end">
                            <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close" id="close_image"></i>
                            </button>
                        </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                            <h5 style="text-align:center;">Adakah anda pasti untuk membuat <br>
                             <label id="butiran_text" class="d-none">Wujid Butiran Baharu</label>
                            <div class="text-center">
                                <button data-dismiss="modal" class="tutup close-global" id="close-global" style="background-color: #fa5c7c;">Batal</button>
                                <button data-dismiss="modal" class="tutup tutup-global" id="tutup-global" style="background-color: #0ACf97;">Ya</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
          </div>
      </div>
</section>
@include('noc.kertas_permohonan.script')
@endsection
