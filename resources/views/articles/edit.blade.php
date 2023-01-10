@extends('layout.app')


@section('title')
    Edit Article

@endsection


@section('page-header')

    Edit Article
@endsection
@section('content')
    <div class="col-xl-12 mb-30">

        <div class="card-body">


            @if ($errors->any())
                {{--                        <div class="alert alert-danger">--}}
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{route('article.update' , $article->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{$article->title}}">
            </div>


            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control"
                       value="{{$article->description}}">
            </div>

            <div class="form-group" >
                <label>Image</label>
                <input type="file" name="image" accept="image/*" class="form-control image">
            </div>
            <div class="form-group" >
                <img src="{{asset('uploads/' . $article->image)}}" style="width: 100px" class="img-thumbnail image-preview">
            </div>

            <div class="form-group">
                <label>Body</label>
                <textarea type="text" name="body" class="form-control ckeditor"
                          >{{$article->body}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i
                        class="fa fa-plus"></i> Update</button>
            </div>
        </form>
        </div>
    </div>



@endsection
