<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer "+ window.localStorage.getItem('token');
        $(document).ready(function () {
            document.getElementById("upload_sjm").style.display = 'block';
            document.getElementById("sjm_preview").style.display = 'none';
            document.getElementById("upload_mini").style.display = 'block';
            document.getElementById("mini_preview").style.display = 'none';

            axios({
                method: 'get',
                url: api_url+"api/vm/mmpm",
                responseType: 'json',
                headers: {"Authorization": api_token },
                params: {
                    pp_id: {{$kod_projek}},
                    type: 'VA'
                }
            })
            .then(function (response) { 
                let index = 0;

                if(response.data.data.vm.length>0){
                    let length = response.data.data.vm.length -1;
                    let kep_mesyuarat = response.data.data.vm[length].keputusan_mesyuarat; console.log(kep_mesyuarat);
                    if(kep_mesyuarat==1)
                    {
                        displayBelowItems(1);
                    }
                    else
                    {
                        displayBelowItems(0);
                    }
                }
                else{
                    displayBelowItems(0);
                }
                $.each(response.data.data.vm, function (key, item) {
                        index++
                        let mesyuarat = '';
                        if(item.keputusan_mesyuarat == 1) {
                            mesyuarat = 'Ya, Setuju Laksana Makmal';
                        }else {
                            mesyuarat = 'Tidak, Mesyuarat Pra Makmal Seterusnya';
                        }

                        let button = ''

                        if(item.project.status_perlaksanaan == '26' || item.project.status_perlaksanaan == '28') {
                            button = '<button type="button" onClick="removeMmpm('+item.id+')" class="sjm_table_btn vmpop_btn"><i class="mdi mdi-window-close" style="font-size: 2em;" id="close_image"></i></button>'
                        }
                        let template = `<tr id="">
                                <td>`+ index +`</td>
                                <td>`+ item.cadangan_pra_makmal +`</td>
                                <td>`+ item.pra_makmal_sebenar +`</td>
                                <td onclick='downloadDoc(`+item.id+`,"`+item.sjm_file_name+`",1)'>`+ item.sjm_file_name +`</td>
                                <td>`+ mesyuarat +`</td>
                                <td onclick='downloadDoc(`+item.id+`,"`+item.mm_file_name+`",2)'>`+ item.mm_file_name +`</td>
                        </tr>`
                        $('#sjm_tbody').append(template);
                })

                var length= window.localStorage.getItem('loader_count_mini');
                        localStorage.setItem("loader_count_mini", length-1);

                                if(length==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }
                
            })
            .catch(function (error) {
                
            })
        })

        //save mmpm form
        $('#simpan_mmpm').click(function(){
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            mmpm_validation = true;
            
            if(mmpm_validation) {
                
                var formEl = document.forms.mmpm;
                var formData = new FormData(formEl);

                formData.append('pp_id', {{$kod_projek}})
                formData.append('tarikh_cadangan', document.getElementById("tarikh_cadangan").value)
                formData.append('user_id', {{Auth::user()->id}})
                formData.append('type', 'VA')

                axios({
                    method: 'post',
                    url: api_url+"api/vm/mmpm",
                    responseType: 'json',
                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    data: formData
                })
                .then(function (response) { 
                    if(response.data.code == 200) {  
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show"); 
                        $("#add_role_sucess_modal").modal('show');
                        $("#tutup").click(function(){
                            var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'Mini_VA')
                            
                            // url = url.replace(":status", response.data.data.workflow_status)
                            // url = url.replace(":user_id", response.data.data.dibuat_oleh)
                            window.location.href = url
                        })
                    }else {

                        if(response.data.code == 422) {
                            document.getElementById("keputusan_mesyuarat_yes").checked=true;
                            Object.keys(response.data.data).forEach(key => {					
                            document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                            });
                        }
                        
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    }
                    
                })
                .catch(function (error) {
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                })
            }

            
        })



        $("#surat_jemputan_mesyuarat").on('change', function(){ 
        $new_file = $('#surat_jemputan_mesyuarat').prop('files')[0];  ;
        document.getElementById("error_surat_jemputan_mesyuarat").innerHTML = ''
        if($new_file.size>4000000)
        { 
            document.getElementById("surat_jemputan_mesyuarat").value='';
            document.getElementById('sjm_file_type').classList.add("d-none");
            document.getElementById('sjm_file_size').classList.remove("d-none");
            document.getElementById("sjm_image_error").innerHTML=""; 

            return false;
        }
        var allowedExtensions=["application/pdf", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("surat_jemputan_mesyuarat").value=''; 
            document.getElementById('sjm_file_type').classList.remove("d-none");
            document.getElementById('sjm_file_size').classList.add("d-none");
            document.getElementById("sjm_image_error").innerHTML=""; 

            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#sjm_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                };
                reader.readAsDataURL($new_file);
            }
            document.getElementById("sjm_image_error").innerHTML=""; 
            document.getElementById('sjm_file_type').classList.add("d-none");
            document.getElementById('sjm_file_size').classList.add("d-none");
            document.getElementById("upload_sjm").style.display = 'none';
            document.getElementById("sjm_preview").style.display = 'block';
            document.getElementById("header_sjm_name").innerHTML = $new_file.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_sjm_size").innerHTML = docu_size_2;
    });

    function removeMmpm(id)
    {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        
        
        var formData = new FormData();

        formData.append('pp_id', {{$kod_projek}})
        formData.append('mmpm_id', id)
        formData.append('user_id', {{Auth::user()->id}})
        axios({
            method: 'post',
            url: api_url+"api/vm/remove/mmpm/",
            responseType: 'json',
            headers: {"Authorization": api_token, },
            data: formData
        })
        .then(function (response) { 
            if(response.data.code == 200) {  
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show"); 
                $("#add_role_sucess_modal").modal('show');
                $("#tutup").click(function(){
                    var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'Mini_VA')
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
    }

    $("#remove_sjm_logo").on('click', function(){ 
      
      $('#sjm_img').val(null)
      document.getElementById("surat_jemputan_mesyuarat").value=''; 
      document.getElementById("upload_sjm").style.display = 'block';
      document.getElementById("sjm_preview").style.display = 'none';
    });




    $("#minit_mesyuara").on('change', function(){ 
        document.getElementById("error_minit_mesyuara").innerHTML = ''
        $new_file = $('#minit_mesyuara').prop('files')[0];  ;
        if($new_file.size>4000000)
        { 
            document.getElementById("minit_mesyuara").value='';
            document.getElementById('mini_file_type').classList.add("d-none");
            document.getElementById('mini_file_size').classList.remove("d-none");
            document.getElementById("mini_image_error").innerHTML=""; 

            return false;
        }
        var allowedExtensions=["application/pdf", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("minit_mesyuara").value=''; 
            document.getElementById('mini_file_type').classList.remove("d-none");
            document.getElementById('mini_file_size').classList.add("d-none");
            document.getElementById("mini_image_error").innerHTML=""; 

            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#mini_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                };
                reader.readAsDataURL($new_file);
            }
            document.getElementById("mini_image_error").innerHTML=""; 
            document.getElementById('mini_file_type').classList.add("d-none");
            document.getElementById('mini_file_size').classList.add("d-none");
            document.getElementById("upload_mini").style.display = 'none';
            document.getElementById("mini_preview").style.display = 'block';
            document.getElementById("header_mini_name").innerHTML = $new_file.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_mini_size").innerHTML = docu_size_2;
    });

    $("#remove_mini_logo").on('click', function(){ 
      
      $('#sjm_img').val(null)
      document.getElementById("minit_mesyuara").value=''; 
      document.getElementById("upload_mini").style.display = 'block';
      document.getElementById("mini_preview").style.display = 'none';
    });

    $("#tarikh_pra_makmal_sebenar").on('change', function(){ 
        document.getElementById("error_tarikh_pra_makmal_sebenar").innerHTML = ''
    })

    function downloadDoc(id,filename,type){

        const api_url = "{{env('API_URL')}}";  
        update_user_api = api_url+"api/vm/dokumen_download/mmpm";
        axios({
          url: update_user_api + '?id=' + id + '&type='+ type,
          method: 'GET',
          headers: { "Authorization": api_token, },
          responseType: 'blob', // important
        }).then((response) => {
          const url = window.URL.createObjectURL(response.data);
          const link = document.createElement('a');
          link.href = url;
          
          link.setAttribute('download', filename);
          document.body.appendChild(link);
          link.click();
          URL.revokeObjectURL(url);
        });
     
    }
    </script>