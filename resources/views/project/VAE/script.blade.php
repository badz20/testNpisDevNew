<script>

$("div.spanner").addClass("show");
$("div.overlay").addClass("show");

  function acquisition_cost(acquisition_cost_val){
    var acquisition_cost=$(acquisition_cost_val).val()
    $(".acquisition_cost").text('');
    $(acquisition_cost_val).text('X');
    var first_score=$(".acquisition_row_score").text(acquisition_cost).val(acquisition_cost); 
    // avg(first_score)
  }
  function project_management(project_management_val){
    var project_management=$(project_management_val).val()
    $(".project_management").text('');
    $(project_management_val).text('X');
    var second_score=$(".project_management_row_score").text(project_management).val(project_management); 
    // avg(second_score)


  }
  function schedule(schedule_val){
    var schedule=$(schedule_val).val()
    $(".schedule").text('');
    $(schedule_val).text('X');
    var third_score=$(".schedule_row_score").text(schedule).val(schedule); 
    // avg(third_score)
  }
  function technical_difficulty(technical_difficulty_val){
    var technical_difficulty=$(technical_difficulty_val).val()
    $(".technical_difficulty").text('');
    $(technical_difficulty_val).text('X');
    var fourth_score=$(".technical_difficulty_row_score").text(technical_difficulty).val(technical_difficulty);
    // avg(fourth_score)

  }
  function operation_maintainance(operation_maintainance_val){
    var operation_maintainance=$(operation_maintainance_val).val()
    $(".operation_maintainance").text('');
    $(operation_maintainance_val).text('X');
    var fifth_score=$(".operation_maintainance_row_score").text(operation_maintainance).val(operation_maintainance);
    // avg(fifth_score)

  }
  function industry(industry_val){
    var industry=$(industry_val).val()
    $(".industry").text('');
    $(industry_val).text('X');
    var sixth_score=$(".industry_row_score").text(industry).val(industry);
    // avg(sixth_score);
  }
// ----------------------
  function ProjectViability(via_value){
    console.log(via_value)
    $(".viability").text('');
    var via_value_new='td.viability_'+via_value; console.log(via_value_new)
    $(via_value_new).text('X');
    document.getElementById('viability').value = via_value;
    // avg(sixth_score);
  }

  function ProjectViability_2(via_value){
    console.log(via_value)
    $(".p_viability").text('');
    var via_value_new='td.p_viability_'+via_value; console.log(via_value_new)
    $(via_value_new).text('X');
    document.getElementById('p_viability').value = via_value;
    // avg(sixth_score);
  }

  function KonteckBrif(via_value){
    $(".brif").text('');
    var via_value_new='td.brif_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('brif_kontek').value = via_value;
    // avg(sixth_score);
  }
// ----------------------brif -------
  function OPBrif(via_value){
    $(".OP_brif").text('');
    var via_value_new='td.OP_brif_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('op_brif').value = via_value;
    // avg(sixth_score);
  }
  function SPBrif(via_value){
    $(".SP_brif").text('');
    var via_value_new='td.SP_brif_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('sp_brif').value = via_value;
    // avg(sixth_score);
  }  
  function KPBrif(via_value){
    $(".KP_brif").text('');
    var via_value_new='td.KP_brif_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('kp_brif').value = via_value;
    // avg(sixth_score);
  }  
  function KLPBrif(via_value){
    $(".KLP_brif").text('');
    var via_value_new='td.KLP_brif_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('klp_brif').value = via_value;
    // avg(sixth_score);
  }
  function KeperLuan(via_value){
    $(".Keperluan").text('');
    var via_value_new='td.Keperluan_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('KeperLuan').value = via_value;
    // avg(sixth_score);
  }  
  function KeperLuanB(via_value){
    $(".Keperluan_b").text('');
    var via_value_new='td.Keperluan_b_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('KeperLuan_b').value = via_value;
    // avg(sixth_score);
  }  
  function KeperLuanC(via_value){
    $(".Keperluan_c").text('');
    var via_value_new='td.Keperluan_c_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('KeperLuan_c').value = via_value;
    // avg(sixth_score);
  }
  function Kategori(via_value){
    $(".Kategori").text('');
    var via_value_new='td.Kategori_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('Kategori').value = via_value;
    // avg(sixth_score);
  } 
  //------------------------------
  function Operasi(via_value){
    $(".Operasi").text('');
    var via_value_new='td.Operasi_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('Operasi').value = via_value;
    // avg(sixth_score);
  } 
  // -----------------------------
  function Tanah(via_value){
    $(".Tanah").text('');
    var via_value_new='td.Tanah_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('Tanah').value = via_value;
    // avg(sixth_score);
  }
  function TanahB(via_value){
    $(".Tanah_b").text('');
    var via_value_new='td.Tanah_b_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('TanahB').value = via_value;
    // avg(sixth_score);
  }
  function TanahBebas(via_value){
    $(".TanahBebas").text('');
    var via_value_new='td.TanahBebas_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('TanahBebas').value = via_value;
    // avg(sixth_score);
  }
  function TanahBebasB(via_value){
    $(".TanahBebas_b").text('');
    var via_value_new='td.TanahBebas_b_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('TanahBebasB').value = via_value;
    // avg(sixth_score);
  }
  // ---------------------------------
  function Anggaran(via_value){
    $(".Anggaran").text('');
    var via_value_new='td.Anggaran_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('Anggaran').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranA(via_value){
    $(".Anggaran_a").text('');
    var via_value_new='td.Anggaran_a_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranA').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranB(via_value){
    $(".Anggaran_b").text('');
    var via_value_new='td.Anggaran_b_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranB').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranC(via_value){
    $(".Anggaran_c").text('');
    var via_value_new='td.Anggaran_c_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranC').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranD(via_value){
    $(".Anggaran_d").text('');
    var via_value_new='td.Anggaran_d_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranD').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranE(via_value){
    $(".Anggaran_e").text('');
    var via_value_new='td.Anggaran_e_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranE').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranF(via_value){
    $(".Anggaran_f").text('');
    var via_value_new='td.Anggaran_f_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranF').value = via_value;
    // avg(sixth_score);
  }
  function AnggaranG(via_value){
    $(".Anggaran_g").text('');
    var via_value_new='td.Anggaran_g_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('AnggaranG').value = via_value;
    // avg(sixth_score);
  }
  // ----------------------------
  function Strategy(via_value){
    $(".Strategy").text('');
    var via_value_new='td.Strategy_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('Strategy').value = via_value;
    // avg(sixth_score);
  }
  function StrategyA(via_value){
    $(".Strategy_a").text('');
    var via_value_new='td.Strategy_a_'+via_value; 
    $(via_value_new).text('X');
    document.getElementById('StrategyA').value = via_value;
    // avg(sixth_score);
  }
  // ----------------------------

  $("#GNO_STAT").click(function(){ 

    var startegy  = document.getElementById('Strategy').value ;  //not needed
    var startegyB = document.getElementById('StrategyA').value ; 
    var AnggaranG = document.getElementById('AnggaranG').value;
    var AnggaranF = document.getElementById('AnggaranF').value;
    var AnggaranE = document.getElementById('AnggaranE').value;
    var AnggaranD = document.getElementById('AnggaranD').value;
    var AnggaranC = document.getElementById('AnggaranC').value;
    var AnggaranB = document.getElementById('AnggaranB').value;
    var AnggaranA = document.getElementById('AnggaranA').value;
    var Anggaran  = document.getElementById('Anggaran').value;
    var TanahBebasB = document.getElementById('TanahBebasB').value;
    var TanahBebas = document.getElementById('TanahBebas').value;//not needed
    var TanahB = document.getElementById('TanahB').value; 
    var Tanah = document.getElementById('Tanah').value; //not needed
    var Kategori = document.getElementById('Kategori').value;
    var Operasi = document.getElementById('Operasi').value;
    var KeperLuan_c = document.getElementById('KeperLuan_c').value;
    var KeperLuan_b = document.getElementById('KeperLuan_b').value;
    var KeperLuan = document.getElementById('KeperLuan').value;
    var klp_brif = document.getElementById('klp_brif').value;
    var kp_brif = document.getElementById('kp_brif').value;
    var sp_brif = document.getElementById('sp_brif').value;
    var op_brif = document.getElementById('op_brif').value;
    var brif_kontek = document.getElementById('brif_kontek').value;
    var p_viability = document.getElementById('p_viability').value;
    var viability =document.getElementById('viability').value; //not needed
    if(startegyB=='1' || AnggaranG=='1' || AnggaranF=='1' || AnggaranE=='1' || AnggaranD=='1' || AnggaranC=='1' ||  AnggaranB=='1' || AnggaranA=='1' ||
      Anggaran=='1' || TanahBebasB=='1' || TanahB=='1' || Kategori=='1' || Operasi=='1' || KeperLuan_c=='1' || KeperLuan_b=='1' || KeperLuan=='1' || klp_brif=='1' ||
      kp_brif=='1' || sp_brif=='1' || op_brif=='1' ||  brif_kontek=='1' || p_viability=='1')
      { 

            $("#hijau").addClass('d-none');
            $("#merah").removeClass('d-none');
            document.getElementById('GNO_status').value = 0;

      }
      else
      { 
        
            $("#merah").addClass('d-none');
            $("#hijau").removeClass('d-none');
            document.getElementById('GNO_status').value = 1;


      }


  });

  $(".industry,.operation_maintainance,.technical_difficulty,.schedule,.project_management,.acquisition_cost").click(function(){
    var score1=parseInt($(".acquisition_row_score").val()); 
    var score2=parseInt($(".project_management_row_score").val()); 
    var score3=parseInt($(".schedule_row_score").val()); 
    var score4=parseInt($(".technical_difficulty_row_score").val());
    var score5=parseInt($(".operation_maintainance_row_score").val());
    var score6=parseInt($(".industry_row_score").val());
    // console.log(isNaN(score1))

    $(".average").val('').text('');
    if(!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)){
       var avg=(score1+score2+score3+score4+score5+score6)/6
      // console.log(avg)

      $(".average").val('0').text('0');
      $(".acat_val").val('0').text('0');
      if(!isNaN(avg)){
        // var avg_val=$(".average").val(percentage).text(Math.trunc(percentage));
        var score_sum=score1*5+score2*10+score3*4+score4*7+score5*5+score6*6
        var weightScore=5*10+10*10+4*10+7*10+5*10+6*10
        percentage=Math.round((score_sum*100)/weightScore);
        // console.log(Math.round(percentage));
        var avg_val=$(".average").val(percentage).text(percentage);
        // console.log(avg_val);   
        if(percentage>=95){
          var acat=$(".acat_val").val("ACAT I").text('ACAT I').addClass("text-nowrap").css("font-size","14px"); 
          $('#vms_modal').modal('show'); 
        }  
        else if(percentage<95 && percentage>=75){
          var acat=$(".acat_val").val("ACAT II").text('ACAT II').addClass("text-nowrap").css("font-size","14px");
          $('#vms_modal').modal('show'); 

        } 
        else if(percentage<75 && percentage>=50){
          var acat=$(".acat_val").val("ACAT III").text('ACAT III').addClass("text-nowrap").css("font-size","14px");
        }
        else if(percentage<50 && percentage>=30){
          var acat=$(".acat_val").val("ACAT IV").text('ACAT IV').addClass("text-nowrap").css("font-size","14px");
        }
        else{
          var acat=$(".acat_val").val("ACAT V").text('ACAT V').addClass("text-nowrap").css("font-size","14px");  
        }

      }
    }
  })

       //$update_id=$(".update_id").val()
       $update_id= {{$id}}  
       if($update_id==0){
        $("#vaeSaveBtn").removeAttr("id");
        console.log($update_id);
        $(".UpdateBtn").click(function(){
          // $("div.spanner").addClass("show");
          // $("div.overlay").addClass("show");
          var fetch_id=$(".fetch_id").val()
          var score1=parseInt($(".acquisition_row_score").val()); 
          var score2=parseInt($(".project_management_row_score").val()); 
          var score3=parseInt($(".schedule_row_score").val()); 
          var score4=parseInt($(".technical_difficulty_row_score").val());
          var score5=parseInt($(".operation_maintainance_row_score").val());
          var score6=parseInt($(".industry_row_score").val());
          var Permohonan_Projek_id=$(".Permohonan_Projek_id").val();
          var acat=$(".acat_val").val()
          var avg_val=$(".average").val();
          // console.log(score1)
          

          // console.log(score1);
          if(!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)){

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            var formData = new FormData();
            formData.append("Permohonan_Projek_id",fetch_id);
            formData.append('user_id', {{Auth::user()->id}})
            formData.append("Acquisition_Cost", score1);
            formData.append("Acquisition_Cost_score", score1);
            formData.append("Project_Management", score2);
            formData.append("Project_Management_score", score2);
            formData.append("Schedule", score3);
            formData.append("Schedule_scope", score3);
            formData.append("Technical_Difficulty", score4);
            formData.append("Technical_Difficulty_score", score4);
            formData.append("Operation_Maintainance", score5);
            formData.append("Operation_Maintainance_score", score5);
            formData.append("Industry", score6);
            formData.append("Industry_score", score6);
            formData.append("ACAT_score", avg_val); 
            formData.append("ACAT",acat)
            formData.append('user_id', {{Auth::user()->id}})
            // console.log(formData)

            var api_token = "Bearer "+ window.localStorage.getItem('token');
            axios({
                method: 'POST',
               // url: "{{ env('API_URL') }}"+'api/project/update_vae_data/',
                responseType: 'json',
                data:formData,   
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                },     
                })
                .then(function (result) {
                  // console.log(result.data)
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                  if(result.data.status=='Success'){
                      $("#vms_modal").modal('show')
                      $(".TutupBtn").click(function(){
                        var reload= location.reload();                    
                        
                      })
                  }
                })
                .catch(function (error) {
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
                })
          }
          else{  
            document.getElementById("error_acat").innerHTML = 'Sila masukkan butiran di atas';
            document.getElementById("acat_val").focus();
            
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          }

          
        })

       }
 
  $("#vaeSaveBtn").click(function(){
    
      var score1=parseInt($(".acquisition_row_score").val()); 
      var score2=parseInt($(".project_management_row_score").val()); 
      var score3=parseInt($(".schedule_row_score").val()); 
      var score4=parseInt($(".technical_difficulty_row_score").val());
      var score5=parseInt($(".operation_maintainance_row_score").val());
      var score6=parseInt($(".industry_row_score").val());
      var Permohonan_Projek_id=$(".Permohonan_Projek_id").val();
      var acat=$(".acat_val").val()
      var avg_val=$(".average").val();
      console.log(acat)

      var startegy  = document.getElementById('Strategy').value ;  
      var startegyB = document.getElementById('StrategyA').value ; 
      var AnggaranG = document.getElementById('AnggaranG').value; 
      var AnggaranF = document.getElementById('AnggaranF').value; 
      var AnggaranE = document.getElementById('AnggaranE').value; 
      var AnggaranD = document.getElementById('AnggaranD').value; 
      var AnggaranC = document.getElementById('AnggaranC').value; 
      var AnggaranB = document.getElementById('AnggaranB').value; 
      var AnggaranA = document.getElementById('AnggaranA').value; 
      var Anggaran  = document.getElementById('Anggaran').value; 
      var TanahBebasB = document.getElementById('TanahBebasB').value; 
      var TanahBebas = document.getElementById('TanahBebas').value; 
      var TanahB = document.getElementById('TanahB').value; 
      var Tanah = document.getElementById('Tanah').value; 
      var Kategori = document.getElementById('Kategori').value;
      var Operasi = document.getElementById('Operasi').value; 
      var KeperLuan_c = document.getElementById('KeperLuan_c').value; 
      var KeperLuan_b = document.getElementById('KeperLuan_b').value; 
      var KeperLuan = document.getElementById('KeperLuan').value; 
      var klp_brif = document.getElementById('klp_brif').value; 
      var kp_brif = document.getElementById('kp_brif').value; 
      var sp_brif = document.getElementById('sp_brif').value; 
      var op_brif = document.getElementById('op_brif').value;
      var brif_kontek = document.getElementById('brif_kontek').value; 
      var p_viability = document.getElementById('p_viability').value;
      var viability = document.getElementById('viability').value; 
      var GNO_status = document.getElementById('GNO_status').value; 

      console.log(score1);
      console.log(score2);
      console.log(score3);
      console.log(score4);
      console.log(score5);
      console.log(score6);

      if(isNaN(score1) || isNaN(score2) || isNaN(score3) || isNaN(score4) || isNaN(score5) || isNaN(score6))
      {
            document.getElementById("error_acat").innerHTML = 'Sila masukkan butiran di atas';
            document.getElementById("acat_val").focus();
            return false; 
      }
      else
      {
        document.getElementById("error_acat").innerHTML = '';

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

        var formData = new FormData();
        formData.append("Permohonan_Projek_id",Permohonan_Projek_id);
        formData.append("Acquisition_Cost", score1);
        formData.append('user_id', {{Auth::user()->id}})
        formData.append("Acquisition_Cost_score", score1);
        formData.append("Project_Management", score2);
        formData.append("Project_Management_score", score2);
        formData.append("Schedule", score3);
        formData.append("Schedule_scope", score3);
        formData.append("Technical_Difficulty", score4);
        formData.append("Technical_Difficulty_score", score4);
        formData.append("Operation_Maintainance", score5);
        formData.append("Operation_Maintainance_score", score5);
        formData.append("Industry", score6);
        formData.append("Industry_score", score6);
        formData.append("ACAT_score", avg_val); 
        formData.append("ACAT",acat);
        formData.append("proj_viability_1_1_a",viability);
        formData.append("proj_viability_1_2_a",p_viability);
        formData.append("brif_2_1_a",brif_kontek);
        formData.append("brif_2_2_a",op_brif);
        formData.append("brif_2_2_b",sp_brif);
        formData.append("brif_2_2_c",kp_brif);
        formData.append("brif_2_2_d",klp_brif);
        formData.append("brif_2_3_a",KeperLuan);
        formData.append("brif_2_3_b",KeperLuan_b);
        formData.append("brif_2_3_c",KeperLuan_c);
        formData.append("brif_2_4_a",Kategori);
        formData.append("operasi",Operasi);
        formData.append("tanah_3_1_a",Tanah);
        formData.append("tanah_3_1_b",TanahB);
        formData.append("tanah_3_2_a",TanahBebas);
        formData.append("tanah_3_2_b",TanahBebasB);
        formData.append("anggaran_4_1_a",Anggaran);
        formData.append("anggaran_4_2_a",AnggaranA);
        formData.append("anggaran_4_3_a",AnggaranB);
        formData.append("anggaran_4_4_a",AnggaranC);
        formData.append("anggaran_4_5_a",AnggaranD);
        formData.append("anggaran_4_6_a",AnggaranE);
        formData.append("anggaran_4_7_a",AnggaranF);
        formData.append("anggaran_4_8_a",AnggaranG);
        formData.append("Pelaksanaan_5_2_a",startegyB);
        formData.append("Pelaksanaan_5_1_a",startegy);
        formData.append("GNO_status",GNO_status);
        // console.log(formData)


        var api_token = "Bearer "+ window.localStorage.getItem('token');
        axios({
            method: 'POST',
            url: "{{ env('API_URL') }}"+'api/project/vae_data',
            responseType: 'json',
            data:formData,   
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            },     
            })
            .then(function (result) {
              console.log(result.data.status)
              $("div.spanner").removeClass("show");
              $("div.overlay").removeClass("show");
              if(result.data.status=='Success'){
                  // $("#vms_modal").modal('show')
                  // $(".TutupBtn").click(function(){
                  //   var reload= location.reload();                    
                    
                  // })
                  $("#add_role_sucess_modal").modal('show');

                  // $("#vms_modal").modal('show')
                  $("#tutup_new").click(function(){
                    var reload= location.reload();                    
                  })
              }
            })
            .catch(function (error) {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            })
      }
      
    })

    $(document).ready(function(){
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

      var api_token = "Bearer "+ window.localStorage.getItem('token');
      var id=$(".fetch_id").val();

      axios.defaults.headers.common["Authorization"] = api_token
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/projects/" + {{$id}},
            responseType: 'json',            
        })
        .then(function (response) { 
            data = response.data.data; 
             console.log(data.jenis_kategori);
            date=data.created_at;
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            sepratedDate=date.split('T')[0];
            var temp = new Array();
            tempData=sepratedDate.replace('-', ',').replace('-', ',')
            var createDate=tempData.split(",");
            document.getElementById('Tarikh').value = createDate[2]+' '+monthNames[createDate[1]-1]+' '+createDate[0];
            document.getElementById('nama').value = data.nama_projek;
            document.getElementById('Bahagian').value = data.bahagian_pemilik.nama_bahagian;

            if(data.jenis_kategori)
            {
              if(data.jenis_kategori.name=='Fizikal - Pembinaan')
              {
                enableButtons();
              }
              else
              {
                disableButtons();
              }
              
            }

        });
      
      axios({
        method: 'GET',
        url: "{{ env('API_URL') }}"+'api/project/fetch_vae_data/'+id,
        responseType: 'json',   
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
        },     
        })
        .then(function (result) {
          // console.log(result.data.data=="")
          console.log(result.data.data[0])
          if(result.data.data!=""){
          $(".average").val(result.data.data[0].ACAT_score).text(result.data.data[0].ACAT_score)
          $("#acat_val").val(result.data.data[0].ACAT).text(result.data.data[0].ACAT).addClass("text-nowrap").css("font-size","14px")
          
          // ------------1------------
          if(result.data.data[0].Acquisition_Cost==10){
            $(".acquisition_cost1").val(result.data.data[0].Acquisition_Cost).text('X')
          }
          else if(result.data.data[0].Acquisition_Cost==9){
            $(".acquisition_cost2").val(result.data.data[0].Acquisition_Cost).text('X')
          }
          else if(result.data.data[0].Acquisition_Cost==7){
            $(".acquisition_cost3").val(result.data.data[0].Acquisition_Cost).text('X')
          }
          else if(result.data.data[0].Acquisition_Cost==3){
            $(".acquisition_cost4").val(result.data.data[0].Acquisition_Cost).text('X')
          }
          else{
            $(".acquisition_cost5").val(result.data.data[0].Acquisition_Cost).text('X')
          }
          $(".acquisition_row_score").val(result.data.data[0].Acquisition_Cost_score).text(result.data.data[0].Acquisition_Cost_score)
          // ------------2----------
          if(result.data.data[0].Project_Management==10){
            $(".project_management1").val(result.data.data[0].Project_Management).text('X')
          }
          else if(result.data.data[0].Project_Management==9){
            $(".project_management2").val(result.data.data[0].Project_Management).text('X')
          }
          else if(result.data.data[0].Project_Management==7){
            $(".project_management3").val(result.data.data[0].Project_Management).text('X')
          }
          else if(result.data.data[0].Project_Management==3){
            $(".project_management4").val(result.data.data[0].Project_Management).text('X')
          }
          else{
            $(".project_management5").val(result.data.data[0].Project_Management).text('X')
          }
          $(".project_management_row_score").val(result.data.data[0].Project_Management_score).text(result.data.data[0].Project_Management_score)


          // ------------3-----------------
          if(result.data.data[0].Schedule==10){
            $(".schedule1").val(result.data.data[0].Schedule).text('X')
          }
          else if(result.data.data[0].Schedule==9){
            $(".schedule2").val(result.data.data[0].Schedule).text('X')
          }
          else if(result.data.data[0].Schedule==7){
            $(".schedule3").val(result.data.data[0].Schedule).text('X')
          }
          else if(result.data.data[0].Schedule==3){
            $(".schedule4").val(result.data.data[0].Schedule).text('X')
          }
          else{
            $(".schedule5").val(result.data.data[0].Schedule).text('X')
          }
          
          $(".schedule_row_score").val(result.data.data[0].Schedule_scope).text(result.data.data[0].Schedule_scope)


          // ------------4---------------
          if(result.data.data[0].Technical_Difficulty==10){
            $(".technical_difficulty1").val(result.data.data[0].Technical_Difficulty).text('X')
          }
          else if(result.data.data[0].Technical_Difficulty==9){
            $(".technical_difficulty2").val(result.data.data[0].Technical_Difficulty).text('X')
          }
          else if(result.data.data[0].Technical_Difficulty==7){
            $(".technical_difficulty3").val(result.data.data[0].Technical_Difficulty).text('X')
          }
          else if(result.data.data[0].Technical_Difficulty==3){
            $(".technical_difficulty4").val(result.data.data[0].Technical_Difficulty).text('X')
          }
          else{
            $(".technical_difficulty5").val(result.data.data[0].Technical_Difficulty).text('X')
          }
          
          $(".technical_difficulty_row_score").val(result.data.data[0].Technical_Difficulty_score).text(result.data.data[0].Technical_Difficulty_score)

          // ---------------------5--------------------------
          if(result.data.data[0].Operation_Maintainance==10){
            $(".operation_maintainance1").val(result.data.data[0].Operation_Maintainance).text('X')
          }
          else if(result.data.data[0].Operation_Maintainance==9){
            $(".operation_maintainance2").val(result.data.data[0].Operation_Maintainance).text('X')
          }
          else if(result.data.data[0].Operation_Maintainance==7){
            $(".operation_maintainance3").val(result.data.data[0].Operation_Maintainance).text('X')
          }
          else if(result.data.data[0].Operation_Maintainance==3){
            $(".operation_maintainance4").val(result.data.data[0].Operation_Maintainance).text('X')
          }
          else{
            $(".operation_maintainance5").val(result.data.data[0].Operation_Maintainance).text('X')
          }
          
          $(".operation_maintainance_row_score").val(result.data.data[0].Operation_Maintainance_score).text(result.data.data[0].Operation_Maintainance_score)

          // ---------------------6---------------------
          if(result.data.data[0].Industry==10){
            $(".industry1").val(result.data.data[0].Industry).text('X')
          }
          else if(result.data.data[0].Industry==9){
            $(".industry2").val(result.data.data[0].Industry).text('X')
          }
          else if(result.data.data[0].Industry==7){
            $(".industry3").val(result.data.data[0].Industry).text('X')
          }
          else if(result.data.data[0].Industry==3){
            $(".industry4").val(result.data.data[0].Industry).text('X')
          }
          else{
            $(".industry5").val(result.data.data[0].Industry).text('X')
          }
          
          $(".industry_row_score").val(result.data.data[0].Industry_score).text(result.data.data[0].Industry_score)
          
          
        }
        loadcompleted();
        if(result.data.data[0])
        {
            if(result.data.data[0].proj_viability_1_1_a!=1){
                  $(".viability").text('');
                  var via_value_new='td.viability_'+result.data.data[0].proj_viability_1_1_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('viability').value = 0;
              }
            
            if(result.data.data[0].proj_viability_1_2_a!=1){
                  $(".p_viability").text('');
                  var via_value_new='td.p_viability_'+result.data.data[0].proj_viability_1_2_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('p_viability').value = 0;
              }

            if(result.data.data[0].brif_2_1_a!=1){
                  $(".brif").text('');
                  var via_value_new='td.brif_'+result.data.data[0].brif_2_1_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('brif_kontek').value = 0;
              }

              if(result.data.data[0].brif_2_2_a!=1){
                  $(".OP_brif").text('');
                  var via_value_new='td.OP_brif_'+result.data.data[0].brif_2_2_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('op_brif').value = 0;
              }

              if(result.data.data[0].brif_2_2_b!=1){
                  $(".SP_brif").text('');
                  var via_value_new='td.SP_brif_'+result.data.data[0].brif_2_2_b; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('sp_brif').value = 0;
              }

              if(result.data.data[0].brif_2_2_c!=1){
                  $(".KP_brif").text('');
                  var via_value_new='td.KP_brif_'+result.data.data[0].brif_2_2_c; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('kp_brif').value = 0;
              }

              if(result.data.data[0].brif_2_2_d!=1){
                  $(".KLP_brif").text('');
                  var via_value_new='td.KLP_brif_'+result.data.data[0].brif_2_2_d; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('klp_brif').value = 0;
              }

              if(result.data.data[0].brif_2_3_a!=1){
                  $(".Keperluan").text('');
                  var via_value_new='td.Keperluan_'+result.data.data[0].brif_2_3_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('KeperLuan').value = 0;
              }

              if(result.data.data[0].brif_2_3_b!=1){
                  $(".KeperLuan_b").text('');
                  var via_value_new='td.KeperLuan_b_'+result.data.data[0].brif_2_3_b; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('KeperLuan_b').value = 0;
              }

              if(result.data.data[0].brif_2_3_c!=1){
                  $(".KeperLuan_c").text('');
                  var via_value_new='td.KeperLuan_c_'+result.data.data[0].brif_2_3_c; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('KeperLuan_c').value = 0;
              }

              if(result.data.data[0].brif_2_4_a!=1){
                  $(".Kategori").text('');
                  var via_value_new='td.Kategori_'+result.data.data[0].brif_2_4_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('Kategori').value = 0;
              }

              if(result.data.data[0].operasi!=1){
                  $(".Operasi").text('');
                  var via_value_new='td.Operasi_'+result.data.data[0].operasi; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('Operasi').value = 0;
              }

              if(result.data.data[0].tanah_3_1_a!=1){
                  $(".Tanah").text('');
                  var via_value_new='td.Tanah_'+result.data.data[0].tanah_3_1_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('Tanah').value = 0;
              }

              if(result.data.data[0].tanah_3_1_b!=1){
                  $(".Tanah_b").text('');
                  var via_value_new='td.Tanah_b_'+result.data.data[0].tanah_3_1_b; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('TanahB').value = 0;
              }

              if(result.data.data[0].tanah_3_2_a!=1){
                  $(".TanahBebas").text('');
                  var via_value_new='td.TanahBebas_'+result.data.data[0].tanah_3_2_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('TanahBebas').value = 0;
              }

              if(result.data.data[0].tanah_3_2_b!=1){
                  $(".TanahBebas_b").text('');
                  var via_value_new='td.TanahBebas_b_'+result.data.data[0].tanah_3_2_b; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('TanahBebasB').value = 0;
              }

              if(result.data.data[0].anggaran_4_1_a!=1){
                  $(".Anggaran").text('');
                  var via_value_new='td.Anggaran_'+result.data.data[0].anggaran_4_1_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('Anggaran').value = 0;
              }
              if(result.data.data[0].anggaran_4_2_a!=1){
                  $(".Anggaran_a").text('');
                  var via_value_new='td.Anggaran_a_'+result.data.data[0].anggaran_4_2_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranA').value = 0;
              }
              if(result.data.data[0].anggaran_4_3_a!=1){
                  $(".Anggaran_b").text('');
                  var via_value_new='td.Anggaran_b_'+result.data.data[0].anggaran_4_3_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranB').value = 0;
              }
              if(result.data.data[0].anggaran_4_4_a!=1){
                  $(".Anggaran_c").text('');
                  var via_value_new='td.Anggaran_c_'+result.data.data[0].anggaran_4_4_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranC').value = 0;
              }
              if(result.data.data[0].anggaran_4_5_a!=1){
                  $(".Anggaran_d").text('');
                  var via_value_new='td.Anggaran_d_'+result.data.data[0].anggaran_4_5_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranD').value = 0;
              }
              if(result.data.data[0].anggaran_4_6_a!=1){
                  $(".Anggaran_e").text('');
                  var via_value_new='td.Anggaran_e_'+result.data.data[0].anggaran_4_6_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranE').value = 0;
              }
              if(result.data.data[0].anggaran_4_7_a!=1){
                  $(".Anggaran_f").text('');
                  var via_value_new='td.Anggaran_f_'+result.data.data[0].anggaran_4_7_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranF').value = 0;
              }
              if(result.data.data[0].anggaran_4_8_a!=1){
                  $(".Anggaran_g").text('');
                  var via_value_new='td.Anggaran_g_'+result.data.data[0].anggaran_4_8_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('AnggaranG').value = 0;
              }

              if(result.data.data[0].Pelaksanaan_5_1_a!=1){
                  $(".Strategy").text('');
                  var via_value_new='td.Strategy_'+result.data.data[0].Pelaksanaan_5_1_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('Strategy').value = 0;
              }
              if(result.data.data[0].Pelaksanaan_5_2_a!=1){
                  $(".Strategy_a").text('');
                  var via_value_new='td.Strategy_a_'+result.data.data[0].Pelaksanaan_5_2_a; console.log(via_value_new)
                  $(via_value_new).text('X');
                  document.getElementById('StrategyA').value = 0;
              }
              
              document.getElementById('GNO_status').value = result.data.data[0].GNO_status;

              if(result.data.data[0].GNO_status==0)
              {
                  $("#hijau").addClass('d-none');
                  $("#merah").removeClass('d-none');
              }
              else
              {
                  $("#hijau").removeClass('d-none');
                  $("#merah").addClass('d-none');
              }
                
            }
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

        

    })

