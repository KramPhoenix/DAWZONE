@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column justify-content-center"><a href=" {{ route('admin.products.create') }}" class="btn btn-primary"><span><strong>CREAR UN NUEVO PRODUCTO</strong></span></a>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TÍTULO</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">PRECIO</th>
                <th scope="col">MARCA</th>
                <th scope="col">CATEGORÍA</th>
                <th scope="col">ACTIVO</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

@endsection
