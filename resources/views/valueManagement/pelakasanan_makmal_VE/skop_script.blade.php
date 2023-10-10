<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        // Denotes total number of rows
        var skoprowIdx = 0;
        $(document).ready(function () {

            axios.defaults.headers.common["Authorization"] = api_token
            axios({
                method: 'get',
                url: "{{ env('API_URL') }}"+"api/project/brif_project_details/" + {{$kod_projek}},
                responseType: 'json',            
            })
            .then(function (response) { 
                skop_project = response.data.data.skop_project;
                sub_skops = response.data.data.sub_skops;
                output = response.data.data.output;
                outcome = response.data.data.outcome;

            })

            axios({
                method: 'get',
                url: "{{ env('API_URL') }}"+"api/vm/objektif",
                responseType: 'json',
                data: {
                    pp_id: {{$kod_projek}},
                    'type': 'VE'
                }            
            })
            .then(function (response) { 
                    console.log(response);
                    data = response.data.data.skop
                    totalRow = data.length
                    console.log(totalRow);
                    
                    if(data.length > 0) {
                        $.each(data, function (key, item) {
                            $('#tbody3').append(`<tr id="SR${++skoprowIdx}">
                                <input disabled class="form-control" type="hidden" name="id" value="`+item.id+`">
                                    <td class="row-index text-center">
                                    <p> ${skoprowIdx}</p>
                                    </td>
                                    <td>
                                        <input disabled class="form-control" type="text" value="" name="old_objektif" value="`+item.objecktif_sebelum+`">
                                        </td>
                                    <td>
                                        <input class="form-control" type="text"  name="new_objektif" value="`+item.objecktif_selepas+`">
                                        </td>
                                        <td class="text-center">
                                        <button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                        </td>
                                        </tr>`);
                        })

                    }else {
                        // jQuery button click event to add a row
                        $('#tbody3').append(`<tr id="SR${++skoprowIdx}">
                        <tr>
                        <input disabled class="form-control" type="hidden" name="id" value="">
                                <td class="row-index text-center">
                                    <p> ${skoprowIdx}</p>
                                    </td>
                                <td>
                                  <input disabled class="form-control" type="text" value="">
                                  </td>
                                  <td>
                                    <input disabled class="form-control text-right" type="text" value="">
                                    </td> 
                                    <td>
                                      <input class="form-control" type="text" value="">
                                    </td>  
                                    <td>
                                      <input class="form-control text-right" type="text" value="0">
                                    </td>           
                                    <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                                  </tr>`);
                    }

                    // jQuery button click event to add a row
                    $('#addBtn3').on('click', function () {
                        // Adding a row inside the tbody.
                        $('#tbody3').append(`<tr id="SR${++skoprowIdx}">
                        <input disabled class="form-control" type="hidden" name="id" value="">
                            <td class="row-index text-center">
                            <p> ${skoprowIdx}</p>
                            </td>
                            <td>
                                <input disabled class="form-control" type="text" value="">
                                </td>
                            <td>
                                <input disabled class="form-control text-right" type="text" value="0">
                                </td>
                            <td>
                                <input class="form-control" type="text" value="">
                                </td>
                                <td>
                                <input class="form-control text-right" type="text" value="0">
                                </td>
                                
                                <td class="text-center">
                                <button class="vmplus_minus" type="button" onClick="removeSkopRow(${skoprowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                </td>
                                </tr>`);
                    });
            })
            
        })

        function removeSkopRow(id){
            var row = document.getElementById('SR'+id);
            row.parentNode.removeChild(row);
        }

        
</script>