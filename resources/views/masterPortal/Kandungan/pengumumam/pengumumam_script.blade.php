<script>
  function loadData(data) {    
    axios({
        method: 'get',
        url: "{{ env('API_URL') }}"+"api/portal/pengumuman/" + data,
        responseType: 'json'        
        })
        .then(function (response) {
          
          $('#peng_img_src').empty();
            document.getElementById("upload_logo_pengum").style.display = 'none';
            document.getElementById("image_preview_pengum").style.display = 'block';
            data = response.data.data;
            console.log("abc")
            console.log(data)
            var id = data.id
            var tajuk = data.tajuk
            var sub_tajuk = data.sub_tajuk
            var keterangan = data.keterangan
            var tarikh =  data.tarikh
            const today = new Date(tarikh);
            const yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            var formattedTarikh = yyyy + '-' + mm + '-' + dd;
            
            if(data.media.length > 0) {
                var mediaUrl = data.media[0].original_url
                $('#Logo_img_pengum').attr('src', data.media[0].original_url);
                $('#peng_img_src').attr('src', data.media[0].original_url);

                // template ='<img src="" id="pengumuman_src" width="200" height="200">'
                // $('#peng_img_src').append(template);
                // $('#pengumuman_src').attr('src', mediaUrl);
                //$('#pengumuman_src').val(mediaUrl)
            }

            CKEDITOR.instances['pengumuman_keterangan'].setData(data.keterangan)
            $('#id').val(id)  
            $('#tajuk').val(tajuk)            
            $('#sub_tajuk').val(sub_tajuk)            
            //$('#keterangan').val(keterangan)            
            $('#tarikh').val(formattedTarikh)
          $('#add_selenggara_data_modal').modal('show');            
        })   
  }

  function submitPengumumanForm(){        
        var formEl = document.forms.pengumumanForm;
        var formData = new FormData(formEl);
        console.log($('#pengumuman_image').prop('files'))
        var myfile = $('#pengumuman_image').prop('files')[0];
        console.log(myfile)
        formData.append('tajuk', $('#tajuk').val())
        formData.append('sub_tajuk', $('#sub_tajuk').val())
        formData.append('tarikh', $('#tarikh').val())
        formData.append('pengumuman_image', myfile)
        formData.append('user_id', {{Auth::user()->id}})
        formData.append('keterangan', CKEDITOR.instances['pengumuman_keterangan'].getData())
        id = formData.get('id')
        
          axios({
          method: 'post',
          url: api_url+"api/portal/pengumuman",
          responseType: 'json',
          data: formData
          })
          .then(function (response) {
              console.log(response)
              if(response.data.code == 200){
                     $("#add_selenggara_data_modal").modal('hide');
                    $("#add_role_sucess_modal").modal('show');

                  }else {
                    $("#add_selenggara_data_modal").modal('hide');
                    $("#sucess_modal").modal('show');
                  }
              //location.reload()
          })   
        
        console.log('form submitted')

            
    }
        </script>