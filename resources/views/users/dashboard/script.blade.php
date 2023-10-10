<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.popper.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/highcharts.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/index.js') }}"></script>
{{-- <script src="{{ asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>    --}}
<script type="text/javascript" src="{{ asset('datatables.min.js') }}" defer></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> 
    
<script>  
  
      function loadTempUser(id)
    {  
        var url = '{{ route("user.profile", ["temp",":id"])}}'
        console.log(url)
        url = url.replace(':id', id);        
        window.location.href = url;
    }

    function downloadDoc(id) {
      const api_url = "{{env('API_URL')}}";  console.log(api_url);
       const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
       update_user_api = api_url+"api/user/user/download";
       data_update = {'user_id':id, 'type':'temp'};
       var jsonString = JSON.stringify(data_update);
       $.ajaxSetup({
         headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
       $.ajax({
            type: 'GET',
            url: update_user_api,
            data: {'user_id':id, 'type': 'temp'} , 
            //dataType:"json",
            xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 2) {
                            if (xhr.status == 200) {
                                xhr.responseType = "blob";
                            } else {
                                xhr.responseType = "text";
                            }
                        }
                    };
                    return xhr;
                },
            //contentType: "application/pdf",
            success: async function(data) { 
               console.log('downlaoded')
               console.log(data)

               const str = data.type; console.log(str)
                if(str)
                {
                        const parts = str.split('/');
                        const doc_type = parts[1];  console.log(doc_type)   
                        var doc_name = 'document.'+doc_type;  console.log(doc_name)    
                }
                else
                {
                        var doc_name = "document.pdf";    
                }

               //Convert the Byte Data to BLOB object.
               var blob = new Blob([data], { type: "application/octetstream" });
 
               //Check the Browser type and download the File.
               // var isIE = false || !!document.documentMode;
               // if (isIE) {
               //    window.navigator.msSaveBlob(blob, fileName);
               // } else {
                  var url = window.URL || window.webkitURL;
                  link = url.createObjectURL(blob);
                  var a = $("<a />");
                  a.attr("download", doc_name);
                  a.attr("href", link);
                  $("body").append(a);
                  a[0].click();
                  $("body").remove(a);
               //}
                //window.location.href = "{{ url('/home')}}";
            }
        });
    }

    function approveTempUser(id)
    {
        document.getElementById("tutup").setAttribute("user_id",id);
        $("#add_role_sucess_modal").modal('show');
    }

    $('#close').click(function(){ console.log(document.getElementById("tutup"));
        document.getElementById("tutup").removeAttribute("user_id");
        $("#add_role_sucess_modal").modal('hide');
    });           

    $('#close_image').click(function(){ console.log(document.getElementById("tutup"));
        document.getElementById("tutup").removeAttribute("user_id");
        $("#add_role_sucess_modal").modal('hide');
    }); 
         
    $('#tutup').click(function()
    {
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                
                var id=document.getElementById("tutup").getAttribute("user_id"); console.log(id);

                 //alert("approve");
                 const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);

                 update_user_api = api_url+"api/user/approval";
                 data_update = {'id':id, 'loged_user_id': {{Auth::user()->id}}, 'action': "DASHBOARD - Pengesahan pengguna sementara"};
                 var jsonString = JSON.stringify(data_update);
                 $.ajaxSetup({
                   headers: {
                              "Content-Type": "application/json",
                              "Authorization": api_token,
                              }
                  });
                 $.ajax({
                      type: 'POST',
                      url: update_user_api,
                      data: jsonString, 
                      success: function(response) { 
                        console.log(response.code)
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        
                         $("#sucess_modal").modal('show');
                          //window.location.href = "{{ url('/pengesahan-pengguna-baharu')}}";
                      }
                  });
          
              });

    $('#confirm_close').click(function(){ 
        $("#sucess_modal").modal('hide');
        window.location.href = "{{ url('/home')}}";
    });

    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
