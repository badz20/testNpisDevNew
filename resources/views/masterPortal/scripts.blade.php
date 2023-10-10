@section('scripts')
@include('masterPortal.Kandungan.contact.contact_script')
@include('masterPortal.Kandungan.pengumumam.pengumumam_script')

    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>   
    <script>
                      $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token')
        axios.defaults.headers.common["Authorization"] = api_token
        const landingImages = []
        </script> 
    <script>
      function removeImage(uuid)
      {
        console.log('remove landing image')
        var index = landingImages.indexOf(uuid);
          if (index !== -1) {
            landingImages.splice(index, 1);
          }
          id = "'" +'#' + uuid + "'"
          console.log(id)
          $('#' + uuid).remove();
          console.log(landingImages)
      }
        
      $(document).ready(function () {   
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
        
        document.getElementsByName("mapCode")[0].addEventListener('change', updateMap);
        document.getElementById("image_preview_src").style.display = 'none';
        document.getElementById("image_preview_pengum").style.display = 'none';
        document.getElementById("image_preview_footer").style.display = 'none'; 
        document.getElementById("image_preview_footer_div_2").style.display = 'none'; 
        $('#tambah_pengumuman').removeClass('d-flex');
        $('#tambah_pengumuman').addClass('close-button');



        axios({
            method: 'get',
            url: api_url+"api/portal/header",
            responseType: 'json',            
        })
        .then(function (response) {                 
                console.log('header')
                console.log(response.data.data)
                data = response.data.data; console.log(data);
                if(data.logo1)
                {
                  $('#logo1_src').val(data.logo1)
                  //document.getElementById("logo1_src").value=data.log1;
                  document.getElementById("upload_logo_1").style.display = 'none';
                  document.getElementById("image_preview_1").style.display = 'block';
                  var logo_1 = data.logo1.replace('http://localhost', 'http://localhost'); console.log(logo_1)
                  $('#Logo_img_1').attr('src', logo_1);
                  document.getElementById("header_logo_name_1").innerHTML = data.media[0].file_name;
                  var fSExt_1 = new Array('Bytes', 'KB', 'MB', 'GB');
                      fSize_1 = data.media[0].size; i=0;while(fSize_1>900){fSize_1/=1024;i++;}
                      docu_size_1 = (Math.round(fSize_1*100)/100)+' '+fSExt_1[i]; 
                  document.getElementById("header_log_size_1").innerHTML = docu_size_1;
                }
                else
                {
                  document.getElementById("upload_logo_1").style.display = 'block';
                  document.getElementById("image_preview_1").style.display = 'none';
                }
                if(data.logo2)
                {
                  $('#logo2_src').val(data.logo2)
                  //document.getElementById("logo2_src").value=data.log2;
                  document.getElementById("upload_logo_2").style.display = 'none';
                  document.getElementById("image_preview_2").style.display = 'block';
                  var logo_2 = data.logo2.replace('http://localhost', 'http://localhost'); console.log(logo_2)
                  $('#Logo_img_2').attr('src', logo_2);
                  document.getElementById("header_logo_name_2").innerHTML = data.media[1].file_name;
                  var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                      fSize_2 = data.media[1].size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                      docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
                  document.getElementById("header_log_size_2").innerHTML = docu_size_2;
                }
                else
                {
                  document.getElementById("upload_logo_2").style.display = 'block';
                  document.getElementById("image_preview_2").style.display = 'none';
                }
                if(data.logo3)
                {
                  $('#logo3_src').val(data.logo3)
                  //document.getElementById("logo3_src").value=data.log3;
                  document.getElementById("upload_logo_3").style.display = 'none';
                  document.getElementById("image_preview_3").style.display = 'block';
                  var logo_3 = data.logo3.replace('http://localhost', 'http://localhost'); console.log(logo_3)
                  $('#Logo_img_3').attr('src', logo_3);
                  document.getElementById("header_logo_name_3").innerHTML = data.media[2].file_name;
                  var fSExt_3 = new Array('Bytes', 'KB', 'MB', 'GB');
                      fSize_3 = data.media[2].size; i=0;while(fSize_3>900){fSize_3/=1024;i++;}
                      docu_size_3 = (Math.round(fSize_3*100)/100)+' '+fSExt_3[i]; 
                  document.getElementById("header_log_size_3").innerHTML = docu_size_3;
                }
                else
                {
                  document.getElementById("upload_logo_3").style.display = 'block';
                  document.getElementById("image_preview_3").style.display = 'none';
                }
                //data = response.data.data
                    
                //location.reload()
        })

        axios({
            method: 'get',
            url: api_url+"api/portal/landing",
            responseType: 'json',            
        })
        .then(function (response) {                 
                data = response.data.data    
                console.log(data)            
                if(response.data.data.is_video == 0) {
                    $('#landing_tajuk_image').val(data.tajuk);
                    document.getElementById("landing_tajuk_image").disabled = false; 
                    document.getElementById("landing_tajuk_video").disabled = true; 
                    document.getElementById("landingImages").disabled = false; 
                    document.getElementById("landing_video").disabled = true;


                    //$('#peng_image').attr('src', data.media[0].original_url)
                    $("#landing_radio_image").prop("checked", true);
                    var total_file=data.media.length;
                    var cross = "{{ asset('assets/images/close_img.png') }}"                    
                        for(var i=0;i<total_file;i++)
                        {                          
                          if(data.media[i].collection_name == 'slide_images'){
                            landingImages.push(data.media[i].uuid);
                            var logos = data.media[i].original_url.replace('http://localhost', 'http://localhost'); console.log(logos)
                            var template =    '<div class="uploaded_img_preview_container" id="'+ data.media[i].uuid+ '"><div class="uploaded_img">' +
                            '<img src="' +logos + '" alt=""  width="100" height="100"/>' +
                                '</div><div class="uploaded_img_details">'+
                                '<h5>' +data.media[i].file_name+  '</h5>' +
                                '<p class="flie_size"> ' + Math.ceil(data.media[i].size/1024) +' KB</p>' +
                                '</div><button type="button" onclick="removeImage(\'' +data.media[i].uuid+ '\')" class="remove_image"><img src="'+cross+'" alt="" /></button></div>'                
                                $('#image_preview').append(template);
                                $("#breakingNewsId").val(response.data.data2.id);
                                $("#BreakingNews").val(response.data.data2.news);
                          }
                          
                        //$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
                        }
                        console.log(landingImages)
                }else {
                    $('#landing_tajuk_video').val(data.tajuk)                    
                    $("#landing_radio_video").prop("checked", true);

                    document.getElementById("landing_tajuk_image").disabled = true; 
                    document.getElementById("landing_tajuk_video").disabled = false; 
                    document.getElementById("landingImages").disabled = true; 
                    document.getElementById("landing_video").disabled = false;



                    for (const [key, value] of Object.entries(data.media_details)) {  
                      var logos = value.original_url.replace('http://localhost', 'http://localhost'); console.log(logos)                  
                        video_template ='<video width="270" height="150" controls>' +
                              '<source src="" id="video_preview">' +
                              'Your browser does not support HTML5 video.' +
                                '</video>'
                        $('#video_src').empty()
                        $('#video_src').append(video_template);
                        $('#video_preview').attr('src', logos)
                        $("#breakingNewsId").val(response.data.data2.id);
                        $("#BreakingNews").val(response.data.data2.news);
                    }
                    
                }         
                //location.reload()
        })

        axios({
            method: 'get',
            url: api_url+"api/portal/pengenalan",
            responseType: 'json',            
        })
        .then(function (response) {                 
                data = response.data.data      
                console.log(data)          
                if(response.data.data.is_video == 0) {
                    $('#pengenalan_tajuk_image').val(data.tajuk);

                    document.getElementById("pengenalan_tajuk_image").disabled = false; 
                    document.getElementById("pengenalan_tajuk_video").disabled = true; 
                    document.getElementById("pengenalan_image").disabled = false; 
                    document.getElementById("pengenalan_video").disabled = true;
                    CKEDITOR.instances['video_keterangan_textarea'].setReadOnly(true);
                    CKEDITOR.instances['imej_keterangan_textarea'].setReadOnly(false);

                    CKEDITOR.instances['imej_keterangan_textarea'].setData(data.keterangan)
                    if(data.media.length > 0){

                      document.getElementById("upload_img_src").style.display = 'none';
                      document.getElementById("image_preview_src").style.display = 'block'; 

                        // img = '<img src="" id="pengenalan_image_src" width="200" height="200">'
                        // $('#img_src').append(img);
                        // $('#pengenalan_image_src').attr('src', data.media[0].original_url)
                        for (const [key, value] of Object.entries(data.media_details)) {         
                          var logos = value.original_url.replace('http://localhost', 'http://localhost'); console.log(logos)                                 
                            img = '<img src="" id="pengenalan_image_src" width="200" height="200">'
                           // $('#img_src').append(img);
                            $('#img_src').attr('src', logos);
                            //$('#pengenalan_image_src').attr('src', logos)                            
                        }
                    }
                    $("#pengenalan_radio_image").prop("checked", true);
                }else {
                    $('#pengenalan_tajuk_video').val(data.tajuk);
                    document.getElementById("pengenalan_tajuk_image").disabled = true; 
                    document.getElementById("pengenalan_tajuk_video").disabled = false; 
                    document.getElementById("pengenalan_image").disabled = true; 
                    document.getElementById("pengenalan_video").disabled = false;

                    CKEDITOR.instances['video_keterangan_textarea'].setReadOnly(false);
                    CKEDITOR.instances['imej_keterangan_textarea'].setReadOnly(true);

                    CKEDITOR.instances['video_keterangan_textarea'].setData(data.keterangan)
                    $("#pengenalan_radio_video").prop("checked", true);
                    
                    for (const [key, value] of Object.entries(data.media_details)) {      
                      var logo_video = value.original_url.replace('http://localhost', 'http://localhost'); console.log(logos)                                    
                        video_template ='<video width="270" height="150" controls>' +
                              '<source src="" id="video_preview_peng">' +
                              'Your browser does not support HTML5 video.' +
                                '</video>'
                        $('#video_src_peng').empty()
                        $('#video_src_peng').append(video_template);
                        $('#video_preview_peng').attr('src', logo_video)
                        
                    }
                    // if(data.media.length > 0){
                    //     img = '<img src="" id="peng_video" width="200" height="200">'
                    //     $('#video_src').append(img);
                    //     $('#peng_video').attr('src', data.media[0].original_url)
                    // }
                    
                }                                
        })

        axios({
            method: 'get',
            url: api_url+"api/portal/footer",
            responseType: 'json',            
        })
        .then(function (response) { 
                
                data = JSON.parse(response.data.data.json_values)
                // console.log(response.data.data.media[0].original_url)
                $('#copyright').val(data.copyright)
                $('#total_visit').val(data.total_visit)
                $('#total_visit_today').val(data.total_visit_today)
                $('#total_visit_month').val(data.total_visit_month)
                $('#total_visit_year').val(data.total_visit_year)
                $("#logo_url").val(data.logo_url)
                if(response.data.data.imeg){
                  $("#image_preview_footer_div_2").addClass('d-block');
                  $("#upload_logo_footer").addClass("d-none")
                  $('#Imeg_footer_src').attr('src', response.data.data.imeg)
                }
                if(response.data.data.logo){
                  $("#image_preview_footer").addClass('d-block');
                  $("#upload_Imeg_footer").addClass("d-none")
                  $('#Logo_footer_src').attr('src', response.data.data.logo)
                  
                }
                // $("#image_preview_footer").addClass('d-block');
                // $("#upload_logo_footer").addClass("d-none")
                // $('#Logo_footer_src').attr('src', response.data.data.media[0].original_url)
                console.log('footer')
                // console.log(response.data.data.media[0].id)
                $("#remove_logo_footer").val(response.data.data.media[1].id)
                $("#remove_logo_footer_div_2").val(response.data.data.media[0].id)
        })

        $("#headerSubmit").click(function(event){ 
            console.log('header form submitted');
            var formEl = document.forms.headerLogoForm;
            var formData = new FormData(formEl);
            formData.append('user_id', {{Auth::user()->id}})
            
            axios({
              method: 'post',
              url: api_url+"api/portal/header",
              responseType: 'json',
              data: formData
              })
              .then(function (response) { 
                  console.log(response)
                  if(response.data.code == 200){ //success
                    $("#add_role_sucess_modal").modal('show');
                  }else { //error
                    $("#sucess_modal").modal('show');
                  }
                  
                  //location.reload()
              })
      });

      $("#headerReset").click(function(event){ 
            console.log('header form reset');
            $('#Logo_img_1').attr('src', "");
            $('#Logo_img_2').attr('src', "");
            $('#Logo_img_3').attr('src', "");
            $('#logo1_src').val(null);
            $('#logo2_src').val(null);
            $('#logo3_src').val(null);
          document.getElementById("Logo_img_1").value=''; 
          document.getElementById("upload_logo_1").style.display = 'block';
          document.getElementById("image_preview_1").style.display = 'none';
          document.getElementById("Logo_img_2").value=''; 
          document.getElementById("upload_logo_2").style.display = 'block';
          document.getElementById("image_preview_2").style.display = 'none';
          document.getElementById("Logo_img_3").value=''; 
          document.getElementById("upload_logo_3").style.display = 'block';
          document.getElementById("image_preview_3").style.display = 'none';
            
      });
      //  header logo 1
    $("#Logo_1").on('change', function(){ console.log('image 1');
      $new_file = document.myform.Logo_1.files[0];  console.log($new_file);
        if($new_file.size>2000000)
        {
            document.getElementById("Logo_1").value='';
            document.getElementById('file_size').classList.remove("d-none");
            return false;
        }
        var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("Logo_1").value=''; 
            document.getElementById('file_size').classList.add("d-none");
            document.getElementById('file_type').classList.remove("d-none");
            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_img_1').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file);
            }
            document.getElementById("upload_logo_1").style.display = 'none';
            document.getElementById("image_preview_1").style.display = 'block';
            document.getElementById("header_logo_name_1").innerHTML = $new_file.name;
            var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize = $new_file.size; i=0;while(fSize>900){fSize/=1024;i++;}
                docu_size = (Math.round(fSize*100)/100)+' '+fSExt[i]; 
            document.getElementById("header_log_size_1").innerHTML = docu_size;
    });
  //  header logo 2
    $("#Logo_2").on('change', function(){ console.log('image 2');
      $new_file_2 = document.myform.Logo_2.files[0];  console.log($new_file_2);
        if($new_file_2.size>2000000)
        {
            document.getElementById("Logo_2").value='';
            document.getElementById('file_size_2').classList.remove("d-none");
            return false;
        }
        var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file_2.type) == -1)  
        {
            document.getElementById("Logo_2").value=''; 
            document.getElementById('file_size_2').classList.add("d-none");
            document.getElementById('file_type_2').classList.remove("d-none");
            alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file_2) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_img_2').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file_2);
            }
        
            document.getElementById("upload_logo_2").style.display = 'none';
            document.getElementById("image_preview_2").style.display = 'block';
            document.getElementById("header_logo_name_2").innerHTML = $new_file_2.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file_2.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_log_size_2").innerHTML = docu_size_2;
    });
  //  header logo 3
    $("#Logo_3").on('change', function(){ console.log('image 3');
      $new_file_3 = document.myform.Logo_3.files[0];  console.log($new_file_3);
        if($new_file_3.size>2000000)
        {
            document.getElementById("Logo_3").value='';
            document.getElementById('file_size_3').classList.remove("d-none");
            return false;
        }
        var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file_3.type) == -1)  
        {
            document.getElementById("Logo_3").value=''; 
            document.getElementById('file_size_3').classList.add("d-none");
            document.getElementById('file_type_3').classList.remove("d-none");
            alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file_3) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#Logo_img_3').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file_3);
            }
        
            document.getElementById("upload_logo_3").style.display = 'none';
            document.getElementById("image_preview_3").style.display = 'block';
            document.getElementById("header_logo_name_3").innerHTML = $new_file_3.name;
            var fSExt_3 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_3 = $new_file_3.size; i=0;while(fSize_3>900){fSize_3/=1024;i++;}
                docu_size_3 = (Math.round(fSize_3*100)/100)+' '+fSExt_3[i]; 
            document.getElementById("header_log_size_3").innerHTML = docu_size_3;
    });

    $("#remove_logo_1").on('click', function(){ 
      
          $('#logo1_src').val(null)
          document.getElementById("Logo_img_1").value=''; 
          document.getElementById("upload_logo_1").style.display = 'block';
          document.getElementById("image_preview_1").style.display = 'none';
    });

    $("#remove_logo_2").on('click', function(){ 
          $('#logo2_src').val(null)
          document.getElementById("Logo_img_2").value=''; 
          document.getElementById("upload_logo_2").style.display = 'block';
          document.getElementById("image_preview_2").style.display = 'none';
    });

    $("#remove_logo_3").on('click', function(){ 
          $('#logo3_src').val(null)
          document.getElementById("Logo_img_3").value=''; 
          document.getElementById("upload_logo_3").style.display = 'block';
          document.getElementById("image_preview_3").style.display = 'none';
    });


    $("#remove_logo_src").on('click', function(){ 
          document.getElementById("pengenalan_image").value=''; 
          document.getElementById("upload_img_src").style.display = 'block';
          document.getElementById("image_preview_src").style.display = 'none';
    });

    $("#remove_logo_pengum").on('click', function(){ 
      
      $('#peng_img_src').val(null)
      document.getElementById("Logo_img_pengum").value=''; 
      document.getElementById("upload_logo_pengum").style.display = 'block';
      document.getElementById("image_preview_pengum").style.display = 'none';
});




    //  footer logo 3
    
    $("#remove_logo_footer").click(function(){
      $("#upload_logo_footer").addClass("d-block");
      $("#langing_header_footer").addClass("d-none");
      var removed_logo=$('#Logo_footer_src').attr('src', '');
      // if(removed_logo){
      //   $("#footerSubmit").click(function(){
      //     var media_id=$("#remove_logo_footer").val();
      //     var id=[media_id];
      //     axios({
      //         method: 'post',
      //         url: api_url+"api/portal/removefooterlogo",
      //         responseType: 'json',
      //         data: id
      //         })
      //   })
      // }
    })
    $("#Logo_footer").on('change', function(){ 
      $new_file_3 = document.footerForm.Logo_footer.files[0];  
      console.log($new_file_3);
      $("#upload_logo_footer").removeClass("d-block");  
      document.getElementById("image_preview_footer").style.display = 'block';    
        if($new_file_3.size>2000000)
        {
            document.getElementById("Logo_footer").value='';
            // document.getElementById('file_size').classList.remove("d-none");
            $("#logo_size").removeClass("d-none")
            $("#upload_logo_footer").addClass("d-block").removeClass("d-none")
            return false;
        }
        var allowedExtensions=["image/jpeg","image/png","image/jpg"];
        
        if(allowedExtensions.indexOf($new_file_3.type) == -1)  
        {
            document.getElementById("Logo_footer").value=''; 
            $("#file_size_f").addClass("d-none")
            $("#logo_size").addClass("d-none")
            // document.getElementById('file_size_f').classList.add("d-none");
            // document.getElementById('file_size_f').classList.remove("d-none");
            alert("only jpeg and png extension allowed")
            $("#upload_logo_footer").addClass("d-block")
            return false;
        }
        if ($new_file_3) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#Logo_footer_src').attr('src', e.target.result);
                    $("#upload_logo_footer").addClass("d-none")
                    $("#langing_header_footer").removeClass("d-none");
                    
                };
                reader.readAsDataURL($new_file_3);
            }
    });

    //  footer Image    
    $("#remove_logo_footer_div_2").click(function(){
      $("#upload_Imeg_footer").addClass("d-block");
      $("#langing_header_footerdiv_2").addClass("d-none");
      var removed_Imeg=$('#Imeg_footer_src').attr('src', '');
      // if(removed_Imeg){
      //   $("#footerSubmit").click(function(){
      //     // var media_id=$("#remove_logo_footer_div_2").val();
      //     // var id=[media_id];
      //     // axios({
      //     //     method: 'post',
      //     //     url: api_url+"api/portal/removefooterlogo",
      //     //     responseType: 'json',
      //     //     data: id
      //     //     })

      //   })
      // }
    })

    $("#Imeg_footer").on('change', function(){ 
      $new_file_3 = document.footerForm.Imeg_footer.files[0];  console.log($new_file_3);
      $("#upload_Imeg_footer").removeClass("d-block");
      document.getElementById("image_preview_footer_div_2").style.display = 'block'; 
        if($new_file_3.size>2000000)
        {
          $("#upload_Imeg_footer").addClass("d-block");
            document.getElementById("Imeg_footer").value='';
            document.getElementById('file_size_div_2').classList.remove("d-none");
            return false;
        }
        var allowedExtensions=["image/jpeg","image/png","image/jpg"];
        
        if(allowedExtensions.indexOf($new_file_3.type) == -1)  
        {
          $("#upload_Imeg_footer").addClass("d-block");
            document.getElementById("Imeg_footer").value=''; 
            document.getElementById('file_size_div_2').classList.add("d-none");
            // document.getElementById('file_size_fi').classList.add("d-none");
            $("#file_size_fi").removeClass("d-none")
            // document.getElementById('file_size_fi').classList.remove("d-none");
            alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file_3) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#Imeg_footer_src').attr('src', e.target.result);
                    $("#upload_Imeg_footer").addClass("d-none")
                    $("#langing_header_footerdiv_2").removeClass("d-none");
                    document.getElementById('file_size_div_2').classList.add("d-none");
                };
                reader.readAsDataURL($new_file_3);
            }
    });

    //footer submit

    $("#footerSubmit").click(function(event){ 

            console.log('footer form submitted');
            var footer_logo= $("#Logo_footer_src").attr('src');
            var footer_imeg= $("#Imeg_footer_src").attr('src');
            // console.log(footer_logo=='')
            // console.log(footer_imeg=='')
            // return;
            if(footer_logo!=''&&footer_imeg!=''){
              var formEl = document.forms.footerForm;
              var formData = new FormData(formEl);
              formData.append('user_id', {{Auth::user()->id}})
              
              axios({
                method: 'post',
                url: api_url+"api/portal/footer",
                responseType: 'json',
                data: formData
                })
                .then(function (response) { 
                    console.log(response)
                    if(response.data.code == 200){ //success
                      $("#add_role_sucess_modal").modal('show');
                    }else { //error
                      $("#sucess_modal").modal('show');
                    }
                    //location.reload()
                })
            }
            else{
              
              if(footer_logo==''){
                $("#fileRequired").removeClass("d-none")
                $("#fileRequired2").addClass("d-none")
              }
              else{
                $("#fileRequired2").removeClass("d-none")
                $("#fileRequired").addClass("d-none")

              }
            } 
      });

      $("#footerReset").click(function(event){ 
            console.log('header form reset');
            $('#Imeg_footer_src').attr('src', "");
            $('#Logo_footer_src').attr('src', "");
            $('#copyright').val('')
            $('#total_visit').val('')
            $('#total_visit_today').val('')
            $('#total_visit_month').val('')
            $('#total_visit_year').val('')
            $("#footerSubmit").click(function(){
              var media_id=$("#remove_logo_footer").val();
              var media_id2=$("#remove_logo_footer_div_2").val();
              var id=[media_id,media_id2];
              axios({
                  method: 'post',
                  url: api_url+"api/portal/removefooterlogo",
                  responseType: 'json',
                  data: id
                  })
            })
            
            
            
            
      });

      $("#kandungan_landing_page_label").click(function(event){     
          $('#tambah_pengumuman').removeClass('d-flex');
          $('#tambah_pengumuman').addClass('close-button');
      });

      $("#kandungan_penganalan_label").click(function(event){   
          $('#tambah_pengumuman').removeClass('d-flex');
          $('#tambah_pengumuman').addClass('close-button');
      });

      $("#kandungan_pengumuman_label").click(function(event){
          $('#tambah_pengumuman').addClass('d-flex');
          $('#tambah_pengumuman').removeClass('close-button');
      });

      $("#kandungan_hubungi_kami_label").click(function(event){
          $('#tambah_pengumuman').removeClass('d-flex');
          $('#tambah_pengumuman').addClass('close-button');
      });

      $("#add_pengumuman").click(function(event){     
        $("#add_selenggara_data_modal").modal('show');
      });


     //  pengenalan Image
     $("#pengenalan_image").on('change', function(){ console.log('image 1');
      $new_file = document.penganalanForm.pengenalan_image.files[0];  console.log($new_file);
        if($new_file.size>2000000)
        {
            document.getElementById("pengenalan_image").value='';
            document.getElementById('file_size').classList.remove("d-none");
            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("pengenalan_image").value=''; 
            document.getElementById('file_size').classList.add("d-none");
            document.getElementById('file_type').classList.remove("d-none");
            alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
            $('#img_src').empty()
                var reader = new FileReader();                
                reader.onload = function (e) {

                    // img = '<img src="" id="pengenalan_image_src" width="200" height="200">'
                    $('#img_src').attr('src', e.target.result);
                    // $('#pengenalan_image_src').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file);
            }

            document.getElementById("upload_img_src").style.display = 'none';
            document.getElementById("image_preview_src").style.display = 'block';
            document.getElementById("header_logo_name_src").innerHTML = $new_file.name;
            var fSExt_3 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_3 = $new_file.size; i=0;while(fSize_3>900){fSize_3/=1024;i++;}
                docu_size_3 = (Math.round(fSize_3*100)/100)+' '+fSExt_3[i]; 
            document.getElementById("header_log_size_src").innerHTML = docu_size_3;
    });

    //  pengenalan Video
    $("#pengenalan_video").on('change', function(){ console.log('image 1');
      video_template ='<video width="270" height="150" controls>' +
                              '<source src="" id="video_preview_peng">' +
                              'Your browser does not support HTML5 video.' +
                                '</video>'
            $('#video_src_peng').empty()
            $('#video_src_peng').append(video_template);
            var $source = $('#video_preview_peng');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();     
    });

    $("#pengenalanSubmit").click(function(event){ 
            console.log('pengenalan form submitted');
            var formEl = document.forms.penganalanForm;
            var formData = new FormData(formEl);
            // var value = CKEDITOR.instances['imej_keterangan_textarea'].getData()
            // console.log(value)
            
            formData.append('user_id', {{Auth::user()->id}})
            formData.append('pengenalan_keterangan_image', CKEDITOR.instances['imej_keterangan_textarea'].getData())
            formData.append('pengenalan_keterangan_video', CKEDITOR.instances['video_keterangan_textarea'].getData())
            
            axios({
              method: 'post',
              url: api_url+"api/portal/pengenalan",
              responseType: 'json',
              data: formData
              })
              .then(function (response) { 
                  console.log(response)
                  if(response.data.code == 200){
                    $("#add_role_sucess_modal").modal('show');
                  }else {
                    $("#sucess_modal").modal('show');
                  }
                  //location.reload()
              })
      });

      $("#pengenalanReset").click(function(event){ 
            console.log('pengenalan form reset');
            CKEDITOR.instances['imej_keterangan_textarea'].setData('')
            CKEDITOR.instances['video_keterangan_textarea'].setData('')
            $("#pengenalan_radio_image").prop("checked", false);
            $("#pengenalan_radio_video").prop("checked", false);            
            $('#img_src').empty();
            $('#video_src_peng').empty();
            $('#peng_video').attr('src', "");            
            $('#pengenalan_tajuk_image').val('')                        
            $('#pengenalan_tajuk_video').val('')
            
      });

      

      //  Landing Image
     $("#landingImages").on('change', function(){ 
      var total_file=document.getElementById("landingImages").files.length;
      var cross = "{{ asset('assets/images/close_img.png') }}"
      console.log(cross)
        for(var i=0;i<total_file;i++)
        {
                
          var template =    '<div class="uploaded_img_preview_container" id="landing_'+ i+'"><div class="uploaded_img">' +
             '<img src="' +URL.createObjectURL(this.files[i]) + '" alt="" width="100" height="100"/>' +
                '</div><div class="uploaded_img_details">'+
                '<h5>' +event.target.files[i].name+  '</h5>' +
                '<p class="flie_size"> ' + Math.ceil(event.target.files[i].size/1024) +' KB</p>' +
                '</div><button type="button" onclick="removeImage(\'landing_'+i+'\')"class="remove_image"><img src="'+cross+'" alt="" /></button></div>'                
                $('#image_preview').append(template);                
        }      
    });

    //  landing Video
    $("#landing_video").on('change', function(){ 
            video_template ='<video width="270" height="150" controls>' +
                              '<source src="" id="video_preview">' +
                              'Your browser does not support HTML5 video.' +
                                '</video>'
            $('#video_src').empty()
            $('#video_src').append(video_template);
            var $source = $('#video_preview');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        
    });

    $("#landingSubmit").click(function(event){ 
            console.log('landing form submitted');
            var formEl = document.forms.landingForm;
            var formData = new FormData(formEl);
            formData.append('user_id', {{Auth::user()->id}})   
            formData.append('existing_images',landingImages)
            

            axios({
              method: 'post',
              url: api_url+"api/portal/landing",
              responseType: 'json',
              data: formData
              })
              .then(function (response) { 
                  console.log(response)
                  if(response.data.code == 200){
                    $("#add_role_sucess_modal").modal('show');
                  }else {
                    $("#sucess_modal").modal('show');
                  }
                  //location.reload()
              })
      });

      $("#landingReset").click(function(event){ 
            console.log('landing form reset');
            $("#landing_radio_video").prop("checked", false);
            $("#landing_radio_image").prop("checked", false);
            $('#image_preview').empty();
            $('#video_src').empty();
            $('#landing_tajuk_image').val('')
            $('#landing_tajuk_video').val('')
            $("#BreakingNews").val('')
            $('#breakingNewsId').val('')
      });

      $('#landing_radio_image').click(function(){
                    document.getElementById("landing_tajuk_image").disabled = false; 
                    document.getElementById("landing_tajuk_video").disabled = true; 
                    document.getElementById("landingImages").disabled = false; 
                    document.getElementById("landing_video").disabled = true;
      });

      $('#landing_radio_video').click(function(){
                    document.getElementById("landing_tajuk_image").disabled = true; 
                    document.getElementById("landing_tajuk_video").disabled = false; 
                    document.getElementById("landingImages").disabled = true; 
                    document.getElementById("landing_video").disabled = false;
      });

      $('#pengenalan_radio_image').click(function(){
                    document.getElementById("pengenalan_tajuk_image").disabled = false; 
                    document.getElementById("pengenalan_tajuk_video").disabled = true; 
                    document.getElementById("pengenalan_image").disabled = false; 
                    document.getElementById("pengenalan_video").disabled = true;

                    CKEDITOR.instances['video_keterangan_textarea'].setReadOnly(true);
                    CKEDITOR.instances['imej_keterangan_textarea'].setReadOnly(false);
      });

      $('#pengenalan_radio_video').click(function(){
                    document.getElementById("pengenalan_tajuk_image").disabled = true; 
                    document.getElementById("pengenalan_tajuk_video").disabled = false; 
                    document.getElementById("pengenalan_image").disabled = true; 
                    document.getElementById("pengenalan_video").disabled = false;

                    CKEDITOR.instances['video_keterangan_textarea'].setReadOnly(false);
                    CKEDITOR.instances['imej_keterangan_textarea'].setReadOnly(true);
      });

      $('#confirm_close').click(function(){
        window.location.href = origin + '/master/portal';
      });
      $('#tutup_new').click(function(){
        window.location.href = origin + '/master/portal';
      });
      

      //pengumuman image
      $("#pengumuman_image").on('change', function(){ 
        //console.log($('#pengumuman_image').prop('files'))
        $new_file_pengu = $('#pengumuman_image').prop('files')[0];  console.log($new_file_pengu.size);
        if($new_file_pengu.size>2000000)
        { 
            document.getElementById("pengumuman_image").value='';
            document.getElementById('file_type-p').classList.add("d-none");
            document.getElementById('file_size-p').classList.remove("d-none");
            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG"];
        
        if(allowedExtensions.indexOf($new_file_pengu.type) == -1)  
        {
            document.getElementById("pengumuman_image").value=''; 
            document.getElementById('file_size-p').classList.add("d-none");
            document.getElementById('file_type-p').classList.remove("d-none");
            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file_pengu) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_img_pengum').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file_pengu);
            }
            document.getElementById('file_size-p').classList.add("d-none");
            document.getElementById('file_type-p').classList.add("d-none");
            document.getElementById("upload_logo_pengum").style.display = 'none';
            document.getElementById("image_preview_pengum").style.display = 'block';
            document.getElementById("header_logo_name_pengum").innerHTML = $new_file_pengu.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file_pengu.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_log_size_pengum").innerHTML = docu_size_2;
    });

    $("#pengumumanSubmit").click(function(event){ 
          var formEl = document.forms.pengumumanForm;
            var formData = new FormData(formEl);
            console.log($('#pengumuman_image').prop('files'))
            var myfile = $('#pengumuman_image').prop('files')[0];
            console.log(myfile)
            formData.append('tajuk', $('#tajuk').val())
            formData.append('sub_tajuk', $('#sub_tajuk').val())
            formData.append('tarikh', $('#tarikh').val())
            formData.append('pengumuman_image', myfile)
            formData.append('user_id', {{Auth::user()->id}})
            formData.append('keterangan', CKEDITOR.instances['pengumuman_keterangan'].getData())
            id = formData.get('id')
            console.log(formData.get('tajuk'))
            console.log(formData.get('sub_tajuk'))
            console.log(formData.get('tarikh'))
              axios({
              method: 'post',
              url: api_url+"api/portal/pengumuman",
              responseType: 'json',
              data: formData
              })
              .then(function (response) {
                  console.log(response)
                  //location.reload()
              })   
            
            console.log('form submitted')
      });

      //get pengumuamn list
        axios({
        method: 'get',
        url: api_url+"api/portal/pengumuman",
        responseType: 'json'
        })
        .then(function (response) {
            console.log(response)
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            var jps_table =$('#master_data').DataTable({     
              data: response.data.data,
              pagingType: 'full_numbers',
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada apa-apa ditemui - maaf",
                    "info": "Paparan _PAGE_ hingga 10 Dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "search": "_INPUT_",
                    "searchPlaceholder": " Carian",
                    "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Seterusnya",
                    "previous":   "Sebelum"
                    },       
                },
              columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                                  data='<label style="cursor:pointer">'+row.tajuk+'</label>'
                          }
                          return data;
                      }
                  },
                //   {
                //       targets:1, // Start with the last
                //       render: function ( data, type, row, meta ) {
                //           if(type === 'display'){
                //                   data=row.keterangan
                //           }
                //           return data;
                //       }
                //   },   
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){

                            if(row.row_status==1){
                                      $("#customSwitch"+row.id).val(1);
                                      data ='<label class="d-none">Aktif</label>'+'<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" checked  class="custom-control-input" name="agensiBtn" onClick="deactivateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                    $("#customSwitch"+row.id).val(0);
                                      data ='<label class="d-none">Tidak Aktif</label>'+'<div class="custom-control custom-switch">'+
                                      '<input type="checkbox" class="custom-control-input" name="agensiBtn" onClick="activateModul('+row.id+')" id="customSwitch'+row.id+'">'+
                                      '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                      '</div>'
                                  };
                                  //data=row.row_status
                          }
                          return data;
                      }
                  },                         
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {                            
                          if(type === 'display'){
                            const today = new Date(row.tarikh);
                            const yyyy = today.getFullYear();
                            let mm = today.getMonth() + 1; // Months start at 0!
                            let dd = today.getDate();

                            if (dd < 10) dd = '0' + dd;
                            if (mm < 10) mm = '0' + mm;

                            const formattedToday = dd + '-' + mm + '-' + yyyy;
                                  data=formattedToday
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.updated_by.name
                          }
                          return data;
                      }
                  },
                   
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              
                              data = '<div style="cursor:pointer"  class="d-flex align-items-center folder" onClick="loadData('+row.id+')">' +
                              '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">'+
                              '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>' +
                            '</svg>'+
                              '</div>'                              
                          }
                          return data;
                      }
                  },               
              ] , 
              columns: [
                  { data: 'tajuk'},
                  { data: 'keterangan'},
                  { data: 'row_status'  },
                  { data: 'tarikh'  },          
                  { data: 'dikemaskini_oleh'  },                   
                  { data: 'id'  },                  
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
          loadcompleted();
            //response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
        });








          
      })

      function activateModul(id){
            Swal.fire({
            text: 'Adakah anda pasti mahu mengaktifkan akaun ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ACF97',
            cancelButtonColor: '#FA5C7C',
            confirmButtonText: 'ya!',
            cancelButtonText: 'tidak'
            }).then((result) => {
            if (result.isConfirmed) {
            var activate=1
            var formData = new FormData();
            formData.append('id', id);
            formData.append('value', activate);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna diaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/portal/ActivatePengumuman",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
                // console.log(result)
                Swal.fire({
                    icon: 'success',
                    text: "Diaktifkan",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                            })
            })
            }else{
                location.reload();
            }
            })
          }
          function deactivateModul(id){
            Swal.fire({
            text: 'Adakah anda pasti mahu menyahaktifkan akaun ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ACF97',
            cancelButtonColor: '#FA5C7C',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
            var deactivate=0
            var formData = new FormData();
            formData.append('id', id);
            formData.append('value', deactivate);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('action', "GRID PENGGUNA - Pengguna dinyahaktifkan")
            axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+"api/portal/deActivatePengumuman",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
                console.log(result)
                Swal.fire({
                    icon: 'success',
                    text: "Dinyahaktifkan",
                    confirmButtonText: 'Tutup',
                }
                ).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    location.reload();
                }
                })
            })
            }else{
                location.reload();
            }
            })
        } 

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


      </script>
      <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("imej_keterangan_textarea");
      CKEDITOR.replace("video_keterangan_textarea");
      CKEDITOR.replace("pengumuman_keterangan");
    </script>