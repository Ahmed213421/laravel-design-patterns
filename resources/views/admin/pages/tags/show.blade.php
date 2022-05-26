@extends('admin.master')

@section('content')
<div class="container">
    <div class="callout callout-info">
        tag {{$tag->name}}:
        <br>
        posts
        <br>
        @foreach ($tag->posts as $post)
        <a href="{{route('posts.show',$post->id)}}">{{$post->name}}</a>
        @endforeach
    </div>
</div>
@endsection