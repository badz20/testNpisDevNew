@include('project.dashboard.style')
@extends('layouts.dashboard.master_dashboard_responsive')
@section('content_dashboard')
<!-- Mainbody_conatiner Starts -->
<div class="Mainbody_conatiner ml-auto" style="width: 100% !important">
  <x-form.spinner>
    <x-slot name="message">
      Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner>
    <div class="Mainbody_content mtop">
      <div class="Mainbody_content_nav_header project_register d-flex mt-5">
        <div class="col-lg-5 col-md-6 col-xs-12 mt-4">
          <h4 class="project_register">Dashboard</h4>
        </div>
        <div class="col-lg-7 col-md-6 col-xs-12 path_nav_col row mt-4">
          <ul class="path_nav"> 
            <li>
              <a href="#" class="text-info" style="display: flex; align-items: center;">
                <span class="iconify icon_blue breadcrumbs_icon mr-2" data-icon="mdi-briefcase-variant"></span>
                Permohonan Projek
                <img
                  class="arrow_nav ml-2"
                  src="assets/images/arroew.png"
                  alt="arroew"
                />
              </a>
            </li>
            {{-- <li>
              <a href="#">
                Permohonan Projek
                <img
                  class="arrow_nav"
                  src="assets/images/arroew.png"
                  alt="arroew"
              /></a>
            </li> --}}
            <li><a href="#" class=" active"> Dashboard</a></li>
          </ul>
        </div>
      </div>
      <div class="project_register_content_container">
        <div class="dashboard_container">
          <div class="dashboard_content_header">
            <h4>
              <img src="assets/images/map.png" alt="" /> Lokasi permohonan
              projek
            </h4>
            <button><img src="assets/images/home.png" alt="home"/></button>
          </div>
          <div class="dashboard_content" id="dashboard">
            <div class="dashboard_left_content_container col-12">
              <div class="iframe_holder">
                <iframe
                  src="{{$url}}"
                  style="border: 0"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
</div>
@include('project.dashboard.script')

@endsection
