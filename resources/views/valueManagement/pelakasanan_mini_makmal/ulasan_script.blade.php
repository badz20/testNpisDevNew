<script>

var ulasanrowIdx = 0;
var sejarahrowIdx = 0
var Ulasanreadonly ='';
var existing_memo_file = false
$(document).ready(function () {

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
                                    <input class="form-control text-center" type="text" `+Ulasanreadonly+` value="`+item.perkara+`">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="text" `+Ulasanreadonly+` value="`+item.catatan+`" >
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
                                    <input class="form-control text-center" type="text" `+Ulasanreadonly+` value="">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="text" `+Ulasanreadonly+` value="" >
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
                                      <input class="form-control" type="text" value="`+item.catatan+`" `+tempread+`>
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

                    $.each(response.data.data.UlasanHistory, function (key, item) {
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
                                        <input class="form-control" type="text" value="`+item.tarikh_maklumbalas+`" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" value="`+item.status+`" readonly>
                                    </td>
                                </tr>`);
                    })
                }
            }

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

    
    $('#addUlasan').on('click', function () {
        $('#tbodyUlasan').append(`<tr id="UL${++ulasanrowIdx}">
                      <input class="form-control text-center" type="hidden" value="" name="id" `+Ulasanreadonly+`>
                            <td class="row-index text-center">
                                <p> ${ulasanrowIdx}</p>
                                </td>
                              <td>
                                <input class="form-control text-center" type="text" `+Ulasanreadonly+` value="">
                              </td>
                              <td>
                                <input class="form-control text-center" type="text" `+Ulasanreadonly+` value="" >
                              </td>
                              <td class="text-center">
                              <button class="vmplus_minus" type="button" onClick="removeUlasanRow(${ulasanrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                              </td>
                            </tr>`);
    })
    

    //save ulasan form
    $('#simpanUlusan').click(function(){
        if(current_status == '29') {
            submitUlasanUser('29')
        }else {
            submitUlasan(current_status)
        }
        
      })

    $('#BalasKeBahagian').click(function(){
        if(current_status == '29') {
            submitUlasanUser('28')
        }else {
            submitUlasan('28')
        }
        
    })

    $('#SubmitToPenyeleras').click(function(){
        submitUlasanUser('30')
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

function submitUlasanUser(status,sejarah = true)
{

    var ulasanData=[];
    $("#tbodyUlasanDisabled tr").each(function(){              
        var currentRow=$(this);
        var id_value=currentRow.find("input").val();
        var col1_value=currentRow.find("td:eq(1) input").val();
        var col2_value=currentRow.find("td:eq(2) input").val();
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
        if(response.data.code == 200) {  
            let status = response.data.data.status
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show"); 
            $("#add_role_sucess_modal").modal('show');
            $("#tutup").click(function(){
                if(status == 27 || status == 29) {
                    var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", "Mini_VA")
                }else {
                    var url = "{{ route('vm.list') }}"
                }
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

function submitUlasan(status)
{
    var ulasanData=[];
    validation_ulasan = false
    memo = document.getElementById("memo");
    $("#tbodyUlasan tr").each(function(){              
        var currentRow=$(this);
        var id_value=currentRow.find("input").val();
        var col1_value=currentRow.find("td:eq(1) input").val();
        var col2_value=currentRow.find("td:eq(2) input").val();

        if(col1_value == '' || col2_value == '' ) {
            validation_ulasan = true;
            document.getElementById('error_tbodyUlasan').innerHTML = 'Sila lengkap bahagian ni'
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
        document.getElementById("error_memo").innerHTML = 'Sila tandakan bahagian ini jika ingin hantar untuk ditandatangan.'
    }

    formData.append('existing_file', document.getElementById("existing_memo_file").value);
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
                if(response.data.code == 200) {  
                    let status = response.data.data.status
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show"); 
                    $("#add_role_sucess_modal").modal('show');
                    $("#tutup").click(function(){
                        if(status == 27 || status == 29) {
                            var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", "Mini_VA")
                        }else {
                            var url = "{{ route('vm.list') }}"
                        }
                        
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
</script>