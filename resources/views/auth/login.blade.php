@extends('layouts.app')

@section('title', trans('login.title'))

@section('contents')
<section class="pt-5 pb-5 back-theme position-relative">
    <div class="container-fluid d-flex flex-column">
        <div class="background-login"></div>
        <div class="row align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                  <div class="card back-semi-theme border-semi-theme">
                    <div class="card-body py-5 px-sm-5">
                        <div class="mb-5 text-center">
                            <h6 class="h3 mb-1">@lang('login.title')</h6>
                        </div><span class="clearfix"></span>
                        <form method="post" class="form-validate" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">@lang('login.login')</label>
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control back-semi-theme border-theme {{ $errors->has('affiliate_id') || $errors->has('email') ? 'is-invalid' : '' }}"
                                        name="login"
                                        placeholder="{{ trans('login.login') }}"
                                        required=""
                                        value="{{ old('affiliate_id') ?: old('email') }}"
                                        autofocus>

                                    <span class="input-group-text back-semi-theme border-theme "><i class="icon-user"></i></span>
                                </div>
                                @if ($errors->has('affiliate_id') || $errors->has('email'))
                                    <div class="is-invalid">{{ $errors->first('affiliate_id') ?: $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="password">@lang('login.password')</label>
                                <div class="input-group show-hide-password">
                                    <input
                                        type="password"
                                        class="form-control back-semi-theme border-theme  @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="{{ trans('login.password') }}"
                                        type="password"
                                        required="">
                                    <span class="input-group-text back-semi-theme border-theme "><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                </div>
                            </div>
                            <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">@lang('login.title')</button></div>
                        </form>
                        <div class="mt-4 text-center"><small>@lang('login.not_registered')</small> <a href="{{ route('register') }}" class="small fw-bold">@lang('login.create_one')</a>
                        </div>
                        <div class="mt-4 text-center"><a href="{{ route('password.request') }}" class="small fw-bold">@lang('buttons.forgot')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
