<script>

function updateMainRowNumbering() {
            const all_main_tr = document.querySelectorAll(".mainrow");
            all_main_tr.forEach((mainRow, index) => {
                const mainNumbering = mainRow.querySelector(".mainNumbering");
                if (mainNumbering) {
                    mainNumbering.textContent = index + 1;
                }
            });
        }

        // Function to reset the numbering for subrows within the same main row
        function updateSubRowNumbering(mainRowNo) {
            const subrowclass = ".mainrow" + mainRowNo;
            const remainingSubrows = document.querySelectorAll(subrowclass);

            remainingSubrows.forEach((subrow, index) => {
                const subnum = subrow.querySelector(".skopStyle");
                if (subnum) {
                    subnum.textContent = (mainRowNo + 1) + "." + (index + 1);
                }
            });
        }

        function addsubrow(mainRowNo, mainRow, mainSkopSelect) {
            console.log('adding sub row for : ' + mainRowNo);
            console.log(sub_skop_project[mainSkopSelect.value]);
            let sub_skop_options = sub_skop_project[mainSkopSelect.value];
            let options = '';
            $.each(sub_skop_options, function (key, item) {
                options = options + '<option value="' + item.sub_skop_code + '">' + item.sub_skop_name + '</option>';
            });

            let subRow = `<tr class="row m-0 subrow mainrow` + mainRowNo + `" value="` + mainRowNo + `">
                <td class="col-md-7 col-xs-12 d-flex">
                    <div class="skopStyle subNumbering_` + mainRowNo + `" style="margin-left: 14%;">
                    </div>
                    <div class="p-2 align-items-center" style="width:70%;">
                        <select id="sub_skop_select" style="width:93%;" class="py-2 form-control sub_skop_select_` + mainRowNo + `" data-db-id="">
                            ` + options + `
                        </select>
                    </div>
                    <button type="button" data-title="Buang skop" class="subminusbutton" style="margin-left: 1.2rem;">
                        <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button>
                </td>
                <td class="col-md-5 col-xs-12 row">
                    <div class="col-md-8 col-xs-12 p-2 ml-2">
                        <input
                            type="number" id="sub_skop_text"
                            class="col-12 form-control"
                            value="" readonly
                        />
                    </div>
                </td>
                <td class="col-md-5 col-xs-12 otherstd` + mainRowNo + `" style="margin-left:11%;display:none;" id="others_td" >
                    <input
                        type="text" id="skop_lain_lain" value=""
                        class="form-control" style="width: 90%;"/>
                </td>
            </tr>`;

            let subrowclass = ".mainrow" + (mainRowNo);

            let all_subrow_tr = document.querySelectorAll(subrowclass);

            if (all_subrow_tr.length > 0) {
                $(subRow).insertAfter(all_subrow_tr[all_subrow_tr.length - 1]);
            } else {
                $(subRow).insertAfter(mainRow);
            }

            let subbumid = ".subNumbering_" + mainRowNo;
            let all_sub_indexing = document.querySelectorAll(subbumid);

            all_sub_indexing.forEach((subnum, i) => {
                console.log((mainRowNo) + "." + (i + 1));
                subnum.innerHTML = (mainRowNo + 1) + "." + (i + 1);
            });

            let all_sub_tr = document.querySelectorAll(".subrow");

            let all_sub_minu_btn = document.querySelectorAll(".subminusbutton");

            let all_sub_skop_select = document.querySelectorAll("[id^='sub_skop_select']");

            let all_others_td = document.querySelectorAll("[id^='others_td']");

            all_sub_skop_select.forEach((tb, i) => {
                console.log(all_sub_skop_select[i]);
                tb.addEventListener("change", function (evt) {
                    var input = $(this).val();
                    if (input == sub_skop_lain_code) {
                        all_others_td[i].style.display = 'block';
                    } else {
                        let lain_lain_input = all_others_td[i].querySelectorAll("[id^='skop_lain_lain']");
                        lain_lain_input[0].value = '';
                        all_others_td[i].style.display = 'none';
                    }
                });
            });
            all_sub_minu_btn.forEach((tb, i) => {
                tb.addEventListener("click", () => {
                    const subRow = all_sub_tr[i];
                    const mainRowNo = parseInt(subRow.getAttribute("value"));

                    subRow.remove();

                    // Reset the numbering for subrows in the same main row
                    updateSubRowNumbering(mainRowNo);

                    // Recompute the numbering for main rows
                    updateMainRowNumbering();
                });
            });
        }

        function addSkop() {
            let options = '';
            $.each(skop_project, function (key, item) {
                options = options + '<option value="' + item.skop_code + '">' + item.skop_name + '</option>';
            });
            console.log("adding skop");
            let data = ` <tr class="row m-0 mainrow" >
                <td class="col-md-7 col-xs-12 d-flex">
                    <div class="col-1 mainNumbering" id="mainNumbering" style="position: relative !important;padding-top: 20px !important;padding-left: 5% !important;  font-size: 13px !important; font-weight: bold !important; width:10%;">
                    </div>
                    <div class="p-2 align-items-center" style="width:75%;">
                        <select id="skop_select" class="py-2 form-control" data-db-id="">        
                            ` + options + `
                        </select>
                    </div>
                    <button type="button" data-title="Tambah sub skop"  class="ml-2 addsubrow">
                        <i class="ri-add-box-line ri-xl"></i>
                    </button>
                    <button type="button" data-title="Buang skop" class="minusbutton ml-2">
                        <i class="ri-checkbox-indeterminate-line ri-xl"></i>
                    </button>
                </td>
                <td class="col-md-5 col-xs-12 row">
                    <div class="col-12 p-2 ml-2">
                        <input
                            type="number" id="skop_text"
                            class="py-2 col-md-8 col-xs-12 form-control"
                            value="0" readonly
                        />
                    </div>
                </td>
            </tr>`;

            $('#skopBody').append(data);

            let all_main_minu_btn = document.querySelectorAll(
                ".minusbutton"
            );
            let all_main_tr = document.querySelectorAll(
                ".mainrow"
            );

            let all_main_skop_select = document.querySelectorAll("[id^='skop_select']");

            let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");

            all_main_indexing.forEach((num, i) => {
                num.innerHTML = i + 1;
            });

            let all_main_add_sub_btn = document.querySelectorAll(
                ".addsubrow"
            );

            all_main_tr[all_main_minu_btn.length - 1].setAttribute("data-value", (all_main_minu_btn.length - 1));
            all_main_skop_select[all_main_minu_btn.length - 1].setAttribute("data-value", (all_main_minu_btn.length - 1));

            all_main_skop_select.forEach((tb, i) => {
                tb.addEventListener("change", function (evt) {
                    console.log(all_main_skop_select[i].getAttribute('data-value'));
                    let index = all_main_skop_select[i].getAttribute('data-value');
                    let subclass = ".mainrow" + index;
                    let all_sub_skop_tr = document.querySelectorAll(subclass);
                    all_sub_skop_tr.forEach((tsubrow, j) => {
                        all_sub_skop_tr[j].remove();
                    });

                    // Reset the numbering for subrows in the same main row
                    updateSubRowNumbering(index);

                    // Recompute the numbering for main rows
                    updateMainRowNumbering();
                });
            });

            all_main_minu_btn[all_main_minu_btn.length - 1].addEventListener("click", () => {
                console.log('remove');
                all_main_tr[all_main_minu_btn.length - 1].remove();
                let subrowclass = ".mainrow" + (all_main_minu_btn.length - 1);

                let all_sub_tr = document.querySelectorAll(subrowclass);
                all_sub_tr.forEach((tsubrow, i) => {
                    all_sub_tr[i].remove();
                });
                let all_main_indexing = document.querySelectorAll("[id^='mainNumbering']");

                all_main_indexing.forEach((num, i) => {
                    num.innerHTML = i + 1;
                });

                // Recompute the numbering for main rows
                updateMainRowNumbering();
            });

            all_main_add_sub_btn[all_main_add_sub_btn.length - 1].addEventListener("click", function () {
                addsubrow(all_main_add_sub_btn.length - 1, all_main_tr[all_main_add_sub_btn.length - 1], all_main_skop_select[all_main_skop_select.length - 1]);
            });
        }

        // Initialize the page with at least one main row
        addSkop();

</script>

