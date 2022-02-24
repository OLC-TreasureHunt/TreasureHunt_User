@extends('layouts.app')

@section('title', trans('notice.title'))

@section('contents')
<div class="body-min-height back-semitrans-theme">
    <div class="container">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('notice.page_title') }}</h1>
                    <span>{{ trans('notice.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        
        <section id="page-content" class="background-transparent">
            <div class="container" id="notice-page" v-cloak>
                <div class="card back-semi-theme border-0">
                    <div class="card-body" v-if="notices.data !== undefined && notices.data.length > 0">
                        <div class="row" v-for="(item, index) in notices.data" >
                            <div class="row">
                                <div class="col-sm-2">@{{ item.created_at | serverTime2LocalTime }}</div>
                                <div class="col-sm-10 notice-hover" v-on:click="noticeClickHandler(item)">@{{ item.notice.title }}
                                    <span class="badge badge-primary" v-if="item.status == 0">@lang('notice.new')</span>
                                </div>
                            </div>
                            
                            <pagination 
                                class="pagination-flat justify-content-center mb-0 pagination-circle pagination-theme" 
                                style="padding-top: 15px; padding-bottom: 15px"
                                :limit=2
                                :data="notices" 
                                @pagination-change-page="loadNotices" >
                                <span slot="prev-nav"><i class="icon-chevron-left"></i></span>
                                <span slot="next-nav"><i class="icon-chevron-right"></i></span>
                            </pagination>
                        </div>
                    </div>
                    <div class="card-body text-center" v-else>
                        @lang('notice.message.no_data')
                    </div>
                </div>
                
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let trans = @json(trans('notice'));
    </script>
    <script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ cAsset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ cAsset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ cAsset('js/pages/notice.js') }}"></script>
@endsection
