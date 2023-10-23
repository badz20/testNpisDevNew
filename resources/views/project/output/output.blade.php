@include('project.output.style')
@extends('layouts.main.master_responsive')

@section('content_main')

<x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
</x-form.spinner>
<!-- Mainbody_conatiner Starts -->
<div class="Mainbody_conatiner ml-auto">
 
  <div class="Mainbody_content mtop">
    <div class="Mainbody_content_nav_header project_register align-items-center row">
      <div class="col-lg-5 col-xs-12">
        <h4 class="ml-2">Daftar Permohonan Projek</h4>
      </div>
      <div class="col-lg-6 col-xs-12 path_nav_col">
        <ul class="path_nav row">
          <li>
            <a href="#" class="text-info" style="display: flex; align-items: center;">
              <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-briefcase-variant"></span>
              Permohonan Projek
              <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
            </a>
          </li>
          <li>
            <a href="#" class="active text-secondary"> Daftar Projek </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="mr-5" style="float:right;" >
      <x-form.print></x-form.print>
    </div>
    
    <div class="project_register_tab_container">
      <div class="project_register_tab_btn_container col-2">
        @include('project.side-sections', ['active' => 'output'])
      </div>
      <div class="project_register_tab_content_container col-10">
        {{-- Start RMK Flow Chart in Horizontal --}}
        <div class="rmk_flow_Chart flow-horizontal">
          <div class="rmk_flow_Chart_container d-none" id="indicator-daerah">
              @include('project.daerah_indicator')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view">
              @include('project.negeri_view_indicator')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view">
              @include('project.bahagian_view_indicator')
          </div>
        </div> 
        {{-- End RMK Flow Chart in Horizontal --}}

        {{-- Start RMK Flow Chart in Vertical --}}
        <div class="rmk_flow_Chart flow-vertical">

          <div class="rmk_flow_Chart_container d-none" id="indicator-daerah-vertical">
              @include('project.daerah_indicator_vertical')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view-vertical">
              @include('project.negeri_view_indicator_vertical')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view-vertical">
              @include('project.bahagian_view_indicator_vertical')
          </div>
        </div>
        {{-- End RMK Flow Chart in Vertical --}}

        <form id="outputprojectform">
          <input type="hidden" id="api_url" value={{env('API_URL')}}>
          <input type="hidden" value="{{$id}}" id="project_id"/>
          <input type="hidden" value="{{$id}}" id="getrmkdetails" />
          <div class="brief_project_container rmk">
            <div class="RMK_project_header d-flex">
              <h4 class="py-4">Output Projek</h4>
            </div>
            <div class="brief_project_content">
              <div class="brief_project_content_container px-0 pt-4">
                <div class=" mx-0 mb-2">
                  <div class="d-flex col-2 p-0">
                    <label for="" class="outcome_custom_width align-self-start" style="padding-top: 1rem!important;">Output Projek</label>
                    <button type="button" id="outputBtn" class="outBtn"  style="border:none !important;background: transparent !important;">
                      <i class="ri-add-box-line ri-2x"></i>
                    </button>  
                  </div>
                  <div id="mainoutputcontainer">
                    <div class="row output_outcome_data mb-2" id="outputdiv">
                      <div class="col-lg-1 col-xs-12">
                        <label class="outputCount my-1" value="1" id="mainNumbering">1.</label>
                      </div>
                      <div class="col-lg-5 col-xs-12 p-0">
                        <div class="input_form_group col-12 my-1">
                          <textarea type="text" class="form-control" id="txtoutputcomment" cols="3" rows="2"></textarea>
                          {{-- <input type="text" class="form-control" id="txtoutputcomment" /> --}}
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-xs-12 p-0">
                        <div class="row m-0 align-items-center output_gap">
                          <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                            >Kuantiti/Bilangan
                          </label>
                          <div
                            class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                          >
                            <input
                              type="number"
                              class="form-control px-2"
                              value="" 
                              id="txtoutputkuantiti"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-xs-8 p-0">
                        <div class="row m-0 align-items-center output_gap">
                          <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                            >Unit
                          </label>
                          <div
                            class="form-group input_form_group my-1 col-lg-10 col-xs-12">
                            <select type="text" class="form-control px-2" id="outputunit">
                            <option value="">--Pilih--</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-1 col-xs-12 pt-2">
                        <button class="outcome_minus" style="border:none !important;background: transparent !important; float: right;">
                          <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="RMK_project_header d-flex">
              <h4 class="py-4">Outcome Projek</h4>
            </div>
            <div class="brief_project_content">
              <div class="brief_project_content_container px-0 pt-4">
                <div class="mx-0">
                  <div class="d-flex col-2 p-0">
                    <label for="" class="outcome_custom_width align-self-start" style="padding-top: 1rem!important;">Outcome Projek</label>
                    <button type="button" id="outcomeBtn" class="outBtn"  style="border:none !important;background: transparent !important;">
                      <i class="ri-add-box-line ri-2x"></i>
                    </button>  
                  </div>
                  <div id="mainoutcomecontainer">
                    <div class="row output_outcome_data mb-2"  id="outcomediv">
                      <div class="col-lg-1 col-xs-12">
                        <label class="outputCount my-1" value="1" id="secNumbering">1.</label>
                      </div>
                      <div class="col-lg-5 col-xs-12 p-0">
                        <div class="input_form_group col-12 my-1">
                          <textarea type="text" class="form-control" id="txtoutcomecomment" cols="3" rows="2"></textarea>
                          {{-- <input type="text" class="form-control" id="txtoutputcomment" /> --}}
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12 p-0">
                        <div class="row m-0 align-items-center output_gap">
                          <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                            >Kuantiti/Bilangan
                          </label>
                          <div
                            class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                          >
                            <input
                              type="number"
                              class="form-control px-2"
                              value="" 
                              id="txtoutcomekuantiti"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-xs-8 p-0">
                        <div class="row m-0 align-items-center output_gap">
                          <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                            >Unit
                          </label>
                          <div
                            class="form-group input_form_group m-0 col-lg-10 col-xs-12">
                            <select type="text" class="form-control px-2" id="outcomeunit">
                            <option value="">--Pilih--</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-1 col-xs-12 pt-2">
                        <button class="outcome_minus" style="border:none !important;background: transparent !important; float: right;"> 
                          <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                        </button>
                      </div>
                    </div>                   
                    
                  </div>
              </div>
            </div>
            <div class="RMK_project_header d-flex">
              <h4 class="py-4">Indeks Prestasi Utama (KPI)</h4>
              <button
                      type="button"
                        class="add_pengguna"
                        data-target="#Tambah_data_modal"
                        data-toggle="modal"
                        style="border:none !important;background: transparent !important;"
                      >
                      <i class="ri-add-box-line ri-2x"></i>
              </button>
            </div>
            <div class="outcome_table_container table_scroll">
            <table class="outcome table" id="table">
                <thead>
                  <tr>
                    <th rowspan="2">Bil</th>
                    <th rowspan="2">Kuantiti/ Bilangan</th>
                    <th rowspan="2">Unit</th>
                    <th rowspan="2">Penerangan</th>
                    <th colspan="6" class="text-center borders">
                      Sasaran
                    </th>
                    <th rowspan="2">Tindakan</th>
                  </tr>

                  <tr></tr>
                </thead>
                <tbody id="grid_body">
                  <tr class="border mt-1" id="first_body">
                    
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="brief_project_content_footer">
            <button type="button" id="simpan">Simpan</button>
            <button type="button" id="projectOutputnext" style="background-color: #0ACF97">
                <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'negeri'])}}">Seterusnya</a>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Mainbody_conatiner Starts -->
