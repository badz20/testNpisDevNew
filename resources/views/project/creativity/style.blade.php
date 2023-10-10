<style>
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

#objektif{
  height:55px;
  width:100%;
  background:white;
  border:1px solid #ced4da;
  resize: vertical;
  overflow:auto;
  box-shadow: auto;

}
#ringkasan_latar{
  height:55px;
  width:100%;
  background:white;
  border:1px solid #ced4da;
  resize: vertical;
  overflow:auto;
  box-shadow: auto;

}
#rasional_keperluan{
  height:55px;
  width:100%;
  background:white;
  border:1px solid #ced4da;
  resize: vertical;
  overflow:auto;
  box-shadow: auto;

}
#faedah{
  height:55px;
  width:100%;
  background:white;
  border:1px solid #ced4da;
  resize: vertical;
  overflow:auto;
  box-shadow: auto;

}

#kelulus_khas{
  height:55px;
  width:100%;
  background:white;
  border:1px solid #ced4da;
  resize: vertical;
  overflow:auto;
  box-shadow: auto;

}
#implikasi_projeck{
  height:55px;
  width:100%;
  background:white;
  border:1px solid #ced4da;
  resize: vertical;
  overflow:auto;
  box-shadow: auto; 
}
.skopStyle{
    position: relative;
    text-align: end;
    padding-top: 20px !important;
    font-size: 13px !important;
    font-weight: bold !important;
}
.mainNumbering{
  font-size: 13px !important;
  font-weight: bold !important;
}

.Mainbody_conatiner.user_profile {
  width: 100%;
}
.Mainbody_conatiner.user_profile.active {
  width: 100%;
}

.Mainbody_conatiner {
  width: 100% !important;
  transition: 0.4s ease-in-out;
}
.Mainbody_conatiner.active {
  width: 95.5%;
}
.Mainbody_conatiner.active header.dashboard {
  width: 95.5%;
}
.Mainbody_conatiner .fixed_nav {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 89;
}
.Mainbody_conatiner .Mainbody_content.mtop {
  margin-top: 96px !important;
}
.Mainbody_conatiner .Mainbody_content.pbottom {
  margin-bottom: 3%;
}
.Mainbody_conatiner header {
  transition: 0.4s ease-in-out;
}
.Mainbody_conatiner header.dashboard {
  position: fixed;
  margin-left: auto;
  width: 83.2%;
  z-index: 99;
}
.Mainbody_conatiner header nav {
  background-color: #fff;
  padding: 0.9rem 1.2rem;
}
.Mainbody_conatiner header nav .nav_bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content {
  width: 25%;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content.toggle_section {
  position: relative;
  width: 15%;
  justify-content: space-between;
  z-index: 100;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content.toggle_section .nav_logo {
  padding-left: 0;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content input {
  border: none;
  border-radius: 0;
  height: 47px;
  background-color: #f5f6fa;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content button {
  border-radius: 0 3px 3px 0;
  background-color: #39b0d2;
  color: #fff;
  border: none;
  font-family: Poppins_Regular;
  padding: 0 1.8rem;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content .nav_logo {
  padding-left: 42px;
  align-items: center;
}
.Mainbody_conatiner header nav .nav_bar .Nav_left_Input_content .nav_logo h3 {
  font-size: 1.5rem;
  padding-left: 12%;
  margin: 0;
  font-family: Poppins_bold;
}
.Mainbody_conatiner header nav .nav_bar .Nav_right_content .Nav_right_img_content {
  align-items: center;
  gap: 2.3rem;
  padding: 0 2rem;
}
.Mainbody_conatiner header nav .nav_bar .Nav_right_content .Nav_right_img_content .icons_contains {
  display: flex;
  align-items: center;
  gap: 2.3rem;
}
.Mainbody_conatiner header nav .nav_bar .Nav_right_content .profile_container {
  background-color: #ffffff;
  border-left: 1px solid #ffffff;
  gap: 1rem;
  align-items: center;
  padding: 0rem 3rem 0rem 2rem;
}
.Mainbody_conatiner header nav .nav_bar .Nav_right_content .profile_container .profile_content h4 {
  margin: 0;
  font-size: 1.1rem;
  color: #747ba3;
}
.Mainbody_conatiner header nav .nav_bar .Nav_right_content .profile_container .profile_content p {
  font-size: 0.8rem;
  color: #a3adb1;
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content {
  margin-bottom: 5%;
}
.Mainbody_conatiner .Mainbody_content.tab {
  margin-bottom: 2%;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container {
  padding: 0 1%;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container {
  padding: 0 1%;
  margin: 0;
  padding: 0;
  margin-bottom: 2rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_child {
  margin: 0;
  border-radius: 0.3rem;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  padding: 2.5rem 0;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_child:nth-child(1) {
  background: #63b3ee;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_child:nth-child(2) {
  background: #b4a8fe;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_child:nth-child(3) {
  background: #78f1aa;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_child:nth-child(4) {
  background: #fbd38d;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_content {
  text-align: center;
  color: #fff;
  text-shadow: #000;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_content h3 {
  font-size: 2.4rem;
  font-weight: normal;
  text-shadow: 2px 2px rgba(0, 0, 0, 0.24);
  margin-bottom: 0;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .box_container .box_content p {
  margin: 0;
  font-size: 0.9rem;
  text-shadow: 2px 2px rgba(0, 0, 0, 0.24);
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container {
  width: 100%;
  display: flex;
  gap: 1.7%;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container {
  width: 26%;
  display: flex;
  flex-direction: column;
  gap: 3%;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_chart {
  position: relative;
  padding: 0 2%;
  background-color: #fff;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_chart h3 {
  position: absolute;
  z-index: 1;
  font-size: 1.3rem;
  text-transform: uppercase;
  padding: 3% 5% 5% 10%;
  color: #767988;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container #bar_chart {
  width: 100%;
  height: 260px;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container {
  padding: 2%;
  background-color: #fff;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
  /* width */
  /* Track */
  /* Handle */
  /* Handle on hover */
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container h3 {
  font-size: 1.3rem;
  text-transform: uppercase;
  padding: 5% 5% 5% 10%;
  color: #767988;
  border-bottom: 1px solid #d9d9d9;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container ::-webkit-scrollbar {
  width: 0.3rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container ::-webkit-scrollbar-track {
  background: #fff;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container ::-webkit-scrollbar-thumb {
  background: #d9d9d9;
  border-radius: 3px;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container ::-webkit-scrollbar-thumb:hover {
  background: #a1a1a1;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container {
  padding: 0 5%;
  max-height: 442px;
  overflow-y: scroll;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container .dashboard_detail_content {
  width: 90%;
  margin: auto;
  align-items: center;
  gap: 10%;
  padding: 4% 0;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container .dashboard_detail_content .profile {
  width: 16%;
  aspect-ratio: 1/1;
  border-radius: 50%;
  display: flex;
  font-family: Poppins_bold;
  align-items: center;
  font-size: 1.3rem;
  justify-content: center;
  background-color: #0acd95;
  color: #000;
  position: relative;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container .dashboard_detail_content .profile span.active {
  position: absolute;
  width: 0.7rem;
  aspect-ratio: 1/1;
  border-radius: 50%;
  top: 0.2rem;
  right: 0.2rem;
  background-color: #4b9a41;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container .dashboard_detail_content .profile img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container .dashboard_detail_content h4 {
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 0.2rem;
  color: #6d717d;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_chart_detail_container .dashboard_detail_container .dashboard_detail_content_container .dashboard_detail_content p {
  margin: 0;
  font-size: 0.8rem;
  color: #a1a5ae;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container {
  background-color: #fff;
  width: 72.3%;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
  padding: 1.7% 1.2%;
  /* width */
  /* Track */
  /* Handle */
  /* Handle on hover */
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_content {
  margin-bottom: 1rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_header {
  border-bottom: 2px solid #dee1e6;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_header .dashboard_table_header_left {
  align-items: center;
  margin-bottom: 3%;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_header .dashboard_table_header_left img {
  padding: 0.2rem;
  border: 0.2rem;
  width: 2.2rem;
  background-color: #ffefd5;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_header .dashboard_table_header_left h3 {
  padding-left: 4%;
  font-size: 1.15rem;
  color: #6e7180;
  margin: 0;
  font-weight: 500;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container ::-webkit-scrollbar {
  width: 0.3rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container ::-webkit-scrollbar-track {
  background: #fff;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container ::-webkit-scrollbar-thumb {
  background: #d9d9d9;
  border-radius: 3px;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container ::-webkit-scrollbar-thumb:hover {
  background: #a1a1a1;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder {
  height: 681px;
  overflow-y: auto;
  position: relative;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table {
  margin-bottom: 0;
  border-bottom: 1px solid #dee2e6;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table thead {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
  background-color: #fff;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table thead tr:last-child {
  text-align: center;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table thead tr th {
  padding: 0.75rem;
  font-size: 0.85rem;
  color: #656b9b;
  border: none;
  vertical-align: bottom;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table thead tr th .sort {
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr:nth-child(odd) {
  background-color: #f6f7fb;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr :last-child button {
  font-size: 0.72rem;
  border: none;
  color: #fff;
  border-radius: 0.15rem;
  padding: 0.3rem 0.6rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr :last-child button:nth-child(1) {
  background-color: #fa5d7c;
  padding: 0.6rem 0.4rem;
  margin-right: 0.4rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr :last-child button:nth-child(2) {
  background-color: #5b64c3;
  padding: 0.6rem 1.4rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr td {
  border-top: 1px solid #dee2e6;
  padding: 0.48rem;
  font-size: 0.82rem;
  color: #818390;
  vertical-align: middle;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr td img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 1.4rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr td .folder p {
  margin: 0;
  padding-left: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .dashboard_content_container .dashboard_chart_table_container .dashboard_table_container .dashboard_table_holder table tbody tr td .folder img {
  margin: 0;
  width: 19px;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container {
  width: 86.8%;
  margin: auto;
  text-align: center;
  margin-top: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child {
  border: none;
  padding: 0.65%;
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content {
  padding: 0.5%;
  display: flex;
  position: relative;
  flex-direction: column;
  height: 100%;
  align-content: space-between;
  justify-content: space-around;
  box-shadow: #c4c4c4 0px 1px 1px, #c4c4c4 0px 1px 1px, #c4c4c4 0px 2px 2px, #c4c4c4 0px 4px 4px, #c4c4c4 0px 2px 2px;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content p,
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content h3,
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content h4 {
  font-weight: 600;
  text-shadow: 2px 2px #dedede;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content p {
  margin: 0;
  font-size: 0.69rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content h3 {
  margin: 0;
  font-size: 2.4rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content h4 {
  font-size: 1rem;
  letter-spacing: 0.081rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content .img_Float {
  right: 7%;
  top: 20%;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content .tabl {
  width: 85%;
  margin: auto;
  font-weight: 600;
  gap: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content .tabl .col-6 {
  background-color: #d9d9d9;
  padding: 0;
  font-size: 0.67rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_box_container .project_register_box_child .project_register_box_content .tabl .tabl_child {
  padding: 1%;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .project_register_table_header {
  display: flex;
  padding: 1% 3% 1% 2%;
  margin-top: 3.8%;
  align-items: center;
  justify-content: space-between;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .project_register_table_header h4 {
  font-size: 1rem;
  font-family: Poppins_bold;
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .project_register_table_header button {
  font-size: 0.88rem;
  color: #fff;
  padding: 0.5% 1%;
  border: none;
  border-radius: 0.3rem;
  background-color: #0acf97;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .project_register_table_header button img {
  margin-right: 0.5rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder {
  width: 98.5%;
  margin: auto;
  text-align: center;
  background-color: #f5f6fb;
  margin-bottom: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_preview {
  font-size: 0.78rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_preview th,
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_preview td {
  padding: 0.5rem 1rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_preview tbody tr.empty {
  visibility: hidden;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer {
  justify-content: space-between;
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer p {
  color: #39afd1;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer ul {
  font-weight: 600;
  padding: 0;
  display: flex;
  list-style-type: none;
  gap: 1rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer ul li {
  display: flex;
  align-items: center;
  border-radius: 50%;
  cursor: pointer;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer ul ul {
  gap: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer ul ul li {
  padding: 0.3rem 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_content_container .project_register_table_container .table_holder .table_footer ul ul li.active {
  color: #fff;
  background-color: #38afd1;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container {
  width: 97%;
  margin: auto;
  display: flex;
  /* gap: 2%; */
  margin-top: 1.5%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container {
  width: 12%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul {
  padding: 0;
  list-style-type: none;
  padding: 1% 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li {
  padding: 7% 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li.success .tab_image {
  background-color: #39aFd1;


}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li.success .tab_image img {
  filter: brightness(0) invert(1);
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li.active .tab_image {
  border: 0.2rem solid #39aFd1;

}
@media (max-width: 820px) {
  .Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li .tab_image {
    width: 4rem;
    aspect-ratio: 1/1;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 0.2rem solid #d9e9f8;
    margin-bottom: 5%;
  }
}
@media (min-width: 821px) {
  .Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li .tab_image {
    width: 44%;
  aspect-ratio: 1/1;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  border: 0.2rem solid #d9e9f8;
  margin-bottom: 5%;
  }
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li h4 {
  font-size: 1rem;
  font-family: Poppins_bold;
  color: #5d5b73;
  text-transform: uppercase;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container {
  width: 85%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container {
  width: 95% !important;
  margin: 5%;
  padding: 2% 2%;
  border-radius: 0.5rem;
  border: 1px solid #d6d6d6;
  background: #ffffff;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content {
  width: 22%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content h5 {
  font-size: 0.75rem;
  background-color: #4bcfc7;
  padding: 2%;
  text-align: center;
  height: 100%;
  width: 100%;
  display: flex;
  color: #fff;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content h4 {
  padding: 5%;
  font-size: 0.8rem;
  font-family: Poppins_bold;
  color: #fff;
  width: 60%;
  text-align: center;
  text-transform: uppercase;
  background-color: #6c757d;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content .box_content {
  width: 100%;
  margin-top: 4%;
  padding: 7%;
  border: 1px dashed #d6d6d6;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content .box_content::before {
  width: 16px;
  content: " ";
  background-image: url({{ asset('assets/images/Arrow_10.png') }});
  background-position: left;
  background-size: 16px;
  background-repeat: no-repeat;
  position: absolute;
  right: -10%;
  top: 30%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content .box_content.end::before {
  transform: rotate(-180deg);
  left: -14%;
  top: 30%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content .box_content.bend::before {
  transform: rotate(90deg);
  left: 47%;
  top: 120%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content .box_content p {
  margin: 0;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  background-color: #eeeeee;
  font-size: 0.7rem;
  padding: 5%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content .box_content p.yellow {
  background-color: #fcf0b3;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container {
  border: 1px solid #d6d6d6;
  width: 100%;
  margin: 0.5rem;
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container.rmk {
  padding: 3%;
  background-color: #fcfcfc;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .RMK_project_header {
  border-bottom: 1px solid #d6d6d6;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .RMK_project_header h4 {
  font-size: 1rem;
  margin: 0;
  font-family: Poppins_bold;
  align-self: flex-end;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_header {
  justify-content: space-between;
  align-items: center;
  padding: 1% 2%;
  border-bottom: 1px solid #d6d6d6;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_header h4 {
  font-size: 0.9rem;
  margin: 0;
  font-family: Poppins_bold;
  text-transform: uppercase;
  align-self: flex-end;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_header .input_container {
  display: inline-flex;
  align-items: center;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_header .input_container label {
  display: block;
  font-size: 0.8rem;
  white-space: nowrap;
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_header .input_container input {
  margin-left: auto;
  width: 90%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container {
  padding: 1.2% 1.5%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container label {
  font-size: 0.75rem;
  font-family: Poppins_bold;
  display: block;
  color: #202020;
  position: relative;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container label sup {
  font-size: 0.9rem;
  color: red;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .select_content {
  width: 48%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_content {
  width: 45%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container input,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container select {
  height: auto;
  font-size: 0.8rem;
  padding: 0.65rem 1rem;
  border-radius: 0.2rem;
  box-shadow: none;
  outline: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container input:focus,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container select:focus {
  outline: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container select {
  background-repeat: no-repeat;
  background-size: 1rem;
  -webkit-appearance: none;
  background-position: right 0.2rem top 50%;
  background-image: url({{ asset('assets/Polygon11.png') }});
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container select option {
  font-size: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container select option:hover {
  background-color: #0acd95 !important;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container textarea {
  font-size: 0.8rem;
  box-shadow: none;
  outline: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container {
  display: flex;
  /* gap: 5%; */
  margin-bottom: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_content,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .select_content {
  display: flex;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_content .input_form_group,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_content .select_form_group,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .select_content .input_form_group,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .select_content .select_form_group {
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_content .ms-options-wrap input[type=checkbox],
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .select_content .ms-options-wrap input[type=checkbox] {
  accent-color: #128eb1;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .ms-options-wrap button {
  height: auto;
  font-size: 0.8rem;
  padding: 0.65rem 1rem;
  border-radius: 0.2rem;
  box-shadow: none;
  outline: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .ms-options-wrap button::after {
  display: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .ms-options-wrap ul {
  list-style: none;
  margin: 0;
  padding: 0 0 0 0.7rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .ms-options-wrap ul label {
  width: 100%;
  font-family: Poppins_regular;
  font-weight: 400;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content {
  width: 100%;
  display: flex;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content button.green {
  background-color: #4da84b;
  color: #fff;
  font-size: 0.85rem;
  border-radius: 0.2rem;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content p {
  font-size: 0.8rem;
  font-weight: 600;
  color: #666666;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content label {
  margin: 0;
  width: 19%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content label span {
  font-family: Poppins_Regular;
  color: #666666;
  font-weight: 400;
  font-size: 0.65rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .r_container {
  width: 11%;
  color: #666666;
  font-weight: 600;
  font-family: Poppins_Regular;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .r_container .checkmark {
  top: 2px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .input_form_group {
  width: 80.7%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .info {
  top: 10%;
  left: 8%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .info button {
  padding: 0;
  background-color: transparent;
  border: none;
  border-radius: 50%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .pop_content {
  border-radius: 0.3rem;
  font-size: 0.6rem;
  background-color: #e9e9e9;
  padding: 1.2rem 2%;
  width: 190px;
  text-align: center;
  font-weight: 600;
  position: absolute;
  top: 70%;
  left: 90%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content table.skop td,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content table.skop tr {
  padding: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content table.skop thead th {
  font-size: 0.8rem;
  font-family: Poppins_bold;
  padding: 0.5rem;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content table.skop tbody tr:nth-child(odd) {
  background-color: #f6f7fb;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content table.skop tbody tr td {
  padding: 0.4rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content {
  border-color: #ced4da;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content button {
  background-color: transparent;
  border: none;
  padding: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_content:nth-child(odd) {
  background-color: #f6f7fb;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_content {
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_content input,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_content select {
  border: 1px solid #ced4da;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_footer {
  background-color: #39aed1;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_footer p {
  font-size: 0.8rem;
  font-weight: 400;
  color: #fff;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content .skop_card_content .skop_footer input {
  border: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table th,
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table td {
  font-size: 0.75rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table thead {
  background-color: #39b0d2;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table thead tr {
  background-color: #39b0d2;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table thead th {
  vertical-align: middle;
  border: none;
  color: #fff;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table thead th.borders {
  border-bottom: 1px solid #dee2e6;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .outcome_table_container table tbody td button {
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_content_footer {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2%;
  gap: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_content_footer button {
  padding: 1% 1.5%;
  border: none;
  color: #fff;
  font-size: 0.8rem;
  border-radius: 0.15rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_content_footer button:nth-child(1) {
  background-color: #5b64c3;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_content_footer button:nth-child(2) {
  background-color: #0acf97;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_content_footer button.green {
  background-color: #4da84b !important;
}

.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .creativity-index-topis-italic {
  border-bottom: 1px solid #d6d6d6;
  /* font-style: italic; */
  font-weight: 600;
  font-size: 0.9rem;
  padding-bottom: 10px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .creativity-index-topis-italic span {
  font-style: normal;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-label {
  font-size: 0.9rem;
  font-weight: 600;
  font-size: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-input {
  text-align: end;
  padding: 0.5rem 0.45rem;
  border-radius: 5px;
  outline: none;
  border: 0;
  background-color: #d9d9d9;
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-input::-webkit-outer-spin-button, .Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-input::-moz-placeholder {
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-input:-ms-input-placeholder {
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .create-input::placeholder {
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .plus-minus-img {
  width: 26px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .sub-topic {
  font-size: 0.8rem;
  font-weight: 600;
  text-transform: uppercase;
  padding-left: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .outcome-con input {
  font-size: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container {
  margin-top: 3%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content {
  border: 1px solid #d6d6d6;
  padding: 2% 4% 3% 3%;
  position: relative;
  background-color: #f9f9f9;
  border-radius: 5px;
  margin-bottom: 3%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content label {
  font-size: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content input {
  font-size: 0.8rem;
  height: 38px !important;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content textarea {
  width: 82%;
  font-size: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .input-grey {
  background-color: #d9d9d9;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .minus-inside {
  position: absolute;
  right: 1%;
  top: 10px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .input-textarea-group {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .input-textarea-group label {
  width: 18%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .input-textarea-group input {
  width: 82%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .kuantiti-input-group {
  display: flex;
  align-items: center;
  margin-bottom: 2%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .kuantiti-input-group .sub-con {
  display: flex;
  align-items: center;
  width: 50%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .kuantiti-input-group .sub-con label {
  width: 36%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .creativity-index-page .impak-container .impak-content .kuantiti-input-group .nillai-sub-con {
  justify-content: end;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header {
  justify-content: space-between;
  align-items: center;
  padding: 1% 2.8%;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register {
  padding: 1% 2.8% 1% 1%;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register .path_nav li a {
  color: #c4c4c4;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header.project_register h4 {
  font-size: 1.1rem;
  color: #6e7180;
  font-weight: 600;
  letter-spacing: 0.1rem;
  font-family: Poppins_Regular;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header h4 {
  font-size: 1.1rem;
  color: #6c7280;
  font-weight: 600;
  letter-spacing: 0.1rem;
  font-family: Poppins_Regular;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header .path_nav {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header .path_nav li a {
  text-decoration: none;
  display: block;
  padding: 1rem 0.5rem;
  color: #39afd1;
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header .path_nav li a img.globe {
  margin-right: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header .path_nav li a .arrow_nav {
  transform: rotate(275deg);
  width: 12px;
}
.Mainbody_conatiner .Mainbody_content .Mainbody_content_nav_header .path_nav li a.active {
  color: black;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content {
  width: 95%;
  background-color: #fff;
  margin: auto;
  padding: 1% 1.2%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content.New_Register {
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 2.7%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_left {
  align-items: center;
  gap: 2rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_left h3 {
  font-size: 1.3rem;
  color: #6e7180;
  margin: 0;
  font-weight: 500;
  text-transform: uppercase;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_left .iconer {
  background-color: #fff0d7;
  padding: 0.4rem 0.4rem;
  border: 0.2rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_right {
  gap: 1rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_right button {
  border: none;
  border-radius: 5px;
  padding: 0.4rem 0.8rem;
  color: #fff;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_right button.add_pengguna {
  background-color: #0acf97;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_right button.add_pengguna img {
  padding: 0.37rem;
  margin-right: 0.5rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_content_header .userlist_content_header_right button.printing {
  background-color: #38afd1;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_btn_container {
  display: flex;
  gap: 2.5%;
  padding-left: 2.5%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_btn_container button {
  background-color: transparent;
  border: none;
  text-transform: uppercase;
  color: #1e1e20;
  position: relative;
  font-weight: 600;
  font-size: 1rem;
  padding: 0.6rem 0.3rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_btn_container button.active {
  position: relative;
  color: #39b0d2;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_btn_container button.active::before {
  position: absolute;
  content: "";
  width: 100%;
  bottom: -2px;
  left: 0;
  background-color: #39b0d2;
  border: 2px solid #39b0d2;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder {
  border: 1px solid #dee1e6;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder.data {
  border: none;
  border-top: 2px solid #dee1e6;
  border-bottom: 1px solid #dee1e6;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.7% 0.3% 1.1% 0.3%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_header .no_of_list {
  display: flex;
  gap: 0.8rem;
  align-items: center;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_header .no_of_list p {
  color: #818390;
  margin: 0;
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_header .search {
  width: 14.5%;
  order: 1;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_header .search input {
  height: auto;
  color: #1e1e20;
  box-shadow: none;
  padding: 2.4% 4% 2.4% 18%;
  background-image: url("../images/Icon Cari.png");
  background-repeat: no-repeat;
  background-size: 7%;
  background-position: left 5% top 50%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table {
  margin: 0;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table td,
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table th {
  border-top: 1px solid #dee2e6;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table thead tr th {
  font-size: 0.8rem !important;
  color: #656b9b !important;
  border: none;
  border-top: 1px solid #dee2e6;
  vertical-align: bottom;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table thead tr th .sort {
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table thead tr th.empty {
  width: 40%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr:nth-child(odd) {
  background-color: #f6f7fb;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr td {
  border-top: 1px solid #dee2e6;
  padding: 0.78rem;
  font-size: 0.85rem;
  color: #818390;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr td img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 21%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr td .folder p {
  margin: 0;
  padding-left: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_contents_holder .userlist_tab_content_table tbody tr td .folder img {
  margin: 0;
  width: 19px;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_content_table_footer {
  padding: 1%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_content_table_footer .userlist_table_footer_left {
  font-size: 0.85rem;
  color: #818390;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_content_table_footer .userlist_table_footer_right {
  display: flex;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_content_table_footer .userlist_table_footer_right .userlist_table_pagination button {
  background-color: transparent;
  border: none;
  font-size: 0.9rem;
  padding: 0.2rem 0.85rem;
  border-radius: 50%;
  color: #818390;
  font-weight: 600;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .userlist_tab_container .userlist_tab_content_container .userlist_tab_content .userlist_tab_content_table_footer .userlist_table_footer_right .userlist_table_pagination button.active {
  aspect-ratio: 1/1;
  background-color: #38afd1;
  color: #fff;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container {
  padding-top: 1.2%;
  width: 94%;
  margin: auto;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_btn_container .radio_label {
  font-size: 0.81rem;
  color: #646c9a;
  font-weight: 600;
  letter-spacing: 0.1rem;
  margin-bottom: 1%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_btn_container .r_container {
  filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.19));
  font-family: Poppins_bold;
  margin-bottom: 1.2%;
  padding-left: 30px;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_btn_container .r_container .checkmark {
  top: 4px;
  left: 0;
  height: 15px;
  width: 15px;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_btn_container .r_container .checkmark:after {
  top: 1px;
  left: 1px;
  width: 11px;
  height: 11px;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content {
  margin-top: 2.5%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form label {
  margin: 0;
  font-size: 0.87rem;
  color: #646c9a;
  font-weight: 600;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form input,
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form select {
  border-radius: 0;
  border-color: #e2e5ec;
  font-size: 0.88rem;
  height: auto;
  box-shadow: none;
  padding: 0.5rem 1.2rem;
  color: #797b88;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form select {
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='32' height='32'><path fill='none' d='M0 0h24v24H0z'/><path d='M12 16l-6-6h12z' fill='rgba(126,126,126,1)'/></svg>");
  background-size: 12px;
  background-repeat: no-repeat;
  background-position: right 1rem top 40%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .select_content {
  margin-bottom: 0.5rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_container_row {
  display: flex;
  flex-wrap: wrap;
  gap: 4%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_container_row .input_content {
  width: 48%;
  margin-bottom: 0.5rem;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container {
  display: flex;
  gap: 4%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .input_document_left_content {
  width: 48%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .input_document_left_content .document {
  padding: 3%;
  gap: 3%;
  border: 1px dashed #e2e5ec;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .input_document_left_content .document p {
  margin: 0;
  font-size: 0.88rem;
  color: #89969c;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .input_document_right_content {
  width: 48%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .input_content {
  width: 100%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .upload_file {
  padding: 1% 0;
  text-align: center;
  color: #6c757c;
  border: 1px dashed #e2e5ec;
  cursor: pointer;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .upload_file img {
  width: 4%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .upload_file h5 {
  font-size: 0.65rem;
  margin: 1% 0 1% 0;
  color: #6c757c;
  font-family: Poppins_bold;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .upload_file p {
  font-size: 0.65rem;
  margin-bottom: 0.2rem;
  color: #878e94;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .file_label {
  width: 100%;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .input_document_container .file_type_hidden {
  width: 0;
  height: 0;
  overflow: hidden;
  visibility: hidden;
  position: absolute;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .user_register_form_btn_container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 4% 0 0.5% 0;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .user_register_form_btn_container button {
  border: none;
  margin: 0.6%;
  font-size: 0.8rem;
  color: #fff;
  padding: 0.5%;
  border-radius: 2px;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .user_register_form_btn_container button:nth-child(1) {
  background-color: #fa5d7c;
}
.Mainbody_conatiner .Mainbody_content .userlist_container .userlist_content .user_register_tab_container .user_register_tab_content_container .user_register_tab_content .user_register_form_content form .user_register_form_btn_container button:nth-child(2) {
  background-color: #5b64c3;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container {
  padding: 0 2.8%;
  margin: 0.1%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_btn_contaniner {
  display: flex;
  margin-bottom: 1%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_btn_contaniner .portal_tab_btn_content {
  background-color: #fff;
  padding: 0.4rem;
  display: flex;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_btn_contaniner .portal_tab_btn_content button {
  color: #fff;
  padding: 0.75rem 2rem;
  border: none;
  background-color: transparent;
  color: #38afd1;
  text-transform: uppercase;
  font-size: 0.88rem;
  border-radius: 1.3rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_btn_contaniner .portal_tab_btn_content button img {
  margin-right: 0.8rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_btn_contaniner .portal_tab_btn_content button.active {
  background-color: #38afd1;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  color: #fff;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_btn_contaniner .portal_tab_btn_content button.active img {
  filter: brightness(0) invert(1);
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container {
  padding: 1%;
  background-color: #fff;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .portal_tab_content_header {
  align-items: center;
  gap: 2.85%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .portal_tab_content_header img {
  background-color: #ffefd6;
  padding: 0.3rem 0.6rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .portal_tab_content_header h4 {
  margin: 0;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 1.2rem;
  color: #797b88;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container {
  margin-top: 1%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content {
  width: 50%;
  margin: auto;
  border: 1px solid #d3d7da;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content label {
  color: #636b9a;
  font-size: 0.88rem;
  font-family: Poppins_bold;
  margin-bottom: 3%;
  display: flex;
  align-items: center;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content label p {
  margin: 0;
  margin-right: 0.4rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content label button {
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content label button img {
  width: 80%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder {
  padding: 2.5% 0;
  width: 70%;
  margin: auto;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container {
  margin-bottom: 4%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container input {
  width: 0;
  height: 0;
  visibility: hidden;
  position: absolute;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container .pop_content {
  top: 12%;
  left: 12%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container .pop_content p {
  margin: 0;
  background-color: #d9d9d9;
  color: #585e6e;
  padding: 5% 0.6rem;
  font-size: 0.8rem;
  font-family: Poppins_Regular;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container .upload_logo {
  padding: 3% 0;
  text-align: center;
  color: #6c757c;
  border: 1px dashed #8c979d;
  cursor: pointer;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container .upload_logo h5 {
  font-size: 0.85rem;
  margin: 4% 0 0.6% 0;
  font-family: Poppins_bold;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_form_content .logo_input_holder .logo_input_container .upload_logo p {
  font-size: 0.88rem;
  margin-bottom: 0.2rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_submit_container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.7%;
  padding: 2% 0;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_submit_container button {
  font-size: 0.8rem;
  color: #fff;
  border: none;
  padding: 0.5rem 0.8rem;
  border: 3px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_submit_container button:nth-child(1) {
  background-color: #fa5d7c;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .logo_form_container form .logo_submit_container button:nth-child(2) {
  background-color: #5c62c2;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container {
  margin-top: 3.3%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_btn_container {
  border-bottom: 2px solid #dee1e6;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_btn_container button {
  background-color: transparent;
  border: none;
  color: #39aed1;
  font-size: 1.15rem;
  text-transform: uppercase;
  padding: 0.5rem 2rem;
  position: relative;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_btn_container button.active {
  color: #000;
  font-weight: 600;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_btn_container button.active::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 3px;
  left: 0;
  bottom: -1px;
  background-color: #39aed1;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container {
  width: 78.5%;
  margin: auto;
  padding: 1.8% 0 0.8%;
  gap: 3%;
  display: flex;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .input_radio_container label {
  color: #646c9a;
  margin: 0;
  font-weight: 600;
  font-size: 0.9rem;
  padding-left: 3rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .input_radio_container .checkmark {
  top: 3px;
  height: 15px;
  width: 15px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .input_radio_container .r_container .checkmark:after {
  width: 11px;
  height: 11px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container {
  margin-bottom: 2.5%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container label {
  margin: 0;
  font-size: 0.88rem;
  color: #646c9a;
  font-weight: 600;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container label p {
  margin: 0 0.6rem 0 0;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container label button {
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container label button img {
  width: 80%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container input {
  width: 0;
  height: 0;
  visibility: hidden;
  position: absolute;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container .pop_content {
  top: 12%;
  left: 12%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container .pop_content p {
  margin: 0;
  background-color: #d9d9d9;
  color: #585e6e;
  padding: 5% 0.6rem;
  font-size: 0.7rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container .upload_img {
  padding: 2% 0;
  text-align: center;
  color: #6c757c;
  border: 1px dashed #8c979d;
  cursor: pointer;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container .upload_img img {
  width: 8%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container .upload_img h5 {
  font-size: 0.65rem;
  margin: 1% 0 1% 0;
  font-family: Poppins_bold;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .img_input_container .upload_img p {
  font-size: 0.65rem;
  margin-bottom: 0.2rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .upload_img_Container {
  padding: 2.5% 5% 5% 5%;
  border: 1px solid #d3d7da;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .upload_img_Container textarea {
  height: 30vh;
  margin-top: 2%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .upload_img_Container .input_container {
  margin-bottom: 0.5rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .upload_img_Container .input_container input {
  height: auto;
  font-size: 0.88rem;
  padding: 0.7rem 1rem;
  border-radius: 0;
  border: 1px solid #8b969c;
  color: #6e7180;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .upload_img_Container label {
  margin: 0;
  font-size: 0.88rem;
  color: #646c9a;
  font-weight: 600;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .uploaded_img_preview_container {
  position: relative;
  display: flex;
  align-items: center;
  padding: 2.7% 4.6%;
  gap: 5%;
  border: 1px dashed #8c979d;
  margin-bottom: 2.5%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .uploaded_img_preview_container .uploaded_img_details h5 {
  font-size: 0.9rem;
  margin-bottom: 0.1rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .uploaded_img_preview_container .uploaded_img_details p {
  margin: 0;
  font-size: 0.9rem;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .uploaded_img_preview_container .remove_image {
  top: 5%;
  right: 1.5%;
  position: absolute;
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .kundangan_landing_page_left_content {
  width: 48.5%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kundangan_landing_page_container .kundangan_landing_page_right_content {
  width: 48.5%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .lpage_submit_container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.7%;
  padding: 0% 0 1%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .lpage_submit_container button {
  font-size: 0.8rem;
  color: #fff;
  border: none;
  padding: 0.5% 1%;
  border: 3px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .lpage_submit_container button:nth-child(1) {
  background-color: #fa5d7c;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .lpage_submit_container button:nth-child(2) {
  background-color: #5c62c2;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container {
  padding: 1.6% 1% 1% 1%;
  display: flex;
  gap: 6%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container {
  width: 43%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains {
  margin-bottom: 4.5%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains label {
  margin: 0;
  font-size: 0.89rem;
  color: #646c9a;
  font-weight: 600;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains input {
  height: auto;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains input,
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains textarea {
  padding: 0.79rem 3.5%;
  font-size: 0.88rem;
  border-radius: 0;
  border: 1px solid #8b969c;
  box-shadow: none;
  color: #585e6e;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains textarea {
  height: 8vh;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_left_container .input_contains textarea.iframe {
  height: 15vh;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_right_container {
  width: 50%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_us_container .kandungan_contact_right_container iframe {
  width: 93%;
  height: 93%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_submit_container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.7%;
  padding: 3% 0 0.5%;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_submit_container button {
  font-size: 0.8rem;
  color: #fff;
  border: none;
  padding: 0.5% 1%;
  border: 3px;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_submit_container button:nth-child(1) {
  background-color: #fa5d7c;
}
.Mainbody_conatiner .Mainbody_content .portal_tab_container .portal_tab_content_container .portal_tab_content .kandungan_tab_container .kandungan_tab_content_container .kandungan_tab_content .kandungan_contact_submit_container button:nth-child(2) {
  background-color: #5c62c2;
}
.Mainbody_conatiner .profile_view_parent_container {
  padding: 0 2.8%;
  display: flex;
  width: 100%;
  gap: 2%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container {
  width: 36%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container {
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  padding: 4% 3% 10% 3%;
  background-color: #fff;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_header {
  padding-bottom: 4%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body {
  text-align: center;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body .user_profile_img_container {
  border: 1px solid #e2e5ec;
  width: 21.5%;
  margin: auto;
  aspect-ratio: 1/1;
  padding: 0.8%;
  text-align: center;
  border-radius: 50%;
  position: relative;
  margin-bottom: 1%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body .user_profile_img_container button.cam {
  border: none;
  position: absolute;
  background-color: transparent;
  top: 5%;
  right: 0%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body .user_profile_img_container .user_profile_img {
  display: flex;
  align-items: center;
  justify-content: center;
  aspect-ratio: 1/1;
  border-radius: 50%;
  background-color: #81ace3;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body .user_profile_img_container .user_profile_img p {
  text-transform: uppercase;
  font-family: Poppins_bold;
  font-size: 2.5rem;
  margin: 0;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body h3 {
  font-family: Poppins_bold;
  color: #585e6e;
  font-size: 1rem;
  margin-bottom: 0.5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body button.aktif {
  background-color: #0acf97;
  padding: 1.5% 4%;
  border: none;
  margin-bottom: 9%;
  color: #fff;
  font-size: 0.88rem;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_status_container .user_status_body p {
  margin-bottom: 0.5rem;
  color: #5a5d6e;
  font-size: 0.88rem;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container {
  margin-top: 5%;
  background-color: #fff;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  padding: 3% 3% 10% 3%;
  height: 40%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_header_left img.man_icon {
  background-color: #ffefd6;
  padding: 4% 6%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_header_left h4 {
  margin: 0;
  padding-left: 2.4rem;
  font-weight: 600;
  font-size: 1.2rem;
  color: #5a5d6e;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_header_left button {
  background-color: #0acd95;
  border: none;
  border-radius: 5px;
  font-size: 0.88rem;
  color: #fff;
  padding: 1.5%;
  margin-left: 1.5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_content_container {
  margin-top: 4%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_content_container .user_role_content {
  justify-content: space-between;
  padding: 1%;
  border-top: 1px solid #e2e5ec;
  border-bottom: 1px solid #e2e5ec;
  color: #89969c;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_content_container .user_role_content p {
  margin: 0;
  font-size: 0.88rem;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_left_container .user_role_container .user_role_content_container .user_role_content button {
  background-color: transparent;
  border: none;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container {
  width: 64%;
  background-color: #fff;
  padding: 1.5% 1%;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_header img.man_icon {
  background-color: #ffefd6;
  padding: 4% 6%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_header h4 {
  margin: 0;
  padding-left: 2.4rem;
  font-weight: 600;
  font-size: 1.2rem;
  color: #6c7282;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_header button {
  background-color: #39b0d2;
  border: none;
  padding: 0.4% 1%;
  margin-right: 0.5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content {
  margin-top: 4.5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form {
  padding: 0 0.4%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form label {
  margin: 0;
  font-size: 0.87rem;
  color: #646c9a;
  font-weight: 600;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form input,
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form select {
  border-radius: 0;
  border-color: #e2e5ec;
  font-size: 0.88rem;
  height: auto;
  box-shadow: none;
  padding: 0.5rem 1.2rem;
  color: #797b88;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form select {
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='32' height='32'><path fill='none' d='M0 0h24v24H0z'/><path d='M12 16l-6-6h12z' fill='rgba(126,126,126,1)'/></svg>");
  background-size: 12px;
  background-repeat: no-repeat;
  background-position: right 1rem top 40%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .select_content {
  margin-bottom: 0.5rem;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_container_row {
  display: flex;
  flex-wrap: wrap;
  gap: 5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_container_row .input_content {
  width: 47.5%;
  margin-bottom: 0.5rem;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_document_container {
  display: flex;
  gap: 5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_document_container .input_document_left_content {
  width: 47.5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_document_container .input_document_left_content .document {
  padding: 3%;
  gap: 3%;
  border: 1px dashed #e2e5ec;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_document_container .input_document_left_content .document p {
  margin: 0;
  font-size: 0.88rem;
  color: #89969c;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_document_container .input_document_right_content {
  width: 47.5%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .input_document_container .input_content {
  width: 100%;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .profile_view_form_btn_container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 10% 0 3% 0;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .profile_view_form_btn_container button {
  border: none;
  margin: 0.6%;
  font-size: 0.88rem;
  color: #fff;
  padding: 1%;
  border-radius: 2px;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .profile_view_form_btn_container button:nth-child(1) {
  background-color: #fa5d7c;
}
.Mainbody_conatiner .profile_view_parent_container .profile_view_right_container .profile_view_form_content form .profile_view_form_btn_container button:nth-child(2) {
  background-color: #5b64c3;
}

.user_profile_footer {
  font-size: 0.8rem;
  padding: 1.5% 4.5%;
  border-top: 1px solid #dee2e6;
}

#log_masuk_modal {
  background-color: rgb(0, 0, 0);
}
#log_masuk_modal .log_masuk_modal_dialog {
  max-width: 58%;
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
     object-fit: cover;
  -o-object-position: left;
     object-position: left;
  transition: 0.3s linear;
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
#Forget_modal .forget_modal_dialog {
  max-width: 35%;
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
.login_interface_section #Login_interface_modal .login_interface_modal_dialog {
  max-width: 53%;
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
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container label {
  width: 24%;
  font-size: 0.85rem;
  color: #4a649d;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input {
  width: 85%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input input,
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
  font-size: 0.9rem;
  height: auto;
  padding: 1.5% 3%;
  box-shadow: none;
  border-radius: 0;
  background-color: transparent;
  border-color: #e2e5ec;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_input select {
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='32' height='32'><path fill='none' d='M0 0h24v24H0z'/><path d='M12 16l-6-6h12z' fill='rgba(126,126,126,1)'/></svg>");
  background-size: 2.4%;
  background-repeat: no-repeat;
  background-position: right 3% top 40%;
}
.login_interface_section #Login_interface_modal .login_interface_modal_dialog .login_interface_modal_content .login_interface_modal_body .login_interface_modal_body_content .interface_tab_content_container .login_interface_modal_form .input_container .form_checker {
  display: flex;
  gap: 10%;
  padding-left: 7%;
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
  color: #cbccd1;
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
  padding: 0 5%;
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

.spaced_modal {
  left: 16.8%;
  width: 83.2%;
}

.project_register_form_modal_container #Make_sure_application_modal,
.project_register_form_modal_container #Reference_no_modal,
.project_register_form_modal_container #Cancel_application_modal,
.project_register_form_modal_container #vms_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog {
  max-width: 43%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content {
  padding: 4.5% 4%;
  border-radius: 10px;
  background-color: #fff;
  border: none;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body {
  width: 100%;
  background-color: #fff;
  margin: auto;
  padding: 0;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header {
  display: flex;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header button,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header button,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header button,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_header button {
  background-color: transparent;
  border: none;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content {
  padding: 2%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.success_header,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.success_header,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.success_header,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.success_header {
  margin-bottom: 7%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3 {
  font-size: 1.35rem;
  font-weight: 600;
  text-align: center;
  margin: 4% 0 10% 0;
  color: #464356;
  padding: 0 5%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.vms,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.vms,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.vms,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h3.vms {
  color: #ff3f40;
  font-size: 1.1rem;
  margin-bottom: 2%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h2,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h2,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h2,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content h2 {
  font-family: Poppins_bold;
  text-align: center;
  font-size: 1.8rem;
  padding: 2% 0 3%;
  margin: 0;
  color: #6b6b6b;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content .btn_holder,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content .btn_holder,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content .btn_holder,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content .btn_holder {
  align-items: center;
  justify-content: center;
  gap: 2%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button {
  margin: 2% 0 3% 0;
  background-color: #5b64c3;
  color: #fff;
  border: none;
  border-radius: 0.15rem;
  font-size: 0.8rem;
  padding: 0.6rem 0rem;
  width: 18%;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.red,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.red,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.red,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.red {
  background-color: #dc3745;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.green,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.green,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.green,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.green {
  background-color: #4da84b;
}
.project_register_form_modal_container #Make_sure_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.blue,
.project_register_form_modal_container #Reference_no_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.blue,
.project_register_form_modal_container #Cancel_application_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.blue,
.project_register_form_modal_container #vms_modal .project_register_form_modal_dialog .project_register_form_modal_content .project_register_form_modal_body .project_register_form_modal_body_Content button.fix_button.blue {
  background-color: #1a7df4;
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
  top: 2px;
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

#userlist_table_info {
  font-size: 0.85rem;
  color: #818390;
}

#userlist_table_paginate {
  display: flex;
}
#userlist_table_paginate a {
  text-decoration: none;
  font-size: 0.88rem;
  color: #818390;
  display: inline-block;
  padding: 0.5rem 1rem;
  cursor: pointer;
  border-radius: 0.4rem;
}
#userlist_table_paginate span {
  display: flex;
  align-items: center;
}
#userlist_table_paginate span a {
  background-color: transparent;
  border: none;
  font-size: 0.9rem;
  width: 2rem;
  height: 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-weight: 600;
  text-align: center;
}
#userlist_table_paginate span a:hover {
  color: #38afd1;
}
#userlist_table_paginate span a.current {
  background-color: #38afd1;
  color: #fff;
}

.dataTables_length label {
  color: #818390;
  margin: 0;
  font-size: 0.9rem;
}
.dataTables_length label select {
  border-radius: 0.4rem;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  border: 1px solid #ced4da;
  margin: 0 0.6rem;
}

#userlist_table_filter label {
  display: none;
}

.Tambah_modal_container #Tambah_data_modal {
  background-color: rgba(0, 0, 0, 0.2);
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog {
  max-width: 55%;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_header {
  padding: 2% 0;
  width: 95%;
  margin: auto;
  border-bottom: 1px solid #ced4da;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_header h5 {
  font-size: 0.89rem;
  font-family: Poppins_bold;
  margin: 0;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_header button {
  background-color: transparent;
  border: none;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body {
  padding: 1% 4%;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body p.box {
  background-color: #f9f8fd;
  color: #8c8e9b;
  font-size: 0.8rem;
  padding: 4% 6%;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form label {
  font-size: 0.8rem;
  color: #757ca5;
  font-weight: 600;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form input,
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form select {
  height: auto;
  padding: 0.6rem 1rem;
  font-size: 0.88rem;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form textarea {
  height: 5rem;
  border-bottom-right-radius: 0;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table thead {
  background-color: #39aed1;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table thead th,
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table thead tr {
  border: none;
  color: #fff;
  font-size: 0.8rem;
  text-align: center;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table tbody tr {
  border: 1px solid #ced4da;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table tbody td {
  padding: 0.4rem 0;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table tbody .form-group {
  margin: 0;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body form .tambah_table_container table tbody input {
  width: 35%;
  box-shadow: none;
  margin: auto;
  padding: 0.3rem 0.7em;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body .Tambah_modal_footer {
  margin: 3% 0 3% 0;
}
.Tambah_modal_container #Tambah_data_modal .Tambah_modal_dialog .Tambah_modal_content .Tambah_modal_body .Tambah_modal_footer button {
  color: #fff;
  background-color: #1a7df4;
  border: none;
  font-size: 0.8rem;
  padding: 1% 3%;
  border-radius: 0.2rem;
}

/* ----------negeri indicator styles--------------- */

.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri {
  width: 22%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri h5 {
  font-size: 0.75rem;
  background-color: #4bcfc7;
  padding: 2%;
  text-align: center;
  height: 100%;
  width: 100%;
  display: flex;
  color: #fff;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri h4 {
  padding: 5%;
  font-size: 0.8rem;
  font-family: Poppins_bold;
  color: #fff;
  width: 60%;
  text-align: center;
  text-transform: uppercase;
  background-color: #6c757d;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri {
  width: 100%;
  margin-top: 4%;
  padding: 7%;
  border: 1px dashed #d6d6d6;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.box_content_negeri_negeri {
  width: 100%;
  margin-top: 2%;
  padding: 4%;
  border: 1px dashed #d6d6d6;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.box_content_negeri_negeri::before {
  width: 16px;
  content: " ";
  background-image: url({{ asset('assets/images/Arrow_10.png') }});
  background-position: left;
  background-size: 16px;
  background-repeat: no-repeat;
  position: absolute;
  right: -10%;
  top: 30%;
  height: 20px;
}
.dotted_arrow{
  height: 2%;
  background-repeat: no-repeat;
  position: absolute;
}
.box_content_negeri_negeri.end::before {
  transform: rotate(-180deg);
  left: -14%;
  top: 30%;
  height: 20px;
}
.box_content_negeri_negeri.bend::before {
  transform: rotate(90deg);
  left: 47%;
  top: 120%;
  height: 20px;
}
.box_content_negeri_negeri p {
  margin: 0;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  background-color: #eeeeee;
  font-size: 0.7rem;
  padding: 3%;
  
}
.box_content_negeri_negeri p.yellow {
  background-color: #fcf0b3;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri::before {
  width: 16px;
  content: " ";
  background-image: url({{ asset('assets/images/Arrow_10.png') }});
  background-position: left;
  background-size: 16px;
  background-repeat: no-repeat;
  position: absolute;
  right: -10%;
  top: 30%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri.end::before {
  transform: rotate(-180deg);
  left: -14%;
  top: 30%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri.bend::before {
  transform: rotate(90deg);
  left: 47%;
  top: 120%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri p {
  margin: 0;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  background-color: #eeeeee;
  font-size: 0.7rem;
  padding: 5%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri p.yellow {
  background-color: #fcf0b3;
}
/* ----------- bahagian indicator start ------------ */

.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri {
  width: 22%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri h5 {
  font-size: 0.75rem;
  background-color: #4bcfc7;
  padding: 2%;
  text-align: center;
  height: 100%;
  width: 100%;
  display: flex;
  color: #fff;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri h4 {
  padding: 3%;
  font-size: 0.8rem;
  font-family: Poppins_bold;
  color: #fff;
  width: 60%;
  text-align: center;
  text-transform: uppercase;
  background-color: #6c757d;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri {
  width: 100%;
  margin-top: 4%;
  padding: 7%;
  border: 1px dashed #d6d6d6;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.box_content_negeri_bahagian {
  width: 100%;
  margin-top: 1%;
  padding: 2%;
  border: 1px dashed #d6d6d6;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.box_content_negeri_bahagian::before {
  width: 16px;
  content: " ";
  background-image: url({{ asset('assets/images/Arrow_10.png') }});
  background-position: left;
  background-size: 16px;
  background-repeat: no-repeat;
  position: absolute;
  right: -10%;
  top: 30%;
  height: 20px;
}
.dotted_arrow{
  height: 2%;
  background-repeat: no-repeat;
  position: absolute;
}
.box_content_negeri_bahagian.end::before {
  transform: rotate(-180deg);
  left: -14%;
  top: 30%;
  height: 20px;
}
.box_content_negeri_bahagian.bend::before {
  transform: rotate(90deg);
  left: 47%;
  top: 120%;
  height: 20px;
}
.box_content_negeri_bahagian p {
  margin: 0;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  background-color: #eeeeee;
  font-size: 0.7rem;
  padding: 2%;
  
}
.box_content_negeri_bahagian p.yellow {
  background-color: #fcf0b3;
}

.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri::before {
  width: 16px;
  content: " ";
  background-image: url({{ asset('assets/images/Arrow_10.png') }});
  background-position: left;
  background-size: 16px;
  background-repeat: no-repeat;
  position: absolute;
  right: -10%;
  top: 30%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri.end::before {
  transform: rotate(-180deg);
  left: -14%;
  top: 30%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri.bend::before {
  transform: rotate(90deg);
  left: 47%;
  top: 120%;
  height: 20px;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri p {
  margin: 0;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  background-color: #eeeeee;
  font-size: 0.7rem;
  padding: 5%;
}
.Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .rmk_flow_Chart .rmk_flow_Chart_container .rmk_flow_Chart_content_negeri .box_content_negeri p.yellow {
  background-color: #fcf0b3;
}
/* --------------- bahagian indicator end -------------- */

/* 2023 March 09 by Nabilah */
@media (max-width: 820px) {
  .Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_content_footer button {
    padding: 1% 1.5%;
    border: none;
    color: #fff;
    font-size: 0.8rem;
    border-radius: 0.15rem;
    width: 100%;
  }

  .creativity_info {
    right: 20%;
  }

  .add_justify {
    justify-content: space-between;
    padding-bottom: 0.25rem;
  }
  .info_justify{
    justify-content: space-between;
  }

}
  .submit-button {
    width: 30%;
    margin: 5px;
  }

  .list-items {
    display: inline-flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
  }

  .nav-scale {
      transform: scale(1) !important;
  }

  .Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_btn_container ul li h4 {
    font-size: 0.8rem;
  }

  .Mainbody_conatiner .Mainbody_content .project_register_tab_container .project_register_tab_content_container .brief_project_container .brief_project_content_container .input_container .input_fill_content label {
    margin: 0;
    width: 100%;
    margin-bottom: 0.5rem;
  }
  .minus_justify {
    justify-content: end;
    margin-right: -2px;
  }
  /* End by Nabilah */

  /* 2023 March 20 by Nabilah */
  @media (max-width: 820px) {
    .custom_pop,
    .custom_pop_2 {
      width: 180px !important;
      padding: 10px;
      text-align: center;
      z-index: 1;
      position: absolute;
      background: #eeeeee;
      right: 15%;
      top: 10px;
    }
  }

  @media (min-width: 821px) {
    .custom_pop{
      width: 180px !important;
      padding: 10px;
      text-align: center;
      z-index: 1;
      position: absolute;
      background: #eeeeee;
      left: 80%;
      top: 10px;
    }
    .custom_pop_2{
      width: 180px !important;
      padding: 10px;
      text-align: center;
      z-index: 1;
      position: absolute;
      background: #eeeeee;
      left: 50%;
      top: 10px;
    }
  }
</style>