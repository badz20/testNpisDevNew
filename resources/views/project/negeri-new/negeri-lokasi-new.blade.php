@include('project.negeri.style')

@extends('layouts.main.master_responsive')

@section('content_main')

<!-- Load Leaflet from CDN -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js"></script>

<!-- Load Esri Leaflet Geocoder from CDN -->
<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js"></script>
<script src="https://s3-us-west-1.amazonaws.com/patterns.esri.com/files/calcite-web/1.2.5/js/calcite-web.min.js"></script>


<style>
  .container{
    max-width: 1285px !important;
  }
        #toolbarDiv {
        position: absolute;
        /* top: 50%; */
        right: 100px;
        cursor: default;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        margin-top: 65px;
      }
      .esri-widget--button.active,
      .esri-widget--button.active:hover,
      .esri-widget--button.active:focus {
        cursor: default;
        background-color: #999696;
      }
      .esri-search__form {
        margin: -10px !important;
      }
      .esri-widget--button.active path,
      .esri-widget--button.active:hover path,
      .esri-widget--button.active:focus path {
        fill: #E4E4E4;
      }
      .esri-search__submit-button, .esri-search__sources-button{
        align-self: center !important;
      }
  #formDiv {
        width: 100%;
      }
.esri-item-list__filter-container--sticky{
  position: relative !important;
    top: 10px !important;
}
      .esri-feature-form__input--disabled{
        background-color: #ebebebd6 !important;
        color: slategrey !important;
      }

      .esri-item-list__scroller {
        overflow-y: visible;
      }

      input[type=text] {
        font: 300 13px Roboto, Arial, sans-serif !important;
      }

      .editArea-container {
        background: #fff;
        line-height: 1.5em;
        overflow: auto;
        padding: 12px 15px;
        width: 300px;
        height: 385px;
      }

      .list-heading {
        font-weight: normal;
        margin-top: 20px;
        margin-bottom: 10px;
        color: #323232;
      }

      .or-wrap {
        background-color: #e0e0e0;
        height: 1px;
        margin: 2em 0;
        overflow: visible;
      }

      .or-text {
        background: #fff;
        line-height: 0;
        padding: 0 1em;
        position: relative;
        bottom: 0.75em;
      }

      /* override default styles */
      .esri-feature-form {
        background: #fff;
      }
      .esri-basemap-gallery {
        height: 410px !important;
      }

      .esri-feature-templates {
        width: 256px;
      }

      .esri-feature-templates__section-header {
        display: none;
      }

      .esri-feature-templates__section {
        box-shadow: none;
      }

      .esri-feature-templates__scroller {
        max-height: 200px;
      }

      .selectBtn {
  width: 100%;
  height: 35px;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #525252;
  background-color: #fff;
  border: none;
  border-radius: 10px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  }

.selectBtn:hover {
  /* background-color: #2EE59D; */
  box-shadow: 0px 2px 20px rgba(57, 56, 56, 0.762);
  color: #000000;
  transform: translateY(-7px);
}

.popWindow{
  position: absolute;
  top: 91.2%;
  z-index: 1;
  left: 57%;
  width:40%;

}
</style>



<x-form.spinner>
    <x-slot name="message">
        Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
