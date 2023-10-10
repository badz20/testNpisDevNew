<div class="d-flex justify-content-between">
                    <div class="rmk_flow_Chart_content_negeri col-8">
                      <h5>BAHAGIAN</h5>
                    </div>
                    
                    <div class="rmk_flow_Chart_content_negeri">
                      <h5>pengarah/timb.pengarah bahagian</h5>
                    </div>
</div>
<div class="d-flex justify-content-between">
                    <div class="rmk_flow_Chart_content_negeri col-8">
                      <div class="box_content_negeri_bahagian">
                        <p class="indicatory" id="baha_penya_review">Dalam Penyediaan</p>
                        &nbsp;<img src="{{ asset('dashboard/assets/images/Arrow11.png') }}">&nbsp;
                        <p class="indicatory" id="baha_penyamak_review" class="yellow">Untuk Semakan Penyemak</p>
                        &nbsp;<img src="{{ asset('dashboard/assets/images/Arrow11.png') }}">&nbsp;
                        <p class="indicatory" id="baha_penya1_review" class="yellow">Untuk Semakan Penyemak 1</p>
                        &nbsp;<img src="{{ asset('dashboard/assets/images/Arrow11.png') }}">&nbsp;
                        <p class="indicatory" id="baha_penya2_review">Untuk Semakan Penyemak 2</p>
                      </div>
                    </div>
                    <div class="rmk_flow_Chart_content_negeri">
                      <div class="box_content_negeri bend">
                        <p class="indicatory" id="baha_pengesah_review">Untuk Pengesahan</p>
                      </div>
                    </div>
</div>
<div class="d-flex justify-content-between mt-5">
                    <div class="rmk_flow_Chart_content_negeri ml-auto">
                      <h5 class="py-2">BKOR</h5>
                    </div>
</div>
<div class="d-flex justify-content-end">
                    <div class="rmk_flow_Chart_content_negeri">
                      <h4>Lulus</h4>
                      <h4 class="mt-2">Tolak</h4>
                    </div>
                    <div class="rmk_flow_Chart_content_negeri">
                      <div class="box_content_negeri end"><p class="indicatory" id="baha_bkor_review">Untuk Perakuan</p></div>
                    </div>
</div>
<?php
$currentURL = url()->current();
preg_match("/[^\/]+$/", "$currentURL", $matches);
$last_word = $matches[0];

if($enable_approve==1){
?>
<form>
  <div class="d-flex " style="padding: 7px; border-radius: 9px;color: red; vertical-align: middle;">
    <input style="height: auto; width: 20px;" class="chk_semakan" type="checkbox" id="klik_semakan" data-toggle="modal" data-target="#Make_sure_application_modal">
    <div class="mt-2">
    <label style="1rem; font-weight: 600; " class="d-flex chk_semakan_label" for="klik_semakan">&nbsp; Klik untuk membuat semakan permohonan</label>
    </div>
  </div>
</form>
<?php
}
?>