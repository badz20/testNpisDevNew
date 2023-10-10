<style>
	p#file_size {
        padding-left: 12px;
        color: red;
    }
    p#file_type {
        padding-left: 12px;
        color: red;
    }
    span.error {
        color:red;
        font-size:12px;
    }
    label.col-form-label.form_label {
        padding-top: 0px;
    }
    #sucess_modal_register {
        background-color: rgba(0, 0, 0, 0.2);
    }
    .btn_upload {
    cursor: pointer;
        display: inline-block;
        overflow: hidden;
        position: relative;
        border: 1px solid #8ea4ad;
        padding: 5px 10px;
        border-radius: 6px;
        width:130px;
    }
    .pop_btn {
        margin-left: 12px;
        height: 20px;
        width: 20px;
    }
    .file_label.d-flex {
        margin-right: 15px;
    }
    .btn_upload:hover,
    .btn_upload:focus {
    cursor: pointer;
    }
    .yes {
    display: flex;
    align-items: flex-start;
    margin-top: 10px !important;
    border: 1px solid #dddddd;
        padding-top: 9px;
        padding-bottom: 9px;
        padding-left: 30px;
        padding-right: 66px;
    }
    .btn_upload input {
    cursor: pointer;
    height: 100%;
    position: absolute;
    -moz-opacity: 0;
    opacity: 0;
    }
    .it {
    height: 100px;
    margin-left: 10px;
    }
    .btn-rmv1,
    .btn-rmv2,
    .btn-rmv3,
    .btn-rmv4,
    .btn-rmv5 {
    display: none;
    }
    .rmv {
    cursor: pointer;
    color: #fff;
    border-radius: 30px;
    border: 1px solid #fff;
    display: inline-block;
    background: rgba(255, 0, 0, 1);
    margin: -5px -10px;
    }
    .rmv:hover {
    background: rgba(255, 0, 0, 0.5);
    }
    button#remove_pdf {
        border: 0px;
        font-size: 10px;
        background-color: transparent;
        color: red;
        padding-left: 12px;
        padding-top: 5px;
    }
    .selected_file.d-flex {
        padding-left: 10px;
    }
    p.file_sizes {
        font-size: 12px;
        padding-top: 13px;
        padding-left: 15px;
    }
    label.form_check_label {
        color: #595b5f !important;
    }
    label.r_container {
        color: black !important;
        filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.19));
        font-weight: 600;
    }
    button#close_button_nodata {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .comment {
        padding-top: 35px;
        font-size: 90px;
    }
    .modal-content.add_role_sucess_modal_content {
        height: 230px;
    }
    h5#cmd {
        font-size: 1.43rem;
        text-align: center;
    }
    #loading-bar-spinner.spinner {
        left: 50%;
        margin-left: -20px;
        top: 50%;
        margin-top: -20px;
        position: absolute;
        z-index: 19 !important;
        animation: loading-bar-spinner 400ms linear infinite;
    }

    #loading-bar-spinner.spinner .spinner-icon {
        width: 40px;
        height: 40px;
        border:  solid 4px transparent;
        border-top-color:  #00C8B1 !important;
        border-left-color: #00C8B1 !important;
        border-radius: 50%;
    }

    @keyframes loading-bar-spinner {
    0%   { transform: rotate(0deg);   transform: rotate(0deg); }
    100% { transform: rotate(360deg); transform: rotate(360deg); }
    }
    .required:after {
        content:" *";
        color: red;
    }

    select#kementerian {
        width: 100%;
        border: 1px solid #ced4da;
    }
    .col-md-3.form_input.jabatan_col {
                        width: 30% !important;
                        padding-left: 0px;
                        height: 50px;
                    }
    .col-md-3.form_input.negeri_col{
                        width: 28% !important;
                        padding-left: 0px;
                        height: 50px;
    }
    .row.jabatan_row {
                        width: 110%;
    }
    div#jabatan_agensy_drop {
                    margin-bottom: 22px !important;
    }
</style>


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/Mediaquery.css') }}" />
<!-- captcha -->