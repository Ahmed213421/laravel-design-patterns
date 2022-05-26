@extends('admin.master')

@section('content')
<div class="container">
    <h1>edit post</h1>
    <form action="{{route('posts.update',$post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="title" name="title" value="{{$post->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">name</label>
                <input type="name" name="name" value="{{$post->name}}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">tags</label>
                <select name="tag_id[]" id="" multiple>
                    @foreach ($post->tags as $item)
                        <option value="{{$item->id}}" disabled>{{$item->name}}</option>
                    @endforeach
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection