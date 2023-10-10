
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
        $('input.kos_selepas_makmal').keyup(function(event) {
                // skip for arrow keys
                if(event.which >= 37 && event.which <= 40) return;
                var value = $(this).val();

                if(value === "") {
                return;
                }

                // Remove all non-digit characters except for the decimal point
                value = value.replace(/[^\d.]/g, "");

                // Split the value into integer and decimal parts
                const parts = value.split(".");

                // Remove leading zeros from the integer part
                parts[0] = parts[0].replace(/^0+/, '');

                // If there's no integer part, add a leading zero
                if (!parts[0]) {
                parts[0] = "0";
                }

                // Move the decimal point to the left as you add more digits
                if (parts[1] && parts[1].length > 2) {
                parts[0] += parts[1].substr(0, 1);
                parts[1] = parts[1].substring(1);
                }

                // Add commas as a thousand separator to the integer part
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                // Ensure there are always exactly two decimal places
                if (!parts[1]) {
                parts[1] = "";
                } else if (parts[1].length < 2) {
                parts[1] += "";
                }

                // Combine the integer and decimal parts with a decimal point
                value = parts.join(".");

                // Update the input value
                $(this).val(value);
        });
    $("#surat_jemputan").on( "change", function() {
      var file_name1=$("#surat_jemputan").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview1").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName1").text(file_name1);
        $("#Uploadfile1").addClass('d-none')
        $("#fileUploaded1").removeClass('d-none')
    } );
    $("#removefile1").click(function(){
      $("#terima_file_name").val('')
      $("#filePreview1").attr('src','');
      $("#Uploadfile1").removeClass('d-none')
        $("#fileUploaded1").addClass('d-none')
    })
    $("#minit_mesyuarat").on( "change", function() {
      var file_name1=$("#minit_mesyuarat").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview2").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName2").text(file_name1);
        $("#Uploadfile2").addClass('d-none')
        $("#fileUploaded2").removeClass('d-none')
    } );

    $("#removefile2").click(function(){
      $("#terima_file_name").val('')
      $("#filePreview2").attr('src','');
      $("#Uploadfile2").removeClass('d-none')
        $("#fileUploaded2").addClass('d-none')
    })

    $("#objektif_file").on( "change", function() {
      var file_name1=$("#objektif_file").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreview3").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileName3").text(file_name1);
        $("#Uploadfile3").addClass('d-none')
        $("#fileUploaded3").removeClass('d-none')
    } );

    $("#removefile3").click(function(){
      $("#terima_file_name").val('')
      $("#filePreview3").attr('src','');
      $("#Uploadfile3").removeClass('d-none')
        $("#fileUploaded3").addClass('d-none')
        $("#fileName").addClass('d-none');
    })

        $(document).ready(function(){

                $('#tarikh_cadangan').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#tarikh_pra_makmal_sebenar').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#lawatan_tapak').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#cadangan_makmal').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#makmal_sebenar').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#modal_cadangan_makmal').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#modal_makmal_sebenar').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });
                $('#mesyuarat_date').daterangepicker({
                locale: { format: 'DD/MM/YYYY' }
                });

                localStorage.setItem("loader_count", 6);

                const d = new Date();
                let year = d.getFullYear();
                $("#year1").val(year);

        const api_token = "Bearer "+ window.localStorage.getItem('token');        
        axios.defaults.headers.common["Authorization"] = api_token
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        var url = $(location).attr('href');
        parts = url.split("/");
        var pp_id_new = parts[parts.length-2];
        type=parts[parts.length-1];
        var user_id= {{Auth::user()->id}}; 
        $.ajaxSetup({
                          headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/kalenderData/"+{{$kod_projek}}+'/'+type+'/'+user_id+'/'+{{$user}} ,
            responseType: 'json',            
        })
        .then(function (response) { 
            console.log(response.data.data)
            kalendarData=response.data.data; console.log(kalendarData)
            var url = $(location).attr('href'),
            parts = url.split("/"),
            pp_id_new = parts[parts.length-2];
            for(let i=0;i<kalendarData.length;i++){
                        if(kalendarData[i].kategori==1 && kalendarData[i].tarikh_tamat)
                        {
                                let date1=kalendarData[i].tarikh_mula.split("-");
                                let date2=kalendarData[i].tarikh_tamat.split("-");
                                let startDate=date1[2]+'/'+date1[1]+'/'+date1[0]; //alert(startDate)
                                let endDate=date2[2]+'/'+date2[1]+'/'+date2[0]; //alert(endDate)
                                document.getElementById("tarikh_cadangan").value=startDate+'-'+endDate;
                        }

                        if(kalendarData[i].kategori==2 && kalendarData[i].tarikh_tamat) 
                        {
                                let date3=kalendarData[i].tarikh_mula.split("-");
                                let date4=kalendarData[i].tarikh_tamat.split("-");

                                let startDateCadanganMakmal=date3[2]+'/'+date3[1]+'/'+date3[0]; //alert(startDateCadanganMakmal)
                                let endDateCadanganMakmal=date4[2]+'/'+date4[1]+'/'+date4[0]; //alert(endDateCadanganMakmal)

                                document.getElementById("cadangan_makmal").value=startDateCadanganMakmal+'-'+endDateCadanganMakmal; 
                                
                                let year = kalendarData[i].tarikh_mula.split("-")
                                document.getElementById("year").value=year[0]
                        }

                        if(kalendarData[i].kategori==3 && kalendarData[i].tarikh_tamat) {
                                let date5=kalendarData[i].tarikh_mula.split("-");
                                let date6=kalendarData[i].tarikh_tamat.split("-");

                                let startDate=date5[2]+'/'+date5[1]+'/'+date5[0]; //alert(startDate)
                                let endDate=date6[2]+'/'+date6[1]+'/'+date6[0]; //alert(endDate)

                                document.getElementById("lawatan_tapak").value=startDate+'-'+endDate;
                        }

                        if(kalendarData[i].kategori==4 && kalendarData[i].tarikh_tamat) {
                                let date7=kalendarData[i].tarikh_mula.split("-");
                                let date8=kalendarData[i].tarikh_tamat.split("-");

                                let startDate=date7[2]+'/'+date7[1]+'/'+date7[0]; //alert(startDate)
                                let endDate=date8[2]+'/'+date8[1]+'/'+date8[0]; //alert(endDate)

                                document.getElementById("mesyuarat_date").value=startDate+'-'+endDate;
                        }

            }

                var length= window.localStorage.getItem('loader_count');
                localStorage.setItem("loader_count", length-1);
                if(length==1)
                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                }

        });
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/mmpms_vr/"+pp_id_new+"/"+type,
            responseType: 'json',            
        })
        .then(function (response) { 
            kalendarData=response.data.data
            console.log(kalendarData.length)

            for(i=0;i<kalendarData.length;i++){
                console.log(kalendarData[i].keputusan_mesyuarat);
                

                if(kalendarData[i].keputusan_mesyuarat==0){
                    var keputusan_mesyuarat='Ya, Setuju Laksana Makmal';
                }
                else{
                    var keputusan_mesyuarat='Tidak, Mesyuarat Pra Makmal Seterusnya';
                }
                
                button = '<button type="button" onClick="removeMmpm('+kalendarData[i].id+')" class="sjm_table_btn"><i class="mdi mdi-window-close" style="font-size: 2em;" id="close_image"></i></button>'
   
              $("#mmpms_vr_table tbody").append(
              '<tr id="validation1'+kalendarData[i].id+'">'+
                '<td>'+
                  (i+1)+
                '</td>'+
                '<td>'+
                    kalendarData[i].cadangan_pra_makmal+
                '</td>'+
                '<td>'+
                    kalendarData[i].pra_makmal_sebenar+
                '</td>'+
                '<td>'+
                    kalendarData[i].sjm_file_name+
                '</td>'+
                '<td>'+
                    keputusan_mesyuarat+
                '</td>'+
                '<td>'+
                    kalendarData[i].mm_file_name+
                '</td>'+
                '<td style="text-align:center;">'+button+'</td>'+
              '</tr>')
            }

                var length= window.localStorage.getItem('loader_count');
                localStorage.setItem("loader_count", length-1);
                if(length==1)
                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                }
        })

        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/vm/vrData/"+pp_id_new+"/"+type,
            responseType: 'json',            
        })
        .then(function (response) { 

                 console.log(response.data.data);
                
                // return;
                if(response.data.data.length>0){
                        var string=response.data.data[0].objecktif_selepas; console.log(string);
                        if(string!=null)
                        {
                                var split_string = string.split('<===>,');
                                console.log(response.data.data2)
                                
                                for(k=0;k<split_string.length;k++){
                                $('#tbodynewobjektif').append(
                                        `<tr id="OR${k}">
                                        <td class="row-index text-center">
                                        <p> ${k+1}</p>
                                        </td>
                                        <td>
                                        <textarea id="obj${objektifrowIdx}" name="obj" class="form-control text-center" type="text" value="`+split_string[k]+`"> `+removeSpecialCharacterCombination(split_string[k])+`</textarea>
                                        </td>
                                        
                                        <td class="text-center">
                                        <button class="vmplus_minus" type="button" onClick="removeObjektifRow(${k})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                        </td>
                                        </tr>`);
                                }

                        }                      
                }

                const fileInput = document.querySelector("#objektif_file");

                if(response.data.data2) {
                // Create a new File object
                const myFile = new File(['Hello World!'], response.data.data2.media[0].original_url, {
                type: response.data.data2.media[0].mime_type,
                lastModified: new Date(),
                });
        
                // Now let's create a DataTransfer to get a FileList
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(myFile);
                fileInput.files = dataTransfer.files;
                        // $("#objektif_file").(response.data.data2.media[0].original_url);
                        // $("#objektif_file").val(url);
                        $("#fileName").text(response.data.data2.objektif_file);
                        $("#filePreview3").attr('src','{{ asset('assets/pdf.jpg.png') }}');
                        // var file_name1=$("#objektif_file").val();
                        // $("#fileName3").text(file_name1);
                        $("#Uploadfile3").addClass('d-none')
                        $("#fileUploaded3").removeClass('d-none')
                }
                // }
                var length= window.localStorage.getItem('loader_count');
                localStorage.setItem("loader_count", length-1);
                if(length==1)
                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                }
        })


        })
        
        $("#vrsimpan").click(function(){
        // var jps_Tandatangan=$("#jps").val();
        
      var Cadangan_Pra_Makmal=$("#tarikh_cadangan").val();
      var Pra_Makmal_Sebenar=$("#tarikh_pra_makmal_sebenar").val();
      var surat_jemputan=$("#surat_jemputan").val();
      var minit_mesyuarat=$("#minit_mesyuarat").val();
    //   console.log(jps_Tandatangan)
        
 
      if(Cadangan_Pra_Makmal==''){
        $("#error_tarikh_cadangan").text('Data tidak Dimuatkan')
        $("#surat_jemputan_error").text('')
        $("#minit_mesyuarat_error").text('')
        $("#keputusan_mesyuarat_error").text('')
        $("#error_tarikh_pra_makmal_sebenar").text('')

        return false;
      }  
      if(Pra_Makmal_Sebenar==''){
        $("#error_tarikh_cadangan").text('')
        $("#surat_jemputan_error").text('')
        $("#error_tarikh_pra_makmal_sebenar").text('Sila pilih tarikh')
        $("#minit_mesyuarat_error").text('')
        $("#keputusan_mesyuarat_error").text('')

        return false;

      }
      if(surat_jemputan==''){
        $("#error_tarikh_cadangan").text('')
        $("#surat_jemputan_error").text('Fail Tidak Dipilih')
        $("#error_tarikh_pra_makmal_sebenar").text('')
        $("#minit_mesyuarat_error").text('')
        $("#keputusan_mesyuarat_error").text('')

        return false;
      }
      if ($("input:radio[name='inlineRadioOptions']").is(":checked")) {
            $("#keputusan_mesyuarat_error").text('')
            var keputusan_mesyuarat=$("input:radio[name='inlineRadioOptions']:checked").val();
        }
        else{
        $("#keputusan_mesyuarat_error").text('Sila pilih Jenis Jabatan')
        $("#error_tarikh_cadangan").text('')
        $("#surat_jemputan_error").text('')
        $("#error_tarikh_pra_makmal_sebenar").text('')
        $("#minit_mesyuarat_error").text('')
        return false;
        }
      if(minit_mesyuarat==''){
        $("#error_tarikh_cadangan").text('')
        $("#surat_jemputan_error").text('')
        $("#error_tarikh_pra_makmal_sebenar").text('')
        $("#minit_mesyuarat_error").text('Fail Tidak Dipilih')
        $("#keputusan_mesyuarat_error").text('')

        return false;
      }



      if(Cadangan_Pra_Makmal!=''&& Pra_Makmal_Sebenar!=''&& surat_jemputan!=''&&keputusan_mesyuarat!=''&&minit_mesyuarat!=''){
        var allowedExtensions = /(\.pdf|\.png)$/i;
          if(!allowedExtensions.exec(surat_jemputan)){
                $("#error_tarikh_cadangan").text('')
                $("#error_tarikh_pra_makmal_sebenar").text('')
                $("#minit_mesyuarat_error").text('')
                $("#keputusan_mesyuarat_error").text('')
                $("#surat_jemputan_error").text('gunakan fail pdf atau png sahaja')
            return false;
            }
            else if(!allowedExtensions.exec(minit_mesyuarat)){
                $("#error_tarikh_cadangan").text('')
                $("#error_tarikh_pra_makmal_sebenar").text('')
                $("#minit_mesyuarat_error").text('gunakan fail pdf atau png sahaja')
                $("#keputusan_mesyuarat_error").text('')
                $("#surat_jemputan_error").text('')
                return false;
            }
          else{
            var url = $(location).attr('href'),
            parts = url.split("/"),
            type=parts[parts.length-1];

            $("#minit_mesyuarat_error").text('')
                var file1=$("#surat_jemputan").prop('files')[0];
                var file2=$("#minit_mesyuarat").prop('files')[0];
                var formEl = document.forms.VRform;
                var formData = new FormData(formEl);
                formData.append('user_id',{{Auth::user()->id}});
                formData.append('Cadangan_Pra_Makmal',Cadangan_Pra_Makmal);
                formData.append('Pra_Makmal_Sebenar',Pra_Makmal_Sebenar);
                formData.append('file1',file1);
                formData.append('file2',file2);
                formData.append('keputusan_mesyuarat',keputusan_mesyuarat);
                formData.append('pp_id',{{$kod_projek}});
                formData.append('type',type);

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");

                const api_url = "{{env('API_URL')}}";  
                pelakasanan_api = api_url+"api/project/VRformData";
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
                  $('#save_text').removeClass('d-none');
                  $("#add_role_sucess_modal").modal('show');
                      $("#sucess_modal").modal('hide');
                    }else {
                      $("#add_selenggara_data_modal").modal('hide');
                      $("#sucess_modal").modal('show');
                    }

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
            })  

          }
      }
    });


    function removeSpecialCharacterCombination(inputString) {
        // Use a regular expression to match and replace the specified combination of special characters
        return inputString.replace(/[<===>]+/g, '');
    }

    function removeMmpm(id)
    {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer "+ window.localStorage.getItem('token');
        
        
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
                $('#save_text').addClass('d-none');
                $('#delete_text').removeClass('d-none');
                $("#tutup").click(function(){
                    var url = "{{ route('vm.maklumatPelakasanaanMakmal_VR',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'VR')
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

    $("#inlineRadio1").click(function(){
        hideBelowData();
      })

      $("#inlineRadio2").click(function(){
        showBelowData();
      })

      function hideBelowData(){
        $("#mmpm").addClass('d-none');
        $("#sjm_table_div").addClass('d-none');
        $("#Butiran_Makmal_label").addClass('d-none');
        $("#Butiran_Makmal_hr").addClass('d-none');
        $("#butiran").addClass('d-none');
        $("#projek_cmn_table").addClass('d-none');
        $("#draft_laporan_label").addClass('d-none');
        $("#draft_laporan").addClass('d-none');
        $(".label-1").addClass('d-none');
        $("#submit_lampiran").addClass('d-none')
        $("#muat_naik_surat_form").removeClass('d-none');
        $("#muat_naik_surat_table").removeClass('d-none');
        $("#card-body-2").removeClass('d-none');
        $("#card-body-1").addClass('d-none');
      }

      function showBelowData(){
        $("#mmpm").removeClass('d-none');
        $("#sjm_table_div").removeClass('d-none');
        $("#Butiran_Makmal_label").removeClass('d-none');
        $("#Butiran_Makmal_hr").removeClass('d-none');
        $("#butiran").removeClass('d-none');
        $("#projek_cmn_table").removeClass('d-none');
        $("#draft_laporan_label").removeClass('d-none');
        $("#draft_laporan").removeClass('d-none');
        $(".label-1").removeClass('d-none');
        $("#submit_lampiran").removeClass('d-none')
        $("#muat_naik_surat_form").addClass('d-none');
        $("#muat_naik_surat_table").addClass('d-none');
        $("#card-body-2").addClass('d-none');
        $("#card-body-1").removeClass('d-none');
      }
    

      $("#muat_naik_surat_file_name").on( "change", function() { 
      var file_name1=$("#muat_naik_surat_file_name").val().replace(/C:\\fakepath\\/i, ''); console.log(file_name1)
        $("#filePreviewsurat").attr('src','{{ asset('assets/pdf.jpg.png') }}');
        $("#fileNamesurat").text(file_name1);
        $("#Uploadfilesurat").addClass('d-none')
        $("#fileUploadedsurat").removeClass('d-none')
    } );

    $("#removefilesurat").click(function(){
      $("#muat_naik_surat_file_name").val('')
      $("#filePreviewsurat").attr('src','');
      $("#Uploadfilesurat").removeClass('d-none')
        $("#fileUploadedsurat").addClass('d-none')
    });

    $("#simpan_btn").click(function(){
          var file2=$("#muat_naik_surat_file_name").prop('files')[0];

          var muat_naik_surat_file_name=$("#muat_naik_surat_file_name").val();
          if(muat_naik_surat_file_name==''){
                $("#muat_naik_surat_file_name_error").text('Sila muatnaik lampiran');
                return false;
          }

        $("#muat_naik_surat_file_name_error").text('');

          var formData = new FormData();

          formData.append('user_id',{{Auth::user()->id}});
          formData.append('pengecualian',1);
          formData.append('pengeculian_khas','surat_iringan_1.pdf');
          formData.append('surat_lampiran',file2);
          formData.append('pp_id',{{$kod_projek}});
          formData.append('type','VR');

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");


          const api_url = "{{env('API_URL')}}";  console.log(api_url);
          const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
          axios.defaults.headers.common["Authorization"] = api_token

                    $.ajaxSetup({
                          headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
                    axios({
                            method: "post",
                            url: api_url+"api/project/pengeculian_update",                            
                            data: formData,
                            headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                        })
                        .then(function (response) { 
                          location.reload();                        
                        });
    });

    $("#selesai_btn").click(function(){
          var file2=$("#muat_naik_surat_file_name").prop('files')[0];
          var formData = new FormData();

          formData.append('user_id',{{Auth::user()->id}});
          formData.append('pp_id',{{$kod_projek}});
          formData.append('type','VR');

          $("div.spanner").addClass("show");
          $("div.overlay").addClass("show");


          const api_url = "{{env('API_URL')}}";  console.log(api_url);
          const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
          axios.defaults.headers.common["Authorization"] = api_token

                    $.ajaxSetup({
                          headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
                    axios({
                            method: "post",
                            url: api_url+"api/project/selesai_update",                            
                            data: formData,
                            headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                        })
                        .then(function (response) { 
                          window.location.href = origin + '/senarai_selasai_makmal';                       
                        });
    });

    $(document).ready(function(){

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        const api_token = "Bearer "+ window.localStorage.getItem('token')
          axios.defaults.headers.common["Authorization"] = api_token
          axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/project/get_pengeculian_data?type=VR&id="+{{$kod_projek}},
          responseType: 'json',            
      })
      .then(function (response) { 
            tabledata=response.data.data
            console.log(response.data.data.length)

            if(tabledata.length>0) {
              hideBelowData();
              document.getElementById('inlineRadio1').checked = true;
              document.getElementById('inlineRadio2').checked = false;
              document.getElementById('selesai_btn').disabled = false;
              document.getElementById("selesai_btn").style.opacity = "1";
            }else{
              showBelowData();
              document.getElementById('inlineRadio1').checked = false;
              document.getElementById('inlineRadio2').checked = true;
              document.getElementById('selesai_btn').disabled = true;
              document.getElementById("selesai_btn").style.opacity = "0.5";
            }

            for(i=0;i<response.data.data.length;i++){

              var date_new = formatdate(tabledata[i].dikemaskini_pada);

              $("#pengecualian_table").append(
              '<tr id='+tabledata[i].id+'>'+
                '<td>'+
                  (i+1)+
                '</td>'+
                '<td>'+
                date_new+
                '</td>'+
                '<td>'+
                    '<a onclick="previewfile(\''+tabledata[i].id+'\',\''+tabledata[i].surat_lampiran+'\')" id="kemuka_file'+tabledata[i].id+'" style="text-decoration:none;color:black;cursor:pointer">'+tabledata[i].surat_lampiran+'</a>'+
                '</td>'+
              '</tr>')
            };

                 var length= window.localStorage.getItem('loader_count');
                localStorage.setItem("loader_count", length-1);
                if(length==1)
                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                }

      })
    });

    function formatdate(date){
                var date = new Date(date)
                const day = date.getDate(); 
                let day_new = 0;
                let month_new = 0;
                if(String(day).length==1)
                {
                    day_new='0'+day;
                }
                else
                {
                    day_new=day;
                }
                const month = date.getMonth() + 1; console.log(month)
                if(String(month).length==1)
                {
                    month_new='0'+month;
                }
                else
                {
                    month_new=month;
                }
                const year = date.getFullYear(); console.log(year)
                const date_new=day_new+'/'+month_new+'/'+year;

                return date_new;
            }
    
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        var fasilitators = {}
        let options = '<option value="">--Pilih--</option>'
        let fastype_options = '<option value="0">--Pilih--</option><option value="Ketua Fasilitator">Ketua Fasilitator</option><option value="Fasilitator">Fasilitator</option>'
        let all_butiran = {}

         // Get the modal element
         const modal = document.getElementById('exampleModal');
        $(document).ready(function () {


                $("#keputusan_mesyuarat_no").click(function(){
                        displayBelowItems(1);
                })

                $("#keputusan_mesyuarat_yes").click(function(){
                        displayBelowItems(0);
                })

                function displayBelowItems(type)
                { console.log(type)
                        if(type==1)
                        {
                        $("#vmsimpan_hantar").addClass('d-none');
                        $("#Butiran_Makmal_hr").addClass('d-none');
                        $("#butiran").addClass('d-none');
                        $("#projek_cmn_table").addClass('d-none');
                        $("#projek_obj_table").addClass('d-none');
                        $("#muat_form").addClass('d-none');
                        $("#maklu_head").addClass('d-none');
                        $("#head_data").addClass('d-none');
                        $("#objectiveForm").addClass('d-none');

                        
                        localStorage.setItem("keputusan_mesyuarat", '0');
                        }
                        else
                        {
                        $("#vmsimpan_hantar").removeClass('d-none');
                        $("#Butiran_Makmal_hr").removeClass('d-none');
                        $("#butiran").removeClass('d-none');
                        $("#projek_cmn_table").removeClass('d-none');
                        $("#projek_obj_table").removeClass('d-none');
                        $("#muat_form").removeClass('d-none');
                        $("#maklu_head").removeClass('d-none');
                        $("#head_data").removeClass('d-none');
                        $("#objectiveForm").removeClass('d-none');


                        localStorage.setItem("keputusan_mesyuarat", '1');
                        }
                }


                

                // When the modal is shown, set the data to be displayed
                modal.addEventListener('show.bs.modal', function (e) {
                        //get data-id attribute of the clicked element
                        var itemId = $(e.relatedTarget).data('id');
                        let current_butiran = all_butiran[itemId]

                        $("#modal_fasilitators").empty();
                        
                        document.getElementById("modal_cadangan_makmal").value = current_butiran.cadangan_makmal
                        document.getElementById("modal_negeri").value = current_butiran.negeri
                        document.getElementById("modal_makmal_sebenar").value = current_butiran.makmal_sebenar
                        document.getElementById("modal_lawatan_tapak").value = current_butiran.lawatan_tapak
                        document.getElementById("modal_tahun").value = current_butiran.tahun_makmal
                        document.getElementById("modal_kos_sebelum_makmal").value = current_butiran.kos_sebelum_makmal
                        document.getElementById("modal_kos_selepas_makmal").value = current_butiran.kos_pelakas_selepas_makmal

                        index = 0
                        $.each(current_butiran.fasilitators, function(key ,item) {
                                index = index +1
                                $('#modal_fasilitators').append(
                                        `<tr>
                                                <td>`+index+`</td>
                                                <td>
                                                        `+item.fasilitator.nama_fasilitator+`
                                                </td>
                                                <td>
                                                        `+item.fasilitator.gred_jawatan.nama_gred+`
                                                </td>
                                                <td>
                                                        `+item.fasilitator_type+`
                                                </td>
                                                <td>
                                                        `+item.fasilitator.bahagian.nama_bahagian+`
                                                </td>
                                        </tr>`
                                )
                        })
                });

                axios.defaults.headers.common["Authorization"] = "Bearer "+ window.localStorage.getItem('token')

                axios({
                        method: 'get',
                        url: "{{ env('API_URL') }}"+"api/vm/butiran",
                        responseType: 'json',
                        params: {
                                pp_id: {{$kod_projek}},
                                type: 'VR'
                        }            
                })
                .then(function (response) { 
                        butiranData = response.data.data
                        index = 0

                        if(butiranData.length > 0) {
                                $('#projek_cmn_table').removeClass('d-none');
                        }else{
                                $('#projek_cmn_table').addClass('d-none');
                        }
                        
                        $.each(butiranData, function(key, item) {
                                all_butiran[item.id] = item
                                index = index + 1
                                $('#existing_butiran').append(
                                        `<tr>
                                <td>`+index+`</td>
                                <td>`+item.cadangan_makmal+`</td>
                                <td>`+item.makmal_sebenar+`</td>
                                <td>`+item.lawatan_tapak+`</td>
                                <td>`+item.negeri+`</td>
                                <td>
                                  <button type="button" class="vmpaparbtn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+item.id+`" >Papar</button>
                                </td>
                              </tr>`
                                );


                                $.each(item.fasilitators, function(key, items) { 
                                        $('#butiran_tbody').append(`<tr class="mainrow">
                                                                <input style="font-size: 0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                                                                                <td class="mainNumbering" id="mainNumbering"></td>
                                                                                <td>
                                                                                       <input style="font-size: 0.8rem;" type="text" disabled class="form-control" value="`+items.fasilitator.nama_fasilitator+`">
                                                                                </td>
                                                                                <td class="grade" id="grade">
                                                                                `+items.fasilitator.gred_jawatan.nama_gred+`
                                                                                </td>
                                                                                <td>
                                                                                        <input style="font-size: 0.8rem;" type="text" disabled class="form-control" id="fasType" value="`+items.fasilitator_type+`">
                                                                                </td>
                                                                                <td class="jawatantd" id="jawatantd">
                                                                                `+items.fasilitator.bahagian.nama_bahagian+`
                                                                                </td>
                                                                                <td class="text-center">
                                                                                </td>
                                                        </tr>`);
                                });

                                let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                        
                                all_main_indexing.forEach((num, i) => {
                                        num.innerHTML = i + 1
                                })
                        })
                        
                        var length= window.localStorage.getItem('loader_count');
                        localStorage.setItem("loader_count", length-1);
                        if(length==1)
                        {
                                                $("div.spanner").removeClass("show");
                                                $("div.overlay").removeClass("show");
                        }
                })
                .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                })

                axios({
                        method: 'get',
                        url: "{{ env('API_URL') }}"+"api/project/get-fasilitator-list",
                        responseType: 'json',            
                })
                .then(function (response) { 
                        $.each(response.data.data, function(key, item) {
                                options = options + '<option value="' + item.id + '">' + item.nama_fasilitator + '</option>'
                                fasilitators[item.id] = {"name" : item.nama_fasilitator , "grade" : item.gred_jawatan.nama_gred , "bahagian": item.bahagian.nama_bahagian }

                        })
                        var table_count = document.getElementById('buti_table_id').rows.length; console.log(table_count);

                        $('#butiran_tbody').append(`<tr class="mainrow">
                                                        <input class="form-control text-center" type="hidden" value="" name="id">
                                                                        <td class="mainNumbering" id="mainNumbering">`+table_count+`</td>
                                                                        <td>
                                                                                <select style="font-size: 0.8rem;" class="form-control" id="fas_select">
                                                                                        `+options+`
                                                                                </select>
                                                                        </td>
                                                                        <td class="grade" id="grade">
                                                                        
                                                                        </td>
                                                                        <td>
                                                                                <select style="font-size: 0.8rem;" class="form-control" onclick="FastypeChange(this)" id="fasType">
                                                                                        `+fastype_options+`
                                                                                </select>
                                                                        </td>
                                                                        <td class="jawatantd" id="jawatantd">
                                                                        
                                                                        </td>
                                                                        <td class="text-center">
                                                                        <button class="vmplus_minus minusbutton" onclick="minusSubRow(this)" type="button"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                                                        </td>
                                                </tr>`);

                        let all_main_fas_select = document.querySelectorAll("[id^='fas_select']");
                        let all_main_grade = document.querySelectorAll("[id^='grade']");
                        let all_main_jawatan = document.querySelectorAll("[id^='jawatantd']");


                        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");

                        all_main_indexing.forEach((num, i) => {
                                num.innerHTML = i + 1
                        })

                        all_main_fas_select.forEach((tb, i) => { 
                                tb.addEventListener("change", function(evt){
                                        fasil = fasilitators[all_main_fas_select[i].value]
                                        all_main_grade[i].innerHTML = fasil.grade
                                        all_main_jawatan[i].innerHTML = fasil.bahagian
                                })
                        })

                        var length= window.localStorage.getItem('loader_count');
                        localStorage.setItem("loader_count", length-1);
                        if(length==1)
                        {
                                                $("div.spanner").removeClass("show");
                                                $("div.overlay").removeClass("show");
                        }
                })
                .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                })

                
                
                
                // jQuery button click event to add a row for fasilitator
                $('#addBtnFas').on('click', function () {
                    // Adding a row inside the tbody.
                    $('#butiran_tbody').append(`<tr class="mainrow">
                    <input class="form-control text-center" type="hidden" value="" name="id">
                                <td class="mainNumbering" id="mainNumbering"></td>
                                <td>
                                        <select style="font-size: 0.8rem;" class="form-control" id="fas_select">
                                                `+options+`
                                        </select>
                                </td>
                                <td class="grade" id="grade">
                                
                                </td>
                                <td>
                                        <select style="font-size: 0.8rem;" class="form-control" onclick="FastypeChange(this)" id="fasType">
                                                `+fastype_options+`
                                        </select>
                                </td>
                                <td class="jawatantd" id="jawatantd">
                                
                                </td>
                                <td class="text-center">
                                <button class="vmplus_minus minusbutton" onclick="minusSubRow(this)" type="button"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                          </tr>`);

                          let all_main_minu_btn = document.querySelectorAll(
                                ".minusbutton"
                        );
                        let all_main_tr = document.querySelectorAll(
                                ".mainrow"
                        );

                        let all_main_fas_select = document.querySelectorAll("[id^='fas_select']");
                        let all_main_grade = document.querySelectorAll("[id^='grade']");
                        let all_main_jawatan = document.querySelectorAll("[id^='jawatantd']");


                        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                        
                        all_main_indexing.forEach((num, i) => {
                                num.innerHTML = i + 1
                        })
                        
                        all_main_fas_select.forEach((tb, i) => { 
                                tb.addEventListener("change", function(evt){
                                        fasil = fasilitators[all_main_fas_select[i].value]
                                        all_main_grade[i].innerHTML = fasil.grade
                                        all_main_jawatan[i].innerHTML = fasil.bahagian
                                })
                        })


                        // if(all_main_minu_btn.length > 0) {
                        //         all_main_minu_btn[all_main_minu_btn.length - 1].addEventListener("click", () => {
                        //                 console.log('remove')
                        //                 all_main_tr[all_main_minu_btn.length - 1].remove();
                                        
                        //                 let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                                        
                        //                 all_main_indexing.forEach((num, i) => {
                        //                         num.innerHTML = i + 1
                                        
                        //                 })
                        //         })
                        // }
                });

                
                
        })

</script>
<!-- Simpan Butiran -->
<script>

        function FastypeChange(element){
                console.log(element)
                var parent = element.parentNode.parentNode; console.log(parent);
                var current = element.value; console.log(current);
                let count  = 0;

                let all_main_fas_type = document.querySelectorAll("[id^='fasType']"); console.log(all_main_fas_type);
                $.each(all_main_fas_type, function (key, item) { console.log(item);
                        if (item.value=='Ketua Fasilitator')
                        {
                                count=count + 1;
                        }
                });

                console.log('count'); console.log(count);
                if(count>1 && current!='Fasilitator')
                {
                    element.value='0';
                    $("select option[value*='Ketua Fasilitator']").prop('disabled',true);
                }
                else
                {
                    $("select option[value*='Ketua Fasilitator']").prop('disabled',false);
                }
        }
        function minusSubRow(element) {
                var delete_row = element.parentNode.parentNode; console.log(delete_row);
                delete_row.parentNode.removeChild(delete_row);

                let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                                
                                all_main_indexing.forEach((num, i) => {
                                        num.innerHTML = i + 1
                                })
        }
        $('#submit_butiran').click(function(){
                fasi_validation = true;
                document.getElementById("error_makmal_sebenar").innerHTML = ''
                document.getElementById("error_negeri").innerHTML = ''
                document.getElementById("error_lawatan_tapak").innerHTML = ''
                document.getElementById("error_fasilitator").innerHTML = ''
                document.getElementById("error_kos_pelakas_selepas_makmal").innerHTML = ''


                negeri = document.getElementById("negeri").value
                makmal_sebenar = document.getElementById("makmal_sebenar").value
                lawatan_tapak = document.getElementById("lawatan_tapak").value
                kos_pelakas_selepas_makmal = document.getElementById("kos_pelakas_selepas_makmal").value


                if(negeri == '') {
                        document.getElementById("error_negeri").innerHTML = 'Sila lengkapkan bahagian ini'
                }

                if(makmal_sebenar == '') {
                        document.getElementById("error_makmal_sebenar").innerHTML = 'Sila lengkapkan bahagian ini'
                }

                if(lawatan_tapak == '') {
                        document.getElementById("error_lawatan_tapak").innerHTML = 'Sila lengkapkan bahagian ini'
                }

                if(kos_pelakas_selepas_makmal == '') {
                        document.getElementById("error_kos_pelakas_selepas_makmal").innerHTML = 'Sila Kos Pelaksanaan Makmal(Selepas) ini'
                }

                
                let all_main_fas_select = document.querySelectorAll("[id^='fas_select']");
                let all_main_fas_type = document.querySelectorAll("[id^='fasType']");
        
                if(all_main_fas_select.length == 0) {
                        fasi_validation = false;
                        document.getElementById("error_fasilitator").innerHTML = 'Sila tambah minimum satu Fasilitator'
                }

                all_main_fas_select.forEach((fas_select, i) => {
                        
                        if(fas_select.value == '') {
                                fasi_validation = false;
                                document.getElementById("error_fasilitator").innerHTML = 'Sila pilih Fasilitator'
                        }
                })

                all_main_fas_type.forEach((fas_type, i) => {
                        if(fas_type.value == '') {
                                fasi_validation = false;
                                document.getElementById("error_fasilitator").innerHTML = 'Sila pilih Fasilitator Peranan'
                        }
                })

                if(fasi_validation) {
                        selected_fasilitator = [];
                        all_main_fas_select.forEach((fas_select, i) => {
                                if(fas_select.getAttribute('disabled') === null)
                                {
                                        selected_fasilitator.push(`{"fas_value" : "` +fas_select.value+ `", "fas_type" : "`+all_main_fas_type[i].value+ `" }`)
                                }
                        })
                        var CurrentDate=$("#year1").val();
                        var formEl = document.forms.butiran;
                        var formData = new FormData(formEl);

                        formData.append('pp_id', {{$kod_projek}})
                        formData.append('user_id', {{Auth::user()->id}})
                        formData.append('negeri', negeri)
                        formData.append('makmal_sebenar', makmal_sebenar)
                        formData.append('lawatan_tapak', lawatan_tapak)
                        formData.append('CurrentDate',CurrentDate),
                        formData.append('cadangan_makmal', document.getElementById("cadangan_makmal").value)
                        formData.append('tahun_makmal', document.getElementById("year").value)
                        formData.append('type', 'VR')

                        formData.append('mesyuarat_date', document.getElementById("mesyuarat_date").value)
                        formData.append('kos_sebelum_makmal',  document.getElementById("kos_sebelum_makmal").value)
                        formData.append('kos_pelakas_selepas_makmal', kos_pelakas_selepas_makmal)

                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show");


                        selected_fasilitator.forEach((item) => {
                                formData.append('fasilitator[]', item);
                        });
                        const api_url = "{{env('API_URL')}}";
                        const api_token = "Bearer "+ window.localStorage.getItem('token');     

                        axios({
                                method: 'post',
                                url: api_url+"api/vm/butiran",
                                responseType: 'json',
                                headers: {"Authorization": api_token, },
                                data: formData
                        })
                        .then(function (response) { 
                                if(response.data.code == 200) {  
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show"); 
                                $('#save_text').removeClass('d-none');
                                $("#add_role_sucess_modal").modal('show');
                                $("#tutup").click(function(){
                                        var url = "{{ route('vm.maklumatPelakasanaanMakmal_VR',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'VR')

                                        // url = url.replace(":status", response.data.data.workflow_status)
                                        // url = url.replace(":user_id", response.data.data.dibuat_oleh)
                                        window.location.href = url
                                })
                                }else {
                                        if(response.data.code == 422) {
                                                Object.keys(response.data.data).forEach(key => {						
                                                        document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                                                });
                                        }
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
                
        })
        var oldobjektiflength = 0;
      var newobjektiflength = 0;
      var objektifrowIdx = 0;

        $('#addBtnObjektif').on('click', function () {
                    var length_obj= window.localStorage.getItem('obj_length'); 

                    newobjektiflength = newobjektiflength + 1
                    // Adding a row inside the tbody.
                    $('#tbodynewobjektif').append(`<tr id="OR${newobjektiflength}">
                        <td class="row-index text-center">
                            <p> ${newobjektiflength}</p>
                            </td>
                            <td>
                              <textarea id="obj${newobjektiflength}" name="obj" class="form-control text-center" type="text" value=""></textarea>
                            </td>
                            
                            <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeObjektifRow(${newobjektiflength})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                            </td>
                          </tr>`);
                });

                function removeObjektifRow(id){
                        var row = document.getElementById('OR'+id);
                        row.parentNode.removeChild(row);
                }

                $("#vr_objective_simpan").click(function(){
                        // console.log()
                        // if(objektifrowIdx==0){
                        //         $("#newobjektifTable_error").text('Objektif is Empty')
                        //         $("#objektif_file_error").text('') 
                        //         return false;

                        // }
                        var allObj = $("textarea[name*='obj']"); console.log(allObj);
                        var arrayData=[];
                        $.each(allObj, function(i, item) {  //i=index, item=element in array
                        var itemname = $(item).val()+'<===>'; console.log(itemname);
                        arrayData.push(itemname);
                        });

                        console.log(arrayData)
                        var objektif_file=$("#objektif_file").val();
                        //   console.log(jps_Tandatangan)
                        
                        if(allObj==''){
                                $("#newobjektifTable_error").text('Sila Masukkan Nilai')
                                $("#objektif_file_error").text('')

                                return false;
                        }  
                        if(objektif_file==''){
                                $("#newobjektifTable_error").text('')
                                $("#objektif_file_error").text('Fail Tidak Dipilih')

                                return false;

                        }


                        if(allObj!=''&& objektif_file!=''){
                                var allowedExtensions = /(\.pdf|\.png)$/i;
                                if(!allowedExtensions.exec(objektif_file)){
                                        $("#newobjektifTable_error").text('')
                                        $("#objektif_file_error").text('gunakan fail pdf atau png sahaja')
                                        return false;
                                }
                                else{
                                        var Data=[];
                                var url = $(location).attr('href'),
                                parts = url.split("/"),
                                type=parts[parts.length-1];
                                $("#objektif_file_error").text('')
                                var file1=$("#objektif_file").prop('files')[0];
                                var formEl = document.forms.objectiveForm;
                                var formData = new FormData(formEl);
                                formData.append('user_id',{{Auth::user()->id}});
                                formData.append('objVal',arrayData);
                                formData.append('objektif_file',file1);
                                formData.append('pp_id',{{$kod_projek}});
                                formData.append('type',type);

                                $("div.spanner").addClass("show");
                                $("div.overlay").addClass("show")

                                const api_url = "{{env('API_URL')}}";  
                                pelakasanan_api = api_url+"api/vm/vr_objectiveData";
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
                                        $('#save_text').removeClass('d-none');
                                        $("#add_role_sucess_modal").modal('show');
                                        $("#sucess_modal").modal('hide');
                                        }else {
                                        $("#add_selenggara_data_modal").modal('hide');
                                        $("#sucess_modal").modal('show');
                                        }

                                        $("div.spanner").addClass("show");
                                        $("div.overlay").addClass("show")
                                })  

                                }
                        }
                })

                $("#close_image").click(function(){
                        location.reload();
                });

                $("#SelesaiBtn").click(function(){
                        var formData={
                                'pp_id':{{$kod_projek}},
                                'user_id':{{Auth::user()->id}},
                                'status':41
                        }

                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show")

                        const api_url = "{{env('API_URL')}}";  
                        pelakasanan_api = api_url+"api/project/selesai";
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

                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");

                                $("#tutup-confirm").click(function(){
                                        if(response.status==200){
                                                var url = "{{ route('vm.senaraiSelasaiMakmal') }}"
                                                window.location.href = url        
                                        }    
                                })
                                $("#global_sucess_modal").modal('show');
                                
                                
                        })
                })

        $('#vmpop_btn_1').mouseover(function () {
              $('#vmpop_content_1').removeClass('d-none');      
        });
        $('#vmpop_btn_1').mouseout(function () {
              $('#vmpop_content_1').addClass('d-none');      
        });

                
</script>
