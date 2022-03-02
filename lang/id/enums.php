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
        UserBonusStatus::CarryOver => 'Bawa Lebih',
        UserBonusStatus::Withdraw => 'Mundur.',
    ],

    GameHistoryStatus::class => [
        GameHistoryStatus::Pending => 'Ditunda',
        GameHistoryStatus::Completed => 'Selesai',
    ]
];