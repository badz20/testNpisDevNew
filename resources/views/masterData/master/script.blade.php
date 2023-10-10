<script>
      $('#spatial_label').hide();
      function nonspatial(){
          $('#spatial_label').hide();
          $('#nonspatial_label').show();
      }
      function spatial(){
          $('#spatial_label').show();
          $('#nonspatial_label').hide();
      }

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        function loadflow(data) {
            var base_url = window.location.origin;
            switch (data) {
              case 'Bahagian EPU JPM':
                subrul = 'BahagianEPU'
                break;
              case 'Sektor Utama':
                subrul = 'SektorUtama'
                break;
              case 'Sektor':
                subrul = 'Sektor'
                break;
              case 'Sub Sektor':
                subrul = 'SubSektor'
                break;
              case 'Jenis Kategori / Jenis Kategori Perolehan':
                subrul = 'Kategori'
                break;
              case 'Jenis Sub Kategori / Jenis Perolehan':
                subrul = 'SubKategori'
                break;
              case 'SDG':
                subrul = 'sdgmaster'
                break;
              case 'sdgmaster':
                subrul = 'sdgmaster'
                break;
              case 'Indikator':
                subrul = 'Indikator'
                break;
              case 'Sasaran':
                subrul = 'sasaran'
                break;
              case 'Sub Skops':
                subrul = 'SubSkop'
                break;
              case 'Dropdown Options':
                subrul = 'lookup_options'
                break;
              case 'Pejabat Projek':
                subrul = 'PejabatProjek'
                break;
                case 'Strategi':
                subrul = 'Strategi'
                break;
              case 'Skop Kos Calculation':
                subrul = 'SkopKosCalculation'
                break;
              case 'User Types':
                subrul = 'UserType'
                break;
              case 'Deliverable Headings':
                subrul = 'DeliverableHeadings'
                break;
              case 'Belanja mengurus skop':
                subrul = 'Belanja_mengurus_skop'
                break;
              case 'Belanja mengurus subskop':
                subrul = 'Belanja_mengurus_subskop'
                break;
              case 'Nama Agensi':
                subrul = 'Nama_Agensi'
                break;
              default:
                subrul = data
                break;
            }
            var url = base_url + '/' + subrul;
            window.location.href = url
      }
$(document).ready(function () {  
  if({{json_encode($viewOnly)}}) {
        disableInputs()
        }


   function disableInputs() {
      // Get all input elements
      const inputs = document.getElementsByTagName("input");
      
      // Loop through each input element
      for (let i = 0; i < inputs.length; i++) {
        const input = inputs[i];

        // Check if input is not a button and not already disabled
        if (input.type !== "button" && !input.disabled) {
          // Set readonly attribute
          input.readOnly = true;
          
          // Check if input is a checkbox or radio button
          if (input.type === "checkbox" || input.type === "radio") {
            // Disable checkbox or radio button
            input.disabled = true;
          }
        }
      }

      // Get all button elements
      const buttons = document.getElementsByTagName("button");

      // Loop through each button element
      for (let i = 0; i < buttons.length; i++) {
        const button = buttons[i];

        // Disable button
        button.disabled = true;
      }
    } 

    $("#lookupForm").submit(function(event){
		submitLookupForm();
		return false;
	});
    function submitLookupForm(){
        //console.log(document.lookup.name.value)
        var formEl = document.forms.lookupForm;
        var formData = new FormData(formEl);
        formData.append('user_id', {{Auth::user()->id}})
        console.log(name)
        //console.log($('form#lookupForm').serialize())
        console.log('form submitted')

        axios({
        method: 'post',
        url: api_url+"api/lookup/master",
        responseType: 'json',
        data: formData
        })
        .then(function (response) {
            console.log(response)
            location.reload()
        })
        // $.ajax({
        //     type: "POST",
        //     url: "saveContact.php",
        //     cache:false,
        //     data: $('form#contactForm').serialize(),
        //     success: function(response){
        //         $("#contact").html(response)
        //         $("#contact-modal").modal('hide');
        //     },
        //     error: function(){
        //         alert("Error");
        //     }
        // });
    }

    

      
    const api_url = "{{ env('API_URL') }}"
       const api_token = "Bearer "+ window.localStorage.getItem('token')
    // console.log('loaded')
axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/lookup/master",
        responseType: 'json'
        })
        .then(function (response) {
            console.log(response)
            $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            var jps_table =$('#master_data').DataTable({     
              data: response.data.data,
              pagingType: 'full_numbers',
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada apa-apa ditemui - maaf",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "search": "_INPUT_",
                    "searchPlaceholder": "  Carian",
                    "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Seterusnya",
                    "previous":   "Sebelum"
                    },       
                },
              columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              //data=row.value
                              data = '<div class="d-flex align-items-center folder">' +
                                '<i class="mdi mdi-folder-outline m-0 icon_dropdown"></i>' +                                
                                '<p style="cursor:pointer" onClick="loadflow(\''+row.value+'\')">' + row.value + '</p>' +                                
                              '</div>'                              
                          }
                          return data;
                      }
                  },
                  {
                      targets:1, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.catatan
                          }
                          return data;
                      }
                  },                  
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                            // console.log(row.bahagian.nama_bahagian)
                          if(type === 'display'){
                            const today = new Date(row.updated_at);
                            const yyyy = today.getFullYear();
                            let mm = today.getMonth() + 1; // Months start at 0!
                            let dd = today.getDate();

                            if (dd < 10) dd = '0' + dd;
                            if (mm < 10) mm = '0' + mm;

                            const formattedToday = dd + '-' + mm + '-' + yyyy;
                                  data=formattedToday
                          }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.users.name
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                        if(type === 'display'){

                            if(row.row_status==1){
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" checked  class="custom-control-input" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                  }
                                  else{
                                      data ='<div class="custom-control custom-switch">'+
                                    '<input type="checkbox" class="custom-control-input" id="customSwitch'+row.id+'">'+
                                    '  <label class="custom-control-label" for="customSwitch'+row.id+'"></label>'+
                                    '</div>'
                                                    };
                                  //data=row.row_status
                          }
                          return data;
                      }
                  },                  
              ] , 
              columns: [
                  { data: 'value'},
                  { data: 'catatan'  },
                  { data: 'updated_at'  },          
                  { data: 'uuid'  },
                  { data: 'row_status'  },                  
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
          
          loadcompleted();
            //response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
        });

    });

    let accordian_single_list = document.querySelectorAll(
    ".accordian_single_list"
  );
  let d_arrow = document.querySelectorAll(".d_arrow");

  accordian_single_list.forEach((asl) => {
    asl.addEventListener("click", () => {
      d_arrow.forEach((darr) => {
        darr.classList.remove("active");
      });
      // let accordian_content = asl.closest(".accordian_content ");
      // console.log(accordian_content);
      let arrow = asl.querySelector(".d_arrow");
      let Accordian_link = asl.querySelector(".Accordian_link");
      if (Accordian_link.classList.contains("collapsed")) {
        arrow.classList.add("active");
      } else {
        arrow.classList.remove("active");
      }
    });
  });
</script>