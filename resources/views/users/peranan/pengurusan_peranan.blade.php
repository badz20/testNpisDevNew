<style>
  /* 2023 March 10 by Nabilah */

  /*start add-selenggara-pengurusan-peranan page */
  .Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header {
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    font-family: Poppins_Regular;
    padding: 6% 3.8% 3% 3.8%;
  }
.error {
    color: red;
}
button.TutupBtn {
    margin: 2% 0 3% 0;
    background-color: #5b64c3;
    color: #fff;
    border: none;
    border-radius: 0.22rem;
    font-size: 0.8rem;
    padding: 0.6rem 1rem;
}
</style>
@extends('layouts.main.master_responsive')
   @section('content_main')
   <?php header('Access-Control-Allow-Origin: *'); ?>
    <div class="Mainbody_conatiner user_profile ml-auto" style="width: 100% !important">
        <!-- HEADER Section starts -->
          <div class="Mainbody_content mtop">
            <div class="Mainbody_content_nav_header project_register row">
              <div class="col-md-5 col-xs-12">
                <h4>Pengurusan Peranan Pengguna</h4>
              </div>
              <div class="col-md-7 col-xs-12 path_nav_col">
                <ul class="path_nav row">
                  <li>
                    <a href="/home"  style="display: flex; align-items: center;">
                      <i class="ri-user-3-fill ri-xl icon_blue mr-1"></i>
                      Pentadbir
                      <img
                        class="arrow_nav ml-2"
                        src="{{ asset('images/arroew.png') }}"
                        alt="arroew"
                      />
                    </a>
                  </li>  
                  {{-- <li>
                    <a href="#">
                      Pentadbir
                      <img
                        class="arrow_nav"
                        src="{{ asset('images/arroew.png') }}"
                        alt="arroew"
                    /></a>
                  </li> --}}
                  {{-- <li>
                    <a href="#">
                      Pengesahan Pengguna Baharu
                      <img
                        class="arrow_nav"
                        src="{{ asset('images/arroew.png') }}"
                        alt="arroew"
                    /></a>
                  </li> --}}
                  <li><a href="/add-selenggara-pengurusan-peranan" class="active text-secondary"> Pengurusan Peranan Pengguna</a></li>
                </ul>
              </div>
            </div>

            <div class="userlist_container">
              <div class="userlist_content">
                <form action="">
                  <div class="userlist_content_header row">
                    <div class="col-md-3 col-xs-10 userlist_content_header_left d-flex ">
                      <div class="icon_yellow_bg">
                      <span class="iconify icon_header_pentadbir" data-icon="mdi-account-cowboy-hat" style="font-size
                        : 2em;"></span>
                      </div>
                      <h3>PERANAN</h3>
                    </div>
                    <div class="col-md-8 col-xs-2 userlist_content_header_right d-flex">
                      <button 
                      class="peranan-btn" 
                      style="background-color: #39AFD1;border: none; height: 39px; width: 55px; display: flex; align-items: center;">
                        <i class="ri-printer-fill icon_white ri-2x"></i>
                      </button>
                    </div>
                  </div>
                </form>
                <form id="profile_view_form" name="myform">
                  <div class="userlist_tab_content_container">
                    <div class="userlist_tab_content">
                      <div class="userlist_tab_contents_holder">
                        <div class="row m-1">
                          <div class="col-md-6 col-12">
                            <div class="row py-1">
                              <label for="" class="col-md-3 col-xs-12 col-form-label">Nama Peranan</label>
                              <div class="col-md-8 col-xs-12">
                                <input type="text" class="form-control inNamaperanan" id="nama_peranan" name="nama_peranan" placeholder="" value="">
                                <span class="error" id="error_nama_peranan"></span>
                              </div>
                            </div>
                            <div class="row pt-2 pb-1">
                              <label for="" class="col-md-3 col-xs-12 col-form-label bolded"><b>Modul</b></label>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label class="col-md-9 col-7 col-form-label" for="Kad_Pengenalan">Permohonan Projek</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary accordion-button collapsed tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#permohonanprojek" type="button"  aria-expanded="false" aria-controls="flush-collapseOne">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label">Pemantauan dan Penilaian Projek JPS</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#pemantauan" type="button" aria-expanded="false" aria-controls="flush-collapseOne">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label" for="Kad_Pengenalan">Pemantauan dan Penilaian Projek Jabatan Bukan Teknik</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#pemantauan2" type="button" aria-expanded="false" aria-controls="flush-collapseOne">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label">Kontrak</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#kontrak" type="button">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label">Perunding</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#perunding" type="button">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label">Value Management</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#valuemanagement" type="button">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label">Notice of Change</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#notice" type="button">Tetapan Akses</button>
                              </div>
                            </div>
                            <hr class="col-12" style="margin-left:-18px; ">
                            <div class="row py-1">
                              <label for="" class="col-md-9 col-7 col-form-label">Peruntukan Permohonan di Luar Rolling Plan</label>
                              <div class="col-md-3 col-3">
                                <button type="button" class="btn btn-secondary accordion-button tetapan_aksesBtn" data-bs-toggle="collapse" data-bs-target="#PeruntukanPermohonandiLuarRollingPlan" type="button">Tetapan Akses</button>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6 col-12">
                            <hr class="col-12 content_divider" style="margin-left:-18px;">
                            <div class="row ">
                              <div class="col-md-2 col-3">
                                <label for="" class="col-form-label">Projek</label>
                              </div>
                              <div class="col-md-8 col-3 ml-3 mt-1">
                                <input class="form-check-input" type="checkbox" style="vertical-align:middle;" id="myCheck" onclick="myFunction()" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1" style=" vertical-align:middle;"></label>
                              </div>
                            </div>
                            
                            <div class="row pt-2 pb-1" id="text" style="display:none;">
                              <label for="" class="col-md-3 col-xs-12 col-form-label">Kod Projek</label>
                              <div class="col-md-8 col-xs-12 d-flex">
                                <input type="text" class="form-control" id="" name="" placeholder="" style="width: 350px;" value="">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal1" style="height: 33.19px; width:120px; display: flex; align-items: center; font-size:0.8rem;" class="btn btn-success ml-2"><i class="ri-add-circle-fill icon_white ri-2x"></i> Projek</button>
                              </div>
                            </div>

                            <div class="col-12 mt-3" style="float:right ;">
                              <div class="table-responsive">
                                <table class="table">
                                  <tbody id="tbody">
                                    
                                  </tbody>
                                </table>
                              </div>
                              <div class="peranan_card collapse " id="pilihmodul" style="margin-top:-10px;">
                                <div class="row">
                                  <label class="col-md-9 col-8">Pemantauan dan Penilaian Projek JPS</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1"  style="float:right ;font-size: 12px;" data-bs-toggle="collapse" data-bs-target="#pemantauan" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <label class="col-md-9 col-8">Pemantauan dan Penilaian Projek Jabatan Bukan Teknik</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1" style="float:right ;font-size: 12px;"data-bs-toggle="collapse" data-bs-target="#pemantauan2" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <label class="col-md-9 col-8">Kontrak</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1" style="float:right ;font-size: 12px;"data-bs-toggle="collapse" data-bs-target="#kontrak" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <label class="col-md-9 col-8">Perunding</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1" style="float:right ;font-size: 12px;"data-bs-toggle="collapse" data-bs-target="#" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <label class="col-md-9 col-8">Value Management</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1" style="float:right ;font-size: 12px;"data-bs-toggle="collapse" data-bs-target="#" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <label class="col-md-9 col-8">Notice of Change</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1" style="float:right ;font-size: 12px;"data-bs-toggle="collapse" data-bs-target="#" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <label class="col-md-9 col-8">Peruntukan Permohonan di Luar Rolling Plan</label>
                                  <div class="col-md-3 col-3">
                                    <button type="button" class="btn btn-secondary mb-1" style="float:right ;font-size: 12px;"data-bs-toggle="collapse" data-bs-target="#peruntukan" type="button">Tetapan Akses</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="accordion accordion-flush col-12 mt-5" id="accordionFlushExample">
                            <div class="accordion-item">
                              <div id="permohonanprojek" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><code></code></div>
                                <div class="card">
                                  <div class="table_scroll peranan_table">
                                    <table>
                                      <thead>
                                        <tr>
                                            <th class="card-header text-white bg-secondary" colspan="3">
                                              <i class="fa fa-plus-circle"></i>  Tetapan Akses Modul: Permohonan Projek
                                            </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="col-4"><label for="">Penyedia</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="permohan" name="peranan1" value="option1" style="width:20px; height: 20px;">
                                            <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                            <p>Dapat mencipta permohonan projek</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label  for="">Penyemak</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="permohan" name="peranan2" value="option2" style="width:20px; height: 20px;"> 
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                            <p>Dapat menyemak/kemaskini permohonan peringkat daerah (dapat menolak atau menghantar permohonan untuk semakan penyemak)</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">
                                            <label  for="">
                                              Penyemak 1
                                            </label>
                                          </td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="permohan" name="peranan3" value="option3" style="width:20px; height: 20px;"> 
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                            <p>Dapat menyemak/kemaskini permohonan peringkat daerah (dapat menolak atau menghantar permohonan untuk semakan penyemak 2)</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">
                                            <label  for="">
                                              Penyemak 2
                                            </label>
                                          </td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="permohan" name="peranan4" value="option4" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                            <p>Dapat menyemak/kemaskini permohonan yang diluluskan oleh penyemak (dapat menolak dan menghantar permohonan untuk semakan di peringkat pengesahan)</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">
                                            <label  for="">
                                              Pengesah
                                            </label>
                                          </td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="permohan" name="peranan5" value="option5" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                            Dapat mengesahkan/menolak permohonan yang telah disemak oleh Penyemak 2
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>   
                              </div>
                            </div>   
                            <div class="accordion-item">
                              <div id="pemantauan" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><code></code></div>
                                <div class="card">
                                  <div class="table_scroll peranan_table">
                                    <table>
                                      <thead>
                                        <tr>
                                            <th class="card-header text-white bg-secondary" colspan="3">
                                              <i class="fa fa-plus-circle"></i>  Tetapan Akses Modul: Pemantauan dan Penilaian Projek JPS
                                            </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="col-4"><label for="">Viewer</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label for="">Negeri Updater</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;"> 
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label for="">Bahagian Updater</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>     
                            </div>
                            </div>   
                            <div class="accordion-item">
                              <div id="pemantauan2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><code></code></div>
                                <div class="card">
                                  <div class="table_scroll peranan_table">
                                    <table>
                                      <thead>
                                        <tr>
                                            <th class="card-header text-white bg-secondary" colspan="3">
                                              <i class="fa fa-plus-circle"></i>  Tetapan Akses Modul: Pemantauan dan Penilaian Projek Jabatan Bukan Teknik
                                            </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="col-4"><label for="">Viewer</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label for="">Negeri Updater</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;"> 
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label for="">Bahagian Updater</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>     
                            </div>
                            </div>   
                            <div class="accordion-item">
                              <div id="kontrak" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><code></code></div>
                                <div class="card">
                                  <div class="table_scroll peranan_table">
                                    <table>
                                      <thead>
                                        <tr>
                                            <th class="card-header text-white bg-secondary" colspan="3">
                                              <i class="fa fa-plus-circle"></i>  Tetapan Akses Modul: Kontrak
                                            </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="col-4"><label for="">Viewer</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label for="">Negeri Updater</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;"> 
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-4"><label for="">Bahagian Updater</label></td>
                                          <td class="col-2">
                                            <div class="form-check form-check-inline col-2">
                                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="width:20px; height: 20px;">
                                              <label class="form-check-label" for="inlineCheckbox1"></label>
                                            </div>
                                          </td>
                                          <td class="col-5">
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>     
                              </div>
                            </div>   
                          </div>

                          <div class="modal fade col-12" style="background-color:rgba(0, 0, 0, 0.2);" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header display: flex; align-items: center;" style="background-color:cornflowerblue; ">
                                  <h6 class="modal-title text-white" id="exampleModalLabel" style="vertical-align: middle"><i class="ri-add-circle-fill icon_white ri-1x " style="vertical-align: middle"></i> Projek</h6>
                                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                  </div>
                                  <div class="modal-body" >
                                      <input class="col-12 text-center no-outline" style="border:none; border-bottom: 1px solid; " placeholder="Masukkan Kod Projek" type="text"><br><br>
                                      <button type="button" class="btn btn-primary col-2 " style="float: right; background-color: #5b63c3; border:none; font-size: 0.7rem;">Cari</button><br><br>
                                      <p>Hasil Carian Kod Projek</p>
                                      <table class="table col-12">
                                          <thead style="background-color:cornflowerblue;">
                                            <tr>
                                              <th class="col-6 text-white" style="font-size: 0.8rem;" scope="col">Kod Projek</th>
                                              <th class="col-6 text-white" style="font-size: 0.8rem;" scope="col">Nama Projek</th>
                                              <th class="col-6" scope="col"></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr style="font-size: 0.8rem;">
                                              <td>P33012341951</td>
                                              <td><a href="#">Projek Korek Sungai</a></td>
                                              <td><button  id="addBtn" type="button" class="btn btn-warning" style="float: right; font-size: 0.7rem; width: 60px;">Pilih</button></td>
                                            </tr>

                                        </table>
                                  </div>
                                  <div class="modal-footer">
                                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                  <button type="button" class="btn btn-primary">Save changes</button> -->
                                  </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>

                  <br>

                  <div class="input_container_row"></div>
                  <div class="text-center">
                    <button type="button" style="margin-top: -30px;" class="btnSimpan_peranan mb-4 mt-1" id="simpan" >Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>

    </div>
    <section>
      <div class="add_role_sucess_modal_container">
        <div
          class="modal fade"
          id="add_role_sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered add_role_sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content add_role_sucess_modal_content">
              <div class="modal-body add_role_sucess_modal_body">
                <div class="add_role_sucess_modal_header text-end">
                  <button class="ml-auto" data-dismiss="modal">
                    <i class="mdi mdi-window-close icon_white"></i>
                  </button>
                </div>
                <div class="add_role_sucess_modal_body_Content" id="user_pop-up">
                  <h3>Peranan telah dikemaskini</h3>
                  <div class="text-center">
                    <button data-dismiss="modal" class="TutupBtn">Tutup</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('scripts')
  @include('users.peranan.peranan-scripts')
@endsection

