@extends('layouts.app')

@section('content')
    <section id="valoracion" class="d-flex justify-content-center mt-5">
        <form class="col-lg-8 p-4 d-flex flex-column bg-white" action=" {{ route('product.addValuation', $product->id) }} " method="post">
            <div class="rounded-pill font-weight-bold mb-4"><u>VALORAR PRODUCTO ( {{$product->title}} )</u></div>
            @method('post')
            @csrf
            <input type="hidden" name="_method" value="POST"/>
            <div class="form-group">
                <label class="font-weight-bold" for="direccion">Valoración general: </label>
                <select class="form-control" name="valoracion_g">
                    <option selected disabled>Selecciona la cantidad de estrellas...</option>
                    <option value="1"> ★ 1 estrellas</option>
                    <option value="2"> ★★ 2 estrellas</option>
                    <option value="3"> ★★★ 3 estrellas</option>
                    <option value="4"> ★★★★ 4 estrellas</option>
                    <option value="5"> ★★★★★ 5 estrellas</option>
                </select>
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="valoracion_p">Valoración personal: </label>
                <textarea type="text" class="form-control" id="valoracion_p" name="valoracion_p" rows="4"></textarea>
            </div>


            <input type="submit" name="submit" class="btn btn-success text-uppercase align-self-end" value="VALORAR">
        </form>
    </section>
@endsection
