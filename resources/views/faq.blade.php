@extends('layouts.app')

@section('title', trans('faq.title'))
@section('contents')

<div class="body-min-height back-semitrans-theme">
    <div class="container ">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('faq.page_title') }}</h1>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        
        <section id="page-content" class="background-transparent">
            <div class="container">
                <div class="row">
                    @foreach ($faqs as $i => $faq)
                    <div class="col-lg-6">
                        <h3>{{ $faq->name }} <small>({{ count($faq->questions)}})</small></h3>
                        <p class="d-none">Adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam auam quaerat voluptatem.</p>
                        <div class="accordion toggle fancy radius clean">
                            @foreach ($faq->questions as $j => $question)
                            <div @class(["ac-item", "ac-active" => $j == 0])>
                                <h5 class="ac-title"><i class="fa fa-question-circle"></i>{{ $question->question }}</h5>
                                <div style="" class="ac-content">{!! $question->answer !!}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{{ cAsset('js/pages/base.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#top_contact').addClass('text-danger');
        });
    </script>
@endsection