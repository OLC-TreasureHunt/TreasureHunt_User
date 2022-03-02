@extends('layouts.app')

@section('title', trans('history.title'))

@section('contents')
<?php
    $languages = config('lang');
    $genders = config('gender');
?>

@section('styles')
    <style>
        #game_history div[name='HeaderSettings']>button,
        #bonus_history div[name='HeaderSettings']>button {
            display: none;
        }
    </style>
@endsection
<div class="body-min-height back-semitrans-theme">
    <div class="container">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('history.page_title') }}</h1>
                    <span>{{ trans('history.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        
        <section id="page-content" class="background-transparent">
            <div class="container" id="history-page">
                <div class="tabs tabs-vertical">
                    <div class="row">
                        <div class="col-md-3 tab-border-right mb-3">
                            <ul class="nav flex-column nav-tabs border-1 main-tab" id="setting_tab" role="tablist" aria-orientation="vertical">
                                <li class="nav-item">
                                    <a @class(['nav-link no-border', 
                                        'active' => $param == 'game']) 
                                        id="game_history-tab" 
                                        data-bs-toggle="tab" 
                                        href="#game_history" 
                                        role="tab" 
                                        aria-controls="game_history" 
                                        aria-selected="true"><b>{{ trans('history.game_history') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link no-border', 
                                        'active' => $param == 'bonus']) 
                                        id="bonus_history-tab" 
                                        data-bs-toggle="tab" 
                                        href="#bonus_history" 
                                        role="tab" 
                                        aria-controls="bonus_history" 
                                        aria-selected="true"><b>{{ trans('history.bonus_history') }}</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content" id="setting_tab_content">
                                <div @class(['tab-pane fade', 
                                    'show active' => $param == 'game']) 
                                    id="game_history" role="tabpanel" aria-labelledby="game_history-tab">
                                    <div class="card back-semi-theme border-theme border-theme  ">
                                        <div class="card-body">
                                            <h6>@lang('history.game_history')</h6>
                                            <game-history trans='@json(trans('history'))'></game-history>
                                        </div>
                                    </div>
                                </div>
                                <div @class(['tab-pane fade', 
                                    'show active' => $param == 'bonus'])
                                    id="bonus_history" role="tabpanel" aria-labelledby="bonus_history-tab">
                                    <div class="card back-semi-theme border-theme  border-theme ">
                                        <div class="card-body">
                                            <h6>@lang('history.bonus_history')</h6>
                                            <bonus-history trans='@json(trans('history'))'></bonus-history>
                                        </div>
                                    </div>
                                </div>
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
        let trans = @json(trans('tree'));
    </script>
    <script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ cAsset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ cAsset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ cAsset('js/pages/history.js') }}"></script>
    

@endsection
