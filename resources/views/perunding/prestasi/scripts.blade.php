<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(async function() {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');


    await loadSenaraiMasalah();
    await loadSejarahPrestasi();
    await loadLatestPrestasiSejarah();

    $(".simpanPrestasi").click(function() {
        simpanPrestasi()
    })

    $(".simpanRekordLampiran").click(function() {
        simpanRekordLampiran()
    })

    $(".simpanMasalah").click(function() {
        simpanMasalah()
    })

    $(".downloadTemplateLink").click(function() {
        downloadTemplateDoc()
    })


    $("#prestasiSpSelect").on("change", function() {
        document.getElementById("prestasiSpSelect_error").textContent = "";
    })

    $("#prestasiSpDate").on("change", function() {
        document.getElementById("prestasiSpDate_error").textContent = "";
    })

    $("#sp_file_name").on("change", function() {
        $new_file = $('#sp_file_name').prop('files')[0];
        console.log($new_file);
        if ($new_file.size > 4000000) {
            document.getElementById("sp_file_name").value = '';
            document.getElementById("sp_file_name_error").innerHTML = "file size lebih 4mb";

            return false;
        }

        var allowedExtensions = ["application/pdf"];

        if (allowedExtensions.indexOf($new_file.type) == -1) {
            document.getElementById("sp_file_name").value = '';
            document.getElementById("sp_file_name_error").innerHTML = "file type should be pdf";

            //alert("only jpeg and png extension allowed")
            return false;
        }

        if ($new_file) {

            document.getElementById("sp_file_name_error").innerHTML = "";
            var file_name2 = $("#sp_file_name").val().replace(/C:\\fakepath\\/i, '')
            $("#filePreviewSp").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
            $("#fileNameSp").text(file_name2);
            $("#UploadfileSp").addClass('d-none')
            $("#fileUploadedSp").removeClass('d-none')
        }

    });
        
    // $("#sp_file_name").on("change", function() {
    //     var file_name2 = $("#sp_file_name").val().replace(/C:\\fakepath\\/i, '')
    //     $("#filePreviewSp").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
    //     $("#fileNameSp").text(file_name2);
    //     $("#UploadfileSp").addClass('d-none')
    //     $("#fileUploadedSp").removeClass('d-none')

    // });

    $("#removefileSp").click(function() {
        $("#sp_file_name").val('')
        $("#filePreviewSp").attr('src', '');
        $("#UploadfileSp").removeClass('d-none')
        $("#fileUploadedSp").addClass('d-none')
    })

    mainPrestasiCounter = 0

    deliverables = []
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');

    await axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/lookup/DeliverableHeading/list",
            responseType: 'json',
        })
        .then(function(response) {

            console.log(response.data.data);

            $.each(response.data.data, function(key, item) {

                data = {}
                data['is_heading'] = 1
                data['code'] = ''
                data['value'] = item.nama

                deliverables.push(data)
                $.each(item.deliverables, function(key1, item1) { 
                    data = {}
                    data['is_heading'] = 0
                    data['code'] = item1.code
                    data['value'] = item1.nama
                    deliverables.push(data)
                })
            })
            
        })

    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/perunding/deliverable_list",
            responseType: 'json',
        })
        .then(function(response) {
            // deliverables = response.data.data
            console.log(deliverables);
            loadPrestasi();
        })

    emails = [{
            'name': '2 Minggu Sebelum Tarikh Siap Jadual',
            'value': 0
        },
        {
            'name': '1 Bulan Sebelum Tarikh Siap Jadual',
            'value': 1
        },
        {
            'name': '2 Bulan Sebelum Tarikh Siap Jadual',
            'value': 2
        },
        {
            'name': '3 Bulan Sebelum Tarikh Siap Jadual',
            'value': 3
        },
    ]

    $(".prestasiMainAdd").click(function() {
        mainPrestasiCounter += 1

        // Get the current date
        currentDate = new Date();

        // Get the current year
        currentYear = currentDate.getFullYear();

        // Get the current month
        // Note: The getMonth() method returns a zero-based index, where January is 0 and December is 11.
        currentMonth = currentDate.getMonth() + 1;

        let deliverableOptions = ''
        $.each(deliverables, function(key, item) {

            // json_value = JSON.parse(item.json_value)

            if (item.is_heading == 0) {
                deliverableOptions = deliverableOptions + '<option value="' + item.code +
                    '">' +
                    item.value + '</option>'
            } else {
                deliverableOptions = deliverableOptions + '<option value="' + item.code +
                    '" disabled style="font-weight: bold;">' +
                    item.value + '</option>'
            }
        })

        let emailOptions = ''
        $.each(emails, function(key, item) {
            emailOptions = emailOptions + '<option class="rbtnBulanan" value="' + item.value +
                '">' +
                item.name + '</option>'
        })

        remove_button_main_table = `<button data-title="Buang skop" type="button"
                                id="prestasiMainRemoveBtn"
                                class="minusbutton ml-2 prestasiMainRemoveBtn">
                                <i
                                    class="ri-checkbox-indeterminate-line ri-xl"></i>
                            </button>`

        if(mainPrestasiCounter == 1)  {
            remove_button_main_table = ''
        }

        rowTemplate = `<tr  class="Table_perunding_body rbtnBulanan prestasimainrow" data-index="`+mainPrestasiCounter+`">
                        <td scope="row">
                            ` + mainPrestasiCounter + `
                        </td>
                        <!-- <td scope="row">
                            <img
                                src="{{ asset('assets/images/arroew_up.png') }}" />
                        </td> -->
                        <td id="tahun" class="tahun">` + currentYear + `</td>
                        <td id="month" class="month">` + currentMonth + `</td>
                        <td>
                            <select name="" id=""
                                class="form-control rbtnBulanan">
                                ` + deliverableOptions + `
                            </select>
                        </td>
                        <td>
                        <button type="button" class="masalah_perunding rbtnBulanan spMuatNaik btn btn text-white" style="background-color: #6C757D;" id="spMuatNaik">
                                    Muat Naik
                                </button>
                        </td>
                        <td>
                            <select class="form-control rbtnBulanan" name="" id="">
                                ` + emailOptions + `
                            </select>
                        </td>
                        <td>
                            <input style="max-width: 80%;" type="date" class="form-control rbtnBulanan" id="tarikhMulaJadual"
                                value="" />
                        </td>
                        <td>
                            <input style="max-width: 80%;" type="date" class="form-control rbtnBulanan" id="tarikhMulaSebenar"
                                value="" />
                        </td>
                        <td>
                            <input style="width:80%" type="date" class="form-control rbtnBulanan tarikhSiapJadual" id="tarikhSiapJadual"
                                value="" />
                        </td>
                        <td>
                            <input style="width:80%" type="date" class="form-control rbtnBulanan tarikhSiapSebenar" id="tarikhSiapSebenar"
                                value="" />
                        </td>
                        
                        <td>
                            <input type="text" class="form-control rbtnBulanan hariLewat" id="hariLewat"
                                value="0" style="color: #FF0000;width: 65%;" readonly/>
                        </td>
                        <td>
                            <input type="number" class="form-control rbtnBulanan" id="peratusJadual"
                                value="0" placeholder="" style="width: 65%;"/>
                        </td>
                        <td>
                            <input type="text" class="form-control rbtnBulanan" id="peratusKumulatifJadual"
                                value="" placeholder="" style="width: 65%;" readonly/>
                        </td>
                        <td><input type="number" class="form-control rbtnBulanan" id="peratusSebenar"
                                value="0" placeholder="" style="width: 65%;"/>
                        </td>
                        <td><input type="text" class="form-control rbtnBulanan" id="peratusKumulatifSebenar"
                                value="" placeholder="" style="width: 65%;" readonly/>
                        </td>
                        
                        <td>
                            <input style="height:100%" type="text" class="rbtnBulanan statusPelaksanaan status_pelaksanaan_green" id="statusPelaksanaan"
                                value="IJ" readonly/>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <input style="max-width:80%" type="date" class="form-control rbtnBulanan" id="tarikhMesyuarat"
                                value="" />
                        </td>
                        <td>
                            <select class="form-control rbtnBulanan" name=""
                                id="">
                                <option value="Lulus">Lulus</option>
                                <option value="Gagal">Gagal</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control rbtnBulanan" id="penilaian"
                                value="" readonly/>
                        </td>
                        <td>
                            <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="EOT"
                                value="" />
                        </td>
                        <td>
                            <button type="button" class="masalah_perunding rbtnBulanan eotMuatNaik btn btn text-white" id="eotMuatNaik" style="background-color: #6C757D;">
                                    Muat Naik
                            </button>
                        
                            
                        </td>

                        <td>
                            <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="tarikhLadMula"
                                value="" />
                        </td>
                        <td>
                            <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="tarikhLadTamat"
                                value="" />
                        </td>
                        <td>
                            <input type="text" class="form-control rbtnBulanan" id="bilanganHariLad"
                                value="0" />
                        </td>
                        <td>
                            <input type="text" class="form-control rbtnBulanan" id="jumlahLad"
                                value="0.00" readonly/>
                        </td>
                        <td>
                            <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="tarikhKemaskini"
                                value="" readonly/>
                        </td>
                        <td style="vertical-align: middle;">
                            `+remove_button_main_table+`
                        </td>
                        <input type="hidden" value="" id="version"/>
                        <input type="hidden" value="" id="id"/>
                        <input type="hidden" value="0" id="is_readonly"/>
                    </tr>`

        $('#prestasiMainTbody').append(rowTemplate);

        let all_prestasimain_tr = document.querySelectorAll(
            ".prestasimainrow"
        );

        let all_prestasiRemove_btn = document.querySelectorAll(
            "[id^='prestasiMainRemoveBtn']"
        );

        all_prestasiRemove_btn.forEach((tb, i) => {
            tb.addEventListener("click", () => {
                all_prestasimain_tr[i + 1].remove();
            });
        });

        let all_spMuatNaik_btn = document.querySelectorAll('.spMuatNaik');
        let all_eotMuatNaik_btn = document.querySelectorAll('.eotMuatNaik');


        all_eotMuatNaik_btn.forEach((btn, i) => {
            btn.removeEventListener('click', handleMuatNaikEot);
            btn.addEventListener('click', handleMuatNaikEot);
        });

        all_spMuatNaik_btn.forEach((btn, i) => {

            // Remove the event listener
            btn.removeEventListener('click', handleMuatNaikSp);
            btn.addEventListener('click', handleMuatNaikSp);
        });

        let all_tarikhSiapJadual_btn = document.querySelectorAll('.tarikhSiapJadual');

        all_tarikhSiapJadual_btn.forEach((btn, i) => {
            btn.removeEventListener('input', changeStatusPelaksanaan);
            btn.addEventListener('input', changeStatusPelaksanaan);
        });

        let all_tarikhSiapSebenar_btn = document.querySelectorAll('.tarikhSiapSebenar');

        all_tarikhSiapSebenar_btn.forEach((btn, i) => {
            btn.removeEventListener('input', changeStatusPelaksanaan);
            btn.addEventListener('input', changeStatusPelaksanaan);
        });

        let all_tarikhMulaJadual_btn = document.querySelectorAll('.tarikhMulaJadual');

        all_tarikhMulaJadual_btn.forEach((btn, i) => {
            btn.removeEventListener('input', changeTahunBulan);
            btn.addEventListener('input', changeTahunBulan);
        });
        // loadEmptyPrestasi()

    })

    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
})

function changeTahunBulan(event) {
    const tr = event.target.parentNode.parentNode;
    const tarikhMulaadual_value = tr.querySelector('input[type="date"]#tarikhMulaJadual').value
    if (tarikhMulaadual_value != null) {
        const dateParts = tarikhMulaadual_value.split('-');
        tr.querySelector('td:nth-child(2)').innerHTML = dateParts[0]
        tr.querySelector('td:nth-child(3)').innerHTML = dateParts[1]
    }

    
}

function changeStatusPelaksanaan(event) {

    // tarikSiapSebenar = new Date(event.target.value);
    const tr = event.target.parentNode.parentNode;
    const tarikhSiapJadual_value = tr.querySelector('.tarikhSiapJadual').value;
    const tarikhSiapSebenar_value = tr.querySelector('.tarikhSiapSebenar').value;

    if (tarikhSiapJadual_value != null || tarikhSiapJadual_value != '') {
        tarikhSiapJadual = new Date(tarikhSiapJadual_value)
    }

    if (tarikhSiapSebenar_value != null || tarikhSiapSebenar_value != '') {
        tarikhSiapSebenar = new Date(tarikhSiapSebenar_value)
    }

    daysDiff = 0
    // Check if dateObj2 is greater than dateObj1
    if (tarikhSiapSebenar <= tarikhSiapJadual) {
        daysDiff = -1
    } else {

        const timeDiff = Math.abs(tarikhSiapSebenar - tarikhSiapJadual);
        daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
    }

    const hariLewat = tr.querySelector('.hariLewat');
    value = parseInt(daysDiff)
    
    if(isNaN(parseInt(daysDiff))) {
        value = 0
    }
    if(value < 0 ){
        value = 0
    }
    hariLewat.value = value
    const statusPelaksanaanInput = tr.querySelector('.statusPelaksanaan');

    statusPelaksanaanInput.classList.remove('status_pelaksanaan_green', 'status_pelaksanaan_purple',
        'status_pelaksanaan_yellow', 'status_pelaksanaan_red')

    switch (true) {
        case value < 0:
            statusPelaksanaanInput.value = 'DJ'
            statusPelaksanaanInput.classList.add('status_pelaksanaan_green');
            statusPelaksanaanInput.type = 'text';
            break;

        case (value >= 0 && value <= 14):
            statusPelaksanaanInput.value = 'IJ'
            statusPelaksanaanInput.classList.add('status_pelaksanaan_purple');
            statusPelaksanaanInput.type = 'text';
            break;

        case (value > 14):
            statusPelaksanaanInput.value = 'LJ'
            statusPelaksanaanInput.classList.add('status_pelaksanaan_yellow');
            statusPelaksanaanInput.type = 'text';
            break;

        default:
            statusPelaksanaanInput.value = 'IJ'
            statusPelaksanaanInput.classList.add('status_pelaksanaan_red');
            break;
    }

}

function simpanRekordLampiran() {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    let isValid = true;

    // Reset previous error messages
    document.getElementById("prestasiSpSelect_error").textContent = "";
    document.getElementById("prestasiSpDate_error").textContent = "";
    document.getElementById("sp_file_name_error").textContent = "";


    var sp_file_name = $("#sp_file_name").val()
    var sp_file = $("#sp_file_name").prop('files')[0];
    var typeValue = document.getElementById('prestasiSpSelect').value;
    var tarikhValue = document.getElementById('prestasiSpDate').value;

    // Validate Keterangan (Select)
    if (typeValue === "") {
        isValid = false;
        document.getElementById("prestasiSpSelect_error").textContent = "Sila pilih amaran atau peringkatan";
    }

    // Validate Tarikh (Date)
    if (tarikhValue === "") {
        isValid = false;
        document.getElementById("prestasiSpDate_error").textContent = "Sila isi Tarikh.";
    }

    if(!sp_file) {
        isValid = false;
        document.getElementById("sp_file_name_error").textContent = "Sila upload file.";
    }

    if(isValid) {
        // Get the index you want to retrieve (for example, 1)
        const dataIndex = document.getElementById('row_index').value ;

        // Use querySelector to find the <tr> element with the matching data-index attribute
        const tr = document.querySelector(`tr[data-index="${dataIndex}"]`);

        let tdinputElements = tr.querySelectorAll("td input");
        let tdSelectElements = tr.querySelectorAll("td select");
        let tdElements = tr.querySelectorAll("td");
        let trInputElements = tr.querySelectorAll("input");

        let spFileInput = tr.querySelector('input[type="file"]#spMuatNaik');
        let eotFileInput = tr.querySelector('input[type="file"]#eotMuatNaik');

        harilewat = tr.querySelector('input[type="text"]#hariLewat').value


        if (tr.querySelector('input[type="text"]#statusPelaksanaan') != null) {
            statusPelaksanaan = tr.querySelector('input[type="text"]#statusPelaksanaan').value
        } else {
            statusPelaksanaan = 'IJ'
        }

        prestasiData = {
            "tahun": tdElements[1].innerHTML,
            "bulan": tdElements[2].innerHTML,
            "deliverable": tdSelectElements[0].value,
            "emel": tdSelectElements[1].value,
            "tarikhMulaJadual": tr.querySelector('input[type="date"]#tarikhMulaJadual').value ? tr
                .querySelector('input[type="date"]#tarikhMulaJadual').value : null,
            "tarikhMulaSebenar": tr.querySelector('input[type="date"]#tarikhMulaSebenar').value ? tr
                .querySelector('input[type="date"]#tarikhMulaSebenar').value : null,
            "tarikhSiapJadual": tr.querySelector('input[type="date"]#tarikhSiapJadual').value ? tr
                .querySelector('input[type="date"]#tarikhSiapJadual').value : null,
            "tarikhSiapSebenar": tr.querySelector('input[type="date"]#tarikhSiapSebenar').value ? tr
                .querySelector('input[type="date"]#tarikhSiapSebenar').value : null,
            "hariLewat": harilewat,
            "peratusJadual": tr.querySelector('input[type="number"]#peratusJadual').value,
            "peratusKumulatifJadual": tr.querySelector('input[type="text"]#peratusKumulatifJadual').value,
            "peratusSebenar": tr.querySelector('input[type="number"]#peratusSebenar').value,
            "peratusKumulatifSebenar": tr.querySelector('input[type="text"]#peratusKumulatifSebenar').value,
            "statusPelaksanaan": statusPelaksanaan,
            "tarikhMesyuarat": tr.querySelector('input[type="date"]#tarikhMesyuarat').value ? tr
                .querySelector('input[type="date"]#tarikhMesyuarat').value : null,
            "keputusan": tdSelectElements[2].value,
            "penilaian": tr.querySelector('input[type="text"]#penilaian').value,
            "EOT": tr.querySelector('input[type="date"]#EOT').value ? tr.querySelector(
                'input[type="date"]#EOT').value : null,
            "tarikhLadMula": tr.querySelector('input[type="date"]#tarikhLadMula').value ? tr.querySelector(
                'input[type="date"]#tarikhLadMula').value : null,
            "tarikhLadTamat": tr.querySelector('input[type="date"]#tarikhLadTamat').value ? tr
                .querySelector('input[type="date"]#tarikhLadTamat').value : null,
            "bilanganHariLad": tr.querySelector('input[type="text"]#bilanganHariLad').value,
            "jumlahLad": tr.querySelector('input[type="text"]#jumlahLad').value,
            "tarikhKemaskini": tr.querySelector('input[type="date"]#tarikhKemaskini').value ? tr
                .querySelector('input[type="date"]#tarikhKemaskini').value : null,
            "version": tr.querySelector('input[type="hidden"]#version').value,
            "id": tr.querySelector('input[type="hidden"]#id').value,
            "is_readonly": tr.querySelector('input[type="hidden"]#is_readonly').value,
            'eotFile': false,
            'spFile': false
        }

        var formData = new FormData();

        const api_url = "{{ env('API_URL') }}"
        const api_token = "Bearer " + window.localStorage.getItem('token');


        formData.append('user_id', "{{ Auth::user()->id }}")
        formData.append('perolehan_id', "{{$perolehan_id}}")
        formData.append('pemantauan_id', "{{$project_id}}")
        formData.append('prestasi_details', JSON.stringify(prestasiData))

        formData.append('type', document.getElementById('prestasiSpSelect').value)
        formData.append('tarikh', document.getElementById('prestasiSpDate').value)


        if (sp_file) {
            formData.append('sp_file_name', sp_file);
        }


        axios.defaults.headers.common["Authorization"] = api_token
        axios({
                method: 'post',
                url: api_url + "api/perunding/prestasi_rekord_lampiran",
                responseType: 'json',
                data: formData
            })
            .then(function(response) {
                if (response.data.code == 200) {
                    // location.reload();
                    $("#add_role_sucess_modal").modal('show');
                    $("#tutup_new").click(function() {
                        location.reload();
                        // var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                        // url = url.replace(":id", response.data.data.id)
                        // url = url.replace(":status", response.data.data.workflow_status)
                        // url = url.replace(":user_id", response.data.data.dibuat_oleh)
                        // window.location.href = url
                    })
                    // $("#close_modal").click(function() {
                    //     var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                    //     url = url.replace(":id", response.data.data.id)
                    //     url = url.replace(":status", response.data.data.workflow_status)
                    //     url = url.replace(":user_id", response.data.data.dibuat_oleh)
                    //     window.location.href = url
                    // })

                } else {
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                    if (response.data.code == 400) {
                        alert(response.data.message)
                    } else {
                        alert('error while saving project')
                    }

                }

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })
            .catch(function(error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })
    }

    


}

