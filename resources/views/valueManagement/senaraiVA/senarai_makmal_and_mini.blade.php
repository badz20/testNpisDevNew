@include('valueManagement.senaraiVA.style')
@extends('layouts.vmmodule.master')


@section('content_vmmodule')
<div class="Mainbody_content mtop">

<x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
</x-form.spinner> 
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-8 col-md-6 col-xs-12">
              <h4 class="project_list">Senarai  Projek</h4>
            </div>
            <div class="col-4 col-md-6 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#" style="display: flex; align-items: center;">
                    <i class="ri-calculator-fill icon_blue breadcrumbs_icon mr-2" style="font-size:1.2em; vertical-align:middle;"></i>
                      Value Management
                      <i class="ri-arrow-right-s-line ri-lg icon_arrow"></i>
                  </a>
                </li>
                <li style="display: flex; align-items: center;">
                  <a href="#" class="active">Senarai Projek</a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="project_register_content_container">
            <div class="project_register_search_container mt-3">
              <div class="project_register_search_header d-flex">
                <i class="ri-search-line ri-2x icon_header icon_yellow_bg" class="position-absolute tick"></i>
                <h4>Carian Projek</h4>
              </div>
              <div class="project_register_search_form_container">
                <form method="post" id="search_form" name="myform">
                  <div class="row m-1">
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                      <div class="row align-items-center">
                        <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="RMK">RMK</label></div>
                        <div class="col-md-8 col-xs-12 form-group">
                          <select class="form-control" id="rmk-dropdown" name="rmk">
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                      <div class="row align-items-center">
                        <div class="col-md-3 col-xs-12">
                          <label class="pemberat_title" for="Rolling Plan">Tahun Projek Diluluskan</label>
                        </div>
                        <div class="col-md-9 col-xs-12 form-group">
                          <select class="form-control inNamaperanan" id="rolling-plan"  name="rolling_plan">
                          <option value="">--Pilih--</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-1">
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="Nama Projek">Nama Projek</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                        <textarea name="nama_project" id="nama_project" cols="30" rows="1" class="form-control inNamaperanan" style="font-size:0.8rem; text-transform: uppercase;"></textarea>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                      <div class="row align-items-center" >
                        <div class="col-md-3 col-xs-12">
                          <label class="pemberat_title" for="Tahun Permohonan">Tahun Pelaksanaan Makmal</label>
                        </div>
                        <div class="col-md-9 col-xs-12 form-group">
                          <select class="form-control"id="current_year" name="current_year">
                            <option value="">--Pilih--</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-1">
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                      <div class="row align-items-center">
                        <div class="col-md-3 col-xs-12">
                          <label class="pemberat_title" for="Kod Projek">Kod Projek</label>
                        </div>
                        <div class="col-md-8 col-xs-12 form-group">
                          <input type="text"
                            class="form-control inNamaperanan"
                            value=""
                            id="kod_project"
                            name="kod_project"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                      <div class="row align-items-center" >
                        <div class="col-md-3 col-xs-12">
                          <label class="pemberat_title" for="Negeri">Status Pelaksanaan Makmal</label>
                        </div>
                        <div class="col-md-9 col-xs-12 form-group">
                          <select class="form-control inNamaperanan" name="status" id="status">
                            <option value="">--Pilih--</option>
                            <option style="text-transform: uppercase;" value="21">Belum laksana</option>
                            <option style="text-transform: uppercase;" value="22">Dalam perancangan</option>
                            <option style="text-transform: uppercase;" value="23">Pengecualian</option>
                            <option style="text-transform: uppercase;" value="24">Dalam pelaksanaan</option>
                            <option style="text-transform: uppercase;" value="25">Dalam semakan</option>
                            <option style="text-transform: uppercase;" value="36">Selesai</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-1">
                    <div class="col-md-6 col-xs-12 p-0 py-1">
                      <div class="row align-items-center">
                        <div class="col-md-3 col-xs-12">
                          <label class="pemberat_title" for="Bahagian">Bahagian</label>
                        </div>
                        <div class="col-md-8 col-xs-12 form-group">
                          <select class="form-control inNamaperanan" id="bahagian" name="bahagian">
                          </select>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                 
                  <div class="text-center">
                  <button class="reset resetbtn" type="button" id="btn_reset">Set Semula</button>
                    <button class="caribtn" type="button" id="btn_cari" style="width: 10%;">Cari</button>
                  </div> 
                </form>
              </div>
            </div>
            <br><br>
            <div class="project_register_table_container">
              <div class="card project_register_search_container">
                <div class="project_register_search_header d-flex flex-sm-row flex-column align-items-center">
                  <i class="ri-file-list-line ri-2x icon_header icon_yellow_bg"></i>
                  <h4 class="col-lg-10 col-md-9 mt-1 ml-1 text-secondary padding_custom">SENARAI PROJEK</h4>
                  <div class="userlist_content_header_right">
                  <x-form.print></x-form.print>
                  </div>
              </div>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container mb-2" style="border-bottom: 3px solid #dee2e6;">
                  <button type="button" onclick="jps_user()" class="active" id="jps_btn">MAKMAL VM</button>
                  <button type="button" onclick="agensi_user()" id="agency_btn">MAKMAL MINI VA</button>
                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body p-3">
                                <table id="jps_user" style="width: 100%!important;"  class="display p-3 userlist_tab_content_table pemberat_subsubtitle table table-responsive">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th class="pemberat_subtitle">RMK</th>
                                            <th class="pemberat_subtitle">Tahun Projek Diluluskan</th>
                                            <th class="pemberat_subtitle">Tahun Pelaksanaan Makmal</th>
                                            <th class="pemberat_subtitle">Kod Projek</th>
                                            <th class="pemberat_subtitle">Nama Projek</th>
                                            <th class="pemberat_subtitle">Bahagian</th>
                                            <th class="pemberat_subtitle">Kos Projek (RM)</th>
                                            <th class="pemberat_subtitle">VA</th>  
                                            <th class="pemberat_subtitle">VE</th>  
                                            <th class="pemberat_subtitle">VR</th>              
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div> <!-- end card-body-->
                        </div>
                  </div>
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="agensi_user" style="font: size 0.8rem; width: 100%!important;" class="display p-3 userlist_tab_content_table pemberat_subsubtitle table table-responsive">
                                <thead class="text-nowrap">
                                    <tr>
                                        <th class="pemberat_subtitle">RMK</th>
                                        <th class="pemberat_subtitle">Tahun Projek Diluluskan</th>
                                        <th class="pemberat_subtitle">Tahun Pelaksanaan Makmal</th>
                                        <th class="pemberat_subtitle w-25">Kod Projek</th>
                                        <th class="pemberat_subtitle w-25">Nama Projek</th>
                                        <th class="pemberat_subtitle">Bahagian</th>
                                        <th class="pemberat_subtitle w-25">Kos Projek (RM)</th>
                                        <th class="pemberat_subtitle w-25">Status Pelaksanaan Makmal</th>  
                                        <th class="pemberat_subtitle"></th>         
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>  <!-- end card-body-->
                    </div>
                    <div class="userlist_tab_content_table_footer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
            <span>{{ now()->year }}</span>
            <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
            <span>NPIS - JPS</span>
          </div>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Mainbody_conatiner Starts -->
    </div>

    <section>
      <div class="container"></div>
    </section>

    <section>
            <div class="add_role_sucess_modal_container">
                <div
                class="modal fade"
                id="add_role_sucess_modal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
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
                        <h5 style="text-align:center;">Adakah anda pasti mahu menukar<br>Mini VA kepada VA?</h3>
                        <div class="text-center mt-3">
                            <button data-dismiss="modal" class="tutup p-2" id="tutup" style="width:80px; background-color: #0ACf97;">Ya</button>
                            <button data-dismiss="modal" class="tutup p-2" id="close" style="width:80px; background-color: #fa5c7c;">Tidak</button>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

@include('valueManagement.senaraiVA.scripts')
@endsection