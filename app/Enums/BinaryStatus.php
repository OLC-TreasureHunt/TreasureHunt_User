<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Invalid()
 * @method static static Valid()
 */
final class BinaryStatus extends Enum implements LocalizedEnum
{
    const Invalid =   0;
    const Valid =   1;
}
