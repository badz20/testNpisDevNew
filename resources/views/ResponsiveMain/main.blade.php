<script src="assets/js/jquery.min.js"></script>
<style>
    #log_masuk_modal {
        background-color: rgb(0, 0, 0);
    }

    @media screen and (max-width: 576px) {
        #log_masuk_modal .log_masuk_modal_dialog {
            max-width: 80%;
            margin: 0;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .login_interface_section #Login_interface_modal .login_interface_modal_dialog {
            max-width: 90%;
            margin: 0;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            overflow-y: initial !important
        }

        #log_masuk_modal .log_masuk_modal_container .log_masuk_modal_left_content {
            display: none;
            flex: 1 1 auto;
        }

        #log_masuk_modal .log_masuk_modal_container .log_masuk_modal_right_content {
            flex: 1 1 auto;
        }

        .form-control{
            font-size: 12px;
        }

        .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body {
            height: 90vh;
            overflow-y: auto;
        }

        #Forget_modal .forget_modal_dialog {
            max-width: 80%;
            margin: 0;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input {
            width: 100%;
        }
    }

    @media screen and (min-width: 576px) {
        #log_masuk_modal .log_masuk_modal_dialog {
            max-width: 58%;
        }

        .login_interface_section #Login_interface_modal .login_interface_modal_dialog {
            max-width: 53%;
        }

        #Forget_modal .forget_modal_dialog {
            max-width: 35%;
        }

        .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input {
            width: 60%;
        }
    }


    #log_masuk_modal .log_masuk_modal_container {
        padding: 5% 0;
        display: flex;
        flex-flow: row nowrap;
    }

    #log_masuk_modal .log_masuk_modal_content_container {
        background: #c1c1c1;
        border: none;
        border-radius: 0;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container {
        display: flex;
        background-color: #fff;
        border-radius: 1rem;
        padding: 1% 1.6%;
        overflow: hidden;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content {
        width: 50%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder {
        padding: 1% 0;
        width: 100%;
        height: 100%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder img {
        width: 100%;
        -o-object-fit: cover;
        /* object-fit: cover; */
        -o-object-position: left;
        object-position: left;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder img.active {
        -webkit-animation: imagechange 3s;
        animation: imagechange 3s;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_left_content .pengguna_img_holder img {
        width: 100%;
        height: 100%;
        border-radius: 1rem 0 0 1rem;
    }

    @-webkit-keyframes imagechange {
        0% {
            transform: translateX(0%);
        }

        50% {
            transform: translateX(-200%);
        }

        75% {
            transform: translateX(5%);
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
        }

        100% {
            transform: translateX(0%);
        }
    }

    @keyframes imagechange {
        0% {
            transform: translateX(0%);
        }

        50% {
            transform: translateX(-200%);
        }

        75% {
            transform: translateX(5%);
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
        }

        100% {
            transform: translateX(0%);
        }
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content {
        width: 50%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_header button {
        background-color: transparent;
        border: none;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body {
        padding: 1% 2% 1% 4%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body h4 {
        font-size: 2.2rem;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 5%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container {
        width: 100%;
        display: flex;
        margin-bottom: 2%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button {
        background: transparent;
        outline: none;
        border: 0;
        padding: 2% 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 0;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(1) {
        width: 45%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(1)::before {
        background: #c6ffdc;
        width: 10%;
        transition: 0.8s cubic-bezier(0.1, -0.4, 0.4, 1.3);
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(1):hover::before {
        width: 100%;
        background: #c6ffdc;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(2) {
        width: 55%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(2)::before {
        background: #b5e6ff;
        width: 8%;
        transition: 0.8s cubic-bezier(0.1, -0.4, 0.4, 1.4);
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button:nth-child(2):hover::before {
        width: 100%;
        background: #b5e6ff;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button span {
        font-size: 1.2em;
        text-transform: uppercase;
        z-index: 1;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .MAsuk_tab_btn_container button.active::before {
        width: 100%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content {
        text-align: center;
        padding-bottom: 6%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content h5 {
        margin-bottom: 1%;
        font-size: 1.5rem;
        text-transform: uppercase;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content h5 span {
        font-style: italic;
        color: #23a354;
        text-transform: none;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content h5.active {
        -webkit-animation: login_text_animation 3s;
        animation: login_text_animation 3s;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content .info_content .info {
        font-size: 0.93rem;
        margin: 0;
    }

    @-webkit-keyframes login_text_animation {
        0% {
            transform: translateX(0%);
            opacity: 1;
        }

        25% {
            opacity: 0;
        }

        50% {
            transform: translateX(-200%);
            opacity: 0;
        }

        75% {
            transform: translateX(100%);
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
            opacity: 0;
        }

        100% {
            transform: translateX(0%);
        }
    }

    @keyframes login_text_animation {
        0% {
            transform: translateX(0%);
            opacity: 1;
        }

        25% {
            opacity: 0;
        }

        50% {
            transform: translateX(-200%);
            opacity: 0;
        }

        75% {
            transform: translateX(100%);
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
            opacity: 0;
        }

        100% {
            transform: translateX(0%);
        }
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .form-group {
        margin-bottom: 3%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form iframe {
        border-radius: 1rem;
        border: 1px solid #9e9e9e;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form input {
        padding: 3.5%;
        height: auto;
        border-color: #000;
        margin-bottom: 4%;
        border-radius: 8px;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form label {
        font-size: 1.1rem;
        font-weight: 600;
        color: #646464;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .masuk_submit {
        padding: 3.1% 0.5rem;
        background-color: #6184de;
        color: #fff;
        border-radius: 10px;
        width: 100%;
        font-size: 1.15rem;
        margin-top: 6%;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .forget_password {
        padding-top: 3%;
        display: flex;
        align-items: flex-end;
        flex-direction: column;
        margin-bottom: 2%;
    }

    #log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .forget_password button {
        font-size: 0.95rem;
        background-color: transparent;
        border: none;
        color: #4a7bba;
        padding: 0.7%;
    }

    #Forget_modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    #Forget_modal .forget_modal_dialog .forget_modal_content {
        border-radius: 10px;
        box-shadow: rgba(1, 8, 17, 0.4) 0px 0px 0px 1px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(15, 15, 15, 0.08) 0px 1px 0px inset;
    }

    #Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body {
        padding: 6% 7%;
    }

    #Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_heading h4 {
        font-size: 1.3rem;
        font-family: poppins_bold;
        text-transform: uppercase;
    }

    #Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_heading p {
        font-size: 0.9rem;
    }

    #Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_form form input {
        background-color: #f8f8f8;
        height: auto;
        padding: 0.5rem 1rem;
        font-size: 1.2rem;
        border-color: #000;
    }

    #Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_form form .forget_submit button {
        text-transform: uppercase;
        border: none;
        border-radius: 5px;
        padding: 1.8% 10%;
        color: #fff;
        font-weight: 500;
        background-color: #1c8c51;
    }

    #sucess_modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    #sucess_modal .sucess_modal_dialog {
        max-width: 35%;
    }

    #sucess_modal .sucess_modal_dialog .sucess_modal_content {
        padding: 5% 3%;
        border-radius: 10px;
        border: none;
    }

    #sucess_modal .sucess_modal_dialog .sucess_modal_content .sucess_modal_body {
        width: 100%;
        margin: auto;
        padding: 5%;
        box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
    }

    #sucess_modal .sucess_modal_dialog .sucess_modal_content .sucess_modal_body h3 {
        font-size: 1.6rem;
        text-align: center;
    }

    #sucess_modal .sucess_modal_dialog .sucess_modal_content .sucess_modal_body button {
        margin-top: 4%;
        background-color: #0062dd;
        border-radius: 20px;
        color: #fff;
        border: none;
        font-size: 0.87rem;
        padding: 0.4rem 1rem;
    }

    .login_interface_section #Login_interface_modal {
        font-family: Poppins_Regular;
        background-color: rgba(0, 0, 0, 0.2);
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body {
        width: 78%;
        margin: 2% auto;
        padding: 0;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content {
        width: 85%;
        margin: auto;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content h4 {
        font-size: 1.8rem;
        font-family: Poppins_bold;
        margin: 3% 0 5%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_container {
        padding-bottom: 3%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_container label {
        font-size: 0.9rem;
        color: #4a649d;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container {
        display: flex;
        gap: 1%;
        margin-bottom: 1.2%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container div label {
        width: 100%;
        font-size: 0.85rem;
        color: #4a649d;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input input,
    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
        font-size: 0.9rem;
        height: auto;
        padding: 1.5% 3%;
        box-shadow: none;
        border-radius: 0;
        /* background-color: transparent; */
        border-color: #e2e5ec;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='32' height='32'><path fill='none' d='M0 0h24v24H0z'/><path d='M12 16l-6-6h12z' fill='rgba(126,126,126,1)'/></svg>");
        background-repeat: no-repeat;
        background-position: right 3% top 40%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker {
        display: flex;
        gap: 2% !important;
        padding-left: 3% !important;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker input {
        width: 3.8%;
        aspect-ratio: 1/1;
        padding: 2%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker .form_check_label {
        display: block;
        width: 98%;
        font-size: 0.8rem;
        color: #002afa;
        margin: 0;
        margin-left: auto;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label {
        width: 24%;
        align-items: center;
        gap: 10%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label label {
        width: 60%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content {
        background-color: #e9e9e9;
        padding: 4% 3%;
        left: 15.5%;
        top: 54%;
        z-index: 99;
        font-size: 0.67rem;
        border-radius: 0.35rem;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content::before {
        position: absolute;
        content: "";
        left: -2.4%;
        top: -7px;
        transform: rotate(333deg);
        border-left: 10px solid #e9e9e9;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content span {
        color: #e40001;
        font-weight: 600;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_content p {
        color: #0e0e0e;
        margin: 0;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_btn {
        position: relative;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_btn button {
        padding: 0;
        box-shadow: none;
        position: relative;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .file_label .pop_btn button img {
        width: 100%;
        pointer-events: none;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file {
        border: 1px solid #e2e5ec;
        width: 100%;
        position: relative;
        display: flex;
        align-items: center;
        padding: 2%;
        gap: 2%;
        margin-left: 3.2%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file input {
        width: 0;
        height: 0;
        visibility: hidden;
        position: absolute;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file button {
        border: 1px solid #898989;
        border-radius: 4px;
        padding: 1.8% 2%;
        margin: 0 2%;
        font-size: 0.9rem;
        background-color: transparent;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .file_size {
        margin: 0;
        color: #898989;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .selected_file {
        font-size: 0.9rem;
        gap: 1rem;
        align-items: center;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .selected_file p {
        margin: 0;
        font-size: 0.8rem;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input_file .selected_file button {
        background-color: transparent;
        border: none;
        font-size: 0.7rem;
        color: red;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7%;
        padding-bottom: 8%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button {
        color: #fff;
        display: block;
        text-transform: uppercase;
        font-size: 1rem;
        border: none;
        border-radius: 8px;
        padding: 1.4% 4.5%;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button:nth-child(1) {
        background-color: #fe0000;
    }

    .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button:nth-child(2) {
        background-color: #1400ff;
    }

    .login_sucess_modal_container #login_sucess_modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog {
        max-width: 37%;
    }

    .login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content {
        padding: 3% 3%;
        border-radius: 10px;
        border: none;
    }

    .login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .login_sucess_modal_body {
        width: 100%;
        margin: auto;
        padding: 4%;
        box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
    }

    .login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .login_sucess_modal_body h3 {
        font-size: 1.35rem;
        font-weight: 600;
        text-align: center;
    }

    .login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .login_sucess_modal_body button {
        margin-top: 2%;
        background-color: #0062dd;
        border-radius: 20px;
        color: #fff;
        border: none;
        font-size: 0.87rem;
        padding: 0.4rem 1rem;
    }

    .login_sucess_modal_container #login_sucess_modal .login_sucess_modal_dialog .login_sucess_modal_content .sucess_msg {
        position: absolute;
        top: -50%;
        left: 40%;
    }

    .add_role_modal_container #add_role_modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog {
        max-width: 39.5%;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header {
        background-color: #39afd1;
        padding: 2%;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header h5 {
        font-size: 0.89rem;
        color: #fff;
        margin: 0;
        padding-left: 1rem;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header button {
        background-color: transparent;
        border: none;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header button img {
        filter: brightness(0) invert(1);
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body {
        padding: 1% 3%;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .configuration {
        margin-bottom: 4%;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .configuration button {
        background-color: transparent;
        border: none;
        color: #39afd1;
        font-size: 0.78rem;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th,
    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td {
        border: none;
        font-size: 0.8rem;
        padding: 0.5rem;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th {
        color: #777ea8;
        padding-bottom: 0.8rem;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th:nth-child(2) {
        width: 30%;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td {
        color: #6e7180;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td input {
        width: 1rem;
        aspect-ratio: 1/1;
        border-radius: 0.2rem;
        border: 1px solid #6d767d;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_footer {
        margin: 5% 0 3% 0;
    }

    .add_role_modal_container #add_role_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_footer button {
        color: #fff;
        background-color: #5a63c2;
        border: none;
        font-size: 0.8rem;
        padding: 1% 1.8%;
        border-radius: 0.2rem;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal,
    .add_role_sucess_modal_container #global_sucess_modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog {
        max-width: 31%;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content {
        padding: 3% 2.5%;
        border-radius: 10px;
        background-color: #f5f6fa;
        border: none;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content.global_sucess_modal_content,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content.global_sucess_modal_content {
        border-radius: 15px;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body {
        width: 100%;
        background-color: #fff;
        margin: auto;
        padding: 0;
        box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header {
        display: flex;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header button,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_header button {
        background-color: transparent;
        border: none;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content {
        padding: 4%;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content .success_header,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content .success_header {
        margin-bottom: 5%;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content h3,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content h3 {
        font-size: 1.25rem;
        font-weight: 500;
        text-align: center;
        margin: 4% 0 10% 0;
        color: #464356;
    }

    .add_role_sucess_modal_container #add_role_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content button.tutup,
    .add_role_sucess_modal_container #global_sucess_modal .add_role_sucess_modal_dialog .add_role_sucess_modal_content .add_role_sucess_modal_body .add_role_sucess_modal_body_Content button.tutup {
        margin: 2% 0 3% 0;
        background-color: #5b64c3;
        color: #fff;
        border: none;
        border-radius: 0.22rem;
        font-size: 0.8rem;
        padding: 8px 15px 8px 15px;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog {
        max-width: 39.5%;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header {
        background-color: #39afd1;
        padding: 2%;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header h5 {
        font-size: 0.89rem;
        color: #fff;
        margin: 0;
        padding-left: 1rem;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header button {
        background-color: transparent;
        border: none;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_header button img {
        filter: brightness(0) invert(1);
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body {
        padding: 1% 3%;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form label {
        font-size: 0.8rem;
        color: #757ca5;
        font-weight: 600;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form input {
        height: auto;
        padding: 0.6rem 1rem;
        font-size: 0.88rem;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form textarea {
        height: 5rem;
        border-bottom-right-radius: 0;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body form .textarea_depender {
        background-color: #0acf97;
        font-size: 0.7rem;
        color: #fff;
        right: 0;
        padding: 0.1rem 0.65rem;
        border-radius: 0 0 6px 6px;
        margin: 0;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body .add_selenggara_data_modal_footer {
        margin: 3% 0 3% 0;
    }

    .add_selenggara_data_modal_container #add_selenggara_data_modal .add_selenggara_data_modal_dialog .add_selenggara_data_modal_content .add_selenggara_data_modal_body .add_selenggara_data_modal_footer button {
        color: #fff;
        background-color: #5a63c2;
        border: none;
        font-size: 0.8rem;
        padding: 1% 1.8%;
        border-radius: 0.1rem;
    }

    .login_container {
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login_container .login_btn {
        padding: 1rem 3%;
        font-size: 1.4rem;
    }

    .eye_icon {
        position: absolute;
        top: 53%;
        right: 2%;
        background-color: transparent;
        border: none;
        z-index: 9999;
    }

    .sucess_msg {
        position: absolute;
        top: -18%;
        left: 40%;
    }

    .sucess_msg img {
        background-color: #fff;
        border-radius: 50%;
    }

    .modal-backdrop {
        background-color: transparent;
    }

    .popover-body {
        padding: 1.5rem 1.4rem;
        background-color: #e9e9e9;
        font-size: 0.75rem;
    }

    .bs-popover-right>.arrow::after {
        border-right-color: #e9e9e9;
    }

    .switch {
        margin: 0;
        position: relative;
        display: inline-block;
        width: 45px;
        height: 22px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 3px;
        background-color: #a1aab1;
        transition: 0.4s;
    }

    input:checked+.slider {
        background-color: #0acd95;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #0acd95;
    }

    input:checked+.slider:before {
        transform: translateX(21px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
        background-color: #fff;
    }

    .r_container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 0.9rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .r_container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 2;
        left: 0;
        height: 17px;
        width: 17px;
        background-color: #eee;
        border-radius: 50%;
        border: 1px solid #636b99;
    }

    /* On mouse-over, add a grey background color */
    .r_container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .r_container input:checked~.checkmark {
        background-color: #fff;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .r_container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .r_container .checkmark:after {
        top: 1px;
        left: 1px;
        width: 13px;
        height: 13px;
        border-radius: 50%;
        background: #656c9a;
    }

    .required:after {
        content: " *";
        color: red;
    }
</style>

@if (Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@php
    $site_key = config('services.googleCaptcha.site_key');
    $secret_key = config('services.googleCaptcha.secret_key');
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var onReturnCallback = function(response) {
        var ic_no = $(".ic_no").val();
        var ic_length = ic_no.length
        var emel = $(".E-mel").val();
        // console.log(ic_length);
        if (ic_length == 12 || emel != '') {
            if (response) {
                $("#login-jps").prop('disabled', false);
                $("#login-nonjps").prop('disabled', false);
                $(".ic_error").addClass('d-none');

            }
        } else {

            var ic_error = "Sila masukkan 12 digit Nombor Kad Pengenalan";
            $(".ic_error").removeClass('d-none');
            $(".ic_error").text(ic_error);
            grecaptcha.reset();

        }

    }

    var onReturnCallbackRegister = function(response) {
        console.log(response)
        if (response) {
            $("#exampleCheck1").prop('disabled', false);
            //document.querySelector('#submit_registration').disabled = false;

        }
    }
</script>




<script>
    $(document).keypress(
        function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });
    $(document).ready(function() {

        localStorage.setItem("jawatan_name", '');
        localStorage.setItem("profile_path", '')

        document.getElementById("kategori").value = 2;
        $("#exampleCheck1").prop('disabled', true);
        document.querySelector('#submit_registration').disabled = true;
        // document.getElementById("jps_daerah").style.display = 'none';
        // document.getElementById("jps_negeri").style.display = 'none';
        // document.getElementById("agency_daerah").style.display = 'block';
        // document.getElementById("agency_negeri").style.display = 'block';

        // document.getElementById("kementerian_jps").style.display = "none";
        // document.getElementById("Kementerian").style.display = "block";
        // document.getElementById("jabatan").style.display = "block";
        // document.getElementById("jabatan_jps").style.display = "none";

        const api_url = "{{ env('API_URL') }}";
        console.log(api_url);
        const app_url = document.getElementById("app_url").value;
        console.log(app_url);
        const api_token = "Bearer " + window.localStorage.getItem('token');
        console.log(api_token);
        $('#subForgotButton').click(function() {
            var user_id = $("#exampleInputEmail1").val();
            var user_email = $("#exampleInputPassword1").val();

            if (user_id == '' && user_email == '') {
                $("#error").html("Pengesahan Pengguna Tidak Sah");
            } else {
                if (IsEmail(user_email) == false) {
                    $("#error").html("Format E-mel Tidak Sah");
                } else {
                    //need to validate ic and email and then send email

                    axios({
                            method: "get",
                            url: api_url + "api/user/userDetails/" + user_email + "/" + user_id,
                            //data: formData,
                            headers: {
                                "Content-Type": "application/json",
                                "Authorization": api_token
                            },
                        })
                        .then(function(response) {
                            //handle success
                            console.log(response.data.code);
                            if (response.data.code == 200) {
                                $('#sucess_modal').modal('show');

                                $("#mail_successBtn").click(function() {
                                    $('#submitForgot').submit();
                                })
                            } else {
                                //$('#Forget_modal').modal('show');
                                document.getElementById('forget_user_error').style.display =
                                'block';
                            }
                        })
                        .catch(function(response) {
                            //handle error
                            console.log(response);
                            alert("There was an error submitting data");
                        });

                }

            }

            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
            // console.log(user_id)
            // console.log(user_email)
            // $.ajax({
            //     type: "POST",
            //     url: api_url+"api/finduser",
            //     contentType: "application/json",
            //     dataType: "json",
            //     data: JSON.stringify({
            //         no_id: user_id,
            //         user_email: user_email,
            //     }),
            //     success: function(response) {
            //         console.log(response);
            //     },
            //     error: function(response) {
            //         console.log(response);
            //     }
            //   });
            // var formData = new FormData();
            // var name = $("#email").val();
            // console.log(name)
            // //formData.append('email', document.submitForgot.email.value);
            // axios({
            // 	method: "post",
            // 	url: api_url+"forgot-password",
            // 	data: formData,
            // 	headers: { "Content-Type": "application/json","Authorization": api_token },
            // })
            // .then(function (response) {
            // 	//handle success
            // 	console.log(response.data.code);				
            // 	})
            // 	.catch(function (response) {
            // 		//handle error
            // 		console.log(response);
            // 		alert("There was an error submitting data");
            // 	});
            // console.log('modal submitted')

            // $('#submitForgot').submit();
        });

        $.ajaxSetup({
            headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
            }
        });

        // ----------------------------------------login-------------------------------------------

        if (login) {
            let pop_content = document.querySelector(".pop_content");
            let pop_btn = document.querySelector(".pop_btn button");
            pop_btn.addEventListener("click", () => {
                pop_content.classList.toggle("d-none");
            });
            eye_icon.addEventListener("click", (e) => {
                console.log(password_eye_field);
                e.preventDefault();
                password_eye_field.type == "password" ?
                    (password_eye_field.type = "text") :
                    (password_eye_field.type = "password");
            });
            document.querySelector(".masuk_submit").addEventListener("click", (e) => {
                e.preventDefault();
            });
            r_input.forEach((inp, i) => {
                inp.addEventListener("click", () => {
                    interface_tab_content.forEach((itc) => {
                        itc.classList.add("d-none");
                    });
                    if (inp.checked == true) {
                        interface_tab_content[i].classList.remove("d-none");
                    }
                });
            });
            r_input[1].click();

            // input_file
            input_file_btn.addEventListener("click", (e) => {
                e.preventDefault();
                console.log(input_file);
                input_file.click();
            });

            // -------------------------
            input_file.addEventListener("change", () => {
                var files = input_file.files;
                if (FileReader && files && files.length) {
                    var fr = new FileReader();
                    // console.log(fr);

                    fr.onload = function() {
                        console.log(fr.result, input_file.files);
                    };

                    fr.readAsDataURL(files[0]);
                }
            });
            let form_btn = document.querySelectorAll(".form_btn_container button");
            form_btn.forEach((fb) => {
                fb.addEventListener("click", (e) => {
                    e.preventDefault();
                });
            });
            let login_tab_btn = document.querySelectorAll(
                ".MAsuk_tab_btn_container button"
            );
            let pengguna_img = document.querySelector(".pengguna_img_holder img");
            let src = [
                "assets/images/jps_image.png",
                "assets/images/agensy_image.png",
            ];
            let colorCode = ["#23a354", "#0284c6"];
            let info_content = document.querySelector(".info_content h5");
            let login_status = ["Pengguna JPS", "Pengguna Agensi Luar"];
            login_tab_btn.forEach((btn, i) => {
                let ind = -1;
                btn.addEventListener("click", () => {
                    if (!btn.classList.contains("active")) {
                        pengguna_img.classList.add("active");
                        info_content.classList.add("active");
                        pengguna_img.addEventListener("animationend", () => {
                            pengguna_img.classList.remove("active");
                            info_content.classList.remove("active");
                        });
                        setTimeout(() => {
                            pengguna_img.setAttribute("src", src[i]);
                            info_content.querySelector("span").innerText = login_status[
                                i];
                            info_content.querySelector("span").style.color = colorCode[
                                i];
                        }, 600);
                    }

                    ind = -1;
                    login_tab_btn.forEach((btn) => {
                        btn.classList.remove("active");
                    });
                    btn.classList.add("active");
                });
                btn.addEventListener("mouseenter", () => {
                    if (!btn.classList.contains("active")) {
                        for (let j = 0; j < login_tab_btn.length; j++) {
                            if (login_tab_btn[j].classList.contains("active")) {
                                ind = j;
                                console.log(ind);
                                login_tab_btn[j].classList.remove("active");
                            }
                        }
                        btn.addEventListener("mouseleave", () => {
                            console.log(ind);
                            if (ind >= 0) {
                                login_tab_btn[ind].classList.add("active");
                                ind = -1;
                            }
                        });
                    }

                    // if (btn.classList.contains("active")) {
                    //   console.log(i);
                    //   let ind = i;
                    //   login_tab_btn.forEach((btn) => {
                    //     btn.classList.remove("active");
                    //   });
                    //   if (ind >= 0) {
                    //     btn.addEventListener("mouseout", () => {
                    //       btn[ind].classList.add("active");
                    //     });
                    //   }
                    // }
                });
            });
        }



    });
</script>

{{-- @endpush --}}
<style>
    p#file_size {
        padding-left: 12px;
        color: red;
    }

    p#file_type {
        padding-left: 12px;
        color: red;
    }

    span.error {
        color: red;
        font-size: 10px;
    }

    label.col-form-label.form_label {
        padding-top: 0px;
    }

    #sucess_modal_register {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .btn_upload {
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        position: relative;
        border: 1px solid #8ea4ad;
        padding: 5px 10px;
        border-radius: 6px;
        width: 130px;
    }

    .pop_btn {
        margin-left: 12px;
        height: 20px;
        width: 20px;
    }

    .file_label.d-flex {
        margin-right: 15px;
    }

    .btn_upload:hover,
    .btn_upload:focus {
        cursor: pointer;
    }

    .yes {
        display: flex;
        align-items: flex-start;
        margin-top: 10px !important;
        border: 1px solid #dddddd;
        padding-top: 9px;
        padding-bottom: 9px;
        padding-left: 30px;
        padding-right: 66px;
    }

    .btn_upload input {
        cursor: pointer;
        height: 100%;
        position: absolute;
        -moz-opacity: 0;
        opacity: 0;
    }

    .it {
        height: 100px;
        margin-left: 10px;
    }

    .btn-rmv1,
    .btn-rmv2,
    .btn-rmv3,
    .btn-rmv4,
    .btn-rmv5 {
        display: none;
    }

    .rmv {
        cursor: pointer;
        color: #fff;
        border-radius: 30px;
        border: 1px solid #fff;
        display: inline-block;
        background: rgba(255, 0, 0, 1);
        margin: -5px -10px;
    }

    .rmv:hover {
        background: rgba(255, 0, 0, 0.5);
    }

    button#remove_pdf {
        border: 0px;
        font-size: 10px;
        background-color: transparent;
        color: red;
        padding-left: 12px;
        padding-top: 5px;
    }

    .selected_file.d-flex {
        padding-left: 10px;
    }

    p.file_sizes {
        font-size: 12px;
        padding-top: 13px;
        padding-left: 15px;
    }

    label.form_check_label {
        color: #595b5f !important;
    }

    label.r_container {
        color: black !important;
        filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.19));
        font-weight: 600;
    }
</style>
@section('content')
    @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    {{-- <link rel="stylesheet" href="assets/css/style.css" /> --}}
    <link rel="stylesheet" href="assets/css/Mediaquery.css" />
    <link rel="stylesheet" href="resources/views/responsivemain/css/style.css" />
    <!-- captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!DOCTYPE html>
    <html lang="en">
    <input type="hidden" id="token" value={{ env('TOKEN') }}>
    <input type="hidden" id="api_url" value={{ env('API_URL') }}>
    <input type="hidden" id="app_url" value={{ env('APP_URL') }}>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        {{-- <title>{{ $data['title'] }}</title> --}}
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="main/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="main/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="main/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="main/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="main/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="main/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="main/assets/css/login-register.css" rel="stylesheet" />
        <!-- Template Main CSS File -->
        <link href="main/assets/css/main.css" rel="stylesheet">


        <style>

            .col-xs-5ths,
            .col-sm-5ths,
            .col-md-5ths,
            .col-lg-5ths {
                position: relative;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
                display: inline-block;
                text-align: left;
            }

            @media (min-width: 768px) {
                .col-sm-5ths {
                    width: 20%;
                    float: left;
                }
            }

            @media (min-width: 992px) {
                .col-md-5ths {
                    width: 20%;
                    float: left;
                }
            }

            @media (min-width: 1200px) {
                .col-lg-5ths {
                    width: 20%;
                    float: left;
                }
            }

            .jump {
                margin-top: -86px;
                padding-top: 120px;
            }

            /* Header start */
            .navbar-toggler-icon {
                display: inline-block;
                width: 1.5em;
                height: 1.5em;
                vertical-align: middle;
                content: "";
                background: no-repeat center center;
                background-size: 100% 100%;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            .header .navbar-toggler {
                display: none;
            }

            @media screen and (max-width: 576px) {
                .header a.navbar-toggler {
                    float: right;
                    display: block;
                }
                .header.responsive {
                    position: relative;
                }

                .header.responsive a.icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }

                .header.responsive nav ul li a {
                    float: none;
                    display: block;
                    text-align: left;
                }
            }

            a {
                all: unset;
                cursor: pointer;
            }
            .flex {
                display: flex;
                flex-wrap: wrap;
            }

            .header {
                background-color: white;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }
            .header .wrap {
                max-width: 100%;
                height: 100px;
                padding: 0 20px;
                margin: 0 auto;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                align-items: center;
            }
            .logo a {
                font-size: 2rem;
                font-weight: bold;
                align-items: center;
                font-family: "Shadows Into Light", cursive;
            }
            .logo a span {
                color: var(--prime-color);
            }
            .logo a::before {
                content: "";
                margin-right: 7px;
                width: 50px;
                height: 50px;
                background: url("./lemon.png") no-repeat center;
                background-size: 50px;
            }

            .icon-bar {
                display: none;
            }

            .navbar .close-nav {
                display: none;
            }

            .navbar ul {
                list-style: none;
                padding: 0;
                margin: 0;
                height: 100%;
                align-items: center;
            }

            .navbar li {
                padding: 0 0.6em;
            }

            .navbar a {
                font-size: 1.25rem;
                display: inline-block;
                padding: 0.1em;
                font-weight: bold;
            }
            .navbar a:hover {
                color: var(--prime-color);
            }

            @media screen and (max-width: 576px) {
                .flex {
                  display: flex;
                  flex-wrap: nowrap;
                }
                .header .wrap {
                    max-width: 100%;
                    height: 100px;
                    padding: 0 0;
                    margin: 0 auto;
                    justify-content: space-between;
                    align-items: center;
                }
                .container {
                    font-size: 1rem;
                }
                .icon-bar {
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    border: 1px solid var(--prime-color);
                    width: 50px;
                    height: 50px;
                    padding: 0 12px;
                    border-radius: 3px;
                }
                .icon-bar:hover {
                    background-color: #fffaf6;
                }
                .icon-bar span {
                    border-top: 2px solid var(--font-color);
                    width: 100%;
                }
                .icon-bar span::before,
                .icon-bar span::after {
                    content: "";
                    border-bottom: 2px solid var(--font-color);
                    display: block;
                    height: 8px;
                }
                .overflow-none {
                    overflow: hidden;
                }
                .navbar {
                    position: fixed;
                    width: 100%;
                    height: 100%;
                    transition: 0.2s linear;
                    transform: scale(0);
                    top: 0;
                    left: 0;
                    background-color: #fafcf5;
                    z-index: 9;
                }
                .navbar .close-nav {
                    all: unset;
                    font-size: 2.5rem;
                    display: block;
                    position: absolute;
                    top: 1.5rem;
                    right: 1.5rem;
                    cursor: pointer;
                }
                .navbar .close-nav:hover {
                    color: #999999;
                }
                .navbar ul {
                    flex-direction: column;
                    align-items: center;
                    padding: 2rem;
                    background-color: white;
                }
                .navbar li {
                    padding: 0.7rem 0;
                }
                .navbar a {
                    font-size: 4vmin;
                    text-transform: uppercase;
                    color: #999999;
                }
                .navbar a:hover {
                    text-decoration: underline;
                }
                .nav-scale {
                    transform: scale(1) !important;
                }

                .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover>a {
                    color: #212529;
                    text-decoration: underline;
                }
            }
            /* Header end */
        </style>
        <!-- =======================================================
      * Template Name: UpConstruction - v1.0.0
      * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
      ======================================================== -->
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header class="header">
          <div class="wrap flex">
            <div class="icon-bar flex"><span class="navbar-toggler-icon"></span></div>
            <div class="logo flex">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.png" alt=""> -->
              {{-- <!-- <h1>{{ $data['header'] }}<span>.</span></h1> --> --}}
              <div id="logo_source">

              </div>
              <img id="logo1" src="/images/jata.png" height="60px">
              <img id="logo2" src="/images/npisLogo.png" height="50px" style="padding-right:20px;">
              <img id="logo3" src="/images/logo-npis.png" height="100px">
            </div>
            <nav class="navbar">
              <ul class="">
                <button type="button" class="close-nav close">
                    <img src="assets/images/image 95.png" alt="" />
                </button>
                <li><a href="#" class="active" id="utama_link">Utama</a></li>
                <li><a href="#about" id="about_link">Pengenalan</a></li>
                <li><a href="#informasi_terikini" id="informasi_link">Informasi Terkini</a></li>
                <li><a href="#services" id="modul_link">Modul NPIS</a></li>
                <li><a href="#contact" id="hubungi_link">Hubungi Kami</a></li>
                <li><a data-toggle="modal" data-target="#log_masuk_modal" style="cursor: pointer">Log Masuk</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <!-- End Header -->
        <script>
            $(document).ready(function() {
                var utama_link = document.getElementById("utama_link");
                var about_link = document.getElementById("about_link");
                var informasi_link = document.getElementById("informasi_link");
                var modul_link = document.getElementById("modul_link");
                var hubungi_link = document.getElementById("hubungi_link");
                let navMenu = document.querySelector('.navbar');
                let bodyEl = document.querySelector('body');

                utama_link.addEventListener('click', function handleClick(event) {
                    event.target.classList.add('active');
                    about_link.classList.remove('active');
                    informasi_link.classList.remove('active');
                    modul_link.classList.remove('active');
                    hubungi_link.classList.remove('active');
                    navMenu.classList.remove('nav-scale');
                    bodyEl.classList.remove('overflow-none');
                });

                about_link.addEventListener('click', function handleClick(event) {
                    event.target.classList.add('active');
                    utama_link.classList.remove('active');
                    informasi_link.classList.remove('active');
                    modul_link.classList.remove('active');
                    hubungi_link.classList.remove('active');
                    navMenu.classList.remove('nav-scale');
                    bodyEl.classList.remove('overflow-none');
                });

                informasi_link.addEventListener('click', function handleClick(event) {
                    event.target.classList.add('active');
                    utama_link.classList.remove('active');
                    about_link.classList.remove('active');
                    modul_link.classList.remove('active');
                    hubungi_link.classList.remove('active');
                    navMenu.classList.remove('nav-scale');
                    bodyEl.classList.remove('overflow-none');
                });

                modul_link.addEventListener('click', function handleClick(event) {
                    event.target.classList.add('active');
                    utama_link.classList.remove('active');
                    about_link.classList.remove('active');
                    informasi_link.classList.remove('active');
                    hubungi_link.classList.remove('active');
                    navMenu.classList.remove('nav-scale');
                    bodyEl.classList.remove('overflow-none');
                });

                hubungi_link.addEventListener('click', function handleClick(event) {
                    event.target.classList.add('active');
                    utama_link.classList.remove('active');
                    about_link.classList.remove('active');
                    informasi_link.classList.remove('active');
                    modul_link.classList.remove('active');
                    navMenu.classList.remove('nav-scale');
                    bodyEl.classList.remove('overflow-none');
                });

            });
        </script>

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero">
            <div id="videoContent" class="info d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">

                            <h2 data-aos="fade-down" id="main_header" style="font-size: 7vmin">NATIONAL PROJECT
                                INFORMATION SYSTEM </h2>
                            {{-- <h2 data-aos="fade-down">{{ $data['title'] }}</h2> --}}
                            {{-- <p data-aos="fade-up">{{ $data['title'] }}</p> --}}
                            {{-- <a data-aos="fade-up" data-aos-delay="200" href="#main"
                            class="btn-get-started">Selanjutnya</a> --}}
                            <br />
                            <a data-aos="fade-up" data-aos-delay="200" href="#main" class="btn-get-started"
                                style=""><i class="fa fa-angle-double-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <video playsinline autoplay muted loop id="bgvid" style="width:100%;height:100%;object-fit: cover;"
                    class="active">
                    <source src="main/assets/landing.mp4" type="video/mp4">
                </video>

            </div>
            {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                </ol>
                <div class="carousel-inner">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

                    <span class="carousel-control-prev-icon" aria-hidden="true">
                        < </span>
                            <span class="sr-only">Previous</span>

                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true">
                        >
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </div> --}}

        </section><!-- End Hero Section -->
        <br><br><br>
        <main id="main">
            {{-- <section id="about" class="about section-bg"> --}}

            {{-- <section id="about" class="about section-bg jump" style="background-image: url(images/1.jpg);background-position: center;background-size: cover;background-attachment: fixed;height:800px;"> --}}
            <section id="about" class="about section-bg" style="margin-top: -50px;padding-top:50px;">
                <video playsinline autoplay muted loop id="peng_bgvid"
                    style="position:absolute;top 0;left 0;display:block;width:100%;height:70%;object-fit:cover"
                    class="carousel-item active">
                    <source src="main/assets/waterfall_static.MP4" type="video/mp4">
                </video>
                <img id="peng_bgimg" src=""
                    style="position:absolute;top 0;left 0;display:block;width:100%;height:70%;object-fit:cover">
                <div class="container" data-aos="fade-up">

                    <div class="row position-relative">

                        {{-- <div class="col-lg-7 about-img" style="background-image: url(images/4.jpg);"></div> --}}

                        <div class="col-lg-12">
                            <h1 style="color:white; padding-top:150px; font-size: 8vmin;" id="peng_header">PENGENALAN</h1>
                            <br />
                            {{-- <h2>PENGENALAN</h2> --}}
                            <div class="our-story2"
                                style="background-color:rgba(255,255,255,0.8); border-radius:5px;box-shadow: 2px 1px 4px rgb(0, 0, 0);padding:50px;margin:auto;">
                                <p style="text-align: justify;color:black; font-size: 4vmin;" id="peng_description">
                                    {{-- NATIONAL PROJECT INFORMATION SYSTEM (NPIS) digunakan
                                    untuk mengurus portfolio projek yang
                                    masih aktif, merekod status projek, dan berkongsi status terkini projek dengan
                                    pihak berkepentingan dalaman dan luaran. Ianya membolehkan pengurusan pemantauan
                                    portfolio projek yang besar dapat dijalankan dengan cekap dan membolehkan
                                    penyampaian maklumat kemajuan projek dengan lebih efektif. --}}

                                    <i>National Project Information System</i> atau dikenali sebagai NPIS, berupaya untuk
                                    memantau dan merekod status kemajuan projek secara bersepadu,
                                    menganalisis maklumat-maklumat perincian projek dengan tepat ketika proses analisis
                                    berlangsung.


                                    {{-- Sistem NPIS mula dibangunkan sejak tahun 2022 dan telah digunapakai pada tahun
                                    2023. --}}

                                </p>

                                <!--<div class="watch-video d-flex align-items-center position-relative">
                    <i class="bi bi-play-circle"></i>
                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link">Watch Video</a>
                  </div> -->
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <style>
                /*--------------------------------------------------------------
                  # informasi_terikini
                  --------------------------------------------------------------*/
                .informasi_terikini .nav-tabs {
                    border: 0;
                }

                .informasi_terikini .nav-link {
                    border: 0;
                    padding: 20px;
                    color: #555555;
                    border-radius: 0;
                    border-left: 5px solid #fff;
                    cursor: pointer;
                }

                .informasi_terikini .nav-link h4 {
                    font-size: 18px;
                    font-weight: 600;
                    transition: 0.3s;
                }

                .informasi_terikini .nav-link p {
                    font-size: 14px;
                    margin-bottom: 0;
                }

                .informasi_terikini .nav-link:hover h4 {
                    color: #3fbbc0;
                }

                .informasi_terikini .nav-link.active {
                    background: #f7fcfc;
                    border-color: #3fbbc0;
                }

                .informasi_terikini .nav-link.active h4 {
                    color: #3fbbc0;
                }

                .informasi_terikini .tab-pane.active {
                    -webkit-animation: slide-down 0.5s ease-out;
                    animation: slide-down 0.5s ease-out;
                }

                .informasi_terikini .tab-pane img {
                    float: left;
                    max-width: 300px;
                    padding: 0 15px 15px 0;
                }

                @media (max-width: 768px) {
                    .informasi_terikini .tab-pane img {
                        float: none;
                        padding: 0 0 15px 0;
                        max-width: 100%;
                    }
                }

                .informasi_terikini .tab-pane h3 {
                    font-size: 26px;
                    font-weight: 600;
                    margin-bottom: 20px;
                    color: #3fbbc0;
                }

                .informasi_terikini .tab-pane p {
                    color: #777777;
                }

                .informasi_terikini .tab-pane p:last-child {
                    margin-bottom: 0;
                }

                @-webkit-keyframes slide-down {
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }

                @keyframes slide-down {
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }
            </style>

            <section id="informasi_terikini" class="informasi_terikini jump">
                <div class="container" data-aos="fade-up">
                    <br />
                    <br />
                    <div class="section-header">
                        <h2 style="font-size: 6vmin">INFORMASI TERKINI</h2>
                        <p>Informasi terkini/ pemberitahuan berita terkini.</p>
                    </div>

                    {{-- <div class="section-title">
                        <h1>INFORMASI TERKINI</h1>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div> --}}

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <ul class="nav nav-tabs flex-column" id="informasi_side">
                                <!-- <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                            <h4>Saliran</h4>
                                            <p><b>3 Mei 2022</b> - Penambahbaikan paip saliran air di Sungai Tamar di
                                                Kelantan.</p>
                                        </a>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                            <h4>Binaan</h4>
                                            <p><b>27 Jun 2022</b> - Pembinaan Tambak baru bagi Kampung Sungai Gadut telah di
                                                bina dalam masa 6 bulan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                            <h4>Tanam Semula</h4>
                                            <p><b>3 Mei 2022</b> - Penanaman anak pokok bakau di pahang bagi projek CINTAKAN
                                                BUMI.</p>
                                        </a>
                                    </li> -->
                                {{-- <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                        <h4>Pediatrics</h4>
                                        <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content" id="informasi_main">
                                <!-- <div class="tab-pane active show" id="tab-1">
                                        <h3>Saliran</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <img src="main/images/1.JPG" alt="" class="img-fluid">
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                            eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                            minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                            similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        <h3>Binaan</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <img src="main/images/2.JPG" alt="" class="img-fluid">
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                            eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                            minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                            similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="tab-pane" id="tab-3">
                                        <h3>Tanam Semula</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <img src="main/images/3.JPG" alt="" class="img-fluid">
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                            eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                            minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                            similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="tab-pane" id="tab-4">
                                        <h3>Pediatrics</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <img src="main/images/4.JPG" alt="" class="img-fluid">
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                            eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                            minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                            similique accusamus nostrum rem vero</p>
                                    </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End Departments Section -->


            <style>
                .collapsible {
                    border-radius: 20px 20px 20px 20px;
                    background: #6892A6;
                    color: white;
                    /* font-size: 15px; */
                    padding: 15px;
                    width: 210px;
                    height: 250px;
                    text-align: center;
                    outline: none;
                    box-shadow: 2px 1px 4px grey;
                }

                .active2,
                .collapsible:hover {
                    background-color: #5a889e;
                    border-radius: 20px 20px 0px 0px;

                }

                .content2 {
                    padding: 0 18px;
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 0.4s ease-out;
                    background-color: hsl(0, 0%, 100%);
                    width: 210px;
                    border-radius: 0px 0px 20px 20px;
                    border-left: 1px solid rgb(87, 87, 87);
                    border-right: 1px solid rgb(87, 87, 87);
                    box-shadow: 2px 1px 4px grey;
                }

                .icon {
                    font-size: 4em;
                }

                /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
                .flip-card {
                    background-color: transparent;
                    width: 210px;
                    height: 250px;
                    border: 1px solid #f1f1f1;
                    perspective: 1000px;
                    /* Remove this if you don't want the 3D effect */
                    border-radius: 20px 20px 20px 20px;
                }

                /* This container is needed to position the front and back side */
                .flip-card-inner {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    text-align: center;
                    transition: transform 0.8s;
                    transform-style: preserve-3d;
                    border-radius: 20px 20px 20px 20px;
                    box-shadow: 2px 1px 4px grey;
                }

                /* Do an horizontal flip when you move the mouse over the flip box container */
                .flip-card:hover .flip-card-inner {
                    transform: rotateY(180deg);
                }

                /* Position the front and back side */
                .flip-card-front,
                .flip-card-back {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    -webkit-backface-visibility: hidden;
                    /* Safari */
                    backface-visibility: hidden;
                    border-radius: 20px 20px 20px 20px;
                }

                /* Style the front side (fallback if image is missing) */
                .flip-card-front {
                    background-color: #76A3D1;
                    /* background-color: #0C5A90; */
                    color: #585858;
                    padding: 15px;
                    font-size: 16px;
                }

                .flip-card-front .icon {
                    margin-top: 20%;
                }

                /* Style the back side */
                .flip-card-back {
                    background-color: #092c8b;
                    color: rgb(255, 255, 255);
                    transform: rotateY(180deg);
                    padding: 13px;
                }


                @media screen and (max-width: 576px) {
                    .col-md-3.form_input.jabatan_col {
                        width: 80% !important;
                        padding-left: 10px;
                        height: 50px;
                    }
                }

                @media screen and (min-width: 576px) {
                    .col-md-3.form_input.jabatan_col {
                        width: 30% !important;
                        padding-left: 0px;
                        height: 50px;
                    }
                }
                

                .col-md-3.form_input.negeri_col {
                    width: 28% !important;
                    padding-left: 0px;
                    height: 50px;

                }

                .row.jabatan_row {
                    width: 100%;
                }

                div#jabatan_agensy_drop {
                    margin-bottom: 22px !important;
                }
            </style>
            <!-- ======= Module Sectionn ======= -->
            <section id="services1" class="services section-bg">
                <div class="container jump" data-aos="fade-up" id="services">

                    <div class="section-header">
                        <h2 style="font-size: 6vmin">MODUL NPIS</h2>
                        <p>Senarai Modul yang terkandung di dalam NPIS</p>
                    </div>

                    <div class="row gy-4" style="text-align:center;">
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">

                                        <i class="fa-solid fa-file-alt"></i>
                                    </div>
                                    <h4>PERMOHONAN PROJEK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffb8b1;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-alt"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">PERMOHONAN PROJEK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:50%;">Pendaftaran dan permohonan projek.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                    <br/>
                                    <h4>MODUL PEMANTAUAN & PENILAIAN PROJEK JPS</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffdac1;">
                                            <div class="icon">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">PEMANTAUAN & PENILAIAN PROJEK JPS</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pemantauan dan perancangan pelaksanaan projek JPS.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <h4>PEMANTAUAN & PENILAIAN PROJEK JABATAN BUKAN TEKNIK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#e2f0cb;">
                                            <div class="icon">
                                                <i class="fa-solid fa-area-chart"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">PEMANTAUAN & PENILAIAN PROJEK JABATAN BUKAN
                                                TEKNIK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:30%;">Pemantauan dan perancangan pelaksanaan projek
                                                Jabatan Bukan Teknik.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-invoice"></i>
                                    </div>
                                    <br/>
                                    <h4>KONTRAK</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#b5ead6;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-invoice"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">KONTRAK</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pendaftaran maklumat Projek, Kontrak dan Kontraktor.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    
                                    <h4>PERUNDING</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#EDF59C;">
                                            <div class="icon" style="margin-top:20%;">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">PERUNDING</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pendaftaran maklumat Kontrak Perunding dan
                                                <i>Deliverables</i> Perunding. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-search-dollar"></i>
                                    </div>
                                    <br/>
                                    <h4><i>VALUE MANAGEMENT (VM)</i></h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#55cbcd;">
                                            <div class="icon">
                                                <i class="fa-solid fa-search-dollar"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;"><i>VALUE MANAGEMENT</i> (VM)</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Pendaftaran maklumat pelaksanaan Makmal VM.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-pen"></i>
                                    </div>
                                    <br/>
                                    <h4><i>NOTICE OF CHANGE</i> (NOC)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#a3e1dc;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;"><i>NOTICE OF CHANGE </i>(NOC)</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:30%;">Pendaftaran maklumat mengikut jenis NOC; Notis
                                                Perubahan Projek atau Pindah Peruntukan Siling Tahunan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-file-signature"></i>
                                    </div>
                                    <br/>
                                    <h4>PERUNTUKAN DI LUAR <i>ROLLING PLAN</i> (RP)</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#edeae5;">
                                            <div class="icon">
                                                <i class="fa-solid fa-file-signature"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">PERMOHONAN PERUNTUKAN DI LUAR <i>ROLLING PLAN</i>
                                                (RP)
                                            </h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:20%;">Pendaftaran maklumat permohonan projek di luar RP
                                                serta merekod Ulasan Teknikal daripada Bahagian berkaitan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <h4>PENJANAAN LAPORAN</h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffdbcc;">
                                            <div class="icon">
                                                <i class="fa-solid fa-chart-pie"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;">PENJANAAN LAPORAN</h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:40%;">Penjanaan laporan untuk setiap modul.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                        <div class="col-xl col-md" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-5ths col-md-5ths col-xs-5ths" data-aos="fade-up" data-aos-delay="100">
                                {{-- <div class=" collapsible">
                                    <div class="icon">
                                        <i class="fa-solid fa-earth-asia"></i>
                                    </div>
                                    <h4><i>GEO-BOARD</i></h4>
                                </div>
                                <div class="content2">
                                    <p>Menambah paparan Jadual Pelaksanaan dalam bentuk gantt chart.​</p>
                                </div> --}}
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front" style="background-color:#ffb8b1;">
                                            <div class="icon">
                                                <i class="fa-solid fa-earth-asia"></i>
                                            </div>
                                            <br />
                                            <h4 style="font-size:18px;"><i>GEO-BOARD</i></h4>
                                        </div>
                                        <div class="flip-card-back">
                                            <p style="margin-top:10%;">Memaparkan maklumat projek berdasarkan Taburan
                                                Projek Mengikut Status, Kategori Projek dan Prestasi Perbelanjaan Projek
                                                Pembangunan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End post item -->
                    </div>

                </div>
            </section>
            <!-- End Recent Blog Posts Section -->


            {{-- <button type="button" class="collapsible">
                <div class="icon">
                    <i class="fa-solid fa-file-alt"></i>
                </div>Open Collapsible
            </button> --}}


            <br />

            <script>
                var coll = document.getElementsByClassName("collapsible");
                var i;


                for (i = 0; i < coll.length; i++) {
                    coll[i].addEventListener("mouseover", function() {
                        this.classList.toggle("active2");
                        var content = this.nextElementSibling;
                        //   content.style.display = "block";
                        content.style.maxHeight = content.scrollHeight + "px";
                        content.style.borderBottom = "1px solid rgb(87, 87, 87)";
                    });
                    coll[i].addEventListener("mouseout", function() {
                        this.classList.toggle("active2");
                        var content = this.nextElementSibling;
                        // content.style.display = "none";
                        content.style.maxHeight = null;
                        content.style.borderBottom = "none";
                    });
                }
            </script>


            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact jump">
                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-map"></i>
                                <h3>ALAMAT</h3>
                                <p id="alamat" style="text-align: center;">JABATAN PENGAIRAN DAN SALIRAN (JPS)
                                    MALAYSIA<br />JALAN SULTAN SALAHUDDIN<br />50626
                                    WILAYAH PERSEKUTUAN KUALA LUMPUR</p>

                                {{-- <h3>EMEL</h3>
                                <p>npis@water.com</p> --}}
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-6 col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-envelope"></i>
                                <h3>EMEL</h3>
                                <p>npis@water.gov.my</p>
                                <br />
                                <br />
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="row gy-4 mt-1">

                        <div class="col-lg-12 " id="iframe">

                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->
        </main><!-- End #main -->
        <!-- MODAL -->
        <style>
            .btn-login-pengguna {
                background-color: #979797;
                /* Green */
                border: none;
                border-radius: 20px;
                color: white;
                padding: 5px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                margin: 5px;
            }

            .aktif {
                background-color: #0A1F5D;
            }

            .btn-login-pengguna:hover {
                background-color: #021c6b;
                /* Green */
            }

            .container-btn-login {
                text-align: center;
                margin-bottom: 15px;
            }

            .close {
                border: none;
                display: inline-block;
                padding: 8px 16px;
                vertical-align: middle;
                overflow: hidden;
                text-decoration: none;
                color: inherit;
                background-color: inherit;
                text-align: center;
                cursor: pointer;
                white-space: nowrap
            }

            .close:hover {
                color: #000 !important;
                background-color: #ccc !important;
            }

            .input-login {
                display: block !important;
                width: 100%;
                padding: 0.375rem 0.75rem !important;
                font-size: 1rem !important;
                font-weight: 400 !important;
                line-height: 1.5 !important;
                color: #2e2e2e !important;
                background-color: #fff !important;
                background-clip: padding-box !important;
                border: 1px solid #5e5e5e !important;
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                appearance: none !important;
                border-radius: 0.375rem !important;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
                margin-bottom: 15px !important;
            }

            #togglePassword {
                cursor: pointer;
                display: inline-block;
            }

            .nav-link {
                color: rgb(70, 70, 70)
            }

            .nav-link:hover {
                color: rgb(32, 32, 32)
            }

            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }

            @media (max-width:575px) {

                #rc-imageselect, .g-recaptcha {
                    transform:scale(0.77);
                    -webkit-transform:scale(0.77);
                    transform-origin:0 0;
                    -webkit-transform-origin:0 0;
                }

                $('iframe').parent().css({ 'transform' : 'scale(0.77)', '-webkit-transform' : 'scale(0.77)' });
            }
        </style>

        <div class="modal fade" id="log_masuk_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered log_masuk_modal_dialog" role="document">
                <div class="modal-content log_masuk_modal_content_container">
                    <div class="log_masuk_modal_container">
                        <div class="log_masuk_modal_left_content">
                            <div class="pengguna_img_holder">
                                <!-- <div class="pengguna_img"> -->
                                <img src="{{ asset('assets/images/login.gif') }}" alt="penggunaJPS" />
                                <!-- </div> -->
                                <!-- <img
                        src="assets/images/pengguna JPS.png"
                        alt="pengguna JPS"
                      /> -->
                            </div>
                        </div>
                        <div class="log_masuk_modal_right_content">
                            <div class="log_masuk_modal_header">
                                <button type="button" data-dismiss="modal" class="ml-auto">
                                    <img src="assets/images/image 95.png" alt="image" />
                                </button>
                            </div>

                            <!-- PENGGUNA JPS -->
                            <div class="modal-body log_masuk_modal_body">
                                <div class="MAsuk_tab_container">
                                    <div class="MAsuk_tab_btn_container">

                                        <button class="jps nav-link active" id="nav-home-tab" data-toggle="tab"
                                            data-target="#nav-home" type="button" role="tab"
                                            aria-controls="nav-home" aria-selected="true" style="font-size: 3vmin;">
                                            <span>Pengguna JPS </span>
                                        </button>
                                        <button class="agensi nav-link" id="nav-profile-tab" data-toggle="tab"
                                            data-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false" style="font-size: 3vmin;">
                                            <span>pengguna agensi luar</span>
                                        </button>
                                    </div>
                                    <h4 style="font-size: 4vmin;"><b>LOG MASUK</b></h4>
                                    <div class="pengguna_jps_tab_content">
                                        <div class="info_content">
                                            {{-- <h5>
                          Log Masuk <span><i>Pengguna JPS</i> </span>
                        </h5> --}}
                                            <p class="info" style="font-size: 3vmin;">
                                                Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                                            </p>
                                        </div>
                                        {{-- action="{{url('login')}}" --}}
                                        <form class="" id="pengguna_jps_form" method="POST"
                                            action="{{ url('login') }}">
                                            @if ($errors->any())
                                                <label
                                                    class="text-danger">{{ implode('', $errors->all(':message')) }}</label>
                                            @endif
                                            {{-- @if ($errors->any())
                                {{ implode('', $errors->all(':message')) }}
                              @endif --}}
                                            @csrf
                                            <div class="form-group">
                                                <label for="email"><span style="font-size: 3vmin;">Kad
                                                        Pengenalan</span></label>
                                                <input type="hidden" name="type" value="jps" />
                                                <input type="text" class="form-control ic_no" id="ic_no"
                                                    aria-describedby="emailHelp" placeholder="Kad Pengenalan"
                                                    name="email" minlength="12" maxlength="12"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                    style="font-size: 2vmin;" required />
                                                <label class="ic_error text-danger h5 d-none"></label>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group position-relative">
                                                <label for="password"><span style="font-size: 3vmin;">Kata
                                                        Laluan</span></label>
                                                <input type="password" class="form-control password_eye_field"
                                                    id="password" placeholder="Kata Laluan" name="password"
                                                    style="font-size: 3vmin;" />

                                                <button type="button" class="eye_icon" onclick="showpassword()">
                                                    <img src="assets/images/Password eye.png" alt="" />
                                                </button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="g-recaptcha" data-sitekey={{ $site_key }}
                                                data-callback="onReturnCallback" name="g-recaptcha-response"></div>

                                            <div class="row mb-0">
                                                <div class="col-md-12">
                                                    <button id="login-jps" type="submit"
                                                        class="btn btn-primary masuk_submit" style="font-size: 3vmin;"
                                                        disabled>
                                                        {{ __('Log Masuk') }}
                                                    </button>
                                                </div>
                                                <div class="forget_password d-ext-end col-12">
                                                    <a class="btn btn-link" href="#"
                                                        data-target="#Login_interface_modal" data-toggle="modal"
                                                        data-backdrop="static" data-keyboard="false">
                                                        {{ __('Daftar Baharu') }}
                                                    </a>
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="#"
                                                            data-target="#Forget_modal" data-toggle="modal"
                                                            data-backdrop="static" data-keyboard="false">
                                                            {{ __('Lupa Kata Laluan?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                        <!-- PENGGUNA Kementerian/Agensi -->
                                        <form class="d-none" id="pengguna_agensi_form" method="POST"
                                            action="{{ url('login') }}">
                                            @if ($errors->any())
                                                <label
                                                    class="text-danger">{{ implode('', $errors->all(':message')) }}</label>
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                                <label for="email"><span style="font-size: 3vmin;">E-Mel</span></label>
                                                <input type="hidden" name="type" value="non_jps" />
                                                <input type="email" class="form-control E-mel" id="email"
                                                    aria-describedby="emailHelp" placeholder="Emel" name="email"
                                                    style="font-size: 3vmin;" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group position-relative">
                                                <label for="password"><span style="font-size: 3vmin;">Kata
                                                        Laluan</span></label>
                                                <input type="password" class="form-control password_eye_field"
                                                    id="passwordagensi" placeholder="Kata Laluan" name="password"
                                                    style="font-size: 3vmin;" />

                                                <button type="button" class="eye_icon" onclick="showpassword()">
                                                    <img src="assets/images/Password eye.png" alt="" />
                                                </button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="g-recaptcha" data-sitekey={{ $site_key }}
                                                data-callback="onReturnCallback" name="g-recaptcha-response"></div>

                                            <div class="row mb-0">
                                                <div class="col-md-12">
                                                    <button id="login-nonjps" type="submit"
                                                        class="btn btn-primary masuk_submit" disabled>
                                                        {{ __('Log Masuk') }}
                                                    </button>
                                                </div>
                                                <div class="forget_password d-ext-end col-12">
                                                    <a class="btn btn-link" href="#"
                                                        data-target="#Login_interface_modal" data-toggle="modal"
                                                        data-backdrop="static" data-keyboard="false">
                                                        {{ __('Daftar Baharu') }}
                                                    </a>
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="#"
                                                            data-target="#Forget_modal" data-toggle="modal"
                                                            data-backdrop="static" data-keyboard="false">
                                                            {{ __('Lupa Kata Laluan?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!--------------------------------------------------- forget_modal_container starts-------------------------- -->
        <section class="p-0">
            <div class="forget_modal">
                <!-- Modal -->
                <div class="modal fade" id="Forget_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered forget_modal_dialog" role="document">
                        <div class="modal-content forget_modal_content">
                            <div class="modal-body forget_modal_body">
                                <div class="login_interface_close">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="assets/images/image 95.png" alt="" />
                                    </button>
                                </div>
                                <div class="forget_modal_heading">
                                    <h4 style="font-size: 4vmin;">Lupa kata laluan ?</h4>

                                    <p>
                                        Sila masukkan No. Kad Pengenalan, E-Mel dan semak E-Mel anda untuk set semula kata
                                        laluan.
                                    </p>
                                </div>

                                <div class="forget_modal_form">
                                    <form method="POST" action="{{ route('password.email') }}" id="submitForgot">
                                        @csrf
                                        <div id="forget_user_error" style="display:none">
                                            <label class="text-danger"><span style="font-size: 3vmin;">No. Kad Pengenalan dengan Email tiada di dalam
                                                system</span></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="sr-only">No. Kad Pengenalan</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="no_ic" aria-describedby="emailHelp"
                                                placeholder="No. Kad Pengenalan" style="font-size: 3vmin;"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="sr-only">Alamat E-Mel</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputPassword1" placeholder="Alamat E-Mel" style="font-size: 3vmin;"/>
                                        </div>
                                        <label id="error" class="text-danger"></label>
                                        <div class="forget_submit text-center">
                                            <button type="button" id="subForgotButton" {{-- data-toggle="modal" --}}
                                                data-target="#sucess_modal" {{-- data-dismiss="modal" --}}>
                                                Hantar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--------------------------------------------------- sucess_modal_container starts-------------------------- -->
        <section class="p-0">
            <div class="sucess_modal_container">
                <div class="modal fade" id="sucess_modal_register" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered sucess_modal_dialog" role="document">
                        <div class="modal-content sucess_modal_content" style="padding: 15% 3%;border-radius: 10px;">
                            <div class="modal-body sucess_modal_body">
                                <h3 style="padding-left: 77px;">
                                    Akaun telah didaftar <br />
                                </h3>
                                <div class="text-center">
                                    <button data-dismiss="modal" id="tutup"
                                        style="background-color: #1400ff;color: white;border-radius: 20px;padding-top: 2px;}">Tutup</button>
                                </div>
                            </div>
                            <div class="sucess_msg">
                                <img src="assets/images/coolicon.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---------------------------------------------------- login interface Modal starts-------------------------- -->
        <section id="register_form" class="p-0">
            <div class="login_interface_section">
                <div class="modal fade" id="Login_interface_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered login_interface_modal_dialog" role="document">
                        <div class="modal-content login_interface_modal_content">
                            <div class="modal-body login_interface_modal_body">
                                <div class="login_interface_close">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="assets/images/image 95.png" alt="" />
                                    </button>
                                </div>
                                <div class="login_interface_modal_body_content">
                                    <h4 class="login_interface_modal_header" style="font-size:4vmin;">
                                        DAFTAR AKAUN BAHARU
                                    </h4>
                                    <div class="interface_tab_container">
                                        <div class="d-flex row">
                                            <div class="label col-md-4 col-xs-12">
                                                <label for="Kotegori Pengguna">Kategori
                                                        Pengguna​</label>
                                            </div>
                                            <div class="radio_Container d-flex flex-column col-md-8 col-xs-12">
                                                <label class="r_container">Pengguna JPS
                                                    <input type="radio" name="radio" id="Pengguna_JPS" />
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label for="Agensi_Luar" class="r_container">Pengguna Agensi Luar
                                                    <input type="radio" name="radio" id="Agensi_Luar" checked />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="interface_tab_content_container">
                                        <div class="interface_tab_content">
                                            <form class="login_interface_modal_form" action="" method="post"
                                                id="register_agensi_user_form" name="myform">
                                                <input type="hidden" name="kategori" value="" id="kategori">
                                                <div class="input_container row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label for="Nama_Penuh"
                                                            class="col-form-label form_label required">Nama Penuh</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <input type="text" class="form-control" id="name"
                                                            name="nama" />
                                                        <span class="error" id="error_nama"></span>
                                                    </div>
                                                </div>

                                                <div class="input_container row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label for="Kad_Pengenalan"
                                                            class="col-form-label form_label required">No. Kad
                                                            Pengenalan</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <input type="text" class="form-control" id="Kad_Pengenalan"
                                                            name="no_kod_penganalan" maxlength="12" />
                                                        <span class="error" id="error_no_kod_penganalan"></span>
                                                    </div>
                                                </div>
                                                <div class="input_container row">
                                                    <div class="col-md-4 col-xs-12">
                                                      <label for="Email_Rasmi"
                                                        class="col-form-label form_label required">Email Rasmi</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <input type="text" class="form-control" id="Email_Rasmi"
                                                            name="email" />
                                                        <span class="error" id="error_email"></span>
                                                    </div>
                                                </div>
                                                <div class="input_container  row">
                                                    <div class="col-md-4 col-xs-12">
                                                      <label for="No_Telefon" class="col-form-label form_label required">No.
                                                          Telefon</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <input type="text" class="form-control" id="No_Telefon"
                                                            name="no_telefon" />
                                                        <span class="error" id="error_telefon"></span>
                                                    </div>
                                                </div>
                                                <div class="input_container row">
                                                    <div class="col-md-4 col-xs-12">
                                                      <label for="No_Telefon"
                                                          class="col-form-label form_label required">Jawatan</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <select type="text" class="form-control" id="jawatan"
                                                            name="jawatan">
                                                            <option value=""> --Pilih--</option>
                                                        </select>
                                                        <span class="error" id="error_jawatan"></span>
                                                    </div>
                                                </div>
                                                <div class="input_container row">
                                                    <div class="col-md-4 col-xs-12"><label for="Gred"
                                                        class="col-form-label form_label required">Gred</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <select type="text" class="form-control" name="gred"
                                                            id="gred">
                                                            <option value=""> --Pilih--</option>
                                                        </select>
                                                        <span class="error" id="error_gred"></span>
                                                    </div>
                                                </div>
                                                <div class="input_container row">
                                                    <div class="col-md-4 col-xs-12">
                                                      <label for="Kementerian"
                                                          class="col-form-label form_label required">Kementerian</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <select class="form-select" name="kementerian" id="kementerian">
                                                            <option value=""> --Pilih--</option>
                                                        </select>
                                                        <span class="error" id="error_kementerian"></span>
                                                        <input type="hidden" id="kementerian_jps_id" value=""
                                                            name="kementerian_jps_id">
                                                    </div>
                                                </div>
                                                
                                                <div class="input_container" id="jabatan_agensy_drop">
                                                    <div class="row jabatan_row">
                                                        <div class="jabatan_input col-md-3 col-xs-12">
                                                            <input type="radio" id="jabatan_agensy_drop_check"
                                                                name="jabatan_agensy_drop_check" value="1" />
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12 form_input jabatan_col">
                                                            <select type="text" class="form-control" name="jabatan"
                                                                id="Jabatan" style="height:100%;padding:10px;">
                                                                <option value=""> --Pilih--</option>
                                                            </select>
                                                            <span class="error" id="error_jabatan"></span>
                                                        </div>
                                                        <div class="bahagian_input col-md-2 col-xs-12">
                                                            <label>Bahagian</label>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12 form_input jabatan_col">
                                                            <select type="text" class="form-control"
                                                                name="jabatan_bahagian" id="jabatan_bahagian"
                                                                style="height:100%;padding:10px;">
                                                                <option value=""> --Pilih--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input_container row" id="jabatan_jps_drop">
                                                  <div class="col-md-4 col-xs-12"><label for="Jabatan"
                                                        class="col-form-label form_label">Jabatan</label>
                                                  </div>
                                                  <div class="col-md-8 col-xs-12 form_input">
                                                      <input type="text" class="form-control" id="jabatan_jps"
                                                          name="jabatan_jps" value="">
                                                      <input type="hidden" id="jabatan_jps_id" value=""
                                                          name="jabatan_jps_id">
                                                  </div>
                                                </div>

                                                <div class="input_container row" id="jabatan_agensy_drop">
                                                    <div class="col-md-4 col-xs-12">
                                                      <input type="radio" id="bahagian_drop_check"
                                                          name="bahagian_drop_check" value="1" />
                                                      <label for="Bahagian" class="col-form-label form_label"
                                                      style="padding-top:8px;width:21%;">Bahagian</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <select type="text" class="form-control" name="bahagian"
                                                            id="bahagian">
                                                            <option value=""> --Pilih--</option>
                                                        </select>
                                                        <span class="error" id="error_bahagian"></span>
                                                    </div>
                                                </div>

                                                <div class="input_container" id="pejabat_agensy_drop">
                                                    <input type="radio" id="pejabat_drop_check"
                                                        name="pejabat_drop_check" value="1" />
                                                    <div class="col-md-4 col-xs-12"><label for="Pejabat" class="col-form-label form_label"
                                                        style="padding-top:8px;width:21%;">Pejabat Projek</label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <select type="text" class="form-control" name="pejabat"
                                                            id="pejabat">
                                                            <option value=""> --Pilih--</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="input_container" id="jps_negeri">
                                                    <div class="jabatan_row">
                                                        <div class="col-md-3 col-xs-12" style="width:24%;margin-top:10px;">
                                                            <input type="radio" id="negeri_drop_check"
                                                                name="negeri_drop_check" value="1" />
                                                            <label style="width:72px;">JPS Negeri</label>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12 form_input negeri_col">
                                                            <select type="text" class="form-control" name="negeri"
                                                                id="negeri" style="height:100%;padding:10px;">
                                                                <option value=""> --Pilih--</option>
                                                            </select>
                                                            <!-- <span class="error" id="error_jabatan"></span> -->
                                                        </div>
                                                        <div class="col-md-3 col-xs-12"
                                                            style="padding:0px;width:110px;margin-top:10px">
                                                            <input type="radio" id="daerah_drop_check"
                                                                name="daerah_drop_check" value="1" />
                                                            <label style="width:80px;">JPS Daerah</label>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12 form_input negeri_col">
                                                            <select type="text" class="form-control" name="daerah"
                                                                id="daerah" style="height:100%;padding:10px;">
                                                                <option value=""> --Pilih--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input_container position-relative row" id='nonjps_doc'>
                                                  <div class="col-md-4 col-xs-12 file_label d-flex">
                                                    <label for="Dokumen_Sokongan"
                                                          class="col-form-label form_label">Dokumen Sokongan</label>
                                                    <div class="pop_btn">
                                                        <button type="button" class="btn" onclick="myFunction()">
                                                            <img src="assets/images/i-icon.png" alt="icon">
                                                        </button>
                                                    </div>
                                                    <div class="pop_content position-absolute d-none"
                                                        id="error_dokumen_name">
                                                        <p>Sila muat naik <span> Surat Jabatan</span></p>

                                                    </div>
                                                  </div>

                                                    <div class="form col-md-8 col-xs-12">
                                                        <div class="yes">
                                                            <span class="btn_upload">
                                                                <input type="file" name="dockument" id="dockument"
                                                                    class="input-img">
                                                                Muat naik lampiran
                                                            </span>
                                                            <p class="file_size d-none" id="file_size">
                                                                (Salz fail tidak melebihi 4 mb)
                                                            </p>
                                                            <p class="file_type d-none" id="file_type">
                                                                (Jenis fail tidak sah)
                                                            </p>
                                                            <div class="selected_file d-none" id="selected_file">
                                                                <div class="pdf_img">
                                                                    <img src="assets/images/pdf.png" alt="pdf">
                                                                </div>
                                                                <div class="file_details">
                                                                    <p style="font-size:13px;padding-left: 12px;margin-bottom: 0px !IMPORTANT;"
                                                                        id="document_name"></p>
                                                                    <button type="button" id="remove_pdf">Remove
                                                                        file</button>
                                                                </div>
                                                                <p class="file_sizes" id="document_size"></p>
                                                            </div>
                                                        </div>
                                                        <span id="error_dokumen_name_new" class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="input_container row">
                                                  <div class="col-md-4 col-xs-12">
                                                    <label for="Kod_Pengesahan" class="col-form-label form_label">
                                                        Kod Pengesahan</label>
                                                  </div>
                                                  <div class="col-md-8 col-xs-12 form_input">
                                                      <div class="g-recaptcha" style="max-width: 100%;" data-sitekey={{ $site_key }}
                                                          data-callback="onReturnCallbackRegister" data-action="submit">
                                                          Submit
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="input_container row">
                                                  <div class="col-md-4 col-xs-12">
                                                    <label for="Kod_Pengesahan" class="col-form-label form_label">
                                                        Perakuan Pendaftaran</label>
                                                  </div>
                                                    <div class="col-md-8 col-xs-12 form_input">
                                                        <div class="form-group form-check form_checker">
                                                            <input type="checkbox" id="exampleCheck1"
                                                                onclick="myChecboxFunction()">
                                                            <label class="form_check_label" for="exampleCheck1"><b>Dengan
                                                                    ini saya MENGAKU bahawa semua maklumat
                                                                    yang diisikan dalam permohonan ini adalah SAHIH
                                                                    dan BENAR.</b></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_btn_container mt-4">
                                                    <button type="button" id="close_button">KEMBALI</button><button
                                                        type="button" id="submit_registration">DAFTAR</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-0">
            <div class="sucess_modal_container">
                <div class="modal fade" id="login_sucess_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered login_sucess_modal_dialog" role="document">
                        <div class="modal-content login_sucess_modal_content">
                            <div class="modal-body login_sucess_modal_body">
                                <h3>Akaun telah didaftar</h3>
                                <div class="text-center">
                                    <button data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                            <div class="sucess_msg">
                                <img src="assets/images/coolicon.png" alt="coolicon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Email sent success Modal --}}

        <section class="p-0">
            <div class="sucess_modal_container">
                <div class="modal fade" id="sucess_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered sucess_modal_dialog" role="document">
                        <div class="modal-content sucess_modal_content">
                            <div class="modal-body sucess_modal_body">
                                <h3>
                                    Kata laluan berjaya dihantar ke <br />
                                    email anda
                                </h3>
                                <div class="text-center">
                                    <button id="mail_successBtn" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                            <div class="sucess_msg">
                                <img class="img-responsive" height="95px" src="assets/images/coolicon.png"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .hitcounter-text {
                border-style: solid;
                border-color: #fff;
                border-radius: 10px;
                background: #fff;
                color: #000;
                padding: 3px;
            }

            @media screen and (max-width: 576px) {
                .center_col {
                    position: relative;
                    display: inline-block;
                    text-align: center;
                }
            }
        </style>
        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">

            <div class="footer-content position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-xs-12 row footer-links center_col">
                            <div class="col-lg-8 col-md-8 col-xs-12">
                                <p>Bilangan Pelawat : </p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <span id="NOV" class="hitcounter-text">355</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12 row footer-links center_col">
                            <div class="col-lg-8 col-md-8 col-xs-12">
                                <p>Bilangan Pelawat Hari Ini : </p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <span id="NOVT" class="hitcounter-text">12</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12 row footer-links center_col">
                            <div class="col-lg-8 col-md-8 col-xs-12">
                                <p>Bilangan Pelawat Bulan Ini : </p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <span id="NOVM" class="hitcounter-text">56</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12 row footer-links center_col">
                            <div class="col-lg-9 col-md-9 col-xs-12">
                                <p>Bilangan Pelawat Tahun Ini : </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <span id="NOVY" class="hitcounter-text">56</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <center>
                            <div class="col-lg-2 col-md-3 footer-links">
                                <h4>MyProjek, ICU JPM</h4>
                                <p><a href="https://myprojek.icu.gov.my/" target="_blank"><img id="footer_logo"
                                            src="main//images/myprojek.png" height="50px"></a></p>
                            </div><!-- End footer links column-->
                        </center>
                    </div>
                </div>
            </div>

            <div class="footer-legal text-center position-relative">
                <div class="container">
                    <div class="disclaimer" style="text-align:center">
                        <strong><i>Disclaimer</i> / Penafian</strong><br />
                        Pihak JPS tidak akan bertanggungjawab terhadap sebarang masalah, kerosakan atau kehilangan data yang
                        berlaku disebabkan penggunaan sistem ini.
                    </div>
                    <div class="copyright" id="copyright">

                        &copy; Hak Cipta Terpelihara 2023 <strong><span>© Jabatan Pengairan dan Saliran
                                (JPS) Malaysia</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                        Paparan terbaik menggunakan Mozilla Firefox, Chrome dan Microsoft Edge ke atas dengan Resolusi 1920
                        x 1080 <br />

                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
                <script>
                    $(document).ready(function() {
                        $('#log_masuk_modal').modal('show');
                    });
                </script>
            @endif

            <script>
                $(document).ready(function() {
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    const session = urlParams.get('session')
                    console.log(session);
                    if (session == 'expired') {
                        console.log('yes')
                        $('#log_masuk_modal').modal('show');
                    }
                    //  
                });
            </script>


        </footer>
        <!-- End Footer -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="main/assets/vendor/aos/aos.js"></script>
        <script src="main/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="main/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="main/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="main/assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="main/assets/vendor/php-email-form/validate.js"></script>
        <script src="main/assets/js/login-register.js" type="text/javascript"></script>
        <script src="main/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Template Main JS File -->
        <script src="main/assets/js/main.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


        <script>
          let openMenu = document.querySelector('.icon-bar');
          let closeMenu = document.querySelector('.close-nav');
          let navMenu = document.querySelector('.navbar');
          let bodyEl = document.querySelector('body');
          openMenu.addEventListener('click',function(){
              navMenu.classList.add('nav-scale');
              bodyEl.classList.add('overflow-none');
          });
          
          closeMenu.addEventListener('click',function(){
              navMenu.classList.remove('nav-scale');
              bodyEl.classList.remove('overflow-none');
          });
          
            function showpassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
                var x = document.getElementById("passwordagensi");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            // $("#log_masuk_modal").modal("show");
            // // $("#Forget_modal").modal("show");
            // // $("#sucess_modal").modal("show");
            // $("#Login_interface_modal").modal("show");
            $("#nav-home-tab").click(function() {
                $("#pengguna_jps_form").removeClass('d-none');
                $("#pengguna_agensi_form").addClass('d-none');
            })
            $("#nav-profile-tab").click(function() {
                $("#pengguna_jps_form").addClass('d-none');
                $("#pengguna_agensi_form").removeClass('d-none');

            })

            function onSubmit(token) {
                document.getElementById("penguna_jps_form").submit();
            }
            $(document).ready(function() {

                // axios({
                // method: 'get',
                // url: api_url+"sanctum/csrf-cookie",
                // })
                // .then(function (response) { 
                //   console.log('sanctum')
                //   console.log(response)
                // })
                $('[data-toggle="popover"]').popover();
                window.localStorage.setItem('token', "{{ env('TOKEN') }}");

                document.getElementById("jps_negeri").classList.add('d-none');
                document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
                document.getElementById("pejabat_agensy_drop").classList.add('d-none');
                document.getElementById("jabatan_jps_drop").classList.add('d-none');


                document.getElementById('bahagian').disabled = true;
                document.getElementById('pejabat').disabled = true;
                document.getElementById('negeri').disabled = true;
                document.getElementById('daerah').disabled = true;
                document.getElementById('Jabatan').disabled = true;
                document.getElementById('jabatan_jps').disabled = true;

                var kem_url = api_url + "api/lookup/kementerian/list_kementerian";
                loadKementerian(kem_url, "non-jps");
                document.getElementById("kementerian").disabled = false;

            });
        </script>

        <script>
            $('#Pengguna_JPS').click(function() {
                var kem_url = api_url + "api/lookup/kementerian-list-by-name";
                loadKementerian(kem_url, "jps");
                document.getElementById("kementerian").disabled = true;

                document.getElementById("bahagian").selectedIndex = 0;
                document.getElementById("pejabat").selectedIndex = 0;
                document.getElementById("negeri").selectedIndex = 0;
                document.getElementById("daerah").selectedIndex = 0;
                document.getElementById("Jabatan").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                $('#nonjps_doc').hide();
                document.getElementById("kategori").value = 1;
                document.getElementById("jps_negeri").classList.remove('d-none');
                document.getElementById("jabatan_agensy_drop").classList.add('d-none');
                document.getElementById("pejabat_agensy_drop").classList.remove('d-none');
                document.getElementById("jabatan_jps_drop").classList.remove('d-none');

            });

            $('#Agensi_Luar').click(function() {


                var kem_url = api_url + "api/lookup/kementerian/list_kementerian";
                loadKementerian(kem_url, "non-jps");
                document.getElementById("kementerian").disabled = false;

                document.getElementById("bahagian").selectedIndex = 0;
                document.getElementById("pejabat").selectedIndex = 0;
                document.getElementById("negeri").selectedIndex = 0;
                document.getElementById("daerah").selectedIndex = 0;
                document.getElementById("Jabatan").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                $('#nonjps_doc').show();
                document.getElementById("kategori").value = 2;
                document.getElementById("jps_negeri").classList.add('d-none');
                document.getElementById("jabatan_agensy_drop").classList.remove('d-none');
                document.getElementById("pejabat_agensy_drop").classList.add('d-none');
                document.getElementById("jabatan_jps_drop").classList.add('d-none');

            });

            $('#jabatan_agensy_drop_check').click(function() {
                var daerahdropDown = document.getElementById("daerah");
                $("#daerah").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                daerahdropDown.appendChild(el);

                document.getElementById("bahagian").selectedIndex = 0;
                document.getElementById("pejabat").selectedIndex = 0;
                document.getElementById("negeri").selectedIndex = 0;
                document.getElementById("daerah").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                document.getElementById('bahagian').disabled = true;
                document.getElementById('pejabat').disabled = true;
                document.getElementById('negeri').disabled = true;
                document.getElementById('daerah').disabled = true;
                document.getElementById('Jabatan').disabled = false;

                document.getElementById("jabatan_agensy_drop_check").checked = true;
                document.getElementById("bahagian_drop_check").checked = false;
                document.getElementById("negeri_drop_check").checked = false;
                document.getElementById("daerah_drop_check").checked = false;
                document.getElementById("pejabat_drop_check").checked = false;

            });

            $('#bahagian_drop_check').click(function() {
                var daerahdropDown = document.getElementById("daerah");
                $("#daerah").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                daerahdropDown.appendChild(el);
                document.getElementById("pejabat").selectedIndex = 0;
                document.getElementById("negeri").selectedIndex = 0;
                document.getElementById("daerah").selectedIndex = 0;
                document.getElementById("Jabatan").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                document.getElementById('bahagian').disabled = false;
                document.getElementById('pejabat').disabled = true;
                document.getElementById('negeri').disabled = true;
                document.getElementById('daerah').disabled = true;
                document.getElementById('Jabatan').disabled = true;

                document.getElementById("jabatan_agensy_drop_check").checked = false;
                document.getElementById("bahagian_drop_check").checked = true;
                document.getElementById("negeri_drop_check").checked = false;
                document.getElementById("daerah_drop_check").checked = false;
                document.getElementById("pejabat_drop_check").checked = false;

            });

            $('#negeri_drop_check').click(function() {
                var daerahdropDown = document.getElementById("daerah");
                $("#daerah").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                daerahdropDown.appendChild(el);
                document.getElementById("bahagian").selectedIndex = 0;
                document.getElementById("pejabat").selectedIndex = 0;
                document.getElementById("daerah").selectedIndex = 0;
                document.getElementById("Jabatan").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                document.getElementById('bahagian').disabled = true;
                document.getElementById('pejabat').disabled = true;
                document.getElementById('negeri').disabled = false;
                document.getElementById('daerah').disabled = true;
                document.getElementById('Jabatan').disabled = true;

                document.getElementById("jabatan_agensy_drop_check").checked = false;
                document.getElementById("bahagian_drop_check").checked = false;
                document.getElementById("negeri_drop_check").checked = true;
                // document.getElementById("daerah_drop_check").checked = true;
                document.getElementById("pejabat_drop_check").checked = false;

            });

            $('#daerah_drop_check').click(function() {
                var daerahdropDown = document.getElementById("daerah");
                $("#daerah").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                daerahdropDown.appendChild(el);
                document.getElementById("bahagian").selectedIndex = 0;
                document.getElementById("pejabat").selectedIndex = 0;
                document.getElementById("negeri").selectedIndex = 0;
                document.getElementById("Jabatan").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                document.getElementById('bahagian').disabled = true;
                document.getElementById('pejabat').disabled = true;
                document.getElementById('negeri').disabled = false;
                document.getElementById('daerah').disabled = false;
                document.getElementById('Jabatan').disabled = true;

                document.getElementById("jabatan_agensy_drop_check").checked = false;
                document.getElementById("bahagian_drop_check").checked = false;
                document.getElementById("negeri_drop_check").checked = true;
                document.getElementById("daerah_drop_check").checked = true;
                document.getElementById("pejabat_drop_check").checked = false;

            });

            $('#pejabat_agensy_drop').click(function() {
                var daerahdropDown = document.getElementById("daerah");
                $("#daerah").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                daerahdropDown.appendChild(el);

                document.getElementById("bahagian").selectedIndex = 0;
                document.getElementById("negeri").selectedIndex = 0;
                document.getElementById("daerah").selectedIndex = 0;
                document.getElementById("Jabatan").selectedIndex = 0;
                document.getElementById("jabatan_bahagian").selectedIndex = 0;

                document.getElementById('bahagian').disabled = true;
                document.getElementById('pejabat').disabled = false;
                document.getElementById('negeri').disabled = true;
                document.getElementById('daerah').disabled = true;
                document.getElementById('Jabatan').disabled = true;

                document.getElementById("jabatan_agensy_drop_check").checked = false;
                document.getElementById("bahagian_drop_check").checked = false;
                document.getElementById("negeri_drop_check").checked = false;
                document.getElementById("daerah_drop_check").checked = false;
                document.getElementById("pejabat_drop_check").checked = true;

            });


            function myChecboxFunction() {
                var checkBox = document.getElementById("exampleCheck1");
                if (checkBox.checked == true) {
                    document.querySelector('#submit_registration').disabled = false;
                } else {
                    document.querySelector('#submit_registration').disabled = true;
                }
            }

            const api_url = "{{ env('API_URL') }}";
            console.log(api_url);
            const app_url = document.getElementById("app_url").value;
            console.log(app_url);
            const api_token = "Bearer " + window.localStorage.getItem('token');;
            console.log(api_token);
            const {
                host,
                hostname,
                href,
                origin,
                pathname,
                port,
                protocol,
                search
            } = window.location

            $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                }
            });

            var pejabatdropDown = document.getElementById("pejabat");
            $.ajax({
                type: "GET",
                url: api_url + "api/lookup/pejabat-projek/list",
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    if (result) {
                        $.each(result.data, function(key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.pajabat_projek;
                            el.value = opt;
                            pejabatdropDown.appendChild(el);
                        })
                    } else {
                        $.Notification.error(result.Message);
                    }
                }
            });


            function loadKementerian(kem_url, type) {

                var dropDown = document.getElementById("kementerian");
                var bahagiandropDown = document.getElementById("bahagian");


                $("#kementerian").empty();
                $("#bahagian").empty();

                if (type == "non-jps") {
                    var el = document.createElement("option");
                    console.log(el)
                    el.textContent = '--Pilih--';
                    el.value = '';
                    dropDown.appendChild(el);

                    var el = document.createElement("option");
                    console.log(el)
                    el.textContent = '--Pilih--';
                    el.value = '';
                    bahagiandropDown.appendChild(el);
                } else {
                    var el = document.createElement("option");
                    console.log(el)
                    el.textContent = '--Pilih--';
                    el.value = '';
                    bahagiandropDown.appendChild(el);
                }
                $.ajax({
                    type: "GET",
                    url: kem_url,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result.data)
                        if (result) {
                            if (type == "non-jps") {
                                $.each(result.data, function(key, item) {
                                    var opt = item.id;
                                    var el = document.createElement("option");
                                    el.textContent = item.nama_kementerian;
                                    el.value = opt;
                                    dropDown.appendChild(el);
                                });
                            } else {
                                if (result.data.kementerian) {
                                    $.each(result.data.kementerian, function(key, item) {
                                        var opt = item.id;
                                        var el = document.createElement("option");
                                        el.textContent = item.nama_kementerian;
                                        el.value = opt;
                                        dropDown.appendChild(el);
                                    });
                                    document.getElementById("kementerian_jps_id").value = result.data.kementerian[0]
                                        .id;
                                }
                                if (result.data.jabatan) {
                                    document.getElementById("jabatan_jps").value = result.data.jabatan[0]
                                        .nama_jabatan;
                                    document.getElementById("jabatan_jps_id").value = result.data.jabatan[0].id;
                                }
                                if (result.data.bahagian) {
                                    $.each(result.data.bahagian, function(key, item) {
                                        var opt = item.id;
                                        var el = document.createElement("option");
                                        el.textContent = item.nama_bahagian;
                                        el.value = opt;
                                        bahagiandropDown.appendChild(el);
                                    });

                                }
                            }
                        } else {
                            $.Notification.error(result.Message);
                        }
                    }
                });
            }

            $("#kementerian").on('change', function() {

                kementerian = document.getElementById("kementerian").value;
                var JabatandropDown = document.getElementById("Jabatan");
                $("#Jabatan").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                JabatandropDown.appendChild(el);

                $.ajax({
                    type: "GET",
                    url: api_url + "api/lookup/jabatan/list?id=" + kementerian,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        if (result) {
                            $.each(result.data, function(key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_jabatan;
                                el.value = opt;
                                JabatandropDown.appendChild(el);
                            })
                        } else {
                            $.Notification.error(result.Message);
                        }
                    }
                });

                var bahagiandropDown = document.getElementById("bahagian");
                $("#bahagian").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                bahagiandropDown.appendChild(el);

                $.ajax({
                    type: "GET",
                    url: api_url + "api/lookup/bahagian-list?id=" + kementerian,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        if (result) {
                            $.each(result.data, function(key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_bahagian;
                                el.value = opt;
                                bahagiandropDown.appendChild(el);
                            })
                        } else {
                            $.Notification.error(result.Message);
                        }
                    }
                });
            });

            $("#Jabatan").on('change', function() {

                Jabatan = document.getElementById("Jabatan").value;
                var jabatan_bahagiandropDown = document.getElementById("jabatan_bahagian");
                $("#jabatan_bahagian").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                jabatan_bahagiandropDown.appendChild(el);

                $.ajax({
                    type: "GET",
                    url: api_url + "api/lookup/bahagian/list?id=" + Jabatan,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        if (result) {
                            $.each(result.data, function(key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_bahagian;
                                el.value = opt;
                                jabatan_bahagiandropDown.appendChild(el);
                            })
                        } else {
                            $.Notification.error(result.Message);
                        }
                    }
                });
            });

            var negeridropDown = document.getElementById("negeri");
            $.ajax({
                type: "GET",
                url: api_url + "api/lookup/negeri/list",
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    if (result) {
                        $.each(result.data, function(key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_negeri;
                            el.value = opt;
                            negeridropDown.appendChild(el);
                        })
                    } else {
                        $.Notification.error(result.Message);
                    }
                }
            });

            $("#negeri").on('change', function() {

                negeri = document.getElementById("negeri").value;
                var daerahdropDown = document.getElementById("daerah");
                $("#daerah").empty();
                var el = document.createElement("option");
                console.log(el)
                el.textContent = '--Pilih--';
                el.value = '';
                daerahdropDown.appendChild(el);

                $.ajax({
                    type: "GET",
                    url: api_url + "api/lookup/daerah/list?id=" + negeri,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        if (result) {
                            $.each(result.data, function(key, item) {
                                var opt = item.id;
                                var el = document.createElement("option");
                                el.textContent = item.nama_daerah;
                                el.value = opt;
                                daerahdropDown.appendChild(el);
                            })
                        } else {
                            $.Notification.error(result.Message);
                        }
                    }
                });
            });

            var jawatandropDown = document.getElementById("jawatan");
            $.ajax({
                type: "GET",
                url: api_url + "api/lookup/jawatan/list",
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    if (result) {
                        $.each(result.data, function(key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_jawatan;
                            el.value = opt;
                            jawatandropDown.appendChild(el);
                        })
                    } else {
                        $.Notification.error(result.Message);
                    }
                }
            });

            var greddropDown = document.getElementById("gred");
            $.ajax({
                type: "GET",
                url: api_url + "api/lookup/gredjawatan/list",
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    if (result) {
                        $.each(result.data, function(key, item) {
                            var opt = item.id;
                            var el = document.createElement("option");
                            el.textContent = item.nama_gred;
                            el.value = opt;
                            greddropDown.appendChild(el);
                        })
                    } else {
                        $.Notification.error(result.Message);
                    }
                }
            });
        </script>
        <script>
            $("#submit_registration").click(function() { //alert('heeeee');

                if (!document.myform.nama.value) {
                    document.getElementById("error_nama").innerHTML = "Medan nama diperlukan";
                    document.getElementById("name").focus();
                    return false;
                } else {
                    document.getElementById("error_nama").innerHTML = "";
                }

                if (!document.myform.no_kod_penganalan.value) {
                    document.getElementById("error_no_kod_penganalan").innerHTML = "Medan no kad penganalan diperlukan";
                    document.getElementById("Kad_Pengenalan").focus();
                    return false;
                } else if (isNaN(document.myform.no_kod_penganalan.value)) {
                    document.getElementById("error_no_kod_penganalan").innerHTML = "Sila tambah nombor sahaja";
                    document.getElementById("Kad_Pengenalan").focus();
                    return false;
                } else if (document.myform.no_kod_penganalan.value.length < 12) {
                    document.getElementById("error_no_kod_penganalan").innerHTML = "Maksimum 12 digit diperlukan";
                    document.getElementById("Kad_Pengenalan").focus();
                    return false;
                } else {
                    document.getElementById("error_no_kod_penganalan").innerHTML = "";
                }

                if (!document.myform.email.value) {
                    document.getElementById("error_email").innerHTML = "Medan emel rasmi diperlukan";
                    document.getElementById("Email_Rasmi").focus();
                    return false;
                } else {
                    document.getElementById("error_email").innerHTML = "";
                }

                if (IsEmail(document.myform.email.value) == false) {
                    document.getElementById("error_email").innerHTML = "Format e-mel tidak sah";
                    document.getElementById("Email_Rasmi").focus();
                    return false;
                } else {
                    document.getElementById("error_email").innerHTML = "";
                }
                let email = document.myform.email.value;
                let getDomain = email.substr(email.length - 6);
                console.log(getDomain)

                if (!document.myform.no_telefon.value) {
                    document.getElementById("error_telefon").innerHTML = "Medan no telefon diperlukan";
                    document.getElementById("No_Telefon").focus();
                    return false;
                } else if (isNaN(document.myform.no_telefon.value)) {
                    document.getElementById("error_telefon").innerHTML = "Sila tambah nombor sahaja";
                    document.getElementById("No_Telefon").focus();
                    return false;
                } else {
                    document.getElementById("error_telefon").innerHTML = "";
                }

                if (!document.myform.jawatan.value) {
                    document.getElementById("error_jawatan").innerHTML = "Sila pilih jawatan";
                    document.getElementById("jawatan").focus();
                    return false;
                } else {
                    document.getElementById("error_jawatan").innerHTML = "";
                }

                if (!document.myform.gred.value) {
                    document.getElementById("error_gred").innerHTML = "Sila pilih gred";
                    document.getElementById("gred").focus();
                    return false;
                } else {
                    document.getElementById("error_gred").innerHTML = "";
                }

                //     if(!document.myform.jabatan.value)  { 
                // 			document.getElementById("error_jabatan").innerHTML="Sila pilih jabatan"; 
                // 			document.getElementById("jabatan").focus();
                // 			return false; 
                // 		}else{document.getElementById("error_jabatan").innerHTML="";}
                //     if(!document.myform.bahagian.value)  { 
                // 			document.getElementById("error_bahagian").innerHTML="Sila pilih bahagian"; 
                // 			document.getElementById("bahagian").focus();
                // 			return false; 
                // 		}else{document.getElementById("error_bahagian").innerHTML="";}
                //     if(!document.myform.negeri.value)  { 
                // 			document.getElementById("error_negeri").innerHTML="Sila pilih negeri"; 
                // 			document.getElementById("negeri").focus();
                // 			return false; 
                // 		}else{document.getElementById("error_negeri").innerHTML="";}

                //       if(!document.myform.daerah.value)  { 
                // 			document.getElementById("error_daerah").innerHTML="Sila pilih daerah"; 
                // 			document.getElementById("daerah").focus();
                // 			return false; 
                // 		}else{document.getElementById("error_daerah").innerHTML="";}
                // console.log(document.myform.dockument.files);
                if (document.myform.kategori.value == 1) {

                    if (!document.myform.bahagian.value && !document.myform.pejabat.value && !document.myform.negeri
                        .value) {
                        document.getElementById("error_bahagian").innerHTML = "Sila Pilih Bahagian/Pejabat/Negeri";
                        document.getElementById("bahagian").focus();
                        return false;
                    } else {
                        document.getElementById("error_bahagian").innerHTML = "";
                    }
                    var kementerian = document.getElementById("kementerian_jps_id").value;
                    var jabatan = document.getElementById("jabatan_jps_id").value;

                } else {
                    if (!document.myform.kementerian.value) {
                        document.getElementById("error_kementerian").innerHTML = "Sila Pilih Kementerian";
                        document.getElementById("kementerian").focus();
                        return false;
                    }
                    document.getElementById("error_kementerian").innerHTML = " ";

                    if (!document.myform.jabatan.value && !document.myform.bahagian.value) {
                        document.getElementById("error_jabatan").innerHTML = "Sila Pilih Jabatan/Bahagian";
                        document.getElementById("Jabatan").focus();
                        return false;
                    } else {
                        document.getElementById("error_jabatan").innerHTML = " ";
                    }
                    var kementerian = document.myform.kementerian.value;
                    var jabatan = document.myform.jabatan.value;
                }

                var bahagian = '';
                if (document.myform.bahagian.value) {
                    bahagian = document.myform.bahagian.value;
                } else if (document.myform.jabatan_bahagian.value) {
                    bahagian = document.myform.jabatan_bahagian.value;
                }

                if (document.myform.dockument.files.length == 0 && document.myform.kategori.value == 2) {
                    // document.getElementById("error_image_name").style.display = 'block';
                    document.getElementById("error_dokumen_name_new").innerHTML = "Sila muat naik dokumen";
                    document.getElementById("error_dokumen_name").focus();
                    return false;
                } else {
                    //document.getElementById("error_image_name").style.display = 'none';
                    document.getElementById("error_dokumen_name_new").innerHTML = "";
                }

                const api_url = "{{ env('API_URL') }}";
                console.log(api_url);
                const api_token = "Bearer " + window.localStorage.getItem('token');
                console.log(api_token);
                $.ajaxSetup({
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": api_token,
                    }
                });
                var newText = document.getElementsByClassName('error');
                console.log(newText.length);
                for ($i = 0; $i < newText.length; $i++) {
                    console.log(newText[$i].innerHTML = "");
                }
                console.log(document.myform.dockument.files);
                var formData = new FormData();
                formData.append('nama', document.myform.nama.value);
                formData.append('no_kod_penganalan', document.myform.no_kod_penganalan.value);
                formData.append('email', document.myform.email.value);
                formData.append('kategori', document.myform.kategori.value);
                formData.append('no_telefon', document.myform.no_telefon.value);
                formData.append('jawatan', document.myform.jawatan.value);
                formData.append('pajabat', document.myform.pejabat.value);
                formData.append('jabatan', jabatan);
                formData.append('gred', document.myform.gred.value);
                formData.append('kementerian', kementerian);
                formData.append('bahagian', bahagian);
                formData.append('negeri', document.myform.negeri.value);
                formData.append('daerah', document.myform.daerah.value);
                formData.append('catatan', "catatan");
                formData.append('documents', document.myform.dockument.files[0]);

                console.log(formData);

                axios({
                        method: "post",
                        url: api_url + "api/temp/user/create",
                        data: formData,
                    })
                    .then(function(response) {
                        //handle success
                        console.log(response.data.code);
                        if (response.data.code === '200') {
                            $("#sucess_modal_register").modal('show');
                            $("#register_form").hide();
                        } else {
                            if (response.data.code === '422') {
                                Object.keys(response.data.data).forEach(key => {
                                    document.getElementById("error_" + key).innerHTML = response.data.data[
                                        key][0];
                                });
                            } else {
                                alert('There was an error submitting data')
                            }
                        }
                    })
                    .catch(function(response) {
                        //handle error
                        console.log(response);
                        alert("There was an error submitting data");
                    });


            });

            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }

            $('#tutup').click(function() {
                $("#sucess_modal_register").modal('hide');
                window.location.href = '/';

            });

            $('#close_button').click(function() {
                window.location.href = '/';

            });

            function myFunction() {
                var x = document.getElementById("error_dokumen_name").classList[2];
                console.log(x);
                if (x === "d-none") {
                    console.log("found");
                    document.getElementById('error_dokumen_name').classList.remove("d-none");
                } else {
                    console.log(" not found");
                    document.getElementById('error_dokumen_name').classList.add("d-none");
                }
            }


            function readURL(input, imgControlName) {
                console.log(input);
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    console.log(reader);
                    reader.onload = function(e) {
                        var iurl = e.target.result.substr(e.target.result.indexOf(",") + 1, e.target.result.length);
                        console.log(iurl);
                        $(imgControlName).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#remove_pdf").on('click', function() {
                document.getElementById("dockument").value = '';
                document.getElementById("document_size").innerHTML = '';
                document.getElementById("document_name").innerHTML = '';
                document.getElementById('selected_file').classList.remove("d-flex");
                document.getElementById('selected_file').classList.add("d-none");
            });
            $("#dockument").on('change', function() {
                console.log()
                $new_file = document.myform.dockument.files[0];
                console.log($new_file);
                if ($new_file.size > 4000000) {
                    document.getElementById("dockument").value = '';
                    document.getElementById('file_size').classList.remove("d-none");
                    document.getElementById('selected_file').classList.remove("d-flex");
                    document.getElementById('selected_file').classList.add("d-none");
                    return false;
                }
                var allowedExtensions = ["application/pdf", "image/jpeg", "image/png", "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                ];

                if (allowedExtensions.indexOf($new_file.type) == -1) {
                    document.getElementById("dockument").value = '';
                    document.getElementById('file_size').classList.add("d-none");
                    document.getElementById('file_type').classList.remove("d-none");
                    document.getElementById('selected_file').classList.remove("d-flex");
                    document.getElementById('selected_file').classList.add("d-none");
                    return false;
                }
                document.getElementById('error_dokumen_name').classList.add("d-none");
                document.getElementById('file_size').classList.add("d-none");
                document.getElementById('file_type').classList.add("d-none");
                document.getElementById('selected_file').classList.remove("d-none");
                document.getElementById('selected_file').classList.add("d-flex");
                var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
                fSize = $new_file.size;
                i = 0;
                while (fSize > 900) {
                    fSize /= 1024;
                    i++;
                }
                docu_size = (Math.round(fSize * 100) / 100) + ' ' + fSExt[i];
                document.getElementById("document_size").innerHTML = docu_size;
                document.getElementById("document_name").innerHTML = $new_file.name;
            });
        </script>

    </body>

    <div id="one" class="collapse">
        <div class="accordion-inner">
            HERE IS THE STUFF
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".accordion-toggle").mouseover(function() {
                $(".accordion-toggle").trigger("click");
                // If creating multiple accordion items, use the below to prevent all other
                // items with the class "accordion-toggle" triggering a click event
                // $(this).trigger("click");
            });

            // const togglePassword = document.querySelector("#togglePassword");
            // const password = document.querySelector("#password");

            $("#togglePassword").click(function() {

                var x = document.getElementById("pwd");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }


                this.classList.toggle("bi-eye");
            });


            var refreshButton = document.querySelector(".refresh-captcha");
            refreshButton.onclick = function() {
                document.querySelector(".captcha-image").src = '/captcha?test=' + Date.now();
            }

            $(".list").click(function handleClick(event) {
                let lists = document.querySelectorAll('.list a');
                lists.forEach((item) => item.classList.remove('active'));
                event.target.classList.add('active');
            });

        });

        axios({
                method: 'get',
                url: "{{ env('API_URL') }}" + "api/portal/main",
                responseType: 'json'
            })
            .then(function(response) {
                console.log('main')
                console.log(response.data)
                data = response.data.data
                console.log(data)
                //main logo



                logo1_temp = '<img src="' + data.logo1 + '" id="main_logo1" height="50px">'
                logo2_temp = '<img src="' + data.logo2 + '" id="main_logo2" height="50px" style="padding-right:20px;">'
                logo3_temp = '<img src="' + data.logo3 + '" id="main_logo3" height="50px">'
                if (data.logo1) {
                    $("#logo1").addClass("d-none")
                    $('#logo_source').append(logo1_temp)
                }

                if (data.logo2) {
                    $("#logo2").addClass("d-none")
                    $('#logo_source').append(logo2_temp)
                }

                if (data.logo3) {
                    $("#logo3").addClass("d-none")
                    $('#logo_source').append(logo3_temp)
                }
                // $('#main_logo1').attr('src', data.logo1);
                // $('#main_logo2').attr('src', data.logo2);
                // $('#main_logo3').attr('src', data.logo3);

                //main landing
                main_header.innerText = data.landing.tajuk
                if (data.landing_is_video == 1) {
                    $("#carouselExampleIndicators").addClass("d-none")
                    for (const [key, value] of Object.entries(data.landing.media_details)) {
                        $('#bgvid').attr('src', value.original_url)
                    }
                } else {
                    $("#hero-carousel").addClass("d-none")
                    $("#carouselExampleIndicators").removeClass("d-none")
                    for (const [key, value] of Object.entries(data.landing.media_details)) {
                        $('<div class="carousel-item"><img src="' + value.original_url + '" width="100%"></div>')
                            .appendTo('.carousel-inner');
                        // $('<li data-target="#carouselExampleIndicators" data-slide-to="'+key+'"></li>').appendTo('.carousel-indicators');
                    }
                    $('.carousel-item').first().addClass('active');
                    // $('.carousel-indicators > li').first().addClass('active');
                    $('#carouselExampleIndicators').carousel();
                }

                //pengenalan
                $('#peng_header').text(data.pengenalan.tajuk)
                $('#peng_description').html(data.pengenalan.keterangan)
                if (data.pengenalan_is_video == 1) {
                    $("#peng_bgimg").addClass('d-none')
                    $('#peng_bgvid').attr('src', data.pengenalan.media_details)
                } else {
                    $("#peng_bgvid").addClass('d-none')
                    $("#peng_bgimg").attr('src', data.pengenalan.media_details)
                }

                peng_length = data.pengumuman.length

                i = 0;
                for (const [peng_key, peng_value] of Object.entries(data.pengumuman)) {

                    today = new Date(peng_value.tarikh);
                    yyyy = today.getFullYear();
                    let mm = today.getMonth() + 1; // Months start at 0!
                    let dd = today.getDate();

                    if (dd < 10) dd = '0' + dd;
                    if (mm < 10) mm = '0' + mm;

                    formattedToday = dd + '-' + mm + '-' + yyyy;
                    active = ''
                    if (i == 0) {
                        active = 'active show'
                    }
                    $("#tab1").click(function() {
                        $("#tab-0").removeClass('active')
                    })

                    peng_side_template = '<li class="nav-item ' + active + '"> ' +
                        '<a class="nav-link " id="tab' + i + '"  data-bs-toggle="tab" data-bs-target="#tab-' + i +
                        '" >' +
                        '<h4>' + peng_value.tajuk + '</h4>' +
                        '<p><b>' + formattedToday + '</b> - ' + peng_value.sub_tajuk + '</p></a></li>'
                    $('#informasi_side').append(peng_side_template);
                    $("#tab2").click(function() {
                        // alert();
                        $("#tab-0").removeClass('active')
                    })

                    media_length = peng_value.media.length
                    image = ''
                    if (media_length > 0) {
                        image = peng_value.media[0].original_url
                    }

                    peng_main_template = '<div class="tab-pane ' + active + '" id="tab-' + i + '">' +
                        '<h3>' + peng_value.tajuk + '</h3>' +
                        '<p class="fst-italic">' + peng_value.sub_tajuk + '</p>' +
                        '<img src="' + image + '" alt="" class="img-fluid">' +
                        '<p>' + peng_value.keterangan + '</p></div>'
                    $('#informasi_main').append(peng_main_template);
                    i = i + 1
                }

                //contact
                contact = JSON.parse(data.contact.json_values)
                $('#alamat').text(contact.address)
                $('#telephone').text(contact.phone_no)
                $('#iframe').append(contact.mapCode)
                // $("iframe").height(400);
                //$("iframe").height(400);

                //footer
                footer = JSON.parse(data.footer.json_values)
                $('#footer_logo').attr('src', data.footer.logo)
                if (!data.footer.logo) {
                    $('#footer_logo').attr('src', data.footer.media[0].original_url)
                }
                $('#copyright').text(footer.copyright)
                if (footer.total_visit) {
                    $("#NOV").text(footer.total_visit)
                }
                if (footer.total_visit_today) {
                    $("#NOVT").text(footer.total_visit_today)
                }
                if (footer.total_visit_month) {
                    $("#NOVM").text(footer.total_visit_month)
                }
                if (footer.total_visit_year) {
                    $("#NOVY").text(footer.total_visit_year)
                }
                $('#footer').css('background-image', 'url(' + data.footer.imeg + ')');
            })

        //   $("#login-nonjps").click(function(event){ 
        //       console.log('non jps form submitted');            
        //       var formEl = document.forms.pengguna_agensi_form;
        //       var formData = new FormData(formEl);            
        //       axios({
        //         method: 'post',
        //         url: "{{ env('API_URL') }}"+"api/temp/user/auth",
        //         responseType: 'json',
        //         data: formData
        //         })
        //         .then(function (response) { 
        //             console.log(response)
        //             console.log("nonjpslogin")


        //             if(response.data.access_token != '') {
        //               console.log('got token')
        //               window.localStorage.setItem('token', response.data.access_token);

        //             }else {
        //               console.log('no token')
        //             }                  
        //         })

        // });

        // $("#login-jps").click(function(event){ 
        //       console.log('jps form submitted');
        //       var formEl = document.forms.pengguna_jps_form;
        //       var formData = new FormData(formEl);            
        //       axios({
        //         method: 'post',
        //         url: "{{ env('API_URL') }}"+"api/temp/user/auth",
        //         responseType: 'json',
        //         data: formData
        //         })
        //         .then(function (response) { 
        //             console.log(response)
        //             console.log("login")


        //             if(response.data.access_token != '') {
        //               console.log('got token')
        //               window.localStorage.setItem('token', response.data.access_token);

        //             }else {
        //               console.log('no token')
        //             }                  
        //         })              
        // });
    </script>

    </html>
