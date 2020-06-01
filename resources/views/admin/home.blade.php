@extends('admin.layouts.admin')

@section('content')
<div class="col-lg-10 d-flex justify-content-around flex-wrap">
    <div class="card text-center mb-4" style="width: 18rem; height: 140px">
        <div class="card-body">
            <h5 class="card-title">TOTAL PRODUCTOS</h5>
            <p class="card-text">Productos registrados actualmente: {{ $products }}</p>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">VER PRODUCTOS</a>
        </div>
    </div>

    <div class="card text-center mb-4" style="width: 18rem; height: 140px">
        <div class="card-body">
            <h5 class="card-title">TOTAL CLIENTES</h5>
            <p class="card-text">Clientes registrados actualmente: {{ $users }}</p>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">VER CLIENTES</a>
        </div>
    </div>

    <div class="card text-center mb-4" style="width: 18rem; height: 140px">
        <div class="card-body">
            <h5 class="card-title">TOTAL PEDIDOS</h5>
            <p class="card-text">Pedidos registrados actualmente: {{ $orders }}</p>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">VER PEDIDOS</a>
        </div>
    </div>

    <div class="card text-center mb-4" style="width: 18rem; height: 140px">
        <div class="card-body">
            <h5 class="card-title">TOTAL OFERTAS</h5>
            <p class="card-text">Ofertas registradas actualmente: {{ $offers }}</p>
            <a href="{{ route('admin.offers.index') }}" class="btn btn-primary">VER OFERTAS</a>
        </div>
    </div>

    <div class="card text-center mb-4" style="width: 18rem; height: 140px">
        <div class="card-body">
            <h5 class="card-title">TOTAL MARCAS</h5>
            <p class="card-text">Marcas registradas actualmente: {{ $brands }}</p>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-primary">VER MARCAS</a>
        </div>
    </div>

    <div class="card text-center mb-4" style="width: 18rem; height: 140px">
        <div class="card-body">
            <h5 class="card-title">TOTAL CATEGORÍAS</h5>
            <p class="card-text">Categorías registradas actualmente: {{ $categories }}</p>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">VER CATEGORÍAS</a>
        </div>
    </div>
</div>
@endsection
