@include('project.VAE.style')
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
          
          <div class="project_register_tab_container row">
            <div class="project_register_tab_btn_container col-2">
                @include('project.side-sections', ['active' => 'vae'])
              </div>
            <div class="project_register_tab_content_container VAE-page col-10">
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
              {{-- 2023 March 20 new by Nabilah (download button) --}}
              <!-- <div class="project_register_table_header dropdown dropleft m-0 mb-3">
                <button
                  class="ml-auto d-flex flex-column justify-content-center blue"
                  type="button"
                  id="dropdownMenuButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="iconify icon_white mdi_icon" data-icon="mdi-tray-arrow-down" onClick="downloadPpt(`+row.id+`,'`+String(row.no_rujukan)+`')"></span>
                </button>
              </div> -->
              <input type="hidden" class="fetch_id" name="fetch_id" value="{{$id}}">
              <input type="hidden" class="update_id" name="update_id" value="{{$id}}">
              <form>
                <input type="hidden" class="Permohonan_Projek_id" name="Permohonan_Projek_id" value="{{$id}}">
                <div class="brief_project_container rmk">
                  <p class="VAE-topic">Value At Entry <span>(VAE)</span></p>
                  <div class="acquistion-topic">
                    <p class="acquistion-topic-p">
                      Acquisition Categorization (ACAT)
                    </p>
                    <p class="acquistion-topic-small-p">
                      *Medan VAE Perlu dilaksanakan oleh pegawai Kanan di JPS
                      Negeri/Bahagian
                    </p>
                  </div>
                  <div class="nama-container">
                    <label for="nama" class="vae_gap">Nama Projek</label>
                    <input
                      type="text"
                      id="nama"
                      class="form-control"
                      placeholder="" readonly
                    />
                    <label for="Kementerian" class="vae_gap">Kementerian</label>
                    <input
                      type="text"
                      id="Kementerian"
                      class="form-control"
                      placeholder="Kementerian Sumber Asli, Alam Sekitar dan Perubahan Iklim (NRECC)"
                    />
                    <div class="row">
                      <div class="col-lg-6 col-xs-12 vae_gap">
                        <label for="Bahagian">Bahagian</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Bahagian"
                          placeholder="Bahagian Pengurusan banjir" readonly
                        />
                      </div>
                      <div class="col-lg-6 col-xs-12 vae_gap">
                        <label for="Tarikh">Tarikh disediakan</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Tarikh"
                          placeholder="12 September 2002"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="calculator-container">
                    <p class="calc-topic vae_gap">Calculator (ACAT)</p>
                    <div class="table_scroll">
                      <table class="table table-bordered calc-table">
                        <thead>
                          <tr>
                            <th class="image-th"></th>
                            <th>Attribute</th>
                            <th class="level">Very High</th>
                            <th class="level">High</th>
                            <th class="level">Medium</th>
                            <th class="level">Low</th>
                            <th class="level">Very Low</th>
                            <th class="level">Row Score</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row" class="image-td">
                              <img
                                style="height: 50px; width:70px"
                                src="{{ asset('images/Picture2.png') }}"
                                alt=""
                              />
                            </td>
                            <td class="attribute-td">
                              <p>Acquisition Cost</p>
                              <div id="hoverTest">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                <div id="customTooltip" class="hideme vae_info" style="position: absolute; z-index:1;">
                                  <table style="width: 100%;">
                                    <thead style="background-color: rgb(210, 210, 210);"> 
                                    <th>ATTRIBUTE COMPLEXITY LEVEL</th>
                                    <th>ACQUISITION COST</th>
                                  </thead>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>5</center><center>(Very Low)</center>
                                        </td>
                                      <td> &#60;RM10M </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>4</center><center>(Low)</center>
                                        </td>
                                      <td> RM10M-RM100M </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>3</center><center>(Moderate)</center>
                                        </td>
                                      <td> RM100M-RM300M </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>2</center><center>(High)</center>
                                        </td>
                                      <td> RM300M-RM500M </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>1</center><center>(Very High)</center>
                                        </td>
                                      <td> >RM500M </td>
                                    </tr>
                                  </table>
                                </div>
                                </div>
                            </td>
                            <td><button class="acquisition_cost acquisition_cost1" onclick="acquisition_cost(this)" value="10" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="acquisition_cost acquisition_cost2" onclick="acquisition_cost(this)" value="9" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="acquisition_cost acquisition_cost3" onclick="acquisition_cost(this)" value="7" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="acquisition_cost acquisition_cost4" onclick="acquisition_cost(this)"  value="3" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="acquisition_cost acquisition_cost5" onclick="acquisition_cost(this)" value="1" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="acquisition_row_score" value="" type="button"></button></td>
                          </tr>
                          <tr>
                            <td scope="row" class="image-td">
                              <img
                                style="height: 50px;"
                                src="{{ asset('images/Picture3.png') }}"
                                alt=""
                              />
                            </td>
                            <td class="attribute-td">
                              <p>Project Management</p>
                              {{-- <img src="{{ asset('assets/images/i-icon.png') }}" alt="" /> --}}
                              <div id="hoverTest2">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                <div id="customTooltip2" class="hideme2 vae_info" style="position: absolute;z-index:1">
                                  <table style="width: 70%;">
                                    <thead style="background-color: rgb(210, 210, 210);"> 
                                    <th>ATTRIBUTE COMPLEXITY LEVEL</th>
                                    <th style="vertical-align:top;">PROJECT MANAGEMENT COMPLEXITY</th>
                                  </thead>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>5</center><center>(Very Low)</center>
                                        </td>
                                      <td> Relies predominantly on traditional Project Management knowledge </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>4</center><center>(Low)</center>
                                        </td>
                                      <td> Relies predominantly on traditional Project Management knowledge with minimum complexity </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>3</center><center>(Moderate)</center>
                                        </td>
                                      <td> RM100M-RM300M </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>2</center><center>(High)</center>
                                        </td>
                                      <td> RM300M-RM500M </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>1</center><center>(Very High)</center>
                                        </td>
                                      <td> >RM500M </td>
                                    </tr>
                                  </table>
                                </div>
                                </div>
                            </td>
                            <td><button class="project_management project_management1" onclick="project_management(this)" value="10" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="project_management project_management2" onclick="project_management(this)" value="9" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="project_management project_management3" onclick="project_management(this)" value="7" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="project_management project_management4" onclick="project_management(this)" value="3" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="project_management project_management5" onclick="project_management(this)" value="1" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="project_management_row_score" value="" type="button"></button></td>
                            
                          </tr>
                          <tr>
                            <td scope="row" class="image-td">
                              <img
                              style="height: 50px;"
                              src="{{ asset('images/Picture4.png') }}"
                              alt=""
                            />
                            </td>
                            <td class="attribute-td">
                              <p>Schedule</p>
                              {{-- <img src="{{ asset('assets/images/i-icon.png') }}" alt="" /> --}}
                              <div id="hoverTest3">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                <div id="customTooltip3" class="hideme3 vae_info" style="position: absolute; z-index:1">
                                  <table style="width: 70%;">
                                    <thead style="background-color: rgb(210, 210, 210);"> 
                                    <th>ATTRIBUTE COMPLEXITY LEVEL</th>
                                    <th style="vertical-align:top;">SCHEDULE</th>
                                  </thead>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>5</center><center>(Very Low)</center>
                                        </td>
                                      <td> •	Routine schedule management issues <br>
                                        •	Requires the application of routine project monitoring and control measures
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>4</center><center>(Low)</center>
                                        </td>
                                      <td> •	Moderate schedule management issues  <br>
                                        •	Requires the application of remedial schedule management measures.
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>3</center><center>(Moderate)</center>
                                        </td>
                                      <td> •	Difficult schedule management matters expected to arise from time to time. <br>
                                          •	Requires the application of difficult remedial schedule management measures
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>2</center><center>(High)</center>
                                        </td>
                                      <td> Significant </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>1</center><center>(Very High)</center>
                                        </td>
                                      <td> Significant </td>
                                    </tr>
                                  </table>
                                </div>
                                </div>
                            </td>
                            <td><button class="schedule schedule1" onclick="schedule(this)" value="10" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="schedule schedule2" onclick="schedule(this)" value="9" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="schedule schedule3" onclick="schedule(this)" value="7" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="schedule schedule4" onclick="schedule(this)" value="3" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="schedule schedule5" onclick="schedule(this)" value="1" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="schedule_row_score" value="" type="button"></button></td>
                          </tr>
                          <tr>
                            <td scope="row" class="image-td">
                              <img
                                style="height: 50px;"
                                src="{{ asset('images/Picture5.png') }}"
                                alt=""
                              />
                            </td>
                            <td class="attribute-td">
                              <p>Technical Difficulty</p>
                              {{-- <img src="{{ asset('assets/images/i-icon.png') }}" alt="" /> --}}
                              <div id="hoverTest4">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                <div id="customTooltip4" class="hideme4 vae_info" style="position: absolute; z-index:1">
                                  <table style="width: 70%;">
                                    <thead style="background-color: rgb(210, 210, 210);"> 
                                    <th>ATTRIBUTE COMPLEXITY LEVEL</th>
                                    <th style="vertical-align:top;">Technical Difficulty</th>
                                  </thead>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>5</center><center>(Very Low)</center>
                                      </td>
                                      <td>
                                        •	Very low system complexity <br>
                                        •	No hardware and/or critical software development <br>
                                        •	No requirement of systems coordination/integration
                                      </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>4</center><center>(Low)</center>
                                        </td>
                                      <td>•	Low system complexity <br>
                                        •	Limited hardware and/or critical software development <br>
                                        •	Limited amount of systems coordination/integration <br>
                                        •	Feasible location and logistic 
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>3</center><center>(Moderate)</center>
                                        </td>
                                      <td>•	Moderate system complexity <br>
                                        •	Moderate level of hardware and/or software development <br>
                                        •	Moderate systems coordination/ integration <br>
                                        •	Feasible location and logistic with some difficulty
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>2</center><center>(High)</center>
                                        </td>
                                      <td> •	High system complexity <br>
                                        •	High level of hardware and/or software development <br>
                                        •	High systems coordination/ integration <br>
                                        •	Difficult location and logistic with some difficulty
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>1</center><center>(Very High)</center>
                                        </td>
                                      <td> •	Very High system complexity <br>
                                        •	Very High level of hardware and/or software development <br>
                                        •	Very High systems coordination/ integration <br>
                                        •	Very difficult location and logistic with some difficulty
                                        </td>
                                    </tr>
                                  </table>
                                </div>
                                </div>
                            </td>
                            <td><button class="technical_difficulty technical_difficulty1" onclick="technical_difficulty(this)" value="10" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="technical_difficulty technical_difficulty2" onclick="technical_difficulty(this)" value="9" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="technical_difficulty technical_difficulty3" onclick="technical_difficulty(this)" value="7" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="technical_difficulty technical_difficulty4" onclick="technical_difficulty(this)" value="3" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="technical_difficulty technical_difficulty5" onclick="technical_difficulty(this)" value="1" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="technical_difficulty_row_score" value="" type="button"></button></td>
                          </tr>
                          <tr>
                            <td scope="row" class="image-td">
                              <img
                                style="height: 50px;"
                                src="{{ asset('images/Picture6.png') }}"
                                alt=""
                              />
                            </td>
                            <td class="attribute-td">
                              <p>Operation and Maintenance</p>
                              {{-- <img src="{{ asset('assets/images/i-icon.png') }}" alt="" /> --}}
                              <div id="hoverTest5">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                <div id="customTooltip5" class="hideme5 vae_info" style="position: absolute; z-index:1">
                                  <table style="width: 70%;">
                                    <thead style="background-color: rgb(210, 210, 210);"> 
                                    <th>ATTRIBUTE COMPLEXITY LEVEL</th>
                                    <th style="vertical-align:top;">OPERATION AND MAINTENANCE</th>
                                  </thead>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>5</center><center>(Very Low)</center>
                                        </td>
                                      <td>•	Very similar to existing system/equipment <br>
                                        •	No new operation, maintenance and support infrastructure changes needed <br>
                                        •	Sustainment can fit in an existing SOP
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>4</center><center>(Low)</center>
                                        </td>
                                      <td>•	Very similar to existing system/equipment <br>
                                        •	Slight change needed operation, maintenance and support infrastructure changes needed <br>
                                        •	Sustainment can fit in an existing SOP with minimal change
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>3</center><center>(Moderate)</center>
                                        </td>
                                      <td>•	Similar to existing system/equipment <br>
                                        •	Some operation, maintenance and support infrastructure changes needed <br>
                                        •	Sustainment can fit in an existing SOP with moderate change
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>2</center><center>(High)</center>
                                        </td>
                                      <td>•	Some systems/ equipment different from existing system/non existence <br>
                                        •	Major operation, maintenance and support infrastructure changes needed <br>
                                        •	Sustainment may require major changes to an existing SOP 
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>1</center><center>(Very High)</center>
                                        </td>
                                      <td>•	Most major systems/ equipment different from existing system/ non existence <br>
                                        •	Significant operation, maintenance and support infrastructure changes needed <br>
                                        •	Sustainment may require a new SOP to be put in place
                                        </td>
                                    </tr>
                                  </table>
                                </div>
                                </div>
                            </td>
                            <td><button class="operation_maintainance operation_maintainance1" onclick="operation_maintainance(this)" value="10" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="operation_maintainance operation_maintainance2" onclick="operation_maintainance(this)" value="9" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="operation_maintainance operation_maintainance3" onclick="operation_maintainance(this)" value="7" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="operation_maintainance operation_maintainance4" onclick="operation_maintainance(this)" value="3" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="operation_maintainance operation_maintainance5" onclick="operation_maintainance(this)" value="1" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="operation_maintainance_row_score" value="" type="button"></button></td>
                          </tr>
                          <tr>
                            <td scope="row" class="image-td">
                              <img
                              style="height: 50px;"
                              src="{{ asset('images/Picture7.png') }}"
                              alt=""
                            />
                            </td>
                            <td class="attribute-td">
                              <p>Industry</p>
                              {{-- <img src="{{ asset('assets/images/i-icon.png') }}" alt="" /> --}}
                              <div id="hoverTest6">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                                <div id="customTooltip6" class="hideme6 vae_info" style="position:absolute;z-index:1">
                                  <table style="width: 70%;">
                                    <thead style="background-color: rgb(210, 210, 210);"> 
                                    <th>ATTRIBUTE COMPLEXITY LEVEL</th>
                                    <th style="vertical-align:top;">Industry</th>
                                  </thead>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>5</center><center>(Very Low)</center>
                                        </td>
                                      <td>•	Existing companies have supplied almost identical systems<br>
                                        •	Contracting arrangement and contacts are traditional and contract management is routine
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>4</center><center>(Low)</center>
                                        </td>
                                      <td>•	Existing companies have supplied similar systems<br>
                                        •	Contracting arrangement and contacts are traditional and contract are complex but contract management s routine
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                      <td >
                                        <center>3</center><center>(Moderate)</center>
                                        </td>
                                      <td>•	Companies have previously demonstrated capability to develop and produce systems <br>
                                        •	Contracting arrangement and contacts are complex and require a high level of contract management
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>2</center><center>(High)</center>
                                        </td>
                                      <td>•	Individual company capabilities exist but not previously combined to produce required capability<br>
                                        •	Project will challenge extant industry capabilities<br>
                                        •	Contracting arrangements are complex or there is high level of interdependency between a number of commercial arrangements being managed by JKR
                                        </td>
                                    </tr>
                                    <tr style="background-color: coral;">
                                      <td >
                                        <center>1</center><center>(Very High)</center>
                                        </td>
                                      <td>•	New industry capabilities may need to be introduced<br> 
                                        •	Project is at the margins of extant industry capability maturity levels<br>
                                        •	Contracting arrangements are highly complex and there is very high level of interdependency between a number of commercial arrangements being managed by JKR<br>
                                        •	Novel commercial practices required to undertake the project
                                        </td>
                                    </tr>
                                  </table>
                                </div>
                                </div>
                            </td>
                            <td><button class="industry industry1" onclick="industry(this)" value="10" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="industry industry2" onclick="industry(this)" value="9" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="industry industry3" onclick="industry(this)" value="7" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="industry industry4" onclick="industry(this)" value="3" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="industry industry5" onclick="industry(this)" value="1" type="button" @if($is_submitted)  disabled @endif></button></td>
                            <td><button class="industry_row_score" value="" type="button"></button></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="7" class="score-td">
                              <div
                                class="d-flex align-tems-center justify-content-end position-relative">
                                <div class="d-flex align-items-center">
                                  <p class="m-1">SCORE</p>
                                  {{-- <img
                                    src="{{ asset('assets/images/i-icon.png') }}"
                                    class="pop_btn ml-3 "
                                    alt=""
                                  /> --}}
                                  <div id="hoverTest8">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                    <div id="customTooltip8" class="hideme8 vae_score_info" style="position: absolute; z-index: 1; background: white">
                                      <table style="width:330px">
                                        <tr class="p-0">
                                          <td class="p-0 text-center">
                                            ACAT I
                                            </td>
                                          <td class="p-0 text-center">95</td>
                                          <td class="p-0 text-center">100</td>
                                        </tr>
                                        <tr class="p-0">
                                          <td class="p-0 text-center" >
                                            ACAT II
                                            </td>
                                          <td class="p-0 text-center">75</td>
                                          <td class="p-0 text-center">94</td>
                                        </tr>
                                        <tr class="p-0">
                                          <td class="p-0 text-center" >
                                            ACAT III
                                            </td>
                                          <td class="p-0 text-center">50</td>
                                          <td class="p-0 text-center">74</td>
                                        </tr>
                                        <tr class="p-0">
                                          <td  class="p-0 text-center">
                                            ACAT IV
                                            </td>
                                          <td class="p-0 text-center">30</td>
                                          <td class="p-0 text-center">49</td>
                                        </tr>
                                        <tr class="p-0">
                                          <td  class="p-0 text-center">
                                            ACAT V
                                            </td>
                                          <td class="p-0 text-center">10</td>
                                          <td class="p-0 text-center">29</td>
                                        </tr>
                                      </table>
                                    </div>
                                    </div>
                                  <!-- <div class="position-absolute pop_content d-none show-table">
                                    <table class="table table-bordered ">
                                      <tbody>
                                        <tr>
                                          <td scope="row">ACAT 1</td>
                                          <td>95</td>
                                          <td>100</td>
                                        </tr>
                                        <tr>
                                          <td scope="row">ACAT 11</td>
                                          <td>75</td>
                                          <td>94</td>
                                        </tr>
                                        <tr>
                                          <td scope="row">ACAT 111</td>
                                          <td>50</td>
                                          <td>74</td>
                                        </tr>
                                        <tr>
                                          <td scope="row">ACAT 1</td>
                                          <td>30</td>
                                          <td>49</td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>
                                  </div> -->
                                </div>

                                <button
                                  type="button"
                                  class="ml-4 col-2 acat_val"
                                  id="acat_val"
                                >
                                  0
                                </button>
                              </div>
                            </td>
                            <td><button class="average" type="button" value="">0</button></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                  <span class="error" style="color:red;padding-left:45px;" id="error_acat"></span>

                  <div class="acquistion-topic">
                    <hr>
                    <p class="acquistion-topic-G">Gerbang Nilai 0 (GNO)</p>
                    <p class="acquistion-topic-small-p">
                      *Medan VAE Perlu dilaksanakan oleh pegawai Kanan di JPS
                      Negeri/Bahagian
                    </p>
                  </div>
                  <div class="accordion daya-accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#daya"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                          >
                            <i class="ri-scales-fill ri-2x icon_white"></i>
                            <p class="collapsedBtn">1. DAYA MAJU PROJEK (PROJECT VIABILITY)</p>
                          </button>
                        </h2>
                      </div>

                      <div
                        id="daya"
                        class="collapse multi-collapse"
                        aria-labelledby="headingOne"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:coral;">
                              <tr>
                                <th  scope="col" >TUMPUAN SEMAKAN</th>
                                <th colspan="2" scope="col">KETERANGAN</th>
                                <th colspan="2" scope="col">SENARAI SEMAK</th>
                                <th scope="col">Y</th>
                                <th scope="col">T</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <input type="hidden" Value="1" id="viability" name="viability">
                              <input type="hidden" Value="1" id="p_viability" name="p_viability">
                              <tr>
                                <td class="td-1">
                                  <i>Value Management</i> Strategik (VMS)
                                </td>
                                <td class="td-2">1.1</td>
                                <td class="td-3">
                                  Laporan <i>Value Management</i> Strategik (VMS)
                                </td>
                                <td class="td-4 td-bg-yellow">*a)</td>
                                <td class="td-5 td-bg-yellow">
                                  Adakah perancangan projek ini telah melalui
                                  proses <i>Value Management</i> Strategik (VMS) dan
                                  adakah laporan VMS telah tersedia dan
                                  syarat-syarat yang perlu dipenuhi telah
                                  diselesaikan?
                                  <p>
                                      Nota : Sekiranya jawapan YA terus buat
                                      pengesyoran.
                                  </p>
                                </td>
                                <td class="td-6 td-bg-green viability viability_0" onclick="ProjectViability('0')"></td>
                                <td class="td-7 td-bg-red viability viability_1" onclick="ProjectViability('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-1">
                                  Kajian daya maju projek <i>(viability)</i>
                                </td>
                                <td class="td-2">1.2</td>
                                <td class="td-3">
                                  Kaedah penilaian daya maju projek
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah kiraan nilai telah dilaksanakan? cth:
                                  <ol>
                                    <li style="font-style:italic">
                                      Creativity Index (viability, 
                                      feasibility, sosioekonomi) dan 
                                      Logical Framework Matrix (LFM); atau
                                    </li style="font-style:italic">
                                    <li style="font-style:italic">Cost Benefit Analysis; atau</li>
                                    <li style="font-style:italic">Value For Money; atau</li>
                                    <li>
                                      Lain-lain kaedah perkiraan berkaitan
                                    </li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green p_viability p_viability_0" onclick="ProjectViability_2('0')"></td>
                                <td class="td-7 td-bg-red p_viability p_viability_1" onclick="ProjectViability_2('1')">X</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#brif"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <i class="ri-briefcase-fill ri-2x icon_white"></i>
                            <p class="collapsedBtn">2. BRIF</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="brif"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered w-100">
                            <thead style="background-color:coral;">
                              <tr>
                                <th scope="col" >TUMPUAN SEMAKAN</th>
                                <th colspan="2" scope="col">KETERANGAN</th>
                                <th colspan="3"  scope="col">SENARAI SEMAK</th>
                                <th scope="col">Y</th>
                                <th scope="col">T</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td rowspan="14" class="td-1">
                                  Kesediaan ringkasan projek 
                                </td>
                                <td class="td-2">2.1</td>
                                <td class="td-3">Konteks projek</td>
                                <td class="td-4">a)</td>
                                <td colspan="2" class="td-5">
                                Adakah latar belakang projek telah diambil kira?
                                  <ol>
                                    <li>Lokasi; atau</li>
                                    <li>Populasi; atau</li>
                                    <li>Komposisi kaum; atau</li>
                                    <li>Kemudahan sedia ada; atau</li>
                                    <li>Jarak antara fasiliti yang sama</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green brif brif_0" onclick="KonteckBrif('0')"></td>
                                <td class="td-7 td-bg-red brif brif_1" onclick="KonteckBrif('1')">X</td>
                              </tr>
                              <input type="hidden" Value="1" id="brif_kontek" name="brif_kontek">
                              <input type="hidden" Value="1" id="op_brif" name="op_brif"><br>
                              <input type="hidden" Value="1" id="sp_brif" name="sp_brif"><br>
                              <input type="hidden" Value="1" id="kp_brif" name="kp_brif"><br>
                              <input type="hidden" Value="1" id="klp_brif" name="klp_brif"><br>
                              <tr>
                                <td class="td-2" rowspan="5">2.2</td>
                                <td rowspan="5">Kefungsian projek</td>
                                <td colspan="5">
                                Adakah kefungsian projek telah diambil kira?
                                </td>
                              </tr>
                              <tr>
                                <td class="td-4">a)</td>
                                <td colspan="2" >Objektif Projek</td>
                                <td class="td-6 td-bg-green OP_brif OP_brif_0" onclick="OPBrif('0')"></td>
                                <td class="td-7 td-bg-red OP_brif OP_brif_1" onclick="OPBrif('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">b)</td>
                                <td colspan="2">Skop Projek</td>
                                <td class="td-6 td-bg-green SP_brif SP_brif_0" onclick="SPBrif('0')"></td>
                                <td class="td-7 td-bg-red SP_brif SP_brif_1" onclick="SPBrif('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">c)</td>
                                <td colspan="2">Komponen Projek</td>
                                <td class="td-6 td-bg-green KP_brif KP_brif_0" onclick="KPBrif('0')"></td>
                                <td class="td-7 td-bg-red KP_brif KP_brif_1" onclick="KPBrif('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">d)</td>
                                <td colspan="2">
                                Kapasiti <br>(cth: LoS)
                                </td>
                                <td class="td-6 td-bg-green KLP_brif KLP_brif_0" onclick="KLPBrif('0')"></td>
                                <td class="td-7 td-bg-red KLP_brif KLP_brif_1" onclick="KLPBrif('1')">X</td>
                              </tr>
                              <!--  -->
                              <tr>
                                <td class="td-2" rowspan="4">2.3</td>
                                <td rowspan="4">Justifikasi</td>
                                <td></td>
                                <td colspan="5">
                                Adakah justifikasi projek telah diambil kira?
                                </td>
                              </tr>
                              <input type="hidden" Value="1" id="KeperLuan" name="KeperLuan">
                              <input type="hidden" Value="1" id="KeperLuan_b" name="KeperLuan_b">
                              <input type="hidden" Value="1" id="KeperLuan_c" name="KeperLuan_c">
                              <tr>
                                <td class="td-4">a)</td>
                                <td colspan="2">Keperluan mewujudkan projek</td>
                                <td class="td-6 td-bg-green Keperluan Keperluan_0" onclick="KeperLuan('0')"></td>
                                <td class="td-7 td-bg-red Keperluan Keperluan_1" onclick="KeperLuan('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">b)</td>
                                <td colspan="2">Implikasi projek jika tidak diluluskan</td>
                                <td class="td-6 td-bg-green Keperluan_b Keperluan_b_0" onclick="KeperLuanB('0')"></td>
                                <td class="td-7 td-bg-red Keperluan_b Keperluan_b_1" onclick="KeperLuanB('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">c)</td>
                                <td colspan="2">
                                Keberhasilan (outcome) Projek dan impak jangka panjang
                                </td>
                              
                                <td class="td-6 td-bg-green Keperluan_c Keperluan_c_0" onclick="KeperLuanC('0')"></td>
                                <td class="td-7 td-bg-red Keperluan_c Keperluan_c_1" onclick="KeperLuanC('1')">X</td>
                              </tr>
                              <tr>
                                <td class="td-2" rowspan="2">2.4</td>
                                <td rowspan="2">Kategori Pembangunan</td>  
                                <td colspan="5">
                                Adakah kategori pembangunan telah dikenal pasti?
                                </td>
                              </tr>
                              <tr>
                                <td class="td-4">a)</td>
                                <td colspan="2">
                                  <ol>
                                    <li>Projek baru; atau</li>
                                    <li>Naik taraf; atau</li>
                                    <li>Ubah suai</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Kategori Kategori_0" onclick="Kategori('0')"></td>
                                <td class="td-7 td-bg-red Kategori Kategori_1" onclick="Kategori('1')">X</td>
                                <input type="hidden" Value="1" id="Kategori" name="Kategori">
                              </tr>
                              <tr>
                                <td class="td-2" rowspan="4">2.5</td>
                                <td rowspan="4">Operasi dan Senggara</td>
                                <td colspan="5">
                                Adakah aspek operasi dan penyenggaraan telah diambil kira?
                                </td>
                              </tr>
                              <tr>
                                <td class="td-4">a)</td>
                                <td colspan="2">
                                  <ol>
                                    <li>Bina baharu; atau</li>
                                    <li>Pemuliharaan; atau</li>
                                    <li>Pemulihan; atau</li>
                                    <li>Ubah suai; atau</li>
                                    <li>Naik taraf</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Operasi Operasi_0" onclick="Operasi('0')"></td>
                                <td class="td-7 td-bg-red Operasi Operasi_1" onclick="Operasi('1')">X</td>
                              </tr>
                              <input type="hidden" Value="1" id="Operasi" name="Tanah">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#TANAH"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <i class="ri-earth-fill ri-2x icon_white"></i>
                            <p class="collapsedBtn">3. TANAH</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="TANAH"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:coral;">
                              <tr>
                                <th scope="col" >TUMPUAN SEMAKAN</th>
                                <th colspan="2" scope="col">KETERANGAN</th>
                                <th colspan="2" scope="col">SENARAI SEMAK</th>
                                <th scope="col">Y</th>
                                <th scope="col">T</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="td-1" rowspan="2">
                                Status tanah
                                </td>
                                <td class="td-2" rowspan="2">3.1</td>
                                <td class="td-3" rowspan="2">
                                Pemilikan tanah
                                </td>
                                <td class="td-4 td-bg-yellow">*a)</td>
                                <td class="td-5 td-bg-yellow">
                                  Sekiranya hak milik tanah masih bukan atas nama
                                  Pesuruhjaya Tanah Persekutuan, adakah langkah-langkah
                                  pengambil alihan tanah telah dilakukan?
                                  <p>Nota : Sekiranya tanah atas nama Pesuruhjaya Tanah Persekutuan sila tandakan 'X' pada ruangan Y</p>
                                </td>
                                <td class="td-6 td-bg-green Tanah Tanah_0" onclick="Tanah('0')"></td>
                                <td class="td-7 td-bg-red Tanah Tanah_1" onclick="Tanah('1')">X</td>
                                <input type="hidden" Value="1" id="Tanah" name="Tanah">
                              </tr>
                              <tr>
                                <td class="td-4">b)</td>
                                <td class="td-5">
                                  Adakah sudah kenal pasti koridor pembangunan (jalan/saliran)?
                                </td>
                                <td class="td-6 td-bg-green Tanah_b Tanah_b_0" onclick="TanahB('0')"></td>
                                <td class="td-7 td-bg-red Tanah_b Tanah_b_1" onclick="TanahB('1')">X</td>
                                <input type="hidden" Value="1" id="TanahB" name="TanahB">
                              </tr>
                              <tr>
                                <td class="td-1" rowspan="2">
                                  Adakah tapak telah tersedia dan bebas daripada bebanan dan masalah?
                                </td>
                                <td class="td-2" rowspan="2">3.2</td>
                                <td class="td-3" rowspan="2">
                                Tanah bebas halangan
                                </td>
                                <td class="td-4 td-bg-yellow">*a)</td>
                                <td class="td-5 td-bg-yellow">
                                Adakah tiada pencerobohan di tanah?
                                </td>
                                <td class="td-6 td-bg-green TanahBebas TanahBebas_0" onclick="TanahBebas('0')"></td>
                                <td class="td-7 td-bg-red TanahBebas TanahBebas_1" onclick="TanahBebas('1')">X</td>
                                <input type="hidden" Value="1" id="TanahBebas" name="TanahBebas">
                              </tr>
                              <tr>
                                <td class="td-4">b)</td>
                                <td class="td-5">
                                  Adakah keperluan serta langkah-langkah untuk
                                  menyelesaikan isu pencerobohan sebelum pembangunan
                                  telah diambil kira?
                                  <p>Nota: Sekiranya tiada pencerobohan di tanah sila tandakan 'X' pada ruangan Y</p>
                                </td>
                                <td class="td-6 td-bg-green TanahBebas_b TanahBebas_b_0" onclick="TanahBebasB('0')"></td>
                                <td class="td-7 td-bg-red TanahBebas_b TanahBebas_b_1" onclick="TanahBebasB('1')">X</td>
                                <input type="hidden" Value="1" id="TanahBebasB" name="TanahBebasB">
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#ANGGARAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <i class="uil-money-withdraw uil_icon icon_white"></i>
                            <p class="collapsedBtn">4. ANGGARAN KOS</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="ANGGARAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:coral;">
                              <tr>
                                <th scope="col" >TUMPUAN SEMAKAN</th>
                                <th colspan="2" scope="col">KETERANGAN</th>
                                <th colspan="2" scope="col">SENARAI SEMAK</th>
                                <th scope="col">Y</th>
                                <th scope="col">T</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="td-1" rowspan="8">
                                Bajet untuk projek
                                </td>
                                <td class="td-2">4.1</td>
                                <td class="td-3">Kos berkaitan lokasi</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah anggaran kos telah mengambil kira 
                                  faktor lokasi? :
                                  <ol>
                                    <li>Semenanjung; atau</li>
                                    <li>Sabah/Sarawak; atau</li>
                                    <li>Kawasan Pedalaman; atau</li>
                                    <li>Kawasan Laut, Pulau, Pesisir Pantai</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran Anggaran_0" onclick="Anggaran('0')"></td>
                                <td class="td-7 td-bg-red Anggaran Anggaran_1" onclick="Anggaran('1')">X</td>
                                <input type="hidden" Value="1" id="Anggaran" name="Anggaran">
                              </tr>
                              <tr>
                                  <td class="td-2">4.2</td>
                                <td>Kos berkaitan tanah</td>
                                <td class="td-4">a)</td>
                                <td>
                                  Adakah anggaran kos telah mengambil kira
                                  keperluan kos berkaitan tanah sekiranya ada? <br>
                                  cth:
                                  <ol>
                                    <li>
                                    Kos pengambilan tanah (jalan/pengairan) ; atau
                                    </li>
                                    <li>
                                    Kos pengambilan tanah untuk jalan masuk; atau
                                    </li>
                                    <li>
                                    Kos pembaikan fizikal tanah; atau</li>
                                    <li>
                                    Kos pampasan/pengusiran pencerobohan; atau
                                    </li>
                                    <li>Lain-lain kos yang berkaitan tanah</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_a Anggaran_a_0" onclick="AnggaranA('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_a Anggaran_a_1" onclick="AnggaranA('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranA" name="AnggaranA">
                              </tr>
                              <tr>
                                <td class="td-2">4.3</td>
                                <td class="td-3">Kos berkaitan polisi</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                Adakah anggaran kos projek berdasarkan
                                keperluan pematuhan dasar semasa? <br> cth:
                                  <ol>
                                    <li>Fi perunding; atau</li>
                                    <li>
                                      <i>Contribution Fee</i>/ Wang Sumbangan Pembangunan
                                      pembekal utiliti (TNB,Bekalan Air,Telekom,IWK),
                                      Pihak Berkuasa Tempatan (PBT); atau
                                    </li>
                                    <li>Levi; atau</li>
                                    <li>Ukur halus; atau</li>
                                    <li> <i>Pre Approved</i> Plan (PAP) JKR; atau</li>
                                    <li>
                                      <i>Industrialised Building System</i>  (IBS); atau
                                    </li>
                                    <li>Penarafan Hijau (PH); atau</li>
                                    <li>
                                      <i>Building Information Modelling</i> (BIM); atau
                                    </li>
                                    <li>Lain-lain perkara berkaitan polisi</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_b Anggaran_b_0" onclick="AnggaranB('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_b Anggaran_b_1" onclick="AnggaranB('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranB" name="AnggaranB">
                              </tr>
                              <tr>
                                <td class="td-2">4.4</td>
                                <td class="td-3">Kos berkaitan kerja awalan</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                Adakah sudah dikenal pasti kos berkaitan kerja
                                awalan? <br> cth:
                                  <ol>
                                    <li> (SI, EIA, TIA, <i>Utility Mapping, Land Survey</i>); atau</li>
                                    <li><i>Public engagement</i>; atau</li>
                                    <li>Fi perunding; atau</li>
                                    <li>Penilaian Struktur/Turapan; atau</li>
                                    <li>Kos pengalihan utiliti; atau</li>
                                    <li><i>Miscellaneous</i></li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_c Anggaran_c_0" onclick="AnggaranC('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_c Anggaran_c_1" onclick="AnggaranC('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranC" name="AnggaranC">
                              </tr>
                              <tr>
                                <td class="td-2">4.5</td>
                                <td class="td-3">
                                Kos berkaitan mitigasi risiko
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                Adakah sudah dikenal pasti anggaran kos berkaitan mitigasi risiko? <br> cth:
                                  <ol>
                                    <li>Kos luar jangka; atau</li>
                                    <li>Bencana alam; atau</li>
                                    <li>Wabak; atau</li>
                                    <li>Lain-lain kos berkaitan mitigasi risiko</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_d Anggaran_d_0" onclick="AnggaranD('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_d Anggaran_d_1" onclick="AnggaranD('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranD" name="AnggaranD">
                              </tr>
                              <tr>
                                <td class="td-2">4.6</td>
                                <td class="td-3">
                                Kos berkaitan perolehan teknologi dan peralatan
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                Adakah sudah dikenal pasti anggaran kos berkaitan perolehan teknologi dan peralatan? <br> cth:
                                  <ol>
                                    <li>
                                    Penggunaan teknologi baru untuk pembinaan
                                    projek jalan ; atau
                                    </li>
                                    <li>
                                    Lain-lain kos yang berkaitan dengan 
                                    perolehan teknologi dan peralatan.
                                    </li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_e Anggaran_e_0" onclick="AnggaranE('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_e Anggaran_e_1" onclick="AnggaranE('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranE" name="AnggaranE">
                              </tr>
                              <tr>
                                <td class="td-2">4.7</td>
                                <td class="td-3">
                                  Kos berkaitan keperluan unik
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                Adakah sudah dikenal pasti anggaran kos berkaitan keperluan unik? <br> cth:
                                  <ol>
                                    <li>Reka bentuk ikonik; atau</li>
                                    <li>Keperluan reka bentuk seismik; atau</li>
                                    <li>Lain-lain kos yang berkaitan unik</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_f Anggaran_f_0" onclick="AnggaranF('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_f Anggaran_f_1" onclick="AnggaranF('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranF" name="AnggaranF">
                              </tr>
                              <tr>
                                <td class="td-2">4.8</td>
                                <td class="td-3">Penilaian semasa</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                Adakah anggaran projek berdasarkan penilaian semasa?
                                  <ol>
                                    <li>Anggaran tahun semasa; atau</li>
                                    <li>
                                    Asas Rujukan Anggaran kos (<i>rule of thumb</i>)
                                    </li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Anggaran_g Anggaran_g_0" onclick="AnggaranG('0')"></td>
                                <td class="td-7 td-bg-red Anggaran_g Anggaran_g_1" onclick="AnggaranG('1')">X</td>
                                <input type="hidden" Value="1" id="AnggaranG" name="AnggaranG">
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#STRATEGI"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <i class="ri-treasure-map-line ri-2x icon_white"></i>
                            <p class="collapsedBtn">5. STRATEGI PELAKSANAAN</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="STRATEGI"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:coral;">
                              <tr>
                                <th scope="col" >TUMPUAN SEMAKAN</th>
                                <th colspan="2" scope="col">KETERANGAN</th>
                                <th colspan="2" scope="col">SENARAI SEMAK</th>
                                <th scope="col">Y</th>
                                <th scope="col">T</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td rowspan="2">Pelaksanaan</td>
                                <td>5.1</td>
                                <td>Kaedah Pelaksanaan</td>
                                <td class="td-bg-yellow">*a)</td>
                                <td class="td-bg-yellow">
                                Adakah kaedah pelaksanaan telah dikenal pasti?
                                  <ol>
                                    <li>Konvensional Dalaman</li>
                                    <li>Perunding</li>
                                    <li>Reka dan Bina</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green Strategy Strategy_0" onclick="Strategy('0')"></td>
                                <td class="td-7 td-bg-red Strategy Strategy_1" onclick="Strategy('1')">X</td>
                                <input type="hidden" Value="1" id="Strategy" name="Strategy">
                              </tr>
                              <tr>
                                <td>5.2</td>
                                <td>Tempoh pelaksanaan</td>
                                <td>a)</td>
                                <td>
                                Adakah tempoh pelaksanaan yang realistik telah mengambil
                                kira fasa perancangan, reka bentuk, perolehan, pembinaan, 
                                penyerahan (kitar hayat projek)?
                                </td>
                                <td class="td-6 td-bg-green Strategy_a Strategy_a_0" onclick="StrategyA('0')"></td>
                                <td class="td-7 td-bg-red Strategy_a Strategy_a_1" onclick="StrategyA('1')">X</td>
                                <input type="hidden" Value="1" id="StrategyA" name="StrategyA">
                              </tr>
                            </tbody>
                          </table>
                          <div class="nota-container">
                            <p class="nota-topic text-dark">Nota:</p>
                            
                              <p class="mb-0 text-dark">
                                - Sila tandakan 'X' pada 'Y' untuk YA, Sila tandakan 'X' pada 'T' untuk TIDAK. 
                              </p>
                              <p class="mb-0 text-dark">- Status HIJAU jika semua soalan dijawab YA.</li>
                              <p class="mb-0 text-dark">
                                - Status MERAH jika salah satu soalan dijawab TIDAK
                                  kecuali soalan 1.1 a), 3.1 a), 3.2 a) dan 5.1 a).
                              </p>
                              <p class="mb-0 text-dark">
                                - Laporan GN0 boleh diisi berulang-ulang kali pada
                                  bila-bila masa sekiranya keputusan masih MERAH.
                              </p>
                              <p class="mb-0 text-dark">
                                - Keputusan semakan sama ada HIJAU/MERAH telah
                                  diprogramkan secara automatik dalam templat ini.
                              </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#PENGESYORAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                            id="GNO_STAT"
                          >
                            <span class="iconify icon_white mdi_icon" data-icon="mdi-layers-search"></span>
                            <p class="collapsedBtn">6. PENGESYORAN SEMAKAN GERBANG NILAI 0</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="PENGESYORAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <!-- <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td rowspan="2">Pelaksanaan</td>
                                <td>5.1</td>
                                <td>Kaedah Pelaksanaan</td>
                                <td>*a)</td>
                                <td>Adakah Kaedah pelaksanaan telah dikenal pasti?
                                  <ol>
                                    <li>Konvensional Dalaman</li>
                                    <li>Perunding</li>
                                    <li>Reka dan Bina</li>
                                    
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green">X</td>
                                <td class="td-7 td-bg-red"></td>
                              </tr>
                              <tr>
                                <td>5.2</td>
                                <td>Tempoh pelaksanaan</td>
                                <td>a)</td>
                                <td>Adakah tempoh pelaksanaan yang realistik telah mengambil kira fasa perancangan, reka bentuk, perolehan, pembinaan, penyerahan (kitar hayat projek)?</td>
                                <td class="td-6 td-bg-green">X</td>
                                <td class="td-7 td-bg-red"></td>
                              </tr>
                            </tbody>
                            </table> -->
                            <input type="hidden" name="GNO_status"  id="GNO_status" Value="0">
                          <div class="vae_acc_6_conetnt">
                            <table>
                              {{-- <thead style="background-color:coral;">
                                <tr>
                                  <th scope="col" >TUMPUAN SEMAKAN</th>
                                  <th scope="col"></th>
                                  <th scope="col">KETERANGAN</th>
                                  <th scope="col"></th>
                                  <th scope="col">SENARAI SEMAK</th>
                                  <th scope="col">Y</th>
                                  <th scope="col">T</th>
                                  
                                </tr>
                              </thead> --}}
                              <tbody id="hijau" class="">
                                <tr>
                                  <td class="vae_text text-center green">
                                    HIJAU
                                  </td>
                                  <td class="text-center">
                                  <img
                                      src="{{ asset('assets/images/edit_small_pen.png') }}"
                                      alt=""
                                    />
                                  </td>
                                </tr>
                                <tr>
                                  <td class="vae_text text-center red">
                                    MERAH
                                  </td>
                                  <td class="text-center">
                                  </td>                                  
                                </tr>
                              </tbody>
                              <tbody id="merah" class="">
                                <tr>
                                  <td class="vae_text text-center green">
                                    HIJAU
                                  </td>
                                  <td class="text-center">
                                  </td>
                                </tr>
                                <tr>
                                  <td class="vae_text text-center red">
                                    MERAH
                                  </td>
                                  <td class="text-center w-100">
                                    <img
                                      src="{{ asset('assets/images/edit_small_pen.png') }}"
                                      alt=""
                                    />
                                  </td>                                  
                                </tr>
                              </tbody>
                            </table>
                            <p class="vae_p">
                              Ruangan yang ditanda `<img
                                src="{{ asset('assets/images/edit_small_pen.png') }}"
                                alt=""
                              />` merupakan keputusan semakan GN0
                            </p>

                            <table class="table table-striped vae_table_two w-100">
                              <tbody>
                                <tr>
                                  <td>
                                    Nama Pegawai Teknikal (Pegawai Penyedia)
                                    <div id="hoverTest9" style="display: contents;">
                                      <span class="iconify info_icon" data-icon="mdi-information"></span>
                                    </div>
                                    <div id="customTooltip9" class="hideme9 vae_info" style="position: absolute;
                                    z-index: 1;
                                    background: #e9e6e6;
                                    width: 160px;
                                    padding: 5px;
                                    left: 40%;
                                    border-radius: 8px;
                                    box-shadow: inset 0 -3em 3em rgb(0 0 0 / 10%);">
                                      <p class="p-1">Pegawai penyedia merupakan penyemak 2</p>
                                    </div>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Jawatan</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Ulasan</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Tandatangan</td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>

                            <h4>PENGESAHAN</h4>
                            <div class="table_scroll">
                              <table class="table table-striped vae_table_two w-100">
                                <tbody>
                                  <tr>
                                    <td>Nama KSU/Pegawai Diberi Kuasa</td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Jawatan</td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Tarikh Keputusan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Ulasan</td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Tandatangan</td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="brief_project_content_footer">
                @if(!$is_submitted)
                  <button type="button" id="vaeSaveBtn" class="updateBtn">Simpan</button>
                  @endif
                  <button type="button" id="projectVaenext" style="background-color: #0ACF97">
                        <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'dokumen'])}}">Seterusnya</a>
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
    <section>
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
                    <h3 class="vms p-0" style="font-size: 0.9rem; font-weight: 600;">
                      *Bahagian dikehendaki melaksanakan Value Management
                      Strategic (VMS)
                    </h3>
  
                    <div class="btn_holder d-flex">
                      <button data-dismiss="modal" class="fix_button TutupBtn">
                        Tutup
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('project.common-scripts')
     @include('project.VAE.script')

    @endsection