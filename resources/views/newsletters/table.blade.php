<table class="table table-responsive" id="newsletters-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($newsletters as $newsletter)
        <tr>
            <td>{!! $newsletter->name !!}</td>
            <td>{!! $newsletter->surname !!}</td>
            <td>{!! $newsletter->email !!}</td>
            <td>
                {!! Form::open(['route' => ['newsletters.destroy', $newsletter->id], 'method' => 'delete', 'id' => 'ajax-form']) !!}
                <div class='btn-group'>
                    <a href="{!! route('newsletters.show', [$newsletter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('newsletters.edit', [$newsletter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'id' => 'save-form', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>