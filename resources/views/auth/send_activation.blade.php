@extends('layouts.app')

@section('title', trans('register.title'))

@section('contents')
<div class="row mt-4 mb-5">
    <div class="col-xl-2 col-md-2 col-2 "></div>
    <div class="col-xl-8 col-md-8 col-8 d-flex justify-content-center">
        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
            <div class="card-body text-center">
                <img src="{{ cAsset('app-assets/images/pages/not-authorized.png') }}" class="img-fluid align-self-center" alt="branding logo">
                <h1 class="font-large-2 my-2">{{ trans('register.activation.verify_email') }}</h1>
                @if ($ret)
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>
                            <i class="zmdi zmdi-check"></i>
                            {{ trans('register.activation.sent_token') }}<br>
                            <p class="text-start text-light">{!! trans('register.desc') !!}</p>
                        </strong><br>
                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="zmdi zmdi-close"></i></button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i>
                            {{ trans('register.activation.send_failed') }}
                        </strong>
                    </div>
                @endif

                <p class="text-gray">{{ trans('register.activation.check_email') }}</p>
                <a class="btn btn-primary btn-lg mt-2" href="{{ route('login') }}">{{ trans('register.btn.login') }}</a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-2 col-2 "></div>
</div>
@endsection
