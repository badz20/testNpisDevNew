<script>

async function documentRow(projectData) {
    const tableBody = document.getElementById("tableBody");
    $years = getYears(projectData.tahun_jangka_mula, projectData.tahun_jangka_siap)

    mainheadcolspan = 12 + $years.length
    headingRow = `<tr>
                <td colspan="`+mainheadcolspan+`"> 2. DOKUMENTASI</td>
                  </tr>`

    $('#tableBody').append(headingRow);

    
    await firstRowDocumentasi()
    await secondRowDocumentasi()
    await thirdRowDocumentasi()
    await fourthRowDocumentasi()
    await fifthRowDocumentasi()
    await sixthRowDocumentasi()
    await seventhRowDocumentasi()
    await eigthRowDocumentasi()
    await nineRowDocumentasi()
    await tenRowDocumentasi()

    // const sillingspan = document.getElementById('belanjaSillingspan')
    // const tahunspan = document.getElementById('belanjaTahunspan')
    // sillingspan.colSpan = $years.length;
    // tahunspan.colSpan = $years.length;

    jumlahRowDocumentasi()
    assignEventListenerForSillingDocumentasi($years)

  }

  function getSillingColumnDocumentasi($years,rowNo)
  {
    sillingTd = ''
    for (let index = 0; index < $years.length; index++) {
      template = `<td>
                    <input type="text" class="form-control sdrm${rowNo}_${index}" name="sdrm${rowNo}_${index}" id="sdrm${rowNo}_${index}" value="0">
                  </td>`

      sillingTd = sillingTd + template         
    }

    return sillingTd
  }

  function loadDocumentasiData(documentasiData)
  {
    document.getElementById('documentasiFinalJumLan').value = documentasiData.jumlah
    document.getElementById('documentasiFinalRMKJumLan').value = documentasiData.jumlah_RMK
    document.getElementById('peratus1Documentasi').value = documentasiData.peratus
    document.getElementById('peratus2Documentasi').value = documentasiData.peratus_RMK
    $years = getYears(documentasiData.project.tahun_jangka_mula, documentasiData.project.tahun_jangka_siap)

    
    for (let index = 0; index < $years.length; index++) {
      temp = `yr_` + (parseInt(index) + 1)
      document.getElementById('sdrmjumlah_'+index).value = documentasiData[temp] 
    }

    documentasiData.belanja_details.forEach(recordDetails => {
      loadDocumentasiDetails(recordDetails,$years)
    })
  }


  function loadDocumentasiDetails(recordDetails,$years)
  {
    
    if(recordDetails.type == 'DA' || recordDetails.type == 'DB' || recordDetails.type == 'DC' || recordDetails.type == 'DE' || recordDetails.type == 'DF') {
        document.getElementById('text2'+ recordDetails.type).value = recordDetails.nilai1  
        document.getElementById('text1'+ recordDetails.type).value = recordDetails.rm
    }
    
    
    document.getElementById('nilaiMesyuarat'+ recordDetails.type).value = recordDetails.nilai1  
    document.getElementById('unitMesyuarat'+ recordDetails.type).value = recordDetails.unit
    document.getElementById('RMMesyuarat'+ recordDetails.type).value = recordDetails.rm
    document.getElementById('kadarMesyuarat'+ recordDetails.type).value = recordDetails.kadar_unit
    // document.getElementById('nilai2Mesyuarat'+ recordDetails.type).value = recordDetails.nilai2
    // document.getElementById('hariMesyuarat'+ recordDetails.type).value = recordDetails.kali
    document.getElementById('jumlah1Mesyuarat'+ recordDetails.type).value = recordDetails.jumlah
    

    switch (recordDetails.type) {
      case 'DA':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm1_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD1').value = recordDetails.jumlahRMK
        break;
    
      case 'DB':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm2_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD2').value = recordDetails.jumlahRMK
        break;

      case 'DC':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm3_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD3').value = recordDetails.jumlahRMK
        break;

      case 'DE':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm4_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD4').value = recordDetails.jumlahRMK
        break;

      case 'DF':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm5_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD5').value = recordDetails.jumlahRMK
        break;

      case 'DK':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm6_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD6').value = recordDetails.jumlahRMK
        break;

      case 'DG':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm7_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD7').value = recordDetails.jumlahRMK
        break;

      case 'DH':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm8_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat8').value = recordDetails.jumlahRMK
        break;

      case 'DI':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm9_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD9').value = recordDetails.jumlahRMK
        break;

      case 'DJ':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sdrm10_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuaratD10').value = recordDetails.jumlahRMK
        break;
      default:
        break;
    }
    // for (let index = 0; index < $years.length; index++) {
    //   temp = `yr_` + (parseInt(index) + 1)
    //   document.getElementById('sdrm1_'+index).value = recordDetails[temp] 
    // }
    // document.getElementById('jumlah1RMKMesyuarat'+ recordDetails.type).value = recordDetails.jumlah
  }


  function firstRowDocumentasi()
  {
    firstRow = `<tr>
                  <td colspan="">
                  a.Dokumen Tender dan Pelan Tender </br>
                            <input type="text" class="text1DA" name="text1DA" id="text1DA" style="border:none;width:50px" readonly> set dokumen tender berharga
                            RM <input type="text" class="text2DA" name="text2DA" id="text2DA" style="border:none;width:50px" readonly>  </br>(Termasuk Lukisan Tender) 
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDA" name="nilaiMesyuaratDA" id="nilaiMesyuaratDA" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDA" name="unitMesyuaratDA" id="unitMesyuaratDA" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDA" name="RMMesyuaratDA" id="RMMesyuaratDA" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDA" name="kadarMesyuaratDA" id="kadarMesyuaratDA" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDA" name="jumlah1MesyuaratDA" id="jumlah1MesyuaratDA" value="0" readonly>
                  </td>
                  <td rowspan="10">
                    <input type="text" class="form-control peratus1Documentasi" name="peratus1Documentasi" id="peratus1Documentasi" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,1)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD1" name="jumlah1RMKMesyuaratD1" id="jumlah1RMKMesyuaratD1" value="0" readonly>
                    </td>
                    <td rowspan="10">
                    <input type="text" class="form-control peratus2Documentasi" name="peratus2Documentasi" id="peratus2Documentasi" value="0" readonly>
                  </td>
                  
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDA = document.getElementById("nilaiMesyuaratDA");
      const RMMesyuaratDA = document.getElementById("RMMesyuaratDA");
    //   const nilai2MesyuaratDA = document.getElementById("nilai2MesyuaratDA");
      const jumlah1MesyuaratDA = document.getElementById("jumlah1MesyuaratDA");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDA.addEventListener("input", updateJumlah1MesyuaratDA);
      RMMesyuaratDA.addEventListener("input", updateJumlah1MesyuaratDA);
    //   nilai2MesyuaratDA.addEventListener("input", updateJumlah1MesyuaratDA);
      nilaiMesyuaratDA.addEventListener("input", updateText2DA);
      RMMesyuaratDA.addEventListener("input", updateText1DA);
  }

  // Function to update jumlah1MesyuaratDA
  function updateJumlah1MesyuaratDA() {
    const nilaiValue = parseFloat(nilaiMesyuaratDA.value);
    const RMValue = parseFloat(RMMesyuaratDA.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDA.value);
    jumlah1MesyuaratDA.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DA
  function updateText2DA() {
    const text2DA = document.getElementById("text2DA");
    text2DA.value = nilaiMesyuaratDA.value;
  }

  // Function to update text1DA
  function updateText1DA() {
    const text1DA = document.getElementById("text1DA");
    text1DA.value = RMMesyuaratDA.value;
  }

//second row Documentasi
function secondRowDocumentasi()
  {
    firstRow = `<tr>
                  <td colspan="">
                  b.Dokumen Kontrak </br>
                            <input type="text" class="text1DB" name="text1DB" id="text1DB"  style="border:none;width:50px" readonly> 
                            set dokumen tender berharga
                            RM <input type="text" class="text2DB" name="text2DB" id="text2DB"  style="border:none;width:50px" readonly> </br>
                            (Termasuk Lukisan Tender) 
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDB" name="nilaiMesyuaratDB" id="nilaiMesyuaratDB" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDB" name="unitMesyuaratDB" id="unitMesyuaratDB" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDB" name="RMMesyuaratDB" id="RMMesyuaratDB" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDB" name="kadarMesyuaratDB" id="kadarMesyuaratDB" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDB" name="jumlah1MesyuaratDB" id="jumlah1MesyuaratDB" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,2)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD2" name="jumlah1RMKMesyuaratD2" id="jumlah1RMKMesyuaratD2" value="0" readonly>
                    </td>
                  
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDB = document.getElementById("nilaiMesyuaratDB");
      const RMMesyuaratDB = document.getElementById("RMMesyuaratDB");
    //   const nilai2MesyuaratDB = document.getElementById("nilai2MesyuaratDB");
      const jumlah1MesyuaratDB = document.getElementById("jumlah1MesyuaratDB");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDB.addEventListener("input", updateJumlah1MesyuaratDB);
      RMMesyuaratDB.addEventListener("input", updateJumlah1MesyuaratDB);
    //   nilai2MesyuaratDB.addEventListener("input", updateJumlah1MesyuaratDB);
      nilaiMesyuaratDB.addEventListener("input", updateText2DB);
      RMMesyuaratDB.addEventListener("input", updateText1DB);
  }

  // Function to update jumlah1MesyuaratDB
  function updateJumlah1MesyuaratDB() {
    const nilaiValue = parseFloat(nilaiMesyuaratDB.value);
    const RMValue = parseFloat(RMMesyuaratDB.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDB.value);
    jumlah1MesyuaratDB.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DB
  function updateText2DB() {
    const text2DB = document.getElementById("text2DB");
    text2DB.value = nilaiMesyuaratDB.value;
  }

  // Function to update text1DB
  function updateText1DB() {
    const text1DB = document.getElementById("text1DB");
    text1DB.value = RMMesyuaratDB.value;
  }


  //Third row Documentasi
function thirdRowDocumentasi()
  {
    firstRow = `<tr>
                  <td colspan="">
                  c.Laporan Makmal VA </br>
                            <input type="text" class="text1DC" id="text1DC"  style="border:none;width:50px" readonly> 
                            set dokumen tender berharga
                            RM <input type="text" class="text2DC" id="text2DC" style="border:none;width:50px" readonly> bagi 3 set
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDC" name="nilaiMesyuaratDC" id="nilaiMesyuaratDC" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDC" name="unitMesyuaratDC" id="unitMesyuaratDC" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDC" name="RMMesyuaratDC" id="RMMesyuaratDC" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDC" name="kadarMesyuaratDC" id="kadarMesyuaratDC" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDC" name="jumlah1MesyuaratDC" id="jumlah1MesyuaratDC" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,3)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD3" name="jumlah1RMKMesyuaratD3" id="jumlah1RMKMesyuaratD3" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDC = document.getElementById("nilaiMesyuaratDC");
      const RMMesyuaratDC = document.getElementById("RMMesyuaratDC");
    //   const nilai2MesyuaratDC = document.getElementById("nilai2MesyuaratDC");
      const jumlah1MesyuaratDC = document.getElementById("jumlah1MesyuaratDC");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDC.addEventListener("input", updateJumlah1MesyuaratDC);
      RMMesyuaratDC.addEventListener("input", updateJumlah1MesyuaratDC);
    //   nilai2MesyuaratDC.addEventListener("input", updateJumlah1MesyuaratDC);
      nilaiMesyuaratDC.addEventListener("input", updateText2DC);
      RMMesyuaratDC.addEventListener("input", updateText1DC);
  }

  // Function to update jumlah1MesyuaratDC
  function updateJumlah1MesyuaratDC() {
    const nilaiValue = parseFloat(nilaiMesyuaratDC.value);
    const RMValue = parseFloat(RMMesyuaratDC.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDC.value);
    jumlah1MesyuaratDC.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DC
  function updateText2DC() {
    const text2DC = document.getElementById("text2DC");
    text2DC.value = nilaiMesyuaratDC.value;
  }

  // Function to update text1DC
  function updateText1DC() {
    const text1DC = document.getElementById("text1DC");
    text1DC.value = RMMesyuaratDC.value;
  }

  //fourth row Documentasi
function fourthRowDocumentasi()
  {
    firstRow = `<tr>
                  <td colspan="">
                  e.Laporan Makmal VE </br>
                            <input type="text" class="text1DE" name="text1DE" id="text1DE"  style="border:none;width:50px" readonly> set dokumen tender berharga
                            RM <input type="text" class="text2DE-" name="text2DE" id="text2DE" style="border:none;width:50px" readonly> bagi 3 set
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDE" name="nilaiMesyuaratDE" id="nilaiMesyuaratDE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDE" name="unitMesyuaratDE" id="unitMesyuaratDE" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDE" name="RMMesyuaratDE" id="RMMesyuaratDE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDE" name="kadarMesyuaratDE" id="kadarMesyuaratDE" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDE" name="jumlah1MesyuaratDE" id="jumlah1MesyuaratDE" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,4)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD4" name="jumlah1RMKMesyuaratD4" id="jumlah1RMKMesyuaratD4" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDE = document.getElementById("nilaiMesyuaratDE");
      const RMMesyuaratDE = document.getElementById("RMMesyuaratDE");
    //   const nilai2MesyuaratDE = document.getElementById("nilai2MesyuaratDE");
      const jumlah1MesyuaratDE = document.getElementById("jumlah1MesyuaratDE");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDE.addEventListener("input", updateJumlah1MesyuaratDE);
      RMMesyuaratDE.addEventListener("input", updateJumlah1MesyuaratDE);
    //   nilai2MesyuaratDE.addEventListener("input", updateJumlah1MesyuaratDE);
      nilaiMesyuaratDE.addEventListener("input", updateText2DE);
      RMMesyuaratDE.addEventListener("input", updateText1DE);
  }

  // Function to update jumlah1MesyuaratDE
  function updateJumlah1MesyuaratDE() {
    const nilaiValue = parseFloat(nilaiMesyuaratDE.value);
    const RMValue = parseFloat(RMMesyuaratDE.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDE.value);
    jumlah1MesyuaratDE.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DE
  function updateText2DE() {
    const text2DE = document.getElementById("text2DE");
    text2DE.value = nilaiMesyuaratDE.value;
  }

  // Function to update text1DE
  function updateText1DE() {
    const text1DE = document.getElementById("text1DE");
    text1DE.value = RMMesyuaratDE.value;
  }




  //fifth row Documentasi
function fifthRowDocumentasi()
  {
    firstRow = `<tr>
                  <td colspan="">
                  d.Laporan Makmal VR </br>
                            <input type="text" class="text1DF" name="text1DF" id="text1DF" style="border:none;width:50px" readonly> set dokumen tender berharga
                            RM <input type="text" class="text2DF" name="text2DF" id="text2DF" style="border:none;width:50px" readonly> bagi 3 set
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDF" name="nilaiMesyuaratDF" id="nilaiMesyuaratDF" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDF" name="unitMesyuaratDF" id="unitMesyuaratDF" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDF" name="RMMesyuaratDF" id="RMMesyuaratDF" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDF" name="kadarMesyuaratDF" id="kadarMesyuaratDF" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDF" name="jumlah1MesyuaratDF" id="jumlah1MesyuaratDF" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,5)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD5" name="jumlah1RMKMesyuaratD5" id="jumlah1RMKMesyuaratD5" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDF = document.getElementById("nilaiMesyuaratDF");
      const RMMesyuaratDF = document.getElementById("RMMesyuaratDF");
    //   const nilai2MesyuaratDF = document.getElementById("nilai2MesyuaratDF");
      const jumlah1MesyuaratDF = document.getElementById("jumlah1MesyuaratDF");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDF.addEventListener("input", updateJumlah1MesyuaratDF);
      RMMesyuaratDF.addEventListener("input", updateJumlah1MesyuaratDF);
    //   nilai2MesyuaratDF.addEventListener("input", updateJumlah1MesyuaratDF);
      nilaiMesyuaratDF.addEventListener("input", updateText2DF);
      RMMesyuaratDF.addEventListener("input", updateText1DF);
  }

  // Function to update jumlah1MesyuaratDF
  function updateJumlah1MesyuaratDF() {
    const nilaiValue = parseFloat(nilaiMesyuaratDF.value);
    const RMValue = parseFloat(RMMesyuaratDF.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDF.value);
    jumlah1MesyuaratDF.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DF
  function updateText2DF() {
    const text2DF = document.getElementById("text2DF");
    text2DF.value = nilaiMesyuaratDF.value;
  }

  // Function to update text1DF
  function updateText1DF() {
    const text1DF = document.getElementById("text1DF");
    text1DF.value = RMMesyuaratDF.value;
  }

  //sithth row Documentasi
function sixthRowDocumentasi()
  {
    firstRow = `<tr>
                  <td colspan="">
                  e.Laporan Rekabentuk </br>
                  i. Preliminery Review Design Report
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDK" name="nilaiMesyuaratDK" id="nilaiMesyuaratDK" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDK" name="unitMesyuaratDK" id="unitMesyuaratDK" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDK" name="RMMesyuaratDK" id="RMMesyuaratDK" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDK" name="kadarMesyuaratDK" id="kadarMesyuaratDK" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDK" name="jumlah1MesyuaratDK" id="jumlah1MesyuaratDK" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,6)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD6" name="jumlah1RMKMesyuaratD6" id="jumlah1RMKMesyuaratD6" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDK = document.getElementById("nilaiMesyuaratDK");
      const RMMesyuaratDK = document.getElementById("RMMesyuaratDK");
    //   const nilai2MesyuaratDF = document.getElementById("nilai2MesyuaratDF");
      const jumlah1MesyuaratDK = document.getElementById("jumlah1MesyuaratDK");

    //   Add change event listeners to the input elements
    console.log(nilaiMesyuaratDK);
      nilaiMesyuaratDK.addEventListener("input", updateJumlah1MesyuaratDK);
      RMMesyuaratDK.addEventListener("input", updateJumlah1MesyuaratDK);
    //   nilai2MesyuaratDF.addEventListener("input", updateJumlah1MesyuaratDF);
    //   nilaiMesyuaratDF.addEventListener("input", updateText2DF);
    //   RMMesyuaratDF.addEventListener("input", updateText1DF);
  }

  // Function to update jumlah1MesyuaratDF
  function updateJumlah1MesyuaratDK() {
    const nilaiValue = parseFloat(nilaiMesyuaratDK.value);
    const RMValue = parseFloat(RMMesyuaratDK.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDF.value);
    jumlah1MesyuaratDK.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DF
  function updateText2DF() {
    const text2DF = document.getElementById("text2DF");
    text2DF.value = nilaiMesyuaratDF.value;
  }

  // Function to update text1DF
  function updateText1DF() {
    const text1DF = document.getElementById("text1DF");
    text1DF.value = RMMesyuaratDF.value;
  }

  //seventth row Documentasi
function seventhRowDocumentasi()
  {
    firstRow = `<tr style="background-color: rgba(0,0,0,.05);">
                  <td colspan="">
                  ii. Conceptual Design Report
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDG" name="nilaiMesyuaratDG" id="nilaiMesyuaratDG" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDG" name="unitMesyuaratDG" id="unitMesyuaratDG" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDG" name="RMMesyuaratDG" id="RMMesyuaratDG" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDG" name="kadarMesyuaratDG" id="kadarMesyuaratDG" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDG" name="jumlah1MesyuaratDG" id="jumlah1MesyuaratDG" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,7)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD7" name="jumlah1RMKMesyuaratD7" id="jumlah1RMKMesyuaratD7" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDG = document.getElementById("nilaiMesyuaratDG");
      const RMMesyuaratDG = document.getElementById("RMMesyuaratDG");
    //   const nilai2MesyuaratDG = document.getElementById("nilai2MesyuaratDG");
      const jumlah1MesyuaratDG = document.getElementById("jumlah1MesyuaratDG");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDG.addEventListener("input", updateJumlah1MesyuaratDG);
      RMMesyuaratDG.addEventListener("input", updateJumlah1MesyuaratDG);
    //   nilai2MesyuaratDG.addEventListener("input", updateJumlah1MesyuaratDG);
    //   nilaiMesyuaratDG.addEventListener("input", updateText2DG);
    //   RMMesyuaratDG.addEventListener("input", updateText1DG);
  }

  // Function to update jumlah1MesyuaratDG
  function updateJumlah1MesyuaratDG() {
    const nilaiValue = parseFloat(nilaiMesyuaratDG.value);
    const RMValue = parseFloat(RMMesyuaratDG.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDG.value);
    jumlah1MesyuaratDG.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DG
  function updateText2DG() {
    const text2DG = document.getElementById("text2DG");
    text2DG.value = nilaiMesyuaratDG.value;
  }

  // Function to update text1DG
  function updateText1DG() {
    const text1DG = document.getElementById("text1DG");
    text1DG.value = RMMesyuaratDG.value;
  }

  //eigthth row Documentasi
function eigthRowDocumentasi()
  {
    firstRow = `<tr style="background-color: rgba(0,0,0,.05);">
                  <td colspan="">
                  iii. Interim Design Report
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDH" name="nilaiMesyuaratDH" id="nilaiMesyuaratDH" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDH" name="unitMesyuaratDH" id="unitMesyuaratDH" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDH" name="RMMesyuaratDH" id="RMMesyuaratDH" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDH" name="kadarMesyuaratDH" id="kadarMesyuaratDH" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDH" name="jumlah1MesyuaratDH" id="jumlah1MesyuaratDH" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,8)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD8" name="jumlah1RMKMesyuaratD8" id="jumlah1RMKMesyuaratD8" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDH = document.getElementById("nilaiMesyuaratDH");
      const RMMesyuaratDH = document.getElementById("RMMesyuaratDH");
    //   const nilai2MesyuaratDH = document.getElementById("nilai2MesyuaratDH");
      const jumlah1MesyuaratDH = document.getElementById("jumlah1MesyuaratDH");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDH.addEventListener("input", updateJumlah1MesyuaratDH);
      RMMesyuaratDH.addEventListener("input", updateJumlah1MesyuaratDH);
    //   nilai2MesyuaratDH.addEventListener("input", updateJumlah1MesyuaratDH);
    //   nilaiMesyuaratDH.addEventListener("input", updateText2DH);
    //   RMMesyuaratDH.addEventListener("input", updateText1DH);
  }

  // Function to update jumlah1MesyuaratDH
  function updateJumlah1MesyuaratDH() {
    const nilaiValue = parseFloat(nilaiMesyuaratDH.value);
    const RMValue = parseFloat(RMMesyuaratDH.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDH.value);
    jumlah1MesyuaratDH.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DH
  function updateText2DH() {
    const text2DH = document.getElementById("text2DH");
    text2DH.value = nilaiMesyuaratDH.value;
  }

  // Function to update text1DH
  function updateText1DH() {
    const text1DH = document.getElementById("text1DH");
    text1DH.value = RMMesyuaratDH.value;
  }

  //ninethth row Documentasi
function nineRowDocumentasi()
  {
    firstRow = `<tr style="background-color: rgba(0,0,0,.05);">
                  <td colspan="">
                  iv. Draft Final Design Report
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDI" name="nilaiMesyuaratDI" id="nilaiMesyuaratDI" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDI" name="unitMesyuaratDI" id="unitMesyuaratDI" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDI" name="RMMesyuaratDI" id="RMMesyuaratDI" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDI" name="kadarMesyuaratDI" id="kadarMesyuaratDI" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDI" name="jumlah1MesyuaratDI" id="jumlah1MesyuaratDI" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,9)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD9" name="jumlah1RMKMesyuaratD9" id="jumlah1RMKMesyuaratD9" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDI = document.getElementById("nilaiMesyuaratDI");
      const RMMesyuaratDI = document.getElementById("RMMesyuaratDI");
    //   const nilai2MesyuaratDI = document.getElementById("nilai2MesyuaratDI");
      const jumlah1MesyuaratDI = document.getElementById("jumlah1MesyuaratDI");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDI.addEventListener("input", updateJumlah1MesyuaratDI);
      RMMesyuaratDI.addEventListener("input", updateJumlah1MesyuaratDI);
    //   nilai2MesyuaratDI.addEventListener("input", updateJumlah1MesyuaratDI);
    //   nilaiMesyuaratDI.addEventListener("input", updateText2DI);
    //   RMMesyuaratDI.addEventListener("input", updateText1DI);
  }

  // Function to update jumlah1MesyuaratDI
  function updateJumlah1MesyuaratDI() {
    const nilaiValue = parseFloat(nilaiMesyuaratDI.value);
    const RMValue = parseFloat(RMMesyuaratDI.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDI.value);
    jumlah1MesyuaratDI.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DI
  function updateText2DI() {
    const text2DI = document.getElementById("text2DI");
    text2DI.value = nilaiMesyuaratDI.value;
  }

  // Function to update text1DI
  function updateText1DI() {
    const text1DI = document.getElementById("text1DI");
    text1DI.value = RMMesyuaratDI.value;
  }

  //tenth row Documentasi
function tenRowDocumentasi()
  {
    firstRow = `<tr style="background-color: rgba(0,0,0,.05);">
                  <td colspan="">
                  v. Final Design Report
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratDJ" name="nilaiMesyuaratDJ" id="nilaiMesyuaratDJ" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratDJ" name="unitMesyuaratDJ" id="unitMesyuaratDJ" value="Set" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratDJ" name="RMMesyuaratDJ" id="RMMesyuaratDJ" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratDJ" name="kadarMesyuaratDJ" id="kadarMesyuaratDJ" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratDJ" name="jumlah1MesyuaratDJ" id="jumlah1MesyuaratDJ" value="0" readonly>
                  </td>
                  `+getSillingColumnDocumentasi($years,10)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuaratD10" name="jumlah1RMKMesyuaratD10" id="jumlah1RMKMesyuaratD10" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratDJ = document.getElementById("nilaiMesyuaratDJ");
      const RMMesyuaratDJ = document.getElementById("RMMesyuaratDJ");
    //   const nilai2MesyuaratDJ = document.getElementById("nilai2MesyuaratDJ");
      const jumlah1MesyuaratDJ = document.getElementById("jumlah1MesyuaratDJ");

    //   Add change event listeners to the input elements
      nilaiMesyuaratDJ.addEventListener("input", updateJumlah1MesyuaratDJ);
      RMMesyuaratDJ.addEventListener("input", updateJumlah1MesyuaratDJ);
    //   nilai2MesyuaratDJ.addEventListener("input", updateJumlah1MesyuaratDJ);
    //   nilaiMesyuaratDJ.addEventListener("input", updateText2DJ);
    //   RMMesyuaratDJ.addEventListener("input", updateText1DJ);
  }

  // Function to update jumlah1MesyuaratDJ
  function updateJumlah1MesyuaratDJ() {
    const nilaiValue = parseFloat(nilaiMesyuaratDJ.value);
    const RMValue = parseFloat(RMMesyuaratDJ.value);
    // const nilai2Value = parseFloat(nilai2MesyuaratDJ.value);
    jumlah1MesyuaratDJ.value = (nilaiValue * RMValue ).toFixed(2);
    updateFinalJumalhDocumentasi()
  }


  // Function to update text2DJ
  function updateText2DJ() {
    const text2DJ = document.getElementById("text2DJ");
    text2DJ.value = nilaiMesyuaratDJ.value;
  }

  // Function to update text1DJ
  function updateText1DJ() {
    const text1DJ = document.getElementById("text1DJ");
    text1DJ.value = RMMesyuaratDJ.value;
  }


  function jumlahRowDocumentasi() {
    Row = `<tr style="background-color:#39afd1;">
        <td colspan="7" class="text-white text-right JumLanja">
                                  JUMLAH (RM)
                                </td>    
                                <td><input type="text" class="form-control documentasiFinalJumLan" name="documentasiFinalJumLan" id="documentasiFinalJumLan" value="0" readonly></td>
                                <td></td>
                                `+getSillingColumnDocumentasi($years,'jumlah')+`
                                <td><input type="text" class="form-control documentasiFinalRMKJumLan" name="documentasiFinalRMKJumLan" id="documentasiFinalRMKJumLan" value="0" readonly></td>
      </tr>`;

      $('#tableBody').append(Row);
  }

  function assignEventListenerForSillingDocumentasi($years) {
    // Attach event listeners to the input elements
    for (let rowNo = 1; rowNo <= 10; rowNo++) {
      for (let index = 0; index < $years.length; index++) {
        const inputElement = document.getElementById(`sdrm${rowNo}_${index}`);
        inputElement.addEventListener('input', function() {
          calculateDocumentasi($years); 
        });
      }
    }
    
  }

  function calculateDocumentasi($years) {
    for (let index = 1; index <= 10; index++) {
      rowSum = 0
      for (let indexj = 0 ;indexj <= $years.length; indexj++) {
        const inputRowElement = document.getElementById(`sdrm${index}_${indexj}`);
        if(inputRowElement) {
          rowSum = parseFloat(inputRowElement.value ) + parseFloat(rowSum) 
        }
      }

      const jumlahRMKElement = document.getElementById(`jumlah1RMKMesyuaratD${index}`);
      jumlahRMKElement.value = rowSum.toFixed(2)
    }

    for (let indexj = 0; indexj <= $years.length; indexj++) {
      columnSum = 0
      for (let index = 1; index <= 10; index++) {
        const inputColumnElement = document.getElementById(`sdrm${index}_${indexj}`);
        if(inputColumnElement) {
          columnSum = parseFloat(inputColumnElement.value ) + parseFloat(columnSum)
        }
      }
      const jumlahColumnElement = document.getElementById(`sdrmjumlah_${indexj}`);
      if(jumlahColumnElement) {
        jumlahColumnElement.value = columnSum.toFixed(2)
      }
      
    }
    updateFinalJumalhDocumentasi()
    
  }

  function updateFinalJumalhDocumentasi() {
    const jumlah1MesyuaratDA = document.getElementById("jumlah1MesyuaratDA");
    const jumlah1MesyuaratDB = document.getElementById("jumlah1MesyuaratDB");
    const jumlah1MesyuaratDC = document.getElementById("jumlah1MesyuaratDC");
    const jumlah1MesyuaratDE = document.getElementById("jumlah1MesyuaratDE");
    const jumlah1MesyuaratDF = document.getElementById("jumlah1MesyuaratDF");
    const jumlah1MesyuaratDG = document.getElementById("jumlah1MesyuaratDG");
    const jumlah1MesyuaratDH = document.getElementById("jumlah1MesyuaratDH");
    const jumlah1MesyuaratDI = document.getElementById("jumlah1MesyuaratDI");
    const jumlah1MesyuaratDJ = document.getElementById("jumlah1MesyuaratDJ");
    const jumlah1MesyuaratDK = document.getElementById("jumlah1MesyuaratDK");
    const finalJumlah = document.getElementById("documentasiFinalJumLan");

    total = parseFloat(jumlah1MesyuaratDA.value) +
                        parseFloat(jumlah1MesyuaratDB.value) +
                        parseFloat(jumlah1MesyuaratDC.value) +
                        parseFloat(jumlah1MesyuaratDE.value) +
                        parseFloat(jumlah1MesyuaratDF.value) +
                        parseFloat(jumlah1MesyuaratDG.value) +
                        parseFloat(jumlah1MesyuaratDH.value) +
                        parseFloat(jumlah1MesyuaratDI.value) +
                        parseFloat(jumlah1MesyuaratDJ.value) +
                        parseFloat(jumlah1MesyuaratDK.value) 
                        // parseFloat(jumlah1MesyuaratPH.value)

    finalJumlah.value = total.toFixed(2)

    totalRMK = 0
    for (let index = 1; index <= 10; index++) {
      temp = document.getElementById("jumlah1RMKMesyuaratD"+index)
      if(temp) {
        totalRMK =  parseFloat(totalRMK)  + parseFloat(temp.value)
      }
    }

    document.getElementById("documentasiFinalRMKJumLan").value = totalRMK.toFixed(2)

  }


  function getDocumentasiTableValue() {

        documentasiTableData = {
        "pertaus1" : document.getElementById("peratus1Documentasi").value,
        "pertaus2" : document.getElementById("peratus2Documentasi").value,
        "DA" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDA").value,
            "unit" : document.getElementById("unitMesyuaratDA").value,
            "rm" : document.getElementById("RMMesyuaratDA").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDA").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDA").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD1").value,
            "siling" : []
        },
        "DB" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDB").value,
            "unit" : document.getElementById("unitMesyuaratDB").value,
            "rm" : document.getElementById("RMMesyuaratDB").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDB").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDB").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD2").value,
            "siling" : []
        },
        "DC" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDC").value,
            "unit" : document.getElementById("unitMesyuaratDC").value,
            "rm" : document.getElementById("RMMesyuaratDC").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDC").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDC").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD3").value,
            "siling" : []
        },
        "DE" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDE").value,
            "unit" : document.getElementById("unitMesyuaratDE").value,
            "rm" : document.getElementById("RMMesyuaratDE").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDE").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDE").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD4").value,
            "siling" : []
        },
        "DF" : {
            "nilai1" : document.getElementById("nilaiMesyuaratDF").value,
            "unit" : document.getElementById("unitMesyuaratDF").value,
            "rm" : document.getElementById("RMMesyuaratDF").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDF").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDF").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD5").value,
            "siling" : []
        },
        "DG" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDG").value,
            "unit" : document.getElementById("unitMesyuaratDG").value,
            "rm" : document.getElementById("RMMesyuaratDG").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDG").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDG").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD7").value,
            "siling" : []
        },
        "DH" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDH").value,
            "unit" : document.getElementById("unitMesyuaratDH").value,
            "rm" : document.getElementById("RMMesyuaratDH").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDH").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDH").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD8").value,
            "siling" : []
        },
        "DI" : {
            "nilai1" : document.getElementById("nilaiMesyuaratDI").value,
            "unit" : document.getElementById("unitMesyuaratDI").value,
            "rm" : document.getElementById("RMMesyuaratDI").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDI").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDI").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD9").value,
            "siling" : []
        },
        "DJ" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDJ").value,
            "unit" : document.getElementById("unitMesyuaratDJ").value,
            "rm" : document.getElementById("RMMesyuaratDJ").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDJ").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDJ").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD10").value,
            "siling" : []
        },
        "DK" : {
            "nilai1" :  document.getElementById("nilaiMesyuaratDK").value,
            "unit" : document.getElementById("unitMesyuaratDK").value,
            "rm" : document.getElementById("RMMesyuaratDK").value,
            "kadarunit" : document.getElementById("kadarMesyuaratDK").value,
            "nilai2" : 0,
            "kali" : '',
            "jumlah1" : document.getElementById("jumlah1MesyuaratDK").value,
            "jumlah2" : document.getElementById("jumlah1RMKMesyuaratD6").value,
            "siling" : []
        },
        "Jumlah" : {
            "jumlah1" : document.getElementById("documentasiFinalJumLan").value ? document.getElementById("documentasiFinalJumLan").value:0,
            "silling" : [],
            "jumlahRMK" : document.getElementById("documentasiFinalRMKJumLan").value,
        }
        }

        $years = getYears(projectData.tahun_jangka_mula, projectData.tahun_jangka_siap)

        daSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        daSillingArray.push(document.getElementById(`sdrm1_${index}`).value)
        }
        documentasiTableData.DA.siling = daSillingArray;

        dbSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        dbSillingArray.push(document.getElementById(`sdrm2_${index}`).value)
        }
        documentasiTableData.DB.siling = dbSillingArray;

        dcSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        dcSillingArray.push(document.getElementById(`sdrm3_${index}`).value)
        }
        documentasiTableData.DC.siling = dcSillingArray;

        deSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        deSillingArray.push(document.getElementById(`sdrm4_${index}`).value)
        }
        documentasiTableData.DE.siling = deSillingArray;

        dfSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        dfSillingArray.push(document.getElementById(`sdrm5_${index}`).value)
        }
        documentasiTableData.DF.siling = dfSillingArray;

        dgSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        dgSillingArray.push(document.getElementById(`sdrm7_${index}`).value)
        }
        documentasiTableData.DG.siling = dgSillingArray;

        dhSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        dhSillingArray.push(document.getElementById(`sdrm8_${index}`).value)
        }
        documentasiTableData.DH.siling = dhSillingArray;

        diSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        diSillingArray.push(document.getElementById(`sdrm9_${index}`).value)
        }
        documentasiTableData.DI.siling = diSillingArray;

        djSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        djSillingArray.push(document.getElementById(`sdrm10_${index}`).value)
        }
        documentasiTableData.DJ.siling = djSillingArray;

        dkSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        dkSillingArray.push(document.getElementById(`sdrm6_${index}`).value)
        }
        documentasiTableData.DK.siling = dkSillingArray;

        jumlahSillingArray = []
        for (let index = 0; index < $years.length; index++) {
        jumlahSillingArray.push(document.getElementById(`sdrmjumlah_${index}`).value)
        }
        documentasiTableData.Jumlah.silling = jumlahSillingArray;

        return documentasiTableData
    }
</script>

