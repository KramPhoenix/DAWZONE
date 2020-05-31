@extends('layouts.app')

@section('content')

    <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Información de envío</div>
            <form class="p-4 d-flex flex-column mb-4" action=" {{route('orders.update', $user->id)}} " method="post">
                @method('post')
                @csrf
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label class="font-weight-bold" for="direccion">Dirección de envío: </label>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $user->address }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="ciudad">Ciudad: </label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{ $user->city }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="provincia">Provincia: </label>
                    <input type="text" id="provincia" name="provincia" class="form-control" value="{{ $user->province }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="telf">Teléfono móvil: </label>
                    <input type="tel" id="telf" name="telf" class="form-control" value="{{ $user->phone }}">
                </div>

                <input type="submit" name="submit" class="btn btn-success text-uppercase align-self-end" value="ACTUALIZAR INFORMACIÓN">
            </form>
        </div>
        <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Detalles del pedido </div>
            <div class="p-4">
                <p class="font-italic mb-4">No se preocupe, en nuestra tienda no cobramos los gastos de envío.</p>
                <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Cantidad de productos </strong><strong>{{ $total_quantity }}</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Precio Subtotal</strong><strong>{{ $total_price }}</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tarifa</strong><strong>$0.00</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Precio Total</strong>
                        <h5 class="font-weight-bold">{{ $total_price }}</h5>
                    </li>
                </ul>
                <a href="{{ route('orders.create')}}"><button class="btn btn-dark rounded-pill py-2 btn-block text-uppercase">Proceder al pago</button></a>
            </div>
        </div>
    </div>



@endsection
