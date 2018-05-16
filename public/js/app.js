
$(document).ready(function() {
    $('#add').click(function () {
        $('#save-form').val('add');
        window.location.href({{route('articles.create')}})
    });

    $('body').on('click', 'button.delete', function() {
      var fid = $(this).val();
      // display url
      console.log('delete url:'+create_url+fid);
      $.ajax({
        type: 'DELETE',
        url: create_url+'/'+fid,
        success: function(data) {
          console.log(data);
          $('#ajax-form'+fid).remove();
          toastr.success('Suppression reussie');
        },
        error: function (data, json, errorThrown) {
          console.log(data);
          var errors = data.responseJSON;
          var errorsHtml = '';
          $.each(errors, function(key, value) {
            errorsHtml += '<li>' + value[0] + '</li>';
          });
          toastr.errror(errorsHtml, "Error" + data.status + ': '+ errorThrown);
        }
      });
    });

    $('body').on('click', 'button.edit', function() {
      $('#save-form').val('update');
      var fid = $(this).val();
      $('#fid').val(fid);
      console.log('edit url:'+create_url+fid);
      $.get(create_url+'/'+fid, function (data) {
        console.log(create_url+fid);
        console.log(data);
        $('#title').val(data.name);
        $('#content').val(data.content);
      });
    });


    $("#save-form").click(function(e) {

      e.preventDefault();
      var error = false;

      if ($('#save-form').val() == 'add') {
        furl = create_url;
        var type = 'POST';
      }
      else {
        furl = create_url + '/' + $('#fid').val();
        var type = "PUT";
      }
      /*
      var data = {
        title: $('#title').val();
        image: $('#image').val();
        content: $('#content').val();
        category_id: $('#category_id').val();
        keywords: $('#keywords').val();
      };*/
      
      var title= $('#title').val();
      var image= $('#image').val();
      var content= $('#content').val();
      var category_id= $('#category_id').val();
      var keywords= $('#keywords').val();

      if (title.length == 0) {
        error = true;
        $('#title_error').show().fadeOut(9000);
      }

      if (image.length == 0) {
        error = true;
        $('#image_error').show().fadeOut(9000);
      }

      if (content.length == 0) {
        error = true;
        $('#content_error').show().fadeOut(9000);
      }

      if (category_id == 0) {
        error = true;
        $('#category_error').show().fadeOut(9000);
      }

      if (keywords.length == 0) {
        error = true;
        $('#keywords_error').show().fadeOut(9000);
      }
      /*
      if (data.hasOwnProperty('title')) {
                error = true;
                $('#title_error').show().fadeOut(9000);
              }
               if (data.hasOwnProperty('image')) {
                error = true;
                $('#image_error').show().fadeOut(9000);
              }
               if (data.hasOwnProperty('content')) {
                error = true;
                $('#content_error').show().fadeOut(9000);
              }
               if (data.hasOwnProperty('category')) {
                error = true;
                $('#category_error').show().fadeOut(9000);
              }
               if (data.hasOwnProperty('keywords')) {
                error = true;
                $('#keywords_error').show().fadeOut(9000);
              }
              */
      console.log('save url:'+furl);
      

       	 	
   		if (error == false) {
        $.ajax({
        	  header: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            type: type,
            url: furl,
            data: new FormData($("#article-form")[0]),
            success: function(data) {
              // perform redirect
              console.log('Success');
            }
        });

      }
        return false;
    });
});
