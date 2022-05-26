@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>post ID</th>
                        <th>user name</th>
                        <th>invoices Date</th>
                        <th>show</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$invoice->invoice_id}}</td>
                        <td>{{$invoice->user->name}}</td>
                        <td>{{$invoice->created_at}}</td>
                        <td><a href="{{route('invoices.show',$invoice->id)}}">show</a></td>
                        <td><a class="btn btn-primary" href="{{route('invoices.edit',$invoice->id)}}">edit</a></button></td>
                        <td>
                            <form action="{{route('invoices.destroy',$invoice->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-primary" type="submit">delete</button>
                            </form>
                            
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
            {{$invoices->links()}}
        </div>

    </div>
@endsection