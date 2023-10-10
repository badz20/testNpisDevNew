@include('project.list.style')
@extends('layouts.main.master_responsive')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    
@section('content_main')
  <!-- Mainbody_conatiner Starts -->
  <div class="Mainbody_conatiner ml-auto" style="width: 100% !important">
    <x-form.spinner>
      <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
      </x-slot>
    </x-form.spinner>
    <div class="Mainbody_content mtop">
      <div class="Mainbody_content_nav_header project_register row">
        <div class="col-lg-5 col-xs-12">
          <h4 class="project_list">Senarai Permohonan Projek</h4>
        </div>
        <div class="col-lg-7 col-xs-12 path_nav_col">
          <ul class="path_nav row">
            <li>
              <a href="#" class="text-info" style="display: flex; align-items: center;">
                <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-briefcase-variant"></span>
                Permohonan Projek
                <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
              </a>
            </li>
            {{-- <li>
              <a href="#"
              class="text-info"
              >
                Permohonan Projek
                <img
                  class="arrow_nav"
                  src="assets/images/arroew.png"
                  alt="arroew"
              /></a>
            </li> --}}
            <li><a href="#" class="active text-secondary"> Senarai Permohonan Projek</a></li>
          </ul>
        </div>
      </div>
      <div class="project_register_content_container">
            <div class="project_register_search_container mt-3">
              <div class="project_register_search_header d-flex m-4">
                <div class="icon_yellow_bg">
                  <i class="ri-search-line ri-2x" class="position-absolute tick"></i>
                </div>
                <h4 style="margin-left: 0.5rem;">Carian Permohonan projek</h4>
              </div>
              <div class="project_register_search_form_container">
                <form action="" method="post" id="search_form" name="myform">
                  <div class="row m-0">
                    <div class="col-lg-6 col-12">
                      <div class="row align-items-center">
                        <div class="col-lg-2 col-12"><label for="RMK">RMK</label></div>
                        <div class="col-lg-9 col-12 form-group">
                          <select class="form-control" id="rmk-dropdown" name="rmk">
                            
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-12 m-0">
                      <div class="row align-items-center">
                        <div class="col-lg-3 col-xs-12">
                          <label for="Rolling Plan">Rolling Plan </label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <select class="form-control" id="rolling-plan"  name="rolling_plan">
                            <option value="">--Pilih--</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-0 custom_padding">
                    <div class="custom_width col-lg-1 col-xs-12">
                      <label for="Nama Projek">Nama Projek</label>
                    </div>
                    <div class="col-lg-11 col-xs-12">
                      <div class="form-group p-0">
                          <textarea name="nama_project"
                                    id="nama_project"
                                    cols="30"
                                    rows="3"
                                    class="form-control col-lg-12 float-right"
                                    style="text-transform:uppercase"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row m-0 custom_padding">
                    <div class="col-lg-6 col-xs-12">
                      <div class="row align-items-center">
                        <div class="col-lg-2 col-xs-12">
                          <label for="Kod Projek">Kod Projek</label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            value=""
                            id="kod_project"
                            name="kod_project"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                      <div class="row align-items-center">
                        <div class="col-lg-3 col-xs-12">
                          <label for="Tahun Permohonan">Tahun Permohonan</label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <select class="form-control" id="current_year" name="current_year">
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
                  <div class="row m-0 mt-3">
                    <div class="col-lg-6 col-xs-12">
                      <div class="row align-items-center">
                        <div class="col-lg-2 col-xs-12">
                          <label for="Bahagian">Bahagian</label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <select class="form-control" id="bahagian" name="bahagian">
                          <option value="">--Pilih--</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-lg-6 col-xs-12">
                      <div class="row align-items-center">
                        <div class="col-lg-3 col-xs-12">
                          <label for="Negeri">Negeri</label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <select class="form-control" id="negeri-dropdown" name="negeri_drop">
                            <option value="">--Pilih--</option>
                          </select>
                        </div>
                      </div>
                    </div> --}}
                    <div class="col-lg-6 col-xs-12" id="no_rajukan_div">
                      <div class="row align-items-center">
                        <div class="col-lg-3 col-xs-12">
                          <label for="no_rajukan">No. Rujukan Permohonan</label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <input
                            type="text"
                            class="form-control"
                            value=""
                            id="no_rajukan"
                            name="no_rajukan"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-0 mt-3">
                    <div class="col-lg-6 col-xs-12">
                      <div class="row align-items-center">
                        <div class="col-lg-2 col-xs-12">
                          <label for="Jenis Permohonan">Jenis Permohonan</label>
                        </div>
                        <div class="col-lg-9 col-xs-12 form-group">
                          <select class="form-control" id="projek_category" name="projek_category">
                            <option value="">--Pilih--</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-4">
                     {{-- 2023 March 17 by Nabilah --}}
                    <button class="reset" type="button" id="btn_reset">Set Semula</button>
                    <button class="cari text-center" type="button" id="btn_cari">Cari</button>
                  </div>
                </form>
              </div>
            </div>
        <div class="project_register_table_container  mt-3">
          
          <div class="table_holder p-3">
            <div class="project_register_table_header dropdown dropleft m-0 row">
              <div class="col-lg-10 col-md-10 col-12" style="display: flex; align-items:center;">
                <i class="ri-file-list-line ri-2x icon_header icon_yellow_bg"></i>
                <h4 class="mt-1 ml-1 text-secondary padding_custom">SENARAI PERMOHONAN PROJEK</h4>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <button
                  class="ml-auto blue"
                  type="button"
                  id="dropdownMenuButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  style="float: right;"
                >
                  <i class="ri-printer-fill icon_white ri-2x"></i>
                </button>
                <div
                  class="dropdown-menu"
                  aria-labelledby="dropdownMenuButton"
                  style="float: right;!important; min-width: 0rem!important;"
                >
                  <button
                    class="dropdown-item d-flex align-items-center"  onClick="downloadExcel()"
                    ><p class="m-0">
                      <img src="assets/images/excel_green.png" alt="" class="excel" />Excel
                    </p>
                    <img src="assets/images/printer_black.png" alt="" class="ml-2"
                  /></button>
                  <button
                    class="dropdown-item d-flex align-items-center" onclick="downloadPdf()"
                    ><p class="m-0">
                      <img src="assets/images/pdf_Red.png" class="pdf" alt="" />Pdf
                    </p>
                    <img src="assets/images/printer_black.png" alt="" class="ml-2"
                  /></button>
                </div>
              </div>
            </div>
            <div class="mt-2">
              <table id="projectTable" class="table table_preview application_list table-responsive" style="width: 100% !important; ">
                <thead>
                  <tr>                  
                    <th>Bil</th>
                    <th>No. Rujukan</th>
                    <th>Kod Projek</th>
                    <th style="white-space:nowrap; position: sticky;
                    left: 0;
                    z-index: 1;
                    background-color: #fff;">Nama Projek</th>
                    <th style="white-space:nowrap;">Kos Projek (RM)</th>
                    <th>Siling Dimohon 2023 (RM)</th>
                    <th>Siling Bayangan 2023 (RM)</th>
                    <th>Negeri</th>
                    <th>Bahagian</th>
                    <th>Jenis Kategori</th>
                    <th>Jenis Permohonan</th>
                    <th>Status Permohonan</th>
                    <th>Tahun Permohonan</th>
                    <th>RMK</th>
                    <th style="white-space:nowrap;">Rolling Plan</th>
                    <th>Daerah</th>
                    <th>PPT Download</th>
                    <th>Updated date</th>
                  </tr>
                </thead>
                <tbody>                
                </tbody>
              </table>
            </div>
            {{-- <div class="table_footer d-flex flex-sm-row flex-column align-items-center">
              <p class="m-0">Papar 1 ke 10 daripada 50 entri</p>
              <div class="VM_footer">
                <ul class="list-items">
                  <li>Awal</li>
                  <li>Sebelum</li>
                  <ul>
                    <li class="active_footer">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                  </ul>
                  <li>Seterusnya</li>
                  <li>Akhir</li>
                </ul>
              </div>
            </div> --}}
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
  <!-- Mainbody_conatiner Starts -->
</div>

<section>
  <div class="container"></div>
</section>
@include('project.list.scripts')

@endsection
