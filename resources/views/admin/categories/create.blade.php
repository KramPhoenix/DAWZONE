@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" action=" {{route('admin.categories.store')}} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="POST"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">NUEVA CATEGORÍA</div>
                <div class="card-body">
                    <label for="titulo">Nombre:</label><input class="form-control mb-4" placeholder="Nombre de la categoría" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.categories.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection
