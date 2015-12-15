@extends('app')


@section('content')
    <div class="container">
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