@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column align-items-center">
        <div class="w-100 d-flex justify-content-between">
            <h2>LISTADO DE NOTÍCIAS</h2>
            <a href=" {{ route('admin.news.create') }}" class="btn btn-primary mb-4"><span><strong>CREAR UNA NUEVA NOTÍCIA</strong></span></a>
        </div>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TÍTULO</th>
                <th scope="col">DESCRIPCIÓN</th>
                <th scope="col">URL</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->title }}</td>
                    <td>{{ substr($new->description, 0, 155) }}...</td>
                    <td>{{ $new->link }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.news.edit' , $new->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.news.destroy' , $new->id) }}" method="POST">
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
