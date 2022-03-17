@extends('layouts.app')

@section('title', trans('app.menu.home'))

@section('contents')
    <!-- WELCOME -->
    <section id="welcome" class="p-b-0 p-t-0">
        <div class="container p-t-0">
            <div class="slide-captions text-start text-light title pt-4">
                <!-- Captions -->
                <div class="heading-text heading-section text-light text-center mb-7 animate__animated pt-4" 
                    data-animate="animate__fadeInUp">
                    <img id="mv-img" class="mv-img" src="{{ asset('images/visual-text.png') }}" />
                </div>
                <!-- end: Captions -->

                <div class="col-lg-6 col-12 center text-light animate__animated rounded"
                    data-animate="animate__fadeInRight">
                    <div class="hero-heading-2 text-light back-theme-trans" style="border: 2px solid #6666ff">
                    @if ($lastData)
                        <h4 class="m-b-0">@lang('home.at_moment', ['time' => serverTime2Local($lastData->display_time?? $lastData->created_at)])</h4>
                    @endif
                    <h4 class="m-t-0 text-bold pink-emphass">
                        {!! trans('home.your_level', ['level' => $userInfo->battleInfo->levelInfo->level]) !!}
                    </h4>
                    @if ($userInfo->binaryGradeUp)
                        <p class="lead">@lang('home.can_upgrade', [
                            'amount' => _number_format($userInfo->binaryGradeUp->need_bet, 0)
                    ])</p>
                    @endif
                    <?php
                        if ($userInfo->binaryGradeDown) {
                            if (intval($userInfo->binaryGradeDown->left_loss) <= intval($userInfo->binaryGradeDown->right_loss)) {
                                $direct = 1;
                            } else {
                                $direct = 2;
                            }
                        }
                    ?>
                    @if ($userInfo->binaryGradeDown)
                    <p class="lead mb-0">@lang('home.may_graydown', [
                        'direct' => $direct == 1? trans('home.direct.left') : trans('home.direct.right'),
                        'amount' => $direct == 1? _number_format($userInfo->binaryGradeDown->left_loss, 0) : _number_format($userInfo->binaryGradeDown->right_loss, 0)
                    ])</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="container table-responsive home-tree mt-0 pt-5 position-relative">
            <div class="position-absolute home-tool" data-animate="animate__fadeInLeft">
                <img class="img-fluid mb-sm-5" src="{{ $userInfo->battleInfo->levelInfo->image }}" width="140"/>
            </div>

            <home-tree id="tree-page"
                :json="data" 
                :class="{landscape: landscape.length}" 
                :trans="trans"></home-tree>
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
