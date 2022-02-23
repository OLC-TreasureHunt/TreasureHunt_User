@extends('layouts.app')

@section('title', trans('download.title'))

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
                    <h1>{{ trans('download.page_title') }}</h1>
                    <span>{{ trans('download.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        
        <section id="page-content" class="background-transparent">
            <div class="container" id="download-page" v-cloak>
                <div class="card back-semi-theme border-theme border-theme  ">
                    <div class="card-body">
                        <div class="card border-theme" v-for="(file, index) in files.data" style="background-color: #cd9e5a;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="font-weight-600 text-theme">@{{ file.file_name }}</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="file-date">@lang('download.filesize')</div>
                                        <div class="file-date">@{{ file.file_size | bytesToSize }}</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="file-date">@lang('download.date')</div>
                                        <div class="file-date">@{{ file.created_at | serverTime2LocalTime }}</div>
                                    </div>
                                    <div class="col-md-2">
                                        <a v-bind:href="file.url" class="btn btn-theme">@lang('download.button.download')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <pagination 
                            class="pagination-flat justify-content-center mb-0 pagination-circle pagination-theme" 
                            style="padding-top: 15px; padding-bottom: 15px"
                            :limit=2
                            :data="files" 
                            @pagination-change-page="loadFiles" >
                            <span slot="prev-nav"><i class="icon-chevron-left"></i></span>
                            <span slot="next-nav"><i class="icon-chevron-right"></i></span>
                        </pagination>
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
    <script src="{{ cAsset('js/pages/download.js') }}"></script>
@endsection
