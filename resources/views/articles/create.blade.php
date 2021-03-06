@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Article
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <form class="article-form" id="create-form" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
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
                            {!! Form::textarea('content', null, array('class' => 'form-control contentText', 'id' => 'form-ckeditor')) !!}
                            <div id='content_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                           
                        </div>


                        
                        <!-- Keyword Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('keyword', 'Keyword:') !!}
                            @foreach ($keywords as $keyword)
                                {!! Form::checkbox('keywords[]', $keyword->id, false, ['class' => 'keywords', 'id'=>'keywords_'.$keyword->id]) !!}
                                <span>{{ $keyword->word }}</span>
                            @endforeach
                            <div id='keywords_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                        </div>
                        
                        <!-- Category Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('category', 'Category : ') !!}
                            <div>
                            <select name="category_id" id='category_id' class="form-control">
                                
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div id='category_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                        </div>
                        
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <input type="submit" id="save-create" class="btn btn-primary create" value="Save">
                            <input type="hidden" id="fid" name="fid" value="1">
                            <a href="{!! route('articles.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                        
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var create_url = "{{ route('articles.store') }}";
        var articles_url = "{{ route('articles.index') }}";
        var _token = "{{ csrf_token() }}";
    </script>
    <script>
        CKEDITOR.replace( 'form-ckeditor}}' );
    </script>
@endsection
