@extends('layouts.app')

@section('content')
    <section id="product" class="col-lg-12 d-flex flex-column align-items-center mt-5">
        <div class="row col-lg-10 bg-white d-flex justify-content-around mb-5">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <img class="border-dark" width="375px" height="375px" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
            </div>

            <div class="col-lg-6 product-data p-4">
                <h2>{{ $product->title }}</h2>
                <h6>{{ $product_brand->name }}</h6>
                @if(Auth::check())
                    @if($favourite == null || $favourite->favourite == 0)
                        <a href=" {{ route('product.addToFavourite', $product->id) }} "><p><i class="fas fa-star"></i> Añadir a Favoritos</p></a>
                    @else
                        <p><i class="fas fa-star"></i> Añadido a Mis Favoritos</p>
                    @endif
                @endif
                <p> {{ $product->description }}</p>
                <h4>@if($product->last_price > $product->price)<del>{{ $product->last_price }}€</del>@endif {{ $product->price }}€</h4>
                @if($product->offer_id != null)
                    @php $offer = \App\Models\Offer::find($product->offer_id)@endphp
                    <button class="bg-transparent">@if($offer->value_discount != null) {{ $offer->value_discount }}€ DESC @else {{$offer->percentage_discount}}% DESC @endif</button>
                @endif

                @if($product_owner != null)
                <p class="btn btn-light rounded-pill"><i class="fas fa-user"></i> {{ $product_owner->name }} {{ $product_owner->surname }}</p>
                @endif

                <div class="buttons mt-4 d-flex">
                    <a href="@if(Auth::check()) {{ route('product.addToCart', $product->id) }} @else {{ route('login') }} @endif"><button class="btn-dark p-2 mr-4">AÑADIR AL CARRITO</button></a>
                    <a href="@if(Auth::check()) {{ route('product.buyNow', $product->id) }} @else {{ route('login') }} @endif"><button class="btn-dark p-2">COMPRAR AHORA</button></a>
                </div>
            </div>
        </div>

        <div class="col-lg-10 bg-white p-4">
            <h4 class="mb-5"><u>Valoraciones del Producto</u></h4>
            @if(count($valuations) == 0)
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="col-lg-8 alert-info p-4">
                        <strong>No hay valoraciones en este producto actualmente!</strong>
                    </div>
                </div>
            @else
                @foreach($valuations as $valuation)
                    @php $user = \App\Models\User::find($valuation->user_id) @endphp
                    <div class="bg-light mb-4">
                        <p><strong><i class="fas fa-user"></i> {{ $user->name }} {{ $user->surname }}</strong> ({{ $valuation->created_at }})</p>
                        <p>Valoración: <strong>@if($valuation->stars == null) Sin Valorar @endif {{ $valuation->stars }} <i class="fas fa-star"></i></strong></p>
                        <p>Comentario: @if($valuation->stars == null) El usuario ha añadido el producto a favoritos. @else <em>"{{ $valuation->valuation }}"</em>@endif</p>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

@endsection
