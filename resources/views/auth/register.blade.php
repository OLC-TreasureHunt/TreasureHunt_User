@extends('layouts.app')

@section('title', trans('register.title'))

@section('contents')
<?php
    $languages = config('lang');
    $genders = config('gender');
?>
<section class="pt-5 pb-5 body-min-height">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
                <div class="card shadow-lg border-panel">
                    <div class="card-body py-5 px-sm-5">
                        <h3 class="text-pink">{{ trans('register.page_title') }}</h3>
                        <p class="text-gray">{{ trans('register.page_title_desc') }}</p>
                        <hr>
                        <form method="post" id="register_form" class="form-validate mt-5" action="{{ route('register') }}">
                            @csrf
                            <div class="h5 mb-4 ">{{ trans('register.sub_title') }}</div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="">{{ trans('register.name') }}</label>
                                    <input type="text" class="form-control    @error('name') is-invalid @enderror" name="name" placeholder="{{ trans('register.name') }}" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="">{{ trans('register.email') }}</label>
                                    <input type="text" class="form-control    @error('email') is-invalid @enderror" name="email" placeholder="{{ trans('register.email') }}" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="">{{ trans('register.password') }}</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control    @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('register.password') }}" value="{{ old('password') }}" type="password" >
                                        <span class="input-group-text   "><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                    @error('password')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation" class="">{{ trans('register.password_confirmation') }}</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control    " name="password_confirmation" placeholder="{{ trans('register.password_confirmation') }}" type="password" >
                                        <span class="input-group-text   "><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="gender" class="">{{ trans('register.gender') }}</label>
                                    <select class="form-select    " name="gender" >
                                        <option value="">@lang('register.gender_placeholder')</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender[1] }}" @if( old('gender') == $gender[1]) selected @endif>{{ trans($gender[0]) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birthday" class="">{{ trans('register.birthday') }}</label>
                                    <div class="input-group date" id="datepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input   " data-target="#datepicker" data-toggle="datetimepicker" name="birthday" value="{{ old('birthday') }}"  placeholder="{{ trans('common.date_placeholder') }}" />
                                        <div class="input-group-text btn" data-target="#datepicker" data-toggle="datetimepicker"><i class="icon-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mobile" class="">{{ trans('register.mobile') }}</label>
                                    <input class="form-control    @error('mobile') is-invalid @enderror" type="tel" name="mobile" placeholder="{{ trans('register.mobile') }}" value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="country" class="">{{ trans('register.country') }}</label>
                                    <select name="country" class="form-select    @error('country') is-invalid @enderror" >
                                        <option value="">{{ trans('register.country_placeholder') }}</option>
                                        @foreach($country_list as $code => $country_info)
                                            <option value="{{ $country_info['alpha2Code'] }}" @if( old('country') == $country_info['alpha2Code']) selected @endif>{{ $country_info['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lang" class="">{{ trans('register.lang') }}</label>
                                    <select name="lang" class="form-select    @error('lang') is-invalid @enderror" >
                                        <option value="">{{ trans('register.lang_placeholder') }}</option>
                                        @foreach($languages as $lang)
                                            <option value="{{ $lang['2'] }}" @if( old('lang') == $lang['2']) selected @endif>{{ trans($lang[0]) }}</option>
                                        @endforeach
                                    </select>
                                    @error('lang')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="address" class="">{{ trans('register.address') }}</label>
                                    <input type="text" class="form-control    @error('address') is-invalid @enderror" name="address" placeholder="{{ trans('register.address') }}" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="postal_code" class="">{{ trans('register.postal_code') }}</label>
                                    <input type="text" class="form-control    @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="{{ trans('register.postal_code') }}" value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="affiliate" class="">{{ trans('register.affiliate') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text background-secondary" id="basic-addon3" style="border-top-right-radius: 0; border-bottom-right-radius: 0">{{ $register_url }}</span>
                                        </div>
                                        <input type="text" class="form-control" id="affiliate" name="affiliate" aria-describedby="basic-addon3" value="{{ old('affiliate')? old('affiliate') : $affiliate}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-1 mt-5">
                                <input type="checkbox" name="agree" id="agree" class="form-check-input" value="{{ old('agree') }}" required>
                                <label class="form-check-label " for="agree">{{ sprintf(trans('register.agree_desc'), env('APP_NAME')) }}</label>
                            </div>
                            <button type="submit" class="btn btn-pink m-t-30 mt-3">{{ trans('register.btn.register') }}</button>
                        </form>
                        <div class="mt-4"><small class="text-gray">{{ trans('register.already_desc') }}</small> <a href="{{route('login')}}" class="small fw-bold">{{ trans('register.btn.login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <!--Bootstrap Datetimepicker component-->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            $('select[name=country] option').each(function() {
                var optionText = this.text;
                var newOption = optionText.substring(0, 30);
                if (newOption.length < optionText.length) {
                    jQuery(this).text(newOption + '..');
                }
            });
            
            $('#datepicker').datetimepicker({
                format: 'L'
            });
        });
        
    </script>
@endsection
