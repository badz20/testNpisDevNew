<div class="kandungan_tab_content tab-pane fade" id="kandungan_pengumuman">


    <style>

.searchIn{
        background:url("{{ asset('assets/images/Icon Cari.png') }}") no-repeat calc(100% - 175px) center / 15px ;
        padding-left:25px !important;
    }
    

    .sorting_desc{
        background:url("{{ asset('assets/images/down triangle.png') }}") no-repeat right center / 10px  !important;
    }
    .sorting_asc{
        background:url("{{ asset('assets/images/up triangle.png') }}") no-repeat right center / 10px  !important;
    }
    .sorting{
        background:url("{{ asset('assets/images/down triangle.png') }}") no-repeat right center / 10px ;   
    }

    .searchOut{
    background:none; 
    }
    
    .dt-buttons{
        display: none !important;
    }
        .jpsBtn {
            border-bottom-width: 3.5px !important;
            border-bottom-color: #39AFD1 !important;
            border-left: none !important;
            border-right: none !important;
            border-top: none !important;
            color: #38afd1 !important;
        }

        .nonjpsBtn:focus {
            border-bottom-width: 3.5px !important;
            border-bottom-color: #39AFD1 !important;
            border-left: none !important;
            border-right: none !important;
            border-top: none !important;
            color: #38afd1 !important;
        }

        .jpsBtn:focus {
            border-bottom-width: 3.5px !important;
            border-bottom-color: #39AFD1 !important;
            border-left: none !important;
            border-right: none !important;
            border-top: none !important;
            color: #38afd1 !important;
        }


        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
            /* font-weight: 900 !important; */
            border: 1px solid #38afd1 !important;
            border-radius: 50%;
            background-color: #38afd1 !important;
            background: #38afd1 !important;

        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing {
            color: gray !important;
        }

        .dataTables_wrapper .dataTables_paginate {
            color: rgb(247, 238, 238) !important;
        }

        input:checked~.custom-control-label::before {
            background-color: #0acd95 !important;
            border-color: #0acd95 !important;
        }

        .custom-switch .custom-control-label::before {
            left: -2.25rem !important;
            width: 3rem !important;
            height: 25px !important;
            pointer-events: all !important;
            border-radius: 1rem !important;
        }

        .custom-switch .custom-control-input:checked~.custom-control-label::after {
            background-color: #fff !important;
            -webkit-transform: translateX(0.75rem) !important;
            transform: translateX(1.75rem) !important;
        }

        .custom-switch .custom-control-label::after {
            top: calc(0.37rem + 2px) !important;
            left: calc(-2.25rem + 2px) !important;
            width: calc(1.2rem - 4px) !important;
            height: calc(1.2rem - 4px) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            min-width: 0.5em !important;
            padding: 0.5em 1em !important;
            margin-left: 0px !important;
        }

        #jps {
            font-size: 1.2rem !important;
            font-weight: 500 !important;
        }

        #nonjps {
            font-size: 1.2rem !important;
            font-weight: 500 !important;
        }

        th {
            color: #656b9b !important;
        }

        td {
            color: #8b8c96 !important;
            font-size: 0.85rem !important;
        }

        tr {
            font-size: 0.85rem !important;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            border-bottom: none !important;
            width: 25%!important;
        }

        div.dataTables_wrapper div.dataTables_length label {
            color: gray !important;


        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 70px !important;
            height: 35px !important;
            text-align: center;
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
        }

        .btn {
            --ct-btn-border-width: 0px !important;
        }
    </style>

    <div class="userlist_tab_contents_holder">
        <div id="agensi_card" class="card-body p-3">
            <table id="master_data" width="100%" class="display p-3 userlist_tab_content_table table table-responsive">
                <thead>
                    <tr>
                        <th >Tajuk</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Tarikh</th>
                        <th>Tindakan Oleh</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div> <!-- end card-body-->
    </div>

    <!-- script section starts -->
    <section>
        <div class="add_selenggara_data_modal_container">
            <div class="modal fade" id="add_selenggara_data_modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered add_selenggara_data_modal_dialog" role="document">
                    <div class="modal-content add_selenggara_data_modal_content">
                        <div class="add_selenggara_data_modal_header d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="ri-add-circle-fill ri-xl icon_white" alt="add_plus"></i>
                                <h5> Pengumuman</h5>
                            </div>

                            <button type="button" data-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-window-close icon_white"></i>
                            </button>
                        </div>
                        <div class="modal-body add_selenggara_data_modal_body">
                            
                            <form id="pengumumanForm" role="form">
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="nama">Tajuk</label>
                                    <input type="text" class="form-control" id="tajuk" name="tajuk"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Sub Tajuk</label>
                                    <input type="text" class="form-control" id="sub_tajuk" name="sub_tajuk"
                                        value="" />
                                </div>
                                <div class="form-group position-relative">
                                    <label for="Keterangan">Keterangan</label>
                                    <textarea type="text" id="pengumuman_keterangan" name="keterangan" class="form-control"></textarea>
                                </div>

                                <div class="form-group position-relative">
                                    <label for="Keterangan">Tarikh</label>
                                    <input type="date" id="tarikh" name="tarikh" class="form-control"></input>
                                </div>

                                <div class="logo_form_content">
                                    <div class="logo_input_holder">
                                    <label for="Logo_1">
                                                <p>Imej</p>
                                                {{-- <button class="pop_btn">
                                                    <img src="{{ asset('assets/images/i-icon.png') }}"
                                                        alt="icon" /></button> --}}
                                            </label>
                                            <div class="position-absolute pop_content d-none">
                                                <p id="pengu_pop">Logo 1 adalah logo dibahagian kiri</p>
                                            </div>
                                        <div class="logo_input_container position-relative" id="pengu">
                                            <input type="file" id="pengumuman_image" name="pengumuman_image" />
                                            <div class="upload_logo" id="upload_logo_pengum">
                                                <i class="mdi mdi-cloud-upload pengesahan_icon d-block m-auto"></i>
                                                <h5>
                                                    Letakkan fail di sini atau klik untuk memuat naik
                                                </h5>
                                                <p>(Saiz fail tidak melebihi 2mb)</p>                                                
                                            </div>
                                            <div class="image_preview" id="image_preview_pengum">
                                                <div class="uploaded_img_preview_container" id="langing_header_pengum">
                                                <div class="uploaded_img">
                                                    <img src="" id="Logo_img_pengum" alt="" width="100" height="100"/>' 
                                                </div>
                                                <div class="uploaded_img_details">
                                                    <h5 id="header_logo_name_pengum"></h5>
                                                    <p class="flie_size" id="header_log_size_pengum"></p>
                                                </div>
                                                <button type="button" class="remove_image" id="remove_logo_pengum">
                                                    <i class="mdi mdi-window-close"></i>
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="file_size-p d-none" id="file_size-p">
                                                Saiz fail tidak melebihi 2 mb
                                            </p>
                                            <p class="file_type-p d-none" id="file_type-p">
                                                Jenis fail tidak sah
                                            </p>
                                    </div>
                                </div>
                                <input type="hidden" id="peng_img_src" name="peng_img_src" />
                                <div class="text-center">
                                    <input type="button" class="btn btn-success mt-3" style="background-color: #5b63c3;" onclick="submitPengumumanForm()"
                                    value="Simpan">
                                </div>
                                
                                    <!-- <button type="button" id="pengumumanSubmit">Simpan</button>                         -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
<div class="add_selenggara_data"></div>
</section>

</div>
