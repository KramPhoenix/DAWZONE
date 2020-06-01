@extends('layouts.app')

@section('content')
    <section id="product" class="col-lg-12 d-flex flex-column align-items-center mt-5">
        <div class="row bg-white d-flex justify-content-around">
            <div class="col-lg-6">
                <img class="border-dark" width="375px" height="375px" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
            </div>

            <div class="col-lg-6 product-data p-4">
                <h2>{{ $product->title }}</h2>
                <h6>{{ $product_brand->name }}</h6>
                <a href=" {{ route('product.addToFavourite', $product->id) }} "><p><i class="fas fa-star"></i> Añadir a Favoritos</p></a>
                <p> {{ $product->description }}</p>
                <h4>@if($product->last_price > $product->price)<del>{{ $product->last_price }}€</del>@endif {{ $product->price }}€</h4>
                @if($product->offer_id != null)
                    @php $offer = \App\Models\Offer::find($product->offer_id)@endphp
                    <button class="bg-transparent">@if($offer->value_discount != null) {{ $offer->value_discount }}€ DESC @else {{$offer->percentage_discount}}% DESC @endif</button>
                @endif
                <div class="buttons mt-5 d-flex">
                    <a href="{{ route('product.addToCart', $product->id) }}"><button class="btn-dark p-2 mr-4">AÑADIR AL CARRITO</button></a>
                    <a href="{{ route('product.buyNow', $product->id) }}"><button class="btn-dark p-2">COMPRAR AHORA</button></a>
                </div>
            </div>
        </div>
    </section>

@endsection
