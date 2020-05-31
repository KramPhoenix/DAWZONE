@extends('layouts.app')

@section('content')
    <section id="category" class="col-lg-12 d-flex flex-wrap justify-content-around mt-5">
        @foreach($products as $product)
            <a href=" {{ route('products.show' , $product->id)}} ">
                <div class="card mb-4" style="width: 230px; height: 400px">
                    <img class="card-img-top" src="/img/products/{{ $product->image }}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        @php $brand = \App\Models\Brand::find($product->brand_id)@endphp
                        <p class="card-subtitle">{{ $brand->name }}</p>
                        <p class="card-text"><del>{{ $product->last_price }} EUR</del> {{ $product->price }} EUR</p>
                        <div class="d-flex justify-content-center">
                            @if($product->offer_id != null)
                                @php $offer = \App\Models\Offer::find($product->offer_id)@endphp
                                <button class="bg-transparent">@if($offer->value_discount != null) {{ $offer->value_discount }} EUR DESCUENTO @else {{$offer->percentage_discount}} % DESCUENTO @endif</button>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </section>

@endsection
