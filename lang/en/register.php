<?php

return [
    'title' => 'Sign Up',

    'page_title' => 'Sign Up',
    'page_title_desc' => 'Enter the following information to create an account.',

    'sub_title' => 'Account Info',

    'login_id' => 'Login ID',
    'name' => 'Full Name',
    'email' => 'Email',
    'password' => 'Password',
    'password_confirmation' => 'Password Confirmation',
    'gender' => 'Gender',
    'gender_placeholder' => 'Select your gender',
	'birthday_placeholder' => 'YYYY/MM/DD',
    'birthday' => 'Birthday',
    'mobile' => 'Phone',
    'country' => 'Country',
    'country_placeholder' => 'Select your country',
    'lang' => 'Language',
    'lang_placeholder' => 'Select your language',
    'address' => 'Address',
	'city'		=> 'City',
    'postal_code' => 'Postal Code',
	'affiliate' => 'Referral URL',
	'qrcode'		=> 'Referral Code',
	'people'		=> 'Peoples',
	'postal_code_placeholder'	=> 'hyphenless code',

    'op_failed'     => 'Operation failed! Please Retry.',

    'agree_desc' => 'I have read and agree to %s Terms of Service.',

    'already_desc' => 'Already Registered?',

	'x_defi_not_registered'	=> "There's no information at X-DEFI! Please register to X-DEFI first!",

	'activation'	=> [
		'success'		=> 'Activated your account successfully.<br> LoginID is :treasure_id. <br>LoginID of Bicorn is :bicorn_id and a password is same as this service.<br> You can reset password of Bicorn in that site.',
		'already_exist'	=> 'Activated your account successfully.<br> LoginID is :treasure_id. <br>You can login Bicorn site with same Account ID(:bicorn_id) and Password as before. ',
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
		'not_token'		=> 'This is an invalid token',


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
		'login'			=> 'Sign In',
		'register'		=> 'Sign Up',
		'reset_pass'	=> 'Reset Password',
		'forgot_pass'	=> 'Forgot Your Password?',
	],

	'desc' => 'Registration and login of the affiliated site "Bicorn:<a href=\'https://www.bicorn.world\'>https://www.bicorn.world/</a>" after registeration of「TREASURE HUNT」<br>■For users who have not registered "Bicorn"<br>The same email address and password registered in TREASURE HUNT will also be registered in Bicorn.<br>After registration, you can log in to Bicon with the same email address and password registered in TREASURE HUNT.<br>■Already a member of "Bicorn"<br>After completing the registration of TREASURE HUNT, you can log in with the email address (login ID) and password registered with Bicon.',

];