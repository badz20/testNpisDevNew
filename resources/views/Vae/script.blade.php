<script>

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
        console.log(avg)
  
        $(".average").val('0').text('0');
        $(".acat_val").val('0').text('0');
        if(!isNaN(avg)){
          var avg_val=$(".average").val(Math.trunc(avg)).text(Math.trunc(avg));
          console.log(avg_val);
          var score_sum=score1+score2+score3+score4+score5+score6
          percentage=score_sum/60*100;
          // console.log(percentage);   
          if(percentage>=95){
            var acat=$(".acat_val").val("ACAT I").text('ACAT I').addClass("text-nowrap").css("font-size","14px");
          }  
          else if(percentage<95 && percentage>=75){
            var acat=$(".acat_val").val("ACAT II").text('ACAT II').addClass("text-nowrap").css("font-size","14px");
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
  
         $update_id=$(".update_id").val()
         if($update_id==0){
            $("#vaeSaveBtn").removeAttr("id");
            console.log($update_id);
            $(".UpdateBtn").click(function(){
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
  
              var formData = new FormData();
              formData.append("Permohonan_Projek_id",fetch_id);
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
                  url: "{{ env('API_URL') }}"+'api/project/update_vae_data/',
                  responseType: 'json',
                  data:formData,   
                  headers: {
                      "Content-Type": "application/json",
                      "Authorization": api_token,
                  },     
                  })
                  .then(function (result) {
                    // console.log(result.data)
                    if(result.data.status=='Success'){
                        $("#vms_modal").modal('show')
                        $(".TutupBtn").click(function(){
                          var reload= location.reload();                    
                          
                        })
                    }
                  })
                }
                else{
                alert('All Data is blank')
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
        
  
        // console.log(score1);
        if(!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)||!isNaN(score1)){
  
          var formData = new FormData();
          formData.append("Permohonan_Projek_id",Permohonan_Projek_id);
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
                if(result.data.status=='Success'){
                    $("#vms_modal").modal('show')
                    $(".TutupBtn").click(function(){
                      var reload= location.reload();                    
                      
                    })
                }
              })
        }
        else{
          alert('All Data is blank')
        }
      })
  
      $(document).ready(function(){
        var api_token = "Bearer "+ window.localStorage.getItem('token');
        var id=$(".fetch_id").val();
        
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
            console.log(result.data)
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
              $(".acquisition_cost5").val(result.data.data[0].Acquisition_Cost).text(result.data.data[0].Acquisition_Cost)
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
          });
  
  
      })
  
  </script>