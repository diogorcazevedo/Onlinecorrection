@extends('layout.layout')


@section('img_layout')
    <div style="margin-top: 15%; margin-bottom: 5%;" class="col-sm-12 padding-right">
        <ul class="list-group">
            <li class="list-group-item listback"><b>FAZER A OPÇÃO DE CONFIRMAR OU REFORMAR A NOTA.</b></li>
        </ul>
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Nota apurada</h2>

            <div class="well">
                @if(isset($result))
                    <p class="title text-center well">NOTA DA CORREÇÃO: {{ $result }}</p>
                @endif
            <p class="title text-center"><a href="#" class="btn btn-default">Confirmar</a></p>
            <p class="title text-center"><a href="#" class="btn btn-default">Reformar</a></p>
            </div>
        </div>
    </div>
@endsection

