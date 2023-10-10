<script>
                  $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
        function loadflow(data) {
            var base_url = window.location.origin;
            //var url = base_url + '/' + data;
            var url = "{{ route('master.bahagian',[ ':id']) }}"
            url = url.replace(":id", data)
            console.log(url)
            window.location.href = url
      }
      $('#add_selenggara_data_modal').on('hidden.bs.modal', function () {
                    $('#jabatanForm')[0].reset();
                });

      function loadData(id) {    
        axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/lookup/Jabatan/" + id,
        responseType: 'json'        
        })
        .then(function (response) {
            console.log(response)  
            var id = response.data.data.id
            var code = response.data.data.kod_jabatan
            var name = response.data.data.nama_jabatan
            var description =  response.data.data.penerangan_jabatan
            var kementerian = response.data.data.kementerian_id
            console.log(id)     
            //$('#modal_body').html(id)
            $('#id').val(id)            
            $('#code').val(code)            
            $('#nama').val(name)            
            $('#Keterangan').val(description)
            $('#kementerian').val(kementerian)
          $('#add_selenggara_data_modal').modal('show');            
        })  
  }
$(document).ready(function () {   

    const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer "+ window.localStorage.getItem('token')
        console.log('loaded')
        axios.defaults.headers.common["Authorization"] = api_token

    $("#jabatanForm").submit(function(event){
		submitjabatanForm();
		return false;
	});
    function submitjabatanForm(){
        //console.log(document.lookup.name.value)
        var formEl = document.forms.jabatanForm;
        var formData = new FormData(formEl);
        formData.append('user_id', {{Auth::user()->id}})
        //console.log(name)
        //console.log($('form#lookupForm').serialize())
        console.log('form submitted')

        axios({
        method: 'post',
        url: api_url+"api/lookup/Jabatan",
        responseType: 'json',
        data: formData
        })
        .then(function (response) {
          $('#add_selenggara_data_modal').modal('hide'); 
            $('#add_role_sucess_modal').modal('show'); 
              console.log(response)
              $("#tutup").click(function(){
                location.reload()
              })
        });       
    }

    if({{$jabatanId}} == 0) {
        kementerianurl ="{{ env('API_URL') }}"+"api/lookup/kementerian/list_kementerian"
    } else {
        kementerianurl ="{{ env('API_URL') }}"+"api/lookup/kementerian/list_kementerian?id=" + {{$jabatanId}}
    }
    var KementerianDropdown =  document.getElementById("kementerian");
    axios({
        method: 'get',
        url: kementerianurl,
        responseType: 'json',        
        })
        .then(function (response) {
            console.log(response)
            if(response.data.data.length == 1) {
              kementerian = response.data.data[0].nama_kementerian            
              document.getElementById("headerBreadcrum").textContent="  -  " + kementerian;              
            }
            $.each(response.data.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_kementerian;
					el.value = opt;
					KementerianDropdown.appendChild(el);
                })
        });

    
        if({{$jabatanId}} == 0) {
            url ="{{ env('API_URL') }}"+"api/lookup/jabatan/list_jabatan"
        } else {
            url ="{{ env('API_URL') }}"+"api/lookup/jabatan/list_jabatan?id=" + {{$jabatanId}}
        }
        axios({
        method: 'get',
        url: url,
        responseType: 'json'        
        })
        .then(function (response) {
            console.log(response)
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
                          if(type === 'display'){
                              //data=row.value
                              data = '<div class="d-flex align-items-center">' +   
                              '<p style="cursor:pointer" onClick="loadflow(\''+row.id+'\')">' + row.nama_jabatan + '</p>' +
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
                                  data=row.kod_jabatan
                          }
                          return data;
                      }
                  },
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.penerangan_jabatan
                          }
                          return data;
                      }
                  },                  
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                            // console.log(row.bahagian.nama_bahagian)
                          if(type === 'display'){
                            const today = new Date(row.dikemaskini_pada);
                            const yyyy = today.getFullYear();
                            let mm = today.getMonth() + 1; // Months start at 0!
                            let dd = today.getDate();

                            if (dd < 10) dd = '0' + dd;
                            if (mm < 10) mm = '0' + mm;

                            const formattedToday = dd + '-' + mm + '-' + yyyy;
                                  data=formattedToday
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.updated_by.name
                          }
                          return data;
                      }
                  },
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){

                            if(row.is_hidden==0){
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" checked  class="custom-control-input" onClick="deactivateModul(\''+row.id+'\')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" class="custom-control-input" onClick="activateModul(\''+row.id+'\')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                                    };
                                  //data=row.is_hidden
                          }
                          return data;
                      }
                  },   
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              //data=row.value
                              data = '<div class="d-flex align-items-center folder" onClick="loadData(\''+row.id+'\')">' +
                              '<svg style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">'+
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
                  { data: 'nama_jabatan'},
                  { data: 'kod_jabatan'},
                  { data: 'penerangan_jabatan'  },
                  { data: 'updated_at'  },          
                  {
                        targets:4,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.updated_by.length==0){
                                data="";
                            }else{
                                data=row.updated_by.name;
                            }
                            return data;
                        }
                        
                  },
                  { data: 'is_hidden'  },    
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
          loadcompleted()
            //response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
        });

    });

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
            var activate=0
            var formData = new FormData();
            formData.append('id', id);
            formData.append('value', activate);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna diaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/lookup/ActivateJabatan",
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
            var deactivate=1
            var formData = new FormData();
            formData.append('id', id);
            formData.append('value', deactivate);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna dinyahaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/lookup/DeactivateJabatan",
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