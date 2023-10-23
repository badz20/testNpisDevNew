<script>

    async function loadTuntutanData(tuntutanData)
    {
        document.getElementById('tuntutanFinalJumLan').value = tuntutanData.jumlah
        document.getElementById('tuntutanFinalRMKJumLan').value = tuntutanData.jumlah_RMK

        if(tuntutanData.belanja_tuntutan) {
            document.getElementById('text1T0').value = tuntutanData.belanja_tuntutan.anggaran_perjalanan
            document.getElementById('text2T0').value = tuntutanData.belanja_tuntutan.mesyuarat_tapak
            document.getElementById('text3T0').value = tuntutanData.belanja_tuntutan.mesyuarat_teknikal
            document.getElementById('text4T0').value = tuntutanData.belanja_tuntutan.mesyuarat_pemantauan
            document.getElementById('text5T0').value = tuntutanData.belanja_tuntutan.mesyuarat_kemajuan_perunding

            document.getElementById('text2T1').value = tuntutanData.belanja_tuntutan.mesyuarat_tapak
            document.getElementById('text3T1').value = tuntutanData.belanja_tuntutan.mesyuarat_teknikal
            document.getElementById('text4T1').value = tuntutanData.belanja_tuntutan.mesyuarat_pemantauan
            document.getElementById('text5T1').value = tuntutanData.belanja_tuntutan.mesyuarat_kemajuan_perunding
        }
        

        
        $years = getYears(tuntutanData.project.tahun_jangka_mula, tuntutanData.project.tahun_jangka_siap)

        
        for (let index = 0; index < $years.length; index++) {
            temp = `yr_` + (parseInt(index) + 1)
            document.getElementById('strmjumlah_'+index).value = tuntutanData[temp] 
        }

        rowSpanCounter = rowSpanCounter + 3
        await tuntutanData.belanja_details.forEach(async recordDetails => {
            await loadTuntutanDetails(recordDetails,$years)
            
            if(tuntutanASubRowCounter == 0) {
                rowSpanCounter = rowSpanCounter + 1
                newRow = getSubRowTemplate('A')
                laterRow = document.getElementById('trMainA')
                laterRow.insertAdjacentHTML('afterend', newRow);
                const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubA"+tuntutanASubRowCounter);
                const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubA"+tuntutanASubRowCounter);
                const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubA"+tuntutanASubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subA')
            }

            if(tuntutanBSubRowCounter == 0) {
                rowSpanCounter = rowSpanCounter + 1
                newRow = getSubRowTemplate('B')
                laterRow = document.getElementById('trMainB')
                laterRow.insertAdjacentHTML('afterend', newRow);
                const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubB"+tuntutanBSubRowCounter);
                const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubB"+tuntutanBSubRowCounter);
                const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubB"+tuntutanBSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subB')
            }

            if(tuntutanCSubRowCounter == 0) {
                rowSpanCounter = rowSpanCounter + 1
                newRow = getSubRowTemplate('C')
                laterRow = document.getElementById('trMainC')
                laterRow.insertAdjacentHTML('afterend', newRow);
                const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubC"+tuntutanCSubRowCounter);
                const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubC"+tuntutanCSubRowCounter);
                const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubC"+tuntutanCSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subC')
            }

            prestasi1Element = document.getElementById('peratus1TuntutanTD') 
            prestasi2Element = document.getElementById('peratus2TuntutanTD')
            prestasi1Element.rowSpan = rowSpanCounter;
            prestasi2Element.rowSpan = rowSpanCounter;
            // document.getElementById('peratus1tuntutan').value = tuntutanData.peratus
            // document.getElementById('peratus2tuntutan').value = tuntutanData.peratus_RMK
        })
    }

    function initializeRowTable()
    {
            if(tuntutanASubRowCounter == 0) {
                rowSpanCounter = rowSpanCounter + 1
                newRow = getSubRowTemplate('A')
                laterRow = document.getElementById('trMainA')
                laterRow.insertAdjacentHTML('afterend', newRow);
                const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubA"+tuntutanASubRowCounter);
                const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubA"+tuntutanASubRowCounter);
                const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubA"+tuntutanASubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subA')
            }

            if(tuntutanBSubRowCounter == 0) {
                rowSpanCounter = rowSpanCounter + 1
                newRow = getSubRowTemplate('B')
                laterRow = document.getElementById('trMainB')
                laterRow.insertAdjacentHTML('afterend', newRow);
                const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubB"+tuntutanBSubRowCounter);
                const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubB"+tuntutanBSubRowCounter);
                const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubB"+tuntutanBSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subB')
            }

            if(tuntutanCSubRowCounter == 0) {
                rowSpanCounter = rowSpanCounter + 1
                newRow = getSubRowTemplate('C')
                laterRow = document.getElementById('trMainC')
                laterRow.insertAdjacentHTML('afterend', newRow);
                const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubC"+tuntutanCSubRowCounter);
                const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubC"+tuntutanCSubRowCounter);
                const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubC"+tuntutanCSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                        updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subC')
            }

            prestasi1Element = document.getElementById('peratus1TuntutanTD') 
            prestasi2Element = document.getElementById('peratus2TuntutanTD')
            prestasi1Element.rowSpan = rowSpanCounter;
            prestasi2Element.rowSpan = rowSpanCounter;
    }

    async function loadTuntutanDetails(recordDetails,$years)
    {
        rowSpanCounter = rowSpanCounter + 1
        totalTuntutanCounter = totalTuntutanCounter + 1
        var type = recordDetails.type.substring(0, 4);
        typeId = ''
        backgroud_color = ''

        switch (type) {
            case 'subA':
                tuntutanASubRowCounter = tuntutanASubRowCounter + 1
                typeId = 'subA' + tuntutanASubRowCounter
                firstColumn = `<select
                            type="text"
                            value=""
                            style="font-weight: 500;"
                            class="form-control text-nowrap col-8 ml-4"
                            id="subRowInput${typeId}"
                            >
                            <option value="">-- Pilih --</option>
                            <option value="GRED 54">GRED 54</option>
                            <option value="GRED 44">GRED 44</option>
                            
                        </select>`
                backgroud_color = 'white'
                newRow = getSubRowData(recordDetails,typeId,backgroud_color,firstColumn)
                if(tuntutanASubRowCounter == 1) {
                    closestRow = document.getElementById('trMainA')
                    closestRow.insertAdjacentHTML('afterend', newRow);
                }else {
                    laterRow = document.getElementById('subA' + (tuntutanASubRowCounter - 1))
                    laterRow.insertAdjacentHTML('afterend', newRow);
                    // laterRow.after(newRow);
                }

                for (let index = 0; index < $years.length; index++) {
                    temp = `yr_` + (parseInt(index) + 1)
                    document.getElementById('strm'+typeId+'_'+index).value = recordDetails[temp] 
                }
                document.getElementById('jumlah1RMKMesyuarat'+typeId).value = recordDetails.jumlahRMK
                document.getElementById('subRowInput'+typeId).value = recordDetails.text
                nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubA"+tuntutanASubRowCounter);
                RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubA"+tuntutanASubRowCounter);
                jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubA"+tuntutanASubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subA')
                break;

            case 'subB':
                tuntutanBSubRowCounter = tuntutanBSubRowCounter + 1
                typeId = 'subB' + tuntutanBSubRowCounter
                firstColumn = `<select
                            type="text"
                            value=""
                            style="font-weight: 500;"
                            class="form-control text-nowrap col-8 ml-4"
                            id="subRowInput${typeId}"
                            >
                            <option value="">-- Pilih --</option>
                            <option value="GRED 54">GRED 54</option>
                            <option value="GRED 44">GRED 44</option>
                            
                        </select>`
                backgroud_color = 'white'
                newRow = getSubRowData(recordDetails,typeId,backgroud_color,firstColumn)
                if(tuntutanASubRowCounter == 1) {
                    closestRow = document.getElementById('trMainB')
                    closestRow.insertAdjacentHTML('afterend', newRow);
                }else {
                    laterRow = document.getElementById('subB' + (tuntutanBSubRowCounter - 1))
                    laterRow.insertAdjacentHTML('afterend', newRow);
                    // laterRow.after(newRow);
                }

                for (let index = 0; index < $years.length; index++) {
                    temp = `yr_` + (parseInt(index) + 1)
                    document.getElementById('strm'+typeId+'_'+index).value = recordDetails[temp] 
                }
                document.getElementById('jumlah1RMKMesyuarat'+typeId).value = recordDetails.jumlahRMK
                document.getElementById('subRowInput'+typeId).value = recordDetails.text

                nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubB"+tuntutanBSubRowCounter);
                RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubB"+tuntutanBSubRowCounter);
                jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubB"+tuntutanBSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subB')
                break;

            case 'subC':
                tuntutanCSubRowCounter = tuntutanCSubRowCounter + 1
                typeId = 'subC' + tuntutanCSubRowCounter
                firstColumn = `<select
                            type="text"
                            value=""
                            style="font-weight: 500;"
                            class="form-control text-nowrap col-8 ml-4"
                            id="subRowInput${typeId}"
                            >
                            <option value="">-- Pilih --</option>
                            <option value="GRED 54">GRED 54</option>
                            <option value="GRED 44">GRED 44</option>
                            
                        </select>`
                backgroud_color = 'white'
                newRow = getSubRowData(recordDetails,typeId,backgroud_color,firstColumn)
                if(tuntutanCSubRowCounter == 1) {
                    closestRow = document.getElementById('trMainC')
                    closestRow.insertAdjacentHTML('afterend', newRow);
                }else {
                    laterRow = document.getElementById('subC' + (tuntutanCSubRowCounter - 1))
                    laterRow.insertAdjacentHTML('afterend', newRow);
                    // laterRow.after(newRow);
                }

                for (let index = 0; index < $years.length; index++) {
                    temp = `yr_` + (parseInt(index) + 1)
                    document.getElementById('strm'+typeId+'_'+index).value = recordDetails[temp] 
                }
                document.getElementById('jumlah1RMKMesyuarat'+typeId).value = recordDetails.jumlahRMK
                document.getElementById('subRowInput'+typeId).value = recordDetails.text
                nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubC"+tuntutanCSubRowCounter);
                RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubC"+tuntutanCSubRowCounter);
                jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubC"+tuntutanCSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subC')
                break;

            case 'subD':
                tuntutanDSubRowCounter = tuntutanDSubRowCounter + 1
                typeId = 'subD' + tuntutanDSubRowCounter
                firstColumn = `<input type="text" class="form-control subRowInput${typeId}" name="subRowInput${typeId}" id="subRowInput${typeId}" value="">`
                backgroud_color = 'white'
                newRow = getSubRowData(recordDetails,typeId,backgroud_color,firstColumn)
                if(tuntutanDSubRowCounter == 1) {
                    closestRow = document.getElementById('trMainD')
                    closestRow.insertAdjacentHTML('afterend', newRow);
                }else {
                    laterRow = document.getElementById('subD' + (tuntutanDSubRowCounter - 1))
                    laterRow.insertAdjacentHTML('afterend', newRow);
                    // laterRow.after(newRow);
                }

                for (let index = 0; index < $years.length; index++) {
                    temp = `yr_` + (parseInt(index) + 1)
                    document.getElementById('strm'+typeId+'_'+index).value = recordDetails[temp] 
                }
                document.getElementById('jumlah1RMKMesyuarat'+typeId).value = recordDetails.jumlahRMK
                document.getElementById('subRowInput'+typeId).value = recordDetails.text
                nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubD"+tuntutanDSubRowCounter);
                RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubD"+tuntutanDSubRowCounter);
                jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubD"+tuntutanDSubRowCounter);

                //   Add change event listeners to the input elements
                nilaiMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subD',tuntutanDSubRowCounter);
                });

                RMMesyuaratTuntutan.addEventListener("input", function() {
                    updateJumlah1MesyuaratTuntutan('subD',tuntutanDSubRowCounter);
                });

                assignEventListenerForSillingTuntutan($years,'subD')
                break;
        
            default:
                break;
        }

        prestasi1Element = document.getElementById('peratus1TuntutanTD') 
        prestasi2Element = document.getElementById('peratus2TuntutanTD')
        prestasi1Element.rowSpan = rowSpanCounter;
        prestasi2Element.rowSpan = rowSpanCounter;
    }

    function getSubRowData(recordDetails,typeId,backgroud_color,firstColumn) {
        if(totalTuntutanCounter == 1) {
            newRow = `<tr id=${typeId}>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                  <div class="d-flex" >
                  ${firstColumn}
                    <button type='button' class="ml-auto removeSubMainRowButton" onclick="removeRow('${typeId}')"">
                        <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                    </button>
                    </div>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control nilaiMesyuarat${typeId}" name="nilaiMesyuarat${typeId}" id="nilaiMesyuarat${typeId}" value="${recordDetails.nilai1}">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control unitMesyuarat${typeId}" name="unitMesyuarat${typeId}" id="unitMesyuarat${typeId}" value="Set" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control RMMesyuarat${typeId}" name="RMMesyuarat${typeId}" id="RMMesyuarat${typeId}" value="${recordDetails.rm}">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control kadarMesyuarat${typeId}" name="kadarMesyuarat${typeId}" id="kadarMesyuarat${typeId}" value="Kadar Unit" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control jumlah1Mesyuarat${typeId}" name="jumlah1Mesyuarat${typeId}" id="jumlah1Mesyuarat${typeId}" value="${recordDetails.jumlah}" readonly>
                  </td>
                  <td rowspan="1" id="peratus1TuntutanTD" >
                    <input type="text" class="form-control peratus1Tuntutan" name="peratus1Tuntutan" id="peratus1Tuntutan" value="${recordDetails.nilai1}" readonly>
                  </td>
                  `+getSillingColumnTuntutan(typeId,$years,totalTuntutanCounter)+`
                    <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                      <input type="text" class="form-control jumlah1RMKMesyuarat${typeId}" name="jumlah1RMKMesyuarat${typeId}" id="jumlah1RMKMesyuarat${typeId}" value="${recordDetails.jumlahRMK}" readonly>
                    </td>
                    <td rowspan="1" id="peratus2TuntutanTD">
                    <input type="text" class="form-control peratus2Tuntutan" name="peratus2Tuntutan" id="peratus2Tuntutan" value="0" readonly>
                  </td>
                  
                </tr>` 
        }else {
            newRow = `<tr id=${typeId}>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                  <div class="d-flex" >
                  ${firstColumn}
                    <button type='button' class="ml-auto removeSubMainRowButton" onclick="removeRow('${typeId}')"">
                        <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                    </button>
                    </div>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control nilaiMesyuarat${typeId}" name="nilaiMesyuarat${typeId}" id="nilaiMesyuarat${typeId}" value="${recordDetails.nilai1}">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control unitMesyuarat${typeId}" name="unitMesyuarat${typeId}" id="unitMesyuarat${typeId}" value="Set" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control RMMesyuarat${typeId}" name="RMMesyuarat${typeId}" id="RMMesyuarat${typeId}" value="${recordDetails.rm}">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control kadarMesyuarat${typeId}" name="kadarMesyuarat${typeId}" id="kadarMesyuarat${typeId}" value="Kadar Unit" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control jumlah1Mesyuarat${typeId}" name="jumlah1Mesyuarat${typeId}" id="jumlah1Mesyuarat${typeId}" value="${recordDetails.jumlah}" readonly>
                  </td>
                  `+getSillingColumnTuntutan(typeId,$years,totalTuntutanCounter)+`
                    <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                      <input type="text" class="form-control jumlah1RMKMesyuarat${typeId}" name="jumlah1RMKMesyuarat${typeId}" id="jumlah1RMKMesyuarat${typeId}" value="${recordDetails.jumlahRMK}" readonly>
                    </td>
                </tr>` 
        }
        return newRow
    }

    async function tuntutanRow(projectData) {
        const tableBody = document.getElementById("tableBody");
        $years = getYears(projectData.tahun_jangka_mula, projectData.tahun_jangka_siap)

        // mainheadcolspan = 12 + $years.length
        mainheadcolspan = 1
        headingRow = `<tr style="background-color:white" class="col-12">
                    <td colspan="`+mainheadcolspan+`" style="border-right-color:white"> 3. TUNTUTAN PERJALANAN</br></br>
                    Anggaran Perjalanan = 1. Mesyuarat Tapak + 2. Mesyuarat Teknikal + 3. Mesyuarat Pemantauan + 4. Mesyuarat Kemajuan Perunding   </br></br>
                    1. Mesyuarat Tapak: <input type="text" id="text2T1" style="width:30px;border:none" readonly> kali Mesyuarat Tapak dilaksanakan </br>(setiap bulan) </br></br>
                    2. Mesyuarat Teknikal: <input type="text" id="text3T1" style="width:30px;border:none" readonly> kali Mesyuarat Teknikal dilaksanakan </br>(Sekali setiap dua bulan) </br></br>
                    3. Mesyuarat Pemantauan: <input type="text" id="text4T1" style="width:30px;border:none" readonly> kali Mesyuarat Pemantauan </br>dilaksanakan (2 kali setahun) </br></br>
                    4. Mesyuarat Kemajuan Perunding: <input type="text" id="text5T1" style="width:30px;border:none" readonly> kali Mesyuarat Kemajuan </br>Perunding dilaksanakan (mengikut peringkat rekabentuk) </br></br>

                    </td>
                    <td style="border-right-color:white;border-left-color:white">
                        </br>
                        <input type="text" class="form-control text1T0 inline-input ml-5" name="text1T0" id="text1T0" value="0" style="width:50px" readonly>
                        </br></br>
                        <input type="text" class="form-control text2T0 inline-input ml-5" name="text2T0" id="text2T0" value="0" style="width:50px" >
                        </br></br>
                        <input type="text" class="form-control text3T0 inline-input ml-5" name="text3T0" id="text3T0" value="0" style="width:50px" >
                        </br></br>
                        <input type="text" class="form-control text4T0 inline-input ml-5" name="text4T0" id="text4T0" value="0" style="width:50px" >
                        </br></br>
                        <input type="text" class="form-control text5T0 inline-input ml-5" name="text5T0" id="text5T0" value="0" style="width:50px" >
                        
                    </td>
                    </tr>`

        $('#tableBody').append(headingRow);

        
        const text1T0Element = document.getElementById(`text1T0`);
        const text2T0Element = document.getElementById(`text2T0`);
        const text3T0Element = document.getElementById(`text3T0`);
        const text4T0Element = document.getElementById(`text4T0`);
        const text5T0Element = document.getElementById(`text5T0`);

        text2T0Element.addEventListener('input', function() {
            document.getElementById(`text2T1`).value = text2T0Element.value
            text1T0Element.value = parseFloat(text2T0Element.value) + parseFloat(text3T0Element.value) + parseFloat(text4T0Element.value) + parseFloat(text5T0Element.value) 
        });

        text3T0Element.addEventListener('input', function() {
            document.getElementById(`text3T1`).value = text3T0Element.value
            text1T0Element.value = parseFloat(text2T0Element.value) + parseFloat(text3T0Element.value) + parseFloat(text4T0Element.value)  + parseFloat(text5T0Element.value) 
        });

        text4T0Element.addEventListener('input', function() {
            document.getElementById(`text4T1`).value = text4T0Element.value
            text1T0Element.value = parseFloat(text2T0Element.value) + parseFloat(text3T0Element.value) + parseFloat(text4T0Element.value)  + parseFloat(text5T0Element.value) 
        });

        text5T0Element.addEventListener('input', function() {
            document.getElementById(`text5T1`).value = text5T0Element.value
            text1T0Element.value = parseFloat(text2T0Element.value) + parseFloat(text3T0Element.value) + parseFloat(text4T0Element.value)  + parseFloat(text5T0Element.value) 
        });

        await firstRowTuntutan()
        await secondRowTuntutan()
        await thirdRowTuntutan()
        await fourthRowTuntutan()
        await fifthRowTuntutan()


        document.getElementById('firstTdColspan').colSpan = $years.length + 10
        document.getElementById('secondTdColspan').colSpan = $years.length
        document.getElementById('thirdTdColspan').colSpan = $years.length
        document.getElementById('fourthTdColspan').colSpan = $years.length
        

        // await fifthRowTuntutan()
        // await sixthRowTuntutan()
        // await seventhRowTuntutan()
        // await eigthRowTuntutan()
        // await nineRowTuntutan()
        // await tenRowTuntutan()

        // const sillingspan = document.getElementById('belanjaSillingspan')
        // const tahunspan = document.getElementById('belanjaTahunspan')
        // sillingspan.colSpan = $years.length;
        // tahunspan.colSpan = $years.length;

        // jumlahRowTuntutan()
        // assignEventListenerForSillingTuntutan($years)

    }

    function firstRowTuntutan() {
        Row = `<tr id="trMainA">
                  <td colspan="" style="background-color :rgba(0,0,0,.05);">
                    a. Bayaran Tambang Perjalanan Pergi Balik (Tiket Kapal </br>Terbang/ Kenderaan) 
                    <button type="button" class="ml-auto addsubMainRowABtn" >
                            <i class="ri-add-box-line ri-2x"></i>
                    </button>
                  </td>
                  <td colspan="1" id="firstTdColspan" style="background-color :rgba(0,0,0,.05);">
                  </td>`

        $('#tableBody').append(Row);
    }

    function secondRowTuntutan() {
        Row = `<tr id="trMainB">
                  <td colspan="" style="background-color :rgba(0,0,0,.05);">
                    b. Bayaran Sewa Hotel</br>Hotel 1 malam untuk 1 orang
                    <button type="button" class="ml-auto addsubMainRowBBtn">
                            <i class="ri-add-box-line ri-2x"></i>
                    </button>
                  </td>
                  <td colspan="7" style="background-color :rgba(0,0,0,.05);">
                  </td>
                  <td colspan="1" id="secondTdColspan" style="background-color :rgba(0,0,0,.05);">
                  </td>
                  <td  style="background-color :rgba(0,0,0,.05);">
                  </td>`

        $('#tableBody').append(Row);
    }

    function thirdRowTuntutan() {
        Row = `<tr id="trMainC">
                  <td colspan="" style="background-color :rgba(0,0,0,.05);">
                    c. Elaun Makan
                    <button type="button" class="ml-auto addsubMainRowCBtn">
                            <i class="ri-add-box-line ri-2x"></i>
                    </button>
                  </td>
                  <td colspan="7" style="background-color :rgba(0,0,0,.05);">
                  </td>
                  <td colspan="1" id="thirdTdColspan" style="background-color :rgba(0,0,0,.05);">
                  </td>
                  <td  style="background-color :rgba(0,0,0,.05);" >
                  </td>`

        $('#tableBody').append(Row);
    }

    function fourthRowTuntutan() {
        Row = `<tr id="trMainD">
                  <td style="background-color :rgba(0,0,0,.05);" >
                    d. Lain-lain
                    <button type="button" class="ml-auto addsubMainRowDBtn">
                            <i class="ri-add-box-line ri-2x"></i>
                    </button>
                  </td>
                  <td colspan="7" style="background-color :rgba(0,0,0,.05);" >
                  </td>
                  <td colspan="1" id="fourthTdColspan" style="background-color :rgba(0,0,0,.05);">
                  </td>
                  <td  style="background-color :rgba(0,0,0,.05);">
                  </td>`

        $('#tableBody').append(Row);
    }

    function fifthRowTuntutan() {
        Row = `<tr style="background-color:#39afd1;">
            <td colspan="7" class="text-white text-right JumLanja">
                                    JUMLAH (RM)
                                    </td>    
                                    <td><input type="text" class="form-control tuntutanFinalJumLan" name="tuntutanFinalJumLan" id="tuntutanFinalJumLan" value="0" readonly></td>
                                    <td></td>
                                    `+getSillingColumnTuntutan('jumlah',$years,0)+`
                                    <td><input type="text" class="form-control tuntutanFinalRMKJumLan" name="tuntutanFinalRMKJumLan" id="tuntutanFinalRMKJumLan" value="0" readonly></td>
        </tr>`;

        $('#tableBody').append(Row);
    }

    function getSillingColumnTuntutan(type,$years,rowNo){
        sillingTd = ''
        for (let index = 0; index < $years.length; index++) {
        template = `<td style="background-color :white;border-bottom-color:white">
                        <input type="text" class="form-control strm${type}_${index}" name="strm${type}_${index}" id="strm${type}_${index}" value="0">
                    </td>`

        sillingTd = sillingTd + template         
        }

        return sillingTd
    }

    function assignEventListenerForSillingTuntutan($years,type) {
    // Attach event listeners to the input elements

        switch (type) {
            case 'subA':
                counter = tuntutanASubRowCounter
                break;
        
            case 'subB':
                counter = tuntutanBSubRowCounter
                break;

            case 'subC':
                counter = tuntutanCSubRowCounter
                break;
            case 'subD':
                counter = tuntutanDSubRowCounter
                break;
            default:
                break;
        }

        for (let rowNo = 1; rowNo <= counter; rowNo++) {
            for (let index = 0; index < $years.length; index++) {
                const inputElement = document.getElementById(`strm${type}${counter}_${index}`);        
                inputElement.addEventListener('input', function() {
                    calculateTuntutan($years,type); 
                });
            }
        }
    
    }

  function calculateTuntutan($years,type) {

    switch (type) {
        case 'subA':
            counter = tuntutanASubRowCounter
            break;
    
        case 'subB':
            counter = tuntutanBSubRowCounter
            break;

        case 'subC':
            counter = tuntutanCSubRowCounter
            break;
        case 'subD':
            counter = tuntutanDSubRowCounter
            break;
        default:
            counter = 0
            break;
    }

    for (let index = 1; index <= counter; index++) {
      rowSum = 0
      for (let indexj = 0 ;indexj <= $years.length; indexj++) {
        const inputRowElement = document.getElementById(`strm${type}${index}_${indexj}`);
        if(inputRowElement) {
          rowSum = parseFloat(inputRowElement.value ) + parseFloat(rowSum) 
        }
      }

      //calculate colum sum
      for (let indexj = 0; indexj <= $years.length; indexj++) {
        columnSum = 0
        for (let index = 1; index <= tuntutanASubRowCounter; index++) {
            const inputAColumnElement = document.getElementById(`strmsubA${index}_${indexj}`);
            if(inputAColumnElement) {
                columnSum = parseFloat(inputAColumnElement.value ) + parseFloat(columnSum)
            }
        }

        for (let index = 1; index <= tuntutanBSubRowCounter; index++) {
            const inputBColumnElement = document.getElementById(`strmsubB${index}_${indexj}`);
            if(inputBColumnElement) {
                columnSum = parseFloat(inputBColumnElement.value ) + parseFloat(columnSum)
            }
        }

        for (let index = 1; index <= tuntutanCSubRowCounter; index++) {
            const inputCColumnElement = document.getElementById(`strmsubC${index}_${indexj}`);
            if(inputCColumnElement) {
                columnSum = parseFloat(inputCColumnElement.value ) + parseFloat(columnSum)
            }
        }

        for (let index = 1; index <= tuntutanDSubRowCounter; index++) {
            const inputDColumnElement = document.getElementById(`strmsubD${index}_${indexj}`);
            if(inputDColumnElement) {
                columnSum = parseFloat(inputDColumnElement.value ) + parseFloat(columnSum)
            }
        }

        
        const jumlahColumnElement = document.getElementById(`strmjumlah_${indexj}`);
        if(jumlahColumnElement) {
            jumlahColumnElement.value = columnSum.toFixed(2)
        }
      
      }

      const jumlahRMKElementTuntuan = document.getElementById(`jumlah1RMKMesyuarat${type}${index}`);
      jumlahRMKElementTuntuan.value = rowSum.toFixed(2)
    }

    updateFinalJumalhTuntutan()
  }

  function getSubRowTemplate(type) {

    typeId = ''
    backgroud_color = ''
    
    switch (type) {
        case 'A':
            tuntutanASubRowCounter = tuntutanASubRowCounter + 1
            typeId = 'subA' + tuntutanASubRowCounter
            firstColumn = `<select
                        type="text"
                        value=""
                        style="font-weight: 500;"
                        class="form-control text-nowrap col-8 ml-4"
                        id="subRowInput${typeId}"
                        >
                        <option value="">-- Pilih --</option>
                        <option value="GRED 54">GRED 54</option>
                        <option value="GRED 44">GRED 44</option>
                        
                    </select>`
            backgroud_color = 'white'
            break;
        case 'B':
            tuntutanBSubRowCounter = tuntutanBSubRowCounter + 1
            typeId = 'subB' + tuntutanBSubRowCounter
            firstColumn = `<select
                        type="text"
                        value=""
                        style="font-weight: 500;"
                        class="form-control text-nowrap col-8 ml-4"
                        id="subRowInput${typeId}"
                        >
                        <option value="">-- Pilih --</option>
                        <option value="GRED 54">GRED 54</option>
                        <option value="GRED 44">GRED 44</option>
                        
                    </select>`
            backgroud_color = 'white'
            break;
        case 'C':
            tuntutanCSubRowCounter = tuntutanCSubRowCounter + 1
            typeId = 'subC' + tuntutanCSubRowCounter
            firstColumn = `<select
                        type="text"
                        value=""
                        style="font-weight: 500;"
                        class="form-control text-nowrap col-8 ml-4"
                        id="subRowInput${typeId}"
                        >
                        <option value="">-- Pilih --</option>
                        <option value="GRED 54">GRED 54</option>
                        <option value="GRED 44">GRED 44</option>
                        
                    </select>`
            backgroud_color = 'white'
            break;
        case 'D':
            tuntutanDSubRowCounter = tuntutanDSubRowCounter + 1
            typeId = 'subD' + tuntutanDSubRowCounter
            backgroud_color = 'white'
            firstColumn = `<input type="text" class="form-control subRowInput${typeId}" name="subRowInput${typeId}" id="subRowInput${typeId}" value="">`
            break;
        default:
            break;
    }

    
    
    if(totalTuntutanCounter == 0 ) {
            totalTuntutanCounter = totalTuntutanCounter + 1
            rowSpanCounter = rowSpanCounter + 1
            newRow = `<tr id=${typeId}>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                  <div class="d-flex" >
                  ${firstColumn}
                    <button type='button' class="ml-auto removeSubMainRowButton" onclick="removeRow('${typeId}')"">
                        <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                    </button>
                    </div>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control nilaiMesyuarat${typeId}" name="nilaiMesyuarat${typeId}" id="nilaiMesyuarat${typeId}" value="0">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control unitMesyuarat${typeId}" name="unitMesyuarat${typeId}" id="unitMesyuarat${typeId}" value="Set" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control RMMesyuarat${typeId}" name="RMMesyuarat${typeId}" id="RMMesyuarat${typeId}" value="0">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control kadarMesyuarat${typeId}" name="kadarMesyuarat${typeId}" id="kadarMesyuarat${typeId}" value="Kadar Unit" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control jumlah1Mesyuarat${typeId}" name="jumlah1Mesyuarat${typeId}" id="jumlah1Mesyuarat${typeId}" value="0" readonly>
                  </td>
                  <td rowspan="1" id="peratus1TuntutanTD" >
                    <input type="text" class="form-control peratus1Tuntutan" name="peratus1Tuntutan" id="peratus1Tuntutan" value="0" readonly>
                  </td>
                  `+getSillingColumnTuntutan(typeId,$years,totalTuntutanCounter)+`
                    <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                      <input type="text" class="form-control jumlah1RMKMesyuarat${typeId}" name="jumlah1RMKMesyuarat${typeId}" id="jumlah1RMKMesyuarat${typeId}" value="0" readonly>
                    </td>
                    <td rowspan="1" id="peratus2TuntutanTD">
                    <input type="text" class="form-control peratus2Tuntutan" name="peratus2Tuntutan" id="peratus2Tuntutan" value="0" readonly>
                  </td>
                  
                </tr>`            
        }else {
            totalTuntutanCounter = totalTuntutanCounter + 1
            rowSpanCounter = rowSpanCounter + 1
            newRow = `<tr id=${typeId}>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}" colspan="">
                  <div class="d-flex" >
                  ${firstColumn}
                    <button type='button' class="ml-auto removeSubMainRowButton" onclick="removeRow('${typeId}')"">
                        <i class="ri-checkbox-indeterminate-line ri-2x"></i>
                    </button>
                    </div>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control nilaiMesyuarat${typeId}" name="nilaiMesyuarat${typeId}" id="nilaiMesyuarat${typeId}" value="0">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control unitMesyuarat${typeId}" name="unitMesyuarat${typeId}" id="unitMesyuarat${typeId}" value="Set" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control RMMesyuarat${typeId}" name="RMMesyuarat${typeId}" id="RMMesyuarat${typeId}" value="0">
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control kadarMesyuarat${typeId}" name="kadarMesyuarat${typeId}" id="kadarMesyuarat${typeId}" value="Kadar Unit" readonly>
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    
                  </td>
                  <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                    <input type="text" class="form-control jumlah1Mesyuarat${typeId}" name="jumlah1Mesyuarat${typeId}" id="jumlah1Mesyuarat${typeId}" value="0" readonly>
                  </td>
                  `+getSillingColumnTuntutan(typeId,$years,totalTuntutanCounter)+`
                    <td style="background-color :${backgroud_color};border-bottom-color:${backgroud_color}">
                      <input type="text" class="form-control jumlah1RMKMesyuarat${typeId}" name="jumlah1RMKMesyuarat${typeId}" id="jumlah1RMKMesyuarat${typeId}" value="0" readonly>
                    </td>
                </tr>`

               
        }

        // nilaiMesyuarat.addEventListener("input", updateJumlah1MesyuaratDA);
        // RMMesyuarat.addEventListener("input", updateJumlah1MesyuaratDA);
        return newRow
  }

  function updateJumlah1MesyuaratTuntutan(typeId,index) {
    nilaiElement = document.getElementById("nilaiMesyuarat"+typeId+index)
    RMElement = document.getElementById("RMMesyuarat"+typeId+index)
    jumlah1MesyuaratElement = document.getElementById("jumlah1Mesyuarat"+typeId+index)
    const nilaiValue = parseFloat(nilaiElement.value);
    const RMValue = parseFloat(RMElement.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDA.value);
    jumlah1MesyuaratElement.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhTuntutan()
  }

  function removeRow(typeId) {

        var inputString = typeId;
        var prefix = inputString.substring(0, 4); // Get the first 4 characters ("subD")
        var restOfString = inputString.substring(4);
        var tr = document.getElementById(typeId);
        if (tr) {
            if(restOfString != 1) {
                tr.remove();
                rowSpanCounter = rowSpanCounter -1
                prestasi1Element = document.getElementById('peratus1TuntutanTD') 
                prestasi2Element = document.getElementById('peratus2TuntutanTD')
                prestasi1Element.rowSpan = rowSpanCounter;
                prestasi2Element.rowSpan = rowSpanCounter;
                switch (prefix) {
                    case 'subA':
                        tuntutanASubRowCounter = tuntutanASubRowCounter - 1
                        break;
                    case 'subB':
                        tuntutanBSubRowCounter = tuntutanBSubRowCounter - 1
                        break;
                    case 'subC':
                        tuntutanCSubRowCounter = tuntutanCSubRowCounter - 1
                        break;
                    case 'subD':
                        tuntutanDSubRowCounter = tuntutanDSubRowCounter - 1
                        break;
                    default:
                        break;
                }
            }else {
                if(prefix != 'subD') {
                    alert('minimum one row needed')
                }else {
                    rowSpanCounter = rowSpanCounter -1
                    tr.remove();
                    prestasi1Element = document.getElementById('peratus1TuntutanTD') 
                    prestasi2Element = document.getElementById('peratus2TuntutanTD')
                    prestasi1Element.rowSpan = rowSpanCounter;
                    prestasi2Element.rowSpan = rowSpanCounter;
                    tuntutanDSubRowCounter = tuntutanDSubRowCounter - 1
                }
                
            }
        }
    }

    $(document).on("click", ".addsubMainRowABtn", function() {
        var closestRow = $(this).closest('tr');
        newRow = getSubRowTemplate('A')

        if(tuntutanASubRowCounter == 1) {
            closestRow.after(newRow);
        }else {
            laterRow = document.getElementById('subA' + (tuntutanASubRowCounter - 1))
            laterRow.insertAdjacentHTML('afterend', newRow);
            // laterRow.after(newRow);
        }
        
        prestasi1Element = document.getElementById('peratus1TuntutanTD') 
        prestasi2Element = document.getElementById('peratus2TuntutanTD')
        prestasi1Element.rowSpan = rowSpanCounter;
        prestasi2Element.rowSpan = rowSpanCounter;

        const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubA"+tuntutanASubRowCounter);
        const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubA"+tuntutanASubRowCounter);
        const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubA"+tuntutanASubRowCounter);

        //   Add change event listeners to the input elements
        nilaiMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
        });

        RMMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subA',tuntutanASubRowCounter);
        });

        assignEventListenerForSillingTuntutan($years,'subA')
    })

    $(document).on("click", ".addsubMainRowBBtn", function() {
        var closestRow = $(this).closest('tr');
        newRow = getSubRowTemplate('B')

        if(tuntutanBSubRowCounter == 1) {
            closestRow.after(newRow);
        }else {
            laterRow = document.getElementById('subB' + (tuntutanBSubRowCounter - 1))
            laterRow.insertAdjacentHTML('afterend', newRow);
            // laterRow.after(newRow);
        }
        
        prestasi1Element = document.getElementById('peratus1TuntutanTD') 
        prestasi2Element = document.getElementById('peratus2TuntutanTD')
        prestasi1Element.rowSpan = rowSpanCounter;
        prestasi2Element.rowSpan = rowSpanCounter;

        const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubB"+tuntutanBSubRowCounter);
        const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubB"+tuntutanBSubRowCounter);
        const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubB"+tuntutanBSubRowCounter);

        //   Add change event listeners to the input elements
        nilaiMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
        });

        RMMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subB',tuntutanBSubRowCounter);
        });

        assignEventListenerForSillingTuntutan($years,'subB')
    })

    $(document).on("click", ".addsubMainRowCBtn", function() {
        var closestRow = $(this).closest('tr');
        newRow = getSubRowTemplate('C')

        if(tuntutanCSubRowCounter == 1) {
            closestRow.after(newRow);
        }else {
            laterRow = document.getElementById('subC' + (tuntutanCSubRowCounter - 1))
            laterRow.insertAdjacentHTML('afterend', newRow);
            // laterRow.after(newRow);
        }
        
        prestasi1Element = document.getElementById('peratus1TuntutanTD') 
        prestasi2Element = document.getElementById('peratus2TuntutanTD')
        prestasi1Element.rowSpan = rowSpanCounter;
        prestasi2Element.rowSpan = rowSpanCounter;

        const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubC"+tuntutanCSubRowCounter);
        const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubC"+tuntutanCSubRowCounter);
        const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubC"+tuntutanCSubRowCounter);

        //   Add change event listeners to the input elements
        nilaiMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
        });

        RMMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subC',tuntutanCSubRowCounter);
        });

        assignEventListenerForSillingTuntutan($years,'subC')
    })

    $(document).on("click", ".addsubMainRowDBtn", function() {
        var closestRow = $(this).closest('tr');
        newRow = getSubRowTemplate('D')

        if(tuntutanDSubRowCounter == 1) {
            closestRow.after(newRow);
        }else {
            laterRow = document.getElementById('subD' + (tuntutanDSubRowCounter - 1))
            laterRow.insertAdjacentHTML('afterend', newRow);
            // laterRow.after(newRow);
        }
        
        prestasi1Element = document.getElementById('peratus1TuntutanTD') 
        prestasi2Element = document.getElementById('peratus2TuntutanTD')
        prestasi1Element.rowSpan = rowSpanCounter;
        prestasi2Element.rowSpan = rowSpanCounter;

        const nilaiMesyuaratTuntutan = document.getElementById("nilaiMesyuaratsubD"+tuntutanDSubRowCounter);
        const RMMesyuaratTuntutan = document.getElementById("RMMesyuaratsubD"+tuntutanDSubRowCounter);
        const jumlah1MesyuaratTuntutan = document.getElementById("jumlah1MesyuaratsubD"+tuntutanDSubRowCounter);

        //   Add change event listeners to the input elements
        nilaiMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subD',tuntutanDSubRowCounter);
        });

        RMMesyuaratTuntutan.addEventListener("input", function() {
            updateJumlah1MesyuaratTuntutan('subD',tuntutanDSubRowCounter);
        });

        assignEventListenerForSillingTuntutan($years,'subD')
    })

    function updateFinalJumalhTuntutan() {
        total = 0

        for (let index = 1; index <= tuntutanASubRowCounter; index++) {
            const ajumlahElement = document.getElementById('jumlah1MesyuaratsubA' + index);
            if(ajumlahElement) {
                total = parseFloat(ajumlahElement.value) + parseFloat(total)
            }
        }

        for (let index = 1; index <= tuntutanBSubRowCounter; index++) {
            const bjumlahElement = document.getElementById('jumlah1MesyuaratsubB' + index);
            if(bjumlahElement) {
                total = parseFloat(bjumlahElement.value) + parseFloat(total)
            }
        }

        for (let index = 1; index <= tuntutanCSubRowCounter; index++) {
            const cjumlahElement = document.getElementById('jumlah1MesyuaratsubC' + index);
            if(cjumlahElement) {
                total = parseFloat(cjumlahElement.value) + parseFloat(total)
            }
        }

        for (let index = 1; index <= tuntutanDSubRowCounter; index++) {
            const djumlahElement = document.getElementById('jumlah1MesyuaratsubD' + index);
            if(djumlahElement) {
                total = parseFloat(djumlahElement.value) + parseFloat(total)
            }
        }

        const djumlahElement = document.getElementById('tuntutanFinalJumLan');
        djumlahElement.value = total.toFixed(2)

        totalRMK = 0

        for (let index = 1; index <= tuntutanASubRowCounter; index++) {
            const ajumlahRMKElement = document.getElementById('jumlah1RMKMesyuaratsubA' + index);
            if(ajumlahRMKElement) {
                totalRMK = parseFloat(ajumlahRMKElement.value) + parseFloat(totalRMK)
            }
        }

        for (let index = 1; index <= tuntutanBSubRowCounter; index++) {
            const bjumlahRMKElement = document.getElementById('jumlah1RMKMesyuaratsubB' + index);
            if(bjumlahRMKElement) {
                totalRMK = parseFloat(bjumlahRMKElement.value) + parseFloat(totalRMK)
            }
        }

        for (let index = 1; index <= tuntutanCSubRowCounter; index++) {
            const cjumlahRMKElement = document.getElementById('jumlah1RMKMesyuaratsubC' + index);
            if(cjumlahRMKElement) {
                totalRMK = parseFloat(cjumlahRMKElement.value) + parseFloat(totalRMK)
            }
        }

        for (let index = 1; index <= tuntutanDSubRowCounter; index++) {
            const djumlahRMKElement = document.getElementById('jumlah1RMKMesyuaratsubD' + index);
            if(djumlahRMKElement) {
                totalRMK = parseFloat(djumlahRMKElement.value) + parseFloat(totalRMK)
            }
        }

        document.getElementById("tuntutanFinalRMKJumLan").value = totalRMK.toFixed(2)
        
    }

    function getTuntutanTableValue() {
        tuntutanTableData = {
            "pertaus1" : document.getElementById("peratus1Tuntutan").value,
            "pertaus2" : document.getElementById("peratus2Tuntutan").value,
            "Jumlah" : {
                "jumlah1" : document.getElementById("tuntutanFinalJumLan").value ? document.getElementById("tuntutanFinalJumLan").value:0,
                "silling" : [],
                "jumlahRMK" : document.getElementById("tuntutanFinalRMKJumLan").value,
            },
            "tuntutan" : {
                "text1" : document.getElementById("text1T0").value,
                "text2" : document.getElementById("text2T0").value,
                "text3" : document.getElementById("text3T0").value,
                "text4" : document.getElementById("text4T0").value,
                "text5" : document.getElementById("text5T0").value
            }
        }

        //get A table
        for (let index = 1; index <= tuntutanASubRowCounter; index++) {
            data = {
                "nilai1" : document.getElementById('nilaiMesyuaratsubA' + index).value,
                "unit" : document.getElementById('unitMesyuaratsubA' + index).value,
                "rm" : document.getElementById('RMMesyuaratsubA' + index).value,
                "kadarunit" : document.getElementById('kadarMesyuaratsubA' + index).value,
                "nilai2" : 0,
                "kali" : '',
                "jumlah1" : document.getElementById('jumlah1MesyuaratsubA' + index).value,
                "jumlah2" : document.getElementById('jumlah1RMKMesyuaratsubA' + index).value,
                "text" : document.getElementById('subRowInputsubA' + index).value,
                "siling" : [],
            }

            sillingArray = []
            for (let indexj = 0; indexj < $years.length; indexj++) {
                sillingArray.push(document.getElementById(`strmsubA${index}_${indexj}`).value)
            }
            data.siling = sillingArray;

            tuntutanTableData['subA' + index] = data
        }

        //get B table
        for (let index = 1; index <= tuntutanBSubRowCounter; index++) {
            data = {
                "nilai1" : document.getElementById('nilaiMesyuaratsubB' + index).value,
                "unit" : document.getElementById('unitMesyuaratsubB' + index).value,
                "rm" : document.getElementById('RMMesyuaratsubB' + index).value,
                "kadarunit" : document.getElementById('kadarMesyuaratsubB' + index).value,
                "nilai2" : 0,
                "kali" : '',
                "jumlah1" : document.getElementById('jumlah1MesyuaratsubB' + index).value,
                "jumlah2" : document.getElementById('jumlah1RMKMesyuaratsubB' + index).value,
                "text" : document.getElementById('subRowInputsubB' + index).value,
                "siling" : [],
            }

            sillingArray = []
            for (let indexj = 0; indexj < $years.length; indexj++) {
                sillingArray.push(document.getElementById(`strmsubB${index}_${indexj}`).value)
            }
            data.siling = sillingArray;

            tuntutanTableData['subB' + index] = data
        }

        //get C table
        for (let index = 1; index <= tuntutanCSubRowCounter; index++) {
            data = {
                "nilai1" : document.getElementById('nilaiMesyuaratsubC' + index).value,
                "unit" : document.getElementById('unitMesyuaratsubC' + index).value,
                "rm" : document.getElementById('RMMesyuaratsubC' + index).value,
                "kadarunit" : document.getElementById('kadarMesyuaratsubC' + index).value,
                "nilai2" : 0,
                "kali" : '',
                "jumlah1" : document.getElementById('jumlah1MesyuaratsubC' + index).value,
                "jumlah2" : document.getElementById('jumlah1RMKMesyuaratsubC' + index).value,
                "text" : document.getElementById('subRowInputsubC' + index).value,
                "siling" : [],
            }

            sillingArray = []
            for (let indexj = 0; indexj < $years.length; indexj++) {
                sillingArray.push(document.getElementById(`strmsubC${index}_${indexj}`).value)
            }
            data.siling = sillingArray;

            tuntutanTableData['subC' + index] = data
        }

        //get D table
        for (let index = 1; index <= tuntutanDSubRowCounter; index++) {
            data = {
                "nilai1" : document.getElementById('nilaiMesyuaratsubD' + index).value,
                "unit" : document.getElementById('unitMesyuaratsubD' + index).value,
                "rm" : document.getElementById('RMMesyuaratsubD' + index).value,
                "kadarunit" : document.getElementById('kadarMesyuaratsubD' + index).value,
                "nilai2" : 0,
                "kali" : '',
                "jumlah1" : document.getElementById('jumlah1MesyuaratsubD' + index).value,
                "jumlah2" : document.getElementById('jumlah1RMKMesyuaratsubD' + index).value,
                "text" : document.getElementById('subRowInputsubD' + index).value,
                "siling" : [],
            }

            sillingArray = []
            for (let indexj = 0; indexj < $years.length; indexj++) {
                sillingArray.push(document.getElementById(`strmsubD${index}_${indexj}`).value)
            }
            data.siling = sillingArray;

            tuntutanTableData['subD' + index] = data
        }

        jumlahSillingArray = []
        for (let index = 0; index < $years.length; index++) {
            jumlahSillingArray.push(document.getElementById(`strmjumlah_${index}`).value)
        }
        tuntutanTableData.Jumlah.silling = jumlahSillingArray;

        return tuntutanTableData
    }

</script>