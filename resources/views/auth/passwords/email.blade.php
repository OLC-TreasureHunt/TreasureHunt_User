@extends('layouts.app')

@section('title', trans('passwords.page_title'))
@section('contents')
    <section class="pw-reset-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <h2 class="text-center">{{ trans('passwords.page_title') }}</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @else
                        <form method="POST" action="{{ route('password.email') }}" class="form-validation">
                            @csrf

                            <div class="form-label-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-center d-none">
                                <a href="{{ route('login') }}" class="btn btn-primary">{{ trans('buttons.login') }}</a>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-success btn-submit">{{ trans('passwords.button.reset') }}</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
