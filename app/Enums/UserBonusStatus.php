<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static CarryOver()
 * @method static static Withdraw()
 */
final class UserBonusStatus extends Enum implements LocalizedEnum
{
    const CarryOver =   0;
    const Withdraw =   1;
}
