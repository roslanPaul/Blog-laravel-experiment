<!-- Word Field -->
<div class="form-group col-sm-6">
    {!! Form::label('word', 'Word:') !!}
    {!! Form::text('word', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keywords.index') !!}" class="btn btn-default">Cancel</a>
</div>
