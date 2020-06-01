@extends('layouts.app')

@section('content')
    <div id="category-title" class="mt-5">
        <h4 class="ml-5"><u>Productos de {{$category->name}}</u></h4>
    </div>

    <section id="category" class="col-lg-12 d-flex flex-wrap justify-content-around mt-4">
        @if(count($products) == 0)
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="col-lg-8 alert-info p-4">
                    <strong>Actualmente no hay productos en esta categoría!</strong>
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
    </section>

@endsection
