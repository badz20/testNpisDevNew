<script>

var ulasanrowIdx = 0;
var sejarahrowIdx = 0
var Ulasanreadonly ='';
var existing_memo_file = false
$(document).ready(function () {

    document.getElementById("SubmitToPenyeleras").style.opacity = "0.5";
    document.getElementById("upload_memo").style.display = 'block';
    document.getElementById("memo_preview").style.display = 'none';
    document.getElementById("SubmitToPenyeleras").disabled = true;

    $("#add_role_sucess_modal").modal({ backdrop: "static ", keyboard: false });

    axios({
          method: 'get',
          url: "{{ env('API_URL') }}"+"api/vm/ulasan",
          responseType: 'json',
          params: {
              pp_id: {{$kod_projek}},
              type: 'VA'
          }            
      })
      .then(function (response) { 

            if(response.data.data.memo) {

                document.getElementById('memo_file_type').classList.add("d-none");
                document.getElementById('memo_file_size').classList.add("d-none");
                document.getElementById("upload_memo").style.display = 'none';
                document.getElementById("memo_preview").style.display = 'block';
                $('#lm_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                $('#memo_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                document.getElementById("header_memo_name").innerHTML = response.data.data.memo.file_name;
                if(response.data.data.memo.file_name) {
                  existing_memo_file = true
                  existing_memo_filename = response.data.data.memo.file_name
                  document.getElementById("existing_memo_file").value = true
                }
              }

            if(response.data.data.project.status_perlaksanaan == '27') {
                if(response.data.data.Ulasan.length > 0) {
                    $.each(response.data.data.Ulasan, function (key, item) {
                        
                        $('#tbodyUlasan').append(`<tr id="UL${++ulasanrowIdx}">
                        <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id" `+Ulasanreadonly+`>
                                <td class="row-index text-center">
                                    <p> ${ulasanrowIdx}</p>
                                    </td>
                                <td>
                                    <input class="form-control" type="text" `+Ulasanreadonly+` value="`+item.perkara+`">
                                </td>
                                <td>
                                    <textarea class="form-control" type="text" `+Ulasanreadonly+` value="`+item.catatan+`" >`+item.catatan+`</textarea>
                                </td>
                                <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeUlasanRow(${ulasanrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                                </tr>`);
                    })
                }else {
                    $('#tbodyUlasan').append(`<tr id="UL${++ulasanrowIdx}">
                        <input class="form-control text-center" type="hidden" value="" name="id" `+Ulasanreadonly+`>
                                <td class="row-index text-center">
                                    <p> ${ulasanrowIdx}</p>
                                    </td>
                                <td>
                                    <input class="form-control" type="text" `+Ulasanreadonly+` value="">
                                </td>
                                <td>
                                    <textarea class="form-control" type="text" `+Ulasanreadonly+` value="" ></textarea>
                                </td>
                                <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeUlasanRow(${ulasanrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                                </tr>`);
                }
            }

            if(response.data.data.project.status_perlaksanaan != '27' || response.data.data.project.status_perlaksanaan == '26') {
                if(response.data.data.Ulasan.length > 0) {
                    //Need to add check if user has role BKOR or not .. for now assuming having no BKOR

                    $.each(response.data.data.Ulasan, function (key, item) {
                        let completed = ''
                        let tempread = 'readonly'
                        let selected = ''
                        let option_values = ['Tiada Perubahan','Perlu Pindaan','Selesai']
                        let checkbox_value = 0
                        if(item.is_complete == 1) {
                            completed = 'checked'
                            tempread = 'readonly'
                            checkbox_value = 1
                        }
                        let options = ''

                        $.each(option_values, function(key, itemoptions) {

                            if(item.status == itemoptions) {
                                selected = 'selected'
                            }else {
                                selected = ''
                            }

                            options = options + '<option onclick="handleUlasanChecked(this)" value="' + itemoptions + '" '+ selected +'>' + itemoptions + '</option>'
                        })
                        let temp_disabled = ''

                        if((item.status == 'Tiada Perubahan' || item.status == 'Selesai')&& item.is_complete == 1) {
                            temp_disabled = 'disabled'
                        }

                        if(response.data.data.project.status_perlaksanaan == '29') {
                                status_disabled = ''
                        }else {
                            status_disabled = 'disabled'
                        }

                        if(response.data.data.project.status_perlaksanaan == '30') { 
                            tempread = 'readonly'
                            temp_disabled = 'disabled'
                            status_disabled = 'disabled'
                        }


                        $('#tbodyUlasanDisabled').append(`<tr id="UL${++ulasanrowIdx}">
                        <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id" `+tempread+`>
                                    <td class="row-index text-center">
                                        <p> ${ulasanrowIdx}</p>
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" value="`+item.perkara+`" `+tempread+`>
                                    </td>
                                    <td>
                                      <textarea class="form-control" type="text" value="`+item.catatan+`" `+tempread+`>`+item.catatan+`</textarea>
                                    </td>
                                    <td>
                                      <input class="form-check-input m-1" onClick="handleUlasanChecked(this)" type="checkbox" `+temp_disabled+` id="inlineCheckbox1" value="`+checkbox_value+`" `+completed+`>
                                    </td>
                                    <td>
                                      <select class="form-control" `+status_disabled+` value="`+item.status+`"> 
                                        `+options+`
                                          </select>
                                    </td>
                                </tr>`);
                                
                    })

                    $.each(response.data.data.UlasanHistory, function (key, item) { console.log(item);

                        var date_new=item.tarikh_maklumbalas;
                        if(item.tarikh_maklumbalas==null)
                        {
                            date_new=item.tarikh_hantar;
                        }
                        $('#tbodySejarah').append(`<tr id="UL${++sejarahrowIdx}">
                        <input class="form-control text-center" type="hidden" value="`+item.id+`" name="id">
                                    <td class="row-index text-center">
                                        <p> ${sejarahrowIdx}</p>
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" value="`+item.perkara+`" readonly>
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" value="`+item.tarikh_hantar+`" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" value="`+date_new+`" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" value="`+item.status+`" readonly>
                                    </td>
                                </tr>`);
                    })
                }
                else
                {
                    $('#tbodyUlasanDisabled').append(`<tr>
                                                <td colspan="5" class="row-index text-center">
                                                    <p> Tiada rekod dijumpai </p>
                                                </td>
                                            </tr>`);
                
                    $('#tbodySejarah').append(`<tr>
                                                <td colspan="5" class="row-index text-center">
                                                    <p> Tiada rekod dijumpai </p>
                                                </td>
                                            </tr>`);
                }
            }
            var length= window.localStorage.getItem('loader_count');
            localStorage.setItem("loader_count", length-1);

            if(length_data==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }
                                
      })
      .catch(function (error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })

    
    $('#addUlasan').on('click', function () {
        $('#tbodyUlasan').append(`<tr id="UL${++ulasanrowIdx}">
                      <input class="form-control text-center" type="hidden" value="" name="id" `+Ulasanreadonly+`>
                            <td class="row-index text-center">
                                <p> ${ulasanrowIdx}</p>
                                </td>
                              <td>
                                <input class="form-control text-left" type="text" `+Ulasanreadonly+` value="">
                              </td>
                              <td>
                                <textarea class="form-control" type="text" `+Ulasanreadonly+` value="" ></textarea>
                              </td>
                              <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeUlasanRow(${ulasanrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
                            
    })

    $('#addUlasanDisabled').on('click', function () {

        $('#tbodyUlasanDisabled').append(`<tr id="UL${++ulasanrowIdx}">
                      <input class="form-control text-center" type="hidden" value="" name="id" `+Ulasanreadonly+`>
                            <td class="row-index text-center">
                                <p> ${ulasanrowIdx}</p>
                                </td>
                              <td>
                                <input class="form-control text-left" type="text" `+Ulasanreadonly+` value="">
                              </td>
                              <td>
                                <textarea class="form-control" type="text" `+Ulasanreadonly+` value="" ></textarea>
                              </td>
                              <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeUlasanRow(${ulasanrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
    })
    

    $("#memo").on('change', function(){ 
        document.getElementById("error_memo").innerHTML = ''
        $new_file = $('#memo').prop('files')[0];
        if($new_file.size>4000000)
        { 
            document.getElementById("memo").value='';
            document.getElementById('memo_file_type').classList.add("d-none");
            document.getElementById('memo_file_size').classList.remove("d-none");
            document.getElementById("memo_image_error").innerHTML=""; 

            return false;
        }
        var allowedExtensions=["application/pdf", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("memo").value=''; 
            document.getElementById('memo_file_type').classList.remove("d-none");
            document.getElementById('memo_file_size').classList.add("d-none");
            document.getElementById("memo_image_error").innerHTML=""; 

            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#memo_img').attr('src','{{ asset('assets/pdf.jpg.png') }}');
                };
                reader.readAsDataURL($new_file);
            }
            document.getElementById("memo_image_error").innerHTML=""; 
            document.getElementById('memo_file_type').classList.add("d-none");
            document.getElementById('memo_file_size').classList.add("d-none");
            document.getElementById("upload_memo").style.display = 'none';
            document.getElementById("memo_preview").style.display = 'block';
            document.getElementById("header_memo_name").innerHTML = $new_file.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_memo_size").innerHTML = docu_size_2;
            
    });

    $("#remove_memo_logo").on('click', function(){ 
      document.getElementById("error_memo").innerHTML = 'Sila muat naik lampiran'
      $('#memo_img').val(null)
      document.getElementById("memo").value=''; 
      document.getElementById("upload_memo").style.display = 'block';
      document.getElementById("memo_preview").style.display = 'none';
      document.getElementById("existing_memo_file").value = false
    });

    const checkbox = document.getElementById('acknowledgement')

    checkbox.addEventListener('change', (event) => {
    if (event.currentTarget.checked) {
        document.getElementById('error_acknowledgement').innerHTML = '';
        document.getElementById("BalasKeBahagian").disabled = true;
       // document.getElementById("BalasKeBahagian").style.backgroundColor = "#808080";
        document.getElementById("SubmitToPenyeleras").disabled = false;
       // document.getElementById("SubmitToPenyeleras").style.backgroundColor = "#0acf97";

        document.getElementById("SubmitToPenyeleras").style.opacity = "1";
        document.getElementById("BalasKeBahagian").style.opacity = "0.5";

    } else {
        document.getElementById('error_acknowledgement').innerHTML = 'Tandakan ini jika ingin hantar ke Kementerian Ekonomi.';
        document.getElementById("BalasKeBahagian").disabled = false;
       // document.getElementById("BalasKeBahagian").style.backgroundColor = "#FFC35A";
        document.getElementById("SubmitToPenyeleras").disabled = true;
        //document.getElementById("SubmitToPenyeleras").style.backgroundColor = "#808080";

        document.getElementById("BalasKeBahagian").style.opacity = "1";
        document.getElementById("SubmitToPenyeleras").style.opacity = "0.5";

    }
    })

    //save ulasan form
    $('#simpanUlusan').click(function(){

        var memo=$("#memo").val();
        existing_memo_file = document.getElementById("existing_memo_file").value


        if(existing_memo_file == false && memo==''){
            $("#error_memo").text('Sila muat naik lampiran')
            return false;
        }

        $("#error_memo").text('')

        if(current_status == '29') {
            submitUlasanUser('29','save')
        }else {
            submitUlasan(current_status,'save')
        }
        
      })

    $('#BalasKeBahagian').click(function(){
        if(current_status == '29') {
            submitUlasanUser('28','submit')
        }else {
            submitUlasan('28','submit')
        }
        
    })

    $('#KemaskiniKepadaBahagianBtn').click(function(){
            submitUlasan('28','submit');
    })

    $('#SubmitToPenyeleras').click(function(){
        $("#global_sucess_modal").modal('show');
    })

    $('#tutup-global').click(function(){
        submitUlasanUser('30','submit')
    })
    $('#close-global').click(function(){
        $("#global_sucess_modal").modal('hide');
    })
})

function removeUlasanRow(id)
{
          var row = document.getElementById('UL'+id);
          row.parentNode.removeChild(row);
          document.getElementById('error_tbodyUlasan').innerHTML = ''
}

function handleUlasanChecked(cb)
{
    if(cb.checked) {
        cb.value = 1
    }else {
        cb.value = 0
    }
}

function submitUlasanUser(status,submit_type,sejarah = true)
{
    
    var memo=$("#memo").val();
    existing_memo_file = document.getElementById("existing_memo_file").value


        if(existing_memo_file == false && memo==''){
            $("#error_memo").text('Sila muat naik lampiran')
            return false;
        }

      $("#error_memo").text('')


    var ulasanData=[];
    $("#tbodyUlasanDisabled tr").each(function(){              
        var currentRow=$(this);
        var id_value=currentRow.find("input").val();
        var col1_value=currentRow.find("td:eq(1) input").val();
        var col2_value=currentRow.find("td:eq(2) textarea").val();
        var col3_value=currentRow.find("td:eq(3) input").val();
        var col4_value=currentRow.find("select").val();

        ulasanData.push(`{"perkara" : "`+col1_value+ `","catatan" : "`+col2_value+ `","id" : "`+ id_value+`","is_complete" : "`+col3_value+ `","status" : "`+col4_value+ `"}`);
    });

    var sejarahData=[];
    if(sejarah) {
        $("#tbodySejarah tr").each(function(){              
            var currentRow=$(this);
            var id_value=currentRow.find("input").val();
            var col1_value=currentRow.find("td:eq(1) input").val();
            var col2_value=currentRow.find("td:eq(2) input").val();
            var col3_value=currentRow.find("td:eq(3) input").val();
            var col4_value=currentRow.find("select").val();

            sejarahData.push(id_value);
        });
    }
    

    var formData = new FormData();

    formData.append('pp_id', {{$kod_projek}})
    formData.append('user_id', {{Auth::user()->id}})
    ulasanData.forEach((item) => {
        formData.append('ulasan[]', item);
    });

    sejarahData.forEach((item) => {
        formData.append('sejarah[]', item);
    });

    formData.append('status', status);
    formData.append('existing_file', true);
    formData.append('type', 'VA');

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");


    axios({
        method: 'post',
        url: api_url+"api/vm/ulasan",
        responseType: 'json',
        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
        data: formData
    })
    .then(function (response) { 
        $("#global_sucess_modal").modal('hide');

        if(response.data.code == 200) {  
            let status = response.data.data.status
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show"); 
            $("#add_role_sucess_modal").modal('show');
                    if(submit_type=='submit')
                    {
                        if(status == 30) {
                            $('#save_text').addClass('d-none');
                            $('#submit_text').addClass('d-none');      
                            $('#hanter_text').removeClass('d-none');
                        }else
                        {
                            $('#save_text').addClass('d-none');
                            $('#submit_text').removeClass('d-none');      
                            $('#hanter_text').addClass('d-none');
                        }

                      var url = "{{ route('vm.list') }}"

                    }
                    else
                    {
                      $('#submit_text').addClass('d-none');      
                      $('#save_text').removeClass('d-none'); 
                      var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'VA')    
                    }
            $("#tutup").click(function(){
                // if(status == 27 || status == 29) {
                //     var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                //                         url = url.replace(":kod", {{$kod_projek}})
                //                         url = url.replace(":type", 'VA')
                //  }else {
                //     var url = "{{ route('vm.list') }}"
                // }
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
        }
        
    })
    .catch(function (error) {
        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
    })
}

function submitUlasan(status,submit_type)
{
    var ulasanData=[];
    validation_ulasan = false
    memo = document.getElementById("memo");
    $("#tbodyUlasan tr").each(function(){              
        var currentRow=$(this);
        var id_value=currentRow.find("input").val();
        var col1_value=currentRow.find("td:eq(1) input").val(); console.log(col1_value)
        var col2_value=currentRow.find("td:eq(2) textarea").val(); console.log(col2_value)

        if(col1_value == '' || col2_value == '' ) {
            validation_ulasan = true;
            document.getElementById('error_tbodyUlasan').innerHTML = 'Sila lengkapkan bahagian ni'
        }
        ulasanData.push(`{"perkara" : "`+col1_value+ `","catatan" : "`+col2_value+ `","id" : "`+ id_value+`","status" : "`+''+`" }`);
    });

    var formData = new FormData();

    formData.append('pp_id', {{$kod_projek}})
    formData.append('user_id', {{Auth::user()->id}})
    ulasanData.forEach((item) => {
        formData.append('ulasan[]', item);
    });

    formData.append('status', status);
    existing_memo_file = document.getElementById("existing_memo_file").value
    
    if(memo.files[0]) {
        formData.append('memo', memo.files[0]);
    }
    
    if(existing_memo_file == false && memo.files[0] == null){
        validation_ulasan = true;
        document.getElementById("error_memo").innerHTML = 'Sila muat naik lampiran'
    }

    formData.append('existing_file', document.getElementById("existing_memo_file").value);
    formData.append('type', 'VA');


    //if (document.getElementById('acknowledgement').checked) {

        if(!validation_ulasan) {

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            axios({
                method: 'post',
                url: api_url+"api/vm/ulasan",
                responseType: 'json',
                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                data: formData
            })
            .then(function (response) { 
                if(response.data.code == 200) {  
                    let status = response.data.data.status
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show"); 
                    $("#add_role_sucess_modal").modal('show');

                    if(submit_type=='submit')
                    {
                      $('#submit_text').removeClass('d-none');      
                      $('#save_text').addClass('d-none');
                      var url = "{{ route('vm.list') }}"
                    }
                    else
                    {
                      $('#submit_text').addClass('d-none');      
                      $('#save_text').removeClass('d-none');  
                        var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                            url = url.replace(":kod", {{$kod_projek}})
                            url = url.replace(":type", 'VA')   
                    } 

                    $("#tutup").click(function(){
                        // if(status == 27 || status == 29) {
                        //     var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                        //                 url = url.replace(":kod", {{$kod_projek}})
                        //                 url = url.replace(":type", 'VA')
                        // }else {
                        //     var url = "{{ route('vm.list') }}"
                        // }
                        
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
                }
                
            })
            .catch(function (error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })
        }
        
    // }else {
    //     document.getElementById('error_acknowledgement').innerHTML = 'Sila tick bahagian ni'
    // }

}
</script>