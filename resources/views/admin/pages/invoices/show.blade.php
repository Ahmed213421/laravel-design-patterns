@extends('admin.master')

@section('content')
    <div class="container">
        <div class="callout callout-info">
            <h5>invoice number {{$invoice->invoice_id}}</h5>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>invoice ID</th>
                        <th>invoice user name</th>
                        <th>invoices Date</th>
                        <th>edit</th>
                        <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{$invoice->invoice_id}}</td>
                        <td>{{$invoice->user->name}}</td>
                            <td>{{$invoice->created_at}}</td>
                            <td><a class="btn btn-primary text-white" href="{{route('invoices.edit',$invoice->id)}}">edit</a></button></td>
                            <td>
                                <form action="{{route('invoices.destroy',$invoice->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-primary" type="submit">delete</button>
                                </form>
                                
                            </td>
                        </tr>    
                        
                    </tbody>
                </table>
            </div>

            </div>
    </div>
@endsection