<script>

function loadOldPrestasi(oldPrestasi) {
    let prestasiHistoryCounter = 0;
    let title = 'Prestasi Kemajuan'
    let tbodyName = 'prestasiHistoryTbody'
    // let show='show'
    // let collapse='collpase'

    oldPrestasi.forEach(versionPrestasi => {

        oldPrestasiCounter = 0
        if (prestasiHistoryCounter == 0) {
            title = 'Prestasi Kemajuan  Asal'
        } else {
            title = 'Prestasi Kemajuan ' + prestasiHistoryCounter.toString()
        }

        tbodyName = 'prestasiHistoryTbody' + prestasiHistoryCounter.toString()
        prestasiHistoryCounter += 1
        
        let template = `
                            <div class="accordion-item">
                                <h6 onclick="switchToggle(`+prestasiHistoryCounter+`)"  class="accordion-header" id="heading`+prestasiHistoryCounter+`">
                                    <button id="toggleBnt`+prestasiHistoryCounter+`" class="accordion-button collapsed  col-12 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-`+prestasiHistoryCounter+`" aria-expanded="false" aria-controls="flush-`+prestasiHistoryCounter+`" style="background-color:#39AFD1;text-align: left;border:none; font-size: 1rem; text-transform: uppercase; font-family: Poppins_Regular;">
                                        <label class=" mr-4 m-1" for="heading`+prestasiHistoryCounter+`">` + title + `</label>
                                    </button>
                                </h6>
                                <div id="flush-`+prestasiHistoryCounter+`" class="accordion-collapse collapse hidden" aria-labelledby="heading`+prestasiHistoryCounter+`" data-bs-parent="#historyPrestasi">
                                    <div class="accordion-body">
                                                <form>
                                                <input class="form-check-input" type="hidden" name="perolehan_id"
                                                    id="perolehan_id" value="{{$perolehan_id}}" />
                                                <input class="form-check-input" type="hidden" name="pemantauan_id"
                                                    id="pemantauan_id" value="{{$project_id}}" />
                                                <div style="overflow-y: auto;max-height: 300px;">
                                                    <table class=" table table-striped table-bordered"
                                                        style="width:300rem;border-collapse: collapse;">
                                                        <thead class="Table_perunding_header">
                                                            <tr class="Table_perunding_body rbtnBulanan">
                                                                <th rowspan="2" scope="col">Bil</th>
                                                                <th rowspan="2" scope="col">Tahun</th>
                                                                <th rowspan="2" scope="col">Bulan</th>
                                                                <th rowspan="6" scope="col" class="blue_th">
                                                                    <em>Deliverables</em>
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    Surat Peringatan
                                                                </th>
                                                                <th rowspan="2" class="blue_th" scope="col">
                                                                    Emel Peringatan
                                                                </th>
                                                                <th colspan="2">Tarikh Mula</th>
                                                                <th colspan="2">Tarikh Siap</th>
                                                                
                                                                <th rowspan="2" width="4%" class="blue_th" scope="col">
                                                                    Hari Lewat/Awal
                                                                </th>

                                                                <th rowspan="2" width="4%" class="blue_th" scope="col">
                                                                    Peratus Jadual (%)
                                                                </th>
                                                                <th rowspan="2" width="4%" class="blue_th" scope="col">
                                                                    Peratus Kumulatif Jadual (%)
                                                                </th>

                                                                <th rowspan="2" width="4%" class="blue_th" scope="col">
                                                                    Peratus Sebenar (%)
                                                                </th>
                                                                <th rowspan="2" width="4%" class="blue_th" scope="col">
                                                                    Peratus Kumulatif Sebenar (%)
                                                                </th>

                                                                <th rowspan="2" scope="col">
                                                                    Status Pelaksanaan
                                                                </th>
                                                                <th rowspan="2" width="3%" scope="col">Masalah</th>
                                                                <th rowspan="2" scope="col">
                                                                    Tarikh Mesyuarat Jawatan Kuasa Teknikal
                                                                </th>
                                                                <th rowspan="2" scope="col">Keputusan</th>
                                                                <th rowspan="2" scope="col">
                                                                    Prestasi Penilaian Perunding
                                                                </th>
                                                                <th rowspan="2" scope="col">EOT</th>
                                                                <th rowspan="2" scope="col" width="3%">
                                                                    Lampiran EOT
                                                                </th>


                                                                <th rowspan="2" class="blue_th" scope="col">
                                                                    Tarikh LAD Mula
                                                                </th>
                                                                <th rowspan="2" class="blue_th" scope="col">
                                                                    Tarikh LAD Tamat
                                                                </th>
                                                                <th rowspan="2" class="blue_th" scope="col">
                                                                    Bilangan Hari LAD
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    Jumlah LAD Terkumpul
                                                                </th>
                                                                <th rowspan="2" scope="col">
                                                                    Tarikh Kemaskini
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="` + tbodyName + `" class="` + tbodyName + `" style="text-align: -webkit-center;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>`

        $('#historyPrestasi').append(template);
       

        versionPrestasi.forEach(prestasi => {
            oldPrestasiCounter += 1
            let deliverableOptions = ''
            spFilename = 'Muat Naik'
            eotFilename = 'Muat Naik'

            peratus_kumulatif_sebenar = 0
            peratus_kumulatif_jadual = 0

            if(prestasi.keputusan != 'Gagal') {
                    peratus_kumulatif_sebenar = peratus_kumulatif_sebenar + parseInt(prestasi.peratus_sebenar) 
                    peratus_kumulatif_jadual = peratus_kumulatif_jadual + parseInt(prestasi.peratus_jadual) 
                }

            prestasi.media.forEach(media => {
                if (media.collection_name == 'eot') {
                    eotFilename = media.file_name
                }

                if (media.collection_name == 'sp') {
                    spFilename = media.file_name
                }
            })

            $.each(deliverables, function(key, item) {
                selected = ''
                if (item.code == prestasi.deliverable) {
                    selected = 'selected'
                }
                // json_value = JSON.parse(item.json_value)

                if (item.is_heading == 0) {
                    deliverableOptions = deliverableOptions + '<option value="' + item
                        .code +
                        '" ' + selected +
                        '>' +
                        item.value + '</option>'
                } else {
                    deliverableOptions = deliverableOptions + '<option value="' + item
                        .code +
                        '" disabled style="font-weight: bold;">' +
                        item.value + '</option>'
                }
            })

            let emailOptions = ''
            $.each(emails, function(key, item) {
                selected = ''
                if (item.value == prestasi.emel) {
                    selected = 'selected'
                }
                emailOptions = emailOptions + '<option class="rbtnBulanan" value="' + item.value + '" ' +
                    selected +
                    '>' +
                    item.name + '</option>'
            })
            
            // let statusPelaksanaanOptions = ''
            // $.each(statuses, function(key, item) {
            //     console.log(key,item);
            //     selected = ''
            //     if (item.value == prestasi.status_pelaksanaan) {
            //         selected = 'selected'
            //     }
            //     statusPelaksanaanOptions = statusPelaksanaanOptions + '<option value="' +
            //         item
            //         .value + '" ' + selected +
            //         '>' +
            //         item.name + '</option>'
            // })
            
            let keputusanOptions = ''
            $.each(['Lulus', 'Gagal'], function(key, item) {
                selected = ''
                if (item == prestasi.keputusan) {
                    selected = 'selected'
                }
                keputusanOptions = keputusanOptions + '<option value="' + item +
                    '" ' + selected +
                    '>' +
                    item + '</option>'
            })

            switch (prestasi.status_pelaksanaan) {
                    case 'IJ':
                        pelaksanaanClass = 'status_pelaksanaan_green'
                        masalah_button = ''
                        break;

                    case 'DJ':
                        pelaksanaanClass = 'status_pelaksanaan_purple'
                        masalah_button = ''
                        break;

                    case 'LJ':
                        pelaksanaanClass = 'status_pelaksanaan_yellow'
                        break;

                    case 'S':
                        pelaksanaanClass = 'status_pelaksanaan_red'
                        break;

                    default:
                        pelaksanaanClass = ''
                        break;
                }

                if(mainPrestasiCounter == 1) {
                    remove_button = ''
                }

                if(prestasi.is_gagal_row == '1') {
                    prestasiTahun = ''
                    prestasiBulan = ''
                    mainPrestasiCounterDisplay = ''
                    gagalReadonly = 'readonly'
                    gagalDisable = 'disabled'
                }else {
                    prestasiTahun = prestasi.tahun
                    prestasiBulan = prestasi.bulan
                    mainPrestasiCounterDisplay = oldPrestasiCounter
                    gagalReadonly = ''
                    gagalDisable = 'disabled'
                }
            
            rowTemplate = `<tr  class="Table_perunding_body rbtnBulanan prestasiHistoryrow">
                                <td scope="row">
                                    ` + mainPrestasiCounterDisplay + `
                                </td>
                                <!-- <td scope="row">
                                    <img
                                        src="{{ asset('assets/images/arroew_up.png') }}" />
                                </td> -->
                                <td>` + prestasiTahun + `</td>
                                <td>` + prestasiBulan + `</td>
                                <td>
                                    <select name="" id="" disabled
                                        class="form-control rbtnBulanan">
                                        ` + deliverableOptions + `
                                    </select>
                                </td>
                                <td>
                                <button type="button" class="masalah_perunding rbtnBulanan spMuatNaik btn btn text-white" style="background-color: #6C757D;" id="spMuatNaik" disabled>
                                    ` + spFilename + ` 
                                </button>
                                </td>
                                <td>
                                    <select name="" id="" class="form-control rbtnBulanan" disabled>
                                        ` + emailOptions + `
                                    </select>
                                </td>
                                <td>
                                    <input style="max-width:80%" type="date" class="form-control rbtnBulanan" id="tarikhMulaJadual" readonly
                                        value="` + prestasi.tarikh_mula_jadual + `" />
                                </td>
                                <td>
                                    <input style="max-width:80%" type="date" class="form-control rbtnBulanan" id="tarikhMulaSebenar" readonly
                                        value="` + prestasi.tarikh_mula_sebenar + `" />
                                </td>
                                <td>
                                    <input style="max-width:80%" type="date" class="form-control rbtnBulanan" id="tarikhSiapJadual" readonly
                                        value="` + prestasi.tarikh_siap_jadual + `" />
                                </td>
                                <td>
                                    <input style="max-width:80%" type="date" class="form-control rbtnBulanan" id="tarikhSiapSebenar" readonly
                                        value="` + prestasi.tarikh_siap_sebenar + `" />
                                </td>
                                
                                <td>
                                    <input style="max-width:50%;color: #FF0000;" type="text" class="form-control rbtnBulanan" id="hariLewat" readonly 
                                    value="` + prestasi.hari_lewat_awal + `" />
                                </td>
                                <td>
                                    <input style="max-width:50%" type="text" class="form-control rbtnBulanan" id="peratusJadual" readonly
                                        value="` + prestasi.peratus_jadual + `" placeholder="10%"/>
                                </td>
                                <td>
                                    <input style="max-width:50%" type="text" class="form-control rbtnBulanan" id="peratusKumulatifJadual" readonly
                                        value="` + peratus_kumulatif_jadual + `" placeholder="10%"/>
                                </td>
                                <td><input style="max-width:50%" type="text" class="form-control rbtnBulanan" id="peratusSebenar" readonly
                                        value="` + prestasi.peratus_sebenar + `" placeholder="10%"/>
                                </td>
                                <td><input style="max-width:50%" type="text" class="form-control rbtnBulanan" id="peratusKumulatifSebenar" readonly
                                        value="` + peratus_kumulatif_sebenar + `" placeholder="10%"/>
                                </td>

                                <td>
                                <input type="text" class="` + pelaksanaanClass + ` rbtnBulanan statusPelaksanaan" id="statusPelaksanaan"
                                    value="` + prestasi.status_pelaksanaan + `" readonly/>
                               
                                </td>
                                <td>
                                    <button  type="button" onClick="loadMasalahData(` + prestasi.id + `)"
                                        class="masalah_perunding rbtnBulanan btn btn text-white" style="background-color: #6C757D;" disabled>
                                        <img
                                            src="{{ asset('assets/images/add_plus.png') }}" />&nbsp;Masalah
                                    </button>
                                </td>
                                <td>
                                    <input type="date" class="form-control rbtnBulanan" id="tarikhMesyuarat" readonly style="max-width: 60%;" value="` + prestasi.tarikh_mesyuarat + `" />
                                </td>
                                <td>
                                    <select class="form-control rbtnBulanan" name="" disabled
                                        id="">
                                        ` + keputusanOptions + `
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control rbtnBulanan" id="penilaian" readonly
                                        value="` + prestasi.penilaian + `" readonly/>
                                </td>
                                <td>
                                    <input type="date" class="form-control rbtnBulanan" style="max-width: 90%;" id="EOT" readonly
                                        value="` + prestasi.EOT + `" />
                                </td>
                                <td>
                                <button type="button" class="masalah_perunding rbtnBulanan eotMuatNaik btn btn text-white" style="background-color: #6C757D;" id="eotMuatNaik" disabled>
                                    ` + eotFilename + `
                                </button>
                                </td>

                                <td>
                                    <input type="date" class="form-control rbtnBulanan" style="max-width: 95%;" id="tarikhLadMula" readonly
                                        value="` + prestasi.tarikh_lad_mula + `" />
                                </td>
                                <td>
                                    <input type="date" class="form-control rbtnBulanan" style="max-width: 95%;" id="tarikhLadTamat" readonly
                                        value="` + prestasi.tarikh_lad_tamat + `" />
                                </td>
                                <td>
                                    <input type="text" style="max-width: 30%;" class="form-control rbtnBulanan" id="bilanganHariLad" readonly
                                        value="` + prestasi.bilangan_hari_lad + `" />
                                </td>
                                <td>
                                    <input style="max-width: 60%;" type="text" class="form-control rbtnBulanan" id="jumlahLad" readonly
                                        value="` + prestasi.jumlah_lad_terkumpul + `" readonly/>
                                </td>
                                <td>
                                    <input type="date" class="form-control rbtnBulanan" style="max-width: 80%;" id="tarikhKemaskini" readonly
                                        value="` + prestasi.tarikh_kemaskini + `" />
                                </td>
                                <input type="hidden" value="` + prestasi.version_no + `" id="version"/>
                                <input type="hidden" value="` + prestasi.id + `" id="id"/>
                            </tr>`

            tbody = '#' + tbodyName
            $(tbody).append(rowTemplate);
        })
    })

  


}

function switchToggle(toggleId){

    // checkCollapsed=$("#toggleBnt"+toggleId+"").removeClass("collapsed")
    // console.log(checkCollapsed)
    // var interval=setInterval(toggle,2000);

    //     function toggle(){
    //         checkShow=$("#flush-"+toggleId+"").hasClass("show")
    //         checkCollapse=$("#flush-"+toggleId+"").hasClass("collapse")
    //         console.log(checkCollapse)
    //         if(checkShow && checkCollapse){
    //             clearInterval(interval);
    //         }else{
    //             clearInterval(interval);
    //             $("#flush-"+toggleId+"").removeClass("show")
    //         }
    //     }  
    var checkShow=$("#flush-"+toggleId+"").hasClass("hidden")
            // console.log(checkShow)
        if(checkShow){
                $("#flush-"+toggleId+"").addClass("show")
                $("#flush-"+toggleId+"").addClass("display")
                $("#flush-"+toggleId+"").removeClass("hidden")
                $("#flush-"+toggleId+"").removeClass("d-none")
        }else{
                $("#flush-"+toggleId+"").removeClass("show")
                $("#flush-"+toggleId+"").removeClass("display")
                $("#flush-"+toggleId+"").addClass("hidden")
                $("#flush-"+toggleId+"").addClass("d-none")
        }

}



</script>