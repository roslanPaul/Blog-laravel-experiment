<table class="table table-responsive" id="keywords-table">
    <thead>
        <tr>
            <th>Word</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($keywords as $keyword)
        <tr>
            <td>{!! $keyword->word !!}</td>
            <td>
                {!! Form::open(['route' => ['keywords.destroy', $keyword->id], 'method' => 'delete', 'id' => 'ajax-form']) !!}
                <div class='btn-group'>
                    <a href="{!! route('keywords.show', [$keyword->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('keywords.edit', [$keyword->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'id' => 'save-form', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>