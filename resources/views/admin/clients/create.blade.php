@extends('layout.layout')

@section('img_layout')
    <div style="margin-top: 15%; margin-bottom: 5%;" class="col-lg-offset-2 col-sm-8 padding-right">
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