@foreach($documents as $document)
    @if($document->package->user_id != auth()->user()->id)
    <?php Session::put('success', 'Entre em contato com o administrador para adicionar novo pacote de provas');
        return redirect()->route('store.index'); ?>
        @endif
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="text-center">
                    <img src="{{url('images/no-img.jpg')}}" alt=""/>
                    @foreach($document->orders as $orders)
                        @if($orders->user_id == auth()->user()->id)
                            <p class="alert alert-info">Documento Corrigido</p>
                        @endif
                    @endforeach
                    <p>#ID {{$document->id}} :: LOTE ::{{$document->package->id}} </p>
                    <a href="{{route('store.create',['id'=>$document->id])}}"
                       class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Corrigir</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <p>#ID {{$document->id}} :: LOTE ::{{$document->package->id}} </p>
                        <a href="{{route('store.create',['id'=>$document->id])}}"
                           class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Corrigir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach