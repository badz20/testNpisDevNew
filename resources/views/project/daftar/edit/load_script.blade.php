<script>
    $(document).ready(function(){

        if({{json_encode($viewOnly)}}) {
        disableInputs()
        }


   function disableInputs() {
      // Get all input elements
            //   alert({{json_encode($viewOnly)}});
      const inputs = document.getElementsByTagName("input");
    //   console.log(inputs)
      
      // Loop through each input element
      for (let i = 0; i < inputs.length; i++) {
        const input = inputs[i];
      console.log(input)


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
    $("#user_profile").css("pointer-events","none")
    
    function load_edit_data(kajians,hakisans)
        {
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
            axios({
                method: 'get',
                url: "{{ env('API_URL') }}"+"api/project/projects/" + {{$id}},
                responseType: 'json',            
            })
            .then(function (response) { 
                project = response.data.data 
                console.log('project data')
                console.log(project)
                var set=document.getElementById('no_rujukan').value = project.no_rujukan
                if(set){
                    loadcompleted();
                    $("#user_profile").css("pointer-events","")
                }
                setProjectType(project.daerah_id,project.negeri_id)
               
                document.getElementById('kategori_project').value = project.kategori_Projek
                document.getElementById('bahagian_pemilik').value = parseInt(project.bahagian_pemilik.id)
                document.getElementById('rolling_plan_options').value = parseInt(project.rolling_plan_code)
                document.getElementById('RMK').value = project.rmk
                document.getElementById('butiran_options').value = parseInt(project.butiran_code)
                document.getElementById('project_name').value = project.nama_projek
                document.getElementById('section_project_name').innerHTML = project.nama_projek
                document.getElementById('objektif').innerHTML = project.objektif
                document.getElementById('ringkasan_latar').innerHTML = project.ringkasan_projek
                document.getElementById('rasional_keperluan').innerHTML = project.rasional_projek
                document.getElementById('faedah').innerHTML = project.Faedah
                document.getElementById('jenis_kategori_options').value = parseInt(project.jenis_kategori_code)
                
                document.getElementById('implikasi_projeck').innerHTML = project.implikasi_projek_tidak_lulus
                document.getElementById('bahagianepu_options').value = parseInt(project.bahagian_epu_id)
                
                document.getElementById('koridor_pembangunan_options').value = parseInt(project.koridor_pembangunan)
                document.getElementById('kelulus_khas').innerHTML = project.nota_tambahan
                document.getElementById('tahun_jangka_mula').value = project.tahun_jangka_mula
                document.getElementById('tahun_jangka_siap').value = project.tahun_jangka_siap
                document.getElementById('tempoh_pelaksanaan').value = project.tempoh_pelaksanaan
                //document.getElementById('jenis_kajian_options').value = parseInt(data.jenis_kajian)
                //document.getElementById('nama_laporan_kajian').value = data.nama_laporan_kajian
                //document.getElementById('tahun_terkini').value = data.tahun_kajian_siap_terkini
                //document.getElementById('kategori_hakisan_options').value = parseInt(data.kategori_hakisan)
                document.getElementById('kajian_kemungkinan_options').value =  parseInt(project.rujukan_code)
                document.getElementById('nama_laporan_pelan_induk').value = project.nama_laporan_pelan_induk
                document.getElementById('tahun_siap_pelan_induk').value = project.rujukan_tahun_siap
                document.getElementById('pelaksanaan_description').value = project.melibat_pembinaan_fasa_description
                document.getElementById('status_options').value = parseInt(project.melibat_pembinaan_fasa_status)
                document.getElementById('pelaksanaan_tahun_siap').value = project.melibat_pembinaan_fasa_tahun
                document.getElementById('banjir_limpahan_options').value = parseInt(project.kekerapan_banjir_code)
                
                localStorage.setItem('bahagian_pemilik',parseInt(project.bahagian_pemilik.id));
                localStorage.setItem('rojukan_code',project.no_rujukan);
                //alert(project.is_bahagian_terlibat)
                
                
                    for(var i in project.bahagian_terlibat) {
                        console.log(project.bahagian_terlibat[i])
                        var optionVal = project.bahagian_terlibat[i].bahagian_id;                    
                        // console.log($("bahagian_terlibat").find("option[value="+optionVal+"]").val())
                        $("#bahagian_terlibat").find("option[value="+optionVal+"]").prop("selected", true);
                        
                    }
                    

                $("#bahagian_terlibat").multiselect('reload');

                $("#bahagian_terlibat").click();


                if(parseInt(project.is_bahagian_terlibat) == 1 ) {
                    
                    $("#bahagian_terlibat_checkbox").val(true)
                    $(".ms-options-wrap").css('pointer-events','none');
                    var pilihBtn=$(".ms-options-wrap").children();
                    $(pilihBtn[0]).css("background","#e9ecef" ).css("color","#495057");
                    $("#selected_bahagian_terlibat_div").css("display","none")
                    $("#bahagian_terlibat_checkbox_div").css("top","-9px")
                    $("#select_content_div").css("top","15px")
                    document.getElementById("bahagian_terlibat_checkbox").checked = true;
                }else {
                    document.getElementById("bahagian_terlibat_checkbox").checked = false
                    $("#bahagian_terlibat_checkbox").val(false)
                    $(".ms-options-wrap").css('pointer-events','');
                    var pilihBtn=$(".ms-options-wrap").children();
                    $(pilihBtn[0]).css("background","white" ).css("color","gray");
                    $("#selected_bahagian_terlibat_div").css("display","block")
                    $("#bahagian_terlibat_checkbox_div").css("top","-2px")
                    $("#select_content_div").css("top","8px")
                    
                }

                var x = document.getElementById('bahagian_terlibat');
                console.log(x);
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

                    if(x.options[i].value == project.bahagian_pemilik.id) {
                        data.checked = false;
                        data.disabled = true
                    }

                    options.push(data)
                }
                console.log(options);
                $("#bahagian_terlibat").multiselect('loadOptions', options);
                $("#bahagian_terlibat").multiselect('load');
                
                // //$("#bahagian_terlibat").multiselect('reload');
                // bahagian_terlibat_div()
                
                // $.each(data.bahagian_terlibat, function (key, item) {                                        
                //         var el = document.createElement("option");
                //         el.textContent = item.name;
                //         el.value = item.id;
                //         if(item.id === data.sektor_utama_id){
                //             el.setAttribute("selected", true)
                //         }
                //         sektorUtama.appendChild(el);
                //     })



                //radio buttons
                switch (parseInt(project.kululusan_khas)) {
                    case 0:
                        document.getElementById('radio_Kelulusan_no').setAttribute('checked', '')
                        $(".nota_tambahan").addClass('d-none');
                        document.getElementById('kelulus_khas').required = false;
                        break;
                    case 1:
                        document.getElementById('radio_Kelulusan_yes').setAttribute('checked', '')
                        $(".nota_tambahan").removeClass('d-none');
                        document.getElementById('kelulus_khas').required = true;
                    case 2:
                        document.getElementById('radio_Kelulusan_na').setAttribute('checked', '')
                        $(".nota_tambahan").addClass('d-none');
                        document.getElementById('kelulus_khas').required = false;
                    default:
                        break;
                }
                console.log(parseInt(project.sokongan_upen))
                switch (parseInt(project.sokongan_upen)) {
                    case 0:
                        document.getElementById('radio_Sokongan_no').setAttribute('checked', '')
                        break;
                    
                    case 1:
                        document.getElementById('radio_Sokongan_yes').setAttribute('checked', '')
                        break;
                    
                    case 2:
                        document.getElementById('radio_Sokongan_na').setAttribute('checked', '')
                        break;

                    default:
                        break;
                }
                // if(project.sokongan_upen) { 
                //     document.getElementById('radio_Sokongan_yes').setAttribute('checked', '')
                // }else {
                //     document.getElementById('radio_Sokongan_no').setAttribute('checked', '')
                // }

                switch (parseInt(project.kajian)) {
                    case 0:
                        document.getElementById('radio_Kajian_no').setAttribute('checked', '')
                        $(".kaijan-col").addClass('d-none');
                        break;
                    
                    case 1:
                        document.getElementById('radio_Kajian_yes').setAttribute('checked', '')
                        $(".kaijan-col").removeClass('d-none');
                        break;
                    
                    case 2:
                        document.getElementById('radio_Kajian_na').setAttribute('checked', '')
                        $(".kaijan-col").addClass('d-none');
                        break;
                        
                    default:
                        break;
                }

                // if(project.kajian) { 
                //     document.getElementById('radio_Kajian_yes').setAttribute('checked', '')
                //     $(".kaijan-col").removeClass('d-none');
                // }else {
                //     document.getElementById('radio_Kajian_no').setAttribute('checked', '')
                //     $(".kaijan-col").addClass('d-none');
                // }

                switch (parseInt(project.rujukan_pelan_induk)) {
                    case 0:
                        document.getElementById('rujukan_pelan_no').setAttribute('checked', '')
                        $(".rujukan_pelan_data").addClass('d-none');
                        document.getElementById('kajian_kemungkinan_options').required = false;
                        document.getElementById('nama_laporan_pelan_induk').required = false;
                        document.getElementById('tahun_siap_pelan_induk').required = false;
                        break;
                    
                    case 1:
                        document.getElementById('rujukan_pelan_yes').setAttribute('checked', '')
                        $(".rujukan_pelan_data").removeClass('d-none');
                        document.getElementById('kajian_kemungkinan_options').required = true;
                        document.getElementById('nama_laporan_pelan_induk').required = true;
                        document.getElementById('tahun_siap_pelan_induk').required = true;
                        break;
                    
                    case 2:
                        document.getElementById('rujukan_pelan_na').setAttribute('checked', '')
                        $(".rujukan_pelan_data").addClass('d-none');
                        document.getElementById('kajian_kemungkinan_options').required = false;
                        document.getElementById('nama_laporan_pelan_induk').required = false;
                        document.getElementById('tahun_siap_pelan_induk').required = false;
                        break;
                        
                    default:
                        break;
                }

                // if(project.rujukan_pelan_induk) { 
                //     document.getElementById('rujukan_pelan_yes').setAttribute('checked', '')
                //     $(".rujukan_pelan_data").removeClass('d-none');
                //     document.getElementById('kajian_kemungkinan_options').required = true;
                //     document.getElementById('nama_laporan_pelan_induk').required = true;
                //     document.getElementById('tahun_siap_pelan_induk').required = true;  
                // }else {
                //     document.getElementById('rujukan_pelan_no').setAttribute('checked', '')
                //     $(".rujukan_pelan_data").addClass('d-none');
                //     document.getElementById('kajian_kemungkinan_options').required = false;
                //     document.getElementById('nama_laporan_pelan_induk').required = false;
                //     document.getElementById('tahun_siap_pelan_induk').required = false;
                // }

                // if(project.status_reka_bantuk!=''){
                //     console.log(project.status_reka_bantuk)
                //     console.log(project.status_reka_bantuk.toString().length)
                //     if(project.status_reka_bantuk.toString().length==4){
                //         document.getElementById('radio_Status_siap').setAttribute('checked', '') 
                //         var selected_val = $("input[type='radio']#radio_Status_siap:checked").val();
                //         $(".siap_set").val(project.status_reka_bantuk).text(project.status_reka_bantuk)
                //         if(selected_val==1){
                //             // $("#reka_bentuk_siap").val(project.status_reka_bantuk).text(project.status_reka_bantuk)
                //             $(".reka_bentuk_siap").removeClass("d-none")
                //             $("#reka_bentuk_siap").keyup(function(){
                //             var value=$(this).val();
                //             console.log(value)
                //             // $(".siap_set").val(project.status_reka_bantuk).text(project.status_reka_bantuk)

                //         })
                //         }
                //         else{
                //         $(".reka_bentuk_siap").addClass("d-none")
                //         }
                //     }
                //     else if(project.status_reka_bantuk==1){
                //         document.getElementById('radio_Status_siap').setAttribute('checked', '')
                //     }
                //     else{
                //         document.getElementById('radio_Status_siap').setAttribute('checked', '')
                //     }
                // }


                if(project.status_reka_bantuk==1){
                    $(".siap_set1").prop('checked', true) 
                    if(project.status_reka_bantuk==1){
                    $(".reka_bentuk_siap").removeClass("d-none")
                    $("#reka_bentuk_siap").val(project.reka_bantuk_siap);
                    $("#reka_bentuk_siap").keyup(function(){
                        var reka_bantuk_siap=$(this).val();
                        // console.log(reka_bantuk_siap)
                    })
                    }
                    else{
                    $(".reka_bentuk_siap").addClass("d-none")
                    }

                }
                else if(project.status_reka_bantuk==2)
                {
                $(".siap_set2").prop('checked', true)   
                }
                else{
                $(".siap_set3").prop('checked', true)   
                }


                switch (parseInt(project.melibat_pembinaan_fasa)) {
                    case 0:
                        document.getElementById('radio_pelaksanaan_no').setAttribute('checked', '')
                        $(".adakah_pelaksanaan_data").addClass('d-none');
                        document.getElementById('pelaksanaan_description').required = false;
                        document.getElementById('status_options').required = false;
                        document.getElementById('pelaksanaan_tahun_siap').required = false;
                        break;
                    
                    case 1:
                        document.getElementById('radio_pelaksanaan_yes').setAttribute('checked', '')
                        $(".adakah_pelaksanaan_data").removeClass('d-none');
                        document.getElementById('pelaksanaan_description').required = true;
                        document.getElementById('status_options').required = true;
                        document.getElementById('pelaksanaan_tahun_siap').required = true;
                        break;
                    
                    case 2:
                        document.getElementById('radio_pelaksanaan_na').setAttribute('checked', '')
                        $(".adakah_pelaksanaan_data").addClass('d-none');
                        document.getElementById('pelaksanaan_description').required = false;
                        document.getElementById('status_options').required = false;
                        document.getElementById('pelaksanaan_tahun_siap').required = false;
                        break;
                        
                    default:
                        break;
                }
                // if(project.melibat_pembinaan_fasa ) { 
                //     document.getElementById('radio_pelaksanaan_yes').setAttribute('checked', '')
                //     $(".adakah_pelaksanaan_data").removeClass('d-none');
                //     document.getElementById('pelaksanaan_description').required = true;
                //     document.getElementById('status_options').required = true;
                //     document.getElementById('pelaksanaan_tahun_siap').required = true;
                // }else {
                //     document.getElementById('radio_pelaksanaan_no').setAttribute('checked', '')
                //     $(".adakah_pelaksanaan_data").addClass('d-none');
                //     document.getElementById('pelaksanaan_description').required = false;
                //     document.getElementById('status_options').required = false;
                //     document.getElementById('pelaksanaan_tahun_siap').required = false;
                // }


                switch (parseInt(project.pernah_dibahasakan)) {
                    case 0:
                        document.getElementById('radio_Adakah_no').setAttribute('checked', '')
                        break;
                    
                    case 1:
                        document.getElementById('radio_Adakah_yes').setAttribute('checked', '')
                        break;
                    
                    case 2:
                        document.getElementById('radio_Adakah_na').setAttribute('checked', '')
                        break;
                        
                    default:
                        break;
                }

                // if(project.pernah_dibahasakan ) { 
                //     document.getElementById('radio_Adakah_yes').setAttribute('checked', '')
                // }else {
                //     document.getElementById('radio_Adakah_no').setAttribute('checked', '')
                // }
                
                axios({
                    method: 'get',
                    url: "{{ env('API_URL') }}"+"api/project/sektor_utama/" + project.bahagian_epu_id,
                    responseType: 'json',            
                })
                .then(function (response) { 
                utamaData = response.data.data;   

                
                var sektorUtama =  document.getElementById("sektor_utama_options");

                    $.each(utamaData, function (key, item) {                                        
                        var el = document.createElement("option");
                        el.textContent = item.name;
                        el.value = item.id;                        
                        if(item.id === parseInt(project.sektor_utama_id)){
                            
                            el.setAttribute("selected", true)
                        }
                        sektorUtama.appendChild(el);
                        
                    })
                    
                    
                })

                axios({
                    method: 'get',
                    url: "{{ env('API_URL') }}"+"api/project/sektor/" + project.sektor_utama_id,
                    responseType: 'json',            
                })
                .then(function (response) { 
                    
                sektorData = response.data.data;            
                var sektor =  document.getElementById("sektor_options");

                    $.each(sektorData, function (key, item) {
                        var el = document.createElement("option");
                        el.textContent = item.name;
                        el.value = item.id;
                        if(item.id === parseInt(project.sektor_id)){
                            el.setAttribute("selected", true)
                        }
                        sektor.appendChild(el);
                    })
                    
                })

                axios({
                    method: 'get',
                    url: "{{ env('API_URL') }}"+"api/project/sektor_sub/" + project.sektor_id,
                    responseType: 'json',            
                })
                .then(function (response) { 
                subData = response.data.data;  
                console.log('sub sek Data')
                console.log(subData)  
                console.log(project.sub_sektor_id)  
                      
                var subSektor =  document.getElementById("sub_sektor_options");

                    $.each(subData, function (key, item) {
                        var el = document.createElement("option");
                        el.textContent = item.name;
                        el.value = item.id;
                        if(item.id === parseInt(project.sub_sektor_id)){
                            el.setAttribute("selected", true)
                        }
                        subSektor.appendChild(el);
                    })
                    
                })

                axios({
                    method: 'get',
                    url: "{{ env('API_URL') }}"+"api/project/jenis_sub_kategori/" + project.jenis_kategori_code,
                    responseType: 'json',            
                })
                .then(function (response) { 
                    
                subJenis = response.data.data;
                var subJenisDropDown =  document.getElementById("jenis_sub_kategori_options");
                var i, L = subJenisDropDown.options.length - 1;
                for(i = L; i >= 0; i--) {
                    subJenisDropDown.remove(i);
                }
                    $.each(subJenis, function (key, item) {
                        var el = document.createElement("option");
                        el.textContent = item.name;
                        el.value = item.id;                    
                        if(item.id === parseInt(project.jenis_sub_kategori_code)){
                            el.setAttribute("selected", true)
                        }
                        subJenisDropDown.appendChild(el);
                    })
                    
                })
                
                load_skop_project(project.skop_project)
               
                    //load kajian projects
                    $.each(project.kajian_projects, function (key, item) { 
                        let kajian_options = ''
                        let hakisan_options = ''
                        let laporan_class = ''
                        let hakisan_class = ''
                        let tahun_class = ''
                        $.each(kajians, function (key1, kajian_item) { 
                            var selected = ''                                               
                            if(kajian_item.code == parseInt(item.jenis_kajian_code)){
                                // console.log('matched')
                                selected = 'selected'
                            }
                            kajian_options = kajian_options + '<option value="'+kajian_item.code+'" '+selected+'>'+kajian_item.value+'</option>'
                        })

                        $.each(hakisans, function (key1, hakisan_item) { 
                            var selected = ''                                               
                            if(hakisan_item.code == parseInt(item.kategori_hakisan)){
                                // console.log('matched')
                                selected = 'selected'
                            }
                            hakisan_options = hakisan_options + '<option value="'+hakisan_item.code+'" '+selected+'>'+hakisan_item.value+'</option>'
                        })
                            if(item.jenis_kajian_code == 3){
                                hakisan_class = 'd-none'
                            }

                            if(item.jenis_kajian_code == 1){
                                hakisan_class = 'd-none'
                                //tahun_class = 'd-none'
                                laporan_class = 'd-none'
                            }

                            if(item.jenis_kajian_code == 2){
                                //hakisan_calss = 'd-none'
                                //tahun_class = 'd-none'
                                laporan_class = 'd-none'
                            }
                            let readonly = ''
                            let disabled = ''
                            let removeButton = `<button type="button" id="kajian_button" class="p-2" style="background-color: transparent;border: none; padding: 0;">
                                <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                            </button> `

                            if({{$status}} != 1) {
                                readonly = 'readonly'
                                disabled = 'disabled'
                                removeButton = ''
                            }

                            data = `
                            <div id="kajian_details" class="impak-content">
                                
                                <div class="mt-2 p-0 col-12">
                                    <div class="form-group col-md-5 col-xs-12 p-0 mt-3">
                                        <label for="Jenis Kajilan" class="w-100">Jenis Kajian</label>
                                        <div class="d-flex">
                                            <select name="jenis_kajian_options" style="width:auto"
                                                    id="jenis_kajian_options" `+ disabled+`
                                                    class="form-control mt-2 Jenis_Kajilan">
                                                <option value="">--Pilih--</option>
                                                `+kajian_options+`
                                            </select> 
                                            ` + removeButton+`
                                        </div>              
                                    </div>
                                </div>  
                                <div id="inline" class="d-flex form-group row col-12 p-0">

                                <div class=" col-md-6 col-xs-12 Jenis_Kajilan_input `+laporan_class+` p-0" id="div_laporan">
                                    <div class="input_content row col-12">
                                        <label for="Jenis Kajilan" class="w-100">
                                            Nyatakan Nama Laporan Kajian :
                                        </label>
                                        <div class="form-group col-12">
                                            <input type="text" style="width:auto"
                                            class="form-control "
                                            name="nama_laporan_kajian" `+readonly+`
                                            id="nama_laporan_kajian"
                                            value="`+item.nama_laporan+`" />                        
                                        </div>
                                    </div>
                                </div>
                                <!-------------------------------- Tahun siap starts ------------------------------->
                                <div class="input_container terkini `+tahun_class+` col-md-6 col-xs-12 p-0" id="div_terkini">
                                <div class="input_content  row pl-3">
                                    <label for="Terkini" class="col-12">Tahun Siap Terkini <sup>*</sup></label>
                                    <div class="form-group input_form_group col-12">
                                        <input type="text" style="width:auto"
                                                class="form-control"
                                                name="tahun_terkini" `+readonly+`
                                                id="tahun_terkini"
                                                minlength="4" maxlength="4"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                                value="`+item.tahun_siap_terkini+`" />                        
                                    </div>
                                </div>
                                </div>
                                <!-------------------------------- Kategori Hakisan starts ------------------------------->
                                <div class="input_container kategor_hakisan `+hakisan_class+` col-md-6 col-xs-12 p-0" id="div_hakisan">
                                <div class="input_content row m-0">
                                    <label for="Kategor_Hakisan" class="col-12 p-0">
                                        Kategori Hakisan <sup>*</sup>
                                    </label>
                                    <div class="form-group input_form_group col-12 p-0">
                                        <select name="kategori_hakisan_options" style="width:auto"
                                                id="kategori_hakisan_options" `+disabled+`
                                                class="form-control">
                                            <option value="">--Pilih--</option>
                                            `+hakisan_options+`
                                        </select>                
                                    </div>
                                </div>
                                </div>
                            </div>
                            `
                            $('#kajian_content').append(data);  
                            
                            
                    })

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
                                all_div_terkini[i].classList.remove('d-none');
                                all_div_hakisan[i].classList.remove('d-none'); 
                                all_div_laporan[i].classList.add('d-none');                     
                                }
                                else{
                                all_div_laporan[i].classList.add('d-none');
                                all_div_terkini[i].classList.add('d-none');
                                all_div_hakisan[i].classList.add('d-none');                      
                                }
                        });
                    });
                    $("div.spanner").removeClass("show");
                      $("div.overlay").removeClass("show");
            })
            .catch(function (error) {
                    $("div.spanner").removeClass("show");
                      $("div.overlay").removeClass("show");
                  })

                  //pemilikChange(document.getElementById('bahagian_terlibat'))
        }

    $(document).ready(function(){


            const currentUrl = window.location.href;
            const url = new URL(currentUrl);
            const pathname = url.pathname; console.log(pathname)
            const parts = pathname.split('/'); console.log(parts[4])
            let workflow = 0;
            if(parts[4]!=='')
            {
                workflow = parts[4];   
            }
            else
            {
                workflow = localStorage.getItem("workflow_status");   
            }
            console.log(workflow)

        let userType = {{$user}}; console.log(userType)
        let penyemak =  {{$penyemak}}; console.log(penyemak)
        let penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1)
        let penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2)
        let pengesah =  {{$pengesah}}; console.log(pengesah)
        let projectType = localStorage.getItem("project_type");  console.log("project type ->" + projectType)

        if((penyemak==1 && workflow==2) || (penyemak_1==1 && workflow==4) || (penyemak_2==1 && workflow==7) || (pengesah==1 && workflow==11))
        {
            if(projectType=="negeri")
            {
                document.getElementById('indicator-negeri-review').classList.remove("d-none");
            }
            else if(projectType=="bahagian")
            {
                document.getElementById('indicator-bahagian-review').classList.remove("d-none");
            }
            else
            {
                document.getElementById('indicator-daerah-review').classList.remove("d-none");
                document.getElementById('indicator-daerah-review-vertical').classList.remove("d-none");
            }

        }
        else
        {
            if(projectType=="negeri")
            {
                document.getElementById('indicator-negeri-view').classList.remove("d-none");
                document.getElementById('indicator-negeri-view-vertical').classList.remove("d-none");
            }
            else if(projectType=="bahagian")
            {
                document.getElementById('indicator-bahagian-view').classList.remove("d-none");
            }
            else
            {
                document.getElementById('indicator-daerah').classList.remove("d-none");
                document.getElementById('indicator-daerah-vertical').classList.remove("d-none");
            }

        }

        // if(projectType=="negeri")
        // {  console.log("negeri indicator") 
        //         if((penyemak==1 && workflow==2) || (penyemak_1==1 && workflow==4))
        //         {
        //             document.getElementById('indicator-negeri-review').classList.remove("d-none");
        //         }
        //         else
        //         {
        //             document.getElementById('indicator-negeri-view').classList.remove("d-none");
        //         }
        // }
        // else if(projectType=="bahagian")
        // {  console.log("bahagian indicator")
        //     if(penyemak==1 && workflow==2)
        //     {
        //         document.getElementById('indicator-bahagian-review').classList.remove("d-none");
        //     }
        //     else if(penyemak_1==1 && workflow==4)
        //     {
        //         document.getElementById('indicator-bahagian-review').classList.remove("d-none");
        //     }
        //     else if(penyemak_2==1 && workflow==7)
        //     {
        //         document.getElementById('indicator-bahagian-review').classList.remove("d-none");
        //     }
        //     else if(pengesah==1 && workflow==11)
        //     {
        //         document.getElementById('indicator-bahagian-review').classList.remove("d-none");
        //     }
        //     else
        //     {
        //         document.getElementById('indicator-bahagian-view').classList.remove("d-none");
        //     }
        // }
        // else
        // { console.log("daerah indicator")
        //     if((penyemak==1 && workflow==2) || (penyemak_1==1 && workflow==4) || (penyemak_2==1 && workflow==7) || (pengesah==1 && workflow==11))
        //     {
        //         document.getElementById('indicator-daerah-review').classList.remove("d-none");
        //     }
        //     else
        //     {
        //         document.getElementById('indicator-daerah').classList.remove("d-none");
        //     }   
        // }

        setworkflowOnIndicator(workflow);

    
        function check(){
            var disable=$("#bahagian_terlibat_checkbox").is(":checked"); 
            if(disable==true){
                $("#bahagian_terlibat_checkbox").val(true)
                $(".ms-options-wrap").css('pointer-events','none');
                var pilihBtn=$(".ms-options-wrap").children();
                $(pilihBtn[0]).css("background","#e9ecef" ).css("color","#495057");
                $("#selected_bahagian_terlibat_div").css("display","none")
                $("#bahagian_terlibat_checkbox_div").css("top","-9px")
                $("#select_content_div").css("top","15px")

            }  
            else{
                console.log('1 ELSE');
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

                    if(x.options[i].value == bahagian_pemilik.value) {
                    data.checked = false;
                    data.disabled = true
                    }

                    
                    if(x.options[i].value == bahagian_pemilik.value) {
                    $(`#bahagian_terlibat option[value="`+bahagian_pemilik.value+`"]`).prop('selected', false);
                    }
                    options.push(data)
                }
                console.log(options);
                $("#bahagian_terlibat").multiselect('loadOptions', options);
                $("#bahagian_terlibat").multiselect('load');
                //$("#bahagian_terlibat").multiselect('reload');
                bahagian_terlibat_div()

            }
        }

        function bahagian_terlibat_div(){   
        // var selected=$( "#bahagian_terlibat option:selected" ).filter(option => option.selected).map(option => option.value);
            var select = document.getElementById('bahagian_terlibat');
            var selected = [...select.selectedOptions].map(option => option.text);
            var selectedvalue=[...select.selectedOptions]
                            .map(option => option.value);
            console.log(selectedvalue)
            // console.log(selected)
            // console.log(selected)
            var a=$("#ms-opt-"+selectedvalue).parent().parent();

            var comma_seprated=selected+',';
            var data=comma_seprated.replace(/,/g, '.<br>')
            // console.log(data)
            $("#selected_bahagian_terlibat").html(data);


            // if(selected!=''){

            //   var selected_list=$("#selected_bahagian_terlibat").html();
            //   // console.log(selected_list)
            // }
            // else{
            //   $("#selected_bahagian_terlibat").html('');
            // }

        }
    })


    
    

    $(document).ready(function () { 
                     
            const api_token = "Bearer "+ window.localStorage.getItem('token');
        
        axios.defaults.headers.common["Authorization"] = api_token
        
        function brifUpdate()
        {
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
            var formEl = document.forms.brifProjectForm;
            var objektif=$("#objektif").html();
            var ringkasan_latar=$("#ringkasan_latar").html();
            var rasional_keperluan=$("#rasional_keperluan").html();
            var faedah=$("#faedah").html();
            var kelulus_khas=$("#kelulus_khas").html();
            var implikasi_projeck=$("#implikasi_projeck").html()
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
            
            let skop_valiation = false;
            let need_main_works = false;
            let contain_main_works = false;
            let skop_main_valiation = false;
            let unique_skop_valiation = false;
            let unique_sub_skop_valiation = false;

            let unique_skop = []
            let unique_sub_skop = []
            let all_main_skop_select = document.querySelectorAll("[id^='skop_select']");
            document.getElementById("error_skop_main_project").innerHTML = ''
            document.getElementById("error_skop_project").innerHTML = "";

            let skop_details = []
            all_main_skop_select.forEach((skop_select, i) => {
                if(skop_select.value == skop_main_code) {
                    contain_main_works = true;
                }

                if(skop_select.value == skop_prelimiarie_condition_code ) {
                    need_main_works = true;
                }
                data = []
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
                sub_dict_data = []
                all_sub_skop_select.forEach((sub_skop_select, i) => {
                    
                    console.log(all_others_td[i]);
                    let lain_lain_input = all_others_td[i].querySelectorAll("[id^='skop_lain_lain']")
                    if(skop_condition_code == skop_select.value && sub_skop_select.value == sub_skop_condition_code) {
                        need_main_works = true;
                    }

                    // if(lain_lain_input[0].value != ""){
                    //     others_data.push(lain_lain_input[0].value)
                    // }else {
                    //     others_data.push(0)
                    // }
                    data = []
                    data['id'] = sub_skop_select.getAttribute("data-db-id")
                    data['value'] = sub_skop_select.value
                    data['others'] = lain_lain_input[0].value
                    sub_data.push(data)

                    if(unique_sub_skop.includes(sub_skop_select.value)){
                        unique_sub_skop_valiation = true
                    } else {
                        unique_sub_skop.push(sub_skop_select.value)
                    }
                    //sub_dict_data.push(`{"id" : "`+sub_skop_select.getAttribute("data-db-id")+`", "value" : "`+sub_skop_select.value+`" , "others" : "`+lain_lain_input[0].value+`"}`)
                    //console.log(JSON.stringify(data));
                })
                //console.log(JSON.parse(sub_dict_data));
                //data['sub_skop_value'] = sub_data.toString();
                //data['sub_skop_value'] = sub_dict_data.toString();
                


                // if(sub_data.toString() == ""){
                //     skop_valiation = true;
                // }

                let skop = []
                let temp_skop_data = []
                temp_skop_data['id'] = skop_select.getAttribute("data-db-id")
                temp_skop_data['value'] = skop_select.value
                skop['skop_value'] = temp_skop_data
                skop['sub_skop_value'] = sub_data
                skop_details.push(skop)
            })

            //console.log(skop_details)
            let skop_details_final = []
            skop_details.forEach((skop) => {
                console.log(skop['skop_value']);
                let sub_skop = []
                skop['sub_skop_value']
                if(skop['sub_skop_value'].length == 0){
                    skop_valiation = true;
                }
                skop['sub_skop_value'].forEach((subskop) => {
                    //console.log(subskop);
                    sub_skop.push(`{"id":"`+subskop.id+`","value":"`+subskop.value+`","others":"`+subskop.others+`"}`)
                    
                })
                console.log(JSON.stringify(sub_skop));
                let tempskop = `{"id":"`+skop['skop_value'].id+`","value":"`+skop['skop_value'].value+`"}`
                skop_details_final.push(`{"skop":`+tempskop+`,"sub_skop":`+JSON.stringify(sub_skop)+`}`)
                //console.log(testformData.getAll('subskop[]["id"]'));
            })

            // })
            console.log(skop_details_final)
            if(skop_details.length == 0)
            {
                skop_valiation = true;
            }
            var jenis_kategory_element = document.getElementById("jenis_kategori_options")
            var jenis_kategory_text = jenis_kategory_element.options[jenis_kategory_element.selectedIndex].text

            if(jenis_kategory_text == 'Fizikal - Pembinaan') {
                need_main_works = true;
            }
            
            if(need_main_works && !contain_main_works) {
                skop_main_valiation = true;
                document.getElementById("error_skop_main_project").innerHTML = "Sila lengkapkan Main works";
                document.getElementById("error_skop_main_project").focus();
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
                var formData = new FormData(formEl);
                // console.log(formData);
                //console.log($('#bahagian_terlibat').val())
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
                var kajian_validation = false
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
                console.log(kajian_details)




                if(formValidation(formData) && !jenis_kajian_validation && !hakisan_validation && !tahun_terkini_validation && !skop_valiation && !terlibat_validation && !skop_main_valiation && !unique_sub_skop_valiation && !unique_skop_valiation){
                    console.log('submitted')
                    var table = document.getElementById("skopBody");
                
                    // skop_details.forEach((skop) => {
                    //     console.log(skop['skop_value']);
                    //     formData.append('skop[]["skop"]["id"]', skop['skop_value'].id);
                    //     formData.append('skop[]["skop"]["value"]', skop['skop_value'].id);
                    //     skop['sub_skop_value'].forEach((subskop) => {
                    //         console.log(subskop);
                    //         formData.append('skop[]["sub_skop"][]["id"]', subskop.id);
                    //         formData.append('skop[]["sub_skop"][]["value"]', subskop.value);
                    //         formData.append('skop[]["sub_skop"][]["others"]', subskop.others);
                    //     })
                        
                    // })

                formData.append('user_id', {{Auth::user()->id}})
                formData.append('bahagian_terliabt_all', $('#bahagian_terlibat').val())
                formData.append('bahagian_terlibat_checkbox', $('#bahagian_terlibat_checkbox').val())
                // skop_details.forEach((item) => {
                //     formData.append('skop_project_details[]', item);
                // });

                skop_details_final.forEach((item) => {
                    formData.append('skop_project_details[]', item);
                });
                kajian_details.forEach((item) => {
                    formData.append('kajian_project_details[]', item);
                });
                $('#bahagian_terlibat').val().forEach((item) => {
                    formData.append('bahagian_terliabt_all[]', item);
                });
                formData.append('id', {{$id}});
                formData.append('tempoh_pelaksanaan',$('#tempoh_pelaksanaan').val());
                formData.append('objektif',objektif);
                formData.append('ringkasan_latar',ringkasan_latar);
                formData.append('rasional_keperluan',rasional_keperluan)
                formData.append('faedah',faedah)
                formData.append('kelulus_khas',kelulus_khas)
                formData.append('implikasi_projeck',implikasi_projeck)
                formData.append('bahagian_preli_disabled',window.localStorage.getItem('bahagian_pemilik'))

                

                axios.defaults.headers.common["Authorization"] = api_token
                axios({
                        method: 'post',
                        url: api_url+"api/project/brif/update",
                        responseType: 'json',
                        data: formData
                        })
                        .then(function (response) { 
                            console.log(response)
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                            if(response.data.code == 200) {
                                // console.log('show modal')
                                  $("#add_role_sucess_modal").modal('show');
                                  $("#tutup_new").click(function(){
                                    var reload= location.reload();   
                                  })
                                  $("#close_modal").click(function(){
                                    var reload= location.reload();   
                                  })
                                // $("#modal-daftar-edit-success-id").modal('show');
                            } else {
                                // console.log('show no modal')
                                $("#modal-daftar-edit-error-id").modal('show');
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
        }
        $("#brifProjectupdate").click(function(event){                 
                brifUpdate()
        })

        $("#brifProjectnext").click(function(event){                 
                brifUpdate()
        })

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

    })

    
  
    
</script>
<script>

    function setProjectType(daerah,negeri){ //set project type
       if(daerah==null && negeri ==null)
       {
        localStorage.setItem('project_type',"bahagian");
       }
       else if(daerah==null && negeri!=null)
       {
        localStorage.setItem('project_type',"negeri");
       }
       else
       {
        localStorage.setItem('project_type',"daerah");
       }


    }

    function setworkflowOnIndicator(workflow){

        console.log("workflow for pop-up"+workflow)
        if(workflow==1)
        {
            document.getElementById('daerah_penya_view').classList.add("yellow");
            document.getElementById('daerah_penya_review').classList.add("yellow");
            document.getElementById('baha_penya_review').classList.add("yellow");
            document.getElementById('baha_penya_view').classList.add("yellow");
            document.getElementById('negeri_penya_review').classList.add("yellow");
            document.getElementById('negeri_penya_view').classList.add("yellow");            
        }
        else if(workflow==2 || workflow==3 || workflow==5)
        {
            document.getElementById('daerah_penyamak_view').classList.add("yellow");
            document.getElementById('daerah_penyamak_review').classList.add("yellow");
            document.getElementById('baha_penyamak_view').classList.add("yellow");
            document.getElementById('baha_penyamak_review').classList.add("yellow");
            document.getElementById('negeri_penyamak_review').classList.add("yellow");
            document.getElementById('negeri_penyamak_view').classList.add("yellow");            
        }
        else if(workflow==4 || workflow==6 || workflow==8)
        {
            document.getElementById('daerah_penya1_view').classList.add("yellow");
            document.getElementById('daerah_penya1_review').classList.add("yellow");
            document.getElementById('baha_penya1_review').classList.add("yellow");
            document.getElementById('baha_penya1_view').classList.add("yellow");
            document.getElementById('negeri_penya1_review').classList.add("yellow");
            document.getElementById('negeri_penya1_view').classList.add("yellow");            
        }
        else if(workflow==7 || workflow==10 || workflow==12)
        {
            document.getElementById('daerah_penya2_view').classList.add("yellow");
            document.getElementById('daerah_penya2_review').classList.add("yellow");
            document.getElementById('baha_penya2_review').classList.add("yellow");
            document.getElementById('baha_penya2_view').classList.add("yellow");
            document.getElementById('negeri_penya2_review').classList.add("yellow");
            document.getElementById('negeri_penya2_view').classList.add("yellow");            
        }
        else if(workflow==11 || workflow==13 || workflow==15) 
        {
            document.getElementById('daerah_pengesah_view').classList.add("yellow");
            document.getElementById('daerah_pengesah_review').classList.add("yellow");
            document.getElementById('baha_pengesah_review').classList.add("yellow");
            document.getElementById('baha_pengesah_view').classList.add("yellow");
            document.getElementById('negeri_pengesah_review').classList.add("yellow");
            document.getElementById('negeri_pengesah_view').classList.add("yellow");            
        }
        else if(workflow==14 || workflow==17 || workflow==18) 
        {
            document.getElementById('daerah_bkor_view').classList.add("yellow");
            document.getElementById('daerah_bkor_review').classList.add("yellow");
            document.getElementById('baha_bkor_review').classList.add("yellow");
            document.getElementById('baha_bkor_view').classList.add("yellow");
            document.getElementById('negeri_bkor_review').classList.add("yellow");
            document.getElementById('negeri_bkor_view').classList.add("yellow");
        }
        else
        {
            
        }

    }


    $("#confirm").click(function(){        
        
            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
            const project_id = {{$id}};  console.log(project_id);
            const user_id = {{Auth::user()->id}};
            let workflow = localStorage.getItem("workflow_status");   console.log(workflow)
            console.log('testing 2')



            $.ajaxSetup({
                  headers: {
                      "Content-Type": "application/json",
                      "Authorization": api_token,
                      }
                });
              axios({
                          method: "post",
                          url: api_url+"api/project/set_approve",
                          data: {'id':project_id,
                                 'usertype':{{$user}},
                                 'user_id':user_id,
                                 'workflow':workflow
                                },
                          headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                      })
                  .then(function (response) { console.log(response.data);

                    if(workflow==11)
                    {
                        window.location.href = origin + '/pengesahan-project-list';
                    }
                    else if(workflow==14)
                    {
                        window.location.href = origin + '/peraku-project-list';
                    }
                    else
                    {
                        window.location.href = origin + '/semak-project-list';   
                    }        
                  })
                  .catch(function (response) {
                    //handle error
                    console.log(response);
                  });
    })

    $("#confirm_close_btn").click(function(){  
        $("#Make_sure_application_modal").modal('hide');
        document.getElementById("klik_semakan").checked = false;
    });

    let accordian_single_list = document.querySelectorAll(
    ".accordian_single_list"
  );
  let d_arrow = document.querySelectorAll(".d_arrow");

  accordian_single_list.forEach((asl) => {
    asl.addEventListener("click", () => {
      d_arrow.forEach((darr) => {
        darr.classList.remove("active");
      });
      // let accordian_content = asl.closest(".accordian_content ");
      // console.log(accordian_content);
      let arrow = asl.querySelector(".d_arrow");
      let Accordian_link = asl.querySelector(".Accordian_link");
      if (Accordian_link.classList.contains("collapsed")) {
        arrow.classList.add("active");
      } else {
        arrow.classList.remove("active");
      }
    });
  });

    // Restrict delete first numbering in ordering list input
    $("#objektif").on('keydown', function (e) {
        var objektif= $("#objektif ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (objektif.length < 1)) {
            e.preventDefault();
        }
    });
    $("#ringkasan_latar").on('keydown', function (e) {
        var ringkasan_latar= $("#ringkasan_latar ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (ringkasan_latar.length < 1)) {
            e.preventDefault();
        }
    });
    $("#rasional_keperluan").on('keydown', function (e) {
        var rasional_keperluan= $("#rasional_keperluan ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (rasional_keperluan.length < 1)) {
            e.preventDefault();
        }
    });
    $("#faedah").on('keydown', function (e) {
        var faedah= $("#faedah ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (faedah.length < 1)) {
            e.preventDefault();
        }
    });
    $("#implikasi_projeck").on('keydown', function (e) {
        var implikasi_projeck= $("#implikasi_projeck ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (implikasi_projeck.length < 1)) {
            e.preventDefault();
        }
    });
    $("#kelulus_khas").on('keydown', function (e) {
        var kelulus_khas= $("#kelulus_khas ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (kelulus_khas.length < 1)) {
            e.preventDefault();
        }
    });

	$("#bahagian_pemilik").click(function() {
		var my_options = $("#bahagian_pemilik option");

		my_options.sort(function(a,b) {
		    if (a.text > b.text) return 1;
		    else if (a.text < b.text) return -1;
		    else return 0;
		});

		$("#bahagian_pemilik").empty().append(my_options).selectpicker("refresh");
	});

    $("#bahagian_terlibat").click(function() {
		var my_options = $("#bahagian_terlibat option");

		my_options.sort(function(a,b) {
		    if (a.text > b.text) return 1;
		    else if (a.text < b.text) return -1;
		    else return 0;
		});

		$("#bahagian_terlibat").empty().append(my_options).selectpicker("refresh");
	});
</script>

