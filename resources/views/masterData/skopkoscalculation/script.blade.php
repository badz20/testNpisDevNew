<script>
      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");

$(document).ready(function () {  
    

    $('#spatial_label').hide();
      function nonspatial(){
          $('#spatial_label').hide();
          $('#nonspatial_label').show();
      }
      function spatial(){
          $('#spatial_label').show();
          $('#nonspatial_label').hide();
      }
    const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer "+ window.localStorage.getItem('token')
        // console.log('loaded')
        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/lookup/listskopcost-details",
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
                      render: function ( data, type, row, meta ) {
                        // console.log(row.user.name)
                          if(type === 'display'){
                              //data=row.value
                              data =  row.total_cost.number_format
                          }
                          return data;
                      }
                  },
                  {
                      targets:1, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.P_min
                          }
                          return data;
                      }
                  },
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                data=row.P_max
                          }
                          return data;
                      }
                  },                  
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){
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
                  { data: 'total_cost'},
                  { data: 'P_min'},
                  { data: 'P_max'  },
                  { data: 'IsActive'  },     
                  { data: 'id'  },                  
                      
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


    function loadData(id) {    
        
      var api_token = "Bearer "+ window.localStorage.getItem('token');
      axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/lookup/listskopcost-details/" + id,
        responseType: 'json',
        headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            }       
        })
        .then(function (response) {
            console.log(response.data.data)  
            var id = response.data.data[0].id
            var total_cost = response.data.data[0].total_cost 
            var p_min = response.data.data[0].P_min            
            var p_max = response.data.data[0].P_max    
            
            console.log(total_cost)
            $('#update_id').val(id)                
            $('#edit_total_cost').val(total_cost)
            $('#edit_p_min').val(p_min)            
            $('#edit_p_max').val(p_max)    
            document.getElementById("error_edit_p_max").innerHTML=" "; 
            document.getElementById("error_edit_p_min").innerHTML=" ";
            document.getElementById("error_edit_total_cost").innerHTML=" ";                     
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
                url: "{{ env('API_URL') }}"+"api/lookup/skop_cost_update_status",
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
                url: "{{ env('API_URL') }}"+"api/lookup/skop_cost_update_status",
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

  $("#editSkopCostBtn").click(function(){
   var id= $("#update_id").val();
   var total_cost= $("#edit_total_cost").val();
   var p_min= $("#edit_p_min").val();
   var p_max= $("#edit_p_max").val();

    if(total_cost=='' || total_cost<0){
            document.getElementById("error_edit_total_cost").innerHTML="Jumlah Kos Diperlukan"; 
			document.getElementById("edit_total_cost").focus();
			return false; 
    }
    else
    {
        document.getElementById("error_edit_total_cost").innerHTML=" "; 
    }
    if(p_min=='' || p_min<0){
            document.getElementById("error_edit_p_min").innerHTML="P Min Diperlukan"; 
			document.getElementById("p_min").focus();
			return false; 
    }
    else
    {
        document.getElementById("error_edit_p_min").innerHTML=" "; 
    }
    if(p_max=='' || p_max<0){
            document.getElementById("error_edit_p_max").innerHTML="P Max Diperlukan"; 
			document.getElementById("edit_p_max").focus();
			return false; 
    }
    else
    {
        document.getElementById("error_edit_p_max").innerHTML=" "; 
    } 
 
    var formData = new FormData();
            formData.append("id",id);
            formData.append("total_cost", total_cost);
            formData.append("p_min", p_min);
            formData.append("p_max", p_max);
            // console.log(formData)
            var api_token = "Bearer "+ window.localStorage.getItem('token');
            axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+'api/lookup/skop_cost_update/',
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
  

})

$("#addSkopCostBtn").click(function(){
   var total_cost= $("#total_cost").val();
   var p_min= $("#p_min").val();
   var p_max= $("#p_max").val();

    if(total_cost=='' || total_cost<0){
            document.getElementById("error_total_cost").innerHTML="Jumlah Kos Diperlukan"; 
			document.getElementById("total_cost").focus();
			return false; 
    }
    else
    {
        document.getElementById("error_total_cost").innerHTML=" "; 
    }
    if(p_min=='' || p_min<0){
            document.getElementById("error_p_min").innerHTML="P Min Diperlukan"; 
			document.getElementById("p_min").focus();
			return false; 
    }
    else
    {
        document.getElementById("error_p_min").innerHTML=" "; 
    }
    if(p_max=='' || p_max<0){
            document.getElementById("error_p_max").innerHTML="P Max Diperlukan"; 
			document.getElementById("p_max").focus();
			return false; 
    }
    else
    {
        document.getElementById("error_p_max").innerHTML=" "; 
    } 
    var formData = new FormData();
            formData.append("total_cost", total_cost);
            formData.append("p_min", p_min);
            formData.append("p_max", p_max);
            // console.log(formData)
            var api_token = "Bearer "+ window.localStorage.getItem('token');
            axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+'api/lookup/skop_cost_add/',
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

})
    
</script>