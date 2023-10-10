@php
  $user_is=Auth::user()->is_superadmin;
  $userType=Session::get('userType');
  $user_role=Session::get('userRole'); 
  $penyemak=Session::get('penyemak');
  $penyemak_1=Session::get('penyemak_1');
  $penyemak_2=Session::get('penyemak_2'); 
  $pengesah=Session::get('pengesah'); 
  $peraku=Session::get('peraku'); 
  $semak_pengesah=0;
  $semak_peraku=0;
  $semak_access=0;


  if($userType==1)
  {
    $semak_access=0;
  }
  else
  {
     if($penyemak==1 || $penyemak_1==1 || $penyemak_2==1)
     {
        $semak_access=1;
     }
     if($pengesah==1)
     {
        $semak_pengesah=1;
     }
     if($peraku==1)
     {
        $semak_peraku=1;
     }
  }
@endphp
<style>
  .side_bar_Container .sidebar_list_container #accordionParent .accordian_content .sidebar_icon i,
  .side_bar_Container .sidebar_list_container #accordionParent .accordian_content .sidebar_icon .iconify {
    color: white;
    font-size: 1.7em;
  }
</style>
<body id="index" class="white project_register">

    <div class="NPIS_Container">
      <!-- side_bar_Container Sarts -->
      <div class="side_bar_Container dashboard Project_application" id="navbarCollapse" style="left: -30px">
        <div class="side_bar_content">
          <div class="NPIS_logo_container d-flex">
            <div class="NPIS_logo" id="NPIS_logo">
              <img src="{{ asset('Vm_module/assets/images/LOGO.png') }}" alt="LOGO" />
            </div>
            <div class="NPIS_logo_right_content">
            <a href="/home" class="text-dark d-flex"> <h3 class="text-light">NPIS</h3> </a>
              <div class="ml-auto round_parent">
                <div class="round"></div>
              </div>
            </div>
          </div>
          <h3 class="Modul">Modul</h3>
          <div class="sidebar_list_container">
            <!-- accordion start -->
            <ul class="accordion" id="accordionParent">
            @if($user_is==1)
              <li class="accordian_content d-flex">
                <div class="sidebar_icon">
                  <span class="iconify" data-icon="mdi-web"></span>
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>Geo Board</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="collapseTwo"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="#">Contoh</a></li>
                    </ul>
                  </div>
                </div>
              </li>
            @endif
              <li class="accordian_content d-none" id="sidebar_1">
                <div class="sidebar_icon">
                  <span class="iconify" data-icon="mdi-account"></span>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-3.png') }}" alt="d_arrow" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#pentabir"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>Pentadbir</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="pentabir"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="/home">Dashboard</a></li>
                      <li><a href="/userlist">Profil Pengguna</a></li>
                      <li><a href="/pengesahan-pengguna-baharu">Pengesahan Pengguna Baharu </a></li>
                      <li><a href="/daftar-pengguna-baharu">Daftar Pengguna Baharu</a></li>                                            
                      <li><a href="/master/portal">Selenggara Portal</a></li>
                      <li><a href="/master">Selenggara Data</a></li>
                      <li><a href="/Selenggara_Kod_Projek">Selenggara Kod Projek</a></li>
                      <li><a href="#">Selenggara Projek</a></li>
                      <li><a href="/selenggara_dashboard_analisis">Selenggara Dashboard Analisis</a></li>
                      <li>
                        <a href="/selenggara_map_services">Selenggara Map Services dan Integrasi</a>
                      </li>
                      <li><a href="/selenggara-pengurusan-peranan">Selenggara Peranan</a></li>
                      <li><a href="/audit-logs">Audit Trail</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_2">
                <div class="sidebar_icon">
                  <span class="iconify" data-icon="mdi-briefcase-variant"></span>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-4.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#permohonan"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>Permohonan Projek</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="permohonan"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="/permohonan-project-dashboard">Dashboard</a></li>
                      <li><a href="/project-application-list">Senarai Permohonan Projek</a></li>
                      <li><a href="/project-list">Daftar Permohonan Projek</a></li>
                      <li><a href="/salin-project-list">Salin Permohonan Projek</a></li>
                      @if($semak_access=='1')
                      <li><a href="/semak-project-list">Semak Permohonan Projek</a></li>
                      @endif
                      @if($semak_pengesah=='1')
                      <li><a href="/pengesahan-project-list">Pengesahan Permohonan Projek</a></li>
                      @endif
                      @if($semak_peraku=='1')
                      <li><a href="/peraku-project-list">Peraku Pemohonan Projek</a></li>
                      @endif
                      <li><a href="#">Janaan Laporan</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_3">
                <div class="sidebar_icon">
                  <i class="uil-chart-bar"></i>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-1.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#pemantauan"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>PEMANTAUAN DAN PENILAIAN PROJEK</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="pemantauan"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="#">PROJEK JPS</a></li>
                      <li><a href="#">Senarai Projek</a></li>
                      <li><a href="#">Janaan Laporan</a></li>
                      <li><a href="#">PROJEK BUKAN TEKNIK</a></li>

                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_4">
                <div class="sidebar_icon">
                  <i class="ri-file-text-line"></i>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#kontrak"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>KONTRAK</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="kontrak"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="#">Dashboard</a></li>
                      <li><a href="#">Senarai Projek</a></li>
                      <li><a href="#">Kemaskini Maklumat</a></li>
                      <li><a href="#">Janaan Laporan</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_5">
                <div class="sidebar_icon">
                  <span class="iconify" data-icon="mdi-handshake-outline"></span>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-6.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#perunding"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>PERUNDING</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="perunding"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                  <ul class="">
                    <li><a href="#">JPS</a></li>
                      <ul><a href="#" class="senarai">Dashboard</a></ul>
                      <ul><a href="/senarai_perunding_jps" class="senarai">Senarai Projek</a></ul>
                      <ul><a href="#" class="senarai">Janaan Laporan</a></ul>
                    <li><a href="#">JABATAN BUKAN TEKNIK</a></li>
                      <ul><a href="#" class="senarai">Dashboard</a></ul>
                      <ul><a href="/senarai_perunding_bukan_jps" class="senarai">Senarai Projek</a></ul>
                      <ul><a href="#" class="senarai">Janaan Laporan</a></ul>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_6">
                <div class="sidebar_icon">
                  <i class="ri-calculator-fill"></i>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-2.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#value_management"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>Value Management</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="value_management"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                          <li><a href="#">Dashboard</a></li>
                          <li><a href="#">Senarai Projek</a></li>
                            <ul><a href="/senarai_makmal_and_mini" class="senarai">Senarai Makmal VM</a></ul>
                            <ul><a href="/senarai_selasai_makmal" class="senarai">Senarai Selesai Makmal</a></ul>
                          @if($userType==4)
                          <li><a href="/fasilitator">Senarai Fasilitator</a></li>
                          @endif
                          <li><a href="#">Janaan Laporan</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_7">
                <div class="sidebar_icon">
                  <i class="uil-chart-line"></i>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-5.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#notice"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>Notice of Change</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="notice"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="/Kertas_Permohonan_NOC">Kertas Permohonan NOC</a></li>
                      <li><a href="/peruntukan_siling_tahunan">Pindah Peruntukan Siling Tahunan</a></li>
                      <li><a href="#">Contoh</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_8">
                <div class="sidebar_icon">
                  <span class="iconify" data-icon="mdi-timer-sand"></span>
                  {{-- <img src="{{ asset('Vm_module/assets/images/Vector-7.png') }}" alt="Vector" /> --}}
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#rolling_plan"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>
                              PERMOHONAN PERUNTUKAN DI LUAR ROLLING PLAN (RP)
                            </p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="rolling_plan"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="#">Dashboard</a></li>
                      <li><a href="/Senarai_Peruntukan">Senarai Peruntukan Luar RP</a></li>
                        @if($userType==4 || $user_is==1)
                          <li><a href="/rp_bkor">Daftar Permohonan</a></li>
                        @endif
                      <li><a href="/Janaan_Laporan">Janaan Laporan</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="accordian_content d-none" id="sidebar_9">
                <div class="sidebar_icon">
                  <img src="{{ asset('Vm_module/assets/images/Vector-8.png') }}" alt="Vector" />
                </div>
                <div class="accordian_single_list">
                  <div class="Accordian-header" id="headingTwo">
                    <a
                      class="text-left collapsed Accordian_link"
                      data-toggle="collapse"
                      href="#laporan"
                    >
                      <div class="d-flex sidebar_icon_Container">
                        <div class="sidebar_icon_right_content">
                          <div class="d-flex sb_contents">
                            <p>PENJANAAN LAPORAN</p>
                            <div>
                              <img
                                src="{{ asset('Vm_module/assets/images/down arrow.png') }}"
                                class="d_arrow"
                                alt="d_arrow"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div
                    id="laporan"
                    class="collapse accordian_collapse_list"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionParent"
                  >
                    <ul class="">
                      <li><a href="#">Contoh</a></li>
                      <li><a href="#">Contoh</a></li>
                      <li><a href="#">Contoh</a></li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
            <!-- accordion ends -->
          </div>
        </div>
    </div>
<!-- side_bar_Container Ends -->
