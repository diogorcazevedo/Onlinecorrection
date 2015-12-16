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
        <h3>Listar Discrepantes</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Projeto</th>
                <th>Status</th>
                <th>Redistribuir para nova correção</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->id}}</td>
                    <td>{{$document->project->name}}</td>
                    <td>{{$document->status}}</td>
                    <td>
                        <a href="{{route('management.status',['id'=>$document->id])}}"
                           class="btn-sm btn btn-primary">
                            Única correção
                        </a>

                        <a href="{{route('management.statuszero',['id'=>$document->id])}}"
                           class="btn-sm btn btn-primary">
                            Dupla correção
                        </a>
                    </td>
                    <td>
                        <a href="{{route('management.create',['id'=>$document->id])}}" class="btn-sm btn btn-primary">
                            Corrigir
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection