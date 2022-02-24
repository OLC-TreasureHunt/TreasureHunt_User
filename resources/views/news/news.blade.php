@extends('layouts.app')

@section('title', trans('news.title'))

@section('contents')
<div class="body-min-height back-semitrans-theme" id="news-detail" v-cloak>
    <div class="container">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>@{{ news.title }}</h1>
                    <span>@{{ news.created_at | serverTime2LocalTime }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        
        <section id="page-content" class="background-transparent">
            <div class="container" id="news-page" v-cloak>
                <div class="card back-semi-theme border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col-12">
                                        <img class="img-fluid w-100" :src="news.image">
                                    </div>
                                    <div class="col-12">
                                        <div class="post-item-description">
                                            <div class="post-content" v-html="news.content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                @include('news.sidebar')
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <a href="{{ route('news') }}" class="btn btn-rounded">@lang('news.button.back')</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let news = @json($news);
    </script>
    <script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ cAsset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ cAsset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ cAsset('js/pages/news-detail.js') }}"></script>
@endsection
