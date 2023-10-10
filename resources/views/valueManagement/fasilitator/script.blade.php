<script>
      $(function(){
          $('#orderModal').modal({
              keyboard: true,
              backdrop: "static",
              show:false,
              
          }).on('show', function(){
                var getIdFromRow = $(event.target).closest('tr').data('id');
              //make your ajax call populate items or what even you need
              $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
          });
      });
    </script>

<script type="text/javascript">

  function yesnoCheck() {
      if (document.getElementById('yesCheck').checked) {
          document.getElementById('bahagian').style.display = 'block';
      }
      else document.getElementById('bahagian').style.display = 'none';
  }

  function yesnoCheckEdit() {
      if (document.getElementById('yesCheckedit').checked) {
          document.getElementById('bahagian_edit').style.display = 'block';
          $('.txbx1').attr('hidden',true);
      }
      else 
      {
        document.getElementById('bahagian_edit').style.display = 'none';
        $('.txbx1').attr('hidden',false);
      }
  
  }
  
  </script>

  <script>
    $(function() {
        $('#noCheck').click(function() {
            $('.txbx').attr('hidden',false);
        });           
        $('#yesCheck').click(function() {
            $('.txbx').attr('hidden',true);
        });
    });
  </script>

<script>
  function delbtn() {
    

        if(document.myform.fasilitator_name.value=='')
        {
            document.getElementById("error_fasilitator_name").innerHTML="Sila Tambah Nama Fasilitator"; 
			document.getElementById("fasilitator_name").focus();
			return false;
        }
        else
        {
            document.getElementById("error_fasilitator_name").innerHTML=" "; 
        }

        if(document.myform.jawatan.value=='')
        {
            document.getElementById("error_jawatan").innerHTML="Sila pilih jawatan"; 
			document.getElementById("jawatan").focus();
			return false;
        }
        else
        {
            document.getElementById("error_jawatan").innerHTML=" "; 
        }

        // if(document.myform.gred.value=='')
        // {
        //     document.getElementById("error_gred").innerHTML="Sila pilih gred"; 
		// 	document.getElementById("gred").focus();
		// 	return false;
        // }
        // else
        // {
        //     document.getElementById("error_gred").innerHTML=" "; 
        // }
        if(document.myform.bahagian.value=='')
        {
            document.getElementById("error_bahagian").innerHTML="Sila pilih bahagian"; 
			document.getElementById("bahagian").focus();
			return false;
        }
        else
        {
            document.getElementById("error_bahagian").innerHTML=" "; 
        }

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

       var bahagian = '';
       if(document.myform.inlineRadioOptions.value=='2')
       {
         bahagian = '100001';
       }
       else
       {
         bahagian = document.myform.bahagian.value;
       }
       
        var formData = new FormData();
		formData.append('fasilitator_name', document.myform.fasilitator_name.value);
		formData.append('jawatan', document.myform.jawatan.value);
		formData.append('bahagian_disabled', document.myform.bahagian_disabled.value);
		formData.append('bahagian', bahagian);
		formData.append('jabatan', document.myform.jabatan.value);
		formData.append('jawatan', document.myform.jawatan.value);
		formData.append('gred', document.myform.gred.value);
        formData.append('fasilitator_type', document.myform.inlineRadioOptions.value);
        formData.append('user_id', {{Auth::user()->id}})

      console.log(formData);

      const api_url = "{{env('API_URL')}}";  console.log(api_url);
    	const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
		$.ajaxSetup({
			headers: {
				   "Content-Type": "application/json",
				   "Authorization": api_token,
				   }
	   });
      axios({
			method: "post",
			url: api_url+"api/project/create_fasilitator",
			data: formData,
			headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
		})
			.then(function (response) {
			//handle success
			console.log(response.data.code);
			if(response.data.code === '200') {	
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                $("#add_role_sucess_modal").modal('show');
			}else {				
			}			
			})
			.catch(function (response) {
				//handle error
				console.log(response);
			});
  }

    $('.tutup').click(function(){
        $("#add_role_sucess_modal").modal('hide');
        window.location.href = '/fasilitator';

    });

    function updateFsci()
    {
        if(document.myformedit.fasilitator_name.value=='')
        {
            document.getElementById("error_edit_fasilitator_name").innerHTML="Sila Tambah Nama Fasilitator"; 
			document.getElementById("fasilitator_name_edit").focus();
			return false;
        }
        else
        {
            document.getElementById("error_edit_fasilitator_name").innerHTML=" "; 
        }
        if(document.myformedit.jawatan.value=='')
        {
            document.getElementById("error_edit_jawatan").innerHTML="Sila pilih jawatan"; 
			document.getElementById("jawatan_edit").focus();
			return false;
        }
        else
        {
            document.getElementById("error_edit_jawatan").innerHTML=" "; 
        }

        // if(document.myformedit.gred.value=='')
        // {
        //     document.getElementById("error_edit_gred").innerHTML="Sila pilih gred"; 
		// 	document.getElementById("gred_edit").focus();
		// 	return false;
        // }
        // else
        // {
        //     document.getElementById("error_edit_gred").innerHTML=" "; 
        // }
        if(document.myformedit.bahagian.value=='')
        {
            document.getElementById("error_edit_bahagian").innerHTML="Sila pilih bahagian"; 
			document.getElementById("bahagian_edit").focus();
			return false;
        }
        else
        {
            document.getElementById("error_edit_bahagian").innerHTML=" "; 
        }
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
       var bahagian = '';
       if(document.myformedit.inlineRadioOptions.value=='2')
       {
         bahagian = '100001';
       }
       else
       {
         bahagian = document.myformedit.bahagian.value;
       }
       
        var formData = new FormData();
        formData.append('id', document.myformedit.edit_id.value);
		formData.append('fasilitator_name', document.myformedit.fasilitator_name.value);
		formData.append('jawatan', document.myformedit.jawatan.value);
		formData.append('bahagian_disabled', document.myformedit.bahagian_disabled.value);
		formData.append('bahagian', bahagian);
		formData.append('jabatan', document.myformedit.jabatan.value);
		formData.append('jawatan', document.myformedit.jawatan.value);
		formData.append('gred', document.myformedit.gred.value);
        formData.append('fasilitator_type', document.myformedit.inlineRadioOptions.value);
        formData.append('user_id', {{Auth::user()->id}})

      console.log(formData);

      const api_url = "{{env('API_URL')}}";  console.log(api_url);
    	const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
		$.ajaxSetup({
			headers: {
				   "Content-Type": "application/json",
				   "Authorization": api_token,
				   }
	   });
      axios({
			method: "post",
			url: api_url+"api/project/update_fasilitator",
			data: formData,
			headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
		})
			.then(function (response) {
			//handle success
			console.log(response.data.code);
			if(response.data.code === '200') {	
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                $("#add_role_sucess_modal").modal('show');
			}else {				
			}			
			})
			.catch(function (response) {
				//handle error
				console.log(response);
			});

    }

</script>

<script>

$(document).ready(function () {   
    $('.txbx').attr('hidden',true);
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
            let user_type = {{$user}};  console.log(user_type)

            var jawatandropDown =  document.getElementById("jawatan");
            if(user_type==4){
            var jawatanEditdropDown =  document.getElementById("jawatan_edit");
            }else{
            var jawatanViewdropDown =  document.getElementById("jawatan_view");
            }

            $.ajax({
                type: "GET",
                url: api_url+"api/lookup/jawatan/list",
                dataType: 'json',
                success: function (result) { console.log(result)
                    if (result) {
                        $.each(result.data, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_jawatan;
                            el.value = opt;
                            jawatandropDown.appendChild(el);
                        })
                        if(user_type==4){
                            $.each(result.data, function (key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_jawatan;
                                el.value = opt;
                                jawatanEditdropDown.appendChild(el);
                            })
                        }else{
                            $.each(result.data, function (key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_jawatan;
                                el.value = opt;
                                jawatanViewdropDown.appendChild(el);
                            })
                            $('#jawatan_view').attr("disabled", true); 
                        }
                    }
                    else {
                        $.Notification.error(result.Message);
                    }
                }
            });

            var greddropDown =  document.getElementById("gred");
            if(user_type==4){
            var grededitdropDown =  document.getElementById("gred_edit");
            }else{
            var gredviewdropDown =  document.getElementById("gred_view");
            }

            $.ajax({
               type: "GET",
               url: api_url+"api/lookup/gredjawatan/list",
               dataType: 'json',
               success: function (result) { console.log(result)
                  if (result) {
                        $.each(result.data, function (key, item) {
                           var opt = item.id;
                           var el = document.createElement("option");
                           el.textContent = item.nama_gred;
                           el.value = opt;
                           greddropDown.appendChild(el);
                        })
                        if(user_type==4){
                            $.each(result.data, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_gred;
                            el.value = opt;
                            grededitdropDown.appendChild(el);
                            })
                        }else{
                            $.each(result.data, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_gred;
                            el.value = opt;
                            gredviewdropDown.appendChild(el);
                            })
                            $('#gred_view').attr("disabled", true); 
                        }

                  }
                  else {
                        $.Notification.error(result.Message);
                  }
               }
               
            });

            var bahagiandropDown =  document.getElementById("bahagian");
            if(user_type==4){
            var bahagianeditdropDown =  document.getElementById("bahagian_edit");
            }else{
            var bahagianviewdropDown =  document.getElementById("bahagian_view");
            }

            var bahagian_selected = {{Auth::user()->bahagian_id}}; //alert(bahagian);

            $.ajax({
                type: "GET",
                url: api_url+"api/lookup/bahagian/list",
                dataType: 'json',
                success: function (result) { console.log(result)
                    if (result) {
                        $.each(result.data, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_bahagian;
                            el.value = opt;
                            bahagiandropDown.appendChild(el);
                        })
                        if(user_type==4){
                            $.each(result.data, function (key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_bahagian;
                                el.value = opt;
                                bahagianeditdropDown.appendChild(el);
                            })
                        }else{

                            $.each(result.data, function (key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_bahagian;
                                el.value = opt;
                                bahagianviewdropDown.appendChild(el);
                            })
                            $('#bahagian_view').attr("disabled", true); 
                        }
                        document.getElementById("bahagian").value = bahagian_selected;
                        //$('#bahagian').attr("disabled", true); 

                    }
                    else {
                        $.Notification.error(result.Message);
                    }
                }
            });

            var JabatandropDown =  document.getElementById("jabatan");
            if(user_type==4){
            var JabataneditdropDown =  document.getElementById("jabatan_edit");
            }else{
            var JabatanviewdropDown =  document.getElementById("jabatan_view");
            }

            $.ajax({
                type: "GET",
                url: api_url+"api/lookup/jabatan/list",
                dataType: 'json',
                success: function (result) { console.log(result)
                if (result) {
                        $.each(result.data, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_jabatan;
                            el.value = opt;
                            JabatandropDown.appendChild(el);

                            if(item.nama_jabatan=='Jabatan Pengairan dan Saliran (JPS)')
                            {
                                document.getElementById("jabatan").value=item.id;
                            }
                        })
                        $('#jabatan').attr("disabled", true); 

                        if(user_type==4){
                            $.each(result.data, function (key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_jabatan;
                                el.value = opt;
                                JabataneditdropDown.appendChild(el);

                                if(item.nama_jabatan=='Jabatan Pengairan dan Saliran (JPS)')
                                {
                                    document.getElementById("jabatan_edit").value=item.id;
                                }
                            })
                            $('#jabatan_edit').attr("disabled", true); 
                        }else{
                            $.each(result.data, function (key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_jabatan;
                                el.value = opt;
                                JabatanviewdropDown.appendChild(el);

                                if(item.nama_jabatan=='Jabatan Pengairan dan Saliran (JPS)')
                                {
                                    document.getElementById("jabatan_view").value=item.id;
                                }
                            })
                            $('#jabatan_view').attr("disabled", true); 
                        }

                }
                else {
                        $.Notification.error(result.Message);
                }
                }
            });

        var selected = {'selected':1}; 

        $.ajax({
          type: "GET",
          url: api_url+"api/project/get-fasilitator-list",
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          data:selected,
          success: function(response) {  
                //   console.log(response) 
                loadDatatable(response);     
                
            },
            error: function(response) {
                //console.log(response);
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            }
          });  

          if({{json_encode($viewOnly)}}) {
                disableInputs()
            }
});

$("#minus_pop").click(function(){
    location.reload();
});

$("#minus_pop2").click(function(){
    location.reload();
});

$("#tutup_btn").click(function(){
    location.reload();
});

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

    function loadDatatable(response)
    {
                var count=0;
                var jps_table =$('#fasili_table').DataTable({     
                    processing: true,
                    data: response.data,
                    dom: "Blfrtip",
                    buttons: [

                        {
                            text: 'excel',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            }
                        },
                        
                    ],
                    "aaSorting": [],
                    "language": {
                            "lengthMenu": "Papar _MENU_ Entri",
                            "zeroRecords": "Tiada rekod dijumpai",
                            "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                            "infoEmpty": "Tiada rekod tersedia",
                            "infoFiltered": "(filtered from _MAX_ total records)",
                            "searchPlaceholder": " Carian",
                            "search":"_INPUT_",
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
                            render: function ( data, type, row, meta ) { 
                                if(type === 'display'){
                                    data='<div class="d-flex align-items-center" onClick="loadFasilitator(\''+row.id+'\')">' +   
                                            '<p style="cursor:pointer">' + row.nama_fasilitator +'</p>' +
                                          '</div>';
                                }
                                return data;
                            }
                        },
                        {
                            targets:1, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        $Fasilitator='<div class="d-flex align-items-center" onClick="loadFasilitator(\''+row.id+'\')">' +   
                                                        '<p style="cursor:pointer">Fasilitator</p>' +
                                                    '</div>';
                                }
                                return $Fasilitator;
                            }
                        },
                        {
                            targets:2, // Start with the last
                            render: function ( data, type, row, meta ) { //console.log(row)
                                if(type === 'display'){
                                    if(row.bahagian_id=='100001')
                                    {
                                       baha = "Bahagian Pengurusan Nilai, Unit Perancang Ekonomi";
                                    }
                                    else
                                    {
                                      baha = row.bahagian.nama_bahagian;
                                    }
                                    data='<div class="d-flex align-items-center" onClick="loadFasilitator(\''+row.id+'\')">' +   
                                            '<p style="cursor:pointer">' + baha +'</p>' +
                                          '</div>';
                                }
                                return data;
                            }
                        },
                        {
                            targets:3, // Start with the last
                            render: function ( data, type, row, meta ) {
                                    // console.log(row.bahagian.nama_bahagian)
                                if(type === 'display'){
                                    data='<div class="d-flex align-items-center" onClick="loadFasilitator(\''+row.id+'\')">' +   
                                            '<p style="cursor:pointer">' + row.jawatan.nama_jawatan +'</p>' +
                                          '</div>';
                                }
                                return data;
                            }
                        },
                        {
                            targets:4, // Start with the last
                            render: function ( data, type, row, meta ) { console.log(row.fasilitator)
                                if(type === 'display'){
                                        data='<center>'+
                                                '<input disabled type="text" class="form-control col-3 vmfasyellow" name="" id="" value="'+row.fasilitator.length+'">'+
                                              '</center>';
                                }
                                return data;
                            }
                        },
                        {
                            targets:5, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data='<center>'+
                                                '<input disabled type="text" class="form-control col-3 vmfasBlue" name="" id="" value="'+row.newfasilitator.length+'">'+
                                              '</center>';
                                }
                                return data;
                            }
                        },

        
                    ] , 
                    columns: [
                        { data: 'nama_fasilitator'  },
                        { data: 'Fasilitator'  },
                        { data: 'bahagian.nama_bahagian'  },          
                        { data: 'jawatan.nama_jawatan'  },
                        { data: 'id'  },
                        { data: 'id'  },
                    ],
                    
                        
                });
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
    }

    function loadFasilitator(id)
    {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        let user_type = {{$user}};  console.log(user_type)

        const api_url = "{{env('API_URL')}}";  console.log(api_url);
    	const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
		$.ajaxSetup({
			headers: {
				   "Content-Type": "application/json",
				   "Authorization": api_token,
				   }
	   });
        $.ajax({
          type: "GET",
          url: api_url+"api/project/get-fasilitator-list/"+id,
          dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          success: function(response) {  
                //console.log(response) 

                if(user_type==4){
                    document.getElementById("edit_id").value = response.data.data[0].id;
                    document.getElementById("fasilitator_name_edit").value = response.data.data[0].nama_fasilitator;
                    document.getElementById("jawatan_edit").value = response.data.data[0].jawatan_id;
                    document.getElementById("gred_edit").value = response.data.data[0].gred_id;
                }
                else
                {
                    document.getElementById("fasilitator_name_view").value = response.data.data[0].nama_fasilitator;
                    document.getElementById("jawatan_view").value = response.data.data[0].jawatan_id;
                    document.getElementById("gred_view").value = response.data.data[0].gred_id;
                }

                document.getElementById("jumlah").value = response.data.count;
                document.getElementById("ketua_menjadi").value = response.data.ketua_count;
                document.getElementById("fasilitator_menjadi").value = response.data.fasi_count;
                var table_data =response.data.table_data;

                const table = document.getElementById("fasi_table").innerHTML = "";
                
                $.each(table_data, function (key, item) { 

                    let data = 
                                `<tr>
                                        <td>`+key+`</td>
                                        <td>`+item['rmk']+`</td>
                                        <td>`+item['rolling_plan_name']+`</td>
                                        <td>`+item['tahun']+`</td>
                                        <td>`+item['kod_projeck']+`</td>
                                        <td>`+item['nama_projek']+`</td>
                                        <td>`+item['kos_projeck'] +' '+ item['fasilitator_type']+`</td>
                                </tr>`;   

                    $('#fasi_table').append(data);

                });

                if(response.data.data[0].fasilitator_type == '1')
                {
                    if(user_type==4){
                        document.getElementById('bahagian_edit').style.display = 'block';
                        $('.txbx1').attr('hidden',true);
                        $("#yesCheckedit").prop('checked', true);  // Checks the box
                        $("#noCheckedit").prop('checked', false); // Unchecks the box
                        document.getElementById('bahagian_edit').value=response.data.data[0].bahagian_id;
                    }
                    else
                    {
                        document.getElementById('bahagian_view').style.display = 'block';
                        $('.txbx1').attr('hidden',true);
                        $("#yesCheckview").prop('checked', true);  // Checks the box
                        $("#noCheckview").prop('checked', false); // Unchecks the box
                        document.getElementById("noCheckview").disabled = true;
                        document.getElementById("yesCheckview").disabled = false;
                        document.getElementById('bahagian_view').value=response.data.data[0].bahagian_id;  
                    }
                    $('#bahagian_edit').attr("disabled", true); 
                    $('#gred_edit').attr("disabled", true); 
                }
                else
                {
                    if(user_type==4){
                        document.getElementById('bahagian_edit').style.display = 'none';
                        $('.txbx1').attr('hidden',false);
                        $("#yesCheckedit").prop('checked', false);  // Checks the box
                        $("#noCheckedit").prop('checked', true); // Unchecks the box
                    }
                    else
                    {
                        document.getElementById('bahagian_view').style.display = 'none';
                        $('.txbx1').attr('hidden',false);
                        $("#yesCheckview").prop('checked', false);  // Checks the box
                        $("#noCheckview").prop('checked', true); // Unchecks the box
                        document.getElementById("yesCheckview").disabled = true;
                        document.getElementById("noCheckview").disabled = false;
                    }
                    $('#bahagian_edit').attr("disabled", true); 
                    $('#gred_edit').attr("disabled", true); 
                }         
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                
            },
            error: function(response) {
                console.log(response);
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            }
          });  

        $("#exampleModal").modal('show');
    }
</script>