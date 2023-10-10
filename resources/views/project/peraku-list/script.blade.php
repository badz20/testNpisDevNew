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
        var userRole =  {{$role}};
        var penyemak = {{$penyemak}}; console.log(penyemak)
        var penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1)
        var penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2)
        var pengesah =  {{$pengesah}}; console.log(pengesah)

        // alert(user_id);

        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/project/get-peraku-project-list?id="+user_id+"&usertype="+user_type+"&userRole="+userRole+"&penyemak="+penyemak+
                                                        "&penyemak_1="+penyemak_1+"&penyemak_2="+penyemak_2+"&pengesah="+pengesah,
        responseType: 'json'
        })
        .then(function (response) {
            console.log(response)
            $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
            var count=0;
            var project_table =$('#projectTable').DataTable({     
              data: response.data.data,
              dom: "Plfrtip",
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
                "order": [ 16, 'desc' ],
                pagingType: 'full_numbers',

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
                                      '<input type="hidden" id="no_rujukan" value="'+row.no_rujukan+'">'+
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
                      targets:12, // Start with the last
                      render: function ( data, type, row, meta ) {       console.log(row.workflow_status)            
                        if(type === 'display'){  

                          if(row.pemberat==null)   
                          {
                                data = '<td class="d-flex align-items-center ">' +    
                                `<input disabled type="text" class="pemberat_input" size="2" placeholder="0">` +
                                `<input type="hidden" id="semak_status" value="`+row.workflow_status+`">`+
                                `<input type="hidden" id="project_id" value="`+row.id+`">`+                          
                                '</td>'
                          } 
                          else
                          {                   
                                data = '<td class="d-flex align-items-center">' +    
                                `<input disabled type="text" class="pemberat_input" size="2" placeholder="`+row.pemberat+`">`+
                                `<input type="hidden" id="semak_status" value="`+row.workflow_status+`">`+
                                `<input type="hidden" id="project_id" value="`+row.id+`">`+                            
                                '</td>'  
                          } 

                        }
                        return data;
                      }
                  },  
                  {
                      targets:13, // Start with the last
                      render: function ( data, type, row, meta ) {                  
                        if(type === 'display'){  
                           
                            if(row.workflow_status==6 && row.susunan_status==1)
                            {    
                                if(row.penyemak1_priority_order!=null)
                                {
                                  data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                    `<input style="border-color:#2dc23a;" type="text" class="priority_input" id="penyemak_priority0_`+row.id+`" size="2" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Sila klik di luar untuk menyimpan keutamaan" onfocusout="SetPenyemakPriority('0',`+row.id+`,`+row.tahun+`)" placeholder="" value="`+row.penyemak1_priority_order+`">`                            
                                    '</td>'
                                } 
                                else
                                {
                                  data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                    `<input style="border-color:#FFC35A;" type="text" class="priority_input" id="penyemak_priority1_`+row.id+`" size="2" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Sila klik di luar untuk menyimpan keutamaan" onfocusout="SetPenyemakPriority('1',`+row.id+`,`+row.tahun+`)" placeholder="" value="">`                            
                                    '</td>'
                                }                       
                            }
                            else
                            {
                                if(row.penyemak1_priority_order!=null)
                                {
                                  data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                    `<input disabled style="border-color:#2dc23a;" type="text" class="priority_input" value="`+row.penyemak1_priority_order+`">`                            
                                    '</td>'
                                } 
                                else
                                {
                                  data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                    `<input disabled style="border-color:#2dc23a;" type="text" class="priority_input" value="0">`                            
                                    '</td>'
                                }  
                            }                           
                          }
                          return data;
                      }
                  },          
                  {
                      targets:14, // Start with the last
                      render: function ( data, type, row, meta ) {                  
                        if(type === 'display'){  
                           
                           if(row.workflow_status==13 && row.susunan_status==2)
                           {      
                              if(row.pengesha_priority_order!=null)
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input  style="border-color:#2dc23a;" type="text" class="priority_input pengesah_priority_input" id="pengesha_priority0_`+row.id+`" size="2" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Sila klik di luar untuk menyimpan keutamaan" onfocusout="SetPengasahPriority('0',`+row.id+`,`+row.tahun+`)" placeholder="" value="`+row.pengesha_priority_order+`">`                            
                                  '</td>'
                              } 
                              else
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input style="border-color:#FFC35A;" type="text" class="priority_input pengesah_priority_input" id="pengesha_priority1_`+row.id+`" size="2" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Sila klik di luar untuk menyimpan keutamaan" onfocusout="SetPengasahPriority('1',`+row.id+`,`+row.tahun+`)" placeholder="" value="">`                            
                                  '</td>'                                
                              }               
                           }
                           else
                           {
                              if(row.pengesha_priority_order!=null)
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input disabled style="border-color:#2dc23a;" type="text" class="priority_input pengesah_priority_input" value="`+row.pengesha_priority_order+`">`                            
                                  '</td>'
                              } 
                              else
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input disabled style="border-color:#FFC35A;" type="text" class="priority_input pengesah_priority_input" value="0">`                            
                                  '</td>'
                              }  
                           }
                          }
                          return data;
                      }
                  }, 
                  {
                      targets:15, // Start with the last
                      render: function ( data, type, row, meta ) {                  
                        if(type === 'display'){  
                           
                           if(row.workflow_status==14 && row.susunan_status==3)
                           {      
                              if(row.peraku_priority_order!=null)
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input  style="border-color:#2dc23a;" type="text" class="priority_input peraku_priority_input" id="peraku_priority0_`+row.id+`" size="2" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Sila klik di luar untuk menyimpan keutamaan" onfocusout="SetPerakuPriority('0',`+row.id+`,`+row.tahun+`)" placeholder="" value="`+row.peraku_priority_order+`">`                            
                                  '</td>'
                              } 
                              else
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input style="border-color:#FFC35A;" type="text" class="priority_input peraku_priority_input" id="peraku_priority1_`+row.id+`" size="2" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Sila klik di luar untuk menyimpan keutamaan" onfocusout="SetPerakuPriority('1',`+row.id+`,`+row.tahun+`)" placeholder="" value="">`                            
                                  '</td>'                                
                              }               
                           }
                           else
                           {
                              if(row.peraku_priority_order!=null)
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input disabled style="border-color:#2dc23a;" type="text" class="priority_input peraku_priority_input" value="`+row.peraku_priority_order+`">`                            
                                  '</td>'
                              } 
                              else
                              {
                                data = '<td class="d-flex align-items-center susunan_'+row.id+'">' +    
                                  `<input disabled style="border-color:#FFC35A;" type="text" class="priority_input peraku_priority_input" value="0">`                            
                                  '</td>'
                              }  
                           }
                          }
                          return data;
                      }
                  },          
                  {
                        targets:20, // Start with the last
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
                                '</div><input type="hidden" id="bahagian" value="'+row.bahagian_pemilik.id+'">';
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
                  { data: 'pemberat'},               
                  { data: 'id'},   
                  { data: 'id'}, 
                  { data: 'id'}, 
                  {
                        targets:16,
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
                        targets:19,
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
                        targets:20,
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

        if(user_type==2)
        {
            project_table.column(12).visible(true);    // To show
            project_table.column(13).visible(true);    // To show
            project_table.column(14).visible(false);    // To hide
            project_table.column(15).visible(false);    // To hide
        }
        else if(user_type==3 || user_type==4)
        {
            project_table.column(12).visible(true);    // To show
            project_table.column(13).visible(true);    // To show
            project_table.column(14).visible(true);    // To show
            project_table.column(15).visible(true);    // To hide
        }
        else
        {
            project_table.column(12).visible(false);    // To hide
            project_table.column(13).visible(false);    // To hide
            project_table.column(14).visible(false);    // To hide
            project_table.column(15).visible(false);    // To hide
        }
        project_table.column(16).visible(false);    // To hide
        loadcompleted();     

        $("#excelBtn").click(function(){
          project_table.button('.buttons-excel').trigger();
        })

        var customButton = $('<button type="button" id="btn_kelulusan_jps" onclick="HantarProject()">')
                                        .html('Hantar')
                                        .addClass('pemberat_greenBtn_new mt-2');
        $('#projectTable_paginate').after(customButton);
        
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


    function HantarProject()
    {
       var all_ids      = document.querySelectorAll("#project_id"); console.log(all_ids);
       var all_workflow = document.querySelectorAll("#semak_status"); console.log(all_workflow);
       var all_susunan  = document.querySelectorAll(".peraku_priority_input"); console.log(all_susunan);
       var all_rujukan  = document.querySelectorAll("#no_rujukan"); console.log(all_rujukan);
       var all_bahagian = document.querySelectorAll("#bahagian"); console.log(all_bahagian);


       let all_details = []
       for (var i = 0; i<all_ids.length; i++)
       {
          data = {};
          data.id = all_ids[i].value;
          data.status = all_workflow[i].value;
          data.susunan = all_susunan[i].value;
          data.rujukan = all_rujukan[i].value;
          data.bahagian = all_bahagian[i].value;
          data.user_id = {{Auth::user()->id}};
          all_details.push(JSON.stringify(data))
       }

       var formData = new FormData();
        all_details.forEach((item) => {
          formData.append('susunan_text[]', item);
        });

      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");


      const api_token = "Bearer "+ window.localStorage.getItem('token');
      const api_url = "{{env('API_URL')}}"; 
      axios.defaults.headers.common["Authorization"] = api_token;

        axios({
                method: 'POST',
                url: api_url+"api/project/hanter_project_data",
                responseType: 'json',
                data:formData,   
                headers: {
                            "Content-Type": "application/json",
                            "Authorization": api_token,
                },     
        })
        .then(function (result) {
          console.log(result.data)
          if(result.data.status=='Success'){
              $("#add_role_sucess_modal").modal('show')
              $("#tutup").click(function(){
                location.reload();   
                window.location.href = origin + '/project-application-list';                 
              })
          }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
    }

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

      //  if(userType==4 && new_status>=14)
      //  {
      //    return false;
      //  }

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


    function SetPenyemakPriority(row,project_id,tahun) {
      let id="penyemak_priority"+row+"_"+project_id; 
      let x = document.getElementById(id).value; console.log(x);
      if(x>0)
      {
        setPriorityOrder(x,'1',id,project_id,tahun);
      }
      else
      {

      }
    }

    function SetPengasahPriority(row,project_id,tahun) { 
      let id="pengesha_priority"+row+"_"+project_id; console.log(id)
      let x = document.getElementById(id).value; console.log(x);
      if(x>0)
      {
        setPriorityOrder(x,'2',id,project_id,tahun);
      }
      else
      {
        
      }    
    }

    function SetPerakuPriority(row,project_id,tahun) { 
      let id="peraku_priority"+row+"_"+project_id; console.log(id)
      let x = document.getElementById(id).value; console.log(x);
      if(x>0)
      {
        setPriorityOrder(x,'3',id,project_id,tahun);
      }
      else
      {
        
      }    
    }

    function setPriorityOrder(value,item,input_id,project_id,tahun)
    {
      console.log(input_id)
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        const user_id = {{Auth::user()->id}};
        const negeri = {{$negeri}};
        const bahagian = {{$bahagian}};


        var formData = new FormData();
            formData.append('value', value);
            formData.append('item', item);
            formData.append('id', project_id);
            formData.append('user_id', user_id);
            formData.append('negeri', negeri);
            formData.append('bahagian', bahagian);
            formData.append('tahun',tahun);


        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
        axios({
                    method: "post",
                    url: api_url+"api/project/set_priority",
                    data: formData,
                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
              })
              .then(function (response) { console.log(response.data.code);

                if(response.data.code==200)
                {
                  if(item==1)
                  {
                    if(response.data.data.Is_submitted_by_penyemak1==1)
                    {
                      document.getElementById(input_id).style.borderColor ="#2dc23a";
                    }
                    else
                    {
                      document.getElementById(input_id).style.borderColor ="#FFC35A";
                    }
                  }
                  else if(item==2)
                  {
                    if(response.data.data.Is_submitted_by_pengesha==1)
                    {
                      document.getElementById(input_id).style.borderColor ="#2dc23a";
                    }
                    else
                    {
                      document.getElementById(input_id).style.borderColor ="#FFC35A";
                    }
                  }
                  else
                  {
                    if(response.data.data.Is_submitted_by_peraku==1)
                    {
                      document.getElementById(input_id).style.borderColor ="#2dc23a";
                    }
                    else
                    {
                      document.getElementById(input_id).style.borderColor ="#FFC35A";
                    }
                  }
                  
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                }
                else
                {
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                  document.getElementById(input_id).style.borderColor ="#fd0202";
                
                  $("#Priority_set_model").modal('show');
                }
                                
              })
              .catch(function (error) {
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
              })
    }

    $('#fix_button').click(function(){ 
      window.location.href = origin + '/peraku-project-list';
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