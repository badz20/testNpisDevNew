@include('project.Permohonan-Projek-list.style')
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
      <div class="Mainbody_content_nav_header project_register d-flex">

        <div class="col-lg-5 col-xs-12">
          <h4>Daftar Permohonan Projek</h4>
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
            <li>
              <a href="#" class="active text-secondary"> Daftar Projek </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="project_register_content_container">
        <div class="project_register_box_container grid-class">
            <div class="project_register_box_child card">
              <div class="project_register_box_content">
                <div>
                  <div class="content_unique_image">
                    <i class="ri-pencil-fill ri-3x icon_black"></i>
                  </div>
                  <h3 id="daftar_peneyedian_count"></h3>
                  <h4>Dalam Penyediaan</h4>
                </div>
                <p>
                  Bilangan projek yang berstatus dalam penyediaan <br />Jumlah
                  Siling Dimohon 2023: RM 400,000.00
                </p>
              </div>
            </div>
            <div class="project_register_box_child card">
              <div class="project_register_box_content">
                <div>
                  <div class="content_unique_image">
                    <i class="ri-file-text-line ri-3x icon_black"></i>
                  </div>
                  <h3 id="daftar_semak_count"></h3>
                  <h4>Untuk Semakan</h4>
                </div>
                <div class="d-flex tabl">
                    <div class="col-6 d-flex tabl_child" style="justify-content: center;">
                      <div>Penyemak:</div>
                      <div id="daftar_semak_count3">&nbsp;</div>
                    </div>
                    <div class="col-6 d-flex tabl_child" style="justify-content: center;">
                      <div>Penyemak 1:</div>
                      <div  id="daftar_semak_count1">&nbsp;</div>
                    </div>
                    <div class="col-6 d-flex tabl_child" style="justify-content: center;">
                      <div>Penyemak 2:</div>
                      <div id="daftar_semak_count2">&nbsp;</div>
                    </div>
                </div>
                <p>
                  Bilangan projek yang berstatus untuk semakan<br />Jumlah
                  Siling Dimohon 2023: RM 400,000.00
                </p>
              </div>
            </div>
            <div class="project_register_box_child card">
              <div class="project_register_box_content">
                <div>
                  <div class="content_unique_image mb-2">
                    <span class="iconify icon_black pengesahan_icon" data-icon="mdi-handshake-outline"></span>
                  </div>
                  <h3 id="daftar_pengesh_count"></h3>
                  <h4>Untuk Pengesahan</h4>
                </div>
                <p>
                  Bilangan projek yang berstatus untuk pengesahan<br />Jumlah
                  Siling Dimohon 2023: RM 400,000.00
                </p>
              </div>
            </div>
            <div class="project_register_box_child card">
              <div class="project_register_box_content">
                <div>
                  <div class="content_unique_image d-flex">
                    <div class="mx-auto position-relative">
                      <i class="ri-user-3-fill ri-3x icon_black"></i>
                      <img
                        src="assets/images/edit_small_pen.png"
                        alt=""
                        class="position-absolute tick"
                      />
                    </div>
                  </div>
                  <h3 id="daftar_perakuan_count"></h3>
                  <h4>Untuk Perakuan</h4>
                </div>
                <p>
                  Bilangan projek yang berstatus untuk perakuan <br />
                  Jumlah Siling Dimohon 2023: RM 400,000.00 <br />
                  <span id="siling_bkor">Jumlah Siling Bayangan 2023: RM <label id="perakuan_bayangan_value"></label></span>
                </p>
              </div>
            </div>
          </div>
        <div class="project_register_table_container">
            <div class="card mt-4">
                <div class="card-body p-0">
                    <div class="project_register_table_header dropdown dropleft m-0 row">
                        <div class="d-flex col-md-5 project_list" style="align-items: center;">
                          <div class="icon_yellow_bg">
                            <i class="ri-file-list-line ri-2x icon_header"></i>
                          </div>
                          <h4 class="padding_custom">SENARAI PERMOHONAN PROJEK</h4>
                        </div>
                        <div class="d-flex col-md-5" style="justify-content: end;">
                          <a href="/Daftar-Permohonan-Projek" class="m-1" style="text-decoration: none;"><button class="add_pengguna btn btn-success " style="    width: 164px; height: 43px; display: flex; align-items: center;" >
                            <i class="ri-add-circle-fill icon_white ri-2x pl-2" style="margin: 0.25rem;"></i>
                              Daftar Projek    
                          </button></a>
                            <a class="m-1"><button class="add_pengguna btn btn-info" id="excelBtn">
                              <i class="ri-printer-fill icon_white ri-2x" style="margin: 0.25rem;"></i>
                            </button></a>
                        </div>
                    </div>    
                    <div
                        class="dropdown-menu dropdown_menu"
                          aria-labelledby="dropdownMenuButton"
                        >
                          <a
                            class="dropdown-item d-flex justify-content-between align-items-center"
                            href="#"
                            ><p class="m-0">
                              <img src="assets/images/excel_green.png" alt="" /> Excel
                            </p>
                            <img src="assets/images/printer_black.png" alt=""
                          /></a>
                          <a
                            class="dropdown-item d-flex justify-content-between align-items-center"
                            href="#"
                            ><p class="m-0">
                              <img src="assets/images/pdf_Red.png" class="pdf" alt="" />
                              Pdf
                            </p>
                            <img src="assets/images/printer_black.png" alt=""
                          /></a>
                        </div>
                      </div>
                  <div class="table_holder p-3">
                      <div class="mt-2">
                        <table id="projectTable" class="table table_preview application_list table-responsive" style="width: 100% !important">
                        <thead>
                            <tr>                  
                            <th>Bil</th>
                            <th>No. Rujukan Permohonan</th>
                            <th>Kod Projek</th>
                            <th>Nama Projek</th>
                            <th style="white-space:nowrap;">Kos Projek (RM)</th>
                            <th>Siling Dimohon 2023 (RM)</th>
                            <th>Siling Bayangan 2023 (RM)</th>
                            <th>Negeri</th>
                            <th>Bahagian</th>
                            <th>Jenis Kategori</th>
                            <th>Jenis Permohonan</th>
                            <th>Status Permohonan</th>
                            <th>Updated date</th>
                            <th>Tahun Permohonan</th>
                            <th>RMK</th>
                            <th style="white-space:nowrap;">Rolling Plan</th>
                            <th>Daerah</th>
                            <th>PPT Download</th>
                            </tr>
                        </thead>
                        <tbody>                
                        </tbody>
                        </table>
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
  </div>
  <!-- Mainbody_conatiner Starts -->
</div>

<section>
  <div class="container"></div>
</section>
@include('project.Permohonan-Projek-list.scripts')
@endsection
