@include('users.dashboard.style')
@include('noc.Kertas_Permohonan_NOC.nocStyle')

@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')
<div class="Mainbody_content mtop">

<x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
</x-form.spinner> 
        <div class="Mainbody_content_nav_header project_register row align-items-center">
            <div class="col-md-4 col-xs-12 ml-2">
              <h4 class="project_list">Pindah Peruntukan Siling Tahunan</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav d-flex align-content-end flex-wrap">
                <li>
                  <a href="#">
                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                      <path fill="currentColor" d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8l6.5 3.78Z"></path>
                    </svg>

                    Notice of Change
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    JPS
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    Pindah Peruntukan Siling Tahunan
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    Senarai NOC
                    <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="active">Senarai projeck</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="project_register_content_container">
            <div class="project_register_table_container">
             
              <div class="project_register_search_container mt-3">
                <div class="">
                    <div class="project_register_search_header mb-3 d-flex ">
                        <i class="ri-add-line remixicon"></i>
                        <h4 class="">TAMBAH PROJEK </h4>
                        <div class="userlist_content_header_righttext-center col-xs-12 ml-auto">
                        <i alt="printing" class="ri-printer-fill ri-2x printerIco " style="color: #fff; background-color: #39afd1;"></i>
                        </div>
                        
                    </div>
                    <hr>
                
                <div class="userlist_tab_content_header">
                  
                  
                  <div style="overflow-x:auto;">
                    
                         <table class=" table table-striped table-borderless m-5" style="height: auto; width: 90%;" id="jps_user">
                            <thead class="pemberat_title text-center thnowrap" style="font-size: 0.8rem;">
                                <tr class="">
                                  <!-- <th></th> -->
                                  <th class=""></th>
                                  <th class="">Kod Projek</th>
                                  <th class="">Kod Butiran</th>
                                  <th class="">No Rujukan</th>
                                  <th class="">Nama Projek</th>
                                  <th class="">Pembiyan</th>
                                  <th class="">Kos Projek (RM)</th>
                                  <th class="">Perbelanjaan Keseluruhan Projek (RM)</th>                                
                                  <th class="">Baki Kos Projek (RM)</th>
                                  <th class="">Peruntukan Asal (RM)</th>                                                       
                                </tr>
                            </thead>
                            <tbody style="font-size: 0.8rem" class="Nocinputgrey2 text-center thnowrap">
                            
                            </tbody>
                  </table>
                  </div>
                  <br>
                  <center>
                    <div class="userlist_content_header_right col-md-12 text-center">
                      <button class="SimpanBtnNOC" type="button" id="simpan_btn">Simpan</button>
                    </div>
                  </center>
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
          </div>
        </div>
      </div>
      
      <!-- Mainbody_conatiner Starts -->
</div>

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
@include('noc.tamba_projek.script')
@endsection