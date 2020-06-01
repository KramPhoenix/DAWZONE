@extends('layouts.app')

@section('content')
    <section class="contacto col-lg-12 d-flex justify-content-center">
        <form class="w-100 col-lg-10 mt-4 mb-4 d-flex justify-content-center" action=" {{ route('contactSend') }} " method="post">
            @method('post')
            @csrf
            <input type="hidden" name="_method" value="POST"/>
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header">CONTACTO</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Nombre completo:</label>
                            <input class="form-control @error('name') is-invalid @enderror" placeholder="Nombre completo del solicitante" name="name" value="">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control mb-4 @error('email') is-invalid @enderror" type="email" placeholder="Email del solicitante" name="email" value="">
                        </div>

                        <div class="form-group">
                            <label for="telephone">Teléfono/Móvil:</label>
                            <input class="form-control mb-4 @error('telephone') is-invalid @enderror" type="tel" placeholder="Teléfono/Móvil del solicitante" type="tel" name="telephone" value="">
                        </div>

                        <div class="form-group">
                            <label for="comment">Comentario:</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="Escríbenos un mensaje detallado sobre que necesitas para que podamos facilitar tu respuesta..." rows="4"></textarea>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input @error('condiciones') is-invalid @enderror" name="condiciones">
                            <label class="form-check-label" for="condiciones">He leído y acepto las condiciones de servicio de Marc$ERVICES</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end text-center mb-4">
                        <input class="btn btn-success mx-1" type="submit" name="submit" value="Enviar">
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
