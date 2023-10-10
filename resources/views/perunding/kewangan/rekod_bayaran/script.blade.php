<script>

$(document).ready(function () { 

    const api_token = "Bearer "+ window.localStorage.getItem('token');
    const api_url = "{{env('API_URL')}}"; 
    axios.defaults.headers.common["Authorization"] = api_token;

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
                
           axios({
                    method: 'get',
                    url: api_url+"api/perunding/list_bayaran/"+ {{$project_id}}+"/" + {{$perolehan_id}},
                    responseType: 'json',            
                })
                .then(function (response) { console.log("bayaran");

                  var bayaran= response.data.data.bayaran; console.log(response.data.data);
                    var perolehan = response.data.data.perolehan
                    console.log(perolehan.selesai_status);
                if(perolehan.selesai_status == 1) {
                    document.getElementById('selesai_checkbox').checked = true
                    document.getElementById('bayaran_btn').disabled = true
                }else {
                    document.getElementById('selesai_checkbox').checked = false
                    document.getElementById('bayaran_btn').disabled = false
                }
                  if(bayaran.length>0){

                    for(let i=0;i<bayaran.length;i++){

                      let bayaran_date = '';
                      let bayaran_baucher = '';

                      if(bayaran[i].tarik_baucer!=null)
                      {
                        bayaran_date=bayaran[i].tarik_baucer;
                      }
                      if(bayaran[i].no_baucer!=null && bayaran[i].no_baucer!='0')
                      {
                        bayaran_baucher=bayaran[i].no_baucer;
                      }


                      if(bayaran_baucher!='')
                      {
                        $("#table_bayaran").append(
                            '<tr class="border">'+
                            '<td class="border text-center" onClick="loadBayaran('+bayaran[i].no_bayaran+')">'+bayaran[i].no_bayaran+'</td>'+
                            '<td class="border text-right" onClick="loadBayaran('+bayaran[i].no_bayaran+')" id="yuran_perunding">'+number_format(bayaran[i].yuran_perunding)+'</td>'+
                            '<td class="border text-right" onClick="loadBayaran('+bayaran[i].no_bayaran+')" id="inbuhan_balik">'+number_format(bayaran[i].inbuhan_balik)+'</td>'+
                            '<td class="border text-right" onClick="loadBayaran('+bayaran[i].no_bayaran+')" id="cukai_perkhidmatan">'+number_format(bayaran[i].cukai_perkhidmatan)+'</td>'+
                            '<td class="border text-right" onClick="loadBayaran('+bayaran[i].no_bayaran+')" id="jumlah_bayaran">'+number_format(bayaran[i].jumlah_bayaran)+'</td>'+
                            '<td class="border text-center" onClick="loadBayaran('+bayaran[i].no_bayaran+')" id="tarik_baucer">'+bayaran_date+'</td>'+
                            '<td class="border text-center" onClick="loadBayaran('+bayaran[i].no_bayaran+')" id="no_baucer">'+bayaran_baucher+'</td>'+
                            '</tr>'
                        )
                      }    
                    }

                    localStorage.setItem("bayaran_count",bayaran.length);

                  }
                  else
                  {
                    $("#table_bayaran").append(
                            '<tr class="border">'+
                            '<td class="border" colspan="6" style="text-align: center;">'+"Tiada rekod dijumpai"+'</td>'+
                            '</tr>'
                        )
                    
                    localStorage.setItem("bayaran_count",0);

                  }

                  let html = `<tr class="perunding_tableContent"
                                        style="background-color: #39AFD1; color: #fff; text-align: left;">
                                        <td colspan="7">Jumlah Kumulatif (RM)</td>
                                    </tr>`;
                
                    $("#table_bayaran").append(html);

                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");

                });

                let bayaran =  localStorage.getItem('bayaran_count'); //alert(bayaran)

                axios({
                    method: 'get',
                    url: api_url+"api/perunding/get_history/"+ {{$project_id}}+"/" + {{$perolehan_id}}+"/" + bayaran,
                    responseType: 'json',            
                })
                .then(function (response) { //console.log("bayaran");
                  loadBayaranHistory(response)
                });

   
    $("#bayaran_btn").click(function(){ 

        $("#add_role_sucess_modal").modal('show');

            $("#tutup-global").click(function(){

                let bayaran =  localStorage.getItem('bayaran_count'); //alert(bayaran)
                const api_token = "Bearer "+ window.localStorage.getItem('token');
                const api_url = "{{env('API_URL')}}"; 
                axios.defaults.headers.common["Authorization"] = api_token;

                var formData = new FormData();

                formData.append('project_id', {{$project_id}})
                formData.append('perolehan',{{$perolehan_id}});
                formData.append('no_bayaran', bayaran)
                formData.append('user_id', {{Auth::user()->id}})
                formData.append('action',"Tambah Bayaran");




                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                        
                axios({
                            method: 'post',
                            url: api_url+"api/perunding/add_bayaran",
                            responseType: 'json',
                            data:formData,   
                            headers: {
                                "Content-Type": "application/json",
                                "Authorization": api_token,
                            },            
                        })
                        .then(function (response) { console.log("bayaran"); console.log(response.data);
                           
                        $("#add_role_sucess_modal").modal('hide');

                        if(response.data.code==200)
                        {
                            var bayaran= response.data.data; console.log(bayaran);
                            localStorage.setItem("bayaran_count",bayaran.no_bayaran);
                            loadBayaran(bayaran.no_bayaran);

                        }
                        else
                        {
                            $("#global_sucess_modal").modal('show');

                            $("#tutup-confirm").click(function(){
                                location.reload();
                            });

                            // var base_url = window.location.origin;
                            // var url = '{{ route("perunding.lejarBayaran", [":pid" , ":pero_id"])}}'
                            // url = url.replace(":pid", {{$project_id}})
                            // url = url.replace(":pero_id", {{$perolehan_id}})
                            // window.location.href = url

                        }


                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        });

            });

            $("#close-global").click(function(){
                location.reload();
            });


        

    });
    

});

function handleCheckboxSelesaiChange(checkbox) {
    selesai = false; 
    if (checkbox.checked) {
        selesai = true;
    }

    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');

    axios.defaults.headers.common["Authorization"] = api_token

    var formData = new FormData();
    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('perolehan_id', "{{$perolehan_id}}")
    formData.append('pemantauan_id', "{{$project_id}}")
    formData.append('selesai', selesai)

    axios({
            method: 'post',
            url: api_url + "api/perunding/rekord_bayaran_selesai",
            responseType: 'json',
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                // location.reload();
                // $("#add_role_sucess_modal").modal('show');
                // $("#tutup").click(function() {
                    location.reload();
                // })
            } else {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

                if (response.data.code == 400) {
                    alert(response.data.message)
                } else {
                    alert('error while saving project')
                }

            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

}

function loadBayaran(no_bayaran) { 

        localStorage.setItem("bayaran_count",no_bayaran);

        var base_url = window.location.origin;
            //var url = base_url + '/' + data;
            var url = '{{ route("perunding.imbuhanBalik", [":pid" , ":pero_id"])}}'
            url = url.replace(":pid", {{$project_id}})
            url = url.replace(":pero_id", {{$perolehan_id}})
            window.location.href = url
}

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

function loadBayaranHistory(response)
            { console.log(response)
                var jps_table =$('#rekod_bayaran_table').DataTable({     
                        data: response.data.data,
                        dom: "Blfrtip",
                        "aaSorting": [],
                        "language": {
                                            "lengthMenu": "Papar _MENU_ Entri",
                                            "zeroRecords": "Tiada rekod dijumpai",
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
                                        pagingType: 'full_numbers',
                                        columnDefs: [
                            {
                                targets:0, // Start with the last
                                render: function ( data, type, row, meta ) { console.log(row)
                                    if(type === 'display'){
                                        data='<div class="d-flex">'+  row.id + '</div>';
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:1, // Start with the last
                                render: function ( data, type, row, meta ) {
                                        if(type === 'display')
                                        {
                                            data = '';
                                            if(row.tarikh!==null)
                                            {
                                                data=row.tarikh 
                                            }
                                        }
                                        return data;
                                }
                            },
                            {
                                targets:2, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.name!==null)
                                            {
                                                data=row.nama 
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:3, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.bahagian_kod!==null)
                                            {
                                                data= row.bahagian_kod 
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:4, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.tindakan!==null)
                                            {
                                                data=row.tindakan
                                            }
                                        }
                                    return data;
                                    }
                            }
                        ] , 
                        columns: [
                            
                            { data: 'id', "sortable": true},
                            { data: 'tarikh', "sortable": true  }, 
                            { data: 'nama', "sortable": true},
                            { data: 'bahagian_kod' ,  "sortable": true },
                            { data: 'tindakan', "sortable": true  },
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
            }

    $('#tutup_pop').on('click', function(){
        $("#exampleModal3").modal('hide');
        $('.modal-backdrop').hide();
    });
</script>