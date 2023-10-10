<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>

function addPerkara(){


    let data = 
        ` <tr class="row m-0 mainrow" >
            <td class="col-md-12 col-xs-12 d-flex ">
                <div class="col-1 mainNumbering" id="mainNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important; width:10%;">
                </div>
                <div class="p-2 align-items-center" style="width:72%;">
                    <input
                    type="text" id="perkara_text"
                    class="py-2 col-md-11 col-xs-12 form-control"
                    value="" 
                    />
                </div>
                <button type="button" data-title="Tambah sub skop"  class="ml-2 addsubrow" onclick="addSubRow(this)">
                  <i class="ri-add-box-line ri-xl"></i>
                </button>
                <button type="button" data-title="Buang skop"  style="margin-left: 1.2rem;" onclick="removeSubRow(this)">
                      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
            </td>
          </tr>
          `;
        
        $('#skopBody').append(data);


        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
        let all_main = document.querySelectorAll("[id^='perkara_text']");
        
        all_main_indexing.forEach((num, i) => {
          num.innerHTML = i + 1
        })

        all_main.forEach((num, i) => {
          abc = i + 1;
          num.setAttribute("data-value" , abc)
        })
}

function  addSubRow(element) {

   var maincount = element.parentNode.parentNode.querySelector("div#mainNumbering").innerHTML; //console.log(maincount);

    var mainRowNo = element.parentNode.parentNode.rowIndex; //alert(mainRowNo)

    let html = 
        ` <tr class="row m-0 subrow mainrow`+maincount +`"  value="`+maincount+`">
            <td class="col-md-12 col-xs-12 d-flex">
                <div class="skopStyle subNumbering_`+maincount+` " id="subNumbering" style="margin-left: 5%;font-size: 12px;">
                </div>
                <div class="p-2 align-items-center" style="width:75%;margin-left:5%;">
                    <input
                    type="text" id="perkara_sub_text"
                    class="py-2 col-md-10 col-xs-12 form-control sub_perkara_`+maincount+`""
                    value="" 
                    />
                </div>
                <button type="button" data-title="Buang skop"  class="subminusbutton" style="margin-left: 1.2rem;" onclick="minusSubPerkaraRow(this)">
                    <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
            </td>
          </tr>
          `;
        

    $('#skop > tbody > tr').eq(mainRowNo-1).after(html);

    var Subcount = element.parentNode.parentNode.querySelector("div#mainNumbering").innerHTML;



        let subbumid = ".subNumbering_" + maincount
        let all_sub_indexing = document.querySelectorAll(subbumid);

        all_sub_indexing.forEach((subnum, i) => {
          subnum.innerHTML = (Subcount) + "." +  (i + 1)  
        })
}

function removeSubRow(element) { 

    var mainNum = element.parentNode.querySelector("div").innerHTML;
    var id= '.mainrow'+mainNum; //console.log(id);
    let all_sub_rows = document.querySelectorAll(id); //console.log(all_sub_rows);
    for(let i=0; i<all_sub_rows.length; i++)
    {
      all_sub_rows[i].remove(); //remove sub row
    }
    element.parentNode.remove(); //remove parent row

    let all_main_num = document.querySelectorAll("#mainNumbering"); 
    all_main_num.forEach((subnum, i) => { //console.log(subnum)

         var class_name='.mainrow'+subnum.innerHTML; //console.log(class_name)
         let all_sub_sub_rows = document.querySelectorAll(class_name); console.log(all_sub_sub_rows);

         for(let j=0; j<all_sub_sub_rows.length; j++)
          {
            //console.log(all_sub_sub_rows[j]);
            var old_class=all_sub_sub_rows[j].classList[3]; //console.log(old_class);
            all_sub_sub_rows[j].classList.remove(old_class);
            all_sub_sub_rows[j].classList.add('mainrow'+ (i+1))
            all_sub_sub_rows[j].setAttribute( "value", i+1 ); //console.log(i+1);

            var old_sub_class = all_sub_sub_rows[j].querySelector('td div').classList[1];
            all_sub_sub_rows[j].querySelector('td div').classList.remove(old_sub_class);
            all_sub_sub_rows[j].querySelector('td div').classList.add('subNumbering_'+ (i+1))

            all_sub_sub_rows[j].querySelector('td div').innerHTML = (i+1) + '.' + (j+1); //subcount

            var old_sub_input = all_sub_sub_rows[j].querySelector('td div input').classList[4]; 
            all_sub_sub_rows[j].querySelector('td div input').classList.remove(old_sub_input);
            all_sub_sub_rows[j].querySelector('td div input').classList.add('sub_perkara_'+ (i+1));
          }

          subnum.innerHTML = i + 1;
    })
}

function minusSubPerkaraRow(element) { //console.log(element.parentNode.parentNode.getAttribute('value'));

            var Subcount = element.parentNode.parentNode.getAttribute('value');

            element.parentNode.parentNode.remove();


            var class_name='.subNumbering_'+Subcount; //console.log(class_name)
            let all_sub_sub_rows = document.querySelectorAll(class_name); console.log(all_sub_sub_rows);

            all_sub_sub_rows.forEach((subnum, i) => { console.log(subnum);
              subnum.innerHTML = (Subcount) + "." +  (i + 1)  
            })
}

$(document).ready(function () { 
                     

      $("#kemaskini").prop("disabled", true);
      document.getElementById("kemaskini").style.opacity = "0.5"; 
      $("#btn_simpan").prop("disabled", true);
      document.getElementById("btn_simpan").style.opacity = "0.5";


                const api_token = "Bearer "+ window.localStorage.getItem('token');
                const api_url = "{{env('API_URL')}}"; 
                axios.defaults.headers.common["Authorization"] = api_token;
                var bayaran_data = localStorage.getItem('bayaran_count'); 



                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                axios({
                    method: 'get',
                    url: api_url+"api/perunding/list_perkara/" + {{$project_id}}+"/" + {{$perolehan_id}} +"/" + bayaran_data,
                    responseType: 'json',            
                })
                .then(function (response) { console.log("perkara");

                  var perkara= response.data.data.perkara; //console.log(perkara);
                  var pre_sub_perkara= response.data.data.pre_sub_perkara; console.log(pre_sub_perkara);
                  var units= response.data.data.units; //console.log(units);
                  var project= response.data.data.project; //console.log(project);
                  var perolehan_details = response.data.data.perolehan
                  var bayaran= response.data.data.bayaran; //console.log(bayaran);

                  document.getElementById("no_bayaran").value = bayaran_data;
                  document.getElementById('kod_projek').value = perolehan_details.pemantauan_project.kod_projeck
                  document.getElementById('nama_project').value = perolehan_details.pemantauan_project.nama_projek
                  document.getElementById('nama_perunding').value = perolehan_details.nama_peruding;
                  document.getElementById('nama_perolehan').value = perolehan_details.nama_perolehan;
                  //document.getElementById('no_perjanjian').value = project.perolehan_project.nama_peruding;
                  document.getElementById('tarik_perunding').value = perolehan_details.tarikh_setuju_terima;

                  if(bayaran_data>1)
                  {
                    $('#perkera_section').addClass('d-none');
                  }
                  else
                  {
                    $('#perkera_section').removeClass('d-none');
                  }
                  if(bayaran['no_baucer']==0)
                  {
                    $('#btn_simpan').removeClass('d-none');
                  }
                  else
                  {
                    $('#btn_simpan').addClass('d-none');
                  }


                  if(perkara.length>0)
                  {
                      loadPerkara(perkara);
                      loadKewanganPerkara(perkara,units,pre_sub_perkara);

                      if(bayaran_data>=2)
                      {
                        $("#kemaskini").addClass("d-none");
                        disableTerdhahulu(0);
                      }
                      else
                      {
                        if(bayaran['no_baucer']==0)
                        {
                          $("#kemaskini").removeClass("d-none");
                        }
                        else
                        {
                          $("#kemaskini").addClass("d-none");
                        }
                        disableTerdhahulu(1);
                      }

                      $("#simpan").prop("disabled", true);
                      document.getElementById("simpan").style.opacity = "0.5"; 
                      $("#kemaskini").prop("disabled", false);
                      document.getElementById("kemaskini").style.opacity = "1"; 
                      $("#btn_simpan").prop("disabled", false);
                      document.getElementById("btn_simpan").style.opacity = "1";
                  }

              
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");

                });

                  $("#simpan").click(function(){
                              let skop_valiation = false;
                              let need_main_works = false;
                              let contain_main_works = false;
                              let skop_main_valiation = false;
                              let unique_skop_valiation = false;
                              let unique_sub_skop_valiation = false;

                              let unique_skop = []
                              let unique_sub_skop = []
                              let all_main_perkara_text = document.querySelectorAll("[id^='perkara_text']"); //console.log(all_main_perkara_text);

                              if(all_main_perkara_text.length==0 || all_main_perkara_text[0].value=='') 
                              {
                                document.getElementById("error_perkara_project").innerHTML = "Sila pilih perkara";
                                return false;
                              }
                              document.getElementById("error_perkara_project").innerHTML = "";
                              

                              let skop_details = []
                              all_main_perkara_text.forEach((skop_select, i) => { 
                                  data = []
                                  data['skop_value'] = skop_select.value; //console.log(data);
                                  
                                  let subIndex = skop_select.getAttribute("data-value")
                                  let subclass = ".sub_perkara_" + subIndex
                                  let all_sub_perkara_select = document.querySelectorAll(subclass); //console.log(all_sub_perkara_select);
                                  
                                  sub_data = []
                                  others_data = []
                                  sub_dict_data = []
                                  all_sub_perkara_select.forEach((sub_skop_select, i) => {

                                      data = []
                                      data['id'] = subIndex
                                      data['value'] = sub_skop_select.value
                                      sub_data.push(data)
                                  })

                                  let skop = []
                                  let temp_skop_data = []
                                  temp_skop_data['id'] = subIndex
                                  temp_skop_data['value'] = skop_select.value
                                  skop['perkara_value'] = temp_skop_data
                                  skop['sub_perkara_value'] = sub_data
                                  skop_details.push(skop)

                              })

                              //console.log(skop_details)

                              let skop_details_final = []
                              skop_details.forEach((skop) => {
                                  let sub_perkara = []
                                  
                                  skop['sub_perkara_value'].forEach((subskop) => {
                                      //console.log(subskop);
                                      sub_perkara.push(`{"id":"`+subskop.id+`","value":"`+subskop.value+`"}`)
                                      
                                  })

                                  let tempskop = `{"id":"`+skop['perkara_value'].id+`","value":"`+skop['perkara_value'].value+`"}`
                                  skop_details_final.push(`{"perkara":`+tempskop+`,"sub_perkara":`+JSON.stringify(sub_perkara)+`}`)
                              })

                              //console.log(skop_details_final)

                              var formData = new FormData();
                              // formData.append('id', {{$project_id}});
                              formData.append('project_id', {{$project_id}})
                              formData.append('perolehan',{{$perolehan_id}});
                              
                              skop_details_final.forEach((item) => {
                                    formData.append('perkara_project_details[]', item);
                              });
                              formData.append('user_id', {{Auth::user()->id}})
                              var bayaran_data = localStorage.getItem('bayaran_count'); 
                              formData.append('no_bayaran', bayaran_data)
                              formData.append('action',"Tambah Perkara");




                              $("div.spanner").addClass("show");
                              $("div.overlay").addClass("show");

                              console.log('form submitted')
                              axios.defaults.headers.common["Authorization"] = api_token
                              axios({
                              method: 'post',
                              url: api_url+"api/perunding/add_perkara",
                              responseType: 'json',
                              data: formData
                              })
                              .then(function (response) {
                                  if(response.data.status=='Success'){

                                      $("div.spanner").removeClass("show");
                                      $("div.overlay").removeClass("show");

                                      $("#add_role_sucess_modal").modal('show');


                                      $("#tutup").click(function(){
                                        location.reload();
                                      })
                                  }
                                  else{
                                      Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'Something went wrong!',
                                      })
                                      
                                  }
                              })  



                  })

                  let bayaran =  localStorage.getItem('bayaran_count'); //alert(bayaran)

                  axios({
                      method: 'get',
                      url: api_url+"api/perunding/get_history/"+ {{$project_id}}+"/" + {{$perolehan_id}}+"/" + bayaran,
                      responseType: 'json',            
                  })
                  .then(function (response) { //console.log("bayaran");
                    loadBayaranHistory(response)
                  });
                  
  });



  $("#btn_simpan").click(function(){ 
        submitKewangan(2);
  });

  $("#kemaskini").click(function(){ 
        submitKewangan(1);
  });


    //alert('mmmmmmmmmm')
  
  function submitKewangan(type){
    var formData = new FormData();
    
    let txtperkaraid = document.querySelectorAll("[id='hiddenperkaraid']"); 
    let txtsubperkaraid = document.querySelectorAll("[id='hiddensubperkaraid']");
    let txtperkara = document.querySelectorAll(".perkara_text");  
    let txtunitid = document.querySelectorAll(".subperkara_unit"); 
    let txtsubperkara_kelusan_quantity = document.querySelectorAll(".subperkara_kelusan_quantity"); //console.log(txtsubperkara_kelusan_quantity);
    let txtsubperkara_kelusan_kadar = document.querySelectorAll(".subperkara_kelusan_kadar");
    let txtsubperkara_kelusan_jumlah = document.querySelectorAll(".subperkara_kelusan_jumlah");
    let txtsubperkara_terda_quantity = document.querySelectorAll(".subperkara_terda_quantity");
    let txtsubperkara_terda_jumlah = document.querySelectorAll(".subperkara_terda_jumlah");
    let txtsubperkara_semasa_quantity = document.querySelectorAll(".subperkara_semasa_quantity");
    let txtsubperkara_semasa_jumlah = document.querySelectorAll(".subperkara_semasa_jumlah");
    let txtsubperkara_kumulatif_quantity = document.querySelectorAll(".subperkara_kumulatif_quantity");
    let txtsubperkara_kumulatif_jumlah = document.querySelectorAll(".subperkara_kumulatif_jumlah");
    let txtsubperkara_baki_jumlah = document.querySelectorAll(".subperkara_baki_jumlah");

    let txt_perkaraid = document.querySelectorAll("[id='hidden_perkara_id']");
    let txt_subperkaraid = document.querySelectorAll("[id='hidden_subperkara_id']");  
    let txt_subperkara_txt = document.querySelectorAll("[id='sup_perkara_sub_text']");
    let txt_unitid = document.querySelectorAll(".super_unit"); 
    let txt_subperkara_kelusan_quantity = document.querySelectorAll(".super_kelusan_quantity");
    let txt_subperkara_kelusan_kadar = document.querySelectorAll(".super_kelusan_kadar");
    let txt_subperkara_kelusan_jumlah = document.querySelectorAll(".super_kelusan_jumlah");
    let txt_subperkara_terda_quantity = document.querySelectorAll(".super_terda_quantity");
    let txt_subperkara_terda_jumlah = document.querySelectorAll(".super_jumlah");
    let txt_subperkara_semasa_quantity = document.querySelectorAll(".super_semasa_quantity");

    let txt_subperkara_semasa_jumlah = document.querySelectorAll(".super_semasa_jumlah");
    let txt_subperkara_kumulatif_quantity = document.querySelectorAll(".super_kumulatif_quantity");
    let txt_subperkara_kumulatif_jumlah = document.querySelectorAll(".super_kumulatif_jumlah");
    let txt_subperkara_baki_jumlah = document.querySelectorAll(".super_baki_jumlah");
    


    perkaratext = []  
  for (var i = 0;i < txtsubperkara_kelusan_kadar.length; i++) {                         
      data= {};

      data.unit=txtunitid[i].value;

      if(isNaN(removecomma(txtsubperkara_kelusan_quantity[i].value))){
        data.kelulusan_quantity = 0;
      }
      else{
        data.kelulusan_quantity = removecomma(txtsubperkara_kelusan_quantity[i].value);
      }

      if(isNaN(removecomma(txtsubperkara_kelusan_kadar[i].value))){
        data.kelulusan_kadar = 0;
      }
      else{
        data.kelulusan_kadar = removecomma(txtsubperkara_kelusan_kadar[i].value);
      }

      if(isNaN(removecomma(txtsubperkara_kelusan_jumlah[i].value))){
        data.kelulusan_jumlah = 0;
      }
      else{
        data.kelulusan_jumlah = removecomma(txtsubperkara_kelusan_jumlah[i].value)
      }

      if(isNaN(removecomma(txtsubperkara_terda_quantity[i].value))){
        data.terdah_quantity = 0;
      }
      else{
        data.terdah_quantity = removecomma(txtsubperkara_terda_quantity[i].value)
      }

      if(isNaN(removecomma(txtsubperkara_terda_jumlah[i].value))){
        data.terdah_jumlah = 0;
      }
      else{
        data.terdah_jumlah = removecomma(txtsubperkara_terda_jumlah[i].value)
      }

      if(isNaN(removecomma(txtsubperkara_semasa_quantity[i].value))){
        data.semasa_quantity = 0;
      }
      else{
        data.semasa_quantity = removecomma(txtsubperkara_semasa_quantity[i].value)
      }

      if(isNaN(removecomma(txtsubperkara_semasa_jumlah[i].value))){
        data.semasa_jumlah = 0;
      }
      else{
        data.semasa_jumlah = removecomma(txtsubperkara_semasa_jumlah[i].value)
      }
      
      if(isNaN(removecomma(txtsubperkara_kumulatif_quantity[i].value))){
        data.kumulatif_quantity = 0;
      }
      else{
        data.kumulatif_quantity = removecomma(txtsubperkara_kumulatif_quantity[i].value)
      }
      
      if(isNaN(removecomma(txtsubperkara_kumulatif_jumlah[i].value))){
        data.kumulatif_jumlah = 0;
      }
      else{
        data.kumulatif_jumlah = removecomma(txtsubperkara_kumulatif_jumlah[i].value)
      }
      
      if(isNaN(removecomma(txtsubperkara_baki_jumlah[i].value))){
        data.baki = 0;
      }
      else{
        data.baki = removecomma(txtsubperkara_baki_jumlah[i].value)
      }
      
      //data.jumlahkos = removecomma(alljumlahkos[i].value);
      data.sub_perkara = txtperkara[i].value
      data.id = txtsubperkaraid[i].value
      data.perkara_id = txtperkaraid[i].value
      perkaratext.push(JSON.stringify(data))
  }

  sub_perkaratext = []  
  for (var i = 0;i < txt_subperkara_kelusan_kadar.length; i++) {                         
      data= {};

      data.unit=txt_unitid[i].value;

      if(isNaN(removecomma(txt_subperkara_kelusan_quantity[i].value))){
        data.kelulusan_quantity = 0;
      }
      else{
        data.kelulusan_quantity = removecomma(txt_subperkara_kelusan_quantity[i].value);
      }

      if(isNaN(removecomma(txt_subperkara_kelusan_kadar[i].value))){
        data.kelulusan_kadar = 0;
      }
      else{
        data.kelulusan_kadar = removecomma(txt_subperkara_kelusan_kadar[i].value);
      }

      if(isNaN(removecomma(txt_subperkara_kelusan_jumlah[i].value))){
        data.kelulusan_jumlah = 0;
      }
      else{
        data.kelulusan_jumlah = removecomma(txt_subperkara_kelusan_jumlah[i].value)
      }

      if(isNaN(removecomma(txt_subperkara_terda_quantity[i].value))){
        data.terdah_quantity = 0;
      }
      else{
        data.terdah_quantity = removecomma(txt_subperkara_terda_quantity[i].value)
      }

      if(isNaN(removecomma(txt_subperkara_terda_jumlah[i].value))){
        data.terdah_jumlah = 0;
      }
      else{
        data.terdah_jumlah = removecomma(txt_subperkara_terda_jumlah[i].value)
      }

      if(isNaN(removecomma(txt_subperkara_semasa_quantity[i].value))){
        data.semasa_quantity = 0;
      }
      else{
        data.semasa_quantity = removecomma(txt_subperkara_semasa_quantity[i].value)
      }

      if(isNaN(removecomma(txt_subperkara_semasa_jumlah[i].value))){
        data.semasa_jumlah = 0;
      }
      else{
        data.semasa_jumlah = removecomma(txt_subperkara_semasa_jumlah[i].value)
      }
      
      if(isNaN(removecomma(txt_subperkara_kumulatif_quantity[i].value))){
        data.kumulatif_quantity = 0;
      }
      else{
        data.kumulatif_quantity = removecomma(txt_subperkara_kumulatif_quantity[i].value)
      }
      
      if(isNaN(removecomma(txt_subperkara_kumulatif_jumlah[i].value))){
        data.kumulatif_jumlah = 0;
      }
      else{
        data.kumulatif_jumlah = removecomma(txt_subperkara_kumulatif_jumlah[i].value)
      }
      
      if(isNaN(removecomma(txt_subperkara_baki_jumlah[i].value))){
        data.baki = 0;
      }
      else{
        data.baki = removecomma(txt_subperkara_baki_jumlah[i].value)
      }
      
      //data.jumlahkos = removecomma(alljumlahkos[i].value);
      data.perkara_id = txt_perkaraid[i].value
      data.id = txt_subperkaraid[i].value
      data.sub_subname = txt_subperkara_txt[i].value


      sub_perkaratext.push(JSON.stringify(data))
  }

  
    perkaratext.forEach((item) => {
      formData.append('perkaratext[]', item);
    });

    sub_perkaratext.forEach((item) => {
      formData.append('sub_perkaratext[]', item);
    });

    formData.append('project_id', {{$project_id}})
    formData.append('perolehan',{{$perolehan_id}});


    var bayaran = document.getElementById("no_bayaran").value;
    var semasa_tot = document.getElementById('semasa_tot').innerHTML; //alert(semasa_tot)

    formData.append('user_id', {{Auth::user()->id}})
    var bayaran_data = localStorage.getItem('bayaran_count'); 
    formData.append('no_bayaran', bayaran_data)
    formData.append('semasa_tot', removecomma(semasa_tot))
    formData.append('action',"Kemaskini Inbuhan balik");




    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");


    const api_token = "Bearer "+ window.localStorage.getItem('token');
    const api_url = "{{env('API_URL')}}"; 
    axios.defaults.headers.common["Authorization"] = api_token;

      axios({

        method: 'POST',
        url: api_url+"api/perunding/update_peraku",
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
            $("#add_role_sucess_modal").modal('show')
            $("#tutup").click(function(){
              location.reload();                    
          
              //window.location.href = "/kewangan/yuran-perunding/"+{{$project_id}}+"/"+{{$perolehan_id}}
            })
        }

          $("div.spanner").removeClass("show");
          $("div.overlay").removeClass("show");

      })
      .catch(function (error) {
          $("div.spanner").removeClass("show");
          $("div.overlay").removeClass("show");
      })
        //---------------------------------------------------------------------------------
}


  function loadPerkara(perkara_data){

    $.each(perkara_data, function (key, item) { //console.log(item); 

      let data = 
        ` <tr class="row m-0 mainrow" >
            <td class="col-md-12 col-xs-12 d-flex ">
                <div class="col-1 mainNumbering" id="mainNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important; width:10%;">
                </div>
                <div class="p-2 align-items-center" style="width:72%;">
                    <input
                    type="text" id="perkara_text"
                    class="py-2 col-md-11 col-xs-12 form-control"
                    value="`+item['perkara']+`" 
                    />
                </div>
                <button type="button" data-title="Tambah sub skop"  class="ml-2 addsubrow" onclick="addSubRow(this)">
                  <i class="ri-add-box-line ri-xl"></i>
                </button>
                <button type="button" data-title="Buang skop" style="margin-left: 1.2rem;" onclick="removeSubRow(this)">
                      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
            </td>
          </tr>
          `;   
        $('#skopBody').append(data);


        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
        let all_main = document.querySelectorAll("[id^='perkara_text']");
        
        all_main_indexing.forEach((num, i) => {
          num.innerHTML = i + 1
        })
        all_main.forEach((num, i) => {
          abc = i + 1;
          num.setAttribute("data-value" , abc)
        })

        let main_perkara_text = document.querySelectorAll("[id^='perkara_text']"); //console.log(main_perkara_text.length);


        var table_count = document.getElementById("skop").rows.length; 
        loadSubPerkara(item['subperkara'],table_count-2,main_perkara_text.length);


    });
  }

  function  loadSubPerkara(perkara_data,maincount,mainRowNo) {
      $.each(perkara_data, function (key, item) { 

        let html = 
          ` <tr class="row m-0 subrow mainrow`+mainRowNo +`"  value="`+mainRowNo+`">
              <td class="col-md-12 col-xs-12 d-flex">
                  <div class="skopStyle subNumbering_`+mainRowNo+` " id="subNumbering" style="margin-left: 5%;font-size: 12px;">
                  </div>
                  <div class="p-2 align-items-center" style="width:75%;margin-left:5%;">
                      <input
                      type="text" id="perkara_sub_text"
                      class="py-2 col-md-10 col-xs-12 form-control sub_perkara_`+mainRowNo+`""
                      value="`+item['sub_perkara']+`" 
                      />
                  </div>
                  <button type="button" data-title="Buang skop"  class="subminusbutton" style="margin-left: 1.2rem;" onclick="minusSubPerkaraRow(this)">
                      <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                  </button>
              </td>
            </tr>
            `;
          $('#skop > tbody > tr').eq(maincount-1).after(html);
          let subbumid = ".subNumbering_" + mainRowNo
          let all_sub_indexing = document.querySelectorAll(subbumid);

          all_sub_indexing.forEach((subnum, i) => {
            subnum.innerHTML = (mainRowNo) + "." +  (i + 1)  
          })
          

      });
  }

  function disableTerdhahulu(type){
    var form = document.querySelectorAll("[id='terda_quantity']");
    var form1 = document.querySelectorAll("[id='kelusan_quantity']");
    var form2 = document.querySelectorAll("[id='kelusan_kadar']");
    var form3 = document.querySelectorAll("[id='sub_peraku_select']");

    if(type == 1)
    {
      for (var i = 0, len = form.length; i < len; ++i) {
        form[i].disabled = true;
      }
    }
    else
    {
      for (var i = 0, len = form.length; i < len; ++i) {
        form[i].disabled = true;
      } 
      for (var i = 0, len = form1.length; i < len; ++i) {
        form1[i].disabled = true;
      } 
      for (var i = 0, len = form2.length; i < len; ++i) {
        form2[i].disabled = true;
      }
      for (var i = 0, len = form3.length; i < len; ++i) {
        form3[i].disabled = true;
      }  
    }
  }

            function loadBayaranHistory(response)
            { //console.log(response)
                var jps_table =$('#rekod_bayaran_table').DataTable({     
                        data: response.data.data,
                        dom: "Blfrtip",
                        "aaSorting": [],
                        "language": {
                                            "lengthMenu": "Papar _MENU_ Entri",
                                            "zeroRecords": "Tiada rekod dijumpai",
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
                                render: function ( data, type, row, meta ) { //console.log(row)
                                    if(type === 'display'){
                                        data='<div class="d-flex">'+  row.id + '</div>';
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:1, // Start with the last
                                render: function ( data, type, row, meta ) {
                                        if(type === 'display')
                                        {
                                            data = '';
                                            if(row.tarikh!==null)
                                            {
                                                data=row.tarikh 
                                            }
                                        }
                                        return data;
                                }
                            },
                            {
                                targets:2, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.name!==null)
                                            {
                                                data=row.nama 
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:3, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.bahagian_kod!==null)
                                            {
                                                data= row.bahagian_kod 
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:4, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.tindakan!==null)
                                            {
                                                data=row.tindakan
                                            }
                                        }
                                    return data;
                                    }
                            }
                        ] , 
                        columns: [
                            
                            { data: 'id', "sortable": true},
                            { data: 'tarikh', "sortable": true  }, 
                            { data: 'nama', "sortable": true},
                            { data: 'bahagian_kod' ,  "sortable": true },
                            { data: 'tindakan', "sortable": true  },
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

    $('#tutup_pop').on('click', function(){
        $("#exampleModal3").modal('hide');
        $('.modal-backdrop').hide();
    });
    
</script>