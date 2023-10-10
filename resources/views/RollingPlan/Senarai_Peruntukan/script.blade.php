<script>
$("#pemberat_greenBtn").click(function() {
    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token')

    axios.defaults.headers.common["Authorization"] = api_token

    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let data = {}
    data['query_tajuk'] = null
    data['query_jenis'] = null
    data['query_negeri'] = null
    data['query_tahun'] = null
    data['query_bahagian'] = null
    data['query_status'] = 'RUMUSAN PERMOHONAN'
    data['user_id'] = "{{Auth::user()->id}}"

    axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/rp/project_filter_list",
            responseType: 'json',
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": api_token,
            },
            params: data
        })
        .then(function(response) {
            if (response.data.code == 200) {
                var table = $('#master_data').DataTable();
                table.clear().rows.add(response.data.data).draw();

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

            } else {

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }

        })
        .catch(function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
})



function printDataTable() {
    // Clone the DataTable and remove any interactive elements
    var printableTable = $('#master_data').clone();

    // Apply print-specific CSS styles
    printableTable.addClass('printable-table');

    // Open the print dialog
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Printable DataTable</title></head><body>');
    printWindow.document.write('<style>@media print {.printable-table { /* your print styles here */ }}</style>');
    printWindow.document.write(printableTable[0].outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    printWindow.close();

    // window.print();
}

function loadflow(data) {
    var base_url = window.location.origin;
    var url = "{{ route('rp_bkor.edit',[ ':id']) }}"
    url = url.replace(":id", data)
    console.log(url)
    window.location.href = url
}

function loadQueryDatas(response) {

    //load negeri options
    query_negeri_dropdown = document.getElementById('query_negeri')
    response.negeri.forEach((negeri) => {
        var el = document.createElement("option");
        el.textContent = negeri.nama_negeri;
        el.value = negeri.id;
        query_negeri_dropdown.appendChild(el);
    })

    //load bahagians options
    query_bahagian_dropdown = document.getElementById('query_bahagian')
    response.bahagian.forEach((bahagian) => {
        var el = document.createElement("option");
        el.textContent = bahagian.nama_bahagian;
        el.value = bahagian.id;
        query_bahagian_dropdown.appendChild(el);
    })

    //load jenis options
    query_jenis_dropdown = document.getElementById('query_jenis')
    response.jenis_permohonan.forEach((jenis) => {
        var el = document.createElement("option");
        el.textContent = jenis;
        el.value = jenis;
        query_jenis_dropdown.appendChild(el);
    })

    //load kod projek options
    query_tahun = document.getElementById('query_tahun')
    response.tahun.forEach((kod) => {
        var el = document.createElement("option");
        el.textContent = kod;
        el.value = kod;
        query_tahun.appendChild(el);
    })

    //load nama perunding options
    query_status_dropdown = document.getElementById('query_status')
    response.status.forEach((status) => {
        var el = document.createElement("option");
        el.textContent = status;
        el.value = status;
        query_status_dropdown.appendChild(el);
    })

}

$(document).ready(function() {
    const api_url = "{{ env('API_URL') }}"
    const api_token = "Bearer " + window.localStorage.getItem('token')

    axios.defaults.headers.common["Authorization"] = api_token




    let user_bahagian = "{{Auth::user()->bahagian->acym}}"

    if (user_bahagian != 'BKOR') {
        document.getElementById('pemberat_greenBtn').style.display = 'none'
    }
    url = "{{ env('API_URL') }}" + "api/rp/bkor"
    axios({
            method: 'get',
            url: url,
            params: {
                user_id: "{{ Auth::user()->id }}"
            },
            responseType: 'json'
        })
        .then(function(response) {
            console.log(response.data.data);
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

            loadQueryDatas(response.data.data)
            var jps_table = $('#master_data').DataTable({
                data: response.data.data.rpPermohonan,

                pagingType: 'full_numbers',
                "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada apa-apa ditemui - maaf",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "search": "_INPUT_",
                    "searchPlaceholder": " Carian",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Seterusnya",
                        "previous": "Sebelum"
                    },
                },
                columnDefs: [{
                        targets: 0, // BIL
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = meta.row + 1;
                            }
                            return data;
                        }
                    },
                    {
                        targets: 1, // tahun permohonan
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                const today = new Date(row.tarikh_permohonan);
                                // const yyyy = today.getFullYear();
                                // data = yyyy

                                data = '<div class="d-flex align-items-center">' +
                                    '<p style="cursor:pointer" onClick="loadflow(\'' + row
                                    .id + '\')">' + today.getFullYear(); + '</p>' +
                                '</div>'
                            }
                            return data;
                        }
                    },
                    {
                        targets: 2, // tajuk permohonan
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = '<div class="d-flex align-items-center">' +
                                    '<p style="cursor:pointer" onClick="loadflow(\'' + row
                                    .id + '\')">' + row.tajuk.toUpperCase() + '</p>' +
                                    '</div>'
                            }
                            return data;
                        }
                    },
                    {
                        targets: 3, // jenis permohonan
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                if (row.butirans.length > 0) {
                                    data = row.butirans[0].jenis_permohonan
                                } else {
                                    data = ''
                                }

                            }
                            return data;
                        }
                    },
                    {
                        targets: 4, // tarikh permohonan
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            // console.log(row.bahagian.nama_bahagian)
                            if (type === 'display') {
                                const today = new Date(row.tarikh_permohonan);
                                const yyyy = today.getFullYear();
                                let mm = today.getMonth() + 1; // Months start at 0!
                                let dd = today.getDate();

                                if (dd < 10) dd = '0' + dd;
                                if (mm < 10) mm = '0' + mm;

                                const formattedToday = dd + '-' + mm + '-' + yyyy;
                                data = formattedToday
                            }
                            return data;
                        }
                    },
                    {
                        targets: 5, // bahagian
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = '';
                                for (i = 0; i < row.bahagians.length; i++) {
                                    data = data + ',' + row.bahagians[i].bahagian
                                        .nama_bahagian
                                }
                                // data = row.bahagians[0].bahagian.nama_bahagian
                            }
                            return data;
                        }
                    },
                    {
                        targets: 6, // negeri
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                if (row.negeris) {
                                    data = row.negeris.negeri.nama_negeri
                                } else {
                                    data = ''
                                }
                            }
                            return data;
                        }
                    },
                    {
                        targets: 7, // KOS
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = row.kos
                            }
                            return data;
                        }
                    },
                    {
                        targets: 8, // Status
                        "searchable": true,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = row.status
                            }
                            return data;
                        }
                    },

                ],
                columns: [{
                        data: 'id',
                        "searchable": true
                    },
                    {
                        data: 'id',
                        "searchable": true
                    },
                    {
                        data: 'tajuk',
                        "searchable": true
                    },
                    {
                        data: 'butirans[0].jenis_permohonan',
                        "searchable": true
                    },
                    {
                        data: 'tarikh_permohonan',
                        "searchable": true
                    },
                    {
                        data: 'id',
                        "searchable": true
                    },
                    {
                        data: 'negeris.negeri.nama_negeri',
                        "searchable": true
                    },
                    {
                        data: 'kos',
                        "searchable": true
                    },
                    {
                        data: 'status',
                        "searchable": true
                    },
                ],


            });
            $('input[type="search"]').addClass('searchIn');
            $(".searchIn").keypress(function() {
                $(this).removeClass().addClass("searchOut")
            })

            $(".searchIn").click(function() {
                if (!$(this).hasClass("searchOut"))
                    $(this).addClass("searchIn")
            })

            $(document).on("keyup", ".searchOut", function() {
                if (($(this).val().length) == 0)
                    $(this).removeClass().addClass("searchIn")
            })

        });

    $(".resetbtn").click(function() {
        document.getElementById("query_tajuk").value = ''
        document.getElementById("query_jenis").value = ''
        document.getElementById("query_negeri").value = ''
        document.getElementById("query_tahun").value = ''
        document.getElementById("query_bahagian").value = ''
        document.getElementById("query_status").value = ''
    })

    $(".caribtn").click(function() {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        let data = {}
        data['query_tajuk'] = document.getElementById("query_tajuk").value
        data['query_jenis'] = document.getElementById("query_jenis").value
        data['query_negeri'] = document.getElementById("query_negeri").value
        data['query_tahun'] = document.getElementById("query_tahun").value
        data['query_bahagian'] = document.getElementById("query_bahagian").value
        data['query_status'] = document.getElementById("query_status").value
        data['user_id'] = "{{Auth::user()->id}}"

        axios({
                method: 'GET',
                url: "{{ env('API_URL') }}" + "api/rp/project_filter_list",
                responseType: 'json',
                headers: {
                    "Content-Type": "multipart/form-data",
                    "Authorization": api_token,
                },
                params: data
            })
            .then(function(response) {
                if (response.data.code == 200) {
                    var table = $('#master_data').DataTable();
                    table.clear().rows.add(response.data.data).draw();

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");

                } else {

                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                }

            })
            .catch(function(error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })

    })

})
</script>