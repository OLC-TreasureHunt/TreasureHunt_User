@extends('layouts.app')

@section('title', trans('setting.title'))

@section('contents')

<div class="body-min-height back-semitrans-theme">
    <div class="container">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('setting.page_title') }}</h1>
                    <span>{{ trans('setting.page_title_desc') }}</span>
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
        <section id="page-content" class="background-transparent">
            <div class="container">
                <div class="tabs tabs-vertical">
                    <div class="row">
                        <div class="col-md-3 tab-border-right mb-3">
                            <ul class="nav flex-column nav-tabs border-1 main-tab" id="setting_tab" role="tablist" aria-orientation="vertical">
                                <li class="nav-item">
                                    <a class="nav-link no-border active" 
                                        id="account_info-tab" 
                                        data-bs-toggle="tab" 
                                        href="#account_info" 
                                        role="tab" 
                                        aria-controls="account_info" 
                                        aria-selected="true"><b>{{ trans('setting.account_info') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" 
                                        id="change_password-tab" 
                                        data-bs-toggle="tab" 
                                        href="#change_password" 
                                        role="tab" 
                                        aria-controls="change_password" 
                                        aria-selected="true"><b>{{ trans('setting.change_pwd') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" 
                                        id="referral-tab" 
                                        data-bs-toggle="tab" 
                                        href="#referral" 
                                        role="tab" 
                                        aria-controls="referral" 
                                        aria-selected="true"><b>{{ trans('setting.referral') }}</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content" id="setting_tab_content">
                                <div class="tab-pane fade show active" id="account_info" role="tabpanel" aria-labelledby="account_info-tab">
                                    <div class="card back-semi-theme border-theme  border-theme  ">
                                        <div class="card-header card-header-bottom   border-radius-1">
                                            <span class="h4 mx-auto text-dark">{{ trans('setting.account_info') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 text-center">
                                                    <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('images/user-avatar.png') }}" class="avatar avatar-xl" id="avatar_preview">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6 text-dark">{{ trans('setting.login_id')  }}</div>
                                                        <div class="col-lg-8 col-6 text-dark">{{ auth()->user()->affiliate_id }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6 text-dark">{{ trans('setting.email')  }}</div>
                                                        <div class="col-lg-8 col-6 text-dark">{{ auth()->user()->email }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card back-semi-theme border-theme  border-theme ">
                                        <div class="card-header card-header-bottom   border-radius-1">
                                            <span class="h4 mx-auto text-dark">{{ trans('setting.account_info_update') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" class="form-validate mt-5" action="{{ route('setting.updateprofile') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="" class="text-dark">{{ trans('setting.avatar') }}</label>
                                                        <input type="file" class="form-control-file d-none back-semi-theme border-theme " name="avatar" id="avatar" onchange="previewFile()">
                                                        <label for="avatar" class="btn btn-warning">{{ trans('buttons.browse') }}</label>
                                                        @error('avatar')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name" class="text-dark">{{ trans('setting.name') }}</label>
                                                        <input type="text" class="form-control text-dark  back-semi-theme border-theme  @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : auth()->user()->name}}" placeholder="{{ trans('setting.name') }}" autofocus>
                                                        @error('name')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="gender" class="text-dark">{{ trans('setting.gender') }}</label>
                                                        <select class="form-select text-dark back-semi-theme border-theme " name="gender">
                                                            <option>{{ trans('setting.gender_placeholder') }}</option>
                                                            @foreach($genders as $gender)
                                                                <option value="{{ $gender[1] }}" @if( (old('gender') ? old('gender') : auth()->user()->gender) == $gender[1]) selected @endif>{{ trans($gender[0]) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="birthday" class="text-dark">{{ trans('setting.birthday') }}</label>
                                                        <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input text-dark back-semi-theme border-theme " data-target="#datepicker" name="birthday" value="{{ old('birthday') ? old('birthday') : date('m/d/Y', strtotime(auth()->user()->birthday))}}"  placeholder="{{ trans('common.date_placeholder') }}" />
                                                            <div class="input-group-text btn btn-light text-dark back-semi-theme border-theme" data-target="#datepicker" data-toggle="datetimepicker"><i class="icon-calendar"></i></div>
                                                        </div>
                                                        @error('birthday')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile" class="text-dark">{{ trans('setting.mobile') }}</label>
                                                        <input class="form-control text-dark  back-semi-theme border-theme  @error('mobile') is-invalid @enderror" type="tel" name="mobile" placeholder="{{ trans('register.mobile') }}" value="{{ old('mobile') ? old('mobile') : auth()->user()->mobile}}">
                                                        @error('mobile')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="country" class="text-dark">{{ trans('setting.country') }}</label>
                                                        <select name="country" class="form-select text-dark  back-semi-theme border-theme  @error('country') is-invalid @enderror">
                                                            <option value="">{{ trans('setting.country_placeholder') }}</option>
                                                            @foreach($country_list as $code => $country_info)
                                                                <option value="{{ $country_info['alpha2Code'] }}" @if( (old('country') ? old('country') : auth()->user()->country) == $country_info['alpha2Code']) selected @endif>{{ $country_info['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('country')
                                                        <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="address" class="text-dark">{{ trans('setting.address') }}</label>
                                                        <input type="text" class="form-control text-dark  back-semi-theme border-theme  @error('address') is-invalid @enderror" name="address" placeholder="{{ trans('setting.address') }}" value="{{ old('address') ? old('address') : auth()->user()->address }}">
                                                        @error('address')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="postal_code" class="text-dark">{{ trans('setting.postal_code') }}</label>
                                                        <input type="text" class="form-control text-dark  back-semi-theme border-theme  @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="{{ trans('setting.postal_code') }}" value="{{ old('postal_code') ? old('postal_code') : auth()->user()->postal_code }}">
                                                        @error('postal_code')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn m-t-30 mt-3">{{ trans('buttons.save') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="change_password-tab">
                                    <div class="card back-semi-theme border-theme  border-theme ">
                                        <div class="card-header card-header-bottom   border-radius-1">
                                            <span class="h4 mx-auto text-dark">{{ trans('setting.change_pwd') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('setting.updatepassword') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="current_password" class="col-lg-4 col-form-label text-dark">{{ trans('setting.current_pwd') }}</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control text-dark  back-semi-theme border-theme  @error('current_password') is-invalid @enderror" type="password" value="{{ old('current_password') }}" name="current_password" placeholder="{{ trans('setting.current_pwd') }}">
                                                        @error('current_password')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-lg-4 col-form-label text-dark">{{ trans('setting.new_pwd') }}</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control text-dark  back-semi-theme border-theme  @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}" name="password" placeholder="{{ trans('setting.new_pwd') }}">
                                                        @error('password')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-lg-4 col-form-label text-dark">{{ trans('setting.new_pwd_confirm') }}</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control text-dark  back-semi-theme border-theme  @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ trans('setting.new_pwd_confirm') }}">
                                                        @error('password_confirmation')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn m-t-30 mt-3 mx-auto">{{ trans('buttons.save') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fad" id="referral" role="tabpanel" aria-labelledby="referral-tab">
                                    <div class="card back-semi-theme border-theme  border-theme ">
                                        <div class="card-header card-header-bottom  bprder-radius-1">
                                            <span class="h4 mx-auto text-dark">{{ trans('setting.referral') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <div method="post" id="" class="form-validate mt-5" action="#">
                                                <div class="row">
                                                    <label for="affiliate" class="">@lang('register.affiliate')</label>
                                                    <div class="form-inline">
                                                        <div class="input-group">
                                                            <input id="referral_url" type="text" readonly class="form-control widget-search-form   back-semi-theme border-theme  border-none" value="{{ $register_url }}">
                                                            <span class="input-group-text back-semi-theme border-theme  border-none">
                                                                <button class="border-0  back-semi-theme border-theme" style="border:none !important;" data-clipboard="true" data-clipboard-target="#referral_url"><i class="icon-copy"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label>@lang('register.qrcode')</label>
                                                        <div>
                                                            <img class="mx-auto img-thumbnail" src="" width="300px" id="referral_code">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label></label>
                                                        <div>
                                                            <div class="border border-dark border-radius-1 mt-5 text-center">
                                                                <div class="counter text-lg"><span data-speed="1" data-refresh-interval="1" data-to="{{ $referral }}" data-from="0" data-seperator="true">{{ $referral }}</span></div>
                                                                <div class="seperator seperator-small"></div>
                                                                <p>@lang('register.people')</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ cAsset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ cAsset('plugins/bootstrap-datetimepicker/tempusdominus-bootstrap-4.js') }}"></script>
    <script>
    </script>

@endsection
