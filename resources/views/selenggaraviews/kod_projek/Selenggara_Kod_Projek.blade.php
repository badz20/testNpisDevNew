@extends('layouts.main.master_responsive')
@include('selenggaraviews.kod_projek.style')
@section('content_main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<x-form.spinner>
    <x-slot name="message">
      Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner>
      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <!-- HEADER Section starts -->
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
              <h4>Selenggara Kod Projek</h4>
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
                <li><a href="/Selenggara_Kod_Projek" class="active text-secondary">Selenggara Kod Projek</a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header">
                <div class="userlist_content_header_left d-flex ">
                  <div class="icon_yellow_bg">
                  <span class="iconify icon_header_pentadbir" data-icon="mdi-clipboard-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="dashboard_label"> SELENGGARA KOD PROJEK</h3>
                </div>
                <div class="userlist_content_header_right d-flex">
                  
                  <button 
                  class="printing"
                  onClick="window.print()"
                  style="height: 39px; width: 55px; display: flex; align-items: center;"
                  >
                    <i class="ri-printer-fill icon_white ri-2x"></i>
                  </button>
                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content" id="TableContent">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3 table_scroll">
                            <table id="tableData" width="100%" class="display p-3 userlist_tab_content_table table">
                                <thead>
                                    <tr>
                                        <th>Kod Projek</th>
                                        <th>Nama Kementerian</th>
                                        <th>Tindakan</th>                       
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
                  <div class="userlist_tab_content d-none" id="TableContent2">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3 table_scroll">
                            <table id="tableData2" width="100%" class="display p-3 userlist_tab_content_table table">
                                <thead>
                                    <tr>
                                        <th>Kod Projek</th>
                                        <th>Nama Projek</th>                       
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
                  class="add_selenggara_data_modal_header d-flex justify-content-between bg-info"
                >
                  <div class="d-flex align-items-center">
                    {{-- <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i> --}}
                    <h5>Kemaskini Kod Projek</h5>
                  </div>
  
                  <button type="button" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="modal-body add_selenggara_data_modal_body">
                    <label id="nodata" class="d-none">No Data Available</label>
                  <form id="modul_form1" role="form">
                    <input type="hidden"  id="project_id" name="project_id">
                    <div class="form-group">
                        <label for="kementerian_nama">Nama</label>
                        <input
                        type="url"
                        class="form-control"
                        id="kementerian_nama"
                        name="kementerian_nama"
                        disabled
                        required
                        />
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="kod_asal">Kod Asal</label>
                        <input
                            type="url"
                            class="form-control"
                            id="kod_asal"
                            name="kod_asal"
                            disabled
                            required
                        />
                        </div>
                        <div class="form-group">
                        <label for="kod_baharu">Kod Baharu</label>
                        <input class="form-control"
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                        maxlength="2"
                        id="kod_baharu"
                        name="kod_baharu"
                        rows="3"
                        required
                        placeholder="Masukkan hanya dua Nombor"
                        maxlength="2"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                        >
                        </textarea>

                        </div>
                        <label class="text-danger" id="errorLabel"></label>
                        <div class="add_selenggara_data_modal_footer text-center">
                            <input type="button" class=" m-4 " id="close" value="Batal" data-dismiss="modal" aria-label="Close">
                            <input type="button" class=" m-4 " id="submit" value="Simpan">
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('selenggaraviews.kod_projek.script')
    @endsection
