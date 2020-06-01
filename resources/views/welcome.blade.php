@extends('layouts.app')


@section('content')
    <section id="welcome">
        <div id="itemsCarousel" class="carousel slide mb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#itemsCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#itemsCarousel" data-slide-to="1"></li>
                <li data-target="#itemsCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/slider1.jpg" alt="Imagen Slider 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/slider2.jpg" alt="Imagen Slider 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/slider3.jpg" alt="Imagen Slider 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#itemsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#itemsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="last-offers" class="p-4">
            <div class="d-flex">
                <h4>ÚLTIMAS OFERTAS</h4>
                <a href=" {{ route('offers') }} "><p class="mt-1 ml-2"><u>Ver todas</u></p></a>
            </div>
            <div class="row d-flex justify-content-around flex-wrap">
                @if(count($products) == 0)
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="col-lg-8 alert-info p-4">
                            <strong>Actualmente no hay ofertas disponibles!</strong>
                        </div>
                    </div>
                @endif

                @foreach($products as $product)
                    <a href=" {{ route('products.show' , $product->id)}} ">
                        <div class="card mb-4 border-dark" style="width: 225px; height: 380px">
                            <img width="223px" height="223px" class="card-img-top" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                @php $brand = \App\Models\Brand::find($product->brand_id)@endphp
                                <p class="card-subtitle">de {{ $brand->name }}</p>
                                <p class="card-text">@if($product->last_price > $product->price)<del>{{ $product->last_price }}€</del>@endif {{ $product->price }}€</p>
                                <div class="d-flex @if($product->offer_id == null) justify-content-center @else justify-content-around @endif mt-2">
                                    @if($product->offer_id != null)
                                        @php $offer = \App\Models\Offer::find($product->offer_id)@endphp
                                        <button class="bg-transparent">@if($offer->value_discount != null) {{ $offer->value_discount }}€ DESC @else {{$offer->percentage_discount}}% DESC @endif</button>
                                    @endif
                                    <a href=" {{ route('product.addToCart', $product->id) }} " class="align-self-center"><button class="bg-transparent"><i class="fas fa-shopping-cart"></i> <i class="fas fa-plus"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
