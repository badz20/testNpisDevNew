<script>
$(document).ready(function() {
    console.log('senarai jps loaded');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    var api_url = "{{env('API_URL')}}";
    var api_token = "Bearer " + window.localStorage.getItem('token');

    var jps_table;

    $(".resetbtn").click(function() {
        document.getElementById("query_nama_projek").value = ''
        document.getElementById("query_jenis").value = ''
        document.getElementById("query_kod_projek").value = ''
        document.getElementById("query_kaedah").value = ''
        document.getElementById("query_negeri").value = ''
        document.getElementById("query_nama_perunding").value = ''
        document.getElementById("query_bahagian").value = ''
        document.getElementById("query_status").value = ''
        document.getElementById("query_kementerian").value = ''
    })

    document.getElementById("query_nama_projek").value = ''
    document.getElementById("query_jenis").value = ''
    document.getElementById("query_kod_projek").value = ''
    document.getElementById("query_kaedah").value = ''
    document.getElementById("query_negeri").value = ''
    document.getElementById("query_nama_perunding").value = ''
    document.getElementById("query_bahagian").value = ''
    document.getElementById("query_status").value = ''
    document.getElementById("query_kementerian").value = ''


    $(".caribtn").click(function() {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        let data = {}
        data['query_nama_projek'] = document.getElementById("query_nama_projek").value
        data['query_jenis'] = document.getElementById("query_jenis").value
        data['query_kod_projek'] = document.getElementById("query_kod_projek").value
        data['query_kaedah'] = document.getElementById("query_kaedah").value
        data['query_negeri'] = document.getElementById("query_negeri").value
        data['query_nama_perunding'] = document.getElementById("query_nama_perunding").value
        data['query_bahagian'] = document.getElementById("query_bahagian").value
        data['query_status'] = document.getElementById("query_status").value
        data['query_kementerian'] = document.getElementById("query_kementerian").value

        axios({
            method: 'GET',
            url: "{{ env('API_URL') }}" + "api/perunding/project_filter_list",
            responseType: 'json',
            headers: {
                "Content-Type": "multipart/form-data",
                "Authorization": api_token,
            },
            params: data
        })
        .then(function(response) {
            if (response.data.code == 200) {
                console.log(response.data);
                // var table = $('#senaraiJpsTable').DataTable();
                // // Destroy the existing DataTable instance
                // table.destroy();
                // loadDatatableJps(response.data.data);

                var jps_table = $('#senaraiJpsTable').DataTable();
                jps_table.clear().rows.add(response.data.data).draw();

                // Call ajax.reload() to reload the data
                // table.ajax.reload(response.data.data, false);

                // $('#senaraiJpsTbody').on('click', 'td.dt-control', function() {
                //     var tr = $(this).closest('tr');
                //     var row = jps_table.row(tr);
                //   console.log(row);
                //     if (row.child.isShown()) {
                //         // This row is already open - close it
                //         row.child.hide();
                //         tr.removeClass('shown');
                //     } else {
                //         // Open this row
                //         // row.child(format(row.data())).show();
                //         row_data = row.data()
                //         console.log(row_data);

                //         row.child(format(row_data.perolehan)).show();
                //         tr.addClass('shown');
                //     }
                // });
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
    

    $.ajaxSetup({
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
        }
    });

    $.ajax({
        type: "GET",
        url: api_url + "api/perunding/project_list",
        dataType: "json",
        contentType: "application/json",
        header: {
            'contentType': "application/json",
            'Authorization': api_token
        },
        success: async function(response) {
          console.log(response);
            await loadDatatableJps(response.data.projects);
            await loadQueryDatas(response.data)

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

        },
        error: function(response) {
          $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            console.log(response);
        }
    });
        // Handle click events on the "View" button
    


})


/* Formatting function for row details - modify as you need */
function format(response) {
    // `d` is the original data object for the row
    console.log(response);

    table_init = `
    <div class="table_holder" style="overflow-x:auto;">
    <table class="table table-responsive" style="height: auto; width: 200%;">
                              <thead style="white-space: nowrap;">
                                
                                  <tr>
                                    <th scope="col" class="col-1"></th>
                                   
                                    <th scope="col">Nama Perolehan</th>
                                    <th scope="col" class="text-center">
                                      Nama Perunding
                                      <!-- <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button> -->
                                    </th>
                                    <th scope="col">
                                      Jenis Perolehan
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      No Dokumen Perolehan
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      Kaedah Perolehan
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      No. Pendaftaran MOF
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      Tarikh Setuju Terima
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      Tarikh Tamat Asal
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      Yuran Perunding
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col" class="text-center">
                                      EOCP
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      Kemajuan (Jadual)
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col">
                                      Kemajuan (Sebenar)
                                      <button class="sort pr-3 KON_sortingBtn">
                                        <img
                                          src="assets/images/up triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                        <img
                                          src="assets/images/down triangle.png"
                                          alt="sort"
                                          class="d-block"
                                        />
                                      </button>
                                    </th>
                                    <th scope="col" class="text-center">
                                      Penilaian
                                    </th>
                                    <th scope="col">
                                      Status Pelaksanaan
                                    </th>
                                  </tr>
                                
                              </thead>`

    table_body = ``

    table_footer = `</table></div>`

    inner_table = table_init

    response.forEach((data) => {

        yuran_perunding = data.yuran_perunding ? data.yuran_perunding: '-'
        eocp = data.eocp ? data.eocp: '-'
        kemajuan_jadual = data.kemajuan_jadual ? data.kemajuan_jadual: '-'
        kemajuan_sebenar = data.kemajuan_sebenar ? data.kemajuan_sebenar: '-'
        penilaiyan = data.penilaiyan ? data.penilaiyan: '-'
        status_pelaksanaan = data.status_pelaksanaan ? data.status_pelaksanaan: '-'

        template = `<tr style="cursor: pointer;" onClick="loadView(` + data.pemantauan_id + `, ` + data.id + `)">
                        
                                </td>
                                <td></td>
                                <td class="">
                                  ` + data.nama_perolehan + `
                                </td>
                                <td class="text-center">` + data.nama_peruding + `</td>
                                <td class="text-center">` + data.jenis_perkhidmatan + `</td>

                                <td class="text-center">` + data.no_documen_perolehan + `</td>
                                <td>` + data.kaedah_perolehan + `</td>
                                  <td class="text-center">` + data.no_pendaftaran_moh + `</td>
                                  <td class="text-center">` + data.tarikh_setuju_terima + `</td>
                                  <td class="text-center">` + data.tarikh_tamat_perjanjian + `</td>
                                  <td class="text-center">` + yuran_perunding + `</td>
                                  <td class="text-center">` + eocp + `</td>
                                  <td class="text-center">` + kemajuan_jadual + `</td>
                                  <td class="text-center">` + kemajuan_sebenar + `</td>
                                  <td class="text-center">` + penilaiyan + `</td>
                                  <td class="text-center">` + status_pelaksanaan + `</td>
                              </tr>`
        inner_table = inner_table + template
    })

    inner_table = inner_table + table_footer

    return (inner_table)

}

function loadView(project_id, perolehan_id) {
    var url = '{{ route("perunding.load.maklumat.perunding", [":project_id", ":perolehan_id"])}}'

    url = url.replace(':project_id', project_id);
    url = url.replace(':perolehan_id', perolehan_id);
    window.location.href = url;
}

function loadQueryDatas(response)
{

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
  response.jenis_perkhidmatan.forEach((jenis) => {
    var el = document.createElement("option");
      el.textContent = jenis;
      el.value = jenis;
      query_jenis_dropdown.appendChild(el);
  })

  //load kod projek options
  query_kod_dropdown = document.getElementById('query_kod_projek')
  response.kod_projects.forEach((kod) => {
    var el = document.createElement("option");
      el.textContent = kod;
      el.value = kod;
      query_kod_dropdown.appendChild(el);
  })

  //load kaedah options
  query_kaedah_dropdown = document.getElementById('query_kaedah')
  response.kaedah_perolehan.forEach((kaedah) => {
    var el = document.createElement("option");
      el.textContent = kaedah;
      el.value = kaedah;
      query_kaedah_dropdown.appendChild(el);
  })

  //load nama perunding options
  query_nama_perunding_dropdown = document.getElementById('query_nama_perunding')
  response.nama_perunding.forEach((nama_perunding) => {
    var el = document.createElement("option");
      el.textContent = nama_perunding;
      el.value = nama_perunding;
      query_nama_perunding_dropdown.appendChild(el);
  })

  //load nama perunding options
  query_status_dropdown = document.getElementById('query_status')
  response.status_pelaksanaan.forEach((status) => {
    var el = document.createElement("option");
      el.textContent = status;
      el.value = status;
      query_status_dropdown.appendChild(el);
  })

  //load nama perunding options
  query_kementerian_dropdown = document.getElementById('query_kementerian')
  response.kementerian.forEach((kementerian) => {
    var el = document.createElement("option");
      el.textContent = kementerian;
      el.value = kementerian;
      query_kementerian_dropdown.appendChild(el);
  })
  
}

function loadDatatableJps(response) {

    var jps_table = $('#senaraiJpsTable').DataTable({
        data: response,
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
            targets: 4,
            render: function(data, type, row, meta) {
                if (type === 'display') {
                    data = row.kos_projeck.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                return data;
            }
        }],
        columns: [{
            //     className: 'dt-control',
            //     orderable: false,
            //     data: null,
            //     defaultContent: ''
            // },
                className: 'index-column',
                orderable: false,
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Display the index (add 1 to start from 1)
                },
                "sortable": true
            },
            {
                data: 'kod_projeck',
                "sortable": true
            },
            {
                data: 'nama_projek',
                "sortable": true
            },
            {
                data: 'kategori_Projek',
                "sortable": true
            },
            {
                data: 'kos_projeck',
                "sortable": true
            },
            {
                data: 'negeri.nama_negeri',
                "sortable": true
            },
            {
                data: 'bahagian_pemilik.acym',
                "sortable": true
            },
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

    // Add event listener for opening and closing details
    $('#senaraiJpsTbody').on('click', 'tr', function() {
        var tr = $(this);
        var row = jps_table.row(tr);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            // row.child(format(row.data())).show();
            row_data = row.data()
            row.child(format(row_data.perolehan)).show();
            tr.addClass('shown');
        }
    });
}

function printDataTable() {
    // Clone the DataTable and remove any interactive elements
    var printableTable = $('#senaraiJpsTable').clone();
    printableTable.find('.view-button').remove(); // Remove view buttons, for example

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

function convertToCapital() {
    var inputElement = document.getElementById('query_nama_projek');
    var outputElement = document.getElementById('query_nama_projek'); //console.log(outputElement);
    var inputValue = inputElement.value;
    var capitalizedValue = inputValue.toUpperCase();
    outputElement.value = capitalizedValue; //console.log(capitalizedValue);
}

</script>