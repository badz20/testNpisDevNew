<script>

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

$(document).ready(function () {  
    
    const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer "+ window.localStorage.getItem('token')
        // console.log('loaded')
        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/lookup/units/list",
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
                                    '<p style="cursor:pointer" onClick="loadData(\''+row.id+'\')">' + 
                                        row.nama_unit
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
                                data=row.user.name
                          }
                          return data;
                      }
                  },                  
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                                // $("#customSwitch"+row.id).click(function(){
                                // var value=$("#customSwitch"+row.id).val();
                                // var id=row.id;
                                // // console.log(value,id);
                                // if(value==0){
                                //     activateModul(id);
                                // }
                                // else{
                                //     deactivateModul(id);
                                // }
                                // })
                                if(row.IsActive==1){
                                    $("#customSwitch"+row.id).val(1);
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" checked  class="custom-control-input" onClick="deactivateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                    $("#customSwitch"+row.id).val(0);
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" class="custom-control-input" onClick="activateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                                    };
                                  //data=row.row_status
                          }
                          return data;
                      }
                  },  
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              //data=row.value
                              data = '<div class="d-flex align-items-center folder" onClick="loadData(\''+row.id+'\')">' +
                              '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">'+
                              '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>' +
                            '</svg>'+
                              '</div>'
                              //data = '<a value="'+row.id+'" onClick="loadTempUser('+row.id+')" class="text-dark user_name">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },                      
              ] , 
              columns: [
                  { data: 'nama_unit'},
                  { data: 'dikemaskini_pada'},
                  { data: 'dikemaskini_oleh'  },
                  { data: 'IsActive'  },     
                  { data: 'id'  },                  
                      
              ],
              
                 
          });
          loadcompleted();
            //response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
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

    });


    function loadData(id) {    
        
      var api_token = "Bearer "+ window.localStorage.getItem('token');
      axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/lookup/units/list/" + id,
        responseType: 'json',
        headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            }       
        })
        .then(function (response) {
            console.log(response)  
            var id = response.data.data.id
            var nama = response.data.data.nama_unit            
            console.log(nama)     
            //$('#modal_body').html(id)
            $('#update_id').val(id)                
            $('#edit_nama_unit').val(nama)            
            $('#edit_selenggara_data_modal').modal('show');            
        })   
  }

  function activateModul(id){
    Swal.fire({
            text: 'Adakah anda pasti mahu mengaktifkan unit ini?',
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
                formData.append('user_id', {{Auth::user()->id}});
                var api_token = "Bearer "+ window.localStorage.getItem('token');
                axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+"api/lookup/update_status",
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
            text: 'Adakah anda pasti mahu menyahaktifkan unit ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ACF97',
            cancelButtonColor: '#FA5C7C',
            confirmButtonText: 'ya!',
            cancelButtonText: 'tidak'
            }).then((result) => {
            if (result.isConfirmed) 
            {
                var deactivate=0
                var formData = new FormData();
                formData.append('id', id);
                formData.append('value', deactivate);
                formData.append('user_id', {{Auth::user()->id}});
                var api_token = "Bearer "+ window.localStorage.getItem('token');
                axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+"api/lookup/update_status",
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
            }
            else{
                location.reload();
            }
        })
    }

  $("#edit_unit_Btn").click(function(){
   var id= $("#update_id").val();
   var nama_unit= $("#edit_nama_unit").val();
   if(nama_unit==''){
      alert('Nama unit is are required');
   }
   else{  
    var formData = new FormData();
            formData.append("id",id);
            formData.append("nama_unit", nama_unit);
            formData.append('user_id', {{Auth::user()->id}})
            // console.log(formData)
            var api_token = "Bearer "+ window.localStorage.getItem('token');
            axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+'api/lookup/unit_update',
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
                    text: "Data Berjaya Disimpan!",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                })  

   }    

})

$("#addUnitBtn").click(function(){
   var nama_unit= $("#add_nama_unit").val();
   if(nama_unit==''){
      alert('Nama unit is are required');
   }
   else{  
    var formData = new FormData();
            formData.append("nama_unit", nama_unit);
            formData.append('user_id', {{Auth::user()->id}})
            // console.log(formData)
            var api_token = "Bearer "+ window.localStorage.getItem('token');
            axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+'api/lookup/unit_add',
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
                    text: "Data Berjaya Disimpan!",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                })  

   }    

})

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