@extends('layouts.before_login')

@section('title', trans('register.title'))

@section('contents')
    <div class="row mt-4 mb-5">
        <div class="col-xl-2 col-md-2 col-2 "></div>
        <div class="col-xl-8 col-md-8 col-8 d-flex justify-content-center">
            <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="{{ cAsset('app-assets/images/pages/maintenance-2.png') }}" class="img-fluid align-self-center" alt="branding logo">
                        <h1 class="font-large-2 my-1">{{ trans('register.activation.active') }}</h1>
                        <fieldset>
                            @if ($ret == 0)
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>
                                        {!! trans('register.activation.success', ['treasure_id' => $treasure_id, 'bicorn_id' => $bicorn_id]) !!}
                                    </strong>
                                </div>
                            @elseif($ret == 1)
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>
                                        {{ trans('register.activation.no_token') }}
                                    </strong>
                                </div>
                            @elseif($ret == 2)
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>
                                        {{ trans('register.activation.invalid_token') }}
                                    </strong>
                                </div>
                            @elseif($ret == 3)
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>
                                        {{ trans('register.activation.expired_token') }}
                                    </strong>
                                </div>
                            @elseif ($ret == 4)
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>
                                        {{ trans('register.activation.failed') }}
                                    </strong>
                                </div>
                            @elseif ($ret == 5)
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>
                                        {!! trans('register.activation.already_exist', ['treasure_id' => $treasure_id, 'bicorn_id' => $bicorn_id]) !!}
                                    </strong>
                                </div>
                            @endif
                        </fieldset>
                        <a class="btn btn-primary btn-lg mt-1" href="{{ route('login') }}">{{ trans('register.btn.login') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-2 col-2 "></div>
    </div>

@endsection