function simpanPrestasi() {

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    var formData = new FormData();

    let all_prestasimain_tr = document.querySelectorAll(
        ".prestasimainrow"
    );

    prestasiDetails = []
    all_prestasimain_tr.forEach((tr) => {
        let tdinputElements = tr.querySelectorAll("td input");
        let tdSelectElements = tr.querySelectorAll("td select");
        let tdElements = tr.querySelectorAll("td");
        let trInputElements = tr.querySelectorAll("input");

        let spFileInput = tr.querySelector('input[type="file"]#spMuatNaik');
        let eotFileInput = tr.querySelector('input[type="file"]#eotMuatNaik');

        harilewat = tr.querySelector('input[type="text"]#hariLewat').value


        if (tr.querySelector('input[type="text"]#statusPelaksanaan') != null) {
            statusPelaksanaan = tr.querySelector('input[type="text"]#statusPelaksanaan').value
        } else {
            statusPelaksanaan = 'IJ'
        }

        prestasiData = {
            "tahun": tdElements[1].innerHTML,
            "bulan": tdElements[2].innerHTML,
            "deliverable": tdSelectElements[0].value,
            "emel": tdSelectElements[1].value,
            "tarikhMulaJadual": tr.querySelector('input[type="date"]#tarikhMulaJadual').value ? tr
                .querySelector('input[type="date"]#tarikhMulaJadual').value : null,
            "tarikhMulaSebenar": tr.querySelector('input[type="date"]#tarikhMulaSebenar').value ? tr
                .querySelector('input[type="date"]#tarikhMulaSebenar').value : null,
            "tarikhSiapJadual": tr.querySelector('input[type="date"]#tarikhSiapJadual').value ? tr
                .querySelector('input[type="date"]#tarikhSiapJadual').value : null,
            "tarikhSiapSebenar": tr.querySelector('input[type="date"]#tarikhSiapSebenar').value ? tr
                .querySelector('input[type="date"]#tarikhSiapSebenar').value : null,
            "hariLewat": harilewat,
            "peratusJadual": tr.querySelector('input[type="number"]#peratusJadual').value,
            "peratusKumulatifJadual": tr.querySelector('input[type="text"]#peratusKumulatifJadual').value,
            "peratusSebenar": tr.querySelector('input[type="number"]#peratusSebenar').value,
            "peratusKumulatifSebenar": tr.querySelector('input[type="text"]#peratusKumulatifSebenar').value,
            "statusPelaksanaan": statusPelaksanaan,
            "tarikhMesyuarat": tr.querySelector('input[type="date"]#tarikhMesyuarat').value ? tr
                .querySelector('input[type="date"]#tarikhMesyuarat').value : null,
            "keputusan": tdSelectElements[2].value,
            "penilaian": tr.querySelector('input[type="text"]#penilaian').value,
            "EOT": tr.querySelector('input[type="date"]#EOT').value ? tr.querySelector(
                'input[type="date"]#EOT').value : null,
            "tarikhLadMula": tr.querySelector('input[type="date"]#tarikhLadMula').value ? tr.querySelector(
                'input[type="date"]#tarikhLadMula').value : null,
            "tarikhLadTamat": tr.querySelector('input[type="date"]#tarikhLadTamat').value ? tr
                .querySelector('input[type="date"]#tarikhLadTamat').value : null,
            "bilanganHariLad": tr.querySelector('input[type="text"]#bilanganHariLad').value,
            "jumlahLad": tr.querySelector('input[type="text"]#jumlahLad').value,
            "tarikhKemaskini": tr.querySelector('input[type="date"]#tarikhKemaskini').value ? tr
                .querySelector('input[type="date"]#tarikhKemaskini').value : null,
            "version": tr.querySelector('input[type="hidden"]#version').value,
            "id": tr.querySelector('input[type="hidden"]#id').value,
            "is_readonly": tr.querySelector('input[type="hidden"]#is_readonly').value,
            'eotFile': false,
            'spFile': false
        }
        
        if (spFileInput) {
            let spFile = spFileInput.files[0];
            if (spFile) {
                prestasiData.spFile = true
                formData.append('spFile[]', spFile);
            }
        }

        if (eotFileInput) {
            let eotFile = eotFileInput.files[0];
            if (eotFile) {
                prestasiData.eotFile = true
                formData.append('eotFile[]', eotFile);
            }
        }

        prestasiDetails.push(JSON.stringify(prestasiData))

    });

    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');


    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('perolehan_id', "{{$perolehan_id}}")
    formData.append('pemantauan_id', "{{$project_id}}")

    prestasiDetails.forEach((item) => {
        formData.append('prestasiDetails[]', item);
    });

    axios.defaults.headers.common["Authorization"] = api_token
    axios({
            method: 'post',
            url: api_url + "api/perunding/prestasi",
            responseType: 'json',
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                // location.reload();
                $("#add_role_sucess_modal").modal('show');
                $("#tutup_new").click(function() {
                    location.reload();
                    // var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                    // url = url.replace(":id", response.data.data.id)
                    // url = url.replace(":status", response.data.data.workflow_status)
                    // url = url.replace(":user_id", response.data.data.dibuat_oleh)
                    // window.location.href = url
                })
                // $("#close_modal").click(function() {
                //     var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                //     url = url.replace(":id", response.data.data.id)
                //     url = url.replace(":status", response.data.data.workflow_status)
                //     url = url.replace(":user_id", response.data.data.dibuat_oleh)
                //     window.location.href = url
                // })

            } else {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

                if (response.data.code == 400) {
                    alert(response.data.message)
                } else {
                    alert('error while saving project')
                }

            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
}


function handleMuatNaikSp(event) {

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    const tr = this.closest('tr');
    const dataIndex = tr.getAttribute('data-index');
    
    // Set the value of the hidden input element
    const rowIndexInput = document.getElementById('row_index');
    rowIndexInput.value = dataIndex;

    // Get the index you want to retrieve (for example, 1)
    const dataIndex1 = document.getElementById('row_index').value ;

    // Use querySelector to find the <tr> element with the matching data-index attribute
    const tr1 = document.querySelector(`tr[data-index="${dataIndex1}"]`);

    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_rekord_lampiran/list",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
                prestasi_id: tr1.querySelector('input[type="hidden"]#id').value,
            }
        })
        .then(function(response) {
            console.log(response.data.data);
            console.log(response.data.code);
            rlCounter = 0
            if (response.data.code == 200) {
                // location.reload();
                
                response.data.data.forEach(rl => {
                    mediaData = 
                    rlCounter += 1
                    console.log(rl);
                    let rlTbody = `<tr class=" Table_perunding_body rlmainrow">
                                        <td>` + rlCounter + `</td>
                                        <td>
                                            `+rl.type+`
                                        </td>
                                        <td>
                                            `+rl.tarikh+`
                                        </td>
                                        <td class="d-flex"
                                            style="vertical-align: middle;">
                                            <button type="button" class="btnSej rlMuatNaik" style="height: 77%;color:blue;background-color:white" onClick="downloadDoc(` + rl.media[0].id + `,
                                                `+rl.media[0].model_id+`,
                                                '`+rl.media[0].model_type+`',
                                                '`+rl.media[0].collection_name+`',
                                                '`+rl.media[0].file_name+`')">
                                                ` + rl.media[0].file_name + `
                                            </button>
                                        </td>
                                        <td>
                                        </button>
                                            <button type="button" id="rlRemove" class="p-2 rlRemove"  onClick="removeImage(` + rl.id + `,`+rlCounter+`)">
                                                <div class="nageri_union"><img src="{{ asset('assets/images/Union.png') }}" alt="close" style="width: 40%;></div>Padam  
                                            </button>
                                        </td>
                                    </tr>`
                    $('#rlTbody').append(rlTbody);
                })

            } else {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

    $('#modalSpPopUp').modal('show');
    
    // const modal = document.getElementById('modalSpPopUp');
    // console.log(modal);
    // modal.style.display = 'block';

    // btn = event.target
    // const fileInput = document.createElement('input');
    // fileInput.type = 'file';
    // fileInput.style.display = 'none';
    // fileInput.id = 'spMuatNaik'

    // fileInput.addEventListener('change', (event) => {
    //     const file = event.target.files[0];

    //     // Show the filename
    //     btn.textContent = file.name;
    // });



    // // Append the input element to the td tag
    // const td = btn.parentNode;
    // td.appendChild(fileInput);

    // fileInput.click();

    // btn.style.color = 'blue'
    // btn.style.background_color = 'white'
}

function handleMuatNaikEot(event) {
    btn = event.target
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.style.display = 'none';
    fileInput.id = 'eotMuatNaik'

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
    btn.style.background_color = 'white'
}

function loadTempoh(data,activePrestasi,kemaskiniData) {
    const tarikh_sst = new Date(data.perolehan.tarikh_setuju_terima);
    const currentDate = new Date();    

    if(activePrestasi){
        tarikh_kemaskini = new Date();
        if(kemaskiniData) {
            tarikh_kemaskini = new Date(kemaskiniData.created_at);
        }
        
        const kemajuan_months = (tarikh_kemaskini.getFullYear() - tarikh_sst.getFullYear()) * 12 + (tarikh_kemaskini.getMonth() - tarikh_sst.getMonth());
        const pelaksanaan_months = (currentDate.getFullYear() - tarikh_sst.getFullYear()) * 12 + (currentDate.getMonth() - tarikh_sst.getMonth());
        
        document.getElementById('tempoh_kemajuan').classList.remove('d-none')
        document.getElementById('tempoh_pelaksanaan').classList.remove('d-none')
        document.getElementById('tempoh_kemajuan').innerHTML = `Tempoh Kemajuan = ( `+kemajuan_months+` Bulan ) `+tarikh_sst.toLocaleDateString('en-GB')+` Sehingga `+ tarikh_kemaskini.toLocaleDateString('en-GB')
        document.getElementById('tempoh_pelaksanaan').innerHTML = `Tempoh Pelaksanaan = ( `+pelaksanaan_months+` Bulan ) `+tarikh_sst.toLocaleDateString('en-GB')+` Sehingga ` + currentDate.toLocaleDateString('en-GB')
    }
    else {
        document.getElementById('tempoh_kemajuan').classList.add('d-none')
        document.getElementById('tempoh_pelaksanaan').classList.add('d-none')
    }
    
}

function loadPrestasi() {

    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');
    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_details",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
            }
        })
        .then(function(response) {

            yaxis = []
            jadual_sebenar = []
            jadual_asal = []
            jadual_dipindah = []
            prestasi_details = response.data.data.prestasiPerunding
            perolehan_details = response.data.data.perolehan
            perolehan_details = response.data.data.perolehan
            console.log(response.data.data);
            loadOldPrestasi(response.data.data.all_version)
            console.log('ok');
            loadTempoh(response.data.data,response.data.data.prestasiPerundingActive,response.data.data.prestasiChangeHistory)
            console.log('ok');
            
            if (prestasi_details.length == 0) {
                loadEmptyPrestasi()
            }
            peratus_kumulatif_sebenar = 0
            peratus_kumulatif_jadual = 0

            document.getElementById('kod_projek').value = perolehan_details.pemantauan_project.kod_projeck
            document.getElementById('nama_project').value = perolehan_details.pemantauan_project.nama_projek
            document.getElementById('nama_perunding').value = perolehan_details.nama_peruding;
            document.getElementById('nama_perolehan').value = perolehan_details.nama_perolehan;
            document.getElementById('no_perjanjian').value = '';
            document.getElementById('tarik_perunding').value = perolehan_details.tarikh_setuju_terima;

            prestasi_details.forEach(prestasi => {
                bulan = getMonthDetails(prestasi.bulan)
                yaxis.push(bulan + ' ' + prestasi.tahun)

                if(prestasi.keputusan != 'Gagal') {
                    peratus_kumulatif_sebenar = peratus_kumulatif_sebenar + parseInt(prestasi.peratus_sebenar) 
                    peratus_kumulatif_jadual = peratus_kumulatif_jadual + parseInt(prestasi.peratus_jadual) 
                    jadual_sebenar.push(peratus_kumulatif_sebenar)
                    jadual_asal.push(peratus_kumulatif_jadual)
                    jadual_dipindah.push(peratus_kumulatif_sebenar - peratus_kumulatif_jadual)
                }

                

                let deliverableOptions = ''
                spFilename = 'Muat Naik'
                eotFilename = 'Muat Naik'
                prestasi.media.forEach(media => {
                    if (media.collection_name == 'eot') {
                        eotFilename = media.file_name
                    }

                    // if (media.collection_name == 'sp') {
                    //     spFilename = media.file_name
                    // }
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

                mainPrestasiCounter += 1
                readonly = ''
                disabled = ''
                if (prestasi.is_readonly == '1') {
                    readonly = 'readonly'
                    disabled = 'disabled'
                }
                

                masalah_button = `<button  type="button" onClick="loadMasalahData(` + prestasi.id + `)"
                                        class="masalah_perunding rbtnBulanan" >
                                        <img
                                            src="{{ asset('assets/images/add_plus.png') }}" />&nbsp;Masalah
                                    </button>`

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

                remove_button = `<button data-title="Buang skop" type="button" ` + disabled + `
                                        id="prestasiMainRemoveBtn"
                                        class="minusbutton ml-2 prestasiMainRemoveBtn">
                                        <i
                                            class="ri-checkbox-indeterminate-line ri-xl"></i>
                                    </button>`
                
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
                    mainPrestasiCounterDisplay = mainPrestasiCounter
                    gagalReadonly = ''
                    gagalDisable = 'disabled'
                }

                rowTemplate = `<tr  class="Table_perunding_body rbtnBulanan prestasimainrow" data-index="`+mainPrestasiCounter+`">
                                <td scope="row">
                                    ` + mainPrestasiCounterDisplay + `
                                </td>
                                <!-- <td scope="row">
                                    <img
                                        src="{{ asset('assets/images/arroew_up.png') }}" />
                                </td> -->
                                <td id="tahun" class="tahun">` + prestasiTahun + `</td>
                                <td id="month" class="month">` + prestasiBulan + `</td>
                                <td>
                                    <select name="" id="" ` + disabled + `
                                        class="form-control rbtnBulanan">
                                        ` + deliverableOptions +
                    `
                                    </select>
                                </td>
                                <td>
                                <button type="button" class="masalah_perunding rbtnBulanan spMuatNaik btn btn text-white" style="background-color: #6C757D;" id="spMuatNaik" ` +
                    disabled + `> Muat Naik
                                </button>
                                </td>
                                <td>
                                    <select class="form-control rbtnBulanan" name="" id="" ` + disabled + ` `+gagalDisable+`>
                                        ` + emailOptions + `
                                    </select>
                                </td>
                                <td>
                                    <input style="max-width: 80%;" type="date" class="form-control rbtnBulanan" id="tarikhMulaJadual"
                                        value="` + prestasi.tarikh_mula_jadual + `" ` + readonly + ` `+gagalReadonly+`/>
                                </td>
                                <td>
                                    <input style="max-width: 80%;" type="date" class="form-control rbtnBulanan" id="tarikhMulaSebenar"
                                        value="` + prestasi.tarikh_mula_sebenar + `" ` + readonly + ` `+gagalReadonly+`/>
                                </td>
                                <td>
                                    <input style="max-width: 80%;" type="date" class="form-control rbtnBulanan tarikhSiapJadual" id="tarikhSiapJadual"
                                        value="` + prestasi.tarikh_siap_jadual + `" ` + readonly + ` `+gagalReadonly+`/>
                                </td>
                                
                                <td>
                                    <input type="date" class="form-control rbtnBulanan tarikhSiapSebenar" id="tarikhSiapSebenar"
                                        value="` + prestasi.tarikh_siap_sebenar + `" ` + readonly + `/>
                                </td>

                                <td>
                                    <input type="text" class="form-control rbtnBulanan hariLewat" id="hariLewat"
                                        value="` + prestasi.hari_lewat_awal + `" style="color: #FF0000;width: 65%; readonly"/>

                                </td>
                                
                                <td>
                                    <input type="number" class="form-control rbtnBulanan" id="peratusJadual"
                                        value="` + prestasi.peratus_jadual + `" placeholder="" style="width: 65%;"`  + readonly + ` `+gagalReadonly+`/>
                                </td>
                                <td>
                                    <input type="text" class="form-control rbtnBulanan" id="peratusKumulatifJadual"
                                        value="` + peratus_kumulatif_jadual + `" placeholder="" style="width: 65%;" readonly/>
                                </td>


                                <td><input type="number" class="form-control rbtnBulanan" id="peratusSebenar"
                                        value="` + prestasi.peratus_sebenar + `" placeholder="" style="width: 65%;"` + readonly + `/>
                                </td>
                                <td><input type="text" class="form-control rbtnBulanan" id="peratusKumulatifSebenar"
                                        value="` + peratus_kumulatif_sebenar + `" placeholder="" style="width: 65%;" readonly/>
                                </td>

                                <td>
                                    <input style="height: 100%;" type="text" class="` + pelaksanaanClass + ` rbtnBulanan statusPelaksanaan" id="statusPelaksanaan"
                                    value="` + prestasi.status_pelaksanaan + `" ` + readonly + ` `+gagalReadonly+`/>
                                </td>
                                <td>
                                    ` + masalah_button + `
                                </td>
                                <td>
                                    <input type="date" style="max-width:85%" class="form-control rbtnBulanan" id="tarikhMesyuarat"
                                        value="` + prestasi.tarikh_mesyuarat + `" ` + readonly + `/>
                                </td>
                                <td>
                                    <select class="form-control rbtnBulanan" name="" ` + disabled + `
                                        id="">
                                        ` + keputusanOptions + `
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control rbtnBulanan" id="penilaian"
                                        value="` + prestasi.penilaian +
                    `" readonly/>
                                </td>
                                <td>
                                    <input type="date" style="max-width:90%;" class="form-control rbtnBulanan" id="EOT" ` + readonly + `

                                    <input type="date" style="max-width:90%" class="form-control rbtnBulanan" id="EOT" ` +
                    readonly + `
                                        value="` + prestasi.EOT +
                    `" />
                                </td>
                                <td>
                                <button type="button" class="masalah_perunding rbtnBulanan eotMuatNaik btn btn text-white" style="background-color: #6C757D;" id="eotMuatNaik" 
                                ` + disabled + `>
                                    ` + eotFilename +
                    `
                                </button>
                                </td>

                                <td>
                                    <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="tarikhLadMula" ` +
                    readonly + `
                                        value="` + prestasi.tarikh_lad_mula + `" />
                                </td>
                                <td>
                                    <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="tarikhLadTamat" ` +
                    readonly + `
                                        value="` + prestasi.tarikh_lad_tamat + `" />
                                </td>
                                <td>
                                    <input type="text" class="form-control rbtnBulanan" id="bilanganHariLad" ` +
                    readonly + `
                                        value="` + prestasi.bilangan_hari_lad + `" />
                                </td>
                                <td>
                                    <input type="text" class="form-control rbtnBulanan" id="jumlahLad" ` + readonly + `
                                        value="` + prestasi.jumlah_lad_terkumpul + `" readonly/>
                                </td>
                                <td>
                                    <input style="max-width:90%" type="date" class="form-control rbtnBulanan" id="tarikhKemaskini" 
                                        value="` + prestasi.tarikh_kemaskini + `" readonly/>
                                </td>
                                <td style="vertical-align: middle;">
                                    `+remove_button+`
                                </td>
                                <input type="hidden" value="` + prestasi.version_no + `" id="version"/>
                                <input type="hidden" value="` + prestasi.id + `" id="id"/>
                                <input type="hidden" value="` + prestasi.is_readonly + `" id="is_readonly"/>
                            </tr>`

                $('#prestasiMainTbody').append(rowTemplate);


                let all_prestasimain_tr = document.querySelectorAll(
                    ".prestasimainrow"
                );

                let all_prestasiRemove_btn = document.querySelectorAll(
                    "[id^='prestasiMainRemoveBtn']"
                );

                all_prestasiRemove_btn.forEach((tb, i) => {
                    tb.addEventListener("click", () => {
                        all_prestasimain_tr[i + 1].remove();
                    });
                });

                let all_spMuatNaik_btn = document.querySelectorAll('.spMuatNaik');
                let all_eotMuatNaik_btn = document.querySelectorAll('.eotMuatNaik');


                all_eotMuatNaik_btn.forEach((btn, i) => {
                    btn.removeEventListener('click', handleMuatNaikEot);
                    btn.addEventListener('click', handleMuatNaikEot);
                });

                all_spMuatNaik_btn.forEach((btn, i) => {

                    // Remove the event listener
                    btn.removeEventListener('click', handleMuatNaikSp);
                    btn.addEventListener('click', handleMuatNaikSp);
                });

                let all_tarikhSiapSebenar_btn = document.querySelectorAll('.tarikhSiapSebenar');

                all_tarikhSiapSebenar_btn.forEach((btn, i) => {
                    btn.removeEventListener('input', changeStatusPelaksanaan);
                    btn.addEventListener('input', changeStatusPelaksanaan);
                });

                let all_tarikhMulaJadual_btn = document.querySelectorAll('.tarikhMulaJadual');

                all_tarikhMulaJadual_btn.forEach((btn, i) => {
                    btn.removeEventListener('input', changeTahunBulan);
                    btn.addEventListener('input', changeTahunBulan);
                });
            })

            // Get the canvas element
            const ctx = document.getElementById('myChart');

            const labels = yaxis;
            const data = {
                labels: labels,
                datasets: [{
                        label: 'Jadual Asal',
                        data: jadual_asal,
                        fill: false,
                        backgroundColor: 'grey',
                        borderColor: 'grey',
                        tension: 0.1
                    },
                    {
                        label: 'Jadual Asal Dipinda',
                        data: jadual_dipindah,
                        fill: false,
                        backgroundColor: 'rgb(255, 0, 0)',
                        borderColor: 'rgb(255, 0, 0)',
                        tension: 0.1
                    },
                    {
                        label: 'Jadual Sebenar',
                        data: jadual_sebenar,
                        fill: false,
                        backgroundColor: 'rgb(0, 0, 255)',
                        borderColor: 'rgb(0, 0, 255)',
                        tension: 0.1
                    }
                ]
            };
            new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Maklumat Kemajuan Deliverable', // Replace with your desired title
                            font: {
                                size: 16, // Adjust the font size if needed
                                weight: 'bold' // You can also set font weight
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            // Create the chart
            const lineChart = new Chart(ctx, options);
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
}

function loadMasalahData(id) {
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_masalah",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
                prestasi_id: id,
            }
        })
        .then(function(response) {
            if (response.data.data) {
                document.getElementById('masalah_id').value = id
                document.getElementById('masalahCatatan').value = response.data.data.masalah
            } else {
                document.getElementById('masalah_id').value = id
                document.getElementById('masalahCatatan').value = ''
            }

            $('#add_masalah_modal').modal('show');
        })
}

