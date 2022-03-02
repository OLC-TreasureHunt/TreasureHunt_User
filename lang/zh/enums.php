<?php

use App\Enums\BinaryStatus;
use App\Enums\UserBonusStatus;
use App\Enums\GameHistoryStatus;

return [

    BinaryStatus::class => [
        BinaryStatus::Invalid => '管理员',
        BinaryStatus::Valid => '管理员',
    ],

    UserBonusStatus::class => [
        UserBonusStatus::CarryOver => '结转已',
        UserBonusStatus::Withdraw => '送款',
    ],

    GameHistoryStatus::class => [
        GameHistoryStatus::Pending => '处理中',
        GameHistoryStatus::Completed => '完成的',
    ]
];