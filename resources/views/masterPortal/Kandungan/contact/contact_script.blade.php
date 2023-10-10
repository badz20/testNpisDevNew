<script>
    function submitContact(){
        console.log('contact submitted')
        console.log('contact form submitted');
        
            var formEl = document.forms.contactForm;
            var formData = new FormData(formEl);
            formData.append('user_id', {{Auth::user()->id}})
            
            axios({
              method: 'post',
              url: api_url+"api/portal/contact",
              responseType: 'json',
              data: formData
              })
              .then(function (response) { 
                  console.log(response)
                  if(response.data.code == 200){
                    // $("#success_data_modal").modal('show');
                    $("#add_role_sucess_modal").modal('show');

                  }else {
                    $("#sucess_modal").modal('show');
                  }
                  //location.reload()
              })
    }

    function resetFooter(){
            console.log('contact form reset');            
            $('#phone_no').val('')
            $('#email').val('')
            $('#address').val('')
            // $('#mapCode').val('')
            // $('#map_container').empty();            
      }

    function updateMap(){
        console.log('update map')
        // var map = $("#mapCode").val()        
        // $('#map_container').append(map);
    }
</script>

<script>        
      $(document).ready(function () {   
        axios({
              method: 'get',
              url: api_url+"api/portal/contact",
              responseType: 'json',              
              })
              .then(function (response) { 
                  console.log(JSON.parse(response.data.data.json_values))
                  var data = JSON.parse(response.data.data.json_values)
                  $('#phone_no').val(data.phone_no)
                  $('#email').val(data.email)
                  $('#address').val(data.address)
                  // $('#mapCode').val(data.mapCode)
                  // $('#map_container').append(data.mapCode);
                  //location.reload()
              })
      })
</script>      