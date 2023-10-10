@extends('layouts.main.master_responsive')

@section('content_main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('selenggaraviews.dashboard.style')


      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <!-- HEADER Section starts -->
        <x-form.spinner>
          <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner>
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header project_register  row">
            <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
              <h4>Selenggara Dashboard Analisis</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="/home"  style="display: flex; align-items: center;">
                    <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                    Pentadbir
                    <img
                      class="arrow_nav ml-2"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                    />
                  </a>
                </li>    
                {{-- <li>
                  <a href="#">
                    Pentadbir
                    <img
                      class="arrow_nav"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                  /></a>
                </li> --}}
                <li><a href="/selenggara_dashboard_analisis" class="active text-secondary">Selenggara Dashboard Analisis </a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header row">
                <div class="col-md-5 col-xs-12 userlist_content_header_left d-flex">
                  <div class="icon_yellow_bg">
                  <span class="iconify icon_header_pentadbir" data-icon="mdi-clipboard-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="dashboard_label" >SELENGGARA DASHBOARD ANALISIS</h3>
                </div>
                <div class="col-md-7 col-xs-12  userlist_content_header_right d-flex">
                  <button class="add_pengguna"
                  data-target="#add_selenggara_data_modal"
                  data-toggle="modal" 
                  style="height: 39px; width:100px; display: flex; align-items: center;"
                  >
                    <i class="ri-add-circle-fill icon_white ri-2x pl-2" style=""></i> Data
                  </button>
                  {{-- <button 
                  class="printing"
                  style="height: 39px; width: 55px; display: flex; align-items: center;"
                  >
                    <i class="ri-printer-fill icon_white ri-2x"></i>
                  </button> --}}
                  <x-form.print></x-form.print>

                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="tableData" style="width: 100%!important;" class="display p-3 userlist_tab_content_table table table-responsive">
                                <thead>
                                    <tr>
                                        <th width="100%">Nama</th>
                                        <th width="100%">Keterangan</th>
                                        <th width="100%">Pautan</th> 
                                        <th width="100%">Status</th>                            
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
        </div>
        <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
        <!-- HEADER Section Ends -->
      </div>
      <!-- Mainbody_conatiner Starts -->
    </div>
    <!-- script section starts -->
    {{-- Add Modul modal --}}
    <section>
        <div class="add_selenggara_data_modal_container">
          <div
            class="modal fade"
            id="add_selenggara_data_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered add_selenggara_data_modal_dialog"
              role="document"
            >
              <div class="modal-content add_selenggara_data_modal_content">
                <div
                  class="add_selenggara_data_modal_header d-flex justify-content-between"
                >
                  <div class="d-flex align-items-center">
                    <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                    <h5> Data </h5>
                  </div>
  
                  <button type="button" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="modal-body add_selenggara_data_modal_body">
                  <form id="modul_form1" role="form">
                    <input type="hidden"  id="id" name="id">
                    <div class="form-group">
                        <label class="required" for="modul_name">Nama</label>
                        <select required  class="form-control form-select" name="modul_name" id="modul_name">                        
                        <option value='' id='' selected>--Pilih--</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label class="required" for="pautan_nama">Pautan</label>
                        <input
                            type="url"
                            class="form-control"
                            id="pautan_nama"
                            name="pautan_nama"
                            required
                        />
                        </div>
                        <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control"id="keterangan"name="keterangan"rows="3"required></textarea>
                        </div>
                        <label class="text-danger" id="errorLabel"></label>
                        <div class="add_selenggara_data_modal_footer text-center">
                            <input type="button" class="btn btn-danger m-4" id="close" value="Batal" data-dismiss="modal" aria-label="Close">
                            <input type="button" class="btn btn-primary m-4" id="submit" value="Simpan">
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- Edit Modul modal --}}
    <section>
        <div class="add_selenggara_data_modal_container">
          <div
            class="modal fade"
            id="edit_selenggara_data_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
            
          >
            <div
              class="modal-dialog modal-dialog-centered add_selenggara_data_modal_dialog"
              role="document"
            >
              <div class="modal-content add_selenggara_data_modal_content">
                <div
                  class="add_selenggara_data_modal_header d-flex justify-content-between"
                >
                  <div class="d-flex align-items-center">
                    <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                    <h5>Kemaskini Data </h5>
                  </div>
  
                  <button type="button" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="modal-body add_selenggara_data_modal_body">
                  <form id="modul_form2" role="form">
                    <input type="hidden"  id="id" name="id">
                    <div class="form-group">
                        <label for="modul_name">Nama</label>
                        <select required  class="form-control form-select" name="edit_modul_name" id="edit_modul_name">                        
                        <option value='' id=''>--Pilih--</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="edit_pautan_nama">Pautan</label>
                        <input
                            type="url"
                            class="form-control"
                            id="edit_pautan_nama"
                            name="edit_pautan_nama"
                            required
                        />
                        </div>
                        <div class="form-group">
                        <label for="edit_keterangan">Keterangan</label>
                        <textarea class="form-control"id="edit_keterangan"name="edit_keterangan"rows="1"cols="50"required></textarea>
                        </div>
                        <label class="text-danger" id="edit_errorLabel"></label>
                        <div class="add_selenggara_data_modal_footer text-center">
                            <input type="button" class=" m-4 " id="close" value="Batal" data-dismiss="modal" aria-label="Close">
                            <input type="button" class=" m-4 " id="edit_submit" value="Simpan">
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('selenggaraviews.dashboard.script')
    @endsection

