@extends('admin.master')

@section('content')


<div class="container">
    <h1>create category</h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">create</button>
        </div>
    </form>
</div>
@endsection