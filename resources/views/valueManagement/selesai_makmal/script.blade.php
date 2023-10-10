<script src="assets/js/jquery.min.js"></script>
<script>

          $('#jps_card').show();
          $('#makmal_vr_card').hide();
          $('#agensi_card').hide(); 
          $('#makmal_mini_card').hide(); 


     $('#agensi_card').hide();
      function makmal_ve(){
          $('#jps_card').hide();
          $('#makmal_vr_card').hide();
          $('#agensi_card').show();
          $('#makmal_mini_card').hide(); 
          document.getElementById("makmal_ve_btn").classList.add("active");
          document.getElementById("makmal_va_btn").classList.remove("active"); 
          document.getElementById("makmal_vr_btn").classList.remove("active");   
          document.getElementById("makmal_mini_va_btn").classList.remove("active");   
      }
      function makmal_va(){
          $('#jps_card').show();
          $('#makmal_vr_card').hide();
          $('#agensi_card').hide(); 
          $('#makmal_mini_card').hide(); 
          document.getElementById("makmal_ve_btn").classList.remove("active");
          document.getElementById("makmal_va_btn").classList.add("active"); 
          document.getElementById("makmal_vr_btn").classList.remove("active");
          document.getElementById("makmal_mini_va_btn").classList.remove("active");       
      }
      function makmal_vr(){
          $('#makmal_vr_card').show();
          $('#jps_card').hide();
          $('#agensi_card').hide();
          $('#makmal_mini_card').hide(); 
          document.getElementById("makmal_ve_btn").classList.remove("active");
          document.getElementById("makmal_va_btn").classList.remove("active"); 
          document.getElementById("makmal_vr_btn").classList.add("active"); 
          document.getElementById("makmal_mini_va_btn").classList.remove("active");   
      }

      function makmal_mini_va(){
          $('#makmal_vr_card').hide();
          $('#jps_card').hide();
          $('#agensi_card').hide();
          $('#makmal_mini_card').show(); 
          document.getElementById("makmal_ve_btn").classList.remove("active");
          document.getElementById("makmal_va_btn").classList.remove("active"); 
          document.getElementById("makmal_vr_btn").classList.remove("active"); 
          document.getElementById("makmal_mini_va_btn").classList.add("active");   
      }

        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });

        $(document).ready(function(){
            const user_bahagian= {{$bahagian}};    
            const api_url = "{{ env('API_URL') }}";
            const api_token = "Bearer "+ window.localStorage.getItem('token');
            let user_Type_new = {{$user}};
            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'get',
                url: api_url+"api/project/rmkData",
                responseType: 'json'
            })
            .then(function (response) {
                console.log(response.data)
                var selectRmk=$("#rmk-dropdown");
                var rollingPlan=$("#rolling-plan");
                var bahagian=$("#bahagian");
                for(var k=0;k<response.data.data.length;k++)
                {
                    selectRmk.append("<option val="+response.data.data[k].rmk+">"+response.data.data[k].rmk+"</option>")             
                }
                let first_rolling = true
                for(var j=0;j<response.data.data1.length;j++){
                    var is_selectable=response.data.data1[j].is_selectable;
                        // $(this).prop('disabled', true)
                    rollingPlan.append("<option id="+response.data.data1[j].id+" value="+response.data.data1[j].id+">"+response.data.data1[j].name+"</option>")
                    if(is_selectable==0){
                        //$("#"+response.data.data1[j].id+"").prop('disabled', true);
                    }
                    else {
                                if(first_rolling) {
                                    //$("#"+response.data.data1[j].id+"").attr("selected","selected"); 
                                    first_rolling = false;
                                }
                    }
                }
                    document.getElementById("rmk-dropdown").disabled = true;
                    var today = new Date();
                    var year = today.getFullYear()+1; console.log(year)
                    //document.getElementById("current_year").value = year;

                    for(var j=0;j<response.data.data2.length;j++){
                        if(user_bahagian==response.data.data2[j].id  & user_bahagian!==0)
                        {
                            bahagian.append("<option value="+response.data.data2[j].id+" selected>"+response.data.data2[j].nama_bahagian+"</option>")
                        }
                        else
                        {
                            bahagian.append("<option value="+response.data.data2[j].id+">"+response.data.data2[j].nama_bahagian+"</option>")
                        }
                    }
                    
                   if({{ Auth::user()->is_superadmin}} == 1 || {{ Auth::user()->user_type_id}} == 4 )
                   { 
                    document.getElementById("bahagian").disabled = false;
                   }
                   else
                   {
                    document.getElementById("bahagian").disabled = true;
                   }


            })


        })

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
       $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        var va = {'va':1}; 
        var mini_va = {'va':2}; 

        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        
        $.ajax({
          type: "GET",
          url: api_url+"api/project/makmal_list_VA?user=" + {{ Auth::user()->id}},
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          data:va,
          success: function(response) {  
              console.log(response)      
              
              loadDatatableJps(response);
          },
          error: function(response) {
              console.log(response);
          }
          }); 

          $.ajax({
            type: "GET",
            url: api_url+"api/project/makmal_list_VE?user=" + {{ Auth::user()->id}},
            dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
          data:mini_va,
          success: function(response) { 
            console.log(response.data)
            loadDatatableAgensi_user(response);

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          },
          error: function(response) {
              console.log(response);
          }
          }); 

          $.ajax({
            type: "GET",
            url: api_url+"api/project/makmal_list_VR?user=" + {{ Auth::user()->id}},
            dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
          data:mini_va,
          success: function(response) { 
            console.log(response.data)
            loadDatatableMakmlVr(response);
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          },
          error: function(response) {
              console.log(response);
          }
          });

          $.ajax({
                    type: "GET",
                    url: api_url+"api/project/makmal_list_mini_va?user=" + {{ Auth::user()->id}},
                    dataType:"json",
                    contentType: "application/json",
                    header:{
                        'contentType': "application/json",
                        'Authorization':api_token
                    },
                    data:mini_va,
                    success: function(response) { 
                        console.log(response.data)
                        loadDatatableMakmlMiniVA(response);

                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    },
                    error: function(response) {
                        console.log(response);
                    }
          });
    });

    function number_format($num)
    { //console.log($num)
        if(isNaN($num))
        {
          return '0.00';
        }
        else
        {
          if($num!=null && $num!='.00')
          {
            $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            return $abc;
          }
          else
          {
            return '0.00';
          }
        }      
    }

    function loadDatatableJps(response)
    { //console.log(response)

        // if (jps_table) {
        //     jps_table.destroy();
        // }
        
        $("#jps_user").dataTable().fnDestroy();
        var jps_table =$('#jps_user').DataTable({     
                  data: response.data,
                  dom: "Blfrtip",
                  "aaSorting": [],
                  "language": {
                                    "lengthMenu": "Papar _MENU_ Entri",
                                    "zeroRecords": "Tiada rekod dijumpai",
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
                                },
                                pagingType: 'full_numbers',
                                columnDefs: [
                      {
                          targets:0, // Start with the last
                          render: function ( data, type, row, meta ) { console.log(row)
                              if(type === 'display'){
                                data='<div class="d-flex" onClick="loadView('+row.id+')">'+                                
                                                '<a style="color:black !important;" >' + row.rmk + '</a>' +
                                        '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data='<div class="d-flex">'+                                
                                                '<a style="color:black !important;">' + row.rolling_plan_name + '</a>' +
                                        '</div>';
                                }
                                return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data='<div class="d-flex">'+                                
                                                '<a style="color:black !important;">' + row.kod_projeck + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=
                                '<div class="d-flex">'+                                
                                    '<a style="color:black !important;">' + row.nama_projek + '</a>' +
                                '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=row.nama_bahagian;
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=number_format(row.kos_projeck)
                              }
                              return data;
                          }
                      },
                      {
                          targets:7, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        $btn='Selesai';
                                        // '<button type="button" class="VM_senaraiprojekbtn" onClick="SetVa('+row.id+')">VR</button>';
                                }
                              return $btn;
                            }
                      },
                      {
                          targets:8, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        if(row.noc_status != null)
                                        {
                                            $btn='<a href="#">'+'Dalam Tindakan'+'</a>';
                                        }
                                        else
                                        {
                                            $btn='<a href="#">'+''+'</a>';
                                        }
                                }
                              return $btn;
                            }
                      },
                      {
                          targets:9, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        if(row.status_perlaksanaan==30 && {{$user}}==4)
                                        {
                                            $btn='<button id="veBtn" value="'+row.id+'" type="button" class="VM_senaraiprojekbtn" ">VE</button>';
                                        }
                                        else
                                        {
                                            $btn='';
                                        }
                                }
                              return $btn;
                            }
                      },
                      {
                          targets:10, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        if(row.status_perlaksanaan==30 && {{$user}}==4)
                                        {
                                            $btn='<button id="vrBtn"  value="'+row.id+'" type="button"  class="VM_senaraiprojekbtn" >VR</button>';
                                        }
                                        else
                                        {
                                            $btn='';
                                        }
                                }
                              return $btn;
                            }
                      },
                  ] , 
                  columns: [
                      
                      { data: 'rmk', "sortable": true},
                      { data: 'rolling_plan_name', "sortable": true  }, 
                      { data: 'tahun', "sortable": true},
                      { data: 'kod_projeck' ,  "sortable": true },
                      { data: 'nama_projek', "sortable": true  },   
                      { data: 'nama_bahagian',  "sortable": true  },
                      { data: 'kos_projeck', "sortable": true  },
                      { data: 'status_name', "sortable": true },

                  ],
                  
                  
                     
              });
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

                $("#jps_user tbody").on("click", "td", function () {
                    var clickedCellIndex = this.cellIndex; 
                    var lastCellIndex = this.parentElement.cells.length - 1;
                    var secondLastCellIndex = lastCellIndex - 1;

                    // Check if the clicked cell is the last or second-to-last cell
                    if (clickedCellIndex === lastCellIndex )
                    {
                        console.log("Clicked the last cell:", this.textContent);
                        var vrId=$("#vrBtn").val();
                          SetData(vrId,'36');
                    }
                    else if(clickedCellIndex === secondLastCellIndex) 
                    {
                    // Perform the desired action for the last or second-to-last cell
                        console.log("Clicked the second-to-last cell:", this.textContent);
                        var veId=$("#veBtn").val();
                        SetData(veId,'31');
                    } 
                    else 
                    {
                    // Perform the desired action for other cells (excluding last and second-to-last)
                        console.log("Clicked a regular cell:", this.textContent);
                        // var dataTableInstance = $("#jps_user").data("datatable-instance");
                        // var rowData = dataTableInstance.row(this).data(); console.log(rowData);

                        var data = jps_table.row(this).data(); 
                        var user_type = {{$user}};
                        //console.log(data)
                        if (typeof data !== "undefined") 
                        {
                            if(user_type==4 && data.penjilidan_status_va==1)
                            {
                                var url = '{{ route("vm.penjilidan", [":kod" , ":type"])}}'
                                url = url.replace(':type', "VA");
                                url = url.replace(':kod', data.id);
                                window.location.href = url;

                            }
                            else
                            {
                                loadView(data.id);
                                
                            }
                            
                        }
                    }
                });
                
                // $('#jps_user tbody tr td:last-child').click(function(){
                //     var veId=$("#veBtn").val();
                //     SetData(veId,'31');
                // })
                // $("#jps_user tbody tr td:not(:last-child)").click(function() {
                //     var data = jps_table.row(this).data();
                //     var user_type = {{$user}};
                //     console.log(data.id)

                //     if(data.penjilidan_status_va==1)
                //     {
                //         var url = '{{ route("vm.penjilidan", [":kod" , ":type"])}}'
                //         url = url.replace(':type', "VA");
                //         url = url.replace(':kod', data.id);
                //         window.location.href = url;

                //     }
                //     else if(user_type==4 && (data.status_perlaksanaan==30 && data.penjilidan_status_va!=1))
                //     {
                //         localStorage.setItem('isVEclicked', 'clicked');
                //         var url = '{{ route("vm.maklumatPelakasanaanMakmal", [":kod" , ":type"])}}'
                //         url = url.replace(':type', "VA");
                //         url = url.replace(':kod', data.id);
                //         window.location.href = url;
                //     }
                //     else
                //     {
                        
                        
                //     }
                // });

    }

    function loadView(id)
    { console.log(id)
                    localStorage.setItem('isVEclicked', '');
                   var url = '{{ route("vm.maklumatPelakasanaanMakmal", [":kod" , ":type"])}}'
                        url = url.replace(':type', "VA");
                        url = url.replace(':kod',id);
                        window.location.href = url;
    }

    function loadDatatableAgensi_user(response)
    {
        var agency_table =$('#agensi_user').DataTable({
                  data: response.data,
                  dom: "Blfrtip",
                  "aaSorting": [],
                  "language": {
                                    "lengthMenu": "Papar _MENU_ Entri",
                                    "zeroRecords": "Tiada rekod dijumpai",
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
                                },
                  columnDefs: [
                    {
                          targets:0, // Start with the last
                          render: function ( data, type, row, meta ) { console.log(row)
                              if(type === 'display'){
                                data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+','+row.penjilidan_status_ve+')">'+                                
                                                '<a style="color:black !important;">' + row.rmk + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                             if(type === 'display'){
                                data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+','+row.penjilidan_status_ve+')">'+                                
                                                '<a style="color:black !important;">' + row.rolling_plan_name + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+','+row.penjilidan_status_ve+')">'+                                
                                                '<a style="color:black !important;" >' + row.kod_projeck + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                              if(type === 'display'){
                                data=   '<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+','+row.penjilidan_status_ve+')">'+                                
                                            '<a style="color:black !important;">' + row.nama_projek + '</a>' +
                                        '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+','+row.penjilidan_status_ve+')">'+                                
                                            '<a style="color:black !important;">' + row.nama_bahagian + '</a>' +
                                        '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+','+row.penjilidan_status_ve+')">'+                                
                                            '<a style="color:black !important;">' + number_format(row.kos_projeck) + '</a>' +
                                        '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:8, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        if(row.noc_status != null)
                                        {
                                            $btn='<a href="#">'+'Dalam Tindakan'+'</a>';
                                        }
                                        else
                                        {
                                            $btn='<a href="#">'+''+'</a>';
                                        }
                                }
                              return $btn;
                            }
                      },
                      {
                          targets:9, // Start with the last
                          render: function ( data, type, row, meta ) {

                            
                            if(type === 'display'){
                                        if(row.status_perlaksanaan!=36  && {{$user}}==4)
                                        {
                                            $btn='<button id="vrBtn"  value="'+row.id+'" type="button" onClick="SetData('+row.id+ ',' + '36'+')" class="VM_senaraiprojekbtn" >VR</button>';
                                        }
                                        else
                                        {
                                            $btn='';
                                        }
                                }
                              return $btn;
                            }
                      },
                  ] , 
                  columns: [
                      
                      { data: 'rmk', "sortable": true},
                      { data: 'rolling_plan_name', "sortable": true  }, 
                      { data: 'tahun', "sortable": true},
                      { data: 'kod_projeck' ,  "sortable": true },
                      { data: 'nama_projek', "sortable": true  },   
                      { data: 'nama_bahagian',  "sortable": true  },
                      { data: 'kos_projeck', "sortable": true  },
                      { data: 've_status_name', "sortable": true },
                  ],
              }); 

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
    }

    function load_VE_VR(id)
    {
        localStorage.setItem('isVEclicked', 'clicked');
        var url = '{{ route("vm.maklumatPelakasanaanMakmalVR", [":kod" , ":type"])}}'
            url = url.replace(':type', "VR");
            url = url.replace(':kod', id);
            window.location.href = url;
    }

    function loadDatatableMakmlVr(response)
    { console.log(response)
        var makmal_vr_table =$('#makmal_vr_user').DataTable({     
                  data: response.data,
                  dom: "Blfrtip",
                  "aaSorting": [],
                  "language": {
                                    "lengthMenu": "Papar _MENU_ Entri",
                                    "zeroRecords": "Tiada rekod dijumpai",
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
                                },
                                pagingType: 'full_numbers',
                                columnDefs: [
                      {
                          targets:0, // Start with the last
                          render: function ( data, type, row, meta ) { console.log(row)
                              if(type === 'display'){
                                data='<div class="d-flex" onClick="loadView('+row.id+')">'+                                
                                                '<a style="color:black !important;" >' + row.rmk + '</a>' +
                                        '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data='<div class="d-flex">'+                                
                                                '<a style="color:black !important;">' + row.rolling_plan_name + '</a>' +
                                        '</div>';
                                }
                                return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data='<div class="d-flex">'+                                
                                                '<a style="color:black !important;">' + row.kod_projeck + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=
                                '<div class="d-flex">'+                                
                                    '<a style="color:black !important;">' + row.nama_projek + '</a>' +
                                '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=row.nama_bahagian;
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=number_format(row.kos_projeck)
                              }
                              return data;
                          }
                      },
                    //   {
                    //       targets:8, // Start with the last
                    //       render: function ( data, type, row, meta ) {
                    //         if(type === 'display'){
                    //                     $btn='<button type="button" class="VM_senaraiprojekbtn" onClick="SetVa('+row.id+')">VA</button>'+
                    //                     '<button type="button" class="VM_senaraiprojekbtn" onClick="SetVa('+row.id+')">VE</button>';
                    //             }
                    //           return $btn;
                    //         }
                    //   },
                  ] , 
                  columns: [
                      
                      { data: 'rmk', "sortable": true},
                      { data: 'rolling_plan_name', "sortable": true  }, 
                      { data: 'tahun', "sortable": true},
                      { data: 'kod_projeck' ,  "sortable": true },
                      { data: 'nama_projek', "sortable": true  },   
                      { data: 'nama_bahagian',  "sortable": true  },
                      { data: 'kos_projeck', "sortable": true  },
                      { data: 'vr_status_name', "sortable": true },
                  ],
                  
                  
                     
              });
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
              $('#makmal_vr_user tbody').on('click', 'tr', function () {

                    var data = makmal_vr_table.row(this).data();
                    console.log(data.id)
                    loadVRView(data.id);
                });

    }

    function loadVRView(id)
    { console.log(id)
            //var url = '{{ url("/user-profile", ":id")}}'
            var url = '{{ route("projek.KalendarVM", [":kod" , ":type"])}}'
            // maklumatPelakasanaanMakmal_VR
            url = url.replace(':type', "VR");
            url = url.replace(':kod', id);
            window.location.href = url;
            localStorage.setItem("isVEclicked", "");

    }

    function loadDatatableMakmlMiniVA(response)
    { console.log(response)
        var makmal_mini_va_table =$('#makmal_mini_user').DataTable({     
                  data: response.data,
                  dom: "Blfrtip",
                  "aaSorting": [],
                  "language": {
                                    "lengthMenu": "Papar _MENU_ Entri",
                                    "zeroRecords": "Tiada rekod dijumpai",
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
                                },
                                pagingType: 'full_numbers',
                                columnDefs: [
                      {
                          targets:0, // Start with the last
                          render: function ( data, type, row, meta ) { console.log(row)
                              if(type === 'display'){
                                data='<div class="d-flex" onClick="loadView('+row.id+')">'+                                
                                                '<a style="color:black !important;" >' + row.rmk + '</a>' +
                                        '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data='<div class="d-flex">'+                                
                                                '<a style="color:black !important;">' + row.rolling_plan_name + '</a>' +
                                        '</div>';
                                }
                                return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data='<div class="d-flex">'+                                
                                                '<a style="color:black !important;">' + row.kod_projeck + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=
                                '<div class="d-flex">'+                                
                                    '<a style="color:black !important;">' + row.nama_projek + '</a>' +
                                '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=row.nama_bahagian;
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=number_format(row.kos_projeck)
                              }
                              return data;
                          }
                      },
                      {
                          targets:7, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        $btn='Selesai';
                                        // '<button type="button" class="VM_senaraiprojekbtn" onClick="SetVa('+row.id+')">VR</button>';
                                }
                              return $btn;
                            }
                      },
                      {
                          targets:8, // Start with the last
                          render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                        if(row.noc_status != null)
                                        {
                                            $btn='<a href="#">'+'Dalam Tindakan'+'</a>';
                                        }
                                        else
                                        {
                                            $btn='<a href="#">'+''+'</a>';
                                        }
                                }
                              return $btn;
                            }
                      },
                  ] , 
                  columns: [
                      
                      { data: 'rmk', "sortable": true},
                      { data: 'rolling_plan_name', "sortable": true  }, 
                      { data: 'tahun', "sortable": true},
                      { data: 'kod_projeck' ,  "sortable": true },
                      { data: 'nama_projek', "sortable": true  },   
                      { data: 'nama_bahagian',  "sortable": true  },
                      { data: 'kos_projeck', "sortable": true  },
                      { data: 'status_name', "sortable": true },

                  ],
                  
                  
                     
              });
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

                $('#makmal_mini_user tbody').on('click', 'tr', function () {

                    var data = makmal_mini_va_table.row(this).data();
                    var user_type = {{$user}};

                    if(user_type==4)
                    {
                        var url = '{{ route("vm.penjilidan", [":kod" , ":type"])}}'
                        url = url.replace(':type', "VA");
                        url = url.replace(':kod', data.id);
                        window.location.href = url;
                    }
                    else
                    {
                        var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
                        url = url.replace(':type', "Mini_VA");
                        url = url.replace(':kod', data.id);
                        window.location.href = url;
                    }
                    
                });
    }

    $('#btn_reset').click(function(){
        document.getElementById('rolling-plan').value = '';
        document.getElementById('nama_project').value = '';
        document.getElementById('kod_project').value = '';
        document.getElementById('current_year').value = '';
        document.getElementById('status').value = '';
        filterDATA('reset');

    });

    $('#btn_cari').click(function(){
        filterDATA('filter');
    });

    function filterDATA(type){
        var makmal_va_hasActive=$("#makmal_va_btn").hasClass('active');
        var makmal_ve_hasActive=$("#makmal_ve_btn").hasClass('active');
        var makmal_vr_hasActive=$("#makmal_vr_btn").hasClass('active');
        var makmal_mini_va_hasActive=$("#makmal_mini_va_btn").hasClass('active');

        // console.log(makmal_vr_hasActive);

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        var formData = new FormData();
           if(type=='reset')
           {
                formData.append('rmk_value', '');
                formData.append('rolling_plan', '');
                formData.append('nama_project', '');
                formData.append('kod_project', '');
                formData.append('tahun', '');
                formData.append('bahagian', '');
                formData.append('status', document.myform.status.value);
           }
           else
           {
                formData.append('rmk_value', document.myform.rmk.value);
                formData.append('rolling_plan', document.myform.rolling_plan.value);
                formData.append('nama_project', document.myform.nama_project.value);
                formData.append('kod_project', document.myform.kod_project.value);
                formData.append('tahun', document.myform.current_year.value);
                formData.append('bahagian', document.myform.bahagian.value);
                formData.append('status', document.myform.status.value);
           }

        const api_url = "{{ env('API_URL') }}";
        const api_token = "Bearer "+ window.localStorage.getItem('token');
        if(makmal_va_hasActive){
            data_url = api_url+"api/project/filter-projects-va?user=" + {{ Auth::user()->id}};

            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'post',
                url: data_url,
                data: formData
            })
            .then(function (response) { console.log(response)
                //$("#jps_user").dataTable().fnDestroy();
                loadDatatableJps(response.data);
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                
                const table = document.getElementById('jps_user');
                    if (table) {
                        table.scrollIntoView({
                        behavior: 'smooth', // Use 'auto' for immediate scrolling
                        block: 'start',     // Scroll to the top of the table
                        inline: 'nearest'   // Scroll horizontally to the nearest edge of the table
                        });
                    }
            });
        }
        if(makmal_ve_hasActive){
            data_url = api_url+"api/project/filter-projects-ve?user=" + {{ Auth::user()->id}};
            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'post',
                url: data_url,
                data: formData
            })
            .then(function (response) { console.log(response)
                $("#agensi_user").dataTable().fnDestroy();
                loadDatatableAgensi_user(response.data);

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                const table = document.getElementById('agensi_user');
                    if (table) {
                        table.scrollIntoView({
                        behavior: 'smooth', // Use 'auto' for immediate scrolling
                        block: 'start',     // Scroll to the top of the table
                        inline: 'nearest'   // Scroll horizontally to the nearest edge of the table
                        });
                    }
            })
        }
        if(makmal_vr_hasActive){
            data_url = api_url+"api/project/filter-projects-vr?user=" + {{ Auth::user()->id}};
            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'post',
                url: data_url,
                data: formData
            })
            .then(function (response) { console.log(response)
                $('#makmal_vr_user').dataTable().fnDestroy();
                loadDatatableMakmlVr(response.data);

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                const table = document.getElementById('makmal_vr_user');
                    if (table) {
                        table.scrollIntoView({
                        behavior: 'smooth', // Use 'auto' for immediate scrolling
                        block: 'start',     // Scroll to the top of the table
                        inline: 'nearest'   // Scroll horizontally to the nearest edge of the table
                        });
                    }
            })
        }
        if(makmal_mini_va_hasActive){
            data_url = api_url+"api/project/filter-projects-mini_va?user=" + {{ Auth::user()->id}};
            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'post',
                url: data_url,
                data: formData
            })
            .then(function (response) { console.log(response)
                $('#makmal_mini_user').dataTable().fnDestroy();
                loadDatatableMakmlMiniVA(response.data);

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                const table = document.getElementById('makmal_mini_user');
                    if (table) {
                        table.scrollIntoView({
                        behavior: 'smooth', // Use 'auto' for immediate scrolling
                        block: 'start',     // Scroll to the top of the table
                        inline: 'nearest'   // Scroll horizontally to the nearest edge of the table
                        });
                    }
            })
        }
        
    }

    function loadMiniView(id,status,penjilidan_status_ve)
    { 

        if(penjilidan_status_ve==null || penjilidan_status_ve==3)
        {
            var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
            url = url.replace(':type', "VE");
            url = url.replace(':kod', id);
            window.location.href = url;
            localStorage.setItem("isVEclicked", "");

        }
        else if(penjilidan_status_ve==1)
        {
            localStorage.setItem('isVEclicked', 'clicked');
            var url = '{{ route("vm.maklumatPelakasanaanMakmalVR", [":kod" , ":type"])}}'
                url = url.replace(':type', "VR");
                url = url.replace(':kod', id);
                window.location.href = url;
        }
        else
        {
            var url = '{{ route("vm.penjilidan", [":kod" , ":type"])}}'
                url = url.replace(':type', "VE");
                url = url.replace(':kod', id);
                window.location.href = url;

        }
    

    }

    function SetData(id,status)
    {
        var formData = new FormData();
            formData.append('user_id', {{ Auth::user()->id}});
            formData.append('kod', id);
            formData.append('update_status_perlaksanaan',status);


        const api_url = "{{ env('API_URL') }}";
        const api_token = "Bearer "+ window.localStorage.getItem('token');

        $("#add_role_sucess_modal").modal('show');

        if(status=='31')
        {
            $('#sub_VR').addClass("d-none");
            $('#sub_VE').removeClass("d-none");
        }
        else
        {
            $('#sub_VE').addClass("d-none");
            $('#sub_VR').removeClass("d-none");
        }

        $('#tutup').click(function()
        {


                data_url = api_url+"api/project/update_status_perlaksanaan";

                axios.defaults.headers.common["Authorization"] = api_token
                axios({
                    method: 'post',
                    url: data_url,
                    data: formData
                })
                .then(function (response) { console.log(response)

                    location.reload();

                });
        });

        $('#close_image').click(function(){
            location.reload();
        });   
    }

    
    
</script>