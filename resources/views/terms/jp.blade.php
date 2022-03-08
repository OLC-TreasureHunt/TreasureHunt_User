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
                <p>1. このページは、ラオス人民共和国の法人（Hellios Gaming Sole Company Limited、以下当社）が運営するwww.bicorn.worldにおけるウェブページの利用規約（以下利用規約）を構成し、このサイトを利用するすべての登録ユーザーは必ず本利用規約に同意する必要があります。本利用規約およびこの中で明確に言及されている文書は、当事者間の合意および理解を構成し、当社とユーザーの契約関係を規定します。www.bicorn.world（以下本ウェブサイト）を利用する前に、本利用規約をしっかりお読みの上、理解してください。本利用規約にご同意いただけない場合には、ウェブサイトの使用および使用の継続をおやめください。また、プライバシーポリシーに関してもよくご確認ください。
                </p>
                <p>2. 当社は、適用される法律や規制およびその他の規制要件の順守など、さまざまな理由で本利用規約を随時変更する権利を保有します。したがって、当社はユーザーと当社間の本契約を、いつでも改正できるものとします。利用規約に大幅な改正が行われた場合は、ログイン時のウェブサイト上で通知を行うものとします。改正された利用規約に拘束されることに同意しない場合、アカウントの閉鎖および有効なアカウント残高の引き出しを希望する場合は、ユーザーがカスタマーサポートに連絡する必要があります。利用規約に変更があったかどうかを確認するためには、本利用規約の下部に記載されているバージョン番号と更新日をご参照ください。
                </p>
            </div>
        </section>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{{ cAsset('js/pages/base.js') }}"></script>
@endsection