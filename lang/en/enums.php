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
        UserBonusStatus::CarryOver => 'CarryOver',
        UserBonusStatus::Withdraw => 'Withdraw',
    ],

    GameHistoryStatus::class => [
        GameHistoryStatus::Pending => 'Pending',
        GameHistoryStatus::Completed => 'Completed',
    ]
];