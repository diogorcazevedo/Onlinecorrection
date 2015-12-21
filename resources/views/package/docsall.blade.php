@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 10%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
        <h3>Documentos do Lote</h3>
        <br/>
        <a href="{{route('admin.packages.packall')}}" class="btn btn-primary pull-right">voltar</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Projeto</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{$document->id}}</td>
                <td>{{$document->project->name}}</td>
                <td>{{$document->status}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@endsection