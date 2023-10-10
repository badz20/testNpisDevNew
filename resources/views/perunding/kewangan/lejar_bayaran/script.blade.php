<script>

        $(document).ready(function () { 
                     
               
                               const api_token = "Bearer "+ window.localStorage.getItem('token');
                               const api_url = "{{env('API_URL')}}"; 
                               axios.defaults.headers.common["Authorization"] = api_token;
                               var bayaran_data = localStorage.getItem('bayaran_count'); 

                               var yuran_guru_tot='0.00';
                                    var yuran_guru_add_tot='0.00';
                                    var inbuhan_guru_tot='0.00';
                                    var inbuhan_guru_add_tot='0.00';
                                    var yuran_jum='0.00';
                                    var yuran_new_jum='0.00';
                                    var yuran_jps_add_tot='0.00';
                                    var inbuhan_jum='0.00';
                                    var inbuhan_jps_add_tot='0.00';

               
                               $("div.spanner").addClass("show");
                               $("div.overlay").addClass("show");
                               axios({
                                   method: 'get',
                                   url: api_url+"api/perunding/get_lejar_bayaran/" + {{$project_id}}+"/" + {{$perolehan_id}},
                                   responseType: 'json',            
                               })
                               .then(function (response) { console.log("bayaran");
               
                                 var bayaran= response.data.data.bayaran; console.log(bayaran);
                                 //var project= response.data.data.project; //console.log(project);
                                 var perolehan_details = response.data.data.perolehan;
                                 var lejjar_data = response.data.data.lejjar;
                                 var bayaran_data = localStorage.getItem('bayaran_count'); 
                                 
                                document.getElementById("no_bayaran").value = bayaran_data;
                                //document.getElementById("no_bayaran").value = bayaran_data;
                                document.getElementById('kod_projek').value = perolehan_details.pemantauan_project.kod_projeck
                                document.getElementById('nama_project').value = perolehan_details.pemantauan_project.nama_projek
                                document.getElementById('nama_perunding').value = perolehan_details.nama_peruding;
                                document.getElementById('nama_perolehan').value = perolehan_details.nama_perolehan;
                                //document.getElementById('no_perjanjian').value = project.perolehan_project.nama_peruding;
                                document.getElementById('tarik_perunding').value = perolehan_details.tarikh_setuju_terima;

                                if(bayaran.length!=0)
                                {
                                

                                    for(let i=0;i<bayaran.length;i++){

                                        if(bayaran[i].no_baucer==0)
                                        {
                                            status = '<label onClick="loadInbuhan('+bayaran[i].no_bayaran+')" style="text-decoration: underline;text-decoration-color: blue;color:blue;cursor:pointer;">Kemaskini</label>';
                                            disabled = '';
                                        }
                                        else
                                        {
                                            status = 'Selesai';
                                            disabled = 'disabled';
                                        }

                                        var yuran_data = '0.00';
                                        var inbuhan_data = '0.00';
                                        var jps_yuran_data = '0.00';
                                        var jps_inbuhan_data = '0.00';

                                        if(lejjar_data.length!=0)
                                        { 
                                            if(lejjar_data[i].yuran_perunding != 0)
                                            {
                                                yuran_data=lejjar_data[i].yuran_perunding;
                                            }
                                            if(lejjar_data[i].inbuhan_balik != 0)
                                            {
                                                inbuhan_data=lejjar_data[i].inbuhan_balik;
                                            }
                                            if(lejjar_data[i].jps_yuran_perunding != 0)
                                            {
                                                jps_yuran_data=lejjar_data[i].jps_yuran_perunding;
                                            }
                                            if(lejjar_data[i].jps_inbuhan_balik != 0)
                                            {
                                                jps_inbuhan_data=lejjar_data[i].jps_inbuhan_balik;
                                            }

                                        }

                                        console.log(yuran_data);
                                        console.log(inbuhan_data);
                                        console.log(jps_yuran_data);
                                        console.log(jps_inbuhan_data);


                                        var jps_yuran_jum = '0.00';
                                        var jps_inbuhan_jum = '0.00';
                                        var jps_yuran_guru_tot = '0.00';
                                        var jps_inbuhan_guru_tot = '0.00';

                                        yuran_jum=parseFloat(yuran_jum)+parseFloat(yuran_data);  //console.log(yuran_new_jum);
                                        inbuhan_jum=parseFloat(inbuhan_jum)+parseFloat(inbuhan_data);  //
                                        jps_yuran_jum=parseFloat(jps_yuran_jum)+parseFloat(jps_yuran_data);  //console.log(yuran_new_jum);
                                        jps_inbuhan_jum=parseFloat(jps_inbuhan_jum)+parseFloat(jps_inbuhan_data);  //

                                        var jumlah = parseFloat(yuran_data) + parseFloat(inbuhan_data);
                                        var percentage = (6/100) * jumlah; 
 
                                            $("#table_lejar").append(
                                                '<tr class="border">'+
                                                '<td>'+(i+1)+'</td>'+
                                                '<td> <input type="hidden" value="'+bayaran[i].id+'" id="bayaran_id"> <input class="form-control Table_perunding_body lejjar_perunding_body" onchange="calculateYuran()" value="'+number_format(yuran_data)+'" type="text" name="" id="guru_yuran_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="'+number_format(yuran_jum)+'" type="text" name="" id="guru_yuran_kumulatif"></td>'+
                                                '<td> <input '+disabled+' class="form-control Table_perunding_body lejjar_perunding_body" type="text" value="0.00" name="" id="guru_yuran_additional_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="0.00" type="text" name="" id="guru_yuran_additional_kumulatif"></td>'+
                                                '<td> <input  class="form-control Table_perunding_body lejjar_perunding_body" type="text" onchange="calculateInbuhan()" value="'+number_format(inbuhan_data)+'" name="" id="guru_inbuhan_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="'+number_format(inbuhan_jum)+'" type="text" name="" id="guru_inbuhan_kumulatif"></td>'+
                                                '<td> <input '+disabled+' class="form-control Table_perunding_body lejjar_perunding_body" type="text" value="0.00" name="" id="guru_inbuhan_additional_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="0.00" type="text" name="" id="guru_inbuhan_additional_kumulatif"></td>'+

                                                '<td> <input class="form-control Table_perunding_body lejjar_perunding_body" type="text" onchange="calculateJpsYuran()" value="'+number_format(jps_yuran_data)+'" name="" id="guru_jps_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="'+number_format(jps_yuran_jum)+'" type="text"name="" id="guru_jps_kumulatif"></td>'+
                                                '<td> <input '+disabled+' class="form-control Table_perunding_body lejjar_perunding_body" type="text" value="0.00" name="" id="guru_jps_additional_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="0.00" type="text"name="" id="guru_jps_additional_kumulatif"></td>'+
                                                '<td> <input class="form-control Table_perunding_body lejjar_perunding_body" type="text" onchange="calculateJpsInbuhan()" value="'+number_format(jps_inbuhan_data)+'" name="" id="guru_jps_inbuhan_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="'+number_format(jps_inbuhan_jum)+'" type="text" name="" id="guru_jps_inbuhan_kumulatif"></td>'+
                                                '<td> <input '+disabled+' class="form-control Table_perunding_body lejjar_perunding_body" type="text" value="0.00" name="" id="guru_jps_inbuhan_additional_tuntutan"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="0.00" type="text" name="" id="guru_jps_inbuhan_additional_kumulatif"></td>'+

                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" value="'+number_format(jumlah.toFixed(2))+'" type="text" name="" id="jumlah_kumulatif_'+bayaran[i].no_bayaran+'"></td>'+
                                                '<td> <input disabled="" class="form-control Table_perunding_body lejjar_perunding_body" type="text" value="'+number_format(percentage.toFixed(2))+'" name="" id="cukai_perhimtan_'+bayaran[i].no_bayaran+'"></td>'+
                                                '<td> <input '+disabled+' class="form-control Table_perunding_body lejjar_perunding_body" type="date" onchange="addBaucerNum('+yuran_data+','+inbuhan_data+','+bayaran[i].no_bayaran+')" name="" value="'+bayaran[i].tarik_baucer+'" id="tarik_baucer_'+bayaran[i].no_bayaran+'"></td>'+
                                                '<td> <input '+disabled+' class="form-control Table_perunding_body lejjar_perunding_body" type="text" onchange="addBaucerNum('+yuran_data+','+inbuhan_data+','+bayaran[i].no_bayaran+')" value="'+bayaran[i].no_baucer+'" name="" id="no_baucer_'+bayaran[i].no_bayaran+'"></td>'+
                                                '<td class=" Table_perunding_body">'+status+'</td>'+
                                                '</tr>'
                                            )

                                        yuran_guru_tot=parseFloat(yuran_guru_tot)+parseFloat(yuran_data);
                                        inbuhan_guru_tot=parseFloat(inbuhan_guru_tot)+parseFloat(inbuhan_data);
                                        jps_yuran_guru_tot=parseFloat(jps_yuran_guru_tot)+parseFloat(jps_yuran_data);
                                        jps_inbuhan_guru_tot=parseFloat(jps_inbuhan_guru_tot)+parseFloat(jps_inbuhan_data);
                                    }

                                    console.log(yuran_guru_tot)
                                    console.log(inbuhan_guru_tot)
                                }
                                else
                                {
                                    $("#table_lejar").append(
                                                                '<tr class="border">'+
                                                                '<td class="border" colspan="22" style="text-align: center;">'+"Tiada rekod dijumpai"+'</td>'+
                                                                '</tr>'
                                                            )
                                }

                                $("#table_lejar").append(
                                                '<tr>'+
                                                    '<td class="active_footer"></td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_yuran_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_yuran_additional_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_inbuhan_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_inbuhan_additional_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_jps_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_jps_additional_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text" name="" id="guru_jps_inbuhan_tuntutan_tot"></td>'+
                                                    '<td class="active_footer"> </td>'+
                                                    '<td class="active_footer"> <input disabled="" class="form-control" type="text"  name="" id="guru_jps_inbuhan_additional_tuntutan_tot"></td>'+
                                                    '<td class="active_footer" colspan="6"> </td>'+

                                                '</tr>'
                                            )


                                    document.getElementById("guru_yuran_tuntutan_tot").value = number_format(yuran_guru_tot);
                                    document.getElementById("guru_yuran_additional_tuntutan_tot").value = number_format(yuran_guru_add_tot);
                                    
                                    document.getElementById("guru_inbuhan_tuntutan_tot").value = number_format(parseFloat(inbuhan_guru_tot).toFixed(2));
                                    document.getElementById("guru_inbuhan_additional_tuntutan_tot").value = number_format(inbuhan_guru_add_tot);
                                    document.getElementById("guru_jps_tuntutan_tot").value = number_format(jps_yuran_guru_tot);
                                    document.getElementById("guru_jps_additional_tuntutan_tot").value = number_format(yuran_jps_add_tot);
                                    document.getElementById("guru_jps_inbuhan_tuntutan_tot").value = number_format(parseFloat(jps_inbuhan_guru_tot).toFixed(2));
                                    document.getElementById("guru_jps_inbuhan_additional_tuntutan_tot").value = number_format(inbuhan_jps_add_tot);

                                    document.getElementById("valueA").value = number_format(parseFloat(yuran_guru_tot).toFixed(2));
                                    document.getElementById("valueB").value = number_format(parseFloat(inbuhan_guru_tot).toFixed(2));

                                    if(bayaran_data>1)
                                    {
                                        let newValue = bayaran_data-1;
                                        var newPercentage = document.getElementById("cukai_perhimtan_"+newValue).value; 
                                        document.getElementById("valueD").value = newPercentage;

                                        var newCdata = document.getElementById("jumlah_kumulatif_"+newValue).value; 
                                        document.getElementById("valueC").value = newCdata;
                                        terkini = parseFloat(yuran_guru_tot)+parseFloat(inbuhan_guru_tot); 
                                        total = parseFloat(terkini).toFixed(2) - parseFloat(removecomma(newCdata)).toFixed(2); 
                                        document.getElementById("valueE").value = number_format(parseFloat(total) + parseFloat(removecomma(newPercentage)));
                                    }
                                    else
                                    {
                                        document.getElementById("valueC").value = '0.00';
                                        var newPercentage = 0
                                        if(document.getElementById("cukai_perhimtan_1")) {
                                            newPercentage = document.getElementById("cukai_perhimtan_1").value; 
                                        }
                                        
                                        document.getElementById("valueD").value = newPercentage;
                                        terkini = parseFloat(yuran_guru_tot)+parseFloat(inbuhan_guru_tot); 
                                        document.getElementById("valueE").value = number_format(parseFloat(terkini) + parseFloat(removecomma(newPercentage)));
                                    }
                                    

                                 $("div.spanner").removeClass("show");
                                 $("div.overlay").removeClass("show");
               
                               });

                               let bayaran =  localStorage.getItem('bayaran_count'); //alert(bayaran)

                                axios({
                                    method: 'get',
                                    url: api_url+"api/perunding/get_history/"+ {{$project_id}}+"/" + {{$perolehan_id}}+"/" + bayaran,
                                    responseType: 'json',            
                                })
                                .then(function (response) { //console.log("bayaran");
                                loadBayaranHistory(response)
                                });


                            $("#simpan").click(function(){ 

                                var formData = new FormData();
    
                                let tarikh = document.querySelectorAll("[id^='tarik_baucer_']"); 
                                let no_baucer = document.querySelectorAll("[id^='no_baucer_']");
                                let bayaran_id = document.querySelectorAll("[id='bayaran_id']"); 
                                let cukai_perkhidmatan = document.querySelectorAll("[id^='cukai_perhimtan_']"); 

                                let guru_yuran_tuntutan = document.querySelectorAll("#guru_yuran_tuntutan"); 
                                let guru_inbuhan_tuntutan = document.querySelectorAll("#guru_inbuhan_tuntutan"); 
                                let guru_jps_tuntutan = document.querySelectorAll("#guru_jps_tuntutan"); 
                                let guru_jps_inbuhan_tuntutan = document.querySelectorAll("#guru_jps_inbuhan_tuntutan"); 

                                perkaratext = []  
                                for (let j = 0; j < guru_yuran_tuntutan.length; j++)
                                {
                                    data={};

                                    if(isNaN(removecomma(guru_yuran_tuntutan[j].value))){
                                        data.yuran_perunding = 0;
                                    }
                                    else{
                                        data.yuran_perunding = removecomma(guru_yuran_tuntutan[j].value);
                                    }

                                    if(isNaN(removecomma(guru_inbuhan_tuntutan[j].value))){
                                        data.inbuhan_balik = 0;
                                    }
                                    else{
                                        data.inbuhan_balik = removecomma(guru_inbuhan_tuntutan[j].value);
                                    }

                                    if(isNaN(removecomma(guru_jps_tuntutan[j].value))){
                                        data.jps_yuran_perunding = 0;
                                    }
                                    else{
                                        data.jps_yuran_perunding = removecomma(guru_jps_tuntutan[j].value);
                                    }

                                    if(isNaN(removecomma(guru_jps_inbuhan_tuntutan[j].value))){
                                        data.jps_inbuhan_balik = 0;
                                    }
                                    else{
                                        data.jps_inbuhan_balik = removecomma(guru_jps_inbuhan_tuntutan[j].value);
                                    }

                                    perkaratext.push(JSON.stringify(data))
                                }
                            

                                bayarandata = []  
                                for (var i = 0;i < no_baucer.length; i++) {                         
                                    data= {};

                                    data.no_baucer = no_baucer[i].value
                                    data.tarikh = tarikh[i].value
                                    data.id = bayaran_id[i].value
                                    data.cukai_perkhidmatan = removecomma(cukai_perkhidmatan[i].value)
                                    bayarandata.push(JSON.stringify(data))
                                }


                            
                                bayarandata.forEach((item) => {
                                    formData.append('bayarandata[]', item);
                                });

                                perkaratext.forEach((item) => {
                                    formData.append('otherdata[]', item);
                                });
                                
                                formData.append('project_id', {{$project_id}})
                                formData.append('perolehan',{{$perolehan_id}});
                                var bayaran = document.getElementById("no_bayaran").value;
                                formData.append('user_id', {{Auth::user()->id}})
                                var bayaran_data = localStorage.getItem('bayaran_count'); 
                                formData.append('no_bayaran',bayaran_data);
                                formData.append('type',"lejar");
                                formData.append('action',"Kemaskini Lejar");


                                $("div.spanner").addClass("show");
                                $("div.overlay").addClass("show");


                                const api_token = "Bearer "+ window.localStorage.getItem('token');
                                const api_url = "{{env('API_URL')}}"; 
                                axios.defaults.headers.common["Authorization"] = api_token;

                                axios({

                                    method: 'POST',
                                    url: api_url+"api/perunding/update_bayaran",
                                    responseType: 'json',
                                    data:formData,   
                                    headers: {
                                        "Content-Type": "application/json",
                                        "Authorization": api_token,
                                    },     
                                })
                                .then(function (result) {
                                    //console.log(result.data)
                                    if(result.data.status=='Success'){
                                        $("#add_role_sucess_modal").modal('show')
                                        $("#tutup").click(function(){
                                            
                                            location.reload();                                       

                                        //window.location.href = "/kewangan/borang-jps/"+{{$project_id}}+"/"+{{$perolehan_id}}
                                        })
                                    }

                                    $("div.spanner").removeClass("show");
                                    $("div.overlay").removeClass("show");

                                })
                                .catch(function (error) {
                                    $("div.spanner").removeClass("show");
                                    $("div.overlay").removeClass("show");
                                })
                                    //---------------------------------------------------------------------------------

                            });
        });
        
        function calculateYuran()
        {
                                let guru_yuran_tuntutan = document.querySelectorAll("#guru_yuran_tuntutan"); 
                                let guru_inbuhan_tuntutan = document.querySelectorAll("#guru_inbuhan_tuntutan"); 

                                let guru_yuran_kumulatif = document.querySelectorAll("#guru_yuran_kumulatif"); 
                                var yuran = '0.00';
                                var jumlah_yuran = '0.00';
                                for(let i = 0; i <guru_yuran_tuntutan.length; i++)
                                {
                                    yuran=parseFloat(yuran)+parseFloat(removecomma(guru_yuran_tuntutan[i].value)); console.log(yuran);
                                    guru_yuran_kumulatif[i].value=number_format(yuran); 

                                    jumlah_yuran=parseFloat(removecomma(guru_inbuhan_tuntutan[i].value)) + parseFloat(removecomma(guru_yuran_tuntutan[i].value)); console.log(jumlah_yuran);
                                    var id='jumlah_kumulatif_'+ (i+1); console.log(id);
                                    var cukai='cukai_perhimtan_'+ (i+1); console.log(cukai);
                                    document.getElementById(id).value=number_format(jumlah_yuran);
                                    var cukai_yuran= (6/100) * jumlah_yuran; 
                                    document.getElementById(cukai).value=number_format(cukai_yuran);
                                }

                                document.getElementById('guru_yuran_tuntutan_tot').value=number_format(yuran);
                                document.getElementById('valueA').value=number_format(yuran);

                                var Bdata= document.getElementById('valueB').value;

                                var bayaran_data = localStorage.getItem('bayaran_count');
                                let newValue = bayaran_data-1;

                                var newPercentage = document.getElementById("cukai_perhimtan_"+newValue).value; 
                                    document.getElementById("valueD").value = newPercentage;

                                var newCdata = document.getElementById("jumlah_kumulatif_"+newValue).value; 
                                    document.getElementById("valueC").value = newCdata;
                                    terkini = parseFloat(yuran)+parseFloat(Bdata); 
                                    total = parseFloat(terkini).toFixed(2) - parseFloat(removecomma(newCdata)).toFixed(2); 
                                    document.getElementById("valueE").value = number_format(parseFloat(total) + parseFloat(removecomma(newPercentage)));
        }

        function calculateJpsYuran()
        {
                                let guru_jps_tuntutan = document.querySelectorAll("#guru_jps_tuntutan"); 
                                let guru_jps_kumulatif = document.querySelectorAll("#guru_jps_kumulatif"); 
                                var yuran = '0.00';
                                for(let i = 0; i <guru_jps_tuntutan.length; i++)
                                {
                                    yuran=parseFloat(yuran)+parseFloat(removecomma(guru_jps_tuntutan[i].value)); console.log(yuran);
                                    guru_jps_kumulatif[i].value=number_format(yuran); 
                                }

                                document.getElementById('guru_jps_tuntutan_tot').value=number_format(yuran);
        }

        function calculateInbuhan()
        {
                                let guru_inbuhan_tuntutan = document.querySelectorAll("#guru_inbuhan_tuntutan"); 
                                let guru_yuran_tuntutan = document.querySelectorAll("#guru_yuran_tuntutan"); 

                                let guru_inbuhan_kumulatif = document.querySelectorAll("#guru_inbuhan_kumulatif"); 
                                var yuran = '0.00';
                                var jumlah_yuran = '0.00';

                                for(let i = 0; i <guru_inbuhan_tuntutan.length; i++)
                                {
                                    yuran=parseFloat(yuran)+parseFloat(removecomma(guru_inbuhan_tuntutan[i].value)); console.log(yuran);
                                    guru_inbuhan_kumulatif[i].value=number_format(yuran); 

                                    jumlah_yuran=parseFloat(removecomma(guru_inbuhan_tuntutan[i].value)) + parseFloat(removecomma(guru_yuran_tuntutan[i].value)); console.log(jumlah_yuran);
                                    var id='jumlah_kumulatif_'+ (i+1); console.log(id);
                                    var cukai='cukai_perhimtan_'+ (i+1); console.log(cukai);
                                    document.getElementById(id).value=number_format(jumlah_yuran);
                                    var cukai_yuran= (6/100) * jumlah_yuran; 
                                    document.getElementById(cukai).value=number_format(cukai_yuran);
                                }

                                document.getElementById('guru_inbuhan_tuntutan_tot').value=number_format(yuran);
                                document.getElementById('valueB').value=number_format(yuran);

                                var Adata= document.getElementById('valueA').value;

                                var bayaran_data = localStorage.getItem('bayaran_count');
                                let newValue = bayaran_data-1;

                                var newPercentage = document.getElementById("cukai_perhimtan_"+newValue).value; 
                                    document.getElementById("valueD").value = newPercentage;

                                var newCdata = document.getElementById("jumlah_kumulatif_"+newValue).value; 
                                    document.getElementById("valueC").value = newCdata;
                                    terkini = parseFloat(yuran)+parseFloat(Adata); 
                                    total = parseFloat(terkini).toFixed(2) - parseFloat(removecomma(newCdata)).toFixed(2); 
                                    document.getElementById("valueE").value = number_format(parseFloat(total) + parseFloat(removecomma(newPercentage)));
        }

        function calculateJpsInbuhan()
        {
                                let guru_jps_inbuhan_tuntutan = document.querySelectorAll("#guru_jps_inbuhan_tuntutan"); 
                                let guru_jps_inbuhan_kumulatif = document.querySelectorAll("#guru_jps_inbuhan_kumulatif"); 
                                var yuran = '0.00';
                                for(let i = 0; i <guru_jps_inbuhan_tuntutan.length; i++)
                                {
                                    yuran=parseFloat(yuran)+parseFloat(removecomma(guru_jps_inbuhan_tuntutan[i].value)); console.log(yuran);
                                    guru_jps_inbuhan_kumulatif[i].value=number_format(yuran); 
                                }

                                document.getElementById('guru_jps_inbuhan_tuntutan_tot').value=number_format(yuran);
        }


        function addBaucerNum(yuran,inbuhan,bayaran)
        {
            if(yuran>0 && inbuhan>0)
            {

            }
            else
            {
                $('#global_sucess_modal').modal('show');
                document.getElementById('no_baucer_'+bayaran).value = '';
                document.getElementById('tarik_baucer_'+bayaran).value = 'yyyy-mm-dd';
                $("#tutup-confirm").click(function(){
                    $('#global_sucess_modal').modal('hide');
                    return false;
                })
                    
            }
        }
        function removecomma(num){
            num = num.toString()
            num= num.replace(/\,/g,''); // 1125, but a string, so convert it to number
            num=parseFloat(num,10);
            return num;
        }

        function loadInbuhan(count)
        {
            localStorage.setItem("bayaran_count",count);
            
            var url = '{{ route("perunding.imbuhanBalik", [":pid" , ":pero_id"])}}'
                            url = url.replace(":pid", {{$project_id}})
                            url = url.replace(":pero_id", {{$perolehan_id}})
                            window.location.href = url

        }

            function number_format($num)
            { //console.log($num)
                if(isNaN($num))
                {
                return '0.00';
                }
                else
                {
                if($num!=null && $num!='.00')
                {
                    $abc=$num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    return $abc;
                }
                else
                {
                    return '0.00';
                }
                }      
            }

            function loadBayaranHistory(response)
            { console.log(response)
                var jps_table =$('#rekod_bayaran_table').DataTable({     
                        data: response.data.data,
                        dom: "Blfrtip",
                        "aaSorting": [],
                        "language": {
                                            "lengthMenu": "Papar _MENU_ Entri",
                                            "zeroRecords": "Tiada rekod dijumpai",
                                            "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                                            "infoEmpty": "Tiada rekod tersedia",
                                            "infoFiltered": "(filtered from _MAX_ total records)",
                                            "search": "_INPUT_",
                                            "searchPlaceholder": " Carian",
                                            "paginate": {
                                            "first":      "Awal",
                                            "last":       "Akhir",
                                            "next":       "Seterusnya",
                                            "previous":   "Sebelum"
                                            }, 
                                        },
                                        pagingType: 'full_numbers',
                                        columnDefs: [
                            {
                                targets:0, // Start with the last
                                render: function ( data, type, row, meta ) { console.log(row)
                                    if(type === 'display'){
                                        data='<div class="d-flex">'+  row.id + '</div>';
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:1, // Start with the last
                                render: function ( data, type, row, meta ) {
                                        if(type === 'display')
                                        {
                                            data = '';
                                            if(row.tarikh!==null)
                                            {
                                                data=row.tarikh 
                                            }
                                        }
                                        return data;
                                }
                            },
                            {
                                targets:2, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.name!==null)
                                            {
                                                data=row.nama 
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:3, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.bahagian_kod!==null)
                                            {
                                                data= row.bahagian_kod 
                                            }
                                    }
                                    return data;
                                }
                            },
                            {
                                targets:4, // Start with the last
                                render: function ( data, type, row, meta ) {
                                    if(type === 'display'){
                                            data = '';
                                            if(row.tindakan!==null)
                                            {
                                                data=row.tindakan
                                            }
                                        }
                                    return data;
                                    }
                            }
                        ] , 
                        columns: [
                            
                            { data: 'id', "sortable": true},
                            { data: 'tarikh', "sortable": true  }, 
                            { data: 'nama', "sortable": true},
                            { data: 'bahagian_kod' ,  "sortable": true },
                            { data: 'tindakan', "sortable": true  },
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
            }

    $('#tutup_pop').on('click', function(){
        $("#exampleModal3").modal('hide');
        $('.modal-backdrop').hide();
    });
</script>