<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> 
<script>
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
      
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => { console.log('ddsssss');
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => { 
            var file_type = inputElement.files[0].type; console.log(file_type);
            var file_size = inputElement.files[0].size;  console.log(file_size);

            var allowedExtensions=["image/jpeg", "image/png"];
            
            if(allowedExtensions.indexOf(file_type) == -1)  
            {
                //document.getElementById("error_image_name").style.display = 'block';
                document.getElementById("error_image_name").textContent="Jenis fail tidak sah";
                return false;
            }

            if(file_size>4000000)  
            {
                //document.getElementById("error_image_name").style.display = 'block';
                document.getElementById("error_image_name").textContent="saiz fail tidak membiri 4 mb";
                return false;
            }
            document.getElementById("error_image_name").textContent = '';


            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {  console.log(file['name']);

		const currentYear = new Date().getFullYear();
		const currentMonth = new Date().getMonth() + 1;
		const currentDay = new Date().getDate();
		const currentHour = new Date().getHours();
		const currentMinute = new Date().getMinutes();
		const currentSecond = new Date().getSeconds();

      document.getElementById("image_name").value= file['name'];

	  var newFileName = currentYear+"_"+currentMonth+"_"+currentDay+"_"+currentHour+"_"+currentMinute+"_"+currentSecond+"_"+file['name']; console.log(newFileName);
	  var formData = new FormData();
      formData.append("file", file, newFileName);  console.log(formData);

	let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

	// First time - remove the prompt
	if (dropZoneElement.querySelector(".drop-zone__prompt")) {
		dropZoneElement.querySelector(".drop-zone__prompt").remove();
	}

	// First time - there is no thumbnail element, so lets create it
	if (!thumbnailElement) {
		thumbnailElement = document.createElement("div");
		thumbnailElement.classList.add("drop-zone__thumb");
		dropZoneElement.appendChild(thumbnailElement);
	}

	thumbnailElement.dataset.label = file.name;

	// Show thumbnail for image files
	if (file.type.startsWith("image/")) {
		const reader = new FileReader();

		reader.readAsDataURL(file);
		reader.onload = () => {
			thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
		};
	} else {
		thumbnailElement.style.backgroundImage = null;
	}
}


//image upload - done

// document upload started

document.querySelectorAll(".drop-zone__input_dokumen").forEach((inputElement) => {
	const dropZoneElementDokumen = inputElement.closest(".drop-zone_dokumen");

	dropZoneElementDokumen.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => { 
		var file_type = inputElement.files[0].type; console.log(file_type);
		var file_size = inputElement.files[0].size;  console.log(file_size);

		var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
		
		if(allowedExtensions.indexOf(file_type) == -1)  
        {
			// document.getElementById("error_dokumen_name").style.display = 'block';
			document.getElementById("error_dokumen_name").textContent="Jenis fail tidak sah";
			return false;
		}

		if(file_size>4000000)  
        {
			// document.getElementById("error_dokumen_name").style.display = 'block';
			document.getElementById("error_dokumen_name").textContent="saiz fail tidak membiri 4 mb";
			return false;
		}
		document.getElementById("error_dokumen_name").style.display = '';


		if (inputElement.files.length) {
			updateThumbnaildokumen(dropZoneElementDokumen, inputElement.files[0]);
		}
	});

	dropZoneElementDokumen.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElementDokumen.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElementDokumen.addEventListener(type, (e) => {
			dropZoneElementDokumen.classList.remove("drop-zone--over");
		});
	});

	dropZoneElementDokumen.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElementDokumen, e.dataTransfer.files[0]);
		}

		dropZoneElementDokumen.classList.remove("drop-zone--over");
	});
});


