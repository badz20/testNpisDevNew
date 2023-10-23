<script>

function load_skop_project(skop_projects){
    console.log(skop_projects)
    
    let total_skop_cost = 0.00
    $.each(skop_projects, function (key, item) {
        let options = ''
        let selected = ''
        total_skop_cost = parseFloat(total_skop_cost) + parseFloat(item.cost)
        document.getElementById('total_cost').value = total_skop_cost.toFixed(2).toString().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $.each(skop_project, function(key, itemoptions) {

            if(item.skop_project_code == itemoptions.skop_code) {
                selected = 'selected'
            }else {
                selected = ''
            }

          options = options + '<option value="' + itemoptions.skop_code + '" '+ selected +'>' + itemoptions.skop_name + '</option>'
        })
        console.log("adding skop");
        let data = 
        ` <tr class="row m-0 mainrow" >
              <td class="col-md-7 col-xs-12 d-flex">
                  <div class="col-1 mainNumbering" id="mainNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important; width:10%;">
                  </div>
                  <div class="p-2 align-items-center" style="width:75%;">
                      <select id="skop_select" class="py-2 form-control" data-db-id="`+item.id+`">        
                    ` + options + `
                      </select>
                  </div>
                  <button data-title="Tambah sub skop" type="button" class="ml-2 addsubrow">
                    <i class="ri-add-box-line ri-xl"></i>
                  </button>
                  <button data-title="Buang skop" type="button" class="minusbutton ml-2">
                    <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                  </button>
              </td>
              <td class="col-md-5 col-xs-12 row">
                <div class="col-12 p-2 ml-2">
                    <input
                          type="" id="skop_text"
                          class="py-2 col-md-8 col-xs-12 form-control text-right"
                          value="`+item.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+`" readonly
                        />
                  </div>
              </td>
          </tr>
          `;

        $('#skopBody').append(data);
        //addsubrowfunction();

        let all_main_minu_btn = document.querySelectorAll(
          ".minusbutton"
        );
        let all_main_tr = document.querySelectorAll(
          ".mainrow"
        );

        let all_main_skop_select = document.querySelectorAll("[id^='skop_select']");


        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
        
        all_main_indexing.forEach((num, i) => {
          num.innerHTML = i + 1
        })

        let all_main_add_sub_btn = document.querySelectorAll(
          ".addsubrow"
        );

        all_main_tr[all_main_minu_btn.length - 1].setAttribute("data-value" , (all_main_minu_btn.length - 1))
        all_main_skop_select[all_main_minu_btn.length - 1].setAttribute("data-value" , (all_main_minu_btn.length - 1))
        
        all_main_minu_btn[all_main_minu_btn.length - 1].addEventListener("click", () => {
          console.log('remove')
          all_main_tr[all_main_minu_btn.length - 1].remove();
          let subrowclass = ".mainrow" + (all_main_minu_btn.length - 1)
          
          
          let all_sub_tr = document.querySelectorAll(subrowclass);
          all_sub_tr.forEach((tsubrow, i) => {
            all_sub_tr[i].remove();
          })
          let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
        
          all_main_indexing.forEach((num, i) => {
            num.innerHTML = i + 1
              //console.log(num)
          })

        })

        all_main_add_sub_btn[all_main_add_sub_btn.length - 1].addEventListener("click", function () 
              { 
                addsubrow(all_main_add_sub_btn.length - 1,all_main_tr[all_main_add_sub_btn.length - 1],all_main_skop_select[all_main_skop_select.length - 1]); 
              } )

        load_sub_skops(item.subskop_projects,item.skop_project_code,all_main_add_sub_btn.length - 1,all_main_tr[all_main_add_sub_btn.length - 1])
    })

        
}

function load_sub_skops(sub_skop_projects,skop_code,mainRowNo,mainRow){
    
    $.each(sub_skop_projects, function (key, item) {
            
            let sub_skop_options = sub_skop_project[skop_code]
            let options = ''
            let selected = ''
            let other_display = 'none'
            $.each(sub_skop_options, function(key, itemoptions) {
                if(item.sub_skop_project_code == itemoptions.sub_skop_code) {
                    selected = 'selected'
                }else {
                    selected = ''
                }
                
                
                options = options + '<option value="' + itemoptions.sub_skop_code + '" '+selected+'>' + itemoptions.sub_skop_name + '</option>'
            })
            console.log(item.sub_skop_project_code)
            console.log(item.lain_lain)
            if(item.sub_skop_project_code == sub_skop_lain_code) {
                  other_display = 'block'
                }
  
            let subRow = `<tr class="row m-0 subrow mainrow`+mainRowNo +`" value="`+mainRowNo+`">
                        <td class="col-md-7 col-xs-12 d-flex">
                          <div class="skopStyle subNumbering_`+mainRowNo+` " style="margin-left: 14%;">
                          </div>
                          <div class="p-2 align-items-center" style="width:70%;">
                            <select id="sub_skop_select" style="width:93%;" class="py-2 form-control sub_skop_select_`+mainRowNo+`" data-db-id="`+item.id+`">
                            ` + options + `
                              </select>
                          </div>
                          <button data-title="Buang skop"  type="button" class="subminusbutton" style="margin-left: 1.2rem;">
                            <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                            </button>
                        </td>
                        <td class="col-md-5 col-xs-12 row">
                          <div class="col-md-8 col-xs-12 p-2 ml-2">
                            <input
                                  type="" id="sub_skop_text"
                                  class="col-12 form-control text-right"
                                  value=`+item.jumlahkos.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+` readonly
                                />
                          </div>
                        </td>
                        <td class="col-md-5 col-xs-12 otherstd`+mainRowNo+`" style="margin-left:11%;display:`+other_display+`;" id="others_td" >
                              <input
                                    type="text" id="skop_lain_lain" value="`+item.lain_lain+`"
                                    class="form-control" style="width: 90%;"/>
                        </td>
                    </tr>`;

                    
                    let subrowclass = ".mainrow" + (mainRowNo)
                    
                    let all_subrow_tr = document.querySelectorAll(subrowclass);

                    if(all_subrow_tr.length > 0){
                    $(subRow).insertAfter(all_subrow_tr[all_subrow_tr.length - 1]);
                    }else {
                    $(subRow).insertAfter(mainRow);
                    }
            
                    let subbumid = ".subNumbering_" + mainRowNo
                    let all_sub_indexing = document.querySelectorAll(subbumid);

                    all_sub_indexing.forEach((subnum, i) => {
                    console.log((mainRowNo) + "." +  (i + 1))
                    subnum.innerHTML = (mainRowNo + 1) + "." +  (i + 1)  
                    })
                    
                    let all_sub_tr = document.querySelectorAll(".subrow");

                    let all_sub_minu_btn = document.querySelectorAll(".subminusbutton");

                    let all_sub_skop_select = document.querySelectorAll("[id^='sub_skop_select']")

                    let all_others_td = document.querySelectorAll("[id^='others_td']")

                    all_sub_skop_select.forEach((tb, i) => { 
                      console.log(all_sub_skop_select[i]);
                      tb.addEventListener("change", function(evt){
                        var input=$(this).val();
                        if(input == sub_skop_lain_code) {
                          all_others_td[i].style.display = 'block'
                        }else {
                          all_others_td[i].style.display = 'none'
                        }
                      })
                    })
                    
                    all_sub_minu_btn.forEach((tb, i) => {
                        tb.addEventListener("click", () => {
                        all_sub_tr[i].remove();
                        let subbumid = ".subNumbering_" + mainRowNo
                        let all_sub_indexing = document.querySelectorAll(subbumid);

                        all_sub_indexing.forEach((subnum, i) => {
                            console.log((mainRowNo) + "." +  (i + 1))
                            subnum.innerHTML = (mainRowNo + 1) + "." +  (i + 1)  
                        })

                        all_sub_indexing.forEach((subnum, i) => {
                            console.log(subnum)
                            subnum.innerHTML = i + 1
                        })
                    })
                    })
    })

}
</script>