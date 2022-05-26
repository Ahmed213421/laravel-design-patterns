@extends('admin.master')

@section('content')
    
<div class="container">
    <h1>create post</h1>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">name</label>
                <input type="name" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="">select category</label><br>
                <select name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>            
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">select tags</label><br>
                <select name="tag_id[]" id="" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">create</button>
        </div>
    </form>
</div>
@endsection
