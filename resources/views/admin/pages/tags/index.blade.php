@extends('admin.master')

@section('content')

<div class="container">
    <div class="callout callout-info">
        <h5>all tags</h5>
        <p></p>
        @foreach ($tags as $tag)
            <a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a><br>
            <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
                @csrf
                @method("DELETE")
                 <button type="submit" class="btn btn-primary">delete</button>
            </form><br>
        @endforeach
    </div>
    <h1>add a tag</h1>
    <form action="{{route('tags.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">tag name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">create</button>
        </div>
    </form>

    <h1>seach tag</h1>
    <form action="{{route('tags.index')}}" method="get">
        @csrf
        <label for="">search tag name</label><br>
        <input type="text" name="search" placeholder="search tag">
        <button type="submit">search</button>
    </form>
    @foreach ($tagss as $tag)
        {{$tag->name}}
    @endforeach
    
    

</div>
@endsection