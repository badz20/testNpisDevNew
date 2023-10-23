
<script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
<link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>
<!-- <script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script> -->
<script src="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
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
  })
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


  var skop_project = {};
  var sub_skop_project = {};
  var rolling_plan = {};
  var skop_count = 0;
  var total_skop_cost = 0
  
  const api_url = "{{ env('API_URL') }}"
  const api_token = "Bearer "+ window.localStorage.getItem('token');
  $(".radio_Kelulusan_yes").click(function(){
    $(".nota_tambahan").removeClass('d-none');
    document.getElementById('kelulus_khas').required = true;

  })
  $(".radio_Kelulusan_no").click(function(){
    $(".nota_tambahan").addClass('d-none');
    document.getElementById('kelulus_khas').required = false;
  })
  $(".radio_Kelulusan_na").click(function(){
    $(".nota_tambahan").addClass('d-none');
    document.getElementById('kelulus_khas').required = false;
  })


  $(".kaijan_yes").click(function(){
    $(".kaijan-col").removeClass('d-none');
  })
  $(".kaijan_no").click(function(){
    $(".kaijan-col").addClass('d-none');
    $('div#kajian_details').remove();
  })
  $(".kaijan_na").click(function(){
    $(".kaijan-col").addClass('d-none');
    $('div#kajian_details').remove();
  })

  $(".add_kajian").click(function(){
        console.log('kajian clicked')
        // $("#tahun_terkini").datepicker({
        //   format: "yyyy",
        //   viewMode: "years", 
        //   minViewMode: "years"
        // });
        
        kajian_template = `
        <div id="kajian_details" class="impak-content">
        
        <div class="mt-2 p-0 col-12">
          <div class="form-group col-md-5 col-xs-12 d p-0 mt-3">
              <label for="Jenis Kajilan" class="w-100">Jenis Kajian</label>
              <div class="d-flex ">
                <select name="jenis_kajian_options"
                        id="jenis_kajian_options"
                        class="form-control mt-2 Jenis_Kajilan" required>
                    <option value="">--Pilih--</option>
                    <!-- <option value="1">
                        Integrated River Basin Management (IRBM)
                    </option>
                    <option value="2">
                        National Coastal Erosion Study (NCES)
                    </option>
                    <option value="3">Lain-lain</option> -->
                </select>  
                <button type="button" id="kajian_button" class="p-2" style="background-color: transparent;border: none; padding: 0;">
                  <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                </button>  
              </div>            
          </div>
        </div>  
        <div id="inline" class="form-group row col-12 p-0" >
          
          <div class="Jenis_Kajilan_input input_container terkini d-none col-md-6 col-xs-12 p-0" id="div_laporan">
            <div class="input_content row col-12">
                <label for="Jenis Kajilan" class="col-12">
                      Nyatakan Nama Laporan Kajian :
                </label>
                <div class="form-group col-12">
                  <input type="text"
                        class="form-control"
                        name="nama_laporan_kajian"
                        id="nama_laporan_kajian"
                        value="" />                        
                </div>
            </div>
          </div>

          <!-------------------------------- Tahun siap starts ------------------------------->
          <div class="input_container terkini d-none col-md-6 col-xs-12 p-0" id="div_terkini">
            <div class="input_content row col-12">
                <label for="Terkini" class="col-12 ">Tahun Siap Terkini <sup>*</sup></label>
                <div class="form-group date col-12">
                    <input type="text"
                            class="form-control"
                            name="tahun_terkini"
                            id="tahun_terkini"
                            minlength="4" maxlength="4"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            value="" />                        
                </div>
            </div>
          </div>
          <!-------------------------------- Kategori Hakisan starts ------------------------------->
          <div class="input_container kategor_hakisan d-none col-md-6 col-xs-12 p-0" id="div_hakisan">
            <div class="input_content row col-12">
                <label for="Kategor_Hakisan" class="col-12">
                    Kategori Hakisan <sup>*</sup>
                </label>
                <div class="form-group col-12">
                    <select name="kategori_hakisan_options"
                            id="kategori_hakisan_options"
                            class="form-control">
                        <option value="">--Pilih--</option>
                        <!-- <option value="">Kategori 1-Critical</option>
                        <option value="">Kategori 2- Significant</option>
                        <option value="">Kategori 3-Acceptable</option> -->
                    </select>                
                </div>
            </div>
          </div>
          </div>
        </div>
        `
        $('#kajian_content').append(kajian_template);  
        let all_jenis_kajian = document.querySelectorAll(
            "[id^='jenis_kajian_options']"
        );
        

        let all_tahun_terkini = document.querySelectorAll(
            "[id^='tahun_terkini']"
        );

        let all_laporan = document.querySelectorAll(
            "[id^='nama_laporan_kajian']"
        );

        let all_kategori_hakisan = document.querySelectorAll(
            "[id^='kategori_hakisan_options']"
        );

        let all_div_laporan = document.querySelectorAll(
            "[id^='div_laporan']"
        );
        let all_div_terkini = document.querySelectorAll(
            "[id^='div_terkini']"
        );
        let all_div_hakisan = document.querySelectorAll(
            "[id^='div_hakisan']"
        );
        let all_kajian_button = document.querySelectorAll(
                    "[id^='kajian_button']"                    
                ); 

        let all_kajian_div = document.querySelectorAll(
                "[id^='kajian_details']"                    
            ); 
            all_kajian_button.forEach((tb, i) => {                    
            tb.addEventListener("click", () => {
              all_kajian_div[i].remove();                        
            });
        });

        all_jenis_kajian.forEach((tc, i) => {

          // var kategoriHakisan =  document.getElementById("kategori_hakisan_options");
          //   $.each(data.kategory_hakisan, function (key, item) {
					// var el = document.createElement("option");
					// el.textContent =  item.value;
					// el.value =  item.code;
					// kategoriHakisan.appendChild(el);
          //       })
                
            var jenisKajian =  all_jenis_kajian[i]
            console.log(jenisKajian)
            if(jenisKajian.options.length < 2){
              $.each(jenis_kajian_options, function (key, item) {
                    var el = document.createElement("option");
                    el.textContent =  item.value;
                    el.value =  item.code;
                    jenisKajian.appendChild(el);
              })
            }
            var kategoriHakisan =  all_kategori_hakisan[i]
            
            console.log(kategoriHakisan)
            if(kategoriHakisan.options.length < 2){
              $.each(hakisan_options, function (key, item) {
                    var el = document.createElement("option");
                    el.textContent =  item.value;
                    el.value =  item.code;
                    kategoriHakisan.appendChild(el);
              })
            }
            
            
            tc.addEventListener("change", function(evt)  {              
                    var input=$(this).val();      
                    if(input=='3'){
                      all_div_laporan[i].classList.remove('d-none');
                      all_div_terkini[i].classList.remove('d-none');
                      all_div_hakisan[i].classList.add('d-none'); 
                    }
                    else if(input=='1'){
                      all_div_laporan[i].classList.remove('d-none');
                      all_div_terkini[i].classList.remove('d-none');
                      all_div_hakisan[i].classList.add('d-none');                      
                    }
                    else if(input=='2'){
                      all_div_laporan[i].classList.remove('d-none');
                      all_div_hakisan[i].classList.add('d-none'); 
                      all_div_terkini[i].classList.remove('d-none');                     
                    }
                    else{
                      all_div_laporan[i].classList.add('d-none');
                      all_div_terkini[i].classList.add('d-none');
                      all_div_hakisan[i].classList.add('d-none');                      
                    }                                
            });
        }); 
        // let pop_content_all = document.querySelectorAll(".pop_content");
        // let pop_btn_all = document.querySelectorAll(".pop_btn");
        // if (pop_btn_all) {
        //   pop_btn_all.forEach((pba, i) => {
        //     pba.addEventListener("click", (e) => {
        //       e.preventDefault();
        //       pop_content_all[i].classList.toggle("d-none");
        //     });
        //   });
        // }
  })
  
  $(".adakah_pelaksanaan_yes").click(function(){
    $(".adakah_pelaksanaan_data").removeClass('d-none');
    document.getElementById('pelaksanaan_description').required = true;
    document.getElementById('status_options').required = true;
    document.getElementById('pelaksanaan_tahun_siap').required = true;
    
  })
  $(".adakah_pelaksanaan_no").click(function(){
    $(".adakah_pelaksanaan_data").addClass('d-none');
    document.getElementById('pelaksanaan_description').required = false;
    document.getElementById('status_options').required = false;
    document.getElementById('pelaksanaan_tahun_siap').required = false;
  })
  $(".adakah_pelaksanaan_na").click(function(){
    $(".adakah_pelaksanaan_data").addClass('d-none');
    document.getElementById('pelaksanaan_description').required = false;
    document.getElementById('status_options').required = false;
    document.getElementById('pelaksanaan_tahun_siap').required = false;
  })

  $(".rujukan_pelan_yes").click(function(){
    $(".rujukan_pelan_data").removeClass('d-none');
    document.getElementById('kajian_kemungkinan_options').required = true;
    document.getElementById('nama_laporan_pelan_induk').required = true;
    document.getElementById('tahun_siap_pelan_induk').required = true;    
  })
  $(".rujukan_pelan_no").click(function(){
    $(".rujukan_pelan_data").addClass('d-none');
    document.getElementById('kajian_kemungkinan_options').required = false;
    document.getElementById('nama_laporan_pelan_induk').required = false;
    document.getElementById('tahun_siap_pelan_induk').required = false;
  })
  $(".rujukan_pelan_na").click(function(){
    $(".rujukan_pelan_data").addClass('d-none');
    document.getElementById('kajian_kemungkinan_options').required = false;
    document.getElementById('nama_laporan_pelan_induk').required = false;
    document.getElementById('tahun_siap_pelan_induk').required = false;
  })
  

  $(".Jenis_Kajilan").on('change', function(){ 
      var input=$(this).val();      
      if(input=='3'){
        $(".Jenis_Kajilan_input").removeClass('d-none');
        $(".terkini").addClass('d-none');
        $(".kategor_hakisan").addClass('d-none');
      }
      else if(input=='1'){
        $(".terkini").removeClass('d-none');
        $(".Jenis_Kajilan_input").addClass('d-none');
        $(".kategor_hakisan").addClass('d-none');
      }
      else if(input=='2'){
        $(".terkini").removeClass('d-none');
        $(".kategor_hakisan").removeClass('d-none');
      }
      else{
        $(".Jenis_Kajilan_input").addClass('d-none');
        $(".terkini").addClass('d-none');
        $(".kategor_hakisan").addClass('d-none');
      }
  })

  $("input[type='radio']#radio_Status_siap").click(function(){
    var selected_val = $("input[type='radio']#radio_Status_siap:checked").val();
    if(selected_val==1){
      $(".reka_bentuk_siap").removeClass("d-none")
      $("#reka_bentuk_siap").keyup(function(){
        var reka_bantuk_siap=$(this).val();
      })
    }
    else if(selected_val==2){
      $(".reka_bentuk_siap").addClass("d-none")
        var reka_bantuk_siap=$(this).val(2);
    }
    else if(selected_val==0){
      $(".reka_bentuk_siap").addClass("d-none")
        var reka_bantuk_siap=$(this).val(0);

    }
  })


  $(".rolling_plan_options").on('change', function(){ 
      var input=$(this).val();            
      $("#RMK").val(rolling_plan[input].rmk)
  })

  // $('#btnget').click(function() {
  //   alert($('#bahagian_terlibat').val());
  // });

  $(".jenis_kategori_options").on('change', function(){ 
    var input=$(this).val();   
    let temp = document.getElementById("jenis_kategori_options")
    console.log( temp.options[temp.selectedIndex].text);
    
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/jenis_sub_kategori/" + input,
            responseType: 'json',            
        })
        .then(function (response) { 
          data = response.data.data;
          var subJenisDropDown =  document.getElementById("jenis_sub_kategori_options");
          var i, L = subJenisDropDown.options.length - 1;
          for(i = L; i >= 0; i--) {
            subJenisDropDown.remove(i);
          }
            $.each(data, function (key, item) {
                var el = document.createElement("option");
                el.textContent = item.name;
                el.value = item.id;
                subJenisDropDown.appendChild(el);
            })
        })
  })

  function pemilikChange(sel)
  {
    
     //alert(sel.value);
     //console.log($("bahagian_terlibat").multiselect('load')); 
    console.log('pemilik');
     var x = document.getElementById('bahagian_terlibat');
     
      var i;
      options = []
      var select = document.getElementById('bahagian_terlibat');
      var selected = [...select.selectedOptions].map(option => option.text);
      var selectedvalue=[...select.selectedOptions]
                      .map(option => option.value);
      for (i = 0; i < x.options.length; i++) {

        data = {}
        data.name = x.options[i].innerHTML
        data.value = x.options[i].value
        data.disabled = false
        if(selectedvalue.includes(x.options[i].value)) {
          data.checked = true;
        } else {
          data.checked = false;
        }

        if(x.options[i].value == sel.value) {
          data.checked = false;
          data.disabled = true
        }

        
        if(x.options[i].value == sel.value) {
          $(`#bahagian_terlibat option[value="`+sel.value+`"]`).prop('selected', false);
        }
        options.push(data)
      }
      console.log(options);
      $("#bahagian_terlibat").multiselect('loadOptions', options);
      $("#bahagian_terlibat").multiselect('load');
      //$("#bahagian_terlibat").multiselect('reload');
      bahagian_terlibat_div()
  }


  $(".bahagianepu_options").on('change', function(){ 
    var input=$(this).val();    
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/sektor_utama/" + input,
            responseType: 'json',            
        })
        .then(function (response) { 
          data = response.data.data; 
          console.log(data);         
          var sektorUtama =  document.getElementById("sektor_utama_options");

            $.each(data, function (key, item) {
                var el = document.createElement("option");
                el.textContent = item.name;
                el.value = item.id;
                sektorUtama.appendChild(el);
            })
        })
  })

  $(".sektor_utama").on('change', function(){ 
    var input=$(this).val();    
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/sektor/" + input,
            responseType: 'json',            
        })
        .then(function (response) { 
          data = response.data.data;          
          var sektor =  document.getElementById("sektor_options");

            $.each(data, function (key, item) {
                var el = document.createElement("option");
                el.textContent = item.name;
                el.value = item.id;
                sektor.appendChild(el);
            })
        })
  })

  $(".sektor_options").on('change', function(){ 
    var input=$(this).val();    
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/sektor_sub/" + input,
            responseType: 'json',            
        })
        .then(function (response) { 
          data = response.data.data;          
          var subSektor =  document.getElementById("sub_sektor_options");

            $.each(data, function (key, item) {
                var el = document.createElement("option");
                el.textContent = item.name;
                el.value = item.id;
                subSektor.appendChild(el);
            })
        })
  })

