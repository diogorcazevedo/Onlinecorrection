@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
        <h3>Documentos</h3>
        <br/>
        <a href="{{route('admin.documents.create')}}" class="btn btn-default btn-info">Novo</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Projeto</th>
                <th>Documento</th>
                <th>Status</th>
                <th>Ação</th>
                <th>Imagens</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{$document->id}}</td>
                <td>{{$document->project->name}}</td>
                <td>{{$document->name}}</td>
                <td>{{$document->status}}</td>
                <td>
                    <a href="{{route('admin.documents.edit',['id'=>$document->id])}}" class="btn-sm btn btn-primary">
                        Editar
                    </a>

                    <a href="{{route('admin.documents.destroy',['id'=>$document->id])}}" class="btn-sm btn btn-primary">
                        Delete
                    </a>
                </td>
                <td>
                    <a href="{{route('admin.images.index',['id'=>$document->id])}}" class="btn-sm btn btn-primary">
                        Images
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $documents->render() !!}

    </div>


@endsection