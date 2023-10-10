<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    @php
    $site_key= config('services.googleCaptcha.site_key');
    $secret_key=config('services.googleCaptcha.secret_key');
    @endphp
    <script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
    <script>
    var onReturnCallbackRegister = function(response){ console.log(response)
    if(response){
            $("#exampleCheck1").prop('disabled', false); 
            //document.querySelector('#submit_registration').disabled = false;
        
        }
    }
</script> 

@include('users.reject_update.style')


    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    
    <!-- captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
@section('content')

    <input type="hidden" id="token" value={{env('TOKEN')}}>
    <input type="hidden" id="api_url" value={{env('API_URL')}}>
    <input type="hidden" id="app_url" value={{env('APP_URL')}}>
    <!-- <div id="loading-bar-spinner" class="spinner" style="display:none;"><div class="spinner-icon"></div></div> -->

    <x-form.spinner>
      <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
      </x-slot>
    </x-form.spinner>

    <!--------------------------------------------------- sucess_modal_container starts-------------------------- -->
    <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="sucess_modal_register"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content sucess_modal_content" style="padding-top: 80px;padding-bottom: 39px;border-radius: 10px;">
              <div class="modal-body sucess_modal_body">
                <h3 style="padding-left: 77px;padding-bottom: 22px; font-size: 0.9rem; font-weight: 600;">
                Butiran pendaftararan telah dikemaskini. <br />
                </h3>
                <div class="text-center">
                  <button data-dismiss="modal" id="tutup" style="background-color: #1400ff;color: white;border-radius: 20px;padding-top: 2px;}">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="{{ asset('assets/images/coolicon.png') }}" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!---------------------------------------------------- login interface Modal starts-------------------------- -->
      <section id="register_form">
        <div class="login_interface_section">
          <div
            class="modal fade"
            id="Login_interface_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered login_interface_modal_dialog"
              role="document"
            >
              <div class="modal-content login_interface_modal_content">
                <div class="modal-body login_interface_modal_body">
                  <div class="login_interface_close">
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <img src="{{ asset('assets/images/image 95.png') }}" alt="" />
                    </button>
                  </div>
                  <div class="login_interface_modal_body_content">
                    <h4 class="login_interface_modal_header">
                      DAFTAR AKAUN BAHARU
                    </h4>
                    <div class="interface_tab_container">
                      <div class="d-flex">
                        <div class="label">
                          <label for="Kotegori Pengguna">Kategori Pengguna​</label>
                        </div>
                        <div class="radio_Container d-flex flex-column ml-5">
                          <label class="r_container">Pengguna JPS
                            <input type="radio" name="radio" id="Pengguna_JPS" />
                            <span class="checkmark"></span>
                            </label>
                            <label for="Agensi_Luar" class="r_container">Pengguna Agensi Luar
                            <input
                                type="radio"
                                name="radio"
                                id="Agensi_Luar"
                                checked
                            />
                            <span class="checkmark"></span>
                            </label>
                      </div>
                    </div>
                  </div>
                  <div  class="interface_tab_content_container">
                    <div class="interface_tab_content">
                        <form class="login_interface_modal_form" action="" method="post" id="register_agensi_user_form" name="myform">
                        <input type="hidden" name="kategori" value="" id="kategori">  
                        <input type="hidden" name="user_id" value="" id="user_id"> 
                        <input type="hidden" name="updatecounter" value="" id="updatecounter"> 
                        <div class="input_container">
                            <label
                              for="Nama_Penuh"
                              class="col-form-label form_label required"
                              >Nama Penuh</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="name" name="nama"
                              />
                              <span class="error" id="error_nama"></span>
                            </div>
                          </div>
  
                          <div class="input_container">
                            <label
                              for="Kad_Pengenalan"
                              class="col-form-label form_label required"
                              >No. Kad Pengenalan</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Kad_Pengenalan" maxlength="12" name="no_kod_penganalan"
                              />
                              <span class="error" id="error_no_kod_penganalan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Email_Rasmi"
                              class="col-form-label form_label required"
                              >Email Rasmi</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Email_Rasmi" name="email"
                              />
                              <span class="error" id="error_email"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >No. Telefon</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="No_Telefon" name="no_telefon"
                              />
                              <span class="error" id="error_telefon"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label required"
                              >Jawatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="jawatan" name="jawatan"
                              ><option value=""> --Pilih--</option>
                              </select>
                              <span class="error" id="error_jawatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Gred" class="col-form-label form_label required">Gred</label>
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="gred" id="gred"
                              >
                              <option value=""> --Pilih--</option>
                              </select>
                              <span class="error" id="error_gred"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Kementerian" class="col-form-label form_label required">Kementerian</label>
                            <div class="form_input">
                              <select class="form-select" name="kementerian" id="kementerian">
                                <option value=""> --Pilih--</option>
                              </select>
                              <span class="error" id="error_kementerian"></span>
                              <input type="hidden" id="kementerian_jps_id" value="" name="kementerian_jps_id">
                            </div>
                          </div>

                          <div class="input_container" id="jabatan_agensy_drop">
                            <div class="row jabatan_row"> 
                              <div class="col-md-3" style="width:24%;margin-top:10px;"> 
                                <input type="radio" id="jabatan_agensy_drop_check" name="jabatan_agensy_drop_check" value="1" />
                                                      <label>Jabatan</label>                  
                              </div>
                              <div class="col-md-3 form_input jabatan_col"> 
                                  <select type="text" class="form-control" name="jabatan" id="Jabatan" style="height:100%;padding:10px;width:125%;margin-left:-4px;">
                                    <option value=""> --Pilih--</option>
                                  </select>
                                  <span class="error" id="error_jabatan"></span>
                              </div>
                              <div class="col-md-2" style="width:70px;margin-top:10px;padding-left:30px;"> 
                              <label>Bahagian</label>
                              </div>
                              <div class="col-md-3 form_input jabatan_col"> 
                                  <select type="text" class="form-control" name="jabatan_bahagian" id="jabatan_bahagian" style="height:100%;width:125%;margin-left:15px;">
                                      <option value=""> --Pilih--</option>
                                  </select>
                              </div>
                            </div>
                          </div>

                          <div class="input_container" id="jabatan_jps_drop">
                            <label for="Jabatan" class="col-form-label form_label">Jabatan</label>
                            <div class="form_input">
                                  <input type="text" class="form-control" id="jabatan_jps" name="jabatan_jps" value="">
                                  <input type="hidden" id="jabatan_jps_id" value="" name="jabatan_jps_id">
                            </div>
                          </div>

                          <div class="input_container" id="jabatan_agensy_drop">
                            <input type="radio" id="bahagian_drop_check" name="bahagian_drop_check" value="1"  />
                            <label for="Bahagian" class="col-form-label form_label" style="padding-top:8px;width:21%;">Bahagian</label>
                            <div class="form_input">
                              <select type="text" class="form-control" name="bahagian" id="bahagian">
                              <option value=""> --Pilih--</option>
                              </select>
                              <span class="error" id="error_bahagian"></span>                                   
                            </div>
                          </div>

                          <div class="input_container" id="pejabat_agensy_drop">
                            <input type="radio" id="pejabat_drop_check" name="pejabat_drop_check" value="1"  />
                            <label for="Pejabat" class="col-form-label form_label" style="padding-top:8px;width:21%;">Pejabat projek</label>
                            <div class="form_input">
                              <select type="text" class="form-control" name="pejabat" id="pejabat">
                              <option value=""> --Pilih--</option>
                              </select>
                            </div>
                          </div>

                          <div class="input_container" id="jps_negeri">
                            <div class="row jabatan_row"> 
                              <div class="col-md-3" style="width:24%;margin-top:10px;"> 
                              <input type="radio" id="negeri_drop_check" name="negeri_drop_check" value="1" />
                              <label style="width:72px;">JPS Negeri</label>
                              </div>
                              <div class="col-md-3 form_input negeri_col"> 
                                  <select type="text" class="form-control"  name="negeri" id="negeri" style="height:100%;padding:10px;width:120%">
                                    <option value=""> --Pilih--</option>
                                  </select>
                                  <!-- <span class="error" id="error_jabatan"></span> -->
                              </div>
                              <div class="col-md-3" style="padding-left:16px;width:110px;margin-top:10px"> 
                              <input type="radio" id="daerah_drop_check" name="daerah_drop_check" value="1" />
                              <label style="width:80px;">JPS Daerah</label>
                              </div>
                              <div class="col-md-3 form_input negeri_col"> 
                                  <select type="text" class="form-control" name="daerah" id="daerah" style="height:100%;padding:10px;margin-left:-25px;width:120%">
                                      <option value=""> --Pilih--</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="input_container position-relative" id='nonjps_doc'>
                              <div class="file_label d-flex">
                                <label for="Dokumen_Sokongan" class="col-form-label form_label">Dokumen Sokongan</label>
                                <div class="pop_btn">
                                  <button type="button" class="btn" onclick="myFunction()">
                                    <img src="{{ asset('assets/images/i-icon.png') }}" alt="icon">
                                  </button>
                                </div>
                                <div class="pop_content position-absolute d-none" id="error_dokumen_name">
                                  <p>Sila muat naik <span> Surat Jabatan</span></p>
                                   
                                </div>
                              </div>

                              <div class="form">
                              <b style="font-size:12px;font-weight:600;color:red;">(Sila muatnaik fail .jpeg, .png, .jpg, *.pdf)</b>
                              <div class="yes">
                                <span class="btn_upload">
                                  <input type="file" name="dockument" id="dockument"  class="input-img">
                                  Muat naik lampiran
                                  </span>
                                  <p class="file_size d-none" id="file_size">
                                    (Salz fail tidak melebihi 4 mb)
                                  </p>
                                  <p class="file_type d-none" id="file_type">
                                    (Jenis fail tidak sah)
                                  </p>
                                  <div class="selected_file d-none" id="selected_file">
                                    <div class="pdf_img">
                                      <img src="{{ asset('assets/images/pdf.png') }}" alt="pdf">
                                    </div>
                                    <div class="file_details">
                                      <p style="font-size:13px;padding-left: 12px;margin-bottom: 0px !IMPORTANT;" id="document_name"></p>
                                      <button type="button" id="remove_pdf">Remove file</button>
                                    </div>
                                    <p class="file_sizes" id="document_size"></p>
                                </div>
                              </div>
                              <span id="error_dokumen_name_new" class="error"></span>
                              </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Kod Pengesahan</label
                            >
                            <div class="form_input">
                              <div
                                class="g-recaptcha"
                                data-sitekey={{$site_key}}
                                data-callback="onReturnCallbackRegister"
                                data-action="submit"
                              >
                                Submit
                              </div>
                            </div>
                          </div>
                          <div class="input_container m-0">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Perakuan Pendaftaran</label
                            >
                            <div class="form_input">
                              <div class="form-group form-check form_checker">
                                <input
                                  type="checkbox"
                                  class="form-check-input"
                                  id="exampleCheck1" onclick="myChecboxFunction()"
                                />
                                <label class="form_check_label" for="exampleCheck1"
                                  ><b>Dengan ini saya MENGAKU bahawa semua maklumat
                                  yang diisikan dalam permohonan ini adalah SAHIH
                                  dan BENAR.</b></label
                                >
                              </div>
                            </div>
                          </div>
                          <div class="form_btn_container">
                            <button type="button" id="close_button">KEMBALI</button><button type="button" id="submit_registration">DAFTAR</button>
                          </div>
                        </form>
                      </div>
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
                class="modal fade"
                id="reject_mode_sucess_modal"
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
                    <div class="modal-content add_role_sucess_modal_content">
                    <div class="modal-body add_role_sucess_modal_body">
                        <div class="add_role_sucess_modal_header text-end">
                        <button class="ml-auto" data-dismiss="modal" aria-label="Close">
                            <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close_img" id="close_image_new"/>
                        </button>
                        </div>
                        <div class="comment"> 
                    <h5 id="cmd">Anda tidak dibenarkan untuk melihat maklumat ini.Sila hubungi pentadbir</h5>
                    </div>
                        <div class="add_role_sucess_modal_body_Content" id="user_pop-up">                            
                            <div class="text-center">
                                <button data-dismiss="modal" id="close_button_nodata">Tutup</button>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
@include('users.reject_update.script')      

 </body>
</html>