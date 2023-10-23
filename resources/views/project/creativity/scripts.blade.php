<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>

function nf(){
    console.log('nf called');
    $('.input-element').toArray().forEach(function(field){
    new Cleave(field, {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
    });
    });

}

function removecomma(num){
      
      num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
      num=parseFloat(num,10);
      return num;
    }

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
          
});
  

  
  $(document).ready(function () {  
  
    $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");
          const api_url = "{{ env('API_URL') }}"
          const api_token = "Bearer "+ window.localStorage.getItem('token');
          let outcome_template = `<div id="outcome_details" class="outcome-Add"> 
                              <div class="d-flex align-items-center mb-3 outcome-con">
                              <input 
                              type="text" id="outcome_input"
                                  placeholder=""
                                  class="form-control"
                              />
                              <button type="button" id="outcome_button" class="p-2" style="background:transparent;border:none">
                                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                              </button>
                              
                              </div>
                          </div>`                  
                  //$('#outcome_content').append(outcome_template);
                  
                  // let all_outcome_btn = document.querySelectorAll(
                  //     ".out-come-container div div div button"
                  // );
                  // let all_outcome_div = document.querySelectorAll(
                  //     ".out-come-container div div"
                  // );
  
                  let all_outcome_btn = document.querySelectorAll(
                      "[id^='outcome_button']"                    
                  ); 
                  let all_outcome_div = document.querySelectorAll(
                      "[id^='outcome_details']"                    
                  ); 
                  
                  all_outcome_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_outcome_div[i].remove();                        
                      });
                  });
              

            
            
                  
          $(".add_outcome").click(function(){
              let outcome_template = `<div id="outcome_details" class="outcome-Add"> 
                              <div class="d-flex align-items-center mb-3 outcome-con">
                              <input 
                              type="text" id="outcome_input"
                                  placeholder=""
                                  class="form-control"
                              />
                              <button type="button" id="outcome_button" class="p-2" style="background:transparent;border:none">
                                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                              </button>
                              
                              </div>
                          </div>`                 
                  $('#outcome_content').append(outcome_template);  
                  
                  // let all_outcome_btn = document.querySelectorAll(
                  //     ".out-come-container div div div button"
                  // );
                  // let all_outcome_div = document.querySelectorAll(
                  //     ".out-come-container div div"
                  // );
  
                  let all_outcome_btn = document.querySelectorAll(
                      "[id^='outcome_button']"                    
                  ); 
                  let all_outcome_div = document.querySelectorAll(
                      "[id^='outcome_details']"                    
                  ); 
                  
                  all_outcome_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_outcome_div[i].remove();                        
                      });
                  });
          })
          let output_template = `<div id="output_details" class="d-flex align-items-center mb-3 outcome-con">
                        <input
                          type="text" id="output_input"
                          class="form-control"
                          placeholder=""
                        />
                        <button type="button" id="output_button" class="p-2" style="background:transparent;border:none">
                          <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                              </button>
                      </div>`                  
                  //$('#output_content').append(output_template);  
                  
                  let all_output_btn = document.querySelectorAll(
                      "[id^='output_button']"                    
                  ); 
                  let all_output_div = document.querySelectorAll(
                      "[id^='output_details']"                    
                  ); 
                  
                  all_output_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_output_div[i].remove();                        
                      });
                  });
  
  
          $(".add_output").click(function(){
              console.log('output clicked')
              let output_template = `<div id="output_details" class="d-flex align-items-center mb-3 outcome-con">
                        <input
                          type="text" id="output_input"
                          class="form-control"
                          placeholder=""
                        />
                        <button type="button" id="output_button" class="p-2" style="background:transparent;border:none">
                          <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                              </button>
                      </div>`                  
                  $('#output_content').append(output_template);  
                  
                  let all_output_btn = document.querySelectorAll(
                      "[id^='output_button']"                    
                  ); 
                  let all_output_div = document.querySelectorAll(
                      "[id^='output_details']"                    
                  ); 
                  
                  all_output_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_output_div[i].remove();                        
                      });
                  });
          })

          let impak_template = `<div id="impak_details" class="impak-content">
                      <div class="input_container">
                        <div class="d-flex minus_justify">
                          <button type="button" id="impak_button" class="py-2" style="background:transparent;border:none">
                            <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                          </button>
                        </div>
                      </div>
                      <div class="input_container">
                        <div class="row p-0">
                          <div class="col-lg-2 col-xs-12 d-flex info_justify">
                            <label for="keteranga-impak" class="input-textarea-label">
                              Keterangan Impak
                            </label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop">
                                  Impak kepada kumpulan sasar memberi kesan langsung positif dan negatif serta 6 parameter CI.
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-10 col-xs-12 form-group input_form_group">
                            <input
                              type="text"
                              id="keteranga-impak"
                              placeholder=""
                              class="form-control input-textarea"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row p-0">
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="kuantiti-first" class="">Kuantiti</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop_2">
                                  Kuantiti penerima impak
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-7 col-xs-12 form-group">
                              <input
                              type="text"
                              value="0"
                              id="kuantiti-first"
                              placeholder="1"
                              class="form-control input-element"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="Nillai-first">Nilai (RM)</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop_2">
                                Impak kepada Nilai Kewangan
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8 col-xs-12 form-group">
                              <input
                              type="text" 
                              id="Nillai-first"
                              placeholder="" value="0"
                              class="form-control input-element"
                            />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-2 col-xs-12 d-flex info_justify">
                            <label
                            for="Penerangan-first"
                            class="input-textarea-label"
                            >Penerangan Nilai Sumber</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop">
                              Penerangan sumber hendaklah jelas dan betul  serta kenyataan proksi dengan sumber
                              </div>
                            </div>
                          </div>
                            
                          <div class="col-lg-10 col-xs-12 form-group input_form_group">
                            <textarea
                                class="form-control w-100"
                                id="Penerangan-first"
                                rows="3"
                              ></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row p-0">
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="Jangka-first" class="">Jangka Masa Impak (Tahun)</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop">
                                Penilai perlulah tepat dalam menilai jangka masa impak
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-7 col-xs-12 form-group">
                              <input
                              type="text" value="0"
                              id="Jangka-first"
                              placeholder="0" value="0"
                              class="form-control input-element"
                            />
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="Masa-first"
                              >Jumlah Anggaran Impak Keseluruhan (RM)</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop">
                                Jumlah anggaran impak ialah (kuantiti x nilai  x jangka masa impak)
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8 col-xs-12 form-group">
                              <input
                              type="text" 
                              id="Masa-first" readonly
                              placeholder="" value="0"
                              class="form-control input-element input-grey"
                            />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>`                  
                  //$('#impak_content').append(impak_template);  
                  let all_nilai = document.querySelectorAll(
                      "[id^='Nillai-first']"
                  ); 
                  let all_jangka = document.querySelectorAll(
                      "[id^='Jangka-first']"                    
                  ); 

                  let all_kuantiti = document.querySelectorAll(
                  "[id^='kuantiti-first']"
                  ); 
  
                  let all_jumlah = document.querySelectorAll(
                      "[id^='Masa-first']"                    
                  ); 
  
                  let all_impak_btn = document.querySelectorAll(
                      "[id^='impak_button']"                    
                  ); 
                  let all_impak_div = document.querySelectorAll(
                      "[id^='impak_details']"                    
                  ); 
                  
                  all_impak_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_impak_div[i].remove();                        
                      });
                  });
                  
                  all_nilai.forEach((tc, i) => {
                    console.log(all_nilai[i].value)
                      tc.addEventListener("change", function(evt)  {                        
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          console.log(jumlah)
                          console.log('2')
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                        nf()
                          
                      });
                      nf()
                      
                  });  
                  
                  all_jangka.forEach((tc, i) => {
                    console.log(all_jangka[i].value)
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                                 nf()                   
                      });
                      nf()
                  });

                  all_kuantiti.forEach((tc, i) => {
                    console.log(all_kuantiti[i].value)
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                         nf()                          
                      });
                      nf()
                  });
  
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
            
  
          $(".add_impak").click(function(){
              console.log('impak clicked')
              let impak_template = `<div id="impak_details" class="impak-content">
                      <div class="input_container">
                        <div class="d-flex minus_justify">
                          <button type="button" id="impak_button" class="py-2" style="background:transparent;border:none">
                            <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                          </button>
                        </div>
                      </div>
                      <div class="input_container">
                        <div class="row p-0">
                          <div class="col-lg-2 col-xs-12 d-flex info_justify">
                            <label for="keteranga-impak" class="input-textarea-label">
                              Keterangan Impak</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop">
                                  Impak kepada kumpulan sasar memberi kesan langsung positif dan negatif serta 6 parameter CI.
                                </div>
                            </div>
                          </div>
                            
                          <div class="col-lg-10 col-xs-12 form-group input_form_group">
                            <input
                              type="text"
                              id="keteranga-impak"
                              placeholder=""
                              class="form-control input-textarea"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row p-0">
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="kuantiti-first" class="">Kuantiti</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop_2">
                                Kuantiti penerima impak
                                </div>
                              </div>  
                            </div>
                            <div class="col-lg-7 col-xs-12 form-group">
                              <input
                              type="text"
                              value="0"
                              id="kuantiti-first"
                              placeholder="1"
                              class="form-control input-element"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="Nillai-first">Nilai (RM)</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop_2">
                                Impak kepada Nilai Kewangan
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8 col-xs-12 form-group">
                              <input
                              type="text" 
                              id="Nillai-first"
                              placeholder="" value="0"
                              class="form-control input-element"
                            />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="input_container">
                        <div class="row input_fill_content">
                          <div class="col-lg-2 col-xs-12 d-flex info_justify">
                            <label
                            for="Penerangan-first"
                            class="input-textarea-label"
                            >Penerangan Nilai Sumber</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop">
                              Penerangan sumber hendaklah jelas dan betul  serta kenyataan proksi dengan sumber
                              </div>
                            </div>
                          </div>
                            
                          <div class="col-lg-10 col-xs-12 form-group input_form_group">
                            <textarea
                                class="form-control w-100"
                                id="Penerangan-first"
                                rows="3"
                              ></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row p-0">
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="Jangka-first" class="">Jangka Masa Impak (Tahun)</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop">
                                Penilai perlulah tepat dalam menilai jangka masa impak
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-7 col-xs-12 form-group">
                              <input
                              type="text" value="0"
                              id="Jangka-first"
                              placeholder="0" value="0"
                              class="form-control input-element"
                            />
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="row align-items-center">
                            <div class="col-lg-4 col-xs-12 d-flex info_justify">
                              <label for="Masa-first"
                              >Jumlah Anggaran Impak Keseluruhan (RM)</label>
                              <div>
                                <button type="button" class="pop_btn border-0" style="background: none;">
                                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                                </button>
                                <div class="pop_content d-none custom_pop">
                                Jumlah anggaran impak ialah (kuantiti x nilai  x jangka masa impak)
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8 col-xs-12 form-group">
                              <input
                              type="text" 
                              id="Masa-first" readonly
                              placeholder="" value="0"
                              class="form-control input-element input-grey"
                            />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>`                  
                  $('#impak_content').append(impak_template);  
                  let all_nilai = document.querySelectorAll(
                      "[id^='Nillai-first']"
                  ); 
                  let all_jangka = document.querySelectorAll(
                      "[id^='Jangka-first']"                    
                  ); 

                  let all_kuantiti = document.querySelectorAll(
                  "[id^='kuantiti-first']"
                  ); 
  
                  let all_jumlah = document.querySelectorAll(
                      "[id^='Masa-first']"                    
                  ); 
  
                  let all_impak_btn = document.querySelectorAll(
                      "[id^='impak_button']"                    
                  ); 
                  let all_impak_div = document.querySelectorAll(
                      "[id^='impak_details']"                    
                  ); 
                  
                  all_impak_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_impak_div[i].remove();                        
                      });
                  });
                  
                  all_nilai.forEach((tc, i) => {
                      tc.addEventListener("change", function(evt)  {                        
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          console.log(jumlah)
                          console.log('3')
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                            
                          })
                          let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                            $('#ci_value').val(ci.toFixed(1))
                          nf()
                      });
                      nf()
                  });  
                  
                  all_jangka.forEach((tc, i) => {
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                            
                          })
                          let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                            $('#ci_value').val(ci.toFixed(1))
                                    nf()            
                      });
                      nf()
                  });

                  all_kuantiti.forEach((tc, i) => {
                    console.log(all_kuantiti[i].value)
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                                nf()                    
                      });
                      nf()
                  });
  
                  let pop_content_all = document.querySelectorAll(".pop_content");
                  let pop_btn_all = document.querySelectorAll(".pop_btn");
                  if (pop_btn_all) {
                    pop_btn_all.forEach((pba, i) => {
                      pba.addEventListener("mouseover", (e) => {
                        e.preventDefault();
                        pop_content_all[i].classList.remove("d-none");
                      });
                      pba.addEventListener("mouseout", (e) => {
                        e.preventDefault();
                        pop_content_all[i].classList.add("d-none");
                      });
                    });
                  }
          })
          
          
          $("#CISubmit").click(function(event){  
              console.log('cisubmitted')
              $("div.spanner").addClass("show");
              $("div.overlay").addClass("show");
              outcome_validation = true
              output_validation = true
              impak_validation = true
              let all_outcome_div = document.querySelectorAll(
                      "[id^='outcome_input']"
              ); 
              
              outcome = []
              for (var i = 0;i < all_outcome_div.length; i++) {                
                  console.log(all_outcome_div[i].value)
                  if(all_outcome_div[i].value == ''){
                    outcome_validation = false
                    all_outcome_div[i].style.borderColor = 'red';
                    all_outcome_div[i].focus()
                  }else {
                    outcome.push(all_outcome_div[i].value)
                    all_outcome_div[i].style.borderColor = '#ced4da';
                  }
                  
              }
  
              // let all_output_div = document.querySelectorAll(
              //         ".out-put-container div  div input"
              // );
              output = []
              let all_output_div = document.querySelectorAll(
                      "[id^='output_input']"
              ); 
              //console.log(all_output_div)
              for (var i = 0;i < all_output_div.length; i++) {                
                  console.log(all_output_div[i].value) 
                  if(all_output_div[i].value == ''){
                    output_validation = false
                    all_output_div[i].style.borderColor = 'red';
                    all_output_div[i].focus()
                  }else {
                    output.push(all_output_div[i].value)
                    all_output_div[i].style.borderColor = '#ced4da';
                  }
                  
              }
  
  
  
              let all_nilai = document.querySelectorAll(
                      "[id^='Nillai-first']"
              ); 
              let all_jangka = document.querySelectorAll(
                  "[id^='Jangka-first']"                    
              ); 
  
              let all_jumlah = document.querySelectorAll(
                  "[id^='Masa-first']"                    
              );
              
              let all_keterangan = document.querySelectorAll(
                  "[id^='keteranga-impak']"                    
              );
  
              let all_kuantiti = document.querySelectorAll(
                  "[id^='kuantiti-first']"
              );
  
              let all_penerangan = document.querySelectorAll(
                  "[id^='Penerangan-first']"
              );
  
              // let all_impak_div = document.querySelectorAll(
              //     ".impak-container div"
              // );
  
              let all_impak_div = document.querySelectorAll(
                  "[id^='impak_details']"
              );
              // console.log(all_impak_div.length)
              impak = []  
              for (var i = 0;i < all_impak_div.length; i++) {
                data= {};
                if(all_keterangan[i].value == ''){
                    impak_validation = false
                    all_keterangan[i].style.borderColor = 'red';
                    all_keterangan[i].focus()
                }else {
                  data.keteranga = all_keterangan[i].value
                  all_keterangan[i].style.borderColor = '#ced4da';
                }
                
                if(all_kuantiti[i].value == ''){
                    impak_validation = false
                    all_kuantiti[i].style.borderColor = 'red';
                    all_kuantiti[i].focus()
                }else {
                  data.kuantiti= all_kuantiti[i].value
                  all_kuantiti[i].style.borderColor = '#ced4da';
                }
                if(all_nilai[i].value == ''){
                    impak_validation = false
                    all_nilai[i].style.borderColor = 'red';
                    all_nilai[i].focus()
                }else {
                  data.nilai = all_nilai[i].value
                  all_nilai[i].style.borderColor = '#ced4da';
                }
                if(all_penerangan[i].value == ''){
                    impak_validation = false
                    all_penerangan[i].style.borderColor = 'red';
                    all_penerangan[i].focus()
                }else {
                  data.penerangan = all_penerangan[i].value
                  all_penerangan[i].style.borderColor = '#ced4da';
                }              
                if(all_jangka[i].value == ''){
                    impak_validation = false
                    all_jangka[i].style.borderColor = 'red';
                    all_jangka[i].focus()
                }else {
                  data.jangka = all_jangka[i].value
                  all_jangka[i].style.borderColor = '#ced4da';
                }
                if(all_jumlah[i].value == ''){
                    impak_validation = false
                    all_jumlah[i].style.borderColor = 'red';
                    all_jumlah[i].focus()
                }else {
                  data.jumlah = all_jumlah[i].value
                  all_jumlah[i].style.borderColor = '#ced4da';
                } 
  
                if(impak_validation) {
                  impak.push(JSON.stringify(data))
                }
                
              }
  
              var formData = new FormData();
              outcome.forEach((item) => {
                  formData.append('outcome[]', item);
              }); 
  
              output.forEach((item) => {
                  formData.append('output[]', item);
              }); 
  
              impak.forEach((item) => {
                console.log(item)
                  formData.append('impak[]', item);
              }); 
          
              // console.log(outcome)
              // console.log(output)
              //console.log(impak)
              formData.append('total_jumlah', document.getElementById('kos_seluruhan_impak').value)
              formData.append('ci',document.getElementById('ci_value').value)
              
              formData.append('id', {{$id}})
              formData.append('user_id', {{Auth::user()->id}})
              axios.defaults.headers.common["Authorization"] = api_token
  
              if(outcome_validation && output_validation && impak_validation) {
                axios({
                    method: 'post',
                    url: api_url+"api/project/ci",
                    responseType: 'json',
                    data: formData
                    })
                    .then(function (response) { 
                        console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        if(response.data.code == 200) {                            
                          //alert('success saved')
                          $("#add_role_sucess_modal").modal('show');
                          $("#tutup_new").click(function(){
                          var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'creativity']) }}"
                          //url = url.replace(":id", response.data.data.id)
                          url = url.replace(":id", {{$id}})
                          url = url.replace(":status", {{$status}})
                          url = url.replace(":user_id", {{$user_id}})
                          window.location.href = url
                        })
                        }else {
                          alert('error while saving project')
                        }
                        
                    }) 
                    .catch(function (error) {
                      $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    })
              }else {
                // alert('validation error')
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
              }
                         
          })
  
          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");
          
          axios.defaults.headers.common["Authorization"] = api_token
          axios({
            method: 'get',
            url: api_url+"api/project/getkewanganprojek-details/" + {{$id}},
            responseType: 'json'        
          })
          .then(function (response) { 
            console.log('kewangan details')
            data = response.data.data
            console.log(data);
            if(data) {
              $('#kos_seluruhan_oe').val(parseFloat(data.kos_keseluruhan_oe))
              $('#kos_seluruhan').val(parseFloat(data.kos_keseluruhan))
            }
            else {
              $('#kos_seluruhan_oe').val(0)
              $('#kos_seluruhan').val(0)
            }
          })

          axios.defaults.headers.common["Authorization"] = api_token;




axios({
  method: 'get',
  url: "{{ env('API_URL') }}" + "api/project/outputpage-details/" + {{$id}},
  responseType: 'json'
})
.then(function (response) {
    console.log("outcome");
    console.log(response);
    output = response.data.data.output;
    outcome = response.data.data.outcome;

  })
  .catch(function (error) {
    console.error(error);
  });

// ...

// Define a mapping of unit_id to unit names
var unitIdToNameMap = {};

// Make an API call to fetch unit details and populate the mapping
axios({
  method: 'get',
  url: api_url + "api/project/unit-details",
  responseType: 'json',
})
  .then(function (response) {
    if (response.data && response.data.data) {
      response.data.data.forEach(function (item) {
        unitIdToNameMap[item.id] = item.nama_unit;
      });

      // Now, you have the mapping, and you can use it to update the outcomeUnit and outputUnit containers
      var outcomeUnitContainer = document.getElementById("outcomeUnitContainer");
      var outputUnitContainer = document.getElementById("outputUnitContainer");

      // Iterate through the 'outcome' array and use the mapping to get the unit names.
      for (let i = 0; i < outcome.length; i++) {
        var unitId = outcome[i].unit_id;
        if (unitIdToNameMap.hasOwnProperty(unitId)) {
          // Create a new input field for each unit and set its value.
          const outcomeUnitInput = document.createElement("input");
          outcomeUnitInput.type = "text";
          outcomeUnitInput.className = "form-control";
          outcomeUnitInput.value = unitIdToNameMap[unitId];

          // Append the new input field to the outcomeUnitContainer.
          outcomeUnitContainer.appendChild(outcomeUnitInput);
        }
      }

      // Iterate through the 'output' array and use the mapping to get the unit names.
      for (let i = 0; i < output.length; i++) {
        var unitId = output[i].unit_id;
        if (unitIdToNameMap.hasOwnProperty(unitId)) {
          // Create a new input field for each unit and set its value.
          var outputUnitInput = document.createElement("input");
          outputUnitInput.type = "text";
          outputUnitInput.className = "form-control";
          outputUnitInput.value = unitIdToNameMap[unitId];

          // Append the new input field to the outputUnitContainer.
          outputUnitContainer.appendChild(outputUnitInput);
        }
      }
    }
  })
  .catch(function (error) {
    console.error(error);
  });



//----------- output/outcome -------------

axios.defaults.headers.common["Authorization"] = api_token;

axios({
    method: 'get',
    url: "{{ env('API_URL') }}" + "api/project/outputpage-details/" + {{$id}},
    responseType: 'json'
})
.then(function (response) {
    console.log("output");
    console.log(response);
    var output = response.data.data.output;
    var outcome = response.data.data.outcome;

    if (output.length > 0) {
        var outputInputFieldsContainer = document.getElementById("output_input_fields_container");

        for (let i = 0; i < output.length; i++) {
            
          var outputRow = document.createElement("div");
            outputRow.classList.add("justify-content-between")
            outputRow.classList.add("row"); // Create a Bootstrap row
            outputRow.classList.add("mb-5");

            // Create a column for "output_proj"
            var outputProjCol = document.createElement("div");
            outputProjCol.classList.add("col-md-12"); // Adjust the column size as needed

            var outputProjLabel = document.createElement("label");
            outputProjLabel.textContent = "Output";
            outputProjLabel.classList.add("sub-topic");
            outputProjLabel.classList.add("pl-0");
            outputProjLabel.classList.add("pt-3");
            outputProjCol.appendChild(outputProjLabel);

            var inputField = document.createElement("input");
            inputField.classList.add("form-control");
            inputField.style = "margin-bottom:30px;"
            inputField.disabled = true;
            inputField.type = "text";
            inputField.name = "output_proj_" + i;
            inputField.value = output[i].output_proj;
            outputProjCol.appendChild(inputField);

           

            // Create a column for "Kuantiti"
            var kuantitiCol = document.createElement("div");
            kuantitiCol.classList.add("col-md-4"); // Adjust the column size as needed

            var outputProjLabel = document.createElement("label");
            outputProjLabel.textContent = "Kuantiti/Bilangan";
            kuantitiCol.appendChild(outputProjLabel);

            if (output[i].Kuantiti) {
                var inputField2 = document.createElement("input");
                inputField2.classList.add("form-control");
                inputField2.disabled = true;
                inputField2.type = "text";
                inputField2.value = output[i].Kuantiti;
                kuantitiCol.appendChild(inputField2);
            }

            // Create a column for "unit_id"
            var unitIdCol = document.createElement("div");
            
            unitIdCol.classList.add("col-md-4"); // Adjust the column size as needed

            var outputProjLabel = document.createElement("label");
            outputProjLabel.textContent = "Unit";
            unitIdCol.appendChild(outputProjLabel);

            if (output[i].unit_id) {
                var inputField3 = document.createElement("input");
                inputField3.classList.add("form-control");
                inputField3.disabled = true;
                inputField3.type = "text";
                inputField3.value =  inputField3.value = unitIdToNameMap[output[i].unit_id]; 
                
                unitIdCol.appendChild(inputField3);
            }

            // Append columns to the row
            outputRow.appendChild(outputProjCol);
            outputRow.appendChild(kuantitiCol);
            outputRow.appendChild(unitIdCol);

            // Append the row to the container
            outputInputFieldsContainer.appendChild(outputRow);
        }
    }


    if (outcome.length > 0) {
        var outcomeInputFieldsContainer = document.getElementById("input_fields_container");

        for (let i = 0; i < outcome.length; i++) {
            
          var outputRow = document.createElement("div");
            outputRow.classList.add("justify-content-between")
            outputRow.classList.add("row"); // Create a Bootstrap row
            outputRow.classList.add("mb-5");

            // Create a column for "output_proj"
            var outputProjCol = document.createElement("div");
            outputProjCol.classList.add("col-md-12"); // Adjust the column size as needed

            var outputProjLabel = document.createElement("label");
            outputProjLabel.textContent = "Outcome";
            outputProjLabel.classList.add("sub-topic");
            outputProjLabel.classList.add("pl-0");
            outputProjLabel.classList.add("pt-3");
            outputProjCol.appendChild(outputProjLabel);

            var inputField = document.createElement("input");
            inputField.classList.add("form-control");
            inputField.style = "margin-bottom:30px;"
            inputField.disabled = true;
            inputField.type = "text";
            inputField.value = outcome[i].Projek_Outcome;
            outputProjCol.appendChild(inputField);

           

            // Create a column for "Kuantiti"
            var kuantitiCol = document.createElement("div");
            kuantitiCol.classList.add("col-md-4"); // Adjust the column size as needed

            var outputProjLabel = document.createElement("label");
            outputProjLabel.textContent = "Kuantiti/Bilangan";
            kuantitiCol.appendChild(outputProjLabel);

            if (outcome[i].Kuantiti) {
                var inputField2 = document.createElement("input");
                inputField2.classList.add("form-control");
                inputField2.disabled = true;
                inputField2.type = "text";
                inputField2.value = outcome[i].Kuantiti;
                kuantitiCol.appendChild(inputField2);
            }

            // Create a column for "unit_id"
            var unitIdCol = document.createElement("div");
            unitIdCol.classList.add("col-md-4"); // Adjust the column size as needed

            var outputProjLabel = document.createElement("label");
            outputProjLabel.textContent = "Unit";
            unitIdCol.appendChild(outputProjLabel);

            if (outcome[i].unit_id) {
                var inputField3 = document.createElement("input");
                inputField3.classList.add("form-control");
                inputField3.disabled = true;
                inputField3.type = "text";
                inputField3.value =  inputField3.value = unitIdToNameMap[outcome[i].unit_id]; 
                unitIdCol.appendChild(inputField3);
            }

            // Append columns to the row
            outputRow.appendChild(outputProjCol);
            outputRow.appendChild(kuantitiCol);
            outputRow.appendChild(unitIdCol);

            // Append the row to the container
            outcomeInputFieldsContainer.appendChild(outputRow);
        }
    }


})
.catch(function (error) {
    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
});






     

          
          axios({
          method: 'get',
          url: api_url+"api/project/ci/" + {{$id}},
          responseType: 'json'        
          })
          .then(function (response) { 
            console.log('CI');
              console.log(response)
              output = response.data.data.output
              outcome = response.data.data.outcome
              impak = response.data.data.impak
              kos_project = response.data.data.project.kos_projeck
              let readonly = ''
              if(output.length == 0) {
                    $('#outcome_content').append(outcome_template);
              }
  
              if(outcome.length == 0) {
                $('#output_content').append(output_template);
                
              }
  
              if(impak.length == 0) {
                $('#impak_content').append(impak_template);
                let all_nilai = document.querySelectorAll(
                      "[id^='Nillai-first']"
                  ); 
                  let all_jangka = document.querySelectorAll(
                      "[id^='Jangka-first']"                    
                  ); 

                  let all_kuantiti = document.querySelectorAll(
                  "[id^='kuantiti-first']"
                  ); 
  
                  let all_jumlah = document.querySelectorAll(
                      "[id^='Masa-first']"                    
                  ); 
  
                  let all_impak_btn = document.querySelectorAll(
                      "[id^='impak_button']"                    
                  ); 
                  let all_impak_div = document.querySelectorAll(
                      "[id^='impak_details']"                    
                  ); 
                  
                  all_impak_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_impak_div[i].remove();                        
                      });
                  });
                  
                  all_nilai.forEach((tc, i) => {
                      tc.addEventListener("change", function(evt)  {
                          let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          console.log(jumlah)
                          console.log('1')
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                            
                          })
                          let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                            $('#ci_value').val(ci.toFixed(1))
                          nf()
                      });
                      nf()
                  });  
                  
                  all_jangka.forEach((tc, i) => {
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                            
                          })
                          let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                            $('#ci_value').val(ci.toFixed(1))
                          nf()                 
                      });
                      nf()
                  });

                  all_kuantiti.forEach((tc, i) => {
                    console.log(all_kuantiti[i].value)
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                          nf()                       
                      });
                      nf()
                  });
  
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
              }
              let impackButton = `<button type="button" id="impak_button" class="py-2" style="background:transparent;border:none">
                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                                  </button>`
              let outcomeButton = `<button type="button" id="outcome_button" class="p-2" style="background:transparent;border:none">
                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                              </button>`
              
              let outputButton = `<button type="button" id="output_button" class="p-2" style="background:transparent;border:none">
                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                              </button>`
            
              if({{$status}} != 1) {
                readonly = 'readonly'
                impackButton = ''
                outcomeButton = ''
                outputButton = ''
              }
              loadcompleted();
              //$('#kos_seluruhan').val(kos_project)
              
              if(outcome.length > 0) {
                $('#outcome_content').empty();
  
                outcome.forEach((item) => {
                  let outcome_template = `<div id="outcome_details" class="outcome-Add"> 
                              <div class="d-flex align-items-center mb-3 outcome-con">
                              <input 
                              type="text" id="outcome_input"
                                  placeholder="Lapis lindung pantai sepanjang 1000m" `+ readonly + ` class="form-control" 
                                  value="`+ item.keterangan+`"/>
                              `+ outcomeButton+`
                              
                              </div>
                          </div>`                  
                  $('#outcome_content').append(outcome_template); 
                  let all_outcome_btn = document.querySelectorAll(
                      "[id^='outcome_button']"                    
                  ); 
                  let all_outcome_div = document.querySelectorAll(
                      "[id^='outcome_details']"                    
                  ); 
                  
                  all_outcome_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_outcome_div[i].remove();                        
                      });
                  }); 
                }); 
                
              }
          
              if(output.length > 0) {
                $('#output_content').empty();
                
                output.forEach((item) => {
                  let output_template = `<div id="output_details" class="d-flex align-items-center mb-3 outcome-con">
                        <input
                          type="text" id="output_input" `+readonly+` class="form-control" 
                          value="`+item.keterangan+`" placeholder=""
                        />
                        `+outputButton+`
                      </div>`                  
                  $('#output_content').append(output_template); 
                  let all_output_btn = document.querySelectorAll(
                      "[id^='output_button']"                    
                  ); 
                  let all_output_div = document.querySelectorAll(
                      "[id^='output_details']"                    
                  ); 
                  
                  all_output_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_output_div[i].remove();                        
                      });
                  });
                }); 
              }
              
              if(impak.length > 0) {
                $('#impak_content').empty();
  
                let all_total = 0.00
                impak.forEach((item) => {
                  console.log(item)
                  let impak_template = `<div id="impak_details" class="impak-content">
                    <div class="input_container">
                      <div class="d-flex minus_justify">
                        `+ impackButton+`
                      </div>
                    </div>
                    <div class="input_container">
                      <div class="row p-0">
                        <div class="col-lg-2 col-xs-12 d-flex info_justify">
                          <label for="keteranga-impak" class="input-textarea-label">
                            Keterangan Impak</label>
                          <div>
                            <button type="button" class="pop_btn border-0" style="background: none;">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                            </button>
                            <div class="pop_content d-none custom_pop">
                                  Impak kepada kumpulan sasar memberi kesan langsung positif dan negatif serta 6 parameter CI.
                                </div>
                          </div>
                        </div>
                          
                        <div class="col-lg-10 col-xs-12 form-group input_form_group">
                          <input
                            type="text" `+readonly+` id="keteranga-impak" value="`+item.keterangan+`"
                            placeholder=""
                            class="form-control input-textarea"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row p-0">
                      <div class="col-lg-6 col-xs-12">
                        <div class="row align-items-center">
                          <div class="col-lg-4 col-xs-12 d-flex info_justify">
                            <label for="kuantiti-first" class="">Kuantiti</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop_2">
                              Kuantiti penerima impak
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-7 col-xs-12 form-group">
                            <input
                              type="text" `+readonly+`
                              value="`+item.kuantiti+`"
                              id="kuantiti-first"
                              placeholder="1"
                              class="form-control input-element"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-xs-12">
                        <div class="row align-items-center">
                          <div class="col-lg-4 col-xs-12 d-flex info_justify">
                            <label for="Nillai-first">Nilai (RM)</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop_2">
                              Impak kepada Nilai Kewangan
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-8 col-xs-12 form-group">
                            <input
                              type="text"  `+readonly+`
                              id="Nillai-first" value="`+item.nilai+`"
                              placeholder=""
                              class="form-control input-element"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input_container">
                      <div class="row input_fill_content">
                        <div class="col-lg-2 col-xs-12  d-flex info_justify">
                          <label
                          for="Penerangan-first"
                          class="input-textarea-label"
                          >Penerangan Nilai Sumber</label>
                          <div>
                            <button type="button" class="pop_btn border-0" style="background: none;">
                                <span class="iconify info_icon" data-icon="mdi-information"></span>
                            </button>
                            <div class="pop_content d-none custom_pop">
                            Penerangan sumber hendaklah jelas dan betul  serta kenyataan proksi dengan sumber
                            </div>
                          </div>
                        </div>
                          
                        <div class="col-lg-10 col-xs-12 form-group input_form_group">
                          <textarea
                            class="form-control w-100"  `+readonly+`
                            id="Penerangan-first"
                            rows="3"
                          >`+item.penerangan+`</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row p-0">
                      <div class="col-lg-6 col-xs-12">
                        <div class="row align-items-center">
                          <div class="col-lg-4 col-xs-12 d-flex info_justify">
                            <label for="Jangka-first" class="">Jangka Masa Impak (Tahun)</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop">
                              Penilai perlulah tepat dalam menilai jangka masa impak
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-lg-7 col-xs-12 form-group">
                            <input
                              type="text" value="`+item.jangka_masa_impak+`"
                              id="Jangka-first" `+readonly+`
                              placeholder="0"
                              class="form-control input-element"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-xs-12">
                        <div class="row align-items-center">
                          <div class="col-lg-4 col-xs-12 d-flex info_justify">
                            <label for="Masa-first"
                            >Jumlah Anggaran Impak Keseluruhan (RM)</label>
                            <div>
                              <button type="button" class="pop_btn border-0" style="background: none;">
                                  <span class="iconify info_icon" data-icon="mdi-information"></span>
                              </button>
                              <div class="pop_content d-none custom_pop">
                              Jumlah anggaran impak ialah (kuantiti x nilai  x jangka masa impak)
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-8 col-xs-12 form-group">
                            <input
                              type="text"  `+readonly+`
                              id="Masa-first" readonly
                              placeholder="" value="`+item.jumlah_impak+`"
                              class="form-control input-element input-grey"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>`                  
                  $('#impak_content').append(impak_template);  
                  let all_nilai = document.querySelectorAll(
                      "[id^='Nillai-first']"
                  ); 
                  let all_jangka = document.querySelectorAll(
                      "[id^='Jangka-first']"                    
                  ); 

                  let all_kuantiti = document.querySelectorAll(
                  "[id^='kuantiti-first']"
                  ); 
  
                  let all_jumlah = document.querySelectorAll(
                      "[id^='Masa-first']"                    
                  ); 
  
                  let all_impak_btn = document.querySelectorAll(
                      "[id^='impak_button']"                    
                  ); 
                  let all_impak_div = document.querySelectorAll(
                      "[id^='impak_details']"                    
                  ); 
                  
                  all_impak_btn.forEach((tb, i) => {                    
                      tb.addEventListener("click", () => {
                          all_impak_div[i].remove();                        
                      });
                  });
                  
                  all_nilai.forEach((tc, i) => {
                      tc.addEventListener("change", function(evt)  {                        
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          all_jumlah[i].value = jumlah
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                            
                            
                          })

                          let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                            $('#ci_value').val(ci.toFixed(1))
                          nf()
                      });
                      nf()
                  });  
                  
                  all_jangka.forEach((tc, i) => {
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                          let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                            
                            $('#ci_value').val(ci.toFixed(1))
                        
                             nf();                        
                      });
                      nf()
                  });

                  all_kuantiti.forEach((tc, i) => {
                    console.log(all_kuantiti[i].value)
                      tc.addEventListener("change", function(evt)  {                                                
                        let nilai = parseFloat(removecomma(all_nilai[i].value))
                          let jankga = parseFloat(removecomma(all_jangka[i].value))
                          let kuantiti = parseFloat(removecomma(all_kuantiti[i].value))
  
                          let jumlah = nilai * jankga * kuantiti
                          all_jumlah[i].value = jumlah
  
                          let all_total = 0.00
                          all_jumlah.forEach((tc, r) => {
                            all_total = all_total + parseFloat(all_jumlah[r].value)
                            document.getElementById("kos_seluruhan_impak").value = all_total;
                          })
                                 nf()                    
                      });
                      nf()
                  });
  
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
                  all_total = all_total + parseFloat(item.jumlah_impak)
                  document.getElementById("kos_seluruhan_impak").value = all_total;
                  let ci = all_total/(parseFloat(removecomma($('#kos_seluruhan_oe').val())) + parseFloat( removecomma($('#kos_seluruhan').val()))); console.log('ci_new'); console.log('ci');
                  $('#ci_value').val(ci.toFixed(1));
                  console.log(document.getElementById("ci"));
                  //document.getElementById("_value").value = ci.toFixed(1);
                }); 
              }
               $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
              nf()
          })
          .catch(function (error) {
            $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
          })


        


          
  })   
  </script>