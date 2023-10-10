
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.4/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://stevenlevithan.com/assets/misc/date.format.js"></script>

<script>
    function formatDate(date) {
        var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [day, month, year].join('/');
    }

    $(".vmKalendar_btn_grn").click(function(){
        $("#projeck_id").val('')
            $("#kategori").val('')
            $("#Tarikh_Mula").val('')
            $("#Tarikh_Tamat").val('')

    })
     document.addEventListener('DOMContentLoaded', function() {
        // var url      = window.location.href; 
        // alert(url)

        var url = $(location).attr('href'),
        parts = url.split("/"),
        last_part = parts[parts.length-1];
        // alert(last_part)
        if(last_part=='VR'){
            $("#maklumat_pelakasanaan_makmal").attr("href", "/maklumatPelakasanaanMakmal_VR/"+{{$kod_projek}}+"/"+last_part+"")
        }else{
            $("#maklumat_pelakasanaan_makmal").attr("href", "/maklumat_pelakasanaan_makmal/"+{{$kod_projek}}+"/"+last_part+"")
        }

        if({{$user_type}}==4)
        {
            $("#add_btn_div").addClass("d-none");
            $("#simpanBtn").addClass("d-none");
        }
        else
        {
            $("#add_btn_div").removeClass("d-none");
            $("#simpanBtn").removeClass("d-none");
        }

        if(last_part == 'Mini_VA')
        {
            document.getElementById("breadcrumb_link").innerHTML ="Makmal Mini Kajian Nilai (Mini VA)";
           document.getElementById("text_link").innerHTML ="Makmal Mini Kajian Nilai (Mini VA)";
           document.getElementById("top_link").innerHTML ="Makmal Mini Kajian Nilai (Mini VA)";
           document.getElementById("modal_link").innerHTML ="Makmal Mini Kajian Nilai (Mini VA)";
           $("#top_arrow").addClass("show");
        }
        else
        {
            document.getElementById("breadcrumb_link").innerHTML ="Makmal Kajian Nilai (VA) ";
            document.getElementById("text_link").innerHTML ="Makmal Kajian Nilai (VA) ";
            document.getElementById("top_link").innerHTML ="Makmal Kajian Nilai (VA) ";
            document.getElementById("modal_link").innerHTML ="Makmal Kajian Nilai (VA) ";
            $("#top_arrow").addClass("show");
        }

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");
        
        var kod_projek= document.getElementById('kod_projek').value; console.log(kod_projek)
        var type= document.getElementById('type').value; console.log(type)
        var user_id= {{Auth::user()->id}}; 

        const api_token = "Bearer "+ window.localStorage.getItem('token');        
        axios.defaults.headers.common["Authorization"] = api_token
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/brif_project_details/" + kod_projek,
            responseType: 'json',            
        })
        .then(function (response) { 
            project_name=response.data.data.result.nama_projek;
            pp_id=response.data.data.result.id;
            status_perlaksanaan=response.data.data.result.status_perlaksanaan; console.log(status_perlaksanaan);

            if({{$user_type}}==4)
            {
                if(status_perlaksanaan==26 ||status_perlaksanaan==28)
                {
                    $("#add_btn_div").removeClass("d-none");
                    $("#simpanBtn").removeClass("d-none");
                }
                else
                {
                    $("#add_btn_div").addClass("d-none");
                    $("#simpanBtn").addClass("d-none");
                }
                
            }
            else
            {
                $("#add_btn_div").removeClass("d-none");
                $("#simpanBtn").removeClass("d-none");
            }

            var projek_name= $("#projek_name").val(project_name);
            var pp_id= $("#pp_id").val(pp_id);



            $("#simpanBtn").click(function(){
                var formEl = document.forms.KalendarForm;
                var pp_id= document.getElementById('pp_id').value;
                

                if(document.forms.KalendarForm.kategori.value=='')
                {
                    document.getElementById("error_kategori").innerHTML="Sila Pilih Kategori"; 
                    document.getElementById("kategori").focus();
                    return false; 
                }
                else
                {
                    document.getElementById("error_kategori").innerHTML=" "; 
                }
                if(document.forms.KalendarForm.Tarikh_Mula.value=='')
                {
                    document.getElementById("error_Tarikh_Mula").innerHTML="Sila Pilih Tarikh Mula"; 
                    document.getElementById("Tarikh_Mula").focus();
                    return false; 
                }
                else
                {
                    document.getElementById("error_Tarikh_Mula").innerHTML=" "; 
                }
                if(document.forms.KalendarForm.Tarikh_Tamat.value=='')
                {
                    document.getElementById("error_Tarikh_Tamat").innerHTML="Sila Pilih Tarikh Tamat"; 
                    document.getElementById("Tarikh_Tamat").focus();
                    return false; 
                }
                else
                {
                    document.getElementById("error_Tarikh_Tamat").innerHTML=" "; 
                }

                var formData = new FormData(formEl);
                formData.append('id', pp_id)
                formData.append('user_id', {{Auth::user()->id}})

                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");

                console.log('form submitted')
                axios({
                method: 'post',
                url: api_url+"api/project/storeKalenderData",
                responseType: 'json',
                data: formData
                })
                .then(function (response) {
                    console.log(response.data.kategori)
                    if(response.data.status=='Success'){

                        $("div.spanner").removeClass("show");
                        $("div.overlay").removeClass("show");
                        var success_msg = "Tarikh Cadangan Makmal disahkan!";
                        if(response.data.kategori==1)
                        {
                            var success_msg = "Tarikh Cadangan Pra-Makmal disahkan!";
                        }
                        else if(response.data.kategori==3)
                        {
                            var success_msg = "Tarikh Lawatan Tapak disahkan!";
                        }
                        else if(response.data.kategori==4)
                        {
                            var success_msg = "Tarikh Mesyuarat Stakeholder disahkan!";
                        }
                        $('#add_role_sucess_modal').modal('show');    
                        $("#tutup").click(function(){
                            $('#add_role_sucess_modal').modal('show'); 
                            location.reload();
                        })
                        $("#close").click(function(){
                            $('#add_role_sucess_modal').modal('show'); 
                            location.reload();
                        })
                        // Swal.fire({
                        //     icon: 'success',
                        //     text: success_msg,
                        //     confirmButtonText: 'Tutup',
                        // }).then((result) => {
                        // /* Read more about isConfirmed, isDenied below */
                        // if (result.isConfirmed) {
                        //     location.reload();
                        // }
                        // })
                    }
                    else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        })
                        
                    }
                })  
                
            })
            
        })
        var user_id= {{Auth::user()->id}}; 
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/kalenderData/"+kod_projek+'/'+type+'/'+user_id+'/'+{{$user_type}} ,
            responseType: 'json',            
        })
        .then(function (response) {
            console.log(response)
            var eventsData=response.data.data;
            var projekName=response.data.data2;
            var yearsData=response.data.data3;
            var todaysData=response.data.data4;
            var senaraiData=response.data.data5;
            var filterMonthData=response.data.uniqueMonths;
            var years = response.data.years;


            // Add date data in tarikh mula & tarikh tamat for Makmal Mini VA
            var url = $(location).attr('href'),
            parts = url.split("/"),
            last_part = parts[parts.length-1];
        
            if(last_part == 'Mini_VA')
            {
                var disabledDates = [];

                for (a=0; a < yearsData.length; a++) {
                    var startDate = yearsData[a].tarikh_mula;
                    var endDate = yearsData[a].tarikh_tamat;

                    if(startDate && endDate) {
                        disabledDates.push({ start: startDate, end: endDate });
                    }
                }

                console.log(disabledDates);

                var tarikhMulaInput = document.getElementById('Tarikh_Mula');

                tarikhMulaInput.addEventListener('input', function() {
                    var selectedDate = new Date(tarikhMulaInput.value);
        
                    // Check if the selected date falls within any of the disabled date ranges
                    var isDisabled = disabledDates.some(function(range) {
                        var startDate = new Date(range.start);
                        var endDate = new Date(range.end);
                        return selectedDate >= startDate && selectedDate <= endDate;
                    });
                    
                    // If the date is disabled, clear the input value
                    if (isDisabled) {
                        tarikhMulaInput.value = '';
                        $('#date_conflict_modal').modal('show');  
                    } 
                });

                var tarikhTamatInput = document.getElementById('Tarikh_Tamat');

                tarikhTamatInput.addEventListener('input', function() {
                    var selectedDate = new Date(tarikhTamatInput.value);
        
                    // Check if the selected date falls within any of the disabled date ranges
                    var isDisabled = disabledDates.some(function(range) {
                        var startDate = new Date(range.start);
                        var endDate = new Date(range.end);
                        return selectedDate >= startDate && selectedDate <= endDate;
                    });
                    
                    // If the date is disabled, clear the input value
                    if (isDisabled) {
                        tarikhTamatInput.value = '';
                        $('#date_conflict_modal').modal('show');  
                    } 
                });
            }

            console.log(projekName)
            var events = []; //The array
            for(var i =0; i < eventsData.length; i++) 
            {
                for(var j =0; j < projekName.length; j++){
                    if(projekName[j].id==eventsData[i].pp_id){
                        var projek=projekName[j].nama_projek
                        console.log(projek)
                    }
                }
                if(eventsData[i].kategori==1){
                    var color='#0ACF97';
                }
                else if(eventsData[i].kategori==3){
                    var color='#3da6ff';
                }
                else if(eventsData[i].kategori==4){
                    var color='#6d49ff';
                }
                else{
                    var color='#FFC35A';                    
                }
                events.push( {
                              id:i, 
                              title: projek , 
                              resourceId: eventsData[i].id,
                              start: eventsData[i].tarikh_mula.split(' ')[0]+"T00:00:00Z", 
                              end: eventsData[i].tarikh_tamat.split(' ')[0]+"T23:59:00Z", 
                              color:color,
                            })

                            // list-view
                            // $("#EventsListView").append('<tr><td colspan="7" id="vm_senaraiCalendar_grn'+[i]+'" class="vmKalendar vm_senaraiCalendar_grn kategori'+eventsData[i].kategori+'"><span class="number">'+eventsData[i].tarikh_mula.split(' ')[0]+' - '+eventsData[i].tarikh_tamat.split(' ')[0]+'</span></td></tr><tr><td colspan="7" class="vmKalendar vm_senaraiCalendar_white day"><span class="number">'+projek+'</span></td></tr>');
                            // $(".kategori1").css("background-color","#0ACF97")
                            // $(".kategori2").css("background-color","#FFC35A")

            };

            for(k=0;k<senaraiData.length;k++){
                for(var j =0; j < projekName.length; j++){
                    if(projekName[j].id==senaraiData[k].pp_id){
                        var projek=projekName[j].nama_projek
                        console.log(projek)
                    }
                }
            
                $("#EventsListView").append('<tr><td colspan="7" id="vm_senaraiCalendar_grn'+[k]+'" class="vmKalendar vm_senaraiCalendar_grn kategori'+senaraiData[k].kategori+'"><span class="number">'+formatDate(senaraiData[k].tarikh_mula.split(' ')[0])+' - '+formatDate(senaraiData[k].tarikh_tamat.split(' ')[0])+'</span></td></tr><tr><td colspan="7" class="vmKalendar vm_senaraiCalendar_white day"><span class="number">'+projek+'</span></td></tr>');
                $(".kategori1").css("background-color","#0ACF97")
                $(".kategori2").css("background-color","#FFC35A")
                $(".kategori3").css("background-color","#3da6ff")
                $(".kategori4").css("background-color","#6d49ff")

            }

            monthNames = [
                '', 'Januari', 'Februari', 'Mac', 'April',
                'Mei', 'Jun', 'Julai', 'Ogos',
                'September', 'Oktober', 'November', 'December'
            ];

            function getMonth(date) {
                var d = new Date(date),
                month = '' + (d.getMonth() + 1);

                if (month.length < 2) 
                    month = month;

                return month;
            }

            var keys = Object.keys(filterMonthData);
            for (var b=0; b < keys.length; b++) {
                var key = keys[b];
                var monthNumber = filterMonthData[key];
                var monthName = monthNames[monthNumber]; 

                var yearsContainer = $('<div class="month-container mt-3"></div>');
                yearsContainer.append('<h5><strong>' + monthName + ' ' + years +'</strong></h5>');

                for(l=0; l < yearsData.length; l++){
                    for(var j =0; j < projekName.length; j++){
                        if(projekName[j].id==yearsData[l].pp_id){
                            var projek=projekName[j].nama_projek
                            console.log(projek)
                        }
                    }

                    if(
                        monthNumber == getMonth(yearsData[l].tarikh_mula.split(' ')[0]) || 
                        monthNumber == getMonth(yearsData[l].tarikh_tamat.split(' ')[0])
                    ) {
                        yearsContainer.append('<tr><td style="width: 30%;" id="vm_senaraiCalendar_grn'+[l]+'" class="vmKalendar vm_senaraiCalendar_white"><span class="number">'+ formatDate(yearsData[l].tarikh_mula.split(' ')[0]) +' - '+ formatDate(yearsData[l].tarikh_tamat.split(' ')[0]) +'</span></td><td style="width: 100%;" class="vmKalendar vm_senaraiCalendar_whiteText day kategori'+yearsData[l].kategori+'"><span class="number">'+projek+'</span></td></tr>');
                        $(".kategori1").css("background-color","#0ACF97")
                        $(".kategori2").css("background-color","#FFC35A")
                        $(".kategori3").css("background-color","#3da6ff")
                        $(".kategori4").css("background-color","#6d49ff")
                    }
                }

                $("#YearEventsListView").append(yearsContainer);
            }
            
            
            for(m=0;m<todaysData.length;m++){
                for(var j =0; j < projekName.length; j++){
                    if(projekName[j].id==todaysData[m].pp_id){
                        var projek=projekName[j].nama_projek
                        console.log(projek)
                    }
                }

                $("#TodaysEventsListView").append('<tr><td colspan="7" id="vm_senaraiCalendar_grn'+[m]+'" class="vmKalendar vm_senaraiCalendar_grn kategori'+todaysData[m].kategori+'"><span class="number">'+formatDate(todaysData[m].tarikh_mula.split(' ')[0])+' - '+ formatDate(todaysData[m].tarikh_tamat.split(' ')[0]) +'</span></td></tr><tr><td colspan="7" class="vmKalendar vm_senaraiCalendar_white day"><span class="number">'+projek+'</span></td></tr>');
                $(".kategori1").css("background-color","#0ACF97")
                $(".kategori2").css("background-color","#FFC35A")
                $(".kategori3").css("background-color","#3da6ff")
                $(".kategori4").css("background-color","#6d49ff")

            }
  
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            events: events,            
            eventClick: function(events) {
                console.log(events) 
                // console.log(events.event._def.title) testing
                // console.log(events.event._instance.range.end) testing
                // console.log(events.event._instance.range.start) testing
                    function formatDate(date) {
                        var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();

                        if (month.length < 2) 
                            month = '0' + month;
                        if (day.length < 2) 
                            day = '0' + day;

                        return [day, month, year].join('/');
                    }
                    var startDate=new Date(events.event._instance.range.start).toISOString();
                    var result1 = formatDate(startDate);
                    var endDate=new Date(events.event._instance.range.end).toISOString();
                    var result2 = formatDate(endDate);
                    //setting category
                    var selectCategory=events.el.fcSeg.eventRange.def.ui.backgroundColor
                    if(selectCategory=="#0ACF97"){
                        $("#kategori").val(1)
                    }
                    else if(selectCategory=="#FFC35A")
                    {
                        $("#kategori").val(2)
                    }
                    else if(selectCategory=="#3da6ff"){
                        $("#kategori").val(3)
                    }
                    else{
                        $("#kategori").val(4)
                    }
                    // console.log(result1)  setting date initial date
                    // console.log(result2)  setting date end date
                    var projek_id=events.event._def.extendedProps.resourceId;
                    document.getElementById("projeck_id").value = projek_id;
                    $("#projek_name").val(events.event._def.title).text(events.event._def.title)
                    document.getElementById("Tarikh_Mula").value =result1;
                    document.getElementById("Tarikh_Tamat").value = result2;
                    $('#exampleModal2').modal('show');    
            },
            eventContent: function(info) {
            // Format the event content to show the title without the time
            return {
                html: '<div class="fc-title">' + info.event.title + '</div>',
            };
            },
            initialView: 'dayGridMonth',
            locale: 'ms',
            timeZone: 'UTC',
            allDay: true,
            timeFormat: 'H(:mm)',
            //   weekNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events  
                dayHeaderFormat: {
                    weekday: 'long'
                },
            customButtons: {
                    myCustomButton: {
                    text: 'Sebelum',
                    click: function() {
                        calendar.prev()
                        $("#fc-dom-1").text(calendar.view.title)
                    }
                    },
                    myCustomButton2: {
                    text: 'Seterusnya',
                    click: function() {
                        calendar.next()
                        $("#fc-dom-1").text(calendar.view.title)
                    }
                    },
                    myCustomButton3: {
                    text: 'Hari Ini',
                    click: function() {
                        calendar.changeView('listDay')
                        calendar.today();
                        $(".fc-view-harness-active").hide();
                        // var val=date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
                        // $("#fc-dom-1").text(val)
                        $(".CalenderlistView").removeClass("d-none") 
                        $("#TodaysEventsListView").removeClass("d-none")
                        $("#YearEventsListView").addClass("d-none")
                        $("#EventsListView").addClass("d-none") 
                        $(".fc-next-button").addClass("d-none")
                        $(".fc-prev-button").addClass("d-none")
                        $("#fc-dom-1").text(calendar.view.title)
                    }
                    },
                    myCustomButton4: {
                    text: 'Bulan',
                        click: function() {
                            $(".fc-view-harness-active").show();
                            $(".CalenderlistView").addClass("d-none")
                            $("#TodaysEventsListView").addClass("d-none")
                            $("#YearEventsListView").addClass("d-none")
                            $("#EventsListView").addClass("d-none") 
                            calendar.changeView('dayGridMonth')
                            $(".fc-next-button").removeClass("d-none")
                            $(".fc-prev-button").removeClass("d-none")
                            $("#fc-dom-1").text(calendar.view.title)
                        },
                    },
                    myCustomButton5: {
                    text: 'Tahun',
                    click: function() {
                        calendar.changeView('listYear')
                        $("#noDataMessage").addClass("d-none")
                        $(".fc-view-harness-active").hide();
                        $(".CalenderlistView").removeClass("d-none") 
                        $("#TodaysEventsListView").addClass("d-none")
                        $("#YearEventsListView").removeClass("d-none")
                        $("#EventsListView").addClass("d-none")
                        $(".fc-next-button").addClass("d-none")
                        $(".fc-prev-button").addClass("d-none")
                        $("#fc-dom-1").text(calendar.view.title)
                    },                
                    },
                    myCustomButton6: {
                    text: 'Senarai',
                        click: function() {
                            calendar.changeView('listMonth')
                            $("#noDataMessage").addClass("d-none")
                            $(".CalenderlistView").removeClass("d-none") 
                            $(".fc-view-harness-active").hide();
                            $("#TodaysEventsListView").addClass("d-none")
                            $("#YearEventsListView").addClass("d-none")
                            $("#EventsListView").removeClass("d-none")
                            $(".fc-next-button").addClass("d-none")
                            $(".fc-prev-button").addClass("d-none")
                            $("#fc-dom-1").text('Senarai')
                        }
                    }
                },
                headerToolbar: {
                    left: 'prev',
                    center: 'title,myCustomButton,myCustomButton2,myCustomButton3,myCustomButton4,myCustomButton5,myCustomButton6',
                    right: 'next',
                },
            });
            calendar.render();
                    $("div.spanner").removeClass("show");
                    $("div.overlay").removeClass("show");
            });

      });

