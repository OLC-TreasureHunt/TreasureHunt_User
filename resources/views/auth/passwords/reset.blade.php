@extends('layouts.app')

@section('title', trans('passwords.page_title'))

@section('contents')
<section class="pw-reset-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-dark">{{ trans('passwords.page_title') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ isset($token) ? $token : Session::get('reset_token', '') }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-dark">{{ trans('passwords.email') }}</label>
                                <div class="col-md-6">
                                    <?php
                                        $retVal = Session::get('retVal');
                                        Session::forget('retVal');
                                        $email_correct = 1;
                                        if (isset($retVal) && $retVal < 0) {
                                            $email_correct = 0;
                                        }
                                    ?>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror {{ $email_correct == 0 ? 'is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ trans('passwords.email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (isset($retVal))
                                        @if($retVal == -99)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans('register.activation.not_register') }}</strong>
                                        </span>
                                        @elseif($retVal == -98)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ trans('register.activation.not_token') }}</strong>
                                            </span>
                                        @elseif($retVal == -90)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ trans('register.activation.not_register') }}</strong>
                                            </span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-dark">{{ trans('passwords.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ trans('passwords.password') }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-dark">{{ trans('passwords.password_confirmation') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('passwords.password_confirmation') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('passwords.page_title') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
