	$(document).ready(function() {
		$('#create-form').on('submit', function(e) {
			for ( instance in CKEDITOR.instances ) {
        		CKEDITOR.instances[instance].updateElement();
    		}
			

			e.preventDefault();
			var error = false;
			var title= $('#title').val();
			var image= $('#image').val();
			var content = $("#form-ckeditor").val();
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
			
			if (content.value == "") {
				error = true;
				$('#content_error').show().fadeOut(9000);
			}
			
			if (category_id == 0) {
				error = true;
				$('#category_error').show().fadeOut(9000);
			}
			
			if (!$('input[name="keywords[]"]:checked').length) {
				/*error = true;
				$('#keywords_error').show().fadeOut(9000);*/
				error = true;
				$('#keywords_error').show().fadeOut(9000);
			}

			if (error == false) {
		        $.ajax({
		        	header: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
		            type: "POST",
					url: create_url,
					contentType: false,
					cache: false,
					processData: false,
					cache: false,
		            data: new FormData($("#create-form")[0]),
		            success: function(data) {
		              // perform redirect
		              window.location.href = articles_url;

		            },
		            error: function(data){
		            	alert('No ok');
	        		}
		        });
	      	}
	        return false;
		});

		$('[class^=edit]').on('click', function(e) {
			e.preventDefault();

			for ( instance in CKEDITOR.instances ) {
        		CKEDITOR.instances[instance].updateElement();
    		}

			var error       = false;
			var data_id 	= $('.article_id');
			var id          = $(this).attr('id');
			var form        = $('#task'+id);
			console.log(id);
			$.ajax({
				header: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
				type: 'POST',
				url: edit_url+'_'+id,
				contentType: false,
				cache: false,
				processData: false,
				data:  new FormData(form[0]),
				success: function(data) {
				
					console.log(data);
					console.log(id);
					$('#task'+data['id']+' .title').text(data['title']);
					$('#task'+data['id']+' .image').attr('src', index+'/'+data['thumb_img']);
					$('#task'+data['id']+' .content').html(data['content']);
					$('#task'+data['id']+' .category_id').text(data['category_id']);
					/*
					//$('#task'+data['id']+' .title').text(data['title']);
					//$('#task'+data['id']+' .title').text(data['title']);
					
					var task = "<tr id='task"+data.id+"'><td class='title'>"+data.title+"</td>"+
                       "<td><img src='"+data.thumb_img+"' class='image' alt=''/></td>"+
                        "<td class='content'>"+data.content+"</td>"+
                        "<td class='category_id'>"+data.category_id+"</td>"+
                        "<td>"+
                            "<div class='btn-group'>"+
                                "<a href='{!! route('articles.show', [$article->id) !!}' class='btn btn-default btn-xs '><i class='glyphicon glyphicon-eye-open'></i></a>"+
                                "<a data-toggle='modal' data-target='#myModal_"+data.id+"' data-keywords="+data.keywords+"><i class='glyphicon glyphicon-edit'></i></a>"+
                                "<a href='{{!! route('articles.destroy', [$article->id]) !!}}' class='btn btn-danger btn-xs' onclick='return confirm('Are you sure?');'><i class='glyphicon glyphicon-trash'></i></a>"+
                            "</div>"+         
                        "</td>"+
                    "</tr>";*/
                    /*console.log(task);
                    var table = $('#task'+data.id).replaceWith(task);
                    /*var table = $('#task'+data.id).DataTable ({
                    	ajax: task
                    });*/
                    console.log('success');
					
				},		
				error: function(data){
					console.log(data['content']);
		            alert($('#title_edit').val());
	        	}
			});
		})
	});