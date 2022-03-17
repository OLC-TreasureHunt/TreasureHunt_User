<?php

return [
    'title' => 'Mendaftar',

    'page_title' => 'Mendaftar',
    'page_title_desc' => 'Masukkan informasi berikut untuk membuat akun.',

    'sub_title' => 'Info Akun',

    'login_id' => 'ID Log Masuk',
    'name' => 'Nama Lengkap',
    'email' => 'Surel',
    'password' => 'Kata Sandi',
    'password_confirmation' => 'Konfirmasi Kata Sandi',
    'gender' => 'Jenis Kelamin',
    'gender_placeholder' => 'Pilih jenis kelamin Anda',
	'birthday_placeholder' => 'YYYY/MM/DD',
    'birthday' => 'Ulang Tahun',
    'mobile' => 'Telepon',
    'country' => 'Negara',
    'country_placeholder' => 'Pilih negara Anda',
    'lang' => 'Bahasa',
    'lang_placeholder' => 'Pilih bahasa Anda',
    'address' => 'Alamat',
	'city'		=> 'Kota',
    'postal_code' => 'Kode Pos',
	'affiliate' => 'URL Referral',
	'qrcode'		=> 'Kode Referral',
	'people'		=> 'Masyarakat',
	'postal_code_placeholder'	=> 'hyphenless code',

    'op_failed'     => 'Operasi gagal! Silakan Coba Lagi.',

    'agree_desc' => 'Saya telah membaca dan menyetujui Syarat Layanan %s.',

    'already_desc' => 'Sudah terdaftar?',

	'activation'	=> [
		'success'		=> 'Aktifkan akunmu dengan sukses.<br> LoginID adalah :treasure_id. <br>LoginID dari Bicorn adalah :bicorn_id dan sebuah sandi sama dengan layanan ini.<br> Kau bisa me-reset password Bicorn di situs itu.',
		'already_exist'	=> 'Aktifkan akunmu dengan sukses.<br> LoginID adalah :treasure_id. <br>Anda dapat login situs Bicorn dengan ID Akun yang sama(:bicorn_id) dan Sandi seperti sebelumnya.',
		'failed'		=> 'Aktivasi akun Anda gagal. Silakan coba lagi!',
		'no_token'		=> 'Tidak ada Token! Silakan coba lagi untuk mengaktifkan akun Anda.',
		'invalid_token'	=> 'Token Tidak Valid! Silakan coba lagi untuk mengaktifkan akun Anda.',
		'expired_token'	=> 'Periode token tidak valid. Token periode valid adalah 1 hari. Silakan coba lagi!',

		'verify_email'	=> 'Verifikasi Anda email Alamat',
		'sent_token'	=> 'Sebuah link aktivasi segar telah dikirim ke alamat email Anda.',
		'check_email'	=> 'Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.',
		'send_failed'	=> 'Silakan periksa apakah email Anda benar atau tidak.',
		'check_correct'	=> 'Silakan periksa apakah email Anda benar atau tidak.',

		'active'        => 'Aktifkan Akun Anda',

		'waiting'       => 'Harap tunggu untuk menerima manajer sistem.',

		'exist'			=> 'Anda adalah pengguna sudah ada.',
		'not_exist'		=> 'Alamat email Anda tidak valid.',
		'not_register'	=> 'Alamat email Anda tidak valid.',
		'not_token'		=> 'Ini adalah token yang tidak valid',


	],
    'verify'		=> [
		'title'			=> 'Verifikasi Alamat Surel Anda',
		'sent_token'	=> 'Sebuah link verifikasi segar telah dikirim ke alamat email Anda.',
		'check_email'	=> 'Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.',
		'resend_msg1'	=> 'Jika Anda tidak menerima email',
		'resend_msg2'	=> 'klik di sini untuk meminta yang lain',
	],

	'message'		=> [
		'select_country'	=> 'Pilih sebuah negara'
	],
	
	'resend_email'		=> [
		'title'		=> 'Kirim Ulang Surel Otentikasi',
		'description'		=> 'Kirim ulang surel otentikasi ke alamat surel Anda.',
		'send'			=> 'Kirim',
		'success'		=> 'Kami telah mengirim email otentikasi ke alamat email Anda.',
		'failed'		=> 'Kita tidak bisa mengirim email otentikasi ke alamat email Anda.',
		'already_exist'		=> 'Anda adalah pengguna sudah ada.',
    ],
    'btn'			=> [
		'login'			=> 'Masuk',
		'register'		=> 'Mendaftar',
		'reset_pass'	=> 'Atur Ulang Kata Sandi',
		'forgot_pass'	=> 'Lupa Kata Sandi Anda?',
	],

	'desc' => 'Tentang pendaftaran dan login ke situs afiliasi setelah pendaftaran "TREASURE: <a href=\'https://www.bicorn.world\'>https://www.bicorn.world/</a>"<br>■Pengguna yang tidak terdaftar "Bicorn"<br>Ini juga terdaftar di "Bicorn" dengan alamat email dan sandi yang sama yang terdaftar di "TREASURE HUNT".<br>Setelah pendaftaran selesai, Anda dapat login ke "Bicorn" dengan password alamat email yang sama yang Anda daftarkan ke "TREASURE HUNT".<br>■Mereka yang sudah menjadi anggota "Bicorn"<br>Setelah pendaftaran "TREASURE HUNT" selesai, Anda masih dapat log in dengan alamat email (ID login) password password yang terdaftar dengan "Bicorn".',

];