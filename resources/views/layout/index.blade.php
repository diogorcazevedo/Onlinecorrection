@extends('layout.layout')


@section('img_layout')

    @if(Auth::user())
        @if(Auth::user()->role == 'admin')
            @if(Session::has('success'))
                <div style="margin-top: 5%; margin-bottom: 5%;" class="col-sm-12 padding-right">
                    <div class="features_items">
                        <ul class="list-group">
                            <li class="list-group-item listback text-center">{{Session::get('success')}}</li>
                        </ul>
                    </div>
                </div>
                {{Session::forget('success')}}
            @endif
            <div style="margin-top: 15%; margin-bottom: 5%;" class="container">
                <div class="content well well-sm">
                    <p class="well well-sm text-center">Área do Administrador:
                </div>
            </div>
        @elseif(Auth::user()->role == 'client')
            <div style="margin-top: 15%; margin-bottom: 5%;" class="container">
                <div class="content well well-sm">
                    <p class="well well-sm text-center">Manual de Uso do sistema:<br/>Correção On line</p>
                    <ul class="list-group">
                        <li class="list-group-item listback">Estamos no menu principal do sistema de correção</li>
                        <li class="list-group-item listback">Neste ambiente podemos acompanhar nosso relatório de
                            correção, podemos editar nossos dados pessoais e prinipalmente ir para: <a
                                    href="{{ route('store.index') }}" class="btn btn-xs btn-default">Esteira de
                                correção</a></li>
                    </ul>
                </div>
            </div>
        @elseif(Auth::user()->role == 'undefined')
            <div style="margin-top: 15%; margin-bottom: 5%;" class="container">
                <div class="content well well-sm">
                    <p class="well well-sm text-center">Manual de Uso do sistema:<br/>Correção On line</p>
                    <ul class="list-group">
                        <li class="list-group-item listback">{{ auth()->user()->name }}<br/> Aguarde autorização do supervisor para seu acesso ao sistema</li>
                    </ul>
                </div>
            </div>
        @endif
    @else
        <div style="margin-top: 15%; margin-bottom: 5%;" class="container">
            <div class="content well well-sm">
                <p class="well well-sm text-center">Manual de Uso do sistema:<br/>Como Começar</p>
                <ul class="list-group">
                    <li class="list-group-item listback"><b>1 -</b> Registre-se através do botão: <a
                                href="{{ route('clients.create') }}" class="btn btn-xs btn-default">Registrar</a></li>
                    <li class="list-group-item listback"><b>2 -</b> Já sou registrado! Faça login na sua conta pelo
                        botão: <a href="{{ url('/auth/login') }}" class="btn btn-xs btn-default">login</a></li>
                </ul>
            </div>
        </div>
    @endif
@endsection