function updateThumbnaildokumen(dropZoneElementDokumen, file) {  console.log(file['name']);

		const currentYear = new Date().getFullYear();
		const currentMonth = new Date().getMonth() + 1;
		const currentDay = new Date().getDate();
		const currentHour = new Date().getHours();
		const currentMinute = new Date().getMinutes();
		const currentSecond = new Date().getSeconds();
      document.getElementById("dokumen_name").value= file['name'];



	  var newFileName = currentYear+"_"+currentMonth+"_"+currentDay+"_"+currentHour+"_"+currentMinute+"_"+currentSecond+"_"+file['name']; console.log(newFileName);
	  var formData = new FormData();
      formData.append("file", file, newFileName);  console.log(formData);

	let thumbnailElementDokumen = dropZoneElementDokumen.querySelector(".drop-zone__thumb_dokumen");

	// First time - remove the prompt
	if(thumbnailElementDokumen){
		if (thumbnailElementDokumen.querySelector(".drop-zone__prompt_dokumen")) {
			thumbnailElementDokumen.querySelector(".drop-zone__prompt_dokumen").remove();
		}
	}
	console.log('avv');

	document.getElementById("doku_image_new").style.display = 'block';
	document.getElementById("dokumen_span").style.display = 'none';
	document.getElementById("doku_label").innerHTML = file.name;
   


	// // First time - there is no thumbnail element, so lets create it
	// if (!thumbnailElementDokumen) { 
	// 	thumbnailElementDokumen = document.createElement("div");
	// 	thumbnailElementDokumen.classList.add("drop-zone__thumb_dokumen");
	// 	dropZoneElementDokumen.appendChild(thumbnailElementDokumen);
	// }

	// thumbnailElementDokumen.dataset.label = file.name;

	// Show thumbnail for image files
	// if (file.type.startsWith("image/")) {
	// 	const reader = new FileReader();

	// 	reader.readAsDataURL(file);
	// 	reader.onload = () => {
	// 		thumbnailElementDokumen.style.backgroundImage = `url('${reader.result}')`;
	// 	};
	// } else {
	// 	thumbnailElementDokumen.style.backgroundImage = null;
	// }
}


