<div class="portal_tab_content tab-pane fade" id="portal_footer">
    <style>
        .float-container {
        border: 3px solid #fff;
        padding: 20px;
    }

    /* .float-child {
        width: 50%;
        float: left;
        padding: 20px;
        
    }   */

    #footerReset{
      width:78px;
      border-radius: 3px;
    }

    #footerSubmit{
      border-radius: 3px;
    }
    </style>
    <div class="portal_tab_content_header d-flex header" >
      <i class="mdi mdi-page-layout-footer icon_portal"></i>
      <h5>FOOTER</h5>
    </div>
    <br>
    <form id="footerForm" name="footerForm">
      <div class="float-container row">
          <div class="float-child col-md-6 col-xs-12">
              <div class="form-group input_contains">
                  <label for="no telefon">Hak Cipta Terpelihara</label>
                  <input
                      type="text"
                      class="form-control"
                      id="copyright"
                      name="copyright"
                      value=""
                  />
              </div>
              <div class="logo_form_container">            
                        <div class="logo_input_holder">
                            <label for="Logo_footer"><p>Logo MyProjek</p>
                              {{-- <button class="pop_btn">
                                <img
                                  src="{{ asset('assets/images/i-icon.png') }}"
                                  alt="icon"/>
                              </button> --}}
                            </label>
                            <div class="position-absolute pop_content d-none">
                              <p id="footer_pop_up_1">Logo 1 adalah logo dibahagian kiri</p>
                            </div>

                          <div class="logo_input_container position-relative" id="logo_footer_div_1">     
                            <input type="file" id="Logo_footer" class="Logo_footer" name="Logo_footer"/>
                            <div class="upload_logo" id="upload_logo_footer">
                              <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                              <h5 style="font-size: 0.9rem; font-family: poppins_bold;">
                                Letakkan fail di sini atau klik untuk memuat naik
                              </h5>
                              <p style="font-size: 0.8rem;">(Saiz fail tidak melebihi 2mb)</p>
                            </div>
                            <div class="image_preview" id="image_preview_footer">
                              <div class="uploaded_img_preview_container" id="langing_header_footer">
                                <div class="uploaded_img" style="    position: relative;
                                left: -290px;">
                                  <img src="" id="Logo_footer_src" alt="" width="100" height="100"/>'
                                </div>
                                <div class="uploaded_img_details">
                                    <h5 id="header_logo_name_footer"></h5>
                                    <p class="flie_size" id="header_log_size_footer"></p>
                                </div>
                                
                                <button type="button" class="remove_image" id="remove_logo_footer">
                                  <i class="mdi mdi-window-close"></i>
                                </button>
                              </div>
                            </div>
                              <p class="file_size_f d-none text-danger" id="logo_size">
                                Saiz fail tidak melebihi 2 mb
                              </p>
                              <p class="file_type d-none" id="logo_type">
                                Jenis fail tidak sah
                              </p>
                              <p class="d-none text-danger" id="fileRequired">
                                Both Fields are required
                              </p>
                          </div>
                          <div class="form-group input_contains mt-2">
                            <label class="" for="logo_url">LOGO URL</label>
                            <input
                                type="url"
                                class="form-control"
                                id="logo_url"
                                name="logo_url"
                                value=""
                            />
                          </div>


                          <label class="mt-5" for="Imeg_footer"><p>Latar Belakang</p>
                              {{-- <button class="pop_btn">
                                <img
                                  src="{{ asset('assets/images/i-icon.png') }}"
                                  alt="icon"/>
                              </button> --}}
                            </label>
                            <div class="position-absolute pop_content d-none">
                              <p id="footer_pop_up_2">Logo 1 adalah logo dibahagian kiri</p>
                            </div>
                          <div class="logo_input_container position-relative" id="logo_footer_div_2">                        
                            <input type="file" id="Imeg_footer" name="Imeg_footer"/>
                            <div class="upload_logo" id="upload_Imeg_footer">
                              <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                              <h5 style="font-size: 0.9rem; font-family: poppins_bold;">
                                Letakkan fail di sini atau klik untuk memuat naik
                              </h5 style="font-size: 0.8rem;">
                              <p>(Saiz fail tidak melebihi 2mb)</p>
                              {{-- <img src="" id="Imeg_footer_src" width="150px"> --}}
                            </div>

                            <div class="image_preview" id="image_preview_footer_div_2">
                              <div class="uploaded_img_preview_container" id="langing_header_footerdiv_2">
                                <div class="uploaded_img" style="    position: relative;
                                left: -290px;">
                                  <img src="" id="Imeg_footer_src" alt="" width="100" height="100"/>'
                                </div>
                                <div class="uploaded_img_details">
                                    <h5 id="header_logo_name_footer"></h5>
                                    <p class="flie_size" id="header_log_size_footer_div_2"></p>
                                </div>
                                <button type="button" class="remove_image" id="remove_logo_footer_div_2">
                                  <i class="mdi mdi-window-close"></i>
                                </button>
                              </div>
                            </div>

                            <p class="file_size_fi d-none text-danger" id="file_size_div_2">
                                      Saiz fail tidak melebihi 2 mb
                          </p>
                          <p class="file_type d-none" id="file_type_div_2">
                                      Jenis fail tidak sah
                          </p>
                          <p class="d-none text-danger" id="fileRequired2">
                            Both Fields are required
                          </p>
                                    
                          </div>
                          
                          
                      </div>
              </div>
          </div>

          {{-- <div class="float-child col-md-6 col-xs-12">
              <div class="form-group input_contains">
                  <label for="no telefon">Bilangan Pelawat</label>
                  <input
                      type="text"
                      class="form-control"
                      id="total_visit"
                      name="total_visit"
                      value=""
                  />
              </div>
              <div class="form-group input_contains">
                  <label for="no telefon">Bilangan Pelawat Hari ini</label>
                  <input
                      type="text"
                      class="form-control"
                      id="total_visit_today"
                      name="total_visit_today"
                      value=""
                  />
              </div>
              <div class="form-group input_contains">
                  <label for="no telefon">Bilangan Pelawat Bulan ini</label>
                  <input
                      type="text"
                      class="form-control"
                      id="total_visit_month"
                      name="total_visit_month"
                      value=""
                  />
              </div>
              <div class="form-group input_contains">
                  <label for="no telefon">Bilangan Pelawat Tahun ini</label>
                  <input
                      type="text"
                      class="form-control"
                      id="total_visit_year"
                      name="total_visit_year"
                      value=""
                  />
              </div>
          </div>         --}}
          
      </div>
      <div class="logo_submit_container text-center">
        <button style="width:110px" type="button" id="footerReset" class="mb-2 mr-2">Set Semula</button>
        <button style="width:110px" type="button" id="footerSubmit" class="mb-2">Simpan</button>
      </div>
      
    </form>
</div>