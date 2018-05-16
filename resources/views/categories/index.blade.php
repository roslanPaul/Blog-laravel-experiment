@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Articles</h1>
    <h1 class="pull-right">
     <a class="btn btn-primary pull-right" id="add" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('categories.create') !!}">Add New</a>
     <!-- !!}"-->
 </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-responsive" id="categories-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr id="task{{ $category->id }}"><p>{{ $category->id  }}</p>
                        <td class="name">{!! $category->name !!}</td>
                        <td class="description" id="description">{!! $category->description !!}</td>
                        <td>
                           
                            <div class='btn-group'>
                                <a href="{!! route('categories.show', [$category->id]) !!}" class='btn btn-default btn-xs '><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a data-toggle="modal" data-target="#editModal{{ $category->id }}" data-id="{{ $category->id }}" class="edit-modal"><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id], 'style'=>'display:inline'])!!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger', 'onclick' => "return confirm('Are you sure?');"]) !!}
                                {!! Form::close() !!}
                                 
                            </div>
                           
                        </td>
                        <td>
                            <script>
                            var edit_url ="{{ route('categories.update', [$category->id]) }}";
                            var index_url ="{{ route('categories.index') }}";
                            var _token = "{{ csrf_token() }}";            
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <!-- Modal -->
                        @include('categories.edit') 
                    </tr>
                @endforeach
        </tbody>

    </table>
               
</div>
</div>

</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> 
@foreach($categories as $category)
    <script>
        CKEDITOR.replace( 'form-ckeditor_{{$category->id}}' );
    </script>
@endforeach

@endsection



