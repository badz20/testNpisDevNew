<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

$(document).ready(function () {  

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        $("#lulus_btn").prop("disabled", false);
        document.getElementById("lulus_btn").style.opacity = "0.5";
        $("#lulus").prop("disabled", false);
        document.getElementById("lulus").style.opacity = "0.5";

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);    
        axios({
        method: 'get',
        url: api_url+"api/noc/noc-kementerian-silling-data/" + {{$id}},
        headers: {"Authorization": api_token },
        responseType: 'json'
        })
        .then(function (response) { 
            var result_data =response.data.data;
            var project_data = response.data.data.noc;
            var kementerian_data = response.data.data.noc_kementerian;
            var noc_economi = response.data.data.noc_economi;

            if(project_data!=null)
            {
                if(project_data.status==41)
                {
                    document.getElementById('kementerian_status').classList.add("yellow");
                    document.getElementById('economi_date').disabled=true;
                    document.getElementById('economi_surat_date').disabled=true;
                    // document.getElementById('inlineRadio1').disabled=true;
                    // document.getElementById('inlineRadio2').disabled=true;
                    document.getElementById('economi_hanter_file_name').disabled=true;
                    //document.getElementById('catatan').disabled=true;
                    document.getElementById('economi_surat_file_name').disabled=true;
                    $('#lulus_btn').addClass('d-none');
                    $('#simpan_btn').addClass('d-none');
                }
                else  if(project_data.status==42)
                {
                    document.getElementById('epu_status').classList.add("yellow");
                    document.getElementById('kelulusan_date').disabled=true;
                    document.getElementById('kementerian_file_name').disabled=true;
                    document.getElementById('kementerian_date').disabled=true;
                    document.getElementById('kementerian_file_name').disabled=true;

                    $('#lulus').addClass('d-none');
                    $('#simpan').addClass('d-none');
                    $('#removefile').addClass('d-none');
                    $('#removefile3').addClass('d-none');
                }
                else  if(project_data.status==44)
                {
                    document.getElementById('lulus_stat').classList.add("green_stat");
                    document.getElementById('economi_date').disabled=true;
                    document.getElementById('economi_surat_date').disabled=true;
                    // document.getElementById('inlineRadio1').disabled=true;
                    // document.getElementById('inlineRadio2').disabled=true;
                    document.getElementById('kelulusan_date').disabled=true;
                    document.getElementById('kementerian_date').disabled=true;
                    document.getElementById('kementerian_file_name').disabled=true;
                    document.getElementById('economi_hanter_file_name').disabled=true;
                    //document.getElementById('catatan').disabled=true;
                    document.getElementById('economi_surat_file_name').disabled=true;

                    $('#batal').addClass('d-none');
                    $('#simpan').addClass('d-none');
                    $('#batal_btn').addClass('d-none');
                    $('#simpan_btn').addClass('d-none');
                    $('#removefile').addClass('d-none');
                    $('#removefile3').addClass('d-none');
                    $('#lulus').addClass('d-none');
                    $('#lulus_btn').addClass('d-none');
                }
                else  if(project_data.status==43 || project_data.status==45)
                {
                    document.getElementById('tidak_lulus_stat').classList.add("green_stat");
                    document.getElementById('economi_date').disabled=true;
                    document.getElementById('economi_surat_date').disabled=true;
                    // document.getElementById('inlineRadio1').disabled=true;
                    document.getElementById('kelulusan_date').disabled=true;
                    document.getElementById('kementerian_date').disabled=true;
                    document.getElementById('kementerian_file_name').disabled=true;
                    document.getElementById('economi_hanter_file_name').disabled=true;
                    //document.getElementById('catatan').disabled=true;
                    document.getElementById('economi_surat_file_name').disabled=true;

                    $('#batal').addClass('d-none');
                    $('#simpan').addClass('d-none');
                    $('#batal_btn').addClass('d-none');
                    $('#simpan_btn').addClass('d-none');
                    $('#removefile').addClass('d-none');
                    $('#removefile3').addClass('d-none');
                    $('#lulus').addClass('d-none');
                    $('#lulus_btn').addClass('d-none');
                }
                else
                {
                    document.getElementById('economi_date').disabled=true;
                    document.getElementById('economi_surat_date').disabled=true;
                    // document.getElementById('inlineRadio1').disabled=true;
                    // document.getElementById('inlineRadio2').disabled=true;
                    document.getElementById('epu_status').classList.add("yellow");
                    document.getElementById('kelulusan_date').disabled=true;
                    document.getElementById('kementerian_date').disabled=true;
                    document.getElementById('kementerian_file_name').disabled=true;
                    document.getElementById('economi_hanter_file_name').disabled=true;
                    //document.getElementById('catatan').disabled=true;
                    document.getElementById('economi_surat_file_name').disabled=true;

                    $('#batal').addClass('d-none');
                    $('#simpan').addClass('d-none');
                    $('#batal_btn').addClass('d-none');
                    $('#simpan_btn').addClass('d-none');
                    $('#removefile').addClass('d-none');
                    $('#removefile3').addClass('d-none');
                    $('#lulus').addClass('d-none');
                    $('#lulus_btn').addClass('d-none');
                }
            }

            if(kementerian_data!='')
            {
                // var data= "'"+kementerian_data.id+"'"+","+"'"+kementerian_data.kementerian_file_name+"'"+","+"'"+'kementerian_file_name'+"'"; //console.log(data);
                // let html= `<div class="" style="text-align: left;">
                //                   <label for="" class=" NOC_label">`+kementerian_data.kementerian_tarikh+`</label>
                //                   <label onclick="previewfile(`+data+`)" for="" class="NOC_label_uploaded_file" style="cursor:pointer;">`+kementerian_data.kementerian_file_name+`</label>
                //                 </div>`;

                // $('#kem_list').append(html);
                document.getElementById('kementerian_date').value = kementerian_data.kementerian_tarikh;


                if(result_data.noc_kementerian_file)
                {
                    $("#filePreview").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                    $("#fileName").text(result_data.noc_kementerian_file.file_name);
                    $("#Uploadfile").addClass('d-none')
                    $("#fileUploaded").removeClass('d-none')
                    $("#filePreview").click(function() {
                        downloadDoc('kementerian_file_name',result_data.noc_kementerian_file);
                    });
                }

                document.getElementById('kelulusan_date').value = kementerian_data.kelulusan_tarikh;
                if(result_data.noc_kelulusan_file)
                {
                    $("#filePreview3").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                    $("#fileName3").text(result_data.noc_kelulusan_file.file_name);
                    $("#Uploadfile3").addClass('d-none')
                    $("#fileUploaded3").removeClass('d-none')
                    $("#filePreview3").click(function() {
                        downloadDoc('kelulusan_file_name',result_data.noc_kelulusan_file);
                    });
                }

                $("#lulus").prop("disabled", false);
                document.getElementById("lulus").style.opacity = "1";
            }
            else
            {
                $('#kem_list').addClass('d-none');
                $("#lulus").prop("disabled", true);
                document.getElementById("lulus").style.opacity = "0.5";
            }

            if(noc_economi!='') 
            {

                document.getElementById('economi_date').value = noc_economi.economi_tarikh;


                if(result_data.noc_economi_kementerian_file)
                {
                    $("#filePreview1").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                    $("#fileName1").text(result_data.noc_economi_kementerian_file.file_name);
                    $("#Uploadfile1").addClass('d-none')
                    $("#fileUploaded1").removeClass('d-none')
                    $("#filePreview1").click(function() {
                        downloadDoc('noc_economi_kementerian_file',result_data.noc_economi_kementerian_file);
                    });
                }

                document.getElementById('economi_surat_date').value = noc_economi.economi_surat_tarikh;
                if(result_data.noc_economi_kelulusan_file)
                {
                    $("#filePreview2").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                    $("#fileName2").text(result_data.noc_economi_kelulusan_file.file_name);
                    $("#Uploadfile2").addClass('d-none')
                    $("#fileUploaded2").removeClass('d-none')
                    $("#filePreview2").click(function() {
                        downloadDoc('noc_economi_kelulusan_file',result_data.noc_economi_kelulusan_file);
                    });
                }

                $("#lulus_btn").prop("disabled", false);
                document.getElementById("lulus_btn").style.opacity = "1";
            }
            else
            {
                $("#lulus_btn").prop("disabled", true);
                document.getElementById("lulus_btn").style.opacity = "0.5";

            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        });

});

$("#kementerian_file_name").on( "change", function() {
      var file_name=$("#kementerian_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName").text(file_name);
        $("#Uploadfile").addClass('d-none')
        $("#fileUploaded").removeClass('d-none')

});

$("#removefile").click(function(){
      $("#kementerian_file_name").val('')
      $("#filePreview").attr('src','');
      $("#Uploadfile").removeClass('d-none')
      $("#fileUploaded").addClass('d-none')
})


$("#economi_hanter_file_name").on( "change", function() {
      var file_name=$("#economi_hanter_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview1").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName1").text(file_name);
        $("#Uploadfile1").addClass('d-none')
        $("#fileUploaded1").removeClass('d-none')

});

$("#removefile1").click(function(){
      $("#economi_hanter_file_name").val('')
      $("#filePreview1").attr('src','');
      $("#Uploadfile1").removeClass('d-none')
      $("#fileUploaded1").addClass('d-none')
})

$("#kelulusan_file_name").on( "change", function() {
      var file_name=$("#kelulusan_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview3").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName3").text(file_name);
        $("#Uploadfile3").addClass('d-none')
        $("#fileUploaded3").removeClass('d-none')

});

$("#removefile3").click(function(){
      $("#kelulusan_file_name").val('')
      $("#filePreview3").attr('src','');
      $("#Uploadfile3").removeClass('d-none')
      $("#fileUploaded3").addClass('d-none')
})


