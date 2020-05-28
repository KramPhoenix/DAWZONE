@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column">
        <h2 class="mb-4">LISTADO DE CLIENTES</h2>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE COMPLETO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col">CIUDAD</th>
                <th scope="col">Nº TARJETA</th>
                <th scope="col">ROL</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{  $user->surname }}, {{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->cc_number }}</td>
                    <td>{{ $user->role }}</td>

                    <td class="d-flex">
                        <a href="{{ route('admin.users.show' , $user->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
