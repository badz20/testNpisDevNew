<div
                      class="kandungan_tab_content tab-pane fade show active"
                      id="kandungan_landing_page"
                    >
                      <form id="landingForm" name="landingForm">                                       
                        <div class="kundangan_landing_page_container row">
                          <div class="kundangan_landing_page_left_content mt-3 col-md-6 col-xs-12">
                            <div class="input_radio_container">
                              <label class="r_container"
                                >Imej Slider
                                <input
                                  type="radio"
                                  name="landing_radio"
                                  id="landing_radio_image"
                                  value="0"                                  
                                />
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="upload_img_Container" id="video_radio_click">
                              <div class="form-group input_container">
                                <label for="Tajuk">Tajuk</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="landing_tajuk_image"
                                  id="landing_tajuk_image"
                                  value=""
                                />
                              </div>
                              <div class="img_input_container position-relative">
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
                                <input type="file" id="landingImages" name="landing_images[]"  multiple="multiple"/>
                                <div class="upload_img">
                                  <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                                  <h5>
                                    Letakkan fail di sini atau klik untuk memuat
                                    naik
                                  </h5>
                                  <p>(Saiz fail tidak melebihi 2mb)</p>
                                  <div id="image_preview">
                                  </div>
                                </div>
                              </div>

                              
                             
                            </div>
                          </div>
                          

                          <div class="kundangan_landing_page_right_content my-3 col-md-6 col-xs-12">
                            <div class="input_radio_container">
                              <label class="r_container"
                                >Video
                                <input
                                  type="radio"
                                  name="landing_radio"
                                  id="landing_radio_video"
                                  value="1"                                  
                                />
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="upload_img_Container" id="image_radio_click">
                              <div class="form-group input_container">
                                <label for="Tajuk">Tajuk</label>
                                <input type="text"
                                  class="form-control"
                                  name="landing_tajuk_video"
                                  id="landing_tajuk_video"
                                  value=""/>
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
                                  <p>Logo 1 adalah logo dibahagian kiri</p>
                                </div>
                                <input type="file" id="landing_video" name="landing_video" class="landing_video" accept="video/*"/>
                                <div class="upload_img">
                                  <i class="mdi mdi-cloud-upload pengesahan_icon"></i>
                                  <h5>
                                    Letakkan fail di sini atau klik untuk memuat
                                    naik
                                  </h5>
                                  <p>(Saiz fail tidak melebihi 4mb)</p>
                                  <div id="video_src">
                                
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- <div class="form-group input_container" style="position: relative;left:11%;width: 78%;">
                          <label for="Tajuk" class="font-weight-bold h5">Breaking News</label>
                          <input type="hidden" id='breakingNewsId' value="">
                          <textarea type="text"class="form-control" cols="20" rows="5" name="BreakingNews"id="BreakingNews"value=""></textarea>
                        </div> --}}
                        <div class="lpage_submit_container d-flex">
                          <button style="width: 110px" type="button" id="landingReset">Set Semula</button>
                          <button style="width: 110px" type="button" id="landingSubmit">Simpan</button>
                        </div>
                      </form>
                    </div>