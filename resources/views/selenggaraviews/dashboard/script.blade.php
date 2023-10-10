<script>   
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");     
$('#add_selenggara_data_modal').on('hidden.bs.modal', function () {
$('#modul_form1')[0].reset();
});
var api_url = "{{env('API_URL')}}";
var api_token = "Bearer "+ window.localStorage.getItem('token');
$.ajaxSetup({
 headers: {
        "Content-Type": "application/json",
        "Authorization": api_token,
        }
});
$("#submit").click(function(){
    var module_id = $("#modul_name").children(":selected").attr("id");
    var pautan_nama = $("#pautan_nama").val();
    var keterangan =$("#keterangan").val().trim();
    // console.log(keterangan=='');
    // return
    if(pautan_nama=='' || keterangan=='' || module_id==''){
        $("#errorLabel").html('Semua bidang adalah Wajib !')
    }
    else{

        var formData = new FormData();
            formData.append('module_id', module_id);
            formData.append('pautan', pautan_nama);
            formData.append('keterangan', keterangan);
            formData.append('user_id', {{Auth::user()->id}})  
                                                  
        axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/lookup/modul-link",
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




var row_status = {'row_status':1}; 
$.ajax({
type: "GET",
url: api_url+"api/lookup/Pds/list",
//   url: "http://localhost:8080/api/temp/user/list",
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
  var tabledata=$('#tableData').DataTable({
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
                  if(type === 'display'){
                    data = '<label val="'+row.id+'" style="cursor:pointer" onClick="editModal('+row.id+')" data-target="#edit_selenggara_data_modal" data-toggle="modal" style="cursor: pointer;" class="text-secondary user_name">'+row.module.modul_name+'</label>';
                  }
                  return data;
              }
          },
          {
              targets:1, // Start with the last
              render: function ( data, type, row, meta ) {
                  if(type === 'display'){
                          data=row.keterangan
                  }
                  return data;
              }
          },
          {
              targets:2, // Start with the last
              render: function ( data, type, row, meta ) {
                  if(type === 'display'){
                          data="<a target='_blank' href="+row.Pautan+">"+row.Pautan+"</a>"
                  }
                  return data;
              }
          },
          {
              targets:3, // Start with the last
              render: function ( data, type, row, meta ) {
                //   console.log(data);
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
                        data ='<div class="d-flex"><i class="bi bi-globe h3 text-success"></i><div class="custom-control custom-switch text-center m-1 ml-5">'+
                        '<input type="checkbox" checked class="custom-control-input float-end radioBtn" id="customSwitch'+row.id+'">'+
                        '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                        '</div></div>'
                      }
                      else{
                        $("#customSwitch"+row.id).val(0);
                        data ='<div class="d-flex"><i class="bi bi-globe h3 text-danger"></i><div class="custom-control custom-switch text-center m-1 ml-5">'+
                        '<input type="checkbox" class="custom-control-input" id="customSwitch'+row.id+'">'+
                        '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                        '</div></div>'
                      };
                  }
                  return data;
              }
          },
      ] ,
  columns: [
      { data: 'modul_id' },
      { data: 'keterangan'  },
      { data: 'Pautan'  },          
      { data: 'modul_id'  },

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
},
error: function(response) {
  console.log(response);
}
}); 
function activateModul(id){
var activate=1
var formData = new FormData();
formData.append('id', id);
formData.append('value', activate);
formData.append('user_id', {{Auth::user()->id}})
axios({
method: 'POST',
url: "{{ env('API_URL') }}"+"api/lookup/activateModul",
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
}
function deactivateModul(id){
var deactivate=0
var formData = new FormData();
formData.append('id', id);
formData.append('value', deactivate);
formData.append('user_id', {{Auth::user()->id}})
axios({
method: 'POST',
url: "{{ env('API_URL') }}"+"api/lookup/deactivateModul",
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
}

});
function editModal(modul_id){
// console.log(modul_id)   

var formData = new FormData();
formData.append('modul_id', modul_id);
axios({
method: 'POST',
url: "{{ env('API_URL') }}"+"api/lookup/editModul",
responseType:'json',
data:formData,   
headers: {
    "Content-Type": "application/json",
    "Authorization": api_token,
},     
})
.then(function (result) {
    // console.log(result.data.data[0][0])
    // console.log(result.data.data[1])
    // console.log(result.data.data[1].modul_list);
    // console.log(result.data.data[0][0].id)
    // console.log(result.data.data[0][0].Pautan)
    // console.log(result.data.data[0][0].keterangan)
    // console.log(result.data.data[1].modul_list.length)

    update_id=result.data.data[0][0].id;
    // $("#edit_modul_name").append('<option selected class="selected_option" val="'+result.data.data[0][0].module.id+'" id="'+result.data.data[0][0].module.id+'">'+result.data.data[0][0].module.modul_name+'</option>')
    
    $('#edit_modul_name').empty();
    for(var i=0;i<result.data.data[1].modul_list.length;i++){
        // console.log(result.data.data[0][0].modul_id)
        $("#edit_modul_name").append(`<option id="`+result.data.data[1].modul_list[i].id+`"value="`+result.data.data[1].modul_list[i].id+`">`+result.data.data[1].modul_list[i].modul_name+`</option>`)
    }
    $("#edit_pautan_nama").val(result.data.data[0][0].Pautan);
    $("#edit_keterangan").val(result.data.data[0][0].keterangan);
    $("#edit_submit").click(function(){
    var module_id = $("#edit_modul_name").children(":selected").attr("id");
    var pautan_nama = $("#edit_pautan_nama").val();
    var keterangan =$("#edit_keterangan").val().trim();
    // console.log(module_id=='');
    // return
    if(pautan_nama=='' || keterangan=='' || module_id==''){
        $("#edit_errorLabel").html('Semua bidang adalah Wajib !')
    }else{
        // console.log(module_id,pautan_nama,keterangan,update_id);
        // return 
        var formData = new FormData();
            formData.append('update_id',update_id);
            formData.append('module_id', module_id);
            formData.append('pautan', pautan_nama);
            formData.append('keterangan', keterangan);
            formData.append('user_id', {{Auth::user()->id}}) 
                          
        axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/lookup/update",
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

//   let userlist_tab_btn = document.querySelectorAll(
//   ".userlist_tab_btn_container button"
// );
// let userlist_tab_content = document.querySelectorAll(".userlist_tab_content ");

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