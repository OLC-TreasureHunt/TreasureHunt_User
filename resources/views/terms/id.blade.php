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
                    1. Halaman ini merupakan Syarat Penggunaan (the "Terms of Use") untuk halaman web di www.bicorn.world yang dioperasikan oleh Helios Gaming Sole Company Limited, sebuah perusahaan yang tergabung dalam Republik Rakyat Lao (Perusahaan"), dan semua pengguna terdaftar situs ini harus menyetujui Syarat Penggunaan ini. Ketentuan Penggunaan ini dan dokumen secara tegas disebut di dalamnya merupakan kesepakatan dan pemahaman antara para pihak dan mengatur hubungan kontraktual antara kami dan Anda. Jika Anda tidak menyetujui persyaratan penggunaan ini, silakan tidak menggunakan atau terus menggunakan situs web. Anda juga harus membaca dengan hati-hati Kebijakan Privasi kami.
                </p>
                <p>
                    2. Kami berhak untuk mengubah Syarat Penggunaan ini dari waktu ke waktu untuk berbagai alasan, termasuk kepatuhan dengan hukum yang berlaku, peraturan dan persyaratan peraturan lainnya. Oleh karena itu, kami berhak untuk mengubah Perjanjian ini antara kau dan kami setiap saat. Setiap perubahan signifikan untuk Syarat Penggunaan akan diberitahu kepada Anda di Website ketika Anda login. Bila Pengguna tidak setuju untuk terikat oleh Syarat dan Ketentuan yang telah diubah dan ingin menutup Akun dan menarik saldo Akun yang valid, Pengguna harus menghubungi Dukungan Pelanggan. Untuk mengetahui apakah ada perubahan pada Syarat dan Ketentuan, silakan merujuk ke nomor versi dan tanggal pemutakhiran di bagian bawah Syarat dan Ketentuan ini.
                </p>
            </div>
        </section>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{{ cAsset('js/pages/base.js') }}"></script>
@endsection