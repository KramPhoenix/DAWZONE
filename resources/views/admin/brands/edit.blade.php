@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" action=" {{ route('admin.brands.update', $brand->id) }} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="PATCH"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">EDITAR MARCA ({{ $brand->name }})</div>
                <div class="card-body">
                    <label for="titulo">Nombre:</label><input class="form-control mb-4" placeholder="Nombre de la marca" name="nombre" value="{{ $brand->name }}">
                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.brands.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection
