<?php
    $languages = config('lang');
?>

<header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
    <div class="header-inner back-theme">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="{{ route('home') }}">
                    <span class="logo-default">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid align-self-center" alt="branding logo" style="max-height: 60px;">
                    </span>
                    <span class="logo-dark">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid align-self-center" alt="branding logo" style="max-height: 60px;">
                        <span class="d-md-inline d-sm-none d-none" style="font-size: 30px">{{ env('APP_NAME') }}</span>
                    </span>
                </a>
            </div>
            <!--End: Logo-->
            
            <!--Header Extras-->
            <div class="header-extras">
                <ul>
                    <li>
                        <div class="p-dropdown">
                            <a href="#"><i class="icon-globe"></i><span style="text-transform: uppercase; color: white;">{{ app()->getLocale() }}</span></a>
                            <ul class="p-dropdown-content select-language back-theme">
                                @foreach($languages as $key => $info)
                                    <li><a class="text-light" href="{{ route('lang', ['locale' => $info[2]]) }}"><i class="flag-icon flag-icon-{{$info[1]}}"></i>@lang($info[0])</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!--end: Header Extras-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> @lang('app.menu.home')</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa fa-envelope"></i> @lang('app.menu.contact')</a></li>
                            
                            @if(Auth::check())
                                <li class="dropdown">
                                    <a href="#" class="avatar-a" title="{{ Auth::user()->email }}">
                                        <span class="email">{{ hideEmailAddress(Auth::user()->email) }}</span>&nbsp;<img  src="{{ cAsset(Auth::user()->avatar) }}" class="avatar avatar-25rem">
                                    </a>
                                    <ul class="dropdown-menu back-theme">
                                        <li><a href="{{ route('setting') }}"><i class="icon-settings"> </i> @lang('app.menu.settings')</a></li>
                                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i> @lang('app.menu.logout')</a></li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i></i> @lang('register.btn.login')</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-registered"></i></i> @lang('register.btn.register')</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
