<?php

use App\Enums\BinaryStatus;
use App\Enums\UserBonusStatus;
use App\Enums\GameHistoryStatus;

return [

    BinaryStatus::class => [
        BinaryStatus::Invalid => '관리자',
        BinaryStatus::Valid => '관리자',
    ],

    UserBonusStatus::class => [
        UserBonusStatus::CarryOver => '조월',
        UserBonusStatus::Withdraw => '송금',
    ],

    GameHistoryStatus::class => [
        GameHistoryStatus::Pending => '처리중',
        GameHistoryStatus::Completed => '완료됨',
    ]
];