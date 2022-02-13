<footer id="footer">
    <div class="footer-content d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="widget">
                        <div class="widget-title">{{ env('APP_NAME') }}</div>
                        <p class="mb-5">All rights reserved. Copyright © {{ date('Y') }}. Gacha.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center">&copy; {{ date("Y") }} {{ env('APP_NAME') }}. All Rights Reserved.</div>
        </div>
    </div>
</footer>
