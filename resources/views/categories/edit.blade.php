<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"> 
          <form class="form-horizontal" id="task{{ $category->id }}" role="form" action="{{ route('categories.update', [$category->id])}}" enctype='multipart/form-data'>
            <input name="_method" type="hidden" value="PUT">
            <input name="id" id="id_edit" type="hidden" value="{{ $category->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="title_edit" value="{{ $category->title }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description_edit" value="{{ $category->description }}">
                </div>
            </div>
        </form>
        
        <div class="modal-footer">
            <button id="{{ $category->id }}" type="button" class="btn btn-primary edit" data-dismiss="modal">
                <span class='glyphicon glyphicon-check'></span> Edit
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
            </button>
        </div>
    </div>
</div>
</div>
</div>

