@extends('layouts.app')

@section('content')
    <div class="row py-5 p-4 bg-white rounded shadow-sm d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Información de envío</div>
            <form class="p-4" action=" {{route('orders.update', $user->id)}} " method="post">
                @method('post')
                @csrf
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label class="font-weight-bold" for="direccion">Nº de Tarjeta de Crédito: </label>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $user->cc_number }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="ciudad">Propietario de la Tarjeta de Crédito: </label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{ $user->surname }}, {{ $user->name }}" disabled>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold" for="date">Fecha caducidad: </label>
                        <input type="text" class="form-control" placeholder="MM" id="date">
                    </div>
                    <div class="form-group col-md-4 d-flex align-items-end">
                        <input type="text" class="form-control" placeholder="YYYY" id="date">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold" for="cvv">CVV: </label>
                        <input type="text" class="form-control" id="cvv">
                    </div>
                </div>

            </form>
            <a href="{{ route('orders.storeOrder') }}"><button class="btn btn-dark rounded-pill py-2 btn-block text-uppercase">Realizar pago</button></a>
        </div>
    </div>
@endsection
