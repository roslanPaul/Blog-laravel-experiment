<table class="table table-responsive" id="articles-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Thumb Img</th>
            <th>Content</th>
            <th>Category Id</th>
            <th colspan="3">Action</th>
        </tr>
        {{ crsf_field()}}
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td>{!! $article->title !!}</td>
            <td><img src='{{ asset($article->thumb_img) }}' alt=""/></td>
            <td>{!! $article->content !!}</td>
            <td>{!! $article->category_id !!}</td>
            <td>
                {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete', 'id' => 'ajax-form']) !!}
                <div class='btn-group'>
                    <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs edit'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>