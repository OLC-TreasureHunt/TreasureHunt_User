<?php

return [
    'title' => '登録',

    'page_title' => '登録',
    'page_title_desc' => '次の情報を入力して、アカウントを登録します。',

    'sub_title' => 'アカウント情報',

    'login_id' => 'ログインID',
    'name' => '姓名',
    'email' => 'メールアドレス',
    'password' => 'パスワード',
    'password_confirmation' => 'パスワード確認',
    'gender' => '性別',
    'gender_placeholder' => '性別を選択ください',
    'birthday' => '生年月日',
    'mobile' => '携帯番号',
    'country' => '国',
    'country_placeholder' => '国を選択ください',
    'lang' => '言語',
    'lang_placeholder' => '言語を選択ください',
    'address' => '住所',
    'postal_code' => '郵便コード',
	'agree'	=> '利用規約',

    'op_failed'     => '操作に失敗しました! もう一度お試しください。',

    'agree_desc' => '%sのサービス規約を読み、同意します。',

    'already_desc' => '登録済みですか?',

	'x_defi_not_registered'	=> "X-DEFIには情報がありません！ まずX-DEFIに登録してください!",

	'activation'	=> [
		'success'		=> 'アカウントを正常にアクティブにしました。',
		'failed'		=> 'アカウントのアクティブ化に失敗しました。 再試行してください。',
		'no_token'		=> 'トークンなし! アカウントをアクティブにするには、もう一度実行してください。',
		'invalid_token'	=> 'トークンが無効です! アカウントをアクティブにするには、もう一度実行してください。',
		'expired_token'	=> 'トークン期間が無効です。 トークンの有効期間は1日です。 再試行してください。',

		'verify_email'	=> 'Eメールアドレスの確認',
		'sent_token'	=> '新しいアクティベーションリンクが電子メールアドレスに送信されました。',
		'check_email'	=> 'Eメールで確認リンクを確認してください。',
		'send_failed'	=> 'アクティベーションリンク電子メールの送信中にエラーが発生しました。',
		'check_correct'	=> 'メールが正しいかどうか確認してください。',

		'active'        => 'アカウントをアクティブにする',

		'waiting'       => 'システム運営に同意するまでお待ちください。',

		'exist'			=> '既に存在するユーザーです。',
		'not_exist'		=> 'メールアドレスが無効です。',
		'not_register'	=> 'メールアドレスが無効です。',
		'not_token'		=> '無効なトークンです。'
	],
    'verify'		=> [
		'title'			=> 'Eメールアドレスの確認',
		'sent_token'	=> '新しい検証リンクがEメールアドレスに送信されました。',
		'check_email'	=> 'Eメールで確認リンクを確認してください。',
		'resend_msg1'	=> 'Eメールを受信しなかった場合',
		'resend_msg2'	=> 'リクエストするにはこちらをクリックしてください。',
	],

	'message'		=> [
		'select_country'	=> '国を選択してください'
	],
	
	'resend_email'		=> [
		'title'		=> '認証Eメールの再送信',
		'description'		=> '認証EメールをEメールアドレスに再送信します。',
		'send'			=> '送信',
		'success'		=> 'メールアドレスに認証メールを送りました。',
		'failed'		=> 'Eメールアドレスに認証Eメールを送信することはできません。',
		'already_exist'		=> '既に存在するユーザーです。',
    ],
    'btn'			=> [
		'login'			=> 'ログイン',
		'register'		=> '登録',
		'reset_pass'	=> 'パスワードリセット',
		'forgot_pass'	=> 'パスワードをお忘れですか？',
	],
];