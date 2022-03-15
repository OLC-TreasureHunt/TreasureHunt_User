<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute을(를) 동의하지 않았습니다.',
    'active_url' => ':attribute 값이 유효한 URL이 아닙니다.',
    'after' => ':attribute 값이 :date 보다 이후 날짜가 아닙니다.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => ':attribute 값에 문자, 숫자, 대쉬(-) 외의 값이 포함되어 있습니다.',
    'alpha_num' => ':attribute 값에 문자와 숫자 외의 값이 포함되어 있습니다.',
    'array' => ':attribute 값이 유효한 목록 형식이 아닙니다.',
    'before' => ':attribute 값이 :date 보다 이전 날짜가 아닙니다.',
    'between' => [
        'numeric' => ':attribute 값이 :min ~ :max 값을 벗어납니다.',
        'file' => ':attribute 값이 :min ~ :max 킬로바이트를 벗어납니다.',
        'string' => ':attribute 값이 :min ~ :max 글자가 아닙니다.',
        'array' => ':attribute 값이 :min ~ :max 개를 벗어납니다.',
    ],
    'boolean' => ':attribute 값이 true 또는 false 가 아닙니다.',
    'confirmed' => ':attribute 와 :attribute 확인 값이 서로 다릅니다.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute는 유효한 날짜가 아닙니다.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute 값이 :format 형식과 일치하지 않습니다.',
    'different' => ':attribute 값이 :other은(는) 서로 다르지 않습니다.',
    'digits' => ':attribute 값이 :digits 자릿수가 아닙니다.',
    'digits_between' => ':attribute 값이 :min ~ :max 자릿수를 벗어납니다.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => ':attribute 값에 중복된 항목이 있습니다.',
    'email' => ':attribute 값이 형식에 맞지 않습니다.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => '선택한 :attribute는 사용할 수 없습니다.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => ':attribute 값이 유효한 JSON 문자열이 아닙니다.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute 값이 :max 보다 큽니다.',
        'file' => ':attribute 값이 :max 킬로바이트보다 큽니다.',
        'string' => ':attribute 값이 :max 글자보다 많습니다.',
        'array' => ':attribute 값이 :max 개보다 많습니다.',
    ],
    'mimes' => ':attribute 값이 :values 와(과) 다른 형식입니다.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute 값이 :min 보다 작습니다.',
        'file' => ':attribute 값이 :min 킬로바이트보다 작습니다.',
        'string' => ':attribute 값이 :min 글자 이상으로 작성하셔야합니다.',
        'array' => ':attribute 값이 :max 개보다 적습니다.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute는 수자이어야합니다.',
    'password' => 'The password is incorrect.',
    'present' => ':attribute 필드가 누락되었습니다.',
    'regex' => ':attribute 값의 형식이 유효하지 않습니다.',
    'required' => ':attribute 항목은 필수 항목입니다.',
    'required_if' => ':attribute 값이 누락되었습니다 (:other 값이 :value 일 때는 필수).',
    'required_unless' => ':attribute 값이 누락되었습니다 (:other 값이 :value 이(가) 아닐 때는 필수).',
    'required_with' => ':attribute 값이 누락되었습니다 (:values 값이 있을 때는 필수).',
    'required_with_all' => ':attribute 값이 누락되었습니다 (:values 값이 있을 때는 필수).',
    'required_without' => ':attribute 값이 누락되었습니다 (:values 값이 없을 때는 필수).',
    'required_without_all' => ':attribute 값이 누락되었습니다 (:values 값이 없을 때는 필수).',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => ':attribute 값이 :other 와 서로 다릅니다.',
    'size' => [
        'numeric' => ':attribute 값이 :size 가 아닙니다.',
        'file' => ':attribute 값이 :size 킬로바이트가 아닙니다.',
        'string' => ':attribute 값이 :size 글자가 아닙니다.',
        'array' => ':attribute 값이 :max 개가 아닙니다.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attribute 값이 글자가 아닙니다.',
    'timezone' => ':attribute 값이 올바른 시간대가 아닙니다.',
    'unique' => ':attribute 값은 이미 사용 중입니다.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => ':attribute 값이 유효한 URL이 아닙니다.',
    'uuid' => 'The :attribute must be a valid UUID.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'title'     => '제목',
        'content'   => '내용',
        'name'			=> '이름',
        'roma_letter'	=> 'ローマ字',
	    'age'			=> '나이',
        'userid'		=> '회원ID',
	    'id'			=> 'ID',
        'password'		=> '암혼',
		'firstname'		=> '이름',
		'lastname'		=> '성',
		'nickname'		=> '닉네임',
        'email'			=> '메일',
		'destination'	=> '주소',
		'birthday'		=> '생일',
		'gender'		=> '성별',
		'country'		=> '나라명',
		'mobile'		=> '전화번호',
		'postal_code'	=> '우편번호',
		'address'		=> '주소',
		'referrer'		=> '소개자',
		'terms'			=> '이용규약',
		'city'			=> '도시',
		'year'			=> '년(생일)',
		'month'			=> '월(생일)',
		'day'			=> '일(생일)',

		'currency'		=> '통화',
		'receiver_id'	=> '송금처',
		'amount'		=> '금액',
        'lang'          => '표시언어'
    ],

];
