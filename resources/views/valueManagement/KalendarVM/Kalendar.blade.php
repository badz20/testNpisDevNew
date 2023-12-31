@include('valueManagement.KalendarVM.style')
@extends('layouts.vmmodule.master')


@section('content_vmmodule')

@php
  $userType=Session::get('userType');
@endphp

<!-- Mainbody_conatiner Starts -->
<div class="Mainbody_conatiner ml-auto">
  <x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner> 
  <input type="hidden" value="{{$kod_projek}}" id="kod_projek">
  <input type="hidden" value="{{$type}}" id="type">

    <div class="Mainbody_content mtop">
      <div class="Mainbody_content_nav_header project_register align-items-center row">
        <div class="col-md-4 col-xs-12">
          <h5 id="top_link"><strong>Makmal Kajian Nilai (VA)</strong></h5>
        </div>
        <div class="col-md-8 col-xs-12 path_nav_col">
          <ul class="path_nav row">
            <li>
              <a href="/senarai_makmal_and_mini" class="text-info" style="display: flex; align-items: center;">
                <i class="ri-calculator-fill icon_blue breadcrumbs_icon mr-1" style="font-size:1.2em; vertical-align:middle;"></i>
                  Value Management
                  <i class="ri-arrow-right-s-line ri-lg icon_arrow"></i>
              </a>
            </li>
            <li style="display: flex; align-items: center;">
              <a href="/senarai_makmal_and_mini" class="text-info" style="display: flex; align-items: center;">Senarai Projek
                <i class="ri-arrow-right-s-line ri-lg icon_arrow"></i>
              </a>
            </li>
            <li style="display: flex; align-items: center;">
              <a href="/maklumat_pelakasanaan_makmal/{{$kod_projek}}/{{$type}}" id="breadcrumb_link" class="text-info" style="display: flex; align-items: center;">Makmal Kajian Nilai (VA) 
              </a>
            </li>
            <li style="display: flex; align-items: center;">
              <a href="#" class="active" style="display: flex; align-items: center;">
                <i id="top_arrow" class="ri-arrow-right-s-line ri-lg icon_arrow"></i>
                Maklumat Perancangan Makmal Tahunan
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card m-3 cardKalendarVm">
        <div class="card-body">
          <div class="project_register_tab_container">
            <div class="project_register_tab_btn_container col-2">
                  <ul>
                    <li class="">
                        <div class="tab_image">
                        <a href="/load_ringkasan/{{$kod_projek}}/{{$type}}"><img src="{{ asset('Vm_module/assets/images/vmringkasanProjek_icon_blue.png') }}" alt="" /></a>
                        </div>
                        <h4>RINGKASAN<br>PROJEK</h4>
                    </li>
                    <li class="success active">
                        <div class="tab_image">
                        <a href="/KalendarVM/{{$kod_projek}}/{{$type}}"><img src="{{ asset('Vm_module/assets/images/vmmaklumat_perancangan_blue.png') }}" alt="" /></a>
                        </div>
                        <h4>
                        MAKLUMAT<br>
                        PERANCANGAN<br>MAKMAL TAHUNAN
                        </h4>
                    </li>
                    <li class="">
                        <div class="tab_image">
                        <a id="maklumat_pelakasanaan_makmal" href=""><img src="{{ asset('Vm_module/assets/images/vmmaklumat_pelaksanaan_blue.png') }}" alt="" /></a>
                        </div>
                        <h4>
                        MAKLUMAT<br>
                        PELAKSANAAN<br>MAKMAL
                        </h4>
                    </li>
                  </ul>
            </div>
            <div class="project_register_tab_content_container col-10">
            <h4 style="font-size: 1.3rem;"><strong>MAKLUMAT PERANCANGAN MAKMAL TAHUNAN</strong></h4>
              <div class="brief_project_container">
                <div class="brief_project_content">
                  <div class="project_register_search_header d-flex flex-sm-row flex-column align-items-center">
                    <i class="mdi mdi-wrench icon_header icon_yellow_bg mr-2" style="font-size: 1.7em;"></i>
                    <h6 class="m-0"><strong><label id="text_link">Makmal Kajian Nilai (VA)</label></strong></h6>
                    <div class="userlist_content_header_right">
                     
                    </div>
                  </div>
                  <div class="card-body row mt-4">
                    <div class="col-md-3 mt-2" style="padding-left: -15px; padding-right: -15px;">
                    
                      <div class="mb-4" id="add_btn_div">
                        <button type="button" data-toggle="modal" data-target="#exampleModal2"  class="vmKalendar_btn_grn"><img class="mr-3" src="{{ asset('assets/images/add_plus.png') }}">Daftar Makmal</button>
                      </div>

                      <div>
                        <span class="vmKalendar_info">Tambah tarikh-tarikh berikut dengan klik pada kalendar</span>
                      </div>
                      <div>
                        <button disabled class="vmKalendar_cadangan_grn"><img class="mr-3" src="{{ asset('assets/images/vmKalendar_green.png') }}">Cadangan Pra Makmal</button>
                      </div>
                      <div>
                        <button disabled class="vmKalendar_cadangan_yellow"><img class="mr-3" src="{{ asset('assets/images/vmKalendar_yellow.png') }}">Cadangan Makmal</button>
                      </div>
                      <div>
                        <button disabled class="vmKalendar_cadangan_blue"><img class="mr-3" src="{{ asset('assets/images/vmKalendar_blue.png') }}">Lawatan Tapak</button>
                      </div>
                      <div>
                        <button disabled class="vmKalendar_cadangan_violet"><img class="mr-3" src="{{ asset('assets/images/vmKalendar_violet.png') }}">Mesyuarat Stakeholder</button>
                      </div>
                    </div>
                        <div class="col-9 mt-2 text-secondary" id='calendar'></div>
                        <div class="col-9 mt-2 CalenderlistView d-none" style="margin-inline-start: auto;height: 600px;overflow: scroll; position: relative;top: -100px;">
                          <p id="noDataMessage" style="text-align: -webkit-center;" class="d-none h3">No Data present</p>
                          <table id="EventsListView" class="EventsListView d-none">
                          <table id="YearEventsListView" class="YearEventsListView d-none">
                          <table id="TodaysEventsListView" class="TodaysEventsListView d-none">
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
       <!-- Modal 2 -->
       <div class="vmadd_role_sucess_modal_container vmadd_role_sucess_modal_container">
        <div class="modal fade vm_modal_box_shadow" id="exampleModal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header vmmodal_header">
                <h5 class="modal-title" id="exampleModalLabel"><img class="mr-3"  src="{{ asset('assets/images/add_plus.png') }}"><span id="modal_link">Makmal Kajian Nilai (VA)</span></h5>
                <button type="button" class="ml-auto" data-dismiss="modal" aria-label="Close">
                  <i class="mdi mdi-window-close icon_white" style="font-size: 2em;" id="close_image"></i>
                </button>
               </div>
              <x-form.spinner>
                <x-slot name="message">
                    Sila tunggu sebentar sementara data sedang dimuatkan
                </x-slot>
              </x-form.spinner> 
              <form id="KalendarForm" class="kalendarModal"  role="form" name="KalendarForm">
                <input type="hidden" id="pp_id" value="">
                <div class="modal-body">
                  <div class="row mb-4">
                    <label class="col-md-2 col-xs-12" for="">Nama Projek</label>
                    <textarea style="font-size: 0.8rem; resize:none;" disabled class="form-control col-md-10 col-xs-12" name="projek_name" required id="projek_name" cols="30" rows="1"></textarea>
                  </div>
                  <div class="row mb-5">
                    <label class="col-md-2 col-xs-12" for="">Kategori</label>
                    <select style="font-size: 0.8rem;" class="form-control col-md-4 col-xs-12" name="kategori" id="kategori" required>
                      <option value="">--Pilih--</option>
                      <option value="1">Cadangan Pra Makmal</option>
                      <option value="2">Cadangan Makmal</option>
                      <option value="3">Lawatan Tapak</option>
                      <option value="4">Mesyuarat Stakeholder</option>
                    </select>
                    <span class="error" id="error_kategori"></span>
                  </div>
                  <div>
                    <span class="error" id="error_Tarikh_Mula"></span>
                    <span class="error" id="error_Tarikh_Tamat"></span>
                  </div>
                  <div class="row mb-5">
                    <label class="col-md-2 col-xs-12" for="">Tarikh Mula</label>
                    <input style="font-size: 0.8rem;" type="date" class=" form-control col-md-4 col-xs-12" required name="Tarikh_Mula" id="Tarikh_Mula" name="Tarikh_Mula">
                    <!-- <span class="error" id="error_Tarikh_Mula"></span> -->

                    <label class=" col-md-2 col-xs-12" for="">Tarikh Tamat</label>
                    <input style="font-size: 0.8rem;" type="date" class="form-control col-md-4 col-xs-12" required name="Tarikh_Tamat" id="Tarikh_Tamat" name="Tarikh_Tamat">
                    <!-- <span class="error" id="error_Tarikh_Tamat"></span> -->
                    <input style="font-size: 0.8rem;" type="text" class="form-control col-md-4 col-xs-12 d-none" value="" required name="projeck_id" id="projeck_id" name="projeck_id">

                  </div>
                
          
                  <center> <button id="close_pop" type="button" class="btn vmpopupKembali"style="background-color:#FA5C7C; color: #fff; font-size: 0.8rem;"data-dismiss="modal">Kembali</button>
                    <button id="simpanBtn" type="button" class="btn btn-simpan"style="background-color: #5b63c3; color: #fff; font-size: 0.8rem;">Simpan</button>
                  </center>
                </div>
              </form>
        
              <!-- <div class="modal-footer">
                
                <button type="button" class="btn btn-primary">Save changes</button>
              </div> -->
              <!-- <div class="modal-footer">
                <button class="btn btn-primary" >Open second modal</button>
              </div> -->
            </div>
          </div>
        </div>
        <div class="modal fade vm_modal_box_shadow" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
              <div class="add_role_sucess_modal_header text-end">
                <button class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
                  <i class="mdi mdi-window-close" id="close_image"></i>
                </button>
              </div>
              <div class="modal-body">
                <center> <h4 class="vmKalendar_ack_text">Maklumat berjaya disimpan</h4> </center>
               <br>
                <div>
                  <center><button class="btn vmKalendar_popUp_btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">TUTUP</button></center>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="overlay" id="grayOverlay"></div>
      </div>

    <!-- Modal -->
