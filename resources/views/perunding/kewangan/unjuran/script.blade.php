<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    unjuranCounter = 0
    rekordCounter = 0
    jadual_asal = []
    jadual_sebenar = []
    jadual_dipindah = []
    yaxis = []

    

    $(".simpanUnjuran").click(function() {
        simpanUnjuran()
    })
    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');

    axios.defaults.headers.common["Authorization"] = api_token

    axios({
            method: 'get',
            url: api_url + "api/perunding/kewangan/unjuran/list",
            responseType: 'json',
            params: {
                pemantauan_id: "{{ $project_id }}",
                perolehan_id: "{{ $perolehan_id }}",
            }
        })
        .then(async function(response) {
            if (response.data.code == 200) {
                console.log(response.data.data);

                $(".unjuran_btn").click(function() {
                unjuranCounter += 1
                let unjuranTbody = `<tr class=" Table_perunding_body unjuranmainrow">
                                    <input class="form-control Table_perunding_body" type="hidden" value="" id="id"/>
                                    <input class="form-control Table_perunding_body" type="hidden" value="` + response.data.data.pemantuan
                                    .kos_projeck + `" id="kos_projek"/>
                                    <td readonly>` + unjuranCounter + `</td>
                                    <td>
                                        <input class="form-control Table_perunding_body" type="number" id="tahun"/>
                                    </td>
                                    <td>
                                        <input class="form-control Table_perunding_body" type="number" id="bulan"/>
                                    </td>
                                    <td>
                                        <input class="form-control Table_perunding_body unjuran" type="text" id="unjuran"/>
                                    </td>
                                    <td>
                                        <input class="form-control Table_perunding_body" type="text" id="jumlahUnjuran" readonly/>
                                    </td>
                                    <td>
                                        <input class="form-control Table_perunding_body" type="text" id="prestasiJadual" readonly/>
                                    </td>
                                    
                                </tr>`
                $('#unjuranTbody').append(unjuranTbody);

                let all_unjuran_input = document.querySelectorAll('.unjuran');

                all_unjuran_input.forEach((btn, i) => {

                    // Remove the event listener
                    btn.removeEventListener('change', handleChangeUnjuran);
                    btn.addEventListener('change', handleChangeUnjuran);
                });
            })
                await loadUnjuran(response.data.data.unjuran, response.data.data.pemantuan)
                await loadRekordBayaran(response.data.data.rekord_bayaran, response.data.data.pemantuan)

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
                                text: '', // Replace with your desired title
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
                // const lineChart = new Chart(ctx, options);
            }
        })
})

function getMonthName(monthNumber) {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
        "October", "November", "December"
    ];

    if (monthNumber >= 1 && monthNumber <= 12) {
        return monthNames[monthNumber - 1];
    } else {
        return "Invalid Month";
    }
}

function loadRekordBayaran(data, pemantauan_data) {
    jumlah_rekord = 0.00
    data.forEach(rekord => {
        rekordCounter += 1

        jumlah_rekord = rekord.jumlah_bayaran ? (parseFloat(rekord.jumlah_bayaran) + parseFloat(
            jumlah_rekord)) : (
            0 + parseFloat(jumlah_rekord))
        prestasi_sebenar = ((parseFloat(jumlah_rekord) / parseFloat(pemantauan_data.kos_projeck)) * 100)
            .toFixed(2)

        console.log(rekord.created_at);

        const dateString = rekord.created_at;
        const date = new Date(dateString);
        const year = date.getFullYear();
        const month = date.getMonth() + 1;

        tahun = year
        bulan = month
        bayaran_rekord = rekord.jumlah_bayaran ? parseFloat(rekord.jumlah_bayaran) : 0

        jadual_sebenar.push(prestasi_sebenar)

        let rekordTbody = `<tr class=" Table_perunding_body rekordmainrow">
                            <td readonly>` + rekordCounter + `</td>
                            <td>
                                <input class="form-control Table_perunding_body" type="number" id="tahun" value="` +
            tahun + `" readonly/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body" type="number" id="bulan" value="` +
            bulan +
            `" readonly/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body unjuran" type="text" id="unjuran" value="` +
            bayaran_rekord +
            `" readonly/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body" type="text" id="jumlahUnjuran"  value="` +
            jumlah_rekord +
            `"readonly/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body" type="text" id="prestasiJadual"  value="` +
            prestasi_sebenar + `" readonly/>
                            </td>
                            
                        </tr>`
        $('#rekordTbody').append(rekordTbody);
    })
}

function loadUnjuran(data, pemantauan_data) {

    data.forEach(unjuran => {
        unjuranCounter += 1
        console.log(unjuran);
        id = unjuran.id
        jumlah_unjuran = unjuran.jumlah_unjuran ? unjuran.jumlah_unjuran : 0
        prestasi_jadual = unjuran.prestasi_jadual ? unjuran.prestasi_jadual : 0
        tahun = unjuran.tahun ? unjuran.tahun : null
        bulan = unjuran.bulan ? unjuran.bulan : null
        unjuran = unjuran.unjuran ? unjuran.unjuran : 0

        const monthName = getMonthName(bulan);
        yaxis.push(monthName + ' ' + tahun)
        jadual_asal.push(prestasi_jadual)
        let unjuranTbody = `<tr class=" Table_perunding_body unjuranmainrow">
                            <input class="form-control Table_perunding_body" type="hidden" value="` + id + `" id="id"/>
                            <input class="form-control Table_perunding_body" type="hidden" value="` + pemantauan_data
            .kos_projeck + `" id="kos_projek"/>
                            <td readonly>` + unjuranCounter + `</td>
                            <td>
                                <input class="form-control Table_perunding_body" type="number" id="tahun" value="` +
            tahun + `"/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body" type="number" id="bulan" value="` +
            bulan +
            `"/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body unjuran" type="text" id="unjuran" value="` +
            unjuran +
            `"/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body" type="text" id="jumlahUnjuran"  value="` +
            jumlah_unjuran +
            `"readonly/>
                            </td>
                            <td>
                                <input class="form-control Table_perunding_body" type="text" id="prestasiJadual"  value="` +
            prestasi_jadual + `" readonly/>
                            </td>
                            
                        </tr>`
        $('#unjuranTbody').append(unjuranTbody);

        let all_unjuran_input = document.querySelectorAll('.unjuran');

        all_unjuran_input.forEach((btn, i) => {

            // Remove the event listener
            btn.removeEventListener('change', handleChangeUnjuran);
            btn.addEventListener('change', handleChangeUnjuran);
        });
    })
}

function handleChangeUnjuran(event) {
    console.log('cahne');
    let all_unjuranMain_tr = document.querySelectorAll(
        ".unjuranmainrow"
    );
    jumlah_unjuran = 0
    all_unjuranMain_tr.forEach((tr) => {
        unjuran = tr.querySelector('input[type="text"]#unjuran').value ? tr
            .querySelector('input[type="text"]#unjuran').value : 0
        jumlah_unjuran = parseFloat(jumlah_unjuran) + parseFloat(unjuran)

        kos_projek = tr.querySelector('input[type="hidden"]#kos_projek').value ? tr
            .querySelector('input[type="hidden"]#kos_projek').value : 0

        prestasi_jadual = ((parseFloat(jumlah_unjuran) / parseFloat(kos_projek)) * 100).toFixed(2)
        tr.querySelector('input[type="text"]#jumlahUnjuran').value = jumlah_unjuran
        tr.querySelector('input[type="text"]#prestasiJadual').value = prestasi_jadual
    })
}

function simpanUnjuran() {
    console.log('simpan Unjuran');

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    let all_unjuranMain_tr = document.querySelectorAll(
        ".unjuranmainrow"
    );


    if(all_unjuranMain_tr.length < rekordCounter ) {
        alert('unjuran kena sama atau lebih dari rekord bayaran')
        $("div.spanner").removeClass("show");
        $("div.overlay").removeClass("show");
        return
    }
    unjuranDetails = []

    all_unjuranMain_tr.forEach((tr) => {

        unjuranData = {
            "id": tr.querySelector('input[type="hidden"]#id').value ? tr
                .querySelector('input[type="hidden"]#id').value : null,
            "tahun": tr.querySelector('input[type="number"]#tahun').value ? tr
                .querySelector('input[type="number"]#tahun').value : null,
            "bulan": tr.querySelector('input[type="number"]#bulan').value ? tr
                .querySelector('input[type="number"]#bulan').value : null,
            "unjuran": tr.querySelector('input[type="text"]#unjuran').value ? tr
                .querySelector('input[type="text"]#unjuran').value : null,
            "jumlahUnjuran": tr.querySelector('input[type="text"]#jumlahUnjuran').value ? tr
                .querySelector('input[type="text"]#jumlahUnjuran').value : null,
            "prestasiJadual": tr.querySelector('input[type="text"]#prestasiJadual').value ? tr
                .querySelector('input[type="text"]#prestasiJadual').value : null,
        }
        console.log(unjuranData);
        unjuranDetails.push(JSON.stringify(unjuranData))
    })

    var formData = new FormData();

    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token');


    formData.append('user_id', "{{ Auth::user()->id }}")
    formData.append('perolehan_id', "{{$perolehan_id}}")
    formData.append('pemantauan_id', "{{$project_id}}")

    unjuranDetails.forEach((item) => {
        formData.append('unjuranDetails[]', item);
    });


    axios.defaults.headers.common["Authorization"] = api_token

    axios({
            method: 'post',
            url: api_url + "api/perunding/kewangan/unjuran/store",
            responseType: 'json',
            data: formData
        })
        .then(function(response) {
            if (response.data.code == 200) {
                // location.reload();
                $("#add_role_sucess_modal").modal('show');
                $("#tutup").click(function() {
                    location.reload();
                })
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
</script>