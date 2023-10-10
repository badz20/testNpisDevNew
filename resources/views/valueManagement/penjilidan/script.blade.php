
<script>

$("#hant_redirect").prop("disabled", true);
      document.getElementById("hant_redirect").style.opacity = "0.5";

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

    $("#removefile3").click(function(){
      $("#edaran_file_name").val('')
      $("#filePreview3").attr('src','');
      $("#Uploadfile3").removeClass('d-none')
        $("#fileUploaded3").addClass('d-none')
    })

    $("#edaran_file_name").on( "change", function() {
      var file_name1=$("#edaran_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview3").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName3").text(file_name1);
        $("#Uploadfile3").addClass('d-none')
        $("#fileUploaded3").removeClass('d-none')
    } );



    $(document).ready(function(){

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            const api_url = "{{ env('API_URL') }}";
            const api_token = "Bearer "+ window.localStorage.getItem('token');

                axios.defaults.headers.common["Authorization"] = api_token;
                axios({
                        method: 'get',
                        url: "{{ env('API_URL') }}"+"api/project/get_penjidian_data",
                        responseType: 'json',
                        params: {
                            pp_id: {{$kod_projek}},
                            type: 'VA'
                        }            
                    })
                    .then(function (response) { console.log(response)
                        tabledata=response.data.data

                        var count_1=0;             
                        var count_2=0;
                        var count_3=0;
                        var peranan_name ='';

                        for(i=0;i<response.data.data.length;i++){

                            if(tabledata[i].tarikh)
                            {
                                var tarikh_kemukakan=tabledata[i].tarikh;
                            }
                            else
                            {
                                var tarikh_kemukakan='';
                            }

                            let link = '<lable onclick="previewfile(\''+tabledata[i].id+'\',\''+tabledata[i].penjilidan_file+'\',\''+tabledata[i].peranan+'\')">'+tabledata[i].penjilidan_file+'</a>';

                            if(tabledata[i].peranan=='Kemukakan')
                            {
                                count_1=1;
                                document.getElementById("tarikh_kemuka").value=tarikh_kemukakan;
                                $("#filePreview2").attr('src','{{ asset('assets/pdf.jpg.png') }}');
                                //$("#fileName2").text(link);
                                const myElement = document.getElementById('fileName2');
                                        myElement.innerHTML += link;
                                $("#Uploadfile2").addClass('d-none')
                                $("#fileUploaded2").removeClass('d-none')
                                $("#removefile2").addClass('d-none')
                                peranan_name='Tarikh Kemukakan Kepada Bahagian';
                            }

                            if(tabledata[i].peranan=='Terima')
                            {
                                count_2=1;
                                document.getElementById("tarikh_terima").value=tarikh_kemukakan;
                                $("#filePreview1").attr('src','{{ asset('assets/pdf.jpg.png') }}');
                                // $("#fileName1").text(link);
                                const myElement = document.getElementById('fileName1');
                                        myElement.innerHTML += link
                                $("#Uploadfile1").addClass('d-none')
                                $("#fileUploaded1").removeClass('d-none')
                                $("#removefile1").addClass('d-none')
                                peranan_name='Tarikh Terima Laporan Berjilid';
                            }

                            if(tabledata[i].peranan=='Edaran')
                            {
                                count_3=1;
                                document.getElementById("tarikh_edaran").value=tarikh_kemukakan;
                                $("#filePreview3").attr('src','{{ asset('assets/pdf.jpg.png') }}');
                                // $("#fileName3").text(link);
                                const myElement = document.getElementById('fileName3');
                                        myElement.innerHTML += link
                                $("#Uploadfile3").addClass('d-none')
                                $("#fileUploaded3").removeClass('d-none')
                                $("#removefile3").addClass('d-none')
                                peranan_name='Tarikh Edaran Laporan';
                            }

                            $("#tandatanganTable tbody").append(
                            '<tr id='+tabledata[i].id+'>'+
                                '<td>'+
                                (i+1)+
                                '</td>'+
                                '<td>'+
                                    '<p>'+peranan_name+'</p>'+
                                '</td>'+
                                '<td>'+tarikh_kemukakan+
                                '</td>'+
                                '<td>'+
                                    '<a onclick="previewfile(\''+tabledata[i].id+'\',\''+tabledata[i].penjilidan_file+'\',\''+tabledata[i].peranan+'\')" id="kemuka_file'+tabledata[i].id+'" style="text-decoration:none;color:black;cursor:pointer">'+tabledata[i].penjilidan_file+'</a>'+
                                '</td>'+
                            '</tr>')
                        
                        };

                        if(count_1==1 && count_2==1 && count_3==1)
                        { 
                            $("#hant_redirect").prop("disabled", false);
                            document.getElementById("hant_redirect").style.opacity = "1";
                        }
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");

                        if(count_1!=1)
                        {
                           disableBerjilid();
                           disableedaran();
                        }
                        else if(count_1==1 && count_2!=1)
                        {
                            disableKepada();
                            disableedaran();
                        }
                        else if(count_2==1 && count_3!=1)
                        {
                            disableKepada();
                            disableBerjilid();
                        }
                        else
                        {
                            disableKepada();
                            disableBerjilid();
                            disableedaran();
                        }

                });

                function disableKepada(){
                    document.getElementById("tarikh_kemuka").disabled=true;
                    document.getElementById("kemuka_file_name").disabled=true;
                }

                function disableBerjilid(){
                    document.getElementById("tarikh_terima").disabled=true;
                    document.getElementById("terima_file_name").disabled=true;
                }

                function disableedaran(){
                    document.getElementById("tarikh_edaran").disabled=true;
                    document.getElementById("edaran_file_name").disabled=true;
                }

        $("#penjilidan_simpan").click(function()
        {            
            // var lampiran=0;
            // if({{$user}}==3)
            // {
            //     var date = document.getElementById("tarikh_terima").value;
            //     var date1 = '';
            //     var file_name = $("#terima_file_name").prop('files')[0];

            //     if(date==''){
            //         $("#tarikh_terima_error").text('Sila pilih Tarikh')
            //         return false;
            //     }

            //     if(file_name=='' || file_name==undefined){
            //         $("#terima_file_name_error").text('Sila pilih fail')
            //         return false;
            //     }

            //     $("#tarikh_terima_error").text('')
            //     $("#terima_file_name_error").text('')
            // }
            // else
            // {

                var date = document.getElementById("tarikh_kemuka").value; 
                var file_name = $("#kemuka_file_name").prop('files')[0];
                if (typeof file_name === 'undefined') {
                    file_name='';
                } 


                // if(date==''){
                //     $("#tarikh_kemuka_error").text('Sila pilih Tarikh')
                //     return false;
                // }
                
                // if(file_name=='' || file_name==undefined){
                //     $("#kemuka_file_name_error").text('Sila pilih fail')
                //     return false;
                // }

                // $("#tarikh_kemuka_error").text('')
                // $("#kemuka_file_name_error").text('')

                var date1 = document.getElementById("tarikh_terima").value; 
                var file_name1 = $("#terima_file_name").prop('files')[0];
                if (typeof file_name1 === 'undefined') {
                    file_name1='';
                } 

                // if(date1==''){
                //     $("#tarikh_terima_error").text('Sila pilih Tarikh')
                //     return false;
                // }
                
                // if(file_name1=='' || file_name1==undefined){
                //     $("#terima_file_name_error").text('Sila pilih fail')
                //     return false;
                // }

                // $("#tarikh_terima_error").text('')
                // $("#terima_file_name_error").text('')

                var date2 = document.getElementById("tarikh_edaran").value; 
                var file_name2 = $("#edaran_file_name").prop('files')[0];
                if (typeof file_name2 === 'undefined') {
                    file_name2='';
                } 

                // if(date2==''){
                //     $("#tarikh_edaran_error").text('Sila pilih Tarikh')
                //     return false;
                // }
                
                // if(file_name2=='' || file_name2==undefined){
                //     $("#edaran_file_name_error").text('Sila pilih fail')
                //     return false;
                // }

                // $("#tarikh_edaran_error").text('')
                // $("#edaran_file_name_error").text('')

                // if (document.getElementById('inlineCheckbox1').checked) {
                //     lampiran=1;
                // }
            //}

            var formData = new FormData();

                formData.append('pp_id', {{$kod_projek}});
                formData.append('tarikh_kemukakan', date);
                formData.append('kemukakan_file', file_name);

                formData.append('tarikh_terima', date1);
                formData.append('terima_file', file_name1);

                formData.append('tarikh_edaran', date2);
                formData.append('edaran_file', file_name2);

                // formData.append('lampiran', lampiran);

                formData.append('user_id', {{Auth::user()->id}})
                formData.append('type', 'VA')

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");


            const api_url = "{{ env('API_URL') }}";
            const api_token = "Bearer "+ window.localStorage.getItem('token');

            data_url = api_url+"api/project/add_penjidian_data";

                axios.defaults.headers.common["Authorization"] = api_token
                axios({
                    method: 'post',
                    url: data_url,
                    data: formData
                })
                .then(function (response) { console.log(response)

                    $("#tutup").click(function(){
                        location.reload();
                    })
                    $("#add_role_sucess_modal").modal('show');

                });


            
        });

        $("#hant_redirect").click(function(){

            var formData = new FormData();
                formData.append('kod', {{$kod_projek}});
                formData.append('update_status',2);
                formData.append('type','VA');


            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            const api_url = "{{ env('API_URL') }}";
            const api_token = "Bearer "+ window.localStorage.getItem('token');

            data_url = api_url+"api/project/update_penjidian_data";

                    axios.defaults.headers.common["Authorization"] = api_token
                    axios({
                        method: 'post',
                        url: data_url,
                        data: formData
                    })
                    .then(function (response) { console.log(response)


                        $("#tutup-confirm").click(function(){
                            window.location.href = origin + '/senarai_selasai_makmal';
                        })
                        $("#global_sucess_modal").modal('show');


                    });
        });

    });


    function previewfile(id,filename,peranan){
        const api_url = "{{env('API_URL')}}";  
                      console.log(api_url);
                      const api_token = "Bearer "+ localStorage.getItem('token');  
                      console.log(api_token);
                      update_user_api = api_url+"api/project/preview_penjilidanfile";
                      console.log(filename)
                      axios({
                        url: update_user_api + '?id=' + id+'&type=VA'+'&pearanan='+peranan,
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