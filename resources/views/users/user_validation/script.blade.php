<script>
             $('#new_jps_label').hide();
            function new_agensi_user(){
                $('#new_jps_label').hide();
                $('#new_nonjps_label').show();
                $("#excelBtn2").show()
                $("#excelBtn3").hide()
                $("#excelBtn").hide()
            }
            function new_jps_user(){
                $('#new_jps_label').show();
                $('#new_nonjps_label').hide();
                $("#excelBtn").show()
                $("#excelBtn3").hide()
                $("#excelBtn2").hide()
            }
            function rejected_user(){
                $("#excelBtn3").show()
                $("#excelBtn").hide()
                $("#excelBtn2").hide()
            }
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
              const api_url = "{{env('API_URL')}}";  console.log(api_url);
              const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);              
          
              $.ajaxSetup({
                   headers: {
                          "Content-Type": "application/json",
                          "Authorization": api_token,
                          }
              });
              var data_update = {'isJps':1};
          
          
                $.ajax({
                type: "GET",
                url: api_url+"api/user/temp/list",
                contentType: "application/json",
                data: data_update, 
                success: function(response) {  
                    console.log(response.data)      
                    var jps_table =$('#new_jps_user').DataTable({  
                        data: response.data,
                        dom: "Blfrtip",
                        buttons: [

                            {
                                text: 'excel',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            },
                            
                        ],   
                        data: response.data,
                        pagingType: 'full_numbers',
                        "aaSorting": [],
                        "language": {
                            "lengthMenu": "Papar _MENU_ Entri",
                            "zeroRecords": "Tiada rekod dijumpai",

                            "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                            "infoEmpty": "Tiada rekod tersedia",
                            "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                            "search": "_INPUT_",
                            "searchPlaceholder": "   Carian",
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
                                render: function ( data, type, row, meta ) { console.log(data);
                                    if(type === 'display'){
                                        //data = '<a class="text-dark" onClick="loadView('+row.id+')">'+row.name+'</a>';
                                        data = '<a class="text-dark" style="cursor:pointer" href="user-profile/temp/' +row.id+ '">'+row.name+'</a>';
                                    }
                                    return data;
                                }
                            },
                            {
                                
                                targets:3, // Start with the last
                                render: function ( data, type, row, meta ) {
                                      // console.log(row.jawatan.nama_jawatan);
                                    if(type === 'display'){
                                        if(row.jabatan.nama_jabatan!=''){
                                            data=row.jabatan.nama_jabatan
                                        }else{
                                            data="";
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:4, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            
                                            if(row.jawatan.nama_jawatan!=''){
                                                data=row.jawatan.nama_jawatan
                                            }else{
                                                data="";
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:6, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    console.log(data);
                                    if(type === 'display'){
                                        data='<div class="d-flex datatable_button">'+
                                            '<button class="btn btn-danger m-1" onClick="rejectTempUser('+row.id+','+row.count+')" style="background-color:FA5C7C; color:#ffffff; font-size:0.7rem; border:none; width:90px;" >Tidak Lulus</button>'+
                                            '<button class="btn  m-1" onClick="approveTempUser('+row.id+')" style="background-color:5B63C3; color:#ffffff; font-size:0.7rem; border:none; width:90px;">Lulus</button>'+
                                        '</div>'
                                    }
                                    return data;
                                }
                            },
          
                        ] , 
                        columns: [
                            { data: 'name'},
                            { data: 'no_ic'  },
                            { data: 'email'  },          
                            {
                                    targets:3,
                                    render: function ( data, type, row, meta ) {
                                        // console.log(row.jabatan.length)
                                        if(row.jabatan.length==0){
                                            data="";
                                        }else{
                                            data=row.jabatan.nama_jabatan;
                                        }
                                        return data;
                                    }
                                    
                                },
                            {
                                    targets:4,
                                    render: function ( data, type, row, meta ) {
                                        // console.log(row.jawatan.length)
                                        if(row.jawatan.length==0){
                                            data="";
                                        }else{
                                            data=row.jawatan.nama_jawatan;
                                        }
                                        return data;
                                    }
                                    
                            },
                            { data: 'no_telefon'  },
                            { data: 'jawatan_id'  },
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
                    $("#excelBtn").click(function(){
                    jps_table.button('.buttons-excel').trigger();
                    })
                },
                error: function(response) {
                    console.log(response);
                }
                }); 
                
                var data_update = {'isJps':0};
              $('#new_agensi_user').DataTable().destroy();
              $('#new_jps_user').DataTable().destroy();
          
              $.ajaxSetup({
                   headers: {
                          "Content-Type": "application/json",
                          "Authorization": api_token,
                          }
              });
                $.ajax({
                type: "GET",
                url: api_url+"api/user/temp/list",
                contentType: "application/json",
                // dataType: "json",
                data: data_update, 
                success: function(response) {   
                    console.log(response.data);         
                    var new_agensi_table=$('#new_agensi_user').DataTable({
                        dom: "Blfrtip",
                        buttons: [

                            {
                                text: 'excel',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            },
                            
                        ], 
                    data: response.data,
                    pagingType: 'full_numbers',
                    "aaSorting": [],
                    "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada rekod dijumpai",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "search": "_INPUT_",
                    "searchPlaceholder": "   Carian",
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
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                        data = '<a class="text-dark" style="cursor:pointer" href="user-profile/temp/' +row.id+ '">'+row.name+'</a>';
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:3, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                        if(row.jabatan.nama_jabatan!=''){
                                            data=row.jabatan.nama_jabatan
                                        }else{
                                            data="";
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:4, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                        if(row.jawatan.nama_jawatan!=''){
                                            data=row.jawatan.nama_jawatan
                                        }else{
                                            data="";
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:6, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    //   console.log(data);
                                    if(type === 'display'){
                                        if(row.jenis_pengguna_id==2 && row.row_status==1){
                                            data ='<img class="float-left" height="30" style="width:25px" src="images/pdf.png" alt="" onClick="downloadDoc('+row.id+')">'
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:7, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    // console.log(data);
                                    if(type === 'display'){
                                        data='<div class="d-flex datatable_button">'+
                                            '<button class="btn btn-danger m-1 text-nowrap" onClick="rejectTempUser('+row.id+','+row.count+')" style="background-color:FA5C7C; color:#ffffff; font-size:0.7rem; border:none; width:90px;">Tidak Lulus</button>'+
                                            '<button class="btn btn-primary m-1" onClick="approveTempUser('+row.id+')" style="background-color:5B63C3; color:#ffffff; font-size:0.7rem; border:none; width:90px;">Lulus</button>'+                                  
                                        '</div>'
                                    }
                                    return data;
                                }
                            },
          
                        ] , 
                        columns: [
                            { data: 'name'},
                            { data: 'no_ic'  },
                            { data: 'email'  },          
                            {
                                    targets:3,
                                    render: function ( data, type, row, meta ) {
                                        // console.log(row.jabatan.length)
                                        if(row.jabatan.length==0){
                                            data="";
                                        }else{
                                            data=row.jabatan.nama_jabatan;
                                        }
                                        return data;
                                    }
                                    
                                },
                            {
                                    targets:4,
                                    render: function ( data, type, row, meta ) {
                                        // console.log(row.jawatan.length)
                                        if(row.jawatan.length==0){
                                            data="";
                                        }else{
                                            data=row.jawatan.nama_jawatan;
                                        }
                                        return data;
                                    }
                                    
                            },
                            { data: 'no_telefon'  },
                            { data: 'jawatan_id'  },
                            { data: 'jawatan_id'  },

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
                    $("#excelBtn2").click(function(){
                        new_agensi_table.button('.buttons-excel').trigger();
                    })
                },
                error: function(response) {
                    console.log(response);
                }
                });

                var data_update = {'isJps':3};
              $('#new_agensi_user').DataTable().destroy();
              $('#new_jps_user').DataTable().destroy();
          
              $.ajaxSetup({
                   headers: {
                          "Content-Type": "application/json",
                          "Authorization": api_token,
                          }
              });
                $.ajax({
                type: "GET",
                url: api_url+"api/user/temp/list",
                contentType: "application/json",
                // dataType: "json",
                data: data_update, 
                success: function(response) {            
                    var rejected_user_table=$('#rejected_user_table').DataTable({
                        dom: "Blfrtip",
                        buttons: [

                            {
                                text: 'excel',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            },
                            
                        ], 
                    data: response.data,
                    pagingType: 'full_numbers',
                    "aaSorting": [],
                    "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada rekod dijumpai",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "search": "_INPUT_",
                    "searchPlaceholder": "   Carian",
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
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                        data = '<a class="text-dark" style="cursor:pointer" href="user-profile/temp/' +row.id+ '">'+row.name+'</a>';
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:3, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                        if(row.jabatan.nama_jabatan!=''){
                                            data=row.jabatan.nama_jabatan
                                        }else{
                                            data="";
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:4, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                        if(row.jawatan.nama_jawatan!=''){
                                            data=row.jawatan.nama_jawatan
                                        }else{
                                            data="";
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:6, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    //   console.log(row);

                                    if(type === 'display'){
                                        if(row.jenis_pengguna_id==2 && row.row_status==1){
                                            data ='<img class="float-left" height="30" style="width:25px" src="images/pdf.png" alt="" onClick="downloadDoc('+row.id+')">'
                                        }
                                        else{
                                            data ='' 
                                        }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:7, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    console.log(data);
                                    if(type === 'display'){
                                        data='<div class="d-flex datatable_button">'+
                                            '<label for="" class="text-danger m-2 h6">Tidak Lulus</label>'+                                
                                        '</div>'
                                    }
                                    return data;
                                }
                            },
          
                        ] , 
                        columns: [
                            { data: 'name'},
                            { data: 'no_ic'  },
                            { data: 'email'  },          
                            {
                                    targets:3,
                                    render: function ( data, type, row, meta ) {
                                        // console.log(row.jabatan.length)
                                        if(row.jabatan.length==0){
                                            data="";
                                        }else{
                                            data=row.jabatan.nama_jabatan;
                                        }
                                        return data;
                                    }
                                    
                                },
                            {
                                    targets:4,
                                    render: function ( data, type, row, meta ) {
                                        // console.log(row.jawatan.length)
                                        if(row.jawatan.length==0){
                                            data="";
                                        }else{
                                            data=row.jawatan.nama_jawatan;
                                        }
                                        return data;
                                    }
                                    
                            },
                            { data: 'no_telefon'  },
                            { data: 'jawatan_id'  },
                            { data: 'jawatan_id'  },
                            {
                                    targets:8,
                                    render: function ( data, type, row, meta ) {
                                        console.log(row.updated_by.name)
                                        if(row.updated_by.length==0){
                                            data="";
                                        }else{
                                            data=row.updated_by.name;
                                        }
                                        return data;
                                    }
                                    
                                },

                        ],
                    });
                    $("#excelBtn3").click(function(){
                        rejected_user_table.button('.buttons-excel').trigger();
                    })
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
                    loadcompleted()
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                },
                error: function(response) {
                    console.log(response);
                }
                });
          
            })

    function downloadDoc(id) {
       const api_url = "{{env('API_URL')}}";  console.log(api_url);
       const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
       update_user_api = api_url+"api/user/user/download";
       data_update = {'user_id':id, 'type':'temp'};
       var jsonString = JSON.stringify(data_update);
       $.ajaxSetup({
         headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
       $.ajax({
            type: 'GET',
            url: update_user_api,
            data: {'user_id':id, 'type': 'temp'} , 
            //dataType:"json",
            xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 2) {
                            if (xhr.status == 200) {
                                xhr.responseType = "blob";
                            } else {
                                xhr.responseType = "text";
                            }
                        }
                    };
                    return xhr;
                },
            //contentType: "application/pdf",
            success: async function(data) { 
               console.log('downlaoded')
               console.log(data)

               const str = data.type; console.log(str)
                if(str)
                {
                        const parts = str.split('/');
                        const doc_type = parts[1];  console.log(doc_type)   
                        var doc_name = 'document.'+doc_type;  console.log(doc_name)    
                }
                else
                {
                        var doc_name = "document.pdf";    
                }

               //Convert the Byte Data to BLOB object.
               var blob = new Blob([data], { type: "application/octetstream" });
 
               //Check the Browser type and download the File.
               // var isIE = false || !!document.documentMode;
               // if (isIE) {
               //    window.navigator.msSaveBlob(blob, fileName);
               // } else {
                  var url = window.URL || window.webkitURL;
                  link = url.createObjectURL(blob);
                  var a = $("<a />");
                  a.attr("download", doc_name);
                  a.attr("href", link);
                  $("body").append(a);
                  a[0].click();
                  $("body").remove(a);
               //}
                //window.location.href = "{{ url('/home')}}";
            }
        });
    }

                
          
              function loadView(id)
              {
                  localStorage.setItem("user_id", id);
                  localStorage.setItem("user_type", "temp_user");
                  window.location.href = "{{ url('/user-profile')}}";
              }

              function rejectTempUser(id,count)
              { console.log(count)
                const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
                $("#reject_mode_sucess_modal").modal('show');
                if(count>=3)
                {   
                    document.getElementById('Update').style.visibility= 'hidden';
                }
                else
                { console.log('khbkj')
                    document.getElementById('Update').style.visibility= 'visible';
                }

                $('#Update').click( function () { //updation
                    var comment = $('#komen').val(); console.log(comment)
                    if(comment=='')
                    {
                        document.getElementById("error_komen").innerHTML="Medan komen diperlukan"; 
                        return false;
                    }
                    else
                    {
                        document.getElementById("error_komen").innerHTML="";
                        var formData = new FormData();
                            formData.append('id', id);
		                    formData.append('comment', comment);
                            formData.append('count', count);
                            formData.append('type', "update");
                            formData.append('loged_user_id', {{Auth::user()->id}})
                            formData.append('action', "PENGESAHAN PENGGUNA BAHARU - Pengguna sementara yang ditolak")

                            console.log(formData);
                            update_user_api = api_url+"api/temp/user/temp/updateRejection";

                        axios({
                                method: "post",
                                url: update_user_api,
                                data: formData,
                                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                            })
                                .then(function (response) {
                                //handle success
                                console.log(response.data.code);
                                    if(response.data.code === '200') {	
                                        window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
                                    }		
                                })
                                .catch(function (response) {
                                    //handle error
                                    console.log(response);
                                });
                    }
                });

                $('#Reject').click( function () { //rejection
                    var comment = $('#komen').val(); console.log(comment)
                    if(comment=='')
                    {
                        document.getElementById("error_komen").innerHTML="medan Komen diperlukan"; 
                        return false;
                    }
                    else
                    {
                        document.getElementById("error_komen").innerHTML="";
                        var formData = new FormData();
                            formData.append('id', id);
		                    formData.append('comment', comment);
                            formData.append('count', count);
                            formData.append('type', "reject");
                            formData.append('loged_user_id', {{Auth::user()->id}})
                            formData.append('action', "PENGESAHAN PENGGUNA BAHARU - Pengguna sementara yang ditolak secara kekal")

                            console.log(formData);
                            update_user_api = api_url+"api/temp/user/temp/updateRejection";

                        axios({
                                method: "post",
                                url: update_user_api,
                                data: formData,
                                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                            })
                                .then(function (response) {
                                //handle success
                                console.log(response.data.code);
                                    if(response.data.code === '200') {	
                                         //$("#add_role_sucess_modal").modal('show');
                                         window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
                                    }		
                                })
                                .catch(function (response) {
                                    //handle error
                                    console.log(response);
                                });
                    }
                });
              }

              function approveTempUser(id)
              {
                document.getElementById("tutup").setAttribute("user_id",id);
                $("#add_role_sucess_modal").modal('show');
              }

              $('#close').click(function(){ console.log(document.getElementById("tutup"));
                    document.getElementById("tutup").removeAttribute("user_id");
                    $("#add_role_sucess_modal").modal('hide');
                });           

                $('#close_image').click(function(){ console.log(document.getElementById("tutup"));
                    document.getElementById("tutup").removeAttribute("user_id");
                    $("#add_role_sucess_modal").modal('hide');
                    window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
                }); 

                $('#close_image_new').click(function(){ 
                    $("#reject_mode_sucess_modal").modal('hide');
                    window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
                }); 
          
          
              $('#tutup').click(function()
              {
                //document.getElementById("loading-bar-spinner").style.display = 'block';

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");

                 var id=document.getElementById("tutup").getAttribute("user_id"); console.log(id);

                 //alert("approve");
                 const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);

                 update_user_api = api_url+"api/user/approval";
                 data_update = {'id':id, 'loged_user_id': {{Auth::user()->id}}, 'action': "pengesahan PENGGUNA BAHARU - Temp user approval"};
                 var jsonString = JSON.stringify(data_update);
                 $.ajaxSetup({
                   headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
                 $.ajax({
                      type: 'POST',
                      url: update_user_api,
                      data: jsonString, 
                      success: function(response) { console.log(response.code)
                        //document.getElementById("loading-bar-spinner").style.display = 'none';
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        
                         $("#sucess_modal").modal('show');
                          //window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
                      }
                  });
          
              });
              
              $('#confirm_close').click(function(){ 
                    $("#sucess_modal").modal('hide');
                    window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
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