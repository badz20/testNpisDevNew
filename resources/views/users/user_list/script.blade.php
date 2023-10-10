<script>

        $('#jps_label').hide();
      function agensi_user(){
          $('#jps_label').hide();
          $('#nonjps_label').show();
          $("#excelBtn2").removeClass("d-none");
          $("#excelBtn").addClass("d-none");
      }
      function jps_user(){
          $('#jps_label').show();
          $('#nonjps_label').hide();
          $("#excelBtn2").addClass("d-none");
          $("#excelBtn").removeClass("d-none");
          
      }

        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        function loadView(id,status,type)
        { console.log(id)

            localStorage.setItem("user_data_type", type);
            localStorage.setItem("is_superadmin", status);

            //var url = '{{ url("/user-profile", ":id")}}'
            var url = '{{ route("user.profile", ["appuser",":id"])}}'
            url = url.replace(':id', id);
            //url = url.replace(':temp', id);
            
            localStorage.setItem("user_id", id);
            localStorage.setItem("user_type", "temp_user");
            window.location.href = url;
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
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        var jps = {'isJps':1}; 
        var non_jps = {'isJps':0}; 

        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        

          $.ajax({
          type: "GET",
          url: api_url+"api/user/list",
        //   url: "http://localhost:8080/api/temp/user/list",
            dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          data:jps,
          success: function(response) {  
              console.log(response)      
              
              var jps_table =$('#jps_user').DataTable({     
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
                pagingType: 'full_numbers',
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] ,
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
                                  data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + row.name + '</a>' +
                                          '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                        '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + row.no_ic + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + row.email + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                              if(type === 'display'){
                                        if(row.bahagian.nama_bahagian!=null){
                                            datas=row.bahagian.nama_bahagian;
                                        }
                                        else{
                                            datas="-";
                                        }

                                        data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';

                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    if(row.jawatan.nama_jawatan!=null){
                                        datas=row.jawatan.nama_jawatan;
                                    }
                                    else{
                                        datas="";
                                    }
                                    data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    //   data='<a value="'+row.id+'" style="cursor:pointer" onClick="loadView('+row.id+')" class="text-secondary user_name">'+"PENGGUNA BKOR"+'</a>';
                                    data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + 'PENGGUNA BKOR' + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                              if(type === 'display'){
                                  if(row.jenis_pengguna_id==1 && row.row_status==1 && row.status_pengguna_id==1){
                                    $("#customSwitch"+row.id).val(1);
                                      data ='<label class="d-none">Aktif</label>'+'<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" checked  class="custom-control-input" name="agensiBtn" onClick="deactivateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                    $("#customSwitch"+row.id).val(0);
                                      data ='<label class="d-none">Tidak Aktif</label>'+'<div class="custom-control custom-switch">'+
                                      '<input type="checkbox" class="custom-control-input" name="agensiBtn" onClick="activateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                      '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                      '</div>'
                                  };
                              }
                              return data;
                          }
                      },
                      {
                          targets:7, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=""
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
                            // console.log(row.bahagian.length)
                            if(row.bahagian.length==0){
                                datas="-";
                            }else{
                                datas=row.bahagian.nama_bahagian;
                            }
                            data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                            return data;
                        }
                        
                      },
                      {
                        targets:4,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.jawatan.length==0){
                                datas="";
                            }else{
                                datas=row.jawatan.nama_jawatan;
                            }
                            data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                            return data;
                        }
                        
                      },
                      { data: 'row_status'  },
                      { data: 'jawatan_id'  },
                      {
                                    targets:7,
                                    render: function ( data, type, row, meta ) {
                                        console.log(row.updated_by.name)
                                        if(row.updated_by.length==0){
                                            datas="-";
                                        }else{
                                            datas=row.updated_by.name;
                                        }
                                        data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                                        return data;
                                    }
                                    
                        },
                  ],
                  
                     
              });
              $("#excelBtn").click(function(){
                jps_table.button('.buttons-excel').trigger();
                })
                // $('#jps_user tbody').on('click', 'tr', function () {
                //     var data = jps_table.row(this).data();
                //     console.log(data.id)
                //     loadView(data.id);
                // });

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
    
          },
          error: function(response) {
              console.log(response);
          }
          }); 
          
          
          
          
          


          $.ajax({
            type: "GET",
            url: api_url+"api/user/list",
            //   url: "http://localhost:8080/api/temp/user/list",
                dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
          data:non_jps,
          success: function(response) { 
            console.log(response.data)
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            var table =$('#agensi_user').DataTable({
                processing: true,
              data: response.data,
              pagingType: 'full_numbers',
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
              "aaSorting": [],
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada rekod dijumpai",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "searchPlaceholder": "   Carian",
                    "search":"_INPUT_",
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
                                data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + row.name + '</a>' +
                                          '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                        '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + row.no_ic + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + row.email + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                if(row.jabatan.nama_jabatan!=null){
                                    datas=row.jabatan.nama_jabatan;
                                }else{
                                    datas="-";
                                }

                                data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                                
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      if(row.jawatan.nama_jawatan!=null){
                                        datas=row.jawatan.nama_jawatan;
                                      }
                                      else{
                                        datas="-";
                                      }

                                      data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:7, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      datas="PENGGUNA BKOR";
                              }
                              data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';

                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(data);
                              if(type === 'display'){

                                  if(row.jenis_pengguna_id==2 && row.row_status==1 && row.status_pengguna_id==1){
                                    $("#customSwitch"+row.id).val(1);
                                    data ='<label class="d-none">Aktif</label>'+'<div class="custom-control custom-switch text-center">'+
                                    '<input type="checkbox" checked  class="custom-control-input float-end"  onClick="deactivateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                    $("#customSwitch"+row.id).val(0);
                                      data ='<label class="d-none">Tidak Aktif</label>'+'<div class="custom-control custom-switch text-center">'+
                                    '<input type="checkbox"  class="custom-control-input" onClick="activateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  };
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
                          targets:8, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      datas="-";
                              }
                              data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                              return data;
                          }
                      },                      
                  ] ,
                  
              columns: [
                  { data: 'name' },
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
                  { data: 'jawatan_id'  },
                  { data: 'row_status'  },
                  { data: 'jawatan_id'  },
                  {
                                    targets:8,
                                    render: function ( data, type, row, meta ) {
                                        console.log(row.updated_by.name)
                                        if(row.updated_by.length==0){
                                            datas="-";
                                        }else{
                                            datas=row.updated_by.name;
                                        }
                                        data = '<div class="d-flex" onClick="loadView('+row.id+','+row.is_superadmin+','+row.user_type_id+')">'+                                
                                                    '<a value="'+row.id+'" style="cursor:pointer" class="text-secondary user_name">' + datas + '</a>' +
                                            '</div>';
                                        return data;
                                    }
                                    
                                },
              ],
              });
              $("#excelBtn2").click(function(){
                    table.button('.buttons-excel').trigger();
                })
                // $('#agensi_user tbody').on('click', 'tr', function () {
                //     var data = table.row(this).data();
                //     console.log(data.id)
                //     loadView(data.id);
                // });
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
              
          },
          error: function(response) {
              console.log(response);
          }
          }); 
          
          
      });

    //   let userlist_tab_btn = document.querySelectorAll(
    //   ".userlist_tab_btn_container button"
    // );
    // let userlist_tab_content = document.querySelectorAll(".userlist_tab_content ");
    </script>
    <script>
      function downloadDoc(id) {
       const api_url = "{{env('API_URL')}}";  console.log(api_url);
       const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
       update_user_api = api_url+"api/user/user/download";
       data_update = {'user_id':id, 'type':'appuser'};
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
            data: {'user_id':id, 'type': 'appuser'} , 
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

    function activateModul(id){
            Swal.fire({
            text: 'Adakah anda pasti mahu mengaktifkan akaun ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ACF97',
            cancelButtonColor: '#FA5C7C',
            confirmButtonText: 'ya!',
            cancelButtonText: 'tidak'
            }).then((result) => {
            if (result.isConfirmed) {
            var activate=1
            var formData = new FormData();
            formData.append('id', id);
            formData.append('value', activate);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna diaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/user/ActivateUser",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
                // console.log(result)
                Swal.fire({
                    icon: 'success',
                    text: "Diaktifkan",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                            })
            })
            }else{
                location.reload();
            }
            })
          }
          function deactivateModul(id){
            Swal.fire({
            text: 'Adakah anda pasti mahu menyahaktifkan akaun ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ACF97',
            cancelButtonColor: '#FA5C7C',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
            var deactivate=0
            var formData = new FormData();
            formData.append('id', id);
            formData.append('value', deactivate);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna dinyahaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/user/deActivateUser",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
                console.log(result)
                Swal.fire({
                    icon: 'success',
                    text: "Dinyahaktifkan",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    location.reload();
                }
                })
            })
            }else{
                location.reload();
            }
            })
        } 

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