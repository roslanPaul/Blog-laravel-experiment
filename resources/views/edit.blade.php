<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h4 class="modal-title"></h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">Title :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title_edit" value="{{ $article->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">Image :</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image_edit" value="{{ $article->thumb_img }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="content">Content:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="form-ckeditor" cols="40" rows="5" value="{{ $article->content }}"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="keywords">Keywords :</label>
                    <div class="col-sm-10">
                    	@foreach ($keywords as $keyword)
               				<input type="checkbox" class="keywords" id="keywords_edit">
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="category">Category :</label>
                   	<select name="category_id" id='category_id' class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                    <span class='glyphicon glyphicon-check'></span> Edit
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
		</div>
	</div>
</div>