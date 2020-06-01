@extends('layouts.app')

@section('content')
    <div class="p-4">
        @foreach($products as $product)
            @php $item = \App\Models\Product::find($product->product_id)@endphp
            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <img width="350px" height="350px" src="/img/products/{{$item->image}}" class="w-100">
                    </div>
                    <div class="col-md-8 px-3 p-3">
                        <div class="card-block px-3">
                            <h4 class="card-title">{{ $item->title }}</h4>
                            @php $brand = \App\Models\Brand::find($item->brand_id)@endphp
                            <p class="card-subtitle mb-2">de {{ $brand->name }}</p>
                            <p class="card-text">{{ $item->description }}</p>
                            <h4>@if($item->last_price > $item->price)<del>{{ $item->last_price }}€</del>@endif {{ $item->price }}€</h4>

                            <div class="buttons mt-4 d-flex">
                                <a href=" {{ route('product.addToCart', $item->id) }} "><button class="btn-dark p-2 mr-4">AÑADIR AL CARRITO</button></a>
                                <form action="{{ route('product.removeFavourite' , $item->id) }}" method="POST">
                                    @method('post')
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
                                    <button class="btn-dark p-2">QUITAR DE FAVORITOS</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