//---------------------------------------------------------------------------


function formValidation(formData)
{  
    var validation_result = true;
    validation_message = 'Sila lengkapkan bahagian ini'
    for (var pair of formData.entries()) {        
        let inpObj = document.getElementById(pair[0])
        //console.log(pair[0])
        if(!pair[0].includes("radio") && pair[0] != 'Bahagian_Terlibat[]' && 
        pair[0] != 'jenis_kajian_options' && 
        pair[0] != 'bahagian_terlibat_checkbox' && 
        pair[0] != 'bahagian_terliabt_all' &&         
        pair[0] != 'tahun_terkini' && pair[0] != 'nama_laporan_kajian' && pair[0] != 'kategori_hakisan_options'){
          if (!inpObj.checkValidity()) {
            if(validation_result){
              inpObj.focus()
            }
            validation_result = false
            error_element = pair[0] + "_error"
            document.getElementById(error_element).innerHTML = validation_message;
            
            inpObj.style.borderColor = 'red';
          } else {            
            error_element = "'#" + pair[0] + "_error'"            
            // console.log(error_element)
            // $(error_element).remove()

            if(pair[0] != 'bahagian_terlibat' &&
               pair[0] != 'jenis_kajian_options' && 
               pair[0] != 'tahun_terkini' &&
               pair[0] != 'bahagian_terlibat_checkbox' && 
               pair[0] != 'bahagian_terliabt_all' && 
               pair[0] != 'nama_laporan_kajian' &&
               pair[0] != 'kategori_hakisan_options' &&
               pair[0] != 'RMK'

            ){
              error_element = pair[0] + "_error"
              console.log(document.getElementById(error_element));
              document.getElementById(error_element).innerHTML = ""
              inpObj.style.borderColor = 'black';
            }
          }
        }
        
        
    }

    var requiredObj = document.getElementById("objektif");
    var divContent = requiredObj.textContent.trim();
    if (divContent.length == 0) {
      document.getElementById("objektif_error").style.color = 'red'
        document.getElementById("objektif_error").innerHTML = 'Sila lengkapkan bahagian ini'
        requiredObj.focus();
      return false;
    }

    var requiredRingkasan = document.getElementById("ringkasan_latar");
    var divContent = requiredRingkasan.textContent.trim();
    if (divContent.length == 0) {
      document.getElementById("ringkasan_latar_error").style.color = 'red'
        document.getElementById("ringkasan_latar_error").innerHTML = 'Sila lengkapkan bahagian ini'
        requiredRingkasan.focus();
      return false;
    }

    var requiredRasional = document.getElementById("rasional_keperluan");
    var divContent = requiredRasional.textContent.trim();
    if (divContent.length == 0) {
      document.getElementById("rasional_keperluan_error").style.color = 'red'
        document.getElementById("rasional_keperluan_error").innerHTML = 'Sila lengkapkan bahagian ini'
        requiredRasional.focus();
      return false;
    }

    var requiredFaedah = document.getElementById("faedah");
    var divContent = requiredFaedah.textContent.trim();
    if (divContent.length == 0) {
      document.getElementById("faedah_error").style.color = 'red'
        document.getElementById("faedah_error").innerHTML = 'Sila lengkapkan bahagian ini'
        requiredFaedah.focus();
      return false;
    }
  
    return validation_result;  
}

