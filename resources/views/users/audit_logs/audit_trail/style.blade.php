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

/* .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: white !important;
} */


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
/* .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: none;
  color: black!important;
  border-radius: 50%;
} */
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
.dic_date{
    float: right;
    display: inline-flex;
    margin-top: 30px;
    margin-right: -183px;
    margin-bottom: 15px;
    /* margin-right: 15%;
    margin-top: 30px; */
}
input#datefilter {
    border: 1px solid #aaa;
    color: #aaa;
    font-size: 12px;
    border-radius: 3px;
    height: 30px;
    background: url(images/date.png) no-repeat right ;
    background-size: 15px; 
    background-position: right 5% bottom 60%;
}
select#mySelect {
    border: 1px solid #aaa;
    color: #aaa;
    font-size: 12px;
    border-radius: 3px;
    height: 30px;
}
label.green {
    color: green;
    font-weight: 600;
    font-size: 150%;
    /* height: 20px; */
}
label.red {
    color: red;
    font-weight: 600;
    font-size: 150%;
    /* height: 20px; */
}
.tutup-confirm{
  margin: 2% 0 3% 0;
    background-color: #5b64c3;
    color: #fff;
    border: none;
    border-radius: 0.22rem;
    font-size: 0.8rem;
    padding: 0.6rem 1rem;
}
.tutup-confirm-tidak{
  margin: 2% 0 3% 0;
    background-color: #fa5c7c;
    color: #fff;
    border: none;
    border-radius: 0.22rem;
    font-size: 0.8rem;
    padding: 0.6rem 1rem;
}
.tutup-confirm-ya{
  margin: 2% 0 3% 0;
    background-color: #0acf97;
    color: #fff;
    border: none;
    border-radius: 0.22rem;
    font-size: 0.8rem;
    padding: 0.6rem 1rem;
    width: 68px;
}
input.edit_peran {
    width: 20px;
    height: 20px;
    margin-left: 2px;
}
span#error_nama_peranan {
    color: red;
}

    /* 2023 March 09 by Nabilah */
    @media (max-width: 820px) {
        /* Select width for mobile responsive in Senarai Audit Trail */
        select#mySelect {
            border: 1px solid #aaa;
            color: #aaa;
            font-size: 12px;
            border-radius: 3px;
            height: 30px;
            margin-right: 1rem;
        }
    }
    /* End new from Nabilah */
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr td {
  border-top: 1px solid #dee2e6;
  padding: 0.78rem;
  font-size: 0.75rem;
  color: #818390;
  width: 10%!important;
}
</style>