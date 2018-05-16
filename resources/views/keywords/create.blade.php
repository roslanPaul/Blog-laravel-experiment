@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keyword
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <form class="keyword-form" id="create-form" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <!-- Word Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('word', 'Word:') !!}
                            {!! Form::text('word', null, ['class' => 'form-control', 'id' => 'word']) !!}
                            <div id='word_error' class='alert alert-danger text-center' style='display:none;'>Ce champ est requis.</div>
                        </div>
                        
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <input type="submit" id="save-create" class="btn btn-primary create" value="Save">
                            <input type="hidden" id="fid" name="fid" value="1">
                            <a href="{!! route('keywords.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                        
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var create_url = "{{ route('keywords.store') }}";
        var keywords_url = "{{ route('keywords.index') }}";
        var _token = "{{ csrf_token() }}";
    </script>
    <script>
        CKEDITOR.replace( 'form-ckeditor}}' );
    </script>
@endsection
