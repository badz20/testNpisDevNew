<script>
  
    var dokumen_btn = document.querySelectorAll(".dokumen_btn");
    dokumen_btn.forEach((item) => {
      item.addEventListener("click", () => {
        $("#dokumen_modal").modal("show");
      });
    });
    // window.onload = ()=>{
    //     $('#dokumen_modal').modal('show')
    // }


    $(document).ready(function() {
      // Muat naik dokumen sokongan
      $('#upload_doc_sokongan').click( function () {
        var project_id = {{ $id }}; console.log(project_id);

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
          url: api_url+"api/project/get-dokumen-lain-data?id="+{{$id}},
          dataType: 'json',
          success: function(result) {
            var data = result.data; console.log(data);
            if(data !== null && data.length > 0) {
              var table = document.getElementById("table_body");
              var rowCount = table.rows.length;

              var documentNames = [
                  'lain_lain_dokumen_nama1',
                  'lain_lain_dokumen_nama2',
                  'lain_lain_dokumen_nama3',
                  'lain_lain_dokumen_nama4',
                  'lain_lain_dokumen_nama5'
              ];

              var documentKeterangan = [
                  'lain_katerangan_documen1',
                  'lain_katerangan_documen2',
                  'lain_katerangan_documen3',
                  'lain_katerangan_documen4',
                  'lain_katerangan_documen5'
              ];

              for (var i=0; i < data.length; i++) {
                  var dataRow = result.data[i];
                
                  var row = table.insertRow(rowCount + i);
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  var cell4 = row.insertCell(3);
                  cell1.style.textAlign = "center";

                  var docNama = documentNames[i % documentNames.length];
                  var docKeterangan = documentKeterangan[i % documentKeterangan.length];
                  var imageDiv = '<div class="nageri_table_img"><a id="download_file'+[i]+'" class="text-primary" style="cursor: pointer"><p>' + dataRow[docNama] + '</p></a></div>';
                  var descripDiv = '<div class="nageri_table_text"><p>' + dataRow[docKeterangan] + '</p></div>';
                  var removDiv = '<td><img onClick="removeFile(' + dataRow['id'] + ', ' + (rowCount + i) + ', ' + {{ Auth::user()->id }} + ')" src="{{ asset('assets/images/Delete.png') }}" alt="" /></td>';

                  cell1.innerHTML = rowCount + i + 1;
                  cell2.innerHTML = imageDiv;
                  cell3.innerHTML = descripDiv;
                  cell4.innerHTML = removDiv;

                  (function (index) {
                      // Create a new function scope to capture the current value of 'i' (index)
                      document.getElementById("download_file" + index).value = dataRow['id'];

                      $("#download_file" + index).click(function () {
                          var id = $("#download_file" + index).val();
                          console.log(id + 'abel');
                          downloadDoc(id, dataRow[docNama]);
                      });
                  })(i);
              }
            }

            $("#dokumen_modal").modal('show')

          },
          error: function(error) {
            // handle error
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          }
        });
      });

      function myFunction() {
        var x = document.getElementById("gmbar_pop").classList[2]; console.log(x);
        if (x === "d-none") { console.log("found");
          document.getElementById('gmbar_pop').classList.remove("d-none");
        } else {  console.log(" not found");
          document.getElementById('gmbar_pop').classList.add("d-none");
        }
      }

      

      $('#simpan_doc_sokongan_btn').click( function () { 
        var fail_dokumen = document.getElementById("Logo_upload"); console.log(fail_dokumen)
        var image =$('#Logo_upload').prop('files')[0]; console.log(image)
        var gambar = document.getElementById("Logo_upload").value;  console.log(gambar)
        var keterangan = document.getElementById("katerangan").value;  console.log(keterangan)
        var table = document.getElementById("table_body"); 

        document.getElementById('file_size').classList.add("d-none");
        document.getElementById('file_type').classList.add("d-none");

        var rowCount = table.rows.length;   console.log(rowCount);
        if(keterangan=='')
        {
          document.getElementById("error_katerangan").innerHTML="Sila isi keterangan."; 
          document.getElementById("katerangan").focus();
          return false; 
        }
        else
        {
          document.getElementById("error_katerangan").innerHTML="";
        }
        if (fail_dokumen.files.length < 0) {
          document.getElementById("gambar_image_error").innerHTML="Sila muat naik dokumen."; 
          document.getElementById("gambar_image_error").focus();
          return false; 
        }
        else if(rowCount>=5)
        {
                document.getElementById("gambar_image_error").innerHTML="Anda dibenarkan memuat naik maksimum 5 dokumen sahaja."; 
                document.getElementById("gambar_image_error").focus();
                return false; 
        }
        else
        {
            document.getElementById("gambar_image_error").innerHTML=""; 
    
            // var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
            // fSize = image.size; i=0;while(fSize>900){fSize/=1024;i++;}
            // image_size = (Math.round(fSize*100)/100)+' '+fSExt[i];
            const file = fail_dokumen.files[0]; // Get the selected file

            var formData = new FormData();
            formData.append('id', document.myform.project_id.value);
            formData.append('rowCount', rowCount);
            formData.append('document', image);
            formData.append('fail_dokumen', file); // Add the file to the FormData object
            formData.append('keterangan', keterangan);
            formData.append('user_id', {{Auth::user()->id}})


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
                url: api_url+"api/project/add-lain-document",
                data: formData,
                headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
            })
            .then(function (response) { 
                console.log(response.data);	
                document.getElementById('file_size').classList.add("d-none");
                document.getElementById('file_type').classList.add("d-none");
                document.getElementById("upload_logo").style.display = 'block';
                document.getElementById("image_preview_1").style.display = 'none';
                document.getElementById("katerangan").value="";
                document.getElementById("Logo_upload").value='';

                var row = table.insertRow(rowCount);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.style.textAlign = "center";


                var imageDiv = '<div class="nageri_table_img"><a id="download_file" class="text-primary" style="cursor: pointer"><p>'+image.name+'</p></a></div>';
                var descripDiv = '<div class="nageri_table_text"><p>'+keterangan+'</p></div>';
                var removDiv = '<td><img onClick="removeFile('+response.data.data.id+','+rowCount+', '+{{Auth::user()->id}}+')" src="{{ asset('assets/images/Delete.png') }}" alt="" /></td>';
                cell1.innerHTML = rowCount+1;
                cell2.innerHTML = imageDiv;
                cell3.innerHTML = descripDiv;
                cell4.innerHTML = removDiv;

                $("#download_file").click(function(){
                  console.log(response.data.data.id + image.name + 'Abel');
                  var id=$("#download_file").val();
                  downloadDoc(response.data.data.id,image.name)
                });
            })
            .catch(function (response) {
              //handle error
              console.log(response);
            });

        }
      });

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
      

      document.getElementById("image_preview_1").style.display = 'none';

      const api_url = "{{env('API_URL')}}";  console.log(api_url);
      const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

      $.ajaxSetup({
          headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
              }
        });
      const project_id = document.getElementById("project_id").value;  console.log(project_id);
      $.ajax({
          type: "GET",
          url: api_url+"api/project/dokumen-lampiran/"+project_id,
          dataType: 'json',
          success: function (result) { 
            console.log(result.data.logical_image.original_url);
            console.log(result.data.other)
            // console.log(result.data.logical.lfm_dokumen_nama);
            // console.log(typeof(result.data.logical))
            // var length = Object.keys(result.data.logical).length;
            // console.log(length);
            loadcompleted();
            if(result.data.logical!='')
            {
              //  document.getElementById("muat_log").style.display = 'none';
              //  document.getElementById("logic_lain").style.display = 'block';

                $("#logical_tarikh").removeClass('show')
                $("#logical_nama").removeClass('show')
                $("#without_logical").addClass('d-none')

                const extension = getFileExtensionFromURL(result.data.logical_image.original_url); console.log(extension);
                if (extension === 'xls' || extension === 'xlsx' || extension === 'xlsm' || extension === 'xlsb' || extension === 'csv') 
                {
                  document.getElementById("logical_nama").innerHTML='<div class="d-flex">'
                          +'<a id="download_link1" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;">'+result.data.logical.lfm_dokumen_nama+'</h6></a>'
                          +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-transparent" id="logic_padam" @if($is_submitted) disabled @endif>'
                          +'<div class="dokumn" >'
                          +'<img class="" src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                          +'</div>'
                          +'</button></div>';
                } else if (extension === 'pdf') { 
                  document.getElementById("logical_nama").innerHTML='<div class="d-flex"><div style="width: 70%;"><div><img class="d-flex ml-3 mb-1" id="logical_nama_previewImage" src="{{ asset('assets/pdf.jpg.png') }}" style="width:20%" id="mini_img" alt=""></div>'
                    +'<div><a id="download_link1" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;">'+result.data.logical.lfm_dokumen_nama+'</h6></a></div></div>'
                          +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-transparent" id="logic_padam" @if($is_submitted) disabled @endif>'
                          +'<div class="dokumn" >'
                          +'<img class="" src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                          +'</div>'
                          +'</button></div>';
                }else if (extension === 'jpg' || extension === 'png' || extension === 'jpeg') { 
                  document.getElementById("logical_nama").innerHTML='<div class="d-flex"><div style="width: 70%;"><div><img class="d-flex ml-3 mb-1" id="logical_nama_previewImage" src="{{ asset('assets/images/imgIcon.jpg') }}" style="width:20%" id="mini_img" alt=""></div>'
                    +'<div><a id="download_link1" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;">'+result.data.logical.lfm_dokumen_nama+'</h6></a></div></div>'
                          +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-transparent" id="logic_padam" @if($is_submitted) disabled @endif>'
                          +'<div class="dokumn" >'
                          +'<img class="" src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                          +'</div>'
                          +'</button></div>';
                }


                // <a id="download_link" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;"></h6></a>


                document.getElementById("logical_tarikh").innerHTML=formatdate(result.data.logical.dibuat_pada); 
               
                // document.getElementById("logical_nama_previewImage").innerHTML=result.data.logical[0].lfm_dokumen_nama;
                $("#download_format").addClass('d-none')
                $("#download_link").removeClass('d-none')
                document.getElementById("file_link").innerHTML=result.data.logical.lfm_dokumen_nama;
                document.getElementById("download_link").value=result.data.logical.id;

                $("#download_link").click(function(){
                  var id=$("#download_link").val();
                        downloadDoc(id,result.data.logical.lfm_dokumen_nama)
                });

                $("#download_link1").click(function(){
                  var id=$("#download_link").val();
                        downloadDoc(id,result.data.logical.lfm_dokumen_nama)
                });

                $("#logic_padam").click(function(){
                  var id=$("#download_link").val();
                  removeImage(id)
                });

            }
            else
            {
                // document.getElementById("muat_log").style.display = 'block';
                // document.getElementById("logic_lain").style.display = 'none';

                $("#logical_tarikh").removeClass('show')
                $("#logical_nama").removeClass('show')
                $("#without_logical").removeClass('d-none')

                document.getElementById("logical_tarikh").innerHTML=""; 
                document.getElementById("logical_nama").innerHTML="";
                document.getElementById("file_link").innerHTML="";
                document.getElementById("download_link").value="";
            }

            // if(result.data.borang.length>0)
            // {
            //       var now = new Date(result.data.borang[0].dibuat_pada)
            //       var date = now.toLocaleDateString();   console.log(date)
            //       document.getElementById("logical_tarikh_borag").innerHTML=date; 
            //       document.getElementById("logical_nama_borag").innerHTML=result.data.borang[0].perakuan_pengesahan_dokumen_nama;
            // }
            var length2 = Object.keys(result.data.other).length;
            // console.log(result.data.other.length);
            if(result.data.other!='')
            {
                  $("#logical_tarikh_borag").removeClass('show')
                  $("#logical_nama_borag").removeClass('show')
                  $("#without_borang").addClass('d-none') 

                  const extension = getFileExtensionFromURL(result.data.other_image.original_url); console.log(extension);
                  if (extension === 'xls' || extension === 'xlsx' || extension === 'xlsm' || extension === 'xlsb' || extension === 'csv') 
                  {
                    document.getElementById("logical_nama_borag").innerHTML='<div class="d-flex">'
                          +'<a id="download_lain_link2" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;">'+result.data.other.lain_lain_dokumen_nama1+'</h6></a>'
                          +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-transparent" id="lain_padam" @if($is_submitted) disabled @endif>'
                          +'<div class="dokumn" >'
                          +'<img src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                          +'</div>'
                          +'</button></div>';
                  } else if (extension === 'pdf'){
                    document.getElementById("logical_nama_borag").innerHTML='<div class="d-flex"><div style="width: 70%;"><div><img class="ml-3 mb-1" id="logical_nama_previewImage" src="{{ asset('assets/pdf.jpg.png') }}" style="width:20%" id="mini_img" alt=""></div>'
                    +'<div><a id="download_lain_link2" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;"></h6></a></div></div>'
                      +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-transparent" id="lain_padam" @if($is_submitted) disabled @endif>'
                          +'<div class="dokumn" >'
                          +'<img src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                          +'</div>'
                          +'</button></div>';
                  } else if (extension === 'jpg' || extension === 'png' || extension === 'jpeg') {
                    document.getElementById("logical_nama_borag").innerHTML='<div class="d-flex"><div style="width: 70%;"><div><img class="ml-3 mb-1" id="logical_nama_previewImage" src="{{ asset('assets/images/imgIcon.jpg') }}" style="width:20%" id="mini_img" alt=""></div>'
                    +'<div><a id="download_lain_link2" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;"></h6></a></div></div>'
                      
                          +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-transparent" id="lain_padam" @if($is_submitted) disabled @endif>'
                          +'<div class="dokumn" >'
                          +'<img src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                          +'</div>'
                          +'</button></div>';
                  }


                  document.getElementById("logical_tarikh_borag").innerHTML=formatdate(result.data.other.dibuat_pada); 
                  // document.getElementById("logical_nama_borag").innerHTML='<div class="d-flex"><img class="h-25 w-25" id="logical_nama_previewImage" src="'+result.data.other_image.original_url+'">'
                  //         +'<button type="button" class="dokumen_btn dokumen_padam btn btn-light h-25 bg-light" id="lain_padam" @if($is_submitted) disabled @endif>'
                  //         +'<div class="dokumn" >'
                  //         +'<img src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>'
                  //         +'</div>'
                  //         +'</button></div>';
                  // document.getElementById("muat_lain").style.display = 'none';
                  // document.getElementById("padam_lain").style.display = 'block';

                  document.getElementById("file_lain_link").innerHTML=result.data.other.lain_lain_dokumen_nama1;
                  document.getElementById("download_lain_link").value=result.data.other.id;

                  $("#download_lain_link").click(function(){
                  var id=$("#download_lain_link").val();
                       downloadDoc(id,result.data.other.lain_lain_dokumen_nama1)
                  });

                  $("#download_lain_link2").click(function(){
                  var id=$("#download_lain_link").val();
                       downloadDoc(id,result.data.other.lain_lain_dokumen_nama1)
                  });

                  $("#lain_padam").click(function(){
                  var id=$("#download_lain_link").val();
                    removeImage(id)
                  });

            }
            else
            {
                  $("#logical_tarikh_borag").removeClass('show')
                  $("#logical_nama_borag").removeClass('show')
                  $("#without_borang").addClass('d-none') 

                  document.getElementById("logical_tarikh_borag").innerHTML=""; 
                  document.getElementById("logical_nama_borag").innerHTML="";
                  // document.getElementById("muat_lain").style.display = 'block';
                  // document.getElementById("padam_lain").style.display = 'none';
                  document.getElementById("file_lain_link").innerHTML="";
                  document.getElementById("download_lain_link").value="";

            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
          },
          error: function(error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        }
      });

      function getFileExtensionFromURL(url) {
        const lastDotIndex = url.lastIndexOf('.');
        if (lastDotIndex === -1) {
          return null; // No file extension found
        }

        const extension = url.slice(lastDotIndex + 1).toLowerCase();
        return extension;
      }

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

      function downloadDoc(id,filename){
        
                      const api_url = "{{env('API_URL')}}";  
                      console.log(api_url);
                      const api_token = "Bearer "+ document.getElementById("token").value;  
                      console.log(api_token);
                      update_user_api = api_url+"api/project/dokumen_download";
                      data_update = {'id':id};
                      var jsonString = JSON.stringify(data_update);
                      console.log(filename)
                      // axios({
                      //   url: update_user_api + '?id=' + id,
                      //   method: 'GET',
                      //   headers: { "Authorization": api_token, },
                      //   responseType: 'blob', // important
                      // }).then((response) => {
                      //   console.log(response.data.type);
                      //   const url = window.URL.createObjectURL(response.data);
                      //   const link = document.createElement('a');
                      //   link.href = url;
                      //   // const contentDisposition = response.headers['content-disposition'];
                      //   // console.log(response);
                      //   // let fileName = 'unknown';
                      //   // if (contentDisposition) {
                      //   //     const fileNameMatch = contentDisposition.match(/filename="(.+)"/);
                      //   //     if (fileNameMatch.length === 2)
                      //   //         fileName = fileNameMatch[1];
                      //   // }
                      //   // link.setAttribute('download', fileName);
                      //   link.setAttribute('download', filename);
                      //   document.body.appendChild(link);
                      //   link.click();
                      //   URL.revokeObjectURL(url);
                      // });

                      // $.ajaxSetup({
                      //   headers: {
                      //               "Content-Type": "application/json",
                      //               "Authorization": api_token,
                      //               }
                      //   });
                      $.ajax({
                            type: 'GET',
                            url: update_user_api,
                            data: {'id':id} , 
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
                              if(str){
                                const parts = str.split('/');
                                const doc_type = parts[1];  console.log(doc_type)  
                                if(doc_type=='vnd.ms-excel') 
                                {
                                  var doc_name = 'document.xls';  console.log(doc_name)    
                                }
                                else
                                {
                                  var doc_name = 'document.'+doc_type;  console.log(doc_name)    
                                }
                              }
                              else
                              {
                                var doc_name = "document.pdf";    
                              }

                              //Convert the Byte Data to BLOB object.
                              var blob = new Blob([data]);
                                  var url = window.URL || window.webkitURL;
                                  link = url.createObjectURL(blob);
                                  var a = $("<a />");
                                  a.attr("download", doc_name);
                                  a.attr("href", link);
                                  $("body").append(a);
                                  a[0].click();
                                  $("body").remove(a);
                                  URL.revokeObjectURL(url);
                            }
                        });      
      }

      function removeImage(id) {
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
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
            url: api_url+"api/project/delete-lampiran-image",
            data: {'id':id , 'user_id':{{$user_id}} , 'project_id':project_id},
            headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
        })
        .then(function (response) { console.log(response.data);
          $("div.spanner").removeClass("show");
          $("div.overlay").removeClass("show");
          var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
              url = url.replace(":id", {{$id}})
              url = url.replace(":status", {{$status}})
              url = url.replace(":user_id", {{$user_id}})
              window.location.href = url
            //window.location.href = origin + '/project/section/'+project_id+'/dokumen';   
        })
        .catch(function (response) {
          //handle error
          console.log(response);
          $("div.spanner").removeClass("show");
          $("div.overlay").removeClass("show");
        });
      }


      $("#logical_image").on('change', function(){ 
    
        //console.log($('#pengumuman_image').prop('files'))
        $new_file = $('#logical_image').prop('files')[0];  console.log($new_file);
        if($new_file.size>4000000)
        { 
            document.getElementById("logical_image").value='';
            // alert("Salz fail tidak melebihi 2 mb"); 
            document.getElementById("dokumen_error").innerText='Saiz fail tidak melebihi 4 mb';

            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG","application/vnd.ms-excel","application/pdf"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("logical_image").value=''; 
            // alert("Jenis fail tidak sah");
            document.getElementById("dokumen_error").innerText='Jenis fail tidak sah';
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_img_1').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file);
            }

              $("div.spanner").addClass("show");
              $("div.overlay").addClass("show");

               var formData = new FormData();
                formData.append('id', document.myform.project_id.value);
                formData.append('user_id', {{Auth::user()->id}});
                formData.append('activity', 'logical');
                formData.append('document', $new_file);
                
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
                        url: api_url+"api/project/dokumen-lampiran-upload",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    })
                .then(function (response) { console.log(response.data);	
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                  var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url                   
                })
                .catch(function (response) {
                  //handle error
                  console.log(response);
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                });
    });

    $("#logical_image_1").on('change', function(){ 
    
        //console.log($('#pengumuman_image').prop('files'))
        $new_file = $('#logical_image_1').prop('files')[0];  console.log($new_file);
        if($new_file.size>4000000)
        { 
            document.getElementById("logical_image_1").value='';
            document.getElementById("dokumen_error").innerText='Saiz fail tidak melebihi 4 mb';
            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG","application/vnd.ms-excel","application/pdf"];
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("logical_image_1").value=''; 
            document.getElementById("dokumen_error").innerText='Jenis fail tidak sah';
            return false;
        }

              $("div.spanner").addClass("show");
              $("div.overlay").addClass("show");

              var formData = new FormData();
                formData.append('id', document.myform.project_id.value);
                formData.append('user_id', {{Auth::user()->id}});
                formData.append('activity', 'logical');
                formData.append('document', $new_file);
                
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
                        url: api_url+"api/project/dokumen-lampiran-upload",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    })
                .then(function (response) { console.log(response.data);	
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                  var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url                   
                })
                .catch(function (response) {
                  //handle error
                  console.log(response);
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                });
    });

    
    $("#borang_image").on('change', function(){ 
  
        //console.log($('#pengumuman_image').prop('files'))
        $new_file = $('#borang_image').prop('files')[0];  console.log($new_file);
        if($new_file.size>4000000)
        { 
            document.getElementById("borang_image").value='';
            // alert("Salz fail tidak melebihi 2 mb"); 
            document.getElementById("dokumen_error").innerText='Saiz fail tidak melebihi 4 mb';

            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG","application/vnd.ms-excel","application/pdf"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("borang_image").value=''; 
            // alert("Jenis fail tidak sah");
            document.getElementById("dokumen_error").innerText='Jenis fail tidak sah';
            return false;
        }
        if ($new_file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_img_1').attr('src', e.target.result);
                };
                reader.readAsDataURL($new_file);
            }

            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

               var formData = new FormData();
                formData.append('id', document.myform.project_id.value);
                formData.append('user_id', {{Auth::user()->id}});
                formData.append('activity', 'borag');
                formData.append('document', $new_file);
                
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
                        url: api_url+"api/project/dokumen-lampiran-upload",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    })
                .then(function (response) { console.log(response.data);	
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                  var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
                   
                })
                .catch(function (response) {
                  //handle error
                  console.log(response);
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                });


    });

    $("#borang_image_1").on('change', function()
    { 
        $new_file = $('#borang_image_1').prop('files')[0];  console.log($new_file);
        if($new_file.size>4000000)
        { 
            document.getElementById("borang_image_1").value='';
            document.getElementById("dokumen_error").innerText='Saiz fail tidak melebihi 4 mb';
            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG","application/vnd.ms-excel","application/pdf"];
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("borang_image_1").value=''; 
            document.getElementById("dokumen_error").innerText='Jenis fail tidak sah';
            return false;
        }
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");

            var formData = new FormData();
                formData.append('id', document.myform.project_id.value);
                formData.append('user_id', {{Auth::user()->id}});
                formData.append('activity', 'borag');
                formData.append('document', $new_file);
                
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
                        url: api_url+"api/project/dokumen-lampiran-upload",
                        data: formData,
                        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
                    })
                .then(function (response) { console.log(response.data);	
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                  var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url 
                })
                .catch(function (response) {
                  //handle error
                  console.log(response);
                  $("div.spanner").removeClass("show");
                  $("div.overlay").removeClass("show");
                });
      });

    $("#Logo_upload").on('change', function(){ 
        //console.log($('#pengumuman_image').prop('files'))
        $new_file = $('#Logo_upload').prop('files')[0];  console.log($new_file);
        if($new_file.size>2000000)
        { 
            document.getElementById("Logo_upload").value='';
            document.getElementById('file_type').classList.add("d-none");
            document.getElementById('file_size').classList.remove("d-none");
            document.getElementById("gambar_image_error").innerHTML=""; 

            return false;
        }
        var allowedExtensions=["image/jpeg", "image/png", "image/jpg","image/JPG"];
        
        if(allowedExtensions.indexOf($new_file.type) == -1)  
        {
            document.getElementById("Logo_upload").value=''; 
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
          document.getElementById("Logo_upload").value=''; 
          document.getElementById("upload_logo").style.display = 'block';
          document.getElementById("image_preview_1").style.display = 'none';
    });

    
      
      $("#simpan").click(function() {
        if ($("#file_lain_link").text() === "-" && $("#file_link").text() === "-") {
    
          document.getElementById("file_error").style.color = 'red'
          document.getElementById("file_error").innerHTML = 'Sila muat naik dokumen untuk simpan.'
          document.getElementById("file_error").focus();
        } else {
          
          $("#add_role_sucess_modal").modal('show');
        }
      });


    $('#tutup_new').click(function(){ console.log(origin)
        const project_id = document.getElementById("project_id").value;  console.log(project_id);
        var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
        //window.location.href = origin + '/project/section/'+project_id+'/dokumen';
      });

      $('#close_img').click(function(){ console.log(origin)
        const project_id = document.getElementById("project_id").value;  console.log(project_id);
        var url = "{{ route('daftar.section',[ ':id',':status',':user_id' , 'dokumen']) }}"
                        url = url.replace(":id", {{$id}})
                        url = url.replace(":status", {{$status}})
                        url = url.replace(":user_id", {{$user_id}})
                        window.location.href = url
        //window.location.href = origin + '/project/section/'+project_id+'/dokumen';
      });


    });

    $("#download_format").click(function(){
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
          url: api_url+"api/project/download-dokumen-format",
          // responseType: 'blob',
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
            const parts = str.split('/');
            // console.log(parts)
            const doc_type ='xls';  console.log(doc_type)   
            const doc_name = 'document.'+doc_type;  console.log(doc_name)                       
            
            //Convert the Byte Data to BLOB object.
            var blob = new Blob([data]);
                var url = window.URL || window.webkitURL;
                link = url.createObjectURL(blob);
                var a = $("<a />");
                a.attr("download", doc_name);
                a.attr("href", link);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);
                URL.revokeObjectURL(url);
          }
      })
          
    })   

    function myFunction() {
      var x = document.getElementById("gmbar_pop").classList[2]; console.log(x);
      if (x === "d-none") { console.log("found");
        document.getElementById('gmbar_pop').classList.remove("d-none");
      }
    }
    function mouseout(){
        document.getElementById('gmbar_pop').classList.add("d-none");
    }
  </script>