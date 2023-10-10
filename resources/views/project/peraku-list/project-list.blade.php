@include('project.peraku-list.style')
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
          <h4 class="project_list">Peraku Permohonan Projek</h4>
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
            <li><a href="#" class="active text-secondary"> Peraku Permohonan Projek</a></li>
          </ul>
        </div>
      </div>
      <div class="project_register_content_container">
        
        <div class="project_register_table_container  mt-3">
          
          <div class="table_holder p-3">
            <div class="project_register_table_header dropdown dropleft m-0 row">
              <div class="d-flex col-md-5 project_list" style="align-items: center;">
                <div class="icon_yellow_bg">
                  <i class="ri-file-list-line ri-2x icon_header"></i>
                </div>
                <h4 class="padding_custom">PERAKU PERMOHONAN PROJEK</h4>
              </div>
              <div class="d-flex col-md-5" style="justify-content: end;">
                <button
                  class="ml-auto d-flex flex-column justify-content-center blue"
                  type="button"
                  id="dropdownMenuButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="iconify icon_white mdi_icon" data-icon="mdi-tray-arrow-down"></span>
                </button>
                <div
                  class="dropdown-menu dropdown_menu"
                  aria-labelledby="dropdownMenuButton"
                >
                  <a
                    class="dropdown-item d-flex justify-content-between align-items-center"
                    href="#" id="excelBtn"
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
            </div>
            <div class="mt-2">
            <table id="projectTable" class="table table_preview application_list table-responsive" style="width: 100% !important">
              <thead>
                <tr>                  
                  <th>Bil</th>
                  <th>No. Rujukan</th>
                  <th>Kod Projek</th>
                  <th>Nama Projek</th>
                  <th>Kos Projek (RM)</th>
                  <th>Siling Dimohon 2023 (RM)</th>
                  <th>Siling Bayangan 2023 (RM)</th>
                  <th>Negeri</th>
                  <th>Bahagian</th>
                  <th>Kategori</th>
                  <th>Jenis Permohonan</th>
                  <th>Status Permohonan</th>
                  <th>Pemberat</th>
                  <th>Susunan Keutamaan<br>Negeri</th>
                  <th>Susunan Keutamaan<br>Bahagian</th>
                  <th>Susunan Keutamaan<br>Jabatan</th>
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

  <!-- Mainbody_conatiner Starts -->
</div>

<x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
</x-form.spinner>

<section>
  <div class="container"></div>
</section>

<section>
    <div class="add_role_sucess_modal_container">
        <div class="modal fade" id="add_role_sucess_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog" role="document">
                <div class="modal-content add_role_sucess_modal_content" style="width:88% !important; background-color: transparent;">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                        </div>
                        <div class="add_role_sucess_modal_body_Content text-center" id="user_pop-up">
                        <div class="add_role_sucess_modal_header col-md-12 justify-content-end">
                        <button
                            type="button"
                            class="btn-close text-right"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            style="border: transparent; background-color: transparent; color: #fff; text-align: right;"
                            ><i class="ri-close-fill" style="font-size: 1rem;"></i></button>
                        </div>
                        <label class="modal_header_prestasi mt-2 mb-2" id="save_text">Maklumat anda berjaya di simpan<br></label>
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
              id="Priority_set_model"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true"
              style="width:100%;left:0% !important;padding-right:0% !important;"
              data-backdrop="static" data-keyboard="false"
            >
              <div
                class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
                role="document"
              >


                <div class="modal-content project_register_form_modal_content">
                    <div class="modal-body project_register_form_modal_body">
                      <div class="project_register_form_modal_body_Content">
                        <h3 class="success_header p-0 mb-2">
                          PERHATIAN
                        </h3><br>
                        <p class="batal_red" id="batal_red">Sila gunakan nombor keutamaan lain. Nombor ini telah digunakan</p>
                        <div class="btn_holder d-flex">
                          <button data-dismiss="modal" class="fix_button green" id="fix_button"> 
                            Ya
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
                  
              </div>
            </div>
          </div>
        </section>
@include('project.peraku-list.script')

@endsection
