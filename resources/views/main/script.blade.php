<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}" />
<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>

<script>
  

var onReturnCallback = function(response) {  
      var ic_no=$(".ic_no").val();
      var ic_length=ic_no.length
      var emel=$(".E-mel").val();
      // console.log(ic_length);
      if(ic_length==12 || emel!=''){    
        if(response){
            $("#login-jps").prop('disabled', false);                             
            $("#login-nonjps").prop('disabled', false);  
            $(".ic_error").addClass('d-none');

        }
      }
      else{

        var ic_error="Sila masukkan 12 digit Nombor Kad Pengenalan";
        $(".ic_error").removeClass('d-none');
        $(".ic_error").text(ic_error);
        grecaptcha.reset();

      }
          
    }

var onReturnCallbackRegister = function(response){ console.log(response)
  if(response){
        $("#exampleCheck1").prop('disabled', false); 
        //document.querySelector('#submit_registration').disabled = false;
      
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
  
      localStorage.setItem("jawatan_name",'');
      localStorage.setItem("profile_path",'')

  document.getElementById("kategori").value=2;
  $("#exampleCheck1").prop('disabled', true);       
  document.querySelector('#submit_registration').disabled = true;
  // document.getElementById("jps_daerah").style.display = 'none';
  // document.getElementById("jps_negeri").style.display = 'none';
  // document.getElementById("agency_daerah").style.display = 'block';
  // document.getElementById("agency_negeri").style.display = 'block';

  // document.getElementById("kementerian_jps").style.display = "none";
  // document.getElementById("Kementerian").style.display = "block";
  // document.getElementById("jabatan").style.display = "block";
  // document.getElementById("jabatan_jps").style.display = "none";

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
                //need to validate ic and email and then send email

                axios({
                	method: "get",
                	url: api_url+"api/user/userDetails/"+ user_email +"/" + user_id,
                	//data: formData,
                	headers: { "Content-Type": "application/json","Authorization": api_token },
                })
                .then(function (response) {
                	//handle success
                	console.log(response.data.code);	
                  if(response.data.code == 200){
                        $('#sucess_modal').modal('show');

                        $("#mail_successBtn").click(function(){
                            $('#submitForgot').submit();
                        })
                  }else {
                    //$('#Forget_modal').modal('show');
                    document.getElementById('forget_user_error').style.display = 'block';
                  }
                	})
                	.catch(function (response) {
                		//handle error
                		console.log(response);
                		alert("There was an error submitting data");
                	});
                
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
    "assets/images/jps_image.png",
    "assets/images/agensy_image.png",
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
<!-- Vendor JS Files -->
<script src="main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="main/assets/vendor/aos/aos.js"></script>
<script src="main/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="main/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="main/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="main/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="main/assets/vendor/php-email-form/validate.js"></script>
<script src="main/assets/js/login-register.js" type="text/javascript"></script>
<script src="main/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
<!-- Template Main JS File -->
<script src="main/assets/js/main.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/highlight-4.js') }}"></script>


<script>
          $('#searchBar').keyup(function() {
            var search_term = $('#searchBar').val(); 
            $('.container').removeHighlight().highlight(search_term);

            var search_word=document.querySelector(".highlight"); console.log(search_word)

            console.log(search_term)

            if(search_term!='')
            {
              if(search_word==null)
              {
                $("#src_result").removeClass('d-none')
              }
              else
              {
                $("#src_result").addClass('d-none')
              }
            }
            else
            {
              $("#src_result").addClass('d-none')
            }

            if(search_term!='')
            {
              $("#searchBar").addClass('searchOut')
              $("#searchBar").removeClass('searchIn');
            }
            else
            {
              $("#searchBar").addClass('searchIn')
              $("#searchBar").removeClass('searchOut');
            }
          });
</script>


<script>
  let openMenu = document.querySelector('.icon-bar');
  let closeMenu = document.querySelector('.close-nav');
  let navMenu = document.querySelector('.navbar');
  let bodyEl = document.querySelector('body');
  openMenu.addEventListener('click',function(){
      navMenu.classList.add('nav-scale');
      bodyEl.classList.add('overflow-none');
  });
  
  closeMenu.addEventListener('click',function(){
      navMenu.classList.remove('nav-scale');
      bodyEl.classList.remove('overflow-none');
  });

  function showpassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    var x = document.getElementById("passwordagensi");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  // $("#log_masuk_modal").modal("show");
  // // $("#Forget_modal").modal("show");
  // // $("#sucess_modal").modal("show");
  // $("#Login_interface_modal").modal("show");
  $("#nav-home-tab").click(function(){
        $("#pengguna_jps_form").removeClass('d-none');
        $("#pengguna_agensi_form").addClass('d-none');
        document.getElementById('nav-home-tab').className = "jps nav-link active";
        document.getElementById('nav-profile-tab').className = "agensi nav-link";
        $("#Pengguna_JPS").prop("checked", true);
        $("#Agensi_Luar").prop("checked", false);

        // show Pengguna JPS form input
        var kem_url= api_url+"api/lookup/kementerian-list-by-name";
        loadKementerian(kem_url,"jps");
        document.getElementById("kementerian").disabled = true;

        document.getElementById("bahagian").selectedIndex = 0;
        document.getElementById("pejabat").selectedIndex = 0;
        document.getElementById("negeri").selectedIndex = 0;
        document.getElementById("daerah").selectedIndex = 0;
        document.getElementById("Jabatan").selectedIndex = 0;
        document.getElementById("jabatan_bahagian").selectedIndex = 0;
        
        $('#nonjps_doc').hide();
        document.getElementById("kategori").value=1;
        document.getElementById("jps_negeri").classList.remove('d-none');
        document.getElementById("jabatan_agensy_drop").classList.add('d-none');
        document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
        document.getElementById("jabatan_jps_drop").classList.remove('d-none');
    })
    $("#nav-profile-tab").click(function(){
        $("#pengguna_jps_form").addClass('d-none');
        $("#pengguna_agensi_form").removeClass('d-none');
        document.getElementById('nav-home-tab').className = "jps nav-link";
        document.getElementById('nav-profile-tab').className = "agensi nav-link active";
        $("#Pengguna_JPS").prop("checked", false);
        $("#Agensi_Luar").prop("checked", true);

        // show Pengguna Agensi luar form input
        var kem_url=api_url+"api/lookup/kementerian/list_kementerian";
        loadKementerian(kem_url,"non-jps");
        document.getElementById("kementerian").disabled = false;

        document.getElementById("bahagian").selectedIndex = 0;
        document.getElementById("pejabat").selectedIndex = 0;
        document.getElementById("negeri").selectedIndex = 0;
        document.getElementById("daerah").selectedIndex = 0;
        document.getElementById("Jabatan").selectedIndex = 0;
        document.getElementById("jabatan_bahagian").selectedIndex = 0;

        $('#nonjps_doc').show();
        document.getElementById("kategori").value=2;
        document.getElementById("jps_negeri").classList.add('d-none');
        document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
        document.getElementById("pejabat_agensy_drop").classList.add('d-none');
        document.getElementById("jabatan_jps_drop").classList.add('d-none');
    })

  function onSubmit(token) {
    document.getElementById("penguna_jps_form").submit();
  }
  $(document).ready(function () {
    if ($("#Pengguna_JPS").prop("checked")) {
      var kem_url= api_url+"api/lookup/kementerian-list-by-name";
      loadKementerian(kem_url,"jps");
      document.getElementById("kementerian").disabled = true;

      document.getElementById("bahagian").selectedIndex = 0;
      document.getElementById("pejabat").selectedIndex = 0;
      document.getElementById("negeri").selectedIndex = 0;
      document.getElementById("daerah").selectedIndex = 0;
      document.getElementById("Jabatan").selectedIndex = 0;
      document.getElementById("jabatan_bahagian").selectedIndex = 0;
      
      $('#nonjps_doc').hide();
      document.getElementById("kategori").value=1;
      document.getElementById("jps_negeri").classList.remove('d-none');
      document.getElementById("jabatan_agensy_drop").classList.add('d-none');
      document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
      document.getElementById("jabatan_jps_drop").classList.remove('d-none');
    }

    // axios({
    // method: 'get',
    // url: api_url+"sanctum/csrf-cookie",
    // })
    // .then(function (response) { 
    //   console.log('sanctum')
    //   console.log(response)
    // })
    $('[data-toggle="popover"]').popover();
    window.localStorage.setItem('token', "{{env('TOKEN')}}");

            // document.getElementById("jps_negeri").classList.add('d-none');
            // document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
            // document.getElementById("pejabat_agensy_drop").classList.add('d-none');
            // document.getElementById("jabatan_jps_drop").classList.add('d-none');


            document.getElementById('bahagian').disabled = true;
            document.getElementById('pejabat').disabled = true;
            document.getElementById('negeri').disabled = true;
            document.getElementById('daerah').disabled = true;
            document.getElementById('Jabatan').disabled = true; 
            document.getElementById('jabatan_jps').disabled = true;
            document.getElementById('jabatan_bahagian').disabled = true;

            var kem_url=api_url+"api/lookup/kementerian/list_kementerian";
            loadKementerian(kem_url,"jps");
            document.getElementById("kementerian").disabled = true;

  });
</script>

<script>
  $('#Pengguna_JPS').click(function(){ 
    var kem_url= api_url+"api/lookup/kementerian-list-by-name";
    loadKementerian(kem_url,"jps");
    document.getElementById("kementerian").disabled = true;

    document.getElementById("bahagian").selectedIndex = 0;
    document.getElementById("pejabat").selectedIndex = 0;
    document.getElementById("negeri").selectedIndex = 0;
    document.getElementById("daerah").selectedIndex = 0;
    document.getElementById("Jabatan").selectedIndex = 0;
    document.getElementById("jabatan_bahagian").selectedIndex = 0;
    
    $('#nonjps_doc').hide();
    document.getElementById("kategori").value=1;
    document.getElementById("jps_negeri").classList.remove('d-none');
    document.getElementById("jabatan_agensy_drop").classList.add('d-none');
    document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
    document.getElementById("jabatan_jps_drop").classList.remove('d-none');

  });

  $('#Agensi_Luar').click(function(){
    

    var kem_url=api_url+"api/lookup/kementerian/list_kementerian";
    loadKementerian(kem_url,"non-jps");
    document.getElementById("kementerian").disabled = false;

    document.getElementById("bahagian").selectedIndex = 0;
    document.getElementById("pejabat").selectedIndex = 0;
    document.getElementById("negeri").selectedIndex = 0;
    document.getElementById("daerah").selectedIndex = 0;
    document.getElementById("Jabatan").selectedIndex = 0;
    document.getElementById("jabatan_bahagian").selectedIndex = 0;

    $('#nonjps_doc').show();
    document.getElementById("kategori").value=2;
    document.getElementById("jps_negeri").classList.add('d-none');
    document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
    document.getElementById("pejabat_agensy_drop").classList.add('d-none');
    document.getElementById("jabatan_jps_drop").classList.add('d-none');

  });

  $('#jabatan_agensy_drop_check').click(function(){
    var daerahdropDown =  document.getElementById("daerah");
    $("#daerah").empty();
    var el = document.createElement("option"); console.log(el)
     el.textContent = '--Pilih--';
     el.value = '';
     daerahdropDown.appendChild(el);

    document.getElementById("bahagian").selectedIndex = 0;
    document.getElementById("pejabat").selectedIndex = 0;
    document.getElementById("negeri").selectedIndex = 0;
    document.getElementById("daerah").selectedIndex = 0;
    document.getElementById("jabatan_bahagian").selectedIndex = 0;

    document.getElementById('bahagian').disabled = true;
    document.getElementById('pejabat').disabled = true;
    document.getElementById('negeri').disabled = true;
    document.getElementById('daerah').disabled = true;
    document.getElementById('Jabatan').disabled = false;
    document.getElementById('jabatan_bahagian').disabled = false;

    document.getElementById("jabatan_agensy_drop_check").checked = true;
    document.getElementById("bahagian_drop_check").checked = false;
    document.getElementById("negeri_drop_check").checked = false;
    document.getElementById("daerah_drop_check").checked = false;
    document.getElementById("pejabat_drop_check").checked = false;
    
  });

  $('#bahagian_drop_check').click(function(){
    var daerahdropDown =  document.getElementById("daerah");
  $("#daerah").empty();
  var el = document.createElement("option"); console.log(el)
     el.textContent = '--Pilih--';
     el.value = '';
     daerahdropDown.appendChild(el);
    document.getElementById("pejabat").selectedIndex = 0;
    document.getElementById("negeri").selectedIndex = 0;
    document.getElementById("daerah").selectedIndex = 0;
    document.getElementById("Jabatan").selectedIndex = 0;
    document.getElementById("jabatan_bahagian").selectedIndex = 0;

                 document.getElementById('bahagian').disabled = false;
                 document.getElementById('pejabat').disabled = true;
                 document.getElementById('negeri').disabled = true;
                 document.getElementById('daerah').disabled = true;
                 document.getElementById('Jabatan').disabled = true;
                 document.getElementById('jabatan_bahagian').disabled = true;
                 
                 document.getElementById("jabatan_agensy_drop_check").checked = false;
                 document.getElementById("bahagian_drop_check").checked = true;
                 document.getElementById("negeri_drop_check").checked = false;
                 document.getElementById("daerah_drop_check").checked = false;
                 document.getElementById("pejabat_drop_check").checked = false;
    
  });

  $('#negeri_drop_check').click(function(){
    var daerahdropDown =  document.getElementById("daerah");
  $("#daerah").empty();
  var el = document.createElement("option"); console.log(el)
     el.textContent = '--Pilih--';
     el.value = '';
     daerahdropDown.appendChild(el);
    document.getElementById("bahagian").selectedIndex = 0;
    document.getElementById("pejabat").selectedIndex = 0;
    document.getElementById("daerah").selectedIndex = 0;
    document.getElementById("Jabatan").selectedIndex = 0;
    document.getElementById("jabatan_bahagian").selectedIndex = 0;
    
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
    
  });

  $('#daerah_drop_check').click(function(){
    var daerahdropDown =  document.getElementById("daerah");
  $("#daerah").empty();
  var el = document.createElement("option"); console.log(el)
     el.textContent = '--Pilih--';
     el.value = '';
     daerahdropDown.appendChild(el);
    document.getElementById("bahagian").selectedIndex = 0;
    document.getElementById("pejabat").selectedIndex = 0;
    document.getElementById("negeri").selectedIndex = 0;
    document.getElementById("Jabatan").selectedIndex = 0;
    document.getElementById("jabatan_bahagian").selectedIndex = 0;

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
    
  });

  $('#pejabat_agensy_drop').click(function(){
    var daerahdropDown =  document.getElementById("daerah");
  $("#daerah").empty();
  var el = document.createElement("option"); console.log(el)
     el.textContent = '--Pilih--';
     el.value = '';
     daerahdropDown.appendChild(el);

                  document.getElementById("bahagian").selectedIndex = 0;
                  document.getElementById("negeri").selectedIndex = 0;
                  document.getElementById("daerah").selectedIndex = 0;
                  document.getElementById("Jabatan").selectedIndex = 0;
                  document.getElementById("jabatan_bahagian").selectedIndex = 0;

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
    
  });


  function myChecboxFunction() {
    var checkBox = document.getElementById("exampleCheck1");
    if (checkBox.checked == true){
        document.querySelector('#submit_registration').disabled = false;
    } else {
        document.querySelector('#submit_registration').disabled = true;
    }
  }

const api_url = "{{env('API_URL')}}";  console.log(api_url);
  const app_url = document.getElementById("app_url").value;  console.log(app_url);
const api_token = "Bearer "+ window.localStorage.getItem('token');;  console.log(api_token);
  const {
    host, hostname, href, origin, pathname, port, protocol, search
  } = window.location

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
           })
     }
     else {
           $.Notification.error(result.Message);
     }
  }
});


