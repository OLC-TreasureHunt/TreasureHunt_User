@extends('layouts.app')

@section('title', trans('terms.title'))
@section('contents')

<div class="body-min-height back-semitrans-theme">
    <div class="container ">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-dark background-transparent">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('terms.page_title') }}</h1>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        
        <section id="page-content" class="background-transparent">
            <div class="container">
                <p>
                    1. This page constitutes the Terms of Use (the "Terms of Use") for the web pages on www.bicorn.world operated by Hellios Gaming Sole Company Limited, a company incorporated in the Lao People's Republic (the "Company"), and all registered users of this site must agree to these Terms of Use. These Terms of Use and the documents expressly referred to in them constitute the agreement and understanding between the parties and govern the contractual relationship between us and you. If you do not agree to these terms of use, please do not use or continue to use the website. You should also carefully read our Privacy Policy.
                </p>
                <p>
                    2. We reserve the right to change these Terms of Use from time to time for a variety of reasons, including compliance with applicable laws, regulations and other regulatory requirements. Accordingly, we reserve the right to amend this Agreement between you and us at any time. Any significant amendments to the Terms of Use shall be notified to you on the Website when you log in. If the User does not agree to be bound by the amended Terms and Conditions and wishes to close the Account and withdraw the valid Account balance, the User must contact Customer Support. In order to find out if there have been any changes to the Terms and Conditions, please refer to the version number and update date at the bottom of these Terms and Conditions.
                </p>
            </div>
        </section>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{{ cAsset('js/pages/base.js') }}"></script>
@endsection