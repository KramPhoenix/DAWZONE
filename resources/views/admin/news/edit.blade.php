@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" enctype="multipart/form-data" action=" {{route('admin.news.update', $news->id)}} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="PATCH"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">EDITAR NOTÍCIA {{ $news->title }}</div>
                <div class="card-body">
                    <label for="titulo">Título:</label><input class="form-control mb-4" placeholder="Título de la notícia" name="titulo" value="{{ $news->title }}">
                    <label for="imagen">Imagen:</label><input type="file" class="form-control-file mb-4" name="imagen" value="">
                    <label for="descripcion">Descripción:</label><textarea class="form-control mb-4" placeholder="Descripción de la notícia..." rows="3" name="descripcion">{{ $news->description }}</textarea>
                    <label for="titulo">URL:</label><input class="form-control mb-4" placeholder="Link de la notícia" name="url" value="{{ $news->link }}">
                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.news.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection
