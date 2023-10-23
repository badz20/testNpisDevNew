<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
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
  let userType = {{$user}}; //console.log(userType)
        let workflow = localStorage.getItem("workflow_status");   //console.log(workflow)

            const currentUrl = window.location.href;
            const url = new URL(currentUrl);
            const pathname = url.pathname; //console.log(pathname)
            const parts = pathname.split('/'); //console.log(parts[4])
            workflow = 0;
            if(parts[4]!=='')
            {
                workflow = parts[4];   
                localStorage.setItem("workflow_status",workflow);   
            }
            else
            {
                workflow = localStorage.getItem("workflow_status");   
            }

        userType = {{$user}}; //console.log(userType)
        let projectType = localStorage.getItem("project_type");  //console.log("project type ->" + projectType)
        let penyemak_1 =  {{$penyemak_1}}; //console.log(penyemak_1)
        let penyemak_2 =  {{$penyemak_2}}; //console.log(penyemak_2)
        let pengesah =  {{$pengesah}}; //console.log(pengesah)

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

  var bayankan_access={{$semak_access}}; 
  // if(bayankan_access==1)
  // {
  //   document. getElementById("txtsilingbayangan"). disabled = false;
  // }
  // else
  // {
    document. getElementById("txtsilingbayangan"). disabled = true;
  //}
  const api_url = "{{env('API_URL')}}";  //console.log(api_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  //console.log(api_token);

    // --------------------

    axios.defaults.headers.common["Authorization"] = api_token


let add_subrow = document.querySelectorAll(".add_subrow");

// let secondTable = `<tr id="perundingrow">
// <td>
//   <div class="d-flex">
//     <label for="" class="col-4 align-self-center">
//       Jawatan
//     </label>
    
//     <input type="text"class="form-control col" id="txtjawatan" />
//     <button type="button" class="ml-auto sub-tr-btn-second">
//     <img src="{{ asset('assets/images/minus.png') }}" alt="" />
//     </button>
//   </div>
// </td>
// <td>
//   <input
//     type="text"
//     value="0"
//     class="form-control bg-light text-right perundingjumlahkos"
//     id="txtjumlahkos"
//   />
// </td>
// <td>
// <input type="hidden" id="prerundingid" value="" />
//   <input
//     type="text"
//     value="0"
//     class="form-control bg-light text-right"
//     id="txtmanmonth"
//   />
// </td>
  
// <td>
//   <input
//     type="text"
//     value="0"
//     class="form-control bg-light text-right"
//     id="txtmultiplier"
//   />
// </td>
// <td>
//   <input
//     type="text"
//     value="0"
//     class="form-control bg-light text-right"
//     id="txtsalary"
//   />
// </td>
// <td>
//   <input
//     type="text"
//     value="0"
//     class="form-control bg-light text-right"
//     id="txtamount"
//   />
// </td>
// <td>
//   <input
//     type="text"
//     value=""
//     class="form-control bg-light"
//     id="txtperundingcatatan"
//   />
// </td>

// </tr>`;
let Information_add = document.querySelector(".Information_add");

let pop_content_all = document.querySelectorAll(".pop_content");
let pop_btn_all = document.querySelectorAll(".pop_btn");
if (pop_btn_all) {
  pop_btn_all.forEach((pba, i) => {
    pba.addEventListener("mouseover", (e) => {
      e.preventDefault();
      pop_content_all[i].classList.toggle("d-none");
    });
    pba.addEventListener("mouseout", (e) => {
      e.preventDefault();
      pop_content_all[i].classList.toggle("d-none");
    });
  });
}

//if (Information_add) {
  // $(".add_subrow").bind("click", function () {
  //   var $this = $(this),
  //     $parentTR = $this.closest("tr");
  //   $(component_tr).insertAfter($parentTR);
  //   let component_row_minus = document.querySelectorAll(".component_row_minus");
  //   component_row_minus.forEach((row_btn) => {
  //     row_btn.addEventListener("click", () => {
  //       row_btn.closest("tr").remove();
  //     });
  //   });
  // });
  // let component_row_minus = document.querySelectorAll(".component_row_minus");
  // component_row_minus.forEach((row_btn) => {
  //   row_btn.addEventListener("click", () => {
  //     row_btn.closest("tr").remove();
  //   });
  // });

//   let information_table_data = `
// <td>
//   <div class="d-flex">
//     <input
//       class="form-control text-left rounded-0"
//       value=""
//     />
//     <button class="ml-auto Information_minus">
//       <img
//       <img src="{{ asset('assets/images/minus.png') }}" alt="" />
//       />
//     </button>
//   </div>
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
    
//   />
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
   
//   />
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
   
//   />
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
   
//   />
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
    
//   />
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
    
//   />
// </td>
// <td>
//   <input
//     type="text"
//     class="form-control"
    
//   />
// </td>
// `;
  // let Information_minus = document.querySelectorAll(".Information_minus");
  // Information_minus.forEach((minus) => {
  //   minus.addEventListener("click", () => {
  //     minus.closest("tr").remove();
  //   });
  // });
  // Information_add.addEventListener("click", () => {
  //   let tr = document.createElement("tr");
  //   tr.innerHTML = information_table_data;
  //   Information_add.closest("tbody").appendChild(tr);
  //   let Information_minus = document.querySelectorAll(".Information_minus");
  //   Information_minus.forEach((minus) => {
  //     minus.addEventListener("click", () => {
  //       minus.closest("tr").remove();
  //     });
  //   });
  // });

  // $(".add-tr-btn-second").bind("click", function () {
  //   var $this = $(this),
  //     $parentTR = $this.closest("tr");
  //   $(secondTable).insertAfter($parentTR);
  //   let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
  //   subTrSecond.forEach((row_btn) => {
  //     row_btn.addEventListener("click", () => {
  //       row_btn.closest("tr").remove();
  //     });
  //   });
  // });
  // let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
  // subTrSecond.forEach((row_btn) => {
  //   row_btn.addEventListener("click", () => {
  //     row_btn.closest("tr").remove();
  //   });
  // });
//}

//-------------third table -----------------

    axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-skop-for-kewangan/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
          console.log('response skop details');
          
            data = response.data.data.project; //console.log(data); 
            projectData = data
            skop = response.data.data.skop; //console.log(skop); 
            kewangan = response.data.data.kewangan; //console.log(kewangan); 
            loadcompleted();
            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { // date are different
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years) //year array
                  
                  var tr = document.getElementById('projek_table_kewagan').tHead.children[0];   //first tr for header
                  var trBelanja_SP_tahun = document.getElementById('belanja_SP_tahun');   //first tr for header
                  console.log(trBelanja_SP_tahun);
                  // appends header     
                  for (i = 0; i < $years.length; i++) {
                          th = document.createElement('th');
                          th.innerHTML = 'Siling '+$years[i]+'<br>'+'(RM)';
                          th.className="text-center col-1"
                          tr.appendChild(th);

                          th = document.createElement('th');
                          th.innerHTML = ' '+$years[i]+'<br>'+'';
                          th.className="text-center col-1"
                          trBelanja_SP_tahun.appendChild(th);
                  }
                          th.innerHTML = 'Jumlah Siling Peruntukan Tahunan (RM)​';
                          tr.appendChild(th);   
                  // ends

                  var rowcount_first = document.getElementById('projek_table_kewagan').rows[0].cells.length; 
                  localStorage.setItem("rowcount", rowcount_first);
                  var table_skop_first= document.getElementById("skop-first");  //body of the table

                  var scope_length = data.skop_projects.length; //scope length from skop_projects
                  localStorage.setItem("scope_count", scope_length);
                  var total='0';
                  var scope_array=[];
                  var silling_total='0';
                  for(let k = 0; k <= scope_length ; k++)
                  { 
                      var row = table_skop_first.insertRow(k);  
                      if(data.skop_projects[k])
                      var data_scop=data.skop_projects[k].skop_project_code; 
                      scope_array.push(data_scop);
                     
                      if(data.skop_projects[k])
                      {
                              total=parseInt(total)+parseInt(data.skop_projects[k].cost);
                      }
                      for (j = 0; j < rowcount_first; j++) {   
                        var cell = row.insertCell(j); 
                        var old_yr_data='0.00';
                        var jumlah_data='0.00';
                        var row_id=k+1;
                        if(kewangan && kewangan[k])
                        { 
                                if(j==2){old_yr_data = kewangan[k].siling_yr1;}
                                else if(j==3){old_yr_data = kewangan[k].siling_yr2;}
                                else if(j==4){old_yr_data = kewangan[k].siling_yr3;}
                                else if(j==5){old_yr_data = kewangan[k].siling_yr4;}
                                else if(j==6){old_yr_data = kewangan[k].siling_yr5;}
                                else if(j==7){old_yr_data = kewangan[k].siling_yr6;}
                                else if(j==8){old_yr_data = kewangan[k].siling_yr7;}
                                else if(j==9){old_yr_data = kewangan[k].siling_yr8;}
                                else if(j==10){old_yr_data = kewangan[k].siling_yr9;}
                                else{old_yr_data = kewangan[k].siling_yr10;}
                                jumlah_data=kewangan[k].jumlah_kos;
                                silling_total=parseInt(silling_total)+parseInt(old_yr_data);

                        }
                        //console.log(jumlah_data.length)
                        if(jumlah_data.length>7)
                        { jumlah_width=jumlah_data.length*14; }
                        else  { jumlah_width=100; }

                        if(old_yr_data.length>7)
                        { width=old_yr_data.length*14; }
                        else  { width=100; }

                        if(j==0)
                        {
                            if(data.skop_projects[k])
                            {
                                var id = data.skop_projects[k].skop_project_code; //console.log(id)
                                cell.innerHTML = skop[id-1].skop_name;
                            }
                            else
                            {
                                cell.innerHTML = "JUMLAH";
                            }
                        }
                        else if(j==1)
                        {
                            if(data.skop_projects[k])
                            {
                                cell.innerHTML = '<input type="text" style="width:'+width+'px" class="form-control input-element m'+data.skop_projects[k].skop_project_code+'" readonly id="total_'+row_id+'" value="'+data.skop_projects[k].cost+'"/>';
                            }
                            else
                            {
                                cell.innerHTML = '<input type="text" class="form-control input-element" readonly id="total_'+row_id+'" readonly value="'+total+'"/>';
                            }
                        }
                        else if(j==(rowcount_first-1))
                        {
                          if(k==scope_length)
                          {
                            var Div ='<input type="text" class="form-control KosKeseluruhan input-element"  name="jumlahd" readonly id="jumlah'+row_id+'" value="'+silling_total+'">';
                            cell.innerHTML = Div;
                          }
                          else
                          {  
                            var Div ='<input type="text" class="form-control input-element" name="jumlah" readonly id="jumlah'+row_id+'" style="width:'+jumlah_width+'px" value="'+jumlah_data+'">';
                            cell.innerHTML = Div;
                          }
                        }
                        else
                        { 
                          if(k==scope_length)
                          {
                            var Div ='<input type="text" class="form-control input-element" name="years" readonly id="input'+row_id+'_'+j+'"  value="">';
                            cell.innerHTML = Div;
                          }
                          else{
                          var Div ='<input type="text" class="form-control input-element" name="year" id="input'+row_id+'_'+j+'" onchange="calculateSum('+row_id+','+j+')" style="width:'+width+'px" value="'+old_yr_data+'">';
                          cell.innerHTML = Div;
                          }
                        }
                      }     
                  }
                  let popped = scope_array.pop();
                   document.getElementById('scope').value=scope_array;  
              }
              else
              { //only one year
                var tr = document.getElementById('projek_table_kewagan').tHead.children[0]; //console.log(tr);  
                var table_skop_first= document.getElementById("skop-first");
                          th = document.createElement('th');
                          th.className="text-center";
                          th.innerHTML = 'Siling '+data.tahun_jangka_mula+'<br>'+'(RM)';
                          
                          tr.appendChild(th);  
                          th1 = document.createElement('th');
                          th1.className="text-center";
                          th1.innerHTML = 'Jumlah Kos (RM)';
                          tr.appendChild(th1);


                          var rowcount_first = document.getElementById('projek_table_kewagan').rows[0].cells.length; //console.log(rowcount_first)
                          localStorage.setItem("rowcount", rowcount_first);
                          var scope_length = data.skop_projects.length; ////console.log(scope_length)
                          var total='0';
                          var scope_array=[];
                          var silling_total='0';
                          for(let k = 0; k <= scope_length ; k++)
                          { 
                              var row = table_skop_first.insertRow(k); 
                              var row_id=k+1;

                              if(data.skop_projects[k])
                              var data_scop=data.skop_projects[k].skop_project_code; 
                              scope_array.push(data_scop);
                              

                              if(kewangan && kewangan[k])
                              {
                                var old_yr_data = kewangan[k].siling_yr1;
                                var jumlah_data=kewangan[k].jumlah_kos;
                              }
                              else
                              {
                                var old_yr_data = '0.00';
                                var jumlah_data = '0.00';
                              }
                              silling_total=parseInt(silling_total)+parseInt(jumlah_data);

                              
                              if(data.skop_projects[k])
                              {
                                      total=parseInt(total)+parseInt(data.skop_projects[k].cost);
                              }

                              for (j = 0; j < rowcount_first; j++) {  
                                var cell = row.insertCell(j); 
                                if(j==0)
                                {
                                  if(data.skop_projects[k])
                                  {
                                    var id = data.skop_projects[k].skop_project_code; //console.log(id)
                                    cell.innerHTML = skop[id-1].skop_name;
                                  }
                                  else
                                  {
                                    cell.innerHTML = "JUMLAH";
                                  }
                                }
                                else if(j==1)
                                {
                                    if(data.skop_projects[k])
                                    {
                                        cell.innerHTML = '<input type="text" class="form-control input-element" readonly id="total_'+row_id+'" value="'+data.skop_projects[k].cost+'"/>';
                                    }
                                    else
                                    {
                                        cell.innerHTML = '<input type="text" class="form-control input-element" readonly id="total_'+row_id+'" value="'+total+'"/>';
                                    }
                                }
                                else if(j==(rowcount_first-1))
                                {  
                                  if(k==scope_length)
                                  {
                                    var Div ='<input type="text" class="form-control input-element" name="jumlah" readonly id="jumlah'+row_id+'" value="'+silling_total+'">';
                                    cell.innerHTML = Div;
                                  }
                                  else
                                  {
                                  var Div ='<input type="text" class="form-control input-element" readonly name="jumlah" id="jumlah'+row_id+'" value="'+jumlah_data+'">';
                                  cell.innerHTML = Div;
                                  }
                                }
                                else
                                {
                                  if(k==scope_length)
                                  {
                                    var Div ='<input type="text" class="form-control input-element" name="year" readonly id="input'+row_id+'_'+j+'" value="">';
                                    cell.innerHTML = Div;
                                  }
                                  else{
                                  var Div ='<input type="text" class="form-control input-element" id="input'+row_id+'_'+j+'"  onchange="calculateSum('+row_id+','+j+')" name="year" value="'+old_yr_data+'"/>';
                                  cell.innerHTML = Div;
                                  }
                                }
                              }     
                          }
                          let popped = scope_array.pop();
                          document.getElementById('scope').value=scope_array;  
              } 
              nf();
              onLoadSkop();        
            }
            else
            {
              
            }
            
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

//------------------end third table--------------
//--------------------start fourth table --------


axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-bayaran-suku-for-kewangan/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data.project; ////console.log(data); 
            skop = response.data.data.skop; ////console.log(skop); 
            kewangan = response.data.data.kewangan; ////console.log(kewangan); 
            bayaran = response.data.data.bayaran; ////console.log(bayaran); 


            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { 
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); ////console.log($years) //year array
                  var tr = document.getElementById('komponen_three_table_kewagan').tHead.children[0];   //first tr for header
                  for (i = 0; i < $years.length; i++) {
                          th = document.createElement('th');
                          th.classList.add("col-1");
                          th.classList.add("text-center");
                          th.setAttribute("colspan", "4");
                          th.innerHTML = $years[i];
                          tr.appendChild(th);  
                  }
                  var rowcount_first = document.getElementById('komponen_three_table_kewagan').rows[0].cells.length; ////console.log(rowcount_first)
                  var table_skop_first= document.getElementById("skop-second");  //body of the table
                  var scope_length = data.skop_projects.length; ////console.log(scope_length)
                  var project_cost=0;
                  for(let k = 0; k < scope_length ; k++)
                  { ////console.log("first");
                    var row = table_skop_first.insertRow(k);  
                    row.classList.add(k);
                     var length_td=2+($years.length)*4; ////console.log(length_td)
                     var cur_year='';
                     var quarter='';
                     for (j = 0; j < length_td;j++) { 

                        if(j==0)
                        {   
                            var cell = row.insertCell(j); 
                            if(data.skop_projects[k])
                            {
                                var id = data.skop_projects[k].skop_project_code; ////console.log(id)
                                cell.innerHTML = k+1 +'.'+' '+skop[id-1].skop_name;
                            }
                            else
                            {
                               cell.classList.add("text-right");
                                cell.innerHTML = "";
                            }
                        }
                        else if(j==1)
                        { 
                            var cell = row.insertCell(j); 
                            if(data.skop_projects[k])
                            {
                                project_cost=parseInt(project_cost)+parseInt(data.skop_projects[k].cost);
                                localStorage.setItem("project_cost", project_cost);
                                cell.innerHTML = '<input type="text" class="form-control input-element m'+data.skop_projects[k].skop_project_code+'" id="cost_'+k+'_'+j+'" readonly value="'+data.skop_projects[k].cost+'"/>';
                                
                              }
                            else
                            {
                                cell.innerHTML = '<input type="text" class="form-control input-element" id="jumlah_total_latest" readonly value=""/>';
                            }
                        }
                        else 
                        { 
                          var cell = row.insertCell(j); 
                          cell.classList.add("kewangan"+k+'_'+j+"");
                          cell.setAttribute("id", "kewangan"+k+'_'+j+"");
                          cell.setAttribute("onclick", "SetKewangan("+k+','+j+")");

                          if(bayaran.length!=0){ console.log(j); console.log('found'); console.log(bayaran[k])
                            if(typeof(bayaran[k])=='undefined')
                            {
                              cell.innerHTML = '';
                            }
                            else
                            {
                              if(j==2 && bayaran[k].yr1_quarters1=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==3 && bayaran[k].yr1_quarters2=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==4 && bayaran[k].yr1_quarters3=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==5 && bayaran[k].yr1_quarters4=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==6 && bayaran[k].yr1_quarters5=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==7 && bayaran[k].yr1_quarters6=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==8 && bayaran[k].yr1_quarters7=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==9 && bayaran[k].yr1_quarters8=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==10 && bayaran[k].yr1_quarters9=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==11 && bayaran[k].yr1_quarters10=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==12 && bayaran[k].yr1_quarters11=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==13 && bayaran[k].yr1_quarters12=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==14 && bayaran[k].yr1_quarters13=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==15 && bayaran[k].yr1_quarters14=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==16 && bayaran[k].yr1_quarters15=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==17 && bayaran[k].yr1_quarters16=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==18 && bayaran[k].yr1_quarters17=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==19 && bayaran[k].yr1_quarters18=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==20 && bayaran[k].yr1_quarters19=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==21 && bayaran[k].yr1_quarters20=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==22 && bayaran[k].yr1_quarters21=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==23 && bayaran[k].yr1_quarters22=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==24 && bayaran[k].yr1_quarters23=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==25 && bayaran[k].yr1_quarters24=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==26 && bayaran[k].yr1_quarters25=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==27 && bayaran[k].yr1_quarters26=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==28 && bayaran[k].yr1_quarters27=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==29 && bayaran[k].yr1_quarters28=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==30 && bayaran[k].yr1_quarters29=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==31 && bayaran[k].yr1_quarters30=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==32 && bayaran[k].yr1_quarters31=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==33 && bayaran[k].yr1_quarters32=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==34 && bayaran[k].yr1_quarters33=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==35 && bayaran[k].yr1_quarters34=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==36 && bayaran[k].yr1_quarters35=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==37 && bayaran[k].yr1_quarters36=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==38 && bayaran[k].yr1_quarters37=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==39 && bayaran[k].yr1_quarters38=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==40 && bayaran[k].yr1_quarters39=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==41 && bayaran[k].yr1_quarters40=="1"){ cell.innerHTML = '&#x2713;';
                              }else{cell.innerHTML = '';}
                            }
                          }
                          else
                          {
                            console.log('not found')
                            cell.innerHTML = '&#x2713;';

                          }
                        }
                     }
   
                  }
                  var row = table_skop_first.insertRow(scope_length); ////console.log(rowcount_first)
                  for (i = 0; i < rowcount_first;i++) {
                    var cell = row.insertCell(i); 
                    if(i==0 ) 
                    {
                        cell.classList.add("text-right");
                        cell.innerHTML = "JUMLAH";
                    }
                    else if(i==1)
                    {
                      var project_cost=localStorage.getItem("project_cost");
                      cell.innerHTML = '<input type="text" class="form-control input-element" id="jumlah_total_latest" readonly value="'+project_cost+'.00"/>';
                    }
                    else
                    {
                      
                      cell.setAttribute("colspan", "4");
                      cell.innerHTML = '<input type="text" id="sum_'+i+'" class="form-control input-element" readonly value=""/>';
                    }
                  }



              }
              else
              { //only one year

                var tr = document.getElementById('komponen_three_table_kewagan').tHead.children[0];   //first tr for header
                    th = document.createElement('th');
                    th.classList.add("col-1");
                    th.setAttribute("colspan", "4");
                    th.innerHTML = data.tahun_jangka_mula;
                    tr.appendChild(th);  
                    var rowcount_first = document.getElementById('komponen_three_table_kewagan').rows[0].cells.length; ////console.log(rowcount_first)
                  var table_skop_first= document.getElementById("skop-second");  //body of the table
                  var scope_length = data.skop_projects.length; ////console.log(scope_length)
                  var project_cost=0;
                  for(let k = 0; k < scope_length ; k++)
                  { 
                    var row = table_skop_first.insertRow(k);  
                    row.classList.add(k);
                     for (j = 0; j < 6;j++) { 
                        if(j==0)
                        {   var cell = row.insertCell(j); 
                            if(data.skop_projects[k])
                            {
                                var id = data.skop_projects[k].skop_project_code; ////console.log(id)
                                cell.innerHTML = k+1 +'.'+' '+skop[id-1].skop_name;
                            }
                            else
                            {
                               cell.classList.add("text-right");
                                cell.innerHTML = "";
                            }
                        }
                        else if(j==1)
                        { 
                            var cell = row.insertCell(j); 
                            if(data.skop_projects[k])
                            {
                                project_cost=parseInt(project_cost)+parseInt(data.skop_projects[k].cost);
                                localStorage.setItem("project_cost", project_cost);
                                cell.innerHTML = '<input type="text" class="form-control input-element" readonly value="'+data.skop_projects[k].cost+'"/>';
                            }
                            else
                            {
                                cell.innerHTML = '<input type="text" class="form-control input-element" id="jumlah_total_latest" readonly value=""/>';
                            }
                        }
                        else 
                        { 
                          var cell = row.insertCell(j); 
                          cell.classList.add("kewangan"+k+'_'+j+"");
                          cell.setAttribute("id", "kewangan"+k+'_'+j+"");
                          cell.setAttribute("onclick", "SetKewangan("+k+','+j+")");
                          if(typeof(bayaran[k])=='undefined')
                          {
                            cell.innerHTML = '';
                          }
                          else
                          {
                            if(bayaran.length!=0){ ////console.log(j)
                              if(j==2 && bayaran[k].yr1_quarters1=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==3 && bayaran[k].yr1_quarters2=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==4 && bayaran[k].yr1_quarters3=="1"){ cell.innerHTML = '&#x2713;';
                              }else if(j==5 && bayaran[k].yr1_quarters4=="1"){ cell.innerHTML = '&#x2713;';
                              }else{cell.innerHTML = '';}
                            }
                            else 
                            { 
                              cell.innerHTML = '';
                            }

                          }
                        }
                     }
   
                  }

                  var row = table_skop_first.insertRow(scope_length); 
                  for (i = 0; i < rowcount_first;i++) {
                    var cell = row.insertCell(i); 
                    if(i==0 ) 
                    {
                        cell.classList.add("text-right");
                        cell.innerHTML = "JUMLAH";
                    }
                    else if(i==1)
                    {
                      var project_cost=localStorage.getItem("project_cost");
                      cell.innerHTML = '<input type="text" class="form-control input-element" id="jumlah_total_latest" readonly value="'+project_cost+'.00"/>';
                    }
                    else
                    {
                      cell.setAttribute("colspan", "4");
                      cell.innerHTML = '<input type="text" id="sum_'+i+'" class="form-control input-element" readonly value=""/>';
                    }
                  }
                
              } 
              nf();        
              onLoadSkop();
            }
            else
            {
              
            }
            
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

//--------------------end fourth table

//--------------------start fifth table

axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-maklumat-peruntukan-for-kewangan/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data.project; //console.log(data); 
            peruntukan = response.data.data.peruntukan; //console.log(peruntukan);

            let  perkara = ["Penganjuran Mesyuarat","Dokumentasi","Tuntutan Perjalanan (TNT)"];//console.log(perkara);

            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { // date are different
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); //console.log($years) //year array
                  var tr = document.getElementById('perkara_table_kewagan').tHead.children[0];   //first tr for header
                  // appends header     
                  for (i = 0; i <= $years.length; i++) {
                          th = document.createElement('th');
                          th.className="text-center"
                          th.innerHTML =  $years[i]+' '+'(RM)';
                          tr.appendChild(th);  
                  }
                          th.innerHTML = 'Jumlah Kos (RM)';
                          th.className="text-center"
                          tr.appendChild(th);   
                  // ends

                  var rowcount_first = document.getElementById('perkara_table_kewagan').rows[0].cells.length; 
                  var table_skop_first= document.getElementById("skop-third");  //body of the table

                  var total='0';
                  var silling_total='0';
                  for(let k = 0; k < 4 ; k++)
                  { 
                      var row = table_skop_first.insertRow(k);  
                     
                      for (j = 0; j < rowcount_first; j++) {   
                        var cell = row.insertCell(j); 
                        var old_yr_data='0.00';
                        var jumlah_data='0.00';
                        var row_id=k+1;

                        if(peruntukan && peruntukan[k])
                        { 
                                if(j==1){old_yr_data = peruntukan[k].year1;}
                                else if(j==2){old_yr_data = peruntukan[k].year2;}
                                else if(j==3){old_yr_data = peruntukan[k].year3;}
                                else if(j==4){old_yr_data = peruntukan[k].year4;}
                                else if(j==5){old_yr_data = peruntukan[k].year5;}
                                else if(j==6){old_yr_data = peruntukan[k].year6;}
                                else if(j==7){old_yr_data = peruntukan[k].year7;}
                                else if(j==8){old_yr_data = peruntukan[k].year8;}
                                else if(j==9){old_yr_data = peruntukan[k].year9;}
                                else{old_yr_data = peruntukan[k].year10;}
                                jumlah_data=peruntukan[k].jumlah_kos;
                                silling_total=parseInt(silling_total)+parseInt(old_yr_data);
                        }

                        if(jumlah_data.length>7)
                        { jumlah_width=jumlah_data.length*14; }
                        else  { jumlah_width=''; }

                        if(old_yr_data.length>7)
                        { width=old_yr_data.length*14; }
                        else  { width=''; }
                       
                        if(j==0)
                        {
                            if(perkara[k])
                            {
                                cell.innerHTML = perkara[k];
                            }
                            else
                            {
                                cell.innerHTML = "Kos Keseluruhan";
                            }
                        }
                        else if(j==(rowcount_first-1))
                        {
                          if(k==3)
                          {
                            var Div ='<input type="text" class="form-control  years input-element KosKeseluruhan" name="jumlahd" readonly id="jumlahper'+row_id+'" value="'+silling_total+'">';
                            cell.innerHTML = Div;
                          }
                          else
                          {  
                            var Div ='<input type="text" class="form-control input-element" name="jumlah" readonly id="jumlahper'+row_id+'" style="width:'+jumlah_width+'px" value="'+jumlah_data+'">';
                            cell.innerHTML = Div;
                          }
                        }
                        else
                        { 
                          if(k==3)
                          {
                            var Div ='<input type="text" class="form-control years input-element" name="years" readonly id="inputper'+row_id+'_'+j+'"  value="">';
                            cell.innerHTML = Div;
                          }
                          else{
                          var Div ='<input type="text" class="form-control input-element" onchange="calculateJumlah('+row_id+','+j+')" name="year" id="inputper'+row_id+'_'+j+'" style="width:'+width+'px" value="'+old_yr_data+'">';
                          cell.innerHTML = Div;
                          }
                        }
                      }     
                  } 
              }
              else
              { //only one year
                var tr = document.getElementById('perkara_table_kewagan').tHead.children[0]; //console.log(tr);  
                var table_skop_first= document.getElementById("skop-third");
                th = document.createElement('th');
                th.innerHTML = data.tahun_jangka_mula+' '+'(RM)';
                tr.appendChild(th);  
                th1 = document.createElement('th');
                th1.innerHTML = 'Jumlah Kos (RM)';
                tr.appendChild(th1);


                var rowcount_first = document.getElementById('perkara_table_kewagan').rows[0].cells.length; //console.log(rowcount_first)
                var total='0';
                var scope_array=[];
                var silling_total='0';
                for(let k = 0; k < 4 ; k++)
                { 
                    var row = table_skop_first.insertRow(k); 
                    var row_id=k+1;

                    if(peruntukan && peruntukan[k])
                    {
                      var old_yr_data = peruntukan[k].year1;
                      var jumlah_data=peruntukan[k].year1;
                    }
                    else
                    {
                      var old_yr_data = '0.00';
                      var jumlah_data = '0.00';
                    }
                    //console.log(jumlah_data)
                    silling_total=parseInt(silling_total)+parseInt(jumlah_data);

                    for (j = 0; j < rowcount_first; j++) {  
                      var cell = row.insertCell(j); 
                      if(j==0)
                      {
                        if(perkara[k])
                        {
                            cell.innerHTML = perkara[k];
                        }
                        else
                        {
                            cell.innerHTML = "Kos Keseluruhan";
                        }
                      }
                      else if(j==(rowcount_first-1))
                      {  
                        if(k==3)
                        {
                          var Div ='<input type="text" class="form-control years input-element KosKeseluruhan" name="jumlah" readonly id="jumlahper'+row_id+'" value="'+silling_total+'">';
                          cell.innerHTML = Div;
                        }
                        else
                        {
                        var Div ='<input type="text" class="form-control input-element" readonly name="jumlah" id="jumlahper'+row_id+'" value="'+jumlah_data+'">';
                        cell.innerHTML = Div;
                        }
                      }
                      else
                      {
                        if(k==3)
                        {
                          var Div ='<input type="text" class="form-control years input-element" name="year" readonly id="inputper'+row_id+'_'+j+'" value="">';
                          cell.innerHTML = Div;
                        }
                        else{
                        var Div ='<input type="text" class="form-control input-element" id="inputper'+row_id+'_'+j+'" onchange="calculateJumlah('+row_id+','+j+')" name="year" value="'+old_yr_data+'"/>';
                        cell.innerHTML = Div;
                        }
                      }
                    }     
                }
              }    
              nf();
              onLoadPerkara();
            }
            else
            {
              
            }
            
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

//------------------end fifth table--------------

//--------------------start sixth table---------------------------------------------------------------------------
let footeryears = ""
axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-maklumat-peruntukan-for-kewangan/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
          let noofyrs_belanja=""
          footeryears = ""
          if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { // date are different
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); //console.log("No of years: "+$years.length) //year array
                  var tr = document.getElementById('perkara_table_sec_kewagan').tHead.children[0];   //first tr for header
                  // appends header     
                  for (i = 0; i <= $years.length; i++) {
                          th = document.createElement('th');
                          th.innerHTML =  $years[i]+' '+'(RM)';
                          th.className="text-center"
                          tr.appendChild(th); 
                          noofyrs_belanja += `<td>
                                  <input
                                    type="text"
                                    class="form-control col`+(i+2)+` input-element"
                                    value=""
                                    onchange="calculatebelanja();"                                   
                                  />
                                </td>`;

                                footeryears += `<td>
                                                          <input
                                                            type="text"
                                                            class="form-control text-right input-element totalOE "
                                                            value="0"
                                                            id="totalcol`+(i+2)+`"
                                                            readonly
                                                            style="font-family: Poppins_Regular;"
                                                          />
                                                        </td>`;
                                ////console.log("no of years arr: "+noofyrs_belanja)
                  }
                          th.innerHTML = 'Jumlah Kos (RM)';
                          th.className="text-center"
                          tr.appendChild(th);
              }
              else
              {
                  var tr = document.getElementById('perkara_table_sec_kewagan').tHead.children[0];   //first tr for header
                          th = document.createElement('th');
                          th.innerHTML =  data.tahun_jangka_mula+' '+'(RM)';
                          tr.appendChild(th); 

                          th = document.createElement('th');
                          th.innerHTML = 'Jumlah Kos (RM)';
                          tr.appendChild(th);  

                          noofyrs_belanja += `<td>
                                  <input
                                    type="text"
                                    class="form-control col2 input-element"
                                    value=""
                                    onchange="calculatebelanja();"                                   
                                  />
                                </td>`;
                                noofyrs_belanja += `<td>
                                  <input
                                    type="text"
                                    class="form-control col3 input-element"
                                    value=""
                                    onchange="calculatebelanja();"                                   
                                  />
                                </td>`;

                                footeryears += `<td>
                                                          <input
                                                            type="text"
                                                            class="form-control text-right input-element"
                                                            value="0"
                                                            id="totalcol2"
                                                            readonly
                                                          />
                                                        </td>`;
                                footeryears += `<td>
                                  <input
                                    type="text"
                                    class="form-control text-right input-element totalOE"
                                    value="0"
                                    id="totalcol3"
                                    readonly
                                    style="font-family: Poppins_Regular;"
                                  />
                                </td>`;

              }
            }

          
          
            data = response.data.data.project; //console.log(data);
            belanja = response.data.data.belanja;

            //----------------------------------------------------------------------------
            if(belanja.length > 0) {
              //$('#Belanja').empty();
                    
                    belanja.forEach((item) => {
                      let brow=""
                      let noofyrs_belanja1=""
                      footeryears = ""

                      if(data.tahun_jangka_mula != data.tahun_jangka_siap )
                      { // date are different
                          $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); //console.log($years) //year array
                          //var tr = document.getElementById('perkara_table_sec_kewagan').tHead.children[0];   //first tr for header
                          // appends header     
                          for (i = 0; i <= $years.length; i++) {
                                  //th = document.createElement('th');
                                  //th.innerHTML =  $years[i]+' '+'(RM)';
                                  //tr.appendChild(th);
                                  let yearvalue=0; 
                                  if(i==0){
                                    yearvalue=item.kategori_1_yr;
                                  }
                                  else if(i==1){
                                    yearvalue=item.kategori_2_yr;
                                  }
                                  else if(i==2){
                                    yearvalue=item.kategori_3_yr;
                                  }
                                  else if(i==3){
                                    yearvalue=item.kategori_4_yr;
                                  }
                                  else if(i==4){
                                    yearvalue=item.kategori_5_yr;
                                  }
                                  else if(i==5){
                                    yearvalue=item.kategori_6_yr;
                                  }
                                  else if(i==6){
                                    yearvalue=item.kategori_7_yr;
                                  }
                                  else if(i==7){
                                    yearvalue=item.kategori_8_yr;
                                  }
                                  else if(i==8){
                                    yearvalue=item.kategori_9_yr;
                                  }
                                  else if(i==9){
                                    yearvalue=item.kategori_10_yr;
                                  }
                                   
                                  noofyrs_belanja1 += `<td>
                                          <input
                                            type="text"
                                            class="form-control col`+(i+2)+` input-element"
                                            value="`+parseFloat(yearvalue).toFixed(2)+`"  
                                            onchange="calculatebelanja();"

                                          />
                                        </td>`;

                                        footeryears += `<td class="pt-3 pb-3">
                                                          <input
                                                            type="text"
                                                            class="form-control text-right input-element totalOE"
                                                            value="0"
                                                            id="totalcol`+(i+2)+`"
                                                            readonly
                                                            style="font-family: Poppins_Regular;"
                                                          />
                                                        </td>`;
                                        ////console.log("no of years arr: "+noofyrs_belanja1)
                          }
                                  //th.innerHTML = 'Jumlah Kos (RM)';
                                  //tr.appendChild(th);
                      }
                      else{
                        noofyrs_belanja1 += `<td>
                                          <input
                                            type="text"
                                            class="form-control col2 input-element"
                                            value="`+item.kategori_1_yr+`"  
                                            onchange="calculatebelanja();"

                                          />
                                        </td>`;
                      noofyrs_belanja1 += `<td>
                        <input
                          type="text"
                          class="form-control col3 input-element"
                          value="`+item.kategori_1_yr+`"  
                          onchange="calculatebelanja();"

                        />
                      </td>`;

                      footeryears += `<td class="pt-3 pb-3">
                                        <input
                                          type="text"
                                          class="form-control text-right input-element totalOE"
                                          value="0"
                                          id="totalcol2"
                                          readonly
                                          style="font-family: Poppins_Regular;"
                                        />
                                      </td>`;
                      footeryears += `<td class="pt-3 pb-3">
                                          <input
                                            type="text"
                                            class="form-control text-right input-element totalOE "
                                            value="0"
                                            id="totalcol3"
                                            readonly
                                            style="font-family: Poppins_Regular;"
                                          />
                                        </td>`;

                      }


                       brow = `
                                <td>
                                  <div class="d-flex">
                                    <input type="text" 
                                      class="form-control text-left"
                                      value="`+item.kategori_nama+`"
                                      id="kosOE"
                                      
                                    />
                                    <button type="button" class="ml-auto Information_minus">
                                      <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                    </button>
                                  </div>
                                </td>
                                `+noofyrs_belanja1+`
                            `;  
                            let tr = document.createElement("tr");
                            tr.innerHTML = brow;
                            $('#Belanja').append(tr);

                          



                            // let Information_minus = document.querySelectorAll(".Information_minus");
                            // Information_minus.forEach((minus) => {
                            //   minus.addEventListener("click", () => {
                            //     minus.closest("tr").remove();
                            //   });
                            // });
                            // Information_add.addEventListener("click", () => {
                            //   let tr = document.createElement("tr");
                            //   tr.innerHTML = brow;
                            //   Information_add.closest("tbody").appendChild(tr);
                            //   let Information_minus = document.querySelectorAll(".Information_minus");
                            //   Information_minus.forEach((minus) => {
                            //     minus.addEventListener("click", () => {
                            //       minus.closest("tr").remove();
                            //     });
                            //   });
                            // });

                            


                    })
                    
                  }
                  
                  

                  //----------------------------------------------------------------------------
            

            let belanjarow1 = `
                                <td>
                                  <div class="d-flex">
                                    <input type="text" 
                                      class="form-control text-right"
                                      value=""
                                      id="kosOE4444"
                                      style="font-family: Poppins_Bold;"
                                    />
                                    <button type="button" class="ml-auto mr-3 Information_minus">
                                      <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                    </button>
                                  </div>
                                </td>
                                `+noofyrs_belanja+`
                            `; 
                             Information_minus = document.querySelectorAll(".Information_minus");
                            Information_minus.forEach((minus) => {
                              minus.addEventListener("click", () => {
                                minus.closest("tr").remove();
                                calculatebelanja();
                              });
                            });
                            Information_add.addEventListener("click", () => {
                              let tr1 = document.createElement("tr");
                              tr1.innerHTML = belanjarow1;
                              //console.log("khdbfkhsfbkf");
                              $('#Belanja').append(tr1);
                              //Information_add.closest("tbody").appendChild(tr1);
                              //Information_add.closest("tr").insertAfter(tr1);
                              let Information_minus = document.querySelectorAll(".Information_minus");
                              Information_minus.forEach((minus) => {
                                minus.addEventListener("click", () => {
                                  minus.closest("tr").remove();
                                  calculatebelanja();
                                });
                              });
                            }); 
            let footer = `<tr class="" style="background-color: #39b0d2">
                                <td class="belanja_gap">
                                  <span class="belanja_text">KOS KESELURUHAN OE CREATIVITY INDEX (RM)</span>
                                </td>`+footeryears+`                   
                              </tr>`;

                              $('#belanjafooter').empty();
                              $('#belanjafooter').append(footer);
            
            calculatebelanja();
            nf();

            // let belanjarow1 = `
            //                     <td>
            //                       <div class="d-flex">
            //                         <input type="text" 
            //                           class="form-control text-left rounded-0"
            //                           value="Penyenggaraan"
            //                           id="kosOE"
            //                         />
            //                         <button class="ml-auto Information_minus">
            //                           <img
            //                             src="{{ asset('assets/images/minus.png') }}"
            //                             alt="minus"
            //                           />
            //                         </button>
            //                       </div>
            //                     </td>
            //                     `+noofyrs_belanja+`
            //                 `;  
                            // let Information_minus = document.querySelectorAll(".Information_minus");
                            // Information_minus.forEach((minus) => {
                            //   minus.addEventListener("click", () => {
                            //     minus.closest("tr").remove();
                            //   });
                            // });
                            // Information_add.addEventListener("click", () => {
                            //   let tr = document.createElement("tr");
                            //   tr.innerHTML = belanjarow1;
                            //   Information_add.closest("tbody").appendChild(tr);
                            //   let Information_minus = document.querySelectorAll(".Information_minus");
                            //   Information_minus.forEach((minus) => {
                            //     minus.addEventListener("click", () => {
                            //       minus.closest("tr").remove();
                            //     });
                            //   });
                            // });  
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show"); 
             
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        

        
        
        // let belanjarow = `
        //                         <td>
        //                           <div class="d-flex">
        //                             <input
        //                               class="form-control text-left rounded-0"
        //                               value="Penyenggaraan"
        //                             />
        //                             <button class="ml-auto Information_minus">
        //                               <img
        //                                 src="{{ asset('assets/images/minus.png') }}"
        //                                 alt="minus"
        //                               />
        //                             </button>
        //                           </div>
        //                         </td>
        //                         `+noofyrs_belanja+`
        //                     `;
                            


//-------------------------------------------------------------------------------------------------------------------------------

//--------------------start last table -------------------------------------------------------------

axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-kewangan-negeri-data/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data.project; console.log(data); 
            negeri = response.data.data.negeri; console.log(negeri); 
            kewangan_negeri = response.data.data.kewangan_negeri; console.log(kewangan_negeri); 


            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { // date are different
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years) //year array
                  var tr = document.getElementById('perincian_table').tHead.children[0];   //first tr for header
                  // appends header     
                  for (i = 0; i < $years.length; i++) {
                          th = document.createElement('th');
                          th.className="text-center NOCtblKodprojek"
                          th.innerHTML = 'Siling '+ $years[i]+' '+' (RM)';
                          tr.appendChild(th);  
                  }
                  // ends
              }
              else
              { //only one year
                  var tr = document.getElementById('perincian_table').tHead.children[0];
                      th = document.createElement('th');
                      th.className="text-center NOCtblKodprojek"
                      th.innerHTML = 'Siling '+ data.tahun_jangka_mula+' '+' (RM)';
                      tr.appendChild(th);   
              }   
              
              if(data.negeri_selection_type == 1)
              {
                $('#negeri_kewangan_section').removeClass('d-none');
              }
              else
              {
                $('#negeri_kewangan_section').addClass('d-none');
              }
            }

            if(negeri!=null)
            {
              var table=document.getElementById('perincian_table');
              var headerRow = table.rows[0];
              var totalColumns = headerRow.cells.length; console.log(totalColumns);
              let columns = '';
              let jumlah_columns = '';


              for (var j = 0; j < (totalColumns-2); j++) {
                 columns=columns + '<td class="NOCtblKodprojek col-md-3"><input class="NOCinputs input-element" type="text" onchange="calculateNegeriJumlah('+j+')" value="" size="25" name="siling" id="siling_'+j+'"></td>';
                 jumlah_columns=jumlah_columns + '<td class="NOCtblKodprojek col-md-3"><input class="NOCinputs" type="text" disabled value="0.00" size="25" name="jumlah_siling" id="jumlah_siling_'+j+'"></td>';
              }

              for(var i=0;i<negeri.length;i++)
              {  console.log(negeri[i]);
                let html_data = '';
                    html_data = '<tr> <td class="NOCtblKodprojek col-md-5">'+negeri[i].nama_negeri+'</td>'+
                                '<td class="NOCtblKodprojek col-md-3"><input type="hidden" id="negeridata_'+i+'" value="'+negeri[i].negeri_id+'"><input class="NOCinputs input-element" type="text" value="" onchange="calculateNegeriKosJumlah()" size="25" id="kos_projeck"></td>'
                                +columns+'</tr>';
                $('#perincian_table').append(html_data);
              }

              let footer_html= '<tr><td class="NOCtblKodprojek col-md-5">Jumlah (RM)</td>'+
                                '<td class="NOCtblKodprojek col-md-3"><input class="NOCinputs" disabled type="text" value="0.00" size="25" id="kos_jumlah"></td>'
                                +jumlah_columns+'</tr>';
                               
               $('#perincian_table').append(footer_html);

            }

            if(kewangan_negeri!=null)
            {
              loadKewanganData(kewangan_negeri);
              calculateNegeriKosJumlah();
              calculateNegeriJumlahTotal();

            }
            

            
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

//------------------end last table--------------



//simpan belanja pengurus function
// function submitBelanjaMengurus() {
//     var formDataBelanja = new FormData();

//     pelaksanaanTableData = getPelaksanaanTableValue()
//     formDataBelanja.append('pelaksanaanTableData', JSON.stringify(pelaksanaanTableData))
//     axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
//     axios({
//             method: 'post',
//             url: {{ env('API_URL') }} + "api/project/kewangan/belanja_mengurus",
//             responseType: 'json',
//             data: formDataBelanja
//         })
//         .then(function(response) {
//             if (response.data.code == 200) {

//             } else {
//                     alert('error while saving project')
//             }
//         })
//         .catch(function(error) {
//             console.log(error);
//         })
//   }


//********************************Simpan***********************************

$("#simpan").click(function(){
  $("div.spanner").addClass("show");
$("div.overlay").addClass("show");

  submitBelanjaMengurus()
  var formData = new FormData();
  
  let txtskopid = document.querySelectorAll("[id='hiddenskopid']");  
  let txtsubskopid = document.querySelectorAll("[id='hiddensubskopid']");
  let txtkuantiti = document.querySelectorAll("[id='componentkauntiti']");
  let txtkos = document.querySelectorAll("[id='componentkos']");
  let txtunit = document.querySelectorAll("[id='componentunit']");
  let txtcatatan = document.querySelectorAll("[id='componentcatatan']");
  let nama_componen = document.querySelectorAll("[id='namacomponen']");
  let componentrows = document.querySelectorAll("[id='componentrow']");
  let alljumlahkos = document.querySelectorAll(".jumlahkos");


  let txtskopidsub = document.querySelectorAll("[id='hiddenskopidsub']");
  
  let txtskopidsubsub = document.querySelectorAll("[id='hiddensubsubskopid']");  
  let txtkuantitisub = document.querySelectorAll("[id='subcomponentkauntiti']");
  let txtkossub = document.querySelectorAll("[id='subcomponentkos']");
  let txtunitsub = document.querySelectorAll("[id='subcomponentunit']");
  let txtcatatansub = document.querySelectorAll("[id='subcomponentcatatan']");
  let nama_componensub = document.querySelectorAll("[id^='subnamacomponen']");
  let componentrowssub = document.querySelectorAll("[id='subcomponentrow']");
  let alljumlahkossub = document.querySelectorAll(".subjumlahkos");

  let maincomponentrows = document.querySelectorAll("[id^='maincomponentrow']");

  let allmainjumlahkos = document.querySelectorAll(".mainskopjumlahkos");
  let allmainskopid = document.querySelectorAll("[id='skopid']");

  mainskopdetails = []

  
  for (var i = 0;i < maincomponentrows.length; i++) {                         
      data= {};

      if(isNaN(removecomma(allmainjumlahkos[i].value))){
        data.jumlahkos = 0;
      }
      else{
        data.jumlahkos = removecomma(allmainjumlahkos[i].value);
      }
      
      data.skop_id = allmainskopid[i].value
      // data.sub_skop_project_code = txtsubskopid[i].value
      // data.Kuantiti = removecomma(txtkuantiti[i].value)
      // data.units= txtunit[i].value
      // data.Kos = removecomma(txtkos[i].value)
      // data.Catatan = txtcatatan[i].value  
      // data.nama_componen = nama_componen[i].value 

      mainskopdetails.push(JSON.stringify(data))
  }
    
  componentstext = []  
  for (var i = 0;i < componentrows.length; i++) {                         
      data= {};

      if(isNaN(removecomma(alljumlahkos[i].value))){
        data.jumlahkos = 0;
      }
      else{
        data.jumlahkos = removecomma(alljumlahkos[i].value);
      }

      if(isNaN(removecomma(txtkuantiti[i].value))){
        data.Kuantiti = 0;
      }
      else{
        data.Kuantiti = removecomma(txtkuantiti[i].value);
      }

      if(isNaN(removecomma(txtkos[i].value))){
        data.Kos = 0;
      }
      else{
        data.Kos = removecomma(txtkos[i].value)
      }
      
      //data.jumlahkos = removecomma(alljumlahkos[i].value);
      data.skop_id = txtskopid[i].value

      
      data.sub_skop_project_code = txtsubskopid[i].value
      

      //data.Kuantiti = removecomma(txtkuantiti[i].value)
      data.units= txtunit[i].value
      
      data.Catatan = txtcatatan[i].value  
      data.nama_componen = nama_componen[i].value 

      componentstext.push(JSON.stringify(data))
  }

  if(isPrelimItem_Present){

    var prelimjumlahkos = document.getElementById("prelimcomponentjumlahkos");

    let prelimtxtskopid = document.querySelector("[id='prelimhiddenskopid']");  
    let prelimtxtsubskopid = document.querySelector("[id='prelimhiddensubskopid']");
    let prelimtxtkuantiti = document.querySelectorAll("[id='prelimradio']");
    var qtyval = 0;
    if(prelimtxtkuantiti.length>0){
      for(j=0;j<prelimtxtkuantiti.length;j++){
        if(prelimtxtkuantiti[j].checked){
          qtyval = prelimtxtkuantiti[j].value;
        }
      }
    }
    let prelimtxtkos = 0;//document.querySelectorAll("[id='prelimcomponentkos']");
    let prelimtxtunit = 0;//document.querySelectorAll("[id='prelimcomponentunit']");
    let prelimtxtcatatan = document.querySelectorAll("[id='prelimcomponentcatatan']");
    let prelimnama_componen = document.querySelectorAll("[id='prelimnamacomponen']");
  
  //let prelimalljumlahkos = document.querySelectorAll(".prelimjumlahkos");

      data= {};

      if(isNaN(removecomma(prelimjumlahkos.value))){
        data.jumlahkos = 0;
      }
      else{
        data.jumlahkos = removecomma(prelimjumlahkos.value);
      }

      //data.jumlahkos = removecomma(prelimjumlahkos.value);
      data.skop_id = prelimtxtskopid.value
      data.sub_skop_project_code = prelimtxtsubskopid.value
      data.Kuantiti = parseFloat(qtyval)
      data.units= ""
      data.Kos = 0
      data.Catatan = prelimtxtcatatan[0].value  
      data.nama_componen =prelimnama_componen[0].value 

      componentstext.push(JSON.stringify(data))

  }

  componentssubtext = []  
  for (i = 0;i < componentrowssub.length; i++) {                         
      data= {};

      if(isNaN(removecomma(alljumlahkossub[i].value))){
        data.jumlahkos = 0;
      }
      else{
        data.jumlahkos = removecomma(alljumlahkossub[i].value);
      }

      if(isNaN(removecomma(txtkuantitisub[i].value))){
        data.Kuantiti = 0;
      }
      else{
        data.Kuantiti = removecomma(txtkuantitisub[i].value);
      }

      if(isNaN(removecomma(txtkossub[i].value))){
        data.Kos = 0;
      }
      else{
        data.Kos = removecomma(txtkossub[i].value)
      }
      //data.jumlahkos = removecomma(alljumlahkossub[i].value);
      data.skop_id = txtskopidsub[i].value
      data.sub_skop_id = txtskopidsubsub[i].value
      //data.Kuantiti = removecomma(txtkuantitisub[i].value)
      data.units= txtunitsub[i].value
      //data.Kos = removecomma(txtkossub[i].value)
      data.Catatan = txtcatatansub[i].value  
      data.nama_componen = nama_componensub[i].value 

      componentssubtext.push(JSON.stringify(data))
  }


  


  // ****Table perunding tapak***************************************************************

  let txtjawatantapak = document.querySelectorAll("[id^='txtjawatantapak']");  
  let txtmanmonthtapak = document.querySelectorAll("[id^='txtmanmonthtapak']");
  let txtmultipliertapak = document.querySelectorAll("[id^='txtmultipliertapak']");
  let txtsalarytapak = document.querySelectorAll("[id^='txtsalarytapak']");
  let txtamounttapak = document.querySelectorAll("[id^='txtamounttapak']");
  let txtperundingcatatantapak = document.querySelectorAll("[id^='txtperundingcatatantapak']");
  let perundingrowstapak = document.querySelectorAll("[id^='perundingrowtapak']");
  let isPrefesionaltapak = document.querySelectorAll("[id^='hiddenperundingtapakid']");
  let all_perunding_jumlahkostapak = document.querySelectorAll(".perundingjumlahkostapak");


  perundingtexttapak = []  
  for (var i = 0;i < perundingrowstapak.length; i++) {                         
      data= {};

      if(isNaN(removecomma(all_perunding_jumlahkostapak[i].value))){
        data.jumlahkos = 0;
      }
      else{
        data.jumlahkos = removecomma(all_perunding_jumlahkostapak[i].value);
      }

      if(isNaN(removecomma(txtmultipliertapak[i].value))){
        data.multiplier = 0;
      }
      else{
        data.multiplier = removecomma(txtmultipliertapak[i].value);
      }

      if(isNaN(removecomma(txtmanmonthtapak[i].value))){
        data.man_month = 0;
      }
      else{
        data.man_month = removecomma(txtmanmonthtapak[i].value)
      }

      if(isNaN(removecomma(txtsalarytapak[i].value))){
        data.salary = 0;
      }
      else{
        data.salary = removecomma(txtsalarytapak[i].value)
      }

      if(isNaN(removecomma(txtamounttapak[i].value))){
        data.amount = 0;
      }
      else{
        data.amount = removecomma(txtamounttapak[i].value)
      }

      data.is_Profesional = isPrefesionaltapak[i].value;
      // data.jumlahkos = removecomma(all_perunding_jumlahkostapak[i].value);
      // data.multiplier = removecomma(txtmultipliertapak[i].value)
      // data.man_month = removecomma(txtmanmonthtapak[i].value)
      // data.salary= removecomma(txtsalarytapak[i].value)
      // data.amount = removecomma(txtamounttapak[i].value)
      data.catatan = txtperundingcatatantapak[i].value  
      data.jawatan = txtjawatantapak[i].value 

      perundingtexttapak.push(JSON.stringify(data))
  }
   

  perundingtexttapak.forEach((item) => {
      formData.append('perundingtexttapak[]', item);
    });
  
  //****Tabel perunding tapak ends********************************************************* */

  
  if(isPerundingPresent &&  isPerundingKajian){

    let txtjawatan = document.querySelectorAll("[id^='txtjawatan']");  
    let txtmanmonth = document.querySelectorAll("[id^='txtmanmonth']");
    let txtmultiplier = document.querySelectorAll("[id^='txtmultiplier']");
    let txtsalary = document.querySelectorAll("[id^='txtsalary']");
    let txtamount = document.querySelectorAll("[id^='txtamount']");
    let txtperundingcatatan = document.querySelectorAll("[id^='txtperundingcatatan']");
    let perundingrows = document.querySelectorAll("[id='perundingrow']");
    let isPrefesional = document.querySelectorAll("[id^='hiddenperundingid']");
    let all_perunding_jumlahkos = document.querySelectorAll(".perundingjumlahkos");


    perundingtext = []  
    for (var i = 0;i < perundingrows.length; i++) {                         
        data= {};

        if(isNaN(removecomma(all_perunding_jumlahkos[i].value))){
        data.jumlahkos = 0;
      }
      else{
        data.jumlahkos = removecomma(all_perunding_jumlahkos[i].value);
      }

      if(isNaN(removecomma(txtmultiplier[i].value))){
        data.multiplier = 0;
      }
      else{
        data.multiplier = removecomma(txtmultiplier[i].value);
      }

      if(isNaN(removecomma(txtmanmonth[i].value))){
        data.man_month = 0;
      }
      else{
        data.man_month = removecomma(txtmanmonth[i].value)
      }

      if(isNaN(removecomma(txtsalary[i].value))){
        data.salary = 0;
      }
      else{
        data.salary = removecomma(txtsalary[i].value)
      }

      if(isNaN(removecomma(txtamount[i].value))){
        data.amount = 0;
      }
      else{
        data.amount = removecomma(txtamount[i].value)
      }
        data.is_Profesional = isPrefesional[i].value;
        // data.jumlahkos = removecomma(all_perunding_jumlahkos[i].value);
        // data.multiplier = removecomma(txtmultiplier[i].value)
        // data.man_month = removecomma(txtmanmonth[i].value)
        // data.salary= removecomma(txtsalary[i].value)
        // data.amount = removecomma(c[i].value)
        data.catatan = txtperundingcatatan[i].value  
        data.jawatan = txtjawatan[i].value 

        perundingtext.push(JSON.stringify(data))
    }
   

    perundingtext.forEach((item) => {
      formData.append('perundingtext[]', item);
    });
  }
    
  componentstext.forEach((item) => {
    formData.append('componentstext[]', item);
  });

  //console.log("rowtttttttttttt: "+componentssubtext.length )

  componentssubtext.forEach((item) => {
    formData.append('componentssubtext[]', item);
  });

  mainskopdetails.forEach((item) => {
    formData.append('mainskopdetails[]', item);
  });
      

    var Permohonan_Projek_id=$("#project_id").val(); 
        
    formData.append("permohonan_projek_id",Permohonan_Projek_id);

    formData.append('user_id', {{Auth::user()->id}})

    axios({

      method: 'POST',
      url: api_url+"api/project/kewanganskop-details/"+$('#project_id').val(),
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
          //$("#add_role_sucess_modal").modal('show')
          $("#tutup_new").click(function(){
            var reload= location.reload();                    
            
          })
      }
    })
    .catch(function (error) {
        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
    })

//**************************Top Section***************************************************************
var formtopsectionData = new FormData();
var Permohonan_Projek_id=$("#project_id").val(); 

all_oe = document.querySelectorAll(".totalOE");
all_KosKeseluruhan = document.querySelectorAll(".KosKeseluruhan");

totalOE = 0;
totalKosKeseluruhan=0;

var cmbkomponen = document.getElementById('cmbkomponen').value;
var txtsilingdimohon = document.getElementById('txtsilingdimohon').value;
txtsilingdimohon = removecomma(txtsilingdimohon);

var totalkoscomponen = document.getElementById('totalkoscomponen').value;
totalkoscomponen = removecomma(totalkoscomponen);

// var ssttax = document.getElementById('componentfinaltax').value;
// ssttax = removecomma(ssttax);

var ssttaxcopy = document.getElementById('componentfinaltaxcopy').value;
if(isNaN(removecomma(ssttaxcopy))){
  ssttaxcopy = 0;
}
else{
  ssttaxcopy = removecomma(ssttaxcopy)
}

var imbuhanbalik_amt_copy = document.getElementById('imbuhanbalikcopy').value;

if(isNaN(removecomma(imbuhanbalik_amt_copy))){
  imbuhanbalik_amt_copy = 0;
}
else{
  imbuhanbalik_amt_copy = removecomma(imbuhanbalik_amt_copy)
}


var piawaianggarankos = document.getElementById('componentanggarankos').value;
if(isNaN(removecomma(piawaianggarankos))){
  piawaianggarankos = 0;
}
else{
  piawaianggarankos = removecomma(piawaianggarankos)
}

var yuranperunding = 0
var yuran_professional=0
var yuran_subprofessional=0
var yuran_imbuhanbalik =0
var yuran_anggaran = 0

var yuran_ssttax = 0
if(isPerundingPresent &&  isPerundingKajian){

    yuranperunding = document.getElementById('yuranperunding_jumlahkos').value;

    if(isNaN(removecomma(yuranperunding))){
      yuranperunding = 0;
    }
    else{
      yuranperunding = removecomma(yuranperunding)
    }
    //yuranperunding = removecomma(yuranperunding);


    let yuranprofessional = document.querySelectorAll("[id^='perundingjumlahkos1']");
    let yuransubprofessional = document.querySelectorAll("[id^='perundingjumlahkos0']");

    if(yuranprofessional){

      if(isNaN(removecomma(yuranprofessional[0].value))){
        yuran_professional = 0;
      }
      else{
        yuran_professional = yuranprofessional[0].value;
      }
      
    }


    if(yuransubprofessional){

      if(isNaN(removecomma(yuranprofessional[0].value))){
        yuran_subprofessional = 0;
      }
      else{
        yuran_subprofessional = yuranprofessional[0].value;
      }
      
    }
    yuran_professional = removecomma(yuran_professional);
    yuran_subprofessional = removecomma(yuran_subprofessional);
    //var yuran_subprofessional = document.getElementById('componentfinaltaxcopy').value;
    

    yuran_imbuhanbalik = document.getElementById('imbuhanbalik').value;
    if(isNaN(removecomma(yuran_imbuhanbalik))){
      yuran_imbuhanbalik = 0;
    }
    else{
      yuran_imbuhanbalik = removecomma(yuran_imbuhanbalik)
    }
    //yuran_imbuhanbalik = removecomma(yuran_imbuhanbalik);

    yuran_ssttax = document.getElementById('perundingssttax').value;
    if(isNaN(removecomma(yuran_ssttax))){
      yuran_ssttax = 0;
    }
    else{
      yuran_ssttax = removecomma(yuran_ssttax)
    }
    //yuran_ssttax = removecomma(yuran_ssttax);

    yuran_anggaran = document.getElementById('ANGGARANKOS').value;
    if(isNaN(removecomma(yuran_anggaran))){
      yuran_anggaran = 0;
    }
    else{
      yuran_anggaran = removecomma(yuran_anggaran)
    }
    //yuran_anggaran = removecomma(yuran_anggaran);


}


var yuranperunding_tapak = 0
var yuran_professional_tapak=0
var yuran_subprofessional_tapak=0
var yuran_imbuhanbalik_tapak =0
var yuran_anggaran_tapak = 0
var yuran_ssttax_tapak = 0

if(isPerundingPresent &&  isPerundingTapak){

  yuranperunding_tapak = document.getElementById('yuranperunding_tapak_jumlahkos').value;
  if(isNaN(removecomma(yuranperunding_tapak))){
    yuranperunding_tapak = 0;
  }
  else{
    yuranperunding_tapak = removecomma(yuranperunding_tapak)
  }
  //yuranperunding_tapak = removecomma(yuranperunding_tapak);


    let all_yuran_professional_tapak = document.querySelectorAll("[id='perundingjumlahkostapak1']");
    let all_yuran_subprofessional_tapak = document.querySelectorAll("[id='perundingjumlahkostapak0']");

    if(all_yuran_professional_tapak){
      if(isNaN(removecomma(all_yuran_professional_tapak[0].value))){
        yuran_professional_tapak = 0;
      }
      else{
        yuran_professional_tapak = all_yuran_professional_tapak[0].value;
        yuran_professional_tapak = removecomma(yuran_professional_tapak);

      }
      
    }


    if(all_yuran_subprofessional_tapak){
      if(isNaN(removecomma(all_yuran_subprofessional_tapak[0].value))){
        yuran_subprofessional_tapak = 0;
      }
      else{
        yuran_subprofessional_tapak = all_yuran_subprofessional_tapak[0].value;
        yuran_subprofessional_tapak = removecomma(yuran_subprofessional_tapak);
      }
      
    }
    
    
    

    yuran_imbuhanbalik_tapak = document.getElementById('imbuhanbaliktapak').value;
    if(isNaN(removecomma(yuran_imbuhanbalik_tapak))){
      yuran_imbuhanbalik_tapak = 0;
    }
    else{
      yuran_imbuhanbalik_tapak = removecomma(yuran_imbuhanbalik_tapak)
    }
    //yuran_imbuhanbalik_tapak = removecomma(yuran_imbuhanbalik_tapak);

    yuran_ssttax_tapak = document.getElementById('perundingssttaxtapak').value;
    if(isNaN(removecomma(yuran_ssttax_tapak))){
      yuran_ssttax_tapak = 0;
    }
    else{
      yuran_ssttax_tapak = removecomma(yuran_ssttax_tapak)
    }
    //yuran_ssttax_tapak = removecomma(yuran_ssttax_tapak);

    yuran_anggaran_tapak = document.getElementById('ANGGARANKOStapak').value;
    if(isNaN(removecomma(yuran_anggaran_tapak))){
      yuran_anggaran_tapak = 0;
    }
    else{
      yuran_anggaran_tapak = removecomma(yuran_anggaran_tapak)
    }
    //yuran_anggaran_tapak = removecomma(yuran_anggaran_tapak);

    


}


// var tempssttax = document.getElementById('componentroughtax').value;
// tempssttax = removecomma(tempssttax);

var tempjumlahkos = document.getElementById('componentroughjumlahkos').value;

if(isNaN(removecomma(tempjumlahkos))){
  tempjumlahkos = 0;
}else{
  tempjumlahkos = removecomma(tempjumlahkos);
}
//tempjumlahkos = removecomma(tempjumlahkos);


var jumlahcost = document.getElementById('finaltotaljumlahkos').value;

if(isNaN(removecomma(jumlahcost))){
  jumlahcost = 0;
}else{
  jumlahcost = removecomma(jumlahcost);
}


var imbuhanbalik_amt=0

var anggarankos=0;
var lblpmax=0;
var lblpmin=0;
var lblpavg=0;
var pselection=0;
var ftotalcostpercent=0;
var totalkos_perunding=0;

if(isTerperinciPresent && isPerundingPresent){
  var imbuhanbalikcontrol = document.getElementById('imbuhanbalikcopy');
  if(imbuhanbalikcontrol){
  imbuhanbalik_amt = imbuhanbalikcontrol.value;
  if(isNaN(imbuhanbalik_amt)){
    imbuhanbalik_amt = 0;
  }else{
    imbuhanbalik_amt = removecomma(imbuhanbalik_amt);
  }
  //console.log("Hello im buhan: "+imbuhanbalik_amt)
  

}
  anggarankos = document.getElementById('ftotalcost').value;
  if(isNaN(removecomma(anggarankos))){
    anggarankos = 0;
  }else{
    anggarankos = removecomma(anggarankos);
  }
//anggarankos = removecomma(anggarankos);

lblpmax = document.getElementById('lblpmax').value;
if(isNaN(lblpmax)){
  lblpmax = 0;
  }else{
    lblpmax = removecomma(lblpmax);
  }


lblpmin = document.getElementById('lblpmin').value;
if(isNaN(lblpmin)){
  lblpmin = 0;
  }else{
    lblpmin = removecomma(lblpmin);
  }


lblpavg = document.getElementById('lblpavg').value;
if(isNaN(lblpavg)){
  lblpavg = 0;
  }else{
    lblpavg = removecomma(lblpavg);
  }

  var pmaxradio = document.getElementById('pmax');
  var pminradio = document.getElementById('pmin');
  var pavgradio = document.getElementById('pavg');

  if(pmaxradio.checked==true){
    pselection = 1;
  }
  else if(pminradio.checked==true){
    pselection = 2;
  }
  else if(pavgradio.checked==true){
    pselection = 3;
  }


ftotalcostpercent = document.getElementById('ftotalcostpercent').value;
if(isNaN(removecomma(ftotalcostpercent))){
  ftotalcostpercent = 0;
}else{
  ftotalcostpercent = removecomma(ftotalcostpercent);
}
//ftotalcostpercent = removecomma(ftotalcostpercent);

totalkos_perunding = document.getElementById('totalkosperunding').value;
if(isNaN(removecomma(totalkos_perunding))){
  totalkos_perunding = 0;
}else{
  totalkos_perunding = removecomma(totalkos_perunding);
}
//totalkos_perunding = removecomma(totalkos_perunding);

}

//var txtsilingdimohon = window.myinput.rawValue;
var txtsilingbayangan = document.getElementById('txtsilingbayangan').value;
if(isNaN(removecomma(txtsilingbayangan))){
  txtsilingbayangan = 0;
}else{
  txtsilingbayangan = removecomma(txtsilingbayangan);
}
//txtsilingbayangan = removecomma(txtsilingbayangan);


if(all_oe.length>0){
  if(isNaN(removecomma(all_oe[all_oe.length-1].value))){
    totalOE = 0
  }else{
    totalOE = removecomma(all_oe[all_oe.length-1].value)
  }
  
}
if(all_KosKeseluruhan.length>0){
  if(isNaN(removecomma(all_KosKeseluruhan[all_KosKeseluruhan.length-1].value))){
    totalKosKeseluruhan = 0
  }else{
    totalKosKeseluruhan = removecomma(all_KosKeseluruhan[all_KosKeseluruhan.length-1].value)
  }
  //totalKosKeseluruhan = removecomma(all_KosKeseluruhan[all_KosKeseluruhan.length-1].value)
}

formtopsectionData.append("permohonan_projek_id",Permohonan_Projek_id);
formtopsectionData.append("Komponen_id",cmbkomponen);

formtopsectionData.append("totalkos",totalkoscomponen);
formtopsectionData.append("Siling_Dimohon",txtsilingdimohon);
formtopsectionData.append("Siling_Bayangan",txtsilingbayangan);

formtopsectionData.append("kos_keseluruhan_oe",totalOE);
formtopsectionData.append("kos_keseluruhan",totalkoscomponen);
formtopsectionData.append("imbuhan_balik",imbuhanbalik_amt);
// formtopsectionData.append("sst_tax",ssttax);
// formtopsectionData.append("temp_sst_tax",tempssttax);
formtopsectionData.append("temp_jumlahkos",tempjumlahkos);
formtopsectionData.append("jumlahkos",jumlahcost);


formtopsectionData.append("anggaran_mainworks",anggarankos);
formtopsectionData.append("P_max",lblpmax);
formtopsectionData.append("P_min",lblpmin);
formtopsectionData.append("P_avg",lblpavg);
formtopsectionData.append("P_selection",pselection);
formtopsectionData.append("design_fee",ftotalcostpercent);

formtopsectionData.append("totalkos_perunding",totalkos_perunding);



formtopsectionData.append("cukai_sst",ssttaxcopy);
formtopsectionData.append("imbuhanbalik_piawai",imbuhanbalik_amt_copy);
formtopsectionData.append("anggarankos_piawai",piawaianggarankos);

formtopsectionData.append("yuran_perunding_kos",yuranperunding);
formtopsectionData.append("yuran_anggaran",yuran_anggaran);
formtopsectionData.append("yuran_imbuhanbalik",yuran_imbuhanbalik);
formtopsectionData.append("yuran_ssttax",yuran_ssttax);
formtopsectionData.append("yuran_subprofessional",yuran_subprofessional);
formtopsectionData.append("yuran_professional",yuran_professional);

formtopsectionData.append("yuran_perunding_kos_tapak",yuranperunding_tapak);
formtopsectionData.append("yuran_anggaran_tapak",yuran_anggaran_tapak);
formtopsectionData.append("yuran_imbuhanbalik_tapak",yuran_imbuhanbalik_tapak);
formtopsectionData.append("yuran_ssttax_tapak",yuran_ssttax_tapak);
formtopsectionData.append("yuran_subprofessional_tapak",yuran_subprofessional_tapak);
formtopsectionData.append("yuran_professional_tapak",yuran_professional_tapak);

    
formtopsectionData.append('user_id', {{Auth::user()->id}})

axios({

method: 'POST',
url: api_url+"api/project/addkewanganprojek-details/"+$('#project_id').val(),
responseType: 'json',
data:formtopsectionData,   
headers: {
    "Content-Type": "application/json",
    "Authorization": api_token,
},     
})
.then(function (result) {
//console.log(result.data)
if(result.data.status=='Success'){
    $("#add_role_sucess_modal").modal('show')
    $("#tutup_new").click(function(){
      var reload= location.reload();                    
      
    })
}
})
.catch(function (error) {
    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
})



//******************************end of top section***********************************************************


//------------------------- third table----------------------
    var formDataSilling = new FormData();

      var myTableArray = [];
      var arrayOfJumlah = [];
      $("table#projek_table_kewagan tr").each(function() { 

          var arrayOfThisRow = [];
          var tableData = $(this).find("input[type='text']"); ////console.log(tableData);
          if (tableData.length > 0) {
              tableData.each(function() {  
                arrayOfThisRow.push(removecomma($(this)[0].value)); 
              }); 
              let popped = arrayOfThisRow.pop();
              arrayOfJumlah.push(popped);
              var theRemovedElement = arrayOfThisRow.shift(); // theRemovedElement == 1
              for(i=arrayOfThisRow.length;i<10;i++)
              {
                arrayOfThisRow[i]='0.00';
              }
              myTableArray.push(arrayOfThisRow);
          }
      });
            
      myTableArray.forEach((item) => {
        formDataSilling.append('myTableArray[]', item);
      });

      arrayOfJumlah.forEach((item) => {
        formDataSilling.append('arrayOfJumlah[]', item);
      });
      
      var scope_id=document.getElementById('scope').value;
      formDataSilling.append('scope_id', scope_id);
      formDataSilling.append('user_id', {{Auth::user()->id}})

      axios.defaults.headers.common["Authorization"] = api_token;
      axios({

              method: 'POST',
              url: api_url+"api/project/add-skop-for-kewangan/"+{{$id}},
              responseType: 'json',
              data:formDataSilling,   
              headers: {
                  "Content-Type": "application/json",
                  "Authorization": api_token,
              },     
              })
              .then(function (result) {
              ////console.log(result.data)
              if(result.data.status=='Success'){
                  //$("#add_role_sucess_modal").modal('show')
                  $("#tutup_new").click(function(){
                    var reload= location.reload();                    
                    
                  })
              }
              })
              .catch(function (error) {
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
              })

//------------------- fourth table ----------------------------------------------
    var formDataKompenen = new FormData();
    var kompenen_table = document.getElementById("komponen_three_table_kewagan");
      var myTablekomponen = [];
      $("table#komponen_three_table_kewagan tr").each(function() { ////console.log($(this))

          var arrayOfThisRowkomponen = [];
          var tableData = $(this).find("td"); ////console.log(tableData.length);
          if (tableData.length > 0) {
              tableData.each(function() {  ////console.log($(this)[0].innerText)
                if($(this)[0].innerText=='')
                {
                  arrayOfThisRowkomponen.push(0); 
                }
                else
                {
                  arrayOfThisRowkomponen.push(1); 
                }
              }); 
              var theRemovedElement = arrayOfThisRowkomponen.shift(); // theRemovedElement == 1
              for(i=arrayOfThisRowkomponen.length;i<41;i++)
              {
                arrayOfThisRowkomponen[i]='0';
              }
              myTablekomponen.push(arrayOfThisRowkomponen);
          }

          ////console.log(myTablekomponen)
      });

      myTablekomponen.forEach((item) => {
        formDataKompenen.append('myTablekomponen[]', item);
      });
      var scope_id=document.getElementById('scope').value;
      formDataKompenen.append('scope_id', scope_id);
      formDataKompenen.append('user_id', {{Auth::user()->id}})


      axios.defaults.headers.common["Authorization"] = api_token;
      axios({

              method: 'POST',
              url: api_url+"api/project/add-bayaran-suku-for-kewangan/"+{{$id}},
              responseType: 'json',
              data:formDataKompenen,   
              headers: {
                  "Content-Type": "application/json",
                  "Authorization": api_token,
              },     
              })
              .then(function (result) {
              ////console.log(result.data)
              if(result.data.status=='Success'){
                  //$("#add_role_sucess_modal").modal('show')
                  $("#tutup_new").click(function(){
                    var reload= location.reload();                    
                    
                  })
              }
              })
              .catch(function (error) {
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
              })

//--------------------- fifth table ----------------------------

var formDataMaklumat = new FormData();

var myTableArrayMaklumat = [];
var arrayOfJumlahMaklumat = [];
$("table#perkara_table_kewagan tr").each(function() { 

    var arrayOfThisRowMaklumat = [];
    var tableDataMaklumat = $(this).find("input[type='text']"); //console.log(tableDataMaklumat);
    if (tableDataMaklumat.length > 0) {
      tableDataMaklumat.each(function() {  
          arrayOfThisRowMaklumat.push(removecomma($(this)[0].value)); 
        }); 
        let popped = arrayOfThisRowMaklumat.pop();
        arrayOfJumlahMaklumat.push(popped);
        for(i=arrayOfThisRowMaklumat.length;i<10;i++)
        {
          arrayOfThisRowMaklumat[i]='0.00';
        }
        myTableArrayMaklumat.push(arrayOfThisRowMaklumat);
    }
});
      
myTableArrayMaklumat.forEach((item) => {
  formDataMaklumat.append('myTableArrayMaklumat[]', item);
});

arrayOfJumlahMaklumat.forEach((item) => {
  formDataMaklumat.append('arrayOfJumlahMaklumat[]', item);
});
let perkra_id=['1','2','3'];
formDataMaklumat.append('perkra_id', perkra_id)
formDataMaklumat.append('user_id', {{Auth::user()->id}})

axios.defaults.headers.common["Authorization"] = api_token;
axios({

        method: 'POST',
        url: api_url+"api/project/add-maklumat-peruntukan/"+{{$id}},
        responseType: 'json',
        data:formDataMaklumat,   
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
        },     
        })
        .then(function (result) {
        ////console.log(result.data)
        if(result.data.status=='Success'){
            //$("#add_role_sucess_modal").modal('show')
            $("#tutup_new").click(function(){
              var reload= location.reload();                    
              
            })
        }
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

//------------------- last table ----------------------------------------------
console.log("perincian_table");
var formDataKompenen = new FormData();
    var kompenen_table = document.getElementById("perincian_table");
      var myTablekomponen = [];

      let all_main_negeri_text = document.querySelectorAll("[id^='negeridata_']"); console.log(all_main_negeri_text);
      let all_kos = document.querySelectorAll("[id^='kos_projeck']"); console.log(all_kos);

      let siling_0 = document.querySelectorAll("[id^='siling_0']"); console.log(siling_0);
      let siling_1 = document.querySelectorAll("[id^='siling_1']"); console.log(siling_1);
      let siling_2 = document.querySelectorAll("[id^='siling_2']"); console.log(siling_2);
      let siling_3 = document.querySelectorAll("[id^='siling_3']"); console.log(siling_3);
      let siling_4 = document.querySelectorAll("[id^='siling_4']"); console.log(siling_4);
      let siling_5 = document.querySelectorAll("[id^='siling_5']"); console.log(siling_5);
      let siling_6 = document.querySelectorAll("[id^='siling_6']"); console.log(siling_6);
      let siling_7 = document.querySelectorAll("[id^='siling_7']"); console.log(siling_7);
      let siling_8 = document.querySelectorAll("[id^='siling_8']"); console.log(siling_8);
      let siling_9 = document.querySelectorAll("[id^='siling_9']"); console.log(siling_9);



      var myTableArray = [];
      
      for (var i = 0; i <all_main_negeri_text.length; i++) {
        data= {};

        data.negeri = all_main_negeri_text[i].value;

        if(isNaN(removecomma(all_kos[i].value))){
            data.kos = 0;
        }
        else{
            data.kos = removecomma(all_kos[i].value);
        }

        if( siling_0[i] && removecomma(siling_0[i].value)){
            data.siling_0 = removecomma(siling_0[i].value);
        }
        else{
            data.siling_0 = 0;
        }

        if(siling_1[i] && removecomma(siling_1[i].value)){
            data.siling_1 = removecomma(siling_1[i].value);
        }
        else{
            data.siling_1 = 0;
        }
        if(siling_2[i] && removecomma(siling_2[i].value)){
            data.siling_2 = removecomma(siling_2[i].value);
        }
        else{
            data.siling_2 = 0;
        }
        if(siling_3[i] && removecomma(siling_3[i].value)){
            data.siling_3 = removecomma(siling_3[i].value);
        }
        else{
            data.siling_3 = 0;
        }
        if(siling_4[i] && removecomma(siling_4[i].value)){
            data.siling_4 = removecomma(siling_4[i].value);
        }
        else{
            data.siling_4 = 0;
        }
        if(siling_5[i] && removecomma(siling_5[i].value)){
            data.siling_5 = removecomma(siling_5[i].value);
        }
        else{
            data.siling_5 = 0;
        }
        if(siling_6[i] && removecomma(siling_6[i].value)){
            data.siling_6 = removecomma(siling_6[i].value);
        }
        else{
            data.siling_6 = 0;
        }
        if(siling_7[i] && removecomma(siling_7[i].value)){
            data.siling_7 = removecomma(siling_7[i].value);
        }
        else{
            data.siling_7 = 0;
        }
        if(siling_8[i] && removecomma(siling_8[i].value)){
            data.siling_8 = removecomma(siling_8[i].value);
        }
        else{
            data.siling_8 = 0;
        }
        if(siling_9[i] && removecomma(siling_9[i].value)){
            data.siling_9 = removecomma(siling_9[i].value);
        }
        else{
            data.siling_9 = 0;
        }

        myTableArray.push(JSON.stringify(data))
      }

      // console.log(myTableArray)
      var formDataNegri = new FormData();

      myTableArray.forEach((item) => {
        formDataNegri.append('kos_array[]', item);
      });

      formDataNegri.append('project_id', {{$id}})
      formDataNegri.append('user_id', {{Auth::user()->id}})

      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");



      axios.defaults.headers.common["Authorization"] = api_token;
      axios({

              method: 'POST',
              url: api_url+"api/project/add-kewangan-negeri-data",
              responseType: 'json',
              data:formDataNegri,   
              headers: {
                  "Content-Type": "application/json",
                  "Authorization": api_token,
              },     
              })
              .then(function (result) {
              ////console.log(result.data)
              if(result.data.status=='Success'){
                  //$("#add_role_sucess_modal").modal('show')
                  $("#tutup_new").click(function(){
                    var reload= location.reload();                    
                    
                  })
              }
              })
              .catch(function (error) {
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
              })



//----------------------------------------Belanja----------------------------------
        
        
        
        var formDataBelanja = new FormData();

        var myTableArrayBelanja = [];
        var arrayOfJumlahBelanja = [];
        var noofbelanjarows = $("table#perkara_table_sec_kewagan tr");
        
        //console.log("No of belanja rows: "+noofbelanjarows.length);
        $("table#perkara_table_sec_kewagan tr").each(function() { 
          
            var arrayOfThisRowBelanja = [];
            var tableDataBelanja = $(this).find("input[type='text']");
            //var checkrow=0;
            firsttext=true;
            if (tableDataBelanja.length > 0) {
              //console.log("no of cells: "+tableDataBelanja.length)

              tableDataBelanja.each(function() {
                if(firsttext){
                  arrayOfThisRowBelanja.push($(this)[0].value);
                  firsttext=false; 
                } 
                else{
                  if(isNaN(removecomma($(this)[0].value))){
                    arrayOfThisRowBelanja.push(0); 
                  }
                  else{
                    arrayOfThisRowBelanja.push(removecomma($(this)[0].value)); 
                  }
                  
                } 
                  
                }); 
                let popped = arrayOfThisRowBelanja.pop();
                arrayOfJumlahBelanja.push(popped);
                for(i=arrayOfThisRowBelanja.length;i<11;i++)
                {
                  arrayOfThisRowBelanja[i]='0.00';
                }
                myTableArrayBelanja.push(arrayOfThisRowBelanja);
            }

            ////console.log("No of belanja rows: "+checkrow); 
        });
              
        myTableArrayBelanja.forEach((item) => {
          formDataBelanja.append('myTableArrayBelanja[]', item);
        });

        arrayOfJumlahBelanja.forEach((item) => {
          formDataBelanja.append('arrayOfJumlahBelanja[]', item);
        });
        //let perkra_id=['1','2','3'];
        //formDataBelanja.append('perkra_id', perkra_id)
        formDataBelanja.append('user_id', {{Auth::user()->id}})

        axios.defaults.headers.common["Authorization"] = api_token;
        axios({

          method: 'POST',
          url: api_url+"api/project/add-Belanja-peruntukan/"+{{$id}},
          responseType: 'json',
          data:formDataBelanja,   
          headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
          },     
        })
        .then(function (result) {
        ////console.log(result.data)
        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
          if(result.data.status=='Success'){
              //$("#add_role_sucess_modal").modal('show')
              $("#tutup_new").click(function(){
                var reload= location.reload();                    
                
              })
          }
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        
        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
        //---------------------------------------------------------------------------------
});


//*************************************************************************

//***************************to fetch the record*************************************************************************
let isMainWorksPresent=false;
isTerperinciPresent=false;
isPengurusanPresent=false;
isPerundingKajian=false;
isPerundingTapak=false;
isPrelimItem_Present=false;
prelimid=0
perundingdetailstapak=""
percentageprelim=0;
perundingcost=0;
pengurusan=""
perlikantperunding=0;
let flag=true;
let subflag=true;
let prelimflag=true;
let tapakflag=true;
let kajianflag=true;

forid=1898;
//-----------------
var cmbkomponenget =  document.getElementById("cmbkomponen");
  $.ajaxSetup({
        headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
              }
  });
 $.ajax({
                      type: "GET",
                      
                      url: api_url+"api/project/getkewangankomponen-details",
                      dataType: 'json',
                      success: function (result2) { 
                          // //console.log(result)
                          if (result2) {
                              $.each(result2.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_komponen;
                        el.value = opt;
                        cmbkomponenget.appendChild(el);
                        
                              
                      })
                      cmbkomponenget.value=2
                      
                      
                          
                    }else {
                              $.Notification.error(result.Message);
                          }
                      
                    }
                  });
 //------------------


        
        axios({
                method: 'get',
                url: api_url+"api/project/kewanganskopsection-details/"+$('#project_id').val(),
                responseType: 'json'        
        })
        .then(function (response) { 
          
          skopname = response.data.data.skopnames
          subskopname = response.data.data.subskopnames
          skop = response.data.data.skop
          skopsforkewangan = response.data.data.skopsforkewangan
          subskopsforkewangan = response.data.data.subskopsforkewangan
          perundingdetails = response.data.data.yuranperunding
          perundingdetailstapak = response.data.data.yuranperundingtapak
          isPerundingPresent=false;
          perundingcost=0;
          
          skopnama=""
          skopcode=0
          skopcost=0
          jumlahkos=0

          mainrow=0;
          subrow=0;
          subsubrow=0;
          //console.log(response.data)

          if(skop.length > 0) {
            $('#componentbody').empty();
            skop.forEach((item) => {

              mainrow+=1;
              //console.log(item.id);

              if(skopname.length > 0) {
                skopname.forEach((item1) => {
                  if(item.skop_project_code == item1.skop_code){
                    if(item1.skop_name == "Main Works"){
                      isMainWorksPresent=true;
                      
                      perundingcost = item.cost

                    }

                    if(item1.skop_name == "Perlantikan Perunding"){
                      //console.log("item1.skop_name"+item1.skop_name) ;   
                      //console.log("item1.item.cost"+item.cost) ;                  
                      //perundingcost = item.cost
                      //document.getElementById("ftotalcost").value=perundingcost;

                    }

                    if(item1.skop_name == "Pengurusan Projek"){
                                  
                      pengurusan = item.skop_project_code;
                      //document.getElementById("ftotalcost").value=perundingcost;

                    }



                    // if(item1.skop_name == "Pengurusan Projek"){
                    //   isPengurusanPresent=true;
                      
                    //   document.getElementById("perkara_table_kewagan").style="display: block"

                    // }
                    if(item1.skop_name == "Perlantikan Perunding"){
                      isPerundingPresent=true;
                      perlikantperunding = item.skop_project_code;

                    }
                    skopnama = item1.skop_name 
                    skopcode= item.skop_project_code
                    skopcost+=parseInt(item.cost)
                    
                  }
                })
              }

              //document.getElementById('totalkoscomponen').value = skopcost;
              let component_tr =""
              if(isMainWorksPresent == true && flag==true){
                flag=false;
                //console.log("main works present")
                var cl = item.skop_project_code;

                // var jkos =""
                //   if(item.cost === null){
                //     jkos=""
                //   }else{
                //     jkos=item.cost
                //   }
                component_tr = `<tr id="maincomponentrow">
                                <td><p id="rowno">`+mainrow+`</p></td>
                                <td>
                                <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                                  <div class="d-flex">
                                    <p>`+skopnama+`</p>
                                  </div>
                                </td>
                                 <td>
                                 
                                  <input
                                    type="text"
                                    value="`+item.cost+`"
                                    class="form-control text-right `+skopnama+` input-element splmainworksjumlah mainskopjumlahkos m`+item.skop_project_code+` jumlahkosfor`+item.skop_project_code+`" 
                                    id="jumlahkos`+item.skop_project_code+`"
                                    onchange="getfinalcost(this.value,`+cl+`);"
                                    readonly
                                  />
                                </td>
                               <td>
                                  <input
                                      type="hidden"
                                      data-skop = "`+item.skop_project_code+`"
                                      class="form-control text-right" 
                                      id="skopid"
                                    value="`+item.skop_project_code+`" 
                                    />
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    value="0"
                                    class="form-control text-right invisible" 
                                    id=""
                                  />
                                </td>
                                <td>
                                  <input
                                      type="text"
                                      value="0"
                                      class="form-control text-right invisible" 
                                      id=""
                                    />
                                </td> 
                                <td>
                                  <input
                                      type="text"
                                      value="0"
                                      class="form-control text-right invisible" 
                                      id=""
                                    />
                                </td> 
                                <td>
                                  <input
                                    type="text"
                                    value="Test C"
                                    class="form-control text-right invisible" 
                                    id=""
                                  />
                                </td>
                              </tr>`;
                
              }else{
                //console.log("main works not present")
                var cl = item.skop_project_code;
                 component_tr = `<tr id="maincomponentrow">
                                <td><p id="rowno">`+mainrow+`</p></td>
                                <td>
                                <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                                  <div class="d-flex">
                                    <p>`+skopnama+`</p>
                                  </div>
                                </td>
                                 <td>
                                  <input
                                    type="text"
                                    value="`+item.cost+`"
                                    class="form-control text-right `+skopnama+` input-element mainskopjumlahkos m`+item.skop_project_code+` jumlahkosfor`+item.skop_project_code+`" 
                                    id="jumlahkos`+item.skop_project_code+`"
                                    onchange="getfinalcost(this.value,`+cl+`);"                            
                                    readonly

                                  />
                                </td>
                               <td>
                                  <input
                                      type="hidden"
                                      data-skop = "`+item.skop_project_code+`"
                                      class="form-control text-right" 
                                      id="skopid"
                                    value="`+item.skop_project_code+`" 
                                    />
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    value="0"
                                    class="form-control text-right invisible" 
                                    id=""
                                  />
                                </td>
                                <td>
                                  <input
                                      type="text"
                                      value="0"
                                      class="form-control text-right invisible" 
                                      id=""
                                    />
                                </td> 
                                <td>
                                  <input
                                      type="text"
                                      value="0"
                                      class="form-control text-right invisible" 
                                      id=""
                                    />
                                </td> 
                                <td>
                                  <input
                                    type="text"
                                    value="Test C"
                                    class="form-control text-right invisible" 
                                    id=""
                                  />
                                </td>
                              </tr>`;

              }

              
              
                     subrow=0;       
                $('#componentbody').append(component_tr);
                ////console.log("The length of skopsforkewangan is: "+skopsforkewangan.length)
                if(skopsforkewangan.length > 0){


                 
                  skopsforkewangan.forEach((skopitem) => {      
                // -----------------------------------------------------------
                    
                    if(skopitem.skop_project_code == item.skop_project_code){
                      subrow+=1;
                      
                      if(subskopname.length > 0) {
                        subskopname.forEach((subskopitem) => {
                          if(skopitem.sub_skop_project_code == subskopitem.sub_skop_code){

                            
                            subskopnama = subskopitem.sub_skop_name;

                            if(subskopitem.sub_skop_name == "Perlantikan Perunding Rekabentuk Terperinci"){
                              isTerperinciPresent=true;
                            }                           

                            if(subskopitem.sub_skop_name == "Perlantikan Perunding Kajian"){
                              isPerundingKajian=true;
                            }
                            if(subskopitem.sub_skop_name == "Perlantikan Perunding Penyeliaan Tapak"){
                              isPerundingTapak=true;
                            }

                            if(subskopitem.sub_skop_name == "Lain-lain"){
                              subskopnama=skopitem.lain_lain;
                            }

                            if(subskopitem.sub_skop_name == "Preliminaries and General Item"){
                              isPrelimItem_Present=true;
                              prelimid = skopitem.sub_skop_project_code;

                            }
                            
                            
                            
                            //skopcost+=parseInt(item.cost)
                            
                          }
                        })
                      }
                //-----------------------------------------------------------------------------

                var Catatan=""
                  if(skopitem.Catatan === null){
                    Catatan=""
                  }else{
                    Catatan=skopitem.Catatan
                  }



                  var units=""
                  if(skopitem.units === null  || skopitem.units === "0"){
                    units=""
                  }else{
                    units=skopitem.units
                  }
                  
                  var qty =""
                  if(skopitem.Kuantiti === null || skopitem.Kuantiti == 0){
                    qty=""
                  }else{
                    qty=skopitem.Kuantiti
                  }

                  var kos =""
                  if(skopitem.Kos === null || skopitem.Kos == 0.00){
                    kos=""
                  }else{
                    kos=skopitem.Kos
                  }

                  var jkos =""
                  if(skopitem.jumlahkos === null || skopitem.jumlahkos == 0.00){
                    jkos=""
                  }else{
                    jkos=skopitem.jumlahkos
                  }

                  // var jkos = parseFloat(qty)*parseFloat(kos);
                  // if(isNaN(jkos)){
                  //   jkos=""
                  // }

                let component_tr = ""
                if(isTerperinciPresent && subflag){
                  
                  subflag=false;
                  
                  component_tr = `<tr id="componentrow" class="d-row">
                                    <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                                    <td class="pl-3">
                                    <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                                      <div class="d-flex">
                                      <input
                                        type="text"
                                        value="`+subskopnama +`"
                                        class="form-control text-left" 
                                        id="namacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"      
                                        />
                                        <button type="button" disabled class="ml-auto add_subrow">
                                          <i class="ri-add-box-line ri-2x"></i>
                                        </button>
                                      </div>  
                                          
                                    <td>
                                      <input
                                        type="text"
                                        value="`+jkos+`"
                                        class="form-control text-right jumlahkos mainperundingjumlah subskopid_forsubcal_`+skopitem.sub_skop_project_code+` input-element jumlahkosfor`+item.skop_project_code+`" 
                                        id="jumlahkos`+skopitem.skop_project_code+`"
                                        onchange="checkjumlah(this.id);"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopid" data-skop="">
                                      <input
                                        type="text"
                                        value="`+qty+`"
                                        class="form-control text-right input-element"
                                        id="componentkauntiti"
                                        readonly
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                    <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="hiddensubskopid" data-skop="">
                                      <input
                                          type="text"
                                          value="`+units+`"
                                          class="form-control text-right"  
                                          id="componentunit"
                                          readonly
                                        />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+kos+`"
                                        class="form-control text-right input-element" 
                                        id="componentkos"
                                        readonly
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+(parseFloat(qty)*parseFloat(kos)).toFixed(2)+`"
                                        class="form-control text-right mainworksjumlah terperinchi_temp_jumlahkos  input-element tempjumlah" 
                                        id="componentjumlahkos"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input
                                          type="text"
                                          value="`+Catatan+`"
                                          class="form-control text-right" 
                                          id="componentcatatan"
                                        />
                                    </td> 

                                </tr>`;
                }
                else if(isPerundingKajian && kajianflag){
                  
                  kajianflag=false;
                  
                  component_tr = `<tr id="componentrow" class="d-row">
                                    <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                                    <td class="pl-3">
                                    <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                                      <div class="d-flex">
                                      <input
                                        type="text"
                                        value="`+subskopnama +`"
                                        class="form-control text-left" 
                                        id="namacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"      
                                        />
                                        <button type="button" disabled class="ml-auto add_subrow">
                                      <img
                                        src="{{ asset('assets/images/Add_box.png') }}"
                                        alt=""
                                      />
                                    </button>
                                      </div>  
                                          
                                    <td>
                                      <input
                                        type="text"
                                        value="`+jkos+`"
                                        class="form-control text-right jumlahkos mainperundingkajianjumlah subskopid_forsubcal_`+skopitem.sub_skop_project_code+` input-element jumlahkosfor`+item.skop_project_code+`" 
                                        id="jumlahkos`+skopitem.skop_project_code+`"
                                        onchange="checkjumlah(this.id);"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopid" data-skop="">
                                      <input
                                        type="text"
                                        value="`+qty+`"
                                        class="form-control text-right input-element"
                                        id="componentkauntiti"
                                        readonly
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                    <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="hiddensubskopid" data-skop="">
                                      <input
                                          type="text"
                                          value="`+units+`"
                                          class="form-control text-right"  
                                          id="componentunit"
                                          readonly
                                        />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+kos+`"
                                        class="form-control text-right input-element" 
                                        id="componentkos"
                                        readonly
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+(parseFloat(qty)*parseFloat(kos)).toFixed(2)+`"
                                        class="form-control text-right mainworksjumlah kajian_temp_jumlahkos  input-element tempjumlah" 
                                        id="componentjumlahkos"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input
                                          type="text"
                                          value="`+Catatan+`"
                                          class="form-control text-right" 
                                          id="componentcatatan"
                                        />
                                    </td> 

                                </tr>`;
                }
                else if(isPerundingTapak && tapakflag){
                  
                  tapakflag=false;
                  
                  component_tr = `<tr id="componentrow" class="d-row">
                                    <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                                    <td class="pl-3">
                                    <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                                      <div class="d-flex">
                                      <input
                                        type="text"
                                        value="`+subskopnama +`"
                                        class="form-control text-left" 
                                        id="namacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"      
                                        />
                                        <button type="button" disabled class="ml-auto add_subrow">
                                      <img
                                        src="{{ asset('assets/images/Add_box.png') }}"
                                        alt=""
                                      />
                                    </button>
                                      </div>  
                                          
                                    <td>
                                      <input
                                        type="text"
                                        value="`+jkos+`"
                                        class="form-control text-right jumlahkos mainperundingtapakjumlah subskopid_forsubcal_`+skopitem.sub_skop_project_code+` input-element jumlahkosfor`+item.skop_project_code+`" 
                                        id="jumlahkos`+skopitem.skop_project_code+`"
                                        onchange="checkjumlah(this.id);"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopid" data-skop="">
                                      <input
                                        type="text"
                                        value="`+qty+`"
                                        class="form-control text-right input-element"
                                        id="componentkauntiti"
                                        readonly
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                    <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="hiddensubskopid" data-skop="">
                                      <input
                                          type="text"
                                          value="`+units+`"
                                          class="form-control text-right"  
                                          id="componentunit"
                                          readonly
                                        />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+kos+`"
                                        class="form-control text-right input-element" 
                                        id="componentkos"
                                        readonly
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+(parseFloat(qty)*parseFloat(kos)).toFixed(2)+`"
                                        class="form-control text-right mainworksjumlah tapak_temp_jumlahkos input-element tempjumlah" 
                                        id="componentjumlahkos"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input
                                          type="text"
                                          value="`+Catatan+`"
                                          class="form-control text-right" 
                                          id="componentcatatan"
                                        />
                                    </td> 

                                </tr>`;
                }
                else if(isPrelimItem_Present && prelimflag){
                  var mainjkos = 0
                  prelimflag=false;
                  percentageprelim = skopitem.Kuantiti

                  if(isNaN(jkos)){
                    mainjkos = 0
                  }
                  else{
                    mainjkos = Math.ceil((jkos/1000)*1000)
                  }
                  
                  component_tr = `<tr id="prelimcomponentrow" class="d-row">
                                    <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                                    <td class="pl-3">
                                    <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                                      <div class="d-flex">
                                      <input
                                        type="text"
                                        value="`+subskopnama +`"
                                        class="form-control" 
                                        id="prelimnamacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"     
                                        />
                                        
                                      </div>  
                                          
                                    <td>
                                    <input type="hidden" value="`+skopitem.skop_project_code+`" id="prelimhiddenskopid" data-skop="">
                                    <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="prelimhiddensubskopid" data-skop="">
                                      <input
                                        type="text"
                                        value="`+mainjkos+`"
                                        class="form-control text-right prelimjumlahkos subskopid_forsubcal_`+skopitem.sub_skop_project_code+` mainprelimjumlah input-element jumlahkosfor`+item.skop_project_code+`" 
                                        id="prelimjumlahkos"
                                        onchange="checkjumlah(this.id);"
                                        readonly
                                      />
                                    </td>
                                    <td colspan="3">
                                      <div class="row">
                                        <div class="col text-center">
                                          5%<input class="ml-2" type="radio" name="prelimradio" id="prelimradio" value="5" onclick="calculateprelim(this.value,`+skopitem.sub_skop_project_code+`);">
                                        </div>
                                        <div class="col text-center">
                                          6%<input class="ml-2" type="radio" name="prelimradio" id="prelimradio" value="6" onclick="calculateprelim(this.value, `+skopitem.sub_skop_project_code+`);">
                                        </div>
                                        <div class="col text-center">
                                          7%<input class="ml-2" type="radio" name="prelimradio" id="prelimradio" value="7" onclick="calculateprelim(this.value, `+skopitem.sub_skop_project_code+`);">
                                        </div>
                                        <div class="col text-center">
                                          8%<input class="ml-2" type="radio" name="prelimradio" id="prelimradio" value="8" onclick="calculateprelim(this.value, `+skopitem.sub_skop_project_code+`);">
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+parseFloat(jkos).toFixed(2)+`"
                                        class="form-control text-right mainworksjumlah  input-element tempjumlah" 
                                        id="prelimcomponentjumlahkos"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input
                                          type="text"
                                          value="`+Catatan+`"
                                          class="form-control text-right" 
                                          id="prelimcomponentcatatan"
                                        />
                                    </td> 

                                </tr>`;
                }
                else{
                  component_tr = `<tr id="componentrow" class="d-row">
                  <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                                    <td class="pl-3">
                                    <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`" />
                                      <div class="d-flex">
                                      <input
                                        type="text"
                                        value="`+subskopnama +`"
                                        class="form-control text-left" 
                                        id="namacomponen"  
                                        readonly
                                        style="font-family: Poppins_Regular;"     
                                        />
                                        <button type="button" class="ml-auto add_subrow">
                                          <i class="ri-add-box-line ri-2x"></i>
                                    </button>
                                      </div>  
                                          
                                    <td>
                                      <input
                                        type="text"
                                        value="`+jkos+`"
                                        class="form-control text-right jumlahkos subskopid_forsubcal_`+skopitem.sub_skop_project_code+` input-element jumlahkosfor`+item.skop_project_code+`" 
                                        id="jumlahkos`+skopitem.skop_project_code+`"
                                        onchange="checkjumlah(this.id);"
                                        readonly
                                        
                                      />
                                    </td>
                                    <td>
                                      <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopid" data-skop="">
                                      <input
                                        type="text"
                                        value="`+qty+`"
                                        class="form-control text-right input-element"
                                        id="componentkauntiti"
                                        onload="nf()"
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                    <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="hiddensubskopid" data-skop="">
                                      <input
                                          type="text"
                                          value="`+units+`"
                                          class="form-control text-right"  
                                          id="componentunit"
                                        />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+kos+`"
                                        class="form-control text-right input-element" 
                                        id="componentkos"
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value="`+(parseFloat(qty)*parseFloat(kos)).toFixed(2)+`"
                                        class="form-control text-right  input-element tempjumlah" 
                                        id="componentjumlahkos"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input
                                          type="text"
                                          value="`+Catatan+`"
                                          class="form-control text-right" 
                                          id="componentcatatan"
                                        />
                                    </td> 

                                </tr>`;

                }

                // ----------------Prelim and Gen Item row----------------------------------------
                // if(isPrelimItem_Present && prelimflag){
                  
                //   prelimflag=false;
                  
                //   component_tr = `<tr id="componentrow" class="d-row">
                //                     <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                //                     <td class="pl-3">
                //                     <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`"/>
                //                       <div class="d-flex">
                //                       <input
                //                         type="text"
                //                         value="`+subskopnama +`"
                //                         class="form-control" 
                //                         id="namacomponen"      
                //                         />
                //                         <button type="button" class="ml-auto add_subrow">
                //                       <img
                //                         src="{{ asset('assets/images/Add_box.png') }}"
                //                         alt=""
                //                       />
                //                     </button>
                //                       </div>  
                                          
                //                     <td>
                //                       <input
                //                         type="text"
                //                         value="`+jkos+`"
                //                         class="form-control text-right jumlahkos mainperundingjumlah input-element jumlahkosfor`+item.skop_project_code+`" 
                //                         id="jumlahkos`+skopitem.skop_project_code+`"
                //                         onchange="checkjumlah(this.id);"
                //                         readonly
                //                       />
                //                     </td>
                //                     <td>
                //                       <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopid" data-skop="">
                //                       <input
                //                         type="text"
                //                         value="`+qty+`"
                //                         class="form-control text-right input-element"
                //                         id="componentkauntiti"
                                        
                //                         onchange="calculatekosunit(this)"
                //                       />
                //                     </td>
                //                     <td>
                //                     <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="hiddensubskopid" data-skop="">
                //                       <input
                //                           type="text"
                //                           value="`+units+`"
                //                           class="form-control text-right"  
                //                           id="componentunit"
                //                         />
                //                     </td>
                //                     <td>
                //                       <input
                //                         type="text"
                //                         value="`+kos+`"
                //                         class="form-control text-right input-element" 
                //                         id="componentkos"
                //                         onchange="calculatekosunit(this)"
                //                       />
                //                     </td>
                //                     <td>
                //                       <input
                //                         type="text"
                //                         value="`+(parseFloat(qty)*parseFloat(kos))+`"
                //                         class="form-control text-right mainworksjumlah  input-element tempjumlah" 
                //                         id="componentjumlahkos"
                //                         readonly
                //                       />
                //                     </td>
                //                     <td>
                //                       <input
                //                           type="text"
                //                           value="`+Catatan+`"
                //                           class="form-control text-right" 
                //                           id="componentcatatan"
                //                         />
                //                     </td> 

                //                 </tr>`;
                // }
                // else{
                //   component_tr = `<tr id="componentrow" class="d-row">
                //   <td><p id="rowno">`+mainrow+`.`+subrow+`</p></td>
                //                     <td class="pl-3">
                //                     <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`" />
                //                       <div class="d-flex">
                //                       <input
                //                         type="text"
                //                         value="`+subskopnama +`"
                //                         class="form-control" 
                //                         id="namacomponen"      
                //                         />
                //                         <button type="button" class="ml-auto add_subrow">
                //                       <img
                //                         src="{{ asset('assets/images/Add_box.png') }}"
                //                         alt=""
                //                       />
                //                     </button>
                //                       </div>  
                                          
                //                     <td>
                //                       <input
                //                         type="text"
                //                         value="`+jkos+`"
                //                         class="form-control text-right jumlahkos input-element jumlahkosfor`+item.skop_project_code+`" 
                //                         id="jumlahkos`+skopitem.skop_project_code+`"
                //                         onchange="checkjumlah(this.id);"
                //                         readonly
                                        
                //                       />
                //                     </td>
                //                     <td>
                //                       <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopid" data-skop="">
                //                       <input
                //                         type="text"
                //                         value="`+qty+`"
                //                         class="form-control text-right input-element"
                //                         id="componentkauntiti"
                //                         onload="nf()"
                //                         onchange="calculatekosunit(this)"
                //                       />
                //                     </td>
                //                     <td>
                //                     <input type="hidden" value="`+skopitem.sub_skop_project_code+`" id="hiddensubskopid" data-skop="">
                //                       <input
                //                           type="text"
                //                           value="`+units+`"
                //                           class="form-control text-right"  
                //                           id="componentunit"
                //                         />
                //                     </td>
                //                     <td>
                //                       <input
                //                         type="text"
                //                         value="`+kos+`"
                //                         class="form-control text-right input-element" 
                //                         id="componentkos"
                //                         onchange="calculatekosunit(this)"
                //                       />
                //                     </td>
                //                     <td>
                //                       <input
                //                         type="text"
                //                         value="`+(parseFloat(qty)*parseFloat(kos))+`"
                //                         class="form-control text-right  input-element tempjumlah" 
                //                         id="componentjumlahkos"
                //                         readonly
                //                       />
                //                     </td>
                //                     <td>
                //                       <input
                //                           type="text"
                //                           value="`+Catatan+`"
                //                           class="form-control text-right" 
                //                           id="componentcatatan"
                //                         />
                //                     </td> 

                //                 </tr>`;

                // }
                //---------------------------------------------------------
                      
                                $('#componentbody').append(component_tr);
                                nf();

                                subsubrow=0;

                                if(subskopsforkewangan.length > 0){
                                  subskopsforkewangan.forEach((subskopitem) => {
                                    if(subskopitem.skop_id == skopitem.skop_project_code  &&  subskopitem.sub_skop_id == skopitem.sub_skop_project_code){
                                        subsubrow+=1;
                                      //-------------------------------------
                                      var Catatan=""
                                      if(subskopitem.Catatan === null){
                                        Catatan=""
                                      }else{
                                        Catatan=subskopitem.Catatan
                                      }

                                      var units=""
                                      if(subskopitem.units === null){
                                        units=""
                                      }else{
                                        units=subskopitem.units
                                      }

                                      var qty =""
                                      if(subskopitem.Kuantiti === null){
                                        qty=""
                                      }else{
                                        qty=subskopitem.Kuantiti
                                      }
                                      var kos =""
                                      if(subskopitem.Kos === null || subskopitem.Kos == 0.00){
                                        kos=""
                                      }else{
                                        kos=subskopitem.Kos
                                      }

                                      var jkos =""
                                      if(subskopitem.jumlahkos === null || subskopitem.jumlahkos == 0.00){
                                        jkos=""
                                      }else{
                                        jkos=subskopitem.jumlahkos
                                      }
                                      //-------------------------------------

                                      let subcomponent = document.querySelector(".subskopid_forsubcal_"+subskopitem.sub_skop_id);
                                      let subcomponentrow = subcomponent.closest("tr");


                                      
                                      

                                      var qtytextbox = subcomponentrow.querySelector('[id="componentkauntiti"]');
                                      qtytextbox.readOnly = true;
                                      qtytextbox.value = "";
                                      qtytextbox.style = "background-color: #f4f4f4";
                                      
                                      var unittextbox = subcomponentrow.querySelector('[id="componentunit"]');
                                      unittextbox.readOnly = true;
                                      unittextbox.value = "";
                                      unittextbox.style = "background-color: #f4f4f4";                                      

                                      var kosperunittextbox = subcomponentrow.querySelector('[id="componentkos"]');
                                      kosperunittextbox.readOnly = true;
                                      kosperunittextbox.value = "";
                                      kosperunittextbox.style = "background-color: #f4f4f4";
                                      

                                      var kostextbox = subcomponentrow.querySelector('[id="componentjumlahkos"]');                 
                                      kostextbox.value = "";


                                      let component_tr = `<tr id="subcomponentrow" class="d-row">
                                      <td><p id="rowno">`+mainrow+`.`+subrow+`.`+subsubrow+`</p></td>
                                          <td class="pl-3">
                                          <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`" />
                                            <div class="d-flex">
                                            <input
                                              type="text"
                                              value="`+subskopitem.nama_componen+`"
                                              class="form-control text-left" 
                                              id="subnamacomponenu"      
                                              />
                                              <button type="button" class="ml-auto component_row_minus">
                                                <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                        </button>
                                              
                                            </div>  
                                                
                                          <td>
                                            <input
                                              type="text"
                                              value="`+jkos+`"
                                              class="form-control text-right subjumlahkos subjumlahkosfor`+subskopitem.sub_skop_id+` input-element" 
                                              id="jumlahkos`+subskopitem.sub_skop_id+`"
                                              onchange="checkjumlah(this.id);"
                                              readonly
                                            />
                                          </td>
                                          <td>
                                            <input type="hidden" value="`+skopitem.skop_project_code+`" id="hiddenskopidsub" data-skop="">
                                            <input
                                              type="text"
                                              value="`+qty+`"
                                              class="form-control text-right input-element"
                                              id="subcomponentkauntiti"
                                              onchange="calculatekosunit(this)"
                                            />
                                          </td>
                                          <td>
                                          <input type="hidden" value="`+subskopitem.sub_skop_id+`" id="hiddensubsubskopid" data-skop="">
                                            <input
                                                type="text"
                                                value="`+units+`"
                                                class="form-control text-right"  
                                                id="subcomponentunit"
                                              />
                                          </td>
                                          <td>
                                            <input
                                              type="text"
                                              value="`+kos+`"
                                              class="form-control text-right input-element" 
                                              id="subcomponentkos"
                                              onchange="calculatekosunit(this)"
                                            />
                                          </td>
                                          <td>
                                          <input
                                            type="text"
                                            value="`+subskopitem.jumlahkos+`"
                                            class="form-control text-right" 
                                            id="subcomponentjumlahkos"
                                            readonly
                                          />
                                        </td>
                                          <td>
                                            <input
                                                type="text"
                                                value="`+Catatan+`"
                                                class="form-control text-right" 
                                                id="subcomponentcatatan"
                                              />
                                          </td> 

                                      </tr>`;
                                      $('#componentbody').append(component_tr);
                                      nf();
                                    }    
                                  })
                                }
                                //checkjumlah("jumlahkos"+skopitem.skop_id)

                    }
                  })                 

                }
              });


              let component_tr = `<tr id="componentfooter" class=""  style="background-color: #39b0d2">
              <td></td>
                                <td class="text-right text-uppercase" style="color: #fff;">Jumlah</td>
  
                                <td>
                                  <input
                                    type="text"
                                    value="`+skopcost+`"
                                    class="form-control text-right input-element"
                                    id="finaltotaljumlahkos"
                                    readonly
                                  />
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                <input
                                  type="text"
                                  value=""
                                  class="form-control text-right input-element" 
                                  id="componentroughjumlahkos"
                                  readonly
                                />
                                </td>
                                <td></td>
                              </tr>`;
                              $('#componentbody').append(component_tr);    
                              nf();         

            }

            
            let Information_add = document.querySelector(".Information_add");

            

            if (Information_add) {
              $(".add_subrow").bind("click", function () {
                  var $this = $(this);
                  $parentTR = $this.closest("tr");
                  var lCompleteRow = $this.closest("tr");
                  var jumlahforid = lCompleteRow. find('td:eq(1) input[type="hidden"]'). val();
                  var subjumlahforid = lCompleteRow. find('td:eq(4) input[type="hidden"]'). val();
                  var subkomponent = lCompleteRow. find('td:eq(3) input[type="hidden"]'). val();
                  var subsubkomponent = lCompleteRow. find('td:eq(4) input[type="hidden"]'). val();

                  var qtytextbox = lCompleteRow.find('td:eq(3) input[id="componentkauntiti"]');
                  qtytextbox[0].readOnly = true;
                  qtytextbox[0].value = "";
                  qtytextbox[0].style = "background-color: #f4f4f4";
                  
                  

                  var unittextbox = lCompleteRow. find('td:eq(4) input[type="text"]');
                  unittextbox[0].readOnly = true;
                  unittextbox[0].value = "";
                  unittextbox[0].style = "background-color: #f4f4f4";

                  


                  var kosperunittextbox = lCompleteRow. find('td:eq(5) input[type="text"]');
                  kosperunittextbox[0].readOnly = true;
                  kosperunittextbox[0].value = "";
                  kosperunittextbox[0].style = "background-color: #f4f4f4";

                  var kostextbox = lCompleteRow. find('td:eq(6) input[type="text"]');                  
                  kostextbox[0].value = "";
                  
                  
                  
                  
                  forid+=1;

                  let component_tr = `<tr id="subcomponentrow" class="d-row">
                                    <td></td>
                                    <td class="pl-3">
                                    <input type="hidden" id="jumlahkos`+jumlahforid+`" value="`+jumlahforid+`" />
                                      <div class="d-flex">
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control text-left" 
                                        id="subnamacomponen"      
                                        />
                                        <button type="button" class="ml-auto component_row_minus">
                                          <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                        </button>
                                      </div>  
                                          
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control text-right subjumlahkos subjumlahkosfor`+subjumlahforid+` input-element" 
                                        id="jumlahkos`+forid+`"
                                        onchange="checkjumlah(this.id);"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input type = "hidden" id="hiddenskopidsub" value="`+subkomponent+`"/>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control text-right input-element"
                                        id="subcomponentkauntiti"
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                    <input type = "hidden" id="hiddensubsubskopid" value="`+subsubkomponent+`"/>
                                      <input
                                          type="text"
                                          value=""
                                          class="form-control text-right"  
                                          id="subcomponentunit"
                                        />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control text-right input-element" 
                                        id="subcomponentkos"
                                        onchange="calculatekosunit(this)"
                                      />
                                    </td>
                                    <td>
                                      <input
                                        type="text"
                                        value=""
                                        class="form-control text-right input-element" 
                                        id="subcomponentjumlahkos"
                                        readonly
                                      />
                                    </td>
                                    <td>
                                      <input
                                          type="text"
                                          value=""
                                          class="form-control text-right" 
                                          id="subcomponentcatatan"
                                        />
                                    </td> 

                                </tr>`;

                 

                // $(component_tr).insertAfter($parentTR);
                var lastSubcomponentRow = $parentTR.next("tr#subcomponentrow:last");
                console.log(lastSubcomponentRow)
                if (lastSubcomponentRow.length > 0) {
                  $(component_tr).insertAfter(lastSubcomponentRow);
                } else {
                  // If there are no existing subcomponent rows, insert after the parent row
                  $(component_tr).insertAfter($parentTR);
                }


                //var jumlahforid = jid. find('td:eq(1) input[type="hidden"]'). val();
                //var subjumlahforid = jid. find('td:eq(4) input[type="hidden"]'). val();
                calculatejumlah_afterminus(jumlahforid, subjumlahforid);
               

                let component_row_minus = document.querySelectorAll(".component_row_minus");
                component_row_minus.forEach((row_btn) => {
                  row_btn.addEventListener("click", () => {
                    var $this = $(this);
                    let jid = $this.closest("tr");
                    var jumlahforid = jid. find('td:eq(1) input[type="hidden"]'). val();
                    var subjumlahforid = jid. find('td:eq(4) input[type="hidden"]'). val();


                    row_btn.closest("tr").remove();
                    calculatejumlah_afterminus(jumlahforid, subjumlahforid);
                    getfinalcost();
                  });
                });
              });
              let component_row_minus = document.querySelectorAll(".component_row_minus");
              component_row_minus.forEach((row_btn) => {
                row_btn.addEventListener("click", () => {
                  var $this = $(this);
                  let jid = row_btn.closest("tr");

                  var subjumlahforid = jid.querySelector('[id="hiddensubsubskopid"]').value;
                  var jumlahforid = jid.querySelector('[type="hidden"]').value;

                  row_btn.closest("tr").remove();
                  calculatejumlah_afterminus(jumlahforid, subjumlahforid);
                  getfinalcost();
                });
              });
            
            }
            //OnLoadCalculateFirsTable();

            let perundingdetailrow =""
            $('#perundingbody').empty();

            
            if(isTerperinciPresent && isPerundingPresent){
              //console.log("Not Present")
              document.getElementById("financesectiontable").style = "display: inline-table;";
            }

      // ****************Table yuran perunding kajian*****************************************************************************************************************************
            if(isPerundingPresent && isPerundingKajian){
              document.getElementById("yuranperundingtablediv").style = "display: block;";
              var i=0;
              perundingdetailrow = `<tr>
                                <td>YURAN PERUNDING (A)</td>
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    readonly
                                    id="yuranperunding_jumlahkos"
                                  />
                                </td>
                                <td colspan="5"></td>
                                
                                
                                
                              </tr>`;
                $('#perundingbody').append(perundingdetailrow);
                for(i=1; i>=0; i--){
                  if(i==1){               
                
                  perundingdetailrow = `<tr>
                                            <td>
                                            <div class="d-flex">
                                                <p>Profesional</p>
                                                <button type="button" class="ml-auto add-tr-btn-second_copy">
                                                  <i class="ri-add-box-line ri-2x"></i>
                                                </button>
                                              </div>
                                            </td>
                                            <td>
                                              <input
                                                type="text"
                                                value=""
                                                id="perundingjumlahkos`+i+`"
                                                class="form-control text-right input-element"
                                                readonly
                                              />
                                            </td>
                                            <td colspan="5">
                                              <input type="hidden" value="1" id="hiddenperundingmainid"/>
                                            </td>
                                            
                                            
                                          </tr>`;
                  
                }else{
                  //console.log("hi")
                  perundingdetailrow =`<tr>
                                <td>
                                  <div class="d-flex">
                                    <p>Sub-Profesional</p>
                                    <button type="button" class="ml-auto add-tr-btn-second_copy">
                                      <i class="ri-add-box-line ri-2x"></i>
                                    </button>
                                  </div>
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    id="perundingjumlahkos`+i+`"
                                    value=""
                                    class="form-control text-right input-element"
                                    readonly
                                  />
                                </td>
                                <td colspan="5">
                                <input type="hidden" value="0" id="hiddenperundingmainid"/>
                                </td>
                                
                                
                                
                              </tr>`;

                }
                $('#perundingbody').append(perundingdetailrow);
                let subperundingdetails=""
                if(perundingdetails.length > 0) {
                  perundingdetails.forEach((perundingitem) => {
                    
                    if(i == perundingitem.is_Profesional){
                      subperundingdetails = `<tr id="perundingrow">
                                        <td>
                                          <div class="d-flex">
                                            <label for="" class="col-4 align-self-center">
                                              Jawatan
                                            </label>
                                            
                                            <input type="text"class="form-control text-left col" id="txtjawatan" value="`+perundingitem.jawatan+`" />
                                            <button type="button" class="ml-auto sub-tr-btn-second_minus kajian_minus">
                                              <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                            </button>
                                          </div>
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.jumlahkos+`"
                                            class="form-control bg-light text-right perundingjumlahkos input-element"
                                            id="perundingjumlahkos`+perundingitem.is_Profesional+`"
                                            onchange="checkperundingjumlah(this.id,this);"
                                            readonly
                                            
                                            
                                          />
                                        </td>
                                        <td>
                                        <input type="hidden" id="hiddenperundingid" value="`+perundingitem.is_Profesional+`" />
                                          <input
                                            type="text"
                                            value="`+perundingitem.man_month+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmanmonth"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                          
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.multiplier+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmultiplier"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.salary+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtsalary"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.amount+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtamount"
                                            readonly
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.Catatan+`"
                                            class="form-control bg-light"
                                            id="txtperundingcatatan"
                                          />
                                        </td>

                                        </tr>`;
                          $('#perundingbody').append(subperundingdetails);
                          //checkperundingjumlah("perundingjumlahkos"+perundingitem.is_Profesional)

                    }                    
                })               
             }   
          }  
          perundingdetailrow = `<tr>
                                <td>
                                  IMBUHAN BALIK (B)
                                   
                                  
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="imbuhanbalik" 
                                    onchange="copyimbuhan();"
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody').append(perundingdetailrow);
                
                perundingdetailrow = `<tr>
                                <td>
                                  KOS PERUNDING (C)
                                   
                                  
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="kosperunding_kajian" 
                                    onchange="copyimbuhan();"
                                    readonly
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody').append(perundingdetailrow);

                perundingdetailrow = `<tr>
                                <td>
                                CUKAI JUALAN DAN PERKHIDMATAN (SST) (D = 6% * C) 
                               
                                  
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="perundingssttax" 
                                    readonly
                                    
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody').append(perundingdetailrow);

                perundingdetailrow = `<tr>
                                <td>
                                JUMLAH KESELURUHAN ANGGARAN KOS PERUNDING (RM) (C+ D)
                                  
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="ANGGARANKOS" 
                                    readonly
                                    
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody').append(perundingdetailrow);

                
                              nf();
                              //checkperundingjumlah("perundingjumlahkos1")
          
          //************************************ */
          $(".add-tr-btn-second_copy").bind("click", function () {
                  var $this = $(this),
                    $parentTR = $this.closest("tr");
                    var lCompleteRow = $this.closest("tr");

                    var data1 = lCompleteRow. find('td:eq(2) input[type="hidden"]'). val();
                    let subperundingdetails = `<tr id="perundingrow">
                                        <td>
                                          <div class="d-flex">
                                            <label for="" class="col-4 align-self-center">
                                              Jawatan
                                            </label>
                                            
                                            <input type="text"class="form-control text-left col" id="txtjawatan" value="" />
                                            <button type="button" class="ml-auto sub-tr-btn-second_minus">
                                              <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                            </button>
                                          </div>
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right perundingjumlahkos input-element"
                                            id="perundingjumlahkos`+data1+`"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                        <input type="hidden" id="hiddenperundingid" value="`+data1+`" />
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtmanmonth"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                          
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtmultiplier"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtsalary"
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtamount"
                                            readonly
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light"
                                            id="txtperundingcatatan"
                                          />
                                        </td>

                                        </tr>`;
                  $(subperundingdetails).insertAfter($parentTR);
                  nf();
                  let subTrSecond = document.querySelectorAll(".sub-tr-btn-second_minus");
                  subTrSecond.forEach((row_btn) => {
                    row_btn.addEventListener("click", () => {
                      row_btn.closest("tr").remove();
                      recalculateperundingjumlah_kajian(); 
                    });
                  });
                });
                let subTrSecond = document.querySelectorAll(".sub-tr-btn-second_minus");
                subTrSecond.forEach((row_btn) => {
                  row_btn.addEventListener("click", () => {
                    row_btn.closest("tr").remove();
                    recalculateperundingjumlah_kajian(); 
                  });
                });
              //************************************ */
              
              //checkperundingjumlah("perundingjumlahkos1")
              nf();
            }
            else{
              
              document.getElementById("yuranperundingtablediv").style = "display: none";
              //document.getElementById("financesectiontable").style = "display: none";
            }
            // //console.log("Not Present"+isTerperinciPresent)
            // //console.log("Not Present")
            
            
 // *****************Table yuran perunding kajian ends*****************************************************************************************************************************

 // *****************Table yuran perunding tapak****************************************************************************************************************************

 if(isPerundingPresent && isPerundingTapak){
  document.getElementById("yuranperunding_tapaktablediv").style = "display: block;";
  $('#perundingbody_tapak').empty();
              var tapaki=0;
              perundingdetailrowtapak = `<tr>
                                <td>YURAN PERUNDING (A)</td>
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    readonly
                                    id="yuranperunding_tapak_jumlahkos"
                                  />
                                </td>
                                <td colspan="5"></td>
                                
                                
                                
                              </tr>`;
                $('#perundingbody_tapak').append(perundingdetailrowtapak);
                for(tapaki=1; tapaki>=0; tapaki--){
                  if(tapaki==1){               
                    //console.log("hello")
                    perundingdetailrowtapak = `<tr>
                                            <td>
                                            <div class="d-flex">
                                                <p>Profesional</p>
                                                <button type="button" class="ml-auto add-tr-btn-second">
                                                  <i class="ri-add-box-line ri-2x"></i>
                                                </button>
                                              </div>
                                            </td>
                                            <td>
                                              <input
                                                type="text"
                                                value=""
                                                id="perundingjumlahkostapak`+tapaki+`"
                                                class="form-control text-right input-element"
                                                readonly
                                              />
                                            </td>
                                            <td colspan="5">
                                              <input type="hidden" value="1" id="hiddenperundingtapakmainid"/>
                                            </td>
                                            
                                            
                                          </tr>`;
                  
                }else{
                  //console.log("hi")
                  perundingdetailrowtapak =`<tr>
                                <td>
                                  <div class="d-flex">
                                    <p>Sub-Profesional</p>
                                    <button type="button" class="ml-auto add-tr-btn-second">
                                      <i class="ri-add-box-line ri-2x"></i>
                                    </button>
                                  </div>
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    id="perundingjumlahkostapak`+tapaki+`"
                                    value=""
                                    class="form-control text-right input-element"
                                    readonly
                                  />
                                </td>
                                <td colspan="5">
                                <input type="hidden" value="0" id="hiddenperundingtapakmainid"/>
                                </td>
                                
                                
                                
                              </tr>`;

                }
                $('#perundingbody_tapak').append(perundingdetailrowtapak);
                let subperundingdetails=""
                if(perundingdetailstapak.length > 0) {
                  perundingdetailstapak.forEach((perundingitem) => {
                    
                    if(tapaki == perundingitem.is_Profesional){
                      subperundingdetailstapak = `<tr id="perundingrowtapak">
                                        <td>
                                          <div class="d-flex">
                                            <label for="" class="col-4 align-self-center">
                                              Jawatan
                                            </label>
                                            
                                            <input type="text"class="form-control text-left col" id="txtjawatantapak" value="`+perundingitem.jawatan+`" />
                                            <button type="button" class="ml-auto sub-tr-btn-second">
                                              <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                            </button>
                                          </div>
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.jumlahkos+`"
                                            class="form-control bg-light text-right perundingjumlahkostapak input-element"
                                            id="perundingjumlahkostapak`+perundingitem.is_Profesional+`"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                            readonly
                                            
                                            
                                          />
                                        </td>
                                        <td>
                                        <input type="hidden" id="hiddenperundingtapakid" value="`+perundingitem.is_Profesional+`" />
                                          <input
                                            type="text"
                                            value="`+perundingitem.man_month+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmanmonthtapak"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                          
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.multiplier+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmultipliertapak"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.salary+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtsalarytapak"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.amount+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtamounttapak"
                                            readonly
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.Catatan+`"
                                            class="form-control bg-light"
                                            id="txtperundingcatatantapak"
                                          />
                                        </td>

                                        </tr>`;
                          $('#perundingbody_tapak').append(subperundingdetailstapak);
                          //checkperundingjumlah("perundingjumlahkos"+perundingitem.is_Profesional)

                    }                    
                })               
             }   
          }  
          perundingdetailrowtapak = `<tr>
                                <td>
                                  IMBUHAN BALIK (B)
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="imbuhanbaliktapak" 
                                    onchange="copyimbuhantapak();"
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody_tapak').append(perundingdetailrowtapak);

                perundingdetailrowtapak = `<tr>
                                <td>
                                  KOS PERUNDING (C)
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="kosperunding_tapak" 
                                    onchange="copyimbuhantapak();"
                                    readonly
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody_tapak').append(perundingdetailrowtapak);

                perundingdetailrowtapak = `<tr>
                                <td>
                                CUKAI JUALAN DAN PERKHIDMATAN (SST) (D = 6% * C)
                                
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="perundingssttaxtapak" 
                                    readonly
                                    
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody_tapak').append(perundingdetailrowtapak);

                perundingdetailrowtapak = `<tr>
                                <td>
                                JUMLAH KESELURUHAN ANGGARAN KOS PERUNDING (RM) (C + D)                                   
                                </td>
  
                                <td>
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element"
                                    id="ANGGARANKOStapak" 
                                    readonly
                                    
                                  />
                                </td>
                                <td colspan="5">
                                  <input
                                    type="text"
                                    value=""
                                    class="form-control bg-light text-right input-element invisible"
                                  />
                                </td>
                                
                              </tr>`;
                $('#perundingbody_tapak').append(perundingdetailrowtapak);

                
                              nf();
                              
          
          //************************************ */
          $(".add-tr-btn-second").bind("click", function () {
                  var $this = $(this),
                    $parentTR = $this.closest("tr");
                    var lCompleteRow = $this.closest("tr");

                    var data1 = lCompleteRow. find('td:eq(2) input[type="hidden"]'). val();
                    let subperundingdetailstapak = `<tr id="perundingrowtapak">
                                        <td >
                                          <div class="d-flex">
                                            <label for="" class="col-4 p-0 text-left">
                                              Jawatan
                                            </label>
                                            
                                            <input type="text"class="form-control text-left col" id="txtjawatantapak" value="" />
                                            <button type="button" class="ml-auto sub-tr-btn-second">
                                              <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                                            </button>
                                          </div>
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right perundingjumlahkostapak input-element"
                                            id="perundingjumlahkostapak`+data1+`"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                        <input type="hidden" id="hiddenperundingtapakid" value="`+data1+`" />
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtmanmonthtapak"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                          
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtmultipliertapak"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtsalarytapak"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light text-right input-element"
                                            id="txtamounttapak"
                                            readonly
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value=""
                                            class="form-control bg-light"
                                            id="txtperundingcatatantapak"
                                          />
                                        </td>

                                        </tr>`;
                  $(subperundingdetailstapak).insertAfter($parentTR);
                  nf();
                  let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
                  subTrSecond.forEach((row_btn) => {
                    row_btn.addEventListener("click", () => {
                      row_btn.closest("tr").remove(); 
                      recalculateperundingjumlah_tapak()
                    });
                  });
                });
                let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
                subTrSecond.forEach((row_btn) => {
                  row_btn.addEventListener("click", () => {
                    row_btn.closest("tr").remove();
                    recalculateperundingjumlah_tapak()
                  });
                });
              //************************************ */
              
              //checkperundingjumlah("perundingjumlahkos1")
              nf();
            }
            else{
              
              document.getElementById("yuranperunding_tapaktablediv").style = "display: none";
              //document.getElementById("financesectiontable").style = "display: none";
            }
            // //console.log("Not Present"+isTerperinciPresent)
            // //console.log("Not Present")
            
            

 //**************************************************************************



 //**************************************************************************

 axios({
                method: 'get',
                url: api_url+"api/project/getrollingplan-details/"+$('#project_id').val(),
                responseType: 'json'        
        })
        .then(function (responsedata) { 
          if(responsedata){
            let text = responsedata.data.data.rolling_plan.name;
            let result = text.substring(text.indexOf("(")+1, text.length-1);
            document.getElementById("silingrollingpplan").innerHTML="Siling Dimohon "+ result + " (RM)";
            document.getElementById("silingbayanganrollingpplan").innerHTML="Siling Bayangan "+result + " (RM)" ;

             
          }         

          ////console.log("Rolling plan "+ responsedata.data.data);
        })
  axios({
                method: 'get',
                url: api_url+"api/project/getkewanganprojek-details/"+$('#project_id').val(),
                responseType: 'json'        
        })
        .then(function (responsedata) { 
          if(responsedata){
            //if(responsedata.data.length>0){

            if(responsedata.data.data){
              if(responsedata.data.data.Komponen_id == null){
                document.getElementById('cmbkomponen').value = 0;
              }
              else{
                document.getElementById('cmbkomponen').value=responsedata.data.data.Komponen_id;
              }
              document.getElementById('txtsilingdimohon').value=responsedata.data.data.Siling_Dimohon;
            document.getElementById('txtsilingbayangan').value=responsedata.data.data.Siling_Bayangan;
            document.getElementById('totalkoscomponen').value=responsedata.data.data.totalkos;
            
            //document.getElementById('componentfinaltax').value=responsedata.data.data.sst_tax;
            //document.getElementById('componentroughtax').value=responsedata.data.data.temp_sst_tax;
            
            //document.getElementById('componentfinaltaxcopy').value=responsedata.data.data.sst_tax;
            document.getElementById('componentroughjumlahkos').value=responsedata.data.data.temp_jumlahkos;
            document.getElementById('finaltotaljumlahkos').value=responsedata.data.data.jumlahkos;

            var table_row_count = document.getElementById("projek_table_kewagan").rows.length;
            var row_count= table_row_count-1; console.log(row_count);
            document.getElementById('total_'+row_count).value = responsedata.data.data.jumlahkos;
            document.getElementById('jumlah_total_latest').value = responsedata.data.data.jumlahkos;

            if(isPerundingPresent && isTerperinciPresent){

            //document.getElementById('imbuhanbalik').value=responsedata.data.data.imbuhan_balik;
            document.getElementById('imbuhanbalikcopy').value=responsedata.data.data.imbuhan_balik;


            document.getElementById('ftotalcost').value = perundingcost;//responsedata.data.data.anggaran_mainworks;       

            document.getElementById('lblpmax').value = responsedata.data.data.P_max;
            document.getElementById('lblpmin').value= responsedata.data.data.P_min;
            document.getElementById('lblpavg').value= responsedata.data.data.P_avg;
            
            if(responsedata.data.data.P_selection == 1){
              document.getElementById('pmax').checked = true;
            }
            else if(responsedata.data.data.P_selection == 2){
              document.getElementById('pmin').checked = true;
            }
            else if(responsedata.data.data.P_selection == 3){
              document.getElementById('pavg').checked = true;
            }


            
            document.getElementById('pmax').value = responsedata.data.data.P_max;
            document.getElementById('pmin').value= responsedata.data.data.P_min;
            document.getElementById('pavg').value= responsedata.data.data.P_avg;
            
            document.getElementById('imbuhanbalikcopy').value = responsedata.data.data.imbuhanbalik_piawai;

            document.getElementById('totalkosperunding').value = responsedata.data.data.totalkos_perunding;

            document.getElementById('componentfinaltaxcopy').value= responsedata.data.data.cukai_sst;
            document.getElementById('componentanggarankos').value= responsedata.data.data.anggarankos_piawai;
            document.querySelector('.terperinchi_temp_jumlahkos').value= responsedata.data.data.anggarankos_piawai;

            document.getElementById('ftotalcostpercent').value= responsedata.data.data.design_fee;

            }
            
            if(isPerundingPresent && isPerundingKajian){
            
            document.getElementById('yuranperunding_jumlahkos').value= responsedata.data.data.yuran_perunding_kos;
            document.getElementById('imbuhanbalik').value = responsedata.data.data.yuran_imbuhanbalik;
            document.getElementById('kosperunding_kajian').value = parseFloat(responsedata.data.data.yuran_imbuhanbalik) + parseFloat(responsedata.data.data.yuran_perunding_kos);
            document.getElementById("perundingssttax").value= responsedata.data.data.yuran_ssttax;
            document.getElementById('ANGGARANKOS').value= responsedata.data.data.yuran_anggaran;
            document.querySelector('.kajian_temp_jumlahkos').value= responsedata.data.data.yuran_anggaran;
            let yuranprofessional = document.querySelectorAll("[id^='perundingjumlahkos1']");
            let yuransubprofessional = document.querySelectorAll("[id^='perundingjumlahkos0']");
            if(yuranprofessional){
              yuranprofessional[0].value = responsedata.data.data.yuran_professional
            }

            if(yuransubprofessional){
              yuransubprofessional[0].value = responsedata.data.data.yuran_subprofessional
            }           
          }
          
          if(isPerundingPresent && isPerundingTapak){
            
            document.getElementById('yuranperunding_tapak_jumlahkos').value= responsedata.data.data.yuran_perunding_kos_tapak;
            document.getElementById('imbuhanbaliktapak').value = responsedata.data.data.yuran_imbuhanbalik_tapak;
            document.getElementById('kosperunding_tapak').value = parseFloat(responsedata.data.data.yuran_imbuhanbalik_tapak) + parseFloat(responsedata.data.data.yuran_perunding_kos_tapak);
            document.getElementById("perundingssttaxtapak").value= responsedata.data.data.yuran_ssttax_tapak;
            document.getElementById('ANGGARANKOStapak').value= responsedata.data.data.yuran_anggaran_tapak;
            document.querySelector('.tapak_temp_jumlahkos').value= responsedata.data.data.yuran_anggaran_tapak;  
            let yuranprofessionaltapak = document.querySelectorAll("[id='perundingjumlahkostapak1']");
            let yuransubprofessionaltapak = document.querySelectorAll("[id='perundingjumlahkostapak0']");
            if(yuranprofessionaltapak){
              yuranprofessionaltapak[0].value = responsedata.data.data.yuran_professional_tapak
            }

            if(yuransubprofessionaltapak){
              yuransubprofessionaltapak[0].value = responsedata.data.data.yuran_subprofessional_tapak
            }           
          } 
            }else {
              
            }
            
        }
      //}
          nf();

        })

        if(isPrelimItem_Present){
          let prelimradio = document.querySelectorAll("[id='prelimradio']");

          if(prelimradio.length>0){
            for(var i=0;i<prelimradio.length;i++){
              if(prelimradio[i].value == percentageprelim){
                prelimradio[i].checked = true;
              }
            }
          }


        }

});



});


function calculateNegeriKosJumlah(){
    let kos_jumlahs = document.querySelectorAll("[id^='kos_projeck']");  console.log(kos_jumlahs);
    let jumlah = 0;

    for(let i=0; i<kos_jumlahs.length; i++)
    { 
      if(removecomma(kos_jumlahs[i].value) > 0){
        jumlah=jumlah+parseFloat(removecomma(kos_jumlahs[i].value));
      }
      else
      {
        jumlah=jumlah;
      } 

    }
    document.getElementById('kos_jumlah').value=number_format(jumlah);
}

function calculateNegeriJumlah(row){ console.log(row);
    var id= "siling_"+row;
    var jum_id= "#jumlah_siling_"+row; console.log(jum_id);
    let silling_jumlahs = document.querySelectorAll("#"+id);  console.log(silling_jumlahs);
    let jumlah_sil = 0;

    for(let i=0; i<silling_jumlahs.length; i++)
    { 
        if(removecomma(silling_jumlahs[i].value) > 0){
          jumlah_sil=jumlah_sil+parseFloat(removecomma(silling_jumlahs[i].value));
        }
        else
        {
          jumlah_sil=jumlah_sil;
        } 
        //silling_jumlahs[i].value = number_format(silling_jumlahs[i].value);
    } 
    document.querySelectorAll(jum_id)[0].value=number_format(jumlah_sil);
}

function calculateNegeriJumlahTotal(){
    //let siling_data = document.querySelectorAll("[id^='siling_']");  console.log(siling_data);
    let jumlah = 0;

    for(let i=0; i<10; i++)
    { 
      var jum_id= "#jumlah_siling_"+i; console.log(jum_id);
      var column1Sum = sumColumnValues(i); console.log(column1Sum);
      document.querySelectorAll(jum_id)[0].value=number_format(column1Sum);
    }
}

function sumColumnValues(columnClass) {
  var id= "siling_"+columnClass;
  const cells = document.querySelectorAll("#"+id);  console.log(cells);
  let sum = 0;

  cells.forEach(function (cell) {
    const cellValue = removecomma(cell.value);
    if (!isNaN(cellValue)) {
      sum += cellValue;
    }
  });

  return sum;
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







  //-----to copy imbuhan-------

    function copyimbuhan()
    {
      var imbuhan_balik = document.getElementById("imbuhanbalik").value;
      imbuhan_balik = removecomma(imbuhan_balik);

      //console.log("balik"+imbuhan_balik)
      var yuranperunding = document.getElementById("yuranperunding_jumlahkos").value ;
      yuranperunding = removecomma(yuranperunding);

      //console.log("yuranperunding"+yuranperunding)

      document.getElementById("kosperunding_kajian").value =  (imbuhan_balik + yuranperunding).toFixed(2);

      var ssttax = ((imbuhan_balik + yuranperunding) * 6/100).toFixed(2)
      //console.log("ssttax"+ssttax)
      
      document.getElementById("perundingssttax").value =  ssttax;
      var totalanggaran = parseFloat(imbuhan_balik + yuranperunding + ssttax);
      document.getElementById("ANGGARANKOS").value = (totalanggaran).toFixed(2);

      let perundingkajianjumlah = document.querySelector(".mainperundingkajianjumlah");
      let perundingkajiantempjumlah = document.querySelector(".kajian_temp_jumlahkos");

      var listItemId = $(perundingkajianjumlah).closest('tr');

      var jumlahfor = listItemId. find('td:eq(1) input[type="hidden"]'). val();



      if(perundingkajianjumlah){

        perundingkajiantempjumlah.value = (totalanggaran).toFixed(2);
        perundingkajianjumlah.value = (Math.ceil((totalanggaran)*1000)/1000).toFixed(2);
        //perundingkajianjumlah.value = imbuhan_balik + yuranperunding + ssttax;
      }

      // let alljumlahkos = document.querySelectorAll(".jumlahkosfor"+jumlahfor);

      


       let alltablejumlahkos = document.querySelectorAll(".m"+jumlahfor);
      // sumofmainjumlah = 0;
      // if(alljumlahkos){
      //   for(i=1;i<alljumlahkos.length;i++){
          
      //     sum = alljumlahkos[i].value
          
      //     sum=removecomma(sum)
      //     if(isNaN(sum)){
      //       sum = 0;
      //       sum=parseFloat(sum);
      //     }
          
      //     sumofmainjumlah += sum;
      //   }
      //   if(alljumlahkos.length>0){
      //     alljumlahkos[0].value = Math.ceil(sumofmainjumlah/1000)*1000;
      //   }
      // }


      calculatejumlah_afterperunding();


      if(alltablejumlahkos){
        for(i=0;i<alltablejumlahkos.length;i++){
          
          alltablejumlahkos[i].value = Math.ceil(sumofmainjumlah/1000)*1000;

        }
        calculateSum(1,2);       

      }
      

      //document.getElementById("imbuhanbalikcopy").value = imbuhan_balik;


      nf();
    }

    

    function copyimbuhantapak()
    {
      var imbuhan_balik = document.getElementById("imbuhanbaliktapak").value;
      imbuhan_balik = removecomma(imbuhan_balik);

      //console.log("balik"+imbuhan_balik)
      var yuranperunding = document.getElementById("yuranperunding_tapak_jumlahkos").value ;
      yuranperunding = removecomma(yuranperunding);

      //console.log("yuranperunding"+yuranperunding)

      document.getElementById("kosperunding_tapak").value =  (imbuhan_balik + yuranperunding).toFixed(2);
      
      var ssttax = (imbuhan_balik + yuranperunding) * 6/100
      //console.log("ssttax"+ssttax)
      
      document.getElementById("perundingssttaxtapak").value =  ssttax.toFixed(2);
      document.getElementById("ANGGARANKOStapak").value = (imbuhan_balik + yuranperunding + ssttax).toFixed(2);

      
      let perundingtapaktempjumlah = document.querySelector(".tapak_temp_jumlahkos");
      
      let perundingtapakjumlah = document.querySelector(".mainperundingtapakjumlah");

      var listItemId = $(perundingtapakjumlah).closest('tr');

      


      if(perundingtapakjumlah){
        perundingtapaktempjumlah.value = (imbuhan_balik + yuranperunding + ssttax).toFixed(2);
        perundingtapakjumlah.value = (Math.ceil((imbuhan_balik + yuranperunding + ssttax)*1000)/1000).toFixed(2);
      }
      
      // let alljumlahkos = document.querySelectorAll(".jumlahkosfor"+jumlahfor);

       var jumlahfor = listItemId. find('td:eq(1) input[type="hidden"]'). val();

       let alltablejumlahkos = document.querySelectorAll(".m"+jumlahfor);
      // sumofmainjumlah = 0;
      // if(alljumlahkos){
      //   for(i=1;i<alljumlahkos.length;i++){
          
      //     sum = alljumlahkos[i].value
          
      //     sum=removecomma(sum)
      //     if(isNaN(sum)){
      //       sum = 0;
      //       sum=parseFloat(sum);
      //     }
          
      //     sumofmainjumlah += sum;
      //   }
      //   if(alljumlahkos.length>0){
      //     alljumlahkos[0].value = Math.ceil(sumofmainjumlah/1000)*1000;
      //   }
      // }
      
      calculatejumlah_afterperunding();
      if(alltablejumlahkos){
        for(i=1;i<alltablejumlahkos.length;i++){
          
          alltablejumlahkos[i].value = Math.ceil(sumofmainjumlah/1000)*1000;

        }
        calculateSum(1,2);       

      }
      

      //document.getElementById("imbuhanbalikcopy").value = imbuhan_balik;


      nf();
    }

    function calculatejumlah_afterminus(jumlahforid, subjumlahforid){




// ----------------sub sub component total-------------------------------------------------------
let allsubjumlahkos = document.querySelectorAll(".subjumlahkosfor"+subjumlahforid);
  let allsubsubjumlahkos = document.querySelectorAll(".jumlahkosfor"+subjumlahforid);
  

  let mainsubsubjumlahkos = document.querySelectorAll(".subskopid_forsubcal_"+subjumlahforid);

  sumofsubmainjumlah = 0;

  
  if(allsubjumlahkos.length>0){
    for(i=0;i<allsubjumlahkos.length;i++){
      
      sum = allsubjumlahkos[i].value
      
      sum=removecomma(sum)
      if(isNaN(sum)){
        sum = 0;
        sum=parseFloat(sum);
      }
      sumofsubmainjumlah += sum;
    }
    if(allsubjumlahkos.length>0){
      //allsubsubjumlahkos[1].value = Math.round(sumofsubmainjumlah/1000)*1000;
      mainsubsubjumlahkos[0].value=(Math.ceil(sumofsubmainjumlah/1000)*1000).toFixed(2);
    }
  }
  else{
    mainsubsubjumlahkos[0].value=0.00;
    let lCompleteRow = mainsubsubjumlahkos[0].closest("tr");

    //var qtytextbox = lCompleteRow.find('td:eq(3) input[id="text"]');
    var qtytextbox = lCompleteRow.querySelector('[id="componentkauntiti"]');
    qtytextbox.readOnly = false;
    qtytextbox.value = "";
    qtytextbox.style = "background-color: white";    
    

    var unittextbox = lCompleteRow.querySelector('[id="componentunit"]');
    unittextbox.readOnly = false;
    unittextbox.value = "";
    unittextbox.style = "background-color: white";    


    var kosperunittextbox = lCompleteRow.querySelector('[id="componentkos"]');
    kosperunittextbox.readOnly = false;
    kosperunittextbox.value = "";
    kosperunittextbox.style = "background-color: white";


  }
// ------------------------------------------------------------------------------------------------



let alljumlahkos = document.querySelectorAll(".jumlahkosfor"+jumlahforid);
sumofmainjumlah = 0;
if(alljumlahkos){
  for(i=1;i<alljumlahkos.length;i++){
    
    sum = alljumlahkos[i].value
    
    sum=removecomma(sum)
    if(isNaN(sum)){
      sum = 0;
      sum=parseFloat(sum);
    }
    
    sumofmainjumlah += sum;
  }
  if(alljumlahkos.length>0){
    alljumlahkos[0].value = (Math.ceil(sumofmainjumlah/1000)*1000).toFixed(2);
  }
}


let allmainjumlahkos = document.querySelectorAll(".mainskopjumlahkos");
sumofmainskopjumlah = 0;
sum=0;
if(allmainjumlahkos){
  for(i=0;i<allmainjumlahkos.length;i++){
    
    sum = allmainjumlahkos[i].value
    
    sum=removecomma(sum)
    if(isNaN(sum)){
      sum = 0;
      sum=parseFloat(sum);
    }
    
    sumofmainskopjumlah += sum;
  }

  finaltotaltext = document.getElementById("finaltotaljumlahkos");
  totalkoscomponen = document.getElementById("totalkoscomponen");
  if(finaltotaltext){
    finaltotaltext.value = (Math.ceil(sumofmainskopjumlah/1000)*1000).toFixed(2);
    totalkoscomponen.value = finaltotaltext.value;

  }
}


let allmaintempjumlahkos = document.querySelectorAll(".tempjumlah");
sumofmainskoptempjumlah = 0;
sum=0;
if(allmaintempjumlahkos){
  for(i=0;i<allmaintempjumlahkos.length;i++){
    
    sum = allmaintempjumlahkos[i].value
    
    sum=removecomma(sum)
    if(isNaN(sum)){
      sum = 0;
      sum=parseFloat(sum);
    }
    
    sumofmainskoptempjumlah += sum;
  }

  finaltotaltemptext = document.getElementById("componentroughjumlahkos");
  if(finaltotaltemptext){
    finaltotaltemptext.value = sumofmainskoptempjumlah.toFixed(2);
  }
}

let alltablejumlahkos = document.querySelectorAll(".m"+jumlahforid);
if(alltablejumlahkos){
  for(i=1;i<alltablejumlahkos.length;i++){
    
    alltablejumlahkos[i].value = (Math.ceil(sumofmainjumlah/1000)*1000).toFixed(2);

  }
  calculateSum(1,2);
}

perundingvalue = document.querySelector(".splmainworksjumlah");
if(perundingvalue){
  anggrancost = document.getElementById("ftotalcost");
  if(anggrancost){
    anggrancost.value = parseFloat(removecomma(perundingvalue.value)).toFixed(2);
  }
  

}

if(isPrelimItem_Present){
  let prelimradio = document.querySelectorAll("[id='prelimradio']");
var qtyval = 0;
if(prelimradio.length>0){
  for(j=0;j<prelimradio.length;j++){
    if(prelimradio[j].checked){
      qtyval = prelimradio[j].value;
    }
  }
}
  
calculateprelim(qtyval,prelimid);
}

nf();

}


    function calculatejumlah_afterperunding(){

      let perundingtapakjumlah = document.querySelector(".Perunding");

      var listItem = $(perundingtapakjumlah).closest('tr');
      var jumlahfor = listItem.find('td:eq(1) input[type="hidden"]'). val();

      let alljumlahkos = document.querySelectorAll(".jumlahkosfor"+jumlahfor);

      

      let alltablejumlahkos = document.querySelectorAll(".m"+jumlahfor);
      sumofmainjumlah = 0;
      if(alljumlahkos){
        for(i=1;i<alljumlahkos.length;i++){
          
          sum = alljumlahkos[i].value
          
          sum=removecomma(sum)
          if(isNaN(sum)){
            sum = 0;
            sum=parseFloat(sum);
          }
          
          sumofmainjumlah += sum;
        }
        if(alljumlahkos.length>0){
          alljumlahkos[0].value = (Math.ceil(sumofmainjumlah/1000)*1000).toFixed(2);
        }
      }


      let allmainjumlahkos = document.querySelectorAll(".mainskopjumlahkos");
      sumofmainskopjumlah = 0;
      sum=0;
      if(allmainjumlahkos){
        for(i=0;i<allmainjumlahkos.length;i++){
          
          sum = allmainjumlahkos[i].value
          
          sum=removecomma(sum)
          if(isNaN(sum)){
            sum = 0;
            sum=parseFloat(sum);
          }
          
          sumofmainskopjumlah += sum;
        }

        finaltotaltext = document.getElementById("finaltotaljumlahkos");
        totalkoscomponen = document.getElementById("totalkoscomponen");
        if(finaltotaltext){
          finaltotaltext.value = (Math.ceil(sumofmainskopjumlah/1000)*1000).toFixed(2);
          totalkoscomponen.value = finaltotaltext.value;

        }
      }


      let allmaintempjumlahkos = document.querySelectorAll(".tempjumlah");
      sumofmainskoptempjumlah = 0;
      sum=0;
      if(allmaintempjumlahkos){
        for(i=0;i<allmaintempjumlahkos.length;i++){
          
          sum = allmaintempjumlahkos[i].value
          
          sum=removecomma(sum)
          if(isNaN(sum)){
            sum = 0;
            sum=parseFloat(sum);
          }
          
          sumofmainskoptempjumlah += sum;
        }

        finaltotaltemptext = document.getElementById("componentroughjumlahkos");
        if(finaltotaltemptext){
          finaltotaltemptext.value = sumofmainskoptempjumlah.toFixed(2);
        }
      }


      if(alltablejumlahkos){
        for(i=1;i<alltablejumlahkos.length;i++){
          
          alltablejumlahkos[i].value = (Math.ceil(sumofmainjumlah/1000)*1000).toFixed(2);

        }
        calculateSum(1,2);
      }

      nf();

    }

    function copytaxsst()
    {
      // var finaltax = document.getElementById("componentfinaltax").value;

      // finaltax  = removecomma(finaltax);

      // document.getElementById("componentfinaltaxcopy").value = finaltax;
      // nf();
    }
  //-----to copy imbuhan ends-------

//#################################### calculate sum on change table 5th #######################################//
function calculateJumlah(row,col)
{
  ////console.log(row)
  ////console.log(col)
  var table = document.getElementById("perkara_table_kewagan");
                              var row_length = table.rows.length-1; ////console.log(row_length)
                              var rows = table.rows[row];        ////console.log(rows);

                              var total = 0;
                              for (var j = 1; j < rows.cells.length-1; j++) {
                                var value = removecomma(document.getElementById("inputper"+row+'_'+j).value); ////console.log(value);
                                total = parseFloat(total)+parseFloat(value);
                              }
                             // //console.log(total)
                                var input = document.getElementById("jumlahper"+row); ////console.log(input)
                                input.value = total+'.00';
                                total = 0;

                                var actual = document.getElementById("inputper"+row);

                                var total_col = 0;

                                for (var i = 1; i < row_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[col]; //console.log(cell)
                                    var input = row.cells[col].getElementsByTagName("input")[0]; ////console.log(input)
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); ////console.log(total_col)

                                }
                                var input_col = document.getElementById("inputper"+row_length+"_"+col); //sum to last row
                                input_col.value = total_col+'.00';
                                total_col = 0;

                                var total_jumlah = 0;
                                for (var i = 1; i < row_length; i++) {
                                    var input = document.getElementById("jumlahper"+i);
                                    var value = removecomma(input.value); 
                                    total_jumlah = parseFloat(total_jumlah)+parseFloat(value); ////console.log(total_jumlah)
                                }
                                var jumlah_col = document.getElementById("jumlahper"+row_length);
                                jumlah_col.value = total_jumlah+'.00';
                                total_jumlah = 0;  
                                let KosKeseluruhan = document.querySelectorAll(".KosKeseluruhan");
                                //console.log("Pengurusn: "+KosKeseluruhan.value);
                                var koskese = removecomma(KosKeseluruhan[0].value);

                                if(isNaN(koskese)){
                                  koskese = 0;
                                }
                                let val_pengurusan = document.querySelectorAll(".m"+pengurusan);

                                if(val_pengurusan.length>0){
                                  val_pengurusan[0].value = koskese;
                                }

                                //calculatetotalkosprojek();
                                

                                //val_pengurusan.value = pengurusan;
                                nf();                       
}

function calculatetotalkosprojek(){
  let totalkosproject = 0;
  var finaltotaljumlahkos = document.getElementById("finaltotaljumlahkos");
  let koskeseluruhan = document.querySelectorAll(".KosKeseluruhan");
  let totalOE = document.querySelector(".totalOE");

  var val_totalkoscomponen = document.getElementById("totalkoscomponen");

  if(koskeseluruhan.length>0){
    if(!isNaN(removecomma(koskeseluruhan[0].value))){
      totalkosproject += removecomma(koskeseluruhan[0].value)
    }
    if(!isNaN(removecomma(koskeseluruhan[1].value))){
      totalkosproject += removecomma(koskeseluruhan[1].value)
    }

    
  }

  if(!isNaN(removecomma(totalOE.value))){
    totalkosproject += removecomma(totalOE.value)
  }
  if(!isNaN(removecomma(finaltotaljumlahkos.value))){
    totalkosproject += removecomma(finaltotaljumlahkos.value)
  }
  //totalkosproject1 = (removecomma(totalOE.value) + removecomma(finaltotaljumlahkos.value));
  //totalkosproject = totalkosproject + totalkosproject1;
  
  val_totalkoscomponen.value = totalkosproject;
  nf(); 

}

//------------------ onload for 5th table----------------------
function onLoadPerkara()
{
                              var table = document.getElementById("perkara_table_kewagan"); //console.log(table.rows)
                              var row_length = table.rows.length-1; 
                              var rowcount_first = table.rows[0].cells.length; //console.log(rowcount_first)
                              // var rowcount_first= window.localStorage.getItem('rowcount'); //console.log(rowcount_first)
                              // var scope_length= window.localStorage.getItem('scope_count'); //console.log(scope_length)
                              for (var j = 1; j < rowcount_first-1; j++) {

                                var total_col = 0;

                                for (var i = 1; i < row_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[j]; //console.log(cell)
                                    var input = row.cells[j].getElementsByTagName("input")[0]; ////console.log(input)
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); ////console.log(total_col)

                                }
                                var input_col = document.getElementById("inputper"+row_length+"_"+j); //sum to last row
                                input_col.value = total_col+'.00';
                                total_col = 0;                                
                              }
                              nf();
}

//--------------- calculate sum for table 3rd------------------
function calculateSum(row,col) { ////console.log(row); //console.log(col);
                              var table = document.getElementById("projek_table_kewagan");
                              var row_length = table.rows.length-1; ////console.log(row_length)
                              var rows = table.rows[row];        ////console.log(rows);

                              var total = 0;
                              for (var j = 2; j < rows.cells.length-1; j++) {
                                var value = removecomma(document.getElementById("input"+row+'_'+j).value); ////console.log(value);
                                total = parseFloat(total)+parseFloat(value);
                              }
                                var input = document.getElementById("jumlah"+row); //adding sum of cells to last col
                                input.value = total+'.00';
                                total = 0;

                                var actual = document.getElementById("input"+row);

                                var total_col = 0;

                                for (var i = 1; i < row_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[col]; 
                                    var input = row.cells[col].getElementsByTagName("input")[0]; 
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); ////console.log(total_col)

                                }
                                document.getElementById("sum_"+col).value = total_col;

                                var input_col = document.getElementById("input"+row_length+"_"+col); //sum to last row
                                input_col.value = total_col+'.00';
                                total_col = 0;

                                var total_jumlah = 0;
                                for (var i = 1; i < row_length; i++) {
                                    var input = document.getElementById("jumlah"+i);
                                    var value = removecomma(input.value); 
                                    total_jumlah = parseFloat(total_jumlah)+parseFloat(value); ////console.log(total_jumlah)
                                }
                                var jumlah_col = document.getElementById("jumlah"+row_length);
                                jumlah_col.value = total_jumlah+'.00';
                                total_jumlah = 0;

                                for (var k = 1; k < row_length; k++) {
                                    var jumlah_sum_new = removecomma(document.getElementById("jumlah"+k).value); //console.log(jumlah_sum_new)
                                    var total_sum_new = removecomma(document.getElementById("total_"+k).value); //console.log(total_sum_new)
                                    if(parseInt(jumlah_sum_new) > parseInt(total_sum_new))
                                    { //console.log("total")
                                      var input_color = document.getElementById("total_"+k); //console.log(input_color)
                                       input_color.style.backgroundColor = '#d47676';
                                    }
                                    else if(parseInt(jumlah_sum_new)==parseInt(total_sum_new))
                                    {
                                      var input_color = document.getElementById("total_"+k); //console.log(input_color)
                                       input_color.style.backgroundColor = 'rgb(117 216 128)';
                                    }
                                    else
                                    { //console.log("sum")
                                      var input_color = document.getElementById("total_"+k); //console.log(input_color)
                                       input_color.style.backgroundColor = 'rgb(205 192 111)';
                                    }
                                }
        nf();
        //calculatetotalkosprojek();
  }
//---------------------- onload for third and fourth table------------
  function onLoadSkop() {
  //console.log("onload")
  
                              var table = document.getElementById("projek_table_kewagan"); //console.log(table.rows)
                              var row_length = table.rows.length-1; 
                              // var rowcount_first = table.rows[0].cells.length; //console.log(rowcount_first)
                              var rowcount_first= window.localStorage.getItem('rowcount'); //console.log(rowcount_first)
                              var scope_length= window.localStorage.getItem('scope_count'); //console.log(scope_length)
                              var rowSum = 0;
                              for (var j = 2; j < rowcount_first-1; j++) {

                                var total_col = 0;
                                for (var i = 1; i <= scope_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[j]; ////console.log(cell)
                                    var input = row.cells[j].getElementsByTagName("input")[0]; 
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); ////console.log(total_col)
                                }
                                var input_col = document.getElementById("input"+row_length+"_"+j); //sum to last row
                               //console.log(input_col)
                                input_col.value = total_col;
                                var sum_col = document.getElementById("sum_"+j);        //console.log(sum_col)
                                if(sum_col){ sum_col.value=total_col;}
                                total_col = 0;
                                
                              }

                              for (var k = 1; k < row_length; k++) {
                                    var jumlah_sum_new = document.getElementById("jumlah"+k).value; //console.log(parseInt(jumlah_sum_new))
                                    var total_sum_new = document.getElementById("total_"+k).value; //console.log(parseInt(total_sum_new))

                                    var new_jumlah = parseFloat(jumlah_sum_new.replace(/,/g, '')); //console.log(new_jumlah)
                                    var new_total = parseFloat(total_sum_new.replace(/,/g, '')); //console.log(new_total)

                                    if(parseInt(new_jumlah) > parseInt(new_total))
                                    { //console.log("total")
                                      var input_color = document.getElementById("total_"+k); ////console.log(input_color)
                                       input_color.style.backgroundColor = '#d47676';
                                    }
                                    else if(parseInt(new_jumlah)==parseInt(new_total))
                                    {
                                      var input_color = document.getElementById("total_"+k); ////console.log(input_color)
                                       input_color.style.backgroundColor = 'rgb(117 216 128)';
                                    }
                                    else
                                    { ////console.log("sum")
                                      var input_color = document.getElementById("total_"+k); ////console.log(input_color)
                                       input_color.style.backgroundColor = 'rgb(205 192 111)';
                                    }
                                }
                                nf();
}

function calculateprelim(prelimpercent, jumlahclass){

  if(isNaN(prelimpercent)){
    prelimpercent = 0;
  }
  var mainworks = document.querySelector(".splmainworksjumlah").value;

  if(mainworks){
    mainworks = removecomma(mainworks);
    if(isNaN(mainworks)){
      mainworks = 0;
    }
  }

  prelimpercent = parseFloat(prelimpercent);

  var prelimjumlahkos = document.getElementById("prelimcomponentjumlahkos");
  var prelimjumlahvalue = 0;
  var amount = parseFloat(mainworks * prelimpercent/100)
  prelimjumlahkos.value = amount;
  var prelimjumlahkosmain = document.querySelectorAll(".jumlahkosfor"+jumlahclass);

  if(prelimjumlahkosmain){
    for(i=0;i<prelimjumlahkosmain.length;i++){
      prelimjumlahkosmain[i].value = (Math.ceil(amount/1000)*1000).toFixed(2); 
    }
  }
  let alltablejumlahkos = document.querySelectorAll(".m"+jumlahclass);
  if(alltablejumlahkos){
        for(i=1;i<alltablejumlahkos.length;i++){
          
          alltablejumlahkos[i].value = (Math.ceil(amount/1000)*1000).toFixed(2);

        }
        calculateSum(1,2);
      }

  


  // if(prelimjumlahkos){
  //   prelimjumlahvalue = prelimjumlahkos.value;
  //   prelimjumlahvalue = removecomma(prelimjumlahvalue);
  //   if(isNaN(mainworks)){
  //     mainworks = 0;
  //   }
  // }
  
  nf();
  calculatemaintotal();


}


function OnLoadCalculateFirsTable(){
  
  let all_jumlah = document.querySelectorAll(".mainskopjumlahkos");
  //console.log(all_jumlah.length)
  if(all_jumlah.length>0){
    var sumjumlah=0;
    //var totaljumlah = removecomma(all_jumlah[0].value); 
    for(let k=0;k<all_jumlah.length;k++)
    {
      sum = removecomma(all_jumlah[k].value);
      if(isNaN(sum)){
        sum=0;
      }
      sumjumlah+= sum;             
    }    
    document.getElementById("finaltotaljumlahkos").value = sumjumlah;//Math.ceil(sumjumlah/1000) * 1000;
  }

    let tempall_jumlah = document.querySelectorAll(".tempjumlah");
    sumjumlah=0;
  if(tempall_jumlah.length>0){
    
    //var totaljumlah = removecomma(all_jumlah[0].value); 
    for(let l=0;l<tempall_jumlah.length;l++)
    {
      sum = removecomma(tempall_jumlah[l].value);
      if(isNaN(sum)){
        sum=0;
      }
      sumjumlah+= sum; 
            
    }

    //console.log("hhhhh: "+tempall_jumlah.length)
    //console.log(sumjumlah)
    
    document.getElementById("componentroughjumlahkos").value = sumjumlah;//Math.ceil(sumjumlah/1000) * 1000;
  }
    nf();
}

function calculatemaintotal(){

  let all_jumlah = document.querySelectorAll(".mainskopjumlahkos");
  //console.log(all_jumlah.length)
  if(all_jumlah.length>0){
    var sumjumlah=0;
    //var totaljumlah = removecomma(all_jumlah[0].value); 
    for(let k=0;k<all_jumlah.length;k++)
    {
      sum = removecomma(all_jumlah[k].value);
      if(isNaN(sum)){
        sum=0;
      }
      sumjumlah+= sum; 
            
    }
    //document.getElementById("componentroughjumlahkos").value = sumjumlah;
    document.getElementById("finaltotaljumlahkos").value = sumjumlah.toFixed(2);
    document.getElementById("totalkoscomponen").value = sumjumlah.toFixed(2);
  }

  let all_jumlahtemp = document.querySelectorAll(".tempjumlah");
  //console.log(all_jumlahtemp.length)
  if(all_jumlahtemp.length>0){
    var sumjumlah=0;
    //var totaljumlah = removecomma(all_jumlah[0].value); 
    for(let k=0;k<all_jumlahtemp.length;k++)
    {
      sum = removecomma(all_jumlahtemp[k].value);
      if(isNaN(sum)){
        sum=0;
      }
      sumjumlah+= sum; 
            
    }
    //document.getElementById("componentroughjumlahkos").value = sumjumlah;
    document.getElementById("componentroughjumlahkos").value = sumjumlah.toFixed(2);
  }
  nf();

}
// --to recalculate after minus button is clicked--------------
  function recalculateperundingjumlah_kajian(){

    let all_jumlah = document.querySelectorAll("[id='yuranperunding_jumlahkos']");
    let all_jumlah1 = document.querySelectorAll("[id='perundingjumlahkos1']");
    let all_jumlah0 = document.querySelectorAll("[id='perundingjumlahkos0']");
  

    if(all_jumlah1.length>0 || all_jumlah0.length>0){
      sumjumlah0=0
      sumjumlah1=0
      for(let k=1;k<all_jumlah0.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah0[k].value))){
          sumval = all_jumlah0[k].value
          sumval = removecomma(sumval);
          sumjumlah0+= sumval//parseInt(all_jumlah0[k].value); 
        }      
      }

      
      for(let k=1;k<all_jumlah1.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah1[k].value))){
          sumval = all_jumlah1[k].value
          sumval = removecomma(sumval);
          sumjumlah1+= sumval //parseInt(all_jumlah1[k].value); 
        }      
      }

      totaljumlah = sumjumlah0 + sumjumlah1;
      //console.log('Total cost is: '+totaljumlah)
      // let totaljumlahkos = document.querySelector("[id^='totaljumlahkos']");
      // totaljumlahkos.value = totaljumlah;

      
      all_jumlah0[0].value = sumjumlah0;
      all_jumlah1[0].value = sumjumlah1;

      let yuran_jumlahkos = document.querySelector("[id^='yuranperunding_jumlahkos']");
      let yuran_kos_kajian = document.querySelector("[id^='kosperunding_kajian']");

      let ANGGARANKOS = document.getElementById("ANGGARANKOS");
      let imbuhanbalikkosval = document.getElementById("imbuhanbalik");
      let ssttax = document.getElementById("perundingssttax");
      

      imbuhanbalikkos = imbuhanbalikkosval.value;

      imbuhanbalikkos = removecomma(imbuhanbalikkos);

      if(isNaN(imbuhanbalikkos)){
        imbuhanbalikkos = 0;
      }

      yuran_jumlahkos.value = totaljumlah;

      yuran_kos_kajian.value = parseFloat(totaljumlah) + parseFloat(imbuhanbalikkos);

      finalamount = (totaljumlah+imbuhanbalikkos)*6/100;

      ssttax.value = finalamount;

      ANGGARANKOS.value = finalamount + totaljumlah + imbuhanbalikkos;
      
      if(sumjumlah0 < totaljumlah){
        all_jumlah0[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah0 > totaljumlah){
        all_jumlah0[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah0[0].style="background: rgb(117,216,128)";
        
      }

      if(sumjumlah1 < totaljumlah){
        all_jumlah1[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah1 > totaljumlah){
        all_jumlah1[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah1[0].style="background: rgb(117,216,128)";
        
      }


      // if(totaljumlah < all_jumlah[0].value){
      //   all_jumlah0[0].style="background: rgb(205, 192, 111)";
      //   all_jumlah1[0].style="background: rgb(205, 192, 111)";
      //   //totaljumlahkos.style="background: rgb(205, 192, 111)";
      // }
      // else if(totaljumlah > all_jumlah[0].value){
      //   all_jumlah0[0].style="background: rgb(212, 118, 118)";
      //   all_jumlah1[0].style="background: rgb(212, 118, 118)";
      //   //totaljumlahkos.style="background: rgb(212, 118, 118)";
      // }
      // else{
      //   all_jumlah0[0].style="background: rgb(117,216,128)";
      //   all_jumlah1[0].style="background: rgb(117,216,128)";
      //   //totaljumlahkos.style="background: rgb(117,216,128)";
      // }


    }  
  //}
nf();

}

function recalculateperundingjumlah_tapak(){

  let all_jumlah = document.querySelectorAll("[id='yuranperunding_tapak_jumlahkos']");
  let all_jumlah1 = document.querySelectorAll("[id='perundingjumlahkostapak1']");
  let all_jumlah0 = document.querySelectorAll("[id='perundingjumlahkostapak0']");
  

    if(all_jumlah1.length>0 || all_jumlah0.length>0){
      sumjumlah0=0
      sumjumlah1=0
      for(let k=1;k<all_jumlah0.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah0[k].value))){
          sumval = all_jumlah0[k].value
          sumval = removecomma(sumval);
          sumjumlah0+= sumval//parseInt(all_jumlah0[k].value); 
        }      
      }

      
      for(let k=1;k<all_jumlah1.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah1[k].value))){
          sumval = all_jumlah1[k].value
          sumval = removecomma(sumval);
          sumjumlah1+= sumval //parseInt(all_jumlah1[k].value); 
        }      
      }

      totaljumlah = sumjumlah0 + sumjumlah1;
      //console.log('Total cost is: '+totaljumlah)
      // let totaljumlahkos = document.querySelector("[id^='totaljumlahkos']");
      // totaljumlahkos.value = totaljumlah;

      
      all_jumlah0[0].value = sumjumlah0;
      all_jumlah1[0].value = sumjumlah1;

      let yuran_jumlahkos = document.querySelector("[id^='yuranperunding_tapak_jumlahkos']");
      let yuran_kos_tapak = document.querySelector("[id^='kosperunding_tapak']");

      let ANGGARANKOS = document.getElementById("ANGGARANKOStapak");
      let imbuhanbalikkosval = document.getElementById("imbuhanbaliktapak");
      let ssttax = document.getElementById("perundingssttaxtapak");      

      imbuhanbalikkos = imbuhanbalikkosval.value;

      imbuhanbalikkos = removecomma(imbuhanbalikkos);

      if(isNaN(imbuhanbalikkos)){
        imbuhanbalikkos = 0;
      }

      yuran_jumlahkos.value = totaljumlah;

      yuran_kos_tapak.value = totaljumlah + imbuhanbalikkos;

      finalamount = (totaljumlah+imbuhanbalikkos)*6/100;

      ssttax.value = finalamount;

      ANGGARANKOS.value = finalamount + totaljumlah;

      if(sumjumlah0 < totaljumlah){
        all_jumlah0[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah0 > totaljumlah){
        all_jumlah0[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah0[0].style="background: rgb(117,216,128)";
        
      }

      if(sumjumlah1 < totaljumlah){
        all_jumlah1[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah1 > totaljumlah){
        all_jumlah1[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah1[0].style="background: rgb(117,216,128)";
        
      }


      // if(totaljumlah < all_jumlah1[0].value){
      //   //all_jumlah0[0].style="background: rgb(205, 192, 111)";
      //   all_jumlah1[0].style="background: rgb(205, 192, 111)";
      //   totaljumlahkos.style="background: rgb(205, 192, 111)";
      // }
      // else if(totaljumlah > all_jumlah1[0].value){
      //   //all_jumlah0[0].style="background: rgb(212, 118, 118)";
      //   all_jumlah1[0].style="background: rgb(212, 118, 118)";
      //   totaljumlahkos.style="background: rgb(212, 118, 118)";
      // }
      // else{
      //   //all_jumlah0[0].style="background: rgb(117,216,128)";
      //   all_jumlah1[0].style="background: rgb(117,216,128)";
      //   totaljumlahkos.style="background: rgb(117,216,128)";
      // }
    }  
  //}
nf();

}
// --to recalculate after minus button is clicked ends--------------

  //**********************To calculate jumlah cost of first table****************************
function checkjumlah(jumlahid){
  
  
  let all_jumlah = document.querySelectorAll(".mainskopjumlahkos");
  //console.log(all_jumlah.length)
  if(all_jumlah.length>0){
    var sumjumlah=0;
    //var totaljumlah = removecomma(all_jumlah[0].value); 
    for(let k=0;k<all_jumlah.length;k++)
    {
      sum = removecomma(all_jumlah[k].value);
      if(isNaN(sum)){
        sum=0;
      }
      sumjumlah+= sum; 
            
    }
    document.getElementById("componentroughjumlahkos").value = sumjumlah;
    document.getElementById("finaltotaljumlahkos").value = Math.ceil(sumjumlah/1000) * 1000;

    var tax = sumjumlah*6.0/100;

    // document.getElementById("componentroughtax").value = tax;
    // document.getElementById("componentfinaltax").value = Math.ceil(tax/1000) * 1000;
  
  }
  let this_jumlah = document.getElementById(jumlahid);
  //console.log("fdfdfdf: "+jumlahid )
  
  calculatekosunit(this_jumlah)
  
}
//**************************************************************************

// -------------to calculate kos per unit-----------------------

function calculatekosunit(textid){
  nf();
  
   
  var listItemId = $(textid).closest('tr');

  
  var jumlahfor = listItemId. find('td:eq(1) input[type="hidden"]'). val();  
  var subjumlahfor = listItemId. find('td:eq(4) input[type="hidden"]'). val();
  var komponentqty = listItemId. find('td:eq(3) input[type="text"]'). val();  
  var componentkosperunit = listItemId. find('td:eq(5) input[type="text"]').val();
  
  var componentjumlahkos = listItemId. find('td:eq(2) input[type="text"]');
  var tempcomponentjumlahkos = listItemId. find('td:eq(6) input[type="text"]');
  //var c = listItemId. find('td:eq(6) input[type="text"]');
  komponentqty = removecomma(komponentqty);
  if(isNaN(komponentqty)){
    komponentqty=0;
    komponentqty=parseFloat(komponentqty);

  }
  componentkosperunit= removecomma(componentkosperunit);
  if(isNaN(componentkosperunit)){
    componentkosperunit=0;
    componentkosperunit=parseFloat(componentkosperunit);

  }
 
  
  

  var result = (componentkosperunit * komponentqty).toFixed(2);

  
  
  tempcomponentjumlahkos.val(result);
  componentjumlahkos.val((Math.ceil(result/1000)*1000).toFixed(2));

// ----------------sub sub component total-------------------------------------------------------
  let allsubjumlahkos = document.querySelectorAll(".subjumlahkosfor"+subjumlahfor);
  let allsubsubjumlahkos = document.querySelectorAll(".jumlahkosfor"+subjumlahfor);
  var subcomponentid = listItemId.find('td:eq(4) input[type="hidden"]').val();

  let mainsubsubjumlahkos = document.querySelectorAll(".subskopid_forsubcal_"+subcomponentid);

  //var listItemId = $(textid).closest('tr');

  
  var jumlahfor = listItemId. find('td:eq(1) input[type="hidden"]'). val();

  //let alltablejumlahkos = document.querySelectorAll(".m"+jumlahfor);
  sumofsubmainjumlah = 0;
  if(allsubjumlahkos){
    for(i=0;i<allsubjumlahkos.length;i++){
      
      sum = allsubjumlahkos[i].value
      
      sum=removecomma(sum)
      if(isNaN(sum)){
        sum = 0;
        sum=parseFloat(sum);
      }
      sumofsubmainjumlah += sum;
    }
    if(allsubjumlahkos.length>0){
      //allsubsubjumlahkos[1].value = Math.round(sumofsubmainjumlah/1000)*1000;
      mainsubsubjumlahkos[0].value=(Math.ceil(sumofsubmainjumlah/1000)*1000).toFixed(2);
    }
  }
// ------------------------------------------------------------------------------------------------


  

  let alljumlahkos = document.querySelectorAll(".jumlahkosfor"+jumlahfor);

  let alltablejumlahkos = document.querySelectorAll(".m"+jumlahfor);
  sumofmainjumlah = 0;
  if(alljumlahkos){
    for(i=1;i<alljumlahkos.length;i++){
      
      sum = alljumlahkos[i].value
      
      sum=removecomma(sum)
      if(isNaN(sum)){
        sum = 0;
        sum=parseFloat(sum);
      }
      
      sumofmainjumlah += sum;
    }
    if(alljumlahkos.length>0){
      alljumlahkos[0].value = (Math.ceil(sumofmainjumlah/1000)*1000).toFixed(2);
    }
    


  }

  if(alltablejumlahkos){
    for(i=1;i<alltablejumlahkos.length;i++){
      
      alltablejumlahkos[i].value = (Math.ceil(sumofmainjumlah/1000)*1000).toFixed(2);

    }
    calculateSum(1,2);
    

  }



  let alltempjumlahkos = document.querySelectorAll(".tempjumlah");
  sumofmainjumlah = 0;
  if(alltempjumlahkos){
    for(i=0;i<alltempjumlahkos.length;i++){

      sum = alltempjumlahkos[i].value
      sum=removecomma(sum)
      if(isNaN(sum)){
        sum = 0;
        sum=parseFloat(sum);
      }
      ////console.log("value="+alljumlahkos[i].value)
      sumofmainjumlah += sum;
    }
    
  }


  let allmainjumlahkos = document.querySelectorAll(".mainskopjumlahkos");
  sumofmainjumlahkos = 0;
  if(allmainjumlahkos){
    for(i=0;i<allmainjumlahkos.length;i++){

      sum = allmainjumlahkos[i].value
      sum=removecomma(sum)
      if(isNaN(sum)){
        sum = 0;
        sum=parseFloat(sum);
      }
      ////console.log("value="+alljumlahkos[i].value)
      sumofmainjumlahkos += sum;
    }
    
  }


   

  //var tax = sumofmainjumlah;
  var finaljumlahtax = sumofmainjumlah.toFixed(2);
  //document.getElementById("totalkoscomponen").value = sumofmainjumlahkos.toFixed(2);
  document.getElementById("componentroughjumlahkos").value = finaljumlahtax;
  document.getElementById("finaltotaljumlahkos").value =  Math.ceil(finaljumlahtax/1000) * 1000;

    // document.getElementById("componentroughtax").value = tax;
    // document.getElementById("componentfinaltax").value = Math.ceil(tax/1000) * 1000;

    //copytaxsst();

    var table_row_count = document.getElementById("projek_table_kewagan").rows.length;
    var row_count= table_row_count-1; console.log(row_count);
    document.getElementById('total_'+row_count).value = finaljumlahtax;
    document.getElementById('jumlah_total_latest').value = finaljumlahtax;



    splmainworkscontrol = document.querySelector(".splmainworksjumlah");
    splmainworks = document.getElementById(splmainworkscontrol.id)
    
    splmainworksvalue=0
    if(splmainworks){
      
      splmainworksvalue = splmainworks.value;
      splmainworksvalue = removecomma(splmainworksvalue)
    } 
     
    
    var perundingvalue=0;


    if(isPerundingPresent && isTerperinciPresent){
      perundingvalue = document.querySelector(".splmainworksjumlah");
      //perundingvalue = document.getElementById("jumlahkos"+perlikantperunding)
      anggrancost = document.getElementById("ftotalcost");
      anggrancost.value = parseFloat(removecomma(perundingvalue.value)).toFixed(2);

      getfinalcost();
      calculatejumlah_afterperunding();

    }

    if(isPrelimItem_Present){
      let prelimradio = document.querySelectorAll("[id='prelimradio']");
    var qtyval = 0;
    if(prelimradio.length>0){
      for(j=0;j<prelimradio.length;j++){
        if(prelimradio[j].checked){
          qtyval = prelimradio[j].value;
        }
      }
    }
      
    calculateprelim(qtyval,prelimid);
    }


    calculatejumlah_afterperunding();
  nf();

  //calculatetotalkosprojek();
}

function update_perlikantperunding()
{
  if(perlikantperunding != 0){
    allperunding = document.querySelectorAll(".jumlahkosfor"+perlikantperunding);
    if(allperunding){
      sum = 0.0;
      for(i=1;i<allperunding.length;i++){
        valperunding = allperunding[i].value;
        valperunding = removecomma(valperunding);
        if(isNaN(valperunding)){
          valperunding = 0;
        }

        sum += parseFloat(valperunding);
      }

      allperunding[0].value = sum.toFixed(2);
    }
  }
  nf();
}

function calculatemainjumlahkos(textid){
  nf();
  
   
  var listItemId = $(textid).closest('tr');

  

  var komponentqty = listItemId. find('td:eq(3) input[type="text"]'). val();
  
  var componentjumlahkos = listItemId. find('td:eq(2) input[type="text"]'). val();
  var componentkosperunit = listItemId. find('td:eq(5) input[type="text"]');
  var tempcomponentjumlahkos = listItemId. find('td:eq(6) input[type="text"]');
  komponentqty = removecomma(komponentqty);
  componentjumlahkos= removecomma(componentjumlahkos);

  
  componentkosperunit.val((Math.ceil((componentjumlahkos / komponentqty) * 100) / 100).toFixed(2))

  tempcomponentjumlahkos.val(parseFloat(componentjumlahkos.toFixed(2)))
  
  


}

//---------------calculate kos per unit ends--------------------

//-------------new piawai calculation------------------------
function getfinalcostpiawai(){
  percent = 0;
  if(document.getElementById("pmax").checked){
    percent = parseFloat(document.getElementById("lblpmax").value)

  }
  else if(document.getElementById("pmin").checked){
    percent = parseFloat(document.getElementById("lblpmin").value)

  }
  else if(document.getElementById("pavg").checked){
    percent = parseFloat(document.getElementById("lblpavg").value)

  }
  var totalcost = document.getElementById("ftotalcost").value;
  totalcost = removecomma(totalcost);

  if(isNaN(totalcost)){
    totalcost = 0;
  }

  var designfee =parseFloat((totalcost*percent/100).toFixed(2)); //document.getElementById("ftotalcostpercent").value;
  var imbuhanbalikcopy = document.getElementById("imbuhanbalikcopy").value;
  var imbuhanbalikcopyval = document.getElementById("imbuhanbalikcopy");

  imbuhanbalikcopyval =  parseFloat(document.getElementById("imbuhanbalikcopy").value).toFixed(2);
  var componentfinaltaxcopy = document.getElementById("componentfinaltaxcopy");
  var totalkosperunding = document.getElementById("totalkosperunding");
  var componentanggarankos = document.getElementById("componentanggarankos");

  //designfee = removecomma(designfee);
  imbuhanbalikcopy = removecomma(imbuhanbalikcopy);

  if(isNaN(imbuhanbalikcopy)){
    imbuhanbalikcopy = 0;
  }

  finaltax = (parseFloat(designfee)+imbuhanbalikcopy)*6/100;
  componentfinaltaxcopy.value = finaltax.toFixed(2)
  componentanggarankos.value = parseFloat(parseFloat(designfee)+imbuhanbalikcopy+parseFloat(finaltax)).toFixed(2);

  document.getElementById("ftotalcostpercent").value = designfee;

  totalkosperunding.value = (parseFloat(parseFloat(designfee)+imbuhanbalikcopy)).toFixed(2)

  var main_perunding_jumlah = document.querySelector(".mainperundingjumlah");
  var main_perunding_temp_jumlah = document.querySelector(".terperinchi_temp_jumlahkos");
  
 
  main_perunding_jumlah.value= (Math.ceil((designfee+imbuhanbalikcopy+parseFloat(componentfinaltaxcopy.value))/1000)*1000).toFixed(2);
  main_perunding_temp_jumlah.value = parseFloat(designfee+imbuhanbalikcopy+parseFloat(componentfinaltaxcopy.value)).toFixed(2);

  update_perlikantperunding();
  calculatejumlah_afterperunding();


nf();

}
//-------------new piawai calculation ends------------------------

//--------to calculate the new calculations-------------
  
  function getfinalcost(){

    
    if(isPerundingPresent && isTerperinciPresent){
      
      totalfjumlah = document.getElementById("ftotalcost").value;
      totalfjumlah = removecomma(totalfjumlah);
      
      const api_url = "{{env('API_URL')}}";  //console.log(api_url);
        
      $.ajax({
              type: "GET",
              
              url: api_url+"api/project/getcalculation-details",
              dataType: 'json',
              success: function (result) { 
                //console.log("Length : "+result.data.length);
                  if (result) {
                    
                    
                    for(var i=0;i<result.data.length-1;i++){

                      
                     
                      if(parseFloat(totalfjumlah)>= parseFloat(result.data[i]["total_cost"]) && parseFloat(totalfjumlah)<= parseFloat(result.data[i+1]["total_cost"])){
                        ////console.log("Total Cost: "+result.data[i]["total_cost"]);

                        pminval = parseFloat((parseFloat(result.data[i]["P_min"]) + parseFloat(result.data[i+1]["P_min"]))/2).toFixed(2);
                        pmaxval = parseFloat((parseFloat(result.data[i]["P_max"]) + parseFloat(result.data[i+1]["P_max"]))/2).toFixed(2);

                        document.getElementById("pmax").value = pmaxval;
                        document.getElementById("lblpmax").value = pmaxval;

                        document.getElementById("pmin").value = pminval;
                        document.getElementById("lblpmin").value = pminval;
                        ////console.log("pmax: "+ pmaxval + "Pmin: "+ pminval+ "pavg: "+((parseFloat(pmaxval)+parseFloat(pminval))/2).toFixed(2));
                        document.getElementById("pavg").value = ((parseFloat(pmaxval)+parseFloat(pminval))/2).toFixed(2);
                        document.getElementById("lblpavg").value = ((parseFloat(pmaxval)+parseFloat(pminval))/2).toFixed(2);

                      }

                    }

                    if(document.getElementById("pmax").checked){
                      getfinalcostpiawai();

                    }
                    else if(document.getElementById("pmin").checked){
                      //calculatecost(document.getElementById("lblpmin").value)
                      getfinalcostpiawai();

                    }
                    else if(document.getElementById("pavg").checked){
                      //calculatecost(document.getElementById("lblpavg").value)
                      getfinalcostpiawai();

                    }
                                  
                  }else {
                      $.Notification.error(result.Message);
                  }
                }
              });

    }
    nf();
    //checkjumlah(totalfjumlah);  

    
}

//--------to calculate the new calculations ends-------------

//----for removing commas from numbers-----------------------------------------------------------------
    function removecomma(num){
      
      num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
      num=parseFloat(num,10);
      return num;
    }
//----for removing commas from numbers ends-----------------------------------------------------------------

// -----Calculate cost for total main works---------
          
function calculatecost(percentage){
  var fcost = document.getElementById("ftotalcost").value;



  fcost = removecomma(fcost);

  //percentage = percentage);

  //console.log(percentage)
  var designfee=parseFloat(fcost*percentage/100);

  document.getElementById("ftotalcostpercent").value = designfee.toFixed(2);

  var imbuhanbalik = document.getElementById("imbuhanbalikcopy").value;
  imbuhanbalik = removecomma(imbuhanbalik);

  if(isNaN(imbuhanbalik)){
    imbuhanbalik=0;
  }
  
  var tax = parseFloat(designfee + imbuhanbalik)*6/100;


  //var perunding_jumlah = document.querySelector(".mainworksjumlah");
  var main_perunding_jumlah = document.querySelector(".mainperundingjumlah");
  var finalcost = parseFloat(designfee+tax+imbuhanbalik);
  
  //perunding_jumlah.value= finalcost;


  main_perunding_jumlah.value= Math.ceil(finalcost/1000)*1000;
  getfinalcostpiawai();
  nf();
}

// -----Calculate cost for total main works ends ------

function nf() {
  $('.input-element').toArray().forEach(function (field) {
    // Get the current input value
    var inputValue = $(field).val();

    // Check if inputValue is a valid number and not empty
    if (!isNaN(inputValue) && inputValue !== '') {
      // Convert the inputValue to a number and format it to have two decimal places
      var formattedValue = parseFloat(inputValue).toFixed(2);
      
      // Update the input field with the formatted value
      $(field).val(formattedValue);
    }

    // Apply Cleave formatting
    new Cleave(field, {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });
  });
}

//**************************Calculate Belanja table******************************************************

function calculatebelanja()
{
  ////console.log(row)
  ////console.log(col)
  var table = document.getElementById("perkara_table_sec_kewagan");
                              var row_length = table.rows.length-1; 
                              var rows = table.rows[row_length-2]; 
                              

                              if (row_length > 0) {
                              let all_rowid = []

                              var tablerowBelanja = document.querySelectorAll('#perkara_table_sec_kewagan tr');
                              
                              for (var j = 2; j < table.rows.length-1; j++) {
                                sumofrows = 0

                                    var colid = "col"+j;
                                    
                                    //let all_colid = document.querySelectorAll("."+colid);

                                    for(l=2;l<table.rows[0].cells.length;l++){
                                      let all_colid = table.rows[j].querySelectorAll(".col"+l);
                                      
                                      if(all_colid){
                                        if(!isNaN(removecomma(all_colid[0].value))){                                        
                                          sumofrows += removecomma(all_colid[0].value);
                                        }
                                      }
                                      ////console.log("row : "+table.rows.length+"---"+(j+2)+" "+all_colid[0].value)

                                      
                                      
                                    }
                                    all_colid = table.rows[j].querySelectorAll(".col"+(l))
                                    all_colid[0].value = sumofrows.toFixed(2)
                                    
                              

                                    var noofcells = rows.cells.length; 
                                                  
                                    //console.log("sdfsdffggfg"+noofcells)

                                  for (var m = 2; m <= table.rows[0].cells.length; m++) {
                                    var colid = "col"+m;
                                    
                                    let all_colid1 = document.querySelectorAll("."+colid);

                                    //console.log("sdfsdffggfg"+j+" row"+all_colid1.length)
                                    
                                    sumofcols = 0
                                    for (i=0;i<all_colid1.length;i++){
                                      if(!isNaN(removecomma(all_colid1[i].value) )){
                                        sumofcols += removecomma(all_colid1[i].value);
                                      }                                      
                                    }
                                    ////console.log("colno: "+j)
                                    let totalcolid = document.querySelector("[id^='totalcol"+m+"']");
                                    totalcolid.value = sumofcols.toFixed(2); 
                                    nf();                                  

                              }

                                
                                                    
                                }

                                                     
                          }
                          nf();
                          //calculatetotalkosprojek();
}



//*********************************************************************************

//**********************To calculate jumlah cost of perunding table****************************
function checkperundingjumlah(perundingjumlahid, thistextbox){
  ////console.log("Perundng: "+perundingjumlahid);

  var listItemId = $(thistextbox).closest('tr');

  var manmonth = listItemId. find('td:eq(2) input[type="text"]'). val();
  var multiplier = listItemId. find('td:eq(3) input[type="text"]'). val();
  var salary = listItemId. find('td:eq(4) input[type="text"]'). val();
  var amount = listItemId. find('td:eq(5) input[type="text"]');

  
  var componentjumlahkos = listItemId. find('td:eq(1) input[type="text"]');
  manmonth = removecomma(manmonth);
  multiplier = removecomma(multiplier);
  salary = removecomma(salary);



  var totaljumlah = (manmonth*multiplier*salary).toFixed(2);

  if(isNaN(totaljumlah)){
    totaljumlah = 0
    
  } 
  
  amount.val(totaljumlah);
  componentjumlahkos.val((Math.ceil(totaljumlah  * 1000) / 1000).toFixed(2));

  
 
  let all_jumlah = document.querySelectorAll("[id^='"+perundingjumlahid+"']");
  let all_jumlah1 = document.querySelectorAll("[id^='perundingjumlahkos1']");
  let all_jumlah0 = document.querySelectorAll("[id^='perundingjumlahkos0']");
  

    if(all_jumlah1.length>0 || all_jumlah0.length>0){
      sumjumlah0=0
      sumjumlah1=0
      for(let k=1;k<all_jumlah0.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah0[k].value))){
          sumval = all_jumlah0[k].value
          sumval = removecomma(sumval);
          sumjumlah0+= sumval//parseInt(all_jumlah0[k].value); 
        }      
      }

      
      for(let k=1;k<all_jumlah1.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah1[k].value))){
          sumval = all_jumlah1[k].value
          sumval = removecomma(sumval);
          sumjumlah1+= sumval //parseInt(all_jumlah1[k].value); 
        }      
      }

      totaljumlah = sumjumlah0 + sumjumlah1;
      //console.log('Total cost is: '+totaljumlah)
      
      all_jumlah0[0].value = sumjumlah0.toFixed(2);
      all_jumlah1[0].value = sumjumlah1.toFixed(2);

      let yuran_jumlahkos = document.querySelector("[id^='yuranperunding_jumlahkos']");
      let yuran_kos_kajian = document.querySelector("[id^='kosperunding_kajian']");

      let ANGGARANKOS = document.getElementById("ANGGARANKOS");
      let imbuhanbalikkosval = document.getElementById("imbuhanbalik");
      let ssttax = document.getElementById("perundingssttax");
      

      imbuhanbalikkos = imbuhanbalikkosval.value;

      imbuhanbalikkos = removecomma(imbuhanbalikkos);

      if(isNaN(imbuhanbalikkos)){
        imbuhanbalikkos = 0;
      }

      yuran_jumlahkos.value = totaljumlah.toFixed(2);

      yuran_kos_kajian.value = (parseFloat(totaljumlah) + parseFloat(imbuhanbalikkos)).toFixed(2);

      finalamount = (totaljumlah+imbuhanbalikkos)*6/100;

      ssttax.value = finalamount.toFixed(2);

      ANGGARANKOS.value = (finalamount + totaljumlah + imbuhanbalikkos).toFixed(2);

      let perundingkajianjumlah = document.querySelector(".mainperundingkajianjumlah");
      let perundingkajiantempjumlah = document.querySelector(".kajian_temp_jumlahkos");
      
      if(perundingkajianjumlah){
        perundingkajiantempjumlah.value = ANGGARANKOS.value;
        perundingkajianjumlah.value = Math.ceil(ANGGARANKOS.value/1000)*1000;
      }



      calculatejumlah_afterperunding();
      
      if(sumjumlah0 < totaljumlah){
        all_jumlah0[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah0 > totaljumlah){
        all_jumlah0[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah0[0].style="background: rgb(117,216,128)";
        
      }

      if(sumjumlah1 < totaljumlah){
        all_jumlah1[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah1 > totaljumlah){
        all_jumlah1[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah1[0].style="background: rgb(117,216,128)";
        
      }

    }  
  
nf();
  
  
}


//--------------- new table --------------------------------

function loadKewanganData(kewangan_negeri)
{  console.log(kewangan_negeri)
      let all_kos = document.querySelectorAll("[id^='kos_projeck']"); console.log(all_kos);

      let siling_0 = document.querySelectorAll("[id^='siling_0']"); console.log(siling_0);
      let siling_1 = document.querySelectorAll("[id^='siling_1']"); console.log(siling_1);
      let siling_2 = document.querySelectorAll("[id^='siling_2']"); console.log(siling_2);
      let siling_3 = document.querySelectorAll("[id^='siling_3']"); console.log(siling_3);
      let siling_4 = document.querySelectorAll("[id^='siling_4']"); console.log(siling_4);
      let siling_5 = document.querySelectorAll("[id^='siling_5']"); console.log(siling_5);
      let siling_6 = document.querySelectorAll("[id^='siling_6']"); console.log(siling_6);
      let siling_7 = document.querySelectorAll("[id^='siling_7']"); console.log(siling_7);
      let siling_8 = document.querySelectorAll("[id^='siling_8']"); console.log(siling_8);
      let siling_9 = document.querySelectorAll("[id^='siling_9']"); console.log(siling_9);

      for(var i = 0; i < kewangan_negeri.length; i++)
      {
        //console.log(kewangan_negeri[i]);
        if(all_kos[i])
        {
          all_kos[i].value = number_format(kewangan_negeri[i].kos_data);
        }

        if(siling_0[i])
        {
          siling_0[i].value = number_format(kewangan_negeri[i].siling_yr1);
        }
        if(siling_1[i])
        {
          siling_1[i].value = number_format(kewangan_negeri[i].siling_yr2);
        }
        if(siling_2[i])
        {
          siling_2[i].value = number_format(kewangan_negeri[i].siling_yr3);
        }
        if(siling_3[i])
        {
          siling_3[i].value = number_format(kewangan_negeri[i].siling_yr4);
        }
        if(siling_4[i])
        {
          siling_4[i].value = number_format(kewangan_negeri[i].siling_yr5);
        }
        if(siling_5[i])
        {
          siling_5[i].value = number_format(kewangan_negeri[i].siling_yr6);
        }
        if(siling_6[i])
        {
          siling_6[i].value = number_format(kewangan_negeri[i].siling_yr7);
        }
        if(siling_7[i])
        {
          siling_7[i].value = number_format(kewangan_negeri[i].siling_yr8);
        }
        if(siling_8[i])
        {
          siling_8[i].value = number_format(kewangan_negeri[i].siling_yr9);
        }
        if(siling_9[i])
        {
          siling_9[i].value = number_format(kewangan_negeri[i].siling_yr10);
        }
      }
}


function checkperundingjumlahtapak(perundingjumlahid, thistextbox){
  //console.log("Perundng: "+perundingjumlahid);

  var listItemId = $(thistextbox).closest('tr');

  var manmonth = listItemId. find('td:eq(2) input[type="text"]'). val();
  var multiplier = listItemId. find('td:eq(3) input[type="text"]'). val();
  var salary = listItemId. find('td:eq(4) input[type="text"]'). val();
  var amount = listItemId. find('td:eq(5) input[type="text"]');

  
  var componentjumlahkos = listItemId. find('td:eq(1) input[type="text"]');
  manmonth = removecomma(manmonth);
  multiplier = removecomma(multiplier);
  salary = removecomma(salary);

  var totaljumlah = (manmonth*multiplier*salary).toFixed(2);

  if(isNaN(totaljumlah)){
    totaljumlah = 0
    
  } 
  
  amount.val(totaljumlah);

  componentjumlahkos.val((Math.ceil(totaljumlah  * 1000) / 1000).toFixed(2));
 
  let all_jumlah = document.querySelectorAll("[id^='"+perundingjumlahid+"']");
  let all_jumlah1 = document.querySelectorAll("[id^='perundingjumlahkostapak1']");
  let all_jumlah0 = document.querySelectorAll("[id^='perundingjumlahkostapak0']");
  

    if(all_jumlah1.length>0 || all_jumlah0.length>0){
      sumjumlah0=0
      sumjumlah1=0
      for(let k=1;k<all_jumlah0.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah0[k].value))){
          sumval = all_jumlah0[k].value
          sumval = removecomma(sumval);
          sumjumlah0+= sumval;
        }      
      }

      
      for(let k=1;k<all_jumlah1.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah1[k].value))){
          sumval = all_jumlah1[k].value
          sumval = removecomma(sumval);
          sumjumlah1+= sumval;
        }      
      }

      totaljumlah = sumjumlah0 + sumjumlah1;
      //console.log('Total cost is: '+totaljumlah)
      
      all_jumlah0[0].value = sumjumlah0.toFixed(2);
      all_jumlah1[0].value = sumjumlah1.toFixed(2);

      let yuran_jumlahkos = document.querySelector("[id^='yuranperunding_tapak_jumlahkos']");
      let yuran_kos_tapak = document.querySelector("[id^='kosperunding_tapak']");

      let ANGGARANKOS = document.getElementById("ANGGARANKOStapak");
      let imbuhanbalikkosval = document.getElementById("imbuhanbaliktapak");
      let ssttax = document.getElementById("perundingssttaxtapak");
     


      

      imbuhanbalikkos = imbuhanbalikkosval.value;

      imbuhanbalikkos = removecomma(imbuhanbalikkos);



      if(isNaN(imbuhanbalikkos)){
        imbuhanbalikkos = 0;
      }

      yuran_jumlahkos.value = totaljumlah.toFixed(2);

      yuran_kos_tapak.value = (totaljumlah + imbuhanbalikkos).toFixed(2);

      finalamount = (totaljumlah+imbuhanbalikkos)*6/100;

      ssttax.value = finalamount.toFixed(2);

      let perundingtapakjumlah = document.querySelector(".mainperundingtapakjumlah");
      let perundingtapaktempjumlah = document.querySelector(".tapak_temp_jumlahkos");
      
      
      ANGGARANKOS.value = (finalamount + totaljumlah).toFixed(2);

      if(perundingtapakjumlah){
        perundingtapaktempjumlah.value = ANGGARANKOS.value;
        perundingtapakjumlah.value = Math.ceil(ANGGARANKOS.value/1000)*1000;
      }     


      calculatejumlah_afterperunding();



      if(sumjumlah0 < totaljumlah){
        all_jumlah0[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah0 > totaljumlah){
        all_jumlah0[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah0[0].style="background: rgb(117,216,128)";
        
      }

      if(sumjumlah1 < totaljumlah){
        all_jumlah1[0].style="background: rgb(205, 192, 111)";
        
      }
      else if(sumjumlah1 > totaljumlah){
        all_jumlah1[0].style="background: rgb(212, 118, 118)";
       
      }
      else{
        all_jumlah1[0].style="background: rgb(117,216,128)";
        
      }


      
    }  
  
nf();
  
  
}
//**************************************************************************


var rujukan_link = document.querySelectorAll(".rujukan_link");
      rujukan_link.forEach((item) => {
        item.addEventListener("click", () => {
          const api_url = "{{env('API_URL')}}";  //console.log(api_url);
          
     
      $.ajax({
              type: "GET",
              
              url: api_url+"api/project/getcalculation-details",
              dataType: 'json',
              success: function (result4) { 
                  
                  if (result4) {
                    
                    $("#rujukantable").empty();

                    $.each(result4.data, function (key, item) {
                      //console.log("Length : "+item.total_cost);
                      let rujukantablerow = `<tr>
                    <td class="">`+number_format(item.total_cost)+`</td>
                    <td>
                      `+item.P_max+`
                    </td>
                    <td>`+item.P_min+`</td>
                  </tr>`;
                  $("#rujukantable").append(rujukantablerow);
                        
                              
                      })
                    
                    

                    
                                  
                  }else {
                      $.Notification.error(result.Message);
                  }
                }
              });

          $("#rujukan_modal").modal("show");
        });
      });
      // window.onload = ()=>{
      //     $('#dokumen_modal').modal('show')
      // }
  


</script>
    