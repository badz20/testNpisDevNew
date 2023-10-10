
<script>
  var jenis_kajian_options;
  var hakisan_options;
  var skop_main_code;
  var skop_condition_code
  var sub_skop_condition_code;
  var sub_skop_lain_code;
  var skop_prelimiarie_condition_code;
  
    $(document).ready(function () {  
        console.log('document data ready')
        const api_token = "Bearer "+ window.localStorage.getItem('token');

        axios.defaults.headers.common["Authorization"] = api_token
        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

            // Stuff to run after 5 seconds.
            axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/draftDetails",
            responseType: 'json',
        })
        .then(function (response) { 
            data = response.data.data
            console.log(data)
            var rollingPlanDropDown =  document.getElementById("rolling_plan_options");
            

            skop_project = data.skop_project;
            $.each(skop_project, function(key, item) {
                sub_skop_project[item.skop_code]  = item.subskop
                if(item.skop_name == 'Perlantikan Perunding') {
                    skop_condition_code = item.skop_code
                    $.each(item.subskop, function(subkey, subitem) {
                        if(subitem.sub_skop_name == 'Perlantikan Perunding Rekabentuk Terperinci') {
                            sub_skop_condition_code = subitem.sub_skop_code
                        }
                    })
                }
                
                if(item.skop_name == 'Main Works') {
                    $.each(item.subskop, function(subkey, subitem) {
                        if(subitem.sub_skop_name.includes('Lain-lain') ) {
                            sub_skop_lain_code = subitem.sub_skop_code
                        }
                    })
                }

                if(item.skop_name == 'Main Works') {
                    skop_main_code = item.skop_code
                }

                if(item.skop_name == 'Preliminaries and General Item') {
                    skop_prelimiarie_condition_code = item.skop_code
                }
                

            })
            //rolling_plan = data.rolling;
            loadcompleted();

            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            let first_rolling = true

            $.each(data.rolling, function (key, item) {
                
					var el = document.createElement("option");
					el.textContent = item.name;
					el.value = item.id;
                    if(item.is_selectable == 0) {
                        el.setAttribute('disabled', '');
                    }else {
                        if(first_rolling) {
                            el.setAttribute('selected', true);
                            $("#RMK").val(item.rmk)
                            first_rolling = false;
                        }
                    }
					rollingPlanDropDown.appendChild(el);
                    rolling_plan[item.id] = {"rmk" : item.rmk, "name" : item.name}
                    //rolling_plan.id = item.rmk

                })  
                
            var RMKPlanDropDown =  document.getElementById("RMK");
            let rmk_array = []
            $.each(data.RMK, function (key, item) {
                
					var el = document.createElement("option");
					el.textContent = 'RMKe-' + item.rmk;
                    el.value = item.rmk;
                    
                    if(item.is_selectable == 1) {
                        el.setAttribute('disabled', '');
                    }

                    if(item.is_selectable == 0) {
                        el.setAttribute('selected', true);
                        $("#RMK").val(item.rmk)
                    }

                    if(!rmk_array.includes(item.rmk)) {
                        rmk_array.push(item.rmk)
                        RMKPlanDropDown.appendChild(el);
                    }
                })  

            var butiranDropDown =  document.getElementById("butiran_options");
            $.each(data.butiran, function (key, item) {                
					var el = document.createElement("option");
					el.textContent = item.code + '-' +item.value;
					el.value = item.code;
					butiranDropDown.appendChild(el);
                })  
                
            // var jenisKategory =  document.getElementById("jenis_kategori_options");
            // $.each(data.jenis_kategory, function (key, item) {
			// 		var el = document.createElement("option");
			// 		el.textContent = item.code + '-' +item.value;
			// 		el.value = item.code + '-' +item.value;
			// 		jenisKategory.appendChild(el);
            //     })

            var jenisKategory =  document.getElementById("jenis_kategori_options");
            $.each(data.jenis_kategory, function (key, item) {
					var el = document.createElement("option");
					el.textContent = item.name;
					el.value = item.id;
					jenisKategory.appendChild(el);
                })
                
            // var bahagianEpu =  document.getElementById("bahagianepu_options");
            // $.each(data.bahagianEpu, function (key, item) {
			// 		var el = document.createElement("option");
			// 		el.textContent = item.name;
			// 		el.value = item.id;
			// 		bahagianEpu.appendChild(el);
            //     })
            
            // var jenisKajian =  document.getElementById("jenis_kajian_options");
            // $.each(data.jenis_kajian, function (key, item) {
			// 		var el = document.createElement("option");
			// 		el.textContent =  item.value;
			// 		el.value =  item.code;
			// 		jenisKajian.appendChild(el);
            //     })
                
                hakisan_options = data.kategory_hakisan;
                jenis_kajian_options = data.jenis_kajian ;                
            // var kategoriHakisan =  document.getElementById("kategori_hakisan_options");
            // $.each(data.kategory_hakisan, function (key, item) {
			// 		var el = document.createElement("option");
			// 		el.textContent =  item.value;
			// 		el.value =  item.code;
			// 		kategoriHakisan.appendChild(el);
            //     })
                
            var kajianKemungkinan =  document.getElementById("kajian_kemungkinan_options");
            $.each(data.kajian_kemungkinan, function (key, item) {
					var el = document.createElement("option");
					el.textContent =  item.value;
					el.value =  item.code;
					kajianKemungkinan.appendChild(el);
                })

            var status =  document.getElementById("status_options");
            $.each(data.status_tab1, function (key, item) {
					var el = document.createElement("option");
					el.textContent =  item.value;
					el.value =  item.code;
					status.appendChild(el);
                })
                
            var banjirLimpahan =  document.getElementById("banjir_limpahan_options");
            $.each(data.banjir_limpahan, function (key, item) {
					var el = document.createElement("option");
					el.textContent =  item.value;
					el.value =  item.code;
					banjirLimpahan.appendChild(el);
                })

            var koridor =  document.getElementById("koridor_pembangunan_options");
            $.each(data.koridor_pembangunan, function (key, item) {
					var el = document.createElement("option");
					el.textContent =  item.value;
					el.value =  item.code;
					koridor.appendChild(el);
                })
                

                var bahagianEpu =  document.getElementById("bahagianepu_options");
            var sektorUtama =  document.getElementById("sektor_utama_options");
            var sektor =  document.getElementById("sektor_options");
            var subSektor =  document.getElementById("sub_sektor_options");

            var bah_el = document.createElement("option");
            var utama_el = document.createElement("option");
            var sektor_el = document.createElement("option");
            var sub_sektor_el = document.createElement("option");

            bah_el.textContent =  data.sub_sektor.bahagian.name;
            bah_el.value =  data.sub_sektor.bahagian.id;
            bah_el.setAttribute("selected", true)

            utama_el.textContent =  data.sub_sektor.sektor_utama.name;
            utama_el.value =  data.sub_sektor.sektor_utama.id;
            utama_el.setAttribute("selected", true)

            sektor_el.textContent =  data.sub_sektor.sektor.name;
            sektor_el.value =  data.sub_sektor.sektor.id;
            sektor_el.setAttribute("selected", true)

            sub_sektor_el.textContent =  data.sub_sektor.name;
            sub_sektor_el.value =  data.sub_sektor.id;
            sub_sektor_el.setAttribute("selected", true)

            bahagianEpu.appendChild(bah_el);
            sektorUtama.appendChild(utama_el);
            sektor.appendChild(sektor_el);
            subSektor.appendChild(sub_sektor_el);
            

            var kategori_project =  document.getElementById("kategori_project");
            $.each(data.kategori_projeck, function (key, item) {
                console.log(item)
					var el = document.createElement("option");
					el.textContent =  item.value;
					el.value =  item.code;
					kategori_project.appendChild(el);
                })

            var bahagianTerlibat =  document.getElementById("bahagian_terlibat");
            var bahagianPemilik =  document.getElementById("bahagian_pemilik");   
            
            $.each(data.bahagian, function (key, item) {
                
					var el = document.createElement("option");
					el.textContent =  item.nama_bahagian;
					el.value =  item.id;					
                    bahagianPemilik.appendChild(el);
                    //bahagianTerlibat.appendChild(el);  
                })
                
            let type_of_user = {{$user}}; console.log(type_of_user);
            let bahagian_of_user = {{$bahagian}}; console.log(bahagian_of_user)
            if(type_of_user==3 || type_of_user==4)
            {
                document.getElementById('bahagian_pemilik').value = parseInt(bahagian_of_user)
                $("#bahagian_pemilik").prop('disabled', true);
                localStorage.setItem('bahagian_pemilik',parseInt(bahagian_of_user));
            }
            else
            {
                $("#bahagian_pemilik").prop('disabled', true);
            }


                

                
            $.each(data.bahagian, function (key, item) {                
					var el = document.createElement("option");
					el.textContent =  item.nama_bahagian;
					el.value =  item.id;
					bahagianTerlibat.appendChild(el);
                })
                
                $("#bahagian_terlibat").multiselect({
                    // includeSelectAllOption: true,
                    selectedOptions : ' pilihan',
                    search : true,
                    columns: 1,
                    placeholder: '--Pilih--',
                    //selectAll : true,
                });
                

            
                load_edit_data(data.jenis_kajian,data.kategory_hakisan);
            // console.log(bahagianTerlibat)
            // console.log(bahagianPemilik)
            
        })
        .catch(function (error) {
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
        })

        
    })

    // Restrict delete first numbering in ordering list input
    $("#objektif").on('keydown', function (e) {
        var objektif= $("#objektif ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (objektif.length < 1)) {
            e.preventDefault();
        }
    });
    $("#ringkasan_latar").on('keydown', function (e) {
        var ringkasan_latar= $("#ringkasan_latar ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (ringkasan_latar.length < 1)) {
            e.preventDefault();
        }
    });
    $("#rasional_keperluan").on('keydown', function (e) {
        var rasional_keperluan= $("#rasional_keperluan ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (rasional_keperluan.length < 1)) {
            e.preventDefault();
        }
    });
    $("#faedah").on('keydown', function (e) {
        var faedah= $("#faedah ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (faedah.length < 1)) {
            e.preventDefault();
        }
    });
    $("#implikasi_projeck").on('keydown', function (e) {
        var implikasi_projeck= $("#implikasi_projeck ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (implikasi_projeck.length < 1)) {
            e.preventDefault();
        }
    });
    $("#kelulus_khas").on('keydown', function (e) {
        var kelulus_khas= $("#kelulus_khas ol li:nth-child(1)").text();
        if ((e.keyCode == 8 || e.keyCode == 13) && (kelulus_khas.length < 1)) {
            e.preventDefault();
        }
    });
</script>
