<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Correção Acesso</title>


    <link href="{{ url(elixir('css/all.css')) }}" rel="stylesheet">


</head><!--/head-->

<body>

    <div class="header-middle-layout navbar-fixed-top"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="shop-menu pull-left">
                        <ul class="nav navbar-nav">
                            @if(Auth::user())
                                @if(Auth::user()->role == 'admin' or Auth::user()->role == 'coach')
                                    <li class="notbackground"><a href="{{route('admin.clients.index')}}">Usuários</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">Projeto <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="notbackground"><a href="{{route('admin.projects.index')}}">ADM. Projetos</a></li>
                                            <li class="notbackground"><a href="{{route('admin.documents.index')}}">ADM. Documentos</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">Supervisão <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{route('management.listing')}}">Listar discrepâncias </a></li>
                                            <li><a href="{{route('management.index')}}">Corrigir discrepâncias </a></li>
                                            <li><a href="{{route('management.work')}}">Correções do Supervisor</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">Correções <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{route('admin.orders.teacher')}}">listagem por Corretor</a></li>
                                            <li><a href="{{route('admin.orders.index')}}">Listagem geral</a></li>
                                            <li><a href="{{route('admin.orders.qtd')}}">Quantitativa</a></li>
                                            <li><a href="{{route('admin.orders.average')}}">listagem por média</a></li>
                                        </ul>
                                    </li>
                                @elseif(Auth::user()->role == 'client')
                                    <li><a href="{{ route('store.edit',['id'=>auth()->user()->id])}}">Minhas correções</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="logo pull-left">
                        <img class="img-responsive" src="{{url('img/logo.png')}}" alt="" />
                    </div>

                </div>
                <div class="col-sm-5">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <ul class="nav navbar-nav navbar-right">
                                @if(auth()->guest())
                                    @if(!Request::is('auth/login'))
                                        <li><a class="notbackground" href="{{ url('/auth/login') }}"><i class="fa fa-user"></i> Login</a></li>
                                    @endif
                                    @if(!Request::is('auth/register'))
                                        <li><a class="notbackground" href="{{ route('clients.create') }}">Registro</a></li>
                                    @endif
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="notbackground" href="{{ route('clients.edit',['id'=>auth()->user()->id] )}}">Editar</a></li>

                                @endif
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->



<section>
    @yield('img_layout')
</section>

<footer style="clear: both; margin-top: 10%;" id="footer"><!--Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2015 Acesso Público. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://invoinn.com/">ACESSO</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="{{ url(elixir('js/all.js')) }}"></script>

</body>
</html>