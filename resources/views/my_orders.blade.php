@extends('layouts.app')

@section('content')
    @if(count($orders) == 0)
    <div class="col-lg-12 d-flex justify-content-center mt-4">
        <div class="col-lg-8 alert-info p-4">
            <strong>No tienes pedidos realizados actualmente!</strong>
        </div>
    </div>
    @else
    <div class="p-4">
        @foreach($orders as $order)
            <div class="d-flex justify-content-center mb-4">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-2 py-2 text-uppercase font-weight-bold">Detalles del pedido (ID: {{ $order->id }}) </div>
                    <div class="p-2">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Fecha</strong><strong>{{ $order->created_at }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Cantidad de productos </strong><strong>{{ $order->total_quantity }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Precio Total</strong><strong>{{ $order->total_price }}</strong></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 d-flex flex-column justify-content-around align-items-center p-2">
                    <a href="{{ route('orders.show', $order->id) }}"><button class="btn-dark rounded-pill">VER PRODUCTOS</button></a>
                    <form action="{{ route('orders.destroy' , $order->id) }}" method="POST">
                        @method('post')
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn-dark rounded-pill">DEVOLVER PEDIDO</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @endif
@endsection
