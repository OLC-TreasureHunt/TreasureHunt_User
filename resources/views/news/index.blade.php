@extends('layouts.app')

@section('title', trans('news.title'))

@section('contents')
<?php
    $languages = config('lang');
    $genders = config('gender');
?>
<div class="body-min-height back-semitrans-theme">
    <div class="container">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('news.page_title') }}</h1>
                    <span>{{ trans('news.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        
        <section id="page-content" class="background-transparent">
            <div class="container" id="news-page" v-cloak>
                <div class="card back-semi-theme border-0">
                    <div class="card-body" v-if="news.data !== undefined && news.data.length > 0">
                        <div class="row top-news">
                            <div class="col-lg-9 col-md-12">
                                <div class="row mb-4 d-none d-sm-flex" v-if="top.id !== undefined">
                                    <div class="col-md-7 col-12">
                                        <a v-bind:href="news_link(top.id)" ><img class="img-fluid" :src="top.image"></a>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="post-item-description">
                                            <span class="post-meta-date">@{{ top.created_at | serverTime2LocalTime }}</span>
                                            <h2><a v-bind:href="news_link(top.id)" >@{{ top.title }}</a></h2>
                                            <div class="post-content">@{{ top.content | html2str}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex align-items-stretch" 
                                        v-for="(item, index) in news.data" >
                                        <div class="card border-0 background-transparent">
                                            <div class="">
                                                <div class="post-image">
                                                    <a v-bind:href="news_link(item.id)">
                                                        <img :src="item.image">
                                                    </a>
                                                </div>
                                                <div class="post-item-description">
                                                    <span class="post-meta-date"><i class="icon-calendar"></i>@{{ item.created_at | serverTime2LocalTime }}</span>
                                                    <h2><a v-bind:href="news_link(item.id)" >@{{ item.title }}</a></h2>
                                                    <div class="post-content">@{{ item.content | html2str }}</div>
                                                    <a v-bind:href="news_link(item.id)" class="item-link">@lang('news.button.read_more')<i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <pagination 
                                    class="pagination-flat justify-content-center mb-0 pagination-circle pagination-theme" 
                                    style="padding-top: 15px; padding-bottom: 15px"
                                    :limit=2
                                    :data="news" 
                                    @pagination-change-page="loadNews" >
                                    <span slot="prev-nav"><i class="icon-chevron-left"></i></span>
                                    <span slot="next-nav"><i class="icon-chevron-right"></i></span>
                                </pagination>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                @include('news.sidebar')
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center" v-else>
                        @lang('news.message.no_data')
                    </div>
                </div>
                
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ cAsset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ cAsset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ cAsset('js/pages/news.js') }}"></script>
@endsection
