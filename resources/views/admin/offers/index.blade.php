@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-10 d-flex flex-column align-items-center">
        <div class="w-100 d-flex justify-content-between">
            <h2>LISTADO DE OFERTAS</h2>
            <a href=" {{ route('admin.offers.create') }}" class="btn btn-primary mb-4"><span><strong>CREAR UNA NUEVA OFERTA</strong></span></a>
        </div>
        <table class="table col-lg-12">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">INICIO</th>
                <th scope="col">FINAL</th>
                <th scope="col">VALOR DESCUENTO</th>
                <th scope="col">% DESCUENTO</th>
                <th scope="col">ACTIVO</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td>{{ $offer->name }}</td>
                    <td>{{ $offer->start }}</td>
                    <td>{{ $offer->end }}</td>
                    <td>{{ $offer->value_discount }}</td>
                    <td>{{ $offer->percentage_discount }}</td>
                    <td>{{ $offer->active }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.offers.edit' , $offer->id) }}" class="btn btn-primary a-btn-slide-text mr-2">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.offers.destroy' , $offer->id) }}" method="POST">
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
