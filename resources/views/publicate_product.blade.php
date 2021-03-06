@extends('layouts.app')


@section('content')
    <section id="publicar_producto" class="d-flex justify-content-center mt-5">
        <form class="col-lg-6 p-4 d-flex flex-column bg-white" enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
            <div class="rounded-pill font-weight-bold mb-4"><u>PUBLICAR PRODUCTO</u></div>
            @method('post')
            @csrf
            <input type="hidden" name="_method" value="POST"/>

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input class="form-control" placeholder="Título del producto" name="titulo" value="{{ old('titulo') }}">
            </div>

            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" class="form-control-file" name="imagen" value="">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input class="form-control" placeholder="Descripción del producto" name="descripcion" value="{{ old('descripcion') }}">
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input class="form-control" placeholder="Precio del producto" name="precio" value="{{ old('precio') }}">
            </div>

            <div class="form-group">
                <label for="marca">Marca: </label>
                <select class="form-control" name="marca">
                    <option selected disabled>Selecciona una marca...</option>

                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"> {{$brand->name}} </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría: </label>
                <select class="form-control" name="categoria">
                    <option selected disabled>Selecciona una categoría...</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{$category->name}} </option>
                    @endforeach

                </select>
            </div>

            <div class="d-flex justify-content-end text-center">
                <a href="{{ route('products.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>
                <input class="btn btn-success" type="submit" name="submit" value="Guardar">
            </div>
        </form>
    </section>
@endsection