$("#economi_surat_file_name").on( "change", function() {
      var file_name=$("#economi_surat_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview2").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName2").text(file_name);
        $("#Uploadfile2").addClass('d-none')
        $("#fileUploaded2").removeClass('d-none')

});

$("#removefile2").click(function(){
      $("#economi_surat_file_name").val('')
      $("#filePreview2").attr('src','');
      $("#Uploadfile2").removeClass('d-none')
      $("#fileUploaded2").addClass('d-none')
})

function downloadDoc(type,medias)
    {
        console.log(medias)
        if(medias) {

                if(medias.collection_name == type) {
                    const api_url = "{{env('API_URL')}}";  
                    var api_token = "Bearer " + window.localStorage.getItem('token');

                    parameters = {
                        model_id : medias.id,
                        mode_type_id : medias.model_id,
                        model_type : medias.model_type,
                        collection_name : medias.collection_name
                    }
                    axios({
                            url: api_url+"api/media/download",
                            method: 'GET',
                            headers: { "Authorization": api_token, },
                            params: parameters,
                            responseType: 'blob', // important
                        }).
                        then((response) => {
                            console.log(response.data);
                            const url = window.URL.createObjectURL(response.data);
                            const link = document.createElement('a');
                            link.href = url;
                            link.setAttribute('download', medias.file_name);
                            document.body.appendChild(link);
                            link.click();
                            URL.revokeObjectURL(url);
                        });
                }
        }
    }

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

$("#batal").click(function(){
        $('#global_sucess_modal').modal('show');

        $("#tutup-global").click(function(){  
            $('#global_sucess_modal').modal('hide');                  
            UpdateStatus(45);
        })

        $("#close-global").click(function(){                    
            location.reload();
        })
});

$("#lulus_btn").click(function(){
    var formData = new FormData();
        formData.append('noc_id', {{$id}});
        formData.append('status',44);

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        axios({
                    method: 'post',
                    url: api_url+"api/noc/update_noc_status",
                    responseType: 'json',
                    data: formData
            })
            .then(function (response) { 
                        //console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        window.location.href = "/peruntukan_siling_tahunan";

            }) 
            .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
            })

});

$("#lulus").click(function(){
    var formData = new FormData();
        formData.append('noc_id', {{$id}});
        formData.append('status',42);

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
              
        axios.defaults.headers.common["Authorization"] = api_token

        axios({
                    method: 'post',
                    url: api_url+"api/noc/update_noc_status",
                    responseType: 'json',
                    data: formData
            })
            .then(function (response) { 
                        //console.log(response)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        location.reload();
            }) 
            .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
            })

});

$("#simpan").click(function(){

        var kementerian_date=$("#kementerian_date").val(); console.log(kementerian_date);
        if(kementerian_date==''){
            $("#kementerian_date_error").text('Sila pilih tarikh')
            return false;
        } 

        $("#kementerian_date_error").text('');

        var kementerian_file=$("#kementerian_file_name").val();
        if(kementerian_file==''){
            $("#kementerian_file_name_error").text('Sila pilih fail')
            return false;
        }  

        $("#kementerian_file_name_error").text('');

        var allowedExtensions = /(\.pdf|\.png|\.jpg)$/i;
          if(!allowedExtensions.exec(kementerian_file)){
                $("#kementerian_file_name_error").text('gunakan fail pdf atau png sahaja')
                return false;
          }

        $("#kementerian_file_name_error").text('');

        var kelulusan_date=$("#kelulusan_date").val(); console.log(kelulusan_date);
        if(kelulusan_date==''){
            $("#kelulusan_date_error").text('Sila pilih tarikh')
            return false;
        } 

        $("#kelulusan_date_error").text('');

        var kelulusan_file=$("#kelulusan_file_name").val();
        if(kelulusan_file==''){
            $("#kelulusan_file_name_error").text('Sila pilih fail')
            return false;
        }  

        $("#kelulusan_file_name_error").text('');

        var allowedExtensions = /(\.pdf|\.png|\.jpg)$/i;
          if(!allowedExtensions.exec(kementerian_file)){
                $("#kelulusan_file_name_error").text('gunakan fail pdf atau png sahaja')
                return false;
          }

        $("#kelulusan_file_name_error").text('');

        const api_url = "{{env('API_URL')}}";  
        const api_token = "Bearer "+ window.localStorage.getItem('token'); 

        var file=$("#kementerian_file_name").prop('files')[0];
        var file1=$("#kelulusan_file_name").prop('files')[0];


        var formData = new FormData();
            formData.append('kementerian_file',kementerian_file);
            formData.append('kementerian_file_name',file);
            formData.append('kementerian_date',kementerian_date);
            formData.append('kelulusan_file_name',file1);
            formData.append('kelulusan_date',kelulusan_date);
            formData.append('id', {{$id}});
            formData.append('user_id', {{Auth::user()->id}});
            formData.append('status', 42);

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
                
         axios({
                    method: "post",
                    url: api_url+"api/noc/kementerian-silling-update",
                    data: formData,
                    headers: {"Authorization": api_token },
                })
                .then(function (response) {

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                    $('#add_role_sucess_modal').modal('show');
                        $("#tutup").click(function(){                    
                                location.reload();
                        })

                });
    
});

$("#simpan_btn").click(function(){

        var economi_date=$("#economi_date").val(); //console.log(kementerian_date);
        if(economi_date==''){
            $("#economi_date_error").text('Sila pilih tarikh')
            return false;
        } 
        $("#economi_date_error").text('');

        var economi_hanter_file_name=$("#economi_hanter_file_name").val();
        if(economi_hanter_file_name==''){
            $("#economi_hanter_file_name_error").text('Sila pilih fail')
            return false;
        }  
        $("#economi_hanter_file_name_error").text('');
        var allowedExtensions = /(\.pdf|\.png|\.jpg)$/i;
        if(!allowedExtensions.exec(economi_hanter_file_name)){
                $("#economi_hanter_file_name_error").text('gunakan fail pdf atau png sahaja')
                return false;
        }
        $("#economi_hanter_file_name_error").text('');

        var economi_surat_date=$("#economi_surat_date").val(); //console.log(kementerian_date);
        if(economi_surat_date==''){
            $("#economi_surat_date_error").text('Sila pilih tarikh')
            return false;
        } 
        $("#economi_surat_date_error").text('');

        var economi_surat_file_name=$("#economi_surat_file_name").val();
        if(economi_surat_file_name==''){
            $("#economi_surat_file_name_error").text('Sila pilih fail')
            return false;
        }  
        $("#economi_surat_file_name_error").text('');
        var allowedExtensions = /(\.pdf|\.png|\.jpg)$/i;
        if(!allowedExtensions.exec(economi_surat_file_name)){
                $("#economi_surat_file_name_error").text('gunakan fail pdf atau png sahaja')
                return false;
        }
        $("#economi_surat_file_name_error").text('');

        const api_url = "{{env('API_URL')}}";  
        const api_token = "Bearer "+ window.localStorage.getItem('token'); 

        var file=$("#economi_hanter_file_name").prop('files')[0];
        var file1=$("#economi_surat_file_name").prop('files')[0];

        var formData = new FormData();
            formData.append('economi_hanter_file_name',file);
            formData.append('economi_surat_file_name',file1);
            formData.append('economi_date',economi_date);
            formData.append('economi_surat_date',economi_surat_date);
            formData.append('id', {{$id}});
            formData.append('user_id', {{Auth::user()->id}});
            formData.append('status',status);

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
                
        axios({
                    method: "post",
                    url: api_url+"api/noc/kementerian-silling-economi-update",
                    data: formData,
                    headers: {"Authorization": api_token },
                })
                .then(function (response) {

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                    $('#add_role_sucess_modal').modal('show');
                        $("#tutup").click(function(){                    
                                location.reload();
                        })

                });

});

function UpdateStatus(status)
{
        const api_url = "{{env('API_URL')}}";  
        const api_token = "Bearer "+ window.localStorage.getItem('token'); 

         var id=$("#noc_id").val();
         var formData = new FormData();
                formData.append('id', {{$id}});
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

function previewfile(id,filename,type){
        const api_url = "{{env('API_URL')}}";  
        const api_token = "Bearer "+ localStorage.getItem('token');  

        update_user_api = api_url+"api/noc/previewfile";
        data_update = {'id':id, 'type':type};
        var jsonString = JSON.stringify(data_update);
                      axios({
                        url: update_user_api + '?id=' + id+'&type=' + type,
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