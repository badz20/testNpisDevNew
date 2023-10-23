<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>

    // alert(noc_id);
    updateid=[];
    
    const api_url = "{{env('API_URL')}}";  //console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  //console.log(api_token);
    // alert(noc_id);
   var Negeri_ID="";
    var Negeri_ID_pem="";
    var numnegeri=1;
    let options="";

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    axios({
            method: "get",
            url: api_url+"api/noc/noc_projectDetails/" + {{Auth::user()->id}},
            // data: formData,
            headers: {"Authorization": api_token },
        })

    .then(function (response) { 
        // //console.log(response.data.data)
        var result=response.data; //console.log(result);
        var all_result=response.data.all_lists;
        var skop_array=result.skop; //console.log(skop_array);

        $.each(all_result, function (key, item) {
                    // console.log(item)
					var opt = item.id;
                    var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectNameProjek.appendChild(el);                              
                })

        if(skop_array)
        {
            loadSkops(skop_array);
        }
        
        if (result) {
                

                $.each(result.data, function (key, item) {
                    // //console.log(item)
					var opt = item.id;
                    var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectProject.appendChild(el);  
                })

                if(result.noc_data)
                {
                    $.each(result.noc_data, function (keys, items) { ////console.log(items['pp_id'])

                        $("select option[value*='"+items['pp_id']+"']").prop('disabled',true);

                    })

                }
                // pp_id
                $("#selectProject").change(function(){
                    var id=$(this).val()
                    // //console.log(id)
                    // //console.log(result)
                    var value2=[];
                    var value3=[];
                    var value4=[];
                    // $("#mytable").load(location.href + " #mytable");



                    $.each(result.data, function (key, item) {
                        // //console.log(id)
                        // //console.log(item.id)
                        if(id==item.id){
                            ////console.log(item.kod_projeck)
                            var word=item.kod_projeck.split(/[\W\d]+/).join("")
                            $("#valueOne").val(word)
                            var num=item.kod_projeck.split(/[^\d]+/).join("");
                            $("#valueFour").val(num.substr(-3))
                            function splitNum(num) {
                                return String(num).split("").map(Number);
                            }
                            var splitedNumber=splitNum(num)
                            for(i=0;i<splitedNumber.length-7;i++){
                                value2.push(splitedNumber[i])
                            }
                            for(i=7;i<11;i++){
                                value3.push(splitedNumber[i])
                            }
                            $("#valueThree").val(value3.join(''))
                            $("#valueTwo").val(value2.join(''))
                        }
                    })

                    $("#pp_id").val(id)

                    axios({
                        method: 'get',
                        url: api_url+"api/noc/projectData/" + id, 
                        headers: {"Authorization": api_token },

                    })
                    .then(function (response) { 
                        // ////console.log(response);
                        $("#table_body").empty();
                        data = response.data.data; 
                        ////console.log(data.tahun_jangka_mula); 
                        ////console.log(data.tahun_jangka_siap);
                        if(data.tahun_jangka_mula != data.tahun_jangka_siap){
                            var dateDiff=data.tahun_jangka_siap-data.tahun_jangka_mula
                            $("#diffCount").val(dateDiff);
                            // ////console.log(parseInt(data.tahun_jangka_mula)+1)
                            // ////console.log(dateDiff)
                            for(i=0;i<=dateDiff;i++){
                                // ////console.log(i)
                                $("#table_body").append(
                                    '<td class="border-0"><label class=" m-1 col-6 text-white" style="background-color:#39Afd1;">'+(parseInt(data.tahun_jangka_mula)+i)+'</label><input name="yearVal" style="width: 85px !important" class="form-control m-1 col-6 text-center" type="text" id="yearData'+i+'"></td>'
                                )
                            }
                            
                        }else{
                            $("#table_body").append(
                                    ''
                                )
                        }

                        if(data)
                        {
                            document.getElementById('rmk_head').innerText=data.rmk;
                            document.getElementById('tahun_head').innerText=data.tahun;
                            document.getElementById('rujukan_head').innerText=data.no_rujukan;
                            loadOldata(id);
                        }
                        
                    })
                    .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    })
                })

        }else{
            $.Notification.error(result.Message);
        }

        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
    });


    $("#batal_btn").click(function(){
        $('#global_sucess_modal').modal('show');

        $("#tutup-global").click(function(){  
            $('#global_sucess_modal').modal('hide');                  
            UpdateStatus(43);
        })

        $("#close-global").click(function(){                    
            location.reload();
        })
    });

    $("#close_image").click(function(){                    
            location.reload();
    })

    $("#hanter_btn").click(function(){
        UpdateStatus(32);
    });

    $("#bkor_batal_btn").click(function(){
        $('#global_sucess_modal').modal('show');

        $("#tutup-global").click(function(){  
            $('#global_sucess_modal').modal('hide');                  
            UpdateStatus(43);
        })

        $("#close-global").click(function(){                    
            location.reload();
        })
    });

    $("#bkor_hanter_btn").click(function(){
        UpdateStatus(41);
    });


    // Edit Start

    var noc_id=$("#noc_id").val(); 

if(noc_id!=undefined){

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    
    axios({
        method: "get",
        url: api_url+"api/noc/nocPageData/"+noc_id+"",
        // data: formData,
        headers: {"Authorization": api_token },
    })

    .then(function (response) {
        var pageData=response.data.data; console.log(pageData);
        var result=response.data;
        var result2=response.data;
        var result3=response.data;
        var project_data=response.data.result_data;
        var skop_data=response.data.noc_skops; console.log(skop_data);
        var sub_skop_data=response.data.noc_sub_skops; console.log(sub_skop_data);

        loadSkopData(skop_data,sub_skop_data);


        if(project_data)
        {
            ////console.log(document.getElementById('status_head'))
            document.getElementById('status_head').innerText=project_data.statuses.status_name;
        }

        if(pageData)
        {
            setIndicator(pageData);
            localStorage.setItem('noc_status',pageData.status_id);
            loadCheckboxes(pageData.pp_id,noc_id);
            loadOldata(pageData.pp_id);
            $("#pp_id").val(pageData.pp_id)
            //$("#projekID").val(pageData.pp_id)
        }
        
        if(result2.data2){ 

            checkBox7=$("#inlineCheckbox7").prop( "checked", true );
            if(checkBox7){

                $("#wujud_butiran_baharu_form").removeClass("d-none");  
                $("#peluasan_skop_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#pertambahan_kos_form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#perubahan_kpi_form").addClass("d-none");
                $("#perubahan_output_form").addClass("d-none");
                $("#wujud_semula_form").addClass("d-none");
                $("#maklumat_pilih_projek_form").addClass("d-none");
                $("#ActionDiv").removeClass("d-none");

                        document.getElementById("inlineCheckbox1").disabled = true;
                        document.getElementById("inlineCheckbox2").disabled = true;
                        document.getElementById("inlineCheckbox3").disabled = true;
                        document.getElementById("inlineCheckbox4").disabled = true;
                        document.getElementById("inlineCheckbox5").disabled = true;
                        document.getElementById("inlineCheckbox6").disabled = true;
                        document.getElementById("inlineCheckbox8").disabled = true;
                        document.getElementById("inlineCheckbox9").disabled = true;
                        document.getElementById("inlineCheckbox10").disabled = true;
                        document.getElementById("inlineCheckbox11").disabled = true;

                if ($("#inlineCheckbox1").is(':checked')) {
                    $("#inlineCheckbox1").prop('checked', false);
                }  
                if ($("#inlineCheckbox2").is(':checked')) {
                    $("#inlineCheckbox2").prop('checked', false);
                }  
                if ($("#inlineCheckbox3").is(':checked')) {
                    $("#inlineCheckbox3").prop('checked', false);
                }  
                if ($("#inlineCheckbox4").is(':checked')) {
                    $("#inlineCheckbox4").prop('checked', false);
                }  
                if ($("#inlineCheckbox5").is(':checked')) {
                    $("#inlineCheckbox5").prop('checked', false);
                }  
                if ($("#inlineCheckbox6").is(':checked')) {
                    $("#inlineCheckbox6").prop('checked', false);
                }  
                if ($("#inlineCheckbox11").is(':checked')) {
                    $("#inlineCheckbox11").prop('checked', false);
                }  
                if ($("#inlineCheckbox8").is(':checked')) {
                    $("#inlineCheckbox8").prop('checked', false);
                }   
                if ($("#inlineCheckbox9").is(':checked')) {
                    $("#inlineCheckbox9").prop('checked', false);
                }   
                if ($("#inlineCheckbox10").is(':checked')) {
                    $("#inlineCheckbox10").prop('checked', false);
                } 

                 $("#wujudProjekName").val(result2.data2.nama_projek);
                 $("#kod_projek").val(result2.data2.kod_projek);
                 $("#kos_projek").val(result2.data2.kos_projek);
                 $("#keperluan").val(result2.data2.keperluan);
                 $("#justifikasi").val(result2.data2.justifikasi);
                 $("#projekID").val(result2.data2.noc_id);
                  

            }
            else{
                $("#wujud_butiran_baharu_form").addClass("d-none");
                $("#ActionDiv").addClass("d-none");
            }
        }

        if(result3.data3){
            checkBox10=$("#inlineCheckbox10").prop( "checked", true );


            if(checkBox10){
                $("#wujud_semula_form").removeClass("d-none");  
                $("#peluasan_skop_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#pertambahan_kos_form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#perubahan_kpi_form").addClass("d-none");
                $("#perubahan_output_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
                $("#maklumat_pilih_projek_form").addClass("d-none");
                $("#ActionDiv").removeClass("d-none");

                        document.getElementById("inlineCheckbox1").disabled = true;
                        document.getElementById("inlineCheckbox2").disabled = true;
                        document.getElementById("inlineCheckbox3").disabled = true;
                        document.getElementById("inlineCheckbox4").disabled = true;
                        document.getElementById("inlineCheckbox5").disabled = true;
                        document.getElementById("inlineCheckbox6").disabled = true;
                        document.getElementById("inlineCheckbox7").disabled = true;
                        document.getElementById("inlineCheckbox8").disabled = true;
                        document.getElementById("inlineCheckbox9").disabled = true;
                        document.getElementById("inlineCheckbox11").disabled = true;

                if ($("#inlineCheckbox1").is(':checked')) {
                    $("#inlineCheckbox1").prop('checked', false);
                }  
                if ($("#inlineCheckbox2").is(':checked')) {
                    $("#inlineCheckbox2").prop('checked', false);
                }  
                if ($("#inlineCheckbox3").is(':checked')) {
                    $("#inlineCheckbox3").prop('checked', false);
                }  
                if ($("#inlineCheckbox4").is(':checked')) {
                    $("#inlineCheckbox4").prop('checked', false);
                }  
                if ($("#inlineCheckbox5").is(':checked')) {
                    $("#inlineCheckbox5").prop('checked', false);
                }  
                if ($("#inlineCheckbox6").is(':checked')) {
                    $("#inlineCheckbox6").prop('checked', false);
                }  
                if ($("#inlineCheckbox7").is(':checked')) {
                    $("#inlineCheckbox7").prop('checked', false);
                }  
                if ($("#inlineCheckbox8").is(':checked')) {
                    $("#inlineCheckbox8").prop('checked', false);
                }   
                if ($("#inlineCheckbox9").is(':checked')) {
                    $("#inlineCheckbox9").prop('checked', false);
                }   
                if ($("#inlineCheckbox11").is(':checked')) {
                    $("#inlineCheckbox11").prop('checked', false);
                }   
                if(pp_id!=null){
                    $("#selectNameProjek").val(result3.data3.pp_id);
                    $("#radio1").prop('checked', true);
                    $("#selectNameProjek").attr('disabled', false)
                    $("#namaProjek").prop('disabled', true)
                            
                }
                if(result3.data3.nama_projek!=null){
                    $("#namaProjek").val(result3.data3.nama_projek);
                    $("#radio2").prop('checked', true);
                    $("#selectNameProjek").attr('disabled', true)
                    $("#namaProjek").prop('disabled', false)
                }

                 $("#kodProjek").val(result3.data3.kod_projek);
                 $("#kosProjek").val(result3.data3.kos_projek);
                 $("#sKeperluan").val(result3.data3.keperluan);
                 $("#sJustifikasi").val(result3.data3.justifikasi);
                 $("#projekID").val(result3.data3.noc_id);

            }
            else{
                $("#wujud_semula_form").addClass("d-none");
                $("#ActionDiv").addClass("d-none");
            }
                       
        }

        if(pageData){
            var id=pageData.pp_id
            $("#maklumat_pilih_projek_form").removeClass("d-none");
            var options = $('#selectProject option');
            $('#selectProject option:selected').removeAttr('selected');
            var values = $.map(options ,function(option) {
                if(option.value==id){                    
                    var check=$('#selectProject')[0].selectedIndex = $('#selectProject option').toArray().map(jQuery.text).indexOf(option.text);
                    
                    $("#selectProject").prop('disabled', true)
                    document.getElementById("selectProject")[check].setAttribute('selected','selected');
                    var proId= $("#selectProject option:selected").val();
                    $("#proId").val(proId);
                    passProjekId(proId)
                    // checkBox8=$("#inlineCheckbox8").prop( "checked", true );
                    // if(checkBox8){
                        
                    // }

                }
            });
            
        }else{
            $("#maklumat_pilih_projek_form").addClass("d-none");
        }
        
        if(pageData){
            if(pageData.skop!=null){
                checkBox1=$("#inlineCheckbox1").prop( "checked", true );
                
                if(checkBox1){
                    $("#peluasan_skop_form").removeClass("d-none"); 
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                    $("#wujud_butiran_baharu_form").addClass("d-none");
                    $("#ActionDiv").removeClass("d-none");  
                    if(pageData.skop!=null){
                        // $("#skopAsal").text(pageData.skop)
                        // $("#skopOl").addClass("d-none");
                        $("#SkopData").text(pageData.skop)
                    }
                    if(pageData.keterangan){
                        $("#KeteranganData").text(pageData.keterangan)
                        //$("#KeteranganText").text('')
                        // $("#KeteranganText").text(pageData.keterangan)
                    }
                    if(pageData.komponen){
                        $("#KomponenData").text(pageData.komponen)
                        //$("#KomponenText").text('')
                        // $("#KomponenText").text(pageData.komponen)
                    }


                }
                else{
                    $("#peluasan_skop_form").addClass("d-none");
                    $("#SkopData").val('').text('')
                    $("#KeteranganData").val('').text('')
                    $("#KomponenData").val('').text('')
                    $("#ActionDiv").addClass("d-none");
                    // $("#skopOl").removeClass("d-none");

                }
            }
            if(pageData.nama_projek!=null){
                checkBox2=$("#inlineCheckbox2").prop( "checked", true );
                if(checkBox2){
                    $("#Perubahan_Nama_Projek_Form").removeClass("d-none");  
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                    $("#wujud_butiran_baharu_form").addClass("d-none"); 
                    $("#ActionDiv").removeClass("d-none");  
                    if(pageData.nama_projek!=null){
                        $("#projekAsal").text(pageData.nama_projek).val(pageData.nama_projek)
                        $("#nameBaharu").text(pageData.nama_projek).val(pageData.nama_projek)
                    }

                }
                else{
                    $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                    $("#nameBaharu").val('').text('')
                    $("#ActionDiv").addClass("d-none");  

                }

            }
            if(pageData.nama_projek!=null){
                checkBox2=$("#inlineCheckbox2").prop( "checked", true );
                if(checkBox2){
                    $("#Perubahan_Nama_Projek_Form").removeClass("d-none");  
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                    $("#wujud_butiran_baharu_form").addClass("d-none"); 
                    $("#ActionDiv").removeClass("d-none");  

                }
                else{
                    $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                    $("#nameBaharu").val('').text('')
                    $("#ActionDiv").addClass("d-none");  

                }

            }

            if(pageData.kod_projek!=null ){
                checkBox3=$("#inlineCheckbox3").prop( "checked", true );
                if(checkBox3){
                    $("#perubahan_kod_projek_form").removeClass("d-none"); 
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                    $("#wujud_butiran_baharu_form").addClass("d-none"); 
                    $("#ActionDiv").removeClass("d-none"); 
                    
                    if(pageData.kod_projek!=null){
                    
                    $.each(result, function (key, item) {
                        ////console.log(item)
                    var id_projek=$("#proId").val();
                            // ////console.log(id)

                            ////console.log(item.id)
                            if(id_projek==item.pp_id){
                                // ////console.log(item.kod_projeck)
                                // return;
                                var value2=[];
                                var value3=[];
                                var value4=[];
                                var word=item.kod_projek.split(/[\W\d]+/).join("")
                                $("#valueOne").val(word)
                                var num=item.kod_projek.split(/[^\d]+/).join("");
                                $("#valueFour").val(num.substr(-3))
                                function splitNum(num) {
                                    return String(num).split("").map(Number);
                                }
                                var splitedNumber=splitNum(num)
                                for(i=0;i<splitedNumber.length-7;i++){
                                    value2.push(splitedNumber[i])
                                }
                                for(i=7;i<11;i++){
                                    value3.push(splitedNumber[i])
                                }
                                $("#valueThree").val(value3.join(''))
                                $("#valueTwo").val(value2.join(''))
                            }
                        })

                }

                }
                else{
                    $("#perubahan_kod_projek_form").addClass("d-none");
                    $("#valueOne").val('').text('');
                    $("#valueTwo").val('').text('');
                    $("#valueThree").val('').text('');
                    $("#valueFour").val('').text('');
                    $("#ActionDiv").addClass("d-none");  

                }

            }

            if(pageData.kos_projek!=null){
                checkBox4=$("#inlineCheckbox4").prop( "checked", true );
                if(checkBox4){
                    $("#pertambahan_kos_form").removeClass("d-none"); 
                    $("#inlineCheckbox10").prop('checked', false);
                        $("#inlineCheckbox7").prop('checked', false); 
                        $("#wujud_semula_form").addClass("d-none");
                    $("#wujud_butiran_baharu_form").addClass("d-none");  
                    $("#ActionDiv").removeClass("d-none"); 
                    if(pageData.kos_projek!=null){
                    $("#kosValue").val(pageData.kos_projek).text(pageData.kos_projek)

                    } 

                }
                else{
                    $("#pertambahan_kos_form").addClass("d-none");
                    $("#kosValue").val('').text('');
                    $("#ActionDiv").addClass("d-none");  

                }

            }

            if(pageData.objektif!=null){
                checkBox6=$("#inlineCheckbox6").prop( "checked", true );
                if(checkBox6){
                    $("#perubahan_objektif_form").removeClass("d-none");
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                    $("#wujud_butiran_baharu_form").addClass("d-none"); 
                    $("#ActionDiv").removeClass("d-none"); 
                    if(pageData.objektif!=null){
                        // $("#objekifText").text('')
                        // $("#objekifText").text(pageData.objektif)
                        $("#objektifVal").text(pageData.objektif)

                    }
                    

                }
                else{
                    $("#perubahan_objektif_form").addClass("d-none");
                    $("#objektifVal").val('').text('')
                    $("#ActionDiv").addClass("d-none");  

                }

            }
        }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
    })

}
else
{
    document.getElementById('daftar_status').classList.add("yellow");

}


    function setIndicator(data){
         ////console.log(data.status_id);
         if(data.status_id==40)
         {
            document.getElementById('daftar_status').classList.add("yellow");
         }
         else if(data.status_id==32)
         {
            document.getElementById('dalam_status').classList.add("yellow");
         }
         else if(data.status_id==41)
         {
            document.getElementById('kementerian_status').classList.add("yellow");
         }
         else if(data.status_id==42)
         {
            document.getElementById('epu_status').classList.add("yellow");
         }
         else
         {

        }
    }

    function loadCheckboxes(pp_id,noc_id){

        axios({
                method: "get",
                url: api_url+"api/noc/get-checkbox-statuses/"+pp_id+"/"+noc_id,
                // data: formData,
                headers: {"Authorization": api_token },
            })
            .then(function (response) { 

                var checkeddata = response.data.data; console.log(checkeddata)

                if(checkeddata)
                {
                    if(checkeddata.skop_status==1)
                    {
                        $("#inlineCheckbox1").prop( "checked", true );
                    }
                    if(checkeddata.nama_status==1)
                    {
                        $("#inlineCheckbox2").prop( "checked", true );
                    }   
                    if(checkeddata.kod_status==1)
                    {
                        $("#inlineCheckbox3").prop( "checked", true );
                    }
                    if(checkeddata.kos_status==1)
                    {
                        $("#inlineCheckbox4").prop( "checked", true );
                    }
                    console.log(checkeddata.lokasi_status);
                    if(checkeddata.lokasi_status==1)
                    { 
                        $("#inlineCheckbox5").prop( "checked", true );
                    }
                    if(checkeddata.objectif_status==1)
                    {
                        $("#inlineCheckbox6").prop( "checked", true );
                    }
                    if(checkeddata.butiran_status==1)
                    {
                        $("#inlineCheckbox7").prop( "checked", true );
                    }   
                    if(checkeddata.kpi_status==1)
                    {
                        $("#inlineCheckbox8").prop( "checked", true );
                    }
                    if(checkeddata.output_status==1)
                    {
                        $("#inlineCheckbox9").prop( "checked", true );
                    }
                    if(checkeddata.semula_status==1)
                    {
                        $("#inlineCheckbox10").prop( "checked", true );
                    }
                    if(checkeddata.outcome_status==1)
                    {
                        $("#inlineCheckbox11").prop( "checked", true );
                    }
                }

            });

    }

    function loadOldata(id)
    {
        //////console.log("old data loaded");
        //////console.log(data.pp_id);
        axios({
                method: "get",
                url: api_url+"api/noc/get-old-project-details/"+id+"",
                // data: formData,
                headers: {"Authorization": api_token },
            })
            .then(function (response) { ////console.log('project data old');

                var project_skope = response.data.data.skop; 
                var project_type  = response.data.data.type;  ////console.log(project_type);
                var project_objectif = response.data.data.objectif; 
                var project_obj_type  = response.data.data.obj_type;  ////console.log(project_obj_type);
                var project_output = response.data.data.output; 
                var project_output_type  = response.data.data.output_type;  ////console.log(project_output_type);
                var project_outcome = response.data.data.outcome; 
                var project_outcome_type  = response.data.data.outcome_type;  ////console.log(project_outcome_type);
                var project_data = response.data.data.project_data; ////console.log(project_data);
                var project_skop_cmp = response.data.data.skop_cmp; ////console.log(project_data);


                if(project_data)
                {
                    var kod_projeck=document.querySelectorAll("[id='kod_projeck']");////console.log(kod_projeck);
                    for (var i = 0; i < kod_projeck.length; ++i) {
                        kod_projeck[i].innerText = project_data.kod_projeck;
                    }

                    document.getElementById('kos_projeck').innerText = project_data.kos_projeck;
                    document.getElementById('projekAsal').value = project_data.nama_projek;
                    document.getElementById('nama_projek_butiran').innerText = project_data.nama_projek;
                    document.getElementById('kodAsal').value = project_data.kod_projeck;
                    document.getElementById('tahunAsal').innerText = project_data.tahun;
                    document.getElementById('bahagianAsal').value = project_data.bahagian_pemilik.nama_bahagian;
                    document.getElementById('rmkAsal').value = project_data.rmk.name;
                    document.getElementById('Butiran_Asal').innerText = project_data.butiran_code;
                    $("#kod_projek_new").val(project_data.kod_projeck);
                    document.getElementById("kod_projek_new").disabled = true;

                }

                if(project_skope)
                {
                    let li_data='';
                    var list = document.getElementById("skopAsal");
                    while (list.firstChild) {
                        list.removeChild(list.firstChild);
                    }

                    $.each(project_skope, function (key, item) { 

                        if(project_type=='pemantauan')
                        {
                            ////console.log(item.pemantauanskop_options.skop_name);
                            li_data= `<li>`+item.pemantauanskop_options.skop_name+`</li>`;
                        }
                        else
                        {
                            ////console.log(item.skop_selepas)
                            li_data= `<li>`+item.skop_selepas+`</li>`;
                        }

                        $('#skopAsal').append(li_data);
                    });
                }

                if(project_skop_cmp)
                {
                    let li_data='';
                    var list = document.getElementById("KomponenText");
                    while (list.firstChild) {
                        list.removeChild(list.firstChild);
                    }
                    $.each(project_skop_cmp, function (key, item) { 
                                li_data= `<li>`+item.nama_componen+`</li>`;

                                $('#KomponenText').append(li_data);
                    });
                }

                if(project_objectif)
                {
                    var list = document.getElementById("objekifText");
                    while (list.firstChild) {
                        list.removeChild(list.firstChild);
                    }
                    $.each(project_objectif, function (key, item) {////console.log(item)
                        if(project_obj_type=='pemantauan')
                        {
                            $('#objekifText').append(item.objektif);

                        }
                        else
                        {
                            $("#objekifText").text(item.objecktif_selepas)
                        }
                    });
                }

                if(project_output)
                {
                    let li_data='';

                    var tableBody = document.querySelector("#old_output_table");
                    while (tableBody.firstChild) {
                        tableBody.removeChild(tableBody.firstChild);
                    }
                    
                    $.each(project_output, function (key, item) { 
                        if(project_output_type=='pemantauan')
                        {
                            li_data= `<tr>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Output Projek</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                        <textarea class="form-control" disabled>`+item.output_proj+`</textarea>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Kuantiti/Bilangan</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input class="form-control" type="text" disabled value="`+item.Kuantiti+`">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Unit</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <select class="form-control" disabled name="" id="">
                                        <option value="">
                                        `+item.nama_unit+`
                                        </option>
                                      </select>
                                    </td>
                                  </tr>`;
                        }
                        else
                        {
                            li_data= `<tr>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Output Projek</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                        <textarea class="form-control" disabled>`+item.output_selepas+`</textarea>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Kuantiti/Bilangan</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input class="form-control" type="text" disabled value="`+item.quantity_selepas+`">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Unit</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <select class="form-control" name="" disabled id="">
                                        <option value="">
                                        `+item.unit.nama_unit+`
                                        </option>
                                      </select>
                                    </td>
                                  </tr>`;
                        }
                        $('#old_output_table').append(li_data);
                    });

                }

                if(project_outcome)
                {
                    let li_data='';

                    var tableBody = document.querySelector("#old_outcome_table");
                    while (tableBody.firstChild) {
                        tableBody.removeChild(tableBody.firstChild);
                    }

                    $.each(project_outcome, function (key, item) { 
                        if(project_outcome_type=='pemantauan')
                        {
                            li_data= `<tr>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Output Projek</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                        <textarea class="form-control" disabled>`+item.Projek_Outcome+`</textarea>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Kuantiti/Bilangan</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input class="form-control" type="text" disabled value="`+item.Kuantiti+`">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Unit</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <select class="form-control" disabled name="" id="">
                                        <option value="">
                                        `+item.nama_unit+`
                                        </option>
                                      </select>
                                    </td>
                                  </tr>`;
                        }
                        else
                        {
                            li_data= `<tr>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Output Projek</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                        <textarea class="form-control" disabled>`+item.outcome_selepas+`</textarea>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Kuantiti/Bilangan</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <input class="form-control" type="text" disabled value="`+item.quantity_selepas+`">
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <label for="">Unit</label>
                                    </td>
                                    <td class="NOCtblKodprojek">
                                      <select class="form-control" disabled name="" id="">
                                        <option value="">
                                        `+item.unit.nama_unit+`
                                        </option>
                                      </select>
                                    </td>
                                  </tr>`;
                        }
                        $('#old_outcome_table').append(li_data);
                    });

                }

            });
    }

    function DisableButtons()
    {
        $("#ActionDiv").addClass("d-none");  

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].disabled = true;
            }
            
        var select = document.querySelectorAll('select'); ////console.log(select);
            for (var j = 0; j < select.length; j++) {
                select[j].disabled = true;
            }

        var input_field = document.querySelectorAll('input[type="text"]'); ////console.log(input_field);
            for (var k = 0; k < input_field.length; k++) {
                input_field[k].disabled = true;
            }

        var btn = document.querySelectorAll('input[type="button"]'); ////console.log(btn);
            for (var l = 0; l < btn.length; l++) {
                btn[l].disabled = true;
            }

        var images = document.querySelectorAll('img'); ////console.log(images);

            // Loop through each image and disable it
            for (var m = 0; m < images.length; m++) {
                images[m].style.pointerEvents = 'none';
            }

        var textarea = document.querySelectorAll('textarea'); ////console.log(textarea);

            // Loop through each image and disable it
            for (var n = 0; n < textarea.length; n++) {
                textarea[n].disabled = true;
            }

        var noc_status = localStorage.getItem('noc_status');

        if({{$user}}==4)
        {
            if(noc_status==32)
            {
                $("#BKORDIV").removeClass("d-none");  
            }
            else
            {
                $("#BKORDIV").addClass("d-none");  
            }
        }
        else
        {
            $("#BKORDIV").addClass("d-none");  
        }

    }
    

    function passProjekId(proId){

        axios({
        method: 'get',
        url: api_url+"api/noc/projectData/"+proId, 
        headers: {"Authorization": api_token },

    })
    .then(function (response) { 
        // ////console.log(response);
        $("#table_body").empty();
        data = response.data.data; 
        ////console.log(data.tahun_jangka_mula); 
        ////console.log(data.tahun_jangka_siap);
        if(data.tahun_jangka_mula != data.tahun_jangka_siap){
            var dateDiff=data.tahun_jangka_siap-data.tahun_jangka_mula
            $("#diffCount").val(dateDiff);
            // ////console.log(parseInt(data.tahun_jangka_mula)+1)
            // ////console.log(dateDiff)
            for(i=0;i<=dateDiff;i++){
                // //console.log(i)
                $("#table_body").append(
                    '<td class="border-0"><label class=" m-1 col-6 text-white" style="background-color:#39Afd1;">'+(parseInt(data.tahun_jangka_mula)+i)+'</label><input name="yearVal" style="width: 85px !important" class="form-control m-1 col-6 text-center" type="text" id="yearData'+i+'"></td>'
                )
            }
            
        }else{
            $("#table_body").append(
                    ''
                )
        }

        if(data)
        {
            document.getElementById('rmk_head').innerText=data.rmk;
            document.getElementById('tahun_head').innerText=data.tahun;
            document.getElementById('rujukan_head').innerText=data.no_rujukan;
            loadOldata(proId);
        }
        
    })
    .catch(function (error) {
        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
    })

            axios({
                method: "get",
                url: api_url+"api/noc/nocKpiData/"+noc_id+"",
                // data: formData,
                headers: {"Authorization": api_token },
            })

            .then(function (response) {
                //console.log(response.data.data)
                var data=response.data.data
                //console.log(data)
                if(data){

                    if(data.yr_1!=null){
                        $("#yearData0").val(data.yr_1)
                    }
                    if(data.yr_2!=null){
                        $("#yearData1").val(data.yr_2)
                    }
                    if(data.yr_3!=null){
                        $("#yearData2").val(data.yr_3)
                    }   
                    if(data.yr_4!=null){
                        $("#yearData3").val(data.yr_4)
                    }
                    if(data.yr_5!=null){
                        $("#yearData4").val(data.yr_5)
                    }
                    if(data.yr_6!=null){
                        $("#yearData5").val(data.yr_6)
                    }
                    if(data.yr_7!=null){
                        $("#yearData6").val(data.yr_7)
                    }
                    if(data.yr_8!=null){
                        $("#yearData7").val(data.yr_8)

                    }
                    if(data.yr_9!=null){
                        $("#yearData8").val(data.yr_9)

                    }
                    if(data.yr_10!=null){
                        $("#yearData9").val(data.yr_10)

                    }

                    

                if(data.kuantiti!=null){
                    $("#kb").text(data.kuantiti).val(data.kuantiti);
                    checkBox8=$("#inlineCheckbox8").prop( "checked", true );
                    if(checkBox8){
                        $("#perubahan_kpi_form").removeClass("d-none");  
                        $("#inlineCheckbox10").prop('checked', false);
                        $("#inlineCheckbox7").prop('checked', false); 
                        $("#wujud_semula_form").addClass("d-none");
                        $("#wujud_butiran_baharu_form").addClass("d-none");
                        $("#ActionDiv").removeClass("d-none"); 

                        
                    }
                    else{
                        $("#perubahan_kpi_form").addClass("d-none");
                        $("#kb").val('').text('');
                        $("#unit").val('').text('');
                        $("#PeneranganText").val('').text('');
                        for(i=0;i<9;i++){
                            $("#yearData"+i+"").val('');
                        }
                        $("#ActionDiv").addClass("d-none");  

                    }
                    
                }
                if(data.unit!=null){
                    axios({
                    method: "get",        
                    url: api_url+"api/project/unit-details",
                    // dataType: 'json',
                    headers: {"Authorization": api_token },

                    }).then(function (response) { 
                        // //console.log(response.data.data)
                        var result=response.data;
                        if (result) {
                                $.each(result.data, function (key, item) {
                                    // //console.log(item.id)
                                    var opt = item.id;
                                    var element = document.createElement("option");
                                        element.textContent = item.nama_unit;
                                        element.value = opt;
                                        unit.append(element);
                                        // //console.log(opt)
                                        if(opt==data.unit){
                                            $('#unit option[value="'+data.unit+'"]').attr("selected", "selected");
                                        }
                                })
                            }

                            var noc_status = localStorage.getItem('noc_status');
                            if(noc_status !=40)
                            {
                                DisableButtons();
                            }
                        })

                }
                if(data.kuantiti!=null){
                    $("#PeneranganText").text(data.penerangan).val(data.penerangan);
                }
                }
            })

            axios({
                method: 'get',
                url: api_url+"api/noc/NocOutputData/"+proId+"/"+noc_id, 
                headers: {"Authorization": api_token },

            })
            .then(function (response) { 
                OutPutResult=response.data.data
                //console.log(OutPutResult)
                if(OutPutResult.length>0){
                        checkBox9=$("#inlineCheckbox9").prop( "checked", true );
                        if(checkBox9){
                            $("#perubahan_output_form").removeClass("d-none"); 
                            $("#inlineCheckbox10").prop('checked', false);
                            $("#inlineCheckbox7").prop('checked', false); 
                            $("#ActionDiv").removeClass("d-none"); 

                        }
                        else{
                            $("#perubahan_output_form").addClass("d-none");
                            $(".countTr").remove()  
                            $("#ActionDiv").addClass("d-none");  

                        }
                        var idData=[];  
                        for(i=0;i<OutPutResult.length;i++){
                            // //console.log(i)
                            $("#outputBody").append(tdData)  
                            var trElements = document.querySelectorAll('.countTr');
                            var outputTextAreaElements = document.querySelectorAll('.outputTextArea');
                            var outputQuantityElements = document.querySelectorAll('.outputQuantity');
                            var outputUnitElements = document.querySelectorAll('.outputUnit');
                            var output_minus=document.querySelectorAll('.output_minus');
                            var firstTd=document.querySelectorAll('.firstTd');

                                // //console.log(i)
                                trElements[i].id="countTr-"+i+""
                                outputTextAreaElements[i].id="outputTextAreaElements-"+i+""
                                outputQuantityElements[i].id="outputQuantityElements-"+i+""
                                outputUnitElements[i].id="outputUnitElements-"+i+""
                                output_minus[i].id="output_minus-"+i+""
                                firstTd[i].id="firstTd-"+i+"";
                                $("#output_minus-"+i+"").val(i);
                                if(i>0){
                                    $("#firstTd-"+i+"").addClass("d-none")
                                }
                                // updateid.push(OutPutResult[i].id);

                                $("#outputTextAreaElements-"+i+"").val(OutPutResult[i].output_proj)
                                $("#outputQuantityElements-"+i+"").val(OutPutResult[i].Kuantiti)
                                idData.push(OutPutResult[i].unit_id)
                                
                                unitData("outputUnitElements-"+i+"",idData)
                            }       
                    }
                    function unitData(units,id){
                                //console.log(id)
                            axios({
                                method: "get",        
                                url: api_url+"api/project/unit-details",
                                // dataType: 'json',
                                headers: {"Authorization": api_token },

                            }).then(function (response) { 
                                // //console.log(response.data.data)
                                var result=response.data;
                                if (result) {
                                        $.each(result.data, function (key, item) {
                                            //console.log(item)
                                            var opt = item.id;
                                            var element = document.createElement("option");
                                                element.textContent = item.nama_unit;
                                                element.value = opt;
                                                $("#"+units+"").append(element);
                                        })
                                        for(i=0;i<id.length;i++){
                                            $('#'+units+' option[value='+id[i]+']').attr("selected", "selected");
                                        }
                                    }
                                })
                            }

            })

            axios({
                method: 'get',
                url: api_url+"api/noc/NocOutcomeData/"+proId+"/"+noc_id, 
                headers: {"Authorization": api_token },

            })
            .then(function (response) { 
                OutComeResult=response.data.data
                //console.log(OutComeResult)
                
                if(OutComeResult.length>0){
                        checkBox11=$("#inlineCheckbox11").prop( "checked", true );
                        if(checkBox11){
                            $("#outCome_projek_form").removeClass("d-none");   
                            $("#inlineCheckbox10").prop('checked', false);
                            $("#inlineCheckbox7").prop('checked', false);  
                            $("#wujud_semula_form").addClass("d-none");
                            $("#wujud_butiran_baharu_form").addClass("d-none");
                            $("#ActionDiv").removeClass("d-none"); 
                        }
                        else{
                            $("#outCome_projek_form").addClass("d-none");
                            $(".outcomecountTr").remove()    
                            $("#ActionDiv").addClass("d-none");  

                        }
                        for(j=0;j<OutComeResult.length;j++){
                            $("#outcomeBody").append(tdData2)   
                            var trElements1 = document.querySelectorAll('.outcomecountTr');
                            var outcomeTextAreaElements = document.querySelectorAll('.outcomeTextArea');
                            var outcomeQuantityElements = document.querySelectorAll('.outcomeQuantity');
                            var outcomeUnitElements = document.querySelectorAll('.outcomeUnit');
                            var outcome_minus=document.querySelectorAll('.outcome_minus');
                            var outcomefirstTd=document.querySelectorAll('.outcomefirstTd');

                                // //console.log(i)
                                trElements1[j].id="countOutcomeTr-"+j+""
                                outcomeTextAreaElements[j].id="outcomeTextAreaElements-"+j+""
                                outcomeQuantityElements[j].id="outcomeQuantityElements-"+j+""
                                outcomeUnitElements[j].id="outcomeUnitElements-"+j+""
                                outcome_minus[j].id="outcome_minus-"+j+""
                                outcomefirstTd[j].id="outcomefirstTd-"+j+"";
                                $("#outcome_minus-"+j+"").val(j);
                                if(j>0){
                                    $("#outcomefirstTd-"+j+"").addClass("d-none")
                                }
                                $("#outcomeTextAreaElements-"+j+"").val(OutComeResult[j].Projek_Outcome)
                                $("#outcomeQuantityElements-"+j+"").val(OutComeResult[j].Kuantiti)
                                $('#outcomeUnitElements-'+j+' option[value="'+OutComeResult[j].unit_id+'"]').attr("selected", "selected");

                            
                        }
                }
            })

            var noc_status = localStorage.getItem('noc_status');
                            if(noc_status !=40)
                            {
                                DisableButtons();
                            }
        

    }





    
    // Edit Ends 
    
    

    
    function whichForm(checkbox){
        //console.log(checkbox)
        //console.log(checkbox.id)

        if ($("#inlineCheckbox1").is(':checked') ||$("#inlineCheckbox2").is(':checked')||$("#inlineCheckbox3").is(':checked')||$("#inlineCheckbox4").is(':checked')||$("#inlineCheckbox5").is(':checked')||$("#inlineCheckbox6").is(':checked')||$("#inlineCheckbox8").is(':checked')||$("#inlineCheckbox9").is(':checked')||$("#inlineCheckbox11").is(':checked')) {
            $("#maklumat_pilih_projek_form").removeClass("d-none");
            $("#ActionDiv").removeClass("d-none");
        }
        else{
            $("#maklumat_pilih_projek_form").addClass("d-none");
            $("#ActionDiv").addClass("d-none");
        }
        if(checkbox.id=='inlineCheckbox1'){
            if(checkbox.checked == true){
                $("#peluasan_skop_form").removeClass("d-none"); 
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
            }
            else{
                $("#peluasan_skop_form").addClass("d-none");
                $("#SkopData").val('').text('')
            $("#KeteranganData").val('').text('')
            $("#KomponenData").val('').text('')
            }
        }
        if(checkbox.id=='inlineCheckbox2'){
            if(checkbox.checked == true){
                $("#Perubahan_Nama_Projek_Form").removeClass("d-none");  
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");             
            }
            else{
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#nameBaharu").val('').text('')
            }
        }
        if(checkbox.id=='inlineCheckbox3'){
            if(checkbox.checked == true){
                $("#perubahan_kod_projek_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");              
            }
            else{
                $("#perubahan_kod_projek_form").addClass("d-none");
                $("#valueOne").val('').text('');
                $("#valueTwo").val('').text('');
                $("#valueThree").val('').text('');
                $("#valueFour").val('').text('');
            }
        }
        if(checkbox.id=='inlineCheckbox4'){
            if(checkbox.checked == true){
                $("#pertambahan_kos_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");              
            }
            else{
                $("#pertambahan_kos_form").addClass("d-none");
                $("#kosValue").val('').text('');
            }
        }
        if(checkbox.id=='inlineCheckbox5'){
            if(checkbox.checked == true){
                get_noc_pem_negeri();
                $("#maklumat_lokasi_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");              
            }
            else{
                $("#maklumat_lokasi_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox6'){
            if(checkbox.checked == true){
                $("#perubahan_objektif_form").removeClass("d-none");
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");               
            }
            else{
                $("#perubahan_objektif_form").addClass("d-none");
                $("#objektifVal").val('').text('')
            }
        }
        if(checkbox.id=='inlineCheckbox7'){
            $("#butiran_text").removeClass('d-none');
            $("#semasa_text").addClass('d-none');

            $('#popup_sucess_modal').modal('show');
                    if(checkbox.checked == true){
                        $("#wujud_butiran_baharu_form").removeClass("d-none");  
                        $("#peluasan_skop_form").addClass("d-none");
                        $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                        $("#maklumat_lokasi_form").addClass("d-none");
                        $("#pertambahan_kos_form").addClass("d-none");
                        $("#maklumat_lokasi_form").addClass("d-none");
                        $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                        $("#perubahan_kpi_form").addClass("d-none");
                        $("#perubahan_output_form").addClass("d-none");
                        $("#wujud_semula_form").addClass("d-none");
                        $("#maklumat_pilih_projek_form").addClass("d-none");
                        $("#ActionDiv").removeClass("d-none");
                        
                        $("#perubahan_kod_projek_form").addClass("d-none");
                        $("#perubahan_objektif_form").addClass("d-none");
                        $("#outCome_projek_form").addClass("d-none");
                        

                        if ($("#inlineCheckbox1").is(':checked')) {
                            $("#inlineCheckbox1").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox2").is(':checked')) {
                            $("#inlineCheckbox2").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox3").is(':checked')) {
                            $("#inlineCheckbox3").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox4").is(':checked')) {
                            $("#inlineCheckbox4").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox5").is(':checked')) {
                            $("#inlineCheckbox5").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox6").is(':checked')) {
                            $("#inlineCheckbox6").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox11").is(':checked')) {
                            $("#inlineCheckbox11").prop('checked', false);
                        }  
                        if ($("#inlineCheckbox8").is(':checked')) {
                            $("#inlineCheckbox8").prop('checked', false);
                        }   
                        if ($("#inlineCheckbox9").is(':checked')) {
                            $("#inlineCheckbox9").prop('checked', false);
                        }   
                        if ($("#inlineCheckbox10").is(':checked')) {
                            $("#inlineCheckbox10").prop('checked', false);
                        } 
                    
                    }
                    else{
                        $("#wujud_butiran_baharu_form").addClass("d-none");
                        $("#ActionDiv").addClass("d-none");
                    }   

                    $(".tutup-global").click(function(){
                        $('#popup_sucess_modal').modal('hide');
                    });

                    $(".close-global").click(function(){
                        location.reload();
                    });
        }
        if(checkbox.id=='inlineCheckbox8'){
            if(checkbox.checked == true){
                $("#perubahan_kpi_form").removeClass("d-none");  
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
                axios({
                    method: "get",        
                    url: api_url+"api/project/unit-details",
                    // dataType: 'json',
                    headers: {"Authorization": api_token },

                }).then(function (response) { 
                    // //console.log(response.data.data)
                    var result=response.data;
                    if (result) {
                            $.each(result.data, function (key, item) {
                                // //console.log(item.id)
                                var opt = item.id;
                                var element = document.createElement("option");
                                    element.textContent = item.nama_unit;
                                    element.value = opt;
                                    unit.append(element);
                                    // outputUnit.appendChild(element);
                            })
                        }
                    })
             
            }
            else{
                $("#perubahan_kpi_form").addClass("d-none");
                $("#kb").val('').text('');
                $("#unit").val('').text('');
                $("#PeneranganText").val('').text('');
                for(i=0;i<9;i++){
                    $("#yearData"+i+"").val('');
                }

            }
        }
        if(checkbox.id=='inlineCheckbox9'){
            if(checkbox.checked == true){
                $("#perubahan_output_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                $("#inlineCheckbox7").prop('checked', false); 
                $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");


                $("#outputBody").append(tdData)  
                axios({
                    method: "get",        
                    url: api_url+"api/project/unit-details",
                    // dataType: 'json',
                    headers: {"Authorization": api_token },

                }).then(function (response) { 
                    // //console.log(response.data.data)
                    var result=response.data;
                    if (result) {
                            $.each(result.data, function (key, item) {
                                // //console.log(item.id)
                                var opt = item.id;
                                var element = document.createElement("option");
                                    element.textContent = item.nama_unit;
                                    element.value = opt;
                                    $("#outputUnitElements-0").append(element);
                                    // outputUnit.appendChild(element);
                            })
                        }
                    })            
            }
            else{
                $("#perubahan_output_form").addClass("d-none");
                $(".countTr").remove()  

            }
        }
        if(checkbox.id=='inlineCheckbox10'){

            $("#butiran_text").addClass('d-none');
            $("#semasa_text").removeClass('d-none');

            //$('#popup_sucess_modal').modal('show');
                    // if(checkbox.checked == true){
                         $("#wujud_semula_form").removeClass("d-none");  
                    //     $("#peluasan_skop_form").addClass("d-none");
                    //     $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                    //     $("#maklumat_lokasi_form").addClass("d-none");
                    //     $("#pertambahan_kos_form").addClass("d-none");
                    //     $("#maklumat_lokasi_form").addClass("d-none");
                    //     $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                    //     $("#perubahan_kpi_form").addClass("d-none");
                    //     $("#perubahan_output_form").addClass("d-none");
                    //     $("#wujud_butiran_baharu_form").addClass("d-none");
                    //     $("#maklumat_pilih_projek_form").addClass("d-none");
                    //     $("#ActionDiv").removeClass("d-none");

                    //     $("#perubahan_kod_projek_form").addClass("d-none");
                    //     $("#perubahan_objektif_form").addClass("d-none");
                    //     $("#outCome_projek_form").addClass("d-none");

                    //     if ($("#inlineCheckbox1").is(':checked')) {
                    //         $("#inlineCheckbox1").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox2").is(':checked')) {
                    //         $("#inlineCheckbox2").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox3").is(':checked')) {
                    //         $("#inlineCheckbox3").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox4").is(':checked')) {
                    //         $("#inlineCheckbox4").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox5").is(':checked')) {
                    //         $("#inlineCheckbox5").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox6").is(':checked')) {
                    //         $("#inlineCheckbox6").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox7").is(':checked')) {
                    //         $("#inlineCheckbox7").prop('checked', false);
                    //     }  
                    //     if ($("#inlineCheckbox8").is(':checked')) {
                    //         $("#inlineCheckbox8").prop('checked', false);
                    //     }   
                    //     if ($("#inlineCheckbox9").is(':checked')) {
                    //         $("#inlineCheckbox9").prop('checked', false);
                    //     }   
                    //     if ($("#inlineCheckbox11").is(':checked')) {
                    //         $("#inlineCheckbox11").prop('checked', false);
                    //     }   
                    // }
                    // else{
                    //     $("#wujud_semula_form").addClass("d-none");
                    //     $("#ActionDiv").addClass("d-none");
                    // }

                    // $(".tutup-global").click(function(){
                    //     $('#popup_sucess_modal').modal('hide');
                    // });

                    // $(".close-global").click(function(){
                    //     location.reload();
                    // });
        }
        if(checkbox.id=='inlineCheckbox11'){
            if(checkbox.checked == true){
                $("#outCome_projek_form").removeClass("d-none");   
                $("#inlineCheckbox10").prop('checked', false);
                $("#inlineCheckbox7").prop('checked', false);  
                $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
                $("#outcomeBody").append(tdData2)  
                axios({
                    method: "get",        
                    url: api_url+"api/project/unit-details",
                    // dataType: 'json',
                    headers: {"Authorization": api_token },

                }).then(function (response) { 
                    // //console.log(response.data.data)
                    var result=response.data;
                    if (result) {
                            $.each(result.data, function (key, item) {
                                // //console.log(item.id)
                                var opt = item.id;
                                var element = document.createElement("option");
                                    element.textContent = item.nama_unit;
                                    element.value = opt;
                                    $("#outcomeUnitElements-0").append(element);
                                    // outputUnit.appendChild(element);
                            })
                        }
                    })    



            }
            else{
                $("#outCome_projek_form").addClass("d-none");
                $(".outcomecountTr").remove()  

            }
        }

        var noc_status = localStorage.getItem('noc_status');
                            if(noc_status !=40)
                            {
                                DisableButtons();
                            }
        
        
    }

    // $(".addBtn").click(function(){
    //     $("#exampleModal2").modal('show')
    // })
    function showModal(){
        $("#exampleModal2").modal('show');
        setnegeri();
    }

function changeRadio(radio){
    // //console.log(radio.value)
    if(radio.value==1){
        $("#selectNameProjek").attr('disabled', false)
        $("#namaProjek").prop('disabled', true)

    }
    if(radio.value==2){
        $("#selectNameProjek").attr('disabled', true)
        $("#namaProjek").prop('disabled', false)
    
    }

}

var radio1=$("#radio1").is(":checked")
var radio2=$("#radio2").is(":checked")
if(radio1){
        $("#selectNameProjek").attr('disabled', false)
        $("#namaProjek").prop('disabled', true)

    }
    if(radio2){
        $("#selectNameProjek").attr('disabled', true)
        $("#namaProjek").prop('disabled', false)
    
    }

    function UpdateStatus(status)
    {
         var id=$("#noc_id").val();
         var formData = new FormData();
                formData.append('id', id);
                formData.append('user_id', {{Auth::user()->id}});
                formData.append('status', status);

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                
         axios({
                    method: "post",
                    url: api_url+"api/noc/status-update",
                    data: formData,
                    headers: {"Authorization": api_token },
                })
                .then(function (response) {

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                    $('#add_role_sucess_modal').modal('show');
                        $("#tutup").click(function(){                    
                                window.location.href = "/Kertas_Permohonan_NOC";
                        })

                });
    }



    function FormSubmit(){

        var skops = document.querySelectorAll(".skop_parent_list"); console.log(skops)
        var skop_kos = document.querySelectorAll(".skop_kos"); console.log(skop_kos)
        var skop_list = [];
        for (var i = 0; i < skops.length; i++) { 
           data= {};
           data.id=skops[i].value;
           data.sub_id='';
           data.user_id= {{Auth::user()->id}};
           if(isNaN(removecomma(skop_kos[i].value))){
                data.kos='0.00';
            }
            else{
                data.kos = removecomma(skop_kos[i].value)
            }
           skop_list.push(JSON.stringify(data))
        }
        var sub_skops = document.querySelectorAll(".sub_skop_parent_list"); console.log(sub_skops)
        var parent_skop_id = document.querySelectorAll("#parent_skop_id"); console.log(parent_skop_id)
        var sub_skop_list = [];
        for (var j = 0; j < sub_skops.length; j++) { 
           data_sub= {};
           data_sub.id=parent_skop_id[j].value;
           data_sub.sub_id=sub_skops[j].value;
           data_sub.kos='0.00';
           data_sub.user_id= {{Auth::user()->id}};
           sub_skop_list.push(JSON.stringify(data_sub))
        }

        var checkboxes = document.querySelectorAll(".myCheckbox");
        var checkboxData=[];
        // checkboxes.forEach(function(checkbox) {
        //     var checkboxId = checkbox.id;
        //     var value = checkbox.checked ? "1" : "0";
        //     checkboxData.push(`{"`+checkboxId+ `" : "`+value+ `"}`);
        // });
        
        var formData = new FormData();
        var formDataKpi= new FormData();
        var kb= $("#kb").val()
        var unit=$("#unit").val()
        // alert(unit)
        var PeneranganText=$("#PeneranganText").val()
        var SkopData=$("#SkopData").val()
        var KeteranganData=$("#KeteranganData").val()
        var KomponenData=$("#KomponenData").val()
        var nameBaharu=$("#nameBaharu").val()
        var valueOne=$("#valueOne").val()
        var valueTwo=$("#valueTwo").val()
        var valueThree=$("#valueThree").val()
        var valueFour=$("#valueFour").val()
        var kosValue=$("#kosValue").val()
        var objektifVal=$("#objektifVal").val()
        var pId= $("#proId").val();
        var noc_id=$("#noc_id").val()  
            if(noc_id==undefined){
                noc_id=null
            }else{
                noc_id;
            }   


            // formData.append('noc_id', noc_id);

            if(pId!=''){
                formData.append('project_id', pId);
            }
            else{
                formData.append('project_id', document.formData.pp_id.value);
            }

            checkboxes.forEach(function(checkbox) {
                var checkboxId = checkbox.id;
                var value = checkbox.checked ? "1" : "0";
                //checkboxData.push(`{"`+checkboxId+ `" : "`+value+ `"}`);
                formData.append(checkboxId, value);
            });

            formData.append('user_id', {{Auth::user()->id}})

            skop_list.forEach((item) => {
                formData.append('skop_list_data[]', item);
            });

            sub_skop_list.forEach((item) => {
                formData.append('sub_skop_list_data[]', item);
            });


            formData.append('noc_id', noc_id);
            formData.append('SkopData', document.formData.SkopData.value);
            formData.append('KeteranganData', document.formData.KeteranganData.value);
            formData.append('KomponenData', document.formData.KomponenData.value);
            // formData.append('status_id', document.formData.status_id.value);
            formData.append('nameBaharu', document.formData.nameBaharu.value);
            var checkbox3=$('#inlineCheckbox3').is(":checked")
            if(checkbox3){
                formData.append('valueOne', document.formData.valueOne.value);
                formData.append('valueTwo', document.formData.valueTwo.value);
                formData.append('valueThree', document.formData.valueThree.value);
                formData.append('valueFour', document.formData.valueFour.value);
            }
            formData.append('kosValue', document.formData.kosValue.value);
            formData.append('objektifVal', document.formData.objektifVal.value);
        
        if(SkopData || KeteranganData|| KomponenData||nameBaharu||kosValue||objektifVal){ 

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            axios({
                method: "post",
                url: api_url+"api/noc/StoreNoc",
                data: formData,
                headers: { "Authorization": api_token, },
              })
                .then(function (response) { 
                    //console.log(response.data);
                                
                            //   $("#Tambah_data_modal").modal('hide');
                            //   if(response.data.code === '200') {	 
                            //       $("#vms_modal").modal('show');
                            //   }else {	 
                            //     $("#sucess_modal").modal('show');
                            //   }			
                              $("div.spanner").removeClass("show");
                              $("div.overlay").removeClass("show");

                            $('#add_role_sucess_modal').modal('show');
                            $("#tutup").click(function(){                    
                                    window.location.href = "/Kertas_Permohonan_NOC";
                            })
                })
                .catch(function (response) {
                    //handle error
                    //console.log(response);
                //   $("div.spanner").removeClass("show");
                //   $("div.overlay").removeClass("show");
                //   alert("There was an error submitting data");
                });
        }

        // formData.append('project_id', pp_id);
            const checkBox8=$("#inlineCheckbox8").is(":checked");
                if(checkBox8)
                {
                    var tds=$("#diffCount").val();
                    formDataKpi.append('noc_id', noc_id);
                    if(pId!=''){
                        formDataKpi.append('pp_id', pId);
                    }
                    else{
                        formDataKpi.append('pp_id',$("#pp_id").val());
                    }
                    formDataKpi.append('kbval', $("#kb").val());
                    formDataKpi.append('unit', $("#unit").val());
                    formDataKpi.append('PeneranganText', $("#PeneranganText").val());
                    for(i=0;i<=tds;i++){
                        formDataKpi.append('yearVal'+i+'', $("#yearData"+i+"").val());
                    }
                    if(kb||PeneranganText||$("#unit").val()!=0){ 

                        axios({
                                method: "post",
                                url: api_url+"api/noc/StoreNocKpi",
                                data: formDataKpi,
                                headers: { "Authorization": api_token, },
                            })
                        .then(function (response) { 
                            //console.log(response.data);
                                        
                                    //   $("#Tambah_data_modal").modal('hide');
                                    //   if(response.data.code === '200') {	 
                                    //       $("#vms_modal").modal('show');
                                    //   }else {	 
                                    //     $("#sucess_modal").modal('show');
                                    //   }			
                                    //   $("div.spanner").removeClass("show");
                                    //   $("div.overlay").removeClass("show");
                        })
                        .catch(function (response) {
                            //handle error
                            //console.log(response);
                        //   $("div.spanner").removeClass("show");
                        //   $("div.overlay").removeClass("show");
                        //   alert("There was an error submitting data");
                        });
                    }
                }
                const checkBox9=$("#inlineCheckbox9").is(":checked");
                if(checkBox9)
                {
                    var pp_id=$("#pp_id").val();
                    var rowCount = $('#editOutputTable >tbody >tr').length;
                    var formData = new FormData();
                    if(pId!=''){
                        formData.append('project_id', pId);
                    }
                    else{
                        formData.append('project_id', pp_id);
                    }
                    formData.append('noc_id', noc_id);


                    output = []  
                    for (var i = 0;i < rowCount; i++) {                         
                        data= {};
                        data.output_proj = $("#outputTextAreaElements-"+i+"").val()
                        data.Kuantiti= $("#outputQuantityElements-"+i+"").val()
                        data.unit_id = $("#outputUnitElements-"+i+"").val()
                        output.push(JSON.stringify(data))
                    }
                    output.forEach((item) => {
                    formData.append('output[]', item);
                    });
                    // //console.log(output!='')
                    if(output!=''){
                        axios({
                            method: "post",
                            url: api_url+"api/noc/StoreNocOutput",
                            data: formData,
                            headers: { "Authorization": api_token, },
                        })
                    .then(function (response) { 
                        //console.log(response.data);
                                    
                                //   $("#Tambah_data_modal").modal('hide');
                                //   if(response.data.code === '200') {	 
                                //       $("#vms_modal").modal('show');
                                //   }else {	 
                                //     $("#sucess_modal").modal('show');
                                //   }			
                                //   $("div.spanner").removeClass("show");
                                //   $("div.overlay").removeClass("show");
                    })
                    .catch(function (response) {
                        //handle error
                        //console.log(response);
                    //   $("div.spanner").removeClass("show");
                    //   $("div.overlay").removeClass("show");
                    //   alert("There was an error submitting data");
                    });
                    }
                }
            const checkBox11=$("#inlineCheckbox11").is(":checked");

                if(checkBox11)
                {
                    var pp_id=$("#pp_id").val();
                    var rowCount = $('#editOutcomeTable >tbody >tr').length;
                    var formData = new FormData();

                        if(pId!=''){
                            formData.append('project_id', pId);
                        }
                        else{
                            formData.append('project_id', pp_id);
                        }
                        formData.append('noc_id', noc_id);

                        outcome = []  
                        for (var i = 0;i < rowCount; i++) {                         
                            data= {};
                            data.outcome_proj = $("#outcomeTextAreaElements-"+i+"").val()
                            data.Kuantiti= $("#outcomeQuantityElements-"+i+"").val()
                            data.unit_id = $("#outcomeUnitElements-"+i+"").val()
                            outcome.push(JSON.stringify(data))
                        }
                        outcome.forEach((item) => {
                        formData.append('outcome[]', item);
                        });
                        if(outcome!=''){
                        axios({
                                method: "post",
                                url: api_url+"api/noc/StoreNocOutcome",
                                data: formData,
                                headers: { "Authorization": api_token, },
                            })
                        .then(function (response) { 
                            //console.log(response.data);
                                        
                                    //   $("#Tambah_data_modal").modal('hide');
                                    //   if(response.data.code === '200') {	 
                                    //       $("#vms_modal").modal('show');
                                    //   }else {	 
                                    //     $("#sucess_modal").modal('show');
                                    //   }			
                                    //   $("div.spanner").removeClass("show");
                                    //   $("div.overlay").removeClass("show");
                        })
                        .catch(function (response) {
                            //handle error
                            //console.log(response);
                        //   $("div.spanner").removeClass("show");
                        //   $("div.overlay").removeClass("show");
                        //   alert("There was an error submitting data");
                        });
                    }
                
                }

            
            const checkBox7=$("#inlineCheckbox7").is(":checked");
                if(checkBox7){
                    var formData = new FormData();
                    
                    projekID=$("#projekID").val()
                    if(projekID!=""){
                        formData.append('projekID',projekID );
                    }
                    //formData.append('noc_id',projekID );

                    formData.append('wujudProjekName', $("#wujudProjekName").val());
                    formData.append('kod_projek', $("#kod_projek").val());
                    formData.append('kos_projek', $("#kos_projek").val());
                    formData.append('keperluan', $("#keperluan").val());
                    formData.append('justifikasi', $("#justifikasi").val()); 

                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");

                    axios({
                            method: "post",
                            url: api_url+"api/noc/StoreNocButiranBaharu",
                            data: formData,
                            headers: { "Authorization": api_token, },
                        })
                    .then(function (response) { 
                        //console.log(response.data);
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        $('#add_role_sucess_modal').modal('show');
                        $("#tutup").click(function(){                    
                                window.location.href = "/Kertas_Permohonan_NOC";
                        })
                    })
                    .catch(function (response) {

                    });   
                }
                const checkBox10=$("#inlineCheckbox10").is(":checked");
                if(checkBox10){
                    var formData = new FormData();

                    projekID=$("#projekID").val()
                    if(projekID!=""){
                        formData.append('projekID',projekID );
                    }
                    
                    formData.append('selectNameProjek', document.formData.selectNameProjek.value);
                    formData.append('namaProjek', document.formData.namaProjek.value);
                    formData.append('kodProjek', document.formData.kodProjek.value);
                    formData.append('kosProjek', document.formData.kosProjek.value);
                    formData.append('sKeperluan', document.formData.sKeperluan.value);
                    formData.append('sJustifikasi', document.formData.sJustifikasi.value); 

                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");

                    axios({
                            method: "post",
                            url: api_url+"api/noc/StoreNocSemulaButiran",
                            data: formData,
                            headers: { "Authorization": api_token, },
                        })
                    .then(function (response) { 
                        //console.log(response.data);
                                    
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        $('#add_role_sucess_modal').modal('show');
                        $("#tutup").click(function(){                    
                                window.location.href = "/Kertas_Permohonan_NOC";
                        })
                    })
                    .catch(function (response) {
                        
                    });   
                }
    }


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function AddNewTd(){
                $("#outputBody").append(tdData)
                // $("#firstTd").addClass('d-none')
                // $(".countTr")
                var rowCount = $('#editOutputTable >tbody >tr').length;
                var realCount=rowCount-1
                $(".output_minus").attr('onClick', 'remove(this);');
                var trElements = document.querySelectorAll('.countTr');
                var outputTextAreaElements = document.querySelectorAll('.outputTextArea');
                var outputQuantityElements = document.querySelectorAll('.outputQuantity');
                var outputUnitElements = document.querySelectorAll('.outputUnit');
                var output_minus=document.querySelectorAll('.output_minus');
                var firstTd=document.querySelectorAll('.firstTd');

                for (var i = 0; i < trElements.length; i++){
                    // //console.log(i)
                    trElements[i].id="countTr-"+i+""
                    outputTextAreaElements[i].id="outputTextAreaElements-"+i+""
                    outputQuantityElements[i].id="outputQuantityElements-"+i+""
                    outputUnitElements[i].id="outputUnitElements-"+i+""
                    output_minus[i].id="output_minus-"+i+""
                    firstTd[i].id="firstTd-"+i+"";
                    $("#output_minus-"+i+"").val(i);
                    if(i>0){
                        $("#firstTd-"+i+"").addClass("d-none")
                    }

                    loadUnit("outputUnitElements-"+i+"")
                }

            }
            function loadUnit(units){
                    //console.log(units)
                    //console.log($("#"+units+" option").length)
                    if($("#"+units+" option").length==1){
                axios({
                    method: "get",        
                    url: api_url+"api/project/unit-details",
                    // dataType: 'json',
                    headers: {"Authorization": api_token },

                }).then(function (response) { 
                    // //console.log(response.data.data)
                    var result=response.data;
                    if (result) {
                            $.each(result.data, function (key, item) {
                                // //console.log(item.id)
                                var opt = item.id;
                                var element = document.createElement("option");
                                    element.textContent = item.nama_unit;
                                    element.value = opt;
                                    $("#"+units+"").append(element);
                            })
                        }
                    })
                }
                }
 
var tdData=`<tr class="countTr">
            <td class="NOCtblKodprojek">
                <div  class="firstTd">
                    <label for="">Output Projek
                    <i class="ri-add-box-line" onclick="AddNewTd()" style="font-size: 1.5rem; vertical-align: middle; color: #595d6e;"></i>
                    </label>
                </div>
            </td>
            <td class="NOCtblKodprojek">
                <textarea class="form-control outputTextArea" name="outputText" id="outputTextAreaElements-0"></textarea>
            </td>
            <td class="NOCtblKodprojek">
                <label for="">Kuantiti/Bilangan</label>
            </td>
            <td class="NOCtblKodprojek">
                <input class="form-control outputQuantity" type="text" name="outputKuantiti" id="outputQuantityElements-0" value="">
            </td>
            <td class="NOCtblKodprojek">
                <label for="">Unit</label>
            </td>
            <td class="NOCtblKodprojek d-flex">
                <select class="form-control outputUnit" name="outputUnit" id="outputUnitElements-0" style="width: 100%">
                    <option value="">--Pilih--</option>
                
                </select>
                <button type="button" class="output_minus" onclick="remove(this);" style="border:none !important;background: transparent !important; float: right;">
                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
            </td></tr>`


            


           

            function remove(trData){
                removeBtnVal=$("#"+trData.id+"").val();
                //console.log(removeBtnVal)
                $("#countTr-"+removeBtnVal+"").remove();

            }


            function AddNewOutComeTd(){
                $("#outcomeBody").append(tdData2)
                // $("#firstTd").addClass('d-none')
                // $(".countTr")
                var rowCount = $('#editOutcomeTable >tbody >tr').length;
                var realCount=rowCount-1
                $(".outcome_minus").attr('onClick', 'removeoutcome(this);');
                var trElements1 = document.querySelectorAll('.outcomecountTr');
                var outcomeTextAreaElements = document.querySelectorAll('.outcomeTextArea');
                var outcomeQuantityElements = document.querySelectorAll('.outcomeQuantity');
                var outcomeUnitElements = document.querySelectorAll('.outcomeUnit');
                var outcome_minus=document.querySelectorAll('.outcome_minus');
                var outcomefirstTd=document.querySelectorAll('.outcomefirstTd');

                for (var j = 0; j < trElements1.length; j++){
                    //console.log(j)
                    trElements1[j].id="countOutcomeTr-"+j+""
                    outcomeTextAreaElements[j].id="outcomeTextAreaElements-"+j+""
                    outcomeQuantityElements[j].id="outcomeQuantityElements-"+j+""
                    outcomeUnitElements[j].id="outcomeUnitElements-"+j+""
                    outcome_minus[j].id="outcome_minus-"+j+""
                    outcomefirstTd[j].id="outcomefirstTd-"+j+"";
                    $("#outcome_minus-"+j+"").val(j);
                    if(j>0){
                        $("#outcomefirstTd-"+j+"").addClass("d-none")
                    }
                    loadUnit("outcomeUnitElements-"+j+"")
                }
                
                
            }
            function loadUnit(units){
                    //console.log(units)
                    if($("#"+units+" option").length==1){
                axios({
                    method: "get",        
                    url: api_url+"api/project/unit-details",
                    // dataType: 'json',
                    headers: {"Authorization": api_token },

                }).then(function (response) { 
                    // //console.log(response.data.data)
                    var result=response.data;
                    if (result) {
                            $.each(result.data, function (key, item) {
                                // //console.log(item.id)
                                var opt = item.id;
                                var element = document.createElement("option");
                                    element.textContent = item.nama_unit;
                                    element.value = opt;
                                    $("#"+units+"").append(element);
                            })
                        }
                    })
                }
            }
 
var tdData2=`<tr class="outcomecountTr">
            <td class="NOCtblKodprojek">
                <div  class="outcomefirstTd">
                    <label for="">OutCome Projek
                    <i class="ri-add-box-line" onclick="AddNewOutComeTd()" style="font-size: 1.5rem; vertical-align: middle; color: #595d6e;"></i>
                    </label>
                </div>
            </td>
            <td class="NOCtblKodprojek">
                <textarea class="form-control outcomeTextArea" name="outcomeText" id="outcomeTextAreaElements-0"></textarea>
            </td>
            <td class="NOCtblKodprojek">
                <label for="">Kuantiti/Bilangan</label>
            </td>
            <td class="NOCtblKodprojek">
                <input class="form-control outcomeQuantity" type="text" name="outcomeKuantiti" id="outcomeQuantityElements-0" value="">
            </td>
            <td class="NOCtblKodprojek">
                <label for="">Unit</label>
            </td>
            <td class="NOCtblKodprojek d-flex">
                <select class="form-control outcomeUnit" name="outcomeUnit" id="outcomeUnitElements-0" style="width: 100%">
                    <option value="">--Pilih--</option>
                
                </select>
                <button type="button" class="outcome_minus" onclick="removeoutcome(this);" style="border:none !important;background: transparent !important; float: right;">
                <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                </button>
            </td></tr>`

            function removeoutcome(trData2){
                //console.log(trData2.id)
                removeBtnVal=$("#"+trData2.id+"").val();
                //console.log(removeBtnVal)
                $("#countOutcomeTr-"+removeBtnVal+"").remove();

            }

    function get_noc_pem_negeri(){
        //const project_id = 1;
        var pp_id=$("#pp_id").val(); 
        const api_url = "{{env('API_URL')}}";  //console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');
        $.ajaxSetup({
		headers: {
			   "Content-Type": "application/json",
			   "Authorization": api_token,
			   }
        });
        //const project_id = 1;//document.getElementById("project_id").value;  //console.log(project_id);
        $.ajax({
            type: "GET",
            //url: api_url+"api/noc/negeri-details-pementuan/"+project_id,
            url: api_url+"api/noc/negeri-details/"+pp_id,
            dataType: 'json',
            success: function (result) { 
                Negeri_ID="";
                Negeri_ID_pem="";
                negeridetails = result.data.negeri;
                negeridetails_pem = result.data.negeri_pem;
                //negeriselectiontype = result.data.negeriselection;
                // //console.log(result.data);
            
                if (negeridetails_pem) { 

                    if(negeridetails_pem.length > 0) {
                        
                        $('#negeridiv').empty();
                        $('#daerahdiv').empty();
                        $('#parlimendiv').empty();
                        $('#dundiv').empty();
                        numnegeri = 0;
                        let negeri = "";
                        let daerah = "";
                        let parlimen = "";
                        let dun = "";
                        negeridetails_pem.forEach((item) => {
                            numnegeri += 1;


                            if(item.negeri_id != Negeri_ID){
                                Negeri_ID = item.negeri_id;

                                negeri=`<p>`+item.negeri.nama_negeri+`</p>`;
                                
                                
                            }
                            else{
                                negeri=`<p></p>`;
                                

                            }
                            daerah=`<li>`+item.daerah.nama_daerah+`</li>`;
                            parlimen=`<li>`+item.parlimen.nama_parlimen+`</li>`;
                            dun=`<li>`+item.dun.nama_dun+`</li>`;
                            
                            $("#negeridiv").append(negeri);
                            $("#daerahdiv").append(daerah);
                            $("#parlimendiv").append(parlimen);
                            $("#dundiv").append(dun);
                            

                        });
                        
                        
                    }

                }

                if (negeridetails) { 

                    if(negeridetails.length > 0) {
                        $('#negeri_mohon_div').empty();
                        $('#daerah_mohon_div').empty();
                        $('#parlimen_mohon_div').empty();
                        $('#dun_mohon_div').empty();
                        numnegeri = 0;
                        let negeri = "";
                        let daerah = "";
                        let parlimen = "";
                        let dun = "";
                        negeridetails.forEach((item) => {
                            numnegeri += 1;


                            if(item.negeri_id != Negeri_ID_pem){
                                Negeri_ID_pem = item.negeri_id;

                                negeri=`<p>`+item.negeri.nama_negeri+`</p>`;
                                
                                
                            }
                            else{
                                negeri=`<p></p>`;
                                

                            }
                            daerah=`<li>`+item.daerah.nama_daerah+`</li>`;
                            parlimen=`<li>`+item.parlimen.nama_parlimen+`</li>`;
                            dun=`<li>`+item.dun.nama_dun+`</li>`;
                            
                            $("#negeri_mohon_div").append(negeri);
                            $("#daerah_mohon_div").append(daerah);
                            $("#parlimen_mohon_div").append(parlimen);
                            $("#dun_mohon_div").append(dun);
                            

                        });
                        
                        
                    }

                }
            }
        })
    }

    
    function setnegeri(){

        var negeridropDown =  document.getElementById("select_negeri");
        var negeriData =  document.getElementById("negeriData");

    
        $.ajaxSetup({
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
        });

    
        var negeridropDown =  document.getElementById("select_negeri");
        var negeriData =  document.getElementById("negeriData");
        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/negeri/list",
            dataType: 'json',
            success: function (result) {
                if (result) {
                    $.each(result.data, function (key, item) {
                        options = options + '<option value="' + item.id + '">' + item.nama_negeri + '</option>'
                        // var opt = item.id;
                        // var el = document.createElement("option");
                        // el.textContent = item.nama_negeri;
                        // el.value = opt;
                        // negeridropDown.appendChild(el);
                    })
                    // $.each(result.data, function (key, item) {
                    //     options = options + '<option value="' + item.id + '">' + item.nama_negeri + '</option>'
                    //     var opt = item.id;
                    //     var el = document.createElement("option");
                    //     el.textContent = item.nama_negeri;
                    //     el.value = opt;
                    //     negeriData.appendChild(el);
                    // })

                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        })
    
        

        //const project_id = 1;//document.getElementById("project_id").value;  //console.log(project_id);
        var pp_id=$("#pp_id").val();
        $.ajax({
            type: "GET",
            url: api_url+"api/noc/negeri-details/"+pp_id,
            dataType: 'json',
            success: function (result) { 
                negeridetails = result.data.negeri;
                //negeriselectiontype = result.data.negeriselection;
                // //console.log(result.data);
                Negeri_ID="";
                if (negeridetails) { 

                    if(negeridetails.length > 0) {
                        intialclick=false;
                        $('#negeribox').empty();
                        numnegeri = 0;
                        let negerilokasi = "";
                        negeridetails.forEach((item) => {
                            numnegeri += 1;


                            if(item.negeri_id != Negeri_ID){
                                Negeri_ID = item.negeri_id;
                                negerilokasi = `<div class="row p-2 negerirow">
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                                            <select class="form-control pemberat_title1 negeri_`+numnegeri+`" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);">
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                                `+options+`   
                                            </select>
                                            <span class="error" id="error_select_negeri"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                                            <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" >
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_daerah"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="nageri_select_inputs input_fill_content">
                                        <div class="col-md-3 col-xs-12 pemberat_title">
                                            <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                                            <select class="form-control" id="select_mukkim" name="select_mukkim">
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_mukkim"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                                            <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" >
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_parlimen"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                                <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                                                <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" >
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                                </select>
                                                <span class="error" id="error_select_dun"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-12">
                                        <div class="d-flex lokasi_footer">
                                            <div class="" data-negeri="`+numnegeri+`">
                                                <button type="button" id="addbtndaerah" class="ml-auto add-tr-btn-daerah btn_`+numnegeri+`" style="background:white;border: none">
                                                    <img
                                                    src="{{ asset('assets/images/Add_box1.png') }}"
                                                    alt=""
                                                    />
                                                </button> 
                                            </div>
                                            <div>
                                                <button type="button" id="minus_button" class="" style="background:white;border:none;">
                                                    <img
                                                    src="{{ asset('assets/images/minus.png') }}"
                                                    alt="minus"
                                                    />
                                                </button>
                                            </div>
                                        </div>                               
                                    </div>  
                            </div><!-- row ends -->`;

                            }
                            else{
                                negerilokasi = `<div class="row p-2 negerirow">
                                    <div class="col-md-3 col-xs-12 invisible_negeri">
                                        <div class="input_fill_content">
                                            <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                                            <select class="form-control negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" >
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                                `+options+`   
                                            </select>
                                            <span class="error" id="error_select_negeri"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input_fill_content">
                                            <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                                            <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" >
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_daerah"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="nageri_select_inputs input_fill_content">
                                            <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                                            <select class="form-control col-md-10 col-xs-12" id="select_mukkim" name="select_mukkim">
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_mukkim"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input_fill_content">
                                            <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                                            <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" >
                                                <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_parlimen"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="input_fill_content">
                                            <div class="form-group nageri_form_group">
                                                <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                                                <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" >
                                                    <option value="0" disabled selected hidden>--Pilih--</option>   
                                                </select>
                                                <span class="error" id="error_select_dun"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-12">
                                        <div class="d-flex lokasi_footer">
                                            <button type="button" id="minus_button" class="" style="background:white;border:none;">
                                            <img
                                            src="{{ asset('assets/images/minus.png') }}"
                                            alt="minus"
                                            />
                                            </button>
                                        </div>
                                    </div>     
                                </div><!-- row ends -->`;
                            }
                            
                            $("#negeribox").append(negerilokasi);

                        });

                        $(".add-tr-btn-daerah").bind("click", function () {
        var i = $(this).parent().attr('data-negeri');

        

        //var opt = document.querySelectorAll('daerah_1').options;
        var daerahopt="";
        var parlimenopt="";
        var dunopt="";
        
        var negeriid=  $(".negeri_"+i).val()
        //var daerahid= $(".daerah_"+i).val()
        var parlimenid= $(".parlimen_"+i).val()
        var dunid= $(".dun_"+i).val()

        
        $(".daerah_"+i+" option").each(function()
        {
            daerahopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });

        $(".parlimen_"+i+" option").each(function()
        {
            parlimenopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });

        $(".dun_"+i+" option").each(function()
        {
            dunopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });



        //console.log( $(".negeri_"+i).val())

        numnegeri += 1;
        let negerilokasi = `<div class="row p-2 negerirow">
        <div class="col-md-3 col-xs-12 invisible_negeri">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                    <select class="form-control negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);">
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+options+`   
                    </select>
                    <span class="error" id="error_select_negeri"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                    <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah">
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+daerahopt+`
                    </select>
                    <span class="error" id="error_select_daerah"></span>
                </div>
            </div>
            <!-- <div class="nageri_select_inputs input_fill_content">
                <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                <select class="form-control col-md-10 col-xs-12" id="select_mukkim" name="select_mukkim">
                <option value="0" disabled selected hidden>--Pilih--</option>
                </select>
                <span class="error" id="error_select_mukkim"></span>
                </div>
            </div> -->
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                    <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);">
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+parlimenopt+`
                    </select>
                    <span class="error" id="error_select_parlimen"></span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                    <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun">
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+dunopt+`
                    </select>
                    <span class="error" id="error_select_dun"></span>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-xs-12">
            <div class="d-flex lokasi_footer">
                <button type="button" id="minus_button" class="" style="background:white;border:none;">
                <img src="{{ asset('assets/images/minus.png') }}"
                alt="minus"/>
                </button>
            </div>
        </div> 
        <hr />                
    </div><!-- row ends -->`;

    //$('#negeribox').append(negerilokasi);
    var closestrow = $(this).closest('.negerirow');
    $(negerilokasi).insertAfter(closestrow);

   

    $(".negeri_"+numnegeri).val(negeriid)
    //$(".daerah_"+numnegeri).val(daerahid)
    $(".parlimen_"+numnegeri).val(parlimenid)
    $(".dun_"+numnegeri).val(dunid)

    let all_negeri_btn = document.querySelectorAll("[id='minus_button']"); 

    let all_negeri_div = document.querySelectorAll(".negerirow");               
        all_negeri_btn.forEach((tb, i) => {                    
            tb.addEventListener("click", () => {
                all_negeri_div[i].remove();                        
            });
        });
    });
}

                    //----------------------------------------------------------------------------------------------
                        // let all_negeri_btn = document.querySelectorAll(
                        //     "[id='minus_button']"                    
                        // ); 

                        // let all_negeri_div = document.querySelectorAll(".negerirow");               
                        // all_negeri_btn.forEach((tb, i) => {                    
                        //     tb.addEventListener("click", () => {
                        //         all_negeri_div[i].remove();                        
                        //     });
                        // });
                        
                        var negeri_selection_type = 0; 
                        //var negeriselectioncntrl = document.querySelectorAll("[id='negeriselection']");
                        
                        // if(parseInt(negeriselectiontype[0]['negeri_selection_type']) == 0){
                        //     negeriselectioncntrl[0].checked=true;
                        // }
                        // else{
                        //     negeriselectioncntrl[1].checked=true;
                        //     document.getElementById("addbtndiv").style = "display: block;";
                        // }

                        
                        
                        
                        let negerirow = document.querySelectorAll(".negerirow");
                        let fetchall_negeri = document.querySelectorAll("[id='select_negeri']");
                        let fetchall_daerah = document.querySelectorAll("[id='select_daerah']");
                        let fetchall_parlimen = document.querySelectorAll("[id='select_parlimen']");
                        let fetchall_dun = document.querySelectorAll("[id='select_dun']");
                                            

                        if(negerirow.length>0){
                            for (var i = 0;i < negerirow.length; i++) {                         
                            
                                negeriid=parseInt(negeridetails[i]['negeri_id']);
                                daerahid = parseInt(negeridetails[i]['daerah_id']);
                                parlimenid = parseInt(negeridetails[i]['parlimen_id']);
                                dunid = parseInt(negeridetails[i]['dun_id']);
                                loadDaerahData(negeriid,daerahid,parlimenid,dunid,i+1);

                            }
                        }
                                
                        let all_negeri_btn = document.querySelectorAll(
                            "[id='minus_button']"                    
                        ); 

                        let all_negeri_div = document.querySelectorAll(".negerirow");               
                        all_negeri_btn.forEach((tb, i) => {                    
                            tb.addEventListener("click", () => {
                                all_negeri_div[i].remove();                        
                            });
                        });
                    //----------------------------------------------------------------------------------------------
                }
            }
        })
    
}



function loadDaerahData(id,daerah,parlimen,dun,rowno)
{
    negeri = id;
        cmbnegeri = document.querySelector(".negeri_"+rowno);
        cmbnegeri.value = negeri;
        
        var daerahdropDown =  document.querySelector(".daerah_"+rowno);
        var daerahData = document.getElementById("daerahData");
        $(daerahdropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); //console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            daerahdropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/daerah/list?id="+negeri,
            dataType: 'json',
            success: function (result) { //console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_daerah;
                        el.value = opt;
                        daerahdropDown.appendChild(el);
                    })
                    daerahdropDown.value= daerah;

                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        var parlimendropDown =  document.querySelector(".parlimen_"+rowno);
        var parlimenData = document.getElementById("parlimenData");

        $(parlimendropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); //console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            parlimendropDown.appendChild(el);
        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/parlimen/list?id="+negeri,
            dataType: 'json',
            success: function (result) { //console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_parlimen;
                        el.value = opt;
                        parlimendropDown.appendChild(el);
                        // parlimenData.appendChild(el);
                    })
                    parlimendropDown.value= parlimen;

                    // $.each(result.data, function (key, item) {
                    //     var opt = item.id;
                    //     var el = document.createElement("option");
                    //     el.textContent = item.nama_parlimen;
                    //     el.value = opt;
                    //     parlimenData.appendChild(el);
                    //     // parlimenData.appendChild(el);
                    // })
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        parlimen = parlimen;

        var dundropDown =  document.querySelector(".dun_"+rowno);
        var dunData = document.getElementById("dunData");

        $(dundropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); //console.log(el)
        el.textContent = '--Pilih--';
        el.value = opt;
        dundropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/dun/list?id="+parlimen,
            dataType: 'json',
            success: function (result) { //console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_dun;
                        el.value = opt;
                        dundropDown.appendChild(el);
                        // dunData.appendChild(el);
                    })
                    dundropDown.value= dun;

                    // $.each(result.data, function (key, item) {
                    //     var opt = item.id;
                    //     var el = document.createElement("option");
                    //     el.textContent = item.nama_dun;
                    //     el.value = opt;
                    //     dunData.appendChild(el);
                    //     // dunData.appendChild(el);
                    // })
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

}


function loadnegeri_parlimen_dun(id)
{
//     const api_url = "{{env('API_URL')}}";  //console.log(api_url);
   //const api_token = "Bearer "+ window.localStorage.getItem('token');  //console.log(api_token);

    //var negeri_id =  document.querySelector(".negeri_"+id);
    var negeri_id =  document.getElementById("select_negeri");
    var negeriid = negeri_id.value;
        
        //var daerahdropDown =  document.querySelector(".daerah_"+id);
        var daerahdropDown =  document.getElementById("select_daerah");
        $(daerahdropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); //console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            daerahdropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/daerah/list?id="+negeriid,
            dataType: 'json',
            success: function (result) { //console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_daerah;
                        el.value = opt;
                        daerahdropDown.appendChild(el);
                    })
                    //document.getElementById("select_daerah").value= daerah;
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        //var parlimendropDown =  document.querySelector(".parlimen_"+id);
        var parlimendropDown =  document.getElementById("select_parlimen");
        $(parlimendropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); //console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            parlimendropDown.appendChild(el);
        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/parlimen/list?id="+negeriid,
            dataType: 'json',
            success: function (result) { //console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_parlimen;
                        el.value = opt;
                        parlimendropDown.appendChild(el);
                    })
                    //document.getElementById("select_parlimen").value= parlimen;
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        // parlimen = parlimen;

        

}

function getdun(rowno){
    const api_url = "{{env('API_URL')}}";  //console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  //console.log(api_token);
    var dundropDown =  document.querySelector(".dun_"+rowno);
    //var dundropDown =  document.getElementById("select_dun");
    $(dundropDown).empty();
    var opt = 0;
    var el = document.createElement("option");
    el.textContent = '--Pilih--';
    el.value = opt;
    dundropDown.appendChild(el);

    var parlimencntrl =  document.querySelector(".parlimen_"+rowno);
    //var parlimencntrl =  document.getElementById("select_parlimen");
    var parlimen = parlimencntrl.value;

    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/dun/list?id="+parlimen,
        dataType: 'json',
        success: function (result) { //console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_dun;
                    el.value = opt;
                    dundropDown.appendChild(el);
                })
                //document.getElementById("select_dun").value= dun;
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });
}

$("#savenegeri").click(function(){
        savenegeridetails();
});

function savenegeridetails(){

    var formDatanegeri = new FormData();
    //   ------------- Negeri Lokasi save start -------------------------------

    let negericmb = document.querySelectorAll("[id='select_negeri']");  
    let daerahcmb = document.querySelectorAll("[id='select_daerah']");
    let parlimencmb = document.querySelectorAll("[id='select_parlimen']");
    let duncmb = document.querySelectorAll("[id='select_dun']");
    let negerirows = document.querySelectorAll(".negerirow");


    negeritext = []  
    for (i = 0;i < negerirows.length; i++) {                         
        data= {};

        data.negeri_id = negericmb[i].value
        data.daerah_id = daerahcmb[i].value
        data.mukim_id= 1
        data.parlimen_id = parlimencmb[i].value
        data.dun_id = duncmb[i].value 
        negeritext.push(JSON.stringify(data))
    }
    negeritext.forEach((item) => {
        formDatanegeri.append('negeritext[]', item);
    });

    var pp_id=$("#pp_id").val();
    formDatanegeri.append('ppid', pp_id);
    formDatanegeri.append('userid', {{Auth::user()->id}});

    axios({
        method: "post",
        url: api_url+"api/noc/update-negerinoc",
        data: formDatanegeri,
        headers: { "Authorization": api_token},
        
    })
    .then(function (response) { 
        if(response.data.code === '200') {	 
            //$("#add_role_sucess_modal").modal('show');
        }else {				
            // if(response.data.code === '422') {					
            //     Object.keys(response.data.data).forEach(key => {						
            //     document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
            //     });					
            // }else {					
            //     $("#sucess_modal").modal('show');
            //     // location.reload()
            // }	
        }	
        //  $("div.spanner").removeClass("show");
        //  $("div.overlay").removeClass("show");		
    })
    .catch(function (response) {
        //handle error
        //console.log(response);
        // $("div.spanner").removeClass("show");
        // $("div.overlay").removeClass("show");
        alert("There was an error submitting data");
    });
}

</script>


<script>

    function loadSkops(data)
    {
        let skop_options = ''; 
        let sub_skop_options = '';
        $.each(data, function(key, skops) {
            skop_options = skop_options + '<option value="' + skops.id + '">' + skops.skop_name + '</option>';

            $.each(skops.subskop, function(key, subskop) {
                sub_skop_options = sub_skop_options + '<option data-parent="'+skops.id+'" value="'+subskop.id+'">' + subskop.sub_skop_name + '</option>';
            });
        });

        let html = `<select class="py-2 col-md-12 col-12 form-control parent_skop"  id="parent_skop">
                        ` + skop_options + `
                    </select>`;
        
        $('#skop_parent').append(html);

        let html_child = `<select class="py-2 col-md-12 col-12 form-control child_skop" id="child_skop">
                        ` + sub_skop_options + `
                    </select>`;
        
        $('#skop_child').append(html_child);
    }

    function loadSkopData(skop,sub_skop)
    {
        console.log(skop)
        console.log(sub_skop)

        for(var i = 0; i < skop.length; i++)
        {
            addSkop(skop[i]);
            for(var j = 0; j < sub_skop.length; j++)
            {
                if(skop[i].skop_id == sub_skop[j].skop_id)
                {
                    addSubSkop(sub_skop[j],i);
                }
            }
        }
    }

    function addSkop(skop){


        var x = document.getElementById('parent_skop'); //console.log(x)
        var output = '-----Pilih------';    
        for (var i = 0; i < x.options.length; i++) {
            if(x.options[i].value == skop['skop_id'])
            {
                output = output + '<option selected value="' + x.options[i].value + '">' + x.options[i].text + '</option>';
            }
            else
            {
                output = output + '<option value="' + x.options[i].value + '">' + x.options[i].text + '</option>';
            }
        }
        let kos_value='0.00';
        if(skop['skop_kos'])
        {
            kos_value=number_format(skop['skop_kos']);
        }
        
        //console.log(output);
        let data = 
            ` <tr class="row m-0 mainrow " id="parent_row">
                <td class="col-md-7 col-xs-12 d-flex ">
                    <div class="col-1 mainNumbering" id="mainNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important; width:10%;">
                    </div>
                    <div class="p-2 align-items-center" style="width:100%;" id="parentDiv">
                        <select class="py-2 col-md-12 col-12 form-control skop_parent_list" onchange="changeSkop(this)" id="skop_parent_list">
                        ` + output + `
                        </select>
                    </div>
                </td>
                <td class="col-md-5 col-xs-12 d-flex ">
                    <div class="p-2 align-items-center" style="width:72%;">
                        <input
                        type="text" id="skop_kos"
                        class="py-2 col-md-11 col-xs-12 form-control skop_kos" onchange="calculateKos()"
                        value="`+kos_value+`" 
                        />
                    </div>
                    <button type="button" class="ml-2 addsubrow" onclick="addSubRow(this)">
                        <i class="ri-add-box-line ri-xl"></i>
                    </button>
                    <button type="button" class="subminusbutton" style="" onclick="minusRow(this)">
                        <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button> 
                </td>
            </tr>
            `;
        
        $('#skopBody').append(data);

        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
        let all_main = document.querySelectorAll("[id^='skop_parent_list']");
        
        all_main_indexing.forEach((num, i) => {
        num.innerHTML = i + 1
        })

        all_main.forEach((num, i) => {
        abc = i + 1;
        num.setAttribute("data-value" , abc)
        })

        calculateKos();
    }

    function addSubSkop(subskop,count)
    {
            var parentID= subskop['skop_id'];
            var maincount = count+1; //console.log(maincount);
            var mainRowNo = document.getElementById("skop").rows.length; console.log(mainRowNo);

            var x = document.getElementById('child_skop'); //console.log(x)
            var sub_output = '-----Pilih------';    
            for (var i = 0; i < x.options.length; i++) {
                if(subskop['sub_skop_id']==x.options[i].value)
                {
                    sub_output = sub_output + '<option selected value="' + x.options[i].value + '">' + x.options[i].text + '</option>';
                }
                else
                {
                    sub_output = sub_output + '<option value="' + x.options[i].value + '">' + x.options[i].text + '</option>';
                }
            }

            let html = 
                ` <tr class="row m-0 mainrow" id="child_row_`+maincount+`">
                    <td class="col-md-12 col-xs-12 d-flex " style="padding-left:10%;">
                        <div class="col-1 subNumbering_`+maincount+`" id="subNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important;">
                        </div>
                        <div class="p-2 align-items-center" style="width:45%;">
                        <input type="hidden" id="parent_skop_id" name="parent_skop_id" value="`+parentID+`">
                            <select class="py-2 col-md-12 col-12 form-control sub_skop_parent_list" id="sub_skop_parent_list>
                            ` + sub_output + `
                            </select>
                        </div>
                        <button type="button" data-title="Buang skop"  class="subminusbutton" style="" onclick="minusRow(this)">
                            <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                        </button> 
                    </td>
                </tr>
                `;

            $('#skopBody').append(html);


            let subbumid = ".subNumbering_" + maincount
            let all_sub_indexing = document.querySelectorAll(subbumid);

            all_sub_indexing.forEach((subnum, i) => {
                subnum.innerHTML = (maincount) + "." +  (i + 1)  
            })

    }

    function minusRow(element) {
        var delete_row = element.parentNode.parentNode; //console.log(delete_row);
            delete_row.parentNode.removeChild(delete_row);
            calculateKos();
    }

    function changeSkop(element)
    { //console.log(element);
        var change_row_index = element.parentNode.parentNode.querySelector("div#mainNumbering").innerHTML; 
        var class_name = '.subNumbering_' + change_row_index; //console.log(class_name);
        let all_skops = document.querySelectorAll(class_name); //console.log(all_skops);

        $.each(all_skops, function(key, skops) { console.log(skops.parentNode.parentNode);
                skops.parentNode.parentNode.remove(skops);
        });
    }

    function removecomma(num){
        
        num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
        num=parseFloat(num,10);
        return num;
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

    function calculateKos()
    {
        let all_kos = document.querySelectorAll("[id^='skop_kos']");
        let jumlah = 0;

        for(let i=0; i<all_kos.length; i++)
        { 
            if(removecomma(all_kos[i].value) > 0){
                jumlah=jumlah+parseFloat(removecomma(all_kos[i].value));
            }
            else
            {
                jumlah=jumlah;
            } 
        }

        document.getElementById('jumlah_kos').value=number_format(jumlah);
    }
    

    function addSubRow(element){ 

            var parentSelect = element.parentNode.parentNode.querySelector("div select#skop_parent_list");
            var parentID= parentSelect.value; console.log(parentID);
            var maincount = element.parentNode.parentNode.querySelector("div#mainNumbering").innerHTML; //console.log(maincount);
            var mainRowNo = element.parentNode.parentNode.rowIndex; //alert(mainRowNo)
            var x = document.getElementById('child_skop'); //console.log(x)
            var sub_output = '-----Pilih------';    
            for (var i = 0; i < x.options.length; i++) {
                sub_output = sub_output + '<option value="' + x.options[i].value + '">' + x.options[i].text + '</option>';
            }

            let html = 
                ` <tr class="row m-0 mainrow" id="child_row_`+maincount+`">
                    <td class="col-md-12 col-xs-12 d-flex " style="padding-left:10%;">
                        <div class="col-1 subNumbering_`+maincount+`" id="subNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important;">
                        </div>
                        <div class="p-2 align-items-center" style="width:45%;">
                        <input type="hidden" id="parent_skop_id" name="parent_skop_id" value="`+parentID+`">
                            <select class="py-2 col-md-12 col-12 form-control sub_skop_parent_list" id="sub_skop_parent_list>
                            ` + sub_output + `
                            </select>
                        </div>
                        <button type="button" data-title="Buang skop"  class="subminusbutton" style="" onclick="minusRow(this)">
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
</script>