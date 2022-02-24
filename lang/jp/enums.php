<?php

use App\Enums\BinaryStatus;
use App\Enums\UserBonusStatus;
use App\Enums\GameHistoryStatus;

return [

    BinaryStatus::class => [
        BinaryStatus::Invalid => 'Administrador',
        BinaryStatus::Valid => 'Súper administrador',
    ],

    UserBonusStatus::class => [
        UserBonusStatus::CarryOver => '繰り越し',
        UserBonusStatus::Withdraw => '送金',
    ],

    GameHistoryStatus::class => [
        GameHistoryStatus::Pending => '処理前',
        GameHistoryStatus::Completed => '処理済',
    ]

];