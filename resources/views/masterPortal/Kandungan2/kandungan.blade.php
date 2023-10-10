

              <div class="portal_tab_content tab-pane fade " id="portal_kandungan">
                <div class="portal_tab_content_header row" style="">
                  <div class="col-md-3 col-12 portal_tab_content_header_left portal_tab_content_header d-flex align-items-left">
                    <i class="mdi mdi-page-layout-body icon_portal mr-2"></i>
                    <h5 id="kandungan_label" class="ml-4">Kandungan</h5>
                  </div>

                    <!-- <img src="{{ asset('assets/images/file_yellow.png') }}" alt="" />
                    <h4>Kandungan</h4> -->
                  <div class="col-md-6 col-12 portal_tab_content_header_right d-flex " id="tambah_pengumuman">
                    <div id="add_button" class="d-flex">
                      <button
                        class="add_pengguna" id="add_pengumuman"
                        data-target="#add_selenggara_data_modal"
                        data-toggle="modal"
                        style="height: 45px; display: flex; align-items: center; margin-right: 1rem;">
                        <i class="ri-add-circle-fill icon_white ri-2x pl-2" style="margin: 0.25rem;"></i> Pengumuman
                      </button>
                      <!-- <button class="printing">
                        <i class="ri-printer-fill icon_white ri-2x"></i>
                      </button> -->
                      <x-form.print></x-form.print>
                    </div>
                  </div>
                </div>
                <div class="kandungan_tab_container">
                  <div class="kandungan_tab_btn_container nav" 
                  s>
                    <button
                      class="active"
                      data-toggle="pill"
                      data-target="#kandungan_landing_page"
                      id="kandungan_landing_page_label"
                    >
                      Landing page</button
                    ><button
                      data-toggle="pill"
                      data-target="#kandungan_penganalan"
                      id="kandungan_penganalan_label"
                    >
                      PENGENALAN</button
                    ><button
                      data-toggle="pill"
                      data-target="#kandungan_pengumuman"
                      id="kandungan_pengumuman_label"
                    >
                      pengumuman</button
                    ><button
                      data-toggle="pill"
                      data-target="#kandungan_hubungi_kami"
                      id="kandungan_hubungi_kami_label"
                    >
                      hubungi kami
                    </button>
                  </div>
                  <div class="kandungan_tab_content_container tab-content">
                    
                        @include('masterPortal.Kandungan.landing.landing')

                        @include('masterPortal.Kandungan.pengenalan')
                          
                        @include('masterPortal.Kandungan.pengumumam.pengumuman')
                        
                        @include('masterPortal.Kandungan.contact.contact')
                  </div>
                </div>
              </div>