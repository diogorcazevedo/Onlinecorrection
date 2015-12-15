@extends('app')


@section('content')
    <div class="container">
        <h3>Editar Documento: {{$document->name}}</h3>

        @include('errors._check')


    {!! Form::model($document,['route'=>['admin.documents.update',$document->id]]) !!}

        @include('admin.documents._form')

        <div class="form-group">
            {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection