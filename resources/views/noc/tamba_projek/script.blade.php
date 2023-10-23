<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script>
    

        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });


    $(document).ready(function () { 

        const idArray = [];
        localStorage.setItem('idArray',JSON.stringify(idArray));

       $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');

        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        
        $.ajax({
                    type: "GET",
                    url: api_url+"api/noc/list_projects/"+{{$id}}+"/"+{{$type}},
                    dataType:"json",
                    contentType: "application/json",
                    header:{
                        'contentType': "application/json",
                        'Authorization':api_token
                    },
                    success: function(response) {  
                        //console.log(response)      
                        loadDatatableJps(response);
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    },
                    error: function(response) {
                        //console.log(response);
                    }
          }); 
    });

    function number_format($num)
    { //console.log($num)
        if(isNaN($num))
        {
          return '0.00';
        }
        else
        {
          if($num!=null && $num!='.00')
          {
            $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            return $abc;
          }
          else
          {
            return '0.00';
          }
        }      
    }

    function loadDatatableJps(response)
    { 
        var count=0;
        var jps_table =$('#jps_user').DataTable({     
                  data: response.data,
                  dom: "Blfrtip",
                  "aaSorting": [],
                  "language": {
                                    "lengthMenu": "Papar _MENU_ Entri",
                                    "zeroRecords": "Tiada rekod dijumpai",
                                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                                    "infoEmpty": "Tiada rekod tersedia",
                                    "infoFiltered": "(filtered from _MAX_ total records)",
                                    "search": "_INPUT_",
                                    "searchPlaceholder": "    Carian",
                                    "paginate": {
                                    "first":      "Awal",
                                    "last":       "Akhir",
                                    "next":       "Seterusnya",
                                    "previous":   "Sebelum"
                                    }, 
                                },
                                pagingType: 'full_numbers',
                                columnDefs: [
                       {
                          targets:0, // Start with the last
                          render: function ( data, type, row, meta ) { //console.log(row)
                                if(type === 'display'){
                                    count='<i class="ri-add-circle-fill determinatebtn" id="add_'+row.id+'" onclick="addtoList('+row.id+')"></i>'+
                                          '<i class="ri-indeterminate-circle-fill indeterminatebtn d-none" id="delete_'+row.id+'" onclick="deletefromList('+row.id+')"></i>'; 

                                }
                                return count;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data='<label id="kod_'+row.id+'"'+row.kod_projeck+'</label>';
                                }
                                return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data='<label id="butiran_'+row.id+'">'+row.butiran_code+'</label>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data='<label id="rujukan_'+row.id+'">'+row.no_rujukan+'</label>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data='<label id="nama_'+row.id+'">'+row.nama_projek+'</label>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data='<label id="kos_'+row.id+'">'+row.kos_projeck+'</label>';
                              }
                              return data;
                          }
                      },
                      {
                        "targets": 5,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                pembiyan='Wang Covid';
                              }
                              return pembiyan;
                          }
                      },
                      {
                        "targets": 7,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                keseruluhan_kos='44,300,000.00';
                              }
                              return keseruluhan_kos;
                          }
                      },
                      {
                        "targets": 8,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                baki_kos='44,300,000.00';
                              }
                              return baki_kos;
                          }
                      },
                      {
                        "targets": 9,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                peruntukan_kos='44,300,000.00';
                              }
                              return peruntukan_kos;
                          }
                      },
                      
                  ] , 
                  columns: [
                      
                      { data: 'count', "sortable": true},
                      { data: 'kod_projeck', "sortable": true  }, 
                      { data: 'butiran_code', "sortable": true},
                      { data: 'no_rujukan' ,  "sortable": true },
                      { data: 'nama_projek', "sortable": true  },   
                      { data: 'pembiyan', "sortable": true  },
                      { data: 'kos_projeck',  "sortable": true  },
                      { data: 'keseruluhan_kos', "sortable": true  },
                      { data: 'baki_kos', "sortable": true  },
                      { data: 'peruntukan_kos', "sortable": true  },
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

                if({{$type}}==1)
                {
                    var noc_selected = response.noc_data_jps; 
                }
                else
                {
                    var noc_selected = response.noc_data_agensy; 
                }
                console.log(noc_selected)
                if(noc_selected)
                {
                    for(var i = 0; i < noc_selected.length; i++)
                    {
                        let noc=parseInt(noc_selected[i].pp_id.replace(/'/g, ''));
                        addtoList(noc);
                    }
                }


              
     }

    function isDateBetween(startDate, endDate) {
        const currentDate = new Date(); 
        return startDate <= currentDate && currentDate <= endDate;
    }

    function loadProjeck(id)
    {
            var url = '{{ route("noc.loadProjeck", [":id"  , ":type"])}}'
            url = url.replace(':id', id);
            url = url.replace(':type', {{$type}});
            window.location.href = url;
    }

    function addtoList(id)
    { console.log(id)
        const storedArray = JSON.parse(localStorage.getItem("idArray")); console.log(storedArray);
        storedArray.push(id);
        localStorage.setItem("idArray", JSON.stringify(storedArray));

        $('#add_'+id).addClass('d-none');
        $('#delete_'+id).removeClass('d-none');
    }

    function deletefromList(id)
    {
        const storedArray = JSON.parse(localStorage.getItem("idArray")); console.log(storedArray);
        const indexToRemove = storedArray.indexOf(id);
        if (indexToRemove !== -1) {
            storedArray.splice(indexToRemove, 1);
            localStorage.setItem("idArray", JSON.stringify(storedArray));
        }
        $('#delete_'+id).addClass('d-none');
        $('#add_'+id).removeClass('d-none');
    }



    $("#simpan_btn").click(function(){

        const storedArray = JSON.parse(localStorage.getItem("idArray")); 
        var ProjectData=[];
        for(var i=0;i<storedArray.length;i++){ 
           var butiran = document.getElementById("butiran_"+storedArray[i]).innerText;
           var kod = document.getElementById("kod_"+storedArray[i]).innerText;
           var rujukan = document.getElementById("rujukan_"+storedArray[i]).innerText;
           var nama = document.getElementById("nama_"+storedArray[i]).innerText;
           var kos = document.getElementById("kos_"+storedArray[i]).innerText;
           ProjectData.push(`{"pp_id" : "`+storedArray[i]+ `","butiran" : "`+butiran+ `","kod" : "`+ kod+`","rujukan" : "`+rujukan+ `","nama" : "`+nama+ `","kos" : "`+kos+ `"}`);
        }


        var formData = new FormData();
        formData.append('user_id', {{Auth::user()->id}})
        formData.append('type',{{$type}})

        ProjectData.forEach((item) => {
            formData.append('project_array[]', item);
        });

        formData.append('noc_id',{{$id}} );

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        axios({
                    method: 'post',
                    url: api_url+"api/noc/addNOC-project",
                    responseType: 'json',
                    data: formData
            })
            .then(function (response) { 
                        console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        if(response.data.code == 200) {  
                            $('#add_role_sucess_modal').modal('show');

                            $("#tutup").click(function(){
                                var url = '{{ route("noc.seneraiNoc", [":id"])}}'
                                    url = url.replace(':id', {{$id}});
                                    window.location.href = url;
                            });
                        }   
                    }) 
                    .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    })
    })

</script>