function simpanMasalah() {
    var formData = new FormData();

    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('perolehan_id', document.getElementById('perolehan_id').value)
    formData.append('pemantauan_id', document.getElementById('pemantauan_id').value)

    formData.append('masalah_catatan', document.getElementById('masalahCatatan').value)
    formData.append('masalah_id', document.getElementById('masalah_id').value)

    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
    axios({
            method: 'post',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_masalah",
            responseType: 'json',
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                $('#add_selenggara_data_modal').modal('hide');
                  $("#add_role_sucess_modal1").modal('show');
                  $("#tutup_new1").click(function(){
                    location.reload();
                //     var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                //     url = url.replace(":id", response.data.data.id)
                //     url = url.replace(":status", response.data.data.workflow_status)
                //     url = url.replace(":user_id", response.data.data.dibuat_oleh)
                //     window.location.href = url
                  })
                //   $("#close_modal").click(function(){
                //     var url = "{{ route('daftar.edit',[ ':id',':status',':user_id']) }}"
                //     url = url.replace(":id", response.data.data.id)
                //     url = url.replace(":status", response.data.data.workflow_status)
                //     url = url.replace(":user_id", response.data.data.dibuat_oleh)
                //     window.location.href = url
                //   })

            } else {
                $('#add_selenggara_data_modal').modal('hide');
                alert('error while saving project')
            }
        })
        .catch(function(error) {
            $('#add_selenggara_data_modal').modal('hide');
        })
}

