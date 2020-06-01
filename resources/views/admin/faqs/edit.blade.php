@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" action=" {{route('admin.faqs.update', $faq->id)}} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="PATCH"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">EDITAR FAQS (ID: {{ $faq->id }})</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="pregunta">Pregunta:</label>
                        <input class="form-control @error('pregunta') is-invalid @enderror" placeholder="Nombre de la categoría" name="pregunta" value="{{ $faq->question }}">

                        @error('pregunta')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="respuesta">Respuesta:</label>
                        <input class="form-control @error('respuesta') is-invalid @enderror" placeholder="Nombre de la categoría" name="respuesta" value="{{ $faq->answer }}">

                        @error('respuesta')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
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
