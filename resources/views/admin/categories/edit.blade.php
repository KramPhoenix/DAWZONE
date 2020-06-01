@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" action=" {{ route('admin.categories.update', $category->id) }} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="PATCH"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">EDITAR CATEGORÍA ({{ $category->name }})</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="titulo">Nombre:</label>
                        <input class="form-control" placeholder="Nombre de la categoría" name="nombre" value="{{ $category->name }}">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.categories.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection
