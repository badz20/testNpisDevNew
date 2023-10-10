<script>
                  $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");

$("#rmkStrategiBtn").click(function(){
   var tema= $("#tema").val();
   var bab= $("#bab").val();
   var bidang= $("#bidang").val();
   var outcome= $("#outcome").val();
   var strategi= $("#strategi").val();
   var kod= $("#kod").val();
   var catatan= $("#catatan").val();
   if(tema==''||bab==''||bidang==''||outcome==''||strategi==''||kod==''||catatan==''){
    alert('All fields are mindatory');
   }
   else{  
    var formData = new FormData();
            formData.append("tema",tema);
            formData.append("bab", bab);
            formData.append("bidang", bidang);
            formData.append("outcome", outcome);
            formData.append("strategi", strategi);
            formData.append("kod", kod);
            formData.append("catatan", catatan);
            formData.append('user_id', {{Auth::user()->id}})
            // console.log(formData)
            var api_token = "Bearer "+ window.localStorage.getItem('token');
            axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+'api/lookup/rmk_strategi',
                responseType: 'json',
                data:formData,   
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                },     
                })
                .then(function (result) {
                  console.log(result)
                //   if(result.data.status=='Success'){
                //       $("#vms_modal").modal('show')
                //       $(".TutupBtn").click(function(){
                //         var reload= location.reload();                    
                        
                //       })
                Swal.fire({
                    icon: 'success',
                    text: "Data Berjaya Disimpan!",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                            })
                //   }
                })  

   }    

})
$(document).ready(function () {  
    
    const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer "+ window.localStorage.getItem('token')
        // console.log('loaded')
        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/lookup/rmk/list",
        responseType: 'json'
        })
        .then(function (response) {
            console.log(response.data.data)
            $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            var jps_table =$('#master_data').DataTable({     
              data: response.data.data,
              pagingType: 'full_numbers',
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada apa-apa ditemui - maaf",
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
                        // console.log(row.user.name)
                          if(type === 'display'){
                              //data=row.value
                              data = '<div class="align-items-center">' +                                
                                    '<p style="cursor:pointer" onClick="loadflow(\''+row.id+'\')">' + 
                                        row.nama_strategi
                                    + '</p>' +  
                                    '<p style="cursor:pointer" onClick="loadflow(\''+row.id+'\')">' + 
                                        row.Bab
                                    + '</p>' +   
                                    '<p style="cursor:pointer" onClick="loadflow(\''+row.id+'\')">' + 
                                        row.Tema_Pemangkin_Dasar
                                    + '</p>' +  
                                    '<p style="cursor:pointer" onClick="loadflow(\''+row.id+'\')">' + 
                                        row.Bidang_Keutamaan
                                    + '</p>' +  
                              '</div>'
                              //data = '<a value="'+row.id+'" onClick="loadTempUser('+row.id+')" class="text-dark user_name">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:1, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.dikemaskini_pada
                          }
                          return data;
                      }
                  },
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              if(row.user.name!=undefined){
                                data=row.user.name
                              }
                              else{
                                data='admin'
                              }

                          }
                          return data;
                      }
                  },                  
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                                $("#customSwitch"+row.id).click(function(){
                                var value=$("#customSwitch"+row.id).val();
                                var id=row.id;
                                // console.log(value,id);
                                if(value==0){
                                    activateModul(id);
                                }
                                else{
                                    deactivateModul(id);
                                }
                                })
                                if(row.row_status==1){
                                    $("#customSwitch"+row.id).val(1);
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" checked  class="custom-control-input" onClick="deactivateModul(\''+row.id+'\')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                    $("#customSwitch"+row.id).val(0);
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" class="custom-control-input" onClick="activateModul(\''+row.id+'\')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                                    };
                                  //data=row.row_status
                          }
                          return data;
                      }
                  },                   
              ] , 
              columns: [
                  { data: 'nama_strategi'},
                  { data: 'dikemaskini_pada'},
                  { data: 'dibuat_oleh'  },
                  { data: 'row_status'  },                           
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
          loadcompleted();
            //response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
        });

    });
    

    function loadflow(id){
        if(id){
            $("#update_id").val(id);
            var update_id=$("#update_id").val();
            if(update_id!=""){
                const api_token = "Bearer "+ window.localStorage.getItem('token')
                // console.log('loaded')
                axios.defaults.headers.common["Authorization"] = api_token
                axios({
                method: 'post',
                url: "{{ env('API_URL') }}"+"api/lookup/rmk_strategi_edit/"+update_id,
                responseType: 'json'
                })
                .then(function (response) {
                 console.log(response.data.data[0])  
                 var tema= $("#edit_tema").val(response.data.data[0].Tema_Pemangkin_Dasar);
                    var bab= $("#edit_bab").val(response.data.data[0].Bab);
                    var bidang= $("#edit_bidang").val(response.data.data[0].Bidang_Keutamaan);
                    var outcome= $("#edit_outcome").val(response.data.data[0].Outcome_Nasional);
                    var strategi= $("#edit_strategi").val(response.data.data[0].nama_strategi);
                    var kod= $("#edit_kod").val(response.data.data[0].kod_strategi);
                    var catatan= $("#edit_catatan").val(response.data.data[0].Catatan); 
                    $('#edit_selenggara_data_modal').modal('show');
                    $("#edit_rmkStrategiBtn").click(function(){
                        var update_id= $("#update_id").val();
                    var tema= $("#edit_tema").val();
                    var bab= $("#edit_bab").val();
                    var bidang= $("#edit_bidang").val();
                    var outcome= $("#edit_outcome").val();
                    var strategi= $("#edit_strategi").val();
                    var kod= $("#edit_kod").val();
                    var catatan= $("#edit_catatan").val();
                    if(tema==''||bab==''||bidang==''||outcome==''||strategi==''||kod==''||catatan=='' || update_id==''){
                        alert('All fields are mindatory');
                    }
                    else{  
                        var formData = new FormData();
                                formData.append("update_id",update_id);
                                formData.append("tema",tema);
                                formData.append("bab", bab);
                                formData.append("bidang", bidang);
                                formData.append("outcome", outcome);
                                formData.append("strategi", strategi);
                                formData.append("kod", kod);
                                formData.append("catatan", catatan);
                                formData.append('user_id', {{Auth::user()->id}})
                                // console.log(formData)
                                var api_token = "Bearer "+ window.localStorage.getItem('token');
                                axios({
                                    method: 'POST',
                                    url: "{{ env('API_URL') }}"+'api/lookup/rmk_update_strategi',
                                    responseType: 'json',
                                    data:formData,   
                                    headers: {
                                        "Content-Type": "application/json",
                                        "Authorization": api_token,
                                    },     
                                    })
                                    .then(function (result) {
                                    console.log(result)
                                      if(result.data.status=='Success'){
                                        Swal.fire({
                                            icon: 'success',
                                            text: "Data Berjaya Dikemaskini!",
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

                    })
                })
            }
        }
        
    }

    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer "+ window.localStorage.getItem('token')
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
            formData.append('user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna diaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/lookup/activate_strategi",
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
                    text: "Diaktifkan!",
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
            formData.append('user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna dinyahaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/lookup/deactivate_strategi",
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
                    text: "Dinyahaktifkan!",
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

        $('#spatial_label').hide();
        function nonspatial(){
            $('#spatial_label').hide();
            $('#nonspatial_label').show();
        }
        function spatial(){
            $('#spatial_label').show();
            $('#nonspatial_label').hide();
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