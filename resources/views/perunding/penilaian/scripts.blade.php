<script>
lemahJumlah = 0
sederhanaJumlah = 0
baikJumlah = 0
sangatBaikJumlah = 0
totalJumlah = 0
$(document).ready(function() {
    $('#hoverTest').mouseover(function () {
        $('#customTooltip').removeClass('d-none');      
    });
    $('#hoverTest').mouseout(function () {
        $('#customTooltip').addClass('d-none');      
    });

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    loadAllPenilaian()
    loadSejarahPenilaian()
    loadLatestPenilaianSejarah()
    deliverables = []
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');
    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/lookup/DeliverableHeading/list",
            responseType: 'json',
        })
        .then(function(response) {
            var select = document.getElementById("penilaianDeliverable");
            $.each(response.data.data, function(key, item) {

                var newOption = document.createElement("option");
                // Set the value and text of the option
                newOption.value = '';
                newOption.text = item.nama;
                newOption.disabled = true
                select.appendChild(newOption);
                
                $.each(item.deliverables, function(key1, item1) { 

                    var newOption = document.createElement("option");
                    newOption.value = item1.code;
                    newOption.text = item1.nama;

                    if(item1.nama == 'Bayaran Akhir') {
                        newOption.text = 'Penilaian Akhir'
                    }
                    newOption.disabled = false
                    select.appendChild(newOption);
                    
                })

                // json_value = JSON.parse(item.json_value)
                // // Create a new option element
                // var newOption = document.createElement("option");

                // // Set the value and text of the option
                // newOption.value = item.code;
                // newOption.text = item.value;

                // if (json_value.is_heading == 1) {
                //     newOption.disabled = true
                // }

                // // Append the option to the select element
                // select.appendChild(newOption);
            });
            loadPenilaian('');
        })

    var SkopPerkhidmatanCheckboxes = document.querySelectorAll('#SkopPerkhidmatan input[type="checkbox"]');
    SkopPerkhidmatanCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            SkopPerkhidmatanCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var JadualPelaksanaanCheckboxes = document.querySelectorAll('#JadualPelaksanaan input[type="checkbox"]');
    JadualPelaksanaanCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            JadualPelaksanaanCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var PengurusanSumberCheckboxes = document.querySelectorAll('#PengurusanSumber input[type="checkbox"]');
    PengurusanSumberCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            PengurusanSumberCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var KeupayaanTeknikalCheckboxes = document.querySelectorAll('#KeupayaanTeknikal input[type="checkbox"]');
    KeupayaanTeknikalCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            KeupayaanTeknikalCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var KualitiKerjaCheckboxes = document.querySelectorAll('#KualitiKerja input[type="checkbox"]');
    KualitiKerjaCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            KualitiKerjaCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var KerjasamaCheckboxes = document.querySelectorAll('#Kerjasama input[type="checkbox"]');
    KerjasamaCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            KerjasamaCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var PeruntukanDiluluskanCheckboxes = document.querySelectorAll(
        '#PeruntukanDiluluskan input[type="checkbox"]');
    PeruntukanDiluluskanCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            PeruntukanDiluluskanCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    var PengawasanCheckboxes = document.querySelectorAll('#Pengawasan input[type="checkbox"]');
    PengawasanCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            PengawasanCheckboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });

    // var radio1 = document.getElementById('flexRadioDefault1');
    // var radio2 = document.getElementById('flexRadioDefault2');
    // var textarea = document.getElementById('catatan');


    // radio1.addEventListener('click', function() {
    //     textarea.style.display = 'block';
    // });

    // radio2.addEventListener('click', function() {
    //     document.getElementById('catatan').value = ''
    //     textarea.style.display = 'none';
    // });

    handleCheckboxChange('JadualPelaksanaan');
    handleCheckboxChange('SkopPerkhidmatan');
    handleCheckboxChange('PengurusanSumber');
    handleCheckboxChange('KeupayaanTeknikal');
    handleCheckboxChange('KualitiKerja');
    handleCheckboxChange('Kerjasama');
    handleCheckboxChange('PeruntukanDiluluskan');
    handleCheckboxChange('Pengawasan');

    $(".simpanPenilaian").click(function() {
        simpanPenilaian()
    })

    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
});


function handleCheckboxTidakChange(checkbox)
{
    // Get the closest <tr> element to the checkbox
    const tr = checkbox.closest('tr');

    // Check if the "tidak_checkbox" is checked
    if (checkbox.checked) {
        // If checked, disable all <input> elements within the <tr>
        const inputs = tr.querySelectorAll('input:not(.tidak_checkbox)');
        inputs.forEach(input => {
            input.disabled = true;
        });
    } else {
        // If unchecked, enable all <input> elements within the <tr>
        const inputs = tr.querySelectorAll('input');
        inputs.forEach(input => {
            input.disabled = false;
        });
    }

    tr.querySelectorAll('tidak_checkbox').disabled = false
}
function calculateJumlah() {
    lemahJumlah = 0
    sederhanaJumlah = 0
    baikJumlah = 0
    sangatBaikJumlah = 0
    addJumlah(getCheckedValues('JadualPelaksanaan'))
    addJumlah(getCheckedValues('SkopPerkhidmatan'))
    addJumlah(getCheckedValues('PengurusanSumber'))
    addJumlah(getCheckedValues('KeupayaanTeknikal'))
    addJumlah(getCheckedValues('KualitiKerja'))
    addJumlah(getCheckedValues('Kerjasama'))
    addJumlah(getCheckedValues('PeruntukanDiluluskan'))
    addJumlah(getCheckedValues('Pengawasan'))

    totalJumlah = lemahJumlah + sederhanaJumlah + baikJumlah + sangatBaikJumlah

    document.getElementById('jumlahLemah').value = lemahJumlah
    document.getElementById('jumlahSederhana').value = sederhanaJumlah
    document.getElementById('jumlahBaik').value = baikJumlah
    document.getElementById('jumlahSangatBaik').value = sangatBaikJumlah
    document.getElementById('jumlahKeseluruhan').value = totalJumlah


    document.getElementById('jumlahLemah').innerHTML = lemahJumlah
    document.getElementById('jumlahSederhana').innerHTML = sederhanaJumlah
    document.getElementById('jumlahBaik').innerHTML = baikJumlah
    document.getElementById('jumlahSangatBaik').innerHTML = sangatBaikJumlah
    document.getElementById('jumlahKeseluruhan').innerHTML = totalJumlah

    jumlahPercent = (totalJumlah / 24) * 100
    switch (true) {
        case (jumlahPercent <= 60):
            document.getElementById('penilaianKeseluruhan').value = 'Lemah'
            document.getElementById('penilaianKeseluruhan').innerHTML = 'Lemah'
            break;

        case (jumlahPercent >= 61 && jumlahPercent <= 75):
            document.getElementById('penilaianKeseluruhan').value = 'Sederhana'
            document.getElementById('penilaianKeseluruhan').innerHTML = 'Sederhana'
            break;

        case (jumlahPercent >= 76 && jumlahPercent <= 90):
            document.getElementById('penilaianKeseluruhan').value = 'Baik'
            document.getElementById('penilaianKeseluruhan').innerHTML = 'Baik'
            break;

        case (jumlahPercent >= 91):
            document.getElementById('penilaianKeseluruhan').value = 'Sangat Baik'
            document.getElementById('penilaianKeseluruhan').innerHTML = 'Sangat Baik'
            break;
        default:
            break;
    }
}

function handleCheckboxChange(trId) {
    var checkboxes = document.querySelectorAll('#' + trId + ' input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // var checkedValues = Array.from(checkboxes)
            //     .filter(function(checkbox) {
            //         return checkbox.checked;
            //     })
            //     .map(function(checkbox) {
            //         return checkbox.value;
            //     });
            calculateJumlah()
            // console.log(trId + ' checked values:', checkedValues);
        });
    });
}


function getCheckedValues(trId) {
    var checkboxes = document.querySelectorAll('#' + trId + ' input[type="checkbox"]:checked');
    var values = Array.from(checkboxes).map(function(checkbox) {
        return checkbox.value;
    });
    return values;
}

function addJumlah(radioValue) {
    switch (parseInt(radioValue[0])) {
        case 0:
            lemahJumlah = parseInt(radioValue[0]) + lemahJumlah
            break;

        case 1:
            sederhanaJumlah = parseInt(radioValue[0]) + sederhanaJumlah
            break;
        case 2:
            baikJumlah = parseInt(radioValue[0]) + baikJumlah
            break;
        case 3:
            sangatBaikJumlah = parseInt(radioValue[0]) + sangatBaikJumlah
            break;
        default:
            break;
    }

}

