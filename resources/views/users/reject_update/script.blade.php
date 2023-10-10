    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
      function onSubmit(token) {
        document.getElementById("penguna_jps_form").submit();
      }
      $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
      });
    </script>

    
<script>

$(document).ready(function() {
    
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    var user_id= window.location.pathname.split("/").pop();
    $("#exampleCheck1").prop('disabled', true);       
    document.querySelector('#submit_registration').disabled = true;

    window.localStorage.setItem('token', "{{env('TOKEN')}}");

    document.getElementById("jps_negeri").classList.add('d-none');
    document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
    document.getElementById("pejabat_agensy_drop").classList.add('d-none');
    document.getElementById("jabatan_jps_drop").classList.add('d-none');

    document.getElementById('bahagian').disabled = true;
    document.getElementById('pejabat').disabled = true;
    document.getElementById('negeri').disabled = true;
    document.getElementById('daerah').disabled = true;
    document.getElementById('Jabatan').disabled = true; 
    document.getElementById('jabatan_jps').disabled = true;

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const app_url = document.getElementById("app_url").value;  console.log(app_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    const {
      host, hostname, href, origin, pathname, port, protocol, search
      } = window.location

    $.ajaxSetup({
      headers: {
          "Content-Type": "application/json",
          "Authorization": api_token,
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
    document.getElementById("jabatan_bahagian").selectedIndex = 0;
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

    list_user_api = api_url+"api/temp/details/temp/"+user_id;
    $.ajax({
        type: "GET",
        url: list_user_api,
        dataType: 'json',
        success: function (result) { 
            console.log(result.data.user);

            const UpdateCounter = result.data.user.UpdateCounter; console.log(UpdateCounter)
            var count = result.data.user.count; console.log(count)
            
            if (count>UpdateCounter) { 
                $("#Login_interface_modal").modal('show');
                $("#reject_mode_sucess_modal").modal('hide');
                var phone_no=result.data.user.no_telefon;
                document.getElementById("name").value= result.data.user.name;

                document.getElementById("No_Telefon").value=phone_no;
                document.getElementById("Email_Rasmi").value= result.data.user.email;
                document.getElementById("jawatan").value= result.data.user.jawatan_id;
                document.getElementById("gred").value= result.data.user.gred_jawatan_id;
              
                if(result.data.user.negeri_id)
                {
                  document.getElementById("negeri_drop_check").checked = true;
                  document.getElementById('negeri').disabled = false;
                  document.getElementById("negeri").value= result.data.user.negeri_id;
                }
                if(result.data.user.daerah_id)
                {
                  document.getElementById("daerah_drop_check").checked = true;
                  document.getElementById('daerah').disabled = false;
                }
                if(result.data.user.pajabat_id)
                {
                  document.getElementById("pejabat_drop_check").checked = true;
                  document.getElementById('pejabat').disabled = false;
                  document.getElementById("pejabat").value= result.data.user.pajabat_id;
                }
                document.getElementById("Kad_Pengenalan").value= result.data.user.no_ic;  
                document.getElementById("kategori").value=result.data.user.jenis_pengguna_id;     
                document.getElementById("user_id").value=user_id;  
                document.getElementById("updatecounter").value=parseInt(UpdateCounter) + 1;      
                
                if(result.data.user.jenis_pengguna_id==1)
                {
                    var kem_url= api_url+"api/lookup/kementerian-list-by-name";
                    loadKementerian(kem_url,"jps",result.data.user.kementerian_id,result.data.user.bahagian_id,result.data.user.jabatan_id);
                    document.getElementById("kementerian").disabled = true;

                    if(result.data.user.bahagian_id)
                    {
                      document.getElementById("bahagian_drop_check").checked = true;
                      document.getElementById('bahagian').disabled = false;
                    }

                    if(result.data.user.negeri_id){
                      loadDaerah(result.data.user.negeri_id,result.data.user.daerah_id);
                    }

                    $('#nonjps_doc').hide();
                    document.getElementById('Pengguna_JPS').checked = true;
                    document.getElementById('Agensi_Luar').checked = false;   
                    document.getElementById("jps_negeri").classList.remove('d-none');
                    document.getElementById("jabatan_agensy_drop").classList.add('d-none');
                    document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
                    document.getElementById("jabatan_jps_drop").classList.remove('d-none');
                }
                else
                {
                    var kem_url= api_url+"api/lookup/kementerian-list-with-id?id="+result.data.user.kementerian_id+"&jabatan="+result.data.user.jabatan_id;
                    loadKementerian(kem_url,"non-jps",result.data.user.kementerian_id,result.data.user.bahagian_id,result.data.user.jabatan_id);
                    document.getElementById("kementerian").disabled = false;

                    if(result.data.user.jabatan_id && result.data.user.bahagian_id)
                    {         
                      document.getElementById("jabatan_agensy_drop_check").checked = true;
                      document.getElementById('Jabatan').disabled = false;
                    }
                    else if(!result.data.user.jabatan_id && result.data.user.bahagian_id)
                    {
                      document.getElementById("bahagian_drop_check").checked = true;
                      document.getElementById('bahagian').disabled = false;
                    }
                    else
                    {
                      document.getElementById("jabatan_agensy_drop_check").checked = true;
                      document.getElementById('Jabatan').disabled = false;
                    }

                    $('#nonjps_doc').show();
                    document.getElementById('Pengguna_JPS').checked = false;
                    document.getElementById('Agensi_Luar').checked = true;
                    document.getElementById("jps_negeri").classList.add('d-none');
                    document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
                    document.getElementById("pejabat_agensy_drop").classList.add('d-none');
                    document.getElementById("jabatan_jps_drop").classList.add('d-none');
                }
                document.getElementById("Agensi_Luar").disabled = true;
                document.getElementById("Pengguna_JPS").disabled = true; 

                if(result.data.user.media[0]){

                if(result.data.user.media[0].collection_name=="document")
                  { 
                    document.getElementById('selected_file').classList.remove("d-none");
                    document.getElementById('selected_file').classList.add("d-flex");
                    var sample2=result.data.user.media[0].original_url; console.log(sample2);
                    var docu_url = sample2.substring(sample2.indexOf('storage')); console.log(docu_url);
                    //document.getElementById("document_url").href = api_url+docu_url;
                    document.getElementById("document_name").innerHTML = result.data.user.media[0].file_name;
                    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
                      fSize = result.data.user.media[0].size; i=0;while(fSize>900){fSize/=1024;i++;}
                      docu_size = (Math.round(fSize*100)/100)+' '+fSExt[i]; 
                    document.getElementById("document_size").innerHTML = docu_size;
                  }
                }

            }
            else {
                $("#Login_interface_modal").modal('hide');
                $("#reject_mode_sucess_modal").modal('show');
            }

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");

        }
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

});

function loadDaerah(negeri_id,daerah_id)
{
  var daerahdropDown =  document.getElementById("daerah");
      $("#daerah").empty();
      var el = document.createElement("option"); console.log(el)
         el.textContent = '--Pilih--';
         el.value = '';
         daerahdropDown.appendChild(el);

    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    const {
      host, hostname, href, origin, pathname, port, protocol, search
      } = window.location

      $.ajaxSetup({
        headers: {
            "Content-Type": "application/json",
            "Authorization": api_token,
            }
      });
      $.ajax({
         type: "GET",
         url: api_url+"api/lookup/daerah/list?id="+negeri_id,
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
                  if(daerah_id)
                  {
                    document.getElementById("daerah").value= daerah_id;
                  }
            }
            else {
                  $.Notification.error(result.Message);
            }
         }
      });
}

function loadKementerian(kem_url,type,kement_data,behajian_data,jabatan_id){

    var dropDown = document.getElementById("kementerian");
    var bahagiandropDown =  document.getElementById("bahagian");
    var JabatandropDown =  document.getElementById("Jabatan");
    var jabatan_bahagiandropDown =  document.getElementById("jabatan_bahagian");

    $("#kementerian").empty();
    $("#bahagian").empty();
    $("#Jabatan").empty();
    $("#jabatan_bahagian").empty();

        
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
      
      var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            JabatandropDown.appendChild(el);      
      
      var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            jabatan_bahagiandropDown.appendChild(el);
      
    }
    else
    {
      var el = document.createElement("option"); console.log(el)
            el.textContent = '--Pilih--';
            el.value = '';
            bahagiandropDown.appendChild(el);
    }
    const api_url = "{{env('API_URL')}}";  console.log(api_url);
    const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
    const {
      host, hostname, href, origin, pathname, port, protocol, search
      } = window.location

    $.ajaxSetup({
      headers: {
          "Content-Type": "application/json",
          "Authorization": api_token,
          }
    });
    $.ajax({
        type: "GET",
        url: kem_url,
        dataType: 'json',
        success: function (result) { console.log(result.data)
            if (result) {
              if(type=="non-jps")
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
                      if(kement_data){
                          document.getElementById("kementerian").value= kement_data;
                      }
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
                    if(!jabatan_id && behajian_data)
                    {
                      document.getElementById("bahagian").value= behajian_data;
                    }
                  }
                  if(result.data.jabatan)
                  {
                    $.each(result.data.jabatan, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_jabatan;
                        el.value = opt;
                        JabatandropDown.appendChild(el);    
                    });
                    if(jabatan_id)
                    {
                      document.getElementById("Jabatan").value= jabatan_id;
                    }  
                  }

                  if(result.data.jaba_bahagian)
                  {
                      $.each(result.data.jaba_bahagian, function (key, item) {
                        var opt = item.id;
                        var el = document.createElement("option");
                        el.textContent = item.nama_bahagian;
                        el.value = opt;
                        jabatan_bahagiandropDown.appendChild(el);    
                      });
                      if(jabatan_id && behajian_data)
                      {
                        document.getElementById("jabatan_bahagian").value= behajian_data;
                      }
                  }
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
                    if(behajian_data)
                    {
                      document.getElementById("bahagian").value= behajian_data;
                    }
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

</script>

    <script>
      $('#Pengguna_JPS').click(function(){ 
        $('#nonjps_doc').hide();
        document.getElementById("kategori").value=1;
       document.getElementById("jps_negeri").style.display = 'block';
      });

      $('#Agensi_Luar').click(function(){
        $('#nonjps_doc').show();
        document.getElementById("kategori").value=2;
        document.getElementById("jps_negeri").style.display = 'none';
      });

      // $('#exampleCheck1').click(function(){ console.log(this.value);
      //   const checkbox = document.getElementById('exampleCheck1'); console.log(checkbox);
      //   checkbox.checked = !checkbox.checked;
      //   document.querySelector('#submit_registration').disabled = false;
      // });

      function myChecboxFunction() {
        var checkBox = document.getElementById("exampleCheck1"); 
        if (checkBox.checked == true){
            document.querySelector('#submit_registration').disabled = false;
        } else {
            document.querySelector('#submit_registration').disabled = true;
        }
      }


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
			  document.getElementById("error_no_kod_penganalan").innerHTML="Medan no kad penganalan diperlukan"; 
			  document.getElementById("Kad_Pengenalan").focus();
			  return false; 
      }
      else if(isNaN(document.myform.no_kod_penganalan.value))
      {
        document.getElementById("error_no_kod_penganalan").innerHTML="Sila tambah nombor sahaja"; 
			  document.getElementById("no_kod_penganalan").focus();
			  return false;
      } 
      else if(document.myform.no_kod_penganalan.value.length<12) 
      {
        document.getElementById("error_no_kod_penganalan").innerHTML="Maksimum 12 digit diperlukan"; 
			  document.getElementById("no_kod_penganalan").focus();
			  return false;
		  }
      else 
      { document.getElementById("error_no_kod_penganalan").innerHTML=""; }

		if(!document.myform.email.value)  { 
			document.getElementById("error_email").innerHTML="Medan emel rasmi diperlukan"; 
			document.getElementById("Email_Rasmi").focus();
			return false; 
		}else{ document.getElementById("error_email").innerHTML="";}

    // if(IsEmail(document.myform.email.value)==false){
    //   document.getElementById("error_email").innerHTML="Format e-mel tidak sah"; 
		// 	document.getElementById("Email_Rasmi").focus();
		// 	return false;
    //   }
    //   else{
    //      document.getElementById("error_email").innerHTML="";
    //   }

      // let email = document.myform.email.value;
      // let getDomain =email.substr(email.length - 6);  console.log(getDomain)
      // if(getDomain!='gov.my')
      // {
      //    document.getElementById("error_email").innerHTML="Format e-mel tidak sah"; 
      //       document.getElementById("Email_Rasmi").focus();
      //       return false;
      // }
      // else
      // {
      //    document.getElementById("error_email").innerHTML="";
      // }

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
    }else{document.getElementById("error_telefon").innerHTML="";}

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
    // if(!document.myform.jabatan.value)  { 
		// 	document.getElementById("error_jabatan").innerHTML="Sila pilih jabatan"; 
		// 	document.getElementById("Jabatan").focus();
		// 	return false; 
		// }else{document.getElementById("error_jabatan").innerHTML="";}
    // if(!document.myform.bahagian.value)  { 
		// 	document.getElementById("error_bahagian").innerHTML="Sila pilih bahagian"; 
		// 	document.getElementById("bahagian").focus();
		// 	return false; 
		// }else{document.getElementById("error_bahagian").innerHTML="";}
    // if(!document.myform.negeri.value)  { 
		// 	document.getElementById("error_negeri").innerHTML="Sila pilih negeri"; 
		// 	document.getElementById("negeri").focus();
		// 	return false; 
		// }else{document.getElementById("error_negeri").innerHTML="";}
    //   if(!document.myform.daerah.value)  { 
		// 	document.getElementById("error_daerah").innerHTML="Sila pilih daerah"; 
		// 	document.getElementById("daerah").focus();
		// 	return false; 
		// }else{document.getElementById("error_daerah").innerHTML="";}

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
     var newText = document.getElementsByClassName('error'); console.log(newText.length);
     for($i=0;$i<newText.length;$i++)
      {
         console.log(newText[$i].innerHTML="");
      }
      console.log(document.myform.dockument.files);
      var formData = new FormData();
      formData.append('id', document.myform.user_id.value);
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
      formData.append('UpdateCounter', document.myform.updatecounter.value);
      formData.append('documents', document.myform.dockument.files[0]);

      console.log(formData);

      axios({
        method: "post",
        url: api_url+"api/temp/temp/user/update",
        data: formData,
        headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
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

    $('#close_button_nodata').click(function(){
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