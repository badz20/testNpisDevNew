<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script>
     $('#agensi_card').hide();
     
      function agensi_user(){ 
          $('#jps_card').hide();
          $('#agensi_card').show();
          document.getElementById("agency_btn").classList.add("active");
          document.getElementById("jps_btn").classList.remove("active");  
          //document.getElementById("pemberat_greenBtn").innerText = "SEKATAN";
          localStorage.setItem("noc_type", "0");
          $('#bilangan_noc_table').addClass('d-none');
          $('#bilangan_sekatan_table').removeClass('d-none');

          if({{$user}}==4)
          {
            document.getElementById("btn_projeck_jps").classList.add("d-none");
            document.getElementById("btn_kelulusan_jps").classList.add("d-none");
            document.getElementById("btn_togle_jps").classList.add("d-none"); 
            document.getElementById("btn_projeck").classList.remove("d-none");
            document.getElementById("btn_kelulusan").classList.remove("d-none"); 
            document.getElementById("btn_togle").classList.remove("d-none"); 
            $('#agensy_sec').addClass('d-none');
            $('#jps_sec').addClass('d-none');
          }   
          else
          {
            $('#agensy_sec').removeClass('d-none');
            $('#jps_sec').addClass('d-none');
          }     
      }
      function jps_user(){
          $('#jps_card').show();
          $('#agensi_card').hide(); 
          document.getElementById("jps_btn").classList.add("active");  
          document.getElementById("agency_btn").classList.remove("active"); 
          //document.getElementById("pemberat_greenBtn").innerText = "NOC";
          localStorage.setItem("noc_type", "1");
          $('#bilangan_noc_table').removeClass('d-none');
          $('#bilangan_sekatan_table').addClass('d-none');

          if({{$user}}==4)
          {
            document.getElementById("btn_projeck_jps").classList.remove("d-none");
            document.getElementById("btn_kelulusan_jps").classList.remove("d-none");
            document.getElementById("btn_togle_jps").classList.remove("d-none"); 
            document.getElementById("btn_projeck").classList.add("d-none");
            document.getElementById("btn_kelulusan").classList.add("d-none");
            document.getElementById("btn_togle").classList.add("d-none"); 
            $('#agensy_sec').addClass('d-none');
            $('#jps_sec').addClass('d-none');
          }
          else
          {
            $('#agensy_sec').addClass('d-none');
            $('#jps_sec').removeClass('d-none');
          }
      }

      function DisableButtons()
        {
            var input_field = document.querySelectorAll('input[type="text"]'); console.log(input_field);
            for (var k = 0; k < input_field.length; k++) {
                input_field[k].disabled = true;
            }

            var textarea = document.querySelectorAll('textarea'); 
            for (var n = 0; n < textarea.length; n++) {
                textarea[n].disabled = true;
            }

        }

        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });


    $(document).ready(function () { 

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
          url: api_url+"api/noc/list_projects/"+{{$id}},
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          success: function(response) {  
              //console.log(response)      
              loadDatatableJps(response);
              loadDatatableAgensi_user(response);

                if({{$user}}==4)
                { 
                    DisableButtons();
                    $('#agensy_sec').addClass('d-none');
                    $('#jps_sec').addClass('d-none');
                }   
                else
                {
                    $('#agensy_sec').removeClass('d-none');
                    $('#jps_sec').addClass('d-none');
                }  

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          },
          error: function(response) {
              //console.log(response);
          }
          }); 
    });

    function number_format($num)
    { 
        if(isNaN($num))
        {
          return '0.00';
        }
        else
        {
          if($num!=null && $num!='.00')
          {
            $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','); //console.log('after conversion'); console.log($abc);
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
                  data: response.noc_data,
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
                            render: function ( data, type, row, meta ) { //console.log(row)
                                if(type === 'display'){
                                    count=count+1; 
                                }
                                return count;
                            }
                        //   targets:0, // Start with the last
                        //   render: function ( data, type, row, meta ) { //console.log(row)
                        //         if(type === 'display'){
                        //             count='<i class="ri-indeterminate-circle-fill indeterminatebtn" onclick="removeRow(this,'+row.id+')"></i>'; 

                        //         }
                        //         return count;
                        //   }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data=row.kod_projeck;
                                }
                                return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=row.butiran_code;
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=row.nama_projek;
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=number_format(row.kos_projeck);
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=number_format(row.kos_projeck);
                              }
                              return data;
                          }
                      },
                      {
                        "targets": 6,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){

                                baki_kos='<label id="jps_baki">'+number_format(row.peruntukan.jumlah_kos)+'</label>';

                              }
                              return baki_kos;
                          }
                      },
                      {
                        "targets": 7,
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){

                                if(row.peruntukan_asal>0)
                                {
                                    $kos_asl=number_format(row.peruntukan_asal);
                                }
                                else
                                {
                                    $kos_asl=number_format(row.peruntukan.jumlah_kos);
                                }
                                asal_kos='<input type="hidden" id="jps_id" value="'+row.id+'"/><label id="jps_peruntukan_asal" >'+$kos_asl+'</label>';
                            }
                            return asal_kos;
                          }
                      },
                      {
                        "targets": 8,
                        render: function ( data, type, row, meta ) {

                                if(row.tambah>0)
                                {
                                    $kos_tamba=number_format(row.tambah);
                                }
                                else
                                {
                                    $kos_tamba='0.00';
                                }
                              if(type === 'display'){
                                    tamba='<input type="text" class="form-control pemberat_title text-center" onchange="calculatekos(this,1)" value="'+$kos_tamba+'" name="tamba" id="jps_tamba">';
                              }
                              return tamba;
                          }
                      },
                      {
                        "targets": 9,
                        render: function ( data, type, row, meta ) {
                                if(row.kurang>0)
                                {
                                    $kos_kurang=number_format(row.kurang);
                                }
                                else
                                {
                                    $kos_kurang='0.00';
                                }

                              if(type === 'display'){
                                    kurang='<input type="text" class="form-control pemberat_title text-center" onchange="calculatekos(this,2)" value="'+$kos_kurang+'" name="kurang" id="jps_kurang">';
                              }
                              return kurang;
                          }
                      },
                      {
                        "targets": 10,
                        render: function ( data, type, row, meta ) {
                            let html_Tamba='';
                            if(row.kurang>0)
                            {
                                if(row.kurang>0)
                                {
                                    html_Tamba = '<span style="color:red;" id="t_k_kos">'+'-'+row.kurang+'</span>';
                                }
                            }
                            else
                            {
                                if(row.tambah>0)
                                {
                                    html_Tamba = '<span id="t_k_kos">'+row.tambah+'</span>'; 
                                }
                            }

                              if(type === 'display'){
                                    tamba_kurang=html_Tamba;
                              }
                              return tamba_kurang;
                          }
                      },
                      {
                        "targets": 11,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    if(row.dipinda>0)
                                    {
                                        $kos_dipinda=number_format(row.dipinda);
                                    }
                                    else
                                    {
                                        $kos_dipinda='0.00';
                                    }
                                    dipinda='<label id="jps_dipinda" >'+$kos_dipinda+'</label>';
                              }
                              return dipinda;
                          }
                      },
                      {
                        "targets": 12,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                justifikasi='<textarea col="3" class="form-control pemberat_title text-center" name="jps_justifikasi" id="jps_justifikasi">'+row.justifikasi+'</textarea>';
                              }
                              return justifikasi;
                          }
                      },
                      {
                        "targets": 13,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                bahagian=row.bahagian_pemilik.acym;
                              }
                              return bahagian;
                          }
                      },
                      
                  ] , 
                  columns: [
                      
                      { data: 'count', "sortable": true},
                      { data: 'kod_projeck', "sortable": true  }, 
                      { data: 'butiran_code', "sortable": true},
                      { data: 'nama_projek' ,  "sortable": true },
                      { data: 'kos_projeck', "sortable": true  },   
                      { data: 'kos_projeck',  "sortable": true  },
                      { data: 'baki_kos', "sortable": true  },
                      { data: 'asal_kos', "sortable": true  },
                      { data: 'tamba', "sortable": true},
                      { data: 'kurang' ,  "sortable": true},
                      { data: 'tamba_kurang', "sortable": true },   
                      { data: 'dipinda',  "sortable": true},
                      { data: 'justifikasi', "sortable": true},
                      { data: 'bahagian', "sortable": true  },

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

                //custome buttons to datatables
                if({{$user}}==4)
                {
                    var toggleButton = $('<div id="btn_togle_jps">').addClass('toggle-button');
                    var slider = $('<div>').addClass('slider-data');
                    toggleButton.append(slider);
                    toggleButton.on('click', function() {
                        $(this).toggleClass('active');
                        if ($(this).hasClass('active')) {
                            console.log('Button toggled ON');
                        } else {
                            console.log('Button toggled OFF');
                        }
                    });
                    $('.dataTables_filter').after(toggleButton);
                    
                    var customButton = $('<button type="button" disabled id="btn_projeck_jps" onclick="confirmModel('+{{$id}}+')">')
                                        .html('<i class="ri-checkbox-circle-fill" style="font-size: 1.5em;color:#ffffff; vertical-align: middle;"></i> Kelulusan')
                                        .addClass('susun_pemberat mt-2');
                    // Insert the button between the search and filter elements
                    $('.dataTables_filter').after(customButton);

                    var customButton2 = $('<button type="button" id="btn_kelulusan_jps" onclick="loadProjeck('+{{$id}}+')">')
                                        .html('<i class="ri-add-circle-fill" style="font-size: 1.5em;color:#ffffff; vertical-align: middle;"></i> Projek')
                                        .addClass('pemberat_greenBtn_new mt-2');
                    // Insert the button between the search and filter elements
                    $('.dataTables_filter').after(customButton2);

                    if(response.noc_data.length > 0) {
                        document.getElementById('btn_projeck_jps').disabled = false;
                    }
                    else
                    {
                        document.getElementById('btn_projeck_jps').disabled = true;
                    }

                    $('#bkor_btn').addClass('d-none');
                }

                    //end
                    //sum of kos to hader
                    let sum = jps_table.column(4).data().reduce(function (a, b) {
                                    return parseFloat(a) + parseFloat(b);
                                }, 0);
                    document.getElementById('jps_kos_sum').innerHTML = number_format(sum);

                    let sum1 = jps_table.column(5).data().reduce(function (a, b) { //console.log(a); console.log(b);
                                    return parseFloat(a) + parseFloat(b);
                                }, 0);
                    document.getElementById('jps_keseluruhan_sum').innerHTML = number_format(sum1);

                    let peruntukan_asl_total = 0;
                    let peruntukan_asal_tot = document.querySelectorAll("[id='jps_peruntukan_asal']");
                    findTotalText('jps_peruntukan_sum',peruntukan_asal_tot);
                    let tamba_tot = document.querySelectorAll("[id='jps_tamba']"); 
                    findTotalValue('jps_tambah_sum',tamba_tot);
                    let kurang_tot = document.querySelectorAll("[id='jps_kurang']");
                    findTotalValue('jps_kurang_sum',kurang_tot);
                    let baki_tot = document.querySelectorAll("[id='jps_baki']"); 
                    findTotalText('jps_baki_sum',baki_tot);
                    let t_k_kos = document.querySelectorAll("[id='t_k_kos']"); 
                    findTotalText('jps_tamba_kurang_sum',t_k_kos);

                    let sum7 = jps_table.column(11).data().reduce(function (a, b) {
                                    return parseFloat(a) + parseFloat(b);
                                }, 0);
                    document.getElementById('jps_dipinda_sum').innerHTML = number_format(sum7);
                    
                    //end

                    

    }

    function findTotalText(type, value)
    {
        let sum=0;
        for (let i = 0; i < value.length; i++)
        { 
                if(removecomma(value[i].innerText) !=0)
                {
                    sum=sum+removecomma(value[i].innerText);
                }
                else
                {
                    sum=sum;
                } 
        }
        document.getElementById(type).innerText=number_format(sum);
    }

    function findTotalValue(type, value)
    {
        let sum=0;
        for (let i = 0; i < value.length; i++)
        { 
                if(removecomma(value[i].value) !=0)
                {
                    sum=sum+removecomma(value[i].value);
                }
                else
                {
                    sum=sum;
                } 
        }
        document.getElementById(type).innerText=number_format(sum);
    }

    function calculatekos(textid,type){ 
        var listItemId = $(textid).closest('tr'); //console.log(listItemId)
        var jumlah_tamba = 0;
        var jumlah_kurang = 0;
        var jumlah_kelulusan= 0;
        let html_Tamba = '';

        var tamba_value = listItemId. find('td:eq(8) input[type="text"]'). val();  //console.log(tamba_value);
        var kurang_value = listItemId. find('td:eq(9) input[type="text"]').val();  //console.log(kurang_value);
        var asal_value = listItemId. find('td:eq(7) label')[0].innerText; //console.log(asal_value);
        var tamba_kurang = listItemId. find('td:eq(10)')[0]; //console.log(tamba_kurang);
        var peruntukan_dipanda = listItemId. find('td:eq(11) label')[0]; //console.log(tamba_kurang);

        if(type==1)
        {
            if(removecomma(tamba_value)>0 && removecomma(asal_value)>0)
            {
                jumlah_kelulusan = removecomma(tamba_value) + removecomma(asal_value);
            }
            html_Tamba = tamba_value; 
            listItemId. find('td:eq(9) input[type="text"]').val('0.00')
        }
        else
        {
            if(removecomma(kurang_value)>0 && removecomma(asal_value)>0)
            {
                jumlah_kelulusan = removecomma(asal_value) - removecomma(kurang_value);
            }
            html_Tamba = '<span style="color:red;">'+'-'+kurang_value+'</span>';
            listItemId. find('td:eq(8) input[type="text"]').val('0.00')
        }

        tamba_kurang.innerHTML = html_Tamba;
        peruntukan_dipanda.innerText = jumlah_kelulusan;

    }

    function removecomma(num){ //alert(num)
               if(num != null || typeof num !== 'undefined') 
               {
                num = num.toString()
                num= num.replace(/\,/g,''); // 1125, but a string, so convert it to number
                num=parseFloat(num,10);
               }
               else
               {
                num='0.00';
               }
                return num;
    }

    function isDateBetween(startDate, endDate) {
        const currentDate = new Date(); 
        return startDate <= currentDate && currentDate <= endDate;
    }

    function loadProjeck(id)
    {
            var url = '{{ route("noc.loadProjeck", [":id"])}}'
            url = url.replace(':id', id);
            window.location.href = url;
    }

    function confirmModel(id)
    {
        $('#pop_section').removeClass('d-none');
        $('#exampleModal').modal('show');
    }

    function loadDatatableAgensi_user(response)
    {
        var count=0;
        var agency_table =$('#agensi_user').DataTable({
                  data: response.noc_data,
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
                  columnDefs: [
                    {
                            targets:0, // Start with the last
                            render: function ( data, type, row, meta ) { //console.log(row)
                                if(type === 'display'){
                                    count=count+1; 
                                }
                                return count;
                            }
                        //   targets:0, // Start with the last
                        //   render: function ( data, type, row, meta ) { //console.log(row)
                        //         if(type === 'display'){
                        //             count='<i class="ri-indeterminate-circle-fill indeterminatebtn" onclick="removeRow(this,'+row.id+')"></i>'; 

                        //         }
                        //         return count;
                        //   }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data=row.kod_projeck;
                                }
                                return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=row.butiran_code;
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=row.nama_projek;
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      status="Wang Covid";
                              }
                              return status;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=number_format(row.kos_projeck);
                              }
                              return data;
                          }
                      },
                      {
                          targets:6, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=number_format(row.kos_projeck);
                              }
                              return data;
                          }
                      },
                      {
                        "targets": 7,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){

                                baki_kos='<label id="agensy_baki">'+number_format(row.peruntukan.jumlah_kos)+'</label>';

                              }
                              return baki_kos;
                          }
                      },
                      {
                        "targets": 8,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){

                                   if(row.peruntukan_asal>0)
                                   {
                                      $kos_asl=number_format(row.peruntukan_asal);
                                   }
                                   else
                                   {
                                        $kos_asl=number_format(row.peruntukan.jumlah_kos);
                                   }
                                    asal_kos='<input type="hidden" id="agensy_id" value="'+row.id+'"/><label id="agensy_peruntukan_asal" >'+$kos_asl+'</label>';
                              }
                              return asal_kos;
                          }
                      },
                      {
                        "targets": 9,
                        render: function ( data, type, row, meta ) {

                                if(row.kurang>0)
                                {
                                    $kos_kurang=number_format(row.kurang);
                                }
                                else
                                {
                                    $kos_kurang='0.00';
                                }

                                if(type === 'display'){
                                        kurang='<input type="text" class="form-control pemberat_title text-center" onchange="calculatekos(this,2)" value="'+$kos_kurang+'" name="kurang" id="agensy_kurang">';
                                }
                                return kurang;
                          }
                      },
                      {
                        "targets": 10,
                        render: function ( data, type, row, meta ) {
                                let html_Tamba='';

                                if(row.kurang>0)
                                {
                                        html_Tamba = '<span style="color:red;" id="t_k_kos">'+'-'+row.kurang+'</span>';
                                }
                                else
                                {
                                        html_Tamba = '<span style="color:red;" id="t_k_kos">'+'0.00'+'</span>';
                                }
                                

                                if(type === 'display'){
                                        tamba_kurang=html_Tamba;
                                }
                                return tamba_kurang;
                          }
                      },
                      {
                        "targets": 11,
                        render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        if(row.dipinda>0)
                                        {
                                            $kos_dipinda=number_format(row.dipinda);
                                        }
                                        else
                                        {
                                            $kos_dipinda='0.00';
                                        }
                                        dipinda='<label id="agensy_dipinda" >'+$kos_dipinda+'</label>';
                                }
                                return dipinda;
                          }
                      },
                      {
                        "targets": 12,
                        render: function ( data, type, row, meta ) {
                             if(type === 'display'){
                                justifikasi='<textarea col="3" class="form-control pemberat_title text-center" name="agensy_justifikasi" id="agensy_justifikasi">'+row.justifikasi+'</textarea>';
                              }
                              return justifikasi;
                          }
                      },
                      {
                        "targets": 13,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                bahagian=row.bahagian_pemilik.acym;
                              }
                              return bahagian;
                          }
                      },
                      
                  ] , 
                  columns: [
                      
                      { data: 'count', "sortable": true},
                      { data: 'kod_projeck', "sortable": true  }, 
                      { data: 'butiran_code', "sortable": true},
                      { data: 'nama_projek' ,  "sortable": true },
                      { data: 'id'},
                      { data: 'kos_projeck', "sortable": true  },   
                      { data: 'kos_projeck',  "sortable": true  },
                      { data: 'baki_kos', "sortable": true  },
                      { data: 'asal_kos', "sortable": true  },
                      { data: 'kurang' ,  "sortable": true},
                      { data: 'tamba_kurang', "sortable": true},   
                      { data: 'dipinda',  "sortable": true },
                      { data: 'justifikasi', "sortable": true  },
                      { data: 'bahagian', "sortable": true  },

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

                if({{$user}}==4)
                {

                    var toggleButton = $('<div id="btn_togle">').addClass('toggle-button');
                    var slider = $('<div>').addClass('slider-data');
                    toggleButton.append(slider);
                    toggleButton.on('click', function() {
                        $(this).toggleClass('active');
                        if ($(this).hasClass('active')) {
                            console.log('Button toggled ON');
                        } else {
                            console.log('Button toggled OFF');
                        }
                    });
                    $('.dataTables_filter').after(toggleButton);
                    
                    var customButton = $('<button type="button"  id="btn_kelulusan" onclick="confirmModel('+{{$id}}+')">')
                                        .html('<i class="ri-checkbox-circle-fill" style="font-size: 1.5em;color:#ffffff; vertical-align: middle;"></i> Kelulusan')
                                        .addClass('susun_pemberat mt-2');
                    // Insert the button between the search and filter elements
                    $('.dataTables_filter').after(customButton);

                    var customButton2 = $('<button type="button" id="btn_projeck" onclick="loadProjeck('+{{$id}}+')">')
                                        .html('<i class="ri-add-circle-fill" style="font-size: 1.5em;color:#ffffff; vertical-align: middle;"></i> Projek')
                                        .addClass('pemberat_greenBtn_new mt-2');
                    // Insert the button between the search and filter elements
                    $('.dataTables_filter').after(customButton2);

                    document.getElementById("btn_projeck").classList.add("d-none");
                    document.getElementById("btn_kelulusan").classList.add("d-none");
                    document.getElementById("btn_togle").classList.add("d-none"); 
                    $('#bkor_btn').addClass('d-none');
                    
                }

                    let sum = agency_table.column(5).data().reduce(function (a, b) {
                                    return parseFloat(a) + parseFloat(b);
                                }, 0);
                    document.getElementById('agensi_kos_sum').innerHTML = number_format(sum);
                    let sum1 = agency_table.column(6).data().reduce(function (a, b) {
                                    return parseFloat(a) + parseFloat(b);
                                }, 0);
                    document.getElementById('agensi_keseluruhan_sum').innerHTML = number_format(sum1);

                    

                    

    }

    $("#tidak_btn").click(function(){
        $('#exampleModal').modal('hide');
        $('#pop_section').addClass('d-none');
    })

    $("#ya_btn").click(function(){
        $('#exampleModal').modal('hide');
        $('#pop_section').addClass('d-none');

        var formData = new FormData();
        formData.append('noc_id', {{$id}});
        formData.append('status',41);

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        axios({
                    method: 'post',
                    url: api_url+"api/noc/update_noc_status",
                    responseType: 'json',
                    data: formData
            })
            .then(function (response) { 
                        //console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        var url = '{{ route("noc.loadKementerianSilling", [":id"])}}'
                            url = url.replace(':id', {{$id}});
                            window.location.href = url;
            }) 
            .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
            })

    })

    $("#addpopbtn").click(function(){
            document.getElementById('exampleModal2').style.visibility = 'visible';
          $('#exampleModal2').modal('show');
    })

    $("#reset").click(function(){
        location.reload();
    })

    function removeRow(element,id)
    {
        var formData = new FormData();
        formData.append('noc_id', id);

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        axios({
                    method: 'post',
                    url: api_url+"api/noc/deleteNOC",
                    responseType: 'json',
                    data: formData
            })
            .then(function (response) { 
                        //console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        element.parentNode.parentNode.remove();   
            }) 
            .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
            })
    }


    $("#simpan").click(function(){
            
        var bilangan= document.getElementById('bilangan').value;
        var tahun= document.getElementById('tahun').value;
        var tarikh_buka= document.getElementById('tarikh_buka').value;
        var tarikh_tutup= document.getElementById('tarikh_tutup').value;

        if(bilangan=='')
        {
            document.getElementById('bilangan_error').innerText="Sila pilih bilangan";
            document.getElementById('bilangan').focus();
            return false;
        }
        document.getElementById('bilangan_error').innerText="";

        if(tahun=='')
        {
            document.getElementById('tahun_error').innerText="Sila pilih tahun";
            document.getElementById('tahun').focus();
            return false;
        }
        document.getElementById('tahun_error').innerText="";

        if(tahun.length !=4 )
        {
            document.getElementById('tahun_error').innerText="Sila masukkan tahun yang sah";
            document.getElementById('tahun').focus();
            return false;
        }
        document.getElementById('tahun_error').innerText="";

        if(tarikh_buka=='')
        {
            document.getElementById('tarikh_buka_error').innerText="Sila pilih tarikh_buka";
            document.getElementById('tarikh_buka').focus();
            return false;
        }
        document.getElementById('tarikh_buka_error').innerText="";

        if(tarikh_tutup=='')
        {
            document.getElementById('tarikh_tutup_error').innerText="Sila pilih tarikh_tutup";
            document.getElementById('tarikh_tutup').focus();
            return false;
        }
        document.getElementById('tarikh_tutup_error').innerText="";

        var formData = new FormData();
        formData.append('bilangan', bilangan);
        formData.append('tahun', tahun);
        formData.append('tarikh_buka', tarikh_buka);
        formData.append('tarikh_tutup', tarikh_tutup);
        formData.append('type', localStorage.getItem('noc_type'));
        formData.append('user_id', {{Auth::user()->id}})

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        axios({
                    method: 'post',
                    url: api_url+"api/noc/addNOC",
                    responseType: 'json',
                    data: formData
            })
            .then(function (response) { 
                        //console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        if(response.data.code == 200) {  
                            $('#add_role_sucess_modal').modal('show');

                            $("#tutup").click(function(){
                                location.reload();
                            });
                        }
                        else 
                        {
                            document.getElementById('error').innerHTML ='NOc telah pun didaftarkan antara tarikh-tarikh ini. Sila pilih tarikh lain';
                            return false;
                        }    
                    }) 
                    .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    })


    })

    $("#simpan_btn").click(function(){
        var formData = new FormData();

        let txt_id = document.querySelectorAll("[id='jps_id']");  //console.log(txt_id);
        let peruntukan_asal = document.querySelectorAll("[id='jps_peruntukan_asal']"); //console.log(peruntukan_asal);
        let tamba = document.querySelectorAll("[id='jps_tamba']"); //console.log(tamba);
        let kurang = document.querySelectorAll("[id='jps_kurang']"); //console.log(kurang);
        let dipinda = document.querySelectorAll("[id='jps_dipinda']"); //console.log(dipinda);
        let jps_justifikasi = document.querySelectorAll("[id='jps_justifikasi']"); //console.log(jps_justifikasi);

        noc_jps_data = []  
        for (var i = 0;i < txt_id.length; i++) {                         
            data= {};

            data.id=txt_id[i].value;


            if(isNaN(removecomma(peruntukan_asal[i].innerText))){
                data.peruntukan_asal = 0;
            }
            else{
                data.peruntukan_asal = removecomma(peruntukan_asal[i].innerText);
            }

            if(isNaN(removecomma(tamba[i].value))){
                data.tamba = 0;
            }
            else{
                data.tamba = removecomma(tamba[i].value);
            }

            if(isNaN(removecomma(kurang[i].value))){
                data.kurang = 0;
            }
            else{
                data.kurang = removecomma(kurang[i].value)
            }

            if(isNaN(removecomma(dipinda[i].innerText))){
                data.dipinda = 0;
            }
            else{
                data.dipinda = removecomma(dipinda[i].innerText)
            }
            
            //data.jumlahkos = removecomma(alljumlahkos[i].value);
            data.jps_justifikasi = jps_justifikasi[i].value;
            noc_jps_data.push(JSON.stringify(data))
        }

        //console.log(noc_jps_data);

        noc_jps_data.forEach((item) => {
            formData.append('noc_jps_data[]', item);
        });

        formData.append('user_id', {{Auth::user()->id}})

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

         axios({
                    method: 'post',
                    url: api_url+"api/noc/updateBilanganData",
                    responseType: 'json',
                    data: formData
                })
                .then(function (response) { 
                        //console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");


                            $('#add_role_sucess_modal').modal('show');

                            $("#tutup").click(function(){
                                location.reload();
                            }); 
                }) 
                .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                })

        })

        $("#simpan_agensy_btn").click(function(){
        var formData = new FormData();

        let txt_id = document.querySelectorAll("[id='agensy_id']");  //console.log(txt_id);
        let peruntukan_asal = document.querySelectorAll("[id='agensy_peruntukan_asal']"); //console.log(peruntukan_asal);
        let kurang = document.querySelectorAll("[id='agensy_kurang']"); //console.log(kurang);
        let dipinda = document.querySelectorAll("[id='agensy_dipinda']"); //console.log(dipinda);
        let jps_justifikasi = document.querySelectorAll("[id='agensy_justifikasi']"); //console.log(jps_justifikasi);

        noc_agensy_data = []  
        for (var i = 0;i < txt_id.length; i++) {                         
            data= {};

            data.id=txt_id[i].value;


            if(isNaN(removecomma(peruntukan_asal[i].innerText))){
                data.peruntukan_asal = 0;
            }
            else{
                data.peruntukan_asal = removecomma(peruntukan_asal[i].innerText);
            }

            if(isNaN(removecomma(kurang[i].value))){
                data.kurang = 0;
            }
            else{
                data.kurang = removecomma(kurang[i].value)
            }

            if(isNaN(removecomma(dipinda[i].innerText))){
                data.dipinda = 0;
            }
            else{
                data.dipinda = removecomma(dipinda[i].innerText)
            }
            
            //data.jumlahkos = removecomma(alljumlahkos[i].value);
            data.jps_justifikasi = jps_justifikasi[i].value;
            noc_jps_data.push(JSON.stringify(data))
        }

        //console.log(noc_jps_data);

        noc_jps_data.forEach((item) => {
            formData.append('noc_jps_data[]', item);
        });

        formData.append('user_id', {{Auth::user()->id}})

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        //  axios({
        //             method: 'post',
        //             url: api_url+"api/noc/updateBilanganData",
        //             responseType: 'json',
        //             data: formData
        //         })
        //         .then(function (response) { 
        //                 console.log(response)
        //                 $("div.spanner").removeClass("show");
        //                 $("div.overlay").removeClass("show");


        //                     $('#add_role_sucess_modal').modal('show');

        //                     $("#tutup").click(function(){
        //                         location.reload();
        //                     }); 
        //         }) 
        //         .catch(function (error) {
        //                 $("div.spanner").removeClass("show");
        //                 $("div.overlay").removeClass("show");
        //         })

        })
        

    
</script>