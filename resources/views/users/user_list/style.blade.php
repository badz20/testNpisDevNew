<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #38afd1 !important;
        border:none !important;
        background: white !important;
        border-radius: 50% !important;
    }
    

    .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
        border:none !important;
        background: white !important;   
    }


    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: white !important;
        /* font-weight: 900 !important; */
        border: 1px solid #38afd1 !important;
        border-radius: 50%;
        background-color: #38afd1 !important;
        background:#38afd1 !important;

    }
    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing {
        color:gray !important;
    }
    /* .dataTables_wrapper .dataTables_paginate{
        color: white !important;
    } */
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

    #jps{
        font-size: 1.2rem !important;
        font-weight: 500 !important;
    }
    #nonjps{
        font-size: 1.2rem !important;
        font-weight: 500 !important;
    }

    th{
        color: #656b9b !important;
    }
    td{
        color: #8b8c96 !important;
        font-size: 0.75rem !important;
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

.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register .path_nav li a {
color: #39AFD1;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register h4 {
font-size: 1rem;
color: #717483;
  font-weight: 600;
  letter-spacing: 0.1rem;
  font-family: Poppins_Regular;
}
.project_register h4 {
font-size: 1rem;
color: #717483;
  font-weight: 600;
  letter-spacing: 0.1rem;
  font-family: Poppins_Regular;
}
/* 2023 April 12 by Nabilah */
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr td {
  border-top: 1px solid #dee2e6;
  padding: 0.78rem;
  font-size: 0.75rem;
  color: #818390;
  width: 25%!important;
}

</style>
