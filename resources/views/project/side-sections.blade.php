<ul>
          <li class="@if ($active == 'brif') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.edit',[$id,$status,$user_id ])}}">
                <i id="edit" class="mdi mdi-handshake tab_icon_white"></i>
                {{-- <img id="edit"  src="{{ asset('assets/images/BRIFPROJEK_white.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>BRIF PROJEK</h4>
          </li>
          <li class="@if ($active == 'rmk') active @endif">
            <div class="tab_image">
              <a class="" href="{{route('daftar.section',[$id , $status,$user_id,'rmk'])}}">
                <i id="rmk" class="mdi mdi-briefcase tab_icon_lite_blue"></i>
                {{-- <img id="rmk" src="{{ asset('assets/images/RMK-OBB-SDG_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              RMK, <br />
              OBB & SDG
            </h4>
          </li>
          <li class="@if ($active == 'output') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'output'])}}">
                <i id="outcome" class="mdi mdi-chart-line tab_icon_lite_blue"></i>
                {{-- <img id="outcome" src="{{ asset('assets/images/OUTPUT-OUTCOME_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              output, <br />
              outcome
            </h4>
          </li>
          <li class="@if ($active == 'negeri') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'negeri'])}}"> 
                <i id="lokasi" class="ri-road-map-line tab_icon_lite_blue"></i>
                {{-- <img id="lokasi" src="{{ asset('assets/images/NEGERI-LOKASI-TAPAK_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              Negeri, Lokasi<br />
              & tapak
            </h4>
          </li>
          <li class="@if ($active == 'kewangan') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'kewangan'])}}">
                <i id="kewangan" class="ri-hand-coin-line tab_icon_lite_blue"></i>
                {{-- <img id="kewangan" src="{{ asset('assets/images/KEWANGAN_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>Kewangan</h4>
          </li>
          <li class="@if ($active == 'ci') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'creativity'])}}">
                <i id="ci" class="ri-file-edit-line tab_icon_lite_blue"></i>
                {{-- <img id="ci" src="{{ asset('assets/images/CREATIVITYINDEX_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              creativity <br />
              Index
            </h4>
          </li>
          <li class="@if ($active == 'vae') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'vae'])}}">
                <i id="vae" class="ri-shield-user-line tab_icon_lite_blue"></i>
                {{-- <img id="vae" src="{{ asset('assets/images/VALUE AT ENTRY_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              Value at<br />
              Entry
            </h4>
          </li>
          <li class="@if ($active == 'documen') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'dokumen'])}}">
                <i id="documen" class="ri-book-2-line tab_icon_lite_blue"></i>
                {{-- <img id="documen" src="{{ asset('assets/images/DOKUMEN LAMPIRAN_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              Dokumen <br />
              Lampiran
            </h4>
          </li>
          <li class="@if ($active == 'ringkasan') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'ringkasan'])}}">
                <i id="ringkasan" class="ri-file-text-line tab_icon_lite_blue"></i>
                {{-- <img id="ringkasan" src="{{ asset('assets/images/RINGKASAN PERMOHONAN_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>
              Ringkasan <br />
              Permohonan
            </h4>
          </li>
          <li class="@if ($active == 'perakuan') active @endif">
            <div class="tab_image">
              <a href="{{route('daftar.section',[$id , $status,$user_id,'perakuan'])}}">
                <i id="perakuan" class="mdi mdi-sticker-check-outline tab_icon_lite_blue"></i>
                {{-- <img id="perakuan" src="{{ asset('assets/images/PERAKUAN_lite_blue.png') }}" alt="" /> --}}
              </a>
            </div>
            <h4>Perakuan</h4>
          </li>
        </ul>

        <script>

              $(document).ready(function () {  
                      console.log('document data ready')
                      const api_token = "Bearer "+ window.localStorage.getItem('token');

                      axios.defaults.headers.common["Authorization"] = api_token
                      $("div.spanner").addClass("show");
                      $("div.overlay").addClass("show");

                          // Stuff to run after 5 seconds.
                          axios({
                          method: 'get',
                          url: "{{ env('API_URL') }}"+"api/project/project-completed/"  + {{$id}},
                          responseType: 'json',
                      })
                      .then(function (response) { 
                          data = response.data.data
                          console.log('project data');
                          console.log(response);
                          console.log(data.kewangan.ci);
                          counter = 0
                          hrefurl=$(location).attr("href");
                        last_part=hrefurl.substr(hrefurl.lastIndexOf('/') + 1)
                        
                          document.getElementById('edit').className = "mdi mdi-handshake tab_icon_white";
                          // document.getElementById('edit').src =  "{{ asset('assets/images/BRIFPROJEK_white.png') }}"
                          var data12=$("#edit")[0].parentElement.parentElement;
                          console.log(data12);
                          $(data12).css('background-color', '#39aFd1');
                         if(data.negeri_name!=''){
                          $("#NegeriName").val(data.negeri_name);
                         }
                        
                        if(data.outcome_projects.length > 0) {
                          counter = counter + 1
                          document.getElementById('outcome').className = "mdi mdi-chart-line tab_icon_white";
                          // document.getElementById('outcome').src ="{{ asset('assets/images/OUTPUT-OUTCOME_white.png') }}"
                          var data4=$("#outcome")[0].parentElement.parentElement;
                          // console.log(data);
                          $(data4).css('background-color', '#39aFd1');
                          document.getElementById('rmk').className = "mdi mdi-briefcase tab_icon_white";
                          // document.getElementById('rmk').src ="{{ asset('assets/images/RMK-OBB-SDG_white.png') }}"
                          var data3=$("#rmk")[0].parentElement.parentElement;
                          $(data3).css('background-color', '#39aFd1');
                          
                        }else if(last_part=='output'){
                          document.getElementById('outcome').className = "mdi mdi-chart-line tab_icon_blue";
                          // document.getElementById('outcome').src =  "{{ asset('assets/images/OUTPUT-OUTCOME_blue.png') }}"
                          var data3=$("#outcome")[0].parentElement.parentElement;
                          $(data3).css('background-color', 'white');
                          
                        }

                        if(data.lokasi.length != 0) {
                          counter = counter + 1
                          document.getElementById('lokasi').className = "ri-road-map-line tab_icon_white";
                          // document.getElementById('lokasi').src =  "{{ asset('assets/images/NEGERI-LOKASI-TAPAK_white.png') }}"
                          var data2=$("#lokasi")[0].parentElement.parentElement;
                          console.log(data2);
                          $(data2).css('background-color', '#39aFd1');
                          
                        }
                        else if(last_part=='negeri'){
                          document.getElementById('lokasi').className = "ri-road-map-line tab_icon_blue";
                          // document.getElementById('lokasi').src =  "{{ asset('assets/images/NEGERI-LOKASI-TAPAK_blue.png') }}"
                          var data2=$("#lokasi")[0].parentElement.parentElement;
                          $(data2).css('background-color', 'white');
                        }

                        if(data.rmk_obb_sdg) {
                          counter = counter + 1
                          document.getElementById('rmk').className = "mdi mdi-briefcase tab_icon_white";
                          // document.getElementById('rmk').src ="{{ asset('assets/images/RMK-OBB-SDG_white.png') }}"
                          var data3=$("#rmk")[0].parentElement.parentElement;
                          $(data3).css('background-color', '#39aFd1');
                        }
                        else if(last_part=='rmk'){
                          document.getElementById('rmk').className = "mdi mdi-briefcase tab_icon_blue";
                          // document.getElementById('rmk').src =  "{{ asset('assets/images/RMK-OBB-SDG_blue.png') }}"
                          var data3=$("#rmk")[0].parentElement.parentElement;
                          $(data3).css('background-color', 'white');
                        }


                        if(data.kewangan.length != 0) {
                          counter = counter + 1
                          document.getElementById('kewangan').className = "ri-hand-coin-line tab_icon_white";
                          // document.getElementById('kewangan').src =  "{{ asset('assets/images/KEWANGAN_white.png') }}"
                          var data5=$("#kewangan")[0].parentElement.parentElement;
                          $(data5).css('background-color', '#39aFd1');
                          if(last_part=='creativity') {
                            counter = counter + 1
                            document.getElementById('ci').className = "ri-file-edit-line tab_icon_blue";
                            // document.getElementById('ci').src ="{{ asset('assets/images/CREATIVITY INDEX_blue.png') }}"
                          }
                          else if(data.kewangan.ci == null){
                            document.getElementById('ci').className = "ri-file-edit-line tab_icon_lite_blue";
                            // document.getElementById('ci').src ="{{ asset('assets/images/CREATIVITYINDEX_lite_blue.png') }}"
                          }
                          else{
                            document.getElementById('ci').className = "ri-file-edit-line tab_icon_white";
                            // document.getElementById('ci').src ="{{ asset('assets/images/CREATIVITY INDEX_white.png') }}"
                            var data20=$("#ci")[0].parentElement.parentElement;
                            $(data20).css('background-color', '#39aFd1');
                          }
                        }
                        else if(last_part=='kewangan'){
                          document.getElementById('kewangan').className = "ri-hand-coin-line tab_icon_blue";
                          // document.getElementById('kewangan').src =  "{{ asset('assets/images/KEWANGAN_blue.png') }}"
                          var data2=$("#kewangan")[0].parentElement.parentElement;
                          $(data2).css('background-color', 'white');
                        }


                        if(data.vae.length != 0) {
                          counter = counter + 1
                          document.getElementById('vae').className = "ri-shield-user-line tab_icon_white";
                          // document.getElementById('vae').src =  "{{ asset('assets/images/VALUE AT ENTRY_white.png') }}"

                          document.getElementById('documen').className = "ri-book-2-line tab_icon_lite_blue";
                          // document.getElementById('documen').src =  "{{ asset('assets/images/DOKUMEN LAMPIRAN_lite_blue.png') }}"

                          document.getElementById('ringkasan').className = "ri-file-text-line tab_icon_lite_blue";
                          // document.getElementById('ringkasan').src =  "{{ asset('assets/images/RINGKASAN PERMOHONAN_lite_blue.png') }}"
                          var data7=$("#vae")[0].parentElement.parentElement;
                          $(data7).css('background-color', '#39aFd1');
                        }
                        else if(last_part=='vae'){
                          document.getElementById('vae').className = "ri-shield-user-line tab_icon_blue";
                          // document.getElementById('vae').src =  "{{ asset('assets/images/VALUE AT ENTRY_blue.png') }}"
                          var data7=$("#vae")[0].parentElement.parentElement;
                          $(data7).css('background-color', 'white');
                        }



                        if(data.documen_lampiran.length != 0) {
                          counter = counter + 1
                          document.getElementById('documen').className = "ri-book-2-line tab_icon_white";
                          // document.getElementById('documen').src =  "{{ asset('assets/images/DOKUMEN LAMPIRAN_white.png') }}"
                          var data8=$("#documen")[0].parentElement.parentElement;
                          $(data8).css('background-color', '#39aFd1');
                        }else if(last_part=='dokumen'){
                          document.getElementById('documen').className = "ri-book-2-line tab_icon_blue";
                          // document.getElementById('documen').src =  "{{ asset('assets/images/DOKUMEN LAMPIRAN_blue.png') }}"
                          var data8=$("#documen")[0].parentElement.parentElement;
                          $(data8).css('background-color', 'white');
                        }

                        var counts_data=document.querySelectorAll('.tab_image'); //added by swaraj 29 march from here to line num274
                        var tab_count=0;
                        for($i=0;counts_data.length>$i;$i++){
                          if(counts_data[$i].getAttribute('style'))
                          {
                            tab_count=tab_count+1;
                          }
                        }
                        console.log(tab_count)
                      
                        if(counter == 8) {
                          document.getElementById('ringkasan').className = "ri-file-text-line tab_icon_white";
                          // document.getElementById('ringkasan').src =  "{{ asset('assets/images/RINGKASAN PERMOHONAN_white.png') }}"
                          var data10=$("#ringkasan")[0].parentElement.parentElement;
                          $(data10).css('background-color', '#39aFd1');
                        } else if(last_part=='ringkasan'){
                          document.getElementById('ringkasan').className = "ri-file-text-line tab_icon_blue";
                          // document.getElementById('ringkasan').src =  "{{ asset('assets/images/RINGKASAN PERMOHONAN_blue.png') }}"
                          var data10=$("#ringkasan")[0].parentElement.parentElement;
                          $(data10).css('background-color', 'white');
                        }

                        if(last_part=='perakuan'){
                          document.getElementById('perakuan').className = "mdi mdi-sticker-check-outline tab_icon_white";
                          // document.getElementById('perakuan').src =  "{{ asset('assets/images/PERAKUAN_white.png') }}"
                          var data19=$("#perakuan")[0].parentElement.parentElement;
                          $(data19).css('background-color', '#39aFd1');
                        }

                          
                      })
                      .catch(function (error) {
                          $("div.spanner").removeClass("show");
                          $("div.overlay").removeClass("show");
                      })

                      
                  })
              </script>