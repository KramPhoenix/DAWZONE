@extends('layouts.app')

@section('content')
    <section id="category" class="col-lg-12 d-flex flex-wrap justify-content-around">
        @foreach($products as $product)
            <a href=" {{ route('products.show' , $product->id)}} ">
                <div class="card" style="width: 250px; height: 350px">
                <img class="card-img-top" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-subtitle">{{ $product->brand_id }}</p>
                    <p class="card-text"><del>{{ $product->last_price }} EUR</del> {{ $product->price }} EUR</p>
                </div>
                </div>
            </a>
        @endforeach
    </section>

@endsection
