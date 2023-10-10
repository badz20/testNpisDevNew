<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script>
     $('#agensi_card').hide();
      function agensi_user(){
          $('#jps_card').hide();
          $('#agensi_card').show();
          document.getElementById("agency_btn").classList.add("active");
          document.getElementById("jps_btn").classList.remove("active");  
          document.getElementById("pemberat_greenBtn").innerText = "SEKATAN";
          localStorage.setItem("noc_type", "0");
          $('#bilangan_noc_table').addClass('d-none');
          $('#bilangan_sekatan_table').removeClass('d-none');
      }
      function jps_user(){
          $('#jps_card').show();
          $('#agensi_card').hide(); 
          document.getElementById("jps_btn").classList.add("active");  
          document.getElementById("agency_btn").classList.remove("active"); 
          document.getElementById("pemberat_greenBtn").innerText = "NOC";
          localStorage.setItem("noc_type", "1");
          $('#bilangan_noc_table').removeClass('d-none');
          $('#bilangan_sekatan_table').addClass('d-none');
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

        if({{$user}}!=4)
        {
           $('#addpopbtn').addClass('d-none');
        }
        

        document.getElementById('bilangan').disabled=true;
        document.getElementById('tahun').value=new Date().getFullYear();

        document.getElementById('exampleModal2').style.visibility = 'hidden';
        localStorage.setItem("noc_type", "1");

       $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        
        var va = {'va':1}; 
        var mini_va = {'va':2}; 

        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        
        $.ajax({
          type: "GET",
          url: api_url+"api/noc/list_noc",
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          data:va,
          success: function(response) {  
              //console.log(response)      
              
              loadDatatableJps(response);
                var table = document.getElementById("bilangan_noc_table");
                // Clear existing rows (except header row)
                while (table.rows.length > 1) {
                    table.deleteRow(1);
                }

                for(let i = 0; i <response.data.length; i++) { //console.log(response.data[i]);

                    let html = `<tr>
                                    <td class="NOCtblKodprojek">`+(i+1)+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].bilangan+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].tahun+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].tarikh_buka+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].tarikh_tutup+`</td>
                                </tr>`;
                    $('#bilangan_noc_table').append(html);
                }

                if(response.data)
                { console.log('a'); console.log(response.data.length)
                   var length= (response.data.length)+1;
                }
                else
                {  console.log('b');
                    var length= 1;
                }

                console.log(length);

                document.getElementById('bilangan').value='NOC Bilangan '+length;
          },
          error: function(response) {
              //console.log(response);
          }
          }); 

          $.ajax({
            type: "GET",
            url: api_url+"api/noc/list_noc",
            dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
          data:mini_va,
          success: function(response) { 
            //console.log(response.data)
            loadDatatableAgensi_user(response);

            var table = document.getElementById("bilangan_sekatan_table");
                // Clear existing rows (except header row)
                while (table.rows.length > 1) {
                    table.deleteRow(1);
                }

                for(let i = 0; i <response.data.length; i++) {

                    let html = `<tr>
                                    <td class="NOCtblKodprojek">`+(i+1)+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].bilangan+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].tahun+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].tarikh_buka+`</td>
                                    <td class="NOCtblKodprojek">`+response.data[i].tarikh_tutup+`</td>
                                </tr>`;
                    $('#bilangan_sekatan_table').append(html);
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
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    data=row.bilangan;
                                }
                                return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=row.tahun;
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=row.tarikh_buka;
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=row.tarikh_tutup;
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                const startDate = new Date(row.tarikh_buka); 
                                const endDate = new Date(row.tarikh_tutup); 

                                if (isDateBetween(startDate, endDate)) {
                                    data= "Dalam Tindakan EPU";
                                } else {
                                    data="LULUS";
                                }
                              }
                              return data;
                          }
                      },
                      {
                        "targets": 6,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){

                                const startDate = new Date(row.tarikh_buka); 
                                const endDate = new Date(row.tarikh_tutup); 

                                if (isDateBetween(startDate, endDate)) {
                                    data= '<i class="ri-checkbox-blank-circle-fill mr-1 nocstatusgreen"></i>' +"Dibuka";
                                } else {
                                    data= '<i class="ri-checkbox-blank-circle-fill mr-1 nocstatusgrey"></i>'+"Ditutup";
                                }

                              }
                              return data;
                          }
                      },
                      
                  ] , 
                  columns: [
                      
                      { data: 'count', "sortable": true},
                      { data: 'bilangan', "sortable": true  }, 
                      { data: 'tahun', "sortable": true},
                      { data: 'tarikh_buka' ,  "sortable": true },
                      { data: 'tarikh_tutup', "sortable": true  },   
                      { data: 'status_permohonan',  "sortable": true  },
                      { data: 'status', "sortable": true  },

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
              
                $('#jps_user tbody').on('click', 'tr', function () {
                    var data = jps_table.row(this).data(); console.log(data);
                    var user_type = {{$user}};

                    if(user_type == 4 && data.status>=41)
                    {
                        var url = '{{ route("noc.loadKementerianSilling", [":id"])}}'
                            url = url.replace(':id', data.id);
                            window.location.href = url;
                    }
                    else
                    {
                        var url = '{{ route("noc.seneraiNoc", [":id"])}}'
                        url = url.replace(':id', data.id);

                        const startDate = new Date(data.tarikh_buka); 
                        const endDate = new Date(data.tarikh_tutup); 

                        if (isDateBetween(startDate, endDate)) {
                            window.location.href = url;
                        }

                    }
                });

    }

    function isDateBetween(startDate, endDate) {
        const currentDate = new Date(); 
        return startDate <= currentDate && currentDate <= endDate;
    }

    function loadView(id)
    { //console.log(id)
            localStorage.setItem("isVEclicked", "");
            var url = '{{ route("vm.loadRingkasan", [":kod" , ":type"])}}'

            url = url.replace(':type', "VA");
            url = url.replace(':kod', id);
            window.location.href = url;
    }

    function loadDatatableAgensi_user(response)
    {
        var count=0;
        var agency_table =$('#agensi_user').DataTable({
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
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                // console.log(row.bahagian.nama_bahagian==null)
                                if(type === 'display')
                                {
                                    var modifiedString = row.bilangan.replace("NOC ", "SEKATAN ");
                                    data=modifiedString;
                                }
                                return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=row.tahun;
                              }
                              return data;
                          }
                      },
                      {
                          targets:3, // Start with the last
                          render: function ( data, type, row, meta ) {
                            //   console.log(row.id);
                            if(type === 'display'){
                                data=row.tarikh_buka;
                              }
                              return data;
                          }
                      },
                      {
                          targets:4, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=row.tarikh_tutup;
                              }
                              return data;
                          }
                      },
                      {
                          targets:5, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){

                                const startDate = new Date(row.tarikh_buka); 
                                const endDate = new Date(row.tarikh_tutup); 

                                if (isDateBetween(startDate, endDate)) {
                                    data= "Dalam Tindakan EPU";
                                } else {
                                    data="LULUS";
                                }
                              }
                              return data;
                          }
                      },
                      {
                        "targets": 6,
                        render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    const startDate = new Date(row.tarikh_buka); 
                                    const endDate = new Date(row.tarikh_tutup); 

                                    if (isDateBetween(startDate, endDate)) {
                                        data= '<i class="ri-checkbox-blank-circle-fill mr-1 nocstatusgreen"></i>' +"Dibuka";
                                    } else {
                                        data= '<i class="ri-checkbox-blank-circle-fill mr-1 nocstatusgrey"></i>'+"Ditutup";
                                    }
                              }
                              return data;
                          }
                      },
                      
                  ] , 
                  columns: [
                      
                      { data: 'count', "sortable": true},
                      { data: 'bilangan', "sortable": true  }, 
                      { data: 'tahun', "sortable": true},
                      { data: 'tarikh_buka' ,  "sortable": true },
                      { data: 'tarikh_tutup', "sortable": true  },   
                      { data: 'status_permohonan',  "sortable": true  },
                      { data: 'status', "sortable": true  },

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

                $('#agensi_user tbody').on('click', 'tr', function () {
                    var data = agency_table.row(this).data(); console.log(data);
                    var user_type = {{$user}};

                    if(user_type == 4 && data.status>=41)
                    {
                        var url = '{{ route("noc.loadKementerianSilling", [":id"])}}'
                            url = url.replace(':id', data.id);
                            window.location.href = url;
                    }
                    else
                    {
                        var url = '{{ route("noc.seneraiNoc", [":id"])}}'
                        url = url.replace(':id', data.id);

                        const startDate = new Date(data.tarikh_buka); 
                        const endDate = new Date(data.tarikh_tutup); 

                        if (isDateBetween(startDate, endDate)) {
                            window.location.href = url;
                        }

                    }
                    
                    
                });


    }

    $("#addpopbtn").click(function(){
            document.getElementById('exampleModal2').style.visibility = 'visible';
          $('#exampleModal2').modal('show');
    })

    $("#reset").click(function(){
        location.reload();
    })


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
                        console.log(response)
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


        // function addString() {
        //     var inputField = document.getElementById("bilangan"); console.log(inputField)
        //     var inputValue = inputField.value; console.log(inputValue)
        //     var substringToRemove = "NOC Bilangan ";
        //     var newValue = inputValue.replace(substringToRemove, "");
        //     document.getElementById("bilangan").value = newValue;


        //     var addedString = substringToRemove + inputValue; console.log(addedString)

        //     document.getElementById("bilangan").value = addedString;
        // }


    
</script>