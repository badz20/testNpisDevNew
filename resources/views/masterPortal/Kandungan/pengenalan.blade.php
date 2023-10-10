<div
                      class="kandungan_tab_content tab-pane fade"
                      id="kandungan_penganalan"
                    >
                      <form  id="penganalanForm" name="penganalanForm">
                        <div class="kundangan_landing_page_container row">
                          <div class="kundangan_landing_page_left_content mt-3 col-md-6 col-xs-12">
                            <div class="input_radio_container">
                              <label class="r_container"
                                >Imej Slider
                                <input
                                  type="radio"
                                  name="pengenalan_radio"
                                  id="pengenalan_radio_image"
                                  value="0"
                                  
                                />
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="upload_img_Container">
                              <div class="form-group input_container">
                                <label for="Tajuk">Tajuk</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="pengenalan_tajuk_image"
                                  id="pengenalan_tajuk_image"
                                  value=""
                                />
                              </div>
                              <div class="form-group my-2">
                                <label for="katerangan">Keterangan</label>
                                <textarea
                                  name="pengenalan_keterangan_image"
                                  id="imej_keterangan_textarea"
                                ></textarea>
                              </div>
                              <div
                                class="img_input_container position-relative"
                              >
                                <label for="Logo 1" class="d-flex"
                                  ><p>Imej</p>
                                  <button class="pop_btn">
                                    <i class="mdi mdi-information info_icon"></i></button
                                ></label>
                                <div
                                  class="position-absolute pop_content d-none"
                                >
                                  <p>Logo 1 adalah logo dibahagian kiri</p>
                                </div>
                                <input type="file" id="pengenalan_image" name="pengenalan_image"/>
                                <div class="upload_img" id="upload_img_src">
                                  <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                                  <h5>
                                    Letakkan fail di sini atau klik untuk memuat
                                    naik
                                  </h5>
                                  <p>(Saiz fail tidak melebihi 2mb)</p>
                                </div>
                                <div class="image_preview" id="image_preview_src">
                                  <div class="uploaded_img_preview_container" id="langing_header_src">
                                    <div class="uploaded_img">
                                      <img src="" id="img_src" alt="" width="100" height="100"/>' 
                                    </div>
                                    <div class="uploaded_img_details">
                                        <h5 id="header_logo_name_src"></h5>
                                        <p class="flie_size" id="header_log_size_src"></p>
                                    </div>
                                    <button type="button" class="remove_image" id="remove_logo_src">
                                      <img src="{{ asset('assets/images/close_img.png') }}" alt="" />
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="kundangan_landing_page_right_content mt-3 col-md-6 col-xs-12">
                            <div class="input_radio_container">
                              <label class="r_container"
                                >Video
                                <input
                                  type="radio"
                                  name="pengenalan_radio"
                                  id="pengenalan_radio_video"
                                  value="1"
                                  
                                />
                                <span class="checkmark"></span>
                              </label>
                            </div>

                            <div class="upload_img_Container">
                              <div class="form-group input_container">
                                <label for="Tajuk">Tajuk</label>
                                <input type="text" 
                                    name="pengenalan_tajuk_video"
                                    id="pengenalan_tajuk_video" 
                                    class="form-control" />
                              </div>
                              <div class="form-group">
                                <label for="katerangan">Keterangan</label>
                                <textarea
                                  name="pengenalan_keterangan_video"
                                  id="video_keterangan_textarea"
                                ></textarea>
                              </div>
                              <div
                                class="img_input_container position-relative"
                              >
                                <label for="Logo 1" class="d-flex"
                                  ><p>Video</p>
                                  <button class="pop_btn">
                                    <i class="mdi mdi-information info_icon"></i></button
                                ></label>
                                <div
                                  class="position-absolute pop_content d-none" style="left: 14% !important;"
                                >
                                <!-- showing selected video here -->
                                <video controls>
                                  <source src="" id="preview-vid">
                                    Your browser does not support HTML5 video.
                                </video>
                                  <p>Logo 1 adalah logo dibahagian kiri</p>
                                </div>
                                <input type="file" id="pengenalan_video" name="pengenalan_video" class="pengenalan_video" accept="video/*"/>
                                <div class="upload_img">
                                  <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto" id="pengenalan_video_src" id="peng_video"></i>
                                  <h5>
                                    Letakkan fail di sini atau klik untuk memuat
                                    naik
                                  </h5>
                                  <p>(Saiz fail tidak melebihi 4mb)</p>
                                  <div id="video_src_peng">                                  
                                  </div>
                                </div>  
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="lpage_submit_container mt-2">
                          <button style="width: 110px" type="button" id="pengenalanReset">Set Semula</button>
                          <button style="width: 110px" type="button" id="pengenalanSubmit" >Simpan</button></button>
                        </div>
                      </form>
                    </div>