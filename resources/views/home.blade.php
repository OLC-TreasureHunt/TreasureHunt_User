@extends('layouts.app')

@section('title', trans('app.menu.home'))

@section('contents')
    <!-- WELCOME -->

    <div id="welcome">
        <section class="p-b-0 p-t-0 background-transparent">
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
                            @if (isset($userInfo->battleInfo))
                                @if ($lastData)
                                    <h4 class="m-b-0">@lang('home.at_moment', ['time' => serverTime2Local($lastData->display_time?? $lastData->created_at)])</h4>
                                @endif
                                <h4 class="m-t-0 text-bold pink-emphass">
                                    {!! trans('home.your_level', ['level' => $userInfo->battleInfo->levelInfo->name->level]) !!}
                                </h4>

                                <h4 class="m-t-0 text-bold pink-emphass">
                                    {{ trans('home.current_bonus', [
                                        'amount' => _number_format($userInfo->battleInfo->basic_bonus * $userInfo->battleInfo->bonus_rate / 100, 0)
                                    ])}}
                                </h4>
                                
                                @if ($userInfo->battleInfo->level == 10)
                                    <h4 class="m-t-0 text-bold pink-emphass">@lang('home.current_is_max')</h4>
                                @else
                                    @if (isset($userInfo->binaryGradeUp))
                                        <h4 class="m-t-0 text-bold pink-emphass">@lang('home.can_upgrade', [
                                            'amount' => _number_format($userInfo->binaryGradeUp->need_bet, 0)
                                    ])</h4>
                                    @endif
                                @endif
                                
                                {{-- @if (isset($userInfo->binaryGradeDown) && $userInfo->binaryGradeDown->need_loss != 0)
                                <h4 class="lead mb-0">@lang('home.may_graydown', [
                                    'direct' => $userInfo->binaryGradeDown->position == 1? trans('home.direct.left') : trans('home.direct.right'),
                                    'amount' => _number_format($userInfo->binaryGradeDown->need_loss, 0)
                                ])</h4>
                                @endif --}}
                            @else
                                <h4 class="m-b-0 text-center">{!! trans('home.welcome') !!}</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="container home-tree mt-0 position-relative">
                @if (isset($userInfo->battleInfo))
                <div class="equipment home-tool text-center" data-animate="animate__fadeInLeft">
                    <img class="img-fluid mb-sm-5 pt-5" src="{{ $userInfo->battleInfo->levelInfo->image }}"/>
                </div>
                @endif
            </div>
            <div class="container home-tree mt-0 pt-5 position-relative container-tree">
                <home-tree id="tree-page"
                    :json="data" 
                    :class="{landscape: landscape.length}" 
                    :trans="trans"></home-tree>
            </div>
        </section>
        
        <section class="background-transparent pt-0" id="alliance">
            <div class="container p-t-0">
                <h4 class="text-primary p-10"><span class="text-light back-theme p-10 rounded">@lang('home.alliance')</span></h4>
                <ul class="grid grid-4-columns">
                    @foreach ($alliances as $alliance)
                        <li class="alliance-item border-0">
                            <div class="card border-0 background-transparent">
                                <div class="card-body p-0 background-transparent">
                                    <a href="{{ $alliance->site_url}}" target="_blank"><img class="img_alliance" src="{{ $alliance->site_image}}" /></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <div id="arrows-examples">
            <div class="arrow-up" id="alliance-show" v-on:click="showAlliance"></div>
        </div>
    </div>
    
@endsection


@section('scripts')
    <script>
        let trans = @json(trans('home'));
    </script>
    <script src="{{ cAsset('js/pages/home.js') }}"></script>
@endsection
