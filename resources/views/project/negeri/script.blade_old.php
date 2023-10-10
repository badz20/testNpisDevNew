
    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js"></script>
    
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@^3.1.3/dist/esri-leaflet-geocoder.css">
    <script src="https://unpkg.com/esri-leaflet-geocoder@^3.1.3/dist/esri-leaflet-geocoder.js"></script>

    <link rel="stylesheet" href="https://js.arcgis.com/4.26/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.26/"></script>
    
<script>
 calcite.init()
var numnegeri=1;
var options="";
var intialclick=true;
var Negeri_ID="";
    $(document).ready(function() {
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
        
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
            const currentUrl = window.location.href;
            const url = new URL(currentUrl);
            const pathname = url.pathname; console.log(pathname)
            const parts = pathname.split('/'); console.log(parts[4])
            let workflow = 0;
            if(parts[4]!=='')
            {
                workflow = parts[4];   
                localStorage.setItem("workflow_status",workflow);   
            }
            else
            {
                workflow = localStorage.getItem("workflow_status");   
            }

        let userType = {{$user}}; console.log(userType)
        let projectType = localStorage.getItem("project_type");  console.log("project type ->" + projectType)
        let penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1)
        let penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2)
        let pengesah =  {{$pengesah}}; console.log(pengesah)

        if(projectType=="negeri")
        { 
            document.getElementById('indicator-negeri-view').classList.remove("d-none");
            document.getElementById('indicator-negeri-view-vertical').classList.remove("d-none");
        }
        else if(projectType=="bahagian")
        {  
            document.getElementById('indicator-bahagian-view').classList.remove("d-none");
            document.getElementById('indicator-bahagian-view-vertical').classList.remove("d-none");
        }
        else
        { 
            document.getElementById('indicator-daerah').classList.remove("d-none");
            document.getElementById('indicator-daerah-vertical').classList.remove("d-none");
        }
        
           if(workflow==1)
          {
              document.getElementById('daerah_penya_view').classList.add("yellow");
              document.getElementById('baha_penya_view').classList.add("yellow");
              document.getElementById('negeri_penya_view').classList.add("yellow");            
          }
          else if(workflow==2 || workflow==3 || workflow==5)
          {
              document.getElementById('daerah_penyamak_view').classList.add("yellow");
              document.getElementById('baha_penyamak_view').classList.add("yellow");
              document.getElementById('negeri_penyamak_view').classList.add("yellow");            
          }
          else if(workflow==4 || workflow==6 || workflow==8)
          {
              document.getElementById('daerah_penya1_view').classList.add("yellow");
              document.getElementById('baha_penya1_view').classList.add("yellow");
              document.getElementById('negeri_penya1_view').classList.add("yellow");            
          }
          else if(workflow==7 || workflow==10 || workflow==12)
          {
              document.getElementById('daerah_penya2_view').classList.add("yellow");
              document.getElementById('baha_penya2_view').classList.add("yellow");
              document.getElementById('negeri_penya2_view').classList.add("yellow");            
          }
          else if(workflow==11 || workflow==13 || workflow==15) 
          {
              document.getElementById('daerah_pengesah_view').classList.add("yellow");
              document.getElementById('baha_pengesah_view').classList.add("yellow");
              document.getElementById('negeri_pengesah_view').classList.add("yellow");            
          }
          else if(workflow==14 || workflow==17 || workflow==18) 
          {
              document.getElementById('daerah_bkor_view').classList.add("yellow");
              document.getElementById('baha_bkor_view').classList.add("yellow");
              document.getElementById('negeri_bkor_view').classList.add("yellow");
          }
          else
          {
              
          }
    //document.getElementById("loading-bar-spinner").style.display = 'block';
    document.getElementById("image_preview_1").style.display = 'none';
    
  const 
  api_url = "{{env('API_URL')}}";
  const api_token = "Bearer "+ window.localStorage.getItem('token');


$.ajaxSetup({
		headers: {
			   "Content-Type": "application/json",
			   "Authorization": api_token,
			   }
   });

    
var negeridropDown =  document.getElementById("select_negeri");
var negeriData =  document.getElementById("negeriData");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/negeri/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
                    options = options + '<option value="' + item.id + '">' + item.nama_negeri + '</option>'
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_negeri;
                    el.value = opt;
                    negeridropDown.appendChild(el);
                })
                $.each(result.data, function (key, item) {
                    options = options + '<option value="' + item.id + '">' + item.nama_negeri + '</option>'
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_negeri;
                    el.value = opt;
                    negeriData.appendChild(el);
                })

            }
            else {
                $.Notification.error(result.Message);
            }
        }
    })
    .then(result1 => {


        const project_id = document.getElementById("project_id").value;  console.log(project_id);
    $.ajax({
        type: "GET",
        url: api_url+"api/project/negeri-details/"+project_id,
        dataType: 'json',
        success: function (result) { 
            negeridetails = result.data.negeri;
            negeriselectiontype = result.data.negeriselection;
            // console.log(result.data);
            
            if (negeridetails) { 

                if(negeridetails.length > 0) {
                    intialclick=false;
                    $('#negeribox').empty();
                    numnegeri = 0;
                    let negerilokasi = "";
                    negeridetails.forEach((item) => {
                        numnegeri += 1;


                        if(item.negeri_id != Negeri_ID){
                            Negeri_ID = item.negeri_id;
                            negerilokasi = `<div class="row p-2 negerirow">
                                <div class="col-md-3 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                                        <select class="form-control negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                            `+options+`   
                                        </select>
                                        <span class="error" id="error_select_negeri"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                                        <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                        </select>
                                        <span class="error" id="error_select_daerah"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="nageri_select_inputs input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                                        <select class="form-control" id="select_mukkim" name="select_mukkim">
                                        <option value="0" disabled selected hidden>--Pilih--</option>
                                        </select>
                                        <span class="error" id="error_select_mukkim"></span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                                        <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                        </select>
                                        <span class="error" id="error_select_parlimen"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                                            <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                            </select>
                                            <span class="error" id="error_select_dun"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 col-xs-12">
                                    <div class="d-flex lokasi_footer">
                                        <div class="" data-negeri="`+numnegeri+`">
                                            <button type="button" id="addbtndaerah" class="ml-auto add-tr-btn-daerah btn_`+numnegeri+`" style="background:white;border: none">
                                                <img
                                                src="{{ asset('assets/images/Add_box1.png') }}"
                                                alt=""
                                                />
                                            </button> 
                                        </div>
                                        <div>
                                            <button type="button" id="minus_button" class="" style="background:white;border:none;">
                                                <img
                                                src="{{ asset('assets/images/minus.png') }}"
                                                alt="minus"
                                                />
                                            </button>
                                        </div>
                                    </div>                               
                                </div>  
                        </div><!-- row ends -->`;

                        }
                        else{
                            negerilokasi = `<div class="row p-2 negerirow">
                                <div class="col-md-3 col-xs-12 invisible_negeri">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group invisible">
                                        <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                                        <select class="form-control invisible negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                            `+options+`   
                                        </select>
                                        <span class="error" id="error_select_negeri"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                                        <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                        </select>
                                        <span class="error" id="error_select_daerah"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="nageri_select_inputs input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                                        <select class="form-control col-md-10 col-xs-12" id="select_mukkim" name="select_mukkim">
                                        <option value="0" disabled selected hidden>--Pilih--</option>
                                        </select>
                                        <span class="error" id="error_select_mukkim"></span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                        <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                                        <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                                            <option value="0" disabled selected hidden>--Pilih--</option>
                                        </select>
                                        <span class="error" id="error_select_parlimen"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div class="input_fill_content">
                                        <div class="form-group nageri_form_group">
                                            <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                                            <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                                                <option value="0" disabled selected hidden>--Pilih--</option>   
                                            </select>
                                            <span class="error" id="error_select_dun"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 col-xs-12">
                                    <div class="d-flex lokasi_footer">
                                        <button type="button" id="minus_button" class="" style="background:white;border:none;">
                                        <img
                                        src="{{ asset('assets/images/minus.png') }}"
                                        alt="minus"
                                        />
                                        </button>
                                    </div>
                                </div>     
                            </div><!-- row ends -->`;
                        }
                        
                        $("#negeribox").append(negerilokasi);

                    });

                    // -----------to add daerah within negeri------------------------------------------

    // -------------------------------------------------------------------------------------

    $(".add-tr-btn-daerah").bind("click", function () {
        var i = $(this).parent().attr('data-negeri');

        

        //var opt = document.querySelectorAll('daerah_1').options;
        var daerahopt="";
        var parlimenopt="";
        var dunopt="";
        
        var negeriid=  $(".negeri_"+i).val()
        //var daerahid= $(".daerah_"+i).val()
        var parlimenid= $(".parlimen_"+i).val()
        var dunid= $(".dun_"+i).val()

        
        $(".daerah_"+i+" option").each(function()
        {
            daerahopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });

        $(".parlimen_"+i+" option").each(function()
        {
            parlimenopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });

        $(".dun_"+i+" option").each(function()
        {
            dunopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });



        console.log( $(".negeri_"+i).val())

        numnegeri += 1;
        let negerilokasi = `<div class="row p-2 negerirow">
        <div class="col-md-3 col-xs-12 invisible_negeri">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group invisible">
                    <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                    <select class="form-control invisible negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+options+`   
                    </select>
                    <span class="error" id="error_select_negeri"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                    <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+daerahopt+`
                    </select>
                    <span class="error" id="error_select_daerah"></span>
                </div>
            </div>
            <!-- <div class="nageri_select_inputs input_fill_content">
                <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                <select class="form-control col-md-10 col-xs-12" id="select_mukkim" name="select_mukkim">
                <option value="0" disabled selected hidden>--Pilih--</option>
                </select>
                <span class="error" id="error_select_mukkim"></span>
                </div>
            </div> -->
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                    <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+parlimenopt+`
                    </select>
                    <span class="error" id="error_select_parlimen"></span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                    <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+dunopt+`
                    </select>
                    <span class="error" id="error_select_dun"></span>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-xs-12">
            <div class="d-flex lokasi_footer">
                <button type="button" id="minus_button" class="" style="background:white;border:none;">
                <img src="{{ asset('assets/images/minus.png') }}"
                alt="minus"/>
                </button>
            </div>
        </div> 
        <hr />                
    </div><!-- row ends -->`;

    //$('#negeribox').append(negerilokasi);
    var closestrow = $(this).closest('.negerirow');
    $(negerilokasi).insertAfter(closestrow);

   

    $(".negeri_"+numnegeri).val(negeriid)
    //$(".daerah_"+numnegeri).val(daerahid)
    $(".parlimen_"+numnegeri).val(parlimenid)
    $(".dun_"+numnegeri).val(dunid)

    let all_negeri_btn = document.querySelectorAll(
                    "[id='minus_button']"                    
                ); 

                let all_negeri_div = document.querySelectorAll(".negerirow");               
                all_negeri_btn.forEach((tb, i) => {                    
                    tb.addEventListener("click", () => {
                        all_negeri_div[i].remove();                        
                    });
                });
});
    
        // --------------------------------------------------------------------------------------
    
    // -----------to add daerah within negeri ends ----------------------------------------------

                    let all_negeri_btn = document.querySelectorAll(
                        "[id='minus_button']"                    
                    ); 

                    let all_negeri_div = document.querySelectorAll(".negerirow");               
                    all_negeri_btn.forEach((tb, i) => {                    
                        tb.addEventListener("click", () => {
                            all_negeri_div[i].remove();                        
                        });
                    });
                    
                    var negeri_selection_type = 0; 
                    var negeriselectioncntrl = document.querySelectorAll("[id='negeriselection']");
                    
                    if(parseInt(negeriselectiontype[0]['negeri_selection_type']) == 0){
                        negeriselectioncntrl[0].checked=true;
                    }
                    else{
                        negeriselectioncntrl[1].checked=true;
                        document.getElementById("addbtndiv").style = "display: block;";
                    }

                    
                    
                    
                    let negerirow = document.querySelectorAll(".negerirow");
                    let fetchall_negeri = document.querySelectorAll("[id='select_negeri']");
                    let fetchall_daerah = document.querySelectorAll("[id='select_daerah']");
                    let fetchall_parlimen = document.querySelectorAll("[id='select_parlimen']");
                    let fetchall_dun = document.querySelectorAll("[id='select_dun']");
                                      

                    if(negerirow.length>0){
                        for (var i = 0;i < negerirow.length; i++) {                         
                        
                            negeriid=parseInt(negeridetails[i]['negeri_id']);
                            daerahid = parseInt(negeridetails[i]['daerah_id']);
                            parlimenid = parseInt(negeridetails[i]['parlimen_id']);
                            dunid = parseInt(negeridetails[i]['dun_id']);
                            loadDaerahData(negeriid,daerahid,parlimenid,dunid,i+1);

                        }
                    }
                }
                let all_negeri_btn = document.querySelectorAll(
                    "[id='minus_button']"                    
                ); 

                let all_negeri_div = document.querySelectorAll(".negerirow");               
                all_negeri_btn.forEach((tb, i) => {                    
                    tb.addEventListener("click", () => {
                        all_negeri_div[i].remove();                        
                    });
                });

            
                // console.log("found")


                
                //loadDaerahData(result.data.negeri.negeri_id,result.data.negeri.daerah_id,result.data.negeri.parlimen_id,result.data.negeri.dun_id);
                console.log("koordinat")
                
                console.log(negeriselectiontype[0]['koordinat_latitude'])

                    if(negeriselectiontype[0]['koordinat_latitude'] != ""){
                        document.getElementById("latitude").value = negeriselectiontype[0]['koordinat_latitude'];
                    }

                    if(negeriselectiontype[0]['koordinat_longitude'] != ""){
                        document.getElementById("logitude").value = negeriselectiontype[0]['koordinat_longitude'];
                    }
                    var lat=$("#latitude").val()
                    var lng=$("#logitude").val()
                    var negeriName=$("#NegeriName").val()
                    console.log(lat,lng,negeriName);

                    if(lat !="" && lng!=""){ 
                        map.setView([lat,lng], 15);
                        var latlng = {lat:lat, lng:lng};
                        const marker = L.marker(latlng);
                        const lngLatString = `${lat}, ${lng}`;
                        marker.bindPopup(`<b>${lngLatString}</b><p>${negeriName}</p>`);
                        results.addLayer(marker);
                        
                        marker.openPopup();  
                      };
                // document.getElementById("select_daerah").value= result.data.negeri.daerah_id;
                // document.getElementById("select_mukkim").value= result.data.negeri.mukim_id;
                // document.getElementById("select_parlimen").value= result.data.negeri.parlimen_id;
                //document.getElementById("latitude").value= result.data.negeri.koordinat_latitude;
                //document.getElementById("logitude").value= result.data.negeri.koordinat_longitude;
                // console.log(typeof(result.data.negeri.koordinat_latitude))
                // console.log(typeof(result.data.negeri.koordinat_longitude))

                // $("#latitude").val(result.data.negeri.koordinat_latitude);
                // $("#logitude").val(result.data.negeri.koordinat_longitude);
                // if(result.data.negeri.koordinat_latitude!='' && result.data.negeri.koordinat_longitude!=''){
                    
                //     var lat=parseFloat(result.data.negeri.koordinat_latitude);
                //     var lng=parseFloat(result.data.negeri.koordinat_longitude);
                    
                //     initMap(lat,lng);

                //     var map;
                //     var marker;
                //     var geocoder;
                //     var responseDiv;
                //     var response;
                //     var Mlat=3.144667094893797;
                //     var Mlng=101.639596390336; 
                //     function initMap(lat,lng) {
                    
                //     const coords = { lat: lat, lng: lng};
                //     //    console.log(coords) 
                //         map = new google.maps.Map(document.getElementById("my_map"), {
                //         zoom: 15,
                //         center: coords,
                //         mapTypeControl: false,
                //     });
                //        marker = new google.maps.Marker({
                //       position: coords,
                //       map: map,
                //     });
                //     geocoder = new google.maps.Geocoder();
                //     // console.log(geocoder);
                //     const inputText = document.createElement("input");

                //     inputText.type = "text";
                //     inputText.placeholder = "Enter a location";

                //     const submitButton = document.createElement("input");

                //     submitButton.type = "button";
                //     submitButton.value = "Search";
                //     submitButton.classList.add("button", "button-primary");

                //     const clearButton = document.createElement("input");

                //     clearButton.type = "button";
                //     clearButton.value = "Clear";
                //     clearButton.classList.add("button", "button-secondary");
                //      response = document.createElement("pre");
                //     response.id = "response";
                //     response.innerText = "";
                //      responseDiv = document.createElement("div");
                //     responseDiv.id = "response-container";
                //     responseDiv.appendChild(response);

                //     const instructionsElement = document.createElement("p");

                //     instructionsElement.id = "instructions";
                //     instructionsElement.innerHTML =
                //         "<strong>Instructions</strong>: Enter an address in the textbox to geocode or click on the map to reverse geocode.";
                //     map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
                //     map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
                //     map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
                //     // map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
                //     // map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
                    
                //     map.addListener("click", (e) => {
                //       geocode({ location: e.latLng });
                //     });
                //     submitButton.addEventListener("click", () =>
                //         geocode({ address: inputText.value })
                //     );
                //     clearButton.addEventListener("click", () => {
                //         clear();

                //         $("#latitude").val("");
                //         $("#logitude").val("");
                //         initMap(Mlat,Mlng);
                //         map.setZoom(5);
                //     marker.setMap(null);


                //     });
                //     clear();
                //     }

                //     function clear() {
                //     // marker.setMap(null);
                //     // responseDiv.style.display = "none";
                //     }
                    
                //     function geocode(request) {
                //         // console.log(request)
                //     clear();
                //     console.log(geocoder)
                //     geocoder.geocode(request).then((result) => {
                //         // console.log(result)

                //         const { results } = result;

                //         map.setCenter(results[0].geometry.location);
                //         map.setZoom(15);
                //         marker.setPosition(results[0].geometry.location);
                //         marker.setMap(map);



                //         // responseDiv.style.display = "block";
                //         response.innerText = JSON.stringify(result);
                //         var parsed_val=JSON.parse(response.innerText)
                //         console.log(parsed_val)
                //         $("#latitude").val(parsed_val.results[0].geometry.location.lat)
                //         $("#logitude").val(parsed_val.results[0].geometry.location.lng)

                //         return results;
                //         })
                //         .catch((e) => {
                //         alert("Geocode was not successful for the following reason: " + e);
                //         });
                //     }

                //     window.initMap = initMap;
                // }

                
            }
            else
            {
                
            }
           
            if(result.data.documents)
            {
                var table = document.getElementById("table_body");

                for(let i=0;i<result.data.documents.length;i++)
                {
                    console.log(result.data.documents[i])
                    var document_1 = result.data.documents[i].projek_negeri_dokumen_name;
                    var spilted=document_1.split("/"); console.log(spilted)
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.style.textAlign = "center";


                    var imageDiv = '<div class="nageri_table_img"><p>'+spilted[0]+
                                    '</p><p>'+spilted[1]+'</p></div>';
                    var descripDiv = '<div class="nageri_table_text"><p>'+result.data.documents[i].keterangan+'</p></div>';
                    var removDiv = '<button type="button" @if($is_submitted) disabled @endif onClick="removeImage('+result.data.documents[i].id+','+i+')" class="nageri_table_btn"><div class="nageri_union"><img src="{{ asset('assets/images/Union.png') }}" alt="close"/></div>'
                                    +"Padam"+'</button>';
                    cell1.innerHTML = i+1;
                    cell2.innerHTML = imageDiv;
                    cell3.innerHTML = descripDiv;
                    cell4.innerHTML = removDiv;
                    
                }
            }
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            //document.getElementById("loading-bar-spinner").style.display = 'none';

        }
    });
    
        
  });




    // $("#select_negeri").on('change', function(){ 

    //     negeri = document.getElementById("select_negeri").value;
    //     var daerahdropDown =  document.getElementById("select_daerah");
    //     $("#select_daerah").empty();
    //     var opt = 0;
    //     var el = document.createElement("option"); console.log(el)
    //         el.textContent = '--Pilih--';
    //         el.value = opt;
    //         daerahdropDown.appendChild(el);

    //     $.ajax({
    //         type: "GET",
    //         url: api_url+"api/lookup/daerah/list?id="+negeri,
    //         dataType: 'json',
    //         success: function (result) { console.log(result)
    //             if (result) {
    //                 $.each(result.data, function (key, item) {
    //                     var opt = item.id;
    //                     var el = document.createElement("option");
    //                     el.textContent = item.nama_daerah;
    //                     el.value = opt;
    //                     daerahdropDown.appendChild(el);
    //                 })
    //             }
    //             else {
    //                 $.Notification.error(result.Message);
    //             }
    //         }
    //     });

    //     var parlimendropDown =  document.getElementById("select_parlimen");
    //     $("#select_parlimen").empty();
    //     var opt = 0;
    //     var el = document.createElement("option"); console.log(el)
    //         el.textContent = '--Pilih--';
    //         el.value = opt;
    //         parlimendropDown.appendChild(el);
    //     $.ajax({
    //         type: "GET",
    //         url: api_url+"api/lookup/parlimen/list?id="+negeri,
    //         dataType: 'json',
    //         success: function (result) { console.log(result)
    //             if (result) {
    //                 $.each(result.data, function (key, item) {
    //                     var opt = item.id;
    //                     var el = document.createElement("option");
    //                     el.textContent = item.nama_parlimen;
    //                     el.value = opt;
    //                     parlimendropDown.appendChild(el);
    //                 })
    //             }
    //             else {
    //                 $.Notification.error(result.Message);
    //             }
    //         }
    //     });

    // });

    // $("#select_daerah").on('change', function(){ 

    //     daerah = document.getElementById("select_daerah").value;

    //     // var mukkimdropDown =  document.getElementById("select_mukkim");
    //     // $("#select_mukkim").empty();
    //     // var opt = 0;
    //     // var el = document.createElement("option"); console.log(el)
    //     //     el.textContent = '--Pilih--';
    //     //     el.value = opt;
    //     //     mukkimdropDown.appendChild(el);

    //     // $.ajax({
    //     //     type: "GET",
    //     //     url: api_url+"api/lookup/mukim/list?id="+daerah,
    //     //     dataType: 'json',
    //     //     success: function (result) { console.log(result)
    //     //         if (result) {
    //     //             $.each(result.data, function (key, item) {
    //     //                 var opt = item.id;
    //     //                 var el = document.createElement("option");
    //     //                 el.textContent = item.nama_mukim;
    //     //                 el.value = opt;
    //     //                 mukkimdropDown.appendChild(el);
    //     //             })
    //     //         }
    //     //         else {
    //     //             $.Notification.error(result.Message);
    //     //         }
    //     //     }
    //     // });

    // });

    // $("#select_parlimen").on('change', function(){ 

    //     parlimen = document.getElementById("select_parlimen").value;

    //         var dundropDown =  document.getElementById("select_dun");
    //         $("#select_dun").empty();
    //         var opt = 0;
    //         var el = document.createElement("option"); console.log(el)
    //         el.textContent = '--Pilih--';
    //         el.value = opt;
    //         dundropDown.appendChild(el);

    //         $.ajax({
    //             type: "GET",
    //             url: api_url+"api/lookup/dun/list?id="+parlimen,
    //             dataType: 'json',
    //             success: function (result) { console.log(result)
    //                 if (result) {
    //                     $.each(result.data, function (key, item) {
    //                         var opt = item.id;
    //                         var el = document.createElement("option");
    //                         el.textContent = item.nama_dun;
    //                         el.value = opt;
    //                         dundropDown.appendChild(el);
    //                     })
    //                 }
    //                 else {
    //                     $.Notification.error(result.Message);
    //                 }
    //             }
    //         });
    // });

    

    // *************Fetch negeri lokasi *****************************
    $(".add-tr-btn").bind("click", function () {
        numnegeri += 1;
    let negerilokasi = `<div class="row p-2 negerirow" style="border-top: 1px solid lightgrey;">
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                    <select class="form-control negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+options+`   
                    </select>
                    <span class="error" id="error_select_negeri"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                    <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                    <option value="0" disabled selected hidden>--Pilih--</option>
                    </select>
                    <span class="error" id="error_select_daerah"></span>
                </div>
            </div>
            <!-- <div class="nageri_select_inputs input_fill_content">
                <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                <select class="form-control" id="select_mukkim" name="select_mukkim">
                <option value="0" disabled selected hidden>--Pilih--</option>
                </select>
                <span class="error" id="error_select_mukkim"></span>
                </div>
            </div> -->
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                    <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                    </select>
                    <span class="error" id="error_select_parlimen"></span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                    <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                    <option value="0" disabled selected hidden>--Pilih--</option>
                    </select>
                    <span class="error" id="error_select_dun"></span>
                </div>
            </div>           
        </div>
        <div class="col-md-1 col-xs-12">
            <div class="d-flex lokasi_footer">
                <div class="" data-negeri="`+numnegeri+`">
                    <button type="button" id="addbtndaerah" class="ml-auto add-tr-btn-daerah btn_`+numnegeri+`" style="background:white;border: none">
                        <img
                        src="{{ asset('assets/images/Add_box1.png') }}"
                        alt=""
                        />
                    </button> 
                </div>
                <div>
                    <button type="button" id="minus_button" class="" style="background:white;border:none;">
                        <img
                        src="{{ asset('assets/images/minus.png') }}"
                        alt="minus"
                        />
                    </button>
                </div>
            </div>                               
        </div>
        <hr />                
    </div><!-- row ends -->`;

    $('#negeribox').append(negerilokasi);

    let all_negeri_btn = document.querySelectorAll(
                    "[id='minus_button']"                    
                ); 

                let all_negeri_div = document.querySelectorAll(".negerirow");               
                all_negeri_btn.forEach((tb, i) => {                    
                    tb.addEventListener("click", () => {
                        all_negeri_div[i].remove();                        
                    });
                });

// -----------to add daerah within negeri------------------------------------------

$(".btn_"+numnegeri).bind("click", function () {

        
var i = $(this).parent().attr('data-negeri');



//var opt = document.querySelectorAll('daerah_1').options;
var daerahopt="";
var parlimenopt="";
var dunopt="";

var negeriid=  $(".negeri_"+i).val()
//var daerahid= $(".daerah_"+i).val()
var parlimenid= $(".parlimen_"+i).val()
var dunid= $(".dun_"+i).val()


$(".daerah_"+i+" option").each(function()
{
    daerahopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
    
});

$(".parlimen_"+i+" option").each(function()
{
    parlimenopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
    
});

$(".dun_"+i+" option").each(function()
{
    dunopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
    
});



console.log( $(".negeri_"+i).val())

numnegeri += 1;
let negerilokasi = `<div class="row p-2 negerirow">
    <div class="col-md-3 col-xs-12 invisible_negeri">
        <div class="input_fill_content">
            <div class="form-group nageri_form_group invisible">
                <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                <select class="form-control invisible negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                    <option value="0" disabled selected hidden>--Pilih--</option>
                    `+options+`   
                </select>
                <span class="error" id="error_select_negeri"></span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-12">
        <div class="input_fill_content">
            <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                    <option value="0" disabled selected hidden>--Pilih--</option>
                    `+daerahopt+`
                </select>
                <span class="error" id="error_select_daerah"></span>
            </div>
            <!-- <div class="nageri_select_inputs input_fill_content">
                <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                <select class="form-control" id="select_mukkim" name="select_mukkim">
                <option value="0" disabled selected hidden>--Pilih--</option>
                </select>
                <span class="error" id="error_select_mukkim"></span>
                </div>
            </div> -->
        </div>
    </div>
    <div class="col-md-3 col-xs-12">
        <div class="input_fill_content">
            <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                    <option value="0" disabled selected hidden>--Pilih--</option>
                    `+parlimenopt+`
                </select>
                <span class="error" id="error_select_parlimen"></span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-xs-12">
        <div class="input_fill_content">
            <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                    <option value="0" disabled selected hidden>--Pilih--</option>
                    `+dunopt+`
                </select>
                <span class="error" id="error_select_dun"></span>
            </div>
        </div>
    </div>
    <div class="col-md-1 col-xs-12">
        <div class="d-flex lokasi_footer">
            <button type="button" id="minus_button" class="" style="background:white;border:none;">
            <img
            src="{{ asset('assets/images/minus.png') }}"
            alt="minus"
            />
            </button>
        </div>
    </div> 
<hr />                
</div><!-- row ends -->`;

//$('#negeribox').append(negerilokasi);
var closestrow = $(this).closest('.negerirow');
$(negerilokasi).insertAfter(closestrow);



$(".negeri_"+numnegeri).val(negeriid)
//$(".daerah_"+numnegeri).val(daerahid)
$(".parlimen_"+numnegeri).val(parlimenid)
$(".dun_"+numnegeri).val(dunid)

let all_negeri_btn = document.querySelectorAll(
            "[id='minus_button']"                    
        ); 

        let all_negeri_div = document.querySelectorAll(".negerirow");               
        all_negeri_btn.forEach((tb, i) => {                    
            tb.addEventListener("click", () => {
                all_negeri_div[i].remove();                        
            });
        });
});




// -----------to add daerah within negeri ends ------------------------------------------

});
        
    // -----------to add daerah within negeri------------------------------------------

//     $(".add-tr-btn-daerah").bind("click", function () {

        
//         var i = $(this).parent().attr('data-negeri');

        

//         //var opt = document.querySelectorAll('daerah_1').options;
//         var daerahopt="";
//         var parlimenopt="";
//         var dunopt="";
        
//         var negeriid=  $(".negeri_"+i).val()
//         var daerahid= $(".daerah_"+i).val()
//         var parlimenid= $(".parlimen_"+i).val()
//         var dunid= $(".dun_"+i).val()

        
//         $(".daerah_"+i+" option").each(function()
//         {
//             daerahopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
//         });

//         $(".parlimen_"+i+" option").each(function()
//         {
//             parlimenopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
//         });

//         $(".dun_"+i+" option").each(function()
//         {
//             dunopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
//         });



//         console.log( $(".negeri_"+i).val())

//         numnegeri += 1;
//         let negerilokasi = `<div class="row mt-2 p-4 negerirow">
//         <div class="col">
//             <div class="nageri_select_parent">
//             <div class="nageri_select_inputs input_fill_content">
//                 <div class="form-group nageri_form_group invisible">
//                 <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
//                 <select class="form-control invisible negeri_`+numnegeri+`" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
//                     <option value="0" disabled selected hidden>--Pilih--</option>
//                     `+options+`   
//                 </select>
//                 <span class="error" id="error_select_negeri"></span>
//                 </div>
//             </div>
//             <div class="nageri_select_inputs input_fill_content">
//                 <div class="form-group nageri_form_group">
//                 <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
//                 <select class="form-control daerah_`+numnegeri+`" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
//                     <option value="0" disabled selected hidden>--Pilih--</option>
//                     `+daerahopt+`
//                 </select>
//                 <span class="error" id="error_select_daerah"></span>
//                 </div>
//             </div>
//             <!-- <div class="nageri_select_inputs input_fill_content">
//                 <div class="form-group nageri_form_group">
//                 <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
//                 <select class="form-control" id="select_mukkim" name="select_mukkim">
//                 <option value="0" disabled selected hidden>--Pilih--</option>
//                 </select>
//                 <span class="error" id="error_select_mukkim"></span>
//                 </div>
//             </div> -->
//             </div>
//         </div>
//         <div class="col">
//             <div class="nageri_select_parent mt-2">
//             <!-- <div class="nageri_select_inputs input_fill_content">
            
//             </div> -->
//             <div class="nageri_select_inputs input_fill_content">
//                 <div class="form-group nageri_form_group">
//                 <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
//                 <select class="form-control parlimen_`+numnegeri+`" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
//                     <option value="0" disabled selected hidden>--Pilih--</option>
//                     `+parlimenopt+`
//                 </select>
//                 <span class="error" id="error_select_parlimen"></span>
//                 </div>
//             </div>
//             <div class="nageri_select_inputs input_fill_content">
//                 <div class="form-group nageri_form_group">
//                     <div class="row">
//                         <div class="col-9">
//                             <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
//                             <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
//                                 <option value="0" disabled selected hidden>--Pilih--</option>
//                                 `+dunopt+`
//                             </select>
//                             <span class="error" id="error_select_dun"></span>
//                         </div>
//                         <div class="col">
//                             <button type="button" id="minus_button" class="" style="background:white;border:none;">
//                             <img
//                             src="{{ asset('assets/images/minus.png') }}"
//                             alt="minus"
//                             />
//                             </button>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             </div>
//         </div>  
//         <hr />                
//     </div><!-- row ends -->`;

//     //$('#negeribox').append(negerilokasi);
//     var closestrow = $(this).closest('.negerirow');
//     $(negerilokasi).insertAfter(closestrow);

   

//     $(".negeri_"+numnegeri).val(negeriid)
//     $(".daerah_"+numnegeri).val(daerahid)
//     $(".parlimen_"+numnegeri).val(parlimenid)
//     $(".dun_"+numnegeri).val(dunid)

//     let all_negeri_btn = document.querySelectorAll(
//                     "[id='minus_button']"                    
//                 ); 

//                 let all_negeri_div = document.querySelectorAll(".negerirow");               
//                 all_negeri_btn.forEach((tb, i) => {                    
//                     tb.addEventListener("click", () => {
//                         all_negeri_div[i].remove();                        
//                     });
//                 });
// });
    
    
       
    
    // -----------to add daerah within negeri ends ------------------------------------------

                

    // *************Fetch negeri lokasi ends *****************************

    

    $("#negeri_lokasi_save").click(function(){
       
        // if(document.myform.select_negeri.value==0)  { 
		// 	document.getElementById("error_select_negeri").innerHTML="Sila pilih negeri"; 
		// 	document.getElementById("select_negeri").focus();
		// 	return false; 
		// }else{document.getElementById("error_select_negeri").innerHTML="";}

        // if(document.myform.select_daerah.value==0)  { 
        //     document.getElementById("error_select_daerah").innerHTML="Sila pilih daerah"; 
        //     document.getElementById("select_daerah").focus();
        //     return false; 
        // }else{document.getElementById("error_select_daerah").innerHTML="";}

        // // if(document.myform.select_mukkim.value==0)  { 
		// // 	document.getElementById("error_select_mukkim").innerHTML="Sila pilih mukim"; 
		// // 	document.getElementById("select_mukkim").focus();
		// // 	return false; 
		// // }else{document.getElementById("error_select_mukkim").innerHTML="";}

        // if(document.myform.select_parlimen.value==0)  { 
		// 	document.getElementById("error_select_parlimen").innerHTML="Sila pilih parlimen"; 
		// 	document.getElementById("select_parlimen").focus();
		// 	return false; 
		// }else{document.getElementById("error_select_parlimen").innerHTML="";}

        // if(document.myform.select_dun.value==0)  { 
		// 	document.getElementById("error_select_dun").innerHTML="Sila pilih dun"; 
		// 	document.getElementById("select_dun").focus();
		// 	return false; 
		// }else{document.getElementById("error_select_dun").innerHTML="";}

        // if(document.myform.latitude.value=='')  { 
		// 	document.getElementById("error_latitude").innerHTML="Sila masukkan latitude"; 
		// 	document.getElementById("latitude").focus();
		// 	return false; 
		// }else{document.getElementById("error_latitude").innerHTML="";}

        // if(document.myform.logitude.value=='')  { 
		// 	document.getElementById("error_logitude").innerHTML="Sila masukkan logitude"; 
		// 	document.getElementById("logitude").focus();
		// 	return false; 
		// }else{document.getElementById("error_logitude").innerHTML="";}


        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");



      var formData = new FormData();
    //   ------------- Negeri Lokasi save start -------------------------------

    let negericmb = document.querySelectorAll("[id='select_negeri']");  
    let daerahcmb = document.querySelectorAll("[id='select_daerah']");
    let parlimencmb = document.querySelectorAll("[id='select_parlimen']");
    let duncmb = document.querySelectorAll("[id='select_dun']");
    let negerirows = document.querySelectorAll(".negerirow");


    negeritext = []  
    for (i = 0;i < negerirows.length; i++) {                         
        data= {};

        data.negeri_id = negericmb[i].value
        data.daerah_id = daerahcmb[i].value
        data.mukim_id= 1
        data.parlimen_id = parlimencmb[i].value
        data.dun_id = duncmb[i].value 
        negeritext.push(JSON.stringify(data))
    }
    negeritext.forEach((item) => {
        formData.append('negeritext[]', item);
    });
    var negeri_selection_type = 0; 
    var negeriselectioncntrl = document.querySelectorAll("[id='negeriselection']");
    for(i=0;i<negeriselectioncntrl.length;i++){
        if(negeriselectioncntrl[i].checked){
            negeri_selection_type = negeriselectioncntrl[i].value;
        }
    }
    formData.append('negeri_selection_type', negeri_selection_type);

//   ----------Negeri Save ends ----------------------------------------------

          formData.append('id', document.myform.project_id.value);
          formData.append('userid', {{Auth::user()->id}});
        //   formData.append('negeri_id', document.myform.select_negeri.value);
        //   formData.append('daerah_id', document.myform.select_daerah.value);
        //   //formData.append('mukim_id', document.myform.select_mukkim.value);
        //   formData.append('mukim_id', '1');
        //   formData.append('parlimen_id', document.myform.select_parlimen.value);
        //   formData.append('dun_id', document.myform.select_dun.value);
          formData.append('koordinat_latitude', document.myform.latitude.value);
          formData.append('koordinat_longitude', document.myform.logitude.value);
          formData.append('NegeriName', document.myform.NegeriName.value);

      console.log(formData);

      const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);


      axios({
              method: "post",
              url: api_url+"api/project/update-negeri",
              data: formData,
              headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
          })
			.then(function (response) { console.log(response.data.code);
                    if(response.data.code === '200') {	 
                        $("#add_role_sucess_modal").modal('show');
                    }else {				
                    if(response.data.code === '422') {					
                        Object.keys(response.data.data).forEach(key => {						
                        document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                        });					
                    }else {					
                        $("#sucess_modal").modal('show');
                        // location.reload()
                    }	
                    }	
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");		
			})
			.catch(function (response) {
				//handle error
				console.log(response);
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
				alert("There was an error submitting data");
			});


    });

    $('#tutup_new').click(function(){ console.log(origin)
        const project_id = document.getElementById("project_id").value;  console.log(project_id);
        var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'negeri']) }}"
                        //url = url.replace(":id", response.data.data.id)
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
        //window.location.href = origin + '/project/section/'+project_id+'/negeri';
      });

      $("#gambar_image").on('change', function(){ 
        //console.log($('#pengumuman_image').prop('files'))
        $new_file = $('#gambar_image').prop('files')[0];  console.log($new_file);
        if($new_file.size>4000000)
        { 
            document.getElementById("gambar_image").value='';
            document.getElementById('file_type').classList.add("d-none");
            document.getElementById('file_size').classList.remove("d-none");
            document.getElementById("gambar_image_error").innerHTML=""; 

            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("gambar_image").value=''; 
            document.getElementById('file_size').classList.add("d-none");
            document.getElementById('file_type').classList.remove("d-none");
            document.getElementById("gambar_image_error").innerHTML=""; 

            //alert("only jpeg and png extension allowed")
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_img_1').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file);
            }
            document.getElementById("gambar_image_error").innerHTML=""; 
            document.getElementById('file_size').classList.add("d-none");
            document.getElementById('file_type').classList.add("d-none");
            document.getElementById("upload_logo").style.display = 'none';
            document.getElementById("image_preview_1").style.display = 'block';
            document.getElementById("header_logo_name_1").innerHTML = $new_file.name;
            var fSExt_2 = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize_2 = $new_file.size; i=0;while(fSize_2>900){fSize_2/=1024;i++;}
                docu_size_2 = (Math.round(fSize_2*100)/100)+' '+fSExt_2[i]; 
            document.getElementById("header_log_size_1").innerHTML = docu_size_2;
    });

    $("#remove_logo_1").on('click', function(){ 
      
      $('#Logo_img_1').val(null)
      document.getElementById("gambar_image").value=''; 
      document.getElementById("upload_logo").style.display = 'block';
      document.getElementById("image_preview_1").style.display = 'none';
});




function loadDaerahData(id,daerah,parlimen,dun,rowno)
{
    negeri = id;
        cmbnegeri = document.querySelector(".negeri_"+rowno);
        cmbnegeri.value = negeri;
        
        var daerahdropDown =  document.querySelector(".daerah_"+rowno);
        var daerahData = document.getElementById("daerahData");
        $(daerahdropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            daerahdropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/daerah/list?id="+negeri,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_daerah;
                        el.value = opt;
                        daerahdropDown.appendChild(el);
                    })
                    daerahdropDown.value= daerah;

                    // $.each(result.data, function (key, item) {
                    //     var opt = item.id;
                    //     var el = document.createElement("option");
                    //     el.textContent = item.nama_daerah;
                    //     el.value = opt;
                    //     daerahData.appendChild(el);
                    // })
                    
                    
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        var parlimendropDown =  document.querySelector(".parlimen_"+rowno);
        var parlimenData = document.getElementById("parlimenData");

        $(parlimendropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            parlimendropDown.appendChild(el);
        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/parlimen/list?id="+negeri,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_parlimen;
                        el.value = opt;
                        parlimendropDown.appendChild(el);
                        // parlimenData.appendChild(el);
                    })
                    parlimendropDown.value= parlimen;

                    // $.each(result.data, function (key, item) {
                    //     var opt = item.id;
                    //     var el = document.createElement("option");
                    //     el.textContent = item.nama_parlimen;
                    //     el.value = opt;
                    //     parlimenData.appendChild(el);
                    //     // parlimenData.appendChild(el);
                    // })
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        parlimen = parlimen;

        var dundropDown =  document.querySelector(".dun_"+rowno);
        var dunData = document.getElementById("dunData");

        $(dundropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); console.log(el)
        el.textContent = '--Pilih--';
        el.value = opt;
        dundropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/dun/list?id="+parlimen,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_dun;
                        el.value = opt;
                        dundropDown.appendChild(el);
                        // dunData.appendChild(el);
                    })
                    dundropDown.value= dun;

                    // $.each(result.data, function (key, item) {
                    //     var opt = item.id;
                    //     var el = document.createElement("option");
                    //     el.textContent = item.nama_dun;
                    //     el.value = opt;
                    //     dunData.appendChild(el);
                    //     // dunData.appendChild(el);
                    // })
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

}




});




