@extends('layout.layout')


@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 5%;">
        <h3>Relatório Quantitativo de Correção</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Total de documentos</th>
                <th>Demanda</th>
                <th>Correções</th>
                <th>Zeros (podem existir duplicados)</th>
                <th>Discrepâncias</th>
                <th>Documentos Supervisionados</th>
                <th>Supervisões</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$counts}}</td>
                    <td>{{$counts *2}}</td>
                    <td>{{$orders}}</td>
                    <td>{{$zeros}}</td>
                    <td>{{$discrepancy}}</td>
                    <td>{{$manager}}</td>
                    <td>{{$managers}}</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection