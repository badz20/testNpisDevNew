
@include('users.dashboard.style')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('RollingPlan.Senarai_Peruntukan.style')

<!-- HEADER Section Ends -->
<div class="Mainbody_content mtop">
    <div class="Mainbody_content_nav_header project_register row align-items-center m-1">
      <div class="col-md-3 col-xs-12">
        <h4 class="project_list">Senarai Permohonan</h4>
      </div>
      <div class="col-md-6 col-xs-12 path_nav_col">
        <ul class="path_nav d-flex align-content-center flex-wrap">
          <li class="">
            <a href="#" style="display: flex; align-items: center;">
              <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-timer-sand"></span>
               Permohonan Peruntukan Di Luar Rolling Plan (RP)
               <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
            </a>
          </li>
          <li style="display: flex; align-items: center;">
            <a href="#" class="active">Senarai Peruntukan </a>
          </li>
        </ul>
      </div>
    </div>
    
    <div class="project_register_content_container">
      <div class="project_register_search_container mt-3">
        <div class="project_register_search_header ml-2 mt-2 d-flex">
          <i class="ri-search-line ri-2x icon_header icon_yellow_bg" class="position-absolute tick"></i>
          <h4>Carian Permohonan</h4>
        </div>
        <div class="project_register_search_form_container">
          <form>

              <div class="row m-1">
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12 pemberat_title"><label class="" for="">Tajuk Permohonan</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <textarea class="form-control" name="" id="query_tajuk" cols="30" rows="1" style="text-transform: uppercase;"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12 pemberat_title"><label class="" for="">Jenis Pemohon</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_jenis">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-1">
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="">Negeri</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_negeri">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="">Status</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_status">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-1">
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="">Bahagian</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_bahagian">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12 p-0 py-1">
                    <div class="row align-items-center">
                      <div class="col-md-3 col-xs-12"><label class="pemberat_title" for="">Tahun</label></div>
                      <div class="col-md-8 col-xs-12 form-group">
                       <select class="form-control" name="" id="query_tahun">
                        <option value="">--Pilih--</option>
                       </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-md-center">
                        <button class="mr-1 mb-2 resetbtn" type="button" id="resetbtn">Set Semula</button>
                        <button class=" mr-1 mb-2 rp_simpanBtn caribtn" type="button" id="caribtn" style="width: 10%;">Cari</button>
                </div>
          </form>
        </div>
      </div>
      <br><br>
      <div class="project_register_table_container">
        <div class="card project_register_search_container">
          <div class="mt-2 project_register_search_container d-flex col-md-12">
            <div class="project_register_search_header d-flex col-md-9 mr-5">
              <i class="ri-file-list-line ri-2x icon_header icon_yellow_bg"></i>
              <h4 class="text-left">Senarai Permohonan</h4>
            </div>
            <div class="row ml-5">
            <div class="pemberat_content_header_right text-center ml-auto ">
              <button id="pemberat_greenBtn" class="pemberat_greenBtn">Tindakan BKOR
                </button>
            </div>
            <!-- <button class="btn btn-success col-md-2 col-xs-12 ml-auto mt-3">Tindakan BKOR</button> -->
            
          
        </div>
        <div class="userlist_content_header_right col-md-1 text-center ml-auto">
          <button class="printing col-xs-12">
          <img
              src="assets/images/printing (1) 2.png"
              alt="printing" onclick="printDataTable()"
          />
          </button>
      </div>
          </div>
          <hr>
          <div class="userlist_tab_content_header">
            <!-- <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
              <button class="active">MAKMAL VA</button>
              <button>MAKMAL MINI VA</button>
            </div> -->
            <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="master_data" style="width: 100%!important;" class="display p-3 userlist_tab_content_table table table-responsive">
                                <thead>
                                    <tr>
                                      <th>Bil</th>                           
                                      <th>Tahun Permohonan</th>
                                      <th>Tajuk Permohonan </th>
                                      <th>Jenis Pemohon</th>
                                      <th>Tarikh Permohonan</th>
                                      <th>Bahagian</th>
                                      <th>Negeri</th>
                                      <th>Kos (RM)</th>
                                      <th>Status</th>
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
                  <div class="userlist_tab_content">
                        <div class="userlist_tab_contents_holder">
                            <div id="jps_card" class="card-body border p-3">
                               
                            </div> <!-- end card-body-->
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

    @include('RollingPlan.Senarai_Peruntukan.script')

    @endsection