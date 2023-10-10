<section>
        <div class="project_register_form_modal_container">
          <div
            class="modal spaced_modal fade"
            id="{{ $modal_id ?? 'modal-id' }}"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
              role="document"
            >
              <div class="modal-content project_register_form_modal_content vh-50">
                <div class="modal-body project_register_form_modal_body p-5">
                  <div class="project_register_form_modal_body_Content">
                    <h3 class="vms p-0 text-center">
                    {{ $message ?? '' }}
                    </h3>
  
                    <div class="btn_holder d-flex justify-content-center">
                      <button data-dismiss="modal" style="background-color: #5B63C3 !important;float:none;" class="fix_button btn text-white TutupBtn">
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