</script>
<script>

$("#kategori").change(function(){
    var selectedOption = $(this).val();
    if(selectedOption=='')
    {
        document.getElementById("error_kategori").innerHTML="Sila Pilih Kategori"; 
		document.getElementById("kategori").focus();
		return false; 
    }
    document.getElementById("error_kategori").innerHTML=" "; 

    var pp_id= document.getElementById('pp_id').value; console.log(pp_id)

        $("div.spanner").addClass("show");
        $("div.overlay").addClass("show");

    const api_token = "Bearer "+ window.localStorage.getItem('token');        
        axios.defaults.headers.common["Authorization"] = api_token
        const api_url = "{{env('API_URL')}}";  console.log(api_url);
        axios({
            method: 'get',
            url: "{{ env('API_URL') }}"+"api/project/get_kalenderData?id="+pp_id+"&kategori="+selectedOption,
            responseType: 'json',            
        })
        .then(function (response) { console.log(response.data.data)
            if(response.data.data)
            {
                tarikh_mula=response.data.data.tarikh_mula;
                tarikh_tamat=response.data.data.tarikh_tamat;
                $("#Tarikh_Mula").val(tarikh_mula);
                $("#Tarikh_Tamat").val(tarikh_tamat);
            }
            else
            {
                $("#Tarikh_Mula").val('');
                $("#Tarikh_Tamat").val('');
            }
            $("div.spanner").removeClass("show");
            $("div.overlay").removeClass("show");
            
        })

});

$("#kemBtn").click(function(){
    location.reload();
});

$("#minus_pop").click(function(){
    location.reload();
});

$("#close_pop").click(function(){
        $("#exampleModal2").modal('hide');
    })

$("#close_image").click(function(){
        $("#exampleModal2").modal('hide');
    })

</script>