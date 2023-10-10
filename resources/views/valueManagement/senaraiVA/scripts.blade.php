<script src="assets/js/jquery.min.js"></script>
<script>
     $('#agensi_card').hide();
      function agensi_user(){
          $('#jps_card').hide();
          $('#agensi_card').show();
          document.getElementById("agency_btn").classList.add("active");
          document.getElementById("jps_btn").classList.remove("active");  
      }
      function jps_user(){
          $('#jps_card').show();
          $('#agensi_card').hide(); 
          document.getElementById("jps_btn").classList.add("active");  
          document.getElementById("agency_btn").classList.remove("active");    
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

      document.getElementById("jps_btn").disabled = false;    
      document.getElementById("agency_btn").disabled = false;    

    }

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
                //console.log(response.data)
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
                    var year = today.getFullYear()+1; //console.log(year)
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
          url: api_url+"api/project/makmal_list?user=" + {{ Auth::user()->id}},
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          data:va,
          success: function(response) {  
             // console.log(response.data)  
              
              var data = removeMiniData(response.data,'va'); //console.log(data)
              
              loadDatatableJps(data);
          },
          error: function(response) {
              //console.log(response);
          }
          }); 

          $.ajax({
            type: "GET",
            url: api_url+"api/project/makmal_list?user=" + {{ Auth::user()->id}},
            dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
          data:mini_va,
          success: function(response) { 
            //console.log(response.data)
            var data = removeMiniData(response.data,'mini_va'); //console.log(data)

            loadDatatableAgensi_user(data);

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          },
          error: function(response) {
              //console.log(response);
          }
          }); 
    });

    function number_format($num)
    { ////console.log($num)
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

    function removeMiniData(data,type)
    {
        let data_array =[];
        if(type=='mini_va')
        {
            $.each(data, function (key, item) { 
                console.log(item);
                if(item['kos_projeck']<=50000000 && item['Is_changed_to_va']==0)
                {
                    data_array.push(item);
                } 
            });
        }
        else
        {
            $.each(data, function (key, item) { 
                console.log(item);
                if(item['kos_projeck']>50000000 || item['Is_changed_to_va']==1)
                {
                    data_array.push(item);
                } 
            });

        }
        
        return data_array;
    }

    function loadDatatableJps(response)
    { 
        var jps_table =$('#jps_user').DataTable({     
                  data: response,
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
                          render: function ( data, type, row, meta ) { //console.log(row)
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
                                // //console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data='<div class="d-flex" onClick="loadView('+row.id+')">'+                                 
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
                                data='<div class="d-flex" onClick="loadView('+row.id+')">'+                                 
                                                '<a style="color:black !important;">' + row.kod_projeck + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   //console.log(row.id);
                            if(type === 'display'){
                                data=
                                '<div class="d-flex" onClick="loadView('+row.id+')">'+                               
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
                        "targets": 7,
                        "createdCell": function (td, cellData, rowData, row, col) { //console.log(rowData['current_status']); //console.log("abbbb")
                            if(rowData['current_status']!='')
                            {
                                if(rowData['current_status'] == rowData['va_status'])
                                {
                                    $(td).css('background-color', '#FFC35A');
                                }
                                else
                                {
                                    $(td).css('background-color', '');
                                }
                            }
                        }
                      },
                      {
                        "targets": 8,
                        "createdCell": function (td, cellData, rowData, row, col) { //console.log(rowData['current_status']); //console.log("abbbb")
                            if(rowData['current_status']!='')
                            {
                                if(rowData['current_status'] == rowData['ve_status'])
                                {
                                    $(td).css('background-color', '#FFC35A');
                                }
                                else
                                {
                                    $(td).css('background-color', '');
                                }
                            }
                        }
                      },
                      {
                        "targets": 9,
                        "createdCell": function (td, cellData, rowData, row, col) { //console.log(rowData['current_status']); //console.log("abbbb")
                            if(rowData['current_status']!='')
                            {
                                if(rowData['current_status'] == rowData['vr_status'])
                                {
                                    $(td).css('background-color', '#FFC35A');
                                }
                                else
                                {
                                    $(td).css('background-color', '');
                                }
                            }
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
                      { data: 'va_status_name', "sortable": true },
                      { data: 've_status_name', "sortable": true },
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
              $('#jps_user tbody').on('click', 'tr', function () {
                    var data = jps_table.row(this).data(); //console.log(data);
                    var user_type = {{$user}};
                    localStorage.setItem('vm_status', data.status_perlaksanaan);

                    // //console.log(data.id)
                    if(user_type == 4 )
                    {
                        if(data.status_perlaksanaan==30 && data.penjilidan_status_va==null)
                        {
                            localStorage.setItem('isVEclicked', 'clicked');
                            var url = '{{ route("vm.maklumatPelakasanaanMakmal", [":kod" , ":type"])}}'
                            url = url.replace(':type', "VA");
                            url = url.replace(':kod', data.id);
                            window.location.href = url;

                        }
                        else if(data.status_perlaksanaan==32 || data.status_perlaksanaan==34 || data.status_perlaksanaan==31)
                        {
                            localStorage.setItem('isVEclicked', '');
                            var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
                            url = url.replace(':type', "VE");
                            url = url.replace(':kod', data.id);
                            window.location.href = url;

                        }
                        else if(data.status_perlaksanaan==35)
                        {
                            localStorage.setItem('isVEclicked', 'clicked');
                            var url = '{{ route("vm.maklumatPelakasanaanMakmalVR", [":kod" , ":type"])}}'
                                url = url.replace(':type', "VR");
                                url = url.replace(':kod', data.id);
                                window.location.href = url;

                        }
                        else if(data.status_perlaksanaan==36)
                        {
                            var url = '{{ route("projek.KalendarVM", [":kod" , ":type"])}}'
                            // maklumatPelakasanaanMakmal_VR
                            url = url.replace(':type', "VR");
                            url = url.replace(':kod', data.id);
                            window.location.href = url;
                            localStorage.setItem("isVEclicked", "");

                        }
                        else
                        {
                            localStorage.setItem("isVEclicked", "");
                            loadView(data.id);
                        }
                    }
                    // else if(data.status_perlaksanaan>=30 && (data.penjilidan_status_ve==null || data.penjilidan_status_ve==3))
                    // { alert("b");
                    //     if(user_type!=3)
                    //     {
                    //         var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
                    //         url = url.replace(':type', "VE");
                    //         url = url.replace(':kod', data.id);
                    //         window.location.href = url;
                    //         localStorage.setItem("isVEclicked", "");
                    //     }
                    //     else
                    //     {
                    //         localStorage.setItem("isVEclicked", "");
                    //         loadView(data.id);
                    //     }
                    // }
                    else if(data.penjilidan_status_ve==1)
                    { 
                            localStorage.setItem("isVEclicked", "");
                            var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
                            url = url.replace(':type', "VE");
                            url = url.replace(':kod', data.id);
                            window.location.href = url;
                    }
                    else if(data.status_perlaksanaan ==31 || data.status_perlaksanaan ==33)
                    { 
                            localStorage.setItem("isVEclicked", "");
                            var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
                            url = url.replace(':type', "VE");
                            url = url.replace(':kod', data.id);
                            window.location.href = url;
                    }
                    else if(data.status_perlaksanaan ==35)
                    { 
                        var url = '{{ route("projek.KalendarVM", [":kod" , ":type"])}}'
                        url = url.replace(':type', "VR");
                        url = url.replace(':kod', data.id);
                        window.location.href = url;
                        localStorage.setItem("isVEclicked", "");
                    }
                    else
                    { 
                        loadView(data.id);
                        
                    }
                });

    }

    function loadView(id)
    { //console.log(id)

        var vm_status = localStorage.getItem("vm_status");

        if(vm_status==36)
        {
            var url = '{{ route("projek.KalendarVM", [":kod" , ":type"])}}'
                url = url.replace(':type', "VR");
                url = url.replace(':kod', id);
                window.location.href = url;
                localStorage.setItem("isVEclicked", "");

        }
        else
        {
            localStorage.setItem("isVEclicked", "");
            var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
            url = url.replace(':type', "VA");
            url = url.replace(':kod', id);
            window.location.href = url;
        }
    }

    function loadDatatableAgensi_user(response)
    {
        var agency_table =$('#agensi_user').DataTable({
                  data: response,
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
                          render: function ( data, type, row, meta ) { //console.log(row)
                              if(type === 'display'){
                                data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+')">'+                                
                                                '<a style="color:black !important;">' + row.rmk + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // //console.log(row.bahagian.nama_bahagian==null)
                             if(type === 'display'){
                                data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+')">'+                                
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
                                data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+')">'+                                
                                                '<a style="color:black !important;" >' + row.kod_projeck + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   //console.log(row.id);
                              if(type === 'display'){
                                data=   '<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+')">'+                                
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
                                      data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+')">'+                                
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
                                      data='<div class="d-flex" onClick="loadMiniView('+row.id+','+row.status_perlaksanaan+')">'+                                
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
                                    if(row.va_status==21)
                                    {
                                        $btn='<button type="button" class="VM_senaraiprojekbtn" onClick="SetVa('+row.id+')">Hantar ke Makmal VA</button>';
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
                      { data: 'va_status_name', "sortable": true },
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

            //   $('#agensi_user tbody').on('click', 'tr', function () {
            //         var data = agency_table.row(this).data();
            //         //console.log(data.id)
            //         loadView(data.id);
            //     });

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
        var jpsHasActive= $("#jps_btn").hasClass('active');
        var agencyHasActive=$("#agency_btn").hasClass('active'); 

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
        if(jpsHasActive){
            data_url = api_url+"api/project/filter-projects-of-brif-makmal?user=" + {{ Auth::user()->id}};

            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'post',
                url: data_url,
                data: formData
            })
            .then(function (response) { //console.log(response)
                $("#jps_user").dataTable().fnDestroy();
                var data = removeMiniData(response.data,'va'); //console.log(data)
                loadDatatableJps(data);

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
        else{
            data_url_agency = api_url+"api/project/filter-projects-of-brif-makmal_mini?user=" + {{ Auth::user()->id}};
            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'post',
                url: data_url_agency,
                data: formData
            })
            .then(function (response) { //console.log(response)
                $("#agensi_user").dataTable().fnDestroy();

                var data = removeMiniData(response.data,'mini_va'); //console.log(data)

                loadDatatableAgensi_user(data);

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
        
    }

    function loadMiniView(id,status)
    { 
        var user_type = {{$user}};
        if(status == 30 && (user_type!=4))
        {
                window.location.href = "/mini_va_tandatangan/"+id+"/VA"
        }
        else
        {

                var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'
                url = url.replace(':type', "Mini_VA");
                url = url.replace(':kod', id);
                window.location.href = url;
                localStorage.setItem("isVEclicked", "");

        }

    }

    function SetVa(id)
    {
        var formData = new FormData();
            formData.append('user_id', {{ Auth::user()->id}});
            formData.append('id', id);


        const api_url = "{{ env('API_URL') }}";
        const api_token = "Bearer "+ window.localStorage.getItem('token');

        $("#add_role_sucess_modal").modal('show');

        $('#tutup').click(function()
        {


                data_url = api_url+"api/project/set-as-makmal-va";

                axios.defaults.headers.common["Authorization"] = api_token
                axios({
                    method: 'post',
                    url: data_url,
                    data: formData
                })
                .then(function (response) { //console.log(response)

                    location.reload();

                });
        });

        $('#close').click(function(){
            location.reload();
        });   
    }
</script>