@extends('layouts.app')

@section('content')
    <div id="noticias" class="p-4">
        @if(count($news) == 0)
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="col-lg-8 alert-info p-4">
                    <strong>Actualmente no hay notícias disponibles!</strong>
                </div>
            </div>
        @endif

        @foreach($news as $new)
        <a href="{{ $new->link }}">
            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/img/news/{{$new->image}}" class="w-100">
                    </div>
                    <div class="col-md-8 px-3 p-3">
                        <div class="card-block px-3">
                            <h4 class="card-title">{{ $new->title }}</h4>
                            <p class="card-text">{{ $new->description }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection
