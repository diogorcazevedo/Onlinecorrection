@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
        <h3>Clientes</h3>
        <br/>
        <a href=" {{route('home')}}" class="btn btn-default btn-info">Voltar</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->user->name}}</td>
                <td>
                    <a href="{{route('admin.clients.editfunction',['id'=>$client->id])}}" class="btn-sm btn btn-primary">
                       Atribuir Função
                    </a>

                    <a href="{{route('admin.clients.admedit',['id'=>$client->id])}}" class="btn-sm btn btn-primary">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->render() !!}

    </div>


@endsection