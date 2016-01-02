@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
        @if(Session::has('success'))
            <div style="margin-top: 5%; margin-bottom: 5%;" class="col-sm-12 padding-right">
                <div class="features_items">
                    <ul class="list-group">
                        <li class="list-group-item listback text-center">{{Session::get('success')}}</li>
                    </ul>
                </div>
            </div>
            {{Session::forget('success')}}
        @endif
        <h3>Documentos para correção</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Pacote</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->id}}</td>
                    <td>{{$document->package->id}}</td>
                    <td>
                        @foreach($document->orders as $orders)
                            @if($orders->user_id == auth()->user()->id)
                                <p class="alert alert-info">Documento Corrigido</p>

                            @endif
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{route('store.create',['id'=>$document->id])}}" class="btn-sm btn btn-primary">Corrigir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection