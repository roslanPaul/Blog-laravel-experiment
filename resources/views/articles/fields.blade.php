<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
    <div id='title_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
    <div id='image_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', ['class' => 'form-control', 'id' => 'form-ckeditor']) !!}
    <div id='content_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
</div>

<!-- Keyword Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keyword', 'Keyword:') !!}
    @foreach ($keywords as $keyword)
        {!! Form::checkbox('keywords[]', $keyword->id, false, ['class' => 'keywords']) !!}
        <span>{{ $keyword->word }}</span>
    @endforeach
    <div id='keywords_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category : ') !!}
    <div><select name="category_id" id='category_id' class="form-control">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select></div>
   <div id='category_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'save-form']) !!}
    <a href="{!! route('articles.index') !!}" class="btn btn-default">Cancel</a>
</div>