</div>

<!-- modal -->
<section>
<div class="Tambah_modal_container">
  <div
    class="modal spaced_modal fade"
    id="Tambah_data_modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
  <x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
</x-form.spinner>

    <div
      class="modal-dialog modal-dialog-centered Tambah_modal_dialog"
      role="document"
    >
      <div class="modal-content Tambah_modal_content">
        <div class="Tambah_modal_header d-flex justify-content-between">
          <h5>Tambah KPI</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
          </button>
        </div>
        <div class="modal-body Tambah_modal_body">
          <p class="box">Sila Isi Maklumat di bawah</p>
          <form  action="" name="myform" class="pt-3">
            <div class="row m-0">
              <div class="form-group col-lg-6 col-xs-12 pl-0">
                <div class="row m-0">
                  <label for="nama" class="col-lg-5 col-xs-12 pl-0">Kuantiti/Bilangan</label>
                  <input  type="number" min="0" class="form-control col-lg-7 col-xs-12" name="kuantity" id="kuantity" placeholder="0" value=""/>
                </div>
                <p id="kuantity_error" class="error_kpi"></p>
              </div>
              <div class="form-group col-lg-6 col-xs-12 pl-0">
                <div class="row m-0">
                  <label for="unit" class="col-lg-3 col-xs-12 pl-0">Unit</label>
                  <select id="unit" name="unit" class="form-control col-lg-8 col-xs-12 custom-margin2">
                    <option value="0" disabled selected hidden>--Pilih--</option>
                  </select>
                  <p id="unit_error" class="error_kpi"></p>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="form-group col-12 pl-0">
                <div class="form-group">
                  <div class="row m-0">
                    <label for="Penerangan " class="col-lg-2 col-12 pl-0">Penerangan</label>
                    <div class="col-lg-10 col-12">
                      <textarea class="form-control col-12 custom-margin" name="penerangan" id="penerangan"></textarea>
                    </div>
                    <p id="penerangan_error" class="error_kpi_pena"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tambah_table_container">
              <label for="tambah_table " class="">Sasaran</label>
              <div class="table_scroll">
                <table class="tambah_table table" id="mytable">
                  <thead>
                    <tr></tr>
                  </thead>
                  <tbody id="table_body">
                    <tr id="pop-tr">
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
          <div class="Tambah_modal_footer text-center">
            <button type="button" id="simpan_pop" name="simpan_pop">
              Simpan
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="Tambah"></div>
</section>
<!-- -----------------------------------edit------------------- -->
<section>
<div class="Tambah_modal_container">

  <div
    class="modal spaced_modal fade"
    id="Tambah_data_modal_edit"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-backdrop="static" data-keyboard="false"
  >
  <x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner>

    <div
      class="modal-dialog modal-dialog-centered Tambah_modal_dialog"
      role="document"
    >
      <div class="modal-content Tambah_modal_content">
        <div class="Tambah_modal_header d-flex justify-content-between">
          <h5>Kemaskini KPI</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span class="iconify" data-icon="mdi-window-close" id="close_edit_pop"></span>
          </button>
        </div>
        <div class="modal-body Tambah_modal_body">
          <p class="box">Sila Isi Maklumat di bawah</p>
          <form  action="" name="editmyform" class="pt-3">
            <input type="hidden" name="edit_id" id="edit_id" value="">
            <div class="row m-0">
              <div class="form-group col-lg-6 col-12 pl-0">
                <div class="row m-0">
                  <label for="nama" class="col-lg-5 col-12 pl-0">Kuantiti/Bilangan</label>
                  <input  type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}"  class="form-control col-lg-7 col-12" name="edit_kuantity" id="edit_kuantity" value=""/>
                </div>
                <p id="edit_kuantity_error" class="error_kpi"></p>
              </div>
              <div class="form-group col-lg-6 col-12 pl-0">
                <div class="row m-0">
                  <label for="unit" class="col-lg-3 col-xs-12 pl-0">Unit</label>
                  <select id="edit_unit" name="edit_unit" class="form-control col-lg-8 col-xs-12 custom-margin2">
                    <option value="0" disabled selected hidden>--Pilih--</option>
                  </select>
                  <p id="edit_unit_error" class="error_kpi"></p>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="form-group col-12 pl-0">
                <div class="form-group">
                  <div class="row m-0">
                    <label for="Penerangan " class="col-lg-2 col-12 pl-0">Penerangan</label>
                    <div class="col-lg-10 col-12">
                      <textarea class="form-control col-12 custom-margin" name="edit_penerangan" id="edit_penerangan"></textarea>
                    </div>
                    <p id="edit_penerangan_error" class="error_kpi_pena"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tambah_table_container">
              <label for="tambah_table " class="">Sasaran</label>
              <div class="table-responsive">
                <table class="tambah_table table" id="edit_mytable">
                  <thead>
                    <tr></tr>
                  </thead>
                  <tbody id="edit_table_body">
                    <tr id="edit_pop-tr">
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
          <div class="Tambah_modal_footer text-center">
            <button type="button" id="edit_simpan_pop" name="edit_simpan_pop">
              Simpan
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="Tambah"></div>
</section>
<!-- ------------------- end --------------------------------- -->
<section>
            <div class="add_role_sucess_modal_container">
                <div
                class="modal fade"
                id="add_role_sucess_modal-confirm"
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
                    <div class="add_role_sucess_modal_header d-flex justify-content-end m-2">
                      <button type="button" data-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="mdi-window-close" id="close_edit_pop"></span>
                      </button>
                    </div>
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                        <h3>Adakah anda pasti untuk memadam KPI ini?</h3>
                        <div class="text-center">
                            <button data-dismiss="modal" class="tutup-confirm" id="tutup-confirm">Ya</button>
                            <button data-dismiss="modal" class="close-confirm" id="close-confirm">Tidak</button>
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
          id="add_role_sucess_modal"
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
              <div class="add_role_sucess_modal_header d-flex justify-content-end">
                <button type="button" data-dismiss="modal" aria-label="Close">
                  <span class="iconify" data-icon="mdi-window-close" id="close_edit_pop"></span>
                </button>
              </div>
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>KPI telah berjaya dipadamkan</h3>
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
  <div class="project_register_form_modal_container">
    <div
      class="modal spaced_modal fade"
      id="vms_modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true" data-backdrop="static" data-keyboard="false"
    >
      <div
        class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
        role="document"
      >
        <div class="modal-content project_register_form_modal_content">
          <div class="project_register_form_modal_header d-flex justify-content-end m-2">
            <button type="button" data-dismiss="modal" aria-label="Close">
              <span class="iconify" data-icon="mdi-window-close" id="close_edit_pop"></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="project_register_form_modal_body_Content">
              <h5 class="vms p-0" style="text-align: center;">
              Maklumat anda berjaya disimpan
              </h5>

              <div class="btn_holder mt-3 mb-3 text-center">
                <button data-dismiss="modal" id="vm_id" class="fix_button blue TutupBtn" style="background-color: #5b64c3;">
                  Tutup
                </button>
              </div>
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
</section>
@include('project.common-scripts')
@include('project.output.script')
@endsection