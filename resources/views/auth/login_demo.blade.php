<script src="assets/js/jquery.min.js"></script>


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@php
$site_key= config('services.googleCaptcha.site_key');
 $secret_key=config('services.googleCaptcha.secret_key');
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
<script>
  $(document).ready(function(){
    $("#pengguna_agensi_form").hide();
  $("#agensi_form_btn").click(function(){
    $("#pengguna_jps_form").hide();
    $("#pengguna_agensi_form").show();
  })
  $("#jps_form_btn").click(function(){
      $("#pengguna_jps_form").show();
      $("#pengguna_agensi_form").hide();
  })

  })

var onReturnCallback = function(response) {        
    if(response){
        $("#login-jps").prop('disabled', false);                             
        $("#login-nonjps").prop('disabled', false);  
    }
          
    }

var onReturnCallbackRegister = function(response){ console.log(response)
  if(response){
        $("#exampleCheck1").prop('disabled', false); 
        document.querySelector('#submit_registration').disabled = false;
      
    }
}

</script>
<script>
  $(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
$(document).ready(function() {
  document.getElementById("kategori").value=2;
  $("#exampleCheck1").prop('disabled', true);       
  document.querySelector('#submit_registration').disabled = true;
  const api_url = "{{env('API_URL')}}";  console.log(api_url);
	const app_url = document.getElementById("app_url").value;  console.log(app_url);
  const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
      $('#subForgotButton').click(function(){
      
      console.log('modal submitted')
      //$('#sucess_modal').modal('show');
        $('#submitForgot').submit();
    });

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });

	// var JabatandropDown =  document.getElementById("jabatan");
  //   $.ajax({
  //       type: "GET",
  //       url: api_url+"api/lookup/jabatan/list/",
  //       dataType: 'json',
  //       success: function (result) { console.log(result.data)
  //           if (result) {
  //               $.each(result.data, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.nama_jabatan;
	// 				el.value = opt;
	// 				JabatandropDown.appendChild(el);
  //               })
  //           }
  //           else {
  //               $.Notification.error(result.Message);
  //           }
  //       }
  //   });

  //   var bahagiandropDown =  document.getElementById("bahagian");
  //   $.ajax({
  //       type: "GET",
  //       url: api_url+"api/lookup/bahagian/list/",
  //       dataType: 'json',
  //       success: function (result) { console.log(result)
  //           if (result) {
  //               $.each(result.data, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.nama_bahagian;
	// 				el.value = opt;
	// 				bahagiandropDown.appendChild(el);
  //               })
  //           }
  //           else {
  //               $.Notification.error(result.Message);
  //           }
  //       }
  //   });

  //   var jawatandropDown =  document.getElementById("jawatan");
  //   $.ajax({
  //       type: "GET",
  //       url: api_url+"api/lookup/jawatan/list",
  //       dataType: 'json',
  //       success: function (result) { console.log(result)
  //           if (result) {
  //               $.each(result.data, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.nama_jawatan;
	// 				el.value = opt;
	// 				jawatandropDown.appendChild(el);
  //               })
  //           }
  //           else {
  //               $.Notification.error(result.Message);
  //           }
  //       }
  //   });

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
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

  //   var negeridropDown =  document.getElementById("negeri");
  //   $.ajax({
  //       type: "GET",
  //       url: api_url+"api/lookup/negeri/list",
  //       dataType: 'json',
  //       success: function (result) { console.log(result)
  //           if (result) {
  //               $.each(result.data, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.nama_negeri;
	// 				el.value = opt;
	// 				negeridropDown.appendChild(el);
  //               })
  //           }
  //           else {
  //               $.Notification.error(result.Message);
  //           }
  //       }
  //   });

	// var daerahdropDown =  document.getElementById("daerah");
  //   $.ajax({
  //       type: "GET",
  //       url: api_url+"api/lookup/daerah/list",
  //       dataType: 'json',
  //       success: function (result) { console.log(result)
  //           if (result) {
  //               $.each(result.data, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.nama_daerah;
	// 				el.value = opt;
	// 				daerahdropDown.appendChild(el);
  //               })
  //           }
  //           else {
  //               $.Notification.error(result.Message);
  //           }
  //       }
  //   });

    

})

$('#Pengguna_JPS').click(function(){
  document.getElementById("kategori").value=1;
});

$('#Agensi_Luar').click(function(){
  document.getElementById("kategori").value=2;
});

$('#exampleCheck1').click(function(){
  document.querySelector('#submit_registration').disabled = false;
});




  </script>

  <script>
    $("#submit_registration").click(function(){ //alert('heeeee');

      if(!document.myform.nama.value)  { 
			document.getElementById("error_nama").innerHTML="medan nama diperlukan"; 
			document.getElementById("name").focus();
			return false; 
		}
		else{
			document.getElementById("error_nama").innerHTML=""; }
    if(!document.myform.no_kod_penganalan.value)  { 
			document.getElementById("error_no_kod_penganalan").innerHTML="medan no kad penganalan diperlukan"; 
			document.getElementById("Kad_Pengenalan").focus();
			return false; 
		}else { document.getElementById("error_no_kod_penganalan").innerHTML=""; }
		if(!document.myform.email.value)  { 
			document.getElementById("error_email").innerHTML="medan emel rasmi diperlukan"; 
			document.getElementById("Email_Rasmi").focus();
			return false; 
		}else{ document.getElementById("error_email").innerHTML="";}
    if(!document.myform.no_telefon.value)  { 
			document.getElementById("error_telefon").innerHTML="medan no telefon diperlukan"; 
			document.getElementById("No_Telefon").focus();
			return false; 
		}else{document.getElementById("error_telefon").innerHTML="";}
    if(!document.myform.jawatan.value)  { 
			document.getElementById("error_jawatan").innerHTML="sila pilih jawatan"; 
			document.getElementById("jawatan").focus();
			return false; 
		}else{document.getElementById("error_jawatan").innerHTML="";}
    if(!document.myform.gred.value)  { 
			document.getElementById("error_gred").innerHTML="sila pilih gred"; 
			document.getElementById("gred").focus();
			return false; 
		}else{document.getElementById("error_gred").innerHTML="";}
    if(!document.myform.jabatan.value)  { 
			document.getElementById("error_jabatan").innerHTML="sila pilih jabatan"; 
			document.getElementById("jabatan").focus();
			return false; 
		}else{document.getElementById("error_jabatan").innerHTML="";}
    if(!document.myform.bahagian.value)  { 
			document.getElementById("error_bahagian").innerHTML="sila pilih bahagian"; 
			document.getElementById("bahagian").focus();
			return false; 
		}else{document.getElementById("error_bahagian").innerHTML="";}
    if(!document.myform.negeri.value)  { 
			document.getElementById("error_negeri").innerHTML="sila pilih negeri"; 
			document.getElementById("negeri").focus();
			return false; 
		}else{document.getElementById("error_negeri").innerHTML="";}

      if(!document.myform.daerah.value)  { 
			document.getElementById("error_daerah").innerHTML="sila pilih daerah"; 
			document.getElementById("daerah").focus();
			return false; 
		}else{document.getElementById("error_daerah").innerHTML="";}

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
  });
  $(document).ready(function() {

document.getElementById("kategori").value=2;
$("#exampleCheck1").prop('disabled', true);       
document.querySelector('#submit_registration').disabled = true;
const api_url = "{{env('API_URL')}}";  console.log(api_url);
const app_url = document.getElementById("app_url").value;  console.log(app_url);
const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    $('#subForgotButton').click(function(){
      var user_id=$("#exampleInputEmail1").val();
          var user_email=$("#exampleInputPassword1").val();
          if(user_id=='' && user_email==''){
              $("#error").html("Pengesahan Pengguna Tidak Sah");
          }
          else{
            if(IsEmail(user_email)==false){
              $("#error").html("Format E-mel Tidak Sah");
            }
            else{
              $('#sucess_modal').modal('show');

              $("#mail_successBtn").click(function(){
                  $('#submitForgot').submit();
              })
            }

          }
          function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
              return false;
            }else{
              return true;
            }
          }
          // console.log(user_id)
          // console.log(user_email)
          // $.ajax({
          //     type: "POST",
          //     url: api_url+"api/finduser",
          //     contentType: "application/json",
          //     dataType: "json",
          //     data: JSON.stringify({
          //         no_id: user_id,
          //         user_email: user_email,
          //     }),
          //     success: function(response) {
          //         console.log(response);
          //     },
          //     error: function(response) {
          //         console.log(response);
          //     }
          //   });
      // var formData = new FormData();
      // var name = $("#email").val();
      // console.log(name)
      // //formData.append('email', document.submitForgot.email.value);
      // axios({
      // 	method: "post",
      // 	url: api_url+"forgot-password",
      // 	data: formData,
      // 	headers: { "Content-Type": "application/json","Authorization": api_token },
      // })
      // .then(function (response) {
      // 	//handle success
      // 	console.log(response.data.code);				
      // 	})
      // 	.catch(function (response) {
      // 		//handle error
      // 		console.log(response);
      // 		alert("There was an error submitting data");
      // 	});
    // console.log('modal submitted')

      // $('#submitForgot').submit();
  });

  $.ajaxSetup({
       headers: {
              "Content-Type": "application/json",
              "Authorization": api_token,
              }
  });
// var dropDown = document.getElementById("kementerian");
  // $.ajax({
  //     type: "GET",
  //     url: api_url+"GetKementerian/",
  //     dataType: 'json',
  //     success: function (result) { console.log(result)
  //         if (result) {
  //             $.each(result, function (key, item) {
// 				var opt = item.id;
// 				var el = document.createElement("option");
// 				el.textContent = item.Name;
// 				el.value = opt;
// 				dropDown.appendChild(el);
  //             })
  //         }
  //         else {
  //             $.Notification.error(result.Message);
  //         }
  //     }
  // });

var JabatandropDown =  document.getElementById("jabatan");
  $.ajax({
      type: "GET",
      url: api_url+"api/lookup/jabatan/list/",
      dataType: 'json',
      success: function (result) { console.log(result.data)
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
  $.ajax({
      type: "GET",
      url: api_url+"api/lookup/bahagian/list/",
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
        el.textContent = item.nama_gred_jawatan;
        el.value = opt;
        greddropDown.appendChild(el);
              })
          }
          else {
              $.Notification.error(result.Message);
          }
      }
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

var daerahdropDown =  document.getElementById("daerah");
  $.ajax({
      type: "GET",
      url: api_url+"api/lookup/daerah/list",
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
  // ----------------------------------------login-------------------------------------------

if (login) {
let pop_content = document.querySelector(".pop_content");
let pop_btn = document.querySelector(".pop_btn button");
pop_btn.addEventListener("click", () => {
  pop_content.classList.toggle("d-none");
});
eye_icon.addEventListener("click", (e) => {
  console.log(password_eye_field);
  e.preventDefault();
  password_eye_field.type == "password"
    ? (password_eye_field.type = "text")
    : (password_eye_field.type = "password");
});
document.querySelector(".masuk_submit").addEventListener("click", (e) => {
  e.preventDefault();
});
r_input.forEach((inp, i) => {
  inp.addEventListener("click", () => {
    interface_tab_content.forEach((itc) => {
      itc.classList.add("d-none");
    });
    if (inp.checked == true) {
      interface_tab_content[i].classList.remove("d-none");
    }
  });
});
r_input[1].click();

// input_file
input_file_btn.addEventListener("click", (e) => {
  e.preventDefault();
  console.log(input_file);
  input_file.click();
});

// -------------------------
input_file.addEventListener("change", () => {
  var files = input_file.files;
  if (FileReader && files && files.length) {
    var fr = new FileReader();
    // console.log(fr);

    fr.onload = function () {
      console.log(fr.result, input_file.files);
    };

    fr.readAsDataURL(files[0]);
  }
});
let form_btn = document.querySelectorAll(".form_btn_container button");
form_btn.forEach((fb) => {
  fb.addEventListener("click", (e) => {
    e.preventDefault();
  });
});
let login_tab_btn = document.querySelectorAll(
  ".MAsuk_tab_btn_container button"
);
let pengguna_img = document.querySelector(".pengguna_img_holder img");
let src = [
  "assets/images/penggunaJPS.png",
  "assets/images/PenggunaAgensiLuar.png",
];
let colorCode = ["#23a354", "#0284c6"];
let info_content = document.querySelector(".info_content h5");
let login_status = ["Pengguna JPS", "Pengguna Agensi Luar"];
login_tab_btn.forEach((btn, i) => {
  let ind = -1;
  btn.addEventListener("click", () => {
    if (!btn.classList.contains("active")) {
      pengguna_img.classList.add("active");
      info_content.classList.add("active");
      pengguna_img.addEventListener("animationend", () => {
        pengguna_img.classList.remove("active");
        info_content.classList.remove("active");
      });
      setTimeout(() => {
        pengguna_img.setAttribute("src", src[i]);
        info_content.querySelector("span").innerText = login_status[i];
        info_content.querySelector("span").style.color = colorCode[i];
      }, 600);
    }

    ind = -1;
    login_tab_btn.forEach((btn) => {
      btn.classList.remove("active");
    });
    btn.classList.add("active");
  });
  btn.addEventListener("mouseenter", () => {
    if (!btn.classList.contains("active")) {
      for (let j = 0; j < login_tab_btn.length; j++) {
        if (login_tab_btn[j].classList.contains("active")) {
          ind = j;
          console.log(ind);
          login_tab_btn[j].classList.remove("active");
        }
      }
      btn.addEventListener("mouseleave", () => {
        console.log(ind);
        if (ind >= 0) {
          login_tab_btn[ind].classList.add("active");
          ind = -1;
        }
      });
    }

    // if (btn.classList.contains("active")) {
    //   console.log(i);
    //   let ind = i;
    //   login_tab_btn.forEach((btn) => {
    //     btn.classList.remove("active");
    //   });
    //   if (ind >= 0) {
    //     btn.addEventListener("mouseout", () => {
    //       btn[ind].classList.add("active");
    //     });
    //   }
    // }
  });
});
}

  

});
</script>
<style>
  .login_container {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.login_container .login_btn {
  padding: 1rem 3%;
  font-size: 1.4rem;
}

.eye_icon {
  position: absolute;
  top: 53%;
  right: 2%;
  background-color: transparent;
  border: none;
  z-index: 9999;
}

.sucess_msg {
  position: absolute;
  top: -18%;
  left: 40%;
}
.sucess_msg img {
  background-color: #fff;
  border-radius: 50%;
}

.modal-backdrop {
  background-color: transparent;
}

.popover-body {
  padding: 1.5rem 1.4rem;
  background-color: #e9e9e9;
  font-size: 0.75rem;
}

.bs-popover-right > .arrow::after {
  border-right-color: #e9e9e9;
}

.switch {
  margin: 0;
  position: relative;
  display: inline-block;
  width: 45px;
  height: 22px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 3px;
  background-color: #a1aab1;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #0acd95;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0acd95;
}

input:checked + .slider:before {
  transform: translateX(21px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
  background-color: #fff;
}

.r_container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 0.9rem;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

/* Hide the browser's default radio button */
.r_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 2;
  left: 0;
  height: 17px;
  width: 17px;
  background-color: #eee;
  border-radius: 50%;
  border: 1px solid #636b99;
}

/* On mouse-over, add a grey background color */
.r_container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.r_container input:checked ~ .checkmark {
  background-color: #fff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.r_container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.r_container .checkmark:after {
  top: 1px;
  left: 1px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #656c9a;
}
#log_masuk_modal {
  background-color: rgb(0, 0, 0);
}
#log_masuk_modal .log_masuk_modal_dialog {
  max-width: 58%;
}
#log_masuk_modal .log_masuk_modal_content_container {
  background: #c1c1c1;
  border: none;
  border-radius: 0;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container {
  display: flex;
  background-color: #fff;
  border-radius: 1rem;
  padding: 1% 1.6%;
  overflow: hidden;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content {
  width: 50%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder {
  padding: 1% 0;
  width: 100%;
  height: 100%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder img {
  width: 100%;
  -o-object-fit: cover;
     object-fit: cover;
  -o-object-position: left;
     object-position: left;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder img.active {
  -webkit-animation: imagechange 3s;
          animation: imagechange 3s;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder img {
  width: 100%;
  height: 100%;
  border-radius: 1rem 0 0 1rem;
}
@-webkit-keyframes imagechange {
  0% {
    transform: translateX(0%);
  }
  50% {
    transform: translateX(-200%);
  }
  75% {
    transform: translateX(5%);
    -webkit-animation-delay: 1s;
            animation-delay: 1s;
  }
  100% {
    transform: translateX(0%);
  }
}
@keyframes imagechange {
  0% {
    transform: translateX(0%);
  }
  50% {
    transform: translateX(-200%);
  }
  75% {
    transform: translateX(5%);
    -webkit-animation-delay: 1s;
            animation-delay: 1s;
  }
  100% {
    transform: translateX(0%);
  }
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content {
  width: 50%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_header button {
  background-color: transparent;
  border: none;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body {
  padding: 1% 2% 1% 4%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body h4 {
  font-size: 2.2rem;
  text-align: center;
  text-transform: uppercase;
  margin-bottom: 5%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container {
  width: 100%;
  display: flex;
  margin-bottom: 2%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button {
  background: transparent;
  outline: none;
  border: 0;
  padding: 2% 0;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  z-index: 0;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(1) {
  width: 45%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(1)::before {
  background: #c6ffdc;
  width: 10%;
  transition: 0.8s cubic-bezier(0.1, -0.4, 0.4, 1.3);
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(1):hover::before {
  width: 100%;
  background: #c6ffdc;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(2) {
  width: 55%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(2)::before {
  background: #b5e6ff;
  width: 8%;
  transition: 0.8s cubic-bezier(0.1, -0.4, 0.4, 1.4);
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(2):hover::before {
  width: 100%;
  background: #b5e6ff;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button span {
  font-size: 1.2em;
  text-transform: uppercase;
  z-index: 1;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button.active::before {
  width: 100%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content {
  text-align: center;
  padding-bottom: 6%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content h5 {
  margin-bottom: 1%;
  font-size: 1.5rem;
  text-transform: uppercase;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content h5 span {
  font-style: italic;
  color: #23a354;
  text-transform: none;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content h5.active {
  -webkit-animation: login_text_animation 3s;
          animation: login_text_animation 3s;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content .info {
  font-size: 0.93rem;
  margin: 0;
}
@-webkit-keyframes login_text_animation {
  0% {
    transform: translateX(0%);
    opacity: 1;
  }
  25% {
    opacity: 0;
  }
  50% {
    transform: translateX(-200%);
    opacity: 0;
  }
  75% {
    transform: translateX(100%);
    -webkit-animation-delay: 1s;
            animation-delay: 1s;
    opacity: 0;
  }
  100% {
    transform: translateX(0%);
  }
}
@keyframes login_text_animation {
  0% {
    transform: translateX(0%);
    opacity: 1;
  }
  25% {
    opacity: 0;
  }
  50% {
    transform: translateX(-200%);
    opacity: 0;
  }
  75% {
    transform: translateX(100%);
    -webkit-animation-delay: 1s;
            animation-delay: 1s;
    opacity: 0;
  }
  100% {
    transform: translateX(0%);
  }
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .form-group {
  margin-bottom: 3%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form iframe {
  border-radius: 1rem;
  border: 1px solid #9e9e9e;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form input {
  padding: 3.5%;
  height: auto;
  border-color: #000;
  margin-bottom: 4%;
  border-radius: 8px;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form label {
  font-size: 1.1rem;
  font-weight: 600;
  color: #646464;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .masuk_submit {
  padding: 3.1% 0.5rem;
  background-color: #6184de;
  color: #fff;
  border-radius: 10px;
  width: 100%;
  font-size: 1.15rem;
  margin-top: 6%;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .forget_password {
  padding-top: 3%;
  display: flex;
  align-items: flex-end;
  flex-direction: column;
  margin-bottom: 2%;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .forget_password button {
  font-size: 0.95rem;
  background-color: transparent;
  border: none;
  color: #4a7bba;
  padding: 0.7%;
}

#Forget_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
#Forget_modal .forget_modal_dialog {
  max-width: 35%;
}
#Forget_modal .forget_modal_dialog .forget_modal_content {
  border-radius: 10px;
  box-shadow: rgba(1, 8, 17, 0.4) 0px 0px 0px 1px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(15, 15, 15, 0.08) 0px 1px 0px inset;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body {
  padding: 6% 7%;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_heading h4 {
  font-size: 1.3rem;
  font-family: poppins_bold;
  text-transform: uppercase;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_heading p {
  font-size: 0.9rem;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_form form input {
  background-color: #f8f8f8;
  height: auto;
  padding: 0.5rem 1rem;
  font-size: 1.2rem;
  border-color: #000;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_form form .forget_submit button {
  text-transform: uppercase;
  border: none;
  border-radius: 5px;
  padding: 1.8% 10%;
  color: #fff;
  font-weight: 500;
  background-color: #1c8c51;
}

#sucess_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
#sucess_modal .sucess_modal_dialog {
  max-width: 35%;
}
#sucess_modal .sucess_modal_dialog .sucess_modal_content {
  padding: 5% 3%;
  border-radius: 10px;
  border: none;
}
#sucess_modal .sucess_modal_dialog .sucess_modal_content .sucess_modal_body {
  width: 100%;
  margin: auto;
  padding: 5%;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
#sucess_modal .sucess_modal_dialog .sucess_modal_content .sucess_modal_body h3 {
  font-size: 1.6rem;
  text-align: center;
}
#sucess_modal .sucess_modal_dialog .sucess_modal_content .sucess_modal_body button {
  margin-top: 4%;
  background-color: #0062dd;
  border-radius: 20px;
  color: #fff;
  border: none;
  font-size: 0.87rem;
  padding: 0.4rem 1rem;
}

.login_interface_section #Login_interface_modal {
  font-family: Poppins_Regular;
  background-color: rgba(0, 0, 0, 0.2);
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog {
  max-width: 53%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body {
  width: 78%;
  margin: 2% auto;
  padding: 0;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content {
  width: 85%;
  margin: auto;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content h4 {
  font-size: 1.8rem;
  font-family: Poppins_bold;
  margin: 3% 0 5%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_container {
  padding-bottom: 3%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_container label {
  font-size: 0.9rem;
  color: #4a649d;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container {
  display: flex;
  gap: 1%;
  margin-bottom: 1.2%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container label {
  width: 24%;
  font-size: 0.85rem;
  color: #4a649d;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input {
  width: 85%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input input,
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
  font-size: 0.9rem;
  height: auto;
  padding: 1.5% 3%;
  box-shadow: none;
  border-radius: 0;
  background-color: transparent;
  border-color: #e2e5ec;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='32' height='32'><path fill='none' d='M0 0h24v24H0z'/><path d='M12 16l-6-6h12z' fill='rgba(126,126,126,1)'/></svg>");
  background-repeat: no-repeat;
  background-position: right 3% top 40%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker {
  display: flex;
  gap: 10%;
  padding-left: 7%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker input {
  width: 3.8%;
  aspect-ratio: 1/1;
  padding: 2%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker .form_check_label {
  display: block;
  width: 98%;
  font-size: 0.8rem;
  color: #cbccd1;
  margin: 0;
  margin-left: auto;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label {
  width: 24%;
  align-items: center;
  gap: 10%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label label {
  width: 60%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content {
  background-color: #e9e9e9;
  padding: 4% 3%;
  left: 15.5%;
  top: 54%;
  z-index: 99;
  font-size: 0.67rem;
  border-radius: 0.35rem;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content::before {
  position: absolute;
  content: "";
  left: -2.4%;
  top: -7px;
  transform: rotate(333deg);
  border-left: 10px solid #e9e9e9;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content span {
  color: #e40001;
  font-weight: 600;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content p {
  color: #0e0e0e;
  margin: 0;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_btn {
  position: relative;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_btn button {
  padding: 0;
  box-shadow: none;
  position: relative;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_btn button img {
  width: 100%;
  pointer-events: none;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file {
  border: 1px solid #e2e5ec;
  width: 100%;
  position: relative;
  display: flex;
  align-items: center;
  padding: 2%;
  gap: 2%;
  margin-left: 3.2%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file input {
  width: 0;
  height: 0;
  visibility: hidden;
  position: absolute;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file button {
  border: 1px solid #898989;
  border-radius: 4px;
  padding: 1.8% 2%;
  margin: 0 2%;
  font-size: 0.9rem;
  background-color: transparent;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .file_size {
  margin: 0;
  color: #898989;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .selected_file {
  font-size: 0.9rem;
  gap: 1rem;
  align-items: center;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .selected_file p {
  margin: 0;
  font-size: 0.8rem;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .selected_file button {
  background-color: transparent;
  border: none;
  font-size: 0.7rem;
  color: red;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 7%;
  padding-bottom: 8%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button {
  color: #fff;
  display: block;
  text-transform: uppercase;
  font-size: 1rem;
  border: none;
  border-radius: 8px;
  padding: 1.4% 4.5%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button:nth-child(1) {
  background-color: #fe0000;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button:nth-child(2) {
  background-color: #1400ff;
}

.login_sucess_modal_container #login_sucess_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
.login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog {
  max-width: 37%;
}
.login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content {
  padding: 3% 3%;
  border-radius: 10px;
  border: none;
}
.login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .login_sucess_modal_body {
  width: 100%;
  margin: auto;
  padding: 4%;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
.login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .login_sucess_modal_body h3 {
  font-size: 1.35rem;
  font-weight: 600;
  text-align: center;
}
.login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .login_sucess_modal_body button {
  margin-top: 2%;
  background-color: #0062dd;
  border-radius: 20px;
  color: #fff;
  border: none;
  font-size: 0.87rem;
  padding: 0.4rem 1rem;
}
.login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .sucess_msg {
  position: absolute;
  top: -50%;
  left: 40%;
}

.add_role_modal_container #add_role_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog {
  max-width: 39.5%;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header {
  background-color: #39afd1;
  padding: 2%;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header h5 {
  font-size: 0.89rem;
  color: #fff;
  margin: 0;
  padding-left: 1rem;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header button {
  background-color: transparent;
  border: none;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header button img {
  filter: brightness(0) invert(1);
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body {
  padding: 1% 3%;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .configuration {
  margin-bottom: 4%;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .configuration button {
  background-color: transparent;
  border: none;
  color: #39afd1;
  font-size: 0.78rem;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th,
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td {
  border: none;
  font-size: 0.8rem;
  padding: 0.5rem;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th {
  color: #777ea8;
  padding-bottom: 0.8rem;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th:nth-child(2) {
  width: 30%;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td {
  color: #6e7180;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td input {
  width: 1rem;
  aspect-ratio: 1/1;
  border-radius: 0.2rem;
  border: 1px solid #6d767d;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_footer {
  margin: 5% 0 3% 0;
}
.add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_footer button {
  color: #fff;
  background-color: #5a63c2;
  border: none;
  font-size: 0.8rem;
  padding: 1% 1.8%;
  border-radius: 0.2rem;
}

.add_role_sucess_modal_container #add_role_sucess_modal,
.add_role_sucess_modal_container #global_sucess_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog {
  max-width: 31%;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content {
  padding: 3% 2.5%;
  border-radius: 10px;
  background-color: #f5f6fa;
  border: none;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content.global_sucess_modal_content,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content.global_sucess_modal_content {
  border-radius: 15px;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body {
  width: 100%;
  background-color: #fff;
  margin: auto;
  padding: 0;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header {
  display: flex;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header button,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header button {
  background-color: transparent;
  border: none;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content {
  padding: 4%;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content .success_header,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content .success_header {
  margin-bottom: 5%;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content h3,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content h3 {
  font-size: 1.25rem;
  font-weight: 500;
  text-align: center;
  margin: 4% 0 10% 0;
  color: #464356;
}
.add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content button.tutup,
.add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content button.tutup {
  margin: 2% 0 3% 0;
  background-color: #5b64c3;
  color: #fff;
  border: none;
  border-radius: 0.22rem;
  font-size: 0.8rem;
  padding: 8px 15px 8px 15px;
}

.add_selenggara_data_modal_container #add_selenggara_data_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog {
  max-width: 39.5%;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header {
  background-color: #39afd1;
  padding: 2%;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header h5 {
  font-size: 0.89rem;
  color: #fff;
  margin: 0;
  padding-left: 1rem;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header button {
  background-color: transparent;
  border: none;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header button img {
  filter: brightness(0) invert(1);
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body {
  padding: 1% 3%;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form label {
  font-size: 0.8rem;
  color: #757ca5;
  font-weight: 600;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form input {
  height: auto;
  padding: 0.6rem 1rem;
  font-size: 0.88rem;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form textarea {
  height: 5rem;
  border-bottom-right-radius: 0;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form .textarea_depender {
  background-color: #0acf97;
  font-size: 0.7rem;
  color: #fff;
  right: 0;
  padding: 0.1rem 0.65rem;
  border-radius: 0 0 6px 6px;
  margin: 0;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body .add_selenggara_data_modal_footer {
  margin: 3% 0 3% 0;
}
.add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body .add_selenggara_data_modal_footer button {
  color: #fff;
  background-color: #5a63c2;
  border: none;
  font-size: 0.8rem;
  padding: 1% 1.8%;
  border-radius: 0.1rem;
}

.login_container {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.login_container .login_btn {
  padding: 1rem 3%;
  font-size: 1.4rem;
}

.eye_icon {
  position: absolute;
  top: 53%;
  right: 2%;
  background-color: transparent;
  border: none;
  z-index: 9999;
}

.sucess_msg {
  position: absolute;
  top: -18%;
  left: 40%;
}
.sucess_msg img {
  background-color: #fff;
  border-radius: 50%;
}

.modal-backdrop {
  background-color: transparent;
}

.popover-body {
  padding: 1.5rem 1.4rem;
  background-color: #e9e9e9;
  font-size: 0.75rem;
}

.bs-popover-right > .arrow::after {
  border-right-color: #e9e9e9;
}

.switch {
  margin: 0;
  position: relative;
  display: inline-block;
  width: 45px;
  height: 22px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 3px;
  background-color: #a1aab1;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #0acd95;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0acd95;
}

input:checked + .slider:before {
  transform: translateX(21px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
  background-color: #fff;
}

.r_container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 0.9rem;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

/* Hide the browser's default radio button */
.r_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 2;
  left: 0;
  height: 17px;
  width: 17px;
  background-color: #eee;
  border-radius: 50%;
  border: 1px solid #636b99;
}

/* On mouse-over, add a grey background color */
.r_container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.r_container input:checked ~ .checkmark {
  background-color: #fff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.r_container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.r_container .checkmark:after {
  top: 1px;
  left: 1px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #656c9a;
}
</style>
@section('content')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NPIS-Log Masuk</title>
    <link rel="icon" type="image/x-icon" href="assets/images/16x16.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/Mediaquery.css" />
    <!-- captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body id="login">
    <input type="hidden" id="token" value={{env('TOKEN')}}>
    <input type="hidden" id="api_url" value={{env('API_URL')}}>
    <input type="hidden" id="app_url" value={{env('APP_URL')}}>
    <section>
      <!-- Button trigger modal -->
      <div class="login_container">
        <button
          type="button"
          class="btn btn-primary login_btn"
          data-toggle="modal"
          data-target="#log_masuk_modal"
        >
          LOGIN
        </button>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="log_masuk_modal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal-dialog-centered log_masuk_modal_dialog"
          role="document"
        >
          <div class="modal-content log_masuk_modal_content_container">
            <div class="log_masuk_modal_container">
              <div class="log_masuk_modal_left_content">
                <div class="pengguna_img_holder">
                  <!-- <div class="pengguna_img"> -->
                  <img src="assets/images/penggunaJPS.png" alt="penggunaJPS" />
                  <!-- </div> -->
                  <!-- <img
                    src="assets/images/pengguna JPS.png"
                    alt="pengguna JPS"
                  /> -->
                </div>
              </div>
              <div class="log_masuk_modal_right_content">
                <div class="log_masuk_modal_header d-flex">
                  <button type="button" data-dismiss="modal" class="ml-auto">
                    <img src="assets/images/image 95.png" alt="image" />
                  </button>
                </div>
                @if($errors->any())
                  {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif

                <!-- PENGGUNA JPS -->
                <div class="modal-body log_masuk_modal_body">
                  <div class="MAsuk_tab_container">
                    <div class="MAsuk_tab_btn_container">
                      <button id="jps_form_btn" class="jps active">
                        <span>Pengguna JPS </span>
                      </button>
                      <button id="agensi_form_btn" class="agensi">
                        <span>pengguna agensi luar</span>
                      </button>
                    </div>
                    <h4><b>LOG MASUK</b></h4>
                    <div class="pengguna_jps_tab_content">
                      <div class="info_content">
                        <h5 class="d-none">
                          Log Masuk <span><i>Pengguna JPS</i> </span>
                        </h5>
                        <p class="info">
                          Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                        </p>
                      </div>

                      <form id="pengguna_jps_form" method="POST" action="{{url('login')}}">
                        @csrf
                        <div class="form-group">
                          <label for="email"
                            >No. Kad Pengenalan</label
                          >
                          <input type="text"
                          class="form-control"
                          id="email"
                          aria-describedby="emailHelp"
                          placeholder="Kad Pengenalan" name="email" />
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="form-group position-relative">
                          <label for="password">Kata Laluan</label>
                          <input type="password"
                          class="form-control password_eye_field"
                          id="password"
                          placeholder="Kata Laluan" name="password" />
                          <button class="eye_icon">
                            <img
                              src="assets/images/Password eye.png"
                              alt="Password"
                            />
                          </button>
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="g-recaptcha" 
                        data-sitekey={{$site_key}} 
                        data-callback="onReturnCallback" 
                        name="g-recaptcha-response"
                        style="
                            transform: scale(1.61, 1.1);
                            -webkit-transform: scale(1.61, 1.1);
                            transform-origin: 0 0;
                            -webkit-transform-origin: 0 0;
                          "
                        ></div>

                        <!-- captcha -->
                        <div class="row mb-0">
                          <div class="col-md-12">
                              <button id="login-jps" type="submit" class="btn btn-primary masuk_submit" disabled>
                                  {{ __('Log Masuk') }}
                              </button>
                          </div> 
                          <div class="forget_password d-ext-end col-12">
                          <a class="btn btn-link" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                          data-keyboard="false">
                              {{ __('Daftar Baharu') }}
                          </a>
                          @if (Route::has('password.request'))
                              <a class="btn btn-link" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                              data-keyboard="false">
                                  {{ __('Lupa Kata Laluan?') }}
                              </a>
                          @endif 
                          </div>
                      </div>
                      </form>

                      <!-- PENGGUNA Kementerian/Agensi -->
                    <form id="pengguna_agensi_form" method="POST" action="{{url('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email"  class="">E-mel</label>
                            <input type="text"
                                    class="form-control"
                                    id="email"
                                    aria-describedby="emailHelp"
                                    placeholder="E-mel" name="email" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="form-group position-relative">
                            <label for="password" class="">Kata Laluan</label>
                            <input type="password"
                                    class="form-control password_eye_field"
                                    id="password"
                                    placeholder="Kata Laluan" name="password" />
                                    
                            <button class="eye_icon">
                                <img src="assets/images/Password eye.png" alt="" />
                            </button>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="g-recaptcha" data-sitekey={{$site_key}} 
                        style="
                            transform: scale(1.61, 1.1);
                            -webkit-transform: scale(1.61, 1.1);
                            transform-origin: 0 0;
                            -webkit-transform-origin: 0 0;
                          "
                        data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                        
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button id="login-nonjps" type="submit" class="btn btn-primary masuk_submit" disabled>
                                    {{ __('Log Masuk') }}
                                </button>
                            </div> 
                            <div class="forget_password d-ext-end col-12">
                            <a class="btn btn-link" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                            data-keyboard="false">
                                {{ __('Daftar Baharu') }}
                            </a>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                                data-keyboard="false">
                                    {{ __('Lupa Kata Laluan?') }}
                                </a>
                            @endif 
                            </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--------------------------------------------------- forget_modal_container starts-------------------------- -->
    <section>
      <div class="forget_modal">
        <!-- Modal -->
        <div
          class="modal fade"
          id="Forget_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered forget_modal_dialog"
            role="document"
          >
            <div class="modal-content forget_modal_content">
              <div class="modal-body forget_modal_body">
                <div class="forget_modal_heading">
                  <h4>Lupa kata laluan?</h4>
                  <p>
                    Sila masukkan E-Mel, No. Kad Pengenalan dan semak E-Mel anda
                    untuk set semula kata laluan.
                  </p>
                </div>
                <div class="forget_modal_form">
                  <form id="forget_modal_form" autocomplete="off">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="sr-only"
                        >No. Kad Pengenalan</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="No. Kad Pengenalan"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="sr-only"
                        >Alamat E-Mel</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Alamat E-Mel"
                      />
                    </div>
                    <div class="forget_submit text-center">
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#sucess_modal"
                        data-dismiss="modal"
                      >
                        Hantar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--------------------------------------------------- sucess_modal_container starts-------------------------- -->
    <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content sucess_modal_content">
              <div class="modal-body sucess_modal_body">
                <h3>
                  Kata laluan berjaya dihantar ke <br />
                  email anda
                </h3>
                <div class="text-center">
                  <button data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="assets/images/coolicon.png" alt="coolicon" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---------------------------------------------------- login interface Modal starts-------------------------- -->
    <section>
      <div class="login_interface_section">
        <div
          class="modal fade"
          id="Login_interface_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered login_interface_modal_dialog"
            role="document"
          >
            <div class="modal-content login_interface_modal_content">
              <div class="modal-body login_interface_modal_body">
                <div class="login_interface_close">
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <img src="assets/images/image 95.png" alt="image" />
                  </button>
                </div>
                <div class="login_interface_modal_body_content">
                  <h4 class="login_interface_modal_header">
                    DAFTAR AKAUN BAHARU
                  </h4>
                  <div class="interface_tab_container">
                    <div class="d-flex">
                      <div class="label">
                        <label for="Kotegori Pengguna">Kategori Pengguna</label>
                      </div>
                      <div class="radio_Container d-flex flex-column ml-5">
                        <label class="r_container"
                          >Pengguna JPS
                          <input type="radio" name="radio" id="Pengguna_JPS" />
                          <span class="checkmark"></span>
                        </label>
                        <label class="r_container"
                          >Agensi Luar
                          <input
                            type="radio"
                            name="radio"
                            id="Agensi_Luar"
                            checked
                          />
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="interface_tab_content_container">
                    <div class="interface_tab_content">
                      <form class="login_interface_modal_form" action="" method="post" id="register_agensi_user_form" name="myform">
                        <input type="hidden" name="kategori" value="" id="kategori">  
                          <div class="input_container">
                            <label
                              for="Nama_Penuh"
                              class="col-form-label form_label"
                              >Nama Penuh</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="name" name="nama"
                              />
                              <span class="error" id="error_nama"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kad_Pengenalan"
                              class="col-form-label form_label"
                              >No. Kad Pengenalan</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Kad_Pengenalan" name="no_kod_penganalan"
                              />
                              <span class="error" id="error_no_kod_penganalan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Email_Rasmi"
                              class="col-form-label form_label"
                              >Email Rasmi</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Email_Rasmi" name="email"
                              />
                              <span class="error" id="error_email"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >No. Telefon</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="No_Telefon" name="no_telefon"
                              />
                              <span class="error" id="error_telefon"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >Jawatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="jawatan" name="jawatan"
                              >
                              </select>
                              <span class="error" id="error_jawatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Gred" class="col-form-label form_label">Gred</label>
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="gred" id="gred"
                              >
                              </select>
                              <span class="error" id="error_gred"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kementerian"
                              class="col-form-label form_label"
                              >Kementerian</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="Kementerian"
                              >
                                <option value="1">Kementerian Sumber Asli, Alam Sekitar dan Perubahan Iklim (NRECC)</option>
                                <option value="2">Kementerian Tenaga dan Sumber Asli (KeTSA)</option>
                              </select>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Jabatan" class="col-form-label form_label"
                              >Jabatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="jabatan" id="jabatan"
                              >
                              </select>
                              <span class="error" id="error_jabatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Bahagian"
                              class="col-form-label form_label"
                              >Bahagian</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="bahagian" id="bahagian"
                              >
                              </select>
                              <span class="error" id="error_bahagian"></span>                                   
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Negeri"
                              class="col-form-label form_label"
                              >Negeri</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="negri" id="negeri"
                              >
                              </select>
                              <span class="error" id="error_negeri"></span>                                   
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Daerah"
                              class="col-form-label form_label"
                              >Daerah</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="daerah" id="daerah"
                              >
                              </select>
                              <span class="error" id="error_daerah"></span>                                   
                            </div>
                          </div>
                          <!-- <div class="input_container" id='nonjps_doc'>
                            <div class="file_label d-flex">
                              <label
                                for="Dokumen_Sokongan"
                                class="col-form-label form_label"
                                >Dokumen Sokongan</label
                              >
                              <div class="pop_btn" style="margin-left: 11px;">
                                <button
                                  type="button"
                                  class="btn"
                                  data-container="body"
                                  data-toggle="popover"
                                  data-placement="right"
                                  data-content="Sila muat naik  kad Jabatan"
                                  
                                >
                                  <img src="assets/images/i-icon.png" alt="" />
                                </button>
                              </div>
                            </div>
  
                            <div  class="form_input_file">
                              <input
                                type="file"
                                class="form-control"
                                id="Dokumen_Sokongan"
                              />
                              <button type="button" class="select_file">
                                Muat naik lampiran
                              </button>
                              <p id="err-msg" class="file_size d-none">
                                (Salz fail tidak melebihi 10 mb)
                              </p>
                              <div class="selected_file d-flex">
                                <div id="pdf_img" class="pdf_img">
                                </div>
                                <div class="file_details">
                                  <p id="pdf_name" class="pdf_name"></p>
                                  <button class="d-none" id="pdf_remove">Remove file</button>
                                </div>
                                <p id="pdf_size" class="pdf_size"></p>
                              </div>
                            </div>
                          </div> -->
                          <div class="input_container position-relative" id='nonjps_doc'>
                              <div class="file_label d-flex">
                                <label for="Dokumen_Sokongan" class="col-form-label form_label">Dokumen Sokongan</label>
                                <div class="pop_btn">
                                  <button type="button" class="btn" onclick="myFunction()">
                                    <img src="assets/images/i-icon.png" alt="icon">
                                  </button>
                                </div>
                                <div class="pop_content position-absolute d-none" id="error_dokumen_name">
                                  <p>Sila muat naik <span> Surat Jabatan</span></p>
                                </div>
                              </div>

                              <div class="form">
                              <div class="yes">
                                <span class="btn_upload">
                                  <input type="file" name="dockument" id="dockument"  class="input-img">
                                  Muat naik lampiran
                                  </span>
                                  <p class="file_size d-none" id="file_size">
                                    (Saiz fail tidak melebihi 4 mb)
                                  </p>
                                  <p class="file_type d-none" id="file_type">
                                    (Jenis fail tidak sah)
                                  </p>
                                  <div class="selected_file d-none" id="selected_file">
                                    <div class="pdf_img">
                                      <img src="assets/images/pdf.png" alt="pdf">
                                    </div>
                                    <div class="file_details">
                                      <p style="font-size:13px;padding-left: 12px;margin-bottom: 0px !IMPORTANT;" id="document_name"></p>
                                      <button type="button" id="remove_pdf">Remove file</button>
                                    </div>
                                    <p class="file_sizes" id="document_size"></p>
                                </div>
                              </div>
                              </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Kod Pengesahan</label
                            >
                            <div class="form_input">
                              <div
                                class="g-recaptcha"
                                data-sitekey={{$site_key}}
                                data-callback="onReturnCallbackRegister"
                                data-action="submit"
                              >
                                Submit
                              </div>
                            </div>
                          </div>
                          <div class="input_container m-0">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Perakuan Pendaftaran</label
                            >
                            <div class="form_input">
                              <div class="form-group form-check form_checker">
                                <input
                                  type="checkbox"
                                  class="form-check-input"
                                  id="exampleCheck1"
                                />
                                <label class="form_check_label" for="exampleCheck1"
                                  >Dengan ini saya MENGAKU bahawa semua maklumat
                                  yang diisikan dalam permohonan ini adalah SAHIH
                                  dan BENAR.</label
                                >
                              </div>
                            </div>
                          </div>
                          <div class="form_btn_container">
                            <button type="button" id="close_button">KEMBALI</button><button type="button" id="submit_registration">DAFTAR</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--------------------------------------------------- login success starts-------------------------- -->
    <section>
      <div class="login_sucess_modal_container">
        <div
          class="modal fade"
          id="login_sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered login_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content login_sucess_modal_content">
              <div class="modal-body login_sucess_modal_body">
                <h3>Akaun telah didaftar</h3>
                <div class="text-center">
                  <button data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="assets/images/coolicon.png" alt="coolicon" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-------------------------------------------------script sections starts --------------------------------------->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
      $("#log_masuk_modal").modal("show");
      // // $("#Forget_modal").modal("show");
      // // $("#sucess_modal").modal("show");
      // $("#Login_interface_modal").modal("show");

      function onSubmit(token) {
        document.getElementById("penguna_jps_form").submit();
      }
      $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
      });
    </script>
    <script>
      $('#Pengguna_JPS').click(function(){ 
        $('#nonjps_doc').hide();
        document.getElementById("kategori").value=1;
      });

      $('#Agensi_Luar').click(function(){
        $('#nonjps_doc').show();
        document.getElementById("kategori").value=2;
      });

      // $('#exampleCheck1').click(function(){ console.log(this.value);
      //   const checkbox = document.getElementById('exampleCheck1'); console.log(checkbox);
      //   checkbox.checked = !checkbox.checked;
      //   document.querySelector('#submit_registration').disabled = false;
      // });

    </script>
     <script>
    $("#submit_registration").click(function(){ //alert('heeeee');

      if(!document.myform.nama.value)  { 
			document.getElementById("error_nama").innerHTML="medan nama diperlukan"; 
			document.getElementById("name").focus();
			return false; 
		}
		else{
			document.getElementById("error_nama").innerHTML=""; }
    if(!document.myform.no_kod_penganalan.value)  { 
			document.getElementById("error_no_kod_penganalan").innerHTML="medan no kad penganalan diperlukan"; 
			document.getElementById("Kad_Pengenalan").focus();
			return false; 
		}else { document.getElementById("error_no_kod_penganalan").innerHTML=""; }
		if(!document.myform.email.value)  { 
			document.getElementById("error_email").innerHTML="medan emel rasmi diperlukan"; 
			document.getElementById("Email_Rasmi").focus();
			return false; 
		}else{ document.getElementById("error_email").innerHTML="";}
    if(!document.myform.no_telefon.value)  { 
			document.getElementById("error_telefon").innerHTML="medan no telefon diperlukan"; 
			document.getElementById("No_Telefon").focus();
			return false; 
		}else{document.getElementById("error_telefon").innerHTML="";}
    if(!document.myform.jawatan.value)  { 
			document.getElementById("error_jawatan").innerHTML="sila pilih jawatan"; 
			document.getElementById("jawatan").focus();
			return false; 
		}else{document.getElementById("error_jawatan").innerHTML="";}
    if(!document.myform.gred.value)  { 
			document.getElementById("error_gred").innerHTML="sila pilih gred"; 
			document.getElementById("gred").focus();
			return false; 
		}else{document.getElementById("error_gred").innerHTML="";}
    if(!document.myform.jabatan.value)  { 
			document.getElementById("error_jabatan").innerHTML="sila pilih jabatan"; 
			document.getElementById("jabatan").focus();
			return false; 
		}else{document.getElementById("error_jabatan").innerHTML="";}
    if(!document.myform.bahagian.value)  { 
			document.getElementById("error_bahagian").innerHTML="sila pilih bahagian"; 
			document.getElementById("bahagian").focus();
			return false; 
		}else{document.getElementById("error_bahagian").innerHTML="";}
    if(!document.myform.negeri.value)  { 
			document.getElementById("error_negeri").innerHTML="sila pilih negeri"; 
			document.getElementById("negeri").focus();
			return false; 
		}else{document.getElementById("error_negeri").innerHTML="";}

      if(!document.myform.daerah.value)  { 
			document.getElementById("error_daerah").innerHTML="sila pilih daerah"; 
			document.getElementById("daerah").focus();
			return false; 
		}else{document.getElementById("error_daerah").innerHTML="";}

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
      console.log(document.myform.dockument.files);
      var formData = new FormData();
      formData.append('nama', document.myform.nama.value);
      formData.append('no_kod_penganalan', document.myform.no_kod_penganalan.value);
      formData.append('email', document.myform.email.value);
      formData.append('kategori', document.myform.kategori.value);
      formData.append('no_telefon', document.myform.no_telefon.value);
      formData.append('jawatan', document.myform.jawatan.value);
      formData.append('jabatan', document.myform.jabatan.value);
      formData.append('gred', document.myform.gred.value);
      // formData.append('kementerian', document.myform.kementerian.value);
      formData.append('bahagian', document.myform.bahagian.value);
      formData.append('negeri', document.myform.negeri.value);
      formData.append('daerah', document.myform.daerah.value);
      formData.append('catatan', "catatan");
      formData.append('documents', document.myform.dockument.files[0]);

      console.log(formData);

      axios({
        method: "post",
        url: api_url+"api/temp/user/create",
        data: formData,
      })
			.then(function (response) {
			//handle success
			console.log(response.data.code);
			if(response.data.code === '200') {	
            $("#sucess_modal_register").modal('show');
            $("#register_form").hide();
			}else {				
				if(response.data.code === '422') {					
					Object.keys(response.data.data).forEach(key => {						
						document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
					  });					
				}else {					
					alert('There was an error submitting data')
				}	
			}			
			})
			.catch(function (response) {
				//handle error
				console.log(response);
				alert("There was an error submitting data");
			});


    });

    $('#tutup').click(function(){
        $("#sucess_modal_register").modal('hide');
        window.location.href = '/login';

    });

    $('#close_button').click(function(){
        window.location.href = '/login';

    });

    function myFunction() {
      var x = document.getElementById("error_dokumen_name").classList[2]; console.log(x);
      if (x === "d-none") { console.log("found");
        document.getElementById('error_dokumen_name').classList.remove("d-none");
      } else {  console.log(" not found");
        document.getElementById('error_dokumen_name').classList.add("d-none");
      }
    }

    
    function readURL(input, imgControlName) { console.log(input);
      if (input.files && input.files[0]) {
        var reader = new FileReader(); console.log(reader);
        reader.onload = function(e) {
          var iurl = e.target.result.substr(e.target.result.indexOf(",") + 1, e.target.result.length); console.log(iurl);
          $(imgControlName).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    $("#remove_pdf").on('click', function(){ 
          document.getElementById("dockument").value='';
          document.getElementById("document_size").innerHTML = '';
          document.getElementById("document_name").innerHTML = '';
          document.getElementById('selected_file').classList.remove("d-flex");
          document.getElementById('selected_file').classList.add("d-none");
    });
    $("#dockument").on('change', function(){ console.log()
      $new_file = document.myform.dockument.files[0];  console.log($new_file);
      if($new_file.size>4000000)
      {
           document.getElementById("dockument").value='';
           document.getElementById('file_size').classList.remove("d-none");
           document.getElementById('selected_file').classList.remove("d-flex");
           document.getElementById('selected_file').classList.add("d-none");
           return false;
      }
    var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
		
		if(allowedExtensions.indexOf($new_file.type) == -1)  
    {
          document.getElementById("dockument").value=''; 
           document.getElementById('file_size').classList.add("d-none");
           document.getElementById('file_type').classList.remove("d-none");
           document.getElementById('selected_file').classList.remove("d-flex");
           document.getElementById('selected_file').classList.add("d-none");
           return false;
    }
      document.getElementById('error_dokumen_name').classList.add("d-none");
      document.getElementById('file_size').classList.add("d-none");
      document.getElementById('file_type').classList.add("d-none");
      document.getElementById('selected_file').classList.remove("d-none");
      document.getElementById('selected_file').classList.add("d-flex");
      var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
      fSize = $new_file.size; i=0;while(fSize>900){fSize/=1024;i++;}
      docu_size = (Math.round(fSize*100)/100)+' '+fSExt[i]; 
        document.getElementById("document_size").innerHTML = docu_size;
        document.getElementById("document_name").innerHTML = $new_file.name;
    });
  </script>


    <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Le_V_siAAAAAI7AEeMNmqhYrC5deixFB63Kmhmb"></script> -->
  </body>
</html>
<!--   data-container="body"
                                data-toggle="popover"
                                data-placement="right"
                                data-content="Sila muat naik  kad Jabatan" -->
