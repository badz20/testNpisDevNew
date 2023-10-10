<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.4/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
        let projectUser = {{$user_id}}; console.log(projectUser)
        let projectType = localStorage.getItem("project_type");  console.log("project type ->" + projectType)

        // if(userType==1)
        // {
        //     document.getElementById('batal_red').classList.add("d-none");
        // }
        // else
        // {
        //     document.getElementById('batal_red').classList.remove("d-none");
        // }

        if(workflow==1)
        {
            //document.getElementById('betal_data').classList.remove("d-none");
            document.getElementById('kembali_btn').classList.add("d-none");
        }
        else if(workflow==3 || workflow==6 || workflow==10 || workflow==13)
        {
            //document.getElementById('betal_data').classList.add("d-none");
            document.getElementById('kembali_btn').classList.remove("d-none");
        }
        else
        {
            //document.getElementById('betal_data').classList.add("d-none");
            document.getElementById('kembali_btn').classList.add("d-none");
        }


        let is_clickable = {{$is_clickable}}; console.log(is_clickable)
        if(is_clickable==1)
        { 
            //document.getElementById("betal_data").disabled = false;
            document.getElementById("hanter_submit").disabled = false;
        }
        else
        { 
            //document.getElementById("betal_data").disabled = true;
            document.getElementById("hanter_submit").disabled = true;
        }

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

        if(userType==4 && workflow==14)
        {  // bkor user with workflow 4/5
            document.getElementById('user_bkor').classList.remove("d-none");
            document.getElementById('non_bkor').classList.add("d-none");
        }
        else
        {
            document.getElementById('user_bkor').classList.add("d-none");
            document.getElementById('non_bkor').classList.remove("d-none");
        }

        
          if(workflow==1)
          {
              document.getElementById('daerah_penya_view').classList.add("yellow");
              document.getElementById('baha_penya_view').classList.add("yellow");
              document.getElementById('negeri_penya_view').classList.add("yellow");  
              document.getElementById('hanter_submit').innerText = 'Hantar untuk Semakan';          
          }
          else if(workflow==2 || workflow==3 || workflow==5)
          {
              document.getElementById('daerah_penyamak_view').classList.add("yellow");
              document.getElementById('baha_penyamak_view').classList.add("yellow");
              document.getElementById('negeri_penyamak_view').classList.add("yellow");   
              document.getElementById('hanter_submit').innerText = 'Hantar untuk Semakan 1';       
          }
          else if(workflow==4 || workflow==6 || workflow==8)
          {
              document.getElementById('daerah_penya1_view').classList.add("yellow");
              document.getElementById('baha_penya1_view').classList.add("yellow");
              document.getElementById('negeri_penya1_view').classList.add("yellow");  
              document.getElementById('hanter_submit').innerText = 'Hantar untuk Semakan 2';                    
          }
          else if(workflow==7 || workflow==10 || workflow==12)
          {
              document.getElementById('daerah_penya2_view').classList.add("yellow");
              document.getElementById('baha_penya2_view').classList.add("yellow");
              document.getElementById('negeri_penya2_view').classList.add("yellow");    
              document.getElementById('hanter_submit').innerText = 'Hantar untuk Pengesahan';        
        
          }
          else if(workflow==11 || workflow==13 || workflow==15) 
          {
              document.getElementById('daerah_pengesah_view').classList.add("yellow");
              document.getElementById('baha_pengesah_view').classList.add("yellow");
              document.getElementById('negeri_pengesah_view').classList.add("yellow"); 
              document.getElementById('hanter_submit').innerText = 'Hantar untuk Perakuan';       
           
          }
          else if(workflow==14 || workflow==17 || workflow==18) 
          {
              document.getElementById('daerah_bkor_view').classList.add("yellow");
              document.getElementById('baha_bkor_view').classList.add("yellow");
              document.getElementById('negeri_bkor_view').classList.add("yellow");
              document.getElementById('approve_project').innerText = 'Peraku - LULUS';          

          }
          else
          {
              
          }

          if(workflow==6 || workflow==13) //reject button hide/show
          {
            document.getElementById('reject_project_1').classList.remove("d-none");
          }
          else if(workflow==14)
          { 
            document.getElementById('reject_project_2').classList.remove("d-none");
          }
          else
          {
            document.getElementById('reject_project_1').classList.add("d-none");
            document.getElementById('reject_project_2').classList.add("d-none");
          }

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

        $("#Cancel_application_modal").modal('hide')
        $("#Make_sure_application_modal").modal('hide')

            let userType = {{$user}}; 
            var userRole =  {{$role}};

        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

        
        $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
        $.ajax({
                    type: "GET",
                    url: api_url+"api/project/get-perakuan-data?id="+{{$id}},
                    dataType: 'json',
                    success: function (result) {              console.log(result.data)                    

                        loadcompleted();
                        if (result.data) {

                            localStorage.setItem("Is_submitted_by_pengesha",result.data.project.Is_submitted_by_pengesha);   
                            localStorage.setItem("Is_submitted_by_penyemak1",result.data.project.Is_submitted_by_penyemak1);  
                            localStorage.setItem("Is_submitted_by_peraku",result.data.project.Is_submitted_by_peraku);    


                            if(result.data.penyedia)
                            {
                                document.getElementById("penyedia_name").innerText= result.data.penyedia.created_by.name;
                                document.getElementById("penyedia_name2").innerText= result.data.penyedia.created_by.name;    
                                var date_penyedia = formatdate(result.data.penyedia.dibuat_pada);
                                document.getElementById("penyedia_date").innerText= date_penyedia;
                                document.getElementById("penyedia_date2").innerText= date_penyedia;
                            }
                            else
                            {
                                document.getElementById("penyedia_name").innerText= "-";
                                document.getElementById("penyedia_name2").innerText= "-"; 
                                document.getElementById("penyedia_date").innerText= "-";
                                document.getElementById("penyedia_date2").innerText= "-";
                            }
                            if(result.data.penyedia_pejabat)
                            {
                                document.getElementById("penyedia_status").innerText= result.data.penyedia_pejabat; 
                            }
                            else
                            {
                                document.getElementById("penyedia_status").innerText= "-"; 
                            }

                            if(result.data.penyemak)
                            {
                                document.getElementById("penyemak_name").innerText= result.data.penyemak.name;
                                document.getElementById("penyemak_name2").innerText= result.data.penyemak.name;    
                                var now = new Date(result.data.penyemak.penyemak_review_date)
                                var date_peneyemak = formatdate(result.data.penyemak.penyemak_review_date);
                                document.getElementById("penyemak_date").innerText= date_peneyemak;
                                document.getElementById("penyemak_date2").innerText= date_peneyemak;
                                document.getElementById("penyemak_status").innerText= "JPS Negeri Mersing"; 
                                document.getElementById("penyemak_status2").innerText= "JPS Negeri Mersing"; 

                                $("#penyemak_peraku").removeClass('d-none');
                                document.getElementById("date_penyemak_peraku").innerText= date_peneyemak;
                                if(result.data.penyemak){
                                    document.getElementById("ulusan_penyemak_peraku").innerText= result.data.penyemak.penyemak_catatan;    
                                }
                                else
                                {
                                    document.getElementById("ulusan_penyemak_peraku").innerText= '-';    
                                }

                            }
                            else
                            {
                                document.getElementById("penyemak_name").innerText= "-";
                                document.getElementById("penyemak_name2").innerText= "-"; 
                                document.getElementById("penyemak_date").innerText= "-";  
                                document.getElementById("penyemak_date2").innerText= "-";  
                                document.getElementById("penyemak_status").innerText= "-";
                                document.getElementById("penyemak_status2").innerText= "-";   

                                $("#penyemak_peraku").addClass('d-none');
                            }

                            if(result.data.penyemak_pejabat)
                            {
                                document.getElementById("penyemak_status").innerText= result.data.penyemak_pejabat; 
                            }
                            else
                            {
                                document.getElementById("penyemak_status").innerText= "-";  
                            }
                            
                             
                            if(result.data.penyemak1)
                            {
                                document.getElementById("penyemak1_name").innerText= result.data.penyemak1.name;
                                document.getElementById("penyemak1_name2").innerText= result.data.penyemak1.name;    
                                var now = new Date(result.data.penyemak1.penyemak_1_review_date)
                                var date_peneyemak = formatdate(result.data.penyemak1.penyemak_1_review_date);
                                document.getElementById("penyemak1_date").innerText= date_peneyemak;
                                document.getElementById("penyemak1_date2").innerText= date_peneyemak;
                                document.getElementById("penyemak1_status").innerText= "JPS Negeri Mersing";
                                document.getElementById("penyemak1_status2").innerText= "JPS Negeri Mersing";  

                                $("#penyemak1_peraku").removeClass('d-none');
                                document.getElementById("date_penyemak1_peraku").innerText= date_peneyemak;
                                if(result.data.penyemak1){
                                    document.getElementById("ulusan_penyemak1_peraku").innerText= result.data.penyemak1.penyemak_1_catatan;
                                }else{
                                    document.getElementById("ulusan_penyemak1_peraku").innerText= '-';
                                }

                            }
                            else
                            {
                                document.getElementById("penyemak1_name").innerText= "-"; 
                                document.getElementById("penyemak1_date").innerText= "-";  
                                document.getElementById("penyemak1_status").innerText= "-";
                                
                                document.getElementById("penyemak1_name2").innerText= "-"; 
                                document.getElementById("penyemak1_date2").innerText= "-";  
                                document.getElementById("penyemak1_status2").innerText= "-";

                                $("#penyemak1_peraku").addClass('d-none')

                            }

                            if(result.data.penyemak1_pejabat)
                            {
                                document.getElementById("penyemak1_status").innerText= result.data.penyemak1_pejabat; 
                            }
                            else
                            {
                                document.getElementById("penyemak1_status").innerText= "-";  
                            }

                            console.log(result.data.pengesah)
                            if(result.data.penyemak2)
                            {
                                document.getElementById("penyemak2_name").innerText= result.data.penyemak2.name;  
                                document.getElementById("penyemak2_name2").innerText= result.data.penyemak2.name;    
                                var now = new Date(result.data.penyemak2.penyemak_2_review_date)
                                var date_peneyemak2 = formatdate(result.data.penyemak2.penyemak_2_review_date);
                                document.getElementById("penyemak2_date").innerText= date_peneyemak2; 
                                document.getElementById("penyemak2_status").innerText= "JPS Bahagian Mersing"; 
                                document.getElementById("penyemak2_date2").innerText= date_peneyemak2; 
                                document.getElementById("penyemak2_status2").innerText= "JPS Bahagian Mersing"; 

                                $("#penyemak2_peraku").removeClass('d-none');
                                document.getElementById("date_penyemak2_peraku").innerText= date_peneyemak2;
                                if(result.data.penyemak2){
                                    document.getElementById("ulusan_penyemak2_peraku").innerText= result.data.penyemak2.penyemak_2_catatan;
                                }else{
                                    document.getElementById("ulusan_penyemak2_peraku").innerText= '-';
                                }

                            }
                            else
                            {
                                document.getElementById("penyemak2_name").innerText= "-";
                                document.getElementById("penyemak2_date").innerText= "-"; 

                                $("#penyemak2_peraku").addClass('d-none')

                            }

                            if(result.data.penyemak2_pejabat)
                            {
                                document.getElementById("penyemak2_status").innerText= result.data.penyemak2_pejabat; 
                            }
                            else
                            {
                                document.getElementById("penyemak2_status").innerText= "-"; 

                                document.getElementById("penyemak2_name2").innerText= "-";
                                document.getElementById("penyemak2_date2").innerText= "-"; 
                                document.getElementById("penyemak2_status2").innerText= "-"; 
                            }

                            if(result.data.pengesah)
                            {
                                document.getElementById("pengesah_name").innerText= result.data.pengesah.name; 
                                document.getElementById("pengesah_name2").innerText= result.data.pengesah.name;    
                                var now = new Date(result.data.pengesah.pengesah_review_date)
                                var date_pengesah = formatdate(result.data.pengesah.pengesah_review_date);
                                document.getElementById("pengesah_date").innerText= date_pengesah; 
                                document.getElementById("pengesah_status").innerText= "JPS HQ"; 
                                document.getElementById("pengesah_date2").innerText= date_pengesah; 
                                document.getElementById("pengesah_status2").innerText= "JPS HQ"; 

                                $("#pengesah_peraku").removeClass('d-none');
                                document.getElementById("date_pengesah_peraku").innerText= date_pengesah;
                                if(result.data.pengesah)
                                {
                                    document.getElementById("ulusan_pengesah_peraku").innerText= result.data.pengesah.pengesah_catatan;
                                }else{
                                    document.getElementById("ulusan_pengesah_peraku").innerText= '-';
                                }

                            }
                            else
                            {
                                document.getElementById("pengesah_name").innerText= "-";
                                document.getElementById("pengesah_date").innerText= "-"; 
                                document.getElementById("pengesah_status").innerText= "-";
                                
                                document.getElementById("pengesah_name2").innerText= "-";
                                document.getElementById("pengesah_date2").innerText= "-"; 
                                document.getElementById("pengesah_status2").innerText= "-";

                                $("#pengesah_peraku").addClass('d-none')

                            }

                            if(result.data.pengesah_pejabat)
                            {
                                document.getElementById("pengesah_status2").innerText= result.data.pengesah_pejabat; 
                                document.getElementById("pengesah_status").innerText= result.data.pengesah_pejabat;
                            }
                            else
                            {
                                document.getElementById("pengesah_status").innerText= "JPS HQ"; 
                                document.getElementById("pengesah_status2").innerText= "JPS HQ"; 
                            }

                            if(result.data.peraku)
                            {
                                document.getElementById("peraku_name").innerText= result.data.peraku.name; 
                                document.getElementById("peraku_name2").innerText= result.data.peraku.name;    
                                var now = new Date(result.data.peraku.peraku_review_date)
                                var date_peraku = formatdate(result.data.peraku.peraku_review_date);
                                document.getElementById("peraku_date").innerText= date_peraku; 
                                document.getElementById("peraku_status").innerText= "JPS BKOR Mersing";
                                document.getElementById("peraku_date2").innerText= date_peraku; 
                                document.getElementById("peraku_status2").innerText= "JPS BKOR Mersing"; 

                                $("#peraku_peraku").removeClass('d-none');
                                document.getElementById("date_peraku_peraku").innerText= date_peraku;
                                if(result.data.peraku)
                                {
                                    document.getElementById("ulusan_peraku_peraku").innerText= result.data.peraku.peraku_catatan;
                                }else{
                                    document.getElementById("ulusan_peraku_peraku").innerText= '-';
                                }

                            }
                            else
                            {
                                document.getElementById("peraku_name").innerText= "-";
                                document.getElementById("peraku_date").innerText= "-"; 

                                $("#peraku_peraku").addClass('d-none')

                            }

                            if(result.data.peraku_pejabat)
                            {
                                document.getElementById("peraku_status").innerText= result.data.peraku_pejabat; 
                            }
                            else
                            {
                                document.getElementById("peraku_status").innerText= "-"; 

                                document.getElementById("peraku_name2").innerText= "-";
                                document.getElementById("peraku_date2").innerText= "-"; 
                                document.getElementById("peraku_status2").innerText= "-"; 
                            }
                            
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                        }
                        else {
                            $.Notification.error(result.Message);
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                        }
                    },
                    error: function(error) {
                        // handle error
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                    }
                });

            function formatdate(date){
                var date = new Date(date)
                const day = date.getDate(); 
                let day_new = 0;
                let month_new = 0;
                if(String(day).length==1)
                {
                    day_new='0'+day;
                }
                else
                {
                    day_new=day;
                }
                const month = date.getMonth() + 1; console.log(month)
                if(String(month).length==1)
                {
                    month_new='0'+month;
                }
                else
                {
                    month_new=month;
                }
                const year = date.getFullYear(); console.log(year)
                const date_new=day_new+'/'+month_new+'/'+year;

                return date_new;
            }


        $('#hanter_submit').click(function(){ 

            var Is_submitted_by_pengesha = localStorage.getItem("Is_submitted_by_pengesha");   console.log(Is_submitted_by_pengesha)
            var Is_submitted_by_penyemak1 = localStorage.getItem("Is_submitted_by_penyemak1");   console.log(Is_submitted_by_penyemak1)
            var workflow = localStorage.getItem("workflow_status");   console.log(workflow)
            
            //setApprovePopUp();
            // if((workflow==6 && Is_submitted_by_penyemak1==0) || (workflow==13 && Is_submitted_by_pengesha==0))
            // {
            //     $("#Priority_set_model").modal('show');
            //     return false;
            // }
            // else
            // {
                //$("#Priority_set_model").modal('hide')
                $("#Make_sure_application_modal").modal('show')
                $("#Cancel_application_modal").modal('hide')
  
                $('#approved').click( function () { //updation

                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");


                    if(document.getElementById("exampleFormControlTextarea1"))
                    var catatan = document.getElementById("exampleFormControlTextarea1").value;  
                    console.log(catatan)

                    const user_id = {{Auth::user()->id}};
                    const negeri =  {{$negeri}}; console.log(negeri)
                    var bahagian =  {{$bahagian}}; console.log(bahagian)
                    var penyemak =  {{$penyemak}}; console.log(penyemak)
                    var penyemak_1 =  {{$penyemak_1}}; console.log(penyemak_1)
                    var penyemak_2 =  {{$penyemak_2}}; console.log(penyemak_2)
                    var pengesah =  {{$pengesah}}; console.log(pengesah)
                    let bahagian_pemilik = localStorage.getItem("bahagian_pemilik");   console.log(bahagian_pemilik)
                    let new_status = parseInt({{$status}})+parseInt(1);
                    let review_url= {{$id}}+"/"+new_status+"/"+{{$user_id}};
                    let rojukan_code = localStorage.getItem("rojukan_code");   console.log(rojukan_code)


                    var formData = new FormData();
                        formData.append('catatn', catatan);
                        formData.append('user_id', user_id);
                        formData.append('workflow', workflow);
                        formData.append('bahagian_pemilik', bahagian_pemilik);
                        formData.append('review_url', review_url);
                        formData.append('rojukan_code', rojukan_code);

                    
                    const api_url = "{{env('API_URL')}}";  console.log(api_url);
                    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

                    if(workflow==6 || workflow==13 || workflow==14)
                    {
                        formData.append('id', {{$id}});

                        $.ajaxSetup({
                                        headers: {
                                                "Content-Type": "application/json",
                                                "Authorization": api_token,
                                                }
                                    });
                            axios({
                                    method: "post",
                                    url: api_url+"api/project/sususan_status_update",
                                    data: formData,
                                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                            })
                            .then(function (response) { console.log(response.data.code);
                                            
                                            $("#Make_sure_application_modal").modal('hide');

                                            $("div.spanner").removeClass("show");
                                            $("div.overlay").removeClass("show");

                                            Swal.fire({
                                                            icon: 'success',
                                                            text: "Projek anda telah dihantar untuk peringkat seterusnya",
                                                            confirmButtonText: 'Tutup',
                                                        }).then((result) => {
                                                        /* Read more about isConfirmed, isDenied below */
                                                            if (result.isConfirmed) {
                                                                if(workflow==6)
                                                                {
                                                                    window.location.href = origin + '/semak-project-list';
                                                                }
                                                                else
                                                                {
                                                                    window.location.href = origin + '/pengesahan-project-list';	
                                                                }
                                                            }
                                                        })
                            })
                            .catch(function (error) {
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");
                            })
                    }
                    else
                    {
                            axios({
                                    method: "post",
                                    url: api_url+"api/project/aprove_project?id="+{{$id}}+"&usertype="+userType+"&userRole="+userRole+"&negeri="+negeri+        
                                        "&bahagian="+bahagian+"&penyemak="+penyemak+"&penyemak_1="+penyemak_1+"&penyemak_2="+penyemak_2+"&pengesah="+pengesah,                            
                                    data: formData,
                                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                                })
                                .then(function (response) { console.log(response.data.code);
                                                
                                                $("#Make_sure_application_modal").modal('hide');

                                                $("div.spanner").removeClass("show");
                                                $("div.overlay").removeClass("show");

                                                Swal.fire({
                                                                icon: 'success',
                                                                text: "Projek anda telah dihantar untuk peringkat seterusnya",
                                                                confirmButtonText: 'Tutup',
                                                            }).then((result) => {
                                                            /* Read more about isConfirmed, isDenied below */
                                                            if (result.isConfirmed) {
                                                                window.location.href = origin + '/project-application-list';
                                                            }
                                                            })
                                })
                                .catch(function (error) {
                                    $("div.spanner").removeClass("show");
                                    $("div.overlay").removeClass("show");
                                })
                    }
                });
           // }
        });


        $('#close_hanter').click( function () { 
                    location.reload();

                });

        function setApprovePopUp()
        {
            let userType = {{$user}};
            let workflow = localStorage.getItem("workflow_status"); 
            if(workflow==1 || workflow==3)
            {
                document.getElementById("section_name_1").innerText = "NEGERI";
                document.getElementById("section_name_2").innerText = "NEGERI";
                document.getElementById("section_priority").innerText = "NEGERI";
            }
            else if(workflow==6 || workflow==10)
            {
                document.getElementById("section_name_1").innerText = "BAHAGIAN";
                document.getElementById("section_name_2").innerText = "BAHAGIAN";
                document.getElementById("section_priority").innerText = "BAHAGIAN";
            }
            else if(workflow==13)
            {
                document.getElementById("section_name_1").innerText = "BKOR";
                document.getElementById("section_name_2").innerText = "BKOR";
                document.getElementById("section_priority").innerText = "BKOR";
            }
            else
            {
                document.getElementById("section_name_1").innerText = "";
                document.getElementById("section_name_2").innerText = "";  
                document.getElementById("section_priority").innerText = "";                              
            }
        }

        


        $('#betal_data').click(function(){ 
            $("#Make_sure_application_modal").modal('hide')
            $("#Cancel_application_modal").modal('show')

            let userType = {{$user}}; 
            var userRole =  {{$role}};
            const user_id = {{Auth::user()->id}};
            
            $('#cancel_project').click( function () { 

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");

                var catatan = document.getElementById("exampleFormControlTextarea1").value;  //console.log(catatan)

                var formData = new FormData();
                    formData.append('catatn', catatan);
                    formData.append('user_id', user_id);

            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
            axios({
                    method: "post",
                    url: api_url+"api/project/cancel_project?id="+{{$id}}+"&usertype="+userType+"&userRole="+userRole,
                    data: formData,
                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                })
                    .then(function (response) { console.log(response.data.code);
                                
                                $("#Cancel_application_modal").modal('hide');
                                window.location.href = origin + '/project-application-list';	
                    })
                    .catch(function (error) {
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                    })

            });

            $('#close_cancel').click( function () { 
                location.reload();

            });

        });

        $('.reject_project').click(function(){ 
            $("#reject_application_modal").modal('show');

            let userType = {{$user}}; 
            var userRole =  {{$role}};
            const user_id = {{Auth::user()->id}};
            var workflow_for_update = localStorage.getItem("workflow_status");   

            
            $('#project_reject').click( function () { 

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");

                if(document.getElementById("exampleFormControlTextarea1"))
                var catatan = document.getElementById("exampleFormControlTextarea1").value;  //console.log(catatan)

                var formData = new FormData();
                    formData.append('user_id', user_id);
                    formData.append('catatan', catatan);


            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
            axios({
                    method: "post",
                    url: api_url+"api/project/update_project_status?id="+{{$id}}+"&usertype="+userType+"&type=2"+"&workflow="+workflow_for_update,
                    data: formData,
                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                })
                    .then(function (response) { console.log(response.data.code);
                                
                                $("#reject_application_modal").modal('hide');
                                window.location.href = origin + '/project-application-list';	
                    })
                    .catch(function (error) {
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                        })

            });

            $('#close_reject_cancel').click( function () { 
                location.reload();

            });
        });


        $('#approve_project').click(function(){ 
            
            var Is_submitted_by_peraku = localStorage.getItem("Is_submitted_by_peraku");   console.log(Is_submitted_by_peraku)
            var workflow = localStorage.getItem("workflow_status");   console.log(workflow)

            // if(workflow==14 && Is_submitted_by_peraku==0)
            // {
            //     $("#Priority_set_model").modal('show');
            //     return false;
            // }
            
            $("#approve_application_modal").modal('show')
            let userType = {{$user}}; 
            var userRole =  {{$role}};
            const user_id = {{Auth::user()->id}};
            
            $('#project_approve').click( function () { 

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                
               var catatan = document.getElementById("exampleFormControlTextarea1").value;  //console.log(catatan)

                var formData = new FormData();
                    formData.append('user_id', user_id);
                    formData.append('catatan', catatan);


            const api_url = "{{env('API_URL')}}";  console.log(api_url);
            const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
            axios({
                    method: "post",
                    url: api_url+"api/project/update_project_status?id="+{{$id}}+"&usertype="+userType+"&type=1",
                    data: formData,
                    headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                })
                    .then(function (response) { console.log(response.data.code);
                                
                                $("#reject_application_modal").modal('hide');

                                if(workflow==14)
                                {
                                    window.location.href = origin + '/peraku-project-list';	
                                }
                                else
                                {
                                    window.location.href = origin + '/project-application-list';	
                                }
                    })
                    .catch(function (error) {
                            $("div.spanner").removeClass("show");
                            $("div.overlay").removeClass("show");
                        })

            });

            $('#close_approve_cancel').click( function () { 
                location.reload();

            });
        });

        $('#kembali_btn').click(function(){ 
            $("#reject_mode_sucess_modal").modal('show')
            let userType = {{$user}}; 
            var userRole =  {{$role}};
            const user_id = {{Auth::user()->id}};
            var workflow_update = localStorage.getItem("workflow_status");   
            
            $('#send_update').click( function () { 

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
            
               // var catatan = document.getElementById("exampleFormControlTextarea1").value;  //console.log(catatan)

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
                        formData.append('user_id', user_id);
                        formData.append('id',{{$id}});
                        formData.append('comment',comment);
                        formData.append('workflow',workflow_update);

                        const api_url = "{{env('API_URL')}}";  console.log(api_url);
                        const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
                        axios({
                                method: "post",
                                url: api_url+"api/project/send_update_request",
                                data: formData,
                                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                        })
                        .then(function (response) { console.log(response.data.code);
                                    
                                    $("#reject_mode_sucess_modal").modal('hide');
                                    window.location.href = origin + '/project-application-list';	
                        })
                        .catch(function (error) {
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");
                        })

                    }

           });

            $('#cancel_updates').click( function () { 
                location.reload();

            });
        });


    });

//     document.addEventListener("DOMContentLoaded", function() {
//   // Get references to the elements
//   var textarea = document.getElementById("exampleFormControlTextarea1");
//   var errorTextarea = document.getElementById("errorTextarea");
//   var hanterSubmitButton = document.getElementById("hanter_submit");

//   // Function to check the textarea and enable/disable the button
//   function checkTextarea() {
//     var textareaValue = textarea.value;

//     if (textareaValue.trim() === "") {
//       // Textarea is empty, show error and disable the button
//       errorTextarea.textContent = "Sila isikan ulasan / catatan.";
//       errorTextarea.style.display = "block";
//       hanterSubmitButton.disabled = true;
//     } else {
//       // Textarea is not empty, hide the error message and enable the button
//       errorTextarea.style.display = "none";
//       hanterSubmitButton.disabled = false;
//     }
//   }

//   // Initial check when the page loads
//   checkTextarea();

//   // Add input event listener to the textarea for real-time checking
//   textarea.addEventListener("input", checkTextarea);

//   // Add click event listener to the submit button
//   hanterSubmitButton.addEventListener("click", function(event) {
//     var textareaValue = textarea.value;

//     if (textareaValue.trim() === "") {
//       // Textarea is empty, prevent the form submission
//       event.preventDefault();
//       errorTextarea.textContent = "Sila isikan ulasan / catatan.";
//       errorTextarea.style.display = "block";
//       textarea.focus();
//     } else {
//       // Textarea is not empty, allow the modal to appear
//       errorTextarea.style.display = "none"; // Hide the error message
//       // You can add your modal code here
//     }
//   });
// });


</script>