function loadLatestPrestasiSejarah() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_sejarah/latest",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
            }
        })
        .then(function(response) {
            if (response.data.code == 200) {
                if(response.data.data) {
                    document.getElementById('dikemaskiniOleh').textContent = response.data.data.updated_by.name
                    document.getElementById('dikemaskiniBahagian').textContent = response.data.data.updated_by.bahagian
                        .nama_bahagian
                }
                
            }
        })
}

function loadSejarahPrestasi() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_sejarah/list",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
            }
        })
        .then(function(response) {
            if (response.data.code == 200) {
                var masalah_table = $('#sejarahPrestasiTable').DataTable({
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
                            "first": "Awal",
                            "last": "Akhir",
                            "next": "Seterusnya",
                            "previous": "Sebelum"
                        },
                    },
                    pagingType: 'full_numbers',
                    columnDefs: [{
                        targets: 0, // Start with the last
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = meta.row + 1;
                            }
                            return data;
                        }
                    }, {
                        targets: 1, // Start with the last
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = row.created_at.substring(0, 10);
                            }
                            return data;
                        }
                    }, ],
                    columns: [{
                            data: 'id',
                            "sortable": true
                        },
                        {
                            data: 'created_at',
                            "sortable": true
                        },
                        {
                            data: 'updated_by.name',
                            "sortable": true
                        },
                        {
                            data: 'updated_by.bahagian.nama_bahagian',
                            "sortable": true
                        },
                        {
                            data: 'bahagian',
                            "sortable": true
                        }
                    ],

                });

            } else {
                alert('error while loading sejarah prestasi ' + response.data.code)
            }
        })
        .catch(function(error) {
            alert('error while loading sejarah prestasi catch')
        })
}

