<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(function() {
        $('#addBtn').click(function() {
                 $('#modal1').modal('hide');
        });
});
</script>

<script>

  $(document).ready(function () {
    $(".closeModel").click(function(){
      $("#add_role_modal").modal("hide");
    })
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

        $.ajax({
          type: "GET",
          url: api_url+"api/portal/getperanan/list",
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          success: function(response) {  
                //   console.log(response) 
                loadDatatable(response);        
            },
            error: function(response) {
                console.log(response);
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            }
          });  


    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addBtn').on('click', function () {

      // Adding a row inside the tbody.
      $('#tbody').append(`<tr id="R${++rowIdx}">
           <td class="row-index col-9">
           <p style="font-size:0.8rem; vertical-align:middle;"> ${rowIdx}. P33012341951</p>
           </td>
           <td class="row-index text-right col-3">
            <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#pilihmodul" style="font-size:0.8rem;">Pilih Modul</button>
           </td>
            <td class="text-center">
              <button class="btn btn-secondary remove" style="font-size:0.8rem;"
                type="button">-</button>
              </td>
            </tr>`);
    });

    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function () {

      // Getting all the rows next to the row
      // containing the clicked button
      var child = $(this).closest('tr').nextAll();

      // Iterating across all the rows 
      // obtained to change the index
      child.each(function () {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`Row ${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });

  function loadDatatable(response)
    { console.log(response)
      $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                var count=0;
                var jps_table =$('#list_peranan').DataTable({     
                    processing: true,
                    data: response.data,
                    "aaSorting": [],
                    pagingType: 'full_numbers',
                    "language": {
                            "lengthMenu": "Papar _MENU_ Entri",
                            "zeroRecords": "Tiada rekod dijumpai",
                            "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                            "infoEmpty": "Tiada rekod tersedia",
                            "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                            "searchPlaceholder": " Carian",
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
                                count=count+1; 
                                return count;
                            }
                        },
                        {
                            targets:1, // Start with the last
                            render: function ( data, type, row, meta ) { 
                                if(type === 'display'){
                                        data=row.nama_peranan;
                                }
                                return data;
                            }
                        },
                        {
                            targets:2, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                   if(row.penyedia==1)
                                   {
                                    data='<label class="green">'+"&#x2713;"+'</label>'
                                   }
                                   else
                                   {
                                    data='<label class="red">'+"X"+'</label>'
                                   }
                                }
                                return data;
                            }
                        },
                        {
                            targets:3, // Start with the last
                            render: function ( data, type, row, meta ) {
                                    // console.log(row.bahagian.nama_bahagian)
                                if(type === 'display'){
                                  if(row.penyemak==1)
                                   {
                                    data='<label class="green">'+"&#x2713;"+'</label>'
                                   }
                                   else
                                   {
                                    data='<label class="red">'+"X"+'</label>'
                                   }
                                }
                                return data;
                            }
                        },
                        {
                            targets:4, // Start with the last
                            render: function ( data, type, row, meta ) {
                                    // console.log(row.bahagian.nama_bahagian)
                                if(type === 'display'){
                                  if(row.penyemak_1==1)
                                   {
                                    data='<label class="green">'+"&#x2713;"+'</label>'
                                   }
                                   else
                                   {
                                    data='<label class="red">'+"X"+'</label>'
                                   }
                                }
                                return data;
                            }
                        },
                        {
                            targets:5, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                  if(row.penyemak_2==1)
                                   {
                                    data='<label class="green">'+"&#x2713;"+'</label>'
                                   }
                                   else
                                   {
                                    data='<label class="red">'+"X"+'</label>'
                                   }
                                }
                                return data;
                            }
                        },
                        {
                            targets:6, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                  if(row.pengesah==1)
                                   {
                                    data='<label class="green">'+"&#x2713;"+'</label>'
                                   }
                                   else
                                   {
                                    data='<label class="red">'+"X"+'</label>'
                                   }
                                }
                                return data;
                            }
                        },
                        {
                                targets:7, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    //   console.log(data);
                                    if(type === 'display'){
                                      data=row.dibuat_pada;
                                    }
                                    return data;
                                }
                          },
                          {
                                targets:8, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    // console.log(data);
                                    if(type === 'display'){
                                      data=`<td class="rmv_per"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" onclick="editPeranan(`+row.id+`)" title="Edit" style="width:22px;float:left;cursor:pointer;" alt="minus">+
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> +
                            </svg>
                                              </td>`+`<td class="rmv_per"><img onclick="deletePeranan(`+row.id+`)" title="Delete" style="width:17px;cursor:pointer;" src="{{ asset('assets/images/delete.png') }}" alt="minus" />
                                              </td>`
                                    }
                                    return data;
                                }
                          }, 
        
                    ] , 
                    columns: [
                        { data: 'count'  },
                        { data: 'nama_peranan'  },
                        { data: 'penyedia'  },   
                        { data: 'penyemak'  },       
                        { data: 'penyemak_1'  },
                        { data: 'penyemak_2'  },
                        { data: 'pengesah'  },
                        { data: 'dibuat_pada'  },
                        { data: 'pengesah'  },
                    ],
                    
                        
                });
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
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


  function myFunction() {
                              // Get the checkbox
                              var checkBox = document.getElementById("myCheck");
                              // Get the output text
                              var text = document.getElementById("text");

                              // If the checkbox is checked, display the output text
                              if (checkBox.checked == true){
                              text.style.display = "";
                              } else {
                              text.style.display = "none";
                              }
                      }

function deletePeranan(id)
{
      $("#add_role_sucess_modal-confirm").modal('show');
      document.getElementById("tutup-confirm").setAttribute("peranan_id_for_delete",id);

      $('#tutup-confirm').click(function(){

        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

        var formData = new FormData();
        var peranan_id=document.getElementById("tutup-confirm").getAttribute("peranan_id_for_delete"); console.log(id);
        formData.append('peranan_id', id);
            axios({

              method: 'GET',
              url: api_url+"api/portal/check-user-peranan?id="+peranan_id,
              responseType: 'json',
              headers: {
                  "Content-Type": "application/json",
                  "Authorization": api_token,
              },     
            })
            .then(function (result) {
              console.log(result.data)
              if(result.data.status=='Sucess'){
                  $("#add_role_sucess_modal-confirm").modal('hide');
                  $("#peranan_sucess_modal").modal('show');
                  $('#tutup_peranan_success').click(function(){
                  $("#peranan_sucess_modal").modal('hide');
                    window.location.href = origin + '/selenggara-pengurusan-peranan';
                  });
              }
              else
              {
                $("#add_role_sucess_modal-confirm").modal('hide');
                $("#add_role_sucess_modal").modal('show');
                $("#delete_success").removeClass("d-none");
                $('#succes_tutup').click(function(){
                    $("#add_role_sucess_modal").modal('hide');
                    $("#delete_success").addClass("d-none");
                    window.location.href = origin + '/selenggara-pengurusan-peranan';
                  });
              }
            });
      });


      $('#close-confirm_btn').click(function(){
            document.getElementById("tutup-confirm").removeAttribute("peranan_id_for_delete");
            $("#add_role_sucess_modal-confirm").modal('hide');
      });
}

function editPeranan(id)
{

        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

        var formData = new FormData();
            axios({
              method: 'GET',
              url: api_url+"api/portal/get-peranan-data?id="+id,
              responseType: 'json',
              headers: {
                  "Content-Type": "application/json",
                  "Authorization": api_token,
              },     
            })
            .then(function (result) {
              console.log(result.data.data)
              $("#add_role_modal").modal('show');
              if(result.data.status=='Sucess'){
                var new_data=result.data.data;
                document.getElementById("nama_peranan").value = new_data.nama_peranan;
                if(new_data.penyedia==1)
                { 
                  document.getElementById("penyedia").checked = "true";
                }
                else
                { 
                  $("#penyedia").prop("checked", false);

                }
                if(new_data.penyemak==1)
                {
                  document.getElementById("penyemak").checked = "true";
                }
                else
                {
                  $("#penyemak").prop("checked", false);
                }
                if(new_data.penyemak_1==1)
                {
                  document.getElementById("penyemak_1").checked = "true";
                }
                else
                {
                  $("#penyemak_1").prop("checked", false);
                }
                if(new_data.penyemak_2==1)
                {
                  document.getElementById("penyemak_2").checked = "true";
                }
                else
                {
                  $("#penyemak_2").prop("checked", false);
                }
                if(new_data.pengesah==1)
                {
                  document.getElementById("pengesah").checked = "true";
                }
                else
                {
                  $("#pengesah").prop("checked", false);
                }
                submiteditFunction(id);
              }
              else
              {

              }
            });

}


function submiteditFunction(id)
{
    $('#simpan-pop').click(function(){

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    var penyedia=0;
    if(document.getElementById("penyedia").checked)
    {
      penyedia=1;
    }
    var penyemak=0;
    if(document.getElementById("penyemak").checked)
    {
      penyemak=1;
    }
    var penyemak_1=0;
    if(document.getElementById("penyemak_1").checked)
    {
      penyemak_1=1;
    }
    var penyemak_2=0;
    if(document.getElementById("penyemak_2").checked)
    {
      penyemak_2=1;
    }
    var pengesah=0;
    if(document.getElementById("pengesah").checked)
    {
      pengesah=1;
    }

    if(document.getElementById("nama_peranan").value=='')
    {
      document.getElementById("error_nama_peranan").innerHTML="Sila Pilih Nama Peranan"; 
			document.getElementById("nama_peranan").focus();
			return false;
    }
    else
    {
      document.getElementById("error_nama_peranan").innerHTML=""; 
    }

    var formData = new FormData();
    formData.append('peranan_id', id);
    formData.append('nama', document.getElementById("nama_peranan").value);
    formData.append('penyedia',penyedia);
    formData.append('penyemak',penyemak);
    formData.append('penyemak_1', penyemak_1);
    formData.append('penyemak_2', penyemak_2);
    formData.append('pengesah', pengesah);

        axios({

          method: 'POST',
          url: api_url+"api/portal/update-peranan",
          responseType: 'json',
          data:formData,   
          headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
          },     
        })
        .then(function (result) {
          console.log(result.data)
          if(result.data.status=='Sucess'){
              $("#add_role_modal").modal('hide');
              $("#add_role_sucess_modal").modal('show');
              $("#update_success").removeClass("d-none");
              $('#succes_tutup').click(function(){
                  $("#add_role_sucess_modal").modal('hide');
                  $("#update_success").addClass("d-none");
                  window.location.href = origin + '/selenggara-pengurusan-peranan';
              });
          }
          else
          {
          }
        });
    });

}


$("#simpan").click(function(){ 

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

    var formData = new FormData();

    var checkboxes = document.querySelectorAll('input[id="permohan"]'); console.log(checkboxes)
    let peranan=[];
    var checked_stat =0;

    for (var i = 0; i < checkboxes.length; i++) { console.log(checkboxes[i].name)
      if (checkboxes[i].checked) {
        checked_stat =1;
      } else {
        checked_stat =0;
      }
      formData.append('peranan[]', checked_stat);  
    }
    var nama_peranan = document.getElementById("nama_peranan").value;
    if(nama_peranan=='')
    {
        document.getElementById("error_nama_peranan").innerHTML="Sila pilih nama peranan"; 
      document.getElementById("nama_peranan").focus();
      return false;
    }
    else
    {
        document.getElementById("error_nama_peranan").innerHTML="";  
    }
    formData.append('nama_peranan', nama_peranan);  
    formData.append('user_id', {{Auth::user()->id}})

    axios({

      method: 'POST',
      url: api_url+"api/portal/add-peranan",
      responseType: 'json',
      data:formData,   
      headers: {
          "Content-Type": "application/json",
          "Authorization": api_token,
      },     
    })
    .then(function (result) {
      console.log(result.data)
      if(result.data.status=='Sucess'){
          $("#add_role_sucess_modal").modal('show')
          $(".TutupBtn").click(function(){
            window.location.href = origin + '/selenggara-pengurusan-peranan';
            
          })
      }
    });
});
</script> 