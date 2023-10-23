<script>
$(document).ready(function() {
    console.log('senarai jps loaded');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    var api_url = "{{env('API_URL')}}";
    var api_token = "Bearer " + window.localStorage.getItem('token');

    var jps_table;


    $(".caribtn").click(function() {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        let data = {}
        data['query_negeri'] = document.getElementById("query_negeri").value
        data['query_bahagian'] = document.getElementById("query_bahagian").value
        data['query_kementerian'] = document.getElementById("query_kementerian").value

        axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/noc/project_filter_list",
            responseType: 'json',
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": api_token,
            },
            params: data
        })
        .then(function(response) {
            if (response.data.code == 200) {
                console.log(response.data);

                var jps_table = $('#senaraiJpsTable').DataTable();
                jps_table.clear().rows.add(response.data.data).draw();

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

            } else {

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }

        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

    })
    

    $.ajaxSetup({
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
        }
    });

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    $.ajax({
        type: "GET",
        url: api_url + "api/noc/jbt_project_list",
        dataType: "json",
        contentType: "application/json",
        header: {
            'contentType': "application/json",
            'Authorization': api_token
        },
        success: async function(response) {
          console.log(response);
            await loadQueryDatas(response.data)
            await loadDatatableJps(response.data.projects);

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

        },
        error: function(response) {
          $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            console.log(response);
        }
    });
        // Handle click events on the "View" button
    


})

function format(data) { console.log(data)
    // `d` is the original data object for the row

    table_init = `
    <div >
    <table class="table table_preview application_list"  style="width:150em !important;">
                              <thead style="white-space: nowrap;">
                                  <tr id=`+data.id+`>
                                    <th class="sub_head" ></th>
                                    <th class="sub_head" ></th>
                                    <th class="sub_head keperluan_green" >Tarikh Kemaskini</th>
                                    <th class="sub_head keperluan_green" >Amaun(RM)</th>
                                    <th class="sub_head keperluan_green" >Justifikasi</th>
                                    <th class="sub_head keperluan_green" >Rekod Permohonan</th>
                                    <th class="sub_head keperluan_green" >Amaun(Rm)</th>
                                    <th class="sub_head keperluan_pink" >Tarikh Waran</th>
                                    <th class="sub_head keperluan_pink" >Waran Tambahan(RM)</th>
                                    <th class="sub_head keperluan_pink" >Waran Pemulanhan(RM)</th>
                                    <th class="sub_head" ></th>
                                    <th class="sub_head" ></th>
                                    <th class="sub_head" ></th>
                                    <th class="sub_head" ></th>
                                  </tr>
                              </thead>`

    table_body = ``

    table_footer = `</table></div>`

    inner_table = table_init

        template = `<tr style="cursor: pointer;">
                        
                                </td>
                                <td></td>
                                <td class=""></td>
                                <td class="text-center keperluan_green">` + '<input type="hidden"  value="'+data.id+'" id="pp_id">' + `</td>
                                <td class="text-center keperluan_green">` + '<input type="text" class="form-control" value="" id="keperluan_amaun">' + `</td>
                                <td class="text-center keperluan_green">` + '<textarea class="form-control" style="height:50px;" id="justifikasi"></textarea>' + `</td>
                                <td class="keperluan_green">` + '<input type="date" class="form-control" value="" id="rekod_permohonan">' + `</td>
                                <td class="text-center keperluan_green">` + '<input type="text" class="form-control" value="" id="rekod_aman">' + `</td>
                                <td class="text-center keperluan_pink">` + '<input type="date" class="form-control" value="" id="tarikh_waran">' + `</td>
                                <td class="text-center keperluan_pink">` + '<input type="text" class="form-control" value="" id="waran_tambahan">' + `</td>
                                <td class="text-center keperluan_pink">` + '<input type="text" class="form-control" value="" id="waran_penulangan">' + `</td>
                                <td class="text-center">` + ' ' + `</td>
                                <td class="text-center">` + ' ' + `</td>
                                <td class="text-center">` + ' ' + `</td>
                                <td class="text-center">` + ' ' + `</td>
                              </tr>`
        inner_table = inner_table + template

        let response = data.kepeluruhan;

        if(response.length>0)
        {
            response.forEach((data) => { console.log(data)

            template = `<tr style="cursor: pointer;">
                            
                                    </td>
                                    <td></td>
                                    <td class=""></td>
                                    <td class="text-center keperluan_green">` + '<label>'+data.tarikh_kemaskini +'</label>' + `</td>
                                    <td class="text-center keperluan_green">` + '<label>'+number_format(data.kepeluruan_amaun) +'</label>' + `</td>
                                    <td class="text-center keperluan_green">` + '<label>'+data.justifikasi +'</label>' + `</td>
                                    <td class="keperluan_green">` + '<label>'+data.rekod_permohonan +'</label>' + `</td>
                                    <td class="text-center keperluan_green">` + '<label>'+number_format(data.amaun) +'</label>' + `</td>
                                    <td class="text-center keperluan_pink">` + '<label>'+data.taikh_waran +'</label>' + `</td>
                                    <td class="text-center keperluan_pink">` + '<label>'+number_format(data.waran_tambahan) +'</label>' + `</td>
                                    <td class="text-center keperluan_pink">` + '<label>'+number_format(data.waran_pemulangan) +'</label>' + `</td>
                                    <td class="text-center">` + ' ' + `</td>
                                    <td class="text-center">` + ' ' + `</td>
                                    <td class="text-center">` + ' ' + `</td>
                                    <td class="text-center">` + ' ' + `</td>
                                </tr>`

            inner_table = inner_table + template

            })
        }

        inner_table = inner_table + table_footer
        
        return (inner_table)
}


function DisableFields()
{
    if({{$user}}==4)
    {
        var keperluan_amaun = document.querySelectorAll('#keperluan_amaun'); console.log(keperluan_amaun);
            for (var i = 0; i < keperluan_amaun.length; i++) {
                keperluan_amaun[i].style.display = 'none';
            }

        var justifikasi = document.querySelectorAll('#justifikasi'); console.log(justifikasi);
            for (var i = 0; i < justifikasi.length; i++) {
                justifikasi[i].style.display = 'none';
            }
    }
    else if({{$user}}==3)
    {
        var rekod_permohonan = document.querySelectorAll('#rekod_permohonan'); //console.log(keperluan_amaun);
            for (var i = 0; i < rekod_permohonan.length; i++) {
                rekod_permohonan[i].style.display = 'none';
            }

        var rekod_aman = document.querySelectorAll('#rekod_aman'); console.log(rekod_aman);
            for (var i = 0; i < rekod_aman.length; i++) {
                rekod_aman[i].style.display = 'none';
            }

        var tarikh_waran = document.querySelectorAll('#tarikh_waran'); console.log(tarikh_waran);
            for (var i = 0; i < tarikh_waran.length; i++) {
                tarikh_waran[i].style.display = 'none';
            }

        var waran_tambahan = document.querySelectorAll('#waran_tambahan'); console.log(waran_tambahan);
            for (var i = 0; i < waran_tambahan.length; i++) {
                waran_tambahan[i].style.display = 'none';
            }
            
        var waran_penulangan = document.querySelectorAll('#waran_penulangan'); console.log(waran_penulangan);
            for (var i = 0; i < waran_penulangan.length; i++) {
                waran_penulangan[i].style.display = 'none';
            }
    }
    else
    {
        var keperluan_amaun = document.querySelectorAll('#keperluan_amaun'); console.log(keperluan_amaun);
            for (var i = 0; i < keperluan_amaun.length; i++) {
                keperluan_amaun[i].style.display = 'none';
            }

        var justifikasi = document.querySelectorAll('#justifikasi'); console.log(justifikasi);
            for (var i = 0; i < justifikasi.length; i++) {
                justifikasi[i].style.display = 'none';
            }

        var rekod_permohonan = document.querySelectorAll('#rekod_permohonan'); //console.log(keperluan_amaun);
            for (var i = 0; i < rekod_permohonan.length; i++) {
                rekod_permohonan[i].style.display = 'none';
            }

        var rekod_aman = document.querySelectorAll('#rekod_aman'); console.log(rekod_aman);
            for (var i = 0; i < rekod_aman.length; i++) {
                rekod_aman[i].style.display = 'none';
            }

        var tarikh_waran = document.querySelectorAll('#tarikh_waran'); console.log(tarikh_waran);
            for (var i = 0; i < tarikh_waran.length; i++) {
                tarikh_waran[i].style.display = 'none';
            }

        var waran_tambahan = document.querySelectorAll('#waran_tambahan'); console.log(waran_tambahan);
            for (var i = 0; i < waran_tambahan.length; i++) {
                waran_tambahan[i].style.display = 'none';
            }
            
        var waran_penulangan = document.querySelectorAll('#waran_penulangan'); console.log(waran_penulangan);
            for (var i = 0; i < waran_penulangan.length; i++) {
                waran_penulangan[i].style.display = 'none';
            }
    }
}



function loadView(project_id, perolehan_id) {
    var url = '{{ route("perunding.load.maklumat.perunding", [":project_id", ":perolehan_id"])}}'

    url = url.replace(':project_id', project_id);
    url = url.replace(':perolehan_id', perolehan_id);
    window.location.href = url;
}