function loadSenaraiMasalah() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/prestasi_masalah/list",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
            }
        })
        .then(function(response) {
            if (response.data.code == 200) {

                var masalah_table = $('#senaraiMasalahTable').DataTable({
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
                            "first": "Awal",
                            "last": "Akhir",
                            "next": "Seterusnya",
                            "previous": "Sebelum"
                        },
                    },
                    pagingType: 'full_numbers',
                    columnDefs: [{
                        targets: 2, // Start with the last
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                if (row.is_done == 0) {
                                    data =
                                        `<input type="checkbox" name="" id="" />`;
                                } else {
                                    data =
                                        `<input checked type="checkbox" name="" id="" />`;
                                }

                            }
                            return data;
                        }
                    }, ],
                    columns: [{
                            data: 'masalah',
                            "sortable": true
                        },
                        {
                            data: 'tarikh_masalah',
                            "sortable": true
                        },
                        {
                            data: 'is_done',
                            "sortable": true
                        }
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


            } else {
                alert('error while loading senarai masalah ' + response.data.code)
            }
        })
        .catch(function(error) {
            alert('error while loading senarai masalah catch')
        })
}

function loadEmptyPrestasi() {
    console.log('empty');
    mainPrestasiCounter += 1

    // Get the current date
    currentDate = new Date();

    // Get the current year
    currentYear = currentDate.getFullYear();

    // Get the current month
    // Note: The getMonth() method returns a zero-based index, where January is 0 and December is 11.
    currentMonth = currentDate.getMonth() + 1;

    let deliverableOptions = ''
    $.each(deliverables, function(key, item) {

        // json_value = JSON.parse(item.json_value)

        if (item.is_heading == 0) {
            deliverableOptions = deliverableOptions + '<option value="' + item.code +
                '">' +
                item.value + '</option>'
        } else {
            deliverableOptions = deliverableOptions + '<option value="' + item.code +
                '" disabled style="font-weight: bold;">' +
                item.value + '</option>'
        }
    })

    let emailOptions = ''
    $.each(emails, function(key, item) {
        emailOptions = emailOptions + '<option value="' + item.value +
            '">' +
            item.name + '</option>'
    })

    remove_button = `<button data-title="Buang skop" type="button"
                        id="prestasiMainRemoveBtn"
                        class="minusbutton ml-2 prestasiMainRemoveBtn">
                        <i
                            class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button>`

    if(mainPrestasiCounter == 1) {
        remove_button = ''
    }
    rowTemplate = `<tr  class="Table_perunding_body rbtnBulanan prestasimainrow" data-index="`+mainPrestasiCounter+`">
                <td scope="row">
                    ` + mainPrestasiCounter + `
                </td>
                <!-- <td scope="row">
                    <img
                        src="{{ asset('assets/images/arroew_up.png') }}" />
                </td> -->
                <td id="tahun" class="tahun">` + currentYear + `</td>
                <td id="month" class="month">` + currentMonth + `</td>
                <td>
                    <select name="" id=""
                        class="form-control rbtnBulanan">
                        ` + deliverableOptions + `
                    </select>
                </td>
                <td>
                <button type="button" class="masalah_perunding rbtnBulanan spMuatNaik btn btn text-white" style="background-color: #6C757D;" id="spMuatNaik">
                            Muat Naik
                        </button>
                </td>
                <td>
                    <select class="form-control rbtnBulanan" name="" id="">
                        ` + emailOptions + `
                    </select>
                </td>
                <td>
                    <input style="width:80%" type="date" class="form-control rbtnBulanan tarikhMulaJadual" id="tarikhMulaJadual"
                        value="" />
                </td>
                <td>
                    <input style="width:80%" type="date" class="form-control rbtnBulanan" id="tarikhMulaSebenar"
                        value="" />
                </td>
                <td>
                    <input style="width:80%" type="date" class="form-control rbtnBulanan tarikhSiapJadual" id="tarikhSiapJadual"
                        value="" />
                </td>
                <td>
                    <input style="width:80%" type="date" class="form-control rbtnBulanan tarikhSiapSebenar" id="tarikhSiapSebenar"
                        value="" />
                </td>
                

                <td>
                    <input style="width:80%" type="text" class="form-control rbtnBulanan hariLewat" id="hariLewat"
                        value="0" style="color: #FF0000;" readonly/>
                </td>

                <td>
                    <input type="number" class="form-control rbtnBulanan" id="peratusJadual"
                        value="0" />
                </td>
                <td>
                    <input type="text" class="form-control rbtnBulanan" id="peratusKumulatifJadual"
                        value="0" readonly/>
                </td>

                <td><input type="number" class="form-control rbtnBulanan" id="peratusSebenar"
                        value="0" />
                </td>
                <td><input type="text" class="form-control rbtnBulanan" id="peratusKumulatifSebenar"
                        value="0"readonly />
                </td>

                <td>
                    <input style="height:100%" type="text" class="rbtnBulanan statusPelaksanaan status_pelaksanaan_green" id="statusPelaksanaan"
                        value="IJ" readonly/>
                </td>
                <td>
                    
                </td>
                <td>
                    <input type="date" class="form-control rbtnBulanan" id="tarikhMesyuarat"
                        value="" />
                </td>
                <td>
                    <select class="form-control rbtnBulanan" name=""
                        id="">
                        <option value="Lulus">Lulus</option>
                        <option value="Gagal">Gagal</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control rbtnBulanan" id="penilaian"
                        value="" readonly/>
                </td>
                <td>
                    <input type="date" class="form-control rbtnBulanan" id="EOT"
                        value="" />
                </td>
                <td>
                    <button type="button" class="masalah_perunding rbtnBulanan eotMuatNaik btn btn text-white" style="background-color:#6C757D" id="eotMuatNaik">
                            Muat Naik
                    </button>   
                </td>

                <td>
                    <input type="date" class="form-control rbtnBulanan" id="tarikhLadMula"
                        value="" />
                </td>
                <td>
                    <input type="date" class="form-control rbtnBulanan" id="tarikhLadTamat"
                        value="" />
                </td>
                <td>
                    <input type="text" class="form-control rbtnBulanan" id="bilanganHariLad"
                        value="0" />
                </td>
                <td>
                    <input type="text" class="form-control rbtnBulanan" id="jumlahLad"
                        value="0.00" readonly/>
                </td>
                <td>
                    <input type="date" class="form-control rbtnBulanan" id="tarikhKemaskini"
                        value="" readonly/>
                </td>
                <td>
                    `+remove_button+`
                </td>
                <input type="hidden" value="" id="version"/>
                <input type="hidden" value="" id="id"/>
                <input type="hidden" value="0" id="is_readonly"/>
            </tr>`

    $('#prestasiMainTbody').append(rowTemplate);

    let all_prestasimain_tr = document.querySelectorAll(
        ".prestasimainrow"
    );

    let all_prestasiRemove_btn = document.querySelectorAll(
        "[id^='prestasiMainRemoveBtn']"
    );

    all_prestasiRemove_btn.forEach((tb, i) => {
        tb.addEventListener("click", () => {
            all_prestasimain_tr[i + 1].remove();
        });
    });

    let all_spMuatNaik_btn = document.querySelectorAll('.spMuatNaik');
    let all_eotMuatNaik_btn = document.querySelectorAll('.eotMuatNaik');


    all_eotMuatNaik_btn.forEach((btn, i) => {
        btn.removeEventListener('click', handleMuatNaikEot);
        btn.addEventListener('click', handleMuatNaikEot);
    });

    all_spMuatNaik_btn.forEach((btn, i) => {

        // Remove the event listener
        btn.removeEventListener('click', handleMuatNaikSp);
        btn.addEventListener('click', handleMuatNaikSp);
    });

    let all_tarikhSiapSebenar_btn = document.querySelectorAll('.tarikhSiapSebenar');

    all_tarikhSiapSebenar_btn.forEach((btn, i) => {
        btn.removeEventListener('input', changeStatusPelaksanaan);
        btn.addEventListener('input', changeStatusPelaksanaan);
    });

    let all_tarikhSiapJadual_btn = document.querySelectorAll('.tarikhSiapJadual');

    all_tarikhSiapJadual_btn.forEach((btn, i) => {
        btn.removeEventListener('input', changeStatusPelaksanaan);
        btn.addEventListener('input', changeStatusPelaksanaan);
    });

    let all_tarikhMulaJadual_btn = document.querySelectorAll('.tarikhMulaJadual');

    all_tarikhMulaJadual_btn.forEach((btn, i) => {
        btn.removeEventListener('input', changeTahunBulan);
        btn.addEventListener('input', changeTahunBulan);
    });

}

