@include('project.RMK.style')
@extends('layouts.main.master_responsive')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

@section('content_main')


<!-- Mainbody_conatiner Starts -->
<div class="Mainbody_conatiner ml-auto">
    
    <div class="Mainbody_content mtop">
      <div class="Mainbody_content_nav_header project_register align-items-center row">
        <div class="col-md-5 col-xs-12">
          <h4 class="ml-2">Daftar Permohonan Projek</h4>
        </div>
        <div class="col-md-6 col-xs-12 path_nav_col">
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
      
      <div class="project_register_tab_container row">
        <div class="project_register_tab_btn_container col-2">
          @include('project.side-sections', ['active' => 'rmk'])
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
          

          <form>
            <div class="brief_project_container rmk">
              <div class="RMK_project_header d-flex">
                <h4 class="py-4">Maklumat RMKe-12</h4>
              </div>
              <div class="brief_project_content">
                <div class="brief_project_content_container px-0">
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="Tema" class="col-md-2 col-xs-12 pl-0">Tema / Pemangkin Dasar <sup>*</sup></label>
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <input
                          type="text"
                          class="form-control"
                          value="" 
                          id="txtstrategiTemaPemangkinDasar" 
                          readonly="readonly"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="Bab" class="col-md-2 col-xs-12 pl-0"
                        >Bab <sup>*</sup></label>
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <input
                          type="text"
                          class="form-control"
                          value="" 
                          id="txtstrategibab" 
                          readonly="readonly"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div
                      class="input_fill_content row m-0 align-items-center"
                    >
                      <label for="Bidang_Keutamaan" class="col-md-2 col-xs-12 pl-0"
                        >Bidang Keutamaan <sup>*</sup></label
                      >
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <input
                          type="text"
                          class="form-control"
                          value="" 
                          id="txtstrategiBidangKeutamaan" 
                          readonly="readonly"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div
                      class="input_fill_content row m-0 align-items-center"
                    >
                      <label for="Tema" class="col-md-2 col-xs-12 pl-0"
                        >Outcome Nasional <sup>*</sup></label
                      >
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <input
                          type="text"
                          class="form-control"
                          value="" 
                          id="txtstrategiOutcomeNasional" 
                          readonly="readonly"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="Strategi" class="m-0 col-md-2 col-xs-12 pl-0"
                        >Strategi <sup>*</sup></label
                      >
                      <div class="form-group input_form_group m-0 col-md-8 col-xs-12 pl-0">
                        <input type="hidden" id="hiddenstrategi" value="" />
                        <input
                          type="text"
                          class="form-control"
                          value="" 
                          id="txtstrategi" 
                          readonly="readonly"
                          style="height"
                        />
                      <!-- <select class="form-control" id="strategi" readonly>
                          <option value="">--Pilih--</option>
                          
                        </select> -->
                      </div>
                      <div class="col-md-2 col-xs-12 pl-0">
                        <!-- <button type="button" class="col-12 green py-2" id="selectstrategi">Pilih</button> -->
                        @if(!$is_submitted)
                        <button type="button" 
                            id="strategibtn"
                            class="green add_pengguna"
                            data-target="#add_rmk_data_modal"
                            data-toggle="modal"
                        >Pilih
                            
                        </button>
                            @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="RMK_project_header d-flex">
                <h4 class="py-4">
                  Outcome Based Budgeting Output Aktiviti
                </h4>
              </div>
              <div class="brief_project_content">
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" value="{{$id}}" id="project_id"/>
                <input type="hidden" value="{{$id}}" id="getrmkdetails" />
                <div class="brief_project_content_container px-0">
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="OBB_Program" class="col-md-2 col-xs-12 pl-0"
                        >OBB Program <sup>*</sup></label
                      >
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <input
                          type="text"
                          class="form-control"
                          value=""
                          id="txtobbprogram" 
                          readonly="readonly"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div
                      class="input_fill_content row m-0 align-items-center"
                    >
                      <label for="Bab" class="col-md-2 col-xs-12 pl-0"
                        >OBB Aktiviti <sup>*</sup></label
                      >
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <input
                          type="text"
                          class="form-control"
                          value=""
                          id="txtobbaktivity" 
                          readonly="readonly"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div
                      class="input_fill_content row m-0 align-items-center"
                    >
                      <label for="OBB Output Aktiviti" class="col-md-2 col-xs-12 pl-0"
                        >OBB Output Aktiviti <sup>*</sup></label
                      >
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                        <select class="form-control" id="obb_aktivity" @if($is_submitted) disabled @endif>
                          <option value="0">--Pilih--</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="RMK_project_header col-12 p-0">
                <div class="d-flex col-4 p-0">
                  <h4 class="py-4">Sustainable Development Goals</h4>
                  <button type="button" class="ml-auto add_subrow" style="background-color: transparent;border: none; padding: 0;">          
                    <i class="ri-add-box-line ri-2x"></i>
                  </button> 
                </div>
              </div>
              <div class="brief_project_content new_sdg_container" id="sdgcontainer">
              <div class="brief_project_content_container container_1 px-0 container_sdg newsdg p-3 mt-5" style="border: 1px lightgrey solid;">
                <div class="row">
                  <div class="col-12">
                    <button type="button" id="sdg_button" style="background:transparent;border:none; float: right;">
                      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button>
                  </div>
                </div>
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="SDG" class="col-md-2 col-xs-12 pl-0">SDG <sup>*</sup></label>
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                      <select class="form-control sdg_1" id="obb_sdg" onchange="getsasaran(1);" @if($is_submitted) disabled @endif required>
                          <option class="dropdown-item" value="0">--Pilih--</option>                          
                        </select>
                        <p id="sdg_error" style="color:red; display: none;"></p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="Sasaran" class="col-md-2 col-xs-12 pl-0">Sasaran <sup>*</sup></label>
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0 multiselect_sasaran" id="multiselect_1">

                        
                        <select class="form-control sasaran_1" name="Sasaran" id="Sasaran" multiple="multiple" @if($is_submitted) disabled @endif>
                                                
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="input_container mb-4">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="Indikatori" class="col-md-2 col-xs-12 pl-0">Indikator <sup>*</sup></label>
                      <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0 multiselect_indikator" id="multiselect_indi_1">
                      <select class="form-control indikatori_1" name="Indikatori" id="Indikatori" multiple @if($is_submitted) disabled @endif> 
                                                  
                        </select>
                       
                      </div>
                      
                    </div>                    
                  </div> 
                  
                  <div class="input_container">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="" class="col-md-2 col-xs-12 pl-0">Sasaran dipilih:</label>
                      <div class="col-md-10 col-xs-12 pl-0">
                        <div id="sasaranlabel_1" class="sasaran_label_1" style="overflow: auto; height: 100px; background-color:#ffffff ;border: 1px solid #aaa;border-radius: 5px; padding: 10px;"></div>
                      </div>
                    </div>
                  </div>

                  <div class="input_container">
                    <div class="input_fill_content row m-0 align-items-center">
                      <label for="" class="col-md-2 col-xs-12 pl-0">Indikator dipilih:</label>        
                      <div class="col-md-10 col-xs-12 pl-0">
                        <div id="indikatorilabel_1" class="indikatori_label_1" style="overflow: auto; height: 100px; background-color:#ffffff ;border: 1px solid #aaa;border-radius: 5px; padding: 10px;"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="brief_project_content_footer">
            @if(!$is_submitted)
              <button type="button" id="simpan">Simpan</button>
              @endif
              <button class="green" type="button" style="background-color: #0ACF97">
                <a class="text-decoration-none text-white" id="seterusnya" href="{{route('daftar.section',[$id ,$status,$user_id, 'output'])}}">Seterusnya</a>
              </button>
              <!-- <button type="button" id="showrmkdetails" class="btn btn-primary">Show</button> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Mainbody_conatiner Starts -->
</div>
</div>
@include('masterPortal.result_modal')

{{-- <section>
        <div class="project_register_form_modal_container">
          <div
            class="modal spaced_modal fade"
            id="vms_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
              role="document"
            >
              <div class="modal-content project_register_form_modal_content">
                <div class="modal-body project_register_form_modal_body">
                  <div class="project_register_form_modal_body_Content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="text-dark p-0">
                      Maklumat anda berjaya disimpan
                    </h3>
  
                    <div class="btn_holder d-flex">
                      <button data-dismiss="modal" class="fix_button btn btn-primary TutupBtn">
                        Tutup
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}


      <!-- ----------------------------This is a modal for strategi---------------------------- -->
      <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
      </x-form.spinner>
      <section>
      <div class="add_rmk_data_modal_container">
        <div
          class="modal fade"
          id="add_rmk_data_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered add_rmk_data_modal_dialog"
            role="document"
          >
            <div class="modal-content add_rmk_data_modal_content">
              <div
                class="add_rmk_data_modal_header d-flex justify-content-between"
              >
                <div class="d-flex align-items-center">
                  <h5 class="d-flex"><b>Pilih Strategi</b></h5>
                </div>
                <button type="button" data-dismiss="modal" aria-label="Close">
                  <img src="{{asset('assets/images/close_img.png')}}" alt="close_img" />
                  
                </button>
              </div>
              <div class="add_rmk_data_modal_body">
                <form>
                  <div class="m-3">
                  <table id="tableData" width="100%" class="display p-3 userlist_tab_content_table table">
                      <thead>
                          <tr>
                              <th>Pilih</th>
                              <th class="text-center">Butiran</th>
                              <!-- <th style="display: none">nama_strategi</th>
                              <th style="display: none">Tema_Pemangkin_Dasar</th>
                              <th style="display: none">Bab</th> 
                              <th style="display: none">Outcome_Nasional</th> 
                              <th style="display: none">Bidang_Keutamaan</th> -->
                              

                              
                                                     
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>

                  
                    </div>
                </form>
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

      <!-- ----------------------------modal for strategi ends---------------------------- -->


@endsection
@include('project.RMK.scripts')