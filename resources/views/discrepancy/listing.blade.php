@extends('layout.layout')

@section('img_layout')
    @if(Session::has('success'))
        <div style="margin-top: 10%;" class="col-sm-12 padding-right">
            <div class="features_items">
                <ul class="list-group">
                    <li class="list-group-item listback text-center">{{Session::get('success')}}</li>
                </ul>
            </div>
        </div>
        {{Session::forget('success')}}
    @endif

    <div style="margin-top: 10%; margin-bottom: 5%;" class=" col-lg-offset-1 col-sm-10 padding-right">
        <h3>Listar Discrepantes :: quantidade: {{count($documents)}} <span class="pull-right"><a href="{{ route('discrepancy.refresh') }}" class="btn btn-primary"><i class="fa fa-refresh"></i> Atualizar</a></span></h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Correções</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->id}}</td>
                    <td>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Corretor</th>
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
                    @foreach($document->orders as $order)

                        <tr>
                            <td>{{$order->user->name}}</td>
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
                    </td>
                    <td>
                        <a href="{{route('discrepancy.create',['id'=>$document->id])}}" class="btn-sm btn btn-primary">
                            Corrigir
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection