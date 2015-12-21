@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
        <h3>Novo Documento</h3>

        @include('errors._check')

    {!! Form::open(['route'=>'admin.documents.store']) !!}

        @include('admin.documents._form')

        <div class="form-group">

            {!! Form::submit('criar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection