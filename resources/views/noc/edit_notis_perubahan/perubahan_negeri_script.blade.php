<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');
    var Negeri_ID="";
    var Negeri_ID_pem="";
    var numnegeri=1;
    let options;


    // function get_pementuan_negeri(){
    //     const project_id = 1;
    //     const api_url = "{{env('API_URL')}}";  console.log(api_url);
    //     const api_token = "Bearer "+ window.localStorage.getItem('token');
    //     $.ajaxSetup({
	// 	headers: {
	// 		   "Content-Type": "application/json",
	// 		   "Authorization": api_token,
	// 		   }
    //     });
    //     $.ajax({
    //         type: "GET",
    //         url: api_url+"api/noc/negeri-details-pementuan/"+project_id,
    //         dataType: 'json',
    //         success: function (result) { 
    //             negeridetails = result.data.negeri;
    //             //negeriselectiontype = result.data.negeriselection;
    //             // console.log(result.data);
            
    //             if (negeridetails) { 

    //                 if(negeridetails.length > 0) {
    //                     //intialclick=false;
    //                     $('#negeridiv').empty();
    //                     $('#daerahdiv').empty();
    //                     $('#parlimendiv').empty();
    //                     $('#dundiv').empty();
    //                     numnegeri = 0;
    //                     let negeri = "";
    //                     let daerah = "";
    //                     let parlimen = "";
    //                     let dun = "";
    //                     negeridetails.forEach((item) => {
    //                         numnegeri += 1;


    //                         if(item.negeri_id != Negeri_ID){
    //                             Negeri_ID = item.negeri_id;

    //                             negeri=`<p>`+item.negeri.nama_negeri+`</p>`;
                                
                                
    //                         }
    //                         else{
    //                             negeri=`<p></p>`;
                                

    //                         }
    //                         daerah=`<li>`+item.daerah.nama_daerah+`</li>`;
    //                         parlimen=`<li>`+item.parlimen.nama_parlimen+`</li>`;
    //                         dun=`<li>`+item.dun.nama_dun+`</li>`;
                            
    //                         $("#negeridiv").append(negeri);
    //                         $("#daerahdiv").append(daerah);
    //                         $("#parlimendiv").append(parlimen);
    //                         $("#dundiv").append(dun);
                            

    //                     });
                        
    //                 }

    //             }
    //         }
    //     })
    // }
    

    function get_noc_pem_negeri(){
        const project_id = 1;
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');
        $.ajaxSetup({
		headers: {
			   "Content-Type": "application/json",
			   "Authorization": api_token,
			   }
        });
        //const project_id = 1;//document.getElementById("project_id").value;  console.log(project_id);
        $.ajax({
            type: "GET",
            //url: api_url+"api/noc/negeri-details-pementuan/"+project_id,
            url: api_url+"api/noc/negeri-details/"+project_id,
            dataType: 'json',
            success: function (result) { 
                negeridetails = result.data.negeri;
                negeridetails_pem = result.data.negeri_pem;
                //negeriselectiontype = result.data.negeriselection;
                // console.log(result.data);
            
                if (negeridetails_pem) { 

                    if(negeridetails_pem.length > 0) {
                        
                        $('#negeridiv').empty();
                        $('#daerahdiv').empty();
                        $('#parlimendiv').empty();
                        $('#dundiv').empty();
                        numnegeri = 0;
                        let negeri = "";
                        let daerah = "";
                        let parlimen = "";
                        let dun = "";
                        negeridetails_pem.forEach((item) => {
                            numnegeri += 1;


                            if(item.negeri_id != Negeri_ID){
                                Negeri_ID = item.negeri_id;

                                negeri=`<p>`+item.negeri.nama_negeri+`</p>`;
                                
                                
                            }
                            else{
                                negeri=`<p></p>`;
                                

                            }
                            daerah=`<li>`+item.daerah.nama_daerah+`</li>`;
                            parlimen=`<li>`+item.parlimen.nama_parlimen+`</li>`;
                            dun=`<li>`+item.dun.nama_dun+`</li>`;
                            
                            $("#negeridiv").append(negeri);
                            $("#daerahdiv").append(daerah);
                            $("#parlimendiv").append(parlimen);
                            $("#dundiv").append(dun);
                            

                        });
                        
                        
                    }

                }

                if (negeridetails) { 

                    if(negeridetails.length > 0) {
                        $('#negeri_mohon_div').empty();
                        $('#daerah_mohon_div').empty();
                        $('#parlimen_mohon_div').empty();
                        $('#dun_mohon_div').empty();
                        numnegeri = 0;
                        let negeri = "";
                        let daerah = "";
                        let parlimen = "";
                        let dun = "";
                        negeridetails.forEach((item) => {
                            numnegeri += 1;


                            if(item.negeri_id != Negeri_ID_pem){
                                Negeri_ID_pem = item.negeri_id;

                                negeri=`<p>`+item.negeri.nama_negeri+`</p>`;
                                
                                
                            }
                            else{
                                negeri=`<p></p>`;
                                

                            }
                            daerah=`<li>`+item.daerah.nama_daerah+`</li>`;
                            parlimen=`<li>`+item.parlimen.nama_parlimen+`</li>`;
                            dun=`<li>`+item.dun.nama_dun+`</li>`;
                            
                            $("#negeri_mohon_div").append(negeri);
                            $("#daerah_mohon_div").append(daerah);
                            $("#parlimen_mohon_div").append(parlimen);
                            $("#dun_mohon_div").append(dun);
                            

                        });
                        
                        
                    }

                }
            }
        })
    }
    function setnegeri(){

    

    
    var negeridropDown =  document.getElementById("select_negeri");
    var negeriData =  document.getElementById("negeriData");

  
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
                // $.each(result.data, function (key, item) {
                //     options = options + '<option value="' + item.id + '">' + item.nama_negeri + '</option>'
                //     var opt = item.id;
                //     var el = document.createElement("option");
                //     el.textContent = item.nama_negeri;
                //     el.value = opt;
                //     negeriData.appendChild(el);
                // })

            }
            else {
                $.Notification.error(result.Message);
            }
        }
    })
    


        const project_id = 1;//document.getElementById("project_id").value;  console.log(project_id);
        $.ajax({
            type: "GET",
            url: api_url+"api/noc/negeri-details/"+project_id,
            dataType: 'json',
            success: function (result) { 
                negeridetails = result.data.negeri;
                //negeriselectiontype = result.data.negeriselection;
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
                                            <select class="form-control negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);">
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
                                            <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" >
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
                                            <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" >
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
                                                <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" >
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
                                            <select class="form-control invisible negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);" >
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
                                            <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah" >
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
                                            <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);" >
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
                                                <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun" >
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
                    <select class="form-control invisible negeri_`+numnegeri+` m-0 col-md-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(`+numnegeri+`);">
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
                    <select class="form-control daerah_`+numnegeri+` col-md-10 col-xs-12" id="select_daerah" name="select_daerah">
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
                    <select class="form-control parlimen_`+numnegeri+` col-md-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(`+numnegeri+`);">
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
                    <select class="form-control dun_`+numnegeri+`" id="select_dun" name="select_dun">
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
                    }

                    //----------------------------------------------------------------------------------------------
                        // let all_negeri_btn = document.querySelectorAll(
                        //     "[id='minus_button']"                    
                        // ); 

                        // let all_negeri_div = document.querySelectorAll(".negerirow");               
                        // all_negeri_btn.forEach((tb, i) => {                    
                        //     tb.addEventListener("click", () => {
                        //         all_negeri_div[i].remove();                        
                        //     });
                        // });
                        
                        var negeri_selection_type = 0; 
                        //var negeriselectioncntrl = document.querySelectorAll("[id='negeriselection']");
                        
                        // if(parseInt(negeriselectiontype[0]['negeri_selection_type']) == 0){
                        //     negeriselectioncntrl[0].checked=true;
                        // }
                        // else{
                        //     negeriselectioncntrl[1].checked=true;
                        //     document.getElementById("addbtndiv").style = "display: block;";
                        // }

                        
                        
                        
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
                                
                        let all_negeri_btn = document.querySelectorAll(
                            "[id='minus_button']"                    
                        ); 

                        let all_negeri_div = document.querySelectorAll(".negerirow");               
                        all_negeri_btn.forEach((tb, i) => {                    
                            tb.addEventListener("click", () => {
                                all_negeri_div[i].remove();                        
                            });
                        });
                    //----------------------------------------------------------------------------------------------
                }
            }
        })
    
}



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


function loadnegeri_parlimen_dun(id)
{
//     const api_url = "{{env('API_URL')}}";  console.log(api_url);
   //const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

    //var negeri_id =  document.querySelector(".negeri_"+id);
    var negeri_id =  document.getElementById("select_negeri");
    var negeriid = negeri_id.value;
        
        //var daerahdropDown =  document.querySelector(".daerah_"+id);
        var daerahdropDown =  document.getElementById("select_daerah");
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

        //var parlimendropDown =  document.querySelector(".parlimen_"+id);
        var parlimendropDown =  document.getElementById("select_parlimen");
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
    //var dundropDown =  document.getElementById("select_dun");
    $(dundropDown).empty();
    var opt = 0;
    var el = document.createElement("option");
    el.textContent = '--Pilih--';
    el.value = opt;
    dundropDown.appendChild(el);

    var parlimencntrl =  document.querySelector(".parlimen_"+rowno);
    //var parlimencntrl =  document.getElementById("select_parlimen");
    var parlimen = parlimencntrl.value;

    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/dun/list?id="+parlimen,
        dataType: 'json',
        success: function (result) {
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



    axios({
            method: "get",
            url: api_url+"api/noc/noc_projectDetails",
            // data: formData,
            headers: {"Authorization": api_token },
        })

    .then(function (response) { 
        // console.log(response.data.data)
        var result=response.data;
        if (result) {
                $.each(result.data, function (key, item) {
                    console.log(item)
					var opt = item.id;
                var el = document.createElement("option");
                            el.textContent = item.kod_projeck + ',' + item.nama_projek;
                            el.value = opt;
                            selectProject.appendChild(el);                
                })
                // pp_id
                $("#selectProject").change(function(){
                    var id=$(this).val()
                    $("#pp_id").val(id)
                })
        }else{
            $.Notification.error(result.Message);
        }
    });
    function whichForm(checkbox){
        console.log(checkbox)
        console.log(checkbox.id)
        if ($("#inlineCheckbox1").is(':checked') ||$("#inlineCheckbox2").is(':checked')||$("#inlineCheckbox3").is(':checked')||$("#inlineCheckbox6").is(':checked')||$("#inlineCheckbox5").is(':checked')||$("#inlineCheckbox6").is(':checked')||$("#inlineCheckbox7").is(':checked')||$("#inlineCheckbox8").is(':checked')||$("#inlineCheckbox9").is(':checked')||$("#inlineCheckbox11").is(':checked')||$("#inlineCheckbox10").is(':checked')) {
            $("#maklumat_pilih_projek_form").removeClass("d-none");

            
        }
        else{
            $("#maklumat_pilih_projek_form").addClass("d-none");

        }
        if(checkbox.id=='inlineCheckbox1'){
            if(checkbox.checked == true){
                $("#peluasan_skop_form").removeClass("d-none"); 
                    $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
            }
            else{
                $("#peluasan_skop_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox2'){
            if(checkbox.checked == true){
                $("#Perubahan_Nama_Projek_Form").removeClass("d-none");  
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");             
            }
            else{
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox3'){
            if(checkbox.checked == true){
                $("#perubahan_kod_projek_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");              
            }
            else{
                $("#perubahan_kod_projek_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox4'){
            if(checkbox.checked == true){
                $("#pertambahan_kos_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");              
            }
            else{
                $("#pertambahan_kos_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox5'){
            if(checkbox.checked == true){
                //get_pementuan_negeri();
                get_noc_pem_negeri();
                $("#maklumat_lokasi_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");              
            }
            else{
                $("#maklumat_lokasi_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox6'){
            if(checkbox.checked == true){
                $("#perubahan_objektif_form").removeClass("d-none");
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");               
            }
            else{
                $("#perubahan_objektif_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox7'){
            if(checkbox.checked == true){
                $("#wujud_butiran_baharu_form").removeClass("d-none");  
                $("#peluasan_skop_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#pertambahan_kos_form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#perubahan_kpi_form").addClass("d-none");
                $("#perubahan_output_form").addClass("d-none");
                $("#wujud_semula_form").addClass("d-none");
                if ($("#inlineCheckbox1").is(':checked')) {
                    $("#inlineCheckbox1").prop('checked', false);
                }  
                if ($("#inlineCheckbox2").is(':checked')) {
                    $("#inlineCheckbox2").prop('checked', false);
                }  
                if ($("#inlineCheckbox3").is(':checked')) {
                    $("#inlineCheckbox3").prop('checked', false);
                }  
                if ($("#inlineCheckbox4").is(':checked')) {
                    $("#inlineCheckbox4").prop('checked', false);
                }  
                if ($("#inlineCheckbox5").is(':checked')) {
                    $("#inlineCheckbox5").prop('checked', false);
                }  
                if ($("#inlineCheckbox6").is(':checked')) {
                    $("#inlineCheckbox6").prop('checked', false);
                }  
                if ($("#inlineCheckbox11").is(':checked')) {
                    $("#inlineCheckbox11").prop('checked', false);
                }  
                if ($("#inlineCheckbox8").is(':checked')) {
                    $("#inlineCheckbox8").prop('checked', false);
                }   
                if ($("#inlineCheckbox9").is(':checked')) {
                    $("#inlineCheckbox9").prop('checked', false);
                }   
                if ($("#inlineCheckbox10").is(':checked')) {
                    $("#inlineCheckbox10").prop('checked', false);
                } 
              
            }
            else{
                $("#wujud_butiran_baharu_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox8'){
            if(checkbox.checked == true){
                $("#perubahan_kpi_form").removeClass("d-none");  
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false); 
                    $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
             
            }
            else{
                $("#perubahan_kpi_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox9'){
            if(checkbox.checked == true){
                $("#perubahan_output_form").removeClass("d-none"); 
                $("#inlineCheckbox10").prop('checked', false);
                    $("#inlineCheckbox7").prop('checked', false);               
            }
            else{
                $("#perubahan_output_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox10'){
            if(checkbox.checked == true){
                $("#wujud_semula_form").removeClass("d-none");  
                $("#peluasan_skop_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#pertambahan_kos_form").addClass("d-none");
                $("#maklumat_lokasi_form").addClass("d-none");
                $("#Perubahan_Nama_Projek_Form").addClass("d-none");
                $("#perubahan_kpi_form").addClass("d-none");
                $("#perubahan_output_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");
                if ($("#inlineCheckbox1").is(':checked')) {
                    $("#inlineCheckbox1").prop('checked', false);
                }  
                if ($("#inlineCheckbox2").is(':checked')) {
                    $("#inlineCheckbox2").prop('checked', false);
                }  
                if ($("#inlineCheckbox3").is(':checked')) {
                    $("#inlineCheckbox3").prop('checked', false);
                }  
                if ($("#inlineCheckbox4").is(':checked')) {
                    $("#inlineCheckbox4").prop('checked', false);
                }  
                if ($("#inlineCheckbox5").is(':checked')) {
                    $("#inlineCheckbox5").prop('checked', false);
                }  
                if ($("#inlineCheckbox6").is(':checked')) {
                    $("#inlineCheckbox6").prop('checked', false);
                }  
                if ($("#inlineCheckbox7").is(':checked')) {
                    $("#inlineCheckbox7").prop('checked', false);
                }  
                if ($("#inlineCheckbox8").is(':checked')) {
                    $("#inlineCheckbox8").prop('checked', false);
                }   
                if ($("#inlineCheckbox9").is(':checked')) {
                    $("#inlineCheckbox9").prop('checked', false);
                }   
                if ($("#inlineCheckbox11").is(':checked')) {
                    $("#inlineCheckbox11").prop('checked', false);
                }   
            }
            else{
                $("#wujud_semula_form").addClass("d-none");
            }
        }
        if(checkbox.id=='inlineCheckbox11'){
            if(checkbox.checked == true){
                $("#outCome_projek_form").removeClass("d-none");   
                $("#inlineCheckbox10").prop('checked', false);
                $("#inlineCheckbox7").prop('checked', false);  
                $("#wujud_semula_form").addClass("d-none");
                $("#wujud_butiran_baharu_form").addClass("d-none");


            }
            else{
                $("#outCome_projek_form").addClass("d-none");
            }
        }
        
        
    }




    // $(".addBtn").click(function(){
    //     $("#exampleModal2").modal('show')
    // })
    function showModal(){
        $("#exampleModal2").modal('show')
        setnegeri();
    }


    // $("#SimpanBtnNOC").click(function(){
    //     alert();
    //     

    // })
 function simpanSkopData(){
    var formData = new FormData();
        formData.append('project_id', document.Peluasan_Skop_Form.pp_id.value);
        formData.append('SkopData', document.Peluasan_Skop_Form.SkopData.value);
        formData.append('KeteranganData', document.Peluasan_Skop_Form.KeteranganData.value);
        formData.append('KomponenData', document.Peluasan_Skop_Form.KomponenData.value);
        formData.append('status_id', document.Peluasan_Skop_Form.status_id.value);

        axios({
                method: "post",
                url: api_url+"api/noc/StoreNoc",
                data: formData,
                headers: { "Authorization": api_token, },
            })
        .then(function (response) { 
            console.log(response.data);
                        
                    //   $("#Tambah_data_modal").modal('hide');
                    //   if(response.data.code === '200') {	 
                    //       $("#vms_modal").modal('show');
                    //   }else {	 
                    //     $("#sucess_modal").modal('show');
                    //   }			
                    //   $("div.spanner").removeClass("show");
                    //   $("div.overlay").removeClass("show");
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        //   $("div.spanner").removeClass("show");
        //   $("div.overlay").removeClass("show");
        //   alert("There was an error submitting data");
        });
 }

 function simpanNamaData(){
    var pp_id=$("#pp_id").val();
    var formData = new FormData();
        formData.append('project_id', pp_id);
        formData.append('nameBaharu', document.Perubahan_Nama_Form.nameBaharu.value);
        axios({
                method: "post",
                url: api_url+"api/noc/StoreNoc",
                data: formData,
                headers: { "Authorization": api_token, },
            })
        .then(function (response) { 
            console.log(response.data);
                        
                    //   $("#Tambah_data_modal").modal('hide');
                    //   if(response.data.code === '200') {	 
                    //       $("#vms_modal").modal('show');
                    //   }else {	 
                    //     $("#sucess_modal").modal('show');
                    //   }			
                    //   $("div.spanner").removeClass("show");
                    //   $("div.overlay").removeClass("show");
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        //   $("div.spanner").removeClass("show");
        //   $("div.overlay").removeClass("show");
        //   alert("There was an error submitting data");
        });
 }

 $("#savenegeri").click(function(){
        savenegeridetails();
    });
        function savenegeridetails(){

        var formDatanegeri = new FormData();
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
            formDatanegeri.append('negeritext[]', item);
        });
        
        var pp_id=$("#pp_id").val();
        formDatanegeri.append('id', pp_id);
        formDatanegeri.append('userid', {{Auth::user()->id}});

        axios({
            method: "post",
            url: api_url+"api/noc/update-negerinoc",
            data: formDatanegeri,
            headers: { "Authorization": api_token},
            
        })
        .then(function (response) { 
            if(response.data.code === '200') {	 
                //$("#add_role_sucess_modal").modal('show');
            // }else {				
            // if(response.data.code === '422') {					
            //     Object.keys(response.data.data).forEach(key => {						
            //     document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
            //     });					
            // }else {					
            //     //$("#sucess_modal").modal('show');
            //     // location.reload()
            // }	
            }	
            // $("div.spanner").removeClass("show");
            // $("div.overlay").removeClass("show");		
        })
        .catch(function (response) {
            //handle error
            console.log(response);
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            alert("There was an error submitting data");
        });
     }   

    
</script>