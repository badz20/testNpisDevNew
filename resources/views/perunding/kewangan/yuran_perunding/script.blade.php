<script>


        $(document).ready(function () { 
                     
               
                               const api_token = "Bearer "+ window.localStorage.getItem('token');
                               const api_url = "{{env('API_URL')}}"; 
                               axios.defaults.headers.common["Authorization"] = api_token;
                               var bayaran_data = localStorage.getItem('bayaran_count'); 

               
                               $("div.spanner").addClass("show");
                               $("div.overlay").addClass("show");
                               axios({
                                   method: 'get',
                                   url: api_url+"api/perunding/get_yuran_perunding/" + {{$project_id}}+"/" + {{$perolehan_id}} +"/" + bayaran_data,
                                   responseType: 'json',            
                               })
                               .then(function (response) { //console.log("perkara");
               
                                 var perkara= response.data.data.perkara; //console.log(perkara);
                                 var sub_perkara= response.data.data.sub_perkara; //console.log(sub_perkara);
                                 var units= response.data.data.units; //console.log(units);
                                 var project= response.data.data.project; //console.log(project);
                                 var perolehan_details = response.data.data.perolehan
                                 var bayaran_data = localStorage.getItem('bayaran_count'); 
                                 var bayaran= response.data.data.bayaran; //console.log(bayaran);
                                 var yuran= response.data.data.yuran; //console.log(yuran);
                                 var yuran_perunding= response.data.data.yuran_perunding; //console.log(yuran_perunding);
                                 var yuran_supply= response.data.data.yuran_supply; //console.log(yuran_supply)



                                document.getElementById("no_bayaran").value = bayaran_data;
                                document.getElementById('kod_projek').value = perolehan_details.pemantauan_project.kod_projeck
                                document.getElementById('nama_project').value = perolehan_details.pemantauan_project.nama_projek
                                document.getElementById('nama_perunding').value = perolehan_details.nama_peruding;
                                document.getElementById('nama_perolehan').value = perolehan_details.nama_perolehan;
                                //document.getElementById('no_perjanjian').value = project.perolehan_project.nama_peruding;
                                document.getElementById('tarik_perunding').value = perolehan_details.tarikh_setuju_terima;

                                var sa= response.data.data.project.sa; //console.log(sa);


                                if(bayaran && bayaran['no_baucer']==0)
                                {
                                    $('#simpan').removeClass('d-none');
                                }
                                else
                                {
                                    $('#simpan').addClass('d-none');
                                }


                                 loadheader(sa,sa.length,perkara,yuran,yuran_perunding,yuran_supply,sub_perkara);

                                 if(bayaran_data>1)
                                {
                                    disableAsal(1);
                                }
                                else
                                {
                                    disableAsal(0);
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
        });


        function loadheader(sa,length,perkara,yuran,yuran_perunding,yuran_supply,sub_perkara){ 
        
           let col_count = length+1;
           let suplementaries = '';

           $.each(sa, function(key, units) {
            let bil=key+1;
            suplementaries = suplementaries + '<th> Supplementary Agreement No.' + bil + '</th>'
            });

            //console.log(suplementaries);

           let html = `<thead class="Table_perunding_header" id="yuran_body">

                                        <tr>
                                            <th rowspan="2"></th>
                                            <th class="text-center" rowspan="2" scope="col">ITEM</th>
                                            <th class="text-center" colspan="`+col_count+`" scope="col">JUMLAH AMAUN SILING (RM)</th>
                                            <th class="text-center" colspan="3" scope="col">JUMLAH TUNTUTAN (RM)</th>
                                            <th style="width:10%" class="text-center" rowspan="2" scope="col">Tambah 6% Cukai Perkhidmatan(Tuntutan Terkini)</th>

                                        </tr>
                                        <tr>
                                            <th>Perjanjian Asal</th>`+suplementaries+`
                                            
                                            <th>Bayaran Terdahulu</th>
                                            <th>Tuntutan Terkini</th>
                                            <th>Kumulatif</th>
                                        </tr>

                                    </thead>`;

            $("#yuran_table").append(html);
            loadbody(sa,perkara,yuran,yuran_perunding,yuran_supply,sub_perkara);
        }
        function loadbody(sa,perkara,yuran,yuran_perunding,yuran_supply,sub_perkara){

            let td_count = '';
            let td_sub_jumlah_yuran = '';
            let td_sub_jumlah_inbuhan = '';
            let supplementary = '';
            let perkara_data = '';
            let perkara_text = '';
            let perjanjian_text = '';
            let sub_tot=0;
            let subsub_tot=0;
            let total=0;
            let perkara_total=[];
            let perkara_sum=0;

                var bayaran_data = localStorage.getItem('bayaran_count'); 

                $.each(sa, function(key, units) {

                        let bill=key+1;
                        td_count = td_count + '<td></td>'
                        supplementary = supplementary + '<td> <input class="form-control Table_perunding_body" type="text" onkeyup="calculateSupplyJumlah(this)" value="'+number_format(units['implikasi_kos'])+'" name="suply_'+bill+'" id="supliment_'+bill+'"></td>'
                        perkara_text = perkara_text + '<td> <input disabled="" class="form-control Table_perunding_body inbuhan_suply" type="text"  name="inbuhan_suply_'+bill+'" id="inbuhan_suply_'+bill+'"></td>'
                        td_sub_jumlah_yuran  = td_sub_jumlah_yuran + '<td> <input disabled="" class="form-control Table_perunding_body" type="text"  value="0.00" id="jumlah_yuran_suply_'+bill+'"></td>'
                        td_sub_jumlah_inbuhan  = td_sub_jumlah_inbuhan + '<td> <input disabled="" class="form-control Table_perunding_body" type="text"   id="suply_jumlah_inbuhan'+bill+'"></td>'
                });
               let yuran_perunding_data=yuran_perunding;
                if(yuran_perunding.length == 0) {
                    yuran_perunding_data=yuran;
                }
                    
                $.each(yuran_perunding_data, function(key, items) { console.log(items)

                    let yuran_tardahulu='0.00';
                    let yuran_terkini='0.00';
                    let yuran_kumulatif='0.00';
                    let yuran_tambah='0.00';
                    let penjinilian='0.00';
                    let penjinilian_text='';



                    if(bayaran_data>1)
                    { //console.log("bayaran_data"); console.log(yuran)
                        if(yuran[key])
                        {  //console.log("bayaran_data123");
                            if(yuran[key]['bayaran_terdhulu'] != '.00')
                            { 
                                yuran_tardahulu = yuran[key]['bayaran_terdhulu'];
                            }
                            else
                            { 
                                yuran_tardahulu = items['bayaran_terdhulu'];
                            }

                            if(yuran[key]['tututan_terkini'] != '.00')
                            { 
                                yuran_terkini = yuran[key]['tututan_terkini'];
                            }

                            if(yuran[key]['kumulatif'] != '.00')
                            { 
                                yuran_kumulatif = yuran[key]['kumulatif'];
                            }
                            else
                            {
                                yuran_kumulatif = items['kumulatif'];
                            }

                            if(yuran[key]['cukai_tamba'] != '.00')
                            { 
                                yuran_tambah = yuran[key]['cukai_tamba'];
                            }

                            if(yuran[key]['perjanjian'] != '.00')
                            { 
                                penjinilian = yuran[key]['perjanjian'];
                            }
                            else
                            {
                                penjinilian = items['perjanjian'];
                            }
                            if(yuran[key].perjanjian_text != null)
                            { 
                                penjinilian_text = yuran[key].perjanjian_text;
                            }
                            else
                            {
                                penjinilian_text = items['penjinilian_text'];
                            }

                        }
                        else
                        { 
                            yuran_tardahulu = items['kumulatif'];
                            penjinilian = items['perjanjian'];
                            yuran_kumulatif = items['kumulatif'];
                            yuran_tambah = items['cukai_tamba'];
                            penjinilian_text = items['perjanjian_text']
                        }
                    } 
                    else
                    { //console.log("ssssss"); console.log(yuran[key].perjanjian_text)
                        if(yuran[key])
                        {
                            yuran_terkini=yuran[key]['tututan_terkini'];
                            yuran_kumulatif=yuran[key]['kumulatif'];
                            yuran_tambah=yuran[key]['cukai_tamba'];
                            penjinilian = yuran[key].perjanjian;
                            penjinilian_text = yuran[key].perjanjian_text;
                        }
                    }

                    if(yuran_tardahulu=='0.00')
                    {
                        yuran_kumulatif=yuran_terkini;
                    }
                                perjanjian_text  = perjanjian_text + `<tr class="Table_perunding_body">
                                                    <td></td>
                                                    <td><textarea style="font-size:0.8rem;" class="form-control text-center"  wrap="virtual" type="text" value="" name="perjanjian_text" id="perjanjian_text">`+penjinilian_text+`</textarea>
                                                        <i class="ri-checkbox-indeterminate-line ri-xl kewangan_icon_grey" onclick="removenewRow(this)"></i>
                                                    </td>
                                                    <td> <input class="form-control" type="text" onkeyup="calculateJumlah()" value="`+number_format(penjinilian)+`" name="perjanjian_asal" id="perjanjian_asal"></td>
                                                    `+supplementary+`
                                                    <td> <input class="form-control" type="text" disabled name="tardahulu" value="`+number_format(yuran_tardahulu)+`" id="yuran_tardahulu"></td>
                                                    <td> <input class="form-control" type="text" name="terkini" onkeyup="calculatethisJumlah(this)" value="`+number_format(yuran_terkini)+`" id="yuran_terkini"></td>
                                                    <td> <input class="form-control" type="text" disabled name="kumulatif" value="`+number_format(yuran_kumulatif)+`" id="yuran_kumulatif"></td>
                                                    <td> <input disabled="" class="form-control" type="text" name="tambah" value="`+number_format(yuran_tambah)+`" id="yuran_tambah"></td>

                                                </tr>`;
                });

            
                $.each(perkara, function(key, item) { console.log('sub_perkara'); console.log(sub_perkara[key]);

                    sub_tot=getsubperkaraTotal(item['subperkara']); //console.log(sub_tot);
                    //subsub_tot=getsupersubperkaraTotal(item['subsubperkara']); //console.log(subsub_tot);
                    total=parseFloat(sub_tot); //+parseFloat(subsub_tot); //console.log(total.toFixed(2));
                    perkara_total.push(total.toFixed(2));
                    perkara_sum=perkara_sum+total;

                    console.log(item)

                    if(bayaran_data>1)
                    {
                        var inbuhan_tardahulu=getTerdhuluTotals(item,sub_perkara[key]);
                    }
                    else
                    {
                        var inbuhan_tardahulu='0.00';
                    }
                    var inbuhan_kumulatif=getKumulatifTotals(item,sub_perkara[key]);
                    var inbuhan_terkini=getTerkiniTotals(item,bayaran_data);
                    var inbuhan_percentage=((6/100)*inbuhan_kumulatif).toFixed(2);

                        perkara_data = perkara_data+  `<tr class="Table_perunding_body">
                                                <td></td>
                                                <td>`+item['perkara']+`</td>
                                                <td> <input disabled="" class="form-control Table_perunding_body"
                                                        type="text" name="perjanjian_asal" id="inbuhan_perjanjian_asal" value="`+perkara_total[key]+`"></td>
                                                `+perkara_text+`
                                                <td> <input disabled class="form-control Table_perunding_body" type="text" value="`+number_format(inbuhan_tardahulu)+`" name="tardahulu" id="inbuhan_tardahulu"></td>
                                                <td> <input disabled="" class="form-control Table_perunding_body" type="text" value="`+number_format(inbuhan_terkini)+`" name="terkini" id="inbuhan_terkini"></td>
                                                <td> <input disabled class="form-control Table_perunding_body"  type="text" value="`+number_format(inbuhan_kumulatif)+`" name="kumulatif" id="inbuhan_kumulatif"></td>
                                                <td> <input disabled="" class="form-control" type="text" value="`+number_format(inbuhan_percentage)+`" name="tambah" id="inbuhan_tambah"></td>
                                            </tr>`
                });

                let html = `<tbody>

                            <tr class="Table_perunding_body">
                                <td></td>
                                <td class="lblDikemaskini" style="color: #54595E;"> i. Yuran Iktisan
                                    Perunding<i class="ri-add-box-line ri-xl kewangan_icon_grey" onclick="addnewRow(this,`+sa.length+`)"></i></td>
                                <td></td>
                                `+td_count+`
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>

                            `+perjanjian_text+`
                            
                            <tr class="Table_perunding_body">
                                <td></td>
                                <td class="lblDikemaskini" style="color: #54595E;"> Sub Jumlah Yuran Perunding</td>
                                <td> <input disabled="" class="form-control" type="text" name="perjanjian_asal" id="perjanjian_yuran_jumlah"></td>
                                `+td_sub_jumlah_yuran+`
                                <td> <input disabled class="form-control" type="text" name="tardahulu" value="0.00" id="tardahulu_yuran_jumlah"></td>
                                <td> <input disabled="" class="form-control" type="text" name="terkini" id="terkini_yuran_jumlah"></td>
                                <td> <input disabled class="form-control" type="text" name="kumulatif" id="kumulatif_yuran_jumlah"></td>
                                <td> <input disabled="" class="form-control" type="text" name="tambah" id="tambah_yuran_jumlah"></td>
                            </tr>
                            <tr class="Table_perunding_body">
                                <td></td>
                                <td></td>
                                <td></td>
                                `+td_count+`
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="Table_perunding_body">
                                <td></td>
                                <td class="lblDikemaskini" style="color: #54595E;">ii.Imbuhan Balik</td>
                                <td></td>
                                `+td_count+`
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `+perkara_data+`
                            <tr class="Table_perunding_body">
                                <td></td>
                                <td class="lblDikemaskini" style="color: #54595E;">Sub Jumlah Imbuhan Balik</td>
                                <td> <input disabled="" class="form-control" type="text"  name="perjanjian_asal" value="`+number_format(perkara_sum.toFixed(2))+`" id="perjanjian_inbuhan_jumlah"></td>
                                `+td_sub_jumlah_inbuhan+`
                                <td> <input disabled class="form-control" type="text" name="tardahulu" id="tardahulu_inbuhan_jumlah"></td>
                                <td> <input disabled="" class="form-control" type="text" name="terkini" id="terkini_inbuhan_jumlah"></td>
                                <td> <input disabled class="form-control" type="text" name="kumulatif" id="kumulatif_inbuhan_jumlah"></td>
                                <td> <input disabled="" class="form-control" type="text" name="tambah" id="tambah_inbuhan_jumlah"></td>
                            </tr>
                            <tr class="Table_perunding_body">
                                <td></td>
                                <td></td>
                                <td></td>
                                `+td_count+`
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            
                            </tbody>`;

                $("#yuran_table").append(html);
                loadfooter(sa);


                let all_perjan = document.querySelectorAll("[id^='perjanjian_asal']"); //console.log(all_perjan);

                if(yuran.length > 0)
                {
                    $.each(all_perjan, function(key, item) { //console.log(yuran)
                        let all_perkars = item.parentNode.parentNode.querySelectorAll("[id^='supliment_']"); //console.log(all_perkars);
                        if(yuran[key]['suppliment'].length>0)
                        {
                            let all_yurans=yuran[key]['suppliment']; 
                            $.each(all_perkars, function(keys, items) { //console.log(keys)
                                if(all_yurans[keys])
                                {
                                    items.value=number_format(all_yurans[keys]['supply_value']);
                                }
                            });
                        }
                    });
                }
               

            
                let all_penji_perkars = document.querySelectorAll("[id^='inbuhan_perjanjian_asal']");  //console.log(all_penji_perkars)
                $.each(all_penji_perkars, function(key, item) { 
                    let all_perkars = item.parentNode.parentNode.querySelectorAll("[id^='inbuhan_suply_']");
                    $.each(all_perkars, function(key, items) { 
                       // console.log(items);
                        items.value = item.value;
                    });
                });

                calculateonLoadSupplyJumlah(sa);


                let all_perjanjian_inbuhan = document.querySelectorAll("[id='perjanjian_inbuhan_jumlah']");  //console.log(all_perjanjian_inbuhan[0].value)
                let all_perjanjian_inbuhan_jumlah = all_perjanjian_inbuhan[0].parentNode.parentNode.querySelectorAll("[id^='suply_jumlah_inbuhan']"); //console.log(all_perjanjian_inbuhan_jumlah)
                let all_perjanjian_yuran = document.querySelectorAll("[id='perjanjian_yuran_jumlah']");  //console.log(all_perjanjian_yuran[0].value)
                let all_perjanjian_yuran_jumlah = all_perjanjian_yuran[0].parentNode.parentNode.querySelectorAll("[id^='jumlah_yuran_suply_']"); //console.log(all_perjanjian_yuran_jumlah)
                let all_supply_jumlah = document.querySelectorAll("[id^='supply_jumlah_']");  //console.log(all_supply_jumlah)
                let all_supply_cukai = document.querySelectorAll("[id^='supply_cukai_']");  //console.log(all_supply_cukai)
                let all_supply_besar = document.querySelectorAll("[id^='supply_besar_']");  //console.log(all_supply_besar)

                $.each(all_perjanjian_inbuhan_jumlah, function(key, items) {                         
                        items.value = all_perjanjian_inbuhan[0].value;
                        var jumlah = parseFloat(removecomma(all_perjanjian_yuran_jumlah[key].value))+parseFloat(removecomma(all_perjanjian_inbuhan[0].value)); //console.log(jumlah);
                        all_supply_jumlah[key].innerHTML =number_format(jumlah.toFixed(2));
                        var percentage = (6/100)*jumlah;
                        all_supply_cukai[key].innerHTML=number_format(percentage.toFixed(2));
                        var total= parseFloat(percentage)+parseFloat(jumlah);
                        all_supply_besar[key].innerHTML=number_format(total.toFixed(2));
                });
                

                let jumlah_inbuhan_tardahulu ='0.00';
                let jumlah_inbuhan_terkini ='0.00';
                let jumlah_inbuhan_kumulatif ='0.00';
                let jumlah_inbuhan_tambah ='0.00';


                let all_inbuhan_tardahulu = document.querySelectorAll("[id='inbuhan_tardahulu']"); 
                $.each(all_inbuhan_tardahulu, function(key, item) { 
                    jumlah_inbuhan_tardahulu=parseFloat(jumlah_inbuhan_tardahulu)+parseFloat(removecomma(item.value));
                });

                document.getElementById("tardahulu_inbuhan_jumlah").value = number_format(jumlah_inbuhan_tardahulu.toFixed(2));

                let all_inbuhan_terkini = document.querySelectorAll("[id='inbuhan_terkini']"); 
                $.each(all_inbuhan_terkini, function(key, item) { 
                    jumlah_inbuhan_terkini=parseFloat(jumlah_inbuhan_terkini)+parseFloat(removecomma(item.value));
                });
                document.getElementById("terkini_inbuhan_jumlah").value = number_format(jumlah_inbuhan_terkini.toFixed(2));


                let all_inbuhan_kumulatif = document.querySelectorAll("[id='inbuhan_kumulatif']"); 
                $.each(all_inbuhan_kumulatif, function(key, item) { 
                    jumlah_inbuhan_kumulatif=parseFloat(jumlah_inbuhan_kumulatif)+parseFloat(removecomma(item.value));
                });
                document.getElementById("kumulatif_inbuhan_jumlah").value = number_format(jumlah_inbuhan_kumulatif.toFixed(2));

                let all_inbuhan_tambah = document.querySelectorAll("[id='inbuhan_tambah']"); 
                $.each(all_inbuhan_tambah, function(key, item) { 
                    jumlah_inbuhan_tambah=parseFloat(jumlah_inbuhan_tambah)+parseFloat(removecomma(item.value));
                });
                document.getElementById("tambah_inbuhan_jumlah").value = number_format(jumlah_inbuhan_tambah.toFixed(2));

                calculateJumlah();
                calculateOnloadJumlah("tardahulu");
                calculateOnloadJumlah("terkini");
                calculateOnloadJumlah("kumulatif");
                calculateOnloadJumlah("tambah");

        }

        function calculateonLoadSupplyJumlah(sa)
        { 
            $.each(sa, function(key, units) {
                let bill=key+1; //console.log(bill);
                let id="supliment_"+bill;
                let sum_id="jumlah_yuran_suply_"+bill;
                let suply_data = document.querySelectorAll("[id^='"+id+"']"); //console.log(suply_data);
                let total=0;
                $.each(suply_data, function(keys, items) {
                   // console.log(items.value);
                    total=total+parseFloat(removecomma(items.value));
                });
               // console.log(total)
                document.getElementById(sum_id).value=number_format(total.toFixed(2));
            });

        }


        function  getsubperkaraTotal(subperkara){
            let sub_tot=0;
            $.each(subperkara, function(key, item) { 

                sub_tot=sub_tot+parseFloat(item['kelulusan_jumlah']);
            });

            return sub_tot;
        }
                       
        
        function getsupersubperkaraTotal(subsubperkara){
            let sub_sub_tot=0;

            $.each(subsubperkara, function(key, item) { 
                sub_sub_tot=sub_sub_tot+parseFloat(item['kelulusan_jumlah']);
            });

            return sub_sub_tot;

        }

        function getTerdhuluTotals(datas,pre)
        {
            var sub_terda_qty='0.00';
            var terda_qty='0.00';
            var terda_tot_qty='0.00';
            let sum='0.00';

                $.each(datas['subperkara'], function(key, item) {  console.log('hhhhhhhhhhh'); 
                    console.log(pre['subperkara'][key]); 
                    if(parseFloat(item['terda_jumlah']) > 0)
                    { //console.log('ddddddd')
                        terda_qty = parseFloat(terda_qty)+ parseFloat(item['terdah_jumlah']);
                    }
                    else
                    { //console.log('dfffff')
                        if(typeof pre['subperkara'][key] != 'undefined')
                        {
                            terda_qty = parseFloat(terda_qty)+ parseFloat(pre['subperkara'][key]['kumulatif_jumlah']);
                        }
                        else
                        {
                            terda_qty = parseFloat(terda_qty);
                        }
                    }

                    // if(datas['subsubperkara'].length > 0 && parseFloat(datas['subsubperkara'][key]['terdah_jumlah']) > 0)
                    // {
                    //     sub_terda_qty = parseFloat(sub_terda_qty)+ parseFloat(datas['subsubperkara'][key]['terdah_jumlah']);
                    // }
                    // else
                    // {
                    //     if( typeof pre !== 'undefined' && pre['subsubperkara']>0)
                    //     {
                    //         sub_terda_qty = parseFloat(sub_terda_qty)+ parseFloat(pre['subsubperkara'][key]['kumulatif_jumlah']);
                    //     }
                    //     else
                    //     {
                    //         sub_terda_qty = parseFloat(sub_terda_qty);
                    //     }
                    // }
                    //console.log(terda_qty); console.log(sub_terda_qty);
                });
                // sum=parseFloat(terda_qty)+parseFloat(sub_terda_qty); //console.log(sum);
                sum=parseFloat(terda_qty).toFixed(2);

            
            // if(sum != '0.00')
            // {
                return sum;
            // }
            // else
            // {
            //    return sum;
            // }
        }
        
        function getTerkiniTotals(datas,bayaran)
        {
            var sub_terda_qty='0.00';
            var terda_qty='0.00';
            var terda_tot_qty='0.00';
            let sum='0.00';

            $.each(datas['subperkara'], function(key, item) { 
                    terda_qty = parseFloat(terda_qty)+ parseFloat(item['semasa_jumlah']);
                    // if(typeof datas['subsubperkara'] === 'undefined' || datas['subsubperkara'].length<=0)
                    // { 
                    //     sub_terda_qty = parseFloat(sub_terda_qty);
                    // }
                    // else
                    // { 
                    //     sub_terda_qty = parseFloat(sub_terda_qty)+ parseFloat(datas['subsubperkara'][key]['semasa_jumlah']);
                    // }
                });
                // sum=parseFloat(terda_qty)+parseFloat(sub_terda_qty).toFixed(2);
                sum=parseFloat(terda_qty).toFixed(2);

            
            return sum;
        }

        function getKumulatifTotals(datas,pre)
        {
            var sub_terda_qty='0.00';
            var terda_qty='0.00';
            var terda_tot_qty='0.00';
            let sum='0.00';

            $.each(datas['subperkara'], function(key, item) {  console.log(pre)
                    if(parseFloat(item['kumulatif_jumlah']) > 0)
                    { //console.log('ddddddd')
                        terda_qty = parseFloat(terda_qty)+ parseFloat(item['kumulatif_jumlah']);
                    }
                    else
                    { //console.log('dfffff')
                        if( typeof pre !== 'undefined' && pre['subperkara']>0)
                        {
                            terda_qty = parseFloat(terda_qty)+ parseFloat(pre['subperkara'][key]['kumulatif_jumlah']);

                        }
                        else
                        {
                            terda_qty = parseFloat(terda_qty);
                        }
                    }

                    // if( datas['subsubperkara'].length > 0 && parseFloat(datas['subsubperkara'][key]['kumulatif_jumlah']) > 0)
                    // {
                    //     sub_terda_qty = parseFloat(sub_terda_qty)+ parseFloat(datas['subsubperkara'][key]['kumulatif_jumlah']);
                    // }
                    // else
                    // {
                    //     if( typeof pre !== 'undefined' && pre['subsubperkara']>0)
                    //     {
                    //         sub_terda_qty = parseFloat(sub_terda_qty)+ parseFloat(pre['subsubperkara'][key]['kumulatif_jumlah']);
                    //     }
                    //     else
                    //     {
                    //         sub_terda_qty = parseFloat(sub_terda_qty);
                    //     }
                    // }
                });
                // sum=parseFloat(terda_qty)+parseFloat(sub_terda_qty).toFixed(2);
                sum=parseFloat(terda_qty).toFixed(2);

            
            return sum;
        }

        function loadfooter(sa){

            
            let footer_jumlah = '';
            let footer_cukai = '';
            let footer_besar = '';


           $.each(sa, function(key, units) {
                let bill=key+1;
                footer_jumlah = footer_jumlah + '<td id="supply_jumlah_'+bill+'"></td>'
                footer_cukai = footer_cukai + '<td id="supply_cukai_'+bill+'"></td>'
                footer_besar = footer_besar + '<td id="supply_besar_'+bill+'"></td>'
            });

            let html = `<tfoot>
                                        <tr class="Table_perunding_body" style="background-color: #F0ECEC;">
                                            <td ></td>
                                            <td>Jumlah</td>
                                            <td id="suply_perjanjian"></td>
                                            `+footer_jumlah+`
                                            <td id="tardahulu_footer_jumlah"></td>
                                            <td id="terkini_footer_jumlah"></td>
                                            <td id="kumulatif_footer_jumlah"></td>
                                            <td id="tambah_footer_jumlah"></td>
                                        </tr>
                                        <tr class="Table_perunding_body" style="background-color: #F0ECEC;">
                                            <td></td>
                                            <td>Tambah 6% Cukai Perkhidmatan</td>
                                            <td id="cukai_perjanjian"></td>
                                            `+footer_cukai+`
                                            <td id="tardahulu_cukai_jumlah"></td>
                                            <td id="terkini_cukai_jumlah"></td>
                                            <td id="kumulatif_cukai_jumlah"></td>
                                            <td id="tambah_cukai_jumlah"></td>
                                        </tr>
                                        <tr class="Table_perunding_body" style="background-color: #F0ECEC;">
                                            <td></td>
                                            <td>Jumlah Besar (Termasuk Cukai Perkhidmatan)</td>
                                            <td id="besar_perjanjian"></td>
                                            `+footer_besar+`
                                            <td id="tardahulu_besar_jumlah"></td>
                                            <td id="terkini_besar_jumlah"></td>
                                            <td id="kumulatif_besar_jumlah"></td>
                                            <td id="tambah_besar_jumlah"></td>
                                        </tr>
                                    </tfoot>`;

                 $("#yuran_table").append(html);
            }

            function addnewRow(element,sa) {

                let tot_length  = sa+9;

                let supplementary = '';

                for (let i=0; i<sa; i++) {
                    let bill=i+1;
                    supplementary = supplementary + '<td> <input class="form-control" type="text" value="0.00" onkeyup="calculateSupplyJumlah(this)" name="suply_'+bill+'" id="supliment_'+bill+'"></td>'
                }

                var t_count = document.getElementById("yuran_table").rows.length; console.log(t_count);
                var maincount = element.parentNode.parentNode.rowIndex;

                var row_count = t_count - tot_length;
                console.log(row_count);

                let html = `<tr class="Table_perunding_body">
                                <td></td>
                                <td><textarea style="font-size:0.8rem;" class="form-control text-center"  wrap="virtual" type="text" value="" name="perjanjian_text" id="perjanjian_text">  </textarea>
                                <i class="ri-checkbox-indeterminate-line ri-xl kewangan_icon_grey"  onclick="removenewRow(this)"></i>
                                </td>
                                <td> <input class="form-control" type="text" onkeyup="calculateJumlah()" value="0.00" name="perjanjian_asal" id="perjanjian_asal"></td>
                                `+supplementary+`
                                <td> <input class="form-control" disabled type="text" value="0.00" name="tardahulu" id="yuran_tardahulu"></td>
                                <td> <input class="form-control" type="text" name="terkini" value="0.00" onkeyup="calculatethisJumlah(this)" id="yuran_terkini"></td>
                                <td> <input class="form-control" disabled type="text" value="0.00" name="kumulatif" id="yuran_kumulatif"></td>
                                <td> <input disabled="" class="form-control" type="text" value="0.00" name="tambah" id="yuran_tambah"></td>

                            </tr>`;

                $('#yuran_table > tbody > tr').eq(0).after(html);
            }

            function removenewRow(element)
            {
                let tabel = document.getElementById("yuran_table");

                var indexNumber = element.parentNode.parentNode.rowIndex; //console.log(indexNumber);
                tabel.deleteRow(indexNumber);

            }

            function removecomma(num){
      
                num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
                num=parseFloat(num,10);
                return num;
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


            function calculateJumlah()
            {
                nf();

                let perjanjian_asal_tot = 0;
                let inbuhan_perjanjian_asal_tot = 0;


                let perjanjian_asal = document.querySelectorAll("[id='perjanjian_asal']");
                for (var i = 0;i < perjanjian_asal.length; i++) {          
                        if(removecomma(perjanjian_asal[i].value) > 0){
                            perjanjian_asal_tot=perjanjian_asal_tot+parseFloat(removecomma(perjanjian_asal[i].value));
                        }
                        else
                        {
                            perjanjian_asal_tot=perjanjian_asal_tot;
                        }
                }
                document.getElementById('perjanjian_yuran_jumlah').value=number_format(perjanjian_asal_tot.toFixed(2));  

                let inbuhan_perjanjian_asal = document.querySelectorAll("[id='inbuhan_perjanjian_asal']");  //console.log(inbuhan_perjanjian_asal)
                for (var i = 0;i < inbuhan_perjanjian_asal.length; i++) {          
                        if(removecomma(inbuhan_perjanjian_asal[i].value) > 0){
                            inbuhan_perjanjian_asal_tot=inbuhan_perjanjian_asal_tot+parseFloat(removecomma(inbuhan_perjanjian_asal[i].value));
                        }
                        else
                        {
                            inbuhan_perjanjian_asal_tot=inbuhan_perjanjian_asal_tot;
                        }
                } 
                
                jumlah_perjanjian = inbuhan_perjanjian_asal_tot + perjanjian_asal_tot;
                cuaki_perjanjian = (6/100) * jumlah_perjanjian;
                jumlah_perjanjian_total = jumlah_perjanjian + cuaki_perjanjian;
                document.getElementById('suply_perjanjian').innerHTML=number_format(jumlah_perjanjian.toFixed(2));  
                document.getElementById('cukai_perjanjian').innerHTML=number_format(cuaki_perjanjian.toFixed(2));  
                document.getElementById('besar_perjanjian').innerHTML=number_format(jumlah_perjanjian_total.toFixed(2));  
                nf();

            }

            function calculatethisJumlah(textid)
            {
                nf();

                var listItemId = $(textid).closest('tr'); console.log(listItemId)
                let terda_tot = 0;
                let terkini_tot = 0;
                let kumulatif_tot = 0;
                let tambah_tot = 0;

                let inbuhan_tambah_jumlah_tot = 0;
                let inbuhan_kumulatif_jumlah_tot = 0;
                let inbuhan_terkini_jumlah_tot = 0;


                var asal_data = listItemId. find('td:eq(2) input[type="text"]').val(); console.log(asal_data); 
                var terkini_data = listItemId[0].querySelectorAll("td input#yuran_terkini")[0]; console.log(terkini_data.value);
                var clickdata = CalculateKeyup(removecomma(terkini_data.value)); //console.log(clickdata);

                if(removecomma(asal_data)<removecomma(terkini_data.value))
                {
                    terkini_data.style.backgroundColor = "#dc35459c";
                    terkini_data.value = '0.00';
                    alert("Sila masukkan tuntutan terkini yang lebih rendah");
                    return false;   
                }

                terkini_data.value = clickdata;



                let terda = document.querySelectorAll("[id='yuran_tardahulu']"); //console.log(terda)
                let terkini = document.querySelectorAll("[id='yuran_terkini']"); //console.log(terkini)
                let kumulatif = document.querySelectorAll("[id='yuran_kumulatif']"); //console.log(terkini)
                let tambah = document.querySelectorAll("[id='yuran_tambah']"); //console.log(terkini)
                

                
                for (var i = 0;i < terda.length; i++) {   
                    
                    var kumulatif_sum=parseFloat(removecomma(terda[i].value))+parseFloat(removecomma(terkini[i].value));
                    var percentage = (6/100) * kumulatif_sum;

                        kumulatif[i].value=number_format(kumulatif_sum.toFixed(2));
                        tambah[i].value=number_format(percentage.toFixed(2));

                        
                        if(removecomma(terda[i].value) > 0){
                            terda_tot=terda_tot+parseFloat(removecomma(terda[i].value));
                        }

                        if(removecomma(terkini[i].value) > 0){
                            terkini_tot=terkini_tot+parseFloat(removecomma(terkini[i].value));
                        }

                        kumulatif_tot=kumulatif_tot+parseFloat(kumulatif_sum);
                        tambah_tot=tambah_tot+parseFloat(percentage);
                }

                document.getElementById("terkini_yuran_jumlah").value = number_format(terkini_tot.toFixed(2));
                document.getElementById("kumulatif_yuran_jumlah").value = number_format(kumulatif_tot.toFixed(2));
                document.getElementById("tambah_yuran_jumlah").value = number_format(tambah_tot.toFixed(2));


                

                inbuhan_tambah_jumlah_tot= document.getElementById('tambah_inbuhan_jumlah').value;  //console.log(inbuhan_tambah_jumlah_tot)

                jumlah_tambah = removecomma(inbuhan_tambah_jumlah_tot) + tambah_tot;
                cuaki_tambah = (6/100) * jumlah_tambah;
                jumlah_tambah_total = jumlah_tambah + cuaki_tambah;
                document.getElementById('tambah_footer_jumlah').innerHTML=number_format(jumlah_tambah.toFixed(2));  
                document.getElementById('tambah_cukai_jumlah').innerHTML=number_format(cuaki_tambah.toFixed(2));  
                document.getElementById('tambah_besar_jumlah').innerHTML=number_format(jumlah_tambah_total.toFixed(2));  

                inbuhan_kumulatif_jumlah_tot= document.getElementById('kumulatif_inbuhan_jumlah').value;  //console.log(inbuhan_kumulatif_jumlah_tot)

                jumlah_kumulatif = removecomma(inbuhan_kumulatif_jumlah_tot) + kumulatif_tot;
                cuaki_kumulatif = (6/100) * jumlah_kumulatif;
                jumlah_kumulatif_total = jumlah_kumulatif + cuaki_kumulatif;
                document.getElementById('kumulatif_footer_jumlah').innerHTML=number_format(jumlah_kumulatif.toFixed(2));  
                document.getElementById('kumulatif_cukai_jumlah').innerHTML=number_format(cuaki_kumulatif.toFixed(2));  
                document.getElementById('kumulatif_besar_jumlah').innerHTML=number_format(jumlah_kumulatif_total.toFixed(2));
                
                
                inbuhan_terkini_jumlah_tot= document.getElementById('terkini_inbuhan_jumlah').value;  //console.log(inbuhan_terkini_jumlah_tot)

                jumlah_terkini = removecomma(inbuhan_terkini_jumlah_tot) + terkini_tot;
                cuaki_terkini = (6/100) * jumlah_terkini;
                jumlah_terkini_total = jumlah_terkini + cuaki_terkini;
                document.getElementById('terkini_footer_jumlah').innerHTML=number_format(jumlah_terkini.toFixed(2));  
                document.getElementById('terkini_cukai_jumlah').innerHTML=number_format(cuaki_terkini.toFixed(2));  
                document.getElementById('terkini_besar_jumlah').innerHTML=number_format(jumlah_terkini_total.toFixed(2));

                nf();

            }

            function calculateOnloadJumlah(type)
            {
                nf();

                let perjanjian_asal_tot = 0;
                let inbuhan_perjanjian_asal_tot = 0;


                let perjanjian_asal = document.querySelectorAll("[id='yuran_"+type+"']"); //console.log(perjanjian_asal)
                
                for (var i = 0;i < perjanjian_asal.length; i++) {          
                        if(removecomma(perjanjian_asal[i].value) > 0){
                            perjanjian_asal_tot=perjanjian_asal_tot+parseFloat(removecomma(perjanjian_asal[i].value));
                        }
                        else
                        {
                            perjanjian_asal_tot=perjanjian_asal_tot;
                        }
                }
                document.getElementById(type+'_yuran_jumlah').value=number_format(perjanjian_asal_tot.toFixed(2));  

                inbuhan_perjanjian_asal_tot= document.getElementById(type+'_inbuhan_jumlah').value;  //console.log(inbuhan_perjanjian_asal_tot)

                
                jumlah_perjanjian = removecomma(inbuhan_perjanjian_asal_tot) + perjanjian_asal_tot;
                cuaki_perjanjian = (6/100) * jumlah_perjanjian;
                jumlah_perjanjian_total = jumlah_perjanjian + cuaki_perjanjian;
                document.getElementById(type+'_footer_jumlah').innerHTML=number_format(jumlah_perjanjian.toFixed(2));  
                document.getElementById(type+'_cukai_jumlah').innerHTML=number_format(cuaki_perjanjian.toFixed(2));   
                document.getElementById(type+'_besar_jumlah').innerHTML=number_format(jumlah_perjanjian_total.toFixed(2));  
                nf();

            }

            function calculateSupplyJumlah(element)
            {
                var listItemId = $(element).closest('tr'); console.log(listItemId)
                var terkini_data = listItemId[0].querySelectorAll("td input.Table_perunding_body")[0]; console.log(terkini_data.value);

                var clickdata = CalculateKeyup(removecomma(terkini_data.value)); console.log(clickdata);

                nf();
                
                let s_id=element.getAttribute('id'); //console.log(s_id);
                let s_name=element.getAttribute('name'); //console.log(s_name);
                let count=s_id.split('_');
                let perjanjian_asal_tot = 0;
                let perjanjian_asal = document.querySelectorAll("[id='"+s_id+"']"); 
                for (var i = 0;i < perjanjian_asal.length; i++) {          
                        if(removecomma(perjanjian_asal[i].value) > 0){
                            perjanjian_asal_tot=perjanjian_asal_tot+parseFloat(removecomma(perjanjian_asal[i].value));
                        }
                        else
                        {
                            perjanjian_asal_tot=perjanjian_asal_tot;
                        }
                }
                document.getElementById("jumlah_yuran_"+s_name).value=number_format(perjanjian_asal_tot.toFixed(2)); 
                let inbuhan_tot=document.getElementById("suply_jumlah_inbuhan"+count[1]).value; 
                let tot_jumlah=perjanjian_asal_tot+parseFloat(removecomma(inbuhan_tot)); //console.log(tot_jumlah);
                document.getElementById("supply_jumlah_"+count[1]).innerHTML = number_format(tot_jumlah.toFixed(2)); 
                let percentage = (6/100) * tot_jumlah;
                document.getElementById("supply_cukai_"+count[1]).innerHTML = number_format(percentage.toFixed(2)); 
                let besar = parseFloat(tot_jumlah) + parseFloat(percentage);
                document.getElementById("supply_besar_"+count[1]).innerHTML = number_format(besar.toFixed(2)); 
                nf();

                terkini_data.value = clickdata;
 
            }
            function CalculateKeyup($num) { console.log($num)
                    if(isNaN($num))
                    {
                        return '';
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
                            return '';
                        }
                    }  
            }

            function disableAsal(type){
                var form = document.querySelectorAll("[id='perjanjian_asal']"); 

                if(type == 1)
                {
                    for (var i = 0, len = form.length; i < len; ++i) {
                        form[i].disabled = true;
                    }
                }
                else
                {
                    for (var i = 0, len = form.length; i < len; ++i) {
                        form[i].disabled = false;
                    } 
                }
            }
            function nf(){
                $('.input-element').toArray().forEach(function(field){
                    new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                    });
                });
            }

            $("#simpan").click(function(){ 

                    var formData = new FormData();

                    let perjanjian_asal = document.querySelectorAll("[id='perjanjian_asal']");  //console.log(perjanjian_asal)
                    let suply_data = document.querySelectorAll("[id^='supliment_']"); //console.log(suply_data);
                    let yuran_tardahulu = document.querySelectorAll("[id='yuran_tardahulu']"); 
                    let yuran_terkini = document.querySelectorAll("[id='yuran_terkini']");
                    let yuran_kumulatif = document.querySelectorAll("[id='yuran_kumulatif']"); //console.log(yuran_kumulatif)
                    let yuran_tambah = document.querySelectorAll("[id='yuran_tambah']"); 
                    let total_suply_data = document.querySelectorAll("[id^='jumlah_yuran_suply_']"); //console.log(total_suply_data);
                    let perjanjian_text = document.querySelectorAll("[id='perjanjian_text']");  //console.log(perjanjian_asal)


                    suply_data = []  

                    $.each(perjanjian_asal, function(keys, item) { 
                        var obj = {}; 
                        let all_perkars = item.parentNode.parentNode.querySelectorAll("[id^='supliment_']"); //console.log(all_perkars);
                        $.each(all_perkars, function(key, items) { 
                            var key = key;
                            var val = items['value'];
                            obj[key] = removecomma(val);
                        });
                        suply_data.push(obj);
                    });

                    bayarandata = []  
                    for (var i = 0;i < yuran_kumulatif.length; i++) {                         
                    data= {};

                        if(isNaN(removecomma(perjanjian_asal[i].value))){
                            data.perjanjian_asal = 0;
                        }
                        else{
                            data.perjanjian_asal = removecomma(perjanjian_asal[i].value);
                        }

                        if(isNaN(removecomma(yuran_tardahulu[i].value))){
                            data.yuran_tardahulu = 0;
                        }
                        else{
                            data.yuran_tardahulu = removecomma(yuran_tardahulu[i].value);
                        }

                        if(isNaN(removecomma(yuran_terkini[i].value))){
                            data.yuran_terkini = 0;
                        }
                        else{
                            data.yuran_terkini = removecomma(yuran_terkini[i].value);
                        }

                        if(isNaN(removecomma(yuran_kumulatif[i].value))){
                            data.yuran_kumulatif = 0;
                        }
                        else{
                            data.yuran_kumulatif = removecomma(yuran_kumulatif[i].value);
                        }

                        if(isNaN(removecomma(yuran_tambah[i].value))){
                            data.yuran_tambah = 0;
                        }
                        else{
                            data.yuran_tambah = removecomma(yuran_tambah[i].value);
                        }
                        
                        data.supply = suply_data[i];      
                        data.perjanjian_text = perjanjian_text[i].value;               


                    bayarandata.push(JSON.stringify(data))
                    }



                    bayarandata.forEach((item) => {
                        formData.append('bayarandata[]', item);
                    });

                    $.each(total_suply_data, function(key, items) { 
                            formData.append('total_suply_data[]', removecomma(items.value));
                    });

                    formData.append('project_id', {{$project_id}})
                    formData.append('perolehan',{{$perolehan_id}});
                    formData.append('user_id', {{Auth::user()->id}})
                    var bayaran_data = localStorage.getItem('bayaran_count'); 
                    formData.append('no_bayaran',bayaran_data);
                    var yuran_perunding = document.getElementById('kumulatif_besar_jumlah').innerHTML;
                    formData.append('yuran_perunding',removecomma(yuran_perunding));
                    var suply_perjanjian = document.getElementById('suply_perjanjian').innerHTML;
                    formData.append('suply_perjanjian',removecomma(suply_perjanjian));
                    formData.append('action',"Kemaskini Yuran Peunding");



                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");


                    const api_token = "Bearer "+ window.localStorage.getItem('token');
                    const api_url = "{{env('API_URL')}}"; 
                    axios.defaults.headers.common["Authorization"] = api_token;

                    axios({

                        method: 'POST',
                        url: api_url+"api/perunding/update_yuran",
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
                            //window.location.href = "/kewangan/lejar-bayaran/"+{{$project_id}}+"/"+{{$perolehan_id}}
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

            function loadBayaranHistory(response)
            { //console.log(response)
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
                                render: function ( data, type, row, meta ) { //console.log(row)
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