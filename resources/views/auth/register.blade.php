@extends('layouts.app')

@section('title', trans('register.title'))

@section('contents')
<?php
    $languages = config('lang');
    $genders = config('gender');
?>
<section class="pt-5 pb-5 body-min-height back-theme position-relative" data-bg-image="{{ asset('images/background.webp') }}">
    <div class="container-fluid d-flex flex-column">
	<div class="background-login d-none"></div>
        <div class="row align-items-center">
            <div class="heading-text heading-section text-light text-center animate__animated animate__fadeInUp visible position-absolute" style="top: 100px;" data-animate="animate__fadeInUp">
                <img id="mv-img" class="mv-img" src="{{ asset('images/visual-text.png') }}" />
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
                <div class="card shadow-lg border-panel back-semitrans-theme border-semi-theme">
                    <div class="card-body py-5 px-sm-5">
                        <h3 class="text-pink">{{ trans('register.page_title') }}</h3>
                        <p class="text-gray">{{ trans('register.page_title_desc') }}</p>
                        <hr>
                        <form method="post" id="register_form" class="form-validate mt-5" action="{{ route('register') }}" v-cloak>
                            @csrf
                            <div class="h5 mb-4 ">{{ trans('register.sub_title') }}</div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="">{{ trans('register.name') }}</label>
                                    <input type="text" class="form-control back-semitrans-theme   @error('name') is-invalid @enderror" name="name" placeholder="{{ trans('register.name') }}" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="">{{ trans('register.email') }}</label>
                                    <input type="text" class="form-control back-semitrans-theme   @error('email') is-invalid @enderror" name="email" placeholder="{{ trans('register.email') }}" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="">{{ trans('register.password') }}</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control back-semitrans-theme   @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('register.password') }}" value="{{ old('password') }}" type="password" >
                                        <span class="input-group-text back-semitrans-theme"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                    @error('password')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation" class="">{{ trans('register.password_confirmation') }}</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control back-semitrans-theme " name="password_confirmation" placeholder="{{ trans('register.password_confirmation') }}" type="password" >
                                        <span class="input-group-text back-semitrans-theme  "><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="gender" class="">{{ trans('register.gender') }}</label>
                                    <select class="form-select back-semitrans-theme   " name="gender" >
                                        <option value="">@lang('register.gender_placeholder')</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender[1] }}" @if( old('gender') == $gender[1]) selected @endif>{{ trans($gender[0]) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birthday" class="">{{ trans('register.birthday') }}</label>
                                    <div class="input-group date" id="datepicker">
                                        <date-input type="text" 
                                            class="form-control datetimepicker-input rounded back-semitrans-theme @error('birthday') is-invalid @enderror" 
                                            name="birthday" 
                                            v-model="birthday"  
                                            placeholder="{{ trans('register.birthday_placeholder') }}"></date-input>
                                        @error('birthday')
                                            <div class="is-invalid" v-if="!hasBirthdayError">{{ $message }}</div>
                                        @enderror
                                        <div class="is-invalid" v-if="hasBirthdayError">@lang('register.birthday_error')</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="country" class="">{{ trans('register.country') }}</label>
                                    <select name="country" class="form-select back-semitrans-theme   @error('country') is-invalid @enderror" >
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
                                    <label for="city" class="">{{ trans('register.city') }}</label>
                                    <input type="text" class="form-control back-semitrans-theme   @error('city') is-invalid @enderror" name="city" placeholder="{{ trans('register.city') }}" value="{{ old('city') }}">
                                    @error('city')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mobile" class="">{{ trans('register.mobile') }}</label>
                                    <input class="form-control back-semitrans-theme   @error('mobile') is-invalid @enderror" type="tel" name="mobile" placeholder="{{ trans('register.mobile') }}" value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lang" class="">{{ trans('register.lang') }}</label>
                                    <select name="lang" class="form-select back-semitrans-theme   @error('lang') is-invalid @enderror" >
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
                                    <input type="text" class="form-control back-semitrans-theme   @error('address') is-invalid @enderror" name="address" placeholder="{{ trans('register.address') }}" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="postal_code" class="">{{ trans('register.postal_code') }}</label>
                                    <input type="text" class="form-control back-semitrans-theme   @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="{{ trans('register.postal_code_placeholder') }}" value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                        <div class="is-invalid">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ( $affiliate )
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="affiliate" class="">{{ trans('register.affiliate') }}</label>
                                    <input type="text" class="form-control back-semitrans-theme" id="affiliate_url" name="affiliate_url" aria-describedby="basic-addon3" value="{{ $register_url }}{{ old('affiliate')? old('affiliate') : $affiliate}}">
                                    <input type="hidden" id="affiliate" name="affiliate" value="{{ old('affiliate')? old('affiliate') : $affiliate}}" readonly>
                                </div>
                            </div>
                            @endif
                            <div class="form-check mb-1 mt-5">
                                <input type="checkbox" name="agree" id="agree" class="form-check-input" value="{{ old('agree') }}" required>
                                <label class="form-check-label " for="agree">{{ sprintf(trans('register.agree_desc'), env('APP_NAME')) }}</label>
                            </div>
                            <p>{!! trans('register.desc') !!}</p>
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
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>
    
    <script>
        var birthday = "{{ old('birthday') ? old('birthday') : request()->get('birthday') }}";

        jQuery(document).ready(function() {
            $('select[name=country] option').each(function() {
                var optionText = this.text;
                var newOption = optionText.substring(0, 30);
                if (newOption.length < optionText.length) {
                    jQuery(this).text(newOption + '..');
                }
            });
            
            var $showHidePassword = $(".show-hide-password");
            if ($showHidePassword.length > 0) {
                $showHidePassword.each(function() {
                    var elem = $(this),
                        $iconEye = "icon-eye",
                        $iconClosedEye = "icon-eye-off",
                        elemShowHideIcon = elem.find(".input-group-text i"),
                        elemInput = elem.children("input");
                    elem.find(".input-group-text i").css({
                        cursor: "pointer",
                    });
                    elemShowHideIcon.on("click", function(event) {
                        event.preventDefault();
                        if (elem.children("input").attr("type") == "text") {
                            elemInput.attr("type", "password");
                            elemShowHideIcon.removeClass($iconEye);
                            elemShowHideIcon.addClass($iconClosedEye);
                        } else if (elem.children("input").attr("type") == "password") {
                            elemInput.attr("type", "text");
                            elemShowHideIcon.addClass($iconEye);
                            elemShowHideIcon.removeClass($iconClosedEye);
                        }
                    });
                });
            }
        });
        
    </script>

<script src="{{ cAsset('js/pages/register.js') }}"></script>
@endsection