function getMonthDetails(monthNumber) {
    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Validate the monthNumber to be within the range of 1 to 12
    if (monthNumber >= 1 && monthNumber <= 12) {
        return monthNames[monthNumber - 1]; // Array index starts from 0
    } else {
        return 'Invalid Month'; // Return an error message for invalid input
    }
}

function openSenaraiMasalah() {
    $('#exampleModal2').modal('show');
}

function downloadDoc(media_id,model_id,model_type,collection_name,file_name)
{
    
        const api_url = "{{env('API_URL')}}";  
        var api_token = "Bearer " + window.localStorage.getItem('token');

        parameters = {
            model_id : media_id,
            mode_type_id : model_id,
            model_type : model_type,
            collection_name : collection_name
        }
        axios({
                url: api_url+"api/media/download",
                method: 'GET',
                headers: { "Authorization": api_token, },
                params: parameters,
                responseType: 'blob', // important
            }).
            then((response) => {
                const url = window.URL.createObjectURL(response.data);
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', file_name);
                document.body.appendChild(link);
                link.click();
                URL.revokeObjectURL(url);
            });
}

function removeImage(id,row) { 

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);



        axios({
              method: "post",
              url: api_url+"api/perunding/prestasi_rekord_lampiran/delete",
              data: {'id':id},
              headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
          })
      .then(function (response) { console.log(response.data);        
          document.getElementById("rlTbody").deleteRow(row - 1); 
      })
      .catch(function (response) {
        //handle error
        console.log(response);
      });

}

function downloadTemplateDoc()
{

    isValid = true
    document.getElementById("prestasiSpSelect_error").textContent = "";
    var typeValue = document.getElementById('prestasiSpSelect').value;
    if (typeValue === "") {
        isValid = false;
        document.getElementById("prestasiSpSelect_error").textContent = "sila pilih amaran atau peringkatan.";
    }

    if(isValid) {
        const api_url = "{{env('API_URL')}}";  
        var api_token = "Bearer " + window.localStorage.getItem('token');

        parameters = {
            type : typeValue,
        }
        axios({
                url: api_url+"api/media/download/perunding/prestasi",
                method: 'GET',
                headers: { "Authorization": api_token, },
                params: parameters,
                responseType: 'blob', // important
            }).
            then((response) => {
                const url = window.URL.createObjectURL(response.data);
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', typeValue +'_sample_template.docx');
                document.body.appendChild(link);
                link.click();
                URL.revokeObjectURL(url);
            });
    }
    
    
}
</script>