<script>


  function loadKewanganPerkara(k_perkara,units,pre_sub_perkara)
  {
      $.each(k_perkara, function (key, item) { 
  
          let data = 
          ` <tr class="Table_perunding_body">
                  <td class="Table_perunding_body p_mainNumbering " id="p_mainNumbering" ></td>
                  <td class="" style="width:5% !important;font-weight:bold;font-size:1rem;" id="p_text">`+item['perkara']+`</td>
                  <td style="width:5% !important;padding-left: 159px !important;"></td>
                  <td style="width:5% !important;"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>`;   
          $('#kewangan_perkara').append(data);
  
  
          let all_main_indexing = document.querySelectorAll("[id^='p_mainNumbering']");
  
          all_main_indexing.forEach((num, i) => {
            num.innerHTML = i + 1
          })
  
  
          let main_p_text = document.querySelectorAll("[id^='p_text']"); 
  
  
          var t_count = document.getElementById("p_table").rows.length; 
          var bayaran_count = localStorage.getItem('bayaran_count'); //alert(bayaran_count)
  
          if(bayaran_count>1)
          {
            loadKewanganSubPerkara(item['subperkara'],t_count-2,main_p_text.length,units,t_count,item['subsubperkara'],pre_sub_perkara[key]['subperkara'],pre_sub_perkara[key]['subsubperkara']);
          }
          else
          {
            loadKewanganSubPerkara(item['subperkara'],t_count-2,main_p_text.length,units,t_count,item['subsubperkara'],'','');
          }
      });
  
      let p_data = `<tr class="Table_perunding_body" style="background-color: #F0ECEC;">
                        <td></td>
                        <td class="lblDikemaskini">JUMLAH KESELURUHAN</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="bold" id="kelulusan_tot"></td>
                        <td></td>
                        <td class="bold" id="terdah_tot"></td>
                        <td></td>
                        <td class="bold" id="semasa_tot"></td>
                        <td></td>
                        <td class="bold" id="kumulatif_tot"></td>
                        <td class="bold" id="baki_tot"></td>
                      </tr>`;
          $('#kewangan_perkara').append(p_data);
  
          calculateTotjumlah();
  }
  
  function  loadKewanganSubPerkara(p_data,maincount,mainRowNo,units,t_count,sub_sub_perka,sub_terda,subsub_terda) { 
  
        let selected = '';
  
        var k_kos = 0;
        var t_kos = 0;
        var s_kos = 0;
        var kum_kos = 0;
        var baki_kos = 0;
        var terda_qty='0.00';
        var terda_jum = '0.00';
        var sub_terda_qty='0.00';
        var sub_terda_jum = '0.00';
        var kum_qty='0.00';
        var kum_jum = '0.00';
        var sub_kum_qty='0.00';
        var sub_kum_jum = '0.00';
  
  
        let length=p_data.length-1;
  
        var bayaran_count = localStorage.getItem('bayaran_count'); 
  
        let sub_row_count = t_count-1; //console.log(p_data); 
        //console.log(sub_terda);
  
        $.each(p_data, function (key, item) { //console.log(item); console.log("key");  console.log(key);  
          //console.log(sub_terda[key]);
  
          if(bayaran_count>1)
          {
            if(item['terdah_quantity'] == '.00' && sub_terda[key])
            { 
              terda_qty = sub_terda[key]['kumulatif_quantity'];
            }
            else
            { 
              terda_qty = item['terdah_quantity'];
            }
  
            if(item['terdah_jumlah'] == '.00' && sub_terda[key])
            { 
              terda_jum = sub_terda[key]['kumulatif_jumlah'];
            }
            else
            { 
              terda_jum = item['terdah_jumlah'];
            }
  
            if(item['kumulatif_quantity'] == '.00'  && sub_terda[key])
            { 
              kum_qty = sub_terda[key]['kumulatif_quantity'];
            }
            else
            { 
              kum_qty = item['kumulatif_quantity'];
            }
  
            if(item['kumulatif_jumlah'] == '.00' && sub_terda[key])
            { 
              kum_jum = sub_terda[key]['kumulatif_jumlah'];
            }
            else
            { 
              kum_jum = item['kumulatif_jumlah'];
            }
          }
          else
          {
            if(item['kumulatif_quantity'] != '.00' )
            { 
              kum_qty = item['kumulatif_quantity'];
            }
  
            if(item['kumulatif_jumlah'] != '.00')
            { 
              kum_jum = item['kumulatif_jumlah'];
            }
          }
  
          // console.log(kum_jum)
          // console.log(kum_qty)
  
          let options = ''; 
          $.each(units, function(key, units) {
            if(units['id']==item['unit'])
            {
              selected = "selected";
            }
            else
            {
              selected = "";
            }
            options = options + '<option value="' + units.id + '"  '+selected+'>' + units.nama_unit + '</option>'
          });
  
          sub_row_count=sub_row_count+1;
  
          let html = 
            ` <tr class="subrow mainperkera`+mainRowNo +`  sub_`+item['id']+`"  value="`+mainRowNo+`">
                  <td class="Table_perunding_body p_subNumbering_`+mainRowNo+` " id="p_subNumbering"  style="height: 50px;"></td>
                  <td>
                    <div class="row p-2">
                      <input disabled class="form-control subperkara perkara_text col-10" id="perkara_sub_text" type="text" name="" data-attr="`+sub_row_count+`" value="`+item['sub_perkara']+`">
                      <button type="button" data-title="Tambah sub skop"  class="ml-2 p_addsubrow" onclick="addSubPerkaraRow(this,`+item['perkara_id']+`,`+item['id']+`)">
                        <i class="ri-add-box-line ri-xl"></i>
                      </button> 
                    </div>   
                  </td>
                  <td><select class="py-2 col-md-8 col-12 form-control subperkara_unit sub_peraku_select_`+mainRowNo+`   super_`+item['id']+`" onchange="calculateUnit(this)" id="sub_peraku_select" data-db-id="">
                  ` + options + `
                    </select></td>
                  <td >
                    <input type="hidden" value="`+item['perkara_id']+`" id="hiddenperkaraid">
                    <input type="hidden" value="`+item['id']+`" id="hiddensubperkaraid">
  
                    <input class="form-control subperkara_kelusan_quantity input-element kelusan_quantity_`+item['id']+`   super_`+item['id']+`" type="text" name="kelusan_quantity" value="`+number_format(item['kelulusan_quantity'])+`" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'parent')" id="kelusan_quantity"></td>
                  <td ><input class="form-control subperkara_kelusan_kadar input-element kelusan_kadar_`+item['id']+`  super_`+item['id']+`" type="text" name="kelulusan_kadar" value="`+number_format(item['kelulusan_kadar'])+`" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'parent')" id="kelusan_kadar"></td>
                  <td ><input disabled="" class="form-control subperkara_kelusan_jumlah input-element kelulusan_`+item['id']+` super_`+item['id']+`" value="`+number_format(item['kelulusan_jumlah'])+`" style="background-color: #F0ECEC;" type="text" name="" id="kelulusan_`+mainRowNo+`"></td>
                  <td ><input class="form-control subperkara_terda_quantity input-element terda_quantity_`+item['id']+`" type="text" value="`+number_format(terda_qty)+`"  name="" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'parent')" id="terda_quantity"></td>
                  <td ><input disabled="" class="form-control subperkara_terda_jumlah input-element terdah__`+item['id']+`" value="`+number_format(terda_jum)+`" style="background-color: #F0ECEC;" type="text" name="" id="terdah_`+mainRowNo+`"></td>
                  <td ><input class="form-control subperkara_semasa_quantity input-element semasa_quantity_`+item['id']+` super_`+item['id']+`" type="text" value="`+number_format(item['semasa_quantity'])+`" name="" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'parent')" id="semasa_quantity"></td>
                  <td ><input disabled="" class="form-control subperkara_semasa_jumlah input-element semasa_`+item['id']+`" value="`+number_format(item['semasa_jumlah'])+`" style="background-color: #F0ECEC;" type="text" name="" id="semasa_`+mainRowNo+`"></td>
                  <td ><input dibaled class="form-control subperkara_kumulatif_quantity input-element kumulatif_quantity_`+item['id']+`  super_`+item['id']+`" type="text" value="`+number_format(kum_qty)+`" name=""  id="kumulatif_quantity"></td>
                  <td ><input disabled="" class="form-control subperkara_kumulatif_jumlah input-element kumulatif_`+item['id']+`" value="`+number_format(kum_jum)+`" style="background-color: #F0ECEC;" type="text" name="" id="kumulatif_`+mainRowNo+`"></td>
                  <td ><input disabled="" class="form-control subperkara_baki_jumlah input-element baki_`+item['id']+`" value="`+number_format(item['baki'])+`" style="background-color: #F0ECEC;" type="text" name="" id="baki_`+mainRowNo+`"></td>                    
              </tr>`;
              
              k_kos=k_kos+parseFloat(item['kelulusan_jumlah']);
              t_kos=t_kos+parseFloat(terda_jum);
              s_kos=s_kos+parseFloat(item['semasa_jumlah']);
              kum_kos=kum_kos+parseFloat(kum_jum);
              baki_kos=baki_kos+parseFloat(item['baki']);
  
          
  
            $('#p_table > tbody > tr').eq(maincount-1).after(html);
  
            let subbumid = ".p_subNumbering_" + mainRowNo; //console.log(subbumid);
            let all_sub_indexing = document.querySelectorAll(subbumid); //console.log(all_sub_indexing)
  
            all_sub_indexing.forEach((subnum, i) => {
              subnum.innerHTML = (mainRowNo) + "." +  (i + 1)  
            })
  
            for(var i = 0; i <sub_sub_perka.length; i++)
            {
              //console.log("new_subsub_terda"); console.log(sub_sub_perka[i]); console.log(subsub_terda[i]); 
              if(sub_sub_perka[i]['sub_perkara_id'] == item['id'])
              {
                  
                disableRow(mainRowNo);

                let unit_options = '';   let unit_selected = '';
                $.each(units, function(key, units) {
                  if(units['id']==sub_sub_perka[i].unit)
                  {
                    unit_selected = "selected";
                  }
                  else
                  {
                    unit_selected = "";
                  }
                  unit_options = unit_options + '<option value="' + units.id + '"  '+unit_selected+'>' + units.nama_unit + '</option>'
                });
  
                if(bayaran_count>1)
                {
                  if(sub_sub_perka[i].terdah_quantity == '.00' && subsub_terda[i])
                  { 
                    sub_terda_qty = subsub_terda[i].kumulatif_quantity;
                  }
                  else
                  { 
                    sub_terda_qty = sub_sub_perka[i].terdah_quantity;
                  }
  
                  if(sub_sub_perka[i].terdah_jumlah == '.00'  && subsub_terda[i])
                  { 
                    sub_terda_jum = subsub_terda[i].kumulatif_jumlah;
                  }
                  else
                  { 
                    sub_terda_jum = sub_sub_perka[i].terdah_jumlah;
                  }
  
                  if(sub_sub_perka[i].kumulatif_quantity == '.00'  && subsub_terda[i])
                  { 
                    sub_kum_qty = subsub_terda[i].kumulatif_quantity;
                  }
                  else
                  { 
                    sub_kum_qty = sub_sub_perka[i].kumulatif_quantity;
                  }
  
                  if(sub_sub_perka[i].kumulatif_jumlah == '.00'  && subsub_terda[i])
                  { 
                    sub_kum_jum = subsub_terda[i].kumulatif_jumlah;
                  }
                  else
                  { 
                    sub_kum_jum = sub_sub_perka[i].kumulatif_jumlah;
                  }
                }
                else
                {
                  if(item['kumulatif_quantity'] != '.00')
                  { 
                    sub_kum_qty = sub_sub_perka[i].kumulatif_quantity;
                  }
  
                  if(item['kumulatif_jumlah'] != '.00')
                  { 
                    sub_kum_jum = sub_sub_perka[i].kumulatif_jumlah;
                  }
                }
  
  
                length=length+1;
                let $parentTR = document.querySelector(".sub_"+item['id']); console.log($parentTR);
                const rowIndex = $parentTR.rowIndex; console.log(rowIndex);
                disableRow(rowIndex);

  
                let component_tr = `<tr class="subsubrow mainperkera`+mainRowNo +`"  value="`+mainRowNo+`"  id="supsub_`+item['id']+`">
                                <td class="Table_perunding_body sup_p_subNumbering_`+mainRowNo+` " id="sup_p_subNumbering" sup_p_subNumbering style="height: 50px;"></td>
                                <td class="">
                                  <input type="hidden" value="`+item['perkara_id']+`" id="hidden_perkara_id">
                                  <input type="hidden" value="`+item['id']+`" id="hidden_subperkara_id">
                                  <div class="row p-2">
                                    <input class="form-control Sub_subperkara col-10" id="sup_perkara_sub_text" type="text" name=""  value="`+sub_sub_perka[i].sub_sub_perkara+`">
                                    <button type="button" data-title="Buang skop"  class="subminusbutton" style="" onclick="minusSubRow(this,`+item['id']+`)">
                                        <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                                    </button>   
                                  </div>
                                </td>
                                <td><select class="py-2 col-md-8 col-12 form-control super_unit sub_peraku_select_`+mainRowNo+`" onchange="calculateUnit(this)" id="sub_peraku_select" data-db-id="">
                                    ` + unit_options + `
                                </select></td>
                                <td ><input value="`+number_format(sub_sub_perka[i].kelulusan_quantity)+`" class="form-control super_kelusan_quantity input-element sub_kelusan_quantity_`+item['id']+`" type="text" name="kelusan_quantity" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'sub')" id="kelusan_quantity"></td>
                                <td ><input value="`+number_format(sub_sub_perka[i].kelulusan_kadar)+`" class="form-control super_kelusan_kadar input-element sub_kelusan_kadar_`+item['id']+`" type="text" name="kelusan_kadar" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'sub')" id="kelusan_kadar"></td>
                                <td ><input value="`+number_format(sub_sub_perka[i].kelulusan_jumlah)+`" disabled="" class="form-control super_kelusan_jumlah input-element sub_kelulusan_`+item['id']+`" style="background-color: #F0ECEC;" type="text" name="" ></td>
                                <td ><input value="`+number_format(sub_terda_qty)+`" class="form-control super_terda_quantity input-element sub_terda_quantity_`+item['id']+`" type="text" name="" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'sub')" id="terda_quantity"></td>
                                <td ><input value="`+number_format(sub_terda_jum)+`" disabled="" class="form-control super_jumlah input-element sub_terdah_`+item['id']+`" style="background-color: #F0ECEC;" type="text" name="" ></td>
                                <td ><input value="`+number_format(sub_sub_perka[i].semasa_quantity)+`" class="form-control super_semasa_quantity input-element sub_semasa_quantity_`+item['id']+`" type="text" name="" onchange="calculatekosunit(this,`+mainRowNo+`,`+item['id']+`,'sub')" id="semasa_quantity"></td>
                                <td ><input value="`+number_format(sub_sub_perka[i].semasa_jumlah)+`" disabled="" class="form-control super_semasa_jumlah input-element sub_semasa_`+item['id']+`" style="background-color: #F0ECEC;" type="text" name="" ></td>
                                <td ><input disabled value="`+number_format(sub_kum_qty)+`" class="form-control super_kumulatif_quantity input-element sub_kumulatif_quantity_`+item['id']+`" type="text" name="" id="kumulatif_quantity"></td>
                                <td ><input value="`+number_format(sub_kum_jum)+`" disabled="" class="form-control super_kumulatif_jumlah input-element sub_kumulatif_`+item['id']+`" style="background-color: #F0ECEC;" type="text" name=""></td>
                                <td ><input value="`+number_format(sub_sub_perka[i].baki)+`" disabled="" class="form-control  input-element super_baki_jumlah sub_baki_`+item['id']+`" style="background-color: #F0ECEC;" type="text" name=""></td>
                                              
                            </tr>`;
  
                          $(component_tr).insertAfter($parentTR);
  
  
                    // k_kos=k_kos+parseFloat(sub_sub_perka[i].kelulusan_jumlah);
                    // t_kos=t_kos+parseFloat(sub_terda_jum);
                    // s_kos=s_kos+parseFloat(sub_sub_perka[i].semasa_jumlah);
                    // kum_kos=kum_kos+parseFloat(sub_kum_jum);
                    // baki_kos=baki_kos+parseFloat(sub_sub_perka[i].baki);
              }
            }
  
  
        });
  
        let html_data = `<tr class="Table_perunding_body jumlah" style="background-color: #F0ECEC;">
                                <td></td>
                                <td class="lblDikemaskini">Jumlah</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="bold" id="kelulusan_jumlah_`+mainRowNo+`"></td>
                                <td></td>
                                <td class="bold" id="terdah_jumlah_`+mainRowNo+`"></td>
                                <td></td>
                                <td class="bold" id="semasa_jumlah_`+mainRowNo+`"></td>
                                <td></td>
                                <td class="bold"  id="kumulatif_jumlah_`+mainRowNo+`"></td>
                                <td class="bold"  id="baki_jumlah_`+mainRowNo+`"></td>
                              </tr>`;
                              // all_sub_indexing[all_sub_length-1].after(html_data);
          
          $('#p_table > tbody > tr').eq(maincount+length).after(html_data);
  
          document.getElementById("kelulusan_jumlah_"+mainRowNo).innerHTML = number_format(k_kos.toFixed(2));
          document.getElementById("terdah_jumlah_"+mainRowNo).innerHTML = number_format(t_kos.toFixed(2));
          document.getElementById("semasa_jumlah_"+mainRowNo).innerHTML = number_format(s_kos.toFixed(2));
          document.getElementById("kumulatif_jumlah_"+mainRowNo).innerHTML = number_format(kum_kos.toFixed(2));
          document.getElementById("baki_jumlah_"+mainRowNo).innerHTML = number_format(baki_kos.toFixed(2));
    }
  
    function  addSubPerkaraRow(element,perakara_id,sub_perakar_id) { 
      
        // var maincount = element.parentNode.parentNode.querySelector("td#sub_peraku_select"); console.log(maincount);
        var mainRowNo = element.parentNode.parentNode.parentNode.rowIndex; console.log(mainRowNo)
        var parentNum = element.parentNode.parentNode.parentNode.getAttribute("value");
        var unit_data = element.parentNode.parentNode.parentNode.querySelectorAll("td select#sub_peraku_select")[0]; console.log(unit_data);
        let options_unit = ''; 
          
        $.each(unit_data, function(key, units) { 
           options_unit = options_unit + '<option value="' + units.value + '">' + units.innerText + '</option>'
        });

        //console.log(options_unit);

        disableRow(mainRowNo);
  
        let html = `<tr class="subsubrow mainperkera`+parentNum +`"  value="`+parentNum+`" id="supsub_`+sub_perakar_id+`">
                  <td class="Table_perunding_body sup_p_subNumbering_`+parentNum+` " id="sup_p_subNumbering"  style="height: 50px;"></td>
                  <td>
                    <div class="row p-2">
                    <input type="hidden" value="`+perakara_id+`" id="hidden_perkara_id">
                    <input type="hidden" value="`+sub_perakar_id+`" id="hidden_subperkara_id">
                    <input class="form-control Sub_subperkara col-10" id="sup_perkara_sub_text" type="text" name=""  value="">
                    <button type="button" data-title="Buang skop"  class="subminusbutton"  onclick="minusSubRow(this,`+sub_perakar_id+`)">
                        <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button> 
                    </div>  
                  </td>
                  <td><select class="py-2 col-md-8 col-12 form-control super_unit sub_peraku_select_`+mainRowNo+`" onchange="calculateUnit(this)" id="sub_peraku_select" data-db-id="">
                    `+options_unit+`
                    </select></td>
                  <td ><input class="form-control super_kelusan_quantity input-element sub_kelusan_quantity_`+sub_perakar_id+`" type="text" name="kelusan_quantity" value='0.00' onchange="calculatekosunit(this,`+parentNum+`,`+sub_perakar_id+`,'sub')" id="kelusan_quantity"></td>
                  <td ><input class="form-control super_kelusan_kadar input-element sub_kelusan_kadar_`+sub_perakar_id+`" type="text" name="kelusan_kadar" value='0.00' onchange="calculatekosunit(this,`+parentNum+`,`+sub_perakar_id+`,'sub')" id="kelusan_kadar"></td>
                  <td ><input disabled="" class="form-control super_kelusan_jumlah input-element sub_kelulusan_`+sub_perakar_id+`" style="background-color: #F0ECEC;" value='0.00' type="text" name="" ></td>
                  <td ><input disabled class="form-control super_terda_quantity input-element sub_terda_quantity_`+sub_perakar_id+`" type="text" name="" value='0.00' onchange="calculatekosunit(this,`+parentNum+`,`+sub_perakar_id+`,'sub')" id="terda_quantity"></td>
                  <td ><input disabled="" class="form-control super_jumlah input-element sub_terdah_`+sub_perakar_id+`" style="background-color: #F0ECEC;" value='0.00'  type="text" name="" ></td>
                  <td ><input class="form-control super_semasa_quantity input-element sub_semasa_quantity_`+sub_perakar_id+`" type="text" name="" value='0.00' onchange="calculatekosunit(this,`+parentNum+`,`+sub_perakar_id+`,'sub')" id="semasa_quantity"></td>
                  <td ><input disabled="" class="form-control super_semasa_jumlah input-element sub_semasa_`+sub_perakar_id+`" style="background-color: #F0ECEC;" value='0.00' type="text" name=""></td>
                  <td ><input class="form-control super_kumulatif_quantity input-element sub_kumulatif_quantity_`+sub_perakar_id+`" type="text" name="" value='0.00' id="kumulatif_quantity"></td>
                  <td ><input disabled="" class="form-control super_kumulatif_jumlah input-element sub_kumulatif_`+sub_perakar_id+`" value='0.00' style="background-color: #F0ECEC;" type="text" name="" ></td>
                  <td ><input disabled="" class="form-control  input-element super_baki_jumlah sub_baki_`+sub_perakar_id+`" value='0.00' style="background-color: #F0ECEC;" type="text" name=""></td>
                                
              </tr>`;
            
  
        $('#p_table > tbody > tr').eq(mainRowNo-2).after(html);
        }
  
  function minusSubRow(element,dataid) {
              var delete_row = element.parentNode.parentNode.parentNode; console.log(delete_row);
              let parentID = delete_row.parentNode.getAttribute("value"); console.log(parentID);
  
              delete_row.parentNode.removeChild(delete_row);
  

              calculateSubRowToal(dataid,"kelusan_quantity");
              calculateSubRowToal(dataid,"kelusan_kadar");
              calculateSubRowToal(dataid,"kelulusan");
              calculateSubRowToal(dataid,"semasa_quantity");
              calculateSubRowToal(dataid,"semasa");
              calculateSubRowToal(dataid,"kumulatif_quantity");
              calculateSubRowToal(dataid,"kumulatif");
              calculateSubRowToal(dataid,"baki");
            
          
              calculatejumlah(parentID,"kelulusan_",dataid);
              calculatejumlah(parentID,"terdah_",dataid);
              calculatejumlah(parentID,"semasa_",dataid);
              calculatejumlah(parentID,"kumulatif_",dataid);
              calculatejumlah(parentID,"baki_",dataid);

              calculateTotjumlah();
              nf();

              let sub_id= "supsub_"+dataid;
              let subrows= document.querySelectorAll("[id='"+sub_id+"']"); console.log(subrows);
              if(subrows.length<=0)
              {
                let sup_id= "super_"+dataid;
                let superrow= document.querySelectorAll("."+sup_id); console.log(superrow);

                for (let i = 0; i < superrow.length; i++) {
                  superrow[i].disabled = false;
                }

              }

  }
  
    function calculatekosunit(textid,parentid,dataid,input_type){ 
    nf();
    
     
    var listItemId = $(textid).closest('tr'); //console.log(listItemId)
    var jumlah_kelulusan = 0;
    var jumlah_terdah = 0;
    var jumlah_semasa = 0;
    var jumlah_kumalah = 0;
    var jumlah_baki = 0;
    var qty_kum = 0;
  
  
    
    // var jumlahfor = listItemId. find('td:eq(1) input[type="hidden"]'). val();  
    // var subjumlahfor = listItemId. find('td:eq(4) input[type="hidden"]'). val();
    var kelulusansqty = listItemId. find('td:eq(3) input[type="text"]'). val();  console.log(kelulusansqty);
    var kelulusankadar = listItemId. find('td:eq(4) input[type="text"]').val(); //console.log(kelulusankadar);
    var kelulusansjumlahkos = listItemId. find('td:eq(5) input[type="text"]');
  
    var terdahqty = listItemId. find('td:eq(6) input[type="text"]').val(); 
    var terdahjumlahkos = listItemId. find('td:eq(7) input[type="text"]');
  
    var semasaqty = listItemId. find('td:eq(8) input[type="text"]').val(); 
    var semasajumlahkos = listItemId. find('td:eq(9) input[type="text"]');
  
    var kumalahqty = listItemId. find('td:eq(10) input[type="text"]'); 
    var kumalahjumlahkos = listItemId. find('td:eq(11) input[type="text"]');
  
    var bakijumlahkos = listItemId. find('td:eq(12) input[type="text"]');
  
    var qty_kum= removecomma(terdahqty) + removecomma(semasaqty); console.log(qty_kum);
  
  
  
    if(removecomma(kelulusansqty)>0 && removecomma(kelulusankadar)>0)
    {
      jumlah_kelulusan = removecomma(kelulusansqty) * removecomma(kelulusankadar);
    }
  
    //console.log(jumlah_kelulusan);
  
    if(removecomma(terdahqty)>0 && removecomma(kelulusankadar)>0)
    {
      jumlah_terdah = removecomma(terdahqty) * removecomma(kelulusankadar);
    }
  
    if(removecomma(semasaqty)>0 && removecomma(kelulusankadar)>0)
    {
      jumlah_semasa = removecomma(semasaqty) * removecomma(kelulusankadar);
    }
  
    // if(removecomma(kumalahqty)>0 && removecomma(kelulusankadar)>0)
    // {
    //   jumlah_kumalah = removecomma(kumalahqty) * removecomma(kelulusankadar);
    // }
  
    let validator_semasa = listItemId. find('td:eq(8) input[type="text"]');
  
    jumlah_kumalah = jumlah_terdah + jumlah_semasa; //console.log(jumlah_kumalah);
    jumlah_baki = jumlah_kelulusan - jumlah_kumalah;
  
    if(jumlah_kumalah>jumlah_kelulusan)
    {
      validator_semasa[0].style.backgroundColor = "#dc35459c";
      validator_semasa[0].value = '0.00';
      alert("Sila masukkan kuantiti yang lebih rendah");
      return false;
     }
    else
    {
      console.log("not greater than");
      validator_semasa[0].style.backgroundColor = "#fff";
      semasajumlahkos.val(jumlah_semasa.toFixed(2));
      kumalahjumlahkos.val(jumlah_kumalah.toFixed(2));
      bakijumlahkos.val(jumlah_baki.toFixed(2));
    }
  
  
    kumalahqty.val(qty_kum.toFixed(2));
    kelulusansjumlahkos.val(jumlah_kelulusan.toFixed(2));
    terdahjumlahkos.val(jumlah_terdah.toFixed(2));
    
    if(input_type=='sub')
    {
      calculateSubRowToal(dataid,"kelusan_quantity");
      calculateSubRowToal(dataid,"kelusan_kadar");
      calculateSubRowToal(dataid,"kelulusan");
      calculateSubRowToal(dataid,"semasa_quantity");
      calculateSubRowToal(dataid,"semasa");
      calculateSubRowToal(dataid,"kumulatif_quantity");
      calculateSubRowToal(dataid,"kumulatif");
      calculateSubRowToal(dataid,"baki");
    }
  
    calculatejumlah(parentid,"kelulusan_",dataid);
    calculatejumlah(parentid,"terdah_",dataid);
    calculatejumlah(parentid,"semasa_",dataid);
    calculatejumlah(parentid,"kumulatif_",dataid);
    calculatejumlah(parentid,"baki_",dataid);
  
    calculateTotjumlah();
    nf();
  
  }
  
  function nf(){
  
    $('.input-element').toArray().forEach(function(field){
      new Cleave(field, {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
      });
    });
  
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
  
  function removecomma(num){
        
        num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
        num=parseFloat(num,10);
        return num;
  }

  function calculateSubRowToal(id,type){
    let kelusan_id = "sub_"+type+"_"+id; //console.log(kelusan_id);
    let parent_id = type+"_"+id; //console.log(parent_id);
    let all_datas = document.querySelectorAll("."+kelusan_id); //console.log(all_datas);
    let kelusan_jumlah = 0;

    for(let i=0; i<all_datas.length; i++)
    { 
      if(removecomma(all_datas[i].value) > 0){
        kelusan_jumlah=kelusan_jumlah+parseFloat(removecomma(all_datas[i].value));
      }
      else
      {
        kelusan_jumlah=kelusan_jumlah;
      } 
    }

      const inputs = document.getElementsByClassName(parent_id);
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = number_format(kelusan_jumlah.toFixed(2));
      }

  }
  
  function calculatejumlah(id,type,dataid){ 
  
        let kelusan_id = type+id; 
        let kelusan_jumlah_id = type+"jumlah_"+id; 
        let kelusan_jumlah = 0;
        let parent_id = type+dataid; //console.log(parent_id);

        let all_kelusan_jumlah = document.querySelectorAll("#"+kelusan_id);   //console.log(all_kelusan_jumlah);
        for(let i=0; i<all_kelusan_jumlah.length; i++){ 
  
          if(removecomma(all_kelusan_jumlah[i].value) > 0){
            document.getElementById(kelusan_jumlah_id).innerHTML=all_kelusan_jumlah[i].value;
            kelusan_jumlah=kelusan_jumlah+parseFloat(removecomma(all_kelusan_jumlah[i].value));
          }
          else
          {
            kelusan_jumlah=kelusan_jumlah;
          }
          
        }
        document.getElementById(kelusan_jumlah_id).innerHTML=number_format(kelusan_jumlah.toFixed(2));
  }
  
  function calculateUnit(textid)
  {
    let selecetedIndex = textid.selectedIndex;
    var selected = textid.options[selecetedIndex].value; //console.log(selected);
    var listItemId = $(textid).closest('tr'); console.log(listItemId)
     var semasajumlahkos = listItemId. find('td:eq(9) input[type="text"]'); console.log(semasajumlahkos);
     var kumalahjumlahkos = listItemId. find('td:eq(11) input[type="text"]'); console.log(kumalahjumlahkos);
  
     if(selected=='13')
     {
        semasajumlahkos[0].style.cssText="background-color:#FFFF";
        semasajumlahkos[0].disabled = false;
     }
     else
     {
        semasajumlahkos[0].style.cssText="background-color:#F0ECEC";
        semasajumlahkos[0].disabled = true;
     }
  }
  
  function calculateTotjumlah(){
    
    let kelulusan_jumlahs = document.querySelectorAll("[id^='kelulusan_jumlah_']"); 
    let terdah_jumlahs = document.querySelectorAll("[id^='terdah_jumlah_']"); 
    let semasa_jumlahs = document.querySelectorAll("[id^='semasa_jumlah_']"); 
    let kumulatif_jumlahs = document.querySelectorAll("[id^='kumulatif_jumlah_']"); 
    let baki_jumlahs = document.querySelectorAll("[id^='baki_jumlah_']"); 
  
  
    let kelusan_jumlah_tot = 0;
    let terdah_jumlah_tot = 0;
    let semasa_jumlah_tot = 0;
    let kumulatif_jumlah_tot = 0;
    let baki_jumlah_tot = 0;
  
  
    for (var i = 0;i < kelulusan_jumlahs.length; i++) {          
          if(removecomma(kelulusan_jumlahs[i].innerHTML) > 0){
            kelusan_jumlah_tot=kelusan_jumlah_tot+parseFloat(removecomma(kelulusan_jumlahs[i].innerHTML));
          }
          else
          {
            kelusan_jumlah_tot=kelusan_jumlah_tot;
          }
    }
    document.getElementById('kelulusan_tot').innerHTML=number_format(kelusan_jumlah_tot.toFixed(2));
  
    for (var i = 0;i < terdah_jumlahs.length; i++) {          
          if(removecomma(terdah_jumlahs[i].innerHTML) > 0){
            terdah_jumlah_tot=terdah_jumlah_tot+parseFloat(removecomma(terdah_jumlahs[i].innerHTML));
          }
          else
          {
            terdah_jumlah_tot=terdah_jumlah_tot;
          }
    }
    document.getElementById('terdah_tot').innerHTML=number_format(terdah_jumlah_tot.toFixed(2));
  
    for (var i = 0;i < semasa_jumlahs.length; i++) {          
          if(removecomma(semasa_jumlahs[i].innerHTML) > 0){
            semasa_jumlah_tot=semasa_jumlah_tot+parseFloat(removecomma(semasa_jumlahs[i].innerHTML));
          }
          else
          {
            semasa_jumlah_tot=semasa_jumlah_tot;
          }
    }
    document.getElementById('semasa_tot').innerHTML=number_format(semasa_jumlah_tot.toFixed(2));
  
    for (var i = 0;i < kumulatif_jumlahs.length; i++) {       
          if(removecomma(kumulatif_jumlahs[i].innerHTML) > 0){
            kumulatif_jumlah_tot=kumulatif_jumlah_tot+parseFloat(removecomma(kumulatif_jumlahs[i].innerHTML));
          }
          else
          {
            kumulatif_jumlah_tot=kumulatif_jumlah_tot;
          }
    }
    document.getElementById('kumulatif_tot').innerHTML=number_format(kumulatif_jumlah_tot.toFixed(2));
  
    for (var i = 0;i < baki_jumlahs.length; i++) {       
          if(removecomma(baki_jumlahs[i].innerHTML) > 0){
            baki_jumlah_tot=baki_jumlah_tot+parseFloat(removecomma(baki_jumlahs[i].innerHTML));
          }
          else
          {
            baki_jumlah_tot=baki_jumlah_tot;
          }
    }
    document.getElementById('baki_tot').innerHTML=number_format(baki_jumlah_tot.toFixed(2));
  }

  function disableRow(index){ //console.log(index);
        const table = document.getElementById('p_table'); //console.log(table);
        const row = table.rows[index]; //console.log(row);
        const inputs = row.getElementsByTagName('input'); //console.log(inputs); 
        for (let i = 0; i < inputs.length; i++) {
          inputs[i].disabled = true;
        }

         // Disable buttons
         const select = row.getElementsByTagName('select'); //console.log(select);
        for (let i = 0; i < select.length; i++) {
          select[i].disabled = true;
        }
    }
  
  </script>