function loadQueryDatas(response)
{

  //load negeri options
  query_negeri_dropdown = document.getElementById('query_negeri')
  response.negeri.forEach((negeri) => {
    var el = document.createElement("option");
      el.textContent = negeri.nama_negeri;
      el.value = negeri.id;
      query_negeri_dropdown.appendChild(el);
  })

  //load bahagians options
  query_bahagian_dropdown = document.getElementById('query_bahagian')
  response.bahagian.forEach((bahagian) => {
    var el = document.createElement("option");
      el.textContent = bahagian.nama_bahagian;
      el.value = bahagian.id;
      query_bahagian_dropdown.appendChild(el);
  })

  //load nama perunding options
  query_kementerian_dropdown = document.getElementById('query_kementerian')
  response.kementerian.forEach((kementerian) => {
    var el = document.createElement("option");
      el.textContent = kementerian.nama_kementerian;
      el.value = kementerian;
      query_kementerian_dropdown.appendChild(el);
  })
  
}

function loadDatatableJps(response) {

    var jps_table = $('#senaraiJpsTable').DataTable({
        data: response,
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
                "first": "Awal",
                "last": "Akhir",
                "next": "Seterusnya",
                "previous": "Sebelum"
            },
        },
        pagingType: 'full_numbers',
        columnDefs: [
                      {
                            targets:0, // Start with the last
                            render: function ( data, type, row, meta ) { //console.log(row)
                                if(type === 'display'){
                                    data=row.kod_projeck; 
                                }
                                return data;
                            }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                                if(type === 'display')
                                {
                                    data=row.nama_projek;
                                }
                                return data;
                          }
                      },
                      {
                          targets:2, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=number_format(row.kos_projeck);
                              }
                              return data;
                          }
                      },
                      {
                            targets:3, // Start with the last
                            "createdCell": function (td, cellData, rowData, row, col) { 
                                        $(td).css('background-color', '#b5ffc9');
                            },
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data=number_format(row.keperluan_jps);
                                }
                                return data;
                            }
                      },
                      {
                            targets:4, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    abc='';
                                }
                                return abc;
                            }
                      },
                      {
                            targets:5, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    abc='';
                                }
                                return abc;
                            }
                      },
                      {
                            targets:6, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    abc='';
                                }
                                return abc;
                            }
                      },
                      {
                          targets:7, // Start with the last
                          "createdCell": function (td, cellData, rowData, row, col) { 
                                        $(td).css('background-color', '#fcb5ffd4');
                            },
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                    data=number_format(row.peruntukan_asal);
                              }
                              return data;
                          }
                      },
                      {
                          targets:8, // Start with the last
                          "createdCell": function (td, cellData, rowData, row, col) { 
                                        $(td).css('background-color', '#fcb5ffd4');
                            },
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data=number_format(row.tambahan);
                              }
                              return data;
                          }
                      },
                      {
                          targets:9, // Start with the last
                          "createdCell": function (td, cellData, rowData, row, col) { 
                                        $(td).css('background-color', '#fcb5ffd4');
                            },
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data=number_format(row.pemulangan);
                              }
                              return data;
                          }
                      },
                      {
                            targets: 10,
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data=number_format(row.peruntukan_dipinda);
                                }
                                return data;
                            }
                      },
                      {
                            targets: 11,
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data='';
                                }
                                return data;
                            }
                      },
                      {
                            targets: 12,
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data=row.bahagian_pemilik.nama_bahagian;
                                }
                                return data;
                            }
                      },
                      {
                            targets: 13,
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data=row.negeri.nama_negeri;
                                }
                                return data;
                            }
                      },
                      
                  ] , 
                  columns: [
                      
                      { data: 'kod_projeck', "sortable": true  }, 
                      { data: 'nama_projek', "sortable": true},
                      { data: 'kos_projeck' ,  "sortable": true },
                      { data: 'keperluan_jps', "sortable": true  }, 
                      { data: 'abc'},
                      { data: 'abc'},
                      { data: 'abc'},  
                      { data: 'peruntukan_asal',  "sortable": true  },
                      { data: 'tambahan', "sortable": true  },
                      { data: 'pemulangan', "sortable": true  },
                      { data: 'peruntukan_dipinda' ,  "sortable": true},
                      { data: 'id'},
                      { data: 'id'},
                      { data: 'id'}, 
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

    
    if({{$user}}!=3 || {{$user}}!=4)
        {
            $('#simpan_btn').addClass('d-none');
        }
        else
        {
            $('#simpan_btn').removeClass('d-none');
        }

    // Add event listener for opening and closing details
    $('#senaraiJpsTbody').on('click', 'tr', function() {
        var tr = $(this);
        var row = jps_table.row(tr);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            // row.child(format(row.data())).show();
            row_data = row.data(); console.log(row_data);
            if(typeof(row_data)!='undefined')
            {
                row.child(format(row_data)).show();
                //row.child(format(row_data.perolehan)).show();
                tr.addClass('shown');
            }
            
        }

        DisableFields();

    });
    
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