function simpanPenilaian() {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    calculateJumlah()
    var formData = new FormData();
    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');
    axios.defaults.headers.common["Authorization"] = api_token

    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('perolehan_id', "{{$perolehan_id}}")
    formData.append('pemantauan_id', "{{$project_id}}")

    formData.append('deliverable', document.getElementById('penilaianDeliverable').value)

    formData.append('JadualPelaksanaan', getCheckedValues('JadualPelaksanaan'))
    formData.append('SkopPerkhidmatan', getCheckedValues('SkopPerkhidmatan'))
    formData.append('PengurusanSumber', getCheckedValues('PengurusanSumber'))
    formData.append('KeupayaanTeknikal', getCheckedValues('KeupayaanTeknikal'))
    formData.append('KualitiKerja', getCheckedValues('KualitiKerja'))
    formData.append('Kerjasama', getCheckedValues('Kerjasama'))
    formData.append('PeruntukanDiluluskan', getCheckedValues('PeruntukanDiluluskan'))
    formData.append('Pengawasan', getCheckedValues('Pengawasan'))

    

    const tidakCheckbox = document.getElementById('tidak_checkbox');

    // Check if the "tidak_checkbox" is checked
    if (tidakCheckbox.checked) {
        // If checked, append it as "true"
        formData.append('tidak_checkbox', 1);
    } else {
        // If not checked, append it as "false"
        formData.append('tidak_checkbox', 0);
    }

    formData.append('lemahJumlah', lemahJumlah)
    formData.append('sederhanaJumlah', sederhanaJumlah)
    formData.append('baikJumlah', baikJumlah)
    formData.append('sangatBaikJumlah', sangatBaikJumlah)

    formData.append('totalJumlah', totalJumlah)
    formData.append('penilaianKeseluruhan', document.getElementById('penilaianKeseluruhan').value)


    var ele = document.getElementsByName('flexRadioDefault');

    for (i = 0; i < ele.length; i++) {
        console.log(ele[i].value);
        if (ele[i].checked) {
            console.log('cheked');
            formData.append('disyorkan', ele[i].value)
        }
    }

    formData.append('catatan', document.getElementById('catatan').value)


    axios({
            method: 'post',
            url: api_url + "api/perunding/penilaian",
            responseType: 'json',
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                location.reload();
                //   $("#add_role_sucess_modal").modal('show');
                //   $("#tutup_new").click(function(){
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

function loadAllPenilaian() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');
    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/perunding/penilaian",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}"
            }
        })
        .then(function(response) {
            console.log('penilaian');
            console.log(response.data);
            penilaianCounter = 0
            response.data.data.forEach(penilaian => {
                penilaianCounter += 1
                percent = (penilaian.total_jumlah / 24) * 100
                let penilaianTbody = `<tr class="perunding_tableContent">
                                                <td>` + penilaianCounter + `</td>
                                                <td>` + penilaian.deliverables.nama + `</td>
                                                <td>` + penilaian.tarikh_penilaian + `</td>
                                                <td>` + Math.round(percent) + `</td>
                                                <td>` + penilaian.penilaian_keseluruhan + `</td>

                                            </tr>`
                $('#penilaianTbody').append(penilaianTbody);
            })
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
}

function loadPenilaian(deliverable) {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token');
    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/perunding/penilaian_details",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
                deliverable: deliverable
            }
        })
        .then(function(response) {
            penilaianData = response.data.data
            console.log(penilaianData);
            // Get all the checkboxes using querySelectorAll
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            
            // Loop through each checkbox and set the checked property to false
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
            
            var select = document.getElementById('penilaianDeliverable');
            var options = select.options;

            // Iterate over the options
            
            if(penilaianData) {
                for (var i = 0; i < options.length; i++) {
                    var option = options[i];

                    // Check if the option value matches 'test'
                    if (option.value === penilaianData.deliverable) {
                        // Set the option as selected
                        option.selected = true;
                    }
                }

                var JadualPelaksanaanCheckbox = document.getElementById('JadualPelaksanaanTd' + penilaianData
                    .jadual_pelaksanaan);
                var SkopPerkhidmatanCheckbox = document.getElementById('SkopPerkhidmatanTd' + penilaianData
                    .skop_perkhidmatan);
                var PengurusanSumberCheckbox = document.getElementById('PengurusanSumberTd' + penilaianData
                    .pengurusan_sumber);
                var KeupayaanTeknikalCheckbox = document.getElementById('KeupayaanTeknikalTd' + penilaianData
                    .keupayaan_teknikal);
                var KualitiKerjaCheckbox = document.getElementById('KualitiKerjaTd' + penilaianData.kualiti_kerja);
                var KerjasamaCheckbox = document.getElementById('KerjasamaTd' + penilaianData.kerjasama);
                var PeruntukanDiluluskanCheckbox = document.getElementById('PeruntukanDiluluskanTd' + penilaianData
                    .peruntukan_diluluskan);
                var PengawasanCheckbox = document.getElementById('PengawasanTd' + penilaianData.pengawasan);

                if (JadualPelaksanaanCheckbox) {
                    JadualPelaksanaanCheckbox.checked = true;
                }

                if (SkopPerkhidmatanCheckbox) {
                    SkopPerkhidmatanCheckbox.checked = true;
                }

                if (PengurusanSumberCheckbox) {
                    PengurusanSumberCheckbox.checked = true;
                }

                if (KeupayaanTeknikalCheckbox) {
                    KeupayaanTeknikalCheckbox.checked = true;
                }

                if (KualitiKerjaCheckbox) {
                    KualitiKerjaCheckbox.checked = true;
                }

                if (KerjasamaCheckbox) {
                    KerjasamaCheckbox.checked = true;
                }

                if (PeruntukanDiluluskanCheckbox) {
                    PeruntukanDiluluskanCheckbox.checked = true;
                }

                if (PengawasanCheckbox) {
                    PengawasanCheckbox.checked = true;
                }

                document.getElementById('jumlahLemah').value = penilaianData.lemah_jumlah
                document.getElementById('jumlahSederhana').value = penilaianData.sederhana_jumlah
                document.getElementById('jumlahBaik').value = penilaianData.baik_jumlah
                document.getElementById('jumlahSangatBaik').value = penilaianData.sangat_baik_jumlah

                document.getElementById('jumlahKeseluruhan').value = penilaianData.total_jumlah
                document.getElementById('penilaianKeseluruhan').value = penilaianData.penilaian_keseluruhan

                document.getElementById('jumlahLemah').innerHTML = penilaianData.lemah_jumlah
                document.getElementById('jumlahSederhana').innerHTML = penilaianData.sederhana_jumlah
                document.getElementById('jumlahBaik').innerHTML = penilaianData.baik_jumlah
                document.getElementById('jumlahSangatBaik').innerHTML = penilaianData.sangat_baik_jumlah

                document.getElementById('jumlahKeseluruhan').innerHTML = penilaianData.total_jumlah
                document.getElementById('penilaianKeseluruhan').innerHTML = penilaianData.penilaian_keseluruhan
                document.getElementById('catatan').value = penilaianData.catatan

                if (penilaianData.is_disyorkan == 1) {
                    radioButton = document.getElementById('flexRadioDefault1');
                    radioButton.checked = true;
                } else {
                    radioButton = document.getElementById('flexRadioDefault2');
                    radioButton.checked = true;
                }

                if (penilaianData.is_pengawasan == 1) {
                    // Get the table row element by its ID
                    const pengawasanRow = document.getElementById('Pengawasan');

                    // Get all input elements within the table row
                    const inputElements = pengawasanRow.querySelectorAll('input');

                    // Iterate through each input element
                    inputElements.forEach((input) => {
                        // Check if the input element is the "tidak_checkbox"
                        if (input.id !== 'tidak_checkbox') {
                            // If it's not the "tidak_checkbox," disable it
                            input.disabled = true;
                        }

                        if(input.id == 'tidak_checkbox') {
                            input.checked = true;
                        }
                    });
                } else {
                    checkboxButton = document.getElementById('tidak_checkbox');
                    checkboxButton.checked = false;
                }
            }else {
                document.getElementById('jumlahLemah').value = 0
                document.getElementById('jumlahSederhana').value = 0
                document.getElementById('jumlahBaik').value = 0
                document.getElementById('jumlahSangatBaik').value = 0

                document.getElementById('jumlahKeseluruhan').value = 0
                document.getElementById('penilaianKeseluruhan').value = ''

                document.getElementById('jumlahLemah').innerHTML = 0
                document.getElementById('jumlahSederhana').innerHTML = 0
                document.getElementById('jumlahBaik').innerHTML = 0
                document.getElementById('jumlahSangatBaik').innerHTML = 0

                document.getElementById('jumlahKeseluruhan').innerHTML = 0
                document.getElementById('penilaianKeseluruhan').innerHTML = ''
                document.getElementById('catatan').value = ''
                radioButton = document.getElementById('flexRadioDefault1');
                radioButton.checked = true;
            }
            
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
}


function loadLatestPenilaianSejarah() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/penilaian_sejarah/latest",
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

function loadSejarahPenilaian() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + window.localStorage.getItem('token')
    axios({
            method: 'get',
            url: "{{ env('API_URL') }}" + "api/perunding/penilaian_sejarah/list",
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
</script>