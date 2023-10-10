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
        $('#modal_lawatan_tapak').daterangepicker({
          locale: { format: 'DD/MM/YYYY' }
        });

        $('#vmpop_btn').mouseover(function () {
              $('#vmpop_content').removeClass('d-none');      
        });
        $('#vmpop_btn').mouseout(function () {
              $('#vmpop_content').addClass('d-none');      
        });

        
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        
        localStorage.setItem("loader_count_mini", 4);

        document.getElementById("upload_lm").style.display = 'block';
        document.getElementById("lm_preview").style.display = 'none';
      axios.defaults.headers.common["Authorization"] = api_token
      axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/project/brif_project_details/" + {{$kod_projek}},
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
          oldskoplength = skop_project.length
          oldobjektiflength = 0;
          units = response.data.data.units; 
          let unit_options = '<option value="">--Pilih--</option>'
          $.each(units, function(key, item_unit) {
                                unit_options = unit_options + '<option value="' + item_unit.id + '">' + item_unit.nama_unit + '</option>'
          })
          localStorage.setItem('unit_drop', unit_options);

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
          localStorage.setItem("obj_length", oldobjektiflength);


          if(skop_project.length > 0) {
                  $.each(skop_project, function (key, item) {
                    skoprowIdx = skoprowIdx+ 1;
                    existingskopkos = parseInt(existingskopkos) + parseInt(item.cost) 
                    $('#tbodyoldskop').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${skoprowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.pemantauanskop_options.skop_name+`">`+item.pemantauanskop_options.skop_name+`</textarea>
                          </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+number_format(item.cost)+`">
                          </td>
                        </tr>`);
                  })

                  document.getElementById('oldTotalSkopKos').value = number_format(existingskopkos);
            }

            if(output.length > 0) {
                  $.each(output, function (key, item) {
                    outputrowIdx = outputrowIdx+ 1;
                    $('#tbodyoldoutput').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outputrowIdx}</p>
                          </td>
                          <td>
                            <textarea disabled class="form-control text-center" type="text" value="`+item.output_proj+`">`+item.output_proj+`</textarea>
                              </td>
                          <td>
                            <input disabled class="form-control text-center" type="text" value="`+item.Kuantiti+`">
                              </td>
                          <td>
                              <select disabled style="font-size: 0.8rem;"  class="form-control" id="output_select_`+item.unit_id+`">
                                        `+unit_options+`
                              </select>
                          </td>
                            </tr>`);

                            document.getElementById("output_select_"+item.unit_id).value = item.unit_id;
                  })
            }

            if(outcome.length > 0) {
                  $.each(outcome, function (key, item) {
                    outcomerowIdx = outcomerowIdx+ 1;
                    $('#tbodyoldoutcome').append(`<tr >
                          <td class="row-index text-center">
                          <p> ${outcomerowIdx}</p>
                          </td>
                          <td>
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.Projek_Outcome+`">`+item.Projek_Outcome+`</textarea>
                              </td>
                          <td>
                            <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="`+item.Kuantiti+`">
                              </td>
                          <td>
                              <select disabled style="font-size: 0.8rem;"  class="form-control" id="outcome_select_`+item.unit_id+`">
                                        `+unit_options+`
                              </select>
                          </td>
                            </tr>`);


                            document.getElementById("outcome_select_"+item.unit_id).value = item.unit_id;

                  })
            }

            var length= window.localStorage.getItem('loader_count_mini');
                        localStorage.setItem("loader_count_mini", length-1);

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
              type:'VA'
          }            
      })
      .then(function (response) { 
              objektifData = response.data.data.objektif; 
              skopData = response.data.data.skop
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
              if(project.status_perlaksanaan == '26') {
              }

              if(project.status_perlaksanaan >= '30') {
                disableEditing()
                // document.getElementById('naik_laporan').style.display = 'none';
              }

              if(project.status_perlaksanaan == '27') {
                disableEditing()
                document.getElementById('naik_laporan').style.display = 'none';
              }

              if(project.status_perlaksanaan == '28') {
              }

              if(project.status_perlaksanaan == '30') {
                disableEditing()
                document.getElementById('naik_laporan').style.display = 'none';
              }

              if(project.status_perlaksanaan == '29') {
                disableEditing()
                document.getElementById('naik_laporan').style.display = 'none';
                if(user_bahagian != 'BKOR') {
                }
              }

              if({{json_encode($viewOnly)}}) {
                disableInputs()
              }

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
                      if(item.va.status == '26' || item.va.status == '28') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeObjektifRow(${newobjektiflength})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }
                      // Adding a row inside the tbody.
                      $('#tbodynewobjektif').append(`<tr id="OR${newobjektiflength}">
                      <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" `+readonly+` wrap="virtual" type="text" value="`+item.objecktif_selepas+`">`+item.objecktif_selepas+`</textarea>
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
                              <input  style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center"  wrap="virtual" type="text" value=""></textarea>
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
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                            </td>
                                <td>
                              <input style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                              </tr>`);
                      }

                      button = ''
                      if(item.va.status == '26' || item.va.status == '28') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }

                      // Adding a row inside the tbody.
                      $('#tbodynewskop').append(`<tr id="SR${skoprowIdx}">
                      <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="`+item.id+`" name="id" `+readonly+`>
                              <td>
                                <textarea style="font-size:0.8rem;" class="form-control text-center" wrap="virtual" type="text" `+readonly+` value="`+item.skop_selepas+`">`+item.skop_selepas+`</textarea>
                              </td>
                              <td>
                                <input style="font-size:0.8rem; text-align:right;" class="form-control text-center" type="text" `+readonly+` value="`+number_format(item.kos_selepas)+`" id="skopKos">
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
                              <textarea style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                            </td>
                              </tr>`);
                            
                           $('#tbodynewskop').append(`<tr id="SR${skoprowIdx}">
                              <input style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <input style="font-size:0.8rem;" class="form-control text-right kos_selepas_makmal" type="text" value="" id="skopKos" placeholder="0.00">
                              </td>
                              <td class="text-center">
                                <button  style="font-size:0.8rem;"class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
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
                              <textarea  style="font-size:0.8rem;" disabled class="form-control text-center" wrap="virtual" type="text" value=""></textarea>
                                </td>
                            <td>
                              <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                      }

                      button = ''
                      if(item.va.status == '26' || item.va.status == '28') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeOutcomeRow(${outcomerowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }

                      // Adding a row inside the tbody.
                      $('#tbodynewoutcome').append(`<tr id="OT${outcomerowIdx}">
                      <input  style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                              <td>
                                <textarea  style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.outcome_selepas+`">`+item.outcome_selepas+`</textarea>
                              </td>
                              <td>
                                <input  style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.quantity_selepas+`">
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
                              <textarea  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" wrap="virtual" value=""></textarea>
                                </td>
                            <td>
                              <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                            
                           $('#tbodynewoutcome').append(`<tr id="OT${outcomerowIdx}">
                              <input  style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea  style="font-size:0.8rem;" class="form-control text-center" type="text" value=""></textarea>
                              </td>
                              <td>
                                <input  style="font-size:0.8rem;" class="form-control text-center" type="text" value="">
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

                      button = ''
                      if(item.va.status == '26' || item.va.status == '28') {
                            button = `<button class="vmplus_minus" type="button" onClick="removeOutputRow(${outputrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>`
                            readonly = ''
                        }


                      // Adding a row inside the tbody.
                      $('#tbodynewoutput').append(`<tr id="OP${outputrowIdx}">
                      <input  style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                              <td>
                                <textarea  style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.output_selepas+`">`+item.output_selepas+`</textarea>
                              </td>
                              <td>
                                <input  style="font-size:0.8rem;" class="form-control text-center" type="text" `+readonly+` value="`+item.quantity_selepas+`">
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
                              <textarea  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value=""></textarea>
                                </td>
                            <td>
                              <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                                </td>
                            <td>
                              <input  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" value="">
                            </td>
                              </tr>`);
                            
                           $('#tbodynewoutput').append(`<tr id="OP${outputrowIdx}">
                              <input  style="font-size:0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                              <td>
                                <textarea  style="font-size:0.8rem;" class="form-control text-center" type="text" value=""></textarea>
                              </td>
                              <td>
                                <input  style="font-size:0.8rem;" class="form-control text-center" type="text" value="">
                              </td>
                              <td>
                                <select  style="font-size:0.8rem;" class="form-control" id="unit" name="unit" value="">
                                    <option value="rm">RM</option>
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
                            <textarea style="font-size:0.8rem;" disabled class="form-control text-center"  wrap="virtual"type="text" value=""></textarea>
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
                              <textarea style="font-size:0.8rem;" class="form-control text-center" type="text" value=""></textarea>
                            </td>
                            <td>
                              <input style="font-size:0.8rem;" class="form-control text-right kos_selepas_makmal" type="text" value="" id="skopKos" placeholder="0.00">
                            </td>
                            
                            <td class="text-center">
                              <button style="font-size:0.8rem;" class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
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

            var length= window.localStorage.getItem('loader_count_mini');
                        localStorage.setItem("loader_count_mini", length-1);

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
                            <input class="form-control text-center" type="hidden" value="" name="id">
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
                            <textarea  style="font-size:0.8rem;" disabled class="form-control text-center" type="text" wrap="virtual" value=""></textarea>
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
                    $('#tbodynewoutcome').append(`<tr id="OT${outcomerowIdx}">
                    <input class="form-control text-center" type="hidden" value="" name="id">
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
                    var unit_ouput_drop= window.localStorage.getItem('unit_drop');

                    
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
                              `+unit_ouput_drop+`
                              </select>
                            </td>
                            <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeOutputRow(${outputrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                            </td>
                          </tr>`);
                });
        //})

      })

      function removeSkopRow(id){
            var row = document.getElementById('SR'+id);
            row.parentNode.removeChild(row);
            if(newskoplength > oldskoplength) {
              newskoplength = newskoplength - 1
              skoprowIdx = skoprowIdx - 1
            $('#oldskopTable tr:last').remove();
          }
          else
          {
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
          }else{
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
          }else{
            newoutputlength = newoutputlength - 1
          }
      }

     </script>




    <!-- Simpan Draft Lampiran -->
    <script>


      function submitLampiran(status)
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

            formData.append('kos_selepas_makmal', kosSelepasMakmal);
            formData.append('status', status);
            formData.append('pengecualian', 1);

            if(!existing_file) {
              formData.append('laporanFileInput', laporanFileInput.files[0]);
            }else {
              formData.append('existing_filename', existing_filename);
            }
            

            formData.append('va_id', va_id);
            formData.append('type', 'VA');

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
                    $("#tutup").click(function(status){
                        var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                        url = url.replace(":kod", {{$kod_projek}})
                        url = url.replace(":type", 'Mini_VA')

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
      if(current_status == '28') {
        submitUlasanUser('29')
        submitLampiran('29')
      }else {
        submitLampiran('27')
      }
            
      })

    $('#ssimpan_lampiran').click(function(){
      if(current_status == '28') {
        submitLampiran(current_status)
        submitUlasanUser(current_status, false)
      }else {
        submitLampiran(current_status)
      }
        
    })
    $('#Selesai').click(function(){
      if(current_status == '26') {
        submitLampiran(current_status)
        submitSelesai()
      } if(current_status > 30){
        window.location.href = "/mini_va_tandatangan/"+{{$kod_projek}}+"/VA";
      } else {
        submitSelesai()
      }
    })

      $('input.kos_selepas_makmal').keyup(function(event) {

        // skip for arrow keys
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

      $("#close_image").click(function(){
          location.reload();
      });

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

      // document.getElementById('vmsimpan_hantar').style.visibility = 'hidden';
      $("#ssimpan_lampiran").addClass('d-none');
        
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

function submitSelesai()
{
    var formData = new FormData();

    formData.append('pp_id', {{$kod_projek}})
    formData.append('user_id', {{Auth::user()->id}})
    formData.append('status', 30);

    axios({
        method: 'post',
        url: api_url+"api/project/selesai",
        responseType: 'json',
        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
        data: formData
    })
    .then(function (response) { 
        if(response.data.code == 200) {  
            let status = response.data.data.status_perlaksanaan
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show"); 
            $("#add_role_sucess_modal").modal('show');
            $("#tutup").click(function(){
                if(status == 27 || status == 29) {
                    var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'Mini_VA')
                                        window.location.href = url
                }else {
                    //var url = "{{ route('vm.list') }}"
                            // localStorage.setItem('isVEclicked', 'clicked');
                            // var url = '{{ route("vm.maklumatPelakasanaanMakmal", [":kod" , ":type"])}}'
                            // url = url.replace(':type', 'Mini_VA');
                            // url = url.replace(':kod',{{$kod_projek}});
                            //window.location.href = url;

                  window.location.href = "/mini_va_tandatangan/"+{{$kod_projek}}+"/VA"

                }
                // url = url.replace(":status", response.data.data.workflow_status)
                // url = url.replace(":user_id", response.data.data.dibuat_oleh)
                // window.location.href = url
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
          $("#submit_lampiran").addClass('d-none');
          $("#kajian_head").addClass('d-none');
          $("#muat_naik_surat_form").removeClass('d-none');
          $("#muat_naik_surat_table").removeClass('d-none');
          $("#vmsimpan_hantar").addClass('d-none');
          $("#sjm_table_div").addClass('d-none');
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
          $("#submit_lampiran").removeClass('d-none');
          $("#kajian_head").removeClass('d-none');
          $("#muat_naik_surat_form").addClass('d-none');
          $("#muat_naik_surat_table").addClass('d-none');
          $("#vmsimpan_hantar").removeClass('d-none');
          $("#sjm_table_div").removeClass('d-none');
        }
      }
    </script>
