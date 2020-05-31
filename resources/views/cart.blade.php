@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                <!-- Shopping cart table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Producto</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Precio</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Cantidad</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Acciones</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            @php $brand = \App\Models\Brand::find($product['product']['brand_id']) @endphp
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="/img/products/{{ $product['product']['image'] }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $product['product']['title'] }}</a></h5><span class="text-muted font-weight-normal font-italic d-block"> {{ $brand->name }}</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{ $product['price'] }}</strong></td>
                                <td class="border-0 align-middle"><strong>{{ $product['quantity'] }}</strong></td>
                                <td class="border-0 align-middle">
                                    <a href="{{ route('product.addToCart', $product['product']['id']) }}" class="text-dark mr-4"><i class="fa fa-plus"></i></a>
                                    <a href="{{ route('product.reduceOneFromCart', $product['product']['id']) }}" class="text-dark mr-4"><i class="fa fa-minus"></i></a>
                                    <a href="{{ route('product.removeFromCart', $product['product']['id']) }}" class="text-dark"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex flex-column align-items-end">
                        <p><strong class="text-muted">Cantidad Productos: {{ $total_quantity }}</strong></p>
                        <p><strong class="text-muted">Precio Total: {{ $total_price }} EUR</strong></p>
                        <a href="{{ route('orders.index') }}"><button class="btn btn-dark rounded-pill">SIGUIENTE</button></a>
                    </div>

                </div>
                <!-- End -->
            </div>
        </div>
    @else
        <div class="col-lg-12 d-flex justify-content-center mt-4">
            <div class="col-lg-8 alert-info p-4">
                <strong>No hay productos añadidos al carrito actualmente!</strong>
            </div>
        </div>
    @endif
@endsection
