@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
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