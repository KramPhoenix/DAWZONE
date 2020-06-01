@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column align-items-center">
        <div class="w-100 d-flex justify-content-between">
            <h2>LISTADO DE PRODUCTOS</h2>
            <a href=" {{ route('admin.products.create') }}" class="btn btn-primary mb-4"><span><strong>CREAR UN NUEVO PRODUCTO</strong></span></a>
        </div>

        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TÍTULO</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">PRECIO</th>
                <th scope="col">MARCA</th>
                <th scope="col">CATEGORÍA</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td><img class="img-fluid" width="40" height="40" src="/img/products/{{ $product->image }}"></td>
                        <td>{{ substr($product->description, 0, 40) }}... </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->brand_id }}</td>
                        <td>{{ $product->category_id }}</td>

                        <td class="d-flex">
                            <a href="{{ route('admin.products.edit' , $product->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.products.destroy' , $product->id) }}" method="POST">
                                @method('post')
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
