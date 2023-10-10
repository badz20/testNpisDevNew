@extends('layouts.main.master_responsive')
@include('users.audit_logs.style')
@section('content_main')

      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <x-form.spinner>
          <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
          </x-slot>
        </x-form.spinner>
        <!-- HEADER Section starts -->
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header project_register row">
            <div class="col-md-5 col-xs-12 Profil_Pengguna_text">
              <h4>Audit Trail</h4>
            </div>
            <div class="col-md-7 col-xs-12 path_nav_col">
              <ul class="path_nav row">
                <li>
                  <a href="/home"  style="display: flex; align-items: center;">
                    <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                    Pentadbir
                    <img
                      class="arrow_nav ml-2"
                      src="{{ asset('images/arroew.png') }}"
                      alt="arroew"
                    />
                  </a>
                </li>                             
                <li><a href="/audit-logs" class="active text-secondary"> Audit Trail</a></li>
              </ul>
            </div>
          </div>
          <div class="userlist_container">
            <div class="userlist_content">
              <div class="userlist_content_header">
                <div class="userlist_content_header_left d-flex">
                  <div class="icon_yellow_bg">
                    <span class="iconify icon_header_pentadbir" data-icon="mdi-database-outline" style="font-size
                        : 2em;"></span>
                  </div>
                  <h3 id="spatial_label">AUDIT TRAIL</h3>                
                </div>
                <div class="userlist_content_header_right d-flex">
                  <!-- <button 
                  class="printing"
                  style="height: 39px; width: 55px; display: flex; align-items: center;"
                  >
                    <i class="ri-printer-fill icon_white ri-2x"></i>
                  </button> -->
                  <x-form.print></x-form.print>

                </div>
              </div>
              <input type="hidden" id="api_url" value={{env('API_URL')}}>
              <input type="hidden" id="token" value={{env('TOKEN')}}>
              <div class="userlist_tab_container">
                <div class="userlist_tab_btn_container">
                  <button>AUDIT LOGS</button>
                </div>
                <div class="userlist_tab_content_container">
                  <div class="userlist_tab_content">
                    <div class="userlist_tab_contents_holder">
                        <div id="agensi_card" class="card-body p-3">
                            <table id="master_data" width="100%" class="display p-3 userlist_tab_content_table table">
                                <thead>
                                    <tr>
                                        <th>Nama Audit</th>                                                                            
                                    </tr>                          
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="d-flex align-items-center folder">
                                          <i class="mdi mdi-folder-outline m-0 icon_dropdown"></i>                              
                                                        <p style="cursor:pointer"><a class="logs" href="/login-logs">Login Log</a></p>                               
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="d-flex align-items-center folder">
                                          <i class="mdi mdi-folder-outline m-0 icon_dropdown"></i>                            
                                                        <p style="cursor:pointer"><a class="logs" href="/project-logs">Log Projek</a></p>                               
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="d-flex align-items-center folder">
                                          <i class="mdi mdi-folder-outline m-0 icon_dropdown"></i>                             
                                                        <p style="cursor:pointer"><a class="logs" href="/registration-logs">Log Pendaftaran</a></p>                               
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  <!-- end card-body-->
                    </div>
                    <div class="userlist_tab_content_table_footer">
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
        <!-- HEADER Section Ends -->
      </div>
      <!-- Mainbody_conatiner Starts -->
    </div>
    
    @endsection
    @section('scripts')
    <script>
      
          $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
        $(document).ready(function () {   
          if({{json_encode($viewOnly)}}) {
        disableInputs()
        }


   function disableInputs() {
      // Get all input elements
      const inputs = document.getElementsByTagName("input");
      
      // Loop through each input element
      for (let i = 0; i < inputs.length; i++) {
        const input = inputs[i];

        // Check if input is not a button and not already disabled
        if (input.type !== "button" && !input.disabled) {
          // Set readonly attribute
          input.readOnly = true;
          
          // Check if input is a checkbox or radio button
          if (input.type === "checkbox" || input.type === "radio") {
            // Disable checkbox or radio button
            input.disabled = true;
          }
        }
      }

      // Get all button elements
      const buttons = document.getElementsByTagName("button");

      // Loop through each button element
      for (let i = 0; i < buttons.length; i++) {
        const button = buttons[i];

        // Disable button
        button.disabled = true;
      }
    }

                    var jps_table =$('#master_data').DataTable({ 
                      pagingType: 'full_numbers',    
                    "language": {
                            "lengthMenu": "Papar _MENU_ Entri",
                            "zeroRecords": "Tiada apa-apa ditemui - maaf",
                            "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                            "infoEmpty": "Tiada rekod tersedia",
                            "infoFiltered": "(filtered from _MAX_ total records)",
                            "search": "_INPUT_",
                            "searchPlaceholder": " Carian",
                            "paginate": {
                            "first":      "Awal",
                            "last":       "Akhir",
                            "next":       "Seterusnya",
                            "previous":   "Sebelum"
                            },       
                        }
                });
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                $('input[type="search"]').addClass('searchIn');
                $(".searchIn").keypress(function(){
                $(this).removeClass().addClass("searchOut")
                })
                
                $(".searchIn").click(function(){
                if(!$(this).hasClass("searchOut"))
                    $(this).addClass("searchIn")
                })
                
                $(document).on("keyup",".searchOut", function(){
                if(($(this).val().length) == 0 )
                    $(this).removeClass().addClass("searchIn")
                })
        });

        let accordian_single_list = document.querySelectorAll(
    ".accordian_single_list"
  );
  let d_arrow = document.querySelectorAll(".d_arrow");

  accordian_single_list.forEach((asl) => {
    asl.addEventListener("click", () => {
      d_arrow.forEach((darr) => {
        darr.classList.remove("active");
      });
      // let accordian_content = asl.closest(".accordian_content ");
      // console.log(accordian_content);
      let arrow = asl.querySelector(".d_arrow");
      let Accordian_link = asl.querySelector(".Accordian_link");
      if (Accordian_link.classList.contains("collapsed")) {
        arrow.classList.add("active");
      } else {
        arrow.classList.remove("active");
      }
    });
  });

</script>
@endsection