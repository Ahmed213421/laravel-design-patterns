@extends('admin.master')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
@endsection
@section('content')
<div class="container">



    <div class="callout callout-danger">
        <h1>post</h1>
        <h2>post name : {{$post->name}}</h2>
        <h2>post category : {{$post->category->name}}</h2>
        <h2>post user : {{$post->user->name}}</h2>
        <h1>post tags : 
            @foreach ($post->tags as $tag)
                {{$tag->name}}
            @endforeach
        </h1>
    @foreach ($post->tags as $item)
    {{$item->name}}
    @endforeach
    <h1>comments</h1>
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        @method('POST')
        <label for="">description</label><br>
        <input type="text" name="description" placeholder="enter description"><br>

        <input type="hidden" name="post_id" value="{{$post->id}}"><br>
        <button type="submit">add comment</button>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
    <br>
</div>

    @foreach ($comments as $comment)
    <div class="timeline">

        <div class="time-label">
            <span class="bg-red">{{$comment->created_at}}</span>
        </div>


        <div>
            <i class="fas fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> {{$comment->created_at}}</span>
                <h3 class="timeline-header"><a href="#">Name : </a>{{$comment->user->name}}</h3>
                <div class="timeline-body">
                    {{$comment->description}}
                </div>
            </div>
        </div>





    </div>
    @endforeach
</div>



@endsection