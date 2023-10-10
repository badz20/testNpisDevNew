<!-- <section> -->
        <!-- <div class="success_data_modal_container">
            <div class="modal fade" id="success_data_modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered success_data_modal_dialog" role="document">
                    <div class="modal-content success_data_modal_content">
                        <div class="success_data_modal_header d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                                <h5>Success</h5>
                            </div>

                            <button type="button" data-dismiss="modal" aria-label="Close">
                                <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
                            </button>
                        </div>
                        <div class="modal-body success_data_modal_body">
                            <form id="pengumumanForm" role="form">
                                <button
                        data-toggle="modal"
                        data-target="#success_data_modal"
                        data-dismiss="modal"
                    >
                        Kembali
                    </button>                                
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="error_data_modal_container">
            <div class="modal fade" id="error_data_modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered error_data_modal_dialog" role="document">
                    <div class="modal-content error_data_modal_content">
                        <div class="error_data_modal_header d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                                <h5>Error</h5>
                            </div>

                            <button type="button" data-dismiss="modal" aria-label="Close">
                                <span class="iconify" data-icon="mdi-window-close" alt="close_img"></span>
                            </button>
                        </div>
                        <div class="modal-body error_data_modal_body">
                            <form id="pengumumanForm" role="form">
                                <button
                        data-toggle="modal"
                        data-target="#error_data_modal"
                        data-dismiss="modal"
                    >
                        Kembali
                    </button>                                
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
</section> -->

<section>
      <div class="add_role_sucess_modal_container">
        <div
          class="modal fade"
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
              <div class="add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                    <button class="ml-auto" data-dismiss="modal" aria-label="Close" id="close_modal">
                        <span class="iconify" data-icon="mdi-window-close"></span>
                    </button>
                </div>
                <div class="modal-body add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Maklumat anda berjaya disimpan</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" class="tutup" id="tutup_new">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
            <div class="sucess_modal_container">
                <div
                class="modal fade"
                id="sucess_modal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
                >
                <div
                    class="modal-dialog modal-dialog-centered sucess_modal_dialog"
                    role="document"
                >
                    <div class="modal-content sucess_modal_content">
                    <div class="modal-body sucess_modal_body" style="padding-top:12% !important;">
                        <h3>
                        Error
                        </h3>
                        <div class="text-center">
                        <button data-dismiss="modal" id="confirm_close">Tutup</button>
                        </div>
                    </div>
                    <div class="sucess_msg" style="top:10% !important; left:45% !important;">
                        <img class="img-responsive" height="54px" src="{{ asset('dashboard/assets/images/Union.png') }}" alt="" />
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>