</script>
 <script>
$("#submit_registration").click(function(){ //alert('heeeee');

  if(!document.myform.nama.value)  { 
        document.getElementById("error_nama").innerHTML="Medan nama diperlukan"; 
        document.getElementById("name").focus();
        return false; 
    }
    else{
        document.getElementById("error_nama").innerHTML=""; }

  if(!document.myform.no_kod_penganalan.value)  
  { 
          document.getElementById("error_no_kod_penganalan").innerHTML="Medan no kad pengenalan diperlukan"; 
          document.getElementById("Kad_Pengenalan").focus();
          return false; 
  }
  else if(isNaN(document.myform.no_kod_penganalan.value))
  {
    document.getElementById("error_no_kod_penganalan").innerHTML="Sila tambah nombor sahaja"; 
          document.getElementById("Kad_Pengenalan").focus();
          return false;
  } 
  else if(document.myform.no_kod_penganalan.value.length<12) 
  {
    document.getElementById("error_no_kod_penganalan").innerHTML="Maksimum 12 digit diperlukan"; 
          document.getElementById("Kad_Pengenalan").focus();
          return false;
      }
  else 
  { document.getElementById("error_no_kod_penganalan").innerHTML=""; }

    if(!document.myform.email.value)  { 
        document.getElementById("error_email").innerHTML="Medan emel rasmi diperlukan"; 
        document.getElementById("Email_Rasmi").focus();
        return false; 
    }else{ document.getElementById("error_email").innerHTML="";}

if(IsEmail(document.myform.email.value)==false){
  document.getElementById("error_email").innerHTML="Format e-mel tidak sah"; 
        document.getElementById("Email_Rasmi").focus();
        return false;
}
else{
  document.getElementById("error_email").innerHTML="";
}
let email = document.myform.email.value;
let getDomain =email.substr(email.length - 6);  console.log(getDomain)

if(!document.myform.no_telefon.value)  { 
        document.getElementById("error_telefon").innerHTML="Medan no telefon diperlukan"; 
        document.getElementById("No_Telefon").focus();
        return false; 
    }
else if(isNaN(document.myform.no_telefon.value))
{
    document.getElementById("error_telefon").innerHTML="Sila tambah nombor sahaja"; 
          document.getElementById("No_Telefon").focus();
          return false;
} 
else
{document.getElementById("error_telefon").innerHTML="";}

if(!document.myform.jawatan.value)  { 
        document.getElementById("error_jawatan").innerHTML="Sila pilih jawatan"; 
        document.getElementById("jawatan").focus();
        return false; 
    }else{document.getElementById("error_jawatan").innerHTML="";}

if(!document.myform.gred.value)  { 
        document.getElementById("error_gred").innerHTML="Sila pilih gred"; 
        document.getElementById("gred").focus();
        return false; 
    }else{document.getElementById("error_gred").innerHTML="";}

//     if(!document.myform.jabatan.value)  { 
// 			document.getElementById("error_jabatan").innerHTML="Sila pilih jabatan"; 
// 			document.getElementById("jabatan").focus();
// 			return false; 
// 		}else{document.getElementById("error_jabatan").innerHTML="";}
//     if(!document.myform.bahagian.value)  { 
// 			document.getElementById("error_bahagian").innerHTML="Sila pilih bahagian"; 
// 			document.getElementById("bahagian").focus();
// 			return false; 
// 		}else{document.getElementById("error_bahagian").innerHTML="";}
//     if(!document.myform.negeri.value)  { 
// 			document.getElementById("error_negeri").innerHTML="Sila pilih negeri"; 
// 			document.getElementById("negeri").focus();
// 			return false; 
// 		}else{document.getElementById("error_negeri").innerHTML="";}

//       if(!document.myform.daerah.value)  { 
// 			document.getElementById("error_daerah").innerHTML="Sila pilih daerah"; 
// 			document.getElementById("daerah").focus();
// 			return false; 
// 		}else{document.getElementById("error_daerah").innerHTML="";}
// console.log(document.myform.dockument.files);
if(document.myform.kategori.value==1){

    if(!document.myform.bahagian.value &&  !document.myform.pejabat.value &&  !document.myform.negeri.value)
    { 
      document.getElementById("error_bahagian").innerHTML="Sila Pilih Bahagian/Pejabat/Negeri"; 
      document.getElementById("bahagian").focus();
      return false; 
    }
    else
    { 
      document.getElementById("error_bahagian").innerHTML=""; 
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

if(document.myform.dockument.files.length==0 && document.myform.kategori.value==2)  { 
    // document.getElementById("error_image_name").style.display = 'block';
        document.getElementById("error_dokumen_name_new").innerHTML="Sila muat naik dokumen"; 
        document.getElementById("error_dokumen_name").focus();
        return false; 
    }
    else{
     //document.getElementById("error_image_name").style.display = 'none';
        document.getElementById("error_dokumen_name_new").innerHTML=""; }

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
  formData.append('pajabat', document.myform.pejabat.value);
  formData.append('jabatan', jabatan);     
  formData.append('gred', document.myform.gred.value);
  formData.append('kementerian', kementerian);
  formData.append('bahagian', bahagian);
  formData.append('negeri', document.myform.negeri.value);
  formData.append('daerah', document.myform.daerah.value);
  formData.append('catatan', "catatan");
  formData.append('documents', document.myform.dockument.files[0]);

  console.log(formData);

  $("div.spanner").addClass("show");
  $("div.overlay").addClass("show");

  axios({
    method: "post",
    url: api_url+"api/temp/user/create",
    data: formData,
  })
        .then(function (response) {

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
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

function IsEmail(email) {
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regex.test(email)) {
            return false;
          }else{
            return true;
          }
}

$('#tutup').click(function(){
    $("#sucess_modal_register").modal('hide');
    window.location.href = '/';

});

$('#close_button').click(function(){
    window.location.href = '/';

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
<script>
    $(document).ready(function(){
            $( ".accordion-toggle" ).mouseover(function(){
                $( ".accordion-toggle" ).trigger( "click" );
                // If creating multiple accordion items, use the below to prevent all other
                // items with the class "accordion-toggle" triggering a click event
                // $(this).trigger("click");
            });

            // const togglePassword = document.querySelector("#togglePassword");
            // const password = document.querySelector("#password");

            $("#togglePassword").click(function() {

                var x = document.getElementById("pwd");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }


            this.classList.toggle("bi-eye");
            });


            var refreshButton = document.querySelector(".refresh-captcha");
            refreshButton.onclick = function() {
                document.querySelector(".captcha-image").src = '/captcha?test=' + Date.now();
            }

            $(".list").click(function handleClick(event){
                let lists = document.querySelectorAll('.list a');
                lists.forEach((item) => item.classList.remove('active'));
                event.target.classList.add('active');
            });

        });

        axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/portal/main",
        responseType: 'json'        
        })
        .then(function (response) {
          console.log('main')

          data = response.data.data
          console.log(data.logo1)
          //main logo
          
                      
                      
          logo1_temp = '<div><img src="'+data.logo3+'" id="main_logo1" height="75px"></div>'
          logo2_temp = '<div><img src="'+data.logo2+'" id="main_logo2" height="50px" style="padding-right:25px;"></div>'
          logo3_temp = '<div><img src="'+data.logo1+'" id="main_logo3" height="75px"></div>'
          if(data.logo1){
            $("#logo1").addClass("d-none")
            $('#logo_source').append(logo3_temp)

          }

          if(data.logo2){
            $("#logo2").addClass("d-none")
            $('#logo_source').append(logo2_temp)
          }

          if(data.logo3){
            $("#logo3").addClass("d-none")
            $('#logo_source').append(logo1_temp)
          }


          if(data.BreakingNews!=null){
            for(i=0;i<data.BreakingNews.length;i++){
              // console.log(data.BreakingNews[i].tajuk)              
              $("#newslabel").append('<label class="ml-2" id=newslabel'+i+'>'+data.BreakingNews[i].tajuk+","+'</label>');
            }
          }
          else{
            $("#newslabel").append('<label class="ml-2">No Breaking News</label>');
          }

          // if(data.BreakingNews!=null){
          //   if(data.BreakingNews.news==null){
          //   $("#newsbar").addClass('d-none')
          //   }else{
          //     $("#newslabel").text(data.BreakingNews.news)
          //   }
          // }


          // $('#main_logo1').attr('src', data.logo1);
          // $('#main_logo2').attr('src', data.logo2);
          // $('#main_logo3').attr('src', data.logo3);

          //main landing
          main_header.innerText = data.landing.tajuk
          if(data.landing_is_video == 1) {
            $("#carouselExampleIndicators").addClass("d-none")
            $("#hero-carousel").removeClass("d-none")
            for (const [key, value] of Object.entries(data.landing.media_details)) {                                                
                $('#bgvid').attr('src', value.original_url)
            }
          }else {
            $("#hero-carousel").addClass("d-none")
            $("#carouselExampleIndicators").removeClass("d-none")
            for(const [key, value] of Object.entries(data.landing.media_details)) {
                $('<div class="carousel-item"><img src="'+value.original_url+'" width="100%"></div>').appendTo('.carousel-inner');
                // $('<li data-target="#carouselExampleIndicators" data-slide-to="'+key+'"></li>').appendTo('.carousel-indicators');
              }
                $('.carousel-item').first().addClass('active');
                // $('.carousel-indicators > li').first().addClass('active');
                $('#carouselExampleIndicators').carousel();
          }

          //pengenalan
          $('#peng_header').text(data.pengenalan.tajuk)
          $('#peng_description').html(data.pengenalan.keterangan)
          if(data.pengenalan_is_video == 1) {
            $("#peng_bgimg").addClass('d-none')
            $('#peng_bgvid').attr('src', data.pengenalan.media_details)
          }
          else{
            $("#peng_bgvid").addClass('d-none')
            $("#peng_bgimg").attr('src', data.pengenalan.media_details)
          }
          
          peng_length = data.pengumuman.length

          i = 0;
          for (const [peng_key, peng_value] of Object.entries(data.pengumuman)) {  
            
            today = new Date(peng_value.tarikh);
            yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            formattedToday = dd + '-' + mm + '-' + yyyy;
            active = ''
            // if(i == 0) {
            //   active = 'active show'
            // }
            $("#tab-0").addClass('active')
            peng_side_template =  '<li class="nav-item '+ active+'"> ' +
                                '<a class="nav-link " id="tab'+i+'"  data-bs-toggle="tab" data-bs-target="#tab-'+i+'" >' +
                                '<h4>'+ peng_value.tajuk+'</h4>' +
                                '<p><b>' +formattedToday +'</b> - ' + peng_value.sub_tajuk+ '</p></a></li>'
            $('#informasi_side').append(peng_side_template);
            $("#tab1").click(function(){
              $("#tab-0").removeClass('active')
            })
            $("#tab2").click(function(){
              $("#tab-0").removeClass('active')
            })

            media_length = peng_value.media.length
            image = ''
            if(media_length > 0) {
              image = peng_value.media[0].original_url
            }
            
            peng_main_template = '<div class="tab-pane '+active+'" id="tab-'+i+'">' +
                                '<h5>'+peng_value.tajuk+'</h5>' + 
                                '<p class="fst-italic">' +peng_value.sub_tajuk+ '</p>' +
                                '<img src="'+ image+'" alt="" class="img-fluid">' +
                                '<p>' +peng_value.keterangan+ '</p></div>'
            $('#informasi_main').append(peng_main_template);
            i = i + 1
          }

          //contact
          if(data.contact!=null){
            contact = JSON.parse(data.contact.json_values)
            $('#alamat').text(contact.address).css("white-space","pre")
            $('#telephone').text(contact.phone_no)
            $('#iframe').append(contact.mapCode)
            // $("iframe").height(400);
            //$("iframe").height(400);
          }


          //footer
          footer = JSON.parse(data.footer.json_values)
          $('#footer_logo').attr('src', data.footer.logo)
          $('#logo_url').attr('href', footer.logo_url)    
          if(!data.footer.logo){
            $('#footer_logo').attr('src', data.footer.media[0].original_url)
          }
          $('#copyright').text(footer.copyright)
          // console.log(response.data.data2.totalvisited[0].totalvisited)
          // console.log(response.data.data2.visitedmonth[0].visitedmonth)
          // console.log(response.data.data2.visitedtoday[0].visitedtoday)
          // console.log(response.data.data2.visitedyear[0].visitedyear)

            
          if(response.data.data2.totalvisited[0].totalvisited){
            $("#NOV").text(response.data.data2.totalvisited[0].totalvisited)
          }
          if(response.data.data2.visitedtoday[0].visitedtoday){
            $("#NOVT").text(response.data.data2.visitedtoday[0].visitedtoday)
          }
          if(response.data.data2.visitedmonth[0].visitedmonth){
            $("#NOVM").text(response.data.data2.visitedmonth[0].visitedmonth)
          }
          if(response.data.data2.visitedyear[0].visitedyear){
            $("#NOVY").text(response.data.data2.visitedyear[0].visitedyear)
          }

          $('#footer').css('background-image', 'url(' + data.footer.imeg + ')');
        })

      //   $("#login-nonjps").click(function(event){ 
      //       console.log('non jps form submitted');            
      //       var formEl = document.forms.pengguna_agensi_form;
      //       var formData = new FormData(formEl);            
      //       axios({
      //         method: 'post',
      //         url: "{{ env('API_URL') }}"+"api/temp/user/auth",
      //         responseType: 'json',
      //         data: formData
      //         })
      //         .then(function (response) { 
      //             console.log(response)
      //             console.log("nonjpslogin")

                  
      //             if(response.data.access_token != '') {
      //               console.log('got token')
      //               window.localStorage.setItem('token', response.data.access_token);
                    
      //             }else {
      //               console.log('no token')
      //             }                  
      //         })
            
      // });

      // $("#login-jps").click(function(event){ 
      //       console.log('jps form submitted');
      //       var formEl = document.forms.pengguna_jps_form;
      //       var formData = new FormData(formEl);            
      //       axios({
      //         method: 'post',
      //         url: "{{ env('API_URL') }}"+"api/temp/user/auth",
      //         responseType: 'json',
      //         data: formData
      //         })
      //         .then(function (response) { 
      //             console.log(response)
      //             console.log("login")

                  
      //             if(response.data.access_token != '') {
      //               console.log('got token')
      //               window.localStorage.setItem('token', response.data.access_token);
                    
      //             }else {
      //               console.log('no token')
      //             }                  
      //         })              
      // });

      axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/noc/get_noc_data",
        responseType: 'json'        
        })
        .then(function (response) { console.log('noc_get_noc_data')

            if(response.data.data){

              document.getElementById("border_terkini").style.padding='36px';
              document.getElementById("border_terkini").style.border = '1px solid grey';


              var noc = extractNumberFromString(response.data.data.bilangan);
              const formattedDate = formatDate(response.data.data.tarikh_buka);
              //$("#tab-0").addClass('active')
              let peng_side_template =  `<div class="tab-pane active show" id="tab-1">
                                      <h3>News</h3>
                                      <p><b>`+formattedDate+`</b> Notice of change <label class="lable_noc" style="color:red;">`+noc+`</label> (NOC <label class="lable_noc" style="color:red;">`+noc+`</label>) is Open</p>
                                      <img src="images/Vector2.png" alt="" class="img-fluid">
                                      <p>Notice of change <label class="lable_noc" style="color:red;">`+noc+`</label> (NOC <label class="lable_noc" style="color:red;">`+noc+`</label>) telah dibuka.
                                      bagi peringkat Bahagian. Pengguna boleh memohon NOC di modul 
                                      NOC atau tekan padan pautan yang telah di sediakan.
                                      <label style="align-items: right;justify-content: right;" class="selanjutnyaBtn" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="selanjutnya_btn">
                                            <i style="color: #0539EE;">Baca Selanjutnya>></i></label>                                      
                                  </div>`;
              
              $('#informasi_main').append(peng_side_template);
            }

            if(response.data.data_pop_up){
              var data_pop_up=response.data.data_pop_up;

                const formattedPopDate = formatDatePOP(data_pop_up.tarikh); console.log(formattedPopDate);

                let sub_title = `<b>`+ formattedPopDate +`</b>` + ' ' + data_pop_up.sub_tajuk;

              document.getElementById("pop_title").innerText = data_pop_up.tajuk;
              $('#pop_sub_title').append(sub_title);

              // document.getElementById("pop_sub_title").innerText = '<b>'+ formattedToday +'</b>'+data_pop_up.sub_tajuk;
              document.getElementById("pop_image").src = data_pop_up.media[0].original_url;
              document.getElementById("pop_description").innerText = data_pop_up.keterangan.replace(/<\/?p>/g, '');
            }
        });

        function extractNumberFromString(inputString) {
          const matches = inputString.match(/\d+/);
          return matches ? parseInt(matches[0]) : null;
        }

        function formatDatePOP(inputDate) {
                            const today = new Date(inputDate);
                            const yyyy = today.getFullYear();
                            let mm = today.getMonth() + 1; // Months start at 0!
                            let dd = today.getDate();

                            if (dd < 10) dd = '0' + dd;
                            if (mm < 10) mm = '0' + mm;

                            const formattedToday = dd + '-' + mm + '-' + yyyy;

            return formatDate(formattedToday);
        }

        function formatDate(inputDate) {
            const months = [
              "jan", "feb", "mar", "apr", "may", "jun",
              "jul", "aug", "sep", "oct", "nov", "dec"
            ];

            const parts = inputDate.split("-");
            const day = parts[2];
            const month = months[parseInt(parts[1], 10) - 1];
            const year = parts[0];

            return `${day} ${month} ${year}`;
        }


        $('#selanjutnya_btn').click(function(){
            $("#exampleModal1").modal('show');
        });


</script>
<script>
    $(document).ready(function(){
      var utama_link =  document.getElementById("utama_link");
      var about_link =  document.getElementById("about_link");
      var informasi_link =  document.getElementById("informasi_link");
      var modul_link =  document.getElementById("modul_link");
      var hubungi_link =  document.getElementById("hubungi_link");
      let navMenu = document.querySelector('.navbar');
      let bodyEl = document.querySelector('body');

      utama_link.addEventListener('click', function handleClick(event){
        event.target.classList.add('active');
        about_link.classList.remove('active');
        informasi_link.classList.remove('active');
        modul_link.classList.remove('active');
        hubungi_link.classList.remove('active');
        navMenu.classList.remove('nav-scale');
        bodyEl.classList.remove('overflow-none');
      });

      about_link.addEventListener('click', function handleClick(event){
        event.target.classList.add('active');
        utama_link.classList.remove('active');
        informasi_link.classList.remove('active');
        modul_link.classList.remove('active');
        hubungi_link.classList.remove('active');
        navMenu.classList.remove('nav-scale');
        bodyEl.classList.remove('overflow-none');
      });

      informasi_link.addEventListener('click', function handleClick(event){
        event.target.classList.add('active');
        utama_link.classList.remove('active');
        about_link.classList.remove('active');
        modul_link.classList.remove('active');
        hubungi_link.classList.remove('active');
        navMenu.classList.remove('nav-scale');
        bodyEl.classList.remove('overflow-none');
      });

      modul_link.addEventListener('click', function handleClick(event){
        event.target.classList.add('active');
        utama_link.classList.remove('active');
        about_link.classList.remove('active');
        informasi_link.classList.remove('active');
        hubungi_link.classList.remove('active');
        navMenu.classList.remove('nav-scale');
        bodyEl.classList.remove('overflow-none');
      });

      hubungi_link.addEventListener('click', function handleClick(event){
        event.target.classList.add('active');
        utama_link.classList.remove('active');
        about_link.classList.remove('active');
        informasi_link.classList.remove('active');
        modul_link.classList.remove('active');
        navMenu.classList.remove('nav-scale');
        bodyEl.classList.remove('overflow-none');
      });
      

    });

    let pop_content_all = document.querySelectorAll(".pop_content");
    let pop_btn_all = document.querySelectorAll(".pop_btn");
    if (pop_btn_all) {
      pop_btn_all.forEach((pba, i) => {
        pba.addEventListener("mouseover", (e) => {
          e.preventDefault();
          pop_content_all[i].classList.toggle("d-none");
        });
        pba.addEventListener("mouseout", (e) => {
          e.preventDefault();
          pop_content_all[i].classList.toggle("d-none");
        });
      });
    }

    $("#daftar_reset").click(function(event){ 
      console.log('daftar reset');
      $('#name').val('');
      $('#Kad_Pengenalan').val('');
      $('#Email_Rasmi').val('');
      $('#No_Telefon').val('');
      $("#jawatan").val('');
      $("#gred").val('');
      // $("#kementerian").val('');
      $("#Jabatan").val('');
      $("#jabatan_bahagian").val('');
      $("#bahagian").val('');
      $("#pejabat").val('');
      $("#negeri").val('');
      $("#daerah").val('');
    });


  const select = document.getElementById('kementerian');
  const resetButton = document.getElementById('daftar_reset');
  
  // Prevent changes to the select input value
  select.addEventListener('beforeinput', (event) => {
    event.preventDefault();
  });

  // Reset the input and select field values
  resetButton.addEventListener('click', () => {
    select.selectedIndex = 0;
  });
    
    </script>