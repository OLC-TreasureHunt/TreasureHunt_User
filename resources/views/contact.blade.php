@extends('layouts.app')

@section('title', trans('contact.title'))
@section('contents')
    <div class="container body-min-height">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark ">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('contact.page_title') }}</h1>
                    <span>{{ trans('contact.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        @if ($errors->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section id="page-content" class="">
            <div class="container">
                <div class="col-lg-8 m-auto">
                    <form action="{{ route('contact.send') }}" role="form" method="post">
                        @csrf

                        <div class="form-group col-md-12">
                            <label for="email" class="text-dark">{{ trans('contact.email_title') }}</label>
                            <input type="email" 
                                aria-required="true" 
                                name="email" 
                                class="form-control input-dark-bg text-dark required border-theme @error('email') is-invalid @enderror" 
                                placeholder="{{ trans('contact.email_placeholder') }}"
                                value="{{ old('email')?? (Auth::user()? Auth::user()->email : '')}}" >
                            @error('email')
                                <div class="is-invalid">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="subject" class="text-dark">{{ trans('contact.subject_title') }}</label>
                            <input 
                                type="text" 
                                name="title" 
                                class="form-control input-dark-bg text-dark  border-theme required @error('title') is-invalid @enderror" 
                                value="{{ old('title')?? ''}}"
                                placeholder="{{ trans('contact.subject_placeholder') }}">
                            @error('title')
                                <div class="is-invalid">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-dark">{{ trans('contact.message_title') }}</label>
                            <textarea 
                                type="text" 
                                name="content" 
                                rows="5" 
                                class="form-control input-dark-bg text-dark required border-theme @error('message') is-invalid @enderror" 
                                value="{{ old('content')?? ''}}"
                                placeholder="{{ trans('contact.message_placeholder') }}">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="is-invalid">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="m-auto text-center">
                            <button class="btn btn-gradient-theme border-theme" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;{{ trans('buttons.send') }}</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            $('#top_contact').addClass('text-danger');
        });
    </script>
@endsection