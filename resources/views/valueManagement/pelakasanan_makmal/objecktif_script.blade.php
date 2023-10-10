<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        // Denotes total number of rows
        var objektifrowIdx = 0;
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
                    type:'VA'
                }            
            })
            .then(function (response) { 
                    
                    data = response.data.data.objektif; console.log(data)
                    totalRow = data.length
                    
                    if(data.length > 0) {
                        $.each(data, function (key, item) { console.log(item)
                            $('#tbody2').append(`<tr id="OR${++objektifrowIdx}">
                                <input disabled class="form-control" type="hidden" name="id" value="`+item.id+`">
                                    <td class="row-index text-center">
                                    <p> ${objektifrowIdx}</p>
                                    </td>
                                    <td>
                                        <input disabled class="form-control" type="text" value="" name="old_objektif" value="`+item.objecktif_sebelum+`">
                                        </td>
                                    <td>
                                        <input class="form-control" type="text"  name="new_objektif" value="`+item.objecktif_selepas+`">
                                        </td>
                                        <td class="text-center">
                                        <button class="vmplus_minus" type="button" onClick="removeObjektifRow(${objektifrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                        
                                        </td>
                                        </tr>`);
                        })

                    }else {
                        // jQuery button click event to add a row
                        $('#tbody2').append(`<tr id="OR${++objektifrowIdx}">
                                        <input disabled class="form-control" type="hidden" name="id" value="">
                                            <td class="row-index text-center">
                                            <p> ${objektifrowIdx}</p>
                                            </td>
                                            <td>
                                                <input disabled class="form-control" type="text" value="" name="old_objektif">
                                                </td>
                                            <td>
                                                <input class="form-control" type="text"  name="new_objektif">
                                                </td>
                                                <td class="text-center">
                                                <button class="vmplus_minus" type="button" onClick="removeObjektifRow(${objektifrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                                </td>
                                                </tr>`);
                    }

                    // jQuery button click event to add a row
                    $('#addBtn2').on('click', function () {
                            // Adding a row inside the tbody.
                            $('#tbody2').append(`<tr id="OR${++objektifrowIdx}">
                            <input disabled class="form-control" type="hidden" name="id" value="">
                                <td class="row-index text-center">
                                <p> ${objektifrowIdx}</p>
                                </td>
                                <td>
                                    <input disabled class="form-control" type="text" value="" name="old_objektif">
                                    </td>
                                <td>
                                    <input class="form-control" type="text"  name="new_objektif">
                                    </td>
                                    <td class="text-center">
                                    <button class="vmplus_minus" type="button" onClick="removeObjektifRow(${objektifrowIdx})"><img src="{{ asset('Vm_module/assets/images/minus.png') }}"></button>
                                    </td>
                                    </tr>`);
                        });
            })
            
        })

        $('objektifTable').on('click', 'input[type="button"]', function(e){
            $(this).closest('tr').remove()
        })

        function removeObjektifRow(id){
            var row = document.getElementById('OR'+id);
            row.parentNode.removeChild(row);
        }

        
</script>