function printDataTable() {
    // Clone the DataTable and remove any interactive elements
    var printableTable = $('#senaraiJpsTable').clone();
    printableTable.find('.view-button').remove(); // Remove view buttons, for example

    // Apply print-specific CSS styles
    printableTable.addClass('printable-table');
    
    // Open the print dialog
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Printable DataTable</title></head><body>');
    printWindow.document.write('<style>@media print {.printable-table { /* your print styles here */ }}</style>');
    printWindow.document.write(printableTable[0].outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    printWindow.close();

    // window.print();
}

function convertToCapital() {
    var inputElement = document.getElementById('query_nama_projek');
    var outputElement = document.getElementById('query_nama_projek'); //console.log(outputElement);
    var inputValue = inputElement.value;
    var capitalizedValue = inputValue.toUpperCase();
    outputElement.value = capitalizedValue; //console.log(capitalizedValue);
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


$("#simpan_btn").click(function(){

    var formData = new FormData();

    var pp_id = document.querySelectorAll('#pp_id'); 
    var keperluan_amaun = document.querySelectorAll('#keperluan_amaun'); console.log(keperluan_amaun)
    var justifikasi = document.querySelectorAll('#justifikasi'); console.log(justifikasi)
    var rekod_permohonan = document.querySelectorAll('#rekod_permohonan'); console.log(rekod_permohonan)
    var rekod_aman = document.querySelectorAll('#rekod_aman'); console.log(rekod_aman)
    var tarikh_waran = document.querySelectorAll('#tarikh_waran'); console.log(tarikh_waran)
    var waran_tambahan = document.querySelectorAll('#waran_tambahan'); console.log(waran_tambahan)
    var waran_penulangan = document.querySelectorAll('#waran_penulangan'); console.log(waran_penulangan)

    let keperluan_data = []  
    for (var i=0 ; i< pp_id.length ; i++)
    {  
        data= {};
        data.project_id=pp_id[i].value;

        if(typeof(keperluan_amaun[i])=='undefined' || isNaN(removecomma(keperluan_amaun[i].value))){
            data.keperluan_amaun = 0;
        }
        else{
            data.keperluan_amaun = removecomma(keperluan_amaun[i].value)
        }

        if(typeof(justifikasi[i])!='undefined')
        {
            data.justifikasi=justifikasi[i].value;
        }

        if(rekod_permohonan[i].value=='')
        {
            data.rekod_permohonan=new Date().toISOString().slice(0, 10);
        }
        else
        {
            data.rekod_permohonan=rekod_permohonan[i].value;
        }

        if(isNaN(removecomma(rekod_aman[i].value))){
            data.rekod_aman = 0;
        }
        else{
            data.rekod_aman = removecomma(rekod_aman[i].value)
        }

        if(tarikh_waran[i].value=='')
        {
            data.tarikh_waran=new Date().toISOString().slice(0, 10);
        }
        else
        {
            data.tarikh_waran=tarikh_waran[i].value;
        }

        if(isNaN(removecomma(waran_tambahan[i].value))){
            data.waran_tambahan = 0;
        }
        else{
            data.waran_tambahan = removecomma(waran_tambahan[i].value)
        }

        if(isNaN(removecomma(waran_penulangan[i].value))){
            data.waran_penulangan = 0;
        }
        else{
            data.waran_penulangan = removecomma(waran_penulangan[i].value)
        }

        if({{$user}}==4)
        {
            if(data.rekod_aman==0 && data.waran_penulangan==0 && data.waran_tambahan==0)
            {
                alert('sila isi semua ruangan');
                return false;
            }

        }
        else
        {
            if(data.keperluan_amaun==0)
            {
                alert('sila isi keperluan amaun');
                return  false;
            }

        }
        
        if(data.justifikasi=='' && data.keperluan_amaun==0 && data.rekod_aman==0 && data.waran_penulangan==0 && data.waran_tambahan==0)
        {

        }
        else
        {
            keperluan_data.push(JSON.stringify(data))
        }

    }

        keperluan_data.forEach((item) => {
            formData.append('keperluanData[]', item);
        });
    
        formData.append('user_id', {{Auth::user()->id}})

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

         axios({
                    method: 'post',
                    url: api_url+"api/noc/updateKeperluanData",
                    responseType: 'json',
                    data: formData
                })
                .then(function (response) { 
                        console.log(response)
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

    
});

</script>