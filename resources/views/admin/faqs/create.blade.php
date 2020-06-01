@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" action=" {{route('admin.faqs.store')}} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="POST"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">NUEVA FAQS</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="pregunta">Pregunta:</label>
                        <input class="form-control" placeholder="Nombre de la categoría" name="pregunta" value="{{ old('pregunta') }}">
                    </div>

                    <div class="form-group">
                        <label for="respuesta">Respuesta:</label>
                        <input class="form-control" placeholder="Nombre de la categoría" name="respuesta" value="{{ old('respuesta') }}">
                    </div>

                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.faqs.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection