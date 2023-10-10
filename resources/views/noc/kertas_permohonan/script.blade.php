<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>

    // alert(noc_id);
    updateid=[];
    
    const api_url = "{{env('API_URL')}}";  //console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  //console.log(api_token);

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

        var selectNameProjek =  document.getElementById("selectNameProjek");
        $("#selectNameProjek").empty();
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            selectNameProjek.appendChild(el);

        $.each(all_result, function (key, item) {
                    // console.log(item)
					var opt = item.id;
                    var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectNameProjek.appendChild(el);                              
                })

        var selectProject =  document.getElementById("selectProject");
        $("#selectProject").empty();
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            selectProject.appendChild(el);

        $.each(all_result, function (key, item) {
                    // console.log(item)
					var opt = item.id;
                    var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectProject.appendChild(el);                              
                })
        
        var selectProjectnew =  document.getElementById("selectProjectnew");
        $("#selectProjectnew").empty();
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            selectProjectnew.appendChild(el);

        $.each(all_result, function (key, item) {
                    // console.log(item)
					var opt = item.id;
                    var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectProjectnew.appendChild(el);                              
                })

        
        if (result) {
                

                $.each(result.data, function (key, item) {
                    // //console.log(item)
					var opt = item.id;
                    var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectProject.appendChild(el);  
                })
                // pp_id

                $("#selectProject").change(function(){
                    loadProjectDataOnChange($(this).val(),result);
                });

                $("#selectProjectnew").change(function(){
                    loadProjectDataOnChange($(this).val(),result);
                });

                $("#selectNameProjek").change(function(){
                    loadProjectDataOnChange($(this).val(),result);
                });

                if(result.noc_data)
                {
                    $.each(result.noc_data, function (keys, items) { 
                        $("#selectProject option[value='"+items['pp_id']+"']").prop("disabled",true);
                        $("#selectProjectnew option[value='"+items['pp_id']+"']").prop("disabled",true);
                        $("#selectNameProjek option[value='"+items['pp_id']+"']").prop("disabled",true);
                    })

                }

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


        if(result)
        {
            $("#ppmp_area").removeClass("d-none");

        }

        if(project_data)
        {
            ////console.log(document.getElementById('status_head'))
            document.getElementById('status_head').innerText=project_data.statuses.status_name;
        }

        if(pageData)
        {
            localStorage.setItem('noc_status',pageData.status_id);
            $("#pp_id").val(pageData.pp_id)
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
                    passProjekId(proId);
                }
            });
            
        }else{
            $("#maklumat_pilih_projek_form").addClass("d-none");
        }
        

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
    })

}
else
{
    document.getElementById('daftar_status').classList.add("yellow");

}


    function loadProjectDataOnChange(id,result)
    {
        var id=id
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
                        $("#table_body").empty();
                        data = response.data.data; 
                        if(data.tahun_jangka_mula != data.tahun_jangka_siap){
                            var dateDiff=data.tahun_jangka_siap-data.tahun_jangka_mula
                            $("#diffCount").val(dateDiff);
                            for(i=0;i<=dateDiff;i++){
                                $("#table_body").append(
                                    '<td class="border-0"><label class=" m-1 col-6 text-white" style="background-color:#39Afd1;">'+(parseInt(data.tahun_jangka_mula)+i)+'</label><input name="yearVal" class="form-control m-1 col-6" type="text" id="yearData'+i+'"></td>'
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
                            $("#kod_projek_new").val(data.kod_projeck);
                            document.getElementById("kod_projek_new").disabled = true;
                            $("#kodProjek").val(data.kod_projeck);
                            document.getElementById("kodProjek").disabled = true;
                            $("#kosProjek").val(data.kos_projeck);
                            document.getElementById("kosProjek").disabled = true;
                            $("#sKeperluan").val('0.00');
                            document.getElementById("sKeperluan").disabled = true;
                        }
                        
                    })
                    .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    })
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
                                '<td class="border-0"><label class=" m-1 col-6 text-white" style="background-color:#39Afd1;">'+(parseInt(data.tahun_jangka_mula)+i)+'</label><input name="yearVal" class="form-control m-1 col-6" type="text" id="yearData'+i+'"></td>'
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
                    }
                    
                })
                .catch(function (error) {
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                })
            }





    
    // Edit Ends 
    
    

    
    function whichForm(checkbox){
        console.log(checkbox)
        console.log(checkbox.id)

        if ($("#inlineCheckbox1").is(':checked') ||$("#inlineCheckbox2").is(':checked')||$("#inlineCheckbox3").is(':checked')||$("#inlineCheckbox4").is(':checked')||$("#inlineCheckbox5").is(':checked')||$("#inlineCheckbox6").is(':checked')||$("#inlineCheckbox8").is(':checked')||$("#inlineCheckbox9").is(':checked')||$("#inlineCheckbox11").is(':checked')) {
            $("#maklumat_pilih_projek_form").removeClass("d-none");
            $("#ActionDiv").removeClass("d-none");
            $("#wujud_semula_form").addClass("d-none");
            $("#wujud_butiran_baharu_form").addClass("d-none");
            $("#maklumat_wujud_butiran_form").addClass("d-none");
            $("#WujidDiv").addClass("d-none");
        }
        else{
            $("#maklumat_pilih_projek_form").addClass("d-none");
            $("#ActionDiv").addClass("d-none");
        }

        if(checkbox.id=='inlineCheckbox1' || checkbox.id=='inlineCheckbox2' || checkbox.id=='inlineCheckbox3' || checkbox.id=='inlineCheckbox4' || checkbox.id=='inlineCheckbox5'
        || checkbox.id=='inlineCheckbox6' || checkbox.id=='inlineCheck8' || checkbox.id=='inlineCheck9' || checkbox.id=='inlineCheck11'){

            $("#maklumat_pilih_projek_form").removeClass("d-none");
            $("#ActionDiv").removeClass("d-none");
            $("#wujud_semula_form").addClass("d-none");
            $("#wujud_butiran_baharu_form").addClass("d-none");
            $("#maklumat_wujud_butiran_form").addClass("d-none");
            $("#WujidDiv").addClass("d-none");
            

            if ($("#inlineCheckbox7").is(':checked')) {
                            $("#inlineCheckbox7").prop('checked', false);
            }  
        }
        

        
        if(checkbox.id=='inlineCheckbox7'){
            
           
            $('#popup_sucess_modal').modal('show');
                    if(checkbox.checked == true){ 
                        $("#maklumat_pilih_projek_form").addClass("d-none");
                        $("#wujud_butiran_baharu_form").removeClass("d-none");
                        $("#maklumat_wujud_butiran_form").removeClass("d-none");
                        $("#wujud_semula_form").addClass("d-none");
                        $("#WujidDiv").removeClass("d-none");
                        $("#ActionDiv").addClass("d-none");
                        
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
                        $("#maklumat_wujud_butiran_form").addClass("d-none");
                        $("#WujidDiv").addClass("d-none");
                    }   

                    $(".tutup-global").click(function(){
                        $('#popup_sucess_modal').modal('hide');
                    });

                    $(".close-global").click(function(){
                        location.reload();
                    });
        }
        
        if(checkbox.id=='inlineCheckbox10'){

            $("#maklumat_pilih_projek_form").addClass("d-none");
            $("#wujud_butiran_baharu_form").addClass("d-none");
            $("#maklumat_wujud_butiran_form").addClass("d-none");
            $("#wujud_semula_form").removeClass("d-none");
            $("#WujidDiv").addClass("d-none");
            $("#ActionDiv").removeClass("d-none");   
            $("#inlineCheckbox7").prop('checked', false);
        }


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

        var checkboxes = document.querySelectorAll(".myCheckbox");
        var checkboxData=[];

        var pp_id=document.getElementById("pp_id").value; console.log(pp_id);
        var justification=document.getElementById("sJustifikasi").value; //alert(justification);
        

        if(pp_id=='')
        {
            alert("please select project");
            return false;
        }
        
        var formData = new FormData();
            formData.append('project_id', pp_id);
            formData.append('justification', justification);
            
            

            checkboxes.forEach(function(checkbox) {
                var checkboxId = checkbox.id;
                var value = checkbox.checked ? "1" : "0";
                formData.append(checkboxId, value);
            });

            formData.append('user_id', {{Auth::user()->id}})
        
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            axios({
                method: "post",
                url: api_url+"api/noc/save-noc-data",
                data: formData,
                headers: { "Authorization": api_token, },
              })
                .then(function (response) { 

                    var response_data = response.data.data; console.log(response_data);

                              $("div.spanner").removeClass("show");
                              $("div.overlay").removeClass("show");

                            $('#add_role_sucess_modal').modal('show');
                            $("#tutup").click(function(){                    
                                    window.location.href = "/notis_perubahan/"+response_data.id;
                            })
                });

    }

        

</script>



