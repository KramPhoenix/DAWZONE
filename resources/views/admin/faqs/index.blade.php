@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column align-items-center">
        <div class="w-100 d-flex justify-content-between">
            <h2>LISTADO DE FAQS</h2>
            <a href=" {{ route('admin.faqs.create') }}" class="btn btn-primary mb-4"><span><strong>CREAR UNA NUEVA</strong></span></a>
        </div>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PREGUNTA</th>
                <th scope="col">RESPUESTA</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.faqs.edit' , $faq->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.faqs.destroy' , $faq->id) }}" method="POST">
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
