@extends('layouts.app')


@section('content')
    <section id="editar" class="d-flex justify-content-center mt-5">
        <form class="col-lg-6 p-4 d-flex flex-column bg-white" enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="post">
            <div class="rounded-pill font-weight-bold mb-4"><u>EDITAR PRODUCTO (ID: {{$product->id}})</u></div>
            @method('post')
            @csrf
            <input type="hidden" name="_method" value="PATCH"/>

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input class="form-control" placeholder="Título del producto" name="titulo" value="{{ $product->title }}">
            </div>

            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" class="form-control-file" name="imagen" value="">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input class="form-control" placeholder="Descripción del producto" name="descripcion" value="{{ $product->description }}">
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input class="form-control" placeholder="Precio del producto" name="precio" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="marca">Marca: </label>
                <select class="form-control" name="marca">

                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" @if( $brand->id == $product->brand_id) selected @endif> {{$brand->name}} </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría: </label>
                <select class="form-control" name="categoria">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if( $category->id == $product->category_id) selected @endif> {{$category->name}} </option>
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
