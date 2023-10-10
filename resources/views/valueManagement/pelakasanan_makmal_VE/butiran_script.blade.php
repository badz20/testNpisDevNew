<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        var fasilitators = {}
        let options = '<option value="">--Pilih--</option>'
        let fastype_options = '<option value="0">--Pilih--</option><option value="Ketua Fasilitator">Ketua Fasilitator</option><option value="Fasilitator">Fasilitator</option>'
        let all_butiran = {}

         // Get the modal element
         const modal = document.getElementById('exampleModal');
        $(document).ready(function () {

                

                // When the modal is shown, set the data to be displayed
                modal.addEventListener('show.bs.modal', function (e) {
                        //get data-id attribute of the clicked element
                        var itemId = $(e.relatedTarget).data('id');
                        let current_butiran = all_butiran[itemId]

                        $("#modal_fasilitators").empty();
                        
                        document.getElementById("modal_cadangan_makmal").value = current_butiran.cadangan_makmal
                        document.getElementById("modal_negeri").value = current_butiran.negeri
                        document.getElementById("modal_makmal_sebenar").value = current_butiran.makmal_sebenar
                        document.getElementById("modal_lawatan_tapak").value = current_butiran.lawatan_tapak
                        document.getElementById("modal_tahun").value = current_butiran.tahun_makmal
                        document.getElementById("modal_kos_sebelum_makmal").value = current_butiran.kos_sebelum_makmal
                        document.getElementById("modal_kos_selepas_makmal").value = current_butiran.kos_pelakas_selepas_makmal
                        index = 0
                        $.each(current_butiran.fasilitators, function(key ,item) {
                                index = index +1
                                $('#modal_fasilitators').append(
                                        `<tr>
                                                <td>`+index+`</td>
                                                <td>
                                                        `+item.fasilitator.nama_fasilitator+`
                                                </td>
                                                <td>
                                                        `+item.fasilitator.gred_jawatan.nama_gred+`
                                                </td>
                                                <td>
                                                        `+item.fasilitator_type+`
                                                </td>
                                                <td>
                                                        `+item.fasilitator.bahagian.nama_bahagian+`
                                                </td>
                                        </tr>`
                                )
                        })
                });

                axios.defaults.headers.common["Authorization"] = "Bearer "+ window.localStorage.getItem('token')

                axios({
                        method: 'get',
                        url: "{{ env('API_URL') }}"+"api/vm/butiran",
                        responseType: 'json',
                        params: {
                                pp_id: {{$kod_projek}},
                                type: 'VE'
                        }            
                })
                .then(function (response) { 
                        butiranData = response.data.data; 
                        index = 0

                        if(butiranData.length > 0) {
                                $('#projek_cmn_table').removeClass('d-none');
                        }else{
                                $('#projek_cmn_table').addClass('d-none');
                        }
                        
                        $.each(butiranData, function(key, item) { //console.log(item.fasilitators);
                                all_butiran[item.id] = item
                                index = index + 1
                                $('#existing_butiran').append(
                                        `<tr>
                                <td>`+index+`</td>
                                <td>`+item.cadangan_makmal+`</td>
                                <td>`+item.makmal_sebenar+`</td>
                                <td>`+item.lawatan_tapak+`</td>
                                <td>`+item.negeri+`</td>
                                <td>
                                  <button class="vmpaparbtn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+item.id+`" >Papar</button>
                                </td>
                              </tr>`
                                );
                                
                                $.each(item.fasilitators, function(key, items) { 
                                        $('#butiran_tbody').append(`<tr class="mainrow">
                                                                <input style="font-size: 0.8rem;" class="form-control text-center" type="hidden" value="" name="id">
                                                                                <td class="mainNumbering" id="mainNumbering"></td>
                                                                                <td>
                                                                                       <input style="font-size: 0.8rem;" type="text" disabled class="form-control" value="`+items.fasilitator.nama_fasilitator+`">
                                                                                </td>
                                                                                <td class="grade" id="grade">
                                                                                `+items.fasilitator.gred_jawatan.nama_gred+`
                                                                                </td>
                                                                                <td>
                                                                                        <input style="font-size: 0.8rem;" type="text" disabled class="form-control" id="fasType" value="`+items.fasilitator_type+`">
                                                                                </td>
                                                                                <td class="jawatantd" id="jawatantd">
                                                                                `+items.fasilitator.bahagian.nama_bahagian+`
                                                                                </td>
                                                                                <td class="text-center">
                                                                                </td>
                                                        </tr>`);
                                });

                                let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                        
                                all_main_indexing.forEach((num, i) => {
                                        num.innerHTML = i + 1
                                })

                                if({{$user}}==4)
                                {
                                   document.getElementById("negeri").value = item.negeri
                                   document.getElementById("kos_sebelum_makmal").value = item.kos_sebelum_makmal
                                   document.getElementById("kos_pelakas_selepas_makmal").value = item.kos_pelakas_selepas_makmal
                                }
                        })

                        var length= window.localStorage.getItem('loader_count_VE');
                        localStorage.setItem("loader_count_VE", length-1);

                        if(length==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }
                        
                        // negeri = document.getElementById("negeri").value = butiranData.negeri
                        // makmal_sebenar = document.getElementById("makmal_sebenar").value =  butiranData.makmal_sebenar
                        // lawatan_tapak = document.getElementById("lawatan_tapak").value = butiranData.lawatan_tapak
                })
                .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                })

                axios({
                        method: 'get',
                        url: "{{ env('API_URL') }}"+"api/project/get-fasilitator-list",
                        responseType: 'json',            
                })
                .then(function (response) { 
                        $.each(response.data.data, function(key, item) {
                                options = options + '<option value="' + item.id + '">' + item.nama_fasilitator + '</option>'
                                fasilitators[item.id] = {"name" : item.nama_fasilitator , "grade" : item.gred_jawatan.nama_gred , "bahagian": item.bahagian.nama_bahagian }
                        })

                        var table_count = document.getElementById('buti_table_id').rows.length; console.log(table_count);

                        $('#butiran_tbody').append(`<tr class="mainrow">
                                                        <input class="form-control text-center" type="hidden" value="" name="id">
                                                                        <td class="mainNumbering" id="mainNumbering">`+table_count+`</td>
                                                                        <td>
                                                                                <select style="font-size: 0.8rem;"  class="form-control" id="fas_select">
                                                                                        `+options+`
                                                                                </select>
                                                                        </td>
                                                                        <td class="grade" id="grade">
                                                                        
                                                                        </td>
                                                                        <td>
                                                                                <select  style="font-size: 0.8rem;" class="form-control" onclick="FastypeChange(this)" id="fasType">
                                                                                        `+fastype_options+`
                                                                                </select>
                                                                        </td>
                                                                        <td class="jawatantd" id="jawatantd">
                                                                        
                                                                        </td>
                                                                        <td class="text-center">
                                                                        <button class="vmplus_minus minusbutton" onclick="minusSubRow(this)" type="button"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                                                        </td>
                                                </tr>`);

                        let all_main_fas_select = document.querySelectorAll("[id^='fas_select']");
                        let all_main_grade = document.querySelectorAll("[id^='grade']");
                        let all_main_jawatan = document.querySelectorAll("[id^='jawatantd']");


                        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                        
                        all_main_indexing.forEach((num, i) => {
                                num.innerHTML = i + 1
                        })
                        
                        all_main_fas_select.forEach((tb, i) => { 
                                tb.addEventListener("change", function(evt){
                                        fasil = fasilitators[all_main_fas_select[i].value]
                                        all_main_grade[i].innerHTML = fasil.grade
                                        all_main_jawatan[i].innerHTML = fasil.bahagian
                                })
                        })

                        var length= window.localStorage.getItem('loader_count_VE');
                        localStorage.setItem("loader_count_VE", length-1);

                                if(length==1)
                                {
                                        $("div.spanner").removeClass("show");
                                         $("div.overlay").removeClass("show");
                                }
                })
                .catch(function (error) {
                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                })

                
                
                
                // jQuery button click event to add a row for fasilitator
                $('#addBtnFas').on('click', function () {
                    // Adding a row inside the tbody.
                    $('#butiran_tbody').append(`<tr class="mainrow">
                    <input class="form-control text-center" type="hidden" value="" name="id">
                                <td class="mainNumbering" id="mainNumbering"></td>
                                <td>
                                        <select  style="font-size: 0.8rem;" class="form-control" id="fas_select">
                                                `+options+`
                                        </select>
                                </td>
                                <td class="grade" id="grade">
                                
                                </td>
                                <td>
                                        <select  style="font-size: 0.8rem;" class="form-control" onclick="FastypeChange(this)" id="fasType">
                                                `+fastype_options+`
                                        </select>
                                </td>
                                <td class="jawatantd" id="jawatantd">
                                
                                </td>
                                <td class="text-center">
                                <button class="vmplus_minus minusbutton" onclick="minusSubRow(this)"  type="button"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                          </tr>`);

                          let all_main_minu_btn = document.querySelectorAll(
                                ".minusbutton"
                        );
                        let all_main_tr = document.querySelectorAll(
                                ".mainrow"
                        );

                        let all_main_fas_select = document.querySelectorAll("[id^='fas_select']");
                        let all_main_grade = document.querySelectorAll("[id^='grade']");
                        let all_main_jawatan = document.querySelectorAll("[id^='jawatantd']");


                        let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                        
                        all_main_indexing.forEach((num, i) => {
                                num.innerHTML = i + 1
                        })
                        
                        all_main_fas_select.forEach((tb, i) => { 
                                tb.addEventListener("change", function(evt){
                                        fasil = fasilitators[all_main_fas_select[i].value]
                                        all_main_grade[i].innerHTML = fasil.grade
                                        all_main_jawatan[i].innerHTML = fasil.bahagian
                                })
                        })


                        // if(all_main_minu_btn.length > 0) {
                        //         all_main_minu_btn[all_main_minu_btn.length - 1].addEventListener("click", () => {
                        //                 console.log('remove')
                        //                 all_main_tr[all_main_minu_btn.length - 1].remove();
                                        
                        //                 let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                                        
                        //                 all_main_indexing.forEach((num, i) => {
                        //                         num.innerHTML = i + 1
                                        
                        //                 })
                        //         })
                        // }
                });

                
                
        })

</script>
<!-- Simpan Butiran -->
<script>
        function FastypeChange(element){
                //console.log(element)
                var parent = element.parentNode.parentNode; //console.log(parent);
                var current = element.value; 

                var selectElement = parent.querySelectorAll('#fas_select'); //console.log(selectElement);
                var selectedIndex = parent.querySelectorAll('#fas_select')[0].selectedIndex; //console.log(selectedIndex);
                var selectedOption = selectElement[0].options[selectedIndex].innerText; console.log(selectedOption);

                var selectedValue = parent.querySelectorAll('#fas_select')[0].value; console.log(selectedValue);

                let count  = 0;
                let f_count  = 0;


                let all_main_fas_select = document.querySelectorAll("[id^='fas_select']"); console.log(all_main_fas_select);
                let all_main_fas_type = document.querySelectorAll("[id^='fasType']"); //console.log(all_main_fas_type);
                $.each(all_main_fas_type, function (key, item) { //console.log(item);
                        if (item.value=='Ketua Fasilitator')
                        {
                                count=count + 1;
                        }
                });

                //console.log('count'); console.log(count);
                if(count>1 && current!='Fasilitator')
                {
                    element.value='0';
                    $("select option[value*='Ketua Fasilitator']").prop('disabled',true);
                }
                else
                {
                    $("select option[value*='Ketua Fasilitator']").prop('disabled',false);
                }


                if(current=='Fasilitator')
                {
                        $.each(all_main_fas_select, function (key, items) { console.log(items.value);

                                if(items.value==selectedOption || items.value==selectedValue)
                                {
                                        f_count=f_count+1;   
                                }
                                
                        });
                }
                
                //console.log('f_count'); console.log(f_count);

                if(f_count>1)
                {
                    alert("Ony can choose the fasilitator name once");
                    element.value='0';
                    parent.querySelectorAll('#fas_select')[0].value='';
                }

        }
        function minusSubRow(element) {
                var delete_row = element.parentNode.parentNode; console.log(delete_row);
                delete_row.parentNode.removeChild(delete_row);

                let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");
                        
                        all_main_indexing.forEach((num, i) => {
                                num.innerHTML = i + 1
                        })
        }

        $('#submit_butiran').click(function(){
                fasi_validation = true;
                document.getElementById("error_makmal_sebenar").innerHTML = ''
                document.getElementById("error_negeri").innerHTML = ''
                document.getElementById("error_lawatan_tapak").innerHTML = ''
                document.getElementById("error_fasilitator").innerHTML = ''
                document.getElementById("error_kos_pelakas_selepas_makmal").innerHTML = ''


                negeri = document.getElementById("negeri").value
                makmal_sebenar = document.getElementById("makmal_sebenar").value
                lawatan_tapak = document.getElementById("lawatan_tapak").value
                kos_pelakas_selepas_makmal = document.getElementById("kos_pelakas_selepas_makmal").value


                if(negeri == '') {
                        document.getElementById("error_negeri").innerHTML = 'Sila lengkapkan bahagian ini'
                }

                if(makmal_sebenar == '') {
                        document.getElementById("error_makmal_sebenar").innerHTML = 'Sila lengkapkan bahagian ini'
                }

                if(lawatan_tapak == '') {
                        document.getElementById("error_lawatan_tapak").innerHTML = 'Sila lengkapkan bahagian ini'
                }

                if(kos_pelakas_selepas_makmal == '') {
                        document.getElementById("error_kos_pelakas_selepas_makmal").innerHTML = 'Sila Kos Pelaksanaan Makmal(Selepas) ini'
                }

                
                let all_main_fas_select = document.querySelectorAll("[id^='fas_select']");
                let all_main_fas_type = document.querySelectorAll("[id^='fasType']");
        
                if(all_main_fas_select.length == 0) {
                        fasi_validation = false;
                        document.getElementById("error_fasilitator").innerHTML = 'Sila tambah minimum satu Fasilitator'
                }

                all_main_fas_select.forEach((fas_select, i) => {
                        
                        if(fas_select.value == '') {
                                fasi_validation = false;
                                document.getElementById("error_fasilitator").innerHTML = 'Sila pilih Fasilitator'
                        }
                })

                all_main_fas_type.forEach((fas_type, i) => {
                        if(fas_type.value == '') {
                                fasi_validation = false;
                                document.getElementById("error_fasilitator").innerHTML = 'Sila pilih Fasilitator Peranan'
                        }
                })

                if(fasi_validation) {
                        selected_fasilitator = [];
                        all_main_fas_select.forEach((fas_select, i) => {
                                if(fas_select.getAttribute('disabled') === null)
                                {
                                        selected_fasilitator.push(`{"fas_value" : "` +fas_select.value+ `", "fas_type" : "`+all_main_fas_type[i].value+ `" }`)
                                }
                        })
                        var formEl = document.forms.butiran;
                        var formData = new FormData(formEl);

                        formData.append('pp_id', {{$kod_projek}})
                        formData.append('user_id', {{Auth::user()->id}})
                        formData.append('negeri', negeri)
                        formData.append('makmal_sebenar', makmal_sebenar)
                        formData.append('lawatan_tapak', lawatan_tapak)

                        formData.append('cadangan_makmal', document.getElementById("cadangan_makmal").value)
                        formData.append('tahun_makmal', document.getElementById("year").value)

                        formData.append('mesyuarat_date', document.getElementById("mesyuarat_date").value)
                        formData.append('kos_sebelum_makmal',  document.getElementById("kos_sebelum_makmal").value)
                        formData.append('kos_pelakas_selepas_makmal', kos_pelakas_selepas_makmal)

                        formData.append('type', 'VE')


                        selected_fasilitator.forEach((item) => {
                                formData.append('fasilitator[]', item);
                        });

                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show");

                        axios({
                                method: 'post',
                                url: api_url+"api/vm/butiran",
                                responseType: 'json',
                                headers: {"Authorization": api_token, },
                                data: formData
                        })
                        .then(function (response) { 
                                if(response.data.code == 200) {  
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show"); 
                                $("#add_role_sucess_modal").modal('show');
                                $('#submit_text').addClass('d-none');      
                                $('#save_text').removeClass('d-none');
                                
                                $("#tutup").click(function(){
                                        var url = "{{ route('vm.maklumatPelakasanaanMakmal',[ ':kod',':type']) }}"
                                        url = url.replace(":kod", {{$kod_projek}})
                                        url = url.replace(":type", 'VE')

                                        // url = url.replace(":status", response.data.data.workflow_status)
                                        // url = url.replace(":user_id", response.data.data.dibuat_oleh)
                                        window.location.href = url
                                })
                                }else {
                                        if(response.data.code == 422) {
                                                Object.keys(response.data.data).forEach(key => {						
                                                        document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
                                                });
                                        }
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");
                                alert('error while saving project')
                                }
                                
                        })
                        .catch(function (error) {
                                $("div.spanner").removeClass("show");
                                $("div.overlay").removeClass("show");
                        })
                }
                
        })
</script>
