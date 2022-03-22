@extends('layouts.app')

@section('title', trans('login.title'))

@section('contents')
<div id="welcome">
    <section class="p-b-0 p-t-0 background-transparent">
        <div class="container-fluid p-t-0">
            <div class="slide-captions text-start text-light title pt-4">
                <!-- Captions -->
                <div class="heading-text heading-section text-light text-center mb-7 animate__animated pt-4" 
                    data-animate="animate__fadeInUp">
                    <img id="mv-img" class="mv-img" src="{{ asset('images/visual-text.png') }}" />
                </div>
                <!-- end: Captions -->
                <div class="col-xl-8 col-lg-12 col-md-12 col-12 mx-auto">
                    <div class="card back-semitrans-theme border-semi-theme">
                      <div class="card-body px-sm-5">
                          <div class="row">
                              <div class="col-md-6 col-sm-12 col-12 align-self-center mb-1 mt-1 px-1 py-0 text-center">
                                  @if($setting->content_type == 1)
                                      <img class="img-fuild w-100" src="{{ $setting->content_url }}"/>
                                  @elseif($setting->content_type == 2)
                                      <video class="login-video v-center" width="100%" autoplay muted loop playsinline>
                                          <source src="{{ $setting->content_url }}" type="video/mp4">
                                      </video>
                                  @endif
                              </div>
                              <div class="col-md-6 col-sm-12 col-12">
                                  <div class="card background-transparent border-0">
                                      <div class="card-body">
                                          <div class="row justify-content-center">
                                              <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                                  <div class="mb-5 text-center">
                                                      <h6 class="h3 mb-1">@lang('login.title')</h6>
                                                  </div><span class="clearfix"></span>
                                                  <form method="post" class="form-validate" action="{{ route('login') }}">
                                                      @csrf
                                                      <input type="hidden" name="access_token" value="{{ $access_token?? '' }}">
                                                      <div class="form-group">
                                                          <label for="email">@lang('login.login')</label>
                                                          <div class="input-group">
                                                              <input
                                                                  type="text"
                                                                  class="form-control back-semitrans-theme border-theme {{ $errors->has('affiliate_id') || $errors->has('email') ? 'is-invalid' : '' }}"
                                                                  name="login"
                                                                  placeholder="{{ trans('login.login') }}"
                                                                  required=""
                                                                  value="{{ old('affiliate_id') ?: old('email') }}"
                                                                  autofocus>
                          
                                                              <span class="input-group-text back-semitrans-theme border-theme "><i class="icon-user"></i></span>
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
                                                                  class="form-control back-semitrans-theme border-theme  @error('password') is-invalid @enderror"
                                                                  name="password"
                                                                  placeholder="{{ trans('login.password') }}"
                                                                  type="password"
                                                                  required="">
                                                              <span class="input-group-text back-semitrans-theme border-theme "><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
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
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        
    </section>
    
    <section class="background-transparent" id="alliance" style="display: none">
        <div class="container p-t-0">
            <h4 class="text-primary">@lang('home.alliance')</h4>
            <div class="row">
                @foreach ($alliances as $alliance)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <a class="w-100 d-flex justify-center align-items-center" href="{{ $alliance->site_url}}"><img class="img_fluid w-100" src="{{ $alliance->site_image}}" /></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="arrows-examples">
        <div class="arrow-up" id="alliance-show" v-on:click="showAlliance"></div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ cAsset('js/pages/base.js') }}"></script>
@endsection