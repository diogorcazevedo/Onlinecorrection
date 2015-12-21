@extends('layout.layout')
@section('img_layout')
    <div style="margin-top: 5%; margin-bottom: 5%;" class="col-lg-offset-1 col-lg-10 padding-right">
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
        <h3>Adicionar Lotes de Prova</h3>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>User_id</th>
                <th>Project_id</th>
                <th>Qtd Docs</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
            <tr>
                <td>{{$package->id}}</td>
                <td>{{$package->user_id}}</td>
                <td>{{$package->project->name}}</td>
                <td><?php echo $package->document->count();?></td>
                <td class="text-center">
                @if($package->assigned == 1)
                    <p class="alert alert-info">Lote atribuido</p>
                    @else
                    @if($package->user_id == 1)
                        <a href="{{route('packages.create',['id'=>$package->id])}}" class="btn-sm btn btn-primary">
                           Adicionar
                        </a>
                    @else
                        <a href="{{route('packages.second',['id'=>$package->id])}}" class="btn-sm btn btn-primary">
                            Adicionar
                        </a>
                    @endif
                @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $packages->render() !!}

    </div>


@endsection