</x-form.spinner>


  <!-- Mainbody_conatiner Starts -->
  <div class="Mainbody_conatiner ml-auto">

    
    <div class="Mainbody_content mtop nageri_container">
      <div class="Mainbody_content_nav_header project_register align-items-center row">
        <div class="col-lg-5 col-xs-12">
          <h4 class="ml-2">Daftar Permohonan Projek</h4>
        </div>
        <div class="col-lg-6 col-xs-12 path_nav_col">
          <ul class="path_nav row">
            <li>
              <a href="#" class="text-info" style="display: flex; align-items: center;">
                <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-briefcase-variant"></span>
                Permohonan Projek
                <i class="ri-arrow-right-s-line ri-lg icon_arrow ml-2"></i>
              </a>
            </li>
            <li>
              <a href="#" class="active text-secondary"> Daftar Projek </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="mr-5" style="float:right;" >
        <x-form.print></x-form.print>
      </div>

      <div class="project_register_tab_container nageri_gap row">
        <div class="project_register_tab_btn_container col-2">
          @include('project.side-sections', ['active' => 'negeri'])
        </div>
        <div
          class="project_register_tab_content_container nageri_right_content col-10">
          {{-- Start RMK Flow Chart in Horizontal --}}
        <div class="rmk_flow_Chart flow-horizontal">
          <div class="rmk_flow_Chart_container d-none" id="indicator-daerah">
              @include('project.daerah_indicator')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view">
              @include('project.negeri_view_indicator')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view">
              @include('project.bahagian_view_indicator')
          </div>
        </div> 
        {{-- End RMK Flow Chart in Horizontal --}}

        {{-- Start RMK Flow Chart in Vertical --}}
        <div class="rmk_flow_Chart flow-vertical">

          <div class="rmk_flow_Chart_container d-none" id="indicator-daerah-vertical">
              @include('project.daerah_indicator_vertical')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-negeri-view-vertical">
              @include('project.negeri_view_indicator_vertical')
          </div>

          <div class="rmk_flow_Chart_container d-none" id="indicator-bahagian-view-vertical">
              @include('project.bahagian_view_indicator_vertical')
          </div>
        </div>
        {{-- End RMK Flow Chart in Vertical --}}  

          <form  action="" method="post" id="negeri_lokasi_form" name="myform">
          <input type="hidden" id="api_url" value={{env('API_URL')}}>
          <input type="hidden" id="app_url" value={{env('APP_URL')}}>
          <input type="hidden" id="token" value={{env('TOKEN')}}>

          <input type="hidden" id="project_id" name="project_id" value="{{$id}}">
            <div class="nageri_form_content">
              <div class="nageri_select_box">
                <div class="select_box_header">Maklumat Lokasi</div>
                <div class="row my-3 p-1">
                  <div class="col-lg-3 col-xs-12">
                    Sila pilih maklumat Lokasi
                  </div>
                  <div class="col-lg-4 col-xs-5">
                    <div class="row">
                      <div class="col-lg-5 col-xs-12">
                      <input type="radio" name="negeriselection" id="negeriselection" value="0" checked onclick="show_addbtn(this.value);" />
                        Satu Negeri 
                      </div>

                      <div class="col-lg-4 col-xs-12">
                        <input type="radio" name="negeriselection" id="negeriselection" value="1" onclick="show_addbtn(this.value);" />
                        Pelbagai 
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xs-3" id="addbtndiv" style="display: none">
                    <div class="d-flex lokasi_footer">
                      <button type="button" id="addbtn" class="add-tr-btn" style="border:none !important;background: white !important;">
                        <img
                          src="{{ asset('assets/images/Add_box.png') }}"
                          alt=""
                        />
                      </button> 
                    </div>
                  </div>
                </div>
                <div id="negeribox" style="border-top: 1px solid lightgrey;">
                  <div class="row negerirow p-2" >
                    <div class="col-lg-3 col-xs-12">
                      <div class="input_fill_content">
                        <div class="form-group nageri_form_group">
                          <label for="exampleFormControlSelect1">Negeri <span class="nageri_color">*</span></label>
                          <select class="form-control negeri_1 m-0 col-lg-10 col-xs-12" id="select_negeri" name="select_negeri" onchange="loadnegeri_parlimen_dun(1);" @if($is_submitted) disabled @endif>
                            <option value="0" disabled selected hidden>--Pilih--</option>
                          </select>
                          <span class="error" id="error_select_negeri"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-12">
                      <div class="input_fill_content">
                        <div class="form-group nageri_form_group">
                          <label for="exampleFormControlSelect1">Daerah <span class="nageri_color">*</span></label>
                          <select class="form-control daerah_1 col-lg-10 col-xs-12" id="select_daerah" name="select_daerah" @if($is_submitted) disabled @endif>
                            <option value="0" disabled selected hidden>--Pilih--</option>
                          </select>
                          <span class="error" id="error_select_daerah"></span>
                        </div>
                      </div>
                      <!-- <div class="nageri_select_inputs input_fill_content">
                        <div class="form-group nageri_form_group">
                          <label for="exampleFormControlSelect1">Mukim <span class="nageri_color">*</span></label>
                          <select class="form-control" id="select_mukkim" name="select_mukkim">
                          <option value="0" disabled selected hidden>--Pilih--</option>
                          </select>
                          <span class="error" id="error_select_mukkim"></span>
                        </div>
                      </div> -->
                    </div>
                    <div class="col-lg-3 col-xs-12">
                      <div class="input_fill_content">
                        <div class="form-group nageri_form_group">
                          <label for="exampleFormControlSelect1">Parlimen <span class="nageri_color">*</span></label>
                          <select class="form-control parlimen_1 col-lg-10 col-xs-12" id="select_parlimen" name="select_parlimen" onchange="getdun(1);" @if($is_submitted) disabled @endif>
                            <option value="0" disabled selected hidden>--Pilih--</option>
                          </select>
                          <span class="error" id="error_select_parlimen"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-xs-12">
                        <div class="input_fill_content">
                          <div class="form-group nageri_form_group">
                              <label for="exampleFormControlSelect1">Dun <span class="nageri_color">*</span></label>
                              <select class="form-control dun_1" id="select_dun" name="select_dun" @if($is_submitted) disabled @endif>
                                <option value="0" disabled selected hidden>--Pilih--</option>
                              </select>
                              <span class="error" id="error_select_dun"></span>
                          </div>
                        </div>           
                    </div>
                    <div class="col-lg-1 col-xs-12">
                      <div class="d-flex lokasi_footer">
                        <div class="" data-negeri="1">
                          <button type="button" id="addbtndaerah" class="ml-auto add-tr-btn-daerah btn_1" style="background:white;border: none">
                            <img
                              src="{{ asset('assets/images/Add_box1.png') }}"
                              alt=""
                            />
                          </button>
                        </div>
                        <div>
                          <button type="button" id="minus_button" class="" style="background:white;border:none;">
                            <img
                            src="{{ asset('assets/images/minus.png') }}"
                            alt="minus"
                            />
                          </button>
                        </div>
                      </div>       
                    </div>
                    <hr />               
                  </div><!-- row ends -->    
                  
                </div> <!-- negeribox ends -->           
              </div>

              <div class="nageri_map_content">
              <div class="nageri_select_footer">
                  Maklumat Koordinat GIS
                </div>
                <hr />
                {{-- <div class="nageri_map">
                  <iframe id="map" name="map" width="600" height="450" frameborder="0" style="border:0"></iframe> --}}
                  {{-- <iframe --}}
                    {{-- src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510192.288232467!2d103.78939576094957!3d2.5468526474498834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c54b8d3d077e25%3A0xac4f720b5102a1f9!2sMersing%2C%20Johor%2C%20Malaysia!5e0!3m2!1sen!2sin!4v1669610094055!5m2!1sen!2sin" --}}
                    {{-- src="https://www.google.com/maps/embed/v1/view?key=AIzaSyD5tKcdBlOBoEABTvdV8rn68qNjeqTB2XU&center=3.144667094893797,101.6395963903369&zoom=5" --}}
                    {{-- width="600"
                    height="450"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                  ></iframe> --}}
                {{-- </div> --}}
                <div class="nageri_map">
                  <div id="homeBtn"></div>
                  <div id="my_map"></div>
                </div>
                
                <div class="input_container nageri_map_inputs row">
                  <div class="input_fill_content col-lg-6 col-xs-12 row">
                    <div class="col-lg-6 col-xs-12 mr-2">
                      <label for="lat" style="font-size: 0.8rem; font-weight: 600;">Latitud</label>
                    </div>
                    <div class="form-group input_form_group col-lg-5 col-xs-12">
                      <input type="text" disabled name="latitude" id="latitude" class="latlng form-control col-lg-7 col-xs-12" value=""/>
                      <span class="error" id="error_latitude"></span>
                    </div>
                  </div>
                  <div class="input_fill_content col-lg-6 col-xs-12 row">
                    <div class="col-lg-6 col-xs-12 mr-2">
                      <label for="lat" style="font-size: 0.8rem; font-weight: 600;">Longitud</label>
                    </div>
                    <div class="form-group input_form_group col-lg-5 col-xs-12">
                      <input type="text" disabled name="logitude" id="logitude" class="latlng form-control col-lg-7 col-xs-12" value=""/>
                      <input type="hidden" name="NegeriName" id="NegeriName" class="d-none form-control col-lg-7 col-xs-12" value=""/>
                    <span class="error" id="error_logitude"></span>
                    </div>
                  </div>
                </div>

              </div>

              {{-- <div class="nageri_file_inputs" style="padding:20px;">
                 <iframe src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/index.html?id=292c228fe8484534ac99a586e01108a6" title="NPIS" style="width:100%;height:30%;"></iframe>
              </div> --}}

              <div class="nageri_file_inputs" id="mapDiv" style="padding:20px;">
                <div id="ArcgisSatelliteHeader" class="border border-dark" style="background-color:#20a7dd">
                  <div class="container">
                    <div class="row d-flex justify-content-between">
                      <div style="align-self: center;">
                        <label class="h4">MAKLUMAT LAKARAN GIS</label>
                      </div>
                      <div style="align-self: center;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button title="Layer" class="nav-link" style="background: border-box;" id="Senarai-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><img style="width:25px" src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/widgets/LayerList/images/icon.png?wab_dv=2.24"></button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button title="Legend" class="nav-link" style="background: border-box;" id="Legend-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><img style="width:25px" src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/widgets/Legend/images/icon.png?wab_dv=2.24"></button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button title="Editor" class="nav-link" style="background: border-box;" id="Edit-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><img style="width:25px" src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/widgets/Edit/images/icon.png?wab_dv=2.24"></button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button title="Query" class="nav-link" style="background: border-box;" id="Lakaran-tab" data-bs-toggle="tab" data-bs-target="#Lakaran" type="button" role="tab" aria-controls="Lakaran" aria-selected="true"><img style="width:25px" src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/widgets/SmartEditor/images/icon.png?wab_dv=2.24"></button>
                          </li>
                          {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" style="background: border-box;" id="Profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><img style="width:25px" src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/widgets/Query/images/icon.png?wab_dv=2.24"></button>
                          </li> --}}
                          

                          <li class="nav-item" role="presentation">
                            <button title="Basemap" class="nav-link" style="background: border-box;" id="Basemap-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><img style="width:25px" src="https://npisportal.water.gov.my/arcgis/apps/webappviewer/widgets/BasemapGallery/images/icon.png?wab_dv=2.24"></button>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="ArcgisSatellite" class="border border-dark"  style="width:100%;height:30%;">
                  <div id="toolbarDiv" class="esri-component esri-widget">
                    <button type="button" id="distance" class="esri-widget--button esri-interactive esri-icon-measure-line" title="Distance Measurement Tool">
                    </button>
                    <button type="button" id="area" class="esri-widget--button esri-interactive esri-icon-measure-area" title="Area Measurement Tool">
                    </button>
                    <button type="button" id="clear" class="esri-widget--button esri-interactive esri-icon-trash" title="Clear Measurements">
                    </button>
                  </div>
                </div>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="Lakaran" role="tabpanel" aria-labelledby="Lakaran-tab">
                      <div class="container LakaranContent  bg-white h-25 popWindow" style="overflow: auto;">
                        <div class="row ">
                          <div style="background-color:#20a7dd;" class="header w-100  d-flex justify-content-between p-2">
                            <div class="h6 text-white">Query</div>
                            <div class="text-white">
                              <span class="p-1 downBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12.575q-.2 0-.375-.062T11.3 12.3L6.7 7.7q-.275-.275-.288-.688T6.7 6.3q.275-.275.7-.275t.7.275l3.9 3.875L15.9 6.3q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Zm0 6q-.2 0-.375-.062T11.3 18.3l-4.6-4.6q-.275-.275-.288-.687T6.7 12.3q.275-.275.7-.275t.7.275l3.9 3.875l3.9-3.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Z"/></svg></span>
                              <span class="p-1 fullscreenBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M3 12h10V4H3v8zm2-6h6v4H5V6zM2 6H1V2.5l.5-.5H5v1H2v3zm13-3.5V6h-1V3h-3V2h3.5l.5.5zM14 10h1v3.5l-.5.5H11v-1h3v-3zM2 13h3v1H1.5l-.5-.5V10h1v3z"/></svg></span>
                              <span id="closeQueryBtn" class="close text-white "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg></span>
                            </div>
                          </div>
                        </div>
                        <div>
                        <label class="">Select a template to create features or click a feature on the map to edit it</label>
                        </div>
                        <form id="queryForm">
                          <div>
                            <div class="form-group col-12">
                              <label for="layerQueryData"><strong>Select layer to query</strong></label>
                              <select id="layerQueryData" class="form-control border border-info">
                                <option value="0" selected>--Pilih--</option>
                                <option value="https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/lakaran_point_feature/FeatureServer/0">Point Layer</option>
                                <option value="https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/lakaran_line_feature/FeatureServer/0">Line Layer</option>
                                <option value="https://services1.arcgis.com/5CTUlM2boWa13ftf/arcgis/rest/services/polygon_feature/FeatureServer/0">polygon Layer</option>
                              </select>
                            </div>
                            <div class="form-group col-12">
                              {{-- <label for="noRujukanData"><strong>No. Rujukan Permohonan</strong></label>
                              <input type="text" id="noRujukanData" name="noRujukanData" class="form-control border border-info"> --}}
                              <label for="noRujukanData"><strong>No. Rujukan Permohonan</strong></label>
                              <select id="noRujukanData" name="noRujukanData" class="form-control border border-info">
                                <option selected value="0">All</option>
                              </select>
                            </div>
                            <div class="form-group col-12">
                              {{-- <label for="bahagianData"><strong>Bahagian</strong></label>
                              <input type="text" id="bahagianData" name="bahagianData" class="form-control border border-info"> --}}
                              <label for="bahagianData"><strong>Bahagian</strong></label>
                              <select id="bahagianData" name="bahagianData" class="form-control border border-info">
                                <option selected value="0">All</option>
                              </select>
                            </div>
                            <div class="form-group col-12">
                            <label for="negeriData"><strong>Negeri</strong></label>
                            <select id="negeriData" class="form-control border border-info">
                              <option selected value="0">All</option>
                            </select>
                            </div>
                            <div class="form-group col-12">
                              <label for="daerahData"><strong>Daerah</strong></label>
                              <select id="daerahData" class="form-control border border-info">
                              <option selected value="0">All</option>
                            </select>
                            </div> 
                            <div class="form-group col-12">
                              <label for="parlimenData"><strong>Parlimen</strong></label>
                              <select id="parlimenData" class="form-control border border-info">
                              <option selected value="0">All</option>
                            </select>
                            </div> 
                            <div class="form-group col-12">
                              <label for="dunData"><strong>Dun</strong></label>
                              <select id="dunData" class="form-control border border-info">
                              <option selected value="0">All</option>
                            </select>
                            </div> 
                            
                            <div class="d-flex justify-content-center">
                              <button type="button" id="queryBtn" class="btn btn-primary m-1">Query</button>
                              <button type="button" id="clear-query" class="btn btn-danger m-1">Clear</button>
                              
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="Profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div id=""  style="position: absolute;top: 120.6%;z-index: 1;left: 57%;width:40%" class="container LakaranContent h-25 bg-white">
                        <div class="row">
                          <div style="background-color:#20a7dd;" class="header w-100  d-flex justify-content-between p-2">
                            <div class="h6 text-white">Carian Pelbagai</div>
                              <div class="text-white">
                                <span class="p-1 downBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12.575q-.2 0-.375-.062T11.3 12.3L6.7 7.7q-.275-.275-.288-.688T6.7 6.3q.275-.275.7-.275t.7.275l3.9 3.875L15.9 6.3q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Zm0 6q-.2 0-.375-.062T11.3 18.3l-4.6-4.6q-.275-.275-.288-.687T6.7 12.3q.275-.275.7-.275t.7.275l3.9 3.875l3.9-3.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Z"/></svg></span>
                                <span class="p-1 fullscreenBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M3 12h10V4H3v8zm2-6h6v4H5V6zM2 6H1V2.5l.5-.5H5v1H2v3zm13-3.5V6h-1V3h-3V2h3.5l.5.5zM14 10h1v3.5l-.5.5H11v-1h3v-3zM2 13h3v1H1.5l-.5-.5V10h1v3z"/></svg></span>
                                <span class=" close text-white "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg></span>
                              </div>
                            </div>
                          </div>
                            <div class="col-xs-12 ">
                              <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tasks</a>
                                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Results</a> --}}
                                  {{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                  <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a> --}}
                                {{-- </div>
                              </nav>
                              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                  <ul style="list-style-type: none;">
                                    <li class="p-3">
                                      <span style="background-color: #bf6dff;
                                      height: 15px;
                                      width: 15px;
                                      border-radius: 50%;
                                      border: solid;
                                      border-color: #2d2c70;" class="badge"> </span>
                                      Hydrological Station
                                      <hr>
                                    </li>
                                    <li class="p-3">
                                      <span style="background-color: #bf6dff;
                                      height: 15px;
                                      width: 15px;
                                      border-radius: 50%;
                                      border: solid;
                                      border-color: #2d2c70;" class="badge"> </span>
                                      Weir and Drop structure
                                      <hr>
                                    </li>
                                    <li class="p-3">
                                      <span style="background-color: #bf6dff;
                                      height: 15px;
                                      width: 15px;
                                      border-radius: 50%;
                                      border: solid;
                                      border-color: #2d2c70;" class="badge"> </span>
                                      Draw Off Tower
                                      <hr>
                                    </li>
                                    <li class="p-3">
                                      <span style="background-color: #bf6dff;
                                      height: 15px;
                                      width: 15px;
                                      border-radius: 50%;
                                      border: solid;
                                      border-color: #2d2c70;" class="badge"> </span>
                                      Tidal control gate
                                      <hr>
                                    </li>
                                    <li class="p-3">
                                      <span style="background-color: #bf6dff;
                                      height: 15px;
                                      width: 15px;
                                      border-radius: 50%;
                                      border: solid;
                                      border-color: #2d2c70;" class="badge"> </span>
                                      Water intake tower
                                      <hr>
                                    </li>
                                  </ul>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                  <label>No Result.</label>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                  Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                </div>
                                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                  Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                </div>
                              </div>
                          </div>
                        </div>
                    </div> --}}
                    <div class="tab-pane fade" id="Legend" role="tabpanel" aria-labelledby="Legend-tab">
                      <div id="" class="popWindow container LakaranContent  h-25 bg-white">
                        <div class="row ">
                          <div style="background-color:#20a7dd;" class="header w-100  d-flex justify-content-between p-2">
                            <div class="h6 text-white">Legend</div>
                              <div class="text-white">
                                <span class="p-1 downBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12.575q-.2 0-.375-.062T11.3 12.3L6.7 7.7q-.275-.275-.288-.688T6.7 6.3q.275-.275.7-.275t.7.275l3.9 3.875L15.9 6.3q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Zm0 6q-.2 0-.375-.062T11.3 18.3l-4.6-4.6q-.275-.275-.288-.687T6.7 12.3q.275-.275.7-.275t.7.275l3.9 3.875l3.9-3.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Z"/></svg></span>
                                <span class="p-1 fullscreenBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M3 12h10V4H3v8zm2-6h6v4H5V6zM2 6H1V2.5l.5-.5H5v1H2v3zm13-3.5V6h-1V3h-3V2h3.5l.5.5zM14 10h1v3.5l-.5.5H11v-1h3v-3zM2 13h3v1H1.5l-.5-.5V10h1v3z"/></svg></span>
                                <span class=" close text-white "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg></span>
                              </div>
                            </div>
                          </div>
                          {{-- <ul style="list-style-type: none;">
                            <li class="p-2">
                              NEGERI
                              <div class="p-1"><svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="none" fill-opacity="0" stroke="rgb(153, 153, 153)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" stroke-dasharray="none" dojoGfxStrokeStyle="solid" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg></div>
                            </li>
                            <li class="p-2">
                              DAERAH
                              <div><svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="none" fill-opacity="0" stroke="rgb(153, 153, 153)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" stroke-dasharray="6,4.5" dojoGfxStrokeStyle="dash" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg></div>
                            </li>
                            <li class="p-2">
                              PARLIMEN
                              <div><svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="rgb(255, 0, 0)" fill-opacity="0" stroke="rgb(255, 64, 64)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" fill-rule="evenodd" stroke-dasharray="none" dojoGfxStrokeStyle="solid" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg></div>
                            </li>
                            <li class="p-2">
                              DUN
                              <div><svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="none" fill-opacity="0" stroke="rgb(153, 153, 153)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" stroke-dasharray="6,4.5" dojoGfxStrokeStyle="dash" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg></div>
                            </li>
                            <li class="p-2">
                              Hydrological Station
                              <div style="background-color:orange;height:1px;width:1px" class="badge d-block"> </div>
                            </li>
                            <li class="p-2">Weir and Drop structure
                              <div style="background-color:green;height:1px;width:1px" class="badge d-block"> </div>
                            </li>
                            <li class="p-2">Draw Off Tower
                              <div style="background-color:blue;height:1px;width:1px" class="badge d-block"> </div>
                            </li>
                            <li class="p-2">Tidal control gate
                              <div style="background-color:purple;height:1px;width:1px" class="badge d-block"> </div>
                            </li>
                          </ul> --}}
                          <div id="LegendContent" style="height:87%">

                          </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Senarai" role="tabpanel" aria-labelledby="Senarai-tab">
                      <div id=""  class=" popWindow container LakaranContent  h-25 bg-white">
                        <div class="row ">
                          <div style="background-color:#20a7dd;" class="header w-100  d-flex justify-content-between p-2">
                            <div class="h6 text-white">Senarai Layer</div>
                              <div class="text-white">
                                <span class="p-1 downBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12.575q-.2 0-.375-.062T11.3 12.3L6.7 7.7q-.275-.275-.288-.688T6.7 6.3q.275-.275.7-.275t.7.275l3.9 3.875L15.9 6.3q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Zm0 6q-.2 0-.375-.062T11.3 18.3l-4.6-4.6q-.275-.275-.288-.687T6.7 12.3q.275-.275.7-.275t.7.275l3.9 3.875l3.9-3.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Z"/></svg></span>
                                <span class="p-1 fullscreenBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M3 12h10V4H3v8zm2-6h6v4H5V6zM2 6H1V2.5l.5-.5H5v1H2v3zm13-3.5V6h-1V3h-3V2h3.5l.5.5zM14 10h1v3.5l-.5.5H11v-1h3v-3zM2 13h3v1H1.5l-.5-.5V10h1v3z"/></svg></span>
                                <span class=" close text-white close" id="closesenerailayer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg></span>
                              </div>
                            </div>
                            <div class="d-flex p-2 col-12 justify-content-between">
                              <div class="p-2">Layers</div>
                              <div class="p-2 d-flex">
                                <svg id="searchSenarai" class="searchSenarai m-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg>                          
                                <div class="dropdown">
                                  <button type="button" class="btn btn dropdown-toggle" data-toggle="dropdown">
                                    <svg id="listSenarai" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.5 21h1v-2.5H21v-1h-2.5V15h-1v2.5H15v1h2.5V21Zm.5 2q-2.075 0-3.538-1.463T13 18q0-2.075 1.463-3.538T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23ZM9 7V5h12v2H9ZM5 20q-.825 0-1.413-.588T3 18q0-.825.588-1.413T5 16q.825 0 1.413.588T7 18q0 .825-.588 1.413T5 20Zm0-6q-.825 0-1.413-.588T3 12q0-.825.588-1.413T5 10q.825 0 1.413.588T7 12q0 .825-.588 1.413T5 14Zm0-6q-.825 0-1.413-.588T3 6q0-.825.588-1.413T5 4q.825 0 1.413.588T7 6q0 .825-.588 1.413T5 8Zm4 11v-2h2.075Q11 17.5 11 18t.075 1H9Zm0-6v-2h9q-1.425 0-2.675.537T13.125 13H9Z"/></svg>
                                  </button>
                                  <div id="menu-item" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Turn all layers on</a>
                                    <a class="dropdown-item" href="#">Turn all layers off</a>
                                    <a class="dropdown-item-text" href="#">Expand all layersk</a>
                                    <span class="dropdown-item-text">Collapse all layers</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="searchInput" class="searchInput col-11 d-none">
                              <input class="col-12" type="text" placeholder="Type a Keyword">
                              <button id="cancelSearchBtn" type="button" class="btn btn-outline-secondary m-2 rounded-0">Cancel</button>
                               <button class="btn btn-sm border ml-1">Cancel</button>
                            </div>
                            <div class="col-12">
                              {{-- <details>
                                <summary>
                                  <label class="form-check" style="display: initial !important;">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                      Negeri
                                    </label>
                                  </label>
                                </summary>
                                  <svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="none" fill-opacity="0" stroke="rgb(153, 153, 153)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" stroke-dasharray="none" dojogfxstrokestyle="solid" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg>
                              </details>
                              <details>
                                <summary>
                                  <label class="form-check" style="display: initial !important;">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked>
                                    <label class="form-check-label" for="flexCheckChecked2">
                                      Daerah
                                    </label>
                                  </label>
                                </summary>
                                <svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="none" fill-opacity="0" stroke="rgb(153, 153, 153)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" stroke-dasharray="6,4.5" dojoGfxStrokeStyle="dash" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg>
                              </details>
                              <details>
                                <summary>
                                  <label class="form-check" style="display: initial !important;">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                      Parlimen
                                    </label>
                                  </label>
                                </summary>
                                <svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="rgb(255, 0, 0)" fill-opacity="0" stroke="rgb(255, 64, 64)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" fill-rule="evenodd" stroke-dasharray="none" dojoGfxStrokeStyle="solid" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg>
                              </details>
                              <details>
                                <summary>
                                  <label class="form-check" style="display: initial !important;">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" checked>
                                    <label class="form-check-label" for="flexCheckChecked4">
                                      Dun
                                    </label>
                                  </label>
                                </summary>
                                <svg overflow="hidden" width="30" height="30" style="touch-action: none;"><defs></defs><path fill="none" fill-opacity="0" stroke="rgb(153, 153, 153)" stroke-opacity="1" stroke-width="1.5" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="4" path="M -10,-10 L 10,0 L 10,10 L -10,10 L -10,-10 Z" d="M-10-10L 10 0L 10 10L-10 10L-10-10Z" stroke-dasharray="none" dojogfxstrokestyle="solid" transform="matrix(1.00000000,0.00000000,0.00000000,1.00000000,15.00000000,15.00000000)"></path></svg>
                              </details> --}}
                              <div id="LayerContent">

                              </div>
                            </div>

                          </div>
                        </div>
                    </div> 
                    <div class="tab-pane fade" id="Basemap" role="tabpanel" aria-labelledby="Basemap-tab">
                      <div id="t"  class="popWindow container LakaranContent  h-25 bg-white">
                        <div class="row ">
                          <div style="background-color:#20a7dd;" class="header w-100  d-flex justify-content-between p-2">
                            <div class="h6 text-white">Basemap</div>
                              <div class="text-white">
                                <span class="p-1 downBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12.575q-.2 0-.375-.062T11.3 12.3L6.7 7.7q-.275-.275-.288-.688T6.7 6.3q.275-.275.7-.275t.7.275l3.9 3.875L15.9 6.3q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Zm0 6q-.2 0-.375-.062T11.3 18.3l-4.6-4.6q-.275-.275-.288-.687T6.7 12.3q.275-.275.7-.275t.7.275l3.9 3.875l3.9-3.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Z"/></svg></span>
                                <span class="p-1 fullscreenBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M3 12h10V4H3v8zm2-6h6v4H5V6zM2 6H1V2.5l.5-.5H5v1H2v3zm13-3.5V6h-1V3h-3V2h3.5l.5.5zM14 10h1v3.5l-.5.5H11v-1h3v-3zM2 13h3v1H1.5l-.5-.5V10h1v3z"/></svg></span>
                                <span class=" close text-white close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg></span>
                              </div>
                            </div>
                            <div id="BasemapGallery" class="col-12"></div>
                          </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Edit" role="tabpanel" aria-labelledby="Edit-tab">
                      <div id=""  class="popWindow container LakaranContent h-25 bg-white">
                        <div class="row ">
                          <div style="background-color:#20a7dd;" class="header w-100  d-flex justify-content-between p-2">
                              <div class="h6 text-white">Edit</div>
                              <div class="text-white">
                                <span class="p-1 downBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12.575q-.2 0-.375-.062T11.3 12.3L6.7 7.7q-.275-.275-.288-.688T6.7 6.3q.275-.275.7-.275t.7.275l3.9 3.875L15.9 6.3q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Zm0 6q-.2 0-.375-.062T11.3 18.3l-4.6-4.6q-.275-.275-.288-.687T6.7 12.3q.275-.275.7-.275t.7.275l3.9 3.875l3.9-3.875q.275-.275.688-.288t.712.288q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062Z"/></svg></span>
                                <span class="p-1 fullscreenBtn text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M3 12h10V4H3v8zm2-6h6v4H5V6zM2 6H1V2.5l.5-.5H5v1H2v3zm13-3.5V6h-1V3h-3V2h3.5l.5.5zM14 10h1v3.5l-.5.5H11v-1h3v-3zM2 13h3v1H1.5l-.5-.5V10h1v3z"/></svg></span>
                                <span class=" close text-white" id="cancelBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg></span>
                              </div>
                          </div>
                            <!-- Code for jey for editor -->
                            <div id="editArea" class="editArea-container esri-widget--panel col-12">
                              <div id="addFeatureDiv" style="display:block;">
                                <h5 class="list-heading">Editor</h5>
                                <button id="selectBtn" type="button" class="btn btn-light  selectBtn ml-4" style="width: 90%;">Select To Edit</button>
                                <div id="addTemplatesDiv" class="addTemplatesDiv"  style="background:#fff;display: flex;flex-flow: column;flex-direction: column-reverse;width: 100%;padding: 25px;"></div>
                              {{-- <label>Click Feature to Edit</label> --}}
                            </div>
                            <!-- for point -->
                            <div id="featureUpdateDiv" style="display:none; margin-top: 1em;">
                              <div class="row">
                                <div class="col-12" id="attributeArea">
                                  <div id="formDiv">
                                    <div class="row">
                                      <div class="form-group col-12">
                                        <label for="pointkomponenkerja">Komponen Kerja</label>
                                        <select id="pointkomponenkerja" class="form-control"></select>
                                        <!-- <input type="text" class="form-control" id="pointkomponenkerja" value="2" readonly /> -->
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointnamakomponen">Nama Komponen</label>
                                        <input type="text" class="form-control" id="pointnamakomponen" value="" />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointnamaprojek">Nama Projek</label>
                                        <input type="text" class="form-control" id="pointnamaprojek" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointnorujukan">No Rujukan Permohanan</label>
                                        <input type="text" class="form-control" id="pointnorujukan" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointbahagian">Bahagian</label>
                                        <input type="text" class="form-control" id="pointbahagian" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointnegeri">Negeri</label>
                                        <input type="text" class="form-control" id="pointnegeri" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointdaerah">Daerah</label>
                                        <input type="text" class="form-control" id="pointdaerah" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointparlimen">Parlimen</label>
                                        <input type="text" class="form-control" id="pointparlimen" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointdun">Dun</label>
                                        <input type="text" class="form-control" id="pointdun" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointtahun">Tahun Permohonan</label>
                                        <input type="text" class="form-control" id="pointtahun" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointjenis">Jenis Permohonan</label>
                                        <input type="text" class="form-control" id="pointjenis" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointlatitude">Latitud</label>
                                        <input type="text" class="form-control" id="pointlatitude" readonly />
                                      </div>
                                      <div class="form-group col-12">
                                        <label for="pointlongitude">Longitud</label>
                                        <input type="text" class="form-control" id="pointlongitude" readonly />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12 d-flex" style="justify-content: space-evenly;">
                                  <div>
                                    <input type="button" class="esri-button btn btn-success" value="Update" id="btnUpdate" style="background: rgb(80, 247, 202);border-radius: 7px;" />
                                  </div>
                                  <div id="deleteArea">
                                    <input type="button" class="esri-button btn btn-danger" value="Delete" id="btnDelete" style="background: red;border-radius: 7px;"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- end point-->
                             
                          <!-- for line -->
                          <div id="featureUpdateDivline" style="display:none; margin-top: 1em;">
                            <div class="row">
                              <div id="attributeArealine" class="col-12">
                                <div id="formDivline">
                                  <div class="row">
                                    <div class="form-group col-12">
                                      <label for="linekomponenkerja">Komponen Kerja</label>
                                      <select id="linekomponenkerja" class="form-control"></select>
                                      <!-- <input type="text" class="form-control" id="linekomponenkerja" value="2" readonly /> -->
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linenamakomponen">Nama Komponen</label>
                                      <input type="text" class="form-control" id="linenamakomponen" value="" />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linenamaprojek">Nama Projek</label>
                                      <input type="text" class="form-control" id="linenamaprojek" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linenorujukan">No Rujukan Permohanan</label>
                                      <input type="text" class="form-control" id="linenorujukan" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linebahagian">Bahagian</label>
                                      <input type="text" class="form-control" id="linebahagian" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linenegeri">Negeri</label>
                                      <input type="text" class="form-control" id="linenegeri" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linedaerah">Daerah</label>
                                      <input type="text" class="form-control" id="linedaerah" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="lineparlimen">Parlimen</label>
                                      <input type="text" class="form-control" id="lineparlimen" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linedun">Dun</label>
                                      <input type="text" class="form-control" id="linedun" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linetahun">Tahun Permohonan</label>
                                      <input type="text" class="form-control" id="linetahun" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linejenis">Jenis Permohonan</label>
                                      <input type="text" class="form-control" id="linejenis" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="linepanjang">Pangang (m)</label>
                                      <input type="text" class="form-control" id="linepanjang" readonly />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 d-flex" style="justify-content: space-evenly;">
                                <div>
                                <input type="button" class="esri-button" value="Update" id="btnUpdateline" style="background: rgb(80, 247, 202);border-radius: 7px;" />
                                </div>
                                <div id="deleteArealine">
                                  <input type="button" class="esri-button" value="Delete" id="btnDeleteline" style="background: red;border-radius: 7px;"/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- for line ends -->
                          <!-- for polygon -->
                          <div id="featureUpdateDivpoly" style="display:none; margin-top: 1em;">
                            <div class="row">
                              <div class="col-12" id="attributeAreapoly">
                                <div id="formDivpoly">
                                  <div class="row">
                                    <div class="form-group col-12">
                                      <label for="polykomponenkerja">Komponen Kerja</label>
                                      <select id="polykomponenkerja" class="form-control"></select>
                                      <!-- <input type="text" class="form-control" id="polykomponenkerja" value="2" readonly /> -->
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polynamakomponen">Nama Komponen</label>
                                      <input type="text" class="form-control" id="polynamakomponen" value="" />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polynorujukan">No Rujukan Permohanan</label>
                                      <input type="text" class="form-control" id="polynorujukan" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polynamaprojek">Nama Projek</label>
                                      <input type="text" class="form-control" id="polynamaprojek" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polybahagian">Bahagian</label>
                                      <input type="text" class="form-control" id="polybahagian" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polynegeri">Negeri</label>
                                      <input type="text" class="form-control" id="polynegeri" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polydaerah">Daerah</label>
                                      <input type="text" class="form-control" id="polydaerah" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polyparlimen">Parlimen</label>
                                      <input type="text" class="form-control" id="polyparlimen" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polydun">Dun</label>
                                      <input type="text" class="form-control" id="polydun" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polytahun">Tahun Permohonan</label>
                                      <input type="text" class="form-control" id="polytahun" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polyjenis">Jenis Permohonan</label>
                                      <input type="text" class="form-control" id="polyjenis" readonly />
                                    </div>
                                    <div class="form-group col-12">
                                      <label for="polyluas">Luas(sqm)</label>
                                      <input type="text" class="form-control" id="polyluas" readonly />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 d-flex" style="justify-content: space-evenly;">
                                <div>
                                  <input type="button" class="esri-button" value="Update" id="btnUpdatepoly" style="background: rgb(80, 247, 202);border-radius: 7px;" />
                                </div>
                                <div id="deleteAreapoly">
                                  <input type="button" class="esri-button" value="Delete" id="btnDeletepoly" style="background: red;border-radius: 7px;"/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- for polygon ends -->

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              

              <hr>

              <div class="nageri_file_inputs">
                <p class="mb-0 h6"><b>Sila muatnaik gambar dan keterangan :</b></p>
                <p class="mb-0 mt-2 h6">1. Pelan lokasi yang mengandungi skop projek (<a href="{{ asset('assets/images/pelan_lokasi.png') }}" download>Contoh</a>)</p>
                <p class="mb-0  h6">2. Gambar kejadian banjir, Keratan Akhbar, Lampiran dan Dokumen Sokongan (Surat Kelulusan dsb) atau yang berkaitan dengan Permohonan Projek (<a href="{{ asset('assets/images/Keratan Akhbar.jpg') }}" download>Contoh</a>)</p>
                <p class="mb-0 h6">3. Keterangan gambar perlulah menjelaskan lokasi, tarikh kejadian dan kedalaman banjir sekiranya berkaitan</p>
                <br>

                <label for="Logo 1" class="d-flex"><p class="gam">Gambar</p>
                  <button type="button" class="pop_btn" onmouseover="myFunction()" onmouseout="mouseout()">
                  <img src="{{ asset('assets/images/i-icon.png') }}" alt="icon" /></button>
                </label>
                <div class="position-absolute pop_content d-none" id="gmbar_pop">
                  <p id="pop">Gambar kejadian banjir/surat sokongan/keratan akhbar dokumen perlu dalam format jpeg/png/jpg</p>
                </div>

                <div class="nageri_files row">
                  <div class="col-lg-6 col-xs-12 d-flex m-1">
                    <div class="inputWrapper" id="upload_logo">
                      <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto" alt="">
                      <h5 class="font">
                        Letakkan fail di sini atau klik untuk memuat naik
                      </h5>
                      <p class="font">(Saiz fail tidak melebihi 4mb)</p>
                      <input class="fileInput hidden" type="file" id="gambar_image" name="gambar_image" @if($is_submitted) disabled @endif/>
                    </div>
                    <div class="image_preview col-lg-12" id="image_preview_1">
                      <div class="uploaded_img_preview_container" id="langing_header_1">
                        <div class="uploaded_img">
                          <img src="" id="Logo_img_1" alt="" width="auto" height="80"/>
                        </div>
                        <div class="uploaded_img_details">
                            <h5 id="header_logo_name_1"></h5>
                            <p class="flie_size" id="header_log_size_1"></p>
                        </div>
                        <button type="button" class="remove_image" id="remove_logo_1">
                          <img src="{{ asset('assets/images/close_img.png') }}" alt="" />
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-xs-12 m-1">
                    <div class="form-group nageri_textarea">
                      <label for="exampleFormControlTextarea1">Keterangan</label>
                      <textarea class="form-control" id="katerangan" rows="3" @if($is_submitted) disabled @endif ></textarea>
                      <span class="error" id="error_katerangan"></span>
                    </div>
                  </div>
                </div>
                <p class="file_size d-none" id="file_size">Saiz fail tidak melebihi 4 mb</p>
                <p class="file_type d-none" id="file_type">Jenis fail tidak sah</p>
                <p id="gambar_image_error"></p>

                <div class="button_nageri lokasi_footer w-100">
                @if(!$is_submitted) 
                  <button type="button" class="nageri_add d-flex ml-auto" onclick="myCreateFunction()"> Tambah </button>
                @endif
                </div>
              </div>

              <div class="nageri_tables table_scroll mt-2">
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col" class="nageri_roll">Bil</th>
                      <th scope="col">Imej</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody id="table_body">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="nageri_footer">
              @if(!$is_submitted)
                <button type="button"  id="negeri_lokasi_save">Simpan</button>              
              @endif
              <button class="nageri_green green" type="button" id="negeri_lokasi_next" style="background-color: #0ACF97">
                <a class="text-decoration-none text-white" href="{{route('daftar.section',[$id ,$status,$user_id, 'kewangan'])}}">Seterusnya</a>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('masterPortal.result_modal')



  <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>

  <!-- Mainbody_conatiner Starts -->
</div>

@endsection


@section('scripts')
@include('project.negeri-new.script')

    {{-- <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js"></script>
    
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@^3.1.3/dist/esri-leaflet-geocoder.css">
    <script src="https://unpkg.com/esri-leaflet-geocoder@^3.1.3/dist/esri-leaflet-geocoder.js"></script>

    <link rel="stylesheet" href="https://js.arcgis.com/4.26/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.26/"></script> --}}


{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhSDqFAuLoGHPw8UDYt2VGIvSjU6Ze10w&callback=initMap"defer></script> --}}
   
 {{-- <script>

  let map;
let marker;
let geocoder;
let responseDiv;
let response;

function initMap() {
  
  const coords = { lat: 3.144667094893797, lng: 101.639596390336 };

  map = new google.maps.Map(document.getElementById("my_map"), {
    zoom: 5,
    center: coords,
    mapTypeControl: false,
  });
  //   const marker = new google.maps.Marker({
  //   position: coords,
  //   map: map,
  // });
  geocoder = new google.maps.Geocoder();

  const inputText = document.createElement("input");

  inputText.type = "text";
  inputText.placeholder = "Enter a location";

  const submitButton = document.createElement("input");

  submitButton.type = "button";
  submitButton.value = "Search";
  submitButton.classList.add("button", "button-primary");

  const clearButton = document.createElement("input");

  clearButton.type = "button";
  clearButton.value = "Clear";
  clearButton.classList.add("button", "button-secondary");
  response = document.createElement("pre");
  response.id = "response";
  response.innerText = "";
  responseDiv = document.createElement("div");
  responseDiv.id = "response-container";
  responseDiv.appendChild(response);

  const instructionsElement = document.createElement("p");

  instructionsElement.id = "instructions";
  instructionsElement.innerHTML =
    "<strong>Instructions</strong>: Enter an address in the textbox to geocode or click on the map to reverse geocode.";
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
  // map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
  // map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
  marker = new google.maps.Marker({
    map,
  });
  map.addListener("click", (e) => {
    geocode({ location: e.latLng });
  });
  submitButton.addEventListener("click", () =>
    geocode({ address: inputText.value })
  );
  clearButton.addEventListener("click", () => {
    clear();
    $("#latitude").val("");
    $("#logitude").val("");
    initMap();
  });
  clear();
}

function clear() {
  marker.setMap(null);
  responseDiv.style.display = "none";

  
}

function geocode(request) {
  clear();
  geocoder
    .geocode(request)
    .then((result) => {
      // console.log(result)

      const { results } = result;

      map.setCenter(results[0].geometry.location);
      map.setZoom(15);
      marker.setPosition(results[0].geometry.location);
      marker.setMap(map);



      // responseDiv.style.display = "block";
      response.innerText = JSON.stringify(result);
      var parsed_val=JSON.parse(response.innerText)
      $("#latitude").val(parsed_val.results[0].geometry.location.lat)
      $("#logitude").val(parsed_val.results[0].geometry.location.lng)

      return results;
    })
    .catch((e) => {
      alert("Geocode was not successful for the following reason: " + e);
    });
}

window.initMap = initMap;
 </script> --}}

 <script>
  $(document).ready(function(){    
    const layerGroup = L.layerGroup().addTo(map);

      map.on("click", function (e) {
        results.clearLayers(); 
        L.esri.Geocoding
          .reverseGeocode({
            apikey: apiKey
          })
          .latlng(e.latlng)

          .run(function (error, result) {
            if (error) {
              return;
            }

            layerGroup.clearLayers();

            marker = L.marker(result.latlng).addTo(layerGroup);

            const lngLatString = `${Math.round(result.latlng.lng * 100000) / 100000}, ${Math.round(result.latlng.lat * 100000) / 100000}`;
            var locationName=result.address.Match_addr;
            marker.bindPopup(`<b>${lngLatString}</b><p>${result.address.Match_addr}</p>`);
            marker.openPopup();
            $("#NegeriName").val(locationName)
            $("#latitude").val(Math.round(result.latlng.lat * 100000) / 100000)
            $("#logitude").val(Math.round(result.latlng.lng * 100000) / 100000)

          });

      });

      $("#homeBtn").append('<a id="mapHomeBtn" style="    position: relative;padding: 0px !important;top: 100px;z-index: 999;left: 14px;" class="btn btn-light" role="button"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/></svg></span></a>')
      $("#mapHomeBtn").click(function(){ 
        map.setView([3.1412,101.68653], 7);   
        // layerGroup.clearLayers();
        // results.clearLayers();

      })
  })

  const map = L.map("my_map", {
    minZoom: 2,
    maxZoom:20,
  })

  map.setView([3.1412,101.68653], 7);

  const apiKey = "AAPK1e47701066e44f899aac8dfdecb2474bfpxg_oM5aqsBgsHmF8EMF9xXBuQrHnRNpm5ef1cCfFYlz-pOI5q3GQm1j5Ez88sY";


  // const basemapEnum = "ArcGIS:Navigation";

  // L.esri.Vector.vectorBasemapLayer(basemapEnum, {
  //   apiKey: apiKey
  // }).addTo(map);


  
  const basemapLayers = {
Streets: L.esri.Vector.vectorBasemapLayer("ArcGIS:Navigation", { apiKey: apiKey }).addTo(map),
Navigation: L.esri.Vector.vectorBasemapLayer("ArcGIS:Streets", { apiKey: apiKey }),
Topographic: L.esri.Vector.vectorBasemapLayer("ArcGIS:Topographic", { apiKey: apiKey }),
"Light Gray": L.esri.Vector.vectorBasemapLayer("ArcGIS:LightGray", { apiKey: apiKey }),
"Dark gray": L.esri.Vector.vectorBasemapLayer("ArcGIS:DarkGray", { apiKey: apiKey }),
"Streets Relief": L.esri.Vector.vectorBasemapLayer("ArcGIS:StreetsRelief", { apiKey: apiKey }),
Imagery: L.esri.Vector.vectorBasemapLayer("ArcGIS:Imagery", { apiKey: apiKey }),
ChartedTerritory: L.esri.Vector.vectorBasemapLayer("ArcGIS:ChartedTerritory", { apiKey: apiKey }),
ColoredPencil: L.esri.Vector.vectorBasemapLayer("ArcGIS:ColoredPencil", { apiKey: apiKey }),
Nova: L.esri.Vector.vectorBasemapLayer("ArcGIS:Nova", { apiKey: apiKey }),
Midcentury: L.esri.Vector.vectorBasemapLayer("ArcGIS:Midcentury", { apiKey: apiKey }),
OSM: L.esri.Vector.vectorBasemapLayer("OSM:Standard", { apiKey: apiKey }),
"OSM:Streets": L.esri.Vector.vectorBasemapLayer("OSM:Streets", { apiKey: apiKey })
};

L.control.layers(basemapLayers,null, { collapsed: true }).addTo(map);

  
  const searchControl = L.esri.Geocoding.geosearch({
    position: "topright",
    placeholder: "Cari",
    zoomToResult: true,
    useMapBounds: 15,
    providers: [
      L.esri.Geocoding.arcgisOnlineProvider({
        apikey: apiKey,
        nearby: {
          lat: 3.1412,
          lng: 101.68653
        },

      })
    ]
  }).addTo(map);
  
  const results = L.layerGroup().addTo(map);
  
  searchControl.on("results", (data) => {
    results.clearLayers();

    for (let i = data.results.length - 1; i >= 0; i--) {
      const marker = L.marker(data.results[i].latlng);
      
      const lngLatString = `${Math.round(data.results[i].latlng.lng * 100000) / 100000}, ${
        Math.round(data.results[i].latlng.lat * 100000) / 100000
      }`;
      marker.bindPopup(`<b>${lngLatString}</b><p>${data.results[i].properties.LongLabel}</p>`);
      results.addLayer(marker);
      
      marker.openPopup();
      var locationName=data.results[i].properties.LongLabel;
            $("#NegeriName").val(locationName);
            $("#latitude").val(Math.round(data.results[i].latlng.lat * 100000) / 100000)
            $("#logitude").val(Math.round(data.results[i].latlng.lng * 100000) / 100000)
            // $("#mapHomeBtn").click(function(){  
            //   results.clearLayers();
            // })
    }

    const layerGroup = L.layerGroup().addTo(map);

      map.on("click", function (e) {

        results.clearLayers();
        L.esri.Geocoding
          .reverseGeocode({
            apikey: apiKey
          })
          .latlng(e.latlng)

          .run(function (error, result) {
            if (error) {
              return;
            }

            layerGroup.clearLayers();

            marker = L.marker(result.latlng).addTo(layerGroup);

            const lngLatString = `${Math.round(result.latlng.lng * 100000) / 100000}, ${Math.round(result.latlng.lat * 100000) / 100000}`;

            marker.bindPopup(`<b>${lngLatString}</b><p>${result.address.Match_addr}</p>`);
            var locationName=result.address.Match_addr;
            marker.openPopup();
            $("#latitude").val(Math.round(result.latlng.lat * 100000) / 100000)
            $("#logitude").val(Math.round(result.latlng.lng * 100000) / 100000)
            $("#NegeriName").val(locationName)
          });

      });
      // $("#mapHomeBtn").click(function(){ 
      //   layerGroup.clearLayers();
      // })

    $("#latitude").val(data.results[0].latlng.lat)
    $("#logitude").val(data.results[0].latlng.lng)

  
  });

</script>

<script>
  



        $("#ArcgisSatellite").css("position: relative;")
        $("#Lakaran-tab").click(function(){
          $("#Lakaran").addClass('show');
          $("#Profile").removeClass('show');
          $("#Legend").removeClass('show');
          $("#Senarai").removeClass('show');
          $("#Basemap").removeClass('show');
          $("#Edit").removeClass('show');
                  // get UI components involved in top features query
        const orderDirectionSelection = document.getElementById("layerQueryData");
        const orderByFieldSelection = document.getElementById("negeriData");
        const clearQueryButton = document.getElementById("clear-query");
        const queryParksButton = document.getElementById("queryBtn");

          document.getElementById("queryBtn").addEventListener("click", async () => {
            clearQueryButton.appearance = "outline";
            queryParksButton.appearance = "solid";

            // check if the user wants to select the most or least visited parks
            // in each state
            const queryOrder = orderDirectionSelection.value;
            const orderByField = [
              `${orderByFieldSelection.value} ${queryOrder}`
            ];

          // TopFeatureQuery parameter for the queryTopFeatures method
          // collect user inputs to query either the most or the least
          // visited national parks in each state
          // query = new TopFeaturesQuery({
          //   topFilter: new TopFilter({
          //     topCount: parseInt(topCountSelect.value),
          //     groupByFields: ["State"],
          //     orderByFields: orderByField
          //   }),
          //   orderByFields: orderByField,
          //   outFields: ["State, TOTAL, F2018, F2019, F2020, Park"],
          //   returnGeometry: true,
          //   cacheHint: false
          // });
          // const results = await layer.queryTopFeatures(query);
          // console.log(results)


          document.getElementById("resultsDiv").style.display = "block";
          document.getElementById("resultsHeading").innerHTML = `Results: ${results.features.length} parks`;
          document.getElementById("results").innerHTML = "";
          console.log(results.features)

          graphics = results.features;
          graphics.forEach((result, index) => {
            const attributes = result.attributes;
            const item = document.createElement("calcite-pick-list-item");
            item.setAttribute("label", attributes.Park);
            item.setAttribute("value", index);

            const visitorTotal = orderByFieldSelection.selectedOption.value;
            const total = `Total visitors: ${attributes[visitorTotal]}`;
            const state = `State: ${attributes.State}`;
            const description = total + "" + state;
            item.setAttribute("description", description);
            item.addEventListener("click", parkResultClickHandler);
            document.getElementById("results").appendChild(item);
          });



          // set query for the queryTopObjectIds.
          query.orderByFields = [""];
          const objectIds = await layer.queryTopObjectIds(query);
          layerView.filter = {
            objectIds
          };

        });
      })

        $("#Profile-tab").click(function(){
          $("#Lakaran").removeClass('show');
          $("#Profile").addClass('show');
          $("#Legend").removeClass('show');
          $("#Senarai").removeClass('show');
          $("#Basemap").removeClass('show');
          $("#Edit").removeClass('show');
        })
        $("#Legend-tab").click(function(){
          $("#Lakaran").removeClass('show');
          $("#Profile").removeClass('show');
          $("#Legend").addClass('show');
          $("#Senarai").removeClass('show');
          $("#Basemap").removeClass('show');
          $("#Edit").removeClass('show');
                axios({
                  method: 'get',
                  url: "https://www.arcgis.com/sharing/oauth2/token?client_id=Eg0PDju5clxYEptF&client_secret=1100d050a03c43d3b04e4d11f0a11817&grant_type=client_credentials",
                  responseType: 'json',
                  ContentType: "application/json",
                  })
                  .then(function (response) {
                    var token=response.data.access_token;
                    console.log(response)  
                    window.localStorage.setItem('esritoken', token);
                    var storedToken=window.localStorage.getItem('esritoken');
                      axios({
                      method: 'POST',
                      url: "validationAccessToken",
                      responseType: 'json',
                      data:[storedToken],
                      ContentType: "application/json",
                      })
                      .then(function (response) {
                        console.log(response)
                        
                        // $("#esirDashboard").attr('src',"https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html?id=dc53af74ec194c21abc0009417bcfea4")
                      })

                  
                  })
                //   require([
                //   "esri/portal/Portal",
                //   "esri/identity/OAuthInfo",
                //   "esri/identity/IdentityManager"
                // ], function (Portal, OAuthInfo, esriId) {

                //   const info = new OAuthInfo({
                //     appId: "Eg0PDju5clxYEptF",
                //     popup: false // the default
                //   });
                //   esriId.registerOAuthInfos([info]);

                //   function handleSignedIn() {

                //     const portal = new Portal();
                //     portal.load().then(() => {
                //       const results = { name: portal.user.fullName, username: portal.user.username };
                //       document.getElementById("results").innerText = JSON.stringify(results, null, 2);
                //     });

                //   }

                // });

        })
        // $("#Senarai-tab").click(function(){
        //   map.remove(graphicsLayer);
        //   map.remove(graphicsLayerpoly);
        //   $("#Lakaran").removeClass('show');
        //   $("#Profile").removeClass('show');
        //   $("#Legend").removeClass('show');
        //   $("#Senarai").addClass('show');
        //   $("#Basemap").removeClass('show');
        //   $("#Edit").removeClass('show');
        // })
        $("#Basemap-tab").click(function(){
          $("#Lakaran").removeClass('show');
          $("#Profile").removeClass('show');
          $("#Legend").removeClass('show');
          $("#Senarai").removeClass('show');
          $("#Basemap").addClass('show');
          $("#Edit").removeClass('show');

        })
        $("#Edit-tab").click(function(){
          $("#Lakaran").removeClass('show');
          $("#Profile").removeClass('show');
          $("#Legend").removeClass('show');
          $("#Senarai").removeClass('show');
          $("#Basemap").removeClass('show');
          $("#Edit").addClass('show');
        })

        $(".close").click(function(){
          $("#Lakaran").removeClass('show');
          $("#Profile").removeClass('show');
          $("#Legend").removeClass('show');
          $("#Senarai").removeClass('show');
          $("#Basemap").removeClass('show');
          $("#Edit").removeClass('show');
        })

        $("#searchSenarai").click(function(){
          $("#searchInput").addClass('d-flex')
          $("#searchInput").removeClass('d-none')
        })
        $("#cancelSearchBtn").click(function(){
          $("#searchInput").removeClass('d-flex')
          $("#searchInput").addClass('d-none')
        })
    

        

  
</script>


@endsection

