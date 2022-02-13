@extends('layouts.afterlogin')

@section('contents')
    <section class="row flexbox-container" style="margin-top: 140px;">
        <div class="col-xl-12 col-md-12 col-10 d-flex justify-content-center px-0">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                        <img src="../../../app-assets/images/pages/forgot-password.png" alt="branding logo">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2 py-1">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">{{ trans('register.resend_email.title') }}</h4>
                                </div>
                            </div>
                            <p class="px-2 mb-0">{{ trans('register.resend_email.description') }}</p>
                            <div class="card-content">
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @else
                                    <form method="POST" action="{{ route('send.email') }}">
                                        @csrf
                                        <div class="form-label-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="float-md-right d-block mb-1">
                                            <button class="btn btn-primary btn-block px-75">{{ trans('register.resend_email.send') }}</button>
                                        </div>
                                    </form>
									@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
