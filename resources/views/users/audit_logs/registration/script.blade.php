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
          url: api_url+"api/user/get-registration-log",
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
                var jps_table =$('#jps_user').DataTable({     
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
                                        data=row.updated_by_user_name;
                                }
                                return data;
                            }
                        },
                        {
                            targets:5, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        data=row.updated_by_user_jawatan;
                                }
                                return data;
                            }
                        },
                        {
                            targets:6, // Start with the last
                            render: function ( data, type, row, meta ) {
                                data=row.action_taken;
                                return data;
                            }
                        },
                        {
                            targets:7, // Start with the last
                            render: function ( data, type, row, meta ) {
                                if(type === 'display'){
                                        data=row.created_on;
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
                        { data: 'updated_by_user_name'  },
                        { data: 'updated_by_user_jawatan'  },
                        { data: 'action_taken'  },
                        { data: 'created_on'  },
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
            url: api_url+"api/user/get-registration-log",
            dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
            data:selected,
            success: function(response) {  
                //   console.log(response) 
                $("#jps_user").dataTable().fnDestroy();
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
            url: api_url+"api/user/get-registration-log",
                dataType:"json",
            contentType: "application/json",
            header:{
                'contentType': "application/json",
                'Authorization':api_token
            },
            data:start,
            success: function(response) { 
                $("#jps_user").dataTable().fnDestroy();
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
</script>
@endsection