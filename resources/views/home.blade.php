@extends('layouts.app')

@section('title', trans('app.header.home'))

@section('contents')
    <!-- WELCOME -->
    <section id="welcome" class="p-b-0 p-t-0">
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
            <div class="slide welcome" data-bg-video="{{ cAsset('video/background.mp4') }}">
                <div class="bg-overlay"></div>
                <div class="container p-t-0">
                    <div class="slide-captions text-start text-light title">
                        <!-- Captions -->
                        <div class="heading-text heading-section text-light text-center" data-animate="animate__fadeInUp">
                            <h2>{{ sprintf(trans('app.welcome'), env('APP_NAME')) }}</h2>
                            <span class="lead p-t-10" style="display: block;">{{ trans('app.welcome_des') }}</span>
                        </div>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: WELCOME -->
    <!-- WHAT WE DO -->
    @if(isset($news_list) && count($news_list) > 0)
        <section class="background-gray">
            <div class="container">
                <div class="news-sec">
                    <div class="news-content">
                        <h3>@lang('dashboard.news_title')</h3>
                        <ul class="list-icon list-icon-caret list-icon-colored">
                            @foreach($news_list as $key => $news)
                                <li class="news-item">
                                    <a href="{{ route('news.detail', $news->id) }}" class="text-light">
                                        <span class="news-title">{{ $news->title }}</span>
                                        <span class="float-right">{{ $news->registered_at }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('news') }}" class="show-all">@lang('buttons.more')</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- END WHAT WE DO -->

@endsection
