<div class="kandungan_tab_content tab-pane fade" id="kandungan_hubungi_kami">
    <form id="contactForm">
    <div class="kandungan_contact_us_container">
        <div class="kandungan_contact_left_container row">
            <div class="form-group input_contains col-md-6 col-xs-12">
                <label for="no telefon">No Telefon</label>
                <input
                type="text"
                class="form-control kandungan_input"
                id="phone_no"
                name="phone_no"
                value=""
                />
            </div>
            <div class="form-group input_contains col-md-6 col-xs-12">
                <label for="no telefon">Emel</label>
                <input
                type="text"
                id="email"
                name="email"
                class="form-control"
                value=""
                />
            </div>
            <div class="form-group input_contains col-12">
                <label for="mapCode">Google Map embed Code</label>
                <textarea type="text" name="mapCode" id="mapCode" class="form-control iframe">
                </textarea>
            </div>
            <div class="form-group input_contains col-12">
                <label for="Alamat" style="margin: 0;
                font-size: 0.89rem;
                color: #646c9a;
                font-weight: 600;
            ">Alamat</label>
                <textarea type="text" name="address" id="address" class="form-control address" rows="5">
                </textarea>
            </div>
        </div>
        {{-- <div class="kandungan_contact_right_container" id="map_container" >
        
        </div> --}}
    </div>
    <div class="kandungan_contact_submit_container">
        <button style="width:110px" type="button" id="contactSubmit" onclick="resetFooter()">Set Semula</button>
        <button style="width:110px" type="button" id="contactSubmit" onclick="submitContact()">Simpan</button>
    </div>

    </form>
</div>