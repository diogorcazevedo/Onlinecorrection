@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
        <h3>Projeto</h3>
        <br/>
        <a href="{{route('admin.projects.create')}}"class="btn btn-default btn-info">Novo Projeto</a>
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
            @foreach($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->name}}</td>
                <td>
                    <a href="{{route('admin.projects.edit',['id'=>$project->id])}}" class="btn-sm btn btn-primary">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $projects->render() !!}

    </div>


@endsection