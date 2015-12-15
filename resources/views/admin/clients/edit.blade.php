@extends('app')


@section('content')
    <div class="container">
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