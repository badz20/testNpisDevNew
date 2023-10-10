<script>
    $('#jps_label').hide();
    function mpagedata(){
        $('#jps_label').hide();
        $('#nonjps_label').show();
    }
    function integrasi(){
        $('#jps_label').show();
        $('#nonjps_label').hide();
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
        
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });

      $.ajax({
      type: "post",
      url: api_url+"api/lookup/modulelist",
      dataType: 'json',
          success: function (result) { 
              console.log(result.data)
              for(var i=0;i<=result.data.length;i++){
                  $("#modul_name").append('<option class="selected_option" val="'+ result.data[i].id +'" id="'+ result.data[i].id +'">'+result.data[i].modul_name+'</option>')
                  // $("#edit_modul_name").append('<option class="selected_option" val="'+ result.data[i].id +'" id="'+ result.data[i].id +'">'+result.data[i].modul_name+'</option>')  
                  
              }
          },
          error: function(response) {
            console.log(response);
          }
      });
        $.ajax({
        type: "GET",
        url: api_url+"api/user/maps",
          dataType:"json",
        contentType: "application/json",
        header:{
          'contentType': "application/json",
          'Authorization':api_token
        },
        success: function(response) {  
            console.log(response)
            $("div.spanner").removeClass("show");
   $("div.overlay").removeClass("show");  
            // return;      
            var jps_table =$('#jps_user').DataTable({     
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
                        render: function ( data, type, row, meta ) {
                              // console.log(row.bahagian.nama_bahagian)
                            if(type === 'display'){
                              data='<label style="cursor:pointer;" val="'+row.id+'" onClick="editModal('+row.id+')" data-target="#edit_selenggara_data_modal" data-toggle="modal" style="cursor: pointer;" class="text-secondary user_name">'+row.nama_servis+'</label>';
                            }
                            return data;
                        }
                    },
                    {
                        targets:1, // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                    data=row.module.modul_name
                            }
                            return data;
                        }
                    },
                    {
                        targets:2, // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                    data='<labe>'+row.pautan_api+'</label>'
                            }
                            return data;
                        }
                    },
                    {
                        targets:3, // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                    data=row.server
                            }
                            return data;
                        }
                    },
                    // {
                    //     targets:4 , // Start with the last
                    //     render: function ( data, type, row, meta ) {
                    //         if(type === 'display'){
                    //                 if(row.status==1){
                    //                   data="<label class='text-success'>Aktif</label><badge style=cursor:pointer; onclick='checkStatus("+row.id+")' class='p-2 m-1 text-white translate-middle badge rounded-pill bg-info'>Check Status</badge>"
                    //                 }
                    //                 else{
                    //                   data="<label class='text-danger'>Tidak Aktif</label><badge style=cursor:pointer; onclick='checkStatus("+row.id+")' class='p-2 m-1 text-white translate-middle badge rounded-pill bg-info'>Check Status</badge> "
                    //                 }

                    //         }
                    //         return data;
                    //     }
                    // },

                    {
                        targets:4 , // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                    if(row.status==1){
                                      data="<label class='bi bi-globe h3 text-success'></label>"
                                    }
                                    else{
                                      data="<label class='bi bi-globe h3 text-danger'> </label> "
                                    }

                            }
                            return data;
                        }
                    },

                    {
                        targets:5 , // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                    if(row.status==1){
                                      data="<badge style=cursor:pointer; onclick='checkStatus("+row.id+")' class='p-2 m-1 text-white translate-middle badge rounded-pill bg-info'>Semak Status</badge>"
                                    }
                                    else{
                                      data="<badge style=cursor:pointer; onclick='checkStatus("+row.id+")' class='p-2 m-1 text-white translate-middle badge rounded-pill bg-info'>Semak Status</badge> "
                                    }

                            }
                            return data;
                        }
                    },

  
                ] , 
                columns: [
                    { data: 'nama_servis'},
                    { data: 'modul_id'  },
                    { data: 'pautan_api'  },          
                    { data: 'server'  },
                    { data: 'status'  },
                    { data: 'id'  },
                ],
                
                   
            });
            
  
        },
        error: function(response) {
            console.log(response);
        }
        });  
        

        // $.ajax({
        //   type: "GET",
        //   url: api_url+"api/user/list",
        //   //   url: "http://localhost:8080/api/temp/user/list",
        //       dataType:"json",
        //   contentType: "application/json",
        //   header:{
        //       'contentType': "application/json",
        //       'Authorization':api_token
        //   },
        // data:non_jps,
        // success: function(response) {            
        //     $('#agensi_user').DataTable({
        //     data: response.data,
        //     "aaSorting": [],
        //     "language": {
        //           "lengthMenu": "Papar _MENU_ Entri",
        //           "zeroRecords": "Tiada rekod dijumpai",

        //           "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
        //           "infoEmpty": "Tiada rekod tersedia",
        //           "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
        //           "search": "_INPUT_",
        //           "searchPlaceholder": " Carian",
        //           "paginate": {
        //           "first":      "Awal",
        //           "last":       "Akhir",
        //           "next":       "Seterusnya",
        //           "previous":   "Sebelum"
        //           },       
        //       },
        //         columnDefs: [
        //             {
        //                 targets:0, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                     if(type === 'display'){
        //                       data = '<a value="'+row.id+'" onClick="loadView('+row.id+')" class="text-secondary user_name">'+row.name+'</a>';
        //                     }
        //                     return data;
        //                 }
        //             },
        //             {
        //                 targets:3, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                     if(type === 'display'){
        //                             data=row.jabatan.nama_jabatan
        //                     }
        //                     return data;
        //                 }
        //             },
        //             {
        //                 targets:4, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                     if(type === 'display'){
        //                             data=row.jawatan.nama_jawatan
        //                     }
        //                     return data;
        //                 }
        //             },
        //             {
        //                 targets:7, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                     if(type === 'display'){
        //                             data="PENGGUNA BKOR"
        //                     }
        //                     return data;
        //                 }
        //             },
        //             {
        //                 targets:5, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                   //   console.log(data);
        //                     if(type === 'display'){
        //                         if(row.jenis_pengguna_id==2 && row.row_status==1){
        //                           data ='<div class="custom-control custom-switch text-center">'+
        //                           '<input type="checkbox" checked  class="custom-control-input float-end" id="customSwitch'+row.id+'">'+
        //                           '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
        //                           '</div>'
        //                         }
        //                         else{
        //                             data ='<div class="custom-control custom-switch">'+
        //                           '<input type="checkbox"  class="custom-control-input" id="customSwitch'+row.id+'">'+
        //                           '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
        //                           '</div>'
        //                         };
        //                     }
        //                     return data;
        //                 }
        //             },
        //             {
        //                 targets:6, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                   //   console.log(data);
        //                     if(type === 'display'){
        //                         if(row.jenis_pengguna_id==2 && row.row_status==1){
        //                             data ='<img class="img-thumbnail float-left" width="40px" src="images/pdf.png" alt="" onClick="downloadDoc('+row.id+')">'
        //                         }
        //                     }
        //                     return data;
        //                 }
        //             },
        //             {
        //                 targets:8, // Start with the last
        //                 render: function ( data, type, row, meta ) {
        //                     if(type === 'display'){
        //                             data=""
        //                     }
        //                     return data;
        //                 }
        //             }
                    
  
        //         ] ,
        //     columns: [
        //         { data: 'name' },
        //         { data: 'no_ic'  },
        //         { data: 'email'  },          
        //         { data: 'bahagian_id'  },
        //         { data: 'jawatan_id'  },
        //         { data: 'jawatan_id'  },
        //         { data: 'row_status'  },
        //         { data: 'jawatan_id'  },
        //         { data: 'jawatan_id'  },
        //     ],
        //     });
        //     loadcompleted();
        // },
        // error: function(response) {
        //     console.log(response);
        // }
        // });  
        
        
        $("#mapDatasubmit").click(function(){
          
              var nama_servis = $("#nama_servis").val();
              var module_id = $("#modul_name").children(":selected").attr("id");
              var pautan_nama = $("#pautan_nama").val();
              var server =$("#server").val();
              // console.log(module_id=='');
              // return
              if(nama_servis=='' || module_id=='' || pautan_nama==''||server==''){
                  $("#errorLabel").html('Semua bidang adalah Wajib !')
              }
              else{

                  var formData = new FormData();
                      formData.append('nama_servis', nama_servis);
                      formData.append('module_id', module_id);
                      formData.append('pautan_nama', pautan_nama);
                      formData.append('server', server);  
                                                            
                  axios({
                      method: 'POST',
                      url: "{{ env('API_URL') }}"+"api/user/mapServiceData",
                      responseType: 'json',
                      data:formData,   
                      headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                      },     
                  })
                  .then(function (response) {
                      // console.log(response.data.status=="Success")  
                      if(response.data.status=="Success"){
                        Swal.fire({
                    icon: 'success',
                    text: "Data Disimpan!",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                          /* Read more about isConfirmed, isDenied below */
                          if (result.isConfirmed) {
                              location.reload();
                          }
                          })
                          
                      }       
                  })
              }

          });
    });

    function checkStatus(id){
        var formData = new FormData();
        formData.append('modul_id', id);
          axios({
          method: 'POST',
          url: "{{ env('API_URL') }}"+"api/user/CheckMapserviceStatus",
          responseType: 'json',
          data:formData,   
          headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
          },     
        }).then(function (result) {
            console.log(result.data)

        })
    }
    function editModal(modul_id){
      // console.log(modul_id)   
      

      var formData = new FormData();
          formData.append('modul_id', modul_id);
          axios({
          method: 'POST',
          url: "{{ env('API_URL') }}"+"api/user/mapsedit",
          responseType: 'json',
          data:formData,   
          headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
          },     
          })
          .then(function (result) {
              update_id=result.data.data[0][0].id;
              $('#add_selenggara_data_modal').on('hidden.bs.modal', function () {
                    $('#modul_form')[0].reset();
                });
              
              $("#edit_nama_servis").val(result.data.data[0][0].nama_servis);
              // $("#edit_modul_name").
              $('#edit_modul_name').empty();
              for(var i=0;i<result.data.data[1].modul_list.length;i++){
                // console.log(result.data.data[1].modul_list[i].id==result.data.data[0][0].modul_id)
                  $("#edit_modul_name").append(`<option id="`+result.data.data[1].modul_list[i].id+`" value="`+result.data.data[1].modul_list[i].id+`">`+result.data.data[1].modul_list[i].modul_name+`</option>`)
                  if(result.data.data[1].modul_list[i].id==result.data.data[0][0].modul_id){
                    $("#edit_modul_name option[value='"+result.data.data[1].modul_list[i].id+"']")[0].selected = true;
                  }
              }
              $("#edit_pautan_nama").val(result.data.data[0][0].pautan_api);
              $("#edit_server").val(result.data.data[0][0].server);
              $("#edit_submit").click(function(){
              var module_id = $("#edit_modul_name").children(":selected").attr("id");
              var pautan_nama = $("#edit_pautan_nama").val();
              var edit_nama_servis =$("#edit_nama_servis").val();
              var edit_server =$("#edit_server").val();
              // console.log(module_id=='');
              // return
              if(pautan_nama=='' || edit_server=='' || module_id==''||edit_nama_servis==''){
                  $("#edit_errorLabel").html('Semua bidang adalah Wajib !')
              }else{
                  // console.log(module_id,pautan_nama,keterangan,update_id);
                  // return 
                  var formData = new FormData();
                      formData.append('update_id',update_id);
                      formData.append('module_id', module_id);
                      formData.append('pautan', pautan_nama);
                      formData.append('edit_nama_servis', edit_nama_servis); 
                      formData.append('edit_server', edit_server); 
                      formData.append('user_id', {{Auth::user()->id}})
                                    
                  axios({
                      method: 'POST',
                      url: "{{ env('API_URL') }}"+"api/user/mapsupdate",
                      responseType: 'json',
                      data:formData,   
                      headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                      },     
                  })
                  .then(function (response) {
                      // console.log(response.data.status=="Success")  
                      if(response.data.status=="Success"){
                        Swal.fire({
                    icon: 'success',
                    text: "Data dikemaskini!",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                          if (result.isConfirmed) {
                              location.reload();
                          }
                          })
                          
                      }       
                  })
              }
              });
          })
      }
  </script>
  <script>
      var api_url = "{{env('API_URL')}}";
      var api_token = "Bearer "+ window.localStorage.getItem('token');
      $.ajaxSetup({
           headers: {
                  "Content-Type": "application/json",
                  "Authorization": api_token,
                  }
      });
      // function userData(id){
      //         user_id=id
      //         // console.log(user_id)
      //         $.ajax({
      //                 type: "GET",
      //                 url: "fectchuser",
      //                 contentType: "application/json",
      //                 dataType: "json",
      //                 header:{
      //                     'contentType': "application/json",
      //                     'Authorization':api_token
      //                 },
      //                 data:{id:user_id},
      //                 success: function(response) {
      //                     if(response){
      //                         window.location.href = "user-profile";
      //                     }
      //                 },
      //                 error: function(response) {
      //                     console.log(response);
      //                 }
      //         });
      // }
      function loadView(id)
      { console.log(id)
          //var url = '{{ url("/user-profile", ":id")}}'
          var url = '{{ route("user.profile", ["appuser",":id"])}}'
          url = url.replace(':id', id);
          //url = url.replace(':temp', id);
          
          localStorage.setItem("user_id", id);
          localStorage.setItem("user_type", "temp_user");
          window.location.href = url;
      }

    
    

  //   let userlist_tab_btn = document.querySelectorAll(
  //   ".userlist_tab_btn_container button"
  // );
  // let userlist_tab_content = document.querySelectorAll(".userlist_tab_content ");
  </script>
  <script>
    function downloadDoc(id) {
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
     const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
     update_user_api = api_url+"api/user/user/download/";
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
                a.attr("download", 'document.pdf');
                a.attr("href", link);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);
             //}
              //window.location.href = "{{ url('/home')}}";
          }
      });
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