<div class="vmadd_role_sucess_modal_container modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><img src="{{ asset('assets/images/Add_box.png') }}" alt=""> Daftar Makmal Kajian Nilai (VA)</h5>
          <button type="button" class="ml-auto" data-bs-dismiss="modal" aria-label="Close">
            <i class="mdi mdi-window-close" style="font-size: 2em;" id="close_image"></i>
          </button>
        </div>
      
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
              <div class="vmKalendar_modal modal-body">
                <center> <h4>Maklumat berjaya disimpan</h4> </center>
               <br>
                <div>
                  <center><button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">TUTUP</button></center>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
        </div>
        <!-- Mainbody_conatiner Starts -->
      </div>

    <section>
      <div class="container"></div>
    </section>
    {{-- success modal --}}
    <section>
      <div class="add_role_sucess_modal_container">
        <div
          class="modal fade vm_modal_box_shadow"
          id="add_role_sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_sucess_modal_content">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                  <button class="ml-auto" data-bs-dismiss="modal" id="close" aria-label="Close">
                    <i class="mdi mdi-window-close"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Maklumat berjaya disimpan</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" id="tutup" class="tutup">Tutup</button>
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
          class="modal fade vm_modal_box_shadow"
          id="date_conflict_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_sucess_modal_content">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                  <button class="ml-auto" data-bs-dismiss="modal" id="close" aria-label="Close">
                    <i class="mdi mdi-window-close"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Tarikh ini telah dijadualkan untuk sesi makmal yang lain, sila pilih tarikh alternatif.</h3>
                  <div class="text-center">
                    <button type="button" data-bs-dismiss="modal" id="tutup" class="tutup">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@include('valueManagement.KalendarVM.script')
@endsection