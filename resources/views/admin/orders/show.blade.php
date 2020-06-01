@extends('admin.layouts.admin')

@section('content')

    <div class="col-lg-10 d-flex justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="w-100 card-header font-weight-bold">
                    PRODUCTOS DEL PEDIDO (ID: {{ $order }})
                </div>
                <div class="card-body">
                    @foreach($order_products as $order_product)
                    <div class="border border-dark mb-2 p-2">
                        <p><span class="font-weight-bold">ID Producto: </span> {{ $order_product->product_id }}</p>
                        <p><span class="font-weight-bold">Cantidad: </span> {{ $order_product->quantity }} ud.</p>
                        <p><span class="font-weight-bold">Precio: </span> {{ $order_product->price }} €</p>
                    </div>
                    @endforeach
                    <div class="col-12 d-flex justify-content-end text-center mb-2">
                        <a href="{{ route('admin.orders.index') }}"><div class="btn btn-outline-danger mx-1">Volver</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
