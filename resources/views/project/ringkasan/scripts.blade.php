<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
    let komponenid=""
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

        const api_token = "Bearer "+ window.localStorage.getItem('token');        
        axios.defaults.headers.common["Authorization"] = api_token
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        

        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/projects/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data
            console.log(data)
            document.getElementById('nama_projeck').innerHTML = data.nama_projek
            objectTemplate =  data.objektif
            $('#objektif').append(objectTemplate);

            ringasakan_data = data.ringkasan_projek;
            $('#ringkasan-data').append(ringasakan_data);

            // document.getElementById('ringkasan').innerHTML = data.ringkasan_projek
            // document.getElementById('ringkasan').innerHTML = data.ringkasan_projek
            rasionalTemplate =  data.rasional_projek
            $('#rasional').append(rasionalTemplate);
            faedahTemplate =  data.Faedah
            $('#faedah').append(faedahTemplate);
            document.getElementById('implikasi').innerHTML = data.implikasi_projek_tidak_lulus
            document.getElementById('jenis_kategori').innerHTML = data.jenis_kategori.name
            loadcompleted();
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

        //-------Komponen Table Fecth------------------------------------------------------------


//         let isMainWorksPresent=false;
// isTerperinciPresent=false;
// isPengurusanPresent=false;
// isPerundingKajian=false;
// isPerundingTapak=false;
// isPrelimItem_Present=false;
// prelimid=0
// perundingdetailstapak=""
// percentageprelim=0;
// perundingcost=0;
// pengurusan=""
// perlikantperunding=0;
// let flag=true;
// let subflag=true;
// let prelimflag=true;

// forid=1898;
// //-----------------
// var cmbkomponenget =  document.getElementById("cmbkomponen");
// $.ajaxSetup({
//         headers: {
//               "Content-Type": "application/json",
//               "Authorization": api_token,
//               }
//   });
// $.ajax({
//                       type: "GET",
                      
//                       url: api_url+"api/project/getkewangankomponen-details",
//                       dataType: 'json',
//                       success: function (result2) { 
//                           // console.log(result)
//                           if (result2) {
//                               $.each(result2.data, function (key, item) {
//                         var opt = item.id;
//                         var el = document.createElement("option");
//                         el.textContent = item.nama_komponen;
//                         el.value = opt;
//                         cmbkomponenget.appendChild(el);
                        
                              
//                       })
//                       cmbkomponenget.value=2
                      
                      
                          
//                     }else {
//                               $.Notification.error(result.Message);
//                           }
                      
//                     }
//                   });
//------------------


        
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
//var cmbkomponenget =  document.getElementById("cmbkomponen");
//   $.ajaxSetup({
//         headers: {
//               "Content-Type": "application/json",
//               "Authorization": api_token,
//               }
//   });
//  $.ajax({
//                       type: "GET",
                      
//                       url: api_url+"api/project/getkewangankomponen-details",
//                       dataType: 'json',
//                       success: function (result2) { 
//                           // console.log(result)
//                           if (result2) {
//                               $.each(result2.data, function (key, item) {
//                         var opt = item.id;
//                         var el = document.createElement("option");
//                         el.textContent = item.nama_komponen;
//                         el.value = opt;
//                         cmbkomponenget.appendChild(el);
                        
                              
//                       })
//                       cmbkomponenget.value=2
                      
                      
                          
//                     }else {
//                               $.Notification.error(result.Message);
//                           }
                      
//                     }
//                   });
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
          console.log(response.data)

          if(skop.length > 0) {
            $('#componentbody').empty();
            skop.forEach((item) => {

              mainrow+=1;
              console.log(item.id);

              if(skopname.length > 0) {
                skopname.forEach((item1) => {
                  if(item.skop_project_code == item1.skop_code){
                    if(item1.skop_name == "Main Works"){
                      isMainWorksPresent=true;
                      
                      perundingcost = item.cost

                    }

                    if(item1.skop_name == "Perlantikan Perunding"){
                      console.log("item1.skop_name"+item1.skop_name) ;   
                      console.log("item1.item.cost"+item.cost) ;                  
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
                console.log("main works present")
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
                                    readonly disabled
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
                console.log("main works not present")
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
                                    readonly disabled

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
                //console.log("The length of skopsforkewangan is: "+skopsforkewangan.length)
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
                                        class="form-control" 
                                        id="namacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"      
                                        />
                                        
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
                                        class="form-control" 
                                        id="namacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"      
                                        />
                                        
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
                                        class="form-control" 
                                        id="namacomponen" 
                                        readonly
                                        style="font-family: Poppins_Regular;"      
                                        />
                                        
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
                                          5%<input class="ml-2" type="radio" disabled name="prelimradio" id="prelimradio" value="5" onclick="calculateprelim(this.value,`+skopitem.sub_skop_project_code+`);">
                                        </div>
                                        <div class="col text-center">
                                          6%<input class="ml-2" type="radio" disabled name="prelimradio" id="prelimradio" value="6" onclick="calculateprelim(this.value, `+skopitem.sub_skop_project_code+`);">
                                        </div>
                                        <div class="col text-center">
                                          7%<input class="ml-2" type="radio" disabled name="prelimradio" id="prelimradio" value="7" onclick="calculateprelim(this.value, `+skopitem.sub_skop_project_code+`);">
                                        </div>
                                        <div class="col text-center">
                                          8%<input class="ml-2" type="radio" disabled name="prelimradio" id="prelimradio" value="8" onclick="calculateprelim(this.value, `+skopitem.sub_skop_project_code+`);">
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
                                        class="form-control" 
                                        id="namacomponen"  
                                        readonly
                                        style="font-family: Poppins_Regular;"     
                                        />
                                        
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
                //                         readonly disabled
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
                //                         readonly disabled
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
                //                         readonly disabled
                                        
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
                //                         readonly disabled
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


                                      let component_tr = `<tr id="subcomponentrow" class="d-row">
                                      <td><p id="rowno">`+mainrow+`.`+subrow+`.`+subsubrow+`</p></td>
                                          <td class="pl-4">
                                          <input type="hidden" id="jumlahkos`+item.skop_project_code+`" value="`+item.skop_project_code+`" />
                                            <div class="d-flex">
                                            <input
                                              type="text"
                                              value="`+subskopitem.nama_componen+`"
                                              class="form-control" 
                                              id="subnamacomponenu" 
                                              readonly disabled     
                                              />
                                              
                                              
                                            </div>  
                                                
                                          <td>
                                            <input
                                              type="text"
                                              value="`+jkos+`"
                                              class="form-control text-right subjumlahkos  input-element" 
                                              id="jumlahkos`+subskopitem.sub_skop_id+`"
                                              onchange="checkjumlah(this.id);"
                                              readonly disabled
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
                                              readonly disabled
                                            />
                                          </td>
                                          <td>
                                          <input type="hidden" value="`+subskopitem.sub_skop_id+`" id="hiddensubsubskopid" data-skop="">
                                            <input
                                                type="text"
                                                value="`+units+`"
                                                class="form-control text-right"  
                                                id="subcomponentunit"
                                                readonly disabled
                                              />
                                          </td>
                                          <td>
                                            <input
                                              type="text"
                                              value="`+kos+`"
                                              class="form-control text-right input-element" 
                                              id="subcomponentkos"
                                              onchange="calculatekosunit(this)"
                                              readonly disabled
                                            />
                                          </td>
                                          <td>
                                          <input
                                            type="text"
                                            value="`+subskopitem.jumlahkos+`"
                                            class="form-control text-right" 
                                            id="subcomponentjumlahkos"
                                            readonly disabled
                                          />
                                        </td>
                                          <td>
                                            <input
                                                type="text"
                                                value="`+Catatan+`"
                                                class="form-control text-right" 
                                                id="subcomponentcatatan"
                                                readonly disabled
                                              />
                                          </td> 

                                      </tr>`;
                                      $('#componentbody').append(component_tr);
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
                                  readonly disabled
                                    type="text"
                                    value="`+skopcost+`"
                                    class="form-control text-right input-element"
                                    id="finaltotaljumlahkos"
                                  />
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                <input
                                readonly disabled
                                  type="text"
                                  value=""
                                  class="form-control text-right input-element" 
                                  id="componentroughjumlahkos"
                                />
                                </td>
                                <td></td>
                              </tr>`;
                              $('#componentbody').append(component_tr);             

            }


            let Information_add = document.querySelector(".Information_add");

            

            // if (Information_add) {
            //   $(".add_subrow").bind("click", function () {
            //     var $this = $(this),
            //       $parentTR = $this.closest("tr");
            //       var lCompleteRow = $this.closest("tr");
            //       var jumlahforid = lCompleteRow. find('td:eq(1) input[type="hidden"]'). val();
            //       var subkomponent = lCompleteRow. find('td:eq(3) input[type="hidden"]'). val();
            //       var subsubkomponent = lCompleteRow. find('td:eq(4) input[type="hidden"]'). val();
                  
            //       console.log("Hello"+subkomponent);
            //       forid+=1;

            //       let component_tr = `<tr id="subcomponentrow" class="d-row">
            //                         <td></td>
            //                         <td class="pl-4">
            //                         <input type="hidden" id="jumlahkos`+jumlahforid+`" />
            //                           <div class="d-flex">
            //                           <input
            //                             type="text"
            //                             value=""
            //                             class="form-control" 
            //                             id="subnamacomponen"      
            //                             />
            //                             <button class="ml-auto component_row_minus">
            //                             <img src="{{ asset('assets/images/minus.png') }}" alt="" />
            //                             </button>
            //                           </div>  
                                          
            //                         <td>
            //                           <input
            //                             type="text"
            //                             value=""
            //                             class="form-control text-right subjumlahkos input-element" 
            //                             id="jumlahkos`+forid+`"
            //                             onchange="checkjumlah(this.id);"
            //                             readonly disabled
            //                           />
            //                         </td>
            //                         <td>
            //                           <input type = "hidden" id="hiddenskopidsub" value="`+subkomponent+`"/>
            //                           <input
            //                             type="text"
            //                             value=""
            //                             class="form-control text-right input-element"
            //                             id="subcomponentkauntiti"
            //                             onchange="calculatekosunit(this)"
            //                           />
            //                         </td>
            //                         <td>
            //                         <input type = "hidden" id="hiddensubsubskopid" value="`+subsubkomponent+`"/>
            //                           <input
            //                               type="text"
            //                               value=""
            //                               class="form-control text-right"  
            //                               id="subcomponentunit"
            //                             />
            //                         </td>
            //                         <td>
            //                           <input
            //                             type="text"
            //                             value=""
            //                             class="form-control text-right input-element" 
            //                             id="subcomponentkos"
            //                             onchange="calculatekosunit(this)"
            //                           />
            //                         </td>
            //                         <td>
            //                           <input
            //                             type="text"
            //                             value=""
            //                             class="form-control text-right input-element" 
            //                             id="subcomponentjumlahkos"
            //                             readonly disabled
            //                           />
            //                         </td>
            //                         <td>
            //                           <input
            //                               type="text"
            //                               value=""
            //                               class="form-control text-right" 
            //                               id="subcomponentcatatan"
            //                             />
            //                         </td> 

            //                     </tr>`;

                 

            //     $(component_tr).insertAfter($parentTR);

               

            //     let component_row_minus = document.querySelectorAll(".component_row_minus");
            //     component_row_minus.forEach((row_btn) => {
            //       row_btn.addEventListener("click", () => {
            //         row_btn.closest("tr").remove();
            //       });
            //     });
            //   });
            //   let component_row_minus = document.querySelectorAll(".component_row_minus");
            //   component_row_minus.forEach((row_btn) => {
            //     row_btn.addEventListener("click", () => {
            //       row_btn.closest("tr").remove();
            //     });
            //   });
            
            // }
            //OnLoadCalculateFirsTable();

            let perundingdetailrow =""
            $('#perundingbody').empty();

            console.log("isPerundingPresent: "+isPerundingPresent);
            console.log("isPerundingTapak: "+isPerundingTapak);
            console.log("isPerundingKajian: "+isPerundingKajian);
            console.log("isTerperinciPresent: "+isTerperinciPresent);

            if(isTerperinciPresent && isPerundingPresent){
              console.log("Not Present")
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
                                    readonly disabled
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
                                                
                                              </div>
                                            </td>
                                            <td>
                                              <input
                                                type="text"
                                                value=""
                                                id="perundingjumlahkos`+i+`"
                                                class="form-control text-right input-element"
                                                readonly disabled
                                              />
                                            </td>
                                            <td colspan="5">
                                              <input type="hidden" value="1" id="hiddenperundingmainid"/>
                                            </td>
                                            
                                            
                                          </tr>`;
                  
                }else{
                  console.log("hi")
                  perundingdetailrow =`<tr>
                                <td>
                                  <div class="d-flex">
                                    <p>Sub-Profesional</p>
                                    
                                  </div>
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    id="perundingjumlahkos`+i+`"
                                    value=""
                                    class="form-control text-right input-element"
                                    readonly disabled
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
                                            
                                            <input type="text" readonly disabled class="form-control col" id="txtjawatan" value="`+perundingitem.jawatan+`" />
                                            
                                          </div>
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.jumlahkos+`"
                                            class="form-control bg-light text-right perundingjumlahkos input-element"
                                            id="perundingjumlahkos`+perundingitem.is_Profesional+`"
                                            onchange="checkperundingjumlah(this.id,this);"
                                            readonly disabled
                                            
                                            
                                          />
                                        </td>
                                        <td>
                                        <input type="hidden" id="hiddenperundingid" value="`+perundingitem.is_Profesional+`" />
                                          <input
                                            type="text"
                                            value="`+perundingitem.man_month+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmanmonth"
                                            readonly disabled
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                          
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.multiplier+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmultiplier"
                                            readonly disabled
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.salary+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtsalary"
                                            readonly disabled
                                            onchange="checkperundingjumlah(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.amount+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtamount"
                                            readonly disabled
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.Catatan+`"
                                            class="form-control bg-light"
                                            id="txtperundingcatatan"
                                            readonly disabled
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
                                    readonly disabled
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
                                    readonly disabled
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
                                    readonly disabled
                                    
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
                                    readonly disabled
                                    
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
          // $(".add-tr-btn-second_copy").bind("click", function () {
          //         var $this = $(this),
          //           $parentTR = $this.closest("tr");
          //           var lCompleteRow = $this.closest("tr");

          //           var data1 = lCompleteRow. find('td:eq(2) input[type="hidden"]'). val();
          //           let subperundingdetails = `<tr id="perundingrow">
          //                               <td>
          //                                 <div class="d-flex">
          //                                   <label for="" class="col-4 align-self-center">
          //                                     Jawatan
          //                                   </label>
                                            
          //                                   <input type="text" readonly disabled class="form-control col" id="txtjawatan" value="" />
                                            
          //                                 </div>
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   readonly disabled
          //                                   class="form-control bg-light text-right perundingjumlahkos input-element"
          //                                   id="perundingjumlahkos`+data1+`"
          //                                   onchange="checkperundingjumlah(this.id,this);"
          //                                 />
          //                               </td>
          //                               <td>
          //                               <input type="hidden" id="hiddenperundingid" value="`+data1+`" />
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtmanmonth"
          //                                   readonly disabled
          //                                   onchange="checkperundingjumlah(this.id,this);"
          //                                 />
          //                               </td>
                                          
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtmultiplier"
          //                                   readonly disabled
          //                                   onchange="checkperundingjumlah(this.id,this);"
          //                                 />
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtsalary"
          //                                   readonly disabled
          //                                   onchange="checkperundingjumlah(this.id,this);"
          //                                 />
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtamount"
          //                                   readonly disabled
          //                                 />
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light"
          //                                   id="txtperundingcatatan"
          //                                   readonly disabled
          //                                 />
          //                               </td>

          //                               </tr>`;
          //         $(subperundingdetails).insertAfter($parentTR);
          //         nf();
          //         let subTrSecond = document.querySelectorAll(".sub-tr-btn-second_minus");
          //         subTrSecond.forEach((row_btn) => {
          //           row_btn.addEventListener("click", () => {
          //             row_btn.closest("tr").remove(); 
          //           });
          //         });
          //       });
          //       let subTrSecond = document.querySelectorAll(".sub-tr-btn-second_minus");
          //       subTrSecond.forEach((row_btn) => {
          //         row_btn.addEventListener("click", () => {
          //           row_btn.closest("tr").remove();
          //         });
          //       });
              //************************************ */
              
              //checkperundingjumlah("perundingjumlahkos1")
              nf();
            }
            else{
              
              document.getElementById("yuranperundingtablediv").style = "display: none";
              //document.getElementById("financesectiontable").style = "display: none";
            }
            // console.log("Not Present"+isTerperinciPresent)
            // console.log("Not Present")
            
            
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
                                    readonly disabled
                                    id="yuranperunding_tapak_jumlahkos"
                                  />
                                </td>
                                <td colspan="5"></td>
                                
                                
                                
                              </tr>`;
                $('#perundingbody_tapak').append(perundingdetailrowtapak);
                for(tapaki=1; tapaki>=0; tapaki--){
                  if(tapaki==1){               
                    console.log("hello")
                    perundingdetailrowtapak = `<tr>
                                            <td>
                                            <div class="d-flex">
                                                <p>Profesional</p>
                                                
                                              </div>
                                            </td>
                                            <td>
                                              <input
                                                type="text"
                                                value=""
                                                id="perundingjumlahkostapak`+tapaki+`"
                                                class="form-control text-right input-element"
                                                readonly disabled
                                              />
                                            </td>
                                            <td colspan="5">
                                              <input type="hidden" value="1" id="hiddenperundingtapakmainid"/>
                                            </td>
                                            
                                            
                                          </tr>`;
                  
                }else{
                  console.log("hi")
                  perundingdetailrowtapak =`<tr>
                                <td>
                                  <div class="d-flex">
                                    <p>Sub-Profesional</p>
                                    
                                  </div>
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    id="perundingjumlahkostapak`+tapaki+`"
                                    value=""
                                    class="form-control text-right input-element"
                                    readonly disabled
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
                                            
                                            <input type="text" readonly disabled class="form-control col" id="txtjawatantapak" value="`+perundingitem.jawatan+`" />
                                            
                                          </div>
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.jumlahkos+`"
                                            class="form-control bg-light text-right perundingjumlahkostapak input-element"
                                            id="perundingjumlahkostapak`+perundingitem.is_Profesional+`"
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                            readonly disabled
                                            
                                            
                                          />
                                        </td>
                                        <td>
                                        <input type="hidden" id="hiddenperundingtapakid" value="`+perundingitem.is_Profesional+`" />
                                          <input
                                            type="text"
                                            value="`+perundingitem.man_month+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmanmonthtapak"
                                            readonly disabled
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                          
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.multiplier+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtmultipliertapak"
                                            readonly disabled
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.salary+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtsalarytapak"
                                            readonly disabled
                                            onchange="checkperundingjumlahtapak(this.id,this);"
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.amount+`"
                                            class="form-control bg-light text-right input-element"
                                            id="txtamounttapak"
                                            readonly disabled
                                          />
                                        </td>
                                        <td>
                                          <input
                                            type="text"
                                            value="`+perundingitem.Catatan+`"
                                            class="form-control bg-light"
                                            id="txtperundingcatatantapak"
                                            readonly disabled
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
                                    readonly disabled
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
                                    readonly disabled
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
                                    readonly disabled
                                    
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
                                    readonly disabled
                                    
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
          // $(".add-tr-btn-second").bind("click", function () {
          //         var $this = $(this),
          //           $parentTR = $this.closest("tr");
          //           var lCompleteRow = $this.closest("tr");

          //           var data1 = lCompleteRow. find('td:eq(2) input[type="hidden"]'). val();
          //           let subperundingdetailstapak = `<tr id="perundingrowtapak">
          //                               <td>
          //                                 <div class="d-flex">
          //                                   <label for="" class="col-4 align-self-center">
          //                                     Jawatan
          //                                   </label>
                                            
          //                                   <input type="text"class="form-control col" id="txtjawatantapak" value="" />
          //                                   <button type="button" class="ml-auto sub-tr-btn-second">
          //                                   <img src="{{ asset('assets/images/minus.png') }}" alt="" />
          //                                   </button>
          //                                 </div>
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right perundingjumlahkostapak input-element"
          //                                   id="perundingjumlahkostapak`+data1+`"
          //                                   onchange="checkperundingjumlahtapak(this.id,this);"
          //                                 />
          //                               </td>
          //                               <td>
          //                               <input type="hidden" id="hiddenperundingtapakid" value="`+data1+`" />
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtmanmonthtapak"
          //                                   onchange="checkperundingjumlahtapak(this.id,this);"
          //                                 />
          //                               </td>
                                          
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtmultipliertapak"
          //                                   onchange="checkperundingjumlahtapak(this.id,this);"
          //                                 />
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtsalarytapak"
          //                                   onchange="checkperundingjumlahtapak(this.id,this);"
          //                                 />
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light text-right input-element"
          //                                   id="txtamounttapak"
          //                                   readonly disabled
          //                                 />
          //                               </td>
          //                               <td>
          //                                 <input
          //                                   type="text"
          //                                   value=""
          //                                   class="form-control bg-light"
          //                                   id="txtperundingcatatantapak"
          //                                 />
          //                               </td>

          //                               </tr>`;
          //         $(subperundingdetailstapak).insertAfter($parentTR);
          //         nf();
          //         let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
          //         subTrSecond.forEach((row_btn) => {
          //           row_btn.addEventListener("click", () => {
          //             row_btn.closest("tr").remove(); 
          //           });
          //         });
          //       });
          //       let subTrSecond = document.querySelectorAll(".sub-tr-btn-second");
          //       subTrSecond.forEach((row_btn) => {
          //         row_btn.addEventListener("click", () => {
          //           row_btn.closest("tr").remove();
          //         });
          //       });
              //************************************ */
              
              //checkperundingjumlah("perundingjumlahkos1")
              nf();
            }
            else{
              
              document.getElementById("yuranperunding_tapaktablediv").style = "display: none";
              //document.getElementById("financesectiontable").style = "display: none";
            }
            // console.log("Not Present"+isTerperinciPresent)
            // console.log("Not Present")
            
            

        

        //-------Komponen Table Fecth ends--------------------------------------------------------------------------------

        //-----Belanja table fetch starts-------------------------------------------------
            

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
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log("No of years: "+$years.length) //year array
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
                                    readonly disabled                                 
                                  />
                                </td>`;

                                footeryears += `<td>
                                                          <input
                                                            type="text"
                                                            class="form-control text-right input-element totalOE"
                                                            style="color: #212529; font-size: 12px; font-family: Poppins_Bold;"
                                                            value="0"
                                                            id="totalcol`+(i+2)+`"
                                                            readonly disabled
                                                          />
                                                        </td>`;
                                //console.log("no of years arr: "+noofyrs_belanja)
                  }
                          th.innerHTML = 'Jumlah Kos (RM)';
                          th.className="text-center"
                          tr.appendChild(th);
              }
              // else
              // {
              //     var tr = document.getElementById('perkara_table_sec_kewagan').tHead.children[0];   //first tr for header
              //             th = document.createElement('th');
              //             th.innerHTML =  data.tahun_jangka_mula+' '+'(RM)';
              //             tr.appendChild(th); 

              //             th = document.createElement('th');
              //             th.innerHTML = 'Jumlah Kos (RM)';
              //             tr.appendChild(th);  

              // }
            }

          
          
            data = response.data.data.project; console.log(data);
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
                          $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years) //year array
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
                                            value="`+yearvalue+`"  
                                            onchange="calculatebelanja();"
                                            readonly disabled

                                          />
                                        </td>`;

                                        footeryears += `<td class="pt-3 pb-3">
                                                          <input
                                                            type="text"
                                                            class="form-control text-right input-element totalOE"
                                                            style="color: #212529; font-size: 12px; font-family: Poppins_Bold;"
                                                            value="0"
                                                            id="totalcol`+(i+2)+`"
                                                            readonly disabled
                                                          />
                                                        </td>`;
                                        //console.log("no of years arr: "+noofyrs_belanja1)
                          }
                                  //th.innerHTML = 'Jumlah Kos (RM)';
                                  //tr.appendChild(th);
                      }

                       brow = `
                                <td>
                                  <div class="d-flex">
                                    <input type="text" 
                                      class="form-control text-left"
                                      value="`+item.kategori_nama+`"
                                      id="kosOE"
                                      readonly disabled
                                      
                                    />
                                    
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
            

            // let belanjarow1 = `
            //                     <td>
            //                       <div class="d-flex">
            //                         <input type="text" 
            //                           class="form-control text-left"
            //                           value=""
            //                           id="kosOE4444"
                                      
            //                         />
            //                         <button type="button" class="ml-auto Information_minus">
            //                           <img
            //                             src="{{ asset('assets/images/minus.png') }}"
            //                             alt="minus"
            //                           />
            //                         </button>
            //                       </div>
            //                     </td>
            //                     `+noofyrs_belanja+`
            //                 `; 
            //                  Information_minus = document.querySelectorAll(".Information_minus");
            //                 Information_minus.forEach((minus) => {
            //                   minus.addEventListener("click", () => {
            //                     minus.closest("tr").remove();
            //                     calculatebelanja();
            //                   });
            //                 });
            //                 Information_add.addEventListener("click", () => {
            //                   let tr1 = document.createElement("tr");
            //                   tr1.innerHTML = belanjarow1;
            //                   console.log("khdbfkhsfbkf");
            //                   $('#Belanja').append(tr1);
            //                   //Information_add.closest("tbody").appendChild(tr1);
            //                   //Information_add.closest("tr").insertAfter(tr1);
            //                   let Information_minus = document.querySelectorAll(".Information_minus");
            //                   Information_minus.forEach((minus) => {
            //                     minus.addEventListener("click", () => {
            //                       minus.closest("tr").remove();
            //                       calculatebelanja();
            //                     });
            //                   });
            //                 }); 
            let footer = `<tr class="mt-0" style="background-color: #39b0d2">
                                <td class="text-right belanja_gap">
                                  <span class="belanja_text" style="color:#fff">Kos Keseluruhan OE Creativity Index (RM)</span>
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
             
        });
        

        
        
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
                  
                  

                  
        //--------Belanja ends----------------------------------------------------------------------------

        //--To fetch Komponen DE and others--------------------------------------------


        axios({
                method: 'get',
                url: api_url+"api/project/getkewanganprojek-details/"+$('#project_id').val(),
                responseType: 'json'        
        })
        .then(function (responsedata) { 
          if(responsedata){

            // axios({
            //     method: 'get',
            //     url: api_url+"api/project/getkewanganprojek-details/"+$('#project_id').val(),
            //     responseType: 'json'        
            //     })
            //     .then(function (responsedata) { 
            //       if(responsedata){

            //         console.log("Hjdfjdsifjidfjiodf: "+komponendetails.data[0].nama_komponen)
            //         namakomponen = ""
            //         for(i=0;i<komponendetails.data.length;i++){
            //           if(komponendetails.data[i].id == responsedata.data.data.Komponen_id){
            //             namakomponen = komponendetails.data[i].nama_komponen;
            //             //console.log("Hjdfjdsifjidfjiodf: "+namakomponen)
            //           }
            //         }
            //       }
            //     });

                                    
            document.getElementById('cmbkomponen').innerHTML=responsedata.data.data.komponen.nama_komponen;
            document.getElementById('txtsilingdimohon').innerHTML=responsedata.data.data.Siling_Dimohon;
            document.getElementById('txtsilingbayangan').innerHTML=responsedata.data.data.Siling_Bayangan;
            document.getElementById('totalkoscomponen').innerHTML=responsedata.data.data.totalkos;
            
            //document.getElementById('componentfinaltax').value=responsedata.data.data.sst_tax;
            //document.getElementById('componentroughtax').value=responsedata.data.data.temp_sst_tax;
            
            //document.getElementById('componentfinaltaxcopy').value=responsedata.data.data.sst_tax;
            document.getElementById('componentroughjumlahkos').value=responsedata.data.data.temp_jumlahkos;
            document.getElementById('finaltotaljumlahkos').value=responsedata.data.data.jumlahkos;

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
            
        }
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
        
        // axios({
        //         method: 'get',
        //         url: api_url+"api/project/getkewanganprojek-details/"+$('#project_id').val(),
        //         responseType: 'json'        
        // })
        // .then(function (responsedata) { 
        //   if(responsedata){

        //     console.log("Hjdfjdsifjidfjiodf: "+komponendetails.data[0].nama_komponen)
        //     namakomponen = ""
        //     for(i=0;i<komponendetails.data.length;i++){
        //       if(komponendetails.data[i].id == responsedata.data.data.Komponen_id){
        //         namakomponen = komponendetails.data[i].nama_komponen;
        //         //console.log("Hjdfjdsifjidfjiodf: "+namakomponen)
        //       }
        //     }
                        
        //     document.getElementById('cmbkomponen').value=namakomponen;
        //     document.getElementById('txtsilingdimohon').value=responsedata.data.data.Siling_Dimohon;
        //     document.getElementById('txtsilingbayangan').value=responsedata.data.data.Siling_Bayangan;
            
        //     document.getElementById('componentfinaltax').value=responsedata.data.data.sst_tax;
        //     document.getElementById('componentroughtax').value=responsedata.data.data.temp_sst_tax;
            
        //     document.getElementById('componentfinaltaxcopy').value=responsedata.data.data.sst_tax;
        //     document.getElementById('componentroughjumlahkos').value=responsedata.data.data.temp_jumlahkos;
        //     document.getElementById('finaltotaljumlahkos').value=responsedata.data.data.jumlahkos;

            

        //     document.getElementById('imbuhanbalik').value=responsedata.data.data.imbuhan_balik;
        //     document.getElementById('imbuhanbalikcopy').value=responsedata.data.data.imbuhan_balik;


        //     document.getElementById('ftotalcost').value = responsedata.data.data.anggaran_mainworks;       

        //     document.getElementById('lblpmax').value = responsedata.data.data.P_max;
            

        //     document.getElementById('lblpmin').value= responsedata.data.data.P_min;
            

        //     document.getElementById('lblpavg').value= responsedata.data.data.P_avg;
            

        //     document.getElementById('ftotalcostpercent').value= responsedata.data.data.design_fee;
            

            
            
            
        //   }
          

        // })
        
        
        
            

        
        //---Komponen DE fetch ends--------------------------------------------------------



    })// end of document.ready

    //**********************To calculate jumlah cost of first table****************************
function checkjumlah(jumlahid){
  //console.log(jumlahid);
  let all_jumlah = document.querySelectorAll("[id^='"+jumlahid+"']");
  if(all_jumlah.length>0){
    var sumjumlah=0;
    var totaljumlah = parseInt(all_jumlah[0].value); 
    for(let k=1;k<all_jumlah.length;k++)
    {
      if(!isNaN(parseInt(all_jumlah[k].value))){
        sumjumlah+= parseInt(all_jumlah[k].value); 
      }      
    }
    if(sumjumlah < totaljumlah){
      all_jumlah[0].style="background: rgb(205, 192, 111)";
    }
    else if(sumjumlah > totaljumlah){
      all_jumlah[0].style="background: rgb(212, 118, 118)";
    }
    else{
      all_jumlah[0].style="background: rgb(117,216,128)";
    }
  
  }
  
}
//**************************************************************************


//**************************Calculate Belanja table******************************************************

function calculatebelanja()
{
  //console.log(row)
  //console.log(col)
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
                                      //console.log("row : "+table.rows.length+"---"+(j+2)+" "+all_colid[0].value)

                                      
                                      
                                    }
                                    all_colid = table.rows[j].querySelectorAll(".col"+(l))
                                    all_colid[0].value = sumofrows
                                    
                              

                                    var noofcells = rows.cells.length; 
                                                  
                                    console.log("sdfsdffggfg"+noofcells)

                                  for (var m = 2; m <= table.rows[0].cells.length; m++) {
                                    var colid = "col"+m;
                                    
                                    let all_colid1 = document.querySelectorAll("."+colid);

                                    console.log("sdfsdffggfg"+j+" row"+all_colid1.length)
                                    
                                    sumofcols = 0
                                    for (i=0;i<all_colid1.length;i++){
                                      if(!isNaN(removecomma(all_colid1[i].value) )){
                                        sumofcols += removecomma(all_colid1[i].value);
                                      }                                      
                                    }
                                    //console.log("colno: "+j)
                                    let totalcolid = document.querySelector("[id^='totalcol"+m+"']");
                                    totalcolid.value = sumofcols; 
                                    nf();                                  

                              }

                                
                                                    
                                }

                                                     
                          }
                          nf();
                          //calculatetotalkosprojek();
}

//*********************************************************************************






//-------------third table by swaraj-----------------
const api_token1 = "Bearer "+ window.localStorage.getItem('token');        
axios.defaults.headers.common["Authorization"] = api_token1
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-skop-for-kewangan/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 

            data = response.data.data.project; console.log(data); 
            skop = response.data.data.skop; console.log(skop); 
            kewangan = response.data.data.kewangan; console.log(kewangan); 
            loadcompleted();
            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { // date are different
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years) //year array
                  var tr = document.getElementById('projek_table_kewagan').tHead.children[0];   //first tr for header
                  // appends header     
                  for (i = 0; i <= $years.length; i++) {
                          th = document.createElement('th');
                          th.innerHTML = 'Siling '+$years[i]+'<br>'+'(RM)';
                          tr.appendChild(th);  
                  }
                          th.innerHTML = 'Jumlah Kos (RM)';
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
                                var id = data.skop_projects[k].skop_project_code; console.log(id)
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
                                cell.innerHTML = '<input type="text" class="form-control input-element m'+data.skop_projects[k].id+'" readonly disabled id="total_'+row_id+'" value="'+data.skop_projects[k].cost+'"/>';
                            }
                            else
                            {
                                cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled id="total_'+row_id+'"  value="'+total+'"/>';
                            }
                        }
                        else if(j==(rowcount_first-1))
                        {
                          if(k==scope_length)
                          {
                            var Div ='<input type="text" class="form-control input-element" name="jumlahd" readonly disabled id="jumlah'+row_id+'" value="'+silling_total+'">';
                            cell.innerHTML = Div;
                          }
                          else
                          {  
                            var Div ='<input type="text" class="form-control input-element" name="jumlah" readonly disabled id="jumlah'+row_id+'" value="'+jumlah_data+'">';
                            cell.innerHTML = Div;
                          }
                        }
                        else
                        { 
                          if(k==scope_length)
                          {
                            var Div ='<input type="text" class="form-control input-element" name="years" readonly disabled id="input'+row_id+'_'+j+'"  value="">';
                            cell.innerHTML = Div;
                          }
                          else{
                          var Div ='<input type="text" class="form-control input-element" name="year" readonly disabled id="input'+row_id+'_'+j+'" onchange="calculateSum('+row_id+','+j+')" value="'+old_yr_data+'">';
                          cell.innerHTML = Div;
                          }
                        }
                      }     
                  }
              }
              else
              { //only one year
                var tr = document.getElementById('projek_table_kewagan').tHead.children[0]; console.log(tr);  
                var table_skop_first= document.getElementById("skop-first");
                          th = document.createElement('th');
                          th.innerHTML = 'Siling '+data.tahun_jangka_mula+'<br>'+'(RM)';
                          tr.appendChild(th);  
                          th1 = document.createElement('th');
                          th1.innerHTML = 'Jumlah Kos (RM)';
                          tr.appendChild(th1);


                          var rowcount_first = document.getElementById('projek_table_kewagan').rows[0].cells.length; console.log(rowcount_first)
                          localStorage.setItem("rowcount", rowcount_first);
                          var scope_length = data.skop_projects.length; //console.log(scope_length)
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
                                    var id = data.skop_projects[k].skop_project_code; console.log(id)
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
                                        cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled id="total_'+row_id+'" value="'+data.skop_projects[k].cost+'"/>';
                                    }
                                    else
                                    {
                                        cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled id="total_'+row_id+'" value="'+total+'"/>';
                                    }
                                }
                                else if(j==(rowcount_first-1))
                                {  
                                  if(k==scope_length)
                                  {
                                    var Div ='<input type="text" class="form-control input-element" name="jumlah" readonly disabled id="jumlah'+row_id+'" value="'+silling_total+'">';
                                    cell.innerHTML = Div;
                                  }
                                  else
                                  {
                                  var Div ='<input type="text" class="form-control input-element" readonly disabled name="jumlah" id="jumlah'+row_id+'" value="'+jumlah_data+'">';
                                  cell.innerHTML = Div;
                                  }
                                }
                                else
                                {
                                  if(k==scope_length)
                                  {
                                    var Div ='<input type="text" class="form-control input-element" name="year" readonly disabled id="input'+row_id+'_'+j+'" value="">';
                                    cell.innerHTML = Div;
                                  }
                                  else{
                                  var Div ='<input type="text" class="form-control input-element" id="input'+row_id+'_'+j+'" readonly disabled onchange="calculateSum('+row_id+','+j+')" name="year" value="'+old_yr_data+'"/>';
                                  cell.innerHTML = Div;
                                  }
                                }
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

//------------------end third table--------------
//--------------------start fourth table --------


axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get-bayaran-suku-for-kewangan/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data.project; //console.log(data); 
            skop = response.data.data.skop; //console.log(skop); 
            kewangan = response.data.data.kewangan; //console.log(kewangan); 
            bayaran = response.data.data.bayaran; //console.log(bayaran); 


            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { 
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); //console.log($years) //year array
                  var tr = document.getElementById('komponen_three_table_kewagan').tHead.children[0];   //first tr for header
                  for (i = 0; i < $years.length; i++) {
                          th = document.createElement('th');
                          th.classList.add("col-1");
                          th.setAttribute("colspan", "4");
                          th.innerHTML = $years[i];
                          tr.appendChild(th);  
                  }
                  var rowcount_first = document.getElementById('komponen_three_table_kewagan').rows[0].cells.length; //console.log(rowcount_first)
                  var table_skop_first= document.getElementById("skop-second");  //body of the table
                  var scope_length = data.skop_projects.length; //console.log(scope_length)
                  var project_cost=0;
                  for(let k = 0; k < scope_length ; k++)
                  { //console.log("first");
                    var row = table_skop_first.insertRow(k);  
                    row.classList.add(k);
                     var length_td=2+($years.length)*4; //console.log(length_td)
                     var cur_year='';
                     var quarter='';
                     for (j = 0; j < length_td;j++) { 

                        if(j==0)
                        {   
                            var cell = row.insertCell(j); 
                            if(data.skop_projects[k])
                            {
                                var id = data.skop_projects[k].skop_project_code; //console.log(id)
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
                                cell.innerHTML = '<input type="text" class="form-control input-element m'+data.skop_projects[k].id+'" id="cost_'+k+'_'+j+'" readonly disabled value="'+data.skop_projects[k].cost+'"/>';
                                
                              }
                            else
                            {
                                cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled value=""/>';
                            }
                        }
                        else 
                        { 
                          var cell = row.insertCell(j); 
                          cell.classList.add("kewangan"+k+'_'+j+"");
                          cell.setAttribute("id", "kewangan"+k+'_'+j+"");

                          if(bayaran.length!=0){ //console.log(j)
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
                          else
                          {
                            //console.log('not found')

                          }
                          //cell.innerHTML = '&#x2713;';
                        }
                     }
   
                  }
                  var row = table_skop_first.insertRow(scope_length); //console.log(rowcount_first)
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
                      cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled value="'+project_cost+'.00"/>';
                    }
                    else
                    {
                      
                      cell.setAttribute("colspan", "4");
                      cell.innerHTML = '<input type="text" id="sum_'+i+'" class="form-control input-element" readonly disabled value=""/>';
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
                    var rowcount_first = document.getElementById('komponen_three_table_kewagan').rows[0].cells.length; //console.log(rowcount_first)
                  var table_skop_first= document.getElementById("skop-second");  //body of the table
                  var scope_length = data.skop_projects.length; //console.log(scope_length)
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
                                var id = data.skop_projects[k].skop_project_code; //console.log(id)
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
                                cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled value="'+data.skop_projects[k].cost+'"/>';
                            }
                            else
                            {
                                cell.innerHTML = '<input type="text" class="form-control readonly disabled input-element" readonly disabled value=""/>';
                            }
                        }
                        else 
                        { 
                          var cell = row.insertCell(j); 
                          cell.classList.add("kewangan"+k+'_'+j+"");
                          cell.setAttribute("id", "kewangan"+k+'_'+j+"");
                          if(bayaran.length!=0){ //console.log(j)
                            if(j==2 && bayaran[k].yr1_quarters1=="1"){ cell.innerHTML = '&#x2713;';
                            }else if(j==3 && bayaran[k].yr1_quarters2=="1"){ cell.innerHTML = '&#x2713;';
                            }else if(j==4 && bayaran[k].yr1_quarters3=="1"){ cell.innerHTML = '&#x2713;';
                            }else if(j==5 && bayaran[k].yr1_quarters4=="1"){ cell.innerHTML = '&#x2713;';
                            }else{cell.innerHTML = '';}
                          }
                          else { }

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
                      cell.innerHTML = '<input type="text" class="form-control input-element" readonly disabled value="'+project_cost+'.00"/>';
                    }
                    else
                    {
                      cell.setAttribute("colspan", "4");
                      cell.innerHTML = '<input type="text" id="sum_'+i+'" class="form-control input-element" readonly disabled value=""/>';
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
            data = response.data.data.project; console.log(data); 
            peruntukan = response.data.data.peruntukan; console.log(peruntukan);

            let  perkara = ["Penganjuran Mesyuarat","Dokumentasi","Tuntutan Perjalanan (TNT)"];console.log(perkara);

            if(data!=null)
            {
              if(data.tahun_jangka_mula != data.tahun_jangka_siap )
              { // date are different
                  $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years) //year array
                  var tr = document.getElementById('perkara_table_kewagan').tHead.children[0];   //first tr for header
                  // appends header     
                  for (i = 0; i <= $years.length; i++) {
                          th = document.createElement('th');
                          th.innerHTML =  $years[i]+' '+'(RM)';
                          tr.appendChild(th);  
                  }
                          th.innerHTML = 'Jumlah Kos (RM)';
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
                            var Div ='<input type="text" class="form-control  years input-element" name="jumlahd" readonly disabled id="jumlahper'+row_id+'" value="'+silling_total+'">';
                            cell.innerHTML = Div;
                          }
                          else
                          {  
                            var Div ='<input type="text" class="form-control input-element" name="jumlah" readonly disabled id="jumlahper'+row_id+'" style="width:'+jumlah_width+'px" value="'+jumlah_data+'">';
                            cell.innerHTML = Div;
                          }
                        }
                        else
                        { 
                          if(k==3)
                          {
                            var Div ='<input type="text" class="form-control years input-element" name="years" readonly disabled id="inputper'+row_id+'_'+j+'"  value="">';
                            cell.innerHTML = Div;
                          }
                          else{
                          var Div ='<input type="text" class="form-control input-element" readonly disabled onchange="calculateJumlah('+row_id+','+j+')" name="year" id="inputper'+row_id+'_'+j+'" style="width:'+width+'px" value="'+old_yr_data+'">';
                          cell.innerHTML = Div;
                          }
                        }
                      }     
                  } 
              }
              else
              { //only one year
                var tr = document.getElementById('perkara_table_kewagan').tHead.children[0]; console.log(tr);  
                var table_skop_first= document.getElementById("skop-third");
                th = document.createElement('th');
                th.innerHTML = data.tahun_jangka_mula+' '+'(RM)';
                tr.appendChild(th);  
                th1 = document.createElement('th');
                th1.innerHTML = 'Jumlah Kos (RM)';
                tr.appendChild(th1);


                var rowcount_first = document.getElementById('perkara_table_kewagan').rows[0].cells.length; console.log(rowcount_first)
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
                    console.log(jumlah_data)
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
                          var Div ='<input type="text" class="form-control years input-element" name="jumlah" readonly disabled id="jumlahper'+row_id+'" value="'+silling_total+'">';
                          cell.innerHTML = Div;
                        }
                        else
                        {
                        var Div ='<input type="text" class="form-control input-element" readonly disabled name="jumlah" id="jumlahper'+row_id+'" value="'+jumlah_data+'">';
                        cell.innerHTML = Div;
                        }
                      }
                      else
                      {
                        if(k==3)
                        {
                          var Div ='<input type="text" class="form-control years input-element" name="year" readonly disabled id="inputper'+row_id+'_'+j+'" value="">';
                          cell.innerHTML = Div;
                        }
                        else{
                        var Div ='<input type="text" class="form-control input-element"readonly disabled id="inputper'+row_id+'_'+j+'" onchange="calculateJumlah('+row_id+','+j+')" name="year" value="'+old_yr_data+'"/>';
                        cell.innerHTML = Div;
                        }
                      }
                    }     
                }
              }    
              
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

//------------------end fifth table--------------sixth


//---------------------- onload for third and fourth table------------
function onLoadSkop() {
  console.log("onload")
  
                              var table = document.getElementById("projek_table_kewagan"); console.log(table.rows)
                              var row_length = table.rows.length-1; 
                              // var rowcount_first = table.rows[0].cells.length; console.log(rowcount_first)
                              var rowcount_first= window.localStorage.getItem('rowcount'); console.log(rowcount_first)
                              var scope_length= window.localStorage.getItem('scope_count'); console.log(scope_length)
                              var rowSum = 0;
                              for (var j = 2; j < rowcount_first-1; j++) {

                                var total_col = 0;
                                for (var i = 1; i <= scope_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[j]; //console.log(cell)
                                    var input = row.cells[j].getElementsByTagName("input")[0]; 
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); //console.log(total_col)
                                }
                                var input_col = document.getElementById("input"+row_length+"_"+j); //sum to last row
                               console.log(input_col)
                                input_col.value = total_col;
                                var sum_col = document.getElementById("sum_"+j);        console.log(sum_col)
                                if(sum_col){ sum_col.value=total_col;}
                                total_col = 0;
                                
                              }

                                nf();
}

//**********************To calculate jumlah cost of perunding table****************************
function checkperundingjumlah(perundingjumlahid, thistextbox){
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



  var totaljumlah = manmonth*multiplier*salary;

  if(isNaN(totaljumlah)){
    totaljumlah = 0
    
  } 
  
  amount.val(totaljumlah);
  

  

  componentjumlahkos.val(Math.round(totaljumlah  * 1000) / 1000);

  
 
  let all_jumlah = document.querySelectorAll("[id^='"+perundingjumlahid+"']");
  let all_jumlah1 = document.querySelectorAll("[id^='perundingjumlahkos1']");
  let all_jumlah0 = document.querySelectorAll("[id^='perundingjumlahkos0']");
  

    if(all_jumlah1.length>0 || all_jumlah0.length>0){
      sumjumlah0=0
      sumjumlah1=0
      for(let k=1;k<all_jumlah0.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah0[k].value))){
          sumjumlah0+= parseInt(all_jumlah0[k].value); 
        }      
      }
      for(let k=1;k<all_jumlah1.length;k++)
      {
        if(!isNaN(parseInt(all_jumlah1[k].value))){
          sumjumlah1+= parseInt(all_jumlah1[k].value); 
        }      
      }

      totaljumlah = sumjumlah0 + sumjumlah1;
      console.log('Total cost is: '+totaljumlah)
      let totaljumlahkos = document.querySelector("[id^='totaljumlahkos']");
      totaljumlahkos.value = totaljumlah;


      if(totaljumlah < all_jumlah[0].value){
        all_jumlah0[0].style="background: rgb(205, 192, 111)";
        all_jumlah1[0].style="background: rgb(205, 192, 111)";
        totaljumlahkos.style="background: rgb(205, 192, 111)";
      }
      else if(totaljumlah > all_jumlah[0].value){
        all_jumlah0[0].style="background: rgb(212, 118, 118)";
        all_jumlah1[0].style="background: rgb(212, 118, 118)";
        totaljumlahkos.style="background: rgb(212, 118, 118)";
      }
      else{
        all_jumlah0[0].style="background: rgb(117,216,128)";
        all_jumlah1[0].style="background: rgb(117,216,128)";
        totaljumlahkos.style="background: rgb(117,216,128)";
      }
    }  
  //}
nf();
  
  
}
//**************************************************************************

//#################################### calculate sum on change table 5th #######################################//
function calculateJumlah(row,col)
{
  //console.log(row)
  //console.log(col)
  var table = document.getElementById("perkara_table_kewagan");
                              var row_length = table.rows.length-1; //console.log(row_length)
                              var rows = table.rows[row];        //console.log(rows);

                              var total = 0;
                              for (var j = 1; j < rows.cells.length-1; j++) {
                                var value = removecomma(document.getElementById("inputper"+row+'_'+j).value); //console.log(value);
                                total = parseFloat(total)+parseFloat(value);
                              }
                             // console.log(total)
                                var input = document.getElementById("jumlahper"+row); //console.log(input)
                                input.value = total+'.00';
                                total = 0;

                                var actual = document.getElementById("inputper"+row);

                                var total_col = 0;

                                for (var i = 1; i < row_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[col]; console.log(cell)
                                    var input = row.cells[col].getElementsByTagName("input")[0]; //console.log(input)
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); //console.log(total_col)

                                }
                                var input_col = document.getElementById("inputper"+row_length+"_"+col); //sum to last row
                                input_col.value = total_col+'.00';
                                total_col = 0;

                                var total_jumlah = 0;
                                for (var i = 1; i < row_length; i++) {
                                    var input = document.getElementById("jumlahper"+i);
                                    var value = removecomma(input.value); 
                                    total_jumlah = parseFloat(total_jumlah)+parseFloat(value); //console.log(total_jumlah)
                                }
                                var jumlah_col = document.getElementById("jumlahper"+row_length);
                                jumlah_col.value = total_jumlah+'.00';
                                total_jumlah = 0;                         
}

//------------------ onload for 5th table----------------------
function onLoadPerkara()
{
                              var table = document.getElementById("perkara_table_kewagan"); console.log(table.rows)
                              var row_length = table.rows.length-1; 
                              var rowcount_first = table.rows[0].cells.length; console.log(rowcount_first)
                              // var rowcount_first= window.localStorage.getItem('rowcount'); console.log(rowcount_first)
                              // var scope_length= window.localStorage.getItem('scope_count'); console.log(scope_length)
                              for (var j = 1; j < rowcount_first-1; j++) {

                                var total_col = 0;

                                for (var i = 1; i < row_length; i++) {
                                    var row = table.rows[i]; 
                                    var cell = row.cells[j]; console.log(cell)
                                    var input = row.cells[j].getElementsByTagName("input")[0]; //console.log(input)
                                    var value = removecomma(input.value); 
                                    total_col = parseFloat(total_col)+parseFloat(value); //console.log(total_col)

                                }
                                var input_col = document.getElementById("inputper"+row_length+"_"+j); //sum to last row
                                input_col.value = total_col+'.00';
                                total_col = 0;                                
                              }
}

// -----Calculate cost for total main works ends ------

function nf(){
    $('.input-element').toArray().forEach(function(field){
    new Cleave(field, {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
    });
});
}

//----for removing commas from numbers-----------------------------------------------------------------
function removecomma(num){
      
      num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
      num=parseFloat(num,10);
      return num;
    }
//----for removing commas from numbers ends-----------------------------------------------------------------

//----------getYears------------------------------------------
function getYears(date1,date2)
  {
    //console.log(date1)
    //console.log(date2)
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

      return date_array;
  }
//------------------------------------------------------------

//------------ VAE DATA--------------

axios({
        method: 'GET',
        url: "{{ env('API_URL') }}"+'api/project/fetch_vae_data/'+{{$id}},
        responseType: 'json',   
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
        },     
        })
        .then(function (result) {
          var data=result.data.data;  console.log(data)
          if(data.length!=0)
          {
                console.log("data")
                if(data[0].GNO_status==1){ $gno="HIJAU"; }else{ $gno="MERAH"; }
                document.getElementById("acat_data").innerHTML = data[0].ACAT_score;
                document.getElementById("gno_status").innerHTML = $gno;

          }
          else
          {
                console.log("nodata")
          }

        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

//project details for vae----------

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

            }
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })


//------------ VAE DATA--------------

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
                         if(j==1){ yrs= data[i].yr_1; }else if(j==2){ yrs= data[i].yr_2; }
                         else if(j==3){ yrs= data[i].yr_3;} else if(j==4){ yrs= data[i].yr_4; }
                         else if(j==5){ yrs= data[i].yr_5;} else if(j==6){ yrs= data[i].yr_6; }
                         else if(j==7){ yrs= data[i].yr_7;} else if(j==8){ yrs= data[i].yr_8; }
                         else if(j==9){ yrs= data[i].yr_9;} else { yrs= data[i].yr_10; }
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
                 
                }
            }
          })
          .catch(function (error) {
              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
          })

//----------- output/outcome -------------

axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/project/outputpage-details/" + {{$id}},
        responseType: 'json'        
        })
        .then(function (response) { console.log("output")
            console.log(response)
            output = response.data.data.output
            outcome = response.data.data.outcome

            if(output.length>0)
            {
               var table = document.getElementById("output_tbody");
                for(let i=0;i<output.length;i++)
                {
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    cell1.innerHTML = i+1;
                    cell2.innerHTML = output[i].output_proj;
                }
            }

            if(outcome.length>0)
            {
               var table = document.getElementById("outcome_tbody");
                for(let i=0;i<outcome.length;i++)
                {
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    cell1.innerHTML = i+1;
                    cell2.innerHTML = outcome[i].Projek_Outcome;
                }
            }
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        
//---------------- negeri data--------------
axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/project/negeri-details-ringkasan/" + {{$id}},
        responseType: 'json'        
        })
        .then(function (response) { console.log("negeri")
            console.log(response)
            const documents = response.data.data.documents;
            const negeri = response.data.data.negeri[0]; console.log(negeri)
            var negeridata=response.data.data.negeri;
            var negeridatalength = negeridata.length;
            console.log(negeridatalength)
            for(i=0;i<negeridatalength;i++){
              // console.log(response.data.data.negeri[i].dun.nama_dun==undefined)
              $("#table_ring").append(
                '<tr class="border"><td class="border" id="negeri_ring_table'+response.data.data.negeri[i]+'">'+response.data.data.negeri[i].negeri.nama_negeri+'</td>'+
                '<td class="border" id="daerah_ring_table'+response.data.data.negeri[i]+'">'+response.data.data.negeri[i].daerah.nama_daerah+'</td>'+
                '<td class="border" id="parlimen_ring_table'+response.data.data.negeri[i]+'">'+response.data.data.negeri[i].parlimen.nama_parlimen+'</td>'+
                '<td class="border" id="dun_ring_table'+response.data.data.negeri[i]+'">'+response.data.data.negeri[i].dun.nama_dun+'</td></tr>'
              )
            }
            

            // if(negeri)
            // {
            //   document.getElementById('negeri_ring').innerHTML = negeri.negeri.nama_negeri
            //   document.getElementById('daerah_ring').innerHTML = negeri.daerah.nama_daerah
            //   document.getElementById('parlimen_ring').innerHTML = negeri.parlimen.nama_parlimen
            //   document.getElementById('dun_ring').innerHTML = negeri.dun.nama_dun
            // //   console.log(negeri.)            
            // }

            if(documents.length>0)
            {
              console.log(documents)
                if(documents[0])
                {
                  document.getElementById("img_negeri_1").src = response.data.data.docs1;
                  document.getElementById('desc_negeri_1').innerHTML = documents[0].keterangan;
                }
                else
                {
                  document.getElementById('img_1_div').classList.add("d-none");
                }

                if(documents[1])
                {
                  document.getElementById("img_negeri_2").src = response.data.data.docs2;
                  document.getElementById('desc_negeri_2').innerHTML = documents[1].keterangan;
                }
                else
                {
                  document.getElementById('img_2_div').classList.add("d-none");
                }

                if(documents[2])
                { 
                  document.getElementById("img_negeri_3").src = response.data.data.docs3;
                  document.getElementById('desc_negeri_3').innerHTML = documents[2].keterangan;
                }
                else
                {
                  document.getElementById('img_3_div').classList.add("d-none");
                }
            }
            else
            {
              document.getElementById('img_1_div').classList.add("d-none");
              document.getElementById('img_2_div').classList.add("d-none");
              document.getElementById('img_3_div').classList.add("d-none");
            }

           
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");


//------------------------------- creative index------------------------------------
axios.defaults.headers.common["Authorization"] = api_token
          axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/getkewanganprojek-details/" + {{$id}},
            responseType: 'json'        
          })
          .then(function (response) { 
            console.log('kewangan details')
            data = response.data.data
            console.log(data);
            if(data) {
              var total_b_c=parseFloat(data.kos_keseluruhan_oe)+parseFloat(data.kos_keseluruhan); 
            }
            else {
              var total_b_c=0; 
            }
            localStorage.setItem("total_b_c", total_b_c);  
            console.log("total")
            console.log(total_b_c)
          })
      axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/project/ci/" + {{$id}},
          responseType: 'json'        
          })
          .then(function (response) { 
            console.log('CI');
              impak = response.data.data.impak;               console.log(impak)
              if(impak.length>0)
              {
                let all_total = 0.00;
                for($i=0;$i<impak.length;$i++){
                  all_total = all_total + parseFloat(impak[$i].jumlah_impak)
                }
                console.log(all_total);
                const total_b_c=localStorage.getItem('total_b_c');
                let ci = all_total/total_b_c;  console.log(ci)
                if(ci=='Infinity')
                {
                  document.getElementById("ci_tot").innerHTML = '0.00';
                }
                else
                {
                  document.getElementById("ci_tot").innerHTML = ci.toFixed(2);
                }

              }

          });

        });
        
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
        
</script>