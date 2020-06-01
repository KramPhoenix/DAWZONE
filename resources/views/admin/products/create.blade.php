@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" enctype="multipart/form-data" action="{{ route('admin.products.store') }}" method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="POST"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">NUEVO PRODUCTO</div>
                <div class="card-body">

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

                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.products.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection
