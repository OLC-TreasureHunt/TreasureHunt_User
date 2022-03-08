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
                    1. 本页构成由老挝共和国（"公司"）注册成立的Helios Gaming Sole Company Limited 经营的ww.bicorn.world网页使用条款（"使用条款 " ） ， 所有本站注册用户必须同意本使用条款。 本使用条款及其明示的文件构成双方之间的协议和谅解，并管理我们与贵方之间的合同关系。 如不同意本使用条款,请勿使用或继续使用本网站。 此外,你亦应仔细阅读我们的私隐政策。
                </p>
                <p>
                    2. 我们保留随时更改这些使用条款的权利，原因包括遵守适用的法律、法规和其他监管要求。 因此，我方保留随时修改贵方与我方之间的本协议的权利。 如使用条款有任何重大修订,你应在登入网站时通知你。 用户不同意修改后的条款和条件，想要关闭账户并提取有效账户余额时，需联系客户支持部。 如欲查询条款有否更改,请参阅本条款下端的版本编号及更新日期。
                </p>
            </div>
        </section>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{{ cAsset('js/pages/base.js') }}"></script>
@endsection