@include('masterData.role_permission.style')
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
          <div class="Mainbody_content_nav_header project_register align-items-center row" style="padding-bottom:0px !Important;">
            <div class="col-md-5 col-xs-12" style="padding-left:3%">
              <h4 style="font-size: 4vmin;">Kebenaran</h4>
            </div>
            <div class="col-md-6 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="#"
                    ><img
                      src="{{ asset('images/Vector-3_1.png') }}"
                      class="globe"
                      alt="globe"
                    />
                    Pentadbir
                    <img
                      class="arrow_nav"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                    />
                  </a>
                </li>  
                <li>
                <a href="/master">
                  Selenggara Data
                  <img
                    class="arrow_nav"
                    src="{{ asset('images/arroew.png') }}"
                    alt="arroew"
                /></a>
              </li>
              <li>
                <a href="/Role">
                  Roles
                  <img
                    class="arrow_nav"
                    src="{{ asset('images/arroew.png') }}"
                    alt="arroew"
                /></a>
              </li>   
                <li>
                  <a href="#" class="active text-secondary"> {{$name}} -Kebenaran </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="project_register_tab_container row" style="width:118% !important;">        
            <div class="project_register_tab_content_container VAE-page col-10" style="width:100% !important;margin-bottom:0px !Important;">

              <input type="hidden" class="fetch_id" name="fetch_id" value="{{$id}}">
              <input type="hidden" class="update_id" name="update_id" value="{{$id}}">
              <form id="permissionForm">
                <div class="brief_project_container rmk">
                  <div class="acquistion-topic">
                    <hr>
                    <p class="acquistion-topic-G">{{$name}} - Kebenaran</p>
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

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-3.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PENTADBIR</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="Permissionpentadbir" name="pentadbir_full_access" value="pentadbir_full_access">
                            </div>
                          </div>

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
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="pentadbir_row">
                              
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

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-4.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PERMOHONAN PROJEK</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="permohon" name="permohon_full_access" value="permohon_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="brif"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="permohonan_row">
                              
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

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-1.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PEMANTAUAN DAN PENILAIAN PROJEK</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox"  id="permantuan" name="permantuan_full_access" value="permantuan_full_access">
                            </div>
                          </div>

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
                            
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="pemantuan_row">
                              
                            </tbody><tbody>
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

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>KONTRAK</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox"  id="kontrak" name="kontrak_full_access" value="kontrak_full_access">
                            </div>
                          </div>

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
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="kontrak_row">
                              
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

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-6.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>PERUNDING</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="peruding" name="peruding_full_access" value="peruding_full_access">
                            </div>
                          </div>

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
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="perunding_row">
                              
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
                            data-target="#PENGESYORAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                            id="GNO_STAT"
                          >

                          <div class="row col-12">
                            <div class="col-md-1">
                            <img src="{{ asset('assets/images/Vector-2.png') }}" alt="" />
                            </div>
                            <div class="col-md-8">
                            <p>VALUE MANAGEMENT</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="vm" name="vm_full_access" value="vm_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="PENGESYORAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="vm_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card"  id="NOC">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#NOC_data"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <i class="uil-chart-line"></i>
                            </div>
                            <div class="col-md-8">
                            <p>NOTICE OF CHANGE</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="noc" name="noc_full_access" value="noc_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="NOC_data"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="noc_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card"  id="Rolling_Plan">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#RollingP"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                              <span class="iconify" data-icon="mdi-timer-sand"></span>
                            </div>
                            <div class="col-md-8">
                            <p>PERMOHONAN PERUNTUKAN DI LUAR ROLLING PLAN (RP)</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="rp" name="rp_full_access" value="rp_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="RollingP"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="rp_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="card"  id="PENJANAN_STAT">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#PENJANAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                          <div class="row col-12">
                            <div class="col-md-1">
                            <span class="iconify" data-icon="mdi-clipboard-search-outline"></span>
                            </div>
                            <div class="col-md-8">
                            <p>PENJANAAN LAPORAN</p>
                            </div>
                            <div class="col-md-3">
                            <input class="button-check" type="checkbox" id="pl" name="pl_full_access" value="pl_full_access">
                            </div>
                          </div>

                          </button>
                        </h2>
                      </div>
                      <div
                        id="PENJANAN"
                        class="collapse multi-collapse"
                        aria-labelledby="headingTwo" style="padding:5%;"
                      >
                        <div class="card-body-strategi flex-column">
                          <table class="table table-bordered">
                            <thead style="background-color:#bcb4b1;">
                              <tr>
                                <th  scope="col" >Senarai Semak</th>
                                <th  scope="col">Kebenaran Penuh</th>
                                <th  scope="col">Kebenaran untuk Lihat</th>
                                <th  scope="col">Kebenaran untuk Kemaskini</th>                                
                              </tr>
                            </thead>
                            <tbody id="pl_row">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="brief_project_content_footer">
                  <button type="button" id="vmPermissionSaveBtn" class="updateBtn">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Mainbody_conatiner Starts -->
    </div>
    
    <section>
      <div class="add_role_sucess_modal_container">
        <div
          class="modal fade"
          id="add_role_sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
          data-backdrop="static"
          data-keyboard="false"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_sucess_modal_content" style="width:100% !important;">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3 style="width:102% !important;">Maklumat anda berjaya di simpan<br></h3>
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
     @include('masterData.role_permission.script')

    @endsection