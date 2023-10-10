
@include('Vae.style')
    
    @extends('layouts.main.master')
    
    @section('content_main')
    
    <!-- Mainbody_conatiner Starts -->
    <div class="Mainbody_conatiner ml-auto">
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header project_register d-flex">
            <h4>Daftar Permohonan Projek Baharu</h4>
            <ul class="path_nav">
              <li>
                <a href="#" class="text-info" style="display: flex; align-items: center;">
                  <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-briefcase-variant"></span>
                  Permohonan Projek
                  <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
                </a>
              </li>
              <li>
                <a href="#" class="active"> Daftar Projek </a>
              </li>
            </ul>
          </div>

          <div class="project_register_tab_container">
            <div class="project_register_tab_btn_container">
                <ul>
                  <li class="success active">
                    <div class="tab_image">
                      <a href="Daftar-Permohonan-Projek"><img src="assets/images/BRIF PROJEK.png" alt="" /></a>
                    </div>
                    <h4>BRIF PROJEK</h4>
                  </li>
                  <li class="active success">
                    <div class="tab_image">
                      <a href="RMK-OBB-SDG"><img src="assets/images/RMK-OBB-SDG.png" alt="" /></a>
                    </div>
                    <h4>
                      RMK, <br />
                      OBB & SDG
                    </h4>
                  </li>
                  <li class="active success">
                    <div class="tab_image">
                      <a href="output"><img src="assets/images/OUTPUT-OUTCOME.png" alt="" /></a>
                    </div>
                    <h4>
                      output, <br />
                      outcome
                    </h4>
                  </li>
                  <li class="active success">
                    <div class="tab_image">
                      <a href="kewangan"><img src="assets/images/KEWANGAN.png" alt="" /></a>
                    </div>
                    <h4>Kewangan</h4>
                  </li>
                  <li class="active success">
                    <div class="tab_image">
                      <a href="negeri-lokasi"> <img src="assets/images/NEGERI-LOKASI-TAPAK.png" alt="" /></a>
                    </div>
                    <h4>
                      Negeri Lokasi<br />
                      & tapak
                    </h4>
                  </li>
                  <li class="active success">
                    <div class="tab_image">
                      <a href="Creativity"><img src="assets/images/CREATIVITY INDEX-1.png" alt="" /></a>
                    </div>
                    <h4>
                      creativity <br />
                      Index
                    </h4>
                  </li>
                  <li class="active">
                    <div class="tab_image">
                      <a href="VAE"><img src="assets/images/VALUE AT ENTRY.png" alt="" /></a>
                    </div>
                    <h4>
                      Value at<br />
                      Entry
                    </h4>
                  </li>
                  <li class="">
                    <div class="tab_image">
                      <a href="dokumen"><img src="assets/images/DOKUMEN LAMPIRAN.png" alt="" /></a>
                    </div>
                    <h4>
                      Dokumen <br />
                      Lampiran
                    </h4>
                  </li>
                  <li class="">
                    <div class="tab_image">
                      <a href="ringkasan-permohonan"><img src="assets/images/document.png" alt="" /></a>
                    </div>
                    <h4>
                      Ringkasan <br />
                      Permohonan
                    </h4>
                  </li>
                  <li class="">
                    <div class="tab_image">
                      <a href="perakuan"><img src="assets/images/PERAKUAN.png" alt="" /></a>
                    </div>
                    <h4>Perakuan</h4>
                  </li>
                </ul>
              </div>
            <div class="project_register_tab_content_container VAE-page">
              <div class="rmk_flow_Chart">
                <div class="rmk_flow_Chart_container">
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
                        <p class="yellow">Dalam Penyediaan</p>
                      </div>
                    </div>
                    <div class="rmk_flow_Chart_content">
                      <div class="box_content">
                        <p>Untuk Semakan Penyemak 1</p>
                      </div>
                    </div>
                    <div class="rmk_flow_Chart_content">
                      <div class="box_content">
                        <p>Untuk Semakan Penyemak 2</p>
                      </div>
                    </div>
                    <div class="rmk_flow_Chart_content">
                      <div class="box_content bend">
                        <p>Untuk Pengesahan</p>
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
                      <div class="box_content end"><p>Untuk Perakuan</p></div>
                    </div>
                  </div>
                </div>
              </div>
              <input type="hidden" class="fetch_id" name="fetch_id" value="1">
              <input type="hidden" class="update_id" name="update_id" value="0">
              <form>
                <input type="hidden" class="Permohonan_Projek_id" name="Permohonan_Projek_id" value="1">
                <div class="brief_project_container rmk">
                  <p class="VAE-topic">Value At Entry <span>(VAE)</span></p>
                  <div class="acquistion-topic">
                    <p class="acquistion-topic-p">
                      Acquisition Categorization (ACAT)
                    </p>
                    <p class="acquistion-topic-small-p">
                      *Medan VAE Perlu dilaksanakan oleh pegawai Kanan di JPS
                      Negeri/Bahagian
                    </p>
                  </div>
                  <div class="nama-container">
                    <label for="nama">Nama Projek</label>
                    <input
                      type="text"
                      id="nama"
                      class="form-control"
                      placeholder="PROJEK PENGAWALAN HAKISAN PANTAI DI PANTAI SEKAKAP, MERSING JOHOR"
                    />
                    <label for="Kementerian">Kementerian</label>
                    <input
                      type="text"
                      id="Kementerian"
                      class="form-control"
                      placeholder="PROJEK PENGAWALAN HAKISAN PANTAI DI PANTAI SEKAKAP, MERSING JOHOR"
                    />
                    <div class="row">
                      <div class="col-6">
                        <label for="Bahagian">Bahagian</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Bahagian"
                          placeholder="Bahagian Pengurusan banjir"
                        />
                      </div>
                      <div class="col-6">
                        <label for="Tarikh">Tarikh disediakan</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Tarikh"
                          placeholder="12 September 2002"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="calculator-container">
                    <p class="calc-topic">Calculator (ACAT)</p>
                    <table class="table table-bordered calc-table">
                      <thead>
                        <tr>
                          <th class="image-th"></th>
                          <th>Attribute</th>
                          <th class="level">Very High</th>
                          <th class="level">High</th>
                          <th class="level">Medium</th>
                          <th class="level">Low</th>
                          <th class="level">Very Low</th>
                          <th class="level">Row Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row" class="image-td">
                            <img
                              src="assets/images/acquisition-cost.png"
                              alt=""
                            />
                          </td>
                          <td class="attribute-td">
                            <p>Acquisition Cost</p>
                            <img src="assets/images/i-icon.png" alt="" />
                          </td>
                          <td><button class="acquisition_cost acquisition_cost1" onclick="acquisition_cost(this)" value="10" type="button"></button></td>
                          <td><button class="acquisition_cost acquisition_cost2" onclick="acquisition_cost(this)" value="9" type="button"></button></td>
                          <td><button class="acquisition_cost acquisition_cost3" onclick="acquisition_cost(this)" value="7" type="button"></button></td>
                          <td><button class="acquisition_cost acquisition_cost4" onclick="acquisition_cost(this)"  value="3" type="button"></button></td>
                          <td><button class="acquisition_cost acquisition_cost5" onclick="acquisition_cost(this)" value="1" type="button"></button></td>
                          <td><button class="acquisition_row_score" value="" type="button"></button></td>
                        </tr>
                        <tr>
                          <td scope="row" class="image-td">
                            <img
                              src="assets/images/project-management.png"
                              alt=""
                            />
                          </td>
                          <td class="attribute-td">
                            <p>Project Management</p>
                            <img src="assets/images/i-icon.png" alt="" />
                          </td>
                          <td><button class="project_management project_management1" onclick="project_management(this)" value="10" type="button"></button></td>
                          <td><button class="project_management project_management2" onclick="project_management(this)" value="9" type="button"></button></td>
                          <td><button class="project_management project_management3" onclick="project_management(this)" value="7" type="button"></button></td>
                          <td><button class="project_management project_management4" onclick="project_management(this)" value="3" type="button"></button></td>
                          <td><button class="project_management project_management5" onclick="project_management(this)" value="1" type="button"></button></td>
                          <td><button class="project_management_row_score" value="" type="button"></button></td>
                          
                        </tr>
                        <tr>
                          <td scope="row" class="image-td">
                            <img src="assets/images/schedule.png" alt="" />
                          </td>
                          <td class="attribute-td">
                            <p>Schedule</p>
                            <img src="assets/images/i-icon.png" alt="" />
                          </td>
                          <td><button class="schedule schedule1" onclick="schedule(this)" value="10" type="button"></button></td>
                          <td><button class="schedule schedule2" onclick="schedule(this)" value="9" type="button"></button></td>
                          <td><button class="schedule schedule3" onclick="schedule(this)" value="7" type="button"></button></td>
                          <td><button class="schedule schedule4" onclick="schedule(this)" value="3" type="button"></button></td>
                          <td><button class="schedule schedule5" onclick="schedule(this)" value="1" type="button"></button></td>
                          <td><button class="schedule_row_score" value="" type="button"></button></td>
                        </tr>
                        <tr>
                          <td scope="row" class="image-td">
                            <img
                              src="assets/images/technical-difficulty.png"
                              alt=""
                            />
                          </td>
                          <td class="attribute-td">
                            <p>Technical Difficulty</p>
                            <img src="assets/images/i-icon.png" alt="" />
                          </td>
                          <td><button class="technical_difficulty technical_difficulty1" onclick="technical_difficulty(this)" value="10" type="button"></button></td>
                          <td><button class="technical_difficulty technical_difficulty2" onclick="technical_difficulty(this)" value="9" type="button"></button></td>
                          <td><button class="technical_difficulty technical_difficulty3" onclick="technical_difficulty(this)" value="7" type="button"></button></td>
                          <td><button class="technical_difficulty technical_difficulty4" onclick="technical_difficulty(this)" value="3" type="button"></button></td>
                          <td><button class="technical_difficulty technical_difficulty5" onclick="technical_difficulty(this)" value="1" type="button"></button></td>
                          <td><button class="technical_difficulty_row_score" value="" type="button"></button></td>
                        </tr>
                        <tr>
                          <td scope="row" class="image-td">
                            <img
                              src="assets/images/operation-maintainance.png"
                              alt=""
                            />
                          </td>
                          <td class="attribute-td">
                            <p>Operation Maintainance</p>
                            <img src="assets/images/i-icon.png" alt="" />
                          </td>
                          <td><button class="operation_maintainance operation_maintainance1" onclick="operation_maintainance(this)" value="10" type="button"></button></td>
                          <td><button class="operation_maintainance operation_maintainance2" onclick="operation_maintainance(this)" value="9" type="button"></button></td>
                          <td><button class="operation_maintainance operation_maintainance3" onclick="operation_maintainance(this)" value="7" type="button"></button></td>
                          <td><button class="operation_maintainance operation_maintainance4" onclick="operation_maintainance(this)" value="3" type="button"></button></td>
                          <td><button class="operation_maintainance operation_maintainance5" onclick="operation_maintainance(this)" value="1" type="button"></button></td>
                          <td><button class="operation_maintainance_row_score" value="" type="button"></button></td>
                        </tr>
                        <tr>
                          <td scope="row" class="image-td">
                            <img src="assets/images/Industry.png" alt="" />
                          </td>
                          <td class="attribute-td">
                            <p>Industry</p>
                            <img src="assets/images/i-icon.png" alt="" />
                          </td>
                          <td><button class="industry industry1" onclick="industry(this)" value="10" type="button"></button></td>
                          <td><button class="industry industry2" onclick="industry(this)" value="9" type="button"></button></td>
                          <td><button class="industry industry3" onclick="industry(this)" value="7" type="button"></button></td>
                          <td><button class="industry industry4" onclick="industry(this)" value="3" type="button"></button></td>
                          <td><button class="industry industry5" onclick="industry(this)" value="1" type="button"></button></td>
                          <td><button class="industry_row_score" value="" type="button"></button></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="7" class="score-td">
                            <div
                              class="d-flex align-tems-center justify-content-end position-relative"
                            >
                              <div class="d-flex align-items-center">
                                <p class="m-0">SCORE</p>
                                <img
                                  src="assets/images/i-icon.png"
                                  class="pop_btn ml-3"
                                  alt=""
                                />
                                <!-- <div class="position-absolute pop_content d-none show-table">
                                  <table class="table table-bordered ">
                                    <tbody>
                                      <tr>
                                        <td scope="row">ACAT 1</td>
                                        <td>95</td>
                                        <td>100</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">ACAT 11</td>
                                        <td>75</td>
                                        <td>94</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">ACAT 111</td>
                                        <td>50</td>
                                        <td>74</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">ACAT 1</td>
                                        <td>30</td>
                                        <td>49</td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                </div> -->
                              </div>

                              <button
                                type="button"
                                class="ml-4 col-1 acat_val"
                                data-toggle="modal"
                                data-target="#vms_modal"
                                id="acat_val"
                              >
                                0
                              </button>
                            </div>
                          </td>
                          <td><button class="average" type="button" value="">0</button></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                  <div class="acquistion-topic">
                    <p class="acquistion-topic-p">Gerbang Nilai 0 (GNO)</p>
                    <p class="acquistion-topic-small-p">
                      *Medan VAE Perlu dilaksanakan oleh pegawai Kanan di JPS
                      Negeri/Bahagian
                    </p>
                  </div>
                  <div class="accordion daya-accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#daya"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                          >
                            <img src="assets/images/Vector-4.png" alt="" />
                            <p>1. DAYA MAJU PROJEK (PROJECT VIABILITY)</p>
                          </button>
                        </h2>
                      </div>

                      <div
                        id="daya"
                        class="collapse"
                        aria-labelledby="headingOne"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <table class="table table-bordered table1">
                            <tbody>
                              <tr>
                                <td class="td-1">
                                  Value Management Strategic (VMS)
                                </td>
                                <td class="td-2">1.1</td>
                                <td class="td-3">
                                  Laporan Value Management Strategic (VMS)
                                </td>
                                <td class="td-4 td-bg-yellow">*a)</td>
                                <td class="td-5 td-bg-yellow">
                                  Adakah perancangan projek ini telah melalui
                                  proses Value Management Strategik (VMS) dan
                                  adakah laporan VMS telah tersedia dan
                                  syarat-syarat yang perlu dipenuhi telah
                                  diselesaikan?
                                  <p>
                                    Nota: Sekiranya jawapan YA terus buat
                                    pengesyoran
                                  </p>
                                </td>
                                <td class="td-6 td-bg-green value1.1a_yes"><button type="button" class="cross border-0" style="background: transparent">X</button></td>
                                <td value="no" class="td-7 td-bg-red value1.1a_no"></td>
                              </tr>
                              <tr>
                                <td class="td-1">
                                  Kajian daya maju projek (viability)
                                </td>
                                <td class="td-2">1.2</td>
                                <td class="td-3">
                                  Kaedah penilaian daya maju projek
                                </td>
                                <td class="td-4 td-bg-yellow">*a)</td>
                                <td class="td-5 td-bg-yellow">
                                  Adakah kiraan nilai telah dilaksanakan? cth:
                                  <ol>
                                    <li>
                                      Creativity Index (viability,
                                      feasibility,sosioekonomi); atau
                                    </li>
                                    <li>Cost Benefit Analysis; atau</li>
                                    <li>Value For Money; atou</li>
                                    <li>
                                      Logical Framework Analysis (LFA); atau
                                    </li>
                                    <li>
                                      Lain-lain kaedah perkiraan berkaitan
                                    </li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value1.2a_yes">X</td>
                                <td class="td-7 td-bg-red value1.2a_no"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#brif"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <img src="assets/images/Vector-4.png" alt="" />
                            <p>2. BRIF</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="brif"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td rowspan="6" class="td-1">
                                  Kesediaan ringkasan projek
                                </td>
                                <td class="td-2">2.1</td>
                                <td class="td-3">Konteks projek</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah latar belakang projek telah diambil
                                  kira?
                                  <ol>
                                    <li>Lokasi: arou</li>
                                    <li>Populasi; atau</li>
                                    <li>Komposisi kaum; tou</li>
                                    <li>Lokasi: arou</li>
                                    <li>Kemudahan sedia ada; otou</li>
                                    <li>Jarak antara fasiliti yang sama</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value2.1a_yes">X</td>
                                <td class="td-7 td-bg-red value2.1a_no"></td>
                              </tr>
                              <tr>
                                <td rowspan="5">2.2</td>
                                <td rowspan="5">Kefungsian projek</td>
                                <td></td>
                                <td colspan="3">
                                  Adakah kefungsian projek telah diambil kira?
                                </td>
                              </tr>
                              <tr>
                                <td>a)</td>
                                <td>Objektif Projek</td>
                                <td class="td-6 td-bg-green value2.2a_yes">X</td>
                                <td class="td-7 td-bg-red value2.2a_no"></td>
                              </tr>
                              <tr>
                                <td>b)</td>
                                <td>Skop projek</td>
                                <td class="td-6 td-bg-green value2.2b_yes">X</td>
                                <td class="td-7 td-bg-red value2.2b_no"></td>
                              </tr>

                              <tr>
                                <td>c)</td>
                                <td>Komponen projek</td>
                                <td class="td-6 td-bg-green value2.2c_yes">X</td>
                                <td class="td-7 td-bg-red value2.2c_no"></td>
                              </tr>
                              <tr>
                                <td>d)</td>
                                <td>
                                  Kapasiti (Keperluan lawatan, Kati, Murid, Los)
                                </td>
                                <td class="td-6 td-bg-green value2.2d_yes"></td>
                                <td class="td-7 td-bg-red value2.2d_no"></td>
                              </tr>
                              <!--  -->
                              <tr>
                                <td rowspan="6"></td>
                                <td rowspan="4">2.3</td>
                                <td rowspan="4">Justifikasi</td>
                                <td></td>
                                <td colspan="3">
                                  Adakah justifikasi projek telah diambil kira?
                                </td>
                              </tr>
                              <tr>
                                <td>a)</td>
                                <td>Keperluan mewujudkan projek</td>
                                <td class="td-6 td-bg-green value2.3a_yes">X</td>
                                <td class="td-7 td-bg-red value2.3a_no"></td>
                              </tr>
                              <tr>
                                <td>b)</td>
                                <td>implikasi projek jika tidak diluluskan</td>
                                <td class="td-6 td-bg-green value2.3b_yes"></td>
                                <td class="td-7 td-bg-red value2.3b_no"></td>
                              </tr>
                              <tr>
                                <td>c)</td>
                                <td>
                                  Keberhasilan (outcome) Projek dan impak jangka
                                  panjang
                                </td>
                                <td class="td-6 td-bg-green value2.3c_yes">X</td>
                                <td class="td-7 td-bg-red value2.3c_no"></td>
                              </tr>
                              <tr>
                                <td rowspan="2">2.4</td>
                                <td rowspan="2">Kategori Pembangunan</td>
                                <td></td>
                                <td colspan="3">
                                  Adakah kategori pembangunan telah dikenal
                                  pasti?
                                </td>
                              </tr>
                              <tr>
                                <td>2)</td>
                                <td>
                                  <ol>
                                    <li>Projek baru; atau</li>
                                    <li>Naik taraf; atau</li>
                                    <li>Ubah suai</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value2.4_yes">X</td>
                                <td class="td-7 td-bg-red value2.4_no"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#TANAH"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <img src="assets/images/Vector-4.png" alt="" />
                            <p>3. TANAH</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="TANAH"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td class="td-1" rowspan="2">
                                  Bajet untuk projek
                                </td>
                                <td class="td-2" rowspan="2">3.1</td>
                                <td class="td-3" rowspan="2">
                                  Pemilikan tanah
                                </td>
                                <td class="td-4 td-bg-yellow">a)</td>
                                <td class="td-5 td-bg-yellow">
                                  Sekiranya hak milk tanah masih bukan atas nama
                                  Pesuruhjaya Tanah Persekutuan, adakah
                                  langkah-langkah pengambil alihan tanah telah
                                  dilakukan?
                                </td>
                                <td class="td-6 td-bg-green value3.1a_yes"></td>
                                <td class="td-7 td-bg-red value3.1a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">b)</td>
                                <td class="td-5">
                                  Adakah sudah kenal pasti koridor pembangunan
                                  jalan/saliran)?
                                </td>
                                <td class="td-6 td-bg-green value3.1b_yes">X</td>
                                <td class="td-7 td-bg-red value3.1b_no"></td>
                              </tr>
                              <tr>
                                <td class="td-1" rowspan="2">
                                  Adakah tapak telah tersedia dan bebas daripada
                                  bebanan dan masalah?
                                </td>
                                <td class="td-2" rowspan="2">3.2</td>
                                <td class="td-3" rowspan="2">
                                  Tanah bebas halangan
                                </td>
                                <td class="td-4 td-bg-yellow">a)</td>
                                <td class="td-5 td-bg-yellow">
                                  Adakah tiada pencerobohan di tanah?
                                </td>
                                <td class="td-6 td-bg-green value3.2a_yes"></td>
                                <td class="td-7 td-bg-red value3.2a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-4">b)</td>
                                <td class="td-5">
                                  Adakah keperluan serta langkah-langkah untuk
                                  menyelesaikan isu pencerobohan sebelum
                                  pembangunan telah diambil kira?
                                </td>
                                <td class="td-6 td-bg-green  value3.2b_yes"></td>
                                <td class="td-7 td-bg-red value3.2b_no">X</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#ANGGARAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <img src="assets/images/Vector-4.png" alt="" />
                            <p>4. ANGGARAN</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="ANGGARAN"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td class="td-1" rowspan="2">
                                  Kos berkaitan lokasi
                                </td>
                                <td class="td-2">4.1</td>
                                <td class="td-3">Kos berkaitan lokasi</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah anggaran kos telah mengambil kira
                                  faktor lokasi? :
                                  <ol>
                                    <li>Semenanjung; atau</li>
                                    <li>Sabah/Sarawak; atau</li>
                                    <li>Kawasan Pedalaman; arou</li>
                                    <li>Kawasan Laut, Pulau, Pesisir Pantai</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.1a_yes"></td>
                                <td class="td-7 td-bg-red value4.1a_no">X</td>
                              </tr>
                              <tr>
                                  <td class="td-2">4.2</td>
                                <td>Kos berkaitan tanah</td>
                                <td>a)</td>
                                <td>
                                  Adakah anggaran kos telah mengambil kira
                                  keperluan kos berkaitan tanah sekiranya ada?
                                  cth:
                                  <ol>
                                    <li>
                                      Kos pengambilan tanah (jalan/pengairan):
                                    </li>
                                    <li>
                                      Kos pengambilan tanah untuk jalan masuk;
                                      atau
                                    </li>
                                    <li>Kos pembaikan fizikal tanah; atou</li>
                                    <li>
                                      Kos pampasan/pengusiran pencerobohan;atau
                                    </li>
                                    <li>Lain-lain kos yang berkaitan tanah</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.2a_yes"></td>
                                <td class="td-7 td-bg-red value4.2a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-1" rowspan="2"></td>
                                <td class="td-2">4.3</td>
                                <td class="td-3">Kos berkaitan polisi</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah anggaran kos projek berdasarkan
                                  keperluan pematuhan dasar semasa? cth:
                                  <ol>
                                    <li>Fi perunding: atou</li>
                                    <li>
                                      Contribution Fee/ Wang Sumbangan
                                      Pembangunan pembekal utiliti (TNB,Bekalan
                                      Air, Telekom, IWK), Pihak Berkuasa
                                      Tempatan (PBT); atau
                                    </li>
                                    <li>Levi; atau</li>
                                    <li>Ukur halus; atau</li>
                                    <li>Pre Approved Plan (PAP) JKR; atau</li>
                                    <li>
                                      Industrialised Building System (IBS): atau
                                    </li>
                                    <li>Penarafan Hijau (PH); atau</li>
                                    <li>
                                      Mill Bulicina information Modelling (BIM)
                                    </li>
                                    <li>Lain-lain perkara berkaitan polisi</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.3a_yes"></td>
                                <td class="td-7 td-bg-red value4.3a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-2">4.4</td>
                                <td class="td-3">Kos berkaitan kerja awalan</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah sudah dikenal pasti kos berkaitan kerja
                                  awalan? cth:
                                  <ol>
                                    <li>
                                      (SI, EIA, TIA, Utility Mapping, Land
                                      Survey); atau
                                    </li>
                                    <li>Public engagement; atau</li>
                                    <li>Fi perunding; atau</li>
                                    <li>Penilaian Struktur/Turapan; atau</li>
                                    <li>Kos pengalihan utiliti; atau</li>
                                    <li>Miscellaneous</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.4a_yes"></td>
                                <td class="td-7 td-bg-red value4.4a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-1" rowspan="2"></td>
                                <td class="td-2">4.5</td>
                                <td class="td-3">
                                  Kos berkaitan mitigasi risiko
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah sudah dikenal pasti anggaran kos
                                  berkaitan mitigasi risiko? cth:
                                  <ol>
                                    <li>Kos luar jangka; atau</li>
                                    <li>Bencana alam; atau</li>
                                    <li>Wabak; atau</li>
                                    <li>
                                      Lain-lain kos berkaitan mitigasi risiko
                                    </li>
                                    <li>Kos pengalihan utiliti; atau</li>
                                    <li>Miscellaneous</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.5a_yes"></td>
                                <td class="td-7 td-bg-red value5.5a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-2">4.6</td>
                                <td class="td-3">
                                  Kos berkaitan perolehan teknologi dan
                                  peralatan
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah sudah dikenal pasti anggaran kos
                                  berkaitan perolehan teknologi dan peralatan?
                                  cth:
                                  <ol>
                                    <li>
                                      Penggunaan teknologi baru untuk pembinaan
                                      projek jalan; atau
                                    </li>
                                    <li>Bencana alam; atau</li>
                                    <li>
                                      Lain-lain kos yang berkaitan dengan
                                      perolehan teknologi dan peralatan
                                    </li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.6a_yes"></td>
                                <td class="td-7 td-bg-red value4.6a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-1" rowspan="2"></td>
                                <td class="td-2">4.7</td>
                                <td class="td-3">
                                  Kos berkaitan keperluan unik
                                </td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah sudah dikenal pasti anggaran kos
                                  berkaitan keperluan unik? cth:
                                  <ol>
                                    <li>Reka bentuk ikonik; atau</li>
                                    <li>Keperluan reka bentuk seismik; atau</li>
                                    <li>Lain-lain kos yang berkaitan unik</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.7a_yes"></td>
                                <td class="td-7 td-bg-red value4.7a_no">X</td>
                              </tr>
                              <tr>
                                <td class="td-2">4.8</td>
                                <td class="td-3">Penilaian semasa</td>
                                <td class="td-4">a)</td>
                                <td class="td-5">
                                  Adakah anggaran projek berdasarkan penilaian
                                  semasa? 4.8 Penilaian semasa
                                  <ol>
                                    <li>Anggaran tahun semasa; atau</li>
                                    <li>
                                      Asas Rujukan Anggaran kos (rule of thumb)
                                    </li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value4.8a_yes"></td>
                                <td class="td-7 td-bg-red value4.8a_no">X</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#STRATEGI"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <img src="assets/images/Vector-4.png" alt="" />
                            <p>5. STRATEGI PELAKSANAAN</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="STRATEGI"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body flex-column">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td rowspan="2">Pelaksanaan</td>
                                <td>5.1</td>
                                <td>Kaedah Pelaksanaan</td>
                                <td>*a)</td>
                                <td>
                                  Adakah Kaedah pelaksanaan telah dikenal pasti?
                                  <ol>
                                    <li>Konvensional Dalaman</li>
                                    <li>Perunding</li>
                                    <li>Reka dan Bina</li>
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green value5.1a_yes">X</td>
                                <td class="td-7 td-bg-red value5.1a_no"></td>
                              </tr>
                              <tr>
                                <td>5.2</td>
                                <td>Tempoh pelaksanaan</td>
                                <td>a)</td>
                                <td>
                                  Adakah tempoh pelaksanaan yang realistik telah
                                  mengambil kira fasa perancangan, reka bentuk,
                                  perolehan, pembinaan, penyerahan (kitar hayat
                                  projek)?
                                </td>
                                <td class="td-6 td-bg-green value5.2a_yes">X</td>
                                <td class="td-7 td-bg-red value5.2a_no"></td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="nota-container">
                            <p class="nota-topic">Nota:</p>
                            <ol>
                              <li>
                                Sila tandakan "X" pada Y untuk YA, Sila tandakan
                                'X pada 'T' untuk TIDAK
                              </li>
                              <li>Status HUJAU jika semua soalan dijawab YA</li>
                              <li>
                                Status MERAH jika salah satu soalan dijawab
                                TIDAK (melainkan soalan 1.1 a), soalan 3.1 a),
                                soalan 3.2 aj dan soalan 5.1a).
                              </li>
                              <li>
                                Laporan GNO boleh diisi berulang-ulang kali pada
                                bila-bila masa sekiranya keputusan masih MERAH.
                                -Keputusan semakan sama ada HUJAU/MERAH telah
                                diprogramkan secara automatik dalam templat ini.
                              </li>
                            </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button
                            class="btn btn-link btn-block text-left collapsed acc-btn"
                            type="button"
                            data-toggle="collapse"
                            data-target="#PENGESYORAN"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                          >
                            <img src="assets/images/Vector-4.png" alt="" />
                            <p>6. PENGESYORAN SEMAKAN GERBANG NILAI O</p>
                          </button>
                        </h2>
                      </div>
                      <div
                        id="PENGESYORAN"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordionExample"
                      >
                        <div class="card-body">
                          <!-- <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td rowspan="2">Pelaksanaan</td>
                                <td>5.1</td>
                                <td>Kaedah Pelaksanaan</td>
                                <td>*a)</td>
                                <td>Adakah Kaedah pelaksanaan telah dikenal pasti?
                                  <ol>
                                    <li>Konvensional Dalaman</li>
                                    <li>Perunding</li>
                                    <li>Reka dan Bina</li>
                                    
                                  </ol>
                                </td>
                                <td class="td-6 td-bg-green">X</td>
                                <td class="td-7 td-bg-red"></td>
                              </tr>
                              <tr>
                                <td>5.2</td>
                                <td>Tempoh pelaksanaan</td>
                                <td>a)</td>
                                <td>Adakah tempoh pelaksanaan yang realistik telah mengambil kira fasa perancangan, reka bentuk, perolehan, pembinaan, penyerahan (kitar hayat projek)?</td>
                                <td class="td-6 td-bg-green">X</td>
                                <td class="td-7 td-bg-red"></td>
                              </tr>
                            </tbody>
                            </table> -->
                          <div class="vae_acc_6_conetnt">
                            <table>
                              <tbody>
                                <tr>
                                  <td class="vae_text text-center green">
                                    HIJAU
                                  </td>
                                  <td class="text-center hijau">
                                    <img
                                    class="hijau"
                                      src="assets/images/edit_small_pen.png"
                                      alt=""
                                    />
                                  </td>
                                </tr>
                                <tr>
                                  <td class="vae_text text-center red">
                                    MERAH
                                  </td>
                                  <td class="text-center merah"></td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="vae_p">
                              Ruangan yang ditanda `<img
                                src="assets/images/edit_small_pen.png"
                                alt=""
                              />` merupakan keputusan semakan GN0
                            </p>

                            <table class="table table-striped vae_table_two">
                              <tbody>
                                <tr>
                                  <td>
                                    Nama Pegawai Teknikal (Pegawai Penyedia)
                                    <img
                                      src="assets/images/i-icon.png"
                                      alt=""
                                      class="pop_btn"
                                    />
                                    <div
                                      class="position-absolute pop_content d-none"
                                    >
                                      <p>Logo 1 adalah logo dibahagian kiri</p>
                                    </div>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Jawatan</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Ulasan</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Tandatangan</td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>

                            <h4>Keputusan</h4>
                            <table class="table table-striped vae_table_two">
                              <tbody>
                                <tr>
                                  <td>Nama KSU/Pegawai Deberi Kuasa</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Jawatan</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Tarikh Keputusan</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Ulusan</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Tandatangan</td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="brief_project_content_footer">
                  <button type="button" id="vaeSaveBtn" class="updateBtn">Simpan</button
                  ><button class="green" style="background-color: #0ACF97"><a class="text-decoration-none text-white" href="dokumen">Seterusnya</a></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Mainbody_conatiner Starts -->
    </div>
    <section>
        <div class="project_register_form_modal_container">
          <div
            class="modal spaced_modal fade"
            id="vms_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered project_register_form_modal_dialog"
              role="document"
            >
              <div class="modal-content project_register_form_modal_content">
                <div class="modal-body project_register_form_modal_body">
                  <div class="project_register_form_modal_body_Content">
                    <h3 class="vms p-0" style="font-size: 0.9rem; font-weight: 600;">
                      *Bahagian dikehendaki melaksanakan Value Management
                      Strategic (VMS)
                    </h3>
  
                    <div class="btn_holder d-flex">
                      <button data-dismiss="modal" class="fix_button blue TutupBtn">
                        Tutup
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="assets/js/jquery.min.js"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      @include('Vae.script')

    @endsection
