@extends('layout.layout')


@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 5%;">
        <h3>Relatório Quantitativo de Correção</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Não Corrigidas</th>
                <th>Única Correção</th>
                <th>Dupla Correção</th>
                <th>Supervisionados</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$stszero}}</td>
                    <td>{{$stsum}}</td>
                    <td>
                        Aprovados: {{$ststree}}<br/>
                        <hr/>
                        Crítica: {{$stsfour}}<br/>
                    </td>
                    <td>{{$stsfive}}</td>
                    <td>{{$count}}</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection