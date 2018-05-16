<div class="modal fade" id="editModal{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"> 
          <form class="form-horizontal" id="task{{ $article->id }}" role="form" enctype='multipart/form-data'>
            <input name="_method" type="hidden" value="PUT">
            <input name="id" class="article_id" id="id_edit{{ $article->id }}" data-id="{{ $article->id }}" type="hidden" value="{{ $article->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title :</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title_edit" value="{{ $article->title }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Image :</label>
                <div class="col-sm-10">
                    <input name="image" type="file" class="form-control" id="image_edit"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="content">Content:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" id="form-ckeditor_{{ $article->id }}" cols="40" rows="5">{!! $article->content !!}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="keywords">Keywords :</label>
                <div class="col-sm-10">
                        @foreach ($keywords as $keyword)
                            <input type="checkbox" name="keywords[]" class="keywords" id="keyword"  value="{{$keyword->id}}"   {{ in_array($keyword->id, (array)$article->keywords) ? true : false }} >
                            <span>{{ $keyword->word }} </span>
                        @endforeach
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="category">Category :</label>
                <select name="category_id" id='category_id_edit' class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? "selected" : ":" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        
        <div class="modal-footer">
            <button id="{{$article->id}}" type="button" class="btn btn-primary edit_{{ $article->id }}" data-dismiss="modal">
                <span class='glyphicon glyphicon-check'></span> {{$article->id}}Edit
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
            </button>
        </div>
    </div>
</div>
</div>
</div>
