<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends BaseModel
{
    use HasFactory;

    protected $table = 'th_users_info';

    public function levelInfo() {
        return $this->belongsTo(BonusRateSetting::class, 'level', 'id');
    }
}
