@extends('layouts.app')

@section('content')
    <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
        <h3 class="ml-4 p-4"><u>Preguntas y respuestas frecuentes</u></h3>
        <div class="container">
            @if(count($faqs) == 0)
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="col-lg-8 alert-info p-4">
                        <strong>Actualmente no hay FAQS disponibles!</strong>
                    </div>
                </div>
            @endif
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($faqs as $faq)
                    <div class="panel panel-default bg-white mb-4">
                        <div class="panel-heading p-3" role="tab" id="heading{{$faq->id}}">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                    {{$faq->question}} <i class="fas fa-chevron-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                            <div class="panel-body px-3 mb-4">
                                <p><em>"{{ $faq->answer }}"</em></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
