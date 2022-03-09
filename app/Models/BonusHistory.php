<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusHistory extends BaseModel
{
    use HasFactory;
    protected $table = 'th_users_bonus';
    protected $sortable = [
        'type', 
        'currency', 
        'total_bet',
        'real_bonus',
        'created_at'
    ];

    public function levelInfo() {
        return $this->belongsTo(BonusRateSetting::class, 'level');
    }

    public function settleInfo() {
        return $this->belongsTo(Settle::class, 'settle_id', 'id');
    }
}
