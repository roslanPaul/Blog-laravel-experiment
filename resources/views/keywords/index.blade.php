@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Articles</h1>
    <h1 class="pull-right">
     <a class="btn btn-primary pull-right" id="add" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('keywords.create') !!}">Add New</a>
     <!-- !!}"-->
 </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-responsive" id="keywords-table">
                <thead>
                    <tr>
                        <th>Word</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keywords as $keyword)
                    <tr id="task{{ $keyword->id }}">
                        <td class="word">{!! $keyword->word !!}</td>
                        <td>
                           
                            <div class='btn-group'>
                                <a href="{!! route('keywords.show', [$keyword->id]) !!}" class='btn btn-default btn-xs '><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a data-toggle="modal"   data-target="#editModal{{ $keyword->id }}" data-id="{{ $keyword->id }}" class="edit-modal"><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['keywords.destroy', $keyword->id], 'style'=>'display:inline'])!!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger', 'onclick' => "return confirm('Are you sure?');"]) !!}
                                {!! Form::close() !!}
                                 
                            </div>
                           
                        </td>
                        <td>
                            <script>
                            var edit_url ="{{ route('keywords.update', [$keyword->id]) }}";
                            var index_url ="{{ route('keywords.index') }}";
                            var _token = "{{ csrf_token() }}";            
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <!-- Modal -->
                        @include('keywords.edit') 
                    </tr>
                @endforeach
        </tbody>

    </table>
               
</div>
</div>

</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> 
@foreach($keywords as $keyword)
    <script>
        CKEDITOR.replace( 'form-ckeditor_{{$keyword->id}}' );
    </script>
@endforeach

@endsection



