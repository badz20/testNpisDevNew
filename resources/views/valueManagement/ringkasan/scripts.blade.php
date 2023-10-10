<script>
    $(document).ready(function () {

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show"); 
        
        console.log('test1');
        var kod_projek= document.getElementById('kod_projek').value; console.log(kod_projek)
        var type= document.getElementById('type').value; console.log(type)

        const api_token = "Bearer "+ window.localStorage.getItem('token');        
        axios.defaults.headers.common["Authorization"] = api_token
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        $("#redirectToKalendar").click(function(){
            window.location ='/KalendarVM/'+kod_projek+'/'+type
        })
        

        axios.defaults.headers.common["Authorization"] = api_token
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/brif_project_details/" + kod_projek,
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data.result; console.log(data);
            output = response.data.data.output; console.log(output);
            outcome = response.data.data.outcome; console.log(outcome);
            lokasi = response.data.data.lokasi; console.log(lokasi);
            kos_data = response.data.data.kos; console.log(kos_data);
            kpi = response.data.data.kpi; console.log(kpi)
            skop_project = response.data.data.skop_project; console.log(skop_project)
            sub_skops = response.data.data.sub_skops; console.log(sub_skops)



            if(data){
                document.getElementById('nama_projek').innerHTML = data.nama_projek;
                document.getElementById('objective').innerHTML = data.objektif;
                document.getElementById('ringkasan').innerHTML = data.ringkasan_projek;
                document.getElementById('jenis_kategori_name').innerHTML = data.jenis_kategori_name;
                var kos= commafy(data.kos_projeck);
                document.getElementById('kos_projek').innerHTML = kos;

                if(data.tahun_jangka_mula != data.tahun_jangka_siap )
                {
                    $years = getYears(data.tahun_jangka_mula,data.tahun_jangka_siap); console.log($years)
                    var tr = document.getElementById('table').tHead.children[1]; console.log(tr);  
                    var colspan = document.getElementById('table').rows[0].cells[4]; console.log(colspan)
                    colspan.colSpan = $years.length;
                    for (i = 0; i < $years.length; i++) {
                            th = document.createElement('th');
                            th.innerHTML = $years[i];
                            tr.appendChild(th);  
                    }
                }
                else
                {

                    var tr = document.getElementById('table').tHead.children[1]; //console.log(tr);  table
                    var colspan = document.getElementById('table').rows[0].cells[4]; console.log(colspan)
                    colspan.colSpan = 1;
                    localStorage.setItem("colspan", 1);

                    th = document.createElement('th');
                            th.innerHTML = data.tahun_jangka_mula;
                            tr.appendChild(th); 

                }
            }
console.log('objectif array')
              let obj_array=[];
            const ul = document.querySelectorAll('#objective ol li');
                        for (let i = 0; i <= ul.length - 1; i++) {
                            console.log(ul[i].innerText);
                            obj_array.push(ul[i].innerText +'<==>');
                        }
                        console.log(obj_array)
            localStorage.setItem("obj_array", obj_array);

            if(kos_data)
            {
                document.getElementById('komponen_de').innerHTML = kos_data.nama_komponen;
            }

            if(output.length>0)
            { console.log("output")
               var table = document.getElementById("output_tbody");
                for(let i=0;i<output.length;i++)
                {
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    cell1.innerHTML = i+1;
                    cell1.style.width= "0%";
                    cell2.innerHTML = output[i].output_proj;
                }
            }

            if(outcome.length>0)
            { console.log("outcome")

                var tableoutcome = document.getElementById("outcome_tbody");
                for(let i=0;i<outcome.length;i++)
                {
                    var rowoutcome = tableoutcome.insertRow(i);
                    var cell1 = rowoutcome.insertCell(0);
                    cell1.style.width= "0%";
                    var cell2 = rowoutcome.insertCell(1);
                    cell1.innerHTML = i+1;
                    cell2.innerHTML = outcome[i].Projek_Outcome;
                }
            }

            if(lokasi.length>0)
            { console.log("lokasi")
               var table = document.getElementById("table_lokasi");
                for(let i=0;i<lokasi.length;i++)
                {
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4)
                    cell1.innerHTML = lokasi[i].nama_negeri;
                    cell2.innerHTML = lokasi[i].nama_daerah;
                    cell3.innerHTML = '-';
                    cell4.innerHTML = lokasi[i].nama_parlimen;
                    cell5.innerHTML = lokasi[i].nama_dun;

                }
            }

            var colspan= window.localStorage.getItem('colspan'); console.log(colspan)

            if(kpi.length>0)
            {
              var table = document.getElementById("grid_body");
                for(let i=0;i<kpi.length;i++)
                {
                    console.log(kpi[i])
                    var kuntati = kpi[i].kuantiti;
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerHTML = i+1;
                    cell2.innerHTML = kuntati;
                    cell3.innerHTML = kpi[i].nama_unit;
                    cell4.innerHTML = kpi[i].penerangan;
                    
                    var cells_count=4;
                    var yrs='';
                    for(let j=1;j<=colspan;j++)
                    {
                      var cell = row.insertCell(cells_count);
                         if(j==1){ yrs= kpi[i].yr_1; }else if(j==2){ yrs= kpi[i].yr_2; }
                         else if(j==3){ yrs= kpi[i].yr_3;} else if(j==4){ yrs= kpi[i].yr_4; }
                         else if(j==5){ yrs= kpi[i].yr_5;} else if(j==6){ yrs= kpi[i].yr_6; }
                         else if(j==7){ yrs= kpi[i].yr_7;} else if(j==8){ yrs= kpi[i].yr_8; }
                         else if(j==9){ yrs= kpi[i].yr_9;} else { yrs= kpi[i].yr_10; }
                         if(yrs==null)
                         {
                          yrs=0;
                         }
                         else
                         {
                           yrs= yrs;
                         }
                          cell.innerHTML = yrs;
                      cells_count=cells_count+1;
                    }
                 
                }
            }

            if(skop_project.length>0)
            { console.log("skop_project")
               var table = document.getElementById("skop_table");
                for(let i=0;i<skop_project.length;i++)
                {

                    let data = `<tr>
                                    <td>`+ parseInt(i+1) + `</td>
                                    <td>`+skop_project[i].pemantauanskop_options.skop_name+`</td>
                                    <td class="vmkos"><input disabled value="`+skop_project[i].cost+`"></input></td>
                                </tr>`;
                    
                    $('#skop_table').append(data);

                    if(skop_project[i].pemantauansubskop_projects.length>0)
                    {
                        var sub_skop=skop_project[i].pemantauansubskop_projects;
                        for(let j=0;j<sub_skop.length;j++)
                        {
                            subskopname=getSubskop(sub_skop[j].sub_skop_project_code,sub_skops); console.log(subskopname)
                            let data = `<tr>
                                            <td>`+ " " + `</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;`+subskopname+`</td>
                                            <td class="vmkos"><input disabled value="`+sub_skop[j].Kos+`"></input></td>
                                        </tr>`;
                    
                            $('#skop_table').append(data);
                        }
                    }

                }
            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })


    });

    function getSubskop(id,skop)
    {
        for(let i=0; i< skop.length; i++)
        {
            if(skop[i].id == id)
            {
                return skop[i].sub_skop_name;
            }
        }

    }

    function commafy( num ) {
        var str = num.toString().split('.');
        if (str[0].length >= 5) {
            str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
        }
        if (str[1] && str[1].length >= 5) {
            str[1] = str[1].replace(/(\d{3})/g, '$1 ');
        }
        return str.join('.');
    }

    //----------getYears------------------------------------------
    function getYears(date1,date2)
    {
        //console.log(date1)
        //console.log(date2)
            var start = new Date(date1,01,01); //console.log(start)
            var end = new Date(date2,01,01); //console.log(end)

            var diff = Math.floor(end.getTime() - start.getTime());
            var day = 1000 * 60 * 60 * 24;

            var days = Math.floor(diff/day);
            var months = Math.floor(days/31);
            var years = Math.floor(months/12);

            localStorage.setItem("colspan", parseInt(years)+2);

            const date_array=[];

            for(let k=0;k<=years;k++)
            {
            date_array.push(date1);
            var date1=parseInt(date1)+1;
            }
            date_array.push(date2);

        return date_array;
    }
    //------------------------------------------------------------
</script>