//document upload - done
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


	const api_url = "{{env('API_URL')}}";  console.log(api_url);
	const app_url = document.getElementById("app_url").value;  console.log(app_url);

   document.getElementById("jps_negeri").classList.remove('d-none');
   document.getElementById("jabatan_agensy_drop").classList.add('d-none');
   document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
   document.getElementById("jabatan_jps_drop").style.display = "block";

   document.getElementById('bahagian').disabled = true;
   document.getElementById('pejabat').disabled = true;
   document.getElementById('negeri').disabled = true;
   document.getElementById('daerah').disabled = true;
   document.getElementById('Jabatan').disabled = true;

   var kem_url= api_url+"api/lookup/kementerian-list-by-name";
            loadKementerian(kem_url,"jps");
            document.getElementById("kementerian").disabled = true;

  
    const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
	const {
		host, hostname, href, origin, pathname, port, protocol, search
	  } = window.location
	$('#show-me').hide();   
	$('input[type="radio"]').click(function() { 
      document.getElementById("bahagian").selectedIndex = 0;
      document.getElementById("pejabat").selectedIndex = 0;
      document.getElementById("negeri").selectedIndex = 0;
      document.getElementById("daerah").selectedIndex = 0;
      document.getElementById("Jabatan").selectedIndex = 0;
      document.getElementById("jabatan_bahagian").selectedIndex = 0;
      


		if($(this).attr('id') == 'agensi_luar') { //agency
			 $('#show-me').show();        

                    var kem_url=api_url+"api/lookup/kementerian/list_kementerian";
                    loadKementerian(kem_url,"non-jps");
                    document.getElementById("kementerian").disabled = false;
          
                    document.getElementById("jps_negeri").classList.add('d-none');
                    document.getElementById("pejabat_agensy_drop").classList.add('d-none');
                    document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
                   
                    document.getElementById("jabatan_jps_drop").style.display = "none";
		}
 
		else if($(this).attr('id') == 'pengguna_jps') { //jps user
			 $('#show-me').hide();   

                    var kem_url= api_url+"api/lookup/kementerian-list-by-name";
                    loadKementerian(kem_url,"jps");
                    document.getElementById("kementerian").disabled = true;

                    document.getElementById("jps_negeri").classList.remove('d-none');
                    document.getElementById("jabatan_agensy_drop").classList.add('d-none');
                    document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
                    document.getElementById("jabatan_jps_drop").style.display = "block";
		}
      else if($(this).attr('id') == 'jabatan_agensy_drop_check') {
                     document.getElementById('bahagian').disabled = true;
                     document.getElementById('pejabat').disabled = true;
                     document.getElementById('negeri').disabled = true;
                     document.getElementById('daerah').disabled = true;
                     document.getElementById('Jabatan').disabled = false;

                     document.getElementById("jabatan_agensy_drop_check").checked = true;
                     document.getElementById("bahagian_drop_check").checked = false;
                     document.getElementById("negeri_drop_check").checked = false;
                     document.getElementById("daerah_drop_check").checked = false;
                     document.getElementById("pejabat_drop_check").checked = false;

      }
      else if($(this).attr('id') == 'bahagian_drop_check') {
                     document.getElementById('bahagian').disabled = false;
                     document.getElementById('pejabat').disabled = true;
                     document.getElementById('negeri').disabled = true;
                     document.getElementById('daerah').disabled = true;
                     document.getElementById('Jabatan').disabled = true;
                     
                     document.getElementById("jabatan_agensy_drop_check").checked = false;
                     document.getElementById("bahagian_drop_check").checked = true;
                     document.getElementById("negeri_drop_check").checked = false;
                     document.getElementById("daerah_drop_check").checked = false;
                     document.getElementById("pejabat_drop_check").checked = false;

      }
      else if($(this).attr('id') == 'negeri_drop_check') {
                     document.getElementById('bahagian').disabled = true;
                     document.getElementById('pejabat').disabled = true;
                     document.getElementById('negeri').disabled = false;
                     document.getElementById('daerah').disabled = true;
                     document.getElementById('Jabatan').disabled = true;

                     document.getElementById("jabatan_agensy_drop_check").checked = false;
                     document.getElementById("bahagian_drop_check").checked = false;
                     document.getElementById("negeri_drop_check").checked = true;
                     // document.getElementById("daerah_drop_check").checked = true;
                     document.getElementById("pejabat_drop_check").checked = false;
      }
      else if($(this).attr('id') == 'daerah_drop_check') {
                     document.getElementById('bahagian').disabled = true;
                     document.getElementById('pejabat').disabled = true;
                     document.getElementById('negeri').disabled = false;
                     document.getElementById('daerah').disabled = false;
                     document.getElementById('Jabatan').disabled = true;

                     document.getElementById("jabatan_agensy_drop_check").checked = false;
                     document.getElementById("bahagian_drop_check").checked = false;
                     document.getElementById("negeri_drop_check").checked = true;
                     document.getElementById("daerah_drop_check").checked = true;
                     document.getElementById("pejabat_drop_check").checked = false;
      }
      else
      {
                     document.getElementById('bahagian').disabled = true;
                     document.getElementById('pejabat').disabled = false;
                     document.getElementById('negeri').disabled = true;
                     document.getElementById('daerah').disabled = true;
                     document.getElementById('Jabatan').disabled = true;

                     document.getElementById("jabatan_agensy_drop_check").checked = false;
                     document.getElementById("bahagian_drop_check").checked = false;
                     document.getElementById("negeri_drop_check").checked = false;
                     document.getElementById("daerah_drop_check").checked = false;
                     document.getElementById("pejabat_drop_check").checked = true;
         
      }


	});
   


   document.addEventListener("keydown", function(event) {
   if (event.key === "Enter") {
      event.preventDefault();
   }
   });

   // const checkbox = document.getElementById('agensy_drop_check'); 

   //          checkbox.addEventListener('click', () => {
   //             checkbox.checked = !checkbox.checked;
   //             });


	$.ajaxSetup({
		headers: {
			   "Content-Type": "application/json",
			   "Authorization": api_token,
			   }
   });

    var pejabatdropDown = document.getElementById("pejabat");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/pejabat-projek/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.pajabat_projek;
					el.value = opt;
					pejabatdropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });


   function loadKementerian(kem_url,type){ 
	var dropDown = document.getElementById("kementerian");
   var bahagiandropDown =  document.getElementById("bahagian");


   $("#kementerian").empty();
   $("#bahagian").empty();
         
   if(type=="non-jps")
   {
      var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            dropDown.appendChild(el);
            
      var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            bahagiandropDown.appendChild(el);
   }
   else
   {
      var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            bahagiandropDown.appendChild(el);
   }
    $.ajax({
        type: "GET",
        url: kem_url,
        dataType: 'json',
        success: function (result) { console.log(result.data)
            if (result) {
               if(type=="non-jps")
               {
                  $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_kementerian;
                        el.value = opt;
                        dropDown.appendChild(el);
                  });
               }
               else
               {
                   if(result.data.kementerian)
                   {
                        $.each(result.data.kementerian, function (key, item) {
                           var opt = item.id;
                           var el = document.createElement("option");
                           el.textContent = item.nama_kementerian;
                           el.value = opt;
                           dropDown.appendChild(el);
                     });
                     document.getElementById("kementerian_jps_id").value=result.data.kementerian[0].id;                                          
                   }
                   if(result.data.jabatan)
                   {
                     document.getElementById("jabatan_jps").value=result.data.jabatan[0].nama_jabatan;                     
                     document.getElementById("jabatan_jps_id").value=result.data.jabatan[0].id;                     
                   }
                   if(result.data.bahagian)
                   {
                     $.each(result.data.bahagian, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_bahagian;
                        el.value = opt;
                        bahagiandropDown.appendChild(el);    
                     });

                   }
               }
            }
            else
            {
                $.Notification.error(result.Message);
            }
        }
    });

   }
    
    $("#kementerian").on('change', function(){ 

         kementerian = document.getElementById("kementerian").value;
         var JabatandropDown =  document.getElementById("Jabatan");
         $("#Jabatan").empty();
         var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            JabatandropDown.appendChild(el);

         $.ajax({
            type: "GET",
            url: api_url+"api/lookup/jabatan/list?id="+kementerian,
            dataType: 'json',
            success: function (result) { console.log(result)
               if (result) {
                     $.each(result.data, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_jabatan;
                        el.value = opt;
                        JabatandropDown.appendChild(el);
                     })
               }
               else {
                     $.Notification.error(result.Message);
               }
            }
         });

         var bahagiandropDown =  document.getElementById("bahagian");
         $("#bahagian").empty();
         var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            bahagiandropDown.appendChild(el);

         $.ajax({
            type: "GET",
            url: api_url+"api/lookup/bahagian-list?id="+kementerian,
            dataType: 'json',
            success: function (result) { console.log(result)
                  if (result) {
                     $.each(result.data, function (key, item) {
                     var opt = item.id;
                     var el = document.createElement("option");
                     el.textContent = item.nama_bahagian;
                     el.value = opt;
                     bahagiandropDown.appendChild(el);
                     })
                  }
                  else {
                     $.Notification.error(result.Message);
                  }
            }
         });
   });

   $("#Jabatan").on('change', function(){ 

      Jabatan = document.getElementById("Jabatan").value;
      var jabatan_bahagiandropDown =  document.getElementById("jabatan_bahagian");
      $("#jabatan_bahagian").empty();
      var el = document.createElement("option"); console.log(el)
         el.textContent = '--Pilih--';
         el.value = '';
         jabatan_bahagiandropDown.appendChild(el);

      $.ajax({
         type: "GET",
         url: api_url+"api/lookup/bahagian/list?id="+Jabatan,
         dataType: 'json',
         success: function (result) { console.log(result)
            if (result) {
                  $.each(result.data, function (key, item) {
                     var opt = item.id;
                     var el = document.createElement("option");
                     el.textContent = item.nama_bahagian;
                     el.value = opt;
                     jabatan_bahagiandropDown.appendChild(el);
                  })
            }
            else {
                  $.Notification.error(result.Message);
            }
         }
      });
});
	
	var negeridropDown =  document.getElementById("negeri");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/negeri/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_negeri;
					el.value = opt;
					negeridropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    $("#negeri").on('change', function(){ 

               negeri = document.getElementById("negeri").value;
               var daerahdropDown =  document.getElementById("daerah");
               $("#daerah").empty();
               var el = document.createElement("option"); console.log(el)
                  el.textContent = '--Pilih--';
                  el.value = '';
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
                     }
                     else {
                           $.Notification.error(result.Message);
                     }
                  }
               });
      });

    var jawatandropDown =  document.getElementById("jawatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jawatan;
					el.value = opt;
					jawatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

     var greddropDown =  document.getElementById("gred");
            $.ajax({
               type: "GET",
               url: api_url+"api/lookup/gredjawatan/list",
               dataType: 'json',
               success: function (result) { console.log(result)
                  if (result) {
                        $.each(result.data, function (key, item) {
                           var opt = item.id;
                           var el = document.createElement("option");
                           el.textContent = item.nama_gred;
                           el.value = opt;
                           greddropDown.appendChild(el);
                           $("div.spanner").removeClass("show");
                           $("div.overlay").removeClass("show");
                        })
                        loadcompleted();
                  }
                  else {
                        $.Notification.error(result.Message);
                  }
               }
               
            });
            
            


    $("#submit").click(function(){


		if(!document.myform.nama.value)  { 
			document.getElementById("error_nama").innerHTML="Nama Diperlukan"; 
			document.getElementById("name").focus();
			return false; 
		}
		else{
			document.getElementById("error_nama").innerHTML=""; }
		if(!document.myform.no_kod_penganalan.value)  { 
			document.getElementById("error_no_kod_penganalan").innerHTML="No Kad Pengenalan Diperlukan"; 
			document.getElementById("no_kod_penganalan").focus();
			return false; 
		}else if(isNaN(document.myform.no_kod_penganalan.value))
      {
         document.getElementById("error_no_kod_penganalan").innerHTML="Sila Tambah Nombor Sahaja"; 
			document.getElementById("no_kod_penganalan").focus();
			return false;
      } else if(document.myform.no_kod_penganalan.value.length<12) 
      {
         document.getElementById("error_no_kod_penganalan").innerHTML="Maksimum 12 Digit Diperlukan"; 
			document.getElementById("no_kod_penganalan").focus();
			return false;
      } else { document.getElementById("error_no_kod_penganalan").innerHTML=""; }

		if(!document.myform.emel_rasmi.value)  { 
			document.getElementById("error_email").innerHTML="Emel Rasmi Diperlukan"; 
			document.getElementById("emel_rasmi").focus();
			return false; 
		}else{ document.getElementById("error_email").innerHTML="";}

      if(IsEmail(document.myform.email.value)==false){
      document.getElementById("error_email").innerHTML="Format E-mel Tidak Sah"; 
			document.getElementById("emel_rasmi").focus();
			return false;
      }
      else{
         document.getElementById("error_email").innerHTML="";
      }
      
      let email = document.myform.email.value;
      let getDomain =email.substr(email.length - 6);  console.log(getDomain)

      if(getDomain!='gov.my')
      {
         document.getElementById("error_email").innerHTML="Format E-mel Tidak Sah"; 
            document.getElementById("emel_rasmi").focus();
            return false;
      }
      else
      {
         document.getElementById("error_email").innerHTML="";
      }


		// if(!document.myform.no_telefon.value)  { 
		// 	document.getElementById("error_no_telefon").innerHTML="medan no telefon diperlukan"; 
		// 	document.getElementById("no_telefon").focus();
		// 	return false; 
		// }else{document.getElementById("error_no_telefon").innerHTML="";}

        if(!document.myform.jawatan.value)  { 
			document.getElementById("error_jawatan").innerHTML="Sila Pilih Jawatan"; 
			document.getElementById("jawatan").focus();
			return false; 
		}else{document.getElementById("error_jawatan").innerHTML="";}

        if(!document.myform.gred.value)  { 
			document.getElementById("error_gred").innerHTML="Sila Pilih Gred"; 
			document.getElementById("gred").focus();
			return false;                       
		}else{document.getElementById("error_gred").innerHTML="";}

      if(document.myform.kategori.value==1){

         if(!document.myform.bahagian.value &&  !document.myform.pejabat.value &&  !document.myform.negeri.value)
         {
            document.getElementById("error_bahagian").innerHTML="Sila Pilih Bahagian/Pejabat/Negeri"; 
            document.getElementById("bahagian").focus();
            return false; 
         }
         var kementerian = document.getElementById("kementerian_jps_id").value;
         var jabatan = document.getElementById("jabatan_jps_id").value;

      }
      else
      {
         if(!document.myform.kementerian.value)
         {
            document.getElementById("error_kementerian").innerHTML="Sila Pilih Kementerian"; 
            document.getElementById("kementerian").focus();
            return false; 
         }
         document.getElementById("error_kementerian").innerHTML=" "; 

         if(!document.myform.jabatan.value && !document.myform.bahagian.value)
         {
            document.getElementById("error_jabatan").innerHTML="Sila Pilih Jabatan/Bahagian"; 
            document.getElementById("Jabatan").focus();
            return false; 
         }
         else
         {
            document.getElementById("error_jabatan").innerHTML=" "; 
         }
         var kementerian = document.myform.kementerian.value;
         var jabatan = document.myform.jabatan.value;
      }


      var bahagian = '';
      if(document.myform.bahagian.value)  { 
           bahagian = document.myform.bahagian.value;
      }
      else if(document.myform.jabatan_bahagian.value)  {
         bahagian = document.myform.jabatan_bahagian.value;
      }   
      


   //   if(document.myform.kategori.value==2)
   //   {
   //      if(!document.myform.jabatan.value)  { 
   //          document.getElementById("error_jabatan").innerHTML="Sila Pilih Jabatan"; 
   //          document.getElementById("jabatan").focus();
   //          return false; 
   //       }else{document.getElementById("error_jabatan").innerHTML="";}
   //    }

      // if(!document.myform.bahagian.value)  { 
		// 	document.getElementById("error_bahagian").innerHTML="Sila Pilih Bahagian"; 
		// 	document.getElementById("bahagian").focus();
		// 	return false; 
		// }else{document.getElementById("error_bahagian").innerHTML="";}

      // if(!document.myform.negeri.value)  { 
		// 	document.getElementById("error_negeri").innerHTML="Sila Pilih Negeri"; 
		// 	document.getElementById("negeri").focus();
		// 	return false; 
		// }else{document.getElementById("error_negeri").innerHTML="";}

      // if(!document.myform.daerah.value)  { 
		// 	document.getElementById("error_daerah").innerHTML="Sila Pilih Daerah"; 
		// 	document.getElementById("daerah").focus();
		// 	return false; 
		// }else{document.getElementById("error_daerah").innerHTML="";}

      // if(!document.myform.catatan.value)  { 
		// 	document.getElementById("error_catatan").innerHTML="medan catatan diperlukan"; 
		// 	document.getElementById("catatan").focus();
		// 	return false; 
		// }else{document.getElementById("error_catatan").innerHTML="";}

      // if(!document.myform.image_name.value)  { 
      //   // document.getElementById("error_image_name").style.display = 'block';
		// 	document.getElementById("error_image_name").innerHTML="sila muat naik gambar profil"; 
		// 	document.getElementById("error_image_name").focus();
		// 	return false; 
		// }
		// else{
      //    //document.getElementById("error_image_name").style.display = 'none';
		// 	document.getElementById("error_image_name").innerHTML=""; }
      
      if(!document.myform.dokumen_name.value && document.myform.kategori.value==2)  { 
        // document.getElementById("error_image_name").style.display = 'block';
			document.getElementById("error_dokumen_name").innerHTML="Sila Muat Naik Dokumen"; 
			document.getElementById("error_dokumen_name").focus();
			return false; 
		}
		else{
         //document.getElementById("error_image_name").style.display = 'none';
			document.getElementById("error_dokumen_name").innerHTML=""; }

		const api_url = "{{env('API_URL')}}";  console.log(api_url);
    	const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
		$.ajaxSetup({
			headers: {
				   "Content-Type": "application/json",
				   "Authorization": api_token,
				   }
	   });
      var newText = document.getElementsByClassName('error'); console.log(newText.length);
      for($i=0;$i<newText.length;$i++)
      {
         console.log(newText[$i].innerHTML="");
      }
      // alert('hiii');
		var formData = new FormData();
		formData.append('nama', document.myform.nama.value);
		formData.append('no_kod_penganalan', document.myform.no_kod_penganalan.value);
		formData.append('email', document.myform.email.value);
		formData.append('kategori', document.myform.kategori.value);
		formData.append('no_telefon', document.myform.no_telefon.value);
		formData.append('jawatan', document.myform.jawatan.value);
		formData.append('pajabat', document.myform.pejabat.value);
      formData.append('jabatan', jabatan);
		formData.append('gred', document.myform.gred.value);
		formData.append('kementerian', kementerian);
      formData.append('catatan', document.myform.catatan.value);
		formData.append('bahagian', bahagian);
		formData.append('negeri', document.myform.negeri.value);
		formData.append('daerah', document.myform.daerah.value);
		formData.append('catatan', document.myform.catatan.value);
		formData.append('documents', document.myform.dokumen.files[0]);
		formData.append('profile_image', document.myform.myFile.files[0]);
      formData.append('loged_user_id', {{Auth::user()->id}})

      console.log(formData);
      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");
		axios({
			method: "post",
			url: api_url+"api/user/create",
			data: formData,
			headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
		})
			.then(function (response) {
			//handle success
			console.log(response.data.code);
			if(response.data.code === '200') {	
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            $("#add_role_sucess_modal").modal('show');
            
			}else {				
				if(response.data.code === '422') {					
					Object.keys(response.data.data).forEach(key => {						
						document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                  $("div.spanner").removeClass("show");
                 $("div.overlay").removeClass("show");
					  });					
				}else {					
					alert('Terdapat kesilapan dalam penyimpanan data.')
               $("div.spanner").removeClass("show");
                 $("div.overlay").removeClass("show");

				}	
			}			
			})
			.catch(function (response) {
				//handle error
				console.log(response);
				alert("Terdapat kesilapan dalam penyimpanan data.");
			});
	});

       function IsEmail(email) {
              var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
              if(!regex.test(email)) {
                return false;
              }else{
                return true;
              }
    }

   $('.tutup').click(function(){
        $("#successModalCenter").modal('hide');
        window.location.href = origin + '/userlist';

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