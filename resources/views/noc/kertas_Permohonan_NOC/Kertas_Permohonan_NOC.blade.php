@include('users.dashboard.style')
@include('noc.Kertas_Permohonan_NOC.nocStyle')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')
<div class="Mainbody_content mtop ml-3" style="width:97% !important;">

    <x-form.spinner>
        <x-slot name="message">
            Sila tunggu sebentar sementara data sedang dimuatkan
        </x-slot>
    </x-form.spinner>

    <div class="Mainbody_content_nav_header project_register row align-items-center">
      <div class="col-md-3 col-xs-12 ml-2">
        <h4 class="project_list">Senarai Permohonan NOC</h4>
      </div>
      <div class="col-md-8 col-xs-12 path_nav_col">
        <ul class="path_nav d-flex align-content-end flex-wrap">
          <li>
            <a href="#">
              <span class="iconify mr-2" data-icon="mdi-chart-line" style="font-size: 1.5em;"></span>
              Notice of Change
              <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
            </a>
          </li>
          <li>
            <a href="#">
              JPS
              <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
            </a>
          </li>
          <li>
            <a href="#">
              Kertas Permohonan NOC
              <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2" style="color: #8d98a2; vertical-align: middle;"></i>
            </a>
          </li>
          <li>
            <a href="#" class="active">Senarai Permohonan NOC</a>
          </li>
        </ul>
      </div>
    </div>
    
    <div class="project_register_content_container">
        <div class="project_register_table_container">
          <div class="m-2 project_register_search_container d-flex col-12 row">
            <div class="col-6 d-flex">  
                <div class="project_register_search_header project_register icon_yellow_bg">
                    <img class="" src="assets/images/Vector-12.png" alt=""/>
                </div>
                <h5 class="project_list m-2 mt-1 text-secondary mt-3" style="font-size: 1rem !important;"><strong>SENARAI PROJEK </strong></h5>
            </div>
            <div class="col-6 d-flex" style="place-content:flex-end">
                <div class="pemberat_content_header_right text-center mt-1">
                    <button class="pemberat_greenBtn" onclick="notis_perubahan()"><i class ="ri-add-circle-fill text-white" style="font-size: 1.5rem; vertical-align: middle;"></i> Kertas Permohonan</button>
                </div>
                <div class="userlist_content_header_right text-center" style="margin-top: 3px !important;margin-left:5px !important;">
                  <button class="printing col-xs-12">
                      <img src="{{ asset('assets/images/printing (1) 2.png') }}" alt="printing" onclick="printDataTable()"/>
                  </button>
                </div>
            </div>
          <!-- <button class="btn btn-success col-md-2 col-xs-12 ml-auto mt-3">Tindakan BKOR</button> -->
          <hr>
            <div class="userlist_tab_content_header">
              <!-- <div class="userlist_tab_btn_container d-flex flex-sm-row flex-column align-items-center">
                <button class="active">MAKMAL VA</button>
                <button>MAKMAL MINI VA</button>
              </div> -->
              <div class="userlist_tab_content_container ">
                {{-- <div class="no_of_list d-flex flex-sm-row flex-column align-items-center">
                  <div class="d-flex  pemberat_title1">
                    <p class="ml-3 papar_senarai pemberat_title1">Papar</p>
                    <div class="form-group m-1">
                      <select
                        name="no_of_list"
                        id="no_of_list"
                        class="form-control"
                      >
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </div>
                    <p class="papar_senarai">entri</p>
                  </div>
                  <div class="search_senarai">
                    <input
                      type="s"
                      name="search_list"
                      id="search_list"
                      class="form-control  pemberat_title1"
                      placeholder="Carian"
                    />
                  </div>
                </div> --}}
              </div>
          <div class="table_holder mt-4">
            <table class="table table_preview application_list table-scrollable" id="projectTable">
              <thead>
                <tr class="pemberat_title_1">
                  <th> </th>
                  <th class="text-nowrap">No. Rujukan
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                  <th class="text-nowrap">Tahun Permohonan
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                  <th class="text-nowrap">Kod Projek
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                  <th>Nama Projek
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                  <th class="text-nowrap">Kategori NOC
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                  <th>Tarikh Kemaskini
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                  <th class="text-nowrap">Status Permohonan
                    <!-- <button class="sort pr-3 KON_sortingBtn">
                      <img
                        src="assets/images/up triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                      <img
                        src="assets/images/down triangle.png"
                        alt="sort"
                        class="d-block"
                      />
                    </button> -->
                  </th>
                </tr>
              </thead>
              <tbody class="pemberat_xstable">
                {{-- <tr>
                  <td></td>
                  <td>NC23001712</td>
                  <td>2023</td>
                  <td>P33135005152810</td>
                  <td>PROJEK PEMBINAAN EMPANGAN LIPIS, DAERAH RAUB, PAHANG DARUL MAKMUR</td>
                  <td>Petambahan Kos</td>
                  <td>23-04-2023</td>
                  <td class="pemberat_redFont">Batal</td>
                </tr>
                <tr>
                  <td></td>
                  <td>NC23001713</td>
                  <td>2023</td>
                  <td>P33167005063223</td>
                  <td>RANCANGAN TEBATAN BANJIR SUNGAI DONG, DAERAH RAUB, PAHANG DARUL MAKMUR</td>
                  <td>Perubahan Objektif</td>
                  <td>04-02-2022</td>
                  <td>Dalam Semakan</td>
                </tr>
                <tr>
                  <td><i class="ri-information-fill" style="color: #FFC35A; font-size: x-large;"></i></td>
                  <td>NC23001714</td>
                  <td>2024</td>
                  <td>P33151005013009</td>
                  <td>PROJEK PENGAWALAN HAKISAN PANTAI DI PANTAI SEKAKAP, MERSING, JOHOR</td>
                  <td>Wujud Butiran Baharu</td>
                  <td>05-07-2021</td>
                  <td class="pemberat_genFont">Lulus</td>
                </tr>
                <tr>
                    <td><i class="ri-information-fill" style="color: #FFC35A; font-size: x-large;"></i></td>
                    <td>NC23001714</td>
                    <td>2024</td>
                    <td>P33151005013009</td>
                    <td>PROJEK PENGAWALAN HAKISAN PANTAI DI PANTAI SEKAKAP, MERSING, JOHOR</td>
                    <td>Wujud Butiran Baharu</td>
                    <td>05-07-2021</td>
                    <td class="pemberat_genFont">Lulus</td>
                  </tr>
                  <tr>
                    <td><i class="ri-information-fill" style="color: #FFC35A; font-size: x-large;"></i></td>
                    <td>NC23001714</td>
                    <td>2024</td>
                    <td>P33151005013009</td>
                    <td>PROJEK PENGAWALAN HAKISAN PANTAI DI PANTAI SEKAKAP, MERSING, JOHOR</td>
                    <td>Wujud Butiran Baharu</td>
                    <td>05-07-2021</td>
                    <td class="pemberat_genFont">Lulus</td>
                  </tr> --}}
                
              </tbody>
            </table>
          </div>
          {{-- <div class="table_footer d-flex flex-sm-row flex-column align-items-center">
            <p class="m-0">Papar 1 ke 10 daripada 50 entri</p>
            <div>
              <ul class="list-items pemberat_footer">
                <li>Awal</li>
                <li>Sebelum</li>
                <ul>
                  <li class="active">1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                </ul>
                <li>Seterusnya</li>
                <li>Akhir</li>
              </ul>
            </div>
          </div> --}}
        </div>
      </div>
        </div>
        </div>
        </div>
      </div>
</body>
@include('noc.Kertas_Permohonan_NOC.script')

<script>
  
  function notis_perubahan()
  {
      localStorage.setItem('noc_status', 40);
      window.location='add-notis_perubahan';
  }

</script>
@endsection


