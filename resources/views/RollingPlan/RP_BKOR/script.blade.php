<script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
<link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet" />
<script src="{{ asset('vendor/jQuery-MultiSelect-master/jquery.multiselect.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>

<style>
.collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active,
.collapsible:hover {
    background-color: #555;
}

.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
}
</style>
<script>
var lampiran_file_name = ''

function nf(){
    console.log('nf called');
    $('.input-format-element').toArray().forEach(function(field){
    new Cleave(field, {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
    });
    });

}

$(document).ready(function() {

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    var tbody = document.getElementById('maklumat_permohon_tbody');
    var newRow = tbody.insertRow();
    var cell = newRow.insertCell();
    newRow.id = 'noRecordRow';
    cell.style.textAlign = 'center';
    cell.colSpan = 6; // Set the colspan to match the number of columns
    cell.textContent = '-- Tiada Maklumat --';

    trcount = 0
    trnegericount = 0
    var current_workflow = ''
    document.getElementById('daftar_head').classList.add('yellow');

    var dimohon_file_name = ''
    var is_first = 'yes'
    var api_token = "Bearer " + window.localStorage.getItem('token');
    var bahagianDetails = [];
    axios.defaults.headers.common["Authorization"] = api_token

    var bahagianTerlibat = document.getElementById("bahagian_terlibat");

    $(".dimohon_imej").addClass('d-none');

    var currentUrl = window.location.href;
    id = ''
    if (currentUrl.match(/\/(\d+)\/edit$/)) {
        var id = currentUrl.match(/\/(\d+)\/edit$/)[1];
        var editurl = "{{ env('API_URL') }}" + "api/rp/bkor/" + id + "/edit"
    }

    // Get the modal element
    var modal = document.getElementById('exampleModal');

    // Attach event listener to the modal's "hidden.bs.modal" event
    modal.addEventListener('hidden.bs.modal', function() {
        // Do something when the modal is closed
        console.log('Modal closed');
        // Add your custom actions here
        // trElement = $(this).closest('tr');
        // var tdElement = trElement.find('#rp_file_name');
        // // Check if the tdElement exists
        // if (tdElement.length > 0) {
        //     var rpFileNameValue = tdElement.find('input').val();
        //     console.log(rpFileNameValue);
        // } else {
        //     console.log("#rp_file_name element not found in the row.");
        // }
        // console.log(trElement);
        
        // console.log(trElement.find('#rp_file_name').val());
        // rp_file_name = trElement.find('#rp_file_name').val();
        // imejName = trElement.find('#rp_butiran_imej').val(rp_file_name);
        // console.log(rp_file_name);
    });

    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/project/draftDetails",
            responseType: 'json',
        })
        .then(function(response) {
            data = response.data.data

            $.each(data.bahagian, function(key, item) {
                var el = document.createElement("option");
                el.textContent = item.nama_bahagian;
                el.value = item.id;
                bahagianTerlibat.appendChild(el);
            })

            $("#bahagian_terlibat").multiselect({
                // includeSelectAllOption: true,
                selectedOptions: ' pilihan',
                search: true,
                columns: 1,
                placeholder: '--Pilih--',
                //selectAll : true,
            });

        })

    if (id !== '') {
        loadEditData(id, editurl)
    } else {
        document.getElementById('rp_batalBtnBKOR').style.display = 'none'
    }

    $(".rp_is_dimohon_yes").click(function() {
        $(".dimohon_imej").removeClass('d-none');
        document.getElementById("no_rujukan_dimohon").required = true
        document.getElementById("dimohon_imej_file").required = true
    })

    $(".rp_is_dimohon_no").click(function() {
        document.getElementById("no_rujukan_dimohon").value = ''
        document.getElementById("dimohon_imej_file").value = ''
        document.getElementById("no_rujukan_dimohon").required = false
        document.getElementById("dimohon_imej_file").required = false
        $(".dimohon_imej").addClass('d-none');
    })

    $('#rp_closeBtn_popUP').on('click', function() {
        $('#exampleModal').modal('hide');
    });

    $('#rp_tidakBtn_ulasan').on('click', function() {
        $('#exampleModalToggle').modal('hide');
    });

    $('#rp_tidakBtn_ulasan_BKOR').on('click', function() {
        $('#exampleModalToggle1').modal('hide');
    });

    $('#rp_simpanBtn_popUP').on('click', function() {

        var trElement = document.querySelector('#' + document.getElementById("modal_trId").value)

        trElement.getElementsByTagName("td")[1].textContent = document.getElementById(
            "modal_tarikh_surat").value
        trElement.getElementsByTagName("td")[2].textContent = document.getElementById(
            "modal_no_rujukan").value


        trElement.querySelector('#rp_butiran_imej').value = document.getElementById("modal_imejName")
            .value;
        trElement.querySelector('#rp_butiran_catatan').value = document.getElementById(
            "modal_keterangan").value;

        var source = $('#lampiran').prop('files');
        var destination = trElement.querySelector('#rp_butiran_file');

        if (source.length > 0) {
            console.log(source);
            trElement.getElementsByTagName("td")[5].textContent = source[0].name
            var fileList = new DataTransfer();

            // Add each file from the source to the fileList
            for (var i = 0; i < source.length; i++) {
                fileList.items.add(source[i]);
            }

            // Assign the fileList to the destination element
            destination.files = fileList.files;

            console.log('File copied successfully');
        } else {
            console.log('No file selected in the source');
        }


        document.getElementById('modal_form').reset();
        $("#terima_file_name").val('')
        document.getElementById("modal_imejName").value = '';
        $("#filePreview1").attr('src', "{{ asset('assets/pdf.jpg.png') }}");
        $("#Uploadfile1").removeClass('d-none')
        $("#fileUploaded1").addClass('d-none')
        $(".imejKeterangan").css("display", "none");
        $('#exampleModal').modal('hide');
    });

    $('#rp_tajuk').on('input', function() {
        $('#error_rp_tajuk').text('')
    })

    $('#rp_kos').on('input', function() {
        nf()
    })

    $('#rp_tarikh_permohonan').on('input', function() {
        $('#error_rp_tarikh_permohonan').text('')
    })

    $('#select_daerah').on('change', function() {
        document.getElementById('error_daerahId').innerHTML = ''
    })

    $('#select_dun').on('change', function() {
        document.getElementById('error_dunId').innerHTML = ''
    })



    // $('#addBtnNegeri').on('click', function () {
    //     addNegeriDetails();
    // })

    $('#rp_simpanBtn').on('click', function() {
        workflow = 'BKOR'
        submitBKOR(workflow);
    })

    $('#rp_hantarBtn').on('click', function() {

        if (document.getElementById('rp_hantarBtn').innerText == 'Selesai') {
            workflow = 'Selesai'
            submitBKOR(workflow);
        } else {
            workflow = 'Bahagian'
            submitBKOR(workflow);
        }

    })

    $('#rp_batalBtnBKOR').on('click', function() {
        workflow = 'Batal'
        submitBKOR(workflow);
    })

    $('#rp_simpanBtnBahagian').on('click', function() {
        workflow = 'Bahagian'
        submitBahagian(workflow, 'Bahagian');
    })

    $('#rp_simpanBtnNegeri').on('click', function() {
        workflow = 'Negeri'
        submitNegeri(workflow, 'Negeri');
    })

    $('#rp_hantarBtnNegeri').on('click', function() {
        workflow = 'Bahagian'
        submitNegeri(workflow, 'Negeri');
    })

    $('#addBtnBp').on('click', function() {
        // Adding a row inside the tbody.

        // Remove the "no record found" row if it exists
        var tbody = document.getElementById('maklumat_permohon_tbody');
        var noRecordRow = document.getElementById('noRecordRow');
        if (noRecordRow) {
            tbody.removeChild(noRecordRow);
        }

        $(".imejKeterangan").css("display", "none");
        var JenisPemohon = document.getElementById("rp_jenis_permohon").value;
        var ButiranPemohon = document.getElementById("rp_butiran_permohon").value;

        trcount = trcount + 1
        $('#maklumat_permohon_tbody').append(`<tr id=trId_` + trcount + ` data-index=` + trcount + `>
        <input  type="hidden" name="butiranId" id="butiranId" value="">
        <input  type="hidden" value="" name="rp_butiran_imej" id="rp_butiran_imej">
        <input  type="hidden" value="" name="rp_butiran_catatan" id="rp_butiran_catatan">
        
        <td>` + trcount + `</td>
            <td></td>
            <td></td>
            <td>` + JenisPemohon + `</td>
            <td class="pemberat_title">` + ButiranPemohon + `</td>
            <td class="uploadButton" style="text-align: center;cursor:pointer"><img data-bs-toggle="modal" data-bs-target="#exampleModal" 
                src='{{ asset("assets/images/upload_img_1.png") }}'>
            </td>
            <td>
                <button type="button" id="removeButiran" class="p-2 removeButiran">
                    <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                        style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                </button>
            </td>
                <td style="position: absolute; left: -9999px;">
                    <input type="file" id="rp_butiran_file">
                </td>
                <td style="position: absolute; left: -9999px;">
                    <input type="text" id="rp_models_id" value="">
                </td>
                <td style="position: absolute; left: -9999px;">
                    <input type="text" id="rp_model_id" value="">
                </td>
                <td style="position: absolute; left: -9999px;">
                    <input type="text" id="rp_file_name" value="">
                </td>
                <td style="position: absolute; left: -9999px;">
                    <input type="text" id="rp_model_type" value="">
                </td>
                <td style="position: absolute; left: -9999px;">
                    <input type="text" id="rp_collection_name" value="">
                </td>

                </tr>`);

        let all_upload_btn = document.querySelectorAll(
            ".uploadButton"
        );

        all_upload_btn.forEach((tb, i) => {
            tb.removeEventListener("click", setModalValues)
        })

        all_upload_btn.forEach((tb, i) => {
            tb.addEventListener("click", setModalValues)
        })

        let all_removeButiran_btn = document.querySelectorAll('.removeButiran');

        all_removeButiran_btn.forEach((btn, i) => {

            // Remove the event listener
            btn.removeEventListener('click', handleRemoveButiran);
            btn.addEventListener('click', handleRemoveButiran);
        });

        // document.getElementById("rp_jenis_permohon").disabled = true;

    });

    $("#lampiran").on("change", function() {
        $new_file = $('#lampiran').prop('files')[0];

        if ($new_file.size > 4000000) {
            document.getElementById("lampiran").value = '';
            document.getElementById("lampiran_error").innerHTML = "file size lebih 4mb";

            return false;
        }

        var allowedExtensions = ["application/pdf"];

        if (allowedExtensions.indexOf($new_file.type) == -1) {
            document.getElementById("lampiran").value = '';
            document.getElementById("lampiran_error").innerHTML = "file type should be pdf";

            //alert("only jpeg and png extension allowed")
            return false;
        }

        if ($new_file) {

            document.getElementById("lampiran_error").innerHTML = "";
            var file_name1 = $("#lampiran").val().replace(/C:\\fakepath\\/i, '')
            $("#filePreview1").attr('src', "{{ asset('assets/pdf.jpg.png') }}");
            document.getElementById("modal_imejName").value = file_name1
            $("#fileName1").text(file_name1);
            $("#Uploadfile1").addClass('d-none')
            $("#fileUploaded1").removeClass('d-none')
            $(".imejKeterangan").css("display", "block");
        }

    });

    $("#removefile1").click(function() {
        document.getElementById("modal_imejName").value = ''
        $("#terima_file_name").val('')
        $("#filePreview1").attr('src', "{{ asset('assets/pdf.jpg.png') }}");
        $("#Uploadfile1").removeClass('d-none')
        $("#fileUploaded1").addClass('d-none')
        $(".imejKeterangan").css("display", "none");
    })

    $("#bahagian_lampiran").on("change", function() {
        $new_file = $('#bahagian_lampiran').prop('files')[0];
        console.log($new_file);
        if ($new_file.size > 4000000) {
            document.getElementById("bahagian_lampiran").value = '';
            document.getElementById("bahagian_lampiran_error").innerHTML = "file size lebih 4mb";

            return false;
        }

        var allowedExtensions = ["application/pdf"];

        if (allowedExtensions.indexOf($new_file.type) == -1) {
            document.getElementById("bahagian_lampiran").value = '';
            document.getElementById("bahagian_lampiran_error").innerHTML = "file type should be pdf";

            //alert("only jpeg and png extension allowed")
            return false;
        }

        if ($new_file) {

            document.getElementById("bahagian_lampiran_error").innerHTML = "";
            var file_name2 = $("#bahagian_lampiran").val().replace(/C:\\fakepath\\/i, '')
            lampiran_file_name = file_name2
            $("#filePreview2").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
            // document.getElementById("bahagian_lampiran").value = file_name2
            $("#fileName2").text(file_name2);
            $("#Uploadfile2").addClass('d-none')
            $("#fileUploaded2").removeClass('d-none')
        }

    });

    $("#removefile2").click(function() {
        $("#bahagian_lampiran").val('')
        $("#filePreview2").attr('src', '');
        $("#Uploadfile2").removeClass('d-none')
        $("#fileUploaded2").addClass('d-none')
    })

    $("#dimohon_imej_file").on("change", function() {
        $new_file = $('#dimohon_imej_file').prop('files')[0];


        if ($new_file.size > 4000000) {
            document.getElementById("dimohon_imej_file").value = '';
            document.getElementById("dimohon_imej_file_error").innerHTML = "file size lebih 4mb";

            return false;
        }

        var allowedExtensions = ["application/pdf"];

        if (allowedExtensions.indexOf($new_file.type) == -1) {
            document.getElementById("dimohon_imej_file").value = '';
            document.getElementById("dimohon_imej_file_error").innerHTML = "file type should be pdf";

            //alert("only jpeg and png extension allowed")
            return false;
        }

        if ($new_file) {

            document.getElementById("dimohon_imej_file_error").innerHTML = "";
            var file_name2 = $("#dimohon_imej_file").val().replace(/C:\\fakepath\\/i, '')
            $("#filePreview3").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
            // document.getElementById("bahagian_lampiran").value = file_name2
            $("#fileName3").text(file_name2);
            $("#Uploadfile3").addClass('d-none')
            $("#fileUploaded3").removeClass('d-none')
        }

    });

    $("#removefile3").click(function() {
        $("#dimohon_imej_file").val('')
        $("#filePreview3").attr('src', '');
        $("#Uploadfile3").removeClass('d-none')
        $("#fileUploaded3").addClass('d-none')
    })


    $("#rumusan_lampiran").on("change", function() {
        $new_file = $('#rumusan_lampiran').prop('files')[0];
        console.log($new_file);
        if ($new_file.size > 4000000) {
            document.getElementById("rumusan_lampiran").value = '';
            document.getElementById("rumusan_lampiran_error").innerHTML = "file size lebih 4mb";

            return false;
        }

        var allowedExtensions = ["application/pdf"];

        if (allowedExtensions.indexOf($new_file.type) == -1) {
            document.getElementById("rumusan_lampiran").value = '';
            document.getElementById("rumusan_lampiran_error").innerHTML = "file type should be pdf";

            //alert("only jpeg and png extension allowed")
            return false;
        }

        if ($new_file) {

            document.getElementById("rumusan_lampiran_error").innerHTML = "";
            var file_name5 = $("#rumusan_lampiran").val().replace(/C:\\fakepath\\/i, '')
            // lampiran_file_name = file_name5
            $("#filePreview5").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
            // document.getElementById("bahagian_lampiran").value = file_name2
            $("#fileName5").text(file_name5);
            $("#Uploadfile5").addClass('d-none')
            $("#fileUploaded5").removeClass('d-none')
        }

    });

    $("#removefile5").click(function() {
        $("#rumusan_lampiran").val('')
        $("#filePreview5").attr('src', '');
        $("#Uploadfile5").removeClass('d-none')
        $("#fileUploaded5").addClass('d-none')
    })


    loadNegerDetails()

    nf()
    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
})

function setModalValues() {
    const myData = $(this).data('mydata');

    trElement = $(this).closest('tr');
    console.log(trElement);
    document.getElementById("modal_imejName").value = ''
    $(".imejKeterangan").css("display", "block");
    tarikhSurat = trElement.find('td').eq(1).text();
    noRujukan = trElement.find('td').eq(2).text();
    jenisPermohonan = trElement.find('td').eq(3).text();
    butiranPermohonan = trElement.find('td').eq(4).text();
    imejName = trElement.find('#rp_butiran_imej').val();
    catatan = trElement.find('#rp_butiran_catatan').val();
    


    rp_models_id = trElement.find('#rp_models_id').val();
    rp_model_id = trElement.find('#rp_model_id').val();
    rp_file_name = trElement.find('#rp_file_name').val();
    rp_model_type = trElement.find('#rp_model_type').val();
    rp_collection_name = trElement.find('#rp_collection_name').val();


    imejCatatan = trElement.find('#rp_butiran_catatan').val();

    if (imejName !== '') {

        document.querySelector('#upload_document_input').style.display = 'none'
        var modal_imej_table = document.querySelector('#modal_imej_tbody')
        while (modal_imej_table.firstChild) {
            modal_imej_table.removeChild(modal_imej_table.firstChild);
        }
        $('#modal_imej_tbody').append(`<tr id="modal_imge_tr">
            <td>1</td>
            <td onclick="downloadDoc(` + rp_models_id + `,` + rp_model_id + `, '` + rp_file_name + `', '` +
            rp_model_type + `', '` + rp_collection_name + `')">` + imejName + `</td>
            <td>` + imejCatatan + `</td>
            <td>
                <button type="button" class="mr-1 mb-2 rp_padam pemberat_title1" onclick="remove_modal_image('trId_` +
            trElement.attr('data-index') + `' )"><img src={{ asset("assets/images/off_outline_close.png") }}>Padam</button>
            </td>
        </tr>`
        )
    } else {
        document.querySelector('#upload_document_input').style.display = 'block'
        var modal_imej_table = document.querySelector('#modal_imej_tbody')
        while (modal_imej_table.firstChild) {
            modal_imej_table.removeChild(modal_imej_table.firstChild);
        }
    }

    document.getElementById("modal_trId").value = 'trId_' + trElement.attr('data-index')
    document.getElementById("modal_jenisPermohonan").value = jenisPermohonan
    document.getElementById("modal_butiranPermohonan").value = butiranPermohonan
    // document.getElementById("modal_imejKeterangan").value = imejCatatan
    document.getElementById("modal_no_rujukan").value = noRujukan
    document.getElementById("modal_tarikh_surat").value = tarikhSurat
    document.getElementById("modal_keterangan").value = catatan
    document.getElementById("modal_imejName").value = imejName
    

    $('#exampleModal').modal('show');
}

function remove_modal_image(trId) {
    var trElement = document.querySelector('#' + trId)


    trElement.querySelector('#rp_butiran_imej').textContent = '';
    trElement.querySelector('#rp_butiran_catatan').textContent = '';
    trElement.querySelector('#rp_butiran_imej').value = '';
    trElement.querySelector('#rp_butiran_catatan').value = '';
    trElement.querySelector('#rp_butiran_file').value = '';
    document.getElementById("modal_imejName").value = '';
    document.getElementById("modal_keterangan").value = '';
    document.querySelector('#upload_document_input').style.display = 'block'

    var modal_imej_table = document.querySelector('#modal_imej_tbody')
    while (modal_imej_table.firstChild) {
        modal_imej_table.removeChild(modal_imej_table.firstChild);
    }

}


function pemilikKembaliChange() {
    var select = document.getElementById('bahagian_kembali');
    var selected = [...select.selectedOptions].map(option => option.text);
    var selectedvalue = [...select.selectedOptions]
        .map(option => option.value);

    div_bkor_catatan = document.querySelectorAll('#bahagianBkorUlasan')
    existing_bahagian = []
    for (i = 0; i < div_bkor_catatan.length; i++) {
        existing_bahagian.push(div_bkor_catatan[i].value)
    }

    deleted_bahagians = existing_bahagian.filter(item => !selectedvalue.includes(item));

    bkor_catatan = document.querySelectorAll('#bkor_ulasan')
    for (i = 0; i < bkor_catatan.length; i++) {
        bahagianId = bkor_catatan[i].querySelector('input[type="hidden"]#bahagianBkorUlasan').value
        if (deleted_bahagians.includes(bahagianId)) {
            bkor_catatan[i].remove()
        }
    }

    for (i = 0; i < selected.length; i++) {

        if (!existing_bahagian.includes(selectedvalue[i])) {
            template = `<div class="col-md-12 col-xs-12 mb-3" id="bkor_ulasan">
                    <label class="pemberat_title" for="">Ulasan untuk` + selected[i] + `<sup>*</sup></label>
                    <input type="hidden" id="bahagianBkorUlasan"  value="` + selectedvalue[i] + `"/>
                   <textarea class="pemberat_title1 form-control" name="rp_bkor_ulasan" id="rp_bkor_ulasan" cols="30" rows="5"></textarea>
                </div>`

            $('#bkor_ulasan_div_4').append(template)
        }

    }
}

function pemilikChange() {

    

    var select = document.getElementById('bahagian_terlibat');
    var selected = [...select.selectedOptions].map(option => option.text);
    var selectedvalue = [...select.selectedOptions]
        .map(option => option.value);


    div_bkor_catatan = document.querySelectorAll('#bahagianIdBkorCatatan')
    existing_bahagian = []
    for (i = 0; i < div_bkor_catatan.length; i++) {
        existing_bahagian.push(div_bkor_catatan[i].value)
    }

    document.getElementById('error_bahagian_terliabt').innerHTML = ''
    deleted_bahagians = existing_bahagian.filter(item => !selectedvalue.includes(item));

    bkor_catatan = document.querySelectorAll('#bkor_catatan')
    for (i = 0; i < bkor_catatan.length; i++) {
        bahagianId = bkor_catatan[i].querySelector('input[type="hidden"]#bahagianIdBkorCatatan').value
        if (deleted_bahagians.includes(bahagianId)) {
            bkor_catatan[i].remove()
        }

    }

    for (i = 0; i < selected.length; i++) {

        if (!existing_bahagian.includes(selectedvalue[i])) {
            template = `<div class="col-md-12 col-xs-12 mb-3" id="bkor_catatan">
                    <label class="pemberat_title" for="">Catatan ` + selected[i] + `<sup>*</sup></label>
                    <input type="hidden" id="bahagianIdBkorCatatan"  value="` + selectedvalue[i] + `"/>
                   <textarea class="pemberat_title1 form-control" name="rp_bkor_catatan" id="rp_bkor_catatan" cols="30" rows="5"></textarea>
                </div>`

            $('#bkor_div_4').append(template)
        }

    }

}

function bahagian_terlibat_div() {
    var select = document.getElementById('bahagian_terlibat');
    var selected = [...select.selectedOptions].map(option => option.text);
    var selectedvalue = [...select.selectedOptions]
        .map(option => option.value);

    var a = $("#ms-opt-" + selectedvalue).parent().parent();

    var comma_seprated = selected + ',';
    var data = comma_seprated.replace(/,/g, '.<br>')

    $("#selected_bahagian_terlibat").html(data);

    var check_teri = $('#bahagian_terlibat_checkbox').val();
    if (selectedvalue.length > 0 || check_teri == 'true') {
        $("#bahagian_terlibat_error_error").css("display", "none")
    } else {
        $("#bahagian_terlibat_error_error").css("display", "block")
    }

}



async function loadNegerDetails() {
    options = ''
    var negeridropDown = document.getElementById("select_negeri");
    $.ajax({
        type: "GET",
        url: "{{ env('API_URL') }}" + "api/lookup/negeri/list",
        dataType: 'json',
        success: function(result) {
            if (result) {
                $.each(result.data, function(key, item) {
                    options = options + '<option value="' + item.id + '">' + item.nama_negeri +
                        '</option>'
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_negeri;
                    el.value = opt;
                    negeridropDown.appendChild(el);
                })

            } else {
                $.Notification.error(result.Message);
            }
        }
    })
}

async function loadnegeri_parlimen_dun() {
    const api_url = "{{env('API_URL')}}";
    const api_token = "Bearer " + window.localStorage.getItem('token');

    document.getElementById('error_negeriId').innerHTML = ''
    document.getElementById('error_daerahId').innerHTML = ''
    document.getElementById('error_parlimenId').innerHTML = ''
    document.getElementById('error_dunId').innerHTML = ''

    var negeri_id = document.getElementById('select_negeri').value;

    var daerahdropDown = document.getElementById("select_daerah");
    $(daerahdropDown).empty();
    var opt = '';
    var el = document.createElement("option");
    el.textContent = '--Pilih--';
    el.value = opt;
    daerahdropDown.appendChild(el);

    await $.ajax({
        type: "GET",
        url: api_url + "api/lookup/daerah/list?id=" + negeri_id,
        dataType: 'json',
        success: function(result) {
            if (result) {
                $.each(result.data, function(key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_daerah;
                    el.value = opt;
                    daerahdropDown.appendChild(el);
                })
            } else {
                $.Notification.error(result.Message);
            }
        }
    });

    var parlimendropDown = document.getElementById("select_parlimen");
    $(parlimendropDown).empty();
    var opt = '';
    var el = document.createElement("option");
    el.textContent = '--Pilih--';
    el.value = opt;
    parlimendropDown.appendChild(el);
    await $.ajax({
        type: "GET",
        url: api_url + "api/lookup/parlimen/list?id=" + negeri_id,
        dataType: 'json',
        success: function(result) {
            if (result) {
                $.each(result.data, function(key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_parlimen;
                    el.value = opt;
                    parlimendropDown.appendChild(el);
                })

            } else {
                $.Notification.error(result.Message);
            }
        }
    });
}

async function getdun(rowno) {

    document.getElementById('error_parlimenId').innerHTML = ''
    document.getElementById('error_dunId').innerHTML = ''

    const api_url = "{{env('API_URL')}}";
    const api_token = "Bearer " + window.localStorage.getItem('token');
    var dundropDown = document.getElementById("select_dun");
    $(dundropDown).empty();
    var opt = '';
    var el = document.createElement("option");
    el.textContent = '--Pilih--';
    el.value = opt;
    dundropDown.appendChild(el);

    var parlimenId = document.getElementById("select_parlimen").value;

    await $.ajax({
        type: "GET",
        url: api_url + "api/lookup/dun/list?id=" + parlimenId,
        dataType: 'json',
        success: function(result) {
            if (result) {
                $.each(result.data, function(key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_dun;
                    el.value = opt;
                    dundropDown.appendChild(el);
                })
            } else {
                $.Notification.error(result.Message);
            }
        }
    });
}


function submitBKOR(workflow,is_ulasan = false) {

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    console.log('data submitted for ' + workflow);
    const api_token = "Bearer " + window.localStorage.getItem('token');

    var formData = new FormData();

    var tbodyButiran = document.getElementById('maklumat_permohon_tbody');
    var rows = tbodyButiran.querySelectorAll('tr');
    var bkor_bahagianId_catatan = document.querySelectorAll('#bahagianIdBkorCatatan');
    var bkor_bahagian_catatan = document.querySelectorAll('#rp_bkor_catatan');
    var butiranData = [];
    var bkor_bahagian_catatan_data = {}

    for (i = 0; i < bkor_bahagianId_catatan.length; i++) {
        bkor_bahagian_catatan_data[bkor_bahagianId_catatan[i].value] = bkor_bahagian_catatan[i].value
    }

    // bkor_bahagian_catatan_data.push(catatanData);
    if ($('#bahagian_terlibat_checkbox').val() == 'false') {
        var bah_terlibat = $('#bahagian_terlibat').val()
        if (bah_terlibat.length == 0) {
            terlibat_validation = true;
            document.getElementById("bahagian_terlibat").style.color = 'red'
            document.getElementById("bahagian_terlibat_error_error").innerHTML = 'Sila lengkapkan bahagian ini'
            document.getElementById("bahagian_terlibat_error_error").focus();
        }
        return
    }

    rows.forEach(function(row) {
        var trElement = document.querySelector('#trId_' + row.getAttribute('data-index'))

        if (trElement) {
            let file = trElement.querySelector('#rp_butiran_file').files[0]

            is_file = false
            if (file) {
                is_file = true
            }

            var rowData = {
                order_no: row.cells[0].innerText,
                tarik_surat: row.cells[1].innerText,
                no_rujukan: row.cells[2].innerText,
                jenis_permohonan: row.cells[3].innerText,
                butiran_permohona: row.cells[4].innerText,
                image_keterangan: row.querySelector('#rp_butiran_catatan').value,
                image_name: row.querySelector('#rp_butiran_imej').value,
                id: row.querySelector('#butiranId').value,
                is_file: is_file,
                // file: trElement.querySelector('#rp_butiran_file').files[0]
            };

            formData.append('files[]', trElement.querySelector('#rp_butiran_file').files[0]);
            butiranData.push(rowData);
        }



    });

    var negeriData = [];

    var butiranJsonData = JSON.stringify(butiranData);
    var bkorCatatanJsonData = JSON.stringify(bkor_bahagian_catatan_data);
    // var negeriJsonData = JSON.stringify(negeriData);


    // kosSelepasMakmal = document.getElementById("rp_tajuk").value;
    formData.append('rp_tajuk', document.getElementById("rp_tajuk").value);
    formData.append('rp_tarikh_permohonan', document.getElementById("rp_tarikh_permohonan").value);
    formData.append('rp_kos', document.getElementById("rp_kos").value);
    // formData.append('rp_bkor_catatan', document.getElementById("rp_bkor_catatan").value);
    formData.append('bahagian_terliabt', $('#bahagian_terlibat').val())

    formData.append('butiranJsonData', butiranJsonData);
    formData.append('bkorCatatanJsonData', bkorCatatanJsonData);

    formData.append('negeriId', document.getElementById("select_negeri").value);
    formData.append('daerahId', document.getElementById("select_daerah").value);
    formData.append('parlimenId', document.getElementById("select_parlimen").value);
    formData.append('dunId', document.getElementById("select_dun").value);

    // formData.append('negeriJsonData', negeriJsonData);
    formData.append('user_id', "{{ Auth::user()->id }}")

    formData.append('rp_project_id', "{{ $id }}")
    formData.append('workflow', workflow);
    formData.append('currentWorkflow', 'BKOR');


    no_rujukan = `JPS.BKOR (S) 05/06/` + document.getElementById('no_rujukan1').value + `Jilid` + document
        .getElementById('no_rujukan2').value + `(` +
        document.getElementById('no_rujukan3').value + `)`

    formData.append('no_rujukan', no_rujukan);
    formData.append('rumusan_permohonan', document.getElementById("rumusan_permohonan").value);

    let rumusan_file = document.getElementById("rumusan_lampiran").files[0]

    if (rumusan_file) {
        formData.append('rumusan_file', rumusan_file);
    }

    formData.append('is_ulasan', is_ulasan);
    if(is_ulasan) {
        var bkor_bahagianId_ulasan = document.querySelectorAll('#bahagianBkorUlasan');
        var bkor_bahagian_ulasan = document.querySelectorAll('#rp_bkor_ulasan');
        var bkor_bahagian_ulasan_data = {}
        for (i = 0; i < bkor_bahagianId_ulasan.length; i++) {
            bkor_bahagian_ulasan_data[bkor_bahagianId_ulasan[i].value] = bkor_bahagian_ulasan[i].value
        }

        var bkorUlasanJsonData = JSON.stringify(bkor_bahagian_ulasan_data);

        formData.append('bkorUlasanJsonData', bkorUlasanJsonData);
    }

    axios({
            method: 'post',
            url: "{{ env('API_URL') }}" + "api/rp/bkor",
            responseType: 'json',
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": api_token,
            },
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                let status = response.data.data.status
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                $("#add_role_sucess_modal").modal('show');

                if (workflow == 'BKOR') {
                    document.getElementById('pop_up_h3').innerHTML = "Maklumat anda berjaya di simpan"
                }

                if (workflow == 'Selesai') {
                    document.getElementById('pop_up_h3').innerHTML = "Permohonan Selesai"
                }

                if (workflow == 'Batal') {
                    document.getElementById('pop_up_h3').innerHTML = "Permohonan berjaya dibatalkan"
                }

                if (workflow == 'Bahagian') {
                    document.getElementById('pop_up_h3').innerHTML = "Ulasan permohonan berjaya dihantar kepada Bahagian"
                }

                
                $("#tutup").click(function() {
                    // location.reload();
                    if (response.data.data.workflow != 'BKOR') {
                        var url = "{{ route('Senarai_Peruntukan') }}"
                        window.location.href = url
                    } else {
                        var url = "{{ route('rp_bkor.edit',[ ':id']) }}"
                        url = url.replace(":id", response.data.data.id)
                        window.location.href = url
                    }
                })

            } else {
                if (response.data.code == 422) {
                    Object.keys(response.data.data).forEach(key => {
                        console.log(key, response.data.data[key][0]);
                        document.getElementById("error_" + key).innerHTML = response.data.data[key][0];
                    });
                }
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }

        })
        .catch(function(error) {
            alert('error while saving the data')
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
}

function submitNegeri(workflow, currentWorkflow) {

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    const api_token = "Bearer " + window.localStorage.getItem('token');

    var formData = new FormData();

    formData.append('user_id', "{{ Auth::user()->id }}")

    formData.append('rp_project_id', "{{ $id }}")
    formData.append('workflow', workflow);

    // //negeri details 
    negeri_details = []
    console.log(bahagianDetails);
    $.each(bahagianDetails, function(key, item) {
        console.log(item.bahagian_detail);
        if (item.status == 'Negeri') {
            formData.append('lampiran_files', document.getElementById('bahagian_lampiran').files[0]);
            fileid = '#negeri_lampiran_' + item.bahagian_detail.bahagian_id
            new_file = $(fileid).prop('files')[0];

            if (new_file) {
                formData.append('files[]', $(fileid).prop('files')[0]);
            }

            negeri = {
                "bahagian_id": item.bahagian_detail.id,
                "isu": document.getElementById("rp_negeri_isu_" + item.bahagian_detail.bahagian_id).value,
                "ulasan_teknikal": document.getElementById("rp_negeri_ulasan_teknikal_" + item
                    .bahagian_detail.bahagian_id).value,
                "cadagan_jangka_pendek": document.getElementById("rp_negeri_cadagan_jangka_pendek_" + item
                    .bahagian_detail.bahagian_id).value,
                "cadagan_jangka_panjang": document.getElementById("rp_negeri_cadagan_jangka_panjang_" + item
                    .bahagian_detail.bahagian_id).value,
                "lampiran_file_name": document.getElementById("negeri_lampiran_filename_" + item
                    .bahagian_detail.bahagian_id).value,
                "file": new_file ? true : false
            }
            negeri_details.push(negeri)
        }

    })

    var negeriJsonData = JSON.stringify(negeri_details);
    formData.append('negeriJsonData', negeriJsonData);

    axios({
            method: 'post',
            url: "{{ env('API_URL') }}" + "api/rp/negeri",
            responseType: 'json',
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": api_token,
            },
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                console.log(response.data.data);
                $("#tutup").prop("disabled", false);

                let status = response.data.data.status
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                $("#add_role_sucess_modal").modal('show');
                if (workflow == 'Negeri' && currentWorkflow == 'Negeri') {
                    document.getElementById('pop_up_h3').innerHTML = "Maklumat anda berjaya di simpan"
                } else {
                    document.getElementById('pop_up_h3').innerHTML =
                        "Ulasan permohonan berjaya dihantar kepada Bahagian"
                }
                $("#tutup").click(function() {
                    if (response.data.data.workflow != 'Negeri') {
                        var url = "{{ route('Senarai_Peruntukan') }}"
                        window.location.href = url
                    } else {
                        var url = "{{ route('rp_bkor.edit',[ ':id']) }}"
                        url = url.replace(":id", response.data.data.id)
                        window.location.href = url
                    }
                })

            } else {

                if (response.data.code == 422) {
                    Object.keys(response.data.data).forEach(key => {
                        document.getElementById("error_" + key).innerHTML = response.data.data[key][0];
                    });
                }
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }

        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

}

function submitBahagian(workflow, currentWorkflow, is_ulasan = false) {

    console.log('ulasan', is_ulasan);

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    const api_token = "Bearer " + window.localStorage.getItem('token');

    // lampiran_file_name = ''
    var formData = new FormData();

    formData.append('rp_tajuk', document.getElementById("rp_tajuk").value);
    formData.append('rp_kos', document.getElementById("rp_kos").value);

    //bahagian details 
    formData.append('isu', document.getElementById("rp_isu").value);
    formData.append('ulasan_teknikal', document.getElementById("rp_ulasan_teknikal").value);
    formData.append('cadagan_jangka_pendek', document.getElementById("rp_cadagan_jangka_pendek").value);
    formData.append('cadagan_jangka_panjang', document.getElementById("rp_cadagan_jangka_panjang").value);
    formData.append('bahagian_catatan', document.getElementById("bahagian_catatan_value").value);
    formData.append('is_ulasan', is_ulasan);

    if(is_ulasan) {
        formData.append('ulasan_data', document.getElementById('ulasan_bahagian').value);
    }
    

    if (workflow == 'BKOR') {
        formData.append('status', 'BKOR');
    }

    if (workflow == 'Bahagian') {
        formData.append('status', 'Bahagian');
    }

    if (workflow == 'Negeri') {
        formData.append('status', 'Negeri');
    }

    // if (currentWorkflow != 'Negeri') {
    var yesNoRadios = document.querySelectorAll('input[name="rp_is_dimohon"]');
    let selectedRadioValue;

    yesNoRadios.forEach(radio => {
        if (radio.checked) {
            selectedRadioValue = radio.value;
        }
    });

    formData.append('is_dimohon', selectedRadioValue);
    formData.append('no_rujukan_dimohon', document.getElementById("no_rujukan_dimohon").value);

    di_mohon_file = document.getElementById('dimohon_imej_file').files[0]

    if (di_mohon_file) {
        formData.append('dimohon_file', di_mohon_file);
    }

    formData.append('lampiran_files', document.getElementById('bahagian_lampiran').files[0]);

    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('rp_project_id', "{{ $id }}")
    formData.append('workflow', workflow);
    formData.append('currentWorkflow', currentWorkflow);
    formData.append('bahagianDetailsId', document.getElementById("bahagianDetailsId").value);

    // formData.append('catatan_ulasan', document.getElementById("ulasan_bahagian").value);

    formData.append('lampiran_file_name', lampiran_file_name);

    axios({
            method: 'post',
            url: "{{ env('API_URL') }}" + "api/rp/bahagian",
            responseType: 'json',
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": api_token,
            },
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                console.log(response.data.data);
                let status = response.data.data.status
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                $("#add_role_sucess_modal").modal('show');
                if (workflow == 'Bahagian') {
                    document.getElementById('pop_up_h3').innerHTML = "Maklumat anda berjaya di simpan"
                }

                if (workflow == 'Negeri' && !is_ulasan ) {
                    document.getElementById('pop_up_h3').innerHTML = "Ulasan permohonan berjaya dihantar kepada Negeri"
                }

                if (workflow == 'Negeri' && is_ulasan ) {
                    document.getElementById('pop_up_h3').innerHTML = "Permohonan dikembalikan kepada negeri "
                }

                if (workflow == 'BKOR') {
                    document.getElementById('pop_up_h3').innerHTML =
                        "Ulasan permohonan berjaya dihantar kepada BKOR"
                }
                $("#tutup").click(function() {
                    // location.reload();
                    if (response.data.data.status != 'Bahagian') {
                        var url = "{{ route('Senarai_Peruntukan') }}"
                        window.location.href = url
                    } else {
                        var url = "{{ route('rp_bkor.edit',[ ':id']) }}"
                        url = url.replace(":id", response.data.data.details.id)
                        window.location.href = url
                    }
                })

            } else {

                if (response.data.code == 422) {
                    Object.keys(response.data.data).forEach(key => {
                        document.getElementById("error_" + key).innerHTML = response.data.data[key][0];
                    });
                }
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }

        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
}

async function loadEditData(id, url) {

    axios({
            method: 'get',
            url: url,
            responseType: 'json'
        })
        .then(async function(response) {

            current_user_type = "{{ Auth::user()->user_type_id }}"


            rp_project = response.data.data

            if (rp_project.workflow == 'BKOR' && current_user_type != 4) {
                disable_all(rp_project)
            }

            if (rp_project.workflow == 'Bahagian' && current_user_type != 3) {
                is_bahagian_bkor_user = false
                if(current_user_type == 4)  {
                    $.each(rp_project.bahagians, function(key, item) {
                        if(item.bahagian.acym == 'BKOR') {
                            is_bahagian_bkor_user = true
                        }
                    })
                }

                if(is_bahagian_bkor_user) {
                    disable_all(rp_project)
                    document.querySelector('#submitBahagian').style.display = 'block'
                    // document.getElementById("rp_hantarBtnBahagian").disabled = true;
                    // document.getElementById("rp_kembaliBtnBahagian").disabled = false;
                    document.getElementById("rp_simpanBtnBahagian").disabled = true;
                }else {
                    disable_all(rp_project)
                }
                
            }

            if (rp_project.workflow == 'Negeri' && current_user_type != 1) {
                disable_all(rp_project)
            }

            current_workflow = rp_project.workflow
            bahagianDetails = rp_project.bahagians
            if (rp_project.is_first == '1') {
                is_first = 'yes'
            } else {
                is_first = 'no'
            }

            const rp_no_rujukan_integers = rp_project.no_rujukan.match(/\d+/g);
            const firstNumber = rp_no_rujukan_integers[2];
            const secondNumber = rp_no_rujukan_integers[3];
            const thirdNumber = rp_no_rujukan_integers[4];

            document.getElementById('no_rujukan1').value = firstNumber
            document.getElementById('no_rujukan2').value = secondNumber
            document.getElementById('no_rujukan3').value = thirdNumber

            $('#rp_hantarBtnBahagian').on('click', function() {

                // if (is_first == 'yes') {
                //     workflow = 'Negeri'
                // } else {
                workflow = 'BKOR'
                // }

                submitBahagian(workflow, 'Bahagian');
            })

            $('#rp_yaBtn_ulasan').on('click', function() {
                // if (current_workflow == 'Bahagian') {
                //     submitBahagian('Negeri', current_workflow,true);
                //     $('#exampleModalToggle').modal('hide');
                // }

                submitBahagian('Negeri', current_workflow,true);
                $('#exampleModalToggle').modal('hide');
                // else {
                //     submitBahagian('Bahagian', current_workflow);
                // }

                // $('#exampleModalToggle').modal('hide');
            });

            $('#rp_yaBtn_ulasan_BKOR').on('click', function() {
                // if (current_workflow == 'BKOR') {
                    submitBKOR('Bahagian',true);
                    $('#exampleModalToggle1').modal('hide');
                // }
            })
            console.log(rp_project)

            if (current_user_type != 3) {

                if (rp_project.status != 'DAFTAR PERMOHONAN') {
                    document.getElementById('diMohon').style.display = 'block'
                }
            }

            

            if (rp_project.workflow == 'BKOR') {
                if (rp_project.is_first == '1') {
                    document.getElementById('daftar_head').classList.add('yellow');
                } else {
                    document.getElementById('no_rujukan1').setAttribute('readonly', 'true');
                    document.getElementById('no_rujukan2').setAttribute('readonly', 'true');
                    document.getElementById('no_rujukan3').setAttribute('readonly', 'true');
                    document.getElementById('rumusan_head').classList.add('yellow');
                    document.getElementById('daftar_head').classList.remove('yellow');
                    // document.getElementById('diMohon').style.display = 'block'

                }

                if (rp_project.status == 'Selesai' || rp_project.status == 'BATAL OLEH BKOR') {
                    document.getElementById('no_rujukan1').setAttribute('readonly', 'true');
                    document.getElementById('no_rujukan2').setAttribute('readonly', 'true');
                    document.getElementById('no_rujukan3').setAttribute('readonly', 'true');
                    document.getElementById('rumusan_head').classList.remove('yellow');
                    if (rp_project.status == 'BATAL OLEH BKOR') {
                        document.getElementById('selesai_head').style.backgroundColor = '#CF1F47';
                        document.getElementById('selesai_head').innerHTML = 'BATAL'
                    } else {
                        document.getElementById('selesai_head').style.backgroundColor = '#5AC540';
                    }

                    document.getElementById('daftar_head').classList.remove('yellow');
                    document.getElementById('submitBKOR').classList.add('d-none')

                }

            }

            if (rp_project.workflow == 'Bahagian') {
                document.getElementById('no_rujukan1').setAttribute('readonly', 'true');
                document.getElementById('no_rujukan2').setAttribute('readonly', 'true');
                document.getElementById('no_rujukan3').setAttribute('readonly', 'true');
                document.getElementById('bahagian_head').classList.add('yellow');
                document.getElementById('daftar_head').classList.remove('yellow');
            }

            if (rp_project.workflow == 'Bahagian' && current_user_type == 3) {
                document.getElementById('div_bahagian_1').classList.remove('d-none')
            }



            if (rp_project.workflow == 'Negeri') {
                document.getElementById('no_rujukan1').setAttribute('readonly', 'true');
                document.getElementById('no_rujukan2').setAttribute('readonly', 'true');
                document.getElementById('no_rujukan3').setAttribute('readonly', 'true');
                document.getElementById('negeri_head').classList.add('yellow');
                document.getElementById('daftar_head').classList.remove('yellow');
                // document.getElementById('diMohon').style.display = 'block'
            }

            if (current_user_type != 4) {
                document.querySelector('#bkor_div_1').style.display = 'none'
            }

            if (rp_project.workflow == 'Bahagian' || rp_project.workflow == 'Negeri') {


                if (rp_project.sejarah_negeri_ulasan.length > 0) {
                    document.querySelector('#sejarahNegeriUlasan').style.display = 'block'
                    let sejarahNegeriUlasan = 0

                    if(current_user_type == 1) {
                        document.getElementById('headingNBUlasan').innerHTML = 'SEJARAH ULASAN DARIPADA BAHAGIAN'   
                    }

                    if(current_user_type == 3) {
                        document.getElementById('headingNBUlasan').innerHTML = 'SEJARAH ULASAN KEPADA NEGERI'
                    }

                    //load negeri table
                    $.each(rp_project.sejarah_negeri_ulasan, function(key, item) {
                        console.log(item);
                        if(rp_project.workflow == 'Bahagian' || rp_project.workflow == 'Negeri') {
                        // if(current_user_type == 3) {
                            if(current_user_type == 3) {
                                user_bahagian_id = "{{Auth::user()->bahagian_id}}"
                                if( user_bahagian_id == item.bahagian_id) {
                                    sejarahNegeriUlasan = sejarahNegeriUlasan + 1
                                    $('#sejarahNegeriUlasanTbody').append(`
                                        <tr>
                                            <td>` + sejarahNegeriUlasan + `</td>
                                            <td>` + item.bahagian.acym + `</td>
                                            <td><div class="table_sLarge table_grey"><u>` + item.catatan + `</u></div></td>
                                            <td><div class="table_sLarge table_grey pemberat_input"><u>` + item.tarikh_catatan + `</u></div></td>
                                        </tr>
                                        `)
                                }
                            }else {
                                if(current_user_type != 4) {
                                    sejarahNegeriUlasan = sejarahNegeriUlasan + 1
                                    $('#sejarahNegeriUlasanTbody').append(`
                                        <tr>
                                            <td>` + sejarahNegeriUlasan + `</td>
                                            <td>` + item.bahagian.acym + `</td>
                                            <td><div class="table_sLarge table_grey"><u>` + item.catatan + `</u></div></td>
                                            <td><div class="table_sLarge table_grey pemberat_input"><u>` + item.tarikh_catatan + `</u></div></td>
                                        </tr>
                                        `)    
                                }
                                
                            }
                            
                        } else {
                            sejarahNegeriUlasan = sejarahNegeriUlasan + 1
                                $('#sejarahNegeriUlasanTbody').append(`
                                    <tr>
                                        <td>` + sejarahNegeriUlasan + `</td>
                                        <td>` + item.bahagian.acym + `</td>
                                        <td><div class="table_sLarge table_grey"><u>` + item.catatan + `</u></div></td>
                                        <td><div class="table_sLarge table_grey pemberat_input"><u>` + item.tarikh_catatan + `</u></div></td>
                                    </tr>
                                    `)
                        }
                        
                        
                    })

                    if(sejarahNegeriUlasan == 0) {
                        document.querySelector('#sejarahNegeriUlasan').style.display = 'none'
                    }
                }

                if (current_user_type != 4) {
                    document.querySelector('#bkor_div_1').style.display = 'none'
                    document.querySelector('#bkor_div_2').style.display = 'none'
                    // document.querySelector('#bkor_div_3').style.display = 'none'
                    // document.querySelector('#bkor_div_4').style.display = 'none'
                    document.querySelector('#submitBKOR').style.display = 'none'
                    document.querySelector('#submitBahagian').style.display = 'block'
                    document.getElementById('rp_kos').setAttribute('readonly', 'true');
                    document.getElementById('rp_tajuk').setAttribute('readonly', 'true');

                    if (rp_project.workflow == 'Negeri') {
                        // document.querySelector('#div_bahagian_1').style.display = 'none'
                        document.querySelector('#submitBahagian').style.display = 'none'
                        document.querySelector('#submitNegeri').style.display = 'block'

                    }
                }

            }

            if (rp_project.status == 'Selesai' || rp_project.status == 'BATAL OLEH BKOR') {

                document.getElementById("rumusan_permohonan").disabled = true;
                document.getElementById("rp_tajuk").disabled = true;
                document.getElementById("rp_kos").disabled = true;
                document.getElementById("removefile5").style.display = 'none'
                disable_all(rp_project)
            }

            if (rp_project.workflow == 'BKOR' && rp_project.is_first == '0') {

                document.getElementById("rp_tarikh_permohonan").value = rp_project.tarikh_permohonan
                document.getElementById("rp_tarikh_permohonan").disabled = true
                // document.getElementById("bahagian_terlibat").style.display = 'none'
                $(".ms-options-wrap").css('pointer-events', 'none');
                var pilihBtn = $(".ms-options-wrap").children();
                $(pilihBtn[0]).css("background", "#e9ecef").css("color", "#495057");

                document.querySelector('#bkor_div_2').style.display = 'none'
                document.querySelector('#bkor_div_3').style.display = 'none'
                // document.querySelector('#bkor_div_4').style.display = 'none'
                // document.querySelector('#div_bahagian_1').style.display = 'none'
                // document.querySelector('#div_bahagian_2').style.display = 'none'
                if (current_user_type == 4) {
                    document.querySelector('#BKOR_Selesai').style.display = 'block'
                }



                document.getElementById("rumusan_permohonan").value = rp_project.rumusan_permohonan



                if (rp_project.media.length > 0) {
                    document.getElementById("rumusan_lampiran_error").innerHTML = "";
                    $("#filePreview5").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                    $("#fileName5").text(rp_project.media[0].file_name);
                    $("#Uploadfile5").addClass('d-none')
                    $("#fileUploaded5").removeClass('d-none')
                }

                document.getElementById('rp_hantarBtn').innerText = 'Selesai'
                // Create a new button element
                var newButton = document.createElement('button');

                // Set the button attributes
                newButton.setAttribute('type', 'button');
                newButton.setAttribute('class', 'mr-1 mb-2 col-md-2 rp_kembaliBtnBtn');
                newButton.setAttribute('id', 'rp_kembaliBtnBtn');
                newButton.innerText = 'Kembali Kepada Bahagian';



                // Append the new button to the inner div of submitBahagian
                var submitBahagianDiv = document.getElementById('submitBKOR');
                var innerDiv = submitBahagianDiv.querySelector('.d-flex.flex-wrap');
                var firstElement = innerDiv.firstChild;
                innerDiv.insertBefore(newButton, firstElement);

                $(".rp_kembaliBtnBtn").click(function() {

                    var select = document.getElementById('bahagian_terlibat');
                    var selected = [...select.selectedOptions].map(option => option.text);
                    var selectedvalue = [...select.selectedOptions]
                        .map(option => option.value);

                    var bahagianKembali = document.getElementById('bahagian_kembali');

                    for(var i in selected) {
                        var el = document.createElement("option");
                        el.textContent = selected[i];
                        el.value = selectedvalue[i];
                        bahagianKembali.appendChild(el);
                    }

                    
                    $("#bahagian_kembali").multiselect({
                        selectedOptions: ' pilihan',
                        search: true,
                        columns: 1,
                        placeholder: '--Pilih--',
                    });

                    
                    $('#exampleModalToggle1').modal('show');
                })
                // innerDiv.appendChild(newButton);
            }

            document.getElementById('select_negeri').value = rp_project.negeris.negeri_id


            loadnegeri_parlimen_dun(rp_project.negeris.negeri_id)
                .then(result => {
                    console.log('loaded');
                    document.getElementById("select_daerah").value = rp_project.negeris.daerah_id
                    document.getElementById("select_parlimen").value = rp_project.negeris.parliment_id
                    getdun().then(() => {
                        document.getElementById("select_dun").value = rp_project.negeris.dun_id

                        if (rp_project.workflow != 'BKOR') {
                            document.getElementById("select_negeri").disabled = true
                            document.getElementById("select_daerah").disabled = true
                            document.getElementById("select_parlimen").disabled = true
                            document.getElementById("select_dun").disabled = true
                        }

                    })
                })

            if (rp_project.sejarah_bahagian.length > 0) {
                document.querySelector('#sejarahBahagian').style.display = 'block'
                let sejarahBahagian = 0
                //load negeri table
                $.each(rp_project.sejarah_bahagian, function(key, item) {
                    sejarahBahagian = sejarahBahagian + 1
                    $('#sejarahBahagianTbody').append(`
                        <tr>
                            <td>` + sejarahBahagian + `</td>
                            <td>` + item.tarikh_maklumbalas + `</td>
                            <td>` + item.isu + `</td>
                            <td>` + item.ulasan_teknical + `</td>
                            <td>` + item.cadangan_jangka_pendek + `</td>
                            <td>` + item.cadangan_jangka_panjang + `</td>
                            <td><a href=""><u>` + item.lampiran + `</u></a></td>
                          </tr>
                        `)
                })
            }

            

            if (rp_project.sejarah_bahagian_ulasan.length > 0) {
                document.querySelector('#sejarahBahagianUlasan').style.display = 'block'
                let sejarahBahagianUlasan = 0
                let sejarahBKORnUlasan = 0;
                //load negeri table
                console.log('u;lasa');
                console.log(rp_project.sejarah_bahagian_ulasan);
                $.each(rp_project.sejarah_bahagian_ulasan, function(key, item) {

                    current_user_bahagian_id = "{{Auth::user()->bahagian_id}}"
                    if(current_user_bahagian_id == item.bahagian_id) {
                        sejarahBahagianUlasan = sejarahBahagianUlasan + 1
                        $('#sejarahBahagianUlasanTbody').append(`
                            <tr>
                                <td>` + sejarahBahagianUlasan + `</td>
                                <td><div class="table_sLarge table_grey"><u>` + item.catatan + `</u></div></td>
                                <td><div class="table_sLarge table_grey pemberat_input"><u>` + item.tarikh_catatan + `</u></div></td>
                            </tr>
                            `)
                    }
                    
                })

                if(sejarahBahagianUlasan == 0) {
                    document.querySelector('#sejarahBahagianUlasan').style.display = 'none'
                }

                if(current_user_type == 4) {
                    document.querySelector('#sejarahBKORUlasan').style.display = 'block'
                    $.each(rp_project.sejarah_bahagian_ulasan, function(key, item) {

                        sejarahBKORnUlasan = sejarahBKORnUlasan + 1
                        $('#sejarahBKORUlasanTbody').append(`
                            <tr>
                                <td>` + sejarahBKORnUlasan + `</td>
                                <td>` + item.bahagian.acym + `</td>
                                <td><div class="table_sLarge table_grey"><u>` + item.catatan + `</u></div></td>
                                <td><div class="table_sLarge table_grey pemberat_input"><u>` + item.tarikh_catatan + `</u></div></td>
                            </tr>
                            `)
                    })
                }
            }


            document.getElementById('rp_tajuk').value = rp_project.tajuk
            document.getElementById('rp_tarikh_permohonan').value = rp_project.tarikh_permohonan

            if(rp_project.kos) {
                const number = parseFloat(rp_project.kos.replace(/,/g, ''))
                const parts = number.toFixed(2).split('.');
                const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                kos = integerPart + '.' + parts[1];
                document.getElementById('rp_kos').value = kos
            }
            
            // document.getElementById('rp_bkor_catatan').value = rp_project.bkor_catatan


            //load bahagian details
            let sejarahNegeri = 0
            let sejarahBahagian = 0

            var selectedvalue = []
            for(var i in rp_project.bahagians) {
                console.log(rp_project.bahagians[i].bahagian.id)
                var optionVal = rp_project.bahagians[i].bahagian.id;
                // console.log($("bahagian_terlibat").find("option[value="+optionVal+"]").val())
                $("#bahagian_terlibat").find("option[value="+optionVal+"]").prop("selected", true);            
            }
            $("#bahagian_terlibat").multiselect('reload');

            $("#bahagian_terlibat").click();

            for (var i in rp_project.bahagians) {
                var optionVal = rp_project.bahagians[i].bahagian_id;
                $("#bahagian_terlibat").find("option[value=" + optionVal + "]").prop("selected", true);
                readonly = ''
                disabled = ''
                if (rp_project.workflow != 'BKOR') {
                    disabled = 'disabled'
                }
                catatan_readonly = ''
                if (rp_project.status == 'Selesai' || rp_project.status == 'BATAL OLEH BKOR') {
                    catatan_readonly = 'readonly'
                }
                template = `<div class="col-md-12 col-xs-12 mb-3" id="bkor_catatan">
                            <label class="pemberat_title" for="">Catatan ` + rp_project.bahagians[i].bahagian
                    .nama_bahagian + `<sup>*</sup></label>
                            <input type="hidden" id="bahagianIdBkorCatatan"  value="` + rp_project.bahagians[i]
                    .bahagian_id + `"/>
                        <textarea ` + disabled + ` class="pemberat_title1 form-control" ` + catatan_readonly +
                    ` name="rp_bkor_catatan " id="rp_bkor_catatan" cols="30" rows="5">` + rp_project
                    .bahagians[i]
                    .bkor_catatan + `</textarea>
                        </div>`

                // if(rp_project.workflow == 'BKOR') {
                //     $('#bkor_div_4').append(template)
                // }

                if (current_user_type == 4) {
                    $('#bkor_div_4').append(template)
                }

                if (rp_project.workflow == 'Bahagian') {
                    if (rp_project.bahagians[i]
                        .bahagian_id == "{{Auth::user()->bahagian_id}}") {
                        document.getElementById('bahagianDetailsId').value = rp_project.bahagians[i]
                            .bahagian_detail.id
                        $('#bkor_div_4').append(template)
                        await loadBhagianDetails(rp_project.bahagians[i].bahagian, rp_project.bahagians[i]
                            .bahagian_detail, 'bahagian', rp_project.sejarah_negeri, current_user_type)
                        if (rp_project.bahagians[i].status != 'Bahagian') {
                            disable_all(rp_project)
                        }
                    }

                }

                if (rp_project.workflow == 'Negeri' && current_user_type == 1) {
                    if (rp_project.bahagians[i].status == 'Negeri') {
                        loadBhagianDetails(rp_project.bahagians[i].bahagian, rp_project.bahagians[i]
                            .bahagian_detail, 'negeri', rp_project.sejarah_negeri, current_user_type)
                    }
                }

                if (rp_project.workflow != 'Bahagian' && current_user_type == 3) {
                    if (rp_project.bahagians[i]
                        .bahagian_id == "{{Auth::user()->bahagian_id}}") {
                        document.getElementById('bahagianDetailsId').value = rp_project.bahagians[i]
                            .bahagian_detail.id
                        $('#bkor_div_4').append(template)
                        await loadBhagianDetails(rp_project.bahagians[i].bahagian, rp_project.bahagians[i]
                            .bahagian_detail, 'bahagian', rp_project.sejarah_negeri, current_user_type)
                        if (rp_project.bahagians[i].status != 'Bahagian') {
                            disable_all(rp_project)
                        }
                    }
                    // loadBhagianDetails(rp_project.bahagians[i].bahagian,rp_project.bahagians[i].bahagian_detail,'negeri',rp_project.sejarah_negeri,current_user_type)
                }

                // if(rp_project.workflow == 'Negeri') {

                // }

                if (rp_project.workflow != 'Negeri' && current_user_type == 1) {


                    // if (rp_project.bahagians[i].bahagian_detail.negeri.isu != null) {

                    //     await loadBhagianDetails(rp_project.bahagians[i].bahagian, rp_project.bahagians[i]
                    //         .bahagian_detail, 'negeri', rp_project.sejarah_negeri, current_user_type)
                    //     disable_all(rp_project)
                    // }

                    // if (rp_project.bahagians[i].status == 'Negeri') {
                        document.querySelector('#submitBahagian').style.display = 'none'
                        

                        enable_negeri_button = false

                        $.each(rp_project.bahagians, function(key, item) {
                            if(item.status == 'Negeri') {
                                enable_negeri_button = true
                                if(enable_negeri_button) {
                                    document.querySelector('#submitNegeri').style.display = 'block'
                                }
                            }
                        })
                        negeri_readonly = true
                        if(rp_project.bahagians[i].status == 'Negeri') {
                            negeri_readonly = false
                        }
                        await loadBhagianDetails(rp_project.bahagians[i].bahagian, rp_project.bahagians[i]
                            .bahagian_detail, 'negeri', rp_project.sejarah_negeri, current_user_type,negeri_readonly)
                        // disable_all()
                    // }


                }


                // if(rp_project.workflow == 'BKOR' && rp_project.is_first != 1) {
                if (current_user_type == 4 && rp_project.status != 'DAFTAR PERMOHONAN') {

                    // loadBhagianDetails(rp_project.bahagians[i].bahagian,rp_project.bahagians[i].bahagian_detail,'BKOR',rp_project.sejarah_negeri,current_user_type)
                    document.querySelector('#sejarahNegeri').style.display = 'block'
                    document.querySelector('#sejarahBahagian').style.display = 'block'

                    const sejarahNegeriHeading = document.querySelector("#sejarahNegeriHeading");
                    const sejarahBahagianHeading = document.querySelector("#sejarahBahagianHeading");

                    sejarahNegeriHeading.textContent = 'MAKLUMBALAS OLEH NEGERI'
                    sejarahBahagianHeading.textContent = 'MAKLUMBALAS OLEH BAHAGIAN'

                    // $.each(rp_project.bahagians, function(key, item) {
                    sejarahBahagian = sejarahBahagian + 1
                    sejarahNegeri = sejarahNegeri + 1
                    bahagianMedia = ''
                    bahagianMediaMohon = ''
                    negeriMedia = ''

                    bahagianCollectionName = ''
                    bahagianMediaModelTypeId = ''
                    bahagianMediaModelType = ''
                    bahagianMediaModelId = ''

                    bahagianCollectionNameMohon = ''
                    bahagianMediaModelTypeIdMohon = ''
                    bahagianMediaModelTypeMohon = ''
                    bahagianMediaModelIdMohon = ''

                    negeriCollectionName = ''
                    negeriMediaModelTypeId = ''
                    negeriMediaModelType = ''
                    negeriMediaModelId = ''
                    if (rp_project.bahagians[i].bahagian_detail.media.length > 0) {

                        $.each(rp_project.bahagians[i].bahagian_detail.media, function(key, item) {
                            if (item.collection_name == 'rp_lampiran_file') {
                                bahagianMedia = item.file_name
                                bahagianCollectionName = item.collection_name
                                bahagianMediaModelTypeId = item.model_id
                                bahagianMediaModelType = item.model_type
                                bahagianMediaModelId = item.id
                            }

                            if (item.collection_name == 'rp_di_mohon_file') {
                                bahagianMediaMohon = item.file_name
                                bahagianCollectionNameMohon = item.collection_name
                                bahagianMediaModelTypeIdMohon = item.model_id
                                bahagianMediaModelTypeMohon = item.model_type
                                bahagianMediaModelIdMohon = item.id
                            }
                        })


                    }
                    $('#sejarahBahagianTbody').append(`
                                <tr>
                                    <td>` + sejarahBahagian + `</td>
                                    <td>` + rp_project.bahagians[i].bahagian_detail.dikemaskini_pada + `</td>
                                    <td>` + rp_project.bahagians[i].bahagian.acym + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.isu !== null ? rp_project
                            .bahagians[i].bahagian_detail.isu : "") + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.ulasan_teknikal !== null ?
                            rp_project.bahagians[i].bahagian_detail.ulasan_teknikal : "") + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.cadagan_jangka_pendek !== null ?
                            rp_project.bahagians[i].bahagian_detail.cadagan_jangka_pendek : "") + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.cadagan_jangka_panjang !== null ?
                            rp_project.bahagians[i].bahagian_detail.cadagan_jangka_panjang : "") + `</td>
                                    <td><button type="button" class="download-button" onclick="downloadDoc(` +
                        bahagianMediaModelId + `,
                                        ` + bahagianMediaModelTypeId + `, '` + bahagianMedia + `', '` +
                        bahagianMediaModelType + `', '` + bahagianCollectionName +
                        `'); return false;"><u>` + bahagianMedia + `</u></button></td>
                                </tr>
                                `)

                    $('#diMohonTbody').append(`
                                <tr>
                                    <td>` + rp_project.bahagians[i].bahagian.acym + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.is_dimohon == "1" ? 'YA' :
                            'TIDAK') + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.no_rujukan ? rp_project.bahagians[
                            i].bahagian_detail.no_rujukan : '') + `</td>
                                    <td><button type="button" class="download-button" onclick="downloadDoc(` +
                        bahagianMediaModelIdMohon + `,
                                        ` + bahagianMediaModelTypeIdMohon + `, '` + bahagianMediaMohon + `', '` +
                        bahagianMediaModelTypeMohon + `', '` + bahagianCollectionNameMohon +
                        `'); return false;"><u>` + bahagianMediaMohon + `</u></button></td>
                                </tr>
                                `)

                    if (rp_project.bahagians[i].bahagian_detail.negeri.media.length > 0) {
                        negeriMedia = rp_project.bahagians[i].bahagian_detail.negeri.media[0].file_name
                        negeriCollectionName = rp_project.bahagians[i].bahagian_detail.negeri.media[0]
                            .collection_name
                        negeriMediaModelTypeId = rp_project.bahagians[i].bahagian_detail.negeri.media[0]
                            .model_id
                        negeriMediaModelType = rp_project.bahagians[i].bahagian_detail.negeri.media[0]
                            .model_type
                        negeriMediaModelId = rp_project.bahagians[i].bahagian_detail.negeri.media[0].id
                    }
                    $('#sejarahNegeriTbody').append(`
                                <tr>
                                    <td>` + sejarahNegeri + `</td>
                                    <td>` + rp_project.bahagians[i].bahagian_detail.dikemaskini_pada + `</td>
                                    <td>` + rp_project.bahagians[i].bahagian.acym + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.negeri.isu !== null ? rp_project
                            .bahagians[i].bahagian_detail.negeri.isu : "") + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.negeri.ulasan_teknikal !== null ?
                            rp_project.bahagians[i].bahagian_detail.negeri.ulasan_teknikal : "") + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.negeri.cadagan_jangka_pendek !==
                            null ? rp_project.bahagians[i].bahagian_detail.negeri
                            .cadagan_jangka_pendek : "") + `</td>
                                    <td>` + (rp_project.bahagians[i].bahagian_detail.negeri.cadagan_jangka_panjang !==
                            null ? rp_project.bahagians[i].bahagian_detail.negeri
                            .cadagan_jangka_panjang : "") + `</td>
                                    <td><button type="button" class="download-button" onclick="downloadDoc(` +
                        negeriMediaModelId + `,
                                        ` + negeriMediaModelTypeId + `, '` + negeriMedia + `', '` +
                        negeriMediaModelType + `', '` + negeriCollectionName +
                        `'); return false;"><u>` + negeriMedia + `</u></button></td>
                                </tr>
                                `)
                    // })
                }


            }

            if (rp_project.butirans.length > 0) {
                // document.getElementById("rp_jenis_permohon").disabled = true;
                document.getElementById("rp_jenis_permohon").value = rp_project.butirans[0]
                    .jenis_permohonan;
            }

            // $("#bahagian_terlibat").multiselect({
            //     // includeSelectAllOption: true,
            //     selectedOptions : ' pilihan',
            //     search : true,
            //     columns: 1,
            //     placeholder: '--Pilih--',
            //     //selectAll : true,
            // });

            // $("#bahagian_terlibat").multiselect('reload');

            $("#bahagian_terlibat").click()

            var select = document.getElementById('bahagian_terlibat');
            var selected = [...select.selectedOptions].map(option => option.text);
            var selectedvalue = [...select.selectedOptions].map(option => option.value);

            var tbody = document.getElementById('maklumat_permohon_tbody');
            var noRecordRow = document.getElementById('noRecordRow');
            if (noRecordRow) {
                tbody.removeChild(noRecordRow);
            }
            if (rp_project.butirans.length == 0) {
                var tbody = document.getElementById('maklumat_permohon_tbody');
                var newRow = tbody.insertRow();
                var cell = newRow.insertCell();
                newRow.id = 'noRecordRow';
                cell.style.textAlign = 'center';
                cell.colSpan = 6; // Set the colspan to match the number of columns
                cell.textContent = '-- Tiada Maklumat --';
            }
            //load butiran table
            $.each(rp_project.butirans, function(key, item) {
                trcount = trcount + 1
                // if (rp_project.is_first != '0') {
                if (item.image_name == '') {
                    muatLampiran = `<td class="uploadButton" style="text-align: center;"><img data-bs-toggle="modal" data-bs-target="#exampleModal" 
                            src="{{ asset("assets/images/upload_img_1.png") }}">
                        </td>`
                } else {
                    if (rp_project.workflow == 'BKOR' && rp_project.is_first) {
                        muatLampiran =
                            `<td><button type="button" class="uploadButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><u>` +
                            item.media[0].file_name + `</u></button></td>`
                    } else {
                        if (item.media.length > 0) {
                            muatLampiran =
                                `<td><button type="button" class="download-button" onclick="downloadDoc(` +
                                item.media[0].id + `,
                                    ` + item.media[0].model_id + `, '` + item.media[0].file_name + `', '` + item.media[
                                    0].model_type + `', '` + item.media[0].collection_name +
                                `'); return false;"><u>` + item.media[0].file_name +
                                `</u></button></td>`
                        } else {
                            muatLampiran = ''
                        }

                    }

                }
                disabled_butiran_remove = ''
                if(rp_project.status != 'DAFTAR PERMOHONAN' ) {
                    disabled_butiran_remove = 'disabled'
                    
                }
                console.log('disabled');
                
                console.log(disabled_butiran_remove);
                if (item.media.length > 0) {

                    
                    $('#maklumat_permohon_tbody').append(`<tr id=trId_` + trcount + ` data-index=` +
                        trcount + `>
                    <input  type="hidden" name="butiranId" id="butiranId" value="` + item.id + `">
                    <input  type="hidden" value="` + item.image_name + `" name="rp_butiran_imej" id="rp_butiran_imej">
                    <input  type="hidden" value="` + item.image_keterangan + `" name="rp_butiran_catatan" id="rp_butiran_catatan">
                    
                    <td>` + trcount + `</td>
                        <td>` + item.tarik_surat + `</td>
                        <td>` + item.no_rujukan + `</td>
                        <td>` + item.jenis_permohonan + `</td>
                        <td >` + item.butiran_permohona + `</td>
                        ` + muatLampiran + `
                        <td>
                            <button type="button" id="removeButiran" class="p-2 removeButiran" `+disabled_butiran_remove+`>
                                <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                    style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                            </button>
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="file" id="rp_butiran_file">
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_models_id" value=` + item.media[0].id + `>
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_model_id" value=` + item.media[0].model_id + `>
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_file_name" value=` + item.media[0].file_name + `>
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_model_type" value=` + item.media[0].model_type + `>
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_collection_name" value=` + item.media[0].collection_name + `>
                        </td>
                    </tr>`);
                } else {
                    $('#maklumat_permohon_tbody').append(`<tr id=trId_` + trcount + ` data-index=` +
                        trcount + `>
                    <input  type="hidden" name="butiranId" id="butiranId" value="` + item.id + `">
                    <input  type="hidden" value="` + item.image_name + `" name="rp_butiran_imej" id="rp_butiran_imej">
                    <input  type="hidden" value="` + item.image_keterangan + `" name="rp_butiran_catatan" id="rp_butiran_catatan">
                    
                    <td>` + trcount + `</td>
                        <td>` + item.tarik_surat + `</td>
                        <td>` + item.no_rujukan + `</td>
                        <td>` + item.jenis_permohonan + `</td>
                        <td >` + item.butiran_permohona + `</td>
                        ` + muatLampiran + `
                        <td>
                            <button type="button" id="removeButiran" class="p-2 removeButiran" `+disabled_butiran_remove+`>
                                <i class="ri ri-checkbox-indeterminate-line tab_icon_grey"
                                    style="font-size: 1.3rem;vertical-align:middle;" alt=""></i>
                            </button>
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="file" id="rp_butiran_file">
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_models_id" value="">
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_model_id" value="">
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_file_name" value="">
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_model_type" value="">
                        </td>
                        <td style="position: absolute; left: -9999px;">
                            <input type="text" id="rp_collection_name" value="">
                        </td>
                    </tr>`);
                }


                let all_upload_btn = document.querySelectorAll(
                    ".uploadButton"
                );

                all_upload_btn.forEach((tb, i) => {
                    tb.removeEventListener("click", setModalValues)
                })

                all_upload_btn.forEach((tb, i) => {
                    tb.addEventListener("click", setModalValues)
                })

                let all_removeButiran_btn = document.querySelectorAll('.removeButiran');

                all_removeButiran_btn.forEach((btn, i) => {

                    // Remove the event listener
                    btn.removeEventListener('click', handleRemoveButiran);
                    btn.addEventListener('click', handleRemoveButiran);
                });
            })



        })

    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
}

function handleRemoveButiran(event)
{
    const tr = event.target.closest('tr');
    if (tr) {
        tr.remove();
    }
}


function loadBhagianDetails(bahagian, bahagianDetails, bahagian_or_negeri, sejarah_negeri, current_user_type,negeri_readonly_data = false) {
    console.log(bahagianDetails);
    bahagian_readonly = ''
    negeri_readonly = ''
    bahagian_disabled = ''
    negeri_disabled = ''
    bahagian_button_remove = ` <button style="float:right" id="removefile2" type="button"
                                                class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-x"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg></button>`
    negeri_button_remove = ` <button style="float:right" id="removefile3_` + bahagianDetails.bahagian_id + `" type="button"
                                                class="btn btn text-danger P-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-x"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg></button>`
    if (bahagian_or_negeri == 'bahagian') {
        negeri_readonly = 'readonly'
        negeri_disabled = 'disabled'
        negeri_button_remove = ''
    }

    if (bahagian_or_negeri == 'negeri') {
        bahagian_readonly = 'readonly'
        bahagian_disabled = 'disabled'
        bahagian_button_remove = ''
    }

    if (bahagian_or_negeri == 'BKOR') {
        bahagian_readonly = 'readonly'
        negeri_readonly = 'readonly'
        bahagian_disabled = 'disabled'
        negeri_disabled = 'disabled'
        bahagian_button_remove = ''
        negeri_button_remove = ''
    }

    if(negeri_readonly_data) {
        negeri_readonly = 'readonly'
        negeri_disabled = 'disabled'
        negeri_button_remove = ''
    }

    console.log('baha');
    console.log(bahagian);

    bahagian_template = `<div class="ml-5 mt-5">
                            <div class="col-md-12 col-xs-12 mb-3 pemberat_title2">
                                <h6>` + bahagian.nama_bahagian + `</h6>
                            </div>
                            <hr>
                        </div>
                        <div class="m-5 " id="">
                            <div class="col-md-12 col-xs-12 mb-3">
                                <label class="pemberat_title" for="">Isu/Masalah<sup>*</sup></label>
                                <textarea ` + bahagian_readonly + ` class="pemberat_title1 form-control" name="rp_isu" id="rp_isu" cols="30"
                                    rows="5">` + (bahagianDetails.isu ? bahagianDetails.isu : '') + `</textarea>
                            </div>

                   


                            <div class="col-md-12 col-xs-12 mb-3">
                          
                                <label class="pemberat_title" for="">Ulasan Teknikal<sup>*</sup></label> 
                               
                                <button class="vmpop_btn" id="hoverTest">
                                <i class="iconify  info_icon" data-icon="mdi-information"></i>
                    <div
                      id="customTooltip"
                      class="hideme"
                      style="position:absolute;"
                    >

                    <label style="position: absolute;background-color: #E9E9E9;border-radius:0.3rem;font-size:0.6rem;left:30;font-weight:600;width:150px !important; padding:10px;text-align:center;">  Sila isi sekiranya perlu</label>
                     
                    </div>
                  </button>

                                <textarea  ` + bahagian_readonly + ` class="pemberat_title1 form-control" name="rp_ulasan_teknikal" id="rp_ulasan_teknikal"
                                    cols="30" rows="5">` + (bahagianDetails.ulasan_teknikal ? bahagianDetails
            .ulasan_teknikal : '') + `</textarea>
                            </div>
                            <div class="col-md-12 col-xs-12 mb-3">
                                <label class="pemberat_title" for="">Cadangan Penyelesaian Jangka Pendek<sup>*</sup></label>
                                <button class="vmpop_btn" id="hoverTest2">
                                    <i class="iconify  info_icon" data-icon="mdi-information"></i>
                    <div
                      id="customTooltip2"
                      class="hideme"
                      style="position:absolute;"
                    >

                    <label style="position: absolute;background-color: #E9E9E9;border-radius:0.3rem;font-size:0.6rem;left:30;font-weight:600;width:150px !important; padding:10px;text-align:center;">  Sila isi sekiranya perlu</label>
                     
                    </div>
                  </button>
                                <textarea  ` + bahagian_readonly + ` class="pemberat_title1 form-control" name="rp_cadagan_jangka_pendek"
                                    id="rp_cadagan_jangka_pendek" cols="30" rows="5">` + (bahagianDetails
            .cadagan_jangka_pendek ? bahagianDetails.cadagan_jangka_pendek : '') + `</textarea>
                            </div>
                            <div class="col-md-12 col-xs-12 mb-3">
                                <label class="pemberat_title" for="">Cadangan Penyelesaian Jangka Panjang<sup>*</sup></label>
                                <button class="vmpop_btn" id="hoverTest3">
                                    <i class="iconify  info_icon" data-icon="mdi-information"></i>
                    <div
                      id="customTooltip3"
                      class="hideme"
                      style="position:absolute;"
                    >

                    <label style="position: absolute;background-color: #E9E9E9;border-radius:0.3rem;font-size:0.6rem;left:30;font-weight:600;width:150px !important; padding:10px;text-align:center;">  Sila isi sekiranya perlu</label>
                     
                    </div>
                  </button>
                                <textarea  ` + bahagian_readonly + ` class="pemberat_title1 form-control" name="rp_cadagan_jangka_panjang"
                                    id="rp_cadagan_jangka_panjang" cols="30" rows="5">` + (bahagianDetails
            .cadagan_jangka_panjang ? bahagianDetails.cadagan_jangka_panjang : '') + `</textarea>
                            </div>



                            <div class="col-md-7 col-xs-12 form-group">
                                <div class="upload_img col-12 d-none" id="fileUploaded2">
                                    <div class="row col-12 " >
                                        <div>
                                            ` + bahagian_button_remove + `
                                        </div>
                                        <img id="filePreview2" style="height:45px" >
                                        <label id="fileName2"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 mb-3 " id="Uploadfile2">
                                <label class="pemberat_title" for="">Muatnaik Lampiran (sekiranya berkaitan)</label>
                                <div class="col-md-7 col-xs-12 form-group pl-0">
                                    <div class="upload_img">

                                        <div class="">
                                            <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto"
                                                alt="" />
                                            <input name="bahagian_lampiran" type="file" class="custom-file-input " ` +
        bahagian_disabled + `
                                                id="bahagian_lampiran">
                                            <h5>
                                                Letakkan fail di sini atau klik untuk memuat
                                                naik
                                            </h5>
                                        </div>
                                        <p>(Saiz fail tidak melebihi 2mb)</p>
                                    </div>
                                    <p class="text-danger" id="bahagian_lampiran_error"></p>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 mb-3" id="bahagian_catatan">
                                    <label class="pemberat_title" for="">Catatan <sup>*</sup></label>
                                <textarea ` + bahagian_readonly +
        ` class="pemberat_title1 form-control" name="bahagian_catatan_value" id="bahagian_catatan_value" cols="30" rows="5">` +
        (bahagianDetails.catatan ? bahagianDetails.catatan : '') + `</textarea>
                            </div>
                        </div>

                        `





    if (bahagianDetails.negeri.media.length > 0) {
        laporan_negeri_filename = bahagianDetails.negeri.media[0].file_name
        negeriMedia = bahagianDetails.negeri.media[0].file_name
        negeriCollectionName = bahagianDetails.negeri.media[0].collection_name
        negeriMediaModelTypeId = bahagianDetails.negeri.media[0].model_id
        negeriMediaModelType = bahagianDetails.negeri.media[0].model_type
        negeriMediaModelId = bahagianDetails.negeri.media[0].id
    } else {
        laporan_negeri_filename = ''
        negeriMedia = ''
        negeriCollectionName = ''
        negeriMediaModelTypeId = ''
        negeriMediaModelType = ''
        negeriMediaModelId = ''
    }



    negeri_template = `<div class="ml-5 mt-5">
                    <div class="col-md-12 col-xs-12 mb-3 pemberat_title2">
                    <h6>ULASAN NEGERI</h6>
                    </div>
                    <hr>
                  </div>
                  <div class="m-5 " id="div_bahagian_2">
                    <div class="col-md-12 col-xs-12 mb-3">
                        <label class="pemberat_title" for="">Isu/Masalah<sup>*</sup></label>
                        <textarea  ` + negeri_readonly +
        ` class="pemberat_title1 form-control" name="rp_isu" id="rp_negeri_isu_` + bahagianDetails.bahagian_id + `" cols="30"
                            rows="5">` + (bahagianDetails.negeri.isu ? bahagianDetails.negeri.isu : '') + `</textarea>
                    </div>
                    <div class="col-md-12 col-xs-12 mb-3">
                        <label class="pemberat_title" for="">Ulasan Teknikal<sup>*</sup></label>
                        <textarea ` + negeri_readonly +
        ` class="pemberat_title1 form-control" name="rp_ulasan_teknikal" id="rp_negeri_ulasan_teknikal_` +
        bahagianDetails.bahagian_id + `"
                            cols="30" rows="5">` + (bahagianDetails.negeri.ulasan_teknikal ? bahagianDetails.negeri
            .ulasan_teknikal : '') + `</textarea>
                    </div>
                    <div class="col-md-12 col-xs-12 mb-3">
                        <label class="pemberat_title" for="">Cadangan Penyelesaian Jangka Pendek<sup>*</sup></label>
                        <textarea ` + negeri_readonly + ` class="pemberat_title1 form-control" name="rp_cadagan_jangka_pendek"
                            id="rp_negeri_cadagan_jangka_pendek_` + bahagianDetails.bahagian_id +
        `" cols="30" rows="5">` + (bahagianDetails.negeri.cadagan_jangka_pendek ? bahagianDetails.negeri
            .cadagan_jangka_pendek : '') + `</textarea>
                    </div>
                    <div class="col-md-12 col-xs-12 mb-3">
                        <label class="pemberat_title" for="">Cadangan Penyelesaian Jangka Panjang<sup>*</sup></label>
                        <textarea ` + negeri_readonly + ` class="pemberat_title1 form-control" name="rp_cadagan_jangka_panjang"
                            id="rp_negeri_cadagan_jangka_panjang_` + bahagianDetails.bahagian_id +
        `" cols="30" rows="5">` + (bahagianDetails.negeri.cadagan_jangka_panjang ? bahagianDetails.negeri
            .cadagan_jangka_panjang : '') + `</textarea>
                    </div>



                    <div class="col-md-7 col-xs-12 form-group">
                        <div class="upload_img col-12 d-none" id="fileUploaded3_` + bahagianDetails.bahagian_id + `">
                            <div class="row col-12 ">
                                <div>
                                ` + negeri_button_remove + `
                                </div>
                                <img id="filePreview3_` + bahagianDetails.bahagian_id + `" style="height:45px" >
                                <input  name="negeri_lampiran_filename_` + bahagianDetails.bahagian_id +
        `" type="hidden" value="` + laporan_negeri_filename + `"
                                        id="negeri_lampiran_filename_` + bahagianDetails.bahagian_id + `">
                                <label id="fileName3_` + bahagianDetails.bahagian_id + `" ></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 mb-3 " id="Uploadfile3_` + bahagianDetails.bahagian_id + `">
                        <label class="pemberat_title" for="">Muatnaik Lampiran (sekiranya berkaitan)</label>
                        <div class="col-md-7 col-xs-12 form-group pl-0">
                            <div class="upload_img">

                                <div class="">
                                    <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto"
                                        alt="" />
                                    <input name="negeri_lampiran_` + bahagianDetails.bahagian_id +
        `" type="file" class="custom-file-input " ` + negeri_disabled + `
        style="cursor:pointer;" id="negeri_lampiran_` + bahagianDetails.bahagian_id + `">
                                    <h5>
                                        Letakkan fail di sini atau klik untuk memuat
                                        naik
                                    </h5>
                                </div>
                                <p>(Saiz fail tidak melebihi 2mb)</p>
                            </div>
                            <p class="text-danger" id="negeri_lampiran_error_` + bahagianDetails.bahagian_id + `"></p>
                        </div>
                    </div>

                </div>`

    if (bahagian_or_negeri == 'negeri') {
        // if(current_user_type == 1) {

        if(!negeri_readonly_data) {
            $('#bahagianDetails').append(bahagian_template + negeri_template)
        }
        
        // }

    }

    if (bahagian_or_negeri == 'bahagian') {
        $('#bahagianDetails').append(bahagian_template)
    }

    $("#hoverTest").hover(
        function() {
            $("#customTooltip").removeClass("hideme");
        },
        function() {
            $("#customTooltip").addClass("hideme");
        }
    );
    $("#hoverTest2").hover(
        function() {
            $("#customTooltip2").removeClass("hideme");
        },
        function() {
            $("#customTooltip2").addClass("hideme");
        }
    );
    $("#hoverTest3").hover(
        function() {
            $("#customTooltip3").removeClass("hideme");
        },
        function() {
            $("#customTooltip3").addClass("hideme");
        }
    );

    if (bahagian_or_negeri == 'negeri') {

        const filePreview3 = document.getElementById("filePreview3_" + bahagianDetails.bahagian_id);
        const fileName3 = document.getElementById("fileName3_" + bahagianDetails.bahagian_id);
        const Uploadfile3 = document.getElementById("Uploadfile3_" + bahagianDetails.bahagian_id);
        const fileUploaded3 = document.getElementById("fileUploaded3_" + bahagianDetails.bahagian_id);
        let negeri_lampiran_filename = document.getElementById("negeri_lampiran_filename_" + bahagianDetails
            .bahagian_id);
        const negeriLampiran = document.getElementById("negeri_lampiran_" + bahagianDetails.bahagian_id);

        // if(bahagian_or_negeri == 'negeri') { 
        const removeNegeriLampiran = document.getElementById("removefile3_" + bahagianDetails.bahagian_id);
        // }

        bahagianMediaMohon = ''
        bahagianCollectionNameMohon = ''
        bahagianMediaModelTypeIdMohon = ''
        bahagianMediaModelTypeMohon = ''
        bahagianMediaModelIdMohon = ''
        $.each(bahagianDetails.media, function(key, item) {
            if (item.collection_name == 'rp_di_mohon_file') {
                $("#filePreview3").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileName3").text(item.file_name);
                $("#Uploadfile3").addClass('d-none')
                $("#fileUploaded3").removeClass('d-none')
                dimohon_file_name = item.filename
                bahagianMediaMohon = item.file_name
                bahagianCollectionNameMohon = item.collection_name
                bahagianMediaModelTypeIdMohon = item.model_id
                bahagianMediaModelTypeMohon = item.model_type
                bahagianMediaModelIdMohon = item.id
            }

            if (item.collection_name == 'rp_lampiran_file') {
                $("#filePreview2").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileName2").text(item.file_name);
                $("#Uploadfile2").addClass('d-none')
                $("#fileUploaded2").removeClass('d-none')
                lampiran_file_name = item.filename
            }
        })
        
        $('#diMohonTbody').append(`
                <tr>
                    <td>` + bahagian.acym + `</td>
                    <td>` + (bahagianDetails.is_dimohon == "1" ? 'YA' : 'TIDAK') + `</td>
                    <td>` + (bahagianDetails.no_rujukan ? bahagianDetails.no_rujukan : '') + `</td>
                    <td><button type="button" class="download-button" onclick="downloadDoc(` +
            bahagianMediaModelIdMohon + `,
                        ` + bahagianMediaModelTypeIdMohon + `, '` + bahagianMediaMohon + `', '` +
            bahagianMediaModelTypeMohon + `', '` + bahagianCollectionNameMohon + `'); return false;"><u>` +
            bahagianMediaMohon + `</u></button></td>
                </tr>
                `)

        if (bahagianDetails.negeri.media.length > 0) {

            if(filePreview3) {
                var media = bahagianDetails.negeri.media[0]
                filePreview3.src = "{{ asset('assets/pdf.jpg.png ') }}";
                fileName3.textContent = media.file_name;
                Uploadfile3.classList.add('d-none');
                fileUploaded3.classList.remove('d-none');
                negeri_lampiran_filename.value = media.file_name
            }
            
        }

        if(negeriLampiran) {
            negeriLampiran.addEventListener("change", function(event) {
                $new_file = event.target.files[0];
                console.log($new_file);
                if ($new_file.size > 4000000) {
                    negeriLampiran.value = '';
                    document.getElementById("negeri_lampiran_error_" + bahagianDetails.bahagian_id).innerHTML =
                        "file size lebih 4mb";

                    return false;
                }

                var allowedExtensions = ["application/pdf"];

                if (allowedExtensions.indexOf($new_file.type) == -1) {
                    negeriLampiran.value = '';
                    document.getElementById("negeri_lampiran_error_" + bahagianDetails.bahagian_id).innerHTML =
                        "file type should be pdf";

                    //alert("only jpeg and png extension allowed")
                    return false;
                }

                if ($new_file) {

                    document.getElementById("negeri_lampiran_error_" + bahagianDetails.bahagian_id).innerHTML = "";
                    var file_name2 = event.target.files[0].name
                    negeri_lampiran_filename = file_name2
                    filePreview3.src = "{{ asset('assets/pdf.jpg.png ') }}";
                    fileName3.textContent = file_name2
                    Uploadfile3.classList.add('d-none');
                    fileUploaded3.classList.remove('d-none');
                }
            });
        }
        

        if(removeNegeriLampiran) {
            removeNegeriLampiran.addEventListener("click", function() {
                filePreview3.src = '';
                Uploadfile3.classList.remove('d-none');
                fileUploaded3.classList.add('d-none');
                negeri_lampiran_filename.value = ''
            })
        }

        
    }


    $("#bahagian_lampiran").on("change", function() {
        $new_file = $('#bahagian_lampiran').prop('files')[0];
        console.log($new_file);
        if ($new_file.size > 4000000) {
            document.getElementById("bahagian_lampiran").value = '';
            document.getElementById("bahagian_lampiran_error").innerHTML = "file size lebih 4mb";

            return false;
        }

        var allowedExtensions = ["application/pdf"];

        if (allowedExtensions.indexOf($new_file.type) == -1) {
            document.getElementById("bahagian_lampiran").value = '';
            document.getElementById("bahagian_lampiran_error").innerHTML = "file type should be pdf";

            //alert("only jpeg and png extension allowed")
            return false;
        }

        if ($new_file) {

            document.getElementById("bahagian_lampiran_error").innerHTML = "";
            var file_name2 = $("#bahagian_lampiran").val().replace(/C:\\fakepath\\/i, '')
            lampiran_file_name = file_name2
            $("#filePreview2").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
            // document.getElementById("bahagian_lampiran").value = file_name2
            $("#fileName2").text(file_name2);
            $("#Uploadfile2").addClass('d-none')
            $("#fileUploaded2").removeClass('d-none')
        }

    });

    $("#removefile2").click(function() {
        $("#bahagian_lampiran").val('')
        $("#filePreview2").attr('src', '');
        $("#Uploadfile2").removeClass('d-none')
        $("#fileUploaded2").addClass('d-none')
    })

    if (bahagian_or_negeri == 'bahagian') {
        let sejarahNegeri = 0
        console.log('load',bahagianDetails.negeri);
        if(bahagianDetails.negeri) {
            document.querySelector('#sejarahNegeri').style.display = 'block'
            negeriCollectionName = ''
            negeriMediaModelTypeId = ''
            negeriMediaModelType = ''
            negeriMediaModelId = ''

            if (bahagianDetails.negeri.media.length > 0) {
                negeriMedia = bahagianDetails.negeri.media[0].file_name
                negeriCollectionName = bahagianDetails.negeri.media[0].collection_name
                negeriMediaModelTypeId = bahagianDetails.negeri.media[0].model_id
                negeriMediaModelType = bahagianDetails.negeri.media[0].model_type
                negeriMediaModelId = bahagianDetails.negeri.media[0].id
            }

            sejarahNegeri = sejarahNegeri + 1

            isu = bahagianDetails.negeri.isu ? bahagianDetails.negeri.isu : ''
            ulasan_teknikal = bahagianDetails.negeri.ulasan_teknikal ? bahagianDetails.negeri.ulasan_teknikal : ''
            cadagan_jangka_pendek = bahagianDetails.negeri.cadagan_jangka_pendek ? bahagianDetails.negeri.cadagan_jangka_pendek : ''
            cadagan_jangka_panjang = bahagianDetails.negeri.cadagan_jangka_panjang ? bahagianDetails.negeri.cadagan_jangka_panjang : ''
            $('#sejarahNegeriTbody').append(`
                    <tr>
                        <td>` + sejarahNegeri + `</td>
                        <td>` + bahagianDetails.negeri.updated_at.substring(0, 10) + `</td>
                        <td>` + bahagian.acym + `</td>
                        <td>` + isu + `</td>
                        <td>` + ulasan_teknikal + `</td>
                        <td>` + cadagan_jangka_pendek + `</td>
                        <td>` + cadagan_jangka_panjang + `</td>
                        <td><button type="button" class="download-button" onclick="downloadDoc(` +
                negeriMediaModelId + `,
                                ` + negeriMediaModelTypeId + `, '` + negeriMedia + `', '` +
                negeriMediaModelType + `', '` + negeriCollectionName + `'); return false;"><u>` +
                negeriMedia + `</u></button></td>
                    </tr>
                    `)
        }

            





        // if (sejarah_negeri.length > 0) {
        //     document.querySelector('#sejarahNegeri').style.display = 'block'
        //     let sejarahNegeri = 0
        //     //load negeri table

            
        //     $.each(sejarah_negeri, function(key, item) {



        //         if (item.bahagian_id == bahagianDetails.id) {

        //             negeriCollectionName = ''
        //             negeriMediaModelTypeId = ''
        //             negeriMediaModelType = ''
        //             negeriMediaModelId = ''

        //             if (item.media.length > 0) {
        //                 negeriMedia = item.media[0].file_name
        //                 negeriCollectionName = item.media[0].collection_name
        //                 negeriMediaModelTypeId = item.media[0].model_id
        //                 negeriMediaModelType = item.media[0].model_type
        //                 negeriMediaModelId = item.media[0].id
        //             }

        //             sejarahNegeri = sejarahNegeri + 1
        //             $('#sejarahNegeriTbody').append(`
        //                     <tr>
        //                         <td>` + sejarahNegeri + `</td>
        //                         <td>` + item.tarikh_maklumbalas + `</td>
        //                         <td>` + bahagian.acym + `</td>
        //                         <td>` + item.isu + `</td>
        //                         <td>` + item.ulasan_teknical + `</td>
        //                         <td>` + item.cadangan_jangka_pendek + `</td>
        //                         <td>` + item.cadangan_jangka_panjang + `</td>
        //                         <td><button type="button" class="download-button" onclick="downloadDoc(` +
        //                 negeriMediaModelId + `,
        //                                 ` + negeriMediaModelTypeId + `, '` + negeriMedia + `', '` +
        //                 negeriMediaModelType + `', '` + negeriCollectionName + `'); return false;"><u>` +
        //                 negeriMedia + `</u></button></td>
        //                     </tr>
        //                     `)
        //         }

        //     })
        // }



        document.getElementById('no_rujukan_dimohon').value = bahagianDetails.no_rujukan

        $.each(bahagianDetails.media, function(key, item) {
            if (item.collection_name == 'rp_di_mohon_file') {
                $("#filePreview3").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileName3").text(item.file_name);
                $("#Uploadfile3").addClass('d-none')
                $("#fileUploaded3").removeClass('d-none')
                dimohon_file_name = item.filename


                $("#filePreview3").on('click', function() {
                    downloadDoc(item.id, item.model_id, item.file_name, item.model_type, item
                        .collection_name)
                });
            }

            if (item.collection_name == 'rp_lampiran_file') {
                $("#filePreview2").attr('src', "{{ asset('assets/pdf.jpg.png ') }}");
                $("#fileName2").text(item.file_name);
                $("#Uploadfile2").addClass('d-none')
                $("#fileUploaded2").removeClass('d-none')
                lampiran_file_name = item.filename

                $("#filePreview2").on('click', function() {
                    downloadDoc(item.id, item.model_id, item.file_name, item.model_type, item
                        .collection_name)
                });
            }
        })



        if (bahagianDetails.is_dimohon == 1) {
            document.getElementById('rp_is_dimohon_yes').checked = true
            $(".dimohon_imej").removeClass('d-none');
            document.getElementById("no_rujukan_dimohon").required = true
            document.getElementById("dimohon_imej_file").required = true
        } else {
            document.getElementById('rp_is_dimohon_no').checked = true
        }

    }



    document.getElementById('rp_hantarBtnBahagian').innerText = 'Maklum Balas Kepada BKOR'
    // Create a new button element
    var newButton = document.createElement('button');

    // Set the button attributes
    newButton.setAttribute('type', 'button');
    newButton.setAttribute('class', 'mr-1 mb-2 col-md-2 rp_kembaliBtnBahagian');
    newButton.setAttribute('id', 'rp_kembaliBtnBahagian');
    newButton.setAttribute('disabled', 'true');
    newButton.style.opacity = '0.4';
    if (bahagianDetails.is_first == '1') {
        newButton.innerText = 'Kemuka Kepada Negeri';
    } else {
        newButton.innerText = 'Kembali Kepada Negeri';
    }


    // Append the new button to the inner div of submitBahagian
    var submitBahagianDiv = document.getElementById('submitBahagian');
    var innerDiv = submitBahagianDiv.querySelector('.d-flex.flex-wrap');
    var firstElement = innerDiv.firstChild;
    innerDiv.insertBefore(newButton, firstElement);

    $(".rp_kembaliBtnBahagian").click(function() {
        if (bahagianDetails.is_first == '1') {
            submitBahagian('Negeri', 'Bahagian');
        } else {
            document.getElementById("ulasan_bahagian").value = ''
            $('#exampleModalToggle').modal('show');
        }

    })

}

function downloadDoc(model_id, model_type_id, filename, modelType, collection_name) {

    const api_url = "{{env('API_URL')}}";
    var api_token = "Bearer " + window.localStorage.getItem('token');

    parameters = {
        model_id: model_id,
        mode_type_id: model_type_id,
        model_type: modelType,
        collection_name: collection_name
    }
    axios({
        url: api_url + "api/media/download",
        method: 'GET',
        headers: {
            "Authorization": api_token,
        },
        params: parameters,
        responseType: 'blob', // important
    }).
    then((response) => {
        console.log(response.data.type);
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
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(url);
    });

}

function handleCheckboxChange(checkbox) {
    if (checkbox.checked) {
        document.getElementById("rp_kembaliBtnBahagian").disabled = false;
        document.getElementById("rp_kembaliBtnBahagian").style.opacity = '1.0';
        document.getElementById("rp_hantarBtnBahagian").disabled = true;
        document.getElementById("rp_hantarBtnBahagian").style.opacity = '0.4';
        // Call your function here
    } else {
        document.getElementById("rp_hantarBtnBahagian").disabled = false;
        document.getElementById("rp_hantarBtnBahagian").style.opacity = '1.0';
        document.getElementById("rp_kembaliBtnBahagian").disabled = true;
        document.getElementById("rp_kembaliBtnBahagian").style.opacity = '0.4';
    }
}

