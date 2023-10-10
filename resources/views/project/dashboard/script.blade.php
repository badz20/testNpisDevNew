<script src="assets/js/jquery.min.js"></script>
 <!-- require polyfills for fetch and Promise from https://polyfill.io -->
 <script src="https://polyfill.io/v3/polyfill.min.js?features=es5%2Cfetch%2CPromise"></script>

 <!-- require ArcGIS REST JS libraries from https://unpkg.com -->
 <script src="https://unpkg.com/@esri/arcgis-rest-request@3.6.0/dist/umd/request.umd.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

{{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
{{-- <script src="https://code.highcharts.com/modules/treemap.js"></script> --}}
<script src="https://js.arcgis.com/4.26/"></script>




<script>
$(document).ready(function () {  
//   $("div.spanner").addClass("show");
//         $("div.overlay").addClass("show");  
  // console.log("{{$token}}")
  window.localStorage.setItem('token', "{{$token}}");
    const api_url = "{{env('API_URL')}}";  
    const api_token = "Bearer "+ window.localStorage.getItem('token');       
    var jps = {'isJps':1}; 
    var non_jps = {'isJps':0}; 
})



//         axios({
//       method: 'post',
//       url: "https://www.arcgis.com/sharing/oauth2/token?client_id=Eg0PDju5clxYEptF&client_secret=1100d050a03c43d3b04e4d11f0a11817&grant_type=client_credentials",
//       //url:"https://www.arcgis.com/sharing/generateToken",
//       data:{
//         'username':"riddhihecta",
//         'password':"new2023year",
//         'referer':"http://localhost:8081/new-parmohonan-project-dashboard",
//       },
//       responseType: 'json',
//       ContentType: "application/json",
//       })
//       .then(function (response) {
//         var token=response.data.access_token;
//         console.log(response)  
//         console.log("OAuth token is: "+token)
//         window.localStorage.setItem('esritoken', token);
//         var storedToken=window.localStorage.getItem('esritoken');     

//           axios({
//           method: 'POST',
//           url: "validationAccessToken",
//           responseType: 'json',
//           data:[storedToken],
//           ContentType: "application/json",
//           })
//           .then(function (response) {
//             console.log(response)
//             $("#esirDashboard").attr('src',"https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html#/dc53af74ec194c21abc0009417bcfea4?token="+token)
//           })

       
//       })


//       require([
//       "esri/portal/Portal",
//       "esri/identity/OAuthInfo",
//       "esri/identity/IdentityManager"
//     ], function (Portal, OAuthInfo, esriId) {

//       const info = new OAuthInfo({
//         appId: "Eg0PDju5clxYEptF",
//         popup: false // the default
//       });
//       esriId.registerOAuthInfos([info]);

//       function handleSignedIn() {

//         const portal = new Portal();
//         portal.load().then(() => {
//           const results = { name: portal.user.fullName, username: portal.user.username };
//           document.getElementById("results").innerText = JSON.stringify(results, null, 2);
//         });

//       }

//     });

      

//         let dashboard = document.querySelector("#dashboard");
//     window.localStorage.setItem('token', "{{$token}}");
// if (dashboard) {

//   Highcharts.chart("TreeChart", {
//     chart: {
//       type: "treemap",
//     },
//     credits: {
//       enabled: false,
//     },
//     title: {
//       text: "",
//     },
//     tooltip: {
//       enabled: true,
//       borderWidth: 0,
//       outside: true,
//       useHTML: true,
//       className: "test",
//       formatter() {
//         return this.point.options.name;
//       },
//     },
//     series: [
//       {
//         cursor: "pointer",
//         borderWidth: 2,
//         borderColor: "#fff",
//         //type: "treemap",
//         layoutAlgorithm: "strip",
//         states: {
//           hover: {
//             borderColor: undefined,
//             brightness: -0.1,
//           },
//         },

//         data: [
//           // {
//           //   id: "A",
//           //   name: "Apples",
//           //   color: "#EC2500",
//           // },
//           // {
//           //   id: "B",
//           //   name: "Bananas",
//           //   color: "#ECE100",
//           // },
//           // {
//           //   id: "O",
//           //   name: "Oranges",
//           //   color: "#EC9800",
//           // },
//           {
//             name: "SARAWAK",
//             // parent: "A",
//             value: 120,
//             color: "#8bc8f7",
//           },
//           {
//             name: "SABAH",
//             // parent: "A",
//             value: 38,
//             color: "#ec38cf",
//           },
//           {
//             name: "TERENGGANU",
//             // parent: "A",
//             value: 4,
//             color: "#90a518",
//           },
//           {
//             name: "KELANTAN",
//             // parent: "B",
//             value: 33,
//             color: "#8bc8f7",
//           },
//           {
//             name: "PELBAGAI NEGERI",
//             // parent: "B",
//             value: 43,
//             color: "#8cf78d",
//           },
//           {
//             name: "PAHANG",
//             // parent: "B",
//             value: 38,
//             color: "#15c2ed",
//           },
//           {
//             name: "JOHOR",
//             // parent: "O",
//             value: 30,
//             color: "#42aaa9",
//           },
//           {
//             name: "MELAKA",
//             // parent: "O",
//             value: 18,
//             color: "#cea936",
//           },
//           {
//             name: "PULAU PIN",
//             // parent: "O",
//             value: 18,
//             color: "#ac1a97",
//           },
//           {
//             name: "PERAK",
//             // parent: "O",
//             value: 28,
//             color: "#46b4f3",
//           },
//           {
//             name: "SELANGOR",
//             // parent: "O",
//             value: 18,
//             color: "#15c2ed",
//           },
//           {
//             name: "NEGE...",
//             // parent: "O",
//             value: 12,
//             color: "#dd8458",
//           },
//           {
//             name: "KEDAH",
//             // parent: "O",
//             value: 25,
//             color: "#b3b3b3",
//           },
//           {
//             name: "WILAYAH PERSE",
//             // parent: "O",
//             value: 18,
//             color: "#009ff0",
//           },
//           {
//             name: "PERLIS",
//             // parent: "O",
//             value: 7,
//             color: "#dca212",
//           },
//         ],
//         title: {
//           text: "Fruit consumption",
//         },
//         dataLabels: {
//           align: "left",
//           verticalAlign: "top",
//           useHTML: true,
//           allowOverlap: true,
//           crop: false,
//           overflow: "allow",
//           formatter() {
//             // Get the font colour based on the background colour of the section

//             let fontColor = "#FFF";

//             // if (this.point.categoryColor === Theme.HighContrastAAA) {
//             //   fontColor = Color.getFontColor(this.point.color, true, Theme.HighContrastAAA);
//             // }

//             let height = this.point.shapeArgs.height - 5;
//             // console.log(height);
//             const value = this.point.percent
//               ? this.point.percent
//               : this.point.value;
//             let label =
//               '<div style="color: ' +
//               fontColor +
//               ";height:" +
//               height +
//               'px;"><div class="data-label ' +
//               "top" +
//               (true === true ? " scaled" : "") +
//               '" ><div class="value">' +
//               this.point.name +
//               '</div><div class="data-label-desc"><span class="name">' +
//               value +
//               "</span>";

//             if (this.point.iconClass) {
//               label =
//                 label + '<i class="icon ' + this.point.iconClass + '"></>';
//             }

//             label = label + "</div></div></div>";

//             return label;
//           },
//         },
//         // point: {
//         //   events: {
//         //     click() {
//         //       if (true) {
//         //         const event = WindowFills.customEvent(window, "click.treemap", {
//         //           detail: this.options,
//         //         });
//         //         self.container.dispatchEvent(event);
//         //       } else {
//         //         return;
//         //       }
//         //     },
//         //   },
//         // },
//       },
//     ],
//     legend: {
//       enabled: false,
//     },
//   });
  
// }
// $(document).ready(function() {
//   $("div.spanner").addClass("show");
//                 $("div.overlay").addClass("show");
//     const api_url = "{{env('API_URL')}}";  console.log(api_url);
//     const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
//     var negeri =  {{$negeri}}; console.log(negeri)
//     var daerah =  {{$daerah}}; console.log(daerah)
//     var bahagian =  {{$bahagian}}; console.log(bahagian)
//     let userType = {{$user}};
//     var data_url='';
//     if(userType==1)
//     {
//         data_url= api_url+"api/project/get-dashboard-data?search_data="+daerah+"&type="+"daerah";
//     }
//     else if(userType==2)
//     {
//         data_url= api_url+"api/project/get-dashboard-data?search_data="+negeri+"&type="+"negeri";
//     }
//     else if(userType==3)
//     {
//         data_url= api_url+"api/project/get-dashboard-data?search_data="+bahagian+"&type="+"bahagian";
//     }
//     else if(userType==4)
//     {
//         data_url= api_url+"api/project/get-dashboard-data?search_data="+bahagian+"&type="+"bkor";
//     }
//     else
//     {
//         data_url= api_url+"api/project/get-dashboard-data?search_data="+daerah+"&type="+"daerah";
//     }

//       $.ajaxSetup({
//           headers: {
//               "Content-Type": "application/json",
//               "Authorization": api_token,
//               }
//         });
//       $.ajax({
//           type: "GET",
//           url: data_url,
//           dataType: 'json',
//           success: function (result) { console.log(result);
//             $("div.spanner").removeClass("show");
//                 $("div.overlay").removeClass("show");

//             if(result.jumlah_count)
//             {
//                 document.getElementById("jumlah_permohonan").innerHTML = result.jumlah_count;
//             }
//             var jenis_count=[result.jenis_count,result.jenis_sambungan_count]; console.log(jenis_count)

//             Highcharts.chart("application_Bar_chart", {
//                         chart: { type: "bar", },
//                         title: {
//                         text: "Jenis Permohonan",
//                         style: {
//                             fontWeight: 600,
//                         },
//                         },
//                         subtitle: {
//                         text: "",
//                         },
//                         xAxis: {
//                         categories: ["Baharu", "Sambungan"],
//                         title: {
//                             text: "Jenis Permohonan",
//                             align: "middle",
//                             style: {
//                             fontWeight: 600,
//                             },
//                         },

//                         rotation: 90,
//                         },
//                         yAxis: {
//                         min: 0,
//                         tickInterval: 10,

//                         title: {
//                             text: "Bilangan ",
//                             align: "middle",
//                         },
//                         labels: {
//                             overflow: "justify",
//                         },
//                         },
//                         plotOptions: {
//                         bar: {
//                             dataLabels: {
//                             enabled: true,
//                             inside: true,
//                             // verticalAlign: "middle", // Position them vertically in the middle
//                             align: "center",
//                             // x: -50,
//                             style: {
//                                 color: "white", // Make the labels white
//                             },
//                             },
//                         },
//                         },

//                         legend: {
//                         enabled: false,
//                         },
//                         credits: {
//                         enabled: false,
//                         },

//                         series: [
//                         {
//                             colorByPoint: true,
//                             colors: ["#14c9c0", "#c267b6"],

//                             data: jenis_count,
//                         },
//                         ],
//                 });
  
//           },
//           error: function(error) {

//         }
//       });
// });


//   $(document).ready(function(){
//     var checkclass=$("#permohonan").hasClass("show")
//     var checkClass2=$("#value_management").hasClass("show")
//     var checkClass3=$("#pentadbir").hasClass("show")
//     var checkClass4=$("#permohonan2").hasClass("show")
//     var checkClass5=$("#value_management2").hasClass("show")

//     $("#PermohonanBtn").click(function(){
//       document.getElementById("PermohonanBtn").removeAttribute("href");
//       $("#value_management").slideUp("slow")
//       if(checkclass==false){
//         $("#permohonan").slideToggle("slow");
//       }
//     })
//     $("#valuemanagementBtn").click(function(){
//       document.getElementById("valuemanagementBtn").removeAttribute("href");
//       $("#permohonan").slideUp("slow")
//       if(checkClass2==false){
//         $("#value_management").slideToggle("slow"); 
//       }
//     })
    
//     $("#pentadbirBtn").click(function(){
//       document.getElementById("pentadbirBtn").removeAttribute("href");
//       $("#permohonan2").slideUp("slow");
//       $("#value_management2").slideUp("slow");
//       if(checkClass3==false){
//         $("#pentadbir").slideToggle("slow"); 
//       }
//     })

//     $("#PermohonanBtn2").click(function(){
//       document.getElementById("PermohonanBtn2").removeAttribute("href");
//       $("#pentadbir").slideUp("slow");
//       $("#value_management2").slideUp("slow");
//       if(checkClass4==false){
//         $("#permohonan2").slideToggle("slow"); 
//       }
//     })

//     $("#valuemanagementBtn2").click(function(){
//       document.getElementById("valuemanagementBtn2").removeAttribute("href");
//       $("#pentadbir").slideUp("slow");
//       $("#permohonan2").slideUp("slow");
//       if(checkClass5==false){
//         $("#value_management2").slideToggle("slow"); 
//       }
//     })
    
//   })

//   $("#dropdownMenuButton").click(function(){
//     $(".dropdown-menu").toggle();
//   })

//   let accordian_single_list = document.querySelectorAll(
//     ".accordian_single_list"
//   );
//   let d_arrow = document.querySelectorAll(".d_arrow");

//   accordian_single_list.forEach((asl) => {
//     asl.addEventListener("click", () => {
//       d_arrow.forEach((darr) => {
//         darr.classList.remove("active");
//       });
//       // let accordian_content = asl.closest(".accordian_content ");
//       // console.log(accordian_content);
//       let arrow = asl.querySelector(".d_arrow");
//       let Accordian_link = asl.querySelector(".accordian_collapse_list");
//       // if (Accordian_link.classList.contains("collapsed")) {
//       //   arrow.classList.add("active");
//       // } else {
//       //   arrow.classList.remove("active");
//       // }
//       let menu_id = Accordian_link.getAttribute("id");
      
//       if ((document.getElementById(menu_id).style.height) < '0px'){
//         arrow.classList.add("active");
//       } else{
//         arrow.classList.remove("active");
//       }
//     });
//   });
</script>
  <script>
//         let dashboard = document.querySelector("#dashboard");
//     window.localStorage.setItem('token', "{{$token}}");
// if (dashboard) {

//   Highcharts.chart("TreeChart", {
//     chart: {
//       type: "treemap",
//     },
//     credits: {
//       enabled: false,
//     },
//     title: {
//       text: "",
//     },
//     tooltip: {
//       enabled: true,
//       borderWidth: 0,
//       outside: true,
//       useHTML: true,
//       className: "test",
//       formatter() {
//         return this.point.options.name;
//       },
//     },
//     series: [
//       {
//         cursor: "pointer",
//         borderWidth: 2,
//         borderColor: "#fff",
//         //type: "treemap",
//         layoutAlgorithm: "strip",
//         states: {
//           hover: {
//             borderColor: undefined,
//             brightness: -0.1,
//           },
//         },

//         data: [
//           // {
//           //   id: "A",
//           //   name: "Apples",
//           //   color: "#EC2500",
//           // },
//           // {
//           //   id: "B",
//           //   name: "Bananas",
//           //   color: "#ECE100",
//           // },
//           // {
//           //   id: "O",
//           //   name: "Oranges",
//           //   color: "#EC9800",
//           // },
//           {
//             name: "SARAWAK",
//             // parent: "A",
//             value: 120,
//             color: "#8bc8f7",
//           },
//           {
//             name: "SABAH",
//             // parent: "A",
//             value: 38,
//             color: "#ec38cf",
//           },
//           {
//             name: "TERENGGANU",
//             // parent: "A",
//             value: 4,
//             color: "#90a518",
//           },
//           {
//             name: "KELANTAN",
//             // parent: "B",
//             value: 33,
//             color: "#8bc8f7",
//           },
//           {
//             name: "PELBAGAI NEGERI",
//             // parent: "B",
//             value: 43,
//             color: "#8cf78d",
//           },
//           {
//             name: "PAHANG",
//             // parent: "B",
//             value: 38,
//             color: "#15c2ed",
//           },
//           {
//             name: "JOHOR",
//             // parent: "O",
//             value: 30,
//             color: "#42aaa9",
//           },
//           {
//             name: "MELAKA",
//             // parent: "O",
//             value: 18,
//             color: "#cea936",
//           },
//           {
//             name: "PULAU PIN",
//             // parent: "O",
//             value: 18,
//             color: "#ac1a97",
//           },
//           {
//             name: "PERAK",
//             // parent: "O",
//             value: 28,
//             color: "#46b4f3",
//           },
//           {
//             name: "SELANGOR",
//             // parent: "O",
//             value: 18,
//             color: "#15c2ed",
//           },
//           {
//             name: "NEGE...",
//             // parent: "O",
//             value: 12,
//             color: "#dd8458",
//           },
//           {
//             name: "KEDAH",
//             // parent: "O",
//             value: 25,
//             color: "#b3b3b3",
//           },
//           {
//             name: "WILAYAH PERSE",
//             // parent: "O",
//             value: 18,
//             color: "#009ff0",
//           },
//           {
//             name: "PERLIS",
//             // parent: "O",
//             value: 7,
//             color: "#dca212",
//           },
//         ],
//         title: {
//           text: "Fruit consumption",
//         },
//         dataLabels: {
//           align: "left",
//           verticalAlign: "top",
//           useHTML: true,
//           allowOverlap: true,
//           crop: false,
//           overflow: "allow",
//           formatter() {
//             // Get the font colour based on the background colour of the section

//             let fontColor = "#FFF";

//             // if (this.point.categoryColor === Theme.HighContrastAAA) {
//             //   fontColor = Color.getFontColor(this.point.color, true, Theme.HighContrastAAA);
//             // }

//             let height = this.point.shapeArgs.height - 5;
//             // console.log(height);
//             const value = this.point.percent
//               ? this.point.percent
//               : this.point.value;
//             let label =
//               '<div style="color: ' +
//               fontColor +
//               ";height:" +
//               height +
//               'px;"><div class="data-label ' +
//               "top" +
//               (true === true ? " scaled" : "") +
//               '" ><div class="value">' +
//               this.point.name +
//               '</div><div class="data-label-desc"><span class="name">' +
//               value +
//               "</span>";

//             if (this.point.iconClass) {
//               label =
//                 label + '<i class="icon ' + this.point.iconClass + '"></>';
//             }

//             label = label + "</div></div></div>";

//             return label;
//           },
//         },
//         // point: {
//         //   events: {
//         //     click() {
//         //       if (true) {
//         //         const event = WindowFills.customEvent(window, "click.treemap", {
//         //           detail: this.options,
//         //         });
//         //         self.container.dispatchEvent(event);
//         //       } else {
//         //         return;
//         //       }
//         //     },
//         //   },
//         // },
//       },
//     ],
//     legend: {
//       enabled: false,
//     },
//   });
  
// }
$(document).ready(function() {
  $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    var negeri =  {{$negeri}}; console.log(negeri)
    var daerah =  {{$daerah}}; console.log(daerah)
    var bahagian =  {{$bahagian}}; console.log(bahagian)
    let userType = {{$user}};
    var data_url='';
    if(userType==1)
    {
        data_url= api_url+"api/project/get-dashboard-data?search_data="+daerah+"&type="+"daerah";
    }
    else if(userType==2)
    {
        data_url= api_url+"api/project/get-dashboard-data?search_data="+negeri+"&type="+"negeri";
    }
    else if(userType==3)
    {
        data_url= api_url+"api/project/get-dashboard-data?search_data="+bahagian+"&type="+"bahagian";
    }
    else if(userType==4)
    {
        data_url= api_url+"api/project/get-dashboard-data?search_data="+bahagian+"&type="+"bkor";
    }
    else
    {
        data_url= api_url+"api/project/get-dashboard-data?search_data="+daerah+"&type="+"daerah";
    }

      $.ajaxSetup({
          headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
              }
        });
      $.ajax({
          type: "GET",
          url: data_url,
          dataType: 'json',
          success: function (result) { console.log(result);
            $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");

            if(result.jumlah_count)
            {
                document.getElementById("jumlah_permohonan").innerHTML = result.jumlah_count;
            }
            var jenis_count=[result.jenis_count,result.jenis_sambungan_count]; console.log(jenis_count)

            // Highcharts.chart("application_Bar_chart", {
            //             chart: { type: "bar", },
            //             title: {
            //             text: "Jenis Permohonan",
            //             style: {
            //                 fontWeight: 600,
            //             },
            //             },
            //             subtitle: {
            //             text: "",
            //             },
            //             xAxis: {
            //             categories: ["Baharu", "Sambungan"],
            //             title: {
            //                 text: "Jenis Permohonan",
            //                 align: "middle",
            //                 style: {
            //                 fontWeight: 600,
            //                 },
            //             },

            //             rotation: 90,
            //             },
            //             yAxis: {
            //             min: 0,
            //             tickInterval: 10,

            //             title: {
            //                 text: "Bilangan ",
            //                 align: "middle",
            //             },
            //             labels: {
            //                 overflow: "justify",
            //             },
            //             },
            //             plotOptions: {
            //             bar: {
            //                 dataLabels: {
            //                 enabled: true,
            //                 inside: true,
            //                 // verticalAlign: "middle", // Position them vertically in the middle
            //                 align: "center",
            //                 // x: -50,
            //                 style: {
            //                     color: "white", // Make the labels white
            //                 },
            //                 },
            //             },
            //             },

            //             legend: {
            //             enabled: false,
            //             },
            //             credits: {
            //             enabled: false,
            //             },

            //             series: [
            //             {
            //                 colorByPoint: true,
            //                 colors: ["#14c9c0", "#c267b6"],

            //                 data: jenis_count,
            //             },
            //             ],
            //     });
  
          },
          error: function(error) {

        }
      });
});


  $(document).ready(function(){
    var checkclass=$("#permohonan").hasClass("show")
    var checkClass2=$("#value_management").hasClass("show")
    var checkClass3=$("#pentadbir").hasClass("show")
    var checkClass4=$("#permohonan2").hasClass("show")
    var checkClass5=$("#value_management2").hasClass("show")
    var checkClass6=$("#perunding").hasClass("show")
    var checkClass7=$("#notice").hasClass("show")



    $("#PermohonanBtn").click(function(){
      document.getElementById("PermohonanBtn").removeAttribute("href");
      $("#value_management").slideUp("slow")
      if(checkclass==false){
        $("#permohonan").slideToggle("slow");
      }
    })
    $("#valuemanagementBtn").click(function(){
      document.getElementById("valuemanagementBtn").removeAttribute("href");
      $("#permohonan").slideUp("slow")
      if(checkClass2==false){
        $("#value_management").slideToggle("slow"); 
      }
    })
    
    $("#pentadbirBtn").click(function(){
      document.getElementById("pentadbirBtn").removeAttribute("href");
      $("#permohonan2").slideUp("slow");
      $("#value_management2").slideUp("slow");
      if(checkClass3==false){
        $("#pentadbir").slideToggle("slow"); 
      }
    })

    $("#PermohonanBtn2").click(function(){
      document.getElementById("PermohonanBtn2").removeAttribute("href");
      $("#pentadbir").slideUp("slow");
      $("#value_management2").slideUp("slow");
      if(checkClass4==false){
        $("#permohonan2").slideToggle("slow"); 
      }
    })

    $("#valuemanagementBtn2").click(function(){
      document.getElementById("valuemanagementBtn2").removeAttribute("href");
      $("#pentadbir").slideUp("slow");
      $("#permohonan2").slideUp("slow");
      if(checkClass5==false){
        $("#value_management2").slideToggle("slow"); 
      }
    })

    $("#perundingBtn").click(function(){
      document.getElementById("perundingBtn").removeAttribute("href");
      $("#pentadbir").slideUp("slow");
      $("#permohonan2").slideUp("slow");
      if(checkClass6==false){
        $("#perunding").slideToggle("slow"); 
      }
    })
    $("#nocBtn").click(function(){
      document.getElementById("nocBtn").removeAttribute("href");
      $("#pentadbir").slideUp("slow");
      $("#permohonan2").slideUp("slow");
      if(checkClass7==false){
        $("#notice").slideToggle("slow"); 
      }
    })

    $("#RollingPlanBtn").click(function(){
      document.getElementById("RollingPlanBtn").removeAttribute("href");
      $("#permohonan").slideUp("slow")
      if(checkClass2==false){
        $("#rolling_plan").slideToggle("slow"); 
      }
    })
    
  })

  $("#dropdownMenuButton").click(function(){
    $(".dropdown-menu").toggle();
  })

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
      let Accordian_link = asl.querySelector(".accordian_collapse_list");
      // if (Accordian_link.classList.contains("collapsed")) {
      //   arrow.classList.add("active");
      // } else {
      //   arrow.classList.remove("active");
      // }
      let menu_id = Accordian_link.getAttribute("id");
      
      if ((document.getElementById(menu_id).style.height) < '0px'){
        arrow.classList.add("active");
      } else{
        arrow.classList.remove("active");
      }
    });
  });
</script>