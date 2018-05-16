@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Articles</h1>
    <h1 class="pull-right">
     <a class="btn btn-primary pull-right" id="add" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('articles.create') !!}">Add New</a>
     <!-- !!}"-->
 </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-responsive" id="articles-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Thumb Img</th>
                        <th>Content</th>
                        <th>Category Id</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr id="task{{ $article->id }}">
                        <td class="title">{!! $article->title !!}</td>
                        <td><img src="{{ asset($article->thumb_img) }}" class="image" alt=""/></td>
                        <td class="content">{!! $article->content !!}</td>
                        <td class="category_id">{!! $article->category_id !!}</td>
                        <td>
                           
                            <div class='btn-group'>
                                <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs '><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a data-toggle="modal"  data-keywords="{{ $article->keywords }}" data-target="#editModal{{ $article->id }}" data-id="{{ $article->id }}" class="edit-modal"><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id], 'style'=>'display:inline'])!!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger', 'onclick' => "return confirm('Are you sure?');"]) !!}
                                {!! Form::close() !!}
                                 
                            </div>
                           
                        </td>
                        <td>
                            <script>
                            var edit_url_{{ $article->id }} ="{{ route('articles.update', [$article->id]) }}";
                            var index_url ="{{ route('articles.index') }}";
                            var _token = "{{ csrf_token() }}";
                            var index = "{{ route('index') }}";   
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <!-- Modal -->
                        @include('articles.edit') 
                    </tr>
                @endforeach
        </tbody>

    </table>
               
</div>
</div>

</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> 
@foreach($articles as $article)
    <script>
        CKEDITOR.replace( 'form-ckeditor_{{$article->id}}' );
    </script>
@endforeach

@endsection



