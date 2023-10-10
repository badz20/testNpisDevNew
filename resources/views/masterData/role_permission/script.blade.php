<script type="text/javascript">

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
 
  $(document).ready(function(){

      var api_token = "Bearer "+ window.localStorage.getItem('token');
      var id=$(".fetch_id").val();
      var role = decodeURI(window.location.pathname.split("/").pop())
      axios.defaults.headers.common["Authorization"] = api_token
      $("div.spanner").addClass("show");
      $("div.overlay").addClass("show");
      axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/lookup/getMasterLinks",
            responseType: 'json',  
            params: {
              role: role
            }          
        })
        .then(function (response) { 
            data = response.data.data.moduleLinks; console.log(response.data.data)
            permissions = response.data.data.permissions;
            for(let $i=0;$i<data.length;$i++)
            {
              if(data[$i]['module_id']==1)
              {
                createPentadbir(data[$i],permissions);
              }
              if(data[$i]['module_id']==2)
              {
                createPermohonan(data[$i],permissions);
              }
              if(data[$i]['module_id']==6)
              {
                createVM(data[$i],permissions);
              }
            }

            if(permissions.includes('pentadbir_full_access')) {
              let tempcheckBox = document.getElementById("pentadbir");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('permohon_full_access')) {
              let tempcheckBox = document.getElementById("permohon");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('permantuan_full_access')) {
              let tempcheckBox = document.getElementById("permantuan");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('kontrak_full_access')) {
              let tempcheckBox = document.getElementById("kontrak");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('peruding_full_access')) {
              let tempcheckBox = document.getElementById("peruding");
              tempcheckBox.checked = true;
            }

            if(permissions.includes('vm_full_access')) {
              let tempcheckBox = document.getElementById("vm");
              tempcheckBox.checked = true;
            }

            // get all checkbox elements on the page
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            //assigning existing permissions to the role
            for (let i = 0; i < checkboxes.length; i++) {
              
              if(permissions.includes(checkboxes[i].value)) {
                checkboxes[i].checked = true;
              }
            }


            const pentadbir_checkbox = document.querySelector('#Permissionpentadbir'); 
            const permohon_checkbox = document.querySelector('#permohon');
            const permantuan_checkbox = document.querySelector('#permantuan');
            const kontrak_checkbox = document.querySelector('#kontrak');
            const peruding_checkbox = document.querySelector('#peruding');
            const vm_checkbox = document.querySelector('#vm');

            pentadbir_checkbox.addEventListener('click', function() {
              const pentadbir_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="Permissionpentadbir_"]'); 
              if (this.checked) { 
                pentadbir_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else { 
                pentadbir_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            permohon_checkbox.addEventListener('click', function() {
              const permohon_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="permohon_"]');
              
              if (this.checked) {
                permohon_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                permohon_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            permantuan_checkbox.addEventListener('click', function() {
              const permantuan_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="permantuan_"]');
              
              if (this.checked) {
                permantuan_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                permantuan_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            kontrak_checkbox.addEventListener('click', function() {
              const kontrak_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="kontrak_"]');
              
              if (this.checked) {
                kontrak_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                kontrak_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            peruding_checkbox.addEventListener('click', function() {
              const peruding_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="peruding_"]');
              
              if (this.checked) {
                peruding_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                peruding_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            vm_checkbox.addEventListener('click', function() {
              const vm_checkboxes = document.querySelectorAll('input[type="checkbox"][id^="vm_"]');
              
              if (this.checked) {
                vm_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = true;
                });
              } else {  
                vm_checkboxes.forEach(function(checkbox) {
                  checkbox.checked = false;
                });
              }
            });

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })
        .catch(function (error) {
          $("div.spanner").removeClass("show");
          $("div.overlay").removeClass("show");
        })



  });

  function createPentadbir(data,permissions)
  { 
    let table = document.getElementById("pentadbir_row"); 
    //var row = table.insertRow(0);
    let row = table.insertRow(table.rows.length - 1);
    let cell0 = row.insertCell(0);
    let cell1 = row.insertCell(1);
    let cell2 = row.insertCell(2);
    let cell3 = row.insertCell(3);

    cell0.innerHTML = data.link_name;
    cell0.className="td";
    cell1.innerHTML = '<input class="check" type="checkbox" id="Permissionpentadbir_'+data.id+'" name="pentadbir_'+data.link_name+'_full" value="pentadbir_'+data.link_name+'_full">';
    cell2.innerHTML = '<input class="check" type="checkbox" id="Permissionpentadbir_'+data.id+'" name="pentadbir_'+data.link_name+'_view" value="pentadbir_'+data.link_name+'_view">';
    cell3.innerHTML = '<input class="check" type="checkbox" id="Permissionpentadbir_'+data.id+'" name="pentadbir_'+data.link_name+'_edit" value="pentadbir_'+data.link_name+'_edit">';
  }

  function createPermohonan(data,permissions)
  {
    let table = document.getElementById("permohonan_row");
    //var row = table.insertRow(0);
    let row = table.insertRow(table.rows.length - 1);
    let cell0 = row.insertCell(0);
    cell0.className="td";
    let cell1 = row.insertCell(1);
    let cell2 = row.insertCell(2);
    let cell3 = row.insertCell(3);

    cell0.innerHTML = data.link_name;
    cell1.innerHTML = '<input class="check" type="checkbox" id="permohon_'+data.id+'" name="permohon_'+data.link_name+'_full" value="permohon_'+data.link_name+'_full">';
    cell2.innerHTML = '<input class="check" type="checkbox" id="permohon_'+data.id+'" name="permohon_'+data.link_name+'_view" value="permohon_'+data.link_name+'_view">';
    cell3.innerHTML = '<input class="check" type="checkbox" id="permohon_'+data.id+'" name="permohon_'+data.link_name+'_edit" value="permohon_'+data.link_name+'_edit">';
  }

  function createVM(data,permissions)
  {
    let table = document.getElementById("vm_row"); 
    //var row = table.insertRow(0);
    let row = table.insertRow(table.rows.length - 1);
    let cell0 = row.insertCell(0);
    cell0.className="td";
    let cell1 = row.insertCell(1);
    let cell2 = row.insertCell(2);
    let cell3 = row.insertCell(3);

    cell0.innerHTML = data.link_name;
    cell1.innerHTML = '<input class="check" type="checkbox" id="vm_'+data.link_name+'_full" name="vm_'+data.link_name+'_full" value="vm_'+data.link_name+'_full">';
    cell2.innerHTML = '<input class="check" type="checkbox" id="vm_'+data.link_name+'_view" name="vm_'+data.link_name+'_view" value="vm_'+data.link_name+'_view">';
    cell3.innerHTML = '<input class="check" type="checkbox" id="vm_'+data.link_name+'_edit" name="vm_'+data.link_name+'_edit" value="vm_'+data.link_name+'_edit">';
  }

  $('#vmPermissionSaveBtn').click(function(){
    
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");

    role = decodeURI(window.location.pathname.split("/").pop())
    // console.log(role);
    var formEl = document.forms.permissionForm;
    var formData = new FormData(formEl);
    
     formData.append('role', role);
     const api_url = "{{ env('API_URL') }}"
     axios.defaults.headers.common["Authorization"] = "Bearer "+ window.localStorage.getItem('token');
      axios({
            method: 'post',
            url: api_url+"api/role/permissions",
            responseType: 'json',
            data: formData
            })
            .then(function (response) { 
              if(response.data.code == 200) {   
                $("#add_role_sucess_modal").modal('show');
                $("#tutup").click(function(){
                  location.reload()
                })

                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                
              }else {
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
                alert('error while saving permissions')
              }
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