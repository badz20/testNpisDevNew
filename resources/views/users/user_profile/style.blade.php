<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .close{
        text-align: end !important;
    }

    span.error {
        color:red;
    }
    label.active_button {
        background-color: #0acf97;
        padding-left: 16px;
        padding-right: 16px;
        padding-top: 4px;
        padding-bottom: 4px;
        color: white;
        width: 65px;
        margin-left:45%;
        margin-bottom:25px;
    }
    label.in_active_button {
        background-color: #fa5d7c;
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        width: 92px;
        margin-left:40%;
        margin-bottom:25px;
    }
    /* img#gambar_image {
        width: 96%!important;
        height: 88px !important;
    } */
    .page-title-right{
            font-size: 18px !important;
        }
        .Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_left .iconer {
        background-color: #fff0d7;
        padding: 0.4rem 0.4rem;
        border: 0.2rem;
    }

    .Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header {
        padding: 6% 3.8% 2% !important;
    }

    .required:after {
        content:" *";
        color: red;
    }
    .peranan {
        padding-top:15px;
    }
    .tutup-confirm{
    margin: 2% 0 3% 0;
        background-color: #0acf97;
        color: #fff;
        border: none;
        border-radius: 0.22rem;
        font-size: 0.8rem;
        padding: 0.6rem 1rem;
    }
    .close-confirm{
    margin: 2% 0 3% 0;
        background-color: #fa5c7c;
        color: #fff;
        border: none;
        border-radius: 0.22rem;
        font-size: 0.8rem;
        padding: 0.6rem 1rem;
    }
    img {
        cursor: pointer;
    }

    #imageUpload
    {
        display: none;
    }

    #gambar_image
    {
        cursor: default;
    }

    #profile-container {
        width: 150px;
        height: 150px;
        overflow: hidden;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        border-radius: 50%;
    }

    #profile-container img {
        width: 100%;
        height: 100%;
    }

    button.printing.btn.btn-info {
        width: 100% !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
    }

    .user_role_container {
        height: fit-content !important;
    }

    .Mainbody_conatiner .Mainbody_content.pbottom
    {
        margin-bottom: 15% !important;
    }

.add_user_role_modal_container #add_user_permission_modal {
  background-color: rgba(0, 0, 0, 0.2);
}

/* 2023 March 09 by Nabilah */
@media (max-width: 820px) {
  .add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog {
    max-width: 80%;
    margin: 0;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
}
@media (min-width: 821px) {
  .add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog {
    max-width: 39.5%;
  }
}
/* End new from Nabilah */


.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header {
  background-color: #39afd1;
  padding: 2%;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header h5 {
  font-size: 0.89rem;
  color: #fff;
  margin: 0;
  padding-left: 1rem;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header button {
  background-color: transparent;
  border: none;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_header button img {
  -webkit-filter: brightness(0) invert(1);
          filter: brightness(0) invert(1);
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body {
  padding: 1% 3%;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .configuration {
  margin-bottom: 4%;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .configuration button {
  background-color: transparent;
  border: none;
  color: #39afd1;
  font-size: 0.78rem;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th,
.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td {
  border: none;
  font-size: 0.8rem;
  padding: 0.5rem;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th {
  color: #777ea8;
  padding-bottom: 0.8rem;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table th:nth-child(2) {
  width: 30%;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td {
  color: #6e7180;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_body .add_role_modak_table td input {
  width: 1rem;
  aspect-ratio: 1/1;
  border-radius: 0.2rem;
  border: 1px solid #6d767d;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_footer {
  margin: 5% 0 3% 0;
}

.add_user_role_modal_container #add_user_permission_modal .add_role_modal_dialog .add_role_modal_content .add_role_modal_footer button {
  color: #fff;
  background-color: #5a63c2;
  border: none;
  font-size: 0.8rem;
  padding: 1% 1.8%;
  border-radius: 0.2rem;
}
/* ------------- */

.Mainbody_conatiner .VAE-page .daya-accordion .card {
    border-radius: 0;
    border: 0;
    border-bottom: 2px solid white;
}
.Mainbody_conatiner .VAE-page .daya-accordion .card-header {
    padding: 0.1rem 1.25rem;
    background-color: #39afd1;
}
.Mainbody_conatiner .VAE-page .daya-accordion .acc-btn {
    display: flex;
    align-items: center;
    gap: 3%;
}
.Mainbody_conatiner .VAE-page .daya-accordion .acc-btn p {
    margin-bottom: 0;
    font-size: 1rem;
    text-transform: uppercase;
    text-decoration: none;
    color: white;
}
td.td {
    height: 50px;
    padding-top: 20px !important;
    padding-left: 10px !important;
}
input.check{
    margin-left: 45% !important;
    margin-top: 5%  !important;
    width: 25px  !important;
    height: 25px  !important;
}
input.button-check{
    margin-top: 1% !important;
    width: 25px !important;
    height: 20px !important;
}
/* input#pentadbir{
  margin-left: 73% !important;
} 
input#permohon{
  margin-left: 67% !important;
}
input#permantuan{
  margin-left: 55.5% !important;
}
input#kontrak{
  margin-left: 75% !important;
}
input#peruding{
  margin-left: 71.5% !important;
}
input#vm{
  margin-left: 68.8% !important;
} */

.Mainbody_conatiner .VAE-page input {
    font-size: 0.8rem;
    font-weight: 600;
    padding: 1.2rem 0.8rem;
    background-color: #d9d9d9;
    margin-bottom: 1%;
}

i.uil-chart-line {
    color: white;
    font-size: 1.7rem;
}

</style>