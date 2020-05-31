@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" enctype="multipart/form-data" action=" {{ route('admin.products.update', $product->id) }} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="PATCH"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">EDITAR PRODUCTO ({{ $product->title }})</div>
                <div class="card-body">
                    <label for="titulo">Título:</label><input class="form-control mb-4" placeholder="Título del producto" name="titulo" value="{{ $product->title }}">
                    <label for="imagen">Imagen:</label><input type="file" class="form-control-file mb-4" name="imagen">
                    <label for="descripcion">Descripción:</label><input class="form-control mb-4" placeholder="Descripción del producto" name="descripcion" value="{{ $product->description }}">
                    <label for="precio">Precio:</label><input class="form-control mb-4" placeholder="Precio del producto" name="precio" value="{{ $product->price }}">
                    <label for="marca">Marca: </label><select class="form-control mb-4" name="marca">

                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @if( $brand->id == $product->brand_id) selected @endif> {{$brand->name}} </option>
                        @endforeach

                    </select>
                    <label for="categoria">Categoría: </label><select class="form-control mb-4" name="categoria">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if( $category->id == $product->category_id) selected @endif> {{$category->name}} </option>
                        @endforeach

                    </select>

                    <label for="oferta">Oferta: </label><select class="form-control mb-4" name="oferta">
                        <option value="-1">SIN OFERTA</option>
                        @foreach($offers as $offer)
                            <option value="{{ $offer->id }}" @if( $offer->id == $product->offer_id) selected @endif> {{$offer->name}} - @if($offer->value_discount != null) {{$offer->value_discount}} EUR @else {{$offer->percentage_discount}} % @endif  </option>
                        @endforeach

                    </select>

                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.products.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>
@endsection