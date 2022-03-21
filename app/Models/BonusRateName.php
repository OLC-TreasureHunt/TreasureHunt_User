<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusRateName extends BaseModel
{
    use HasFactory;

    protected $table = 'th_bonus_rate_names';

    public function scopeLocale($builder, $type) {
        return $builder->where('lang', $type);
    }
}