$("#brifProjectSubmit").click(function(event){
  $("div.spanner").addClass("show");
  $("div.overlay").addClass("show");  
  terlibat_validation = false
  if($('#bahagian_terlibat_checkbox').val() == 'false') {
    var bah_terlibat = $('#bahagian_terlibat').val()
      if(bah_terlibat.length == 0) {
        terlibat_validation = true;
        document.getElementById("bahagian_terlibat").style.color = 'red'
        document.getElementById("bahagian_terlibat_error_error").innerHTML = 'Sila lengkapkan bahagian ini'
        document.getElementById("bahagian_terlibat_error_error").focus();
        
      }
  }

  

  var objektif=$("#objektif").html(); 
  var ringkasan_latar=$("#ringkasan_latar").html();
  var rasional_keperluan=$("#rasional_keperluan").html();
  var faedah=$("#faedah").html();
  var kelulus_khas=$("#kelulus_khas").html();
  var implikasi_projeck=$("#implikasi_projeck").html()

  var jenis_kategory_element = document.getElementById("jenis_kategori_options")
  var jenis_kategory_text = jenis_kategory_element.options[jenis_kategory_element.selectedIndex].text
  
  
  document.getElementById("error_skop_main_project").innerHTML = ''
  document.getElementById("error_skop_project").innerHTML = "";
  let all_main_skop_select = document.querySelectorAll("[id^='skop_select']");
  let skop_valiation = false;
  let skop_details = []
  let need_main_works = false;
  let contain_main_works = false;
  let skop_main_valiation = false;
  let unique_skop_valiation = false;
  let unique_sub_skop_valiation = false;

  let unique_skop = []
  let unique_sub_skop = []

  all_main_skop_select.forEach((skop_select, i) => {
    
    console.log(skop_select.value)
    data = []
    if(skop_select.value == skop_main_code) {
      contain_main_works = true;
    }

    if(skop_select.value == skop_prelimiarie_condition_code ) {
      need_main_works = true;
    }
    data['skop_value'] = skop_select.value

    if(unique_skop.includes(skop_select.value)){
        unique_skop_valiation = true
    } else {
        unique_skop.push(skop_select.value)
    }
    let subIndex = skop_select.getAttribute("data-value")
    let subclass = ".sub_skop_select_" + subIndex
    let all_sub_skop_select = document.querySelectorAll(subclass);
    let subclasstd = ".otherstd" + subIndex
    let all_others_td = document.querySelectorAll(subclasstd);
    //let all_others_td = document.querySelectorAll("[id^='others_td']")
    sub_data = []
    others_data = []
    all_sub_skop_select.forEach((sub_skop_select, i) => {
      sub_data.push(sub_skop_select.value)
      let lain_lain_input = all_others_td[i].querySelectorAll("[id^='skop_lain_lain']")
      //console.log(lain_lain_input[0].value)
      if(lain_lain_input[0].value != ""){
        others_data.push(lain_lain_input[0].value)
      }else {
        others_data.push(0)
      }
      
      if(skop_condition_code == skop_select.value && sub_skop_select.value == sub_skop_condition_code) {
        need_main_works = true;
      }
      if(unique_sub_skop.includes(sub_skop_select.value)){
          unique_sub_skop_valiation = true
      } else {
          unique_sub_skop.push(sub_skop_select.value)
      }
    })
    data['sub_skop_value'] = sub_data.toString();
    if(sub_data.toString() == ""){
      skop_valiation = true;
    }
    skop_details.push(`{"skop_value" : "` +skop_select.value+ `", "sub_skop_value" : "`+sub_data.toString()+ `","others" : "`+ others_data.join('#&')+`" }`)
  })

  console.log(skop_details)
  

  if(skop_details.length == 0)
  {
    skop_valiation = true;
  }

  if(jenis_kategory_text == 'Fizikal - Pembinaan') {
    need_main_works = true;
  }

  if(need_main_works && !contain_main_works) {
      skop_main_valiation = true;
      document.getElementById("error_skop_main_project").innerHTML = "Sila lengkapkan Main works";
  }

  
  if(skop_valiation) {
    document.getElementById("error_skop_project").innerHTML = "Sekurang-kurangnya satu skop dan satu sub-skop diperlukan";
  }

  if(unique_skop_valiation) {
      document.getElementById("error_skop_project").innerHTML = "nilai skop mestilah unik";
  }

  if(unique_sub_skop_valiation) {
      document.getElementById("error_skop_project").innerHTML = "nilai sub skop mestilah unik";
  }
  // console.log(objektif)
  var formEl = document.forms.brifProjectForm;
  var formData = new FormData(formEl);
  var kajian_validation = false
  // console.log(formEl)

  var kajian_details = [];
  
  
    let all_jenis_kajian = document.querySelectorAll(
        "[id^='jenis_kajian_options']"
    );

    let all_tahun_terkini = document.querySelectorAll(
        "[id^='tahun_terkini']"
    );

    let all_laporan = document.querySelectorAll(
        "[id^='nama_laporan_kajian']"
    );

    let all_kategori_hakisan = document.querySelectorAll(
        "[id^='kategori_hakisan_options']"
    );    
    
    let jenis_kajian_validation = false;
    let hakisan_validation = false;
    let tahun_terkini_validation = false;
    
    for (var i = 0;i < all_jenis_kajian.length; i++) {
      all_jenis_kajian[i].style.borderColor = 'black';
      all_kategori_hakisan[i].style.borderColor = 'black';
      all_tahun_terkini[i].style.borderColor = 'black';
      data = []    
      data['jenis_kajian'] = all_jenis_kajian[i].value;
      laporan = ''
      hakisan = ''
      tahun = ''
      if(all_jenis_kajian[i].value == '') {
        jenis_kajian_validation = true
        all_jenis_kajian[i].style.borderColor = 'red';
        all_jenis_kajian[i].focus()
      }

      switch (parseInt(all_jenis_kajian[i].value)) {
        case 1:
          console.log('option one')
          if(all_tahun_terkini[i].value == ''){
            all_tahun_terkini[i].style.borderColor = 'red';
            all_tahun_terkini[i].focus()
            tahun_terkini_validation = true
          }
          break;
        case 2:
          console.log('option 2')
          if(all_tahun_terkini[i].value == ''){
            all_tahun_terkini[i].style.borderColor = 'red';
            all_tahun_terkini[i].focus()
            tahun_terkini_validation = true;
          }
          if(all_kategori_hakisan[i].value == ''){
            all_kategori_hakisan[i].style.borderColor = 'red';
            all_kategori_hakisan[i].focus()
            hakisan_validation = true
          }
          break;
        case 3:
          console.log('option 3')
          if(all_tahun_terkini[i].value == ''){
            all_tahun_terkini[i].style.borderColor = 'red';
            all_tahun_terkini[i].focus()
            tahun_terkini_validation = true;
          }
          break;
        default:
          break;
      }
      if (all_laporan[i].value != ''){
        laporan = '"' + all_laporan[i].value + '"'
      }else {        
        laporan = null
      }

      if (all_kategori_hakisan[i].value != ''){
        hakisan = all_kategori_hakisan[i].value
      }else {
        hakisan = null
      }


      if (all_tahun_terkini[i].value != ''){
        tahun = all_tahun_terkini[i].value
      }else {
        tahun = null
      }
      
      data['laporan'] = all_laporan[i].value;
      data['hakisan'] = all_kategori_hakisan[i].value;
      data['tahun_terkini'] = all_tahun_terkini[i].value;
      
      kajian_details.push('{"jenis_kajian" : ' +all_jenis_kajian[i].value+ ', "laporan" : '+laporan+ ', "hakisan" : '+hakisan+ ', "tahun_terkini" : '+tahun+ '}')
    }  
    
    formData.append('bahagian_terliabt_all', $('#bahagian_terlibat').val())
    formData.append('bahagian_terlibat_checkbox', $('#bahagian_terlibat_checkbox').val())
    
  if(formValidation(formData) && !jenis_kajian_validation && !hakisan_validation && !tahun_terkini_validation && !skop_valiation && !terlibat_validation && !skop_main_valiation  && !unique_sub_skop_valiation && !unique_skop_valiation){
  // if(true)){  
  //   var table = document.getElementById("skopBody");
  // var skop_details = [];
    
  // let all_select = document.querySelectorAll(
  //   ".skop_content_container table tbody tr td div select"
  // );
  // let all_cost = document.querySelectorAll(
  //   ".skop_content_container table tbody tr td div div input"
  // );
  
  // for (var i = 0;i < all_select.length; i++) {
  //   data = []    
  //   data['skop_projeck'] = all_select[i].value;
  //   data['kos'] = all_cost[i].value;
  //   //skop_details.push(data);
    
  //   skop_details.push('{"skop_projeck" : ' +all_select[i].value+ ', "kos" : '+all_cost[i].value+ '}')
  // }
  
  
  let negeri = {{$negeri}}; console.log(negeri)
  let daerah = {{$daerah}}; console.log(daerah)

  formData.append('user_id', {{Auth::user()->id}})
  formData.append('bahagian_terliabt_all', $('#bahagian_terlibat').val())
  formData.append('bahagian_terlibat_checkbox', $('#bahagian_terlibat_checkbox').val())
  formData.append('objektif',objektif)
  formData.append('ringkasan_latar',ringkasan_latar)
  formData.append('rasional_keperluan',rasional_keperluan)
  formData.append('faedah',faedah)
  formData.append('kelulus_khas',kelulus_khas)
  formData.append('negeri_id', negeri)
  formData.append('daerah_id', daerah)
  formData.append('implikasi_projeck', implikasi_projeck)
  formData.append('bahagian_preli_disabled',window.localStorage.getItem('bahagian_pemilik'))

  
  
  

  skop_details.forEach((item) => {
    console.log(JSON.stringify(item))
    formData.append('skop_project_details[]', item);
  });

  kajian_details.forEach((item) => {
    formData.append('kajian_project_details[]', item);
  });

  




  //formData.append('skop_project_details[]', skop_details)
  axios.defaults.headers.common["Authorization"] = api_token
  axios({
        method: 'post',
        url: api_url+"api/project/brif",
        responseType: 'json',
        data: formData
        })
        .then(function (response) { 
            console.log(response)
            if(response.data.code == 200) {   
              $("#add_role_sucess_modal").modal('show');
              $("#tutup_new").click(function(){
                var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                url = url.replace(":id", response.data.data.id)
                url = url.replace(":status", response.data.data.workflow_status)
                url = url.replace(":user_id", response.data.data.dibuat_oleh)
                window.location.href = url
              })
              $("#close_modal").click(function(){
                var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                url = url.replace(":id", response.data.data.id)
                url = url.replace(":status", response.data.data.workflow_status)
                url = url.replace(":user_id", response.data.data.dibuat_oleh)
                window.location.href = url
              })

            }else {
              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
              alert('error while saving project')
            }
             
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
  }else {
    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
  }  
})

// let previousLength = 0;
// function handleInput(event) {
//   previousLength = 0;
//   handleInputs(event);
// }

// const handleInputs = (event) => {
//   const bullet = "\u2022";
//   const newLength = event.target.value.length;
//   const characterCode = event.target.value.substr(-1).charCodeAt(0);
//   // console.log(characterCode);
//   // console.log(bullet);
//   // console.log(newLength);

//   if (newLength > previousLength) {
//     if (characterCode === 10) {
//         // console.log('10')
//       event.target.value = `${event.target.value}${bullet}`;
//     } else if (newLength === 1) {
//       // console.log(`${bullet} ${event.target.value}`)
//       event.target.value = `${bullet} ${event.target.value}`;
//     }
//   }

//   previousLength = newLength;
// };
// -------------------------------------------------text area numbering function------------------------------


let previousLength = 0;
let num =1;
const handleInput = (event) => { 
  const bullet = num
 
  const newLength = event.target.value.length;
  const characterCode = event.target.value.substr(-1).charCodeAt(0);

  if (newLength > previousLength) {
    if (characterCode === 10) {
      num++;
      event.target.value = `${event.target.value}${bullet} `;
    } else if (newLength === 1) {
      num++;
      event.target.value = `${bullet} ${event.target.value}`;
    }
  }
  
  previousLength = newLength;
}
// -------------------------------------------------text area numbering function------------------------------

let previousLength2 = 0;
let num2 =1;
const handleInput2 = (event) => {
  const bullet = num2;
  
  const newLength = event.target.value.length;
  const characterCode = event.target.value.substr(-1).charCodeAt(0);

  if (newLength > previousLength2) {
    if (characterCode === 10) {
      num2++;
      event.target.value = `${event.target.value}${bullet} `;
    } else if (newLength === 1) {
      num2++;
      event.target.value = `${bullet} ${event.target.value}`;
    }
  }
  
  previousLength2 = newLength;
}
// -------------------------------------------------text area numbering function------------------------------

let previousLength3 = 0;
let num3 =1;
const handleInput3 = (event) => {
  const bullet = num3;
  
  const newLength = event.target.value.length;
  const characterCode = event.target.value.substr(-1).charCodeAt(0);

  if (newLength > previousLength3) {
    if (characterCode === 10) {
      num3++;
      event.target.value = `${event.target.value}${bullet} `;
    } else if (newLength === 1) {
      num3++;
      event.target.value = `${bullet} ${event.target.value}`;
    }
  }
  
  previousLength3 = newLength;
}
// -------------------------------------------------text area numbering function------------------------------

let previousLength4 = 0;
let num4 =1;
const handleInput4 = (event) => {
  const bullet = num4;
  
  const newLength = event.target.value.length;
  const characterCode = event.target.value.substr(-1).charCodeAt(0);

  if (newLength > previousLength4) {
    if (characterCode === 10) {
      num4++;
      event.target.value = `${event.target.value}${bullet} `;
    } else if (newLength === 1) {
      num4++;
      event.target.value = `${bullet} ${event.target.value}`;
    }
  }
  
  previousLength4 = newLength;
}

$("#tahun_jangka_siap").change(function(){
  var year_two=$("#tahun_jangka_siap").val();
  var year_one=$("#tahun_jangka_mula").val();
  calculatemonth(year_one,year_two);
})
function calculatemonth(year_two,year_one){
  $diff=year_one-year_two
  // alert($diff)
  if($diff>=0){
    $("#tempoh_pelaksanaan").val(Math.abs(($diff+1)*12)).text(Math.abs(($diff+1)*12))
  }
}

      // jQuery("#Bahagian_Terlibat").multiselect({
      //   // columns: 1,
      //   placeholder: "--Pilihasd--",
      //   numberDisplayed: 1,
      //   nSelectedText: ' - Too many options selected!',
      // });
    </script> 
    <script>
      $('ul > li > input[type="checkbox"]').on("click", function() {
    var parent = $(this).parent("li");
    if($(this).is(":checked") === true) {
    // move to the top
    $(parent).slideUp(50, function() {
      $(parent).prependTo($(parent).parent());
      $(parent).slideDown(50);
    });
    } else {
      $(parent).slideUp(50, function() {
        $(parent).appendTo($(parent).parent());
        $(parent).slideDown(50);
      });
    }
});



var checker = document.getElementById('checkme');
var sendbtn = document.getElementById('sendNewSms');
checker.onchange = function() {
  sendbtn.disabled = !!this.checked;
};

  function check(){
    var disable=$("#bahagian_terlibat_checkbox").is(":checked"); 
      if(disable==true){
        console.log('checked');
        console.log($("#bahagian_terlibat"));
        var elements = document.getElementById("bahagian_terlibat").options;

        for(var i = 0; i < elements.length; i++){
          console.log(elements[i]);
          elements[i].selected = false;
        }
        $("#bahagian_terlibat").multiselect('reload');
        $("#bahagian_terlibat").click();
        //$("#bahagian_terlibat option").removeAttr("selected");
        $("#bahagian_terlibat_checkbox").val(true)
        $(".ms-options-wrap").css('pointer-events','none');
        var pilihBtn=$(".ms-options-wrap").children();
        $(pilihBtn[0]).css("background","#e9ecef" ).css("color","#495057");
        $("#selected_bahagian_terlibat_div").css("display","none")
        $("#bahagian_terlibat_checkbox_div").css("top","-9px")
        $("#select_content_div").css("top","15px")
        $("#bahagian_terlibat_error_error").css("display","none")

      }  
      else{
        $("#bahagian_terlibat_checkbox").val(false)
        $(".ms-options-wrap").css('pointer-events','');
        var pilihBtn=$(".ms-options-wrap").children();
        $(pilihBtn[0]).css("background","white" ).css("color","gray");
        $("#selected_bahagian_terlibat_div").css("display","block")
        $("#bahagian_terlibat_checkbox_div").css("top","-2px")
        $("#select_content_div").css("top","8px")

        var x = document.getElementById('bahagian_terlibat');
                var bahagian_pemilik = document.getElementById('bahagian_pemilik');
                console.log('changed');
                console.log(bahagian_pemilik);
                var i;
                options = []
                var select = document.getElementById('bahagian_terlibat');
                var selected = [...select.selectedOptions].map(option => option.text);
                var selectedvalue=[...select.selectedOptions].map(option => option.value);
                for (i = 0; i < x.options.length; i++) {

                    data = {}
                    data.name = x.options[i].innerHTML
                    data.value = x.options[i].value
                    data.disabled = false
                    if(selectedvalue.includes(x.options[i].value)) {
                    data.checked = true;
                    } else {
                    data.checked = false;
                    }

                    if(x.options[i].value == bahagian_pemilik.value) {
                    data.checked = false;
                    data.disabled = true
                    }

                    
                    if(x.options[i].value == bahagian_pemilik.value) {
                    $(`#bahagian_terlibat option[value="`+bahagian_pemilik.value+`"]`).prop('selected', false);
                    }
                    options.push(data)
                }
                console.log("prelimk")
                console.log(options);
                $("#bahagian_terlibat").multiselect('loadOptions', options);
                $("#bahagian_terlibat").multiselect('load');
                //$("#bahagian_terlibat").multiselect('reload');
                bahagian_terlibat_div()
      }
  }

  function bahagian_terlibat_div(){ 
    console.log('function');
    // var selected=$( "#bahagian_terlibat option:selected" ).filter(option => option.selected).map(option => option.value);
    var select = document.getElementById('bahagian_terlibat');
    var selected = [...select.selectedOptions].map(option => option.text);
    var selectedvalue=[...select.selectedOptions]
                    .map(option => option.value);
    console.log(selectedvalue)
    console.log(selected)
    // console.log(selected)
    var a=$("#ms-opt-"+selectedvalue).parent().parent();
    
    var comma_seprated=selected+',';
    var data=comma_seprated.replace(/,/g, '.<br>')
     console.log(data)
    $("#selected_bahagian_terlibat").html(data);

    var bahagian_pemilik = document.getElementById('bahagian_pemilik').value; console.log(bahagian_pemilik)
    if(bahagian_pemilik!='')
    {
      $("#bahagian_pemilik_error").css("display","none")
      $("#bahagian_pemilik").css("border-color","#1d1414")
    }
    else
    {
      $("#bahagian_pemilik_error").css("display","block")
      $("#bahagian_pemilik").css("border-color","red")
    }
    var check_teri = $('#bahagian_terlibat_checkbox').val(); console.log(check_teri)
    if(selectedvalue.length>0 || check_teri=='true')
    {
      $("#bahagian_terlibat_error_error").css("display","none")
    }
    else
    {
      $("#bahagian_terlibat_error_error").css("display","block")
    }

    
    
    // if(selected!=''){

    //   var selected_list=$("#selected_bahagian_terlibat").html();
    //   // console.log(selected_list)
    // }
    // else{
    //   $("#selected_bahagian_terlibat").html('');
    // }

  }



  
</script>

