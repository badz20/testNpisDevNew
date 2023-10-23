<script src="assets/js/jquery.min.js"></script>
<script>
  
                          $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
    $(document).ready(function () {  
      if({{json_encode($viewOnly)}}) {
        disableInputs()
   }


   function disableInputs() {
      // Get all input elements
      const inputs = document.getElementsByTagName("input");
      
      // Loop through each input element
      for (let i = 0; i < inputs.length; i++) {
        const input = inputs[i];

        // Check if input is not a button and not already disabled
        if (input.type !== "button" && !input.disabled) {
          // Set readonly attribute
          input.readOnly = true;
          
          // Check if input is a checkbox or radio button
          if (input.type === "checkbox" || input.type === "radio") {
            // Disable checkbox or radio button
            input.disabled = true;
          }
        }
      }

      // Get all button elements
      const buttons = document.getElementsByTagName("button");

      // Loop through each button element
      for (let i = 0; i < buttons.length; i++) {
        const button = buttons[i];

        // Disable button
        button.disabled = true;
      }
    }
        const api_url = "{{ env('API_URL') }}";
       const api_token = "Bearer "+ window.localStorage.getItem('token');
        ////console.log('project list loaded');
        let user_id = {{Auth::user()->id}};
        let userType = {{$user}};
        var userRole =  {{$role}};
        var negeri =  {{$negeri}}; ////console.log(negeri)
        var daerah =  {{$daerah}}; ////console.log(daerah)
        var bahagian =  {{$bahagian}}; ////console.log(bahagian)
        var penyemak= {{$penyemak}}; ////console.log(penyemak)
        var penyemak_1 =  {{$penyemak_1}}; ////console.log(penyemak_1)
        var penyemak_2 =  {{$penyemak_2}}; ////console.log(penyemak_2)
        var pengesah =  {{$pengesah}}; ////console.log(pengesah)


        // alert(user_id);

        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/project/projects-with-userid?id="+user_id+"&usertype="+userType+"&userRole="+userRole+"&negeri="+negeri+"&daerah="+daerah+
        "&bahagian="+bahagian+"&penyemak="+penyemak+"&penyemak_1="+penyemak_1+"&penyemak_2="+penyemak_2+"&pengesah="+pengesah,
        data: {
          "abc":1,
          "bbc":2
        },
        responseType: 'json'
        })
        .then(function (response) {
          loadDatatable(response);
          loadcompleted();         
          $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
        })
    })

    function loadDatatable(response)
    {
      $("div.spanner").removeClass("show");
      $("div.overlay").removeClass("show");
      let userTypes = {{$user}}; ////console.log(userTypes)

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
                    "searchPlaceholder": "   Carian",
                    "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Seterusnya",
                    "previous":   "Sebelum"
                    },       
                },
                "order": [ 17, 'desc' ],
                pagingType: 'full_numbers',
                "dom": '<"top"lf>rt<"bottom"ip>',
              columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) {
                        ////console.log(data)
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
                      render: function ( data, type, row, meta ) { ////console.log(row.kod_projeck)
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
                                '<p style="cursor:pointer;">' + row.nama_projek + '</p>' +
                              '</div>'                              
                          }
                          return data;
                      }
                  }, 
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {             

                        if(row.kewangan.length==0){
                                data='<div class="text-right" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
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
                                data= '<div class="text-right" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + datas + '</p>' +
                                      '</div>';
                            }
                            return data;
                      }
                  }, 
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {                  

                        if(userTypes!=3){

                                datas=row.kewangan.Siling_Bayangan;
                                if(datas=='.00' || row.kewangan.length==0)
                                {
                                  datas='0.00';
                                }
                                else
                                {
                                  datas=number_format(datas);
                                }
                                data='<input type="text" name="siling_bayangan" class="form-control text-right" id="siling_bayangan_'+row.id+'" onfocusout="UpdateBayangan('+row.id+')" value="'+ datas +'">';
                                
                            }else{
                                datas=row.kewangan.Siling_Bayangan;
                                if(datas=='.00' || row.kewangan.length==0)
                                {
                                  datas='0.00';
                                }
                                else
                                {
                                  datas=number_format(datas);
                                }                              

                                data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p> <input type="hidden" value="'+datas+'" id="siling_bayangan_'+row.id+'"> ' + datas + '</p>' +
                                      '</div>';
                            }
                            return data;
                      }
                  }, 
                  {
                      targets:11, // Start with the last
                      render: function ( data, type, row, meta ) { ////console.log(row)
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
                                if(row.updated_by){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                    '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updated_by.name + '</p>' +
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
                                if(row.updated_by){
                                        data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                        '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updated_by.name + '</p>' +
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
                                if(row.updated_by){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                          '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updated_by.name + '</p>' +
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
                                if(row.updated_by){
                                      data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                      '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updated_by.name + '</p>' +
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
                                if(row.updated_by){
                                  data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + 'Permintaan untuk Dikemaskini oleh'+'<br>' +row.updated_by.name + '</p>' +
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
                                if(row.updated_by){
                                    data = '<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                              '<p>' + 'Dibatalkan'+'<br>' +row.updated_by.name + '</p>' +
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
                      targets:16, // Start with the last
                      render: function ( data, type, row, meta ) {                  

                        if(type === 'display'){          
                              if(row.workflow_status>=2) {                   
                              data = '<div class="d-flex align-items-center list_'+row.id+'">' +                                
                                `<p style="cursor:pointer" onClick="downloadPpt(`+row.id+`,'`+String(row.no_rujukan)+`')">` + "PPT" + `</p>` +
                                // +`<label class="p-2" style="cursor:pointer" onClick="convertpptTopdf(`+row.id+`,'`+String(row.no_rujukan)+`')">` + `<badge class="p-2 bg-danger text-light translate-middle badge rounded-pill">Pdf</badge>` + `</label>`
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
                  { data: 'id'},
                  { data: 'kod_projeck'  },
                  { data: 'nama_projek'  },  
                  {
                        targets:4,
                        render: function ( data, type, row, meta ) {

                            data='<div class="text-right" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + formatValue(row.kos_projeck) + '</p>' +
                                '</div>';
                            return data;
                        }
                        
                  },        
                  { data: 'id'  },  
                  { data: 'id'  },  
                  {
                        targets:7,
                        render: function ( data, type, row, meta ) {
                            ////console.log(row.negeri)
                            let negeri_list = getNegeriList(row.negerilist); //console.log(negeri_list);
                            if(negeri_list){
                                datas=negeri_list[0];
                            }else{
                                datas="-";
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
                            // //console.log(row.jawatan.length)
                            if(row.jenis_kategori.length==0){
                                datas="-";
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
                            // //console.log(row.jawatan.length)
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
                  { data: 'tahun'},
                  { data: 'rmk'},
                  {
                        targets:14,
                        render: function ( data, type, row, meta ) {
                            // //console.log(row.jawatan.length)
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
                        targets:15,
                        render: function ( data, type, row, meta ) {
                            ////console.log(row.daerah)
                            
                            let negeri_list = getNegeriList(row.negerilist); //console.log(negeri_list);
                            if(negeri_list){
                                datas=negeri_list[1];
                            }else{
                                datas="-";
                            }
                            data='<div class="d-flex" onClick="loadProject('+row.id+','+row.workflow_status+','+row.dibuat_oleh +','+row.negeri_id +','+row.daerah_id +')">'+                                
                                  '<p>' + datas + '</p>' +
                                '</div>';
                            return data;
                        }
                        
                  }, 
                  { data: 'id'},
                  {
                        targets:17,
                        render: function ( data, type, row, meta ) {
                            // //console.log(row.jawatan.length)
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

          project_table.column(17).visible(false);    // To show
          project_table.column(6).visible(false);    // To show


            var customInput1 = $('<input type="text" class="form-control text-right" style="float:right;width:15%;border:1px solid grey;" id="total_bayangan" onfocusout="addTotalBayangan()">');
            $("div.top").append(customInput1);

            var customInput = $('<label style="float:right;font-family:inherit;font-size:inherit;margin-right:1%;color:grey;">Jumlah Silling Bayangan(RM) :</label>');
            $("div.top").append(customInput);   


            if({{$user}} ==4 || {{$user}} ==3)
            {
              project_table.column(6).visible(true);    // To show
            }

            var allTotal = getAllBayanan(); console.log(allTotal);

            if({{$user}} != 4)
            {
              document.getElementById("total_bayangan").disabled = true;
              document.getElementById("total_bayangan").value = number_format(allTotal);

            }
            else
            {
              if(response.data.bayangan)
              {
                document.getElementById("total_bayangan").value = number_format(response.data.bayangan.siling_bayangan);
              }
            }




    }

    function inArray(array, element) {
      return array.includes(element);
    }

    function getNegeriList(data)
    {
      ////console.log("getNeger");
      var daerah_array = [];
      var negeri_array = [];
      for (var i = 0; i < data.length; i++)
      {
        //  //console.log(data[i].negeri);
        //  //console.log(data[i].daerah);
        //  //console.log("end");
         if(data[i].row_status ==1)
         {
           if(data[i].daerah)
           {
              if(!inArray(daerah_array, data[i].daerah.nama_daerah)) {
                daerah_array.push(data[i].daerah.nama_daerah);
              }
           }

           if(data[i].negeri)
           {
              if(!inArray(negeri_array, data[i].negeri.nama_negeri)) {
                negeri_array.push(data[i].negeri.nama_negeri);
              }
           }
         }
      }

      var str1 = negeri_array.toString();
      var str2 = daerah_array.toString();

      return [str1, str2];
    }

    function convertpptTopdf(id,no_rujukan){
      const api_url = "{{env('API_URL')}}";  
      // //console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');
      // //console.log(api_token);
      update_user_api =  api_url+"api/project/convert-pptTopdf/"
      // //console.log(String(no_rujukan.replace('/','_')));
      filename=  no_rujukan.replace('/','_') + '.ppt'
      // //console.log(filename)
      axios({
        url: update_user_api,
        method: 'post',
        headers: { "Authorization": api_token, },
        data:{'id':id,'no_rujukan':no_rujukan},
        responseType: 'blob', // important
      }).then((response) => {
        ////console.log(response.data.type);
        return;
        const url = window.URL.createObjectURL(response.data);
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(url);
      });

    }

    

    function downloadPpt(id,no_rujukan)
    {  
      const api_url = "{{env('API_URL')}}";  
      ////console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');
      ////console.log(api_token);
      update_user_api =  api_url+"api/project/ppt-download/" + id
      ////console.log(String(no_rujukan.replace('/','_')));
      filename=  no_rujukan.replace('/','_') + '.ppt'
      ////console.log(filename)
      axios({
        url: update_user_api,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
      }).then((response) => {
        ////console.log(response.data.type);
        const url = window.URL.createObjectURL(response.data);
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(url);
      });
     
    }
    function downloadPdf(){
      $('#projectTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            }
        ]
    } );
    }

    function downloadExcel()
    {  
      let user_id = {{Auth::user()->id}};
        let userType = {{$user}};
        var userRole =  {{$role}};
        var negeri =  {{$negeri}}; ////console.log(negeri)
        var daerah =  {{$daerah}}; ////console.log(daerah)
        var bahagian =  {{$bahagian}}; ////console.log(bahagian)
        var penyemak= {{$penyemak}}; ////console.log(penyemak)
        var penyemak_1 =  {{$penyemak_1}}; ////console.log(penyemak_1)
        var penyemak_2 =  {{$penyemak_2}}; ////console.log(penyemak_2)
        var pengesah =  {{$pengesah}}; ////console.log(pengesah)
        
      const api_url = "{{env('API_URL')}}";  
      ////console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');
      ////console.log(api_token);
      download_uri =  api_url+"api/export/projects?id="+user_id+"&usertype="+userType+"&userRole="+userRole+"&negeri="+negeri+"&daerah="+daerah+"&bahagian="+bahagian+"&penyemak="+penyemak+"&penyemak_1="+penyemak_1+"&penyemak_2="+penyemak_2+"&pengesah="+pengesah
      ;
      filename=  'projects_list.xlsx'
      ////console.log(filename)
      axios({
        url: download_uri,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
        params: {
          user_id: {{Auth::user()->id}},
        },
      }).then((response) => {
        ////console.log(response.data.type);
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
      let userType = {{$user}}; ////console.log(userType)
        const logged_user_id = {{Auth::user()->id}};
        var redirect_var=0;
        const project_type=localStorage.getItem('project_type');
        setCookie('cookieName', project_type, 7);
        const penyemak= {{$penyemak}}; ////console.log(penyemak)
        const penyemak_1= {{$penyemak_1}}; ////console.log(penyemak_1)
        const penyemak_2= {{$penyemak_2}}; ////console.log(penyemak_2)
        const pengesah= {{$pengesah}}; ////console.log(pengesah)

        if(userType==1)
        { //daerah
            if(status==1 || status==5 || status==8 || status==12 || status==15)
            {
               redirect_var=1;
            }
            else
            {
                if(user_id==logged_user_id)
                {
                  redirect_var=1;
                }
                else
                {
                  return false;
                }
            }
        }
        if(userType==2)
        { //negeri user
            if(project_type=="negeri")
            { //negeri project
                if(status==1 || status==5 || status==8 || status==12 || status==15)
                {
                  redirect_var=1;
                }
                else if(status==2 && penyemak==1)
                {
                  redirect_var=1;
                }
                else if(status==4 && penyemak_1==1)
                {
                  redirect_var=1;
                }
                else
                {
                  
                  if(user_id==logged_user_id)
                  {
                    redirect_var=1;
                  }
                  else
                  {
                    return false;
                  }
                }
            }
            else if(project_type=="daerah")
            { //daerah project
                if(status==2 || status==4)
                {
                  redirect_var=1;
                }
                else
                {
                  // return false;
                  redirect_var=1;
                }
            }
            else
            {
              return false;
            }
        }
        if(userType==3)
        { //bahagian
          if((project_type=="daerah" || project_type=="negeri") && (status >= 7))
          {
              redirect_var=1;
          }
          else if(project_type=="bahagian")
          {
              if(status==1 || status==5 || status==8 || status==12 || status==15) //creator
              {
                  redirect_var=1;
              }
              else if(status==2 && penyemak==1) //reviewer
              {
                  redirect_var=1;
              }
              else if(status==4 && penyemak_1==1) //reviewer1
              {
                  redirect_var=1;
              }
              else if(status==7 && penyemak_2==1) //reviewer2
              {
                redirect_var=1;
              }
              else if(status==11 && pengesah==1) //validator
              {
                  redirect_var=1;
              }
              else
              {
                  if(user_id==logged_user_id)
                  {
                    redirect_var=1;
                  }
                  else
                  {
                    redirect_var=1;
                  }
              }
          }
          else
          {
            return false;
          }
        }
        if(userType==4)
        { //bkor or super admin
              if(status==1 || status==5 || status==8 || status==12 || status==15 || status==18) //creator
              {
                  redirect_var=1;
              }
              else if(status==2 && penyemak==1) //reviewer
              {
                  redirect_var=1;
              }
              else if(status==4 && penyemak_1==1) //reviewer1
              {
                  redirect_var=1;
              }
              else if(status==7 && penyemak_2==1) //reviewer2
              {
                redirect_var=1;
              }
              else if(status==11 && pengesah==1) //validator
              {
                  redirect_var=1;
              }
              else if(status==14) // for approve/reject/cancel
              {
                  redirect_var=1;
              }
              else if(status==17 || status==19 || status==20) // by rejected/approved/cancelled
              {
                  // if(user_id==logged_user_id)
                  // {
                    redirect_var=1;
                  // }
                  // else
                  // {
                  //   return false;
                  // }
              }
              else
              {
                  if(user_id==logged_user_id)
                  {
                    redirect_var=1;
                  }
                  else
                  {
                    return false;
                  }
              }
        }
        else
        {
           redirect_var=1;
        }

        localStorage.setItem("workflow_status", status);  
        var base_url = window.location.origin; 
        if(redirect_var==1){       //view
          var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}";
        }else{ //edit
          var url = "{{ route('daftar.review',[ ':id',':status',':user_id']) }}";
        }
        url = url.replace(":id", id)
        url = url.replace(":status", new_status)
        url = url.replace(":user_id", user_id)
        window.location.href = url
    }

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }


      $(document).ready(function(){
        const user_bahagian= {{$bahagian}};    
        const api_url = "{{ env('API_URL') }}";
        const api_token = "Bearer "+ window.localStorage.getItem('token');
        let user_Type_new = {{$user}};
       axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/project/rmkData",
        responseType: 'json'
        })
        .then(function (response) {
          ////console.log(response.data)
          var selectRmk=$("#rmk-dropdown");
          var rollingPlan=$("#rolling-plan");
          var bahagian=$("#bahagian");
          for(var k=0;k<response.data.data.length;k++)
          {
            selectRmk.append("<option val="+response.data.data[k].rmk+">"+response.data.data[k].rmk+"</option>")             
          }
          let first_rolling = true
          for(var j=0;j<response.data.data1.length;j++){
              var is_selectable=response.data.data1[j].is_selectable;
                // $(this).prop('disabled', true)
              rollingPlan.append("<option id="+response.data.data1[j].id+" value="+response.data.data1[j].id+">"+response.data.data1[j].name+"</option>")
              if(is_selectable==0){
                $("#"+response.data.data1[j].id+"").prop('disabled', true);
              }
              else {
                        if(first_rolling) {
                            $("#"+response.data.data1[j].id+"").attr("selected","selected"); 
                            first_rolling = false;
                        }
              }
            }
            document.getElementById("rmk-dropdown").disabled = true;

            var today = new Date();
            var year = today.getFullYear()+1;
            //  2023 March 17 by Nabilah (Remove get current year value)
            // document.getElementById("current_year").value = year;

            var projek_category =  document.getElementById("projek_category");
            $.each(response.data.kategory, function (key, item) { ////console.log(item)
                  var el = document.createElement("option");
                  el.textContent =  item.value;
                  el.value =  item.code;
                  projek_category.appendChild(el);
                })

            if(user_Type_new!=1 || user_Type_new!=2){

            for(var j=0;j<response.data.data2.length;j++){
               if(user_bahagian==response.data.data2[j].id  & user_bahagian!==0)
               {
                  bahagian.append("<option value="+response.data.data2[j].id+" selected>"+response.data.data2[j].nama_bahagian+"</option>")
               }
               else
               {
                  bahagian.append("<option value="+response.data.data2[j].id+">"+response.data.data2[j].nama_bahagian+"</option>")
               }
            }
          }

        })


        $.ajaxSetup({
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
          });

        const user_negeri= {{$negeri}};
        let logged_user_Type = {{$user}};
        //var negeridropDown =  document.getElementById("select_negeri");
            $.ajax({
                type: "GET",
                url: api_url+"api/lookup/negeri/list",
                dataType: 'json',
                success: function (result) { 
                  ////console.log(result.data)
                  var selectnegeri=$("#negeri-dropdown");
                  for(var k=0;k<result.data.length;k++)
                  {
                    if(result.data[k].id==user_negeri && user_negeri!=0)
                    {
                      selectnegeri.append("<option  value="+result.data[k].id+" selected>"+result.data[k].nama_negeri+"</option>") 
                    }
                    else
                    {
                      selectnegeri.append("<option  value="+result.data[k].id+">"+result.data[k].nama_negeri+"</option>") 
                    }
                  }
                    
                }
            });

            //document.getElementById("negeri-dropdown").value = user_negeri;
            if(user_bahagian && user_bahagian!=0)
            {
              //document.getElementById("negeri-dropdown").disabled = false;
              if(logged_user_Type!=4)
              {
              document.getElementById("bahagian").disabled = true;
              }
              else
              {
                document.getElementById("bahagian").disabled = false;
              }
              document.getElementById("no_rajukan_div").style.display = "block";
            }
            else
            {
              //document.getElementById("negeri-dropdown").disabled = true;
              document.getElementById("bahagian").disabled = false;
              document.getElementById("no_rajukan_div").style.display = "none";
            }
      })

    $('#btn_cari').click(function(){

      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");

      var formData = new FormData();
          formData.append('rmk_value', document.myform.rmk.value);
          formData.append('rolling_plan', document.myform.rolling_plan.value);
          formData.append('nama_project', document.myform.nama_project.value);
          formData.append('kod_project', document.myform.kod_project.value);
          formData.append('tahun', document.myform.current_year.value);
          formData.append('bahagian', document.myform.bahagian.value);
          // formData.append('negeri', document.myform.negeri_drop.value);
          formData.append('no_rajukan', document.myform.no_rajukan.value);
          formData.append('projek_category', document.myform.projek_category.value);


        const api_url = "{{ env('API_URL') }}";
        const api_token = "Bearer "+ window.localStorage.getItem('token');

        let user_id = {{Auth::user()->id}};
        let userType = {{$user}};
        var userRole =  {{$role}};
        var negeri =  {{$negeri}}; ////console.log(negeri)
        var daerah =  {{$daerah}}; ////console.log(daerah)
        var bahagian =  {{$bahagian}}; ////console.log(bahagian)
        var penyemak = {{$penyemak}}; ////console.log(penyemak)
        var penyemak_1 =  {{$penyemak_1}}; ////console.log(penyemak_1)
        var penyemak_2 =  {{$penyemak_2}}; ////console.log(penyemak_2)
        var pengesah =  {{$pengesah}}; ////console.log(pengesah)
        var data_url='';

        if(userType==1)
        {
          data_url = api_url+"api/project/filter-projects-of-daerah?daerah="+daerah;
        }
        else if(userType==2)
        {
          data_url = api_url+"api/project/filter-projects-of-negeri?negeri="+negeri;
        }
        else if(userType==3)
        {
          data_url = api_url+"api/project/filter-projects-of-bahagian?bahagian="+bahagian+"&pengesah="+pengesah;
        }
        else if(userType==4)
        {
          data_url = api_url+"api/project/filter-projects-of-bkor?type="+"bkor"+"&id="+user_id;
        }
        else
        {
          data_url = api_url+"api/project/filter-projects-of-bkor?type="+"non_bkor"+"&id="+user_id;
        }
        axios.defaults.headers.common["Authorization"] = api_token
        axios({
          method: 'post',
          url: data_url,
          data: formData
        })
        .then(function (response) {
           $("#projectTable").dataTable().fnDestroy();
            loadDatatable(response);
            loadcompleted();         
        })
    });

    function UpdateBayangan(project_id) { 
      let id="siling_bayangan_"+project_id; 
      let bilangan_value = document.getElementById(id).value; 

      let all_bayangan = getAllBayanan(); ////console.log(all_bayangan)
      let total = document.getElementById('total_bayangan').value;

      if(removecomma(total) < all_bayangan)
      {
        alert("Jumlah Siling bayangan bagi setiap projek tidak boleh melebihi  Siling Bayangan Tahunan");
        return false;
      }

      $abc=bilangan_value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById(id).value=$abc;

      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");

      const user_id = {{Auth::user()->id}};
      var formData = new FormData();
            formData.append('bilangan_value', removecomma(bilangan_value));
            formData.append('id', project_id);
            formData.append('user_id', user_id);
            
            const api_url = "{{env('API_URL')}}";  ////console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token'); // //console.log(api_token);
            axios({
                        method: "post",
                        url: api_url+"api/project/update-bayangan-data",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                  })
                  .then(function (response) {

                    if(response.data.code==500)
                    {
                      //alert("not found");
                      document.getElementById(id).value='0.00';
                    }
                    

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                  })
    }

    function getAllBayanan()
    {
      let siling_bayangan = document.querySelectorAll("[id^='siling_bayangan_']"); ////console.log(siling_bayangan)
      let sum =0;
      for (var i = 0;i < siling_bayangan.length; i++) {    
        
        ////console.log(siling_bayangan[i].value);
        sum=sum+parseFloat(removecomma(siling_bayangan[i].value)); ////console.log(sum);
      }
      ////console.log(sum);
      return sum;
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

        // Format number with commas and decimal points
      function formatValue(number) {
        if (isNaN(number)) {
          return '0.00';
        }

        return parseFloat(number).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      }

      function addTotalBayangan(){ 
        
        var total= document.getElementById("total_bayangan").value; //alert(total)

        $abc=total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        document.getElementById("total_bayangan").value=$abc;

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

      const user_id = {{Auth::user()->id}};
      const currentYear = new Date().getFullYear();
      var tahun = document.getElementById("current_year").value; //alert(tahun);
      var year = currentYear;
      if(tahun!='')
      {
        year = tahun;
      }

      var formData = new FormData();
            formData.append('siling_bayangan', removecomma(total));
            formData.append('year', year);
            formData.append('user_id', user_id);
            
            const api_url = "{{env('API_URL')}}";  ////console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  ////console.log(api_token);
            axios({
                        method: "post",
                        url: api_url+"api/project/update-total-bayangan-data",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                  })
                  .then(function (response) {                     

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                  })
 
      }

    // 2023 March 17 by Nabilah
    $("#btn_reset").click(function(event){ 
      ////console.log('carian permohonan form reset');
      $('#nama_project').val('');
      $('#kod_project').val('');
      $('#current_year').val('');
      $('#projek_category').val('');
      $("#no_rajukan").val('');
      //$('#negeri-dropdown').val('');
      $('#rolling-plan').val('');
      if({{$user}}!=3)
      {
        $('#bahagian').val('');
      }
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
      // //console.log(accordian_content);
      let arrow = asl.querySelector(".d_arrow");
      let Accordian_link = asl.querySelector(".Accordian_link");
      ////console.log(Accordian_link);
      if (Accordian_link.classList.contains("collapsed")) {
        ////console.log(1);
        arrow.classList.add("active");
      } else {
        ////console.log(2);
        arrow.classList.remove("active");
      }
    });
  });

</script>