@extends('app')


@section('content')
    <div class="container">
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