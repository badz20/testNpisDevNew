<div class="d-flex justify-content-between">
                <div class="rmk_flow_Chart_content">
                    <h5>Daerah</h5>
                </div>
                <div class="rmk_flow_Chart_content">
                    <h5>negeri</h5>
                </div>
                <div class="rmk_flow_Chart_content">
                    <h5>bahagian</h5>
                </div>
                <div class="rmk_flow_Chart_content">
                    <h5>pengarah/timb.pengarah bahagian</h5>
                </div>
</div>
<div class="d-flex justify-content-between">
                <div class="rmk_flow_Chart_content">
                    <div class="box_content">
                    <p class="indicatory" id="daerah_penya_review">Dalam Penyediaan</p>
                    </div>
                </div>
                <div class="rmk_flow_Chart_content">
                    <div class="box_content">
                    <p class="indicatory" id="daerah_penyamak_review">Untuk Semakan Penyemak</p>
                    &nbsp;&nbsp;&nbsp;
                    <p class="indicatory" id="daerah_penya1_review">Untuk Semakan Penyemak 1</p>
                    </div>
                </div>
                <div class="rmk_flow_Chart_content">
                    <div class="box_content">
                    <p class="indicatory" id="daerah_penya2_review">Untuk Semakan Penyemak 2</p>
                    </div>
                </div>
                <div class="rmk_flow_Chart_content">
                    <div class="box_content bend">
                    <p class="indicatory" id="daerah_pengesah_review">Untuk Pengesahan</p>
                    </div>
                </div>
</div>
<div class="d-flex justify-content-between mt-5">
                <div class="rmk_flow_Chart_content ml-auto">
                    <h5 class="py-2">BKOR</h5>
                </div>
</div>
<div class="d-flex justify-content-end">
                <div class="rmk_flow_Chart_content">
                    <h4>Lulus</h4>
                    <h4 class="mt-2">Tolak</h4>
                </div>
                <div class="rmk_flow_Chart_content">
                    <div class="box_content end"><p class="indicatory" id="daerah_bkor_review">Untuk Perakuan</p></div>
                </div>
</div>
<?php
$currentURL = url()->current();
preg_match("/[^\/]+$/", "$currentURL", $matches);
$last_word = $matches[0];
if($enable_approve==1){
?>
<form>
    <div class="d-flex align-content-center" style="padding: 7px;border-radius: 9px;color: red;">
        <input style="height: auto;width: 20px;" class="chk_semakan" type="checkbox" id="klik_semakan" data-toggle="modal" data-target="#Make_sure_application_modal">
        <div class="mt-2">
    <label style="1rem; font-weight: 600; " class="d-flex chk_semakan_label" for="klik_semakan">&nbsp; Klik untuk membuat semakan permohonan</label>
    </div>
      </div>
</form>
<?php
}
?>