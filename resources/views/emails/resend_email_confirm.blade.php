@extends('layouts.afterlogin')

@section('contents')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card-body">
                    <section class="row flexbox-container">
                        <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-center">
                            <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="{{ cAsset('app-assets/images/pages/not-authorized.png') }}" class="img-fluid align-self-center" alt="branding logo">
                                        <h1 class="font-large-2 my-2">{{ trans('register.activation.verify_email') }}</h1>
                                            @if (Session::get('success') == 1)
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <strong>
                                                        <i class="zmdi zmdi-check"></i>
                                                        {{ trans('register.activation.sent_token') }}
                                                    </strong><br>
                                                </div>
                                            @elseif(Session::get('success') == -2)
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="zmdi zmdi-close"></i></button>
                                                    <strong>
                                                        <i class="zmdi zmdi-alert-triangle"></i>
                                                        {{ trans('register.activation.exist') }}
                                                    </strong>
                                                </div>
											@elseif(Session::get('success') == 0)
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="zmdi zmdi-close"></i></button>
                                                    <strong>
                                                        <i class="zmdi zmdi-alert-triangle"></i>
                                                        {{ trans('register.activation.not_exist') }}
                                                    </strong>
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
                                        <a class="btn btn-primary btn-lg mt-2" href="{{ route('login') }}">{{ trans('register.btn.login') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
