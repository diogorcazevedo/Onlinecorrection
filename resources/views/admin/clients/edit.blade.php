@extends('layout.layout')

@section('img_layout')
    <div style="margin-top: 15%; margin-bottom: 5%;" class="col-lg-offset-2 col-sm-8 padding-right">
        <h3>Editar Cliente: {{$client->user->name}}</h3>

        @include('errors._check')


    {!! Form::model($client,['route'=>['clients.update',$client->id]]) !!}

        @include('admin.clients._form')

        <div class="form-group">

            {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection