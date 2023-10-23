<style>
  .highlight { background-color: yellow }

  .searchIn{
        background:url("{{ asset('assets/images/Icon Cari.png') }}") no-repeat calc(100% - 175px) center / 15px ;
        padding-left:25px !important;
        
    }

    .searchOut{
    background:none; 
    }

    #log_masuk_modal {
  background-color: rgb(0, 0, 0);
}
@media screen and (max-width: 820px) {
  #log_masuk_modal .log_masuk_modal_dialog {
    max-width: 80%;
    margin: 0;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
}
@media screen and (min-width: 821px) {
  #log_masuk_modal .log_masuk_modal_dialog {
    max-width: 58%;
  }
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
  font-size: 1.3rem;
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
  font-size: 0.9rem;
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
  padding-bottom: 4%;
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
  font-size: 0.8rem;
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
  font-size: 0.8rem;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form label {
  font-size: 0.9rem;
  font-weight: 600;
  color: #646464;
}
#log_masuk_modal .log_masuk_modal_content_container .log_masuk_modal_container .log_masuk_modal_right_content .log_masuk_modal_body .MAsuk_tab_container .pengguna_jps_tab_content form .masuk_submit {
  padding: 3.1% 0.5rem;
  background-color: #6184de;
  color: #fff;
  border-radius: 10px;
  width: 100%;
  font-size: 1rem;
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
.forget_password .btnDaftar {
  font-size: 0.8rem;
  background-color: transparent;
  border: none;
  color: #4a7bba;
  text-decoration: underline;
  padding: 0.7%;
}

#Forget_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
#Forget_modal .forget_modal_dialog {
  max-width: 35%;
}
#Forget_modal .forget_modal_dialog .forget_modal_content {
  border-radius: 10px;
  box-shadow: rgba(1, 8, 17, 0.4) 0px 0px 0px 1px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(15, 15, 15, 0.08) 0px 1px 0px inset;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body {
  padding: 6% 2%;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_heading h4 {
  font-size: 0.9rem;
  font-family: poppins_bold;
  text-transform: uppercase;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_heading p {
  font-size: 0.8rem;
}
#Forget_modal .forget_modal_dialog .forget_modal_content .forget_modal_body .forget_modal_form form input {
  background-color: #f8f8f8;
  height: auto;
  padding: 0.5rem 1rem;
  font-size: 0.8rem;
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
  font-size: 1rem;
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
  border-radius: 5px;
  color: #fff;
  border: none;
  font-size: 0.87rem;
  padding: 0.4rem 1rem;
}

.login_interface_section #Login_interface_modal {
  font-family: Poppins_Regular;
  background-color: rgba(0, 0, 0, 0.2);
}
/* 2023 March 22 by Nabilah */
@media screen and (max-width: 820px) {
  .login_interface_section #Login_interface_modal .login_interface_modal_dialog {
    max-width: 90%;
    margin: 0;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    overflow-y: initial !important;
  }
  .login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body {
    height: 90vh;
    overflow-y: auto;
  }
}
@media screen and (min-width: 821px) {
  .login_interface_section #Login_interface_modal .login_interface_modal_dialog {
    max-width: 53%;
  }
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
  font-size: 1rem;
  font-family: Poppins_bold;
  margin: 3% 0 5%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_container {
  padding-bottom: 3%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_container label {
  font-size: 0.8rem;
  color: #4a649d;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container {
  display: flex;
  gap: 1%;
  margin-bottom: 1.2%;
  align-items: center;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container label {
  width: 24%;
  font-size: 0.8rem;
  color: #4a649d;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input {
  width: 85%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input input,
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
  font-size: 0.8rem;
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
  background-position: right 0% top 40%;
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
  background-color: #fa5c7c;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .form_btn_container button:nth-child(2) {
  background-color: #5b64c3;
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
  /* box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px; */
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

.bs-popover-right > .arrow::after {
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

input:checked + .slider {
  background-color: #0acd95;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0acd95;
}

input:checked + .slider:before {
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
.r_container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.r_container input:checked ~ .checkmark {
  background-color: #fff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.r_container input:checked ~ .checkmark:after {
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
    content:" *";
    color: red;
  }
</style>
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
    color:red;
    font-size:10px;
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
    width:130px;
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
    /* font-weight: 600; */
}
</style>
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

    .col-xs-5ths {
        width: 20%;
        float: left;
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
</style>
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
</style>
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
        font-size: 0.9rem;
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
      margin-top:10%;
    }

    /* Style the back side */
    .flip-card-back {
        background-color: #092c8b;
        color: rgb(255, 255, 255);
        transform: rotateY(180deg);
        padding: 13px;
    }

    .col-md-3.form_input.jabatan_col {
          width: 29.5% !important;
          padding-left: 0px;
          height: 50px;
      }
    .col-md-3.form_input.negeri_col{
           width: 27.5% !important;
          padding-left: 0px;
          height: 50px;
    }
      .row.jabatan_row {
          width: 110%;
      }
  div#jabatan_agensy_drop {
      margin-bottom: 22px !important;
  }
  
</style>
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
<style>
  /* 2023 March 16 by Nabilah */

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

    @media screen and (max-width: 820px) {
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
        /* height: 100px; */
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
      
      /* navigation main page */
    .navbar a:hover {
        color: var(--prime-color);
    }

    @media screen and (max-width: 820px) {
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
            font-size: 2rem;
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
            background-color: white!important;
        }
        .navbar li {
            padding: 0.7rem 0.5rem;
        }
        .navbar a {
            font-size: 4vmin;
            text-transform: uppercase;
            color: #999999!important;
        }
        .navbar a:hover {
            text-decoration: underline!important;
        }
        .nav-scale {
            transform: scale(1) !important;
        }

        .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover>a {
            color: #212529!important;
            text-decoration: underline!important;
        }
        .navbar ul li a {
          font-size: 1.2rem;
          display: inline-block;
          padding: 0.1em;
          font-weight: bold;
        }
        .center_col {
            position: relative;
            display: inline-block;
            text-align: center;
        } 
    }
    /* Header end */
    
    /* End by Nabilah */

    /* 2023 March 31 by Nabilah starts */
    @media screen and (max-width: 576px) {
      .margin_responsive{
        margin-bottom: 200%;
      }
      #log_masuk_modal .log_masuk_modal_container .log_masuk_modal_left_content {
          display: none;
          flex: 1 1 auto;
      }

      #log_masuk_modal .log_masuk_modal_container .log_masuk_modal_right_content {
          flex: 1 1 auto;
      }
      .col-md-3.form_input.jabatan_col {
          width: 67% !important;
          padding-left: 0px;
          height: 50px;
          margin: 2%;
      }
      .bahagian_col {
        padding-left: 14%;
      }
      .col-md-3.form_input.jbt_bahagian_col {
          width: 74% !important;
          padding-left: 7%;
          height: 50px;
          margin: 2%;
      }
      .col-md-3.form_input.negeri_col{
           width: 100% !important;
          padding-left: 0px;
          height: 50px;
          margin: 2%;
      }
      .daerah_col {
        margin-left: 4%;
      }
      .jps_negeri_col{
        width:100%;
      }
    }
    @media screen and (min-width: 577px) and (max-width: 820px) {
      .margin_responsive{
        margin-bottom: 110%;
      }
      #log_masuk_modal .log_masuk_modal_container .log_masuk_modal_left_content {
          display: none;
          flex: 1 1 auto;
      }

      #log_masuk_modal .log_masuk_modal_container .log_masuk_modal_right_content {
          flex: 1 1 auto;
      }
      .col-md-3.form_input.jabatan_col {
          width: 30.5% !important;
          padding-left: 0px;
          height: 50px;
      }
      .col-md-3.form_input.negeri_col{
           width: 28% !important;
          padding-left: 0px;
          height: 50px;
      }
      .row.jabatan_row .jps_negeri_col{
        width:27.5%;
      }
    }
    @media screen and (min-width: 821px) {
      .margin_responsive{
        margin-bottom: 35%;
      }
      .navbar ul li a {
        font-size: 0.9rem;
        display: inline-block;
        padding: 0.1em;
        font-weight: bold;
      } 
      .daerah_col {
        width: 100px;
      }
      .row.jabatan_row .jps_negeri_col{
        width:27.5%;
      }
    }
    @media screen and (max-width: 820px) {

      #Forget_modal .forget_modal_dialog {
        max-width: 70%;
        margin: 0;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        overflow-y: initial !important;
      }
    }

    .btnSej {
              background-color: #6c757d;
              color: #fff;
              border-style: none;
              float: right;
              font-size: 0.8rem;
            }

    .modalEotLad {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .hantarBtnDiv {
        border: none;
        border-radius: 0.15rem;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4%;
        gap: 2%;
    }

    .CadanganTutupBtn {
        color: #fff !important;
        background-color: #5B63C3;
        font-size: 0.7rem !important;
        padding: 1.5% 3.5% 1.5% 3.5%;
        border: none;
        font-family: Poppins_Regular;
        color: #fff;
        border-radius: 0.1rem;
        display: flex;
    }

.selanjutnyaBtn {
  font-size: 0.9rem;
}
</style>
    