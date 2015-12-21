@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
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