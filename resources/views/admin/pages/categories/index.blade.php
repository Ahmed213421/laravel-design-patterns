@extends('admin.master')

@section('content')

<div class="container">
    
    <div class="callout callout-success">
        <h5>all categories</h5>
        @foreach ($categories as $category)
        <a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a><br> 
        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary text-white">edit</a><br>
        <form style="margin-left: auto" action="{{route('categories.destroy',$category->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">delete</button>    
        </form>
        @endforeach
    </div>

    <a href="{{route('categories.create')}}"><button type="button" class="btn btn-primary">create category</button></a>
    
</div>
@endsection