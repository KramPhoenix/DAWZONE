@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column">
        <h2 class="mb-4">LISTADO DE PEDIDOS</h2>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CANTIDAD PRODUCTOS</th>
                <th scope="col">PRECIO TOTAL</th>
                <th scope="col">ID CLIENTE</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total_quantity }}</td>
                    <td>{{ $order->total_price }} €</td>
                    <td>{{ $order->user_id }}</td>

                    <td class="d-flex">
                        <a href="{{ route('admin.orders.show' , $order->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
