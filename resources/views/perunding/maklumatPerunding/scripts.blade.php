<script>
$(document).ready(async function() {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    $("#lsst_file_name").on("change", function() {
        var file_name2 = $("#lsst_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreviewLsst").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
        $("#fileNameLsst").text(file_name2);
        $("#UploadfileLsst").addClass('d-none')
        $("#fileUploadedLsst").removeClass('d-none')

    });
    $("#removefileLsst").click(function() {
        $("#lsst_file_name").val('')
        $("#filePreviewLsst").attr('src', '');
        $("#UploadfileLsst").removeClass('d-none')
        $("#fileUploadedLsst").addClass('d-none')
    })

    $("#Tr_file_name").on("change", function() {
        var file_name2 = $("#Tr_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreviewTr").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
        $("#fileNameTr").text(file_name2);
        $("#UploadfileTr").addClass('d-none')
        $("#fileUploadedTr").removeClass('d-none')

    });
    $("#removefileTr").click(function() {
        $("#Tr_file_name").val('')
        $("#filePreviewTr").attr('src', '');
        $("#UploadfileTr").removeClass('d-none')
        $("#fileUploadedTr").addClass('d-none')
    })


    $("#sb_file_name").on("change", function() {
        var file_name2 = $("#sb_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreviewSb").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
        $("#fileNameSb").text(file_name2);
        $("#UploadfileSb").addClass('d-none')
        $("#fileUploadedSb").removeClass('d-none')

    });
    $("#removefileSb").click(function() {
        $("#sb_file_name").val('')
        $("#filePreviewSb").attr('src', '');
        $("#UploadfileSb").removeClass('d-none')
        $("#fileUploadedSb").addClass('d-none')
    })

    $("#ba_file_name").on("change", function() {
        var file_name2 = $("#ba_file_name").val().replace(/C:\\fakepath\\/i, '')
        $("#filePreviewBa").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
        $("#fileNameBa").text(file_name2);
        $("#UploadfileBa").addClass('d-none')
        $("#fileUploadedBa").removeClass('d-none')

    });
    $("#removefileBa").click(function() {
        $("#ba_file_name").val('')
        $("#filePreviewBa").attr('src', '');
        $("#UploadfileBa").removeClass('d-none')
        $("#fileUploadedBa").addClass('d-none')
    })


    await loadMaklumat()
    eocpCounter = 0
    saCounter = 0
    perlindunganCounter = 0

    if(eocpCounter == 0) {

     document.getElementById('flexRadioDefault1').checked = false;
     document.getElementById('flexRadioDefault2').checked = false;
     document.getElementById('flexRadioDefault3').checked = false;

     document.getElementById('flexRadioDefault1').disabled = true;
     document.getElementById('flexRadioDefault2').disabled = true;
     document.getElementById('flexRadioDefault3').disabled = true;
    }

    $(".eocpAdd").click(function() {
        document.getElementById('flexRadioDefault1').disabled = false;
        document.getElementById('flexRadioDefault2').disabled = false;
        document.getElementById('flexRadioDefault3').disabled = false;
        eocpCounter += 1

        let eocpTbody = `<tr class=" Table_perunding_body eocpmainrow">
                            <input class="form-control Table_perunding_body" type="hidden" value="0"/>
                            <td>` + eocpCounter + `</td>
                            <td>
                                <input class="form-control Table_perunding_body" type="date" />
                            </td>
                            <td class="d-flex"
                                style="vertical-align: middle;">
                                <button type="button" class="btnSej eocpMuatNaik" style="border-radius: 3px; padding: 4.5%; background-color : gray;height:110%;">
                                    Muat Naik
                                </button>
                            </td>
                            <td>
                                <button type="button" id="eocpRemove" class="p-2 eocpRemove">
                                    <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                        style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                                </button>
                            </td>
                        </tr>`
        $('#eocpTbody').append(eocpTbody);


        let all_eocpmain_tr = document.querySelectorAll(
            ".eocpmainrow"
        );

        let all_eocpRemove_btn = document.querySelectorAll(
            "[id^='eocpRemove']"
        );

        all_eocpRemove_btn.forEach((tb, i) => {
            tb.addEventListener("click", () => {
                all_eocpmain_tr[i].remove();
                let all_exist_eocpmain_tr = document.querySelectorAll(
                    ".eocpmainrow"
                );
                if(all_exist_eocpmain_tr.length == 0)  {
                    document.getElementById('flexRadioDefault1').checked = false;
                    document.getElementById('flexRadioDefault2').checked = false;
                    document.getElementById('flexRadioDefault3').checked = false;

                    document.getElementById('flexRadioDefault1').disabled = true;
                    document.getElementById('flexRadioDefault2').disabled = true;
                    document.getElementById('flexRadioDefault3').disabled = true;
                    eocpCounter = 0
                } else {
                    eocpCounter = 0
                    all_exist_eocpmain_tr.forEach((tb, i) => {
                        eocpCounter = eocpCounter + 1
                        r = tb.getElementsByTagName("td")[0]
                        r.innerHTML = eocpCounter
                        // console.log(tb);
                    })
                }
            });
        });


        let all_eocpMuatNaik_btn = document.querySelectorAll('.eocpMuatNaik');

        all_eocpMuatNaik_btn.forEach((btn, i) => {

            // Remove the event listener
            btn.removeEventListener('click', handleMuatNaikEocp);
            btn.addEventListener('click', handleMuatNaikEocp);
        });
    })

    $(".saAdd").click(function() {
        saCounter += 1

        let saTbody = `<tr class=" Table_perunding_body samainrow">
                            <td>` + saCounter + `</td>
                            <td>
                                <input
                                    style="width:150px"
                                    class="form-control Table_perunding_body"
                                    type="date" />
                            </td>
                            <td class="d-flex">
                                <span
                                style="height: 72%;"
                                    class="input-group-text KON_span Table_perunding_span Table_perunding_body">RM</span>
                                <input type="text"
                                    class="form-control Table_perunding_body"
                                    value="" />
                            </td>
                            <td>
                                <button type="button" id="saRemoveBtn"
                                    class="p-2 saRemoveBtn">
                                    <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                        style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                                </button>
                            </td>
                        </tr>`

        $('#saTbody').append(saTbody);




        function updateTextView(_obj){
            var num = getNumber(_obj.val());
            if(num==0){
                _obj.val('');
            }   else{
                _obj.val(num.toLocaleString());
            } 
        }

        function getNumber(_str){
            var arr = _str.split('');
            var out = new Array();
            for(var cnt=0;cnt<arr.length;cnt++){
                if(isNaN(arr[cnt])==false){
                    out.push(arr[cnt]);
                }
            }
            return Number(out.join(''));
        }

        $('input[type=text]').on('keyup',function(){
            updateTextView($(this));
        });
        
        let all_samain_tr = document.querySelectorAll(
            ".samainrow"
        );

        let all_saRemove_btn = document.querySelectorAll(
            "[id^='saRemoveBtn']"
        );

        all_saRemove_btn.forEach((tb, i) => {
            tb.addEventListener("click", () => {
                all_samain_tr[i].remove();
                saCounter = 0
                let all_samain_tr1 = document.querySelectorAll(
                    ".samainrow"
                );
                all_samain_tr1.forEach((tb, i) => {
                    saCounter = saCounter + 1
                    r = tb.getElementsByTagName("td")[0]
                    r.innerHTML = saCounter
                })
            });
        });
    })

    $(".tempohPerlinduganAdd").click(function() {
        perlindunganCounter += 1

        let perlinduganTbody = `<tr class=" Table_perunding_body perlinduganmainrow">
                            <td>` + perlindunganCounter + `</td>
                            <td>
                                <input
                                    style="width:160px"
                                    class="form-control Table_perunding_body"
                                    type="date" />
                            </td>
                            <td class="d-flex">
                                <input type="date"
                                    style="width:160px"
                                    class="form-control Table_perunding_body"
                                    value="" />
                            </td>
                            <td>
                                <button type="button"
                                    id="tempohPerlinduganRemoveBtn"
                                    class="p-2 tempohPerlinduganRemoveBtn">
                                    <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                        style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                                </button>
                            </td>
                        </tr>`

        $('#tempohPerlinduganTbody').append(perlinduganTbody);


        let all_perlinduganmain_tr = document.querySelectorAll(
            ".perlinduganmainrow"
        );

        let all_perlinduganRemove_btn = document.querySelectorAll(
            "[id^='tempohPerlinduganRemoveBtn']"
        );

        all_perlinduganRemove_btn.forEach((tb, i) => {
            tb.addEventListener("click", () => {
                all_perlinduganmain_tr[i].remove();
                perlindunganCounter = 0
                let all_perlinduganmain_tr1 = document.querySelectorAll(
                    ".perlinduganmainrow"
                );
                all_perlinduganmain_tr1.forEach((tb, i) => {
                    perlindunganCounter = perlindunganCounter + 1
                    r = tb.getElementsByTagName("td")[0]
                    r.innerHTML = perlindunganCounter
                })
            });
        });
    })

    $(".simpanMaklumat").click(function() {
        simpanMaklumat()
    })

    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");

})

