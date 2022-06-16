@extends('layouts.app')

@section('title', trans('real.title'))

@section('contents')

@section('styles')
    <style>
        #realmap_list div[name='HeaderSettings']>button {
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
                    <h1>{{ trans('real.page_title') }}</h1>
                    @if ($lastData)
                    <span>@lang('real.page_title_desc', ['date' => serverTime2Local($lastData->display_time?? $lastData->created_at)])</span>
                    @endif
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>

        <section id="page-content" class="background-transparent" v-cloak>
            <div class="container p-0" id="history-page">
                <div class="row">
                    <h5 class="text-bold">@lang('real.field.agents')</h5>
                    <table class="table d-block" id="real-summary">
                        <tr>
                            <td>@lang('real.field.people_count')</td>
                            <td style="text-align: right">{{ _number_format($childrenCount, 0) }}@lang('real.field.peoples')</td>
                        </tr>
                        <tr>
                            <td>@lang('real.field.loss')</td>
                            <td style="text-align: right">{{ _number_format($referral->below_loss, 0) }}@lang('real.field.jpy')</td>
                        </tr>
                        <tr>
                            <td>@lang('real.field.bets')</td>
                            <td style="text-align: right">{{ _number_format($referral->below_bet, 0) }}@lang('real.field.jpy')</td>
                        </tr>
                        <tr>
                            <td>@lang('real.field.basic')</td>
                            <td style="text-align: right">{{ _number_format($basicBonus, 0) }}@lang('real.field.jpy')</td>
                        </tr>
                    </table>
                    <div>
                        <button type="button" class="btn btn-theme" @click="show_table">@lang('real.field.list')</button>
                    </div>
                </div>
                <div class="row" :class="{ 'd-none': showTable}">
                    <h5 class="text-bold">@lang('real.field.agents_list')</h5>
                    <div class="col-md-12">
                        <div id="bonus_history" role="tabpanel" aria-labelledby="bonus_history-tab" >
                            <span class="text-bold">@lang('real.field.agent_id') @{{ currentUser.affiliate_id }}</span>
                            <span class="m-15 text-bold">@{{ currentUser.stepFromTop }}@lang('real.field.agent_steps')</span>
                            <button type="button" class="btn btn-primary" @click="search_upward">@lang('real.field.upward')</button>

                            <div id="realmap_list" class="card back-semi-theme border-theme  border-theme ">
                                <div class="card-body">
                                    <real-map trans='@json(trans('real'))' 
                                        :target='current' 
                                        @update-steps="updateSteps"
                                        @update-current="updateCurrent"></real-map>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content -->
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let trans = @json(trans('real'));
        let user_id = @json( $userId );
        let historyTrans = @json(trans('history'));
    </script>
    <script src="{{ cAsset('js/pages/real.js') }}"></script>
@endsection
