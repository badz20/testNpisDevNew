@include('project.perakuan.style')
@extends('layouts.main.master_responsive')
    
    @section('content_main')
    
     <!-- Mainbody_conatiner Starts -->
     <div class="Mainbody_conatiner ml-auto">
        <div class="Mainbody_content mtop nageri_container">
          <div class="Mainbody_content_nav_header project_register align-items-center row">
            <div class="col-md-5 col-xs-12">
              <h4 class="ml-2">Daftar Permohonan Projek</h4>
            </div>
            <div class="col-md-6 col-xs-12 path_nav_col">
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

          <div class="project_register_tab_container nageri_gap row">
            <div class="project_register_tab_btn_container col-2">
              @include('project.side-sections', ['active' => 'perakuan'])
            </div>
            <div
              class="project_register_tab_content_container perakuan_right_content col-10">
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

              <form action="">
                {{-- Start Perakuan Content in Horizontal --}}
                <div class="perakuan_content perakuan_content_horizontal">
                  <div class="perakuan_form_header">Maklumat Perakuan</div>
                  <div class="perakuan_tables table_scroll">
                    <table class="table">
                      <thead>
                        <tr class="text-center">
                          <th scope="col"></th>
                          <th scope="col" class="th_2">Nama</th>
                          <th scope="col" class="th_2">Pejabat</th>
                          <th scope="col">Tarikh</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td scope="row" class="text-left">Penyedia</td>
                          <td id="penyedia_name"></td>
                          <td id="penyedia_status"></td>
                          <td id="penyedia_date"></td>
                        </tr>
                        <tr class="text-center">
                          <td scope="row" class="text-left">Penyemak</td>
                          <td id="penyemak_name"></td>
                          <td id="penyemak_status"></td>
                          <td id="penyemak_date"></td>
                        </tr>
                        <tr class="text-center">
                          <td scope="row" class="text-left">Penyemak 1</td>
                          <td id="penyemak1_name"></td>
                          <td id="penyemak1_status"></td>
                          <td id="penyemak1_date"></td>
                        </tr>
                        <tr class="text-center">
                          <td scope="row" class="text-left">Penyemak 2</td>
                          <td id="penyemak2_name"></td>
                          <td id="penyemak2_status"></td>
                          <td id="penyemak2_date"></td>
                        </tr>
                        <tr class="text-center">
                          <td scope="row" class="text-left">Pengesah</td>
                          <td id="pengesah_name"></td>
                          <td id="pengesah_status"></td>
                          <td id="pengesah_date"></td>
                        </tr>
                        <tr class="text-center">
                          <td scope="row" class="text-left">Peraku</td>
                          <td id="peraku_name">-</td>
                          <td id="peraku_status">-</td>
                          <td id="peraku_date">-</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="perakuan_tables">
                    <table class="table table-bordered" style="text-align: center; font-size: 0.9rem;">
                      <thead>
                        <tr>
                          <th scope="col">Nama</th>
                          <th scope="col" class="th_2">Tarikh</th>
                          <th scope="col" class="th_2">Catatan/Ulasan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="d-none" id="penyemak_peraku">
                          <td style="font-size: 0.8rem;">Penyemak</td>
                          <td style="font-size: 0.8rem;" id="date_penyemak_peraku"></td>
                          <td style="font-size: 0.8rem; text-align: left;" id="ulusan_penyemak_peraku"></td>
                        </tr>
                        <tr class="d-none" id="penyemak1_peraku">
                          <td style="font-size: 0.8rem;">Penyemak1</td>
                          <td style="font-size: 0.8rem;" id="date_penyemak1_peraku"></td>
                          <td style="font-size: 0.8rem; text-align: left;" id="ulusan_penyemak1_peraku"></td>
                        </tr>
                        <tr class="d-none" id="penyemak2_peraku">
                          <td style="font-size: 0.8rem;">Penyemak2</td>
                          <td style="font-size: 0.8rem;" id="date_penyemak2_peraku"></td>
                          <td style="font-size: 0.8rem; text-align: left;" id="ulusan_penyemak2_peraku"></td>
                        </tr>
                        <tr class="d-none" id="pengesah_peraku">
                          <td style="font-size: 0.8rem;">Pengesah</td>
                          <td style="font-size: 0.8rem;" id="date_pengesah_peraku"></td>
                          <td style="font-size: 0.8rem; text-align: left;" id="ulusan_pengesah_peraku"></td>
                        </tr>
                        <tr class="d-none" id="peraku_peraku">
                          <td style="font-size: 0.8rem;">Peraku</td>
                          <td style="font-size: 0.8rem;" id="date_peraku_peraku"></td>
                          <td style="font-size: 0.8rem; text-align: left;" id="ulusan_peraku_peraku"></td>
                        </tr>                       
                      </tbody>
                    </table>
                  </div>
                  @if($is_clickable)
                  <div class="form-group form_group_perakuan">
                    <label for="exampleFormControlTextarea1"
                      >Ulasan / Catatan
                       {{-- <span class="ulasan_color">*</span> --}}
                       
                       </label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="5"
                      required
                    ></textarea>
                    <span class="error" id="errorTextarea" style="color: red;"></span>
                  </div>
                  @endif
                </div>
                {{-- End Perakuan Content in Horizontal --}}

                {{-- Start Perakuan Content in Vertical --}}
                <div class="perakuan_content perakuan_content_vertical">
                  <div class="perakuan_form_header">Maklumat Perakuan</div>
                  <div class="perakuan_tables">
                    <div class="vertical_perakuan mt-3">
                      <div><label>Penyedia</span></div>
                      <div class="row">
                        <div class="col-4"><span>Nama:</span></div>
                        <div class="col-8"><span id="penyedia_name2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Pejabat:</span></div>
                        <div class="col-8"><span>JPS Daerah Mersing</span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Tarikh:</span></div>
                        <div class="col-8"><span id="penyedia_date2"></span></div>
                      </div>
                    </div>
                    <div class="vertical_perakuan mt-3">
                      <div><label>Penyemak</span></div>
                      <div class="row">
                        <div class="col-4"><span>Nama:</span></div>
                        <div class="col-8"><span id="penyemak_name2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Pejabat:</span></div>
                        <div class="col-8"><span id="penyemak_status2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Tarikh:</span></div>
                        <div class="col-8"><span id="penyemak_date2"></span></div>
                      </div>
                    </div>
                    <div class="vertical_perakuan mt-3">
                      <div><label>Penyemak 1</span></div>
                      <div class="row">
                        <div class="col-4"><span>Nama:</span></div>
                        <div class="col-8"><span id="penyemak1_name2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Pejabat:</span></div>
                        <div class="col-8"><span id="penyemak1_status2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Tarikh:</span></div>
                        <div class="col-8"><span id="penyemak1_date2"></span></div>
                      </div>
                    </div>
                    <div class="vertical_perakuan mt-3">
                      <div><label>Penyemak 2</span></div>
                      <div class="row">
                        <div class="col-4"><span>Nama:</span></div>
                        <div class="col-8"><span id="penyemak2_name2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Pejabat:</span></div>
                        <div class="col-8"><span id="penyemak2_status2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Tarikh:</span></div>
                        <div class="col-8"><span id="penyemak2_date2"></span></div>
                      </div>
                    </div>
                    <div class="vertical_perakuan mt-3">
                      <div><label>Pengesah</span></div>
                      <div class="row">
                        <div class="col-4"><span>Nama:</span></div>
                        <div class="col-8"><span id="pengesah_name2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Pejabat:</span></div>
                        <div class="col-8"><span id="pengesah_status2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Tarikh:</span></div>
                        <div class="col-8"><span id="pengesah_date2"></span></div>
                      </div>
                    </div>
                    <div class="vertical_perakuan my-3">
                      <div><label>Peraku</span></div>
                      <div class="row">
                        <div class="col-4"><span>Nama:</span></div>
                        <div class="col-8"><span id="peraku_name2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Pejabat:</span></div>
                        <div class="col-8"><span id="peraku_status2"></span></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><span>Tarikh:</span></div>
                        <div class="col-8"><span id="peraku_date2"></span></div>
                      </div>
                    </div>
                  </div>
                  @if($is_clickable)
                  <div class="form-group form_group_perakuan">
                    <label for="exampleFormControlTextarea1"
                      >Ulasan / Catatan <span class="ulasan_color">*</span></label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="5"
                    ></textarea>
                  </div>
                  @endif
                </div>
                {{-- End Perakuan Content in Vertical --}}
                <div class="perakuan_btns" id="non_bkor">
                  {{-- <button
                    type="button"
                    class=""
                    data-toggle="modal"
                    data-target="#Cancel_application_modal"
                    id="betal_data"
                  >
                  Batal Permohonan
                  </button> --}}
                  <button type="button" class="red" id="kembali_btn">Kembali kepada Penyedia</button>
                  <button type="button" class="reject_project d-none" id="reject_project_1">Tolak Permohonan </button>
                  <button
                    type="button"
                    class="green"
                    data-toggle="modal"
                    data-target="#Make_sure_application_modal"
                    id="hanter_submit"
                    style="font-size: 0.8rem;"
                  >
                    Hantar untuk Semakan
                  </button>
                  
                </div>
                <div class="perakuan_btns d-none" id="user_bkor">
                  <button type="button" class="reject_project d-none" id="reject_project_2">
                    Tolak Permohonan
                  </button>
                  <button type="button"  class="green" id="approve_project" >
                    Lulus Permohonan
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
          id="Cancel_application_modal"
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
                      <h3 class="success_header p-0 mb-2">
                        PERHATIAN
                      </h3><br>
                      <h5 class="success_header p-0 mb-2 text-center">
                      ADAKAH ANDA PASTI MEMBATALKAN PERMOHONAN PROJEK INI?
                      </h5><br>
                      <div class="btn_holder d-flex">
                        <button data-dismiss="modal" class="fix_button red" id="close_cancel">
                          Tidak
                        </button>
                        <button data-dismiss="modal" class="fix_button green" id="cancel_project">
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
    <section>
      <div class="project_register_form_modal_container">
        <div
          class="modal spaced_modal fade"
          id="Make_sure_application_modal"
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
                    <button class="ml-auto" type="button" data-dismiss="modal" aria-label="Close">
                      <i class="mdi mdi-window-close" id="close_image"></i>
                    </button>
                    <h3 class="success_header p-0 mb-2" style="font-size: 1.3rem;">
                      PERHATIAN
                    </h3>
                    <h5 class="success_header p-0 mb-2 text-center" style="font-family: Poppins_Regular; font-size: 0.9rem;">
                      Sila pastikan semua maklumat adalah benar dan tepat sebelum<br>
                      menghantar untuk proses selanjutnya.
                    </h5><br>
                    <!-- <h5 class="success_header p-0 mb-2 text-center">
                      ADAKAH ANDA BERSETUJU PERMOHONAN INI DIKEMUKAKAN<br>
                      KEPADA <b id="section_name_1">BAHAGIAN</b> UNTUK PROSES SELANJUTNYA.
                    </h5><br>
                    <p class="batal_red" id="batal_red">SILA PASTIKAN ULASAN/CATATAN DI  <b id="section_name_2">BAHAGIAN </b> PERAKUAN TELAH DIISI SEBELUM DIKEMBALIKAN</p> -->
                    <div class="btn_holder d-flex">
                    <button data-dismiss="modal" class="fix_button red" id="close_hanter">
                        Kembali
                      </button>
                    <button data-dismiss="modal" class="fix_button green" id="approved"> 
                        Hantar
                      </button>
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
          id="reject_application_modal"
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
                      <h3 class="success_header p-0 mb-2">
                        PERHATIAN
                      </h3><br>
                      <h5 class="success_header p-0 mb-2 text-center">
                      Adakah anda pasti untuk menolak permohonan projek ini?
                      </h5><br>
                      <div class="btn_holder d-flex">
                        <button data-dismiss="modal" class="fix_button red" id="close_reject_cancel">
                          Tidak
                        </button>
                        <button data-dismiss="modal" class="fix_button green" id="project_reject">
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
    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
      </x-form.spinner>
    <section>
      <div class="project_register_form_modal_container">
        <div
          class="modal spaced_modal fade"
          id="approve_application_modal"
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
                      <h3 class="success_header p-0 mb-2">
                        PERHATIAN
                      </h3><br>
                      <h5 class="success_header p-0 mb-2 text-center">
                      Adakah anda pasti untuk meluluskan permohonan projek ini?
                      </h5><br>
                      <div class="btn_holder d-flex">
                        <button data-dismiss="modal" class="fix_button red" id="close_approve_cancel">
                          Tidak
                        </button>
                        <button data-dismiss="modal" class="fix_button fgreen" id="project_approve">
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
    <section>
      <div class="project_register_form_modal_container">
        <div
          class="modal spaced_modal fade"
          id="reject_mode_sucess_modal"
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
                    <div class="d-flex" style="justify-content: flex-end">
                      <button type="button" data-dismiss="modal" aria-label="Close" style="background-color: transparent;border: none;">
                        <i class="mdi mdi-window-close icon_black" id="close_image"></i>
                      </button>
                    </div>
                    <h5 class="success_header p-0 mb-2 text-center">
                    Adakah anda pasti untuk kembalikan projek ini kepada Penyedia?
                    </h5><br>
                    <div class="btn_holder d-flex">
                      <button data-dismiss="modal" class="fix_button red" id="cancel_updates">
                        Tidak
                      </button>
                      <button data-dismiss="modal" class="fix_button fgreen" id="send_update">
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

    <section>
      <div class="project_register_form_modal_container">
        <div
          class="modal spaced_modal fade"
          id="comment_application_modal"
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
                    <div class="d-flex" style="justify-content: flex-end">
                      <button type="button" data-dismiss="modal" aria-label="Close" style="background-color: transparent;border: none;">
                        <i class="mdi mdi-window-close icon_black" id="close_image"></i>
                      </button>
                    </div>
                    <h5 class="success_header p-0 mb-2 text-left">
                    Sila nyatakan komen anda dibawah:
                    </h5><br>
                    <div>
                      <textarea class="form-control" rows="4" id="komen" name="komen"></textarea>
                    </div>
                    <span class="error" id="error_komen"></span>   
                    <div class="btn_holder d-flex mt-4">
                      <button data-dismiss="modal" class="fix_button red" id="cancel_comment">
                        Batal
                      </button>
                      <button data-dismiss="modal" class="fix_button fgreen" id="send_comment">
                        Hantar
                      </button>
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
            >
              <div
                class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
                role="document"
              >


                <div class="modal-content project_register_form_modal_content">
                    <div class="modal-body project_register_form_modal_body">
                      <div class="project_register_form_modal_body_Content">
                        <div class="d-flex" style="justify-content: flex-end">
                          <button type="button" data-dismiss="modal" aria-label="Close" style="background-color: transparent;border: none;">
                            <i class="mdi mdi-window-close icon_black" id="close_image"></i>
                          </button>
                        </div>
                        <h3 class="success_header p-0 mb-2">
                          PERHATIAN
                        </h3><br>
                        <p class="batal_red" id="batal_red">Sila Selesaikan Susunan Keutamaan Permohonan <br> Projek Di Peringkat <b id="section_priority">NEGERI </b></p>
                        <div class="btn_holder d-flex">
                          <button data-dismiss="modal" class="fix_button green"> 
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

    {{-- Show cadangan kod projek --}}
    <section>
      <div class="project_register_form_modal_container">
        <div
          class="modal spaced_modal fade"
          id="cadangan_application_modal"
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
                <div class="modal-header" style="border: none; margin: 0; padding: 0;">
                  <!-- Add a button with data-dismiss attribute to close the modal -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none;">
                      <i class="mdi mdi-window-close icon_black" id="close-modal"></i>
                  </button>
                </div>
                <div class="modal-body project_register_form_modal_body_Content">
                    <h5 class="success_header p-0 text-center">
                      Cadangan Kod Projek
                    </h5><br>
                    <h5 class="success_header p-0 mb-2 text-center">
                      <strong id="kod_projeck"></strong>
                    </h5><br>
                    <div class="btn_holder d-flex">
                      <button data-dismiss="modal" class="fix_button" style="background-color: #5b63c3;" id="tutup-modal">
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
  @include('project.perakuan.scripts')
@endsection