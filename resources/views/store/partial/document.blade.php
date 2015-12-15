@foreach($documents as $document)

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="text-center">
                        <img src="{{url('images/no-img.jpg')}}" alt=""/>
                    <p>#ID {{$document->id}} :: STATUS {{$document->status}} </p>


                    <a href="{{route('store.create',['id'=>$document->id])}}" class="btn btn-default add-to-cart"><i
                                class="fa fa-crosshairs"></i>Mais detalhes</a>

                </div>

                <div class="product-overlay">
                    <div class="overlay-content">

                        <p>#ID {{$document->id}} :: STATUS {{$document->status}} </p>

                        <a href="{{route('store.create',['id'=>$document->id])}}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-crosshairs"></i>Corrigir</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach