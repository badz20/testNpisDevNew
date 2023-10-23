<script>
    function loadPelaksanaanData(pelaksanaanData)
  {
    document.getElementById('pelaksanaanFinalJumLan').value = pelaksanaanData.jumlah
    document.getElementById('pelaksanaanFinalRMKJumLan').value = pelaksanaanData.jumlah_RMK
    document.getElementById('peratus1Pelaksanaan').value = pelaksanaanData.peratus
    document.getElementById('peratus2Pelaksanaan').value = pelaksanaanData.peratus_RMK
    $years = getYears(pelaksanaanData.project.tahun_jangka_mula, pelaksanaanData.project.tahun_jangka_siap)

    
    for (let index = 0; index < $years.length; index++) {
      temp = `yr_` + (parseInt(index) + 1)
      document.getElementById('sprmjumlah_'+index).value = pelaksanaanData[temp] 
    }

    pelaksanaanData.belanja_details.forEach(recordDetails => {
      loadPelaksanaanDetails(recordDetails,$years)
    })
    

  }

  function loadPelaksanaanDetails(recordDetails,$years)
  {

    if(recordDetails.type == 'VA' || recordDetails.type == 'VE' || recordDetails.type == 'VR') {
      document.getElementById('text2'+ recordDetails.type).value = recordDetails.nilai1
      document.getElementById('nilaiMesyuarat'+ recordDetails.type).value = recordDetails.nilai1  
      document.getElementById('unitMesyuarat'+ recordDetails.type).value = recordDetails.unit
    }

    document.getElementById('text1'+ recordDetails.type).value = recordDetails.rm
    document.getElementById('RMMesyuarat'+ recordDetails.type).value = recordDetails.rm
    document.getElementById('kadarMesyuarat'+ recordDetails.type).value = recordDetails.kadar_unit
    document.getElementById('nilai2Mesyuarat'+ recordDetails.type).value = recordDetails.nilai2
    document.getElementById('hariMesyuarat'+ recordDetails.type).value = recordDetails.kali
    document.getElementById('jumlah1Mesyuarat'+ recordDetails.type).value = recordDetails.jumlah
    

    switch (recordDetails.type) {
      case 'VA':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm1_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat1').value = recordDetails.jumlahRMK
        break;
    
      case 'VE':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm2_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat2').value = recordDetails.jumlahRMK
        break;

      case 'VR':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm3_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat3').value = recordDetails.jumlahRMK
        break;

      case 'PD':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm4_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat4').value = recordDetails.jumlahRMK
        break;

      case 'PE':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm5_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat5').value = recordDetails.jumlahRMK
        break;

      case 'PF':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm6_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat6').value = recordDetails.jumlahRMK
        break;

      case 'PG':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm7_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat7').value = recordDetails.jumlahRMK
        break;

      case 'PH':
        for (let index = 0; index < $years.length; index++) {
          temp = `yr_` + (parseInt(index) + 1)
          document.getElementById('sprm8_'+index).value = recordDetails[temp] 
        }
        document.getElementById('jumlah1RMKMesyuarat8').value = recordDetails.jumlahRMK
        break;
      default:
        break;
    }
    // for (let index = 0; index < $years.length; index++) {
    //   temp = `yr_` + (parseInt(index) + 1)
    //   document.getElementById('sprm1_'+index).value = recordDetails[temp] 
    // }
    // document.getElementById('jumlah1RMKMesyuarat'+ recordDetails.type).value = recordDetails.jumlah
  }

  function getSillingColumn($years,rowNo)
  {
    sillingTd = ''
    for (let index = 0; index < $years.length; index++) {
      template = `<td>
                    <input type="text" class="form-control sprm${rowNo}_${index}" name="sprm${rowNo}_${index}" id="sprm${rowNo}_${index}" value="0">
                  </td>`

      sillingTd = sillingTd + template         
    }

    return sillingTd
  }

  function assignEventListenerForSilling($years) {
    // Attach event listeners to the input elements
    for (let rowNo = 1; rowNo < 8; rowNo++) {
      for (let index = 0; index <= $years.length; index++) {
        const inputElement = document.getElementById(`sprm${rowNo}_${index}`);
        if(inputElement) {
          inputElement.addEventListener('input', function() {
          calculatePelaksanaan($years); 
        });
        }
        
      }
    }
    
  }

  function calculatePelaksanaan($years) {
    for (let index = 1; index <= 8; index++) {
      rowSum = 0
      for (let indexj = 0 ;indexj <= $years.length; indexj++) {
        const inputRowElement = document.getElementById(`sprm${index}_${indexj}`);
        if(inputRowElement) {
          rowSum = parseFloat(inputRowElement.value ) + parseFloat(rowSum) 
        }
      }
      const jumlahRMKElement = document.getElementById(`jumlah1RMKMesyuarat${index}`);
      jumlahRMKElement.value = rowSum.toFixed(2)
    }

    for (let indexj = 0; indexj <= $years.length; indexj++) {
      columnSum = 0
      for (let index = 1; index <= 8; index++) {
        const inputColumnElement = document.getElementById(`sprm${index}_${indexj}`);
        if(inputColumnElement) {
          columnSum = parseFloat(inputColumnElement.value ) + parseFloat(columnSum)
        }
      }
      const jumlahColumnElement = document.getElementById(`sprmjumlah_${indexj}`);
      if(jumlahColumnElement) {
        jumlahColumnElement.value = columnSum.toFixed(2)
      }
      
    }
    updateFinalJumalh()
    
  }

  async function pelaksaanRow(projectData) {
    const tableBody = document.getElementById("tableBody");
    $years = getYears(projectData.tahun_jangka_mula, projectData.tahun_jangka_siap)
    
    mainheadcolspan = 12 + $years.length
    headingRow = `<tr>
                <td colspan="`+mainheadcolspan+`"> 1. PELAKSANAAN MESYUARAT<br><br><u>JENIS KAJIAN</u>
                </td>
                  </tr>`

    $('#tableBody').append(headingRow);

    
    await firstRowPelaksanaan()
    await secondRowPelaksanaan()
    await thirdRowPelaksanaan()
    await fourthRowPelaksanaan()
    await fifthRowPelaksanaan()
    await sixthRowPelaksanaan()
    await seventhRowPelaksanaan()
    await eigthRowPelaksanaan()

    const sillingspan = document.getElementById('belanjaSillingspan')
    const tahunspan = document.getElementById('belanjaTahunspan')
    sillingspan.colSpan = $years.length;
    tahunspan.colSpan = $years.length;

    jumlahRow()
    assignEventListenerForSilling($years)

  }

  function firstRowPelaksanaan()
  {
    firstRow = `<tr>
                  <td colspan="">
                          a. Mesyuarat Kajian Nilai (VA) </br>
                            Anggaran RM<input type="text" class="text1VA" name="text1VA" id="text1VA" value="" style="border:none;width:50px" readonly>
                            /orang bagi satu malam merangkumi</br>
                            sewaan dewan dan makan/minum sebanyak 6 kali (<input type="text" class="text2VA" name="text2VA" id="text2VA" value="" style="border:none;width:50px" readonly> orang)
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratVA" name="nilaiMesyuaratVA" id="nilaiMesyuaratVA" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratVA" name="unitMesyuaratVA" id="unitMesyuaratVA" value="Org" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratVA" name="RMMesyuaratVA" id="RMMesyuaratVA" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratVA" name="kadarMesyuaratVA" id="kadarMesyuaratVA" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratVA" name="nilai2MesyuaratVA" id="nilai2MesyuaratVA" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratVA" name="hariMesyuaratVA" id="hariMesyuaratVA" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratVA" name="jumlah1MesyuaratVA" id="jumlah1MesyuaratVA" value="0" readonly>
                  </td>
                  <td rowspan="8">
                    <input type="text" class="form-control peratus1Pelaksanaan" name="peratus1Pelaksanaan" id="peratus1Pelaksanaan" value="0" readonly>
                  </td>
                  `+getSillingColumn($years,1)+`
                    <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat1" name="jumlah1RMKMesyuarat1" id="jumlah1RMKMesyuarat1" value="0" readonly>
                    </td>
                    <td rowspan="8">
                    <input type="text" class="form-control peratus2Pelaksanaan" name="peratus2Pelaksanaan" id="peratus2Pelaksanaan" value="0" readonly>
                  </td>
                  
                </tr>`
      $('#tableBody').append(firstRow);

      //assignEventListenerForSilling($years,1)

      const nilaiMesyuaratVA = document.getElementById("nilaiMesyuaratVA");
      const RMMesyuaratVA = document.getElementById("RMMesyuaratVA");
      const nilai2MesyuaratVA = document.getElementById("nilai2MesyuaratVA");
      const jumlah1MesyuaratVA = document.getElementById("jumlah1MesyuaratVA");

      // Add change event listeners to the input elements
      nilaiMesyuaratVA.addEventListener("input", updateJumlah1MesyuaratVA);
      RMMesyuaratVA.addEventListener("input", updateJumlah1MesyuaratVA);
      nilai2MesyuaratVA.addEventListener("input", updateJumlah1MesyuaratVA);
      nilaiMesyuaratVA.addEventListener("input", updateText2VA);
      RMMesyuaratVA.addEventListener("input", updateText1VA);
  }

  // Function to update jumlah1MesyuaratVA
  function updateJumlah1MesyuaratVA() {
    const nilaiValue = parseFloat(nilaiMesyuaratVA.value);
    const RMValue = parseFloat(RMMesyuaratVA.value);
    const nilai2Value = parseFloat(nilai2MesyuaratVA.value);
    jumlah1MesyuaratVA.value = (nilaiValue * RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }


  // Function to update text2VA
  function updateText2VA() {
    const text2VA = document.getElementById("text2VA");
    text2VA.value = nilaiMesyuaratVA.value;
  }

  // Function to update text1VA
  function updateText1VA() {
    const text1VA = document.getElementById("text1VA");
    text1VA.value = RMMesyuaratVA.value;
  }


  function secondRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  b. Mesyuarat Kejuruteraan Nilai (VE)</br>
                    Anggaran RM<input type="text" class="text1VE" name="text1VE" id="text1VE"  style="border:none;width:50px" readonly>/orang bagi satu malam merangkumi</br>
                    sewaan dewan dan makan/minum sebanyak 6 kali (<input type="text" class="text2VE" name="text2VE" id="text2VE"  style="border:none;width:50px" readonly> orang)
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratVE" name="nilaiMesyuaratVE" id="nilaiMesyuaratVE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratVE" name="unitMesyuaratVE" id="unitMesyuaratVE" value="Org" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratVE" name="RMMesyuaratVE" id="RMMesyuaratVE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratVE" name="kadarMesyuaratVE" id="kadarMesyuaratVE" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratVE" name="nilai2MesyuaratVE" id="nilai2MesyuaratVE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratVE" name="hariMesyuaratVE" id="hariMesyuaratVE" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratVE" name="jumlah1MesyuaratVE" id="jumlah1MesyuaratVE" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,2)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat2" name="jumlah1RMKMesyuarat2" id="jumlah1RMKMesyuarat2" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,2)

      const nilaiMesyuaratVE = document.getElementById("nilaiMesyuaratVE");
      const RMMesyuaratVE = document.getElementById("RMMesyuaratVE");
      const nilai2MesyuaratVE = document.getElementById("nilai2MesyuaratVE");
      const jumlah1MesyuaratVE = document.getElementById("jumlah1MesyuaratVE");

      // Add change event listeners to the input elements
      nilaiMesyuaratVE.addEventListener("input", updateJumlah1MesyuaratVE);
      RMMesyuaratVE.addEventListener("input", updateJumlah1MesyuaratVE);
      nilai2MesyuaratVE.addEventListener("input", updateJumlah1MesyuaratVE);
      nilaiMesyuaratVE.addEventListener("input", updateText2VE);
      RMMesyuaratVE.addEventListener("input", updateText1VE);
  }

  // Function to update jumlah1MesyuaratVE
  function updateJumlah1MesyuaratVE() {
    const nilaiValue = parseFloat(nilaiMesyuaratVE.value);
    const RMValue = parseFloat(RMMesyuaratVE.value);
    const nilai2Value = parseFloat(nilai2MesyuaratVE.value);
    jumlah1MesyuaratVE.value = (nilaiValue * RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2VE
  function updateText2VE() {
    const text2VE = document.getElementById("text2VE");
    text2VE.value = nilaiMesyuaratVE.value;
  }

  // Function to update text1VE
  function updateText1VE() {
    const text1VE = document.getElementById("text1VE");
    text1VE.value = RMMesyuaratVE.value;
  }


  function thirdRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  c. Mesyuarat Semakan Nilai (VR) bukan Mesyuarat Kajian Kejuruteraan (VR)</br>
                    Anggaran RM<input type="text" class="text1VR" name="text1VR" id="text1VR" value="" style="border:none;width:50px" readonly>/orang bagi satu malam merangkumi</br>
                    sewaan dewan dan makan/minum sebanyak 6 kali (<input type="text" class="text2VR" name="text2VR" id="text2VR" value="" style="border:none;width:50px" readonly> orang)
                  </td>
                  <td>
                    <input type="text" class="form-control nilaiMesyuaratVR" name="nilaiMesyuaratVR" id="nilaiMesyuaratVR" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control unitMesyuaratVR" name="unitMesyuaratVR" id="unitMesyuaratVR" value="Org" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratVR" name="RMMesyuaratVR" id="RMMesyuaratVR" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratVR" name="kadarMesyuaratVR" id="kadarMesyuaratVR" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratVR" name="nilai2MesyuaratVR" id="nilai2MesyuaratVR" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratVR" name="hariMesyuaratVR" id="hariMesyuaratVR" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratVR" name="jumlah1MesyuaratVR" id="jumlah1MesyuaratVR" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,3)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat3" name="jumlah1RMKMesyuarat3" id="jumlah1RMKMesyuarat3" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,3)

      const nilaiMesyuaratVR = document.getElementById("nilaiMesyuaratVR");
      const RMMesyuaratVR = document.getElementById("RMMesyuaratVR");
      const nilai2MesyuaratVR = document.getElementById("nilai2MesyuaratVR");
      const jumlah1MesyuaratVR = document.getElementById("jumlah1MesyuaratVR");

      // Add change event listeners to the input elements
      nilaiMesyuaratVR.addEventListener("input", updateJumlah1MesyuaratVR);
      RMMesyuaratVR.addEventListener("input", updateJumlah1MesyuaratVR);
      nilai2MesyuaratVR.addEventListener("input", updateJumlah1MesyuaratVR);
      nilaiMesyuaratVR.addEventListener("input", updateText2VR);
      RMMesyuaratVR.addEventListener("input", updateText1VR);
  }

  // Function to update jumlah1MesyuaratVR
  function updateJumlah1MesyuaratVR() {
    const nilaiValue = parseFloat(nilaiMesyuaratVR.value);
    const RMValue = parseFloat(RMMesyuaratVR.value);
    const nilai2Value = parseFloat(nilai2MesyuaratVR.value);
    jumlah1MesyuaratVR.value = (nilaiValue * RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2VR
  function updateText2VR() {
    const text2VR = document.getElementById("text2VR");
    text2VR.value = nilaiMesyuaratVR.value;
  }

  // Function to update text1VR
  function updateText1VR() {
    const text1VR = document.getElementById("text1VR");
    text1VR.value = RMMesyuaratVR.value;
  }




  function fourthRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  d. Mesyuarat Tapak</br>
                    <input type="text" class="text1PD" name="text1PD" id="text1PD" value="" style="border:none;width:50px" readonly> kali Mesyuarat Tapak dilaksanakan (Setiap bulan)
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratPD" name="RMMesyuaratPD" id="RMMesyuaratPD" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratPD" name="kadarMesyuaratPD" id="kadarMesyuaratPD" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratPD" name="nilai2MesyuaratPD" id="nilai2MesyuaratPD" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratPD" name="hariMesyuaratPD" id="hariMesyuaratPD" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratPD" name="jumlah1MesyuaratPD" id="jumlah1MesyuaratPD" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,4)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat4" name="jumlah1RMKMesyuarat4" id="jumlah1RMKMesyuarat4" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,4)

      const RMMesyuaratPD = document.getElementById("RMMesyuaratPD");
      const nilai2MesyuaratPD = document.getElementById("nilai2MesyuaratPD");
      const jumlah1MesyuaratPD = document.getElementById("jumlah1MesyuaratPD");

      // Add change event listeners to the input elements
      RMMesyuaratPD.addEventListener("input", updateJumlah1MesyuaratPD);
      nilai2MesyuaratPD.addEventListener("input", updateJumlah1MesyuaratPD);
      RMMesyuaratPD.addEventListener("input", updateText1PD);
  }

  // Function to update jumlah1MesyuaratVR
  function updateJumlah1MesyuaratPD() {
    const RMValue = parseFloat(RMMesyuaratPD.value);
    const nilai2Value = parseFloat(nilai2MesyuaratPD.value);
    jumlah1MesyuaratPD.value = ( RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2PD
  function updateText2PD() {
    const text2PD = document.getElementById("text2PD");
    text2PD.value = nilaiMesyuaratPD.value;
  }

  // Function to update text1PD
  function updateText1PD() {
    const text1PD = document.getElementById("text1PD");
    text1PD.value = RMMesyuaratPD.value;
  }

  function fifthRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  e. Mesyuarat Teknikal</br>
                    <input type="text" class="text1PE" name="text1PE" id="text1PE" value="" style="border:none;width:50px" readonly> kali Mesyuarat Teknikal dilaksanakan (Sekali setiap dua (2) bulan)
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratPE" name="RMMesyuaratPE" id="RMMesyuaratPE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratPE" name="kadarMesyuaratPE" id="kadarMesyuaratPE" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratPE" name="nilai2MesyuaratPE" id="nilai2MesyuaratPE" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratPE" name="hariMesyuaratPE" id="hariMesyuaratPE" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratPE" name="jumlah1MesyuaratPE" id="jumlah1MesyuaratPE" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,5)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat5" name="jumlah1RMKMesyuarat5" id="jumlah1RMKMesyuarat5" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,5)


      const RMMesyuaratPE = document.getElementById("RMMesyuaratPE");
      const nilai2MesyuaratPE = document.getElementById("nilai2MesyuaratPE");
      const jumlah1MesyuaratPE = document.getElementById("jumlah1MesyuaratPE");

      // Add change event listeners to the input elements
      RMMesyuaratPE.addEventListener("input", updateJumlah1MesyuaratPE);
      nilai2MesyuaratPE.addEventListener("input", updateJumlah1MesyuaratPE);
      RMMesyuaratPE.addEventListener("input", updateText1PE);
  }

  // Function to update jumlah1MesyuaratVR
  function updateJumlah1MesyuaratPE() {
    const RMValue = parseFloat(RMMesyuaratPE.value);
    const nilai2Value = parseFloat(nilai2MesyuaratPE.value);
    jumlah1MesyuaratPE.value = ( RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2PE
  function updateText2PE() {
    const text2PE = document.getElementById("text2PE");
    text2PE.value = nilaiMesyuaratPE.value;
  }

  // Function to update text1PE
  function updateText1PE() {
    const text1PE = document.getElementById("text1PE");
    text1PE.value = RMMesyuaratPE.value;
  }



  function sixthRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  f. Mesyuarat Pemantauan</br>
                    <input type="text" class="text1PF" name="text1PF" id="text1PF" value="" style="border:none;width:50px" readonly> kali Mesyuarat Pemantauan dilaksanakan (kali setahun * tempoh projek)
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratPF" name="RMMesyuaratPF" id="RMMesyuaratPF" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratPF" name="kadarMesyuaratPF" id="kadarMesyuaratPF" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratPF" name="nilai2MesyuaratPF" id="nilai2MesyuaratPF" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratPF" name="hariMesyuaratPF" id="hariMesyuaratPF" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratPF" name="jumlah1MesyuaratPF" id="jumlah1MesyuaratPF" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,6)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat6" name="jumlah1RMKMesyuarat6" id="jumlah1RMKMesyuarat6" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,6)

      const RMMesyuaratPF = document.getElementById("RMMesyuaratPF");
      const nilai2MesyuaratPF = document.getElementById("nilai2MesyuaratPF");
      const jumlah1MesyuaratPF = document.getElementById("jumlah1MesyuaratPF");

      // Add change event listeners to the input elements
      RMMesyuaratPF.addEventListener("input", updateJumlah1MesyuaratPF);
      nilai2MesyuaratPF.addEventListener("input", updateJumlah1MesyuaratPF);
      RMMesyuaratPF.addEventListener("input", updateText1PF);
  }

  // Function to update jumlah1MesyuaratVR
  function updateJumlah1MesyuaratPF() {
    const RMValue = parseFloat(RMMesyuaratPF.value);
    const nilai2Value = parseFloat(nilai2MesyuaratPF.value);
    jumlah1MesyuaratPF.value = ( RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2PF
  function updateText2PF() {
    const text2PF = document.getElementById("text2PF");
    text2PF.value = nilaiMesyuaratPF.value;
  }

  // Function to update text1PF
  function updateText1PF() {
    const text1PF = document.getElementById("text1PF");
    text1PF.value = RMMesyuaratPF.value;
  }

  function seventhRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  g. Mesyuarat Kemajuan Perunding</br>
                    <input type="text" class="text1PG" name="text1PG" id="text1PG" value="" style="border:none;width:50px" readonly> kali Mesyuarat Kemajuan Perunding dilaksanakan (mengikut peringkat rekabentuk)
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratPG" name="RMMesyuaratPG" id="RMMesyuaratPG" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratPG" name="kadarMesyuaratPG" id="kadarMesyuaratPG" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratPG" name="nilai2MesyuaratPG" id="nilai2MesyuaratPG" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratPG" name="hariMesyuaratPG" id="hariMesyuaratPG" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratPG" name="jumlah1MesyuaratPG" id="jumlah1MesyuaratPG" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,7)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat7" name="jumlah1RMKMesyuarat7" id="jumlah1RMKMesyuarat7" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,7)


      const RMMesyuaratPG = document.getElementById("RMMesyuaratPG");
      const nilai2MesyuaratPG = document.getElementById("nilai2MesyuaratPG");
      const jumlah1MesyuaratPG = document.getElementById("jumlah1MesyuaratPG");

      // Add change event listeners to the input elements
      RMMesyuaratPG.addEventListener("input", updateJumlah1MesyuaratPG);
      nilai2MesyuaratPG.addEventListener("input", updateJumlah1MesyuaratPG);
      RMMesyuaratPG.addEventListener("input", updateText1PG);
  }

  // Function to update jumlah1MesyuaratVR
  function updateJumlah1MesyuaratPG() {
    const RMValue = parseFloat(RMMesyuaratPG.value);
    const nilai2Value = parseFloat(nilai2MesyuaratPG.value);
    jumlah1MesyuaratPG.value = ( RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2PG
  function updateText2PG() {
    const text2PG = document.getElementById("text2PG");
    text2PG.value = nilaiMesyuaratPG.value;
  }

  // Function to update text1PG
  function updateText1PG() {
    const text1PG = document.getElementById("text1PG");
    text1PG.value = RMMesyuaratPG.value;
  }

  function eigthRowPelaksanaan()
  {
    Row = `<tr>
                  <td colspan="">
                  h. Mesyuarat Stakeholder Engagement</br>
                    <input type="text" class="text1PH" name="text1PH" id="text1PH" value="" style="border:none;width:50px" readonly> kali Mesyuarat Stakeholder Engagement dilaksanakan 
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    <input type="text" class="form-control RMMesyuaratPH" name="RMMesyuaratPH" id="RMMesyuaratPH" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control kadarMesyuaratPH" name="kadarMesyuaratPH" id="kadarMesyuaratPH" value="Kadar Unit" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control nilai2MesyuaratPH" name="nilai2MesyuaratPH" id="nilai2MesyuaratPH" value="0">
                  </td>
                  <td>
                    <input type="text" class="form-control hariMesyuaratPH" name="hariMesyuaratPH" id="hariMesyuaratPH" value="Hari" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control jumlah1MesyuaratPH" name="jumlah1MesyuaratPH" id="jumlah1MesyuaratPH" value="0" readonly>
                  </td>
                  
                  `+getSillingColumn($years,8)+`
                  <td>
                      <input type="text" class="form-control jumlah1RMKMesyuarat8" name="jumlah1RMKMesyuarat8" id="jumlah1RMKMesyuarat8" value="0" readonly>
                    </td>
                </tr>`
      $('#tableBody').append(Row);
      //assignEventListenerForSilling($years,8)


      const RMMesyuaratPH = document.getElementById("RMMesyuaratPH");
      const nilai2MesyuaratPH = document.getElementById("nilai2MesyuaratPH");
      const jumlah1MesyuaratPH = document.getElementById("jumlah1MesyuaratPH");

      // Add change event listeners to the input elements
      RMMesyuaratPH.addEventListener("input", updateJumlah1MesyuaratPH);
      nilai2MesyuaratPH.addEventListener("input", updateJumlah1MesyuaratPH);
      RMMesyuaratPH.addEventListener("input", updateText1PH);
  }

  // Function to update jumlah1MesyuaratVR
  function updateJumlah1MesyuaratPH() {
    const RMValue = parseFloat(RMMesyuaratPH.value);
    const nilai2Value = parseFloat(nilai2MesyuaratPH.value);
    jumlah1MesyuaratPH.value = ( RMValue * nilai2Value).toFixed(2);
    updateFinalJumalh()
  }

  // Function to update text2PH
  function updateText2PH() {
    const text2PH = document.getElementById("text2PH");
    text2PH.value = nilaiMesyuaratPH.value;
  }

  // Function to update text1PH
  function updateText1PH() {
    const text1PH = document.getElementById("text1PH");
    text1PH.value = RMMesyuaratPH.value;
  }


  function jumlahRow() {
    Row = `<tr style="background-color:#39afd1;">
        <td colspan="7" class="text-white text-right JumLanja">
                                  JUMLAH (RM)
                                </td>    
                                <td><input type="text" class="form-control pelaksanaanFinalJumLan" name="pelaksanaanFinalJumLan" id="pelaksanaanFinalJumLan" value="0" readonly></td>
                                <td></td>
                                `+getSillingColumn($years,'jumlah')+`
                                <td><input type="text" class="form-control pelaksanaanFinalRMKJumLan" name="pelaksanaanFinalRMKJumLan" id="pelaksanaanFinalRMKJumLan" value="0" readonly></td>
      </tr>`;

      $('#tableBody').append(Row);
  }

  function updateFinalJumalh() {
    const jumlah1MesyuaratVA = document.getElementById("jumlah1MesyuaratVA");
    const jumlah1MesyuaratVE = document.getElementById("jumlah1MesyuaratVE");
    const jumlah1MesyuaratVR = document.getElementById("jumlah1MesyuaratVR");
    const jumlah1MesyuaratPD = document.getElementById("jumlah1MesyuaratPD");
    const jumlah1MesyuaratPE = document.getElementById("jumlah1MesyuaratPE");
    const jumlah1MesyuaratPF = document.getElementById("jumlah1MesyuaratPF");
    const jumlah1MesyuaratPG = document.getElementById("jumlah1MesyuaratPG");
    const jumlah1MesyuaratPH = document.getElementById("jumlah1MesyuaratPH");
    const finalJumlah = document.getElementById("pelaksanaanFinalJumLan");

    total = parseFloat(jumlah1MesyuaratVA.value) +
                        parseFloat(jumlah1MesyuaratVE.value) +
                        parseFloat(jumlah1MesyuaratVR.value) +
                        parseFloat(jumlah1MesyuaratPD.value) +
                        parseFloat(jumlah1MesyuaratPE.value) +
                        parseFloat(jumlah1MesyuaratPF.value) +
                        parseFloat(jumlah1MesyuaratPG.value) +
                        parseFloat(jumlah1MesyuaratPH.value)

    finalJumlah.value = total.toFixed(2)

    totalRMK = 0
    for (let index = 1; index < 8; index++) {
      temp = document.getElementById("jumlah1RMKMesyuarat"+index)
      if(temp) {
        totalRMK =  parseFloat(totalRMK)  + parseFloat(temp.value)
      }
    }

    document.getElementById("pelaksanaanFinalRMKJumLan").value = totalRMK.toFixed(2)

  }

  function getPelaksanaanTableValue() {

    pelaksanaanTableData = {
      "pertaus1" : document.getElementById("peratus1Pelaksanaan").value,
      "pertaus2" : document.getElementById("peratus2Pelaksanaan").value,
      "VA" : {
        "nilai1" :  document.getElementById("nilaiMesyuaratVA").value,
        "unit" : document.getElementById("unitMesyuaratVA").value,
        "rm" : document.getElementById("RMMesyuaratVA").value,
        "kadarunit" : document.getElementById("kadarMesyuaratVA").value,
        "nilai2" : document.getElementById("nilai2MesyuaratVA").value,
        "kali" : document.getElementById("hariMesyuaratVA").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratVA").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat1").value,
        "siling" : []
      },
      "VE" : {
        "nilai1" :  document.getElementById("nilaiMesyuaratVE").value,
        "unit" : document.getElementById("unitMesyuaratVE").value,
        "rm" : document.getElementById("RMMesyuaratVE").value,
        "kadarunit" : document.getElementById("kadarMesyuaratVE").value,
        "nilai2" : document.getElementById("nilai2MesyuaratVE").value,
        "kali" : document.getElementById("hariMesyuaratVE").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratVE").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat2").value,
        "siling" : []
      },
      "VR" : {
        "nilai1" :  document.getElementById("nilaiMesyuaratVR").value,
        "unit" : document.getElementById("unitMesyuaratVR").value,
        "rm" : document.getElementById("RMMesyuaratVR").value,
        "kadarunit" : document.getElementById("kadarMesyuaratVR").value,
        "nilai2" : document.getElementById("nilai2MesyuaratVR").value,
        "kali" : document.getElementById("hariMesyuaratVR").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratVR").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat3").value,
        "siling" : []
      },
      "PD" : {
        "nilai1" :  0,
        "unit" : '',
        "rm" : document.getElementById("RMMesyuaratPD").value,
        "kadarunit" : document.getElementById("kadarMesyuaratPD").value,
        "nilai2" : document.getElementById("nilai2MesyuaratPD").value,
        "kali" : document.getElementById("hariMesyuaratPD").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratPD").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat4").value,
        "siling" : []
      },
      "PE" : {
        "nilai1" :  0,
        "unit" : '',
        "rm" : document.getElementById("RMMesyuaratPE").value,
        "kadarunit" : document.getElementById("kadarMesyuaratPE").value,
        "nilai2" : document.getElementById("nilai2MesyuaratPE").value,
        "kali" : document.getElementById("hariMesyuaratPE").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratPE").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat5").value,
        "siling" : []
      },
      "PF" : {
        "nilai1" :  0,
        "unit" : '',
        "rm" : document.getElementById("RMMesyuaratPF").value,
        "kadarunit" : document.getElementById("kadarMesyuaratPF").value,
        "nilai2" : document.getElementById("nilai2MesyuaratPF").value,
        "kali" : document.getElementById("hariMesyuaratPF").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratPF").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat6").value,
        "siling" : []
      },
      "PG" : {
        "nilai1" :  0,
        "unit" : '',
        "rm" : document.getElementById("RMMesyuaratPG").value,
        "kadarunit" : document.getElementById("kadarMesyuaratPG").value,
        "nilai2" : document.getElementById("nilai2MesyuaratPG").value,
        "kali" : document.getElementById("hariMesyuaratPG").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratPG").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat7").value,
        "siling" : []
      },
      "PH" : {
        "nilai1" :  0,
        "unit" : '',
        "rm" : document.getElementById("RMMesyuaratPH").value,
        "kadarunit" : document.getElementById("kadarMesyuaratPH").value,
        "nilai2" : document.getElementById("nilai2MesyuaratPH").value,
        "kali" : document.getElementById("hariMesyuaratPH").value,
        "jumlah1" : document.getElementById("jumlah1MesyuaratPH").value,
        "jumlah2" : document.getElementById("jumlah1RMKMesyuarat8").value,
        "siling" : []
      },
      "Jumlah" : {
        "jumlah1" : document.getElementById("pelaksanaanFinalJumLan").value ? document.getElementById("pelaksanaanFinalJumLan").value:0,
        "silling" : [],
        "jumlahRMK" : document.getElementById("pelaksanaanFinalRMKJumLan").value,
      }
    }

    $years = getYears(projectData.tahun_jangka_mula, projectData.tahun_jangka_siap)
    
    vaSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      vaSillingArray.push(document.getElementById(`sprm1_${index}`).value)
    }
    pelaksanaanTableData.VA.siling = vaSillingArray;

    veSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      veSillingArray.push(document.getElementById(`sprm2_${index}`).value)
    }
    pelaksanaanTableData.VE.siling = veSillingArray;

    vrSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      vrSillingArray.push(document.getElementById(`sprm3_${index}`).value)
    }
    pelaksanaanTableData.VR.siling = vrSillingArray;

    pdSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      pdSillingArray.push(document.getElementById(`sprm4_${index}`).value)
    }
    pelaksanaanTableData.PD.siling = pdSillingArray;

    peSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      peSillingArray.push(document.getElementById(`sprm5_${index}`).value)
    }
    pelaksanaanTableData.PE.siling = peSillingArray;

    pfSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      pfSillingArray.push(document.getElementById(`sprm6_${index}`).value)
    }
    pelaksanaanTableData.PF.siling = pfSillingArray;

    pgSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      pgSillingArray.push(document.getElementById(`sprm7_${index}`).value)
    }
    pelaksanaanTableData.PG.siling = pgSillingArray;

    phSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      phSillingArray.push(document.getElementById(`sprm8_${index}`).value)
    }
    pelaksanaanTableData.PH.siling = phSillingArray;

    jumlahSillingArray = []
    for (let index = 0; index < $years.length; index++) {
      jumlahSillingArray.push(document.getElementById(`sprmjumlah_${index}`).value)
    }
    pelaksanaanTableData.Jumlah.silling = jumlahSillingArray;

    return pelaksanaanTableData
  }
</script>