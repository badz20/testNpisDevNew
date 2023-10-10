<script src="assets/js/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function () {  

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    const api_url = "{{env('API_URL')}}";  //console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  //console.log(api_token);    
        axios({
        method: 'get',
        url: api_url+"api/noc/nocList/" + {{Auth::user()->id}},
        headers: {"Authorization": api_token },
        responseType: 'json'
        })
        .then(function (response) {
          loadDatatable(response);
        //   loadcompleted();         
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        

        function loadDatatable(response)
        {

        //   var count=0;
        var project_table =$('#projectTable').DataTable({     
                data: response.data.data, 
                "language": {
                        "lengthMenu": "Papar _MENU_ Entri",
                        "zeroRecords": "Tiada apa-apa ditemui - maaf",
                        "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                        "infoEmpty": "Tiada rekod tersedia",
                        "infoFiltered": "(ditapis dari _MAX_ jumlah rekod)",
                        "search": "_INPUT_",
                        "searchPlaceholder": " Carian",
                        "paginate": {
                        "first":      "Awal",
                        "last":       "Akhir",
                        "next":       "Seterusnya",
                        "previous":   "Sebelum"
                        },       
                    },
                    "order": [ 7, 'desc' ],
                    pagingType: 'full_numbers',
                columnDefs: [
                    {
                        targets:0, // Start with the last
                        render: function ( data, type, row, meta ) {
                            //console.log(row)
                                    // count=count+1; 
                                    data='<div class="d-flex" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">'+                                
                                            // '<p>' + count + '</p>' +

                                        '</div>';
                                    return data;
                        }
                    }, 
                    {
                        targets:1, // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){
                                    data='<div class="d-flex align-items-center list_'+row.noc_id+'" title="'+row.noc_id+'" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">' +                                
                                            '<p style="cursor:pointer">' + row.rujukan + '</p>' +
                                        '</div>';
                            }
                            return data;
                        }
                    }, 
                    {
                        targets:2, // Start with the last
                        render: function ( data, type, row, meta ) { //console.log(row.kod_projeck)
                            if(type === 'display'){
                                        const specificDate = new Date(row.created_at);
                                    data='<div class="d-flex" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">'+                                
                                            '<p>' + specificDate.getFullYear() + '</p>' +
                                        '</div>';
                            }
                            return data;
                        }
                    },  
                    {
                        targets:3, // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){                              
                                data = '<div class="d-flex align-items-center list_'+row.noc_id+'" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">' +                                
                                    '<p style="cursor:pointer">' + row.kod_projeck + '</p>' +
                                '</div>'                              
                            }
                            return data;
                        }
                    }, 
                    {
                        targets:4, // Start with the last
                        render: function ( data, type, row, meta ) {
                            if(type === 'display'){                              
                                data = '<div class="d-flex align-items-center list_'+row.noc_id+'" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">' +                                
                                    '<p style="cursor:pointer">' + row.name + '</p>' +
                                '</div>'                              
                            }
                            return data;
                        }
                    }, 
                    {
                        targets:5, // Start with the last
                        render: function ( data, type, row, meta ) {             
                                    data= '<div class="d-flex" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">'+                                
                                            '<p>' + row.row_status + '</p>' +
                                        '</div>';
                                return data;
                        }
                    }, 
                    {
                        targets:6, // Start with the last
                        render: function ( data, type, row, meta ) {      // console.log(row)  
                            var kategori = getKategoryArray(row);   console.log(kategori);       
                                    data='<div class="d-flex" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">'+                                
                                            '<p>' + kategori + '</p>' +
                                        '</div>';
                                return data;
                        }
                    }, 
                    {
                        targets:7, // Start with the last
                        render: function ( data, type, row, meta ) { //console.log(row.status_id);
                                    let color='';
                                    if(row.status_id==43 || row.status_id==45)
                                    {
                                    color='#ff0000';
                                    }
                                    else if(row.status_id==44)
                                    {
                                        color='#1bc727';
                                    }
                                    else
                                    {
                                        color='#202820';
                                    }

                                    data='<div class="d-flex" onClick="loadProject('+row.noc_id+','+row.dibuat_oleh +','+row.status_id +')">'+                                
                                            '<p style="color:'+color+'">' + row.status_name + '</p>' +
                                        '</div>';
                                return data;
                        }
                    }, 
                                            
                ] , 
                columns: [                
                    { data: ' '  },
                    { data: 'rujukan'},
                    { data: 'row_status'  },
                    { data: 'kod_projeck'  },  
                    { data: 'name'  },      
                    { data: 'row_status'  },  
                    { data: 'updated_at'  }, 
                    { data: 'status_name'  },  
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

            project_table.column(8);    // To show

        }

})

function getKategoryArray(data)
{
    console.log(data);
    var kategory_array = [];
    if(data.output_status==1)
    {
        kategory_array.push("Perubahan Output");
    }
    if(data.objectif_status==1)
    {
        kategory_array.push("Perubahan Objektif");
    }
    if(data.kod_status==1)
    {
        kategory_array.push("Perubahan Kod Projek");
    }
    if(data.outcome_status==1)
    {
        kategory_array.push("Perubahan Outcome");
    }
    if(data.kpi_status==1)
    {
        kategory_array.push("Perubahan KPI");
    }
    if(data.lokasi_status==1)
    {
        kategory_array.push("Perubahan Lokasi Projek");
    }
    if(data.nama_status==1)
    {
        kategory_array.push("Perubahan Nama Projek");
    }
    if(data.semula_status==1)
    {
        kategory_array.push("Wujud Semula Butiran");
    }
    if(data.butiran_status==1)
    {
        kategory_array.push("Wujud Butiran Baharu");
    }
    if(data.kos_status==1)
    {
        kategory_array.push("Pertambahan Kos");
    }
    if(data.skop_status==1)
    {
        kategory_array.push("Peluasan Skop");
    }

    var str1 = kategory_array.toString();

      return str1;
}

function loadProject(id,dibuat,status){
       let user_type= {{$user}};
       localStorage.setItem('noc_status',status);
        if(user_type==4)
        {
            if(status==41 || status==42 || status==43 || status==44)
            {
                localStorage.setItem('Is_editable','');
                window.location.href = "kementerian-noc/"+id+"";

            }
            else if(status==40 && (dibuat=={{Auth::user()->id}}))
            {
                localStorage.setItem('Is_editable','');
                window.location.href = "notis_perubahan/"+id+"";
            }
            else
            {
                localStorage.setItem('Is_editable','1');
                window.location.href = "notis_perubahan/"+id+"";
            }
        }
        else
        {
            localStorage.setItem('Is_editable','');
            window.location.href = "notis_perubahan/"+id+"";

        }
    }
</script>
