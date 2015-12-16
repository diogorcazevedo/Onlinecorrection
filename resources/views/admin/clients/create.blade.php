@extends('app')


@section('content')
    <div class="container col-lg-offset-2 col-lg-8">
        <h4>Cadastro de professores e administradores</h4>
        <br/>
        @include('errors._check')

        {!! Form::open(['route'=>'clients.store']) !!}

        @include('admin.clients._form')

        <div class="form-group">

            {!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close()!!}
    </div>


@endsection