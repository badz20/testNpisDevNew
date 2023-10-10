<script>
    $(document).ready(function () { 
                     
               
                     const api_token = "Bearer "+ window.localStorage.getItem('token');
                     const api_url = "{{env('API_URL')}}"; 
                     axios.defaults.headers.common["Authorization"] = api_token;
                     var bayaran_data = localStorage.getItem('bayaran_count'); 

     
                     $("div.spanner").addClass("show");
                     $("div.overlay").addClass("show");
                     axios({
                         method: 'get',
                         url: api_url+"api/perunding/get_borang_perunding/" + {{$project_id}}+"/" + {{$perolehan_id}} +"/" + bayaran_data,
                         responseType: 'json',            
                     })
                     .then(function (response) { console.log("perkara");
     
                       var perkara= response.data.data.perkara; console.log(perkara);
                       var project= response.data.data.project; console.log(project);
                       var bayaran= response.data.data.bayaran; //console.log(bayaran);
                       var yuran= response.data.data.yuran; //console.log(bayaran);
                       var bayaran_penjanjian_asal= response.data.data.bayaran_data; //console.log(bayaran);


                      document.getElementById("b_count").innerHTML = bayaran_data;
                      document.getElementById("no_bayaran").value = bayaran_data;
                      document.getElementById('kod_projek').value = project.pemantauan_project.kod_projeck;
                      document.getElementById('nama_project').value = project.pemantauan_project.nama_projek;
                      document.getElementById('nama_perunding').value = project.perolehan_project.nama_peruding;
                      document.getElementById('nama_perolehan').value = project.perolehan_project.nama_perolehan;
                      //document.getElementById('no_perjanjian').value = project.perolehan_project.nama_peruding;
                      document.getElementById('tarik_perunding').value = project.perolehan_project.tarikh_setuju_terima;

                     document.getElementById('perjanjian').value = number_format(bayaran_penjanjian_asal['penjanjian_asal']);


                      var sa= response.data.data.project.sa; console.log(sa);

                      loadSuppliementry(sa,yuran);
                      loadBorangaData(bayaran,bayaran_data);



                    //   if(bayaran['no_baucer']==0)
                    //   {
                    //       $('#simpan').removeClass('d-none');
                    //   }
                    //   else
                    //   {
                    //       $('#simpan').addClass('d-none');
                    //   }
    
     
     
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




                     $("#simpan").click(function(){ 

                        var formData = new FormData();
                        
                        formData.append('project_id', {{$project_id}})
                        formData.append('perolehan',{{$perolehan_id}});
                        var bayaran = document.getElementById("no_bayaran").value;
                        formData.append('user_id', {{Auth::user()->id}})
                        var bayaran_data = localStorage.getItem('bayaran_count'); 
                        formData.append('jumlah_bayaran',removecomma(document.getElementById("disyorkan").value));
                        formData.append('lad',removecomma(document.getElementById("lad_data").value));
                        formData.append('no_bayaran',bayaran_data);
                        formData.append('type',"borang");
                        formData.append('action',"Kemaskini Borang");


                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show");


                        const api_token = "Bearer "+ window.localStorage.getItem('token');
                        const api_url = "{{env('API_URL')}}"; 
                        axios.defaults.headers.common["Authorization"] = api_token;

                        axios({

                            method: 'POST',
                            url: api_url+"api/perunding/update_bayaran",
                            responseType: 'json',
                            data:formData,   
                            headers: {
                                "Content-Type": "application/json",
                                "Authorization": api_token,
                            },     
                        })
                        .then(function (result) {
                            //console.log(result.data)
                            if(result.data.status=='Success'){
                                $("#add_role_sucess_modal").modal('show')
                                $("#tutup").click(function(){
                                //var reload= location.reload();     
                                
                                     $("#add_role_sucess_modal").modal('hide')
                                     $("#global_sucess_modal").modal('show')

                            
                                })

                                $("#tutup-confirm").click(function(){
                                    // window.location.href = "/kewangan/borang-jps/"+{{$project_id}}+"/"+{{$perolehan_id}}
                                    location.reload();   
                                })
                            }

                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");

                        })
                        .catch(function (error) {
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                        })
                            //---------------------------------------------------------------------------------

                        });
    });


    function loadSuppliementry(suply,yuran)
    {
        let suplementaries = '';

        if(yuran.length > 0)
        {
            $.each(yuran, function(key, units) {
            let bil=key+1;
            suplementaries = suplementaries + '<label class="col-md-5 col-12 pemberat_subtitle" for="">Supplementary Agreement No. '+ bil +':</label>'+
                                '<span class="input-group-text Table_perunding_body Table_perunding_span" id="basic-addon1">RM</span>'+
                                '<input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body" id="supply_"'+bil+' value="'+number_format(units['supplier_data'])+'">'+'<br>';
            });
        }
        else
        {
            $.each(suply, function(key, units) {
            let bil=key+1;
            suplementaries = suplementaries + '<label class="col-md-5 col-12 pemberat_subtitle" for="">Supplementary Agreement No. '+ bil +':</label>'+
                                '<span class="input-group-text Table_perunding_body Table_perunding_span" id="basic-addon1">RM</span>'+
                                '<input disabled="" type="text" class="form-control col-md-4 col-9 Table_perunding_body" id="supply_"'+bil+' value="'+number_format(units['implikasi_kos'])+'">'+'<br>';
            });
        }
        

        $("#suplies").append(suplementaries);

    }

    function loadBorangaData(data,bayaran_data)
    {
        for(var i=0; i<data.length; i++)
        {
            console.log(data[i]);
            if(data[i].no_bayaran==bayaran_data)
            {

                document.getElementById("yuran_kumulatif").value=number_format(data[i].yuran_perunding);
                document.getElementById("imbuhan_kumulatif").value=number_format(data[i].inbuhan_balik);
                
                if(bayaran_data==1)
                {
                    document.getElementById("yuran_terdhahulu").value='0.00';
                    document.getElementById("imbuhan_terdhahulu").value='0.00';
                    document.getElementById("yuran_baki").value=number_format(data[i].yuran_perunding);
                    document.getElementById("imbuhan_baki").value=number_format(data[i].inbuhan_balik);
                }
                else
                {
                    var yuran_baki = parseFloat(data[i].yuran_perunding).toFixed(2)-parseFloat(data[i-1].yuran_perunding).toFixed(2);
                    var inbuhan_baki = parseFloat(data[i].inbuhan_balik).toFixed(2)-parseFloat(data[i-1].inbuhan_balik).toFixed(2);

                    document.getElementById("yuran_terdhahulu").value=number_format(data[i-1].yuran_perunding);
                    document.getElementById("imbuhan_terdhahulu").value=number_format(data[i-1].inbuhan_balik);
                    document.getElementById("yuran_baki").value=number_format(yuran_baki.toFixed(2));
                    document.getElementById("imbuhan_baki").value=number_format(inbuhan_baki.toFixed(2));
                }

                var yuran_total=document.getElementById("yuran_baki").value;
                var inbuhan_total=document.getElementById("imbuhan_baki").value;
                var sum= parseFloat(removecomma(yuran_total))+parseFloat(removecomma(inbuhan_total));
                document.getElementById("tot_baki").value=number_format(sum.toFixed(2));

                var percentage = (6/100) * sum; 
                document.getElementById("cukai_value").value=number_format(percentage.toFixed(2));

                var total= parseFloat(sum) + parseFloat(percentage);
                document.getElementById("disyorkan").value=number_format(total.toFixed(2));
                document.getElementById("lad_data").value=number_format(data[i].lad_value);

            }
        }
    }

    
    function removecomma(num){
      
      num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
      num=parseFloat(num,10);
      return num;
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


    function generateDoc()
    {

        const api_token = "Bearer "+ window.localStorage.getItem('token');
        const api_url = "{{env('API_URL')}}"; 
        axios.defaults.headers.common["Authorization"] = api_token;
        var bayaran_count = localStorage.getItem('bayaran_count'); //alert(bayaran_count);

        
      download_uri =  api_url+"api/export/generate-excel?project_id="+{{$project_id}}+"&perolehan_id="+{{$perolehan_id}}+"&bayran="+bayaran_count;
      filename=  'perunding.xlsx'
      axios({
        url: download_uri,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
        params: {
          user_id: {{Auth::user()->id}},
        },
      }).then((response) => {
        console.log(response.data.type);
        const url = window.URL.createObjectURL(response.data);
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(url);
      });
     

    }

</script>