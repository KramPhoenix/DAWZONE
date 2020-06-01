@extends('layouts.app')

@section('content')
    <div class="p-4">
        @foreach($products as $product)
            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/img/products/{{$product->image}}" class="w-100">
                    </div>
                    <div class="col-md-8 px-3 p-3">
                        <div class="card-block px-3">
                            <h4 class="card-title">{{ $product->title }}</h4>
                            @php $brand = \App\Models\Brand::find($product->brand_id)@endphp
                            <p class="card-subtitle mb-2">de {{ $brand->name }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            <h4>@if($product->last_price > $product->price)<del>{{ $product->last_price }}€</del>@endif {{ $product->price }}€</h4>

                            <div class="buttons mt-5 d-flex">
                                <a href=" {{ route('products.edit', $product->id) }} "><button class="btn-dark p-2 mr-4"><i class="fas fa-edit"></i> EDITAR</button></a>
                                <form action="{{ route('products.destroy' , $product->id) }}" method="POST">
                                    @method('post')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn-dark p-2"><i class="fas fa-trash"></i> ELIMINAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
