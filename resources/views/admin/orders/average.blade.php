@extends('layout.layout')

@section('img_layout')
    <div style="margin-top: 10%; margin-bottom: 5%;" class=" col-lg-offset-1 col-sm-10 padding-right">
        <h3>Lista por Média</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Média</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->id}}</td>
                    <td>{{$document->final_evaluation}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection