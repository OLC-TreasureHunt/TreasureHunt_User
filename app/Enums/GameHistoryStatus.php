<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Pending()
 * @method static static Completed()
 */
final class GameHistoryStatus extends Enum implements LocalizedEnum
{
    const Pending =   0;
    const Completed =   1;
}
