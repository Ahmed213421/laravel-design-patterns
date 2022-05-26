@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">posts Table</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">
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
                                <th>post name</th>
                                <th>post title</th>
                                <th>Date</th>
                                <th>category name</th>
                                <th>tags</th>
                                <th>show comment</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                @foreach ($post->tags as $tag)
                                    {{$tag->name}}
                                @endforeach
                                </td>
                                <td><a href="{{route('posts.show',$post->id)}}">show</a></td>
                                <td>
                                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-primary" type="submit">delete</button>
                                    </form>
                                    
                                </td>
                                <td><a class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">edit</a></button></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>

            </div>

        </div>
    </div>
    <a href="{{route('posts.create')}}" class="m-auto w-100"><button type="button" class="btn btn-success">create post</button></a>
</div>


@endsection