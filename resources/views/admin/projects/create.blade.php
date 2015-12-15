@extends('app')


@section('content')
    <div class="container">
        <h3>Novo Projeto</h3>

        @include('errors._check')

    {!! Form::open(['route'=>'admin.projects.store']) !!}

        @include('admin.projects._form')

        <div class="form-group">

            {!! Form::submit('criar projeto',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection