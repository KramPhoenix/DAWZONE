@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column justify-content-center align-items-center">
        <div class="w-100 d-flex justify-content-between">
            <h2>LISTADO DE CATEGORÍAS</h2>
            <a href=" {{ route('admin.categories.create') }}" class="btn btn-primary mb-4"><span><strong>CREAR UNA NUEVA CATEGORÍA</strong></span></a>
        </div>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.categories.edit' , $category->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.categories.destroy' , $category->id) }}" method="POST">
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
