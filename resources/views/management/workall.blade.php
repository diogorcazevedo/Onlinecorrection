@extends('layout.layout')


@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 10%;">
        <h3>Correções de Todos Supervisores</h3>
        <br/>
        <a href=" {{route('home')}}" class="btn btn-default btn-info pull-right">Voltar</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id Order</th>
                <th>Nome</th>
                <th>Client_id</th>
                <th>Document_id</th>
                <th>Tipo</th>
                <th>Tema</th>
                <th>Coesão</th>
                <th>Coerência</th>
                <th>Gramática</th>
                <th>Anulada</th>
                <th>Nota</th>
            </tr>
            </thead>
           <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->document_id}}</td>
                <td>{{$order->tipo}}</td>
                <td>{{$order->tema}}</td>
                <td>{{$order->coesao}}</td>
                <td>{{$order->coerencia}}</td>
                <td>{{$order->gramatica}}</td>
                <td>{{$order->zero}}</td>
                <td>{{$order->evaluation}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@endsection