$('#hoverTest').hover(function(){
  $('#customTooltip').removeClass('hideme');
}, function(){
  $('#customTooltip').addClass('hideme');
});

$('#hoverTest2').hover(function(){
  $('#customTooltip2').removeClass('hideme2');
}, function(){
  $('#customTooltip2').addClass('hideme2');
});

$('#hoverTest3').hover(function(){
  $('#customTooltip3').removeClass('hideme3');
}, function(){
  $('#customTooltip3').addClass('hideme3');
});

$('#hoverTest4').hover(function(){
  $('#customTooltip4').removeClass('hideme4');
}, function(){
  $('#customTooltip4').addClass('hideme4');
});

$('#hoverTest5').hover(function(){
  $('#customTooltip5').removeClass('hideme5');
}, function(){
  $('#customTooltip5').addClass('hideme5');
});

$('#hoverTest6').hover(function(){
  $('#customTooltip6').removeClass('hideme6');
}, function(){
  $('#customTooltip6').addClass('hideme6');
});

$('#hoverTest7').hover(function(){
  $('#customTooltip7').removeClass('hideme7');
}, function(){
  $('#customTooltip7').addClass('hideme7');
});

$('#hoverTest8').hover(function(){
  $('#customTooltip8').removeClass('hideme8');
}, function(){
  $('#customTooltip8').addClass('hideme8');
});
$('#hoverTest9').hover(function(){
  $('#customTooltip9').removeClass('hideme9');
}, function(){
  $('#customTooltip9').addClass('hideme9');
});


function enableButtons() {
  var buttons = document.querySelectorAll('button');
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].disabled = false;
  }
}

function disableButtons() {
  var buttons = document.querySelectorAll('button');
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].disabled = true;
  }
}


</script>