 @section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> 

<script>

$(document).ready(function () {   
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    document.getElementById("mySelect").value = "1";
    var api_url = "{{env('API_URL')}}";
    var api_token = "Bearer "+ window.localStorage.getItem('token');
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        var selected = {'selected':1}; 

        $.ajax({
          type: "GET",
          url: api_url+"api/project/get-login-log",
        //   url: "http://localhost:8080/api/temp/user/list",
            dataType:"json",
          contentType: "application/json",
          header:{
            'contentType': "application/json",
            'Authorization':api_token
          },
          data:selected,
          success: function(response) {  
                //   console.log(response) 
                loadDatatable(response);     
                
            },
            error: function(response) {
                console.log(response);
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            }
          });  
});

    function loadDatatable(response)
    {
                var count=0;
                var jps_table =$('#loginlogtable').DataTable({     
                    processing: true,
                    data: response.data,
                    dom: "Blfrtip",
                    buttons: [

                        {
                            text: 'excel',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            }
                        },
                        
                    ],
                    "aaSorting": [],
                    pagingType: 'full_numbers',
                    "language": {
                            "lengthMenu": "Papar _MENU_ Entri",
                            "zeroRecords": "Tiada rekod dijumpai",
                            "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                            "infoEmpty": "Tiada rekod tersedia",
                            "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                            "searchPlaceholder": " Carian",
                            "search":"_INPUT_",
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
                                count=count+1; 
                                return count;
                            }
                        },
                        {
                            targets:1, // Start with the last
                            render: function ( data, type, row, meta ) { 
                                if(type === 'display'){
                                    if(row.user_ic_no!=null){
                                        data=row.user_ic_no;
                                      }
                                      else{
                                        data="";
                                      }
                                }
                                return data;
                            }
                        },
                        {
                            targets:2, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                    data=row.user_name;
                                }
                                return data;
                            }
                        },
                        {
                            targets:3, // Start with the last
                            render: function ( data, type, row, meta ) {
                                    // console.log(row.bahagian.nama_bahagian)
                                if(type === 'display'){
                                    data=row.user_jawatan;
                                }
                                return data;
                            }
                        },
                        {
                            targets:4, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        if(row.auditable_type==0){
                                            data="Log Keluar";
                                        }else{
                                            data="Log Masuk";
                                        }
                                        
                                }
                                return data;
                            }
                        },
                        {
                            targets:5, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        data=row.ip_address;
                                }
                                return data;
                            }
                        },
                        {
                            targets:6, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        data=row.user_agent;
                                }
                                return data;
                            }
                        },

                        {
                            targets:7, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        data=row.created_at;
                                }
                                return data;
                            }
                        },

        
                    ] , 
                    columns: [
                        { data: 'count'  },
                        { data: 'user_ic_no'  },
                        { data: 'user_name'  },          
                        { data: 'user_jawatan'  },
                        { data: 'event'  },
                        { data: 'ip_address'  },                        
                        { data: 'user_agent'  },
                        { data: 'created_at'  },
                    ],
                    
                        
                });
                $("#excelBtn").click(function(){
                    jps_table.button('.buttons-excel').trigger();
                });
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
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
                
    }


    $("#mySelect").change(function(){
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        document.getElementById("datefilter").value = "";
        var selectedOption = $(this).val();
        var api_url = "{{env('API_URL')}}";
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        $.ajaxSetup({
             headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        var selected = {'selected':selectedOption}; 

        $.ajax({
            type: "GET",
            url: api_url+"api/project/get-login-log",
            dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
            data:selected,
            success: function(response) {  
                //   console.log(response) 
                $("#loginlogtable").dataTable().fnDestroy();
                loadDatatable(response);    
                
            },
            error: function(response) {
                console.log(response);
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            }
          });  

    });
                

   
 </script>

<script type="text/javascript">
    $(function() {

    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            var date =$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

            document.getElementById("mySelect").value = "";

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            var start_date=picker.startDate.format('YYYY-MM-DD'); console.log(start_date)
            var end_date=picker.endDate.format('YYYY-MM-DD'); console.log(end_date)
            var api_url = "{{env('API_URL')}}";
            var api_token = "Bearer "+ window.localStorage.getItem('token');
            $.ajaxSetup({
                headers: {
                        "Content-Type": "application/json",
                        "Authorization": api_token,
                        }
            });
            var start = {'start':start_date, 'end':end_date}; 

            $.ajax({
            type: "GET",
            url: api_url+"api/project/get-login-log",
                dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
            data:start,
            success: function(response) { 
                $("#loginlogtable").dataTable().fnDestroy();
                loadDatatable(response);
            },
            error: function(response) {
                console.log(response);
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            }
          }); 
            


    });

    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
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
@endsection