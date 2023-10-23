@include('project.dashboard.bahagian_style')
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
            <div class="Mainbody_content_nav_header project_register d-flex flex-wrap">
                <h4 class="project_list">Senarai Modul NPIS</h4>
            </div>

            {{-- <iframe title="MODULE PERMOHONAN DEMO (22.08.23)" width="100%" height="100%" src="https://app.powerbi.com/reportEmbed?reportId=af018327-8d68-479d-ae6c-59915c91744e&autoAuth=true&ctid=6c36511e-f86e-4e58-a323-a448ab57551d" frameborder="0" allowFullScreen="true"></iframe> --}}
            <div class="project_register_content_container">
                <div class="project_register_table_container">
                    <div class="project_register_search_container d-flex col-12">
                        <div class="card-body">
                            <table class="modulNpis_table">
                                <tbody>
                                    <tr class="modulNpis_row text-center mb-5">
                                        <td class="">
                                            <a href="/project-dashboard">
                                                <button class="modulNpis_col modulNpis_col1 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                        <style>svg{fill:#585858}</style>
                                                        <path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm64 236c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-64c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-72v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm96-114.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"></path></svg>
                                                    </div>
                                                    <div>PERMOHONAN<br>PROJEK</div>
                                                </button>
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <a href="#">
                                                <button class="modulNpis_col modulNpis_col2 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
                                                    </div>
                                                    <div class="align-text-bottom">MODUL PEMANTAUAN &amp;<br>PENILAIAN PROJEK JPS </div>
                                                </button>
                                            </a>
                                        </td>
                                    
                                        <td>
                                            <a href="#">
                                                <button class="modulNpis_col modulNpis_col3 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon mt-3" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M500 384c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v308h436zM372.7 159.5L288 216l-85.3-113.7c-5.1-6.8-15.5-6.3-19.9 1L96 248v104h384l-89.9-187.8c-3.2-6.5-11.4-8.7-17.4-4.7z"></path></svg>
                                                    </div>
                                                    <div>PEMANTAUAN &amp; PENILAIAN<br>PROJEK JABATAN BUKAN TEKNIK</div>
                                                </button>
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <a href="#">
                                                <button class="modulNpis_col modulNpis_col4 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M288 256H96v64h192v-64zm89-151L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm256 304c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-200v96c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-96c0-8.84 7.16-16 16-16h224c8.84 0 16 7.16 16 16z"></path></svg>
                                                    </div>
                                                    <div class="mb-4">KONTRAK</div>
                                                </button> 
                                            </a>
                                        </td>
                                    
                                        <td>
                                            <a href="/senarai_perunding_jps">
                                                <button class="modulNpis_col modulNpis_col5 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path></svg>
                                                    </div>
                                                    <div class="mb-4">PERUNDING</div>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="modulNpis_row text-center">
                                        <td>
                                            <a href="/senarai_makmal_and_mini">
                                                <button class="modulNpis_col modulNpis_col6 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M505.04 442.66l-99.71-99.69c-4.5-4.5-10.6-7-17-7h-16.3c27.6-35.3 44-79.69 44-127.99C416.03 93.09 322.92 0 208.02 0S0 93.09 0 207.98s93.11 207.98 208.02 207.98c48.3 0 92.71-16.4 128.01-44v16.3c0 6.4 2.5 12.5 7 17l99.71 99.69c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.59.1-33.99zm-297.02-90.7c-79.54 0-144-64.34-144-143.98 0-79.53 64.35-143.98 144-143.98 79.54 0 144 64.34 144 143.98 0 79.53-64.35 143.98-144 143.98zm27.11-152.54l-45.01-13.5c-5.16-1.55-8.77-6.78-8.77-12.73 0-7.27 5.3-13.19 11.8-13.19h28.11c4.56 0 8.96 1.29 12.82 3.72 3.24 2.03 7.36 1.91 10.13-.73l11.75-11.21c3.53-3.37 3.33-9.21-.57-12.14-9.1-6.83-20.08-10.77-31.37-11.35V112c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v16.12c-23.63.63-42.68 20.55-42.68 45.07 0 19.97 12.99 37.81 31.58 43.39l45.01 13.5c5.16 1.55 8.77 6.78 8.77 12.73 0 7.27-5.3 13.19-11.8 13.19h-28.1c-4.56 0-8.96-1.29-12.82-3.72-3.24-2.03-7.36-1.91-10.13.73l-11.75 11.21c-3.53 3.37-3.33 9.21.57 12.14 9.1 6.83 20.08 10.77 31.37 11.35V304c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-16.12c23.63-.63 42.68-20.54 42.68-45.07 0-19.97-12.99-37.81-31.59-43.39z"></path></svg>
                                                    </div>
                                                    <div>VALUE MANAGEMENT<br>(VM)</div>
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="/Kertas_Permohonan_NOC">
                                                <button class="modulNpis_col modulNpis_col7 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V285.7l-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"></path></svg>
                                                    </div>
                                                    <div>NOTICE OF CHANGE<br>(NOC)</div>
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="/Senarai_Peruntukan">
                                                <button class="modulNpis_col modulNpis_col8 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V428.7c-2.7 1.1-5.4 2-8.2 2.7l-60.1 15c-3 .7-6 1.2-9 1.4c-.9 .1-1.8 .2-2.7 .2H240c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 381l-9.8 32.8c-6.1 20.3-24.8 34.2-46 34.2H80c-8.8 0-16-7.2-16-16s7.2-16 16-16h8.2c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.8 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8h8.9c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7L384 203.6V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM549.8 139.7c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM311.9 321c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L512.1 262.7l-71-71L311.9 321z"></path></svg>
                                                    </div>
                                                    <div>PERUNTUKAN DI LUAR<br>ROLLING PLAN (RP)</div>
                                                </button> 
                                            </a>
                                        </td>

                                        <td>
                                            <a href="#">
                                                <button class="modulNpis_col modulNpis_col9 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M304 240V16.6c0-9 7-16.6 16-16.6C443.7 0 544 100.3 544 224c0 9-7.6 16-16.6 16H304zM32 272C32 150.7 122.1 50.3 239 34.3c9.2-1.3 17 6.1 17 15.4V288L412.5 444.5c6.7 6.7 6.2 17.7-1.5 23.1C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zm526.4 16c9.3 0 16.6 7.8 15.4 17c-7.7 55.9-34.6 105.6-73.9 142.3c-6 5.6-15.4 5.2-21.2-.7L320 288H558.4z"></path></svg>
                                                    </div>
                                                    <div>PENJANAAN<br>LAPORAN</div>
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="#">
                                                <button class="modulNpis_col modulNpis_col10 modulNpis_font">
                                                    <div><svg class="modulNPIS_icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>svg{fill:#585858}</style>
                                                    <path d="M51.7 295.1l31.7 6.3c7.9 1.6 16-.9 21.7-6.6l15.4-15.4c11.6-11.6 31.1-8.4 38.4 6.2l9.3 18.5c4.8 9.6 14.6 15.7 25.4 15.7c15.2 0 26.1-14.6 21.7-29.2l-6-19.9c-4.6-15.4 6.9-30.9 23-30.9h2.3c13.4 0 25.9-6.7 33.3-17.8l10.7-16.1c5.6-8.5 5.3-19.6-.8-27.7l-16.1-21.5c-10.3-13.7-3.3-33.5 13.4-37.7l17-4.3c7.5-1.9 13.6-7.2 16.5-14.4l16.4-40.9C303.4 52.1 280.2 48 256 48C141.1 48 48 141.1 48 256c0 13.4 1.3 26.5 3.7 39.1zm407.7 4.6c-3-.3-6-.1-9 .8l-15.8 4.4c-6.7 1.9-13.8-.9-17.5-6.7l-2-3.1c-6-9.4-16.4-15.1-27.6-15.1s-21.6 5.7-27.6 15.1l-6.1 9.5c-1.4 2.2-3.4 4.1-5.7 5.3L312 330.1c-18.1 10.1-25.5 32.4-17 51.3l5.5 12.4c8.6 19.2 30.7 28.5 50.5 21.1l2.6-1c10-3.7 21.3-2.2 29.9 4.1l1.5 1.1c37.2-29.5 64.1-71.4 74.4-119.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm144.5 92.1c-2.1 8.6 3.1 17.3 11.6 19.4l32 8c8.6 2.1 17.3-3.1 19.4-11.6s-3.1-17.3-11.6-19.4l-32-8c-8.6-2.1-17.3 3.1-19.4 11.6zm92-20c-2.1 8.6 3.1 17.3 11.6 19.4s17.3-3.1 19.4-11.6l8-32c2.1-8.6-3.1-17.3-11.6-19.4s-17.3 3.1-19.4 11.6l-8 32zM343.2 113.7c-7.9-4-17.5-.7-21.5 7.2l-16 32c-4 7.9-.7 17.5 7.2 21.5s17.5 .7 21.5-7.2l16-32c4-7.9 .7-17.5-7.2-21.5z"></path></svg>
                                                    </div>
                                                    <div class="mb-4">GEO-BOARD</div>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            
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
