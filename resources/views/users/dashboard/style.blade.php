<style>
    .searchIn{
    background:url("{{ asset('assets/images/Icon Cari.png') }}") no-repeat calc(100% - 175px)  center / 15px ;
    padding-left: 15px!important;
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
    
   
    .jpsBtn{
        border-bottom-width: 3.5px !important;
        border-bottom-color: #39AFD1 !important;
        border-left: none !important;
        border-right: none !important;
        border-top:none !important;
        color: #38afd1 !important;
    }

    .nonjpsBtn:focus{
        border-bottom-width: 3.5px !important;
        border-bottom-color: #39AFD1 !important;
        border-left: none !important;
        border-right: none !important;
        border-top:none !important;
        color: #38afd1 !important;
    }
    .jpsBtn:focus{
        border-bottom-width: 3.5px !important;
        border-bottom-color: #39AFD1 !important;
        border-left: none !important;
        border-right: none !important;
        border-top:none !important;
        color: #38afd1 !important;
    }


    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: white !important;
        /* font-weight: 900 !important; */
        border: 1px solid #38afd1 !important;
        border-radius: 50%;
        background-color: #38afd1 !important;
        background:#38afd1 !important;
        font-family: Poppins_Regular;
    }



    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing {
        color:#767988 !important;
        font-family: Poppins_Regular;
    }
    .dataTables_wrapper .dataTables_paginate{
        color: white !important;
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

    /* .dataTables_wrapper .dataTables_paginate{
        margin-left: 0px;
    } */

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        box-sizing: border-box;
        display: inline-block;
        min-width: 1.5em;
        padding: 0.5em 1em;
        margin-left: 2px;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        color: #767988 !important;
        border: 1px solid transparent;
        border-radius: 2px;
        font-family: Poppins_Regular;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #38afd1 !important;
        border:none !important;
        background: white !important;
        border-radius: 50% !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: none;
    color: #38afd1!important;
    border-radius: 50%;
    text-decoration: none;
    }
    #jps{
        font-size: 1rem !important;
        font-weight: 500 !important;
    }
    #nonjps{
        font-size: 1rem !important;
        font-weight: 500 !important;
    }

    th{
        color: #656b9b !important;
    }
    td{
        color: #8b8c96 !important;
        font-size: 0.85rem !important;
    }
    tr{
        font-size: 0.85rem !important; 
    }
    table.dataTable thead th, table.dataTable thead td {
        border-bottom: none !important;
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
    .modal-body.sucess_modal_body {
            padding-top: 65px !important;
        }

    .success {
            top:20% !important;
            left:45% !important;
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
        width: 100px;
        height: 100px;
        border:  solid 4px transparent;
        border-top-color:  #00C8B1 !important;
        border-left-color: #00C8B1 !important;
        border-radius: 50%;
    }

    @keyframes loading-bar-spinner {
    0%   { transform: rotate(0deg);   transform: rotate(0deg); }
    100% { transform: rotate(360deg); transform: rotate(360deg); }
    }

    #temp_user_length{
    width: 50% !important;
    position: relative;
        top: 33px;
    }
    #temp_user_filter{
     float: right;
    margin-bottom:40px;
    }

    #temp_user_paginate{
    float: right;
    position: relative;
    top:-12px;
    margin-top:23px;
    }
    #temp_user_info{
    position: relative;
        top: 9px;
    }
    #dashboard_thead{

    }
.tutup{
        height: 36px;
        color: #fff;
        background-color: #0ACF97;
        border: none;
        border-radius: 5px;
        font-size: 0.8rem;
        width: 70px;
    }
    div.reject_comment{
        border: 0.5px #6C757D solid;
        /* margin-bottom: 50px; */
    }

    button#Reject{
        width: 46%;
        color: #fff;
        background-color: #FA5C7C;
        border: none;
        border-radius: 5px;
        height: 36px;
        font-size: 0.8rem;
    }

    button#Update {
        height: 36px;
        color: #fff;
        background-color: #5B63C3;
        border: none;
        border-radius: 5px;
        font-size: 0.8rem;
    }

    div#reject_success {
        border: 2px solid blue;
        border-radius: 40px;
    }
    div.comment{
        padding-top: 20px;
        padding-left: 16px;
    }
    .text-center {
        margin-top: 20px;
    }

    text.highcharts-title {
        font-family: Poppins_Regular !important;
        color: #6e7180 !important;
        font-weight: 500 !important;
    }

    /* 2023 March 31 by Nabilah starts */
    .user_profile_footer {
        font-size: 0.9rem;
        padding: 1.5% 4.5%;
        border-top: 1px solid #dee2e6;
        font-family: Poppins_Regular;
        color: #6c757d;
    }
    .user_profile_icon {
        color: #6c757d;
    }
    /* 2023 March 31 by Nabilah ends */
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register {
padding: 1% 2.8% 1% 1%;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register .path_nav li a {
color: #39AFD1;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register h4 {
    font-size: 1.1rem;
  color: #6e7180;
  font-weight: 600;
  letter-spacing: 0.1rem;
  font-family: Poppins_Regular;
}

/* 2023 Aug 8 by Nabilah (Icons style) start */
i {
  color: #61676e;
}
.icon_topbar {
  color: #313a47;
  font-size: 2.3em;
  font-weight: bold;
}
.icon_profile {
  color: #ffc35a;
  font-size: 2.5em;
}
.icon_white {
  color: white;
  padding: 0rem 0.2rem 0rem 0.2rem;
}
.icon_black {
  color: #000;
}
.icon_light_grey {
  color: #d2e3f5;
}
.icon_blue {
  color: #39aFd1;
}
.uil_icon {
  font-size: 2em;
}
.mdi_icon {
  font-size: 2.5em;
}
.icon_dropdown {
  color: #98a3a8;
  font-size: 1.5em;
}
.breadcrumbs_icon {
  font-size: 1.7em;
}
.pengesahan_icon {
  font-size: 3.5em;
}
.info_icon {
  font-size: 1.2em;
  color: #0062dd;
}
.icon_remove {
  color: white;
  font-size: 1.5em;
}
.icon_yellow_bg {
  background-color: #FFF0D6!important;
  border: 0.2rem;
  border-radius: 6px;
  margin: 1%;
}
.icon_header_pentadbir {
  color: #ffcb71;
  margin: 0.1rem 0.4rem 0.1rem 0.4rem;
}

.jumlah_class {
    background-color: #39Afd1;
    align-items: center;
}
label.jumlah_text {
    color: #fff !important;
    margin-left: 30% !important;
}
</style>