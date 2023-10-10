<script>        
 
    var api_url = "{{env('API_URL')}}";
   var api_token = "Bearer "+ window.localStorage.getItem('token');
   $.ajaxSetup({
        headers: {
               "Content-Type": "application/json",
               "Authorization": api_token,
               }
   });
   $("#submit").click(function(){
           var kementerian_nama = $("#kementerian_nama").val();
           var kod_asal = $("#kod_asal").val();
           var kod_baharu =$("#kod_baharu").val();
           // console.log(module_id=='');
           // return
           if(kementerian_nama=='' || kod_asal=='' || kod_baharu==''){
               $("#errorLabel").html('Semua bidang adalah Wajib !')
           }
           else if(kod_baharu.length>2){
            $("#errorLabel").html('panjang Kod Baharu tidak lebih daripada dua digit!')
           }
           else{
               if(kod_asal==kod_baharu){
                Swal.fire({
                    icon: 'warning',
                    text: "Kod ini telah wujud. Sila pilih kod yang baru!",
                    confirmButtonText: 'Tutup',
                }
                )
                //    Swal.fire(
                //        'Kod ini telah wujud. Sila pilih kod yang baru!',
                //        '',
                //        'warning'
                //        )
                       
               }
               else{
                   var formData = new FormData();
                       formData.append('kementerian_nama', kementerian_nama);
                       formData.append('kod_asal', kod_asal);
                       formData.append('kod_baharu', kod_baharu); 
                       formData.append('user_id', {{Auth::user()->id}});

                       
                                                           
                   axios({
                       method: 'POST',
                       url: "{{ env('API_URL') }}"+"api/project/updateKementerian",
                       responseType: 'json',
                       data:formData,   
                       headers: {
                               "Content-Type": "application/json",
                               "Authorization": api_token,
                       },     
                   })
                   .then(function (response) {
                       console.log(response)  
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
                       if(response.data.status=="Duplicate"){
                        Swal.fire({
                            icon: 'warning',
                            text: "Kod ini telah wujud. Sila pilih kod yang baru!",
                            confirmButtonText: 'Tutup',
                        }
                        )                           
                       }
                            
                   })
               }
           }

       });
 
 $(document).ready(function () {  
   $("div.spanner").addClass("show");
   $("div.overlay").addClass("show"); 
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
   // $.ajax({
   // type: "post",
   // url: api_url+"api/lookup/modulelist",
   // dataType: 'json',
   //     success: function (result) { 
   //         console.log(result.data)
   //         for(var i=0;i<=result.data.length;i++){
   //             $("#modul_name").append('<option class="selected_option" val="'+ result.data[i].id +'" id="'+ result.data[i].id +'">'+result.data[i].modul_name+'</option>')
   //             // $("#edit_modul_name").append('<option class="selected_option" val="'+ result.data[i].id +'" id="'+ result.data[i].id +'">'+result.data[i].modul_name+'</option>')  
               
   //         }
   //     },
   //     error: function(response) {
   //       console.log(response);
   //     }
   // });





   var api_token = "Bearer "+ window.localStorage.getItem('token');
   $.ajaxSetup({
        headers: {
               "Content-Type": "application/json",
               "Authorization": api_token,
               }
   });
   var row_status = {'row_status':1}; 
     $.ajax({
       type: "GET",
       url: api_url+"api/project/SelenggaraKodProjek",
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
                           var kod=row.kod_kementerian.replace(/\D/g,'');
                           data = '<label val="'+row.kod_kementerian+'" onClick="kod_kementerian('+row.kod_kementerian+')" style="cursor: pointer;" class="text-secondary user_name">'+kod+'</label>';
                         }
                         return data;
                     }
                 },
                 {
                     targets:1, // Start with the last
                     render: function ( data, type, row, meta ) {
                         if(type === 'display'){
                                 data=row.nama_kementerian
                         }
                         return data;
                     }
                 },
                 {
                     targets:2, // Start with the last
                     render: function ( data, type, row, meta ) {
                         if(type === 'display'){
                           data = '<label val="'+row.kod_kementerian+'" onClick="kementerian_data('+row.id+')"  style="cursor: pointer;" data-target="#add_selenggara_data_modal" data-toggle="modal" class="text-secondary user_name">' +
                         '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">'+
                         '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>' +
                       '</svg>'+
                         '</label>'
                           // data = '<label val="'+row.kod_kementerian+'" onClick="kementerian_data('+row.kod_kementerian+')"  style="cursor: pointer;" data-target="#add_selenggara_data_modal" data-toggle="modal" class="text-secondary user_name"><i class="bi bi-pencil-square h4"></i></label>';
                         }
                         return data;
                     }
                 },
             ] ,
         columns: [
             { data: 'kod_kementerian' },
             { data: 'nama_kementerian'  },
             { data: 'kod_kementerian' },

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
   //   function activateModul(id){
   //     var activate=1
   //     var formData = new FormData();
   //     formData.append('id', id);
   //     formData.append('value', activate);
   //     axios({
   //     method: 'POST',
   //     url: "{{ env('API_URL') }}"+"api/lookup/activateModul",
   //     responseType: 'json',
   //     data:formData,   
   //     headers: {
   //         "Content-Type": "application/json",
   //         "Authorization": api_token,
   //     },     
   //     })
   //     .then(function (result) {
   //         // console.log(result)
   //         Swal.fire(
   //                     'Diaktifkan!',
   //                     '',
   //                     'success'
   //                     ).then((result) => {
   //                     /* Read more about isConfirmed, isDenied below */
   //                     if (result.isConfirmed) {
   //                         location.reload();
   //                     }
   //                     })


   //     })
   //   }
   //   function deactivateModul(id){
   //     var deactivate=0
   //     var formData = new FormData();
   //     formData.append('id', id);
   //     formData.append('value', deactivate);
   //     axios({
   //     method: 'POST',
   //     url: "{{ env('API_URL') }}"+"api/lookup/deactivateModul",
   //     responseType: 'json',
   //     data:formData,   
   //     headers: {
   //         "Content-Type": "application/json",
   //         "Authorization": api_token,
   //     },     
   //     })
   //     .then(function (result) {
   //         // console.log(result)
   //         Swal.fire(
   //         'Dinyahaktifkan!',
   //         '',
   //         'success'
   //         ).then((result) => {
   //         /* Read more about isConfirmed, isDenied below */
   //         if (result.isConfirmed) {
   //             location.reload();
   //         }
   //         })
   //     })
   //   }
     
 });
 function kod_kementerian(modul_id){
   // console.log(modul_id)   

   var formData = new FormData();
       formData.append('modul_id', modul_id);
       axios({
       method: 'post',
       url: "{{ env('API_URL') }}"+"api/project/kod_kementerian",
       responseType: 'json',
       data:formData,   
       headers: {
           "Content-Type": "application/json",
           "Authorization": api_token,
       },     
       })
       .then(function (result) {
           console.log(result.data.data)

           var kod_asal = {'kod_asal':modul_id}; 
   //     $.ajax({
   //     type: "GET",
   //     url: api_url+"api/project/dataKementerian",
   //     dataType:"json",
   //     data:kod_asal,   
   //     contentType: "application/json",
   //     header:{
   //         'contentType': "application/json",
   //         'Authorization':api_token
   //     },
   //   success: function(response) { 
       
   //         console.log(response.data[0]) 
   //         $("#kementerian_nama").val(response.data[0].nama_projek)
   //         $("#kod_asal").val(response.data[0].kod_asal)
   //         $("#kod_baharu").val(response.data[0].kod_baharu)         
         
   //   },
   //   error: function(response) {
   //       console.log(response);
   //   }
   //   });
           

           $("#TableContent").addClass("d-none")
           $("#TableContent2").removeClass("d-none")
           var tabledata=$('#tableData2').DataTable({
           data: result.data.data,
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
                           // console.log(row.kod_asal)
                           data = '<label val="'+row.kod_baharu+'"  style="cursor: pointer;"  class="text-secondary user_name">P'+row.kod_baharu+'</label>';
                             
                         }
                         return data;
                     }
                 },
                 {
                     targets:1, // Start with the last
                     render: function ( data, type, row, meta ) {
                         if(type === 'display'){
                                 data=row.nama_projek
                         }
                         return data;
                     }
                 },
             ] ,
         columns: [
             { data: 'kod_asal' },
             { data: 'nama_projek'  }
         ],
         });                
       })
   }                    

   function kementerian_data(id){
   var id= {'id':id}; 
       $.ajax({
       type: "GET",
       url: api_url+"api/project/dataKementerian",
       dataType:"json",
       data:id,   
       contentType: "application/json",
       header:{
           'contentType': "application/json",
           'Authorization':api_token
       },
     success: function(response) {  
           console.log(response.data[0])
           if(response.data[0]==undefined){
               $('#modul_form1').addClass('d-none')
               $("#nodata").removeClass('d-none')
           } 
           else{
               $('#modul_form1').removeClass('d-none')
               $("#nodata").addClass('d-none')

           }
           $('#add_selenggara_data_modal').on('hidden.bs.modal', function () {
               $('#modul_form1')[0].reset();
           }); 
           $("#kod_asal").val(response.data[0].kod_kementerian) 
           $("#kementerian_nama").val(response.data[0].nama_kementerian)  
                 
         
     },
     error: function(response) {
         console.log(response);
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
//   let userlist_tab_btn = document.querySelectorAll(
//   ".userlist_tab_btn_container button"
// );
// let userlist_tab_content = document.querySelectorAll(".userlist_tab_content ");
</script>