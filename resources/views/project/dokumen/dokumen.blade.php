@include('project.dokumen.style')
@extends('layouts.main.master_responsive')
    
@section('content_main')
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
            @include('project.side-sections', ['active' => 'documen'])
          </div>
        <div class="project_register_tab_content_container dokumen_right_content col-10">
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
          @include('masterPortal.result_modal')

          <form name="myform"  action="" method="post">
          <input type="hidden" id="api_url" value={{env('API_URL')}}>
          <input type="hidden" id="app_url" value={{env('APP_URL')}}>
          <input type="hidden" id="token" value={{env('TOKEN')}}>
          <input type="hidden" id="project_id" name="project_id" value="{{$id}}">
            <div class="dokumen_form" style="background-color:#fff;">
              <div class="dokum_form_header">Dokumen Lampiran  <b style="font-size:12px;font-weight:600">(Sila muatnaik fail .jpeg, .png, .jpg, .xls, *.pdf)</b></div>
              <span class="error" id="dokumen_error"></span>
              <div class="dokumen_tables table_scroll">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" style="width:5%" class="arrange">Bil</th>
                      <th scope="col" class="th_3 arrange">Jenis Dokumen</th>
                      <th scope="col" class="th_4 arrange">Tarikh Muat Naik</th>
                      <th scope="col" class="th_2 arrange">Nama Fail</th>
                      {{-- <th scope="col" class="th_4 arrange">Dokumen Lampiran</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td scope="row" style="font-size:0.7rem;">1</td>
                      <td style="font-size:0.8rem;">
                        Logical Framework Matrix (LFM) <sup>*</sup>
                        <label id="download_format" class="text-primary" style="cursor: pointer" ><h6 id="format_link"  style="font-size:0.8rem;">Muat Turun Template</h6></label>
                        <a id="download_link" class="text-primary" style="cursor: pointer" ><h6 id="file_link" @if($is_submitted) disabled @endif style="font-size:0.7rem;"></h6></a>
                        
                      </td>
                      <td class="th_3" id="logical_tarikh"></td>
                      <td class="th_3" id="logical_nama"></td>
                      <td class="th_6" colspan="2" id="without_logical">
                        <div class="upload_logo" id="upload_logo_1" style="display: block;">
                              <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto" alt="">
                              <h5 class="font">
                                Letakkan fail di sini atau klik untuk memuat naik
                              </h5>
                              <p class="font">(Saiz fail tidak melebihi 4mb)</p>
                              <input class="fileInput_logical hidden" type="file" id="logical_image" name="logical_image" @if($is_submitted) disabled @endif/>
                           
                        </div>
                        
                      </td>
                      {{-- <td id="muat_log" style="text-align: center;">
                        <label class="btn btn-logical" style="font-size:0.8rem;">
                          Muat Naik
                          <input type="file" style="display: none;" id="logical_image_1" name="logical_image_1" @if($is_submitted) disabled @endif>
                        </label>
                      </td>
                      <td id="logic_lain" style="display:none;" align="center">
                        <button type="button" class="dokumen_btn dokumen_padam" id="logic_padam" @if($is_submitted) disabled @endif>
                          <div class="dokumn" >
                            <img src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>
                          </div>
                          Padam
                        </button>
                      </td> --}}
                    
                       
                     
                    </tr>
                    <tr>
                      <td scope="row" style="font-size:0.7rem;">2</td>
                      <td style="font-size:0.8rem;"><div class="Dokumen_text">
                          Lain-lain Dokumen Sokongan <sup>*</sup>
                          <p>
                            *Keratan akhbar / surat dan lain lain yang
                            berkaitan
                          </p>
                        </div>
                        <a id="download_lain_link" class="text-primary" style="cursor: pointer" ><h6 id="file_lain_link" @if($is_submitted) disabled @endif style="font-size:13px;"></h6></a>
                      </td>
                      <td class="th_3" id="logical_tarikh_borag"></td>
                      <td class="th_3" id="logical_nama_borag"></td>

                      <td class="th_6" colspan="2" id="without_borang">
                        <div class="upload_logo" id="upload_logo_2" style="display: block;">
                            <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto" alt="">
                            <h5 class="font">
                              Letakkan fail di sini atau klik untuk memuat naik
                            </h5>
                            <p class="font">(Saiz fail tidak melebihi 4mb)</p>
                            <input class="fileInput_borag hidden" type="file" id="borang_image" name="borang_image" @if($is_submitted) disabled @endif/>
                        </div>
                      </td>
                      
                      {{-- <td id="muat_lain" style="text-align: center;">
                        <label class="btn btn-logical" style="font-size:0.8rem;">
                          Muat Naik
                          <input type="file" style="display: none;" id="borang_image_1"  name="borang_image_1" @if($is_submitted) disabled @endif>
                        </label>
                      </td>
                      <td id="padam_lain" style="display:none;" align="center">
                        <button type="button" class="dokumen_btn dokumen_padam" id="lain_padam" @if($is_submitted) disabled @endif>
                        <div class="dokumn" >
                          <img src="{{ asset('assets/images/Union.png') }}" alt="" style="width:39% !important;"/>
                        </div>
                        Padam
                        </button>
                      </td> --}}
                     
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="2" class="text-center">
                        <p id="file_error" style="color:red"></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dokumen_btns">
            @if(!$is_submitted)
              <button type="button" class="btn text-white" id="simpan" style="background-color: #5b63c3;">Simpan</button>
              @endif
              <button class="btn btn-success" type="button" id="projectDokumennext" style="background-color: #0ACF97">
                        <a class="text-decoration-none text-white " href="{{route('daftar.section',[$id ,$status,$user_id, 'ringkasan'])}}">Seterusnya</a>
              </button>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="user_profile_footer m-0 P-3" style="display: flex; align-items: center;">
    <span>{{ now()->year }}</span>
    <i class="ri-copyright-line ri-lg user_profile_icon mx-1"></i>
    <span>NPIS - JPS</span>
  </div>
  <!-- Mainbody_conatiner Starts -->
</div>

<!-- Modal -->
<!-- <div class="dokumen_modal_content">
  <div
    class="modal fade"
    id="dokumen_modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="dokumen_"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dokumen_">
            Lain-lain dokumen sokongan
          </h5>
          <button class="ml-auto" data-dismiss="modal">
                    <img src="{{ asset('dashboard/assets/images/close_img.png') }}" alt="close_img" id="close_img"/>
                  </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="dokumen_form_header">
              Sila muatnaik dokumen
            </div>
            <div class="dokumen_file_select">
              <div class="img_input_container position-relative">
                <label for="Logo_upload" class="w-100"><p>Imej</p>
                  <button type="button" class="pop_btn" onclick="myFunction()">
                    <span class="iconify info_icon" data-icon="mdi-information"></span>
                  </button>
                  <div class="position-absolute pop_content d-none" id="gmbar_pop">
                    <p>Dokumen perlu dalam format jpeg/png/jpg/pdf</p>
                  </div>
                  <input type="file" id="Logo_upload" />
                  <div class="upload_img" id="upload_logo">
                    <img src="{{ asset('assets/images/upload_img.png') }}" class="d-block m-auto" alt=""/>
                    <h5> Letakkan fail di sini atau klik untuk memuat naik </h5>
                    <p>(Saiz fail tidak melebihi 2mb)</p>
                  </div>
                  <div class="image_preview col-lg-12" id="image_preview_1">
                            <div class="uploaded_img_preview_container" id="langing_header_1">
                              <div class="uploaded_img">
                                <img src="" id="Logo_img_1" alt="" width="100" height="80"/>
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
                </label>
              </div>
              <p class="file_size d-none" id="file_size">
                                    Salz fail tidak melebihi 2 mb
                    </p>
                    <p class="file_type d-none" id="file_type">
                                    Jenis fail tidak sah
                    </p>
                    <p class="error" id="gambar_image_error"></p>
            </div>
            <div class="inputs">
              <label for="keterangan">Keterangan</label>
              <input
                type="text"
                class="form-control"
                placeholder="Keratan akhbar"
                id="katerangan" autocomplete="off"
              />
              <span class="error" id="error_katerangan"></span>
            </div>
            <hr />
            <div class="dokumen_body_table">
              <table class="table"  id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Bil</th>
                    <th scope="col">Imej</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="table_body">
                </tbody>
              </table>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn mx-auto modal_btn"
            onclick="myCreateFunction()"
          >
            Simpan
          </button>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- Modal -->
@include('project.common-scripts')
@include('project.dokumen.scripts')
<script>
//       function myFunction() {
//           var x = document.getElementById("gmbar_pop").classList[2]; console.log(x);
//           if (x === "d-none") { console.log("found");
//             document.getElementById('gmbar_pop').classList.remove("d-none");
//           } else {  console.log(" not found");
//             document.getElementById('gmbar_pop').classList.add("d-none");
//           }
//         }

// function myCreateFunction() { 

//           var image =$('#Logo_upload').prop('files')[0]; console.log(image)
//           var gambar = document.getElementById("Logo_upload").value;  console.log(gambar)
//           var keterangan = document.getElementById("katerangan").value;  console.log(keterangan)
//           var table = document.getElementById("table_body"); 

//           document.getElementById('file_size').classList.add("d-none");
//           document.getElementById('file_type').classList.add("d-none");

//           var rowCount = table.rows.length;   console.log(rowCount);
//           if(keterangan=='')
//           {
//                   document.getElementById("error_katerangan").innerHTML="sila muat naik keterangan"; 
//                 	document.getElementById("katerangan").focus();
//                  	return false; 
//           }
//           else
//           {
//                   document.getElementById("error_katerangan").innerHTML="";

//           }
//           if(!gambar)
//           {  
//               		document.getElementById("gambar_image_error").innerHTML="sila muat naik gambar profil"; 
//                 	document.getElementById("gambar_image_error").focus();
//                  	return false; 
//           }
//           else if(rowCount>=5)
//           {
//                   document.getElementById("gambar_image_error").innerHTML="Anda dibenarkan memuat naik maksimum 5 dokumen sahaja."; 
//                 	document.getElementById("gambar_image_error").focus();
//                  	return false; 
//           }
//           else
//           {
//                   document.getElementById("gambar_image_error").innerHTML=""; 
            
//                   var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
//                     fSize = image.size; i=0;while(fSize>900){fSize/=1024;i++;}
//                     image_size = (Math.round(fSize*100)/100)+' '+fSExt[i];

//                     var formData = new FormData();
//                     formData.append('id', document.myform.project_id.value);
//                     formData.append('rowCount', rowCount);
//                     formData.append('document', image);
//                     formData.append('keterangan', keterangan);


//                     const api_url = "{{env('API_URL')}}";  console.log(api_url);
//                     const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);

//                     $.ajaxSetup({
//                         headers: {
//                             "Content-Type": "application/json",
//                             "Authorization": api_token,
//                             }
//                       });
//                       axios({
//                         method: "post",
//                         url: api_url+"api/project/add-lain-document",
//                         data: formData,
//                         headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
//                     })
//                     .then(function (response) { console.log(response.data);	

//                         document.getElementById('file_size').classList.add("d-none");
//                         document.getElementById('file_type').classList.add("d-none");
//                         document.getElementById("upload_logo").style.display = 'block';
//                         document.getElementById("image_preview_1").style.display = 'none';
//                         document.getElementById("katerangan").value="";
//                         document.getElementById("Logo_upload").value='';

                      
//                         var row = table.insertRow(rowCount);
//                         var cell1 = row.insertCell(0);
//                         var cell2 = row.insertCell(1);
//                         var cell3 = row.insertCell(2);
//                         var cell4 = row.insertCell(3);
//                         cell1.style.textAlign = "center";


//                         var imageDiv = '<div class="nageri_table_img"><p>'+image.name+'</p><p>'+image_size+'</p></div>';
//                         var descripDiv = '<div class="nageri_table_text"><p>'+keterangan+'</p></div>';
//                         var removDiv = '<td><img onClick="removeImage('+response.data.data.id+','+rowCount+')" src="{{ asset('assets/images/Delete.png') }}" alt="" /></td>';
//                         cell1.innerHTML = rowCount+1;
//                         cell2.innerHTML = imageDiv;
//                         cell3.innerHTML = descripDiv;
//                         cell4.innerHTML = removDiv;
//                     })
//                     .catch(function (response) {
//                       //handle error
//                       console.log(response);
//                     });

//           }

// }

// function removeImage(id,row) { 

//   const api_url = "{{env('API_URL')}}";  console.log(api_url);
//   const api_token = "Bearer "+ window.localStorage.getItem('token');  console.log(api_token);
//   const project_id = document.getElementById("project_id").value;  console.log(project_id);


//   $.ajaxSetup({
//         headers: {
//             "Content-Type": "application/json",
//             "Authorization": api_token,
//             }
//       });
//     axios({
//                 method: "post",
//                 url: api_url+"api/project/delete-lampiran-image",
//                 data: {'id':id},
//                 headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
//             })
//         .then(function (response) { console.log(response.data);
          
//             document.getElementById("table_body").deleteRow(row);
//              window.location.href = origin + '/project/section/'+project_id+'/dokumen';

          
//         })
//         .catch(function (response) {
//           //handle error
//           console.log(response);
//         });

//   }
</script>

@endsection