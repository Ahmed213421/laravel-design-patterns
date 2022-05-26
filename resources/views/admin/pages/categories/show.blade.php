@extends('admin.master')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">category {{$category->name}}</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>post title</th>
            <th>post name</th>
            <th>category name</th>
            <th>tags</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)    
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->name}}</td>
              <td>{{$post->category->name}}</td>
              <td>
                @foreach ($post->tags as $tag)
                    {{$tag->name}}
                @endforeach
              </td>
            </tr>
            <tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection