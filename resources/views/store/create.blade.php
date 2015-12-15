@extends('layout.layout')

@section('img_layout')
    <div style="margin-top: 15%; margin-bottom: 5%;" class="col-sm-12 padding-right">
        <ul class="list-group">
            <li class="list-group-item listback"><b>AFERIR PONTUAÇÃO E ENVIAR</b></li>
        </ul>
        <div class="product-details"><!--product-details-->
            <div class="col-sm-8">
                <div class="view-product">
                        <img src="{{url('uploads/'.$document->id_inscricao.'.jpg')}}"
                             alt="" />
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                </div>
            </div>

            <div class="col-sm-4">
                <div style="padding-right: 5%;" class="product-information"><!--/product-information-->
                    <h2>{{ $document->project->name }} :: {{ $document->name }} :: {{ $document->id }}</h2>
                    <p>Status do documento: {{ $document->status }}</p>

                        @include('errors._check')
                        {!! Form::open(['route'=>'store.store']) !!}

                        @include('store.partial._form')

                        <div class="form-group">

                            {!! Form::submit('gerar nota',['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close()!!}

                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@endsection