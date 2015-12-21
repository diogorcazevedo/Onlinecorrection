@extends('layout.layout')

@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 10%;">
        <h3>Correções por Professor</h3>
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
            @foreach($users as $user)
                <tr>
                    <td>#{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td><?php echo $user->orders->count();?></td>
                    <td>
                        <a href="{{route('admin.orders.visure',['id'=>$user->id])}}" class="btn-sm btn btn-primary">
                            Visualizar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->render() !!}

    </div>


@endsection