$(document).ready(function () {  
  $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");  
  console.log("{{$token}}")
  window.localStorage.setItem('token', "{{$token}}");
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
       //const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);       
       const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);       
    var jps = {'isJps':1}; 
    var non_jps = {'isJps':0}; 
    // GET request for remote image in node.js
//     const config = {
//     headers: { Authorization: api_token }
// };

const bodyParameters = {
   isJps: 1
};
axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url+"api/user/temp/all/list",
        responseType: 'json'
        })
        .then(function (response) {
            console.log(response)

            
            var jps_table =$('#temp_user').DataTable({     
              data: response.data.data,
              "aaSorting": [],
              pagingType: 'full_numbers',
              "language": {
                    "lengthMenu": "Papar _MENU_ Entri",
                    "zeroRecords": "Tiada rekod dijumpai",
                    "info": "Paparan _PAGE_ hingga 10 dari _PAGES_",
                    "infoEmpty": "Tiada rekod tersedia",
                    "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                    "searchPlaceholder": "    Carian",
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
                          if(type === 'display'){
                              //data=row.name
                              data = '<a value="'+row.id+'" style="cursor:pointer" onClick="loadTempUser('+row.id+')" class="text-dark user_name">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:1, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.email
                          }
                          return data;
                      }
                  },
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                             if(type === 'display'){
                                    if(row.jawatan.nama_jawatan!=null){
                                        data=row.jawatan.nama_jawatan;
                                    }
                                    else{
                                        data="";
                                    }
                              }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                            console.log(row.bahagian.nama_bahagian)
                            if(type === 'display'){
                                        if(row.bahagian.nama_bahagian!=null){
                                            data=row.bahagian.nama_bahagian;
                                        }
                                        else{
                                            data="";
                                        }

                              }   
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.jawatan.nama_jawatan
                          }
                          return data;
                      }
                  },
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){                           
                           data=''
                           if(row.media.length == 1){
                              data = 
                                 '<img src="assets/images/pdf.png" alt="pdf" onClick="downloadDoc('+row.id+')"/>'
                              
                           }
                              
                          }
                          return data;
                      }
                  },
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {                          
                          if(type === 'display'){
                              data='<div class="d-flex">'+
                                  '<button class="btn btn-danger text-nowrap" onClick="rejectTempUser('+row.id+','+row.count+')">Tidak Lulus</button>'+
                                  '<button class="btn btn-primary" onClick="approveTempUser('+row.id+')">Lulus</button>'+
                              '</div>'
                          }
                          return data;
                      }
                  },                  

              ] , 
              columns: [
                  { data: 'name'},
                  { data: 'email'  },
                  {
                        targets:2,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jabatan.length)
                            if(row.jabatan.length==0){
                                data="";
                            }else{
                                data=row.jabatan.nama_jabatan;
                            }
                            return data;
                        }
                        
                      },
                      {
                        targets:3,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            
                            if(row.bahagian.length==0){
                                data="";
                            }else{
                                data=row.bahagian.nama_bahagian;
                            }
                            return data;
                        }
                        
                  },
                  {
                        targets:4,
                        render: function ( data, type, row, meta ) {
                            // console.log(row.jawatan.length)
                            if(row.jawatan.length==0){
                                data="";
                            }else{
                                data=row.jawatan.nama_jawatan;
                            }
                            return data;
                        }
                        
                  },
                  { data: 'email'  },
                  { data: 'row_status'  },
              ],
              
                 
          });
            //response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
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
        });



        jps_usercount=[]
        nonjps_usercount=[]
        month=[]
        const api_url1 = "{{env('API_URL')}}";
        // --------- User Count Chart --------------------------------------------
        axios.defaults.headers.common["Authorization"] = api_token
        axios({
        method: 'get',
        url: api_url1+"api/user/UserLoginMonthly",
        responseType: 'json'
        })
        .then(function (response) {
          //console.log("user active: "+response.data.data.userDetails[0]['total_count'])

          if(response){
            for(i=0;i<response.data.data.userDetails.length;i++){
                jps_usercount.push([parseInt(response.data.data.userDetails[i]['jps_users'])]);
                nonjps_usercount.push([parseInt(response.data.data.userDetails[i]['non_jps_users'])]);
                if(response.data.data.userDetails[i]['month'] == 1){
                  month.push('Jan');
                }
                else if(response.data.data.userDetails[i]['month'] == 2){
                  month.push('Feb');
                }
                else if(response.data.data.userDetails[i]['month'] == 3){
                  month.push('Mar');
                }
                else if(response.data.data.userDetails[i]['month'] == 4){
                  month.push('Apr');
                }
                else if(response.data.data.userDetails[i]['month'] == 5){
                  month.push('May');
                }
                else if(response.data.data.userDetails[i]['month'] == 6){
                  month.push('Jun');
                }
                else if(response.data.data.userDetails[i]['month'] == 7){
                  month.push('Jul');
                }
                else if(response.data.data.userDetails[i]['month'] == 8){
                  month.push('Aug');
                }
                else if(response.data.data.userDetails[i]['month'] == 9){
                  month.push('Sep');
                }
                else if(response.data.data.userDetails[i]['month'] == 10){
                  month.push('Oct');
                }
                else if(response.data.data.userDetails[i]['month'] == 11){
                  month.push('Nov');
                }
                else if(response.data.data.userDetails[i]['month'] == 12){
                  month.push('Dec');
                }
                
               
            }
          }
          if (index) {
            //console.log("Count of users: "+usercount);
  // chart
  const barChart = Highcharts.chart("bar_chart", {
    chart: {
      type: "column",
      // padding: [5, 0, 5, 5],
    },
    title: {
      text: "STATISTIK PELAWAT",
      align: "left",
      floating: true,
      verticalAlign: "top",
      style: {
        fontSize: "0.8rem",
        fontFamily: "poppins_regular",
        textShadow: false,
        fontWeight: "bold",
      },
    },
    subtitle: {
      text: "",
    },
    xAxis: {
      categories: month,
      crosshair: false,
      // labels: {
      //   style: {
      //     fontSize: "0.5rem",
      //     color: "#5a5d70",
      //     fontWeight: "600",
      //   },
      // },
    },
    yAxis: {
      min: 0,
      tickInterval: 5,
      title: {
        text: "",
      },
      lineWidth: 0,
      gridLineWidth: 0,
      // labels: {
      //   style: {
      //     fontSize: "0.6rem",
      //     color: "#9b9ea7",
      //   },
      // },
    },

    plotOptions: {
      series: {
        animation: true,
      },
      column: {
        pointPadding: 0.2,
        borderWidth: 0,
      },
    },
    credits: {
      enabled: false,
    },

    legend: {
      // margin: 30,
      align: "right",
      verticalAlign: "top",
      symbolHeight: 10,
      symbolWidth: 10,
      symbolRadius: 50,
      
    },
    dataLabels: {
      style: {
        fontSize: "0.8rem",
        fontFamily: "poppins_regular",
        textShadow: false,
        fontWeight: "bold",
      },
    },
    series: [
      {
        name: "Agensi",
        data: nonjps_usercount,
        color: "#78f1aa",
      },
      {
        name: "JPS",
        data: jps_usercount,
        color: "#b5a8ff",
      },
    ],
  });
  barChart.reflow();
  console.log(barChart.reflow);
  $("div.spanner").removeClass("show");
  $("div.overlay").removeClass("show");
  // -------------------------
  let accordial_all_list = document.querySelectorAll(
    ".accordian_single_list, .NPIS_logo_right_content"
  );
  // --------------------------------------------------------------------------------------------
  let Mainbody_conatiner = document.querySelector(".Mainbody_conatiner");
  // round.addEventListener("click", () => {
  //   $(".side_bar_Container").animate({
  //     left: '-250px',
  //     opacity: '0',
  //   }); 
  //   // side_bar_Container.classList.remove("show");
  //   Mainbody_conatiner.classList.add("active");
  //   // barChart.reflow();
  //   accordial_all_list.forEach((asl) => {
  //     asl.classList.add("active");
  //   });
  //   setTimeout(() => {
  //     barChart.reflow();
  //   }, 300);
  // });

  // --------------------------------------------------------------------------------------------
  document.querySelector("#menu").addEventListener("click", () => {
    $(".side_bar_Container").animate({
      left: '0px',
      opacity: '100',
    });
    side_bar_Container.classList.add("show");
    Mainbody_conatiner.classList.remove("active");

    accordial_all_list.forEach((asl) => {
      asl.classList.remove("active");
    });
    setTimeout(() => {
      barChart.reflow();
    }, 400);
  });
  // --------------------------------------------------------------------------------------------

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
}
          
        })

        
        //----------- Chart Count Chart ends --------------------------------------
      
        axios({
            method: 'get',
            url: api_url+"api/user/dashboard",
            responseType: 'json'
        })
        .then(function (response) {
            console.log(response)
            
         document.getElementById('userCount').innerHTML
                = response.data.data.users
         document.getElementById('usersJps').innerHTML
               = response.data.data.users_jps
         document.getElementById('usersAgensi').innerHTML
               = response.data.data.users_agensi
         document.getElementById('usersTemp').innerHTML
               = response.data.data.users_temp
              if(document.getElementById('usersTemp').innerHTML==response.data.data.users_temp){
                loadcompleted()
              }
              // if(response.data.data2.logo3!=""){
              //   localStorage.setItem("logo-1",response.data.data2.logo3);     
              // }
              // else{
              //   localStorage.setItem("logo-1",'');
              // }
              // if(response.data.data2.logo2!=""){
              //   localStorage.setItem("logo-2",response.data.data2.logo2);     
              // }
              // else{
              //   localStorage.setItem("logo-2",'');
              // }

        })
        axios({
        method: 'get',
        url: api_url+"api/user/active",
        responseType: 'json'
        })
        .then(function (response) {
          console.log(response)
          for(i=0;i<=response.data.activelist.length;i++){
            imageUrl = "{{ asset('assets/images/profiler.png') }}"
              if(response.data.activelist[i].profileImage != "") {
                imageUrl = response.data.activelist[i].profileImage
              }
              
            $(".dashboard_detail_content_container").append(
                      '<div class="dashboard_detail_content d-flex">'
                      +'<p class="profile">'
                      +'<span class="active"></span>'
                      +'<img src="'+imageUrl + '" alt="" />'
                      +'</p>'
                      +'<div class="details">'
                      +'<h4>'+ response.data.activelist[i].name +'</h4>'
                      +'<p>'+response.data.activelist[i].jawatan.nama_jawatan+'</p>'
                      +'</div>'
                      +'</div>'
                    )
          }
        })
        
       });

   //});

   function rejectTempUser(id,count)
              { console.log(count)
                const api_url = "{{env('API_URL')}}";  console.log(api_url);
                 const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);
                $("#reject_mode_sucess_modal").modal('show');
                if(count>=3)
                {   
                    document.getElementById('Update').style.visibility= 'hidden';
                }
                else
                { console.log('khbkj')
                    document.getElementById('Update').style.visibility= 'visible';
                }

                $('#Update').click( function () { //updation
                    var comment = $('#komen').val(); console.log(comment)
                    if(comment=='')
                    {
                        document.getElementById("error_komen").innerHTML="Medan komen diperlukan"; 
                        return false;
                    }
                    else
                    {
                        document.getElementById("error_komen").innerHTML="";
                        var formData = new FormData();
                            formData.append('id', id);
		                    formData.append('comment', comment);
                            formData.append('count', count);
                            formData.append('type', "update");
                            formData.append('loged_user_id', {{Auth::user()->id}})
                            formData.append('action', "DASHBOARD - Pengguna sementara yang ditolak")

                            console.log(formData);

                            $("div.spanner").addClass("show");
                            $("div.overlay").addClass("show");

                            update_user_api = api_url+"api/temp/user/temp/updateRejection";

                        axios({
                                method: "post",
                                url: update_user_api,
                                data: formData,
                                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                            })
                                .then(function (response) {
                                //handle success
                                console.log(response.data.code);
                                    if(response.data.code === '200') {	
                                        $("div.spanner").removeClass("show");
                                        $("div.overlay").removeClass("show");
                                        window.location.href = "{{ url('/home')}}";
                                    }		
                                })
                                .catch(function (response) {
                                    //handle error
                                    console.log(response);
                                });
                    }
                });

                $('#Reject').click( function () { //rejection
                    var comment = $('#komen').val(); console.log(comment)
                    if(comment=='')
                    {
                        document.getElementById("error_komen").innerHTML="medan Komen diperlukan"; 
                        return false;
                    }
                    else
                    {
                        document.getElementById("error_komen").innerHTML="";
                        var formData = new FormData();
                            formData.append('id', id);
		                    formData.append('comment', comment);
                            formData.append('count', count);
                            formData.append('type', "reject");
                            formData.append('loged_user_id', {{Auth::user()->id}})
                            formData.append('action', "DASHBOARD - Pengguna sementara yang ditolak secara kekal")

                            console.log(formData);

                            $("div.spanner").addClass("show");
                            $("div.overlay").addClass("show");

                            update_user_api = api_url+"api/temp/user/temp/updateRejection";

                        axios({
                                method: "post",
                                url: update_user_api,
                                data: formData,
                                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                            })
                                .then(function (response) {
                                //handle success
                                console.log(response.data.code);
                                    if(response.data.code === '200') {	
                                         //$("#add_role_sucess_modal").modal('show');

                                         $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");

                                         window.location.href = "{{ url('/home')}}";
                                    }		
                                })
                                .catch(function (response) {
                                    //handle error
                                    console.log(response);
                                });
                    }
                });
              }

              $('#close_image_new').click(function(){ 
                    $("#reject_mode_sucess_modal").modal('hide');
                    window.location.href = "{{ url('/home')}}";
                }); 
</script>