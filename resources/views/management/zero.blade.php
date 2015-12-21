@extends('layout.layout')


@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 10%;">
        <h3>Correções Zeradas</h3>
        <br/>
        <br/>
        @if(Session::has('success'))
            <ul class="list-group">
                <li class="list-group-item listback text-center">{{Session::get('success')}}</li>
            </ul>
            {{Session::forget('success')}}
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id Order</th>
                <th>Nome</th>
                <th>Document_id</th>
                <th>Tipo</th>
                <th>Tema</th>
                <th>Coesão</th>
                <th>Coerência</th>
                <th>Gramática</th>
                <th>Anulada</th>
                <th>Nota</th>
                <th>Visualizar</th>
                <th>Ação</th>
            </tr>
            </thead>
           <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->document_id}}</td>
                <td>{{$order->tipo}}</td>
                <td>{{$order->tema}}</td>
                <td>{{$order->coesao}}</td>
                <td>{{$order->coerencia}}</td>
                <td>{{$order->gramatica}}</td>
                <td>{{$order->zero}}</td>
                <td>{{$order->evaluation}}</td>
                <td>
                    <a href="{{route('management.zerolist',['id'=>$order->document_id])}}" class="btn-sm btn btn-primary">
                        segunda correção
                    </a>
                </td>
                <td>
                    <a href="{{route('management.create',['id'=>$order->document_id])}}" class="btn-sm btn btn-primary">
                        corrigir
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@endsection