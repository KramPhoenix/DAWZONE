@extends('admin.layouts.admin')

@section('content')

    <div class="col-lg-10 d-flex justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="w-100 card-header font-weight-bold">
                    INFORMACIÓN DEL CLIENTE
                </div>
                <div class="card-body">
                    <p><span class="font-weight-bold">ID:</span> {{ $user->id }}</p>
                    <p><span class="font-weight-bold">Nombre:</span> {{ $user->name }}</p>
                    <p><span class="font-weight-bold">Apellidos:</span> {{ $user->surname }}</p>
                    <p><span class="font-weight-bold">Email:</span> {{ $user->email }}</p>
                    <p><span class="font-weight-bold">Contraseña (cifrada):</span> {{ $user->password }}</p>
                    <p><span class="font-weight-bold">Teléfono:</span> {{ $user->phone }}</p>
                    <p><span class="font-weight-bold">Dirección:</span> {{ $user->address }}</p>
                    <p><span class="font-weight-bold">Ciudad:</span> {{ $user->city }}</p>
                    <p><span class="font-weight-bold">Provincia:</span> {{ $user->province }}</p>
                    <p><span class="font-weight-bold">Número de Tarjeta de Crédito:</span> {{ $user->cc_number }}</p>
                    <p><span class="font-weight-bold">Rol:</span> @if ($user->role == 1) Administrador @else Cliente @endif </p>
                    <p><span class="font-weight-bold">Día de Registro:</span> {{ $user->created_at }}</p>
                    <div class="col-12 d-flex justify-content-end text-center mb-2">
                        <a href="{{ route('admin.users.index') }}"><div class="btn btn-outline-danger mx-1">Volver</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
