@include('project.creativity.style')
@extends('layouts.main.master_responsive')


@section('content_main')


  <!-- Mainbody_conatiner Starts -->
  <div class="Mainbody_conatiner ml-auto">
    <x-form.spinner>
      <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
      </x-slot>
    </x-form.spinner>
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

      <div class="project_register_tab_container row">
        <div class="project_register_tab_btn_container col-2">
          @include('project.side-sections', ['active' => 'ci'])
        </div>
        
        <div class="project_register_tab_content_container creativity-index-page col-10">
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
          @include('masterPortal.result_modal')
          <form>
            <div class="brief_project_container rmk">
              <p class="creativity-index-topis-italic">
                <span style="font-style: italic;">Creativity Index <span>(CI)</span></span> <a href="{{ asset('assets/files/Rujukan - Panduan Pengisian CI.pdf') }}" download> (Rujukan Panduan Pengisian CI)</a>
              </p>
              <div class="row m-0">
                <div class="row mb-4 col-lg-6 col-xs-12 align-items-center">
                  <label for="impak-kes" class="col-lg-5 col-xs-12 p-0 create-label"
                    >Impak Keseluruhan(a)</label
                  >
                  <input
                    type="text" readonly id="kos_seluruhan_impak" step="any"
                    class="col-lg-4 col-xs-12 create-input input-element"
                    placeholder=""
                  />
                </div>
                <div class="row mb-4 col-lg-6 align-items-center">
                  <label for="impak-kes" class="col-lg-6 col-xs-12 p-0 create-label"
                    >Kos Keseluruhan OE Dipohon(OE)(b)</label
                  >
                  <input
                    type="text" id="kos_seluruhan_oe" step="any"
                    class="col-lg-4 col-xs-12 create-input input-element"
                    placeholder="" readonly
                  />
                </div>
              </div>
              <div class="row m-0">
                <div class="row mb-4 col-lg-6 col-xs-12 align-items-center">
                  <label for="impak-kes" class="col-lg-5 p-0 create-label"
                    >Kos Keseluruhan(c)</label
                  >
                  <input
                    type="text" id="kos_seluruhan" step="any" readonly
                    class="col-lg-4 create-input input-element"
                    placeholder=""
                  />
                </div>
                <div class="row mb-4 col-lg-6 col-xs-12 align-items-center">
                  <label for="impak-kes" class="col-lg-6 p-0 create-label"
                    >Creativity Index (CI) (d=a/(b+c)</label
                  >
                  <input
                    type="text" readonly id="ci_value"
                    class="col-lg-4 create-input input-element"
                    placeholder=""
                  />
                </div>
              </div>

              <div class="row">
                <div class="out-put-container col-6">
                  <div class="d-flex add_justify">
                    {{-- <p class="sub-topic pl-0 pt-3">
                      output
                    </p> --}}
              
                  </div>
                  <div class="input_form_group">
                    <div class="">
                        <div id="output_input_fields_container">
                         
                        </div>
                    </div>
                </div>
                </div>
                <div class="out-come-container col-6">
                  <div class="d-flex add_justify">
                    {{-- <p class="sub-topic pl-0 pt-3">
                      outcome  
                    </p> --}}
                  </div>
                 <div class="input_form_group">
                  <div class="">
                      <div id="input_fields_container">
                          
                      </div>
                  </div>
              </div>
                </div>
              </div>
          
              {{-- <div>
                <label for="">Outcome Units</label>
                <div id="outcomeUnitContainer"></div>
              </div>
              
              <div>
                <label for="">Output Units</label>
                <div id="outputUnitContainer"></div>
              </div> --}}
              
              {{-- <div class="input_fill_content ">
                <div class="col-lg-2 col-xs-12">
                    <label for="faedah">Outcome Projek </label>
                </div>
                <div class="input_form_group col-lg-10 col-xs-12">
                    <div class="w-100 table_scroll">
                        <div id="input_fields_container">
                            <!-- Input fields will be added here -->
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="input_fill_content ">
                <div class="col-lg-2 col-xs-12">
                    <label for="faedah">Output Projek </label>
                </div>
                <div class="input_form_group col-lg-10 col-xs-12">
                    <div class="w-100 table_scroll">
                        <div id="output_input_fields_container">
                            <!-- Input fields for output will be added here -->
                        </div>
                    </div>
                </div>
            </div> --}}
              
                {{-- <div class="row">
                  
                  <div class="col-lg-6 col-xs-12 out-put-container">
                    <div class="d-flex add_justify">
                      <p class="sub-topic pl-0 pt-3">
                        output
                      </p>
                      @if(!$is_submitted)
                      <button type="button" class="ml-3 add_output" style="background:transparent;border:none">          
                        <i class="ri-add-box-line ri-2x"></i>
                      </button>
                      @endif
                    </div>
                    <div id="output_details" class="d-flex align-items-center mb-3 outcome-con">
                      <input
                        type="text" id="output_input" `+readonly+` class="form-control" 
                        value="" placeholder="" disabled
                      />
                
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="">
                        <label class="" for="">Kuantiti / Bilangan</label>
                        <input type="text" class="form-control" name="" id="outputKuantiti" disabled>
                      </div>
                     <div>
                      <label for="">Unit</label>
                      <input type="text" class="form-control" name="" id="outputUnit" disabled>
                     </div>
                    
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-12 out-come-container">
                    <div class="d-flex add_justify">
                      <p class="sub-topic pl-0 pt-3">
                        outcome  
                      </p>
                    
                      @if(!$is_submitted)
                        <button type="button" class="ml-3 add_outcome" style="background:transparent;border:none">
                          <i class="ri-add-box-line ri-2x"></i>
                        </button>
                      @endif
                    </div>
                    <div id="outcome_details" class="d-flex align-items-center mb-3 outcome-con">
                      <input
                        type="text" id="outcome_input" `+readonly+` class="form-control" 
                        value="" placeholder="" disabled
                      />
                
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="">
                        <label class="" for="">Kuantiti / Bilangan</label>
                        <input type="text" class="form-control" name="" id="outcomeKuantiti" disabled>
                      </div>
                     <div>
                      <label for="">Unit</label>
                      <input type="text" class="form-control" name="" id="outcomeUnit" disabled>
                     </div>
                    
                    </div>
                    <div id="outcome_content" class="outcome-Add">
                      
                    </div>
                  </div>
                </div>
               --}}
             
              <div class="impak-container">
                <div class="d-flex add_justify">
                  <p class="sub-topic pl-0 pt-3">
                    impak
                  </p>
                  @if(!$is_submitted)
                    <button type="button" class="ml-3 add_impak" style="background:transparent;border:none">          
                      <i class="ri-add-box-line ri-2x"></i>
                    </button>
                  @endif
                </div>
                <div id="impak_content" ></div>
                
              </div>
            </div>
            <div class="brief_project_content_footer">
              @if(!$is_submitted)
                <button type="button" id="CISubmit">Simpan</button>
              @endif
              <button type="button" id="projectCreativitynext" style="background-color: #0ACF97">
                        <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'vae'])}}">Seterusnya</a>
                </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
  <!-- Mainbody_conatiner Starts -->
</div>
@include('project.common-scripts')
@include('project.creativity.scripts')
@endsection