// -----------to add daerah within negeri------------------------------------------

    
// function adddaerahrow(){
    if(intialclick){
            intialclick=false;
            $(".add-tr-btn-daerah").bind("click", function () {
        var i = $(this).parent().attr('data-negeri');

        

        //var opt = document.querySelectorAll('daerah_1').options;
        var daerahopt="";
        var parlimenopt="";
        var dunopt="";
        
        var negeriid=  $(".negeri_"+i).val()
        //var daerahid= $(".daerah_"+i).val()
        var parlimenid= $(".parlimen_"+i).val()
        var dunid= $(".dun_"+i).val()

        
        $(".daerah_"+i+" option").each(function()
        {
            daerahopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });

        $(".parlimen_"+i+" option").each(function()
        {
            parlimenopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });

        $(".dun_"+i+" option").each(function()
        {
            dunopt  += '<option value="' + $(this).val() + '">' + $(this).text() + '</option>'
            
        });



        console.log( $(".negeri_"+i).val())

        numnegeri += 1;
        let negerilokasi = `<div class="row p-2 negerirow" style="justify-content:end;">
        <div class="col-md-3 col-xs-12 invisible_negeri">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group invisible">
                    <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                    <select class="form-control invisible negeri_`+numnegeri+`" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+options+`   
                    </select>
                    <span class="error" id="error_select_negeri"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                    <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+daerahopt+`
                    </select>
                    <span class="error" id="error_select_daerah"></span>
                </div>
            </div>
            <!-- <div class="nageri_select_inputs input_fill_content">
                <div class="form-group nageri_form_group">
                <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                <select class="form-control" id="select_mukkim" name="select_mukkim">
                <option value="0" disabled selected hidden>--Pilih--</option>
                </select>
                <span class="error" id="error_select_mukkim"></span>
                </div>
            </div> -->
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                    <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+parlimenopt+`
                    </select>
                    <span class="error" id="error_select_parlimen"></span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="input_fill_content">
                <div class="form-group nageri_form_group">
                    <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                    <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                        <option value="0" disabled selected hidden>--Pilih--</option>
                        `+dunopt+`
                    </select>
                    <span class="error" id="error_select_dun"></span>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-xs-12">
            <div class="d-flex lokasi_footer">
                <button type="button" id="minus_button" class="" style="background:white;border:none;">
                <img
                src="{{ asset('assets/images/minus.png') }}"
                alt="minus"
                />
                </button>
            </div>
        </div> 
        <hr />                
    </div><!-- row ends -->`;

    //$('#negeribox').append(negerilokasi);
    var closestrow = $(this).closest('.negerirow');
    $(negerilokasi).insertAfter(closestrow);
   

    $(".negeri_"+numnegeri).val(negeriid)
    //$(".daerah_"+numnegeri).val(daerahid)
    $(".parlimen_"+numnegeri).val(parlimenid)
    $(".dun_"+numnegeri).val(dunid)

    let all_negeri_btn = document.querySelectorAll(
                    "[id='minus_button']"                    
                ); 

                let all_negeri_div = document.querySelectorAll(".negerirow");               
                all_negeri_btn.forEach((tb, i) => {                    
                    tb.addEventListener("click", () => {
                        all_negeri_div[i].remove();                        
                    });
                });
});
         }
    
// }

    
       
    
    //-----------to add daerah within negeri ends ------------------------------------------


function loadnegeri_parlimen_dun(id)
{
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

    var negeri_id =  document.querySelector(".negeri_"+id);
    var negeriid = negeri_id.value;
        
        var daerahdropDown =  document.querySelector(".daerah_"+id);
        $(daerahdropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            daerahdropDown.appendChild(el);

        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/daerah/list?id="+negeriid,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_daerah;
                        el.value = opt;
                        daerahdropDown.appendChild(el);
                    })
                    //document.getElementById("select_daerah").value= daerah;
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        var parlimendropDown =  document.querySelector(".parlimen_"+id);
        $(parlimendropDown).empty();
        var opt = 0;
        var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = opt;
            parlimendropDown.appendChild(el);
        $.ajax({
            type: "GET",
            url: api_url+"api/lookup/parlimen/list?id="+negeriid,
            dataType: 'json',
            success: function (result) { console.log(result)
                if (result) {
                    $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_parlimen;
                        el.value = opt;
                        parlimendropDown.appendChild(el);
                    })
                    //document.getElementById("select_parlimen").value= parlimen;
                }
                else {
                    $.Notification.error(result.Message);
                }
            }
        });

        // parlimen = parlimen;

        

}

function getdun(rowno){
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    var dundropDown =  document.querySelector(".dun_"+rowno);
    $(dundropDown).empty();
    var opt = 0;
    var el = document.createElement("option"); console.log(el)
    el.textContent = '--Pilih--';
    el.value = opt;
    dundropDown.appendChild(el);

    var parlimencntrl =  document.querySelector(".parlimen_"+rowno);
    var parlimen = parlimencntrl.value;

    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/dun/list?id="+parlimen,
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.nama_dun;
                    el.value = opt;
                    dundropDown.appendChild(el);
                })
                //document.getElementById("select_dun").value= dun;
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });
}

function show_addbtn(rdovalue){
    if(rdovalue == 1){
        document.getElementById("addbtndiv").style="display: block";
    }
    else{
        document.getElementById("addbtndiv").style="display: none";
        let all_negeri_div = document.querySelectorAll(".negerirow");
        if(all_negeri_div.length>=2){
            for(i=1;i<all_negeri_div.length;i++){
                all_negeri_div[i].remove();
                //numnegeri--;
                
            }

            // let all_negeri_invisible = all_negeri_div[0].querySelectorAll(".invisible");
            // if(all_negeri_invisible.length>0){
            //     all_negeri_invisible[0].classList.remove("invisible");
            // }


        }
        // else if(all_negeri_div.length==0){
        //     numnegeri=0;
        // } 
        
        // let all_negeri_invisible = all_negeri_div[0].querySelectorAll(".invisible");
        //     if(all_negeri_invisible.length>0){
        //         all_negeri_invisible[0].classList.remove("invisible");
        //     }
                
    }
}

      function myFunction() {
          var x = document.getElementById("gmbar_pop").classList[2]; console.log(x);
          if (x === "d-none") { console.log("found");
            document.getElementById('gmbar_pop').classList.remove("d-none");
          }
        }
        function mouseout(){
            document.getElementById('gmbar_pop').classList.add("d-none");
            document.getElementById('popData').classList.add("d-none");

            // document.getElementById('popData').classList.add("d-none");

        }

        function mapInfo(){
          var x = document.getElementById("popData").classList[2]; console.log(x);
          if (x === "d-none") { console.log("found");
            document.getElementById('popData').classList.remove("d-none");
          }
        }

        function showModal(){
          document.getElementById('exampleModal').classList.remove("d-none");

        }

        function myCreateFunction() {
          var image =$('#gambar_image').prop('files')[0]; console.log(image)
          var gambar = document.getElementById("gambar_image").value;  console.log(gambar)
          var keterangan = document.getElementById("katerangan").value;  console.log(keterangan)
          var table = document.getElementById("table_body"); 

          document.getElementById('file_size').classList.add("d-none");
          document.getElementById('file_type').classList.add("d-none");

          var rowCount = table.rows.length;   console.log(rowCount);
          
          //var row = table.insertRow(rowCount); 
          if(keterangan=='')
          {
                  document.getElementById("error_katerangan").innerHTML="sila muat naik keterangan"; 
                	document.getElementById("katerangan").focus();
                 	return false; 
          }
          else
          {
                  document.getElementById("error_katerangan").innerHTML="";

          }

          if(!gambar)
          {  
              		document.getElementById("gambar_image_error").innerHTML="sila muat naik gambar profil"; 
                	document.getElementById("gambar_image_error").focus();
                 	return false; 
          }
          else
          {
            document.getElementById("gambar_image_error").innerHTML=""; 
            
            var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
              fSize = image.size; i=0;while(fSize>900){fSize/=1024;i++;}
              image_size = (Math.round(fSize*100)/100)+' '+fSExt[i];

            var formData = new FormData();
                formData.append('id', document.myform.project_id.value);
                formData.append('negeri_id', document.myform.select_negeri.value);
                formData.append('daerah_id', document.myform.select_daerah.value);
                // formData.append('mukim_id', document.myform.select_mukkim.value);
                formData.append('parlimen_id', document.myform.select_parlimen.value);
                formData.append('dun_id', document.myform.select_dun.value);
                formData.append('koordinat_latitude', document.myform.latitude.value);
                formData.append('koordinat_longitude', document.myform.logitude.value);
                formData.append('gambar_image', image);
                formData.append('image_size', image_size);
                formData.append('keterangan', keterangan);
                formData.append('user_id', {{Auth::user()->id}});


            console.log(formData);

            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

            $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
              });
            axios({
                        method: "post",
                        url: api_url+"api/project/add-gambar-image",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    })
                .then(function (response) { console.log(response.data);	
                   
                    var row = table.insertRow(rowCount);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.style.textAlign = "center";


                    var imageDiv = '<div class="nageri_table_img"><p>'+image.name+'</p><p>'+image_size+'</p></div>';
                    var descripDiv = '<div class="nageri_table_text"><p>'+keterangan+'</p></div>';
                    var removDiv = '<button type="button" onClick="removeImage('+response.data.id+','+rowCount+')" class="nageri_table_btn"><div class="nageri_union"><img src="{{ asset('assets/images/Union.png') }}" alt="close"/></div>'
                                    +"Padam"+'</button>';
                    cell1.innerHTML = rowCount+1;
                    cell2.innerHTML = imageDiv;
                    cell3.innerHTML = descripDiv;
                    cell4.innerHTML = removDiv;
                })
                .catch(function (response) {
                  //handle error
                  console.log(response);
                });

          }
         
          
          $('#Logo_img_1').val(null)
          document.getElementById("gambar_image").value=''; 
          document.getElementById("upload_logo").style.display = 'block';
          document.getElementById("image_preview_1").style.display = 'none';
          document.getElementById("katerangan").value="";

        }

        function removeImage(id,row) { 

          const api_url = "{{env('API_URL')}}";  console.log(api_url);
          const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
          const project_id = document.getElementById("project_id").value;  console.log(project_id);


          $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
              });
            axios({
                        method: "post",
                        url: api_url+"api/project/delete-gambar-image",
                        data: {'id':id,"user_id":{{Auth::user()->id}} },
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    })
                .then(function (response) { console.log(response.data);
                  
                    document.getElementById("table_body").deleteRow(row);  console.log(origin + '/project/section/'+project_id+'/negeri')
                    // window.location.href = origin + '/project/section/'+project_id+'/negeri';

                        var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'negeri']) }}"
                        //url = url.replace(":id", response.data.data.id)
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url

                   
                })
                .catch(function (response) {
                  //handle error
                  console.log(response);
                });

        }


        require([
      "esri/config",
      "esri/rest/locator",
      "esri/Map",
      "esri/WebMap",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
      "esri/widgets/Editor",
      "esri/portal/Portal",
      "esri/widgets/BasemapGallery",
      "esri/widgets/BasemapGallery/support/PortalBasemapsSource",
      "esri/widgets/Expand",
      "esri/layers/FeatureLayer",
      "esri/symbols/WebStyleSymbol",
      "esri/Basemap",
      "esri/rest/support/TopFilter",
      "esri/rest/support/TopFeaturesQuery",
      "esri/widgets/Search",
      "esri/widgets/Locate",
      "esri/widgets/Track",
      "esri/widgets/Home",
      "esri/widgets/FeatureForm",
      "esri/widgets/FeatureTemplates",
      "esri/widgets/LayerList",
      "esri/widgets/ScaleBar",
      "esri/widgets/Measurement",
      "esri/widgets/Legend",
      "esri/widgets/DistanceMeasurement2D",
      "esri/widgets/AreaMeasurement2D",
      "esri/widgets/Sketch",
      "esri/widgets/Sketch/SketchViewModel",
      "esri/geometry/geometryEngine"

    ], function(
        esriConfig,
        locator,
        Map,
        WebMap,
        MapView,
        Graphic, 
        GraphicsLayer,
        Editor,
        Portal,
        BasemapGallery,
        PortalBasemapsSource,
        Expand,
        FeatureLayer,
        WebStyleSymbol, 
        Basemap, 
        TopFilter,
        TopFeaturesQuery, 
        Search,
        Locate,
        Track,
        Home,
        FeatureForm,
        FeatureTemplates,
        LayerList,
        ScaleBar,
        Measurement,
        Legend,
        DistanceMeasurement2D, 
        AreaMeasurement2D,
        Sketch,
        SketchViewModel,
        geometryEngine

    ) {
      const locatorUrl = "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer";
      esriConfig.apiKey = "AAPK1e47701066e44f899aac8dfdecb2474bfpxg_oM5aqsBgsHmF8EMF9xXBuQrHnRNpm5ef1cCfFYlz-pOI5q3GQm1j5Ez88sY";

      const addFeatureDiv = document.getElementById("addFeatureDiv");
      const attributeEditing = document.getElementById("featureUpdateDiv");
      const attributeEditingline = document.getElementById("featureUpdateDivline");
      const attributeEditingpoly = document.getElementById("featureUpdateDivpoly");
      
      // $("#addTemplatesDiv").attr("disabled", "disabled").off('click');

      let isPointSelected = true;
      let isPolygonSelected = true;
      let isLineSelected = true;

      $("#cancelBtn").click(function(){

          addFeatureDiv.style.display = "block";
          attributeEditingpoly.style.display = "none";
          attributeEditingline.style.display = "none";
          attributeEditing.style.display = "none";
          
        // $("#addTemplatesDiv").addClass("d-block")
        // $("#addFeatureDiv").addClass("d-block")
        // $("#featureUpdateDiv").addClass("d-none")

        
      })
      $("#selectBtn").click(function(){
        $("#selectBtn").toggleClass("AllowToEdit");
        var allowEdit=$("#selectBtn").hasClass("AllowToEdit")
        if(allowEdit){
          $("#selectBtn").addClass('bg-primary')
          $("#selectBtn").removeClass('bg-light')
        }
        else{

          $("#selectBtn").addClass('bg-light')
          $("#selectBtn").removeClass('bg-primary')
        }
      })
      

    

      let editFeature, editFeaturepoly, editFeatureLine, highlightpoint, highlightpoly, highlightline;
      let editorcancelbtn = false;
      const graphicsLayer = new GraphicsLayer();
      const graphicsLayerpoly = new GraphicsLayer();

      var name_projek=null;
      var NoRujukan_P=null;
      var Negeri=null;
      var Daerah=null;
      var Parlimen=null;
      var DUN=null;
      var Bahagian=null;
      var tahun=null;
      var Jenis=null;
      var myText="All";
      //   var Mukim=null;

      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/projects",
            responseType: 'json',
        }).then(function (response) {
          console.log('here')
            console.log(response.data.data);
              var noRujukanData=document.querySelector("#noRujukanData");
              var bahagianData=document.querySelector("#bahagianData");
            if (response) {
              $("#noRujukanData").empty();
              var el = document.createElement("option"); console.log(el)
                el.textContent = 'All';
                el.value = '0';
                noRujukanData.appendChild(el);
                $("#noRujukanData option:contains(" + el.textContent +")").attr("selected", true);
                $.each(response.data.data, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.no_rujukan;
                    el.value = opt;
                    noRujukanData.appendChild(el);
                })

                //document.getElementById("select_dun").value= dun;
            }
            else {
                $.Notification.error(result.Message);
            }
            if (response) {
              $("#bahagianData").empty();
              var el = document.createElement("option"); console.log(el)
                el.textContent = 'All';
                el.value = '0';
                bahagianData.appendChild(el);
              
                $.each(response.data.data, function (key, item) {
                    var opt = item.id;
                    var el = document.createElement("option");
                    el.textContent = item.bahagian_pemilik.nama_bahagian;
                    el.value = opt;
                    bahagianData.appendChild(el);
                })

                //document.getElementById("select_dun").value= dun;
            }
            else {
                $.Notification.error(result.Message);
            }
        })

        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/project-completed/"+{{$id}},
            responseType: 'json',
        }).then(function (response) {
            name_projek=response.data.data.nama_projek;
            NoRujukan_P=response.data.data.no_rujukan;
            Negeri=response.data.data.lokasi.negeri_id;
            Daerah=response.data.data.lokasi.daerah_id;
            Parlimen=response.data.data.lokasi.parlimen_id;
            DUN=response.data.data.lokasi.dun_id;
            Bahagian=response.data.data.bahagian_pemilik.nama_bahagian;
            tahun=response.data.data.tahun;
            if(response.data.data.kategori_Projek==1){
              Jenis="Baharu";
            }else{
              Jenis="Sambungan";
            }
            // $("#bahagianData").val(Bahagian);
            // $("#noRujukanData").val(NoRujukan_P);
            // alert(name_projek);
            filter(NoRujukan_P);

            var NegeriCount=$(".negerirow").length;
          
            var NegeriData=[];
            var DaerahData=[];
            var parlimenData=[];
            var dunData=[];

            for(i=1;i<=NegeriCount;i++){
              NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
              DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
              parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
              dunData.push($(".dun_"+i+"").children("option:selected").text());
            }

            document.getElementById("polybahagian").value = Bahagian;
            document.getElementById("polynegeri").value = NegeriData.toString();
            document.getElementById("polydaerah").value = DaerahData.toString();
            document.getElementById("polyparlimen").value = parlimenData.toString();
            document.getElementById("polydun").value = dunData.toString();
            document.getElementById("polytahun").value = tahun;
            document.getElementById("polyjenis").value = Jenis;
            document.getElementById("polynorujukan").value = NoRujukan_P;
            document.getElementById("polynamaprojek").value = name_projek;
            //document.getElementById("polyluas").value = results.features[0].attributes['Luas'];
            //document.getElementById("polynamakomponen").value = results.features[0].attributes['Nama_Komponen']

            document.getElementById("linebahagian").value = Bahagian;
            document.getElementById("linenegeri").value = NegeriData.toString();;
            document.getElementById("linedaerah").value = DaerahData.toString();;
            document.getElementById("lineparlimen").value = parlimenData.toString();;
            document.getElementById("linedun").value = dunData.toString();;
            document.getElementById("linetahun").value = tahun;
            document.getElementById("linejenis").value = Jenis;
            document.getElementById("linenorujukan").value = NoRujukan_P;
            document.getElementById("linenamaprojek").value = name_projek;

            document.getElementById("pointbahagian").value = Bahagian;
            document.getElementById("pointnegeri").value = NegeriData.toString();;
            document.getElementById("pointdaerah").value = DaerahData.toString();;
            document.getElementById("pointparlimen").value = parlimenData.toString();;
            document.getElementById("pointdun").value = dunData.toString();;
            document.getElementById("pointtahun").value = tahun;
            document.getElementById("pointjenis").value = Jenis;
            document.getElementById("pointnorujukan").value = NoRujukan_P;
            document.getElementById("pointnamaprojek").value = name_projek;
        })


      const map = new Map({
        basemap: "arcgis-imagery",
        layers: [graphicsLayer, graphicsLayerpoly]
      });

      const view = new MapView({
        container: "ArcgisSatellite",
        map: map,
        center: [101.68653,3.1412],
        zoom: 7
      });

      $("#Senarai-tab").click(function(){
          map.remove(graphicsLayer);
          map.remove(graphicsLayerpoly);
          $("#Lakaran").removeClass('show');
          $("#Profile").removeClass('show');
          $("#Legend").removeClass('show');
          $("#Senarai").addClass('show');
          $("#Basemap").removeClass('show');
          $("#Edit").removeClass('show');
        })

        $("#closesenerailayer").click(function(){
          map.add(graphicsLayer);
          map.add(graphicsLayerpoly);
          // $("#Lakaran").removeClass('show');
          // $("#Profile").removeClass('show');
          // $("#Legend").removeClass('show');
          // $("#Senarai").addClass('show');
          // $("#Basemap").removeClass('show');
          // $("#Edit").removeClass('show');
        })


      

    // const editor = new Editor({
    //   view: view,
    //   url: "http://services.arcgis.com/V6ZHFr6zdgNZuVG0/arcgis/rest/services/MonterreyBayCanyon_WFL/FeatureServer",

    // });

    // view.ui.add(editor, "bottom-right");

    // Generate link to Census tract details
    
    
    //****************************************************************/
    

    //****************************************************************/

     //Add the styling to point layer

     


        

       
         //**************************Polygon Layer ******************************************************************************** */       
         function createPolygonSymbol(label,value,color){
          return{
             label: label,
                symbol: {
                  type: "simple-fill", 
                  width: "1px",
                  style: "solid",
                  color: color, 
                },
                values: value
          }
        }

        const polygonSimpleRenderer = {
          type: "unique-value",  // autocasts as new UniqueValueRenderer()
          field: "Komponen_Kerja",
          defaultSymbol: { 
            type: "simple-fill",
            style:"solid",
            //width
            color: "black",
            outline: {  // autocasts as new SimpleLineSymbol()
              width: "1px",
              color: "white"
            }  
          }, 
          uniqueValueGroups: [{
            heading: "Lakaran Polygon",
            classes: [
              createPolygonSymbol("Pond",1,"blue"),
              createPolygonSymbol("Flood area",2,"green"),
              createPolygonSymbol("Land acquisition & perizaban",3,"yellow"),
              createPolygonSymbol("Underground Storage",4,"pink"),
              createPolygonSymbol("Padang Ragut (Pasture)",5,"brown"),
            ]
          }]
        }
        //pop add
        const popupPolygon = {
                  "title": "Lakaran Polygon layer",
                  "content": "<b>Komponen Kerja:</b> {Komponen_K}<br><b>Nama Komponen:</b> {Nama_Komponen}<br><b> <b>Nama Projek:</b> {namaProjek}<br><b>No Rujukan Permohonan:</b>{NoRujukanP}<br><b>Bahagian:</b> {Bahagian}<br>Negeri :</b> {Negeri }<br><b>Daerah:</b> {Daerah}<br><b>Parlimen:</b> {Parlimen}<br><b>Dun:</b> {DUN}<br><b>Tahun Permohonan:</b>{Tahun_Permohonan}<br><b>Jenis Permohonan:</b>{Jenis_Permohonan}<br><b>Luas_(sqm):</b> {Luas}<br>"
                }

        
        const PolygonFeature = new FeatureLayer({
          url: "https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/polygon_feature/FeatureServer/0",
          outFields: ["*"],
          id: "auidd",
          renderer:polygonSimpleRenderer,
          popupTemplate: popupPolygon,
        });
        map.add(PolygonFeature);

        const simpleFillSymbolpoly = {
              type: "simple-fill",
              color: [227, 139, 79, 0.8],  // Orange, opacity 80%
              outline: {
                  color: [255, 255, 255],
                  width: 1
              }
            };

        var sketchpolygon = new Sketch({
          view: view,
          layer: graphicsLayerpoly,
          creationMode:"continuous",
          polygonSymbol: simpleFillSymbolpoly
        });

        const polygonQuery = {
         where: "1=1",  // Set by select element
         outFields: ["Komponen_Kerja"], // Attributes to return
         returnGeometry: true
        };

        PolygonFeature.queryFeatures(polygonQuery)
        .then((results) => {

          // console.log("Feature count: " + results.features.length)
          // console.log("Coded Values: " + results.features[0].layer.fields[11].domain.codedValues[0].code);
          // console.log("Coded Values: " + results.features[0].layer.fields[11].domain.codedValues[0].name)

          for(i=0;i<results.features[0].layer.fields.length;i++){
            if(results.features[0].layer.fields[i].name==="Komponen_Kerja"){
              for(j=0;j<results.features[0].layer.fields[i].domain.codedValues.length;j++){
                let option = document.createElement("option");
                option.innerHTML = results.features[0].layer.fields[i].domain.codedValues[j].name;
                option.value = results.features[0].layer.fields[i].domain.codedValues[j].code;
                polykomponenkerja.appendChild(option);
              }
            }
          }

        }).catch((error) => {
          console.log(error.error);
        });


        const featureFormboundary = new FeatureForm({
          view: view, // required if using Arcade expressions using the $map global variable
          //container: document.getElementById("formDivpoly"),
          //layer: PolygonFeature,
          formTemplate: {
            title: "Test default attribute polygon",
            elements : [ 
              {
                type: "field",
                fieldName: "Komponen_Kerja",
                label: "Komponen Kerja"
              },  
              {
                type: "field",
                fieldName: "Nama_Komponen",
                label: "Nama Komponen"
              }, 
              {
                type: "field",
                fieldName: "Nama_Projek",
                label: "Nama Projek",
                editable: false,

              }, 
              {
                type: "field",
                fieldName: "NoRujukanP",
                label: "No Rujukan Permohanan",
                editable: false,

              },  
            {
                type: "field",
                fieldName: "Bahagian",
                label: "Bahagian Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Negeri",
                label: "Negeri Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Daerah",
                label: "Daerah Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Parlimen",
                label: "Parlimen Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "DUN",
                label: "Dun name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Tahun_Permohonan",
                label: "Tahun Permohonan Name",
                editable: false,
              },
              {
                type: "field",
                fieldName: "Jenis_Permohonan",
                label: "Jenis Permohonan",
                editable: false,
              },                         
              {
                type: "field",
                fieldName: "Luas",
                label: "Luas_(sqm)",
                editable: false,
              },              

              
            ]
          }
        });

        //const updateOptions = { tool: "reshape", highlightOptions: { enabled: false }};

        let ringspoly=[];
        let isCreating=false;
        // Listen to sketch widget's create event.
        sketchpolygon.on("create", function(event) {
          // check if the create event's state has changed to complete indicating
          // the graphic create operation is completed.
          if (event.state === "complete") {
            // remove the graphic from the layer. Sketch adds
            // the completed graphic to the layer by default.
            
            //graphicsLayerpoly.remove(event.graphic);

            if(!isCreating){
              ringspoly=[];
            }

            isCreating=true;

            const simpleFillSymbol = {
              type: "simple-fill",
              color: [227, 139, 79, 0.8],  // Orange, opacity 80%
              outline: {
                  color: [255, 255, 255],
                  width: 1
              }
            };


            var NegeriCount=$(".negerirow").length;
          
            var NegeriData=[];
            var DaerahData=[];
            var parlimenData=[];
            var dunData=[];

            for(i=1;i<=NegeriCount;i++){
              NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
              DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
              parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
              dunData.push($(".dun_"+i+"").children("option:selected").text());
            }
            for(i=0;i<=NegeriCount;i++){
                    if(NegeriData[i]=='--Pilih--'){
                      NegeriData[i]='';
                    }
                    if(DaerahData[i]=='--Pilih--'){
                      DaerahData[i]='';
                    }
                    if(parlimenData[i]=='--Pilih--'){
                      parlimenData[i]='';
                    }
                    if(dunData[i]=='--Pilih--'){
                      dunData[i]='';
                    }
              }
            // Create a new feature using one of the selected
            // template items.
            const planarLength = geometryEngine.planarArea(event.graphic.geometry, "square-kilometers");
            document.getElementById("polyluas").value = Math.round(planarLength * 100)/100;

            //document.getElementById("polybahagian").value = results.features[0].attributes['Bahagian'];
            document.getElementById("polynegeri").value = NegeriData.toString();
            document.getElementById("polydaerah").value = DaerahData.toString();
            document.getElementById("polyparlimen").value = parlimenData.toString();
            document.getElementById("polydun").value = dunData.toString();
            // document.getElementById("polytahun").value = results.features[0].attributes['Tahun_Permohonan'];
            // document.getElementById("polyjenis").value = results.features[0].attributes['Jenis_Permohonan'];
            // document.getElementById("polynorujukan").value = results.features[0].attributes['NoRujukanP'];
            // document.getElementById("polykomponenkerja").value = results.features[0].attributes['Komponen_Kerja'];
            // document.getElementById("polyluas").value = results.features[0].attributes['Luas'];
            // document.getElementById("polynamakomponen").value = results.features[0].attributes['Nama_Komponen'];
            // document.getElementById("polynamaprojek").value = results.features[0].attributes['name_projek'];

            gm = event.graphic.geometry;

            ringspoly.push(event.graphic.geometry.rings[0]);

            gm.rings = ringspoly; 
            editFeaturepoly = new Graphic({
              geometry: gm,
              symbol: simpleFillSymbol,
              attributes: {
                auidd : "auidd",
                Nama_Projek : name_projek,
                NoRujukanP : NoRujukan_P,
                Komponen_Kerja: 1,
                Nama_Komponen: "",
                Negeri:NegeriData.toString(),
                Bahagian:Bahagian,
                Daerah:DaerahData.toString(),
                Parlimen:parlimenData.toString(),
                DUN:dunData.toString(),
                Tahun_Permohonan:tahun,
                Jenis_Permohonan:Jenis,
                Luas:planarLength
              }
            });

            

            // Setup the applyEdits parameter with adds.
            // const edits = {
            //   addFeatures: [editFeaturepoly]
            // };
            // applyEditsToIncidentsPolygon(edits);

            //graphicsLayerpoly.graphics.add(editFeaturepoly);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";

            if (addFeatureDiv.style.display === "block") {
                toggleEditingDivspoly("none", "block");
              }

            //sketchpolygon.cancel();
          }
        });

        sketchpolygon.on("redo", function(event){
          
          var NegeriCount=$(".negerirow").length;

          var NegeriData=[];
          var DaerahData=[];
          var parlimenData=[];
          var dunData=[];

          for(i=1;i<=NegeriCount;i++){
            NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
            DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
            parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
            dunData.push($(".dun_"+i+"").children("option:selected").text());
          }

          const simpleFillSymbol = {
            type: "simple-fill",
            color: [227, 139, 79, 0.8],  // Orange, opacity 80%
            outline: {
                color: [255, 255, 255],
                width: 1
            }
          };

          // addFeatureDiv.style.display = "none";
          // attributeEditingpoly.style.display = "block";

          const planarArea = geometryEngine.planarArea(event.graphics[0].geometry, "square-kilometers");
          document.getElementById("polyluas").value = Math.round(planarArea * 100)/100;

          editFeaturepoly = new Graphic({
            geometry: event.graphics[0].geometry,
            symbol: simpleFillSymbol,
            attributes: event.graphics[0].attributes
          });

          editFeaturepoly.attributes["Bahagian"] = document.getElementById("polybahagian").value;
          editFeaturepoly.attributes["Negeri"] = document.getElementById("polynegeri").value;
          editFeaturepoly.attributes["Daerah"] = document.getElementById("polydaerah").value;
          editFeaturepoly.attributes["Parlimen"] = document.getElementById("polyparlimen").value;
          editFeaturepoly.attributes["DUN"] = document.getElementById("polydun").value;
          editFeaturepoly.attributes["Tahun_Permohonan"] = document.getElementById("polytahun").value;
          editFeaturepoly.attributes["Jenis_Permohonan"] = document.getElementById("polyjenis").value;
          editFeaturepoly.attributes["Komponen_Kerja"] = document.getElementById("polykomponenkerja").value;
          editFeaturepoly.attributes["NoRujukanP"] = document.getElementById("polynorujukan").value;
          editFeaturepoly.attributes["Luas"] = parseFloat(document.getElementById("polyluas").value);
          editFeaturepoly.attributes["Nama_Komponen"] = document.getElementById("polynamakomponen").value;
          editFeaturepoly.attributes["name_projek"] = document.getElementById("polynamaprojek").value;

          const edits = {
            updateFeatures: [editFeaturepoly]
          };

          applyEditsToIncidentsPolygon(edits);
               
        });

        sketchpolygon.on("undo", function(event){
          
          var NegeriCount=$(".negerirow").length;

          var NegeriData=[];
          var DaerahData=[];
          var parlimenData=[];
          var dunData=[];

          for(i=1;i<=NegeriCount;i++){
            NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
            DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
            parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
            dunData.push($(".dun_"+i+"").children("option:selected").text());
          }

          const simpleFillSymbol = {
            type: "simple-fill",
            color: [227, 139, 79, 0.8],  // Orange, opacity 80%
            outline: {
                color: [255, 255, 255],
                width: 1
            }
          };

          // addFeatureDiv.style.display = "none";
          // attributeEditingpoly.style.display = "block";

          const planarArea = geometryEngine.planarArea(event.graphics[0].geometry, "square-kilometers");
          document.getElementById("polyluas").value = Math.round(planarArea * 100)/100;

          editFeaturepoly = new Graphic({
            geometry: event.graphics[0].geometry,
            symbol: simpleFillSymbol,
            attributes: event.graphics[0].attributes
          });

          editFeaturepoly.attributes["Bahagian"] = document.getElementById("polybahagian").value;
          editFeaturepoly.attributes["Negeri"] = document.getElementById("polynegeri").value;
          editFeaturepoly.attributes["Daerah"] = document.getElementById("polydaerah").value;
          editFeaturepoly.attributes["Parlimen"] = document.getElementById("polyparlimen").value;
          editFeaturepoly.attributes["DUN"] = document.getElementById("polydun").value;
          editFeaturepoly.attributes["Tahun_Permohonan"] = document.getElementById("polytahun").value;
          editFeaturepoly.attributes["Jenis_Permohonan"] = document.getElementById("polyjenis").value;
          editFeaturepoly.attributes["Komponen_Kerja"] = document.getElementById("polykomponenkerja").value;
          editFeaturepoly.attributes["NoRujukanP"] = document.getElementById("polynorujukan").value;
          editFeaturepoly.attributes["Luas"] = parseFloat(document.getElementById("polyluas").value);
          editFeaturepoly.attributes["Nama_Komponen"] = document.getElementById("polynamakomponen").value;
          editFeaturepoly.attributes["name_projek"] = document.getElementById("polynamaprojek").value;

          const edits = {
            updateFeatures: [editFeaturepoly]
          };

          applyEditsToIncidentsPolygon(edits);
               
        });

        sketchpolygon.on("update", function(event){
          unselectFeaturepoint();
          unselectFeaturepoly();
          unselectFeatureline();
          // if(highlightpoly){
          //   highlightpoly.remove();
          // }
          
          if (
              event.toolEventInfo &&
              (
                event.toolEventInfo.type === "move-start" || 
                event.toolEventInfo.type === "move-stop" ||  
                event.toolEventInfo.type === "reshape-start" || 
                event.toolEventInfo.type === "reshape-stop" || 
                event.toolEventInfo.type === "rotate-start" || 
                event.toolEventInfo.type === "rotate-stop" || 
                event.toolEventInfo.type === "scale-start" || 
                event.toolEventInfo.type === "scale-stop"
              )
            ) {

                var NegeriCount=$(".negerirow").length;

                var NegeriData=[];
                var DaerahData=[];
                var parlimenData=[];
                var dunData=[];

                for(i=1;i<=NegeriCount;i++){
                  NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                  DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                  parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                  dunData.push($(".dun_"+i+"").children("option:selected").text());
                }

                const simpleFillSymbol = {
                  type: "simple-fill",
                  color: [227, 139, 79, 0.8],  // Orange, opacity 80%
                  outline: {
                      color: [255, 255, 255],
                      width: 1
                  }
                };

                // addFeatureDiv.style.display = "none";
                // attributeEditingpoly.style.display = "block";

                const planarLength = geometryEngine.planarArea(event.graphics[0].geometry, "square-kilometers");
                document.getElementById("polyluas").value = Math.round(planarLength * 100)/100;

                editFeaturepoly = new Graphic({
                  geometry: event.graphics[0].geometry,
                  symbol: simpleFillSymbol,
                  attributes: event.graphics[0].attributes
                });

                editFeaturepoly.attributes["Bahagian"] = document.getElementById("polybahagian").value;
                editFeaturepoly.attributes["Negeri"] = document.getElementById("polynegeri").value;
                editFeaturepoly.attributes["Daerah"] = document.getElementById("polydaerah").value;
                editFeaturepoly.attributes["Parlimen"] = document.getElementById("polyparlimen").value;
                editFeaturepoly.attributes["DUN"] = document.getElementById("polydun").value;
                editFeaturepoly.attributes["Tahun_Permohonan"] = document.getElementById("polytahun").value;
                editFeaturepoly.attributes["Jenis_Permohonan"] = document.getElementById("polyjenis").value;
                editFeaturepoly.attributes["Komponen_Kerja"] = document.getElementById("polykomponenkerja").value;
                editFeaturepoly.attributes["NoRujukanP"] = document.getElementById("polynorujukan").value;
                editFeaturepoly.attributes["Luas"] = parseFloat(document.getElementById("polyluas").value);
                editFeaturepoly.attributes["Nama_Komponen"] = document.getElementById("polynamakomponen").value;
                editFeaturepoly.attributes["name_projek"] = document.getElementById("polynamaprojek").value;

                const edits = {
                  updateFeatures: [editFeaturepoly]
                };

                applyEditsToIncidentsPolygon(edits);

                  
                }
                else if (event.state === "complete") {



                // addFeatureDiv.style.display = "none";
                // attributeEditingpoly.style.display = "block";


                //graphicsLayer.remove(event.graphics[0]);

                  //graphicsLayerpoly.remove(event.graphics[0]);
                //   //sketchpolygon.complete();
                const simpleFillSymbol = {
                  type: "simple-fill",
                  color: [227, 139, 79, 0.8],  // Orange, opacity 80%
                  outline: {
                      color: [255, 255, 255],
                      width: 1
                  }
                };

                var NegeriCount=$(".negerirow").length;

                var NegeriData=[];
                var DaerahData=[];
                var parlimenData=[];
                var dunData=[];

                for(i=1;i<=NegeriCount;i++){
                  NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                  DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                  parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                  dunData.push($(".dun_"+i+"").children("option:selected").text());
                }

                const planarLength = geometryEngine.planarArea(event.graphics[0].geometry, "square-kilometers");
                document.getElementById("polyluas").value = Math.round(planarLength * 100)/100;

                editFeaturepoly = new Graphic({
                  geometry: event.graphics[0].geometry,
                  symbol: simpleFillSymbol,
                  attributes: event.graphics[0].attributes
                });

                editFeaturepoly.attributes["Bahagian"] = document.getElementById("polybahagian").value;
                editFeaturepoly.attributes["Negeri"] = document.getElementById("polynegeri").value;
                editFeaturepoly.attributes["Daerah"] = document.getElementById("polydaerah").value;
                editFeaturepoly.attributes["Parlimen"] = document.getElementById("polyparlimen").value;
                editFeaturepoly.attributes["DUN"] = document.getElementById("polydun").value;
                editFeaturepoly.attributes["Tahun_Permohonan"] = document.getElementById("polytahun").value;
                editFeaturepoly.attributes["Jenis_Permohonan"] = document.getElementById("polyjenis").value;
                editFeaturepoly.attributes["Komponen_Kerja"] = document.getElementById("polykomponenkerja").value;
                editFeaturepoly.attributes["NoRujukanP"] = document.getElementById("polynorujukan").value;
                editFeaturepoly.attributes["Luas"] = parseFloat(document.getElementById("polyluas").value);
                editFeaturepoly.attributes["Nama_Komponen"] = document.getElementById("polynamakomponen").value;
                editFeaturepoly.attributes["name_projek"] = document.getElementById("polynamaprojek").value;

                const edits = {
                  updateFeatures: [editFeaturepoly]
                };

                if(!editorcancelbtn){
                  applyEditsToIncidentsPolygon(edits);
                  editorcancelbtn = false;
                }

                

                document.getElementById("ArcgisSatellite").style.cursor = "auto";
                }
          });

        

        
        // Listen to the feature form's submit event.
        // Update feature attributes shown in the form.

        function updatevaluespoly(){
          if (editFeaturepoly) {
            // Grab updated attributes from the form.
            //const updated = featureFormboundary.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            //Object.keys(updated).forEach((name) => {
              //if(name=="name_projek"){
                editFeaturepoly.attributes["Bahagian"] = document.getElementById("polybahagian").value;
                editFeaturepoly.attributes["Negeri"] = document.getElementById("polynegeri").value;
                editFeaturepoly.attributes["Daerah"] = document.getElementById("polydaerah").value;
                editFeaturepoly.attributes["Parlimen"] = document.getElementById("polyparlimen").value;
                editFeaturepoly.attributes["DUN"] = document.getElementById("polydun").value;
                editFeaturepoly.attributes["Tahun_Permohonan"] = document.getElementById("polytahun").value;
                editFeaturepoly.attributes["Jenis_Permohonan"] = document.getElementById("polyjenis").value;
                editFeaturepoly.attributes["Komponen_Kerja"] = document.getElementById("polykomponenkerja").value;
                editFeaturepoly.attributes["NoRujukanP"] = document.getElementById("polynorujukan").value;
                editFeaturepoly.attributes["Luas"] = parseFloat(document.getElementById("polyluas").value);
                editFeaturepoly.attributes["Nama_Komponen"] = document.getElementById("polynamakomponen").value;
                editFeaturepoly.attributes["name_projek"] = document.getElementById("polynamaprojek").value;
                
                
              //}
            //   else{
            //     editFeaturepoly.attributes[name] = updated[name];
            //   }
              
            // });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeaturepoly]
            };
            applyEditsToIncidentsPolygon(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        }
        
        featureFormboundary.on("submit", () => {
          if (editFeaturepoly) {
            // Grab updated attributes from the form.
            const updated = featureFormboundary.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            Object.keys(updated).forEach((name) => {
              editFeaturepoly.attributes[name] = updated[name];
            });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeaturepoly]
            };
            applyEditsToIncidentsPolygon(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        });

        
        selectExistingFeaturePolygon();
        // const polygontemplates = new FeatureTemplates({
        //   container: document.getElementById("addTemplatesDiv"),
        //   layers: [PolygonFeature]
        // });

        // // Listen for when a polygontemplates item is selected
        // polygontemplates.on("select", (evtTemplate) => {

        //   if(isPolygonSelected){
        //     isPolygonSelected = false;
          
        //   // Access the template item's attributes from the event's
        //   // template prototype.
        //   attributes = evtTemplate.template.prototype.attributes;
		    //   console.log(evtTemplate);
        //   sketchline.cancel();
        //   sketchpoint.cancel();
        //   unselectFeature();
        //   document.getElementById("ArcgisSatellite").style.cursor = "crosshair";

        //  featureFormboundary.feature = null;

        //   sketchpolygon.create(
        //     "polygon", 
        //     { 
        //       mode: "click"
              
        //     }
        //   );
        // }
        //   else{
        //     isPolygonSelected = true;
        //     sketchpolygon.cancel();
        //     document.getElementById("ArcgisSatellite").style.cursor = "auto";

        //   }
        // });
        

      function applyEditsToIncidentsPolygon(params) {
        
        PolygonFeature
          .applyEdits(params)
          .then((editsResult) => {
            // Get the objectId of the newly added feature.
            // Call selectFeature function to highlight the new feature.
            if (editsResult.addFeatureResults.length > 0 || editsResult.updateFeatureResults.length > 0) {
              unselectFeaturepoly();
              let objectId;
              if (editsResult.addFeatureResults.length > 0) {
                objectId = editsResult.addFeatureResults[0].objectId;
              } else {
                featureForm.feature = null;
                objectId = editsResult.updateFeatureResults[0].objectId;
              }
              selectFeaturePolygon(objectId);
              // if (addFeatureDiv.style.display === "block") {
              //   toggleEditingDivspoly("none", "block");

              //   attributeEditingpoly.style.display = "block";

              //   attributeEditingline.style.display = "none";
              //   attributeEditing.style.display = "none";
              // }
              // else if(addFeatureDiv.style.display === "none"){
              //   toggleEditingDivsPolyAfterDeletion("block","none");

              // }
            }
            // show FeatureTemplates if user deleted a feature
            else if (editsResult.deleteFeatureResults.length > 0) {
              //toggleEditingDivsPolyAfterDeletion("block", "none");
              addFeatureDiv.style.display = "block";
              attributeEditingpoly.style.display = "none";
              attributeEditingline.style.display = "none";
              attributeEditing.style.display = "none";
            }
          })
          .catch((error) => {
            console.log("error = ", error);
          });
      }

      function selectExistingFeaturePolygon() {
        
        view.on("click", (event) => {

          if(sketchpolygon.state === 'active'){
          return;
        }
          // clear previous feature selection
          unselectFeaturepoly();
          if (document.getElementById("ArcgisSatellite").style.cursor != "crosshair") {
            view.hitTest(event).then((response) => {
              // If a user clicks on an incident feature, select the feature.
              if (response.results.length === 0) {
                toggleEditingDivspoly("block", "none");
                attributeEditingline.style.display = "none";
                  attributeEditing.style.display = "none";
              } else if (response.results[0].graphic && response.results[0].graphic.layer.id == "auidd") {
                var AllowToEdit=$("#selectBtn").hasClass("AllowToEdit");
                  // alert(AllowToEdit);
                  $(".esri-component").removeClass("d-none")

                  if(AllowToEdit){
                    $(".esri-component").addClass("d-none")

                const simpleFillSymbolpoly = {
                  type: "simple-fill",
                  color: [227, 139, 79, 0.8],  // Orange, opacity 80%
                  outline: {
                      color: [255, 255, 255],
                      width: 1
                  }
                };

                
                gr = response.results[0].graphic;

                PolygonFeature
            .queryFeatures({
              objectIds: [response.results[0].graphic.attributes[PolygonFeature.objectIdField]],
              outFields: ["*"],
              returnGeometry: true
            })
            .then((results) => {
              if (results.features.length > 0) {
                editFeaturepoly = results.features[0];
                document.getElementById("polybahagian").value = results.features[0].attributes['Bahagian'];
                document.getElementById("polynegeri").value = results.features[0].attributes['Negeri'];
                document.getElementById("polydaerah").value = results.features[0].attributes['Daerah'];
                document.getElementById("polyparlimen").value = results.features[0].attributes['Parlimen'];
                document.getElementById("polydun").value = results.features[0].attributes['DUN'];
                document.getElementById("polytahun").value = results.features[0].attributes['Tahun_Permohonan'];
                document.getElementById("polyjenis").value = results.features[0].attributes['Jenis_Permohonan'];
                document.getElementById("polynorujukan").value = results.features[0].attributes['NoRujukanP'];
                document.getElementById("polykomponenkerja").value = results.features[0].attributes['Komponen_Kerja'];
                document.getElementById("polyluas").value = results.features[0].attributes['Luas'];
                document.getElementById("polynamakomponen").value = results.features[0].attributes['Nama_Komponen'];
                document.getElementById("polynamaprojek").value = results.features[0].attributes['name_projek'];
                //layerpoly = results.features[0].layer

                // display the attributes of selected feature in the form
                // featureFormboundary.feature = editFeaturepoly;

                //highlight the feature on the view
                view.whenLayerView(editFeaturepoly.layer).then((layerView) => {
                  highlightpoly = layerView.highlight(editFeaturepoly);
                });

                // const edits = {
                //   deleteFeatures: [editFeaturepoly]
                // };                  
                // applyEditsToIncidentsPolygon(edits);
                // addFeatureDiv.style.display = "none";
                // attributeEditingpoly.style.display = "block";

                // attributeEditingline.style.display = "none";
                // attributeEditing.style.display = "none";
              }
            });
                
            
            addFeatureDiv.style.display = "none";
            attributeEditingpoly.style.display = "block";

            attributeEditingline.style.display = "none";
            attributeEditing.style.display = "none";

            sketchpoint.cancel();
            sketchline.cancel();

            unselectFeaturepoly();

            //map.add(graphicsLayerpoly)

            graphicsLayerpoly.graphics.removeAll();
            graphicsLayerpoly.graphics.add(gr);
                
            setTimeout(() => {
              sketchpolygon.update([gr],{ tool: "transform" });
            }, 1000);
            

            if (addFeatureDiv.style.display === "block" || attributeEditingline.style.display === "block" || attributeEditing.style.display === "block") {
              toggleEditingDivspoly("none", "block");
            }
          }
        }
        });
      }
    });
  }

    function toggleEditingDivspoly(addDiv, attributesDiv) {
      addFeatureDiv.style.display = addDiv;
      attributeEditingpoly.style.display = attributesDiv;

      attributeEditingline.style.display = addDiv;
      attributeEditing.style.display = addDiv;

      //document.getElementById("updateInstructionDiv").style.display = addDiv;
    }

    function toggleEditingDivsPolyAfterDeletion(addDiv, attributesDiv) {
      addFeatureDiv.style.display = addDiv;
      attributeEditingpoly.style.display = attributesDiv;

      attributeEditingline.style.display = attributesDiv;
      attributeEditing.style.display = attributesDiv;

      //document.getElementById("updateInstructionDiv").style.display = addDiv;
    }

        // Remove the feature highlight and remove attributes
        // from the feature form.
        function unselectFeaturepoly() {
          if (highlightpoly) {
            highlightpoly.remove();
          }
        }

        function selectFeaturePolygon(objectId) {

          unselectFeaturepoly();
          // query feature from the server
          PolygonFeature
            .queryFeatures({
              objectIds: [objectId],
              outFields: ["*"],
              returnGeometry: true
            })
            .then((results) => {
              if (results.features.length > 0) {
                editFeaturepoly = results.features[0];

                // display the attributes of selected feature in the form
                featureFormboundary.feature = editFeaturepoly;

                //highlight the feature on the view
                view.whenLayerView(editFeaturepoly.layer).then((layerView) => {
                  highlightpoly = layerView.highlight(editFeaturepoly);
                });
              }
            });
        }

        // Update attributes of the selected feature.
        document.getElementById("btnUpdatepoly").onclick = () => {
          // Fires feature form's submit event.
          //featureForm.submit();

          // Setup the applyEdits parameter with adds.
          graphicsLayerpoly.graphics.removeAll();

          if(!isCreating){
            const edits = {
              updateFeatures: [editFeaturepoly]
            };
            applyEditsToIncidentsPolygon(edits);
            $("#selectBtn").removeClass("AllowToEdit");
            $("#selectBtn").addClass('bg-light')
            $("#selectBtn").removeClass('bg-primary')
          }
          else{
            isCreating=false;
            const edits = {
              addFeatures: [editFeaturepoly]
            };
            sketchpolygon.cancel();
            applyEditsToIncidentsPolygon(edits);
            $("#selectBtn").removeClass("AllowToEdit");
            $("#selectBtn").addClass('bg-light')
            $("#selectBtn").removeClass('bg-primary')
          }
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
            updatevaluespoly();
            addFeatureDiv.style.display = "block";
            attributeEditingpoly.style.display = "none";
            attributeEditingline.style.display = "none";
            attributeEditing.style.display = "none";

            document.getElementById("pointkomponenkerja").value=1;
            document.getElementById("polykomponenkerja").value=1;
            document.getElementById("linekomponenkerja").value=1;

            document.getElementById("linenamakomponen").value="";
            document.getElementById("polynamakomponen").value="";
            document.getElementById("pointnamakomponen").value="";
            $(".esri-item-list__list-item--selected").removeAttr('selected');
          
          //featureFormboundary.submit();
        };

        // Delete the selected feature. ApplyEdits is called
        // with the selected feature to be deleted.
        document.getElementById("btnDeletepoly").onclick = () => {
          // setup the applyEdits parameter with deletes.
          const edits = {
            deleteFeatures: [editFeaturepoly]
          };
          sketchpolygon.cancel();
          sketchpolygon.layer.graphics.removeAll();
          $("#selectBtn").removeClass("AllowToEdit");
              $("#selectBtn").addClass('bg-light')
              $("#selectBtn").removeClass('bg-primary')
          applyEditsToIncidentsPolygon(edits);


          document.getElementById("ArcgisSatellite").style.cursor = "auto";
          // $("#addTemplatesDiv").addClass("d-block")
          // $("#addFeatureDiv").addClass("d-block")
          // $("#featureUpdateDivpoly").addClass("d-none")

          addFeatureDiv.style.display = "block";
          attributeEditingpoly.style.display = "none";
          attributeEditingline.style.display = "none";
          attributeEditing.style.display = "none";
        };




  //**************************Polygon Layer Ends ******************************************************************************** */   
   //**************************Line Layer ******************************************************************************** */       
        
   function createLineSymbol(label,value,color){
          return{
             label: label,
                symbol: {
                  type: "simple-line", 
                  width: "1px",
                  style: "solid",
                  color: color, 
                },
                values: value
          }
        }


        const lineSimpleRenderer = {
          type: "unique-value",  // autocasts as new UniqueValueRenderer()
          field: "Komponen_K",
          defaultSymbol: { 
            type: "simple-line",
            style:"solid",
            //width
            color: "black",
            outline: {  // autocasts as new SimpleLineSymbol()
              width: "1px",
              color: "white"
            }  
          }, 
          uniqueValueGroups: [{
            heading: "Lakaran Line",
            classes: [
              createLineSymbol("Bund",1,"#2271B3"),
              createLineSymbol("River improvement",2,"#642424"),
              createLineSymbol("Riverbank protection",3,"#DC9D00"),
              createLineSymbol("River diversion",4,"#F39F18"),
              createLineSymbol("Floodway",5,"#8E402A"),
              createLineSymbol("Collector Drain",6,"#49678D"),
              createLineSymbol("Main drain",7,"#587246"),
              createLineSymbol("Beach nourishment",8,"#293133"),
              createLineSymbol("Breakwater (struktur pemecah ombak)",9,"#8A6642"),
              createLineSymbol("Dredging",10,"#F8F32B"),
              createLineSymbol("Bypass channel",11,"#828282"),
              createLineSymbol("Flood wall",12,"#45322E"),
              createLineSymbol("Groyne",13,"#332F2C"),
              createLineSymbol("Main canal",14,"#193737"),
              createLineSymbol("Secondary canal",15,"#D6AE01"),
              createLineSymbol("Tertiary canal",16,"#641C34"),
              createLineSymbol("Maintenance road/ Plantation Road",17,"#382C1E"),
              createLineSymbol("Road",18,"#686C5E"),
              createLineSymbol("Safety Railing",19,"#474A51"),
              createLineSymbol("Safety Fence",20,"#CF3476"),
              createLineSymbol("Tunnel",21,"#2F4538"),
              createLineSymbol("Retaining wall",22,"#193737"),
              createLineSymbol("Marine Outfall",23,"#BDECB6"),
              createLineSymbol("Rock Revertment",24,"#2A6478"),
              createLineSymbol("Nearshore Breakwater",25,"#705335"),
              createLineSymbol("Offshore Breakwater",26,"#F4A900"),
              createLineSymbol("Training Wall",27,"#E5BE01"),
              createLineSymbol("Boardwalk",28,"#1F3438"),
              createLineSymbol("Water Reticulation System",29,"#641C34"),

            ]
          }]
        }

                //pop add
                const popupLine = {
                  "title": "Lakaran Line layer",
                  "content": "<b>Komponen Kerja:</b> {Komponen_K}<br><b>Nama Komponen:</b> {Nama_Komponen}<br><b> <b>Nama Projek:</b> {NamaProje}<br><b>No Rujukan Permohonan:</b>{NoRujukanP}<br><b>Bahagian:</b> {Bahagian}<br>Negeri :</b> {Negeri }<br><b>Daerah:</b> {Daerah}<br><b>Parlimen:</b>{Parlimen}<br><b>Dun:</b>{DUN}<br><b>Tahun Permohonan:</b>{Tahun_Perm}<br><b>Jenis Permohonan:</b>{Jenis_Perm}<br><b>Panjang:</b> {Panjang}<br>"
                }

  const LineFeature = new FeatureLayer({
          url: "https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/lakaran_line_feature/FeatureServer/0",
          outFields: ["*"],
          id: "auiddd",
          renderer: lineSimpleRenderer,
          popupTemplate: popupLine,

        });
        map.add(LineFeature);

        var sketchline = new Sketch({
          layer: graphicsLayer,
          view: view,
          creationMode:"single"
        });

        const lineQuery = {
         where: "1=1",  // Set by select element
         outFields: ["Komponen_K"], // Attributes to return
         returnGeometry: true
        };

        LineFeature.queryFeatures(lineQuery)
        .then((results) => {

          // console.log("Feature count: " + results.features.length)
          // console.log("Coded Values: " + results.features[0].layer.fields[11].domain.codedValues[0].code);
          // console.log("Coded Values: " + results.features[0].layer.fields[11].domain.codedValues[0].name)

          for(i=0;i<results.features[0].layer.fields.length;i++){
            if(results.features[0].layer.fields[i].name==="Komponen_K"){
              for(j=0;j<results.features[0].layer.fields[i].domain.codedValues.length;j++){
                let option = document.createElement("option");
                option.innerHTML = results.features[0].layer.fields[i].domain.codedValues[j].name;
                option.value = results.features[0].layer.fields[i].domain.codedValues[j].code;
                linekomponenkerja.appendChild(option);
              }
            }
          }

        }).catch((error) => {
          console.log(error.error);
        });

        // Listen to sketch widget's create event.
        sketchline.on("update",function(event){
          unselectFeaturepoint();
          unselectFeaturepoly();
          unselectFeatureline();
          // if(highlightline){
          //   highlightline.remove();
          // }

          // addFeatureDiv.style.display = "none";
          // attributeEditingline.style.display = "block";
          if (
            event.toolEventInfo &&
            (
              event.toolEventInfo.type === "move-start" || 
              event.toolEventInfo.type === "move-stop" || 
              event.toolEventInfo.type === "reshape-start" || 
              event.toolEventInfo.type === "reshape-stop" || 
              event.toolEventInfo.type === "rotate-start" || 
              event.toolEventInfo.type === "rotate-stop" ||
              event.toolEventInfo.type === "scale-start" || 
              event.toolEventInfo.type === "scale-stop"
            )  
          ) {

            // addFeatureDiv.style.display = "none";
            // attributeEditingline.style.display = "block";

            const simpleLineSymbol = {
                type: "simple-line",
                color: [226, 119, 40], // Orange
                width: 2
              };

              var NegeriCount=$(".negerirow").length;
              //   alert(NegeriCount);
              var NegeriData=[];
              var DaerahData=[];
              var parlimenData=[];
              var dunData=[];

              for(i=1;i<=NegeriCount;i++){
                NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                dunData.push($(".dun_"+i+"").children("option:selected").text());
              }
              const planarLength = geometryEngine.planarLength(event.graphics[0].geometry, "kilometers");
              document.getElementById("linepanjang").value = Math.round(planarLength * 100)/100;
          
              // Create a new feature using one of the selected
              // template items.
              editFeatureLine = new Graphic({
              geometry: event.graphics[0].geometry,
              symbol: simpleLineSymbol,
              attributes: event.graphics[0].attributes
            });
            
            editFeatureLine.attributes["Bahagian"] = document.getElementById("linebahagian").value;
            editFeatureLine.attributes["Negeri"] = document.getElementById("linenegeri").value;
            editFeatureLine.attributes["Daerah"] = document.getElementById("linedaerah").value;
            editFeatureLine.attributes["Parlimen"] = document.getElementById("lineparlimen").value;
            editFeatureLine.attributes["DUN"] = document.getElementById("linedun").value;
            editFeatureLine.attributes["Tahun_Perm"] = document.getElementById("linetahun").value;
            editFeatureLine.attributes["Jenis_Perm"] = document.getElementById("linejenis").value;
            editFeatureLine.attributes["Komponen_K"] = document.getElementById("linekomponenkerja").value;
            editFeatureLine.attributes["NoRujukanP"] = document.getElementById("linenorujukan").value;
            editFeatureLine.attributes["Panjang"] = parseFloat(document.getElementById("linepanjang").value);
            editFeatureLine.attributes["Nama_Kompo"] = document.getElementById("linenamakomponen").value;
            editFeatureLine.attributes["NamaProje"] = document.getElementById("linenamaprojek").value;
            
            const edits = {
              updateFeatures: [editFeatureLine]
            };
            applyEditsToIncidentsLine(edits);
            
            document.getElementById("ArcgisSatellite").style.cursor = "auto";

          }
          else if (event.state === "complete") {

            // addFeatureDiv.style.display = "none";
            // attributeEditingline.style.display = "block";
            // console.log("kjgjkdfngjldn");
            //graphicsLayer.remove(event.graphics[0]);
            
             //graphicsLayerpoly.remove(event.graphics[0]);
            //   //sketchpolygon.complete();
            const simpleLineSymbol = {
                type: "simple-line",
                color: [226, 119, 40], // Orange
                width: 2
              };

              var NegeriCount=$(".negerirow").length;
          
              var NegeriData=[];
              var DaerahData=[];
              var parlimenData=[];
              var dunData=[];

              for(i=1;i<=NegeriCount;i++){
                NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                dunData.push($(".dun_"+i+"").children("option:selected").text());
              }
              
              const planarLength = geometryEngine.planarLength(event.graphics[0].geometry, "kilometers");
              document.getElementById("linepanjang").value = Math.round(planarLength * 100)/100;
              
          
              // Create a new feature using one of the selected
              // template items.
              editFeatureLine = new Graphic({
              geometry: event.graphics[0].geometry,
              symbol: simpleLineSymbol,
              attributes: event.graphics[0].attributes
            });

            editFeatureLine.attributes["Bahagian"] = document.getElementById("linebahagian").value;
            editFeatureLine.attributes["Negeri"] = document.getElementById("linenegeri").value;
            editFeatureLine.attributes["Daerah"] = document.getElementById("linedaerah").value;
            editFeatureLine.attributes["Parlimen"] = document.getElementById("lineparlimen").value;
            editFeatureLine.attributes["DUN"] = document.getElementById("linedun").value;
            editFeatureLine.attributes["Tahun_Perm"] = document.getElementById("linetahun").value;
            editFeatureLine.attributes["Jenis_Perm"] = document.getElementById("linejenis").value;
            editFeatureLine.attributes["Komponen_K"] = document.getElementById("linekomponenkerja").value;
            editFeatureLine.attributes["NoRujukanP"] = document.getElementById("linenorujukan").value;
            editFeatureLine.attributes["Panjang"] = parseFloat(document.getElementById("linepanjang").value);
            editFeatureLine.attributes["Nama_Kompo"] = document.getElementById("linenamakomponen").value;
            editFeatureLine.attributes["NamaProje"] = document.getElementById("linenamaprojek").value;
            
            const edits = {
              updateFeatures: [editFeatureLine]
            };


            if(!editorcancelbtn){
              applyEditsToIncidentsLine(edits);
              editorcancelbtn = false;
              
            }
            
            
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        });

        // Listen to sketch widget's create event.
        sketchline.on("create", function(event) {
            // check if the create event's state has changed to complete indicating
            // the graphic create operation is completed.
            if (event.state === "complete") {
              // remove the graphic from the layer. Sketch adds
              // the completed graphic to the layer by default.
              
              //graphicsLayer.remove(event.graphic);

              const simpleLineSymbol = {
                type: "simple-line",
                color: [226, 119, 40], // Orange
                width: 2
              };

              var NegeriCount=$(".negerirow").length;
              //   alert(NegeriCount);
              var NegeriData=[];
              var DaerahData=[];
              var parlimenData=[];
              var dunData=[];

              for(i=1;i<=NegeriCount;i++){
                NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                dunData.push($(".dun_"+i+"").children("option:selected").text());
              }
              for(i=0;i<=NegeriCount;i++){
                    if(NegeriData[i]=='--Pilih--'){
                      NegeriData[i]='';
                    }
                    if(DaerahData[i]=='--Pilih--'){
                      DaerahData[i]='';
                    }
                    if(parlimenData[i]=='--Pilih--'){
                      parlimenData[i]='';
                    }
                    if(dunData[i]=='--Pilih--'){
                      dunData[i]='';
                    }
                }
              const planarLength = geometryEngine.planarLength(event.graphic.geometry, "kilometers");
              document.getElementById("linepanjang").value = Math.round(planarLength * 100)/100;

              document.getElementById("linenegeri").value = NegeriData.toString();
              document.getElementById("linedaerah").value = DaerahData.toString();
              document.getElementById("lineparlimen").value = parlimenData.toString();
              document.getElementById("linedun").value = dunData.toString();
          
              // Create a new feature using one of the selected
              // template items.
              editFeatureLine = new Graphic({
              geometry: event.graphic.geometry,
              symbol: simpleLineSymbol,
              attributes: {
                auiddd : attributes.auiddd,
                NamaProje : name_projek,
                NoRujukanP : NoRujukan_P,
                  Negeri:NegeriData.toString(),
                  Bahagian:Bahagian,
                  Daerah:DaerahData.toString(),
                  Parlimen:parlimenData.toString(),
                  DUN:dunData.toString(),
                  Tahun_Perm:tahun,
                  Jenis_Perm:Jenis,
                  Panjang:planarLength
          
              }
            });

            if (addFeatureDiv.style.display === "block") {
                toggleEditingDivsline("none", "block");
              }

            // Setup the applyEdits parameter with adds.
            // const edits = {
            //   addFeatures: [editFeatureLine]
            // };
            // applyEditsToIncidentsLine(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
            //sketchline.cancel();
              
          }
        });

        const featureFormLine = new FeatureForm({
          view: view, // required if using Arcade expressions using the $map global variable
          //container: document.getElementById("formDivline"),
          //layer: LineFeature,
          formTemplate: {
            title: "Test default attribute Line",
            elements : [
              {
                type: "field",
                fieldName: "Komponen_K",
                label: "Komponen Kerja"
              },   
              {
                type: "field",
                fieldName: "Nama_Kompo",
                label: "Nama Komponen"
              }, 
              {
                type: "field",
                fieldName: "NamaProje",
                label: "Nama Projek",
                editable: false,

              }, 
              {
                type: "field",
                fieldName: "NoRujukanP",
                label: "No Rujukan Permohanan",
                editable: false,

              },  
            {
                type: "field",
                fieldName: "Bahagian",
                label: "Bahagian Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Negeri",
                label: "Negeri Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Daerah",
                label: "Daerah Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Parlimen",
                label: "Parlimen Name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "DUN",
                label: "Dun name",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Tahun_Perm",
                label: "Tahun Permohonan Name",
                editable: false,
              },
              {
                type: "field",
                fieldName: "Jenis_Perm",
                label: "Jenis Permohonan",
                editable: false,
              },                        
              {
                type: "field",
                fieldName: "Panjang",
                label: "Panjang (m)",
                editable: false,
              },              

              
            ]
          }
        });

        
        // Listen to the feature form's submit event.
        // Update feature attributes shown in the form.

        function updatevaluesline(){
          if (editFeatureLine) {
            // Grab updated attributes from the form.
            //const updated = featureFormboundary.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            //Object.keys(updated).forEach((name) => {
              //if(name=="name_projek"){
                editFeatureLine.attributes["Bahagian"] = document.getElementById("linebahagian").value;
                editFeatureLine.attributes["Negeri"] = document.getElementById("linenegeri").value;
                editFeatureLine.attributes["Daerah"] = document.getElementById("linedaerah").value;
                editFeatureLine.attributes["Parlimen"] = document.getElementById("lineparlimen").value;
                editFeatureLine.attributes["DUN"] = document.getElementById("linedun").value;
                editFeatureLine.attributes["Tahun_Perm"] = document.getElementById("linetahun").value;
                editFeatureLine.attributes["Jenis_Perm"] = document.getElementById("linejenis").value;
                editFeatureLine.attributes["Komponen_K"] = document.getElementById("linekomponenkerja").value;
                editFeatureLine.attributes["NoRujukanP"] = document.getElementById("linenorujukan").value;
                editFeatureLine.attributes["Panjang"] = parseFloat(document.getElementById("linepanjang").value);
                editFeatureLine.attributes["Nama_Kompo"] = document.getElementById("linenamakomponen").value;
                editFeatureLine.attributes["NamaProje"] = document.getElementById("linenamaprojek").value;
                
                
              //}
            //   else{
            //     editFeaturepoly.attributes[name] = updated[name];
            //   }
              
            // });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeatureLine]
            };
            applyEditsToIncidentsLine(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        }
        
        featureFormLine.on("submit", () => {
          if (editFeatureLine) {
            // Grab updated attributes from the form.
            const updated = featureFormLine.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            Object.keys(updated).forEach((name) => {
              editFeatureLine.attributes[name] = updated[name];
            });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeatureLine]
            };
            applyEditsToIncidentsLine(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        });

        
        selectExistingFeatureLine();

		// const Linetemplates = new FeatureTemplates({
		//   container: document.getElementById("addTemplatesDiv"),
		//   layers: [LineFeature]
		// });

    //     // Listen for when a polygontemplates item is selected
    //     Linetemplates.on("select", (evtTemplate) => {

    //       if(isLineSelected){
    //         isLineSelected = false;
          
    //       // Access the template item's attributes from the event's
    //       // template prototype.
    //       attributes = evtTemplate.template.prototype.attributes;
		//       console.log(evtTemplate);
    //       unselectFeature();
    //       sketchpolygon.cancel();
    //       sketchpoint.cancel();
    //       document.getElementById("ArcgisSatellite").style.cursor = "crosshair";
    //       featureFormLine.feature = null;
    //       sketchline.create(
    //         "polyline", 
    //         { 
    //           mode: "click", 
    //           creationMode: "single" 
    //         }
    //       );
    //     }
    //       else{
    //         isLineSelected = true;
    //         sketchline.cancel();
    //         document.getElementById("ArcgisSatellite").style.cursor = "auto";

    //       }
    //   });
        

      function applyEditsToIncidentsLine(params) {
        LineFeature
          .applyEdits(params)
          .then((editsResult) => {
            // Get the objectId of the newly added feature.
            // Call selectFeature function to highlight the new feature.
            if (editsResult.addFeatureResults.length > 0 || editsResult.updateFeatureResults.length > 0) {
              unselectFeatureline();
              let objectId;
              if (editsResult.addFeatureResults.length > 0) {
                objectId = editsResult.addFeatureResults[0].objectId;
              } else {
                featureFormLine.feature = null;
                objectId = editsResult.updateFeatureResults[0].objectId;
              }
              selectFeatureLine(objectId);
              // if (addFeatureDiv.style.display === "block") {
              //   //toggleEditingDivsline("none", "block");
              // }
              // else if(addFeatureDiv.style.display === "none"){
              //   //toggleEditingDivsLineAfterDeletion("block","none");

              // }
            }
            // show FeatureTemplates if user deleted a feature
            else if (editsResult.deleteFeatureResults.length > 0) {
              //toggleEditingDivsLineAfterDeletion("block", "none");

              // addFeatureDiv.style.display = "none";
              // attributeEditingpoly.style.display = "none";

              // attributeEditingline.style.display = "block";
              // attributeEditing.style.display = "none";
            }
          })
          .catch((error) => {
            console.log("error = ", error);
          });
      }

      function selectExistingFeatureLine() {
        view.on("click", (event) => {
          // clear previous feature selection
          unselectFeatureline();
          if (document.getElementById("ArcgisSatellite").style.cursor != "crosshair") {
            view.hitTest(event).then((response) => {
              // If a user clicks on an incident feature, select the feature.
              if (response.results.length === 0) {
                toggleEditingDivsline("block", "none");
                attributeEditingpoly.style.display = "none";
                  attributeEditing.style.display = "none";
              } else if (response.results[0].graphic && response.results[0].graphic.layer.id == "auiddd") {
                var AllowToEdit=$("#selectBtn").hasClass("AllowToEdit");
                  // alert(AllowToEdit);
                  $(".esri-component").removeClass("d-none")

                  if(AllowToEdit){
                    $(".esri-component").addClass("d-none")

                gr = response.results[0].graphic;

                LineFeature
            .queryFeatures({
              objectIds: [response.results[0].graphic.attributes[LineFeature.objectIdField]],
              outFields: ["*"],
              returnGeometry: true
            })
            .then((results) => {
              if (results.features.length > 0) {
                editFeatureLine = results.features[0];

                document.getElementById("linebahagian").value = results.features[0].attributes['Bahagian'];
                document.getElementById("linenegeri").value = results.features[0].attributes['Negeri'];
                document.getElementById("linedaerah").value = results.features[0].attributes['Daerah'];
                document.getElementById("lineparlimen").value = results.features[0].attributes['Parlimen'];
                document.getElementById("linedun").value = results.features[0].attributes['DUN'];
                document.getElementById("linetahun").value = results.features[0].attributes['Tahun_Perm'];
                document.getElementById("linejenis").value = results.features[0].attributes['Jenis_Perm'];
                document.getElementById("linenorujukan").value = results.features[0].attributes['NoRujukanP'];
                document.getElementById("linekomponenkerja").value = results.features[0].attributes['Komponen_K'];
                document.getElementById("linepanjang").value = results.features[0].attributes['Panjang'];
                document.getElementById("linenamakomponen").value = results.features[0].attributes['Nama_Kompo'];
                document.getElementById("linenamaprojek").value = results.features[0].attributes['NamaProje'];

                // display the attributes of selected feature in the form
                // featureFormLine.feature = editFeatureLine;

                //highlight the feature on the view
                view.whenLayerView(editFeatureLine.layer).then((layerView) => {
                  highlightline = layerView.highlight(editFeatureLine);
                });

                // const edits = {
                //   deleteFeatures: [editFeatureLine]
                // };                  
                // applyEditsToIncidentsLine(edits);
                // addFeatureDiv.style.display = "none";
                // attributeEditingpoly.style.display = "none";

                // attributeEditingline.style.display = "block";
                // attributeEditing.style.display = "none";
              }
            });
            addFeatureDiv.style.display = "none";
            attributeEditingpoly.style.display = "none";

            attributeEditingline.style.display = "block";
            attributeEditing.style.display = "none";

            unselectFeatureline();

            //map.add(graphicsLayer);

            graphicsLayer.graphics.add(gr);

            setTimeout(() => {
                  sketchline.update([gr],{ tool: "transform" });
                }, 1000);

                
                if (addFeatureDiv.style.display === "block" || attributeEditing.style.display === "block" || attributeEditingpoly.style.display === "block") {
                  toggleEditingDivsline("none", "block");
                }
                //selectFeatureLine(response.results[0].graphic.attributes[pointFeature.objectIdField]);
              }
            }
            });
          }
        });
      }

        function toggleEditingDivsline(addDiv, attributesDiv) {
          addFeatureDiv.style.display = addDiv;
          attributeEditingline.style.display = attributesDiv;

          attributeEditingpoly.style.display = addDiv;
          attributeEditing.style.display = addDiv;

          //document.getElementById("updateInstructionDiv").style.display = addDiv;
        }

        function toggleEditingDivsLineAfterDeletion(addDiv, attributesDiv) {
          addFeatureDiv.style.display = addDiv;
          attributeEditingline.style.display = attributesDiv;

          attributeEditingpoly.style.display = attributesDiv;
          attributeEditing.style.display = attributesDiv;

          //document.getElementById("updateInstructionDiv").style.display = addDiv;
        }

        // Remove the feature highlight and remove attributes
        // from the feature form.
        function unselectFeatureline() {
          if (highlightline) {
            highlightline.remove();
          }
        }

        function selectFeatureLine(objectId) {

          unselectFeatureline();
          
          // query feature from the server
          LineFeature
            .queryFeatures({
              objectIds: [objectId],
              outFields: ["*"],
              returnGeometry: true
            })
            .then((results) => {
              if (results.features.length > 0) {
                editFeatureLine = results.features[0];

                // display the attributes of selected feature in the form
                featureFormLine.feature = editFeatureLine;

                //highlight the feature on the view
                view.whenLayerView(editFeatureLine.layer).then((layerView) => {
                  highlightline = layerView.highlight(editFeatureLine);
                });
              }
            });
        }

        // Update attributes of the selected feature.
        document.getElementById("btnUpdateline").onclick = () => {
          // Fires feature form's submit event.

          graphicsLayer.graphics.removeAll();
          // const edits = {
          //   addFeatures: [editFeatureLine]
          // };
          
          // applyEditsToIncidentsLine(edits);

          // updatevaluesline();

          

          //featureFormLine.submit();

          if(sketchline.state === 'active'){
              const edits = {
                updateFeatures: [editFeatureLine]
              };
              applyEditsToIncidentsLine(edits);
              $("#selectBtn").removeClass("AllowToEdit");
              $("#selectBtn").addClass('bg-light')
              $("#selectBtn").removeClass('bg-primary')
            }
            else{
              const edits = {
                addFeatures: [editFeatureLine]
              };
              applyEditsToIncidentsLine(edits);
              $("#selectBtn").removeClass("AllowToEdit");
              $("#selectBtn").addClass('bg-light')
              $("#selectBtn").removeClass('bg-primary')
            }

            
            //view.graphics.add(editFeaturepoly)
            
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
            updatevaluesline();
            addFeatureDiv.style.display = "block";
            attributeEditingpoly.style.display = "none";
            attributeEditingline.style.display = "none";
            attributeEditing.style.display = "none";

            document.getElementById("pointkomponenkerja").value=1;
            document.getElementById("polykomponenkerja").value=1;
            document.getElementById("linekomponenkerja").value=1;

            document.getElementById("linenamakomponen").value="";
            document.getElementById("polynamakomponen").value="";
            document.getElementById("pointnamakomponen").value="";
            $(".esri-item-list__list-item--selected").removeAttr('selected');
        };

        // Delete the selected feature. ApplyEdits is called
        // with the selected feature to be deleted.
        document.getElementById("btnDeleteline").onclick = () => {
          // setup the applyEdits parameter with deletes.
          const edits = {
            deleteFeatures: [editFeatureLine]
          };
          applyEditsToIncidentsLine(edits);
          graphicsLayer.graphics.removeAll();
          $("#selectBtn").removeClass("AllowToEdit");
              $("#selectBtn").addClass('bg-light')
              $("#selectBtn").removeClass('bg-primary')
          document.getElementById("ArcgisSatellite").style.cursor = "auto";

          addFeatureDiv.style.display = "block";
          attributeEditingpoly.style.display = "none";
          attributeEditingline.style.display = "none";
          attributeEditing.style.display = "none";


          //   $("#addTemplatesDiv").addClass("d-block")
          // $("#addFeatureDiv").addClass("d-block")
          // $("#featureUpdateDivline").addClass("d-none")
        };
        //**************************Line Layer Ends ******************************************************************************** */
//**************************point Layer start ******************************************************************************** */

        function createMarkerSymbol(label,value,color){
          return{
            label: label,
                symbol: {
                  type: "simple-marker",  // autocasts as new SimpleFillSymbol()
                  color: color,
                  size: 7,
                },
                values: value
          }
        }

        const pointSimpleRenderer = {
          type: "unique-value",  // autocasts as new UniqueValueRenderer()
          field: "Komponen_Kerja",
          defaultSymbol: {
            type: "simple-marker",
            size: 7,
            color: "black",
            outline: {  // autocasts as new SimpleLineSymbol()
              width: 0.5,
              color: "white"
            }  
          }, 
          uniqueValueGroups: [{
            heading: "Lakaran Point",
            classes: [
             
                createMarkerSymbol("Pump house",1, "blue"),
                createMarkerSymbol("Tidal control gate",2, "#fb65a8"),
                createMarkerSymbol("Flap gate",3, "red"),
                createMarkerSymbol("Medium traffic bridge (MTB)",4, "#9a0aca"),
                createMarkerSymbol("Dam",5, "#e14f1e"),
                createMarkerSymbol("Hydrological Station",6, "#b6fea4"),
                createMarkerSymbol("Barrage",7, "#c255ef"),
                createMarkerSymbol("Bridge",8, "#393975"),
                createMarkerSymbol("Building",9, "#93417e"),
                createMarkerSymbol("Crossing",10, "#6e4736"),
                createMarkerSymbol("Tube well",11, "#6f497e"),
                createMarkerSymbol("Outlet structure",12, "#e4de72"),
                createMarkerSymbol("TNB substation",13, "#64504b"),
                createMarkerSymbol("Weir & Drop structure",14, "#3a599f"),
                createMarkerSymbol("Main Dam",15, "#992928"),
                createMarkerSymbol("Saddle Dam",16, "#c3192b"),
                createMarkerSymbol("Spillway",17, "#5a5f4d"),
                createMarkerSymbol("Water intake tower",18, "#e29004"),
                createMarkerSymbol("Control Gate",19, "#5ea075"),
                createMarkerSymbol("Log boom",20, "#c12254"),
                createMarkerSymbol("Gross pollutant trap (GPT)",21, "#d363bc"),
                createMarkerSymbol("River Water treatment plant (RWTP)",22, "#a2bdad"),
                createMarkerSymbol("Jetty",23, "#064ef5"),
                createMarkerSymbol("Draw Off Tower",24, "#507b7a"),
                createMarkerSymbol("Waste Water Treatment Plan (WWTP)",25, "#bcc197"),
                createMarkerSymbol("Trash rake",26, "#eff863"),
                createMarkerSymbol("Sediment trap",27, "#a1eb48"),
                createMarkerSymbol("Tidal Station",28, "#f1a9db"),
                createMarkerSymbol("Headwork",29, "#2b6d21"),
                createMarkerSymbol("Flume",30, "#8d5d2a"),
                createMarkerSymbol("Orifice",31, "#e2d92b"),
                createMarkerSymbol("Siphon",32, "#b5d7e3"),
                createMarkerSymbol("Swirl",32, "#a2a1c7"),
                createMarkerSymbol("Drainage End Control (DEC)",34, "#b4da30"),
                createMarkerSymbol("Irrigation End Control (IEC)",35, "#5e245c"),
                createMarkerSymbol("Constant Head Orifice(CHO)",36, "#38e51a"),
                createMarkerSymbol("Intake Structure",37, "#f40b90"),
                createMarkerSymbol("WaterTreatment Plan (WTP)",38, "#51e1df"),
                createMarkerSymbol("Check Dam",39, "#af98b4"),
                createMarkerSymbol("Wave Attenuator Structure",40, "#3c9d63"),
                createMarkerSymbol("Viaduct Tunnel",41, "#0cd7a7"),
                createMarkerSymbol("Tower Bridge",42, "#e95aee"),
                createMarkerSymbol("Outlet Tunnel",43, "#d09ab8"),
                createMarkerSymbol("Suction Tank",44, "#1b8766"),
                createMarkerSymbol("Elevation water tank",45, "#8925e9"),
                createMarkerSymbol("Control Structure",46, "#bf0618"),
                createMarkerSymbol("Pesture",47, "#35b650")   
            ]
          }]
        }

        //pop add
        const popupPoint = {
                  "title": "Lakaran point layer",
                  "content": "<b>Komponen Kerja:</b> {Komponen_Kerja}<br><b>Nama Komponen:</b> {Nama_Komponen}<br><b> <b>Nama Projek:</b> {namaProjek}<br><b>No Rujukan Permohonan:</b>{No_Rujukan_Permohonan}<br><b>Bahagian:</b> {Bahagian}<br>Negeri :</b> {Negeri }<br><b>Daerah:</b> {Daerah}<br><b>Parlimen:</b>{Parlimen}<br><b>Dun:</b>{DUN}<br><b>Tahun Permohonan:</b>{Tahun_Perm}<br><b>Jenis Permohonan:</b>{Jenis_Perm}<br><b>Latitud:</b> {Latitud}<br><b>Longitud:</b> {Longitud}<br>"
                }

  const pointFeature = new FeatureLayer({
          //url: "https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/lakaran_point_feature/FeatureServer/0",
          url: "https://npisgis.water.gov.my/arcgis/rest/services/Permohonan/Lakaran_Permohonan_Point/FeatureServer/0",
          outFields: ["*"],
          id: "auid",
          popupTemplate: popupPoint,
          renderer: pointSimpleRenderer,
        });
        map.add(pointFeature);
        // console.log(pointFeature)
        //-----------------------------------------------------------------------------------------------------------------

        var sketchpoint = new Sketch({
          layer: graphicsLayer,
          view: view,
          creationMode:"single"
        });
        const pointQuery = {
         where: "1=1",  // Set by select element
         outFields: ["Komponen_Kerja"], // Attributes to return
         returnGeometry: false
        };

        pointFeature.queryFeatures(pointQuery)
        .then((results) => {
          // console.log("Feature count: " + results.features.length)
          // console.log("Coded Values: " + results.features[0].layer.fields[11].domain.codedValues[0].code);
          // console.log("Coded Values: " + results.features[0].layer.fields[11].domain.codedValues[0].name)

          for(i=0;i<results.features[0].layer.fields.length;i++){
            if(results.features[0].layer.fields[i].name==="Komponen_Kerja"){
              for(j=0;j<results.features[0].layer.fields[i].domain.codedValues.length;j++){
                let option = document.createElement("option");
                option.innerHTML = results.features[0].layer.fields[i].domain.codedValues[j].name;
                option.value = results.features[0].layer.fields[i].domain.codedValues[j].code;
                pointkomponenkerja.appendChild(option);
              }
            }
          }

        }).catch((error) => {
          console.log(error.error);
        });
        
        // Listen to sketch widget's create event.
        sketchpoint.on("update",function(event){
          unselectFeaturepoint();
          unselectFeaturepoly();
          unselectFeatureline();
          // if(highlightpoint){
          //   highlightpolypoint.remove();
          // }
          if (
            event.toolEventInfo &&
            (
              event.toolEventInfo.type === "move-stop" || 
              event.toolEventInfo.type === "move-start" 
            )
          ) {

            // addFeatureDiv.style.display = "none";
            // attributeEditingpoly.style.display = "none";
            // attributeEditingline.style.display = "none";
            // attributeEditing.style.display = "block";

            // const simpleLineSymbol = {
            //     type: "simple-line",
            //     color: [226, 119, 40], // Orange
            //     width: 2
            //   };

              var NegeriCount=$(".negerirow").length;
              //   alert(NegeriCount);
              var NegeriData=[];
              var DaerahData=[];
              var parlimenData=[];
              var dunData=[];

              for(i=1;i<=NegeriCount;i++){
                NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                dunData.push($(".dun_"+i+"").children("option:selected").text());
              }
              
              // Create a new feature using one of the selected
              // template items.

              const lat = Math.round(event.graphics[0].geometry.latitude * 1000) / 1000;
              const lon = Math.round(event.graphics[0].geometry.longitude * 1000) / 1000;

              document.getElementById("pointlongitude").value = Math.round(event.graphics[0].geometry.longitude * 1000) / 1000;
              document.getElementById("pointlatitude").value = Math.round(event.graphics[0].geometry.latitude * 1000) / 1000;

              editFeature = new Graphic({
              geometry: event.graphics[0].geometry,
              attributes: event.graphics[0].attributes
              });
            // if (addFeatureDiv.style.display === "block") {
            //     toggleEditingDivsline("none", "block");
            //   }
            editFeature.attributes["Bahagian"] = document.getElementById("pointbahagian").value;
            editFeature.attributes["Negeri"] = document.getElementById("pointnegeri").value;
            editFeature.attributes["Daerah"] = document.getElementById("pointdaerah").value;
            editFeature.attributes["Parlimen"] = document.getElementById("pointparlimen").value;
            editFeature.attributes["DUN"] = document.getElementById("pointdun").value;
            editFeature.attributes["Tahun_Permohonan"] = parseFloat(document.getElementById("pointtahun").value);
            editFeature.attributes["Jenis_Permohonan"] = document.getElementById("pointjenis").value;
            editFeature.attributes["Komponen_Kerja"] = parseFloat(document.getElementById("pointkomponenkerja").value);
            editFeature.attributes["No_Rujukan_Permohonan"] = document.getElementById("pointnorujukan").value;
            editFeature.attributes["Nama_Komponen"] = document.getElementById("pointnamakomponen").value;
            editFeature.attributes["Nama_Projek"] = document.getElementById("pointnamaprojek").value;
            editFeature.attributes["Latitud"] = parseFloat(document.getElementById("pointlatitude").value);
            editFeature.attributes["Longitud"] = parseFloat(document.getElementById("pointlongitude").value);

            const edits = {
              updateFeatures: [editFeature]
            };

            if(!editorcancelbtn){
              applyEditsToIncidents(edits);
              editorcancelbtn = false;
            }

            

            document.getElementById("ArcgisSatellite").style.cursor = "auto";
            
          }
          else if (event.state === "complete") {

            // addFeatureDiv.style.display = "none";
            // attributeEditingpoly.style.display = "none";
            // attributeEditingline.style.display = "none";
            // attributeEditing.style.display = "block";
            
            //graphicsLayer.remove(event.graphics[0]);
            
             //graphicsLayerpoly.remove(event.graphics[0]);
            //   //sketchpolygon.complete();

            const lat = Math.round(event.graphics[0].geometry.latitude * 1000) / 1000;
            const lon = Math.round(event.graphics[0].geometry.longitude * 1000) / 1000;

            document.getElementById("pointlongitude").value = Math.round(event.graphics[0].geometry.longitude * 1000) / 1000;
            document.getElementById("pointlatitude").value = Math.round(event.graphics[0].geometry.latitude * 1000) / 1000;
            
              var NegeriCount=$(".negerirow").length;
          
              var NegeriData=[];
              var DaerahData=[];
              var parlimenData=[];
              var dunData=[];

              for(i=1;i<=NegeriCount;i++){
                NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                dunData.push($(".dun_"+i+"").children("option:selected").text());
              }
              
              // Create a new feature using one of the selected
              // template items.
              editFeature = new Graphic({
              geometry: event.graphics[0].geometry,
              attributes: event.graphics[0].attributes
            });

            editFeature.attributes["Bahagian"] = document.getElementById("pointbahagian").value;
            editFeature.attributes["Negeri"] = document.getElementById("pointnegeri").value;
            editFeature.attributes["Daerah"] = document.getElementById("pointdaerah").value;
            editFeature.attributes["Parlimen"] = document.getElementById("pointparlimen").value;
            editFeature.attributes["DUN"] = document.getElementById("pointdun").value;
            editFeature.attributes["Tahun_Permohonan"] = parseFloat(document.getElementById("pointtahun").value);
            editFeature.attributes["Jenis_Permohonan"] = document.getElementById("pointjenis").value;
            editFeature.attributes["Komponen_Kerja"] = parseFloat(document.getElementById("pointkomponenkerja").value);
            editFeature.attributes["No_Rujukan_Permohonan"] = document.getElementById("pointnorujukan").value;
            editFeature.attributes["Nama_Komponen"] = document.getElementById("pointnamakomponen").value;
            editFeature.attributes["Nama_Projek"] = document.getElementById("pointnamaprojek").value;
            editFeature.attributes["Latitud"] = parseFloat(document.getElementById("pointlatitude").value);
            editFeature.attributes["Longitud"] = parseFloat(document.getElementById("pointlongitude").value);

            const edits = {
              updateFeatures: [editFeature]
            };

            if(!editorcancelbtn){
              applyEditsToIncidents(edits);
              editorcancelbtn = false;
            }

            

            // if (addFeatureDiv.style.display === "block") {
            //     toggleEditingDivsline("none", "block");
            //   }


            // Setup the applyEdits parameter with adds.
            
            //view.graphics.add(editFeaturepoly)
            //applyEditsToIncidentsPolygon(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        });

        // Listen to sketch widget's create event.
        

        // Listen to sketch widget's create event.
        sketchpoint.on("create", function(event) {
            // check if the create event's state has changed to complete indicating
            // the graphic create operation is completed.
            if (event.state === "complete") {
              // remove the graphic from the layer. Sketch adds
              // the completed graphic to the layer by default.
              const lat = Math.round(event.graphic.geometry.latitude * 1000) / 1000;
              const lon = Math.round(event.graphic.geometry.longitude * 1000) / 1000;

              document.getElementById("pointlongitude").value = Math.round(event.graphic.geometry.longitude * 1000) / 1000;
              document.getElementById("pointlatitude").value = Math.round(event.graphic.geometry.latitude * 1000) / 1000;
              
              

              var NegeriCount=$(".negerirow").length;
              //   alert(NegeriCount);
                  var NegeriData=[];
                  var DaerahData=[];
                  var parlimenData=[];
                  var dunData=[];

                for(i=1;i<=NegeriCount;i++){
                  NegeriData.push($(".negeri_"+i+"").children("option:selected").text());
                  DaerahData.push($(".daerah_"+i+"").children("option:selected").text());
                  parlimenData.push($(".parlimen_"+i+"").children("option:selected").text());
                  dunData.push($(".dun_"+i+"").children("option:selected").text());

                }

                for(i=0;i<=NegeriCount;i++){
                    if(NegeriData[i]=='--Pilih--'){
                      NegeriData[i]='';
                    }
                    if(DaerahData[i]=='--Pilih--'){
                      DaerahData[i]='';
                    }
                    if(parlimenData[i]=='--Pilih--'){
                      parlimenData[i]='';
                    }
                    if(dunData[i]=='--Pilih--'){
                      dunData[i]='';
                    }
                }
                document.getElementById("pointnegeri").value = NegeriData.toString();
                document.getElementById("pointdaerah").value = DaerahData.toString();
                document.getElementById("pointparlimen").value = parlimenData.toString();
                document.getElementById("pointdun").value = dunData.toString();

                
                editFeature = new Graphic({
                  geometry: event.graphic.geometry,
                  attributes: graphicsLayer.graphics.attributes,
                  // attributes: {
                  //   auid : "auid",
                  //   OBJECTID: 21,
                  //   Nama_Projek : name_projek,
                  //   No_Rujukan_Permohonan : NoRujukan_P,
                  //   Komponen_Kerja: 1,
                  //   Nama_Komponen: "",
                  //   Negeri:NegeriData.toString(),
                  //   Bahagian:Bahagian,
                  //   Daerah:DaerahData.toString(),
                  //   Parlimen:parlimenData.toString(),
                  //   DUN:dunData.toString(),
                  //   Tahun_Permohonan:tahun,
                  //   Jenis_Permohonan:Jenis,
                  //   Latitud:lat,
                  //   Longitud:lon
                  // }
                });

                // if (addFeatureDiv.style.display === "block") {
                //   toggleEditingDivs("none", "block");
                // }
                editFeature.attributes["Bahagian"] = document.getElementById("pointbahagian").value;
                editFeature.attributes["Negeri"] = document.getElementById("pointnegeri").value;
                editFeature.attributes["Daerah"] = document.getElementById("pointdaerah").value;
                editFeature.attributes["Parlimen"] = document.getElementById("pointparlimen").value;
                editFeature.attributes["DUN"] = document.getElementById("pointdun").value;
                editFeature.attributes["Tahun_Permohonan"] = parseFloat(document.getElementById("pointtahun").value);
                editFeature.attributes["Jenis_Permohonan"] = document.getElementById("pointjenis").value;
                editFeature.attributes["Komponen_Kerja"] = parseFloat(document.getElementById("pointkomponenkerja").value);
                editFeature.attributes["No_Rujukan_Permohonan"] = document.getElementById("pointnorujukan").value;
                editFeature.attributes["Nama_Komponen"] = document.getElementById("pointnamakomponen").value;
                editFeature.attributes["Nama_Projek"] = document.getElementById("pointnamaprojek").value;
                editFeature.attributes["Latitud"] = parseFloat(document.getElementById("pointlatitude").value);
                editFeature.attributes["Longitud"] = parseFloat(document.getElementById("pointlongitude").value);

                const edits = {
                  addFeatures: [editFeature]
                };

                //applyEditsToIncidents(edits);
                // graphicsLayer.remove(event.graphic);

                if (addFeatureDiv.style.display === "block") {
                  toggleEditingDivs("none", "block");
                }
                document.getElementById("ArcgisSatellite").style.cursor = "auto";
            
              
          }
        });

        //-----------------------------------------------------------------------------------------------------------------
        
        // const selectedSeason = 'BPB/2023/002';
        

        function filter(NoRujukan_P){
            view.whenLayerView(pointFeature).then((layerView) => {
            // // flash flood warnings layer loaded
            // // get a reference to the flood warnings layerview
            layerView.filter = {
            where: "NoRujukanP = '" + NoRujukan_P + "'"
            };
            });

            view.whenLayerView(PolygonFeature).then((layerView) => {
            // flash flood warnings layer loaded
            // get a reference to the flood warnings layerview
            layerView.filter = {
            where: "NoRujukanP = '" + NoRujukan_P + "'"
            };

            });

            view.whenLayerView(LineFeature).then((layerView) => {
            // flash flood warnings layer loaded
            // get a reference to the flood warnings layerview
            layerView.filter = {
            where: "NoRujukanP = '" + NoRujukan_P + "'"
            };

            });
        }


        function updatevaluespoint(){
          if (editFeature) {
            
            // Grab updated attributes from the form.
            //const updated = featureFormboundary.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            //Object.keys(updated).forEach((name) => {
              //if(name=="name_projek"){
                editFeature.attributes["Bahagian"] = document.getElementById("pointbahagian").value;
                editFeature.attributes["Negeri"] = document.getElementById("pointnegeri").value;
                editFeature.attributes["Daerah"] = document.getElementById("pointdaerah").value;
                editFeature.attributes["Parlimen"] = document.getElementById("pointparlimen").value;
                editFeature.attributes["DUN"] = document.getElementById("pointdun").value;
                editFeature.attributes["Tahun_Permohonan"] = parseFloat(document.getElementById("pointtahun").value);
                editFeature.attributes["Jenis_Permohonan"] = document.getElementById("pointjenis").value;
                editFeature.attributes["Komponen_Kerja"] = parseFloat(document.getElementById("pointkomponenkerja").value);
                editFeature.attributes["No_Rujukan_Permohonan"] = document.getElementById("pointnorujukan").value;
                editFeature.attributes["Nama_Komponen"] = document.getElementById("pointnamakomponen").value;
                editFeature.attributes["Nama_Projek"] = document.getElementById("pointnamaprojek").value;
                editFeature.attributes["Latitud"] = parseFloat(document.getElementById("pointlatitude").value);
                editFeature.attributes["Longitud"] = parseFloat(document.getElementById("pointlongitude").value);

                
                
              //}
            //   else{
            //     editFeaturepoly.attributes[name] = updated[name];
            //   }
              
            // });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeature]
            };
            applyEditsToIncidents(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        }
        const featureForm = new FeatureForm({
          view: view, // required if using Arcade expressions using the $map global variable
          //container: document.getElementById("formDiv"),
          //layer: pointFeature,
          formTemplate: {
            title: "Test default attribute",
            elements : [
              {
                type: "field",
                fieldName: "Komponen_K",
                label: "Komponen Kerja"
              },  
              {
                type: "field",
                fieldName: "Nama_Komponen",
                label: "Nama Komponen"
              }, 
              {
                type: "field",
                fieldName: "namaProjek",
                label: "Nama Projek",
                editable: false,
              },
              {
                type: "field",
                fieldName: "NoRujukanP",
                label: "No Rujukan Permohonan",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Bahagian",
                label: "Bahagian",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Negeri",
                label: "Negeri",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Daerah",
                label: "Daerah",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Parlimen",
                label: "Parlimen",
                editable: false,

              },
              {
                type: "field",
                fieldName: "DUN",
                label: "DUN",
                editable: false,

              },
              {
                type: "field",
                fieldName: "Tahun_Perm",
                label: "Tahun Permohonan",
                editable: false,
                
              },              
              {
                type: "field",
                fieldName: "Jenis_Perm",
                label: "Jenis Permohonan",
                editable: false,
              },    
                         
              {
                type: "field",
                fieldName: "Latitud",
                label: "Latitud",
                editable: false,
              },
              {
                type: "field",
                fieldName: "Longitud",
                label: "Longitud",
                editable: false,
              },

            ]
          }
        });

        // var NoRujukan=$("#noRujukanData").val();
        // alert(NoRujukan);


        
        //##############################################################################################################

        // Listen to the feature form's submit event.
        // Update feature attributes shown in the form.
        featureForm.on("submit", () => {
          if (editFeature) {
            // Grab updated attributes from the form.
            const updated = featureForm.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            Object.keys(updated).forEach((name) => {
              editFeature.attributes[name] = updated[name];
            });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeature]
            };
            applyEditsToIncidents(edits);
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
          }
        });

        selectExistingFeature();
        const templates = new FeatureTemplates({
          container: document.getElementById("addTemplatesDiv"),
          layers: [pointFeature, PolygonFeature, LineFeature]
        });



          // Listen for when a template item is selected
        templates.on("select", (evtTemplate) => {
          //alert('The template selected is '+ evtTemplate.template.drawingTool);
          if(evtTemplate.template.drawingTool=='point') {
            if(isPointSelected){
              isPointSelected=false;
              // Access the template item's attributes from the event's
              // template prototype.
              attributes = evtTemplate.template.prototype.attributes;
              //console.log(evtTemplate);
              sketchpolygon.cancel();
              sketchline.cancel();
              unselectFeaturepoint();
              unselectFeaturepoly();
              unselectFeatureline();
              document.getElementById("ArcgisSatellite").style.cursor = "crosshair";

              featureForm.feature = null;

              graphicsLayer.graphics.attributes = attributes;

              sketchpoint.create(
                "point", 
                { 
                  mode: "click", 
                  creationMode: "single" 
                }
              );
            }
            else{
              isPointSelected = true;
              sketchpoint.cancel();
              document.getElementById("ArcgisSatellite").style.cursor = "auto";
            }

          }
          else if(evtTemplate.template.drawingTool=='polygon'){
            if(isPolygonSelected){
              isPolygonSelected = false;
          
              // Access the template item's attributes from the event's
              // template prototype.
              attributes = evtTemplate.template.prototype.attributes;
              console.log(evtTemplate);
              sketchline.cancel();
              sketchpoint.cancel();
              unselectFeaturepoint();
              unselectFeaturepoly();
              unselectFeatureline();
              document.getElementById("ArcgisSatellite").style.cursor = "crosshair";

              featureFormboundary.feature = null;

              sketchpolygon.create(
                "polygon", 
                { 
                  mode: "click"
                  
                }
              );
            }
            else{
              isPolygonSelected = true;
              sketchpolygon.cancel();
              document.getElementById("ArcgisSatellite").style.cursor = "auto";

            }


          }
          else if(evtTemplate.template.drawingTool=='line'){

            if(isLineSelected){
              isLineSelected = false;
              // Access the template item's attributes from the event's
              // template prototype.
              attributes = evtTemplate.template.prototype.attributes;
              console.log(evtTemplate);
              unselectFeaturepoint();
              unselectFeaturepoly();
              unselectFeatureline();
              sketchpolygon.cancel();
              sketchpoint.cancel();
              document.getElementById("ArcgisSatellite").style.cursor = "crosshair";
              featureFormLine.feature = null;
              sketchline.create(
               "polyline", 
                { 
                mode: "click", 
                creationMode: "single" 
              }
            );
          }
          else{
            isLineSelected = true;
            sketchline.cancel();
            document.getElementById("ArcgisSatellite").style.cursor = "auto";

          }

          } 
          
        });

        // Call FeatureLayer.applyEdits() with specified params.
        function applyEditsToIncidents(params) {
          pointFeature
            .applyEdits(params)
            .then((editsResult) => {
              // Get the objectId of the newly added feature.
              // Call selectFeature function to highlight the new feature.
              if (editsResult.addFeatureResults.length > 0 || editsResult.updateFeatureResults.length > 0) {
                unselectFeaturepoint();
                let objectId;
                if (editsResult.addFeatureResults.length > 0) {
                  objectId = editsResult.addFeatureResults[0].objectId;
                  

                } else {
                  featureForm.feature = null;
                  objectId = editsResult.updateFeatureResults[0].objectId;

                }
                selectFeature(objectId);
                // if (addFeatureDiv.style.display === "block") {
                //   toggleEditingDivs("none", "block");
                  
                //   attributeEditingpoly.style.display = "none";
                //   attributeEditingline.style.display = "none";
                  
                // }
                // else if(addFeatureDiv.style.display === "none"){
                //     toggleEditingDivs("block","none");
                //     attributeEditingpoly.style.display = "none";
                //     attributeEditingline.style.display = "none";

                // }
              }
              // show FeatureTemplates if user deleted a feature
              // else if (editsResult.deleteFeatureResults.length > 0) {
                
              //   //toggleEditingDivsPointAfterDeletion("block", "none");
              //   // addFeatureDiv.style.display = "none";
              //   // attributeEditingpoly.style.display = "none";

              //   // attributeEditingline.style.display = "none";
              //   // attributeEditing.style.display = "block";
              
              // }
            })
            .catch((error) => {
              console.log("error = ", error);
            });
        }


        function selectExistingFeature() {
          view.on("click", (event) => {
            // clear previous feature selection
            unselectFeaturepoint();
            if (document.getElementById("ArcgisSatellite").style.cursor != "crosshair") {
              view.hitTest(event).then((response) => {
                console.log(response)
                // If a user clicks on an incident feature, select the feature.
                if (response.results.length === 0) {
                  toggleEditingDivs("block", "none");
                  attributeEditingpoly.style.display = "none";
                  attributeEditingline.style.display = "none";
                } 
                else if (response.results[0].graphic && response.results[0].graphic.layer.id == "auid") {
                  var AllowToEdit=$("#selectBtn").hasClass("AllowToEdit");
                  // alert(AllowToEdit);
                  $(".esri-component").removeClass("d-none")
                  if(AllowToEdit){

                    $(".esri-component").addClass("d-none")
                      gr = response.results[0].graphic;
                      pointFeature
                      .queryFeatures({
                        objectIds: [response.results[0].graphic.attributes[pointFeature.objectIdField]],
                        outFields: ["*"],
                        returnGeometry: true
                      })
                      .then((results) => {
                        if (results.features.length > 0) {
                          // console.log('check here')
                          // console.log(results)
                          editFeature = results.features[0];
                          document.getElementById("pointbahagian").value = results.features[0].attributes['Bahagian'];
                          document.getElementById("pointnegeri").value = results.features[0].attributes['Negeri'];
                          document.getElementById("pointdaerah").value = results.features[0].attributes['Daerah'];
                          document.getElementById("pointparlimen").value = results.features[0].attributes['Parlimen'];
                          document.getElementById("pointdun").value = results.features[0].attributes['DUN'];
                          document.getElementById("pointtahun").value = results.features[0].attributes['Tahun_Permohonan'];
                          document.getElementById("pointjenis").value = results.features[0].attributes['Jenis_Permohonan'];
                          document.getElementById("pointnorujukan").value = results.features[0].attributes['No_Rujukan_Permohonan'];
                          document.getElementById("pointkomponenkerja").value = results.features[0].attributes['Komponen_Kerja'];
                          document.getElementById("pointnamakomponen").value = results.features[0].attributes['Nama_Komponen'];
                          document.getElementById("pointnamaprojek").value = results.features[0].attributes['Nama_Projek'];
                          document.getElementById("pointlongitude").value = results.features[0].attributes['Longitud'];
                          document.getElementById("pointlatitude").value = results.features[0].attributes['Latitud'];
                          // display the attributes of selected feature in the form
                          // featureForm.feature = editFeature;

                          //highlight the feature on the view
                          view.whenLayerView(editFeature.layer).then((layerView) => {
                            highlightpoint = layerView.highlight(editFeature);
                          });

                          // const edits = {
                          //   deleteFeatures: [editFeature]
                          // };

                          // applyEditsToIncidents(edits);
                          // addFeatureDiv.style.display = "none";
                          // attributeEditingpoly.style.display = "none";
                          // attributeEditingline.style.display = "none";
                          // attributeEditing.style.display = "block";
                        }
                      });
                          addFeatureDiv.style.display = "none";
                          attributeEditingpoly.style.display = "none";
                          attributeEditingline.style.display = "none";
                          attributeEditing.style.display = "block";

                          unselectFeaturepoint();

                          //map.add(graphicsLayer);

                      graphicsLayer.graphics.add(gr);

                      setTimeout(() => {
                            sketchpoint.update([gr],{ tool: "move" });
                          }, 1000);

                          
                          if (addFeatureDiv.style.display === "block" || attributeEditingline.style.display === "block" || attributeEditingpoly.style.display === "block") {
                            toggleEditingDivsline("none", "block");
                          }
                        // if (addFeatureDiv.style.display === "block") {
                        //   toggleEditingDivs("none", "block");
                        // }
                        //selectFeature(response.results[0].graphic.attributes[pointFeature.objectIdField]);
                      }
                    }
                });
              }
            });
          }

        function toggleEditingDivs(addDiv, attributesDiv) {
          addFeatureDiv.style.display = addDiv;
          attributeEditing.style.display = attributesDiv;
          attributeEditingpoly.style.display = addDiv;
          attributeEditingline.style.display = addDiv;

          //document.getElementById("updateInstructionDiv").style.display = addDiv;
        }

        function toggleEditingDivsPointAfterDeletion(addDiv, attributesDiv) {
          addFeatureDiv.style.display = addDiv;
          attributeEditingline.style.display = addDiv;

          attributeEditingpoly.style.display = addDiv;
          attributeEditing.style.display = attributesDiv;

          //document.getElementById("updateInstructionDiv").style.display = addDiv;
        }

        // Remove the feature highlight and remove attributes
        // from the feature form.
        function unselectFeaturepoint() {
          if (highlightpoint) {
            highlightpoint.remove();
          }
        }

        // Highlights the clicked feature and display
        // the feature form with the incident's attributes.
        function selectFeature(objectId) {
          unselectFeaturepoint();
          
          // query feature from the server
          pointFeature
            .queryFeatures({
              objectIds: [objectId],
              outFields: ["*"],
              returnGeometry: true
            })
            .then((results) => {
              if (results.features.length > 0) {
                editFeature = results.features[0];

                
                // display the attributes of selected feature in the form
                featureForm.feature = editFeature;

                //highlight the feature on the view
                view.whenLayerView(editFeature.layer).then((layerView) => {
                  highlightpoint = layerView.highlight(editFeature);
                });
              }
            });
        }

        // Update attributes of the selected feature.
        document.getElementById("btnUpdate").onclick = () => {
          // Fires feature form's submit event.

          graphicsLayer.graphics.removeAll();
          // const edits = {
          //   addFeatures: [editFeature]
          // };
          
          // applyEditsToIncidents(edits);
          // updatevaluespoint();
          //featureForm.submit();

          if(sketchpoint.state === 'active'){
              const edits = {
                updateFeatures: [editFeature]
              };
              applyEditsToIncidents(edits);
              $("#selectBtn").removeClass("AllowToEdit");
              $("#selectBtn").addClass('bg-light')
              $("#selectBtn").removeClass('bg-primary')
            }
            else{
              const edits = {
                addFeatures: [editFeature]
              };
              applyEditsToIncidents(edits);
              $("#selectBtn").removeClass("AllowToEdit");
              $("#selectBtn").addClass('bg-light')
              $("#selectBtn").removeClass('bg-primary')
            }

            
            //view.graphics.add(editFeaturepoly)
            
            document.getElementById("ArcgisSatellite").style.cursor = "auto";
            updatevaluespoint();
            addFeatureDiv.style.display = "block";
            attributeEditingpoly.style.display = "none";
            attributeEditingline.style.display = "none";
            attributeEditing.style.display = "none";

            document.getElementById("pointkomponenkerja").value=1;
            document.getElementById("polykomponenkerja").value=1;
            document.getElementById("linekomponenkerja").value=1;

            document.getElementById("linenamakomponen").value="";
            document.getElementById("polynamakomponen").value="";
            document.getElementById("pointnamakomponen").value="";
            $(".esri-item-list__list-item--selected").removeAttr('selected');

        };

        // Delete the selected feature. ApplyEdits is called
        // with the selected feature to be deleted.
        document.getElementById("btnDelete").onclick = () => {
          // setup the applyEdits parameter with deletes.
          const edits = {
            deleteFeatures: [editFeature]
          };
          applyEditsToIncidents(edits);
          document.getElementById("ArcgisSatellite").style.cursor = "auto";
          graphicsLayer.graphics.removeAll();
          $("#selectBtn").removeClass("AllowToEdit");
          $("#selectBtn").addClass('bg-light')
          $("#selectBtn").removeClass('bg-primary')
          addFeatureDiv.style.display = "block";
          attributeEditingpoly.style.display = "none";
          attributeEditingline.style.display = "none";
          attributeEditing.style.display = "none";
        };

       
  

  //###########################################################################################################


        // const editor = new Editor({
        //   view: view, // autocasts as new EditorViewModel
        //   layerInfos: [pointFeature],
        //   enabled: true, // Default is true, set to false to disable editing functionality.
        //   addEnabled: true, // Default is true, set to false to disable the ability to add a new feature.
        //   updateEnabled: false, // Default is true, set to false to disable the ability to edit an existing feature.
        //   /*//deleteEnabled: false // Default is true, set to false to disable the ability to delete features.
        //   attributeUpdatesEnabled: true // Default is true, set to false to disable the ability to edit attributes in the //update workflow.
        //   geometryUpdatesEnabled: true // Default is true, set to false to disable the ability to edit feature geometries in //the update workflow.
        //   attachmentsOnCreateEnabled: true //Default is true, set to false to disable the ability to work with attachments while creating features.
        //   attachmentsOnUpdateEnabled: true //Default is true, */
        //   container: document.getElementById("editor")

        // });
        // view.ui.add(editor, "top-right");
        // map.add(boundaryPoly);



    // map.add(graphicsLayer);
    const search = new Search({  //Add Search widget
      view: view
    });    

    view.ui.add(search, "top-right"); //Add to the map

    const homeBtn = new Home({
          view: view
        });

        // Add the home button to the top left corner of the view
        view.ui.add(homeBtn, "top-left");

        const basemapGallery = new BasemapGallery({
          view: view,
          container: document.getElementById("BasemapGallery")
        });

        // Create an Expand instance and set the content
        // property to the DOM node of the basemap gallery widget
        // Use an Esri icon font to represent the content inside
        // of the Expand widget

        const bgExpand = new Expand({
          view: view,
          content: basemapGallery
        });
        //Trailheads feature layer (points)
        // const trailheadsLayer = new FeatureLayer({
        //   url: "https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/boundary_sample/FeatureServer",
        // });

        // map.add(trailheadsLayer);
        // const pointLayer= new FeatureLayer({
        //   url:"https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/point_sample/FeatureServer"
        // })
        // map.add(pointFeature);

        

        // close the expand whenever a basemap is selected
        basemapGallery.watch("activeBasemap", () => {
          const mobileSize = view.heightBreakpoint === "xsmall" || view.widthBreakpoint === "xsmall";

          if (mobileSize) {
            bgExpand.collapse();
          }
        });

        // Add the expand instance to the ui

        // view.ui.add(bgExpand, "bottom-right");

    const track = new Track({
      view: view,
      graphic: new Graphic({
        symbol: {
          type: "simple-marker",
          size: "12px",
          color: "green",
          outline: {
            color: "#efefef",
            width: "1.5px"
          }
        }
      }),
      useHeadingEnabled: false
    });
    view.ui.add(track, "top-left");

    let layerList = new LayerList({
            view: view,
            container: document.getElementById("LayerContent")

          });


    //Add Scalebar
let scaleBar = new ScaleBar({
          view: view,
          unit: "metric"
        });
        // Add scale widget to the bottom left corner of the view
        view.ui.add(scaleBar, {
          position: "bottom-left"
        });

    //************************************************************************************* */



    //************************************************************************************** */

    // view.popup.autoOpenEnabled = false;
    // view.on("click", (event) => {
    //   // Get the coordinates of the click on the view
    //   const lat = Math.round(event.mapPoint.latitude * 1000) / 1000;
    //   const lon = Math.round(event.mapPoint.longitude * 1000) / 1000;

    //   view.popup.open({
    //     // Set the popup's title to the coordinates of the location
    //     title: "Reverse geocode: [" + lon + ", " + lat + "]",
    //     location: event.mapPoint // Set the location of the popup to the clicked location
    //   });

    //     const params = {
    //       location: event.mapPoint
    //     };

    //     // Display the popup
    //     // Execute a reverse geocode using the clicked location
    //   locator
    //     .locationToAddress(locatorUrl, params)
    //     .then((response) => {
    //       // If an address is successfully found, show it in the popup's content
    //       view.popup.content = response.address;
    //     })
    //     .catch(() => {
    //       // If the promise fails and no result is found, show a generic message
    //       view.popup.content = "No address was found for this location";
    //     });




    // });
      // Set the activeView to the 2D MapView
      let activeView = view;

      // Create new instance of the Measurement widget
      const measurement = new Measurement({
        view: view,
      });
      var distanceButton=$("#distance").click(function(){
        distanceMeasurement();
      })
      var areaButton=$("#area").click(function(){
        areaMeasurement();
      })
      var clearButton=$("#clear").click(function(){
        clearMeasurements();
      })
        
      function distanceMeasurement() {
          const type = activeView.type;
          measurement.activeTool = type.toUpperCase() === "2D" ? "distance" : "direct-line";
          distanceButton.addClass("active");
          areaButton.removeClass("active");
        }

        function areaMeasurement() {
          measurement.activeTool = "area";
          distanceButton.removeClass("active");
          areaButton.addClass("active");
        }

        function clearMeasurements() {
          distanceButton.removeClass("active");
          areaButton.removeClass("active");
          measurement.clear();
        }
        
        activeView.ui.add(measurement, "bottom-right");

        const legend = new Legend({
            view: view,
            container: document.getElementById("LegendContent")

          });

          // view.ui.add(legend, "bottom-right");

// ++++++++++++++++++++++++++++++++++++++++++++++++++++Query Part Start ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
var selectedLayer = '';
var noRujukanSelected = '';  
var bahagianSelected = '';  
var negeriSelected = '';  
var daerahSelected = ''; 
var parlimenSelected='';  
var dunSelected = '';
var noRujukValue='';
var bahagianValue='';
var negeriValue='';
var daerahValue='';
var parlimenValue='';
var dunValue='';
var popup='';
var symbology='';
let qry="";
$("#layerQueryData").on('change', function(){
  selectedLayer = $("#layerQueryData option:selected").val();
  selectedLayerText = $("#layerQueryData option:selected").text();
  if(selectedLayerText=='Point Layer'){
    popup=popupPoint;
    symbology=pointSimpleRenderer;
  }
  else if(selectedLayerText=='Line Layer'){
    popup=popupLine;
    symbology=lineSimpleRenderer;
  }
  else{
    popup=popupPolygon;
    symbology=polygonSimpleRenderer;
  }
  })
// $("#noRujukanData").on('change', function(){
//   noRujukanSelected = $("#noRujukanData option:selected").text();
//     if(noRujukanSelected=='All'){
//       noRujukValue='';
//     }else{
//       noRujukValue=noRujukanSelected
//     }
//   })

//   $("#bahagianData").on('change', function(){ 
//     bahagianSelected = $("#bahagianData option:selected").text();  
//     if(bahagianSelected=='All'){
//       bahagianValue='';
//     }else{
//       bahagianValue=bahagianSelected
//     }

//   })
//   $("#negeriData").on('change', function(){ 
//     negeriSelected =$("#negeriData option:selected").text();  
//     if(negeriSelected=='All'){
//       negeriValue='';
//     }else{
//       negeriValue=negeriSelected
//     } 

//   })
//   $("#daerahData").on('change', function(){ 
//     daerahSelected =$("#daerahData option:selected").text(); 
//     if(daerahSelected=='All'||daerahSelected=='--Pilih--'){
//       daerahValue='';
//     }else{
//       daerahValue=daerahSelected
//     } 
   
//   })
//   $("#parlimenData").on('change', function(){ 
//     parlimenSelected =$("#parlimenData option:selected").text();
//     if(parlimenSelected=='All'||parlimenSelected=='--Pilih--'){
//       parlimenValue='';
//     }else{
//       parlimenValue=parlimenSelected
//     } 
       
//   })

//   $("#dunData").on('change', function(){ 
//     dunSelected =$("#dunData option:selected").text(); 
//     if(dunSelected=='All'||dunSelected=='--Pilih--'){
//       dunValue='';
//     }else{
//       dunValue=dunSelected
//     }    
//   })


  $("#queryBtn").click(function(){  
    qry="";
    noRujukanSelected = $("#noRujukanData option:selected").text();
    if(noRujukanSelected != 'All'){
      qry += "NoRujukanP = '" + noRujukanSelected + "'";
    }

    bahagianSelected = $("#bahagianData option:selected").text();
    if(bahagianSelected != 'All'){
      if(qry != ""){
        qry += " And ";  
      }
      qry += "Bahagian = '" + bahagianSelected + "'";
    }

    negeriSelected =$("#negeriData option:selected").text();
    if(negeriSelected != 'All'){
      if(qry != ""){
        qry += " And ";  
      }
      qry += "Negeri LIKE '%" + negeriSelected + "%'";
    }

    daerahSelected =$("#daerahData option:selected").text();
    if(daerahSelected != 'All' || daerahSelected == '--Pilih--'){
      if(qry != ""){
        qry += " And ";  
      }
      qry += "Daerah LIKE '%" + daerahSelected + "%'";
    }

    parlimenSelected =$("#parlimenData option:selected").text();
    if(parlimenSelected != 'All' || parlimenSelected == '--Pilih--'){
      if(qry != ""){
        qry += " And ";  
      }
      qry += "Parlimen LIKE '%" + parlimenSelected + "%'";
    }

    dunSelected =$("#dunData option:selected").text();
    if(dunSelected != 'All' || dunSelected == '--Pilih--'){
      if(qry != ""){
        qry += " And ";  
      }
      qry += "DUN LIKE '%" + dunSelected + "%'";
    }
    
    var seletedData=[selectedLayer,noRujukValue,bahagianValue,negeriValue,daerahValue,parlimenValue,dunValue];
    queryResult(qry, seletedData);
  })

  function queryResult(qry, seletedData){
    map.removeAll();
    const Layer = new FeatureLayer({
      url: seletedData[0],
      popupTemplate: popup,
      renderer:symbology,
    });
    view.map.add(Layer); 

    //******************Query Highlight Code******************************** */

    const pointQuery = {
      where: qry,  // Set by select element
      outFields: ["*"], // Attributes to return
      returnGeometry: true
    };

    Layer.queryFeatures(pointQuery)
    .then((results) => {
      if (results.features.length > 0) {
        //view.whenLayerView(editFeature.layer).then(layerView);
        highlightfeature(Layer, results.features);            
      }
    }).catch((error) => {
      console.log(error.error);
    });
      //******************Query Highlight Code Ends********************************** */
  }

  function highlightfeature(flayer, res){
    let j=0;
    for(j=0; j < res.length; j++){
      editFeature = res[j];
      objectId = editFeature.attributes["FID"];
      
      flayer
      .queryFeatures({
        objectIds: [objectId],
        outFields: ["*"],
        returnGeometry: true
      })
      .then((results) => {
        if (results.features.length > 0) {
          editFeature = results.features[0];
          
          //highlight the feature on the view
          view.whenLayerView(editFeature.layer).then((layerView) => {
            highlight = layerView.highlight(editFeature);
          });
        }
      });
    }
  }


    $("#clear-query").click(function(){
      clearAndCancel() 
      $(".esri-item-list__list-item--selected").removeAttr('selected');
    })
    $("#closeQueryBtn").click(function(){
      clearAndCancel()
      $(".esri-item-list__list-item--selected").removeAttr('selected');
    })
    $("#cancelBtn").click(function(){
      // clearAndCancel();
      $(".esri-item-list__list-item--selected").removeAttr('selected');
      editorcancelbtn = true;
      document.getElementById("pointkomponenkerja").value=1;
      document.getElementById("polykomponenkerja").value=1;
      document.getElementById("linekomponenkerja").value=1;

      document.getElementById("linenamakomponen").value="";
      document.getElementById("polynamakomponen").value="";
      document.getElementById("pointnamakomponen").value="";
      $("#selectBtn").removeClass("AllowToEdit");
      $("#selectBtn").addClass('bg-light')
      $("#selectBtn").removeClass('bg-primary')

      // unselectFeatureline();
      // unselectFeaturepoly();
      // unselectFeaturepoint();

      sketchpolygon.cancel();
      sketchpoint.cancel();
      sketchline.cancel();

      unselectFeatureline();
      unselectFeaturepoly();
      unselectFeaturepoint();


    })

  function clearAndCancel(){
    $('#layerQueryData').val(0);
    $('#noRujukanData').val(0);
    $('#bahagianData').val(0);
    $('#negeriData').val(0);
    $('#daerahData').val(0);
    $('#parlimenData').val(0);   
    $('#dunData').val(0);
    // $("#queryForm")[0].reset();
    $("#negeriData").prop("disabled", true);
    $("#daerahData").prop("disabled", true);
    $("#parlimenData").prop("disabled", true);
    $("#dunData").prop("disabled", true);
    $("#noRujukanData").prop("disabled", true);
    $("#bahagianData").prop("disabled", true);
    $("#queryBtn").prop("disabled", true);
    $("#clear-query").prop("disabled", true);
    $("#selectBtn").removeClass("AllowToEdit");
    $("#selectBtn").addClass('bg-light')
    $("#selectBtn").removeClass('bg-primary')
    unselectFeatureline();
    unselectFeaturepoly();
    unselectFeaturepoint();
    // highlight.remove();


    map.removeAll();
    map.add(pointFeature);
    map.add(LineFeature);
    map.add(PolygonFeature);

        // filter(NoRujukan_P);
  }






  
});

  

  
  

  $("#negeriData").on('change', function(){ 

negeri = document.getElementById("negeriData").value;
var daerahdropDown =  document.getElementById("daerahData");
$("#daerahData").empty();
var el = document.createElement("option"); console.log(el)
   el.textContent = 'All';
   el.value = '0';
   daerahdropDown.appendChild(el);
   api_url = "{{env('API_URL')}}"; 
$.ajax({
   type: "GET",
   url: api_url+"api/lookup/daerah/list?id="+negeri,
   dataType: 'json',
   success: function (result) { console.log(result)
      if (result) {
            $.each(result.data, function (key, item) {
               var opt = item.id;
               var el = document.createElement("option");
               el.textContent = item.nama_daerah;
               el.value = opt;
               daerahdropDown.appendChild(el);
            })
      }
      else {
            $.Notification.error(result.Message);
      }
   }
});
});

$("#daerahData").on('change', function(){
  negeri = document.getElementById("negeriData").value;

    var p_dropDown =  document.getElementById("parlimenData");
    $("#parlimenData").empty();
    var el = document.createElement("option"); console.log(el)
      el.textContent = 'All';
      el.value = '0';
      p_dropDown.appendChild(el);
      api_url = "{{env('API_URL')}}"; 
    $.ajax({
      type: "GET",
      url: api_url+"api/lookup/parlimen/list?id="+negeri,
      dataType: 'json',
      success: function (result) { console.log(result)
          if (result) {
                $.each(result.data, function (key, item) {
                  var opt = item.id;
                  var el = document.createElement("option");
                  el.textContent = item.nama_parlimen;
                  el.value = opt;
                  p_dropDown.appendChild(el);
                })
          }
          else {
                $.Notification.error(result.Message);
          }
      }
    });
});

$("#parlimenData").on('change', function(){
  parlimenData = document.getElementById("parlimenData").value;

    var d_dropDown =  document.getElementById("dunData");
    $("#dunData").empty();
    var el = document.createElement("option"); console.log(el)
      el.textContent = 'All';
      el.value = '0';
      d_dropDown.appendChild(el);
      api_url = "{{env('API_URL')}}"; 
    $.ajax({
      type: "GET",
      url: api_url+"api/lookup/dun/list?id="+parlimenData,
      dataType: 'json',
      success: function (result) { console.log(result)
          if (result) {
                $.each(result.data, function (key, item) {
                  var opt = item.id;
                  var el = document.createElement("option");
                  el.textContent = item.nama_dun;
                  el.value = opt;
                  d_dropDown.appendChild(el);
                })
          }
          else {
                $.Notification.error(result.Message);
          }
      }
    });
});
        
// var noRujukanSelected='';
// var bahagianSelected='';
// var negeriSelected='';
// var daerahSelected='';
// var daerahSelected='';
// var dunSelected='';
// var layerQueryData='';
$("#negeriData").prop("disabled", true);
  $("#daerahData").prop("disabled", true);
  $("#parlimenData").prop("disabled", true);
  $("#dunData").prop("disabled", true);
  $("#noRujukanData").prop("disabled", true);
  $("#bahagianData").prop("disabled", true);
  $("#queryBtn").prop("disabled", true);
  $("#clear-query").prop("disabled", true);
  $("#layerQueryData").on('change', function(){ 
    layerQueryData = document.getElementById("layerQueryData").value;
    // alert('#layerQueryData> option [value!=""]'.length == 0); 
    if(layerQueryData!=''){
        $("#negeriData").prop("disabled", false);
        $("#daerahData").prop("disabled", false);
        $("#parlimenData").prop("disabled", false);
        $("#dunData").prop("disabled", false);
        $("#noRujukanData").prop("disabled", false);
        $("#bahagianData").prop("disabled", false);
        $("#queryBtn").prop("disabled", false);
        $("#clear-query").prop("disabled", false);
    }
    else{
        $("#negeriData").prop("disabled", true);
        $("#daerahData").prop("disabled", true);
        $("#parlimenData").prop("disabled", true);
        $("#dunData").prop("disabled", true);
        $("#noRujukanData").prop("disabled", true);
        $("#bahagianData").prop("disabled", true);
        $("#queryBtn").prop("disabled", true);
        $("#clear-query").prop("disabled", true);
    }

  })

</script>