$('#rp_pop_btn').mouseover(function() {
    $('#rp_pop_content').removeClass('d-none');
});
$('#rp_pop_btn').mouseout(function() {
    $('#rp_pop_content').addClass('d-none');
});

function disable_all(rp_project) {
    // Get all input fields and buttons on the page
    const allInputsAndButtons = document.querySelectorAll('textarea, input, select, button');

    // Disable each input field and button
    allInputsAndButtons.forEach(element => {
        element.disabled = true;
    });


    allRemoveButtons = document.querySelectorAll("[id^='removeButiran']")
    allRemoveButtons.forEach(element => {
        console.log(element);
        element.disabled = true;
    });

    current_user_type = "{{ Auth::user()->user_type_id }}"
    document.querySelector('#submitBKOR').style.display = 'none'
    document.querySelector('#submitBahagian').style.display = 'none'
    document.querySelector('#submitNegeri').style.display = 'none'

    if(rp_project.workflow == 'Bahagian' && current_user_type == 4) {

    }

    if(rp_project.workflow != 'Negeri' && current_user_type == 1) {

        enable_negeri_button = false

        $.each(rp_project.bahagians, function(key, item) {
            if(item.status == 'Negeri') {
                enable_negeri_button = true
                if(enable_negeri_button) {
                    document.querySelector('#bkor_div_2').style.display = 'none'
                    document.getElementById("rp_simpanBtnNegeri").disabled = false;
                    document.getElementById("rp_hantarBtnNegeri").disabled = false;
                }
            }
        })


        
        
        
        
    }


}



$('#hoverTest2').hover(function() {
    $('#customTooltip2').removeClass('hideme2');
}, function() {
    $('#customTooltip2').addClass('hideme2');
});
</script>