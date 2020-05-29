@extends('layouts.app')

@section('content')
    <section id="product" class="col-lg-12 d-flex flex-column align-items-center">
        <div class="row col-lg-8 bg-white p-4">
            <div class="col-lg-8">
                <img width="400px" height="400px" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
            </div>

            <div class="col-lg-4 product-data">
                <h2>{{ $product->title }}</h2>
                <h6>{{ $product_brand->name }}</h6>
                <a href=""><p><i class="fas fa-star"></i> Añadir a Favoritos</p></a>
                <p> {{ $product->description }}</p>
                <h4><del>{{ $product->last_price }} EUR</del> {{ $product->price }} EUR</h4>

                <div class="buttons mt-4 d-flex">
                    <a href="{{ route('product.addToCart', $product->id) }}"><button class="btn-dark p-2 mr-4">AÑADIR AL CARRITO</button></a>
                    <button class="btn-dark p-2">COMPRAR AHORA</button>
                </div>
            </div>
        </div>
    </section>

@endsection
