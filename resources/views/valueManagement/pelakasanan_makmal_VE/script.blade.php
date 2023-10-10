<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

      <!-- Get Draft Lampiran -->
      <script>
      var skoprowIdx = 0;
      var objektifrowIdx = 0;
      var outputrowIdx = 0;
      var outcomerowIdx = 0;
      var oldoutputlength = 0;
      var newoutputlength = 0;
      var oldoutcomelength = 0;
      var newoutcomelength = 0;
      var oldobjektiflength = 0;
      var newobjektiflength = 0;
      var oldskoplength = 0;
      var newskoplength = 0;
      var existingskopkos = 0;
      var newskopkos = 0;
      var showOnly = false
      var existing_file = false;
      var existing_filename = '';
      var current_status;
      $(document).ready(function () {

        if({{$user}}!=4)
        {
          document.getElementById('addUlasanDisabled').style.visibility = 'hidden';
        }

        $('#tarikh_cadangan').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#tarikh_pra_makmal_sebenar').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#lawatan_tapak').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#cadangan_makmal').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#makmal_sebenar').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#modal_cadangan_makmal').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#modal_makmal_sebenar').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });
        $('#mesyuarat_date').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });

        $('#vmpop_btn_1').mouseover(function () {
              $('#vmpop_content_1').removeClass('d-none');      
        });
        $('#vmpop_btn_1').mouseout(function () {
              $('#vmpop_content_1').addClass('d-none');      
        });
        $('#vmpop_btn_2').mouseover(function () {
              $('#vmpop_content_2').removeClass('d-none');      
        });
        $('#vmpop_btn_2').mouseout(function () {
              $('#vmpop_content_2').addClass('d-none');      
        });
        $('#vmpop_btn_3').mouseover(function () {
              $('#vmpop_content_3').removeClass('d-none');      
        });
        $('#vmpop_btn_3').mouseout(function () {
              $('#vmpop_content_3').addClass('d-none');      
        });


        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        
        localStorage.setItem("loader_count_VE", 7);

        $("#inlineCheckbox1").click(function(){
          $("#KemaskiniKepadaBahagianBtn").prop("disabled", true);
          $("#va_tandatanganLink").prop("disabled", false);
        })
        $('#inlineCheckbox1').click(function(){
            if($(this).is(":checked")){
              $("#KemaskiniKepadaBahagianBtn").prop("disabled", true);
              $("#va_tandatanganLink").prop("disabled", false);
            }
            else if($(this).is(":not(:checked)")){
              $("#KemaskiniKepadaBahagianBtn").prop("disabled", false);
          $("#va_tandatanganLink").prop("disabled", true);
            }
        });
        const api_token = "Bearer "+ window.localStorage.getItem('token')
          
        document.getElementById("upload_lm").style.display = 'block';
        document.getElementById("lm_preview").style.display = 'none';
        axios.defaults.headers.common["Authorization"] = api_token
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get_project_data/" + {{$kod_projek}},
            responseType: 'json',            
        })
        .then(function (response) { 
          skop_project = response.data.data.skop_project;
          sub_skops = response.data.data.sub_skops;
          output = response.data.data.output;
          outcome = response.data.data.outcome;
          objektif = [];
          oldoutputlength = output.length
          oldoutcomelength = outcome.length
          oldobjektiflength = 0;

          vm_objectif = response.data.data.vm_objectif;
          vm_skop = response.data.data.vm_skop;
          vm_output = response.data.data.vm_output;
          vm_outcome = response.data.data.vm_outcome;

          units = response.data.data.units; 
          let unit_options = '<option value="">--Pilih--</option>'
          $.each(units, function(key, item_unit) {
                                unit_options = unit_options + '<option value="' + item_unit.id + '">' + item_unit.nama_unit + '</option>'
          })
          localStorage.setItem('unit_drop', unit_options);


          console.log('obje'); console.log(vm_objectif.length)

          if(vm_objectif.length>0)
          {
            var objectif_data=vm_objectif;
            if(objectif_data.length > 0) {
                  $.each(objectif_data, function (key, item) { 
                      if(item!=''){
                        objektifrowIdx = objektifrowIdx+ 1;
                        oldobjektiflength =oldobjektiflength+1;
                        $('#tbodyoldobjektif').append(`<tr>
                              <td class="row-index text-center">
                              <p> ${objektifrowIdx}</p>
                              </td>
                              <td>
                                <textarea style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value="`+item.objecktif_selepas+`">`+item.objecktif_selepas+`</textarea>
                              </td>
                            </tr>`);
                      }
                  })
            }
          }
          else
          {
            var objectif_data= window.localStorage.getItem('obj_array').split('<==>');
            if(objectif_data.length > 0) {
                  $.each(objectif_data, function (key, item) { 
                      if(item!=''){
                        objektifrowIdx = objektifrowIdx+ 1;
                        oldobjektiflength =oldobjektiflength+1;
                        $('#tbodyoldobjektif').append(`<tr>
                              <td class="row-index text-center">
                              <p> ${objektifrowIdx}</p>
                              </td>
                              <td>
                                <textarea style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value="`+item+`">`+item+`</textarea>
                              </td>
                            </tr>`);
                      }
                  })
            }
          }
          
          localStorage.setItem("obj_length", oldobjektiflength);
          

          if(vm_skop.length > 0) {
            oldskoplength = vm_skop.length;
                  $.each(vm_skop, function (key, item) {
                    skoprowIdx = skoprowIdx+ 1;
                    existingskopkos = parseInt(existingskopkos) + parseInt(item.kos_selepas) 
                    $('#tbodyoldskop').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${skoprowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center"  wrap="virtual" type="text" value="`+item.skop_selepas+`">`+item.skop_selepas+`</textarea>
                          </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+number_format(item.kos_selepas)+`">
                          </td>
                        </tr>`);
                  })

                  document.getElementById('oldTotalSkopKos').value = existingskopkos;
            }
            else
            {
              oldskoplength = skop_project.length;
              $.each(skop_project, function (key, item) {
                    skoprowIdx = skoprowIdx+ 1;
                    existingskopkos = parseInt(existingskopkos) + parseInt(item.cost) 
                    $('#tbodyoldskop').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${skoprowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center"  wrap="virtual" type="text" value="`+item.pemantauanskop_options.skop_name+`">`+item.pemantauanskop_options.skop_name+`</textarea>
                          </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+number_format(item.cost)+`">
                          </td>
                        </tr>`);
                  })

                  document.getElementById('oldTotalSkopKos').value = number_format(existingskopkos);
            }
          
          if(vm_output.length>0){
            $.each(vm_output, function (key, item) {
                    outputrowIdx = outputrowIdx+ 1;
                    $('#tbodyoldoutput').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outputrowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.output_selepas+`">`+item.output_selepas+`</textarea>
                              </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.quantity_selepas+`">
                              </td>
                          <td>
                              <select disabled style="font-size: 0.8rem;"  class="form-control" id="output_select_`+item.unit_selepas+`">
                                        `+unit_options+`
                              </select>
                          </td>
                            </tr>`);
                      document.getElementById("output_select_"+item.unit_selepas).value = item.unit_selepas;
                  })
          }
          else if(output.length > 0) {
                  $.each(output, function (key, item) {
                    outputrowIdx = outputrowIdx+ 1;
                    $('#tbodyoldoutput').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outputrowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.output_proj+`">`+item.output_proj+`</textarea>
                              </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.Kuantiti+`">
                              </td>
                          <td>
                              <select disabled style="font-size: 0.8rem;"  class="form-control" id="output_selects_`+item.unit_id+`">
                                        `+unit_options+`
                              </select>
                          </td>
                            </tr>`);
                      document.getElementById("output_selects_"+item.unit_id).value = item.unit_id;
                  })
            }

            if(vm_outcome.length > 0) {
                  $.each(vm_outcome, function (key, item) { console.log(item);
                    outcomerowIdx = outcomerowIdx+ 1;
                    $('#tbodyoldoutcome').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outcomerowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.outcome_selepas+`">`+item.outcome_selepas+`</textarea>
                              </td>
                          <td>
                            <input  style="font-size:0.8rem;"disabled class="form-control text-center" type="text" value="`+item.quantity_selepas+`">
                              </td>
                          <td>
                              <select disabled style="font-size: 0.8rem;"  class="form-control" id="outcm_select_`+item.unit_selepas+`">
                                        `+unit_options+`
                              </select>                          
                          </td>
                      </tr>`);
                      document.getElementById("outcm_select_"+item.unit_selepas).value = item.unit_selepas;
                  })
            }
            else if(outcome.length > 0) {
                  $.each(outcome, function (key, item) { console.log(item);
                    outcomerowIdx = outcomerowIdx+ 1;
                    $('#tbodyoldoutcome').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outcomerowIdx}</p>
                          </td>
                          <td>
                            <textarea  style="font-size:0.8rem;"disabled class="form-control text-center" type="text" value="`+item.Projek_Outcome+`">`+item.Projek_Outcome+`</textarea>
                              </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.Kuantiti+`">
                              </td>
                          <td>
                              <select disabled style="font-size: 0.8rem;"  class="form-control" id="outcm_selects_`+item.unit_id+`">
                                        `+unit_options+`
                              </select> 
                          </td>
                            </tr>`);
                        document.getElementById("outcm_selects_"+item.unit_id).value = item.unit_id;

                  })
            }

            var length= window.localStorage.getItem('loader_count_VE');
            localStorage.setItem("loader_count_VE", length-1);
            if(length==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }

      })

      axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/vm/objektif",
          responseType: 'json',
          params: {
              pp_id: {{$kod_projek}},
              type: 'VE'
          }            
      })
      .then(function (response) { 
              objektifData = response.data.data.objektif; console.log(objektifData.length)
              skopData = response.data.data.skop; console.log(skopData.length)
              outcomeData = response.data.data.outcome
              outputData = response.data.data.output
              medias = response.data.data.medias
              current_status = response.data.data.project.status_perlaksanaan
              project = response.data.data.project
              va = null
              if(response.data.data.va) {
                va = response.data.data.va  
              }
              
              
              if(response.data.data.kalender_cadangan_pra_makmal) {
                let date1=response.data.data.kalender_cadangan_pra_makmal.tarikh_mula.split("-");
                let date2=response.data.data.kalender_cadangan_pra_makmal.tarikh_tamat.split("-");

                let startDate=date1[2]+'/'+date1[1]+'/'+date1[0]; //alert(startDate)
                let endDate=date2[2]+'/'+date2[1]+'/'+date2[0]; //alert(endDate)

                document.getElementById("tarikh_cadangan").value=startDate+'-'+endDate;  
              }

              if(response.data.data.kalender_cadangan_makmal) {
                let date3=response.data.data.kalender_cadangan_makmal.tarikh_mula.split("-");
                let date4=response.data.data.kalender_cadangan_makmal.tarikh_tamat.split("-");

                let startDateCadanganMakmal=date3[2]+'/'+date3[1]+'/'+date3[0]; //alert(startDate)
                let endDateCadanganMakmal=date4[2]+'/'+date4[1]+'/'+date4[0]; //alert(endDate)

                document.getElementById("cadangan_makmal").value=startDateCadanganMakmal+'-'+endDateCadanganMakmal; 
                  
                let year = response.data.data.kalender_cadangan_makmal.tarikh_mula.split("-")
                document.getElementById("year").value=year[0]
              }

              if(response.data.data.kalender_cadangan_law_makmal) {
                let date5=response.data.data.kalender_cadangan_law_makmal.tarikh_mula.split("-");
                let date6=response.data.data.kalender_cadangan_law_makmal.tarikh_tamat.split("-");

                let startDate=date5[2]+'/'+date5[1]+'/'+date5[0]; //alert(startDate)
                let endDate=date6[2]+'/'+date6[1]+'/'+date6[0]; //alert(endDate)

                document.getElementById("lawatan_tapak").value=startDate+'-'+endDate;
              }

              if(response.data.data.kalender_cadangan_mesyurat_makmal) {
                let date7=response.data.data.kalender_cadangan_mesyurat_makmal.tarikh_mula.split("-");
                let date8=response.data.data.kalender_cadangan_mesyurat_makmal.tarikh_tamat.split("-");

                let startDate=date7[2]+'/'+date7[1]+'/'+date7[0]; //alert(startDate)
                let endDate=date8[2]+'/'+date8[1]+'/'+date8[0]; //alert(endDate)

                document.getElementById("mesyuarat_date").value=startDate+'-'+endDate;
              }

              
              console.log(project.status_perlaksanaan);

              let user_bahagian = "{{Auth::user()->bahagian->acym}}"
              if(project.status_perlaksanaan == '31') {
                document.getElementById('penyeleras').style.display = 'none';
                document.getElementById('lampiran_list').style.display = 'none';
                document.getElementById('penyeleras_buttons').style.display = 'none';
                document.getElementById('ulasan_disabled').style.display = 'none';
                document.getElementById('sejarah_ulasan').style.display = 'none';

                document.getElementById("baha_draft_status").classList.add("yellow");
                document.getElementById("bkor_draft_status").classList.remove("yellow");

              }

              if(project.status_perlaksanaan == '32') {
                disableEditing()
                document.getElementById('naik_laporan').style.display = 'none';
                document.getElementById('ulasan_disabled').style.display = 'none';
                document.getElementById('sejarah_ulasan').style.display = 'none';
                if(user_bahagian != 'BPK') {
                  document.getElementById('penyeleras').style.display = 'none';
                  document.getElementById('penyeleras_buttons').style.display = 'none';
                }
                document.getElementById("bkor_draft_status").classList.add("yellow");
                document.getElementById("baha_draft_status").classList.remove("yellow");
              }

              if(project.status_perlaksanaan == '33') {
                document.getElementById('penyeleras').style.display = 'none';
                document.getElementById('penyeleras_buttons').style.display = 'none';
                document.getElementById("baha_draft_status").classList.add("yellow");
                document.getElementById("bkor_draft_status").classList.remove("yellow");
              }

              if(project.status_perlaksanaan == '35') {
                disableEditing()
                document.getElementById('naik_laporan').style.display = 'none';
                document.getElementById('penyeleras').style.display = 'none';
                document.getElementById('penyeleras_buttons').style.display = 'none';
                document.getElementById("tanda_draft_status").classList.add("yellow");
              }

              if(project.status_perlaksanaan == '34') {
                disableEditing()
                document.getElementById('naik_laporan').style.display = 'none';
                document.getElementById('new_penyeleras_table').style.display = 'none';
                // document.getElementById('penyeleras').style.display = 'none';
                if(user_bahagian != 'BPK') {
                  document.getElementById('ulasan_disabled').style.display = 'none';
                  document.getElementById('sejarah_ulasan').style.display = 'none';  
                  document.getElementById('penyeleras').style.display = 'none';  
                  document.getElementById('penyeleras_buttons').style.display = 'none';
                }
                document.getElementById("bkor_draft_status").classList.add("yellow");
                document.getElementById("baha_draft_status").classList.remove("yellow");
              }

              // if({{json_encode($viewOnly)}}) {
              //   disableInputs()
              // }

              if(va)
              {
                document.getElementById("va_id").value=va.id; 
                document.getElementById("kos_selepas_makmal").value=number_format(va.kos_selepas_makmal); 
                // document.getElementById("pengecualian").value=va.pengecualian;
                document.getElementById('laporan_file_type').classList.add("d-none");
                document.getElementById('laporan_file_size').classList.add("d-none");
                document.getElementById("upload_lm").style.display = 'none';
                document.getElementById("lm_preview").style.display = 'block';
                $('#lm_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                document.getElementById("header_lm_name").innerHTML = va.laporan_file_name;
                if(va.laporan_file_name) {
                  existing_file = true
                  existing_filename = va.laporan_file_name
                  document.getElementById("existing_file").value = true
                }
                $.each(medias, function (key, item) {
                  $('#lampiran_list').append(`<div class="col-md-12 col-xs-12 form-group d-flex" onClick="downloadLampiranAllDoc('`+item[0].trim()+`',`+item[2]+`)">
                                          <div class="ml-3 vmupload_img col-11 row ">
                                          <img
                                            src="{{ asset('assets/pdf.jpg.png') }}"
                                            class="ml-3 mr-3"
                                            alt=""
                                            style="height: 45px !important"
                                          />
                                          <p class="mt-3">
                                            `+item[0]+`
                                          <br>
                                          `+item[1]+`
                                          </p>
                                        </div></div>`);
                })
              }
                
           var length_obj= window.localStorage.getItem('obj_length');

  
            readonly = 'readonly'
              //populate data for existing objektif
              if(objektifData.length > 0) {
                    $.each(objektifData, function (key, item) {
                      newobjektiflength = newobjektiflength + 1; 
                      if(newobjektiflength > length_obj) {
                        objektifrowIdx++;

                          $('#tbodyoldobjektif').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${objektifrowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                                </td>
                              </tr>`);
                      }
                      

                      button = ''
                      if(current_status == '31' || current_status == '33') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeObjektifRow(${newobjektiflength})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }
                        console.log(button);
                        console.log(readonly);
                      // Adding a row inside the tbody.
                      $('#tbodynewobjektif').append(`<tr id="OR${newobjektiflength}">
                      <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" `+readonly+` style="padding: 0px !important; margin: 0px !important;text-align: left;" type="text" value="`+item.objecktif_selepas.trim()+`">`+item.objecktif_selepas.trim()+`</textarea>
                              </td>
                              <td class="text-center">
                                `+button+`
                              </td>
                            </tr>`);
                    });
                }else {
                  if(oldobjektiflength.length == 0) {
                    newobjektiflength = newobjektiflength + 1
                    objektifrowIdx++;

                          $('#tbodyoldobjektif').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${objektifrowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                            </td>
                              </tr>`);
                            
                           $('#tbodynewobjektif').append(`<tr id="OR${objektifrowIdx}">
                              <input class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                              </td>
                              <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeObjektifRow(${objektifrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
                  }
                          
                }

                if(newobjektiflength < length_obj) {


                    for(var j=newobjektiflength; j<length_obj;j++){

                      $('#tbodynewobjektif').append(`<tr id="OR${j}">
                                <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                                <td>
                                  <textarea style="font-size:0.8rem;" class="form-control text-center"  wrap="virtual" type="text" value=""></textarea>
                                </td>
                                <td class="text-center">
                                  <button  style="font-size:0.8rem;" class="vmplus_minus" type="button" onClick="removeObjektifRow(${j})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                              </tr>`);

                    }

                    }


              //populate data for existing skop
              if(skopData.length > 0) {
                    $.each(skopData, function (key, item) {
                      newskoplength = newskoplength + 1
                      if(newskoplength > oldskoplength) {
                        skoprowIdx++;

                          $('#tbodyoldskop').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${skoprowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center"  wrap="virtual" type="text" value=""></textarea>
                            </td>
                                <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                              </tr>`);
                      }

                      button = ''
                      if(current_status == '31' || current_status == '33') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }

                      // Adding a row inside the tbody.
                      $('#tbodynewskop').append(`<tr id="SR${skoprowIdx}">
                      <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="`+item.id+`" name="id" `+readonly+`>
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" wrap="virtual" `+readonly+` value="`+item.skop_selepas.trim()+`">`+item.skop_selepas.trim()+`</textarea>
                              </td>
                              <td>
                                <input style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+number_format(item.kos_selepas)+`" id="skopKos">
                              </td>
                              <td class="text-center">
                              `+button+`
                              </td>
                            </tr>`);
                    });
                    let all_new_kos = document.querySelectorAll(
                              "[id^='skopKos']"
                          ); 
                          all_new_kos.forEach((tc, i) => {
                            tc.removeEventListener('change', calculateNewKos);
                          })

                          all_new_kos.forEach((td, i) => { 
                            td.addEventListener("change", calculateNewKos)
                          })

                          calculateNewKos()
                }else {
                  if(oldskoplength.length == 0) {
                    newskoplength = newskoplength + 1
                    skoprowIdx++;

                          $('#tbodyoldskop').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${skoprowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center"  wrap="virtual" type="text" value=""></textarea>
                            </td>
                              </tr>`);
                            
                           $('#tbodynewskop').append(`<tr id="SR${skoprowIdx}">
                              <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" value="0" wrap="virtual" id="skopKos"></textarea>
                              </td>
                              <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
                  }
                  let all_new_kos = document.querySelectorAll(
                              "[id^='skopKos']"
                          ); 
                          all_new_kos.forEach((tc, i) => {
                            tc.removeEventListener('change', calculateNewKos);
                          })

                          all_new_kos.forEach((td, i) => { 
                            td.addEventListener("change", calculateNewKos)
                          })
                          
                }


                var unit_drop= window.localStorage.getItem('unit_drop');

                //populate data for existing outcome
                if(outcomeData.length > 0) {
                    $.each(outcomeData, function (key, item) {
                      newoutcomelength = newoutcomelength + 1
                      if(newoutcomelength > oldoutcomelength) {
                        outcomerowIdx++;

                          $('#tbodyoldoutcome').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${outcomerowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                      }

                      button = ''
                      if(current_status == '31' || current_status == '33') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeOutcomeRow(${outcomerowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }

                      // Adding a row inside the tbody.
                      $('#tbodynewoutcome').append(`<tr id="OT${outcomerowIdx}">
                      <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.outcome_selepas+`">`+item.outcome_selepas+`</textarea>
                              </td>
                              <td>
                                <input style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.quantity_selepas+`">
                              </td>
                              <td>
                                <select  style="font-size:0.8rem;" style="font-size:0.8rem;" class="form-control" id="unit_`+item.id+`" `+readonly+` name="unit" value="">
                                    `+unit_drop+`
                                </select>
                              </td>
                              <td class="text-center">
                              `+button+`
                              </td>
                            </tr>`);
                            document.getElementById("unit_"+item.id).value=item.unit_selepas;
                    });
                }else {
                  if(oldoutcomelength.length == 0) {
                    newoutcomelength = newoutcomelength + 1
                          outcomerowIdx++;

                          $('#tbodyoldoutcome').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${outcomerowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                            
                           $('#tbodynewoutcome').append(`<tr id="OT${outcomerowIdx}">
                              <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" value=""></textarea>
                              </td>
                              <td>
                                <input style="font-size:0.8rem;" class="form-control text-center" type="text" value="">
                              </td>
                              <td>
                                <select style="font-size:0.8rem;" class="form-control" id="unit_${outcomerowIdx}" name="unit" value="">
                                  `+unit_drop+`
                                </select>
                              </td>
                              <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeOutcomeRow(${outcomerowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
                  }
                          
                }



                //populate data for existing output
                if(outputData.length > 0) {
                    $.each(outputData, function (key, item) {
                      newoutputlength = newoutputlength + 1
                      if(newoutputlength > oldoutputlength) {
                        outcomerowIdx++;

                          $('#tbodyoldoutput').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${outcomerowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                      }

                      button = ''
                      if(current_status == '31' || current_status == '33') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeOutputRow(${outputrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }


                      // Adding a row inside the tbody.
                      $('#tbodynewoutput').append(`<tr id="OP${outputrowIdx}">
                      <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.output_selepas+`">`+item.output_selepas+`</textarea>
                              </td>
                              <td>
                                <input style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.quantity_selepas+`">
                              </td>
                              <td>
                                <select  style="font-size:0.8rem;" class="form-control" id="unit_`+item.id+`" `+readonly+` name="unit" value="">
                                    `+unit_drop+`
                                </select>
                              </td>
                              <td class="text-center">
                              `+button+`
                              </td>
                            </tr>`);
                            document.getElementById("unit_"+item.id).value=item.unit_selepas;
                    });
                }else {
                  if(oldoutputlength.length == 0) {
                    newoutputlength = newoutputlength + 1
                      outputrowIdx++;

                          $('#tbodyoldoutput').append(`<tr >
                            <td class="row-index text-center">
                            <p> ${outputrowIdx}</p>
                            </td>
                            <td>
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                            
                           $('#tbodynewoutput').append(`<tr id="OP${outputrowIdx}">
                              <input class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea class="form-control text-center" type="text" value=""></textarea>
                              </td>
                              <td>
                                <input class="form-control text-center" type="text" value="">
                              </td>
                              <td>
                                <select  style="font-size:0.8rem;" class="form-control" id="unit" name="unit" value="">
                                  `+unit_drop+`
                                </select>
                              </td>
                              <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeOutputRow(${outputrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
                  }
                          
                }

                  // jQuery button click event to add a row for skop
                  $('#addBtnSkop').on('click', function () { 
                    newskoplength = newskoplength + 1
                    if(newskoplength > oldskoplength) {
                      skoprowIdx++;

                        $('#tbodyoldskop').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${skoprowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center"  wrap="virtual" type="text" value=""></textarea>
                          </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="" >
                          </td>
                        </tr>`);
                    }
                    // Adding a row inside the tbody.
                    $('#tbodynewskop').append(`<tr id="SR${skoprowIdx}">
                          <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                            <td>
                              <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" value="0" wrap="virtual"></textarea>
                            </td>
                            <td>
                              <input style="font-size:0.8rem;" class="form-control text-center" type="text" value="0" id="skopKos">
                            </td>
                            
                            <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                            </td>
                          </tr>`);
                          // calculateNewKos()

                          let all_new_kos = document.querySelectorAll(
                              "[id^='skopKos']"
                          ); 
                          all_new_kos.forEach((tc, i) => {
                            tc.removeEventListener('change', calculateNewKos);
                          })

                          all_new_kos.forEach((td, i) => { 
                            td.addEventListener("change", calculateNewKos)
                          })
                          
            })

            var length= window.localStorage.getItem('loader_count_VE');
            localStorage.setItem("loader_count_VE", length-1);
            if(length==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }
            
                });



                  // jQuery button click event to add a row for objektif
                  $('#addBtnObjektif').on('click', function () {
                    var length_obj= window.localStorage.getItem('obj_length'); 

                    newobjektiflength = newobjektiflength + 1
                    if(newobjektiflength > length_obj) {
                    objektifrowIdx++;

                        $('#tbodyoldobjektif').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${objektifrowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                          </td>
                        </tr>`);
                    }
                    // Adding a row inside the tbody.
                    $('#tbodynewobjektif').append(`<tr id="OR${objektifrowIdx}">
                            <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                            <td>
                            <textarea style="font-size:0.8rem;" class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                            </td>
                            
                            <td class="text-center">
                              <button style="font-size:0.8rem;" class="vmplus_minus" type="button" onClick="removeObjektifRow(${objektifrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                            </td>
                          </tr>`);
                });


                  // jQuery button click event to add a row for outcome
                  $('#addBtnOutcome').on('click', function () {
                    newoutcomelength = newoutcomelength + 1;
                    var unit_outcome_options= window.localStorage.getItem('unit_drop');


                    if(newoutcomelength > oldoutcomelength) {
                      outcomerowIdx++;

                        $('#tbodyoldoutcome').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outcomerowIdx}</p>
                          </td>
                          <td>
                            <textarea  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                              </td>
                          <td>
                            <input   style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                              </td>
                          <td>
                            <input   style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                          </td>
                            </tr>`);
                    }
                    // Adding a row inside the tbody.
                    $('#tbodynewoutcome').append(`<tr id="OT${outcomerowIdx}">
                    <input  style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                            <td>
                              <textarea  style="font-size:0.8rem;" class="form-control text-center" type="text" value=""></textarea>
                            </td>
                            <td>
                              <input  style="font-size:0.8rem;" class="form-control text-center" type="text" value="0">
                            </td>
                            <td>
                              <select style="font-size:0.8rem;" class="form-control" id="unit" name="unit">
                                `+unit_outcome_options+`
                              </select>
                            </td>
                            <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeOutcomeRow(${outcomerowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                            </td>
                          </tr>`);
                });



                  // jQuery button click event to add a row for output
                  $('#addBtnOutput').on('click', function () {
                    newoutputlength = newoutputlength + 1;
                    var unit_output_options= window.localStorage.getItem('unit_drop');

                    
                    if(newoutputlength > oldoutputlength) {
                        outputrowIdx++;

                        $('#tbodyoldoutput').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outputrowIdx}</p>
                          </td>
                          <td>
                            <textarea  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                              </td>
                          <td>
                            <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                              </td>
                          <td>
                            <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                          </td>
                            </tr>`);
                    }
                    // Adding a row inside the tbody.
                    $('#tbodynewoutput').append(`<tr id="OP${outputrowIdx}">
                    <input class="form-control text-center" type="hidden" value="" name="id">
                            <td>
                              <textarea  style="font-size:0.8rem;" class="form-control text-center" type="text" value=""></textarea>
                            </td>
                            <td>
                              <input  style="font-size:0.8rem;" class="form-control text-center" type="text" value="0">
                            </td>
                            <td>
                              <select style="font-size:0.8rem;" class="form-control" id="unit" name="unit">
                                `+unit_output_options+`
                              </select>
                            </td>
                            <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeOutputRow(${outputrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                            </td>
                          </tr>`);
                });
        //})

      })

      function kemukafileDownload(id,filename){
        console.log(id,filename);
        const api_url = "{{env('API_URL')}}";  
                      console.log(api_url);
                      const api_token = "Bearer "+ localStorage.getItem('token');  
                      console.log(api_token);
                      update_user_api = api_url+"api/project/kemukafileDownload";
                      data_update = {'id':id};
                      var jsonString = JSON.stringify(data_update);
                      console.log(filename)
                      axios({
                        url: update_user_api + '?id=' + id,
                        method: 'GET',
                        headers: { "Authorization": api_token, },
                        responseType: 'blob', // important
                      }).then((response) => {
                        console.log(response.data.type);
                        const url = window.URL.createObjectURL(response.data);
                        const link = document.createElement('a');
                        link.href = url;
                        // const contentDisposition = response.headers['content-disposition'];
                        // console.log(response);
                        // let fileName = 'unknown';
                        // if (contentDisposition) {
                        //     const fileNameMatch = contentDisposition.match(/filename="(.+)"/);
                        //     if (fileNameMatch.length === 2)
                        //         fileName = fileNameMatch[1];
                        // }
                        // link.setAttribute('download', fileName);
                        link.setAttribute('target','_blank');
                        document.body.appendChild(link);
                        link.click();
                        URL.revokeObjectURL(url);

                      });
        }
        function terimafileDownload(id,filename){
          const api_url = "{{env('API_URL')}}";  
                      console.log(api_url);
                      const api_token = "Bearer "+ localStorage.getItem('token');  
                      console.log(api_token);
                      update_user_api = api_url+"api/project/terimafileDownload";
                      data_update = {'id':id};
                      var jsonString = JSON.stringify(data_update);
                      console.log(filename)
                      axios({
                        url: update_user_api + '?id=' + id,
                        method: 'GET',
                        headers: { "Authorization": api_token, },
                        responseType: 'blob', // important
                      }).then((response) => {
                        console.log(response.data.type);
                        const url = window.URL.createObjectURL(response.data);
                        const link = document.createElement('a');
                        link.href = url;
                        // const contentDisposition = response.headers['content-disposition'];
                        // console.log(response);
                        // let fileName = 'unknown';
                        // if (contentDisposition) {
                        //     const fileNameMatch = contentDisposition.match(/filename="(.+)"/);
                        //     if (fileNameMatch.length === 2)
                        //         fileName = fileNameMatch[1];
                        // }
                        // link.setAttribute('download', fileName);
                        link.setAttribute('target','_blank');
                        document.body.appendChild(link);
                        link.click();
                        URL.revokeObjectURL(url);

                      });
        }
      function removeSkopRow(id){
            var row = document.getElementById('SR'+id);
            row.parentNode.removeChild(row);
            if(newskoplength > oldskoplength) {
              newskoplength = newskoplength - 1
              skoprowIdx = skoprowIdx - 1
            $('#projek_cmn_table_skop tr:last').remove();
          }
          else {
              newskoplength = newskoplength - 1
          }
          calculateNewKos()
      }

      function removeObjektifRow(id){
          var row = document.getElementById('OR'+id);
          row.parentNode.removeChild(row);
          if(newobjektiflength > oldobjektiflength) {
            newobjektiflength = newobjektiflength - 1
            objektifrowIdx = objektifrowIdx - 1
            $('#oldobjektifTable tr:last').remove();
          }
          else
          {
            newobjektiflength = newobjektiflength - 1; console.log(newobjektiflength)
          }
      }

      function removeOutcomeRow(id){
          var row = document.getElementById('OT'+id);
          row.parentNode.removeChild(row);
          if(newoutcomelength > oldoutcomelength) {
            newoutcomelength = newoutcomelength - 1
            outcomerowIdx = outcomerowIdx - 1
            $('#oldoutcometable tr:last').remove();
          }
          else
          {
            newoutcomelength = newoutcomelength - 1
          }
      }

      function removeOutputRow(id){
          var row = document.getElementById('OP'+id);
          row.parentNode.removeChild(row);
          if(newoutputlength > oldoutputlength) {
            newoutputlength = newoutputlength - 1
            outputrowIdx = outputrowIdx - 1
            $('#oldoutputtable tr:last').remove();
          }
          else
          {
            newoutputlength = newoutputlength - 1
          }
      }

      $("#inlineRadio1").click(function(){
        hideBelowData();
      })

      $("#inlineRadio2").click(function(){
        showBelowData();
      })

      function hideBelowData(){
        $("#mmpm").addClass('d-none');
        $("#sjm_table_div").addClass('d-none');
        $("#Butiran_Makmal_label").addClass('d-none');
        $("#Butiran_Makmal_hr").addClass('d-none');
        $("#butiran").addClass('d-none');
        $("#projek_cmn_table").addClass('d-none');
        $("#draft_laporan_label").addClass('d-none');
        $("#draft_laporan").addClass('d-none');
        $(".label-1").addClass('d-none');
        $("#submit_lampiran").addClass('d-none')
        $("#card-body-2").removeClass('d-none');
        $("#card-body-1").addClass('d-none');
        $("#naik_laporan").addClass('d-none');
        $("#outcome_head").addClass('d-none');
        $("#outcome_table").addClass('d-none');
        $("#output_head").addClass('d-none');
        $("#output_table").addClass('d-none');
        $("#vmsimpan_hantar").addClass('d-none');
        $("#lampiran_list").addClass('d-none');
        $("#ulasan_disabled").addClass('d-none');
        $("#sejarah_ulasan").addClass('d-none');
        $("#penyeleras").addClass('d-none');
        $("#penyeleras_buttons").addClass('d-none');
      }

      function showBelowData() {
        $("#mmpm").removeClass('d-none');
        $("#sjm_table_div").removeClass('d-none');
        $("#Butiran_Makmal_label").removeClass('d-none');
        $("#Butiran_Makmal_hr").removeClass('d-none');
        $("#butiran").removeClass('d-none');
        $("#projek_cmn_table").removeClass('d-none');
        $("#draft_laporan_label").removeClass('d-none');
        $("#draft_laporan").removeClass('d-none');
        $(".label-1").removeClass('d-none');
        $("#submit_lampiran").removeClass('d-none')
        $("#card-body-2").addClass('d-none');
        $("#card-body-1").removeClass('d-none');
        $("#naik_laporan").removeClass('d-none');
        $("#outcome_head").removeClass('d-none');
        $("#outcome_table").removeClass('d-none');
        $("#output_head").removeClass('d-none');
        $("#output_table").removeClass('d-none');
        $("#vmsimpan_hantar").removeClass('d-none');
      }

      $("#keputusan_mesyuarat_no").click(function(){
        displayBelowItems(0);
      })

      $("#keputusan_mesyuarat_yes").click(function(){
          var table = document.getElementById('sjm_table'); console.log(table);
          if (table && table.rows.length > 1) {
            displayBelowItems(1);
          } else {
            displayBelowItems(0);
          }
      })
      
      function displayBelowItems(type)
      { console.log(type)
        if(type!=1)
        {
          $("#Butiran_Makmal_label").addClass('d-none');
          $("#Butiran_Makmal_hr").addClass('d-none');
          $("#butiran").addClass('d-none');
          $("#projek_cmn_table").addClass('d-none');
          $("#draft_laporan_label").addClass('d-none');
          $("#draft_laporan").addClass('d-none');
          $(".label-1").addClass('d-none');
          $("#kajian_head").addClass('d-none')
          $("#vmsimpan_hantar").addClass('d-none')
          $("#flow-horizontal").addClass('d-none');
          $("#ve_head").addClass('d-none');
          $("#outcome_head").addClass('d-none');
          $("#output_head").addClass('d-none');
          $("#outcome_table").addClass('d-none');
          $("#output_table").addClass('d-none');
          $("#naik_laporan").addClass('d-none');
        }
        else
        {
          $("#Butiran_Makmal_label").removeClass('d-none');
          $("#Butiran_Makmal_hr").removeClass('d-none');
          $("#butiran").removeClass('d-none');
          $("#projek_cmn_table").removeClass('d-none');
          $("#draft_laporan_label").removeClass('d-none');
          $("#draft_laporan").removeClass('d-none');
          $(".label-1").removeClass('d-none');
          $("#kajian_head").removeClass('d-none')
          $("#vmsimpan_hantar").removeClass('d-none')
          $("#flow-horizontal").removeClass('d-none');
          $("#ve_head").removeClass('d-none');
          $("#outcome_head").removeClass('d-none');
          $("#output_head").removeClass('d-none');
          $("#outcome_table").removeClass('d-none');
          $("#output_table").removeClass('d-none');
          $("#naik_laporan").removeClass('d-none');
        }
      }

      </script>




    <!-- Simpan Draft Lampiran -->
    <script>


      function submitLampiran(status,type)
      {
            // var formEl = document.forms.mmpm;
            var table = document.getElementById("tbody2"); //first table
            var objektifData=[];
            var skopData=[];
            var outcomeData=[];
            var outputData=[];

            let counter = 0;
            $("#tbodynewobjektif tr").each(function(){              
                  var currentRow=$(this);
                  var id_value=currentRow.find("input").val();
                  var col1_value=currentRow.find("td:eq(0) textarea").val();
                  objektifData.push(`{"new_objektif" : `+JSON.stringify(col1_value)+ `,"id" : `+ JSON.stringify(id_value)+` }`);
            });

            $("#tbodynewskop tr").each(function(){
              counter++;
                  var currentRow=$(this);
                  var id_value=currentRow.find("input").val();
                  var col1_value=currentRow.find("td:eq(0) textarea").val();
                  var col2_value=currentRow.find("td:eq(1) input").val();
                  skopData.push(`{"new_skop" : `+JSON.stringify(col1_value)+ `,"new_kos":`+JSON.stringify(removecomma(col2_value))+`,"id" : `+ JSON.stringify(id_value)+` }`);
            });

            $("#tbodynewoutcome tr").each(function(){
              counter++;
                  var currentRow=$(this);
                  var id_value=currentRow.find("input").val();
                  var col1_value=currentRow.find("td:eq(0) textarea").val();
                  var col2_value=currentRow.find("td:eq(1) input").val();
                  var col3_value=currentRow.find("td:eq(2) select").val();
                  outcomeData.push(`{"new_outcome" : `+JSON.stringify(col1_value)+ `,"new_quantity" : `+JSON.stringify(col2_value)+ `,"new_unit":`+JSON.stringify(col3_value)+`,"id" : `+ JSON.stringify(id_value)+` }`);
            });

            $("#tbodynewoutput tr").each(function(){
              counter++;
                  var currentRow=$(this);
                  var id_value=currentRow.find("input").val();
                  var col1_value=currentRow.find("td:eq(0) textarea").val();
                  var col2_value=currentRow.find("td:eq(1) input").val();
                  var col3_value=currentRow.find("td:eq(2) select").val();
                  outputData.push(`{"new_output" : `+JSON.stringify(col1_value)+ `,"new_quantity" : `+JSON.stringify(col2_value)+ `,"new_unit":`+JSON.stringify(col3_value)+`,"id" : `+ JSON.stringify(id_value)+` }`);
            });

            var formData = new FormData();
            var formEl = document.forms.mmpm;

            formData.append('pp_id', {{$kod_projek}})
            formData.append('user_id', {{Auth::user()->id}})
            objektifData.forEach((item) => {
              formData.append('objektif[]', item);
            });

            skopData.forEach((item) => {
              formData.append('skop[]', item);
            });

            outcomeData.forEach((item) => {
              formData.append('outcome[]', item);
            });

            outputData.forEach((item) => {
              formData.append('output[]', item);
            });

            laporanFileInput = document.getElementById("laporan_makmal");
            kosSelepasMakmal = document.getElementById("kos_selepas_makmal").value;
            va_id = document.getElementById("va_id").value;

            if(document.getElementById("inlineRadio1").checked) {
              pengecualian = document.getElementById("inlineRadio1").value;
            }

            if(document.getElementById("inlineRadio2").checked) {
              pengecualian = document.getElementById("inlineRadio2").value;
            }
            

            formData.append('kos_selepas_makmal', kosSelepasMakmal);
            formData.append('status', status);
            formData.append('pengecualian', pengecualian);

            if(!existing_file) {
              formData.append('laporanFileInput', laporanFileInput.files[0]);
            }else {
              formData.append('existing_filename', existing_filename);
            }
            

            formData.append('va_id', va_id);
            formData.append('type', 'VE');

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
            
            axios({
                method: 'post',
                url: api_url+"api/vm/objektif",
                responseType: 'json',
                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                data: formData
            })
            .then(function (response) { 
                if(response.data.code == 200) {  
                  console.log(response.data.data);
                  let status = response.data.data.status
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show"); 

                    $("#add_role_sucess_modal").modal('show');
                    if(type=='submit')
                    {
                      $('#submit_text').removeClass('d-none');      
                      $('#save_text').addClass('d-none');
                    }
                    else
                    {
                      $('#submit_text').addClass('d-none');      
                      $('#save_text').removeClass('d-none');     
                    }

                    $("#tutup").click(function(status){
                        var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                        url = url.replace(":kod", {{$kod_projek}})
                        url = url.replace(":type", 'VE')

                        window.location.href = url
                    })
                }else {

                  if(response.data.code == 422) {
                        Object.keys(response.data.data).forEach(key => {						
                        document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                        });
                    }
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                }
                
            })
            .catch(function (error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })
      }
    //save mmpm form
    $('#submit_lampiran').click(function(){
      if(current_status == '33') {
        submitUlasanUser('34','submit')
        submitLampiran('34','submit')
      }else {
        submitLampiran('32','submit')
      }
            
      })

    $('#ssimpan_lampiran').click(function(){
      if(current_status == '33') {
        submitLampiran(current_status,'save')
        submitUlasanUser(current_status,'save', false)
      }else {
        submitLampiran(current_status,'save')
      }
        
    })

    $('input.kos_selepas_makmal').keyup(function(event) {

      if(event.which >= 37 && event.which <= 40) return;

      var value = $(this).val();

      if(value === "") {
        return;
      }

      // Remove all non-digit characters except for the decimal point
      value = value.replace(/[^\d.]/g, "");

      // Split the value into integer and decimal parts
      const parts = value.split(".");

      // Remove leading zeros from the integer part
      parts[0] = parts[0].replace(/^0+/, '');

      // If there's no integer part, add a leading zero
      if (!parts[0]) {
          parts[0] = "0";
      }

      // Move the decimal point to the left as you add more digits
      if (parts[1] && parts[1].length > 2) {
          parts[0] += parts[1].substr(0, 1);
          parts[1] = parts[1].substring(1);
      }

      // Add commas as a thousand separator to the integer part
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

      // Ensure there are always exactly two decimal places
      if (!parts[1]) {
          parts[1] = "";
      } else if (parts[1].length < 2) {
          parts[1] += "";
      }

      // Combine the integer and decimal parts with a decimal point
      value = parts.join(".");

      // Update the input value
      $(this).val(value);
    });

      function number_format($num)
      {
        $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        return $abc;
      }


        function calculateNewKos()
        {
          newskopkos = 0
          let all_new_kos = document.querySelectorAll(
                      "[id^='skopKos']"
                  ); 
          all_new_kos.forEach((tc, i) => { 
            let new_value = removecomma(all_new_kos[i].value);
            all_new_kos[i].value=number_format(new_value);

            let kos = parseFloat(removecomma(all_new_kos[i].value));
            newskopkos = parseFloat(newskopkos) + parseFloat(kos)
          })
          document.getElementById("newTotalSkopKos").value = number_format(newskopkos);
          kos_difference = parseFloat(newskopkos) - parseFloat(existingskopkos)
          document.getElementById("kosDifference").value = number_format(parseFloat(kos_difference));
          var diff= ((parseFloat(kos_difference)/parseFloat(existingskopkos))*100);

          if(diff>=100)
          {
            document.getElementById("diiferencePercentage").value = '100';
          }
          else
          {
            document.getElementById("diiferencePercentage").value = diff.toFixed(2);
          }
        }

        //----for removing commas from numbers-----------------------------------------------------------------
             function removecomma(num){
              
              num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
              num=parseFloat(num,10);
              return num;
            }
        //----for removing commas from numbers ends-----------------------------------------------------------------
    </script>

    <script>
    $("#laporan_makmal").on('change', function(){ 
        $new_file = $('#laporan_makmal').prop('files')[0];
        if($new_file.size>4000000)
        { 
            document.getElementById("laporan_makmal").value='';
            document.getElementById('laporan_file_type').classList.add("d-none");
            document.getElementById('laporan_file_size').classList.remove("d-none");
            document.getElementById("laporan_image_error").innerHTML=""; 

            return false;
        }
        var allowedExtensions=["application/pdf", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("laporan_makmal").value=''; 
            document.getElementById('laporan_file_type').classList.remove("d-none");
            document.getElementById('laporan_file_size').classList.add("d-none");
            document.getElementById("laporan_image_error").innerHTML=""; 

            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#lm_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                };
                reader.readAsDataURL($new_file);
            }
            document.getElementById("laporan_image_error").innerHTML=""; 
            document.getElementById('laporan_file_type').classList.add("d-none");
            document.getElementById('laporan_file_size').classList.add("d-none");
            document.getElementById("upload_lm").style.display = 'none';
            document.getElementById("lm_preview").style.display = 'block';
            document.getElementById("header_lm_name").innerHTML = $new_file.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_lm_size").innerHTML = docu_size_2;
    });

    $("#remove_lm_logo").on('click', function(){ 
      
      $('#sjm_img').val(null)
      document.getElementById("laporan_makmal").value=''; 
      document.getElementById("upload_lm").style.display = 'block';
      document.getElementById("lm_preview").style.display = 'none';
    });


    function disableEditing()
    {
      document.getElementById("tarikh_pra_makmal_sebenar").readOnly = true; 
      document.getElementById("surat_jemputan_mesyuarat").readOnly = true; 
      document.getElementById("keputusan_mesyuarat_yes").disabled = true; 
      document.getElementById("keputusan_mesyuarat_no").disabled = true; 
      document.getElementById("inlineRadio1").disabled = true; 
      document.getElementById("inlineRadio2").disabled = true; 
      
      document.getElementById("minit_mesyuara").readOnly = true; 
      document.getElementById('simpan_mmpm').style.visibility = 'hidden';


      document.getElementById("makmal_sebenar").readOnly = true; 
      document.getElementById("lawatan_tapak").readOnly = true; 
      document.getElementById("year").readOnly = true; 
      document.getElementById("negeri").readOnly = true; 
      document.getElementById('submit_butiran').style.visibility = 'hidden';

      document.getElementById("kos_selepas_makmal").readOnly = true; 
      document.getElementById("kos_sebelum_makmal").readOnly = true; 
      document.getElementById("kos_pelakas_selepas_makmal").readOnly = true; 
      

      document.getElementById('addBtnFas').style.visibility = 'hidden';
      document.getElementById('addBtnSkop').style.visibility = 'hidden';
      document.getElementById('addBtnObjektif').style.visibility = 'hidden';
      document.getElementById('addBtnOutcome').style.visibility = 'hidden';
      document.getElementById('addBtnOutput').style.visibility = 'hidden';

      document.getElementById('vmsimpan_hantar').style.visibility = 'hidden';
      document.getElementById('simpan_btn').style.visibility = 'hidden';
      document.getElementById('selesai_btn').style.visibility = 'hidden';
        
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


    $("#kos_selepas_makmal").on('change', function(){ 
                document.getElementById("error_kos_selepas_makmal").innerHTML = ''
    })

    function downloadLampiranDoc(){
      filename = document.getElementById("header_lm_name").innerHTML
      const api_url = "{{env('API_URL')}}";
      update_user_api = api_url+"api/vm/dokumen_download/objektif";
      
      axios({
        url: update_user_api + '?id=' + {{$kod_projek}} ,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
      }).then((response) => {
      
        const url = window.URL.createObjectURL(response.data);
        const link = document.createElement('a');
        link.href = url;
        
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(url);
      });

    }

    function downloadLampiranAllDoc(filename,id){

      const api_url = "{{env('API_URL')}}";  
      update_user_api = api_url+"api/vm/dokumen_download/lampiran";
      axios({
        url: update_user_api + '?id=' + id,
        method: 'GET',
        headers: { "Authorization": api_token, },
        responseType: 'blob', // important
      }).then((response) => {
        const url = window.URL.createObjectURL(response.data);
        const link = document.createElement('a');
        link.href = url;
        
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(url);
      });

    }
    var allowedExtensions = /(\.pdf|\.png)$/i;
    $("#kemuka_file_name").on( "change", function() {
      var file_name2=$("#kemuka_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview2").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName2").text(file_name2);
        $("#Uploadfile2").addClass('d-none')
        $("#fileUploaded2").removeClass('d-none')

    } );
    $("#removefile2").click(function(){
      $("#kemuka_file_name").val('')
      $("#filePreview2").attr('src','');
      $("#Uploadfile2").removeClass('d-none')
        $("#fileUploaded2").addClass('d-none')
    })
    $("#removefile1").click(function(){
      $("#terima_file_name").val('')
      $("#filePreview1").attr('src','');
      $("#Uploadfile1").removeClass('d-none')
        $("#fileUploaded1").addClass('d-none')
    })

    $("#terima_file_name").on( "change", function() {
      var file_name1=$("#terima_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview1").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName1").text(file_name1);
        $("#Uploadfile1").addClass('d-none')
        $("#fileUploaded1").removeClass('d-none')
    } );


    $("#SignedDocSaveBtn").click(function(){
      var tarikh_kemuka= $("#tarikh_kemuka").val()
      var tarikh_terima=$("#tarikh_terima").val()
      var kemuka_file_name=$("#kemuka_file_name").val()
      var terima_file_name=$("#terima_file_name").val()
      
      if(tarikh_kemuka==''){
        $("#tarikh_kemuka_error").text('Sila pilih tarikh')
        return false;

      }
      if(tarikh_terima==''){
        $("#tarikh_kemuka_error").text('')
        $("#tarikh_terima_error").text('Sila pilih tarikh')
        return false;

      }
      if(kemuka_file_name==''){
        $("#tarikh_terima_error").text('')
        $("#kemuka_file_name_error").text('Sila muatnaik lampiran')
        return false;

      }
      if(terima_file_name==''){
        $("#kemuka_file_name_error").text('')
        $("#terima_file_name_error").text('Sila muatnaik lampiran')
        return false;
      }
        if(tarikh_kemuka!=''&&tarikh_terima!=''&&kemuka_file_name!=''&&terima_file_name!=''){
          $("#tarikh_kemuka_error").text('')
          $("#tarikh_terima_error").text('')
          $("#kemuka_file_name_error").text('')
          $("#terima_file_name_error").text('')
          // console.log(tarikh_kemuka)
          // console.log(tarikh_terima)
          // console.log(kemuka_file_name)
          // console.log(terima_file_name)
          var allowedExtensions = /(\.pdf|\.png)$/i;
          // console.log(allowedExtensions.exec(kemuka_file_name))
          // console.log(allowedExtensions.exec(terima_file_name))
          if(!allowedExtensions.exec(kemuka_file_name)){
            $("#kemuka_file_name_error").text('gunakan fail pdf atau png sahaja')
            return false;
          }
          if(!allowedExtensions.exec(terima_file_name)){
            $("#terima_file_name_error").text('gunakan fail pdf atau png sahaja')
            return false;
          }

          var file1=$("#kemuka_file_name").prop('files')[0];
          var file2=$("#terima_file_name").prop('files')[0];
          var formEl = document.forms.pelakasananForm;
          // var kemuka_file_name1 = $('#kemuka_file_name').prop('files')[0];
          var formData = new FormData(formEl);
          formData.append('id',{{Auth::user()->id}});
          formData.append('kemuka_file_name',file1);
          formData.append('terima_file_name',file2);
          formData.append('tarikh_kemuka',tarikh_kemuka);
          formData.append('tarikh_terima',tarikh_terima);
          formData.append('pp_id',{{$kod_projek}});

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");

          const api_url = "{{env('API_URL')}}";  
          pelakasanan_api = api_url+"api/project/pelakasanan";
          const api_token = "Bearer "+ window.localStorage.getItem('token')
            axios({
            method: 'post',
            url: pelakasanan_api,
            responseType: 'json',
            headers: { "Content-Type": "multipart/form-data","Authorization": api_token },
            data: formData
            })
            .then(function (response) {
                console.log(response)
                if(response.data.code == 200){
                  // Swal.fire(
                  //   'dokumen dimuat naik',
                  //   'success'
                  // ).then((result) => {
                  //   location.reload();
                  // })
                  $("#tutup").click(function(){
                    location.reload();
                  })
                          $("#add_role_sucess_modal").modal('show');
                          $('#submit_text').addClass('d-none');      
                          $('#save_text').addClass('d-none');   
                          $('#pengeculian_text').removeClass('d-none');    
                      $("#sucess_modal").modal('hide');
                    }else {
                      $("#add_selenggara_data_modal").modal('hide');
                      $("#sucess_modal").modal('show');
                    }
            }) 
            
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        }
    })
    
    $("#va_tandatanganLink").click(function(){

      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");

      const api_url = "{{env('API_URL')}}";  
          api = api_url+"api/project/update_status_perlaksanaan";
          const api_token = "Bearer "+ window.localStorage.getItem('token')
          data={'update_status_perlaksanaan':31,'kod':{{$kod_projek}}};
      axios({
            method: 'post',
            url: api,
            responseType: 'json',
            headers: { "Authorization": api_token },
            data: data
            })
            .then(function (response) {
              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");

                      $("#add_role_sucess_modal").modal('show');
                      $('#submit_text').addClass('d-none');      
                      $('#save_text').addClass('d-none');  
                      $('#pengeculian_text').addClass('d-none'); 
                      $('#tandakan_text').removeClass('d-none');  
     

                      $("#tutup").click(function(){
                        var statusChanged=response.data.data;
                        if(statusChanged==1){
                          window.location.href = "/va_tandatangan/"+{{$kod_projek}}+"/VA"
                        }
                      }) 
            })

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
    })

    $("#muat_naik_surat_file_name").on( "change", function() { 
      var file_name1=$("#muat_naik_surat_file_name").val().replace(/C:\\fakepath\\/i, ''); console.log(file_name1)
        $("#filePreviewsurat").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileNamesurat").text(file_name1);
        $("#Uploadfilesurat").addClass('d-none')
        $("#fileUploadedsurat").removeClass('d-none')
    } );

    $("#removefilesurat").click(function(){
      $("#muat_naik_surat_file_name").val('')
      $("#filePreviewsurat").attr('src','');
      $("#Uploadfilesurat").removeClass('d-none')
        $("#fileUploadedsurat").addClass('d-none')
    });

    $("#simpan_btn").click(function(){
          var file2=$("#muat_naik_surat_file_name").prop('files')[0];

          var muat_naik_surat_file_name=$("#muat_naik_surat_file_name").val();
          if(muat_naik_surat_file_name==''){
                $("#muat_naik_surat_file_name_error").text('Sila muatnaik lampiran');
                return false;
          }

          $("#muat_naik_surat_file_name_error").text('');

          var formData = new FormData();

          formData.append('user_id',{{Auth::user()->id}});
          formData.append('pengecualian',1);
          formData.append('pengeculian_khas','surat_iringan_1.pdf');
          formData.append('surat_lampiran',file2);
          formData.append('pp_id',{{$kod_projek}});
          formData.append('type','VE');


          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");
          
          const api_url = "{{env('API_URL')}}";  console.log(api_url);
          const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
          axios.defaults.headers.common["Authorization"] = api_token

                    $.ajaxSetup({
                          headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
                    axios({
                            method: "post",
                            url: api_url+"api/project/pengeculian_update",                            
                            data: formData,
                            headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                        })
                        .then(function (response) { 
                          location.reload();                        
                        });
    });

    $("#selesai_btn").click(function(){
          var file2=$("#muat_naik_surat_file_name").prop('files')[0];
          var formData = new FormData();

          formData.append('user_id',{{Auth::user()->id}});
          formData.append('pp_id',{{$kod_projek}});
          formData.append('type','VE');

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");


          const api_url = "{{env('API_URL')}}";  console.log(api_url);
          const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
          axios.defaults.headers.common["Authorization"] = api_token

                    $.ajaxSetup({
                          headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
                    axios({
                            method: "post",
                            url: api_url+"api/project/selesai_update",                            
                            data: formData,
                            headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                        })
                        .then(function (response) { 

                          $("div.spanner").removeClass("show");
                          $("div.overlay").removeClass("show"); 
                          $("#add_role_sucess_modal").modal('show');
                          $('#submit_text').addClass('d-none');      
                          $('#save_text').addClass('d-none');   
                          $('#pengeculian_text').removeClass('d-none');         

                            $("#tutup").click(function(){
                                window.location.href = origin + '/senarai_makmal_and_mini';                       
                            })
                        });
    });

    $(document).ready(function(){
        const api_token = "Bearer "+ window.localStorage.getItem('token')
          axios.defaults.headers.common["Authorization"] = api_token
          axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/project/get_pengeculian_data?type=VE&id="+{{$kod_projek}},
          responseType: 'json',            
      })
      .then(function (response) { 
            tabledata=response.data.data
            console.log(response.data.data.length)

            if(tabledata.length>0) {
              hideBelowData();
              document.getElementById('inlineRadio1').checked = true;
              document.getElementById('inlineRadio2').checked = false;
              document.getElementById('selesai_btn').disabled = false;
              document.getElementById("selesai_btn").style.opacity = "1";
            }else{
              showBelowData();
              document.getElementById('inlineRadio1').checked = false;
              document.getElementById('inlineRadio2').checked = true;
              document.getElementById('selesai_btn').disabled = true;
              document.getElementById("selesai_btn").style.opacity = "0.5";
            }

            for(i=0;i<response.data.data.length;i++){

              var date_new = formatdate(tabledata[i].dikemaskini_pada);

              $("#pengecualian_table").append(
              '<tr id='+tabledata[i].id+'>'+
                '<td>'+
                  (i+1)+
                '</td>'+
                '<td>'+
                date_new+
                '</td>'+
                '<td>'+
                    '<a onclick="previewfile(\''+tabledata[i].id+'\',\''+tabledata[i].surat_lampiran+'\')" id="kemuka_file'+tabledata[i].id+'" style="text-decoration:none;color:black;cursor:pointer">'+tabledata[i].surat_lampiran+'</a>'+
                '</td>'+
              '</tr>')
            };

            var length= window.localStorage.getItem('loader_count_VE');
            localStorage.setItem("loader_count_VE", length-1);
            if(length==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }

      })
    });

    function formatdate(date){
                var date = new Date(date)
                const day = date.getDate(); 
                let day_new = 0;
                let month_new = 0;
                if(String(day).length==1)
                {
                    day_new='0'+day;
                }
                else
                {
                    day_new=day;
                }
                const month = date.getMonth() + 1; console.log(month)
                if(String(month).length==1)
                {
                    month_new='0'+month;
                }
                else
                {
                    month_new=month;
                }
                const year = date.getFullYear(); console.log(year)
                const date_new=day_new+'/'+month_new+'/'+year;

                return date_new;
            }

    $("#close_image").click(function(){
          location.reload();
    });

      function previewfile(id,filename){
        const api_url = "{{env('API_URL')}}";  
                      console.log(api_url);
                      const api_token = "Bearer "+ localStorage.getItem('token');  
                      console.log(api_token);
                      update_user_api = api_url+"api/project/preview_pengeculian_data";
                      data_update = {'id':id};
                      var jsonString = JSON.stringify(data_update);
                      console.log(filename)
                      axios({
                        url: update_user_api + '?id=' + id+ '&type=VE',
                        method: 'GET',
                        headers: { "Authorization": api_token, },
                        responseType: 'blob', // important
                      }).then((response) => {
                        console.log(response.data.type);
                        const url = window.URL.createObjectURL(response.data);
                        const link = document.createElement('a');
                        link.href = url;
                        console.log(link);
                        // return;
                        link.setAttribute('download', filename);
                        document.body.appendChild(link);
                        link.click();
                        URL.revokeObjectURL(url);
                      });
        }

    </script>
