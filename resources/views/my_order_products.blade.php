@extends('layouts.app')

@section('content')
    <div class="p-4">
        <a href="{{ route('orders.myOrders')}}"><button class="btn-dark rounded-pill mb-4"><i class="fas fa-arrow-left"></i> VOLVER</button></a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="bg-light">
                        <div class="p-2 px-3 text-uppercase">Productos (PEDIDO ID: {{ $order }})</div>
                    </th>
                    <th scope="col" class="bg-light">
                        <div class="py-2 text-uppercase">Precio</div>
                    </th>
                    <th scope="col" class="bg-light">
                        <div class="py-2 text-uppercase">Cantidad</div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order_products as $order_product)
                    @php $product = \App\Models\Product::find($order_product->product_id) @endphp
                    <tr>
                        <th scope="row">
                            <div class="p-2">
                                <img src="/img/products/{{ $product->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                <div class="ml-3 d-inline-block align-middle">
                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $product->title }}</a></h5>
                                </div>
                            </div>
                        </th>
                        <td class="align-middle"><strong>{{ $order_product->price }}</strong></td>
                        <td class="align-middle"><strong>{{ $order_product->quantity }}</strong></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
