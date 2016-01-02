@extends('layout.layout')


@section('img_layout')
    <div class="container" style="margin-top: 10%; margin-bottom: 5%;">
        <h3>Relatório Quantitativo de Correção</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="active" colspan="8">Total de documentos <span class="pull-right">{{$counts}}</span></th>
            </tr>
            <tr>
                <th>Série</th>
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
                    <td>Sexta</td>
                    <td>{{$sexto}}</td>
                    <td>{{$sexto *2}}</td>
                    <td>{{$ordersexta}}</td>
                    <td>{{$zerosexta}}</td>
                    <td>{{$discrepancysexta}}</td>
                    <td>{{$managersexta}}</td>
                    <td>{{$managerssexta}}</td>
                </tr>

                <tr>
                    <td>Primeira Série</td>
                    <td>{{$primeira}}</td>
                    <td>{{$primeira *2}}</td>
                    <td>{{$orderprimeiro}}</td>
                    <td>{{$zeroprimeira}}</td>
                    <td>{{$discrepancyprimeira}}</td>
                    <td>{{$managerprimeira}}</td>
                    <td>{{$managersprimeira}}</td>
                </tr>
                <tr>
                    <td class="active" colspan="8">Total de documentos corrigidos <span class="pull-right">{{$orders}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection