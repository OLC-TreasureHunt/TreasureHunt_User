@extends('layouts.app')

@section('title', trans('tree.title'))

@section('contents')

@section('styles')
    <style>
        /* #tree-page table {
            margin: 0 auto;
        } */
    </style>
@endsection

<div class="body-min-height back-semitrans-theme">
    <div class="container">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('tree.page_title') }}</h1>
                    <span>{{ trans('tree.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        
        <section id="page-content" class="background-transparent">
            <div class="container vld-parent">
                <loading v-model:active="isLoading"
                    :can-cancel="true"
                    :is-full-page="false"
                    loader="dots" ></loading>

                <div class="card back-semi-theme border-theme  border-theme p-20">
                    <div class="card-body table-responsive p-0">
                        <label class="d-none">
                            LandOrPortable
                            <input type="checkbox" v-model="landscape" value="1">
                        </label>
                        <binary-tree id="tree-page"
                            :json="data" 
                            :class="{landscape: landscape.length}" 
                            :trans="trans"
                            @click-node="clickNode"></binary-tree>
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
    <script src="{{ cAsset('js/pages/tree.js') }}"></script>
@endsection
