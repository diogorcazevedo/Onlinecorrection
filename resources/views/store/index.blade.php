@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 15%; margin-bottom: 5%;" class="col-sm-12 padding-right">
        <div class="features_items">
            @if(Session::has('success'))
            <ul class="list-group">
                <li class="list-group-item listback text-center">{{Session::get('success')}}</li>
            </ul>
                {{Session::forget('success')}}
            @endif
            <h2 class="title text-center">Escolher documento para correção</h2>
            @include('store.partial.document',['documents'=>$documents])
        </div>
    </div>
@endsection