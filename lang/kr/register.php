<?php

return [
    'title' => '회원가입',

    'page_title' => '회원가입',
    'page_title_desc' => '아래의 정보들을 입력하세요.',

    'sub_title' => '회원정보',

    'login_id' => '회원 ID',
    'name' => '이름',
    'email' => '이메일',
    'password' => '암호',
    'password_confirmation' => '암호확인',
    'gender' => '성별',
    'gender_placeholder' => '성별선택',
	'birthday_placeholder' => 'YYYY/MM/DD',
    'birthday' => '생일',
    'mobile' => '전화번호',
    'country' => '나라',
    'country_placeholder' => '나라선택',
    'lang' => '표시언어',
    'lang_placeholder' => '언어를 선택하세요',
    'address' => '주소',
	'city'		=> '도시',
    'postal_code' => '우편번호',
	'affiliate' => '소개URL',
	'qrcode'		=> '소개코드',
	'people'		=> '명',
	'postal_code_placeholder'	=> '-없음',

    'op_failed'     => '조작이 실패했습니다. 다시 시도하세요.',

    'agree_desc' => '%s의 이용약관을 읽고 동의합니다.',

    'already_desc' => '이미 등록?',

	'x_defi_not_registered'	=> "There's no information at X-DEFI! Please register to X-DEFI first!",

	'activation'	=> [
		'success'		=> '계정을 성공적으로 활성화했습니다',
		'failed'		=> '계정 활성화에 실패했습니다. 다시 시도하십시오!',
		'no_token'		=> '토큰이 존재하지 않습니다! 계정 활성화를 다시 시도하십시오.',
		'invalid_token'	=> '토큰이 유효하지 않습니다! 계정 활성화를 다시 시도하십시오.',
		'expired_token'	=> '토큰 기간이 잘못되었습니다. 토큰 유효 기간은 1일입니다. 다시 시도하십시오!',

		'verify_email'	=> '이메일 주소를 확인',
		'sent_token'	=> '새로운 활성화 링크가 귀하의 이메일 주소로 전송되었습니다.',
		'check_email'	=> '계속하기 전에 이메일에서 확인 링크를 확인하세요.',
		'send_failed'	=> '활성화 링크 이메일을 보내는 중 오류가 발생했습니다.',
		'check_correct'	=> '이메일이 맞는지 확인해주세요',

		'active'        => '게정활성화',

		'waiting'       => '잠시 기다려주십시오.',

		'exist'			=> '이미 등록된 유저입니다.',
		'not_exist'		=> '메일주소가 정확하지 않습니다.',
		'not_register'	=> '메일주소가 정확하지 않습니다.',
		'not_token'		=> '토큰값이 유효하지 않습니다.'
	],
    'verify'		=> [
		'title'			=> '메일주소인증',
		'sent_token'	=> '새로운 확인 링크가 고객님의 이메일 주소로 전송되었습니다.',
		'check_email'	=> '계속하기 전에 이메일에서 링크를 확인하세요',
		'resend_msg1'	=> '만약 메일을 받지 못했나요',
		'resend_msg2'	=> '다시하기 위해 눌러주세요',
	],

	'message'		=> [
		'select_country'	=> '나라선택'
	],
	
	'resend_email'		=> [
		'title'		=> '인증메일을 다시 송신',
		'description'		=> '고객님의 메일주소로 인증메일을 다시 송신합니다.',
		'send'			=> '송신',
		'success'		=> '고객님의 메일주소로 인증메일을 보냈습니다.',
		'failed'		=> '고객님의 메일주소로 인증메일을 보낼수 없습니다.',
		'already_exist'		=> '이미 등록된 유저입니다.',
    ],
    'btn'			=> [
		'login'			=> '가입',
		'register'		=> '등록',
		'reset_pass'	=> '암호재설정',
		'forgot_pass'	=> '암호를 잃어버렸나요?',
	],

	'desc' => '「TREASURE HUNT」등록후의 제휴사이트「바이콘：<a href="https://www.bicorn.world">https://www.bicorn.world/</a>」의 회원가입과 로그인에 대하여<br>■「바이콘」미등록 사용자분<br>「TREASURE HUNT」에 등록한 같은 메일주소와 패스워드로「바이콘」에도 등록됩니다.<br>등록완료후「TREASURE HUNT」에 등록한 같은 메일주소와 패스워드로 「바이콘」에 로그인할수 있습니다.<br>■이미「바이콘」회원인 분<br>「TREASURE HUNT」등록완료후에도「바이콘」에 등록되어있는 메일주소（회원ID）・패스워드로 로그인할수 있습니다.',
];