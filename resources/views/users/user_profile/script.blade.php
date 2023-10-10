<script>

    function downloadDoc(id,type) {
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
        update_user_api = api_url+"api/user/user/download";
        data_update = {'user_id':id, 'type':type};
        var jsonString = JSON.stringify(data_update);
        $.ajaxSetup({
            headers: {
                        "Content-Type": "application/json",
                        "Authorization": api_token,
                        }
            });
        $.ajax({
                type: 'GET',
                url: update_user_api,
                data: {'user_id':id, 'type': type} , 
                //dataType:"json",
                xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 2) {
                                if (xhr.status == 200) {
                                    xhr.responseType = "blob";
                                } else {
                                    xhr.responseType = "text";
                                }
                            }
                        };
                        return xhr;
                    },
                //contentType: "application/pdf",
                success: async function(data) { 
                console.log('downlaoded')
                console.log(data)

                const str = data.type; console.log(str)
                    if(str)
                    {
                            const parts = str.split('/');
                            const doc_type = parts[1];  console.log(doc_type)   
                            var doc_name = 'document.'+doc_type;  console.log(doc_name)    
                    }
                    else
                    {
                            var doc_name = "document.pdf";    
                    }

                //Convert the Byte Data to BLOB object.
                var blob = new Blob([data], { type: "application/octetstream" });
    
                //Check the Browser type and download the File.
                // var isIE = false || !!document.documentMode;
                // if (isIE) {
                //    window.navigator.msSaveBlob(blob, fileName);
                // } else {
                    var url = window.URL || window.webkitURL;
                    link = url.createObjectURL(blob);
                    var a = $("<a />");
                    a.attr("download", doc_name);
                    a.attr("href", link);
                    $("body").append(a);
                    a[0].click();
                    $("body").remove(a);
                //}
                    //window.location.href = "{{ url('/home')}}";
                }
            });
        }

    $(document).ready(function() {
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

            document.getElementById('bahagian').disabled = true;
            document.getElementById('pejabat').disabled = true;
            document.getElementById('negeri').disabled = true;
            document.getElementById('daerah').disabled = true;
            document.getElementById('Jabatan').disabled = false;

        $('#show-me').hide();   
        $('input[type="radio"]').click(function() { //alert($(this).attr('id'));
            if($(this).attr('id') == 'agensi_luar') {
                $('#show-me').show();           
            }
    
            else {
                $('#show-me').hide();   
            }
        });

        $.ajaxSetup({
            headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        

        $("#negeri").on('change', function(){ 
            negeri = document.getElementById("negeri").value;
            var daerahdropDown =  document.getElementById("daerah");
            $("#daerah").empty();
            var el = document.createElement("option"); 
            el.textContent = '--Pilih--';
            el.value = '';
            daerahdropDown.appendChild(el);

            $.ajax({
            type: "GET",
            url: api_url+"api/lookup/daerah/list?id="+negeri,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                        $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_daerah;
                        el.value = opt;
                        daerahdropDown.appendChild(el);
                        })
                }
                else {
                        $.Notification.error(result.Message);
                }
            }
            });
        });

        

    $("#kementerian").on('change', function(){ 

        kementerian = document.getElementById("kementerian").value;
        var JabatandropDown =  document.getElementById("Jabatan");
        $("#Jabatan").empty();
        var el = document.createElement("option"); 
        el.textContent = '--Pilih--';
        el.value = '';
        JabatandropDown.appendChild(el);

        var jabatan_bahagiandropDown =  document.getElementById("jabatan_bahagian");
        $("#jabatan_bahagian").empty();
        var el = document.createElement("option"); 
        el.textContent = '--Pilih--';
        el.value = '';
        jabatan_bahagiandropDown.appendChild(el);

        $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jabatan/list?id="+kementerian,
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                    $.each(result.data, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_jabatan;
                    el.value = opt;
                    JabatandropDown.appendChild(el);
                    })
            }
            else {
                    $.Notification.error(result.Message);
            }
        }
        });

        var bahagiandropDown =  document.getElementById("bahagian");
        $("#bahagian").empty();
        var el = document.createElement("option"); 
        el.textContent = '--Pilih--';
        el.value = '';
        bahagiandropDown.appendChild(el);

        $.ajax({
        type: "GET",
        url: api_url+"api/lookup/bahagian-list?id="+kementerian,
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
                var opt = item.id;
                var el = document.createElement("option");
                el.textContent = item.nama_bahagian;
                el.value = opt;
                bahagiandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
        });
        document.getElementById("jabatan_bahagian").selectedIndex = 0;
    });

    $("#Jabatan").on('change', function(){ 

        Jabatan = document.getElementById("Jabatan").value;
        var jabatan_bahagiandropDown =  document.getElementById("jabatan_bahagian");
        $("#jabatan_bahagian").empty();
        var el = document.createElement("option"); 
        el.textContent = '--Pilih--';
        el.value = '';
        jabatan_bahagiandropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/bahagian/list?id="+Jabatan,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_bahagian;
                        el.value = opt;
                        jabatan_bahagiandropDown.appendChild(el);
                    })
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });
    });
    

    
    $.ajax({
            type: "GET",
            url: api_url+"api/portal/getperanan/list",
            dataType: 'json',
            success: function (result) { 
                console.log(result.data)
                
                if (result.data) {
                var table = document.getElementById("peranan-pop");
                const table1 = document.getElementById("peranan-pop-2");

                for(let k=0;k<result.data.length;k++)
                {
                    var tr = document.createElement('tr');
                    let popupdata = `
                                    <td>`+result.data[k].nama_peranan+`</td>
                                    <td>
                                    <input type="checkbox" id="`+result.data[k].id+`" class="m-auto d-block"/> 
                                </td>`; 
                    tr.innerHTML = popupdata;
                    table.appendChild(tr);

                    var tr1 = document.createElement('tr');
                    var new_id="list_"+result.data[k].id;
                    tr1.setAttribute("id", new_id);
                    tr1.classList.add("d-none");
                    let peranandata = `<td class="name_peranan">`+result.data[k].nama_peranan+`</td>
                                    <td class="rmv_per"><img onclick="removePeranan(`+result.data[k].id+`)" src="{{ asset('assets/images/delete.png') }}" alt="minus" />
                                        </td>`;
                    
                    tr1.innerHTML = peranandata;
                    table1.appendChild(tr1);
                }

                    
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
            
        });

        //get user roles
        $.ajax({
            type: "GET",
            url: api_url+"api/user_types/roles/" + {{$user_id}},
            dataType: 'json',
            success: function (result) { 
                console.log('peranan');
                console.log(result.data)
                
                if (result.data) {
                var table = document.getElementById("user-role-pop");
                // const table1 = document.getElementById("peranan-pop-2");
                    
                    $.each(result.data.all_roles, function(key, item) {
                        
                        var tr = document.createElement('tr');
                        let checked_value = '';
                        if(result.data.existing_roles.includes(item.name)) {
                            checked_value = 'checked';
                        }
                        let popupdata = `
                                        <td>`+item.name+`</td>
                                        <td>
                                        <input type="checkbox" id="assign-user" value="`+item.name+`" class="m-auto d-block" `+checked_value+`/> 
                                    </td>`; 
                        tr.innerHTML = popupdata;
                        table.appendChild(tr);
                        
                    })
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
            
        });

        //get user permission
        // $.ajax({
        //     type: "GET",
        //     url: api_url+"api/role/permissions/" + {{$user_id}},
        //     dataType: 'json',
        //     success: function (result) { 
        //         console.log('permissions');
        //         console.log(result.data.existing_permissions)
                
        //         if (result.data) {
        //         var table = document.getElementById("user-permission-pop");
        //         // const table1 = document.getElementById("peranan-pop-2");
                    
        //             $.each(result.data.all_permissions, function(key, item) {
                        
        //                 var tr = document.createElement('tr');
        //                 let checked_value = '';
        //                 if(result.data.existing_permissions.includes(item.id)) {
        //                     checked_value = 'checked';
        //                 }
        //                 let popupdata = `
        //                                 <td>`+item.name+`</td>
        //                                 <td>
        //                                 <input type="checkbox" id="assign-user-permission" value="`+item.name+`" class="m-auto d-block" `+checked_value+`/> 
        //                             </td>`; 
        //                 tr.innerHTML = popupdata;
        //                 table.appendChild(tr);
        //                 console.log(tr);
        //             })
        //         }
        //         else {
        //             $.Notification.error(result.Message);
        //         }
        //     }
            
        // });

        

        var user_id =  {{$user_id}}; console.log(user_id);
        var tmp_user = "{{$temp_type}}"; console.log(tmp_user);
        
        
        var list_user_api='';
        var update_user_api='';
        var data_update='';
        if(tmp_user!='temp')
        {
            document.getElementById("save").disabled = false;
            list_user_api = api_url+"api/user/details/"+user_id;
            update_user_api = api_url+"api/user/user/update";
            //data_update = $('#profile_view_form').serialize();
            document.getElementById("add_role_btn").classList.remove("d-none");
            document.getElementById("active_check").disabled = false;
            document.getElementById("regular_user_image").classList.remove("d-none");

        }
        else
        {
            document.getElementById("add_role_btn").classList.add("d-none");
            document.getElementById("save").disabled = true;
            list_user_api = api_url+"api/temp/details/temp/"+user_id;
            update_user_api = api_url+"api/user/approval";
            data_update = {'id':user_id};
            document.getElementById("active_check").disabled = true;
            document.getElementById("temp_user_image").classList.remove("d-none");
        }
        var jsonString = JSON.stringify(data_update);
        console.log(list_user_api)
    //console.log(jsonString);
        var greddropDown =  document.getElementById("gred");
        var negeridropDown =  document.getElementById("negeri");
        var jawatandropDown =  document.getElementById("Jawatan");
        var pejabatdropDown = document.getElementById("pejabat");
    
        $.ajax({
            type: "GET",
            url: list_user_api,
            dataType: 'json',
            success: function (result) { 
                console.log(result.data);
                if (result) { 
                   

                $.each(result.data.gred, function (key, item) {
                        // console.log(item.id)
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_gred;
                        el.value = opt;
                        greddropDown.appendChild(el);
                    })
                    $.each(result.data.negeri, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_negeri;
                        el.value = opt;
                        negeridropDown.appendChild(el);
                    })
                    $.each(result.data.jawatan, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_jawatan;
                        el.value = opt;
                        jawatandropDown.appendChild(el);
                    })
                    $.each(result.data.pejabat, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.pajabat_projek;
                        el.value = opt;
                        pejabatdropDown.appendChild(el);
                    })
                    var phone_no=result.data.user.no_telefon
                    if(phone_no){
                    var no_telefon = phone_no.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
                    }
                    else{ var no_telefon='';}
                    // console.log(no_telefon);
                    //console.log(document.getElementById("nama").innerHTML);
                    document.getElementById("name").value= result.data.user.name;
                    document.getElementById("nama_user").innerHTML= result.data.user.name;

                    document.getElementById("jawatan_text").innerHTML= result.data.user.jawatan.nama_jawatan;
                    if(result.data.user.jabatan.nama_jabatan){
                    document.getElementById("jabatan_text").innerHTML= result.data.user.jabatan.nama_jabatan;
                    }
                    if(result.data.user.bahagian.nama_bahagian){
                    document.getElementById("bahagian_text").innerHTML= result.data.user.bahagian.nama_bahagian;
                    }

                    document.getElementById("no_telefon").value=no_telefon;
                    document.getElementById("emel_rasmi").value= result.data.user.email;
                    document.getElementById("Jawatan").value= result.data.user.jawatan_id;
                    document.getElementById("gred").value= result.data.user.gred_jawatan_id;
                    //document.getElementById("kementerian").value= result.data.kementerian_id;
                    document.getElementById("Jabatan").value= result.data.user.jabatan_id;
                
                    if(result.data.user.negeri_id){
                    document.getElementById("negeri").value= result.data.user.negeri_id;
                    document.getElementById("negeri_drop_check").checked = true;
                    document.getElementById('negeri').disabled = false;
                    document.getElementById("current_box").value= "negeri";
                    }

                    if(result.data.user.daerah_id){
                    document.getElementById("daerah").value= result.data.user.daerah_id;
                    document.getElementById("daerah_drop_check").checked = true;
                    document.getElementById('daerah').disabled = false;
                    document.getElementById("current_box").value= "daerah";
                    }

                    if(result.data.user.pajabat_id){
                    document.getElementById("pejabat").value= result.data.user.pajabat_id;
                    document.getElementById("pejabat_drop_check").checked = true;
                    document.getElementById('pejabat').disabled = false;
                    document.getElementById("current_box").value= "pejabat";
                    }
                    document.getElementById("no_kad_pengenalan").value= result.data.user.no_ic;
                    document.getElementById("jenis_pengguna_id").value= result.data.user.jenis_pengguna_id;
                    // loadcompleted()


                    if(result.data.user.alasan_penolakan1 && result.data.user.alasan_penolakan2 && result.data.user.alasan_penolakan3)
                    {  
                        document.getElementById("profile_catatan").style.display = 'block';
                        var comment = "1 - " + result.data.user.alasan_penolakan1 + '\n' +
                                    "2 - " + result.data.user.alasan_penolakan2 + '\n' +
                                    "3 - " + result.data.user.alasan_penolakan3
                    }
                    else if(result.data.user.alasan_penolakan1 && result.data.user.alasan_penolakan2)
                    {  
                        document.getElementById("profile_catatan").style.display = 'block';
                        var comment = "1 - "+ result.data.user.alasan_penolakan1 + '\n' +
                                    "2 - "+ result.data.user.alasan_penolakan2 ;
                    }
                    else if(result.data.user.alasan_penolakan1)
                    { 
                        document.getElementById("profile_catatan").style.display = 'block';
                        var comment = "1 - "+ result.data.user.alasan_penolakan1;
                    }
                    else
                    { 
                        document.getElementById("profile_catatan").style.display = 'none';
                        var comment = '';
                    }
                    
                    document.getElementById("catatan").value= comment;
                    

                    if(result.data.user.status_pengguna_id==1 && result.data.user.row_status==1)
                    {
                        document.getElementById("inputState").value= 1;
                        document.getElementById("active_label").style.display = 'block';
                        document.getElementById("inactive_label").style.display = 'none';
                        
                    }
                    else
                    {
                        document.getElementById("inputState").value= 0;
                        document.getElementById("inactive_label").style.display = 'block';
                        document.getElementById("active_label").style.display = 'none';
                        // $("#active_check").removeAttr(checked);
                        document.getElementById("active_check").removeAttribute("checked");
                    }

                    var e = document.getElementById("bahagian"); 
                    if(e.options[e.selectedIndex])
                    {
                    var value=e.options[e.selectedIndex].value; 
                    var bahagian_selected=e.options[e.selectedIndex].text; 
                    }
                    else
                    {
                    var bahagian_selected = "Pengguna JUPEM";
                    }

                    if(result.data.user.jenis_pengguna_id!=1)
                    {

                        var kem_url= api_url+"api/lookup/kementerian-list-with-id?id="+result.data.user.kementerian_id+"&jabatan="+result.data.user.jabatan_id;
                        loadKementerian(kem_url,"non-jps",result.data.user.kementerian_id,result.data.user.bahagian_id,result.data.user.jabatan_id);
                        document.getElementById("kementerian").disabled = false;

                        if(result.data.user.bahagian_id){
                        if(result.data.user.jabatan_id)
                        {
                            document.getElementById("jabatan_bahagian").value= result.data.user.bahagian_id;
                            document.getElementById("jabatan_agensy_drop_check").checked = true;
                            document.getElementById('jabatan_bahagian').disabled = false;
                            document.getElementById("current_box").value= "jabatan";
                        }
                        else
                        {
                            document.getElementById('Jabatan').disabled = true;
                            document.getElementById('jabatan_bahagian').disabled = true;
                            document.getElementById("bahagian").value= result.data.user.bahagian_id;
                            document.getElementById("bahagian_drop_check").checked = true;
                            document.getElementById('bahagian').disabled = false;
                            document.getElementById("current_box").value= "bahagian";
                        }
                        }

                        document.getElementById("jps_negeri").classList.add('d-none');
                        document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
                        document.getElementById("jabatan_jps_drop").classList.add('d-none');
                        document.getElementById("pejabat_agensy_drop").classList.add('d-none');

                        document.getElementById("doku_sec").style.display = 'block';
                        document.getElementById("user_data_type").innerHTML = "Pengguna Agensi Luar";
                        document.getElementById("Jabatan").style.display = "block";
                        document.getElementById("peranan_id").innerHTML = bahagian_selected;

                    }
                    else 
                    { 
                        var kem_url= api_url+"api/lookup/kementerian-list-by-name";
                        loadKementerian(kem_url,"jps",result.data.user.kementerian_id,result.data.user.bahagian_id,result.data.user.jabatan_id);
                        document.getElementById("kementerian").disabled = true;
                        if(result.data.user.bahagian_id){
                        document.getElementById("bahagian").value= result.data.user.bahagian_id;
                        document.getElementById("bahagian_drop_check").checked = true;
                        document.getElementById('bahagian').disabled = false;
                        document.getElementById("current_box").value= "bahagian";
                        }

                        if(result.data.user.negeri_id){
                        loadDaerah(result.data.user.negeri_id,result.data.user.daerah_id);
                        }

                        document.getElementById("jps_negeri").classList.remove('d-none');
                        document.getElementById("jabatan_agensy_drop").classList.add('d-none');
                        document.getElementById("jabatan_jps_drop").classList.remove('d-none');
                        document.getElementById("pejabat_agensy_drop").classList.remove('d-none');

                        document.getElementById("doku_sec").style.display = 'none !important';
                        document.getElementById("user_data_type").innerHTML = "Pentadbir";
                        document.getElementById("Jabatan").style.display = "none";

                    }


                    if(result.data.user.media.length==1)
                    {
                    if(result.data.user.media[0].collection_name=="document")
                    { 
                        var sample2=result.data.user.media[0].original_url; console.log(sample2);
                        var docu_url = sample2.substring(sample2.indexOf('storage')); console.log(docu_url);
                        //document.getElementById("document_url").href = api_url+docu_url;
                        document.getElementById("document_name").innerHTML = result.data.user.media[0].file_name;
                        var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
                        fSize = result.data.user.media[0].size; i=0;while(fSize>900){fSize/=1024;i++;}
                        docu_size = (Math.round(fSize*100)/100)+' '+fSExt[i]; 
                        document.getElementById("document_size").innerHTML = docu_size;
                    }
                    else
                    { 
                        var sample=result.data.user.media[0].original_url; console.log(sample);
                        var substr = sample.substring(sample.indexOf('storage')); console.log(substr);
                        document.getElementById("gambar_image").src = api_url+substr;
                        document.getElementById("document_name").innerHTML = "No pdf";

                    }
                    
                    }
                    else if(result.data.user.media.length==2)
                    {
                    var sample=result.data.user.media[1].original_url; console.log(sample);
                    var image_url = sample.substring(sample.indexOf('storage')); console.log(image_url);
                    document.getElementById("gambar_image").src = api_url+image_url;

                    var sample2=result.data.user.media[0].original_url; console.log(sample2);
                    var docu_url = sample2.substring(sample2.indexOf('storage')); console.log(docu_url);
                    //document.getElementById("document_url").href = api_url+docu_url;
                    document.getElementById("document_name").innerHTML = result.data.user.media[0].file_name;
                    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
                        fSize = result.data.user.media[0].size; i=0;while(fSize>900){fSize/=1024;i++;}
                        docu_size = (Math.round(fSize*100)/100)+' '+fSExt[i]; 


                    document.getElementById("document_size").innerHTML = docu_size;

                    }
                    else{
                    document.getElementById("document_name").innerHTML = "No pdf";
                    }

                    if(result.data.peranan.length!=0)
                    {
                    for($j=0;$j<result.data.peranan.length;$j++)
                    {console.log(result.data.peranan[$j]);
                        document.getElementById(result.data.peranan[$j].peranan_id).checked = "true";
                        document.getElementById("list_"+result.data.peranan[$j].peranan_id).classList.remove("d-none");

                    }
                    }
                    else
                    {
                    console.log('not')

                    }
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                }
                else {

                }
                
            }
            
        });

        $('#jabatan_agensy_drop_check').click(function(){
            var daerahdropDown =  document.getElementById("daerah");
            $("#daerah").empty();
            var el = document.createElement("option"); 
            el.textContent = '--Pilih--';
            el.value = '';
            daerahdropDown.appendChild(el);

            document.getElementById("bahagian").selectedIndex = 0;
            document.getElementById("pejabat").selectedIndex = 0;
            document.getElementById("negeri").selectedIndex = 0;
            document.getElementById("daerah").selectedIndex = 0;
            document.getElementById("jabatan_bahagian").selectedIndex = 0;

            document.getElementById('bahagian').disabled = true;
            document.getElementById('pejabat').disabled = true;
            document.getElementById('negeri').disabled = true;
            document.getElementById('daerah').disabled = true;
            document.getElementById('Jabatan').disabled = false;
            document.getElementById('jabatan_bahagian').disabled = false;


            document.getElementById("jabatan_agensy_drop_check").checked = true;
            document.getElementById("bahagian_drop_check").checked = false;
            document.getElementById("negeri_drop_check").checked = false;
            document.getElementById("daerah_drop_check").checked = false;
            document.getElementById("pejabat_drop_check").checked = false;
            
        });

        $('#bahagian_drop_check').click(function(){
            var daerahdropDown =  document.getElementById("daerah");
            $("#daerah").empty();
            var el = document.createElement("option"); 
                el.textContent = '--Pilih--';
                el.value = '';
            daerahdropDown.appendChild(el);

            var jabatan_bahagiandropDown =  document.getElementById("jabatan_bahagian");
            $("#jabatan_bahagian").empty();
            var el = document.createElement("option");
                el.textContent = '--Pilih--';
                el.value = '';
                jabatan_bahagiandropDown.appendChild(el);

            document.getElementById("pejabat").selectedIndex = 0;
            document.getElementById("negeri").selectedIndex = 0;
            document.getElementById("daerah").selectedIndex = 0;
            document.getElementById("Jabatan").selectedIndex = 0;
            document.getElementById("jabatan_bahagian").selectedIndex = 0;

                        document.getElementById('bahagian').disabled = false;
                        document.getElementById('pejabat').disabled = true;
                        document.getElementById('negeri').disabled = true;
                        document.getElementById('daerah').disabled = true;
                        document.getElementById('Jabatan').disabled = true;
                        document.getElementById('jabatan_bahagian').disabled = true;
                        
                        document.getElementById("jabatan_agensy_drop_check").checked = false;
                        document.getElementById("bahagian_drop_check").checked = true;
                        document.getElementById("negeri_drop_check").checked = false;
                        document.getElementById("daerah_drop_check").checked = false;
                        document.getElementById("pejabat_drop_check").checked = false;
            
        });

        $('#negeri_drop_check').click(function(){
            var daerahdropDown =  document.getElementById("daerah");
            $("#daerah").empty();
            var el = document.createElement("option"); 
            el.textContent = '--Pilih--';
            el.value = '';
            daerahdropDown.appendChild(el);
            document.getElementById("bahagian").selectedIndex = 0;
            document.getElementById("pejabat").selectedIndex = 0;
            document.getElementById("daerah").selectedIndex = 0;
            document.getElementById("Jabatan").selectedIndex = 0;
            document.getElementById("jabatan_bahagian").selectedIndex = 0;
            
                        document.getElementById('bahagian').disabled = true;
                        document.getElementById('pejabat').disabled = true;
                        document.getElementById('negeri').disabled = false;
                        document.getElementById('daerah').disabled = true;
                        document.getElementById('Jabatan').disabled = true;

                        document.getElementById("jabatan_agensy_drop_check").checked = false;
                        document.getElementById("bahagian_drop_check").checked = false;
                        document.getElementById("negeri_drop_check").checked = true;
                        // document.getElementById("daerah_drop_check").checked = true;
                        document.getElementById("pejabat_drop_check").checked = false;
            
        });

        $('#daerah_drop_check').click(function(){
            var daerahdropDown =  document.getElementById("daerah");
        $("#daerah").empty();
        var el = document.createElement("option"); 
            el.textContent = '--Pilih--';
            el.value = '';
            daerahdropDown.appendChild(el);
            document.getElementById("bahagian").selectedIndex = 0;
            document.getElementById("pejabat").selectedIndex = 0;
            document.getElementById("negeri").selectedIndex = 0;
            document.getElementById("Jabatan").selectedIndex = 0;
            document.getElementById("jabatan_bahagian").selectedIndex = 0;

                        document.getElementById('bahagian').disabled = true;
                        document.getElementById('pejabat').disabled = true;
                        document.getElementById('negeri').disabled = false;
                        document.getElementById('daerah').disabled = false;
                        document.getElementById('Jabatan').disabled = true;

                        document.getElementById("jabatan_agensy_drop_check").checked = false;
                        document.getElementById("bahagian_drop_check").checked = false;
                        document.getElementById("negeri_drop_check").checked = true;
                        document.getElementById("daerah_drop_check").checked = true;
                        document.getElementById("pejabat_drop_check").checked = false;
            
        });

        $('#pejabat_agensy_drop').click(function(){
            var daerahdropDown =  document.getElementById("daerah");
            $("#daerah").empty();
            var el = document.createElement("option"); 
            el.textContent = '--Pilih--';
            el.value = '';
            daerahdropDown.appendChild(el);

                        document.getElementById("bahagian").selectedIndex = 0;
                        document.getElementById("negeri").selectedIndex = 0;
                        document.getElementById("daerah").selectedIndex = 0;
                        document.getElementById("Jabatan").selectedIndex = 0;
                        document.getElementById("jabatan_bahagian").selectedIndex = 0;

                        document.getElementById('bahagian').disabled = true;
                        document.getElementById('pejabat').disabled = false;
                        document.getElementById('negeri').disabled = true;
                        document.getElementById('daerah').disabled = true;
                        document.getElementById('Jabatan').disabled = true;

                        document.getElementById("jabatan_agensy_drop_check").checked = false;
                        document.getElementById("bahagian_drop_check").checked = false;
                        document.getElementById("negeri_drop_check").checked = false;
                        document.getElementById("daerah_drop_check").checked = false;
                        document.getElementById("pejabat_drop_check").checked = true;
            
        });
        

    function loadDaerah(negeri_id,daerah_id)
    {
    var daerahdropDown =  document.getElementById("daerah");
        $("#daerah").empty();
        var el = document.createElement("option"); 
            el.textContent = '--Pilih--';
            el.value = '';
            daerahdropDown.appendChild(el);

        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
        const {
        host, hostname, href, origin, pathname, port, protocol, search
        } = window.location

        $.ajaxSetup({
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
        }); 
        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/daerah/list?id="+negeri_id,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_daerah;
                        el.value = opt;
                        daerahdropDown.appendChild(el);
                    })
                    if(daerah_id)
                    {
                        document.getElementById("daerah").value= daerah_id;
                    }
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });
    }

        function loadKementerian(kem_url,type,kement_data,behajian_data,jabatan_id){

        var dropDown = document.getElementById("kementerian");
        var bahagiandropDown =  document.getElementById("bahagian");
        var JabatandropDown =  document.getElementById("Jabatan");
        var jabatan_bahagiandropDown =  document.getElementById("jabatan_bahagian");

        $("#kementerian").empty();
        $("#bahagian").empty();
        $("#Jabatan").empty();
        $("#jabatan_bahagian").empty();

            
        if(type=="non-jps")
        {
        var el = document.createElement("option"); 
                el.textContent = '--Pilih--';
                el.value = '';
                dropDown.appendChild(el);
                
        var el = document.createElement("option"); 
                el.textContent = '--Pilih--';
                el.value = '';
                bahagiandropDown.appendChild(el);
        
        var el = document.createElement("option"); 
                el.textContent = '--Pilih--';
                el.value = '';
                JabatandropDown.appendChild(el);      
        
        var el = document.createElement("option"); 
                el.textContent = '--Pilih--';
                el.value = '';
                jabatan_bahagiandropDown.appendChild(el);
        
        }
        else
        {
        var el = document.createElement("option"); 
                el.textContent = '--Pilih--';
                el.value = '';
                bahagiandropDown.appendChild(el);
        }
        
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
        const {
        host, hostname, href, origin, pathname, port, protocol, search
        } = window.location

        $.ajaxSetup({
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
            }
        });
        $.ajax({
            type: "GET",
            url: kem_url,
            dataType: 'json',
            success: function (result) { console.log(result.data)
                if (result) {
                if(type=="non-jps")
                {
                    if(result.data.kementerian)
                    {
                        $.each(result.data.kementerian, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_kementerian;
                            el.value = opt;
                            dropDown.appendChild(el);
                        });
                        if(kement_data){
                            document.getElementById("kementerian").value= kement_data;
                        }
                    }
                    if(result.data.bahagian)
                    {
                        $.each(result.data.bahagian, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_bahagian;
                            el.value = opt;
                            bahagiandropDown.appendChild(el);    
                        });
                        if(!jabatan_id && behajian_data)
                        {
                        document.getElementById("bahagian").value= behajian_data;
                        }
                    }
                    if(result.data.jabatan)
                    {
                        $.each(result.data.jabatan, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_jabatan;
                            el.value = opt;
                            JabatandropDown.appendChild(el);    
                        });
                        if(jabatan_id)
                        {
                        document.getElementById("Jabatan").value= jabatan_id;
                        }  
                    }

                    if(result.data.jaba_bahagian)
                    {
                        $.each(result.data.jaba_bahagian, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_bahagian;
                            el.value = opt;
                            jabatan_bahagiandropDown.appendChild(el);    
                        });
                        if(jabatan_id && behajian_data)
                        {
                            document.getElementById("jabatan_bahagian").value= behajian_data;
                        }
                    }
                }
                else
                { console.log(result.data.jabatan[0].nama_jabatan)
                    if(result.data.kementerian)
                    {
                        $.each(result.data.kementerian, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_kementerian;
                            el.value = opt;
                            dropDown.appendChild(el);
                        });
                        document.getElementById("kementerian_jps_id").value=result.data.kementerian[0].id;  
                        document.getElementById("peranan_id").innerHTML =  result.data.kementerian[0].nama_kementerian;                                        
                    }
                    if(result.data.jabatan)
                    {
                        document.getElementById("jabatan_jps").value=result.data.jabatan[0].nama_jabatan;                     
                        document.getElementById("jabatan_jps_id").value=result.data.jabatan[0].id;                     
                    }
                    if(result.data.bahagian)
                    {
                        $.each(result.data.bahagian, function (key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_bahagian;
                            el.value = opt;
                            bahagiandropDown.appendChild(el);    
                        });
                        if(behajian_data)
                        {
                        document.getElementById("bahagian").value= behajian_data;
                        }
                    }
                }
                }
                else
                {
                    $.Notification.error(result.Message);
                }
            }
        });
        
    }


    
        $('.save').click(function(){ console.log(document.myform.nama.value);

        var kategori = document.getElementById("jenis_pengguna_id").value; //console.log(kategori);

            if(!document.myform.nama.value)  { 
                document.getElementById("error_nama").innerHTML="medan nama diperlukan"; 
                document.getElementById("name").focus();
                return false; 
            }
            else{
                document.getElementById("error_nama").innerHTML=""; }
            
        if(!document.myform.no_kad_pengenalan.value)  { 
                document.getElementById("error_no_kod_penganalan").innerHTML="medan no kad pengenalan diperlukan"; 
                document.getElementById("no_kad_pengenalan").focus();
                return false; 
        }
        else if(isNaN(document.myform.no_kad_pengenalan.value))
        {
            document.getElementById("error_no_kod_penganalan").innerHTML="sila tambah nombor sahaja"; 
                document.getElementById("no_kad_pengenalan").focus();
                return false;
        } 
        else if(document.myform.no_kad_pengenalan.value.length<12) 
        {
            document.getElementById("error_no_kod_penganalan").innerHTML="maksimum 12 digit diperlukan"; 
                document.getElementById("no_kad_pengenalan").focus();
                return false;
        }
        else { document.getElementById("error_no_kod_penganalan").innerHTML=""; }

            
            if(!document.myform.no_telefon.value)  { 
                document.getElementById("error_no_telefon").innerHTML="Medan no telefon diperlukan"; 
                document.getElementById("no_telefon").focus();
                return false; 
            }else {document.getElementById("error_no_telefon").innerHTML="";}

            // if(!document.myform.emel_rasmi.value)  { 
            //     document.getElementById("error_email").innerHTML="Medan emel rasmi diperlukan"; 
            //     document.getElementById("emel_rasmi").focus();
            //     return false; 
            // }else{ document.getElementById("error_email").innerHTML="";}

        // if(IsEmail(document.myform.emel_rasmi.value)==false){
        // document.getElementById("error_email").innerHTML="Format e-mel tidak sah"; 
        //         document.getElementById("emel_rasmi").focus();
        //         return false;
        // }
        // else{
        // document.getElementById("error_email").innerHTML="";
        // }
        
        let email = document.myform.emel_rasmi.value;
        let getDomain =email.substr(email.length - 6);  console.log(getDomain)

        // if(getDomain!='gov.my')
        // {
        // document.getElementById("error_email").innerHTML="Format e-mel tidak sah"; 
        //         document.getElementById("emel_rasmi").focus();
        //         return false;
        // }
        // else
        // {
        // document.getElementById("error_email").innerHTML="";
        // }


        if(!document.myform.gred.value)  { 
                document.getElementById("error_gred").innerHTML="Sila pilih gred"; 
                document.getElementById("gred").focus();
                return false; 
            }else{document.getElementById("error_gred").innerHTML="";}


        var current_checkbox='';
        if(kategori==1){
            if(!document.myform.bahagian.value &&  !document.myform.pejabat.value &&  !document.myform.negeri.value)
            { 
                document.getElementById("error_bahagian").innerHTML="Sila Pilih Bahagian/Pejabat/Negeri"; 
                document.getElementById("bahagian").focus();
                return false; 
            }
            else
            { 
                document.getElementById("error_bahagian").innerHTML=""; 
            }
            var kementerian = document.getElementById("kementerian_jps_id").value;
            var jabatan = document.getElementById("jabatan_jps_id").value;

            if(document.myform.daerah.value)
            {
                current_checkbox="daerah";
            }
            else if(document.myform.negeri.value)
            {
                current_checkbox="negeri";
            }
            else if(document.myform.bahagian.value)
            {
                current_checkbox="bahagian";
            }
            else
            {
                current_checkbox="pejabat";
            }

        }
        else
        {
            if(!document.myform.kementerian.value)
            {
            document.getElementById("error_kementerian").innerHTML="Sila Pilih Kementerian"; 
            document.getElementById("kementerian").focus();
            return false; 
            }
            document.getElementById("error_kementerian").innerHTML=" "; 

            if(!document.myform.jabatan && !document.myform.bahagian)
            {
            document.getElementById("error_jabatan").innerHTML="Sila Pilih Jabatan/Bahagian"; 
            document.getElementById("Jabatan").focus();
            return false; 
            }
            else
            {
            document.getElementById("error_jabatan").innerHTML=" "; 
            }
            var kementerian = document.myform.kementerian.value;
            // var jabatan = document.myform.jabatan;
            if(document.myform.jabatan)
            { 
            current_checkbox="jabatan";
            var jabatan = document.myform.jabatan.value;
            }
            else
            { 
            current_checkbox="bahagian";
            var jabatan = '';
            }
        }

        var bahagian = '';
        if(document.myform.bahagian.value)  { 
            bahagian = document.myform.bahagian.value;
        }
        else if(document.myform.jabatan_bahagian.value)  {
            bahagian = document.myform.jabatan_bahagian.value;
        } 

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        var formData = new FormData();
            formData.append('id', user_id);
            formData.append('nama', document.myform.nama.value);
            formData.append('no_kod_penganalan', document.myform.no_kad_pengenalan.value);
            formData.append('email', document.myform.emel_rasmi.value);
            formData.append('kategori',kategori);
            formData.append('no_telefon', document.myform.no_telefon.value);
            formData.append('jawatan', document.myform.Jawatan.value);
            formData.append('pajabat', document.myform.pejabat.value);
            formData.append('jabatan', jabatan);
            formData.append('gred', document.myform.gred.value);
            formData.append('kementerian', kementerian);
            formData.append('bahagian', bahagian);
            formData.append('negeri', document.myform.negeri.value);
            formData.append('daerah', document.myform.daerah.value);
            formData.append('catatan', document.myform.catatan.value);
            formData.append('status_pengguna_id',document.myform.status.value);
            formData.append('loged_user_id', {{Auth::user()->id}})
            formData.append('previous_checked', document.myform.current_box.value)
            formData.append('current_checked', current_checkbox)
            formData.append('profile_image', document.myform_image.profile_photo.files[0]);
        console.log(formData)

        axios({
                method: "post",
                url: update_user_api,
                data: formData,
                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
            })
                .then(function (response) {
                //handle success
                console.log(response.data.code);

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                if(response.data.code === '200') {	
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                $("#add_role_sucess_modal").modal('show');
                }else {				
                    if(response.data.code === '422') {					
                        Object.keys(response.data.data).forEach(key => {						
                            document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                        });					
                    }else {					
                        alert('There was an error submitting data')
                    }	
                }			
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                    alert("There was an error submitting data");
                });

        });
        $('.tutup').click(function(){
            $("#add_role_sucess_modal").modal('hide');
            if(tmp_user=='temp')
            {
                window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
            }
            else
            {
                window.location.href = "{{ url('/userlist')}}";
            }
        });

        function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) {
                    return false;
                }else{
                    return true;
                }
        }

        $('.back').click(function(){
            $("#add_role_sucess_modal").modal('hide');
            if(tmp_user=='temp')
            {
                window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
            }
            else
            {
                window.location.href = "{{ url('/userlist')}}";
            }
        });

        $('#konfig').click(function(){
        window.location.href = "{{ url('/selenggara-pengurusan-peranan')}}";
        });

        
    $('#simpan-pop').click(function(){
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

        var formData = new FormData();

        var checkboxes = document.querySelectorAll('input[type="checkbox"]'); console.log(checkboxes)
        let peranan=[];
        var checked_stat =0;

        for (var i = 1; i < checkboxes.length; i++) { console.log(checkboxes[i].name)
        if (checkboxes[i].checked) {
            checked_stat =checkboxes[i].id;
            formData.append('peranan[]', checked_stat);  

        } 
        }

        formData.append('user_id', {{$user_id}})
        formData.append('loged_user_id', {{Auth::user()->id}})

        $('#add_role_modal').modal('hide');

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");


            axios({

            method: 'POST',
            url: api_url+"api/portal/add-user-peranan",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
            console.log(result.data)
            if(result.data.status=='Sucess'){
                    
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                $("#peranan_sucess_modal").modal('show');
                $('#tutup_peranan_success').click(function(){
                    $("#peranan_sucess_modal").modal('hide');
                    window.location.href = origin + '/user-profile/{{$temp_type}}/{{$user_id}}';
                });
            }
            else
            {
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                    window.location.href = origin + '/user-profile/{{$temp_type}}/{{$user_id}}';
            }
            });
        });

    // store user roles
    $('#simpan-user-role').click(function(){
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

        var formData = new FormData();
        
        var checkboxes = document.querySelectorAll(
                      "[id^='assign-user']"); console.log(checkboxes)
        let peranan=[];
        var checked_stat =0;

        for (var i = 0; i < checkboxes.length; i++) { console.log(checkboxes[i].value)
        if (checkboxes[i].checked) {
            checked_stat =checkboxes[i].value;
            formData.append('peranan[]', checked_stat);  

        } 
        }

        formData.append('user_id', {{$user_id}})
        formData.append('loged_user_id', {{Auth::user()->id}})

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");


            axios({

            method: 'POST',
            url: api_url+"api/portal/add-user-role",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
            // console.log(result.data)
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

            if(result.data.status=='Sucess'){
                $('#add_role_modal').modal('hide');
                $("#peranan_sucess_modal").modal('show');
                $('#tutup_peranan_success').click(function(){
                    $("#peranan_sucess_modal").modal('hide');
                    window.location.href = origin + '/user-profile/{{$temp_type}}/{{$user_id}}';
                });
            }
            else
            {
                alert ("no peranan selected");
            }
            });
        });

    // store user permission
    $('#simpan-user-permission').click(function(){
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

        var formData = new FormData();
        
        var checkboxes = document.querySelectorAll(
                      "[id^='assign-user-permission']"); console.log(checkboxes)
        let peranan=[];
        var checked_stat =0;

        for (var i = 0; i < checkboxes.length; i++) { console.log(checkboxes[i].value)
        if (checkboxes[i].checked) {
            checked_stat =checkboxes[i].value;
            formData.append('peranan[]', checked_stat);  

        } 
        }

        formData.append('user_id', {{$user_id}})
        formData.append('loged_user_id', {{Auth::user()->id}})


            axios({

            method: 'POST',
            url: api_url+"api/portal/add-user-permission",
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
            console.log(result.data)
            if(result.data.status=='Sucess'){
                $('#add_role_modal').modal('hide');
                $("#peranan_sucess_modal").modal('show');
                $('#tutup_peranan_success').click(function(){
                    $("#peranan_sucess_modal").modal('hide');
                    window.location.href = origin + '/user-profile/{{$temp_type}}/{{$user_id}}';
                });
            }
            else
            {
                alert ("no peranan selected");
            }
            });
        });

        

        $("#cam").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview( uploader ) { console.log(uploader.files[0])

            $new_file=uploader.files[0];

            var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG"];

            if ( uploader.files && uploader.files[0] ){

                if($new_file.size>4000000)
                {
                    document.getElementById("imageUpload").value=''; 
                    document.getElementById("image_error").innerText='Saiz fail tidak melebihi 4 mb';
                    return false;
                }
                
                if(allowedExtensions.indexOf($new_file.type) == -1)  
                {
                    document.getElementById("imageUpload").value=''; 
                    document.getElementById("image_error").innerText='Jenis fail tidak sah';
                    return false;
                }
                document.getElementById("image_error").innerText='';
                $('#gambar_image').attr('src', window.URL.createObjectURL(uploader.files[0]) );
            }
        }

        $("#imageUpload").change(function(){
            fasterPreview( this );
        });
    });
    </script>
    <script>
    function removePeranan(id)
        {
        $("#add_role_sucess_modal-confirm").modal('show');
        document.getElementById("tutup-confirm").setAttribute("peranan_id_for_delete",id);

        }

        $('#tutup-confirm').click(function(){

            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

            var formData = new FormData();

            var id=document.getElementById("tutup-confirm").getAttribute("peranan_id_for_delete"); console.log(id);
                formData.append('peranan_id', id);
                formData.append('user_id', {{$user_id}});
                formData.append('loged_user_id', {{Auth::user()->id}})

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");


                axios({

                    method: 'POST',
                    url: api_url+"api/portal/delete-user-peranan",
                    responseType: 'json',
                    data:formData,   
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": api_token,
                    },     
                })
                .then(function (result) {
                    console.log(result.data)
                    if(result.data.status=='Sucess'){
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");

                        $("#add_role_sucess_modal-confirm").modal('hide');
                        $("#add_role_sucess_modal").modal('show');

                        setTimeout(function() {
                        document.getElementById('add_role_sucess_modal').style.display = 'none';
                        window.location.href = origin + '/user-profile/{{$temp_type}}/{{$user_id}}';
                        }, 2000);

                    }
                    else
                    {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        window.location.href = origin + '/user-profile/{{$temp_type}}/{{$user_id}}';
                    //alert ("no peranan selected");
                    }
                });
        });

        $('#close-confirm').click(function(){
        document.getElementById("tutup-confirm").removeAttribute("peranan_id_for_delete");
        $("#add_role_sucess_modal").modal('hide');
        });
        var api_url = "{{env('API_URL')}}";
            var api_token = "Bearer "+ window.localStorage.getItem('token');

        $("#active_check").click(function(){
        var id=$("#user_id").val();

        // $("div.spanner").addClass("show");
        // $("div.overlay").addClass("show");
        
        if( $('#active_check').is(':checked') ){
            activateModul(id)
        }
        else{
            deactivateModul(id)
        }
        

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
                    
                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");

                var activate=1
                var formData = new FormData();
                formData.append('id', id);
                formData.append('value', activate);
                formData.append('loged_user_id', {{Auth::user()->id}})
                formData.append('action', "PROFIL PENGGUNA - Pengguna diaktifkan")
                axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+"api/user/ActivateUser",
                responseType: 'json',
                data:formData,   
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                },     
                })
                .then(function (result) {
                    // console.log(result)
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                    Swal.fire({
                    icon: 'success',
                    text: "Diaktifkan!",
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

                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");

                var deactivate=0
                var formData = new FormData();
                formData.append('id', id);
                formData.append('value', deactivate);
                formData.append('loged_user_id', {{Auth::user()->id}})
                formData.append('action', "PROFIL PENGGUNA - Pengguna dinyahaktifkan")
                axios({
                method: 'POST',
                url: "{{ env('API_URL') }}"+"api/user/deActivateUser",
                responseType: 'json',
                data:formData,   
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                },     
                })
                .then(function (result) {
                    console.log(result)
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                    Swal.fire({
                    icon: 'success',
                    text: "Dinyahaktifkan!",
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

<script>
    $(document).ready(function(){

            var api_token = "Bearer "+ window.localStorage.getItem('token');
            var id=$(".fetch_id").val();
            var user_id = decodeURI(window.location.pathname.split("/").pop());
            var user_type = window.localStorage.getItem('user_data_type');
            var is_superadmin = window.localStorage.getItem('is_superadmin');

            if(is_superadmin==1)
            {
                for(let $i=1;$i<=9;$i++)
                {
                    $("#permission_"+$i).removeClass("d-none");
                }

            }
            else
            {
                
                axios.defaults.headers.common["Authorization"] = api_token
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                axios({
                    method: 'get',
                    url: "{{ env('API_URL') }}"+"api/lookup/get_module_access_by_usertype",
                    responseType: 'json',
                    params: {
                        user_type: user_type
                    }   
                })
                .then(function (response) { console.log(response.data.data)
                    

                    if (response) {
                            $.each(response.data.data, function (key, item) {
                            console.log(item['module_id'])
                                            $("#permission_"+item['module_id']).removeClass("d-none");

                            })
                    }
                    else {

                    }

                });

            }

            // if(is_superadmin==1)
            // {
            //     $("#pentadbir_section").removeClass("d-none");
            //     $("#permohon_section").removeClass("d-none");
            //     $("#pemantuan_section").removeClass("d-none");
            //     $("#kontrak_section").removeClass("d-none");
            //     $("#perunding_section").removeClass("d-none");
            //     $("#GNO_STAT").removeClass("d-none");

            // }
            // else if(user_type==1 || user_type==2)
            // {
            //     $("#pentadbir_section").addClass("d-none");
            //     $("#permohon_section").removeClass("d-none");
            //     $("#pemantuan_section").addClass("d-none");
            //     $("#kontrak_section").addClass("d-none");
            //     $("#perunding_section").addClass("d-none");
            //     $("#GNO_STAT").addClass("d-none");
            // }
            // else if(user_type==3 || user_type==4)
            // { 
            //     $("#pentadbir_section").addClass("d-none");
            //     $("#permohon_section").removeClass("d-none");
            //     $("#pemantuan_section").addClass("d-none");
            //     $("#kontrak_section").addClass("d-none");
            //     $("#perunding_section").addClass("d-none");
            //     $("#GNO_STAT").removeClass("d-none");
            // }
            // else
            // {
            //     $("#pentadbir_section").addClass("d-none");
            //     $("#permohon_section").removeClass("d-none");
            //     $("#pemantuan_section").addClass("d-none");
            //     $("#kontrak_section").addClass("d-none");
            //     $("#perunding_section").addClass("d-none");
            //     $("#GNO_STAT").addClass("d-none");
            // }

            axios.defaults.headers.common["Authorization"] = api_token
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
            axios({
                method: 'get',
                url: "{{ env('API_URL') }}"+"api/lookup/getMasterLinksforUserprofile",
                responseType: 'json',
                params: {
                    user_id: user_id,
                    user_type: user_type
                }   
            })
            .then(function (response) { 
                data = response.data.data.moduleLinks; console.log(response.data.data)
                permissions = response.data.data.permissions;
                for(let $i=0;$i<data.length;$i++)
                {
                    if(data[$i]['module_id']==1)
                    {
                    createPentadbir(data[$i],permissions);
                    }
                    if(data[$i]['module_id']==2)
                    {
                    createPermohonan(data[$i],permissions);
                    }
                    if(data[$i]['module_id']==6)
                    {
                    createVM(data[$i],permissions);
                    }
                }

                if(permissions.includes('pentadbir_full_access')) {
                    let tempcheckBox = document.getElementById("pentadbir");
                    tempcheckBox.checked = true;
                }
                
            if(permissions.includes('permohon_full_access')) {
              let tempcheckBox = document.getElementById("permohon");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('permantuan_full_access')) {
              let tempcheckBox = document.getElementById("permantuan");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('kontrak_full_access')) {
              let tempcheckBox = document.getElementById("kontrak");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('peruding_full_access')) {
              let tempcheckBox = document.getElementById("peruding");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('vm_full_access')) {
              let tempcheckBox = document.getElementById("vm");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('noc_full_access')) {
              let tempcheckBox = document.getElementById("noc");
              tempcheckBox.checked = true;
            }
            if(permissions.includes('rp_full_access')) {
              let tempcheckBox = document.getElementById("rp");
              tempcheckBox.checked = true;
            }
            if(permissions.includes('pl_full_access')) {
              let tempcheckBox = document.getElementById("pl");
              tempcheckBox.checked = true;
            }

            // get all checkbox elements on the page
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            //assigning existing permissions to the role
            for (let i = 0; i < checkboxes.length; i++) {
              
              if(permissions.includes(checkboxes[i].value)) {
                checkboxes[i].checked = true;
              }
            }


            const pentadbir_checkbox = document.querySelector('#Permissionpentadbir');
            console.log(pentadbir_checkbox)
            const permohon_checkbox = document.querySelector('#permohon');
            const permantuan_checkbox = document.querySelector('#permantuan');
            const kontrak_checkbox = document.querySelector('#kontrak');
            const peruding_checkbox = document.querySelector('#peruding');
            const vm_checkbox = document.querySelector('#vm');
            const noc_checkbox = document.querySelector('#noc');
            const rp_checkbox = document.querySelector('#rp');
            const pl_checkbox = document.querySelector('#pl');

        console.log(permohon_checkbox);
            pentadbir_checkbox.addEventListener('click', function() {
              const pentadbir_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="Permissionpentadbir_"]');
              if (this.checked) {
                pentadbir_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else { 
                pentadbir_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            permohon_checkbox.addEventListener('click', function() {
              const permohon_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="permohon_"]');
              
              if (this.checked) {
                permohon_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                permohon_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            permantuan_checkbox.addEventListener('click', function() {
              const permantuan_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="permantuan_"]');
              
              if (this.checked) {
                permantuan_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                permantuan_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            kontrak_checkbox.addEventListener('click', function() {
              const kontrak_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="kontrak_"]');
              
              if (this.checked) {
                kontrak_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                kontrak_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            peruding_checkbox.addEventListener('click', function() {
              const peruding_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="peruding_"]');
              
              if (this.checked) {
                peruding_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                peruding_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            noc_checkbox.addEventListener('click', function() {
              const noc_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="noc_"]');
              
              if (this.checked) {
                noc_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                noc_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            rp_checkbox.addEventListener('click', function() {
              const rp_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="rp_"]');
              
              if (this.checked) {
                rp_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                rp_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            pl_checkbox.addEventListener('click', function() {
              const pl_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="pl_"]');
              
              if (this.checked) {
                pl_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                pl_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            vm_checkbox.addEventListener('click', function() {
              const vm_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="vm_"]');
              
              if (this.checked) {
                vm_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                vm_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })
            .catch(function (error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })

            $('#vmPermissionSaveBtn').click(function(){
    console.log('per submitted');
                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");

                    user_id = decodeURI(window.location.pathname.split("/").pop())
                    // console.log(role);
                    var formEl = document.forms.permissionForm;
                    var formData = new FormData(formEl);
                    
                    formData.append('user_id', user_id);
                    const api_url = "{{ env('API_URL') }}"
                    axios.defaults.headers.common["Authorization"] = "Bearer "+ window.localStorage.getItem('token');
                    axios({
                            method: 'post',
                            url: api_url+"api/user/permissions",
                            responseType: 'json',
                            data: formData
                            })
                            .then(function (response) { 
                            if(response.data.code == 200) {   
                                $("#add_role_sucess_modal").modal('show');
                                $("#tutup").click(function(){
                                location.reload()
                                })

                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");
                                
                            }else {
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");
                                alert('error while saving permissions')
                            }
                            })
                            .catch(function (error) {
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                            })
        })
});

function createPentadbir(data,permissions)
{
    let table = document.getElementById("pentadbir_row"); 
    //var row = table.insertRow(0);
    let row = table.insertRow(table.rows.length - 1);
    let cell0 = row.insertCell(0);
    let cell1 = row.insertCell(1);
    let cell2 = row.insertCell(2);
    let cell3 = row.insertCell(3);

    cell0.innerHTML = data.link_name;
    cell0.className="td";
    cell1.innerHTML = '<input class="check" type="checkbox" id="Permissionpentadbir_'+data.id+'" name="pentadbir_'+data.link_name+'_full" value="pentadbir_'+data.link_name+'_full">';
    cell2.innerHTML = '<input class="check" type="checkbox" id="Permissionpentadbir_'+data.id+'" name="pentadbir_'+data.link_name+'_view" value="pentadbir_'+data.link_name+'_view">';
    cell3.innerHTML = '<input class="check" type="checkbox" id="Permissionpentadbir_'+data.id+'" name="pentadbir_'+data.link_name+'_edit" value="pentadbir_'+data.link_name+'_edit">';
    const pentadbir_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="Permissionpentadbir_'+data.id+'"]');
    var isChecked=$(pentadbir_checkboxes).is(':checked');
    $("#Permissionpentadbir_"+data.id+"").click(function(isChecked){
        console.log($("#Permissionpentadbir_"+data.id+"").val())
        // console.log(pentadbir_checkboxes)
        console.log(isChecked.currentTarget.checked)
        let checkboxes_pentadbir = document.querySelectorAll('input[type="checkbox"][id^="Permissionpentadbir_'+data.id+'"]');
        if(!isChecked.currentTarget.checked){
            $(checkboxes_pentadbir).each(function(){ this.checked = false; });
        }
        if(isChecked.currentTarget.checked){
            $(checkboxes_pentadbir).each(function(){ this.checked = true; });
        }

    })
}

function createPermohonan(data,permissions)
{
    let table = document.getElementById("permohonan_row"); 
    //var row = table.insertRow(0);
    let row = table.insertRow(table.rows.length - 1);
    let cell0 = row.insertCell(0);
    cell0.className="td";
    let cell1 = row.insertCell(1);
    let cell2 = row.insertCell(2);
    let cell3 = row.insertCell(3);

    cell0.innerHTML = data.link_name;
    cell1.innerHTML = '<input class="check" type="checkbox" id="permohon_'+data.id+'" name="permohon_'+data.link_name+'_full" value="permohon_'+data.link_name+'_full">';
    cell2.innerHTML = '<input class="check" type="checkbox" id="permohon_'+data.id+'" name="permohon_'+data.link_name+'_view" value="permohon_'+data.link_name+'_view">';
    cell3.innerHTML = '<input class="check" type="checkbox" id="permohon_'+data.id+'" name="permohon_'+data.link_name+'_edit" value="permohon_'+data.link_name+'_edit">';
    const permohon_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="permohon_'+data.id+'"]');
    var isChecked=$(permohon_checkboxes).is(':checked');
    $("#permohon_"+data.id+"").click(function(isChecked){
        console.log($("#permohon_"+data.id+"").val())
        // console.log(pentadbir_checkboxes)
        console.log(isChecked.currentTarget.checked)
        let checkboxes_permohon = document.querySelectorAll('input[type="checkbox"][id^="permohon_'+data.id+'"]');
        if(!isChecked.currentTarget.checked){
            $(checkboxes_permohon).each(function(){ this.checked = false; });
        }
        if(isChecked.currentTarget.checked){
            $(checkboxes_permohon).each(function(){ this.checked = true; });
        }

    })
}

$('.close-peranan').click(function(){
      location.reload();
});

function createVM(data,permissions)
{ 
    let table = document.getElementById("vm_row"); 
    //var row = table.insertRow(0);
    let row = table.insertRow(table.rows.length - 1);
    let cell0 = row.insertCell(0);
    cell0.className="td";
    let cell1 = row.insertCell(1);
    let cell2 = row.insertCell(2);
    let cell3 = row.insertCell(3);

    cell0.innerHTML = data.link_name;
    cell1.innerHTML = '<input class="check" type="checkbox" id="vm_'+data.id+'" name="vm_'+data.link_name+'_full" value="vm_'+data.link_name+'_full">';
    cell2.innerHTML = '<input class="check" type="checkbox" id="vm_'+data.id+'" name="vm_'+data.link_name+'_view" value="vm_'+data.link_name+'_view">';
    cell3.innerHTML = '<input class="check" type="checkbox" id="vm_'+data.id+'" name="vm_'+data.link_name+'_edit" value="vm_'+data.link_name+'_edit">';
    const vm_checkboxes = document.querySelectorAll('input[type="checkbox"][id^=vm_'+data.id+']');
    var isChecked=$(vm_checkboxes).is(':checked');
    $("#vm_"+data.id+"").click(function(isChecked){
        console.log($("#vm_"+data.id+"").val())
        // console.log(pentadbir_checkboxes)
        console.log(isChecked.currentTarget.checked)
        let checkboxes_vm = document.querySelectorAll('input[type="checkbox"][id^=vm_'+data.id+']');
        if(!isChecked.currentTarget.checked){
            $(checkboxes_vm).each(function(){ this.checked = false; });
        }
        if(isChecked.currentTarget.checked){
            $(checkboxes_vm).each(function(){ this.checked = true; });
        }

    })
}
</script>