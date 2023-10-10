@include('project.dashboard.style')
@extends('layouts.main.master')
    
@section('content_main')

{{-- Mainbody_conatiner Starts --}}
<div class="Mainbody_conatiner ml-auto" style="width: 100% !important">
  <x-form.spinner>
    <x-slot name="message">
      Sila tunggu sebentar sementara data sedang dimuatkan
    </x-slot>
  </x-form.spinner>
    <div class="Mainbody_content mtop">
      <div class="Mainbody_content_nav_header project_register row">
        <div class="col-md-7 col-xs-12 path_nav_col">
          <ul class="path_nav row">
            
            <li><a href="#" class="active text-secondary"> Dashboard</a></li>
          </ul>
        </div>
      </div>
      <div class="Mainbody_content_nav_header project_register d-flex">
        <h4 class="project_list">Dashboard</h4>
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
          <li><a href="#" class="active"> Dashboard</a></li>
        </ul>
      </div>
      <div class="project_register_content_container">
        <div class="dashboard_container">
          <div class="dashboard_content_header">
            <h4>
              <img src="assets/images/map.png" alt="" /> Esri Dashboard
            </h4>
            {{-- <button><img src="assets/images/home.png" alt="home" /></button> --}}
          </div>
          <div class="dashboard_content" id="dashboard">
            <div class="dashboard_left_content_container w-100">
              <div class="iframe_holder vh-100">
                <iframe src="{{$url}}"style="border: 0"loading="lazy"referrerpolicy="no-referrer-when-downgrade"id="esirDashboard"height="100%"width="100%" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                
              </div>
            </div>
          </div>
        </div>
      </div>
          
    </div>
  </div>
</div> 
@include('project.dashboard.script')

@endsection
