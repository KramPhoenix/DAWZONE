@extends('layouts.app')


@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/img/slider1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/slider2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/slider3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="p-4">
        <h2>ÚLTIMAS OFERTAS</h2>
        <div class="row d-flex justify-content-around flex-wrap">

            @foreach($products as $product)
                <a href=" {{ route('products.show' , $product->id)}} ">
                    <div class="card" style="width: 225px; height: 400px">
                        <img class="card-img-top" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            @php $brand = \App\Models\Brand::find($product->brand_id)@endphp
                            <p class="card-subtitle">{{ $brand->name }}</p>
                            <p class="card-text"><del>{{ $product->last_price }} EUR</del> {{ $product->price }} EUR</p>
                            @if($product->offer_id != null)
                                @php $offer = \App\Models\Offer::find($product->offer_id)@endphp
                                <button class="bg-transparent">@if($offer->value_discount != null) {{ $offer->value_discount }} EUR DESCUENTO @else {{$offer->percentage_discount}} % DESCUENTO @endif</button>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
