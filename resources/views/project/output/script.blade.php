<script>

  $(document).ready(function() {
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
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
        const currentUrl = window.location.href;
        const url = new URL(currentUrl);
        const pathname = url.pathname; console.log(pathname)
        const parts = pathname.split('/'); console.log(parts[4])
        let workflow = 0;
        if(parts[4]!=='')
        {
            workflow = parts[4];   
            localStorage.setItem("workflow_status",workflow);   
        }
        else
        {
            workflow = localStorage.getItem("workflow_status");   
        }
        let userType = {{$user}}; console.log(userType)
        let projectType = localStorage.getItem("project_type");  console.log("project type ->" + projectType)
        let penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1)
        let penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2)
        let pengesah =  {{$pengesah}}; console.log(pengesah)

        if(projectType=="negeri")
        { 
            document.getElementById('indicator-negeri-view').classList.remove("d-none");
            document.getElementById('indicator-negeri-view-vertical').classList.remove("d-none");
        }
        else if(projectType=="bahagian")
        {  
            document.getElementById('indicator-bahagian-view').classList.remove("d-none");
            document.getElementById('indicator-bahagian-view-vertical').classList.remove("d-none");
        }
        else
        { 
            document.getElementById('indicator-daerah').classList.remove("d-none");
            document.getElementById('indicator-daerah-vertical').classList.remove("d-none");
        }
        
          if(workflow==1)
          {
              document.getElementById('daerah_penya_view').classList.add("yellow");
              document.getElementById('baha_penya_view').classList.add("yellow");
              document.getElementById('negeri_penya_view').classList.add("yellow");            
          }
          else if(workflow==2 || workflow==3 || workflow==5)
          {
              document.getElementById('daerah_penyamak_view').classList.add("yellow");
              document.getElementById('baha_penyamak_view').classList.add("yellow");
              document.getElementById('negeri_penyamak_view').classList.add("yellow");            
          }
          else if(workflow==4 || workflow==6 || workflow==8)
          {
              document.getElementById('daerah_penya1_view').classList.add("yellow");
              document.getElementById('baha_penya1_view').classList.add("yellow");
              document.getElementById('negeri_penya1_view').classList.add("yellow");            
          }
          else if(workflow==7 || workflow==10 || workflow==12)
          {
              document.getElementById('daerah_penya2_view').classList.add("yellow");
              document.getElementById('baha_penya2_view').classList.add("yellow");
              document.getElementById('negeri_penya2_view').classList.add("yellow");            
          }
          else if(workflow==11 || workflow==13 || workflow==15) 
          {
              document.getElementById('daerah_pengesah_view').classList.add("yellow");
              document.getElementById('baha_pengesah_view').classList.add("yellow");
              document.getElementById('negeri_pengesah_view').classList.add("yellow");            
          }
          else if(workflow==14 || workflow==17 || workflow==18) 
          {
              document.getElementById('daerah_bkor_view').classList.add("yellow");
              document.getElementById('baha_bkor_view').classList.add("yellow");
              document.getElementById('negeri_bkor_view').classList.add("yellow");
          }
          else
          {
              
          }

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

    // --------------------

    axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/projects/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data; console.log(data.tahun_jangka_mula); console.log(data.tahun_jangka_siap);
            loadcompleted();  
            if(data.tahun_jangka_mula != data.tahun_jangka_siap )
            {
                $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years)
                var tr = document.getElementById('table').tHead.children[1]; //console.log(tr);  table
                
                var colspan = document.getElementById('table').rows[0].cells[4]; console.log(colspan)
                colspan.colSpan = $years.length;
                for (i = 0; i < $years.length; i++) {
                        th = document.createElement('th');
                        th.innerHTML = $years[i];
                        tr.appendChild(th);  
                }
                var tr_new = document.getElementById('mytable').tHead.children[0]; //console.log(tr); popup-table
                var table_pop= document.getElementById("pop-tr");  console.log(table_pop)
                for (j = 0; j < $years.length; j++) {         
                        th_new = document.createElement('th');
                        th_new.innerHTML = $years[j];   
                        tr_new.appendChild(th_new);   
                        
                        var cell = table_pop.insertCell(j);
                        var Div = '<div class="form-group"><input type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}"  value="0" name="yr_'+parseInt(j+1)+'" class="form-control" style="width: 80%;" value=""/></div>';
                        cell.innerHTML = Div;
                }
            }
            else
            {

                var tr = document.getElementById('table').tHead.children[1]; //console.log(tr);  table
                
                var colspan = document.getElementById('table').rows[0].cells[4]; console.log(colspan)
                colspan.colSpan = 1;
                localStorage.setItem("colspan", 1);

                th = document.createElement('th');
                        th.innerHTML = data.tahun_jangka_mula;
                        tr.appendChild(th);  

                var tr_new = document.getElementById('mytable').tHead.children[0]; //console.log(tr); popup-table
                var table_pop= document.getElementById("pop-tr");  console.log(table_pop)
                
                th_new = document.createElement('th');
                        th_new.innerHTML = data.tahun_jangka_mula;   
                        tr_new.appendChild(th_new);   
                        
                        var cell = table_pop.insertCell(0);
                        var Div = '<div class="form-group"><input type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}"  value="0" name="yr_1" class="form-control" value=""/></div>';
                        cell.innerHTML = Div;

            }
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
      // ---------------------------
      axios.defaults.headers.common["Authorization"] = api_token
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/list-project-kpi/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data; console.log(data)
            var colspan= window.localStorage.getItem('colspan'); console.log(colspan)
            if(data.length>0)
            {
              var table = document.getElementById("grid_body");
                for(let i=0;i<data.length;i++)
                {
                    console.log(data[i])
                    var kuntati = data[i].kuantiti;
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerHTML = i+1;
                    cell2.innerHTML = kuntati;
                    cell3.innerHTML = data[i].output_unit.nama_unit;
                    cell4.innerHTML = data[i].penerangan;
                    
                    var cells_count=4;
                    var yrs='';
                    for(let j=1;j<=colspan;j++)
                    {
                      var cell = row.insertCell(cells_count);
                         if(j==1){ 
                          yrs= number_format(data[i].yr_1); 
                        } else if(j==2){ 
                          yrs= number_format(data[i].yr_2); 
                        } else if(j==3){ 
                          yrs= number_format(data[i].yr_3);
                        } else if(j==4){ 
                          yrs= number_format(data[i].yr_4); 
                        } else if(j==5){ 
                          yrs= number_format(data[i].yr_5);
                        } else if(j==6){ 
                          yrs= number_format(data[i].yr_6); 
                        } else if(j==7){ 
                          yrs= number_format(data[i].yr_7);
                        } else if(j==8){ 
                          yrs= number_format(data[i].yr_8); 
                        } else if(j==9){ 
                          yrs= number_format(data[i].yr_9);
                        } else { 
                          yrs= number_format(data[i].yr_10); 
                        }
                         if(yrs==null)
                         {
                          yrs=0;
                         }
                         else
                         {
                           yrs= yrs;
                         }
                          cell.innerHTML = yrs;
                      cells_count=cells_count+1;
                    }

                    let totalRowCount = table.rows[i].cells.length; 

                    var Div ='<button type="button" class="edit" id="edit_kpi" onClick="editKPI(\''+data[i].id+'\')" style="border:none !important;"><i class="ri-pencil-fill ri-xl"></i></button>'+
                    '<button type="button" class="kpi_minus" onClick="deleteKPI(\''+data[i].id+'\')" style="border:none !important;background: transparent !important;"><i class="ri-checkbox-indeterminate-line ri-xl"></i></button>';

                    var cell_new = row.insertCell(totalRowCount);
                    cell_new.innerHTML = Div;
                 
                }
            }
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
             // -----------------------------     


    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });

    var popupunit =  document.getElementById("unit");
    var unitoptions =  "";
    $.ajax({
        type: "GET",        
        url: api_url+"api/project/unit-details",
        dataType: 'json',
        success: function (result) { 
          console.log(result.data)
          if (result) {
            //   $.each(result.data, function (key, item) {
            //     var opt = item.id;
            //     var el = document.createElement("option");
            //     el.textContent = item.nama_unit;
            //     el.value = opt;
            //     popupunit.appendChild(el);
            //     unitoptions = unitoptions + '<option value="' + item.id + '">' + item.nama_unit + '</option>'
            // })       
          }
          else {
                    $.Notification.error(result.Message);
                }
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
          },
          error: function(error) {
              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
          }
    });
    $("#simpan_pop").click(function(){

      var formData = new FormData();
          if(!document.myform.kuantity.value)
          {
            document.getElementById("kuantity").style.borderColor = 'red'
            document.getElementById("kuantity_error").innerHTML = 'Sila masukkan kuantiti'
            document.getElementById("kuantity_error").focus();
            return false; 
          }
          else
          {
            document.getElementById("kuantity").style.borderColor = '#ced4da'
            document.getElementById("kuantity_error").innerHTML = ''
          }
          if(!document.myform.unit.value || document.myform.unit.value=='0')
          {
            document.getElementById("unit").style.borderColor = 'red'
            document.getElementById("unit_error").innerHTML = 'Sila unit ini'
            document.getElementById("unit_error").focus();
            return false; 
          }
          else
          {
            document.getElementById("unit").style.borderColor = '#ced4da'
            document.getElementById("unit_error").innerHTML = ''
          }
          if(!document.myform.penerangan.value)
          {
            document.getElementById("penerangan").style.borderColor = 'red'
            document.getElementById("penerangan_error").innerHTML = 'Sila penerangan ini'
            document.getElementById("penerangan_error").focus();
            return false; 
          }
          else
          {
            document.getElementById("penerangan").style.borderColor = '#ced4da'
            document.getElementById("penerangan_error").innerHTML = ''
          }

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");

          submitOutputData();
          
          
          formData.append('project_id', {{$id}});
          formData.append('user_id', {{Auth::user()->id}})
          formData.append('kuantiti', document.myform.kuantity.value);
          formData.append('unit', document.myform.unit.value);
          formData.append('penerangan', document.myform.penerangan.value);
          if(document.myform.yr_1)
          {
            formData.append('yr_1', document.myform.yr_1.value);
          }else{ 
            formData.append('yr_1', 0);}
            if(document.myform.yr_2)
          {
            formData.append('yr_2', document.myform.yr_2.value);
          }else{ 
            formData.append('yr_2', 0);}
          if(document.myform.yr_3)
          {
            formData.append('yr_3', document.myform.yr_3.value);
          }else{ 
            formData.append('yr_3', 0);}
          
          if(document.myform.yr_4)
          {
            formData.append('yr_4', document.myform.yr_4.value);
          }else{ 
            formData.append('yr_4', 0);}
          
          if(document.myform.yr_5)
          {
            formData.append('yr_5', document.myform.yr_5.value);
          }else{ 
            formData.append('yr_5', 0);}
          
          if(document.myform.yr_6)
          {
            formData.append('yr_6', document.myform.yr_6.value);
          }else{ 
            formData.append('yr_6', 0);}
          
          if(document.myform.yr_7)
          {
            formData.append('yr_7', document.myform.yr_7.value);
          }else{ 
            formData.append('yr_7', 0);}

          if(document.myform.yr_8)
          {
            formData.append('yr_8', document.myform.yr_8.value);
          }else{ 
            formData.append('yr_8', 0);}

          if(document.myform.yr_9)
          {
            formData.append('yr_9', document.myform.yr_9.value);
          }else{ 
            formData.append('yr_9', 0);}
          
          if(document.myform.yr_10)
          {
            formData.append('yr_10', document.myform.yr_10.value);
          }else{ 
            formData.append('yr_10', 0);}

            console.log(formData);
            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
            axios({
                    method: "post",
                    url: api_url+"api/project/add-project-kpi",
                    data: formData,
                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                })
            .then(function (response) { console.log(response.data.code);
                         
                          $("#Tambah_data_modal").modal('hide');
                          if(response.data.code === '200') {	 
                              $("#vms_modal").modal('show');
                          }else {	 
                            $("#sucess_modal").modal('show');
                          }			
                          $("div.spanner").removeClass("show");
                          $("div.overlay").removeClass("show");
            })
            .catch(function (response) {
              //handle error
              console.log(response);
              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
              alert("There was an error submitting data");
            });
    });
    $('#tutup_new').click(function(){ console.log(origin)
      const project_id = {{$id}};  console.log(project_id);
       // window.location.href = origin + '/project/section/'+project_id+'/output';
       var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'output']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
      });


    
    var outcomeunit =  document.getElementById("outcomeunit");
    $.ajax({
        type: "GET",        
        url: api_url+"api/project/unit-details",
        dataType: 'json',
        success: function (result) { 
            // console.log(result)
            // $('#outcomeunit').empty();
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
          var el = document.createElement("option");
					el.textContent = item.nama_unit;
					el.value = opt;
					outcomeunit.appendChild(el); 
                
        })
            
      }
            
      else {
                $.Notification.error(result.Message);
            }
        
      }
    });
  

var cmboutputunit =  document.getElementById("outputunit");
    $.ajax({
        type: "GET",        
        url: api_url+"api/project/unit-details",
        dataType: 'json',
        success: function (result) { 
            // console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
          var el = document.createElement("option");
					el.textContent = item.nama_unit;
					el.value = opt;
					cmboutputunit.appendChild(el);
          
                
        })
            
      }
            
      else {
                $.Notification.error(result.Message);
            }
        
      }
    });

    


    
  
// let output_outcome_html = [output_html, outcome_html];
// let output_outcome_data = document.querySelectorAll(".output_outcome_data");

// let output_outcome_add_btns = document.querySelectorAll(
//   ".outcome_custom_width button"
// );
// let outcome_minus = document.querySelectorAll(".outcome_minus");
// if (output_outcome_add_btns) {
//   console.log(output_outcome_add_btns);
//   output_outcome_add_btns.forEach((btn, i) => {
//     btn.addEventListener("click", () => {
//       btn.parentElement.nextElementSibling.innerHTML += output_outcome_html[i];
//       let outcome_minus = document.querySelectorAll(".outcome_minus");
//       outcome_minus.forEach((minus) => {
//         minus.addEventListener("click", () => {
//           minus.closest(".output_outcome_data").remove();
//         });
//       });
//     });
//   });
//   outcome_minus.forEach((minus) => {
//     minus.addEventListener("click", () => {
//       minus.closest(".output_outcome_data").remove();
//     });
//   });
// }

let add_subrow = document.querySelectorAll(".add_subrow");
let component_tr = `<tr class="d-row">
<td>
  <div class="d-flex">
    <input
      class="form-control"
      
    />
    <button class="ml-auto component_row_minus">
      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
    </button>
  </div>
</td>
<td>
  <input
    type="text"
    
    class="form-control "
  />
</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>`;
let secondTable = `<tr>
<td>
  <div class="d-flex">
    <label for="" class="col-4 align-self-center"
      >Jawatan</label
    >
    <input
      type="text"
      class="form-control col"
     
    />
    <button class="ml-auto sub-tr-btn-second">
      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
    </button>
  </div>
</td>
<td></td>
<td></td>
<td></td>
<td>
  <input
    type="text"
    value="25,000"
    class="form-control bg-light"
  />
</td>
<td></td>
<td></td>
<td></td>
</tr>`;
let Information_add = document.querySelector(".Information_add");

if (Information_add) {
  $(".add_subrow").bind("click", function () {
    var $this = $(this),
      $parentTR = $this.closest("tr");
    $(component_tr).insertAfter($parentTR);
    let component_row_minus = document.querySelectorAll(".component_row_minus");
    component_row_minus.forEach((row_btn) => {
      row_btn.addEventListener("click", () => {
        row_btn.closest("tr").remove();
      });
    });
  });
  let component_row_minus = document.querySelectorAll(".component_row_minus");
  component_row_minus.forEach((row_btn) => {
    row_btn.addEventListener("click", () => {
      row_btn.closest("tr").remove();
    });
  });

  let information_table_data = `
<td>
  <div class="d-flex">
    <input
      class="form-control text-left rounded-0"
      value=""
    />
    <button class="ml-auto Information_minus">
      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
    </button>
  </div>
</td>
<td>
  <input
    type="text"
    class="form-control"
    
  />
</td>
<td>
  <input
    type="text"
    class="form-control"
   
  />
</td>
<td>
  <input
    type="text"
    class="form-control"
   
  />
</td>
<td>
  <input
    type="text"
    class="form-control"
   
  />
</td>
<td>
  <input
    type="text"
    class="form-control"
    
  />
</td>
<td>
  <input
    type="text"
    class="form-control"
    
  />
</td>
<td>
  <input
    type="text"
    class="form-control"
    
  />
</td>
`;
  let Information_minus = document.querySelectorAll(".Information_minus");
  Information_minus.forEach((minus) => {
    minus.addEventListener("click", () => {
      minus.closest("tr").remove();
    });
  });
  Information_add.addEventListener("click", () => {
    let tr = document.createElement("tr");
    tr.innerHTML = information_table_data;
    Information_add.closest("tbody").appendChild(tr);
    let Information_minus = document.querySelectorAll(".Information_minus");
    Information_minus.forEach((minus) => {
      minus.addEventListener("click", () => {
        minus.closest("tr").remove();
      });
    });
  });

  $(".add-tr-btn-second").bind("click", function () {
    var $this = $(this),
      $parentTR = $this.closest("tr");
    $(secondTable).insertAfter($parentTR);
    let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
    subTrSecond.forEach((row_btn) => {
      row_btn.addEventListener("click", () => {
        row_btn.closest("tr").remove();
      });
    });
  });
  let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
  subTrSecond.forEach((row_btn) => {
    row_btn.addEventListener("click", () => {
      row_btn.closest("tr").remove();
    });
  });
}    

    $("#simpan").click(function(){

      var formData = new FormData();
      let all_outputcomment = document.querySelectorAll(
      "[id^='txtoutputcomment']"
    );
    let all_outputkuantiti = document.querySelectorAll(
      "[id^='txtoutputkuantiti']"
    );
    let all_outputunit = document.querySelectorAll(
      "[id^='outputunit']"
    );
    let all_outcomecomment = document.querySelectorAll(
      "[id^='txtoutcomecomment']"
    );
    let all_outcomekuantiti = document.querySelectorAll(
      "[id^='txtoutcomekuantiti']"
    );
    let all_outcomeunit = document.querySelectorAll(
      "[id^='outcomeunit']"
    );
    let all_output_div = document.querySelectorAll(
      "[id^='outputdiv']"
    );
    let all_outcome_div = document.querySelectorAll(
      "[id^='outcomediv']"
    );

    output = []  
    for (var i = 0;i < all_output_div.length; i++) {                         
        data= {};
        data.output_proj = all_outputcomment[i].value
        data.Kuantiti= all_outputkuantiti[i].value
        data.unit_id = all_outputunit[i].value
        output.push(JSON.stringify(data))
    }

    outcome = []  
    for (var i = 0;i < all_outcome_div.length; i++) {                         
        data= {};
        data.Projek_Outcome = all_outcomecomment[i].value
        data.Kuantiti= all_outcomekuantiti[i].value
        data.unit_id = all_outcomeunit[i].value
        outcome.push(JSON.stringify(data))
    }

    output.forEach((item) => {
      formData.append('output[]', item);
    });

    outcome.forEach((item) => {
      formData.append('outcome[]', item);
    });    
      

    var Permohonan_Projek_id=$("#project_id").val(); 
        
    formData.append("Permohonan_Projek_id",Permohonan_Projek_id);

    formData.append('user_id', {{Auth::user()->id}})

    //console.log(formdata);

    console.log(outcome)
    console.log(output)
            //console.log(impak)

    var api_token = "Bearer "+ window.localStorage.getItem('token');
    axios({

      method: 'POST',
      url: api_url+"api/project/outputpage-details/"+$('#project_id').val(),
      responseType: 'json',
      data:formData,   
      headers: {
          "Content-Type": "application/json",
          "Authorization": api_token,
      },     
    })

      //var outcome_proj=$("#txtoutcomecomment").val(); 
      //var outcome_Kuantiti=$("#txtoutcomekuantiti").val(); 
      //var outcome_unit_id=$("#outcomeunit").val();      
      

      //formData = new FormData();
      //formData.append("Permohonan_Projek_id",Permohonan_Projek_id);
      //formData.append("Projek_Outcome", outcome_proj);
      //formData.append("Kuantiti", outcome_Kuantiti);
      //formData.append("unit_id", outcome_unit_id);

    //axios({

      //method: 'POST',
      //url: api_url+"api/project/outcomepage-details/"+$('#project_id').val(),
      //responseType: 'json',
      //data:formData,   
      //headers: {
          //Content-Type": "application/json",
          //"Authorization": api_token,
      //},     
    //})

      .then(function (result) {
        console.log(result.data)
        if(result.data.status=='Success'){
          //$("#add_role_sucess_modal").modal('show');
             $("#vms_modal").modal('show')
            $("#tutup_new").click(function(){
              var reload= location.reload();                    
              
            })
        }
      })
      
    });

//******************************************************************

let units=""



axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/project/outputpage-details/"+$('#project_id').val(),
        responseType: 'json'        
        })
        .then(function (response) { console.log('unitoptions'); console.log(unitoptions)
            console.log(response)
            output = response.data.data.output
            outcome = response.data.data.outcome
            // <input type="text" class="form-control" id="txtoutputcomment" value="`+item.output_proj+`" />

            var dropunit =  document.getElementById("unit");
            var unitoptionsdrop =  "";
              if (response.data.data.unit) {
                  $.each(response.data.data.unit, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_unit;
                    el.value = opt;
                    dropunit.appendChild(el);
                    unitoptionsdrop = unitoptionsdrop + '<option value="' + item.id + '">' + item.nama_unit + '</option>'
                })       
              }
            
                      
            if(output.length > 0) {
              $('#mainoutputcontainer').empty();
              output.forEach((item) => {

                let output_template = `<div class="row output_outcome_data mb-2" id="outputdiv">
                  <div class="col-lg-1 col-xs-12">
                    <label class="outputCount my-1" value="1" id="mainNumbering">1.</label>
                  </div>
                  <div class="col-lg-5 col-xs-12 p-0">
                    <div class="input_form_group col-12 my-1">
                      <textarea type="text" class="form-control" id="txtoutputcomment" value="`+item.output_proj+`" cols="3" rows="2">`+item.output_proj+`</textarea>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-12 p-0">
                    <div class="row m-0 align-items-center output_gap">
                      <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                        >Kuantiti/Bilangan
                      </label>
                      <div
                        class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                      >
                        <input
                          type="number"
                          class="form-control px-2"
                          value="`+item.Kuantiti+`" 
                          id="txtoutputkuantiti"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xs-8 p-0">
                    <div class="row m-0 align-items-center output_gap">
                      <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                        >Unit
                      </label>
                      <div
                        class="form-group input_form_group my-1 col-lg-10 col-xs-12">
                        <select type="text" class="form-control px-2" id="outputunit">
                        <option value="">--Pilih--</option>
                        `+unitoptionsdrop+`  
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-xs-12 pt-2">
                    <button class="outcome_minus " style="border:none !important;background: transparent !important; float: right;">
                      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button>
                  </div>
                </div>`;
                
                // let output_outcome_html = [output_html, outcome_html];
                // let output_outcome_data = document.querySelectorAll(".output_outcome_data");

                // let output_outcome_add_btns = document.querySelectorAll(
                //   ".outcome_custom_width button"
                // );
                // let outcome_minus = document.querySelectorAll(".outcome_minus");
                // if (output_outcome_add_btns) {
                //   console.log(output_outcome_add_btns);
                //   output_outcome_add_btns.forEach((btn, i) => {
                //     btn.addEventListener("click", () => {
                //       btn.parentElement.nextElementSibling.innerHTML += output_outcome_html[i];
                //       let outcome_minus = document.querySelectorAll(".outcome_minus");
                //       outcome_minus.forEach((minus) => {
                //         minus.addEventListener("click", () => {
                //           minus.closest(".output_outcome_data").remove();
                //         });
                //       });
                //     });
                //   });
                //   outcome_minus.forEach((minus) => {
                //     minus.addEventListener("click", () => {
                //       minus.closest(".output_outcome_data").remove();
                //     });
                //   });
                // }


                
                 $('#mainoutputcontainer').append(output_template);

                 

                 

                });

              }            

              // <input type="text" class="form-control" id="txtoutcomecomment" value="`+item.Projek_Outcome+`" />

                 if(outcome.length > 0) {
                  $('#mainoutcomecontainer').empty();
                  outcome.forEach((item) => {
                let outcome_template = `<div class="row output_outcome_data mb-2" id="outcomediv">
                  <div class="col-lg-1 col-xs-12">
                    <label class="outputCount my-1" value="1" id="secNumbering">1.</label>
                  </div>
                  <div class="col-lg-5 col-xs-12 p-0">
                    <div class="input_form_group col-12 my-1">
                      <textarea type="text" class="form-control" id="txtoutcomecomment" value="`+item.Projek_Outcome+`">`+item.Projek_Outcome+`</textarea>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-12 p-0">
                    <div class="row m-0 align-items-center output_gap">
                      <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                        >Kuantiti/Bilangan
                      </label>
                      <div
                        class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                      >
                        <input
                          type="number"
                          class="form-control px-2"
                          value="`+item.Kuantiti+`"
                          id="txtoutcomekuantiti"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xs-8 p-0">
                    <div class="row m-0 align-items-center output_gap">
                      <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                        >Unit
                      </label>
                      <div
                        class="form-group input_form_group m-0 col-lg-10 col-xs-12">
                        <select type="text" class="form-control px-2" id="outcomeunit">
                        <option value="">--Pilih--</option> 
                        `+unitoptionsdrop+`
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-xs-12 pt-2">
                    <button class="outcome_minus" style="border:none !important;background: transparent !important; float: right;"> 
                      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button>
                  </div>
                </div>`;              
                
                
                 $('#mainoutcomecontainer').append(outcome_template);


                 
                //  <option value="1">Batang</option>
                //         <option value="2">Blok</option>
                //         <option value="3">Kilometer, km</option>
                //         <option value="4">Ringgit Malaysia, RM</option>
                //         <option value="5">Unit</option>
                //         <option value="6">Meter, m</option>
                //         <option value="7">Meter Padu, m3</option>
                //         <option value="8">Hektar, Ha</option>
                //         <option value="9">Bilangan</option>
                //         <option value="10">Lain-lain</option>
                //         <option value="11">Orang</option>

              //   let all_outcome_btn = document.querySelectorAll(
              //       "[id^='outcome_button']"                    
              //   ); 
              //   let all_outcome_div = document.querySelectorAll(
              //       "[id^='outcome_details']"                    
              //   ); 
                
              //   all_outcome_btn.forEach((tb, i) => {                    
              //       tb.addEventListener("click", () => {
              //           all_outcome_div[i].remove();                        
              //       });
              //   }); 
               }); 

               

               let all_outputunit = document.querySelectorAll(
                "[id^='outputunit']"
              );
              var j=0;
              output.forEach((item) => {
                console.log("Hello");
                all_outputunit[j].value=item.unit_id;
                j++;
                });

                let all_outcomeunit = document.querySelectorAll(
                "[id^='outcomeunit']"
              );
              j=0;
              outcome.forEach((item) => {
                all_outcomeunit[j].value=item.unit_id;
                j++;
                });
                let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                all_main_indexing.forEach((num, i) => {
                  num.innerHTML = i + 1+'.'
                })
                let indexing = document.querySelectorAll("[id^='secNumbering']");
                  indexing.forEach((num, k) => {
                    num.innerHTML = k + 1+'.'
                  })
              
            }

            // var countOutput=$('.outputCount').html(function(i, val) { return val*1+1+'.' });
            // // console.log(countOutput.val.length+1);
            // <label class="m-2" id="outputCount" class="outputCount">`+(countOutput.val.length+1)+`</label>
            // <input type="text" class="form-control" id="txtoutputcomment" />

            let output_html = `<div class="row output_outcome_data mb-2" id="outputdiv">
              <div class="col-lg-1 col-xs-12">
                <label class="outputCount my-1" value="1" id="mainNumbering">1.</label>
              </div>
              <div class="col-lg-5 col-xs-12 p-0">
                <div class="input_form_group col-12 my-1">
                  <textarea type="text" class="form-control" id="txtoutputcomment" cols="3" rows="2"></textarea>
                </div>
              </div>
              <div class="col-lg-3 col-xs-12 p-0">
                <div class="row m-0 align-items-center output_gap">
                  <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                    >Kuantiti/Bilangan
                  </label>
                  <div
                    class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                  >
                    <input
                      type="number"
                      class="form-control px-2"
                      value="" 
                      id="txtoutputkuantiti"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-xs-8 p-0">
                <div class="row m-0 align-items-center output_gap">
                  <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                    >Unit
                  </label>
                  <div
                    class="form-group input_form_group my-1 col-lg-10 col-xs-12">
                    <select type="text" class="form-control px-2" id="outputunit">
                    <option value="">--Pilih--</option> 
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-1 col-xs-12 pt-2">
                <button type="button" class="outcome_minus " style="border:none !important;background: transparent !important; float: right;">
                  <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
              </div>
              </div>`;
              let outcome_html = `<div class="row output_outcome_data mb-2" id="outcomediv">
                <div class="col-lg-1 col-xs-12">
                  <label class="outputCount my-1" value="1" id="secNumbering">1.</label>
                </div>
                <div class="col-lg-5 col-xs-12 p-0">
                  <div class="input_form_group col-12 my-1">
                    <textarea type="text" class="form-control" id="txtoutcomecomment" cols="3" rows="2"></textarea>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-12 p-0">
                  <div class="row m-0 align-items-center output_gap">
                    <label for="Tema" class="col-lg-7 col-xs-12 pr-0 my-1"
                      >Kuantiti/Bilangan
                    </label>
                    <div
                      class="form-group input_form_group my-1 col-lg-5 col-xs-12"
                    >
                      <input
                        type="number"
                        class="form-control px-2"
                        value="" 
                        id="txtoutcomekuantiti"
                      />
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-xs-8 p-0">
                  <div class="row m-0 align-items-center output_gap">
                    <label for="Tema" class="col-lg-2 col-xs-12 pr-0 my-1"
                      >Unit
                    </label>
                    <div
                      class="form-group input_form_group my-1 col-lg-10 col-xs-12">
                      <select type="text" class="form-control px-2" id="outcomeunit">
                      <option value="">--Pilih--</option> 
                      </select>
                    </div>
                  </div>
                </div>

              <div class="col-lg-1 col-xs-12 pt-2">
                <button type="button" class="outcome_minus" style="border:none !important;background: transparent !important; float: right;">
                  <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
              </div>
              </div>`;
            
                let output_outcome_html = [output_html, outcome_html];
                let output_outcome_data = document.querySelectorAll(".output_outcome_data");

                let output_outcome_add_btns = document.querySelectorAll(
                  ".outBtn"
                );
                
                let outcome_minus = document.querySelectorAll(".outcome_minus");
                if (output_outcome_add_btns) {
                  console.log(output_outcome_add_btns);
                  // console.log(output_outcome_add_btns[0].id);
                  // console.log(output_outcome_add_btns[1].id);
                
                  output_outcome_add_btns.forEach((btn, i) => {
                    btn.addEventListener("click", () => {
                      //----------------------------------------------------
                        axios.defaults.headers.common["Authorization"] = api_token
                        axios({
                          method: 'get',
                          url: api_url+"api/project/outputpage-details/"+$('#project_id').val(),
                          responseType: 'json'        
                        })
                        .then(function (response) { 
                            // console.log(response)
                            output = response.data.data.output
                            outcome = response.data.data.outcome
                            

                            let all_outputunit = document.querySelectorAll(
                                "[id^='outputunit']"
                              );

                              var j=0;
                              output.forEach((item) => {
                                all_outputunit[j].value=item.unit_id;
                                j++;
                                });

                                let all_outcomeunit = document.querySelectorAll(
                                "[id^='outcomeunit']"
                              );
                              j=0;
                              outcome.forEach((item) => {
                                all_outcomeunit[j].value=item.unit_id;
                                j++;
                                });
                                
                                
                          })

                          console.log(btn.id)
                          
                          if(btn.id=='outputBtn'){
                            $('#mainoutputcontainer').append(output_outcome_html[0]);

                            let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
        
                            all_main_indexing.forEach((num, i) => {
                              num.innerHTML = i + 1+'.'
                            })

                            let all_outputunitnew = document.querySelectorAll(
                                "[id^='outputunit']"
                              );

                              if(all_outputunitnew.length>0){

                                var cmboutputunitnew =  all_outputunitnew[all_outputunitnew.length-1];
                                $.ajax({
                                    type: "GET",        
                                    url: api_url+"api/project/unit-details",
                                    dataType: 'json',
                                    success: function (result) { 
                                        // console.log(result)
                                        if (result) {
                                            $.each(result.data, function (key, item) {
                                            var opt = item.id;
                                            var el = document.createElement("option");
                                            el.textContent = item.nama_unit;
                                            el.value = opt;
                                            cmboutputunitnew.appendChild(el);     
                                    })
                                        
                                  }
                                        
                                  else {
                                            $.Notification.error(result.Message);
                                        }
                                    
                                  }
                                });
                                }
                          }
                          if(btn.id=='outcomeBtn'){
                            $('#mainoutcomecontainer').append(output_outcome_html[1]);
                            
                            let indexing = document.querySelectorAll("[id^='secNumbering']");
                                indexing.forEach((num, k) => {
                                  num.innerHTML = k + 1+'.'
                                })

                                let all_outcomeunitnew = document.querySelectorAll(
                                "[id^='outcomeunit']"
                              );
                              

                              if(all_outcomeunitnew.length>0){

                                var cmboutcomeunitnew =  all_outcomeunitnew[all_outcomeunitnew.length-1];
                                $.ajax({
                                    type: "GET",        
                                    url: api_url+"api/project/unit-details",
                                    dataType: 'json',
                                    success: function (result) { 
                                        // console.log(result)
                                        if (result) {
                                            $.each(result.data, function (key, item) {
                                            var opt = item.id;
                                            var el = document.createElement("option");
                                            el.textContent = item.nama_unit;
                                            el.value = opt;
                                            cmboutcomeunitnew.appendChild(el);     
                                        })
                                        
                                  }
                                        
                                  else {
                                            $.Notification.error(result.Message);
                                        }
                                    
                                  }
                                });
                              }
                          }

                      // btn.parentElement.nextElementSibling.innerHTML += output_outcome_html[i];

                      //--------------------------------------------------------------------------
                              
                              

                      
                        
                      // axios.defaults.headers.common["Authorization"] = api_token
                      //   axios({
                      //     method: 'get',
                      //     url: api_url+"api/project/unit-details",
                      //     responseType: 'json'        
                      //   })
                      //   .then(function (response) { 
                      //       console.log(response)
                      //       output = response.data.data
                            
                            

                      //       let all_outputunit = document.querySelectorAll(
                      //           "[id^='outputunit']"
                      //         );
                      //         var j=0;
                      //         output.forEach((item) => {
                      //           console.log("Hello");
                      //           all_outputunit[j].value=item.unit_id;
                      //           j++;
                      //           });

                      //           let all_outcomeunit = document.querySelectorAll(
                      //           "[id^='outcomeunit']"
                      //         );
                      //         j=0;
                      //         outcome.forEach((item) => {
                      //           all_outcomeunit[j].value=item.unit_id;
                      //           j++;
                      //           });
                      //     })
                      //---------------------------------------------------------------------------


                      let outcome_minus = document.querySelectorAll(".outcome_minus");
                      outcome_minus.forEach((minus) => {
                        minus.addEventListener("click", () => {
                          minus.closest(".output_outcome_data").remove();
                        });
                      });
                    });
                  });
                  outcome_minus.forEach((minus) => {
                    minus.addEventListener("click", () => {
                      minus.closest(".output_outcome_data").remove();
                    });
                  });
                }   
       })
    

    //************************************************************ */

    // $.ajax({
    //       type: "GET",
    //       url: api_url+"api/project/outcomepage-details/"+$('#project_id').val(),
    //       dataType: 'json',
    //       success: function (result) { 
    //           console.log(result.data)
    //           if (result.data) {  

                  
    //               document.getElementById("txtoutcomecomment").value= result.data.Projek_Outcome;                
    //               document.getElementById("txtoutcomekuantiti").value=result.data.Kuantiti;
    //               document.getElementById("outcomeunit").value=result.data.unit_id;
    //           }
              
    //       }
    //   });


    // $.ajax({
    //       type: "GET",
    //       url: api_url+"api/project/outputpage-details/"+$('#project_id').val(),
    //       dataType: 'json',
    //       success: function (result) { 
    //           console.log(result.data)
    //           if (result.data) { 
                
    //             document.getElementById("txtoutputcomment").value= result.data.output_proj;                
    //             document.getElementById("txtoutputkuantiti").value=result.data.Kuantiti;
    //             document.getElementById("outputunit").value=result.data.unit_id;
                  
    //           }
              
    //       }
    //   })
  
  });

  function submitOutputData()
  {
    var formData = new FormData();
      let all_outputcomment = document.querySelectorAll(
      "[id^='txtoutputcomment']"
    );
    let all_outputkuantiti = document.querySelectorAll(
      "[id^='txtoutputkuantiti']"
    );
    let all_outputunit = document.querySelectorAll(
      "[id^='outputunit']"
    );
    let all_outcomecomment = document.querySelectorAll(
      "[id^='txtoutcomecomment']"
    );
    let all_outcomekuantiti = document.querySelectorAll(
      "[id^='txtoutcomekuantiti']"
    );
    let all_outcomeunit = document.querySelectorAll(
      "[id^='outcomeunit']"
    );
    let all_output_div = document.querySelectorAll(
      "[id^='outputdiv']"
    );
    let all_outcome_div = document.querySelectorAll(
      "[id^='outcomediv']"
    );

    output = []  
    for (var i = 0;i < all_output_div.length; i++) {                         
        data= {};
        data.output_proj = all_outputcomment[i].value
        data.Kuantiti= all_outputkuantiti[i].value
        data.unit_id = all_outputunit[i].value
        output.push(JSON.stringify(data))
    }

    outcome = []  
    for (var i = 0;i < all_outcome_div.length; i++) {                         
        data= {};
        data.Projek_Outcome = all_outcomecomment[i].value
        data.Kuantiti= all_outcomekuantiti[i].value
        data.unit_id = all_outcomeunit[i].value
        outcome.push(JSON.stringify(data))
    }

    output.forEach((item) => {
      formData.append('output[]', item);
    });

    outcome.forEach((item) => {
      formData.append('outcome[]', item);
    });    
      
    var Permohonan_Projek_id=$("#project_id").val(); 
        
    formData.append("Permohonan_Projek_id",Permohonan_Projek_id);

    formData.append('user_id', {{Auth::user()->id}})

    var api_token = "Bearer "+ window.localStorage.getItem('token');
    const api_url = "{{env('API_URL')}}";  console.log(api_url);

    axios({

      method: 'POST',
      url: api_url+"api/project/outputpage-details/"+$('#project_id').val(),
      responseType: 'json',
      data:formData,   
      headers: {
          "Content-Type": "application/json",
          "Authorization": api_token,
      },     
    })

      .then(function (result) {
        console.log(result.data)
      })

  }

  function getYears(date1,date2)
  {

    console.log(date1)
    console.log(date2)
        var start = new Date(date1,01,01); //console.log(start)
        var end = new Date(date2,01,01); //console.log(end)

        var diff = Math.floor(end.getTime() - start.getTime());
        var day = 1000 * 60 * 60 * 24;

        var days = Math.floor(diff/day);
        var months = Math.floor(days/31);
        var years = Math.floor(months/12);

        localStorage.setItem("colspan", parseInt(years)+2);

        
        const date_array=[];

        for(let k=0;k<=years;k++)
        {
          date_array.push(date1);
          var date1=parseInt(date1)+1;
        }
        date_array.push(date2);

        console.log(date_array)

      return date_array;
  }

  function deleteKPI(id)
  {
    $("#add_role_sucess_modal-confirm").modal('show');
    document.getElementById("tutup-confirm").setAttribute("kpi_id_for_delete",id);    
  }

  $('#tutup-confirm').click(function(){
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");

    var formData = new FormData();
    var id=document.getElementById("tutup-confirm").getAttribute("kpi_id_for_delete"); console.log(id);

        formData.append('kpi_id', id);
        formData.append('user_id', {{$user_id}});

        axios({

            method: 'POST',
            url: api_url+"api/project/delete-project-kpi",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
        })
        .then(function (result) {
            console.log(result.data)
            if(result.data.status=='Sucess'){
              $("#add_role_sucess_modal-confirm").modal('hide');
              $("#add_role_sucess_modal").modal('show');
            }

              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
        });
  });

  $("#tutup").click(function(){
      const project_id = {{$id}};  console.log(project_id);
       var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'output']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
  });

  $("#close-confirm").click(function(){
      const project_id = {{$id}};  console.log(project_id);
       var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'output']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
  });
  

  function editKPI(id)
  {
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

    $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");

    var formData = new FormData();

        formData.append('kpi_id', id);
        formData.append('user_id', {{$user_id}});

        axios({

            method: 'GET',
            url: api_url+"api/project/get-project-kpi?id="+id+"&user_id="+{{$user_id}}+"&project_id="+{{$id}},
            responseType: 'json',
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
        })
        .then(function (result) {
            console.log(result.data.data.kpi_unit)
            if(result.data){

                loadYears(result.data.data.project_data[0],result.data.data.project_kpi[0]);

              var popupunit =  document.getElementById("edit_unit");
              var unitoptions =  "";
              $.each(result.data.data.kpi_unit, function (key, item) { console.log(item)
                  var opt = item.id;
                  var el = document.createElement("option");
                  el.textContent = item.nama_unit;
                  el.value = opt;
                  popupunit.appendChild(el);
                  unitoptions = unitoptions + '<option value="' + item.id + '">' + item.nama_unit + '</option>'
              }) 

                var edit_kuantity = result.data.data.project_kpi[0].kuantiti;
                var edit_penerangan = result.data.data.project_kpi[0].penerangan;  
                var edit_unit = result.data.data.project_kpi[0].unit;  
                var edit_id = result.data.data.project_kpi[0].id;        
                $('#edit_kuantity').val(edit_kuantity);                
                $('#edit_penerangan').val(edit_penerangan);
                $('#edit_unit').val(edit_unit);
                $('#edit_id').val(edit_id);

                $('#Tambah_data_modal_edit').modal('show'); 
                
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

            }
        });
        
  }

  function loadYears(data,kpi)
  {
          if(data.tahun_jangka_mula != data.tahun_jangka_siap )
            {
                $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years)

                var tr_new = document.getElementById('edit_mytable').tHead.children[0]; //console.log(tr); popup-table
                var table_pop= document.getElementById("edit_pop-tr");  console.log(table_pop)
                var yrs='';
                for (j = 0; j < $years.length; j++) {         
                        th_new = document.createElement('th');
                        th_new.innerHTML = $years[j];   
                        tr_new.appendChild(th_new);   

                        if(j==0){ yrs= kpi.yr_1; }else if(j==1){ yrs= kpi.yr_2; }
                         else if(j==2){ yrs= kpi.yr_3;} else if(j==3){ yrs= kpi.yr_4; }
                         else if(j==4){ yrs= kpi.yr_5;} else if(j==5){ yrs= kpi.yr_6; }
                         else if(j==6){ yrs= kpi.yr_7;} else if(j==7){ yrs= kpi.yr_8; }
                         else if(j==8){ yrs= kpi.yr_9;} else { yrs= kpi.yr_10; }
                         if(yrs==null)
                         {
                           yrs=0;
                         }
                         else
                         {
                           yrs= yrs;
                         }
                        console.log("yrs-"); console.log(yrs)
                        var cell = table_pop.insertCell(j);
                        var Div = '<div class="form-group"><input type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}" name="yr_'+parseInt(j+1)+'" class="form-control" value="'+yrs+'"/></div>';
                        cell.innerHTML = Div;
                }
            }
            else
            {
                var tr_new = document.getElementById('edit_mytable').tHead.children[0]; //console.log(tr); popup-table
                var table_pop= document.getElementById("edit_pop-tr");  console.log(table_pop)
                
                th_new = document.createElement('th');
                        th_new.innerHTML = data.tahun_jangka_mula;   
                        tr_new.appendChild(th_new);   
                        
                        var cell = table_pop.insertCell(0);
                        var Div = '<div class="form-group"><input type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}" name="yr_1" class="form-control" value="'+kpi.yr_1+'"/></div>';
                        cell.innerHTML = Div;

            }
  }

  $("#close_edit_pop").click(function(){
       const project_id = {{$id}};  console.log(project_id);
       var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'output']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
  });

  $("#edit_simpan_pop").click(function(){
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

    $("#Tambah_data_modal_edit").modal('hide');

      var formData = new FormData();
          if(!document.editmyform.edit_kuantity.value)
          {
            document.getElementById("edit_kuantity").style.borderColor = 'red'
            document.getElementById("edit_kuantity_error").innerHTML = 'Sila masukkan kuantiti'
            document.getElementById("edit_kuantity_error").focus();
            return false; 
          }
          else
          {
            document.getElementById("edit_kuantity").style.borderColor = '#ced4da'
            document.getElementById("edit_kuantity_error").innerHTML = ''
          }
          if(!document.editmyform.edit_unit.value || document.editmyform.edit_unit.value=='0')
          {
            document.getElementById("edit_unit").style.borderColor = 'red'
            document.getElementById("edit_unit_error").innerHTML = 'Sila unit ini'
            document.getElementById("edit_unit_error").focus();
            return false; 
          }
          else
          {
            document.getElementById("edit_unit").style.borderColor = '#ced4da'
            document.getElementById("edit_unit_error").innerHTML = ''
          }
          if(!document.editmyform.edit_penerangan.value)
          {
            document.getElementById("edit_penerangan").style.borderColor = 'red'
            document.getElementById("edit_penerangan_error").innerHTML = 'Sila penerangan ini'
            document.getElementById("edit_penerangan_error").focus();
            return false; 
          }
          else
          {
            document.getElementById("edit_penerangan").style.borderColor = '#ced4da'
            document.getElementById("edit_penerangan_error").innerHTML = ''
          }

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");
          
          formData.append('project_id', {{$id}});
          formData.append('kuantiti', document.editmyform.edit_kuantity.value);
          formData.append('unit', document.editmyform.edit_unit.value);
          formData.append('penerangan', document.editmyform.edit_penerangan.value);
          formData.append('id', document.editmyform.edit_id.value);
          formData.append('user_id', {{$user_id}});
          if(document.editmyform.yr_1)
          {
            formData.append('yr_1', document.editmyform.yr_1.value);
          }else{ 
            formData.append('yr_1', 0);}
            if(document.editmyform.yr_2)
          {
            formData.append('yr_2', document.editmyform.yr_2.value);
          }else{ 
            formData.append('yr_2', 0);}
          if(document.editmyform.yr_3)
          {
            formData.append('yr_3', document.editmyform.yr_3.value);
          }else{ 
            formData.append('yr_3', 0);}
          
          if(document.editmyform.yr_4)
          {
            formData.append('yr_4', document.editmyform.yr_4.value);
          }else{ 
            formData.append('yr_4', 0);}
          
          if(document.editmyform.yr_5)
          {
            formData.append('yr_5', document.editmyform.yr_5.value);
          }else{ 
            formData.append('yr_5', 0);}
          
          if(document.editmyform.yr_6)
          {
            formData.append('yr_6', document.editmyform.yr_6.value);
          }else{ 
            formData.append('yr_6', 0);}
          
          if(document.editmyform.yr_7)
          {
            formData.append('yr_7', document.editmyform.yr_7.value);
          }else{ 
            formData.append('yr_7', 0);}

          if(document.editmyform.yr_8)
          {
            formData.append('yr_8', document.editmyform.yr_8.value);
          }else{ 
            formData.append('yr_8', 0);}

          if(document.editmyform.yr_9)
          {
            formData.append('yr_9', document.editmyform.yr_9.value);
          }else{ 
            formData.append('yr_9', 0);}
          
          if(document.editmyform.yr_10)
          {
            formData.append('yr_10', document.editmyform.yr_10.value);
          }else{ 
            formData.append('yr_10', 0);}

        axios({

            method: 'POST',
            url: api_url+"api/project/update-project-kpi",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
        })
        .then(function (result) {
            console.log(result.data)
            if(result.data.status=='Sucess'){
              // $("#Tambah_data_modal_edit").modal('hide');
              $("#vms_modal").modal('show');
            }
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        });

  });

  $("#vm_id").click(function(){
      const project_id = {{$id}};  console.log(project_id);
      var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'output']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
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
        $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        return $abc;
      }
      else
      {
        return '0.00';
      }
    }      
  }
</script>