function handleMuatNaikEocp(event) {
    btn = event.target
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.style.display = 'none';
    fileInput.id = 'eocpMuatNaik'

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        // Show the filename
        btn.textContent = file.name;
    });
    // Append the input element to the td tag
    const td = btn.parentNode;
    td.appendChild(fileInput);

    fileInput.click();

    btn.style.color = 'blue'
    btn.style.backgroundColor = 'white'
}


function simpanMaklumat() {

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    var formData = new FormData();


    var ele = document.getElementsByName('emelPeringatan');

    for (i = 0; i < ele.length; i++) {
        if (ele[i].checked) {
            formData.append('emelPeringatan', ele[i].value)
        }
    }


    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('perolehan_id', document.getElementById('perolehan_id').value)
    formData.append('pemantauan_id', document.getElementById('pemantauan_id').value)

    formData.append('kosPerolehan', removecomma(document.getElementById('kosPerolehan').value))
    formData.append('nilaiBayaranAkhirSelesai', removecomma(document.getElementById('nilaiBayaranAkhirSelesai').value))
    formData.append('penjimatanSelesai', removecomma(document.getElementById('penjimatanSelesai').value))

    formData.append('nilaiBayaranAkhirTamat', document.getElementById('nilaiBayaranAkhirTamat').value)
    formData.append('penjimatanTamat', document.getElementById('penjimatanTamat').value)

    formData.append('noPolisi', document.getElementById('noPolisi').value)
    formData.append('nilaiPolisi', removecomma(document.getElementById('nilaiPolisi').value))
    formData.append('pelinduganTarikMula', document.getElementById('pelinduganTarikMula').value)
    formData.append('pelinduganTarikTamat', document.getElementById('pelinduganTarikTamat').value)

    let all_perlinduganmain_tr = document.querySelectorAll(
        ".perlinduganmainrow"
    );

    let all_samain_tr = document.querySelectorAll(
        ".samainrow"
    );

    let all_eocpmain_tr = document.querySelectorAll(
        ".eocpmainrow"
    );

    eocpmain = []
    all_eocpmain_tr.forEach((tr) => {
        let tdElements = tr.querySelectorAll('input[type="date"]');

        let fileInput = tr.querySelector('input[type="file"]');
        let id = tr.querySelector('input[type="hidden"]');

        if (fileInput) {

            let file = fileInput.files[0];
            console.log(file);
            if (file) {
                // File input is an input tag

                // Handle the file input accordingly
                eocpmain.push(`{"tarikh" : "` + tdElements[0].value + `","file" : true , "id" : ` + id.value +
                    `}`)

                formData.append('eocpFile[]', file);
            }
        } else {
            // File input is a button tag
            // Handle the button input accordingly
            eocpmain.push(`{"tarikh" : "` + tdElements[0].value + `","file" : false , "id" : ` + id.value +
                `}`)
        }

        // Get the selected file from the file input
        // let file = fileInput.files[0];
        // console.log(file);
        // Add the file and date input values to the FormData
        // formData.append(`date_${index}`, dateInput.value);
        // formData.append(`file_${index}`, file);

        // eocpmain.push(`{"tarikh" : "` + tdElements[0].value + `" }`)
    });
    // console.log(eocpmain);

    // all_eocpmain_tr.forEach((tr) => {
    //     let fileInput = tr.querySelector('input[type="file"]');
    //     let file = fileInput.files[0];
    //     formData.append('eocp[]', item);
    // })
    eocpmain.forEach((item) => {
        formData.append('eocp[]', item);
    });

    sa = []
    all_samain_tr.forEach((tr) => {
        let tdElements = tr.querySelectorAll("td input");
        sa.push(`{"tarikh" : "` + tdElements[0].value + `", "kos" : "` + removecomma(tdElements[1].value) + `" }`)
    });
    sa.forEach((item) => {
        formData.append('sa[]', item);
    });

    perlinduganLanjutan = []
    all_perlinduganmain_tr.forEach((tr) => {
        let tdElements = tr.querySelectorAll("td input");
        perlinduganLanjutan.push(`{"tarikhMula" : "` + tdElements[0].value + `", "tarikTamat" : "` +
            tdElements[
                1].value + `" }`)
    });
    perlinduganLanjutan.forEach((item) => {
        formData.append('perlinduganLanjutan[]', item);
    });

    var lsst_file_name = $("#lsst_file_name").val()
    var lsst_file = $("#lsst_file_name").prop('files')[0];
    if (lsst_file) {
        formData.append('lsst_file_name', lsst_file);
    }


    var Tr_file_name = $("#Tr_file_name").val()
    var Tr_file = $("#Tr_file_name").prop('files')[0];
    if (Tr_file) {
        formData.append('Tr_file_name', Tr_file);
    }
    var sb_file_name = $("#sb_file_name").val()
    var sb_file = $("#sb_file_name").prop('files')[0];

    if (sb_file) {
        formData.append('sb_file_name', sb_file);
    }

    var ba_file_name = $("#ba_file_name").val()
    var ba_file = $("#ba_file_name").prop('files')[0];
    if (ba_file) {
        formData.append('ba_file_name', ba_file);
    }

    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');

    // Get all radio buttons with the name "bayaran_perunding_radio"
    const radioButtons = document.getElementsByName("bayaran_perunding_radio");

    let selectedValue = null;

    // Loop through the radio buttons to find the selected one
    for (const radioButton of radioButtons) {
        if (radioButton.checked) {
            selectedValue = radioButton.value;
            break; // Exit the loop once a selected radio button is found
        }
    }

    // Append the selected radio button's value to the FormData object
    if (selectedValue !== null) {
        formData.append("bayaran_perunding_radio", selectedValue);
    }else {
        formData.append("bayaran_perunding_radio", '');
    }

    axios.defaults.headers.common["Authorization"] = api_token
    axios({
            method: 'post',
            url: api_url + "api/perunding/maklumat",
            responseType: 'json',
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                // location.reload();
                  $("#add_role_sucess_modal").modal('show');
                  $("#tutup").click(function(){
                    location.reload();
                  })
                //     var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                //     url = url.replace(":id", response.data.data.id)
                //     url = url.replace(":status", response.data.data.workflow_status)
                //     url = url.replace(":user_id", response.data.data.dibuat_oleh)
                //     window.location.href = url
                //   })
                //   $("#close_modal").click(function(){
                //     var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                //     url = url.replace(":id", response.data.data.id)
                //     url = url.replace(":status", response.data.data.workflow_status)
                //     url = url.replace(":user_id", response.data.data.dibuat_oleh)
                //     window.location.href = url
                //   })

            } else {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                alert('error while saving project')
            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

}

function loadMaklumat() {

    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');
    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/perunding/maklumat_details",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}"
            }
        })
        .then(function(response) {
            console.log(response.data);
            maklumat_details = response.data.data.maklumatPerunding
            perolehan_details = response.data.data.perolehan

            if(maklumat_details) {
                if(maklumat_details.eocp.length == 0) {
                    document.getElementById('flexRadioDefault1').checked = false;
                    document.getElementById('flexRadioDefault2').checked = false;
                    document.getElementById('flexRadioDefault3').checked = false;

                    document.getElementById('flexRadioDefault1').disabled = true;
                    document.getElementById('flexRadioDefault2').disabled = true;
                    document.getElementById('flexRadioDefault3').disabled = true;
                } else {
                    document.getElementById('flexRadioDefault1').disabled = false;
                    document.getElementById('flexRadioDefault2').disabled = false;
                    document.getElementById('flexRadioDefault3').disabled = false;    
                }

                if(maklumat_details.bayaran_perunding == 0) {
                    document.getElementById('bayaran_perunding_selesai').checked = true;
                }else {
                    document.getElementById('bayaran_perunding_tamat').checked = true;
                }
                
            }else {
                    document.getElementById('flexRadioDefault1').disabled = true;
                    document.getElementById('flexRadioDefault2').disabled = true;
                    document.getElementById('flexRadioDefault3').disabled = true;
                
            }

            
            
            document.getElementById('kodProjek').value = perolehan_details.pemantauan_project.kod_projeck
            console.log(perolehan_details);
            document.getElementById('namaProjek').value = perolehan_details.pemantauan_project
                .nama_projek
            document.getElementById('kosProjek').value = perolehan_details.pemantauan_project.kos_projeck.toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            document.getElementById('namaPerolehan').value = perolehan_details.nama_perolehan
            
            document.getElementById('negeri').value = perolehan_details.pemantauan_project.negeri
                .nama_negeri
                
            document.getElementById('bahagian').value = perolehan_details.pemantauan_project
                .bahagian_pemilik
                .nama_bahagian
            document.getElementById('jenisPerolehan').value = perolehan_details.jenis_perkhidmatan
            document.getElementById('kaedahPerolehan').value = perolehan_details.kaedah_perolehan
            document.getElementById('perunding').value = perolehan_details.nama_peruding
            document.getElementById('perunding').value = perolehan_details.nama_peruding
            document.getElementById('tarikhSuratSetujuTerima').value = perolehan_details.tarikh_setuju_terima
            document.getElementById('tarikhPerkhidmatanMula').value = perolehan_details.tarikh_mula_perkhidmatan
            document.getElementById('tarikhPerkhidmatanTamat').value = perolehan_details.tarikh_tamat_perjanjian
            document.getElementById('kosPerolehan').value = number_format(perolehan_details.kos_perolehan)


            const startDate = new Date(perolehan_details.tarikh_mula_perkhidmatan);
            const endDate = new Date(perolehan_details.tarikh_tamat_perjanjian);
            const timeDifference = endDate - startDate;
            const millisecondsInMonth = 30.44 * 24 * 60 * 60 * 1000;
            const monthDifference = Math.floor(timeDifference / millisecondsInMonth);

            document.getElementById('tempohKontrak').value = monthDifference
            document.getElementById('lad').value = '20,000'


            // document.getElementById('tarikhPerkhidmatanMula').value = maklumat_details.pemantauan_project.
            // document.getElementById('tarikhPerkhidmatanTamat').value = maklumat_details.pemantauan_project.
            // document.getElementById('tempohKontrak').value = maklumat_details.pemantauan_project.
            // document.getElementById('lad').value = maklumat_details.pemantauan_project.


            document.getElementById('perolehan_id').value = perolehan_details.id
            document.getElementById('pemantauan_id').value = perolehan_details.pemantauan_id
            document.getElementById('kosPerolehan').value = number_format(maklumat_details.kos_perolehan)
            document.getElementById('nilaiBayaranAkhirSelesai').value = number_format(maklumat_details.nilai_bayaran_akhir_selesai)
            document.getElementById('penjimatanSelesai').value = number_format(maklumat_details.penjimatan_selesai)
            document.getElementById('nilaiBayaranAkhirTamat').value = maklumat_details
                .nilai_bayaran_akhir_tamat
            document.getElementById('penjimatanTamat').value = maklumat_details.penjimatan_tamat
            document.getElementById('noPolisi').value = maklumat_details.no_polisi
            document.getElementById('nilaiPolisi').value = number_format(maklumat_details.nilai_polisi)
            document.getElementById('pelinduganTarikMula').value = perolehan_details
                .tarikh_mula_perkhidmatan
            document.getElementById('pelinduganTarikTamat').value = perolehan_details
                .tarikh_tamat_perjanjian

            // Get all radio buttons with the specified name
            var radioButtons = document.getElementsByName("emelPeringatan");
            
            // Loop through the radio buttons
            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].value === maklumat_details.email_peringatan) {
                    radioButtons[i].checked = true; // Set the checked property
                    break; // No need to continue checking once found
                }
            }

            if (response.data.data.lsst) {
                var file_name2 = $("#lsst_file_name").val().replace(/C:\\fakepath\\/i, '')
                $("#filePreviewLsst").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileNameLsst").text(response.data.data.lsst.file_name);
                $("#UploadfileLsst").addClass('d-none')
                $("#fileUploadedLsst").removeClass('d-none')
                $("#filePreviewLsst").click(function() {
                    downloadDoc('lsst',response.data.data.maklumatPerunding.media);
                });
            }

            if (response.data.data.ba) {
                var file_name2 = $("#ba_file_name").val().replace(/C:\\fakepath\\/i, '')
                $("#filePreviewBa").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileNameBa").text(response.data.data.ba.file_name);
                $("#UploadfileBa").addClass('d-none')
                $("#fileUploadedBa").removeClass('d-none')

                $("#filePreviewBa").click(function() {
                    downloadDoc('ba',response.data.data.maklumatPerunding.media);
                });
            }

            if (response.data.data.sb) {
                var file_name2 = $("#sb_file_name").val().replace(/C:\\fakepath\\/i, '')
                $("#filePreviewSb").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileNameSb").text(response.data.data.sb.file_name);
                $("#UploadfileSb").addClass('d-none')
                $("#fileUploadedSb").removeClass('d-none')
                $("#filePreviewSb").click(function() {
                    downloadDoc('sb',response.data.data.maklumatPerunding.media);
                });
            }

            if (response.data.data.tr) {
                var file_name2 = $("#Tr_file_name").val().replace(/C:\\fakepath\\/i, '')
                $("#filePreviewTr").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileNameTr").text(response.data.data.tr.file_name);
                $("#UploadfileTr").addClass('d-none')
                $("#fileUploadedTr").removeClass('d-none')
                $("#filePreviewTr").click(function() {
                    downloadDoc('tr',response.data.data.maklumatPerunding.media);
                });
            }

            maklumat_details.eocp.forEach(eocp => {
                eocpCounter += 1
                filename = 'Muat Naik'
                if (eocp.media.length > 0) {
                    filename = eocp.media[0].file_name
                }
                let eocpTbody = `<tr class=" Table_perunding_body eocpmainrow">
                                        <input
                                            class="form-control Table_perunding_body"
                                            type="hidden" value="` + eocp.id + `"/>
                                    <td>` + eocpCounter + `</td>
                                    <td>
                                        <input
                                            style="width:160px"
                                            class="form-control Table_perunding_body"
                                            type="date" value="` + eocp.tarikh + `"/>
                                    </td>
                                    <td class="d-flex"
                                        style="vertical-align: middle;">
                                        <button type="button" class="btnSej eocpMuatNaik" style="height: 77%;color:blue;">
                                            ` + filename + `
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" id="eocpRemove" class="p-2 eocpRemove">
                                            <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                                style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                                        </button>
                                    </td>
                                </tr>`
                $('#eocpTbody').append(eocpTbody);


                let all_eocpmain_tr = document.querySelectorAll(
                    ".eocpmainrow"
                );

                let all_eocpRemove_btn = document.querySelectorAll(
                    "[id^='eocpRemove']"
                );

                all_eocpRemove_btn.forEach((tb, i) => {
                    tb.addEventListener("click", () => {
                        all_eocpmain_tr[i].remove();
                        let all_exist_eocpmain_tr = document.querySelectorAll(
                            ".eocpmainrow"
                        );
                        
                        if(all_exist_eocpmain_tr.length == 0)  {
                            document.getElementById('flexRadioDefault1').checked = false;
                            document.getElementById('flexRadioDefault2').checked = false;
                            document.getElementById('flexRadioDefault3').checked = false;

                            document.getElementById('flexRadioDefault1').disabled = true;
                            document.getElementById('flexRadioDefault2').disabled = true;
                            document.getElementById('flexRadioDefault3').disabled = true;
                            eocpCounter = 0
                        }else {
                            eocpCounter = 0
                            all_exist_eocpmain_tr.forEach((tb, i) => {
                                eocpCounter = eocpCounter + 1
                                r = tb.getElementsByTagName("td")[0]
                                r.innerHTML = eocpCounter
                            })
                        }
                    });
                });

                let all_eocpMuatNaik_btn = document.querySelectorAll('.eocpMuatNaik');
                // all_eocpMuatNaik_btn.forEach((btn, i) => {
                //     console.log('removed');
                //     tb.removeEventListener("click", '')
                // })

                all_eocpMuatNaik_btn.forEach((btn, i) => {

                    // Remove the event listener
                    btn.removeEventListener('click', handleMuatNaikEocp);
                    btn.addEventListener('click', handleMuatNaikEocp);
                });

                // all_eocpMuatNaik_btn.forEach((btn, i) => {

                //     btn.addEventListener('click', (event) => {
                //         const fileInput = document.createElement('input');
                //         fileInput.type = 'file';
                //         fileInput.style.display = 'none';

                //         fileInput.addEventListener('change', (event) => {
                //             const file = event.target.files[0];
                //             console.log(file.name); // Display the filename

                //             // Show the filename
                //             btn.textContent = file.name;

                //             // Prompt to upload a new file when clicked
                //             btn.addEventListener('click', () => {
                //                 fileInput.click();
                //             });
                //         });

                //         // Append the input element to the td tag
                //         const td = btn.parentNode;
                //         td.appendChild(fileInput);

                //         fileInput.click();

                //         btn.style.color = 'blue'
                //         btn.style.backgroundColor = 'white'

                //     });
                // });
            })



            maklumat_details.sa.forEach(sa => {
                saCounter += 1

                let saTbody = `<tr class=" Table_perunding_body samainrow">
                                    <td>` + saCounter + `</td>
                                    <td>
                                        <input
                                            style="width:150px"
                                            class="form-control Table_perunding_body"
                                            type="date" value="` + sa.tarikh + `"/>
                                    </td>
                                    <td class="d-flex" style="width:150px">
                                        <span
                                            class="input-group-text KON_span Table_perunding_span Table_perunding_body" style="height:72%">RM</span>
                                        <input type="text"
                                            class="form-control Table_perunding_body"
                                            value="` + number_format(sa.implikasi_kos) + `" />
                                    </td>
                                    <td>
                                        <button type="button" id="saRemoveBtn"
                                            class="p-2 saRemoveBtn">
                                            <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                                style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                                        </button>
                                    </td>
                                </tr>`

                $('#saTbody').append(saTbody);


                let all_samain_tr = document.querySelectorAll(
                    ".samainrow"
                );

                let all_saRemove_btn = document.querySelectorAll(
                    "[id^='saRemoveBtn']"
                );

                all_saRemove_btn.forEach((tb, i) => {
                    tb.addEventListener("click", () => {
                        all_samain_tr[i].remove();
                        saCounter = 0
                        let all_samain_tr1 = document.querySelectorAll(
                            ".samainrow"
                        );
                        all_samain_tr1.forEach((tb, i) => {
                            saCounter = saCounter + 1
                            r = tb.getElementsByTagName("td")[0]
                            r.innerHTML = saCounter
                        })
                    });
                });
            })




            maklumat_details.perlindugan.forEach(perlindungan => {
                perlindunganCounter += 1

                let perlinduganTbody = `<tr class=" Table_perunding_body perlinduganmainrow">
                                    <td>` + perlindunganCounter + `</td>
                                    <td>
                                        <input
                                            style="width:160px"
                                            class="form-control Table_perunding_body"
                                            type="date" value="` + perlindungan.tarikh_mula + `"/>
                                    </td>
                                    <td class="d-flex">
                                        <input type="date"
                                            style="width:160px"
                                            class="form-control Table_perunding_body"
                                            value="` + perlindungan.tarikh_tamat + `" />
                                    </td>
                                    <td>
                                        <button type="button"
                                            id="tempohPerlinduganRemoveBtn"
                                            class="p-2 tempohPerlinduganRemoveBtn">
                                            <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                                style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                                        </button>
                                    </td>
                                </tr>`

                $('#tempohPerlinduganTbody').append(perlinduganTbody);


                let all_perlinduganmain_tr = document.querySelectorAll(
                    ".perlinduganmainrow"
                );

                let all_perlinduganRemove_btn = document.querySelectorAll(
                    "[id^='tempohPerlinduganRemoveBtn']"
                );

                all_perlinduganRemove_btn.forEach((tb, i) => {
                    tb.addEventListener("click", () => {
                        all_perlinduganmain_tr[i].remove();
                        perlindunganCounter = 0
                        let all_perlinduganmain_tr1 = document.querySelectorAll(
                            ".perlinduganmainrow"
                        );
                        all_perlinduganmain_tr1.forEach((tb, i) => {
                            perlindunganCounter = perlindunganCounter + 1
                            r = tb.getElementsByTagName("td")[0]
                            r.innerHTML = perlindunganCounter
                        })
                    });
                });
            })




            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
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

function removecomma(num)
    {

            num=num.replace(/\,/g,''); // 1125, but a string, so convert it to number
            num=parseFloat(num,10);
            return num;
    }

function downloadDoc(type,medias)
{

    if(medias.length > 0) {

        medias.forEach((media) => {
            if(media.collection_name == type) {
                const api_url = "{{env('API_URL')}}";  
                var api_token = "Bearer " + window.localStorage.getItem('token');

                parameters = {
                    model_id : media.id,
                    mode_type_id : media.model_id,
                    model_type : media.model_type,
                    collection_name : media.collection_name
                }
                axios({
                        url: api_url+"api/media/download",
                        method: 'GET',
                        headers: { "Authorization": api_token, },
                        params: parameters,
                        responseType: 'blob', // important
                    }).
                    then((response) => {
                        console.log(response.data);
                        const url = window.URL.createObjectURL(response.data);
                        const link = document.createElement('a');
                        link.href = url;
                        // const contentDisposition = response.headers['content-disposition'];
                        // console.log(response);
                        // let fileName = 'unknown';
                        // if (contentDisposition) {
                        //     const fileNameMatch = contentDisposition.match(/filename="(.+)"/);
                        //     if (fileNameMatch.length === 2)
                        //         fileName = fileNameMatch[1];
                        // }
                        // link.setAttribute('download', fileName);
                        link.setAttribute('download', media.file_name);
                        document.body.appendChild(link);
                        link.click();
                        URL.revokeObjectURL(url);
                    });
            }
        })
    }
    

}

</script>