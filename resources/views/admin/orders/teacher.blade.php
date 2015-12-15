@extends('layout.layout')

@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 10%;">
        <h3>Ordens de Pedido</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Criado</th>
                <th>Quantidade</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>#{{$client->id}}</td>
                    <td>{{$client->user->name}}</td>
                    <td>{{$client->updated_at}}</td>
                    <td><?php echo count($client->orders);?></td>
                    <td>
                        <a href="{{route('admin.orders.visure',['id'=>$client->id])}}" class="btn-sm btn btn-primary">
                            Visualizar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->render() !!}

    </div>


@endsection