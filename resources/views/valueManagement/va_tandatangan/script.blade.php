<script>

    $("#kemuka_file_name").on( "change", function() {
      // var file_name2=$("#kemuka_file_name").val().replace(/C:\\fakepath\\/i, '')
      var fileInput = $("#kemuka_file_name")[0];
      var file = fileInput.files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function(event) {
          var fileData = event.target.result;

          // Store the file data and name in local storage
          localStorage.setItem("uploadedFileData", fileData);
          localStorage.setItem("uploadedFileName", file.name);

          // Display the uploaded file information
          $("#filePreview2").attr("src", "{{ asset('assets/pdf.jpg.png') }}");
          $("#fileName2").text(file.name);
          $("#Uploadfile2").addClass("d-none");
          $("#fileUploaded2").removeClass("d-none");
        };

        reader.readAsDataURL(file);
      }

    } );
    $("#removefile2").click(function(){
        // Remove the uploaded file data from local storage
        localStorage.removeItem("uploadedFileData");
        localStorage.removeItem("uploadedFileName");

        // Clear the file input field
        $("#kemuka_file_name").val("");

        // Clear the displayed file information
        $("#filePreview2").attr("src", "");
        $("#fileName2").text("");
        $("#Uploadfile2").removeClass("d-none");
        $("#fileUploaded2").addClass("d-none");
    })

    $(document).ready(function(){

      // Code for remain the uploaded file in kemuka_file_name even page is reload
      var storedFileData = localStorage.getItem("uploadedFileData");
      var storedFileName = localStorage.getItem("uploadedFileName");

      if (storedFileData && storedFileName) {
        // Display the uploaded file information
        $("#filePreview2").attr("src", "{{ asset('assets/pdf.jpg.png') }}"); // Change this to the appropriate image source
        $("#fileName2").text(storedFileName);
        $("#Uploadfile2").addClass("d-none");
        $("#fileUploaded2").removeClass("d-none");
      }
      // Code end

      $("#hant_redirect").prop("disabled", true);
      document.getElementById("hant_redirect").style.opacity = "0.5";

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        const api_token = "Bearer "+ window.localStorage.getItem('token')
          axios.defaults.headers.common["Authorization"] = api_token
          axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/project/va_tandatanganData?id="+{{$kod_projek}},
          responseType: 'json',            
      })
      .then(function (response) { 
            console.log(response.data.data)
            tabledata=response.data.data
            console.log(response.data.data.length)
            var count_1=0;             
            var count_2=0;
            var count_3=0;
            var count_4=0;
            var count_5=0;

            for(i=0;i<response.data.data.length;i++){
                if(tabledata[i].kategori_tandatangan==0){
                    var kategori_tandatangan='Ketua Fasilitator';
                    count_1=1;
                    $("select option[value*='0']").prop('disabled',true);
                }
                else if(tabledata[i].kategori_tandatangan==1){
                    var kategori_tandatangan='Ketua Pengarah JPS';
                    count_2=1;
                    $("select option[value*='1']").prop('disabled',true);
                }
                else if(tabledata[i].kategori_tandatangan==2){
                    var kategori_tandatangan='Kementerian';
                    count_3=1;
                    $("select option[value*='2']").prop('disabled',true);
                } else if(tabledata[i].kategori_tandatangan==3){
                    var kategori_tandatangan='BEASSA, Kementerian Ekonomi';
                    count_4=1;
                    $("select option[value*='3']").prop('disabled',true);
                } else{
                    var kategori_tandatangan='Kementerian Kewangan (MOF)';
                    count_5=1;
                    $("select option[value*='4']").prop('disabled',true);
                }
              $("#tandatanganTable tbody").append(
              '<tr id='+tabledata[i].id+'>'+
                '<td>'+
                  (i+1)+
                '</td>'+
                '<td>'+
                    '<p id="'+tabledata[i].kategori_tandatangan+'" class="validate d-none">'+tabledata[i].kategori_tandatangan+'</p>'+
                    kategori_tandatangan+
                '</td>'+
                '<td>'+
                  tabledata[i].tarikh_tandatangan+
                '</td>'+
                '<td>'+
                    '<a onclick="previewfile(\''+tabledata[i].id+'\',\''+tabledata[i].tandatangan_file_name+'\')" id="kemuka_file'+tabledata[i].id+'" style="text-decoration:none;color:black;cursor:pointer">'+tabledata[i].tandatangan_file_name+'</a>'+
                '</td>'+
              '</tr>')
            }

            if(count_1==1 && count_2==1 && count_3==1 && count_4==1 && count_5==1)
            {
              document.getElementById("inlineCheckbox1").disabled= false;

              // $("#hant_redirect").prop("disabled", false);
              // document.getElementById("hant_redirect").style.opacity = "1";

              // $("#simp_redirect").prop("disabled", false);
              // document.getElementById("simp_redirect").style.opacity = "1";

            }
            else
            {
              document.getElementById("inlineCheckbox1").disabled= true;

              // $("#hant_redirect").prop("disabled", true);
              // document.getElementById("hant_redirect").style.opacity = "0.5";

              // $("#simp_redirect").prop("disabled", true);
              // document.getElementById("simp_redirect").style.opacity = "0.5";

            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

      })
    })

    function previewfile(id,filename){
        const api_url = "{{env('API_URL')}}";  
                      console.log(api_url);
                      const api_token = "Bearer "+ localStorage.getItem('token');  
                      console.log(api_token);
                      update_user_api = api_url+"api/project/previewfile";
                      data_update = {'id':id};
                      var jsonString = JSON.stringify(data_update);
                      console.log(filename)
                      axios({
                        url: update_user_api + '?id=' + id,
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

    $("#terima_file_name").on( "change", function() {
        var file_name1=$("#terima_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview1").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName1").text(file_name1);
        $("#Uploadfile1").addClass('d-none')
        $("#fileUploaded1").removeClass('d-none')
    });

    $("#removefile1").click(function(){
      $("#terima_file_name").val('')
      $("#filePreview1").attr('src','');
      $("#Uploadfile1").removeClass('d-none')
        $("#fileUploaded1").addClass('d-none')
    })

    $("#simp_redirect").click(function(){

      $("#global_sucess_modal").modal('show');

      //location.reload();
    });


      $("#close-confirm").click(function(){ 
         location.reload();
      });

      $('#inlineCheckbox1').click(function(){
            if($(this).is(":checked")){
              $("#simp_redirect").prop("disabled", true);
              $("#hant_redirect").prop("disabled", false);

              document.getElementById("hant_redirect").style.opacity = "1";
              document.getElementById("simp_redirect").style.opacity = "0.5";
            }
            else if($(this).is(":not(:checked)")){
              $("#simp_redirect").prop("disabled", false);
              $("#hant_redirect").prop("disabled", true);

              document.getElementById("simp_redirect").style.opacity = "1";
              document.getElementById("hant_redirect").style.opacity = "0.5";
            }
        });

      $("#tutup-confirm").click(function(){ 
        var formData={
                                'pp_id':{{$kod_projek}},
                                'user_id':{{Auth::user()->id}},
                                'status': 2,
                        }

                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show");

                        const api_url = "{{env('API_URL')}}";  
                        pelakasanan_api = api_url+"api/project/noc_update";
                        const api_token = "Bearer "+ window.localStorage.getItem('token')
                        axios({
                        method: 'post',
                        url: pelakasanan_api,
                        responseType: 'json',
                        headers: {"Authorization": api_token },
                        data: formData,
                        })
                        .then(function (response) {
                                console.log(response.status)
                                if(response.status==200){
                                        // var url = "{{ route('vm.senaraiSelasaiMakmal') }}"
                                        // window.location.href = url     
                                        location.reload();
   
                                }     
                                $("div.spanner").addClass("show");
                                $("div.overlay").addClass("show")   
                        });
      });


    $("#hant_redirect").click(function(){

      var formData = new FormData();
          formData.append('kod', {{$kod_projek}});
          formData.append('update_status',1);
          formData.append('type','VA');

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show")


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


                  $("div.spanner").addClass("show");
                  $("div.overlay").addClass("show");
                  

                      $("#add_role_sucess_modal").modal('show');
                      $('#save_text').addClass('d-none'); 
                      $('#penjilidan_text').removeClass('d-none');  
     

                      $("#tutup").click(function(){
                        window.location.href = origin + '/senarai_selasai_makmal';
                      }) 
                  

                });
    });

    $("#va_tandatanganSaveBtn").click(function(){
      var Kategori_Tandatangan=$("#Kategori_Tandatangan").val();
      var Tarikh_Tandatangan=$("#Tarikh_Tandatangan").val();
      var terima_file_name=$("#terima_file_name").val();
      console.log(Kategori_Tandatangan)
      if(Kategori_Tandatangan==''){
        $("#Kategori_Tandatangan_error").text('Sila pilih kategori tandatangan')
        $("#terima_file_name_error").text('')
        $("#Tarikh_Tandatangan_error").text('')
        return false;
      }  
      if(Tarikh_Tandatangan==''){
        $("#Kategori_Tandatangan_error").text('')
        $("#Tarikh_Tandatangan_error").text('Sila pilih tarikh')
        $("#terima_file_name_error").text('')
        return false;

      }
      if(terima_file_name==''){
        $("#Kategori_Tandatangan_error").text('')
        $("#Tarikh_Tandatangan_error").text('')
        $("#terima_file_name_error").text('Sila muatnaik lampiran')
        return false;
      }

      if(Kategori_Tandatangan!=''&& Tarikh_Tandatangan!=''&& terima_file_name!=''){
        var allowedExtensions = /(\.pdf|\.png)$/i;
          if(!allowedExtensions.exec(terima_file_name)){
            $("#Kategori_Tandatangan_error").text('')
            $("#Tarikh_Tandatangan_error").text('')
                $("#terima_file_name_error").text('gunakan fail pdf atau png sahaja')
                return false;
          }

            $("#terima_file_name_error").text('')
            var file2=$("#terima_file_name").prop('files')[0];
          var formEl = document.forms.tandatanganForm;
          var formData = new FormData(formEl);
          formData.append('id',{{Auth::user()->id}});
          formData.append('kategori_tandatangan',Kategori_Tandatangan);
          formData.append('terima_file_name',file2);
          formData.append('tarikh_tandatangan',Tarikh_Tandatangan);
          formData.append('pp_id',{{$kod_projek}});

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");

          const api_url = "{{env('API_URL')}}";  
          pelakasanan_api = api_url+"api/project/tandatanganData";
          const api_token = "Bearer "+ window.localStorage.getItem('token')
            axios({
            method: 'post',
            url: pelakasanan_api,
            responseType: 'json',
            headers: { "Content-Type": "multipart/form-data","Authorization": api_token },
            data: formData
            })
            .then(function (response) {
                console.log(response)
                if(response.data.code == 200){
                  // Swal.fire(
                  //   'dokumen dimuat naik',
                  //   'success'
                  // ).then((result) => {
                  //   location.reload();
                  // })
                  $("#tutup").click(function(){
                    location.reload();
                  })
                  $("#add_role_sucess_modal").modal('show');
                      $("#sucess_modal").modal('hide');
                    }else {
                      $("#add_selenggara_data_modal").modal('hide');
                      $("#sucess_modal").modal('show');
                    }
            })  
      }
    })
</script>