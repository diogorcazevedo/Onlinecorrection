@extends('app')


@section('content')
    <div class="container">
        <h3>Editar Projeto: {{$project->name}}</h3>

        @include('errors._check')


    {!! Form::model($project,['route'=>['admin.projects.update',$project->id]]) !!}

        @include('admin.projects._form')

        <div class="form-group">

            {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection