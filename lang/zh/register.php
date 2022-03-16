<?php

return [
    'title' => '注册',

    'page_title' => '注册',
    'page_title_desc' => '输入以下信息以注册帐户。',

    'sub_title' => '帐户信息',

    'login_id' => '登录ID',
    'name' => '姓名',
    'email' => '电子邮件',
    'password' => '密码',
    'password_confirmation' => '确认密码',
    'gender' => '性别',
    'gender_placeholder' => '选择性别',
    'birthday' => '生日',
    'mobile' => '手机号',
    'country' => '国家',
    'country_placeholder' => '选择国家',
    'lang' => '语言',
    'lang_placeholder' => '选择语言',
    'address' => '地址',
    'postal_code' => '邮政编码',
	'agree'	=> 'Terms of Service',

    'op_failed'     => 'Operation failed! Please Retry.',

    'agree_desc' => 'I have read and agree to %s Terms of Service.',

    'already_desc' => 'Already Registered?',

	'x_defi_not_registered'	=> "There's no information at X-DEFI! Please register to X-DEFI first!",

	'activation'	=> [
		'success'		=> 'Activated your account successfully.',
		'failed'		=> 'Activation of your account is failed. Please retry!',
		'no_token'		=> 'No Token! Please retry to activate your account.',
		'invalid_token'	=> 'Invalid Token! Please retry to activate your account.',
		'expired_token'	=> 'Token period is invalid. Token valid period is 1 day. Please retry!',

		'verify_email'	=> 'Verify Your Email Address',
		'sent_token'	=> 'A fresh activation link has been sent to your email address.',
		'check_email'	=> 'Before proceeding, please check your email for a verification link.',
		'send_failed'	=> 'Error is occured in sending activation link email.',
		'check_correct'	=> 'Please check whether your email is correct or not.',

		'active'        => 'Active Your Account',

		'waiting'       => 'Please wait for accept of system manager.',

		'exist'			=> 'You are a user already exists.',
		'not_exist'		=> 'Your email address is invalid.',
		'not_register'	=> 'Your email address is invalid.',
		'not_token'		=> 'This is an invalid token'
	],
    'verify'		=> [
		'title'			=> 'Verify Your Email Address',
		'sent_token'	=> 'A fresh verification link has been sent to your email address.',
		'check_email'	=> 'Before proceeding, please check your email for a verification link.',
		'resend_msg1'	=> 'If you did not receive the email',
		'resend_msg2'	=> 'click here to request another',
	],

	'message'		=> [
		'select_country'	=> 'Select a country'
	],
	
	'resend_email'		=> [
		'title'		=> 'Resend Authentication Email',
		'description'		=> 'Resend authentication email to your email address.',
		'send'			=> 'Send',
		'success'		=> 'We have sent authentication email to your email address.',
		'failed'		=> 'We can\'t send authentication email to your email address.',
		'already_exist'		=> 'You are a user already exists.',
    ],
    'btn'			=> [
		'login'			=> '登录',
		'register'		=> '注册',
		'reset_pass'	=> 'Reset Password',
		'forgot_pass'	=> '忘记密码了吗？',
	],

];