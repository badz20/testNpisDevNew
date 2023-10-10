<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {  
      
      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");
        const api_url = "{{ env('API_URL') }}";
       const api_token = "Bearer "+ window.localStorage.getItem('token');
        console.log('project list loaded');
        let user_id = {{Auth::user()->id}};
        let user_type = {{$user}};
        var negeri =  {{$negeri}}; console.log(negeri)
        var daerah =  {{$daerah}}; console.log(daerah)
        var bahagian =  {{$bahagian}}; console.log(bahagian)

        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/project/get-salin-project-list?id="+user_id+"&usertype="+user_type+"&negeri="+negeri+"&daerah="+daerah+"&bahagian="+bahagian,
        responseType: 'json'
        })
        .then(function (response) {
            console.log(response)
            $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
            var count=0;
            var project_table =$('#projectTable').DataTable({     
              data: response.data.data,
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada apa-apa ditemui - maaf",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis dari _MAX_ jumlah rekod)",
                    "search": "_INPUT_",
                    "searchPlaceholder": "Carian",
                    "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Seterusnya",
                    "previous":   "Sebelum"
                    },       
                },
                "order": [ 12, 'desc' ],
                pagingType: 'full_numbers',
                buttons: [
                      {
                          text: 'excel',
                          extend: 'excelHtml5',
                          exportOptions: {
                              columns: ':visible:not(.not-export-col)'
                          }
                      },
                      {
                      text: 'pdf',
                      extend: 'pdfHtml5',
                      exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                      }
                    }

                      ],
              columnDefs: [
                {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) {
                        // console.log(data)
                                count=count+1; 
                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + count + '</p>' +
                                      '</div>';
                                return data;
                      }
                  }, 
                  {
                      targets:1, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                data='<div class="d-flex align-items-center list_'+row.id+'" title="'+row.id+'" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">' +                                
                                        '<p style="cursor:pointer">' + row.no_rujukan + '</p>' +
                                      '</div>';
                          }
                          return data;
                      }
                  }, 
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) { console.log(row.kod_projeck)
                          if(type === 'display'){
                              if(row.kod_projeck){
                                if(row.kod_baharu)
                                {
                                  datas="P"+row.kod_baharu+' '+row.kod_projeck;
                                  data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                                }
                                else
                                {
                                  datas="P"+' '+row.kod_projeck;
                                  data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                                }
                              }
                              else
                              {
                                datas = "-";
                                data= '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                              }
                          }
                          return data;
                      }
                  },  
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){                              
                              data = '<div class="d-flex align-items-center list_'+row.id+'" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">' +                                
                                '<p style="cursor:pointer">' + row.nama_projek + '</p>' +
                              '</div>'                              
                          }
                          return data;
                      }
                  }, 
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {             

                        if(row.kewangan.length==0){
                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + '-' + '</p>' +
                                    '</div>';
                            }else{
                                datas=row.kewangan.Siling_Dimohon;
                                if(datas=='.00')
                                {
                                  datas='0.00';
                                }
                                else
                                {
                                  datas=number_format(datas);
                                }
                                data= '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                            }
                            return data;
                      }
                  }, 
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {                  

                        if(row.kewangan.length==0 || user_type!=3){
                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + '-' + '</p>' +
                                      '</div>';
                            }else{
                                datas=row.kewangan.Siling_Bayangan;
                                if(datas=='.00')
                                {
                                  datas='0.00';
                                }
                                else
                                {
                                  datas=number_format(datas);
                                }
                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                            }
                            return data;
                      }
                  },
                  {
                      targets:11, // Start with the last
                      render: function ( data, type, row, meta ) { console.log(row.created_by.name)
                        if(type === 'display'){     
                          
                          if(row.workflow_status=="1"){
                                data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                '<p>' + 'Dalam Penyediaan' + '</p>' +
                              '</div>'
                              }  
                              else if(row.workflow_status=="2")
                              {
                                if(row.created_by) {
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Diserahkan oleh'+'<br>' +row.created_by.name + '</p>' +
                                  '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Diserahkan oleh' + '</p>' +
                                  '</div>';
                                }
                              }
                              else if(row.workflow_status=="3")
                              {
                                if(row.penyemak){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Sedang Disemak oleh'+'<br>' +row.penyemak.name + '</p>' +
                                  '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Sedang Disemak oleh'+ '</p>' +
                                  '</div>';
                                }
                              }  
                              else if(row.workflow_status=="4")
                              {
                                if(row.penyemak){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p style="color:green;">' + 'Telah Disemak oleh'+'<br>' +row.penyemak.name  + '</p>' +
                                            '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p style="color:green;">' + 'Telah Disemak oleh' + '</p>' +
                                            '</div>';
                                }
                              
                              }
                              else if(row.workflow_status=="5")
                              {
                                if(row.updatedBy){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updatedBy.name + '</p>' +
                                  '</div>';
                                }
                               else
                               {
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + 'Permintaan untuk Dikemaskini oleh'+'</p>' +
                                '</div>';
                               }
                              }
                              else if(row.workflow_status=="6")
                              {
                                if(row.penyemak1){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                                '<p>' + 'Sedang Disemak oleh'+'<br>' +row.penyemak1.name + '</p>' +
                                            '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                                '<p>' + 'Sedang Disemak oleh'+ '</p>' +
                                            '</div>';
                                }
                              
                              }
                              else if(row.workflow_status=="7")
                              {
                                if(row.penyemak1){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                          '<p>' + 'Telah Disemak oleh'+'<br>' +row.penyemak1.name  + '</p>' +
                                        '</div>';
                                }
                                else
                                {
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                          '<p>' + 'Telah Disemak oleh' + '</p>' +
                                        '</div>';
                                }
                              }
                              else if(row.workflow_status=="8")
                              {
                                if(row.updatedBy){
                                        data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updatedBy.name + '</p>' +
                                      '</div>';
                                  }
                                else
                                {
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Permintaan untuk Dikemaskini oleh'+'</p>' +
                                  '</div>';
                                }
                              } 
                              else if(row.workflow_status=="9")
                              {
                                if(row.penyemak1){
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p style="color:red;">' + 'Ditolak oleh'+'<br>' +row.penyemak1.name + '</p>' +
                                            '</div>';
                                }else{
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p style="color:red;">' + 'Ditolak oleh' + '</p>' +
                                            '</div>';
                                }
                              } 
                              else if(row.workflow_status=="10")
                              {
                                if(row.penyemak2){
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                                '<p>' + 'Sedang Disemak oleh'+'<br>' +row.penyemak2.name  + '</p>' +
                                              '</div>';
                                }else{
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                                '<p>' + 'Sedang Disemak oleh' + '</p>' +
                                              '</div>';
                                }
                              }  
                              else if(row.workflow_status=="11")
                              {
                                if(row.penyemak2){
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                                '<p>' + 'Telah Disemak oleh'+'<br>' +row.penyemak2.name  + '</p>' +
                                              '</div>';
                                }else{
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                                '<p>' + 'Telah Disemak oleh' + '</p>' +
                                              '</div>';
                                }
                              }
                              else if(row.workflow_status=="12")
                              {
                                if(row.updatedBy){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                          '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updatedBy.name + '</p>' +
                                        '</div>';
                                  }
                                else
                                {
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p>' + 'Permintaan untuk Dikemaskini oleh'+'</p>' +
                                          '</div>';
                                }
                              }
                              else if(row.workflow_status=="13")
                              {
                                // if(row.pengesah){
                                //   data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                //             '<p>' + 'Sedang Disemak oleh'+'<br>' +row.pengesah.name  + '</p>' +
                                //           '</div>';
                                // }else{
                                //   data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                //             '<p>' + 'Sedang Disemak oleh'+ '</p>' +
                                //           '</div>';
                                // }
                                data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p>' + 'Untuk Pengesahan Pengarah Bahagian'+ '</p>' +
                                          '</div>';
                              }
                              else if(row.workflow_status=="14")
                              {
                                if(row.pengesah){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p>' + 'Disahkan oleh'+'<br>' +row.pengesah.name  + '</p>' +
                                          '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p>' + 'Disahkan oleh'+ '</p>' +
                                          '</div>';
                                }
                              }
                              else if(row.workflow_status=="15")
                              {
                                if(row.updatedBy){
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updatedBy.name + '</p>' +
                                    '</div>';
                                  }
                                else
                                {
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Permintaan untuk Dikemaskini oleh'+'</p>' +
                                  '</div>';
                                }
                              }
                              else if(row.workflow_status=="16")
                              {
                                if(row.pengesah){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                          '<p style="color:red;">' + 'Ditolak oleh'+'<br>' +row.pengesah.name  + '</p>' +
                                        '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                          '<p style="color:red;">' + 'Ditolak oleh' + '</p>' +
                                        '</div>';
                                }
                              }
                              else if(row.workflow_status=="17")
                              {
                                if(row.peraku){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p style="color:green;">' + 'Diluluskan'+'<br>' +row.peraku.name+ '</p>' +
                                          '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p style="color:green;">' + 'Diluluskan'+'<br>' + '</p>' +
                                          '</div>';
                                }
                              }
                              else if(row.workflow_status=="18")
                              {
                                if(row.updatedBy){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updatedBy.name + '</p>' +
                                '</div>';
                                  }
                                else
                                {
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Permintaan untuk Dikemaskini oleh'+'</p>' +
                                  '</div>';
                                }
                              }
                              else if(row.workflow_status=="19")
                              {
                                if(row.peraku){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p style="color:red;">' + 'Ditolak oleh'+'<br>' +row.peraku.name+ '</p>' +
                                          '</div>';
                                }else{
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                            '<p style="color:red;">' + 'Ditolak oleh'+'<br>' + '</p>' +
                                          '</div>';
                                }
                              }
                              else if(row.workflow_status=="20")
                              {
                                if(row.updatedBy){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p>' + 'Dibatalkan'+'<br>' +row.updatedBy.name + '</p>' +
                                            '</div>';
                                  }
                                else
                                {
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p>' + 'Dibatalkan'+'</p>' +
                                            '</div>';
                                }
                              }
                              else
                              {
                              
                              }        
                          }
                          return data;
                      }
                  },        
                  {
                        targets:17, // Start with the last
                        render: function ( data, type, row, meta ) {                  

                          if(type === 'display'){   
                              if(row.workflow_status>=2) {                   
                                data = '<div class="d-flex align-items-center list_'+row.id+'">' +                                
                                          `<p style="cursor:pointer" onClick="downloadPpt(`+row.id+`,'`+String(row.no_rujukan)+`')">` + "PPT" + `</p>` +
                                        '</div>';
                              }
                              else
                              {
                                data = '';
                              }
                                                            
                            }
                            return data;
                        }
                  },          
              ] , 
              columns: [                
                  { data: 'count'  },
                  { data: 'no_rujukan'},
                  { data: 'kod_projeck'  },
                  { data: 'nama_projek'  },          
                  {
                        targets:4,
                        render: function ( data, type, row, meta ) {

                            data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + number_format(row.kos_projeck) + '</p>' +
                                '</div>';
                            return data;
                        }
                        
                  }, 
                  { data: 'id'  },  
                  { data: 'id'  },  
                  {
                        targets:7,
                        render: function ( data, type, row, meta ) {
                            console.log(row.negeri)
                            if(row.negeri.length==0){
                                datas="";
                            }else{
                                datas=row.negeri.nama_negeri;
                            }
                            data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + datas + '</p>' +
                                '</div>';
                            return data;
                        }
                        
                  }, 
                  {
                        targets:8,
                        render: function ( data, type, row, meta ) {
                            data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + row.bahagian_pemilik.nama_bahagian + '</p>' +
                                '</div>';
                            return data;
                        }
                        
                  }, 
                  {
                        targets:9,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.jenis_kategori.length==0){
                                datas="";
                            }else{
                                datas=row.jenis_kategori.name;
                            }
                            data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + datas + '</p>' +
                                    '</div>';
                            return data;
                        }
                        
                  }, 
                  {
                        targets:10,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.kategori_Projek==1){
                                datas="BAHARU";
                                data= '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                            }else{
                                datas="SAMBUNGAN";
                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + datas + '</p>' +
                                    '</div>';
                            }
                            return data;
                        }
                        
                  },  
                  { data: 'workflow_status'  }, 
                  {
                        targets:12,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.updated_at==0){
                                data="";
                            }else{
                              var date = new Date(row.updated_at);
                                data = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' +
                                       ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear() +
                                        ' ' + date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();
                                // data= date("Y-m-d", strtotime(row.updated_at) );
                            }
                            data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + data + '</p>' +
                                    '</div>';
                            return data;
                        }
                        
                  },
                  { data: 'tahun'},
                  { data: 'rmk'},
                  {
                        targets:15,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.rolling_plan.length==0){
                                datas="-";
                                data= '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                            }else{
                                datas=row.rolling_plan.name;
                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + datas + '</p>' +
                                    '</div>';
                            }
                            return data;
                        }
                        
                  },
                  {
                        targets:16,
                        render: function ( data, type, row, meta ) {
                            console.log(row.daerah)
                            if(row.daerah.length==0){
                                datas="-";
                            }else{
                                datas=row.daerah.nama_daerah;
                            }
                            data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + datas + '</p>' +
                                '</div>';
                            return data;
                        }
                        
                  }, 
                  { data: 'id'},                                
              ],
              
                 
          });  
        project_table.column(12).visible(false);    // To hide
        loadcompleted();  
        
        $("#excelBtn").click(function(){
          project_table.button('.buttons-excel').trigger();
        })

        $("#pdfBtn").click(function(){
          project_table.button('.buttons-pdf').trigger();
        })
        
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

        })
    });


    function removecomma(num){
              
              num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
              num=parseFloat(num,10);
              return num;
            }

      function number_format($num)
      {
        if($num)
        {
          $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
          return $abc;
        }
      }


    function downloadPpt(id,no_rujukan)
    {  
      const api_url = "{{env('API_URL')}}";  
      console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');
      console.log(api_token);
      update_user_api =  api_url+"api/project/ppt-download/" + id
      console.log(String(no_rujukan.replace('/','_')));
      filename=  no_rujukan.replace('/','_') + '.ppt'
      console.log(filename)
      axios({
        url: update_user_api,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
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
    function downloadPdf(id,no_rujukan){
      const api_url = "{{env('API_URL')}}";  
      console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');
      console.log(api_token);
      update_user_api =  api_url+"api/project/ppt-download/" + id
      console.log(String(no_rujukan.replace('/','_')));
      filename=  no_rujukan.replace('/','_') + '.ppt'
      console.log(filename)
      axios({
        url: update_user_api,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
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

    function downloadExcel()
    {  
      let user_id = {{Auth::user()->id}};
        let userType = {{$user}};
        var userRole =  {{$role}};
        var negeri =  {{$negeri}}; console.log(negeri)
        var daerah =  {{$daerah}}; console.log(daerah)
        var bahagian =  {{$bahagian}}; console.log(bahagian)
        var penyemak= {{$penyemak}}; console.log(penyemak)
        var penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1)
        var penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2)
        var pengesah =  {{$pengesah}}; console.log(pengesah)
        
      const api_url = "{{env('API_URL')}}";  
      console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');
      console.log(api_token);
      download_uri =  api_url+"api/export/projects?id="+user_id+"&usertype="+userType+"&userRole="+userRole+"&negeri="+negeri+"&daerah="+daerah+"&bahagian="+bahagian+"&penyemak="+penyemak+"&penyemak_1="+penyemak_1+"&penyemak_2="+penyemak_2+"&pengesah="+pengesah
      ;
      filename=  'projects_list.xlsx'
      console.log(filename)
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

    function loadProject(id,status,user_id,negeri,daerah)
    {       
       let new_status = status;
       let userType = {{$user}}; console.log(userType)

       if(daerah==null && negeri ==null)
       {
        localStorage.setItem('project_type',"bahagian");
       }
       else if(daerah==null && negeri!=null)
       {
        localStorage.setItem('project_type',"negeri");
       }
       else
       {
        localStorage.setItem('project_type',"daerah");
       }

        localStorage.setItem("workflow_status", status);  
        var base_url = window.location.origin;
        var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
        url = url.replace(":id", id)
        url = url.replace(":status", new_status)
        url = url.replace(":user_id", user_id)
        url = url.replace(":id", id)
        console.log(url)
        window.location.href = url
    }

    $('#fix_button').click(function(){ 
      window.location.href = origin + '/salin-project-list';
    });

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