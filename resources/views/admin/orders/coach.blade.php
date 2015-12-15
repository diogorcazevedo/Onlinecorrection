@extends('app')


@section('content')
    <div class="container">
        <h3>Ordens de Pedido</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Total</th>
                <th>Data</th>
                <th>Itens</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{$order->id}}</td>
                    <td>R$ {{$order->total}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                        <li>{{$item->document->name}}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a href="{{route('admin.orders.edit',['id'=>$order->id])}}" class="btn-sm btn btn-primary">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}

    </div>


@endsection