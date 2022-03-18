<footer id="footer" class="back-theme">
    <div class="footer-content">
        <div class="container text-light">
            <div class="row">
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-title">Treasure Hunt</div>
                            <p class="mb-5">@lang('app.footer.desc')<br>
                                Ryuji’nCompany. All Rights Reserved.</p>
                            @if(!Auth::check())
                                <a href="{{ route('login') }}" class="btn btn-inverted">@lang('register.btn.login')</a>
                            @endauth
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            @if (Auth::check())
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">@lang('app.menu.page')</div>
                                        <ul class="list">
                                            <li><a href="{{ route('home') }}">@lang('app.menu.home')</a></li>
                                            <li><a href="{{ route('setting') }}">@lang('app.menu.settings')</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">@lang('app.menu.binary')</div>
                                        <ul class="list">
                                            <li><a href="{{ route('tree') }}">@lang('app.menu.tree')</a></li>
                                            <li><a href="{{ route('history') }}">@lang('app.menu.history')</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">@lang('app.menu.support')</div>
                                        <ul class="list">
                                            <li><a href="{{ route('news') }}">@lang('app.menu.news')</a></li>
                                            <li><a href="{{ route('notice') }}">@lang('app.menu.notice')</a></li>
                                            <li><a href="{{ route('faq') }}">@lang('app.menu.faq')</a></li>
                                            <li><a href="{{ route('download') }}">@lang('app.menu.download')</a></li>
                                            <li><a href="{{ route('contact') }}">@lang('app.menu.contact')</a></li>
                                            <li><a href="{{ route('terms') }}">@lang('app.menu.terms')</a></li>
                                        </ul>
                                </div>
                            @else
                            <div class="col-lg-6">
                                <div class="widget">
                                    <ul class="list">
                                        <li><a href="{{ route('news') }}">@lang('app.menu.news')</a></li>
                                        <li><a href="{{ route('notice') }}">@lang('app.menu.notice')</a></li>
                                        <li><a href="{{ route('faq') }}">@lang('app.menu.faq')</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="widget">
                                    <ul class="list">
                                        <li><a href="{{ route('download') }}">@lang('app.menu.download')</a></li>
                                        <li><a href="{{ route('contact') }}">@lang('app.menu.contact')</a></li>
                                        <li><a href="{{ route('terms') }}">@lang('app.menu.terms')</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content back-theme">
        <div class="container">
            <div class="copyright-text text-center text-light">&copy; {{ date("Y") }} Ryuji’nCompany. All Rights Reserved.</div>
        </div>
    </div>
</footer>
