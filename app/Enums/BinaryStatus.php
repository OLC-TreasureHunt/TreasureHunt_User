<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Invalid()
 * @method static static Valid()
 */
final class BinaryStatus extends Enum
{
    const Invalid =   0;
    const Valid =   1;
}
