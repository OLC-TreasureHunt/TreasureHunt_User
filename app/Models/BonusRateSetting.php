<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusRateSetting extends BaseModel
{
    use HasFactory;

    protected $table = 'th_bonus_rate_setting';

    public function name() {
        $locale = app()->getLocale();
        return $this->hasOne(BonusRateName::class, 'entry_id')->locale($locale)->latest();
    }
}
