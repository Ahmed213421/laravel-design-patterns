@extends('admin.master')

@section('content')
    <div class="container">
        <form action="{{route('categories.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
              edit name <br>
              <input type="text" name="name" value="{{$category->name}}">
              <button type="submit" class="btn btn-default">edit</button>
        </form>
    </div>
@endsection