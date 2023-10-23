<script>
  function nf() {
    $('.input-element').toArray().forEach(function(field) {
      // Get the current input value
      var inputValue = $(field).val();

      // Check if inputValue is a valid number and not empty
      if (!isNaN(inputValue) && inputValue !== '') {
        // Convert the inputValue to a number and format it to have two decimal places
        var formattedValue = parseFloat(inputValue).toFixed(2);

        // Update the input field with the formatted value
        $(field).val(formattedValue);
      }

      // Apply Cleave formatting
      new Cleave(field, {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
      });
    });
  }
  
  $(document).ready(async function() {
    totalTuntutanCounter = 0
    tuntutanASubRowCounter = 0
    tuntutanBSubRowCounter = 0
    tuntutanCSubRowCounter = 0
    tuntutanDSubRowCounter = 0
    rowSpanCounter = 0
    $years = []
    await axios({
            method: 'get',
            url: global_api_url + "api/project/projects/" + $("#project_id").val(),
            responseType: 'json',
        })
        .then(async function(response) {
            if (response.data.code == 200) {
              console.log('project details');
              console.log(response);
              await pelaksaanRow(response.data.data)   
              await documentRow(response.data.data)
              await tuntutanRow(response.data.data)
            } 
        })
        .catch(function(error) {
            console.log(error);
        })


    axios({
        method: 'get',
        url: global_api_url + "api/project/kewangan/belanja_mengurus",
        responseType: 'json',
        params: {
          project_id: $("#project_id").val(),
        }
      })
      .then(function(response) {
        if (response.data.code == 200) {
          loadBelanjaData(response.data.data)
          console.log(response);
        }
      })
      .catch(function(error) {
        console.log(error);
      })

    // getPelaksanaanTableValue()
  })

  async function loadBelanjaData(belanjaData) {
    
    await belanjaData.forEach(record => {
      if (record.type == 'pelaksanaan') {
        loadPelaksanaanData(record)
      }

      if(record.type == 'documentasi') {
        loadDocumentasiData(record)
      }

      if(record.type == 'tuntutan') {
        loadTuntutanData(record)
      }
    })
    
    if(belanjaData.length == 0) {
        initializeRowTable()
      }
    
  }

  function submitBelanjaMengurus() {
    var formDataBelanja = new FormData();

    pelaksanaanTableData = getPelaksanaanTableValue()
    documentasiTableData = getDocumentasiTableValue()
    tuntutanTableData = getTuntutanTableValue()
    
    formDataBelanja.append('pelaksanaanTableData', JSON.stringify(pelaksanaanTableData))
    formDataBelanja.append('documentasiTableData', JSON.stringify(documentasiTableData))
    formDataBelanja.append('tuntutanTableData', JSON.stringify(tuntutanTableData))
    formDataBelanja.append("permohonan_projek_id",$("#project_id").val());

    formDataBelanja.append('user_id', global_user_id)
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')

    axios({
        method: 'post',
        url: global_api_url + "api/project/kewangan/belanja_mengurus",
        responseType: 'json',
        data: formDataBelanja
      })
      .then(function(response) {
        if (response.data.code == 200) {
          console.log('ok');
        } else {
          alert('error while saving project')
        }
      })
      .catch(function(error) {
        console.log(error);
      })
  }

  function getSillingColumnFinal(type,$years,rowNo){
        sillingTd = ''
        for (let index = 0; index < $years.length; index++) {
        template = `<td style="background-color :white;border-bottom-color:white">
                        <input type="text" class="form-control sfrm${type}_${index}" name="sfrm${type}_${index}" id="sfrm${type}_${index}" value="0">
                    </td>`

        sillingTd = sillingTd + template         
        }

        return sillingTd
    }


  function finalJumlahBelanja() {
    Row = `<tr style="background-color:#39afd1;">
            <td colspan="7" class="text-white text-right JumLanja">
                                JUMLAH KESELURUHAN (RM)
                                    </td>    
                                    <td><input type="text" class="form-control FinalJumlaKeseluruhan" name="FinalJumlaKeseluruhan" id="FinalJumlaKeseluruhan" readonly></td>
                                    <td></td>
                                    `+getSillingColumnFinal('jumlahFinal',$years,0)+`
                                    <td><input type="text" class="form-control FinalJumlaKeseluruhanRMK" name="FinalJumlaKeseluruhanRMK" id="FinalJumlaKeseluruhanRMK" value="0" readonly></td>
        </tr>`;

        $('#tableBody').append(Row);

        FinalJumlaKeseluruhan = parseFloat(document.getElementById('pelaksanaanFinalJumLan').value  ) +
                                                                  parseFloat(document.getElementById('documentasiFinalJumLan').value  ) +
                                                                  parseFloat(document.getElementById('tuntutanFinalJumLan').value  ) 
          document.getElementById('FinalJumlaKeseluruhan').value = FinalJumlaKeseluruhan.toFixed(2)

          FinalJumlaKeseluruhanRMK = parseFloat(document.getElementById('pelaksanaanFinalRMKJumLan').value  ) +
                                                                  parseFloat(document.getElementById('documentasiFinalRMKJumLan').value  ) +
                                                                  parseFloat(document.getElementById('tuntutanFinalRMKJumLan').value  ) 
          document.getElementById('FinalJumlaKeseluruhanRMK').value = FinalJumlaKeseluruhanRMK.toFixed(2)

          for (let index = 0; index < $years.length; index++) {
              total = parseFloat(document.getElementById('sprmjumlah_' + index).value  ) +
                      parseFloat(document.getElementById('sdrmjumlah_' + index).value  ) +
                      parseFloat(document.getElementById('strmjumlah_' + index).value  ) 
              document.getElementById('sfrmjumlahFinal_' + index).value = total.toFixed(2)
          }
  }
</script>