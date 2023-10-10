<div class="d-flex justify-content-between">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <h5>negeri</h5>
  </div>
</div>
<div class="d-flex justify-content-between">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <div class="box_content bend">
      <p class="indicatory yellow" id="negeri_penya_review">Dalam Penyediaan</p>
      &nbsp;&nbsp;&nbsp;
      <p class="indicatory" id="negeri_penyamak_review">Untuk Semakan Penyemak</p>
      &nbsp;&nbsp;&nbsp;
      <p class="indicatory" id="negeri_penya1_review">Untuk Semakan Penyemak 1</p>
    </div>
  </div>
</div>
<div class="d-flex justify-content-between mt-5">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <h5>Bahagian</h5>
  </div>
</div>
<div class="d-flex justify-content-between">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <div class="box_content bend">
      <p class="indicatory" id="daerah_penya2_view">Untuk Semakan Penyemak 2</p>
    </div>
  </div>
</div>
<div class="d-flex justify-content-between mt-5">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <h5>pengarah/timb.pengarah bahagian</h5>
  </div>
</div>
<div class="d-flex justify-content-between">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <div class="box_content bend">
      <p class="indicatory" id="daerah_pengesah_view">Untuk Pengesahan</p>
    </div>
  </div>
</div>
<div class="d-flex justify-content-between mt-5">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <h5 class="py-2">BKOR</h5>
  </div>
</div>
<div class="d-flex justify-content-end mt-2">
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <h4>Lulus</h4>
    <h4 class="mt-2">Tolak</h4>
  </div>
  <div class="rmk_flow_Chart_content" style="width: 100%;">
    <div class="box_content end"><p class="indicatory" id="daerah_bkor_view">Untuk Perakuan</p></div>
  </div>
</div>
<?php
$currentURL = url()->current();
preg_match("/[^\/]+$/", "$currentURL", $matches);
$last_word = $matches[0];
// var_dump($last_word);
if($enable_approve==1){
?>
<form>
  <div class="d-flex align-content-center" style="padding: 7px;border-radius: 9px;color: red;">
    <input style="height: 30px;width: 20px;" class="chk_semakan" type="checkbox" id="klik_semakan" data-toggle="modal" data-target="#Make_sure_application_modal">
    <div class="mt-2">
    <label style="1rem; font-weight: 600; " class="d-flex chk_semakan_label" for="klik_semakan">&nbsp; Klik untuk membuat semakan permohonan</label>
    </div>
  </div>
</form>
<?php
}
?>

