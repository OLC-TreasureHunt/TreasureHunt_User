@extends('layouts.app')

@section('title', trans('app.menu.home'))

@section('contents')
    <!-- WELCOME -->
    <section id="welcome" class="p-b-0 p-t-0">
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
            <div class="slide welcome" data-bg-image="{{ asset('images/background.webp') }}">
                <div class="container p-t-0">
                    <div class="slide-captions text-start text-light title">
                        <!-- Captions -->
                        <div class="heading-text heading-section text-light text-center mb-7" data-animate="animate__fadeInUp">
                            <img id="mv-img" class="mv-img" src="{{ asset('images/visual-text.png') }}" />
                        </div>
                        <!-- end: Captions -->

                        <div class="col-lg-5 left text-light animate__animated text-center" 
                             data-animate="animate__fadeInLeft">
                            <img class="img-fluid" src="{{ asset('images/1.png') }}" />
                        </div>
                        <div class="col-lg-7 right text-light animate__animated rounded"
                            data-animate="animate__fadeInRight">
                            <div class="hero-heading-2 text-light back-theme-trans">
                            <h4 class="m-b-0">@lang('home.at_moment')</h4>
                            <h3 class="m-t-0 text-bold text-pink">{!! trans('home.your_level') !!}</h3>
                            <p class="lead">@lang('home.can_upgrade')</p>
                            <p class="lead mb-0">@lang('home.may_graydown')</p>
                        </div>
                    </div>
                </div>
                <div class="container table-responsive home-tree mt-0 pt-5">
                    <home-tree id="tree-page"
                        :json="data" 
                        :class="{landscape: landscape.length}" 
                        :trans="trans"></home-tree>
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


@section('scripts')
    <script>
        let trans = @json(trans('home'));
    </script>
    <script src="{{ cAsset('js/pages/home.js') }}"></script>
@endsection
