@section('scripts')
<!-- <script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script> -->
<!-- <link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet"/> -->
<!-- <script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script> -->
<script src="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.js') }}"></script>
<link href="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.css') }}" rel="stylesheet"/>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<script>
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

  //   document.addEventListener('DOMContentLoaded', function() {
  //   // Get references to the select element and the link
  //   const sdgSelect = document.getElementById('obb_sdg');
  //   const link = document.getElementById('seterusnya');

  //   // Add an event listener to the select element
  //   sdgSelect.addEventListener('change', function() {
  //     // Check if the selected value is not equal to 0 (SDG is selected)
  //     if (sdgSelect.value == '0') {
        
  //       // Enable the link and set the correct href
  //       document.getElementById("sdg_error").style.color = 'red'
  //       document.getElementById("sdg_error").style.display = 'block'
  //       document.getElementById("sdg_error").innerHTML = 'Sila lengkapkan bahagian ini'
  //       sdgSelect.focus();
  //     } else{
  //       link.href = "{{ route('daftar.section', [$id, $status, $user_id, 'output']) }}";
  //     }
  //   });

  //   // Initial check in case the SDG is pre-selected
  //   if (sdgSelect.value !== '0') {
  //     link.href = "{{ route('daftar.section', [$id, $status, $user_id, 'output']) }}";
  //   } else {
     
  //     document.getElementById("sdg_error").style.color = 'red'
  //       document.getElementById("sdg_error").innerHTML = 'Sila lengkapkan bahagian ini'
  //       sdgSelect.focus();
  //       link.href = "#";
  //   }
  // });

var numsdg=0;
var options = '';
var active_options = '';
var optionindikatori=[];
var indioptions=[]
var currentindicatorslabels="";
var isSDGDuplicate=-1;
var pilihan_buttons = [];

$(document).ready(function() {
  $("#seterusnya").click(function() {
    var sdgSelect = document.getElementById('obb_sdg');

    if(sdgSelect.value == 0) {
      $('#sdg_error').show();
      document.getElementById("sdg_error").style.color = 'red'
      document.getElementById("sdg_error").innerHTML = 'Sila lengkapkan bahagian ini'
      document.getElementById("sdg_error").focus();
      this.href = "#";
    } else {
      this.href = "{{ route('daftar.section', [$id, $status, $user_id, 'output']) }}";
    }
  });

  //$('#Sasaran').multiselect();
  

  $('#Sasaran').multiselect({
      // includeSelectAllOption: true,
      selectedOptions : ' pilihan',
      search : true,
      columns: 1,
      placeholder: '--Pilih--',
      //selectAll : true,
  });

  $('#Indikatori').multiselect({
      // includeSelectAllOption: true,
      selectedOptions : ' pilihan',
      search : true,
      columns: 1,
      placeholder: '--Pilih--',
      //selectAll : true,
  });

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
        let projectType = localStorage.getItem("project_type");  console.log("project type ->" + projectType);
        let penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1);
        let penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2);
        let pengesah =  {{$pengesah}}; console.log(pengesah);

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

  $.ajaxSetup({
        headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
              }
  });

  


                


                

  


  //----to fetch OBB Activity------------------------

    // var obbaktivity =  document.getElementById("obb_aktivity");
    // $.ajax({
    //     type: "GET",
        
    //     url: api_url+"api/project/aktivity-details",
    //     dataType: 'json',
    //     success: function (result4) { 
    //         // console.log(result)
    //         if (result4) {
              
    //           $.each(result4.data, function (key, item) {
    //             var opt = item.id;
    //             var el = document.createElement("option");
    //             el.textContent = item.nama_aktivity;
    //             el.value = opt;
    //             obbaktivity.appendChild(el);
    //           })
            
    //   }
            
    //   else {
    //             $.Notification.error(result.Message);
    //         }
        
    //   },
    //   error: function(error) {
    //     // handle error
    //     $("div.spanner").removeClass("show");
    //     $("div.overlay").removeClass("show");
    //   }
    // });
  //------OBB activity fetch ends--------------------------------------------

  
    

    $('#obb_aktivity').change(function() {
        var cmbstrategi =  document.getElementById("obb_aktivity");
        $.ajax({
            type: "GET",            
            url: api_url+"api/project/aktivity-details/"+$('#obb_aktivity').val(),
            dataType: 'json',
            success: function (result) { 
                 console.log(result)
                if (result) {
                    document.getElementById('txtobbaktivity').value=result.data.obb_aktiviti;
                    document.getElementById('txtobbprogram').value=result.data.obb_program;
                    
            }
          }
                
          
        });
    });

    $("#simpan").click(function(){
      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");
      var Permohonan_Projek_id=$("#project_id").val(); 

      
      var Pemangkin_Dasar=$("#txtstrategiTemaPemangkinDasar").val(); 
      var Bab=$("#txtstrategibab").val(); 
      var Bidang_Keutamaan=$("#txtstrategiBidangKeutamaan").val(); 
      var Outcome_Nasional=$("#txtstrategiOutcomeNasional").val(); 
      var Strategi=$("#hiddenstrategi").val(); 
      var OBB_Program=$("#txtobbprogram").val(); 
      var OBB_Aktiviti=$("#txtobbaktivity").val(); 
      var OBB_Output_Aktiviti_id=$("#obb_aktivity").val(); 
      var SDG_id = 0;

      var formData = new FormData();
      //var formDatasdg = new FormData();
      
      let maincomponentrows = document.querySelectorAll(".newsdg");
      let all_obb_sdg = document.querySelectorAll("[id='obb_sdg']");
      let all_Sasaran = document.querySelectorAll("[id='Sasaran']");
      let all_Indikatori = document.querySelectorAll("[id='Indikatori']");
      
      
      let all_Sasaran_multiselect = document.querySelectorAll(".multiselect_sasaran");

      let all_Indikatori_multiselect = document.querySelectorAll(".multiselect_indikator");

      
      

      sdgcomponents = []  
      for (var i = 0;i < maincomponentrows.length; i++) {                         
        

        let all_Sasaran = all_Sasaran_multiselect[i].querySelectorAll("input[id^='ms-opt-']");
        let all_Indikatori = all_Indikatori_multiselect[i].querySelectorAll("input[id^='ms-opt-']");
        
        for(m=0;m<all_Sasaran.length;m++){
          if(all_Sasaran[m].checked){
            data= {};
            data.SDG_id = all_obb_sdg[i].value;
            data.Sasaran_id = all_Sasaran[m].value;
            data.Indikatori_id = 0;
            sdgcomponents.push(JSON.stringify(data))
          }
          
        }
      }


      sdgindikators = []  
      for (var k = 0;k < maincomponentrows.length; k++) {                         
        

        //let all_Sasaran = all_Sasaran_multiselect[i].querySelectorAll("input[id^='ms-opt-']");
        let all_Indikatori = all_Indikatori_multiselect[k].querySelectorAll("input[id^='ms-opt-']");
        
        for(m=0;m<all_Indikatori.length;m++){
          if(all_Indikatori[m].checked){
            data= {};
            data.SDG_id = all_obb_sdg[k].value;
            //data.Sasaran_id = all_Sasaran[m].value;
            data.Indikatori_id = all_Indikatori[m].value;
            sdgindikators.push(JSON.stringify(data))
          }
          
        }
      }

      sdgcomponents.forEach((item) => {
        formData.append('sdgcomponents[]', item);
    });

    sdgindikators.forEach((item) => {
        formData.append('sdgindikators[]', item);
    });
   
      formData.append("permohonan_projek_id",Permohonan_Projek_id);

      formData.append('user_id', {{Auth::user()->id}})
      formData.append("id",Permohonan_Projek_id);
      formData.append("Pemangkin_Dasar", Pemangkin_Dasar);
      formData.append("Bab", Bab);
      formData.append("Bidang_Keutamaan", Bidang_Keutamaan);
      formData.append("Outcome_Nasional", Outcome_Nasional);
      formData.append("Strategi", Strategi);
      formData.append("OBB_Program", OBB_Program);
      formData.append("OBB_Aktiviti", OBB_Aktiviti);
      formData.append("OBB_Output_Aktiviti_id", OBB_Output_Aktiviti_id);
      formData.append("SDG_id", SDG_id);
      
      var api_token = "Bearer "+ window.localStorage.getItem('token');
        axios({

            method: 'POST',
            url: api_url+"api/project/rmkobbpage-details/"+$('#project_id').val(),
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
              $("#add_role_sucess_modal").modal('show');

                  // $("#vms_modal").modal('show')
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
    })

   

  //------Simpan ends--------------------------------------------------

  // -----Fetch starts-----------------------------------------------------

sdgdetails = ""
allsdg=""
    
      $.ajax({
          type: "GET",
          url: api_url+"api/project/rmkobbpage-details/"+$('#getrmkdetails').val(),
          dataType: 'json',
          success: function (result) { 
              
              if (result) { 
                sdgdetails = result.data.sdg;
                rmkpage = result.data.rmkpage;
                allsdg = result.data.allsdg;
                alldistinctsdg = result.data.all_distinct_sdg;
                allrmkindicators = result.data.indikatori;
                allsasarans = result.data.all_sasarans;
                allindikators = result.data.all_indikators;
                allactivity = result.data.activity;

                if(allactivity){
                  var obbaktivity =  document.getElementById("obb_aktivity");
                  $.each(allactivity, function (key, item) {
                    if(rmkpage){
                      var opt = item.id;
                      var el = document.createElement("option");
                      el.textContent = item.nama_aktivity;
                      el.value = opt;
                      obbaktivity.appendChild(el);  
                    }
                    else{
                      if(item.row_status == 1){
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_aktivity;
                        el.value = opt;
                        obbaktivity.appendChild(el);
                      }
                    }
                  })
                }

                let strateginame=""
                let sid = 0
                if(rmkpage){

                  document.getElementById("obb_aktivity").value= parseInt(rmkpage.OBB_Output_Aktiviti_id);
                  sid=rmkpage.Strategi;

                  const api_url = "{{env('API_URL')}}";  console.log(api_url);
                  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);     

                    
                  $.ajax({
                      type: "GET",            
                      url: api_url+"api/project/strategi-details/"+sid,
                      dataType: 'json',
                      success: function (result1) { 
                        
                          if (result1) {
                            document.getElementById("txtstrategi").value= result1.data.nama_strategi;
                      }
                    }
                  });
                          
                    document.getElementById("txtstrategiTemaPemangkinDasar").value= rmkpage.Pemangkin_Dasar;                
                    document.getElementById("txtstrategibab").value=rmkpage.Bab;
                    document.getElementById("txtstrategiBidangKeutamaan").value= rmkpage.Bidang_Keutamaan;
                    document.getElementById("txtstrategiOutcomeNasional").value= rmkpage.Outcome_Nasional;
                    document.getElementById("hiddenstrategi").value= parseInt(rmkpage.Strategi);
                    document.getElementById("txtstrategi").value= strateginame;                 
                    document.getElementById("txtobbprogram").value= rmkpage.OBB_Program;
                    document.getElementById("txtobbaktivity").value= rmkpage.OBB_Aktiviti;
                  }
                
                else{
                  sid=0;
                }

                $.each(allsdg, function(key, item) {
                  var nama_sdg = item.nama_sdg;
                  var item_name = nama_sdg.substring(0,135);
                  options = options + '<option value="' + item.id + '">' + item_name + '</option>';
                  if(item.is_active == 1){
                    console.log("this is active: "+item.id+" "+item.is_active);
                    active_options = active_options + '<option value="' + item.id + '">' + item_name + '</option>';
                  }
                  
                })

                if(alldistinctsdg.length>0){                    
              
                  if(alldistinctsdg.length > 0) {
                    $('#sdgcontainer').empty();
                    alldistinctsdg.forEach((item) => {
                      numsdg+=1;
                      let sdg_tr = `<div class="brief_project_content_container container_sdg px-0 newsdg p-3 mt-5" style="border: 1px lightgrey solid;">
                                      <div class="row">
                                        <div class="col-12">
                                          <button type="button" id="sdg_button" style="background:transparent;border:none; float: right;">
                                            <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <div class="input_container mb-4">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="SDG" class="col-md-2 col-xs-12 pl-0">SDG <sup>*</sup></label>
                                          <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                                            <select class="form-control sdg_`+numsdg+`" id="obb_sdg" onchange="getsasaran(`+numsdg+`);" @if($is_submitted) disabled @endif>
                                              <option value="0">--Pilih--</option>
                                              `+options+`                          
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="input_container mb-4">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="Sasaran" class="col-md-2 col-xs-12 pl-0">Sasaran <sup>*</sup></label>
                                          <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0 multiselect_sasaran" id="multiselect_`+numsdg+`">
                                          
                                            <select class="form-control sasaran_`+numsdg+`" name="Sasaran[]" id="Sasaran" @if($is_submitted) disabled @endif>
                                                                    
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="input_container mb-4">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="Indikatori" class="col-md-2 col-xs-12 pl-0">Indikator <sup>*</sup></label>
                                          <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0 multiselect_indikator" id="multiselect_indi_`+numsdg+`">
                                            <select class="form-control indikatori_`+numsdg+`" name="Indikatori" multiple id="Indikatori" @if($is_submitted) disabled @endif> 
                                                                      
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="input_container">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="" class="col-md-2 col-xs-12 pl-0">Sasaran dipilih:</label>
                                          <div class="col-md-10 col-xs-12 pl-0">
                                            <div id="sasaranlabel_`+numsdg+`" style="overflow: auto; height: 100px; background-color:#ffffff ;border: 1px solid #aaa;border-radius: 5px; padding: 10px;"></div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="input_container">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="" class="col-md-2 col-xs-12 pl-0">Indikator dipilih:</label>        
                                          <div class="col-md-10 col-xs-12 pl-0">
                                            <div id="indikatorilabel_`+numsdg+`" style="overflow: auto; height: 100px; background-color:#ffffff ;border: 1px solid #aaa;border-radius: 5px; padding: 10px;"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>`;
                        $("#sdgcontainer").append(sdg_tr);
                        

                    })

                    let all_sdg_btn = document.querySelectorAll(
                        "[id='sdg_button']"                    
                    ); 

                    let all_sdg_div = document.querySelectorAll(".container_sdg");               
                    all_sdg_btn.forEach((tb, i) => {                    
                        tb.addEventListener("click", () => {
                          all_sdg_div[i].remove();                        
                        });
                    });
                  }

                  let fetchmaincomponentrows = document.querySelectorAll(".newsdg");
                  let fetchall_obb_sdg = document.querySelectorAll("[id='obb_sdg']");
                  let fetchall_Sasaran = document.querySelectorAll("[id='Sasaran']");
                  let fetchall_Indikatori = document.querySelectorAll("[id='Indikatori']");                  

                  if(fetchmaincomponentrows.length>0){
                    
                    for (var i = 0;i < fetchmaincomponentrows.length; i++) { 
                      currentsasaranslabels=""
                      currentindicatorslabels=""
                      makemultiselect(i+1);                        
                      sasaranoptions=[]
                      indikatorsoptions=[]
                      sdgid=parseInt(alldistinctsdg[i]['SDG_id']);
                      sasaranid = parseInt(sdgdetails[i]['Sasaran_id']);
                      indikatoriid = parseInt(sdgdetails[i]['Indikatori_id']);

                      sasaranlenght=0;
                      indikatorilength=0;
                      
                      fetchall_obb_sdg[i].value=sdgid;
                      
                      for(j=0;j<allsasarans.length;j++){
                        if(allsasarans[j].SDG_id == sdgid){

                          data = {}
                                  
                          data.name = allsasarans[j].Sasaran;
                          data.value = allsasarans[j].id;
                          
                          data.checked = false;
                          

                          for(m=0;m<sdgdetails.length;m++){

                                if(sdgdetails[m]['Sasaran_id'] == allsasarans[j].id){
                                  data.checked = true;
                                  sasaranlenght++;
                                  currentsasaranslabels += '<p style="font-size: 0.7rem;">'+allsasarans[j].Sasaran + "</p>"
                                }
                                
                          }
                          sasaranoptions.push(data)
                        }
                        
                      }

                      
                      for(j=0;j<allindikators.length;j++){
                        if(allindikators[j].SDG_id == sdgid){

                          data = {}
                                  
                          data.name = allindikators[j].Indikatori;
                          data.value = allindikators[j].id;
                          
                          data.checked = false;
                          

                          for(m=0;m<allrmkindicators.length;m++){

                                if(allrmkindicators[m]['Indikatori_id'] == allindikators[j].id){
                                  data.checked = true;
                                  indikatorilength++;
                                  currentindicatorslabels += '<p style="font-size: 0.7rem;">'+allindikators[j].Indikatori + "</p>"
                                  
                                }
                                
                          }
                          indikatorsoptions.push(data)
                        }
                        
                      }

                      var cmbsasaran =  document.querySelector(".sasaran_"+(i+1));
                      document.getElementById("sasaranlabel_"+(i+1)).innerHTML=currentsasaranslabels;
                      

                      var cmbindikatori =  document.querySelector(".indikatori_"+(i+1));
                      document.getElementById("indikatorilabel_"+(i+1)).innerHTML=currentindicatorslabels;

                      
                      $(cmbsasaran).multiselect('loadOptions', sasaranoptions);
                      var selectedtext = $("#multiselect_"+(i+1)).find('button:first-child');
                      selectedtext[0].innerText = sasaranlenght + " pilihan";

                      $(cmbindikatori).multiselect('loadOptions', indikatorsoptions);
                      selectedtext = $("#multiselect_indi_"+(i+1)).find('button:first-child');
                      selectedtext[0].innerText = indikatorilength + " pilihan";

                      bindevents(i)
                      bindeventsindi(i)

                    }

                    


                    
                      
                      //fetchsasaran(sdgid,i,sasaranid);

                } 
              } 
              else{
                fetchall_obb_sdg = document.querySelectorAll("[id='obb_sdg']");
                numsdg+=1;


                //-------------to fetch SDG--------------------
                var obbsdgget =  fetchall_obb_sdg[0];
                $.ajax({
                    type: "GET",        
                    url: api_url+"api/project/sdg-details",
                    dataType: 'json',
                    success: function (result3) { 
                        //console.log(result)
                        if (result3) {
                            $.each(result3.data, function (key, item) {
                              //console.log(item.id);
                              var opt = item.id;
                              var el = document.createElement("option");
                              // el.textContent = item.nama_sdg;
                              var nama_sdg = item.nama_sdg;
                              el.textContent = nama_sdg.substring(0,135);
                              
                              // var result = '';
                              // while (nama_sdg.length > 0) {
                              //   result += nama_sdg.substring(0, 130) + '<br>';
                              //   nama_sdg = nama_sdg.substring(130);
                              // }
                              // el.textContent = result;

                              el.value = opt;
                              obbsdgget.appendChild(el);
                            })
                        }
                        else {
                          $.Notification.error(result.Message);
                        }
                          
                      },
                      error: function(error) {
                        // handle error
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                      }
                  });
              //-------SDG Fetch ends---------------------------------------

              }
            }
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          },
          error: function(error) {
            // handle error
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          }
      });
      //*************************To initialize the table**************** */

      $("#strategibtn").click(function(){

        
          //var cmbstrategi =  document.getElementById("strategi");
          $.ajax({
              type: "GET",
              
              url: api_url+"api/project/strategi-details",
              dataType: 'json',
              success: function (response) {  
                // console.log(response.data)  
                if ( $.fn.dataTable.isDataTable( '#tableData' ) ) {
                  tabledata = $('#tableData').DataTable();
                }  
                else{

                     
              tabledata=$('#tableData').DataTable({
              data: response.data,

              "aaSorting": [],
              
              "info": false,
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada apa-apa ditemui - maaf",
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
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                data = '<input type = "radio" value="'+row.id+'" class="strategi_id" name="s" id="s" onClick="getstrategi('+row.id+')" style="cursor: pointer;" class="text-secondary user_name"></label>';
                              }
                              return data;
                          }
                      },
                      {
                          targets:1, // Start with the last
                          render: function ( data, type, row, meta ) {
                              if(type === 'display'){
                                      data = '<p>'+row.Tema_Pemangkin_Dasar+'</p><p>'+row.Bab+'</p><p>'+row.Bidang_Keutamaan+'</p><p>'+row.Outcome_Nasional+'</p>'+'</p><p>'+row.nama_strategi+'</p>'
                                      
                              }
                              return data;
                          }
                      },
                      
                  ] ,
              columns: [
                  { data: 'id' },
                  // { data: 'nama_strategi'}, 
                  {
                        targets:1,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jabatan.length)
                            if(row.nama_strategi.length==0){
                                data="";
                            }else{
                                data='<p>'+row.Tema_Pemangkin_Dasar+'</p><p>'+row.Bab+'</p><p>'+row.Bidang_Keutamaan+'</p><p>'+row.Outcome_Nasional+'</p>'+'</p><p>'+row.nama_strategi+'</p>';
                            }
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

            }
              
          }
          });

      });

      //******************************end table******************************* */

  });

  $(".add_subrow").bind("click", function () {
                  
    numsdg+=1;
                      let sdg_tr = `<div class="brief_project_content_container container_sdg px-0 newsdg p-3 mt-5" style="border: 1px lightgrey solid;">
                                      <div class="row">
                                        <div class="col-12">
                                          <button type="button" id="sdg_button" style="background:transparent;border:none; float: right;">
                                            <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <div class="input_container mb-4">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="SDG" class="col-md-2 col-xs-12 pl-0">SDG <sup>*</sup></label>
                                          <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0">
                                            <select class="form-control sdg_`+numsdg+`" id="obb_sdg" onchange="getsasaran(`+numsdg+`);" @if($is_submitted) disabled @endif>
                                              <option value="0">--Pilih--</option>
                                              `+active_options+`                          
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="input_container mb-4">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="Sasaran" class="col-md-2 col-xs-12 pl-0">Sasaran <sup>*</sup></label>
                                          <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0 multiselect_sasaran" id="multiselect_`+numsdg+`">
                                          
                                            <select class="form-control sasaran_`+numsdg+`" name="Sasaran[]" multiple id="Sasaran" @if($is_submitted) disabled @endif>
                                                                    
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="input_container mb-4">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="Indikatori" class="col-md-2 col-xs-12 pl-0">Indikator <sup>*</sup></label>
                                          <div class="form-group input_form_group m-0 col-md-10 col-xs-12 pl-0 multiselect_indikator" id="multiselect_indi_`+numsdg+`">
                                            <select class="form-control indikatori_`+numsdg+`" name="Indikatori" multiple id="Indikatori" @if($is_submitted) disabled @endif> 
                                                                      
                                            </select>
                                            
                                          </div>
                                        </div>
                                      </div>
                                      <div class="input_container">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="" class="col-md-2 col-xs-12 pl-0">Sasaran dipilih:</label>
                                          <div class="col-md-10 col-xs-12 pl-0">
                                            <div id="sasaranlabel_`+numsdg+`" style="overflow: auto; height: 100px; background-color:#ffffff ;border: 1px solid #aaa;border-radius: 5px; padding: 10px;"></div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="input_container">
                                        <div class="input_fill_content row m-0 align-items-center">
                                          <label for="" class="col-md-2 col-xs-12 pl-0">Indikator dipilih:</label>        
                                          <div class="col-md-10 col-xs-12 pl-0">
                                            <div id="indikatorilabel_`+numsdg+`" style="overflow: auto; height: 100px; background-color:#ffffff ;border: 1px solid #aaa;border-radius: 5px; padding: 10px;"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>`;
                        $("#sdgcontainer").append(sdg_tr);

                        let all_sdg_btn = document.querySelectorAll(
                            "[id='sdg_button']"                    
                        ); 

                        let all_sdg_div = document.querySelectorAll(".container_sdg"); 

                  
                        all_sdg_btn.forEach((tb, i) => {                    
                            tb.addEventListener("click", () => {
                              all_sdg_div[i].remove();                        
                            });
                        });

                        makemultiselect(numsdg);
                        
               });

  function getstrategi(strategiid){

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');
    

    var cmbstrategi =  document.getElementById("strategi");
        $.ajax({
            type: "GET",            
            url: api_url+"api/project/strategi-details/"+strategiid,
            dataType: 'json',
            success: function (result) { 
                 console.log(result)
                if (result) {
                    document.getElementById('txtstrategibab').value=result.data.Bab;
                    document.getElementById('txtstrategiBidangKeutamaan').value=result.data.Bidang_Keutamaan;
                    document.getElementById('txtstrategiOutcomeNasional').value=result.data.Outcome_Nasional;
                    document.getElementById('txtstrategiTemaPemangkinDasar').value=result.data.Tema_Pemangkin_Dasar;
                    document.getElementById('txtstrategi').value=result.data.nama_strategi;
                    document.getElementById('hiddenstrategi').value=strategiid;
                    $("#add_rmk_data_modal").modal('hide')
            }
          }   
          
        });

  }

  function makemultiselect(rowno){

    let all_Sasaran = document.querySelector('.sasaran_'+rowno); 
    let all_Indikatori = document.querySelector('.indikatori_'+rowno);

    $(all_Sasaran).multiselect({
      // includeSelectAllOption: true,
      selectedOptions : ' pilihan',
      search : true,
      columns: 1,
      placeholder: '--Pilih--',
      //selectAll : true,
  });
  $(all_Indikatori).multiselect({
      // includeSelectAllOption: true,
      selectedOptions : ' pilihan',
      search : true,
      columns: 1,
      placeholder: '--Pilih--',
      //selectAll : true,
  });

  }

  function getsasaran(sdgno){


    const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    var sdg =   document.querySelector(".sdg_"+sdgno);
    var obbsdgvalue =  parseInt(sdg.value);

      var cmbsasaran =  document.querySelector(".sasaran_"+sdgno);
      var indikatoricmb = document.querySelector(".indikatori_"+sdgno);
      $(cmbsasaran).empty();
      //$(indikatoricmb).empty();
      $.ajax({
        type: "GET",
        
        url: api_url+"api/project/active-sasaran-details/"+obbsdgvalue,
        dataType: 'json',
        success: function (result) { 

             console.log("Sasaran"+result.data)
             sasaranoptions=[];
            if (result) {
              
                
                $.each(result.data, function (key, item) {
                  
                  data = {}
                  data.name = item.Sasaran;
                  data.value = item.id;
                  // data.disabled = false
                  // data.checked = true;
                  sasaranoptions.push(data)
          
                
                })

                $(cmbsasaran).multiselect('loadOptions', sasaranoptions);
                bindevents(sdgno-1);
                

            
      }else {
                $.Notification.error(result.Message);
            }
                    
      }
    });
  }
// ---------------------------------------------------------------------------------------------------------
function bindevents(sdgno){

  cmbsasaran1 =  document.getElementById("multiselect_"+(sdgno+1)).querySelectorAll("input[id^='ms-opt-']");  
  
  cmbsasaran1.forEach((minus) => {
    
    $(minus).bind("click", () => {

      const api_url = "{{env('API_URL')}}";  console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
      
      indioptions = new Array();
      currentsasaran_id=[];
      currentindilables=""
      currentsasarans =  document.getElementById("multiselect_"+(sdgno+1)).querySelectorAll("input[id^='ms-opt-']");
      var currentsasaranslabels="";

      for(i=0;i<currentsasarans.length;i++){
        if(currentsasarans[i].checked){
          currentsasaran_id.push(currentsasarans[i].value)
          currentsasaranslabels += '<p style="font-size: 0.7rem;">'+currentsasarans[i].title + "</p>"
        }
      }
      document.getElementById("sasaranlabel_"+(sdgno+1)).innerHTML = currentsasaranslabels;
      currentindi = document.getElementById("multiselect_indi_"+(sdgno+1)).querySelectorAll("input[id^='ms-opt-']");
      currentindi_id=[];
      if(currentindi.length>0){
        for(i=0;i<currentindi.length;i++){
          if(currentindi[i].checked){
            currentindi_id.push(currentindi[i].value)

          }
        }
      }

      

      currentindikatori = document.querySelector(".indikatori_"+(sdgno+1))

      if(currentsasaran_id.length<=0){
       $(currentindikatori).multiselect('reload');
       //return false;
      }
    
      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");
        
        //setsasarans(item);
        $.ajax({
            type: "GET",
            url: api_url+"api/project/active-indikatori-details/"+currentsasaran_id,
            dataType: 'json',
            success: function (result2) { 

              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");

              
              if (result2) {
                
                $.each(result2.data.all_indikators, function (key, item1) {            
                  //console.log("TTTTTT: "+item1.Indikatori)    
                  data = {}
                  data.name = item1.Indikatori;
                  data.value = item1.id;
                  data.checked=false;
                  for(i=0;i<currentindi_id.length;i++){
                    if(currentindi_id[i] == item1.id){
                      data.checked=true;
                    }
                  }
                  indioptions.push(data)
                  console.log("api each: "+indioptions);
                    
                
                })  
                $(currentindikatori).multiselect('reload');                
                $(currentindikatori).multiselect('loadOptions', indioptions);
                bindeventsindi(sdgno);
                var selectedtext = $("#multiselect_"+(sdgno+1)).find('button:first-child');
                selectedtext[0].innerText = currentsasaran_id.length + " pilihan";

              }else {
                    $.Notification.error(result.Message);
              }
              
            }
        });
      
    });
  });



}
// --------------------------------------------------------------------------------------------------------
function setsasarans(item){
  const api_url = "{{env('API_URL')}}";  console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
  $.ajax({
      type: "GET",
      
      url: api_url+"api/project/indikatori-details/"+parseInt(item),
      dataType: 'json',
      success: function (result2) { 
        
        if (result2) {
          indioptions=setindikatoris(result2,currentindi_id);
          
          $(currentindikatori).multiselect('loadOptions', indioptions);
        }else {
              $.Notification.error(result.Message);
        }
        
      }
  });
}
// --------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------

function setindikatoris(result2,currentindi_id){
  indioption=[]
  $.each(result2.data, function (key, item1) {            
                    
    data = {}
    data.name = item1.Indikatori;
    data.value = item1.id;
    data.checked=false;
    for(i=0;i<currentindi_id.length;i++){
      if(currentindi_id[i] == item1.id){
        data.checked=true;
      }
    }
    indioption.push(data)
    console.log("api each: "+indioption);
  })

  return indioption;   

}
// ---------------------------------------------------------------------------------------------------------
function bindeventsindi(sdgno){

  cmbindikators =  document.getElementById("multiselect_indi_"+(sdgno+1)).querySelectorAll("input[id^='ms-opt-']");
console.log('already set');
  cmbindikators.forEach((cmbindi) => {
    $(cmbindi).bind("click", () => {
      
      temp = setpilihan(sdgno);
      setTimeout(pilihan, 500);
      //bindeventsindi(sdgno);
    });
  });
              
}

function pilihan()
{
  for (let key in pilihan_buttons) {
    console.log(key, pilihan_buttons[key]);
  selectedtext = $("#multiselect_indi_"+(key)).find('button:first-child');
  selectedtext[0].innerText = pilihan_buttons[key] + " pilihan";
  }
}

function setpilihan(sdgno){
  indioption1=[]
  currentindikatori = document.querySelector(".indikatori_"+(sdgno+1))
  indikatorilength=0;
  currentindi =  document.getElementById("multiselect_indi_"+(sdgno+1)).querySelectorAll("input[id^='ms-opt-']");
  var currentindilabels="";

  for(i=0;i<currentindi.length;i++){

    data = {}
    data.name = currentindi[i].title;
    data.value = currentindi[i].value;
    data.checked=false;
    
    

    if(currentindi[i].checked){
      indikatorilength++;
      data.checked=true;
      currentindilabels += '<p style="font-size: 0.7rem;">'+currentindi[i].title + "</p>"
    }

    indioption1.push(data)
  }
  //$(currentindikatori).multiselect('reload');
  
  

  document.getElementById("indikatorilabel_"+(sdgno+1)).innerHTML = currentindilabels;
  // $(currentindikatori).multiselect('loadOptions', indioption1);
  
  selectedtext = $("#multiselect_indi_"+(sdgno+1)).find('button:first-child');
  selectedtext[0].innerText = indikatorilength + " pilihan";
  console.log(selectedtext);
  pilihan_buttons[sdgno+1] = indikatorilength
  return selectedtext
  

   //bindeventsindi(sdgno);

  // selectedtext = $("#multiselect_indi_"+(sdgno+1)).find('.ms-options-wrap').find('.ms-options');
  // selectedtext[0].display = 'inline';

  //console.log("hello")
}
// ---------------------------------------------------------------------------------------------------------
  function sasaranlabels(rowno){   

    currentsasarans =  document.getElementById("multiselect_"+sdgno).querySelectorAll("input[id^='ms-opt-']");
    var currentsasaranslabels="";

    for(i=0;i<currentsasarans.length;i++){
      if(currentsasarans[i].checked){
        currentsasaranslabels += currentsasarans[i].title + ":: "
      }
    }

  }
  
  
  function fetchsasaran(sdgno, i,sasaranid){

    isSDGDuplicate = sdgno;
    currentsasaranslabels="";


    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
  
    let fetchall_obb_sdg = document.querySelectorAll("[id='obb_sdg']");
    let fetchall_Sasaran = document.querySelectorAll("[id='Sasaran']");
    let fetchall_Indikatori = document.querySelectorAll("[id='Indikatori']");
  
    var cmbsasaran =  fetchall_Sasaran[i];
    var indikatoricmb = fetchall_Indikatori[i];

    $(cmbsasaran).multiselect({
        // includeSelectAllOption: true,
        selectedOptions : ' pilihan',
        search : true,
        columns: 1,
        placeholder: '--Pilih--',
        //selectAll : true,
    });
    $(indikatoricmb).multiselect({
        // includeSelectAllOption: true,
        selectedOptions : ' pilihan',
        search : true,
        columns: 1,
        placeholder: '--Pilih--',
        //selectAll : true,
    });
  
  var formData = new FormData();
  var Permohonan_Projek_id=$("#project_id").val();

  formData.append('permohonan_projek_id', Permohonan_Projek_id)
  formData.append('SDG_id', sdgno)
  sasarandetails=""

  sasarandetails = setfetchsasaran(sdgno,Permohonan_Projek_id)
  
  axios({
    type: "GET",
    
    url: api_url+"api/project/sasaran-details/"+sdgno,
    dataType: 'json',
  })
  .then(function (result) { 
    
    if (result) {
      currentsasaranslabels="";
      options2=[];
        
      $.each(result.data.data, function (key, item) {
        
        data = {}
        data.name = item.Sasaran;
        data.value = item.id;
        data.checked = false;
        for(l=0;l<sasarandetails.length;l++){
          if(item.id == sasarandetails[l].Sasaran_id){
            currentsasaranslabels += '<p style="font-size: 0.7rem;">'+item.Sasaran + "</p>"
            data.checked = true;
            fetchindikatori(i,sasarandetails[l].Sasaran_id,sdgno)
          }
        }

        options2.push(data)
      })
      $(cmbsasaran).multiselect('loadOptions', options2);
      
      document.getElementById("sasaranlabel_"+(i+1)).innerHTML=currentsasaranslabels;
      
    }else {
        $.Notification.error(result.Message);
    }
    
  });
  bindevents(i);
}

function setfetchsasaran(sdgno,Permohonan_Projek_id)
{
  const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

  axios.defaults.headers.common["Authorization"] = api_token

  sasarandetails=""
  axios({
  // $.ajax({
    type: "GET",
    
    url: api_url+"api/project/rmk-sasaran-details/"+sdgno+"/"+Permohonan_Projek_id,
    dataType: 'json',
  })
    .then(function (result) { 
    // success: function (result) { 
        
        if (result) {
          sasarandetails = result.data.data.sasaran;
          return sasarandetails;
        }
    
  })
  
}
function fetchindikatori(i,sasaranid,sdg_id){
 
  const api_url = "{{env('API_URL')}}";
  const api_token = "Bearer "+ window.localStorage.getItem('token');
  
  let fetchall_obb_sdg = document.querySelectorAll("[id='obb_sdg']");
  let fetchall_Sasaran = document.querySelectorAll("[id='Sasaran']");
  let fetchall_Indikatori = document.querySelectorAll("[id='Indikatori']");

  var cmbindikatoriget =  fetchall_Indikatori[i];

  indikatoridetails=""
  var Permohonan_Projek_id=$("#project_id").val();

  indikatoridetails = setfetchindi(sdg_id,Permohonan_Projek_id)
  
  $.ajax({
      type: "GET",
      
      url: api_url+"api/project/indikatori-details/"+parseInt(sasaranid),
      dataType: 'json',
      success: function (result2) { 
       
          
          if (result2) {
            if(isSDGDuplicate != sdg_id){
              isSDGDuplicate = sdg_id;
              optionindikatori=new Array();
              currentindicatorslabels="";
            }
            
            $.each(result2.data, function (key, item) {
              
              data = {}
              data.name = item.Indikatori;
              data.value = item.id;
              data.checked = false;
              for(l=0;l<indikatoridetails.length;l++){
                if(item.id == indikatoridetails[l].Indikatori_id){
                  currentindicatorslabels += '<p style="font-size: 0.7rem;">'+item.Indikatori + "</p>"
                  data.checked = true;
                }
              }

              optionindikatori.push(data)
            })
            
          $(cmbindikatoriget).multiselect('loadOptions', optionindikatori);

          
          document.getElementById("indikatorilabel_"+(i+1)).innerHTML = currentindicatorslabels;

          
    }else {
              $.Notification.error(result.Message);
          }
      
    }
  });
  bindeventsindi(i)
  
}


function setfetchindi(sdg_id,Permohonan_Projek_id){
  const api_url = "{{env('API_URL')}}";
  const api_token = "Bearer "+ window.localStorage.getItem('token');

  indikatoridetails=""
  $.ajax({
    type: "GET",
    
    url: api_url+"api/project/rmk-indikatori-details/"+sdg_id+"/"+Permohonan_Projek_id,
    dataType: 'json',
    success: function (result) { 
        //console.log("indikatori ddd: "+result.data.indikatori[0].Indikatori_id)
        if (result) {
          indikatoridetails = result.data.indikatori;
          return indikatoridetails;
        }
    }
  });
}

  function getindikatori(sdgno){

const api_url = "{{env('API_URL')}}";  console.log(api_url);
const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);


// var sdg =   document.querySelector(".sdg_"+sdgno);
//     var obbsdgvalue =  parseInt(sdg.value);

      var cmbsasaran =  document.querySelector(".sasaran_"+sdgno);
//       var indikatoricmb = 


  var Sasaranvalue =  cmbsasaran.value;
      
      var cmbindikatori =  document.querySelector(".indikatori_"+sdgno);
      $(cmbindikatori).empty();
      $.ajax({
          type: "GET",
          
          url: api_url+"api/project/indikatori-details/"+Sasaranvalue,
          dataType: 'json',
          success: function (result) { 
              // console.log(result)
              if (result) {

                var opt = 0;
                var el = document.createElement("option");
                el.textContent = "--Pilih--";
                el.value = opt;
                //e1.selected="selected"
                cmbindikatori.appendChild(el);
                
                  $.each(result.data, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.Indikatori;
                    el.value = opt;
                    cmbindikatori.appendChild(el);
                  })
              
        }else {
                  $.Notification.error(result.Message);
              }
          
        }
      });

}
let all_sdg_btn = document.querySelectorAll(
    "[id='sdg_button']"                    
); 

let all_sdg_div = document.querySelectorAll(".container_sdg"); 


all_sdg_btn.forEach((tb, i) => {                    
    tb.addEventListener("click", () => {
      all_sdg_div[i].remove();                        
    });
});
  loadcompleted();
</script>

@endsection